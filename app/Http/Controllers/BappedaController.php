<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\Input;
use App\Tujuan;
use App\Visi;
use App\Misi;
use App\KriteriaTujuan;
use App\BobotTujuan;
use App\BobotKriteriaTujuan;
use App\EigenKriteriaTujuan;
use App\EigenTujuan;


class BappedaController extends Controller
{
    public function addTujuan()
    { 
        $VisiMisi = Visi::all();
        return view('bappeda.inputtujuan',compact('VisiMisi'));
    }

    public function showMisi(Request $request){
        if ($request->has('id')) {
            $misis = Misi::where('visi_id', $request->input('id'))->get();
            return response()->json(['result' => $misis]);
        } 
        else {
            return response()->json(['result' => 'Gagal!!']);
        }
    }

    public function showTujuan(Request $request)
    {
        $Misis = Misi::all()->sortByDesc('bobot');
        return view('bappeda.showtujuan',compact('Misis'));
    }

    public function storeTujuan(request $request)
    {        $validator = \Validator::make($request->all(), [
                    'tujuan' => 'required',
                    'misi' => 'required',
        ]);
        $validator->validate();

        $data = $request->only('misi');
        $data['misi_id'] = $data['misi'];
        $data['tujuan'] = $request->tujuan;
        $data['user_id'] = Auth::user()->id;
        foreach ($request->tujuan as $data['tujuan']) {
            Tujuan::create($data);
        }

        $VisiMisi = Visi::all();
        return view('bappeda.inputtujuan',compact('VisiMisi'));
    }

    //AHPshowNilaiMisi
    public function showKriteriaTujuan()
    {
        $Kriteria = KriteriaTujuan::all();
        $TipeData = 'Tujuan';
        return view('nilaikriteria', compact('TipeData', 'Kriteria'));
    }
    public function showNilaiTujuan()
    {
        $id = Auth::user()->id;
        $idMisi = Misi::all()[0]['id'];
        $allMisi = Misi::all();
        $Kriteria = Tujuan::where('misi_id', $idMisi)->get();
        $TipeData = 'Tujuan';
        $allKriteria = KriteriaTujuan::all();
        return view('nilaimisi', compact('TipeData', 'Kriteria', 'allKriteria', 'allMisi'));
    }
    public static function showNilaiTujuanById($id)
    {
        $idMisi = Misi::find($id)['id'];
        $allMisi = Misi::all();
        $id = Auth::user()->id;
        $Kriteria = Tujuan::where('misi_id', $idMisi)->get();
        $TipeData = 'Tujuan';
        $allKriteria = KriteriaTujuan::all();
        return view('nilaimisi', compact('TipeData', 'Kriteria', 'allKriteria','allMisi'));
    }
    public function addKriteriaTujuan()
    {
        $Kriteria = KriteriaTujuan::all();
        $TipeData = 'Tujuan';
        return view('inputkriteria', compact('TipeData', 'Kriteria')); 
    }
    public function storeKriteriaTujuan(request $request)
    {
        $validator = \Validator::make($request->all(), [
                    'kriteria' => 'required',
        ]);
        $validator->validate();
        

        $data = $request->only('kriteria');
        KriteriaTujuan::create($data);


        $Kriteria = KriteriaTujuan::all();
        $TipeData = 'Tujuan';
        
        return view('inputkriteria', compact('TipeData', 'Kriteria')); 
       
    }
    public function storeNilaiKriteriaTujuan(Request $request)
    {
        $id = Auth::user()->id;

        foreach ($request['kriteria'] as $key => $data) {
            $pilihan = explode("-",$key);
            $arr = [];
            $arr['kriteria_id'] = $pilihan[0];
            $arr['kriteria2_id'] = $pilihan[1];
            $arr['bobot'] = $data;
            $arr['user_id'] = $id;

            $bobotNya = BobotKriteriaTujuan::where([['user_id', $id], ['kriteria_id', $arr['kriteria_id']], ['kriteria2_id', $arr['kriteria2_id']]])->first();
            if($bobotNya!=null){
                $bobotNya->bobot = $arr['bobot'];
                $bobotNya->save();
            }
            else{
                BobotKriteriaTujuan::create($arr);
            }
        }

        $Kriteria = KriteriaTujuan::all();
        $TipeData = 'Tujuan';
        return view('nilaikriteria', compact('TipeData', 'Kriteria'));
    }
    public function storeNilaiTujuan(Request $request, KriteriaTujuan $kriteria)
    {
        $id = Auth::user()->id;
        $misiId = 0;

        foreach ($request['tujuan'] as $key => $data) {
            $pilihan = explode("-",$key);
            $arr = [];
            $arr['tujuan_id'] = $pilihan[0];
            $arr['tujuan2_id'] = $pilihan[1];
            $arr['bobot'] = $data;
            $arr['user_id'] = $id;
            $arr['kriteria_id'] = $kriteria['id'];

            $bobotNya = BobotTujuan::where([['user_id', $id], ['tujuan_id', $arr['tujuan_id']], ['tujuan2_id', $arr['tujuan2_id']], ['kriteria_id', $arr['kriteria_id']]])->first();
            if($bobotNya!=null){
                $bobotNya->bobot = $arr['bobot'];
                $bobotNya->save();
            }
            else{
                BobotTujuan::create($arr);
            }

            $misiId = Tujuan::find($pilihan[0])['misi_id'];
        }

        $id = Auth::user()->id;
        $allMisi = Misi::all();
        $idMisi = Misi::find($misiId)['id'];
        $Kriteria = Tujuan::where('misi_id', $idMisi)->get();
        $TipeData = 'Tujuan';
        $allKriteria = KriteriaTujuan::all();
        return view('nilaimisi', compact('TipeData', 'Kriteria', 'allKriteria','allMisi'));
    }

    public function storeEigenKriteriaTujuan(Request $request)
    {
        // return response()->json(['result' => $request['kriteria']]);
        $id = Auth::user()->id;
        if($request->has('eigen') && $request->has('kriteria')){
            for($i = 1; $i <= sizeof($request['kriteria']); $i++){
                $arr = [];
                $arr['eigen'] = $request['eigen'][$i];
                $arr['user_id'] = $id;
                $arr['kriteria_id'] = $i;

                $eigenNya = EigenKriteriaTujuan::where([['user_id', $id], ['kriteria_id', $i]])->first();
                if($eigenNya!=null){
                    $eigenNya->eigen = $arr['eigen'];
                    $eigenNya->save();
                }
                else{
                    EigenKriteriaTujuan::create($arr);
                }
            }
        }
        
        return response()->json(['result' => 'Berhasil']);
        
    }
    public function storeEigenTujuan(Request $request)
    {
        $id = Auth::user()->id;
        $allKriteria = KriteriaTujuan::all();
        if($request->has('eigen') && $request->has('kriteria')){
            foreach ($allKriteria as $kriteriaNya) {
                foreach ($request['eigen'][$kriteriaNya['id']] as $key => $value){
                    $arr = [];
                    $arr['tujuan_id'] = $key;
                    $arr['eigen'] = $request['eigen'][$kriteriaNya['id']][$key];
                    $arr['user_id'] = $id;
                    $arr['kriteria_id'] = $kriteriaNya['id'];

                    $eigenNya = EigenTujuan::where([['user_id', $arr['user_id']], ['kriteria_id', $arr['kriteria_id']], ['tujuan_id', $arr['tujuan_id']]])->first();
                    if($eigenNya!=null){
                        $eigenNya->eigen = $arr['eigen'];
                        $eigenNya->save();
                    }
                    else{
                        EigenTujuan::create($arr);
                    }
                }

            }
        }
        
        return response()->json(['result' => 'Berhasil']);
        
    }
    public function hasilAhpTujuan()
    {
        $id = Auth::user()->id;
        $VisiMisi = Visi::all()->first();
        $allMisi = $VisiMisi->misiSort;
        $Misis = $allMisi[3]->tujuan;
        $TipeData = 'Tujuan';
        $Kriterias = KriteriaTujuan::all();
        return view('hasilseleksi', compact('TipeData', 'Misis', 'Kriterias', 'allMisi'));
    }

    public function hasilAhpTujuanById($idMisi)
    {
        $id = Auth::user()->id;
        $VisiMisi = Visi::all()->first();
        $allMisi = $VisiMisi->misiSort;
        $Misis = Tujuan::where('misi_id', $idMisi)->get();
        $TipeData = 'Tujuan';
        $Kriterias = KriteriaTujuan::all();
        return view('hasilseleksi', compact('TipeData', 'Misis', 'Kriterias', 'allMisi'));
    }

    public function storeBobotTujuan(Request $request)
    {
        $id = Auth::user()->id;
        if($request->has('hasilBobot')){
            foreach ($request['hasilBobot'] as $key => $value) {
                $arr = [];
                $arr['bobot'] = $value;
                
                $tujuannya = Tujuan::where('id', $key)->first();
                
                if($tujuannya!=null){
                    $tujuannya->bobot = $arr['bobot'];
                    $tujuannya->save();
                }
            }
        }
        
        return response()->json(['result' => 'Berhasil']);
        
    }
}

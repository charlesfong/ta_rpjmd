<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\Input;
use App\Visi;
use App\Misi;
use App\Tujuan;
use App\Sasaran;
use App\KriteriaSasaran;
use App\BobotKriteriaSasaran;
use App\EigenKriteriaSasaran;
use App\BobotSasaran;
use App\EigenSasaran;

class SasaranController extends Controller
{
	public function addSasaran()
    { 
        $VisiMisi = Visi::all();
        return view('inputsasaran',compact('VisiMisi'));
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

    public function showTujuan(Request $request){
        if ($request->has('id')) {
            $tujuans = Tujuan::where('misi_id', $request->input('id'))->get();
            return response()->json(['result' => $tujuans]);
        } 
        else {
            return response()->json(['result' => 'Gagal!!']);
        }
    }

    public function showSasaran(Request $request)
    {
        $Misis = Misi::all()->sortByDesc('bobot');
        return view('showsasaran',compact('Misis'));
    }

    public function storeSasaran(request $request)
    {      
    	$validator = \Validator::make($request->all(), [
    				'sasaran' => 'required',
                    'tujuan' => 'required',
        ]);
        $validator->validate();

        $data = $request->only('tujuan');
        $data['tujuan_id'] = $data['tujuan'];
        $data['sasaran'] = $request->sasaran;
        $data['user_id'] = Auth::user()->id;
        foreach ($request->sasaran as $data['sasaran']) {
            Sasaran::create($data);
        }

        $VisiMisi = Visi::all();
        return view('inputsasaran',compact('VisiMisi'));
    }

    //AHPshowNilaiSasaran
    ///blom selesai
    public function showKriteriaSasaran()
    {
        $Kriteria = KriteriaSasaran::all();
        $TipeData = 'Sasaran';
        return view('nilaikriteria', compact('TipeData', 'Kriteria'));
    }
    public function showNilaiSasaran()
    {
        $id = Auth::user()->id;
        $idMisi = Misi::all()[0]->tujuan[0]['id'];
        $allMisi = Misi::all();
        $Kriteria = Sasaran::where('tujuan_id', $idMisi)->get();
        $TipeData = 'Sasaran';
        $allKriteria = KriteriaSasaran::all();
        return view('nilaimisi', compact('TipeData', 'Kriteria', 'allKriteria', 'allMisi'));
    }
    public static function showNilaiSasaranById($id)
    {
        $idMisi = Tujuan::find($id)['id'];
        $allMisi = Misi::all();
        $id = Auth::user()->id;
        $Kriteria = Sasaran::where('tujuan_id', $idMisi)->get();
        $TipeData = 'Sasaran';
        $allKriteria = KriteriaSasaran::all();
        return view('nilaimisi', compact('TipeData', 'Kriteria', 'allKriteria','allMisi'));
    }
    public function addKriteriaSasaran()
    {
        $Kriteria = KriteriaSasaran::all();
        $TipeData = 'Sasaran';
        return view('inputkriteria', compact('TipeData', 'Kriteria')); 
    }
    public function storeKriteriaSasaran(request $request)
    {
        $validator = \Validator::make($request->all(), [
                    'kriteria' => 'required',
        ]);
        $validator->validate();
        

        $data = $request->only('kriteria');
        KriteriaSasaran::create($data);


        $Kriteria = KriteriaSasaran::all();
        $TipeData = 'Sasaran';
        
        return view('inputkriteria', compact('TipeData', 'Kriteria')); 
       
    }
    public function storeNilaiKriteriaSasaran(Request $request)
    {
        $id = Auth::user()->id;

        foreach ($request['kriteria'] as $key => $data) {
            $pilihan = explode("-",$key);
            $arr = [];
            $arr['kriteria_id'] = $pilihan[0];
            $arr['kriteria2_id'] = $pilihan[1];
            $arr['bobot'] = $data;
            $arr['user_id'] = $id;

            $bobotNya = BobotKriteriaSasaran::where([['user_id', $id], ['kriteria_id', $arr['kriteria_id']], ['kriteria2_id', $arr['kriteria2_id']]])->first();
            if($bobotNya!=null){
                $bobotNya->bobot = $arr['bobot'];
                $bobotNya->save();
            }
            else{
                BobotKriteriaSasaran::create($arr);
            }
        }

        $Kriteria = KriteriaSasaran::all();
        $TipeData = 'Sasaran';
        return view('nilaikriteria', compact('TipeData', 'Kriteria'));
    }
    public function storeNilaiSasaran(Request $request, KriteriaSasaran $kriteria)
    {
        $id = Auth::user()->id;
        $misiId = 0;

        foreach ($request['sasaran'] as $key => $data) {
            $pilihan = explode("-",$key);
            $arr = [];
            $arr['sasaran_id'] = $pilihan[0];
            $arr['sasaran2_id'] = $pilihan[1];
            $arr['bobot'] = $data;
            $arr['user_id'] = $id;
            $arr['kriteria_id'] = $kriteria['id'];

            $bobotNya = BobotSasaran::where([['user_id', $id], ['sasaran_id', $arr['sasaran_id']], ['sasaran2_id', $arr['sasaran2_id']], ['kriteria_id', $arr['kriteria_id']]])->first();
            if($bobotNya!=null){
                $bobotNya->bobot = $arr['bobot'];
                $bobotNya->save();
            }
            else{
                BobotSasaran::create($arr);
            }

            $misiId = Sasaran::find($pilihan[0])['tujuan_id'];
        }

        $id = Auth::user()->id;
        $allMisi = Misi::all();
        $idMisi = Tujuan::find($misiId)['id'];
        $Kriteria = Sasaran::where('tujuan_id', $idMisi)->get();
        $TipeData = 'Sasaran';
        $allKriteria = KriteriaSasaran::all();
        return view('nilaimisi', compact('TipeData', 'Kriteria', 'allKriteria','allMisi'));
    }

    public function storeEigenKriteriaSasaran(Request $request)
    {
        // return response()->json(['result' => $request['kriteria']]);
        $id = Auth::user()->id;
        if($request->has('eigen') && $request->has('kriteria')){
            for($i = 1; $i <= sizeof($request['kriteria']); $i++){
                $arr = [];
                $arr['eigen'] = $request['eigen'][$i];
                $arr['user_id'] = $id;
                $arr['kriteria_id'] = $i;
                $eigenNya = EigenKriteriaSasaran::where([['user_id', $id], ['kriteria_id', $i]])->first();
                if($eigenNya!=null){
                    $eigenNya->eigen = $arr['eigen'];
                    $eigenNya->save();
                }
                else{
                    EigenKriteriaSasaran::create($arr);
                }
            }
        }
        
        return response()->json(['result' => 'Berhasil']);
        
    }
    public function storeEigenSasaran(Request $request)
    {
        $id = Auth::user()->id;
        $allKriteria = KriteriaSasaran::all();
        if($request->has('eigen') && $request->has('kriteria')){
            foreach ($allKriteria as $kriteriaNya) {
                foreach ($request['eigen'][$kriteriaNya['id']] as $key => $value){
                    $arr = [];
                    $arr['sasaran_id'] = $key;
                    $arr['eigen'] = $request['eigen'][$kriteriaNya['id']][$key];
                    $arr['user_id'] = $id;
                    $arr['kriteria_id'] = $kriteriaNya['id'];

                    $eigenNya = EigenSasaran::where([['user_id', $arr['user_id']], ['kriteria_id', $arr['kriteria_id']], ['sasaran_id', $arr['sasaran_id']]])->first();
                    if($eigenNya!=null){
                        $eigenNya->eigen = $arr['eigen'];
                        $eigenNya->save();
                    }
                    else{
                        EigenSasaran::create($arr);
                    }
                }

            }
        }
        
        return response()->json(['result' => 'Berhasil']);
        
    }
    public function hasilAhpSasaran()
    {
        $id = Auth::user()->id;
        $VisiMisi = Visi::where('user_id', $id)->first();
        $allMisi = $VisiMisi->misiSort;
        $Misis = $allMisi[1]->tujuan[0]->sasaran;
        $TipeData = 'Sasaran';
        $Kriterias = KriteriaSasaran::all();
        return view('hasilseleksi', compact('TipeData', 'Misis', 'Kriterias', 'allMisi'));
    }

    public function hasilAhpSasaranById($idMisi)
    {
        $id = Auth::user()->id;
        $VisiMisi = Visi::where('user_id', $id)->first();
        $allMisi = $VisiMisi->misiSort;
        $Misis = Sasaran::where('tujuan_id', $idMisi)->get();
        $TipeData = 'Sasaran';
        $Kriterias = KriteriaSasaran::all();
        return view('hasilseleksi', compact('TipeData', 'Misis', 'Kriterias', 'allMisi'));
    }

    public function storeBobotSasaran(Request $request)
    {
        $id = Auth::user()->id;
        if($request->has('hasilBobot')){
            foreach ($request['hasilBobot'] as $key => $value) {
                $arr = [];
                $arr['bobot'] = $value;
                
                $sasaranNya = Sasaran::where('id', $key)->first();
                
                if($sasaranNya!=null){
                    $sasaranNya->bobot = $arr['bobot'];
                    $sasaranNya->save();
                }
            }
        }
        
        return response()->json(['result' => 'Berhasil']);
        
    }
}

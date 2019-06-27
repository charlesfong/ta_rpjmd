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
use App\Indikator;
use App\KriteriaIndikator;
use App\BobotKriteriaIndikator;
use App\EigenKriteriaIndikator;

class IndikatorController extends Controller
{
    public function addIndikator()
    { 
        $VisiMisi = Visi::all();
        return view('inputindikator',compact('VisiMisi'));
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

    public function showSasaran(Request $request){
        if ($request->has('id')) {
            $sasarans = Sasaran::where('tujuan_id', $request->input('id'))->get();
            return response()->json(['result' => $sasarans]);
        } 
        else {
            return response()->json(['result' => 'Gagal!!']);
        }
    }

    public function showIndikator(Request $request)
    {
        $Misis = Misi::all()->sortByDesc('bobot');
        return view('showindikator',compact('Misis'));
    }

    public function storeIndikator(request $request)
    {
    	$validator = \Validator::make($request->all(), [
    				'indikator' => 'required',
        ]);
        $validator->validate();


        
        $idx = 0;
        foreach ($request->indikator as $data['indikator']) {
            if($request->has('misi')){
                $data['misi_id'] = $request->misi;
                $data['tujuan_id'] = null; 
                $data['sasaran_id'] = null;     
            }
	        if($request->has('tujuan')){
		        $data['tujuan_id'] = $request->tujuan;  
                $data['misi_id'] = null; 
                $data['sasaran_id'] = null;       	
	        }
	        if($request->has('sasaran')){
		        $data['sasaran_id'] = $request->sasaran; 
                $data['tujuan_id'] = null; 
                $data['misi_id'] = null;            	
	        }
	        $data['user_id'] = Auth::user()->id;

	        $data['n-2'] = $request->input('n-2')[$idx];
	        $data['n'] = $request->input('n')[$idx];
	        $data['n+1'] = $request->input('n+1')[$idx];
	        $data['n+2'] = $request->input('n+2')[$idx];
	        $data['n+3'] = $request->input('n+3')[$idx];
	        $data['kondisi_akhir'] = $request->input('kondisi_akhir')[$idx];
            // dd($data);
            Indikator::create($data);
            $idx++;
        }

        $VisiMisi = Visi::all();
        return view('inputindikator',compact('VisiMisi'));
    }


    //AHPshowNilaiIndikator
    public function showKriteriaIndikator()
    {
        $Kriteria = KriteriaIndikator::all();
        $TipeData = 'Indikator';
        return view('nilaikriteria', compact('TipeData', 'Kriteria'));
    }
    public function showNilaiIndikator(Request $request)
    {
        $id = Auth::user()->id;
        $idMisi = Misi::all()[0]->tujuan[0]['id'];
        $allMisi = Misi::all();
        $Kriteria = Indikator::all();

        if($Kriteria != null){
            if($Kriteria[0]->sasaran != null){
                $Kriteria = Indikator::where('sasaran_id', $Kriteria[0]->sasaran['id'])->get();
            }
            else if($Kriteria[0]->tujuan != null){
                $Kriteria = Indikator::where('tujuan_id', $Kriteria[0]->tujuan['id'])->get();
            }
            else if($Kriteria[0]->misi != null){
                $Kriteria = Indikator::where('misi_id', $Kriteria[0]->misi['id'])->get();
            }   

            if($request->has('id') && $request->has('type')){
                if($request->type == 'sasaran'){
                    $Kriteria = Indikator::where('sasaran_id', $request->id)->get();
                }
                else if($request->type == 'tujuan'){
                    $Kriteria = Indikator::where('tujuan_id', $request->id)->get();
                }
                else if($request->type == 'misi'){
                    $Kriteria = Indikator::where('misi_id', $request->id)->get();
                }  
            }
        }
        $TipeData = 'Indikator';
        $allKriteria = KriteriaIndikator::all();
        return view('nilaimisi', compact('TipeData', 'Kriteria', 'allKriteria', 'allMisi'));
    }
    public static function showNilaiIndikatorById($id)//belum
    {
        dd($id);
        $idMisi = Tujuan::find($id)['id'];
        $allMisi = Misi::all();
        $id = Auth::user()->id;
        $Kriteria = Sasaran::where('tujuan_id', $idMisi)->get();
        $TipeData = 'Sasaran';
        $allKriteria = KriteriaSasaran::all();
        return view('nilaimisi', compact('TipeData', 'Kriteria', 'allKriteria','allMisi'));
    }
    public function addKriteriaIndikator()
    {
        $Kriteria = KriteriaIndikator::all();
        $TipeData = 'Indikator';
        return view('inputkriteria', compact('TipeData', 'Kriteria')); 
    }
    public function storeKriteriaIndikator(request $request)
    {
        $validator = \Validator::make($request->all(), [
                    'kriteria' => 'required',
        ]);
        $validator->validate();
        

        $data = $request->only('kriteria');
        KriteriaIndikator::create($data);


        $Kriteria = KriteriaIndikator::all();
        $TipeData = 'Indikator';
        
        return view('inputkriteria', compact('TipeData', 'Kriteria')); 
       
    }
    public function storeNilaiKriteriaIndikator(Request $request)
    {
        $id = Auth::user()->id;

        foreach ($request['kriteria'] as $key => $data) {
            $pilihan = explode("-",$key);
            $arr = [];
            $arr['kriteria_id'] = $pilihan[0];
            $arr['kriteria2_id'] = $pilihan[1];
            $arr['bobot'] = $data;
            $arr['user_id'] = $id;

            $bobotNya = BobotKriteriaIndikator::where([['user_id', $id], ['kriteria_id', $arr['kriteria_id']], ['kriteria2_id', $arr['kriteria2_id']]])->first();
            if($bobotNya!=null){
                $bobotNya->bobot = $arr['bobot'];
                $bobotNya->save();
            }
            else{
                BobotKriteriaIndikator::create($arr);
            }
        }

        $Kriteria = KriteriaIndikator::all();
        $TipeData = 'Indikator';
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

    public function storeEigenKriteriaIndikator(Request $request)
    {
        // return response()->json(['result' => $request['kriteria']]);
        $id = Auth::user()->id;
        if($request->has('eigen') && $request->has('kriteria')){
            for($i = 1; $i <= sizeof($request['kriteria']); $i++){
                $arr = [];
                $arr['eigen'] = $request['eigen'][$i];
                $arr['user_id'] = $id;
                $arr['kriteria_id'] = $i;
                $eigenNya = EigenKriteriaIndikator::where([['user_id', $id], ['kriteria_id', $i]])->first();
                if($eigenNya!=null){
                    $eigenNya->eigen = $arr['eigen'];
                    $eigenNya->save();
                }
                else{
                    EigenKriteriaIndikator::create($arr);
                }
            }
        }
        
        return response()->json(['result' => 'Berhasil']);
        
    }
}

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
        	$data['misi_id'] = $request->misi;
	        if($request->has('tujuan')){
		        $data['tujuan_id'] = $request->tujuan;    	
	        }
	        if($request->has('sasaran')){
		        $data['sasaran_id'] = $request->sasaran;        	
	        }
	        $data['user_id'] = Auth::user()->id;

	        $data['n-2'] = $request->input('n-2')[$idx];
	        $data['n'] = $request->input('n')[$idx];
	        $data['n+1'] = $request->input('n+1')[$idx];
	        $data['n+2'] = $request->input('n+2')[$idx];
	        $data['n+3'] = $request->input('n+3')[$idx];
	        $data['kondisi_akhir'] = $request->input('kondisi_akhir')[$idx];
            Indikator::create($data);
            $idx++;
        }

        $VisiMisi = Visi::all();
        return view('inputindikator',compact('VisiMisi'));
    }
}

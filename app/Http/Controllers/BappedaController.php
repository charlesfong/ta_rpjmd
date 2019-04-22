<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\Input;
use App\Tujuan;
use App\Visi;
use App\Misi;

class BappedaController extends Controller
{
    public function showInputTujuan()
    { 
        $VisiMisi = Visi::all();
        return view('bappeda.inputtujuan',compact('VisiMisi'));
    }
    public function showMisi(Request $request)
    {
        // return response()->json(['result' => 'Gagal!!']);
    	if ($request->has('id')) {
            $misis = Misi::where('visi_id', $request->input('id'))->get();
            return response()->json(['result' => $misis]);
        } 
        else {
            return response()->json(['result' => 'Gagal!!']);
        }
    }
    public function showTujuan()
    {
        // $id=Auth::user()->id;
        // $tujuan = tujuanDraftModel::where('id_bappeda', $id)->get();
        // return view('bappeda.showtujuan',compact('tujuan')); 
    }
    public function storeTujuan(request $request)
    {
        // $id=Auth::user()->id;
        
        // foreach ($request->tujuan as $tujuans) {
        // $draft_tujuan= new tujuanDraftModel(
        //         array(

        //             'id_visi'     => $request->visi,
        //             'id_misi'     => $request->misi,
        //             'id_bappeda'  => $id,
        //             'isi_tujuan'  => $tujuans
        //         )
        //     );
        // $draft_tujuan->save();
        // }

        // $dataVisi = visiDraftModel::all();
        // $datamisi = misiDraftModel::all();
        // return view('bappeda.inputtujuan',compact('dataVisi','datamisi'));
       
    }
}

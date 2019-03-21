<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\visiDraftModel;
use App\misiDraftModel;
use App\tujuanDraftModel;

class BappedaController extends Controller
{
    public function showInputTujuan()
    {
    	$dataVisi = visiDraftModel::all();
        $datamisi = misiDraftModel::all();
        return view('bappeda.inputtujuan',compact('dataVisi','datamisi'));
    }
    public function readDataMisiDraft(request $request)
    {
    	if ($request->has('id')) {
            $dataMisi = DB::select('Select * from misi_draft where id_visi = :idz', ['idz' => $request->get('id')]);
            // $dataMisi = misiDraftModel::find($request->get('id'));
            return response()->json(['result' => $dataMisi]);
        } else {
            return response()->json(['result' => 'Gagal!!']);
        }
    }
    public function showTujuan()
    {
        $id=Auth::user()->id;
        $tujuan = tujuanDraftModel::where('id_bappeda', $id)->get();
        return view('bappeda.showtujuan',compact('tujuan')); 
    }
    public function storeTujuan(request $request)
    {
        $id=Auth::user()->id;
        
        foreach ($request->tujuan as $tujuans) {
        $draft_tujuan= new tujuanDraftModel(
                array(

                    'id_visi'     => $request->visi,
                    'id_misi'     => $request->misi,
                    'id_bappeda'  => $id,
                    'isi_tujuan'  => $tujuans
                )
            );
        $draft_tujuan->save();
        }

        $dataVisi = visiDraftModel::all();
        $datamisi = misiDraftModel::all();
        return view('bappeda.inputtujuan',compact('dataVisi','datamisi'));
       
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\DraftModel;
use App\misiDraftModel;
use App\visiDraftModel;

class KepalaDaerahController extends Controller
{
    public function showInputVisiMisi()
    {
        return view('kepaladaerah.inputvisimisi');
    }
    public function showVisiMisi()
    {
    	// $datavisimisi=DB::select('SELECT visi_draft.id_draft as id_draft, visi_draft.isi_visi as visi,visi_draft.id_kd as kd_id,misi_draft.isi_misi as misi FROM visi_draft inner join misi_draft on visi_draft.id_draft=misi_draft.id_draft');
        $datavisimisi=DB::select('SELECT visi_draft.id as id_visi, visi_draft.isi_visi as visi,visi_draft.id_kd as kd_id,misi_draft.isi_misi as misi FROM visi_draft inner join misi_draft on visi_draft.id=misi_draft.id_visi');
        return view('kepaladaerah.showvisimisi', ['datavisimisi' => $datavisimisi]); 
    }
    public function storeVisiMisi(request $request)
    {
    	$id=Auth::user()->id;
    	// $draft= new DraftModel(
     //        );
     //    $draft->save();
        // $get_last_draft_id=DB::select('SELECT id FROM draft order by id desc limit 1');
     //    $get_last_draft_id= json_decode( json_encode($get_last_draft_id), true);
        
        $draft_visi=new visiDraftModel(
            array(
                    // 'id_draft'  => $get_last_draft_id[0]['id'],
                    'id_kd'     => $id,
                    'isi_visi'  => $request->visi
                )
        );
        $draft_visi->save();
        $get_last_visi_id=DB::select('SELECT id FROM visi_draft order by id desc limit 1');
        $get_last_visi_id= json_decode( json_encode($get_last_visi_id), true);
        // return response()->json(['success' => $get_last_visi_id]);
        foreach ($request->misi as $misis) {
        $draft_misi= new misiDraftModel(
        		array(
        			// 'id_draft'	=> $get_last_draft_id[0]['id'],

                    'id_visi'   => $get_last_visi_id[0]['id'],
        			'id_kd'		=> $id,
        			'isi_misi'	=> $misis
        		)
        	);
        $draft_misi->save();
		}
		
        return view('kepaladaerah.inputvisimisi');
       
    }
}

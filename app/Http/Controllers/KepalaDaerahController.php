<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Visi;
use App\Misi;
use App\User;
use DB;

class KepalaDaerahController extends Controller
{
    public function showInputVisiMisi()
    {
        return view('kepaladaerah.inputvisimisi');
    }
    public function showVisiMisi()
    {
        $id = Auth::user()->id;
        $VisiMisi = Visi::where('user_id', $id)->first();
        return view('kepaladaerah.showvisimisi', compact('VisiMisi')); 
    }
    public function storeVisiMisi(request $request)
    {
        $validator = \Validator::make($request->all(), [
                    'visi' => 'required',
                    'misi' => 'required',
        ]);
        $validator->validate();
        

        $data = $request->only('visi', 'misi');
        $data['user_id'] = Auth::user()->id;
        $visi = Visi::create($data);

        $tempMisi = [];
        foreach ($data['misi'] as $misiNya) {
            $tempMisi['misi'] = $misiNya;
            $tempMisi['visi_id'] = $visi->id;
            $misi = Misi::create($tempMisi);
        }
        // dd($data['misi']);
		
        return view('kepaladaerah.inputvisimisi');
       
    }
}

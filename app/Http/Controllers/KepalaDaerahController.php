<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Visi;
use App\Misi;
use App\User;
use App\KriteriaMisi;
use App\BobotKriteriaMisi;
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

    //AHP
    public function showKriteriaMisi()
    {
        $Kriteria = KriteriaMisi::all();
        $TipeData = 'Misi';
        return view('nilaikriteria', compact('TipeData', 'Kriteria'));
    }
    public function addKriteriaMisi()
    {
        $Kriteria = KriteriaMisi::all();
        $TipeData = 'Misi';
        return view('inputkriteria', compact('TipeData', 'Kriteria')); 
    }
    public function storeKriteriaMisi(request $request)
    {
        $validator = \Validator::make($request->all(), [
                    'kriteria' => 'required',
        ]);
        $validator->validate();
        

        $data = $request->only('kriteria');
        KriteriaMisi::create($data);


        $Kriteria = KriteriaMisi::all();
        $TipeData = 'Misi';
        
        return view('inputkriteria', compact('TipeData', 'Kriteria')); 
       
    }
    public function storeNilaiKriteriaMisi(Request $request)
    {
        $id = Auth::user()->id;

        foreach ($request['kriteria'] as $key => $data) {
            $pilihan = explode("-",$key);
            $arr = [];
            $arr['kriteria_id'] = $pilihan[0];
            $arr['kriteria2_id'] = $pilihan[1];
            $arr['bobot'] = $data;
            $arr['user_id'] = $id;

            $bobotNya = BobotKriteriaMisi::where([['user_id', $id], ['kriteria_id', $arr['kriteria_id']], ['kriteria2_id', $arr['kriteria2_id']]])->first();
            if($bobotNya!=null){
                $bobotNya->bobot = $arr['bobot'];
                $bobotNya->save();
            }
            else{
                BobotKriteriaMisi::create($arr);
            }
        }

        $Kriteria = KriteriaMisi::all();
        $TipeData = 'Misi';
        return view('nilaikriteria', compact('TipeData', 'Kriteria'));
    }
}

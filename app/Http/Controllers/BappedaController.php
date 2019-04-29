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


class BappedaController extends Controller
{
    public function addTujuan()
    { 
        $VisiMisi = Visi::all();
        return view('bappeda.inputtujuan',compact('VisiMisi'));
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
    // public function showNilaiMisi()
    // {
    //     $id = Auth::user()->id;
    //     $VisiMisi = Visi::where('user_id', $id)->first();
    //     $Kriteria = $VisiMisi->misi;
    //     $TipeData = 'Misi';
    //     $allKriteria = KriteriaMisi::all();
    //     return view('nilaimisi', compact('TipeData', 'Kriteria', 'allKriteria'));
    // }
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
}

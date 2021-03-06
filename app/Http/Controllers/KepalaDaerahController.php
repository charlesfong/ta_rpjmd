<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Visi;
use App\Misi;
use App\User;
use App\KriteriaMisi;
use App\BobotKriteriaMisi;
use App\EigenKriteriaMisi;
use App\BobotKriteriaTujuan;
use App\EigenKriteriaTujuan;
use App\BobotKriteriaSasaran;
use App\EigenKriteriaSasaran;
use App\BobotKriteriaIndikator;
use App\EigenKriteriaIndikator;
use App\BobotMisi;
use App\EigenMisi;
use App\BobotTujuan;
use App\EigenTujuan;
use App\BobotSasaran;
use App\EigenSasaran;
use App\BobotIndikator;
use App\EigenIndikator;
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
        $VisiMisi = Visi::whereNotNull('id')->first();
        return view('kepaladaerah.showvisimisi', compact('VisiMisi')); 
    }
    public function storeVisiMisi(request $request)
    {
        $validator = \Validator::make($request->all(), [
                    'misi' => 'required',
        ]);
        $validator->validate();
        
        if($request->has('visi')){
            $data = $request->only('visi', 'misi');
            $data['user_id'] = Auth::user()->id;
            $visi = Visi::create($data);

            $tempMisi = [];
            foreach ($data['misi'] as $misiNya) {
                $tempMisi['misi'] = $misiNya;
                $tempMisi['visi_id'] = $visi->id;
                $misi = Misi::create($tempMisi);
            }
        }
        else{
            $data = $request->only('misi');
            $data['user_id'] = Auth::user()->id;

            $tempMisi = [];
            foreach ($data['misi'] as $misiNya) {
                $tempMisi['misi'] = $misiNya;
                $tempMisi['visi_id'] = Visi::all()->first()['id'];
                $misi = Misi::create($tempMisi);
            }
        }
		
        return view('kepaladaerah.inputvisimisi');
       
    }

    public function delete(Request $request){
        $validator = \Validator::make($request->all(), [
                    'id' => 'required',
                    'type' => 'required',
                ]);
        $validator->validate();

        if($request['type'] == "visi"){
            $visiNya = Visi::find($request['id']);
            if($visiNya != null){
                BobotIndikator::truncate();
                EigenIndikator::truncate();
                BobotSasaran::truncate();
                EigenSasaran::truncate();
                BobotTujuan::truncate();
                EigenTujuan::truncate();
                BobotMisi::truncate();
                EigenMisi::truncate();

                foreach ($visiNya->misiSort as $misiNya) {
                    foreach ($misiNya->indikatorSort as $indikatorNya) {
                        $indikatorNya->delete();
                    }
                    foreach ($misiNya->tujuanSort as $tujuanNya) {
                        foreach ($tujuanNya->indikatorSort as $indikatorNya) {
                            $indikatorNya->delete();
                        }
                        foreach ($tujuanNya->sasaranSort as $sasaranNya) {
                            foreach ($sasaranNya->indikatorSort as $indikatorNya) {
                                $indikatorNya->delete();
                            }
                            $sasaranNya->delete();
                        }
                        $tujuanNya->delete();
                    }
                    $misiNya->delete();
                }
                $visiNya->delete();
            }
        }
        else{
            $misiNya = Misi::find($request['id']);
            if($misiNya != null){
                BobotIndikator::truncate();
                EigenIndikator::truncate();
                BobotSasaran::truncate();
                EigenSasaran::truncate();
                BobotTujuan::truncate();
                EigenTujuan::truncate();
                BobotMisi::truncate();
                EigenMisi::truncate();
                foreach ($misiNya->indikatorSort as $indikatorNya) {
                    $indikatorNya->delete();
                }
                foreach ($misiNya->tujuanSort as $tujuanNya) {
                    foreach ($tujuanNya->indikatorSort as $indikatorNya) {
                        $indikatorNya->delete();
                    }
                    foreach ($tujuanNya->sasaranSort as $sasaranNya) {
                        foreach ($sasaranNya->indikatorSort as $indikatorNya) {
                            $indikatorNya->delete();
                        }
                        $sasaranNya->delete();
                    }
                    $tujuanNya->delete();
                }
                $misiNya->delete();
            }
        }
        return $this->showVisiMisi();
    }

    public function update(Request $request){
        $validator = \Validator::make($request->all(), [
                    'id' => 'required',
                    'type' => 'required',
                    'content' => 'required',
                ]);
        $validator->validate();

        if($request['type'] == "visi"){
            $visiNya = Visi::find($request['id']);            
            if($visiNya != null){
                $visiNya['visi'] = $request['content'];
                $visiNya->save();

                BobotIndikator::truncate();
                EigenIndikator::truncate();
                BobotSasaran::truncate();
                EigenSasaran::truncate();
                BobotTujuan::truncate();
                EigenTujuan::truncate();
                BobotMisi::truncate();
                EigenMisi::truncate();
            }
        }
        else{
            $misiNya = Misi::find($request['id']);
            if($misiNya != null){
                $misiNya['misi'] = $request['content'];
                $misiNya->save();

                BobotIndikator::truncate();
                EigenIndikator::truncate();
                BobotSasaran::truncate();
                EigenSasaran::truncate();
                BobotTujuan::truncate();
                EigenTujuan::truncate();
                BobotMisi::truncate();
                EigenMisi::truncate();
            }
        }
        return $this->showVisiMisi();
    }

    public function editVisi(Request $request) {
        if ($request->has('id')) {
            $visiNya = Visi::find($request->get('id'));
            return response()->json(['result' => $visiNya]);
        } else {
            return response()->json(['result' => 'Gagal!!']);
        }
    }

    public function editMisi(Request $request) {
        if ($request->has('id')) {
            $misiNya = Misi::find($request->get('id'));
            return response()->json(['result' => $misiNya]);
        } else {
            return response()->json(['result' => 'Gagal!!']);
        }
    }

    //AHPshowNilaiMisi
    public function deleteKriteria(Request $request){
        $validator = \Validator::make($request->all(), [
                    'id' => 'required',
                ]);
        $validator->validate();

        $objNya = KriteriaMisi::find($request['id']);
        if($objNya != null){
            BobotKriteriaIndikator::truncate();
            EigenKriteriaIndikator::truncate();
            BobotKriteriaSasaran::truncate();
            EigenKriteriaSasaran::truncate();
            BobotKriteriaTujuan::truncate();
            EigenKriteriaTujuan::truncate();
            BobotKriteriaMisi::truncate();
            EigenKriteriaMisi::truncate();

            $objNya->delete();
        }
        return $this->addKriteriaMisi();
    }

    public function updateKriteria(Request $request){
        $validator = \Validator::make($request->all(), [
                    'id' => 'required',
                    'content' => 'required',
                ]);
        $validator->validate();

        $objNya = KriteriaMisi::find($request['id']);            
        if($objNya != null){
            $objNya['kriteria'] = $request['content'];
            $objNya->save();

            BobotKriteriaIndikator::truncate();
            EigenKriteriaIndikator::truncate();
            BobotKriteriaSasaran::truncate();
            EigenKriteriaSasaran::truncate();
            BobotKriteriaTujuan::truncate();
            EigenKriteriaTujuan::truncate();
            BobotKriteriaMisi::truncate();
            EigenKriteriaMisi::truncate();
        }
        return $this->addKriteriaMisi();
    }

    public function editKriteria(Request $request) {
        if ($request->has('id')) {
            $objNya = KriteriaMisi::find($request->get('id'));
            return response()->json(['result' => $objNya]);
        } else {
            return response()->json(['result' => 'Gagal!!']);
        }
    }

    public function showKriteriaMisi()
    {
        $Kriteria = KriteriaMisi::all();
        $TipeData = 'Misi';
        return view('nilaikriteria', compact('TipeData', 'Kriteria'));
    }
    public function showNilaiMisi()
    {
        $id = Auth::user()->id;
        $VisiMisi = Visi::whereNotNull('id')->first();
        $Kriteria = $VisiMisi->misi;
        $TipeData = 'Misi';
        $allKriteria = KriteriaMisi::all();
        return view('nilaimisi', compact('TipeData', 'Kriteria', 'allKriteria'));
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
    public function storeNilaiMisi(Request $request, KriteriaMisi $kriteria)
    {
        $id = Auth::user()->id;
        
        foreach ($request['misi'] as $key => $data) {
            $pilihan = explode("-",$key);
            $arr = [];
            $arr['misi_id'] = $pilihan[0];
            $arr['misi2_id'] = $pilihan[1];
            $arr['bobot'] = $data;
            $arr['user_id'] = $id;
            $arr['kriteria_id'] = $kriteria['id'];

            $bobotNya = BobotMisi::where([['user_id', $id], ['misi_id', $arr['misi_id']], ['misi2_id', $arr['misi2_id']], ['kriteria_id', $arr['kriteria_id']]])->first();
            if($bobotNya!=null){
                $bobotNya->bobot = $arr['bobot'];
                $bobotNya->save();
            }
            else{
                BobotMisi::create($arr);
            }
        }

        $id = Auth::user()->id;
        $VisiMisi = Visi::where('user_id', $id)->first();
        $Kriteria = $VisiMisi->misi;
        $TipeData = 'Misi';
        $allKriteria = KriteriaMisi::all();
        return view('nilaimisi', compact('TipeData', 'Kriteria', 'allKriteria'));
    }
    public function storeEigenKriteriaMisi(Request $request)
    {
        $id = Auth::user()->id;
        if($request->has('eigen') && $request->has('kriteria')){
            for($i = 1; $i <= sizeof($request['kriteria']); $i++){
                $arr = [];
                $arr['eigen'] = $request['eigen'][$i];
                $arr['user_id'] = $id;
                $arr['kriteria_id'] = $i;

                $eigenNya = EigenKriteriaMisi::where([['user_id', $id], ['kriteria_id', $i]])->first();
                if($eigenNya!=null){
                    $eigenNya->eigen = $arr['eigen'];
                    $eigenNya->save();
                }
                else{
                    EigenKriteriaMisi::create($arr);
                }
            }
        }
        
        return response()->json(['result' => 'Berhasil']);
        
    }
    public function storeEigenMisi(Request $request)
    {
        $id = Auth::user()->id;
        $allKriteria = KriteriaMisi::all();
        if($request->has('eigen') && $request->has('kriteria')){
            foreach ($allKriteria as $kriteriaNya) {
                foreach ($request['eigen'][$kriteriaNya['id']] as $key => $value){
                    $arr = [];
                    $arr['misi_id'] = $key;
                    $arr['eigen'] = $request['eigen'][$kriteriaNya['id']][$key];
                    $arr['user_id'] = $id;
                    $arr['kriteria_id'] = $kriteriaNya['id'];

                    $eigenNya = EigenMisi::where([['user_id', $arr['user_id']], ['kriteria_id', $arr['kriteria_id']], ['misi_id', $arr['misi_id']]])->first();
                    if($eigenNya!=null){
                        $eigenNya->eigen = $arr['eigen'];
                        $eigenNya->save();
                    }
                    else{
                        EigenMisi::create($arr);
                    }
                }

            }
        }
        
        return response()->json(['result' => 'Berhasil']);
        
    }
    public function hasilAhpMisi()
    {
        $isThereEigen = EigenMisi::all();
        //cek ada gk yg udah input
        if(sizeof($isThereEigen) > 0){
            $id = Auth::user()->id;
            $VisiMisi = Visi::whereNotNull('id')->first();
            $Misis = $VisiMisi->misiSort;
            $TipeData = 'Misi';
            $Kriterias = KriteriaMisi::all();
            return view('hasilseleksi', compact('TipeData', 'Misis', 'Kriterias'));
        }
        else{
            $host = parse_url(request()->headers->get('referer'), PHP_URL_HOST);
            return Redirect::away(request()->headers->get('referer'));
        }
       
    }
    public function storeBobotMisi(Request $request)
    {
        $id = Auth::user()->id;
        if($request->has('hasilBobot')){
            foreach ($request['hasilBobot'] as $key => $value) {
                $arr = [];
                $arr['bobot'] = $value;
                
                $misinya = Misi::where('id', $key)->first();
                
                if($misinya!=null){
                    $misinya->bobot = $arr['bobot'];
                    $misinya->save();
                }
            }
        }
        
        return response()->json(['result' => 'Berhasil']);
        
    }
}

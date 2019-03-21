<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\ModelUser;

class AdminController extends Controller
{
	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showtambahuser()
    {
        return view('admin.tambahuser');
    }
    public function storeUser(request $request)
    {   
        $user= new ModelUser(
            array(                
                'username' => $request->get('username'),
                'full_name'=> $request->get('full_name'),
                'password' => bcrypt('123'),
                'category' => $request->get('category'),
                )
            );
        $user->save();
        
        return redirect('/admin/home')
        ->with('status', 'User dengan nama '
            .$request->get('username').' sudah berhasil disimpan');
    }
    public function showUser()
    {
    	$results = DB::select('select * from users');
        return view('admin.seluruhuser', ['data' => $results]);
    }
    public function showaa()
    {
        $id=Auth::user()->id;
        $datadiri=DB::select('select username from users where id = :idz', ['idz' => $id]);
        $results = DB::select('select * from anakasuh');
        return view('admin.showaa', ['dataAA' => $results,'datadiri' => $datadiri]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use Hash;
use App\User;
use App\UserCategory;
use App\RoleUser;

class AdminController extends Controller
{
	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showtambahuser()
    {
        $categories = UserCategory::all();
        return view('admin.tambahuser', compact('categories'));
    }
    public function storeUser(request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => [
                'required',
                Rule::unique('users'),
            ],
            'password' => 'required|string|min:6',
            'category' => 'required|exists:user_categories,id',
        ]);
        $validator->validate();

        $user = new User(
            array(                
                'username' => $request->get('username'),
                'name'=> $request->get('name'),
                'password' =>  Hash::make($request->get('password')),
                'category_id' => $request->get('category'),
                )
            );
        $user->save();
        $role_user = new RoleUser(
            array(                
                'user_id' => $user->id,
                'user_category_id'=> $request->get('category'),
                )
            );
        $role_user->save();
        
        return redirect()->back()->with("success","berhasil!");
    }
    public function showUser()
    {
        $data = User::all();
        return view('admin.seluruhuser', compact('data'));
    }
    public function showaa()
    {
        $id=Auth::user()->id;
        $datadiri=DB::select('select username from users where id = :idz', ['idz' => $id]);
        $results = DB::select('select * from anakasuh');
        return view('admin.showaa', ['dataAA' => $results,'datadiri' => $datadiri]);
    }
}

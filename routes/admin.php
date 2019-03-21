<?php
Route::get('/showtambahuser', 'AdminController@showtambahuser');
Route::post('/storeUser', 'AdminController@storeUser');
Route::get('/showUser', 'AdminController@showUser');
Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('admin.home');
})->name('home');


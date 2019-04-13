<?php
Route::get('/showInputVisiMisi', 'KepalaDaerahController@showInputVisiMisi');
Route::post('/storeVisiMisi', 'KepalaDaerahController@storeVisiMisi');
Route::get('/showVisiMisi', 'KepalaDaerahController@showVisiMisi');
Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('kepaladaerah')->user();

    //dd($users);

    return view('kepaladaerah.home');
})->name('home');


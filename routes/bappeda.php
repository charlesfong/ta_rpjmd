<?php
Route::get('/showInputTujuan', 'BappedaController@showInputTujuan');
Route::get('/showTujuan', 'BappedaController@showTujuan');
// Route::post('/readDataMisiDraft', 'BappedaController@readDataMisiDraft')->name('readDataMisiDraft');
Route::post('/storeTujuan', 'BappedaController@storeTujuan');
Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('bappeda')->user();

    //dd($users);

    return view('bappeda.home');
})->name('home');


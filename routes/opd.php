<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('opd')->user();

    //dd($users);

    return view('opd.home');
})->name('home');


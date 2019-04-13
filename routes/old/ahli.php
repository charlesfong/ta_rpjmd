<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('ahli')->user();

    //dd($users);

    return view('ahli.home');
})->name('home');


<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('/login', function () {
    return view('login');
});

Route::group(['prefix' => 'bappeda'], function () {
  Route::get('/login', 'BappedaAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'BappedaAuth\LoginController@login');
  Route::get('/logout', 'BappedaAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'BappedaAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'BappedaAuth\RegisterController@register');

  Route::post('/password/email', 'BappedaAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'BappedaAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'BappedaAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'BappedaAuth\ResetPasswordController@showResetForm');
  Route::get('/readDataMisiDraft', 'BappedaController@readDataMisiDraft')->name('readDataMisiDraft');
});

Route::group(['prefix' => 'opd'], function () {
  Route::get('/login', 'OpdAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'OpdAuth\LoginController@login');
  Route::post('/logout', 'OpdAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'OpdAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'OpdAuth\RegisterController@register');

  Route::post('/password/email', 'OpdAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'OpdAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'OpdAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'OpdAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'ahli'], function () {
  Route::get('/login', 'AhliAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AhliAuth\LoginController@login');
  Route::post('/logout', 'AhliAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AhliAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AhliAuth\RegisterController@register');

  Route::post('/password/email', 'AhliAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AhliAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AhliAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AhliAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'umum'], function () {
  Route::get('/login', 'UmumAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'UmumAuth\LoginController@login');
  Route::post('/logout', 'UmumAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'UmumAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'UmumAuth\RegisterController@register');

  Route::post('/password/email', 'UmumAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'UmumAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'UmumAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'UmumAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'kepaladaerah'], function () {
  Route::get('/login', 'KepaladaerahAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'KepaladaerahAuth\LoginController@login');
  Route::get('/logout', 'KepaladaerahAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'KepaladaerahAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'KepaladaerahAuth\RegisterController@register');

  Route::post('/password/email', 'KepaladaerahAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'KepaladaerahAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'KepaladaerahAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'KepaladaerahAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::get('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});
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

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('showLogin');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/dashboard', function () { return view('dashboard'); })->middleware('auth')->name('dashboard');

Route::group(['prefix' => 'kepaladaerah'], function () {
	Route::get('/', function () { return view('dashboard'); })->name('dashboard');
	Route::get('/browse-visimisi', 'KepalaDaerahController@showVisiMisi')->name('browseVisiMisi');
	Route::get('/add-visimisi', 'KepalaDaerahController@showInputVisiMisi')->name('addVisiMisi');
	Route::post('/store-visimisi', 'KepalaDaerahController@storeVisiMisi')->name('storeVisiMisi');

	//khusus AHP
	Route::get('/nilai-kriteria-misi', 'KepalaDaerahController@showKriteriaMisi')->name('showKriteriaMisi');
	Route::get('/nilai-misi', 'KepalaDaerahController@showNilaiMisi')->name('showNilaiMisi');
	Route::get('/add-kriteria-misi', 'KepalaDaerahController@addKriteriaMisi')->name('addKriteriaMisi');
	Route::get('/hasil-ahp-misi', 'KepalaDaerahController@hasilAhpMisi')->name('hasilAhpMisi');
	Route::post('/store-kriteria-misi', 'KepalaDaerahController@storeKriteriaMisi')->name('storeKriteriaMisi');
	Route::post('/store-nilai-kriteria-misi', 'KepalaDaerahController@storeNilaiKriteriaMisi')->name('storeNilaiKriteriaMisi');
	Route::post('/store-nilai-misi/{kriteria}', 'KepalaDaerahController@storeNilaiMisi')->name('storeNilaiMisi');
	Route::post('/store-eigen-kriteria-misi/', 'KepalaDaerahController@storeEigenKriteria')->name('storeEigenKriteria');
	Route::post('/store-eigen-misi/', 'KepalaDaerahController@storeEigenMisi')->name('storeEigenMisi');
	Route::post('/store-bobot-misi/', 'KepalaDaerahController@storeBobotMisi')->name('storeBobotMisi');
});

Route::group(['prefix' => 'bappeda'], function () {
	Route::get('/', function () { return view('dashboard'); })->name('dashboard');
	Route::get('/browse-tujuan', 'BappedaController@showTujuan')->name('browseTujuan');
	Route::get('/add-tujuan', 'BappedaController@addTujuan')->name('addTujuan');
	Route::post('/store-tujuan', 'BappedaController@storeTujuan')->name('storeTujuan');
	Route::get('/show-misi', 'BappedaController@showMisi')->name('showMisi');

	//khusus AHP
	Route::get('/nilai-kriteria-tujuan', 'BappedaController@showKriteriaTujuan')->name('showKriteriaTujuan');
	Route::get('/nilai-tujuan', 'BappedaController@showNilaiTujuan')->name('showNilaiTujuan');
	Route::get('/add-kriteria-tujuan', 'BappedaController@addKriteriaTujuan')->name('addKriteriaTujuan');
	Route::get('/hasil-ahp-tujuan', 'BappedaController@hasilAhpTujuan')->name('hasilAhpTujuan');
	Route::post('/store-kriteria-tujuan', 'BappedaController@storeKriteriaTujuan')->name('storeKriteriaTujuan');
	Route::post('/store-nilai-kriteria-tujuan', 'BappedaController@storeNilaiKriteriaTujuan')->name('storeNilaiKriteriaTujuan');
	Route::post('/store-nilai-tujuan/{kriteria}', 'BappedaController@storeNilaiTujuan')->name('storeNilaiTujuan');
	Route::post('/store-eigen-kriteria-tujuan/', 'BappedaController@storeEigenKriteria')->name('storeEigenKriteria');
	Route::post('/store-eigen-tujuan/', 'BappedaController@storeEigenTujuan')->name('storeEigenTujuan');
	Route::post('/store-bobot-tujuan/', 'BappedaController@storeBobotTujuan')->name('storeBobotTujuan');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
	Route::get('/', function () { return view('dashboard'); })->name('dashboard');
	Route::get('/browse-user', 'AdminController@showUser')->name('browseUser');
	Route::get('/add-user', 'AdminController@showtambahuser')->name('addUser');
	Route::post('/store-user', 'AdminController@storeUser')->name('storeUser');
});

// Route::group(['prefix' => 'opd', 'middleware' => 'auth'], function () {
// 	Route::get('/', function () { return view('dashboard'); })->name('dashboard');
// 	Route::get('/browse-tujuan', 'OpdController@showTujuan')->name('browseTujuan');
// 	Route::get('/add-tujuan', 'OpdController@showInputTujuan')->name('addTujuan');
// 	Route::post('/store-tujuan', 'OpdController@storeTujuan')->name('storeTujuan');
// 	Route::get('/show-misi', 'OpdController@showMisi')->name('showMisi');
// });

// Route::group(['prefix' => 'bappeda'], function () {
//   Route::get('/login', 'BappedaAuth\LoginController@showLoginForm')->name('login');
//   Route::post('/login', 'BappedaAuth\LoginController@login');
//   Route::get('/logout', 'BappedaAuth\LoginController@logout')->name('logout');

//   Route::get('/register', 'BappedaAuth\RegisterController@showRegistrationForm')->name('register');
//   Route::post('/register', 'BappedaAuth\RegisterController@register');

//   Route::post('/password/email', 'BappedaAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
//   Route::post('/password/reset', 'BappedaAuth\ResetPasswordController@reset')->name('password.email');
//   Route::get('/password/reset', 'BappedaAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
//   Route::get('/password/reset/{token}', 'BappedaAuth\ResetPasswordController@showResetForm');
//   Route::get('/readDataMisiDraft', 'BappedaController@readDataMisiDraft')->name('readDataMisiDraft');
// });

// Route::group(['prefix' => 'opd'], function () {
//   Route::get('/login', 'OpdAuth\LoginController@showLoginForm')->name('login');
//   Route::post('/login', 'OpdAuth\LoginController@login');
//   Route::post('/logout', 'OpdAuth\LoginController@logout')->name('logout');

//   Route::get('/register', 'OpdAuth\RegisterController@showRegistrationForm')->name('register');
//   Route::post('/register', 'OpdAuth\RegisterController@register');

//   Route::post('/password/email', 'OpdAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
//   Route::post('/password/reset', 'OpdAuth\ResetPasswordController@reset')->name('password.email');
//   Route::get('/password/reset', 'OpdAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
//   Route::get('/password/reset/{token}', 'OpdAuth\ResetPasswordController@showResetForm');
// });

// Route::group(['prefix' => 'ahli'], function () {
//   Route::get('/login', 'AhliAuth\LoginController@showLoginForm')->name('login');
//   Route::post('/login', 'AhliAuth\LoginController@login');
//   Route::post('/logout', 'AhliAuth\LoginController@logout')->name('logout');

//   Route::get('/register', 'AhliAuth\RegisterController@showRegistrationForm')->name('register');
//   Route::post('/register', 'AhliAuth\RegisterController@register');

//   Route::post('/password/email', 'AhliAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
//   Route::post('/password/reset', 'AhliAuth\ResetPasswordController@reset')->name('password.email');
//   Route::get('/password/reset', 'AhliAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
//   Route::get('/password/reset/{token}', 'AhliAuth\ResetPasswordController@showResetForm');
// });

// Route::group(['prefix' => 'umum'], function () {
//   Route::get('/login', 'UmumAuth\LoginController@showLoginForm')->name('login');
//   Route::post('/login', 'UmumAuth\LoginController@login');
//   Route::post('/logout', 'UmumAuth\LoginController@logout')->name('logout');

//   Route::get('/register', 'UmumAuth\RegisterController@showRegistrationForm')->name('register');
//   Route::post('/register', 'UmumAuth\RegisterController@register');

//   Route::post('/password/email', 'UmumAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
//   Route::post('/password/reset', 'UmumAuth\ResetPasswordController@reset')->name('password.email');
//   Route::get('/password/reset', 'UmumAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
//   Route::get('/password/reset/{token}', 'UmumAuth\ResetPasswordController@showResetForm');
// });

// Route::group(['prefix' => 'kepaladaerah'], function () {
//   Route::get('/login', 'KepaladaerahAuth\LoginController@showLoginForm')->name('login');
//   Route::post('/login', 'KepaladaerahAuth\LoginController@login');
//   Route::get('/logout', 'KepaladaerahAuth\LoginController@logout')->name('logout');

//   Route::get('/register', 'KepaladaerahAuth\RegisterController@showRegistrationForm')->name('register');
//   Route::post('/register', 'KepaladaerahAuth\RegisterController@register');

//   Route::post('/password/email', 'KepaladaerahAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
//   Route::post('/password/reset', 'KepaladaerahAuth\ResetPasswordController@reset')->name('password.email');
//   Route::get('/password/reset', 'KepaladaerahAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
//   Route::get('/password/reset/{token}', 'KepaladaerahAuth\ResetPasswordController@showResetForm');

//   Route::get('/visimisi', 'KepalaDaerahController@showInputVisiMisi')->name('showVisiMisiInput');
// });

// Route::group(['prefix' => 'admin'], function () {
//   Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
//   Route::post('/login', 'AdminAuth\LoginController@login');
//   Route::get('/logout', 'AdminAuth\LoginController@logout')->name('logout');

//   Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
//   Route::post('/register', 'AdminAuth\RegisterController@register');

//   Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
//   Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
//   Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
//   Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
// });

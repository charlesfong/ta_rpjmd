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

Route::group(['prefix' => 'visimisi'], function () {
	Route::get('/', function () { return view('dashboard'); })->name('dashboard');
	Route::get('/browse-visimisi', 'KepalaDaerahController@showVisiMisi')->name('browseVisiMisi');
	Route::get('/add-visimisi', 'KepalaDaerahController@showInputVisiMisi')->name('addVisiMisi');
	Route::post('/store-visimisi', 'KepalaDaerahController@storeVisiMisi')->name('storeVisiMisi');
	Route::post('/delete-visimisi', 'KepalaDaerahController@delete')->name('deleteVisiMisi');
	Route::post('/update-visimisi', 'KepalaDaerahController@update')->name('updateVisiMisi');
	Route::post('/edit-visi', 'KepalaDaerahController@editVisi')->name('editVisi');
	Route::post('/edit-misi', 'KepalaDaerahController@editMisi')->name('editMisi');

	//khusus AHP
	Route::get('/nilai-kriteria-misi', 'KepalaDaerahController@showKriteriaMisi')->name('showKriteriaMisi');
	Route::get('/nilai-misi', 'KepalaDaerahController@showNilaiMisi')->name('showNilaiMisi');
	Route::get('/add-kriteria-misi', 'KepalaDaerahController@addKriteriaMisi')->name('addKriteriaMisi');
	Route::get('/hasil-ahp-misi', 'KepalaDaerahController@hasilAhpMisi')->name('hasilAhpMisi');
	Route::post('/store-kriteria-misi', 'KepalaDaerahController@storeKriteriaMisi')->name('storeKriteriaMisi');
	Route::post('/store-nilai-kriteria-misi', 'KepalaDaerahController@storeNilaiKriteriaMisi')->name('storeNilaiKriteriaMisi');
	Route::post('/store-nilai-misi/{kriteria}', 'KepalaDaerahController@storeNilaiMisi')->name('storeNilaiMisi');
	Route::post('/store-eigen-kriteria-misi/', 'KepalaDaerahController@storeEigenKriteriaMisi')->name('storeEigenKriteriaMisi');
	Route::post('/store-eigen-misi/', 'KepalaDaerahController@storeEigenMisi')->name('storeEigenMisi');
	Route::post('/store-bobot-misi/', 'KepalaDaerahController@storeBobotMisi')->name('storeBobotMisi');
});

Route::group(['prefix' => 'tujuan'], function () {
	Route::get('/', function () { return view('dashboard'); })->name('dashboard');
	Route::get('/browse-tujuan', 'BappedaController@showTujuan')->name('browseTujuan');
	Route::get('/add-tujuan', 'BappedaController@addTujuan')->name('addTujuan');
	Route::post('/store-tujuan', 'BappedaController@storeTujuan')->name('storeTujuan');
	Route::get('/show-misi', 'BappedaController@showMisi')->name('showMisi');
	Route::post('/delete-tujuan', 'BappedaController@delete')->name('deleteTujuan');
	Route::post('/update-tujuan', 'BappedaController@update')->name('updateTujuan');
	Route::post('/edit-tujuan', 'BappedaController@edit')->name('editTujuan');

	//khusus AHP
	Route::get('/nilai-kriteria-tujuan', 'BappedaController@showKriteriaTujuan')->name('showKriteriaTujuan');
	Route::get('/nilai-tujuan', 'BappedaController@showNilaiTujuan')->name('showNilaiTujuan');
	Route::get('/nilai-tujuan/{id}', 'BappedaController@showNilaiTujuanById')->name('showNilaiTujuanById');
	Route::get('/add-kriteria-tujuan', 'BappedaController@addKriteriaTujuan')->name('addKriteriaTujuan');
	Route::get('/hasil-ahp-tujuan', 'BappedaController@hasilAhpTujuan')->name('hasilAhpTujuan');
	Route::get('/hasil-ahp-tujuan/{idMisi}', 'BappedaController@hasilAhpTujuanById')->name('hasilAhpTujuanById');
	Route::post('/store-kriteria-tujuan', 'BappedaController@storeKriteriaTujuan')->name('storeKriteriaTujuan');
	Route::post('/store-nilai-kriteria-tujuan', 'BappedaController@storeNilaiKriteriaTujuan')->name('storeNilaiKriteriaTujuan');
	Route::post('/store-nilai-tujuan/{kriteria}', 'BappedaController@storeNilaiTujuan')->name('storeNilaiTujuan');
	Route::post('/store-eigen-kriteria-tujuan/', 'BappedaController@storeEigenKriteriaTujuan')->name('storeEigenKriteriaTujuan');
	Route::post('/store-eigen-tujuan/', 'BappedaController@storeEigenTujuan')->name('storeEigenTujuan');
	Route::post('/store-bobot-tujuan/', 'BappedaController@storeBobotTujuan')->name('storeBobotTujuan');
});

Route::group(['prefix' => 'sasaran'], function () {
	Route::get('/', function () { return view('dashboard'); })->name('dashboard');
	Route::get('/browse-sasaran', 'SasaranController@showSasaran')->name('browseSasaran');
	Route::get('/add-sasaran', 'SasaranController@addSasaran')->name('addSasaran');
	Route::post('/store-sasaran', 'SasaranController@storeSasaran')->name('storeSasaran');
	Route::get('/show-misi', 'SasaranController@showMisi')->name('showMisi');
	Route::get('/show-tujuan', 'SasaranController@showTujuan')->name('showTujuan');
	Route::post('/delete-sasaran', 'SasaranController@delete')->name('deleteSasaran');
	Route::post('/update-sasaran', 'SasaranController@update')->name('updateSasaran');
	Route::post('/edit-sasaran', 'SasaranController@edit')->name('editSasaran');

	//khusus AHP
	Route::get('/nilai-kriteria-sasaran', 'SasaranController@showKriteriaSasaran')->name('showKriteriaSasaran');
	Route::get('/nilai-sasaran', 'SasaranController@showNilaiSasaran')->name('showNilaiSasaran');
	Route::get('/nilai-sasaran/{id}', 'SasaranController@showNilaiSasaranById')->name('showNilaiSasaranById');
	Route::get('/add-kriteria-sasaran', 'SasaranController@addKriteriaSasaran')->name('addKriteriaSasaran');
	Route::get('/hasil-ahp-sasaran', 'SasaranController@hasilAhpSasaran')->name('hasilAhpSasaran');
	Route::get('/hasil-ahp-sasaran/{idMisi}', 'SasaranController@hasilAhpSasaranById')->name('hasilAhpSasaranById');
	Route::post('/store-kriteria-sasaran', 'SasaranController@storeKriteriaSasaran')->name('storeKriteriaSasaran');
	Route::post('/store-nilai-kriteria-sasaran', 'SasaranController@storeNilaiKriteriaSasaran')->name('storeNilaiKriteriaSasaran');
	Route::post('/store-nilai-sasaran/{kriteria}', 'SasaranController@storeNilaiSasaran')->name('storeNilaiSasaran');
	Route::post('/store-eigen-kriteria-sasaran/', 'SasaranController@storeEigenKriteriaSasaran')->name('storeEigenKriteriaSasaran');
	Route::post('/store-eigen-sasaran/', 'SasaranController@storeEigenSasaran')->name('storeEigenSasaran');
	Route::post('/store-bobot-sasaran/', 'SasaranController@storeBobotSasaran')->name('storeBobotSasaran');
});


Route::group(['prefix' => 'indikator'], function () {
	Route::get('/', function () { return view('dashboard'); })->name('dashboard');
	Route::get('/browse-indikator', 'IndikatorController@showIndikator')->name('browseIndikator');
	Route::get('/add-indikator', 'IndikatorController@addIndikator')->name('addIndikator');
	Route::post('/store-indikator', 'IndikatorController@storeIndikator')->name('storeIndikator');
	Route::get('/show-misi', 'IndikatorController@showMisi')->name('showMisi');
	Route::get('/show-tujuan', 'IndikatorController@showTujuan')->name('showTujuan');
	Route::get('/show-sasaran', 'IndikatorController@showSasaran')->name('showSasaran');

	//khusus AHP
	Route::get('/nilai-kriteria-indikator', 'IndikatorController@showKriteriaIndikator')->name('showKriteriaIndikator');
	Route::get('/nilai-indikator', 'IndikatorController@showNilaiIndikator')->name('showNilaiIndikator');
	Route::get('/nilai-indikator/{id}', 'IndikatorController@showNilaiIndikatorById')->name('showNilaiIndikatorById');
	Route::get('/add-kriteria-indikator', 'IndikatorController@addKriteriaIndikator')->name('addKriteriaIndikator');
	Route::get('/hasil-ahp-indikator', 'IndikatorController@hasilAhpIndikator')->name('hasilAhpIndikator');
	Route::get('/hasil-ahp-indikator/{idMisi}', 'IndikatorController@hasilAhpIndikatorById')->name('hasilAhpIndikatorById');
	Route::post('/store-kriteria-indikator', 'IndikatorController@storeKriteriaIndikator')->name('storeKriteriaIndikator');
	Route::post('/store-nilai-kriteria-indikator', 'IndikatorController@storeNilaiKriteriaIndikator')->name('storeNilaiKriteriaIndikator');
	Route::post('/store-nilai-indikator/{kriteria}', 'IndikatorController@storeNilaiIndikator')->name('storeNilaiIndikator');
	Route::post('/store-eigen-kriteria-indikator/', 'IndikatorController@storeEigenKriteriaIndikator')->name('storeEigenKriteriaIndikator');
	Route::post('/store-eigen-indikator/', 'IndikatorController@storeEigenIndikator')->name('storeEigenIndikator');
	Route::post('/store-bobot-indikator/', 'IndikatorController@storeBobotIndikator')->name('storeBobotIndikator');
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

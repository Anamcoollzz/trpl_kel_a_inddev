<?php

Route::middleware('tahap_satu_selesai')->group(function(){
	Route::middleware('tahap_dua_selesai')->group(function(){

		Route::middleware('tahap_tiga_selesai')->group(function(){

			Route::get('/','BerandaController@index')->name('beranda');
			Route::get('/masuk','AuthController@formMasuk')->name('form-masuk');
			Route::get('/daftar','AuthController@formDaftar')->name('form-daftar');
			Route::post('/daftar','AuthController@daftar')->name('daftar');
			Route::post('/masuk','AuthController@masuk')->name('masuk');

			Route::get('/profil', 'ProfilController@index')->name('profil');
			Route::get('/profil/ubah', 'ProfilController@ubah')->name('profil.ubah');
			Route::put('/profil/update', 'ProfilController@update')->name('profil.update');
			Route::get('/profil/ubah-password', 'ProfilController@ubahPassword')->name('profil.ubah-password');
			Route::put('/profil/update-password', 'ProfilController@updatePassword')->name('profil.update-password');

		});

	});

});

Route::get('/keluar','AuthController@keluar')->name('member-keluar');

Route::middleware('auth')->group(function(){

	Route::get('/verifikasi/tahap-1','VerifikasiController@tahap1')->name('tahap1');
	Route::get('/verifikasi/tahap-2','VerifikasiController@tahap2')->name('tahap2');
	Route::get('/verifikasi/tahap-3','VerifikasiController@tahap3')->name('tahap3');
	Route::post('/verifikasi/tahap-1','VerifikasiController@tahap1Post')->name('tahap1-post');
	Route::post('/verifikasi/tahap-2','VerifikasiController@tahap2Post')->name('tahap2-post');
	Route::post('/verifikasi/tahap-3','VerifikasiController@tahap3Post')->name('tahap3-post');

});

Route::prefix('admin')->group(function(){
	Route::namespace('Admin')->middleware('auth','hanya_admin')->group(function(){
		Route::get('/','HomeController@index');
		Route::resource('kategori','KategoriController')->except('show');
		Route::resource('member','MemberController')->except('show');
		Route::get('/member/verifikasi/{member}','MemberController@verifikasi')->name('verifikasi-member');
		Route::resource('admin','AdminController')->except('show');
		Route::resource('developer','DeveloperController');
		Route::get('/keluar','AuthController@keluar')->name('keluar');
	});
	Auth::routes();
});

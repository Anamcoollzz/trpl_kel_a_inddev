<?php

Route::get('/','BerandaController@index')->name('beranda');
Route::get('/masuk','AuthController@formMasuk')->name('form-masuk');
Route::get('/daftar','AuthController@formDaftar')->name('form-daftar');
Route::get('/keluar','AuthController@keluar')->name('keluar');
Route::post('/daftar','AuthController@daftar')->name('daftar');
Route::post('/masuk','AuthController@masuk')->name('masuk');

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
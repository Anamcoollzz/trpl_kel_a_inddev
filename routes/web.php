<?php

Route::middleware('tahap_satu_selesai')->group(function(){
	Route::middleware('tahap_dua_selesai')->group(function(){

		Route::middleware('tahap_tiga_selesai')->group(function(){

			Route::get('/','BerandaController@index')->name('beranda');
			Route::get('/masuk','AuthController@formMasuk')->name('form-masuk');
			Route::get('/daftar','AuthController@formDaftar')->name('form-daftar');
			Route::post('/daftar','AuthController@daftar')->name('daftar');
			Route::post('/masuk','AuthController@masuk')->name('masuk');


			Route::middleware('member')->group(function(){

				Route::post('/daftar-keinginan/tambah', 'DaftarKeinginanController@store');
				Route::post('/produk/beli','ProdukController@beli')->name('beli');

				// KERANJANG BELANJA
				Route::get('/keranjang-belanja','KeranjangController@index')->name('keranjang');

				Route::get('/profil', 'ProfilController@index')->name('profil');
				Route::get('/profil/ubah', 'ProfilController@ubah')->name('profil.ubah');
				Route::put('/profil/update', 'ProfilController@update')->name('profil.update');
				Route::get('/profil/ubah-password', 'ProfilController@ubahPassword')->name('profil.ubah-password');
				Route::put('/profil/update-password', 'ProfilController@updatePassword')->name('profil.update-password');

				Route::post('/produk/hapus-gambar','ProdukController@hapusGambar')->name('produk.hapus-gambar');
				Route::post('/produk/hapus-screenshot','ProdukController@hapusScreenshot')->name('produk.hapus-screenshot');
				Route::delete('/produk/hapus-logo','ProdukController@hapusLogo')->name('produk.hapus-logo');
				Route::get('/produk/saya','ProdukController@saya')->name('produk.saya');
				Route::get('/produk/saya/{produk}/ubah', 'ProdukController@edit')->name('produk.ubah');
				Route::put('/produk/saya/{produk}', 'ProdukController@update')->name('produk.update');
				Route::delete('/produk/saya/{produk}', 'ProdukController@destroy')->name('produk.destroy');
				Route::resource('produk','ProdukController')->except('show','edit','update');
				Route::post('/produk/upload-gambar','ProdukController@uploadGambar')->name('produk.upload-gambar');
				Route::put('/produk/upload-gambar','ProdukController@uploadGambar');
				Route::post('/produk/checkout','ProdukController@checkout')->name('checkout');

				# TRANSAKSI
				Route::get('/transaksi/{transaksi}/invoice', 'TransaksiController@invoice')->name('invoice');
				Route::resource('transaksi', 'TransaksiController');
				Route::put('/transaksi/bayar/{transaksi}', 'TransaksiController@bayar')->name('bayar');

				# NOTIFIKASI
				Route::get('/notifikasi', 'NotifikasiController@index')->name('notifikasi');
			});

		});

	});

});

Route::get('/kategori/{id}', 'ProdukController@byKategori')->name('produk.by-kategori');
Route::get('/produk/pencarian','ProdukController@pencarian')->name('produk.pencarian');
Route::get('/produk/terbaru','ProdukController@terbaru')->name('produk.terbaru');
Route::get('/produk/terpopuler','ProdukController@terpopuler')->name('produk.terpopuler');
Route::resource('produk','ProdukController')->only('show');
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
		Route::resource('rekening','RekeningController');

		# PRODUK
		Route::get('/produk', 'ProdukController@index')->name('admin.produk.index');
		Route::put('/produk/{produk}/tolak', 'ProdukController@tolak')->name('admin.produk.tolak');
		Route::put('/produk/{produk}/verifikasi', 'ProdukController@verifikasi')->name('admin.produk.verifikasi');
		Route::get('/produk/{produk}/detail', 'ProdukController@detail')->name('admin.produk.detail');

		# PENGATURAN
		Route::get('/pengaturan/privacy-policy', 'PengaturanController@privacyPolicy')->name('pengaturan.privacy-policy');
		Route::post('/pengaturan/privacy-policy', 'PengaturanController@privacyPolicyPost')->name('pengaturan.privacy-policy-post');

		# TRANSAKSI
		Route::get('/transaksi', 'TransaksiController@index')->name('admin.transaksi.index');
		Route::put('/transaksi/{transaksi}/tolak', 'TransaksiController@tolak')->name('admin.transaksi.tolak');
		Route::put('/transaksi/{transaksi}/verifikasi', 'TransaksiController@verifikasi')->name('admin.transaksi.verifikasi');
		Route::get('/transaksi/{transaksi}/detail', 'TransaksiController@detail')->name('admin.transaksi.detail');
		Route::put('/transaksi/{transaksi}/pembayaran-valid', 'TransaksiController@pembayaranValid')->name('pembayaran-valid');
	});
	Auth::routes();
});

Route::get('/kontol', function(){
	return \App\Pengaturan::all();
});
<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaksi;

class TransaksiController extends Controller
{

	public function index()
	{
		$data = Transaksi::with('user')->latest()->paginate(100);
		return view('transaksi.index', [
			'data'      => $data,
			'title'     => 'Transaksi',
			'active'    => 'transaksi.index',
			'createLink'=>false,
			'role'=>'admin'
		]);
	}

	public function detail(Transaksi $transaksi)
    {
        $transaksi->load('user', 'detail.produk.user');
        return view('transaksi.detail', [
            'd'      => $transaksi,
            'title'     => 'Detail Transaksi',
            'active'    => 'transaksi.index',
            'modul_link'=>route('admin.transaksi.index'),
            'modul'=>'Transaksi',
        ]);
    }

}

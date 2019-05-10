<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PencairanSaldo;
use App\Produk;
use App\Notifikasi;
use Auth;

class PencairanSaldoController extends Controller
{

	public function index()
	{
		$data = PencairanSaldo::with('user','rekening')->latest()->paginate(100);
		return view('pencairan-saldo.index', [
			'data'      => $data,
			'title'     => 'Pencairan Saldo',
			'active'    => 'pencairan-saldo.index',
			'createLink'=>false,
			'role'=>'admin'
		]);
	}

    public function terima(Request $request, PencairanSaldo $pencairan)
    {
        $request->validate([
            'bukti_transfer'=>[
                'required',
                'mimes:jpeg,png',
            ],
        ]);
        $bukti_transfer = uploadPath($request->file('bukti_transfer'),'pencairan-saldo');
        $pencairan->bukti_transfer = $bukti_transfer;
        $pencairan->status = 'success';
        $pencairan->save();
        // set notifikasi
        $notifikasi = new Notifikasi();
        $notifikasi->isi = 'Pencairan saldo sebesar '.rp($pencairan->jumlah).' berhasil diverifikasi. <a href="'.route('pencairan-saldo').'">Lihat</a>';
        $notifikasi->tipe = 'success';
        $notifikasi->user_id = $pencairan->user_id;
        $notifikasi->save();
        return redirect()->back()->with('success_msg', 'Pencairan saldo berhasil diverifikasi');
    }

    // public function tolak(PencairanSaldo $pencairan)
    // {
    //     # code...
    // }


}

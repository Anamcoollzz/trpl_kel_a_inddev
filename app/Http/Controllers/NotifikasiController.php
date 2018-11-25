<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifikasi;
use Auth;

class NotifikasiController extends Controller
{

	public function index()
	{
		$notifikasi = Notifikasi::where('user_id',Auth::id())->latest()->get();
		Notifikasi::whereIn('user_id', $notifikasi->pluck('user_id'))->update([
			'sudah_dibaca'=>'sudah',
		]);
		return view('frontend.notifikasi.saya',[
			'title'=>'Notifikasi Saya',
			'data'=>$notifikasi,
		]);
	}

}

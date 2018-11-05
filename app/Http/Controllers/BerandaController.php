<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Banner;
use App\Produk;

class BerandaController extends Controller
{
	
	public function index()
	{
		$mingguIni 		= Produk::with('user','kategori')->verified()->where('created_at', '>=', date('Y-m-d',strtotime('-7 days')))->take(5)->get();
		$populer 		= Produk::with('user','kategori')->verified()->orderBy('dibeli','desc')->take(16)->get();
		$terbaru 		= Produk::with('user','kategori')->verified()->latest()->take(16)->get();
		$seringDilihat 	= Produk::with('user','kategori')->verified()->orderBy('hit','desc')->take(16)->get();
		$kategori 		= Kategori::orderBy('nama')->get();
		$banner 		= Banner::take(3)->active()->latest()->get();
		return view('frontend.beranda.index',[
			'mingguIni'		=> $mingguIni,
			'populer'		=> $populer,
			'seringDilihat'	=> $seringDilihat,
			'terbaru'		=> $terbaru,
			'kategori'		=> $kategori,
			'banner'		=> $banner,
		]);
	}

}

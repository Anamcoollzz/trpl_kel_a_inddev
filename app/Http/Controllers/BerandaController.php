<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;

class BerandaController extends Controller
{
	
	public function index()
	{
		return view('beranda.index');
	}

}

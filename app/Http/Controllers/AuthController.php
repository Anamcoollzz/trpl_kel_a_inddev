<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    
    public function formMasuk()
    {
    	return view('masuk.index');
    }

    public function formDaftar()
    {
    	return view('daftar.index');
    }

}

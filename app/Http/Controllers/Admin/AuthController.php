<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AuthController extends Controller
{

	public function keluar(Request $r)
	{
		Auth::logout();
		return redirect('admin/login');
	}

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProfilController extends Controller
{

	public function index()
	{
		return view('frontend.profil.index',[
			'title'=>'Profil Saya'
		]);
	}

	public function ubah()
	{
		return view('frontend.profil.ubah',[
			'title'=>'Ubah Profil'
		]);
	}

	public function update(Request $r)
	{
		$r->validate([
			'nama'=>'required',
			'no_hp'=>'required',
			'alamat'=>'required',
		]);

		Auth::user()->update([
			'nama'=>$r->nama,
			'no_hp'=>$r->no_hp,
			'alamat'=>$r->alamat,
			'jenis_kelamin'=>$r->jenis_kelamin,
			'tingkat_member'=>$r->jenis_member,
		]);

		return redirect()->route('profil')->with('msg', 'Profil berhasil diperbarui');
	}

	public function ubahPassword()
	{
		return view('frontend.profil.ubah-password',[
			'title'=>'Ubah Password'
		]);
	}

	public function updatePassword(Request $r)
	{
		$r->validate([
			'password'=>'required|confirmed',
			'password_confirmation'=>'required',
		]);

		Auth::user()->update([
			'password'=>bcrypt($r->password),
		]);

		return redirect()->route('profil')->with('msg', 'Password berhasil diperbarui');
	}

}

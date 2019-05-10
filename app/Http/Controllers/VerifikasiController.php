<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengaturan;

class VerifikasiController extends Controller
{

	public function tahap1(Request $r)
	{
		$tahap1 = false;
		$tahap2 = false;
		$tahap3 = false;
		if($r->user()->tahap_1 == 'sudah'){
			$tahap1 = true;
		}
		if($r->user()->tahap_2 == 'sudah'){
			$tahap2 = true;
		}
		if($r->user()->tahap_3 == 'sudah'){
			$tahap3 = true;
		}
		if($tahap1 == false){
			return view('verifikasi.tahap1',[
				'title'=>'Verifikasi tahap 1'
			]);
		}elseif($tahap2 == false){
			return redirect()->route('tahap2');
		}elseif($tahap3 == false){
			return redirect()->route('tahap3');
		}
		return redirect('');
	}

	public function tahap1Post(Request $r)
	{
		$r->validate([
			'nama'=>'required',
			'no_hp'=>'required',
			'email'=>'required|email|unique:users,email,'.$r->user()->id,
			// 'password'=>'required|min:5',
			'alamat'=>'required'
		]);
		$user = $r->user();
		$user->update([
			'nama'=>$r->nama,
			'no_hp'=>$r->no_hp,
			'email'=>$r->email,
			// 'password'=>bcrypt($r->password),
			'alamat'=>$r->alamat,
			'jenis_kelamin'=>$r->jenis_kelamin,
			'tingkat_member'=>$r->jenis_member,
			'nik'=>$r->nik,
			'tahap_1'=>'sudah',
		]);
		return redirect()->route('tahap2');
	}

	public function tahap2(Request $r)
	{
		$tahap2 = false;
		$tahap3 = false;
		if($r->user()->tahap_2 == 'sudah'){
			$tahap2 = true;
		}
		if($r->user()->tahap_3 == 'sudah'){
			$tahap3 = true;
		}
		if($tahap2 == false){
			return view('verifikasi.tahap2',[
				'title'=>'Verifikasi tahap 2'
			]);
		}elseif($tahap3 == false){
			return redirect()->route('tahap3');
		}
		return redirect('/');
	}

	public function tahap3(Request $r)
	{
		$tahap3 = false;
		if($r->user()->tahap_3 == 'sudah'){
			$tahap3 = true;
		}
		if($tahap3 == false){
			return view('verifikasi.tahap3',[
				'title'=>'Verifikasi tahap 3',
				'd'=>Pengaturan::where('key','privacy-policy')->first(),
			]);
		}
		return redirect('/');
	}

	public function tahap3Post(Request $r)
	{
		$user = $r->user();
		$user->update([
			'tahap_3'=>'sudah',
		]);
		return redirect('');
	}

}

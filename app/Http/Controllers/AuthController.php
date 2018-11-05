<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class AuthController extends Controller
{

    public function formMasuk()
    {
    	return view('masuk.index',[
            'title'=>'Masuk'
        ]);
    }

    public function formDaftar()
    {
    	return view('daftar.index',[
    		'title'=>'Daftar'
    	]);
    }

    public function daftar(Request $r)
    {
    	$r->validate([
    		'nama'=>'required',
    		// 'no_hp'=>'required',
    		'email'=>'required|email|unique:users',
    		'password'=>'required|min:5|confirmed',
            'password_confirmation'=>'required',
    		// 'alamat'=>'required'
    	]);
        User::create([
            'nama'=>$r->nama,
            // 'no_hp'=>$r->no_hp,
            'email'=>$r->email,
            'password'=>bcrypt($r->password),
            // 'alamat'=>$r->alamat,
        ]);
        if(Auth::attempt([
            'email'=>$r->email,
            'password'=>$r->password,
        ])){
            return redirect()->route('tahap1');
        }
        return redirect()->route('form-daftar')->with('msg', 'Terima kasih telah mendaftar. Menunggu verifikasi admin.');
    }

    public function masuk(Request $r)
    {
        $r->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        $user = User::where('email',$r->email)->first();
        if(is_null($user)){
            return redirect()->back()->with('error_msg','Akun tidak ditemukan');
        }
        if($user->status == 'pending'){
            return redirect()->back()->with('error_msg','Mohon maaf, akun anda belum diverifikasi admin');
        }
        if(Auth::check()){
            Auth::logout();
        }
        if(Auth::attempt([
            'email'=>$r->email,
            'password'=>$r->password,
        ])){
            return redirect('/');
        }
        return redirect()->back()->with('error_msg','Gagal masuk');
    }

    public function keluar()
    {
        Auth::logout();
        return redirect('/');
    }

}

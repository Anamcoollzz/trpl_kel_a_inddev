<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $r)
    {
        $r->validate([
            'email'=>'required|email|string',
            'password'=>'required|string',
        ]);
        $user = User::where('email',$r->email)->first();
        if($user){
            if($user->role == 'admin'){
                if(Hash::check($r->password, $user->password)){
                    if(Auth::attempt([
                        'email'=>$r->email,
                        'password'=>$r->password
                    ],$r->filled('remember'))){
                        return redirect('/admin');
                    }
                }else{
                    return redirect()->back()->with('error_msg','Password yang anda masukkan salah');
                }
            }
        }
        return redirect()->back()->with('error_msg','User tidak ditemukan');
    }
}

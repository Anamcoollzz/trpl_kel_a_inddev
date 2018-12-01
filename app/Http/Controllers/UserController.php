<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    public function profilDeveloper($email)
    {
    	$developer = User::where('email',$email)->first();
    	if(is_null($developer)){
    		abort(404);
    	}
    	return view('frontend.profil.developer',[
			'title'=>'Profil '.$developer->nama,
			'developer'=>$developer,
		]);
    }

}

<?php

use Illuminate\Database\Seeder;
use App\User;

class CreateDummyMember extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::updateOrCreate([
    		'email'=>'hairulanam21@gmail.com',
    	],[
    		'nama'=> "Hairul Anam",
    		'no_hp'=> "085322778935",
    		'alamat'=> 'Jl. PB Sudirman',
    		'role'=> "member",
    		'avatar'=> null,
    		'status'=> "verified",
    		'tahap_1'=> "sudah",
    		'tahap_2'=> "sudah",
    		'tahap_3'=> "sudah",
    		'tingkat_member'=> 'member',
    		'jenis_kelamin'=> 'Laki-laki',
    		'password'=>bcrypt('inddev'),
    	]);
    }
}

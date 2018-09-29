<?php

use Illuminate\Database\Seeder;
use App\User;

class GenerateUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate([
        	'email'=>'admin@admin.com'
        ],[
        	'password'=>bcrypt('admin'),
        	'role'=>'admin',
            'nama'=>'Administrator',
            'no_hp'=>'085322778935',
        ]);
    }
}

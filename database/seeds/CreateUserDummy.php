<?php

use Illuminate\Database\Seeder;

class CreateUserDummy extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = \Faker\Factory::create('id_ID');
    	foreach (range(1,100) as $i) {
    		$email = $faker->unique()->email;
    		$data[] = [
    			'nama'=>$faker->name, 
    			'email'=>$email, 
    			'password'=>bcrypt($email),
    			'no_hp'=>$faker->phoneNumber,
    			'alamat'=>$faker->address,
    			'role'=>'member',
    			'status'=>'verified',
    			'tahap_1'=>'sudah',
    			'tahap_2'=>'sudah',
    			'tahap_3'=>'sudah',
    			'jenis_kelamin'=>$faker->randomElement(['Laki-laki','Perempuan']),
    			'tingkat_member'=>$faker->randomElement(['cv','member']),
    			'created_at'=>date('Y-m-d H:i:s'),
    		];
    	}
    	\App\User::insert($data);
    	echo 'User dummy berhasil digenerate';
    }
}

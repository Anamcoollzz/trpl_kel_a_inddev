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
            $status = $faker->randomElement(['verified','pending']);
            $tahap_2 = 'belum';
            $tahap_3 = 'belum';
            if($status == 'verified'){
                $tahap_2 = 'sudah';
                $tahap_3 = 'sudah';
            }
            $data[] = [
               'nama'=>$faker->name, 
               'email'=>$email, 
               'password'=>bcrypt($email),
               'no_hp'=>$faker->phoneNumber,
               'alamat'=>$faker->address,
               'role'=>'member',
               'status'=>$status,
               'tahap_1'=>'sudah',
               'tahap_2'=>$tahap_2,
               'tahap_3'=>$tahap_3,
               'jenis_kelamin'=>$faker->randomElement(['Laki-laki','Perempuan']),
               'tingkat_member'=>$faker->randomElement(['cv','member']),
               'created_at'=>date('Y-m-d H:i:s',strtotime('-'.$faker->numberBetween(-10,365).' days')),
           ];
       }
       \App\User::insert($data);
       echo 'User dummy berhasil digenerate';
   }
}

<?php

use Illuminate\Database\Seeder;

class CreateDaftarKeinginanDummy extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = \Faker\Factory::create('id_ID');
    	$users = \App\User::where('role','member')->verified()->get()->pluck('id')->toArray();
    	$products = \App\Produk::all()->pluck('id')->toArray();
    	foreach ($users as $u) {
    		foreach (range(1,3) as $i) {
    			$data[] = [
    				'user_id'=>$u,
    				'id_produk'=>$faker->randomElement($products),
    			];
    		}
    	}
    	\App\DaftarKeinginan::insert($data);
    	echo 'DaftarKeinginan dummy berhasil digenerate';
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::updateOrCreate([
        	'nama'	=> 'Landing Page'
        ], [
        	'uri_routing' => 'landing-page'
        ]);
        Kategori::updateOrCreate([
        	'nama'	=> 'Sistem Informasi'
        ], [
        	'uri_routing' => 'sistem-informasi'
        ]);
        Kategori::updateOrCreate([
        	'nama'	=> 'IOT'
        ], [
        	'uri_routing' => 'iot'
        ]);
    }
}

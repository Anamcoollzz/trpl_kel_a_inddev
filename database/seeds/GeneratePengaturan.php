<?php

use Illuminate\Database\Seeder;
use App\Pengaturan;

class GeneratePengaturan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$pengaturan = '[{"id":1,"key":"email","value":"developer@inddev.com"},{"id":2,"key":"no_telp","value":"(0331) 8888 8888"},{"id":3,"key":"alamat","value":"<p>Jl Kalimantan, Jember<\/p>\r\n\t\t\t\t\t\t<p>Jawa Timur, Ind<\/p>"},{"id":4,"key":"privacy-policy","value":"<p><b>Ini halaman privacy policy<\/b><br><\/p>Blabla"}]';
    	$pengaturan = json_decode($pengaturan);
    	// dd($pengaturan);
    	foreach ($pengaturan as $p) {
    		Pengaturan::updateOrCreate([
    			'key'=>$p->key,
    		],[
    			'value'=>$p->value,
    		]);
    	}
    }
}

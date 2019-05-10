<?php

use Illuminate\Database\Seeder;

class CreateProdukDummy extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = \Faker\Factory::create('id_ID');
    	$users = \App\User::where('role','member')->get()->pluck('id')->toArray();
    	$categories = \App\Kategori::all()->pluck('id')->toArray();
    	foreach (range(1,100) as $i) {
            $status = $faker->randomElement(['verified','pending']);
            $file_path = '';
            $panduan_path = '';
            $bundling_path = '';
            $dibeli = 0;
            $terakhir_dilihat = null;
            $hit = 0;
            if($status == 'verified'){
                $file_path = 'http://inddev.anamapp.pro/storage/produk/dokumentasi/contohfileprojek.zip';
                $panduan_path = 'http://inddev.anamapp.pro/storage/produk/dokumentasi/contohfiledokumentasi.docx';
                $bundling_path = 'http://inddev.anamapp.pro/storage/produk/dokumentasi/contohfilebundling.zip';
                $dibeli = $faker->numberBetween(0, 100);
                $terakhir_dilihat = date('Y-m-d H:i:s',strtotime('-'.$faker->randomElement(range(1,30)).' days')-$faker->numberBetween(1000,10000));
                $hit = $faker->numberBetween(0, 10000);
            }
            $data[] = [
             'nama'=>str_random($faker->randomDigit).' '.str_random($faker->randomDigit),
             'tahun_dibuat'=>$faker->randomElement(range(2010,2018)),
             'tahun_selesai_dibuat'=>2018,
             'harga'=>$faker->numberBetween(500000, 10000000),
             'user_id'=>$faker->randomElement($users),
             'hit'=>$hit,
             'id_kategori'=>$faker->randomElement($categories),
             'deskripsi'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam aliquam quaerat, et enim at quia quod, quibusdam nisi, veritatis fugiat ipsam. Laboriosam harum sequi temporibus repudiandae cupiditate repellat ipsum pariatur.<br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus modi laudantium nulla enim assumenda earum dignissimos, atque omnis asperiores itaque dolorum recusandae animi aliquid impedit repellendus, doloremque illo voluptatum deserunt?',
             'link_demo'=>$faker->url,
             'status'=>$status,
             'file_path'=>$file_path,
             'panduan_path'=>$panduan_path,
             'bundling_path'=>$bundling_path,
             'dibeli'=>$dibeli,
             'terakhir_dilihat'=>$terakhir_dilihat,
         ];
     }
     \App\Produk::insert($data);
     echo 'Produk dummy berhasil digenerate';
 }
}

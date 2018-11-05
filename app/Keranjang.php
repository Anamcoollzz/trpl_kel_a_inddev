<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = 'keranjang';

    public function produk()
    {
    	return $this->belongsTo('App\Produk','id_produk');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdukGambar extends Model
{
    protected $fillable = [
		'id_produk',
		'url',
	];

	protected $table = 'gambar_produk';

	public $timestamps = false;
}

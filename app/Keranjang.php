<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
	protected $table = 'keranjang';

	protected $fillable = [
		'id_produk',
		'user_id',
	];

	public function produk()
	{
		return $this->belongsTo('App\Produk','id_produk');
	}
}

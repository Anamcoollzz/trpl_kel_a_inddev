<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaftarKeinginan extends Model
{
	protected $table = 'daftar_keinginan';

	protected $fillable = [
		'user_id',
		'id_produk',
	];

	public function produk()
	{
		return $this->belongsTo('App\Produk','id_produk');
	}
}

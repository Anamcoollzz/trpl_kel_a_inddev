<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
	protected $table = 'transaksi_detail';

	public $timestamps = false;

	protected $fillable = [
		'id_produk',
		'nama_produk',
		'harga_asli',
		'harga_jual',
	];

	public function produk()
	{
		return $this->belongsTo('App\Produk', 'id_produk');
	}
}

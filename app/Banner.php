<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
		'deskripsi',
		'gambar',
		'id_produk',
		'status',
	];

	protected $table = 'banner';

	public function produk()
	{
		return $this->belongsTo('App\Produk','id_produk');
	}

	public function scopeActive($q)
	{
		return $q->where('status','active');
	}
}

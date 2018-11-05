<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
	protected $fillable = [
		'nama',
		'tahun_dibuat',
		'tahun_selesai_dibuat',
		'harga',
		'user_id',
		'hit',
		'id_kategori',
		'logo',
		'deskripsi',
		'link_demo',
		'status',
		'file_path',
		'panduan_path',
		'bundling_path',
		'dibeli',
	];

	protected $table = 'produk';

	protected $appends = [
		'warna_status',
	];

	public function kategori()
	{
		return $this->belongsTo('App\Kategori','id_kategori');
	}

	public function user()
	{
		return $this->belongsTo('App\User','user_id');
	}

	public function scopeVerified($q)
	{
		return $q->where('status','verified');
	}

	public function getLogoAttribute($value)
	{
		return $value?$value:asset('img/404-image.png');
	}

	public function getWarnaStatusAttribute()
	{
		if($this->status == 'pending')
			return 'warning';
		else
			return 'success';
	}
}

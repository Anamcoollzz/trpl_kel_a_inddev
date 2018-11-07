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
		'alasan_ditolak',
		'terakhir_dilihat',
	];

	protected $table = 'produk';

	protected $appends = [
		'warna_status',
		'harga_jual',
		'url',
	];

	public function kategori()
	{
		return $this->belongsTo('App\Kategori','id_kategori');
	}

	public function user()
	{
		return $this->belongsTo('App\User','user_id');
	}

	public function screenshots()
	{
		return $this->hasMany('App\ProdukGambar','id_produk');
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
		elseif($this->status == 'rejected')
			return 'danger';
		else
			return 'success';
	}

	public function getHargaJualAttribute()
	{
		return $this->harga+0.1*$this->harga+0.02*$this->harga;
	}

	public function getUrlAttribute()
	{
		return route('produk.show',[$this->id]);
	}
}

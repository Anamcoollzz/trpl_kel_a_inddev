<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
	protected $table = 'rekening';

	public $timestamps = false;

	protected $fillable = [
		'atas_nama',
		'nama_bank',
		'cabang',
		'no_rek',
		'gambar',
	];
}

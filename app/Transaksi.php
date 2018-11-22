<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
	protected $table = 'transaksi';

	protected $fillable = [
		'no',
		'user_id',
		'rekening_admin',
		'lunas',
		'nama_pengirim',
		'norek_pengirim',
		'tanggal_transfer',
		'bukti_transfer',
		'status',
	];

	public function detail()
	{
		return $this->hasMany('App\TransaksiDetail','id_transaksi');
	}
}

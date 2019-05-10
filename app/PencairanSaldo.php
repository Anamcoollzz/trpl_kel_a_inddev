<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PencairanSaldo extends Model
{
	protected $table = 'pencairan_saldo';

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function rekening()
	{
		return $this->belongsTo('App\RekeningMember','id_rekening_member');
	}

}

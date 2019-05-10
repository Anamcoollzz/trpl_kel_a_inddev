<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatDetail extends Model
{
    protected $table = 'chat_detail';

    protected $fillable = [
    	'sudah_dibaca',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User', 'id_user');
    }
}

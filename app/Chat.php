<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'chat';

    public function member()
    {
    	return $this->belongsTo('App\User', 'id_member');
    }

    public function developer()
    {
    	return $this->belongsTo('App\User', 'id_developer');
    }

    public function detail()
    {
    	return $this->hasMany('App\ChatDetail', 'id_chat');
    }
}

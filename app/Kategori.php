<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';

    public $timestamps = false;

    protected $fillable = [
    	'nama', 'uri_routing'
    ];

    protected $appends = [
    	'url',
    ];

    public function getUrlAttribute()
    {
    	return url('kategori/'.$this->uri_routing);
    }
}

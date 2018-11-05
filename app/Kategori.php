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

    public function scopeSelectMode($q)
    {
        $data = [];
        foreach ($q->get() as $k) {
            $data[] = [
                'text'=>$k->nama,
                'value'=>$k->id,
            ];
        }
        return $data;
    }
}

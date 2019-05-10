<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 
        'email', 
        'password',
        'no_hp',
        'alamat',
        'role',
        'avatar',
        'status',
        'tahap_1',
        'tahap_2',
        'tahap_3',
        'jenis_kelamin',
        'tingkat_member',
        'nik',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function notifikasi()
    {
        return $this->hasMany('App\Notifikasi','user_id');
    }

    public function getAvatarAttribute($value)
    {
        return $value ? $value : asset('dist/img/user2-160x160.jpg');
    }

    public function wishlist()
    {
        return $this->hasMany('App\Wishlist');
    }

    public function keranjang()
    {
        return $this->hasMany('App\Keranjang');
    }

    public function scopeVerified($q)
    {
        return $q->where('status','verified');
    }
}

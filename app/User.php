<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'first_name', 'last_name', 'email', 'password','is_appadmin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function name()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function isShopManager()
    {
        return shop()->managers()->where('user_id', $this->id)->first();
    }

    public function initials()
    {
        return mb_substr($this->first_name, 0, 1) . mb_substr($this->last_name, 0, 1);
    }

    public function customers()
    {
        return $this->hasMany('App\Customer');
    }

    public function managers()
    {
        return $this->hasMany('App\Manager');
    }

    public function isAppAdmin()
    {
        return $this->is_appadmin;
    }


}

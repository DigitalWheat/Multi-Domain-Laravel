<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{


    /**
     * Get shop customers
     */
    public function customers()
    {
        return $this->hasMany('App\Customer');
    }

    /**
     * Get shop managers
     */
    public function managers()
    {
        return $this->hasMany('App\Manager');
    }

    /**
     * Get shop owners
     */
    public function owners()
    {
        return $this->hasMany('App\Manager')->where('is_owner', '=', '1');
    }


}

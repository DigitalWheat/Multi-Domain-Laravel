<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{

    public function assignUser(User $user)
    {
        $this->user_id = $user->id;
        $this->contact_name = $user->first_name . ' ' . $user->last_name;
        $this->contact_email = $user->email;
    }

    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
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

}

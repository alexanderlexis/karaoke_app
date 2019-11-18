<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public $primaryKey = 'profile_id';

    public function user()
    {
        return $this->belongsToMany('App\User', 'users');
    }
}

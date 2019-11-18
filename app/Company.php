<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $primaryKey = 'company_id';

    protected $fillable = [
        'name',
    ];

    public function videos()
    {
        return $this->hasMany('App/Video');
    }

}

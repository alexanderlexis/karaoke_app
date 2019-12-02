<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $primaryKey = 'company_id';

    protected $fillable = [
        'name',
    ];

    public function getNameByCompanyId()
    {
        $this::all()->pluck('name', 'company_id')->toArray();
    }

    public function videos()
    {
        return $this->hasMany('App/Video');
    }

}

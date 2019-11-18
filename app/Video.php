<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public $primaryKey = 'video_id';

    protected $fillable = [
        'name', 'company_id',
    ];

    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}

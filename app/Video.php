<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public $primaryKey = 'video_id';

    protected $fillable = [
        'name',
        'company_id'
    ];

    public function getTitlesByVideoId()
    {
        return $this::all()->pluck('name', 'video_id')->toArray();
    }

    public function company()
    {
        return $this->belongsTo('App\Company', 'company_id');
    }

    public function song()
    {
        return $this->hasMany('App\Song', 'video_id');
    }
}

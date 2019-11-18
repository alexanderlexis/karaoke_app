<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SongRequest extends Model
{
    public $primaryKey = 'song_request_id';

    protected $fillable = [
        'singer',
        'song_id'
    ];

    function song()
    {
        return $this->hasOne('App/Song');
    }
}

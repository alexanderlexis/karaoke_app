<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    public $primaryKey = 'artist_id';

    protected $fillable = [
        'name',
    ];

    public function getNamesByArtistId()
    {
        return $this::all()->pluck('name', 'artist_id')->toArray();
    }

    public function song()
    {
        return $this->hasMany('App\Song', 'artist_id');
    }


}

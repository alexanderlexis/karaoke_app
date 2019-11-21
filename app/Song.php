<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    public $primaryKey = 'song_id';

    protected $fillable = [
        'title',
        'artist_id',
        'video_id',
        'url',
    ];

    public function artist()
    {
        return $this->hasOne('App\Artist', 'artist_id');
    }

    public function video()
    {
        return $this->hasOne('App\Video', 'video_id');
    }
}

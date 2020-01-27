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
        'part',
        'url'
    ];

    public function artist()
    {
        return $this->belongsTo('App\Artist', 'artist_id');
    }

    public function video()
    {
        return $this->belongsTo('App\Video', 'video_id');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    public $primaryKey = 'artist_id';

    protected $fillable = [
        'name',
    ];

    public function song()
    {
        return $this->belongsTo('App\Song', 'artist_id');
    }


}

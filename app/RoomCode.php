<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomCode extends Model
{
    public $primaryKey = 'room_code_id';

    protected $fillable = [
        'code'
    ];

    public static $rules = [
        'code' => 'max:4'
    ];
}

<?php

namespace App\Http\Controllers\Twitch\Models;

use Illuminate\Database\Eloquent\Model;

class Streamers extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'twitch_id', 'users_id'
    ];

}

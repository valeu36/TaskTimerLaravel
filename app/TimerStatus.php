<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimerStatus extends Model
{
    protected $fillable = [
        'is_start',
        'user_id'
    ];
}

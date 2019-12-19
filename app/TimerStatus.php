<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimerStatus extends Model
{
    protected $fillable = [
        'is_start',
        'user_id',
        'start_time'
    ];

    protected $hidden = [
        'created_at',
        'id',
        'updated_at',
        'user_id'
    ];

    protected $dates = [
      'start_time'
    ];

    protected function user() {
        $this->belongsTo(User::class);
    }
}

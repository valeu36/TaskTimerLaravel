<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'task_name',
        'start_time',
        'end_time',
        'user_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'user_id'
    ];

    protected $dates = [
        'start_time',
        'end_time',
    ];

    protected function user() {
        $this->belongsTo(User::class);
    }
}

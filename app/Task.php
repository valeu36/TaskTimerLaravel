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
}

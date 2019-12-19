<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

//    public function __construct()
//    {
//        $this->middleware('client.credentials')->only(['store', 'resend']);
//    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'last_name', 'middle_name', 'nick', 'is_active', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'is_active', 'email_verified_at', 'updated_at', 'created_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function role() {
        $this->belongsTo(Role::class);
    }

    protected function timerStatus() {
        $this->belongsTo(TimerStatus::class);
    }

    protected function tasks() {
        $this->hasMany(Task::class);
    }

    protected function isTimerActive() {
        return $this->timerStatus->is_start;
    }
}

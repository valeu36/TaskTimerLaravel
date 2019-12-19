<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
//    public function __construct()
//    {
//        $this->middleware('client.credentials')->only(['store', 'update']);
//    }

    protected function users() {
        $this->hasMany(User::class);
    }
}

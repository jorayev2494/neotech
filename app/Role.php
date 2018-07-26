<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users()
    {
        // , 'role_user_table', 'user_id', 'role_id'
        return $this->belongsToMany('App\User', "role_user", "role_id", "user_id");
    }
}

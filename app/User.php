<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "provider", "provider_id", 'name', "last_name", 'email', "avatar", "avatar_original", "provider_token", 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function aliases()
    {
        return $this->hasMany('App\Alias', 'user_id');  // , 'user_id', 'alias_id'
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
        // , 'role_user_table', 'user_id', 'role_id'
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alias extends Model
{

    protected $fillable = ["title", "img", "user__id", "created_at", "updated_at", "action", "body", "action"];

    protected $guarded = [];

        public function user()
        {
            return $this->hasOne('App\User', 'foreign_key', 'local_key');
        }
        

        public function groups()
        {
            return $this->belongsToMany('App\Group', 'alias_group', 'alias_id', 'group_id');
        }


        public function comments()
        {
            return $this->hasMany('App\Comment'); // , 'foreign_key', 'local_key'
        }

    
}

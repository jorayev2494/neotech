<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    protected $fillable = ["title", "action"];

    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }

    public function aliases()
    {
        return $this->belongsToMany('App\Alias', 'alias_group', 'group_id', 'alias_id');
    }
}

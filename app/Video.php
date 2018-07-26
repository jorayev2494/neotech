<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $guarded = [];

    // Не работает привязка многие ко многим
    public function groups()
    {
        return $this->belongsToMany('App\Group', 'alias_group', 'alias_id', 'group_id');
    }
}

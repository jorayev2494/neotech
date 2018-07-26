<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Menu extends Model
{
    // protected $table = "menus";

    /*public function __construct(array $attributes = [])
    {
        $this->category();
    }*/

    public function group()
    {
        return $this->hasOne('App\Group', 'alias_id', 'id');
    }
    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = ["alias_id", "name", "email", "text", "author", "parent_id"];

    public function alias()
    {
        return $this->belongsTo('App\Alias', "alias_id", "id"); // , 'foreign_key', 'other_key'
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AliasGroup extends Model
{
    protected $table = "alias_group";

    protected $fillable = ["alias_id", "group_id"];
}

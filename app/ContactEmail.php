<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactEmail extends Model
{
    protected $fillable = ["name", "email", "phone", "subject", "message"];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = "teachers";
    protected $fillable = ["name","email","phone","cellphone","address","role","bio","avatar"];
}

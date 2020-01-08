<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'contents';
    protected $fillable = ['professor_id','matricula_id','text_content','date_content','turma_id'];
}

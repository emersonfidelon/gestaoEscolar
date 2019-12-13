<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $fillable = ['name'];

    public function turmas(){
        return $this->hasMany(Turma::class, 'serie_id', 'id');
    }
}

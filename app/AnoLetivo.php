<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class AnoLetivo extends Model
{
    protected $table = 'ano_letivo';
    protected $fillable = ['descricao','dias_letivos','dt_inicio','dt_fim'];
}
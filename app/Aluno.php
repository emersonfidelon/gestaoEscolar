<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Aluno extends Model
{
    protected $table = "alunos";
    protected $fillable = [
        'nome',
        'rg',
        'certidao',
        'mae',
        'pai',
        'genero',
        'data_nascimento',
        'cpf',
        'sus',
        'plano_saude',
        'hospital_emergencia',
        'cpf_mae',
        'telefone_mae',
        'cpf_pai',
        'telefone_pai',
        'responsavel',
        'cpf_responsavel',
        'telefone_responsavel',
        'pai_responsavel_user_id',
        'cep',
        'logradouro',
        'bairro',
        'cidade',
        'estado'
    ];

    // Mutator que formata a data para salvar no banco
    public function setDataNascimentoAttribute($value)
    {
        $this->attributes['data_nascimento'] = Carbon::parse($value)->format('Y-m-d');
    }

    // Mutator que formata a data para exibir no campo ou no tela
    public function getDataNascimentoAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
}

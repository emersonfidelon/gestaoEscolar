<?php

namespace App\Http\Controllers;

use App\Matricula;
use App\Aluno;
use App\AnoLetivo;
use App\Turma;
use App\Serie;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Matricula $model)
    {
        return view('matriculas.index', ['matriculas' => $model->with('aluno')->with('anoletivo')->with('turma')->with('serie')->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anosletivos = AnoLetivo::all();
        $turmas = Turma::all();
        $alunos = Aluno::all();
        $series = Serie::all();

        return view('matriculas.create', [
            'anosletivos' => $anosletivos,
            'alunos' => $alunos,
            'series' => $series,
            'turmas' => $turmas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Matricula $model)
    {
        $exists = $model::where('aluno_id',$request->input('aluno_id'))->where('ano_letivo_id',$request->input('ano_letivo_id'));
        if($exists->count() > 0){
            return redirect()->route('matricula.create')->withStatus(['error' => "ERRO. O aluno já está matriculado no ano letivo indicado"]);
        }
        $dados = $request->except('_token');
        $ano = AnoLetivo::find($request->ano_letivo_id);
        $dados['codmatricula'] = "{$request->aluno_id}{$ano->descricao}";
        $model->create($dados);
        return redirect()->route('matricula.index')->withStatus(['success' => 'Registro criado com sucesso!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function show(Matricula $matricula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function edit(Matricula $matricula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matricula $matricula)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matricula $matricula)
    {
        //
    }
}

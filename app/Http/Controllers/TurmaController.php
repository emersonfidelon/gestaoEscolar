<?php

namespace App\Http\Controllers;

use App\Turma;
use App\Serie;
use App\Turno;
use App\AnoLetivo;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Turma $model)
    {
        return view('turmas.index', ['turmas' => $model->with('serie')->with('turno')->with('anoletivo')->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anosletivos = AnoLetivo::all();
        $series = Serie::all();
        $turnos = Turno::all();
        return view('turmas.create', [
            'anosletivos' => $anosletivos,
            'series' => $series,
            'turnos' => $turnos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Turma $model)
    {
        $exists = $model::where('name',$request->input('name'));
        if($exists->count() > 0){
            return redirect()->route('turma.create')->withStatus(['error' => 'Já existe um registro com esta descrição.']);
        }
        $model->create($request->except('_token'));
        return redirect()->route('turma.index')->withStatus(['success' => 'Registro criado com sucesso!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function show(Turma $turma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function edit(Turma $turma)
    {
        $anosletivos = AnoLetivo::all();
        $turnos = Turno::all();
        $series = Serie::all();
        return view('turmas.edit', [
            'turma' => $turma,
            'turnos' => $turnos,
            'series' => $series,
            'anosletivos' => $anosletivos
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Turma $turma)
    {
        $turma->update($request->except('_token'));

        return redirect()->route('turma.index')->withStatus(['success' => __('Turma atualizada com sucesso.')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Turma $turma)
    {
        $turma->delete();
        return redirect()->route('turma.index')->withStatus(['success' => __('Turma '.$turma->name.' deletada com sucesso.')]);
    }
}

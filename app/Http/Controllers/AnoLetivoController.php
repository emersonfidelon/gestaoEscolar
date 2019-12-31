<?php

namespace App\Http\Controllers;

use App\AnoLetivo;
use Illuminate\Http\Request;

class AnoLetivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AnoLetivo $model)
    {
        return view('anosletivos.index', ['anosletivos' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anosletivos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AnoLetivo $model)
    {
        $exists = $model::where('descricao',$request->input('descricao'));
        if($exists->count() > 0){
            return redirect()->route('anoletivo.create')->withStatus(['error' => 'O ano '.$request->descricao.' já está cadastrado.']);
        }
        $model->create($request->except('_token'));
        return redirect()->route('anoletivo.index')->withStatus(['success' => 'Ano criado com sucesso!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AnoLetivo  $anoLetivo
     * @return \Illuminate\Http\Response
     */
    public function show(AnoLetivo $anoletivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AnoLetivo  $anoletivo
     * @return \Illuminate\Http\Response
     */
    public function edit(AnoLetivo $anoletivo)
    {
        return view('anosletivos.edit', compact('anoletivo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AnoLetivo  $anoLetivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnoLetivo $anoletivo)
    {
        $anoletivo->update($request->except('_token'));

        return redirect()->route('anoletivo.index')->withStatus(['success' => 'Registro atualizado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AnoLetivo  $anoLetivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnoLetivo $anoletivo)
    {
        
    }
}

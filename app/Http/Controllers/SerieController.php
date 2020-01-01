<?php

namespace App\Http\Controllers;

use App\Serie;
use App\AnoLetivo;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Serie $model)
    {
        return view('series.index', ['series' => $model->with('anoletivo')->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anosletivos = AnoLetivo::all();
        return view('series.create', compact('anosletivos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Serie $model)
    {
        $exists = $model::where('name',$request->input('name'));
        if($exists->count() > 0){
            return redirect()->route('serie.create')->withStatus(['error' => 'Já existe um registro com esta descrição.']);
        }
        $model->create($request->except('_token'));
        return redirect()->route('serie.index')->withStatus(['success' => 'Registro criado com sucesso!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function show(Serie $serie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function edit(Serie $serie)
    {
        $anosletivos = AnoLetivo::all();
        return view('series.edit', compact('serie'), compact('anosletivos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Serie $serie)
    {
        $serie->update($request->except('_token'));

        return redirect()->route('serie.index')->withStatus(['success' => __('Série atualizada com sucesso.')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Serie $serie)
    {
        $serie->delete();

        return redirect()->route('serie.index')->withStatus(['success' => __($serie->name.' deletado com sucesso.')]);
    }
}

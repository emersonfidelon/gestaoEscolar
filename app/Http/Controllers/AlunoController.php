<?php

namespace App\Http\Controllers;

use App\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Aluno $model)
    {
        return view('alunos.index', ['alunos' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alunos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Aluno $model)
    {
        $data = $request->except('_token');

        // Valida os campos de CPF obrigatórios
        $this->validate($request, [
            'cpf' => 'required|cpf',
            'cpf_mae' => 'required|cpf',
        ]);

        //Valida CPF do pai caso seja preenchido
        if($request->has('cpf_pai') && !empty($request->cpf_pai)){
            $this->validate($request, ['cpf_pai' => 'cpf']);
        }

        //Valida CPF do responsavel caso seja preenchido
        if($request->has('cpf_responsavel') && !empty($request->cpf_responsavel)){
            $this->validate($request, ['cpf_responsavel' => 'cpf']);
        }

        //Valida certidao de nascimento caso seja preenchido
        if($request->has('certidao') && !empty($request->certidao)){
            $this->validate($request, ['certidao' => 'certidao']);
        }

        // Validação para não inserir alunos com cpf duplicado
        $exists = $model::where('cpf',$request->input('cpf'));
        if($exists->count() > 0){
            return redirect()->route('aluno.create')->withStatus(['error' => 'Já existe um registro com este CPF.']);
        }

        $model->create($data);
        return redirect()->route('aluno.index')->withStatus(['success' => 'Registro criado com sucesso!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function show(Aluno $aluno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function edit(Aluno $aluno)
    {
        return view('alunos.edit', compact('aluno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aluno $aluno)
    {
        
        // Valida os campos de CPF obrigatórios
        $this->validate($request, [
            'cpf' => 'required|cpf',
            'cpf_mae' => 'required|cpf',
        ]);

        //Valida CPF do pai caso seja preenchido
        if($request->has('cpf_pai') && !empty($request->cpf_pai)){
            $this->validate($request, ['cpf_pai' => 'cpf']);
        }

        //Valida CPF do responsavel caso seja preenchido
        if($request->has('cpf_responsavel') && !empty($request->cpf_responsavel)){
            $this->validate($request, ['cpf_responsavel' => 'cpf']);
        }

        //Valida certidao de nascimento caso seja preenchido
        if($request->has('certidao') && !empty($request->certidao)){
            $this->validate($request, ['certidao' => 'certidao']);
        }

        $aluno->update($request->except('_token'));

        return redirect()->route('aluno.index')->withStatus(['success' => __('Registro atualizado com sucesso.')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aluno $aluno)
    {
        $aluno->delete();

        return redirect()->route('aluno.index')->withStatus(['success' => __($aluno->nome.' deletado com sucesso.')]);
    }
}

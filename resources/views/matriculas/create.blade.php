@extends('layouts.app', ['page' => __('Cadastrar Matrícula'), 'pageSlug' => 'matriculas'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Cadastrar Matrícula') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('matricula.index') }}" class="btn btn-sm btn-primary">{{ __('Voltar') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('alerts.success')
                        <form method="post" action="{{ route('matricula.store') }}" autocomplete="off">
                            @csrf
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">{{ __('Aluno') }}</label>
                                    <select name="aluno_id" required class="form-control" id="">
                                        <option value="">Selecione um aluno</option>
                                        @foreach ($alunos as $aluno)
                                            <option value="{{ $aluno->id }}">{{ $aluno->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">{{ __('Ano Letivo') }}</label>
                                    <select name="ano_letivo_id" required class="form-control" id="">
                                        <option value="">Selecione um ano</option>
                                        @foreach ($anosletivos as $anoletivo)
                                            <option value="{{ $anoletivo->id }}">{{ $anoletivo->descricao }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">{{ __('Série') }}</label>
                                    <select name="serie_id" required class="form-control" id="">
                                        <option value="">Selecione uma série</option>
                                        @foreach ($series as $serie)
                                            <option value="{{ $serie->id }}">{{ $serie->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">{{ __('Série') }}</label>
                                    <select name="turma_id" required class="form-control" id="">
                                        <option value="">Selecione uma turma</option>
                                        @foreach ($turmas as $turma)
                                            <option value="{{ $turma->id }}">{{ $turma->fullDescription() }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Salvar') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

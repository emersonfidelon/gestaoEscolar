@extends('layouts.app', ['page' => __('Editar Turma'), 'pageSlug' => 'turmas'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Editar Turma') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('turma.index') }}" class="btn btn-sm btn-primary">{{ __('Voltar') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('turma.update', $turma) }}" autocomplete="off">
                            @csrf
                            @method('put')
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">{{ __('Ano Letivo') }}</label>
                                    <select name="ano_letivo_id" required class="form-control" id="">
                                        <option value="">Selecione um ano</option>
                                        @foreach ($anosletivos as $anoletivo)
                                            <option {{ $turma->ano_letivo_id === $anoletivo->id ? 'selected' : '' }} value="{{ $anoletivo->id }}">{{ $anoletivo->descricao }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Nome') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Ex.: A') }}"
                                    value="{{ old('name', $turma->name) }}"  required autofocus>
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">{{ __('Série') }}</label>
                                    <select name="serie_id" required class="form-control" id="">
                                        <option value="">Selecione uma série</option>
                                        @foreach ($series as $serie)
                                            <option {{ $turma->serie_id === $serie->id ? 'selected' : '' }} value="{{ $serie->id }}">{{ $serie->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">{{ __('Turno') }}</label>
                                    <select name="turno_id" required class="form-control" id="">
                                        <option value="">Selecione um turno</option>
                                        @foreach ($turnos as $turno)
                                            <option {{ $turma->turno_id === $turno->id ? 'selected' : '' }} value="{{ $turno->id }}">{{ $turno->name }}</option>
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

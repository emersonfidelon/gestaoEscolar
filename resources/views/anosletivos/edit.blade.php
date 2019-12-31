@extends('layouts.app', ['page' => __('Editar Ano Letivo'), 'pageSlug' => 'anoletivo'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Editar Ano Letivo') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('anoletivo.index') }}" class="btn btn-sm btn-primary">{{ __('Voltar') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('anoletivo.update', $anoletivo) }}" autocomplete="off">
                            @csrf
                            @method('put')
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('descricao') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-descricao">{{ __('Ano') }}*</label>
                                    <input type="number" name="descricao" id="input-descricao" 
                                        class="form-control form-control-alternative{{ $errors->has('descricao') ? ' is-invalid' : '' }}" 
                                        placeholder="{{ __('Ex.: 2019') }}" 
                                        value="{{ old('descricao', $anoletivo->descricao) }}" 
                                        required autofocus>
                                    @include('alerts.feedback', ['field' => 'descricao'])
                                </div>
                                <div class="form-group{{ $errors->has('dias_letivos') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-dias_letivos">{{ __('Dias Letivos') }}*</label>
                                    <input type="number" name="dias_letivos" id="input-dias_letivos" 
                                        class="form-control form-control-alternative{{ $errors->has('dias_letivos') ? ' is-invalid' : '' }}" 
                                        placeholder="{{ __('Ex.: 200') }}" 
                                        value="{{ old('dias_letivos', $anoletivo->dias_letivos) }}" 
                                        required>
                                    @include('alerts.feedback', ['field' => 'dias_letivos'])
                                </div>
                                <div class="form-group{{ $errors->has('dt_inicio') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-dt_inicio">{{ __('Data Inicio') }}*</label>
                                    <input type="date" name="dt_inicio" id="input-dt_inicio" 
                                        class="form-control form-control-alternative{{ $errors->has('dt_inicio') ? ' is-invalid' : '' }}" 
                                        placeholder="{{ __('Ex.: 02/03/2020') }}" 
                                        value="{{ old('dt_inicio', $anoletivo->dt_inicio) }}" 
                                        required>
                                    @include('alerts.feedback', ['field' => 'dt_inicio'])
                                </div>
                                <div class="form-group{{ $errors->has('dt_fim') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-dt_fim">{{ __('Data Fim') }}*</label>
                                    <input type="date" name="dt_fim" id="input-dt_fim" 
                                        class="form-control form-control-alternative{{ $errors->has('dt_fim') ? ' is-invalid' : '' }}" 
                                        placeholder="{{ __('Ex.: 02/03/2020') }}" 
                                        value="{{ old('dt_fim', $anoletivo->dt_fim) }}" 
                                        required>
                                    @include('alerts.feedback', ['field' => 'dt_fim'])
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

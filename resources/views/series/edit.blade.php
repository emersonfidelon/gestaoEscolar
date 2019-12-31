@extends('layouts.app', ['page' => __('Editar Série'), 'pageSlug' => 'series'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Editar Série') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('serie.index') }}" class="btn btn-sm btn-primary">{{ __('Voltar') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('serie.update', $serie) }}" autocomplete="off">
                            @csrf
                            @method('put')
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Nome') }}</label>
                                    <input type="text" name="name" id="input-name" 
                                        class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" 
                                        placeholder="{{ __('Nome') }}" 
                                        value="{{ old('name', $serie->name) }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'name'])
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

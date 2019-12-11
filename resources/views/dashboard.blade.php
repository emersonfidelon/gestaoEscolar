@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
    <div class="container">
        <div class="header-body text-center">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h1>{{ __('Sistema de gestão escolar') }}</h1>
                    <p class="text-lead text-light">
                        {{ __('Pais . Turmas . Turnos . Séries . Alunos . Conteúdo . Frequência . Mensagens') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

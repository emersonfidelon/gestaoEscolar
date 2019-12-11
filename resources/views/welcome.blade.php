@extends('layouts.app', ['page' => __('Dashboard'), 'pageSlug' => 'dashboard'])


@section('content')
    <div class="header py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1>{{ __('Bem vindo!') }}</h1>
                        <h2>{{ __('Sistema de gestão escolar') }}</h2>
                        <p class="text-lead">
                            {{ __('Pais . Turmas . Turnos . Séries . Alunos . Conteúdo . Frequência . Mensagens') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

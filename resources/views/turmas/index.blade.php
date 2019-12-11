@extends('layouts.app', ['page' => __('Gerenciar usuários'), 'pageSlug' => 'turmas'])

@section('content')
    @php
        $tipos = ['Professor','Pai','Administrativo']
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('Turmas') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">{{ __('Adicionar turma') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">{{ __('Nome') }}</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @foreach ($turmas as $turma)
                                    <tr>
                                        <td>{{ $turma->name }}</td>
                                        <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        @if (auth()->turma()->id != $turma->id)
                                                            <form action="{{ route('turma.destroy', $turma) }}" method="post">
                                                                @csrf
                                                                @method('delete')

                                                                <a class="dropdown-item" href="{{ route('turma.edit', $turma) }}">{{ __('Editar') }}</a>
                                                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this turma?") }}') ? this.parentElement.submit() : ''">
                                                                            {{ __('Excluir') }}
                                                                </button>
                                                            </form>
                                                        @else
                                                            <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Editar') }}</a>
                                                        @endif
                                                    </div>
                                                </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $turmas->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app', ['page' => __('Gerenciar turmas'), 'pageSlug' => 'turmas'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('Turmas') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('turma.create') }}" class="btn btn-sm btn-primary">{{ __('Adicionar') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">{{ __('Nome') }}</th>
                                <th scope="col">{{ __('Serie') }}</th>
                                <th scope="col">{{ __('Turno') }}</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @foreach ($turmas as $turma)
                                    <tr>
                                        <td>{{ $turma->name }}</td>
                                        <td>{{ $turma->serie->name }}</td>
                                        <td>{{ $turma->turno->name }}</td>
                                        <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <form action="{{ route('turma.destroy', $turma) }}" method="post">
                                                            @csrf
                                                            @method('delete')

                                                            <a class="dropdown-item" href="{{ route('turma.edit', $turma) }}">{{ __('Editar') }}</a>
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Tem certeza que deseja excluir essa turma?") }}') ? this.parentElement.submit() : ''">
                                                                        {{ __('Excluir') }}
                                                            </button>
                                                        </form>
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

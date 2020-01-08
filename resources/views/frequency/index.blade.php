@extends('layouts.app', ['page' => __('Gerenciar Frequencias'), 'pageSlug' => 'frequency'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('Frequencia') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('frequency.create') }}" class="btn btn-sm btn-primary">{{ __('Adicionar') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">{{ __('Data') }}</th>
                                <th scope="col">{{ __('Presentes') }}</th>
                                <th scope="col">{{ __('Ausentes') }}</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @foreach ($frequencies as $frequency)
                                    <tr>
                                        <td>{{ $frequency->professor_id }}</td>
                                        <td>{{ $frequency->turma_id }}</td>
                                        <td>{{ $frequency->matricula_id }}</td>

                                        <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <form action="{{ route('frequency.destroy', $frequency) }}" method="post">
                                                            @csrf
                                                            @method('delete')

                                                            <a class="dropdown-item" href="{{ route('frequency.edit', $frequency) }}">{{ __('Editar') }}</a>
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Tem certeza que deseja excluir esse conteúdo?") }}') ? this.parentElement.submit() : ''">
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
                        {{ $frequencies->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

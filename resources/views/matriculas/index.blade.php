@extends('layouts.app', ['page' => __('Gerenciar Matrículas'), 'pageSlug' => 'matriculas'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('Matrículas') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('matricula.create') }}" class="btn btn-sm btn-primary">{{ __('Adicionar') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">{{ __('Cod. Matrícula') }}</th>
                                <th scope="col">{{ __('Nome') }}</th>
                                <th scope="col">{{ __('Enturmação') }}</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @foreach ($matriculas as $matricula)
                                    <tr>
                                        <td>{{ $matricula->codmatricula }}</td>
                                        <td>{{ $matricula->aluno->nome }}</td>
                                        <td>{{ $matricula->turma->fullDescription() }}</td>

                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    
                                                    <form action="{{ route('matricula.destroy', $matricula) }}" method="post">
                                                        @csrf
                                                        @method('delete')

                                                        <a class="dropdown-item" href="{{ route('matricula.edit', $matricula) }}">{{ __('Editar') }}</a>
                                                        <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this matricula?") }}') ? this.parentElement.submit() : ''">
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
                        {{ $matriculas->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

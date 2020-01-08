@extends('layouts.app', ['page' => __('Gerenciar turmas'), 'pageSlug' => 'content'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">{{ __('Conteúdos') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('content.create') }}" class="btn btn-sm btn-primary">{{ __('Adicionar') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">{{ __('Professor') }}</th>
                                <th scope="col">{{ __('Turma') }}</th>
                                <th scope="col">{{ __('Aluno') }}</th>
                                <th scope="col">{{ __('Data') }}</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @foreach ($contents as $content)
                                    <tr>
                                        <td>{{ $content->professor_id }}</td>
                                        <td>{{ $content->turma_id }}</td>
                                        <td>{{ $content->matricula_id }}</td>
                                        <td>{{ $content->data_content }}</td>

                                        <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <form action="{{ route('content.destroy', $content) }}" method="post">
                                                            @csrf
                                                            @method('delete')

                                                            <a class="dropdown-item" href="{{ route('content.edit', $content) }}">{{ __('Editar') }}</a>
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
                        {{ $contents->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

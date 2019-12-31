@extends('layouts.app', ['page' => __('Criar aluno'), 'pageSlug' => 'alunos'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Cadastrar aluno') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('aluno.index') }}" class="btn btn-sm btn-primary">{{ __('Voltar') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('aluno.store') }}" autocomplete="off">
                            @csrf

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('nome') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-nome">{{ __('Nome') }}*</label>
                                    <input type="text" name="nome" id="input-nome" 
                                        class="form-control form-control-alternative{{ $errors->has('nome') ? ' is-invalid' : '' }}" 
                                        placeholder="{{ __('Nome Completo') }}" value="{{ old('nome') }}" required 
                                    autofocus>
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class="form-group{{ $errors->has('cpf') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-cpf">{{ __('CPF') }}*</label>
                                    <small>(Digite apenas números)</small>
                                    <input type="text" name="cpf" id="input-cpf" 
                                        class="form-control form-control-alternative{{ $errors->has('cpf') ? ' is-invalid' : '' }}" 
                                        placeholder="{{ __('CPF') }}" value="{{ old('cpf') }}" 
                                        maxlength="11"
                                        required
                                        >
                                    @include('alerts.feedback', ['field' => 'cpf'])
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('data_nascimento') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-data_nascimento">{{ __('Data de nascimento') }}*</label>
                                            <small>(Digite apenas números)</small>
                                            <input type="text" name="data_nascimento" id="input-data_nascimento" 
                                                class="form-control form-control-alternative{{ $errors->has('data_nascimento') ? ' is-invalid' : '' }}" 
                                                placeholder="{{ __('dd/mm/aaaa') }}" value="{{ old('data_nascimento') }}" 
                                                required
                                                >
                                            @include('alerts.feedback', ['field' => 'data_nascimento'])
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('genero') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-genero">{{ __('Gênero') }}*</label>
                                            <select name="genero" 
                                                class="form-control form-control-alternative{{ $errors->has('genero') ? ' is-invalid' : '' }}"
                                                id="select-genero"
                                                required
                                            >
                                                <option value="">Selecione</option>
                                                <option value="masculino">Masculino</option>
                                                <option value="feminino">Feminino</option>
                                            </select>
                                            @include('alerts.feedback', ['field' => 'genero'])
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group{{ $errors->has('rg') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-rg">{{ __('RG') }}</label>
                                    <input type="text" name="rg" id="input-rg" 
                                        class="form-control form-control-alternative{{ $errors->has('rg') ? ' is-invalid' : '' }}" 
                                        placeholder="{{ __('RG') }}" value="{{ old('rg') }}" 
                                        >
                                    @include('alerts.feedback', ['field' => 'rg'])
                                </div>
                                <div class="form-group{{ $errors->has('certidao') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-certidao">{{ __('Certidão de Nascimento') }}</label>
                                    <input type="text" name="certidao" id="input-certidao" 
                                        class="form-control form-control-alternative{{ $errors->has('certidao') ? ' is-invalid' : '' }}" 
                                        placeholder="{{ __('Certidão de Nascimento') }}" value="{{ old('certidao') }}" 
                                        >
                                    @include('alerts.feedback', ['field' => 'certidao'])
                                </div>
                                <div class="form-group{{ $errors->has('sus') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-sus">{{ __('Cartão do SUS') }}*</label>
                                    <small>(Digite apenas números)</small>
                                    <input type="text" name="sus" id="input-sus" 
                                        class="form-control form-control-alternative{{ $errors->has('sus') ? ' is-invalid' : '' }}" 
                                        placeholder="{{ __('Cartão do SUS') }}" value="{{ old('sus') }}" 
                                        required>
                                    @include('alerts.feedback', ['field' => 'sus'])
                                </div>
                                <div class="form-group{{ $errors->has('plano_saude') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-plano_saude">{{ __('Nº cartão do plano de saúde') }}</label>
                                    <small>(Digite apenas números)</small>
                                    <input type="text" name="plano_saude" id="input-plano_saude" 
                                        class="form-control form-control-alternative{{ $errors->has('plano_saude') ? ' is-invalid' : '' }}" 
                                        placeholder="{{ __('Nº cartão do plano de saúde') }}" value="{{ old('plano_saude') }}" >
                                    @include('alerts.feedback', ['field' => 'plano_saude'])
                                </div>
                                <div class="form-group{{ $errors->has('hospital_emergencia') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-hospital_emergencia">{{ __('Em caso de urgência e emergência em que hospital levar?') }}*</label>
                                    <input type="text" name="hospital_emergencia" id="input-hospital_emergencia" 
                                        class="form-control form-control-alternative{{ $errors->has('hospital_emergencia') ? ' is-invalid' : '' }}" 
                                        placeholder="{{ __('Em caso de urgência e emergência em que hospital levar?') }}" value="{{ old('hospital_emergencia') }}" 
                                        required>
                                    @include('alerts.feedback', ['field' => 'hospital_emergencia'])
                                </div>
                                
                                <hr>
                                <h3>Responsáveis</h3>

                                <div class="form-group{{ $errors->has('mae') ? ' has-danger' : '' }}">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-control-label" for="input-mae">{{ __('Nome da mãe') }}*</label>
                                            <input type="text" name="mae" id="input-mae" 
                                                class="form-control form-control-alternative{{ $errors->has('mae') ? ' is-invalid' : '' }}" 
                                                placeholder="{{ __('Nome da mãe') }}" value="{{ old('mae') }}" 
                                                required>
                                            @include('alerts.feedback', ['field' => 'mae'])
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-control-label" for="input-cpf_mae">{{ __('CPF da mãe') }}*</label>
                                            <small>(Digite apenas números)</small>
                                            <input type="text" name="cpf_mae" id="input-cpf_mae" 
                                                class="form-control form-control-alternative{{ $errors->has('cpf_mae') ? ' is-invalid' : '' }}" 
                                                placeholder="{{ __('CPF da mãe') }}" value="{{ old('cpf_mae') }}" 
                                                maxlength="11"
                                                required>
                                            @include('alerts.feedback', ['field' => 'cpf_mae'])
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-control-label" for="input-telefone_mae">{{ __('Telefone da mãe') }}*</label>
                                            <small>(Digite apenas números)</small>
                                            <input type="text" name="telefone_mae" id="input-telefone_mae" 
                                                class="form-control form-control-alternative{{ $errors->has('telefone_mae') ? ' is-invalid' : '' }}" 
                                                placeholder="{{ __('Telefone da mãe') }}" value="{{ old('telefone_mae') }}" 
                                                required>
                                            @include('alerts.feedback', ['field' => 'telefone_mae'])
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('pai') ? ' has-danger' : '' }}">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-control-label" for="input-pai">{{ __('Nome do pai') }}</label>
                                            <small>(Digite o nome completo)</small>
                                            <input type="text" name="pai" id="input-pai" 
                                                class="form-control form-control-alternative{{ $errors->has('pai') ? ' is-invalid' : '' }}" 
                                                placeholder="{{ __('Nome do pai') }}" value="{{ old('pai') }}" 
                                                >
                                            @include('alerts.feedback', ['field' => 'pai'])
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-control-label" for="input-cpf_pai">{{ __('CPF do pai') }}</label>
                                            <small>(Digite apenas números)</small>
                                            <input type="text" name="cpf_pai" id="input-cpf_pai" 
                                                class="form-control form-control-alternative{{ $errors->has('cpf_pai') ? ' is-invalid' : '' }}" 
                                                placeholder="{{ __('CPF do pai') }}" value="{{ old('cpf_pai') }}" >
                                            @include('alerts.feedback', ['field' => 'cpf_pai'])
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-control-label" for="input-telefone_pai">{{ __('Telefone do pai') }}</label>
                                            <small>(Digite apenas números)</small>
                                            <input type="text" name="telefone_pai" id="input-telefone_pai" 
                                                class="form-control form-control-alternative{{ $errors->has('telefone_pai') ? ' is-invalid' : '' }}" 
                                                placeholder="{{ __('Telefone do pai') }}" value="{{ old('telefone_pai') }}" >
                                            @include('alerts.feedback', ['field' => 'telefone_pai'])
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('responsavel') ? ' has-danger' : '' }}">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="form-control-label" for="input-responsavel">{{ __('Nome do responsável') }}</label>
                                            <small>(Digite o nome completo)</small>
                                            <input type="text" name="responsavel" id="input-responsavel" 
                                                class="form-control form-control-alternative{{ $errors->has('responsavel') ? ' is-invalid' : '' }}" 
                                                placeholder="{{ __('Nome do responsável') }}" value="{{ old('responsavel') }}" 
                                                >
                                            @include('alerts.feedback', ['field' => 'responsavel'])
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-control-label" for="input-cpf_responsavel">{{ __('CPF do responsavel') }}</label>
                                            <small>(Digite apenas números)</small>
                                            <input type="text" name="cpf_responsavel" id="input-cpf_responsavel" 
                                                class="form-control form-control-alternative{{ $errors->has('cpf_responsavel') ? ' is-invalid' : '' }}" 
                                                placeholder="{{ __('CPF do responsavel') }}" value="{{ old('cpf_responsavel') }}" >
                                            @include('alerts.feedback', ['field' => 'cpf_responsavel'])
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-control-label" for="input-telefone_responsavel">{{ __('Telefone do responsavel') }}</label>
                                            <small>(Digite apenas números)</small>
                                            <input type="text" name="telefone_responsavel" id="input-telefone_responsavel" 
                                                class="form-control form-control-alternative{{ $errors->has('telefone_responsavel') ? ' is-invalid' : '' }}" 
                                                placeholder="{{ __('Telefone do responsavel') }}" value="{{ old('telefone_responsavel') }}" >
                                            @include('alerts.feedback', ['field' => 'telefone_responsavel'])
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <h3>Endereço</h3>

                                <div class="form-group{{ $errors->has('cep') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-cep">{{ __('CEP') }}*</label>
                                    <small>(Digite apenas números)</small>
                                    <input type="text" name="cep" id="input-cep" 
                                        class="form-control form-control-alternative{{ $errors->has('cep') ? ' is-invalid' : '' }}" 
                                        placeholder="{{ __('CEP') }}" value="{{ old('cep') }}" 
                                        required
                                        >
                                    @include('alerts.feedback', ['field' => 'cep'])
                                </div>

                                <div class="form-group{{ $errors->has('logradouro') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-logradouro">{{ __('Logradouro') }}*</label>
                                    <small>(Ex.: Rua, Travessa, Avenida)</small>
                                    <input type="text" name="logradouro" id="input-logradouro" 
                                        class="form-control form-control-alternative{{ $errors->has('logradouro') ? ' is-invalid' : '' }}" 
                                        placeholder="{{ __('Logradouro') }}" value="{{ old('logradouro') }}" 
                                        required
                                        >
                                    @include('alerts.feedback', ['field' => 'logradouro'])
                                </div>

                                <div class="form-group{{ $errors->has('bairro') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-bairro">{{ __('Bairro') }}*</label>
                                    <input type="text" name="bairro" id="input-bairro" 
                                        class="form-control form-control-alternative{{ $errors->has('bairro') ? ' is-invalid' : '' }}" 
                                        placeholder="{{ __('Bairro') }}" value="{{ old('bairro') }}" 
                                        required
                                        >
                                    @include('alerts.feedback', ['field' => 'bairro'])
                                </div>

                                <div class="form-group{{ $errors->has('cidade') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-cidade">{{ __('Cidade') }}*</label>
                                    <input type="text" name="cidade" id="input-cidade" 
                                        class="form-control form-control-alternative{{ $errors->has('cidade') ? ' is-invalid' : '' }}" 
                                        placeholder="{{ __('Cidade') }}*" value="{{ old('cidade') }}" 
                                        required
                                        >
                                    @include('alerts.feedback', ['field' => 'cidade'])
                                </div>

                                <div class="form-group{{ $errors->has('estado') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-estado">{{ __('Estado') }}*</label>
                                    <input type="text" name="estado" id="input-estado" 
                                        class="form-control form-control-alternative{{ $errors->has('estado') ? ' is-invalid' : '' }}" 
                                        placeholder="{{ __('Estado') }}*" value="{{ old('estado') }}" 
                                        required
                                        >
                                    @include('alerts.feedback', ['field' => 'estado'])
                                </div>

                                <hr>
                                <h3>Extras</h3>
                                <div class="form-group{{ $errors->has('observacao') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-observacao">{{ __('Observações') }}</label>
                                    <textarea type="text" name="observacao" id="input-observacao" 
                                        class="form-control form-control-alternative{{ $errors->has('observacao') ? ' is-invalid' : '' }}" 
                                        placeholder="{{ __('Preencha com o máximo de informações que achar importante, como alergias, restrições, etc...') }}*"
                                        >
                                        {{ old('observacao') }}
                                        </textarea>

                                    @include('alerts.feedback', ['field' => 'observacao'])
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

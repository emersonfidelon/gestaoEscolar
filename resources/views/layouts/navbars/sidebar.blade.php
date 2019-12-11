<div class="sidebar">
    <div class="sidebar-wrapper" style="overflow:auto;">
        <!--<div class="logo">
            <a href="#" class="simple-text logo-mini">{{ _('WD') }}</a>
            <a href="#" class="simple-text logo-normal">{{ _('White Dashboard') }}</a>
        </div>-->
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ _('Painel principal') }}</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#administrativo" aria-expanded="true">
                    <i class="fas fa-calculator"></i>
                    <span class="nav-link-text" >{{ __('Administrativo') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="administrativo">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('user.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ _('Usuários') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'turnos') class="active " @endif>
                            <a href="{{ route('turno.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ _('Turnos') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'series') class="active " @endif>
                            <a href="{{ route('serie.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ _('Series') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'turmas') class="active " @endif>
                            <a href="{{ route('turma.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ _('Turmas') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'alunos') class="active " @endif>
                            <a href="{{ route('aluno.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ _('Alunos') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'matriculas') class="active " @endif>
                            <a href="{{ route('matricula.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ _('Matriculas') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#pedagogico">
                    <i class="fas fa-graduation-cap" ></i>
                    <span class="nav-link-text" >{{ __('Pedagógico') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="pedagogico">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('user.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ _('Conteúdo') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('user.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ _('Frequência') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#mensagens">
                    <i class="fas fa-comments" ></i>
                    <span class="nav-link-text" >{{ __('Mensagens') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="mensagens">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('user.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ _('Recebidas') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('user.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ _('Enviadas') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>

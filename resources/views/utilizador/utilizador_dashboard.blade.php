@extends('frontend.aniella_salao')
@section('salao')
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2></h2>
                <ol>
                    <li><a href="index.html"></a></li>
                    <li></li>
                </ol>
            </div>

        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ !empty(auth()->user()->foto) ? url('upload/servico_imagens/' . auth()->user()->foto) : url('upload/no_image.jpg') }}"
                                    alt="profile">
                            </div>
                            <h3 class="profile-username text-center utilizador_nome">{{ auth()->user()->nome }}</h3>
                            <p class="text-muted text-center"></p>
                            <input type="file" name="foto" id="foto"
                                style="opacity: 0; height:1px; display:none">
                            <a href="javascript:void(0)" class="btn btn-primary btn-block" id="trocar_foto_btn"><b>Trocar
                                    Foto</b></a>
                        </div>

                    </div>

                </div>

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#info_pessoais"
                                        data-toggle="tab">Informações Pessoais</a></li>
                                <li class="nav-item"><a class="nav-link" href="#agendamentos"
                                        data-toggle="tab">Agendamentos</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#alterar_passe" data-toggle="tab">Alterar
                                        Palavra-Passe</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="info_pessoais">
                                    <form class="form-horizontal" method="POST"
                                        action="{{ route('utilizador.profile.store') }}" id="UtilizadorInfoForm">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Nome</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control"
                                                            value="{{ auth()->user()->nome }}" name="nome" />
                                                        <span class="text-danger error-text nome_error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Nome de Utilizador</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control"
                                                            value="{{ auth()->user()->nome_utilizador }}"
                                                            name="nome_utilizador" />
                                                        <span class="text-danger error-text nome_utilizador_error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Email</label>
                                                    <div class="col-sm-9">
                                                        <input type="email" class="form-control"
                                                            value="{{ auth()->user()->email }}" name="email" />
                                                        <span class="text-danger error-text email_error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Telefone</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" value="{{ auth()->user()->telefone }}"
                                                            name="telefone" />
                                                        <span class="text-danger error-text telefone_error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">NIF</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control"
                                                            value="{{ auth()->user()->nif }}" name="nif" />
                                                        <span class="text-danger error-text nif_error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Género</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control">
                                                            <option>Masculino</option>
                                                            <option>Femenino</option>

                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <p class="card-description"> Endereço </p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Província</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Municipio</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Distrito</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Morada</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control"
                                                            value="{{ auth()->user()->morada }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Guardar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane" id="agendamentos">

                                    <div class="col-md-12 grid-margin stretch-card">



                                        @if ($agendamentos->isEmpty())
                                            <div class="alert alert-info" role="alert">
                                                Não tem nenhum agendamento.
                                            </div>
                                        @else
                                            <div class="table-responsive">
                                                <table id="dataTableExample" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Data</th>
                                                            <th>Hora</th>

                                                            <th>Serviço</th>
                                                            <th>Especialista</th>
                                                            <th>Estado</th>
                                                            <th>Acções</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($agendamentos as $key => $itens)
                                                            <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td>{{ $itens->dataA }}</td>
                                                                <td>{{ $itens->hora }}</td>

                                                                <td>{{ $itens->servico->nome }}</td>
                                                                <td>{{ $itens->funcionario->nome }}</td>
                                                                <td>{{ $itens->estado }}</td>
                                                                <td>
                                                                    @if ($itens->estado !== 'Cancelado')
                                                                        
                                                                        <a class="btn btn-danger"
                                                                            href="{{ route('editar.agendamento', $itens->id) }}">Cancelar</a>
                                                                            @endif
                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endif


                                    </div>

                                </div>

                                <div class="tab-pane" id="alterar_passe">
                                    <form class="form-horizontal" method="POST"
                                        action="{{ route('utilizador.update.password') }}"
                                        id="trocarPasseUtilizadorForm">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Palavra-Passe Antiga</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" class="form-control" id="password"
                                                            name="password" />
                                                        <span class="text-danger error-text password_error"></span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Palavra-Passe Nova</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" class="form-control" id="new_password"
                                                            name="new_password" />
                                                        <span class="text-danger error-text new_password_error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Confirmar Palavra-Passe
                                                        Nova</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" class="form-control" id="confirmPassword"
                                                            name="confirmPassword" />
                                                        <span class="text-danger error-text confirmPassword_error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Alterar Password</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

    <script src="plugins/jquery/jquery.min.js"></script>
@endsection

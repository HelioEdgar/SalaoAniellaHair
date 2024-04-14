@extends('admin.admin_dashboard')
@section('admin')

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                {{-- <a class="btn btn-primary btn-fw" href="{{ route('adicionar.galeria') }}">Agendamentos</a> --}}
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Agendamentos</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Data</th>
                                        <th>Hora</th>
                                        <th>Cliente</th>
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
                                            <td>{{ $itens->cliente->nome }}</td>
                                            <td>{{ $itens->servico->nome }}</td>
                                            <td>{{ $itens->funcionario->nome }}</td>
                                            <td>{{ $itens->estado }}</td>
                                            <td>
                                                @if ($itens->estado !== 'Cancelado' && $itens->estado !=='Concluido')
                                                                        
                                                                        <a class="btn btn-danger"
                                                                            href="{{ route('editar.agendamento', $itens->id) }}">Cancelar</a>
                                                                            <a class="btn btn-success"
                                                                            href="{{ route('concluir.agendamento', $itens->id) }}">Concluir</a>
                                                                            @endif
                                                
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

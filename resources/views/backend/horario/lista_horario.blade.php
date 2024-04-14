@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a class="btn btn-primary btn-fw" href="{{ route('adicionar.horario') }}">Novo Horario</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">Horario</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Dias</th>
            <th>Inicio</th>
            <th>Fim</th>
            <th>Serviço</th>
            <th>Funcionário</th>
            <th>Acções</th>
          </tr>
        </thead>
        <tbody>
            @foreach($horarios as $key => $itens)
          <tr>
            <th>{{$key+1}}</th>
            <td>@if (is_string($itens->dias))
              {{ $itens->dias }}
          @else
              {{ implode(', ', $itens->dias) }}
          @endif</td>
            <td>{{ $itens->inicio }}</td>
            <td>{{ $itens->fim }}</td>
            <td>{{ $itens->servico->nome }}</td>
            <td>{{ $itens->funcionario->nome }}</td>
            <td>
              <a class="btn btn-inverse-info btn-fw" href="{{ route('editar.horario',$itens->id) }}">Mais Informações</a>
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
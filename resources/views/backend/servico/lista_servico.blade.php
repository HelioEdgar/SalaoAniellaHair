@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a class="btn btn-primary btn-fw" href="{{ route('adicionar.servico') }}">Novo Serviço</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">Serviços</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Imagem</th>
            <th>Nome</th>
            
            <th>Duração</th>
            <th>Preço</th>
            <th>Estado</th>
            <th>Acções</th>
          </tr>
        </thead>
        <tbody>
            @foreach($servicos as $key => $itens)
          <tr>
            <td>{{ $key+1}}</td>
            <td><img class="rounded-circle" width="128" height="128" src="{{ (!empty($itens->foto)) ? url('upload/servico_imagens/'.$itens->foto) : url('upload/no_image.jpg') }}" alt="profile"></td>
            <td>{{ $itens->nome }}</td>
            
            <td>{{ $itens->duracao }}</td>
            <td>{{$itens->preco}} AOA</td>
            <td> 

              @if ($itens->estado == 'activo')
              <a class="btn btn-sm btn-danger" href="{{ route('servicos.desativar', $itens->id) }}">Desactivar</a>
          @else
              <a class="btn btn-sm btn-success" href="{{ route('servicos.ativar', $itens->id) }}">Activar</a>
          @endif
           </td>
            <td>
              <a class="btn btn-inverse-info btn-fw"  href="{{ route('editar.servico',$itens->id) }}">Mais Informações</a>
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
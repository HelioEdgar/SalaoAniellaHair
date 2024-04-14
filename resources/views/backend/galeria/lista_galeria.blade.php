@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a class="btn btn-primary btn-fw" href="{{ route('adicionar.galeria') }}">Nova Foto</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">Galeria</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Foto</th>
            <th>Nome</th>
            <th>Serviço</th>
            <th>Acções</th>
          </tr>
        </thead>
        <tbody>
            @foreach($galerias as $key => $itens)
          <tr>
            <td>{{ $key+1}}</td>
            <td><img class="rounded-circle" width="128" height="128" src="{{ (!empty($itens->foto)) ? url('upload/galeria_imagens/'.$itens->foto) : url('upload/no_image.jpg') }}" alt="profile"></td>
            <td>{{ $itens->nome }}</td>
            <td>{{ $itens->servico->nome }}</td>
            <td>
              <a class="btn btn-inverse-info btn-fw" href="{{ route('editar.galeria',$itens->id) }}">Mais Informações</a>
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
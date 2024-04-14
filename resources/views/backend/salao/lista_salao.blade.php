@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            {{-- <a href="{{ route('adicionar.salao') }}">Novo Salão</a> --}}
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h6 class="card-title">Salão</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Foto</th>
            <th>Nome</th>
            <th>Email</th>
            <th>NIF</th>
            <th>Telefone</th>
            <th>Localização</th>
            
            <th>Acções</th>
          </tr>
        </thead>
        <tbody>
            @foreach($salaos as $key => $itens)
          <tr>
            <td>{{ $key+1}}</td>
            <td><img class="rounded-circle" width="128" height="128" src="{{ (!empty($itens->foto)) ? url('upload/salao_imagens/'.$itens->foto) : url('upload/no_image.jpg') }}" alt="profile"></td>
            <td>{{ $itens->nome }}</td>
            <td>{{ $itens->email }}</td>
            <td>{{ $itens->nif }}</td>
            <td>{{ $itens->telefone }}</td>
            <td>{{ $itens->localizacao }}</td>
            
            
            <td>
              <a class="btn btn-inverse-info btn-fw" href="{{ route('editar.salao',$itens->id) }}">Mais Informações</a>
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
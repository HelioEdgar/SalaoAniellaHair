@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="row profile-body">

    <!-- middle wrapper end -->
    <div class="col-md-12 col-xl-12 middle-wrapper">
        <div class="row">
            <div class="card">
                <div class="card-body">
  
                <h6 class="card-title">Adicionar Nova Foto</h6>

                <form method="POST" action="{{ route('guardar.galeria') }}" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control text-white ps-1 @error('nome') is-invalid @enderror">
                        @error('nome')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Foto</label>
                        <input type="file" name="foto" class="form-control text-white ps-1 @error('foto') is-invalid @enderror">
                        @error('foto')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Serviço</label>
                      <select name="id_servico" class="form-control text-white ps-1">
                        <option value="" disabled selected>Seleccione uma Opção</option>
                        @foreach($servicos as $servico)
                        <option value="{{ $servico->id}}">{{ $servico->nome}}</option>
                        @endforeach
                      </select>
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Guardar</button>
                </form>
  
                </div>
              </div>
        </div>

      
  </div>
</div>

@endsection
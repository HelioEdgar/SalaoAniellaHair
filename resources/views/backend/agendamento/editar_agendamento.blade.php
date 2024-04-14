@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="row profile-body">

    <!-- middle wrapper end -->
    <div class="col-md-12 col-xl-12 middle-wrapper">
        <div class="row">
            <div class="card">
                <div class="card-body">
  
                <h6 class="card-title">Editar Foto</h6>

                <form method="POST" action="{{ route('actualizar.galeria') }}" class="forms-sample" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{$galerias->id}}">

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control text-white ps-1 @error('nome') is-invalid @enderror" value="{{ $galerias->nome }}">
                        @error('nome')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Foto</label>
                        <input class="form-control text-white ps-1" type="file" name="foto" id="image">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"></label>
                        <img id="showImage" class="rounded-circle" width="80" height="80" src="{{ (!empty($galerias->foto)) ? url('upload/galeria_imagens/'.$galerias->foto) : url('upload/no_image.jpg') }}" alt="profile">
                    </div>
                    <div class="mb-3">
                        <label>Serviço</label>
                      <select name="id_servico" class="form-control text-white ps-1">
                        @foreach($servicos as $servico)
                <option value="{{ $servico->id }}" {{ $galerias->id_servico == $servico->id ? 'selected' : '' }}>
                    {{ $servico->nome }}
                </option>
            @endforeach
                      </select>
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Guardar Alterações</button>
                    <a id="delete" href="{{ route('apagar.galeria',$galerias->id) }}">Apagar Foto</a>
                </form>
  
                </div>
              </div>
        </div>

      
  </div>
</div>

<script>
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection
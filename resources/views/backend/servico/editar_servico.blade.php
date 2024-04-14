@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="row profile-body">
    <style>.custom-text {
        color: black; /* Definindo a cor do texto para preto */
      }</style>
    <!-- middle wrapper end -->
    <div class="col-md-12 col-xl-12 middle-wrapper">
        <div class="row">
            <div class="card">
                <div class="card-body">
  
                <h6 class="card-title">Editar Serviço</h6>

                <form method="POST" action="{{ route('actualizar.servico') }}" class="forms-sample" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{$servicos->id}}">
                    <input type="hidden" name="estado" value="{{$servicos->estado}}">

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nome do Serviço</label>
                        <input type="text" name="nome" class="form-control text-white ps-1 @error('nome') is-invalid @enderror" value="{{ $servicos->nome }}">
                        @error('nome')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Descrição</label>
                        <textarea type="text" name="descricao" class="form-control text-white ps-1 @error('descricao') is-invalid @enderror" rows="10">{{ $servicos->descricao }}</textarea>
                        @error('descricao')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Duração</label>
                        <input type="text" name="duracao" class="form-control text-white ps-1 @error('duracao') is-invalid @enderror" value="{{ $servicos->duracao }}">
                        @error('duracao')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Preço</label>
                        <input type="text" name="preco" class="form-control text-white ps-1 @error('preco') is-invalid @enderror" value="{{ $servicos->preco }}">
                        @error('preco')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Foto</label>
                        <input class="form-control text-white ps-1" type="file" name="foto" id="image">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"></label>
                        <img id="showImage" class="rounded-circle" width="80" height="80" src="{{ (!empty($servicos->foto)) ? url('upload/servico_imagens/'.$servicos->foto) : url('upload/no_image.jpg') }}" alt="profile">
                    </div>
                

                    <button type="submit" class="btn btn-inverse-primary btn-fw">Guardar Alterações</button>
                    <a id="delete" class="btn btn-inverse-danger btn-fw" href="{{ route('apagar.servico',$servicos->id) }}">Apagar Serviço</a>
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
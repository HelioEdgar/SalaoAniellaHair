@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="row profile-body">

    <!-- middle wrapper end -->
    <div class="col-md-12 col-xl-12 middle-wrapper">
        <div class="row">
            <div class="card">
                <div class="card-body">
  
                <h6 class="card-title">Editar Salão</h6>

                <form method="POST" action="{{ route('actualizar.salao') }}" class="forms-sample" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{$salaos->id}}">

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nome do Salão</label>
                        <input type="text" name="nome" class="form-control text-white ps-1 @error('nome') is-invalid @enderror" value="{{$salaos->nome}}">
                        @error('nome')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control text-white ps-1 @error('email') is-invalid @enderror" value="{{$salaos->email}}">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">NIF</label>
                        <input type="text" name="nif" class="form-control text-white ps-1 @error('nif') is-invalid @enderror" value="{{$salaos->nif}}">
                        @error('nif')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Telefone</label>
                        <input type="text" name="telefone" class="form-control text-white ps-1 @error('telefone') is-invalid @enderror" value="{{$salaos->telefone}}">
                        @error('telefone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Localização</label>
                        <input type="text" name="localizacao" class="form-control text-white ps-1 @error('localizacao') is-invalid @enderror" value="{{$salaos->localizacao}}">
                        @error('localizacao')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="sobre" class="form-label">Sobre o Salao</label>
                        <textarea type="text" id="sobre" name="sobre" class="form-control text-white ps-1 @error('sobre') is-invalid @enderror" rows="10">{{$salaos->sobre}}</textarea>
                        @error('sobre')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Foto</label>
                        <input class="form-control text-white ps-1" type="file" name="foto" id="image">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"></label>
                        <img id="showImage" class="rounded-circle" width="80" height="80" src="{{ (!empty($salaos->foto)) ? url('upload/salao_imagens/'.$salaos->foto) : url('upload/no_image.jpg') }}" alt="profile">
                    </div>


                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Facebook</label>
                        <input type="text" name="fb" class="form-control text-white ps-1 @error('fb') is-invalid @enderror" value="{{$salaos->fb}}">
                        @error('fb')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Instagram</label>
                        <input type="text" name="ig" class="form-control text-white ps-1 @error('ig') is-invalid @enderror" value="{{$salaos->ig}}">
                        @error('ig')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Twitter</label>
                        <input type="text" name="tt" class="form-control text-white ps-1 @error('tt') is-invalid @enderror" value="{{$salaos->tt}}">
                        @error('tt')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-inverse-primary btn-fw">Guardar Alterações</button>
                    {{-- <a id="delete" class="btn btn-inverse-danger btn-fw" href="{{ route('apagar.salao',$salaos->id) }}">Apagar Salão</a> --}}
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
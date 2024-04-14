@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="row profile-body">
    <!-- left wrapper start -->
    <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
      <div class="card rounded">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between mb-2">
            <div>
                <img class="rounded-circle" width="128" height="128" src="{{ (!empty($utilizadores->foto)) ? url('upload/utilizador_imagens/'.$utilizadores->foto) : url('upload/no_image.jpg') }}" alt="profile">
                <span class="h4 ms-3">{{ $utilizadores->nome_utilizador }}</span>
              </div>
          </div>
          <p>Algum Texto</p>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Nome:</label>
            <p class="text-muted">{{$utilizadores->nome}}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
            <p class="text-muted">{{$utilizadores->email}}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Telefone:</label>
            <p class="text-muted">{{$utilizadores->telefone}}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">NIF:</label>
            <p class="text-muted">{{$utilizadores->nif}}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Genéro:</label>
            <p class="text-muted">{{$utilizadores->genero}}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Provincia:</label>
            <p class="text-muted">{{$utilizadores->provincia}}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Municipio:</label>
            <p class="text-muted">{{$utilizadores->municipio}}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Distrito:</label>
            <p class="text-muted">{{$utilizadores->distrito}}</p>
          </div>
        </div>
      </div>
    </div>
    <!-- left wrapper end -->
    <!-- middle wrapper end -->
    <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
            <div class="card">
                <div class="card-body">
  
                <h6 class="card-title">Actualizar Informações</h6>

                <form method="POST" action="#" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Nome</label>
                      <input type="text" name="nome" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{ $utilizadores->nome }}">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputUsername1" class="form-label">Username</label>
                      <input type="text" name="nome_utilizador" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{ $utilizadores->nome_utilizador }}">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email</label>
                      <input type="text" name="email" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{ $utilizadores->email }}">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Telefone</label>
                      <input type="text" name="telefone" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{ $utilizadores->telefone }}">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">NIF</label>
                      <input type="text" name="nif" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{ $utilizadores->nif }}">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Genéro</label>
                      <input type="text" name="genero" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{ $utilizadores->genero }}">
                  </div>

                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Provincia</label>
                      <input type="text" name="provincia" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{ $utilizadores->provincia }}">
                </div>


                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Municipio</label>
                      <input type="text" name="municipio" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{ $utilizadores->municipio }}">
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Distrito</label>
                    <input type="text" name="distrito" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{ $utilizadores->distrito }}">
              </div>
              
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Foto</label>
                        <input class="form-control" type="file" name="foto" id="image">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"></label>
                        <img id="showImage" class="rounded-circle" width="80" height="80" src="{{ (!empty($utilizadores->foto)) ? url('upload/utilizador_imagens/'.$utilizadores->foto) : url('upload/no_image.jpg') }}" alt="profile">
                    </div>
                    
                    <a id="delete" class="btn btn-inverse-danger btn-fw" href="{{ route('apagar.cliente',$utilizadores->id) }}">Apagar Cliente</a>
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
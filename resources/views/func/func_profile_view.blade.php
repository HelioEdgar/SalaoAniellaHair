@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="row profile-body">
    <!-- left wrapper start -->
    <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
      <div class="card rounded">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between mb-2">
            <div>
                <img class="rounded-circle" width="128" height="128" src="{{ (!empty($profileData->foto)) ? url('upload/func_imagens/'.$profileData->foto) : url('upload/no_image.jpg') }}" alt="profile">
                <span class="h4 ms-3">{{ $profileData->nome_utilizador }}</span>
              </div>
          </div>
          <p>{{ $profileData->sobre }}</p>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Nome:</label>
            <p class="text-muted">{{$profileData->nome}}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
            <p class="text-muted">{{$profileData->email}}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Telefone:</label>
            <p class="text-muted">{{$profileData->telefone}}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">NIF:</label>
            <p class="text-muted">{{$profileData->nif}}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Genéro:</label>
            <p class="text-muted">{{$profileData->genero}}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Provincia:</label>
            <p class="text-muted">{{$profileData->provincia}}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Municipio:</label>
            <p class="text-muted">{{$profileData->municipio}}</p>
          </div>
          <div class="mt-3">
            <label class="tx-11 fw-bolder mb-0 text-uppercase">Distrito:</label>
            <p class="text-muted">{{$profileData->distrito}}</p>
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

                <form method="POST" action="{{ route('func.profile.store') }}" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Nome</label>
                      <input type="text" name="nome" class="form-control text-white ps-1 " id="exampleInputUsername1" autocomplete="off" value="{{ $profileData->nome }}">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputUsername1" class="form-label">Nome de Utilizador</label>
                      <input type="text" name="nome_utilizador" class="form-control text-white ps-1 " id="exampleInputUsername1" autocomplete="off" value="{{ $profileData->nome_utilizador }}">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email</label>
                      <input type="text" name="email" class="form-control text-white ps-1 " id="exampleInputUsername1" autocomplete="off" value="{{ $profileData->email }}">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Telefone</label>
                      <input type="text" name="telefone" class="form-control text-white ps-1 " id="exampleInputUsername1" autocomplete="off" value="{{ $profileData->telefone }}">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">NIF</label>
                      <input type="text" name="nif" class="form-control text-white ps-1 " id="exampleInputUsername1" autocomplete="off" value="{{ $profileData->nif }}">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Genéro</label>
                      <input type="text" name="genero" class="form-control text-white ps-1 " id="exampleInputUsername1" autocomplete="off" value="{{ $profileData->genero }}">
                  </div>

                    <div class="mb-3">
                      <label for="provincia" class="form-label">Província</label>
                      <select id="provincia" name="provincia" class="form-control text-white ps-1">
                        <option value="" disabled selected>Selecione a Província</option>
                    </select>
                </div>


                    <div class="mb-3">
                      <label for="municipio" class="form-label">Municipio</label>
                      <select class="form-control text-white ps-1" id="municipio" name="municipio" disabled>
                        <option value="" disabled selected>Selecione o Município</option>
                        <!-- As opções de municípios serão carregadas com base na província selecionada -->
                    </select>
                  </div>

                  <div class="mb-3">
                    <label for="distrito" class="form-label">Distrito</label>
                    <select class="form-control text-white ps-1" id="distrito" name="distrito" disabled>
                      <option value="" disabled selected>Selecione o Distrito</option>
                      <!-- As opções de distritos serão carregadas com base no município selecionado -->
                    </select>
                   </div>


              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Sobre</label>
                <textarea class="form-control text-white ps-1 " id="exampleFormControlTextarea1" rows="5">{{ $profileData->sobre }}</textarea>
              </div>
              

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Foto</label>
                        <input class="form-control" type="file" name="foto" id="image">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"></label>
                        <img id="showImage" class="rounded-circle" width="80" height="80" src="{{ (!empty($profileData->foto)) ? url('upload/func_imagens/'.$profileData->foto) : url('upload/no_image.jpg') }}" alt="profile">
                    </div>
                    <button type="submit" class="btn btn-inverse-primary btn-fw">Guardar Alterações</button>
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
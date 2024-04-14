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
                <img class="rounded-circle" width="128" height="128" src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.jpg') }}" alt="profile">
                <span class="h4 ms-3">{{ $profileData->username }}</span>
              </div>
          </div>
          <p>Hi! I'm Amiah the Senior UI Designer at NobleUI. We hope you enjoy the design and quality of Social.</p>
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
  
                <h6 class="card-title">Trocar Palavra Passe</h6>

                <form method="POST" action="{{ route('admin.update.password') }}" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Palavra-Passe Antiga</label>
                        <input type="password" name="old_password" class="form-control text-white ps-1 @error('old_password') is-invalid @enderror" id="old_password" autocomplete="off">
                        @error('old_password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Palavra-Passe Nova</label>
                        <input type="password" name="new_password" class="form-control text-white ps-1 @error('new_password') is-invalid @enderror" id="new_password" autocomplete="off">
                        @error('new_password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Confirmar Palavra-Passe Nova</label>
                        <input type="password" name="new_password_confirmation" class="form-control text-white ps-1 " id="new_password_confirmation" autocomplete="off">
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Guardar Alterações</button>
                </form>
  
                </div>
              </div>
        </div>

      
  </div>
</div>

@endsection
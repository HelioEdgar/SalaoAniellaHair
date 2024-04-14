@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="row profile-body">

    <!-- middle wrapper end -->
    <div class="col-md-12 col-xl-12 middle-wrapper">
        <div class="row">
            <div class="card">
                <div class="card-body">
  
                <h6 class="card-title">Adicionar Novo Funcionário</h6>

                <form method="POST" action="{{ route('admin.criar.func') }}" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="perfil" class="form-control" value="funcionario">
                    <div class="mb-3">
                        <label for="" class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control text-white ps-1 @error('nome') is-invalid @enderror">
                        @error('nome')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control text-white ps-1 @error('email') is-invalid @enderror">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label>Palavra-Passe </label>
                      <input type="password" class="form-control p_input text-white ps-1 " id="password" name="password">
                    </div>
                    <div class="form-group">
                      <label>Confirmar Palavra-Passe</label>
                      <input type="password" class="form-control p_input text-white ps-1 " id="password_confirmation" name="password_confirmation">
                    </div>
                    @error('password')
                    <div class="alert alert-danger" role="alert">
                      <strong>Erro:</strong>{{$message}}
                    </div>
                    @enderror
                
                    

                    <button type="submit" class="btn btn-primary me-2">Guardar</button>
                </form>
  
                </div>
              </div>
        </div>

      
  </div>
</div>

@endsection
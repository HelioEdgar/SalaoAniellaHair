@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="row profile-body">

    <!-- middle wrapper end -->
    <div class="col-md-12 col-xl-12 middle-wrapper">
        <div class="row">
            <div class="card">
                <div class="card-body">
  
                <h6 class="card-title">Adicionar Novo Horário</h6>

                <form method="POST" action="{{ route('guardar.horario') }}" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Dias</label>
                        <input type="text" name="dias" class="form-control text-white ps-1 @error('dias') is-invalid @enderror">
                        @error('dias')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Inicio</label>
                      <input type="time" name="inicio" class="form-control text-white ps-1 @error('inicio') is-invalid @enderror">
                      @error('inicio')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Fim</label>
                    <input type="time" name="fim" class="form-control text-white ps-1 @error('fim') is-invalid @enderror">
                    @error('fim')
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
                    <div class="mb-3">
                      <label>Funcionário</label>
                    <select name="id_user" class="form-control text-white ps-1">
                      <option value="" disabled selected>Seleccione uma Opção</option>
                      @foreach($funcionarios as $funcionario)
                      <option value="{{ $funcionario->id}}">{{ $funcionario->nome}}</option>
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
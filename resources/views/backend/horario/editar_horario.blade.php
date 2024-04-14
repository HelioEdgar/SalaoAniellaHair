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

                <form method="POST" action="{{ route('actualizar.horario') }}" class="forms-sample" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{$horarios->id}}">

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Dias</label>
                        <input type="text" name="dias" class="form-control text-white ps-1 @error('dias') is-invalid @enderror" value="{{ $horarios->dias }}">
                        @error('dias')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Início</label>
                        <input type="time" name="inicio" class="form-control text-white ps-1 @error('inicio') is-invalid @enderror" value="{{ $horarios->inicio }}">
                        @error('inicio')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Fim</label>
                        <input type="time" name="fim" class="form-control text-white ps-1 @error('fim') is-invalid @enderror" value="{{ $horarios->fim }}">
                        @error('fim')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Serviço</label>
                      <select name="id_servico" class="form-control text-white ps-1">
                        @foreach($servicos as $servico)
                <option value="{{ $servico->id }}" {{ $horarios->id_servico == $servico->id ? 'selected' : '' }}>
                    {{ $servico->nome }}
                </option>
            @endforeach
                      </select>
                    </div>
                    <div class="mb-3">
                        <label>Funcionário</label>
                      <select name="id_user" class="form-control text-white ps-1" text-white ps-1>
                        @foreach($funcionarios as $funcionario)
                <option value="{{ $funcionario->id }}" {{ $horarios->id_user == $funcionario->id ? 'selected' : '' }}>
                    {{ $funcionario->nome }}
                </option>
            @endforeach
                      </select>
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Guardar Alterações</button>
                    <a id="delete" href="{{ route('apagar.horario',$horarios->id) }}">Apagar Horário</a>
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
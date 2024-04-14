@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="row profile-body">

    <!-- middle wrapper end -->
    <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
            <div class="card">
                <div class="card-body">
  
                <h6 class="card-title">Adicionar Novo Salao</h6>

                <form id="myForm" method="POST" action="{{ route('guardar.salao') }}" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nome do Salão</label>
                        <input type="text" name="nome" class="form-control">

                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleInputPassword1" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">NIF</label>
                        <input type="text" name="nif" class="form-control @error('nif') is-invalid @enderror">
                        @error('nif')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Telefone</label>
                        <input type="text" name="telefone" class="form-control @error('telefone') is-invalid @enderror">
                        @error('telefone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Localização</label>
                        <input type="text" name="localizacao" class="form-control @error('localizacao') is-invalid @enderror">
                        @error('localizacao')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Sobre o Salao</label>
                        <input type="text" name="sobre" class="form-control @error('sobre') is-invalid @enderror">
                        @error('sobre')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Foto</label>
                        <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror">
                        @error('foto')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Facebook</label>
                        <input type="text" name="fb" class="form-control @error('fb') is-invalid @enderror">
                        @error('fb')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Instagram</label>
                        <input type="text" name="ig" class="form-control @error('ig') is-invalid @enderror">
                        @error('ig')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Twitter</label>
                        <input type="text" name="tt" class="form-control @error('tt') is-invalid @enderror">
                        @error('tt')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Guardar</button>
                </form>
  
                </div>
              </div>
        </div>

      
  </div>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                nome: {
                    required : true,
                }, 
                email: {
                    required : true,
                }, 
                
            },
            messages :{
                nome: {
                    required : 'Por Favor, Insira o Nome do Salão',
                },
                email: {
                    required : 'Por Favor, Insira o Email Salão',
                },  
                 

            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>


@endsection
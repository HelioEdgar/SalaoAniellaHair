@extends('admin.admin_dashboard')
@section('title', 'Adicionar Serviço')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="row profile-body">

    <!-- middle wrapper end -->
    <div class="col-md-12 col-xl-12 middle-wrapper">
        <div class="row">
            <div class="card">
                <div class="card-body">
  
                <h6 class="card-title">Adicionar Novo Serviço</h6>

                <form id="myForm" method="POST" action="{{ route('guardar.servico') }}" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nome do Serviço</label>
                        <input type="text" name="nome" class="form-control text-white ps-1 @error('nome') is-invalid @enderror">
                        @error('nome')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Descrição</label>
                        <textarea type="text" name="descricao" class="form-control text-white ps-1 @error('descricao') is-invalid @enderror" rows="10"></textarea>
                        @error('descricao')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Duração</label>
                        <input type="text" name="duracao" class="form-control text-white ps-1 @error('duracao') is-invalid @enderror">
                        @error('duracao')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Preço</label>
                        <input type="text" name="preco" class="form-control text-white ps-1 @error('preco') is-invalid @enderror">
                        @error('preco')
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
                
            },
            messages :{
                nome: {
                    required : 'Por Favor, Insira o Nome do Serviço',
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
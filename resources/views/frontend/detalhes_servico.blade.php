@extends('frontend.aniella_salao')
@section('salao')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    

    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2></h2>
                <ol>
                    <li><a href="index.html"></a></li>
                    <li></li>
                </ol>
            </div>

        </div>
    </section>
<style>
    .div-grid {

display: grid;

place-items: center;

}
</style>
    <section class="inner-page">

        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h3 class="d-inline-block d-sm-none">{{ $servico->nome }}</h3>
                        <div class="col-12 div-grid"><br>
                            <img src="{{ !empty($servico->foto) ? url('upload/servico_imagens/' . $servico->foto) : url('upload/no_image.jpg') }}" class="product-image" alt="Product Image">
                        </div>
                        
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3">{{ $servico->nome }}</h3>
                        <p>{{ $servico->descricao }}</p>
                        <hr>

                        <div class="bg-gray py-2 px-3 mt-4">
                            <h2 class="mb-0">
                              {{ $servico->preco }} AOA
                            </h2>
                            <h4 class="mt-0">
                                <small>Duração: {{ $servico->duracao }} Minutos</small>
                            </h4>
                        </div>
                        <div class="bg-gray py-2 px-3 mt-4">
                            @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
      
                  <!-- Formulário de Agendamento -->
                  <form action="{{ route('agendar') }}" method="POST">
                      @csrf
                      <input type="hidden" name="id_servico" class="form-control" value="{{ $servico->id }}">
                      <div class="form-group">
                          <label for="dataA">Data:</label>
                          <input type="date" class="form-control" id="dataA" name="dataA" required
                              onchange="carregarHorariosDisponiveis()">
                      </div>
      
                      <div class="form-group">
                          <label for="horario">Horário:</label>
                          <select class="form-control" id="horario" name="horario" required>
                              <option value="">Selecione um horário</option>
                          </select>
                      </div>
      
                      <div class="form-group">
                          <label for="id_funcionario">Especialista:</label>
                          <select class="form-control" id="id_funcionario" name="id_funcionario" required>
                              <!-- Opções de funcionários -->
                              @foreach ($funcs as $funcionario)
                                  <option value="{{ $funcionario->id }}">{{ $funcionario->nome }}</option>
                              @endforeach
                          </select>
                      </div>
                      @auth
                      <button type="submit" class="btn btn-primary">Agendar</button>
                      @else
                      <P>Por favor, faça o Login para agendar este serviço</P>
                      @endauth
                      
                  </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <script>
        function carregarHorariosDisponiveis() {
            var dataSelecionada = document.getElementById('dataA').value;
            var diaDaSemana = new Date(dataSelecionada).getDay();

            // Solicitação AJAX para o servidor para buscar horários disponíveis
            fetch('/buscar-horarios/' + diaDaSemana)
                .then(response => response.json())
                .then(horarios => {
                    var select = document.getElementById('horario');
                    select.innerHTML = '<option value="">Selecione um horário</option>';

                    horarios.forEach(horario => {
                        var option = document.createElement('option');
                        option.value = horario.id;
                        option.textContent = `${horario.inicio} - ${horario.fim}`;
                        select.appendChild(option);
                    });
                });
        }
    </script>

@endsection

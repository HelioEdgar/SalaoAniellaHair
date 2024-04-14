@extends('admin.admin_dashboard')
@section('admin')


<div class="content-wrapper">
  <div class="row">
    <div class="col-sm-4 grid-margin">
      <div class="card">
        <div class="card-body">
          <h5>Agendamentos</h5>
          <div class="row">
            <div class="col-8 col-sm-12 col-xl-8 my-auto">
              <div class="d-flex d-sm-block d-md-flex align-items-center">
                <h2 class="mb-0">{{$numeroAgendamentosMarcados}}</h2>
                <p class="text-success ms-2 mb-0 font-weight-medium"></p>
              </div>
              <h6 class="text-muted font-weight-normal">Marcados</h6>
            </div>
            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
              <i class="icon-lg mdi mdi-calendar-multiple text-primary ms-auto"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-4 grid-margin">
      <div class="card">
        <div class="card-body">
          <h5>Clientes</h5>
          <div class="row">
            <div class="col-8 col-sm-12 col-xl-8 my-auto">
              <div class="d-flex d-sm-block d-md-flex align-items-center">
                <h2 class="mb-0">{{$numeroClientes}}</h2>
                <p class="text-success ms-2 mb-0 font-weight-medium"></p>
              </div>
              <h6 class="text-muted font-weight-normal"> Cadastrados</h6>
            </div>
            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
              <i class="icon-lg mdi mdi-account-circle text-danger ms-auto"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-4 grid-margin">
      <div class="card">
        <div class="card-body">
          <h5>Funcionários</h5>
          <div class="row">
            <div class="col-8 col-sm-12 col-xl-8 my-auto">
              <div class="d-flex d-sm-block d-md-flex align-items-center">
                <h2 class="mb-0">{{$numeroFunc}}</h2>
                <p class="text-danger ms-2 mb-0 font-weight-medium"></p>
              </div>
              <h6 class="text-muted font-weight-normal">Activos</h6>
            </div>
            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
              <i class="icon-lg mdi mdi-account-group text-success ms-auto"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row ">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          
        </div>
      </div>
    </div>
  </div>

  </div>
    <!-- content-wrapper ends -->
        <!-- main-panel ends -->   
@endsection
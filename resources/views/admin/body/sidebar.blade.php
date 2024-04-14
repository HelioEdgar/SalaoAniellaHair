<nav class="sidebar sidebar-offcanvas" id="sidebar">
    {{-- <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
      <a class="sidebar-brand brand-logo" href="index.html"><img src="assets/images/logo.svg" alt="logo" /></a>
      <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
    </div> --}}

    @php
      $id = Auth::user()->id;
      $profileData = App\Models\User::find($id);
    @endphp

    <ul class="nav">
      <li class="nav-item profile">
        <div class="profile-desc">
          <div class="profile-pic">
            <div class="count-indicator">
              <img class="img-xs rounded-circle " src="{{ (!empty($profileData->foto)) ? url('upload/admin_imagens/'.$profileData->foto) : url('upload/no_image.jpg') }}" alt="">
              <span class="count bg-success"></span>
            </div>
            <div class="profile-name">
              <h5 class="mb-0 font-weight-normal">{{$profileData->nome}}</h5>
              <span>{{$profileData->especialidade}}</span>
            </div>
          </div>
          <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
          <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
            <a href="{{ route('admin.profile') }}" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-settings text-primary"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">Meu Perfil</p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('admin.change.password') }}" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-onepassword  text-info"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">Trocar Palavra-Passe</p>
              </div>
            </a>
  
          </div>
        </div>
      </li>
      <li class="nav-item nav-category">
        <span class="nav-link">Navigação</span>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" data-bs-toggle="collapse" href="#agendamentos" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-icon">
            <i class="mdi mdi-calendar-text"></i>
          </span>
          <span class="menu-title">Agendamentos </span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="agendamentos">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('lista.agendamento')}}">Listar Agendamentos</a></li>
            <li class="nav-item"> <a class="nav-link" href="#">Adicionar Agendamento</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" data-bs-toggle="collapse" href="#clientes" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-icon">
            <i class="mdi mdi-human-male-female"></i>
          </span>
          <span class="menu-title">Clientes </span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="clientes">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('lista.cliente') }}">Listar Clientes</a></li>
            
          </ul>
        </div>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" data-bs-toggle="collapse" href="#funcionarios" aria-expanded="false" aria-controls="#">
          <span class="menu-icon">
            <i class="mdi mdi-human-male-female"></i>
          </span>
          <span class="menu-title">Funcionários </span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="funcionarios">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('lista.funcionario') }}">Listar Funcionários</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('func.criar')}}">Adicionar Funcionários</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" data-bs-toggle="collapse" href="#servicos" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-icon">
            <i class="mdi mdi-file-document-box"></i>
          </span>
          <span class="menu-title">Serviços </span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="servicos">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('lista.servico')}}">Listar Serviços</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('adicionar.servico')}}">Adicionar Serviços</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" data-bs-toggle="collapse" href="#horarios" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-icon">
            <i class="mdi mdi-alarm-multiple"></i>
          </span>
          <span class="menu-title">Horários </span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="horarios">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('lista.horario') }}">Listar Horários</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('adicionar.horario')}}">Adicionar Horários</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" data-bs-toggle="collapse" href="#galeria" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-icon">
            <i class="mdi mdi-camera"></i>
          </span>
          <span class="menu-title">Galeria </span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="galeria">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('lista.galeria')}}">Listar Fotos</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('adicionar.galeria')}}">Adicionar Fotos</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" data-bs-toggle="collapse" href="#salao" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-icon">
            <i class="mdi mdi-security"></i>
          </span>
          <span class="menu-title">Salão</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="salao">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('lista.salao') }}"> Informações do Salão</a></li>
            
          </ul>
        </div>
      </li>
    </ul>
</nav>
<div id="topbar" class="d-flex align-items-center fixed-top">
  <div class="container d-flex justify-content-center justify-content-md-between">

    <div class="contact-info d-flex align-items-center">
      @foreach ($salaos as $salao)
      <i class="bi bi-phone d-flex align-items-center"><span>{{$salao->telefone}}</span></i>
      <i class="bi bi-clock d-flex align-items-center ms-4"><span> Seg-Sab: 08AM - 08PM</span></i>
      @endforeach
    </div>

  </div>
</div>
<header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      @foreach ($salaos as $salao)
      <h1 class="logo me-auto me-lg-0"><a href="{{ route('site.index')}}">{{ $salao->nome}}</a></h1>
      @endforeach
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      {{-- @php
          $id = Auth::user()->id;
          $profileData = App\Models\User::find($id);
        @endphp --}}

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">Sobre</a></li>
          <li><a class="nav-link scrollto" href="#menu">Serviços</a></li>
          <li><a class="nav-link scrollto" href="#chefs">Profissionais</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Galeria</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contactos</a></li>
        </ul>
        @auth
        <ul>
          <li><span></span></li>
          <li class="dropdown"><a href="#"><span class="utilizador_nome">{{auth()->user()->nome}}</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{ route('utilizador.profile')}}">Dashboard</a></li>
              <li><a href="{{ route('utilizador.logout')}}">Logout</a></li>
            </ul>
          </li>
        </ul>
        @else
        <ul>
          <li><a href="{{ route('utilizador.login')}}">Login</a></li>
        </ul>
        @endauth
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="#book-a-table"></a>

    </div>
</header>
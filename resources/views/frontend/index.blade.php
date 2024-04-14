@extends('frontend.aniella_salao')
@section('salao')


  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
          @foreach ($salaos as $salao)
          <h1>Bem-vindo ao <span>{{ $salao->nome}}</span></h1>
          @endforeach
          <h2>Salão de Beleza e Estética!</h2>

          <div class="btns">
            <a href="#menu" class="btn-menu animated fadeInUp scrollto">Nossos Serviços</a>
            
          </div>
        </div>
        <div class="col-lg-4 d-flex align-items-center justify-content-center position-relative" data-aos="zoom-in" data-aos-delay="200">
          <a href="https://www.youtube.com/watch?v=-FnrCZJw6TE" class="glightbox play-btn"></a>
        </div>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->

    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
          @foreach ($salaos as $salao)
    
          <div class="row">
            <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
              <div class="about-img">
                <img src="{{ (!empty($salao->foto)) ? url('upload/salao_imagens/'.$salao->foto) : url('upload/no_image.jpg') }}" alt="">
              </div>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
              <h3>Salão de Beleza {{ $salao->nome}}.</h3>
              
              <p>
                {{ $salao->sobre}}
              </p>
            </div>
          </div>
    
          @endforeach
        </div>
    </section><!-- End About Section -->

    <!-- ======= Why Us Section ======= -->

    <section id="why-us" class="why-us">
        <div class="container" data-aos="fade-up">
    
          <div class="section-title">
            <h2>Nossos Diferenciais</h2>
            <p>Por Quê Escolher o Nosso Salão de Beleza</p>
          </div>
    
          <div class="row">
    
            <div class="col-lg-4">
              <div class="box" data-aos="zoom-in" data-aos-delay="100">
                <span>01</span>
                <h4>Personalização</h4>
                <p>Cada cliente é único na Aniella Hair Salão de Beleza. Em vez de tendências passageiras, realçamos sua beleza natural, entendendo profundamente seus desejos e necessidades.</p>
              </div>
            </div>
    
            <div class="col-lg-4 mt-4 mt-lg-0">
              <div class="box" data-aos="zoom-in" data-aos-delay="200">
                <span>02</span>
                <h4>Ambiente Acolhedor</h4>
                <p>Mais que tratamentos de beleza, proporcionamos uma atmosfera de relaxamento e bem-estar, garantindo momentos de cuidado e tranquilidade.</p>
              </div>
            </div>
    
            <div class="col-lg-4 mt-4 mt-lg-0">
              <div class="box" data-aos="zoom-in" data-aos-delay="300">
                <span>03</span>
                <h4> Profissionais Qualificados</h4>
                <p>Nossa equipe, com a experiência de mais de 20 anos, está sempre atualizada nas melhores técnicas e produtos do mercado, garantindo uma experiência de beleza transformadora.</p>
              </div>
            </div>
    
          </div>
    
        </div>
    </section>
  </main><!-- End #main -->
<!-- End Why Us Section -->

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Conheça</h2>
          <p>Nossos Serviços</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="menu-flters">
              <li data-filter="*" class="filter-active">Tudo</li>
              <li data-filter=".filter-starters">Cabelos</li>
              <li data-filter=".filter-salads">Mãos e Pés</li>
              <li data-filter=".filter-specialty">Maquiagem</li>
            </ul>
          </div>
        </div>

        <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">

          @foreach ($servicos as $servico)
          <div class="col-lg-6 menu-item filter-starters">
            <img src="{{ (!empty($servico->foto)) ? url('upload/servico_imagens/'.$servico->foto) : url('upload/no_image.jpg') }}" class="menu-img" alt="">
            <div class="menu-content">
              <a href="{{ route('detalhes.servico', $servico->slug)}}">{{ $servico->nome}}</a><span>{{ $servico->preco}} AOA</span>
            </div>
            <div class="menu-ingredients">
              Duração: {{ $servico->duracao}}
              <br/>
              <br/>
              {{ $servico->descricao}}
            </div>
          </div>

          @endforeach


        </div>

      </div>
    </section><!-- End Menu Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">

      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Galeria</h2>
          <p>Algumas Fotos do Nosso Salão de Beleza</p>
        </div>
      </div>

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-0">
          @foreach($galerias as $galeria)
          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="{{ (!empty($galeria->foto)) ? url('upload/galeria_imagens/'.$galeria->foto) : url('upload/no_image.jpg') }}" class="gallery-lightbox" data-gall="gallery-item">
                <img src="{{ (!empty($galeria->foto)) ? url('upload/galeria_imagens/'.$galeria->foto) : url('upload/no_image.jpg') }}" alt="" class="img-fluid">
              </a>
            </div>
          </div>
          @endforeach
        </div>

      </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Chefs Section ======= -->
    <section id="chefs" class="chefs">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Conheça</h2>
          <p>Nossa Equipa de Especialistas</p>
        </div>

        <div class="row">
          @foreach($funcs as $func)
          <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <img src="{{ (!empty($func->foto)) ? url('upload/func_imagens/'.$func->foto) : url('upload/no_image.jpg') }}" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>{{$func->nome}}</h4>
                  <span>{{$func->especialidade}}</span>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>

      </div>
    </section><!-- End Chefs Section -->





@endsection
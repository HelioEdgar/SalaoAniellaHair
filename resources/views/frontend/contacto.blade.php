<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Contacto</h2>
        <p>Entre em Contacto</p>
      </div>
    </div>

    <div data-aos="fade-up">
      <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3941.5270694914298!2d13.18620517487547!3d-8.923481291635342!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1a51f53bcc248213%3A0xe6750b1816f6400f!2sTis%20Tech%20Angola!5e0!3m2!1spt-PT!2sao!4v1699653868221!5m2!1spt-PT!2sao" frameborder="0" allowfullscreen></iframe>
    </div>

    <div class="container" data-aos="fade-up">

      <div class="row mt-5">

        @foreach ($salaos as $salao)
        <div class="col-lg-4">
          <div class="info">
            <div class="address">
              <i class="bi bi-geo-alt"></i>
              <h4>Localização:</h4>
              <p>{{ $salao->localizacao}}</p>
            </div>

            <div class="open-hours">
              <i class="bi bi-clock"></i>
              <h4>Horário de Atendimento:</h4>
              <p>
                Segunda-Sábado:<br>
                08:00 AM - 08:00 PM
              </p>
            </div>

            <div class="email">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>{{ $salao->email}}</p>
            </div>

            <div class="phone">
              <i class="bi bi-phone"></i>
              <h4>Telefone:</h4>
              <p>{{ $salao->telefone}}</p>
            </div>

          </div>
          @endforeach

        </div>

        

      </div>

    </div>
</section>
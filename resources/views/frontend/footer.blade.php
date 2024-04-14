<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          @foreach ($salaos as $salao)
          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>{{ $salao->nome}}</h3>
              <p>
                {{ $salao->localizacao}} <br>
                LDA 000-00, ANG<br><br>
                <strong>Telefone:</strong> {{ $salao->telefone}}<br>
                <strong>Email:</strong> {{ $salao->email}}<br>
              </p>
              <div class="social-links mt-3">
                <a href="{{ $salao->tt}}" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="{{ $salao->fb}}" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="{{ $salao->ig}}" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
              </div>
            </div>
          </div>

          

          @endforeach
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Aniella Hair</span></strong>. Todos os direitos reservados
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/restaurantly-restaurant-template/ -->
        {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
      </div>
    </div>
</footer>
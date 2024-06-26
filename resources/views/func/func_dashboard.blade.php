<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Painel do Funcionário - Aniella hair</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/jvectormap/jquery-jvectormap.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel-2/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel-2/owl.theme.default.min.css')}}">
    <!-- End plugin css for this page -->

    	<!-- CSS Para o DataTable -->
    <link rel="stylesheet" href="{{ asset('../assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
	  <!-- Fim do CSS Para o DataTable -->

    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png')}}" />

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->

        @include('func.body.sidebar')

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->

        @include('func.body.header')

        <!-- partial -->

        <div class="main-panel">

          <div class="content-wrapper">
            @yield('func')
          </div>

        
        <!-- main-panel ends -->
        @include('func.body.footer')
      <!-- partial -->
      </div>
    </div>
      
      <!-- page-body-wrapper ends -->
  </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('../assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('../assets/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{ asset('../assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
    <script src="{{ asset('../assets/vendors/jvectormap/jquery-jvectormap.min.js')}}"></script>
    <script src="{{ asset('../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{ asset('../assets/vendors/owl-carousel-2/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('../assets/js/jquery.cookie.js" type="text/javascript')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('../assets/js/off-canvas.js')}}"></script>
    <script src="{{ asset('../assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{ asset('../assets/js/misc.js')}}"></script>
    <script src="{{ asset('../assets/js/settings.js')}}"></script>
    <script src="{{ asset('../assets/js/todolist.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('../assets/js/dashboard.js')}}"></script>
    <!-- End custom js for this page -->

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif 
</script>
  
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

	<!-- DataTable Script JS -->
  <script src="{{ asset('../assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('../assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
  <script src="{{ asset('../assets/js/data-table.js') }}"></script>
  <script src="{{ asset('../assets/js/code/validate.min.js') }}"></script>
  <script src="{{ asset('../assets/js/code/code.js') }}"></script>
  <script src="{{ asset('../assets/js/code/endereco.js') }}"></script>
	<!-- Fim -->
  </body>
</html>
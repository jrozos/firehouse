<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      
      <title>{{ config('app.name', 'FireHouse Dashbaord') }}</title>

      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>


      <!--     Fonts and icons     -->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
      <!-- Nucleo Icons -->
      <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
      <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
      <!-- Favicon -->
      <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
      <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
      <link rel="manifest" href="/site.webmanifest">
      <!-- Font Awesome Icons -->
      {{-- <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script> --}}
      <script src="https://kit.fontawesome.com/ce2aa1c945.js" crossorigin="anonymous"></script>
      <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
      <!-- CSS Files -->
      <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css" rel="stylesheet" />
      <link id="pagestyle" href="{{asset('/css/dashboard.css')}}" rel="stylesheet" />
  </head>

  <body class="g-sidenav-show bg-gray-100">
    @include('nav.sidenav')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
      @include('nav.dash-navbar')
      <div class="container-fluid py-4">
        <div id="app">
          @yield('content')
          
        </div>
        @include('footer.dash-footer')
      </div>
    </main>
    
    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/core/popper.min.js')}}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
    

    <!-- Plugin for the charts, full documentation here: https://www.chartjs.org/ 
    <script src="{{ asset('assets/js/plugins/chartjs.min.js')}}"></script>
    <script src="{{ asset('assets/js/plugins/Chart.extension.js')}}"></script>
    -->
    <script>

      var win = navigator.platform.indexOf('Win') > -1;
      if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
          damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
      }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/js/soft-ui-dashboard.min.js')}}"></script>
    <script src="{{ asset('js/wow.min.js')}}"></script>
    <script>
      new WOW().init();
      
    </script>
    
  </body>
</html>
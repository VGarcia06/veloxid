<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<title>Veloxid</title>
<!--{{ config('app.name', 'Veloxid') }}-->
<!-- Fav Icon -->
<link rel="icon" href="purple/assets/images/favicon-96x96.png" type="image/x-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

<!-- Stylesheets -->

<!--Estilo login-->

<!--Estilo de purple-->
    <!-- plugins:css -->
    <link rel="stylesheet" href="purple/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="purple/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="purple/assets/css/style.css">
    {{-- <link rel="stylesheet" href="template/jsgrid-theme.min.css"> --}}
    <!-- End layout styles -->
    <link rel="shortcut icon" href="purple/assets/images/favicon.png" />
    <link rel="stylesheet" href="template_welcome/assets/css/style.css"/>
<!--fin de estilo de purple-->
</head>
<header>
    <div class="contenedor">
        <!-- <img src="img/logo.png"> -->
        <input type="checkbox" id="menu-bar">
        <label class="fontawesome-align-justify" for="menu-bar"></label>
                <nav class="menu">
                    @if (Route::has('login'))    
                    <a href="#">Inicio</a>        
                    <a href="#">Nosotros</a>
                    <a href="#">Servicios</a>
                    <a href="{{ route('cotizacion') }}">Cotizar</a>
                    @auth
                    @else
                    <a href="{{ route('login') }}">Iniciar Sesión</a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" >Registrar</a>
                    @endif

                    @endif
                    @endif
                </nav>
            </div>
</header>
<br>
<body>
    <div id="app">
            <cotization home-route="{{ url('request') }}"></cotization>
    </div>
<footer>
    <div class="contenedor">
        <p class="copy">VELOXID &copy; 2020</p>
        <div class="sociales">
            <a class="fontawesome-facebook-sign" href="#"></a>
            <a class="fontawesome-twitter" href="#"></a>
            <a class="fontawesome-camera-retro" href="#"></a>
            <!-- <a class="fontawesome-google-plus-sign" href="#"></a> -->
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<!--js de purple-->
<!-- plugins:js -->
{{-- <script src="purple/assets/vendors/js/vendor.bundle.base.js"></script> --}}
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="purple/assets/vendors/chart.js/Chart.min.js"></script>
  <script src="purple/assets/js/jq.tablesort.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="purple/assets/js/off-canvas.js"></script>
  <script src="purple/assets/js/hoverable-collapse.js"></script>
  <script src="purple/assets/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="purple/assets/js/dashboard.js"></script>
  <script src="purple/assets/js/todolist.js"></script>
  <script src="purple/assets/js/tooltips.js"></script>
  <script src="purple/assets/js/tablesorter.js"></script>
  
  
  {{-- <script src="purple/assets/js/popover.js"></script> --}}

  <!-- End custom js for this page -->
<!--js de purple-->
</body>
</html>


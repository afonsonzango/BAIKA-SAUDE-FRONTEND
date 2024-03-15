<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

  <title>baika + Saúde</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('')}}manager/assets/img/logo_saude.png" rel="icon">
  <link href="{{asset('')}}manager/assets/img/logo_saude.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('')}}client/{{asset('')}}client/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="{{asset('')}}client/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="{{asset('')}}client/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{asset('')}}client/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{asset('')}}client/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{asset('')}}client/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{asset('')}}client/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{asset('')}}client/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Calendar -->
  <link rel="stylesheet" href="calendar/css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Template Main CSS File -->
  <link href="{{asset('')}}client/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medicio
  * Updated: Aug 30 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <style>
    .carousel-control-prev2{
        position:relative;
        padding:0;
        /*use this display this to center the indicators horizontally*/
        display:table;
        margin:0 auto;
        top: 0px;
    }
    .carousel-control-next2{
        position:relative;
        padding:0;
        /*use this display this to center the indicators horizontally*/
        display:table;
        margin:0 auto;
        top: 0px;
    }



  </style>



</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
      <div class="align-items-center d-none d-md-flex">
        <i class="bi bi-clock"></i> PRIMEIRA PLATAFORMA 100% ANGOLANA DE TELEMEDICINA E ASSISTÊNCIA MÉDICA AO DOMICÍLIO.
      </div>
      <!--<div class="d-flex align-items-center">
        <i class="bi bi-phone"></i> Call us now +1 5589 55488 55-->
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top" style="position: fixed; top: 0">
    <div class="container d-flex align-items-center">

      <a href="{{route('init')}}" class="logo me-auto"><img src="{{asset('')}}client/assets/img/logo.png" alt=""></a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <h1 class="logo me-auto"><a href="index.html">Medicio</a></h1> -->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto " href="{{(isset($route_status) && $route_status == true)? route('init').'#hero':'#hero'}}">Início</a></li>
          <li><a class="nav-link scrollto" href="{{(isset($route_status) && $route_status == true)? route('init').'#about':'#about'}}">Sobre nós</a></li>


          <li><a class="nav-link scrollto" href="{{(isset($route_status) && $route_status == true)? route('init').'#doctors':'#doctors'}}">Especialistas</a></li>
          <li><a class="nav-link scrollto" href="#news">Notícias</a></li>

          <li><a class="nav-link" href="{{route('login')}}">Entrar</a></li>

          <!--<li><a class="nav-link scrollto" href="#contact">Contactos</a></li>-->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="{{route('appointment')}}" class="appointment-btn scrollto"><span class="d-none d-md-inline">Marcar</span> consultas</a>
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <main id="main">

    @yield('content')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3 style="text-align: center;">Baika + Saúde</h3>
              <p> Rotunda da camama <br>
                Kilamba Kiaxi, ANG<br><br>
                <strong>Telemóvel:</strong> +244 934 886 675<br>
                <strong>Email:</strong> geral@baikainvesti.ao<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Início</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Sobre nós</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Serviços</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Contactos</a></li>

            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Serviços</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Telemedicina</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Enfermagem ao domicílio</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terapia da Fala</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Psicologia</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Fisioterapia</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Exames médicos</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Newsletter</h4>
            <p>Inscreva-se para receber informações para melhorar a sua qualidade de vida</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>baika investments</span></strong>. Todos direitos reservados
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medicio-free-bootstrap-theme/ -->
        Desenvolvido por <a href="https://baikainvesti.ao/">Baika investments holding</a>
      </div>
    </div>
  </footer><!-- End Footer -->


  <div class="modal fade" id="verticalycentered" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Título</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <p>
              <i>
                Non omnis incidunt qui sed occaecati magni asperiores est mollitia. Soluta at et reprehenderit. Placeat autem numquam et fuga numquam. Tempora in facere consequatur sit dolor ipsum. Consequatur nemo amet incidunt est facilis. Dolorem neque recusandae quo sit molestias sint dignissimos.
              </i>
            </p>
        </div>

      </div>
    </div>
  </div>

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('')}}js/jquery.min.js"></script>
  <script src="{{asset('')}}js/scripts.js"></script>
  <script src="{{asset('')}}client/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="{{asset('')}}client/assets/vendor/aos/aos.js"></script>
  <script src="{{asset('')}}client/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('')}}client/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{asset('')}}client/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{asset('')}}client/assets/vendor/php-email-form/validate.js"></script>

  <!-- calendar -->
  <script src="{{asset('')}}calendar/js/jquery.min.js"></script>
  <script src="{{asset('')}}calendar/js/popper.js"></script>
  <script src="{{asset('')}}calendar/js/bootstrap.min.js"></script>
  <script src="{{asset('')}}calendar/js/main.js"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('')}}client/assets/js/main.js"></script>

</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('')}}manager/assets/img/logo_saude.png" rel="icon">
  <link href="{{asset('')}}manager/assets/img/logo_saude.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('')}}manager/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{asset('')}}manager/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{asset('')}}manager/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{asset('')}}manager/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="{{asset('')}}manager/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="{{asset('')}}manager/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{asset('')}}manager/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('')}}manager/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center" style="background-color: #7d8383">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{route('management')}}" class="logo d-flex align-items-center">
        <img src="{{asset('')}}manager/assets/img/logo.png" alt="">
        {{--<span class="d-none d-lg-block">Baika+Saúde</span>--}}
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              Você tem 4 novas notificações
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-journal-medical text-primary"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min.</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-journal-medical text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr.</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-journal-medical text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs.</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-journal-medical text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs.</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Mostrar todas notificações</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        {{--<li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="{{asset('')}}manager/assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="{{asset('')}}manager/assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="{{asset('')}}manager/assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->--}}

        <li class="nav-item dropdown pe-3">
          @php
              $user = session()->get('userAuth');
          @endphp
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{env('API_URL')}}/files/{{isset($user['img'])?$user['img']:''}}" width="38px" height="60px" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{isset($user['name'])?$user['name']:''}}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            
            <li class="dropdown-header">
              <h6>{{isset($user['name'])?$user['name']:''}}</h6>
              <span>{{isset($user['name_category'])?$user['name_category']:''}}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('my_profile')}}">
                <i class="bi bi-person"></i>
                <span>Meu Perfil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Definições</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            {{--<li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>--}}

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('logout')}}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sair</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar" >

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link" href="{{route('management')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Conteúdo Informativo</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('news')}}">
              <i class="bi bi-circle"></i><span>Notícias</span>
            </a>
          </li>
          @if ($user['role_id'] != 3 && $user['role_id'] != 2)
          <li>
            <a href="{{route('faqs')}}">
              <i class="bi bi-circle"></i><span>Perguntas frequentes</span>
            </a>
          </li>  
          @endif
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          {{--<i class="bi bi-journal-text"></i>--}}<i class="bi bi-people"></i><span>Utilizadores</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          @if ($user['role_id'] == 4)
          <li>
            <a href="{{route('patients')}}">
              <i class="bi bi-circle"></i><span>Pacientes</span>
            </a>
          </li>
          @endif
          @if($user['role_id'] != 2)
          <li>
            <a href="{{route('professionals')}}">
              <i class="bi bi-circle"></i><span>Profissionais da saúde</span>
            </a>
          </li>
          @endif
          @if ($user['role_id'] != 3 && $user['role_id'] != 2)
          <li>
            <a href="{{route('health_units')}}">
              <i class="bi bi-circle"></i><span>Unidades Sanitária</span>
            </a>
          </li>
          @endif

          @if ($user['role_id'] != 3 && $user['role_id'] != 2)
          <li>
            <a href="{{route('pharmaces')}}">
              <i class="bi bi-circle"></i><span>Farmácias</span>
            </a>
          </li>
          @endif
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Prontuário Geral</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          {{--<li>
            <a href="{{route('medical_exams')}}">
              <i class="bi bi-circle"></i><span>Exames Médicos</span>
            </a>
          </li>--}}
      
          @if ($user['role_id'] == 3)
          <li>
            <a href="{{route('show_medical_area')}}">
              <i class="bi bi-circle"></i><span>Áreas Médicas</span>
            </a>
          </li>
          <li>
            <a href="{{route('show_specialties')}}">
              <i class="bi bi-circle"></i><span>Especialidades Médicas</span>
            </a>
          </li>
          @endif
          <li>
            <a href="{{route('chronic_diseases')}}">
              <i class="bi bi-circle"></i><span>Doenças Crônicas</span>
            </a>
          </li>
          {{--<li>
            <a href="{{route('medicines')}}">
              <i class="bi bi-circle"></i><span>Medicamentos</span>
            </a>
          </li>--}}
          <li>
            <a href="{{route('allergies')}}">
              <i class="bi bi-circle"></i><span>Alergias</span>
            </a>
          </li>
          <li>
            <a href="{{route('blood_groups')}}">
              <i class="bi bi-circle"></i><span>Grupo Sanguíneo</span>
            </a>
          </li>
          <li>
            <a href="{{route('prescriptions')}}">
              <i class="bi bi-circle"></i><span>Prescrição Médica</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Estatística</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          {{--<li>
            <a href="charts-chartjs.html">
              <i class="bi bi-circle"></i><span>Chart.js</span>
            </a>
          </li>
          <li>
            <a href="charts-apexcharts.html">
              <i class="bi bi-circle"></i><span>ApexCharts</span>
            </a>
          </li>
          <li>
            <a href="charts-echarts.html">
              <i class="bi bi-circle"></i><span>ECharts</span>
            </a>
          </li>--}}
        </ul>
      </li><!-- End Charts Nav -->
      
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('medical_consultation')}}">
          <i class="bi bi-card-heading"></i>
          <span>Consultas</span>
        </a>
      </li><!-- End Register Page Nav -->

      @if ($user['role_id'] == 3)
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('clinical_datas')}}">
          <i class="bi bi-clipboard-plus"></i>
          <span>Dados Clínicos</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('appointment_schedule')}}">
          <i class="bi bi-calendar-week"></i>
          <span>Agenda de consulta</span>
        </a>
      </li><!-- End Register Page Nav -->
      @endif
      
      {{--<li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="icons-bootstrap.html">
              <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-remix.html">
              <i class="bi bi-circle"></i><span>Remix Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>Boxicons</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li><!-- End Error 404 Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a>
      </li><!-- End Blank Page Nav -->--}}

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    @yield('content')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Baika+Saúde</span></strong>. Todos direitos reservados
    </div>
    <div class="credits">
      Desenvolvido pela <a href="#">Baikapay Investimentos</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('')}}js/jquery.min.js"></script>
  <script src="{{asset('')}}js/management.js"></script>
  <script src="{{asset('')}}manager/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="{{asset('')}}manager/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('')}}manager/assets/vendor/chart.js/chart.min.js"></script>
  <script src="{{asset('')}}manager/assets/vendor/echarts/echarts.min.js"></script>
  <script src="{{asset('')}}manager/assets/vendor/quill/quill.min.js"></script>
  <script src="{{asset('')}}manager/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="{{asset('')}}manager/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="{{asset('')}}manager/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('')}}manager/assets/js/main.js"></script>

  {{--<script>
      let result = document.getElementById("special");
      //result.style.display = "none";

      $( document ).ready(function() {
        let category = $('#category').val();
        if (category == 'special') {
          result.style.display = "block";
        }else{
          result.style.display = "none";
        }
      })

      $('#category').on('change', function (params) {
        let category = $('#category').val();
        
        if (category == 'special') {
          result.style.display = "block";
        }else{
          result.style.display = "none";
        }
          /*let quantity = parseInt($('#phone_quantity').val());
          
          if ($('#phone_quantity').val() != '') {      
              let val = parseInt($('#price_min').val());
              let price_total = val*quantity;
              $('#price_total').val(price_total);
          }else{
              $('#price_total').val($('#price_min').val());
          }

          if (quantity == 0) {      
              $('#price_total').val($('#price_min').val());
          }*/

      })
  </script>--}}

</body>

</html>

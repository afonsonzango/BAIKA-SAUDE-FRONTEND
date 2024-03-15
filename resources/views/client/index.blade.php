
@extends('layouts.client')

@section('title', 'Baika + Saúde')

@section('content')

<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url({{asset('')}}client/assets/img/slide/slide-1.png)">
          <div class="container">
            <h2>Bem vindos ao  <span>Baika + Saúde</span></h2>
            <p>A primeira plataforma 100% angolana de Telemedicina, Assistência Médica domiciliar, cadastramento e registo  de dados clínicos.</p>
            <a href="#about" class="btn-get-started scrollto">Saiba mais</a>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url({{asset('')}}client/assets/img/slide/slide-2.png)">
          <div class="container">
            <h2>Conexão com Profissionais de Saúde </h2>
            <p>Facilitamos o acesso dos usuários a unidades e profissionais de saúde como médicos, enfermeiros, fisioterapeutas, psicólogos e terapeutas, através de consultas online, assistência domiciliar e agendamento de consultas.
              .</p>
            <a href="#about" class="btn-get-started scrollto">Ler mais</a>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url({{asset('')}}client/assets/img/slide/slide-3.png)">
          <!--<div class="container">
            <h2>Plataforma híbrida</h2>
            <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel.</p>
            <a href="#about" class="btn-get-started scrollto">Read More</a>-->
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->





<!-- ======= Featured Services Section ======= -->
<section id="featured-services" class="featured-services">
  <div class="container" data-aos="fade-up">

    <h2 class="text-center mb-5" style="font-weight: bold;">UNIDADES DE SAÚDE DISPONÍVEIS</h2>

    <div class="row">
      <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
        <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
          <div class="icon"><i class="fas fa-heartbeat"></i></div>
          <h4 class="title"><a href="">HOSPITAIS</a></h4>
          <p class style="text-align: justify;"="description">✨ Equipe de Profissionais Dedicados
            Nossos médicos, enfermeiros e equipes de apoio trabalham incansavelmente para garantir que você receba o melhor tratamento possível.

            <p class="description"> 🌟 Tecnologia de Ponta
            Investimos em tecnologia de última geração para diagnóstico preciso e tratamentos eficazes.


        </div>
      </div>

      <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
        <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
          <div class="icon"><i class="fas fa-pills"></i></div>
          <h4 class="title"><a href="">CLÍNICAS</a></h4>
          <p class style="text-align: justify">✨ Consultas com Especialistas
            Nossos médicos altamente qualificados estão à disposição para abordar suas preocupações de saúde e oferecer orientações especializadas.</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
        <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
          <div class="icon"><i class="fas fa-thermometer"></i></div>
          <h4 class="title"><a href="">LABORATÓRIOS DE ANÁLISES CLÍNICAS</a></h4>
          <p class style="text-align: justify;"="description">✨ Exames Precisos
            Nossos profissionais altamente qualificados realizam exames com precisão, garantindo que você tenha informações confiáveis para tomar decisões informadas sobre sua saúde.</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
        <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
          <div class="icon"><i class="fas fa-dna"></i></div>
          <h4 class="title"><a href="">CENTROS OFTALMOLÓGICOS</a></h4>
          <p class style="text-align: justify;"="description">✨ Consultas oftalmológicas completas.
            <p class="description"> ✨ Exames de vista precisos e inovadores.
              <p class="description">✨ Tratamentos para diversas condições oculares.
                <p class="description">✨ Cirurgias oftalmológicas avançadas.</p>
        </div>
      </div>

    </div>

  </div>
</section><!-- End Featured Services Section -->

<!-- ======= About Us Section ======= -->
<section id="about" class="about">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Sobre nós</h2>
      <p style="text-align: justify;">Somos uma plataforma projectada para permitir consultas médicas e atendimento médico à distância, usando tecnologia de comunicação digital. Nós conectamos pacientes a médicos, enfermeiros ou unidades de saúde por meio de chamadas de vídeo, mensagens de texto, chats de áudio e outras formas de comunicação online. A nossa principal finalidade é de fornecer assistência médica remota, diagnóstico, tratamento e monitoramento de pacientes.
        Isso pode ser especialmente útil para consultas não urgentes, acompanhamento de condições crônicas, triagem inicial e fornecimento de orientações médicas em tempo real.
        </p>
    </div>

    <div class="row">
      <div class="col-lg-6" data-aos="fade-right">
        <img src="{{asset('')}}client/assets/img/about.png" class="img-fluid" alt="">
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
        <h3>Serviços disponíveis na nossa app .</h3>
        <p class="fst-italic">
          Saiba quais são os serviços disponíveis na nossa aplicação e mantenha-se actualizado.
        </p>
        <ul>
          <li><i class="bi bi-check-circle"></i> Assistência Médica ao Domicílio.
          </li>Oferecemos atendimento médico em casa para pacientes que precisam de cuidados médicos sem a necessidade de ir a um hospital.
          <li><i class="bi bi-check-circle"></i> Consultas médicas não urgentes
          </li>Os usuários podem agendar consultas médicas não emergenciais com médicos de diversas especialidades.

          <li><i class="bi bi-check-circle"></i> Telemedicina
            Consultas médicas remotas 24/7, permitindo que os pacientes se conectem a médicos por vídeo ou chat de texto para avaliações médicas e receitas.
            <li><i class="bi bi-check-circle"></i> Ambulância Uber: Serviço de ambulância on-demand, com resposta rápida em situações de emergência ou transporte médico agendado.
              <li><i class="bi bi-check-circle"></i> Farmácias Online:
                Tenha sempre uma farmácia perto de sí, solicite o seu farmáco sem sair de casa atráves da nossa app

        <p>

        </p>
      </div>
    </div>

  </div>
</section><!-- End About Us Section -->


<!-- ======= Services Section ======= -->
<section id="services" class="services services">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Serviços ao domicílio</h2>
      <p>Saiba mais sobre os nossos serviços.</p>
    </div>

    <div class="row">
      <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
        <div class="icon"><i class="fas fa-heartbeat"></i></div>
        <h4 class="title"><a href="">Telemedicina</a></h4>
        <p class="description" style="text-align: justify;">Somos uma plataforma projectada para permitir consultas médicas e atendimento médico à distância, usando tecnologia de comunicação digital.</p>
      </div>
      <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="200">
        <div class="icon"><i class="fas fa-pills"></i></div>
        <h4 class="title"><a href="">Enfermagem ao domicílio

        </a></h4>
        <p class="description" style="text-align: justify;">Colocamos ao seu dispor um serviço de enfermagem altamente especializado e experiente, com o objectivo de realização de procedimentos e consultas na nossa plataforama e ainda procedimentos ou permanências no domicílio (em casa ou não) do utente.</p>
      </div>
      <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="300">
        <div class="icon"><i class="fas fa-hospital-user"></i></div>
        <h4 class="title"><a href="">Terapia da Fala</a></h4>
        <p class="description" style="text-align: justify;">O terapeuta da fala é responsável pelo diagnóstico e intervenção com indivíduos que apresentem dificuldades ao nível da comunicação, linguagem, articulação, fluência, voz, mastigação ou deglutição. A terapia da fala pode ser realizada em bebés, crianças, jovens, adultos e idosos.</p>
      </div>
      <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
        <div class="icon"><i class="fas fa-dna"></i></div>
        <h4 class="title"><a href="">Psicologia</a></h4>
        <p class="description" style="text-align: justify;">A consulta de psicologia no domicílio é uma modalidade que permite ajudar o cliente quando existem dificuldades na mobilidade, seja física ou devido a factores externos – indisponibilidade de meios e/ou de tempo para se deslocar até um gabinete ou clínica –, ou quando tem que estar em casa devido a outras situações, por exemplo, ser cuidador de alguém doente ou incapacitado.</p>
      </div>
      <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="200">
        <div class="icon"><i class="fas fa-wheelchair"></i></div>
        <h4 class="title"><a href="">Fisioterapia</a></h4>
        <p class="description" style="text-align: justify;">A Fisioterapia ao Domicílio é destinada a qualquer pessoa que assim o deseje, que por necessidade ou por maior conforto e comodidade, como nos casos de pessoas com dependência funcional (lombalgia, hérnia discal, lesões ortopédicas e traumatológicas, distúrbios cardiorrespiratórios em adultos e crianças, doenças reumáticas e neurológicas) ou doenças degenerativas (Parkinson, Alzheimer).</p>
      </div>
      <div class="col-lg-4 col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="300">
        <div class="icon"><i class="fas fa-notes-medical"></i></div>
        <h4 class="title"><a href="">Exames médicos</a></h4>
        <p class="description" style="text-align: justify;">Os exames em domicílio facilitam a vida e a rotina de pessoas que precisam fazer a coleta de exames, mas não têm condições de irem a um laboratório. Uma equipe de enfermagem preparada, uniformizada e com os materiais necessários se dirige à residência do cliente para fazer a coleta das amostras para o exame. Essa é uma solução prática e acessível.</p>
      </div>
    </div>

  </div>
</section><!-- End Services Section -->

<!-- ======= Cta Section ======= -->
<section id="news" class="news">
  <div class="container" data-aos="zoom-in">

    <div class="text-center">
      <h3>Notícias</h3>
      <!--<a class="cta-btn scrollto" href="#appointment">Faça um tour</a>-->
    </div>


    <div class="container">
        <div class="row row-cols-1 row-cols-md-4 g-4 mt-3">
            @foreach ($news as $index=>$item)
            @if ($index == 0)
            @php
                $news_id = $item['id'];
            @endphp

            @endif

            @if ($index > 7)
                @php
                    break;
                @endphp
            @endif
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card h-70" style="border-radius: 30px;">
                    <img src="{{env('API_URL')}}/files/{{$item['imageNetwork']}}" class="card-img-top" alt="..." style="border-radius: 30px;height:260px;">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{$item['title']}}</h5>
                        <p class="card-text text-center">{{substr($item['description'], 0, 180)}}...<a href="{{ route('show_news', $item['id']).'#show' }}" style="cursor: pointer;color:#3fbbc0" >ver mais</a></p>
                    </div>
                </div>
            </div>

            @endforeach

        </div>
        <div class="d-flex justify-content-center mt-3">
            <a class="btn text-white" href="{{isset($news_id)? route('show_news', $news_id).'#news' : '' }}" style="background-color: #3fbbc0;">
                <span class="{{--visually-hidden--}}">Ver mais</span>
            </a>
        </div>

     </div>
</section><!-- End Cta Section -->

<!-- ======= Appointment Section ======= -->
<section id="appointment" class="appointment section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Marcações de Consultas f</h2>
      <p style="text-align: justify;">A sua saúde merece cuidado e conveniência, com Baika + Saúde, você pode marcar suas consultas médicas de forma simples e rápida, diretamente pelo nosso site!

      </p style text-align> 🖥️ Marcação Online
        Acesse nosso site em qualquer lugar e a qualquer hora para escolher o melhor horário para sua consulta.</p>

      </p style text-align> ⏰ Disponibilidade em Tempo Real
        Veja a disponibilidade de médicos e especialistas em tempo real e escolha a data e horário que melhor se adequa à sua agenda.</p>

      </p>📧 Lembretes de Consulta
        Receba lembretes automáticos por e-mail ou SMS para garantir que você nunca perca uma consulta.</p>
    </div>

    <div class="make_appointment_division">
      <a href="/appointment">
        Fazer marcacao, agora!
      </a>
    </div>
  </div>
</section><!-- End Appointment Section -->


<!-- ======= Doctors Section ======= -->
<section id="doctors" class="doctors section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Especialistas</h2>
      <p>Conheça os especistas da nossa plataforma.</p>
    </div>

    <div class="row">

      <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
        <div class="member" data-aos="fade-up" data-aos-delay="100">
          <div class="member-img">
            <img src="{{asset('')}}client/assets/img/doctors/doctors-1.png" class="img-fluid" alt="">
            <div class="social">
              <a href=""><i class="bi bi-twitter"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
          <div class="member-info">
            <h4>Teresita Farres</h4>
            <span>Chefe de sessão de terapia /Defectóloga</span>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
        <div class="member" data-aos="fade-up" data-aos-delay="200">
          <div class="member-img">
            <img src="{{asset('')}}client/assets/img/doctors/doctors-2.png" class="img-fluid" alt="">
            <div class="social">
              <a href=""><i class="bi bi-twitter"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
          <div class="member-info">
            <h4>Josiana Alves</h4>
            <span>Directora clínica / Médica geral</span>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
        <div class="member" data-aos="fade-up" data-aos-delay="300">
          <div class="member-img">
            <img src="{{asset('')}}client/assets/img/doctors/doctors-3.png" class="img-fluid" alt="">
            <div class="social">
              <a href=""><i class="bi bi-twitter"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
          <div class="member-info">
            <h4>Alberto Guia</h4>
            <span>Enfermeiro</span>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
        <div class="member" data-aos="fade-up" data-aos-delay="400">
          <div class="member-img">
            <img src="{{asset('')}}client/assets/img/doctors/doctors-4.png" class="img-fluid" alt="">
            <div class="social">
              <a href=""><i class="bi bi-twitter"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
          <div class="member-info">
            <h4>Chandne Constantino</h4>
            <span>Fisioterapeuta</span>
          </div>
        </div>
      </div>

    </div>

  </div>
</section><!-- End Doctors Section -->

<!-- ======= Pricing Section ======= -->
<section id="pricing" class="pricing">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Pacotes disponíves para usuários</h2>
      <p> Confira os pacotes disponíveis em nosso aplicativo, lembrando que com a versão free voce pode agendar consultas em todas unidades sanitárias disponíveis em nosso sistema</p>
    </div>

    <div class="row d-flex justify-content-center">

      <div class="col-lg-3 col-md-6">
        <div class="box" data-aos="fade-up" data-aos-delay="100">
          <h3>Free</h3>
          <h4><sup>$</sup>0<span> / Anual</span></h4>
          <ul>
            <li>Marcações de Consultas</li>
            <li>Prontuário Médico</li>
            <li>Telemedicina</li>
            <li class="na">Seguros de Saúde</li>
            <li>Farmácias online</li>
            <li class="na">Ambulâncias</li>
            <li class="na">Agregado Familiar</li>
          </ul>
          <div class="btn-wrap">
            <a href="#" class="btn-buy">Aderir</a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
        <div class="box featured" data-aos="fade-up" data-aos-delay="200">
          <h3>Standard</h3>
          <h4><sup>$</sup>3999<span> / Anual</span></h4>
          <ul>
            <li>Marcações de Consultas</li>
            <li>Prontuário Médico</li>
            <li>Telemedicina</li>
            <li class="na">Seguros de Saúde</li>
            <li>Farmácias online</li>
            <li>Ambulâncias</li>
            <li>Agregado Familiar</li>
          </ul>
          <div class="btn-wrap">
            <a href="#" class="btn-buy">Aderir</a>
          </div>
        </div>
      </div>

      {{--<div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
        <div class="box" data-aos="fade-up" data-aos-delay="300">
          <h3>Developer</h3>
          <h4><sup>$</sup>29<span> / month</span></h4>
          <ul>
            <li>Aida dere</li>
            <li>Nec feugiat nisl</li>
            <li>Nulla at volutpat dola</li>
            <li>Pharetra massa</li>
            <li>Massa ultricies mi</li>
          </ul>
          <div class="btn-wrap">
            <a href="#" class="btn-buy">Aderir</a>
          </div>
        </div>
      </div>--}}

      <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
        <div class="box" data-aos="fade-up" data-aos-delay="400">
          <span class="advanced">Advanced</span>
          <h3>Ultimate</h3>
          <h4><sup>$</sup>78.987<span> / Anual</span></h4>
          <ul>
            <li>Marcações de Consultas</li>
            <li>Prontuário Médico</li>
            <li>Telemedicina</li>
            <li>Seguros de Saúde</li>
            <li>Farmácias online</li>
            <li>Ambulâncias</li>
            <li>Agregado Familiar</li>
          </ul>
          <div class="btn-wrap">
            <a href="#" class="btn-buy">Buy Now</a>
          </div>
        </div>
      </div>

    </div>

  </div>
</section>

<div class="modal fade" id="modalTable" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Quadro de atendimento</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            {{--<div class="container mt-5">
                <div class="table-responsive"> <!-- Adiciona a classe table-responsive para tornar a tabela responsiva -->
                    <div class="table"> <!-- Adiciona a classe table para estilizar a "tabela" -->
                        <div class="row font-weight-bold"> <!-- Cabeçalho da "tabela" -->
                            <div class="col">Sengunda</div>
                            <div class="col">Terça</div>
                            <div class="col">Quarta</div>
                            <div class="col">Quinta</div>
                            <div class="col">Sexta</div>
                            <div class="col">Sábado</div>
                            <div class="col">Domingo</div>

                        </div>

                        <div class="w-100 my-1 py-1" style="background: #3fbbc0;"></div>
                        <!-- Linha 1 -->
                        <div class="row">
                            <div class="col">Atividade 1</div>
                            <div class="col">Atividade 2</div>
                            <div class="col">Atividade 3</div>
                            <div class="col">Atividade 4</div>
                            <div class="col">Atividade 5</div>
                            <div class="col">Atividade 6</div>
                            <div class="col">Atividade 7</div>
                        </div>
                        <hr class="bg-secondary">
                        <!-- Linha 2 -->
                        <div class="row">
                            <div class="col">Atividade 1</div>
                            <div class="col">Atividade 2</div>
                            <div class="col">Atividade 3</div>
                            <div class="col">Atividade 4</div>
                            <div class="col">Atividade 5</div>
                            <div class="col">Atividade 6</div>
                            <div class="col">Atividade 7</div>
                        </div>

                        <!-- Adicione mais linhas conforme necessário -->
                    </div>
                </div>
            </div>--}}

            <div class="container mt-5">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Segunda</th>
                                <th>Terça</th>
                                <th>Quarta</th>
                                <th>Quinta</th>
                                <th>Sexta</th>
                                <th>Sábado</th>
                                <th>Domingo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="no-hover-effect">Atividade 1</td>
                                <td>Atividade 2</td>
                                <td>Atividade 3</td>
                                <td>Atividade 4</td>
                                <td>Atividade 5</td>
                                <td>Atividade 6</td>
                                <td>Atividade 7</td>
                            </tr>
                            <!-- Adicione mais linhas conforme necessário -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal-footer d-flex justify-content-center" style="border: none">
        </div>
      </div>
    </div>
  </div><!-- End Vertically centered Modal-->
@endsection

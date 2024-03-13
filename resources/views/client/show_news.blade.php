
@extends('layouts.client')

@section('title', 'Baika + Saúde - Notícias')

@section('content')

<!-- ======= About Us Section ======= -->
<section id="show" class="about">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Notícia</h2>
    </div>
    <div class="row">
      <div class="col-lg-6" data-aos="fade-right">
        <img src="{{env('API_URL')}}/files/{{$show_news!=[]? $show_news['imageNetwork']:''}}" class="img-fluid" alt="">
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
        <h3>{{$show_news!=[]? $show_news['title']:''}}</h3>
        <p class="fst-italic">
            {{$show_news!=[]?$show_news['description']:''}}
        </p>
       </div>
    </div>

  </div>
</section><!-- End About Us Section -->

<!-- ======= Cta Section ======= -->
<section id="news" class="news">
  <div class="container" data-aos="zoom-in">

    <div class="text-center">
      <h3>Ver também</h3>
      <!--<a class="cta-btn scrollto" href="#appointment">Faça um tour</a>-->
    </div>


    <div class="container" class="news">
        <div class="row row-cols-1 row-cols-md-4 g-4 mt-3">
            @foreach ($news as $item)
            @if ($show_news!=[] && $item['id']!=$show_news['id'])

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card h-70" style="border-radius: 30px;">
                    <img src="{{env('API_URL')}}/files/{{$item['imageNetwork']}}" class="card-img-top" alt="..." style="border-radius: 30px;height:260px;">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{$item['title']}}</h5>
                        <p class="card-text text-center">{{substr($item['description'], 0, 180)}}...<a href="{{ route('show_news', $item['id']).'#show' }}" style="cursor: pointer;color:#3fbbc0" >ver mais</a></p>
                    </div>
                </div>
            </div>
            @endif
            @endforeach

        </div>
    </div>
</section><!-- End Cta Section -->

@endsection

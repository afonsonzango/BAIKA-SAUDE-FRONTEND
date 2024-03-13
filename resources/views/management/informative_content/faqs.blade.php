
@extends('layouts.management')

@section('title', 'Perguntas frequêntes')

@section('content')

  <div class="pagetitle">
    <!--<h1>Data Tables</h1>-->
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Conteúdo Informativo</li>
        <li class="breadcrumb-item active">Perguntas frequêntes</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div>
                <h5 class="card-title">Perguntas frequêntes</h5>
              </div>
              <div class="mt-3">
                <button class="btn text-white" 
                style="background-color: #5dc6ca; border-radius: 10px;margin-right:9px"
                data-bs-toggle="modal" data-bs-target="#verticalycentered"
                >
                  +Perguntas
                </button>
              </div>
            </div>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Perguntas</th>
                  <th scope="col">Respostas</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($faqs as $index=>$faq)
                <tr>
                  <th scope="row" style="width: 10px">{{++$index}}</th>
                  <td>{{$faq['question']}}</td>
                  <td>{{$faq['answer']}}</td>
                  {{--<td><a href="{{route('profile_users')}}"><i class="bi bi-eye-fill"></i></a></td>--}}
                </tr>
                @endforeach
                
                
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

  <div class="modal fade" id="verticalycentered" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Adicionar perguntas frequêntes</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form name="formAddFaq" id="formAddFaq" method="POST" >
            @csrf
            <div class="alert alert-danger alert-dismissible fade show text-center" id="alert" role="alert" style="display: none;">
              <p id="alert-text"></p>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="row">

              <div class="col-12 mb-2">
                <span>Pergunta</span>
                <input type="text" name="question" id="question" class="form-control">
              </div>
              <div class="col-12 mb-2">
                <span>Resposta</span>
                <input type="text" name="answer" id="answer" class="form-control">
              </div>
            </div>
            <div class="d-flex justify-content-center" >
              <button type="submit" class="btn text-white" id="btn-addFaq" style="background-color: #3fbbc0">Adicionar</button>
            </div>
          </form>
          
        </div>
      
      </div>
    </div>
  </div><!-- End Vertically centered Modal-->

    
@endsection
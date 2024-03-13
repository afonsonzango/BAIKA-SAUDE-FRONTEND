
@extends('layouts.management')

@section('title', 'Pacientes')

@section('content')

  <div class="pagetitle">
    <!--<h1>Data Tables</h1>-->
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Prontuário</li>
        <li class="breadcrumb-item active">Doenças Crônicas</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  @php
  $user = session()->get('userAuth');
  @endphp
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <div>
                <h5 class="card-title">Doenças Crônicas</h5>
              </div>
              @if ($user['role_id'] == 4)
              <div class="mt-3">
                <button class="btn text-white" 
                style="background-color: #5dc6ca; border-radius: 10px;margin-right:9px"
                data-bs-toggle="modal" data-bs-target="#verticalycentered"
                >
                  +Crônicas
                </button>
              </div>
              @endif
            </div>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nome</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($chronic_diseases["ChronicDiseases"] as $index => $chronic_disease)
                <tr>
                  <th scope="row" style="width: 15px">{{++$index}}</th>
                  <td>{{$chronic_disease["name"]}}</td>
                  @if ($user['role_id'] == 4)
                  <td style="width: 15px"><a href="#"><i class="bi bi-trash"></i></a></td>
                  @endif
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
          <h5 class="modal-title">Adicionar doenças crônicas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form name="formAddChronic" id="formAddChronic" method="POST" >
            @csrf
            <div class="alert alert-danger alert-dismissible fade show text-center" id="alert" role="alert" style="display: none;">
              <p id="alert-text"></p>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="row">
              <div class="col-12 mb-2">
                <span>Nome</span>
                <input type="text" name="name" id="name" class="form-control">
              </div>
            </div>
            <div class="d-flex justify-content-center" >
              <button type="submit" class="btn text-white" id="btn-addChronic" style="background-color: #3fbbc0">Adicionar</button>
            </div>
          </form>
          
        </div>
      
      </div>
    </div>
  </div><!-- End Vertically centered Modal-->

    
@endsection
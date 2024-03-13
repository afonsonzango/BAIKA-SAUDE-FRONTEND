
@extends('layouts.management')

@section('title', 'Especialidades Médicas')

@section('content')

  <div class="pagetitle">
    <!--<h1>Data Tables</h1>-->
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Prontuário</li>
        <li class="breadcrumb-item active">Especialidades Médicas</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title"></h5>
            <div class="d-flex justify-content-between">
              <div>
                <h5 class="card-title">Especialidades Médicas</h5>
              </div>
              <div class="mt-3">
                <button class="btn text-white" 
                style="background-color: #5dc6ca; border-radius: 10px;margin-right:9px"
                data-bs-toggle="modal" data-bs-target="#verticalycentered"
                >
                  +Especialidades Médicas
                </button>
              </div>
            </div>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nome</th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($especialtys["categorys"] as $index => $especialty)
                <tr>
                  <th scope="row" style="width: 15px">{{++$index}}</th>
                  <td>{{$especialty["name"]}}</td>
                  <td style="width: 15px"><a href="#"><i class="bi bi-eye-fill"></i></a></td>
                  <td style="width: 15px"><a href="#"><i class="bi bi-trash"></i></a></td>
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
    
@endsection
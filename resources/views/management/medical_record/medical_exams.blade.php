
@extends('layouts.management')

@section('title', 'Pacientes')

@section('content')

  <div class="pagetitle">
    <!--<h1>Data Tables</h1>-->
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Prontuário</li>
        <li class="breadcrumb-item active">Exames Médicos</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Exames Médicos</h5>

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
                <tr>
                  <th scope="row">1</th>
                  <td>Brandon Jacob</td>
                  <td><a href="{{route('profile_users')}}"><i class="bi bi-eye-fill"></i></a></td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Bridie Kessler</td>
                  <td><a href="{{route('profile_users')}}"><i class="bi bi-eye-fill"></i></a></td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Ashleigh Langosh</td>
                  <td><a href="{{route('profile_users')}}"><i class="bi bi-eye-fill"></i></a></td>
                </tr>
                <tr>
                  <th scope="row">4</th>
                  <td>Angus Grady</td>
                  <td><a href="{{route('profile_users')}}"><i class="bi bi-eye-fill"></i></a></td>
                </tr>
                <tr>
                  <th scope="row">5</th>
                  <td>Raheem Lehner</td>
                  <td><a href="{{route('profile_users')}}"><i class="bi bi-eye-fill"></i></a></td>
                </tr>
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>
    
@endsection
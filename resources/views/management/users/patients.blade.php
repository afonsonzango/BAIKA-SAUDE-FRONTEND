
@extends('layouts.management')

@section('title', 'Pacientes')

@section('content')

  <div class="pagetitle">
    <!--<h1>Data Tables</h1>-->
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('management')}}">Home</a></li>
        <li class="breadcrumb-item">Utilizadores</li>
        <li class="breadcrumb-item active">Pacientes</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Pacientes</h5>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col"></th>
                  <th scope="col">Nome</th>
                  <th scope="col">Telefone</th>
                  <th scope="col">Email</th>
                  <th scope="col">Endereço</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($patients as $index => $patient)
                <tr>
                  <th scope="row" style="width: 10px">{{++$index}}</th>
                  <td><img src="{{env('API_URL')}}/files/{{$patient['img']}}" alt="" width="50px" height="50px" style="border-radius: 100%"></td>
                  <td>{{$patient["name"]}}</td>
                  <td>{{$patient["phoneNumber"]}}</td>
                  <td>{{$patient["email"]}}</td>
                  <td>{{$patient["name_street"]}}, {{$patient["name_municipality"]}}, {{$patient["name_province"]}}</td>
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
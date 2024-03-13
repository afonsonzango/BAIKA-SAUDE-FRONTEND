
@extends('layouts.management')

@section('title', 'Consultas médicas')

@section('content')


  <div class="pagetitle">
    <!--<h1>Data Tables</h1>-->
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Utilizadores</li>
        <li class="breadcrumb-item active">Consultas</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Consultas Médicas</h5>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Paciente</th>
                  <th scope="col">Data agendada</th>
                  {{--<th scope="col">Descrição</th>--}}
                  <th scope="col">Estado</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($consultations as $index => $consultation)
                @php
                    $date = $consultation['data'];
                    $data_consultations = $consultation['consultations'];
                @endphp

                    @foreach ($data_consultations as $index2 => $data_consultation)
                    <tr>
                    <th scope="row">{{--$index+$index2--}}</th>
                    <td>{{$data_consultation['name_patiente']}}</td>
                    <td>{{$date}}</td>
                    <td class="pt-2 pb-2">
                        @if ($data_consultation['status']=='pending')
                        <a class="bg-primary text-white p-2" style="border-radius: 20px" >
                            Aguardando
                        </a>
                        @else
                        <a class="bg-danger text-white p-2" style="border-radius: 20px" >
                            Expirado
                        </a>
                        @endif

                    </td>
                    {{--<td>{{$data_consultation['problemDescription']}}</td>--}}
                    <td><a href="{{--route('consultation', $index)--}}" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#verticalycentered"><i class="bi bi-eye-fill"></i></a></td>
                    </tr>
                    @endforeach
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
          <h5 class="modal-title">Consulta marcada</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <span><a style="font-weight: bold">Nome</a> <i>Rogério João</i></span>
          </div>
          <div class="row">
            <span><a style="font-weight: bold">Email</a> <i>tuzolana@gmail.com</i></span>
          </div>
          <div class="row">
            <span><a style="font-weight: bold">Solicita</a> <i>Dermatologista</i></span>
          </div>
          <div class="row">
            <span><a style="font-weight: bold">Especialista</a> <i>Dr. Josiana</i></span>
          </div>
          <div class="row mt-2">
            <span style="font-weight: bold">Descrição</span>
            <p>
              <i>
                Non omnis incidunt qui sed occaecati magni asperiores est mollitia. Soluta at et reprehenderit. Placeat autem numquam et fuga numquam. Tempora in facere consequatur sit dolor ipsum. Consequatur nemo amet incidunt est facilis. Dolorem neque recusandae quo sit molestias sint dignissimos.
              </i>
            </p>
          </div>
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <button type="button" class="btn text-white" style="background-color: #3fbbc0">Iniciar a consulta</button>
        </div>
      </div>
    </div>
  </div><!-- End Vertically centered Modal-->
@endsection

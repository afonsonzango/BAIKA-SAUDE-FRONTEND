
@extends('layouts.management')

@section('title', 'Prescrições')

@section('content')

  <div class="pagetitle">
    <!--<h1>Data Tables</h1>-->
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Prontuário</li>
        <li class="breadcrumb-item active">Prescrição</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Prescrições</h5>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Profissional</th>
                  <th scope="col">Numero Profissional</th>
                  <th scope="col">Paciente</th>
                  <th scope="col">Unidade Sanitária</th>
                  <th scope="col">Medicamentos</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($prescriptions as $index=>$prescription)
                <tr>
                  <th scope="row" style="width: 10px">{{++$index}}</th>
                  <td>{{$prescription['name_professional']}}</td>
                  <td>{{$prescription['numberProf']}}</td>
                  <td>{{$prescription['name_patient']}}</td>
                  <td>{{$prescription['name_organic']}}</td>
                  <td>
                    @foreach ($prescription['medicines'] as $index2=>$medicine)
                    <div>
                      <div>
                        {{$medicine['names']}}
                      </div>
                      <div>
                        {{$medicine['posologys']}}
                      </div>
                      <div>
                        Formato - {{$medicine['formats']}}
                      </div>
                      <div>
                        Quantidade - {{$medicine['quantitys']}}
                      </div>
                      <div>
                        Dosagem - {{$medicine['dosages']}}
                      </div>
                      
                      
                    </div>
                      
                    
                    
                    @endforeach
                  </td>
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
          <h5 class="modal-title">Adicionar alergia</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form name="formAddAllergy" id="formAddAllergy" method="POST" >
            @csrf
            <div class="alert alert-danger alert-dismissible fade show text-center" id="alert" role="alert" style="display: none;">
              <p id="alert-text"></p>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="row">

              <div class="col-12 mb-2">
                <span>Tipo de alergia</span>
                <input type="text" name="name" id="name" class="form-control">
              </div>
    
            </div>
            <div class="d-flex justify-content-center" >
              <button type="submit" class="btn text-white" id="btn-addAllergy" style="background-color: #3fbbc0">Adicionar</button>
            </div>
          </form>
          
        </div>
      
      </div>
    </div>
  </div><!-- End Vertically centered Modal-->

    
@endsection
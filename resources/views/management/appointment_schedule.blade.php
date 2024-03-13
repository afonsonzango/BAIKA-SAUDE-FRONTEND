
@extends('layouts.management')

@section('title', 'Consultas médicas')

@section('content')


  <div class="pagetitle">
    <!--<h1>Data Tables</h1>-->
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Utilizadores</li>
        <li class="breadcrumb-item active">Agenda de consulta</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="pt-2">
              @if (session('fail'))
              <div class="alert alert-danger alert-dismissible fade show text-center">
                  <span class="small">{{session('fail')}}</span>

                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @else
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show text-center">
                    <span class="small">{{session('success')}}</span>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
              @endif
            </div>
            <form name="formAddAgends" id="formAddAgends" method="POST" action="{{route('register_appointment_schedule')}}">
              @csrf
              <div class="row mb-3"> 
                <div class="col-12 col-md-6 col-lg-6">
                  <div class="mt-2">
                    Segunda-Feira <input type="checkbox" name="days_week[]" class="form-check-input" value="segunda-feira">
                    Terça-Feira <input type="checkbox" name="days_week[]" class="form-check-input" value="terça-feira">
                    Quarta-Feira <input type="checkbox" name="days_week[]" class="form-check-input" value="quarta-feira">
                    Quinta-Feira <input type="checkbox" name="days_week[]" class="form-check-input" value="quinta-feira">
                    Sexta-Feira <input type="checkbox" name="days_week[]" class="form-check-input" value="sexta-feira">
                    Sábado <input type="checkbox" name="days_week[]" class="form-check-input" value="sábado">
                    Domingo <input type="checkbox" name="days_week[]" class="form-check-input" value="domingo">
                  </div>
                  
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                  <label for="Country" class="col-form-label">especialidade</label>
                  <select name="category_id" id="category_id" class="form-control">
                      <option value="">Selecione especialidade</option>
                      @foreach ($list_specialties as $specialtie)
                        <option value="{{$specialtie['id']}}" >{{$specialtie['name']}}</option>
                      @endforeach
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-12 col-md-6 col-lg-6"></div>
                <div class="col-12 col-md-6 col-lg-6">
                  <label for="Phone" class="col-form-label">Hora</label>
                  <input name="time" type="time" class="form-control" id="time" value="">
                </div>
              </div>
            

              <div class="text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </form>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Agenda de consultas</h5>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Semanas</th>
                  <th scope="col">Horário</th>
                  <th scope="col">Especialidade</th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($list_appointment_schedules as $index => $appointment_schedule)

                  <tr>
                    <th scope="row">{{$index+1}}</th>
                    <td>{{$appointment_schedule['dias_semanas']}}</td>
                    <td>{{$appointment_schedule['name_category']}}</td>
                    <td>{{$appointment_schedule['hour']}}</td>
                    <td style="width: 15px"><a href="#" data-bs-toggle="modal" data-bs-target="#verticalycentered"><i class="bi bi-pencil-square"></i></a></td>
                    <td style="width: 15px"><a onclick="deleteDataAppointmentSchedule({{ $appointment_schedule['category_id'] }})" style="cursor: pointer;"><i class="bi bi-trash text-primary"></i></a></td>
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

  <div class="modal fade" id="modalDrop" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Eliminar Agenda</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

        </div>
        <div class="modal-footer d-flex justify-content-center" style="border: none">
            <form name="formDeleteAppointmentSchedule" id="formDeleteAppointmentSchedule" method="POST" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="alert alert-danger alert-dismissible fade show text-center" id="alert" role="alert" style="display: none;">
                  <p id="alert-text"></p>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <input type="text" id="schedule_id" hidden />
                <button type="submit" class="btn text-white" style="background-color: #f06728" id="btn-deleteAppointmentSchedule">Sim</button>
                <button type="button" class="btn text-white" style="background-color: #3fbbc0">Não</button>
            </form>
        </div>
      </div>
    </div>
  </div><!-- End Vertically centered Modal-->

  <script>
    function deleteDataAppointmentSchedule(id){
        //alert(id)
        $("#schedule_id").val(id);
        var modal = document.getElementById('modalDrop')
        let modalBox = new bootstrap.Modal(modal);
        modalBox.show();
    }
  </script>
@endsection


@extends('layouts.management')

@section('title', 'Áreas Médicas')

@section('content')


<div class="pagetitle">
    <!--<h1>Data Tables</h1>-->
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Utilizadores</li>
        <li class="breadcrumb-item">Áreas Médicas</li>
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
                <h5 class="card-title">Áreas Médicas</h5>
              </div>
              
              <div class="mt-3">
                <button class="btn text-white"
                style="background-color: #5dc6ca; border-radius: 10px;margin-right:9px"
                data-bs-toggle="modal" data-bs-target="#verticalycentered"
                >
                  +Área Médica
                </button>
              </div>
            </div>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  {{--<th scope="col"></th>--}}
                  <th scope="col">#</th>
                  <th scope="col">Nome</th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($medical_areas as $index => $area)
                <tr>
                  {{--<td scope="" style="width: 15px"><input type="checkbox"></td>--}}
                  <th scope="row" style="width: 10px;">{{++$index}}</th>
                  <td>{{$area['name']}}</td>
                  
                  <td><a onclick="showDataMedicalArea({{ json_encode($area) }})" style="cursor: pointer;"><i class="bi bi-pencil-square" style="color:#5dc6ca;" {{--data-bs-toggle="modal" data-bs-target="#modalDrop"--}}></i></a></td>
                  <td><a onclick="deleteDataMedicalArea({{ $area['id'] }})" style="cursor: pointer;"><i class="bi bi-trash" style="color:#5dc6ca;" {{--data-bs-toggle="modal" data-bs-target="#modalDrop"--}}></i></a></td>
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
          <h5 class="modal-title">Registar área médica</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form name="formAddMedicalArea" id="formAddMedicalArea" method="POST">
            @csrf
            @method('PUT')
            <div class="alert alert-danger alert-dismissible fade show text-center" id="alert" role="alert" style="display: none;">
              <p id="alert-text"></p>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="row">

              <div class="col-12 mb-2">
                <span>Nome</span>
                <input type="text" name="name" id="name" class="form-control">
              </div>

              <input type="text" id="area_id" name="area_id" hidden>

            </div>

            <div class="d-flex justify-content-center" id="addMedicalArea" >
              <button type="submit" class="btn text-white" id="btn-addMedicalArea" style="background-color: #3fbbc0">Cadastrar</button>
            </div>
            <div class="d-flex justify-content-center d-none" id="updateMedicalArea">
                <button type="submit" class="btn text-white" id="btn-updateMedicalArea" style="background-color: #3fbbc0">Editar</button>
            </div>
          </form>

        </div>

      </div>
    </div>
  </div><!-- End Vertically centered Modal-->

  <div class="modal fade" id="modalDrop" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Eliminar área médica</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

        </div>
        <div class="modal-footer d-flex justify-content-center" style="border: none">
            <form name="formDeleteMedicalArea" id="formDeleteMedicalArea" method="POST" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="alert alert-danger alert-dismissible fade show text-center" id="alert" role="alert" style="display: none;">
                  <p id="alert-text"></p>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <input type="text" id="medical_area_id" hidden />
                <button type="submit" class="btn text-white" style="background-color: #f06728" id="btn-deleteMedicalArea">Sim</button>
                <button type="button" class="btn text-white" style="background-color: #3fbbc0">Não</button>
            </form>
        </div>
      </div>
    </div>
  </div><!-- End Vertically centered Modal-->

  
  <script>
    function deleteDataMedicalArea(id){
        //alert(id)
        $("#medical_area_id").val(id);
        var modal = document.getElementById('modalDrop')
        let modalBox = new bootstrap.Modal(modal);
        modalBox.show();
    }

    

    function showDataMedicalArea(data) {
        /*var buttonId = document.getElementById("btn-addNews");
        buttonId.removeAttribute("id");
        buttonId.setAttribute("id", "btn-updateNews");*/
        $('#addMedicalArea').addClass('d-none');
        $('#updateMedicalArea').removeClass('d-none');

        $("#area_id").val(data.id);
        $("#name").val(data.name);

        console.log(data);

        var modal = document.getElementById('verticalycentered')
        let modalBox = new bootstrap.Modal(modal);
        modalBox.show();
    }
  </script>
@endsection

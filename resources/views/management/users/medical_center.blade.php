
@extends('layouts.management')

@section('title', 'Centro Médico')

@section('content')


<div class="pagetitle">
    <!--<h1>Data Tables</h1>-->
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Utilizadores</li>
        <li class="breadcrumb-item">Unidades sanitário</li>
        <li class="breadcrumb-item active">Centro Médico</li>
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
                <h5 class="card-title">Centro Médico</h5>
              </div>
              <div class="mt-3">
                <button class="btn text-white" 
                style="background-color: #5dc6ca; border-radius: 10px;margin-right:9px"
                data-bs-toggle="modal" data-bs-target="#verticalycentered"
                >
                  +Centro
                </button>
              </div>
            </div>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  {{--<th scope="col"></th>--}}
                  <th scope="col">#</th>
                  <th scope="col"></th>
                  <th scope="col">Nome</th>
                  <th scope="col">Telefone</th>
                  <th scope="col">Endereço</th>
                  <th scope="col">Descrição</th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($medical_center as $index => $center)
                <tr>
                  {{--<td scope="" style="width: 15px"><input type="checkbox"></td>--}}
                  <th scope="row" style="width: 10px">{{++$index}}</th>
                  <td><img src="{{$center["img"]}}" width="100px" alt=""></td>
                  <td>{{$center["name_unity_organic"]}}</td>
                  <td>{{$center["name_unity_organic"]}}</td>
                  <td>{{$center["province"]}}, {{$center["municipality"]}}, {{$center["street"]}}</td>
                  <td>{{$center["description"]}}</td>
                  <td><a href="{{route('profile_users')}}" style="color:#5dc6ca;" ><i class="bi bi-eye-fill"></i></a></td>
                  <td><a style="cursor: pointer;"><i class="bi bi-trash" style="color:#5dc6ca;" data-bs-toggle="modal" data-bs-target="#modalDrop"></i></a></td>
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
          <h5 class="modal-title">Registar centro médico</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form name="formAddHealthUnit" id="formAddHealthUnit" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="alert alert-danger alert-dismissible fade show text-center" id="alert" role="alert" style="display: none;">
              <p id="alert-text"></p>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="row">

              {{--<div class="col-12 mb-2">
                <span>Nome</span>
                <input type="text" name="name" id="name" class="form-control">
              </div>
              <div class="col-12 mb-2">
                <span>Telefone</span>
                <input type="text" name="phoneNumber" id="phoneNumber" class="form-control">
              </div>
              <div class="col-12 mb-2">
                <span>Email</span>
                <input type="text" name="email" id="email" class="form-control">
              </div>
              <div class="col-12 mb-2">
                <span>Imagem</span>
                <input type="file" name="img" id="img" class="form-control">
              </div>
              <div class="col-12 mb-2">
                <span>Endereço</span>
                <select name="street_id" id="street_id" class="form-control">
                  <option value="">Selecione um endereço</option> 
                  @foreach ($streets as $street)
                    <option value="{{$street['id']}}">{{$street['name_locality']}}</option> 
                  @endforeach
                </select>
              </div>
              <div class="col-12 mb-2">
                <span>Categoria</span>
                <select name="sub_organic_unity_id" id="sub_organic_unity_id" class="form-control">
                  <option value="">Selecione uma categoria</option> 
                  @foreach ($health_units_categorys as $categorys)
                    <option value="{{$categorys['id']}}">{{$categorys['name']}}</option> 
                  @endforeach
                  
                </select>
              </div>
              <div class="col-12 mb-2">
                <span>Latitude</span>
                <input type="text" name="longuitude" id="longuitude" class="form-control">
              </div>
              <div class="col-12 mb-2">
                <span>Longitude</span>
                <input type="text" name="latitude" id="latitude" class="form-control">
              </div>
              <div class="col-12 mb-2">
                <span>Descrição</span>
                <input type="text" name="description" id="description" class="form-control">
              </div>
            </div>--}}
            <div class="d-flex justify-content-center" >
              <button type="submit" class="btn text-white" id="btn-addHealthUnit" style="background-color: #3fbbc0">Cadastrar</button>
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
          <h5 class="modal-title">Eliminar utilizador</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
        </div>
        <div class="modal-footer d-flex justify-content-center" style="border: none">
          <button type="button" class="btn text-white" style="background-color: #f06728">Sim</button>
          <button type="button" class="btn text-white" style="background-color: #3fbbc0">Não</button>
        </div>
      </div>
    </div>
  </div><!-- End Vertically centered Modal-->
  
@endsection
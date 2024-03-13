
@extends('layouts.management')

@section('title', 'Hospitais')

@section('content')


<div class="pagetitle">
    <!--<h1>Data Tables</h1>-->
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Utilizadores</li>
        <li class="breadcrumb-item">Unidades sanitário</li>
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
                <h5 class="card-title">Unidades Sanitária</h5>
              </div>
              <div class="mt-3">
                <button class="btn text-white"
                style="background-color: #5dc6ca; border-radius: 10px;margin-right:9px"
                data-bs-toggle="modal" data-bs-target="#verticalycentered"
                >
                  +Unidade
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
                  <th scope="col">Categoria</th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($health_units as $index => $health_unit)
                <tr>
                  {{--<td scope="" style="width: 15px"><input type="checkbox"></td>--}}
                  <th scope="row" style="width: 10px;">{{++$index}}</th>
                  <td style="width: 90px;"><img src="{{env('API_URL')}}/files/{{$health_unit['img']}}" style="border-radius: 50%;" width="80px" height="80px" alt=""></td>
                  <td>{{$health_unit['name']}}</td>
                  @foreach ($health_units_categorys as $category)
                    @if ($category['id'] == $health_unit["category_id"])
                     <td>{{$category["name"]}}</td>
                    @endif
                  @endforeach

                  {{--@if (6 == $health_unit["country_id"])
                  <td><a href="{{route('health_unit_profile', ['id' => $health_unit['id'], 'data' => ['province'=>'valor1', 'county'=>'valor2', 'street'=>'valor2']])}}" style="color:#5dc6ca;" ><i class="bi bi-eye-fill"></i></a></td>
                  @endif--}}
                  <td><a href="{{route('health_unit_profile', Illuminate\Support\Facades\Crypt::encryptString($health_unit['id']))}}" style="color:#5dc6ca;" ><i class="bi bi-eye-fill"></i></a></td>
                  {{--<td><a onclick="showDataHealth({{ json_encode($health_unit) }})" style="color:#5dc6ca;" ><i class="bi bi-pencil-square"></i></a></td>--}}
                  <td><a onclick="deleteDataHealth({{ $health_unit['id'] }})" style="cursor: pointer;"><i class="bi bi-trash" style="color:#5dc6ca;" {{--data-bs-toggle="modal" data-bs-target="#modalDrop"--}}></i></a></td>
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
          <h5 class="modal-title">Registar Unidade Sanitária</h5>
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

              <div class="col-12 mb-2">
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
                <span>País</span>
                <select name="health_unit_country_id" id="health_unit_country_id" class="form-control">
                  <option value="">Selecione um país</option>
                  @foreach ($list_country as $country)
                    <option value="{{$country['id']}}">{{$country['name']}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-12 mb-2" id="d-health_unit_province_id">
                <span>Província</span>
                <select name="health_unit_province_id" id="health_unit_province_id" class="form-control">
                </select>
              </div>
              <div class="col-12 mb-2" id="d-health_unit_province">
                <span>Província</span>
                <input name="health_unit_province" id="health_unit_province" class="form-control" />
              </div>
              <div class="col-12 mb-2" id="d-health_unit_county_id">
                <span>Município</span>
                <select name="health_unit_county_id" id="health_unit_county_id" class="form-control">

                </select>
              </div>
              <div class="col-12 mb-2" id="d-health_unit_county">
                <span>Município</span>
                <input name="health_unit_county" id="health_unit_county" class="form-control" />
              </div>
              <div class="col-12 mb-2">
                <span>Bairro</span>
                <input type="text" name="name_street" id="name_street" class="form-control">
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
            </div>
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
            <form name="formDeleteHealthUnit" id="formDeleteHealthUnit" method="POST" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <input type="text" id="health_unity_id" hidden />
                <button type="submit" class="btn text-white" style="background-color: #f06728" id="btn-deleteHealthUnit">Sim</button>
                <button type="button" class="btn text-white" style="background-color: #3fbbc0">Não</button>
            </form>
        </div>
      </div>
    </div>
  </div><!-- End Vertically centered Modal-->

  <div class="modal fade" id="verticalycentered2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Atualizar Unidade Sanitária</h5>
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

              <div class="col-12 mb-2">
                <span>Nome</span>
                <input type="text" name="update_name" id="update_name" class="form-control">
              </div>
              <div class="col-12 mb-2">
                <span>Telefone</span>
                <input type="text" name="update_phoneNumber" id="update_phoneNumber" class="form-control">
              </div>
              <div class="col-12 mb-2">
                <span>Email</span>
                <input type="text" name="update_email" id="update_email" class="form-control">
              </div>
              <div class="col-12 mb-2">
                <span>Imagem</span>
                <input type="file" name="update_img" id="update_img" class="form-control">
              </div>
              <div class="col-12 mb-2">
                <span>País</span>
                <select name="update_health_unit_country_id" id="update_health_unit_country_id" class="form-control">
                  <option value="">Selecione um país</option>
                  @foreach ($list_country as $country)
                    <option value="{{$country['id']}}">{{$country['name']}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-12 mb-2" id="d-health_unit_province_id">
                <span>Província</span>
                <select name="update_health_unit_province_id" id="update_health_unit_province_id" class="form-control">
                </select>
              </div>
              <div class="col-12 mb-2" id="d-health_unit_province">
                <span>Província</span>
                <input name="update_health_unit_province" id="update_health_unit_province" class="form-control" />
              </div>
              <div class="col-12 mb-2" id="d-health_unit_county_id">
                <span>Município</span>
                <select name="update_health_unit_county_id" id="update_health_unit_county_id" class="form-control">

                </select>
              </div>
              <div class="col-12 mb-2" id="d-health_unit_county">
                <span>Município</span>
                <input name="update_health_unit_county" id="update_health_unit_county" class="form-control" />
              </div>
              <div class="col-12 mb-2">
                <span>Bairro</span>
                <input type="text" name="update_name_street" id="update_name_street" class="form-control">
              </div>
              <div class="col-12 mb-2">
                <span>Categoria</span>
                <select name="update_sub_organic_unity_id" id="update_sub_organic_unity_id" class="form-control">
                  <option value="">Selecione uma categoria</option>
                  @foreach ($health_units_categorys as $categorys)
                    <option value="{{$categorys['id']}}">{{$categorys['name']}}</option>
                  @endforeach

                </select>
              </div>
              <div class="col-12 mb-2">
                <span>Latitude</span>
                <input type="text" name="update_longuitude" id="update_longuitude" class="form-control">
              </div>
              <div class="col-12 mb-2">
                <span>Longitude</span>
                <input type="text" name="update_latitude" id="update_latitude" class="form-control">
              </div>
              <div class="col-12 mb-2">
                <span>Descrição</span>
                <input type="text" name="update_description" id="update_description" class="form-control">
              </div>
            </div>
            <div class="d-flex justify-content-center" >
              <button type="submit" class="btn text-white" id="btn-addHealthUnit" style="background-color: #3fbbc0">Cadastrar</button>
            </div>
          </form>

        </div>

      </div>
    </div>
  </div><!-- End Vertically centered Modal-->


  <script>
    function deleteDataHealth(id){
        //alert(id)
        $("#health_unity_id").val(id);
        var modal = document.getElementById('modalDrop')
        let modalBox = new bootstrap.Modal(modal);
        modalBox.show();
    }

    function showDataHealth(data) {
      $("#update_name").val(data.name);
      $("#update_phoneNumber").val(data.phoneNumber);
      $("#update_email").val(data.email);
      //$("#update_img").val(data.name);
      /*$("#update_health_unit_country_id").val(data.name);
      $("#update_health_unit_province_id").val(data.name);
      $("#update_health_unit_county_id").val(data.name);*/
      $("#update_name_street").val(data.name);
      $("#update_longuitude").val(data.longuitude);
      $("#update_latitude").val(data.latitude);
      $("#update_description").val(data.description);

      console.log(data);

      var modal = document.getElementById('verticalycentered2')
      let modalBox = new bootstrap.Modal(modal);
      modalBox.show();
    }

    function modalEditHealthUnit(id,name,description,price,currency,days){
      //$("#btn-addPlan").html('Editar');
      $("#plan_id").val(id);
      $("#name").val(name);
      $("#description").val(description);
      $("#price").val(price);
      $("#currency").val(currency);
      $("#days").val(days);
      var modal = document.getElementById('exampleModalP')
      let modalBox = new bootstrap.Modal(modal);
      modalBox.show();
    }
  </script>
@endsection

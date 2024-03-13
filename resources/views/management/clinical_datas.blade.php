
@extends('layouts.management')

@section('title', 'Dados Clínicos')

@section('content')
  <div class="pagetitle">
    <!--<h1>Data Tables</h1>-->
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('management')}}">Home</a></li>
        <li class="breadcrumb-item active">Dados Clinicos</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
    <div class="col-lg-12">
        <!-- News & Updates Traffic -->
        <div class="card">
            {{--<div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>--}}

            <div class="card-body pb-0">
                <div class="d-flex justify-content-between">
                    <div class="col-5">
                      <h5 class="card-title">Dados Clínicos</h5>
                    </div>
                    <div class="col-7 mt-3">
                      {{--<input type="text" class="form-control" placeholder="Pesquisar..." style="border-radius: 18px;">--}}
                      <form action="{{route('clinical_datas')}}" method="GET" class="input-group mb-3">
                        
                          <input type="text" class="form-control" name="patient_key" placeholder="Procurar paciente..." aria-label="Procurar paciente" aria-describedby="basic-addon2">
                          <div class="input-group-append">
                            <button class="btn btn-outline-secondary" style="border-top-right-radius: 20px;" type="submit"><i class="bi bi-search"></i></button>
                          </div>
                       
                        </form>
                    </div>
                </div>

              @if (isset($patient['id']))
              
              <div class="news">
                
                <div class="post-item clearfix mb-3">
                  <div class="d-flex">
                    <div>
                        <img src="{{env('API_URL')}}/files/{{isset($patient['img'])?$patient['img']:''}}" width="200px" height="200px" alt="">
                    </div>
                    <div class="" style="margin-left: 10px">
                      <h4><a href="#">{{isset($patient['name'])?$patient['name']:''}}</a></h4>
                      <p>{{isset($patient['email'])?$patient['email']:''}}</p>
                      <p>{{isset($patient['phoneNumber'])?$patient['phoneNumber']:''}}</p>
                      <p>{{isset($patient['name_street'])?$patient['name_street']:''}},
                        {{isset($patient['name_municipality'])?$patient['name_municipality']:''}},
                        {{isset($patient['name_province'])?$patient['name_province']:''}}</p>

                      @if (isset($permition_key))
                        <p>Alergia - {{isset($clinical_data['name_allergys'])?$clinical_data['name_allergys']:''}}</p>
                        <p>Doenças Crônicas - {{isset($clinical_data['name_chronics'])?$clinical_data['name_chronics']:''}}</p>
                        <p>Cirurgias - {{isset($clinical_data['name_surgs'])?$clinical_data['name_surgs']:''}}</p>
                        <p>Tipo Sanguíneo - {{isset($clinical_data['type'])?$clinical_data['type']:''}}</p>
                        <p>Altura - {{isset($clinical_data['height'])?$clinical_data['height']:''}}</p>
                        <p>IMC - {{isset($clinical_data['imc'])?$clinical_data['imc']:''}}</p>
                        <p>Peso - {{isset($clinical_data['weight'])?$clinical_data['weight']:''}}</p>
                        <p>Glicinia - {{isset($clinical_data['glycemia'])?$clinical_data['glycemia']:''}}</p>
                      @endif

                      <div class="d-flex">
                        <div>
                          <a class="btn btn-primary" onclick="showDataPatient({{ json_encode($patient) }})">Dados clínicos <i class="bi bi-clipboard-plus" style="color:#ffffff;"></i></a>
                        </div>
                        @if (isset($clinical_data['id']) && empty($permition_key))
                        <div style="margin-left: 10px">
                          <a class="btn btn-primary" onclick="showSolicitation({{ json_encode($patient) }})">Dados clínicos <i class="bi bi-eye-fill" style="color:#ffffff;"></i></a>
                        </div>  
                        @endif
                        
                      </div>
                    </div>

                  </div>

                </div>
                

              </div><!-- End sidebar recent posts-->
              @endif

            </div>
        </div><!-- End News & Updates -->
    </div>

  </section>

  <div class="modal fade" id="verticalycentered" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Dados Clínicos</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form name="formAddClinicalDatas" id="formAddClinicalDatas" method="POST">
            @csrf
            
            <div class="alert alert-danger alert-dismissible fade show text-center" id="alert" role="alert" style="display: none;">
              <p id="alert-text"></p>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="row">

              <div class="col-12 mb-2">
                <span>Grupo Sanguíneo</span>
                <select name="bload_group_id" id="bload_group_id"  class="form-control">
                  @foreach ($blood_groups as $blood_group)
                  <option value="{{$blood_group['id']}}">{{$blood_group['type']}}</option>
                  @endforeach
                  
                </select>
              </div>
              <div class="col-12 mb-2">
                <span>Alergías</span>
                <select name="allergys" id="allergys"  class="form-control">
                  @foreach ($allergies as $allergie)
                  <option value="{{$allergie['id']}}">{{$allergie['name']}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-12 mb-2">
                <span>Alergías</span>
                <select name="allergys2" id="allergys2" class="form-control">
                  @foreach ($allergies as $allergie)
                  <option value="{{$allergie['id']}}">{{$allergie['name']}}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-12 mb-2">
                <span>Cirurgias</span>
                <select name="surgerys" id="surgerys" class="form-control">
                  @foreach ($surgerys as $surgery)
                  <option value="{{$surgery['id']}}">{{$surgery['name']}}</option>
                  @endforeach
                </select>
              </div>
              {{--<div class="col-12 mb-2">
                <span>Cirurgias 2</span>
                <select name="surgerys2" id="surgerys2" class="form-control">
                  @foreach ($blood_groups as $blood_group)
                  <option value="{{$blood_group['id']}}">{{$blood_group['name']}}</option>
                  @endforeach
                </select>
              </div>--}}
              <div class="col-12 mb-2">
                <span>Doenças Crônicas</span>
                <select name="chronicdiseases" id="chronicdiseases" class="form-control">
                  @foreach ($chronic_diseases as $chronic_disease)
                  <option value="{{$chronic_disease['id']}}">{{$chronic_disease['name']}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-12 mb-2">
                <span>Doenças Crônicas 2</span>
                <select name="chronicdiseases2" id="chronicdiseases2" class="form-control">
                  @foreach ($chronic_diseases as $chronic_disease)
                  <option value="{{$chronic_disease['id']}}">{{$chronic_disease['name']}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <input type="text" id="user_id" value="{{isset($patient['user_id'])?$patient['user_id']:''}}" hidden />

            <div class="d-flex justify-content-center" id="addClinicalDatas" >
              <button type="submit" class="btn text-white" id="btn-addClinicalDatas" style="background-color: #3fbbc0">Cadastrar</button>
            </div>
            {{--<div class="d-flex justify-content-center d-none" id="updateClinicalDatas">
                <button type="submit" class="btn text-white" id="btn-updateClinicalDatas" style="background-color: #3fbbc0">Editar</button>
            </div>--}}
          </form>

        </div>

      </div>
    </div>
  </div><!-- End Vertically centered Modal-->


  <div class="modal fade" id="verticalycentered2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Solicitar vizualização dos dados clínicos</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form name="formAddSolicitation" id="formAddSolicitation" action="{{route('clinical_datas')}}" method="GET">
            @csrf
            
            <div class="alert alert-danger alert-dismissible fade show text-center" id="alert" role="alert" style="display: none;">
              <p id="alert-text"></p>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="row">
              <div class="col-12 mb-2">
                <span>Chave</span>
                <input type="text" name="permition_key" id="permition_key" class="form-control" />
              </div>
              <input type="text" name="patient_key" id="patient_key" class="form-control" value="{{$patient_key}}" hidden />
            </div>
            
            <div class="d-flex justify-content-center" id="addClinicalDatas" >
              <button type="submit" class="btn text-white" id="btn-addClinicalDatas" style="background-color: #3fbbc0">Solicitar</button>
            </div>
            {{--<div class="d-flex justify-content-center d-none" id="updateClinicalDatas">
                <button type="submit" class="btn text-white" id="btn-updateClinicalDatas" style="background-color: #3fbbc0">Editar</button>
            </div>--}}
          </form>

        </div>

      </div>
    </div>
  </div><!-- End Vertically centered Modal-->

  <div class="modal fade" id="modalDrop" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Eliminar notícia</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="alert alert-danger alert-dismissible fade show text-center" id="alert2" role="alert" style="display: none;">
                <p id="alert2-text"></p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        <div class="modal-footer d-flex justify-content-center" style="border: none">
            <form name="formDeleteNews" id="formDeleteNews" method="POST" enctype="multipart/form-data">
                @csrf
                @method('DELETE')

                <input type="text" id="news_id2"  hidden/>
                <button type="submit" class="btn text-white" style="background-color: #f06728" id="btn-deleteNews">Sim</button>
                <button type="button" class="btn text-white" style="background-color: #3fbbc0">Não</button>
            </form>
        </div>
      </div>
    </div>
  </div><!-- End Vertically centered Modal-->

  <script>

    function showSolicitation(data) {
      var modal = document.getElementById('verticalycentered2')
      let modalBox = new bootstrap.Modal(modal);
      modalBox.show();
    }
    function showDataPatient(data) {
        /*var buttonId = document.getElementById("btn-addNews");
        buttonId.removeAttribute("id");
        buttonId.setAttribute("id", "btn-updateNews");*/
        /*$('#addNews').addClass('d-none');
        $('#updateNews').removeClass('d-none');

        $("#patient_id").val(data.id);
        $("#title").val(data.title);
        $("#description").val(data.description);

        console.log(data);*/

        var modal = document.getElementById('verticalycentered')
        let modalBox = new bootstrap.Modal(modal);
        modalBox.show();
    }

    /*$('#verticalycentered').on('hidden.bs.modal', function () {
        window.location.reload();
    });*/
</script>
@endsection

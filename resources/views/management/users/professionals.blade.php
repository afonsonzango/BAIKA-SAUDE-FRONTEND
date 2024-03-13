
@extends('layouts.management')

@section('title', 'Profissionais')

@section('content')


<div class="pagetitle">
    <!--<h1>Data Tables</h1>-->
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Utilizadores</li>
        <li class="breadcrumb-item active">Profissionais</li>
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
                <h5 class="card-title">Profissionais</h5>
              </div>
              <div class="mt-3">
                <button class="btn text-white"
                style="background-color: #5dc6ca; border-radius: 10px;margin-right:9px"
                {{--data-bs-toggle="modal" data-bs-target="#verticalycentered"--}}
                data-bs-toggle="modal" data-bs-target="#fullscreenModal"
                >
                  +Profissional
                </button>
              </div>
            </div>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col"></th>
                  <th scope="col">Nome</th>
                  <th scope="col">Telefone</th>
                  <th scope="col">Endereço</th>
                  <th scope="col">Unidade Sanitária</th>
                  <th scope="col">Especialidade</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($professionals as $index=>$professional)
                <tr>
                  <th scope="row" style="width: 10px">{{++$index}}</th>
                  <td><img src="{{env('API_URL')}}/files/{{isset($professional['img'])?$professional['img']:''}}" alt="" width="50px" height="50px" style="border-radius: 100%"></td>
                  <td>{{$professional['name_professional']}}</td>
                  <td>{{$professional['phoneNumber']}}</td>
                  <td>{{$professional['name_province']}}, {{$professional['name_municipality']}}, {{$professional['name_street']}},</td>
                  <td>{{$professional['name_organic_unity']}}</td>
                  <td>{{$professional['name_category']}}</td>
                  <td><a href="{{route('professional_profile', Illuminate\Support\Facades\Crypt::encryptString($professional['id']))}}"><i class="bi bi-eye-fill"></i></a></td>
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

  <!-- Full Screen Modal -->
  {{--"name":"Alcides Afonso",
  "phoneNumber":"923303898",
  "email":"daniela@gmail.com",
  "password":"felis2023",
  "img":"https://img.freepik.com/fotos-gratis/medico-sorridente-com-estretoscopio-isolado-em-cinza_651396-974.jpg",
	"street_id":1,
	"clinical_state_id":1,
	 "organic_unity_id":2,
   "educationalInstitution":"level",
   "description":"teste",
   "gender":"Masculino",
   "type_professional":"Externo",
   "professionalLicenseNumber":"1500",
   "academicLevel":"12",
	"languages":[1,2],
	"experiences":1,
	"categorys":[1,2],
		"longuitude":23.9,
	"latitude":22.8,
	"identification":"122",
	"type_professional":"interno",
	"academiclevel_id":1--}}
  <div class="modal fade" id="fullscreenModal" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Registar Profissional</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <form name="formAddProfessional" id="formAddProfessional" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="alert alert-danger alert-dismissible fade show text-center" id="alert" role="alert" style="display: none;">
              <p id="alert-text"></p>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="row">
              <div class="col-lg-4 col-md-6 col-12 mb-2">
                <span>Nome</span>
                <input type="text" name="name" id="name" class="form-control">
              </div>
              <div class="col-lg-4 col-md-6 col-12 mb-2">
                <span>Género</span>
                <select name="gender" id="gender" class="form-control">
                  <option value="">Selecione o género</option>
                  <option value="femenino">Feminino</option>
                  <option value="masculino">Masculino</option>
                </select>
              </div>
              <div class="col-lg-4 col-md-6 col-12 mb-2">
                <span>Data de nascimento</span>
                <input type="date" name="date" id="date" class="form-control">
              </div>

              <div class="col-lg-4 col-md-6 col-12 mb-2">
                <span>Telefone</span>
                <input type="text" name="phoneNumber" id="phoneNumber" class="form-control">
              </div>

              <div class="col-lg-4 col-md-6 col-12 mb-2">
                <span>BI</span>
                <input type="text" name="identification" id="identification" class="form-control">
              </div>

              <div class="col-lg-4 col-md-6 col-12 mb-2">
                <span>Email</span>
                <input type="text" name="email" id="email" class="form-control">
              </div>
              <div class="col-lg-4 col-md-6 col-12 mb-2">
                <span>Foto</span>
                <input type="file" name="img" id="img" class="form-control">
              </div>
              <div class="col-lg-4 col-md-6 col-12 mb-2">
                <span>País</span>
                <select name="health_unit_country_id" id="health_unit_country_id" class="form-control">
                  <option value="">Selecione um país</option>
                  @foreach ($list_country as $country)
                    <option value="{{$country['id']}}">{{$country['name']}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-lg-4 col-md-6 col-12 mb-2" id="d-health_unit_province_id">
                <span>Província</span>
                <select name="health_unit_province_id" id="health_unit_province_id" class="form-control">
                </select>
              </div>
              <div class="col-12 mb-2" id="d-health_unit_province">
                <span>Província</span>
                <input name="health_unit_province" id="health_unit_province" class="form-control" />
              </div>
              <div class="col-lg-4 col-md-6 col-12 mb-2" id="d-health_unit_county_id">
                <span>Município</span>
                <select name="health_unit_county_id" id="health_unit_county_id" class="form-control">
                </select>
              </div>
              <div class="col-12 mb-2" id="d-health_unit_county">
                <span>Município</span>
                <input name="health_unit_county" id="health_unit_county" class="form-control" />
              </div>
              <div class="col-lg-4 col-md-6 col-12 mb-2">
                <span>Bairro</span>
                <input type="text" name="name_street" id="name_street" class="form-control">
              </div>
              {{--<div class="col-lg-4 col-md-6 col-12 mb-2">
                <span>Estado Clínico</span>
                <select name="clinical_state_id" id="clinical_state_id" class="form-control">
                  <option value="">Selecione estado clínico</option>
                  @foreach ($clinical_states as $clinical_state)
                    <option value="{{$clinical_state['id']}}">{{$clinical_state['name']}}</option>
                  @endforeach
                </select>
              </div>--}}
              @if (isset($userAuth) && $userAuth['role_id']!=3)
              <div class="col-lg-4 col-md-6 col-12 mb-2">
                <span>Unidade Sanitária</span>

                <select name="organic_unity_id" id="organic_unity_id" class="form-control">
                  <option value="">Selecione unidade sanitária</option>
                  @foreach ($health_units as $health_unit)
                    <option value="{{$health_unit['id']}}">{{$health_unit['name']}}</option>
                  @endforeach

                </select>
              </div> 
              @endif

              
              <div class="col-lg-4 col-md-6 col-12 mb-2">
                <span>Área Médica</span>

                <select name="medical_area_id" id="medical_area_id" class="form-control">
                  <option value="">Selecione área médica</option>
                  @foreach ($medical_areas["areas"] as $area)
                    <option value="{{$area['id']}}">{{$area['name']}}</option>
                  @endforeach

                </select>
              </div>

              <div class="col-lg-4 col-md-6 col-12 mb-2" id="specialties">
                <span>Especialidade</span>
                <div class="row">
                  <div class="col-lg-6 col-12">
                    <select name="categorys" id="categorys" class="form-control">
                      {{--<option value="">Selecione especialidade 1</option>
                      @foreach ($especialtys as $especialty)
                        <option value="{{$especialty['id']}}">{{$especialty['name']}}</option>
                      @endforeach--}}
                    </select>
                  </div>
                  <div class="col-lg-6 col-12">
                    <select name="categorys2" id="categorys2" class="form-control">
                      {{--<option value="">Selecione especialidade 2</option>
                      @foreach ($especialtys as $especialty)
                        <option value="{{$especialty['id']}}">{{$especialty['name']}}</option>
                      @endforeach--}}

                    </select>
                  </div>
                </div>

              </div>
              

              <div class="col-lg-4 col-md-6 col-12 mb-2">
                <span>Instituição Educacional</span>

                <input type="text" name="educationalInstitution" id="educationalInstitution" class="form-control" />
              </div>

              <div class="col-lg-4 col-md-6 col-12 mb-2">
                <span>Tipo de profissional</span>

                <select name="type_professional" id="type_professional" class="form-control">
                  <option value="">Selecione tipo de profissional</option>
                    <option value="interno">Interno</option>
                    <option value="externo">Externo</option>
                </select>
              </div>
              <div class="col-lg-4 col-md-6 col-12 mb-2">
                <span>Número da licença profissional</span>
                <input type="text" name="professionalLicenseNumber" id="professionalLicenseNumber" class="form-control">
              </div>
              <div class="col-lg-4 col-md-6 col-12 mb-2">
                <span>Nível acadêmico</span>
                <select name="academiclevel_id" id="academiclevel_id" class="form-control">
                  <option value="">Selecione nível acadêmico</option>
                  @foreach ($academic_levels as $academic_level)
                  <option value="{{$academic_level['id']}}">{{$academic_level['name']}}</option>
                  @endforeach

                </select>
              </div>

              <div class="col-lg-4 col-md-6 col-12 mb-2">
                <span>Idioma</span>
                <div class="row">
                  <div class="col-lg-6 col-12">
                    <select name="languages" id="languages" class="form-control">
                      <option value="">Selecione idioma 1</option>
                      @foreach ($languages as $language)
                        <option value="{{$language['id']}}">{{$language['name']}}</option>
                      @endforeach

                    </select>
                  </div>
                  <div class="col-lg-6 col-12">
                    <select name="languages2" id="languages2" class="form-control">
                      <option value="">Selecione idioma 2</option>
                      @foreach ($languages as $language)
                        <option value="{{$language['id']}}">{{$language['name']}}</option>
                      @endforeach

                    </select>
                  </div>
                </div>

              </div>

              <div class="col-lg-4 col-md-6 col-12 mb-2 d-none">
                <span>Experiência Profissional</span>
                <input type="text" name="experiences" id="experiences" class="form-control" value="1">
              </div>

              <div class="col-lg-4 col-md-6 col-12 mb-2">
                <span>Descrição</span>
                <input type="text" name="description" id="description" class="form-control">
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn" style="background-color: #3fbbc0;" id="btn-addProfessional" >Cadastrar</button>
              </div>
              </form>
            </div>
        </div>

      </div>
    </div>
  </div><!-- End Full Screen Modal-->


@endsection

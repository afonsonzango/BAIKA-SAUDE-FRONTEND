
@extends('layouts.management')

@section('title', 'Meu Perfil')

@section('content')


    <div class="pagetitle">
      <!--<h1>Profile</h1>-->
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Utilizadores</li>
          <li class="breadcrumb-item active">Perfil</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="{{env('API_URL')}}/files/{{isset($user['img'])?$user['img']:''}}" width="100px" height="100px" class="rounded-circle">
              <form name="formChangeImage" id="formChangeImage">
                @csrf
                <div class="pt-2 text-center">
                  <label for="fileInput" class="circular-input">
                    <input type="file" id="fileInput" class="hidden" onchange="displayFileName()">
                    <i class="bi bi-upload"></i>
                  </label>
                </div>
                <div id="fileNameDisplay" class="mt-2"></div>
                <div class="text-center mt-2 d-none" id="image_save" >
                  <button type="submit" class="btn btn-primary" id="btn-changeImage">Guardar</button>
                </div>
                <div class="alert alert-danger alert-dismissible fade show text-center" id="alert2" role="alert" style="display: none;">
                  <p id="alert2-text"></p>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              </form>
              
              <h2>{{isset($user['name'])?$user['name']:''}}</h2>
              <h3>{{isset($user['name_category'])?$user['name_category']:''}}</h3>
              
              
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Vizualização</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar Perfil</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Configurações</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Mudar Senha</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Sobre</h5>
                  <p class="small fst-italic">{{isset($user['description'])?$user['description']:''}}</p>

                  <h5 class="card-title">Detalhes do  Perfil</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nome Completo</div>
                    <div class="col-lg-9 col-md-8">{{isset($user['name'])?$user['name']:''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Empresa</div>
                    <div class="col-lg-9 col-md-8">{{isset($user['nome_unidade'])?$user['nome_unidade']:''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Especialidade</div>
                    <div class="col-lg-9 col-md-8">{{isset($user['name_category'])?$user['name_category']:''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">País</div>
                    <div class="col-lg-9 col-md-8">{{isset($user['country'])?$user['country']:''}}</div>
                  </div>

                  @if($user['role_id'] == 2)
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Instituto Educacional</div>
                    <div class="col-lg-9 col-md-8">{{isset($user['educationalInstitution'])?$user['educationalInstitution']:''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Nível Acadêmica</div>
                    <div class="col-lg-9 col-md-8">{{isset($user['nivel_academic'])?$user['nivel_academic']:''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Especialidade</div>
                    <div class="col-lg-9 col-md-8">{{isset($user['name_category'])?$user['name_category']:''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Tipo de Profissional</div>
                    <div class="col-lg-9 col-md-8">{{isset($user['type_professional'])?$user['type_professional']:''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Unidade Sanitária</div>
                    <div class="col-lg-9 col-md-8">{{isset($user['nome_unidade'])?$user['nome_unidade']:''}}</div>
                  </div>
                  @endif

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Endereço</div>
                    <div class="col-lg-9 col-md-8">
                      {{isset($user['name_street'])?$user['name_street']:''}},
                      {{isset($user['name_municipality'])?$user['name_municipality']:''}}, 
                      {{isset($user['name_province'])?$user['name_province']:''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Contacto</div>
                    <div class="col-lg-9 col-md-8">+244 {{isset($user['phoneNumber'])?$user['phoneNumber']:''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{isset($user['email'])?$user['email']:''}}</div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nome Completo</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fullName" type="text" class="form-control" id="fullName" value="{{isset($user['name'])?$user['name']:''}}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">Sobre</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="about" class="form-control" id="about" style="height: 100px">
                          {{isset($user['description'])?$user['description']:''}}
                        </textarea>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Empresa</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="company" type="text" class="form-control" id="company" value="Lueilwitz, Wisoky and Leuschke">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Especialidade</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="job" type="text" class="form-control" id="Job" value="Web Designer">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">País</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="country" type="text" class="form-control" id="Country" value="USA">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Endereço</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="address" type="text" class="form-control" id="Address" value="{{isset($user['name_street'])?$user['name_street']:''}}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Contacto</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="Phone" value="{{isset($user['phoneNumber'])?$user['phoneNumber']:''}}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="{{isset($user['email'])?$user['email']:''}}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Perfil do Twitter</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="twitter" type="text" class="form-control" id="Twitter" value="https://twitter.com/#">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Perfil do Facebook</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="facebook" type="text" class="form-control" id="Facebook" value="https://facebook.com/#">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Perfil do Instagram</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="instagram" type="text" class="form-control" id="Instagram" value="https://instagram.com/#">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Perfil do Linkedin</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="linkedin" type="text" class="form-control" id="Linkedin" value="https://linkedin.com/#">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Guardar as alterações</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>
                
                <!-- Professional -->
                @if($user['role_id'] == 2)
                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                  <div class="pt-4 pb-2">
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
                  <!-- Profile Edit Form -->
                  <form name="formUpdateprofessional" id="formUpdateprofessional" method="POST" action="{{route('edit_professional', $user['id'])}}">
                      @csrf

                    <input type="text" name="id" value="{{--isset($health_unit['id'])?$health_unit['id']:''--}}" hidden>
                    <div class="row mb-3">
                      <div class="col-12 col-md-6 col-lg-6">
                        <label for="fullName" class="col-form-label">Nome Completo</label>
                        <input name="name" type="text" class="form-control" id="name" value="{{isset($user['name_professional'])?$user['name_professional']:''}}">
                      </div>
                      <div class="col-12 col-md-6 col-lg-6">
                        <label for="gender" class="col-form-label">Género</label>
                        <select name="gender" id="gender" class="form-control">
                          <option value="">Selecione o género</option>
                          <option value="femenino">Feminino</option>
                          <option value="masculino">Masculino</option>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <div class="col-12 col-md-6 col-lg-6">
                        <label for="identification" class="col-form-label">BI</label>
                        <input type="text" name="identification" id="identification" class="form-control" value="{{isset($user['identification'])?$user['identification']:''}}">
                      </div>
                      <div class="col-12 col-md-6 col-lg-6">
                        <label for="date" class="col-form-label">Data de nascimento</label>
                        @php
                            $date = Carbon\Carbon::parse($user['date'])->format('Y-m-d');
                        @endphp
                        <input type="date" name="date" id="date" class="form-control" value="{{isset($user['date'])?$date:''}}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <div class="col-12 col-md-6 col-lg-6">
                        <label for="phonenumber" class="col-form-label">Telefone</label>
                        <input type="text" name="phoneNumber" id="phoneNumber" class="form-control" value="{{isset($user['phoneNumber'])?$user['phoneNumber']:''}}">
                      </div>
                      
                      <div class="col-12 col-md-6 col-lg-6">
                        <label for="Email" class="col-form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="Email" value="{{isset($user['email'])?$user['email']:''}}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <div class="col-12 col-md-6 col-lg-6">
                        <label for="Country" class="col-form-label">País</label>
                        <select name="health_unit_country_id" id="health_unit_country_id" class="form-control">
                          <option value="">Selecione um país</option>
                          @foreach ($list_country as $country)
                            <option value="{{$country['id']}}"  @if($country['id']==$user['country_id']) selected @endif>{{$country['name']}}</option>
                          @endforeach
                        </select>
                      </div>

                      <div class="col-12 col-md-6 col-lg-6" id="d-health_unit_province_id">
                        <label for="Country" class="col-form-label">Província</label>
                        <select name="health_unit_province_id" id="health_unit_province_id" class="form-control">
                          @if ($user['country_id']==6)
                              @foreach ($list_provinces as $province)
                              <option value="{{$province['id']}}" @if ($province['id'] == $user['province_id']) selected @endif>{{$province['name']}}</option>
                              @endforeach
                          @endif
                        </select>
                      </div>
                      
                      <div class="col-12 col-md-6 col-lg-6" id="d-health_unit_province">
                        <label for="Country" class="col-form-label">Província</label>
                        @foreach ($list_provinces as $province)
                        @if ($province['id'] == $user['province_id'])
                        <input name="health_unit_province" id="health_unit_province" class="form-control" value="{{$province['name']}}" />
                        @endif
                        @endforeach
                      </div>
                    </div>


                    <div class="row mb-3" >
                      
                      <div class="col-12 col-md-6 col-lg-6" id="d-health_unit_county_id">
                        <label for="province" class="col-form-label">Município</label>
                        <select name="health_unit_county_id" id="health_unit_county_id" class="form-control">
                        @if ($user['country_id']==6)
                          @foreach ($list_county as $county)
                          <option value="{{$county['id']}}" @if ($county['id'] == $user['municipality_id']) selected @endif>{{$county['name']}}</option>
                          @endforeach
                        @endif
                        </select>
                      </div>

                      <div class="col-12 col-md-6 col-lg-6" id="d-health_unit_county">
                        <label for="province" class="col-form-label">Município</label>
                        @foreach ($list_county as $county)
                          @if ($county['id'] == $user['municipality_id'])
                            <input name="health_unit_county" id="health_unit_county" class="form-control"s value="{{$county['name']}}" />
                          @endif
                        @endforeach
                      </div>

                      <div class="col-12 col-md-6 col-lg-6">
                        <label for="Address" class="col-form-label">Bairro</label>
                        <input name="name_street" type="text" class="form-control" id="name_street" value="{{isset($user['name_street'])?$user['name_street']:''}}">
                      </div>

                    </div>

                    <div class="row mb-3">
                      @if (isset($userAuth) && $userAuth['role_id']!=3)    
                      <div class="col-12 col-md-6 col-lg-6">
                        <label for="organic_unity_id" class="col-form-label">Unidade Sanitária</label>
                        <select name="organic_unity_id" id="organic_unity_id" class="form-control">
                          <option value="">Selecione unidade sanitária</option>
                          @foreach ($health_units as $health_unit)
                            <option value="{{$health_unit['id']}}" @if ($user['organic_id'] == $health_unit['id']) selected @endif>{{$health_unit['name']}}</option>
                          @endforeach
                        </select>
                      </div>
                      @endif

                      {{--<div class="col-12 col-md-6 col-lg-6">
                        <label for="medical_area_id" class="col-form-label">Área Médica</label>
                        <select name="medical_area_id" id="medical_area_id" class="form-control">
                          <option value="">Selecione área médica</option>
                          @foreach ($medical_areas["areas"] as $area)
                            <option value="{{$area['id']}}">{{$area['name']}}</option>
                          @endforeach
        
                        </select>
                      </div>--}}
                      <div class="col-12 col-md-6 col-lg-6">
                        <label for="educationalInstitution" class="col-form-label">Instituição Educacional</label>
                        <input type="text" name="educationalInstitution" id="educationalInstitution" class="form-control" value="{{isset($user['educationalInstitution'])?$user['educationalInstitution']:''}}" />
                      </div>
                    </div>

                    <div class="row mb-3">
                      
                      <div class="col-12 col-md-6 col-lg-6">
                        <label for="educationalInstitution" class="col-form-label">Tipo de profissional</label>
                        <select name="type_professional" id="type_professional" class="form-control">
                          <option value="">Selecione tipo de profissional</option>
                            <option value="interno" @if(isset($user['type_professional']) && $user['type_professional'] == 'Interno') selected @endif>Interno</option>
                            <option value="externo" @if(isset($user['type_professional']) && $user['type_professional'] == 'Externo') selected @endif>Externo</option>
                        </select>
                      </div>

                      <div class="col-12 col-md-6 col-lg-6">
                        <label for="about" class="col-form-label">Número da licença profissional</label>
                        <input type="text" name="professionalLicenseNumber" id="professionalLicenseNumber" class="form-control" value="{{isset($user['professionalLicenseNumber'])?$user['professionalLicenseNumber']:''}}">
                      </div>
                    </div>

                    <div class="row mb-3">

                      <div class="col-12 col-md-6 col-lg-6">
                        <label for="about" class="col-form-label">Nível acadêmico</label>
                        <select name="academiclevel_id" id="academiclevel_id" class="form-control">
                          <option value="">Selecione nível acadêmico</option>
                          @foreach ($academic_levels as $academic_level)
                          <option value="{{$academic_level['id']}}" @if (isset($user['academic_id']) && $user['academic_id'] == $academic_level['id']) selected @endif>{{$academic_level['name']}}</option>
                          @endforeach
        
                        </select>
                      </div>
                      <div class="col-12 col-md-6 col-lg-6"></div>
                    </div>

                    <div class="row mb-3 d-none">
                      <label for="experiences" class="col-md-4 col-lg-3 col-form-label">Experiência Profissional</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" name="experiences" id="experiences" class="form-control" value="1">
                      </div>
                    </div>
      
                    <div class="row mb-3">
                      <label for="description" class="col-form-label">Descrição</label>
                      <div class="col-12">
                        <textarea name="description" class="form-control" id="description" style="height: 100px">
                          {{isset($user['description'])?$user['description']:''}}
                        </textarea>
                      </div>
                    </div>


                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Guardar as alterações</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>
                @endif

                <!-- Health Unit -->
                @if($user['role_id'] == 3)
                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                  <div class="pt-4 pb-2">
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
                  <!-- Profile Edit Form -->
                  <form name="formUpdateHealthUnit" id="formUpdateHealthUnit" method="POST" action="{{route('edit_health_unit')}}">
                      @csrf
                    <div class="row mb-3"> 
                      <div class="col-12 col-md-6 col-lg-6">
                        <label for="fullName" class="col-form-label">Nome Completo</label>
                        <input name="name" type="text" class="form-control" id="name" value="{{isset($user['name'])?$user['name']:''}}">
                      </div>
                      <div class="col-12 col-md-6 col-lg-6">
                        <label for="Country" class="col-form-label">Categoria</label>
                        <select name="sub_organic_unity_id" id="sub_organic_unity_id" class="form-control">
                            <option value="">Selecione uma categoria</option>
                            @foreach ($health_units_categorys as $categorys)
                              <option value="{{$categorys['id']}}" @if($categorys['id']==$user['category_id']) selected @endif>{{$categorys['name']}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <div class="col-12 col-md-6 col-lg-6">
                        <label for="Phone" class="col-form-label">Contacto</label>
                        <input name="phoneNumber" type="text" class="form-control" id="phoneNumber" value="{{isset($user['phoneNumber'])?$user['phoneNumber']:''}}">
                      </div>
                      <div class="col-12 col-md-6 col-lg-6">
                        <label for="Email" class="col-form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="Email" value="{{isset($user['email'])?$user['email']:''}}">
                      </div>
                    </div>

                    <input type="text" name="id" value="{{isset($user['id'])?$user['id']:''}}" hidden>

                    <div class="row mb-3">
                      
                      <div class="col-12 col-md-6 col-lg-6">
                        <label for="Country" class="col-form-label">País</label>
                        <select name="health_unit_country_id" id="health_unit_country_id" class="form-control">
                          <option value="">Selecione um país</option>
                          @foreach ($list_country as $country)
                            <option value="{{$country['id']}}" @if($country['id']==$user['country_id']) selected @endif>{{$country['name']}}</option>
                          @endforeach
                        </select>
                      </div>

                      <div class="col-12 col-md-6 col-lg-6" id="d-health_unit_province_id">
                        <label for="Country" class="col-form-label">Província</label>
                        <select name="health_unit_province_id" id="health_unit_province_id" class="form-control">
                          @if ($user['country_id']==6)
                              @foreach ($list_provinces as $province)
                              <option value="{{$province['id']}}" @if ($province['id'] == $user['province_id']) selected @endif>{{$province['name']}}</option>
                              @endforeach
                          @endif
                        </select>
                      </div>

                      <div class="col-12 col-md-6 col-lg-6" id="d-health_unit_province">
                        <label for="Country" class="col-form-label">Província</label>
                        @foreach ($list_provinces as $province)
                        @if ($province['id'] == $health_unit['province_id'])
                        <input name="health_unit_province" id="health_unit_province" class="form-control" value="{{$province['name']}}" />
                        @endif
                        @endforeach
                      </div>
                    </div>

                    <div class="row mb-3" >
                      
                      <div class="col-12 col-md-6 col-lg-6" id="d-health_unit_county_id">
                        <label for="province" class="col-form-label">Município</label>
                        <select name="health_unit_county_id" id="health_unit_county_id" class="form-control">
                        @if ($user['country_id']==6)
                            @foreach ($list_county as $county)
                            <option value="{{$county['id']}}" @if ($county['id'] == $user['municipality_id']) selected @endif>{{$county['name']}}</option>
                            @endforeach
                        @endif
                        </select>
                      </div>

                      <div class="col-12 col-md-6 col-lg-6" id="d-health_unit_county">
                        <label for="province" class="col-form-label">Município</label>
                        @foreach ($list_county as $county)
                        @if ($county['id'] == $user['municipality_id'])
                        <input name="health_unit_county" id="health_unit_county" class="form-control" value="{{$county['name']}}" />
                        @endif
                        @endforeach
                      </div>

                      <div class="col-12 col-md-6 col-lg-6">
                        <label for="Address" class="col-form-label">Bairro</label>
                        <input name="name_street" type="text" class="form-control" id="name_street" value="{{isset($user['name_street'])?$user['name_street']:''}}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      
                      <div class="col-12 col-md-6 col-lg-6">
                        <label for="Twitter" class="col-form-label">Latitude</label>
                        <input name="latitude" type="text" class="form-control" id="latitude" value="{{isset($user['latitude'])?$user['latitude']:''}}">
                      </div>

                      <div class="col-12 col-md-6 col-lg-6">
                        <label for="Facebook" class="col-form-label">Longitude</label>
                        <input name="longuitude" type="text" class="form-control" id="longuitude" value="{{isset($user['longuitude'])?$user['longuitude']:''}}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <div class="col-md-8 col-lg-9">
                        <label for="about" class="col-form-label">Sobre</label>
                        <textarea name="description" class="form-control" id="description" style="height: 100px">
                          {{isset($user['description'])?$user['description']:''}}
                        </textarea>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Guardar as alterações</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>
                @endif

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Guardar as alterações</button>
                    </div>
                  </form><!-- End settings Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form name="formUpdatePassword" id="formUpdatePassword" method="POST">
                    @csrf
                    <div class="alert alert-danger alert-dismissible fade show text-center" id="alert" role="alert" style="display: none;">
                      <p id="alert-text"></p>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Senha Atual</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="old_password" type="password" class="form-control" id="old_password">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nova Senha</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="new_password" type="password" class="form-control" id="new_password">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Confirmar nova senha</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renew_password" type="password" class="form-control" id="renew_password">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" id="btn-updatePassword">Alterar a senha</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

 

@endsection

@extends('layouts.management')

@section('title', 'Perfil - Unidade Sanitária')

@section('content')


    <div class="pagetitle">
      <!--<h1>Profile</h1>-->
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Utilizadores</li>
          <li class="breadcrumb-item">Unidade Sanitária</li>
          <li class="breadcrumb-item active">Perfil</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="{{env('API_URL')}}/files/{{isset($health_unit['img'])?$health_unit['img']:''}}" width="100px" height="100px" class="rounded-circle">

              <h2>{{isset($health_unit['name'])?$health_unit['name']:''}}</h2>
                <label for="fileInput" class="circular-input">
                    <input type="file" id="fileInput" class="hidden">
                    Escolher arquivo
                </label>
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
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar Dados</button>
                </li>

                {{--<li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Mudar Senha</button>

                </li>--}}

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Sobre</h5>
                  <p class="small fst-italic">{{isset($health_unit['description'])?$health_unit['description']:''}}</p>

                  <h5 class="card-title">Detalhes do  Perfil</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nome</div>
                    <div class="col-lg-9 col-md-8">{{isset($health_unit['name'])?$health_unit['name']:''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Categoria</div>
                    <div class="col-lg-9 col-md-8">{{isset($health_unit['category'])?$health_unit['category']:''}}</div>
                  </div>



                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Nacionalidade</div>
                    <div class="col-lg-9 col-md-8">{{isset($health_unit['name_nationality'])?$health_unit['name_nationality']:''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Endereço</div>
                    <div class="col-lg-9 col-md-8">
                      {{isset($health_unit['name_street'])?$health_unit['name_street']:''}},
                      {{isset($health_unit['name_municipality'])?$health_unit['name_municipality']:''}},
                      {{isset($health_unit['name_province'])?$health_unit['name_province']:''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Contacto</div>
                    <div class="col-lg-9 col-md-8">+244 {{isset($health_unit['phoneNumber'])?$health_unit['phoneNumber']:''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{isset($health_unit['email'])?$health_unit['email']:''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Latitude</div>
                    <div class="col-lg-9 col-md-8">{{isset($health_unit['latitude'])?$health_unit['latitude']:''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Longitude</div>
                    <div class="col-lg-9 col-md-8">{{isset($health_unit['longuitude'])?$health_unit['longuitude']:''}}</div>
                  </div>

                </div>

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
                          <input name="name" type="text" class="form-control" id="name" value="{{isset($health_unit['name'])?$health_unit['name']:''}}">
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                          <label for="Country" class="col-form-label">Categoria</label>
                          <select name="sub_organic_unity_id" id="sub_organic_unity_id" class="form-control">
                              <option value="">Selecione uma categoria</option>
                              @foreach ($health_units_categorys as $categorys)
                                <option value="{{$categorys['id']}}" @if($categorys['id']==$health_unit['category_id']) selected @endif>{{$categorys['name']}}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <div class="col-12 col-md-6 col-lg-6">
                          <label for="Phone" class="col-form-label">Contacto</label>
                          <input name="phoneNumber" type="text" class="form-control" id="phoneNumber" value="{{isset($health_unit['phoneNumber'])?$health_unit['phoneNumber']:''}}">
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                          <label for="Email" class="col-form-label">Email</label>
                          <input name="email" type="email" class="form-control" id="Email" value="{{isset($health_unit['email'])?$health_unit['email']:''}}">
                        </div>
                      </div>

                      <input type="text" name="id" value="{{isset($health_unit['id'])?$health_unit['id']:''}}" hidden>

                      <div class="row mb-3">
                        
                        <div class="col-12 col-md-6 col-lg-6">
                          <label for="Country" class="col-form-label">País</label>
                          <select name="health_unit_country_id" id="health_unit_country_id" class="form-control">
                            <option value="">Selecione um país</option>
                            @foreach ($list_country as $country)
                              <option value="{{$country['id']}}" @if($country['id']==$health_unit['country_id']) selected @endif>{{$country['name']}}</option>
                            @endforeach
                          </select>
                        </div>

                        <div class="col-12 col-md-6 col-lg-6" id="d-health_unit_province_id">
                          <label for="Country" class="col-form-label">Província</label>
                          <select name="health_unit_province_id" id="health_unit_province_id" class="form-control">
                            @if ($health_unit['country_id']==6)
                                @foreach ($list_provinces as $province)
                                <option value="{{$province['id']}}" @if ($province['id'] == $health_unit['province_id']) selected @endif>{{$province['name']}}</option>
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
                          @if ($health_unit['country_id']==6)
                              @foreach ($list_county as $county)
                              <option value="{{$county['id']}}" @if ($county['id'] == $health_unit['municipality_id']) selected @endif>{{$county['name']}}</option>
                              @endforeach
                          @endif
                          </select>
                        </div>

                        <div class="col-12 col-md-6 col-lg-6" id="d-health_unit_county">
                          <label for="province" class="col-form-label">Município</label>
                          @foreach ($list_county as $county)
                          @if ($county['id'] == $health_unit['municipality_id'])
                          <input name="health_unit_county" id="health_unit_county" class="form-control" value="{{$county['name']}}" />
                          @endif
                          @endforeach
                        </div>

                        <div class="col-12 col-md-6 col-lg-6">
                          <label for="Address" class="col-form-label">Bairro</label>
                          <input name="name_street" type="text" class="form-control" id="name_street" value="{{isset($health_unit['name_street'])?$health_unit['name_street']:''}}">
                        </div>
                      </div>

                      <div class="row mb-3">
                        
                        <div class="col-12 col-md-6 col-lg-6">
                          <label for="Twitter" class="col-form-label">Latitude</label>
                          <input name="latitude" type="text" class="form-control" id="latitude" value="{{isset($health_unit['latitude'])?$health_unit['latitude']:''}}">
                        </div>

                        <div class="col-12 col-md-6 col-lg-6">
                          <label for="Facebook" class="col-form-label">Longitude</label>
                          <input name="longuitude" type="text" class="form-control" id="longuitude" value="{{isset($health_unit['longuitude'])?$health_unit['longuitude']:''}}">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <div class="col-md-8 col-lg-9">
                          <label for="about" class="col-form-label">Sobre</label>
                          <textarea name="description" class="form-control" id="description" style="height: 100px">
                            {{isset($health_unit['description'])?$health_unit['description']:''}}
                          </textarea>
                        </div>
                      </div>

                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar as alterações</button>
                      </div>
                    </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                    <!-- Change Password Form -->
                    <form>
                      <div class="row mb-3">
                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Senha Atual</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="password" type="password" class="form-control" id="currentPassword">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nova Senha</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="newpassword" type="password" class="form-control" id="newPassword">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Confirmar nova senha</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                        </div>
                      </div>

                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Alterar a senha</button>
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

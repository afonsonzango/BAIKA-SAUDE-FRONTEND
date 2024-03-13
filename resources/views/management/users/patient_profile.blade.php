
@extends('layouts.management')

@section('title', 'Perfil do paciente')

@section('content')


    <div class="pagetitle">
      <!--<h1>Profile</h1>-->
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Utilizadores</li>
          <li class="breadcrumb-item">Paciente</li>
          <li class="breadcrumb-item active">Perfil</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="{{isset($user['profile_photo'])?$user['profile_photo']:''}}" width="100px" height="100px" class="rounded-circle">

              <h2>{{isset($user['name'])?$user['name']:''}}</h2>
              
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
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-clinical">Estado Clínico</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-medicalHistory">Histórico Médico</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-prescriptions">Prescrições</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-exams">Prescrições</button>
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
                    <div class="col-lg-3 col-md-4 label">Género</div>
                    <div class="col-lg-9 col-md-8">{{isset($user['gender'])?$user['gender']:''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Idade</div>
                    <div class="col-lg-9 col-md-8">{{isset($user['age'])?$user['age']:''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Estado Clínico</div>
                    <div class="col-lg-9 col-md-8">{{isset($user['clinical_state'])?$user['clinical_state']:''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Nacionalidade</div>
                    <div class="col-lg-9 col-md-8">{{isset($user['nationality'])?$user['nationality']:''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Endereço</div>
                    <div class="col-lg-9 col-md-8">
                      {{isset($user['street'])?$user['street']:''}},
                      {{isset($user['municipality'])?$user['municipality']:''}}, 
                      {{isset($user['province'])?$user['province']:''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Contacto</div>
                    <div class="col-lg-9 col-md-8">+244 {{isset($user['phone_number'])?$user['phone_number']:''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{isset($user['email'])?$user['email']:''}}</div>
                  </div>

                </div>


                
                <div class="tab-pane fade profile-overview" id="profile-clinical">

                  <h5 class="card-title">Detalhes</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Alergias</div>
                    <div class="col-lg-9 col-md-8">{{isset($clinicalData['name_allergys'])?$clinicalData['name_allergys']:''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Doenças crônicas</div>
                    <div class="col-lg-9 col-md-8">{{isset($clinicalData['name_chronics'])?$clinicalData['name_chronics']:''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Cirurgias</div>
                    <div class="col-lg-9 col-md-8">{{isset($clinicalData['name_surgs'])?$clinicalData['name_surgs']:''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Tipo Sanguíneo</div>
                    <div class="col-lg-9 col-md-8">{{isset($clinicalData['type'])?$clinicalData['type']:''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Glicemia</div>
                    <div class="col-lg-9 col-md-8">{{isset($clinicalData['glycemia']) && $clinicalData['glycemia']== "nao"?'Não':'Sim'}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Altura</div>
                    <div class="col-lg-9 col-md-8">{{isset($clinicalData['type'])?$clinicalData['type']:''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">IMC</div>
                    <div class="col-lg-9 col-md-8">
                      {{isset($clinicalData['imc'])?$clinicalData['imc'].' Kg/m2':''}}
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Peso</div>
                    <div class="col-lg-9 col-md-8">{{isset($clinicalData['weight'])?$clinicalData['weight'].' Kg':''}}</div>
                  </div>

                </div>
              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

@endsection
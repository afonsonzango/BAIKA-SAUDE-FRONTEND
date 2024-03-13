
@extends('layouts.management')

@section('title', 'Utilizadores')

@section('content')


<div class="pagetitle">
    <!--<h1>Data Tables</h1>-->
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">Data</li>
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
                <h5 class="card-title">Utilizadores</h5>
              </div>
              <div class="mt-3">
                <button class="btn text-white" 
                style="background-color: #5dc6ca; border-radius: 10px;margin-right:9px"
                data-bs-toggle="modal" data-bs-target="#verticalycentered"
                >
                  +Utilzador
                </button>
              </div>
            </div>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col"></th>
                  <th scope="col">#</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Categoria</th>
                  <th scope="col">Idade</th>
                  <th scope="col">Data Resgisto</th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td scope=""><input type="checkbox"></td>
                  <th scope="row">1</th>
                  <td>Brandon Jacob</td>
                  <td>Designer</td>
                  <td>28</td>
                  <td>2016-05-25</td>
                  <td><a href="{{route('profile_users')}}" style="color:#5dc6ca;" ><i class="bi bi-eye-fill"></i></a></td>
                  <td><a style="cursor: pointer;"><i class="bi bi-trash" style="color:#5dc6ca;" data-bs-toggle="modal" data-bs-target="#modalDrop"></i></a></td>
                </tr>
                <tr>
                  <td scope=""><input type="checkbox"></td>
                  <th scope="row">2</th>
                  <td>Bridie Kessler</td>
                  <td>Developer</td>
                  <td>35</td>
                  <td>2014-12-05</td>
                  <td><a href="{{route('profile_users')}}" style="color:#5dc6ca;"><i class="bi bi-eye-fill"></i></a></td>
                  <td><a style="cursor:pointer;color:#5dc6ca;"><i class="bi bi-trash"></i></a></td>
                </tr>
                <tr>
                  <td scope=""><input type="checkbox"></td>
                  <th scope="row">3</th>
                  <td>Ashleigh Langosh</td>
                  <td>Finance</td>
                  <td>45</td>
                  <td>2011-08-12</td>
                  <td><a href="{{route('profile_users')}}" style="color:#5dc6ca;"><i class="bi bi-eye-fill"></i></a></td>
                  <td><a style="cursor:pointer;color:#5dc6ca;"><i class="bi bi-trash"></i></a></td>
                </tr>
                <tr>
                  <td scope=""><input type="checkbox"></td>
                  <th scope="row">4</th>
                  <td>Angus Grady</td>
                  <td>HR</td>
                  <td>34</td>
                  <td>2012-06-11</td>
                  <td><a href="{{route('profile_users')}}" style="color:#5dc6ca;"><i class="bi bi-eye-fill"></i></a></td>
                  <td><a style="cursor:pointer;color:#5dc6ca;"><i class="bi bi-trash"></i></a></td>
                </tr>
                <tr>
                  <td scope=""><input type="checkbox"></td>
                  <th scope="row">5</th>
                  <td>Raheem Lehner</td>
                  <td>Dynamic Division Officer</td>
                  <td>47</td>
                  <td>2011-04-19</td>
                  <td><a href="{{route('profile_users')}}"  style="color:#5dc6ca;"><i class="bi bi-eye-fill"></i></a></td>
                  <td><a style="cursor:pointer;color:#5dc6ca;"><i class="bi bi-trash"></i></a></td>
                </tr>
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
          <h5 class="modal-title">Cadastar utilizador</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12 mb-2">
              <span>Tipo de utilizador</span>
              <select type="text" class="form-control" name="category" id="category" >
                <option value="" selected></option>
                <option value="special" >Especialista</option>
                <option value="patient">Paciente</option>
              </select>
            </div>
            <div class="col-12 mb-2" name="special" id="special">
              <span>Especialidade</span>
              <select type="text" class="form-control" >
                <option value="" selected></option>
                <option value="special" >Medicina Geral</option>
                <option value="patient">Enfermagem</option>
              </select>
            </div>
            <div class="col-12 mb-2">
              <span>Nome</span>
              <input type="text" class="form-control">
            </div>
            <div class="col-12 mb-2">
              <span>Telefone</span>
              <input type="text" class="form-control">
            </div>
            <div class="col-12 mb-2">
              <span>Email</span>
              <input type="text" class="form-control">
            </div>
          </div>
          
          
        </div>
        <div class="modal-footer d-flex justify-content-center" style="border: none">
          <button type="button" class="btn text-white" style="background-color: #3fbbc0">Cadastrar</button>
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
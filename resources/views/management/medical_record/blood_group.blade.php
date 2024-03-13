
@extends('layouts.management')

@section('title', 'Grupo Sanguíneo')

@section('content')

  <div class="pagetitle">
    <!--<h1>Data Tables</h1>-->
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Prontuário</li>
        <li class="breadcrumb-item active">Grupo-Sanguíneo</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            
            <h5 class="card-title">Grupo Sanguíneo</h5>
            
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nome</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  
                  @foreach ($bloodgroups as $index=>$bloodgroup)
                  <tr>
                    <th scope="row" style="width: 15px">{{++$index}}</th>
                    <td>{{$bloodgroup['type']}}</td>
                
                  </tr>
                  @endforeach
                </tr>
                
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>
    
@endsection
@extends('layouts.auth')

@section('title', 'Login - Baika +Saude')

@section('content')

<div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="index.html" class="logo d-flex align-items-center w-auto">
                <img src="{{asset('')}}client/assets/img/logo.png" alt="">
              </a>
            </div><!-- End Logo -->

            <div class="card mb-3" style="background-color: #35979c;">

              <div class="card-body">

                <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4 text-white">Login</h5>
                    @if (session('fail'))
                    <div class="alert alert-danger alert-dismissible fade show text-center">
                        <span class="small">{{session('fail')}}</span>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                </div>

                <form method="POST" accept="{{route('auth')}}" class="row g-3 needs-validation" novalidate>
                    @csrf
                  <div class="col-12">
                    <label for="yourUsername" class="form-label text-white">Telefone</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-telephone"></i></span>
                      <input type="text" name="phoneNumber" class="form-control" id="yourUsername" required>
                      <div class="invalid-feedback">Por favor Digite o seu telefone!</div>
                    </div>
                  </div>

                  <div class="col-12 mb-2">
                    <label for="yourPassword" class="form-label text-white">Senha</label>
                    <input type="password" name="password" class="form-control" name="password" id="password" required>
                    <div class="invalid-feedback">Por favor Digite a sua senha!</div>
                  </div>

                  <div class="col-12">
                    <button class="btn w-100 text-white" type="submit" style="background-color: #5dc6ca;">Login</button>
                  </div>
                  <div class="col-12">
                    <p class="small mb-0 text-white">Esqueceu a senha? <a href="" style="color: #5dc6ca;">Recuperar conta</a></p>
                  </div>
                  <div class="col-12">
                    <a href="{{route('init')}}" class="text-center" style="color: #8AE5E9;">Página inicial</a>
                  </div>
                </form>

              </div>
            </div>


          </div>
        </div>
      </div>

    </section>

  </div>
@endsection

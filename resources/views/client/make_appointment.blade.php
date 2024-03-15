@extends('layouts.client')

@section('title', 'Baika + Saúde')

@section('content')

<section class="section_markable">
    <div class="scripts_element">
        <h1>Agendamento</h1>

        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim dolor amet incidunt iure laborum molestiae, quae eveniet aut facere. Voluptatibus, recusandae iste dicta aliquid quasi voluptates illum. Provident, facilis magnam!
        </p>
    </div>

    <form action="{{route('make_appointment')}}" method="POST" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="0">
        @csrf

        <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
            

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-md-4 form-group">
                        <div>
                            <label>
                                Nome <span class="important">*</span>
                            </label>
                        </div>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Nome" required>
                        </div>
                        {{--<div class="col-md-4 form-group mt-3 mt-md-0">
                        <input type="card" class="form-control" name="card" id="card_id" placeholder="Bilhete de identidade ou passaporte" required>
                        </div>--}}
                        <div class="col-md-4 form-group mt-3 mt-md-0">
                            <div>
                                <label>
                                    Telefone <span class="important">*</span>
                                </label>
                            </div>
                        <input type="tel" class="form-control" name="phone" id="phone" placeholder="Telefone" required>
                        </div>
                        <div class="col-md-4 form-group mt-3 mt-md-0">
                            <div>
                                <label>
                                    Idade <span class="important">*</span>
                                </label>
                            </div>
                            <input type="text" class="form-control" name="age" id="card id" placeholder="Idade">
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-4 form-group mt-3">
                        <div>
                            <label>
                                Selecione Unidades Disponiveis <span class="important">*</span>
                            </label>
                        </div>
                        <select name="health_unit" id="health_unit" class="form-select">
                            <option value="">Selecione Unidade</option>
                            {{-- @foreach ($health_units as $health_unit)
                            <option value="{{$health_unit['id']}}" data-role="{{$health_unit['category_id']}}">{{$health_unit["name"]}}</option>
                            @endforeach --}}

                        </select>
                        </div>
                        <div class="col-md-4 form-group mt-3 div-esp" id="div-esp">
                        <select name="especialty" id="especialty" class="form-select">

                        </select>
                        </div>
                        <div class="col-md-4 form-group mt-3 div-prof" id="div-prof">
                        <select name="professional_id" id="professional_id" class="form-select">

                        </select>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
                    </div>

                </div>

                <div class="carousel-item">
                    <div class="container mb-4">
                        <div class="row">
                            <div class="col-md-12">
                                {{--<div class="d-md-flex justify-content-center mb-1">
                                    <a class="btn text-white" style="width: 60%;background: #3fbbc0;" data-bs-toggle="modal" data-bs-target="#modalTable">Ver o quadro de atendimento</a>

                                </div>--}}
                                <div class="elegant-calencar d-md-flex">
                                    <div class="wrap-header d-flex align-items-center" style="background: #3fbbc0;">
                                        <p id="reset">Iniciar</p>
                                        <div id="header" class="p-0">
                                            <div class="pre-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-left"></i></div>
                                            <div class="head-info" style="background: #3fbbc0;">
                                                <div class="head-day"></div>
                                                <div class="head-month"></div>
                                            </div>
                                        <div class="next-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-right"></i></div>
                                    </div>
                                </div>
                            <div class="calendar-wrap">
                                <table id="calendar">
                                <thead>
                                    <tr>
                                        <th>Domingo</th>
                                        <th>Sengunda</th>
                                        <th>Terça</th>
                                        <th>Quarta</th>
                                        <th>Quinta</th>
                                        <th>Sexta</th>
                                        <th>Sábado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                                <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                                <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                                <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                                <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                                <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                </tr>
                                </tbody>
                                </table>
                            </div>
                            </div>
                            </div>
                        </div>

                        <div class="my-3">
                            <div class="loading">Carregando</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Sua solicitação foi enviada com sucesso. Obrigado!</div>
                        </div>
                        {{--<div class="text-center"><button type="submit">Marcar agora</button></div>--}}
                    </div>

                </div>

            </div>
            <div style="display: flex;" class="mb-3">
              <button class="carousel-control-prev carousel-control-prev2 btn p-1" type="button" style="background-color: #3fbbc0;" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="{{--visually-hidden--}}">Voltar</span>
              </button>
              <button class="carousel-control-next carousel-control-next2 btn p-1" style="background-color: #3fbbc0;" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                  <span class="{{--visually-hidden--}}">Seguinte</span>
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>

              </button>
          </div>
        </div>
    </form>
</section>
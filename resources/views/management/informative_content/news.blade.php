
@extends('layouts.management')

@section('title', 'Notícias')

@section('content')
  <div class="pagetitle">
    <!--<h1>Data Tables</h1>-->
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Conteúdo Informativo</li>
        <li class="breadcrumb-item active">Notícias</li>
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
                    <div>
                      <h5 class="card-title">Notícias</h5>
                    </div>
                    <div class="mt-3">
                      <div class="row">
                        <div class="col-6">
                          <input type="text" class="form-control" placeholder="Pesquisar..." style="border-radius: 18px;">
                        </div>
                        <div class="col-6">
                          <button class="btn text-white"
                          style="background-color: #5dc6ca; border-radius: 10px;margin-right:9px"
                          data-bs-toggle="modal" data-bs-target="#verticalycentered"
                          >
                            +Notícia
                          </button>
                        </div>
                      </div>
                    </div>
                </div>


              <div class="news">
                @foreach ($news as $item)
                <div class="post-item clearfix mb-3">
                    <div class="d-flex">
                        <div>
                            <img src="{{env('API_URL')}}/files/{{$item['imageNetwork']}}" width="200px" height="200px" alt="">
                        </div>
                        <div class="" style="margin-left: 10px">
                            <h4><a href="#">{{$item['title']}}</a></h4>
                            <p>{{$item['description']}}</p>
                            <div class="d-flex">
                                <a class="btn btn-primary" onclick="showDataNews({{ json_encode($item) }})"><i class="bi bi-pencil-square" style="color:#ffffff;"></i></a>
                                <a class="btn btn-danger" style="margin-left: 5px" onclick="deleteNews({{$item['id']}})"><i class="bi bi-trash" style="color:#ffffff;"></i></a>
                            </div>
                        </div>

                    </div>

                </div>
                @endforeach

              </div><!-- End sidebar recent posts-->

            </div>
        </div><!-- End News & Updates -->
    </div>

  </section>

  <div class="modal fade" id="verticalycentered" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Publicar notícia</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form name="formAddNews" id="formAddNews" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="alert alert-danger alert-dismissible fade show text-center" id="alert" role="alert" style="display: none;">
              <p id="alert-text"></p>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="row">

              <div class="col-12 mb-2">
                <span>Título</span>
                <input type="text" name="title" id="title" class="form-control">
              </div>
              <div class="col-12 mb-2">
                <span>Descrição</span>
                <input type="text" name="description" id="description" class="form-control">
              </div>
              <div class="col-12 mb-2">
                <span>Imagem</span>
                <input type="file" name="imageNetwork" id="imageNetwork" class="form-control">
              </div>
            </div>
            <input type="text" id="news_id" hidden />
            <div class="d-flex justify-content-center" id="addNews" >
              <button type="submit" class="btn text-white" id="btn-addNews" style="background-color: #3fbbc0">Cadastrar</button>
            </div>
            <div class="d-flex justify-content-center d-none" id="updateNews">
                <button type="submit" class="btn text-white" id="btn-updateNews" style="background-color: #3fbbc0">Editar</button>
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
    function deleteNews(id){

        $("#news_id2").val(id);
        var modal = document.getElementById('modalDrop')
        let modalBox = new bootstrap.Modal(modal);
        modalBox.show();
    }

    function showDataNews(data) {
        /*var buttonId = document.getElementById("btn-addNews");
        buttonId.removeAttribute("id");
        buttonId.setAttribute("id", "btn-updateNews");*/
        $('#addNews').addClass('d-none');
        $('#updateNews').removeClass('d-none');

        $("#news_id").val(data.id);
        $("#title").val(data.title);
        $("#description").val(data.description);

        console.log(data);

        var modal = document.getElementById('verticalycentered')
        let modalBox = new bootstrap.Modal(modal);
        modalBox.show();
    }

    /*$('#verticalycentered').on('hidden.bs.modal', function () {
        window.location.reload();
    });*/
</script>
@endsection

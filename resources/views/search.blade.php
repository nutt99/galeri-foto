<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css') }}"/>
    <link rel="stylesheet" href="{{asset('style/grid.css')}}" type="text/css">
    <title>{{$searchTitle}}</title>
    <style>
        /* .grid-item {
            margin-bottom: 15px;
        }
        .grid-item img {
            width: 100%;
            height: auto;
            overflow: hidden;
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px));
            grid-gap: 10px;
        } */
    </style>
</head>
<body>
    <div class="navbar navbar-expand-lg" data-bs-theme="dark" style="background-color: black">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link active" aria-current="page" href="/">Beranda</a>
              {{-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Feature
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#content">Content</a></li>
                  <li><a class="dropdown-item" href="#another">Another action</a></li>
                  <li><a class="dropdown-item" href="#else">Something else here</a></li>
                </ul>
              </li> --}}
              
              @if (Session::get('uid') == null && Session::get('username') == null)
              <a class="nav-link me-3" href="/login">Masuk</a>
              @elseif (Session::get('uid') != null && Session::get('username') != null)
              <a class="nav-link me-3" href="/login">Dasbor</a>
              @endif
            </div>
            {{-- <input class="form-control me-2 bg-light mx-auto me-5" type="search" placeholder="Search" aria-label="Search" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-content="Bottom popover"> --}}
          </div>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>  
      {{-- modal --}}
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
          <div class="modal-content">
            <div class="modal-header">
              {{-- <h1 class="modal-title fs-5" id="exampleModalLabel">Search</h1> --}}
              <form class="input-group" action="/search" method="post">
                @csrf
              <input name="search" id="search" class="form-control bg-light mx-auto" type="search" placeholder="Cari" aria-label="Search" required>
              <input type="submit" class="btn btn-primary" value="Cari">
              </form>
              {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <div class="modal-body" id="searchResult">
              Masukkan kata kunci untuk mencari user
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
          </div>
        </div>
      </div>
      {{-- end modal --}}
          <div class="ms-3 me-3 mt-3 mb-5" id="container-photo">
            <section id="photos">
              
            </section>
          </div>
     
<script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('jquery/jquery.min.js')}}"></script>
<script>
  
  var page = 1;
  var isLoading = false;
  var hasMoreData = true;

  document.addEventListener("DOMContentLoaded", function(){
    getData();
  });


  function getData(){
    if (!isLoading && hasMoreData) {
      isLoading = true;
      $.ajax({
    url: '/searchData?page=' + page,
    method: "GET",
    beforeSend: function() {
      var loadingComponent = "<center id='loading'><div class='spinner-border text-primary' role='status'><span class='visually-hidden'>Loading...</span></div><p>Please Wait...</p></center>";
      $("#container-photo").append(loadingComponent);
    },
    data: {
        'searchTitle': '{{$searchTitle}}'
    },
    success: function(response){
      $("#loading").remove();
      if(response.data != ''){
      var html = '';


      response.data.forEach(function(item){
        html += "<a class='text-decoration-none' href='detail/" + item.id + "'><div class='overflow-y-hidden'><img src='" + item.lokasi_file + "' class='img-fluid border' alt='...' style='border-radius: 25px'><h6 class='text-truncate text-dark fw-bold ps-2'>" + item.deskripsi + "</h6></div></a>";
      });
      
      $("#photos").append(html);

      isLoading = false;

      page++;
      } 
      else {
        hasMoreData = false;
      }
    },
    error: function(xhr){
      console.log(xhr);
      isLoading = false;
    }
  });

    }
  }

   $(window).scroll(function() {
         if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
             getData();
         }
     });

</script>
<script>
  var html = '';
  $("#search").on('keyup', function(){
    $value = $(this).val();
    $.ajax({
      method: "GET",
      url: "{{route('searchJSON')}}",
      data: {
        'search': $value
      },
      beforeSend: function(){
        html = '';
      },
      success: function(response){
        html = response.data;
        $("#searchResult").html(html);
      },
      error: function(xhr){
        console.log(xhr);
      }
    });
  });
</script>
{{-- <script>
  const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
</script> --}}
</body>
</html>
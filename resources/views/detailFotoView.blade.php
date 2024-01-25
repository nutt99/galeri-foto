
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
    <title>Beranda</title>
    <style>
      .k :hover{
        background-color: rgb(156, 156, 156);
      }
      .grid-item {
            margin-bottom: 15px;
        }
        .grid-item img {
            width: 100%;
            height: auto;
            overflow: hidden;
        }
    </style>
</head>
<body>
  <div class="container">
    <div class="fixed-bottom mb-4 me-5 text-end">
      <button class="rounded-pill text-light border-0 text-center p-2 pe-1 fs-5" data-bs-toggle="modal" data-bs-target="#addPhoto" style="background-color: black;">
        <i class="fa fa-image text-light"></i> Foto + 
      </button>
    </div>
  </div>
  {{-- navbar --}}
  <div class="navbar navbar-expand-lg" data-bs-theme="dark" style="background-color: black">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse justify-content-end navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="#home">Home</a>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Feature
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#content">Content</a></li>
              <li><a class="dropdown-item" href="#another">Another action</a></li>
              <li><a class="dropdown-item" href="#else">Something else here</a></li>
            </ul>
          </li>
          
          <a class="nav-link me-3" href="#pricing">Pricing</a>
        <input class="form-control me-2 bg-light" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
        </div>
      </div>
    </div>
  </div>  
    <div class="row row-cols-2">
      <div class="col sticky-top" style="height:100vh;width:20%;background-color:black;">
        <div class="pt-5 ms-2">
            <a class="text-decoration-none k" href="/home">
              <div class="d-flex justify-content-between align-items-center text-light mb-3" style="font-size: 19px">
              Beranda
              </div>
            </a>
          <a href="/" class="text-decoration-none k">
          <div class="d-flex justify-content-between align-items-center text-light mb-3" style="font-size: 19px">
            Album
          </div>
        </a>
        <a href="/profil" class="text-decoration-none k">
          <div class="d-flex justify-content-between align-items-center text-light mb-3" style="font-size: 19px">
            Profil
          </div>
        </a>
        <a href="/logout" class="text-decoration-none k">
          <div class="d-flex justify-content-between align-items-center text-light mb-3" style="font-size: 19px">
            Logout
          </div>
        </a>
        </div>
      </div>
      {{-- end navbar --}}
      <div style="width:80%">
        <div class="row m-2 mt-3 ms-3">
          {{-- @for ($i = 1; $i < 240; $i++)
          <div class="container card col-2 m-1">
            <div class="card-body">Ini contoh {{$i}} </div>
          </div>
          @endfor --}}
          <div class="row">
            <div class="border-bottom border-3 border-dark mb-3 pb-2 pt-2">
              <div class="d-flex justify-content-between align-items-center">
                <h2>{{ $namaAlbum }}</h2>
                {{-- <a href="/create-album" class="text-decoration-none"><h5 class="rounded-pill p-2 text-light text-center" style="background-color: black">Tambah +</h5></a> --}}
                <button type="button" class="rounded-pill text-light border-0 text-center p-1 fs-5" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="background-color: black">
                  Tambah +
                </button>
              </div>
            </div>
            <div class="row column-gap-3">
              {{-- @foreach ($detailFoto as $a)
          <div class="container card col-2 m-1 text-center m-2">
            <a class="text-decoration-none " href="album/{{ $a['id'] }}" style="color: black">
              <div class="card-img-top mt-4"><i class="fas fa-folder" style="font-size:60px"></i></div>
            <div class="card-body container text-truncate"><div style="font-weight: bold">({{ $a['visibilitas'] }})</div> @php
              echo explode("@", $a['nama_album'])[0];
            @endphp </div>
            </a>
          </div>
          @endforeach --}}
          <div class="container">
            <div class="row">
                @foreach ($detailFoto as $a)
                <div class="col-md-4 grid-item">
                  {{-- <img src="@php
                    echo asset($a['lokasi_file']);
                  @endphp" alt="Image 1"> --}}
                  <div class="card">
                    <img src="@php
                    echo asset($a['lokasi_file']);
                  @endphp" class="card-img-top" alt="...">
                    <div class="card-body">
                       <h5 class="card-title">Ini judul ceritanya</h5>
                       <p class="card-text text-truncate">{{$a['deskripsi']}}</p>
                       <!-- Tombol, Tautan, atau elemen lainnya -->
                    </div>
                 </div>
              </div>
                @endforeach
            </div>
        </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
</body>
</html>


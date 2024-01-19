<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
    <title>Beranda</title>
    <style>
      .k :hover{
        background-color: rgb(156, 156, 156);
      }
    </style>
</head>
<body>
  <div class="container">
    <div class="fixed-bottom mb-4 me-5 text-end">
      <button class="btn rounded-pill p-1 text-center fs-5 text-light" data-toggle="tooltip" data-placement="left" style="background-color: black;">
        {{-- <i class="fa fa-image text-light"></i>--}}+ Foto 
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
          <form class="d-flex" role="search" method="POST">
            @csrf
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
      {{-- Modal --}}
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Buat Album</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body container">
        <label for="AlbumName">Nama Album</label>
        <input class="form-control" type="text" name="album_name" id="AlbumName" placeholder="Nama Album">
        <label for="AlbumName">Visibilitas</label>
        <select name="visible" class="form-select">
          <option value="publik">Publik</option>
          <option value="folower">Pengikut</option>
          <option value="private">Private</option>
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn text-light" style="background-color: black" value="Buat">
      </div>
    </div>
  </div>
</div>
      {{-- End Modal --}}
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
                <h2>Album</h2>
                {{-- <a href="/create-album" class="text-decoration-none"><h5 class="rounded-pill p-2 text-light text-center" style="background-color: black">Tambah +</h5></a> --}}
                <button type="button" class="rounded-pill text-light border-0 text-center p-1 fs-5" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="background-color: black">
                  Tambah +
                </button>
              </div>
            </div>
            <div class="row column-gap-3">
              @foreach ($album as $a)
          <div class="container card col-2 m-1 text-center m-2">
            <a class="text-decoration-none " href="album/{{ $a['id'] }}" style="color: black">
              <div class="card-img-top mt-4"><i class="fas fa-folder" style="font-size:60px"></i></div>
            <div class="card-body container text-truncate"><div style="font-weight: bold">({{ $a['visibilitas'] }})</div> {{$a['nama_album']}} </div>
            </a>
          </div>
          @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>

@php
    if (Session::get('status_code') == 403) {
      echo "<script>window.alert('Album sudah ada')</script>";
    }
@endphp
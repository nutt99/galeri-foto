
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}"/>
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
            <a class="text-decoration-none k" href="/">
              <div class="d-flex justify-content-between align-items-center text-light mb-3" style="font-size: 19px">
              Beranda
              </div>
            </a>
          <a href="/dashboard" class="text-decoration-none k">
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
    <form action="/create-album" method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Buat Album</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body container">
        <label for="AlbumName">Nama Album</label>
        <input class="form-control" type="text" name="album_name" id="AlbumName" placeholder="Nama Album" required>
        <label for="AlbumName">Visibilitas</label>
        <select name="visible" class="form-select">
          <option value="publik">Publik</option>
          <option value="folower">Pengikut</option>
          <option value="private">Private</option>
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          @csrf
        <input type="submit" class="btn text-light" style="background-color: black" value="Buat">
        </form>
      </div>
    </div>
  </div>
</div>
      {{-- End Modal --}}
      {{-- Modal 2 --}}
      <div class="modal fade" id="addPhoto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <form action="/addPhoto" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambahkan Foto</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body container">
              <div class="mb-3">
                <label for="formFile" class="form-label">Default file input example</label>
                <input class="form-control" type="file" id="formFile" name="foto" required>
              </div>              
              <label for="AlbumName">Visibilitas</label>
              <select name="albumName" class="form-select">
                @foreach ($album as $a)
                  <option value="{{ $a['nama_album'] }}!!!{{ $a['id'] }}">@php
                    echo explode("@", $a['nama_album'])[0];
                  @endphp 
                  ({{ $a['visibilitas'] }})</option>
                @endforeach
              </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <input type="submit" class="btn text-light" style="background-color: black" value="Buat">
            </form>
            </div>
          </div>
        </div>
      </div>
    
      {{-- end modal 2 --}}
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
            <div class="card-body container text-truncate"><div style="font-weight: bold">({{ $a['visibilitas'] }})</div> @php
              echo explode("@", $a['nama_album'])[0];
            @endphp </div>
            </a>
            <div class="row p-2">
              <div class="col"><i class="fas fa-edit text-info" onclick=""></i></div>
              <div class="col"><i class="fas fa-trash text-danger" onclick="deleteAlbum({{$a['id']}})"></i></div>
            </div>
          </div>
          @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    <script src="{{asset('jquery/jquery.min.js')}}"></script>
    <script>
      function deleteAlbum(id){
        var csrfToken = "{{csrf_token()}}";
        $.ajax({
          url: "{{ route('deleteAlbum') }}",
          method: "POST",
          data: {
            _token: csrfToken,
            _method: "DELETE",
            idAlbum: id,
          },
          success: function(response){
            console.log(response.message);
            console.log(response.path_now);
          },
          error: function(xhr){
            console.log('gagal');
          },
        });
      }
    </script>
    
    @php
    if (Session::get('status_code') == 401) {
      echo "<script>
        Swal.fire({
          icon: 'warning',
          title: 'Album sudah ada',
          text: 'Album yang kamu masukkan sudah ada, harap gunakan nama lain'
        });
        </script>";
  
    }
    if (Session::get('status') == 200) {
      echo "<script>Swal.fire({
        icon: 'success',
        title: 'Sukses',
        text: 'File berhasil di upload'
      });</script>";

    }
    if (Session::get('status') == 403) {
      echo "<script>Swal.fire({
        icon: 'warning',
        title: 'Ekstensi Tidak diperbolehkan',
        text: 'Ekstensi yang diperbolehkan hanya jpeg, jpg, dan png'
      });</script>";

    }
@endphp
</body>
</html>


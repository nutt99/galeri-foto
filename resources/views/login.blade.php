<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Selamat Datang</title>
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" type="text/css" rel="stylesheet">
  </head>
  <body>
    <div class="navbar navbar-expand-lg" data-bs-theme="dark" style="background-color: black">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse justify-content-end navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link" aria-current="page" href="/">Beranda</a>
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
              
              <a class="nav-link me-3 active" href="/login">Masuk</a>
            {{-- <input class="form-control me-2 bg-light" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light" type="submit">Search</button> --}}
            </div>
          </div>
        </div>
      </div>  
    <div class="container mt-5" style="margin:auto">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card" style="border-radius: 20px">
                    <div class="card-header text-center">
                        <h4>Masuk terlebih dahulu</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/login">
                            @csrf
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input required autofocus name="username" type="text" class="form-control" id="username" placeholder="Masukkan Username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input required name="password" type="password" class="form-control" id="password" placeholder="Masukkan Password">
                            </div>
                            <div class="form-group">
                                <a href="/registrasi" class="text-decoration-none">Belum punya akun? Register terlebih dahulu</a>
                            </div>
                            <div class="text-center mt-3">
                                <input type="submit" class="btn btn-primary text-center" value="Login">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  </body>
</html>

@php
$stats = $status ?? "";
    if($stats == 404){
        echo "<script>window.alert('Akun Tidak Ditemukan')</script>";
    }
    if($stats == 403){
        echo "<script>window.alert('Username atau Password Salah')</script>";
    }
    if (Session::get('status') == 400) {
        echo "<script>window.alert('Akun berhasil dibuat')</script>";
    }
@endphp
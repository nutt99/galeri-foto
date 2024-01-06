<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Selamat Datang</title>
    <link href="bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">
  </head>
  <body>
    <div class="container mt-5" style="margin:auto">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card" style="border-radius: 20px">
                    <div class="card-header text-center">
                        <h4>Masuk terlebih dahulu</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/">
                            @csrf
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input name="username" type="text" class="form-control" id="username" placeholder="Masukkan Username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input name="password" type="password" class="form-control" id="password" placeholder="Masukkan Password">
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
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
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
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi</title>
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" type="text/css" rel="stylesheet">
  </head>
  <body>
    <div class="container mt-5" style="margin:auto">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card" style="border-radius: 20px">
                    <div class="card-header text-center">
                        <h4>Registrasi akun anda</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/registrasi">
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
                                <label for="email">Email</label>
                                <input name="email" type="email" class="form-control" id="email" placeholder="example@gmail.com">
                            </div>
                            <div class="form-group">
                                <a href="/" class="text-decoration-none">Sudah punya akun? Ayo login</a>
                            </div>
                            <div class="text-center mt-3">
                                <input type="submit" class="btn btn-primary text-center" value="Registrasi">
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
    $status = $status ?? "";
    if ($status == 401) {
        echo "<script>window.alert('Username sudah digunakan')</script>";
    }
@endphp
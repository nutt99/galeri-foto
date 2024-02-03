<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <title>Detail</title>
    <style>
        .image-container{
            height: 250px;
        }
    </style>
</head>
<body>
    @if ($foto == false)
    <p>Foto tidak ada</p>    
    @elseif ($foto != false)
    <div class="container p-3">
        <div class="card p-5">
            <div class="row">
                <div class="container col"><img src="@php
                    echo asset($foto['lokasi_file']);
                @endphp" alt="" class="img-fluid" style="border-radius: 25px"></div>
                <div class="container col">
                    <p class="fw-bold fs-4">ini deskripsi</p>
                    <p class="fs-5">Posted By</p>
                    <p class="fs-6">{{$foto->pengguna->username}}</p>
                </div>
            </div>
        </div>
    </div>
    @endif
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
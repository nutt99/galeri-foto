<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
    <title>Detail</title>
    <style>
        .image-container{
            height: 250px;
        }
        .material-symbols-outlined {
          font-variation-settings:
          'FILL' 0,
          'wght' 400,
          'GRAD' 0,
          'opsz' 24
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
                    {{-- Ikon kontol payah kali setting nya jembod, mending flutter --}}
                    <label class="form-check-label">
                        <input type="checkbox" name="like" id="likeId" style="opacity: 0">
                        <div>
                            <div class="row g-1">
                                <div class="col">
                                    <i class="material-icons material-symbols-outlined">favorite</i>
                                </div>
                            <div class="col">
                                <p>Like</p>
                            </div>
                            </div>
                        </div>
                    </label>
                </div>
            </div>
        </div>
    </div>
    @endif
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script>
        var element = document.getElementById("likE");
        if(element.classList)
    </script>
</body>
</html>
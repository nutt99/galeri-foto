<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('material_icon/like/material-normal/material.css')}}">
    <link rel="stylesheet" href="{{asset('material_icon/like/material-outlined/material-outlined.css')}}" />
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}"/>
    <title>Detail Foto</title>
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

        .pointer-set:hover{
            cursor: pointer
        }
    </style>
</head>
<body>
    <div class="navbar navbar-expand-lg sticky-top" data-bs-theme="dark" style="background-color: black">
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
              <a class="nav-link me-3" href="/login">Login</a>
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
    @if ($foto == false)
    <p>Foto tidak ada</p>    
    @elseif ($foto != false)
    <div class="container p-3">
        <div class="card p-5">
            <div class="row">
                <div class="container col-md"><img src="@php
                    echo asset($foto['lokasi_file']);
                @endphp" alt="" class="img-fluid" style="border-radius: 25px"></div>
                <div class="container col-md">
                    <p class="fw-bold fs-4">{{$foto->deskripsi}}</p>
                    <p class="fs-5">Diposting oleh</p>
                    <a class="text-decoration-none text-dark" href="/profil/{{$foto->pengguna->id}}"><p class="fs-6">{{$foto->pengguna->username}}</p></a>
                    @if (Session::get('uid') != null && Session::get('username') != null)
                        <div class="row g-2">
                        <div class="col">
                            <label class="form-check-label">
                                @if ($ceklike == false)
                                <input type="checkbox" name="like" id="likeId" style="opacity: 0">
                                @elseif ($ceklike == true)
                                <input type="checkbox" name="like" id="likeId" style="opacity: 0" checked>
                                @endif
                                    <div class="row g-1">
                                        @if ($ceklike == false)
                                        <div class="col pointer-set" onclick="changeIcon()">
                                            <i class="material-icons material-symbols-outlined" id="likE">favorite</i>
                                        </div>
                                        @elseif ($ceklike == true)
                                        <div class="col pointer-set" onclick="changeIcon()">
                                            <i class="material-icons" id="likE">favorite</i>
                                        </div>
                                        @endif
                                        <div class="col">
                                            <p id="likeCount">{{$foto->like_fotos->count()}}</p>
                                        </div>
                                    </div>
                            </label>
                        </div>
                        <div class="col">
                            <h6 style="opacity: 0">asd</h6>
                            <label class="form-check-label">
                                <a class="text-decoration-none text-dark" href="/download/{{$foto->id}}">
                                    <div class="row g-1">
                                        <div class="col">
                                            <i class="fas fa-download"></i>
                                        </div>
                                        <div class="col">
                                            <p>Unduh</p>
                                        </div>
                                    </div>
                                </a>
                            </label>
                        </div>
                    </div>
                    <div class="container border-top border-2 overflow-auto" style="max-height: 450px" id="komenContainer">
                    @foreach ($foto->komentars as $a)
                        <a href="/profil/{{$a->pengguna->id}}" class="text-decoration-none text-dark"><p class="fs-6 fw-bold mt-3">{{$a->pengguna->username}}</p></a>
                        <p>{{$a->komentar}}</p>
                    @endforeach
                    </div>
                    <div class="row mt-5">
                        <input type="text" name="komentar" class="form-control col border border-dark me-1" id="fieldKomentar" placeholder="Komentar">
                        <button type="button" class="btn btn-dark col-3" onclick="sendKomentar()">Kirim</button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif
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
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('jquery/jquery.min.js')}}"></script>
    <script>
        function changeIcon(){
            var element = document.getElementById("likE");
        if(element.classList.contains("material-symbols-outlined")){
            element.classList.remove("material-symbols-outlined");
        }
        else{
            element.classList.add("material-symbols-outlined");
        }
        }
        function sendKomentar(){
            var csrfToken = '{{ csrf_token() }}';
            var check_field = document.getElementById("fieldKomentar").value != '' ? true : false;
            var komenValue = document.getElementById("fieldKomentar").value;
            if(check_field == true){
                 $.ajax({
                 url: "{{route('addKomen.action', ['id' => $foto->id])}}", 
                 method: "POST",
                 data: {
                     _token: csrfToken,
                     komentar:  document.getElementById("fieldKomentar").value,
                 },
                 success: function(response){
                    console.log(response.message);
                    document.getElementById('fieldKomentar').value = '';
                    $('#komenContainer').append("<p class='fs-6 fw-bold mt-3'>{{Session::get('username')}}</p><p>"+komenValue+"</p>");
                 },
                 error: function(response){
                    console.log(response.message);
                 }
             });
            console.log('field berisi');
            } 
            else{
                console.log('field tidak boleh kosong');
            }
        }
    </script>
    <script>
        $("#likeId").change(function(){
            var csrfToken = '{{ csrf_token() }}';
            var isChecked = $(this).prop('checked');
            var likeCount = parseInt(document.getElementById("likeCount").textContent);

            if(isChecked == true) {
                document.getElementById("likeCount").textContent = likeCount +=1;
                $.ajax({
            url: "{{route('like.action', ['id' => $foto->id])}}",
            method: "POST",
            data: {
                _token: csrfToken,
                is_checked: isChecked,
            },
            success: function(response){
                console.log(response.message);
                console.log(isChecked);
            },
            error: function(xhr){
                console.log("gagal");
            }
        });
            }
            else {
                document.getElementById("likeCount").textContent = likeCount -=1;
                $.ajax({
            url: "{{route('unlike.action', ['id' => $foto->id])}}",
            method: "POST",
            data: {
                _method: "DELETE",
                _token: csrfToken,
                is_checked: isChecked,
            },
            success: function(response){
                console.log(response.message);
                console.log(isChecked);
            },
            error: function(xhr){
                console.log("gagal");
            }
        });
            }
        })
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
</body>
</html>
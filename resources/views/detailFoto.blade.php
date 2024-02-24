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
        .pointer-set:hover{
            cursor: pointer
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
                    @if (Session::get('uid') != null && Session::get('username') != null)
                        <div class="row g-2">
                        <div class="col">
                            <label class="form-check-label">
                                <input type="checkbox" name="like" id="likeId" style="opacity: 0">
                                    <div class="row g-1">
                                        <div class="col pointer-set" onclick="changeIcon()">
                                            <i class="material-icons material-symbols-outlined" id="likE">favorite</i>
                                        </div>
                                        <div class="col">
                                            <p id="likeCount">{{$foto->like_fotos->count()}}</p>
                                        </div>
                                </div>
                            </label>
                        </div>
                        <div class="col">
                            <h6 style="opacity: 0">asd</h6>
                            <label class="form-check-label">
                                <a class="text-decoration-none text-dark" href="#komentar">
                                    <div class="row g-1">
                                        <div class="col">
                                            <i class="material-icons material-symbols-outlined">comment</i>
                                        </div>
                                        <div class="col">
                                            <p>Komentar</p>
                                        </div>
                                    </div>
                                </a>
                            </label>
                        </div>
                    </div>
                    <div class="container border-top border-2 overflow-auto" style="max-height: 450px" id="komenContainer">
                    @foreach ($foto->komentars as $a)
                        <p class="fs-6 fw-bold mt-3">{{$a->pengguna->username}}</p>
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
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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
</body>
</html>
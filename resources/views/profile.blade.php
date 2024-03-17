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
    <title>Profil | {{$user->username}}</title>
</head>
<body>
    <body>
        <div class="container-fluid border-bottom border-3 shadow bg-body-secondary">
            <div class="row p-5 fw-bold fs-5 mx-2 ">
                <div class="col text-center">
                    <div class="col pb-3">
                        <img src="{{asset('album_user/kreate album@nata/Shima.Rin.full.3391101.png')}}" class="rounded-circle border border-3" width="230" height="230">
                    </div>
                    <div class="fs-5 px-5 border-top border-1">
                        <button type="button" class="btn btn-primary">
                            Ikuti +
                        </button>
                    </div>
                </div>
    
                <div class="py-3 my-2 rounded border-2 shadow bg-body-tertiary">
                    <div class="col ">
                        <figure class="text-center border-bottom border-bottom-2">
                            {{-- <blockquote class="blockquote fs-4">
                              <p>Username</p>
                            </blockquote> --}}
                            <figcaption class="fw-lighter fs-3 fw-bold">
                                    <div class="text-center">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <p class="fs-6 fw-lighter">Username</p>
                                    <p class="fs-4 fw-bold">{{$user->username}}</p>
                            </figcaption>
                        </figure>
                        <figure class="text-center border-bottom border-bottom-2">
                            <figcaption class="fw-lighter fs-3 fw-bold">
                                    <div class="text-center">
                                        <i class="fas fa-user-secret"></i>
                                    </div>
                                    <p class="fs-6 fw-lighter">Dsiplay Name</p>
                                    <p class="fs-4 fw-bold">{{$user->nama_lengkap}}</p>
                            </figcaption>
                        </figure>
                        <figure class="text-center border-bottom border-bottom-2">
                            <figcaption class="fw-lighter fs-3 fw-bold">
                                    <div class="text-center">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <p class="fs-6 fw-lighter">Email</p>
                                    <p class="fs-4 fw-bold">{{$user->email}}</p>
                            </figcaption>
                        </figure>
                        {{-- <figure class="text-center ">
                            <blockquote class="blockquote fs-4">
                              <p>My Name</p>
                            </blockquote>
                            <figcaption class="blockquote-footer  fw-lighter fs-6">
                                I am a Blogger and Junior Programmer
                            </figcaption>
                        </figure>
                        <figure class="text-center ">
                            <blockquote class="blockquote fs-4">
                              <p>My Name</p>
                            </blockquote>
                            <figcaption class="blockquote-footer  fw-lighter fs-6">
                                I am a Blogger and Junior Programmer
                            </figcaption>
                        </figure> --}}
                        {{-- <ul class="list-group list-group-flush  fs-6 m-1 ">
                            <li class="list-group-item bg-body-tertiary"><pre>Age     : <a class="text-dark-emphasis text-decoration-none">20</a></pre></li>
                            <li class="list-group-item bg-body-tertiary"><pre>Date    : <a class="text-dark-emphasis text-decoration-none">DD-MM-YYYY</a></pre></li>
                            <li class="list-group-item bg-body-tertiary"><pre>Address : <a class="text-dark-emphasis text-decoration-none">City</a></pre></li>
                            <li class="list-group-item bg-body-tertiary"><pre>Phone   : <a class="text-dark-emphasis text-decoration-none">0822-9999-0000-2222</a></pre></li>
                            <li class="list-group-item bg-body-tertiary"><pre>Email   : <a class="text-dark-emphasis text-decoration-none">youremail@gmail.com</a></pre></li>
                          </ul> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid p-5 bg-msg">
                <h1 class="text-dark text-center">Album</h1>
            <div class="container p-5 shadow rounded bg-body-tertiary ">
                <div class="text-justify">
                   <div class="row d-flex justify-content-center">
                    @foreach ($user->albums->whereIn('visibilitas', ['publik', 'folower']) as $a)
                    <div class="container card col-md-2 m-1 text-center m-2">
                      <a class="text-decoration-none " href="album/{{ $a['id'] }}" style="color: black">
                        <div class="card-img-top mt-4"><i class="fas fa-folder" style="font-size:60px"></i></div>
                      <div class="card-body container text-truncate"><div style="font-weight: bold">({{ $a['visibilitas'] }})</div> @php
                        echo explode("@", $a['nama_album'])[0];
                      @endphp </div>
                      </a>
                      <div class="row p-2">
                        <div class="col"><i class="fas fa-edit text-info" onclick="updateAlbum( '{{$a['id']}}', '{{$a['nama_album']}}', '{{ $a['deskripsi'] }}', '{{ $a['visibilitas'] }}' )" style="cursor: pointer" data-bs-target="#updateModal" data-bs-toggle="modal"></i></div>
                        <div class="col"><i class="fas fa-trash text-danger" onclick="deleteAlbum('{{$a['id']}}')" data-bs-toggle="modal" data-bs-target="#deletePhoto" style="cursor: pointer"></i></div>
                      </div>
                    </div>
                    @endforeach
                   </div>
                </div>
            </div>
        </div>
    
    </body>
    </html>
<script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
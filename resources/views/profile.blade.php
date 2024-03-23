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
    <style>
        #profileContainer1{
            background-image: url("{{asset('album_user/folder nata@nutt.a/102548934_p3.jpg')}}");
            background-position: center;
            /* background-size: cover; */
        }
        #profileContainer2{
            background-image: url("{{asset('album_user/folder nata@nutt.a/103207291_p0.png')}}");
            background-position: center;
            background-size: cover;
        }
        #profileContainer3{
            background-image: url("{{asset('album_user/folder nata@nutt.a/103449092_p0.png')}}");
            background-position: bottom
        }
        #profileContainer{
            background-image: url("{{asset('album_user/folder nata@nutt.a/103449092_p0.png')}}");
            background-position: bottom
        }
        #infoContainer{
            background-color: rgba(255, 255, 255, 0.5)
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
    {{-- Modal --}}
            <div class="modal fade" id="editDisplay" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit display name</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <input type="text" class="form-control" id="displayForm">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="okeEdit()">Oke</button>
                    </div>
                  </div>
                </div>
              </div>
            {{-- End Modal --}}
        <div class="container-fluid border-bottom border-3 shadow bg-body-secondary" id="profileContainer">
            <div class="row p-5 fw-bold fs-5 mx-2 ">

                <div class="py-3 my-2 rounded border-2 shadow" id="infoContainer">
                    <div class="col">
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
                                    <p class="fs-6 fw-lighter">Display Name</p>
                                    <div class="d-flex flex-row justify-content-center">
                                        <p class="fs-4 fw-bold me-2" id="displayName">{{$user->nama_lengkap}}</p>
                                        @if (Session::get('uid') == $user->id)
                                        <i style="cursor: pointer" class="fas fa-edit fs-5" data-bs-target="#editDisplay" data-bs-toggle="modal" onclick="getDisplayName()"></i>
                                        @endif
                                    </div>
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
                        <figure class="text-center border-bottom border-bottom-2">
                            <figcaption class="fw-lighter fs-3 fw-bold">
                                <div class="text-center">
                                    <p class="fs-4">Follower</p>
                                </div>
                                    <div class="col text-center">
                                        {{-- <div class="col pb-3">
                                            <img src="{{asset('album_user/kreate album@nata/Shima.Rin.full.3391101.png')}}" class="rounded-circle border border-3" width="230" height="230">
                                        </div> --}}
                                        @if (Session::get('uid') != $user->id)
                                        <div class="fs-5 px-5">
                                            @if ($user->follows->where('clientId', '=', Session::get('uid'))->where('targetId', '=', $user->id)->count() == 1)
                                            <button type="button" class="btn btn-light" id="followIcon" onclick="changeIcon()">Mengikuti</button>
                                            @else
                                            <button type="button" class="btn btn-primary" id="followIcon" onclick="changeIcon()">Ikuti +</button>
                                            @endif
                                        </div>
                                        @endif
                                        <div class="fs-5 px-5 mt-3 col" style="cursor: pointer">
                                            <i class="fas fa-solid fa-user-plus me-2"></i>{{$user->follows->count()}}
                                        </div>
                                    </div>
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
                    @if ($user->follows->where('clientId', '=', Session::get('uid'))->where('targetId', '=', $user->id)->count() == 1)
                    @foreach ($user->albums->whereIn('visibilitas', ['publik', 'folower']) as $a)
                    <div class="container card col-md-2 m-1 text-center m-2">
                      <a class="text-decoration-none " href="/album/{{ $a['id'] }}" style="color: black">
                        <div class="card-img-top mt-4"><i class="fas fa-folder" style="font-size:60px"></i></div>
                      <div class="card-body container text-truncate"><div style="font-weight: bold">({{ $a['visibilitas'] }})</div> @php
                        echo explode("@", $a['nama_album'])[0];
                      @endphp </div>
                      </a>
                    </div>
                    @endforeach
                    @else
                    @foreach ($user->albums->whereIn('visibilitas', ['publik']) as $a)
                    <div class="container card col-md-2 m-1 text-center m-2">
                      <a class="text-decoration-none " href="/album/{{ $a['id'] }}" style="color: black">
                        <div class="card-img-top mt-4"><i class="fas fa-folder" style="font-size:60px"></i></div>
                      <div class="card-body container text-truncate"><div style="font-weight: bold">({{ $a['visibilitas'] }})</div> @php
                        echo explode("@", $a['nama_album'])[0];
                      @endphp </div>
                      </a>
                      {{-- <div class="row p-2">
                        <div class="col"><i class="fas fa-edit text-info" onclick="updateAlbum( '{{$a['id']}}', '{{$a['nama_album']}}', '{{ $a['deskripsi'] }}', '{{ $a['visibilitas'] }}' )" style="cursor: pointer" data-bs-target="#updateModal" data-bs-toggle="modal"></i></div>
                        <div class="col"><i class="fas fa-trash text-danger" onclick="deleteAlbum('{{$a['id']}}')" data-bs-toggle="modal" data-bs-target="#deletePhoto" style="cursor: pointer"></i></div>
                      </div> --}}
                    </div>
                    @endforeach
                    @endif
                   </div>
                </div>
            </div>
        </div>
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
    $("#profileContainer").css({
        'background-image' : 'url({{asset("album_user/folder nata@nutt.a/103449092_p0.png")}})'
    });
    var follow = $("#followIcon").text() == "Ikuti +" ? false : true;
    var name = "{{$user->nama_lengkap}}";
    console.log(follow);
    function changeIcon(){
        follow = !follow
        if(follow == true){
            $("#followicon").addClass('btn-light');
            $("#followIcon").removeClass('btn-primary');
            $("#followIcon").text("Mengikuti");
            addFollow();
        }
        else{
            $("#followIcon").addClass('btn-primary');
            $("#followIcon").removeClass('btn-light');
            $("#followIcon").text("Ikuti +");
            removeFollow();
        }
    }

    function addFollow(){
        $.ajax({
            url: "{{route('addFollow')}}",
            method: "POST",
            data: {
                _token: "{{csrf_token()}}",
                targetId: "{{$user->id}}"
            },
            success: function(response){
                console.log(response.data);
                location.reload();
            },
            error: function(xhr){
                console.log(xhr);
            }
        });
    }

    function removeFollow(){
        $.ajax({
            url: "{{route('removeFollow')}}",
            method: "POST",
            data: {
                _token: "{{csrf_token()}}",
                _method: "DELETE",
                targetId: "{{$user->id}}"
            },
            success: function(response){
                console.log(response.data);
                location.reload();
            },
            error: function(xhr){
                console.log(xhr);
            }
        });
    }

    function getDisplayName(){
        $("#displayForm").val(name);
    }

    function okeEdit(){
        $("#displayName").text($("#displayForm").val());
        $.ajax({
            url: "{{route('editUser')}}",
            method: "POST",
            data: {
                _token: "{{csrf_token()}}",
                _method: "PUT",
                displayName: $("#displayForm").val()
            },
            success: function(response){
                name = $("#displayForm").val();
                console.log(response.data);
            },
            error: function(xhr){
                console.log(xhr);
            }
        });
    }
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
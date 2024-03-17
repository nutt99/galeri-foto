
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}"/>
    <title>Beranda</title>
    <style>
      .k :hover{
        background-color: rgb(156, 156, 156);
      }
      .grid-item {
            margin-bottom: 15px;
        }
        .grid-item img {
            width: 100%;
            height: auto;
            overflow: hidden;
        }
        .width-dinamis{
        width: 80%;
      }
      @media(max-width: 768px){
        .width-dinamis{
          width: 100%;
        }
      }
    </style>
</head>
<body>
  <div class="container">
    <div class="fixed-bottom mb-4 me-5 text-end">
      <button class="rounded-pill text-light border-0 text-center p-2 pe-1 fs-5" data-bs-toggle="modal" data-bs-target="#addPhotoDetail" style="background-color: black;">
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
          {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-md-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Feature
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#content">Content</a></li>
              <li><a class="dropdown-item" href="#another">Another action</a></li>
              <li><a class="dropdown-item" href="#else">Something else here</a></li>
            </ul>
          </li> --}}
          <a class="nav-link me-3 d-md-none" href="/dashboard">Album</a>
          <a class="nav-link me-3 d-md-none" href="/">Beranda</a>
          <a class="nav-link me-3 d-md-none" href="/profil">Profile</a>
          <a class="nav-link me-3 d-md-none" href="/logout">Keluar</a>
        {{-- <input class="form-control me-2 bg-light" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button> --}}
        </div>
      </div>
    </div>
  </div>  
    <div class="row row-cols-2">
      <div class="col sticky-top d-none d-md-block" style="height:100vh;width:20%;background-color:black;">
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
            Keluar
          </div>
        </a>
        </div>
      </div>
      {{-- end navbar --}}
      {{-- Modal 2 --}}
      <div class="modal fade" id="addPhotoDetail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <form action="{{route('detailUp')}}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambahkan Foto</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body container">
              <div class="mb-3">
                <input type="hidden" name="albumId" value="{{$albumId}}">
                <label for="formFile" class="form-label">Tambahkan Foto</label>
                <input class="form-control" type="file" id="formFile" name="foto" required>
              </div>  
              <div class="mb-3">
                <label for="formDeskripsi" class="form-label">Deskripsi Foto</label>
                <textarea class="form-control" id="formDeskripsi" name="deskripsi" rows="3" required></textarea>  
              </div>            
              <label for="AlbumName">Album</label>
              <select name="albumName" class="form-select">
                  <option value="{{ $namaAlbum }}">{{$namaAlbum}} ({{ $visible }})</option>
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
      {{-- modal 3 warning untuk hapus --}}
      <div class="modal fade" id="deletePhoto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          {{-- <form action="" method="post">
          @csrf
          @method('DELETE') --}}
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Foto</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal-body">
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batal</button>
              <button type="button" class="btn btn-danger" id="okeModal" onclick="okeModal()">Oke</button>
            {{-- </form> --}}
            </div>
          </div>
        </div>
      </div>
      {{-- end modal 3 --}}
      {{-- Warn Modal --}}
      <div class="modal fade" id="warn-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Foto</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body container">
                <p>Anda sedang dalam mode edit, periksa kembali foto yang sedang anda edit. Tekan Ya akan merefresh page dan semua perubahan yang belum anda simpan akan hilang. Apakah anda yakin?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
              <button type="button" class="btn text-light bg-danger" onclick="refreshPage()">Ya</button>
            </div>
          </div>
        </div>
      </div>
      {{-- End Warn Modal --}}
      <div class="width-dinamis">
        <div class="row m-2 mt-3 ms-3">
          {{-- @for ($i = 1; $i < 240; $i++)
          <div class="container card col-2 m-1">
            <div class="card-body">Ini contoh {{$i}} </div>
          </div>
          @endfor --}}
          <button id="modalTriger" class="d-none" data-bs-toggle="modal" data-bs-target="#deletePhoto"></button>
          <button id="warn-verif" class="d-none" data-bs-toggle="modal" data-bs-target="#warn-modal"></button>
          <div class="row">
            <div class="border-bottom border-3 border-dark mb-3 pb-2 pt-2 sticky-top bg-body">
              <div class="d-flex justify-content-around justify-content-md-between align-items-center">
                <h2>{{ $namaAlbum }}</h2>
                <div class="row">
                  <i class="fas fa-times close-icon col d-none" id="closeHapus" onclick="backTrash()" style="cursor: pointer"></i>
                <label for="hapusFoto" class="col" id="lblHapusFoto">
                  <i class="fas fa-trash text-danger" style="cursor: pointer" onclick="verifEditBeforeDelete()"></i>
                  <input class="d-none" type="checkbox" id="hapusFoto" onchange="disableCkFoto()" checked>
                </label>
                <i class="fas fa-solid fa-check col d-none" id="okeHapus" style="cursor: pointer" onclick="modalDelete()"></i>
                </div>
              </div>
            </div>
            <div class="row column-gap-3">
              {{-- @foreach ($detailFoto as $a)
          <div class="container card col-2 m-1 text-center m-2">
            <a class="text-decoration-none " href="album/{{ $a['id'] }}" style="color: black">
              <div class="card-img-top mt-4"><i class="fas fa-folder" style="font-size:60px"></i></div>
            <div class="card-body container text-truncate"><div style="font-weight: bold">({{ $a['visibilitas'] }})</div> @php
              echo explode("@", $a['nama_album'])[0];
            @endphp </div>
            </a>
          </div>
          @endforeach --}}
          <div class="container">
            <div class="row">
                @foreach ($detailFoto as $a)
                <div class="col-md-4 grid-item">
                  <div class="card">
                    <label>
                    <img src="@php
                    echo asset($a['lokasi_file']);
                  @endphp" class="card-img-top" alt="...">
                    <div class="card-body" id="photoSet{{$a['id']}}">
                      <input class="ckfoto d-none" value="{{$a['id']}}" type="checkbox" name="foto[]" id="ckfoto" disabled>
                       <i class="fas fa-solid fa-edit editId" style="cursor: pointer" id="editId{{$a['id']}}" onclick="setEditField('{{$a['id']}}')"></i>
                       <i class="fas fa-times close-icon d-none" style="cursor: pointer" id="cancelEdit{{$a['id']}}" onclick="cancelEdit('{{$a['id']}}')"></i>
                       <i class="fas fa-solid fa-check d-none" style="cursor: pointer" id="okEdit{{$a['id']}}" onclick="okEdit('{{$a['id']}}')"></i>
                       <a class="text-decoration-none text-primary ms-1" href="/detail/{{$a['id']}}"><i class="fas fa-solid fa-eye"></i></a>
                       <h5 class="card-text text-truncate" id="desk{{$a['id']}}" ondblclick="setEditField('{{$a['id']}}')">{{$a['deskripsi']}}</h5>
                       <!-- Tombol, Tautan, atau elemen lainnya -->
                    </div>
                  </label>
                 </div>
              </div>
                @endforeach
            </div>
        </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    <script src="{{asset('jquery/jquery.min.js')}}"></script>
    <script>

      var editMode = false;
      var visibleCkb = false;

      function refreshPage(){
        location.reload();
      }

      function cancelEdit(id){
        var html = '<h5 class="card-text text-truncate" id="desk' + id + '">' + document.getElementById("teksEdit" + id).value + '</h5>';
        document.getElementById("teksEdit" + id).remove();
        $("#photoSet" + id).append(html);
        document.getElementById("editId" + id).classList.remove("d-none");
        document.getElementById("cancelEdit" + id).classList.add("d-none");
        document.getElementById("okEdit" + id).classList.add("d-none");
        editMode = false;
        document.getElementById("hapusFoto").disabled = false;
      }

      function okEdit(id){
        $.ajax({
          url: "{{route('editDeskripsi')}}",
          method: "POST",
          data: {
            _token: "{{csrf_token()}}",
            _method: "PUT",
            deskripsi: document.getElementById("teksEdit" + id).value,
            idFoto: id
          },
          success: function(response){
            console.log(response.idFoto);
            console.log(response.deskripsi);
            var html = '<h5 class="card-text text-truncate" id="desk' + id + '">' + document.getElementById("teksEdit" + id).value + '</h5>';
            document.getElementById("teksEdit" + id).remove();
            $("#photoSet" + id).append(html);
            document.getElementById("editId" + id).classList.remove("d-none");
            document.getElementById("cancelEdit" + id).classList.add("d-none");
            document.getElementById("okEdit" + id).classList.add("d-none");
            editMode = false;
            document.getElementById("hapusFoto").disabled = false;
          },
          error: function(xhr){
            console.log(xhr);
          }
        });
      }

      function setEditField(id){
        var deskripsi = document.getElementById("desk" + id).textContent;
        var textArea = '<textarea class="form-control" id="teksEdit' + id + '" name="deskripsiEdit" rows="3">' + deskripsi + '</textarea>';
        $("#photoSet" + id).append(textArea);
        document.getElementById("editId" + id).classList.add("d-none");
        document.getElementById("cancelEdit" + id).classList.remove("d-none");
        document.getElementById("okEdit" + id).classList.remove("d-none");
        document.getElementById("desk" + id).remove();
        editMode = true;
        document.getElementById("hapusFoto").disabled = true;
      }

      function okeModal(){
        var csrfToken = "{{csrf_token()}}";
        var fotoArray = document.querySelectorAll('input[name="foto[]"]:checked');
        var arrAy = []
        for(var i = 0; i < fotoArray.length; i++){
          arrAy.push(fotoArray[i].value);
        }
        document.getElementById("modal-body").innerHTML = '<div class="spinner-border text-primary text-center" role="status"><span class="visually-hidden">Loading...</span></div>'
        // console.log(arrAy);
         $.ajax({
           url: "{{route('deleteFoto.action', ['id_album' => $albumId])}}",
           method: "POST",
           data: {
             _token: csrfToken,
             _method: "DELETE",
             arrFoto: arrAy
           },
           success: function(response){
             console.log(response.message);
             console.log(response.foto);
             location.reload();
           },
           error: function(xhr){
            console.log(xhr);
           }
         });
      }

      function modalDelete(){
        var ckfoto = document.getElementsByClassName("ckfoto");
        var ck = document.querySelectorAll('input[name="foto[]"]:checked');
        if(ck.length < 1){
          document.getElementById("modal-body").textContent = "Pilih setidak nya satu foto untuk dihapus";
          document.getElementById("okeModal").classList.add("d-none");
          document.getElementById("modalTriger").click();
        }
        else{
          document.getElementById("modal-body").textContent = "Apakah anda yakin ingin menghapus "+ck.length+" foto";
          document.getElementById("okeModal").classList.remove("d-none");
          document.getElementById("modalTriger").click();
        }
      }
      function backTrash(){
        var ckfoto = document.getElementsByClassName("ckfoto");
            document.getElementById("closeHapus").classList.add("d-none");
            document.getElementById("okeHapus").classList.add("d-none");
            document.getElementById("lblHapusFoto").classList.remove("d-none");
            document.getElementById("hapusFoto").checked = true;
            $(".ckfoto").addClass("d-none");
            visibleCkb = false;
            disableCkFoto();
            for(var i = 0; i < ckfoto.length; i++){
            ckfoto[i].checked = false;
            console.log("cek nya false");
            }
      }

      function verifEditBeforeDelete(){
        if(editMode == true){
          document.getElementById("warn-verif").click();
          return;
        }
        visibleCkb = !visibleCkb;
        if(visibleCkb == true){
          $(".ckfoto").removeClass("d-none");
        }
        else{
          $(".ckfoto").addClass("d-none");
        }
      }

      function disableCkFoto(){
        var hapusFoto = document.getElementById("hapusFoto");
      var ckfoto = document.getElementsByClassName("ckfoto");
      if(hapusFoto.checked){
        for(var i = 0; i < ckfoto.length; i++){
            ckfoto[i].disabled = true;
            console.log("cek nya true");
        }
            document.getElementById("closeHapus").classList.add("d-none");
            $(".editId").removeClass("d-none");
            document.getElementById("okeHapus").classList.add("d-none");
          }
          else{
            for(var i = 0; i < ckfoto.length; i++){
            ckfoto[i].disabled = false;
            console.log("cek nya false");
            }
            document.getElementById("closeHapus").classList.remove("d-none");
            document.getElementById("okeHapus").classList.remove("d-none");
            $(".editId").addClass("d-none");
            document.getElementById("lblHapusFoto").classList.add("d-none");
          }
      }
    </script>
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
    <title>Beranda</title>
    <style>
        /* .grid-item {
            margin-bottom: 15px;
        }
        .grid-item img {
            width: 100%;
            height: auto;
            overflow: hidden;
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px));
            grid-gap: 10px;
        } */
        .grid-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    grid-gap: 10px;
}

.grid-item {
    position: relative;
    overflow: hidden;
}

.grid-item img {
    width: 100%;
    height: auto;
    object-fit: cover;
}

.card {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 10px;
    box-sizing: border-box;
    transition: background-color 0.3s ease;
}

.grid-item:hover .card {
    background-color: rgba(0, 0, 0, 0.9);
}

.grid-item.tall {
    grid-row: span 2; /* Menentukan bahwa elemen ini akan mengambil dua baris */
}
    </style>
</head>
<body>
    <div class="navbar navbar-expand-lg" data-bs-theme="dark" style="background-color: black">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse justify-content-end navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link active" aria-current="page" href="#home">Home</a>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Feature
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#content">Content</a></li>
                  <li><a class="dropdown-item" href="#another">Another action</a></li>
                  <li><a class="dropdown-item" href="#else">Something else here</a></li>
                </ul>
              </li>
              
              <a class="nav-link me-3" href="#pricing">Pricing</a>
            <input class="form-control me-2 bg-light" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light" type="submit">Search</button>
            </div>
          </div>
        </div>
      </div>  
      <div class="grid-container">
        <div class="grid-item">
            <img src="{{asset('album_user/tes@nata/scare_rin.png')}}" alt="Gambar 1" class="img-fluid">
            <div class="card">Deskripsi Gambar 1</div>
        </div>
        <div class="grid-item tall">
            <img src="{{asset('album_user/Wallpaper@bagas/wak_olweus.jpg')}}" alt="Gambar 2" class="img-fluid">
            <div class="card">Deskripsi Gambar 2</div>
        </div>
        <div class="grid-item">
            <img src="{{asset('album_user/Wallpaper@bagas/donat-ala-jco.jpg')}}" alt="Gambar 3" class="img-fluid">
            <div class="card">Deskripsi Gambar 3</div>
        </div>
        <div class="grid-item">
            <img src="{{asset('album_user/tes@nata/scare_rin.png')}}" alt="Gambar 1" class="img-fluid">
            <div class="card">Deskripsi Gambar 1</div>
        </div>
        <div class="grid-item tall">
            <img src="{{asset('album_user/Wallpaper@bagas/wak_olweus.jpg')}}" alt="Gambar 2" class="img-fluid">
            <div class="card">Deskripsi Gambar 2</div>
        </div>
        <div class="grid-item">
            <img src="{{asset('album_user/Wallpaper@bagas/donat-ala-jco.jpg')}}" alt="Gambar 3" class="img-fluid">
            <div class="card">Deskripsi Gambar 3</div>
        </div>
        <div class="grid-item">
            <img src="{{asset('album_user/tes@nata/scare_rin.png')}}" alt="Gambar 1" class="img-fluid">
            <div class="card">Deskripsi Gambar 1</div>
        </div>
        <div class="grid-item tall">
            <img src="{{asset('album_user/Wallpaper@bagas/wak_olweus.jpg')}}" alt="Gambar 2" class="img-fluid">
            <div class="card">Deskripsi Gambar 2</div>
        </div>
        <div class="grid-item">
            <img src="{{asset('album_user/Wallpaper@bagas/donat-ala-jco.jpg')}}" alt="Gambar 3" class="img-fluid">
            <div class="card">Deskripsi Gambar 3</div>
        </div>
        <div class="grid-item">
            <img src="{{asset('album_user/tes@nata/scare_rin.png')}}" alt="Gambar 1" class="img-fluid">
            <div class="card">Deskripsi Gambar 1</div>
        </div>
        <div class="grid-item tall">
            <img src="{{asset('album_user/Wallpaper@bagas/wak_olweus.jpg')}}" alt="Gambar 2" class="img-fluid">
            <div class="card">Deskripsi Gambar 2</div>
        </div>
        <div class="grid-item">
            <img src="{{asset('album_user/Wallpaper@bagas/donat-ala-jco.jpg')}}" alt="Gambar 3" class="img-fluid">
            <div class="card">Deskripsi Gambar 3</div>
        </div>
        <!-- ... dan seterusnya -->
    </div>
<script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
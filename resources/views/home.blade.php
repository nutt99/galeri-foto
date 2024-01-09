<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <title>Beranda</title>
    <style>
      .k :hover{
        background-color: rgb(156, 156, 156);
      }
    </style>
</head>
<body>
  {{-- navbar --}}
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
          <form class="d-flex" role="search">
        <input class="form-control me-2 bg-light" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
        </div>
      </div>
    </div>
  </div>  
    <div class="row row-cols-2">
      <div class="col sticky-top" style="height:100vh;width:20%;background-color:black;">
        <ul class="pt-5">
            <a class="text-decoration-none k" href="#">
              <li class="list-group-item d-flex justify-content-between align-items-center text-light mb-3">
              Beranda
              <span class="badge bg-primary rounded-pill me-4">14</span>
            </li>
            </a>
          <a href="#" class="text-decoration-none k">
          <li class="list-group-item d-flex justify-content-between align-items-center text-light mb-3">
            Album
            <span class="badge bg-primary rounded-pill me-4">2</span>
          </li>
        </a>
        <a href="#" class="text-decoration-none k">
          <li class="list-group-item d-flex justify-content-between align-items-center text-light mb-3">
            Profil
            <span class="badge bg-primary rounded-pill me-4">1</span>
          </li>
        </a>
        </ul>
      </div>
      {{-- end navbar --}}
      <div style="width:80%">
        <div class="row row-cols-2 m-2 mt-3 ms-3">
          @for ($i = 1; $i < 240; $i++)
          <div class="container card col-2 m-1">
            <div class="card-body">Ini contoh {{$i}} </div>
          </div>
          @endfor
        </div>
      </div>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
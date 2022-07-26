<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light navbar-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="images/logo_usu.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
            Universitas Sumatera Utara
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav" style="margin-left: 600px;">
              <a class="nav-link" href="#">Beranda</a>
              <a class="nav-link" href="#">Tentang Pemilu</a>
              <a class="nav-link" href="#">Calon Legislatif</a>
              <a class="btn btn-primary ms-2" href="#" role="button">Masuk</a>
            </div>
          </div>
        </div>
      </nav>
      <div class="container mt-4">
        @yield('content')
      </div>
</body>
</html>
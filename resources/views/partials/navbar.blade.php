<nav class="navbar sticky-top navbar-expand-lg bg-light navbar-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="/images/logo_usu.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
        Universitas Sumatera Utara
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto" >
          <a class="nav-link" href="/">Beranda</a>
          <a class="nav-link" href="#">Rekomendasi Caleg</a>
          <a class="nav-link" href="/caleg">Calon Legislatif</a>
          @auth
            <li class="nav-item dropdown me-3 fw-bold">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Halo, {{ auth()->user()->nama }}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/addcaleg"><i class="bi bi-person-badge-fill me-1"></i>Tambah Caleg</a></li>
                <li><a class="dropdown-item" href="#"><i class="bi bi-card-heading me-1"></i>Tambah Partai</a></li>
                <li><a class="dropdown-item" href="#"><i class="bi bi-boxes me-1"></i>Bobot</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right me-1"></i>Keluar</button>
                  </form>
                </li>
              </ul>
            </li>
          @else
            <a class="btn btn-success ms-2" href="/masuk" role="button"><i class="bi bi-box-arrow-in-right me-2"></i>Masuk</a>
          @endauth
        </div>
      </div>
    </div>
  </nav>
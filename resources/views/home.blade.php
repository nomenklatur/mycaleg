@extends('layout.base_layout')

@section('content')
    <section class="custom-section" id="title" style="height: 550px">
        <div class="container d-flex flex-row mt-4 p-4">
            <div class="container">
                <img src="images/logo.png" alt="Logo Usu" class="img-fluid" width="400px">
            </div>
            <div class="container text-center">
                <h3>Sistem Pendukung Keputusan Pemilihan DPRD Kota Tebing Tinggi Menggunakan Metode SAW dan Naive Bayes Classifier</h3>
                <br>
                <h5>Dimas Eka Putra</h5>
                <h6>181401135</h6>
                <br>
                <h4>Program Studi S-1 Ilmu Komputer</h4>
                <h4>Fakultas Ilmu Komputer dan Teknologi Informasi</h4>
                <h4>Universitas Sumatera Utara</h4>
            </div>
        </div>
    </section>
    <section class="custom-section text-center mt-4" id="about">
                <h1>Pemilihan Umum</h1>
                <div class="container-fluid d-flex">
                    <div class="container">
                        <img src="images/pemilu.png" alt="" class="img-fluid">
                    </div>
                    <div class="container mt-4">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam cum similique aperiam aliquam suscipit laboriosam et sint molestiae harum, modi reprehenderit, sit, perferendis animi sunt sed ut recusandae repudiandae totam nesciunt. Culpa quod fugiat iste ut hic tempore cupiditate nobis! Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae explicabo minus quidem nemo provident. Laborum saepe nobis autem doloremque iusto reprehenderit laudantium, repudiandae, rem obcaecati maxime sunt quia consequuntur ullam.</p>
                    </div>
                </div>
                <div class="container mt-3">
                    <h5>Syarat Pemilihan</h5>
                    <p>Dikutip dari situs <a href="https://aptika.kominfo.go.id/2019/04/kenali-syarat-dan-kategori-pemilih-dalam-pemilu-2019/">Aptika Kominfo</a>, berikut merupakan syarat pemilih dalam pemilu.</p>
                    <div class="d-flex flex-row mx-auto">
                        <div class="card shadow m-3 custom-effect" style="width: 10rem;">
                            <img src="images/1.png" class="card-img-top" alt="...">
                            <div class="card-body">
                              <p class="card-text">Merupakan warga negara Indonesia.</p>
                            </div>
                        </div>
                        <div class="card shadow m-3 custom-effect" style="width: 10rem;">
                            <img src="images/2.png" class="card-img-top" alt="...">
                            <div class="card-body">
                              <p class="card-text">Terdaftar dalam Daftar Pemilih Tetap (DPT).</p>
                            </div>
                        </div>
                        <div class="card shadow m-3 custom-effect" style="width: 10rem;">
                            <img src="images/3.png" class="card-img-top" alt="...">
                            <div class="card-body p-1">
                              <p class="card-text">Berusia 17 Tahun atau lebih.</p>
                            </div>
                        </div>
                        <div class="card shadow m-3 custom-effect" style="width: 10rem;">
                            <img src="images/4.png" class="card-img-top" alt="...">
                            <div class="card-body">
                              <p class="card-text">Bukan anggota TNI/Polri.</p>
                            </div>
                        </div>
                        <div class="card shadow m-3 custom-effect" style="width: 10rem;">
                            <img src="images/5.png" class="card-img-top" alt="...">
                            <div class="card-body">
                              <p class="card-text">Tidak terganggu kejiwaan dan ingatannya.</p>
                            </div>
                        </div>
                        <div class="card shadow m-3 custom-effect" style="width: 10rem;">
                            <img src="images/6.png" class="card-img-top" alt="...">
                            <div class="card-body">
                              <p class="card-text">Tidak sedang dicabut hak pilihnya.</p>
                            </div>
                        </div>
                    </div>
                </div>
            
    </section>
    <section id="main" class="custom-section text-center mt-5 mb-5">
        <h1>Calon Legislatif Anggota DPRD Kota Tebing Tinggi</h1>
        <p>Pilih daerah pemilihan kamu</p>
        <div class="container mt-3">
            <div class="d-flex mx-auto">
                <div class="card bg-dark text-white me-2">
                    <img src="/images/dapil/1.png" class="card-img" alt="...">
                    <div class="card-img-overlay d-flex align-items-center p-1">
                      <p class="card-title text-center flex-fill p-4" style="background-color: rgba(0,0,0,0.7)"><a class="text-decoration-none text-light" href="/caleg/1">Kec. Padang Hilir dan Tebing Tinggi Kota</a></p>
                    </div>
                  </div>
                  <div class="card bg-dark text-white me-2">
                    <img src="/images/dapil/2.png" class="card-img" alt="...">
                    <div class="card-img-overlay d-flex align-items-center p-1">
                      <p class="card-title text-center flex-fill p-4" style="background-color: rgba(0,0,0,0.7)"><a class="text-decoration-none text-light" href="">Kec. Padang Hulu dan Bajenis</a></p>
                    </div>
                  </div>
                  <div class="card bg-dark text-white me-2">
                    <img src="/images/dapil/3.png" class="card-img" alt="...">
                    <div class="card-img-overlay d-flex align-items-center p-1">
                      <p class="card-title text-center flex-fill p-4" style="background-color: rgba(0,0,0,0.7)"><a class="text-decoration-none text-light" href="">Kec. Rambutan</a></p>
                    </div>
                  </div>
            </div>
        </div>
    </section>
    
@endsection

<?php 
include 'koneksi.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TANITANI WEBSITE</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-reboot.css">
    <link rel="stylesheet" href="bootstrap/style.css">
    <link rel="shortcut icon" href="asset/logo.ico">
</head>
<body>
    <div class="navbar navbar-dark bg-primary navbar-expand expand-lg">
        <a href="#" class="navbar-brand">
            <img src="asset/logo.PNG" alt="" height="50px" width="50px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="index.php" style="margin: 0;">Beranda <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#tanitani">Tentang</a>
              </li>
              <?php if(isset($_SESSION['terdaftar'])){ ?>
              <li class="nav-item">
                <a class="nav-link" href="daftar-pesanan.php">Daftar Pesanan</a>
              </li>
              <?php } ?>
            </ul>
            <ul class="navbar-nav" style="margin-left: 60%">
              <?php if (isset($_SESSION['pelanggan'])) {
                $perintah=$koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_SESSION[pelanggan]'");
                $baris=$perintah->fetch_assoc();?>
                  <li class="nav-item">
                    <img src="foto_profil/<?php echo $baris['foto_profil'] ?>" class="foto-profile" alt="">
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle btn btn-primary" href="#" id="navbarDropdownMenuLink" 
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
                      <h6><?php echo $baris['nama_pelanggan'] ?></h6>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" style="padding: 15px; padding-bottom: 10px;">
                        <a href="Logout.php" class="dropdown-item">Logout</a>
                      </div>
                  </li>
              <?php
              } elseif (isset($_SESSION['petani'])) {
                $perintah=$koneksi->query("SELECT * FROM petani WHERE id_petani='$_SESSION[petani]'");
                $baris=$perintah->fetch_assoc();?>
                <li class="nav-item">
                  <img src="foto_profil/<?php echo $baris['foto_profil'] ?>" class="foto-profile" alt="">
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle btn btn-primary" href="#" id="navbarDropdownMenuLink" 
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
                    <h6><?php echo $baris['nama_petani'] ?></h6>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" style="padding: 15px; padding-bottom: 10px;">
                      <a href="penyakit.php" class="dropdown-item">Identifikasi Penyakit Tanaman</a>
                      <a href="Logout.php" class="dropdown-item">Logout</a>
                    </div>
                </li>
              <?php 
              }else{?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle btn btn-success" href="#" id="navbarDropdownMenuLink" 
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white; width: 80px;">
                  Masuk
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" style="padding: 15px; padding-bottom: 10px;">
                      <form class="form-horizontal" action="login.php" method="post" accept-charset="UTF-8">
                          <input class="form-control login" type="text" name="user" placeholder="Masukan Email Anda"><br>
                          <input class="form-control login" type="password" name="password" placeholder="Masukan Password Anda"><br>
                          <input class="btn btn-primary" type="submit" name="Masuk" value="Masuk">
                      </form>
                  </div>
              </li>
              <li class="nav-item">
                <a href="daftar.html" class="nav-link" style="color: white; margin-left: 20px;">Daftar</a>
              </li>
            <?php } ?>
            </ul>
          </div>
    </div>
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner foto-atas">
        <div class="carousel-item active">
          <div class="container">
            <div class="sampul">
              <h1>TANITANI</h1>
              <h3>Temukan Petani dan Mulai Tanam Tanaman yang Anda inginkan</h3>
              <a href="#tanitani" class="btn btn-primary">Pelajari Lebih Lanjut</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="container">
      <h2>Rekomendasi Tanaman Pertanian</h2><br>
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner konten-bawah">
          <div class="carousel-item active">
            <div class="row">
              <div class="col-md-6">
                <img class="d-block w-100 konten-bawah" src="asset/padi.jpg" alt="Padi">
              </div>
              <div class="col-md-6">
                <h3>PADI</h3>
                <h5>
                  Padi merupakan salah satu tanaman pertanian yang banyak dicari di Indonesia.
                  padi merupakan bahan dasar pembuatan beras, dimana beras merupakan bahan dasar nasi,
                  salah satu makanan pokok di Indonesia.
                </h5>
                <h4>
                  Harga per kg saat ini:
                </h4>
                <h5>
                  Rp.4000 - Rp.5000
                </h5><br>
                <?php if(isset($_SESSION['pelanggan'])){
                echo "<a href='buat-pesanan.php' class='btn btn-success'>Tanam Sekarang</a>";
                }elseif(isset($_SESSION['petani'])){
                echo "<a href='pilih-pesanan.php' class='btn btn-success'>Tanam Sekarang</a>";
                }else{
                echo "<a href='daftar.html' class='btn btn-success'>Tanam Sekarang</a>";
                } ?>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-md-6">
                <img class="d-block w-100 konten-bawah" src="asset/bawang.jpg" alt="Terong">
              </div>
              <div class="col-md-6">
                <h3>BAWANG MERAH</h3>
                <h5>
                  Bawang merupakan sayuran yang tidak dapat dilepaskan dari segala jenis olahan nusantara.
                  Sama seperti cabai, bawang juga sering digunakan sebagai bumbu dan rempah.
                  Kehadiran bawang pada masakan selalu memberi aroma yang sedap dan menggoda selera makan kita.
                </h5>
                <h4>
                  Harga per kg saat ini:
                </h4>
                <h5>
                  Rp. 40.000
                </h5><br>
                <?php if(isset($_SESSION['pelanggan'])){
                echo "<a href='buat-pesanan.php' class='btn btn-success'>Tanam Sekarang</a>";
                }elseif(isset($_SESSION['petani'])){
                echo "<a href='pilih-pesanan.php' class='btn btn-success'>Tanam Sekarang</a>";
                }else{
                echo "<a href='daftar.html' class='btn btn-success'>Tanam Sekarang</a>";
                } ?>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-md-6">
                <img class="d-block w-100 konten-bawah" src="asset/cabai.jpg" alt="Cabai">
              </div>
              <div class="col-md-6">
                <h3>CABAI MERAH</h3>
                <h5>
                  Cabai merupakan sayuran yang sangat terkenal, terutama dikalangan masyarakat Indonesia.
                  Cabai disenangi karena memberikan sensasi pedas yang sangat terasa. Cabai juga sering digunakan
                  sebagai bumbu dari suatu masakan, terutama dalam pembuatan sambal.
                </h5>
                <h4>
                  Harga per kg saat ini:
                </h4>
                <h5>
                  Rp. 39.800
                </h5><br>
                <?php if(isset($_SESSION['pelanggan'])){
                echo "<a href='buat-pesanan.php' class='btn btn-success'>Pesan Sekarang</a>";
                }elseif(isset($_SESSION['petani'])){
                echo "<a href='pilih-pesanan.php' class='btn btn-success'>Tanam Sekarang</a>";
                }else{
                echo "<a href='daftar.html' class='btn btn-success'>Tanam Sekarang</a>";
                } ?>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div><br><br>
      <span id="tanitani"></span>
      <h2>Apa itu TANITANI?</h2><br>
      <div class="row">
        <div class="col-md-8">
          <h5>
            <b>TANITANI</b> merupakan website yang dibuat untuk meringankan beban petani, dan juga membantu para 
            penjual untuk mendapatkan sayur dan buah-buahan yang masih segar. Website ini menghubungkan antara 
            penjual dan petani, sehingga terjadi hubungan yang saling menguntungkan antara penjual dan petani.
          </h5><br>
          <?php if (!isset($_SESSION['terdaftar'])) {
          ?>
          <a href="daftar-petani.php" class="btn btn-success">Daftar sebagai Petani</a>
          <a href="daftar-pelanggan.php" class="btn btn-primary">Daftar sebagai Pelanggan</a>
          <?php 
          }else{
            if(isset($_SESSION['pelanggan'])){
            echo "<a href='buat-pesanan.php' class='btn btn-success'>Ayo memesan!</a>";
            }elseif(isset($_SESSION['petani'])){
              ?>
            <a href='pilih-pesanan.php' class='btn btn-success'>Ayo menanam!</a>
            <a href='penyakit.php' class='btn btn-warning'>Tanaman anda sakit?</a>
          <?php
            }
          } ?>
        </div>
        <div class="col-md-4">
          <img src="asset/logo.PNG" width="400px" height="250px" alt="LOGO KITA GAES">
        </div>
      </div>
    </div>
    <footer>
      <div class="footer">
        <div class="container">
          <div class="row">
            <div class="col-md-4 offset-md-4" style="margin-top:10px">
              <h3 class="text-center">
              <b>TaniTani Team
              </h3>
            </div>
          </div>
        </div>
      </div>
    </footer>
</body>
    <!--JavaScript-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</html>
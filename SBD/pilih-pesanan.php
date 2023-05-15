<?php 
include 'koneksi.php';
session_start();
$id=$_SESSION['petani'];
$perintah= $koneksi->query("SELECT * FROM petani WHERE id_petani='$id'");
$baris= $perintah->fetch_assoc();
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
            <img src="asset/logo.PNG" alt="" height="40px" width="40px">
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
                <a class="nav-link" href="index.php#tanitani">Tentang</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="daftar-pesanan.php">Daftar Pesanan</a>
              </li>
            </ul>
            <ul class="navbar-nav" style="margin-left: 60%">
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
            </ul>
          </div>
    </div>
    <?php 
    $perintah= $koneksi->query("SELECT * FROM pesanan JOIN tanaman ON pesanan.id_tanaman=tanaman.id_tanaman");
    $perintah1= $koneksi->query("SELECT * FROM daftar_tempattanam WHERE id_petani='$id'");
    $count=$perintah1->num_rows;
    $coba;
        while ($baris1= $perintah1->fetch_assoc()) {
        $coba[] = $baris1['id_tempattanam'];
        }
    ?>
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
       <div class="carousel-inner foto-atas">
        <div class="carousel-item active">
          <div class="container">
            <div class="sampul">
              <h1>TANITANI</h1>
              <h3>Temukan Petani dan Mulai Tanam Tanaman yang Anda inginkan</h3>
              <a href="#pilih-pesanan" class="btn btn-primary">Cari Pesanan</a>
            </div>
          </div>
        </div>
      </div>x
    </div>
    <br>
    <div class="container">
        <span id="pilih-pesanan"></span>
        <h2>Pilih Pesanan</h2>
        <?php
        $ada=0;
        while ($baris= $perintah->fetch_assoc()) {
            for ($i=0; $i<$count; $i++) {
                if ($coba[$i]==$baris['id_tempattanam'] AND $baris['status']=='Belum') {
                $ada=1;
                $perintah1= $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$baris[id_pelanggan]'");
                $baris1= $perintah1->fetch_assoc();
        ?>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="asset/<?php echo $baris['foto_tanaman']; ?>" class="gambar-tanaman" alt="">
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-4"><h5>Nama Pelanggan</h5>
                            </div>
                            <div class="col-md-1"><h5>:</h5></div>
                            <div class="col-md-7"><h5><?php echo $baris1['nama_pelanggan']; ?></h5></div><br> <br>
                            <div class="col-md-4"><h5>Komoditas Pesanan</h5>
                            </div>
                            <div class="col-md-1"><h5>:</h5></div>
                            <div class="col-md-7"><h5><?php echo $baris['nama_tanaman']; ?></h5></div><br><br>
                            <div class="col-md-4"><h5>Jumlah Bibit</h5>
                            </div>
                            <div class="col-md-1"><h5>:</h5></div>
                            <div class="col-md-7"><h5><?php echo $baris['banyak_bibit']; ?></h5></div><br><br>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="detail-pesanan.php?pesan=<?php echo $baris['id_pesanan']; ?>" class="btn btn-info btn-block"><h5>Detail Pesanan</h5></a>
                            </div>
                            <div class="col-md-6">
                                <a href="ambil.php?pesan=<?php echo $baris['id_pesanan']; ?>" class="btn btn-success btn-block"><h5>Ambil Pesanan</h5></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php     
                }
            }
        }
        if ($ada==0) {
            echo "<div style='margin-left: 50%'><h4>Tidak ada pesanan</h4></div>";
        }
        ?>
    </div><br><br>
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
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
              <li class="nav-item">
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
    </div><br>
    <?php 
    $perintah= $koneksi->query("SELECT * FROM pesanan WHERE id_pesanan='$_GET[pesan]'");
    $baris= $perintah->fetch_assoc();
    $perintah1= $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$baris[id_pelanggan]'");
    $baris1= $perintah1->fetch_assoc();
    $perintah2= $koneksi->query("SELECT * FROM tanaman WHERE id_tanaman='$baris[id_tanaman]'");
    $baris2= $perintah2->fetch_assoc();
    $perawatan=1000000*$baris2['lama_tumbuh'];
    ?>
    <div class="container">
        <h2 class="text-center">Detail Pesanan</h2>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4"><h5>Nama Pelanggan</h5></div>
                    <div class="col-md-1"><h5>:</h5></div>
                    <div class="col-md-6"><h5><?php echo $baris1['nama_pelanggan']; ?></h5></div><br><br>
                    <div class="col-md-4"><h5>Alamat</h5></div>
                    <div class="col-md-1"><h5>:</h5></div>
                    <div class="col-md-6"><h5><?php echo $baris1['alamat']; ?></h5></div><br><br>
                    <div class="col-md-4"><h5>Komoditas Pesanan</h5></div>
                    <div class="col-md-1"><h5>:</h5></div>
                    <div class="col-md-6"><h5><?php echo $baris2['nama_tanaman']; ?></h5></div><br><br>
                    <div class="col-md-4"><h5>Jumlah bibit</h5></div>
                    <div class="col-md-1"><h5>:</h5></div>
                    <div class="col-md-6"><h5><?php echo $baris['banyak_bibit']; ?></h5></div><br><br>
                    <div class="col-md-4"><h5>Harga Pasar</h5></div>
                    <div class="col-md-1"><h5>:</h5></div>
                    <div class="col-md-6"><h5><?php echo $baris2['harga_pasar']; ?> Rupiah</h5></div><br><br>
                    <div class="col-md-4"><h5>Lama Perawatan</h5></div>
                    <div class="col-md-1"><h5>:</h5></div>
                    <div class="col-md-6"><h5><?php echo $baris2['lama_tumbuh']; ?> Bulan</h5></div><br><br>
                    <div class="col-md-4"><h5>Biaya Perawatan (per bulan)</h5></div>
                    <div class="col-md-1"><h5>:</h5></div>
                    <div class="col-md-6"><h5>1000000 Rupiah</h5></div><br><br>
                    <div class="col-md-4"><h5>Biaya Perawatan (total)</h5></div>
                    <div class="col-md-1"><h5>:</h5></div>
                    <div class="col-md-6"><h5><?php echo $perawatan; ?> Rupiah</h5></div><br><br>
                    <div class="col-md-4"><h5>Total Biaya</h5></div>
                    <div class="col-md-1"><h5>:</h5></div>
                    <div class="col-md-6"><h5><?php echo $baris['total_harga']; ?> Rupiah</h5></div><br><br>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <a href="pilih-pesanan.php" class="btn btn-danger btn-block"><h5>Batal</h5></a>
                    </div>
                    <div class="col-md-6">
                        <a href="ambil.php?pesan=<?php echo $_GET['pesan'] ?>" class="btn btn-success btn-block"><h5>Konfirmasi Pesanan</h5></a>
                    </div>
                </div>
            </div>
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
    <!--JavaScript-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
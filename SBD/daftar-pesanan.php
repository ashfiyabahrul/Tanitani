<?php 
include 'koneksi.php';
session_start();
$jumlahbiaya=0;
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
              <li class="nav-item active">
                <a class="nav-link" href="daftar-pesanan.php">Daftar Pesanan</a>
              </li>
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
              }else{
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
            <?php } ?>
            </ul>
          </div>
    </div>
    <div class="container">
        <br><h2 class="text-center">Daftar Pesanan</h2><br>
        <?php if (isset($_SESSION['pelanggan'])){
            $id=$_SESSION['pelanggan']; 
            $no=1;
        ?>
        <div class="card">
            <div class="card-body">
                <table style="text-align: center" class="table table-bordered">
                    <thead style="background-color: skyblue;" class="text-center">
                        <th>No</th>
                        <th>Nama Komoditas</th>
                        <th>Lama Perawatan</th>
                        <th>Banyak Bibit Dipesan</th>
                        <th>Harga per Bibit (Rp)</th>
                        <th>Biaya Perawatan per Bulan (Rp)</th>
                        <th>Total Biaya Pesanan (Rp)</th>
                        <th>Status Pesanan</th>
                    </thead>
                    <tbody class="text-center">
                    <?php 
                        $perintah= $koneksi->query("SELECT * FROM pesanan WHERE id_pelanggan='$id'");
                        while($baris= $perintah->fetch_assoc()){
                        $perintah1= $koneksi->query("SELECT * FROM tanaman WHERE id_tanaman='$baris[id_tanaman]'");
                        $baris1= $perintah1->fetch_assoc();
                        $perintah2= $koneksi->query("SELECT * FROM petani WHERE id_petani='$baris[id_petani]'");
                        $baris2= $perintah2->fetch_assoc();
                        $jumlahbiaya=$jumlahbiaya+$baris['total_harga'];
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $baris1['nama_tanaman']; ?></td>
                            <td><?php echo $baris1['lama_tumbuh']; ?></td>
                            <td><?php echo $baris['banyak_bibit']; ?></td>
                            <td><?php echo number_format($baris1['harga_pasar']); ?></td>
                            <td><?php echo number_format(1000000); ?></td>
                            <td><?php echo number_format($baris['total_harga']); ?></td>
                            <?php if ($baris['status']=="Belum") { ?>
                            <td>
                                <i>Pesanan belum diambil</i>
                                <a href="batal.php?id=<?php echo $baris['id_pesanan']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin membatalkan pesanan?')">Batalkan</a>
                            </td>
                            <?php }elseif($baris['status']=='Menunggu') { ?>
                            <td><?php echo "Pesanan telah diambil oleh Bapak / Ibu ",$baris2['nama_petani'],"<br><i><b>Menunggu Pembayaran</i>"; ?></td>
                            <?php }elseif($baris['status']=='Sudah') { ?>
                            <td>
                                <?php echo "Pesanan telah diambil oleh Bapak / Ibu ",$baris2['nama_petani'],"<br>"; ?>
                                <a href="web-start/public/index.html" class="btn btn-success">Chat Petani</a>
                                <a href="https://api.whatsapp.com/send?phone=<?php echo $baris2['no_hp'] ?>" class="btn btn-info">Chat Petani</a>
                            </td>
                            <?php }elseif($baris['status']=='Panen'){ ?>
                            <td>
                                <?php echo "<i>Komoditas yang dipesan sedang dipanen</i><br>"; ?>
                                <a href="web-start/public/index.html" class="btn btn-success">Chat Petani</a>
                                <a href="https://api.whatsapp.com/send?phone=<?php echo $baris2['no_hp'] ?>" class="btn btn-info">Chat Petani</a>
                            </td>
                            <?php }elseif($baris['status']=='Kirim'){ ?>
                            <td>
                                <?php echo "<i>Komoditas sedang dalam pengiriman</i><br>"; ?>
                                <a href="web-start/public/index.html" class="btn btn-success">Chat Petani</a>
                                <a href="https://api.whatsapp.com/send?phone=<?php echo $baris2['no_hp'] ?>" class="btn btn-info">Chat Petani</a>
                                <a href="ubah.php?id=<?php echo $baris['id_pesanan']; ?>&ubah=Selesai" class="btn btn-primary">Terima</a>
                            </td>
                            <?php }else{ ?>
                            <td>
                                <?php echo "<i>Pesanan Selesai</i>"; ?>
                                <a href="web-start/public/index.html" class="btn btn-success">Chat Petani</a>
                                <a href="https://api.whatsapp.com/send?phone=<?php echo $baris2['no_hp'] ?>" class="btn btn-info">Chat Petani</a>
                            </td>
                            <?php } ?>
                        </tr>
                    <?php $no++; } ?>
                        <tr>
                            <td colspan="6"><h4>Jumlah</h4></td>
                            <td colspan="2"><h4><?php echo number_format($jumlahbiaya); ?></h4></td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-center" style="">
                    <a href="buat-pesanan.php" class="btn btn-primary"><h5>Tambah Pesanan</h5></a>
                </div>
            </div>
        </div>
        <?php }elseif (isset($_SESSION['petani'])){
            $id=$_SESSION['petani']; 
            $no=1;
        ?>
        <div class="card">
            <div class="card-body">
                <table style="text-align: center" class="table table-bordered">
                    <thead style="background-color: skyblue;" class="text-center">
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Nama Komoditas</th>
                        <th>Lama Perawatan</th>
                        <th>Banyak Bibit Dipesan</th>
                        <th>Harga per Bibit (Rp)</th>
                        <th>Biaya Perawatan per Bulan (Rp)</th>
                        <th>Total Pesanan (Rp)</th>
                        <th>Status Pesanan</th>
                    </thead>
                    <tbody class="text-center">
                    <?php 
                        $perintah= $koneksi->query("SELECT * FROM pesanan WHERE id_petani='$id'");
                        while($baris= $perintah->fetch_assoc()){
                        $perintah1= $koneksi->query("SELECT * FROM tanaman WHERE id_tanaman='$baris[id_tanaman]'");
                        $baris1= $perintah1->fetch_assoc();
                        $perintah2= $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$baris[id_pelanggan]'");
                        $baris2= $perintah2->fetch_assoc();
                        $jumlahbiaya=$jumlahbiaya+$baris['total_harga'];
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $baris2['nama_pelanggan']; ?></td>
                            <td><?php echo $baris1['nama_tanaman']; ?></td>
                            <td><?php echo $baris1['lama_tumbuh']; ?></td>
                            <td><?php echo $baris['banyak_bibit']; ?></td>
                            <td><?php echo number_format($baris1['harga_pasar']); ?></td>
                            <td><?php echo number_format(1000000); ?></td>
                            <td><?php echo number_format($baris['total_harga']); ?></td>
                            <?php if($baris['status']=='Menunggu') { ?>
                            <td>
                                <?php echo "<i><b>Menunggu Pembayaran</i>"; ?>
                                <a href="batal.php?id=<?php echo $baris['id_pesanan']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin membatalkan pengambilan pesanan?')">Batalkan</a>
                            </td>
                            <?php }elseif($baris['status']=='Sudah'){ ?>
                            <td>
                                <?php echo "<i>Pembayaran telah dilakukan</i><br>"; ?>
                                <a href="web-start/public/index.html" class="btn btn-success">Chat Pelanggan</a>
                                <a href="https://api.whatsapp.com/send?phone=<?php echo $baris2['no_hp'] ?>" class="btn btn-info">Chat</a>
                                <a href="ubah.php?id=<?php echo $baris['id_pesanan']; ?>&ubah=Panen" class="btn btn-warning">Panen</a>
                            </td>
                            <?php }elseif($baris['status']=='Panen'){ ?>
                            <td>
                                <?php echo "<i>Silahkan Lakukan Pengiriman</i><br>"; ?>
                                <a href="web-start/public/index.html" class="btn btn-success">Chat Pelanggan</a>
                                <a href="https://api.whatsapp.com/send?phone=<?php echo $baris2['no_hp'] ?>" class="btn btn-info">Chat</a>
                                <a href="ubah.php?id=<?php echo $baris['id_pesanan']; ?>&ubah=Kirim" class="btn btn-primary">Kirim</a>
                            </td>
                            <?php }elseif($baris['status']=='Kirim'){ ?>
                            <td>
                                <?php echo "<i><b>Dalam Pengiriman</b></i><br>Setelah barang diterima, pembayaran akan langsung dikirim ke rekening anda"; ?>
                                <a href="web-start/public/index.html" class="btn btn-success">Chat Pelanggan</a>
                                <a href="https://api.whatsapp.com/send?phone=<?php echo $baris2['no_hp'] ?>" class="btn btn-info">Chat Pelanggan</a>
                            </td>
                            <?php }else{ ?>
                            <td>
                                <?php echo "<i>Pesanan Selesai</i>"; ?>
                                <a href="web-start/public/index.html" class="btn btn-success">Chat Pelanggan</a>
                                <a href="https://api.whatsapp.com/send?phone=<?php echo $baris2['no_hp'] ?>" class="btn btn-info">Chat Pelanggan</a>
                            </td>
                            <?php } ?>
                        </tr>
                    <?php $no++; } ?>
                        <tr>
                            <td colspan="6"><h4>Jumlah</h4></td>
                            <td colspan="2"><h4><?php echo number_format($jumlahbiaya); ?></h4></td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-center" style="">
                    <a href="pilih-pesanan.php" class="btn btn-primary"><h5>Pilih Pesanan</h5></a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div><br><br>
    <footer>
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
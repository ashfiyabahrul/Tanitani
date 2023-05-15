<?php 
include 'koneksi.php';
session_start();
$id=$_SESSION['pelanggan'];
$perintah=$koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$id'");
$baris=$perintah->fetch_assoc();
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
                  <h6><?php echo $baris['nama_pelanggan'] ?></h6>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" style="padding: 15px; padding-bottom: 10px;">
                    <a href="Logout.php" class="dropdown-item">Logout</a>
                  </div>
              </li>
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
              <a href="#buat-pesanan" class="btn btn-primary">Mulai Memesan</a>
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
              </div>
            </div>
          </div>
        </div><br><br>
    <?php 
        $perintah=$koneksi->query("SELECT * FROM tanaman");
    ?>
    <div class="container">
      <span id="buat-pesanan"></span>
        <h2><b>Buat Pesanan</b></h2>
        <div class="input-group" id="ganti">
            <select class="custom-select" id="komoditas">
              <option selected>Pilih Komoditas yang Ingin Ditanam...</option>
              <?php while($baris= $perintah->fetch_assoc()){ ?>
              <?php echo "<option value=",$baris['id_tanaman'],">",$baris['nama_tanaman'],"</option>";
              } ?>
            </select>
        </div>
        <div id="baru"></div>
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

<script type="text/javascript">

$( "select" ).change(function () {
  var komo = "";
  $("select option:selected").each(function() {
    komo += $( this ).val();
    console.log(komo);
        });
    var html = '';
  <?php 
  $perintah=$koneksi->query("SELECT * FROM tanaman");
  while($baris= $perintah->fetch_assoc()){ ?>
  if (komo == <?php echo $baris['id_tanaman'] ?>){
  html += '<div class="row">';
  html += '<div class="col-md-4">';
  html += '<img src="asset/<?php echo $baris['foto_tanaman'] ?>" alt="" class="gambar-tanaman">';
  html += '</div>';
  html += '<div class="col-md-8">';
  html += '<form method="post" action="">';
  html += '<div class="form-group">';
  html += '<label for=""><h5>Nama Komoditas</h5></label>';
  html += '<input type="text" name="komoditas" class="form-control" value="<?php echo $baris['nama_tanaman'] ?>" readonly>';
  html += '</div>';
  html += '<div class="form-group">';
  html += '<label for=""><h5>Lama Tumbuh</h5></label>';
  html += '<input type="text" name="tumbuh" class="form-control" value="<?php echo $baris['lama_tumbuh'] ?> Bulan" readonly>';
  html += '</div>';
  html += '<div class="form-group">';
  html += '<label for=""><h5>Harga Bibit per satuan</h5></label>';
  html += '<input type="text" name="bibit" class="form-control" id="harga" value="<?php echo $baris['harga_pasar'] ?> Rupiah" readonly>';
  html += '</div>';
  html += '<div class="form-group">';
  html += '<label for=""><h5>Banyak Bibit yang Dipesan</h5></label>';
  html += '<input type="number" name ="pesanan" class="form-control" id="pesanan" placeholder="Jumlah Pesanan">';
  html += '</div>';
  html += '<div class="form-group">';
  html += '<div class="form-group">';
  html += '<input type="submit" name="konfirmasi" class="form-control btn btn-success" value="Konfirmasi Pesanan">';
  html += '</div>';
  html += '</div>';
  html += '</div>';
  }
<?php } ?>

  $('#baru').html(html);
})
.change();
</script>

</html>

<?php 
if(isset($_POST['konfirmasi'])){
  if($_POST['pesanan'] == 0){
    echo "<script>alert('Anda harus mengisi kolom banyak pesanan')</script>";
    echo "<script>document.getElementById('pesanan').focus();</script>";
  }else{
    $perintah=$koneksi->query("SELECT * FROM tanaman WHERE nama_tanaman='$_POST[komoditas]'");
    $baris= $perintah->fetch_assoc();
    $total=1000000*$baris['lama_tumbuh']+$baris['harga_pasar']*$_POST['pesanan'];
    $koneksi->query("INSERT INTO pesanan(id_pelanggan,id_petani,id_tanaman,banyak_bibit,total_harga,status) VALUES ('$id','','$baris[id_tanaman]','$_POST[pesanan]','$total','Belum')");
    echo "<script>alert('Terimakasih telah memesan, silahkan periksa daftar pesanan anda')</script>";
    echo "<meta http-equiv='refresh' content='1;url=daftar-pesanan.php'>";
  }
} ?>
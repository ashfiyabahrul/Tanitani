<?php 
include 'koneksi.php';
session_start();
$id=$_SESSION['petani'];
$perintah=$koneksi->query("SELECT * FROM petani WHERE id_petani='$id'");
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
            <ul class="navbar-nav" style="margin-right: 58%">
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
            <ul class="navbar-nav">
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
    </div> <br><br>
    <?php 
        $perintah=$koneksi->query("SELECT * FROM tanaman");
    ?>
    <div class="container">
      <span id="buat-pesanan"></span>
        <h2><b>Identifikasi Penyakit Tanaman</b></h2>
        <div class="input-group" id="ganti">
            <select class="custom-select" id="komoditas">
              <option selected>Pilih Komoditas yang Ingin Diidentifikasi...</option>
              <?php while($baris= $perintah->fetch_assoc()){ ?>
              <?php echo "<option value=",$baris['id_tanaman'],">",$baris['nama_tanaman'],"</option>";
              } ?>
            </select>
        </div>
        <div id="baru"></div>

        <p>
        </p>
    </div><br><br>
    </div>
    <footer>
      <div class="fixed-bottom footer">
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
  html += '<div class="row" style="margin-bottom:80px;">';
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
  html += '<label for=""><h5>Apakah tanaman padi kerdil?</h5></label>';
  html += '<div class="row">';
  html += '<div class="col-md-6">';
  html += '<input type="radio" name="tanaman" value="ya">';
  html += '<label for="" style="margin-left:10px"><h6>Ya</h6></label>';
  html += '</div>';
  html += '<div class="col-md-6">';
  html += '<input type="radio" name="tanaman" value="tidak">';
  html += '<label for="" style="margin-left:10px"><h6>Tidak</h6></label>';
  html += '</div>';
  html += '</div>';
  html += '</div>';
  html += '<div class="form-group">';
  html += '<label for=""><h5>Apakah anakan berkurang/sedikit?</h5></label>';
  html += '<div class="row">';
  html += '<div class="col-md-6">';
  html += '<input type="radio" name="anakan" value="ya">';
  html += '<label for="" style="margin-left:10px"><h6>Ya</h6></label>';
  html += '</div>';
  html += '<div class="col-md-6">';
  html += '<input type="radio" name="anakan" value="tidak">';
  html += '<label for="" style="margin-left:10px"><h6>Tidak</h6></label>';
  html += '</div>';
  html += '</div>';
  html += '</div>';
  html += '<div class="form-group">';
  html += '<label for=""><h5>Apakah anakan bertambah banyak?</h5></label>';
  html += '<div class="row">';
  html += '<div class="col-md-6">';
  html += '<input type="radio" name="anakan1" value="ya">';
  html += '<label for="" style="margin-left:10px"><h6>Ya</h6></label>';
  html += '</div>';
  html += '<div class="col-md-6">';
  html += '<input type="radio" name="anakan1" value="tidak">';
  html += '<label for="" style="margin-left:10px"><h6>Tidak</h6></label>';
  html += '</div>';
  html += '</div>';
  html += '</div>';
  html += '<div class="form-group">';
  html += '<label for=""><h5>Apakah anakan tumbuh lemas?</h5></label>';
  html += '<div class="row">';
  html += '<div class="col-md-6">';
  html += '<input type="radio" name="anakan2" value="ya">';
  html += '<label for="" style="margin-left:10px"><h6>Ya</h6></label>';
  html += '</div>';
  html += '<div class="col-md-6">';
  html += '<input type="radio" name="anakan2" value="tidak">';
  html += '<label for="" style="margin-left:10px"><h6>Tidak</h6></label>';
  html += '</div>';
  html += '</div>';
  html += '</div>';
  html += '<div class="form-group">';
  html += '<label for=""><h5>Apakah anakan tumbuh tegak?</h5></label>';
  html += '<div class="row">';
  html += '<div class="col-md-6">';
  html += '<input type="radio" name="anakan3" value="ya">';
  html += '<label for="" style="margin-left:10px"><h6>Ya</h6></label>';
  html += '</div>';
  html += '<div class="col-md-6">';
  html += '<input type="radio" name="anakan3" value="tidak">';
  html += '<label for="" style="margin-left:10px"><h6>Tidak</h6></label>';
  html += '</div>';
  html += '</div>';
  html += '</div>';
  html += '<div class="form-group">';
  html += '<label for=""><h5>Apakah daun padi menguning sampai jingga dari pucuk ke pangkal?</h5></label>';
  html += '<div class="row">';
  html += '<div class="col-md-6">';
  html += '<input type="radio" name="daun" value="ya">';
  html += '<label for="" style="margin-left:10px"><h6>Ya</h6></label>';
  html += '</div>';
  html += '<div class="col-md-6">';
  html += '<input type="radio" name="daun" value="tidak">';
  html += '<label for="" style="margin-left:10px"><h6>Tidak</h6></label>';
  html += '</div>';
  html += '</div>';
  html += '</div>';
  html += '<div class="form-group">';
  html += '<label for=""><h5>Apakah daun padi berwarna hijau atau kuning pucat?</h5></label>';
  html += '<div class="row">';
  html += '<div class="col-md-6">';
  html += '<input type="radio" name="daun1" value="ya">';
  html += '<label for="" style="margin-left:10px"><h6>Ya</h6></label>';
  html += '</div>';
  html += '<div class="col-md-6">';
  html += '<input type="radio" name="daun1" value="tidak">';
  html += '<label for="" style="margin-left:10px"><h6>Tidak</h6></label>';
  html += '</div>';
  html += '</div>';
  html += '</div>';
  html += '<div class="form-group">';
  html += '<input type="submit" name="identifikasi" class="form-control btn btn-success" value="Identifikasi Penyakit">';
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
if(isset($_POST['identifikasi'])){
  $perintah=$koneksi->query("SELECT * FROM tanaman WHERE nama_tanaman='$_POST[komoditas]'");
  $baris= $perintah->fetch_assoc();
  if($_POST['tanaman'] == 'ya' and $_POST['anakan'] == 'ya' and $_POST['anakan1'] == 'tidak' and $_POST['anakan2'] == 'tidak' and $_POST['anakan3'] == 'tidak' and $_POST['daun'] == 'ya' and $_POST['daun1'] == 'tidak'){
    echo "<script>alert('Penyakit tanaman padi anda adalah Tungro \\nSolusi untuk Penyakit Tungro adalah Penggiliran Tanaman, Penanaman Varietas unggul dan Pengaturan Jarak Tanaman.')</script>";
  }elseif($_POST['tanaman'] == 'ya' and $_POST['anakan'] == 'tidak' and $_POST['anakan1'] == 'ya' and $_POST['anakan2'] == 'ya' and $_POST['anakan3'] == 'tidak' and $_POST['daun'] == 'tidak' and $_POST['daun1'] == 'ya'){
    echo "<script>alert('Penyakit tanaman padi anda adalah Kerdil Kuning \\nSolusi untuk Penyakit Kerdil Kuning adalah kontrol populasi kutu daun dan bakar tanaman dan bagian tanaman yang terinfeksi')</script>";
  }elseif($_POST['tanaman'] == 'ya' and $_POST['anakan'] == 'tidak' and $_POST['anakan1'] == 'ya' and $_POST['anakan2'] == 'tidak' and $_POST['anakan3'] == 'ya' and $_POST['daun'] == 'tidak' and $_POST['daun1'] == 'ya'){
    echo "<script>alert('Penyakit tanaman padi anda adalah Kerdil Rumput \\nSolusi untuk Penyakit Kerdil Rumput adalah mencabut atau memendam tanaman yang terinfeksi dan menggantinya setelah 2 hari dengan yang sehat serta basmi hama penyebabnya yaitu wereng')</script>";
  }else{
    echo "<script>alert('Maaf penyakit tidak bisa di identifikasi')</script>";
  }
  echo "<meta http-equiv='refresh' content='1;url=penyakit.php'>";
} ?>


<?php 
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAFTAR TANITANI</title>
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
                <a class="nav-link" href="index.php">Beranda <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php#tanitani">Tentang</a>
              </li>
            </ul>
            <ul class="navbar-nav" style="margin-left: 70%">
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
                <li class="nav-item active">
                    <a href="daftar.html" class="nav-link">Daftar</a>
                </li>
            </ul>
          </div>
    </div><br>
    <div class="container">
        <h2 class="text-center">Daftar sebagai Petani</h2><br>
        <div class="card">
            <div class="card-body">
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" id="" class="form-control" placeholder="Nama Lengkap" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                    <label>Nomor KTP/NIK</label>
                    <input type="text" name="nik" id="" class="form-control" placeholder="No.KTP/NIK" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                    <label>Alamat Lengkap</label>
                    <input type="text" name="alamat" id="" class="form-control" placeholder="Alamat" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                    <label>E-Mail</label>
                    <input type="email" name="email" id="" class="form-control" placeholder="E-Mail" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" id="" class="form-control" placeholder="Password" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                    <label>Konfirmasi Password</label>
                    <input type="password" name="password1" id="" class="form-control" placeholder="Konfirmasi Password" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                    <label>Nomor Handphone</label>
                    <input type="text" name="hp" id="" class="form-control" placeholder="Nomor Handphone" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                    <label>Daerah Tanam</label>
                    <div class="row">
                        <div class="col-md-8">
                        <?php
                        $perintah= $koneksi->query("SELECT * FROM tempat_tanam");
                        while($baris= $perintah->fetch_assoc()){
                            $perintah1= $koneksi->query("SELECT * FROM tanaman WHERE id_tempattanam='$baris[id_tempattanam]'");
                        ?>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    <input type="checkbox" value="<?php echo $baris['id_tempattanam'] ?>" name="daerah[]" aria-label="Checkbox for following text input">
                                  </div>
                                </div>
                                <label class="form-control"><?php echo $baris['nama_tempattanam']," (",$baris['ketinggian'],") -> ";
                                while($baris1= $perintah1->fetch_assoc()){
                                    echo "[",$baris1['nama_tanaman'],"] ";
                                    }
                                ?></label>
                            </div><?php } ?>
                        </div>  
                    </div>
                    </div>
                    <div class="form-group">
                        <label>Upload Foto Profile</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Upload File</span>
                            </div>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="inputGroupFile01" name="foto">
                              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                          </div>
                    </div><br>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" name="Daftar" value="Daftar" style="width: 150px;font-size: 25px;font-weight: 500;">
                    </div>
                </form>
                <?php if (isset($_POST['Daftar'])) {
                    $nama = $_FILES['foto']['name'];
                    $lokasi = $_FILES['foto']['tmp_name'];
                    move_uploaded_file($lokasi, "foto_profil/".$nama);
                    $perintah=$koneksi->query("SELECT * FROM petani WHERE email='$_POST[email]'");
                    $sama=$perintah->num_rows;
                    if($sama==1){
                        echo "<div class = 'alert alert-danger'> Email sudah dipakai </div>";
                        echo "<script>document.getElementById('nama').focus();</script>";
                    }else{
                        if($_POST['password']!=$_POST['password1']){
                            echo "<div class = 'alert alert-danger'> Password tidak sesuai </div>";
                        }else{
                            $koneksi->query("INSERT INTO petani(NIK,nama_petani,email,password,no_hp,alamat,foto_profil) VALUES ('$_POST[nik]','$_POST[nama]','$_POST[email]','$_POST[password]','$_POST[hp]','$_POST[alamat]','$nama')");
                            $id_petaniterakhir=$koneksi->insert_id;
                            if (isset($_POST['daerah'])) {
                                $daerah=$_POST['daerah'];
                                for ($i=0; $i < count($daerah) ; $i++){
                                    $koneksi->query("INSERT INTO daftar_tempattanam (id_petani,id_tempattanam) VALUES ('$id_petaniterakhir','$daerah[$i]')");
                                }
                            }
                            echo "<div class = 'alert alert-success'> Terimakasih telah mendaftar </div>";
                            echo "<meta http-equiv='refresh' content='1;url=index.php'>";
                        }
                    }        
                } ?>
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

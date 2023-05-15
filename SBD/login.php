<?php 
include 'koneksi.php';
session_start();
?>
<?php 
if (isset($_POST['Masuk']))
{
 $perintah=$koneksi->query("SELECT * FROM petani WHERE email='$_POST[user]' AND password='$_POST[password]'");
 $sesuai=$perintah->num_rows;
 $baris=$perintah->fetch_assoc();
 if($sesuai==1){
   $_SESSION['petani']=$baris['id_petani'];
   $_SESSION['terdaftar']=1;
   echo "<script>alert('Login Sukses');</script>";
   echo "<meta http-equiv='refresh' content='1;url=pilih-pesanan.php'>";
 }
 else{
   $perintah=$koneksi->query("SELECT * FROM pelanggan WHERE email='$_POST[user]' AND password='$_POST[password]'");
   $sesuai=$perintah->num_rows;
   $baris=$perintah->fetch_assoc();
   if ($sesuai==1) {
     $_SESSION['pelanggan']=$baris['id_pelanggan'];
     $_SESSION['terdaftar']=1;
     echo "<script>alert('Login Sukses');</script>";
     echo "<meta http-equiv='refresh' content='1;url=buat-pesanan.php'>";
   }else{
     echo "<script>alert('Password atau Email Salah!');</script>";
     echo "<meta http-equiv='refresh' content='1;url=index.php'>";
   }
 }
} 
?>
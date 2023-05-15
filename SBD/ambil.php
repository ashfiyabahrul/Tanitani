<?php 
include 'koneksi.php';
session_start();
$id=$_SESSION['petani'];
$koneksi->query("UPDATE pesanan SET id_petani='$id', status='Menunggu' WHERE id_pesanan='$_GET[pesan]'");
echo "<script>alert('Pengambilan pesanan sukses, silahkan cek daftar pesanan anda');</script>";
echo "<meta http-equiv='refresh' content='1;url=daftar-pesanan.php'>";
?>
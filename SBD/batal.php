<?php 
include 'koneksi.php';
session_start();
if (isset($_SESSION['pelanggan'])) {
	$koneksi->query("DELETE FROM pesanan WHERE id_pesanan='$_GET[id]'");
	echo "<script>alert('Pesanan telah dibatalkan');</script>";
	echo "<meta http-equiv='refresh' content='1;url=daftar-pesanan.php'>";
}elseif (isset($_SESSION['petani'])) {
	$koneksi->query("UPDATE pesanan SET id_petani='0', status='Belum' WHERE id_pesanan='$_GET[id]'");
	echo "<script>alert('Pengambilan Pesanan telah dibatalkan');</script>";
	echo "<meta http-equiv='refresh' content='1;url=daftar-pesanan.php'>";
}
?>
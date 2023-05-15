<?php 
include 'koneksi.php';
if (isset($_GET['ubah'])){
	if ($_GET['ubah']=='Panen') {
		$koneksi->query("UPDATE pesanan SET status='Panen' WHERE id_pesanan='$_GET[id]'");
		echo "<script>alert('Status Pesanan Telah Diperbarui, Selamat Memanen');</script>";
		echo "<meta http-equiv='refresh' content='1;url=daftar-pesanan.php'>";
	}elseif ($_GET['ubah']=='Kirim') {
		$koneksi->query("UPDATE pesanan SET status='Kirim' WHERE id_pesanan='$_GET[id]'");
		echo "<script>alert('Status Pesanan Telah Diperbarui, Silahkan Menunggu Hingga Komoditas Diterima Pelanggan');</script>";
		echo "<meta http-equiv='refresh' content='1;url=daftar-pesanan.php'>";
	}elseif ($_GET['ubah']=='Selesai') {
		$koneksi->query("UPDATE pesanan SET status='Selesai' WHERE id_pesanan='$_GET[id]'");
		echo "<script>alert('Pesanan telah Selesai, Terima Kasih Telah Memesan');</script>";
		echo "<meta http-equiv='refresh' content='1;url=daftar-pesanan.php'>";
	}
}
?>
-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jun 2020 pada 18.38
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tanitani`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_tempattanam`
--

CREATE TABLE `daftar_tempattanam` (
  `id_daftartempattanam` int(10) NOT NULL,
  `id_petani` int(10) NOT NULL,
  `id_tempattanam` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `daftar_tempattanam`
--

INSERT INTO `daftar_tempattanam` (`id_daftartempattanam`, `id_petani`, `id_tempattanam`) VALUES
(3, 1, 1),
(4, 1, 4),
(1, 2, 2),
(2, 2, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(10) NOT NULL,
  `NIK` varchar(25) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `foto_profil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `NIK`, `nama_pelanggan`, `password`, `email`, `alamat`, `no_hp`, `foto_profil`) VALUES
(1, '', 'Sugih', 'gih12345', 'Sugih@gmail.com', 'jln sugih', '6285322418200', ''),
(2, '32229119', 'Muhammad Bahrul', 'rul12345', 'bahrul@gmail.com', 'jln bahrul', '6285322418200', '001.jpg'),
(3, '3222222', 'singgih', 'gih123', 'singgih@gmail.com', 'jln singgih', '6285322418200', '26280174_p0.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(10) NOT NULL,
  `id_pelanggan` int(10) NOT NULL,
  `id_petani` int(10) NOT NULL,
  `id_tanaman` int(11) NOT NULL,
  `banyak_bibit` varchar(11) NOT NULL,
  `total_harga` varchar(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_pelanggan`, `id_petani`, `id_tanaman`, `banyak_bibit`, `total_harga`, `status`) VALUES
(2, 3, 1, 4, '1000', '3100000', 'Menunggu'),
(3, 3, 2, 9, '300', '2030000', 'Selesai'),
(4, 3, 0, 14, '111', '3022200', 'Belum'),
(5, 3, 1, 2, '120', '2030000', 'Menunggu'),
(6, 2, 2, 7, '250', '14500000', 'Menunggu'),
(7, 3, 0, 4, '1234', '3123400', 'Belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petani`
--

CREATE TABLE `petani` (
  `id_petani` int(10) NOT NULL,
  `NIK` varchar(25) NOT NULL,
  `nama_petani` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `foto_profil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petani`
--

INSERT INTO `petani` (`id_petani`, `NIK`, `nama_petani`, `password`, `email`, `no_hp`, `alamat`, `foto_profil`) VALUES
(1, '32423232', 'Hikal', 'kal12345', 'Hikal@gmail.com', '6285322418200', 'jln hikal', ''),
(2, '321312131', 'taz', 'taz123', 'taz@gmail.com', '6289620320590', 'jln taz', 'cool_guy_render_by_luxio56lavi-d4zu5b8.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanaman`
--

CREATE TABLE `tanaman` (
  `id_tanaman` int(10) NOT NULL,
  `nama_tanaman` varchar(50) NOT NULL,
  `lama_tumbuh` int(50) NOT NULL,
  `harga_pasar` int(10) NOT NULL,
  `id_tempattanam` int(10) NOT NULL,
  `foto_tanaman` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tanaman`
--

INSERT INTO `tanaman` (`id_tanaman`, `nama_tanaman`, `lama_tumbuh`, `harga_pasar`, `id_tempattanam`, `foto_tanaman`) VALUES
(1, 'Padi', 4, 10, 1, 'padi.jpg'),
(2, 'Jagung', 2, 250, 1, 'jagung.jpg'),
(3, 'Cabai', 3, 100, 1, 'cabai.jpg'),
(4, 'Tomat', 3, 100, 1, 'tomat.jpg'),
(5, 'Kakao', 36, 10000, 2, 'kakao.jpg'),
(6, 'Kopi', 36, 1100, 2, 'kopi.jpg'),
(7, 'Tebu', 12, 10000, 2, 'tebu.jpg'),
(8, 'Jahe', 8, 10000, 3, 'jahe.jpg'),
(9, 'Sawi', 2, 100, 3, 'sawi.jpg'),
(10, 'Lobak', 2, 200, 3, 'lobak.jpg'),
(11, 'Kentang', 4, 3000, 3, 'kentang.jpg'),
(12, 'Wortel', 3, 50, 4, 'wortel.jpg'),
(13, 'Paprika', 8, 400, 4, 'paprika.jpg'),
(14, 'Timun', 3, 200, 4, 'timun.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempat_tanam`
--

CREATE TABLE `tempat_tanam` (
  `id_tempattanam` int(10) NOT NULL,
  `nama_tempattanam` varchar(50) NOT NULL,
  `ketinggian` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tempat_tanam`
--

INSERT INTO `tempat_tanam` (`id_tempattanam`, `nama_tempattanam`, `ketinggian`) VALUES
(1, 'Dataran Rendah', '0 - 200 mdpl'),
(2, 'Dataran Sedang', '200 - 700 mdpl '),
(3, 'Dataran Tinggi', '700 - 1500 mdpl'),
(4, 'Pegunungan', '> 1500 mdpl');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `daftar_tempattanam`
--
ALTER TABLE `daftar_tempattanam`
  ADD PRIMARY KEY (`id_daftartempattanam`),
  ADD KEY `id_petani` (`id_petani`,`id_tempattanam`),
  ADD KEY `id_tempattanam` (`id_tempattanam`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_tanaman` (`id_tanaman`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `petani`
--
ALTER TABLE `petani`
  ADD PRIMARY KEY (`id_petani`);

--
-- Indeks untuk tabel `tanaman`
--
ALTER TABLE `tanaman`
  ADD PRIMARY KEY (`id_tanaman`),
  ADD KEY `id_tempattanam` (`id_tempattanam`);

--
-- Indeks untuk tabel `tempat_tanam`
--
ALTER TABLE `tempat_tanam`
  ADD PRIMARY KEY (`id_tempattanam`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `daftar_tempattanam`
--
ALTER TABLE `daftar_tempattanam`
  MODIFY `id_daftartempattanam` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `petani`
--
ALTER TABLE `petani`
  MODIFY `id_petani` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tanaman`
--
ALTER TABLE `tanaman`
  MODIFY `id_tanaman` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tempat_tanam`
--
ALTER TABLE `tempat_tanam`
  MODIFY `id_tempattanam` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `daftar_tempattanam`
--
ALTER TABLE `daftar_tempattanam`
  ADD CONSTRAINT `daftar_tempattanam_ibfk_1` FOREIGN KEY (`id_petani`) REFERENCES `petani` (`id_petani`),
  ADD CONSTRAINT `daftar_tempattanam_ibfk_2` FOREIGN KEY (`id_tempattanam`) REFERENCES `tempat_tanam` (`id_tempattanam`);

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `pesanan_ibfk_3` FOREIGN KEY (`id_tanaman`) REFERENCES `tanaman` (`id_tanaman`);

--
-- Ketidakleluasaan untuk tabel `tanaman`
--
ALTER TABLE `tanaman`
  ADD CONSTRAINT `tanaman_ibfk_1` FOREIGN KEY (`id_tempattanam`) REFERENCES `tempat_tanam` (`id_tempattanam`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Bulan Mei 2022 pada 18.07
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_myland`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `check_in`
--

CREATE TABLE `check_in` (
  `id_reservasi` int(10) NOT NULL,
  `id_tamu` int(10) NOT NULL,
  `status` enum('reserved','check in','check out') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_reservasi`
--

CREATE TABLE `detail_reservasi` (
  `id_reservasi` int(10) NOT NULL,
  `kode_kamar` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas_umum`
--

CREATE TABLE `fasilitas_umum` (
  `id` int(11) NOT NULL,
  `nama_fasilitas` varchar(50) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fasilitas_umum`
--

INSERT INTO `fasilitas_umum` (`id`, `nama_fasilitas`, `image`) VALUES
(2, 'lobby', '97-lobi.jpg'),
(3, 'Gym / Fitnes', 'fitnes.jpg'),
(4, 'Parking', 'parking.jpg'),
(5, 'Play Ground', 'playground.jpg'),
(6, 'Restoran', 'restoran.jpg'),
(7, 'Gedung Serbaguna', 'serbaguna.jpg'),
(8, 'Kolam Renang', 'swimmingpool.jpg'),
(9, 'Lobby', '32-lobi.jpg'),
(10, 'Layanan Resepsionis 24 Jam', 'resepsionis.jpeg'),
(12, 'internet gratis', '653-810-wifi.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `kode_kamar` int(10) NOT NULL,
  `tipe` enum('VIP','VVIP','Suite','Double','Single') NOT NULL,
  `harga` int(50) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`kode_kamar`, `tipe`, `harga`, `image`) VALUES
(116, 'Single', 170000, '783-single.jpg'),
(131, 'VIP', 290000, 'vip.jpg'),
(141, 'VVIP', 350000, 'vvip.jpg'),
(151, 'Suite', 480000, 'suite.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_reservasi` int(11) NOT NULL,
  `tanggal_reservasi` date NOT NULL,
  `tanggal_check_in` date NOT NULL,
  `tanggal_check_out` date NOT NULL,
  `kode_kamar` int(10) NOT NULL,
  `nama_tamu` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `handphone` int(20) NOT NULL,
  `tipe_kamar` enum('Single','Double','VIP','VVIP','Suite') NOT NULL,
  `jumlah_kamar` int(20) NOT NULL,
  `status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_reservasi`, `tanggal_reservasi`, `tanggal_check_in`, `tanggal_check_out`, `kode_kamar`, `nama_tamu`, `email`, `handphone`, `tipe_kamar`, `jumlah_kamar`, `status`) VALUES
(1, '2022-05-18', '2022-05-20', '2022-05-21', 120, 'Adi', 'adi65@gmail.com', 817263882, 'Single', 1, '2'),
(2, '2022-05-20', '2022-05-27', '2022-05-28', 101, 'Sai', 'sai123@gmail.com', 817263862, 'Double', 1, '2'),
(3, '2022-05-20', '2022-05-25', '2022-05-26', 131, 'Ibnu', 'ibnu23@gmail.com', 817263862, 'VIP', 2, '1'),
(20, '2022-05-12', '2022-05-21', '2022-05-21', 112, 'Dika', 'dika8387@gmail.com', 89365292, 'Single', 2, '1'),
(21, '2022-05-18', '2022-05-26', '2022-05-28', 104, 'sakura', 'sakura1822@gmail.com', 85213726, 'VIP', 1, '1'),
(22, '2022-05-18', '2022-05-23', '2022-05-24', 113, 'dia', 'dia23@gmail.com', 83123584, 'VIP', 2, '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_kamar`
--

CREATE TABLE `tipe_kamar` (
  `id` int(10) NOT NULL,
  `tipe` enum('VIP','VVIP','Suite','Double','Single') NOT NULL,
  `fasilitas` text NOT NULL,
  `jumlah_kamar` int(6) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tipe_kamar`
--

INSERT INTO `tipe_kamar` (`id`, `tipe`, `fasilitas`, `jumlah_kamar`, `image`) VALUES
(102, 'Single', '	1. Kamar Mandi; 2. Single bed; 3. Ukuran kamar 40m persegi; 4. Sofa; 5. Kipas Angin; 6. Kopi/Teh; 7.TV', 2, '896-237-single.jpg'),
(103, 'Single', '1. Kamar Mandi;     2. Single bed;     3. Ukuran kamar 40m persegi;     4. Sofa;     5. Kipas Angin;     6. Kopi/Teh;     7. TV', 4, '965-237-single.jpg'),
(113, 'VIP', '1. Kamar Mandi;     2. Single bed;     3. Ukuran kamar 40m persegi;     4. Sofa;     5. Kipas Angin;     6. Kopi/Teh;     7. TV', 12, '437-vip.jpg'),
(116, 'Double', '1. Ukuran kamar 45m persegi;\r\n2. Kamar mandi;\r\n3. Double bed;\r\n4. Sofa;\r\n5. TV;\r\n6. Kipas angin;\r\n7. Kopi/Teh', 15, 'double.jpg'),
(131, 'VIP', '1. Ukuran kamar 50m persegi;\r\n2. Kamar mandi;\r\n3. Sofa bed;\r\n4. Meja kerja\r\n5. Balkon;\r\n6. TV;\r\n7. AC;\r\n8. Kopi/Teh;', 10, 'vip.jpg'),
(141, 'VVIP', '1. Ukuran kamar 60m persegi;\r\n2. Kamar mandi + bathub;\r\n3. Ruang tamu;\r\n4. Ruangan bebas rokok;\r\n5. Ruang baca/kerja;\r\n6. King bed;\r\n7. Sofa bed;\r\n8. TV;\r\n9. AC;\r\n10. Mini Dapur;', 10, 'vvip.jpg'),
(151, 'Suite', '1. Ukuran kamar 60m persegi;\r\n2. Kamar mandi + bathub;\r\n3. Ruang tamu;\r\n4. Ruang ganti\r\n5. Ruang makan + dapur\r\n6. Ruangan bebas rokok;\r\n7. Ruang baca/kerja;\r\n8. King bed;\r\n9. Sofa bed;\r\n10. TV;\r\n11. AC;\r\n12. Balkon Indah;', 10, 'suite.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(35) NOT NULL,
  `role` enum('Administrator','Guest','Receptionist') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'Administrator'),
(2, 'resepsionis', 'resepsionis', 'Receptionist');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `check_in`
--
ALTER TABLE `check_in`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD UNIQUE KEY `id_tamu` (`id_tamu`);

--
-- Indeks untuk tabel `detail_reservasi`
--
ALTER TABLE `detail_reservasi`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD UNIQUE KEY `kode_kamar` (`kode_kamar`);

--
-- Indeks untuk tabel `fasilitas_umum`
--
ALTER TABLE `fasilitas_umum`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`kode_kamar`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD UNIQUE KEY `kode_kamar` (`kode_kamar`);

--
-- Indeks untuk tabel `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `fasilitas_umum`
--
ALTER TABLE `fasilitas_umum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `check_in`
--
ALTER TABLE `check_in`
  ADD CONSTRAINT `check_in_ibfk_1` FOREIGN KEY (`id_tamu`) REFERENCES `reservasi` (`id_tamu`),
  ADD CONSTRAINT `check_in_ibfk_2` FOREIGN KEY (`id_reservasi`) REFERENCES `reservasi` (`id_reservasi`);

--
-- Ketidakleluasaan untuk tabel `detail_reservasi`
--
ALTER TABLE `detail_reservasi`
  ADD CONSTRAINT `detail_reservasi_ibfk_1` FOREIGN KEY (`id_reservasi`) REFERENCES `reservasi` (`id_reservasi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

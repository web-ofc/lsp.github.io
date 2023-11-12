-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Nov 2023 pada 16.52
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_futsal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`) VALUES
(1, 'dinda', '123', 'adinda angesti');

-- --------------------------------------------------------

--
-- Struktur dari tabel `boking`
--

CREATE TABLE `boking` (
  `id_boking` int(11) NOT NULL,
  `id_lapangan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `jam_sewa` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `totalbayar` int(11) NOT NULL,
  `status_pesanan` varchar(50) NOT NULL,
  `diskon` int(11) DEFAULT NULL,
  `uang_jumlah` int(11) DEFAULT NULL,
  `uang_kembali` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `boking`
--

INSERT INTO `boking` (`id_boking`, `id_lapangan`, `nama_pelanggan`, `jam_sewa`, `tanggal`, `totalbayar`, `status_pesanan`, `diskon`, `uang_jumlah`, `uang_kembali`) VALUES
(1, 1, 'Kojay', 2, '2023-10-30 10:16:38', 120000, 'Sudah Dibayar', 0, 0, 120000),
(2, 1, 'Kojaye', 1, '2023-10-30 10:21:40', 60000, 'Sudah Dibayar', 0, 0, -60000),
(3, 1, 'kandiazzzxx', 1, '2023-10-30 10:23:15', 60000, 'Sudah Dibayar', 0, 0, -60000),
(4, 1, 'barudak bujang', 3, '2023-10-30 10:30:18', 180000, 'Sudah Dibayar', 0, 0, -180000),
(5, 1, 'Janjo', 2, '2023-10-30 10:32:19', 120000, 'Sudah Dibayar', 0, 0, -120000),
(6, 1, 'Dodi', 1, '2023-10-30 10:37:32', 60000, 'Sudah Dibayar', 0, 0, -60000),
(7, 1, 'Pai', 2, '2023-10-30 10:40:41', 120000, 'Sudah Dibayar', 0, 130000, 10000),
(8, 1, 'Soib', 1, '2023-10-30 10:41:39', 60000, 'Sudah Dibayar', 0, 90000, 30000),
(9, 2, 'KangSoleh', 2, '2023-10-30 11:21:21', 130000, 'Sudah Dibayar', 0, 140000, 10000),
(10, 1, 'Ujang', 1, '2023-10-30 11:27:02', 60000, 'Sudah Dibayar', 0, 70000, 10000),
(11, 1, 'Kojaye', 1, '2023-10-30 11:28:44', 60000, 'Sudah Dibayar', 59000, 70000, 10000),
(12, 1, 'Kasep', 1, '2023-10-30 11:37:10', 60000, 'Sudah Dibayar', 0, 70000, 70000),
(13, 1, 'kandiazzzxx', 1, '2023-10-30 11:38:42', 60000, 'Sudah Dibayar', 0, 70000, 70000),
(14, 1, 'kandiaz', 1, '2023-10-30 11:42:46', 60000, 'Sudah Dibayar', 0, 70000, 70000),
(15, 1, 'Kojay', 1, '2023-10-30 12:10:50', 60000, 'Sudah Dibayar', 0, 75000, 15000),
(16, 2, 'kandiazzzxx', 1, '2023-10-30 12:14:46', 65000, 'Sudah Dibayar', 1000, 70000, 6000),
(17, 2, 'budak', 1, '2023-10-30 12:20:38', 65000, 'Sudah Dibayar', 0, 70000, 5000),
(18, 2, 'kandiaz', 1, '2023-10-30 12:21:39', 65000, 'Sudah Dibayar', 0, 100000, 35000),
(19, 2, 'kandiazzzxx', 1, '2023-10-30 12:22:26', 65000, 'Sudah Dibayar', 1000, 70000, 6000),
(20, 2, 'Kojaye', 1, '2023-10-30 12:27:58', 64000, 'Sudah Dibayar', 1000, 100000, 36000),
(21, 3, 'Njayy', 3, '2023-10-30 13:03:39', 358000, 'Sudah Dibayar', 2000, 400000, 42000),
(22, 3, 'yatem', 1, '2023-11-11 04:21:57', 119000, 'Sudah Dibayar', 1000, 200000, 81000);

--
-- Trigger `boking`
--
DELIMITER $$
CREATE TRIGGER `pengurangan_lapangan` AFTER INSERT ON `boking` FOR EACH ROW BEGIN 
	UPDATE lapangan SET lapangan.max_jam_perhari = max_jam_perhari - NEW.jam_sewa
    WHERE lapangan.id_lapangan = NEW.id_lapangan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir`
--

CREATE TABLE `kasir` (
  `id_kasir` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nohp` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kasir`
--

INSERT INTO `kasir` (`id_kasir`, `username`, `password`, `nama`, `nohp`) VALUES
(1, 'kandias', '123', 'kandiaz', '085626715352');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lapangan`
--

CREATE TABLE `lapangan` (
  `id_lapangan` int(11) NOT NULL,
  `nama_lapangan` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `max_jam_perhari` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lapangan`
--

INSERT INTO `lapangan` (`id_lapangan`, `nama_lapangan`, `jenis`, `max_jam_perhari`, `harga`, `gambar`) VALUES
(1, 'PowerPlay Arena', 'Sintetis', 8, 60000, 'sintetis.jpg'),
(2, 'PowerPlay Arena', 'Vinyl', 7, 65000, 'vinyl.jpg'),
(3, 'PowerPlay Arena', 'Outdoor', 8, 120000, 'outdoor.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `boking`
--
ALTER TABLE `boking`
  ADD PRIMARY KEY (`id_boking`),
  ADD KEY `id_lapangan` (`id_lapangan`);

--
-- Indeks untuk tabel `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`id_kasir`);

--
-- Indeks untuk tabel `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`id_lapangan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `boking`
--
ALTER TABLE `boking`
  MODIFY `id_boking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `kasir`
--
ALTER TABLE `kasir`
  MODIFY `id_kasir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `id_lapangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `boking`
--
ALTER TABLE `boking`
  ADD CONSTRAINT `boking_ibfk_1` FOREIGN KEY (`id_lapangan`) REFERENCES `lapangan` (`id_lapangan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

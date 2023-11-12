-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Feb 2023 pada 11.32
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kasirrestoran_syavira`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `password`) VALUES
(1, 'Davin Narendra ', 'davin1@gmail.com', '123'),
(2, 'Admin', 'admin@gmail.com', '123'),
(3, 'Keysya Afiatra', 'keysya@gmail.com', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir`
--

CREATE TABLE `kasir` (
  `id_kasir` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kasir`
--

INSERT INTO `kasir` (`id_kasir`, `nama`, `email`, `password`) VALUES
(1, 'Azella Quenilla', 'azellaqu@gmail.com', '1234'),
(2, 'Kasir', 'kasir@gmail.com', '1234'),
(3, 'Genta Arafka', 'genta@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_pelanggan`
--

CREATE TABLE `log_pelanggan` (
  `kejadian` varchar(30) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log_pelanggan`
--

INSERT INTO `log_pelanggan` (`kejadian`, `waktu`) VALUES
('Insert Data', '2023-02-01 10:41:34'),
('Update Data', '2023-02-01 10:48:51'),
('Delete Data', '2023-02-01 10:51:05'),
('Insert Data', '2023-02-01 16:23:17'),
('Delete Data', '2023-02-01 16:28:07'),
('Update Data', '2023-02-01 16:35:48'),
('Update Data', '2023-02-01 16:35:55'),
('Insert Data', '2023-02-01 16:39:38'),
('Insert Data', '2023-02-01 16:40:43'),
('Update Data', '2023-02-01 16:41:44'),
('Insert Data', '2023-02-01 16:44:17'),
('Delete Data', '2023-02-01 16:44:19'),
('Insert Data', '2023-02-01 16:45:29'),
('Insert Data', '2023-02-01 16:46:08'),
('Insert Data', '2023-02-01 16:46:33'),
('Insert Data', '2023-02-01 16:47:59'),
('Insert Data', '2023-02-01 16:48:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `harga` int(20) NOT NULL,
  `stok` int(20) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `menu`, `kategori`, `harga`, `stok`, `img`) VALUES
(2, 'Milkshake Vanila', 'Minuman', 30000, 10, 'f21.png'),
(3, 'Pizza', 'Makanan', 165000, 29, 'f6.png'),
(4, 'Milkshake Oreo', 'Minuman', 30000, 8, 'f22.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `email`, `alamat`, `password`) VALUES
(1, 'Clarisa Vernanda', 'clarisa@gmail.com', 'Jakarta', '12345'),
(2, 'Zayden Arseniko', 'zayden@gmail.com', 'Bogor', '12345'),
(3, 'Lena Fitriani', 'leni@gmail.com', 'Depok', '12345'),
(4, 'Farzan Tanubrata', 'farzan@gmail.com', 'Jakarta', '12345');

--
-- Trigger `pelanggan`
--
DELIMITER $$
CREATE TRIGGER `delete_pelanggan` AFTER DELETE ON `pelanggan` FOR EACH ROW INSERT INTO log_pelanggan 
VALUES ('Delete Data', now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_pelanggan` AFTER INSERT ON `pelanggan` FOR EACH ROW INSERT INTO log_pelanggan
VALUES ('Insert Data', now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_pelanggan` AFTER UPDATE ON `pelanggan` FOR EACH ROW INSERT INTO log_pelanggan
VALUES ('Update Data', now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `total_transaksi` int(15) NOT NULL,
  `uang_bayar` int(15) NOT NULL,
  `uang_kembali` int(15) NOT NULL,
  `tanggal_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_menu`
--

CREATE TABLE `transaksi_menu` (
  `id_transaksi_menu` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `qty` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Trigger `transaksi_menu`
--
DELIMITER $$
CREATE TRIGGER `kurangi stok` AFTER INSERT ON `transaksi_menu` FOR EACH ROW BEGIN
  UPDATE menu SET stok=stok-NEW.qty
  WHERE id_menu = NEW.id_menu;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`id_kasir`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `transaksi_menu`
--
ALTER TABLE `transaksi_menu`
  ADD PRIMARY KEY (`id_transaksi_menu`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_menu` (`id_menu`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kasir`
--
ALTER TABLE `kasir`
  MODIFY `id_kasir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi_menu`
--
ALTER TABLE `transaksi_menu`
  MODIFY `id_transaksi_menu` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);

--
-- Ketidakleluasaan untuk tabel `transaksi_menu`
--
ALTER TABLE `transaksi_menu`
  ADD CONSTRAINT `transaksi_menu_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
  ADD CONSTRAINT `transaksi_menu_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

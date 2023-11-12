-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Nov 2023 pada 03.29
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
-- Database: `kandias_minimarket`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `kategori`, `harga`, `stok`, `gambar`) VALUES
(1, 'Tahu Baso Ikan', 'seafood', 3500, 11, 'tahubasoikan.png'),
(2, 'Salmon fish cake', 'seafood', 8500, 4, 'salmon.png'),
(3, 'Odeng', 'seafood', 15000, 3, 'odeng.png'),
(5, 'Chicken Karage', 'meat', 18000, 40, 'karage.png'),
(6, 'Sausage Roll', 'meat', 7000, 22, 'roll.png'),
(7, 'Udon', 'noodles', 10000, 8, 'udon.png'),
(8, 'Smoked Chicken Ball', 'meat', 10000, 13, 'ball.png'),
(9, 'satsumaage', 'seafood', 6000, 5, 'satsumage.png'),
(10, 'Vermiselli', 'noodles', 24000, 7, 'vermiseli.png'),
(12, 'Caramel Vanila Latte', 'drinks', 20000, 22, 'icecaramel.png'),
(13, 'Coffe Latte', 'drinks', 20000, 20, 'late.png'),
(14, 'Dolce Latte', 'drinks', 20000, 11, 'dolce.png'),
(15, 'Chicken Teriyaki', 'meat\r\n', 16000, 10, 'teriyaki.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kantor_cabang`
--

CREATE TABLE `kantor_cabang` (
  `id_kantor_cabang` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_kantor_cabang` varchar(100) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kantor_cabang`
--

INSERT INTO `kantor_cabang` (`id_kantor_cabang`, `username`, `password`, `nama_kantor_cabang`, `no_telp`, `alamat`) VALUES
(1, 'as', '123', 'as', '392373', 'sa'),
(2, 'jj', '123', 'jj', '12332', 'jj'),
(3, 'rr', '123', 'rr', '12312', 'rr');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kantor_pusat`
--

CREATE TABLE `kantor_pusat` (
  `id_kantor_pusat` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_kantor_pusat` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `pimpinan` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_npwp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kantor_pusat`
--

INSERT INTO `kantor_pusat` (`id_kantor_pusat`, `username`, `password`, `nama_kantor_pusat`, `alamat`, `pimpinan`, `email`, `no_npwp`) VALUES
(1, 'misyaw', '123', 'Dewa City', 'Bukit Tinggi, Medan Sumatra Barat', 'Mrs.Sty', 'sty@gmail.com', 323244),
(2, 'lawsontkv', '123', 'PT ARKTIK', 'Jln.Gatot Subroto Senayan', 'Mr.Jokowi', 'owi@gmail.com', 3829222),
(4, 'metrostation', '123', 'Metro United', 'Depok, Jawa Barat Indonesia', 'Mr.Hokky Prananowo', 'hokky3@gmail.com', 328787);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir`
--

CREATE TABLE `kasir` (
  `id_kasir` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kasir`
--

INSERT INTO `kasir` (`id_kasir`, `username`, `password`, `nama`) VALUES
(4, 'kandias', '123', 'budiono siregar'),
(5, 'ndaa', '123', 'Adinda Angesti Chandra'),
(7, 'shin', '123', 'shin tae yong');

-- --------------------------------------------------------

--
-- Struktur dari tabel `logging`
--

CREATE TABLE `logging` (
  `kejadian` varchar(100) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `logging`
--

INSERT INTO `logging` (`kejadian`, `time`) VALUES
('Tambah Data', '2023-10-03 19:12:58'),
('Tambah Data', '2023-10-04 10:44:08'),
('Hapus Data', '2023-10-05 00:32:34'),
('Hapus Data', '2023-10-05 00:32:34'),
('Tambah Data', '2023-10-05 00:37:09'),
('Hapus Data', '2023-10-05 20:09:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nama_member` varchar(50) NOT NULL,
  `jumlah_poin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `nama_member`, `jumlah_poin`) VALUES
(1, 'kandi', 110),
(2, 'haykal', 33),
(3, 'langs', 55);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_harga` int(11) NOT NULL,
  `diskon` varchar(50) NOT NULL,
  `voucher` int(11) NOT NULL,
  `ppn` int(11) NOT NULL,
  `poin` int(11) NOT NULL,
  `uang_jumlah` int(11) NOT NULL,
  `uang_kembali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_kasir`, `id_member`, `tanggal`, `total_harga`, `diskon`, `voucher`, `ppn`, `poin`, `uang_jumlah`, `uang_kembali`) VALUES
(57, 4, 1, '2023-10-16 08:34:55', 14900, '1000', 200, 1100, 10, 21000, 6100),
(58, 4, 2, '2023-10-20 07:49:11', 14900, '1000', 200, 1100, 10, 20000, 5100),
(59, 5, 1, '2023-10-20 13:54:28', 14900, '1000', 200, 1100, 10, 21000, 6100),
(60, 4, 3, '2023-10-20 13:55:35', 9900, '1000', 200, 1100, 10, 10000, 100),
(61, 5, 1, '2023-10-21 03:27:42', 19400, '1000', 200, 1100, 10, 20000, 600),
(62, 4, 1, '2023-10-31 12:45:33', 15900, '1000', 200, 1100, 10, 16000, 100),
(63, 5, 3, '2023-10-31 12:47:02', 6000, '0', 0, 0, 0, 10000, 4000),
(64, 4, 2, '2023-10-31 12:49:08', 16900, '1000', 200, 1100, 10, 17000, 100),
(65, 7, 1, '2023-10-31 12:59:25', 23000, '2000', 500, 1500, 30, 25000, 2000),
(67, 5, 1, '2023-10-31 13:04:24', 23000, '2000', 500, 1500, 30, 25000, 2000),
(68, 4, 1, '2023-11-06 03:29:31', 28700, '3000', 1000, 1700, 70, 30000, 1300);

--
-- Trigger `transaksi`
--
DELIMITER $$
CREATE TRIGGER `tambah poin` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN
  UPDATE member SET jumlah_poin=jumlah_poin+NEW.poin
  WHERE id_member = NEW.id_member;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_android`
--

CREATE TABLE `transaksi_android` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `barang` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi_android`
--

INSERT INTO `transaksi_android` (`id`, `nama`, `tanggal`, `barang`, `harga`, `qty`, `subtotal`, `bayar`, `kembali`) VALUES
(1, 'Kandia', '2023-11-22 17:00:00', 'Mie Ayam', 15000, 2, 30000, 35000, 5000),
(3, 'Dinda', '0000-00-00 00:00:00', 'Bakso', 15000, 2, 30000, 35000, 5000),
(4, 'hh', '2023-11-10 17:00:00', 'hh', 3, 3, 9, 10, 1),
(5, 'Heri ', '2023-11-11 02:17:53', 'es teh', 5000, 2, 10000, 11000, 1000);

--
-- Trigger `transaksi_android`
--
DELIMITER $$
CREATE TRIGGER `aritmatika` BEFORE INSERT ON `transaksi_android` FOR EACH ROW BEGIN
  DECLARE total INT;
  SET total = NEW.harga * NEW.qty;
  SET NEW.subtotal = total;
  IF NEW.bayar IS NOT NULL THEN
    IF NEW.subtotal <= NEW.bayar THEN
      SET NEW.kembali = NEW.bayar - NEW.subtotal;
    ELSE
      SET NEW.kembali = 0;
    END IF;
  END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `set_tanggal_sekarang` BEFORE INSERT ON `transaksi_android` FOR EACH ROW SET NEW.tanggal = CURRENT_TIMESTAMP
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_menu`
--

CREATE TABLE `transaksi_menu` (
  `id_transaksi_menu` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi_menu`
--

INSERT INTO `transaksi_menu` (`id_transaksi_menu`, `id_transaksi`, `id_barang`, `qty`) VALUES
(34, 57, 3, 1),
(35, 58, 3, 1),
(36, 59, 3, 1),
(37, 60, 8, 1),
(38, 61, 1, 1),
(39, 61, 15, 1),
(40, 62, 9, 1),
(41, 62, 8, 1),
(42, 63, 9, 1),
(43, 64, 2, 2),
(44, 65, 10, 1),
(45, 67, 10, 1),
(46, 68, 3, 1),
(47, 68, 15, 1);

--
-- Trigger `transaksi_menu`
--
DELIMITER $$
CREATE TRIGGER `kurangi stok` AFTER INSERT ON `transaksi_menu` FOR EACH ROW BEGIN
  UPDATE barang SET stok=stok-NEW.qty
  WHERE id_barang = NEW.id_barang;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `kantor_cabang`
--
ALTER TABLE `kantor_cabang`
  ADD PRIMARY KEY (`id_kantor_cabang`);

--
-- Indeks untuk tabel `kantor_pusat`
--
ALTER TABLE `kantor_pusat`
  ADD PRIMARY KEY (`id_kantor_pusat`);

--
-- Indeks untuk tabel `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`id_kasir`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_kasir` (`id_kasir`),
  ADD KEY `id_member` (`id_member`);

--
-- Indeks untuk tabel `transaksi_android`
--
ALTER TABLE `transaksi_android`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi_menu`
--
ALTER TABLE `transaksi_menu`
  ADD PRIMARY KEY (`id_transaksi_menu`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_barang` (`id_barang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `kantor_cabang`
--
ALTER TABLE `kantor_cabang`
  MODIFY `id_kantor_cabang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kantor_pusat`
--
ALTER TABLE `kantor_pusat`
  MODIFY `id_kantor_pusat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kasir`
--
ALTER TABLE `kasir`
  MODIFY `id_kasir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT untuk tabel `transaksi_android`
--
ALTER TABLE `transaksi_android`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `transaksi_menu`
--
ALTER TABLE `transaksi_menu`
  MODIFY `id_transaksi_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_4` FOREIGN KEY (`id_kasir`) REFERENCES `kasir` (`id_kasir`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi_menu`
--
ALTER TABLE `transaksi_menu`
  ADD CONSTRAINT `transaksi_menu_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_menu_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

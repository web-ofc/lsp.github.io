-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2023 at 11:25 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kasirrestoran_mrizkyperdana`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_menu`
--

CREATE TABLE `log_menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(225) NOT NULL,
  `keterangan` varchar(125) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_menu`
--

INSERT INTO `log_menu` (`id_menu`, `nama_menu`, `keterangan`, `waktu`) VALUES
(12, 'Ayam Penyet', 'Data Menu Diperbarui', '2023-02-01 13:50:57'),
(6, 'Cilok', 'Data Menu Diperbarui', '2023-02-01 13:51:32'),
(12, 'Ayam Penyet', 'Data Menu Diperbarui', '2023-02-01 13:52:51'),
(9, 'Nasi Goreng', 'Data Menu Diperbarui', '2023-02-01 13:53:03'),
(6, 'Cilok', 'Data Menu Diperbarui', '2023-02-01 13:53:13'),
(6, 'Cilok', 'Data Menu Diperbarui', '2023-02-01 15:13:58'),
(14, 'Mie Ayam', 'Data Menu Baru', '2023-02-01 16:58:53'),
(15, 'Kebab', 'Data Menu Baru', '2023-02-01 16:59:10'),
(16, 'Salad', 'Data Menu Baru', '2023-02-01 17:00:52'),
(17, 'Kue Pukis', 'Data Menu Baru', '2023-02-01 17:02:07'),
(18, 'Cucur', 'Data Menu Baru', '2023-02-01 17:02:37'),
(19, 'Kopi Susu', 'Data Menu Baru', '2023-02-01 17:02:54'),
(20, 'Green Tea', 'Data Menu Baru', '2023-02-01 17:03:20'),
(6, 'Cilok', 'Data Menu Dihapus', '2023-02-01 17:10:00'),
(21, 'Risole', 'Data Menu Baru', '2023-02-01 17:11:25'),
(22, 'Fortune Cookie', 'Data Menu Baru', '2023-02-01 17:11:45'),
(18, 'Cucur', 'Data Menu Dihapus', '2023-02-01 17:11:51'),
(15, 'Kebab', 'Data Menu Diperbarui', '2023-02-01 17:16:14'),
(15, 'Kebab', 'Data Menu Diperbarui', '2023-02-01 17:20:19');

-- --------------------------------------------------------

--
-- Table structure for table `log_user`
--

CREATE TABLE `log_user` (
  `keterangan` varchar(225) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `kategori_menu` varchar(25) NOT NULL,
  `harga_menu` varchar(125) NOT NULL,
  `stok_menu` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `kategori_menu`, `harga_menu`, `stok_menu`) VALUES
(7, 'Martabak Manis', 'Dessert', '25000', '97'),
(8, 'Es Teh Manis', 'Drink', '10000', '100'),
(9, 'Nasi Goreng', 'Main Course', '25000', '288'),
(12, 'Ayam Penyet', 'Main Course', '35000', '218'),
(14, 'Mie Ayam', 'Main Course', '30000', '100'),
(15, 'Kebab', 'Appetizer', '15000', '198'),
(16, 'Salad', 'Appetizer', '25000', '100'),
(17, 'Kue Pukis', 'Dessert', '25000', '100'),
(19, 'Kopi Susu', 'Drink', '10000', '100'),
(20, 'Green Tea', 'Drink', '17000', '100'),
(21, 'Risole', 'Appetizer', '15000', '100'),
(22, 'Fortune Cookie', 'Dessert', '27000', '100');

--
-- Triggers `menu`
--
DELIMITER $$
CREATE TRIGGER `LogDel_Menu` AFTER DELETE ON `menu` FOR EACH ROW INSERT INTO log_menu VALUES(OLD.id_menu, OLD.nama_menu, "Data Menu Dihapus", now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `LogIns_Menu` AFTER INSERT ON `menu` FOR EACH ROW INSERT INTO log_menu VALUES(NEW.id_menu, NEW.nama_menu, "Data Menu Baru", now())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `LogUpd_Menu` AFTER UPDATE ON `menu` FOR EACH ROW INSERT INTO log_menu VALUES(NEW.id_menu, NEW.nama_menu, "Data Menu Diperbarui", now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id_pemasukan` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `stok_masuk` varchar(125) NOT NULL,
  `tgl_pemasukan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`id_pemasukan`, `id_menu`, `stok_masuk`, `tgl_pemasukan`) VALUES
(4, 12, '100', '2023-02-01 07:52:44'),
(5, 9, '200', '2023-02-01 13:52:53'),
(7, 15, '100', '2023-02-01 17:20:19');

--
-- Triggers `pemasukan`
--
DELIMITER $$
CREATE TRIGGER `Pemasukan_Produk` AFTER INSERT ON `pemasukan` FOR EACH ROW BEGIN
UPDATE menu
SET menu.stok_menu = stok_menu + NEW . stok_masuk
WHERE id_menu = NEW . id_menu;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `qty` varchar(125) NOT NULL,
  `total_harga` varchar(125) NOT NULL,
  `uang_bayar` varchar(125) DEFAULT NULL,
  `uang_kembali` varchar(125) DEFAULT NULL,
  `status_pesanan` varchar(25) NOT NULL,
  `tgl_pesanan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_menu`, `nama_pelanggan`, `qty`, `total_harga`, `uang_bayar`, `uang_kembali`, `status_pesanan`, `tgl_pesanan`) VALUES
(6, 9, 'Kyana', '2', '50000', '50000', '0', 'Sudah Dibayar', '2023-02-01 09:00:05'),
(12, 12, 'Perdana', '2', '70000', '100000', '30000', 'Sudah Dibayar', '2023-02-01 13:49:59'),
(15, 15, 'Perdana', '2', '30000', '50000', '20000', 'Sudah Dibayar', '2023-02-01 17:16:14');

--
-- Triggers `pesanan`
--
DELIMITER $$
CREATE TRIGGER `Pengurangan_Produk` AFTER INSERT ON `pesanan` FOR EACH ROW BEGIN 
	UPDATE menu SET menu.stok_menu = stok_menu - NEW.qty
    WHERE menu.id_menu = NEW.id_menu;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(25) NOT NULL,
  `role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `role`) VALUES
(1, 'Admin', 'admin@admin.com', '1', 'Administrator'),
(2, 'Kasir', 'kasir@gmail.com', '123', 'Kasir'),
(4, 'kasir2', 'kasir2@gmail.com', '123', 'Kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_menu`
--
ALTER TABLE `log_menu`
  ADD KEY `log_menu_ibfk_1` (`id_menu`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD CONSTRAINT `pemasukan_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

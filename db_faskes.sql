-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2022 at 01:47 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_faskes`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL,
  `marker` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `marker`, `created_at`, `updated_at`) VALUES
(1, 'Rumah Sakit', '1643653865_dc248ec09dd5d0de76f2.png', NULL, '2022-01-31 12:31:05'),
(2, 'Puskesmas', '1643653838_6b31943461f85d7defac.png', NULL, '2022-01-31 12:30:38'),
(3, 'Klinik', '1643653817_2560cbcc0f4712c16880.png', '2022-01-29 11:48:24', '2022-01-31 12:30:17'),
(4, 'Dokter Praktek', '1643653934_fdc00c81e9aae4ea2ef3.png', '2022-01-29 22:13:10', '2022-01-31 12:32:14'),
(6, 'Apotek', '1643653773_ce441c368c5490431d0f.png', '2022-01-30 11:46:32', '2022-01-31 12:29:33'),
(7, 'LAB', '1643650125_845c0f30cfc822498a9c.png', '2022-01-31 11:28:45', '2022-01-31 11:28:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faskes`
--

CREATE TABLE `tbl_faskes` (
  `id_faskes` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_faskes` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `layanan` text DEFAULT NULL,
  `latitude` varchar(45) DEFAULT NULL,
  `longitude` varchar(45) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_faskes`
--

INSERT INTO `tbl_faskes` (`id_faskes`, `id_kategori`, `nama_faskes`, `alamat`, `telp`, `layanan`, `latitude`, `longitude`, `foto`, `created_at`, `updated_at`) VALUES
(9, 1, 'Sarila Husada Hospital', 'Jl. Veteran No. 41 - 43, Kroyo, Kecamatan Sragen, Kroyo, Kec. Karangmalang, Kabupaten Sragen, Jawa Tengah 57211', '+62271891194', 'Rawat inap', '-7.475391', '110.9411364', '1644164571_5cf4bb83c6e8909a7bd0.jpg', '2022-02-06 10:19:53', '2022-02-06 10:22:51'),
(13, 1, 'Puskesmas kedawung', 'Kedawung', '+62271891194', 'Rawat inap', '-7.4355274', '111.0239343', '1645536752_3c38b1db509848d84b3d.jpg', '2022-02-22 07:32:32', '2022-02-22 07:32:32'),
(14, 6, 'Apotek Kimia Farma', 'Jl. Sukowati No.440a, Dusun Kebayanan Sragen Manggis, Sragen Wetan, Kec. Sragen, Kabupaten Sragen, Jawa Tengah 57214', '0271892209', 'Sedia berbagai jenis obat', '-7.4240846', '111.0294738', '1646320128_1df804bc2467ffdaa769.jpg', '2022-03-03 09:08:48', '2022-03-03 09:08:48'),
(15, 1, 'RSU. Rizky Amalia', 'Jalan Jenderal Ahmad Yani Cantel Wetan No.100, Kutorejo, Sragen Tengah, Kec. Sragen, Kabupaten Sragen, Jawa Tengah 57211Jalan Jenderal Ahmad Yani Cantel Wetan No.100, Kutorejo, Sragen Tengah, Kec. Sragen, Kabupaten Sragen, Jawa Tengah 57211', '02718823814', 'Rawat inap', '-7.4200151', '111.0293021', '1646320430_96d574757b2734ea7a12.jpg', '2022-03-03 09:13:50', '2022-03-03 09:13:50'),
(16, 1, 'RSU Mardi Lestari', 'Jl. Rokan No.2, Magero, Sragen Tengah, Kec. Sragen, Kabupaten Sragen, Jawa Tengah 57251', '0271891033', 'Rawat inap', '-7.4363185', '111.0209237', '1646320583_d752ed0332416cbcdcb6.jpg', '2022-03-03 09:16:23', '2022-03-03 09:16:23'),
(17, 3, 'Klinik Aisyiyah ', 'Jl. Maospati - Solo No.10, Dusun Kebayanan Krajoyok, Sragen Wetan, Kec. Sragen, Kabupaten Sragen, Jawa Tengah 57214', '0271892889', 'Rawat inap', '-7.4307862', '111.0165034', '1646320739_6736b5617e80508bbd20.jpg', '2022-03-03 09:18:59', '2022-03-03 09:18:59'),
(18, 3, 'Klinik Dr. Prasetyo Budi', 'H2HP+68V, Dusun Kebayanan Sragen Manggis, Sragen Wetan, Kec. Sragen, Kabupaten Sragen, Jawa Tengah 57214', '085106007111', 'Rawat inap', '-7.4261051', '111.0216532', '1646321023_6d5b665a455351f58388.jpg', '2022-03-03 09:23:43', '2022-03-03 09:23:43'),
(19, 7, 'Laboratorium Klinik Budi Sehat', 'Jl. HOS. Cokroaminoto, Dusun Kebayanan Sragen Manggis, Sragen Wetan, Kec. Sragen, Kabupaten Sragen, Jawa Tengah 57214', '02715890919', 'lab', '-7.425104881330277', '111.03255370170444', '1646322851_6fb646e97b4f0e49a019.jpg', '2022-03-03 09:54:11', '2022-03-03 10:07:36'),
(20, 7, 'Laboratorium Kesehatan Kab. Sragen', 'Jl. Sukowati, Kebayan 1, Sragen Kulon, Kec. Sragen, Kabupaten Sragen, Jawa Tengah 57212', '0271891078', 'lab', '-7.428907976500551', '111.0145823491532', '1646322969_eef74a57108629ab66cb.jpg', '2022-03-03 09:56:09', '2022-03-03 10:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

CREATE TABLE `user_admin` (
  `id_user` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_admin`
--

INSERT INTO `user_admin` (`id_user`, `username`, `nama`, `password`, `created_at`, `updated_at`) VALUES
(9, 'admin', 'Hanan', '$2y$10$lpBQ8DESOgGWtVXUOjtgOuCeTOWA8tyO3ykNoZi4yxbqSKsB0F8Fm', '2022-02-19 08:15:09', '2022-02-19 08:15:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_faskes`
--
ALTER TABLE `tbl_faskes`
  ADD PRIMARY KEY (`id_faskes`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_faskes`
--
ALTER TABLE `tbl_faskes`
  MODIFY `id_faskes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_faskes`
--
ALTER TABLE `tbl_faskes`
  ADD CONSTRAINT `tbl_faskes_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2021 at 06:16 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webgis`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_master_data` int(11) UNSIGNED NOT NULL,
  `kode_wilayah` varchar(7) NOT NULL,
  `nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `id_master_data`, `kode_wilayah`, `nilai`) VALUES
(36, 4, '1', 5),
(37, 4, '2', 6),
(38, 4, '3', 6),
(39, 4, '4', 5),
(40, 4, '5', 8),
(41, 4, '6', 5),
(42, 4, '7', 7),
(43, 4, '8', 6),
(44, 4, '9', 7),
(45, 4, '10', 6),
(46, 4, '11', 7),
(47, 4, '12', 9),
(48, 4, '13', 5),
(49, 4, '14', 7),
(50, 4, '15', 7),
(51, 4, '16', 5),
(52, 4, '17', 6),
(53, 4, '18', 6),
(54, 4, '19', 7),
(55, 4, '20', 6);

-- --------------------------------------------------------

--
-- Table structure for table `kode_wilayah`
--

CREATE TABLE `kode_wilayah` (
  `id` int(11) UNSIGNED NOT NULL,
  `kode_wilayah` varchar(7) NOT NULL,
  `nama_wilayah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kode_wilayah`
--

INSERT INTO `kode_wilayah` (`id`, `kode_wilayah`, `nama_wilayah`) VALUES
(43, '1', 'Teluk Betung Barat'),
(44, '2', 'Teluk Betung Timur'),
(45, '3', 'Teluk Betung Selatan'),
(46, '4', 'Bumi Waras'),
(47, '5', 'Panjang'),
(48, '6', 'Tanjung Karang Timur'),
(49, '7', 'Kedamaian'),
(50, '8', 'Teluk Betung Utara'),
(51, '9', 'Tanjung Karang Pusat'),
(52, '10', 'Enggal'),
(53, '11', 'Tanjung Karang Barat'),
(54, '12', 'Kemiling'),
(55, '13', 'Langkapura'),
(56, '14', 'Kedaton'),
(57, '15', 'Rajabasa'),
(58, '16', 'Tanjung Senang'),
(59, '17', 'Labuhan Ratu'),
(60, '18', 'Sukarame'),
(61, '19', 'Sukabumi'),
(62, '20', 'Way Halim');

-- --------------------------------------------------------

--
-- Table structure for table `master_data`
--

CREATE TABLE `master_data` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `master_data`
--

INSERT INTO `master_data` (`id`, `nama`) VALUES
(4, 'Jumlah Kelurahan tiap Kecamatan di Bandar Lampung');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2021-07-08-001654', 'App\\Database\\Migrations\\MasterData', 'default', 'App', 1625787642, 1),
(2, '2021-07-08-001724', 'App\\Database\\Migrations\\KodeWilayah', 'default', 'App', 1625787643, 1),
(3, '2021-07-08-001748', 'App\\Database\\Migrations\\Data', 'default', 'App', 1625787643, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_id_master_data_foreign` (`id_master_data`);

--
-- Indexes for table `kode_wilayah`
--
ALTER TABLE `kode_wilayah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_data`
--
ALTER TABLE `master_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `kode_wilayah`
--
ALTER TABLE `kode_wilayah`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `master_data`
--
ALTER TABLE `master_data`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `data_id_master_data_foreign` FOREIGN KEY (`id_master_data`) REFERENCES `master_data` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

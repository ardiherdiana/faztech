-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 03, 2025 at 05:26 AM
-- Server version: 8.4.3
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faztech`
--

-- --------------------------------------------------------

--
-- Table structure for table `kontak_form`
--

CREATE TABLE `kontak_form` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jenis_properti` varchar(100) NOT NULL,
  `catatan` text,
  `tanggal_dibuat` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kontak_form`
--

INSERT INTO `kontak_form` (`id`, `nama`, `telepon`, `email`, `jenis_properti`, `catatan`, `tanggal_dibuat`) VALUES
(1, 'Ardi Herdiana', '+6281234567890', 'user@faztech.com', 'Rumah Tinggal', 'a', '2025-06-02 06:13:15'),
(2, 'User 1', '+6281234567890', 'user@faztech.com', 'Gudang', 'test', '2025-06-02 07:27:11');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `harga` decimal(15,2) NOT NULL,
  `stok` int NOT NULL DEFAULT '0',
  `deskripsi` text,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tanggal_diperbarui` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `kategori`, `harga`, `stok`, `deskripsi`, `gambar`, `tanggal_dibuat`, `tanggal_diperbarui`) VALUES
(9, 'CCTV 1', 'CCTV', '5000000.00', 10, 'Kamera CCTV berkualitas tinggi dengan resolusi HD untuk keamanan optimal', '8e45e765f5347b6cfc3e7a8726d69195.jpeg', '2025-06-02 07:06:16', '2025-06-02 07:06:52'),
(10, 'CCTV 2', 'CCTV', '5000000.00', 10, 'Kamera CCTV outdoor tahan cuaca dengan night vision', '130d21075e7a15114ff3dc39c1e1378f.jpeg', '2025-06-02 07:06:16', '2025-06-02 07:06:58'),
(11, 'Finger Print', 'Akses Control', '7000000.00', 10, 'Sistem akses kontrol sidik jari dengan teknologi terkini', '8fc4642405ac1ee995e2445fd2a85163.jpeg', '2025-06-02 07:06:16', '2025-06-02 07:07:03'),
(12, 'Router 1', 'Router', '1000000.00', 10, 'Router wireless dengan kecepatan tinggi untuk jaringan stabil', 'fc20cacc874203c3ba2e2c7457cac3ac.jpeg', '2025-06-02 07:06:16', '2025-06-02 07:07:10'),
(13, 'Router 2', 'Router', '1000000.00', 10, 'Router enterprise grade untuk kebutuhan bisnis', 'ed42bd4faec8a62574b8161fec0e03e1.jpeg', '2025-06-02 07:06:16', '2025-06-02 07:07:17'),
(14, 'TCP/IP', 'Kabel', '2000000.00', 10, 'Kabel jaringan TCP/IP berkualitas tinggi', '8bc8df5aa5da90b64c4f9748c1b9f730.jpeg', '2025-06-02 07:06:16', '2025-06-02 07:07:23'),
(15, 'Finger Print', 'Akses Control', '2500000.00', 1, '1', 'a3408036ccb0336c5e81d4d562a11a32.jpeg', '2025-06-03 01:26:42', '2025-06-03 01:26:42'),
(16, 'CCTV Indoor HD 1080P', 'CCTV', '1000.00', 1, '1', 'ed5357cb532bf83620f62a48649d701b.jpeg', '2025-06-03 01:27:00', '2025-06-03 01:27:00'),
(17, 'Finger Print', 'Akses Control', '100000.00', 2, '1', 'ae0c28dd75a83d45ab9a289e8686ba6b.jpeg', '2025-06-03 01:27:22', '2025-06-03 01:27:22');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `rating` int NOT NULL DEFAULT '5',
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tanggal_diperbarui` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id`, `nama`, `jabatan`, `rating`, `deskripsi`, `gambar`, `tanggal_dibuat`, `tanggal_diperbarui`) VALUES
(1, 'Ardi Herdiana 1', 'Web 3 Developer', 5, 'Pelayanan sangat memuaskan dan produk berkualitas tinggi. Sangat direkomendasikan untuk kebutuhan security sistem.', '1ee13d4d450594d60793f14d9a8f04c5.jpeg', '2025-06-01 11:30:37', '2025-06-01 12:36:14'),
(2, 'Ardi Herdiana 2', 'Frontend Web', 5, 'Tim yang profesional dan responsif. Setup CCTV berjalan lancar tanpa kendala.', '1d7d732673bd371056375836245e1e7f.jpeg', '2025-06-01 11:30:37', '2025-06-01 12:35:47'),
(3, 'Ardi Herdiana 3', 'Machine Learning Engineer', 5, 'Sistem keamanan yang dipasang bekerja dengan sempurna. Kualitas gambar jernih dan sistem stabil.', '6b7562757d02cf465b3a81dc3266c11f.jpeg', '2025-06-01 11:30:37', '2025-06-01 12:33:56'),
(5, 'User 1', 'Data Analyst', 1, 'wejkfg pweijgoiwhge', '', '2025-06-03 03:18:46', '2025-06-03 03:18:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kata_sandi` varchar(255) NOT NULL,
  `peran` enum('admin','user') NOT NULL DEFAULT 'user',
  `tanggal_dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tanggal_diperbarui` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_lengkap`, `email`, `kata_sandi`, `peran`, `tanggal_dibuat`, `tanggal_diperbarui`) VALUES
(1, 'Administrator', 'admin@faztech.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', '2025-06-01 11:30:37', '2025-06-01 11:30:37'),
(3, 'Ardi Herdiana', 'user@faztech.com', '$2y$10$H/yqZd94L.kTkW2dE5j4lu/8.7278qk5jkDuuFtBv0ltzYcpRTjim', 'user', '2025-06-01 12:38:32', '2025-06-01 12:38:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kontak_form`
--
ALTER TABLE `kontak_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kontak_form`
--
ALTER TABLE `kontak_form`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

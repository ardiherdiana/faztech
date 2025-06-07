-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 07, 2025 at 03:31 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `nama`, `foto`, `tanggal_dibuat`) VALUES
(1, 'Proyek CCTV Toko ABC', '00bbc77c2cafd9ade68fa6806e4e3828.jpeg', '2025-06-05 12:13:18'),
(2, 'Instalasi Akses Control Kantor XYZ', '051549e7c438bf3bfd3cc567a3b1d066.jpeg', '2025-06-05 12:13:18'),
(3, 'Pemasangan Router Wireless Hotel DEF', '57cee9f00dffbe2d1821288a0252a8fb.jpeg', '2025-06-05 12:13:18');

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
(9, 'CCTV 1', 'CCTV', 5000000.00, 10, 'Kamera CCTV berkualitas tinggi dengan resolusi HD untuk keamanan optimal', '8e45e765f5347b6cfc3e7a8726d69195.jpeg', '2025-06-02 07:06:16', '2025-06-02 07:06:52'),
(10, 'CCTV 2', 'CCTV', 5000000.00, 10, 'Kamera CCTV outdoor tahan cuaca dengan night vision', '130d21075e7a15114ff3dc39c1e1378f.jpeg', '2025-06-02 07:06:16', '2025-06-02 07:06:58'),
(11, 'Finger Print', 'Akses Control', 7000000.00, 10, 'Sistem akses kontrol sidik jari dengan teknologi terkini', '8fc4642405ac1ee995e2445fd2a85163.jpeg', '2025-06-02 07:06:16', '2025-06-02 07:07:03'),
(12, 'Router 1', 'Router', 1000000.00, 10, 'Router wireless dengan kecepatan tinggi untuk jaringan stabil', 'fc20cacc874203c3ba2e2c7457cac3ac.jpeg', '2025-06-02 07:06:16', '2025-06-02 07:07:10'),
(13, 'Router 2', 'Router', 1000000.00, 10, 'Router enterprise grade untuk kebutuhan bisnis', 'ed42bd4faec8a62574b8161fec0e03e1.jpeg', '2025-06-02 07:06:16', '2025-06-02 07:07:17'),
(14, 'TCP/IP', 'Kabel', 2000000.00, 10, 'Kabel jaringan TCP/IP berkualitas tinggi', '8bc8df5aa5da90b64c4f9748c1b9f730.jpeg', '2025-06-02 07:06:16', '2025-06-02 07:07:23'),
(15, 'Finger Print', 'Akses Control', 2500000.00, 1, '1', 'a3408036ccb0336c5e81d4d562a11a32.jpeg', '2025-06-03 01:26:42', '2025-06-03 01:26:42'),
(16, 'CCTV Indoor HD 1080P', 'CCTV', 1000.00, 1, '1', 'ed5357cb532bf83620f62a48649d701b.jpeg', '2025-06-03 01:27:00', '2025-06-03 01:27:00'),
(17, 'Finger Print', 'Akses Control', 100000.00, 2, '\r\n            Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae porro minima odio repudiandae, perspiciatis delectus perferendis id unde mollitia, blanditiis nobis necessitatibus consequuntur totam labore atque aut ratione. Accusantium asperiores modi distinctio? Et, consequatur odio. Tenetur dolore ut rem repellat beatae cupiditate corrupti similique omnis aperiam doloribus, est vel earum magni consectetur aspernatur nihil quae incidunt fugiat, quasi itaque error hic. Asperiores iusto magnam inventore numquam modi tenetur vitae neque! Quas aperiam repudiandae natus eveniet iste. Nemo commodi eius veniam aperiam culpa dignissimos perferendis, est laudantium sapiente beatae officiis at tempora dolor impedit sit rem ex itaque. Impedit, exercitationem tempora?', 'ae0c28dd75a83d45ab9a289e8686ba6b.jpeg', '2025-06-03 01:27:22', '2025-06-05 08:40:59');

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
(1, 'Rahmat Panjiro', 'Warnet', 5, 'CCTV-nya kualitas jernih banget, bahkan malam hari tetap kelihatan jelas. Sekarang saya bisa pantau toko kapan saja, bahkan saat saya di rumah. Layanan aftersales juga mantap!', '1ee13d4d450594d60793f14d9a8f04c5.jpeg', '2025-06-01 11:30:37', '2025-06-05 08:56:02'),
(2, 'Kartono Jayadi', 'Manager Operasional', 5, 'Kami mempercayakan sistem keamanan kantor ke [Nama Perusahaan], mulai dari alarm, CCTV, hingga akses pintu otomatis. Timnya responsif, dan hasilnya sangat memuaskan.', '1d7d732673bd371056375836245e1e7f.jpeg', '2025-06-01 11:30:37', '2025-06-05 09:01:24'),
(3, 'Ardi Herdiana', 'Kepala Sekolah', 5, 'Sekarang orang tua murid merasa lebih tenang karena area sekolah terpantau 24 jam. Rekaman juga bisa dicek sewaktu-waktu. Terima kasih untuk pelayanan terbaiknya.', '6b7562757d02cf465b3a81dc3266c11f.jpeg', '2025-06-01 11:30:37', '2025-06-05 09:01:32'),
(5, 'Budi Sucipto', 'Pemilik Rumah', 5, 'Setelah pasang CCTV dari FazTech, saya jadi merasa jauh lebih tenang. Setiap sudut rumah bisa diawasi langsung dari HP. Proses pemasangan cepat dan teknisinya sangat profesional.', 'fca310e8b5118b09f1c1567aa4d4bae5.jpeg', '2025-06-03 03:18:46', '2025-06-05 09:02:06'),
(6, 'Arifin Julian', 'Pemilik Kos', 5, 'Pasang CCTV di area kos bikin suasana jadi lebih aman dan nyaman untuk penghuni. Semua sudut penting terpantau. Harga terjangkau, kualitas top.', '1416817858a9e6e42de4610bf65e3722.jpeg', '2025-06-05 08:58:03', '2025-06-05 08:58:03');

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
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
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
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

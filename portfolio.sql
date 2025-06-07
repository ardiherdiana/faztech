-- Tabel Portfolio untuk FazTech
CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert sample data
INSERT INTO `portfolio` (`nama`, `foto`) VALUES
('Proyek CCTV Toko ABC', NULL),
('Instalasi Akses Control Kantor XYZ', NULL),
('Pemasangan Router Wireless Hotel DEF', NULL); 
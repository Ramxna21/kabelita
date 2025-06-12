-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 12, 2025 at 03:40 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kabelita`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id_gallery` varchar(100) NOT NULL,
  `id_kategori` varchar(100) NOT NULL,
  `nama_gallery` varchar(100) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `tgl_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `id_kategori`, `nama_gallery`, `ket`, `file`, `tgl_upload`) VALUES
('2854bf67-6f53-11ee-8d63-93f0fa14750d', 'cat1', 'Berita Perusahaan', 'Libur tanggal merah hari waisak', 'cc5738766eaf8be3df395463c26c00bf.jpg', '2025-05-06 21:23:58'),
('32007824-6f53-11ee-8d63-93f0fa14750d', 'cat2', 'Lowongan', 'Dibuka lowongan untuk lulusan S1', 'f45b8af4da585f4d28169dc6615da163.jpg', '2025-05-06 21:24:37'),
('3c26117d-6f53-11ee-8d63-93f0fa14750d', '2b58f202-4794-11f0-99ab-f4b3012bd4f4', 'Anniversary 15th', 'Memperingati tahun ke 15 PT. CRT Kabelita', 'd20da4ada29a7a87094ff33043d8cdb7.jpg', '2025-06-12 14:01:58'),
('7054a42c-479a-11f0-99ab-f4b3012bd4f4', '3fec3a8a-4794-11f0-99ab-f4b3012bd4f4', 'Charger', 'www', '4270bbce0b45c0af4950eac92165bfa7.png', '2025-06-12 14:35:08');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_karyawan` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `jk` varchar(2) COLLATE utf8mb4_general_ci NOT NULL,
  `tempat_lahir` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `no_telp` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `jk`, `tempat_lahir`, `tgl_lahir`, `alamat`, `no_telp`) VALUES
('a0506332-8c23-11ee-bfa4-704d7b67aaac', 'Ilma Ilana', '--', 'Batam', '1999-10-12', 'Tanjung Uban', '087521456496'),
('cc6bc220-8c23-11ee-bfa4-704d7b67aaac', 'Tree Evryanti', 'P', 'Tanjung Pinang', '1994-12-25', 'Teluk Sasah', '08121565156'),
('f2c0ab40-8c23-11ee-bfa4-704d7b67aaac', 'Surya Miranti', 'P', 'Kawal', '1992-09-12', 'Sungai Kecil', '08126419684'),
('f4099419-6f48-11ee-8d63-93f0fa14750d', 'Nina Firda', 'P', 'Tanjung Pinang', '1995-02-20', 'Tanjung Permai', '081245863547');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_kategori` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
('2b58f202-4794-11f0-99ab-f4b3012bd4f4', 'Celebration'),
('3846054f-4794-11f0-99ab-f4b3012bd4f4', 'Vacation'),
('3fec3a8a-4794-11f0-99ab-f4b3012bd4f4', 'Other'),
('cat1', 'Exhibition'),
('cat2', 'Gathering'),
('cat3', 'Training');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `pesan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `nama`, `no_hp`, `subject`, `pesan`) VALUES
('794a0ad3-9efd-11ee-a091-e8f40802874d', 'Test', '09870708709', 'Komplain', 'test'),
('7e8d5d3e-91ea-11ee-a7c1-704d7b67aaac', 'Amira', '085421654651', 'Nice', 'Terimakasih');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_pelanggan` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `jk` varchar(2) COLLATE utf8mb4_general_ci NOT NULL,
  `tempat_lahir` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `no_telp` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `role` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `jk`, `tempat_lahir`, `tgl_lahir`, `alamat`, `no_telp`, `username`, `password`, `role`) VALUES
('10d7c418-8c26-11ee-bfa4-704d7b67aaac', 'Briza', 'P', 'Batam', '2023-11-26', 'Batam', '02160515', 'Briza', 'ce3aae8bb11fa7e2fecea21b4bd3b927', 1),
('35e2a6e6-dba2-11ee-ac1f-0c4de9c03c1d', 'hasan', 'L', 'padang', '1995-01-03', 'Jl semarang', '081213131', 'hasanarofid', 'ce3aae8bb11fa7e2fecea21b4bd3b927', 1),
('525893da-dba2-11ee-ac1f-0c4de9c03c1d', 'hasan', 'L', 'padang', '2022-01-04', 'adad', '081213131', 'hasan', 'ce3aae8bb11fa7e2fecea21b4bd3b927', 1),
('b23cc578-98e6-11ee-8f1d-704d7b67aaac', 'Ferdy', 'L', 'Tanjung Pinang', '2001-11-19', 'Tanjung Permai', '081245863547', 'Ferdy', '25edb9a3d0a91e2732a71d20c2b38f58', 1),
('e01bd050-6f9f-11ee-8d63-93f0fa14750d', 'Syarif Firdaus', 'L', 'Tabalong', '2023-10-21', 'Handil Bakti', '081348286276', 'syarif26', '827ccb0eea8a706c4c34a16891f84e7b', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `role` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `role`) VALUES
('dioqoinda23w12e', 'admin', '21232f297a57a5a743894a0e4a801fc3', 2);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id_service` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_service` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `id_kategori` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `biaya` int NOT NULL,
  `durasi` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `file` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id_service`, `nama_service`, `id_kategori`, `biaya`, `durasi`, `file`) VALUES
('6aadf0f0-91ed-11ee-a7c1-704d7b67aaac', 'Lashlift Tint & Keratin', '--Pilih kategori--', 80000, '1 Jam', '7d00a80bfba6d0e9cee49bd13884ba84.jpg'),
('9a5a57c4-8c25-11ee-bfa4-704d7b67aaac', 'Double Lashes', '--Pilih kategori--', 100000, '1 jam', '3323971eb98a14e9e3fb16376f4daf46.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faq`
--

CREATE TABLE `tbl_faq` (
  `tbl_faq_id` int NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_faq`
--

INSERT INTO `tbl_faq` (`tbl_faq_id`, `question`, `answer`) VALUES
(1, 'PT. CRT KABELITA Fokus di bidang apa?', 'Kabel dan Otomotif'),
(4, 'Apa saja Produk dari CRT kabelita?', 'Perusahaan kami memproduksi Vinyl Tube, Vinyl Sheet , Charger & Harness'),
(24, 'Apa itu Vinyl Tube', 'Kabel'),
(74, 'Apa produk unggulan (best seller) yang kami produksi?', 'Vinyl Tube');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testimoni` varchar(100) NOT NULL,
  `nama_testimoni` varchar(100) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `tgl_testimoni` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(100) NOT NULL,
  `id_pelanggan` varchar(100) NOT NULL,
  `no_transaksi` varchar(100) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `id_service` varchar(100) NOT NULL,
  `bukti` varchar(100) DEFAULT NULL,
  `status` int NOT NULL,
  `tgl_booking` date NOT NULL,
  `jam` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `no_transaksi`, `tgl_transaksi`, `id_service`, `bukti`, `status`, `tgl_booking`, `jam`) VALUES
('1274b1a4-dba2-11ee-ac1f-0c4de9c03c1d', '10d7c418-8c26-11ee-bfa4-704d7b67aaac', 'BS06114AO3I2024124303', '2024-03-06', '01e6459d-91eb-11ee-a7c1-704d7b67aaac', NULL, 0, '2024-03-07', 17),
('1ccbd0b9-8c26-11ee-bfa4-704d7b67aaac', '10d7c418-8c26-11ee-bfa4-704d7b67aaac', 'BS2607PN1Z82023362111', '2023-11-26', '2a7cd51f-8c25-11ee-bfa4-704d7b67aaac', NULL, 1, '2023-11-28', 0),
('27a1e5ad-9908-11ee-8f1d-704d7b67aaac', 'b23cc578-98e6-11ee-8f1d-704d7b67aaac', 'BS1205RN5CU2023043912', '2023-12-12', '5b5f7cc8-8c26-11ee-bfa4-704d7b67aaac', '47b2715c81446453ce2c6679b4a1179a.jpg', 2, '2023-12-31', 0),
('28d58140-6fc8-11ee-8d63-93f0fa14750d', 'e01bd050-6f9f-11ee-8d63-93f0fa14750d', 'BS2106RZ6SM2023130510', '2023-10-21', '60eaae1d-6f4c-11ee-8d63-93f0fa14750d', '25bc13f971bb32c6563ecf9ae59fb5ec.pdf', 1, '2023-10-21', 0),
('29a80511-6fb2-11ee-8d63-93f0fa14750d', 'e01bd050-6f9f-11ee-8d63-93f0fa14750d', 'BS2103GUNA82023354110', '2023-10-21', '46a261d9-6f57-11ee-8d63-93f0fa14750d', 'd6498df15caeace09d1a3148b874201d.pdf', 4, '2023-10-21', 0),
('388ce021-6fd7-11ee-8d63-93f0fa14750d', 'e01bd050-6f9f-11ee-8d63-93f0fa14750d', 'BS2108M2N7E2023005310', '2023-10-21', '4225aafb-6fc8-11ee-8d63-93f0fa14750d', '549c8462fa5cff2338f78a1aaf7c56aa.pdf', 1, '2023-10-20', 0),
('507e07bb-6fc8-11ee-8d63-93f0fa14750d', 'e01bd050-6f9f-11ee-8d63-93f0fa14750d', 'BS2106DJQCX2023141110', '2023-10-21', '4225aafb-6fc8-11ee-8d63-93f0fa14750d', '6d011733fe3776996c018dfd3160a731.pdf', 1, '2023-10-20', 0),
('85742409-9efd-11ee-a091-e8f40802874d', 'b23cc578-98e6-11ee-8f1d-704d7b67aaac', 'BS2007QYMPI2023033912', '2023-12-20', '2497f041-91ed-11ee-a7c1-704d7b67aaac', NULL, 0, '2023-12-21', 0),
('93402a34-dba2-11ee-ac1f-0c4de9c03c1d', '525893da-dba2-11ee-ac1f-0c4de9c03c1d', 'BS0611E4H1W2024161903', '2024-03-06', '01e6459d-91eb-11ee-a7c1-704d7b67aaac', NULL, 0, '2024-03-07', 17),
('a1db837b-98e7-11ee-8f1d-704d7b67aaac', 'b23cc578-98e6-11ee-8f1d-704d7b67aaac', 'BS1201U6A4J2023115112', '2023-12-12', '01e6459d-91eb-11ee-a7c1-704d7b67aaac', '4fe78f1188c37c3ba3d234aaf7e4fe13.jpg', 2, '2023-12-16', 0),
('fd7fcaaa-9a81-11ee-8a70-704d7b67aaac', 'b23cc578-98e6-11ee-8f1d-704d7b67aaac', 'BS1402KANUV2023091812', '2023-12-14', '17979044-91ee-11ee-a7c1-704d7b67aaac', NULL, 0, '2023-12-30', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_service`);

--
-- Indexes for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  ADD PRIMARY KEY (`tbl_faq_id`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testimoni`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `tbl_faq_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315781;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

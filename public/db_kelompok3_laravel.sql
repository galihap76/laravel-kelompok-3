-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 18, 2024 at 05:52 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kelompok3_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(17, '2024_04_23_201005_create_tbl_auth', 1),
(18, '2024_04_23_200643_create_tbl_jabatan', 2),
(19, '2024_02_13_105710_create_tbl_karyawan', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_auth`
--

CREATE TABLE `tbl_auth` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_auth`
--

INSERT INTO `tbl_auth` (`id`, `email`, `password`, `remember_token`) VALUES
(2, '22205018@mail.com', '$2y$10$aGfvrhrIRQfcBMWy8MlkmuVpemzgNFNOjs2iQSTA25Z/ZjIApSkiq', 'iTkbgxCVD30Los7WSYOTTrlq44DKagXjm8eRKipPCRHGeDd5TjtQN710P8P1'),
(3, '22205038@gmail.com', '$2y$10$NZgmgIerOPabyASEPfD93.8n85Hx3.x7yRcvFFTJI9l06utkw2aNi', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `kode_jabatan` int UNSIGNED NOT NULL,
  `nama_jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`kode_jabatan`, `nama_jabatan`) VALUES
(7, 'Cloud Architect'),
(4, 'Cyber Security'),
(3, 'Data Analyst'),
(5, 'Database Administrator'),
(9, 'IT Consultant'),
(6, 'IT Support Specialist'),
(8, 'Network Administrator'),
(2, 'Software Developer'),
(10, 'System Administrator'),
(1, 'Web Developer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `kode_karyawan` int UNSIGNED NOT NULL,
  `nama_karyawan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pos` int NOT NULL,
  `nomor_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gaji_pokok` decimal(10,0) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`kode_karyawan`, `nama_karyawan`, `alamat`, `kota`, `provinsi`, `kode_pos`, `nomor_telepon`, `email`, `jabatan`, `gaji_pokok`, `tanggal_masuk`) VALUES
(1, 'Galih Anggoro Prasetya', 'Jl. Sadewa No. 2017', 'Tegal', 'Jawa Tengah', 52451, '085848672686', 'g4lihanggoro@gmail.com', 'Cyber Security', 7000000, '2024-04-15'),
(2, 'Kevin Clark', 'Jl. Clark No. 2425', 'Bandung', 'Jawa Barat', 67890, '081234567890', 'kevin.clark@example.com', 'Data Analyst', 9000000, '2023-02-10'),
(3, 'Lisa Garcia', 'Jl. Garcia No. 2627', 'Surabaya', 'Jawa Timur', 54321, '087654321098', 'lisa.garcia@example.com', 'Network Administrator', 8500000, '2023-03-20'),
(4, 'Mark Taylor', 'Jl. Taylor No. 2829', 'Jakarta', 'DKI Jakarta', 12345, '081112223344', 'mark.taylor@example.com', 'Cyber Security', 9500000, '2023-04-05'),
(5, 'Nancy Martinez', 'Jl. Martinez No. 3031', 'Bandung', 'Jawa Barat', 67890, '081234567890', 'nancy.martinez@example.com', 'Database Administrator', 8500000, '2023-05-15'),
(6, 'Oscar Harris', 'Jl. Harris No. 3233', 'Surabaya', 'Jawa Timur', 54321, '087654321098', 'oscar.harris@example.com', 'System Administrator', 9000000, '2023-06-25'),
(7, 'Pamela Wilson', 'Jl. Wilson No. 3435', 'Jakarta', 'DKI Jakarta', 12345, '081112223344', 'pamela.wilson@example.com', 'Web Developer', 8000000, '2023-07-10'),
(8, 'Quincy Anderson', 'Jl. Anderson No. 3637', 'Bandung', 'Jawa Barat', 67890, '081234567890', 'quincy.anderson@example.com', 'IT Consultant', 9500000, '2023-08-20'),
(9, 'Rachel Lee', 'Jl. Lee No. 3839', 'Surabaya', 'Jawa Timur', 54321, '087654321098', 'rachel.lee@example.com', 'Software Developer', 8500000, '2023-09-05'),
(10, 'Samuel Brown', 'Jl. Brown No. 4041', 'Jakarta', 'DKI Jakarta', 12345, '081112223344', 'samuel.brown@example.com', 'IT Support Specialist', 9000000, '2023-10-15'),
(11, 'Tina Clark', 'Jl. Clark No. 4243', 'Bandung', 'Jawa Barat', 67890, '081234567890', 'tina.clark@example.com', 'Cloud Architect', 9500000, '2023-11-25'),
(12, 'Ursula Garcia', 'Jl. Garcia No. 4445', 'Surabaya', 'Jawa Timur', 54321, '087654321098', 'ursula.garcia@example.com', 'Data Analyst', 9000000, '2023-12-10'),
(13, 'Victor Taylor', 'Jl. Taylor No. 4647', 'Jakarta', 'DKI Jakarta', 12345, '081112223344', 'victor.taylor@example.com', 'Network Administrator', 8500000, '2024-01-20'),
(14, 'Wendy Martinez', 'Jl. Martinez No. 4849', 'Bandung', 'Jawa Barat', 67890, '081234567890', 'wendy.martinez@example.com', 'Cyber Security', 9500000, '2024-02-05'),
(15, 'Xavier Harris', 'Jl. Harris No. 5051', 'Surabaya', 'Jawa Timur', 54321, '087654321098', 'xavier.harris@example.com', 'Database Administrator', 8500000, '2024-03-15'),
(16, 'Yolanda Wilson', 'Jl. Wilson No. 5253', 'Jakarta', 'DKI Jakarta', 12345, '081112223344', 'yolanda.wilson@example.com', 'System Administrator', 9000000, '2024-04-25'),
(17, 'Zack Anderson', 'Jl. Anderson No. 5455', 'Bandung', 'Jawa Barat', 67890, '081234567890', 'zack.anderson@example.com', 'Web Developer', 8000000, '2024-05-10'),
(18, 'Alex Lee', 'Jl. Lee No. 5657', 'Surabaya', 'Jawa Timur', 54321, '087654321098', 'alex.lee@example.com', 'IT Consultant', 9500000, '2024-06-20'),
(19, 'Betty Brown', 'Jl. Brown No. 5859', 'Jakarta', 'DKI Jakarta', 12345, '081112223344', 'betty.brown@example.com', 'Software Developer', 8500000, '2024-07-05'),
(20, 'Charles Clark', 'Jl. Clark No. 6061', 'Bandung', 'Jawa Barat', 67890, '081234567890', 'charles.clark@example.com', 'IT Support Specialist', 9000000, '2024-08-15'),
(21, 'Daisy Garcia', 'Jl. Garcia No. 6263', 'Surabaya', 'Jawa Timur', 54321, '087654321098', 'daisy.garcia@example.com', 'Cloud Architect', 9500000, '2024-09-25'),
(22, 'Evan Eka Laksana', 'Jl. Nakula No. 5011', 'Tegal', 'Jawa Tengah', 56728, '023413456789', 'evanekalaksana@mail.com', 'IT Support Specialist', 7000000, '2024-04-09'),
(23, 'Salma Nafisa Qurrotu\'aini', 'Jl. Pangkah No. 56789', 'Tegal', 'Jawa Tengah', 45612, '098756781234', 'salmanafisa@mail.com', 'IT Support Specialist', 8000000, '2024-04-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_auth`
--
ALTER TABLE `tbl_auth`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_auth_email_unique` (`email`);

--
-- Indexes for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`kode_jabatan`),
  ADD UNIQUE KEY `tbl_jabatan_nama_jabatan_unique` (`nama_jabatan`),
  ADD KEY `tbl_jabatan_nama_jabatan_index` (`nama_jabatan`);

--
-- Indexes for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`kode_karyawan`),
  ADD UNIQUE KEY `tbl_karyawan_email_unique` (`email`),
  ADD KEY `tbl_karyawan_jabatan_foreign` (`jabatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_auth`
--
ALTER TABLE `tbl_auth`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `kode_jabatan` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  MODIFY `kode_karyawan` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD CONSTRAINT `tbl_karyawan_jabatan_foreign` FOREIGN KEY (`jabatan`) REFERENCES `tbl_jabatan` (`nama_jabatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

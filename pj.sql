-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2024 at 05:12 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pj`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `absensi_kelas` varchar(255) NOT NULL,
  `absensi_tanggal` date NOT NULL,
  `absensi_keterangan` varchar(255) NOT NULL,
  `absensi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`absensi_kelas`, `absensi_tanggal`, `absensi_keterangan`, `absensi_id`) VALUES
('2 SI A', '2024-01-08', 'MTK', 99),
('2 SI A', '2024-01-18', 'TES', 100),
('2 SI A', '2024-01-02', 'MTK', 105),
('2 SI C', '2024-01-17', 'PBO', 107),
('2 SI A', '2024-01-19', 'MTk', 108);

-- --------------------------------------------------------

--
-- Table structure for table `absensi_siswa`
--

CREATE TABLE `absensi_siswa` (
  `absensisiswa_id` varchar(255) NOT NULL,
  `id_siswa` varchar(255) NOT NULL,
  `absensi_id` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absensi_siswa`
--

INSERT INTO `absensi_siswa` (`absensisiswa_id`, `id_siswa`, `absensi_id`, `keterangan`) VALUES
('1cd97a58-ad92-11ee-a6c5-e4a8dfe2ac58', '1634d9d1-2ac7-4923-840f-2dba9b80af92', '103', 'ASFASF'),
('1cd9a999-ad92-11ee-a6c5-e4a8dfe2ac58', '216e552c-4dee-43d8-bc2d-93a21155346c', '103', 'ASFASF'),
('1cd9dc9a-ad92-11ee-a6c5-e4a8dfe2ac58', '51297137-51a6-44f2-8970-6b8a860afdc8', '103', 'ASFASF'),
('1cda0ce0-ad92-11ee-a6c5-e4a8dfe2ac58', '84eb1073-3da2-4f50-a32d-4c8b068b5b36', '103', 'ASFASF'),
('1cda387d-ad92-11ee-a6c5-e4a8dfe2ac58', 'a655bc5b-2ef4-4a7b-884b-7665b764444e', '103', 'ASFASF'),
('1cdaabe1-ad92-11ee-a6c5-e4a8dfe2ac58', 'd0eb28ab-52f0-4ef4-ac2d-76418637c93f', '103', 'ASFASF'),
('289adfe7-ae20-11ee-a029-e4a8dfe2ac58', '0b640513-e107-49a1-8d0f-45e64266c73e', '106', 'Alpha'),
('289b177d-ae20-11ee-a029-e4a8dfe2ac58', '0dd6fcae-3de3-4e0d-9b77-c1fb454264a4', '106', 'Hadir'),
('289b41ad-ae20-11ee-a029-e4a8dfe2ac58', '6522c0f3-4efd-4d5b-b79c-6d5ce0778fb9', '106', 'Alpha'),
('289ba2b3-ae20-11ee-a029-e4a8dfe2ac58', 'd4746845-80e5-41c9-a96e-3b5300289aac', '106', 'Sakit'),
('289bcc1c-ae20-11ee-a029-e4a8dfe2ac58', 'ec4f1801-3c1b-4b11-8689-76dabae91dde', '106', 'Hadir'),
('4ec57bef-ae20-11ee-a029-e4a8dfe2ac58', '34201a36-4da0-4164-a663-536c61ee3a85', '107', 'Sakit'),
('4ec5bc7b-ae20-11ee-a029-e4a8dfe2ac58', '4ad21690-89ab-4683-91b6-7ee1f44c124c', '107', 'Hadir'),
('4ec5e6e9-ae20-11ee-a029-e4a8dfe2ac58', 'c34e3744-4840-486f-b6e0-afa472749c85', '107', 'Hadir'),
('4ec60ef3-ae20-11ee-a029-e4a8dfe2ac58', 'cdd5a802-5ed2-4500-be33-68818953cb59', '107', 'Alpha'),
('4ec66f8f-ae20-11ee-a029-e4a8dfe2ac58', 'd6efdbe4-c08f-4498-93af-a90a38d01c36', '107', 'Hadir'),
('51e47cd0-ad91-11ee-a6c5-e4a8dfe2ac58', '0b640513-e107-49a1-8d0f-45e64266c73e', '100', 'TES'),
('51e4b27f-ad91-11ee-a6c5-e4a8dfe2ac58', '0dd6fcae-3de3-4e0d-9b77-c1fb454264a4', '100', 'TES'),
('51e4ec84-ad91-11ee-a6c5-e4a8dfe2ac58', '6522c0f3-4efd-4d5b-b79c-6d5ce0778fb9', '100', 'TES'),
('51e54ab9-ad91-11ee-a6c5-e4a8dfe2ac58', 'd4746845-80e5-41c9-a96e-3b5300289aac', '100', 'TES'),
('51e57550-ad91-11ee-a6c5-e4a8dfe2ac58', 'ec4f1801-3c1b-4b11-8689-76dabae91dde', '100', 'TES'),
('61355213-ae20-11ee-a029-e4a8dfe2ac58', '0b640513-e107-49a1-8d0f-45e64266c73e', '108', 'Alpha'),
('61358708-ae20-11ee-a029-e4a8dfe2ac58', '0dd6fcae-3de3-4e0d-9b77-c1fb454264a4', '108', 'Hadir'),
('6135dde7-ae20-11ee-a029-e4a8dfe2ac58', '6522c0f3-4efd-4d5b-b79c-6d5ce0778fb9', '108', 'Hadir'),
('61360389-ae20-11ee-a029-e4a8dfe2ac58', 'd4746845-80e5-41c9-a96e-3b5300289aac', '108', 'Hadir'),
('61362a9e-ae20-11ee-a029-e4a8dfe2ac58', 'ec4f1801-3c1b-4b11-8689-76dabae91dde', '108', 'Hadir'),
('7ba38d98-adcd-11ee-a2f5-e4a8dfe2ac58', '0b640513-e107-49a1-8d0f-45e64266c73e', '105', 'Hadir'),
('7ba3c73c-adcd-11ee-a2f5-e4a8dfe2ac58', '0dd6fcae-3de3-4e0d-9b77-c1fb454264a4', '105', 'Hadir'),
('7ba42059-adcd-11ee-a2f5-e4a8dfe2ac58', '6522c0f3-4efd-4d5b-b79c-6d5ce0778fb9', '105', 'Hadir'),
('7ba447f8-adcd-11ee-a2f5-e4a8dfe2ac58', 'd4746845-80e5-41c9-a96e-3b5300289aac', '105', 'Hadir'),
('7ba4686f-adcd-11ee-a2f5-e4a8dfe2ac58', 'ec4f1801-3c1b-4b11-8689-76dabae91dde', '105', 'Hadir'),
('a0aafb38-ad92-11ee-a6c5-e4a8dfe2ac58', '1634d9d1-2ac7-4923-840f-2dba9b80af92', '104', 'ASD'),
('a0ab31d5-ad92-11ee-a6c5-e4a8dfe2ac58', '216e552c-4dee-43d8-bc2d-93a21155346c', '104', 'ASD'),
('a0ab6a3a-ad92-11ee-a6c5-e4a8dfe2ac58', '51297137-51a6-44f2-8970-6b8a860afdc8', '104', 'ASD'),
('a0ab9f9a-ad92-11ee-a6c5-e4a8dfe2ac58', '84eb1073-3da2-4f50-a32d-4c8b068b5b36', '104', 'ASD'),
('a0abcd83-ad92-11ee-a6c5-e4a8dfe2ac58', 'a655bc5b-2ef4-4a7b-884b-7665b764444e', '104', 'ASD'),
('a0ac695f-ad92-11ee-a6c5-e4a8dfe2ac58', 'd0eb28ab-52f0-4ef4-ac2d-76418637c93f', '104', 'ASD'),
('f43c8a2c-ad8e-11ee-a6c5-e4a8dfe2ac58', '0dd6fcae-3de3-4e0d-9b77-c1fb454264a4', '99', 'MTK'),
('f43cb57b-ad8e-11ee-a6c5-e4a8dfe2ac58', '6522c0f3-4efd-4d5b-b79c-6d5ce0778fb9', '99', 'MTK'),
('f43d0d26-ad8e-11ee-a6c5-e4a8dfe2ac58', 'd4746845-80e5-41c9-a96e-3b5300289aac', '99', 'MTK'),
('f43d3ea9-ad8e-11ee-a6c5-e4a8dfe2ac58', 'ec4f1801-3c1b-4b11-8689-76dabae91dde', '99', 'MTK');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `kelas`) VALUES
(1, '2 SI A'),
(2, '2 SI B'),
(3, '2 SI C'),
(4, '2 SI D'),
(5, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 2),
(6, '2023_12_11_025955_create_siswa_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa1`
--

CREATE TABLE `siswa1` (
  `id` varchar(255) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa1`
--

INSERT INTO `siswa1` (`id`, `nama_siswa`, `kelas`, `jenis_kelamin`, `alamat`) VALUES
('0b640513-e107-49a1-8d0f-45e64266c73e', 'SI A 3', '1', 'Laki-laki', 'A'),
('0dd6fcae-3de3-4e0d-9b77-c1fb454264a4', 'SI A 4', '1', 'Laki-laki', 'SI A'),
('1634d9d1-2ac7-4923-840f-2dba9b80af92', 'SI B 3', '2', 'Laki-laki', 'B'),
('1fdd88a5-15a0-49f2-940b-a2a05f4eeacb', 'SI D 2', '4', 'Laki-laki', 'Tes'),
('216e552c-4dee-43d8-bc2d-93a21155346c', 'SI B 2', '2', 'Laki-laki', 'B'),
('34201a36-4da0-4164-a663-536c61ee3a85', 'SI C 3', '3', 'Laki-laki', 'Tes'),
('38261039-0649-44c9-b9bf-b54cb49cfe2c', 'SI D 3', '4', 'Laki-laki', 'TEs'),
('4a4ff7cc-3c8e-4981-89ba-085c41a3d5b6', 'SI D', '4', 'Laki-laki', 'OPal'),
('4ad21690-89ab-4683-91b6-7ee1f44c124c', 'SI C', '3', 'Laki-laki', 'Tes'),
('51297137-51a6-44f2-8970-6b8a860afdc8', 'SI B', '2', 'Laki-laki', 'B'),
('60213eaf-28bd-4c44-8b19-cafae9f7bc08', 'JEREMY', '4', 'Laki-laki', 'PADANG'),
('6522c0f3-4efd-4d5b-b79c-6d5ce0778fb9', 'SI A', '1', 'Laki-laki', 'SI A'),
('84eb1073-3da2-4f50-a32d-4c8b068b5b36', 'SI B 4', '2', 'Laki-laki', 'B'),
('97d9232e-be0d-4b90-863a-b680dc53f98d', 'SI D 5', '4', 'Laki-laki', 'D'),
('a2fddfc6-f0e4-441f-b689-53fdfa102568', 'SI D 4', '4', 'Laki-laki', 'D'),
('a655bc5b-2ef4-4a7b-884b-7665b764444e', 'SI B 5', '2', 'Laki-laki', 'B'),
('c34e3744-4840-486f-b6e0-afa472749c85', 'SI C 4', '3', 'Laki-laki', 'C'),
('cdd5a802-5ed2-4500-be33-68818953cb59', 'SI C 2', '3', 'Laki-laki', 'Tes'),
('d0eb28ab-52f0-4ef4-ac2d-76418637c93f', 'SI B 5', '2', 'Laki-laki', 'B'),
('d4746845-80e5-41c9-a96e-3b5300289aac', 'SI A 5', '1', 'Laki-laki', 'S IA'),
('d6efdbe4-c08f-4498-93af-a90a38d01c36', 'SI C 5', '3', 'Laki-laki', 'C'),
('ec4f1801-3c1b-4b11-8689-76dabae91dde', 'SI A 2', '1', 'Laki-laki', 'SI A');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `nama`, `role`, `password`) VALUES
('938a7a76-a4aa-11ee-bbb9-e4a8dfe2ac58', 'naufal', 'naufal@gmail.com', 'Admin', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(200) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kelas` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `kelas`, `role`) VALUES
(7, 'Admin 1', 'admin@gmail.com', NULL, '$2y$10$tqO9LN80EGdNU7krL808reCSpBPDYT4CSGbMIE4VMN6BHx02sTq1q', NULL, '2023-12-03 19:40:17', '2023-12-03 19:40:17', 5, 'admin'),
(8, 'Wali Kelas A', 'guruA@gmail.com', NULL, '$2y$10$zsagZ4U6SeFEp4jPcHDSSOW86LPMM5f/vukFenKWSpbAVMZzf3ehq', NULL, '2023-12-10 17:42:56', '2023-12-10 17:42:56', 1, 'guru'),
(9, 'Wali Kelas B', 'guruB@gmail.com', NULL, '$2y$10$QffOJZVwU/Ltne4s6qRNo.8FFe5fl82sRofk1M9WTb/XD.Hwrbs4e', NULL, '2023-12-10 21:58:40', '2023-12-10 21:58:40', 2, 'guru'),
(12, 'Wali C', 'guruC@gmail.com', NULL, '$2y$10$XQUwtsb/KGknEM/VH.SFE.OuOfNvE7EBP1rHD99KTdbiKn01OhUu6', NULL, NULL, NULL, 3, 'guru'),
(14, 'Wali kelas D', 'guruD@gmail.com', NULL, '$2y$10$MgGy/r6SOz2BpHzWyFJXMefjo0SfRi6eqjRELyxrqeOIEhAWr6F0S', NULL, NULL, NULL, 4, 'guru'),
(35, 'Admin 2', 'admin2@gmail.com', NULL, '$2y$10$A8NRY4MJdvczhtlNsuBone7NPF.kXQaBWcGABHDihJ612hXiJIXSO', NULL, '2023-12-28 06:46:43', '2023-12-28 06:46:43', 5, 'admin'),
(36, 'Admin 3', 'Admin3@gmail.com', NULL, '$2y$10$.nQivDPFyA2iWOPrHFiCSeybKzTKTdyMckMkbzaqxJyBbqgXika.K', NULL, '2024-01-03 19:34:03', '2024-01-03 19:34:03', 5, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`absensi_id`);

--
-- Indexes for table `absensi_siswa`
--
ALTER TABLE `absensi_siswa`
  ADD PRIMARY KEY (`absensisiswa_id`),
  ADD KEY `siswa_absen` (`id_siswa`),
  ADD KEY `absensi_absen` (`absensi_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa1`
--
ALTER TABLE `siswa1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `absensi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi_siswa`
--
ALTER TABLE `absensi_siswa`
  ADD CONSTRAINT `siswa_absen` FOREIGN KEY (`id_siswa`) REFERENCES `siswa1` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

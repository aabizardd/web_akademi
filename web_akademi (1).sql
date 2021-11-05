-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2021 at 08:31 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_akademi`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_soal`
--

CREATE TABLE `bank_soal` (
  `id_soal` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `pilihan_a` varchar(250) NOT NULL,
  `pilihan_b` varchar(250) NOT NULL,
  `pilihan_c` varchar(250) NOT NULL,
  `pilihan_d` varchar(250) NOT NULL,
  `jawaban` varchar(250) NOT NULL,
  `id_kelas` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_soal`
--

INSERT INTO `bank_soal` (`id_soal`, `pertanyaan`, `pilihan_a`, `pilihan_b`, `pilihan_c`, `pilihan_d`, `jawaban`, `id_kelas`) VALUES
(14, 'Komputer pertama di dunia?', 'aaa', 'bbb', 'cbv', 'ddd', 'C', '1'),
(16, 'asd', 'aaaa', 'sad', 'asd', 'asd', 'A', '10'),
(17, 'apa kata dia?', 'a', 'b', 'c', 'd', 'A', '1');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_quiz`
--

CREATE TABLE `jawaban_quiz` (
  `id_jawaban` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `jawaban` varchar(250) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jawaban_quiz`
--

INSERT INTO `jawaban_quiz` (`id_jawaban`, `id_user`, `id_soal`, `jawaban`, `status`) VALUES
(16, 5, 14, 'Pilih...', 0),
(18, 5, 14, 'A', 1),
(20, 5, 14, 'A', 1),
(21, 5, 17, 'A', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(191) NOT NULL,
  `tingkat_kelas` varchar(191) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `guru_id` int(11) NOT NULL DEFAULT 4
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `tingkat_kelas`, `created_at`, `updated_at`, `guru_id`) VALUES
(1, 'hardware', 'dasar', '2021-10-10 06:44:29', NULL, 4),
(2, 'network', 'dasar', '2021-10-10 06:44:29', NULL, 4),
(6, 'Programming', 'dasar', NULL, NULL, 4),
(8, 'Komputer', 'dasar', NULL, NULL, 4),
(10, 'tes', 'dasar', NULL, NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `completion` int(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`id`, `siswa_id`, `kelas_id`, `created_at`, `updated_at`, `completion`) VALUES
(1, 5, 1, '2021-10-10 13:58:23', '2021-10-10 13:58:23', 60),
(3, 5, 10, NULL, NULL, NULL),
(4, 5, 6, NULL, NULL, NULL),
(5, 5, 8, NULL, NULL, NULL),
(6, 5, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id` int(11) NOT NULL,
  `judul_materi` varchar(191) NOT NULL,
  `keterangan` text NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `isi_materi` text NOT NULL,
  `file` varchar(191) NOT NULL,
  `tingkat` enum('dasar','lanjut') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id`, `judul_materi`, `keterangan`, `kelas_id`, `isi_materi`, `file`, `tingkat`, `created_at`, `updated_at`) VALUES
(1, 'Sejarah Komputer', 'materi', 1, 'Sejarah komputer dimulai pada', 'Software QA Test - Intermediate.pdf', 'dasar', NULL, NULL),
(9, 'python', 'materi', 1, 'a', 'CV_M_Bagas_Setia02.pdf', 'dasar', '2021-10-12 03:56:37', NULL),
(11, 'tes', 'materi', 10, 'tes', 'Sistem_Terpadu_Akademik_Reguler_UMS.pdf', 'dasar', '2021-10-18 02:56:07', NULL),
(12, 'tes', 'materi', 10, 'tes', 'Sistem_Terpadu_Akademik_Reguler_UMS1.pdf', 'dasar', '2021-10-18 06:43:28', NULL),
(13, 'tes', 'materi', 10, 'tes', 'Metode_Penelitian_Pendidikan_Sutama.pdf', 'dasar', '2021-10-18 06:46:11', NULL),
(15, 'adsa', 'materi', 1, 'asdsad', 'Dubstep_Bird_(Original_5_Sec_Video).mp4', 'dasar', '2021-10-31 12:02:24', NULL),
(16, 'Materi 1', 'materi', 6, 'Object Oriented', 'Dubstep_Bird_(Original_5_Sec_Video)1.mp4', 'dasar', '2021-11-01 05:37:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_kelas` mediumint(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_kelas`, `id_user`, `nilai`, `tanggal`) VALUES
(10, 1, 5, 20, '2021-11-03 14:24:40');

-- --------------------------------------------------------

--
-- Table structure for table `progress_siswa`
--

CREATE TABLE `progress_siswa` (
  `id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `materi_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `progress_siswa`
--

INSERT INTO `progress_siswa` (`id`, `siswa_id`, `materi_id`, `created_at`, `updated_at`) VALUES
(6, 5, 1, '2021-10-15 04:50:34', NULL),
(7, 5, 9, '2021-10-15 04:51:10', NULL),
(8, 5, 11, '2021-10-18 06:33:55', NULL),
(9, 5, 12, '2021-10-18 06:43:52', NULL),
(10, 5, 13, '2021-10-18 06:46:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `level` enum('admin','siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `created_at`, `updated_at`, `level`) VALUES
(4, 'M. Bagas Setia', 'admin@gmail.com', '$2y$10$VMv/Axzwi/gibMYcv0Em1eQHjZ.2GHNUjr70Z9oYRAAutIc1gzx0y', '2021-10-08 11:09:10', NULL, 'admin'),
(5, 'Devi Ratna Daniati', 'siswa@gmail.com', '$2y$10$VMv/Axzwi/gibMYcv0Em1eQHjZ.2GHNUjr70Z9oYRAAutIc1gzx0y', '2021-10-09 11:15:07', NULL, 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_soal`
--
ALTER TABLE `bank_soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `jawaban_quiz`
--
ALTER TABLE `jawaban_quiz`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guru_id` (`guru_id`);

--
-- Indexes for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `kelas_siswa_ibfk_2` (`siswa_id`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materi_ibfk_1` (`kelas_id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `progress_siswa`
--
ALTER TABLE `progress_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_id` (`siswa_id`),
  ADD KEY `materi_id` (`materi_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_soal`
--
ALTER TABLE `bank_soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jawaban_quiz`
--
ALTER TABLE `jawaban_quiz`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `progress_siswa`
--
ALTER TABLE `progress_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`guru_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD CONSTRAINT `kelas_siswa_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelas_siswa_ibfk_2` FOREIGN KEY (`siswa_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `progress_siswa`
--
ALTER TABLE `progress_siswa`
  ADD CONSTRAINT `progress_siswa_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `progress_siswa_ibfk_2` FOREIGN KEY (`materi_id`) REFERENCES `materi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

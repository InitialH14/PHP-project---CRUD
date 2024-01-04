-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2024 at 06:04 PM
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
-- Database: `tugas_akhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_akses`
--

CREATE TABLE `data_akses` (
  `id` int(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password1` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_akses`
--

INSERT INTO `data_akses` (`id`, `nama`, `email`, `password1`) VALUES
(1, 'Hadid Ramadhan', 'blaxx14@students.unnes.ac.id', '996a7312d0e150bdf9fd939dcd183468');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nidn` int(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `prodi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nidn`, `nama`, `prodi`) VALUES
(46620, 'Joko Widodo', 'Teknik Informatika'),
(46621, 'Fabhian Arduino', 'Sistem Informasi'),
(46622, 'Slamet Riyadi', 'Sistem Informasi'),
(46623, 'Joko Asparagus', 'Sistem Informasi'),
(46624, 'Cut Nyak Eko', 'Sistem Informasi'),
(46625, 'Puan Pranowo', 'Teknik Informatika'),
(46626, 'Ganjar Subianto', 'Teknik Informatika'),
(46627, 'Anies Armstrong', 'Teknik Informatika'),
(46628, 'Ganjar Homelander', 'Teknik Informatika'),
(46629, 'Abimanyu airmambu', 'Sistem Informasi'),
(461148, 'Lili Paijo', 'Teknik Mesin'),
(461156, 'Sujiwo Hajar Dewa', 'Sistem Informasi'),
(461192, 'Ijat Setiawan', 'Teknik Informatika'),
(673381, 'Abdul Bedul', 'Teknik Mesin');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(30) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `prodi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `prodi`) VALUES
(6410, 'Putri Putra Hidayat', 'Teknik Informatika'),
(6411, 'Patrick Joshua Andre', 'Teknik Informatika'),
(6412, 'Bian Fabhian', 'Teknik Informatika'),
(6413, 'Yunus Pace', 'Teknik Informatika'),
(6414, 'Abidondifu Fabian', 'Teknik Informatika'),
(6415, 'Abugagi Maulana', 'Teknik Informatika'),
(6416, 'Amingkawak Sabah', 'Teknik Informatika'),
(6417, 'Soro Bang Drajat', 'Teknik Informatika'),
(6418, 'Togotly Tobangado', 'Teknik Informatika'),
(6419, 'Yesian Yessir', 'Teknik Informatika'),
(6812, 'Alin Luntang 2', 'Teknik Mesin'),
(12345, 'Muhammad Hadid Ismai', 'Sistem Informasi'),
(23232, 'Togotly Fabhian', 'Sistem Informasi'),
(374467, 'Apa Aja', 'Teknik Informatika'),
(1234567, 'Yunus Musa Ramadhan', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa_projek`
--

CREATE TABLE `mahasiswa_projek` (
  `nim` int(30) NOT NULL,
  `kode_proyek` int(20) NOT NULL,
  `nilai` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa_projek`
--

INSERT INTO `mahasiswa_projek` (`nim`, `kode_proyek`, `nilai`) VALUES
(6414, 205, 90),
(6415, 206, 85),
(6419, 207, 80),
(6419, 207, 80),
(6419, 207, 80),
(6419, 207, 80),
(6419, 206, 90),
(6413, 206, 78),
(6410, 206, 50),
(23232, 206, 80),
(6415, 213, 85),
(6418, 203, 90),
(374467, 203, 89),
(6812, 4690, 89),
(6812, 205, 89),
(6414, 203, 90),
(6414, 217, 90),
(6410, 204, 78);

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `kode_mk` int(20) NOT NULL,
  `nama_matkul` varchar(20) NOT NULL,
  `sks` int(20) NOT NULL,
  `nidn` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`kode_mk`, `nama_matkul`, `sks`, `nidn`) VALUES
(1013, 'Kalkulus', 3, 46622),
(1014, 'Bahasa Inggris', 2, 46623),
(1015, 'Logika Informatika', 3, 46629),
(1016, 'Kewirausahaan', 2, 46627),
(1017, 'Struktur Data', 3, 46626),
(1020, 'Jarkom', 2, 46621),
(1111, 'IMK', 3, 46624),
(1118, 'Sistem Operasi', 3, 46627),
(1119, 'Matematika diskrit', 2, 46624),
(2020, 'Fisika', 3, 461156),
(109292, 'Statistika', 3, 461148);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_projek_akhir`
--

CREATE TABLE `tabel_projek_akhir` (
  `kode_proyek` int(20) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `tenggat` date NOT NULL,
  `kode_mk` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_projek_akhir`
--

INSERT INTO `tabel_projek_akhir` (`kode_proyek`, `judul`, `jenis`, `tenggat`, `kode_mk`) VALUES
(203, 'Modeling the Motion of a Projectile with Calculus', 'Individu', '2023-12-16', 1013),
(204, 'Modeling the Motion of a Projectile with Calculus', 'Individu', '2033-11-30', 1014),
(205, 'Implementasi mesin kebenaran untuk proposisi sederhana\r\n', 'Kelompok', '2029-11-08', 1015),
(206, 'Peluang Usaha Makanan Berbahan Baku Lokal di Daerah Terpencil\r\n', 'Kelompok', '2026-11-11', 1016),
(207, 'Implementasi struktur data heap untuk menyelesaikan permasalahan pencarian nilai minimum dan maksimu', 'Kelompok', '2028-12-15', 1017),
(213, 'Implentasi apa aja', 'individu', '2024-01-12', 1015),
(217, 'Implementasi Jarkom dalam Kontrakan', 'individu', '2027-10-22', 1020),
(462, 'Apa aja yang penting dikerjain', 'individu', '2023-12-20', 1118),
(466, 'Apa itu IMK', 'individu', '2023-12-15', 1111),
(2089, 'Implentasi apa aja', 'Individu', '2024-04-19', 1013),
(4690, 'Implentasi Fisika', 'Individu', '2024-03-08', 2020);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_akses`
--
ALTER TABLE `data_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nidn`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `mahasiswa_projek`
--
ALTER TABLE `mahasiswa_projek`
  ADD KEY `mhs-pjk-1` (`nim`),
  ADD KEY `mhs-pjk-2` (`kode_proyek`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`kode_mk`),
  ADD KEY `nidn` (`nidn`);

--
-- Indexes for table `tabel_projek_akhir`
--
ALTER TABLE `tabel_projek_akhir`
  ADD PRIMARY KEY (`kode_proyek`),
  ADD KEY `kode_mk` (`kode_mk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_akses`
--
ALTER TABLE `data_akses`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mahasiswa_projek`
--
ALTER TABLE `mahasiswa_projek`
  ADD CONSTRAINT `mhs-pjk-1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE,
  ADD CONSTRAINT `mhs-pjk-2` FOREIGN KEY (`kode_proyek`) REFERENCES `tabel_projek_akhir` (`kode_proyek`) ON DELETE CASCADE;

--
-- Constraints for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD CONSTRAINT `matakuliah_ibfk_1` FOREIGN KEY (`nidn`) REFERENCES `dosen` (`nidn`);

--
-- Constraints for table `tabel_projek_akhir`
--
ALTER TABLE `tabel_projek_akhir`
  ADD CONSTRAINT `tabel_projek_akhir_ibfk_1` FOREIGN KEY (`kode_mk`) REFERENCES `matakuliah` (`kode_mk`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

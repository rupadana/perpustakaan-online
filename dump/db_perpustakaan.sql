-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jul 11, 2022 at 03:28 PM
-- Server version: 8.0.29
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(15) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `gambar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `username`, `password`, `fullname`, `gambar`) VALUES
(1, 'operator', 'operator', 'Petugas', 'gambar_admin/avatar5.png'),
(2, 'mihrawardana', 'mihrawardana', 'Mihra Wardana', 'gambar_admin/foto.jpg'),
(3, 'admin', 'admin', 'Admin PerpustakaanKU', 'gambar_admin/ssamson.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `data_anggota`
--

CREATE TABLE `data_anggota` (
  `id` int NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(150) NOT NULL,
  `jk` varchar(2) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `foto` varchar(75) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_anggota`
--

INSERT INTO `data_anggota` (`id`, `email`, `nama`, `jk`, `kelas`, `alamat`, `foto`, `tanggal_lahir`) VALUES
(1, 'rupadana@gmail.com', 'Rupadana', 'L', '19', 'Bangli', '/assets/img/1657549541devices.png', '2001-07-11'),
(32, 'aprilia@gmail.com', 'Aprilia', 'P', '21', 'Bangli', '/assets/img/1657549541devices.png', '2001-01-09');

-- --------------------------------------------------------

--
-- Table structure for table `data_buku`
--

CREATE TABLE `data_buku` (
  `id` int NOT NULL,
  `judul` varchar(250) NOT NULL,
  `pengarang` varchar(250) NOT NULL,
  `th_terbit` varchar(4) NOT NULL,
  `penerbit` varchar(250) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `jumlah_buku` int NOT NULL,
  `tgl_input` varchar(75) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_buku`
--

INSERT INTO `data_buku` (`id`, `judul`, `pengarang`, `th_terbit`, `penerbit`, `kategori`, `jumlah_buku`, `tgl_input`, `gambar`) VALUES
(1, 'Pemrograman Web Hosting', 'Mihra Wardana', '2019', '-', 'Laporan', 61, '2021/01/31', 'gambar_buku/ssamson.jpg'),
(8, 'Menjadi Perempuan Terdidik dan Feminisme', 'Dr. Wiyatmi, M.hum', '2013', 'UNY Press', 'Novel', 325, '2021/02/01', 'gambar_buku/18ea2ec6-87a6-4af2-ac1f-be6d89dac9c1.jpg'),
(9, 'Perempuan di titik nol', 'Nawal el - Saadawi', '1989', 'Yayasan Pustaka Obor Indonesi', 'Novel', 201, '2021/02/01', 'gambar_buku/54b21d38-348b-4a8a-890f-7eb267d692be.jpg'),
(10, 'Matinya Socrates', 'Plato', '2015', 'Narasi', 'Kisah', 307, '2021/02/01', 'gambar_buku/c7001ce9-e0dc-4e86-8581-3a814bd91c23.jpg'),
(11, 'filsafat perselingkuhan ', 'Reza A.A Wattimena', '2010', 'PT Evolireta', 'Filsafat', 160, '2021/02/01', 'gambar_buku/641d9600-0a0f-43ab-8d74-fee32cbe5dd3.jpg'),
(12, 'Perempuan Berbicara Kretek', 'Abmi Handayani, dkk', '2012', 'Indonesia Berdikari', 'Novel', 334, '2021/02/01', 'gambar_buku/a3ccaab6-0a24-4c92-bfc0-0c7e4eaf82ac.jpg'),
(13, 'Perempuan Yang Dihapus Namanya', 'Avianti Armand', '2017', 'PT Gramedia Pustaka Utama', 'Puisi', 90, '2021/02/01', 'gambar_buku/ed7d3a96-54af-4cc4-8bb3-af2aa8877b9c.jpg'),
(14, 'Filsafat Islam Masa Awal', 'Drs.H. Ibrahim, M.Pd', '2016', 'PKBM Rumah Buku Carabaca Makassar', 'Filsafat', 159, '2021/02/01', 'gambar_buku/89e4850b-99b0-42bb-bc54-9014ad7cb2e6.jpg'),
(15, 'Teologi dan Falsafah Hijab', 'Murtadha Muthahhari', '2011', 'Rausyanfikr Institute', 'Filsafat', 192, '2021/02/01', 'gambar_buku/9820c58c-e249-4c99-a762-502559f74b46.jpg'),
(17, 'Pulang', 'Leila S. Chudori', '2012', 'PT Gramedia Jakarta', 'Novel', 476, '2021/02/01', 'gambar_buku/fea0ab63-c12a-4ed1-9223-0022aedde99b.jpg'),
(18, 'Teknologi Informasi', 'Abdul Qadil & Terra Ch. Triwahyuni', '2013', 'CV. Andi Offset', 'Komputer', 26, '2021/02/01', 'gambar_buku/6c7016ba-fa2a-4c39-b553-72b6079f5810.jpg'),
(19, 'Petani dan Penguasa', 'Noer Fauzi', '1999', 'INSIST, KPA, bekerja sama dengan Pustaka Pelajar', 'Novel', 330, '2021/02/01', 'gambar_buku/88fa64d4-7641-4f42-a103-9f7286fe42f8.jpg'),
(20, 'Perempuan Yang Mengantarkan surga', 'Haris Priyatna & Lisdy Rahayu', '2014', 'PT Mizan Pustaka', 'Novel', 278, '2021/02/01', 'gambar_buku/e6462ec0-ad5b-48c0-82f8-1998daee4e57.jpg'),
(21, 'Desain dan Pemrograman Multimedia Pembelajaran Interaktif', 'Wandah Wibawanto, S.Sn., M.Ds', '2017', 'Penerbit cerdas Ulet Kreatif', 'Komputer', 195, '2021/02/01', 'gambar_buku/37acf42b-2b3b-4fdb-a8cf-3a6c608c4d98.jpg'),
(22, 'Kebenaran yang hilang', 'Farag Fouda', '2007', 'Balai peneltian dan pengembangan agama jakarta', 'Politik', 216, '2021/02/01', 'gambar_buku/9beecc09-6d1e-4ed0-b3bb-ff66d34377b5.jpg'),
(23, 'Covid 19 & disrupsi', 'Syafarudi, Erna Rochana, Erizal barnawi, Bagus Wardianto', '-', 'Pusaka Media', 'Umum', 0, '2021/02/01', 'gambar_buku/92fd4697-bbf3-48e0-93dd-181aa1986f88.jpg'),
(24, 'Buku Pertama Belajar Pemrograman JAVA', 'Abdul Kadir', '2013', 'Mediakom', 'Komputer', 444, '2021/02/01', 'gambar_buku/IMG_20210201_210025.jpg'),
(27, 'Buku 1 + 1', 'Rupadana', '2021', 'Rupadana', 'Filsafat', 2, '2022-07-11', '/assets/upload/1657553184books.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id` int NOT NULL,
  `keperluan` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cari` varchar(255) NOT NULL,
  `saran` varchar(255) NOT NULL,
  `tgl_kunjung` date NOT NULL,
  `id_anggota` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`id`, `keperluan`, `cari`, `saran`, `tgl_kunjung`, `id_anggota`) VALUES
(10, 'Mencari referen', 'Buku yang berkaitan dengan komputer', 'Agar menyediakan lebih banyak buku referensi, sehingga kami dapat menemukan referensi sesuai kebutuhan kami', '2021-02-01', 1),
(15, 'Buku 2', 'Buku tentang anak kecil', 'Mungkin buku tentang anak kecil bisa ditambah', '2022-07-11', 32);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(15) NOT NULL,
  `id_anggota` int NOT NULL,
  `role` enum('admin','user') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `id_anggota`, `role`) VALUES
(1, 'wayan', 'wayan', 1, 'admin'),
(2, 'rupadana1', 'rupadana1', 2, 'user'),
(3, 'admin', 'admin', 20, 'admin'),
(5, 'admin', '123', 32, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `data_anggota`
--
ALTER TABLE `data_anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_buku`
--
ALTER TABLE `data_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_anggota`
--
ALTER TABLE `data_anggota`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `data_buku`
--
ALTER TABLE `data_buku`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

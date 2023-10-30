-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2023 at 02:08 PM
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
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_buku`
--

CREATE TABLE `daftar_buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahun_terbit` date NOT NULL,
  `genre` varchar(50) NOT NULL,
  `sinopsis` text NOT NULL,
  `no_isbn` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar_buku`
--

INSERT INTO `daftar_buku` (`id_buku`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `genre`, `sinopsis`, `no_isbn`, `foto`) VALUES
(1, 'Dilan:Dia adalah dilanku tahun 1990', 'Arkha gntg bgt', 'Pastel Books (Mizan Group).', '2014-04-16', 'Genre', 'bercerita tentang kisah cinta dua remaja Bandung pada tahun 90an. Berawal dari seorang siswa bernama Dilan yang jatuh cinta dengan siswi pindahan dari SMA di Jakarta bernama Milea. Dilan memiliki beragam cara untuk mendekati dan mencuri perhatian Milea.', '978-602-7870-86-4', '89435090_ID_MIZ2016MTH03DDADT_B.jpg'),
(9, ' Ubur-ubur Lembur', 'Raditya Dika', 'GagasMedia', '2018-02-07', 'Komedi', 'Novel ubur ubur lembur menceritakan tentang Bercerita tentang pengalamannya belajar hidup dari apa yang dia cintai, sambil menemukan hal remeh untuk ditertawakan di sepanjang perjalanan. Seluruh bab di dalamnya diangkat dari kisah nyata.', '978-979-780-915-7', '1754877268_220px-Ubur-ubur-Lembur1.jpg'),
(10, 'Sihir Mesir di Tanah Jawa', 'Om Hao', 'GagasMedia', '2022-02-15', 'Horror', 'Sihir Mesir di Tanah Jawa menyajikan cerita fiksi ilmiah, dengan berbagai fakta masa lalu Mesir, Eropa, dan Jawa pada awal Daendeles hadir di tanah Jawa. Kitab Black Pullet, Freemason, Kanuragan, Macan Putih, Tumbal, dan cerita-cerita dari masa lalu lainnya telah membentuk peradaban. Sebuah upaya untuk mengenal lebih dekat lagi masa lalu untuk erita masa depan yang lebih baik.', '978-979-780-987-4', '854547840_image001-68.jpg'),
(11, 'Novel Ancika: Dia Yang Bersamaku Tahun 1995 – Pidi Baiq', 'Pidi Baiq', 'Pastel Books', '2021-09-02', 'Romance', 'Ancika 1995 bercerita tentang kisah cinta Dilan setelah putus dari Milea saat berada di bangku SMA. Cerita ini merupakan lanjutan dari trilogi Dilan, yaitu Dilan 1990, Dilan 1991, dan Milea: Suara dari Dilan.  Nantinya film Ancika akan memperlihatkan kisah yang terjadi 24 tahun lalu. Tahun ketika Ancika masih remaja dan baru berusia 17 tahun. Saat itu, dia sudah mulai menjalin hubungan dengan Dilan dan menyandang status sebagai kekasih baru mantan anggota geng motor tersebut. ', '9786026716897', '480285762_9786026716897.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `data_admin`
--

CREATE TABLE `data_admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_admin`
--

INSERT INTO `data_admin` (`id_admin`, `nama`, `username`, `password`, `foto`) VALUES
(1, 'Arkha gntg bgt', 'delot', '123', '1580514976_220px-Ubur-ubur-Lembur1.jpg'),
(2, 'Arkha gntg', 'admin', '123', '370067568_9786026716897.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `data_operator`
--

CREATE TABLE `data_operator` (
  `id_operator` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_operator`
--

INSERT INTO `data_operator` (`id_operator`, `nama`, `username`, `password`, `foto`) VALUES
(1, 'Agus', 'gusgus', '1234', '649625074_9786026716897.jpg'),
(2, 'pasa', 'pasa', '12345', '34583428_220px-Ubur-ubur-Lembur1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id_user`, `nama`, `alamat`, `jenis_kelamin`, `gambar`, `username`, `password`) VALUES
(1, 'Fasya', 'Cijerah', 'Laki-laki', '1719193699_Screenshot 2023-08-17 222546.png', 'fasyaal', '$2y$10$oNSTBwxaNWSYKoqs8zjqX.LwOsTYS4iCRdIJpIuJvQzB7Azqboxv6');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `nama`, `level`) VALUES
(1, 'arka', '123', 'arka', 'admin'),
(2, 'user', 'user', 'evan', 'user'),
(3, 'operator', '321', 'fasya', 'operator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_buku`
--
ALTER TABLE `daftar_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `data_admin`
--
ALTER TABLE `data_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `data_operator`
--
ALTER TABLE `data_operator`
  ADD PRIMARY KEY (`id_operator`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_buku`
--
ALTER TABLE `daftar_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `data_admin`
--
ALTER TABLE `data_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_operator`
--
ALTER TABLE `data_operator`
  MODIFY `id_operator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

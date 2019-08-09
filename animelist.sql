-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Agu 2019 pada 20.08
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `animelist`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar`
--

CREATE TABLE `daftar` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `episode` int(3) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `studio` varchar(50) NOT NULL,
  `cover` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `daftar`
--

INSERT INTO `daftar` (`id`, `judul`, `episode`, `genre`, `studio`, `cover`) VALUES
(2, 'Aldnoah.Zero', 12, 'Action', 'A-1 Pictures', 'aldnoah.jpg'),
(3, 'Ansatsu Kyoushitsu', 22, 'Action', 'Lerche', 'ansatsu.jpg'),
(4, 'Anohana', 11, 'Drama', 'A-1 Pictures', 'anohana.jpg'),
(5, 'Barakamon', 12, 'Drama', 'Kinema Citrus', 'barakamon.jpg'),
(6, 'Charlotte', 13, 'Drama', 'P.A Works', 'charlotte.jpg'),
(7, 'Boku dake ga Inai Machi', 12, 'Mystery', 'A-1 Pictures', 'bokumachi.jpg'),
(8, 'Death Note', 37, 'Mystery', 'Madhouse', 'death.jpg'),
(11, 'Arslan Senki', 25, 'Action', 'SANZIGEN, LIDENFILMS', '5d321e5fa80d6.jpg'),
(12, 'Angel Beats!', 13, 'Action', 'P.A Works', '5d32fcb6a10c6.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$myIW61Ne4ZQpnEEN4k1Cjui4z6vYz3cNgzhkIt0xO9iLJr3jjgDYq'),
(4, 'hasan', '$2y$10$znIndTqOQftWGLXZVmWPK.ylN9rOSJjiqnInVzp.7hGoF/RfDor2y');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `daftar`
--
ALTER TABLE `daftar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `daftar`
--
ALTER TABLE `daftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

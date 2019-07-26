-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jul 2019 pada 14.03
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tes_jendela360`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_buyer`
--

CREATE TABLE `tb_buyer` (
  `id_buyer` int(11) NOT NULL,
  `name_of_buyer` varchar(50) NOT NULL,
  `email_buyer` varchar(50) NOT NULL,
  `id_car` int(11) NOT NULL,
  `insert_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_buyer`
--

INSERT INTO `tb_buyer` (`id_buyer`, `name_of_buyer`, `email_buyer`, `id_car`, `insert_time`) VALUES
(1, 'Budi', 'budi@gmail.com', 1, '2019-07-26 11:46:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_car`
--

CREATE TABLE `tb_car` (
  `id_car` int(11) NOT NULL,
  `name_of_car` varchar(50) NOT NULL,
  `price_car` int(12) NOT NULL,
  `stock_car` int(4) NOT NULL,
  `insert_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_time` datetime DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_car`
--

INSERT INTO `tb_car` (`id_car`, `name_of_car`, `price_car`, `stock_car`, `insert_time`, `update_time`, `delete_time`) VALUES
(1, 'Chevrolet', 20000000, 44, '2019-07-26 11:46:32', '2019-07-26 11:46:32', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `insert_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `name`, `username`, `password`, `insert_time`) VALUES
(1, 'Arief Fahrizon', 'admin', 'b7987d938e53a7600982b53371080d40', '2019-07-26 10:10:10');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_buyer`
--
ALTER TABLE `tb_buyer`
  ADD PRIMARY KEY (`id_buyer`);

--
-- Indeks untuk tabel `tb_car`
--
ALTER TABLE `tb_car`
  ADD PRIMARY KEY (`id_car`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_buyer`
--
ALTER TABLE `tb_buyer`
  MODIFY `id_buyer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_car`
--
ALTER TABLE `tb_car`
  MODIFY `id_car` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

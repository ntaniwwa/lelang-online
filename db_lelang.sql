-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jun 2026 pada 07.24
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lelang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `tgl` date NOT NULL,
  `harga_awal` int(11) NOT NULL,
  `deskripsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `photo`, `tgl`, `harga_awal`, `deskripsi`) VALUES
(2201, 'figures sanji', 'sanji.webp', '2026-03-14', 200000, 'action figure  chibi sanji '),
(2203, 'princess lolita jane shoe', 'JaneShoes.jpg', '2026-04-01', 580000, 'sepatu merah muda dengan bentuk yang imut dan menggemaskan.'),
(2204, 'choso figure', 'choso.jpg', '2026-04-01', 40000, 'figure langka '),
(2205, 'nanami figure', 'nanami.jpg', '2026-04-01', 40000, 'figure om om langka'),
(2206, 'deni', 'deni.jpg', '2026-04-15', 200000, 'celana denim wanita'),
(2207, 'cardigan', 'cardigan.jpg', '2026-04-15', 170000, 'cardigan biru korea'),
(2208, 'charizard', 'charizard.webp', '2026-04-15', 84000, 'kartu langka'),
(2209, 'figurine', 'figurine.jpg', '2026-04-15', 1300000000, 'figure giyu san'),
(2210, 'ghibli', 'ghibli.jpg', '2026-04-15', 5000000, 'kumpulan kaset/buku ghibli'),
(2211, 'glasses', 'glasses.jpg', '2026-04-15', 67000, 'kacamata lucu warna pink langka'),
(2212, 'jinwoo', 'jinwoo.webp', '2026-04-15', 250000, 'figure jinwoo'),
(2213, 'mitsuri', 'mitsuri.jpg', '2026-04-15', 1500000, 'sepatu dengan warna mitsuri'),
(2214, 'pink pants', 'pinkpants.jpg', '2026-04-15', 170000, 'celana pink lucu'),
(2215, 'kartu pokemon', 'pokemon.jpg', '2026-04-15', 580000, 'kartu pokemon rare'),
(2216, 'kartu pokemon gold', 'shiningpokemon.webp', '2026-04-15', 67000, 'kartu pokemon gold langka'),
(2217, 'shoes', 'shoes.jpg', '2026-04-15', 2400000, 'sepatu biru lucu'),
(2218, 'kartu snorlax', 'snorlax.jpg', '2026-04-15', 53000, 'kartu snorlak langka'),
(22002, 'jennie cardigan', 'jennie.jpg', '2026-04-01', 1000000, 'kardigan yang pernah di pakai jennie blackpink'),
(22003, 'kesukaan ku', '', '0000-00-00', 200, 'apa aja yg aku suka');

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_lelang`
--

CREATE TABLE `history_lelang` (
  `id_history` int(11) NOT NULL,
  `id_lelang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `penawaran_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `history_lelang`
--

INSERT INTO `history_lelang` (`id_history`, `id_lelang`, `id_barang`, `id_user`, `penawaran_harga`) VALUES
(801, 1, 2201, 15, 0),
(802, 1, 2201, 11, 300000),
(803, 15, 2215, 15, 2000000),
(804, 11, 2211, 15, 70000),
(805, 7, 2207, 15, 200000),
(806, 7, 2207, 15, 210000),
(807, 7, 2207, 15, 250000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lelang`
--

CREATE TABLE `lelang` (
  `id_lelang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl_lelang` date NOT NULL,
  `harga_akhir` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `status` enum('dibuka','ditutup') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lelang`
--

INSERT INTO `lelang` (`id_lelang`, `id_barang`, `tgl_lelang`, `harga_akhir`, `id_user`, `id_petugas`, `status`) VALUES
(1, 2201, '2026-04-15', 300000, 11, 1, 'ditutup'),
(2, 22002, '2026-04-15', 0, 15, 1, 'ditutup'),
(3, 2203, '2026-04-15', 0, 15, 1, 'ditutup'),
(4, 2204, '2026-04-15', 0, 15, 1, 'ditutup'),
(5, 2205, '2026-04-15', 0, 15, 1, 'ditutup'),
(6, 2206, '2026-04-15', 0, 15, 1, 'ditutup'),
(7, 2207, '2026-05-20', 250000, 15, 1, 'ditutup'),
(8, 2208, '2026-04-15', 0, 15, 1, 'ditutup'),
(9, 2209, '2026-04-15', 0, 15, 1, 'ditutup'),
(10, 2210, '2026-04-15', 0, 15, 1, 'ditutup'),
(11, 2211, '2026-05-13', 70000, 15, 1, 'ditutup'),
(12, 2212, '2026-04-15', 0, 15, 1, 'ditutup'),
(13, 2213, '2026-04-15', 0, 15, 1, 'ditutup'),
(14, 2214, '2026-04-15', 0, 15, 1, 'ditutup'),
(15, 2215, '2026-04-15', 2000000, 15, 1, 'ditutup');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `level` enum('administrator','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `level`) VALUES
(1, 'administrator'),
(2, 'petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `telp` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`id_user`, `nama_lengkap`, `username`, `password`, `telp`) VALUES
(9, 'mita matatul ajiah', 'minijiihi', 'iniistriyeo', '09876543'),
(10, 'INTANIA', 'iniintan', 'iniintan', '09876543'),
(11, 'yeosang', 'yyeuuuu', 'rtggfdw3', '0987654321'),
(12, 'mimi', 'mimipwer', '0okjnbddfghj', '0123456789'),
(13, 'MIMI', 'ntabita', 'werty', '012345'),
(14, 'chaeleebeeeeewwwwwwww', 'chae', 'bekicotterbang', '0000888882222333444555'),
(15, 'uyuuu', 'yuhuy666', '5eb5xg78wwv4xh5', '08911172536'),
(17, 'p', 'yuhuy666', '5eb5xg78wwv4xh5', '081234567'),
(18, 'ygu', 'yuhuy666', '5eb5xg78wwv4xh5', '1234567'),
(19, 'nmfgh', 'yuhuy666', '5eb5xg78wwv4xh5', '1234'),
(20, 'asdf', 'yuhuy666', '5eb5xg78wwv4xh5', '12345'),
(23, 'asuuu', 'yuhuy666', '5eb5xg78wwv4xh5', '8765'),
(24, 'syiuuu', 'yuhuy666', '5eb5xg78wwv4xh5', '4876'),
(25, '', '', '', ''),
(26, 'mimi', 'yuhuy666', 'mimiimut', '12345'),
(27, 'ntaniwa', 'yuhuy666', 'intania', '12345678'),
(33, 'ADIS', 'disa', '2345', '98765778812978');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `id_level`) VALUES
(1, 'Administrator', 'admin', 'admin', 1),
(2001, 'mita mataul', 'mitata', '123456789', 2),
(2003, 'bangbang', 'leli', '123456789', 2),
(2004, 'ntaniwa', 'kudajean', 'asuuuuuuuuuu', 2),
(2005, 'indomie', 'yakult', 'hayang modol', 1),
(2006, 'kang yeosang', 'yeosang', 'sukaateez', 2),
(2007, 'Petugas 1', 'petugas', '827ccb0eea8a706c4c34a1689', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id_login` int(11) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `level` enum('administrator','petugas') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD UNIQUE KEY `nama_barang` (`nama_barang`);

--
-- Indeks untuk tabel `history_lelang`
--
ALTER TABLE `history_lelang`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `history_lelang_ibfk_1` (`id_user`),
  ADD KEY `id_lelang` (`id_lelang`);

--
-- Indeks untuk tabel `lelang`
--
ALTER TABLE `lelang`
  ADD PRIMARY KEY (`id_lelang`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`),
  ADD UNIQUE KEY `level` (`level`);

--
-- Indeks untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `nama_lengkap` (`nama_lengkap`,`username`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_level` (`id_level`);

--
-- Indeks untuk tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id_login`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `level` (`level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22004;

--
-- AUTO_INCREMENT untuk tabel `history_lelang`
--
ALTER TABLE `history_lelang`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=808;

--
-- AUTO_INCREMENT untuk tabel `lelang`
--
ALTER TABLE `lelang`
  MODIFY `id_lelang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2008;

--
-- AUTO_INCREMENT untuk tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `history_lelang`
--
ALTER TABLE `history_lelang`
  ADD CONSTRAINT `history_lelang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `masyarakat` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `history_lelang_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `history_lelang_ibfk_3` FOREIGN KEY (`id_lelang`) REFERENCES `lelang` (`id_lelang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `lelang`
--
ALTER TABLE `lelang`
  ADD CONSTRAINT `lelang_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `masyarakat` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lelang_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`);

--
-- Ketidakleluasaan untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD CONSTRAINT `tbl_login_ibfk_1` FOREIGN KEY (`level`) REFERENCES `level` (`level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

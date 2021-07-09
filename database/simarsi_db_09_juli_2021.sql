-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 09 Jul 2021 pada 08.19
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simarsi_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `indeks_berkas`
--

CREATE TABLE `indeks_berkas` (
  `id_indeks` int(3) NOT NULL,
  `kode_indeks` varchar(10) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `indeks_berkas`
--

INSERT INTO `indeks_berkas` (`id_indeks`, `kode_indeks`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 'B.02', 'Surat telegram', '2021-07-03 06:06:56', '2021-07-03 06:32:58'),
(3, 'DS.01', 'Surat dinas luar', '2021-07-03 06:07:15', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_surat`
--

CREATE TABLE `jenis_surat` (
  `id_jenis` int(3) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_surat`
--

INSERT INTO `jenis_surat` (`id_jenis`, `jenis`, `created_at`, `updated_at`) VALUES
(1, 'Surat biasa', '2021-07-03 05:26:33', NULL),
(3, 'Surat telegram', '2021-07-03 05:26:50', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_management`
--

CREATE TABLE `role_management` (
  `id_role` int(3) NOT NULL,
  `nrp` varchar(8) NOT NULL,
  `menus` varchar(100) NOT NULL,
  `role` enum('T','F') NOT NULL DEFAULT 'F' COMMENT 'Akses Menu',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role_management`
--

INSERT INTO `role_management` (`id_role`, `nrp`, `menus`, `role`, `created_at`, `updated_at`) VALUES
(1, '08999', 'dashboard', 'T', '2021-07-06 01:41:17', NULL),
(2, '08999', 'suratmasuk', 'F', '2021-07-06 01:41:17', '2021-07-07 02:37:20'),
(3, '08999', 'suratkeluar', 'F', '2021-07-06 01:41:17', NULL),
(4, '08999', 'laporansuratmasuk', 'T', '2021-07-06 01:41:17', '2021-07-07 02:37:26'),
(5, '08999', 'laporansuratkeluar', 'T', '2021-07-06 01:41:17', '2021-07-07 02:37:07'),
(6, '12345678', 'dashboard', 'F', '2021-07-07 02:38:36', NULL),
(7, '12345678', 'suratmasuk', 'F', '2021-07-07 02:38:36', NULL),
(8, '12345678', 'suratkeluar', 'F', '2021-07-07 02:38:36', '2021-07-07 20:52:57'),
(9, '12345678', 'laporansuratmasuk', 'T', '2021-07-07 02:38:36', '2021-07-07 20:52:51'),
(10, '12345678', 'laporansuratkeluar', 'F', '2021-07-07 02:38:36', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat`
--

CREATE TABLE `surat` (
  `id_surat` int(3) NOT NULL,
  `jenis_surat` int(3) NOT NULL,
  `indeks_berkas` int(3) NOT NULL,
  `tgl_surat` date NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `asal_surat` varchar(100) NOT NULL,
  `tujuan_surat` varchar(100) NOT NULL,
  `file_surat` text NOT NULL,
  `status_surat` enum('sm','sk') NOT NULL COMMENT 'SM = Surat Masuk, SK = Surat Keluar',
  `user_uploaded` int(3) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat`
--

INSERT INTO `surat` (`id_surat`, `jenis_surat`, `indeks_berkas`, `tgl_surat`, `perihal`, `nomor_surat`, `asal_surat`, `tujuan_surat`, `file_surat`, `status_surat`, `user_uploaded`, `created_at`, `updated_at`) VALUES
(1, 3, 2, '2021-07-13', 'Proposal peringatan hari ulang tahun media target tipikor tabloid cetak dan online', '003/PAN ULTAJ KE-1/TARGET TIPIKOR/VI/2021', 'MEDIA TARGET TIPIKOR', 'Polda', '87f12997c6c8969644708edb02a75bcd.pdf', 'sm', 1, '2021-07-08 06:33:14', NULL),
(3, 3, 3, '2021-07-19', 'Bahan Rakor Bulanan Kab. Lampung Selatan', '005/0489/1.09/2021', 'Sekretariat Daerah Kabupaten Lampung Selatan', 'POLDA LAMPUNG TIMUR', '06b2f7d5e1ee9404df1cc15dd0cb6956.pdf', 'sm', 1, '2021-07-08 08:14:16', NULL),
(9, 3, 3, '2021-07-15', 'Undangan BIMTEK \"PERPERS No. 16 Th 2018 tentang Pengadaan Barang/Jasa Pemerintah dan Ujian Nasoinal', '003/PAN ULTAJ KE-1/TARGET TIPIKOR/VI/2021', 'Dinas Perumahan dan Permukiman', 'POLDA LAMPUNG TIMUR', '1072bc5a9aa9506639b4ce57fbfa2593.pdf', 'sk', 1, '2021-07-08 21:10:54', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_personel` int(3) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `pangkat` varchar(100) NOT NULL,
  `nrp` varchar(8) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `username` varchar(18) NOT NULL,
  `password` varchar(100) NOT NULL DEFAULT '$2y$10$N33og08eYBFZlPT8unPeYe7D.xxoropy2OniU3jsN3Cb0iuUIGuae',
  `user_status` enum('admin','pimpinan','personel') NOT NULL DEFAULT 'personel'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_personel`, `nama`, `pangkat`, `nrp`, `jabatan`, `no_telpon`, `username`, `password`, `user_status`) VALUES
(1, 'Administrator', '-', '-', '', '-', 'admin', '$2y$10$N33og08eYBFZlPT8unPeYe7D.xxoropy2OniU3jsN3Cb0iuUIGuae', 'admin'),
(17, 'JUNIZAR, S.Kom', 'Kapolda', '08999', 'Kepala', '987654', 'junizar', '$2y$10$kfFPNvlo1WSPV9Bd6Vwe9OhijwWxUIQiNs0IOlhfeolyXc8iA0kHK', 'personel'),
(18, 'ACHMAD AGUNG BRAMTIHALLEY, SE, M.M', 'Kapolda', '12345678', 'Kapolda Bandar Lampung', '0987654', 'achmad', '$2y$10$7LNnBr7GGR/AmXHANZlRUeHmbuqcXNxHwQNJjSV8M2t8YMRzqOSjO', 'pimpinan');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_surat_keluar`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_surat_keluar` (
`id_jenis` int(3)
,`jenis` varchar(100)
,`id_indeks` int(3)
,`kode_indeks` varchar(10)
,`id_personel` int(3)
,`nama` varchar(100)
,`tgl_surat` date
,`id_surat` int(3)
,`perihal` varchar(100)
,`nomor_surat` varchar(100)
,`asal_surat` varchar(100)
,`tujuan_surat` varchar(100)
,`file_surat` text
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_surat_masuk`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_surat_masuk` (
`id_jenis` int(3)
,`jenis` varchar(100)
,`id_indeks` int(3)
,`kode_indeks` varchar(10)
,`id_surat` int(3)
,`tgl_surat` date
,`perihal` varchar(100)
,`nomor_surat` varchar(100)
,`asal_surat` varchar(100)
,`tujuan_surat` varchar(100)
,`file_surat` text
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_surat_keluar`
--
DROP TABLE IF EXISTS `v_surat_keluar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_surat_keluar`  AS  select `jenis_surat`.`id_jenis` AS `id_jenis`,`jenis_surat`.`jenis` AS `jenis`,`indeks_berkas`.`id_indeks` AS `id_indeks`,`indeks_berkas`.`kode_indeks` AS `kode_indeks`,`users`.`id_personel` AS `id_personel`,`users`.`nama` AS `nama`,`surat`.`tgl_surat` AS `tgl_surat`,`surat`.`id_surat` AS `id_surat`,`surat`.`perihal` AS `perihal`,`surat`.`nomor_surat` AS `nomor_surat`,`surat`.`asal_surat` AS `asal_surat`,`surat`.`tujuan_surat` AS `tujuan_surat`,`surat`.`file_surat` AS `file_surat` from (((`surat` join `jenis_surat` on(`jenis_surat`.`id_jenis` = `surat`.`jenis_surat`)) join `indeks_berkas` on(`indeks_berkas`.`id_indeks` = `surat`.`indeks_berkas`)) join `users` on(`users`.`id_personel` = `surat`.`user_uploaded`)) where `surat`.`status_surat` = 'sk' ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_surat_masuk`
--
DROP TABLE IF EXISTS `v_surat_masuk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_surat_masuk`  AS  select `jenis_surat`.`id_jenis` AS `id_jenis`,`jenis_surat`.`jenis` AS `jenis`,`indeks_berkas`.`id_indeks` AS `id_indeks`,`indeks_berkas`.`kode_indeks` AS `kode_indeks`,`surat`.`id_surat` AS `id_surat`,`surat`.`tgl_surat` AS `tgl_surat`,`surat`.`perihal` AS `perihal`,`surat`.`nomor_surat` AS `nomor_surat`,`surat`.`asal_surat` AS `asal_surat`,`surat`.`tujuan_surat` AS `tujuan_surat`,`surat`.`file_surat` AS `file_surat` from (((`surat` join `jenis_surat` on(`jenis_surat`.`id_jenis` = `surat`.`jenis_surat`)) join `indeks_berkas` on(`indeks_berkas`.`id_indeks` = `surat`.`indeks_berkas`)) join `users` on(`users`.`id_personel` = `surat`.`user_uploaded`)) where `surat`.`status_surat` = 'sm' ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `indeks_berkas`
--
ALTER TABLE `indeks_berkas`
  ADD PRIMARY KEY (`id_indeks`);

--
-- Indeks untuk tabel `jenis_surat`
--
ALTER TABLE `jenis_surat`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `role_management`
--
ALTER TABLE `role_management`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_personel`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `indeks_berkas`
--
ALTER TABLE `indeks_berkas`
  MODIFY `id_indeks` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jenis_surat`
--
ALTER TABLE `jenis_surat`
  MODIFY `id_jenis` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `role_management`
--
ALTER TABLE `role_management`
  MODIFY `id_role` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_personel` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

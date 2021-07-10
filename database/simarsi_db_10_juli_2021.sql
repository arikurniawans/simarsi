-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 10 Jul 2021 pada 06.01
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
(3, 'Surat telegram', '2021-07-03 05:26:50', NULL),
(4, 'Surat mutasi', '2021-07-09 20:29:41', NULL),
(5, 'Surat Permohonan Izin', '2021-07-09 20:30:07', NULL),
(6, 'Berita Acara', '2021-07-09 20:30:18', NULL),
(7, 'Surat Rekomendasi', '2021-07-09 20:30:27', NULL),
(8, 'Surat Pemberian Izin', '2021-07-09 20:30:35', NULL),
(9, 'Surat Keterangan', '2021-07-09 20:30:44', NULL),
(10, 'Surat Keputusan', '2021-07-09 20:30:52', NULL),
(11, 'Surat Perintah', '2021-07-09 20:31:00', NULL),
(12, 'Surat Bantahan', '2021-07-09 20:31:10', NULL),
(13, 'Surat Peringatan', '2021-07-09 20:31:20', NULL),
(14, 'Surat Perjanjian Kerja', '2021-07-09 20:31:28', NULL),
(15, 'Surat Tugas', '2021-07-09 20:31:51', NULL),
(16, 'Surat Perjanjian Transaksi', '2021-07-09 20:32:10', NULL),
(17, 'Surat Usulan', '2021-07-09 20:32:17', NULL),
(18, 'Surat Perjanjian Sewa Menyewa', '2021-07-09 20:32:25', NULL),
(19, 'Surat instruksi', '2021-07-09 20:32:32', NULL);

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
(1, '08999', 'dashboard', 'T', '2021-07-06 01:41:17', '2021-07-09 17:56:00'),
(2, '08999', 'suratmasuk', 'T', '2021-07-06 01:41:17', '2021-07-09 17:57:33'),
(3, '08999', 'suratkeluar', 'T', '2021-07-06 01:41:17', '2021-07-09 17:57:36'),
(4, '08999', 'laporansuratmasuk', 'T', '2021-07-06 01:41:17', '2021-07-09 22:12:53'),
(5, '08999', 'laporansuratkeluar', 'T', '2021-07-06 01:41:17', '2021-07-09 22:12:57'),
(6, '12345678', 'dashboard', 'F', '2021-07-07 02:38:36', '2021-07-09 17:26:02'),
(7, '12345678', 'suratmasuk', 'T', '2021-07-07 02:38:36', '2021-07-09 22:14:02'),
(8, '12345678', 'suratkeluar', 'T', '2021-07-07 02:38:36', '2021-07-09 17:26:13'),
(9, '12345678', 'laporansuratmasuk', 'T', '2021-07-07 02:38:36', '2021-07-07 20:52:51'),
(10, '12345678', 'laporansuratkeluar', 'T', '2021-07-07 02:38:36', '2021-07-09 22:14:06'),
(11, '9999', 'suratmasuk', 'T', '2021-07-09 20:25:08', '2021-07-09 20:27:16'),
(12, '9999', 'suratkeluar', 'T', '2021-07-09 20:25:08', '2021-07-09 20:57:26'),
(13, '9999', 'laporansuratmasuk', 'T', '2021-07-09 20:25:08', '2021-07-09 20:27:36'),
(14, '9999', 'laporansuratkeluar', 'T', '2021-07-09 20:25:08', '2021-07-09 20:57:30');

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
(9, 3, 3, '2021-07-15', 'Undangan BIMTEK \"PERPERS No. 16 Th 2018 tentang Pengadaan Barang/Jasa Pemerintah dan Ujian Nasoinal', '003/PAN ULTAJ KE-1/TARGET TIPIKOR/VI/2021', 'Dinas Perumahan dan Permukiman', 'POLDA LAMPUNG TIMUR', '1072bc5a9aa9506639b4ce57fbfa2593.pdf', 'sk', 1, '2021-07-08 21:10:54', NULL),
(10, 9, 3, '2021-07-29', 'Workshop DAK Bidang Air Minum dan Sanitasi Provinsi Lampung', 'um0102-Cb10/206', 'Kementrian Pekerjaan Umum dan Perumahan Rakyat', 'POLRES PESAWARAN', '9ee161b7d90006377cb568539e702cde.pdf', 'sm', 19, '2021-07-09 20:35:35', NULL),
(11, 4, 3, '2021-07-30', 'Permintaan Data Perumahan Tahun 2020', '900/2/2/IV.05/2021', 'Dinas DPMPPTSP', 'POLRES PESAWARAN', '49a2d5c8b540eb8fefa43adeaceb4022.pdf', 'sk', 19, '2021-07-09 21:00:24', NULL),
(12, 8, 2, '2021-07-31', 'SDM Pengelola Pengadaan Barang jasa', '900/136/IV.05/2021', 'Bagian Pengadaan Barang dan Jasa Setdakab', 'POLRES PESAWARAN', 'fa2b8ad77461cf405f5b5504f0de4334.pdf', 'sk', 19, '2021-07-09 21:02:02', NULL),
(13, 4, 2, '2021-07-29', 'Surat Permohonan Personil Inti Tim Verifikasi BSPS Provinsi Lampung TA 2021', 'UM.0102-Rb5/2021/948', 'Kementrian Pekerjaan Umum dan Perumahan Rakyat', 'POLRES PESAWARAN', 'c1bd9d682b9eed9e786d08137ba1bdb8.pdf', 'sm', 17, '2021-08-09 23:58:35', NULL);

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
(17, 'JUNIZAR, S.Kom', 'Kapolda', '08999', 'Kepala', '987654', 'junizar', '$2y$10$O7PEd35gyHtGqqUcwxl8ju6WKYM5oASmoWZTfHEJ/.ts.XcDKKVJ.', 'personel'),
(18, 'ACHMAD AGUNG BRAMTIHALLEY, SE, M.M', 'Kapolda', '12345678', 'Kapolda Bandar Lampung', '0987654', 'achmad', '$2y$10$7LNnBr7GGR/AmXHANZlRUeHmbuqcXNxHwQNJjSV8M2t8YMRzqOSjO', 'pimpinan'),
(19, 'Johansyah', 'IPDA', '9999', 'Kepala Bidang Pengadaan', '09876', 'johansyah', '$2y$10$DLxYjFbFzytwTOZ/rjIpYOsuQs9dUdeMWLL3BoJ4u40xODV2mMhJK', 'personel');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_rekap_tabel`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_rekap_tabel` (
`nomor_surat` varchar(100)
,`user_uploaded` int(3)
,`asal_surat` varchar(100)
,`jenis` varchar(100)
,`status_surat` enum('sm','sk')
,`tgl_surat` date
,`created_at` datetime
);

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
,`id_personel` int(3)
,`nama` varchar(100)
,`tgl_surat` date
,`perihal` varchar(100)
,`nomor_surat` varchar(100)
,`asal_surat` varchar(100)
,`tujuan_surat` varchar(100)
,`file_surat` text
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_rekap_tabel`
--
DROP TABLE IF EXISTS `v_rekap_tabel`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_rekap_tabel`  AS  select `surat`.`nomor_surat` AS `nomor_surat`,`surat`.`user_uploaded` AS `user_uploaded`,`surat`.`asal_surat` AS `asal_surat`,`jenis_surat`.`jenis` AS `jenis`,`surat`.`status_surat` AS `status_surat`,`surat`.`tgl_surat` AS `tgl_surat`,`surat`.`created_at` AS `created_at` from (`surat` join `jenis_surat` on(`jenis_surat`.`id_jenis` = `surat`.`jenis_surat`)) order by `surat`.`created_at` desc ;

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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_surat_masuk`  AS  select `jenis_surat`.`id_jenis` AS `id_jenis`,`jenis_surat`.`jenis` AS `jenis`,`indeks_berkas`.`id_indeks` AS `id_indeks`,`indeks_berkas`.`kode_indeks` AS `kode_indeks`,`surat`.`id_surat` AS `id_surat`,`users`.`id_personel` AS `id_personel`,`users`.`nama` AS `nama`,`surat`.`tgl_surat` AS `tgl_surat`,`surat`.`perihal` AS `perihal`,`surat`.`nomor_surat` AS `nomor_surat`,`surat`.`asal_surat` AS `asal_surat`,`surat`.`tujuan_surat` AS `tujuan_surat`,`surat`.`file_surat` AS `file_surat` from (((`surat` join `jenis_surat` on(`jenis_surat`.`id_jenis` = `surat`.`jenis_surat`)) join `indeks_berkas` on(`indeks_berkas`.`id_indeks` = `surat`.`indeks_berkas`)) join `users` on(`users`.`id_personel` = `surat`.`user_uploaded`)) where `surat`.`status_surat` = 'sm' ;

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
  MODIFY `id_jenis` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `role_management`
--
ALTER TABLE `role_management`
  MODIFY `id_role` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_personel` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

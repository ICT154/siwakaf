-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 29 Nov 2022 pada 22.34
-- Versi Server: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 5.6.36-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_wakaf`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar`
--

CREATE TABLE `gambar` (
  `id_peruntukan` varchar(50) NOT NULL,
  `gambar` text NOT NULL,
  `id_penerimaan_wakaf` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gambar`
--

INSERT INTO `gambar` (`id_peruntukan`, `gambar`, `id_penerimaan_wakaf`) VALUES
('PRUWAK83827', '0cbe3e20fe61877e6f6df270456a5e3e.JPG', '0'),
('PRUWAK83827', '7c2f67ac71600785416dd89ca135fbbf.jpg', '0'),
('PRUWAK83827', '7768fc50a9cf1688cf1832373844df58.jpg', '0'),
('PRUWAK92709', '3875cf87e4537c94464de7485d68ff3e.png', '0'),
('PRUWAK92709', '2bef543b3b5ea81121c9b6ab53d1acf2.jpg', '0'),
('PRUWAK40422', '2df7fff6db2179d20664ed9ece0e93f8.jpg', '0'),
('PRUWAK57822', 'b253f62e63b7ba6c8b51b34dc2eab6e2.jpg', '0'),
('PRUWAK22036', '179422a3ea74921bc424722ef79afcdd.JPG', 'WAKAF79233'),
('PRUWAK22036', 'dd9ad7c230c77f2114d5ec8056477f69.jpg', 'WAKAF79233'),
('PRUWAK22084', 'eba11c38c405114104147de601f60109.JPG', 'WAKAF55004'),
('PRUWAK36394', '37becca4b01927eef22f5ef9c8e5cabf.jpeg', 'WAKAF67377'),
('PRUWAK55684', '51575d63b3fe0df6a09367aab5ed10d2.jpg', 'WAKAF32230'),
('PRUWAK58380', '501399bc83a404762c83ddc28fa8fc8e.jpg', 'WAKAF98692'),
('PRUWAK94648', '6a748e34716520b788ef25d16d03c108.jpg', 'WAKAF30315'),
('PRUWAK70428', '7277d2cc883fa3fcfd6b2e5738e3c2e0.jpg', 'WAKAF90615'),
('PRUWAK83827', '0cbe3e20fe61877e6f6df270456a5e3e.JPG', '0'),
('PRUWAK83827', '7c2f67ac71600785416dd89ca135fbbf.jpg', '0'),
('PRUWAK83827', '7768fc50a9cf1688cf1832373844df58.jpg', '0'),
('PRUWAK92709', '3875cf87e4537c94464de7485d68ff3e.png', '0'),
('PRUWAK92709', '2bef543b3b5ea81121c9b6ab53d1acf2.jpg', '0'),
('PRUWAK40422', '2df7fff6db2179d20664ed9ece0e93f8.jpg', '0'),
('PRUWAK57822', 'b253f62e63b7ba6c8b51b34dc2eab6e2.jpg', '0'),
('PRUWAK22036', '179422a3ea74921bc424722ef79afcdd.JPG', 'WAKAF79233'),
('PRUWAK22036', 'dd9ad7c230c77f2114d5ec8056477f69.jpg', 'WAKAF79233'),
('PRUWAK22084', 'eba11c38c405114104147de601f60109.JPG', 'WAKAF55004'),
('PRUWAK36394', '37becca4b01927eef22f5ef9c8e5cabf.jpeg', 'WAKAF67377'),
('PRUWAK55684', '51575d63b3fe0df6a09367aab5ed10d2.jpg', 'WAKAF32230'),
('PRUWAK58380', '501399bc83a404762c83ddc28fa8fc8e.jpg', 'WAKAF98692'),
('PRUWAK94648', '6a748e34716520b788ef25d16d03c108.jpg', 'WAKAF30315'),
('PRUWAK70428', '7277d2cc883fa3fcfd6b2e5738e3c2e0.jpg', 'WAKAF90615'),
('PRUWAK79873', 'b237f80c08b937bd4cd70fc42584ee8d.jpg', 'WAKAF72378'),
('PRUWAK79873', '51c383c87632789c2b0332dc7d1b9526.jpg', 'WAKAF72378'),
('PRUWAK61640', 'a4690fd553f427d12f7b1dfbc3509162.jpg', 'WAKAF93908'),
('PRUWAK18302', 'dfd9ea716dd8a4bdbb7978e12fe9a872.jpg', 'WAKAF21368'),
('PRUWAK89679', '7566a4fe2debe6b706ac9faa7f3be169.jpg', 'WAKAF13532');

-- --------------------------------------------------------

--
-- Struktur dari tabel `geocoding`
--

CREATE TABLE `geocoding` (
  `address` varchar(255) NOT NULL DEFAULT '',
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_admin`
--

CREATE TABLE `t_admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `tgl_log_akhir` datetime NOT NULL,
  `ip` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_admin`
--

INSERT INTO `t_admin` (`username`, `password`, `nama`, `email`, `created`, `tgl_log_akhir`, `ip`) VALUES
('siwakaf', 'siwakaf', 'siwakaf', 'siwakaf@mail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_log_history`
--

CREATE TABLE `t_log_history` (
  `id_log` int(11) NOT NULL,
  `log_name` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `device` text NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_log_history`
--

INSERT INTO `t_log_history` (`id_log`, `log_name`, `username`, `ip`, `device`, `time`) VALUES
(12091, 'TAMBAH DATA SAKSI TEMP', 'siwakaf', '114.5.213.80', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:92.0) Gecko/20100101 Firefox/92.0', '2021-09-11 10:21:06'),
(18830, 'MENAMBAH DATA WAKAF', 'siwakaf', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0', '2021-09-10 11:03:23'),
(24343, 'TAMBAH DATA SAKSI TEMP', 'siwakaf', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0', '2021-09-09 13:50:41'),
(32214, 'TAMBAH DATA SAKSI TEMP', 'siwakaf', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0', '2021-09-09 13:49:18'),
(35043, 'MENAMBAH DATA WAKAF', 'siwakaf', '114.5.213.80', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:92.0) Gecko/20100101 Firefox/92.0', '2021-09-11 10:21:26'),
(54698, 'TAMBAH DATA SAKSI TEMP', 'siwakaf', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0', '2021-09-10 11:03:04'),
(64405, 'MENAMBAH INVENTARIS MASJID TEMP', 'siwakaf', '114.5.213.80', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:92.0) Gecko/20100101 Firefox/92.0', '2021-09-11 10:21:19'),
(70524, 'TAMBAH DATA BANGUNAN LAINNYA TEMP', 'siwakaf', '114.5.213.80', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:92.0) Gecko/20100101 Firefox/92.0', '2021-09-11 10:18:18'),
(71251, 'TAMBAH DATA SAKSI TEMP', 'siwakaf', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0', '2021-09-09 13:50:29'),
(75530, 'MENAMBAH DATA WAKAF', 'siwakaf', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0', '2021-09-09 13:50:47'),
(79893, 'TAMBAH DATA BANGUNAN LAINNYA TEMP', 'siwakaf', '114.5.213.80', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:92.0) Gecko/20100101 Firefox/92.0', '2021-09-11 10:21:11'),
(83562, 'TAMBAH DATA SAKSI TEMP', 'siwakaf', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0', '2021-09-09 13:50:21'),
(91167, 'TAMBAH DATA SAKSI TEMP', 'siwakaf', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0', '2021-09-09 13:50:00'),
(92438, 'TAMBAH DATA SAKSI TEMP', 'siwakaf', '114.5.213.80', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:92.0) Gecko/20100101 Firefox/92.0', '2021-09-11 10:20:59'),
(20383237, 'HAPUS DATA T_PIMPINAN_JAMAAH | WAKAF21368', 'siwakaf', '114.122.106.36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-11 10:02:39'),
(253608109, 'UBAH DATA JENIS WAKAF PJ-1230259595', 'siwakaf', '114.122.106.160', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-11 09:50:57'),
(295750001, 'HAPUS DATA T_PIMPINAN_JAMAAH | WAKAF21368', 'siwakaf', '114.122.106.36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-11 10:02:51'),
(427374091, 'UBAH DATA MUWAKIF IDPEM32267', 'siwakaf', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0', '2021-09-09 09:13:09'),
(706729357, 'UBAH DATA MUWAKIF IDPEM32267', 'siwakaf', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0', '2021-09-09 09:13:03'),
(920188251, 'TAMBAH DATA JENIS WAKAF PJ-710694153', 'siwakaf', '114.122.106.160', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-11 09:51:44'),
(1211479573, 'TAMBAH DATA JENIS WAKAF PJ-1230259595', 'siwakaf', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0', '2021-09-09 06:59:57'),
(1246520947, 'UBAH DATA JENIS WAKAF PJ-1230259595', 'siwakaf', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0', '2021-09-09 08:36:34'),
(1298417036, 'UBAH DATA MUWAKIF IDPEM73837', 'siwakaf', '114.124.163.129', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:92.0) Gecko/20100101 Firefox/92.0', '2021-09-11 10:29:18'),
(1494782661, 'HAPUS DATA T_PIMPINAN_JAMAAH | PJ-710694153', 'siwakaf', '114.122.106.160', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-11 09:51:49'),
(1593604722, 'UBAH DATA JENIS WAKAF PJ-1230259595', 'siwakaf', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0', '2021-09-09 08:36:27'),
(2088136936, 'UBAH DATA PENERIMA WAKAF IDPEN11442', 'siwakaf', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0', '2021-09-09 09:37:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pimpinan_jamaah`
--

CREATE TABLE `t_pimpinan_jamaah` (
  `id_pimpinan_jamaah` varchar(50) NOT NULL,
  `pimpinan_jamaah` varchar(50) NOT NULL,
  `alamat_pimpinan` text NOT NULL,
  `no_telp_pimpinan` bigint(50) NOT NULL,
  `email_pimpinan` varchar(50) NOT NULL,
  `ketua_jamaah` varchar(50) NOT NULL,
  `masa_jihad` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp_ketua` bigint(50) NOT NULL,
  `email_ketua` varchar(50) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `date_g` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_pimpinan_jamaah`
--

INSERT INTO `t_pimpinan_jamaah` (`id_pimpinan_jamaah`, `pimpinan_jamaah`, `alamat_pimpinan`, `no_telp_pimpinan`, `email_pimpinan`, `ketua_jamaah`, `masa_jihad`, `alamat`, `no_telp_ketua`, `email_ketua`, `latitude`, `longitude`, `date_g`) VALUES
('PJ-1230259595', 'CABANG CIPARAY', 'Jl. Raya Pacet, Sagaracipta, Kec. Ciparay, Bandung, Jawa Barat, Indonesia', 81222222, 'pimpin@mail.com', 'Didin Rosidin', '2014 - 2015', 'Jl. Raya Pacet, Sagaracipta, Kec. Ciparay, Bandung, Jawa Barat, Indonesia', 8222222, 'didin@mail.com', '-7.067352100000001', '107.7070018', '2021-09-09 06:59:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_wakaf_akt_penerimaan`
--

CREATE TABLE `t_wakaf_akt_penerimaan` (
  `id_penerimaan_wakaf` varchar(50) NOT NULL,
  `pimpinan_jamaah` varchar(50) NOT NULL,
  `id_kategori` varchar(50) NOT NULL,
  `id_jenis` varchar(50) NOT NULL,
  `id_penerima` varchar(50) NOT NULL,
  `id_pemberi` varchar(50) NOT NULL,
  `id_saksi` varchar(50) NOT NULL,
  `status_wakaf` varchar(50) NOT NULL,
  `id_sertifikat` varchar(50) NOT NULL,
  `id_luas_wakaf` varchar(50) NOT NULL,
  `est_nilai_bangunan` varchar(50) NOT NULL,
  `est_nilai_tanah` varchar(50) NOT NULL,
  `id_bangunan_lain` varchar(50) NOT NULL,
  `id_tingkat` varchar(50) NOT NULL,
  `id_inven` varchar(50) NOT NULL,
  `date_g` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_wakaf_akt_penerimaan`
--

INSERT INTO `t_wakaf_akt_penerimaan` (`id_penerimaan_wakaf`, `pimpinan_jamaah`, `id_kategori`, `id_jenis`, `id_penerima`, `id_pemberi`, `id_saksi`, `status_wakaf`, `id_sertifikat`, `id_luas_wakaf`, `est_nilai_bangunan`, `est_nilai_tanah`, `id_bangunan_lain`, `id_tingkat`, `id_inven`, `date_g`) VALUES
('WAKAF13532', 'CABANG CIPARAY', 'JW73086', 'PRUWAK89679', 'IDPEN56274', 'IDPEM59587', '', 'wakaf', 'IDSER39528', 'IDLU31498', '41000000', '500000000', '', '', '', NULL),
('WAKAF21368', 'CABANG CIPARAY', 'JW66095', 'PRUWAK18302', 'IDPEN75553', 'IDPEM73837', '', 'wakaf', 'IDSER41257', 'IDLU62793', '10000000', '10000000', '', '', '', NULL),
('WAKAF72378', 'CABANG CIPARAY', 'JW66095', 'PRUWAK79873', 'IDPEN11442', 'IDPEM32267', '', 'wakaf', 'IDSER28378', 'IDLU93601', '125000000', '4000000000', '', '', '', NULL),
('WAKAF93908', 'CABANG CIPARAY', 'JW66095', 'PRUWAK61640', 'IDPEN57171', 'IDPEM84521', '', 'wakaf', 'IDSER88329', 'IDLU57013', '4300000000', '54000000000', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_wakaf_bangunan_lain`
--

CREATE TABLE `t_wakaf_bangunan_lain` (
  `id_bangunan_lain` varchar(50) NOT NULL,
  `temp` varchar(50) NOT NULL,
  `jenis_bangunan` varchar(50) NOT NULL,
  `atas_nama_bang` varchar(50) NOT NULL,
  `surat_perjanjian` varchar(50) NOT NULL,
  `id_penerimaan_wakaf` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_wakaf_bangunan_lain`
--

INSERT INTO `t_wakaf_bangunan_lain` (`id_bangunan_lain`, `temp`, `jenis_bangunan`, `atas_nama_bang`, `surat_perjanjian`, `id_penerimaan_wakaf`) VALUES
('BG34555', '', 'RUMAH', 's', 'ADA', 'WAKAF13532'),
('BG41508', 'temp83851', 'RUMAH', 'hh', 'ADA', 'temp');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_wakaf_inven_masjid`
--

CREATE TABLE `t_wakaf_inven_masjid` (
  `id_inven` varchar(50) NOT NULL,
  `temp` varchar(50) NOT NULL,
  `jenis_inven` varchar(50) NOT NULL,
  `total_unit` varchar(50) NOT NULL,
  `keadaan_unit` varchar(50) NOT NULL,
  `id_penerimaan_wakaf` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_wakaf_inven_masjid`
--

INSERT INTO `t_wakaf_inven_masjid` (`id_inven`, `temp`, `jenis_inven`, `total_unit`, `keadaan_unit`, `id_penerimaan_wakaf`) VALUES
('INV97591', '', 'MIMBAR', '2', 'BAIK', 'WAKAF13532');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_wakaf_jenis`
--

CREATE TABLE `t_wakaf_jenis` (
  `id_jenis` varchar(50) NOT NULL,
  `jenis_wakaf` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `add_by` varchar(50) NOT NULL,
  `date_g` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_wakaf_jenis`
--

INSERT INTO `t_wakaf_jenis` (`id_jenis`, `jenis_wakaf`, `keterangan`, `add_by`, `date_g`) VALUES
('JW66095', 'Wakaf Lainnya', '', 'adminos', NULL),
('JW70512', 'Wakaf Pesantren', '', 'adminos', NULL),
('JW73086', 'Wakaf Masjid', '', 'adminos', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_wakaf_luas`
--

CREATE TABLE `t_wakaf_luas` (
  `id_luas_wakaf` varchar(50) NOT NULL,
  `id_penerimaan_wakaf` varchar(50) NOT NULL,
  `luas_bangunan` varchar(50) NOT NULL,
  `luas_tanah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_wakaf_luas`
--

INSERT INTO `t_wakaf_luas` (`id_luas_wakaf`, `id_penerimaan_wakaf`, `luas_bangunan`, `luas_tanah`) VALUES
('IDLU31498', 'WAKAF13532', '30000', '20000'),
('IDLU57013', 'WAKAF93908', '200000', '20000'),
('IDLU62793', 'WAKAF21368', '1000', '100'),
('IDLU93601', 'WAKAF72378', '1000', '40000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_wakaf_pemberi`
--

CREATE TABLE `t_wakaf_pemberi` (
  `id_pemberi` varchar(50) NOT NULL,
  `id_penerimaan_wakaf` varchar(50) NOT NULL,
  `nama_pemberi` varchar(50) NOT NULL,
  `alamat_pemberi` text NOT NULL,
  `date_g` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_wakaf_pemberi`
--

INSERT INTO `t_wakaf_pemberi` (`id_pemberi`, `id_penerimaan_wakaf`, `nama_pemberi`, `alamat_pemberi`, `date_g`) VALUES
('IDPEM32267', 'WAKAF72378', 'Ruhaya Sudirman', 'Jl. Sagaracipta No.33, Sagaracipta, Kec. Ciparay, Bandung, Jawa Barat 40381, Indonesia                                                ', '2021-09-09 09:13:09'),
('IDPEM59587', 'WAKAF13532', 'tes', '', NULL),
('IDPEM73837', 'WAKAF21368', 'Andi', 'Lembah Cipageran Kav. No. 20 Cipageran - Cimahi Utara                        ', '2021-09-11 10:29:18'),
('IDPEM84521', 'WAKAF93908', 'Jamal Bahrudin', 'Jln pajajaran', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_wakaf_penerima`
--

CREATE TABLE `t_wakaf_penerima` (
  `id_penerima` varchar(50) NOT NULL,
  `id_penerimaan_wakaf` varchar(50) NOT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `alamat_penerima` text NOT NULL,
  `no_penerima` varchar(50) NOT NULL,
  `email_penerima` varchar(50) NOT NULL,
  `date_g` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_wakaf_penerima`
--

INSERT INTO `t_wakaf_penerima` (`id_penerima`, `id_penerimaan_wakaf`, `nama_penerima`, `alamat_penerima`, `no_penerima`, `email_penerima`, `date_g`) VALUES
('IDPEN11442', 'WAKAF72378', 'Warga sekitar kebun', 'Jln jalan saja', '081222222', 'people@mail.com', '2021-09-09 09:37:38'),
('IDPEN56274', 'WAKAF13532', 'Tes', '', '0123123', 'tes@mail.com', NULL),
('IDPEN57171', 'WAKAF93908', 'Ruhyat Rosid', '', '08762653272', 'tes@mail.com', NULL),
('IDPEN75553', 'WAKAF21368', 'Agus', '', '089812', 'dsukarman@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_wakaf_peruntukan`
--

CREATE TABLE `t_wakaf_peruntukan` (
  `id_peruntukan` varchar(50) NOT NULL,
  `jenis_peruntukan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `lat` varchar(50) NOT NULL,
  `lng` varchar(50) NOT NULL,
  `id_penerimaan_wakaf` varchar(50) NOT NULL,
  `date_g` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_wakaf_peruntukan`
--

INSERT INTO `t_wakaf_peruntukan` (`id_peruntukan`, `jenis_peruntukan`, `alamat`, `no_telp`, `email`, `lat`, `lng`, `id_penerimaan_wakaf`, `date_g`) VALUES
('PRUWAK18302', 'Tanah', 'Arjasari, Bandung, West Java, Indonesia', '08121211', 'dsukarman@gmail.com', '-7.054939500000001', '107.6451458', 'WAKAF21368', NULL),
('PRUWAK61640', 'Pesantren Nurul Amanah', 'Kp.Bojongnangka, Rt/Rw 03/09, Mekarlaksana, Kec. Ciparay, Bandung, Jawa Barat 40381, Indonesia', '081222222', 'mail@mail.com', '-7.062586611426171', '107.69562173225165', 'WAKAF93908', NULL),
('PRUWAK79873', 'Wakaf Kebun Sayur', 'Jl. Sagaracipta No.33, Sagaracipta, Kec. Ciparay, Bandung, Jawa Barat 40381, Indonesia', '08156633333333', 'rusidah@mail.com', '-7.06500968353689', '107.70967328017883', 'WAKAF72378', NULL),
('PRUWAK89679', 'masjid as salam', 'Kp. Tanjunglaya, Rt/Rw:01/08, Ciparay, Kec. Ciparay, Bandung, Jawa Barat 40381, Indonesia', '0811111', 'tes@mail.com', '-7.031648325838792', '107.7125446111145', 'WAKAF13532', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_wakaf_saksi`
--

CREATE TABLE `t_wakaf_saksi` (
  `id_saksi` varchar(50) NOT NULL,
  `id_penerimaan_wakaf` varchar(50) NOT NULL,
  `temp` varchar(50) NOT NULL,
  `nama_saksi` varchar(50) NOT NULL,
  `status_saksi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_wakaf_saksi`
--

INSERT INTO `t_wakaf_saksi` (`id_saksi`, `id_penerimaan_wakaf`, `temp`, `nama_saksi`, `status_saksi`) VALUES
('S20506', 'WAKAF72378', '', 'Zelaya Pratiwi ', 'MASIH HIDUP'),
('S23558', 'WAKAF72378', '', 'Rahayu Sudiati', 'MASIH HIDUP'),
('S29715', 'WAKAF13532', '', 'v', 'MASIH HIDUP'),
('S39440', 'WAKAF72378', '', 'Safina Nurdiyanti', 'MASIH HIDUP'),
('S56924', 'WAKAF13532', '', 's', 'MASIH HIDUP'),
('S87019', 'WAKAF72378', '', 'Mila Maryati ', 'MASIH HIDUP'),
('S89193', 'WAKAF72378', '', 'Didi Mulyadi', 'MASIH HIDUP'),
('S97216', 'WAKAF93908', '', 'Gozal', 'MASIH HIDUP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_wakaf_sertifikat`
--

CREATE TABLE `t_wakaf_sertifikat` (
  `id_sertifikat` varchar(50) NOT NULL,
  `no_sertifikat` varchar(50) NOT NULL,
  `ajb` varchar(50) NOT NULL,
  `aiw` varchar(50) NOT NULL,
  `id_penerimaan_wakaf` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_wakaf_sertifikat`
--

INSERT INTO `t_wakaf_sertifikat` (`id_sertifikat`, `no_sertifikat`, `ajb`, `aiw`, `id_penerimaan_wakaf`) VALUES
('IDSER28378', '10.15.22.05.1.02324', '47/ A.J.B /Sib.Sel/2007', 'No. 3.3.00068/tanggal 16 September 2014', 'WAKAF72378'),
('IDSER39528', 'tes', 'tes', 'tes', 'WAKAF13532'),
('IDSER41257', '09881', '1210', '121', 'WAKAF21368'),
('IDSER88329', '1111111111111111111111', '22222222222', '22222222222222222', 'WAKAF93908');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_wakaf_tingkat_pesantren`
--

CREATE TABLE `t_wakaf_tingkat_pesantren` (
  `id_tingkat` varchar(50) NOT NULL,
  `id_penerimaan_wakaf` varchar(50) NOT NULL,
  `tingkat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_wakaf_tingkat_pesantren`
--

INSERT INTO `t_wakaf_tingkat_pesantren` (`id_tingkat`, `id_penerimaan_wakaf`, `tingkat`) VALUES
('TKTPS20168', 'WAKAF21368', ''),
('TKTPS69037', 'WAKAF72378', ''),
('TKTPS70758', 'WAKAF93908', ''),
('TKTPS96464', 'WAKAF13532', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `geocoding`
--
ALTER TABLE `geocoding`
  ADD PRIMARY KEY (`address`);

--
-- Indexes for table `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `t_log_history`
--
ALTER TABLE `t_log_history`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `t_pimpinan_jamaah`
--
ALTER TABLE `t_pimpinan_jamaah`
  ADD PRIMARY KEY (`id_pimpinan_jamaah`);

--
-- Indexes for table `t_wakaf_akt_penerimaan`
--
ALTER TABLE `t_wakaf_akt_penerimaan`
  ADD PRIMARY KEY (`id_penerimaan_wakaf`);

--
-- Indexes for table `t_wakaf_bangunan_lain`
--
ALTER TABLE `t_wakaf_bangunan_lain`
  ADD PRIMARY KEY (`id_bangunan_lain`),
  ADD KEY `id_penerimaan_wakaf` (`id_penerimaan_wakaf`);

--
-- Indexes for table `t_wakaf_inven_masjid`
--
ALTER TABLE `t_wakaf_inven_masjid`
  ADD PRIMARY KEY (`id_inven`);

--
-- Indexes for table `t_wakaf_jenis`
--
ALTER TABLE `t_wakaf_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `t_wakaf_luas`
--
ALTER TABLE `t_wakaf_luas`
  ADD PRIMARY KEY (`id_luas_wakaf`);

--
-- Indexes for table `t_wakaf_pemberi`
--
ALTER TABLE `t_wakaf_pemberi`
  ADD PRIMARY KEY (`id_pemberi`);

--
-- Indexes for table `t_wakaf_penerima`
--
ALTER TABLE `t_wakaf_penerima`
  ADD PRIMARY KEY (`id_penerima`);

--
-- Indexes for table `t_wakaf_peruntukan`
--
ALTER TABLE `t_wakaf_peruntukan`
  ADD PRIMARY KEY (`id_peruntukan`);

--
-- Indexes for table `t_wakaf_saksi`
--
ALTER TABLE `t_wakaf_saksi`
  ADD PRIMARY KEY (`id_saksi`),
  ADD KEY `id_penerimaan_wakaf` (`id_penerimaan_wakaf`);

--
-- Indexes for table `t_wakaf_sertifikat`
--
ALTER TABLE `t_wakaf_sertifikat`
  ADD PRIMARY KEY (`id_sertifikat`);

--
-- Indexes for table `t_wakaf_tingkat_pesantren`
--
ALTER TABLE `t_wakaf_tingkat_pesantren`
  ADD PRIMARY KEY (`id_tingkat`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

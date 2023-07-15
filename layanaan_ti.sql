-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jul 2023 pada 09.34
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `layanaan_ti`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aduan`
--

CREATE TABLE `aduan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `keluhan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_aduan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_atasan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_masuk` datetime DEFAULT NULL,
  `tgl_keluar` datetime DEFAULT NULL,
  `id_status` int(11) DEFAULT 1,
  `nama_pengambil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `aduan`
--

INSERT INTO `aduan` (`id`, `id_user`, `keluhan`, `no_aduan`, `no_hp`, `lokasi`, `email_atasan`, `tgl_masuk`, `tgl_keluar`, `id_status`, `nama_pengambil`, `deleted`, `created_at`, `updated_at`, `email`) VALUES
(1, 1, 'fsdf', '4234', '897', 'dfdsfd', 'maial@com', '2023-06-30 07:38:44', '2023-06-30 07:36:56', 2, 'fdsf', 1, '2023-06-30 00:37:20', '2023-06-30 00:37:22', NULL),
(4, NULL, 'yrtyr', 'jvFylVkD0jJfsW93lXXLL7qcmRh5dB1K2haCDwC4', '6456', 'tryr', NULL, '2023-07-08 12:28:50', NULL, 1, NULL, 1, '2023-07-08 05:28:50', '2023-07-08 05:28:50', 'dfsdf'),
(5, NULL, 'yrtyr', 'jvFylVkD0jJfsW93lXXLL7qcmRh5dB1K2haCDwC4', '6456', 'tryr', NULL, '2023-07-08 14:21:35', NULL, 1, NULL, 1, '2023-07-08 07:21:36', '2023-07-08 07:21:36', 'dfsdf'),
(6, NULL, 'yrtyr', 'jvFylVkD0jJfsW93lXXLL7qcmRh5dB1K2haCDwC4', '6456', 'tryr', NULL, '2023-07-08 14:21:40', NULL, 1, NULL, 1, '2023-07-08 07:21:40', '2023-07-08 07:21:40', 'dfsdf'),
(7, NULL, 'xczvxcv', 'fny78sgJOYb5CO6qBLfN5wNzUYZC5s3Ke2x5IV94', '432534', 'vzcc', NULL, '2023-07-08 14:27:00', NULL, 1, NULL, 1, '2023-07-08 07:27:00', '2023-07-08 07:27:00', 'admin@gmail.com'),
(8, NULL, 'banyak msalah', 'wPzDQZy6sn91rWFNENlvNAIDGND5phblW90qGKDE', '432534', 'test', NULL, '2023-07-08 15:57:00', NULL, 1, NULL, 1, '2023-07-08 08:57:00', '2023-07-08 08:57:00', 'admin@gmail.com'),
(9, NULL, 'dasdas', 'ht8X32201vLmacfrvUAsVLji3dxr7hpxZ0tmx8CB', 'das', 'das', NULL, '2023-07-08 15:58:56', NULL, 1, NULL, 1, '2023-07-08 08:58:56', '2023-07-08 08:58:56', 'admin@gmail.com'),
(10, NULL, 'dsfdfas', '1EbDLlZ6sSF3p3sznAgRD8xnW26ZrYr0h1dXyHRn', 'fasa', 'vzcc', NULL, '2023-07-08 16:00:06', NULL, 1, NULL, 1, '2023-07-08 09:00:06', '2023-07-08 09:00:06', 'admin@gmail.com'),
(11, NULL, 'fdsf', 'LkTPf7oJQ0qAtpoN5incD6SlXXvLwwjZYSVtzk8l', 'fsdf', 'fsdf', NULL, '2023-07-08 16:00:42', NULL, 1, NULL, 1, '2023-07-08 09:00:42', '2023-07-08 09:00:42', 'fsdf'),
(12, NULL, 'gfds', 'gfYBs9Eoz6P2L0km2y3ImrUd2t9sBqZgkdIVEh64', '786', '767', NULL, '2023-07-08 17:27:21', NULL, 1, NULL, 1, '2023-07-08 10:27:22', '2023-07-08 10:27:22', 'faearwaer'),
(13, NULL, 'rweq', 'yp0eflYMhTHKTcWTL7yUjjLGSqt0sQcc8QzUXlqp', 'fsa', '32423', NULL, '2023-07-08 17:30:32', NULL, 1, NULL, 1, '2023-07-08 10:30:32', '2023-07-08 10:30:32', 'fasd'),
(14, NULL, 'asd', 'D0Ie0fvxAi7seZdwSNHIjhC5dRZ5akDfTAYYm93W', 'fgsddfsd', 'fds', NULL, '2023-07-08 17:38:32', NULL, 1, NULL, 1, '2023-07-08 10:38:32', '2023-07-08 10:38:32', 'admin@gmail.com'),
(15, NULL, 'fds', '0m5MEkqrojtyHdqfidXzwSaCAvoSgNuerKSsr8Bm', 'safd', 'dsf', NULL, '2023-07-08 17:41:10', NULL, 1, NULL, 1, '2023-07-08 10:41:10', '2023-07-08 10:41:10', 'dsaf'),
(16, NULL, 'gfgdsf', 'HwVfUPynHBVYskrPo9nRjvdgthvvdAYVhvBM65NH', '543555', '546354', NULL, '2023-07-09 04:45:18', NULL, 1, NULL, 1, '2023-07-08 21:45:18', '2023-07-08 21:45:18', 'iqbaldeve@gmail.com'),
(17, NULL, 'test', '4Ue1533o2kuu4zDeJF8syFFjFvVHBoWiF43Yqz7q', '432534', 'test', 'test', '2023-07-09 17:12:11', NULL, 1, NULL, 1, '2023-07-09 10:12:11', '2023-07-09 10:12:11', 'admin@gmail.com'),
(18, NULL, 'test', '4Ue1533o2kuu4zDeJF8syFFjFvVHBoWiF43Yqz7q', '432534', 'test', 'test', '2023-07-09 17:12:20', NULL, 1, NULL, 1, '2023-07-09 10:12:20', '2023-07-09 10:12:20', 'admin@gmail.com'),
(19, NULL, 'test', '4Ue1533o2kuu4zDeJF8syFFjFvVHBoWiF43Yqz7q', '432534', 'test', 'test', '2023-07-09 17:13:04', NULL, 1, NULL, 1, '2023-07-09 10:13:04', '2023-07-09 10:13:04', 'admin@gmail.com'),
(20, NULL, 'test', '4Ue1533o2kuu4zDeJF8syFFjFvVHBoWiF43Yqz7q', '432534', 'test', 'muhammadfadly.mfd@gmail.com', '2023-07-09 17:20:40', NULL, 1, NULL, 1, '2023-07-09 10:20:46', '2023-07-09 10:20:46', 'muhammadfadly.mfd@gmail.com'),
(21, NULL, 'asdas', '8WOycZ0ISucPWAcfxrrTHMCCn6ePjIRenYUZ50cj', 'sda', 'das', 'muhammadfadly.mfd@gmail.com', '2023-07-09 17:32:44', NULL, 1, NULL, 1, '2023-07-09 10:32:44', '2023-07-09 10:32:44', 'muhammadfadly.mfd@gmail.com'),
(22, NULL, 'asdas', '8WOycZ0ISucPWAcfxrrTHMCCn6ePjIRenYUZ50cj', 'sda', 'das', 'muhammadfadly.mfd@gmail.com', '2023-07-09 17:33:12', NULL, 1, NULL, 1, '2023-07-09 10:33:12', '2023-07-09 10:33:12', 'muhammadfadly.mfd@gmail.com'),
(23, NULL, 'asdas', '8WOycZ0ISucPWAcfxrrTHMCCn6ePjIRenYUZ50cj', 'sda', 'das', 'muhammadfadly.mfd@gmail.com', '2023-07-09 17:35:47', NULL, 1, NULL, 1, '2023-07-09 10:35:47', '2023-07-09 10:35:47', 'muhammadfadly.mfd@gmail.com'),
(24, NULL, 'asdas', '8WOycZ0ISucPWAcfxrrTHMCCn6ePjIRenYUZ50cj', 'sda', 'das', 'muhammadfadly.mfd@gmail.com', '2023-07-09 17:38:26', NULL, 1, NULL, 1, '2023-07-09 10:38:26', '2023-07-09 10:38:26', 'muhammadfadly.mfd@gmail.com'),
(25, NULL, 'asdas', '8WOycZ0ISucPWAcfxrrTHMCCn6ePjIRenYUZ50cj', 'sda', 'das', 'muhammadfadly.mfd@gmail.com', '2023-07-09 17:38:58', NULL, 1, NULL, 1, '2023-07-09 10:38:58', '2023-07-09 10:38:58', 'muhammadfadly.mfd@gmail.com'),
(26, NULL, 'test email', 'vEZYCFO220scA3MDtauRGqyQ3k9zlzHpa2wcdJSs', '5434253', 'test', 'muhammadfadly.mfd@gmail.com', '2023-07-10 07:42:36', NULL, 1, NULL, 1, '2023-07-10 00:42:36', '2023-07-10 00:42:36', 'muhammadfadly.mfd@gmail.com'),
(27, NULL, 'test email', 'vEZYCFO220scA3MDtauRGqyQ3k9zlzHpa2wcdJSs', '5434253', 'test', 'muhammadfadly.mfd@gmail.com', '2023-07-10 07:42:50', NULL, 1, NULL, 1, '2023-07-10 00:42:50', '2023-07-10 00:42:50', 'muhammadfadly.mfd@gmail.com'),
(28, NULL, 'test email', 'vEZYCFO220scA3MDtauRGqyQ3k9zlzHpa2wcdJSs', '5434253', 'test', 'muhammadfadly.mfd@gmail.com', '2023-07-10 07:43:35', NULL, 1, NULL, 1, '2023-07-10 00:43:35', '2023-07-10 00:43:35', 'muhammadfadly.mfd@gmail.com'),
(29, NULL, 'test email', 'vEZYCFO220scA3MDtauRGqyQ3k9zlzHpa2wcdJSs', '5434253', 'test', 'muhammadfadly.mfd@gmail.com', '2023-07-10 07:44:47', NULL, 1, NULL, 1, '2023-07-10 00:44:47', '2023-07-10 00:44:47', 'muhammadfadly.mfd@gmail.com'),
(30, NULL, 'test email', 'vEZYCFO220scA3MDtauRGqyQ3k9zlzHpa2wcdJSs', '5434253', 'test', 'muhammadfadly.mfd@gmail.com', '2023-07-10 07:45:20', NULL, 1, NULL, 1, '2023-07-10 00:45:20', '2023-07-10 00:45:20', 'muhammadfadly.mfd@gmail.com'),
(31, NULL, 'test email', 'vEZYCFO220scA3MDtauRGqyQ3k9zlzHpa2wcdJSs', '5434253', 'test', 'muhammadfadly.mfd@gmail.com', '2023-07-10 07:49:33', NULL, 1, NULL, 1, '2023-07-10 00:49:33', '2023-07-10 00:49:33', 'muhammadfadly.mfd@gmail.com'),
(32, NULL, 'test email', 'vEZYCFO220scA3MDtauRGqyQ3k9zlzHpa2wcdJSs', '5434253', 'test', 'muhammadfadly.mfd@gmail.com', '2023-07-10 07:49:42', NULL, 1, NULL, 1, '2023-07-10 00:49:42', '2023-07-10 00:49:42', 'muhammadfadly.mfd@gmail.com'),
(33, NULL, 'test email', 'vEZYCFO220scA3MDtauRGqyQ3k9zlzHpa2wcdJSs', '5434253', 'test', 'muhammadfadly.mfd@gmail.com', '2023-07-10 07:51:21', NULL, 1, NULL, 1, '2023-07-10 00:51:21', '2023-07-10 00:51:21', 'muhammadfadly.mfd@gmail.com'),
(34, NULL, 'test email', 'vEZYCFO220scA3MDtauRGqyQ3k9zlzHpa2wcdJSs', '5434253', 'test', 'muhammadfadly.mfd@gmail.com', '2023-07-10 08:03:59', NULL, 1, NULL, 1, '2023-07-10 01:03:59', '2023-07-10 01:03:59', 'muhammadfadly.mfd@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_pakai_aduan`
--

CREATE TABLE `barang_pakai_aduan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_spepat` int(11) NOT NULL,
  `id_desc_aduan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_pakai_permintaan`
--

CREATE TABLE `barang_pakai_permintaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_inventaris` int(11) NOT NULL,
  `id_desc_permintaan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `desc_aduan`
--

CREATE TABLE `desc_aduan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_aduan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_inventaris` int(11) NOT NULL,
  `kerusakan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `diagnosa` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tindakan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_status` int(11) DEFAULT 1,
  `id_teknisi` int(11) DEFAULT NULL,
  `deleted` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_sperpat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `desc_aduan`
--

INSERT INTO `desc_aduan` (`id`, `no_aduan`, `id_inventaris`, `kerusakan`, `diagnosa`, `tindakan`, `deskripsi`, `id_status`, `id_teknisi`, `deleted`, `created_at`, `updated_at`, `id_sperpat`) VALUES
(1, 'czSXvp9X2CRqvrfo6qHvMSlSWuBOo68OiRzO4vTJ', 1, '32423', NULL, NULL, NULL, 1, 1, NULL, '2023-07-08 08:39:43', '2023-07-08 08:39:43', NULL),
(2, 'L7SYlML7lWxi2FZTWc2nVdm1784PwbcYoNK4IX0T', 1, 'test', NULL, NULL, NULL, 1, 1, NULL, '2023-07-08 08:48:13', '2023-07-08 08:48:13', NULL),
(3, 'L7SYlML7lWxi2FZTWc2nVdm1784PwbcYoNK4IX0T', 1, 'testdsa', NULL, NULL, NULL, 1, 1, 1, '2023-07-08 08:49:39', '2023-07-08 08:49:39', NULL),
(4, 'ubAID63bTcHy4ONO3ln0Trl3jggrovsTLTwU4lID', 1, 'dasda', NULL, NULL, NULL, 1, 1, 1, '2023-07-08 08:51:16', '2023-07-08 08:51:16', NULL),
(5, 'oiTNWNtVDUDPJFzLjXa1NZuCt6heP2qGBQRnbGMO', 1, 'sdasd', NULL, NULL, NULL, 1, 1, 1, '2023-07-08 08:53:46', '2023-07-08 08:53:46', NULL),
(6, 'wPzDQZy6sn91rWFNENlvNAIDGND5phblW90qGKDE', 1, 'tesst', 'dad', 'sadas', 'sdasa', 3, 1, 1, '2023-07-08 08:56:30', '2023-07-09 07:01:29', 4),
(7, 'wPzDQZy6sn91rWFNENlvNAIDGND5phblW90qGKDE', 1, 'tesst1', 'test', 'das', 'dasd', 4, 1, 1, '2023-07-08 08:56:37', '2023-07-09 07:01:20', 3),
(8, 'wPzDQZy6sn91rWFNENlvNAIDGND5phblW90qGKDE', 1, 'tesst12', 'testw', 'test', 'test', 2, 1, 1, '2023-07-08 08:56:41', '2023-07-09 07:01:35', 2),
(9, 'ht8X32201vLmacfrvUAsVLji3dxr7hpxZ0tmx8CB', 1, 'dasd', NULL, NULL, NULL, 1, 1, 1, '2023-07-08 08:58:47', '2023-07-08 08:58:47', NULL),
(10, '1EbDLlZ6sSF3p3sznAgRD8xnW26ZrYr0h1dXyHRn', 1, 'fsdf', NULL, NULL, NULL, 1, 1, 1, '2023-07-08 09:00:01', '2023-07-08 09:00:01', NULL),
(11, 'vEZYCFO220scA3MDtauRGqyQ3k9zlzHpa2wcdJSs', 2, 'testt', 'banyak', 'banyak', 'banyak', 1, NULL, 1, '2023-07-10 00:41:35', '2023-07-12 21:33:59', 2),
(12, 'd8Fsu1zklA9p3hKKQqdFZLjHUoYYWPgE4kWveOnz', 2, 'test', NULL, NULL, NULL, 1, NULL, 1, '2023-07-10 01:34:08', '2023-07-10 01:34:08', NULL),
(13, '8EfYmCidcVrBNj39prCtXGZ2EMJUd8Qf7KXFTVDl', 2, 'modal', NULL, NULL, NULL, 1, NULL, 1, '2023-07-10 01:35:17', '2023-07-10 01:35:17', NULL),
(14, '8EfYmCidcVrBNj39prCtXGZ2EMJUd8Qf7KXFTVDl', 2, 'modal', NULL, NULL, NULL, 1, NULL, 1, '2023-07-10 01:45:22', '2023-07-10 01:45:22', NULL),
(15, 'es5sY5IWT0OXocaWHIlLCv29oqark6Viv8ROpD2g', 3, 'test111', NULL, NULL, NULL, NULL, NULL, 0, '2023-07-10 01:45:39', '2023-07-10 01:51:43', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `desc_permintaan`
--

CREATE TABLE `desc_permintaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_permintaan` int(11) NOT NULL,
  `id_inventaris` int(11) NOT NULL,
  `diagnosa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tindakan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_status_deskripsi` int(11) NOT NULL,
  `id_status_qc` int(11) NOT NULL,
  `id_status_penyelesaian` int(11) NOT NULL,
  `id_teknisi` int(11) NOT NULL,
  `deleted` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris`
--

CREATE TABLE `inventaris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_inventaris` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_user_pemakai` int(11) DEFAULT NULL,
  `no_inventaris` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pemakaian` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `inventaris`
--

INSERT INTO `inventaris` (`id`, `nama_inventaris`, `id_jenis`, `id_user_pemakai`, `no_inventaris`, `deskripsi`, `status_pemakaian`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'HP 2333', 1, NULL, '123dasd', '11sdas', 1, '2023-07-02 00:46:09', '2023-07-09 08:52:59', 0),
(2, 'dfasd', 1, NULL, 'fas', 'fsda', 2, '2023-07-09 08:34:19', '2023-07-10 01:45:39', 1),
(3, 'dasd', 1, NULL, 'da', 'sda', 2, '2023-07-09 08:36:59', '2023-07-09 08:36:59', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis_barang`
--

INSERT INTO `jenis_barang` (`id`, `nama_jenis`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'www', 1, NULL, '2023-07-02 08:01:29'),
(2, 'add', 1, '2023-07-09 08:05:02', '2023-07-09 08:05:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_06_28_015102_create_permission_tables', 1),
(7, '2023_06_28_144807_create_statuses_table', 1),
(8, '2023_06_28_144835_create_jenis_barangs_table', 1),
(9, '2023_06_28_144908_create_sperpats_table', 1),
(10, '2023_06_28_144923_create_inventaris_table', 1),
(11, '2023_06_28_144954_create_aduans_table', 1),
(12, '2023_06_28_145010_create_desc_aduans_table', 1),
(13, '2023_06_28_145046_create_barang_pakai_aduans_table', 1),
(14, '2023_06_28_145107_create_permintaans_table', 1),
(15, '2023_06_28_145117_create_desc_permintaans_table', 1),
(16, '2023_06_28_145148_create_barang_pakai_permintaans_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(4, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan`
--

CREATE TABLE `permintaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `alasan_permintaan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_aduan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_atasan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `tgl_keluar` datetime NOT NULL,
  `id_status` int(11) NOT NULL,
  `nama_pengambil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(5, 'menu-sperpat', 'web', '2023-07-12 20:14:56', '2023-07-12 20:14:56'),
(6, 'menu-inventaris', 'web', '2023-07-12 20:15:09', '2023-07-12 20:15:09'),
(7, 'menu-status', 'web', '2023-07-12 20:15:21', '2023-07-12 20:15:21'),
(8, 'menu-master-data', 'web', '2023-07-12 20:17:52', '2023-07-12 20:17:52'),
(9, 'menu-jenis-barang', 'web', '2023-07-12 20:19:45', '2023-07-12 20:19:45'),
(10, 'menu-user', 'web', '2023-07-12 20:20:19', '2023-07-12 20:20:19'),
(11, 'menu-userRole', 'web', '2023-07-12 20:20:49', '2023-07-12 20:20:49'),
(12, 'menu-role', 'web', '2023-07-12 20:20:58', '2023-07-12 20:20:58'),
(13, 'menu-permission', 'web', '2023-07-12 20:21:08', '2023-07-12 20:21:08'),
(14, 'menu-aduan', 'web', '2023-07-12 20:21:19', '2023-07-12 20:21:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'test', 'web', '2023-07-03 06:20:00', '2023-07-03 06:20:00'),
(3, 'teknisi', 'web', '2023-07-05 09:08:20', '2023-07-05 09:08:20'),
(4, 'super-admin', 'web', '2023-07-12 20:07:56', '2023-07-12 20:07:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sperpat`
--

CREATE TABLE `sperpat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_sperpat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_user_pemakai` int(11) DEFAULT NULL,
  `no_inventaris` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pemakaian` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted` int(11) DEFAULT 1,
  `id_inventaris_pemakai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sperpat`
--

INSERT INTO `sperpat` (`id`, `nama_sperpat`, `id_jenis`, `id_user_pemakai`, `no_inventaris`, `deskripsi`, `status_pemakaian`, `created_at`, `updated_at`, `deleted`, `id_inventaris_pemakai`) VALUES
(1, 'www', 2, 1, '2121', 'dfsdfdf', 1, '2023-07-02 14:52:48', '2023-07-09 06:34:51', 1, 1),
(2, 'dasd', 2, 1, '2121', 'dfsdfdf', 2, '2023-07-02 14:52:48', '2023-07-12 21:33:59', 1, 2),
(3, 'sda', 2, 1, '2121', 'dfsdfdf', 2, '2023-07-02 14:52:48', '2023-07-09 07:01:20', 1, 1),
(4, 'dsad', 2, 1, '2121', 'dfsdfdf', 2, '2023-07-02 14:52:48', '2023-07-09 07:01:29', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id`, `nama_status`, `color`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'Open', '#0347b5', 1, NULL, '2023-07-08 22:56:12'),
(2, 'Diterima', '#e60f0f', 1, NULL, '2023-07-02 02:15:05'),
(3, 'Ditindak Lanjuti', '#9e3d3d', 1, '2023-07-02 02:23:52', '2023-07-03 05:45:45'),
(4, 'Sudah dikerjakan', '#00ffaa', 1, '2023-07-05 08:44:45', '2023-07-05 08:44:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Fadli', 'admin@gmail.com', NULL, '$2y$10$GdaUT/MYEsjSe9tiVRdvmOdfujygHvZZIUfauU0u8.vjolDh70H7S', NULL, '2023-07-01 20:50:55', '2023-07-01 20:50:55'),
(2, 'Darien Dach Sr.', 'gwaters@example.org', '2023-07-08 21:34:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Gm4qlCuLKN', '2023-07-08 21:34:13', '2023-07-08 21:34:13'),
(3, 'Cortney Greenfelder', 'jamal.conroy@example.net', '2023-07-08 21:34:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'kSwI0EAdvU', '2023-07-08 21:34:13', '2023-07-08 21:34:13'),
(4, 'Pink Bins', 'obogan@example.com', '2023-07-08 21:34:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'td0SAGJ1k5', '2023-07-08 21:34:13', '2023-07-08 21:34:13'),
(5, 'Reyna Yundt', 'cremin.maxime@example.com', '2023-07-08 21:34:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'xNg0zXiGNZ', '2023-07-08 21:34:13', '2023-07-08 21:34:13'),
(6, 'Rebeka Effertz', 'jazmin.hahn@example.net', '2023-07-08 21:34:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'lbbXax3vbl', '2023-07-08 21:34:13', '2023-07-08 21:34:13'),
(7, 'Boyd Stamm', 'molly.rippin@example.com', '2023-07-08 21:34:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'GqftjavBj4', '2023-07-08 21:34:13', '2023-07-08 21:34:13'),
(8, 'Ms. Ayana Murray III', 'ullrich.shaylee@example.com', '2023-07-08 21:34:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Fs5Qc2QLnA', '2023-07-08 21:34:13', '2023-07-08 21:34:13'),
(9, 'Dr. Leopoldo Fahey', 'jacobson.franz@example.org', '2023-07-08 21:34:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'AWmjExrCtN', '2023-07-08 21:34:13', '2023-07-08 21:34:13'),
(10, 'Wilton Barrows', 'wschamberger@example.org', '2023-07-08 21:34:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'TNIF4ZmSIj', '2023-07-08 21:34:13', '2023-07-08 21:34:13');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aduan`
--
ALTER TABLE `aduan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang_pakai_aduan`
--
ALTER TABLE `barang_pakai_aduan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang_pakai_permintaan`
--
ALTER TABLE `barang_pakai_permintaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `desc_aduan`
--
ALTER TABLE `desc_aduan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `desc_permintaan`
--
ALTER TABLE `desc_permintaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `sperpat`
--
ALTER TABLE `sperpat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aduan`
--
ALTER TABLE `aduan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `barang_pakai_aduan`
--
ALTER TABLE `barang_pakai_aduan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `barang_pakai_permintaan`
--
ALTER TABLE `barang_pakai_permintaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `desc_aduan`
--
ALTER TABLE `desc_aduan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `desc_permintaan`
--
ALTER TABLE `desc_permintaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `permintaan`
--
ALTER TABLE `permintaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sperpat`
--
ALTER TABLE `sperpat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

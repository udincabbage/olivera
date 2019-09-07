-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07 Sep 2019 pada 02.26
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nkit_pim_olivera`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aksesibilitas`
--

CREATE TABLE IF NOT EXISTS `aksesibilitas` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aksesibilitas`
--

INSERT INTO `aksesibilitas` (`id`, `created_at`, `updated_at`, `status`, `nama`, `nilai`, `info`) VALUES
(1, '0000-00-00 00:00:00', '2019-08-27 20:55:06', 0, 'Mudah', 8, 'Mudah didatangi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `banding`
--

CREATE TABLE IF NOT EXISTS `banding` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `id_subjek` int(11) DEFAULT NULL,
  `tanggal_penilaian` date DEFAULT NULL,
  `total_absolut` int(11) DEFAULT NULL,
  `bobot_absolut` int(11) DEFAULT NULL,
  `inverse` int(11) DEFAULT NULL,
  `bobot` int(11) DEFAULT NULL,
  `kisaran_maksimum` bigint(64) DEFAULT NULL,
  `kisaran_minimum` bigint(64) DEFAULT NULL,
  `validasi` varchar(64) DEFAULT NULL,
  `indikasi_nilai_pasar_per_m2` bigint(64) DEFAULT NULL,
  `indikasi_nilai_pasar` bigint(64) DEFAULT NULL,
  `indikasi_nilai_pasar_bulat` bigint(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bentuk_tapak`
--

CREATE TABLE IF NOT EXISTS `bentuk_tapak` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bentuk_tapak`
--

INSERT INTO `bentuk_tapak` (`id`, `created_at`, `updated_at`, `status`, `nama`, `nilai`, `info`) VALUES
(2, '0000-00-00 00:00:00', '2019-08-27 11:50:59', 0, 'Segi Empat Sejajar', 40, 'Bentuk tanah persegi empat dengan panjang dan lebar sama');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cara_pembayaran`
--

CREATE TABLE IF NOT EXISTS `cara_pembayaran` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cara_pembayaran`
--

INSERT INTO `cara_pembayaran` (`id`, `created_at`, `updated_at`, `status`, `nama`, `nilai`, `info`) VALUES
(1, '0000-00-00 00:00:00', '2019-08-27 20:57:00', 0, 'Tunai', 8, 'Kontan'),
(2, '0000-00-00 00:00:00', '2019-08-27 20:57:11', 0, 'Kredit', 4, 'Nyicil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hak_properti`
--

CREATE TABLE IF NOT EXISTS `hak_properti` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hak_properti`
--

INSERT INTO `hak_properti` (`id`, `created_at`, `updated_at`, `status`, `nama`, `nilai`, `info`) VALUES
(1, '0000-00-00 00:00:00', '2019-08-27 17:33:38', 0, 'SHM', 9, 'Sertifikat Hak Milik'),
(2, '0000-00-00 00:00:00', '2019-08-27 17:33:49', 0, 'HGB', 7, 'Hak Guna Bangunan'),
(3, '0000-00-00 00:00:00', '2019-08-27 17:34:27', 0, 'Hak Pakai', 5, 'Hak Pakai '),
(4, '0000-00-00 00:00:00', '2019-08-27 22:03:28', 0, 'AJB', 4, 'Anggunan Jual Belia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_subjek`
--

CREATE TABLE IF NOT EXISTS `jenis_subjek` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `info_jenis` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_subjek`
--

INSERT INTO `jenis_subjek` (`id`, `created_at`, `updated_at`, `status`, `nama`, `info_jenis`) VALUES
(1, '0000-00-00 00:00:00', '2019-08-27 11:31:14', 0, 'Tanah', 'Jenis perbandingan Tanah dalam zona hijau'),
(2, '0000-00-00 00:00:00', '2019-08-27 20:59:44', 0, 'Gedung', 'Jenis perbandingan Gedung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karakteristik_ekonomi`
--

CREATE TABLE IF NOT EXISTS `karakteristik_ekonomi` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karakteristik_ekonomi`
--

INSERT INTO `karakteristik_ekonomi` (`id`, `created_at`, `updated_at`, `status`, `nama`, `nilai`, `info`) VALUES
(1, '0000-00-00 00:00:00', '2019-08-27 20:52:48', 0, 'Maju', 5, 'Maju berkembang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karakteristik_subjek`
--

CREATE TABLE IF NOT EXISTS `karakteristik_subjek` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `id_subjek` int(11) NOT NULL,
  `nama_update` varchar(100) DEFAULT NULL,
  `sumber_data` date DEFAULT NULL,
  `id_hak_properti` int(11) DEFAULT NULL,
  `id_syarat_pembiayaan` int(11) DEFAULT NULL,
  `id_kondisi_penjualan` int(11) DEFAULT NULL,
  `id_pengeluaran_segera` int(11) DEFAULT NULL,
  `id_kondisi_pasar` int(11) DEFAULT NULL,
  `luas_tanah` bigint(24) DEFAULT NULL,
  `id_posisi_tanah` int(11) DEFAULT NULL,
  `id_bentuk_tapak` int(11) DEFAULT NULL,
  `id_topografi` int(11) DEFAULT NULL,
  `id_orientasi` int(11) DEFAULT NULL,
  `id_lebar_jalan_depan` int(11) DEFAULT NULL,
  `id_kondisi_jalan_depan` int(11) DEFAULT NULL,
  `id_peruntukan` int(11) DEFAULT NULL,
  `id_karakteristik_ekonomi` int(11) DEFAULT NULL,
  `id_komponen_non_realty` int(11) DEFAULT NULL,
  `id_tahun_pasaran` int(11) DEFAULT NULL,
  `id_cara_pembayaran` int(11) DEFAULT NULL,
  `harga_penawaran` bigint(64) DEFAULT NULL,
  `penawaran_tertinggi` bigint(64) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `kemungkinana_trans_tanah_bangunan` bigint(64) DEFAULT NULL,
  `kemungkinana_trans_tanah` bigint(64) DEFAULT NULL,
  `id_lokasi` int(11) DEFAULT NULL,
  `id_aksesibilitas` int(11) DEFAULT NULL,
  `id_kondisi_lingkungan` int(11) DEFAULT NULL,
  `id_pengaruh_negatif` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karakteristik_subjek`
--

INSERT INTO `karakteristik_subjek` (`id`, `created_at`, `updated_at`, `status`, `id_subjek`, `nama_update`, `sumber_data`, `id_hak_properti`, `id_syarat_pembiayaan`, `id_kondisi_penjualan`, `id_pengeluaran_segera`, `id_kondisi_pasar`, `luas_tanah`, `id_posisi_tanah`, `id_bentuk_tapak`, `id_topografi`, `id_orientasi`, `id_lebar_jalan_depan`, `id_kondisi_jalan_depan`, `id_peruntukan`, `id_karakteristik_ekonomi`, `id_komponen_non_realty`, `id_tahun_pasaran`, `id_cara_pembayaran`, `harga_penawaran`, `penawaran_tertinggi`, `diskon`, `kemungkinana_trans_tanah_bangunan`, `kemungkinana_trans_tanah`, `id_lokasi`, `id_aksesibilitas`, `id_kondisi_lingkungan`, `id_pengaruh_negatif`) VALUES
(1, '0000-00-00 00:00:00', '2019-09-02 06:44:09', 0, 1, '201909-Tanah-Trikora', '0000-00-00', 1, 1, 1, 1, 1, 210, 1, 2, 1, 1, 10, 1, 1, 1, 1, 2017, 1, 55000000, 47000000, 7000000, 47000000, 47000000, 1, 1, 1, 1),
(2, '0000-00-00 00:00:00', '2019-09-02 06:48:05', 0, 1, '201901-Tanah-Trikora', '2019-04-01', 2, 1, 1, 1, 1, 210, 1, 2, 1, 1, 10, 1, 1, 1, 1, 2018, 1, 75000000, 57000000, 5000000, 57000000, 57000000, 1, 1, 1, 1),
(3, '0000-00-00 00:00:00', '2019-09-02 12:08:27', 0, 1, '201909-Tanah-Trikora', '2019-09-02', 1, 1, 2, 1, 2, 210, 1, 2, 1, 1, 10, 1, 1, 1, 1, 2017, 1, 0, 87000000, 6000000, 77000000, 77000000, 1, 1, 1, 1),
(4, '0000-00-00 00:00:00', '2019-09-02 13:05:27', 0, 3, '201909-Tanah-Jl-Jeruk', '2019-08-05', 1, 1, 2, 1, 2, 350, 1, 2, 1, 1, 12, 1, 1, 1, 1, 2018, 1, 0, 125000000, 11000000, 110000000, 110000000, 1, 1, 1, 1),
(5, '0000-00-00 00:00:00', '2019-09-07 07:25:33', 0, 6, '201909-Tanah-Gubernuran-2', '2019-09-07', 1, 1, 1, 1, 1, 360, 1, 2, 1, 1, 8, 1, 1, 1, 1, 0, 1, 0, 0, 0, 0, 0, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komponen_non_realty`
--

CREATE TABLE IF NOT EXISTS `komponen_non_realty` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komponen_non_realty`
--

INSERT INTO `komponen_non_realty` (`id`, `created_at`, `updated_at`, `status`, `nama`, `nilai`, `info`) VALUES
(1, '0000-00-00 00:00:00', '2019-08-27 20:54:18', 0, 'Ada Sumur', 3, 'Sumur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kondisi_jalan_depan`
--

CREATE TABLE IF NOT EXISTS `kondisi_jalan_depan` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kondisi_jalan_depan`
--

INSERT INTO `kondisi_jalan_depan` (`id`, `created_at`, `updated_at`, `status`, `nama`, `nilai`, `info`) VALUES
(1, '0000-00-00 00:00:00', '2019-08-27 20:51:56', 0, 'Aspal', 8, 'Aspal'),
(2, '0000-00-00 00:00:00', '2019-08-27 20:52:11', 0, 'Bata Press', 6, 'Bata Press');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kondisi_lingkungan`
--

CREATE TABLE IF NOT EXISTS `kondisi_lingkungan` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kondisi_lingkungan`
--

INSERT INTO `kondisi_lingkungan` (`id`, `created_at`, `updated_at`, `status`, `nama`, `nilai`, `info`) VALUES
(1, '0000-00-00 00:00:00', '2019-08-27 20:56:18', 0, 'Panas', 3, 'Berada diketinggian >60 DPL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kondisi_pasar`
--

CREATE TABLE IF NOT EXISTS `kondisi_pasar` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kondisi_pasar`
--

INSERT INTO `kondisi_pasar` (`id`, `created_at`, `updated_at`, `status`, `nama`, `nilai`, `info`) VALUES
(1, '0000-00-00 00:00:00', '2019-08-27 17:35:49', 0, 'Normal', 6, 'Ekonomi pasar sedang'),
(2, '0000-00-00 00:00:00', '2019-08-27 17:36:04', 0, 'Tinggi', 3, 'Ekonomi pasar tinggi'),
(3, '0000-00-00 00:00:00', '2019-08-27 17:36:31', 0, 'Rendah', 9, 'Daya beli rendah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kondisi_penjualan`
--

CREATE TABLE IF NOT EXISTS `kondisi_penjualan` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kondisi_penjualan`
--

INSERT INTO `kondisi_penjualan` (`id`, `created_at`, `updated_at`, `status`, `nama`, `nilai`, `info`) VALUES
(1, '0000-00-00 00:00:00', '2019-08-27 17:36:59', 0, 'Normal', 5, 'Normal'),
(2, '0000-00-00 00:00:00', '2019-08-27 17:37:19', 0, 'Cepat', 3, 'Dijual cepat'),
(3, '0000-00-00 00:00:00', '2019-08-27 17:37:33', 0, 'Lambat', 8, 'Terjual Lama');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lebar_jalan_depan`
--

CREATE TABLE IF NOT EXISTS `lebar_jalan_depan` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE IF NOT EXISTS `lokasi` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id`, `created_at`, `updated_at`, `status`, `nama`, `nilai`, `info`) VALUES
(1, '0000-00-00 00:00:00', '2019-08-27 20:54:40', 0, 'Dekat Jalan Raya', 6, 'Dekat jalan raya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orientasi`
--

CREATE TABLE IF NOT EXISTS `orientasi` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orientasi`
--

INSERT INTO `orientasi` (`id`, `created_at`, `updated_at`, `status`, `nama`, `nilai`, `info`) VALUES
(1, '0000-00-00 00:00:00', '2019-08-27 20:51:11', 0, 'Miring', 2, 'Miring kelihatannya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembanding`
--

CREATE TABLE IF NOT EXISTS `pembanding` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `id_banding` int(11) DEFAULT NULL,
  `id_pembanding` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaruh_negatif`
--

CREATE TABLE IF NOT EXISTS `pengaruh_negatif` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengaruh_negatif`
--

INSERT INTO `pengaruh_negatif` (`id`, `created_at`, `updated_at`, `status`, `nama`, `nilai`, `info`) VALUES
(1, '0000-00-00 00:00:00', '2019-08-27 20:55:43', 0, 'Perumahan warga', 3, 'Dekat Perumahan warga lama dan pengarasan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran_segera`
--

CREATE TABLE IF NOT EXISTS `pengeluaran_segera` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengeluaran_segera`
--

INSERT INTO `pengeluaran_segera` (`id`, `created_at`, `updated_at`, `status`, `nama`, `nilai`, `info`) VALUES
(1, '0000-00-00 00:00:00', '2019-08-27 20:50:02', 0, 'Segera', 3, 'Laju banar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `level` varchar(55) NOT NULL,
  `trip` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama_lengkap`, `username`, `password`, `email`, `level`, `trip`) VALUES
(1, 'Misrina', 'rin', '202cb962ac59075b964b07152d234b70', 'rin@gmail.com', '1', 'xxx');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peruntukan`
--

CREATE TABLE IF NOT EXISTS `peruntukan` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peruntukan`
--

INSERT INTO `peruntukan` (`id`, `created_at`, `updated_at`, `status`, `nama`, `nilai`, `info`) VALUES
(1, '0000-00-00 00:00:00', '2019-08-27 20:52:28', 0, 'Perumahan', 4, 'Perumahan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `posisi_tanah`
--

CREATE TABLE IF NOT EXISTS `posisi_tanah` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `posisi_tanah`
--

INSERT INTO `posisi_tanah` (`id`, `created_at`, `updated_at`, `status`, `nama`, `nilai`, `info`) VALUES
(1, '0000-00-00 00:00:00', '2019-08-27 20:50:50', 0, 'Datar', 8, 'Rata tanahnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek`
--

CREATE TABLE IF NOT EXISTS `proyek` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `judul` varchar(100) DEFAULT NULL,
  `kode_aset` varchar(100) DEFAULT NULL,
  `tanggal_penilaian` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `subjek`
--

CREATE TABLE IF NOT EXISTS `subjek` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `id_jenis` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kelurahan` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `lat` decimal(9,6) DEFAULT NULL,
  `lng` decimal(9,6) DEFAULT NULL,
  `contact_person` varchar(13) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `subjek`
--

INSERT INTO `subjek` (`id`, `created_at`, `updated_at`, `status`, `id_jenis`, `nama`, `alamat`, `kelurahan`, `kecamatan`, `kota`, `lat`, `lng`, `contact_person`, `foto`) VALUES
(1, '0000-00-00 00:00:00', '2019-08-27 21:33:21', 0, 1, 'Tanah Trikora', 'Jl. Trikora', 'Palam', 'Banjarbaru Selatan', 'Banjarbaru', '-3.545949', '114.989000', '08312121212', 'tanah-trikora.jpg'),
(2, '0000-00-00 00:00:00', '2019-08-27 22:04:39', 0, 1, 'Tanah Galuh Marindu 2', 'Komp. Galuh Marindu 2', 'Palam', 'Banjarbaru Selatan', 'Banjarbaru', '-3.545149', '114.689000', '08312121991', 'tanah-galuh-marindu-2.jpg'),
(3, '0000-00-00 00:00:00', '2019-08-27 22:23:00', 0, 1, 'Tanah Jl Jeruk', 'Jl. Jeruk no.88', 'Sungai Ulin', 'Sungai Ulin', 'Banjarbaru', '-3.545551', '114.689000', '0823232300', 'tanah-jl-jeruk.jpg'),
(4, '0000-00-00 00:00:00', '2019-09-03 21:06:15', 0, 1, 'Tanah Gambud', 'Trikora jauh parak gambut sana', 'Liang anggang', 'Liang anggang', 'Banjarbaru', '-3.542434', '113.989000', '082384348999', 'tanah-gambud.jpg'),
(5, '0000-00-00 00:00:00', '2019-09-03 21:08:01', 0, 1, 'Tanah Gubernuran 1', 'Kantor Gubernur', 'Palam', 'Loktabat Selatan', 'Banjarbaru', '-3.545949', '114.689000', '083434880999', 'tanah-gubernuran-1.jpg'),
(6, '0000-00-00 00:00:00', '2019-09-03 21:11:29', 0, 1, 'Tanah Gubernuran 2', 'Kantor Gubernur', 'Palam', 'Banjarbaru Selatan', 'Banjarbaru', '-3.545149', '113.439000', '08999232321', 'tanah-gubernuran-2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `syarat_pembiayaan`
--

CREATE TABLE IF NOT EXISTS `syarat_pembiayaan` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `syarat_pembiayaan`
--

INSERT INTO `syarat_pembiayaan` (`id`, `created_at`, `updated_at`, `status`, `nama`, `nilai`, `info`) VALUES
(1, '0000-00-00 00:00:00', '2019-08-27 20:50:27', 0, 'Bebas bersyarat', 3, 'Bebas ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_pasaran`
--

CREATE TABLE IF NOT EXISTS `tahun_pasaran` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tahun_pasaran`
--

INSERT INTO `tahun_pasaran` (`id`, `created_at`, `updated_at`, `status`, `nama`, `nilai`, `info`) VALUES
(1, '0000-00-00 00:00:00', '2019-08-27 20:56:42', 0, '2017', 4, '2017'),
(2, '0000-00-00 00:00:00', '2019-09-06 16:43:09', 0, '2019', 9, 'haha');

-- --------------------------------------------------------

--
-- Struktur dari tabel `topografi`
--

CREATE TABLE IF NOT EXISTS `topografi` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `topografi`
--

INSERT INTO `topografi` (`id`, `created_at`, `updated_at`, `status`, `nama`, `nilai`, `info`) VALUES
(1, '0000-00-00 00:00:00', '2019-08-27 20:51:39', 0, 'Bergelombang', 2, 'gelombang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aksesibilitas`
--
ALTER TABLE `aksesibilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banding`
--
ALTER TABLE `banding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bentuk_tapak`
--
ALTER TABLE `bentuk_tapak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cara_pembayaran`
--
ALTER TABLE `cara_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hak_properti`
--
ALTER TABLE `hak_properti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_subjek`
--
ALTER TABLE `jenis_subjek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karakteristik_ekonomi`
--
ALTER TABLE `karakteristik_ekonomi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karakteristik_subjek`
--
ALTER TABLE `karakteristik_subjek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komponen_non_realty`
--
ALTER TABLE `komponen_non_realty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kondisi_jalan_depan`
--
ALTER TABLE `kondisi_jalan_depan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kondisi_lingkungan`
--
ALTER TABLE `kondisi_lingkungan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kondisi_pasar`
--
ALTER TABLE `kondisi_pasar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kondisi_penjualan`
--
ALTER TABLE `kondisi_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lebar_jalan_depan`
--
ALTER TABLE `lebar_jalan_depan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orientasi`
--
ALTER TABLE `orientasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembanding`
--
ALTER TABLE `pembanding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaruh_negatif`
--
ALTER TABLE `pengaruh_negatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengeluaran_segera`
--
ALTER TABLE `pengeluaran_segera`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peruntukan`
--
ALTER TABLE `peruntukan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posisi_tanah`
--
ALTER TABLE `posisi_tanah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjek`
--
ALTER TABLE `subjek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `syarat_pembiayaan`
--
ALTER TABLE `syarat_pembiayaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahun_pasaran`
--
ALTER TABLE `tahun_pasaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topografi`
--
ALTER TABLE `topografi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aksesibilitas`
--
ALTER TABLE `aksesibilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `banding`
--
ALTER TABLE `banding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bentuk_tapak`
--
ALTER TABLE `bentuk_tapak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cara_pembayaran`
--
ALTER TABLE `cara_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hak_properti`
--
ALTER TABLE `hak_properti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jenis_subjek`
--
ALTER TABLE `jenis_subjek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `karakteristik_ekonomi`
--
ALTER TABLE `karakteristik_ekonomi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `karakteristik_subjek`
--
ALTER TABLE `karakteristik_subjek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `komponen_non_realty`
--
ALTER TABLE `komponen_non_realty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kondisi_jalan_depan`
--
ALTER TABLE `kondisi_jalan_depan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kondisi_lingkungan`
--
ALTER TABLE `kondisi_lingkungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kondisi_pasar`
--
ALTER TABLE `kondisi_pasar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kondisi_penjualan`
--
ALTER TABLE `kondisi_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lebar_jalan_depan`
--
ALTER TABLE `lebar_jalan_depan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orientasi`
--
ALTER TABLE `orientasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pembanding`
--
ALTER TABLE `pembanding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengaruh_negatif`
--
ALTER TABLE `pengaruh_negatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pengeluaran_segera`
--
ALTER TABLE `pengeluaran_segera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `peruntukan`
--
ALTER TABLE `peruntukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `posisi_tanah`
--
ALTER TABLE `posisi_tanah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subjek`
--
ALTER TABLE `subjek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `syarat_pembiayaan`
--
ALTER TABLE `syarat_pembiayaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tahun_pasaran`
--
ALTER TABLE `tahun_pasaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `topografi`
--
ALTER TABLE `topografi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

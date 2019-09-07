
CREATE TABLE IF NOT EXISTS `pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `level` varchar(55) NOT NULL,
  `trip` varchar(255) NOT NULL, CONSTRAINT contacts_pk PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `proyek` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `judul` varchar(100) DEFAULT NULL,
  `kode_aset` varchar(100) DEFAULT NULL, 
  `tanggal_penilaian` date DEFAULT NULL, CONSTRAINT contacts_pk PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `jenis_subjek` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `info_jenis` varchar(100) DEFAULT NULL,  CONSTRAINT contacts_pk PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS `subjek` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `foto` varchar(255) DEFAULT NULL, CONSTRAINT contacts_pk PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE IF NOT EXISTS `karakteristik_subjek` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
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
  `id_pengaruh_negatif` int(11) DEFAULT NULL, CONSTRAINT primary_pk PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;  


CREATE TABLE IF NOT EXISTS `banding` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `indikasi_nilai_pasar_bulat` bigint(64) DEFAULT NULL, CONSTRAINT contacts_pk PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE IF NOT EXISTS `pembanding` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `id_banding` int(11) DEFAULT NULL,
  `id_pembanding` int(11) DEFAULT NULL, CONSTRAINT contacts_pk PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `hak_properti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL, CONSTRAINT contacts_pk PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;




 
CREATE TABLE IF NOT EXISTS `syarat_pembiayaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL, CONSTRAINT contacts_pk PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `kondisi_penjualan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL, CONSTRAINT contacts_pk PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS `pengeluaran_segera` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL, CONSTRAINT contacts_pk PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS `kondisi_pasar` ( 
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL, CONSTRAINT contacts_pk PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS `posisi_tanah` ( 
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL, CONSTRAINT contacts_pk PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS `bentuk_tapak` ( 
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL, CONSTRAINT contacts_pk PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `topografi` ( 
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL, CONSTRAINT contacts_pk PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS `orientasi` ( 
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL, CONSTRAINT contacts_pk PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS `lebar_jalan_depan` ( 
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL, CONSTRAINT contacts_pk PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `kondisi_jalan_depan` ( 
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL, CONSTRAINT contacts_pk PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS `peruntukan` ( 
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL, CONSTRAINT contacts_pk PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS `karakteristik_ekonomi` ( 
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL, CONSTRAINT contacts_pk PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS `komponen_non_realty` ( 
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL, CONSTRAINT contacts_pk PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS `tahun_pasaran` ( 
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL, CONSTRAINT contacts_pk PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS `cara_pembayaran` ( 
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL, CONSTRAINT contacts_pk PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS `lokasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL, CONSTRAINT contacts_pk PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS `aksesibilitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL, CONSTRAINT contacts_pk PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE IF NOT EXISTS `kondisi_lingkungan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL, CONSTRAINT contacts_pk PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `pengaruh_negatif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL, CONSTRAINT contacts_pk PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=latin1;





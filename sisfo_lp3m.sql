-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2020 at 03:43 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisfo_lp3m`
--

-- --------------------------------------------------------

--
-- Table structure for table `b_butirstandar`
--

CREATE TABLE `b_butirstandar` (
  `id_butirstandar` int(11) NOT NULL,
  `b_standarid` int(11) NOT NULL,
  `nama_butir` text NOT NULL,
  `keterangan_butir` text NOT NULL,
  `timestamp_butir` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `b_butirstandar`
--

INSERT INTO `b_butirstandar` (`id_butirstandar`, `b_standarid`, `nama_butir`, `keterangan_butir`, `timestamp_butir`) VALUES
(1, 1, '1.1.1', 'banyak', '2020-06-27 08:45:41'),
(2, 1, '12', '1', '2020-06-28 06:02:58');

-- --------------------------------------------------------

--
-- Table structure for table `b_dokumentransaksi`
--

CREATE TABLE `b_dokumentransaksi` (
  `id_dokumentransaksi` int(11) NOT NULL,
  `bstandar_id` int(11) NOT NULL,
  `butirstandar_id` int(11) NOT NULL,
  `fakultas_id` int(11) NOT NULL,
  `prodi_id` int(11) NOT NULL,
  `kode_dokumen` text NOT NULL,
  `nama_dokumen` text NOT NULL,
  `tanggal_terbit` date NOT NULL,
  `periode_borang` int(11) NOT NULL,
  `keterangan_dokumen` text NOT NULL,
  `file` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `dokumentransaksi_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `b_dokumentransaksi`
--

INSERT INTO `b_dokumentransaksi` (`id_dokumentransaksi`, `bstandar_id`, `butirstandar_id`, `fakultas_id`, `prodi_id`, `kode_dokumen`, `nama_dokumen`, `tanggal_terbit`, `periode_borang`, `keterangan_dokumen`, `file`, `user_id`, `dokumentransaksi_timestamp`) VALUES
(1, 1, 1, 1, 1, '1', '1', '2020-06-28', 22, 'v', 'v', 19, '2020-06-28 14:03:21'),
(2, 1, 1, 1, 1, '1', '2', '2020-06-17', 1, 'vv', '', 28, '2020-06-30 15:02:21'),
(3, 2, 2, 3, 3, '31', '87', '2020-06-09', 99, 'ijbiu', 'Kartu_hasil_studi_16416257201004.pdf', 28, '2020-06-30 15:25:00');

-- --------------------------------------------------------

--
-- Table structure for table `b_standar`
--

CREATE TABLE `b_standar` (
  `id_bstandar` int(11) NOT NULL,
  `nama_bstandar` text NOT NULL,
  `versi_bstandar` text NOT NULL,
  `tahun_bstandar` int(11) NOT NULL,
  `jenis_bstandar` text NOT NULL,
  `timestamp_bstandar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `b_standar`
--

INSERT INTO `b_standar` (`id_bstandar`, `nama_bstandar`, `versi_bstandar`, `tahun_bstandar`, `jenis_bstandar`, `timestamp_bstandar`) VALUES
(1, 'visi misi 2', '2', 20202, '212', '2020-06-27 09:44:42'),
(2, 'cek', '008', 2020, 'jn ', '2020-06-27 09:30:42'),
(3, 'vrvr', 'o99', 28, 'n', '2020-06-27 09:31:01');

-- --------------------------------------------------------

--
-- Table structure for table `dokumentasi`
--

CREATE TABLE `dokumentasi` (
  `id_dok` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `url` varchar(40) NOT NULL,
  `content` text NOT NULL,
  `cover` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokumentasi`
--

INSERT INTO `dokumentasi` (`id_dok`, `title`, `url`, `content`, `cover`, `time`, `user_id`) VALUES
(1, 'update_16_04_19', 'pembaharuan_160419', 'penambahan fitur :<br>\r\n+download<br>\r\n+upload file<br><br>\r\n\r\n\r\nkekurangan :<br>\r\n-form masih bisa input kosong<br>\r\n-blum ada form validasi', 'timeline-wrapper-warning', '2020-02-02 09:28:44', 0),
(2, 'update_17_04_19', 'penurunan_170419', 'tidak bisa melakukan submit pada form add dan form update', 'timeline-inverted timeline-wrapper-danger', '2020-02-02 09:28:54', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `nama_fakultas` varchar(128) NOT NULL,
  `kode_fakultas` varchar(128) NOT NULL,
  `fakultas_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nama_fakultas`, `kode_fakultas`, `fakultas_timestamp`) VALUES
(0, '<i>null</i>', '', '2020-03-22 15:09:39'),
(1, 'FAKULTAS TEKNOLOGI DAN ILMU KOMPUTER', 'FTIK', '2020-03-07 12:15:42'),
(2, 'FAKULTAS BISNIS DAN ILMU SOSIAL', 'FBIS', '2020-03-07 12:15:42'),
(3, 'FAKULTAS KEGURUAN DAN ILMU PENDIDIKAN', 'FKIP', '2020-03-07 12:16:13'),
(4, 'FAKULTAS HUKUM', 'FHUM', '2020-03-07 12:16:23'),
(5, 'FAKULTAS PSIKOLOGI', 'FPSI', '2020-03-07 12:16:47'),
(6, 'FAKULTAS FARMASI', 'FFAM', '2020-03-07 12:17:13');

-- --------------------------------------------------------

--
-- Table structure for table `formulir`
--

CREATE TABLE `formulir` (
  `id_formulir` int(11) NOT NULL,
  `standar_id` int(11) NOT NULL,
  `mp_id` int(11) NOT NULL,
  `sop_id` int(11) NOT NULL,
  `no_formulir` varchar(50) NOT NULL,
  `deskripsi_formulir` text NOT NULL,
  `revisi_formulir` int(11) NOT NULL,
  `tgl_pembuatan` date NOT NULL,
  `tgl_berlaku` date NOT NULL,
  `penyimpanan` varchar(30) NOT NULL,
  `pembuat` varchar(100) NOT NULL,
  `pengendali` varchar(100) NOT NULL,
  `menyetujui` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `file` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formulir`
--

INSERT INTO `formulir` (`id_formulir`, `standar_id`, `mp_id`, `sop_id`, `no_formulir`, `deskripsi_formulir`, `revisi_formulir`, `tgl_pembuatan`, `tgl_berlaku`, `penyimpanan`, `pembuat`, `pengendali`, `menyetujui`, `keterangan`, `file`, `user_id`, `timestamp`) VALUES
(4, 25, 28, 28, '01', 'Surat Usulan Pengesahan Kompetensi Lulusan', 0, '2020-04-05', '2020-04-05', '-', '-', '-', '-', '', 'SPT-01:MP-01:SOP-100-100-01_Form_Surat_usulan_pengesahan_standar_kompetensi_lulusan.pdf', 8, '2020-04-05 15:28:04');

-- --------------------------------------------------------

--
-- Table structure for table `jad`
--

CREATE TABLE `jad` (
  `id_jad` int(11) NOT NULL,
  `kode_jad` varchar(255) NOT NULL,
  `ket_jad` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `jad_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jad`
--

INSERT INTO `jad` (`id_jad`, `kode_jad`, `ket_jad`, `user_id`, `jad_timestamp`) VALUES
(1, 'A1', '...', 8, '2020-04-01 14:05:37'),
(3, 'A2', '...', 8, '2020-04-01 14:05:46');

-- --------------------------------------------------------

--
-- Table structure for table `kborang`
--

CREATE TABLE `kborang` (
  `id_kborang` int(11) NOT NULL,
  `kode_borang` varchar(512) NOT NULL,
  `ket_kborang` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `kborang_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kborang`
--

INSERT INTO `kborang` (`id_kborang`, `kode_borang`, `ket_kborang`, `user_id`, `kborang_timestamp`) VALUES
(1, 'C1', 'Visi Misi Tujuan dan Strategi', 8, '2020-05-01 14:33:58'),
(5, 'C2', 'tata Pamong, tata Kelola dan Kerjasama', 8, '2020-05-01 14:34:13'),
(6, 'C3', 'Mahasiswa', 8, '2020-05-01 14:34:25'),
(7, 'C4', 'Sumber Daya Manusia', 8, '2020-05-01 14:34:38'),
(8, 'C5', 'Keuangan, Sarana dan Prasarana', 8, '2020-05-01 14:34:48'),
(9, 'C6', 'Pendidikan', 8, '2020-05-01 14:35:11'),
(10, 'C7', 'Penelitian', 8, '2020-05-01 14:35:48'),
(11, 'C8', 'Pengabdian kepada Masyarakat', 8, '2020-05-01 14:35:59'),
(12, 'C9', 'Luaran dan Capaian Tridharma', 8, '2020-05-01 14:36:13');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `judul_kegiatan` varchar(255) NOT NULL,
  `link_blog` varchar(50) NOT NULL,
  `des_kegiatan` text NOT NULL,
  `artikel_kegiatan` text NOT NULL,
  `peserta_kegiatan` int(11) NOT NULL,
  `file` varchar(512) NOT NULL,
  `waktu_kegiatan` varchar(40) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `judul_kegiatan`, `link_blog`, `des_kegiatan`, `artikel_kegiatan`, `peserta_kegiatan`, `file`, `waktu_kegiatan`, `user_id`) VALUES
(1, 'Kunjungan Industri Fakultas Farmasi UBP Karawang', 'kunjungan_fakultas_farmasi_2020', 'Kunjungan Fakultas Farmasi UBP Karawang ke Perusahaan', 'Fakultas Farmasi Universitas Buana Perjuangan Karawang telah melaksanakan kunjungan industri lapangan ke PT.SIDOMUNCUL, Balai Besar Penelitian dan Pengembangan Tanaman Obat dan Obat Tradisional Tawangmangu, Fakultas Farmasi UGM dan Prodi Farmasi UMY. Kegiatan ini di ikuti oleh 90 partisipan yang terdiri dari 71 mahasiswa dan 9 dosen.<br>\r\n<br>\r\nTujuan dari Kunjungan lapangan ke Industri Obat Tradisional dan Balai Besar Penelitian dan Pengembangan Tanaman Obat dan Obat Tradisional Tawangmangu   serta untuk  Peningkatan suasana akademik bagi mahasiswa  dan tri dharma Perguruan tinggi bagi dosen. Selain itu menurut Farhan salah satu mahasiswa yang ikut dalam kunjungan industri tersebut “Kunjungan industri ini memiliki tujuan untuk lebih mengenalkan Mahasiswa ke dunia kerja dan untuk memberikan gambaran pengaplikasian secara langsung dari berbagai mata kuliah yang sudah di pelajari di perkuliahan”.<br><br>\r\n\r\nSelanjutnya Farhan juga menambahkan “ banyak sekali Manfaat yang bisa kita dapatkan dari kegiatan kunjungan industri kemaren, diantaranya dapat membandingkan secara langsung teori yang didapat di kampus dengan kondisi di dunia kerja dan dapat memperluas pengetahuan mahasiswa mengenai dunia kerja”.\r\n<br><br>\r\nMenurut Kaprodi Fakultas Farmasi Anggun Hari Kusumawati, S.Farm., M.Si.,apt  “senang rasanya karena Bisa belajar lebih baik untuk meningkatkan suasana akademik di Fakultas Farmasi khususnya dan UBP Karawang pada umumnya, bias mengupgrade ilmu khusunya bidang Tri dharma Perguruan Tinggi bagi dosen, dan sharing ilmu dalam bidang akademik”.<br>\r\n<br>\r\nSelanjutnya beliau juga menambahkan “Saya Harap Kegiatan ini akan lebih baik lagi jika ditindaklanjuti dengan MoU antar perguruan Tinggi dan Instansi terkait seperti PT.Sidomuncul dan BPTOT Tawang mangu guna untuk menambah daftar instansi tempat Kerja Praktek mahasiswa Farmasi Universitas Buana Perjuangan Karawang”.', 2193, '800x6005.jpg', '2020-03-20', 9),
(2, 'Pendaftaran Bahasa Jepang (Japanese Course)', 'pendaftaran_kelas_bahasa_jepang', 'Pembukaan kelas bahasa jepang 2020 telah dibuka', 'Pendaftaran kursus Bahas Jepang dapat diakses melalui link https://bit.ly/pendaftaranBhsJepang\r\nPengumuman. Info lebih lanjut mengenai pendaftaran kursus Bahasa Jepang silakan klik link dibawah ini \r\nhttp://uptbahasa.ubpkarawang.ac.id/2020/02/17/pendaftaran-bahasa-jepang-japanese-course/', 2193, '800x6006.jpg', '2020-03-20', 9);

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `standar_id` int(11) NOT NULL,
  `nama_laporan` text NOT NULL,
  `unit_laporan` text NOT NULL,
  `thn_akademik` text NOT NULL,
  `semester` text NOT NULL,
  `tahun_laporan` int(11) NOT NULL,
  `penyusun_laporan` text NOT NULL,
  `tgl_pengesahan` date NOT NULL,
  `vol` text NOT NULL,
  `sifat` text NOT NULL,
  `jenis_laporan` text NOT NULL,
  `kategori_laporan` text NOT NULL,
  `file` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp_laporan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `layanan_pelanggan`
--

CREATE TABLE `layanan_pelanggan` (
  `id_lp` int(11) NOT NULL,
  `nama_depan` varchar(512) NOT NULL,
  `nama_belakang` varchar(512) NOT NULL,
  `subjek` varchar(512) NOT NULL,
  `email` varchar(512) NOT NULL,
  `pesan` text NOT NULL,
  `status_pesan` text NOT NULL,
  `lp_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layanan_pelanggan`
--

INSERT INTO `layanan_pelanggan` (`id_lp`, `nama_depan`, `nama_belakang`, `subjek`, `email`, `pesan`, `status_pesan`, `lp_timestamp`) VALUES
(1, 'Rida', 'Dahlan', 'Pertanyaan', 'rida@gmail.com', 'pengen nanya dong ...', 'Sudah dibalas', '2020-03-21 18:28:40'),
(2, 'Bunga', 'Rizkia', 'Pertanyaan', 'bunga@gmail.com', 'mau tau ...', '', '2020-03-21 07:21:21');

-- --------------------------------------------------------

--
-- Table structure for table `matrik_penilaian`
--

CREATE TABLE `matrik_penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `no_butir_matrik` varchar(512) NOT NULL,
  `kode_elemen_penilaian` varchar(512) NOT NULL,
  `elemen_penilaian` text NOT NULL,
  `kode_indikator` varchar(512) NOT NULL,
  `indikator_penilaian` text NOT NULL,
  `kode_magterik_penilaian_borang` varchar(512) NOT NULL,
  `kode_ringkasan_standar` varchar(512) NOT NULL,
  `nomor_dokumen` varchar(512) NOT NULL,
  `standar_pendidikan` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `matrik_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matrik_penilaian`
--

INSERT INTO `matrik_penilaian` (`id_penilaian`, `no_butir_matrik`, `kode_elemen_penilaian`, `elemen_penilaian`, `kode_indikator`, `indikator_penilaian`, `kode_magterik_penilaian_borang`, `kode_ringkasan_standar`, `nomor_dokumen`, `standar_pendidikan`, `user_id`, `matrik_timestamp`) VALUES
(1, '16', 'C34C', 'C.3.4.c) Layanan Kemahasiswaan', 'A', '\"A. Ketersediaan layanan kemahasiswaan di bidang:\r\n1) penalaran, minat dan bakat,\r\n2) kesejahteraan (bimbingan dan konseling, layanan beasiswa, dan layanan kesehatan), dan\r\n3) bimbingan karir dan\r\nkewirausahaan.  \"', '20C34CA', 'SPT03 : 4315', '-', 'SPT03 : 4.3.1.5', 8, '2020-05-06 17:51:30'),
(2, '21', 'C44A', '-', 'F', '\"Penugasan DTPS sebagai pembimbing utama tugas akhir mahasiswa.\r\nTabel 3.a.2) LKPS\r\n\"', '26C44AF', '\"SPT0343141 SPT0343144\"', '-', 'SPT05:4.3.4, SPT0343144, SPT0343141', 8, '2020-05-06 18:46:23'),
(3, '40', 'C64C', 'C.6.4.c) Rencana Proses Pembelajaran', 'A', '\"A. Ketersediaan dan kelengkapan dokumen rencana pembelajaran semester (RPS)                                                \r\n\"', '48C64CA', '\"SPT0343110 SPT0343111 \"', '-', 'SPT03 :4.3.1.10, 4.3.1.11', 8, '2020-05-06 17:53:36'),
(4, '40', 'C64C', '-', 'B', 'B. Kedalaman isi materi dan keluasan RPS sesuai dengan capaian pembelajaran lulusan.Skor = (A + (2 x B)) / 3', '49C64CB', 'SPT034316', '-', 'SPT03 :4.3.1.13', 8, '2020-05-06 17:54:13'),
(5, '41', 'C64D', '-', 'B', 'B. Pemantauan kesesuaian proses terhadap rencana pembelajaran ', '51C64DB', 'SPT034316', '-', 'SPT03:4.3.16', 8, '2020-05-06 17:54:52'),
(6, '43', 'C64E', '\"C.6.4.e) Monitoring dan Evaluasi Proses Pembelajaran  \"', '1', '\"Monitoring dan evaluasi pelaksanaan proses pembelajaran mencakup karakteristik, perencanaan, pelaksanaan, proses pembelajaran dan beban belajar mahasiswa untuk memperoleh capaian pembelajaran lulusan.\r\n\"', '56C64E1', '\"SPT0343132 SPT0343122 SPT0343123 SPT0343134 SPT0343135\"', '-', '\"SPT03 : 4.3.1.21, SPT03: 4.3.1.23 SPT03:4.3.1.34                                                 \"', 8, '2020-05-06 17:55:30'),
(7, '57', 'C94A', '-', 'F', '\"Kelulusan tepat waktu. PTW = Persentase kelulusan tepat waktu.\r\n\r\nTabel 8.c LKPS\r\n\"', '73C94AF', '\"SPT0343146 SPT0343146\"', '-', 'SPT01 :11', 8, '2020-05-06 17:56:02'),
(9, '23', 'C44A', '-', 'H', 'Dosen tidak tetap.                                                                                                                           Tabel 3.a.4) LKPS', '28C44AH', '-', '-', 'SPT05', 8, '2020-05-07 07:59:58');

-- --------------------------------------------------------

--
-- Table structure for table `mp`
--

CREATE TABLE `mp` (
  `id_mp` int(11) NOT NULL,
  `standar_id` varchar(128) NOT NULL,
  `no_mp` varchar(50) NOT NULL,
  `deskripsi_mp` text NOT NULL,
  `revisi_mp` int(11) NOT NULL,
  `tgl_pembuatan` date NOT NULL,
  `tgl_berlaku` date NOT NULL,
  `penyimpanan` varchar(30) NOT NULL,
  `pembuat` varchar(100) NOT NULL,
  `pengendali` varchar(100) NOT NULL,
  `menyetujui` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `file` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mp`
--

INSERT INTO `mp` (`id_mp`, `standar_id`, `no_mp`, `deskripsi_mp`, `revisi_mp`, `tgl_pembuatan`, `tgl_berlaku`, `penyimpanan`, `pembuat`, `pengendali`, `menyetujui`, `keterangan`, `file`, `user_id`, `timestamp`) VALUES
(8, '6', 'MP-01', 'Standar Visi, Misi,Tujuan dan sasaran', 0, '2020-02-18', '2020-02-18', '-', '-', '-', '-', '', '', 0, '2020-02-18 09:10:25'),
(9, '7', 'MP-01', 'Standar Tata Kelola', 0, '2020-04-04', '2020-04-04', '-', '-', '-', '-', '', '', 0, '2020-04-04 00:33:03'),
(11, '8', 'MP-01', 'Standar Sistem Penjaminan Mutu', 0, '2020-04-04', '2020-04-04', '-', '-', '-', '-', '', '', 0, '2020-04-04 01:14:21'),
(12, '9', 'MP-01', 'Standar Pelayanan', 0, '2020-04-04', '2020-04-04', '-', '-', '-', '-', '', '', 0, '2020-04-04 14:20:47'),
(13, '10', 'MP-01', 'Standar Humas & Protokoler', 0, '2020-04-04', '2020-04-04', '-', '-', '-', '-', '', '', 0, '2020-04-04 14:21:20'),
(14, '11', 'MP-01', 'Standar Pengelolaan Keuangan', 0, '2020-04-04', '2020-04-04', '-', '-', '-', '-', '', '', 0, '2020-04-04 14:21:56'),
(15, '12', 'MP-01', 'Standar Kemahasiswaan', 0, '2020-04-04', '2020-04-04', '-', '-', '-', '-', '', '', 0, '2020-04-04 14:24:25'),
(16, '13', 'MP-01', 'Standar Carier Center', 0, '2020-04-04', '2020-04-04', '-', '-', '-', '-', '', '', 0, '2020-04-04 14:24:56'),
(17, '14', 'MP-01', 'Standar Alumni', 0, '2020-04-04', '2020-04-04', '-', '-', '-', '-', '', '', 0, '2020-04-04 14:25:25'),
(18, '15', 'MP-01', 'Standar Sumber Daya Manusia', 0, '2020-04-04', '2020-04-04', '-', '-', '-', '-', '', '', 0, '2020-04-04 14:25:55'),
(19, '16', 'MP-01', 'Standar Perpustakaan', 0, '2020-04-04', '2020-04-04', '-', '-', '-', '-', '', '', 0, '2020-04-04 14:26:31'),
(20, '17', 'MP-01', 'Standar Sistem Informasi', 0, '2020-04-04', '2020-04-04', '-', '-', '-', '-', '', '', 0, '2020-04-04 14:27:15'),
(21, '18', 'MP-01', 'Standar Monitoring dan Evaluasi', 0, '2020-04-04', '2020-04-04', '-', '-', '-', '-', '', '', 0, '2020-04-04 14:27:45'),
(22, '19', 'MP-01', 'Standar Kerjasama dan Kemitraan Strategis', 0, '2020-04-04', '2020-04-04', '-', '-', '-', '-', '', '', 0, '2020-04-04 14:28:12'),
(23, '20', 'MP-01', 'Standar Pengelolaan Sarana dan Prasarana', 0, '2020-04-04', '2020-04-04', '-', '-', '-', '-', '', '', 0, '2020-04-04 14:29:06'),
(24, '21', 'MP-01', 'Standar Kebersihan Lingkungan', 0, '2020-04-04', '2020-04-04', '-', '-', '-', '-', '', '', 0, '2020-04-04 14:29:35'),
(25, '22', 'MP-01', 'Standar Pengelolaan Inventaris Barang', 0, '2020-04-04', '2020-04-04', '-', '-', '-', '-', '', '', 0, '2020-04-04 14:30:00'),
(26, '23', 'MP-01', 'Standar Laboratorium', 0, '2020-04-04', '2020-04-04', '-', '-', '-', '-', '', '', 0, '2020-04-04 14:30:28'),
(27, '24', 'MP-01', 'Standar Tata Letak Naskah', 0, '2020-04-04', '2020-04-04', '-', '-', '-', '-', '', '', 0, '2020-04-04 14:30:52'),
(28, '25', 'MP-01', 'Prosedur Mutu  Kompetensi Lulusan', 1, '2017-08-15', '2017-01-01', '-', 'Santi Arum P.L., M.Pd', 'Dr. H. Puji Isyanto, SE., MM', 'Dr. H. Dedi Mulyadi, SE., MM', '', '02_MP01_Manual_Prosedur_Kompetensi_Lulusan.pdf', 8, '2020-04-04 20:43:05'),
(29, '26', 'MP-01', 'Prosedur Mutu Isi Pembelajaran', 0, '2020-04-05', '2020-04-05', '-', '-', '-', '-', '', '', 8, '2020-04-04 20:37:43'),
(30, '27', 'MP-01', 'Prosedur Mutu  Proses Pembelajaran;', 0, '2020-04-05', '2020-04-05', '-', '-', '-', '-', '', '', 8, '2020-04-04 20:38:20'),
(31, '28', 'MP-01', 'Prosedur Mutu Penilaian Pembelajaran;', 0, '2020-04-05', '2020-04-05', '-', '-', '-', '-', '', '', 8, '2020-04-04 20:39:02'),
(32, '29', 'MP-01', 'Prosedur Mutu Dosen dan Tenaga Kependidikan;', 0, '2020-04-05', '2020-04-05', '-', '-', '-', '-', '', '', 8, '2020-04-04 20:39:36'),
(33, '30', 'MP-01', 'Prosedur Mutu Sarana dan Prasarana Pembelajaran;', 0, '2020-04-05', '2020-04-05', '-', '-', '-', '-', '', '', 8, '2020-04-04 20:40:08'),
(34, '31', 'MP-01', 'Prosedur Mutu Pengelolaan Pembelajaran', 0, '2020-04-05', '2020-04-05', '-', '-', '-', '-', '', '', 8, '2020-04-04 20:40:43'),
(35, '32', 'MP-01', 'Prosedur Mutu Pembiayaan Pembelajaran.', 0, '2020-04-05', '2020-04-05', '-', '-', '-', '-', '', '', 8, '2020-04-04 20:41:15'),
(36, '7', '201', 'ion', 0, '2020-06-23', '2020-06-09', '0', '0', '0', '0', '', '', 28, '2020-06-21 14:14:23');

-- --------------------------------------------------------

--
-- Table structure for table `nota_dinas`
--

CREATE TABLE `nota_dinas` (
  `id_nota_dinas` int(11) NOT NULL,
  `no_nota_dinas` text NOT NULL,
  `kepada` text NOT NULL,
  `tembusan` text NOT NULL,
  `dari` text NOT NULL,
  `perihal` text NOT NULL,
  `lampiran` int(11) NOT NULL,
  `tgl_pengesahan` date NOT NULL,
  `file` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp_nodin` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pedoman`
--

CREATE TABLE `pedoman` (
  `id_pedoman` int(11) NOT NULL,
  `no_pedoman` varchar(50) NOT NULL,
  `deskripsi_pedoman` text NOT NULL,
  `revisi_pedoman` int(11) NOT NULL,
  `tgl_pembuatan` date NOT NULL,
  `tgl_berlaku` date NOT NULL,
  `penyimpanan` varchar(30) NOT NULL,
  `pembuat` varchar(100) NOT NULL,
  `pemeriksa` varchar(100) NOT NULL,
  `menyetujui` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `file` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pedoman`
--

INSERT INTO `pedoman` (`id_pedoman`, `no_pedoman`, `deskripsi_pedoman`, `revisi_pedoman`, `tgl_pembuatan`, `tgl_berlaku`, `penyimpanan`, `pembuat`, `pemeriksa`, `menyetujui`, `keterangan`, `file`, `user_id`, `timestamp`) VALUES
(5, '0', '-', 0, '2020-04-29', '2020-04-29', '-', '-', '-', '-', '', 'Agenda_OM_Kabel_Serat_Optik_Get_Your_Certificate.pdf', 0, '2020-04-29 14:02:36');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `object_id_pendidikan` varchar(512) NOT NULL,
  `standar_id` int(11) NOT NULL,
  `des_pendidikan` text NOT NULL,
  `tahun_ajaran` varchar(128) NOT NULL,
  `periode` varchar(128) NOT NULL,
  `kegiatan` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fakultas_id` int(11) NOT NULL,
  `prodi_id` int(11) NOT NULL,
  `is_active_pendidikan` int(11) NOT NULL,
  `pendidikan_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id_pendidikan`, `object_id_pendidikan`, `standar_id`, `des_pendidikan`, `tahun_ajaran`, `periode`, `kegiatan`, `user_id`, `fakultas_id`, `prodi_id`, `is_active_pendidikan`, `pendidikan_timestamp`) VALUES
(1, '28202007131594653332', 6, '1', '1', 'Ganjil', 'UAS', 28, 1, 2, 1, '2020-07-13 15:15:32');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan_aspek`
--

CREATE TABLE `pendidikan_aspek` (
  `id_aspek_pendidikan` int(11) NOT NULL,
  `penilaian_id` int(11) NOT NULL,
  `standar_id` int(11) NOT NULL,
  `prodi_id` int(11) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `bulan` varchar(255) NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `aspek` text NOT NULL,
  `indikator` text NOT NULL,
  `bobot` varchar(512) NOT NULL,
  `target_aspek` int(11) NOT NULL,
  `aspek_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan_aspek`
--

INSERT INTO `pendidikan_aspek` (`id_aspek_pendidikan`, `penilaian_id`, `standar_id`, `prodi_id`, `semester`, `bulan`, `tahun`, `aspek`, `indikator`, `bobot`, `target_aspek`, `aspek_timestamp`) VALUES
(22, 2, 8, 1, 'Genap', '', '2019-2020', 'test', 'test', '0.7', 100, '2020-08-05 04:36:53'),
(23, 1, 8, 5, 'Genap', '', '2019-2020', 'test', 'test', '0,5', 100, '2020-08-05 11:55:30'),
(24, 1, 6, 1, 'Genap', '', '2019-2020', 'test', 'test', '', 0, '2020-08-05 13:41:45'),
(25, 1, 6, 2, 'Ganjil', '', '2019-2020', 'test', 'test', '', 0, '2020-08-05 13:40:55');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan_borang_t`
--

CREATE TABLE `pendidikan_borang_t` (
  `id_btp` int(11) NOT NULL,
  `id_dokumen_pendidikan` int(11) NOT NULL,
  `id_kborang` int(11) NOT NULL,
  `btp_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan_borang_t`
--

INSERT INTO `pendidikan_borang_t` (`id_btp`, `id_dokumen_pendidikan`, `id_kborang`, `btp_timestamp`) VALUES
(1, 1, 1, '2020-04-26 16:52:34');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan_dokumen`
--

CREATE TABLE `pendidikan_dokumen` (
  `id_dokumen_pendidikan` int(11) NOT NULL,
  `aspek_id` int(11) NOT NULL,
  `standar_id` int(11) NOT NULL,
  `mp_id` int(11) NOT NULL,
  `sop_id` int(11) NOT NULL,
  `formulir_id` int(11) NOT NULL,
  `nama_dokumen` text NOT NULL,
  `role_id` int(11) NOT NULL,
  `target_dokumen` varchar(128) NOT NULL,
  `timestamp_dokumen` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan_dokumen`
--

INSERT INTO `pendidikan_dokumen` (`id_dokumen_pendidikan`, `aspek_id`, `standar_id`, `mp_id`, `sop_id`, `formulir_id`, `nama_dokumen`, `role_id`, `target_dokumen`, `timestamp_dokumen`) VALUES
(1, 1, 27, 30, 28, 4, 'Rekap Rata-Rata  kehadiran dosen membimbing akademik per prodi', 9, '100', '2020-05-01 14:54:30'),
(2, 2, 27, 30, 28, 4, 'Daftar hadir dosen membimbing akademik', 6, '100', '2020-05-01 14:56:30'),
(3, 2, 27, 30, 28, 4, 'Daftar hadir mahasiswa bimbimbingan akademik', 6, '100', '2020-05-01 15:48:22'),
(4, 2, 27, 30, 28, 4, 'Laporan kegiatan dosen pembimbing  akademik', 6, '100', '2020-05-01 15:50:00'),
(5, 2, 27, 30, 28, 4, 'Rekap kehadiran mahasiswa bimbingan akademik per dosen', 6, '100', '2020-05-01 15:59:36'),
(6, 2, 27, 30, 28, 4, 'Rekap Rata2 kehadiran mahasiswa bimbingan akademik per prodi', 9, '100', '2020-05-01 16:01:36'),
(7, 2, 27, 30, 28, 4, 'Surat Tugas Pembimbing Akademik  dan daftar mahasiswa', 9, '100', '2020-05-01 16:02:39'),
(8, 2, 27, 30, 28, 4, 'Rasio dosen pembimbing Akademik dengan jumlah mahasiswa bimbingan', 9, '100', '2020-05-01 16:20:11'),
(9, 2, 27, 30, 28, 4, 'Pedoman Pembimbingan Akademik', 9, '100', '2020-05-01 16:21:06'),
(10, 3, 27, 30, 28, 4, 'Rencana Pemeblajaran persemester setiap mata kuliah dan kontrak perkuliahan', 6, '50', '2020-05-01 16:35:54'),
(11, 4, 27, 30, 28, 4, 'Materi Pembelajaran per mata kuliah yang telah di sahkan', 6, '100', '2020-05-01 16:36:46'),
(12, 5, 27, 30, 28, 4, 'Realisasi Kesesuaian Materi Kuliah dengan RPS ( berita acara perkuliahan) per kelas per mata kuliah', 6, '100', '2020-05-01 16:38:02'),
(13, 6, 27, 30, 28, 4, 'Realisasi Kehadiran dosen dan mahasiswa (DHMD) perkelas', 6, '100', '2020-05-01 16:39:51'),
(14, 6, 27, 30, 28, 4, 'Rekap Kehadiran Dosen Mengajar', 13, '100', '2020-05-01 16:40:48'),
(15, 6, 27, 30, 28, 4, 'Rekap kesesuaian materi kuliah dengan RPS', 13, '100', '2020-05-01 16:45:43'),
(16, 7, 27, 30, 28, 4, 'SK Panitia UTS/UAS', 14, '100', '2020-05-01 16:46:43'),
(17, 7, 27, 30, 28, 4, 'Surat Undangan Rapat persiapan UTS/UAS', 14, '100', '2020-05-01 16:47:28'),
(18, 7, 27, 30, 28, 4, 'Daftar Hadir rapat UTS/UAS', 14, '100', '2020-05-01 16:48:22'),
(19, 7, 27, 30, 28, 4, 'Jadwal UTS/UAS', 14, '100', '2020-05-01 16:49:20'),
(20, 7, 27, 30, 28, 4, 'Daftar Hadir mengawas UTS/UAS', 14, '100', '2020-05-01 16:50:05'),
(21, 7, 27, 30, 28, 4, 'Laporan kegiatan UTS/UAS', 14, '100', '2020-05-01 16:50:57'),
(22, 7, 27, 30, 28, 4, 'Berita Acara Ujian UTS/UAS', 9, '100', '2020-05-01 16:58:38'),
(23, 7, 27, 30, 28, 4, 'Daftar hadir peserta ujian UTS/UAS', 9, '100', '2020-05-01 16:59:51'),
(24, 7, 27, 30, 28, 4, 'Tanda terima Penyerahan naskah soal UTS/UAS', 9, '100', '2020-05-01 17:00:41'),
(25, 7, 27, 30, 28, 4, 'Tanda terima Penyerahan nilai UTS/UAS', 9, '100', '2020-05-01 17:08:28'),
(26, 7, 27, 30, 28, 4, 'Rekap  input nilai UTS/UAS', 9, '100', '2020-05-01 17:09:18'),
(27, 8, 27, 30, 28, 4, 'Panduan Penyusunan Soal', 13, '100', '2020-05-01 17:10:29'),
(28, 8, 27, 30, 28, 4, 'Naskah Soal yang sebelum di cek dan setelah dicek', 13, '100', '2020-05-01 17:11:26'),
(29, 8, 27, 30, 28, 4, 'Berita acara pemeriksanaan soal', 13, '100', '2020-05-01 17:12:15'),
(30, 9, 27, 30, 28, 4, 'Surat Tugas Membimbing Tugas Akhir', 6, '100', '2020-05-01 17:13:37'),
(31, 9, 27, 30, 28, 4, 'Daftar Mahasiswa Bimbingan Tugas Akhir', 6, '100', '2020-05-01 17:14:33'),
(32, 9, 27, 30, 28, 4, 'Kelengkapan seminra Proposal Tugas Akhir', 6, '100', '2020-05-01 17:19:32'),
(33, 9, 27, 30, 28, 4, 'Presentase mahasiswa yang telah menyelesaikan Tugas Akhir', 6, '100', '2020-05-01 17:23:16'),
(34, 10, 27, 30, 28, 4, 'Rekap Rata-rata jumlah bimbingan TA per prodi', 6, '100', '2020-05-01 17:24:00'),
(35, 10, 27, 30, 28, 4, 'Daftar hadir Dosen membimbin tugas akhir', 6, '100', '2020-05-01 17:25:04'),
(36, 10, 27, 30, 28, 4, 'Daftar hadir mahasiswa bimbingan Tugas Akhir', 6, '100', '2020-05-01 17:26:22'),
(37, 10, 27, 30, 28, 4, 'Rekap Rata-rata kehadiran mahasiswa bimbingan tugas akhir', 6, '100', '2020-05-01 17:27:10'),
(38, 11, 27, 30, 28, 4, 'Rekap Rata-rata waktu penyelesaian Tugas  Akhir Per Dosen Pembimbing Tugas  Akhir', 6, '100', '2020-05-01 17:31:06'),
(39, 12, 27, 30, 28, 4, 'Surat Tugas Menguji Tugas Akhir', 6, '100', '2020-05-01 17:31:55'),
(40, 12, 27, 30, 28, 4, 'Kelengkapan administrasi Sidang Tugas Akhir  (daftar hadir sidang, berita acara sidang, daftar peserta sidang ', 6, '100', '2020-05-01 17:32:52'),
(41, 12, 27, 30, 28, 4, 'Rekap Rata-rata waktu penyelesaian Tugas  Akhir Per Dosen Pembimbing Tugas  Akhir', 6, '100', '2020-05-01 17:33:34'),
(42, 12, 27, 30, 28, 4, 'Rekap Nilai  Sidang TA', 6, '100', '2020-05-01 17:34:14');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan_file`
--

CREATE TABLE `pendidikan_file` (
  `id_file` int(11) NOT NULL,
  `pendidikan_id` int(11) NOT NULL,
  `transaksi_pendidikan_id` int(11) NOT NULL,
  `file` text NOT NULL,
  `nilai` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type_file` int(11) NOT NULL,
  `file_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan_file`
--

INSERT INTO `pendidikan_file` (`id_file`, `pendidikan_id`, `transaksi_pendidikan_id`, `file`, `nilai`, `user_id`, `type_file`, `file_timestamp`) VALUES
(1, 1, 1, 'Kartu_hasil_studi_164162572010041.pdf', 100, 8, 1, '2020-05-01 18:03:44'),
(2, 1, 2, '97779956-9586-4854-b00f-4622a136ff718.pdf', 100, 8, 1, '2020-05-01 18:32:32'),
(3, 1, 2, 'Agenda_OM_Kabel_Serat_Optik_Get_Your_Certificate3.pdf', 100, 8, 1, '2020-05-01 18:32:49'),
(4, 1, 3, '97779956-9586-4854-b00f-4622a136ff719.pdf', 100, 8, 1, '2020-05-01 18:33:53'),
(5, 1, 4, 'Agenda_OM_Kabel_Serat_Optik_Get_Your_Certificate4.pdf', 100, 8, 1, '2020-05-01 18:42:43'),
(6, 1, 5, '15_sertifikat_BNSP-dikompresi4.pdf', 100, 8, 1, '2020-05-01 19:04:27'),
(7, 1, 6, 'Agenda_OM_Kabel_Serat_Optik_Get_Your_Certificate5.pdf', 100, 8, 1, '2020-05-01 19:04:49'),
(8, 1, 7, 'Agenda_Bekerja_Dalam_Tim_Get_Your_Certificate13.pdf', 100, 8, 1, '2020-05-01 19:05:11'),
(9, 1, 8, '15_sertifikat_BNSP-dikompresi5.pdf', 100, 8, 1, '2020-05-01 19:05:32'),
(10, 1, 9, 'Agenda_TCPIP_Overview_Get_Your_Certificate2.pdf', 100, 8, 1, '2020-05-01 19:06:08'),
(13, 1, 10, 'Agenda_Bekerja_Dalam_Tim_Get_Your_Certificate14.pdf', 100, 8, 1, '2020-05-01 19:13:07'),
(14, 1, 11, '', 100, 8, 1, '2020-05-01 19:13:40'),
(15, 1, 12, '', 100, 8, 1, '2020-05-01 19:15:01'),
(16, 1, 4, 'Agenda_OM_Kabel_Serat_Optik_Get_Your_Certificate6.pdf', 100, 8, 2, '2020-05-02 12:54:38'),
(17, 1, 5, '15_sertifikat_BNSP-dikompresi6.pdf', 100, 8, 2, '2020-05-02 13:06:12'),
(18, 1, 7, 'form-bimbingan-proposal-tugas-akhir-2019-ftik7.pdf', 100, 8, 2, '2020-05-02 13:09:31'),
(19, 1, 11, 'form-bimbingan-proposal-tugas-akhir-2019-ftik8.pdf', 100, 8, 2, '2020-05-02 13:16:09'),
(20, 1, 12, 'Agenda_Bekerja_Dalam_Tim_Get_Your_Certificate16.pdf', 100, 8, 2, '2020-05-03 04:28:03'),
(21, 1, 13, 'Agenda_OM_Kabel_Serat_Optik_Get_Your_Certificate(1).pdf', 100, 28, 1, '2020-05-10 15:55:13'),
(23, 2, 44, 'Kwitansi_TA.pdf', 7, 28, 1, '2020-05-11 16:34:15'),
(24, 2, 44, 'Agenda_OM_Kabel_Serat_Optik_Get_Your_Certificate7.pdf', 100, 29, 1, '2020-05-11 16:37:30'),
(25, 1, 4, 'Agenda_OM_Kabel_Serat_Optik_Get_Your_Certificate(1)1.pdf', 100, 29, 2, '2020-05-11 17:21:21'),
(27, 3, 100, 'Agenda_Bekerja_Dalam_Tim_Get_Your_Certificate17.pdf', 1, 32, 1, '2020-05-12 01:39:08'),
(29, 3, 101, '15_sertifikat_BNSP-dikompresi7.pdf', 100, 32, 1, '2020-05-12 01:43:38'),
(30, 3, 102, 'formulir-cek-surat-keterangan-pendamping-ijazah-skpi5.pdf', 1, 32, 1, '2020-05-12 02:13:27'),
(31, 3, 103, 'Kartu_hasil_studi_16416257201004(1)1.pdf', 1, 32, 1, '2020-05-12 02:13:47'),
(32, 3, 101, '97779956-9586-4854-b00f-4622a136ff7113.pdf', 100, 32, 2, '2020-05-12 02:39:16'),
(34, 2, 43, 'Agenda_Bekerja_Dalam_Tim_Get_Your_Certificate19.pdf', 100, 31, 1, '2020-05-12 04:04:42'),
(35, 2, 43, 'Agenda_TCPIP_Overview_Get_Your_Certificate3.pdf', 100, 31, 1, '2020-05-12 04:04:59'),
(36, 4, 127, 'Kwitansi_TA1.pdf', 100, 28, 1, '2020-05-12 04:31:39'),
(37, 4, 132, 'Kwitansi_TA2.pdf', 100, 28, 1, '2020-05-12 04:31:55'),
(38, 4, 130, 'Kwitansi_TA3.pdf', 1, 28, 1, '2020-05-12 04:32:08'),
(39, 4, 137, 'Kwitansi_TA4.pdf', 100, 28, 1, '2020-05-12 04:32:23'),
(40, 4, 132, 'Agenda_Bekerja_Dalam_Tim_Get_Your_Certificate20.pdf', 100, 31, 2, '2020-05-12 04:38:06'),
(42, 2, 56, '97779956-9586-4854-b00f-4622a136ff7115.pdf', 100, 33, 1, '2020-05-12 10:03:39'),
(44, 2, 57, 'Agenda_Bekerja_Dalam_Tim_Get_Your_Certificate22.pdf', 100, 33, 1, '2020-05-12 10:04:00'),
(45, 2, 69, 'Agenda_OM_Kabel_Serat_Optik_Get_Your_Certificate8.pdf', 100, 33, 1, '2020-05-12 10:04:11'),
(47, 5, 169, 'Agenda_Bekerja_Dalam_Tim_Get_Your_Certificate24.pdf', 1, 28, 1, '2020-05-12 14:10:46'),
(48, 5, 169, 'Agenda_Bekerja_Dalam_Tim_Get_Your_Certificate25.pdf', 1, 28, 1, '2020-05-12 14:24:54'),
(49, 5, 170, 'Agenda_TCPIP_Overview_Get_Your_Certificate(1)2.pdf', 1, 28, 1, '2020-05-12 14:25:13'),
(50, 5, 171, 'Agenda_Bekerja_Dalam_Tim_Get_Your_Certificate26.pdf', 1, 28, 1, '2020-05-12 14:27:17'),
(51, 5, 182, 'Agenda_Bekerja_Dalam_Tim_Get_Your_Certificate27.pdf', 1, 33, 1, '2020-05-13 00:32:59'),
(52, 5, 182, 'Agenda_Bekerja_Dalam_Tim_Get_Your_Certificate28.pdf', 2, 33, 1, '2020-05-13 00:42:58'),
(53, 5, 182, 'Agenda_Bekerja_Dalam_Tim_Get_Your_Certificate29.pdf', 1, 33, 1, '2020-05-13 00:52:27'),
(54, 1, 14, 'Agenda_Bekerja_Dalam_Tim_Get_Your_Certificate30.pdf', 1, 33, 2, '2020-05-13 01:39:35'),
(55, 4, 140, 'Agenda_Bekerja_Dalam_Tim_Get_Your_Certificate31.pdf', 1, 33, 1, '2020-05-13 03:02:11'),
(56, 4, 141, 'Agenda_Bekerja_Dalam_Tim_Get_Your_Certificate32.pdf', 1, 33, 1, '2020-05-13 03:02:21'),
(57, 4, 153, 'Agenda_Bekerja_Dalam_Tim_Get_Your_Certificate33.pdf', 1, 33, 1, '2020-05-13 03:02:35'),
(58, 4, 154, 'Agenda_Bekerja_Dalam_Tim_Get_Your_Certificate34.pdf', 1, 33, 1, '2020-05-13 03:02:44'),
(59, 4, 155, 'Agenda_Bekerja_Dalam_Tim_Get_Your_Certificate35.pdf', 1, 33, 1, '2020-05-13 03:02:54'),
(60, 5, 169, 'Agenda_Bekerja_Dalam_Tim_Get_Your_Certificate36.pdf', 1, 31, 1, '2020-05-13 03:22:01'),
(61, 4, 132, 'Agenda_Bekerja_Dalam_Tim_Get_Your_Certificate37.pdf', 1, 31, 2, '2020-05-13 04:11:22'),
(62, 5, 184, 'Agenda_Bekerja_Dalam_Tim_Get_Your_Certificate38.pdf', 1, 32, 1, '2020-05-13 05:40:45'),
(63, 3, 101, 'Agenda_Bekerja_Dalam_Tim_Get_Your_Certificate39.pdf', 1, 32, 2, '2020-05-13 06:01:41'),
(64, 5, 172, 'Kartu_hasil_studi_164162572010042.pdf', 1, 28, 1, '2020-06-14 10:59:50'),
(65, 7, 270, 'Kartu_hasil_studi_164162572010044.pdf', 100, 32, 1, '2020-06-14 12:27:46'),
(66, 7, 271, 'Kartu_hasil_studi_164162572010045.pdf', 100, 32, 1, '2020-06-14 12:28:00'),
(67, 7, 272, 'Kartu_hasil_studi_164162572010046.pdf', 100, 32, 1, '2020-06-14 12:28:10'),
(68, 7, 273, 'Kartu_hasil_studi_164162572010047.pdf', 100, 32, 1, '2020-06-14 12:28:23'),
(69, 7, 274, 'Kartu_hasil_studi_164162572010048.pdf', 100, 32, 1, '2020-06-14 12:28:37'),
(70, 7, 275, 'Kartu_hasil_studi_164162572010049.pdf', 100, 32, 1, '2020-06-14 12:28:48'),
(71, 7, 256, 'Kartu_hasil_studi_1641625720100410.pdf', 100, 29, 1, '2020-06-14 12:30:13'),
(72, 7, 257, 'Kartu_hasil_studi_1641625720100411.pdf', 100, 29, 1, '2020-06-14 12:30:24'),
(73, 7, 258, 'Kartu_hasil_studi_1641625720100412.pdf', 100, 29, 1, '2020-06-14 12:30:35'),
(74, 7, 259, 'Kartu_hasil_studi_1641625720100413.pdf', 100, 29, 1, '2020-06-14 12:30:48'),
(75, 7, 264, 'Kartu_hasil_studi_1641625720100414.pdf', 100, 29, 1, '2020-06-14 12:31:00'),
(76, 7, 265, 'Kartu_hasil_studi_1641625720100415.pdf', 100, 29, 1, '2020-06-14 12:31:11'),
(77, 7, 266, 'Kartu_hasil_studi_1641625720100416.pdf', 100, 29, 1, '2020-06-14 12:31:22'),
(78, 7, 267, 'Kartu_hasil_studi_1641625720100417.pdf', 100, 29, 1, '2020-06-14 12:31:36'),
(79, 7, 284, 'Kartu_hasil_studi_1641625720100418.pdf', 100, 29, 1, '2020-06-14 12:31:48'),
(80, 7, 285, 'Kartu_hasil_studi_1641625720100419.pdf', 100, 29, 1, '2020-06-14 12:34:52'),
(81, 7, 286, 'Kartu_hasil_studi_1641625720100420.pdf', 100, 29, 1, '2020-06-14 12:35:05'),
(82, 7, 287, 'Kartu_hasil_studi_1641625720100421.pdf', 100, 29, 1, '2020-06-14 12:35:17'),
(83, 7, 288, 'Kartu_hasil_studi_1641625720100422.pdf', 100, 29, 1, '2020-06-14 12:35:28'),
(84, 7, 289, 'Kartu_hasil_studi_1641625720100423.pdf', 100, 29, 1, '2020-06-14 12:35:40'),
(85, 7, 290, 'Kartu_hasil_studi_1641625720100424.pdf', 100, 29, 1, '2020-06-14 12:35:51'),
(86, 7, 291, 'Kartu_hasil_studi_1641625720100425.pdf', 100, 29, 1, '2020-06-14 12:36:04'),
(87, 7, 292, 'Kartu_hasil_studi_1641625720100426.pdf', 100, 29, 1, '2020-06-14 12:39:28'),
(88, 7, 293, 'Kartu_hasil_studi_1641625720100427.pdf', 100, 29, 1, '2020-06-14 12:39:43'),
(89, 7, 294, 'Kartu_hasil_studi_1641625720100428.pdf', 100, 29, 1, '2020-06-14 12:39:55'),
(90, 7, 295, 'Kartu_hasil_studi_1641625720100429.pdf', 100, 29, 1, '2020-06-14 12:40:07'),
(91, 7, 296, 'Kartu_hasil_studi_1641625720100430.pdf', 100, 29, 1, '2020-06-14 12:40:18'),
(92, 7, 255, 'Kartu_hasil_studi_1641625720100431.pdf', 100, 31, 1, '2020-06-14 12:42:49'),
(93, 7, 260, 'Kartu_hasil_studi_1641625720100432.pdf', 100, 31, 1, '2020-06-14 12:43:00'),
(94, 7, 261, 'Kartu_hasil_studi_1641625720100433.pdf', 100, 31, 1, '2020-06-14 12:43:11'),
(95, 7, 262, 'Kartu_hasil_studi_1641625720100434.pdf', 100, 31, 1, '2020-06-14 12:43:24'),
(96, 7, 263, 'Kartu_hasil_studi_1641625720100435.pdf', 100, 31, 1, '2020-06-14 12:43:34'),
(97, 7, 276, 'Kartu_hasil_studi_1641625720100436.pdf', 100, 31, 1, '2020-06-14 12:43:45'),
(98, 7, 277, 'Kartu_hasil_studi_1641625720100437.pdf', 100, 31, 1, '2020-06-14 12:43:56'),
(99, 7, 278, 'Kartu_hasil_studi_1641625720100438.pdf', 100, 31, 1, '2020-06-14 12:44:07'),
(100, 7, 279, 'Kartu_hasil_studi_1641625720100439.pdf', 100, 31, 1, '2020-06-14 12:44:17'),
(101, 7, 280, 'Kartu_hasil_studi_1641625720100440.pdf', 100, 31, 1, '2020-06-14 12:44:28'),
(102, 7, 268, 'Kartu_hasil_studi_1641625720100441.pdf', 100, 33, 1, '2020-06-14 12:44:59'),
(103, 7, 269, 'Kartu_hasil_studi_1641625720100442.pdf', 100, 33, 1, '2020-06-14 12:45:10'),
(104, 7, 281, 'Kartu_hasil_studi_1641625720100443.pdf', 100, 33, 1, '2020-06-14 12:45:21'),
(105, 7, 282, 'Kartu_hasil_studi_1641625720100444.pdf', 100, 33, 1, '2020-06-14 12:45:32'),
(106, 7, 283, 'Kartu_hasil_studi_1641625720100445.pdf', 100, 33, 1, '2020-06-14 12:45:46'),
(107, 7, 258, 'Kartu_hasil_studi_1641625720100446.pdf', 100, 29, 2, '2020-06-14 13:30:59'),
(108, 7, 268, 'Kartu_hasil_studi_1641625720100447.pdf', 100, 33, 2, '2020-06-14 13:40:31'),
(109, 7, 282, 'Kartu_hasil_studi_1641625720100448.pdf', 100, 33, 2, '2020-06-14 13:41:21'),
(110, 7, 264, 'Kartu_hasil_studi_1641625720100449.pdf', 100, 29, 2, '2020-06-14 13:42:48'),
(111, 7, 289, 'Kartu_hasil_studi_1641625720100450.pdf', 100, 29, 2, '2020-06-14 13:43:00'),
(112, 7, 260, 'Kartu_hasil_studi_1641625720100451.pdf', 100, 31, 2, '2020-06-14 13:44:34'),
(113, 7, 262, 'Kartu_hasil_studi_1641625720100452.pdf', 100, 31, 2, '2020-06-14 13:44:48');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan_jad_t`
--

CREATE TABLE `pendidikan_jad_t` (
  `id_pjt` int(11) NOT NULL,
  `id_dokumen_pendidikan` int(11) NOT NULL,
  `id_jad` int(11) NOT NULL,
  `pjt_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan_jad_t`
--

INSERT INTO `pendidikan_jad_t` (`id_pjt`, `id_dokumen_pendidikan`, `id_jad`, `pjt_timestamp`) VALUES
(1, 1, 1, '2020-04-23 17:27:05'),
(3, 1, 3, '2020-04-26 16:32:42');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan_lampiran`
--

CREATE TABLE `pendidikan_lampiran` (
  `id_pendidikan_lampiran` int(11) NOT NULL,
  `pendidikan_id` int(11) NOT NULL,
  `nama_lampiran` text NOT NULL,
  `deskripsi_lampiran` text NOT NULL,
  `file` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `lampiran_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan_lampiran`
--

INSERT INTO `pendidikan_lampiran` (`id_pendidikan_lampiran`, `pendidikan_id`, `nama_lampiran`, `deskripsi_lampiran`, `file`, `user_id`, `lampiran_timestamp`) VALUES
(1, 3, 'File presentasi', 'banyak lah', 'SK_PERUBAHAN_PERSYARATAN_SURAT_KETERANGAN_PENDAMPING_IJAZAH_(SKPI)3.pdf', 8, '2020-04-15 12:33:46'),
(2, 4, 'efefef', 'fefefef', 'efefefe', 9, '2020-04-15 11:38:10'),
(4, 3, 'Daftar hadir', 'daftar hadir doang', '97779956-9586-4854-b00f-4622a136ff716.pdf', 8, '2020-04-15 12:34:03'),
(6, 8, 'SK Panitia', 'sk', 'Agenda_OM_Kabel_Serat_Optik_Get_Your_Certificate2.pdf', 8, '2020-04-30 06:07:47'),
(7, 8, 'Tanda tangan rapat', 'ttd', 'SK_PERUBAHAN_PERSYARATAN_SURAT_KETERANGAN_PENDAMPING_IJAZAH_(SKPI)6.pdf', 8, '2020-04-30 06:08:23'),
(8, 8, 'Daftar hadir evaluasi', '...', 'Agenda_Bekerja_Dalam_Tim_Get_Your_Certificate10.pdf', 8, '2020-04-30 06:29:38'),
(9, 8, 'SK Hasil', 'hasil', 'Agenda_Bekerja_Dalam_Tim_Get_Your_Certificate11.pdf', 8, '2020-04-30 06:38:57'),
(10, 1, 'Daftar hadir rapat', 'daftar hadir rapat si', 'Agenda_Bekerja_Dalam_Tim_Get_Your_Certificate15.pdf', 8, '2020-05-02 10:07:12'),
(11, 7, 'Daftar Hadir Rapat Pelaksanaan', 'Rapat Pelaksanaan Proses Pembelajaran', 'Kartu_hasil_studi_164162572010043.pdf', 28, '2020-06-14 12:24:28');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan_nilai`
--

CREATE TABLE `pendidikan_nilai` (
  `id_pendidikan_nilai` int(11) NOT NULL,
  `object_id_pendidikan` varchar(512) NOT NULL,
  `standar_id` int(11) NOT NULL,
  `des_pendidikan` text NOT NULL,
  `tahun_ajaran` varchar(128) NOT NULL,
  `periode` varchar(128) NOT NULL,
  `kegiatan` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fakultas_id` int(11) NOT NULL,
  `prodi_id` int(11) NOT NULL,
  `is_active_pendidikan` int(11) NOT NULL,
  `pendidikan_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan_nilai`
--

INSERT INTO `pendidikan_nilai` (`id_pendidikan_nilai`, `object_id_pendidikan`, `standar_id`, `des_pendidikan`, `tahun_ajaran`, `periode`, `kegiatan`, `user_id`, `fakultas_id`, `prodi_id`, `is_active_pendidikan`, `pendidikan_timestamp`) VALUES
(6, '8202004151586962840', 27, 'Borang Triwulan Sistem Informasi', '2020-2021', 'Genap', 'UTS', 8, 1, 1, 1, '2020-04-15 15:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan_pengendalian`
--

CREATE TABLE `pendidikan_pengendalian` (
  `id_pendidikan_pengendalian` int(11) NOT NULL,
  `object_id_pendidikan` varchar(512) NOT NULL,
  `standar_id` int(11) NOT NULL,
  `des_pendidikan` text NOT NULL,
  `tahun_ajaran` varchar(128) NOT NULL,
  `periode` varchar(128) NOT NULL,
  `kegiatan` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fakultas_id` int(11) NOT NULL,
  `prodi_id` int(11) NOT NULL,
  `is_active_pendidikan` int(11) NOT NULL,
  `pendidikan_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan_pengendalian`
--

INSERT INTO `pendidikan_pengendalian` (`id_pendidikan_pengendalian`, `object_id_pendidikan`, `standar_id`, `des_pendidikan`, `tahun_ajaran`, `periode`, `kegiatan`, `user_id`, `fakultas_id`, `prodi_id`, `is_active_pendidikan`, `pendidikan_timestamp`) VALUES
(5, '8202004141586894079', 27, 'Borang Sistem Informasi', '2020-2021', 'Genap', 'UTS', 8, 1, 1, 1, '2020-04-14 20:31:29');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan_peningkatan`
--

CREATE TABLE `pendidikan_peningkatan` (
  `id_pendidikan_peningkatan` int(11) NOT NULL,
  `object_id_pendidikan` varchar(512) NOT NULL,
  `standar_id` int(11) NOT NULL,
  `des_pendidikan` text NOT NULL,
  `tahun_ajaran` varchar(128) NOT NULL,
  `periode` varchar(128) NOT NULL,
  `kegiatan` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fakultas_id` int(11) NOT NULL,
  `prodi_id` int(11) NOT NULL,
  `is_active_pendidikan` int(11) NOT NULL,
  `pendidikan_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan_peningkatan`
--

INSERT INTO `pendidikan_peningkatan` (`id_pendidikan_peningkatan`, `object_id_pendidikan`, `standar_id`, `des_pendidikan`, `tahun_ajaran`, `periode`, `kegiatan`, `user_id`, `fakultas_id`, `prodi_id`, `is_active_pendidikan`, `pendidikan_timestamp`) VALUES
(3, '8202004121586703237', 27, 'Borang', '2019-2020', 'Genap', 'UTS', 8, 1, 1, 1, '2020-04-14 17:12:18');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan_status`
--

CREATE TABLE `pendidikan_status` (
  `id_status_pendidikan` int(11) NOT NULL,
  `nama_status` varchar(128) NOT NULL,
  `ket_status` varchar(512) NOT NULL,
  `status_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan_status`
--

INSERT INTO `pendidikan_status` (`id_status_pendidikan`, `nama_status`, `ket_status`, `status_timestamp`) VALUES
(1, 'OK', 'Ada fakta dengan bukti yang baik/lengkap', '2020-03-13 18:49:54'),
(2, 'OB', 'Ada fakta dengan dokumen hampir lengkap', '2020-03-13 18:49:31'),
(3, 'KTS', 'Tidak ada fakta  atau dokumen kurang lengkap', '2020-03-13 18:50:20');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan_transaksi`
--

CREATE TABLE `pendidikan_transaksi` (
  `id_transaksi_pendidikan` int(11) NOT NULL,
  `pendidikan_id` int(11) NOT NULL,
  `aspek_id` int(11) NOT NULL,
  `dokumen_id` int(11) NOT NULL,
  `standar_id` int(11) NOT NULL,
  `mp_id` int(11) NOT NULL,
  `sop_id` int(11) NOT NULL,
  `formulir_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `target` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `log_pelaksanaan` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `akar_masalah` text NOT NULL,
  `keterangan_dokumen` text NOT NULL,
  `capaian` varchar(512) NOT NULL,
  `rencana_perbaikan` text NOT NULL,
  `jadwal_perbaikan` date NOT NULL,
  `penanggung_jawab_perbaikan` varchar(255) NOT NULL,
  `rencana_pengendalian` text NOT NULL,
  `jadwal_pengendalian` date NOT NULL,
  `penanggung_jawab_pengendalian` varchar(255) NOT NULL,
  `log_pengendalian` int(11) NOT NULL,
  `status_perbaikan` int(11) NOT NULL,
  `capaian_perbaikan` varchar(512) NOT NULL,
  `masalah_perbaikan` text NOT NULL,
  `perbaikan_dokumen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan_transaksi`
--

INSERT INTO `pendidikan_transaksi` (`id_transaksi_pendidikan`, `pendidikan_id`, `aspek_id`, `dokumen_id`, `standar_id`, `mp_id`, `sop_id`, `formulir_id`, `role_id`, `target`, `user_id`, `log_pelaksanaan`, `status_id`, `akar_masalah`, `keterangan_dokumen`, `capaian`, `rencana_perbaikan`, `jadwal_perbaikan`, `penanggung_jawab_perbaikan`, `rencana_pengendalian`, `jadwal_pengendalian`, `penanggung_jawab_pengendalian`, `log_pengendalian`, `status_perbaikan`, `capaian_perbaikan`, `masalah_perbaikan`, `perbaikan_dokumen`) VALUES
(1, 1, 1, 1, 27, 30, 28, 4, 9, 100, 0, 0, 1, '', 'Selesai', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(2, 1, 2, 2, 27, 30, 28, 4, 6, 100, 0, 0, 1, '', 'Selesai', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(3, 1, 2, 3, 27, 30, 28, 4, 6, 100, 0, 0, 1, '', 'Selesai', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(4, 1, 2, 4, 27, 30, 28, 4, 6, 100, 0, 0, 2, '', 'Kurang Lengkap', '100', 'Melengkapi', '2020-05-09', '8', 'Melengkapi dokumen', '2020-05-08', '8', 0, 1, '100', '', 'Lengkap'),
(5, 1, 2, 5, 27, 30, 28, 4, 6, 100, 0, 0, 3, '', 'Kurang Lengkap', '100', 'Melengkapi', '2020-05-07', '19', 'Melengkapi dokumen', '2020-05-09', '20', 0, 1, '100', '', 'Selesai'),
(6, 1, 2, 6, 27, 30, 28, 4, 9, 100, 0, 0, 1, '', 'Lengkap', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(7, 1, 2, 7, 27, 30, 28, 4, 9, 100, 0, 0, 2, '', 'Kurang Lengkap', '80', 'Melengkapi', '2020-05-08', '20', 'Melengkapi dokumen', '2020-05-15', '25', 0, 2, '100', '', 'Tidak Lengkap'),
(8, 1, 2, 8, 27, 30, 28, 4, 9, 100, 0, 0, 1, '', 'Lengkap', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(9, 1, 2, 9, 27, 30, 28, 4, 9, 100, 0, 0, 3, '', 'Kurang Lengkap', '20', 'Melengkapi', '2020-05-08', '19', 'Melengkapi dokumen', '2020-05-14', '26', 0, 3, '0', '', 'Tidak Lengkap'),
(10, 1, 3, 10, 27, 30, 28, 4, 6, 50, 0, 0, 1, '', 'Lengkap', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(11, 1, 4, 11, 27, 30, 28, 4, 6, 100, 0, 0, 2, '', 'tidak lengkap', '100', 'Upload ulang', '2020-05-14', '8', 'Melengkapi dokumen', '2020-05-14', '20', 0, 1, '100', '', 'Selesai'),
(12, 1, 5, 12, 27, 30, 28, 4, 6, 100, 0, 0, 3, '', 'Tidak sesuai', '20', 'Unggah kembali', '2020-05-05', '8', 'Mengawasi', '2020-05-13', '21', 0, 2, '80', '', 'Kurang lengkap'),
(13, 1, 6, 13, 27, 30, 28, 4, 6, 100, 0, 0, 3, '', 'tidak lengkap', '0', '', '0000-00-00', '', '', '0000-00-00', '', 0, 3, '20', '', 'Tidak Lengkap'),
(14, 1, 6, 14, 27, 30, 28, 4, 13, 100, 0, 0, 3, '', 'tidak lengkap', '0', 'Unggah kembali', '2020-05-16', '20', '', '0000-00-00', '', 33, 3, '20', '', 'Tidak Lengkap'),
(15, 1, 6, 15, 27, 30, 28, 4, 13, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(16, 1, 7, 16, 27, 30, 28, 4, 14, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(17, 1, 7, 17, 27, 30, 28, 4, 14, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(18, 1, 7, 18, 27, 30, 28, 4, 14, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(19, 1, 7, 19, 27, 30, 28, 4, 14, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(20, 1, 7, 20, 27, 30, 28, 4, 14, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(21, 1, 7, 21, 27, 30, 28, 4, 14, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(22, 1, 7, 22, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(23, 1, 7, 23, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(24, 1, 7, 24, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(25, 1, 7, 25, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(26, 1, 7, 26, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(27, 1, 8, 27, 27, 30, 28, 4, 13, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(28, 1, 8, 28, 27, 30, 28, 4, 13, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(29, 1, 8, 29, 27, 30, 28, 4, 13, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(30, 1, 9, 30, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(31, 1, 9, 31, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(32, 1, 9, 32, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(33, 1, 9, 33, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(34, 1, 10, 34, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(35, 1, 10, 35, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(36, 1, 10, 36, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(37, 1, 10, 37, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(38, 1, 11, 38, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(39, 1, 12, 39, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(40, 1, 12, 40, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(41, 1, 12, 41, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(42, 1, 12, 42, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(43, 2, 1, 1, 27, 30, 28, 4, 9, 100, 0, 0, 1, 'tidak ada', 'Selesai', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(44, 2, 2, 2, 27, 30, 28, 4, 6, 100, 0, 0, 1, 'tidak ada', 'Selesai', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(45, 2, 2, 3, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(46, 2, 2, 4, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(47, 2, 2, 5, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(48, 2, 2, 6, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(49, 2, 2, 7, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(50, 2, 2, 8, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(51, 2, 2, 9, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(52, 2, 3, 10, 27, 30, 28, 4, 6, 50, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(53, 2, 4, 11, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(54, 2, 5, 12, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(55, 2, 6, 13, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(56, 2, 6, 14, 27, 30, 28, 4, 13, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(57, 2, 6, 15, 27, 30, 28, 4, 13, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(58, 2, 7, 16, 27, 30, 28, 4, 14, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(59, 2, 7, 17, 27, 30, 28, 4, 14, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(60, 2, 7, 18, 27, 30, 28, 4, 14, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(61, 2, 7, 19, 27, 30, 28, 4, 14, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(62, 2, 7, 20, 27, 30, 28, 4, 14, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(63, 2, 7, 21, 27, 30, 28, 4, 14, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(64, 2, 7, 22, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(65, 2, 7, 23, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(66, 2, 7, 24, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(67, 2, 7, 25, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(68, 2, 7, 26, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(69, 2, 8, 27, 27, 30, 28, 4, 13, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(70, 2, 8, 28, 27, 30, 28, 4, 13, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(71, 2, 8, 29, 27, 30, 28, 4, 13, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(72, 2, 9, 30, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(73, 2, 9, 31, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(74, 2, 9, 32, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(75, 2, 9, 33, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(76, 2, 10, 34, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(77, 2, 10, 35, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(78, 2, 10, 36, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(79, 2, 10, 37, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(80, 2, 11, 38, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(81, 2, 12, 39, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(82, 2, 12, 40, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(83, 2, 12, 41, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(84, 2, 12, 42, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(85, 3, 1, 1, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(86, 3, 2, 2, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(87, 3, 2, 3, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(88, 3, 2, 4, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(89, 3, 2, 5, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(90, 3, 2, 6, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(91, 3, 2, 7, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(92, 3, 2, 8, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(93, 3, 2, 9, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(94, 3, 3, 10, 27, 30, 28, 4, 6, 50, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(95, 3, 4, 11, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(96, 3, 5, 12, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(97, 3, 6, 13, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(98, 3, 6, 14, 27, 30, 28, 4, 13, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(99, 3, 6, 15, 27, 30, 28, 4, 13, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(100, 3, 7, 16, 27, 30, 28, 4, 14, 100, 0, 0, 1, '', 'Selesai', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(101, 3, 7, 17, 27, 30, 28, 4, 14, 100, 0, 0, 2, '', 'Melengkapi tanda tangan', '80', '', '0000-00-00', '', '', '0000-00-00', '', 32, 1, '100', '-', '-'),
(102, 3, 7, 18, 27, 30, 28, 4, 14, 100, 0, 0, 3, '', 'Unggah kembali', '20', '', '0000-00-00', '', '', '0000-00-00', '', 0, 3, '0', '-', '-'),
(103, 3, 7, 19, 27, 30, 28, 4, 14, 100, 0, 0, 1, '', 'Selesai', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(104, 3, 7, 20, 27, 30, 28, 4, 14, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(105, 3, 7, 21, 27, 30, 28, 4, 14, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(106, 3, 7, 22, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(107, 3, 7, 23, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(108, 3, 7, 24, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(109, 3, 7, 25, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(110, 3, 7, 26, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(111, 3, 8, 27, 27, 30, 28, 4, 13, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(112, 3, 8, 28, 27, 30, 28, 4, 13, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(113, 3, 8, 29, 27, 30, 28, 4, 13, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(114, 3, 9, 30, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(115, 3, 9, 31, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(116, 3, 9, 32, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(117, 3, 9, 33, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(118, 3, 10, 34, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(119, 3, 10, 35, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(120, 3, 10, 36, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(121, 3, 10, 37, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(122, 3, 11, 38, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(123, 3, 12, 39, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(124, 3, 12, 40, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(125, 3, 12, 41, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(126, 3, 12, 42, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(127, 4, 1, 1, 27, 30, 28, 4, 9, 100, 0, 0, 1, '', 'Selesai', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(128, 4, 2, 2, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(129, 4, 2, 3, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(130, 4, 2, 4, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(131, 4, 2, 5, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(132, 4, 2, 6, 27, 30, 28, 4, 9, 100, 0, 0, 2, '', 'Lengkapi', '83', 'Melengkapi', '2020-05-16', '29', 'Mengawasi', '2020-05-14', '20', 31, 3, '10', '-', '-'),
(133, 4, 2, 7, 27, 30, 28, 4, 9, 100, 0, 0, 3, '', 'Kosong', '0', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(134, 4, 2, 8, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(135, 4, 2, 9, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(136, 4, 3, 10, 27, 30, 28, 4, 6, 50, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(137, 4, 4, 11, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(138, 4, 5, 12, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(139, 4, 6, 13, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(140, 4, 6, 14, 27, 30, 28, 4, 13, 100, 0, 33, 1, 'tidak ada', 'Selesai', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(141, 4, 6, 15, 27, 30, 28, 4, 13, 100, 0, 33, 2, 'Melengkapi', 'Unggah Dokumen', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(142, 4, 7, 16, 27, 30, 28, 4, 14, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(143, 4, 7, 17, 27, 30, 28, 4, 14, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(144, 4, 7, 18, 27, 30, 28, 4, 14, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(145, 4, 7, 19, 27, 30, 28, 4, 14, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(146, 4, 7, 20, 27, 30, 28, 4, 14, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(147, 4, 7, 21, 27, 30, 28, 4, 14, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(148, 4, 7, 22, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(149, 4, 7, 23, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(150, 4, 7, 24, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(151, 4, 7, 25, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(152, 4, 7, 26, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(153, 4, 8, 27, 27, 30, 28, 4, 13, 100, 0, 33, 3, 'tidak ada', 'unggah dokumen', '20', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(154, 4, 8, 28, 27, 30, 28, 4, 13, 100, 0, 33, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(155, 4, 8, 29, 27, 30, 28, 4, 13, 100, 0, 33, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(156, 4, 9, 30, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(157, 4, 9, 31, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(158, 4, 9, 32, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(159, 4, 9, 33, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(160, 4, 10, 34, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(161, 4, 10, 35, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(162, 4, 10, 36, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(163, 4, 10, 37, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(164, 4, 11, 38, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(165, 4, 12, 39, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(166, 4, 12, 40, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(167, 4, 12, 41, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(168, 4, 12, 42, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(169, 5, 1, 1, 27, 30, 28, 4, 9, 100, 0, 31, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(170, 5, 2, 2, 27, 30, 28, 4, 6, 100, 0, 1, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(171, 5, 2, 3, 27, 30, 28, 4, 6, 100, 0, 1, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(172, 5, 2, 4, 27, 30, 28, 4, 6, 100, 0, 28, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(173, 5, 2, 5, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(174, 5, 2, 6, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(175, 5, 2, 7, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(176, 5, 2, 8, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(177, 5, 2, 9, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(178, 5, 3, 10, 27, 30, 28, 4, 6, 50, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(179, 5, 4, 11, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(180, 5, 5, 12, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(181, 5, 6, 13, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(182, 5, 6, 14, 27, 30, 28, 4, 13, 100, 0, 33, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(183, 5, 6, 15, 27, 30, 28, 4, 13, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(184, 5, 7, 16, 27, 30, 28, 4, 14, 100, 0, 32, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(185, 5, 7, 17, 27, 30, 28, 4, 14, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(186, 5, 7, 18, 27, 30, 28, 4, 14, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(187, 5, 7, 19, 27, 30, 28, 4, 14, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(188, 5, 7, 20, 27, 30, 28, 4, 14, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(189, 5, 7, 21, 27, 30, 28, 4, 14, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(190, 5, 7, 22, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(191, 5, 7, 23, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(192, 5, 7, 24, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(193, 5, 7, 25, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(194, 5, 7, 26, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(195, 5, 8, 27, 27, 30, 28, 4, 13, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(196, 5, 8, 28, 27, 30, 28, 4, 13, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(197, 5, 8, 29, 27, 30, 28, 4, 13, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(198, 5, 9, 30, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(199, 5, 9, 31, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(200, 5, 9, 32, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(201, 5, 9, 33, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(202, 5, 10, 34, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(203, 5, 10, 35, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(204, 5, 10, 36, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(205, 5, 10, 37, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(206, 5, 11, 38, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(207, 5, 12, 39, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(208, 5, 12, 40, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(209, 5, 12, 41, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(210, 5, 12, 42, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(211, 6, 1, 1, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(212, 6, 2, 2, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(213, 6, 2, 3, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(214, 6, 2, 4, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(215, 6, 2, 5, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(216, 6, 2, 6, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(217, 6, 2, 7, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(218, 6, 2, 8, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(219, 6, 2, 9, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(220, 6, 3, 10, 27, 30, 28, 4, 6, 50, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(221, 6, 4, 11, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(222, 6, 5, 12, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(223, 6, 6, 13, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(224, 6, 6, 14, 27, 30, 28, 4, 13, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(225, 6, 6, 15, 27, 30, 28, 4, 13, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(226, 6, 7, 16, 27, 30, 28, 4, 14, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(227, 6, 7, 17, 27, 30, 28, 4, 14, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(228, 6, 7, 18, 27, 30, 28, 4, 14, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(229, 6, 7, 19, 27, 30, 28, 4, 14, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(230, 6, 7, 20, 27, 30, 28, 4, 14, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(231, 6, 7, 21, 27, 30, 28, 4, 14, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(232, 6, 7, 22, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(233, 6, 7, 23, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(234, 6, 7, 24, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(235, 6, 7, 25, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(236, 6, 7, 26, 27, 30, 28, 4, 9, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(237, 6, 8, 27, 27, 30, 28, 4, 13, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(238, 6, 8, 28, 27, 30, 28, 4, 13, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(239, 6, 8, 29, 27, 30, 28, 4, 13, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(240, 6, 9, 30, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(241, 6, 9, 31, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(242, 6, 9, 32, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(243, 6, 9, 33, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(244, 6, 10, 34, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(245, 6, 10, 35, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(246, 6, 10, 36, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(247, 6, 10, 37, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(248, 6, 11, 38, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(249, 6, 12, 39, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(250, 6, 12, 40, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(251, 6, 12, 41, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(252, 6, 12, 42, 27, 30, 28, 4, 6, 100, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(253, 6, 7, 13, 0, 0, 0, 0, 7, 1, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(255, 7, 1, 1, 27, 30, 28, 4, 9, 100, 0, 31, 1, '-', '-', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(256, 7, 2, 2, 27, 30, 28, 4, 6, 100, 0, 29, 1, '-', '-', '98', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(257, 7, 2, 3, 27, 30, 28, 4, 6, 100, 0, 29, 1, '-', '-', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(258, 7, 2, 4, 27, 30, 28, 4, 6, 100, 0, 29, 2, 'Kurang tanda tangan', 'Meminta tanda tangan', '70', 'Meminta tanda tangan', '2020-06-15', '29', 'Meminta tanda tangan', '2020-06-15', '31', 29, 1, '100', '-', '-'),
(259, 7, 2, 5, 27, 30, 28, 4, 6, 100, 0, 29, 1, '-', '-', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(260, 7, 2, 6, 27, 30, 28, 4, 9, 100, 0, 31, 2, 'Dokumen Kurang', 'Melengkapi Dokumen', '60', 'Melengkapi Dokumen', '2020-06-15', '29', 'Melengkapi Dokumen', '2020-06-15', '31', 31, 1, '100', '-', '-'),
(261, 7, 2, 7, 27, 30, 28, 4, 9, 100, 0, 31, 1, '-', '-', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(262, 7, 2, 8, 27, 30, 28, 4, 9, 100, 0, 31, 2, 'Kurang tanda tangan', 'Meminta tanda tangan', '80', 'Meminta tanda tangan', '2020-06-15', '29', 'Meminta tanda tangan', '2020-06-15', '31', 31, 1, '100', '-', '-'),
(263, 7, 2, 9, 27, 30, 28, 4, 9, 100, 0, 31, 1, '-', '-', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(264, 7, 3, 10, 27, 30, 28, 4, 6, 50, 0, 29, 3, 'Dokumen tidak lengkap', 'Melengkapi Dokumen', '20', 'Melengkapi Dokumen', '2020-06-15', '29', 'Melengkapi Dokumen', '2020-06-15', '31', 29, 1, '100', '-', '-'),
(265, 7, 4, 11, 27, 30, 28, 4, 6, 100, 0, 29, 1, '-', '-', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(266, 7, 5, 12, 27, 30, 28, 4, 6, 100, 0, 29, 1, '-', '-', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(267, 7, 6, 13, 27, 30, 28, 4, 6, 100, 0, 29, 1, '-', '-', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(268, 7, 6, 14, 27, 30, 28, 4, 13, 100, 0, 33, 2, 'Kurang tanda tangan', 'Meminta tanda tangan', '75', 'Meminta tanda tangan', '2020-06-16', '33', 'Meminta tanda tangan', '2020-06-16', '33', 33, 1, '100', '-', '-'),
(269, 7, 6, 15, 27, 30, 28, 4, 13, 100, 0, 33, 1, '-', '-', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(270, 7, 7, 16, 27, 30, 28, 4, 14, 100, 0, 32, 1, '-', '-', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(271, 7, 7, 17, 27, 30, 28, 4, 14, 100, 0, 32, 1, '-', '-', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(272, 7, 7, 18, 27, 30, 28, 4, 14, 100, 0, 32, 1, '-', '-', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(273, 7, 7, 19, 27, 30, 28, 4, 14, 100, 0, 32, 1, '-', '-', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(274, 7, 7, 20, 27, 30, 28, 4, 14, 100, 0, 32, 1, '-', '-', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(275, 7, 7, 21, 27, 30, 28, 4, 14, 100, 0, 32, 1, '-', '-', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(276, 7, 7, 22, 27, 30, 28, 4, 9, 100, 0, 31, 1, '-', '-', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(277, 7, 7, 23, 27, 30, 28, 4, 9, 100, 0, 31, 1, '-', '-', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(278, 7, 7, 24, 27, 30, 28, 4, 9, 100, 0, 31, 1, '-', '-', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(279, 7, 7, 25, 27, 30, 28, 4, 9, 100, 0, 31, 1, '-', '-', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(280, 7, 7, 26, 27, 30, 28, 4, 9, 100, 0, 31, 1, '-', '-', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(281, 7, 8, 27, 27, 30, 28, 4, 13, 100, 0, 33, 1, '-', '-', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(282, 7, 8, 28, 27, 30, 28, 4, 13, 100, 0, 33, 2, 'Dokumen tidak lengkap', 'Melengkapi Dokumen', '80', 'Melengkapi Dokumen', '2020-06-17', '33', 'Melengkapi Dokumen', '2020-06-17', '33', 33, 1, '100', '-', '-'),
(283, 7, 8, 29, 27, 30, 28, 4, 13, 100, 0, 33, 1, '-', '-', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(284, 7, 9, 30, 27, 30, 28, 4, 6, 100, 0, 29, 1, '-', '-', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(285, 7, 9, 31, 27, 30, 28, 4, 6, 100, 0, 29, 1, '-', '-', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(286, 7, 9, 32, 27, 30, 28, 4, 6, 100, 0, 29, 1, '-', '-', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(287, 7, 9, 33, 27, 30, 28, 4, 6, 100, 0, 29, 1, '-', '-', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(288, 7, 10, 34, 27, 30, 28, 4, 6, 100, 0, 29, 1, '-', '-', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(289, 7, 10, 35, 27, 30, 28, 4, 6, 100, 0, 29, 2, 'Kurang tanda tangan', 'Meminta tanda tangan', '70', 'Meminta tanda tangan', '2020-06-17', '29', 'Meminta tanda tangan', '2020-06-16', '31', 29, 1, '100', '-', '-'),
(290, 7, 10, 36, 27, 30, 28, 4, 6, 100, 0, 29, 1, '-', '-', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(291, 7, 10, 37, 27, 30, 28, 4, 6, 100, 0, 29, 1, '-', '-', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(292, 7, 11, 38, 27, 30, 28, 4, 6, 100, 0, 29, 1, '-', '-', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(293, 7, 12, 39, 27, 30, 28, 4, 6, 100, 0, 29, 1, '-', '-', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(294, 7, 12, 40, 27, 30, 28, 4, 6, 100, 0, 29, 1, '-', '-', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(295, 7, 12, 41, 27, 30, 28, 4, 6, 100, 0, 29, 1, '-', '-', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', ''),
(296, 7, 12, 42, 27, 30, 28, 4, 6, 100, 0, 29, 1, '-', '-', '100', '', '0000-00-00', '', '', '0000-00-00', '', 0, 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `fakultas_id` int(11) NOT NULL,
  `nama_prodi` varchar(128) NOT NULL,
  `kode_prodi` varchar(128) NOT NULL,
  `prodi_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `fakultas_id`, `nama_prodi`, `kode_prodi`, `prodi_timestamp`) VALUES
(0, 0, '<i>null</i>', '', '2020-03-22 15:10:26'),
(1, 1, 'SISTEM INFORMASI', 'SI', '2020-03-07 12:20:07'),
(2, 1, 'TEKNIK INFORMATIKA', 'IF', '2020-03-07 12:20:16'),
(3, 1, 'TEKNIK INDUSTRI', 'TI', '2020-03-07 12:20:26'),
(4, 1, 'TEKNIK MESIN', 'TM', '2020-03-07 12:20:34'),
(5, 2, 'AKUNTANSI', 'AK', '2020-03-07 12:20:41'),
(6, 2, 'MANAJEMEN', 'MN', '2020-03-07 12:20:47'),
(7, 3, 'PENDIDIKAN PANCASILA DAN KEWARGANEGARAAN', 'PKN', '2020-03-07 12:22:03'),
(8, 3, 'PENDIDIKAN GURU SEKOLAH DASAR', 'PGSD', '2020-03-07 12:21:56'),
(9, 4, 'HUKUM', 'HM', '2020-03-07 12:21:32'),
(12, 6, 'FARMASI', '', '2020-03-22 14:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `sop`
--

CREATE TABLE `sop` (
  `id_sop` int(11) NOT NULL,
  `standar_id` int(11) NOT NULL,
  `mp_id` int(11) NOT NULL,
  `no_sop` varchar(50) NOT NULL,
  `deskripsi_sop` text NOT NULL,
  `revisi_sop` int(11) NOT NULL,
  `tgl_pembuatan` date NOT NULL,
  `tgl_berlaku` date NOT NULL,
  `penyimpanan` varchar(30) NOT NULL,
  `pembuat` varchar(100) NOT NULL,
  `pemeriksa` varchar(100) NOT NULL,
  `menyetujui` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `file` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sop`
--

INSERT INTO `sop` (`id_sop`, `standar_id`, `mp_id`, `no_sop`, `deskripsi_sop`, `revisi_sop`, `tgl_pembuatan`, `tgl_berlaku`, `penyimpanan`, `pembuat`, `pemeriksa`, `menyetujui`, `keterangan`, `file`, `user_id`, `timestamp`) VALUES
(4, 6, 8, 'SOP-100-100', 'SOP Penetapan VMT', 0, '2020-04-04', '2020-04-04', '-', '-', '-', '-', '', '', 0, '2020-04-04 14:55:03'),
(5, 6, 8, 'SOP-100-201', 'SOP Penyusunan VMT', 0, '2020-04-04', '2020-04-04', '-', '-', '-', '-', '', '', 0, '2020-04-04 16:26:36'),
(6, 6, 8, 'SOP-100-202', 'SOP Sosialisasi', 0, '2020-04-04', '2020-04-04', '-', '-', '-', '-', '', '', 0, '2020-04-04 16:28:11'),
(7, 6, 8, 'SOP-100-203', 'SOP Monitoring', 0, '2020-04-04', '2020-04-04', '-', '-', '-', '-', '', '', 0, '2020-04-04 16:29:20'),
(8, 6, 8, 'SOP-100-300', 'SOP Evaluasi VMT', 0, '2020-04-04', '2020-04-04', '-', '-', '-', '-', '', '', 0, '2020-04-04 16:29:48'),
(9, 6, 8, 'SOP-100-400', 'SOP Pengendalian VMT', 0, '2020-04-04', '2020-04-04', '-', '-', '-', '-', '', '', 0, '2020-04-04 16:30:53'),
(10, 6, 8, 'SOP-100-500', 'SOP Peningkatan VMT', 0, '2020-04-04', '2020-04-04', '-', '-', '-', '-', '', '', 0, '2020-04-04 16:31:22'),
(11, 7, 9, 'SOP-100-100', 'SOP Penetapan Tata Kelola', 0, '2020-04-04', '2020-04-04', '-', '-', '-', '-', '', '', 0, '2020-04-04 16:32:00'),
(12, 7, 9, 'SOP-100-201', 'SOP Pelaksanaan Tata Kelola', 0, '2020-04-04', '2020-04-04', '-', '-', '-', '-', '', '', 0, '2020-04-04 16:32:45'),
(13, 7, 9, 'SOP-100-202', 'SOP Monitoring', 0, '2020-04-04', '2020-04-04', '-', '-', '-', '-', '', '', 0, '2020-04-04 16:37:56'),
(14, 7, 9, 'SOP-1000-203', 'SOP Pemilihan Rektor', 0, '2020-04-04', '2020-04-04', '-', '-', '-', '-', '', '', 0, '2020-04-04 16:38:47'),
(15, 7, 9, 'SOP-100-300', 'SOP Evaluasi  Tata Kelola', 0, '2020-04-04', '2020-04-04', '-', '-', '-', '-', '', '', 0, '2020-04-04 16:42:19'),
(16, 7, 9, 'SOP-100-400', 'SOP Pengendalian Tata Kelola', 0, '2020-04-04', '2020-04-04', '-', '-', '-', '-', '', '', 0, '2020-04-04 16:43:02'),
(17, 7, 9, 'SOP-100-500', 'SOP Peningkatan Tata Kelola', 0, '2020-04-04', '2020-04-04', '-', '-', '-', '-', '', '', 0, '2020-04-04 16:45:21'),
(18, 8, 11, 'SOP-1000-101', 'SOP Penetapan Standar sistem penjaminan mutu', 0, '2020-04-04', '2020-04-04', '-', '-', '-', '-', '', '', 0, '2020-04-04 16:46:19'),
(19, 8, 11, 'SOP-1000-201', 'SOP Sosialisasi Kode Etik', 0, '2020-04-04', '2020-04-04', '-', '-', '-', '-', '', '', 0, '2020-04-04 16:46:59'),
(20, 8, 11, 'SOP-1000-202', 'SOP Pelaporan pelanggaran kode etik', 0, '2020-04-05', '2020-04-05', '-', '-', '-', '-', '', '', 0, '2020-04-04 20:09:41'),
(21, 8, 11, 'SOP-1000-203', 'SOP Penanganan  Permasalahan Terkait Penggaran Kode Etik', 0, '2020-04-05', '2020-04-05', '-', '-', '-', '-', '', '', 0, '2020-04-04 20:10:21'),
(22, 8, 11, 'SOP-1000-204', 'SOP Sosialisasi Kebijakan ', 0, '2020-04-05', '2020-04-05', '-', '-', '-', '-', '', '', 0, '2020-04-04 20:10:57'),
(23, 8, 11, 'SOP-1000-205', 'SOP Monitoring', 0, '2020-04-05', '2020-04-05', '-', '-', '-', '-', '', '', 0, '2020-04-04 20:11:29'),
(24, 8, 11, 'SOP-1000-206', 'SOP Pelaksanaan Survie Tingkat Kepuasan Mahasiswa', 0, '2020-04-05', '2020-04-05', '-', '-', '-', '-', '', '', 0, '2020-04-04 20:12:03'),
(25, 8, 11, 'SOP-100-300', 'SOP Evaluasi Standar sistem penjaminan mutu', 0, '2020-04-05', '2020-04-05', '-', '-', '-', '-', '', '', 0, '2020-04-04 20:12:35'),
(26, 8, 11, 'SOP-100-400', 'SOP Pengendalian Standar sistem penjaminan mutu', 0, '2020-04-05', '2020-04-05', '-', '-', '-', '-', '', '', 0, '2020-04-04 20:13:09'),
(27, 8, 11, 'SOP-100-500', 'SOP Peningkatan Standar sistem penjaminan mutu', 0, '2020-04-05', '2020-04-05', '-', '-', '-', '-', '', '', 0, '2020-04-04 20:13:43'),
(28, 25, 28, 'SOP-100-100', 'SOP Penetapan Standar Kompetensi Lulusan', 1, '2017-08-23', '2017-10-19', '-', 'Uus MD Fadli, Ir., SE, MM', 'Dr. H. Puji Isyanto, SE., MM', 'Dr. H. Dedi Mulyadi, SE., MM', '', '01_MP01-01_SOP_Penetapan_Standar_Kompetensi_Lulusan.pdf', 8, '2020-04-05 13:59:23'),
(29, 25, 28, 'SOP-100-201', 'SOP Penetapan Kompetensi Lulusan', 0, '2020-04-05', '2020-04-05', '-', '-', '-', '-', '', '', 8, '2020-04-05 00:28:47'),
(30, 25, 28, 'SOP-100-202', 'SOP Monitoring dan Evaluasi Kompetensi Lulusan', 0, '2020-04-05', '2020-04-05', '-', '-', '-', '-', '', '', 8, '2020-04-05 00:29:34'),
(31, 25, 28, 'SOP-100-300', 'SOP Evaluasi Standar Kompetensi Lulusan', 0, '2020-04-05', '2020-04-05', '-', '-', '-', '-', '', '', 8, '2020-04-05 00:30:20'),
(32, 25, 28, 'SOP-100-400', 'SOP Pengendalian Kompetensi Lulusan', 0, '2020-04-05', '2020-04-05', '-', '-', '-', '-', '', '', 8, '2020-04-05 00:30:57'),
(33, 25, 28, 'SOP-100-500', 'SOP Peningkatan Standar Kompetensi Lulusan', 0, '2020-04-05', '2020-04-05', '-', '-', '-', '-', '', '', 8, '2020-04-05 00:31:39');

-- --------------------------------------------------------

--
-- Table structure for table `standar`
--

CREATE TABLE `standar` (
  `id_standar` int(11) NOT NULL,
  `no_standar` varchar(50) NOT NULL,
  `deskripsi_standar` text NOT NULL,
  `revisi_standar` int(11) NOT NULL,
  `tgl_pembuatan` date NOT NULL,
  `tgl_berlaku` date NOT NULL,
  `penyimpanan` varchar(30) NOT NULL,
  `pembuat` varchar(100) NOT NULL,
  `pengendali` varchar(100) NOT NULL,
  `menyetujui` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `file` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `standar`
--

INSERT INTO `standar` (`id_standar`, `no_standar`, `deskripsi_standar`, `revisi_standar`, `tgl_pembuatan`, `tgl_berlaku`, `penyimpanan`, `pembuat`, `pengendali`, `menyetujui`, `keterangan`, `file`, `user_id`, `timestamp`) VALUES
(6, 'VMT-01', 'Standar Visi, Misi,Tujuan dan sasaran', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 15:57:53'),
(7, 'TKL-01', 'Standar Tata Kelola', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 15:58:28'),
(8, 'PJM-01', 'Standar Sistem Penjaminan Mutu', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 15:59:11'),
(9, 'PLU-01', 'Standar Pelayanan', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 15:59:56'),
(10, 'HMP-01', 'Standar Humas & Protokoler', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:00:42'),
(11, 'PKU-01', 'Standar Pengelolaan Keuangan', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:01:15'),
(12, 'MHS-01', 'Standar Kemahasiswaan', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:01:51'),
(13, 'CRT-01', 'Standar Carier Center', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:02:59'),
(14, 'AMN-01', 'Standar Alumni', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:03:32'),
(15, 'SDM-01', 'Standar Sumber Daya Manusia', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:04:07'),
(16, 'PTK-01', 'Standar Perpustakaan', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:04:46'),
(17, 'SIM-01', 'Standar Sistem Informasi', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:05:31'),
(18, 'MNE-01', 'Standar Monitoring dan Evaluasi', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:06:15'),
(19, 'KKS-01', 'Standar Kerjasama dan Kemitraan Strategis', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:06:52'),
(20, 'PSP-01', 'Standar Pengelolaan Sarana dan Prasarana', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:07:38'),
(21, 'KKK-01', 'Standar Kebersihan Lingkungan', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:08:10'),
(22, 'PIB-01', 'Standar Pengelolaan Inventaris Barang', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:08:46'),
(23, 'LAB-01', 'Standar Laboratorium', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:09:28'),
(24, 'TLS-01', 'Standar Tata Letak Naskah', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:10:09'),
(25, 'SPT-01', 'Standar  Kompetensi Lulusan', 1, '2017-08-15', '2017-09-18', '-', 'Santi Arum P.L., M.Pd', 'Dr. H. Puji Isyanto, SE., MM', 'Dr. H. Dedi Mulyadi, SE., MM', '-', '01_SPT01_Standar_Kompetensi_Lulusan.pdf', 8, '2020-04-04 20:23:32'),
(26, 'SPT-02', 'Standar Isi Pembelajaran', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:12:22'),
(27, 'SPT-03', 'Standar proses pembelajaran', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:13:50'),
(28, 'SPT-04', 'Standar penilaian pembelajaran', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:14:22'),
(29, 'SPT-05', 'Standar dosen dan tenaga kependidikan', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:15:30'),
(30, 'SPT-06', 'standar sarana dan prasarana pembelajaran', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:15:42'),
(31, 'SPT-07', 'Standar pengelolaan pembelajaran', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:16:48'),
(32, 'SPT-08', 'Standar pembiayaan pembelajaran', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:17:49'),
(33, 'SPL-01', 'Standar hasil penelitian', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:20:56'),
(34, 'SPL-02', 'Standar isi penelitian', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:21:20'),
(35, 'SPL-03', 'Standar proses penelitian', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:21:42'),
(36, 'SPL-04', 'Standar penilaian penelitian', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:22:06'),
(37, 'SPL-05', 'Standar peneliti', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:22:29'),
(38, 'SPL-06', 'Standar sarana dan prasarana penelitian', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:23:04'),
(39, 'SPL-07', 'Standar pengelolaan penelitian', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:23:36'),
(40, 'SPL-08', 'Standar pendanaan dan pembiayaan penelitian', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:24:02'),
(41, 'SPM-01', 'Standar hasil pengabdian kepada masyarakat', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:25:43'),
(42, 'SPM-02', 'Standar isi pengabdian kepada masyarakat', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:26:07'),
(43, 'SPM-03', 'Standar proses pengabdian kepada masyarakat', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:26:42'),
(44, 'SPM-04', 'Standar penilaian pengabdian kepada masyarakat', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:27:14'),
(45, 'SPM-05', 'Standar pelaksana pengabdian kepada masyarakat', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:27:41'),
(46, 'SPM-06', 'Standar sarana dan prasarana pengabdian kepada masyarakat', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:28:08'),
(47, 'SPM-07', 'Standar pengelolaan pengabdian kepada masyarakat', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:29:18'),
(48, 'SPM-08', 'Standar pendanaan dan pembiayaan pengabdian kepada masyarakat', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:29:46'),
(49, 'KMS-01', 'Standar hasil Kegiatan  Kemahasiswaan', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:31:46'),
(50, 'KMS-02', 'Standar proses Kegiatan Kemahasiswaan', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:32:17'),
(51, 'KMS-03', 'Standar penilaian Kegiatan Kemahasiswaan', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:32:46'),
(52, 'KMS-04', 'Standar pelaksana Kegiatan Kemahasiswaan', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:33:19'),
(53, 'KMS-05', 'Standar sarana dan prasarana Kegiatan  Kemahasiswaan', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:33:50'),
(54, 'KMS-06', 'Standar pengelolaan Kegiatan Kemahasiswaan', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:34:22'),
(55, 'KMS-07', 'Standar pendanaan dan pembiayaan Kegiatan Kemahasiswaan', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:35:04'),
(56, 'MHS-08', 'Standar Prestasi Kemahasiswaan', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:35:32'),
(59, 'LAB-02', 'Standar proses  Praktikum\r\n', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:41:49'),
(60, 'LAB-03', 'Standar penilaian Praktikum', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:42:19'),
(61, 'LAB-04', 'Standar pelaksana Praktikum', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:43:01'),
(62, 'LAB-05', 'Standar sarana dan prasarana Laboratorium', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:52:50'),
(63, 'LAB-06', 'Standar Infrastruktur Teknologi Informasi Laboratirium', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:43:57'),
(64, 'LAB-07', 'Standar Software/Aplikasi ', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:44:23'),
(65, 'PTK-02', 'Standar Isi', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:46:27'),
(66, 'PTK-03', 'Standar Proses', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:46:56'),
(67, 'PTK-04', 'Stancar Penilaiam', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:47:26'),
(68, 'PTK-05', 'Standar Pengelola', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:48:02'),
(69, 'PTK-06', 'Standar Sarana Prasarana Perpustakaan', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:52:09'),
(70, 'PTK-07', 'Standar Pengelolaan', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:49:10'),
(71, 'PTK-08', 'Standar Pendanaan', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:49:37'),
(72, 'PTK-09', 'Standar Software/Aplikasi ', 0, '2020-02-13', '2020-02-13', '-', '-', '-', '-', '', '', 0, '2020-02-13 16:50:06'),
(74, 'KAD-01', 'Kebijakan Akademik', 0, '2020-02-14', '2020-02-14', '-', '-', '-', '-', '', '', 0, '2020-02-13 17:03:49'),
(75, 'KNA-01', 'Kebijakan Non Akademik', 0, '2020-02-14', '2020-02-14', '-', '-', '-', '-', '', '', 0, '2020-02-13 17:04:18'),
(79, '08', 'oi', 0, '2020-06-24', '2020-06-09', '-', '-', '-', '-', '-', '', 28, '2020-06-21 14:05:34');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keputusan`
--

CREATE TABLE `surat_keputusan` (
  `id_sk` int(11) NOT NULL,
  `jenis_sk` varchar(512) NOT NULL,
  `no_sk` text NOT NULL,
  `tentang_sk` text NOT NULL,
  `tgl_berlaku_sk` date NOT NULL,
  `tgl_pengesahan_sk` date NOT NULL,
  `tembusan` text NOT NULL,
  `file` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp_sk` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `surat_tugas`
--

CREATE TABLE `surat_tugas` (
  `id_surat_tugas` int(11) NOT NULL,
  `no_st` text NOT NULL,
  `pemberi_tugas` text NOT NULL,
  `penerima_tugas` text NOT NULL,
  `tgl_pengesahan_st` date NOT NULL,
  `jenis_penugasan` text NOT NULL,
  `tgl_penugasan` date NOT NULL,
  `tempat_penugasan` text NOT NULL,
  `lama_penugasan` text NOT NULL,
  `file` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `timestamp_st` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `address` text NOT NULL,
  `bio_user` text NOT NULL,
  `no` varchar(128) NOT NULL,
  `email` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL,
  `phone` varchar(128) NOT NULL,
  `prodi_id` int(11) NOT NULL,
  `fakultas_id` int(11) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `address`, `bio_user`, `no`, `email`, `image`, `phone`, `prodi_id`, `fakultas_id`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(8, 'Ira Novia', '-', 'null', '-', 'ira@gmail.com', 'IMG_0349.jpg', '-', 0, 0, '$2y$10$TT9Nck9JXYJ.INZwFKv3j.dNp89M52Y7Qely4wiclsuWTHvXu2PPe', 2, 0, 1),
(9, 'Ilham Masykuri Hadi, MTCNA, NA', 'Bayur Kidul, Cilamaya Kulon, Karawang.', 'harap yang akan selalu berubah', '16416257201004', 'iam.ilhamhadi@gmail.com', 'IMG_0655.JPG', '+6282210243054', 0, 0, '$2y$10$tzprrdNm.xqFGZxIitUfrOalHxGJ4MgHba31iTHktjJLEpYrGYqfq', 1, 1, 1580632261),
(20, 'Cipta Ibnu Sokat', '-', 'null', '-', 'si16.ciptasokat@mhs.ubpkarawang.ac.id', 'IMG_8914.JPG', '-', 1, 1, '$2y$10$Q7Qov/UazTXRPmsY7UtWc.xtvoGvCE5dMecyebqwdrQk85wIY8MtS', 6, 0, 28),
(28, 'Staff LP3M', 'Jl HS, Ronggo Waluyo, Sukaharja, TelukJambe Timur, Karawang', '...', '001', 'stafflp3m@gmail.com', 'food.png', '021 - 000', 0, 0, '$2y$10$Y4S/pJkPGuhwQYZCAYVyuOzPqmbtQFoNsVwVIeqvfewqsg7mxXDX6', 2, 1, 1588947860),
(29, 'Dosen 1', 'Jl HS, Ronggo Waluyo, Sukaharja, TelukJambe Timur, Karawang', 'New Lecture', '002', 'dosen1@gmail.com', 'people.png', '021 - 001', 1, 1, '$2y$10$2DXU5cEB6GfYKFKjRG8l0udUye97XTLi1GQjbsR7E/VhqlQ4jibOK', 6, 1, 1589207700),
(30, 'Dosen 2', 'Jl HS, Ronggo Waluyo, Sukaharja, TelukJambe Timur, Karawang', 'Biiioooooo...', '003', 'dosen2@gmail.com', '009-coordinator.png', '021 - 002', 2, 1, '$2y$10$qwGYr97k0Ic.MDnAS7PYlu7mUUNEUHPGN5rWcxQfZMYFr2DOfLHI6', 6, 1, 12),
(31, 'Kaprodi SI', 'Jl HS, Ronggo Waluyo, Sukaharja, TelukJambe Timur, Karawang', '...', '004', 'kaprodisi@gmail.com', '015-lawyer.png', '021 - 003', 1, 1, '$2y$10$0SlD1iVSGrIX1U2iEYzdIemg6Fx6zuqHci0zAbG2It8vfsNktZPXe', 9, 1, 1589234763),
(32, 'Staff Tata Usaha Fakultas', 'Jl HS, Ronggo Waluyo, Sukaharja, TelukJambe Timur, Karawang', '...', '005', 'stafftu@gmail.com', '020-officer.png', '021 - 004', 0, 1, '$2y$10$JmPGRztkpsVo9m8WHaPi4O/fPpgnlRndgV16wzByHsQz7X3D5AorG', 14, 1, 1589244420),
(33, 'GKM Prodi SI', 'Jl HS, Ronggo Waluyo, Sukaharja, TelukJambe Timur, Karawang', '...', '006', 'gkm@gmail.com', '001-officer.png', '021 - 005', 1, 1, '$2y$10$x8w2jqgvtCL2pr7c6LSaIu3N8NaEHa2d5lgUFcMofyzqPJhBa9MkK', 13, 1, 1589264706),
(34, 'Asesor/Auditor', 'Jl HS, Ronggo Waluyo, Sukaharja, TelukJambe Timur, Karawang', '...', '007', 'aa@gmail.com', '003-researcher.png', '021 - 006', 0, 0, '$2y$10$TzxloDa/inD8IW7WXDcKTe12XyWOyDY.t4.23ky7f7cyvV.Hy4tk.', 12, 1, 1589284620);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(6, 1, 5),
(8, 1, 8),
(9, 1, 11),
(11, 7, 1),
(13, 1, 12),
(15, 5, 1),
(16, 6, 1),
(24, 2, 14),
(25, 2, 15),
(26, 2, 16),
(27, 2, 17),
(28, 1, 4),
(31, 6, 19),
(32, 12, 1),
(33, 6, 20),
(34, 6, 21),
(35, 6, 22),
(36, 6, 23),
(37, 9, 1),
(38, 9, 24),
(39, 9, 25),
(40, 9, 26),
(41, 9, 27),
(42, 9, 28),
(43, 12, 29),
(44, 12, 30),
(45, 12, 31),
(46, 12, 32),
(47, 12, 33),
(48, 10, 1),
(51, 13, 1),
(52, 11, 1),
(53, 14, 1),
(54, 14, 40),
(55, 14, 41),
(56, 14, 42),
(57, 14, 43),
(58, 14, 44),
(59, 13, 35),
(60, 13, 36),
(61, 13, 37),
(62, 13, 38),
(63, 13, 39),
(64, 2, 45),
(65, 2, 46),
(66, 2, 13),
(68, 6, 18),
(69, 1, 48),
(70, 2, 49);

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `id_user_log` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `log_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`id_user_log`, `user_id`, `message`, `log_timestamp`) VALUES
(1, 19, 'has been logout from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-04 17:10:19'),
(2, 19, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-04 17:10:29'),
(3, 19, 'update profile Alan Ruslan si16.alanruslan@mhs.ubpkarawang.ac.id Cikampek 162162572010xx 08xxx 1 1 IMG_0650.JPG', '2020-03-04 17:26:22'),
(4, 19, 'has changed the password', '2020-03-04 17:30:48'),
(6, 19, 'increase user to 6 Pengajuan Peningkatan Akun Menunggu verifikasi admin IMG_06501.JPG', '2020-03-04 17:37:03'),
(7, 19, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-05 13:22:21'),
(8, 19, 'add new data to the Pendidikan table 19202003051583414586 Data Dapodik 2018-2019 Ganjil UTS 3 8', '2020-03-05 13:23:06'),
(9, 19, 'deleted data 8 in the Pendidikan table', '2020-03-05 14:00:43'),
(10, 19, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-05 15:58:13'),
(11, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-06 13:29:07'),
(12, 9, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-06 15:05:32'),
(13, 8, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-06 15:05:41'),
(14, 8, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-06 15:05:57'),
(15, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-06 15:06:01'),
(16, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-07 01:35:46'),
(17, 9, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-07 04:18:13'),
(18, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-07 04:21:15'),
(19, 20, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-07 10:07:15'),
(20, 20, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-07 10:11:05'),
(21, 8, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-07 10:11:11'),
(22, 8, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-07 10:16:51'),
(23, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-07 10:16:59'),
(24, 9, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-07 10:17:22'),
(25, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-07 10:17:43'),
(26, 9, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-07 10:18:03'),
(27, 19, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-07 10:18:10'),
(28, 19, 'add new data to the Pendidikan_transaksi table 2 2 2 Baru 1806NA3698.pdf', '2020-03-07 10:18:52'),
(29, 19, 'add new data to the Pendidikan_transaksi table 2 3 6 Rekap form-bimbingan-proposal-tugas-akhir-2019-ftik.pdf', '2020-03-07 10:23:16'),
(30, 19, 'add new data to the Pendidikan table 19202003071583577860 Daryanto 2019-2020 Genap UTS 1 1', '2020-03-07 10:44:21'),
(31, 19, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-07 10:45:05'),
(32, 8, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-07 10:45:23'),
(33, 8, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-07 10:47:11'),
(34, 19, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-07 10:47:16'),
(35, 19, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-07 10:54:12'),
(36, 8, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-07 11:19:17'),
(37, 8, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-07 11:19:22'),
(38, 19, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-07 11:20:08'),
(39, 19, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-07 11:20:25'),
(40, 8, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-07 11:20:35'),
(41, 8, 'add new data to the Pendidikan table 8202003071583583076 Borang 2020 2020-2021 Genap UTS 1 1', '2020-03-07 12:11:16'),
(42, 19, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-07 12:48:03'),
(43, 8, 'add new data to the Pendidikan_transaksi table 1 2 1 Absensi Perwalian ', '2020-03-07 15:20:58'),
(44, 8, 'add new data to the Pendidikan table 8202003071583596168 Borang IF 2020-2021 Ganjil UTS 1 1', '2020-03-07 15:49:28'),
(45, 8, 'has updated the data in the Pendidikan table Borang IF 2020-2021 Ganjil UTS 1 2', '2020-03-07 15:55:56'),
(46, 8, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-07 17:24:13'),
(47, 8, 'has updated the data in the Pendidikan table Borang IF 2020-2021 2020-2021 UTS 1 2', '2020-03-07 17:24:30'),
(48, 8, 'has updated the data in the Pendidikan table Borang FBIS 2020-2021 2020-2021 UTS 2 6', '2020-03-07 17:30:32'),
(49, 8, 'has updated the data in the Pendidikan table Borang MN 2020-2021 2020-2021 UTS 2 6', '2020-03-07 17:30:50'),
(50, 8, 'add new data to the Pendidikan_transaksi table 8202003071583583076 2 2 - ', '2020-03-07 17:39:25'),
(51, 8, 'add new data to the Pendidikan_transaksi table 1 2 1 - ', '2020-03-07 17:41:41'),
(52, 8, 'add new data to the Pendidikan_transaksi table 1 2 2 - ', '2020-03-07 17:50:38'),
(53, 8, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-08 16:07:12'),
(54, 8, 'add new data to the Pendidikan table 8202003081583684198 Borang Hukum 2020 2019-2020 Ganjil UTS 4 9', '2020-03-08 16:16:38'),
(55, 8, 'has updated the data in the Pendidikan table Borang IF 2020-2021 2020-2021 UTS 1 2', '2020-03-08 16:28:15'),
(56, 8, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-08 16:28:27'),
(57, 19, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-08 16:28:34'),
(58, 19, 'edited the profile to Alan Ruslan si16.alanruslan@mhs.ubpkarawang.ac.id Cikampek 162162572010xx 08xxx 2 1 ', '2020-03-08 16:28:54'),
(59, 8, 'has been login from 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-03-08 16:31:17'),
(60, 19, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-08 17:01:37'),
(61, 19, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-08 17:01:41'),
(62, 19, 'edited the profile to Alan Ruslan si16.alanruslan@mhs.ubpkarawang.ac.id Cikampek 162162572010xx 08xxx 4 1 ', '2020-03-08 17:14:23'),
(63, 19, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-08 17:14:30'),
(64, 19, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-08 17:14:35'),
(65, 19, 'edited the profile to Alan Ruslan si16.alanruslan@mhs.ubpkarawang.ac.id Cikampek 162162572010xx 08xxx 2 1 ', '2020-03-08 17:14:53'),
(66, 19, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-08 17:14:59'),
(67, 19, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-08 17:15:04'),
(68, 8, 'add new data to the Pendidikan table 8202003081583688016 Borang IF 2 2019-2020 Ganjil UAS 1 2', '2020-03-08 17:20:16'),
(69, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-09 16:15:15'),
(70, 9, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-09 16:15:33'),
(71, 8, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-09 16:17:03'),
(72, 8, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-09 16:17:06'),
(73, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-09 16:17:56'),
(74, 9, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-09 16:19:14'),
(75, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-09 16:19:22'),
(76, 9, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-09 16:19:26'),
(77, 19, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-09 16:19:41'),
(78, 19, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-09 16:31:12'),
(79, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-09 17:16:08'),
(80, 9, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-09 17:16:12'),
(81, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-09 17:16:53'),
(82, 9, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-09 17:16:56'),
(83, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-09 17:19:52'),
(84, 9, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-09 17:19:55'),
(85, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-09 17:24:19'),
(86, 9, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-09 17:24:22'),
(87, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-10 15:04:55'),
(88, 9, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-10 15:06:36'),
(89, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-10 15:06:53'),
(90, 9, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-10 15:12:08'),
(91, 19, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-10 15:12:55'),
(92, 8, 'has been login from 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-03-10 15:13:27'),
(93, 8, 'logged out of the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-03-10 15:13:33'),
(94, 19, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-10 15:13:49'),
(95, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-10 15:13:55'),
(96, 9, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-10 15:14:13'),
(97, 19, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-10 15:14:19'),
(98, 19, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-10 15:15:28'),
(99, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-10 15:15:34'),
(100, 19, 'has been login from 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-03-10 15:16:25'),
(101, 9, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-10 15:43:21'),
(102, 8, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-10 15:43:26'),
(103, 8, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-10 15:43:39'),
(104, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-10 15:43:45'),
(105, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-11 08:42:47'),
(106, 9, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-11 09:09:42'),
(107, 8, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-11 09:12:08'),
(108, 8, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-11 09:37:26'),
(109, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-11 09:37:32'),
(110, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-11 10:47:45'),
(111, 9, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-11 11:26:03'),
(112, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-11 11:33:05'),
(113, 9, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-11 14:12:30'),
(114, 8, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-11 14:12:45'),
(115, 8, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-11 14:58:47'),
(116, 19, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-11 14:58:53'),
(117, 19, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-11 15:07:01'),
(118, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-11 15:07:37'),
(119, 9, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-11 15:11:04'),
(120, 19, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-11 15:11:10'),
(121, 19, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-11 18:25:43'),
(122, 19, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-11 18:26:12'),
(123, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-11 18:26:17'),
(124, 9, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-11 18:26:23'),
(125, 8, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-11 18:26:30'),
(126, 8, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-12 13:09:58'),
(127, 19, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-12 13:10:31'),
(128, 19, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-12 13:11:29'),
(129, 8, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-12 13:11:55'),
(130, 8, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-12 13:16:35'),
(131, 19, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-12 13:16:41'),
(132, 8, 'has been login from 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-03-12 13:40:38'),
(133, 19, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-12 14:43:31'),
(134, 8, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-12 14:43:36'),
(135, 8, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-12 14:56:57'),
(136, 19, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-12 14:57:05'),
(137, 8, 'has been login from 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-03-12 15:54:48'),
(138, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-12 19:10:55'),
(139, 9, 'has logged in from the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-03-12 19:22:23'),
(140, 9, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-12 19:22:34'),
(141, 21, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-12 19:22:50'),
(142, 21, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-12 19:23:57'),
(143, 21, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-12 19:24:05'),
(144, 21, 'edited the profile to Triyanto si16.triyantoo@mhs.ubpkarawang.ac.id - - - 2 1 ', '2020-03-12 21:03:30'),
(145, 21, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-12 21:03:39'),
(146, 21, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-12 21:03:55'),
(147, 9, 'has logged in from the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-03-13 15:10:05'),
(148, 21, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-13 15:55:33'),
(149, 8, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-13 15:55:48'),
(150, 8, 'add new data to the Pendidikan table 8202003131584114990 Borang Informatika 2019-2020 Genap UTS 1 2', '2020-03-13 15:56:30'),
(151, 9, 'logged out of the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-03-13 15:56:40'),
(152, 19, 'has been login from 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-03-13 15:56:54'),
(153, 8, 'has updated the data in the Pendidikan table Borang Informatika 2019-2020 Genap UTS 1 2', '2020-03-13 15:58:50'),
(154, 8, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-13 16:04:46'),
(155, 21, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-13 16:04:54'),
(156, 21, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-13 17:11:56'),
(157, 8, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-13 17:12:12'),
(158, 8, 'add new data to the Pendidikan table 8202003131584119571 Borang Informatika 2020-2021 Genap UAS 1 1', '2020-03-13 17:12:51'),
(159, 8, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-13 17:13:50'),
(160, 19, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-13 17:13:57'),
(161, 19, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-13 17:14:15'),
(162, 19, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-13 17:14:40'),
(163, 19, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-13 17:15:28'),
(164, 20, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-13 17:15:36'),
(165, 20, 'edited the profile to Cipta Ibnu Sokat si16.ciptasokat@mhs.ubpkarawang.ac.id - - - 2 1 ', '2020-03-13 17:15:55'),
(166, 20, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-13 17:16:03'),
(167, 20, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-13 17:16:11'),
(168, 20, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-13 17:18:26'),
(169, 21, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-13 17:18:33'),
(170, 21, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-13 18:48:36'),
(171, 8, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-13 18:48:43'),
(172, 8, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-13 18:50:34'),
(173, 21, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-13 18:50:43'),
(174, 21, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-13 19:10:44'),
(175, 9, 'has logged in from the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-03-13 20:15:04'),
(176, 21, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-14 04:17:55'),
(177, 22, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-14 04:18:20'),
(178, 22, 'edited the profile to Danti Pracoyo si16.dantipracoyo@mhs.ubpkarawang.ac.id - - - 2 1 ', '2020-03-14 04:21:17'),
(179, 22, 'edited the profile to Danti Pracoyo si16.dantipracoyo@mhs.ubpkarawang.ac.id - - - 2 1 ', '2020-03-14 04:28:01'),
(180, 22, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-14 04:28:13'),
(181, 22, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-14 04:28:45'),
(182, 22, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-14 04:29:58'),
(183, 19, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-14 04:30:06'),
(184, 19, 'edited the profile to Alan Ruslan si16.alanruslan@mhs.ubpkarawang.ac.id Cikampek 162162572010xx 08xxx 2 1 ', '2020-03-14 04:30:36'),
(185, 19, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-14 04:31:32'),
(186, 22, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-14 04:31:42'),
(187, 22, 'edited the profile to Danti Pracoyo si16.dantipracoyo@mhs.ubpkarawang.ac.id - - - 2 1 IMG_06501.JPG', '2020-03-14 04:32:03'),
(188, 22, 'edited the profile to Danti Pracoyo si16.dantipracoyo@mhs.ubpkarawang.ac.id - - - 2 1 ', '2020-03-14 04:33:43'),
(189, 22, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-14 04:33:53'),
(190, 20, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-14 04:34:02'),
(191, 20, 'edited the profile to Cipta Ibnu Sokat si16.ciptasokat@mhs.ubpkarawang.ac.id - - - 2 1 IMG_8914.JPG', '2020-03-14 04:34:21'),
(192, 20, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-14 04:58:09'),
(193, 19, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-14 04:58:40'),
(194, 19, 'edited the profile to Alan Ruslan si16.alanruslan@mhs.ubpkarawang.ac.id - - - 2 1 ', '2020-03-14 04:59:01'),
(195, 19, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-14 05:45:47'),
(196, 21, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-14 05:46:39'),
(197, 21, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-14 05:47:09'),
(198, 22, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-14 05:47:27'),
(199, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-16 16:00:32'),
(200, 9, 'edited the profile to Ilham Masykuri Hadi, MTCNA, NA iam.ilhamhadi@gmail.com Bayur Kidul, Cilamaya Kulon, Karawang. 16416257201004 +6282210243054 1 1 693738A0-2DEE-482E-BBF4-E4EB834DC929.JPG', '2020-03-16 16:03:15'),
(201, 9, 'edited the profile to Ilham Masykuri Hadi, MTCNA, NA iam.ilhamhadi@gmail.com Bayur Kidul, Cilamaya Kulon, Karawang. 16416257201004 +6282210243054 1 1 IMG_0655.JPG', '2020-03-16 16:03:32'),
(202, 9, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-16 16:05:36'),
(203, 8, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-16 16:05:46'),
(204, 8, 'edited the profile to Ira Novia ira@gmail.com - - - 1 1 IMG_0349.jpg', '2020-03-16 16:06:10'),
(205, 8, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-16 16:06:21'),
(206, 20, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-16 16:06:35'),
(207, 20, 'edited the profile to Cipta Ibnu Sokat si16.ciptasokat@mhs.ubpkarawang.ac.id - - - 1 1 IMG_8914.JPG', '2020-03-16 16:06:55'),
(208, 20, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-16 16:07:00'),
(209, 21, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-16 16:07:09'),
(210, 21, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-16 16:07:32'),
(211, 8, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-16 16:07:43'),
(212, 8, 'add new data to the Pendidikan table 8202003161584375018 Borang Sistem Informasi 2019-2020 Genap UTS 1 1', '2020-03-16 16:10:18'),
(213, 9, 'has logged in from the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-03-16 16:11:21'),
(214, 8, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-16 16:22:26'),
(215, 19, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-16 16:22:37'),
(216, 19, 'edited the profile to Alan Ruslan si16.alanruslan@mhs.ubpkarawang.ac.id - - - 1 1 ', '2020-03-16 16:23:04'),
(217, 19, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-16 16:23:12'),
(218, 19, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-16 16:23:20'),
(219, 19, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-16 17:06:43'),
(220, 20, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-16 17:07:18'),
(221, 8, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-17 13:01:03'),
(222, 8, 'add new data to the Pendidikan table 8202003171584450250 Borang Sistem Informasi 2020 2020-2021 Genap UTS 1 1', '2020-03-17 13:04:10'),
(223, 8, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-17 13:17:39'),
(224, 19, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-17 13:17:45'),
(225, 19, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-17 13:27:05'),
(226, 21, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-17 13:27:31'),
(227, 21, 'edited the profile to Triyanto si16.triyantoo@mhs.ubpkarawang.ac.id - - - 1 1 ', '2020-03-17 13:28:00'),
(228, 21, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-17 13:28:04'),
(229, 21, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-17 13:28:11'),
(230, 22, 'has been login from 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-03-17 14:08:02'),
(231, 22, 'edited the profile to Danti Pracoyo si16.dantipracoyo@mhs.ubpkarawang.ac.id - - - 1 1 ', '2020-03-17 14:08:16'),
(232, 22, 'logged out of the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-03-17 14:08:20'),
(233, 22, 'has been login from 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-03-17 14:08:39'),
(234, 22, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-17 16:10:33'),
(235, 22, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-17 16:35:06'),
(236, 21, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-17 16:35:15'),
(237, 21, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-17 16:35:53'),
(238, 19, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-17 16:35:58'),
(239, 19, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-17 16:38:28'),
(240, 21, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-17 16:38:38'),
(241, 21, 'edited the profile to Triyanto si16.triyantoo@mhs.ubpkarawang.ac.id - - - 1 1 IMG_0654.JPG', '2020-03-17 17:31:37'),
(242, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-18 09:52:15'),
(243, 9, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-18 09:54:06'),
(244, 8, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-18 09:54:55'),
(245, 8, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-18 09:55:17'),
(246, 19, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-18 09:55:25'),
(247, 19, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-18 09:55:45'),
(248, 21, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-18 09:55:52'),
(249, 21, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-18 09:56:13'),
(250, 22, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-18 09:56:22'),
(251, 22, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-18 09:56:44'),
(252, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-18 09:57:12'),
(253, 9, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-18 10:03:48'),
(254, 19, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-18 10:03:53'),
(255, 19, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-18 10:38:25'),
(256, 19, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-18 10:43:02'),
(257, 19, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-18 10:43:08'),
(258, 20, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-18 10:43:23'),
(259, 9, 'has logged in from the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-03-18 10:49:31'),
(260, 0, 'session timeout, user null', '2020-03-18 15:25:34'),
(261, 20, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-18 15:30:35'),
(262, 9, 'has logged in from the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-03-18 15:31:49'),
(263, 0, 'session timeout, user null', '2020-03-18 17:22:09'),
(264, 20, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-18 17:22:18'),
(265, 20, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-18 17:22:33'),
(266, 19, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-18 17:35:40'),
(267, 19, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-18 17:40:13'),
(268, 21, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-18 17:40:30'),
(269, 9, 'has logged in from the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-03-18 17:45:33'),
(270, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-18 18:52:21'),
(271, 9, 'edited the profile to Ilham Masykuri Hadi, MTCNA, NA iam.ilhamhadi@gmail.com Bayur Kidul, Cilamaya Kulon, Karawang. 16416257201004 +6282210243054 1 1 ', '2020-03-20 12:53:27'),
(272, 9, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-20 12:54:35'),
(273, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-20 12:54:41'),
(274, 9, 'edited the profile to Ilham Masykuri Hadi, MTCNA, NA iam.ilhamhadi@gmail.com Bayur Kidul, Cilamaya Kulon, Karawang. 16416257201004 +6282210243054 1 1 ', '2020-03-20 12:56:45'),
(275, 9, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-20 12:59:50'),
(276, 21, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-20 13:00:11'),
(277, 21, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-20 13:01:14'),
(278, 22, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-20 13:01:20'),
(279, 9, 'has logged in from the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-03-20 13:02:07'),
(280, 22, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-20 13:33:39'),
(281, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-20 14:13:27'),
(282, 9, 'logged out of the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-03-20 14:19:12'),
(283, 9, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-20 14:20:00'),
(284, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-20 17:48:03'),
(285, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-21 06:15:59'),
(286, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-21 10:14:46'),
(287, 9, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-21 10:15:43'),
(288, 8, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-21 10:15:50'),
(289, 8, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-21 10:18:33'),
(290, 19, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-21 10:18:40'),
(291, 19, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-21 10:19:06'),
(292, 21, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-21 10:19:19'),
(293, 21, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-21 10:19:23'),
(294, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-21 10:19:31'),
(295, 9, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-21 10:21:32'),
(296, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-21 12:52:09'),
(297, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-22 03:57:03'),
(298, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-22 14:09:55'),
(299, 9, 'edited the profile to Ilham Masykuri Hadi, MTCNA, NA iam.ilhamhadi@gmail.com Bayur Kidul, Cilamaya Kulon, Karawang. 16416257201004 +6282210243054 2 1 ', '2020-03-22 14:54:06'),
(300, 23, 'has been login from 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-03-22 14:55:11'),
(301, 23, 'edited the profile to Rizky Jawir mn16.rizkyjawir@mhs.ubpkarawang.ac.id - - - 6 2 ', '2020-03-22 14:55:42'),
(302, 23, 'logged out of the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-03-22 15:10:39'),
(303, 23, 'has been login from 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-03-22 15:17:16'),
(304, 23, 'logged out of the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-03-22 15:19:20'),
(305, 9, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-22 16:27:21'),
(306, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-23 12:10:42'),
(307, 8, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-27 13:24:02'),
(308, 8, 'add new data to the Pendidikan table 8202003271585315490 Borang SI 2020-2021 Ganjil UAS 1 1', '2020-03-27 13:24:50'),
(309, 8, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-27 13:27:11'),
(310, 19, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-27 13:27:59'),
(311, 19, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-27 13:31:20'),
(312, 21, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-27 13:31:27'),
(313, 21, 'logged out of the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-27 13:50:50'),
(314, 22, 'has been login from 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-27 13:51:46'),
(315, 9, 'has logged in from the address 127.0.0.1 using Firefox 72.0 os Mac OS X', '2020-03-28 00:14:05'),
(316, 9, 'has logged in from the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-01 11:33:44'),
(317, 9, 'logged out of the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-01 12:52:21'),
(318, 8, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-01 12:52:29'),
(319, 9, 'has logged in from the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-01 17:17:37'),
(320, 8, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-02 01:35:07'),
(321, 8, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-02 03:01:01'),
(322, 8, 'add new data to the Pendidikan table 8202004021585796535 Borang Management 2019-2020 Ganjil UTS 2 6', '2020-04-02 03:02:15'),
(323, 8, 'add new data to the Pendidikan_transaksi table 6 2 1 dddd ', '2020-04-03 16:18:01'),
(324, 8, 'logged out of the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-03 16:25:15'),
(325, 9, 'has logged in from the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-03 16:25:22'),
(326, 8, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-03 16:32:17'),
(327, 0, 'session timeout, user null', '2020-04-04 00:28:22'),
(328, 8, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-04 00:31:16'),
(329, 8, 'logged out of the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-04 00:58:41'),
(330, 21, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-04 00:58:51'),
(331, 21, 'logged out of the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-04 01:03:43'),
(332, 8, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-04 01:03:51'),
(333, 8, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-04 19:49:18'),
(334, 8, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-05 00:23:23'),
(335, 8, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-05 17:56:28'),
(336, 8, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-06 17:52:38'),
(337, 19, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-07 13:28:47'),
(338, 19, 'logged out of the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-07 13:29:19'),
(339, 8, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-07 13:29:26'),
(340, 8, 'logged out of the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-07 13:33:51'),
(341, 19, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-07 13:33:59'),
(342, 8, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-07 13:34:24'),
(343, 8, 'logged out of the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-07 14:02:20'),
(344, 19, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-07 14:02:27'),
(345, 19, 'logged out of the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-07 14:02:40'),
(346, 21, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-07 14:02:46'),
(347, 21, 'logged out of the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-07 14:28:57'),
(348, 22, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-07 14:29:04'),
(349, 22, 'logged out of the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-07 14:37:39'),
(350, 22, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-07 14:38:25'),
(351, 22, 'logged out of the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-07 14:49:34'),
(352, 19, 'logged out of the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-07 14:49:37'),
(353, 9, 'has logged in from the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-07 14:49:45'),
(354, 24, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-07 14:51:47'),
(355, 24, 'logged out of the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-07 17:32:55'),
(356, 9, 'has logged in from the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-07 17:34:27'),
(357, 9, 'increase user to 1 Pengajuan Akun Menunggu verifikasi admin 4_ktp_page-0001.jpg', '2020-04-07 17:39:37'),
(358, 22, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-10 06:48:22'),
(359, 22, 'logged out of the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-10 07:49:40'),
(360, 8, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-10 07:49:58'),
(361, 8, 'logged out of the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-10 07:55:41'),
(362, 19, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-10 07:55:49'),
(363, 19, 'logged out of the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-10 09:17:19'),
(364, 22, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-10 09:17:27'),
(365, 9, 'has logged in from the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-10 13:25:43'),
(366, 9, 'logged out of the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-10 13:26:58'),
(367, 22, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-10 13:27:06'),
(368, 9, 'has logged in from the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-10 16:05:28'),
(369, 22, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-10 18:12:51'),
(370, 22, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-11 04:21:12'),
(371, 22, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-11 12:47:59'),
(372, 22, 'logged out of the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-11 14:38:43'),
(373, 9, 'has logged in from the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-11 14:38:50'),
(374, 9, 'logged out of the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-11 14:56:37'),
(375, 22, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-11 14:56:46'),
(376, 22, 'logged out of the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-11 15:27:28'),
(377, 8, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-11 15:27:41'),
(378, 8, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-11 19:33:47'),
(379, 8, 'add new data to the Pendidikan table 8202004111586634046 Borang Sistem Informasi 2020-2021 Ganjil UTS 1 1', '2020-04-11 19:40:46'),
(380, 8, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-12 05:48:56'),
(381, 8, 'deleted data  in the Pendidikan_transaksi table', '2020-04-12 14:26:45'),
(382, 8, 'deleted data 1 in the Pendidikan table', '2020-04-12 14:32:16'),
(383, 8, 'add new data to the Pendidikan table 8202004121586702912 Mbuhh 2020-2021 Genap UTS 1 1', '2020-04-12 14:48:32'),
(384, 8, 'deleted data 2 in the Pendidikan table', '2020-04-12 14:48:53'),
(385, 8, 'add new data to the Pendidikan table 8202004121586703237 Borang 2019-2020 Genap UTS 1 1', '2020-04-12 14:53:57'),
(386, 8, 'logged out of the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-12 15:05:19'),
(387, 9, 'has logged in from the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-12 15:27:59'),
(388, 9, 'logged out of the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-12 15:45:45'),
(389, 25, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-12 15:45:58'),
(390, 25, 'edited the profile to Anisa Jubaedah si16.anisajubaedah@mhs.ubpkarawang.ac.id - - - 0 1 ', '2020-04-12 15:47:15'),
(391, 9, 'has logged in from the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-12 15:48:19'),
(392, 9, 'logged out of the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-12 15:55:45'),
(393, 19, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-12 15:55:53'),
(394, 19, 'logged out of the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-12 15:56:00'),
(395, 9, 'has logged in from the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-12 15:56:08'),
(396, 25, 'logged out of the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-12 16:10:38'),
(397, 25, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-12 16:10:46'),
(398, 25, 'logged out of the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-12 16:11:41'),
(399, 19, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-12 16:11:48'),
(400, 19, 'logged out of the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-12 16:12:48'),
(401, 25, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-12 16:12:59'),
(402, 25, 'logged out of the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-12 16:38:23'),
(403, 25, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-12 16:38:43'),
(404, 9, 'logged out of the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-12 16:47:06'),
(405, 19, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-12 16:47:18'),
(406, 0, 'session timeout, user null', '2020-04-13 13:20:03'),
(407, 9, 'has logged in from the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-13 13:20:11'),
(408, 9, 'logged out of the address 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-13 14:30:48'),
(409, 8, 'has been login from 127.0.0.1 using Firefox 74.0 os Mac OS X', '2020-04-13 15:40:55'),
(410, 8, 'increase user to 2 pengajuan akun Menunggu verifikasi admin 4_ktp_page-00011.jpg', '2020-04-13 15:52:48'),
(411, 8, 'logged out of the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-13 17:40:36'),
(412, 9, 'has logged in from the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-13 17:40:43'),
(413, 9, 'logged out of the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-13 18:28:48'),
(414, 8, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-13 18:28:56'),
(415, 8, 'logged out of the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-13 19:46:03'),
(416, 9, 'has logged in from the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-13 19:46:10'),
(417, 22, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-14 12:44:49'),
(418, 22, 'logged out of the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-14 12:45:02'),
(419, 8, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-14 12:45:15'),
(420, 22, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-14 12:45:39'),
(421, 8, 'add new data to the Pendidikan table 8202004141586868379 Borang terbari sisstem informasi 2020-2021 Ganjil UTS 1 1', '2020-04-14 12:46:19'),
(422, 8, 'logged out of the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-14 12:47:21'),
(423, 19, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-14 12:47:28'),
(424, 19, 'logged out of the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-14 13:14:02'),
(425, 21, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-14 13:14:10'),
(426, 22, 'logged out of the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-14 13:20:07'),
(427, 19, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-14 13:20:14'),
(428, 21, 'logged out of the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-14 13:39:12'),
(429, 22, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-14 13:39:24'),
(430, 19, 'logged out of the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-14 13:51:18'),
(431, 19, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-14 13:51:28'),
(432, 19, 'logged out of the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-14 13:52:11'),
(433, 21, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-14 13:52:22'),
(434, 21, 'logged out of the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-14 14:21:08'),
(435, 9, 'has logged in from the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-04-14 14:21:38'),
(436, 9, 'has logged in from the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-14 14:21:46'),
(437, 9, 'logged out of the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-14 14:21:49'),
(438, 19, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-14 14:21:58'),
(439, 9, 'has logged in from the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-04-14 17:50:35'),
(440, 22, 'logged out of the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-14 19:12:08'),
(441, 9, 'has logged in from the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-14 19:12:17'),
(442, 9, 'logged out of the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-14 19:37:46'),
(443, 8, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-14 19:40:04'),
(444, 8, 'add new data to the Pendidikan table 8202004141586894079 Borang Sistem Informasi 2020-2021 Genap UTS 1 1', '2020-04-14 19:54:39'),
(445, 8, 'add new data to the Pendidikan_transaksi table 5 2 1  ', '2020-04-14 19:58:45'),
(446, 8, 'add new data to the Pendidikan_transaksi table 5 3 11  ', '2020-04-14 19:59:04'),
(447, 8, 'deleted data  in the Pendidikan_transaksi table', '2020-04-14 19:59:44'),
(448, 8, 'deleted data  in the Pendidikan_transaksi table', '2020-04-14 19:59:54'),
(449, 8, 'logged out of the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-14 20:12:36'),
(450, 19, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-14 20:12:50'),
(451, 19, 'logged out of the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-14 20:16:05'),
(452, 21, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-14 20:16:27'),
(453, 21, 'logged out of the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-14 20:24:29'),
(454, 22, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-14 20:24:39'),
(455, 22, 'logged out of the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-14 20:36:54'),
(456, 19, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-14 20:37:03'),
(457, 19, 'logged out of the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-14 20:39:48'),
(458, 22, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-14 20:39:57'),
(459, 8, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-15 09:22:58'),
(460, 9, 'has logged in from the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-15 09:23:34'),
(461, 9, 'has logged in from the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-15 12:55:41'),
(462, 9, 'logged out of the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-15 14:39:21'),
(463, 19, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-15 14:39:31'),
(464, 19, 'logged out of the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-15 14:52:51'),
(465, 9, 'has logged in from the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-15 14:52:59'),
(466, 8, 'add new data to the Pendidikan table 8202004151586962840 Borang Triwulan Sistem Informasi 2020-2021 Genap UTS 1 1', '2020-04-15 15:00:40'),
(467, 9, 'logged out of the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-15 15:01:52'),
(468, 21, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-15 15:02:02'),
(469, 21, 'logged out of the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-15 15:04:18'),
(470, 22, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-15 15:04:27'),
(471, 8, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-16 03:20:18'),
(472, 8, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-16 07:42:02'),
(473, 8, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-18 12:29:14'),
(474, 8, 'logged out of the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-18 12:32:55'),
(475, 8, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-18 12:33:09'),
(476, 8, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-19 03:26:47'),
(477, 8, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-19 11:32:05'),
(478, 8, 'add new data to the Pendidikan table 8202004191587308095 ... 2020-2021 Ganjil UTS 1 1', '2020-04-19 14:54:55'),
(479, 8, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-22 12:26:30'),
(480, 9, 'has logged in from the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-22 12:29:33'),
(481, 9, 'has logged in from the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-22 14:59:04'),
(482, 8, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-23 14:23:24'),
(483, 9, 'has logged in from the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-23 14:24:04'),
(484, 8, 'add new data to the Pendidikan table 8202004231587655525 borang 2020-2021 Ganjil UTS 1 1', '2020-04-23 15:25:25'),
(485, 8, 'has updated the data in the Pendidikan table borang 2020-2021 Ganjil UTS 1 1', '2020-04-23 15:26:49');
INSERT INTO `user_log` (`id_user_log`, `user_id`, `message`, `log_timestamp`) VALUES
(486, 8, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-26 16:32:04'),
(487, 9, 'has logged in from the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-04-26 16:35:45'),
(488, 8, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-28 10:11:23'),
(489, 8, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-29 12:23:04'),
(490, 8, 'has updated the data in the Pendidikan table borang 2020-2021 Ganjil UTS 1 1', '2020-04-29 12:37:13'),
(491, 8, 'has updated the data in the Pendidikan table ... 2020-2021 Ganjil UTS 1 1', '2020-04-29 12:37:25'),
(492, 9, 'has logged in from the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-04-29 12:44:55'),
(493, 8, 'logged out of the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-29 12:50:21'),
(494, 8, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-29 12:50:28'),
(495, 8, 'add new data to the Pendidikan table 8202004291588174671 - 2020-2021 Genap UTS 1 1', '2020-04-29 15:37:51'),
(496, 8, 'has updated the data in the Pendidikan table - 2020-2021 Genap UTS 1 1', '2020-04-29 15:38:01'),
(497, 8, 'has updated the data in the Pendidikan table borang 2020-2021 Ganjil UTS 1 1', '2020-04-29 16:06:56'),
(498, 8, 'has updated the data in the Pendidikan table borang 2020-2021 Ganjil UTS 1 1', '2020-04-29 16:10:50'),
(499, 8, 'has updated the data in the Pendidikan table borang 2020-2021 Ganjil UTS 1 1', '2020-04-29 16:11:14'),
(500, 8, 'has updated the data in the Pendidikan table - 2020-2021 Genap UTS 1 1', '2020-04-29 16:11:38'),
(501, 8, 'has updated the data in the Pendidikan table ... 2020-2021 Ganjil UTS 1 1', '2020-04-29 16:11:50'),
(502, 8, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-29 21:00:30'),
(503, 8, 'has updated the data in the Pendidikan table - 2020-2021 Genap UTS 1 1', '2020-04-29 21:48:42'),
(504, 8, 'has updated the data in the Pendidikan table ... 2020-2021 Ganjil UTS 1 1', '2020-04-29 21:49:07'),
(505, 9, 'has logged in from the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-04-29 21:57:28'),
(506, 8, 'has updated the data in the Pendidikan table borang 2020-2021 Ganjil UTS 1 1', '2020-04-29 22:11:03'),
(507, 8, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-30 01:59:29'),
(508, 9, 'has logged in from the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-04-30 02:48:41'),
(509, 8, 'has updated the data in the Pendidikan table borang 2020-2021 Ganjil UTS 1 1', '2020-04-30 03:09:44'),
(510, 8, 'has updated the data in the Pendidikan table borang 2020-2021 Ganjil UTS 1 1', '2020-04-30 03:11:30'),
(511, 8, 'has updated the data in the Pendidikan table borang 2020-2021 Ganjil UTS 1 1', '2020-04-30 03:15:42'),
(512, 22, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-30 03:16:44'),
(513, 8, 'has updated the data in the Pendidikan table borang 2020-2021 Ganjil UTS 1 1', '2020-04-30 04:10:17'),
(514, 8, 'has updated the data in the Pendidikan table borang 2020-2021 Ganjil UTS 1 1', '2020-04-30 04:12:37'),
(515, 8, 'has updated the data in the Pendidikan table borang 2020-2021 Ganjil UTS 1 1', '2020-04-30 04:44:38'),
(516, 8, 'has updated the data in the Pendidikan table borang 2020-2021 Ganjil UTS 1 1', '2020-04-30 06:02:18'),
(517, 8, 'has updated the data in the Pendidikan table borang 2020-2021 Ganjil UTS 1 1', '2020-04-30 06:04:14'),
(518, 8, 'has updated the data in the Pendidikan table borang 2020-2021 Ganjil UTS 1 1', '2020-04-30 06:28:20'),
(519, 8, 'has updated the data in the Pendidikan table borang 2020-2021 Ganjil UTS 1 1', '2020-04-30 06:36:59'),
(520, 8, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-04-30 07:26:41'),
(521, 9, 'has logged in from the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-04-30 08:47:48'),
(522, 8, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-01 14:33:12'),
(523, 8, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-01 15:07:55'),
(524, 8, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-01 16:57:40'),
(525, 8, 'add new data to the Pendidikan table 8202005011588354577 Borang/TW1/SI/2020 2020-2021 Ganjil UTS 1 1', '2020-05-01 17:36:18'),
(526, 8, 'has updated the data in the Pendidikan table Borang/TW1/SI/2020 2020-2021 Ganjil UTS 1 1', '2020-05-01 18:06:49'),
(527, 8, 'has updated the data in the Pendidikan table Borang/TW1/SI/2020 2020-2021 Ganjil UTS 1 1', '2020-05-01 18:31:00'),
(528, 8, 'has updated the data in the Pendidikan table Borang/TW1/SI/2020 2020-2021 Ganjil UTS 1 1', '2020-05-01 19:17:18'),
(529, 8, 'logged out of the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-01 19:27:11'),
(530, 0, 'session timeout, user null', '2020-05-01 19:47:26'),
(531, 8, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-01 19:50:25'),
(532, 8, 'has updated the data in the Pendidikan table Borang/TW1/SI/2020 2020-2021 Ganjil UTS 1 1', '2020-05-02 10:01:56'),
(533, 8, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-02 12:38:39'),
(534, 8, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-03 04:26:53'),
(535, 8, 'has updated the data in the Pendidikan table Borang/TW1/SI/2020 2020-2021 Ganjil UTS 1 1', '2020-05-03 04:30:20'),
(536, 8, 'has updated the data in the Pendidikan table Borang/TW1/SI/2020 2020-2021 Ganjil UTS 1 1', '2020-05-03 06:24:24'),
(537, 8, 'has updated the data in the Pendidikan table Borang/TW1/SI/2020 2020-2021 Ganjil UTS 1 1', '2020-05-03 06:31:44'),
(538, 8, 'has updated the data in the Pendidikan table Borang/TW1/SI/2020 2020-2021 Ganjil UTS 1 1', '2020-05-03 06:35:45'),
(539, 8, 'has updated the data in the Pendidikan table Borang/TW1/SI/2020 2020-2021 Ganjil UTS 1 1', '2020-05-03 06:56:39'),
(540, 9, 'has logged in from the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-05-03 06:57:49'),
(541, 8, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-03 10:29:31'),
(542, 8, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-04 00:58:36'),
(543, 9, 'has logged in from the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-06 12:56:34'),
(544, 9, 'logged out of the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-06 12:58:20'),
(545, 8, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-06 12:58:26'),
(546, 8, 'logged out of the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-06 13:32:10'),
(547, 9, 'has logged in from the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-06 13:32:18'),
(548, 9, 'logged out of the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-06 13:34:26'),
(549, 8, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-06 13:34:32'),
(550, 8, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-07 07:34:44'),
(551, 8, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-07 21:36:15'),
(552, 0, 'session timeout, user null', '2020-05-08 09:36:40'),
(553, 9, 'has logged in from the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-08 09:36:46'),
(554, 0, 'session timeout, user null', '2020-05-08 13:21:51'),
(555, 8, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-08 13:21:58'),
(556, 8, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-08 14:22:45'),
(557, 8, 'logged out of the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-08 14:23:33'),
(558, 9, 'has logged in from the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-08 14:23:39'),
(559, 9, 'logged out of the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-08 14:24:37'),
(560, 28, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-08 14:24:45'),
(561, 28, 'edited the profile to Staff LP3M stafflp3m@gmail.com Jl HS, Ronggo Waluyo, Sukaharja, TelukJambe Timur, Karawang 001 021 - 000 0 0 food.png', '2020-05-08 14:28:46'),
(562, 28, 'has updated the data in the Pendidikan table Borang/TW1/SI/2020 2020-2021 Ganjil UTS 1 1', '2020-05-09 07:02:44'),
(563, 28, 'has updated the data in the Pendidikan table Borang/TW1/SI/2020 2020-2021 Ganjil UTS 1 1', '2020-05-09 08:01:14'),
(564, 28, 'has updated the data in the Pendidikan table Borang/TW1/SI/2020 2020-2021 Ganjil UTS 1 1', '2020-05-09 08:18:25'),
(565, 28, 'has updated the data in the Pendidikan table Borang/TW1/SI/2020 2020-2021 Ganjil UTS 1 1', '2020-05-09 08:32:28'),
(566, 28, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-09 10:06:37'),
(567, 28, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-10 14:35:25'),
(568, 28, 'has updated the data in the Pendidikan table Borang/TW1/SI/2020 2020-2021 Ganjil UTS 1 1', '2020-05-10 14:39:46'),
(569, 8, 'has been login from 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-05-10 15:53:44'),
(570, 28, 'has updated the data in the Pendidikan table Borang/TW1/SI/2020 2020-2021 Ganjil UTS 1 1', '2020-05-10 16:07:56'),
(571, 28, 'has updated the data in the Pendidikan table Borang/TW1/SI/2020 2020-2021 Ganjil UTS 1 1', '2020-05-10 16:13:46'),
(572, 28, 'has updated the data in the Pendidikan table Borang/TW1/SI/2020 2020-2021 Ganjil UTS 1 1', '2020-05-10 16:17:07'),
(573, 28, 'has updated the data in the Pendidikan table Borang/TW1/SI/2020 2020-2021 Ganjil UTS 1 1', '2020-05-10 16:19:23'),
(574, 9, 'has logged in from the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-05-11 14:33:03'),
(575, 29, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-11 14:35:37'),
(576, 29, 'edited the profile to Dosen 1 dosen1@gmail.com Jl HS, Ronggo Waluyo, Sukaharja, TelukJambe Timur, Karawang 002 021 - 001 1 1 people.png', '2020-05-11 14:39:21'),
(577, 29, 'logged out of the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-11 14:49:17'),
(578, 28, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-11 14:49:24'),
(579, 28, 'logged out of the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-11 15:03:29'),
(580, 29, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-11 15:04:46'),
(581, 29, 'logged out of the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-11 15:32:42'),
(582, 29, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-11 15:32:57'),
(583, 9, 'logged out of the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-05-11 16:18:18'),
(584, 28, 'has been login from 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-05-11 16:18:30'),
(585, 28, 'add new data to the Pendidikan table 28202005111589213972 BorangSI/2020/TW1/UTS 2020-2021 Ganjil UTS 1 2', '2020-05-11 16:19:32'),
(586, 28, 'has updated the data in the Pendidikan table BorangSI/2020/TW1/UTS 2020-2021 Ganjil UTS 1 1', '2020-05-11 16:19:50'),
(587, 9, 'has logged in from the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-11 16:43:39'),
(588, 9, 'logged out of the address 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-11 16:44:29'),
(589, 28, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-11 16:44:36'),
(590, 28, 'logged out of the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-05-11 16:44:42'),
(591, 9, 'has logged in from the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-05-11 16:44:52'),
(592, 28, 'has updated the data in the Pendidikan table Borang/TW1/SI/2020 2020-2021 Ganjil UTS 1 1', '2020-05-11 17:07:26'),
(593, 29, 'has been login from 127.0.0.1 using Firefox 75.0 os Mac OS X', '2020-05-11 21:22:16'),
(594, 9, 'has logged in from the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-05-11 21:26:42'),
(595, 9, 'logged out of the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-05-11 21:27:37'),
(596, 28, 'has been login from 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-05-11 21:27:58'),
(597, 28, 'has updated the data in the Pendidikan table Borang/TW1/SI/2020 2020-2021 Ganjil UTS 1 1', '2020-05-11 21:28:14'),
(598, 29, 'logged out of the address 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-11 22:00:33'),
(599, 9, 'has logged in from the address 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-11 22:00:57'),
(600, 9, 'logged out of the address 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-11 22:02:02'),
(601, 30, 'has been login from 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-11 22:02:11'),
(602, 30, 'edited the profile to Dosen 2 dosen2@gmail.com Jl HS, Ronggo Waluyo, Sukaharja, TelukJambe Timur, Karawang 003 021 - 002 2 1 006-waiter.png', '2020-05-11 22:03:13'),
(603, 30, 'logged out of the address 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-11 22:03:21'),
(604, 30, 'has been login from 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-11 22:04:00'),
(605, 30, 'logged out of the address 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-11 22:05:01'),
(606, 9, 'has logged in from the address 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-11 22:05:08'),
(607, 9, 'logged out of the address 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-11 22:06:56'),
(608, 31, 'has been login from 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-11 22:07:07'),
(609, 31, 'edited the profile to Kaprodi SI kaprodisi@gmail.com Jl HS, Ronggo Waluyo, Sukaharja, TelukJambe Timur, Karawang 004 021 - 003 1 1 015-lawyer.png', '2020-05-11 22:08:24'),
(610, 31, 'logged out of the address 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-11 22:11:28'),
(611, 9, 'has logged in from the address 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-11 22:11:37'),
(612, 9, 'logged out of the address 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-11 22:12:58'),
(613, 31, 'has been login from 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-11 22:13:04'),
(614, 9, 'has logged in from the address 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-12 00:28:46'),
(615, 9, 'logged out of the address 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-12 00:48:26'),
(616, 32, 'has been login from 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-12 00:48:36'),
(617, 9, 'has logged in from the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-05-12 00:49:24'),
(618, 32, 'edited the profile to Staff Tata Usaha Fakultas stafftu@gmail.com Jl HS, Ronggo Waluyo, Sukaharja, TelukJambe Timur, Karawang 005 021 - 004 0 1 020-officer.png', '2020-05-12 01:05:13'),
(619, 32, 'logged out of the address 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-12 01:29:54'),
(620, 32, 'has been login from 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-12 01:30:02'),
(621, 9, 'logged out of the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-05-12 01:35:17'),
(622, 28, 'has been login from 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-05-12 01:35:27'),
(623, 28, 'add new data to the Pendidikan table 28202005121589247366 BORANG/IF/2020/TW1 2020-2021 Ganjil UTS 1 2', '2020-05-12 01:36:06'),
(624, 28, 'logged out of the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-05-12 01:48:06'),
(625, 9, 'has logged in from the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-05-12 01:48:30'),
(626, 9, 'logged out of the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-05-12 02:12:36'),
(627, 28, 'has been login from 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-05-12 02:12:53'),
(628, 28, 'has updated the data in the Pendidikan table BORANG/IF/2020/TW1 2020-2021 Ganjil UTS 1 2', '2020-05-12 02:13:53'),
(629, 28, 'has updated the data in the Pendidikan table BORANG/IF/2020/TW1 2020-2021 Ganjil UTS 1 2', '2020-05-12 02:35:25'),
(630, 28, 'logged out of the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-05-12 02:59:50'),
(631, 9, 'has logged in from the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-05-12 02:59:58'),
(632, 32, 'logged out of the address 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-12 03:33:57'),
(633, 31, 'has been login from 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-12 03:34:13'),
(634, 9, 'logged out of the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-05-12 04:29:58'),
(635, 28, 'has been login from 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-05-12 04:30:10'),
(636, 28, 'add new data to the Pendidikan table 28202005121589257860 Borang/SI/2020 2020-2021 Ganjil UTS 1 1', '2020-05-12 04:31:00'),
(637, 28, 'has updated the data in the Pendidikan table Borang/SI/2020 2020-2021 Ganjil UTS 1 1', '2020-05-12 04:32:40'),
(638, 28, 'has updated the data in the Pendidikan table Borang/SI/2020 2020-2021 Ganjil UTS 1 1', '2020-05-12 04:35:03'),
(639, 28, 'logged out of the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-05-12 04:42:21'),
(640, 9, 'has logged in from the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-05-12 04:42:28'),
(641, 0, 'session timeout, user null', '2020-05-12 06:22:33'),
(642, 9, 'has logged in from the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-05-12 06:22:50'),
(643, 9, 'has logged in from the address 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-12 06:24:29'),
(644, 9, 'logged out of the address 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-12 06:27:02'),
(645, 33, 'has been login from 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-12 06:27:09'),
(646, 33, 'edited the profile to GKM Prodi gkm@gmail.com Jl HS, Ronggo Waluyo, Sukaharja, TelukJambe Timur, Karawang 006 021 - 005 1 1 001-officer.png', '2020-05-12 06:28:00'),
(647, 33, 'edited the profile to GKM Prodi SI gkm@gmail.com Jl HS, Ronggo Waluyo, Sukaharja, TelukJambe Timur, Karawang 006 021 - 005 1 1 ', '2020-05-12 06:29:27'),
(648, 31, 'has been login from 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-12 09:03:15'),
(649, 31, 'logged out of the address 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-12 09:24:49'),
(650, 9, 'has logged in from the address 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-12 09:24:56'),
(651, 9, 'logged out of the address 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-12 09:25:05'),
(652, 33, 'has been login from 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-12 09:25:11'),
(653, 28, 'has been login from 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-05-12 09:32:28'),
(654, 28, 'logged out of the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-05-12 09:32:37'),
(655, 9, 'has logged in from the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-05-12 09:32:42'),
(656, 0, 'session timeout, user null', '2020-05-12 11:53:55'),
(657, 9, 'has logged in from the address 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-12 11:54:02'),
(658, 9, 'logged out of the address 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-12 11:57:40'),
(659, 34, 'has been login from 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-12 11:57:54'),
(660, 9, 'has logged in from the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-05-12 12:01:39'),
(661, 34, 'edited the profile to Asesor/Auditor aa@gmail.com Jl HS, Ronggo Waluyo, Sukaharja, TelukJambe Timur, Karawang 007 021 - 006 0 0 003-researcher.png', '2020-05-12 13:14:15'),
(662, 34, 'logged out of the address 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-12 13:30:00'),
(663, 28, 'has been login from 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-12 13:30:07'),
(664, 28, 'has updated the data in the Pendidikan table Borang/TW1/SI/2020 2020-2021 Ganjil UTS 1 1', '2020-05-12 13:33:40'),
(665, 28, 'has updated the data in the Pendidikan table Borang/TW1/SI/2020 2020-2021 Ganjil UTS 1 1', '2020-05-12 13:40:17'),
(666, 28, 'has updated the data in the Pendidikan table BorangSI/2020/TW1/UTS 2020-2021 Ganjil UTS 1 1', '2020-05-12 13:40:53'),
(667, 28, 'add new data to the Pendidikan table 28202005121589292319 Borang Lagi 2020-2021 Ganjil UTS 1 1', '2020-05-12 14:05:19'),
(668, 28, 'has updated the data in the Pendidikan table Borang Lagi 2020-2021 Ganjil UTS 1 1', '2020-05-12 14:06:42'),
(669, 28, 'has been login from 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-12 14:53:11'),
(670, 9, 'has logged in from the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-05-12 17:04:32'),
(671, 28, 'has been login from 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-12 22:31:07'),
(672, 34, 'has been login from 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-12 23:06:01'),
(673, 28, 'has been login from 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-12 23:06:24'),
(674, 9, 'has logged in from the address 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-05-12 23:10:57'),
(675, 28, 'has been login from 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-13 00:23:03'),
(676, 33, 'has been login from 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-13 00:23:11'),
(677, 28, 'has updated the data in the Pendidikan table Borang/TW1/SI/2020 2020-2021 Ganjil UTS 1 1', '2020-05-13 01:39:09'),
(678, 28, 'has updated the data in the Pendidikan table Borang/TW1/SI/2020 2020-2021 Ganjil UTS 1 1', '2020-05-13 01:56:10'),
(679, 33, 'has been login from 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-13 02:35:57'),
(680, 28, 'has been login from 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-13 02:36:32'),
(681, 28, 'has updated the data in the Pendidikan table Borang/TW1/SI/2020 2020-2021 Ganjil UTS 1 1', '2020-05-13 02:36:50'),
(682, 28, 'has updated the data in the Pendidikan table Borang/TW1/SI/2020 2020-2021 Ganjil UTS 1 1', '2020-05-13 02:41:01'),
(683, 28, 'has updated the data in the Pendidikan table Borang/TW1/SI/2020 2020-2021 Ganjil UTS 1 1', '2020-05-13 03:00:58'),
(684, 28, 'has updated the data in the Pendidikan table Borang/SI/2020 2020-2021 Ganjil UTS 1 1', '2020-05-13 03:01:11'),
(685, 28, 'has updated the data in the Pendidikan table Borang/SI/2020 2020-2021 Ganjil UTS 1 1', '2020-05-13 03:01:20'),
(686, 28, 'has updated the data in the Pendidikan table Borang/SI/2020 2020-2021 Ganjil UTS 1 1', '2020-05-13 03:01:48'),
(687, 28, 'has updated the data in the Pendidikan table Borang/SI/2020 2020-2021 Ganjil UTS 1 1', '2020-05-13 03:03:04'),
(688, 33, 'logged out of the address 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-13 03:03:08'),
(689, 34, 'has been login from 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-13 03:03:14'),
(690, 34, 'logged out of the address 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-13 03:06:27'),
(691, 33, 'has been login from 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-13 03:06:34'),
(692, 28, 'has updated the data in the Pendidikan table Borang/SI/2020 2020-2021 Ganjil UTS 1 1', '2020-05-13 03:07:38'),
(693, 33, 'logged out of the address 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-13 03:13:19'),
(694, 34, 'has been login from 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-13 03:13:25'),
(695, 34, 'logged out of the address 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-13 03:15:43'),
(696, 31, 'has been login from 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-13 03:16:02'),
(697, 31, 'logged out of the address 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-13 03:40:47'),
(698, 33, 'has been login from 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-13 03:40:54'),
(699, 33, 'logged out of the address 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-13 03:41:10'),
(700, 31, 'has been login from 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-13 03:41:16'),
(701, 31, 'logged out of the address 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-13 04:17:07'),
(702, 0, 'session timeout, user null', '2020-05-13 04:21:01'),
(703, 28, 'has been login from 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-13 05:27:16'),
(704, 31, 'has been login from 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-13 05:27:47'),
(705, 31, 'logged out of the address 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-13 05:35:36'),
(706, 32, 'has been login from 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-13 05:35:45'),
(707, 32, 'logged out of the address 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-13 06:38:32'),
(708, 29, 'has been login from 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-13 06:39:01'),
(709, 28, 'has updated the data in the Pendidikan table BORANG/IF/2020/TW1 2020-2021 Ganjil UTS 1 2', '2020-05-13 07:15:39'),
(710, 28, 'has updated the data in the Pendidikan table Borang/SI/2020 2020-2021 Ganjil UTS 1 1', '2020-05-13 07:15:56'),
(711, 28, 'logged out of the address 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-13 08:19:01'),
(712, 34, 'has been login from 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-13 08:19:08'),
(713, 34, 'open PenetapanStandar ', '2020-05-13 08:19:24'),
(714, 29, 'has been login from 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-05-13 10:00:49'),
(715, 28, 'has been login from 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-13 12:35:20'),
(716, 9, 'has logged in from the address 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-26 13:35:11'),
(717, 9, 'open Profil ', '2020-05-26 13:35:11'),
(718, 29, 'has been login from 127.0.0.1 using Safari 605.1.15 os Mac OS X', '2020-05-26 13:36:24'),
(719, 29, 'open Profil ', '2020-05-26 13:36:24'),
(720, 29, 'open PenetapanStandar ', '2020-05-26 13:36:58'),
(721, 29, 'open PenetapanMP ', '2020-05-26 13:37:01'),
(722, 29, 'open PenetapanSOP ', '2020-05-26 13:37:03'),
(723, 29, 'open PenetapanFormulir ', '2020-05-26 13:37:04'),
(724, 29, 'open Profil ', '2020-05-26 13:37:06'),
(725, 9, 'logged out of the address 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-26 14:37:45'),
(726, 28, 'has been login from 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-26 14:37:52'),
(727, 28, 'open Profil ', '2020-05-26 14:37:52'),
(728, 28, 'open Pendidikan ', '2020-05-26 14:37:55'),
(729, 28, 'add new data to the Pendidikan table 28202005261590503911 - 2020-2021 Ganjil UTS 1 1', '2020-05-26 14:38:31'),
(730, 28, 'open Pendidikan ', '2020-05-26 14:38:31'),
(731, 28, 'open Pendidikan ', '2020-05-26 14:38:56'),
(732, 28, 'open Pendidikan ', '2020-05-26 14:39:37'),
(733, 28, 'open Dokumen ', '2020-05-26 14:39:56'),
(734, 28, 'open Pendidikan ', '2020-05-26 14:40:10'),
(735, 28, 'generate dokumen to 6', '2020-05-26 14:40:27'),
(736, 28, 'open PeningkatanPendidikan ', '2020-05-26 14:51:49'),
(737, 28, 'open MutuPeningkatan ', '2020-05-26 14:51:52'),
(738, 28, 'logged out of the address 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-26 14:56:20'),
(739, 9, 'has logged in from the address 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-26 14:56:27'),
(740, 9, 'open Profil ', '2020-05-26 14:56:27'),
(741, 9, 'open Menu ', '2020-05-26 14:56:31'),
(742, 9, 'add Menu Array', '2020-05-26 14:56:49'),
(743, 9, 'open Menu ', '2020-05-26 14:56:49'),
(744, 9, 'open Submenu ', '2020-05-26 14:57:10'),
(745, 9, 'add Submenu Array', '2020-05-26 14:58:19'),
(746, 9, 'open Submenu ', '2020-05-26 14:58:19'),
(747, 9, 'open aksesmenu', '2020-05-26 14:58:23'),
(748, 9, 'open submenu access', '2020-05-26 14:58:28'),
(749, 9, 'has changed access48 for 1', '2020-05-26 14:58:33'),
(750, 9, 'open submenu access', '2020-05-26 14:58:33'),
(751, 9, 'logged out of the address 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-26 15:03:20'),
(752, 28, 'has been login from 127.0.0.1 using Firefox 76.0 os Mac OS X', '2020-05-26 15:03:27'),
(753, 28, 'open Profil ', '2020-05-26 15:03:27'),
(754, 28, 'open Pendidikan ', '2020-05-26 15:03:30'),
(755, 28, 'open Pendidikan ', '2020-05-26 15:05:46'),
(756, 28, 'add new data to the Pendidikan_transaksi table 6 7 13  ', '2020-05-26 15:06:26'),
(757, 28, 'open Pendidikan ', '2020-05-26 15:07:33'),
(758, 28, 'has been login from 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 10:59:30'),
(759, 28, 'open Profil ', '2020-06-14 10:59:30'),
(760, 28, 'open PelaksanaanPendidikan ', '2020-06-14 10:59:33'),
(761, 28, 'open DetailPendidikanPelaksanaan 5', '2020-06-14 10:59:38'),
(762, 28, 'uploaded dokumen Array172', '2020-06-14 10:59:50'),
(763, 28, 'open DetailPendidikanPelaksanaan 5', '2020-06-14 10:59:50'),
(764, 28, 'open Pendidikan ', '2020-06-14 12:19:30'),
(765, 28, 'add new data to the Pendidikan table 28202006141592137213 Last Check 2020-2021 Genap UAS 1 1', '2020-06-14 12:20:13'),
(766, 28, 'open Pendidikan ', '2020-06-14 12:20:13'),
(767, 28, 'add new data to the Pendidikan_transaksi table 7 3 11  ', '2020-06-14 12:20:34'),
(768, 28, 'deleted data  in the Pendidikan_transaksi table', '2020-06-14 12:20:41'),
(769, 28, 'open Pendidikan ', '2020-06-14 12:20:41'),
(770, 28, 'generate dokumen to 7', '2020-06-14 12:20:49'),
(771, 28, 'open DetailDokumen 255', '2020-06-14 12:21:03'),
(772, 28, 'open PelaksanaanPendidikan ', '2020-06-14 12:21:21'),
(773, 28, 'open DetailPendidikanPelaksanaan 5', '2020-06-14 12:21:26'),
(774, 28, 'open DetailPendidikanPelaksanaan 5', '2020-06-14 12:21:39'),
(775, 28, 'open PelaksanaanPendidikan ', '2020-06-14 12:23:00'),
(776, 28, 'open DetailPendidikanPelaksanaan 7', '2020-06-14 12:23:06'),
(777, 28, 'open PelaksanaanPendidikan ', '2020-06-14 12:23:24'),
(778, 28, 'open PelaksanaanLampiran 7', '2020-06-14 12:23:30'),
(779, 28, 'add Lampiran Array7', '2020-06-14 12:24:28'),
(780, 28, 'open PelaksanaanLampiran 7', '2020-06-14 12:24:28'),
(781, 28, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 12:24:40'),
(782, 32, 'has been login from 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 12:24:47'),
(783, 32, 'open Profil ', '2020-06-14 12:24:47'),
(784, 32, 'open PelaksanaanPendidikan ', '2020-06-14 12:24:52'),
(785, 32, 'open DetailPendidikanPelaksanaan 7', '2020-06-14 12:24:56'),
(786, 32, 'upload dokumen Array270', '2020-06-14 12:27:46'),
(787, 32, 'open DetailPendidikanPelaksanaan 7', '2020-06-14 12:27:46'),
(788, 32, 'upload dokumen Array271', '2020-06-14 12:28:00'),
(789, 32, 'open DetailPendidikanPelaksanaan 7', '2020-06-14 12:28:00'),
(790, 32, 'upload dokumen Array272', '2020-06-14 12:28:10'),
(791, 32, 'open DetailPendidikanPelaksanaan 7', '2020-06-14 12:28:10'),
(792, 32, 'upload dokumen Array273', '2020-06-14 12:28:23'),
(793, 32, 'open DetailPendidikanPelaksanaan 7', '2020-06-14 12:28:24'),
(794, 32, 'upload dokumen Array274', '2020-06-14 12:28:37'),
(795, 32, 'open DetailPendidikanPelaksanaan 7', '2020-06-14 12:28:37'),
(796, 32, 'upload dokumen Array275', '2020-06-14 12:28:48'),
(797, 32, 'open DetailPendidikanPelaksanaan 7', '2020-06-14 12:28:48'),
(798, 32, 'open PelaksanaanPendidikan ', '2020-06-14 12:28:53'),
(799, 32, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 12:29:03'),
(800, 29, 'has been login from 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 12:29:09'),
(801, 29, 'open Profil ', '2020-06-14 12:29:09'),
(802, 29, 'open PelaksanaanPendidikan ', '2020-06-14 12:29:12'),
(803, 29, 'open DetailPendidikanPelaksanaan ', '2020-06-14 12:29:20'),
(804, 29, 'uploaded Dokumen Array256', '2020-06-14 12:30:13'),
(805, 29, 'open DetailPendidikanPelaksanaan ', '2020-06-14 12:30:13'),
(806, 29, 'uploaded Dokumen Array257', '2020-06-14 12:30:24'),
(807, 29, 'open DetailPendidikanPelaksanaan ', '2020-06-14 12:30:24'),
(808, 29, 'uploaded Dokumen Array258', '2020-06-14 12:30:35'),
(809, 29, 'open DetailPendidikanPelaksanaan ', '2020-06-14 12:30:35'),
(810, 29, 'uploaded Dokumen Array259', '2020-06-14 12:30:48'),
(811, 29, 'open DetailPendidikanPelaksanaan ', '2020-06-14 12:30:48'),
(812, 29, 'uploaded Dokumen Array264', '2020-06-14 12:31:00'),
(813, 29, 'open DetailPendidikanPelaksanaan ', '2020-06-14 12:31:00'),
(814, 29, 'uploaded Dokumen Array265', '2020-06-14 12:31:11'),
(815, 29, 'open DetailPendidikanPelaksanaan ', '2020-06-14 12:31:11'),
(816, 29, 'uploaded Dokumen Array266', '2020-06-14 12:31:22'),
(817, 29, 'open DetailPendidikanPelaksanaan ', '2020-06-14 12:31:22'),
(818, 29, 'uploaded Dokumen Array267', '2020-06-14 12:31:36'),
(819, 29, 'open DetailPendidikanPelaksanaan ', '2020-06-14 12:31:36'),
(820, 29, 'uploaded Dokumen Array284', '2020-06-14 12:31:48'),
(821, 29, 'open DetailPendidikanPelaksanaan ', '2020-06-14 12:31:48'),
(822, 29, 'uploaded Dokumen Array285', '2020-06-14 12:34:52'),
(823, 29, 'open DetailPendidikanPelaksanaan ', '2020-06-14 12:34:52'),
(824, 29, 'uploaded Dokumen Array286', '2020-06-14 12:35:05'),
(825, 29, 'open DetailPendidikanPelaksanaan ', '2020-06-14 12:35:05'),
(826, 29, 'uploaded Dokumen Array287', '2020-06-14 12:35:17'),
(827, 29, 'open DetailPendidikanPelaksanaan ', '2020-06-14 12:35:17'),
(828, 29, 'uploaded Dokumen Array288', '2020-06-14 12:35:28'),
(829, 29, 'open DetailPendidikanPelaksanaan ', '2020-06-14 12:35:28'),
(830, 29, 'uploaded Dokumen Array289', '2020-06-14 12:35:40'),
(831, 29, 'open DetailPendidikanPelaksanaan ', '2020-06-14 12:35:40'),
(832, 29, 'uploaded Dokumen Array290', '2020-06-14 12:35:51'),
(833, 29, 'open DetailPendidikanPelaksanaan ', '2020-06-14 12:35:51'),
(834, 29, 'uploaded Dokumen Array291', '2020-06-14 12:36:04'),
(835, 29, 'open DetailPendidikanPelaksanaan ', '2020-06-14 12:36:04'),
(836, 29, 'uploaded Dokumen Array292', '2020-06-14 12:39:28'),
(837, 29, 'open DetailPendidikanPelaksanaan ', '2020-06-14 12:39:28'),
(838, 29, 'uploaded Dokumen Array293', '2020-06-14 12:39:43'),
(839, 29, 'open DetailPendidikanPelaksanaan ', '2020-06-14 12:39:43'),
(840, 29, 'uploaded Dokumen Array294', '2020-06-14 12:39:55'),
(841, 29, 'open DetailPendidikanPelaksanaan ', '2020-06-14 12:39:55'),
(842, 29, 'uploaded Dokumen Array295', '2020-06-14 12:40:07'),
(843, 29, 'open DetailPendidikanPelaksanaan ', '2020-06-14 12:40:07'),
(844, 29, 'uploaded Dokumen Array296', '2020-06-14 12:40:18'),
(845, 29, 'open DetailPendidikanPelaksanaan ', '2020-06-14 12:40:18'),
(846, 29, 'open PelaksanaanPendidikan ', '2020-06-14 12:40:30'),
(847, 29, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 12:40:59'),
(848, 28, 'has been login from 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 12:41:08'),
(849, 28, 'open Profil ', '2020-06-14 12:41:08'),
(850, 28, 'open Pendidikan ', '2020-06-14 12:41:11'),
(851, 28, 'has updated the data in the Pendidikan table - 2020-2021 Ganjil UTS 1 1', '2020-06-14 12:41:24'),
(852, 28, 'open Pendidikan ', '2020-06-14 12:41:24'),
(853, 28, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 12:41:35'),
(854, 31, 'has been login from 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 12:41:42'),
(855, 31, 'open Profil ', '2020-06-14 12:41:42'),
(856, 31, 'open PelaksanaanPendidikan ', '2020-06-14 12:41:44'),
(857, 31, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 12:41:53'),
(858, 28, 'has been login from 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 12:41:58'),
(859, 28, 'open Profil ', '2020-06-14 12:41:58'),
(860, 28, 'open Pendidikan ', '2020-06-14 12:42:01'),
(861, 28, 'deleted data 6 in the Pendidikan table', '2020-06-14 12:42:07'),
(862, 28, 'open Pendidikan ', '2020-06-14 12:42:07'),
(863, 28, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 12:42:12'),
(864, 31, 'has been login from 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 12:42:22'),
(865, 31, 'open Profil ', '2020-06-14 12:42:22'),
(866, 31, 'open PelaksanaanPendidikan ', '2020-06-14 12:42:29'),
(867, 31, 'open DetailPendidikanPelaksanaan 7', '2020-06-14 12:42:33'),
(868, 31, 'uploaded dokumen Array255', '2020-06-14 12:42:49'),
(869, 31, 'open DetailPendidikanPelaksanaan 7', '2020-06-14 12:42:49'),
(870, 31, 'uploaded dokumen Array260', '2020-06-14 12:43:00'),
(871, 31, 'open DetailPendidikanPelaksanaan 7', '2020-06-14 12:43:00'),
(872, 31, 'uploaded dokumen Array261', '2020-06-14 12:43:11'),
(873, 31, 'open DetailPendidikanPelaksanaan 7', '2020-06-14 12:43:11'),
(874, 31, 'uploaded dokumen Array262', '2020-06-14 12:43:24'),
(875, 31, 'open DetailPendidikanPelaksanaan 7', '2020-06-14 12:43:24'),
(876, 31, 'uploaded dokumen Array263', '2020-06-14 12:43:34'),
(877, 31, 'open DetailPendidikanPelaksanaan 7', '2020-06-14 12:43:34'),
(878, 31, 'uploaded dokumen Array276', '2020-06-14 12:43:45'),
(879, 31, 'open DetailPendidikanPelaksanaan 7', '2020-06-14 12:43:45'),
(880, 31, 'uploaded dokumen Array277', '2020-06-14 12:43:56'),
(881, 31, 'open DetailPendidikanPelaksanaan 7', '2020-06-14 12:43:56'),
(882, 31, 'uploaded dokumen Array278', '2020-06-14 12:44:07'),
(883, 31, 'open DetailPendidikanPelaksanaan 7', '2020-06-14 12:44:07'),
(884, 31, 'uploaded dokumen Array279', '2020-06-14 12:44:17'),
(885, 31, 'open DetailPendidikanPelaksanaan 7', '2020-06-14 12:44:17'),
(886, 31, 'uploaded dokumen Array280', '2020-06-14 12:44:28'),
(887, 31, 'open DetailPendidikanPelaksanaan 7', '2020-06-14 12:44:28'),
(888, 31, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 12:44:33'),
(889, 33, 'has been login from 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 12:44:40'),
(890, 33, 'open Profil ', '2020-06-14 12:44:40'),
(891, 33, 'open PelaksanaanPendidikan ', '2020-06-14 12:44:44'),
(892, 33, 'open DetailPendidikanPelaksanaan 7', '2020-06-14 12:44:47'),
(893, 33, 'uploaded Dokumen Array268', '2020-06-14 12:44:59'),
(894, 33, 'open DetailPendidikanPelaksanaan 7', '2020-06-14 12:44:59'),
(895, 33, 'uploaded Dokumen Array269', '2020-06-14 12:45:10'),
(896, 33, 'open DetailPendidikanPelaksanaan 7', '2020-06-14 12:45:11'),
(897, 33, 'uploaded Dokumen Array281', '2020-06-14 12:45:21'),
(898, 33, 'open DetailPendidikanPelaksanaan 7', '2020-06-14 12:45:21'),
(899, 33, 'uploaded Dokumen Array282', '2020-06-14 12:45:32'),
(900, 33, 'open DetailPendidikanPelaksanaan 7', '2020-06-14 12:45:32'),
(901, 33, 'uploaded Dokumen Array283', '2020-06-14 12:45:46'),
(902, 33, 'open DetailPendidikanPelaksanaan 7', '2020-06-14 12:45:46'),
(903, 33, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 12:48:05'),
(904, 28, 'has been login from 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 12:48:11'),
(905, 28, 'open Profil ', '2020-06-14 12:48:11'),
(906, 28, 'open PelaksanaanPendidikan ', '2020-06-14 12:48:14'),
(907, 28, 'open DetailPendidikanPelaksanaan 7', '2020-06-14 12:48:19'),
(908, 28, 'open Pendidikan ', '2020-06-14 12:48:26'),
(909, 28, 'has updated the data in the Pendidikan table Last Check 2020-2021 Genap UAS 1 1', '2020-06-14 12:48:41'),
(910, 28, 'open Pendidikan ', '2020-06-14 12:48:41'),
(911, 28, 'open PelaksanaanPendidikan ', '2020-06-14 12:48:46'),
(912, 28, 'open EvaluasiPendidikan ', '2020-06-14 12:48:54'),
(913, 28, 'open DetailPendidikanEvaluasi 7', '2020-06-14 12:49:01'),
(914, 28, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 12:49:10'),
(915, 9, 'has logged in from the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 12:49:32'),
(916, 9, 'open Profil ', '2020-06-14 12:49:33'),
(917, 9, 'open Menu ', '2020-06-14 12:49:37'),
(918, 9, 'delete Menu 48', '2020-06-14 12:49:43'),
(919, 9, 'open Menu ', '2020-06-14 12:49:43'),
(920, 9, 'open User ', '2020-06-14 12:49:45'),
(921, 9, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 12:49:57'),
(922, 34, 'has been login from 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 12:50:02'),
(923, 34, 'open Profil ', '2020-06-14 12:50:02'),
(924, 34, 'open PelaksanaanPendidikan ', '2020-06-14 12:50:09'),
(925, 34, 'open EvaluasiPendidikan ', '2020-06-14 12:50:15'),
(926, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 12:50:27'),
(927, 34, 'update data 255Array', '2020-06-14 12:54:28'),
(928, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 12:54:28'),
(929, 34, 'update data 256Array', '2020-06-14 12:54:46'),
(930, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 12:54:46'),
(931, 34, 'update data 257Array', '2020-06-14 12:55:00'),
(932, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 12:55:00'),
(933, 34, 'update data 258Array', '2020-06-14 12:55:32'),
(934, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 12:55:32'),
(935, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 12:55:52'),
(936, 34, 'update data 259Array', '2020-06-14 12:56:07'),
(937, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 12:56:07'),
(938, 34, 'update data 260Array', '2020-06-14 12:56:33'),
(939, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 12:56:33'),
(940, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 12:56:43'),
(941, 34, 'update data 261Array', '2020-06-14 12:56:56'),
(942, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 12:56:56'),
(943, 34, 'update data 262Array', '2020-06-14 12:57:23'),
(944, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 12:57:23'),
(945, 34, 'update data 263Array', '2020-06-14 12:57:38'),
(946, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 12:57:38'),
(947, 34, 'update data 264Array', '2020-06-14 12:58:15'),
(948, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 12:58:16'),
(949, 34, 'update data 265Array', '2020-06-14 12:58:30'),
(950, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 12:58:30'),
(951, 34, 'update data 266Array', '2020-06-14 12:58:43'),
(952, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 12:58:43'),
(953, 34, 'update data 267Array', '2020-06-14 12:58:59'),
(954, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 12:58:59'),
(955, 34, 'update data 268Array', '2020-06-14 12:59:22'),
(956, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 12:59:22'),
(957, 34, 'update data 269Array', '2020-06-14 12:59:33'),
(958, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 12:59:33'),
(959, 34, 'update data 270Array', '2020-06-14 13:00:44'),
(960, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 13:00:44'),
(961, 34, 'update data 271Array', '2020-06-14 13:00:57'),
(962, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 13:00:57'),
(963, 34, 'update data 272Array', '2020-06-14 13:01:16'),
(964, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 13:01:16'),
(965, 34, 'open EvaluasiPendidikan ', '2020-06-14 13:01:21'),
(966, 34, 'open HasilPendidikanEvaluasi ', '2020-06-14 13:04:04'),
(967, 34, 'open EvaluasiPendidikan ', '2020-06-14 13:04:38'),
(968, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 13:04:43'),
(969, 34, 'update data 273Array', '2020-06-14 13:05:02'),
(970, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 13:05:02'),
(971, 34, 'update data 274Array', '2020-06-14 13:05:20'),
(972, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 13:05:20'),
(973, 34, 'update data 275Array', '2020-06-14 13:05:34'),
(974, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 13:05:34'),
(975, 34, 'update data 276Array', '2020-06-14 13:05:48'),
(976, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 13:05:48'),
(977, 34, 'update data 277Array', '2020-06-14 13:06:02'),
(978, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 13:06:03'),
(979, 34, 'update data 278Array', '2020-06-14 13:06:15'),
(980, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 13:06:16'),
(981, 34, 'update data 279Array', '2020-06-14 13:06:27'),
(982, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 13:06:27'),
(983, 34, 'update data 280Array', '2020-06-14 13:06:41'),
(984, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 13:06:41'),
(985, 34, 'update data 296Array', '2020-06-14 13:07:09'),
(986, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 13:07:10'),
(987, 34, 'update data 295Array', '2020-06-14 13:07:23'),
(988, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 13:07:23'),
(989, 34, 'update data 294Array', '2020-06-14 13:07:34'),
(990, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 13:07:34'),
(991, 34, 'update data 293Array', '2020-06-14 13:07:47'),
(992, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 13:07:48'),
(993, 34, 'update data 281Array', '2020-06-14 13:08:25'),
(994, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 13:08:25'),
(995, 34, 'update data 282Array', '2020-06-14 13:08:44'),
(996, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 13:08:44'),
(997, 34, 'update data 283Array', '2020-06-14 13:08:57'),
(998, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 13:08:57'),
(999, 34, 'update data 284Array', '2020-06-14 13:09:09'),
(1000, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 13:09:09'),
(1001, 34, 'update data 285Array', '2020-06-14 13:09:21'),
(1002, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 13:09:21'),
(1003, 34, 'update data 286Array', '2020-06-14 13:09:33'),
(1004, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 13:09:33'),
(1005, 34, 'update data 287Array', '2020-06-14 13:09:47'),
(1006, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 13:09:47'),
(1007, 34, 'update data 288Array', '2020-06-14 13:09:59'),
(1008, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 13:09:59'),
(1009, 34, 'update data 289Array', '2020-06-14 13:10:19'),
(1010, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 13:10:19'),
(1011, 34, 'update data 290Array', '2020-06-14 13:10:32'),
(1012, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 13:10:32'),
(1013, 34, 'update data 291Array', '2020-06-14 13:10:47'),
(1014, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 13:10:47'),
(1015, 34, 'update data 292Array', '2020-06-14 13:10:59'),
(1016, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 13:10:59'),
(1017, 34, 'open EvaluasiPendidikan ', '2020-06-14 13:11:04'),
(1018, 34, 'open DetailPendidikanEvaluasi 7', '2020-06-14 13:11:18'),
(1019, 34, 'open EvaluasiPendidikan ', '2020-06-14 13:11:21'),
(1020, 34, 'open HasilPendidikanEvaluasi ', '2020-06-14 13:11:25'),
(1021, 34, 'open PelaksanaanPendidikan ', '2020-06-14 13:15:27'),
(1022, 34, 'open EvaluasiPendidikan ', '2020-06-14 13:15:31'),
(1023, 34, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 13:15:36'),
(1024, 28, 'has been login from 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 13:15:43'),
(1025, 28, 'open Profil ', '2020-06-14 13:15:43'),
(1026, 28, 'open Pendidikan ', '2020-06-14 13:15:48'),
(1027, 28, 'has updated the data in the Pendidikan table Last Check 2020-2021 Genap UAS 1 1', '2020-06-14 13:16:04'),
(1028, 28, 'open Pendidikan ', '2020-06-14 13:16:04'),
(1029, 28, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 13:16:08'),
(1030, 29, 'has been login from 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 13:16:14'),
(1031, 29, 'open Profil ', '2020-06-14 13:16:14'),
(1032, 29, 'open EvaluasiPendidikan ', '2020-06-14 13:16:16'),
(1033, 29, 'open HasilPendidikanEvaluasi 7', '2020-06-14 13:16:21'),
(1034, 29, 'open EvaluasiPendidikan ', '2020-06-14 13:16:35'),
(1035, 29, 'open MutuEvaluasi 7', '2020-06-14 13:16:38'),
(1036, 29, 'open PengendalianPendidikan ', '2020-06-14 13:30:29'),
(1037, 29, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:30:33'),
(1038, 29, 'open DokumenPerbaikan 258', '2020-06-14 13:30:42'),
(1039, 29, 'upload Dokumen Pengendalian Array258', '2020-06-14 13:30:59'),
(1040, 29, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:30:59'),
(1041, 29, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 13:31:04'),
(1042, 33, 'has been login from 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 13:31:10'),
(1043, 33, 'open Profil ', '2020-06-14 13:31:10'),
(1044, 33, 'open PengendalianPendidikan ', '2020-06-14 13:31:13'),
(1045, 33, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:31:17'),
(1046, 33, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 13:31:46'),
(1047, 31, 'has been login from 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 13:31:52'),
(1048, 31, 'open Profil ', '2020-06-14 13:31:52'),
(1049, 31, 'open PengendalianPendidikan ', '2020-06-14 13:31:54'),
(1050, 31, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:31:57'),
(1051, 31, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:32:33'),
(1052, 31, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:35:20'),
(1053, 31, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 13:35:57'),
(1054, 33, 'has been login from 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 13:36:04'),
(1055, 33, 'open Profil ', '2020-06-14 13:36:04'),
(1056, 33, 'open PengendalianPendidikan ', '2020-06-14 13:36:06'),
(1057, 33, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:36:09'),
(1058, 33, 'update PengendalianJadwalPerbaikan Array258', '2020-06-14 13:37:13'),
(1059, 33, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:37:13'),
(1060, 33, 'update PengendalianJadwalPengendalian Array258', '2020-06-14 13:37:40'),
(1061, 33, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:37:40'),
(1062, 33, 'update PengendalianJadwalPerbaikan Array260', '2020-06-14 13:38:12'),
(1063, 33, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:38:12'),
(1064, 33, 'update PengendalianJadwalPengendalian Array260', '2020-06-14 13:38:29'),
(1065, 33, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:38:29'),
(1066, 33, 'update PengendalianJadwalPerbaikan Array262', '2020-06-14 13:38:48'),
(1067, 33, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:38:48'),
(1068, 33, 'update PengendalianJadwalPengendalian Array262', '2020-06-14 13:39:06'),
(1069, 33, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:39:06'),
(1070, 33, 'update PengendalianJadwalPerbaikan Array264', '2020-06-14 13:39:27'),
(1071, 33, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:39:27'),
(1072, 33, 'update PengendalianJadwalPengendalian Array264', '2020-06-14 13:39:46'),
(1073, 33, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:39:46'),
(1074, 33, 'update PengendalianJadwalPerbaikan Array268', '2020-06-14 13:40:03'),
(1075, 33, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:40:03'),
(1076, 33, 'update PengendalianJadwalPengendalian Array268', '2020-06-14 13:40:18'),
(1077, 33, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:40:18'),
(1078, 33, 'upload pengendalian dokumen Array268', '2020-06-14 13:40:31'),
(1079, 33, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:40:31'),
(1080, 33, 'update PengendalianJadwalPerbaikan Array282', '2020-06-14 13:40:54'),
(1081, 33, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:40:54'),
(1082, 33, 'update PengendalianJadwalPengendalian Array282', '2020-06-14 13:41:08'),
(1083, 33, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:41:08'),
(1084, 33, 'upload pengendalian dokumen Array282', '2020-06-14 13:41:21'),
(1085, 33, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:41:21'),
(1086, 33, 'update PengendalianJadwalPerbaikan Array289', '2020-06-14 13:41:41'),
(1087, 33, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:41:41'),
(1088, 33, 'update PengendalianJadwalPengendalian Array289', '2020-06-14 13:41:58');
INSERT INTO `user_log` (`id_user_log`, `user_id`, `message`, `log_timestamp`) VALUES
(1089, 33, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:41:58'),
(1090, 33, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 13:42:07'),
(1091, 29, 'has been login from 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 13:42:12'),
(1092, 29, 'open Profil ', '2020-06-14 13:42:12'),
(1093, 29, 'open PengendalianPendidikan ', '2020-06-14 13:42:15'),
(1094, 29, 'open HasilPengendalian 4', '2020-06-14 13:42:23'),
(1095, 29, 'open PengendalianPendidikan ', '2020-06-14 13:42:25'),
(1096, 29, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:42:28'),
(1097, 29, 'open DokumenPerbaikan 258', '2020-06-14 13:42:32'),
(1098, 29, 'upload Dokumen Pengendalian Array264', '2020-06-14 13:42:48'),
(1099, 29, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:42:48'),
(1100, 29, 'upload Dokumen Pengendalian Array289', '2020-06-14 13:43:00'),
(1101, 29, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:43:00'),
(1102, 29, 'open PengendalianPendidikan ', '2020-06-14 13:43:02'),
(1103, 29, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 13:43:12'),
(1104, 28, 'has been login from 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 13:43:18'),
(1105, 28, 'open Profil ', '2020-06-14 13:43:18'),
(1106, 28, 'open PengendalianPendidikan ', '2020-06-14 13:43:21'),
(1107, 28, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:43:30'),
(1108, 28, 'open DOkumen Perbaiakn 258', '2020-06-14 13:43:36'),
(1109, 28, 'open DOkumen Perbaiakn 260', '2020-06-14 13:43:40'),
(1110, 28, 'open DokumenMonev 260', '2020-06-14 13:43:46'),
(1111, 28, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 13:43:55'),
(1112, 31, 'has been login from 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 13:44:00'),
(1113, 31, 'open Profil ', '2020-06-14 13:44:00'),
(1114, 31, 'open PengendalianPendidikan ', '2020-06-14 13:44:02'),
(1115, 31, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:44:06'),
(1116, 31, 'open DokumenPerbaikan 258', '2020-06-14 13:44:11'),
(1117, 31, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:44:20'),
(1118, 31, 'upload Dokumen Pengendalian Array260', '2020-06-14 13:44:34'),
(1119, 31, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:44:34'),
(1120, 31, 'upload Dokumen Pengendalian Array262', '2020-06-14 13:44:48'),
(1121, 31, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:44:48'),
(1122, 31, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:44:57'),
(1123, 31, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:45:05'),
(1124, 31, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 13:45:13'),
(1125, 28, 'has been login from 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 13:45:20'),
(1126, 28, 'open Profil ', '2020-06-14 13:45:20'),
(1127, 28, 'open PengendalianPendidikan ', '2020-06-14 13:45:22'),
(1128, 28, 'open HasilPengendalian 1', '2020-06-14 13:45:29'),
(1129, 28, 'open PengendalianPendidikan ', '2020-06-14 13:45:34'),
(1130, 28, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:45:39'),
(1131, 28, 'open DOkumen Perbaiakn 258', '2020-06-14 13:45:45'),
(1132, 28, 'open DOkumen Perbaiakn 260', '2020-06-14 13:45:47'),
(1133, 28, 'open DOkumen Perbaiakn 262', '2020-06-14 13:45:50'),
(1134, 28, 'open DOkumen Perbaiakn 264', '2020-06-14 13:45:53'),
(1135, 28, 'open DOkumen Perbaiakn 268', '2020-06-14 13:45:55'),
(1136, 28, 'open DOkumen Perbaiakn 282', '2020-06-14 13:45:58'),
(1137, 28, 'open DOkumen Perbaiakn 289', '2020-06-14 13:46:01'),
(1138, 28, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 13:46:06'),
(1139, 34, 'has been login from 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 13:46:10'),
(1140, 34, 'open Profil ', '2020-06-14 13:46:10'),
(1141, 34, 'open PengendalianPendidikan ', '2020-06-14 13:46:14'),
(1142, 34, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:46:18'),
(1143, 34, 'update data PengendalianNilaiPerbaikan 258Array', '2020-06-14 13:46:34'),
(1144, 34, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:46:34'),
(1145, 34, 'open PengendalianPendidikan ', '2020-06-14 13:46:40'),
(1146, 34, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:46:44'),
(1147, 34, 'update data PengendalianNilaiPerbaikan 260Array', '2020-06-14 13:46:57'),
(1148, 34, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:46:57'),
(1149, 34, 'update data PengendalianNilaiPerbaikan 262Array', '2020-06-14 13:47:13'),
(1150, 34, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:47:13'),
(1151, 34, 'update data PengendalianNilaiPerbaikan 264Array', '2020-06-14 13:48:20'),
(1152, 34, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:48:20'),
(1153, 34, 'update data PengendalianNilaiPerbaikan 268Array', '2020-06-14 13:48:30'),
(1154, 34, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:48:31'),
(1155, 34, 'update data PengendalianNilaiPerbaikan 282Array', '2020-06-14 13:48:42'),
(1156, 34, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:48:42'),
(1157, 34, 'update data PengendalianNilaiPerbaikan 289Array', '2020-06-14 13:48:53'),
(1158, 34, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:48:53'),
(1159, 34, 'open PengendalianPendidikan ', '2020-06-14 13:48:58'),
(1160, 34, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:49:02'),
(1161, 34, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:49:14'),
(1162, 34, 'open PengendalianDetailDokumen 258', '2020-06-14 13:49:17'),
(1163, 34, 'open DetailPendidikanPengendalian 7', '2020-06-14 13:49:35'),
(1164, 34, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 13:49:38'),
(1165, 28, 'has been login from 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 13:49:45'),
(1166, 28, 'open Profil ', '2020-06-14 13:49:45'),
(1167, 28, 'open Pendidikan ', '2020-06-14 13:49:47'),
(1168, 28, 'has updated the data in the Pendidikan table Last Check 2020-2021 Genap UAS 1 1', '2020-06-14 13:49:57'),
(1169, 28, 'open Pendidikan ', '2020-06-14 13:49:57'),
(1170, 28, 'open PeningkatanPendidikan ', '2020-06-14 13:49:59'),
(1171, 28, 'open PengendalianLampiran 7', '2020-06-14 13:50:04'),
(1172, 28, 'open PeningkatanPendidikan ', '2020-06-14 13:50:08'),
(1173, 28, 'open MutuPeningkatan ', '2020-06-14 13:50:12'),
(1174, 28, 'open PeningkatanPendidikan ', '2020-06-14 13:50:31'),
(1175, 28, 'open ReportPeningkatan 7', '2020-06-14 13:50:35'),
(1176, 28, 'has been login from 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 21:24:56'),
(1177, 28, 'open Profil ', '2020-06-14 21:24:56'),
(1178, 28, 'open PenetapanStandar ', '2020-06-14 21:25:03'),
(1179, 28, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 22:05:03'),
(1180, 9, 'has logged in from the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 22:24:16'),
(1181, 9, 'open Profil ', '2020-06-14 22:24:17'),
(1182, 9, 'open User ', '2020-06-14 22:24:20'),
(1183, 9, 'delete user 35', '2020-06-14 22:24:28'),
(1184, 9, 'open User ', '2020-06-14 22:24:28'),
(1185, 9, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 22:24:31'),
(1186, 36, 'has been login from 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 22:31:52'),
(1187, 36, 'open Profil ', '2020-06-14 22:31:52'),
(1188, 36, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 22:32:19'),
(1189, 9, 'has logged in from the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-14 22:32:30'),
(1190, 9, 'open Profil ', '2020-06-14 22:32:30'),
(1191, 9, 'open User ', '2020-06-14 22:32:34'),
(1192, 9, 'delete user 36', '2020-06-14 22:32:41'),
(1193, 9, 'open User ', '2020-06-14 22:32:41'),
(1194, 9, 'has logged in from the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-15 02:16:56'),
(1195, 9, 'open Profil ', '2020-06-15 02:16:56'),
(1196, 9, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-15 02:17:22'),
(1197, 9, 'has logged in from the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-15 02:17:29'),
(1198, 9, 'open Profil ', '2020-06-15 02:17:29'),
(1199, 9, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-15 02:20:24'),
(1200, 28, 'has been login from 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-15 02:20:32'),
(1201, 28, 'open Profil ', '2020-06-15 02:20:32'),
(1202, 28, 'open PelaksanaanPendidikan ', '2020-06-15 02:21:09'),
(1203, 28, 'open Pendidikan ', '2020-06-15 02:21:40'),
(1204, 28, 'open Pendidikan ', '2020-06-15 02:22:53'),
(1205, 28, 'has updated the data in the Pendidikan table Last Check 2020-2021 Genap UAS 1 1', '2020-06-15 02:23:02'),
(1206, 28, 'open Pendidikan ', '2020-06-15 02:23:02'),
(1207, 28, 'open PelaksanaanPendidikan ', '2020-06-15 02:23:04'),
(1208, 28, 'open EvaluasiPendidikan ', '2020-06-15 02:23:24'),
(1209, 28, 'open MutuEvaluasi 3', '2020-06-15 02:24:07'),
(1210, 28, 'open Pendidikan ', '2020-06-15 02:24:21'),
(1211, 28, 'has updated the data in the Pendidikan table Last Check 2020-2021 Genap UAS 1 1', '2020-06-15 02:24:30'),
(1212, 28, 'open Pendidikan ', '2020-06-15 02:24:30'),
(1213, 28, 'open EvaluasiPendidikan ', '2020-06-15 02:24:32'),
(1214, 28, 'open MutuEvaluasi 7', '2020-06-15 02:24:35'),
(1215, 28, 'open EvaluasiPendidikan ', '2020-06-15 02:24:54'),
(1216, 28, 'open HasilPendidikanEValuasi 7', '2020-06-15 02:25:01'),
(1217, 28, 'open EvaluasiPendidikan ', '2020-06-15 02:25:41'),
(1218, 28, 'open HasilPendidikanEValuasi 3', '2020-06-15 02:25:48'),
(1219, 28, 'open EvaluasiPendidikan ', '2020-06-15 02:25:55'),
(1220, 28, 'open MutuEvaluasi 3', '2020-06-15 02:26:07'),
(1221, 28, 'open PenetapanStandar ', '2020-06-15 02:26:42'),
(1222, 28, 'open DetailStandar 25', '2020-06-15 02:26:49'),
(1223, 28, 'has been login from 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-21 14:05:12'),
(1224, 28, 'open Profil ', '2020-06-21 14:05:13'),
(1225, 28, 'open Standar ', '2020-06-21 14:05:16'),
(1226, 28, 'add standar Array', '2020-06-21 14:05:34'),
(1227, 28, 'open Standar ', '2020-06-21 14:05:34'),
(1228, 28, 'open MP ', '2020-06-21 14:05:41'),
(1229, 28, 'open DetailMP 8', '2020-06-21 14:06:53'),
(1230, 28, 'open MP ', '2020-06-21 14:06:58'),
(1231, 28, 'add MP Array', '2020-06-21 14:14:23'),
(1232, 28, 'open MP ', '2020-06-21 14:14:23'),
(1233, 28, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-21 14:55:18'),
(1234, 9, 'has logged in from the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-21 14:55:24'),
(1235, 9, 'open Profil ', '2020-06-21 14:55:24'),
(1236, 9, 'open Submenu ', '2020-06-21 14:55:27'),
(1237, 9, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-21 14:59:45'),
(1238, 28, 'has been login from 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-21 14:59:51'),
(1239, 28, 'open Profil ', '2020-06-21 14:59:51'),
(1240, 28, 'open MP ', '2020-06-21 14:59:54'),
(1241, 28, 'open SOP ', '2020-06-21 15:00:01'),
(1242, 28, 'open Pedoman ', '2020-06-21 15:00:17'),
(1243, 28, 'open Formulir ', '2020-06-21 15:00:22'),
(1244, 28, 'open aspek ', '2020-06-21 15:00:29'),
(1245, 28, 'open Pedoman ', '2020-06-21 15:00:33'),
(1246, 28, 'open Pedoman ', '2020-06-21 15:00:36'),
(1247, 28, 'open SOP ', '2020-06-21 15:00:38'),
(1248, 28, 'open SOP ', '2020-06-21 15:00:42'),
(1249, 28, 'open Formulir ', '2020-06-21 15:00:44'),
(1250, 28, 'open Formulir ', '2020-06-21 15:00:48'),
(1251, 28, 'open aspek ', '2020-06-21 15:00:50'),
(1252, 28, 'open aspek ', '2020-06-21 15:00:53'),
(1253, 28, 'open Dokumen ', '2020-06-21 15:00:55'),
(1254, 28, 'open Dokumen ', '2020-06-21 15:00:59'),
(1255, 28, 'open Status ', '2020-06-21 15:01:01'),
(1256, 28, 'open Status ', '2020-06-21 15:01:04'),
(1257, 28, 'open Jad ', '2020-06-21 15:01:07'),
(1258, 28, 'open Jad ', '2020-06-21 15:01:11'),
(1259, 9, 'has logged in from the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-27 08:36:30'),
(1260, 9, 'open Profil ', '2020-06-27 08:36:31'),
(1261, 9, 'open Menu ', '2020-06-27 08:36:33'),
(1262, 9, 'add Menu Array', '2020-06-27 08:36:42'),
(1263, 9, 'open Menu ', '2020-06-27 08:36:42'),
(1264, 9, 'open Submenu ', '2020-06-27 08:36:45'),
(1265, 9, 'open aksesmenu', '2020-06-27 08:36:48'),
(1266, 9, 'open submenu access', '2020-06-27 08:37:14'),
(1267, 9, 'has changed access49 for 2', '2020-06-27 08:37:19'),
(1268, 9, 'open submenu access', '2020-06-27 08:37:19'),
(1269, 9, 'open Submenu ', '2020-06-27 08:37:23'),
(1270, 9, 'open Submenu ', '2020-06-27 08:57:53'),
(1271, 9, 'add Submenu Array', '2020-06-27 08:58:31'),
(1272, 9, 'open Submenu ', '2020-06-27 08:58:31'),
(1273, 9, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-27 08:58:34'),
(1274, 28, 'has been login from 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-27 08:58:40'),
(1275, 28, 'open Profil ', '2020-06-27 08:58:40'),
(1276, 28, 'open Borang Standar ', '2020-06-27 09:00:04'),
(1277, 28, 'open Borang Standar ', '2020-06-27 09:00:21'),
(1278, 28, 'open Borang Standar ', '2020-06-27 09:02:28'),
(1279, 28, 'open Borang Standar ', '2020-06-27 09:03:16'),
(1280, 28, 'open detail borang standar 1', '2020-06-27 09:06:40'),
(1281, 28, 'open detail borang standar 1', '2020-06-27 09:06:52'),
(1282, 28, 'open detail borang standar 1', '2020-06-27 09:08:06'),
(1283, 28, 'open detail borang standar 1', '2020-06-27 09:09:51'),
(1284, 28, 'open detail borang standar 1', '2020-06-27 09:10:34'),
(1285, 28, 'open detail borang standar 1', '2020-06-27 09:10:39'),
(1286, 28, 'open detail borang standar 1', '2020-06-27 09:11:03'),
(1287, 28, 'open detail borang standar 1', '2020-06-27 09:11:35'),
(1288, 28, 'open detail borang standar 1', '2020-06-27 09:12:08'),
(1289, 28, 'open detail borang standar 1', '2020-06-27 09:12:21'),
(1290, 28, 'open detail borang standar 1', '2020-06-27 09:12:45'),
(1291, 28, 'open detail borang standar 1', '2020-06-27 09:13:04'),
(1292, 28, 'open detail borang standar 1', '2020-06-27 09:13:18'),
(1293, 28, 'open Borang Standar ', '2020-06-27 09:14:40'),
(1294, 28, 'open Borang Standar ', '2020-06-27 09:19:25'),
(1295, 28, 'open Borang Standar ', '2020-06-27 09:19:32'),
(1296, 28, 'open Borang Standar ', '2020-06-27 09:19:34'),
(1297, 28, 'open Borang Standar ', '2020-06-27 09:19:37'),
(1298, 28, 'open Borang Standar ', '2020-06-27 09:19:40'),
(1299, 28, 'add borang standar Array', '2020-06-27 09:30:42'),
(1300, 28, 'open Standar ', '2020-06-27 09:30:42'),
(1301, 28, 'open Borang Standar ', '2020-06-27 09:30:49'),
(1302, 28, 'add borang standar Array', '2020-06-27 09:31:01'),
(1303, 28, 'open Standar ', '2020-06-27 09:31:01'),
(1304, 28, 'open Borang Standar ', '2020-06-27 09:31:15'),
(1305, 28, 'add borang standar Array', '2020-06-27 09:31:29'),
(1306, 28, 'open Borang Standar ', '2020-06-27 09:31:29'),
(1307, 28, 'open Borang Standar ', '2020-06-27 09:35:55'),
(1308, 28, 'update borang standar Array', '2020-06-27 09:44:42'),
(1309, 28, 'open Borang Standar ', '2020-06-27 09:44:42'),
(1310, 28, 'delete borang standar 4', '2020-06-27 09:46:07'),
(1311, 28, 'open Borang Standar ', '2020-06-27 09:46:07'),
(1312, 28, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-27 09:50:38'),
(1313, 9, 'has logged in from the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-27 09:50:45'),
(1314, 9, 'open Profil ', '2020-06-27 09:50:45'),
(1315, 9, 'open Submenu ', '2020-06-27 09:50:48'),
(1316, 9, 'add Submenu Array', '2020-06-27 10:04:45'),
(1317, 9, 'open Submenu ', '2020-06-27 10:04:45'),
(1318, 9, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-27 10:04:52'),
(1319, 28, 'has been login from 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-27 10:04:59'),
(1320, 28, 'open Profil ', '2020-06-27 10:05:00'),
(1321, 28, 'open Profil ', '2020-06-27 10:32:28'),
(1322, 28, 'open butir standar ', '2020-06-27 10:33:42'),
(1323, 28, 'open butir standar ', '2020-06-27 10:37:24'),
(1324, 28, 'open butir standar ', '2020-06-27 10:37:54'),
(1325, 28, 'open butir standar ', '2020-06-27 10:39:18'),
(1326, 28, 'open butir standar ', '2020-06-27 10:39:46'),
(1327, 28, 'open butir standar ', '2020-06-27 10:44:09'),
(1328, 28, 'open butir standar ', '2020-06-27 10:46:51'),
(1329, 28, 'has been login from 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-28 05:57:42'),
(1330, 28, 'open Profil ', '2020-06-28 05:57:43'),
(1331, 28, 'open butir standar ', '2020-06-28 05:57:46'),
(1332, 28, 'add butir standar Array', '2020-06-28 06:02:58'),
(1333, 28, 'open butir standar ', '2020-06-28 06:02:58'),
(1334, 28, 'open butir standar ', '2020-06-28 06:03:36'),
(1335, 28, 'open butir standar ', '2020-06-28 06:04:33'),
(1336, 28, 'open butir standar ', '2020-06-28 08:19:57'),
(1337, 28, 'add butir standar Array', '2020-06-28 08:20:14'),
(1338, 28, 'open butir standar ', '2020-06-28 08:20:14'),
(1339, 28, 'delete butir standar 3', '2020-06-28 08:20:20'),
(1340, 28, 'open butir standar ', '2020-06-28 08:20:20'),
(1341, 28, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-28 08:29:36'),
(1342, 9, 'has logged in from the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-28 08:29:49'),
(1343, 9, 'open Profil ', '2020-06-28 08:29:49'),
(1344, 9, 'open Submenu ', '2020-06-28 08:30:26'),
(1345, 0, 'session timeout, user null', '2020-06-28 12:49:17'),
(1346, 28, 'has been login from 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-28 12:51:08'),
(1347, 28, 'open Profil ', '2020-06-28 12:51:08'),
(1348, 28, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-28 12:51:19'),
(1349, 9, 'has logged in from the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-28 12:51:27'),
(1350, 9, 'open Profil ', '2020-06-28 12:51:27'),
(1351, 9, 'open Submenu ', '2020-06-28 12:51:32'),
(1352, 9, 'add Submenu Array', '2020-06-28 12:57:15'),
(1353, 9, 'open Submenu ', '2020-06-28 12:57:15'),
(1354, 9, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-28 12:57:20'),
(1355, 28, 'has been login from 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-28 12:57:27'),
(1356, 28, 'open Profil ', '2020-06-28 12:57:27'),
(1357, 28, 'open dokumen borang', '2020-06-28 13:08:16'),
(1358, 28, 'open dokumen borang', '2020-06-28 13:11:49'),
(1359, 28, 'open dokumen borang', '2020-06-28 13:12:16'),
(1360, 28, 'open dokumen borang', '2020-06-28 13:13:27'),
(1361, 28, 'open dokumen borang', '2020-06-28 13:18:26'),
(1362, 28, 'open dokumen borang', '2020-06-28 13:18:31'),
(1363, 28, 'open dokumen borang', '2020-06-28 13:33:48'),
(1364, 28, 'open dokumen borang', '2020-06-28 14:02:44'),
(1365, 28, 'open dokumen borang', '2020-06-28 14:03:24'),
(1366, 28, 'open dokumen borang', '2020-06-28 14:05:02'),
(1367, 28, 'open dokumen borang', '2020-06-28 14:05:46'),
(1368, 28, 'open dokumen borang', '2020-06-28 15:45:07'),
(1369, 28, 'open dokumen borang', '2020-06-28 15:45:47'),
(1370, 28, 'open dokumen borang', '2020-06-28 15:46:24'),
(1371, 28, 'open dokumen borang', '2020-06-28 15:46:42'),
(1372, 28, 'open dokumen borang', '2020-06-28 15:46:58'),
(1373, 28, 'open dokumen borang', '2020-06-28 15:47:38'),
(1374, 28, 'open dokumen borang', '2020-06-28 15:48:00'),
(1375, 28, 'open dokumen borang', '2020-06-28 15:49:07'),
(1376, 28, 'open dokumen borang', '2020-06-28 15:49:34'),
(1377, 28, 'open dokumen borang', '2020-06-28 15:50:01'),
(1378, 28, 'open dokumen borang', '2020-06-28 15:50:52'),
(1379, 28, 'open dokumen borang', '2020-06-28 15:51:02'),
(1380, 28, 'open dokumen borang', '2020-06-28 15:52:00'),
(1381, 28, 'open dokumen borang', '2020-06-28 15:57:11'),
(1382, 28, 'open dokumen borang', '2020-06-28 15:58:54'),
(1383, 28, 'open dokumen borang', '2020-06-28 15:59:37'),
(1384, 28, 'open dokumen borang', '2020-06-28 15:59:45'),
(1385, 28, 'open dokumen borang', '2020-06-28 16:02:15'),
(1386, 28, 'open dokumen borang', '2020-06-28 16:02:23'),
(1387, 28, 'open dokumen borang', '2020-06-28 16:02:26'),
(1388, 28, 'open dokumen borang', '2020-06-28 16:02:31'),
(1389, 28, 'open dokumen borang', '2020-06-28 16:03:54'),
(1390, 28, 'open dokumen borang', '2020-06-28 16:04:07'),
(1391, 28, 'open dokumen borang', '2020-06-28 16:04:10'),
(1392, 28, 'open dokumen borang', '2020-06-28 16:04:44'),
(1393, 28, 'open dokumen borang', '2020-06-28 16:04:47'),
(1394, 28, 'open dokumen borang', '2020-06-28 16:04:50'),
(1395, 28, 'open dokumen borang', '2020-06-28 16:04:52'),
(1396, 28, 'open dokumen borang', '2020-06-28 16:05:12'),
(1397, 28, 'open dokumen borang', '2020-06-28 16:05:15'),
(1398, 28, 'open dokumen borang', '2020-06-28 16:05:17'),
(1399, 28, 'open dokumen borang', '2020-06-28 16:05:20'),
(1400, 28, 'open dokumen borang', '2020-06-28 16:05:22'),
(1401, 28, 'open dokumen borang', '2020-06-28 16:05:24'),
(1402, 28, 'open dokumen borang', '2020-06-28 16:05:28'),
(1403, 28, 'open dokumen borang', '2020-06-28 16:11:59'),
(1404, 28, 'open dokumen borang', '2020-06-28 16:12:03'),
(1405, 28, 'open dokumen borang', '2020-06-28 16:12:05'),
(1406, 28, 'open dokumen borang', '2020-06-28 16:12:07'),
(1407, 28, 'open dokumen borang', '2020-06-28 16:12:12'),
(1408, 28, 'open dokumen borang', '2020-06-28 16:12:39'),
(1409, 28, 'open dokumen borang', '2020-06-28 16:12:49'),
(1410, 28, 'has been login from 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-30 14:32:16'),
(1411, 28, 'open Profil ', '2020-06-30 14:32:16'),
(1412, 28, 'open dokumen borang', '2020-06-30 14:32:22'),
(1413, 28, 'open dokumen borang', '2020-06-30 14:33:33'),
(1414, 28, 'open dokumen borang', '2020-06-30 14:47:40'),
(1415, 28, 'open dokumen borang', '2020-06-30 14:47:42'),
(1416, 28, 'add borang dokumen Array', '2020-06-30 15:02:21'),
(1417, 28, 'open dokumen borang', '2020-06-30 15:02:21'),
(1418, 28, 'open dokumen borang', '2020-06-30 15:06:47'),
(1419, 28, 'open detail borang ', '2020-06-30 15:06:54'),
(1420, 28, 'open detail borang ', '2020-06-30 15:07:10'),
(1421, 28, 'open detail borang ', '2020-06-30 15:07:25'),
(1422, 28, 'open detail borang ', '2020-06-30 15:07:47'),
(1423, 28, 'open detail borang ', '2020-06-30 15:08:28'),
(1424, 28, 'open detail borang ', '2020-06-30 15:12:16'),
(1425, 28, 'open detail borang ', '2020-06-30 15:12:29'),
(1426, 28, 'open detail borang ', '2020-06-30 15:14:34'),
(1427, 28, 'open detail borang ', '2020-06-30 15:16:09'),
(1428, 28, 'open detail borang ', '2020-06-30 15:19:57'),
(1429, 28, 'open detail borang ', '2020-06-30 15:23:28'),
(1430, 28, 'open detail borang ', '2020-06-30 15:24:31'),
(1431, 28, 'open dokumen borang', '2020-06-30 15:24:35'),
(1432, 28, 'add borang dokumen Array', '2020-06-30 15:25:00'),
(1433, 28, 'open dokumen borang', '2020-06-30 15:25:00'),
(1434, 28, 'open detail borang ', '2020-06-30 15:25:07'),
(1435, 28, 'open dokumen borang', '2020-06-30 15:30:10'),
(1436, 28, 'open detail borang ', '2020-06-30 15:30:23'),
(1437, 28, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-30 15:40:42'),
(1438, 9, 'has logged in from the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-06-30 15:40:50'),
(1439, 9, 'open Profil ', '2020-06-30 15:40:50'),
(1440, 9, 'open Submenu ', '2020-06-30 15:41:14'),
(1441, 9, 'has logged in from the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-07-12 07:19:51'),
(1442, 9, 'open Profil ', '2020-07-12 07:19:51'),
(1443, 9, 'open Submenu ', '2020-07-12 07:19:54'),
(1444, 9, 'add Submenu Array', '2020-07-12 07:20:17'),
(1445, 9, 'open Submenu ', '2020-07-12 07:20:17'),
(1446, 9, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-07-12 07:20:20'),
(1447, 28, 'has been login from 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-07-12 07:20:31'),
(1448, 28, 'open Profil ', '2020-07-12 07:20:31'),
(1449, 28, 'open Nota Dinas ', '2020-07-12 07:20:43'),
(1450, 28, 'has been login from 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-07-12 10:42:48'),
(1451, 28, 'open Profil ', '2020-07-12 10:42:48'),
(1452, 28, 'open Nota Dinas ', '2020-07-12 10:42:52'),
(1453, 28, 'add nodin Array', '2020-07-12 10:43:45'),
(1454, 28, 'open Nota Dinas ', '2020-07-12 10:43:45'),
(1455, 28, 'open Nota Dinas ', '2020-07-12 10:44:20'),
(1456, 28, 'open detail nodin 1', '2020-07-12 10:44:51'),
(1457, 28, 'open Nota Dinas ', '2020-07-12 10:45:22'),
(1458, 28, 'open Nota Dinas ', '2020-07-12 10:46:09'),
(1459, 28, 'delete nodin 1', '2020-07-12 10:46:13'),
(1460, 28, 'open Nota Dinas ', '2020-07-12 10:46:13'),
(1461, 28, 'open Nota Dinas ', '2020-07-12 10:46:35'),
(1462, 28, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-07-12 10:47:33'),
(1463, 9, 'has logged in from the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-07-12 10:47:39'),
(1464, 9, 'open Profil ', '2020-07-12 10:47:39'),
(1465, 9, 'open Submenu ', '2020-07-12 10:47:43'),
(1466, 9, 'add Submenu Array', '2020-07-12 10:48:25'),
(1467, 9, 'open Submenu ', '2020-07-12 10:48:25'),
(1468, 9, 'add Submenu Array', '2020-07-12 10:48:49'),
(1469, 9, 'open Submenu ', '2020-07-12 10:48:49'),
(1470, 9, 'logged out of the address 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-07-12 10:48:52'),
(1471, 28, 'has been login from 127.0.0.1 using Firefox 77.0 os Mac OS X', '2020-07-12 10:48:58'),
(1472, 28, 'open Profil ', '2020-07-12 10:48:58'),
(1473, 28, 'open Profil ', '2020-07-12 11:11:28'),
(1474, 28, 'open Nota Dinas ', '2020-07-12 11:11:37'),
(1475, 28, 'open Nota Dinas ', '2020-07-12 11:14:38'),
(1476, 28, 'open Nota Dinas ', '2020-07-12 11:17:56'),
(1477, 28, 'open Nota Dinas ', '2020-07-12 11:18:17'),
(1478, 28, 'open Nota Dinas ', '2020-07-12 11:35:03'),
(1479, 28, 'open Nota Dinas ', '2020-07-12 11:35:12'),
(1480, 28, 'add sk Array', '2020-07-12 13:29:12'),
(1481, 28, 'open Nota Dinas ', '2020-07-12 13:29:13'),
(1482, 28, 'open detail sk 1', '2020-07-12 13:29:21'),
(1483, 28, 'open Nota Dinas ', '2020-07-12 13:29:37'),
(1484, 28, 'open Nota Dinas ', '2020-07-12 13:30:54'),
(1485, 28, 'open detail sk 1', '2020-07-12 13:30:57'),
(1486, 28, 'open Nota Dinas ', '2020-07-12 13:30:59'),
(1487, 28, 'open Nota Dinas ', '2020-07-12 13:31:04'),
(1488, 28, 'delete sk 1', '2020-07-12 13:31:08'),
(1489, 28, 'open Nota Dinas ', '2020-07-12 13:31:08'),
(1490, 28, 'open PenetapanStandar ', '2020-07-12 13:31:21'),
(1491, 28, 'open Nota Dinas ', '2020-07-12 13:31:26'),
(1492, 28, 'open Surat Tugas ', '2020-07-12 13:39:07'),
(1493, 28, 'open Surat Tugas ', '2020-07-12 14:03:19'),
(1494, 28, 'add st Array', '2020-07-12 14:05:24'),
(1495, 28, 'open Surat Tugas ', '2020-07-12 14:05:24'),
(1496, 28, 'open Surat Tugas ', '2020-07-12 14:05:39'),
(1497, 28, 'open Surat Tugas ', '2020-07-12 14:06:15'),
(1498, 28, 'open Surat Tugas ', '2020-07-12 14:06:34'),
(1499, 28, 'open Surat Tugas ', '2020-07-12 14:07:54'),
(1500, 28, 'open Surat Tugas ', '2020-07-12 14:09:19'),
(1501, 28, 'open Surat Tugas ', '2020-07-12 14:16:26'),
(1502, 28, 'open detail st 1', '2020-07-12 14:16:31'),
(1503, 28, 'open detail st 1', '2020-07-12 14:22:32'),
(1504, 28, 'open Surat Tugas ', '2020-07-12 14:22:44'),
(1505, 28, 'delete st ', '2020-07-12 14:22:50'),
(1506, 28, 'open Surat Tugas ', '2020-07-12 14:22:50'),
(1507, 28, 'open Profil ', '2020-07-12 14:35:19'),
(1508, 28, 'open Surat Tugas ', '2020-07-12 14:35:23'),
(1509, 28, 'open Nota Dinas ', '2020-07-12 14:35:28'),
(1510, 28, 'open Nota Dinas ', '2020-07-12 14:35:33'),
(1511, 28, 'open butir standar ', '2020-07-12 14:35:38'),
(1512, 28, 'open butir standar ', '2020-07-12 14:40:48'),
(1513, 28, 'open Nota Dinas ', '2020-07-12 15:38:14'),
(1514, 28, 'has been login from 127.0.0.1 using Firefox 78.0 os Mac OS X', '2020-07-13 15:15:04'),
(1515, 28, 'open Profil ', '2020-07-13 15:15:04'),
(1516, 28, 'open PelaksanaanPendidikan ', '2020-07-13 15:15:08'),
(1517, 28, 'open Pendidikan ', '2020-07-13 15:15:10'),
(1518, 28, 'add new data to the Pendidikan table 28202007131594653332 1 1 Ganjil UAS 1 2', '2020-07-13 15:15:32'),
(1519, 28, 'open Pendidikan ', '2020-07-13 15:15:32'),
(1520, 28, 'open PelaksanaanPendidikan ', '2020-07-13 15:15:47'),
(1521, 28, 'open DetailPendidikanPelaksanaan 1', '2020-07-13 15:15:52'),
(1522, 9, 'has logged in from the address 127.0.0.1 using Firefox 78.0 os Mac OS X', '2020-07-14 15:02:59'),
(1523, 9, 'open Profil ', '2020-07-14 15:02:59'),
(1524, 9, 'open Submenu ', '2020-07-14 15:03:02'),
(1525, 9, 'update submenu Array1', '2020-07-14 15:03:17'),
(1526, 9, 'open Submenu ', '2020-07-14 15:03:17'),
(1527, 9, 'update submenu Array1', '2020-07-14 15:03:27'),
(1528, 9, 'open Submenu ', '2020-07-14 15:03:27'),
(1529, 9, 'update submenu Array1', '2020-07-14 15:03:41'),
(1530, 9, 'open Submenu ', '2020-07-14 15:03:41'),
(1531, 9, 'update submenu Array1', '2020-07-14 15:04:40'),
(1532, 9, 'open Submenu ', '2020-07-14 15:04:40'),
(1533, 9, 'update submenu Array1', '2020-07-14 15:05:13'),
(1534, 9, 'open Submenu ', '2020-07-14 15:05:13'),
(1535, 9, 'update submenu Array1', '2020-07-14 15:05:36'),
(1536, 9, 'open Submenu ', '2020-07-14 15:05:36'),
(1537, 9, 'update submenu Array1', '2020-07-14 15:05:53'),
(1538, 9, 'open Submenu ', '2020-07-14 15:05:53'),
(1539, 9, 'open Submenu ', '2020-07-14 15:07:12'),
(1540, 9, 'update submenu Array1', '2020-07-14 15:07:21'),
(1541, 9, 'open Submenu ', '2020-07-14 15:07:21'),
(1542, 9, 'open Submenu ', '2020-07-14 15:08:25'),
(1543, 9, 'update submenu Array1', '2020-07-14 15:08:33'),
(1544, 9, 'open Submenu ', '2020-07-14 15:08:33'),
(1545, 9, 'update submenu Array1', '2020-07-14 15:08:40'),
(1546, 9, 'open Submenu ', '2020-07-14 15:08:40'),
(1547, 9, 'has logged in from the address 127.0.0.1 using Firefox 78.0 os Mac OS X', '2020-07-19 13:38:45'),
(1548, 9, 'open Profil ', '2020-07-19 13:38:45'),
(1549, 9, 'logged out of the address 127.0.0.1 using Firefox 78.0 os Mac OS X', '2020-07-19 13:42:47'),
(1550, 28, 'has been login from 127.0.0.1 using Firefox 78.0 os Mac OS X', '2020-07-19 13:42:53'),
(1551, 28, 'open Profil ', '2020-07-19 13:42:53'),
(1552, 28, 'logged out of the address 127.0.0.1 using Firefox 78.0 os Mac OS X', '2020-07-19 13:43:33'),
(1553, 9, 'has logged in from the address 127.0.0.1 using Firefox 78.0 os Mac OS X', '2020-07-19 13:43:49'),
(1554, 9, 'open Profil ', '2020-07-19 13:43:49'),
(1555, 9, 'open Submenu ', '2020-07-19 13:43:52'),
(1556, 9, 'add Submenu Array', '2020-07-19 13:44:05'),
(1557, 9, 'open Submenu ', '2020-07-19 13:44:05'),
(1558, 9, 'logged out of the address 127.0.0.1 using Firefox 78.0 os Mac OS X', '2020-07-19 13:44:10'),
(1559, 28, 'has been login from 127.0.0.1 using Firefox 78.0 os Mac OS X', '2020-07-19 13:44:16'),
(1560, 28, 'open Profil ', '2020-07-19 13:44:16'),
(1561, 28, 'open laporan ', '2020-07-19 13:47:07'),
(1562, 28, 'open laporan ', '2020-07-19 14:57:29'),
(1563, 28, 'open laporan ', '2020-07-19 15:02:24'),
(1564, 28, 'open laporan ', '2020-07-19 15:02:54'),
(1565, 28, 'open MP ', '2020-07-19 15:03:12'),
(1566, 28, 'open laporan ', '2020-07-19 15:03:17'),
(1567, 28, 'open laporan ', '2020-07-19 15:03:52'),
(1568, 28, 'open laporan ', '2020-07-19 15:24:21'),
(1569, 28, 'open laporan ', '2020-07-19 15:24:54'),
(1570, 28, 'open laporan ', '2020-07-19 15:24:56'),
(1571, 28, 'open laporan ', '2020-07-19 15:25:34'),
(1572, 28, 'open detail laporan 1', '2020-07-19 15:25:51'),
(1573, 28, 'open laporan ', '2020-07-19 15:28:08'),
(1574, 28, 'add Laporan Array', '2020-07-19 15:42:28'),
(1575, 28, 'open laporan ', '2020-07-19 15:42:28'),
(1576, 28, 'open detail laporan 2', '2020-07-19 15:42:41'),
(1577, 28, 'open laporan ', '2020-07-19 15:42:49'),
(1578, 28, 'delete laporan 1', '2020-07-19 15:44:05'),
(1579, 28, 'open laporan ', '2020-07-19 15:44:05'),
(1580, 28, 'has been login from ::1 using Chrome 84.0.4147.105 os Windows 10', '2020-07-30 04:41:03'),
(1581, 28, 'open Profil ', '2020-07-30 04:41:04'),
(1582, 28, 'open aspek ', '2020-07-30 04:41:58'),
(1583, 28, 'open aspek ', '2020-07-30 04:54:31'),
(1584, 28, 'open Profil ', '2020-07-30 05:32:59'),
(1585, 28, 'open Profil ', '2020-07-30 05:33:00'),
(1586, 28, 'open aspek ', '2020-07-30 05:33:05'),
(1587, 28, 'open aspek ', '2020-07-30 05:33:25'),
(1588, 28, 'open aspek ', '2020-07-30 05:33:33'),
(1589, 28, 'add aspek Array', '2020-07-30 05:36:12'),
(1590, 28, 'open aspek ', '2020-07-30 05:36:12'),
(1591, 28, 'open aspek ', '2020-07-30 06:35:16'),
(1592, 28, 'open aspek ', '2020-07-30 06:35:23'),
(1593, 28, 'has been login from ::1 using Chrome 84.0.4147.105 os Windows 10', '2020-07-30 14:17:01'),
(1594, 28, 'open Profil ', '2020-07-30 14:17:02'),
(1595, 28, 'open aspek ', '2020-07-30 14:17:06'),
(1596, 28, 'has been login from ::1 using Chrome 84.0.4147.105 os Windows 10', '2020-07-31 02:07:36'),
(1597, 28, 'open Profil ', '2020-07-31 02:07:36'),
(1598, 28, 'open aspek ', '2020-07-31 02:07:41'),
(1599, 28, 'add aspek Array', '2020-07-31 02:18:11'),
(1600, 28, 'open aspek ', '2020-07-31 02:18:11'),
(1601, 28, 'add aspek Array', '2020-07-31 02:22:47'),
(1602, 28, 'open aspek ', '2020-07-31 02:22:47'),
(1603, 28, 'add aspek Array', '2020-07-31 02:24:00'),
(1604, 28, 'open aspek ', '2020-07-31 02:24:00'),
(1605, 28, 'open Nota Dinas ', '2020-07-31 02:51:03'),
(1606, 28, 'open aspek ', '2020-07-31 02:51:57'),
(1607, 28, 'open aspek ', '2020-07-31 02:55:01'),
(1608, 28, 'open aspek ', '2020-07-31 02:56:31'),
(1609, 28, 'open aspek ', '2020-07-31 02:57:56'),
(1610, 28, 'open aspek ', '2020-07-31 03:02:21'),
(1611, 28, 'open aspek ', '2020-07-31 03:02:38'),
(1612, 28, 'open Profil ', '2020-07-31 03:07:09'),
(1613, 28, 'open Profil ', '2020-07-31 03:07:10'),
(1614, 28, 'open Dokumen ', '2020-07-31 03:07:14'),
(1615, 28, 'open aspek ', '2020-07-31 03:07:20'),
(1616, 28, 'open aspek ', '2020-07-31 03:09:41'),
(1617, 28, 'open aspek ', '2020-07-31 03:10:09'),
(1618, 28, 'open aspek ', '2020-07-31 03:10:24'),
(1619, 28, 'open aspek ', '2020-07-31 03:12:31'),
(1620, 28, 'open aspek ', '2020-07-31 03:12:34'),
(1621, 28, 'open aspek ', '2020-07-31 03:16:47'),
(1622, 28, 'open aspek ', '2020-07-31 03:17:43'),
(1623, 28, 'open aspek ', '2020-07-31 03:18:39'),
(1624, 28, 'open aspek ', '2020-07-31 03:19:21'),
(1625, 28, 'add aspek Array', '2020-07-31 03:20:31'),
(1626, 28, 'open aspek ', '2020-07-31 03:20:31'),
(1627, 28, 'open Profil ', '2020-07-31 03:51:49'),
(1628, 28, 'open Profil ', '2020-07-31 03:51:49'),
(1629, 28, 'open aspek ', '2020-07-31 03:51:59'),
(1630, 28, 'open aspek ', '2020-07-31 03:56:17'),
(1631, 28, 'has been login from ::1 using Chrome 84.0.4147.105 os Windows 10', '2020-07-31 09:36:56'),
(1632, 28, 'open Profil ', '2020-07-31 09:36:56'),
(1633, 28, 'open laporan ', '2020-07-31 09:37:05'),
(1634, 28, 'open laporan ', '2020-07-31 09:37:12'),
(1635, 28, 'delete laporan 2', '2020-07-31 09:37:20'),
(1636, 28, 'open laporan ', '2020-07-31 09:37:20'),
(1637, 28, 'open aspek ', '2020-07-31 09:41:46'),
(1638, 28, 'open aspek ', '2020-07-31 09:56:34'),
(1639, 28, 'open PenetapanStandar ', '2020-07-31 09:56:46'),
(1640, 28, 'open DetailStandar 6', '2020-07-31 09:56:57'),
(1641, 28, 'open Standar ', '2020-07-31 09:57:24'),
(1642, 28, 'open Standar ', '2020-07-31 10:02:44'),
(1643, 28, 'open Standar ', '2020-07-31 10:03:09'),
(1644, 28, 'open Standar ', '2020-07-31 10:04:49'),
(1645, 28, '0', '2020-07-31 10:04:58'),
(1646, 28, 'open Standar ', '2020-07-31 10:05:02'),
(1647, 28, 'open SOP ', '2020-07-31 10:08:26'),
(1648, 28, 'open SOP ', '2020-07-31 10:08:34'),
(1649, 28, 'open MatrikPenilaian ', '2020-07-31 10:08:59'),
(1650, 28, 'open PeningkatanPendidikan ', '2020-07-31 10:09:34'),
(1651, 28, 'open SOP ', '2020-07-31 10:09:39'),
(1652, 28, 'open SOP ', '2020-07-31 10:09:48'),
(1653, 28, 'open Surat Tugas ', '2020-07-31 10:09:55'),
(1654, 28, 'open Profil ', '2020-07-31 11:30:40'),
(1655, 28, 'open MP ', '2020-07-31 11:31:27'),
(1656, 28, 'open MP ', '2020-07-31 11:31:46'),
(1657, 28, 'open MP ', '2020-07-31 11:38:56'),
(1658, 28, 'open aspek ', '2020-07-31 11:40:39'),
(1659, 28, 'add aspek Array', '2020-07-31 11:44:53'),
(1660, 28, 'open aspek ', '2020-07-31 11:44:53'),
(1661, 28, 'add aspek Array', '2020-07-31 11:48:33'),
(1662, 28, 'open aspek ', '2020-07-31 11:48:33'),
(1663, 28, 'open aspek ', '2020-07-31 11:48:52'),
(1664, 28, 'delete aspek 19', '2020-07-31 11:49:12'),
(1665, 28, 'open aspek ', '2020-07-31 11:49:12'),
(1666, 28, 'delete aspek 18', '2020-07-31 11:49:22'),
(1667, 28, 'open aspek ', '2020-07-31 11:49:22'),
(1668, 28, 'delete aspek 17', '2020-07-31 11:49:40'),
(1669, 28, 'open aspek ', '2020-07-31 11:49:40'),
(1670, 28, 'open aspek ', '2020-07-31 12:06:55'),
(1671, 28, 'open aspek ', '2020-07-31 12:07:49'),
(1672, 28, 'add aspek Array', '2020-07-31 12:08:45'),
(1673, 28, 'open aspek ', '2020-07-31 12:08:45'),
(1674, 28, 'open Profil ', '2020-07-31 12:33:12'),
(1675, 28, 'open aspek ', '2020-07-31 12:33:22'),
(1676, 28, 'open MP ', '2020-07-31 12:34:31'),
(1677, 28, 'open MP ', '2020-07-31 12:58:39'),
(1678, 28, 'has been login from ::1 using Chrome 84.0.4147.105 os Windows 10', '2020-08-03 14:17:19'),
(1679, 28, 'open Profil ', '2020-08-03 14:17:19'),
(1680, 28, 'open aspek ', '2020-08-03 14:17:27'),
(1681, 28, 'open aspek ', '2020-08-03 14:17:56'),
(1682, 28, 'open PenetapanStandar ', '2020-08-03 14:23:44'),
(1683, 28, 'open aspek ', '2020-08-03 14:28:20'),
(1684, 28, 'open PenetapanFormulir ', '2020-08-03 14:31:20'),
(1685, 28, 'logged out of the address ::1 using Chrome 84.0.4147.105 os Windows 10', '2020-08-03 14:31:33'),
(1686, 28, 'has been login from ::1 using Chrome 84.0.4147.105 os Windows 10', '2020-08-03 14:33:47'),
(1687, 28, 'open Profil ', '2020-08-03 14:33:47'),
(1688, 28, 'open PenetapanFormulir ', '2020-08-03 14:35:09'),
(1689, 28, 'open DetailFormulir 4', '2020-08-03 14:37:46'),
(1690, 28, 'open aspek ', '2020-08-03 14:37:57'),
(1691, 28, 'open Profil ', '2020-08-03 16:06:19'),
(1692, 28, 'open aspek ', '2020-08-03 16:06:26'),
(1693, 28, 'open aspek ', '2020-08-03 16:15:08'),
(1694, 28, 'has been login from ::1 using Chrome 84.0.4147.105 os Windows 10', '2020-08-03 23:08:25'),
(1695, 28, 'open Profil ', '2020-08-03 23:08:25'),
(1696, 28, 'open aspek ', '2020-08-03 23:08:29'),
(1697, 28, 'update aspek Array', '2020-08-03 23:10:12'),
(1698, 28, 'open aspek ', '2020-08-03 23:10:12'),
(1699, 28, 'update aspek Array', '2020-08-03 23:10:39'),
(1700, 28, 'open aspek ', '2020-08-03 23:10:39'),
(1701, 28, 'open aspek ', '2020-08-03 23:13:43'),
(1702, 28, 'update aspek Array', '2020-08-03 23:14:02'),
(1703, 28, 'open aspek ', '2020-08-03 23:14:02'),
(1704, 28, 'open aspek ', '2020-08-03 23:16:43'),
(1705, 28, 'open aspek ', '2020-08-03 23:20:27'),
(1706, 28, 'open aspek ', '2020-08-03 23:20:41'),
(1707, 28, 'update aspek Array', '2020-08-03 23:21:13'),
(1708, 28, 'open aspek ', '2020-08-03 23:21:13'),
(1709, 28, 'open aspek ', '2020-08-03 23:22:35'),
(1710, 28, 'update aspek Array', '2020-08-03 23:22:51'),
(1711, 28, 'open aspek ', '2020-08-03 23:22:51'),
(1712, 28, 'open aspek ', '2020-08-03 23:23:20'),
(1713, 28, 'update aspek Array', '2020-08-03 23:23:42'),
(1714, 28, 'open aspek ', '2020-08-03 23:23:42'),
(1715, 28, 'open aspek ', '2020-08-03 23:25:07'),
(1716, 28, 'update aspek Array', '2020-08-03 23:26:07'),
(1717, 28, 'open aspek ', '2020-08-03 23:26:08'),
(1718, 28, 'update aspek Array', '2020-08-03 23:33:03'),
(1719, 28, 'open aspek ', '2020-08-03 23:33:03'),
(1720, 28, 'update aspek Array', '2020-08-03 23:34:32'),
(1721, 28, 'open aspek ', '2020-08-03 23:34:32'),
(1722, 28, 'open aspek ', '2020-08-03 23:35:22'),
(1723, 28, 'update aspek Array', '2020-08-03 23:44:28'),
(1724, 28, 'open aspek ', '2020-08-03 23:44:29'),
(1725, 28, 'open aspek ', '2020-08-03 23:59:27'),
(1726, 28, 'open Pedoman ', '2020-08-03 23:59:44'),
(1727, 28, 'open Dokumen ', '2020-08-03 23:59:55'),
(1728, 28, 'open Dokumen ', '2020-08-04 00:00:11'),
(1729, 28, 'has been login from ::1 using Chrome 84.0.4147.105 os Windows 10', '2020-08-04 02:24:44'),
(1730, 28, 'open Profil ', '2020-08-04 02:24:44'),
(1731, 28, 'open MP ', '2020-08-04 02:24:50'),
(1732, 28, 'open MP ', '2020-08-04 02:25:41'),
(1733, 28, 'has been login from 127.0.0.1 using Chrome 84.0.4147.105 os Windows 10', '2020-08-04 07:39:43'),
(1734, 28, 'open Profil ', '2020-08-04 07:39:43'),
(1735, 28, 'open aspek ', '2020-08-04 07:39:50'),
(1736, 28, 'open aspek ', '2020-08-04 08:09:20'),
(1737, 28, 'open PenetapanSOP ', '2020-08-04 08:15:13'),
(1738, 28, 'open MP ', '2020-08-04 08:15:21'),
(1739, 28, 'open aspek ', '2020-08-04 08:22:49'),
(1740, 28, 'open PelaksanaanPendidikan ', '2020-08-04 08:23:24'),
(1741, 28, 'open PelaksanaanPendidikan ', '2020-08-04 08:23:39'),
(1742, 28, 'open DetailPendidikanPelaksanaan 1', '2020-08-04 08:23:50'),
(1743, 28, 'open aspek ', '2020-08-04 08:25:02'),
(1744, 28, 'open PelaksanaanPendidikan ', '2020-08-04 08:25:25'),
(1745, 28, 'open DetailPendidikanPelaksanaan 1', '2020-08-04 08:25:32'),
(1746, 28, 'open PelaksanaanPendidikan ', '2020-08-04 08:25:50'),
(1747, 28, 'open DetailPendidikanPelaksanaan 1', '2020-08-04 08:25:58'),
(1748, 28, 'open PelaksanaanPendidikan ', '2020-08-04 08:26:26'),
(1749, 28, 'open PelaksanaanPendidikan ', '2020-08-04 08:26:30'),
(1750, 28, 'open DetailPendidikanPelaksanaan 1', '2020-08-04 08:27:02'),
(1751, 28, 'open PelaksanaanPendidikan ', '2020-08-04 08:27:31'),
(1752, 28, 'open DetailPendidikanPelaksanaan 1', '2020-08-04 08:27:54'),
(1753, 28, 'open PengendalianPendidikan ', '2020-08-04 08:48:53'),
(1754, 28, 'open Standar ', '2020-08-04 08:49:01'),
(1755, 28, 'open Nota Dinas ', '2020-08-04 08:49:16'),
(1756, 28, 'open PenetapanFormulir ', '2020-08-04 08:49:31'),
(1757, 28, 'open DetailFormulir 4', '2020-08-04 08:49:38'),
(1758, 28, 'open EvaluasiPendidikan ', '2020-08-04 08:49:47'),
(1759, 28, 'open Formulir ', '2020-08-04 08:49:53'),
(1760, 28, 'open aspek ', '2020-08-04 08:54:13'),
(1761, 28, 'open aspek ', '2020-08-04 09:18:39'),
(1762, 28, 'open aspek ', '2020-08-04 09:20:56'),
(1763, 28, 'add aspek Array', '2020-08-04 09:24:49'),
(1764, 28, 'open aspek ', '2020-08-04 09:24:49'),
(1765, 28, 'update aspek Array', '2020-08-04 09:26:59'),
(1766, 28, 'open aspek ', '2020-08-04 09:26:59'),
(1767, 28, 'open PelaksanaanPendidikan ', '2020-08-04 09:28:10'),
(1768, 28, 'open DetailPendidikanPelaksanaan 1', '2020-08-04 09:28:16'),
(1769, 28, 'open DetailPendidikanPelaksanaan 1', '2020-08-04 09:28:32'),
(1770, 28, 'open aspek ', '2020-08-04 09:28:51'),
(1771, 28, 'open aspek ', '2020-08-04 09:29:20'),
(1772, 28, 'open PelaksanaanPendidikan ', '2020-08-04 09:29:24'),
(1773, 28, 'open DetailPendidikanPelaksanaan 1', '2020-08-04 09:29:35'),
(1774, 28, 'open DetailPendidikanPelaksanaan 1', '2020-08-04 09:29:53'),
(1775, 28, 'open PelaksanaanPendidikan ', '2020-08-04 09:30:57'),
(1776, 28, 'open PelaksanaanLampiran 1', '2020-08-04 09:31:03'),
(1777, 28, 'open PelaksanaanPendidikan ', '2020-08-04 09:31:08'),
(1778, 28, 'open DetailPendidikanPelaksanaan 1', '2020-08-04 09:31:13'),
(1779, 28, 'has been login from ::1 using Chrome 84.0.4147.105 os Windows 10', '2020-08-05 04:28:08'),
(1780, 28, 'open Profil ', '2020-08-05 04:28:09'),
(1781, 28, 'open aspek ', '2020-08-05 04:28:17'),
(1782, 28, 'open aspek ', '2020-08-05 04:33:40'),
(1783, 28, 'delete aspek 10', '2020-08-05 04:33:53'),
(1784, 28, 'open aspek ', '2020-08-05 04:33:53'),
(1785, 28, 'open aspek ', '2020-08-05 04:34:08'),
(1786, 28, 'delete aspek 21', '2020-08-05 04:34:18'),
(1787, 28, 'open aspek ', '2020-08-05 04:34:19'),
(1788, 28, 'delete aspek 11', '2020-08-05 04:34:32'),
(1789, 28, 'open aspek ', '2020-08-05 04:34:32'),
(1790, 28, 'delete aspek 20', '2020-08-05 04:34:48'),
(1791, 28, 'open aspek ', '2020-08-05 04:34:48'),
(1792, 28, 'delete aspek 12', '2020-08-05 04:34:57'),
(1793, 28, 'open aspek ', '2020-08-05 04:34:58'),
(1794, 28, 'delete aspek 9', '2020-08-05 04:35:06'),
(1795, 28, 'open aspek ', '2020-08-05 04:35:06'),
(1796, 28, 'delete aspek 8', '2020-08-05 04:35:13'),
(1797, 28, 'open aspek ', '2020-08-05 04:35:13'),
(1798, 28, 'delete aspek 7', '2020-08-05 04:35:21'),
(1799, 28, 'open aspek ', '2020-08-05 04:35:22'),
(1800, 28, 'delete aspek 6', '2020-08-05 04:35:29'),
(1801, 28, 'open aspek ', '2020-08-05 04:35:29'),
(1802, 28, 'delete aspek 4', '2020-08-05 04:35:39'),
(1803, 28, 'open aspek ', '2020-08-05 04:35:39'),
(1804, 28, 'delete aspek 5', '2020-08-05 04:35:48'),
(1805, 28, 'open aspek ', '2020-08-05 04:35:48'),
(1806, 28, 'delete aspek 3', '2020-08-05 04:36:00'),
(1807, 28, 'open aspek ', '2020-08-05 04:36:00'),
(1808, 28, 'delete aspek 2', '2020-08-05 04:36:08'),
(1809, 28, 'open aspek ', '2020-08-05 04:36:09'),
(1810, 28, 'delete aspek 1', '2020-08-05 04:36:19'),
(1811, 28, 'open aspek ', '2020-08-05 04:36:19'),
(1812, 28, 'add aspek Array', '2020-08-05 04:36:54'),
(1813, 28, 'open aspek ', '2020-08-05 04:36:54'),
(1814, 28, 'open aspek ', '2020-08-05 04:43:29'),
(1815, 28, 'has been login from ::1 using Chrome 84.0.4147.105 os Windows 10', '2020-08-05 11:51:03'),
(1816, 28, 'open Profil ', '2020-08-05 11:51:03'),
(1817, 28, 'open aspek ', '2020-08-05 11:51:18'),
(1818, 28, 'add aspek Array', '2020-08-05 11:55:30'),
(1819, 28, 'open aspek ', '2020-08-05 11:55:30'),
(1820, 28, 'add aspek Array', '2020-08-05 11:56:56'),
(1821, 28, 'open aspek ', '2020-08-05 11:56:56'),
(1822, 28, 'open aspek ', '2020-08-05 11:58:00'),
(1823, 28, 'open aspek ', '2020-08-05 11:58:18'),
(1824, 28, 'add aspek Array', '2020-08-05 11:59:12'),
(1825, 28, 'open aspek ', '2020-08-05 11:59:12'),
(1826, 28, 'open Profil ', '2020-08-05 13:34:19'),
(1827, 28, 'open aspek ', '2020-08-05 13:34:22'),
(1828, 28, 'open aspek ', '2020-08-05 13:34:30'),
(1829, 28, 'open aspek ', '2020-08-05 13:38:42'),
(1830, 28, 'open aspek ', '2020-08-05 13:38:51'),
(1831, 28, 'open aspek ', '2020-08-05 13:40:32'),
(1832, 28, 'open aspek ', '2020-08-05 13:40:37'),
(1833, 28, 'update aspek Array', '2020-08-05 13:40:55'),
(1834, 28, 'open aspek ', '2020-08-05 13:40:55'),
(1835, 28, 'update aspek Array', '2020-08-05 13:41:06'),
(1836, 28, 'open aspek ', '2020-08-05 13:41:06'),
(1837, 28, 'update aspek Array', '2020-08-05 13:41:27'),
(1838, 28, 'open aspek ', '2020-08-05 13:41:27'),
(1839, 28, 'update aspek Array', '2020-08-05 13:41:45'),
(1840, 28, 'open aspek ', '2020-08-05 13:41:45');

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `icon`) VALUES
(1, 'Akun', 'fa  fa-user'),
(2, 'Manajemen Menu', 'fa  fa-tasks'),
(4, 'Master Data', 'fa  fa-cube'),
(5, 'Monitoring', 'fa  fa-dashboard'),
(8, 'Lainya', 'fa  fa-info-circle'),
(12, 'Manajemen Pengguna', 'fa fa-users'),
(13, 'Penetapan', 'fa  fa-gavel'),
(14, 'Pelaksanaan', 'fa fa-folder-open'),
(15, 'Evaluasi', 'fa fa fa-folder'),
(16, 'Pengendalian', 'fa fa-heart'),
(17, 'Peningkatan', 'fa fa-trophy'),
(18, 'Penetapan Dosen', 'fa fa-legal'),
(19, 'Pelaksanaan Dosen', 'fa  fa-folder-open'),
(21, 'Evaluasi Dosen', 'fa fa-folder'),
(22, 'Pengendalian Dosen', 'fa fa-heart'),
(23, 'Peningkatan Dosen', 'fa fa-trophy'),
(24, 'Penetapan Kaprodi', 'fa fa-legal'),
(25, 'Pelaksanaan Kaprodi', 'fa fa-folder-open'),
(26, 'Evaluasi Kaprodi', 'fa fa-folder'),
(27, 'Pengendalian Kaprodi', 'fa fa-heart'),
(28, 'Peningkatan Kaprodi', 'fa fa-trophy'),
(29, 'Penetapan Asesor', 'fa fa-legal'),
(30, 'Pelaksanaan Asesor', 'fa fa-folder-open'),
(31, 'Evaluasi Asesor', 'fa fa-folder'),
(32, 'Pengendalian Asesor', 'fa fa-heart'),
(33, 'Peningkatan Asesor', 'fa fa-trophy'),
(35, 'Penetapan GKM', ' fa fa-legal'),
(36, 'Pelaksanaan GKM', ' fa fa-folder-open '),
(37, 'Evaluasi GKM', ' fa fa-folder'),
(38, 'Pengendalian GKM', 'fa fa-heart '),
(39, 'Peningkatan GKM', 'fa fa-trophy'),
(40, 'Penetapan TU', ' fa fa-legal'),
(41, 'Pelaksanaan TU', ' fa fa-folder-open'),
(42, 'Evaluasi TU', ' fa fa-folder'),
(43, 'Pengendalian TU', 'fa fa-heart'),
(44, 'Peningkatan TU', 'fa fa-trophy'),
(45, 'Master Dokumen', 'fa fa-database'),
(46, 'Transaksi Dokumen', 'fa  fa-cubes'),
(47, 'Arsip', 'fa  fa-archive'),
(49, 'Borang', 'fa fa-bar-chart-o');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, '<i>Administrator</i>'),
(2, 'Staff LP3M'),
(6, 'Dosen'),
(7, '<b>Pengguna Baru</b>'),
(9, 'Ketua Program Studi'),
(10, 'Dekan'),
(11, 'Rektor'),
(12, 'Asesor/Auditor'),
(13, 'GKM Prodi'),
(14, 'Staff Tata Usaha Fakultas');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `is_active`) VALUES
(1, 1, 'Profil', 'profil', 1),
(3, 2, 'Menu', 'menu', 1),
(4, 45, 'Data Standar', 'standar', 1),
(5, 45, 'Data Manual Prosedur', 'mp', 1),
(6, 45, 'Data SOP', 'sop', 1),
(7, 45, 'Data Pedoman', 'pedoman', 1),
(8, 45, 'Data Formulir', 'formulir', 1),
(10, 5, 'Dashboard', 'home', 1),
(11, 2, 'Sub Menu', 'submenu', 1),
(12, 8, 'Syarat dan Ketentuan', 'tnc', 0),
(13, 2, 'Akses', 'aksesmenu', 1),
(16, 1, 'Sunting Profil', 'profil/edit', 1),
(17, 1, 'Sunting Sandi', 'profil/changepassword', 1),
(18, 8, 'Dokumentasi', 'dokumentasi', 1),
(20, 1, 'Tingkatkan Akun', 'profil/upgrade', 1),
(21, 12, 'Pengguna', 'user', 1),
(22, 1, 'Status Peningkatan Akun', 'profil/upgradelist', 1),
(23, 4, 'Fakultas', 'fakultas', 1),
(24, 4, 'Program Studi', 'prodi', 1),
(25, 12, 'Permintaan Peningkatan', 'user/requestUser', 1),
(26, 14, 'Pendidikan dan Pengajaran', 'pendidikan', 0),
(29, 12, 'Catatan Pengguna', 'user/log', 1),
(49, 8, 'Kegiatan', 'Kegiatan', 1),
(50, 5, 'Monitoring Program Studi', 'home/mprodi', 1),
(51, 12, 'Layanan Pengguna', 'user/layananpengguna', 1),
(57, 17, 'Pendidikan dan Pengajaran', 'PeningkatanPendidikan', 0),
(58, 16, 'Pendidikan dan Pengajaran', 'PengendalianPendidikan', 0),
(59, 15, 'Pendidikan dan Pengajaran', 'EvaluasiPendidikan', 0),
(60, 45, 'Aspek Dokumen', 'aspek', 1),
(61, 45, 'Tipe Dokumen', 'dokumen', 1),
(62, 45, 'Status Dokumen', 'status', 1),
(63, 45, 'Kode JAD Dokumen', 'jad', 1),
(64, 45, 'Kode Borang Dokumen', 'borang', 1),
(65, 46, 'Transaksi Monev Pendidikan dan Pengajaran', 'pendidikan', 1),
(66, 46, 'Transaksi JAD', 'jad/transaksijad', 1),
(67, 46, 'Transaksi Borang', 'borang/transaksiborang', 1),
(68, 13, 'Standar', 'Stafflp3m/PenetapanStandar', 1),
(69, 13, 'null', 'Stafflp3m', 0),
(70, 13, 'Manual Prosedur	', 'Stafflp3m/PenetapanMP', 1),
(71, 13, 'Standar Operasional Prosedur', 'Stafflp3m/PenetapanSOP', 1),
(72, 13, 'Formulir', 'Stafflp3m/PenetapanFormulir', 1),
(73, 13, 'Pedoman', 'Stafflp3m/PenetapanPedoman', 1),
(74, 14, 'Pendidikan dan Pengajaran', 'Stafflp3m/PelaksanaanPendidikan', 1),
(75, 15, 'Pendidikan dan Pengajaran', 'Stafflp3m/EvaluasiPendidikan', 1),
(76, 16, 'Pendidikan dan Pengajaran', 'Stafflp3m/PengendalianPendidikan', 1),
(77, 17, 'Pendidikan dan Pengajaran', 'Stafflp3m/PeningkatanPendidikan', 1),
(78, 45, 'Matrik Penilaian', 'MatrikPenilaian', 1),
(79, 18, 'Standar', 'Dosen/PenetapanStandar', 1),
(80, 18, 'null', 'Dosen', 0),
(81, 18, 'Manual Prosedur', 'Dosen/PenetapanMP', 1),
(82, 18, 'Standar Operasional Prosedur', 'Dosen/PenetapanSOP', 1),
(83, 18, 'Formulir', 'Dosen/PenetapanFormulir', 1),
(84, 18, 'Pedoman', 'Dosen/PenetapanPedoman', 1),
(85, 19, 'Pendidikan dan Pengajaran', 'Dosen/PelaksanaanPendidikan', 1),
(86, 21, 'Pendidikan dan Pengajaran', 'Dosen/EvaluasiPendidikan', 1),
(87, 22, 'Pendidikan dan Pengajaran', 'Dosen/PengendalianPendidikan', 1),
(88, 23, 'Pendidikan dan Pengajaran', 'Dosen/PeningkatanPendidikan', 1),
(89, 40, 'Standar', 'Stafftu/PenetapanStandar', 1),
(90, 40, 'null', 'Stafftu', 0),
(91, 40, 'Manual Prosedur', 'Stafftu/PenetapanMP', 1),
(92, 40, 'Standar Operasional Prosedur', 'Stafftu/PenetapanSOP', 1),
(93, 40, 'Formulir', 'Stafftu/PenetapanFormulir', 1),
(94, 40, 'Pedoman', 'Stafftu/PenetapanPedoman', 1),
(95, 41, 'Pendidikan dan Pengajaran', 'Stafftu/PelaksanaanPendidikan', 1),
(96, 42, 'Pendidikan dan Pengajaran', 'Stafftu/EvaluasiPendidikan', 1),
(97, 43, 'Pendidikan dan Pengajaran', 'Stafftu/PengendalianPendidikan', 1),
(98, 44, 'Pendidikan dan Pengajaran', 'Stafftu/PeningkatanPendidikan', 1),
(99, 24, 'Standar', 'Kaprodi/PenetapanStandar', 1),
(100, 24, 'null', 'Kaprodi', 0),
(101, 24, 'Manual Prosedur', 'Kaprodi/PenetapanMP', 1),
(102, 24, 'Standar Operasional Prosedur', 'Kaprodi/PenetapanSOP', 1),
(103, 24, 'Formulir', 'Kaprodi/PenetapanFormulir', 1),
(104, 24, 'Pedoman', 'Kaprodi/PenetapanPedoman', 1),
(105, 25, 'Pendidikan dan Pengajaran', 'Kaprodi/PelaksanaanPendidikan', 1),
(106, 26, 'Pendidikan dan Pengajaran', 'Kaprodi/EvaluasiPendidikan', 1),
(107, 27, 'Pendidikan dan Pengajaran', 'Kaprodi/PengendalianPendidikan', 1),
(108, 28, 'Pendidikan dan Pengajaran', 'Kaprodi/PeningkatanPendidikan', 1),
(109, 35, 'null', 'Gkm', 0),
(110, 35, 'Standar', 'Gkm/PenetapanStandar', 1),
(111, 35, 'Manual Prosedur', 'Gkm/PenetapanMP', 1),
(112, 35, 'Standar Operasional Prosedur', 'Gkm/PenetapanSOP', 1),
(113, 35, 'Formulir', 'Gkm/PenetapanFormulir', 1),
(114, 35, 'Pedoman', 'Gkm/PenetapanPedoman', 1),
(115, 36, 'Pendidikan dan Pengajaran', 'Gkm/PelaksanaanPendidikan', 1),
(116, 37, 'Pendidikan dan Pengajaran', 'Gkm/EvaluasiPendidikan', 1),
(117, 38, 'Pendidikan dan Pengajaran', 'Gkm/PengendalianPendidikan', 1),
(118, 39, 'Pendidikan dan Pengajaran', 'Gkm/PeningkatanPendidikan', 1),
(119, 29, 'null', 'Asesor', 0),
(120, 29, 'Standar', 'Asesor/PenetapanStandar', 1),
(121, 29, 'Manual Prosedur', 'Asesor/PenetapanMP', 1),
(122, 29, 'Standar Operasional Prosedur', 'Asesor/PenetapanSOP', 1),
(123, 29, 'Formulir', 'Asesor/PenetapanFormulir', 1),
(124, 29, 'Pedoman', 'Asesor/PenetapanPedoman', 1),
(125, 30, 'Pendidikan dan Pengajaran', 'Asesor/PelaksanaanPendidikan', 1),
(126, 31, 'Pendidikan dan Pengajaran', 'Asesor/EvaluasiPendidikan', 1),
(127, 32, 'Pendidikan dan Pengajaran', 'Asesor/PengendalianPendidikan', 1),
(128, 33, 'Pendidikan dan Pengajaran', 'Asesor/PeningkatanPendidikan', 1),
(129, 48, 'Hasil Kalibrasi', '-', 1),
(130, 45, 'Borang Standar', 'bstandar', 1),
(131, 45, 'Borang Butir Standar', 'bbutirstandar', 1),
(132, 49, 'Data Borang', 'docborang', 1),
(133, 45, 'Data Nota Dinas', 'Notadinas', 1),
(134, 45, 'Data Surat Keputusan', 'Suratkeputusan', 1),
(135, 45, 'Data Surat Tugas', 'Surattugas', 1),
(136, 45, 'Laporan', 'Laporan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(4, 'devry@gmail.com', '399VtdPGx9d0ZUWLqkr6MhsDqs/jtoZgw3KTFdqaqeM=', 1582102743),
(5, 'si16.alanruslan@mhs.ubpkarawang.ac.id', 'CFSq55aMIsQB8cM3RRz+BaS2q4MY1aS0J4lqL3OLrP8=', 1582794826),
(6, 'si16.alanruslan@mhs.ubpkarawang.ac.id', 'eZHovMQ5LyyiQUueR0eWlzLb7tkZiKkarY6xlKEZPow=', 1582794978),
(7, 'si16.ciptasokat@mhs.ubpkarawang.ac.id', 'rrQPH8gKzqGp91Vpk1ESP5Min3X7ACYTyz0anc4fgK4=', 1582906014),
(8, 'si16.triyantoo@mhs.ubpkarawang.ac.id', 'u1MH22Zq8QhoXfc0orn6cRhk3dq1f6mpJ+OpIttHwkE=', 1583846393),
(9, 'si16.dantipracoyo@mhs.ubpkarawang.ac.id', 'WAVTunPndQmt9NLqycSQeGW36ki9PaGKbOwkhrg76XE=', 1584130634),
(10, 'mn16.rizkyjawir@mhs.ubpkarawang.ac.id', '8TeIkDgnCwe9EnSlEpConx+XGr68cnq4TJthYAnz9yg=', 1584888733),
(11, 'mn16.rizkyjawir@mhs.ubpkarawang.ac.id', 'yuXu5cDNgSiTw5jtbpyFJF64K5K/e1AwHzvRKg0TfOE=', 1586271088),
(12, 'si16.anisajubaedah@mhs.ubpkarawang.ac.id', 'bhDZyaSfx2RzskSZt/kTaBTfB+dQ6d+o2aa/D1DQ7AA=', 1586705768),
(13, 'si16.sekaristiqomah@mhs.ubpkarawang.ac.id', 'maT/l9tVsULNwaHq/NogW1daipTIh4VOxu+hCjLRdvw=', 1586706220),
(14, 'si16.anisajubaedah@mhs.ubpkarawang.ac.id', 'UsWxQT7leHG/ZgLBZG4buV1YR1DVrGb3snsbLh1esKU=', 1586790748),
(15, 'si17.julifer@mhs.ubpkarawang.ac.id', 'wu+l1Drkos0C8RTySmM0h0TW9rgUTJBoFi9PsFLW1fg=', 1586792390),
(16, 'stafflp3m@gmail.com', '3xppB0iiE6RkYSQknONgthMYoPur2lcMC6c9sk0NUZM=', 1588947860),
(17, 'dosen1@gmail.com', 'slzCI2oTfzPVheVtNXtub17Y8E9FolSUqsozrvzZ7jg=', 1589207700),
(18, 'dosen2@gmail.com', 'rQoARzamEwr1zPUWc/fH6n31TIME2lumcXRAohrqP9c=', 1589234503),
(19, 'kaprodisi@gmail.com', 'LkaKs9eFrehsG9wJlN5Zh5U0KEyWQNANBgZS2esQsZM=', 1589234763),
(20, 'stafftu@gmail.com', '8jCZRZO0MROqTABsW2dCEGH0RsyOZs/D3Gb2lzrvuVU=', 1589244420),
(21, 'gkm@gmail.com', 'JJyDC2zvowgRBrGTBCsg26rlxHBuxaOUcuJPgD96yUQ=', 1589264706),
(22, 'aa@gmail.com', 'ZsuiIBckSBu2pNyMAKofmwxXZs9lZfc4n1H4jTNzTmk=', 1589284620),
(23, 'iam.ilhamhadi@gmail.com', 'FumT8aA1NF4rohCuGs0LLYWwgfhZC+MJ5Qj98rqA8xQ=', 1592172313),
(24, 'iam.ilhamhadi@gmail.com', '9GXMS45jG8L6afe8wzp18r3k3DoGjYy8KJTgItgF+f8=', 1592172774),
(25, 'iam.ilhamhadi@gmail.com', 'BzADn/HsjGaV6LxCGME/P7GdKhzxuejIodRreyz8ugA=', 1592173110),
(26, 'hadi18482@gmail.com', 'cyrKkN9pGrq1G5TBpRlDHmHPVWxzStLuwsfqIHn6D1M=', 1592173323);

-- --------------------------------------------------------

--
-- Table structure for table `user_upgrade`
--

CREATE TABLE `user_upgrade` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `pesan` varchar(512) NOT NULL,
  `status` varchar(128) NOT NULL,
  `file` varchar(128) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL,
  `user_email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_upgrade`
--

INSERT INTO `user_upgrade` (`id`, `role_id`, `pesan`, `status`, `file`, `waktu`, `user_id`, `user_email`) VALUES
(8, 1, 'Pengajuan Akun', 'Menunggu verifikasi admin', '4_ktp_page-0001.jpg', '2020-04-07 17:39:37', 9, 'iam.ilhamhadi@gmail.com'),
(9, 2, 'pengajuan akun', 'Menunggu verifikasi admin', '4_ktp_page-00011.jpg', '2020-04-13 15:52:48', 8, 'ira@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `b_butirstandar`
--
ALTER TABLE `b_butirstandar`
  ADD PRIMARY KEY (`id_butirstandar`);

--
-- Indexes for table `b_dokumentransaksi`
--
ALTER TABLE `b_dokumentransaksi`
  ADD PRIMARY KEY (`id_dokumentransaksi`);

--
-- Indexes for table `b_standar`
--
ALTER TABLE `b_standar`
  ADD PRIMARY KEY (`id_bstandar`);

--
-- Indexes for table `dokumentasi`
--
ALTER TABLE `dokumentasi`
  ADD PRIMARY KEY (`id_dok`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `formulir`
--
ALTER TABLE `formulir`
  ADD PRIMARY KEY (`id_formulir`);

--
-- Indexes for table `jad`
--
ALTER TABLE `jad`
  ADD PRIMARY KEY (`id_jad`);

--
-- Indexes for table `kborang`
--
ALTER TABLE `kborang`
  ADD PRIMARY KEY (`id_kborang`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `layanan_pelanggan`
--
ALTER TABLE `layanan_pelanggan`
  ADD PRIMARY KEY (`id_lp`);

--
-- Indexes for table `matrik_penilaian`
--
ALTER TABLE `matrik_penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `mp`
--
ALTER TABLE `mp`
  ADD PRIMARY KEY (`id_mp`);

--
-- Indexes for table `nota_dinas`
--
ALTER TABLE `nota_dinas`
  ADD PRIMARY KEY (`id_nota_dinas`);

--
-- Indexes for table `pedoman`
--
ALTER TABLE `pedoman`
  ADD PRIMARY KEY (`id_pedoman`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`),
  ADD UNIQUE KEY `object_id_pendidikan` (`object_id_pendidikan`);

--
-- Indexes for table `pendidikan_aspek`
--
ALTER TABLE `pendidikan_aspek`
  ADD PRIMARY KEY (`id_aspek_pendidikan`);

--
-- Indexes for table `pendidikan_borang_t`
--
ALTER TABLE `pendidikan_borang_t`
  ADD PRIMARY KEY (`id_btp`);

--
-- Indexes for table `pendidikan_dokumen`
--
ALTER TABLE `pendidikan_dokumen`
  ADD PRIMARY KEY (`id_dokumen_pendidikan`);

--
-- Indexes for table `pendidikan_file`
--
ALTER TABLE `pendidikan_file`
  ADD PRIMARY KEY (`id_file`);

--
-- Indexes for table `pendidikan_jad_t`
--
ALTER TABLE `pendidikan_jad_t`
  ADD PRIMARY KEY (`id_pjt`);

--
-- Indexes for table `pendidikan_lampiran`
--
ALTER TABLE `pendidikan_lampiran`
  ADD PRIMARY KEY (`id_pendidikan_lampiran`);

--
-- Indexes for table `pendidikan_nilai`
--
ALTER TABLE `pendidikan_nilai`
  ADD PRIMARY KEY (`id_pendidikan_nilai`);

--
-- Indexes for table `pendidikan_pengendalian`
--
ALTER TABLE `pendidikan_pengendalian`
  ADD PRIMARY KEY (`id_pendidikan_pengendalian`);

--
-- Indexes for table `pendidikan_peningkatan`
--
ALTER TABLE `pendidikan_peningkatan`
  ADD PRIMARY KEY (`id_pendidikan_peningkatan`);

--
-- Indexes for table `pendidikan_status`
--
ALTER TABLE `pendidikan_status`
  ADD PRIMARY KEY (`id_status_pendidikan`);

--
-- Indexes for table `pendidikan_transaksi`
--
ALTER TABLE `pendidikan_transaksi`
  ADD PRIMARY KEY (`id_transaksi_pendidikan`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `sop`
--
ALTER TABLE `sop`
  ADD PRIMARY KEY (`id_sop`);

--
-- Indexes for table `standar`
--
ALTER TABLE `standar`
  ADD PRIMARY KEY (`id_standar`);

--
-- Indexes for table `surat_keputusan`
--
ALTER TABLE `surat_keputusan`
  ADD PRIMARY KEY (`id_sk`);

--
-- Indexes for table `surat_tugas`
--
ALTER TABLE `surat_tugas`
  ADD PRIMARY KEY (`id_surat_tugas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`id_user_log`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_upgrade`
--
ALTER TABLE `user_upgrade`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `b_butirstandar`
--
ALTER TABLE `b_butirstandar`
  MODIFY `id_butirstandar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `b_dokumentransaksi`
--
ALTER TABLE `b_dokumentransaksi`
  MODIFY `id_dokumentransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `b_standar`
--
ALTER TABLE `b_standar`
  MODIFY `id_bstandar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dokumentasi`
--
ALTER TABLE `dokumentasi`
  MODIFY `id_dok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `formulir`
--
ALTER TABLE `formulir`
  MODIFY `id_formulir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jad`
--
ALTER TABLE `jad`
  MODIFY `id_jad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kborang`
--
ALTER TABLE `kborang`
  MODIFY `id_kborang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `layanan_pelanggan`
--
ALTER TABLE `layanan_pelanggan`
  MODIFY `id_lp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `matrik_penilaian`
--
ALTER TABLE `matrik_penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mp`
--
ALTER TABLE `mp`
  MODIFY `id_mp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `nota_dinas`
--
ALTER TABLE `nota_dinas`
  MODIFY `id_nota_dinas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pedoman`
--
ALTER TABLE `pedoman`
  MODIFY `id_pedoman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pendidikan_aspek`
--
ALTER TABLE `pendidikan_aspek`
  MODIFY `id_aspek_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pendidikan_borang_t`
--
ALTER TABLE `pendidikan_borang_t`
  MODIFY `id_btp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pendidikan_dokumen`
--
ALTER TABLE `pendidikan_dokumen`
  MODIFY `id_dokumen_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `pendidikan_file`
--
ALTER TABLE `pendidikan_file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `pendidikan_jad_t`
--
ALTER TABLE `pendidikan_jad_t`
  MODIFY `id_pjt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pendidikan_lampiran`
--
ALTER TABLE `pendidikan_lampiran`
  MODIFY `id_pendidikan_lampiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pendidikan_status`
--
ALTER TABLE `pendidikan_status`
  MODIFY `id_status_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pendidikan_transaksi`
--
ALTER TABLE `pendidikan_transaksi`
  MODIFY `id_transaksi_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=297;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sop`
--
ALTER TABLE `sop`
  MODIFY `id_sop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `standar`
--
ALTER TABLE `standar`
  MODIFY `id_standar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `surat_keputusan`
--
ALTER TABLE `surat_keputusan`
  MODIFY `id_sk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surat_tugas`
--
ALTER TABLE `surat_tugas`
  MODIFY `id_surat_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `id_user_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1841;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_upgrade`
--
ALTER TABLE `user_upgrade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Agu 2021 pada 03.05
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web-pusdiklat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aktivasi`
--

CREATE TABLE `aktivasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(60) NOT NULL,
  `universitas` varchar(70) NOT NULL,
  `fakultas` varchar(70) NOT NULL,
  `token` varchar(44) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `aktivasi`
--

INSERT INTO `aktivasi` (`id`, `nama`, `email`, `password`, `universitas`, `fakultas`, `token`) VALUES
(10, 'Aris Setyawan', 'aris.setyawan354313@gmail.com', '$2y$10$Vb2ZYfWgb7CVlHGuq9ilh.t5GnrVLUPJvDpLefvruuPRsySZ33lqS', 'Pusdiklat', 'Admin Pusat', 'XKlA1ASENUvUSu0SncCDaZzlPZ1EGS+YxaA/Ap90KdA='),
(11, 'Aris Setyawan', 'aris.setyawan354313@gmail.com', '$2y$10$5bReRltlU3ljLcfu45jBCOATne2wefOBr1WUPxEq8kYUccwhzipuO', 'Pusdiklat', 'Admin Pusat', 'sz3UjlfrnJiLzhUpwJsA1qy5DlxDrr0L6x0zu8T1FWY=');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(5) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(60) NOT NULL,
  `id_unit_kerja` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `id_unit_kerja`, `role_id`) VALUES
(1, 'Rina_Wahyuni@pusdiklat.com', 'rina123', 0, 1),
(2, 'PUSDIKLAT@pusdiklat.com', 'pusdiklat', 0, 2),
(4, 'sleepyweppy@gmail.com', '$2y$10$DdBChV.YU3FTnxPkB79i5.8BE0Vd8IuvHCAK.lpJLn8mJG6OMlT.q', 0, 3),
(7, 'muhammadrizkyardiansah93@gmail.com', '$2y$10$nW05HXtM1qi4tiUnHZz6l.Hn/9Axhu8.r72.l4.cm3xnhRXPz8Pa.', 0, 3),
(12, 'aris.cemumut@gmail.com', '$2y$10$iyfHzFi2BWMJLLA2xeGCNeGZVQ/dzLB2TRNIjhLxJBvbBYrA7RVvO', 0, 2),
(13, 'ariss@upnvj.ac.id', '$2y$10$2DaeegN8jbjjb72MiSuB1.2oEjgXBD0Paq6yMkwQl/dEz7FbAZspm', 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelamar`
--

CREATE TABLE `pelamar` (
  `id` int(11) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `universitas` varchar(70) NOT NULL,
  `fakultas` varchar(70) NOT NULL,
  `prodi` varchar(70) DEFAULT NULL,
  `nim` varchar(30) DEFAULT NULL,
  `semester` int(2) DEFAULT NULL,
  `no_telpon` varchar(15) DEFAULT NULL,
  `nama_file_khs` varchar(100) DEFAULT NULL,
  `nama_file_cv` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelamar`
--

INSERT INTO `pelamar` (`id`, `nama`, `email`, `universitas`, `fakultas`, `prodi`, `nim`, `semester`, `no_telpon`, `nama_file_khs`, `nama_file_cv`) VALUES
(1, 'Muhammad Rizky', 'sleepyweppy@gmail.com', 'Universitas Yarsi', 'Teknologi Informasi', 'Teknik Informatika', 'P1232657', 5, '085972875059', 'Pelamar_KHS_1628209590.pdf', 'Pelamar_CV_1628209597.pdf'),
(5, 'Muhammad Rizky Ardiansah', 'muhammadrizkyardiansah93@gmail.com', 'Universitas Yarsi', 'Teknologi Informasi', 'Teknik Informatika', '1402018149', 6, '085972875509', 'Pelamar_KHS_1628172059.pdf', 'Pelamar_CV_1628172074.pdf'),
(6, 'Aris Setyawan', 'aris.cemumut@gmail.com', 'Pusdiklat', 'Biro Perencanaan', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Aris Setyawan', 'ariss@upnvj.ac.id', 'Pusdiklat', 'Admin Pusat', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Administrator Pusat'),
(2, 'Administrator Unit Kerja'),
(3, 'Pelamar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_balasan`
--

CREATE TABLE `surat_balasan` (
  `id_surat_balasan` int(11) NOT NULL,
  `id_surat_permohonan` int(11) NOT NULL,
  `no_surat` varchar(26) NOT NULL,
  `nama_surat` varchar(45) NOT NULL,
  `tgl_surat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_balasan`
--

INSERT INTO `surat_balasan` (`id_surat_balasan`, `id_surat_permohonan`, `no_surat`, `nama_surat`, `tgl_surat`) VALUES
(1, 8, '', '', '0000-00-00'),
(2, 9, '', '', '0000-00-00'),
(3, 10, '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_permohonan`
--

CREATE TABLE `surat_permohonan` (
  `id_permohonan` int(12) NOT NULL,
  `id_unit_kerja` int(5) NOT NULL,
  `id_pelamar` int(11) NOT NULL,
  `no_surat_permohonan` varchar(10) NOT NULL,
  `nama_file_surat_permohonan` varchar(65) NOT NULL,
  `tanggal_permohonan` date NOT NULL,
  `status` varchar(35) NOT NULL,
  `tanggal_persetujuan` date DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_permohonan`
--

INSERT INTO `surat_permohonan` (`id_permohonan`, `id_unit_kerja`, `id_pelamar`, `no_surat_permohonan`, `nama_file_surat_permohonan`, `tanggal_permohonan`, `status`, `tanggal_persetujuan`, `keterangan`) VALUES
(8, 4, 5, 'x/adf/qwe/', 'Pelamar_SuratPermohonan_1628176052.pdf', '2021-08-05', 'Menunggu verifikasi', NULL, NULL),
(9, 1, 5, '323f2g13s2', 'Pelamar_SuratPermohonan_1628211076.pdf', '2021-08-06', 'Menunggu verifikasi', NULL, NULL),
(10, 2, 5, '23asdf32', 'Pelamar_SuratPermohonan_1628211632.pdf', '2021-08-06', 'Menunggu verifikasi', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit_kerja`
--

CREATE TABLE `unit_kerja` (
  `id` int(11) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `keterangan` mediumtext NOT NULL,
  `url_gambar` varchar(256) NOT NULL,
  `url_halaman` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `unit_kerja`
--

INSERT INTO `unit_kerja` (`id`, `nama`, `keterangan`, `url_gambar`, `url_halaman`) VALUES
(1, 'Biro Perencanaan dan Keuangan', 'Biro Perencanaan dan Keuangan mempunyai tugas melaksanakan koordinasi dan penyusunan rencana, program dan anggaran, pemantauan, evaluasi, dan pelaporan, serta pengelolaan administrasi keuangan.', '-', '-'),
(2, 'Biro Hukum, Organisasi, Kerja Sama dan Hubungan Masyarakat', 'Biro Hukum, Organisasi, Kerja Sama, dan Hubungan Masyarakat mempunyai tugas melaksanakan koordinasi dan pelayanan di bidang hukum, organisasi, kerja sama, hubungan masyarakat, dan penerbitan.', '-', '-'),
(3, 'Biro SDM dan Umum', 'Biro Sumber Daya Manusia dan Umum mempunyai tugas melaksanakan koordinasi dan penyusunan urusan sumber daya manusia, rumah tangga, kearsipan, persandian, keprotokolan, administrasi tata usaha, dan layanan pengadaan barang dan jasa.', '-', '-'),
(4, 'Direktorat Deposit dan Pengembangan Koleksi Perpustakaan', 'Direktorat Deposit dan Pengembangan Koleksi Perpustakaan mempunyai tugas melaksanakan perumusan dan pelaksanaan kebijakan, penyusunan norma, standar, prosedur, dan kriteria, pelaksanaan fasilitasi, bimbingan teknis, supervisi, dan evaluasi dan pelaporan di bidang deposit dan pengembangan koleksi perpustakaan.', '-', '-'),
(5, 'Pusat Bibliografi dan Pengolahan Bahan Perpustakaan', 'Pusat Bibliografi dan Pengolahan Bahan Perpustakaan mempunyai tugas melaksanakan perumusan dan pelaksanaan kebijakan, fasilitasi, bimbingan teknis, supervisi, dan evaluasi dan pelaporan di bidang bibliografi dan pengolahan bahan perpustakaan.', '-', '-'),
(6, 'Pusat Preservasi dan Alih Media Bahan Perpustakaan', 'Pusat Preservasi dan Alih Media Bahan Perpustakaan mempunyai tugas melaksanakan perumusan dan pelaksanaan kebijakan, fasilitasi, bimbingan teknis, supervisi, dan evaluasi dan pelaporan di bidang pelestarian fisik dan informasi bahan perpustakaan.', '-', '-'),
(7, 'Pusat Jasa Informasi Perpustakaan dan Pengelolaan Naskah Nusantara', 'Pusat Jasa Informasi Perpustakaan dan Pengelolaan Naskah Nusantara mempunyai tugas melaksanakan perumusan dan pelaksanaan kebijakan, fasilitasi, bimbingan teknis, supervisi, dan evaluasi dan pelaporan di bidang jasa informasi dan layanan perpustakaan serta pengelolaan naskah nusantara.', '-', '-'),
(8, 'Direktorat Standarisasi dan Akreditasi', 'Direktorat Standardisasi dan Akreditasi mempunyai tugas melaksanakan perumusan dan pelaksanaan kebijakan, penyusunan norma, standar, prosedur, dan kriteria, pelaksanaan fasilitasi, bimbingan teknis, supervisi, dan evaluasi dan pelaporan di bidang standardisasi dan akreditasi perpustakaan.', '-', '-'),
(9, 'Pusat Pengembangan Perpustakaan Umum dan Khusus', 'Pusat Pengembangan Perpustakaan Umum dan Khusus mempunyai tugas melaksanakan perumusan dan pelaksanaan kebijakan, fasilitasi, pelaksanaan bimbingan teknis, supervisi, dan evaluasi dan pelaporan di bidang pengembangan dan pembinaan perpustakaan umum dan perpustakaan khusus.', '-', '-'),
(10, 'Pusat Pengembangan Perpustakaan Sekolah/Madrasah dan Perguruan Tinggi', 'Pusat Pengembangan Perpustakaan Sekolah/Madrasah dan Perguruan Tinggi mempunyai tugas melaksanakan perumusan dan pelaksanaan kebijakan, fasilitasi, pelaksanaan bimbingan teknis, supervisi, dan evaluasi dan pelaporan di bidang pengembangan dan pembinaan perpustakaan sekolah/madrasah dan perpustakaan perguruan tinggi.', '-', '-'),
(11, 'Pusat Analisis Perpustakaan dan Pengembangan Budaya Baca', 'Pusat Analisis Perpustakaan dan Pengembangan Budaya Baca mempunyai tugas melaksanakan perumusan dan pelaksanaan kebijakan, fasilitasi, bimbingan teknis, supervisi, dan evaluasi dan pelaporan di bidang analisis kebijakan perpustakaan dan pengembangan budaya baca.', '-', '-'),
(12, 'Pusat Data dan Informasi', 'Pusat Data dan Informasi mempunyai tugas melaksanakan perumusan dan pelaksanaan kebijakan, fasilitasi, bimbingan teknis, supervisi, dan evaluasi dan pelaporan di bidang pengelolaan data dan informasi perpustakaan.', '-', '-'),
(13, 'Pusat Pembinaan Pustakawan', 'Pusat Pembinaan Pustakawan mempunyai tugas melaksanakan perumusan dan pelaksanaan kebijakan, fasilitasi, bimbingan teknis, supervisi, dan evaluasi dan pelaporan di bidang pembinaan dan pengembangan pustakawan.', '-', '-'),
(14, 'Pusat Pendidikan dan Pelatihan', 'Pusat Pendidikan dan Pelatihan mempunyai tugas melaksanakan perumusan dan pelaksanaan kebijakan, fasilitasi, bimbingan teknis, supervisi, dan evaluasi dan pelaporan di bidang pendidikan dan pelatihan.', '-', '-'),
(15, 'Inspektorat', 'Inspektorat mempunyai tugas melaksanakan perumusan dan pelaksanaan kebijakan, fasilitasi, bimbingan teknis, supervisi, dan evaluasi dan pelaporan di bidang pengawasan internal.', '-', '-');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aktivasi`
--
ALTER TABLE `aktivasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelamar`
--
ALTER TABLE `pelamar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat_balasan`
--
ALTER TABLE `surat_balasan`
  ADD PRIMARY KEY (`id_surat_balasan`);

--
-- Indeks untuk tabel `surat_permohonan`
--
ALTER TABLE `surat_permohonan`
  ADD PRIMARY KEY (`id_permohonan`);

--
-- Indeks untuk tabel `unit_kerja`
--
ALTER TABLE `unit_kerja`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aktivasi`
--
ALTER TABLE `aktivasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pelamar`
--
ALTER TABLE `pelamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `surat_balasan`
--
ALTER TABLE `surat_balasan`
  MODIFY `id_surat_balasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `surat_permohonan`
--
ALTER TABLE `surat_permohonan`
  MODIFY `id_permohonan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `unit_kerja`
--
ALTER TABLE `unit_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

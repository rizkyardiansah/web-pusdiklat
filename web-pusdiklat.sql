-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jul 2021 pada 06.29
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(5) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `role_id`) VALUES
(1, 'Rina_Wahyuni@pusdiklat.com', 'rina123', 1),
(2, 'PUSDIKLAT@pusdiklat.com', 'pusdiklat', 2),
(7, 'muhammadrizkyardiansah93@gmail.com', '$2y$10$nW05HXtM1qi4tiUnHZz6l.Hn/9Axhu8.r72.l4.cm3xnhRXPz8Pa.', 3),
(10, 'sleepyweppy@gmail.com', '$2y$10$Zlr0yH4J4r0MSUndvS2zp.609Rx19ZuhwVY98ec6Yaw.UihpotWpa', 3);

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
  `no_surat_permohonan` varchar(70) DEFAULT NULL,
  `nama_file_khs` varchar(100) DEFAULT NULL,
  `nama_file_cv` varchar(100) DEFAULT NULL,
  `nama_file_surat_permohonan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelamar`
--

INSERT INTO `pelamar` (`id`, `nama`, `email`, `universitas`, `fakultas`, `prodi`, `nim`, `semester`, `no_telpon`, `no_surat_permohonan`, `nama_file_khs`, `nama_file_cv`, `nama_file_surat_permohonan`) VALUES
(5, 'Muhammad Rizky Ardiansah', 'muhammadrizkyardiansah93@gmail.com', 'Universitas Yarsi', 'Teknologi Informasi', 'Teknik Informatika', '1402018149', 6, '085972875509', 'N123/2/19/888', 'Pelamar_KHS_1627231664.pdf', 'Pelamar_CV_1627233612.pdf', 'Pelamar_SuratPermohonan_1627273458.pdf'),
(8, 'Madara Sasori', 'sleepyweppy@gmail.com', 'Universitas Negeri Konoha', 'Teknik Ninja', 'Anbu', '123465798', 6, '01010101010', NULL, 'Pelamar_KHS_1627236135.pdf', 'Pelamar_CV_1627236177.pdf', 'Pelamar_SuratPermohonan_1627236071.pdf');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pelamar`
--
ALTER TABLE `pelamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `unit_kerja`
--
ALTER TABLE `unit_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

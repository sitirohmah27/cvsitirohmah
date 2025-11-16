-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 16, 2025 at 01:46 PM
-- Server version: 8.0.30
-- PHP Version: 8.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cvclassa_siti_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `id` int NOT NULL,
  `nama_lengkap` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `no_telepon` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tentang_saya` text COLLATE utf8mb4_unicode_ci,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`id`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `no_telepon`, `email`, `linkedin`, `github`, `website`, `tentang_saya`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Siti Rohmah Ramadhanti', 'Pagar Alam', '2004-10-27', 'Perempuan', 'Jl. Gatot Subroto No. 45, Kelurahan Kuningan Barat, Kecamatan Mampang Prapatan, Kota Jakarta Selatan, DKI Jakarta 12710', '085798143004', 'sitirohmahramadhanti13@ummi.ac.id', 'https://linkedin.com/in/sitirohmahramadhanti', 'https://github.com/sitirohmahramadhanti', 'https://sitirohmahramadhanti.com', 'Saya adalah mahasiswa Teknik Informatika Universitas Muhammadiyah Sukabumi yang passionate dalam pengembangan web dan memiliki pengalaman organisasi yang kuat. Aktif sebagai Bendahara Umum di Himpunan Mahasiswa Teknik Informatika dan berpengalaman dalam manajemen keuangan organisasi.', 'sierra.jpg', '2025-11-16 13:02:35', '2025-11-16 13:02:35');

-- --------------------------------------------------------

--
-- Table structure for table `keahlian`
--

CREATE TABLE `keahlian` (
  `id` int NOT NULL,
  `biodata_id` int DEFAULT NULL,
  `kategori` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_skill` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkat_kemampuan` int DEFAULT '50',
  `urutan` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keahlian`
--

INSERT INTO `keahlian` (`id`, `biodata_id`, `kategori`, `nama_skill`, `tingkat_kemampuan`, `urutan`, `created_at`) VALUES
(1, 1, 'Office', 'Microsoft Excel', 85, 1, '2025-11-16 13:02:35'),
(2, 1, 'Office', 'Microsoft Word', 90, 2, '2025-11-16 13:02:35'),
(3, 1, 'Office', 'Microsoft PowerPoint', 90, 3, '2025-11-16 13:02:35'),
(4, 1, 'Programming', 'HTML', 80, 4, '2025-11-16 13:02:35'),
(5, 1, 'Programming', 'CSS', 80, 5, '2025-11-16 13:02:35'),
(6, 1, 'Programming', 'JavaScript Dasar', 70, 6, '2025-11-16 13:02:35'),
(7, 1, 'Programming', 'Web Development Dasar', 75, 7, '2025-11-16 13:02:35'),
(8, 1, 'Organizational', 'Manajemen Keuangan Organisasi', 85, 8, '2025-11-16 13:02:35'),
(9, 1, 'Organizational', 'Administrasi Dokumen', 90, 9, '2025-11-16 13:02:35'),
(10, 1, 'Soft Skill', 'Komunikasi & Kerja Tim', 85, 10, '2025-11-16 13:02:35'),
(11, 1, 'Soft Skill', 'Public Speaking Dasar', 75, 11, '2025-11-16 13:02:35'),
(12, 1, 'Soft Skill', 'Manajemen Waktu', 80, 12, '2025-11-16 13:02:35'),
(13, 1, 'Soft Skill', 'Problem Solving', 80, 13, '2025-11-16 13:02:35'),
(14, 1, 'Soft Skill', 'Manajemen Kepanitiaan', 85, 14, '2025-11-16 13:02:35');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` int NOT NULL,
  `biodata_id` int DEFAULT NULL,
  `institusi` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenjang` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jurusan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_mulai` year DEFAULT NULL,
  `tahun_selesai` year DEFAULT NULL,
  `ipk` decimal(3,2) DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `urutan` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `biodata_id`, `institusi`, `jenjang`, `jurusan`, `tahun_mulai`, `tahun_selesai`, `ipk`, `deskripsi`, `urutan`, `created_at`) VALUES
(1, 1, 'SDN Pangestu', 'SD', NULL, '2010', '2016', NULL, 'Lulus dengan prestasi akademik yang baik', 1, '2025-11-16 13:02:35'),
(2, 1, 'SMP Negeri 1 Sukalarang', 'SMP', NULL, '2016', '2019', NULL, 'Lulus dengan prestasi akademik yang baik', 2, '2025-11-16 13:02:35'),
(3, 1, 'SMA Negeri 1 Sukaraja', 'SMA', 'IPA', '2019', '2022', NULL, 'Lulus dengan prestasi akademik yang baik', 3, '2025-11-16 13:02:35'),
(4, 1, 'Universitas Muhammadiyah Sukabumi', 'S1', 'Teknik Informatika', '2023', '2027', 3.70, 'Fokus pada pengembangan web dan terlibat aktif dalam organisasi kemahasiswaan', 4, '2025-11-16 13:02:35');

-- --------------------------------------------------------

--
-- Table structure for table `pengalaman`
--

CREATE TABLE `pengalaman` (
  `id` int NOT NULL,
  `biodata_id` int DEFAULT NULL,
  `jenis` enum('Organisasi','Magang','Pekerjaan','Proyek') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_perusahaan` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posisi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_mulai` year DEFAULT NULL,
  `tahun_selesai` year DEFAULT NULL,
  `masih_aktif` tinyint(1) DEFAULT '0',
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `urutan` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengalaman`
--

INSERT INTO `pengalaman` (`id`, `biodata_id`, `jenis`, `nama_perusahaan`, `posisi`, `tahun_mulai`, `tahun_selesai`, `masih_aktif`, `deskripsi`, `urutan`, `created_at`) VALUES
(1, 1, 'Organisasi', 'OSIS SMPN 1 Sukalarang', 'Anggota', '2016', '2018', 0, 'Aktif dalam kegiatan organisasi OSIS tingkat SMP dan membantu pelaksanaan program sekolah', 1, '2025-11-16 13:02:35'),
(2, 1, 'Organisasi', 'MPK SMAN 1 Sukaraja', 'Anggota Bidang Pengawasan', '2019', '2021', 0, 'Mengawasi kinerja OSIS dan memastikan program berjalan sesuai aturan organisasi', 2, '2025-11-16 13:02:35'),
(3, 1, 'Organisasi', 'HARTIK (Himpunan Mahasiswa Tingkat I)', 'Staf Konsumsi', '2024', '2024', 0, 'Membantu pengelolaan kebutuhan konsumsi pada kegiatan HARTIK', 3, '2025-11-16 13:02:35'),
(4, 1, 'Organisasi', 'HARTIK (Himpunan Mahasiswa Tingkat I)', 'Bendahara', '2024', '2024', 0, 'Mengelola keuangan internal HARTIK dan penyusunan laporan dana', 4, '2025-11-16 13:02:35'),
(5, 1, 'Organisasi', 'MOTIF (Majelis Organisasi Teknik Informatika)', 'Bendahara Umum', '2024', '2025', 0, 'Mengatur arus kas organisasi dan memastikan transparansi laporan keuangan', 5, '2025-11-16 13:02:35'),
(6, 1, 'Organisasi', 'Himpunan Mahasiswa Teknik Informatika', 'Bendahara Umum', '2024', NULL, 1, 'Mengelola seluruh keuangan himpunan, membuat laporan rutin, dan mengawasi seluruh transaksi kegiatan', 6, '2025-11-16 13:02:35');

-- --------------------------------------------------------

--
-- Table structure for table `portofolio`
--

CREATE TABLE `portofolio` (
  `id` int NOT NULL,
  `biodata_id` int DEFAULT NULL,
  `judul` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `teknologi` text COLLATE utf8mb4_unicode_ci,
  `link_demo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_github` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun` year DEFAULT NULL,
  `urutan` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portofolio`
--

INSERT INTO `portofolio` (`id`, `biodata_id`, `judul`, `deskripsi`, `teknologi`, `link_demo`, `link_github`, `gambar`, `tahun`, `urutan`, `created_at`) VALUES
(1, 1, 'Landing Page Event Kampus', 'Landing page responsif untuk mempromosikan acara kampus dengan fokus pada UI/UX dan tampilan mobile friendly.', 'HTML, CSS, JavaScript', NULL, 'https://github.com/sitirohmahramadhanti/landingpage-event', 'landingpage_event.jpg', '2024', 1, '2025-11-16 13:02:35'),
(2, 1, 'Website Profil Himpunan Mahasiswa', 'Website sederhana untuk menampilkan informasi himpunan, struktur organisasi, galeri kegiatan, dan form kontak.', 'HTML, CSS, Bootstrap', NULL, 'https://github.com/sitirohmahramadhanti/himatif-web', 'himatif_web.jpg', '2024', 2, '2025-11-16 13:02:35'),
(3, 1, 'Mini Project To-Do List Web', 'Aplikasi sederhana untuk mencatat tugas harian, dibuat sebagai latihan JavaScript dan manipulasi DOM.', 'HTML, CSS, JavaScript', NULL, 'https://github.com/sitirohmahramadhanti/todolist-vanilla', 'todolist.jpg', '2023', 3, '2025-11-16 13:02:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keahlian`
--
ALTER TABLE `keahlian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `biodata_id` (`biodata_id`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `biodata_id` (`biodata_id`);

--
-- Indexes for table `pengalaman`
--
ALTER TABLE `pengalaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `biodata_id` (`biodata_id`);

--
-- Indexes for table `portofolio`
--
ALTER TABLE `portofolio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `biodata_id` (`biodata_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `keahlian`
--
ALTER TABLE `keahlian`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengalaman`
--
ALTER TABLE `pengalaman`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `portofolio`
--
ALTER TABLE `portofolio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keahlian`
--
ALTER TABLE `keahlian`
  ADD CONSTRAINT `keahlian_ibfk_1` FOREIGN KEY (`biodata_id`) REFERENCES `biodata` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD CONSTRAINT `pendidikan_ibfk_1` FOREIGN KEY (`biodata_id`) REFERENCES `biodata` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pengalaman`
--
ALTER TABLE `pengalaman`
  ADD CONSTRAINT `pengalaman_ibfk_1` FOREIGN KEY (`biodata_id`) REFERENCES `biodata` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `portofolio`
--
ALTER TABLE `portofolio`
  ADD CONSTRAINT `portofolio_ibfk_1` FOREIGN KEY (`biodata_id`) REFERENCES `biodata` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

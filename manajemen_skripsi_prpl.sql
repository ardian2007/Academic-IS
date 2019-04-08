-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Apr 2019 pada 07.52
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manajemen_skripsi_prpl`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `niy` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `bidang_keahlian` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`niy`, `nama`, `email`, `bidang_keahlian`) VALUES
('0006027001', 'Eko Aribowo, S.T., M.Kom', 'ekoab@tif.uad.ac.id', 'Kriptografi, Keamanan Komputer'),
('0014107301', 'Ali Tarmuji, S.T., M. Cs', 'alitarmuji@tif.uad.ac.id', 'Software Engineering, Web Engineering'),
('0015118001', 'Fiftin Noviyanto, S.T., M. Cs', 'fiftin.noviyanto@tif.uad.ac.id', 'Web Programming, Multimedia'),
('0019087601', 'Nur Rochmah Dyah Pujiastuti, S.T, M.Kom.', 'rochmahdyah@tif.uad.ac.id', 'Keamanan Sistem, CRM'),
('060150841', 'Adhi Prahara, S.Si., M.Cs.', 'adhi.prahara@tif.uad.ac.id', 'Softcomputing and Multimedia'),
('060150842', 'Dewi Pramudi Ismi, S.T., M.CompSc', 'dewi.ismi@tif.uad.ac.id', 'Sistem Cerdas'),
('60010308', 'Sri Handayaningsih, S.T., M.T.', 'sriningsih@tif.uad.ac.id', 'Enterprise Systems, Sistem Informasi, IT/IS Governance'),
('60010314', 'Taufik Ismail, S.T., M. Cs', 'taufiq@tif.uad.ac.id', 'Komunikasi Data, Jaringan Komputer, Grafika & Multimedia, Mobile Computing'),
('60020388', 'Sri Winiarti, S.T., M. Cs', 'sri.winiarti@tif.uad.ac.id', 'Sistem cerdas'),
('60030475', 'Drs. Tedy Setiadi, M.T', 'tedy.setiadi@tif.uad.ac.id', 'Sistem Informasi, Basis Data, Teknik Kompilasi, Data Mining'),
('60030476', 'Ardiansyah, S.T., M. Cs', 'ardi@uad.ac.id / ardian2007@gmail.com', 'Mobile Web Application Development, Software Enterpreneurship, Personal Finance Computing'),
('60030479', 'Muhammad Aziz, S.T., M. Cs', 'moch.aziz@tif.uad.ac.id', 'Computer Organization and Architecture, Technopreneurship, Geographic Information System (GIS)'),
('60030480', 'Ir. Ardi Pujiyanta, M. T.', 'ardipujiyanta@tif.uad.ac.id', 'Sistem Cerdas, Pemrograman Komputasi'),
('60040496', 'Murinto, S.Si., M. Kom', 'murintokusno[at]tif.uad.ac.id', 'Grafika Komputer, Pengolahan Citra, Computer Vision, Sistem Cerdas'),
('60040497', 'Dewi Soyusiawaty, S.T., M.T', 'dewi.soyusiawati@tif.uad.ac.id / my_soyus@yahoo.com', 'Softcomputing dan Multimedia, Bahasa Alami'),
('60090586', 'Arfiani Nur Khusna, S.T., M.Kom.', 'arfiani.khusna@tif.uad.ac.id', 'Sistem Informasi'),
('60110647', 'Anna Hendri Soleliza Jones, S. Kom, M.Cs.', 'annahendri@tif.uad.ac.id', 'Sistem Cerdas'),
('60110648', 'Herman Yuliansyah, S.T., M. Eng', 'herman.yuliansyah@tif.uad.ac.id / herman.yuliansyah@gmail.com', 'Basis Data, Pemrograman Web, Jaringan Komputer'),
('60130757', 'Andri Pranolo, S.Kom., M. Cs', 'andripranolo@tif.uad.ac.id / apranolo@gmail.com', 'Multimedia, Sistem Cerdas'),
('60150773', 'Lisna Zahrotun S.T., M.Cs.', 'lisna.zahrotun@tif.uad.ac.id', 'Data Mining, Text Mining, Sistem Pendukung Keputusan'),
('60160863', 'Ahmad Azhari, S.Kom., M.Eng.', 'ahmad.azhari@tif.uad.ac.id', 'Sistem Cerdas'),
('60160951', 'Ika Arfiani, S.T., M.Cs.', 'ika.arfiani@tif.uad.ac.id', 'Rekayasa Perangkat Lunak dan Data'),
('60160952', 'Supriyanto, S.T., M.T.', 'supriyanto@tif.uad.ac.id', 'Media Digital dan Game'),
('60160960', 'Murein Miksa Mardhia, S.T., M.T.', 'murein.miksa@tif.uad.ac.id', 'Sistem Cerdas'),
('60160978', 'Dwi Normawati, S.T., M.Eng.', 'dwinormawati6516@gmail.com', 'Data Mining'),
('60160979', 'Jefree Fahana, ST., M.Kom.', 'jefree.fahana@tif.uad.ac.id', 'Sistem Informasi'),
('60160980', 'Nuril Anwar, S.T.,M.Kom', 'nuril.anwar@tif.uad.ac.id', 'Computer Network & Security, Digital Forensics'),
('60910095', 'Drs. Wahyu Pujiyono, M. Kom', 'yywahyup@tif.uad.ac.id', 'Multimedia, Mobile, Enterprise System'),
('60960147', 'Mushlihudin, S.T., M.T.', 'mdin@ee.uad.ac.id', 'Security, Web, Networking'),
('60980174', 'Rusydi Umar, S.T., M.T, Ph.D.', 'rusydi.umar@tif.uad.ac.id', 'Grid Computing, Cloud Computing, Software Engineering');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen_penguji`
--

CREATE TABLE `dosen_penguji` (
  `niy_dosen_penguji` varchar(15) NOT NULL,
  `id_prodi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen_penguji`
--

INSERT INTO `dosen_penguji` (`niy_dosen_penguji`, `id_prodi`) VALUES
('60010308', '18'),
('60010314', '18'),
('60020388', '18'),
('60030475', '18'),
('60030476', '18'),
('60030479', '18'),
('60040497', '18'),
('60090586', '18'),
('60130757', '18'),
('60150773', '18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `logbook_bimbingan`
--

CREATE TABLE `logbook_bimbingan` (
  `id_logbook` int(10) NOT NULL,
  `materi_bimbingan` varchar(50) NOT NULL,
  `id_skripsi` varchar(10) NOT NULL,
  `tanggal_bimbingan` date NOT NULL,
  `jam` time NOT NULL,
  `jenis` enum('metopen','skripsi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','dosen','mahasiswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa_metopen`
--

CREATE TABLE `mahasiswa_metopen` (
  `nim` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `topik` varchar(100) NOT NULL,
  `dosen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa_metopen`
--

INSERT INTO `mahasiswa_metopen` (`nim`, `nama`, `topik`, `dosen`) VALUES
('1700018066', 'Pratomo Adi', 'Implementasi Teknologi Cloud Computing Pada Pemasaran Oleh-Oleh Berbasis Web', '60160863'),
('1700018067', 'Via Wahyuningtyas', 'Pembuatan Iklan Bencana Banjir Berbasis Multimedia', '60910095'),
('1700018068', 'Diky Syahrul', 'Manajemen Bandwidth Dan Optimalisasi Sistem Keamanan Pada Jaringan Komputer Dengan Winbox Menggunaka', '60160960'),
('1700018069', 'Wahyu Amin Mahmud', 'Pengamanan Account Sistem Informasi Akademik Online Sekolah Menengah Atas Dengan Menggunakan Metode ', '060150842'),
('1700018070', 'Zulfan Khaidir', 'Penerapan Seo (Search Engine Optimization) Pada Website Wedding Menggunakan Semantik Web', '060150841'),
('1700018071', 'Iis Sudianto', 'Pembuatan Media Pembelajaran Ilmu Tajwid Berbasis Audio Visual Menggunakan Macromedia Flash', '60960147'),
('1700018073', 'Murdheny', 'Media Pembelajaran Iqro Sebagai Sarana Mempelajari Huruf Al-Quran', '60160960'),
('1700018074', 'Yusuf Mahdiansyah', 'Penentuan Pemberian Obat Penderita Penyakit Pernapasan Pada Anak Menggunakan Puzzy Smart', '60980174'),
('1700018075', 'Rizki Akbari', 'Pengembangan Sistem Pakar Diagnosa Penyakit Gigi Berbasis Android', '60020388'),
('1700018076', 'Muhammad Rangga A.Z', 'Implementasi Algoritma Perangkingan Untuk Pencarian Kata Didalam Kamus Komputer Berbasis Android', '60130757'),
('1700018079', 'Syahrani Lonang', 'Pengembangan Sistem Pakar Diagnosa Penyakit Kulit Berbasis Mobile Web Pada Smartphone', '60030475'),
('1700018080', 'Zulfikar Yunus', 'Penggunaan Steganografi Dan Kriptografi Dalam Aplikasi Penyisipan Pesan Rahasia Pada Gambar Berbasis', '60030479'),
('1700018082', 'Tri Wahyuni', 'Pembuatan Aplikasi Sms Kriptografi Rsa Dengan Android', '60910095'),
('1700018086', 'M.Alif Rahmat Novian', 'Implementasi Supply Chain Management Untuk Stock Dan Pendistribusian Barang Berbasis Web', '60160863'),
('1700018087', 'Yunus Fajri', 'Pemanfaatan Aplikasi Mobile Android Oleh Asisten Laboratorium Dalam Aktivitas Praktikum', '60160979'),
('1700018089', 'Primadi Apriyanto', 'Pembangunan Sistem Informasi Manajemen Inventory Dengan Menggunakan Teknologi Webbase', '60160980'),
('1700018090', 'Nicky Dwi Rizky', 'Implementasi Windows Presentation Foundation (Wpf) Pada Sistem Informasi Penjualan Handycraft', '60160951'),
('1700018091', 'Iqbal Kurnia Dama', 'Implementasi Konsep E-Commerce Terhadap Rancang Bangun E-Mall System', '60150773'),
('1700018092', 'Iqbal Amanulloh', 'Pemilihan Template Website Pada Lumonata Webdesign And Design Graphis Menggunakan Metode Clustering', '60960147'),
('1700018093', 'Fadel Syahbana Tamran Putra', 'Membangun Aplikasi Multimedia Pembelajaran Bahasa Inggris Untuk Anak-Anak', '60160978'),
('1700018094', 'Panji Ragil Wibisono', 'Implementasi Keamanan Replikasi Site Active Directory Pada Windows Server 2008', '60150773'),
('1700018095', 'Adrianto Setyo Nugroho G.', 'Pengembangan Sistem Informasi Pemasaran Product Tour Dan Travel Berbasis Cloud Computing', '60010314'),
('1700018096', 'Bayu Tudo Prasetyo', 'Perancangan Perangkat Lunak Belajar Bahasa Mandarin', '60040496'),
('1700018101', 'M.Iqbal Hadiwibowo', 'Perancangan Perangkat Lunak Untuk Kompresi Data Dengan Menggunakan Metode Wavelet', '60040497'),
('1700018102', 'Teguh Pangestu', 'Perancangan Aplikasi Pengelola Keuangan Pada Komputer Menggunakan Java', '60030480'),
('1700018103', 'Rio Subandi', 'Perangkat Pemberi Pakan Ikan Pada Akuarium Dengan Menggunakan Mikrokontroler At328p-Au', '60090586'),
('1700018104', 'Agam Panuntas', 'Penggunaan Gps Dan Mac Address Sebagai Location Based Service Untuk Aplikasi Mobile', '60030476'),
('1700018105', 'Ainin Maftukhah', 'Rancang Bangun Aplikasi E-Voting Berbasis Web Service', '60110647'),
('1700018106', 'Brilian Anugra', 'Pembuatan Aplikasi Pembelajaran Interaktif Tembang Macapat Berbasis Adobe Flash', '60160980'),
('1700018107', 'Okky Alwi Dwi R.', 'Komputerisasi Sistem Persediaan Obat Pada Apotik Kimia Parma', '60160952'),
('1700018108', 'Feni Sastriani', 'Rancang Bangun Aplikasi Monitoring Service Pada Server Menggunakan Sms Gateway', '60110648'),
('1700018109', 'Muhammad Firdaus Fahrullah', 'Messanger Berbasis Client-Server Pada Lingkungan Bisnis Menggunakan Triple Transposition Vigenere Ci', '60160979'),
('1700018110', 'Syaifullah Ihsan', 'Pengembangan Keamanan Jaringan Intranet Dengan Metode Access Control List', '60010308'),
('1700018111', 'Mujahid Islami Primaldi Abdullah', 'Implementasi Kalender Mobile Pada Platform Android', '60130757'),
('1700018112', 'Mohammad Fitri Haikal H.S', 'Penerapan Metode Algoritma Genetika Untuk Pnjadwalan Pelatihan Karyawan', '60980174'),
('1700018113', 'Lutfi Purba Fitrianto', 'Sistem Pakar Diagnosa Penyakit Sapi Menggunakan Visual Basic 6.0', '60160952'),
('1700018114', 'Rizqa Tsaqila A.H', 'Implementasi Web Service Untuk Penunjang Sistem Informasi Executive', '60160951'),
('1700018115', 'Tri Subagio', 'Membuat Aplikasi Facebook Client Untuk Windows Phone', '60160978'),
('1700018116', 'Nanda Suci Pratiwi', 'Aplikasi Sistem Pemesanan Barang Pada The Code Manufacture Of Shoes And Bag Company Berbasis Android', '60020388'),
('1700018117', 'Muhammad Nashir A', 'Aplikasi Untuk Tempat Penimbunan Sementara Peti Kemas Berbasis Php', '60030480'),
('1700018118', 'Adil Baihaqi', 'Aplikasi Sistem Informasi Peta Digital Untuk Sekolah Menengah Atas', '60010314'),
('1700018120', 'Rizky Muhamad Hasan', 'Aplikasi Smart Card Untuk Kebutuhan Pelayanan Kesehatan', '60030476'),
('1700018121', 'Amir Fauzi Ansharif', 'Aplikasi Sistem Komputerisasi Modul Pembelajaran Berbasis Web', '60010314'),
('1700018122', 'Rafida Kumalasari', 'Rancang Bangun Sistem Informasi Kompetisi Bela Diri Berbasis Web', '0015118001'),
('1700018123', 'Nurfadhilah Alfianty F', 'Rancang Bangun Sistem Informasi Pemesanan Tiket Bus Berbasis Windows Mobile', '0019087601'),
('1700018124', 'Iftitah Dwi Ulumiyah', 'Aplikasi Sistem Penjualan Barang Berbasis Web', '60030475'),
('1700018125', 'Muhammad Satria Gradienta', 'Analisa Dan Perancangan Sistem Digital Watermarking Pada Citra Digital Dengan Metode Dct', '0006027001'),
('1700018126', 'Ennu Intan Iksan', 'Analisis Dan Implementasi Sistem Pemantau Ruangan Dengan Menggunakan Ip Camera Pada Sistem Operasi A', '0006027001'),
('1700018127', 'Ervin Fikot M', 'Analisis Dan Perancangan Akses Jarak Jauh Dengan Teknologi Vpn Pada Kantor Suku Dinas Kependudukan D', '0006027001'),
('1700018129', 'Heronitah Yanzyah', 'Analisis Troubleshooting Jaringan Komputer Lan Pada Pt Agna Preperindo Abadi Dengan Menggunakan Pake', '0014107301'),
('1700018130', 'Eef Mekeliano', 'Aplikasi Bimbingan Konseling Dalam Kesulitan Belajar Siswa Menggunakan Backward Chainning Berbasis W', '0014107301'),
('1700018131', 'Aditya Angga Ramadhan', 'Aplikasi Enkripsi Pesan Singkat Menggunakan Metode Triple Des Berbasis Android', '0015118001'),
('1700018133', 'Sandy Valentino Gerani', 'Aplikasi Game 3d Dengan Pemanfaatan Shiva Game Engine', '0015118001'),
('1700018135', 'Rizal Adijisman', 'Aplikasi Lowongan Pekerjaan Berbasis Mobile', '0019087601'),
('1700018137', 'Siti Issari  Sabhati', 'Sistem Informasi Pengelolaan Tanah Wakaf', '0014107301'),
('1700018139', 'Iqbal Manaf', 'Perancangan Dan Pembuatan Sistem Pendukung Keputusan Untuk Kenaikan Jabatan Dan Perencanaan Karir', '60040497'),
('1700018140', 'Nurzaitun Safitri', 'Aplikasi Mobile Banking Bri Berbasis Android', '0019087601'),
('1700018141', 'Siti Apryanti K', 'Sistem Informasi Berbasis Komputer di FISIPOL UAD', '0006027001'),
('1700018142', 'Muhammad Adi Rezky', 'Aplikasi Mobile Commerce Bookstore Online System Berbasis Wireless Application Protocol Dengan Mengg', '060150841'),
('1700018143', 'Agung Parmono', 'Aplikasi Pemetaan Daerah Tempat Penimbunan Sampah Berbasis Android', '060150841'),
('1700018144', 'Mochammad Yulianto Andi Saputro', 'Aplikasi Pengolahan Data Penentuan Jurusan Pada Sekolah Menengah Umum Menggunakan Metode Clustering', '060150842'),
('1700018146', 'Lalu Hendri Bagus Wira Setiawan', 'Aplikasi Penjualan Handphone Berbasis Web', '060150842'),
('1700018147', 'Ali Usman', 'Aplikasi Remote Desktop System Menggunakan Spyware Untuk Memonitoring Kegiatan Siswa Di Laboratorium', '60010308'),
('1700018148', 'Abima Nugraha', 'Aplikasi Pengamanan Data Menggunakan Algoritma Kriptografi Blowfish Dan Algoritma Steganografi Lsb P', '0015118001'),
('1700018152', 'Nofand Adlil Mukhollad', 'Aplikasi Sistem Administrasi Pembayaran Spp Pada Sekolah Menengah Kejuruan', '60010308'),
('1700018154', 'Ricco Yhandy Fernando', 'Aplikasi Untuk Mendiagnosa Penyakit Ayam Menggunakan Metode Fuzzy Logic', '60030479'),
('1700018155', 'Fitri Andini', 'Implementasi Web Service Untuk Sistem Informasi Akademik', '60040496'),
('1700018156', 'Randi Indraguna', 'Aplikasi Sistem Penunjang Keputusan Bagi Penentuan Ras Manusia Dengan Metode Forward Chaining', '60030475'),
('1700018158', 'Arifaleo Nurdin', 'Aplikasi Sms Gateway Untuk Sistem Informasi Pemesanan Tiket Pesawat', '60030479'),
('1700018159', 'Latifatul Mujahidah', 'Identifikasi Kerusakan Gangguan Sambungan Telephone Pada Pt.Telkom Menggunakan Rumus Euclidean Dista', '60110648'),
('1700018161', 'Isnan Arif Cahyadi', 'Rancangan Sistem Informasi Arsip Induk Langganan Berbasis Web', '60090586'),
('1700018162', 'Puspa Nutari', 'Rancang Bangun Sistem Informasi Perhitungan Zakat Berbasis Web', '60090586'),
('1700018163', 'Shindi Sri Wahyuni Pawah', 'Implementasi Algoritma K-Means Clustering Dalam Sistem Pemilihan Jurusan Di Smk', '60110648'),
('1700018164', 'Ancas Wasita Budi Cahya', 'Sistem Informasi Pendistribusian Obat Pada Dinas Kesehatan Berbasis Web', '60110647'),
('1700018165', 'Ihsan Fadhilah', 'Enkripsi-Dekripsi Data Dengan Menggunakan Metode Kriptografi Advanced Encryption Standard', '60110647'),
('1700018167', 'Adhymas Fajar Sudrajat', 'Aplikasi Sistem Siaran Stasiun Radio Dengan Live Streaming Client Berbasis Android', '60030476'),
('1700018168', 'Abdun Fattah Yolandanu', 'Aplikasi Travel Berbasis Web Dan Sms Gateway Menggunakan Metode Model View Controller', '60030480'),
('1700018169', 'Mariam Ulfa', 'Rancang Bangun Aplikasi Sistem Informasi Geografis Jalur Rawan Kemacetan Berbasis Web', '60040497'),
('1700018171', 'Rifka Riyani Radilla', 'Implementasi Web Service Pada Sistem Informasi Penjualan Menggunakan Asp.Net Dan Xml', '60040496'),
('1700018174', 'M.Andika Riski', 'Aplikasi Sistem Pencegahan Penanggulangan Dan Tanggap Darurat Terhadap Kebakaran Di Perpustakaan Pus', '60020388');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penguji`
--

CREATE TABLE `penguji` (
  `id_penguji` int(5) NOT NULL,
  `id_jadwal` varchar(50) NOT NULL,
  `niy` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjadwalan`
--

CREATE TABLE `penjadwalan` (
  `id_jadwal` varchar(50) NOT NULL,
  `jenis_ujian` enum('SEMPROP','UNDARAN') NOT NULL,
  `nim` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` enum('1','2','3','') NOT NULL,
  `tempat` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjadwalan`
--

INSERT INTO `penjadwalan` (`id_jadwal`, `jenis_ujian`, `nim`, `tanggal`, `jam`, `tempat`) VALUES
('UP3083142021', 'UNDARAN', '1700018123', '2019-03-20', '2', '1'),
('UP3083142031', 'UNDARAN', '1700018137', '2019-03-20', '3', '1'),
('UP3883142021', 'UNDARAN', '1700018122', '2019-03-20', '2', '1'),
('UP4754792022', 'UNDARAN', '1700018141', '2019-03-20', '2', '2'),
('UP5864792012', 'UNDARAN', '1700018148', '2019-03-20', '1', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` varchar(10) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama_prodi`) VALUES
('18', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `seminar_proposal`
--

CREATE TABLE `seminar_proposal` (
  `id_seminar` int(5) NOT NULL,
  `nilai` char(2) NOT NULL,
  `status` enum('lulus','tidak_lulus') NOT NULL,
  `nim` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `skripsi`
--

CREATE TABLE `skripsi` (
  `id_skripsi` varchar(10) NOT NULL,
  `judul_skripsi` varchar(50) NOT NULL,
  `status_skripsi` enum('sedang_skripsi','lulus') NOT NULL,
  `semester` varchar(4) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `jenis` enum('metopen','skripsi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujian_pendadaran`
--

CREATE TABLE `ujian_pendadaran` (
  `hasil` varchar(50) NOT NULL,
  `nilai` varchar(2) NOT NULL,
  `tanggal_ujian` date NOT NULL,
  `id_skripsi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`niy`);

--
-- Indeks untuk tabel `dosen_penguji`
--
ALTER TABLE `dosen_penguji`
  ADD PRIMARY KEY (`niy_dosen_penguji`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `niy_dosen_penguji` (`niy_dosen_penguji`);

--
-- Indeks untuk tabel `logbook_bimbingan`
--
ALTER TABLE `logbook_bimbingan`
  ADD PRIMARY KEY (`id_logbook`),
  ADD KEY `id_skripsi` (`id_skripsi`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_name`);

--
-- Indeks untuk tabel `mahasiswa_metopen`
--
ALTER TABLE `mahasiswa_metopen`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `Dosen` (`dosen`),
  ADD KEY `Dosen_2` (`dosen`);

--
-- Indeks untuk tabel `penguji`
--
ALTER TABLE `penguji`
  ADD PRIMARY KEY (`id_penguji`),
  ADD KEY `NIY` (`niy`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indeks untuk tabel `penjadwalan`
--
ALTER TABLE `penjadwalan`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `NIM` (`nim`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indeks untuk tabel `seminar_proposal`
--
ALTER TABLE `seminar_proposal`
  ADD PRIMARY KEY (`id_seminar`),
  ADD KEY `NIM` (`nim`);

--
-- Indeks untuk tabel `skripsi`
--
ALTER TABLE `skripsi`
  ADD PRIMARY KEY (`id_skripsi`),
  ADD KEY `NIM` (`nim`);

--
-- Indeks untuk tabel `ujian_pendadaran`
--
ALTER TABLE `ujian_pendadaran`
  ADD KEY `id_skripsi` (`id_skripsi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `logbook_bimbingan`
--
ALTER TABLE `logbook_bimbingan`
  MODIFY `id_logbook` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penguji`
--
ALTER TABLE `penguji`
  MODIFY `id_penguji` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `seminar_proposal`
--
ALTER TABLE `seminar_proposal`
  MODIFY `id_seminar` int(5) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dosen_penguji`
--
ALTER TABLE `dosen_penguji`
  ADD CONSTRAINT `dosen_penguji_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`),
  ADD CONSTRAINT `dosen_penguji_ibfk_2` FOREIGN KEY (`niy_dosen_penguji`) REFERENCES `dosen` (`niy`);

--
-- Ketidakleluasaan untuk tabel `logbook_bimbingan`
--
ALTER TABLE `logbook_bimbingan`
  ADD CONSTRAINT `logbook_bimbingan_ibfk_1` FOREIGN KEY (`id_skripsi`) REFERENCES `skripsi` (`id_skripsi`);

--
-- Ketidakleluasaan untuk tabel `mahasiswa_metopen`
--
ALTER TABLE `mahasiswa_metopen`
  ADD CONSTRAINT `mahasiswa_metopen_ibfk_1` FOREIGN KEY (`dosen`) REFERENCES `dosen` (`niy`),
  ADD CONSTRAINT `mahasiswa_metopen_ibfk_2` FOREIGN KEY (`dosen`) REFERENCES `dosen` (`niy`);

--
-- Ketidakleluasaan untuk tabel `penguji`
--
ALTER TABLE `penguji`
  ADD CONSTRAINT `penguji_ibfk_2` FOREIGN KEY (`niy`) REFERENCES `dosen_penguji` (`niy_dosen_penguji`);

--
-- Ketidakleluasaan untuk tabel `penjadwalan`
--
ALTER TABLE `penjadwalan`
  ADD CONSTRAINT `penjadwalan_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa_metopen` (`nim`);

--
-- Ketidakleluasaan untuk tabel `seminar_proposal`
--
ALTER TABLE `seminar_proposal`
  ADD CONSTRAINT `seminar_proposal_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa_metopen` (`nim`);

--
-- Ketidakleluasaan untuk tabel `skripsi`
--
ALTER TABLE `skripsi`
  ADD CONSTRAINT `skripsi_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa_metopen` (`nim`);

--
-- Ketidakleluasaan untuk tabel `ujian_pendadaran`
--
ALTER TABLE `ujian_pendadaran`
  ADD CONSTRAINT `ujian_pendadaran_ibfk_1` FOREIGN KEY (`id_skripsi`) REFERENCES `skripsi` (`id_skripsi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

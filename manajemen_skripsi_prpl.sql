-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2019 at 11:39 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manajemen_skripsi_rpl3`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `niy` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `bidang_keahlian` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
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
-- Table structure for table `dosen_penguji`
--

CREATE TABLE `dosen_penguji` (
  `niy_dosen_penguji` varchar(15) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `id_prodi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logbook_bimbingan`
--

CREATE TABLE `logbook_bimbingan` (
  `id_logbook` varchar(10) NOT NULL,
  `materi_bimbingan` varchar(50) NOT NULL,
  `id_skripsi` varchar(10) NOT NULL,
  `tanggal_bimbingan` date NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa_metopen`
--

CREATE TABLE `mahasiswa_metopen` (
  `nim` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `topik` varchar(100) NOT NULL,
  `dosen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penguji`
--

CREATE TABLE `penguji` (
  `id_penguji` int(5) NOT NULL,
  `id_jadwal` int(5) NOT NULL,
  `niy` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjadwalan`
--

CREATE TABLE `penjadwalan` (
  `id_jadwal` int(5) NOT NULL,
  `jenis_ujian` enum('seminar_proposal','ujian_pendadaran') NOT NULL,
  `nim` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `tempat` enum('Ruang_1','Ruang_2','Ruang_3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` varchar(10) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seminar_proposal`
--

CREATE TABLE `seminar_proposal` (
  `id_seminar` int(5) NOT NULL,
  `nilai` char(2) NOT NULL,
  `status` enum('lulus','tidak_lulus') NOT NULL,
  `nim` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skripsi`
--

CREATE TABLE `skripsi` (
  `id_skripsi` varchar(10) NOT NULL,
  `judul_skripsi` varchar(50) NOT NULL,
  `status_skripsi` enum('sedang_skripsi','lulus') NOT NULL,
  `semester` varchar(4) NOT NULL,
  `nim` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ujian_pendadaran`
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
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`niy`);

--
-- Indexes for table `dosen_penguji`
--
ALTER TABLE `dosen_penguji`
  ADD PRIMARY KEY (`niy_dosen_penguji`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `logbook_bimbingan`
--
ALTER TABLE `logbook_bimbingan`
  ADD PRIMARY KEY (`id_logbook`),
  ADD KEY `id_skripsi` (`id_skripsi`);

--
-- Indexes for table `mahasiswa_metopen`
--
ALTER TABLE `mahasiswa_metopen`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `Dosen` (`dosen`),
  ADD KEY `Dosen_2` (`dosen`);

--
-- Indexes for table `penguji`
--
ALTER TABLE `penguji`
  ADD PRIMARY KEY (`id_penguji`),
  ADD KEY `NIY` (`niy`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indexes for table `penjadwalan`
--
ALTER TABLE `penjadwalan`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `NIM` (`nim`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `seminar_proposal`
--
ALTER TABLE `seminar_proposal`
  ADD PRIMARY KEY (`id_seminar`),
  ADD KEY `NIM` (`nim`);

--
-- Indexes for table `skripsi`
--
ALTER TABLE `skripsi`
  ADD PRIMARY KEY (`id_skripsi`),
  ADD KEY `NIM` (`nim`);

--
-- Indexes for table `ujian_pendadaran`
--
ALTER TABLE `ujian_pendadaran`
  ADD KEY `id_skripsi` (`id_skripsi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penguji`
--
ALTER TABLE `penguji`
  MODIFY `id_penguji` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `penjadwalan`
--
ALTER TABLE `penjadwalan`
  MODIFY `id_jadwal` int(5) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosen_penguji`
--
ALTER TABLE `dosen_penguji`
  ADD CONSTRAINT `dosen_penguji_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`);

--
-- Constraints for table `logbook_bimbingan`
--
ALTER TABLE `logbook_bimbingan`
  ADD CONSTRAINT `logbook_bimbingan_ibfk_1` FOREIGN KEY (`id_skripsi`) REFERENCES `skripsi` (`id_skripsi`);

--
-- Constraints for table `mahasiswa_metopen`
--
ALTER TABLE `mahasiswa_metopen`
  ADD CONSTRAINT `mahasiswa_metopen_ibfk_1` FOREIGN KEY (`dosen`) REFERENCES `dosen` (`niy`),
  ADD CONSTRAINT `mahasiswa_metopen_ibfk_2` FOREIGN KEY (`dosen`) REFERENCES `dosen` (`niy`);

--
-- Constraints for table `penguji`
--
ALTER TABLE `penguji`
  ADD CONSTRAINT `penguji_ibfk_2` FOREIGN KEY (`niy`) REFERENCES `dosen_penguji` (`niy_dosen_penguji`),
  ADD CONSTRAINT `penguji_ibfk_3` FOREIGN KEY (`id_jadwal`) REFERENCES `penjadwalan` (`id_jadwal`);

--
-- Constraints for table `penjadwalan`
--
ALTER TABLE `penjadwalan`
  ADD CONSTRAINT `penjadwalan_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa_metopen` (`nim`);

--
-- Constraints for table `seminar_proposal`
--
ALTER TABLE `seminar_proposal`
  ADD CONSTRAINT `seminar_proposal_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa_metopen` (`nim`);

--
-- Constraints for table `skripsi`
--
ALTER TABLE `skripsi`
  ADD CONSTRAINT `skripsi_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa_metopen` (`nim`);

--
-- Constraints for table `ujian_pendadaran`
--
ALTER TABLE `ujian_pendadaran`
  ADD CONSTRAINT `ujian_pendadaran_ibfk_1` FOREIGN KEY (`id_skripsi`) REFERENCES `skripsi` (`id_skripsi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

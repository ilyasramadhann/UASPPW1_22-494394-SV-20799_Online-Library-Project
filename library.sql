-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 06:16 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `ID_ANGGOTA` varchar(50) NOT NULL,
  `NAMA_ANGGOTA` varchar(50) DEFAULT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `ALAMAT` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`ID_ANGGOTA`, `NAMA_ANGGOTA`, `USERNAME`, `PASSWORD`, `ALAMAT`) VALUES
('ilyasramadhannn', 'ilyas', 'ilyasramadhannn', 'ilyas', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `ID_BUKU` varchar(5) NOT NULL,
  `JUDUL_BUKU` varchar(50) DEFAULT NULL,
  `PENULIS` varchar(50) DEFAULT NULL,
  `TANGGAL_MASUK` date DEFAULT NULL,
  `JUMLAH_BUKU` int(11) DEFAULT NULL,
  `SINOPSIS` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`ID_BUKU`, `JUDUL_BUKU`, `PENULIS`, `TANGGAL_MASUK`, `JUMLAH_BUKU`, `SINOPSIS`) VALUES
('BK001', 'Laskar Pelangi', 'Andrea Hirata', '2023-03-10', 29, 'Novel Laskar Pelangi menceritakan kisah kehidupan 10 anak hebat yang memiliki semangat juang untuk tetap bersekolah di kampung Gantung, Kepulauan Bangka Belitung. Kesepuluh anak itu dinamai Laskar Pelangi, dan diantarnya bernama Ikal, Lintang, Sahara Aulia Fadillah, Mahar Ahlan, Syahdan Noor Aziz, Muhammad Jundullah Gufron Nur Zaman atau A kiong, Samson atau Borek, Mukharam Kudai Khairani, Trapani Ihsan Jamari, dan Harun Ardhili Ramadhan. Mereka semua bersekolah di SD Muhammadiyah Gantung dan dibimbing oleh Bu Muslimah dan Pak Harfan. Selama mereka bersekolah, mereka juga mendapatkan teman baru, seorang pindahan dari SD PN Timah bernama Flo. Cerita dimulai dari penerimaan siswa dan siswi baru di SD Muhammadiyah Gantung dimana hanya ada 9 orang murid yang mendaftat. Hal ini membuat Bu Muslimah, Pak Harfan, serta seluruh orang tua murid merasa cemas. Ini dikarenakan Pemerinta daerah setempat akan telah mengunumkan bahwa sekolah dasar Ini harus memiliki minmal 10 murid baru agar kegatan sekolah tetap berjalan. Karena murid ke 10 yang ditunggu tidak datang-datang juga, Dengan kekecewaan yang mendalam, Pak Harfan harus menetapkan keputusan yang berat. Namun, di tengah situasi tersebut, datanglah seorang murid baru yang menjadi penyelamat bagi sekolah, para murid baru, serta para orang tua atau wali. Murid ini bernama Harun Ardhli Ramadhan, seorang anak yang memiliki keterbelakangan mental namun memilki semangat yang tinggi untuk bersekolah. Kebersamaan mereka pun dimulai sejak saat itu. Selama menempuh pendidikan, Bu Muslimah dan Pak Harfan mengajar dan membimbing mereka dengan penuh semangat dan dedikasi. Para murid pun juga belajar dengan penuh semangat. Karena kekompakan dan semangat mereka, Bu Muslimah pun menjuluki mereka “Laskar Pelangi”. Tidak hanya Bu Muslimah dan Pak Harfan, SD Muhammadiyah Gantung juga memilki guru yang juga merangkap sebagai kepala sekolah bernama Pak Harfan Effendi Noor. Sama seperti kedua guru lainnya, beliau juga megajar dengan penuh semangat. Bahkan, beliau juga kerap kali menyelippkan kisah teladan nabi dan rasul. Di tengah keterbatasan yang ada, para anggota “Laskar Pelangi” harus menghadapi berbagai rintangan untuk menggapai mimpi mereka. Kisah perjalanan mereka akan diwarnai dengan berbagai macam pengalaman emosional baik itu yang membahagaikan maupun yang mengharukan.'),
('BK002', 'Rindu', 'Tere Liye', '2023-04-13', 43, 'Novel Rindu karangan Tere Liye ini menceritakan tentang perjalanan panjang sebuah kerinduan, yaitu sebuah kapal besar yang melakukan perjalanan haji selama 9 bulan. Pada tanggal 1 Desember 1938 pertama kalinya dalam sejarah kota Makassar disinggahi oleh sebuah kapal yang sangat besar pada zamannya. Ya, Blitar Holland namanya yang tertulis di awak kapal, dengan panjang 136 meter dan lebar 16 meter. Sebuah kisah perjalanan rasa rindu yang banyak menimbun beban dalam hati. Mulai dari Daeng Andipati pengusaha muda Makassar yang berencana memulai perjalanan panjang bersama istri dan dua anaknya, Elsa dan Anna. Lalu ada Gurutta (Ahmad Karaeng), mereka begitu berbahagia (kelihatannya) tapi dalam perjalanan panjang terkuak pertanyaan-pertanyaan. Namun tidak dengan Ambo Uleng, mantan pelaut yang menjadi kelasi di kapal Blitar Holland, terlihat diam dan tak banyak bicara. Ambo Uleng melakukan perjalanan ini bukan untuk ke suatu tujuan, namun untuk pergi menghilang dari kota asalnya meninggaalkan masa lalu yang menyesakkan. Karena perjalanan ini juga melibatkan anak-anak, sehingga Gurutta memberikan ide agar selama perjalanan anak-anak tetap bisa bersekolah dan mengaji. Maka datanglah tokoh Bonda Upe yang bersedia untuk mengajari anakanak mengaji tiap sore harinya. Kemudian dari perjalanan Surabaya -- Semarang, hadirlah tokoh Bapak Mangoenkoesoemo dan Bapak Soeryaningrat, dua tokoh pendidikan di Surabaya. Mereka yang akan bergantian mengajari anak-anak di sekolah kapal. Tokoh Mbah Kakung Slamet dan Mbah Putri Slamet hadir saat pelayaran rute Semarang -- Batavia. Kedua tokoh ini yang meramaikan suasana perjalanan di kapal dengan dijadikan bahan olokan dan becanda oleh Elsa dan Anna, kedua putri Daeng Andipati. Perjalanan kapal Blitar Holland merupakan perjalanan yang tak biasa, perjalanan panjang menuju tempat suci Mekkah, perjalanan lima tokoh dalam novel ini yang merindukan untuk mendapatkan suatu kedamaian di dalam hati masingmasing. Masing-masing dari mereka membawa beban berat karena pertanyaanpertanyaan di masa lalu yang belum terjawab. Terdapat 5 pertanyaan mengenai tentang apakah haji seorang cabo dapat diterima oleh Allah, apakah haji seseorang dapat diterima dengan membawa kebencian, apa yang harus dilakukan jika orang itu bukan jodoh kita, mengikhlasan kepergian orang yang kita sayang, bagaimana cara melawan kezaliman dan kemungkaran jika lisan tidak bisa menghentikannya. Semua pertanyaan itu sudah terjawab seiring dengan kepergian kapal itu menuju tanah suci. Kerinduan atas tanah suci selesai sudah. '),
('BK003', 'Bumi', 'Tere Liye', '2023-06-01', 0, 'Novel ini mengisahkan tentang petualangan 3 remaja yang berusia 15 tahun bernama Raib, Ali dan Seli. Namun mereka bukanlah remaja biasa, melainkan remaja yang memiliki kekuatan khusus seperti Raib yang bisa menghilang, Seli yang bisa mengeluarkan petir dan Ali seorang pelajar yang sangat jenius. Petualangan menjelajah dunia paralel mereka dimulai dari sini, dunia paralel yang pertama mereka jelajahi adalah Klan Bulan. \r\nTetapi mereka tidak hanya sekedar menjelajah saja, melainkan mereka harus bertarung untuk menyelamatkan dunia paralel dari orang-orang jahat. Orang-orang jahat tersebut yakni bernama Tamus. Tamus memiliki ambisi untuk menguasai dunia, oleh karena itu ia berusaha untuk membebaskan seorang pangeran yang sangat kuat dan memiliki ambisi yang sama. Pangeran tersebut sedang dipenjara yang disebut \"Penjara Bayangan dibawah Bayangan\". Pangeran tersebut bernama Si Tanpa Mahkota. '),
('BK004', 'Marmut Merah Jambu', 'Raditya Dika', '2022-09-30', 2, 'Suatu ketika Dika mengunjungi rumah Anjani Dina, ia adalah cinta pertamanya saat sekolah di bangku SMA. Saat berkunjung ke rumah Anjani, Dika membawa kerajinan tangan berupa seribu burung bangau dari kertas origami di tangan kanannya.\r\n\r\nSedangkan, di tangan kirinya Dika juga membawakan undangan pernikahan Anjani. Saat itu, kedatangannya diteima dengan baik oleh Bapak Anjani. Hanya saja, beliau sedikit curiga bahwa Dika ingin menggagalkan pernikahan anaknya.\r\n\r\nTetapi, Dika menjelaskan bahwa tujuannya ke rumah Anjani bukan untuk merusak acara pernikahan.\r\n\r\nDika menceritakan kepada Bapak Anjani, dahulu saat SMA memang ia jatuh cinta secara diam-diam kepada Anjani. Hingga Dika dan dua sahabatnya yaitu Bertus dan Cindy membuat grup tiga sekawan yang sering melakukan tindakan penyelidikan atau detektif.\r\n\r\nTetapi, tiga sekawan ini mengalami kesulitan dalam memecahkan masalah yang cukup sulit yaitu permasalahan grafiti tembok sekolah.\r\n\r\nTerdapat tulisan grafiti yang dianggap sebagai bentuk ancaman kepada Kepala Sekolah. Selama bertahun-tahun sampai lulus sekolah, Dika masih penasaran dengan gambar tersebut. Ternyata grafiti itu bukanlah gambar seorang iblis. Tetapi, merupakan gambar marmut yang bentuknya mirip seperti handuk yang diberikan oelh Cindy.\r\n\r\nKasus grafity pertama kali juga disampaikan oleh Cindy, Dika dan Bertus yang meneliti gambar tersebut dengan memahami per dua kata.\r\n\r\nTernyata setelah ditelusuri grafiti tersebut dibuat oleh Cindy sebagai surat cinta. Menurutnya cinta itu seperti marmut merah jambu yang berlarian kesana kemari tanpa berhenti.');

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `ID_JENIS` varchar(4) NOT NULL,
  `JENIS_DENDA` varchar(20) DEFAULT NULL,
  `BIAYA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kembali`
--

CREATE TABLE `kembali` (
  `ID_PINJAM` varchar(6) DEFAULT NULL,
  `ID_JENIS` varchar(4) DEFAULT NULL,
  `TANGGAL_KEMBALI` date DEFAULT NULL,
  `BIAYA_TOTAL` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `ID_PETUGAS` varchar(6) NOT NULL,
  `NAMA_PETUGAS` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `ID_PINJAM` varchar(50) NOT NULL,
  `ID_BUKU` varchar(5) DEFAULT NULL,
  `ID_ANGGOTA` varchar(50) DEFAULT NULL,
  `TANGGAL_PINJAM` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`ID_PINJAM`, `ID_BUKU`, `ID_ANGGOTA`, `TANGGAL_PINJAM`) VALUES
('64906f506df0b', 'BK001', 'ilyasramadhannn', '2023-06-03'),
('64906f7b47dc5', 'BK001', 'ilyasramadhannn', '2023-06-03'),
('64906f84b2844', 'BK001', 'ilyasramadhannn', '2023-06-01'),
('64906fb8cf113', 'BK001', 'ilyasramadhannn', '2023-06-01'),
('64906fd225f19', 'BK001', 'ilyasramadhannn', '2023-06-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`ID_ANGGOTA`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`ID_BUKU`);

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`ID_JENIS`);

--
-- Indexes for table `kembali`
--
ALTER TABLE `kembali`
  ADD KEY `ID_PINJAM` (`ID_PINJAM`),
  ADD KEY `ID_JENIS` (`ID_JENIS`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`ID_PETUGAS`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`ID_PINJAM`),
  ADD KEY `ID_BUKU` (`ID_BUKU`),
  ADD KEY `ID_ANGGOTA` (`ID_ANGGOTA`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kembali`
--
ALTER TABLE `kembali`
  ADD CONSTRAINT `kembali_ibfk_1` FOREIGN KEY (`ID_PINJAM`) REFERENCES `pinjam` (`ID_PINJAM`),
  ADD CONSTRAINT `kembali_ibfk_2` FOREIGN KEY (`ID_JENIS`) REFERENCES `denda` (`ID_JENIS`);

--
-- Constraints for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD CONSTRAINT `pinjam_ibfk_1` FOREIGN KEY (`ID_BUKU`) REFERENCES `buku` (`ID_BUKU`),
  ADD CONSTRAINT `pinjam_ibfk_2` FOREIGN KEY (`ID_ANGGOTA`) REFERENCES `anggota` (`ID_ANGGOTA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

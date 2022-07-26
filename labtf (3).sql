-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2022 at 11:14 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `labtf`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `name`) VALUES
(7, 'Hack The Brow {WEB}'),
(21, 'Local File Inclusion (LFI)'),
(8, 'Reconnaissance {WEB}'),
(20, 'SQL Injection');

-- --------------------------------------------------------

--
-- Table structure for table `challenges`
--

CREATE TABLE `challenges` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `flag` varchar(100) NOT NULL,
  `score` int(10) NOT NULL,
  `link` text,
  `cat_id` int(10) NOT NULL,
  `hint` varchar(225) DEFAULT NULL,
  `hintpoint` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `challenges`
--

INSERT INTO `challenges` (`id`, `title`, `description`, `flag`, `score`, `link`, `cat_id`, `hint`, `hintpoint`) VALUES
(15, '404 Page | Reconnaissance', 'OBYEKTIF\r\nUntuk tantangan ini, tujuan kamu adalah menghasilkan kesalahan 404/\"Tidak Ditemukan\" di situs web utama untuk pengintaian lab.\r\n\r\n404 HALAMAN\r\nHalaman Not Found/404 dapat membocorkan informasi tentang web stack yang digunakan oleh perusahaan atau aplikasi. Ini juga memungkinkan kamu untuk mendeteksi file yang ada ketika Anda memulai direktori bruteforcing. Inilah sebabnya mengapa penting untuk memeriksa seperti apa halaman 404 itu.', 'labs{r3c0n404}', 100, 'http://localhost/labs-recon/', 8, '-', 0),
(16, 'Security.txt | Reconnaissance', 'OBYEKTIF\r\nUntuk tantangan ini, tujuan Anda adalah mengambil keamanan.txt dari situs web utama untuk pengintaian lab.\r\n\r\nFILE KEAMANAN.TXT\r\nFile keamanan.txt digunakan untuk memberi tahu peneliti keamanan bagaimana mereka dapat mengungkapkan kerentanan untuk situs web. kamu dapat mempelajari lebih lanjut tentang itu di sini: securitytxt.org', 'labs{s3curityr3c0n}', 100, 'http://localhost/labs-recon/', 8, '-', 0),
(36, 'User-Agent | Br0w', 'Chall 1 â€” Clue : User-agent\r\nChange your user agent to br0wser\r\n', 'labs{br0wser#1}', 100, 'http://localhost/labs-master/challenge/brow/1.php', 7, 'use browser extension', 10),
(37, 'Post-Data | Br0w', 'Chall 2 â€” Clue : POST data\r\nChange your name on POST data to br0wser\r\n', 'labs{p0std4ta#2}', 100, 'http://localhost/labs-master/challenge/brow/2.php', 7, 'use inspect element', 0),
(38, 'Cookies | Br0w', 'Chall 3 â€” Clue : Cookie\r\nChange hackthebrowser cookie value to br0wser\r\n', 'labs{c00kieee#3}', 100, 'http://localhost/labs-master/challenge/brow/3.php', 7, 'use developer tools to change cookie', 10),
(39, 'Sensitive Directory | Reconnaissance', 'OBYEKTIF\r\nUntuk tantangan ini, tujuan Anda adalah menemukan direktori yang biasa digunakan untuk mengelola aplikasi.\r\n\r\nDIREKTORI YANG MENARIK\r\nSaat mengakses server web baru, sering kali terbayar untuk memeriksa beberapa direktori secara manual sebelum mulai melakukan brute force menggunakan alat. Misalnya, kamu dapat memeriksa /config/secara manual.', 'Flag', 100, 'http://localhost/labs-recon/', 8, 'admin', 5),
(40, 'HTTP Header Response | Reconnaissance', 'OBYEKTIF\r\nUntuk tantangan ini, tujuan Anda adalah mengakses header dari respons.\r\n\r\nINSPEKSI HEADER\r\nSaat mengakses server web, sering kali terbayar untuk memeriksa header respons. Adalah umum untuk menemukan informasi seputar versi dan teknologi yang digunakan.', 'labs{httph34der}', 100, 'http://localhost/labs-recon/', 8, 'gunakan cURL', 5),
(41, 'SQL Injection Login Bypass', 'From Login menjadi gerbang atau pintu yang akan membedakan dan memilah-milah pengunjung satu dengan yang lainnya, apakah dia hanya sebagai pengunjung biasa, user biasa (pengupdate), atau sebagai administrator, atau user dengan kategori lainnya.\r\n\r\nPada soal pertama ini kamu disuruh bisa menginjeksi form login untuk memaksa masuk ke dashboard admin dari web target.', 'flag{sqliiiil0gin}', 100, 'http://localhost/labs-sqli/login.php', 20, 'Gunakan komentar pada SQL seperti -- // ', 5),
(42, 'Local File Inclusion 0x1', 'Local File Inclusion (LFI) adalah kerentanan/vulnerability yang umum ditemukan pada aplikasi web. Kerentanan ini memungkinkan penyerang/attacker untuk menyertakan file lokal yang tersimpan di server agar dapat menjadi bagian dari proses eksekusi aplikasi.\r\n\r\nCarilah file sensitive pada server seperti config.txt dengan memanfaatkan jenis kerentanan ini', 'labs{lf1la4bsss}', 150, 'http://localhost/labs-master/challenge/lfi/?page=include.php', 21, 'Lihat directory path pada OS', 5),
(43, 'SQL Injection {UNION}', 'SQL injection menggunakan sitem union karena akan menggabungkan dua atau lebih perintah query. ', 'flag{sqliiiil4bs2}', 100, 'http://localhost/labs-sqli/index.php?id=1', 20, 'Flag ada dalam table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `title`, `deskripsi`) VALUES
(5, 'Is it free?', 'Yes, this is all free, we do not charge anything'),
(6, 'Is this legal?', 'Yes, all the files here are made to be cracked'),
(7, 'Can I publish these files?', 'Yes, you can publish this file anywhere, but please include the source and author'),
(8, 'Where do these files come from?', 'we take it from several sources for example\r\n<a href=\"https://crackmes.one\">Crackmes</a> of course we also include the source and author'),
(9, 'How do I post my files on this site?', 'if you want to share your work, you can contact the admin, via email tegaln00bshacker@gmail.com'),
(10, 'Some files have no information and any clue', 'Yes, but in some cases there is a README file / instructions in the archive'),
(12, 'My files are password protected', 'Some of the files here are password protected, you can enter the password crackmes.one/crackmes.de, and if that password can\'t open it try using tegal1337'),
(13, 'Can I submit the flags I found?', 'No, you can\'t send the flags of the file you downloaded yet, we are still under development'),
(16, 'Why can\'t I log in to my account?', 'It is possible that your account has been deleted, because it violates our terms, read more at\r\n<a href=\'rules.php\'>Rules</a>'),
(17, 'Can it be used for android devices?', 'No, this is for desktop devices only'),
(18, 'I can\'t register an account', 'Try not to use symbols or strange characters, and if you still can\'t register please contact the admin via email tegaln00bshacker@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `hintcollect`
--

CREATE TABLE `hintcollect` (
  `idhint` int(11) NOT NULL,
  `iduser` bigint(20) NOT NULL,
  `idchall` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hintcollect`
--

INSERT INTO `hintcollect` (`idhint`, `iduser`, `idchall`) VALUES
(1, 19, 17),
(4, 19, 17),
(5, 19, 18),
(6, 19, 17),
(7, 19, 17),
(8, 19, 20),
(9, 19, 18),
(10, 19, 18),
(11, 19, 17),
(12, 19, 17),
(13, 24, 40),
(14, 19, 41),
(15, 26, 42),
(16, 19, 43);

-- --------------------------------------------------------

--
-- Table structure for table `scoreboard`
--

CREATE TABLE `scoreboard` (
  `s_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `c_id` int(10) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scoreboard`
--

INSERT INTO `scoreboard` (`s_id`, `user_id`, `c_id`, `ts`) VALUES
(46, 19, 16, '2022-06-02 06:31:48'),
(47, 19, 15, '2022-06-02 06:32:24'),
(54, 24, 37, '2022-06-05 16:49:01'),
(55, 24, 40, '2022-06-05 18:58:21'),
(56, 24, 15, '2022-06-06 09:19:03'),
(57, 26, 41, '2022-06-10 16:18:04'),
(58, 26, 42, '2022-06-10 16:26:44'),
(59, 19, 43, '2022-06-11 14:43:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(10) DEFAULT 'user',
  `org` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `org`) VALUES
(1, 'Danang Avan Maulana', 'danangavanmaulana@gmail.com', 'admin', 'admin', ''),
(19, 'Ganti nama', 'victimx@xxxx.org', 'admin', 'user', 'Test coy'),
(24, 'Testing Akun', 'testingakun@gmail.com', 'testing', 'user', ''),
(25, 'sasas asasasa', 'asasasasa@sasasa.com', 'password', 'user', ''),
(26, 'jax ID', 'a2l083d@gmail.com', 'Kanbilonia08', 'user', ''),
(27, 'TEST TEST', 'testinggg@gmail.com', 'opoikimbuhhhhh', 'user', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `challenges`
--
ALTER TABLE `challenges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `hintcollect`
--
ALTER TABLE `hintcollect`
  ADD PRIMARY KEY (`idhint`),
  ADD KEY `iduser` (`iduser`),
  ADD KEY `idchall` (`idchall`);

--
-- Indexes for table `scoreboard`
--
ALTER TABLE `scoreboard`
  ADD PRIMARY KEY (`s_id`,`user_id`,`c_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `challenges`
--
ALTER TABLE `challenges`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `hintcollect`
--
ALTER TABLE `hintcollect`
  MODIFY `idhint` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `scoreboard`
--
ALTER TABLE `scoreboard`
  MODIFY `s_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `challenges`
--
ALTER TABLE `challenges`
  ADD CONSTRAINT `challenges_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE;

--
-- Constraints for table `scoreboard`
--
ALTER TABLE `scoreboard`
  ADD CONSTRAINT `scoreboard_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scoreboard_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `challenges` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

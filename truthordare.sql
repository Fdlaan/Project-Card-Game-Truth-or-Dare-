-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2024 at 04:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `truthordare`
--

-- --------------------------------------------------------

--
-- Table structure for table `dare_challenges`
--

CREATE TABLE `dare_challenges` (
  `id` int(11) NOT NULL,
  `dare_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dare_challenges`
--

INSERT INTO `dare_challenges` (`id`, `dare_text`) VALUES
(3, 'Buat suara bebek, tiap 1 menit sekali selama 10 menit'),
(4, 'Selfie dengan hewan apapun yang ada di sekitarmu, kemudian upload di sosmed!'),
(5, 'buat suara bebek, tiap 1 menit sekali selama 10 menit'),
(6, 'selfie dengan hewan apapun yang ada di sekitarmu , kemudian upload di sosmed!.'),
(7, 'ganti foto profil kamu dengan pemain yang berada duduk di sebelahkananmu!.'),
(8, 'ajak 3 orang berkenalan yang tidak kamu kenal yang berada di sekitarmu!.'),
(9, 'bicara hanya menggunakan huruf o selama 10 menit.'),
(10, 'joget tiktok dengan lagu/trend yang lagi viral.'),
(11, 'tetap dalam posisi berdiri sampai melewati giliran 5 orang pemain'),
(12, 'ambil beras 1 sendok makan lalu hitung jumlah butirnya dalam waktu 3 menit'),
(13, 'dalam waktu 30 detik, menangislah sampai bisa mengeluarkan air mata'),
(14, 'ganti foto profil WA kamu dengan foto pemain yang duduk di sebelah kiri kamu! (pertakankan selama 24 jam)'),
(15, 'stel lagu dangdut, lalu joget sampai melewati giliran 3 pemain'),
(16, 'gambar LOVE di jidat kamu menggunakan lipstik atau spidol, dan jangan di hapus sampai permainan berakhir'),
(17, 'ambil salah satu foto pemain, dan jadikan story IG/WA dengan caption \'kesayanganku\'!'),
(18, 'genggam tangan pemain lain yang ada di sebelah kananmu sampai melewati giliran 3 pemain'),
(19, 'cari lalu selfie dengan benda apapun yang berwarna ungu yang berada di sekitarmu (waktunya hanya 30 detik, lalu upload di sosmed kamu)'),
(20, 'ajak tos 3 orang yang tidak kamu kenal yang berada di sekitarmu!'),
(21, 'pasang status WA dengan lirik lagu kangen band yang berjudul pujaan hati (bagian reff nya saja)'),
(22, 'sebutkan 5 penyanyi indonesia yang namanya berawalan dari huruf A (waktunya hanya 15 detik)'),
(23, 'lari di tempat sampai melewati giliran 3 pemain'),
(24, 'stand up comedy di depan pemain lain sampai ada yang tertawa!'),
(25, 'Tiru salah satu foto yang ada di media sosialmu secara acak!');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `type` enum('Truth','Dare') NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `type`, `question`) VALUES
(27, 'Truth', 'Ceritakan pengalaman memalukan yang tidak bisa kamu lupakan?'),
(28, 'Truth', 'Jika kamu menemukan uang 100JT dijalan, apa yang akan kamu lakukan?'),
(29, 'Truth', 'ceritakan pengalaman memalukan yang tidak bisa kamu lupakan?'),
(30, 'Truth', 'jika kamu menemukan uang 100JT dijalan, apa yang akan kamu lakukan?'),
(31, 'Truth', 'sebutkan cinta pertamamu!!'),
(32, 'Truth', 'sebutkan 3 hal yang membuat kamu mudah emosi?'),
(33, 'Truth', 'ceritakan kejadian paling horor, mistis yang pernah kamu alami?'),
(34, 'Truth', 'tunjuk 1 pemain yang menurutmu lebih cantik/ ganteng dari kamu!'),
(35, 'Truth', 'jika kamu bisa pergi nge-date dengan artis idolamu, siapa artis yang akan kamu pilih?'),
(36, 'Truth', 'ceritakan mimpi yang paling aneh dan konyol yang pernah kamu alami'),
(37, 'Truth', 'ceritakan pengalaman paling memalukan yang tidak bisa kamu lupakan sampai sekarang!'),
(38, 'Truth', 'sebutkan nama cinta monyet pertamamu!'),
(39, 'Truth', 'kira-kira berapa lama kamu mampu bertahan tanpa memegang ponsel?'),
(40, 'Truth', 'sebutkan 5 tipe ideal untuk menjadi pasanganmu!'),
(41, 'Truth', 'ceritakan moment lucu masa kecil kamu yang tidak bisa kamu lupakan! '),
(42, 'Truth', 'sebutkan 5 hal yang membuat kamu takut!'),
(43, 'Truth', 'sebutkan negara yang ingin kamu kunjungi jika punya banyak uang!'),
(44, 'Truth', 'ceritakan moment paling bahagia yang membuat kamu ingin mengulangnya'),
(45, 'Truth', 'apakah kamu pernah merasa insecure?, saat apakah itu?'),
(46, 'Truth', 'jika kamu bisa kembali ke masa lalu, apa yang ingin kamu perbaiki?'),
(47, 'Truth', 'mana yang membuat kamu paling sedih? dibohongi atau ditinggalkan?'),
(48, 'Truth', 'dari semua pemain tunjuk 1 orang yang menurut kamu paling gabisa jaga rahasia!'),
(49, 'Truth', 'Kalau kamu tiba tiba bisa menghilang, apakah hal pertama yang akan kamu lakukan?');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dare_challenges`
--
ALTER TABLE `dare_challenges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dare_challenges`
--
ALTER TABLE `dare_challenges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

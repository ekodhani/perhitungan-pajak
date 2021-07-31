-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jul 2021 pada 11.16
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pph_pasal21`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama_client` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(25) NOT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `client`
--

INSERT INTO `client` (`id_client`, `nip`, `nama_client`, `alamat`, `no_telp`, `id_pegawai`) VALUES
(1, '8738912798', 'Amazon.com', 'West Grove, 6106', '0-306-480-1883', 12345),
(2, '871027303', 'ExxonMobil', 'Comet House  Crossroad, 899', '0-702-328-5037', 12345),
(3, '312312331', 'CarMax', 'Duthie   Way, 897', '2-408-788-5742', 12345),
(4, '890706123', 'Leadertech Consulting', 'Coalecroft  Avenue, 639', '4-440-673-8130', 32145),
(5, '12312313', 'Zepter', 'Beatty  Grove, 520', '4-482-557-5716', 32145),
(6, '12345678', 'Coca-Cola Company', 'Vine  Way, 898', '5-545-800-1124', 54321),
(7, '3081708', 'AECOM', 'Charnwood   Route, 5166', '7-202-134-0077', 54321),
(8, '137917798', 'Biolife Grup', 'Cheltenham  Tunnel, 7124', '8-143-381-4485', 67890),
(9, '1879217', 'Team Guard SRL', 'Cheltenham  Road, 5241', '8-835-738-3333', 67890),
(10, '131231231', 'Metro Cash&Carry', 'Linda   Tunnel, 926', '8-855-044-1081', 32145),
(12, '12171357', 'ucup.corp', 'nvhgvhbvhbbvbk', '089521649714', 54321),
(15, '9081238021890', 'PT. Maju Mundur', 'tangerang', '80321889800', 12345);

-- --------------------------------------------------------

--
-- Struktur dari tabel `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(26, 54321, 12345, 'bos ?'),
(27, 12345, 54321, 'ngapa ngab ?'),
(28, 54321, 12345, 'bab 1 kita gimana nih bos ?'),
(29, 12345, 54321, 'ya ga gimana gimana sih'),
(30, 54321, 12345, 'owhhh'),
(31, 54321, 12345, 'oghey ngab'),
(32, 12345, 54321, 'hia hia hia'),
(33, 67890, 12345, 'pak besok minggu ya kerkel ngerjain bab 1 di rumah lu ? sabi kan '),
(34, 12345, 67890, 'okeh boleh '),
(35, 67890, 12345, 'lu bisanya dari jam berapa sampe jam berapa rumah lu untuk di tamuin ?'),
(36, 12345, 67890, 'ya mulai dari jam 8 sih sabi'),
(37, 67890, 12345, 'owhh okeh deh thank you'),
(38, 54321, 12345, 'pak bos'),
(39, 54321, 12345, 'ini fitur chattingnya dah jadi nih'),
(40, 32145, 12345, 'heh anak intern'),
(41, 32145, 12345, 'nih ada kerjaan nih'),
(42, 67890, 12345, 'hayuk lah'),
(43, 12345, 54321, 'okeh dah kalo gitu good lah'),
(44, 12345, 54321, 'tapi jangan lupa ya fitur export excelnya'),
(45, 12345, 54321, 'sama apalagi ya ?? lupa saya nanti dah saya akan kabarin kamu kalau saya sudah ingat'),
(46, 32145, 12345, 'SOMBONG BANGET KAGA BALES'),
(47, 32145, 12345, 'WOYYYYY!!'),
(48, 12345, 54321, 'haiiii'),
(49, 54321, 12345, 'hai'),
(50, 32145, 12345, 'mell ini dhani eko');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `nama_pegawai` varchar(30) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip`, `nama_pegawai`, `jabatan`, `password`, `gambar`) VALUES
(1, 12345, 'Dhani', 'pegawai', '0ca5be35d2307c13991cd47cd765c1c1', 'dhani.jpg'),
(2, 32145, 'Meliana', 'intern', 'c5be13911d54b194b8283e23095076af', 'profile2.jpg'),
(3, 54321, 'Wiranto', 'bos', 'bce62663fe294e7affebe7d5c608b75e', 'wiranto-icon.jpg'),
(4, 67890, 'Kevin', 'manager', '9d5e3ecdeb4cdb7acfd63075ae046672', 'kevin.jpg'),
(5, 12171357, 'Ucup', 'Pengangguran', '73cf0e388971ee4ec34e8daedd0d36cc', 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai_client`
--

CREATE TABLE `pegawai_client` (
  `id_pegawai_client` mediumint(8) UNSIGNED NOT NULL,
  `nip_pegawai_client` varchar(13) DEFAULT NULL,
  `nama_pegawai_client` varchar(255) DEFAULT NULL,
  `status_npwp` enum('NPWP','Non NPWP') NOT NULL,
  `status_kawin` enum('TK','K','HB') NOT NULL,
  `tanggungan` enum('0','1','2','3') NOT NULL,
  `gaji` int(255) DEFAULT NULL,
  `tunjangan_lain` int(255) NOT NULL,
  `honorarium` int(255) NOT NULL,
  `premi_asuransi` int(255) NOT NULL,
  `bonus` int(255) NOT NULL,
  `no_telp_pegawai_client` varchar(100) DEFAULT NULL,
  `id_client` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai_client`
--

INSERT INTO `pegawai_client` (`id_pegawai_client`, `nip_pegawai_client`, `nama_pegawai_client`, `status_npwp`, `status_kawin`, `tanggungan`, `gaji`, `tunjangan_lain`, `honorarium`, `premi_asuransi`, `bonus`, `no_telp_pegawai_client`, `id_client`) VALUES
(176, '16910228 3141', 'Quinn', 'NPWP', 'TK', '0', 12000000, 0, 0, 0, 0, '066-700-9542', 1),
(177, '16310225 6637', 'Nero', 'NPWP', 'TK', '0', 5354, 0, 0, 0, 0, '019-706-4068', 2),
(178, '16150824 8810', 'Galvin', 'NPWP', 'TK', '0', 6901, 0, 0, 0, 0, '081-483-1811', 3),
(179, '16170124 1711', 'Marah', 'NPWP', 'TK', '0', 7164, 0, 0, 0, 0, '028-439-5272', 4),
(180, '16461102 9671', 'Vera', 'NPWP', 'TK', '0', 4607, 0, 0, 0, 0, '096-974-8065', 5),
(181, '16160425 2815', 'Keane', 'NPWP', 'TK', '0', 5655, 0, 0, 0, 0, '025-809-1806', 6),
(182, '16080412 4469', 'Harper', 'NPWP', 'TK', '0', 8746, 0, 0, 0, 0, '046-209-7986', 7),
(183, '16751114 4938', 'Raja', 'NPWP', 'TK', '0', 2179, 0, 0, 0, 0, '067-243-9962', 8),
(184, '16051212 1138', 'Damian', 'NPWP', 'TK', '0', 8247, 0, 0, 0, 0, '044-394-3814', 9),
(185, '16520527 1348', 'Deacon', 'NPWP', 'TK', '0', 3361, 0, 0, 0, 0, '016-178-9319', 10),
(186, '16941119 9749', 'Winter', 'NPWP', 'TK', '0', 7668, 0, 0, 0, 0, '096-176-0764', 1),
(187, '16710523 8351', 'Orli', 'NPWP', 'TK', '0', 4666, 0, 0, 0, 0, '038-768-4920', 2),
(188, '16981003 3580', 'Lillian', 'NPWP', 'TK', '0', 5021, 0, 0, 0, 0, '021-134-0943', 3),
(1116, '4996', 'Sophia', 'NPWP', 'TK', '0', 551432123, 0, 0, 0, 0, '(01) 3413 2808', 4),
(1142, '7009', 'Jacob', 'NPWP', 'TK', '0', 646435891, 0, 0, 0, 0, '(04) 2408 0543', 5),
(1498, '3048', 'Allen', 'NPWP', 'TK', '0', 621830017, 0, 0, 0, 0, '(05) 5528 4018', 6),
(1510, '5098', 'Kylynn', 'NPWP', 'TK', '0', 343885448, 0, 0, 0, 0, '(08) 6693 5528', 7),
(1784, '1569', 'Ignatius', 'NPWP', 'TK', '0', 49519747, 0, 0, 0, 0, '(03) 1544 3525', 8),
(1959, '6442', 'Warren', 'NPWP', 'TK', '0', 903332674, 0, 0, 0, 0, '(08) 6917 0396', 9),
(2180, '6756', 'Nissim', 'NPWP', 'TK', '0', 267767366, 0, 0, 0, 0, '(02) 0132 4004', 10),
(2524, '4192', 'Ocean', 'NPWP', 'TK', '0', 740110515, 0, 0, 0, 0, '(01) 9012 2007', 1),
(2673, '4776', 'Emmanuel', 'NPWP', 'TK', '0', 691408124, 0, 0, 0, 0, '(06) 2444 0110', 2),
(2676, '6786', 'Ariana', 'NPWP', 'TK', '0', 289088007, 0, 0, 0, 0, '(04) 9779 5721', 3),
(3144, '4318', 'Warren', 'NPWP', 'TK', '0', 659896617, 0, 0, 0, 0, '(07) 7641 5742', 4),
(3145, '9689', 'Lunea', 'NPWP', 'TK', '0', 658525035, 0, 0, 0, 0, '(08) 9969 0478', 5),
(3204, '1557', 'Colette', 'NPWP', 'TK', '0', 33438037, 0, 0, 0, 0, '(02) 0194 3162', 6),
(3321, '2626', 'Miranda', 'NPWP', 'TK', '0', 970973061, 0, 0, 0, 0, '(01) 6376 8659', 7),
(3485, '1350', 'Sean', 'NPWP', 'TK', '0', 998027601, 0, 0, 0, 0, '(02) 1725 4724', 8),
(3497, '7673', 'May', 'NPWP', 'TK', '0', 529652414, 0, 0, 0, 0, '(01) 7037 6399', 9),
(3758, '1589', 'Shea', 'NPWP', 'TK', '0', 839461225, 0, 0, 0, 0, '(06) 0852 1165', 10),
(4197, '4897', 'Theodore', 'NPWP', 'TK', '0', 452679491, 0, 0, 0, 0, '(05) 1077 1702', 1),
(4224, '4524', 'Veronica', 'NPWP', 'TK', '0', 703610964, 0, 0, 0, 0, '(03) 9952 0864', 2),
(4261, '9574', 'Rajah', 'NPWP', 'TK', '0', 583651468, 0, 0, 0, 0, '(09) 7559 4099', 3),
(4341, '4793', 'Avye', 'NPWP', 'TK', '0', 195691654, 0, 0, 0, 0, '(08) 9478 0991', 4),
(5225, '7140', 'Dominic', 'NPWP', 'TK', '0', 913281341, 0, 0, 0, 0, '(03) 5781 9856', 5),
(5863, '2471', 'Omar', 'NPWP', 'TK', '0', 220941611, 0, 0, 0, 0, '(01) 1552 4755', 6),
(5864, '2265', 'Yolanda', 'NPWP', 'TK', '0', 262175862, 0, 0, 0, 0, '(01) 0515 2395', 7),
(6546, '3904', 'Porter', 'NPWP', 'TK', '0', 863740072, 0, 0, 0, 0, '(07) 9951 9562', 8),
(6934, '2665', 'Kaseem', 'NPWP', 'TK', '0', 309330074, 0, 0, 0, 0, '(09) 9683 9996', 9),
(7163, '7621', 'Garrison', 'NPWP', 'TK', '0', 341396885, 0, 0, 0, 0, '(01) 7293 9427', 10),
(7200, '3357', 'Cassandra', 'NPWP', 'TK', '0', 825490535, 0, 0, 0, 0, '(08) 8061 7048', 1),
(7210, '5408', 'Zeus', 'NPWP', 'TK', '0', 462823287, 0, 0, 0, 0, '(08) 0631 4461', 2),
(7373, '6135', 'Sybill', 'NPWP', 'TK', '0', 879661478, 0, 0, 0, 0, '(01) 1489 6429', 3),
(7496, '2893', 'Wylie', 'NPWP', 'TK', '0', 100956564, 0, 0, 0, 0, '(06) 3138 9443', 4),
(7705, '6454', 'Evelyn', 'NPWP', 'TK', '0', 127141794, 0, 0, 0, 0, '(02) 5471 5735', 5),
(8026, '9668', 'Lavinia', 'NPWP', 'TK', '0', 507173060, 0, 0, 0, 0, '(05) 0278 7073', 6),
(8395, '7938', 'Cathleen', 'NPWP', 'TK', '0', 167939651, 0, 0, 0, 0, '(05) 6143 4981', 7),
(8471, '8222', 'Nehru', 'NPWP', 'TK', '0', 797267572, 0, 0, 0, 0, '(03) 3307 5781', 8),
(8499, '7762', 'Hermione', 'NPWP', 'TK', '0', 612908772, 0, 0, 0, 0, '(02) 4696 9058', 9),
(8669, '3287', 'Keiko', 'NPWP', 'TK', '0', 212007298, 0, 0, 0, 0, '(06) 8345 9440', 10),
(8721, '091800912', 'Hilda', 'NPWP', 'K', '2', 158832527, 0, 0, 0, 0, '78979878979', 1),
(9000, '5953', 'Eagan', 'NPWP', 'TK', '0', 3822301, 0, 0, 0, 0, '(02) 1151 0676', 2),
(9429, '4117', 'Daniel', 'NPWP', 'TK', '0', 820402444, 0, 0, 0, 0, '(01) 0193 7328', 3),
(9961, '2630', 'Xenos', 'NPWP', 'TK', '0', 590978383, 0, 0, 0, 0, '(05) 1134 7260', 4),
(9962, '1999122820211', 'Eko Nur Ramadhani', 'NPWP', 'K', '1', 10000000, 0, 0, 0, 0, '089521649714', 1),
(9964, '12345', 'carmux', 'NPWP', 'TK', '0', 5000000, 0, 0, 0, 0, '089521649714', 12),
(9969, '1231445', 'Rohman', 'Non NPWP', 'K', '1', 10000000, 5000000, 0, 3000000, 5000000, '098008080', 15),
(9970, '797798797789', 'Budi', 'NPWP', 'TK', '0', 5000000, 2000000, 0, 2000000, 2000000, '08970700070780', 15),
(9971, '12345', 'tai', 'NPWP', 'TK', '0', 15000000, 0, 0, 0, 0, '09031293012', 1),
(9972, '12877829', 'jsadskj', 'NPWP', 'TK', '0', 10000000, 0, 0, 0, 0, '89089869', 15),
(9973, '71298391279', 'budi', 'NPWP', 'K', '1', 50000000, 0, 0, 0, 0, '81890708707', 15),
(9974, '9876218977', 'hayuk', 'Non NPWP', 'K', '1', 10000000, 0, 0, 0, 0, '787897', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap`
--

CREATE TABLE `rekap` (
  `id_rekap` int(11) NOT NULL,
  `id_pegawai_client` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status_npwp` varchar(50) NOT NULL,
  `status_kawin` varchar(50) NOT NULL,
  `tanggungan` varchar(50) NOT NULL,
  `gaji` varchar(50) NOT NULL,
  `tunjangan_pph` varchar(50) NOT NULL,
  `tunjangan_lain` varchar(50) NOT NULL,
  `honor` varchar(50) NOT NULL,
  `premi` varchar(50) NOT NULL,
  `tantiem` varchar(50) NOT NULL,
  `bruto` varchar(50) NOT NULL,
  `biaya_jabatan` varchar(50) NOT NULL,
  `penghasilan_bruto_setahun` varchar(50) NOT NULL,
  `biaya_jabatan_setahun` varchar(50) NOT NULL,
  `jumlah_pengurang_setahun` varchar(50) NOT NULL,
  `penghasilan_neto` varchar(50) NOT NULL,
  `ptkp` varchar(50) NOT NULL,
  `pkp_setahun` varchar(50) NOT NULL,
  `pph_atas_pkp` varchar(50) NOT NULL,
  `pph_terutang_setahun` varchar(50) NOT NULL,
  `id_client` varchar(10) NOT NULL,
  `id_pegawai` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekap`
--

INSERT INTO `rekap` (`id_rekap`, `id_pegawai_client`, `nip`, `nama`, `status_npwp`, `status_kawin`, `tanggungan`, `gaji`, `tunjangan_pph`, `tunjangan_lain`, `honor`, `premi`, `tantiem`, `bruto`, `biaya_jabatan`, `penghasilan_bruto_setahun`, `biaya_jabatan_setahun`, `jumlah_pengurang_setahun`, `penghasilan_neto`, `ptkp`, `pkp_setahun`, `pph_atas_pkp`, `pph_terutang_setahun`, `id_client`, `id_pegawai`) VALUES
(18, '9970', '797798797789', 'Budi', 'NPWP', 'TK', '0', '5000000', '0', '2000000', '0', '2000000', '2000000', '11000000', '500000', '110000000', '5500000', '5500000', '104500000', '54000000', '50500000', '2525000', '2525000', '15', '12345'),
(19, '9962', '1999122820211', 'Eko Nur Ramadhani', 'NPWP', 'K', '1', '10000000', '0', '0', '0', '0', '0', '10000000', '500000', '120000000', '6000000', '6000000', '114000000', '63000000', '51000000', '2550000', '2550000', '1', '12345'),
(20, '9971', '12345', 'tai', 'NPWP', 'TK', '0', '15000000', '0', '0', '0', '0', '0', '15000000', '500000', '180000000', '6000000', '6000000', '174000000', '54000000', '120000000', '6000000', '6000000', '1', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `nip`, `email`, `token`, `date_created`) VALUES
(5, '12345', 'ekonurramadhani@gmail.com', 'XbljdtWPYOCnymF6t/ceyAFG1r9qyTdq4/xzZzY8Ok0=', 1620098473),
(6, '12345', 'ngodinglh@gmail.com', '5y0SKL6fPjpb0Zj4ipZS7zo4bBCN8Wu/RX0iM4Q+6Ko=', 1621515453),
(7, '12345', 'ngodinglh@gmail.com', 'M3JmVyI/sCTRKquAlw1oM/0HHADMGtkIDSXpQtiiCs8=', 1621515610),
(8, '12171357', 'ngodinglh@gmail.com', 'Ou5LDWarfSS0gpS6wj+trfQH6Dc6WRHng19bezwn3VI=', 1621515789),
(9, '12171357', 'ngodinglh@gmail.com', 'YjgqNQcBPiBk2AEByRYgp5EcKkVe+PeRHF0F0+59Xy0=', 1621515987),
(10, '12171357', 'wirantomarini@gmail.com', '5mI+r0pUyQvEBwyHPsbF3plncmJ6iT7LPOKXDdy/X6s=', 1621516078),
(11, '12171357', 'kevingiffary12@gmail.com', 'KM6GtTGObBOP9Qd/jPeQA6uY+Qu5jT9i3erRFMvtFW0=', 1621516482),
(12, '12345', 'ngodinglh@gmail.com', '2zyQWFgUnuOeFf14pn/e84XhWjQP28RClKb2XC+fULw=', 1621517425),
(13, '12345', 'ekodhani039@gmail.com', '3hw62VBCf8X3gx1aZJWZb31sXrcb9Q8V2pU3y0VYGP4=', 1621517464),
(14, '12345', 'ekonurramadhani@gmail.com', 'jH4bw3ckhdwXzFFBUop8gyVnYoDh+uO2nEroys53ZpI=', 1622025692),
(15, '12345', 'ekonurramadhani@gmail.com', 'EYD5Bz2Vy0Nxf/fXEyLM/ovJEjzxJcczABoPvZ4NfdY=', 1622026150),
(16, '12345', 'ekonurramadhani@gmail.com', 'JQE7vpY0z4uwg6ENpBBEK/7cKORCFGWTp+oQ4ozub54=', 1622026164),
(17, '12345', 'ekonurramadhani@gmail.com', 'AfeO9EuByxTNCVTkrQS5hjL6b2N6csoK9YHrDqqid0g=', 1622026222),
(18, '12345', 'wirantomarini@gmail.com', 'IK9dTUU0kUC82MwW+LklJKUppQhzuWJNwq6ZUqljhGc=', 1622026242),
(19, '12345', 'wirantomarini@gmail.com', '4EMX+PVOUZnZXSnWGiEzfzZsXAZZgdEkmKBiRReW+78=', 1622026317),
(20, '54321', 'wirantomarini@gmail.com', 'lBu7ww3EKKvVIui3MHgw4lGFxdl82fxRWjiK+TIBwjk=', 1622026356),
(21, '54321', 'ekonurramadhani@gmail.com', '31vSvS9EvzhRJLwdTv7ZKsGoDhZsjB+1Gt+ICSUUjEo=', 1622026442),
(22, '54321', 'ngodinglh@gmail.com', 'K/0wLPYGNk0dYvyxvftUW1WQDjFg375zxMo/Qjg/aRI=', 1622026486),
(23, '54321', 'lukmanf551@gmail.com', '1+zgSyyS9NlQIh/JxRd6uVqHqxA1LzufSsRelPBRs5c=', 1622026586),
(24, '12345', 'ekonurramadhani@gmail.com', 'ks4mf8qC9SJqOyhat2oOMD3BjtrufGc8z/D1XnsvBEo=', 1622106419),
(25, '54321', 'ekonurramadhani@gmail.com', 'bnaiKNYOj0pp/LuKKxIFZmBPXlqHqk+8GQBg/Jq5udE=', 1622106538),
(26, '12345', 'ekonurramadhani@gmail.com', 'zuI1PiRtEfkJr1Ues/gjbzTmUG2qST6iiEeR8ZUpGZw=', 1622106605),
(27, '12345', 'ekonurramadhani@gmail.com', 'NOZAQtuqI7e/vES2pPQagrpkVlChgyMkCcgV8xVa09M=', 1622106624),
(28, '12345', 'ekonurramadhani@gmail.com', 'PbI94Eywx7JiCT/NMtjDOUAZc51MVUpfu0OdlwPI03Q=', 1622106782),
(29, '12345', 'ekonurramadhani@gmail.com', 'OJ9QcyNt6cF1kIAZ/16D5SAFIY5BzNIanu0DAdTVb/E=', 1622106859),
(30, '12345', 'ekonurramadhani@gmail.com', 'x2vLOWJVNZMPTcykobPg9dDWqEtVUG2VEz/H8FCygYE=', 1622106905),
(31, '12345', 'ekonurramadhani@gmail.com', '5S2DfKqhAnvJWPU/hDzdc2YJI0yU9IT4ntpQO/m+jS0=', 1622106981),
(32, '12345', 'ekonurramadhani@gmail.com', 'Uper3Ts4OVotnqpmPPlqVEfzjdG+Eq+SJ5HMoMxz25c=', 1622107060),
(33, '12345', 'ekonurramadhani@gmail.com', '/uiGSZ4UN9GiY20FPIpK26gIYBbVLgmq8QdnLL4khTc=', 1622107628),
(34, '12345', 'ekonurramadhani@gmail.com', '7w2mIsKZosnM+sg7OXn5YAcRTywRFZ6jxlUuWvsquMg=', 1622107707),
(35, '12345', 'ekonurramadhani@gmail.com', 'hiGwlHS8wb1gygWCjemW3zCsAAALeM9DPcvl/oYEB1Q=', 1622107873),
(36, '12345', 'ekonurramadhani@gmail.com', 'uMcNoYx7MV4H567UoZUyUna68+IXldEIGunuRf3rGsU=', 1622107876),
(37, '12345', 'ekonurramadhani@gmail.com', 'ewLiaxK0gfwnU2PO8G/Qfn0RIl9/Jgppp7Tn2PUFmdA=', 1622108547),
(38, '12345', 'ekonurramadhani@gmail.com', 'ZKmCXquqqrT2beDdtEUOQfpzbwMqDbCDKEhytuF5Vmk=', 1622108621),
(39, '12345', 'ekonurramadhani@gmail.com', 'LeQpCfBGfSAS6LSypBUiORRjhVkxrQDfDbz6iPXHWPk=', 1622108721),
(40, '32145', 'ekonurramadhani@gmail.com', 'GpSqWJw+zgT1lN6e9Q2/WbsL1eut0iu9dIeNYfBlgsM=', 1622248492),
(41, '12345', 'ekonurramadhani@gmail.com', '2PFDY3Q4kPSi08VMQi7hSBs0oBPAqhGw5EkEPMVSWrQ=', 1622248689),
(42, '12345', 'ekonurramadhani@gmail.com', 'fBHsBR0ZoeWaPwAXdbZcd4ySb/YtfznptpDzwyyV0KQ=', 1622248759),
(43, '12345', 'wirantomarini@gmail.com', 'FhQ3ct1RuvwE0MP2dMAMAgfl92W9e7AM7V1CwF91Pd0=', 1622249007),
(44, '12345', 'ekonurramadhani@gmail.com', 'bDQ5eBPSFDNEp4oplkylX2ajdgP3/7VFeqrcOVmEJWc=', 1622249135),
(45, '12345', 'ekonurramadhani@gmail.com', '9e8xKLVDqh9uKtams3BXxP4VidKnvbz3Ej7pwAVO4+8=', 1623610758);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`),
  ADD KEY `no_telp` (`no_telp`) USING BTREE;

--
-- Indeks untuk tabel `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `pegawai_client`
--
ALTER TABLE `pegawai_client`
  ADD PRIMARY KEY (`id_pegawai_client`);

--
-- Indeks untuk tabel `rekap`
--
ALTER TABLE `rekap`
  ADD PRIMARY KEY (`id_rekap`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pegawai_client`
--
ALTER TABLE `pegawai_client`
  MODIFY `id_pegawai_client` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9975;

--
-- AUTO_INCREMENT untuk tabel `rekap`
--
ALTER TABLE `rekap`
  MODIFY `id_rekap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

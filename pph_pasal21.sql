-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Agu 2021 pada 15.55
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
(15, '9081238021890', 'PT. Maju Mundur', 'tangerang', '80321889800', 12345),
(16, '032542943', 'Astra', 'Jakarta', '9789107097', 12345);

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
(4, 67890, 'Kevin', 'manager', '9d5e3ecdeb4cdb7acfd63075ae046672', 'kevin.jpg');

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
(9969, '1231445', 'Rohman', 'Non NPWP', 'K', '1', 10000000, 5000000, 0, 3000000, 5000000, '098008080', 15),
(9970, '797798797789', 'Budi', 'NPWP', 'TK', '0', 5000000, 2000000, 0, 2000000, 2000000, '08970700070780', 15),
(9974, '9876218977', 'hayuk', 'Non NPWP', 'K', '1', 10000000, 0, 0, 0, 0, '787897', 15),
(9976, '9800128977181', 'Asep', 'NPWP', 'K', '1', 10000000, 0, 0, 0, 0, '1287189012089', 16);

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
(2, '9970', '797798797789', 'Budi', 'NPWP', 'TK', '0', '5000000', '0', '2000000', '0', '2000000', '2000000', '11000000', '500000', '110000000', '5500000', '5500000', '104500000', '54000000', '50500000', '2575000', '2575000', '15', '12345'),
(3, '9969', '1231445', 'Rohman', 'Non NPWP', 'K', '1', '10000000', '0', '5000000', '0', '3000000', '5000000', '23000000', '500000', '221000000', '6000000', '6000000', '215000000', '63000000', '152000000', '21360000', '21360000', '15', '12345');

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
(1, '12345', 'ekonurramadhani@gmail.com', '/miD85shJCCRGLcGJOpvM0BDFjaO4FEDFITx+tbcgns=', 1627431469),
(2, '12345', 'ekonurramadhani@gmail.com', 'iZzSCmYfkJXAab5+X/sgdam8VlMUyIMo6BVWfXEdXE4=', 1627716003),
(3, '12345', 'wirantomarini@gmail.com', 'os/b26ZAtPqxX5Mf+pudUfnlv8KZ8yfDiJhPyeElgMM=', 1628520271);

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
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pegawai_client`
--
ALTER TABLE `pegawai_client`
  MODIFY `id_pegawai_client` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9977;

--
-- AUTO_INCREMENT untuk tabel `rekap`
--
ALTER TABLE `rekap`
  MODIFY `id_rekap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

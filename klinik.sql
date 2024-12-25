-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Des 2024 pada 13.58
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` varchar(10) NOT NULL,
  `nm_obat` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `stok` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nm_obat`, `kategori`, `harga`, `stok`) VALUES
('o2', 'amoxcilin', 'tablet', '6000', 10),
('o3', 'promag', 'tablet', '8000', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` varchar(10) NOT NULL,
  `nm_pasien` varchar(50) NOT NULL,
  `jenis_kelamin` enum('perempuan','laki-laki','','') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_daftar` datetime NOT NULL DEFAULT current_timestamp(),
  `keluhan` text NOT NULL,
  `penanggung` enum('BPJS','Jampersal','Umum','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nm_pasien`, `jenis_kelamin`, `tgl_lahir`, `id_user`, `alamat`, `tgl_daftar`, `keluhan`, `penanggung`) VALUES
('P-01', 'nazila', 'perempuan', '2024-12-14', 'A2', 'kesesi', '2024-12-20 00:00:00', 'budrek', 'BPJS'),
('P-02', 'Kihajar', 'laki-laki', '2024-12-11', 'A2', 'bojong', '2024-12-21 00:00:00', 'budrek', 'Jampersal'),
('P-05', 'siti', 'perempuan', '2024-12-12', 'A2', 'kergon', '2024-12-19 00:00:00', 'sakit perut', 'BPJS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(10) NOT NULL,
  `id_pasien` varchar(10) NOT NULL,
  `id_users` varchar(10) NOT NULL,
  `total_harga` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_obat`
--

CREATE TABLE `pesanan_obat` (
  `id_pesanan_obat` varchar(10) NOT NULL,
  `id_riwayat` varchar(10) NOT NULL,
  `id_obat` varchar(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_kesehatan`
--

CREATE TABLE `riwayat_kesehatan` (
  `id_riwayat` varchar(10) NOT NULL,
  `id_pasien` varchar(10) NOT NULL,
  `id_obat` varchar(10) NOT NULL,
  `diagnosa` text NOT NULL,
  `tindakan` enum('Persalinan','KB','Imunisasi','Khitan','Massage','Terapi Ruqyah','Terapi Herbal','USG') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` varchar(10) NOT NULL,
  `nm_user` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','apoteker','bidan','') NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nm_user`, `password`, `role`, `foto`) VALUES
('A2', 'anggun', '$2y$10$JaNs88Tzpo8Dqzw/nKgffeMXCmznIdRNBIjYuBP2zinZnXjJobnpa', 'bidan', ''),
('A3', 'anggun', '$2y$10$iLBTv5doSqbO9vSzUDdrR.5SeYmB3IJKqupg3iBPoToISsGOsd9KC', 'bidan', ''),
('A5', 'irvan', '$2y$10$UozfdqFLti5DtzUHlxT86uhsM17LqrzIdWu9m9OaLuFgwedJL8zVu', 'admin', ''),
('A7', 'silfi', '$2y$10$m4Swf/xmC6iGhdJC9AUQXuY24yReMhd5MkHVOAzghVG.SvdnMlV4O', 'admin', ''),
('B1', 'rizki', '$2y$10$LrtY2QJvWv7GgdnQ1QZ8/ePJzf8ImwfHmU5YP/2wvai.nDU2CWLHm', 'bidan', ''),
('P1', 'syafila', '$2y$10$b0OKu9X2t3iYu1NlCDp.n.Ijxu5QRjpmOAbxc3.htWs1RjwPoW9Ze', 'apoteker', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_users` (`id_users`);

--
-- Indeks untuk tabel `pesanan_obat`
--
ALTER TABLE `pesanan_obat`
  ADD PRIMARY KEY (`id_pesanan_obat`),
  ADD KEY `id_riwayat` (`id_riwayat`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indeks untuk tabel `riwayat_kesehatan`
--
ALTER TABLE `riwayat_kesehatan`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `idx_nm_user` (`nm_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `pasien_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `pesanan_obat`
--
ALTER TABLE `pesanan_obat`
  ADD CONSTRAINT `pesanan_obat_ibfk_1` FOREIGN KEY (`id_riwayat`) REFERENCES `riwayat_kesehatan` (`id_riwayat`),
  ADD CONSTRAINT `pesanan_obat_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`);

--
-- Ketidakleluasaan untuk tabel `riwayat_kesehatan`
--
ALTER TABLE `riwayat_kesehatan`
  ADD CONSTRAINT `riwayat_kesehatan_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`),
  ADD CONSTRAINT `riwayat_kesehatan_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

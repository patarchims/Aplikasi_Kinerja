-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09 Agu 2019 pada 02.18
-- Versi Server: 5.5.61
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_users`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `golongan`
--

CREATE TABLE IF NOT EXISTS `golongan` (
  `id` int(11) NOT NULL,
  `nm_golongan` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `golongan`
--

INSERT INTO `golongan` (`id`, `nm_golongan`) VALUES
(1, 'Pembina Utama Muda (IV/c)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `id` int(11) NOT NULL,
  `nm_jabatan` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id`, `nm_jabatan`) VALUES
(1, 'Kepala Dinas'),
(4, 'Sekretaris');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kinerja`
--

CREATE TABLE IF NOT EXISTS `kinerja` (
  `id_kinerja` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `tanggal` date NOT NULL,
  `kegiatan` varchar(128) NOT NULL,
  `output` varchar(128) NOT NULL,
  `volume` int(225) NOT NULL,
  `satuan` varchar(225) NOT NULL,
  `keterangan` varchar(225) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kinerja`
--

INSERT INTO `kinerja` (`id_kinerja`, `email`, `tanggal`, `kegiatan`, `output`, `volume`, `satuan`, `keterangan`) VALUES
(4, 'patarchims@gmail.com ', '2019-08-06', 'Melakukan kegitan penyuluhan', 'Promosi Kesehatan Masyarakat', 5, 'paper', 'Sukses 4'),
(7, 'indrawawrdana@gmail.com ', '2019-08-07', 'Melakukan Panyuluhan dengan tema Peran ASI bagi anak', 'ASI itu penting', 5, 'Paper', 'Sukses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `nip` varchar(19) NOT NULL,
  `golongan` varchar(128) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `pendidikan` varchar(2) NOT NULL,
  `tmpt_lahir` varchar(128) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_hp` varchar(13) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`, `nip`, `golongan`, `jabatan`, `pendidikan`, `tmpt_lahir`, `tgl_lahir`, `no_hp`) VALUES
(1, 'Patar Chims', 'patarchims@gmail.com', 'PHOTO.jpg', '$2y$10$PeuOjcwj.gbPFHqq5IWGl.P93oNaMX8tX4lUlc4ISoVsuPGuH0T.e', 1, 1, 1561439715, '1272061506940004', 'Pembina Utama Muda (IV/c)', 'Kepala Dinas', 'S1', 'Pematangsiantar', '1994-06-15', '081264124653'),
(6, 'Indra Wardana 2', 'indrawawrdana@gmail.com', '01.jpg', '$2y$10$PeuOjcwj.gbPFHqq5IWGl.P93oNaMX8tX4lUlc4ISoVsuPGuH0T.e', 1, 1, 1561440948, '', 'Pembina Utama Muda (IV/c)', '', 'D1', '', '0000-00-00', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE IF NOT EXISTS `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(0, 3, 2),
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE IF NOT EXISTS `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(7, 'Direktur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(3, 'Direktur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE IF NOT EXISTS `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 0),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(10, 1, 'Jabatan', 'jabatan', 'fas fa-fw fa-user-friends', 1),
(12, 1, 'Golongan', 'admin/golongan', 'fas fa-fw fa-user-tag', 1),
(13, 2, 'Kinerja', 'user/kinerja', 'fas fa-fw fa-briefcase', 1),
(16, 1, 'Karyawan', 'karyawan', 'fas fa-fw fa-users', 1),
(17, 2, 'Change Password', 'user/changepassword', 'fas  fa-fw fa-key', 1),
(18, 7, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kinerja`
--
ALTER TABLE `kinerja`
  ADD PRIMARY KEY (`id_kinerja`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kinerja`
--
ALTER TABLE `kinerja`
  MODIFY `id_kinerja` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

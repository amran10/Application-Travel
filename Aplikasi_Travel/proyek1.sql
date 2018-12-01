-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06 Feb 2017 pada 17.01
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about`
--

CREATE TABLE `about` (
  `id_about` int(11) NOT NULL,
  `foto_about` mediumtext NOT NULL,
  `tentang` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `about`
--

INSERT INTO `about` (`id_about`, `foto_about`, `tentang`) VALUES
(2, 'LOGO KABUPATEN LANGKAT.png', 'Kabupaten Langkat adalah sebuah kabupaten yang terletak di Sumatera Utara, Indonesia. Ibu kotanya berada di Stabat. Kabupaten Langkat terdiri dari 23 Kecamatan dengan luas 6.272 km² dan berpenduduk sejumlah 902.986 jiwa (2000).\r\n\r\nNama Langkat diambil dari nama Kesultanan Langkat yang dulu pernah ada di tempat yang kini merupakan kota kecil bernama Tanjung Pura, sekitar 20 km dari Stabat. Mantan wakil presiden Adam Malik pernah menuntut ilmu di sini.\r\n\r\nPada masa Pemerintahan Belanda, Kabupaten Langkat masih berstatus keresidenan dan kesultanan (kerajaan) dengan pimpinan pemerintahan yang disebut Residen dan berkedudukan di Binjai dengan Residennya Morry Agesten. Residen mempunyai wewenang mendampingi Sultan Langkat di bidang orang-orang asing saja sedangkan bagi orang-orang asli (pribumi/ bumiputera) berada di tangan pemerintahan kesultanan Langkat.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `nama_bank` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`) VALUES
(1, 'BCA'),
(2, 'BRI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `foto_berita` mediumtext NOT NULL,
  `berita` longtext NOT NULL,
  `tgl_berita` date NOT NULL,
  `lat` varchar(500) NOT NULL,
  `lng` varchar(500) NOT NULL,
  `id_kecamatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `foto_berita`, `berita`, `tgl_berita`, `lat`, `lng`, `id_kecamatan`) VALUES
(18, 'IMG-20160911-WA0000.jpg', 'asasasasasa', '2016-12-30', '-32.7558350739173', '148.77286098897457', 6),
(19, 'IMG-20160914-WA0001.jpg', 'aasax', '2016-12-30', '1.8530890123119272', '99.2265173792839', 6),
(20, '1445919394915.jpg', 'cg vbn', '2017-01-03', '3.5572827265413047', '98.6572265625', 6),
(21, 'IMG-20160520-WA0003.jpg', 'Cards are a great way to display important pieces of content, and are quickly emerging as a core design pattern for apps. They''re are a great way to contain and organize information, while also setting up predictable expectations for the user. With so much content to display at once, and often so little screen realestate, cards have fast become the design pattern of choice for many companies, including the likes of Google, Twitter, and Spotify.\r\n\r\nFor mobile experiences, Cards make it easy to display the same information visually across many different screen sizes. They allow for more control, are flexible, and can even be animated. Cards are usually placed on top of one another, but they can also be used like a "page" and swiped between, left and right.', '2017-02-05', '-34.12999474582475', '150.17486572265625', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cradit`
--

CREATE TABLE `cradit` (
  `id_pembayaran` int(11) NOT NULL,
  `no_kartu` bigint(50) NOT NULL,
  `nama_pemilik` varchar(500) NOT NULL,
  `tanggal_valid` date NOT NULL,
  `cvv` int(11) NOT NULL,
  `nominal` bigint(100) NOT NULL,
  `keterangan` bigint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cradit`
--

INSERT INTO `cradit` (`id_pembayaran`, `no_kartu`, `nama_pemilik`, `tanggal_valid`, `cvv`, `nominal`, `keterangan`) VALUES
(4, 123456789010, 'Muammar Kadhafi', '2020-12-12', 120, 100000, 12011731062503),
(5, 123456789010, 'Muammar Kadhafi', '2020-12-12', 120, 100000, 12011731082639),
(6, 123456789010, 'Muammar Kadhafi', '2020-12-12', 120, 100000, 15011731112512),
(7, 123456789010, 'Muammar Kadhafi', '2020-12-12', 120, 100000, 6021728042501),
(8, 1000000102, 'fauzan azim', '2017-02-06', 102, 100000, 6021728043107),
(9, 123456789010, 'Muammar Kadhafi', '2020-12-12', 120, 500000, 6021728044713);

--
-- Trigger `cradit`
--
DELIMITER $$
CREATE TRIGGER `kredit` AFTER INSERT ON `cradit` FOR EACH ROW BEGIN
UPDATE pemesanan SET status = 'Sudah Bayar' where id_pemesan=new.keterangan;
UPDATE nasabah set saldo=saldo-new.nominal where no_kartu=new.no_kartu;
UPDATE nasabah set saldo=saldo+new.nominal where no_kartu=1234567890;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar`
--

CREATE TABLE `gambar` (
  `id_foto` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gambar`
--

INSERT INTO `gambar` (`id_foto`, `foto`, `nama`, `keterangan`, `id_kecamatan`, `lat`, `lng`) VALUES
(11, 'IMG-20160914-WA0000.jpg', 'asasa', 'xzxzxz', 6, '-2.9252735991371352', '103.9241724461317');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hubungin`
--

CREATE TABLE `hubungin` (
  `id_hubungi` int(11) NOT NULL,
  `nama` varchar(90) NOT NULL,
  `alamat` varchar(2000) NOT NULL,
  `email` varchar(255) NOT NULL,
  `keterangan` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hubungin`
--

INSERT INTO `hubungin` (`id_hubungi`, `nama`, `alamat`, `email`, `keterangan`) VALUES
(2, 'muaamar', 'medan', 'asas@asa.as', 'admin tolong update beritanya dong'),
(3, 'asa', 'asa', 'saasa@sas.asa', 'sas'),
(5, 'sasa', 'asas', 'asa@sas.asa', 'asas'),
(9, 'muamm', 'asas', 'asa@sas.asa', 'asas'),
(10, 'ssas', 'asasa', 'asa@sas.asa', 'zxxasaxa'),
(11, 'ewq`', 'AS', 'asa@sas.asa', 'sas'),
(12, 'xzz', 'aqs', 'saasa@sas.asa', 'asa'),
(13, 'sas', 'as', 'saasa@sas.asaa', 'saas'),
(14, 'zxxz', 'az', 'asa@sas.asa', 'scscz'),
(15, 'qs`q', 'sas', 'saasa@sas.asa', 'saas'),
(17, 'asas', 'ASSA', 'asa@sas.asa', 'ASSAS'),
(18, 'sasa', 'asasa', 'asa@sas.asa', 'assasas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `keterangan` longtext NOT NULL,
  `foto` longtext NOT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `kecamatan`, `keterangan`, `foto`, `lat`, `lng`) VALUES
(5, 'Stabat', 'Stabat adalah ibu kota Kabupaten Langkat Provinsi Sumatera Utara. Sebelumnya ibu kota Kabupaten Langkat berkedudukan di Kotamadya Binjai, namun sejak diterbitkannya Peraturan Pemerintah No. 5 Tahun 1982 kedudukan ibu kota Kabupaten Langkat dipindahkan ke Stabat.\r\n\r\nStabat merupakan kota Kecamatan terbesar sekaligus dengan jumlah penduduk terpadat di Kabupaten Langkat. Kegiatan perekonomiannya banyak bergerak di sektor perdagangan, pertanian dan peternakan, perkebunan dan jasa. Kecamatan ini dilalui oleh salah satu sungai terpanjang di Sumatera Utara yakni Sungai Wampu yang sekaligus memisahkan kecamatan ini dengan Kecamatan Wampu di sebelah barat. Stabat juga dilalui oleh Jalan Raya Lintas Sumatera (Jalinsum Lintas Pantai Timur).', 'WIN_20161118_194512.JPG', '3.750266110320966', '98.45290660858154'),
(6, 'Bahorok', 'Bahorok adalah sebuah kecamatan di Kabupaten Langkat, Sumatera Utara, Indonesia. Beribu kota di kelurahan Bahorok,sebagian wilayah kecamatan ini terletak di dalam Taman Nasional Gunung Leuser termasuk Bukit Lawang.', 'bkt2.jpg', '-34.46580632768851', '150.02655029296875'),
(7, 'Tanjung Pura', 'sasasasasasas \r\nsa\r\nsa\r\ns\r\nas\r\na\r\ns', 'WIN_20161118_194512.JPG', '3.8971380292192777', '98.42222213745117');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi_terdekat`
--

CREATE TABLE `lokasi_terdekat` (
  `id_lokasi` int(11) NOT NULL,
  `nama_lokasi` varchar(200) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lokasi_terdekat`
--

INSERT INTO `lokasi_terdekat` (`id_lokasi`, `nama_lokasi`, `id_kecamatan`, `lat`, `lng`) VALUES
(1, 'Masjid', 5, '-34.03900467904444', '150.32318115234375'),
(2, 'Masjid', 5, '3.7624707071792387', '98.45006346702576'),
(3, 'Widya tami Yunita', 6, '3.6024914832755206', '98.57033371925354'),
(4, 'medan', 5, '-3.5134210456400323', '104.23828125');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1474127343),
('m130524_201442_init', 1474127348);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nasabah`
--

CREATE TABLE `nasabah` (
  `no_rekening` bigint(50) NOT NULL,
  `no_kartu` bigint(50) NOT NULL,
  `tanggal_valid` date NOT NULL,
  `nama` varchar(500) NOT NULL,
  `cvv` int(11) NOT NULL,
  `saldo` int(11) NOT NULL,
  `status_kartu` varchar(20) DEFAULT 'Aktif',
  `bank_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nasabah`
--

INSERT INTO `nasabah` (`no_rekening`, `no_kartu`, `tanggal_valid`, `nama`, `cvv`, `saldo`, `status_kartu`, `bank_id`) VALUES
(1234567890, 1234567890, '2030-12-12', 'Belah Duren', 121, 303200000, 'Aktif', 1),
(81224885853, 1000000102, '2017-02-06', 'fauzan azim', 102, 900000, 'aktif', 1),
(123456789010, 123456789010, '2020-12-12', 'Muammar Kadhafi', 120, 196900000, 'Aktif', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `jenis_paket` varchar(800) NOT NULL,
  `harga` int(11) NOT NULL,
  `transportasi` int(11) NOT NULL,
  `deskripsi` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id_paket`, `jenis_paket`, `harga`, `transportasi`, `deskripsi`) VALUES
(1, 'satu hari', 100000, 1, 'asasasa'),
(2, '1 haria', 500000, 2, 'rentaltruck bebas bensin'),
(3, '1 hari dalam pesawat', 1800000, 3, 'bonus snack');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesan` bigint(50) NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `alamat_pemesan` varchar(500) NOT NULL,
  `email_pemasan` varchar(500) NOT NULL,
  `notel` varchar(50) NOT NULL,
  `status` varchar(100) DEFAULT 'Belum Bayar',
  `paket_id` int(11) NOT NULL,
  `tanngal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesan`, `nama_pemesan`, `alamat_pemesan`, `email_pemasan`, `notel`, `status`, `paket_id`, `tanngal`) VALUES
(5021728034909, 'sas', 'sas', 'as@asa.asa', '1212', 'Sudah Bayar', 1, '2017-02-05'),
(6021728042501, 'fauzan azim', 'jalan sariasih nomor 17c', 'fauzanazim714@gmail.com', '081224885853', 'Sudah Bayar', 1, '2017-02-06'),
(6021728043107, 'fauzan azim', 'jalan sariasih nomor 17cd', 'fauzanazim714@gmail.com', '081224885756', 'Sudah Bayar', 1, '2017-02-06'),
(6021728044713, 'Muammar Kadhafi', 'cjr17', 'khdafi5@gmail.com', '08199456789', 'Sudah Bayar', 2, '2017-02-06'),
(12011731062503, 'Gilang Romadhanu Tartila', 'Sarijadi Bandung', 'gilangromadhanutartila99@gmail.com', '82233138810', 'Sudah Bayar', 1, '2017-01-12'),
(12011731063347, 'Muammar Kadhafi', 'Sarijadi Bandung', 'gilangromadhanutartila99@gmail.com', '082233138810', 'Sudah Bayar', 1, '2017-01-12'),
(12011731080640, 'Gilang Romadhanu Tartila', 'Sarijadi Bandung', 'gilangromadhanutartila99@gmail.com', '082233138810', 'Sudah Bayar', 1, '2017-01-12'),
(12011731082639, 'Amer', 'Bandung', 'amer@amer.com', '998989', 'Sudah Bayar', 1, '2017-01-12'),
(15011731112512, 'fffdd', 'fjhj', 'tcucuttcu@vhvhh.jh', '76', 'Sudah Bayar', 1, '2017-01-15'),
(28011731014752, 'muammar', 'medan', 'kaka@kaka.ak', '121212', 'Sudah Bayar', 1, '2017-01-28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transfer`
--

CREATE TABLE `transfer` (
  `id_pembayaran` int(11) NOT NULL,
  `no_rekening` bigint(50) NOT NULL,
  `no_rekening_tujuan` bigint(50) NOT NULL,
  `nominal` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transfer`
--

INSERT INTO `transfer` (`id_pembayaran`, `no_rekening`, `no_rekening_tujuan`, `nominal`, `keterangan`) VALUES
(6, 123456789010, 1234567890, 200000, '2147483647'),
(7, 123456789010, 1234567890, 200000, '2147483647'),
(8, 123456789010, 1234567890, 200000, '5021728034909'),
(9, 123456789010, 1234567890, 200000, '12011731080640'),
(10, 123456789010, 1234567890, 1000000, '12011731063347'),
(11, 123456789010, 123456789010, 100000, '28011731014752');

--
-- Trigger `transfer`
--
DELIMITER $$
CREATE TRIGGER `transfer` AFTER INSERT ON `transfer` FOR EACH ROW BEGIN
UPDATE pemesanan SET status = 'Sudah Bayar' where id_pemesan=new.keterangan;
UPDATE nasabah set saldo=saldo-new.nominal where no_rekening=new.no_rekening;
UPDATE nasabah set saldo=saldo+new.nominal where no_rekening=1234567890;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transportasi`
--

CREATE TABLE `transportasi` (
  `id_transportasi` int(11) NOT NULL,
  `nama_transportasi` varchar(900) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transportasi`
--

INSERT INTO `transportasi` (`id_transportasi`, `nama_transportasi`) VALUES
(1, 'Mobil Avanza'),
(2, 'truck'),
(3, 'pesawat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', '--xuXeEO6hI1Zwm2r9ag9eNfaVVqK22I', '$2y$13$IZaPZZj07oYsgG8sIo8xweYXBOkMwqnGneFO04MJdlA5E/5tCGrTu', NULL, 'muammar@gmail.com', 10, 1474254809, 1474254809),
(2, 'muammar', 'OlBwjA8i3Qg-bvZ0MSTeM8jTQGXb7koZ', '$2y$13$z5dob8M978GqJyhpWsylJevDk8/f91KhVIq/i2fkulYCUPHaYBt.K', NULL, 'muammarkhdafi@yahoo.co.id', 10, 1486326969, 1486326969),
(3, 'fauzanazim21', 'uled-irMtP8CPV6uKFamTJrwbasmfIRf', '$2y$13$PZM4ChA5F6Jsiwp7avo85.zEQmCpmdUV4ewjPPdfOHJAlPY8mFaQW', NULL, 'fauzanazim714@gmail.com', 10, 1486391277, 1486391277);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id_about`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indexes for table `cradit`
--
ALTER TABLE `cradit`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `nama_pemilik` (`nama_pemilik`),
  ADD KEY `cvv` (`cvv`),
  ADD KEY `tanggal_valid` (`tanggal_valid`),
  ADD KEY `keterangan` (`keterangan`),
  ADD KEY `no_kartu` (`no_kartu`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indexes for table `hubungin`
--
ALTER TABLE `hubungin`
  ADD PRIMARY KEY (`id_hubungi`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `lokasi_terdekat`
--
ALTER TABLE `lokasi_terdekat`
  ADD PRIMARY KEY (`id_lokasi`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`no_rekening`),
  ADD UNIQUE KEY `no_kartu` (`no_kartu`),
  ADD UNIQUE KEY `tanggal_valid` (`tanggal_valid`),
  ADD UNIQUE KEY `cvv` (`cvv`),
  ADD UNIQUE KEY `nama` (`nama`),
  ADD KEY `bank_id` (`bank_id`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`),
  ADD KEY `transportasi` (`transportasi`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesan`),
  ADD KEY `paket_id` (`paket_id`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `no_rekening_tujuan` (`no_rekening_tujuan`),
  ADD KEY `no_rekening` (`no_rekening`);

--
-- Indexes for table `transportasi`
--
ALTER TABLE `transportasi`
  ADD PRIMARY KEY (`id_transportasi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id_about` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `cradit`
--
ALTER TABLE `cradit`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `hubungin`
--
ALTER TABLE `hubungin`
  MODIFY `id_hubungi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `lokasi_terdekat`
--
ALTER TABLE `lokasi_terdekat`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `transportasi`
--
ALTER TABLE `transportasi`
  MODIFY `id_transportasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`);

--
-- Ketidakleluasaan untuk tabel `cradit`
--
ALTER TABLE `cradit`
  ADD CONSTRAINT `cradit_ibfk_2` FOREIGN KEY (`nama_pemilik`) REFERENCES `nasabah` (`nama`),
  ADD CONSTRAINT `cradit_ibfk_3` FOREIGN KEY (`cvv`) REFERENCES `nasabah` (`cvv`),
  ADD CONSTRAINT `cradit_ibfk_4` FOREIGN KEY (`tanggal_valid`) REFERENCES `nasabah` (`tanggal_valid`),
  ADD CONSTRAINT `cradit_ibfk_5` FOREIGN KEY (`keterangan`) REFERENCES `pemesanan` (`id_pemesan`),
  ADD CONSTRAINT `cradit_ibfk_6` FOREIGN KEY (`no_kartu`) REFERENCES `nasabah` (`no_kartu`);

--
-- Ketidakleluasaan untuk tabel `gambar`
--
ALTER TABLE `gambar`
  ADD CONSTRAINT `gambar_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`);

--
-- Ketidakleluasaan untuk tabel `lokasi_terdekat`
--
ALTER TABLE `lokasi_terdekat`
  ADD CONSTRAINT `lokasi_terdekat_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`);

--
-- Ketidakleluasaan untuk tabel `nasabah`
--
ALTER TABLE `nasabah`
  ADD CONSTRAINT `nasabah_ibfk_1` FOREIGN KEY (`bank_id`) REFERENCES `bank` (`id_bank`);

--
-- Ketidakleluasaan untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD CONSTRAINT `paket_ibfk_1` FOREIGN KEY (`transportasi`) REFERENCES `transportasi` (`id_transportasi`);

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`paket_id`) REFERENCES `paket` (`id_paket`);

--
-- Ketidakleluasaan untuk tabel `transfer`
--
ALTER TABLE `transfer`
  ADD CONSTRAINT `transfer_ibfk_1` FOREIGN KEY (`no_rekening`) REFERENCES `nasabah` (`no_rekening`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

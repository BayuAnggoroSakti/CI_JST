-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2016 at 01:43 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jst`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
`id_berita` int(11) NOT NULL,
  `id_user` int(6) NOT NULL,
  `id_kateBer` int(3) NOT NULL,
  `judul_berita` varchar(300) NOT NULL,
  `isi_berita` text NOT NULL,
  `tanggal_berita` date NOT NULL,
  `status_terbit` enum('y','n') NOT NULL,
  `gambar` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_user`, `id_kateBer`, `judul_berita`, `isi_berita`, `tanggal_berita`, `status_terbit`, `gambar`) VALUES
(14, 1, 2, 'Alga Antarkan Yudisthira Raih Juara Pertama OSN', '<p><strong>DEPOK</strong>&nbsp;&ndash; Gara-gara alga, Yudisthira Octaviandie menjadi juara pertama Olimpiade Sains Nasional (OSN) Pertamina 2015 pada Bidang Teori Biologi. Mahasiswa jurusan Biologi Universitas Indonesia (UI) ini meraih hadiah uang tunai jutaan rupiah.</p>\r\n\r\n<p>Yudhistira mengaku, hanya butuh waktu tiga hari untuk menyiapkan makalah penelitiannya. Ia meneliti tentang sel surya biologis berbasis organisme.</p>\r\n\r\n<p>&quot;Ini sel surya yang dibuat dari mikroorganisme (cyano bacteria). Di Indonesia banyak, ada di perairan tawar dan laut. Istilah lain dari alga hijau biru,&quot; kata Yudisthira dalam acara pengumuman pemenang&nbsp;<a href="http://news.okezone.com/read/2015/11/27/65/1256747/jangan-jadi-mahasiswa-asal-asalan"><strong>Olimpiade Sains Nasional (OSN) Pertamina 2015</strong></a>, di kampus UI, Depok.</p>\r\n\r\n<p>Sebagai negara tropis, kata Yudisthira, Indonesia selalu dianugerai cahaya matahari sepanjang tahun. Apalagi sebagai negara maritim, alga mudah ditemukan di perairan Indonesia.</p>\r\n\r\n<p>&quot;Ini potensial dikembangkan. Untuk pengembangannya ditinjau dari sisi sains sangat mungkin dikembangkan. Tetapi secara ekonomis, belum diperhitungkan,&quot; ungkapnya.</p>\r\n\r\n<p>Yudisthira menambahkan, nilai lebih penelitiannya dengan alga membuat bahan baku sel surya tetap berkelanjutan. Sementara jika menggunakan silikon, akan menjadi limbah.</p>\r\n\r\n<p>&quot;Sel surya dari silikon hanya bertahan selama 10 tahun. Tetapi kalau ini bahannya bukan kimia, hasilnya pun berkelanjutan sehingga ramah lingkungan,&quot; kata mahasiswa semester tiga tersebut.</p>\r\n\r\n<p>Cowok kelahiran Samarinda 3 Oktober 1997 itu mengklaim, penelitiannya merupakan sesuatu yang baru di Indonesia meski sudah dikembangkan di negara Jerman. Selain itu, dia memberi nilai kebaruan pada alga.</p>\r\n\r\n<p>&quot;Kali ini alga dijadikan sel surya. Biasanya kan untuk biofuel atau biodiesel. Jadi, mahasiswa lain juga bisa melakukan hal yang sama; terus belajar, temukan, kembangkan,&quot; tutupnya.</p>\r\n\r\n<p><strong>(rfa)</strong></p>\r\n\r\n<p>Marieska Harya Virdhani -&nbsp;Jurnalis</p>\r\n', '2016-03-08', 'y', 'gambar-08032016062141.jpg'),
(15, 1, 2, 'Sembilan Siswa Papua Berlaga di OSN Provinsi', '<p><strong>JAKARTA&nbsp;</strong>- Sembilan siswa mewakili Kota Jayapura pada Olimpiade Sains Nasional (OSN) tingkat Provinsi Papua yang akan digelar Maret mendatang. Mereka merupakan bagian dari 935 siswa yang mengikuti OSN dari 19 SMA yang ada di Ibu Kota Provinsi Papua belum lama ini.</p>\r\n\r\n<p>&quot;Tentunya sembilan siswa itu merupakan peraih hasil tertinggi dari sejumlah mata pelajaran yang dilombakan dalam OSN tingkat kota tersebut,&quot; kata Kepala Dinas Pendidikan Kota Jayapura I Wayan Mudiyasa MMPd, di Kota Jayapura.</p>\r\n\r\n<p>Menurut Mudiyasa, kesembilan siswa itu nantinya akan &quot;digembleng&quot; terlebih dahulu sebelum berlomba di OSN tingkat Provinsi Papua. Diharapkan, mereka bisa mempertahankan gelar juara umum yang diraih pada musim lalu.</p>\r\n\r\n<p>Menyinggung soal hasil OSN tahun ini, Mudiyasa yang merupakan guru Fisika itu mengaku, agak terkejut dengan hasil yang diraih oleh siswa binaannya. &quot;Saya memang agak kecewa karena hasil OSN tahun ini terutama mata pelajaran Matematika dan Fisika, hasilnya tidak maksimal,&quot; katanya.</p>\r\n\r\n<p>Untuk itu, dalam waktu dekat mantan Kepala SMAN 4 Kota Jayapura itu akan menggelar pertemuan dengan sejumlah guru mata pelajaran guna mencari tahu penyebabnya. Apakah karena soal yang diberikan pada OSN tahun ini sangat sulit dari tahun sebelumnya atau ada hal lainnya yang memengaruhi siswa dalam menyelesaikan soal.</p>\r\n\r\n<p>&quot;Memang hasil yang ditunjukkan kepada saya itu, khususnya dua mata pelajaran nilainya sangat menurun, padahal berbagai kesiapan sudah dilakukan oleh sekolah terkait, termasuk menggandeng Lembaga Olimpiade Pendidikan Indonesia (LOPI),&quot; katanya.</p>\r\n\r\n<p>Ke depan, lanjut pria paruh bayah asal Bali itu, Dinas Pendidikan Kota Jayapura akan bekerjasama dengan salah satu kampus ternama di Papua guna membina dan membimbing siswanya untuk bisa mengikuti tes berikutnya.</p>\r\n\r\n<p>&quot;Saya juga akan minta&nbsp;<em>plotting</em>&nbsp;dana dari BOS masing-masing sekolah, guna mempersiapkan siswa ikuti OSN pada tahun berikutnya,&quot; katanya.</p>\r\n\r\n<p>Mudiyasa menambahkan, hasil OSN akan diumumkan dalam waktu dekat ini. Nama kesembilan siswa itu akan diketahui publik, termasuk sekolah mana yang menjadi juara umum.</p>\r\n\r\n<p><strong>(rfa)</strong></p>\r\n', '2016-03-08', 'y', 'gambar-08032016062426.jpg'),
(17, 1, 2, '15 Wakil Perguruan Tinggi Unjuk Kebolehan di Ajang OSN', '<p><strong>DEPOK&nbsp;</strong>- Sebanyak 15 kelompok mahasiswa dari berbagai perguruan tinggi se-Indonesia unjuk kebolehan di Wisma Makara Universitas Indonesia (UI) dalam ajang Olimpiade Sains Nasional (OSN) Pertamina 2014. Di antaranya dari ITB, Universitas Mulawarman, Universitas Hassanudin, dan Universitas Jenderal Soedirman.</p>\r\n\r\n<p>Masing - masing menampilkan hasil penelitiannya seputar inovasi energi terbarukan. Para pemenang Kategori Teori di Babak Penyisihan selanjutnya akan mengikuti ujian seleksi Babak Grand Final yang mengkompetisikan 24 orang peserta Kategori Teori dan 15 tim Proyek Sains dimana 1 tim terdiri dari 3 orang. Para pemenang di babak Grand Final ini nantinya merupakan Juara 1, 2 dan 3 Kategori Teori Bidang Matematika, Fisika, Kimia, dan Biologi serta Juara 1, 2 dan 3 Kategori Proyek Sains Bidang Aplikasi Perangkat Lunak (APL), Bidang Produk Unggulan (PU) dan Bidang Rancang Bangun (RB).</p>\r\n\r\n<p>&quot;OSN Pertamina 2014 mengangkat tema Inovasi Sobat Bumi Untuk Masa Depan Generasi pada tahun ini telah menginjak tahun ke-tujuh pelaksanaannya. OSN Pertamina diselenggarakan oleh PT. Pertamina (Persero) bersama Universitas Indonesia sebagai mitra kerjasama yang didukung penuh oleh Direktorat Jenderal Pendidikan Tinggi Kemendiknas dan Perguruan Tinggi seluruh Indonesia. OSN Pertamina merupakan program CSR Bidang Pendidikan PT. Pertamina sebagai implementasi dari visi Pertamina dalam mencerdaskan anak bangsa,&quot; ujar Corporate Secretary Pertamina Nursatyo Argo di Wisma Makara UI, Minggu (23/11/2014).</p>\r\n\r\n<p>Argo mengklaim minat mahasiswa dalam keikutsertaan ajang tersebut terus meningkat sehingga menunjukan inovasi energi terbarukan semakin diminati. Pihaknya berupaya memacu para mahasiwa untuk mengembangkan inovasi, karya orisinil, dan mudah diaplikasikan bagi lingkungan.</p>\r\n\r\n<p>&quot;Yang ikut kan dari Sabang sampai Merauke, jiwa kompetisi tumbuh dari adik -adik mahasiswa agar terus mengembangkan inovasi selesaikan persoalan bangsa. 15 dipilih tiga terbaik nanti. Rata - rata idenya sih bukan 100 persen baru tetapi membuat dengan cara yang baru belum diaplikasikan, bentuk pengembangan inovasi. Yangnterpenting mereka cari terobosan. Misalnya ada yang sederhana tapi bagus membuat software mendata sampah,&quot; tegasnya.</p>\r\n\r\n<p>Argo mengungkapkan Pertamina juga masih mengkaji dan menguji kelayakan ide serta inovasi para pemenang di ajang tahun - tahun sebelumnya. Rata - rata, lanjutnya, masih seputar bioethanol, biodiesel, dan menghemat listrik.</p>\r\n\r\n<p>&quot;Mereka yang sampai ke sini hasil seleksi di daerah sebanyak 36 ribu peserta, baru dikirimkan, ide - ide mereka sedang kita bukukan, kita lihat skala prioritas. Sebagian dengan bioethabol atau mengubah air laut jadi air bisa diminum. Di beberapa tempat bisa gabungkan, sangat mungkin diterapkan, secara umum sudah mulai dijalankan, sekarang masih tahap uji kelayakan,&quot; tegasnya.</p>\r\n\r\n<p>Penganugerahan Pemenang Olimpiade Sains Nasional Pertamina 2014 (OSN Pertamina) sekaligus sebagai acara penutupan dari seluruh rangkaian kegiatan OSN Pertamina 2014 akan digelar pada 27 November 2014 di gedung Pertamina Pusat Jakarta. Acara Penganugerahan Pemenang ini turut dihadiri oleh Menteri Riset dan Teknologi Pendidikan Tinggi RI, Direktur Utama PT. Pertamina, Rektor UI beserta para PIC atau Dekan Perguruan Tinggi Mitra OSN Pertamina, para Rektor Perguruan Tinggi dan pimpinan pejabat daerah se-Jabodetabek serta seluruh peserta Seleksi Tingkat Nasional.</p>\r\n\r\n<p><strong>(ful)</strong></p>\r\n', '2016-03-08', 'y', 'gambar-080320160643351.jpg'),
(18, 1, 2, 'Universitas se-Indonesia Adu Pintar di OSN Pertamina 2015', '<p><strong>JAKARTA&nbsp;</strong>- Puluhan universitas di penjuru Tanah Air siap beradu pengetahuan pada ajang Olimpiade Sains Nasional Pertamina (OSN Pertamina) 2015. Ajang yang merupakan program Corporate Social Responsibility (CSR) bidang pendidikan PT Pertamina tersebut terdiri atas dua kategori perlombaan, yakni teori dan proyek sains.</p>\r\n\r\n<p>OSN Pertamina 2015 sendiri terbuka bagi seluruh mahasiswa Diploma dan Sarjana. Sehingga, bagi para mahasiswa yang bukan pemenang OSN pada tahun sebelumnya atau belum pernah mengikuti olimpiade sains bisa turut mendaftarkan diri.</p>\r\n\r\n<p>Pada penyelenggaraan tahun ini, kategori proyek sains diperluas tingkatnya menjadi kompetisi Regional ASEAN dengan mengundang mahasiswa dari perguruan tinggi terbaik di ASEAN untuk ikut bersaing. Sementara itu, kategori teori tetap dilaksanakan seperti tahun-tahun berikutnya, yakni di tingkat nasional.</p>\r\n\r\n<p>Bagi mahasiswa yang belum mendaftar, pendaftaran masih dibuka hingga 30 September 2015 melalui website www.pertamina.com/osn. Untuk seleksi tingkat provinsi akan dilakukan serentak di 43 Perguruan Tinggi Mitra yang tersebar di seluruh Indonesia pada 15 Oktober. Kemudian, seleksi tingkat nasional pada 21-26 November.</p>\r\n\r\n<p>Guna mempersiapkan ajang tahunan ini, pihak panitia, yakni Ketua OSN Pertamina 2015, Yasman, Dekan FMIPA UI, Abdul Haris, dan perwakilan CSR Pertamina mengadakan video conference bersama 42 perguruan tinggi mitra OSN Pertamina 2015, Rabu (16/9/2015), di Gedung Kemenristekdikti, Senayan. Pada kesempatan tersebut, setiap mitra melakukan laporan dan keluhan terhadap persiapan olimpiade di setiap daerah.</p>\r\n\r\n<p>&quot;Kami meminta dukungan agar olimpiade bisa berjalan secara maksimal. Selain itu, kami juga minta tolong untuk dibantu publikasi agar peserta bisa menenuhi target dan kuota,&quot; tukas PIC CSR Pertamina, Korfi Prita.</p>\r\n\r\n<p><strong>(rfa)</strong></p>\r\n', '2016-03-08', 'y', 'gambar-08032016064523.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `captcha`
--

CREATE TABLE IF NOT EXISTS `captcha` (
`captcha_id` bigint(13) NOT NULL,
  `captcha_time` int(10) NOT NULL,
  `ip_address` varchar(16) NOT NULL,
  `word` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=372 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(369, 1458518606, '::1', '4647'),
(370, 1458518616, '::1', '5052'),
(371, 1458518627, '::1', '8740');

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE IF NOT EXISTS `detail` (
`id_detail` int(4) NOT NULL,
  `kode_soal` int(2) NOT NULL,
  `id_to` int(3) NOT NULL,
  `jawaban` varchar(300) NOT NULL,
  `status` enum('B','S','TJ') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`id_detail`, `kode_soal`, `id_to`, `jawaban`, `status`) VALUES
(41, 4, 18, 'c', 'B'),
(42, 10, 18, 'efef', 'S'),
(43, 10, 19, 'efef', 'S'),
(44, 4, 19, 'b', 'S'),
(45, 4, 20, 'c', 'B'),
(46, 10, 20, 'a', 'B'),
(47, 4, 21, 'e', 'S'),
(48, 10, 21, 'a', 'B'),
(49, 4, 22, 'e', 'S'),
(50, 10, 22, 'efef', 'S'),
(51, 5, 23, 'sfsafsafs', 'S'),
(52, 9, 23, 'y', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE IF NOT EXISTS `foto` (
`id_foto` int(3) NOT NULL,
  `id_gallery` int(3) NOT NULL,
  `nama_foto` varchar(300) NOT NULL,
  `alamat_foto` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id_foto`, `id_gallery`, `nama_foto`, `alamat_foto`) VALUES
(9, 8, 'Foto', 'P.jpg'),
(10, 8, 'Foto', 'e.jpg'),
(11, 8, 'Foto', 'm.jpg'),
(12, 8, 'Foto', 'b.jpg'),
(13, 8, 'Foto', 'i.jpg'),
(14, 8, 'Foto', 'n.jpg'),
(15, 9, 'Olim1', 'P1.jpg'),
(16, 9, 'Olim2', 'e1.jpg'),
(17, 9, 'Olim3', 'm1.jpg'),
(18, 9, 'Olim4', 'b1.jpg'),
(19, 10, 'OSK1', 'P2.jpg'),
(20, 10, 'OSK2', 'e2.jpg'),
(21, 10, 'OSK3', 'm2.jpg'),
(22, 10, 'OSK4', 'b2.jpg'),
(23, 10, 'OSK5', 'i1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
`id_gallery` int(3) NOT NULL,
  `id_pelatihan` int(3) NOT NULL,
  `judul` varchar(300) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `id_pelatihan`, `judul`, `deskripsi`, `tanggal`) VALUES
(8, 13, 'Pembinaan Siswa se Kulon Progo', 'Pembinaan Siswa se Kulon Progo di SMA N 1 Wates.\r\n29-30 September 2015', '2016-03-13'),
(9, 14, 'Pembinaan Guru Pembina Olimpiade SMA', 'Pembinaan Guru Pembina Olimpiade SMA Bidang Komputer\r\n29-30 September 2015', '2016-03-13'),
(10, 15, 'Pembinaan Persiapan OSK ', 'Pembinaan Persiapan OSK di SMA N 1 Cepu 13-15 Desember 2015', '2016-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_berita`
--

CREATE TABLE IF NOT EXISTS `kategori_berita` (
`id_katBer` int(3) NOT NULL,
  `nama_katBer` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_berita`
--

INSERT INTO `kategori_berita` (`id_katBer`, `nama_katBer`) VALUES
(2, 'Pendidikan'),
(6, 'Kesehatan'),
(7, 'Teknologi'),
(8, 'Pengetahuan Umum');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_to`
--

CREATE TABLE IF NOT EXISTS `kategori_to` (
`id_katTO` int(3) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `jum_soal` int(3) NOT NULL,
  `waktu` int(3) NOT NULL,
  `status` enum('aktif','tidak','','') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_to`
--

INSERT INTO `kategori_to` (`id_katTO`, `nama`, `jum_soal`, `waktu`, `status`) VALUES
(1, 'Biologi', 4, 2, 'aktif'),
(2, 'Sejarah', 10, 4, 'aktif'),
(3, 'Fisika', 100, 120, 'aktif'),
(4, 'Kimia', 20, 12, 'tidak'),
(5, 'Matematika', 40, 40, 'tidak');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE IF NOT EXISTS `materi` (
`id_materi` int(3) NOT NULL,
  `nama_materi` varchar(300) NOT NULL,
  `jenis` enum('free','member') NOT NULL,
  `file` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `type` varchar(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `nama_materi`, `jenis`, `file`, `tanggal`, `type`) VALUES
(20, 'Soal OSN tahun 2011', 'free', 'Soal_OSN_tahun_2011-11032016025915.pdf', '2016-03-11', '.pdf'),
(21, 'Pengumuman juara OSN 2015', 'member', 'Pengumuman_juara_OSN_2015-11032016035903.pdf', '2016-03-13', 'pdf');

-- --------------------------------------------------------

--
-- Table structure for table `pelatihan`
--

CREATE TABLE IF NOT EXISTS `pelatihan` (
`id_pelatihan` int(3) NOT NULL,
  `id_programKerja` int(3) NOT NULL,
  `nama_pelatihan` varchar(300) NOT NULL,
  `lokasi` text NOT NULL,
  `waktu_mulai` date NOT NULL,
  `waktu_selesai` date NOT NULL,
  `keterangan` varchar(300) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelatihan`
--

INSERT INTO `pelatihan` (`id_pelatihan`, `id_programKerja`, `nama_pelatihan`, `lokasi`, `waktu_mulai`, `waktu_selesai`, `keterangan`) VALUES
(13, 9, 'Pembinaan Siswa se Kulon Progo', 'SMA N 1 Wates', '2015-09-29', '2015-09-30', 'Pembinaan Siswa se Kulon Progo di SMA N 1 Wates.\r\n29-30 September 2015\r\n'),
(14, 2, 'Pembinaan Guru Pembina Olimpiade SMA Bidang Komputer', 'JST Yogyakarta', '2015-09-29', '2015-09-30', 'Pembinaan Guru Pembina Olimpiade SMA Bidang Komputer\r\n29-30 September 2015'),
(15, 1, 'Pembinaan Persiapan OSK', 'SMA N 1 Cepu', '2015-12-13', '2015-12-15', 'Pembinaan Persiapan OSK di SMA N 1 Cepu 13-15 Desember 2015\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `pelatihan_staf`
--

CREATE TABLE IF NOT EXISTS `pelatihan_staf` (
`id` int(11) NOT NULL,
  `id_pelatihan` int(3) NOT NULL,
  `id_staf` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelatihan_staf`
--

INSERT INTO `pelatihan_staf` (`id`, `id_pelatihan`, `id_staf`) VALUES
(12, 13, 5),
(13, 13, 6),
(14, 14, 6),
(15, 15, 5),
(16, 15, 6);

-- --------------------------------------------------------

--
-- Table structure for table `profil_perusahaan`
--

CREATE TABLE IF NOT EXISTS `profil_perusahaan` (
`id_profil` int(2) NOT NULL,
  `nama_profil` varchar(300) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil_perusahaan`
--

INSERT INTO `profil_perusahaan` (`id_profil`, `nama_profil`, `deskripsi`) VALUES
(1, 'Tentang JST', '<p style="text-align:justify"><span style="font-size:18px"><strong>Jogja science Training (JST)</strong> merupakan lembaga pendidikan yang bergerak dalam pembinaan olimpiade sains dan berpusat di Yogyakarta . Pembinaan meliputi 9 bidang olimpiade sains, yakni :</span></p>\r\n\r\n<ol>\r\n	<li style="text-align:justify"><span style="font-size:18px">Matematika</span></li>\r\n	<li style="text-align:justify"><span style="font-size:18px">Fisika</span></li>\r\n	<li style="text-align:justify"><span style="font-size:18px">Kimia</span></li>\r\n	<li style="text-align:justify"><span style="font-size:18px">Biologi</span></li>\r\n	<li style="text-align:justify"><span style="font-size:18px">geografi</span></li>\r\n	<li style="text-align:justify"><span style="font-size:18px">Kebumian</span></li>\r\n	<li style="text-align:justify"><span style="font-size:18px">Astronoli</span></li>\r\n	<li style="text-align:justify"><span style="font-size:18px">Komputer</span></li>\r\n	<li style="text-align:justify"><span style="font-size:18px">Ekonomi</span></li>\r\n</ol>\r\n\r\n<p style="text-align:justify">&nbsp;</p>\r\n\r\n<p><span style="font-size:20px"><strong><span style="color:#0000FF">Kami Lebih Profesional.&nbsp;</span></strong></span><span style="font-size:18px">JST memiliki pengajar yang merupakan dosen dari universitas ternama dengan pengalaman&nbsp;yang banyak dalam mengajar olimpiade sains,&nbsp;&nbsp;Selain itu juga memadukan pengetahuan serta pengalaman dosen bersama dengan mahasiswa alumni OSN dalam pengajarannya</span></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `program_kerja`
--

CREATE TABLE IF NOT EXISTS `program_kerja` (
`id_programKerja` int(2) NOT NULL,
  `nama_programKerja` varchar(300) NOT NULL,
  `biaya` varchar(255) NOT NULL,
  `lokasi` text NOT NULL,
  `durasi` varchar(255) NOT NULL,
  `fasilitas` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_kerja`
--

INSERT INTO `program_kerja` (`id_programKerja`, `nama_programKerja`, `biaya`, `lokasi`, `durasi`, `fasilitas`, `keterangan`) VALUES
(1, 'Pembinaan OSK', '4 Juta per siswa (minimal 4 siswa)', 'JST Yogyakarta', '4 hari, per hari 7 jam', 'Modul, Penginapan, transportasi lokal, tur UGM dan Jogja', 'Peserta ditargetkan menguasai materi dan lolos OSK'),
(2, 'Pembinaan Guru', '6 juta per guru (minimal 4 guru)', 'JST Yogyakarta', '4 hari, per hari 7 jam', 'Modul, penginapan, transportasi', 'Peserta ditargetkan menguasai materi yang diujikan pada olimpiade sains'),
(9, 'Pembinaan OSK/OSP - L1', '12 juta per bidang (maksimal 12 siswa)', 'Kabupaten setempat (pembina datang ke lokasi)', '4 hari, per hari 7 jam', 'Modul', 'Peserta ditargetkan menguasai materi dan lolos OSK/OSP'),
(10, 'Pembinaan OSK/OSP - L2', '10 juta per bidang (maksimal 12 siswa)', 'Kabupaten setempat (pembina datang ke lokasi)', '3 hari, per hari 7 jam', 'Modul', 'Peserta ditargetkan menguasai materi dan lolos OSK/OSP'),
(11, 'Pembinaan OSK/OSP - L3', '8 juta per bidang (maksimal 12 siswa)', 'Kabupaten setempat (pembina datang ke lokasi)', '2 hari, per hari 7 jam', 'Modul', 'Peserta ditargetkan menguasai materi dan lolos OSK/OSP'),
(13, 'Pembinaan Guru - L1', '15 juta per bidang (maksimal 12 guru)', 'Kabupaten setempat (pembina datang ke lokasi)', '4 hari, per hari 7 jam', 'Modul', 'Peserta ditargetkan menguasai materi yang diujikan pada olimpiade sains'),
(14, 'Pembinaan Guru - L2', '13 juta per bidang (maksimal 12 guru)', 'kabupaten setempat (pembina datang ke lokasi)', '3 hari, per hari 7 jam', 'Modul', 'Peserta ditargetkan menguasai materi yang diujikan pada olimpiade sains');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
`id_slider` int(3) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slider`, `gambar`, `deskripsi`) VALUES
(5, 'gambar-10022016073005.jpg', 'Tugu Jogja'),
(6, 'gambar-13032016191247.jpg', 'Pembinaan');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE IF NOT EXISTS `soal` (
`kode_soal` int(2) NOT NULL,
  `id_katTO` int(3) NOT NULL,
  `soal_des` text NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `opsi_a` varchar(200) DEFAULT NULL,
  `opsi_b` varchar(200) DEFAULT NULL,
  `opsi_c` varchar(200) DEFAULT NULL,
  `opsi_d` varchar(200) DEFAULT NULL,
  `opsi_e` varchar(200) DEFAULT NULL,
  `uraian` text,
  `kunci` varchar(300) NOT NULL,
  `pembahasan` text NOT NULL,
  `status` enum('active','not_active') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`kode_soal`, `id_katTO`, `soal_des`, `gambar`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `opsi_e`, `uraian`, `kunci`, `pembahasan`, `status`) VALUES
(1, 1, '<p>Ini adalah pertanyaan</p>\r\n', 'gambar-15012016153930.jpg', ',jh,jh', ',hj,h', ',jh,', 'jh,jh,', 'jj,jj', '<p>ini uraian</p>\r\n', 'jj,jj', '<p>Ini</p>\r\n', 'not_active'),
(4, 1, '<p>ini pertanyaann</p>\r\n\r\n<p><img alt="\\sum \\displaystyle \\left ( n \\right )" src="http://latex.codecogs.com/gif.latex?%5Csum%20%5Cdisplaystyle%20%5Cleft%20%28%20n%20%5Cright%20%29" /></p>\r\n', '', 'a', 'b', 'c', 'd', 'e', '<p>adAD</p>\r\n', 'c', '<p>h</p>\r\n', 'active'),
(5, 2, '<p>halooo</p>\r\n', '', 'asfaf', 'asfasf', 'sfsafsafs', 'saf', 'afsafsa', '<p>safsafsaf</p>\r\n', 'asfasf', '<p>safsaf</p>\r\n', 'active'),
(6, 1, '<p>Apa nama kelenjar putih bening manusia?</p>\r\n', '', 'Sambalado', 'Aqua', 'Mie Instan', 'Pop Mie', 'Tango', '<p>Kelenjar putih bening adalah bla bla bla</p>\r\n', 'Pop Mie', '<p>Merupakan salah satu</p>\r\n', 'not_active'),
(9, 2, '<p>Coba di coba</p>\r\n', '', 'y', 'y', 'yy', 'y', 'y', '<p>y</p>\r\n', 'y', '<p>y</p>\r\n', 'active'),
(10, 1, '<p>fefefe</p>\r\n', '', 'a', 'a', 'fef', 'efef', 'efef', '<p>efefe</p>\r\n', 'a', '<p>efef</p>\r\n', 'active'),
(11, 2, '<p>k.kj.</p>\r\n', '', 'kj.kj', 'k', '.kj.', 'kk', 'kj.kj.', '<p>k.kj.</p>\r\n', 'k', '<p>k.kj.</p>\r\n', 'not_active'),
(12, 5, '<p>dsfdf</p>\r\n', '', 'dsfsdf', 'sdfds', 'fdsf', 'a', 'a', '<p>sdfdsf</p>\r\n', 'dsfsdf', '<p>dsfdsf</p>\r\n', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `staf_pengajar`
--

CREATE TABLE IF NOT EXISTS `staf_pengajar` (
`id_staf` int(3) NOT NULL,
  `nama_lengkap` varchar(300) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `foto` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `bidang` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staf_pengajar`
--

INSERT INTO `staf_pengajar` (`id_staf`, `nama_lengkap`, `alamat`, `tanggal_lahir`, `foto`, `deskripsi`, `bidang`) VALUES
(5, 'Muhammad Fakhrur Rifqi', 'Yogyakarta', '1980-01-01', 'gambar-13032016181406.jpg', '<p>Anoreksi</p>', 'Ilmu Komputer'),
(6, 'Anifuddin Azis', 'Purbalingga, Jawa Tengah', '1977-01-05', 'gambar-13032016181627.jpg', '<p>Saya suka yang apa adanya...yang baik2...itu aja...atau ada yang mau nambahin...</p>', 'Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `tryout`
--

CREATE TABLE IF NOT EXISTS `tryout` (
`id_to` int(3) NOT NULL,
  `id_user` int(6) DEFAULT NULL,
  `waktu` datetime NOT NULL,
  `nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tryout`
--

INSERT INTO `tryout` (`id_to`, `id_user`, `waktu`, `nilai`) VALUES
(18, -1, '2016-03-18 15:07:25', 3),
(19, 5, '2016-03-23 23:47:26', -2),
(20, 5, '2016-03-24 00:28:02', 8),
(21, 5, '2016-03-24 00:48:14', 3),
(22, 5, '2016-03-24 00:48:31', -2),
(23, 5, '2016-03-24 00:48:50', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(6) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','member','pengunjung') NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `asal_sekolah` text,
  `status` enum('0','1','2') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `nama_lengkap`, `email`, `alamat`, `asal_sekolah`, `status`) VALUES
(-1, 'pengunjung', '3fbe7200a4b9a894e16c9d998314dc80', 'pengunjung', 'pengunjung', 'pengunjung@gmail.com', 'pengunjung', 'pengunjung', '0'),
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Bayu Anggoro sakti', 'bayu.anggoro.s@mail.ugm.ac.id', 'Desa Dengkek RT/RW 002/0011\r\nPati\r\nJawa Tengah', 'SMA N 2 PATII', '1'),
(3, 'hesti', '070550d8ed8790c0ef4848c86404e1b1', 'member', 'Hesti Kukuh Windarko', 'hesti@hesti.com', 'ss', 'sma n2 pati', '1'),
(4, 'hesti1', '070550d8ed8790c0ef4848c86404e1b1', 'member', 'hest', 'hesti@hesti.com', 'ss', 'sss', '1'),
(5, 'member', 'aa08769cdcb26674c6706093503ff0a3', 'member', 'Lutvi Havifazrin', 'lutvi_lutbi@yahoo.com', 'Jalan Jiwonolo Pati', 'SMAN 2 PATIi', '1'),
(6, 'coba', 'bf0c95ff56e3b2598456cd455a8684c1', 'member', 'coba', 'coba@coba.com', 'coba1', 'ss', '2'),
(7, 'new', '827ccb0eea8a706c4c34a16891f84e7b', 'member', 'new', 'new@new.com', 'sdsds', 'sdsd', '1'),
(8, 'rifki', '2a5c4c5a5ba1c332279685ddec507cd9', 'admin', 'Muhammad Fakhurifki', 'mqrifki@gmail.com', 'Kota klaten', 'SMA N 2 Pati', '1'),
(9, 'Laily', 'bc50cc9a78b7944cfb9d7e0018d72ee9', 'member', 'Laily nur hikmah', 'sfasf', 's', 'SMA N 2 Pati', '0'),
(10, 'pinto', 'd2f9dbffa7b9a979f9bc4d81e769497e', 'member', 'Pinto Anugrah', 'pinto@gmail.com', 'Palembang', 'SMA 1 Palembangg', '1'),
(11, 'rian', '', 'admin', 'Rian susanto', 'rian@jst.com', 'desa winong RT/RW 001/002\r\nPati\r\nJawa Timur', 'SMA N 2 Tayu', ''),
(12, 'bayuu', 'c7ad56f4118533c5a47bab3f1ced37e4', 'member', 'Bayu Anggoro Sakti', 'bayu.anggoro.s@mail.ugm.ac.id', 'desa dengkek', 'SMAN 2 PATI', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
 ADD PRIMARY KEY (`id_berita`), ADD KEY `id_kateBer` (`id_kateBer`), ADD KEY `id_kateBer_2` (`id_kateBer`), ADD KEY `id_kateBer_3` (`id_kateBer`), ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `captcha`
--
ALTER TABLE `captcha`
 ADD PRIMARY KEY (`captcha_id`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
 ADD PRIMARY KEY (`id_detail`), ADD KEY `id_to` (`id_to`), ADD KEY `id_katTO` (`id_to`), ADD KEY `kode_soal` (`kode_soal`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
 ADD PRIMARY KEY (`id_foto`), ADD KEY `id_gallery` (`id_gallery`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
 ADD PRIMARY KEY (`id_gallery`), ADD KEY `id_pelatihan` (`id_pelatihan`);

--
-- Indexes for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
 ADD PRIMARY KEY (`id_katBer`);

--
-- Indexes for table `kategori_to`
--
ALTER TABLE `kategori_to`
 ADD PRIMARY KEY (`id_katTO`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
 ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `pelatihan`
--
ALTER TABLE `pelatihan`
 ADD PRIMARY KEY (`id_pelatihan`), ADD KEY `id_programKerja` (`id_programKerja`);

--
-- Indexes for table `pelatihan_staf`
--
ALTER TABLE `pelatihan_staf`
 ADD PRIMARY KEY (`id`), ADD KEY `id_pelatihan` (`id_pelatihan`), ADD KEY `id_staf` (`id_staf`);

--
-- Indexes for table `profil_perusahaan`
--
ALTER TABLE `profil_perusahaan`
 ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `program_kerja`
--
ALTER TABLE `program_kerja`
 ADD PRIMARY KEY (`id_programKerja`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
 ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
 ADD PRIMARY KEY (`kode_soal`), ADD KEY `id_katTO` (`id_katTO`);

--
-- Indexes for table `staf_pengajar`
--
ALTER TABLE `staf_pengajar`
 ADD PRIMARY KEY (`id_staf`);

--
-- Indexes for table `tryout`
--
ALTER TABLE `tryout`
 ADD PRIMARY KEY (`id_to`), ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `captcha`
--
ALTER TABLE `captcha`
MODIFY `captcha_id` bigint(13) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=372;
--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
MODIFY `id_detail` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
MODIFY `id_foto` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
MODIFY `id_gallery` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
MODIFY `id_katBer` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `kategori_to`
--
ALTER TABLE `kategori_to`
MODIFY `id_katTO` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
MODIFY `id_materi` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `pelatihan`
--
ALTER TABLE `pelatihan`
MODIFY `id_pelatihan` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `pelatihan_staf`
--
ALTER TABLE `pelatihan_staf`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `profil_perusahaan`
--
ALTER TABLE `profil_perusahaan`
MODIFY `id_profil` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `program_kerja`
--
ALTER TABLE `program_kerja`
MODIFY `id_programKerja` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
MODIFY `id_slider` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
MODIFY `kode_soal` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `staf_pengajar`
--
ALTER TABLE `staf_pengajar`
MODIFY `id_staf` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tryout`
--
ALTER TABLE `tryout`
MODIFY `id_to` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
ADD CONSTRAINT `berita_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE,
ADD CONSTRAINT `berita_ibfk_3` FOREIGN KEY (`id_kateBer`) REFERENCES `kategori_berita` (`id_katBer`) ON DELETE CASCADE;

--
-- Constraints for table `detail`
--
ALTER TABLE `detail`
ADD CONSTRAINT `detail_ibfk_1` FOREIGN KEY (`id_to`) REFERENCES `tryout` (`id_to`) ON UPDATE CASCADE,
ADD CONSTRAINT `detail_ibfk_2` FOREIGN KEY (`kode_soal`) REFERENCES `soal` (`kode_soal`) ON UPDATE CASCADE;

--
-- Constraints for table `foto`
--
ALTER TABLE `foto`
ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`id_gallery`) REFERENCES `gallery` (`id_gallery`) ON DELETE CASCADE;

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`id_pelatihan`) REFERENCES `pelatihan` (`id_pelatihan`) ON DELETE CASCADE;

--
-- Constraints for table `pelatihan`
--
ALTER TABLE `pelatihan`
ADD CONSTRAINT `pelatihan_ibfk_1` FOREIGN KEY (`id_programKerja`) REFERENCES `program_kerja` (`id_programKerja`) ON DELETE CASCADE;

--
-- Constraints for table `pelatihan_staf`
--
ALTER TABLE `pelatihan_staf`
ADD CONSTRAINT `pelatihan_staf_ibfk_2` FOREIGN KEY (`id_pelatihan`) REFERENCES `pelatihan` (`id_pelatihan`) ON DELETE CASCADE,
ADD CONSTRAINT `pelatihan_staf_ibfk_3` FOREIGN KEY (`id_staf`) REFERENCES `staf_pengajar` (`id_staf`) ON DELETE CASCADE;

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
ADD CONSTRAINT `soal_ibfk_1` FOREIGN KEY (`id_katTO`) REFERENCES `kategori_to` (`id_katTO`) ON UPDATE CASCADE;

--
-- Constraints for table `tryout`
--
ALTER TABLE `tryout`
ADD CONSTRAINT `tryout_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

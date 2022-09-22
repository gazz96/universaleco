-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 28, 2021 at 05:18 AM
-- Server version: 10.2.31-MariaDB-log
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `universaleco`
--

-- --------------------------------------------------------

--
-- Table structure for table `ue_achievement`
--

CREATE TABLE `ue_achievement` (
  `ue_achievement_id` int(11) NOT NULL,
  `ue_achievement_name` varchar(255) NOT NULL,
  `ue_achievement_value` varchar(255) NOT NULL,
  `ue_achievement_description` varchar(255) NOT NULL,
  `ue_achievement_sequence` int(11) NOT NULL,
  `ue_achievement_status` int(1) NOT NULL,
  `ue_achievement_updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ue_achievement_updated_id` int(11) NOT NULL,
  `ue_achievement_created_date` timestamp NULL DEFAULT NULL,
  `ue_achievement_created_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ue_achievement`
--

INSERT INTO `ue_achievement` (`ue_achievement_id`, `ue_achievement_name`, `ue_achievement_value`, `ue_achievement_description`, `ue_achievement_sequence`, `ue_achievement_status`, `ue_achievement_updated_date`, `ue_achievement_updated_id`, `ue_achievement_created_date`, `ue_achievement_created_id`) VALUES
(1, 'Service', '223', 'Melayani Klien', 1, 1, '2021-09-27 22:00:11', 1, '2021-09-27 22:00:11', 1),
(2, 'Limbah Diolah', '10.000 Ton +', 'Limbah yang Telah Diolah', 2, 1, '2021-09-27 22:01:02', 0, '2021-09-27 22:01:02', 1),
(3, 'Pengangkutan', '300 +', 'Pengangkutan per Bulan', 3, 1, '2021-09-27 22:01:14', 0, '2021-09-27 22:01:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ue_blog`
--

CREATE TABLE `ue_blog` (
  `ue_blog_id` int(11) NOT NULL,
  `ue_blog_type` varchar(255) NOT NULL,
  `ue_blog_title` varchar(255) NOT NULL,
  `ue_blog_date` date DEFAULT NULL,
  `ue_blog_author` varchar(255) DEFAULT NULL,
  `ue_blog_slug` text NOT NULL,
  `ue_blog_image` text NOT NULL,
  `ue_blog_bg` text NOT NULL,
  `ue_blog_excerpt` text NOT NULL,
  `ue_blog_description` text NOT NULL,
  `ue_blog_status` int(1) NOT NULL,
  `ue_blog_updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ue_blog_updated_id` int(11) NOT NULL,
  `ue_blog_created_date` timestamp NULL DEFAULT NULL,
  `ue_blog_created_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ue_blog`
--

INSERT INTO `ue_blog` (`ue_blog_id`, `ue_blog_type`, `ue_blog_title`, `ue_blog_date`, `ue_blog_author`, `ue_blog_slug`, `ue_blog_image`, `ue_blog_bg`, `ue_blog_excerpt`, `ue_blog_description`, `ue_blog_status`, `ue_blog_updated_date`, `ue_blog_updated_id`, `ue_blog_created_date`, `ue_blog_created_id`) VALUES
(1, 'Blog', 'Cara Pembuangan Limbah Medis & Farmasi Yang Benar', '2021-11-01', NULL, 'https://www.universaleco.id/cara-pembuangan-limbah-medis-yang-benar', '20211014100339blog.jpeg', '', '', '', 1, '2021-10-13 16:37:50', 1, '2021-10-13 16:37:50', 1),
(2, 'Blog', 'Jasa Pengolahan Limbah B3 di Jawa Barat', '2021-11-01', NULL, 'jasa-pengolahan-limbah-b3-di-jawa-barat', '20211014100456blog.jpg', '', '<p>Jawa Barat kini menjadi incaran berbagai investor untuk pengembangan sektor industri mulai dari kawasan Bekasi hingga Cikarang. Mengapa? Letak wilayah yang strategis, tidak jauh dengan Ibu Kota Negara, dan jumlah penduduk yang tinggi, menjadi alasan ketertarikan para investor terhadap provinsi ini.</p>', '<p>Jawa Barat kini menjadi incaran berbagai investor untuk pengembangan sektor industri mulai dari kawasan Bekasi hingga Cikarang. Mengapa? Letak wilayah yang strategis, tidak jauh dengan Ibu Kota Negara, dan jumlah penduduk yang tinggi, menjadi alasan ketertarikan para investor terhadap provinsi ini.</p>\r\n<p>Kesempatan ini tentunya memberi peluang Jawa Barat untuk mewujudkan kestabilan perekonomian daerah. Pemerataan pembangunan sektor industri di Jawa Barat akan terus dikembangkan secara merata hingga wilayah Timur seperti Majalengka, Cirebon, dan Subang.</p>\r\n<p>Namun, Seiring dengan perkembangan industri terciptalah pencemaran lingkungan di berbagai titik wilayah Jawa Barat.</p>\r\n<p>Keresahan akan pencemaran lingkungan, membuat Pemerintah Provinsi Jawa Barat merencanakan pembentukan kawasan industri dan pengelolaan limbah secara terpadu. Hal ini guna menghindari pembuangan limbah ke sungai ataupun ke wilayah yang tidak semestinya. Selain itu, rencana ini salah bentuk nyata dukungan terhadap program Industri 4.0 yang dicanangkan pemerintah.</p>\r\n<p>&nbsp;</p>\r\n<h2><strong>Mengenal Limbah B3</strong></h2>\r\n<p>Mungkin sebagian masyarakat masih asing dengan kata &ldquo;Limbah B3&rdquo; tetapi tidak dengan kata &ldquo;Limbah&rdquo; itu sendiri. Limbah B3 adalah salah satu jenis limbah yang memiliki sifat maupun karakteristik yang berbahaya dan beracun, yang mampu berdampak negatif terhadap lingkungan meskipun konsentrasi dari limbah tersebut sedikit.</p>\r\n<p>Pengelolaan limbah B3 yang buruk akan menyebabkan percepatan kerusakan lingkungan. Alhasil, keseimbangan ekosistem, kesehatan makhluk hidup, dan kesejahteraan masyarakat akan terganggu.</p>\r\n<p>Wujud atau bentuk limbah B3 bermacam-macam: padat, gas, ataupun cairan. Karakteristik limbah B3 pun beraneka ragam, seperti mudah meledak, teroksidasi, mudah terbakar, korosif, dan sebagainya. Asal imbah B3 dapat berasal dari kegiatan industri, fasilitas kesehatan, dan sehari-hari seperti kegiatan mencuci pakaian menggunakan detergen, pemeliharaan alat, pengemasan, tumpahan, dan produk kedaluwarsa. Limbah B3 yang berasal dari kegiatan sehari-hari tidak kalah besar jumlahnya dengan limbah B3 yang dihasilkan oleh sektor industri. Hal ini dapat dengan mudah membahayakan manusia dan ekosistem di kawasan perumahan.</p>\r\n<p>Minimnya pemahaman masyarakat terkait permasalahan dan dampak yang dapat ditimbulkan limbah B3, menyebabkan aktivitas pembuangan limbah B3 secara langsung di TPS (tempat pembuangan sampah) dan berakhir di TPA (tempat pembuangan akhir) tanpa dilakukan pengelolaan yang semestinya.</p>\r\n<p>Limbah B3 diperlukan pengelolaan yang tepat, seperti dikumpulkan dan dikemas menggunakan label sesuai karakteristiknya. Berikut beberapa contoh limbah B3 rumah tangga yang wajib kamu ketahui:</p>\r\n<ul>\r\n<li>Baterai</li>\r\n<li>Limbah elektronik (handphone, televisi, dll.)</li>\r\n<li>Lampu TL (<em>Fluorescent Lamp</em>)</li>\r\n<li>Oli bekas dan kemasan oli</li>\r\n<li>Pembersih lantai</li>\r\n<li>Air sanitizer beserta kemasannya</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Mengelola limbah B3 secara tidak bertanggung jawab menjadi faktor lajunya penurunan kualitas lingkungan di Indonesia terutama Jawa Barat. Pencemaran yang tidak terkendali harus menjadi kekhawatiran kita bersama. Lingkungan kini sudah sepatutnya ditolong dan dipertahankan.</p>\r\n<p>&nbsp;</p>\r\n<h2><strong>Jenis Limbah B3 di Jawa Barat</strong></h2>\r\n<p>Pada tahun 2010, Dinas Lingkungan Hidup Provinsi Jawa Barat mengkonfirmasi bahwa limbah yang berasal dari kegiatan industri cenderung memiliki konsentrasi yang berbahaya. Pada tahun tersebut, sebanyak rata-rata 48% pembuangan limbah melampaui baku mutu yang telah ditetapkan.</p>\r\n<p>Jenis-jenis limbah B3 di Jawa Barat yang berasal dari kegiatan industri dapat berupa:</p>\r\n<ul>\r\n<li><em>Sludge</em>&nbsp;IPAL</li>\r\n<li>Kemasan limbah B3</li>\r\n<li>Limbah elektronik</li>\r\n<li>Bahan kimia kedaluwarsa</li>\r\n<li>Gas beracun dari hasil pembakaran</li>\r\n<li>Hasil kegiatan pencucian kemasan limbah B3</li>\r\n<li>Hasil kegiatan produksi.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<h3><strong>Limbah B3 Medis di Jawa Barat</strong></h3>\r\n<p>Limbah B3 di Jawa Barat yang berasal dari fasilitas kesehatan adalah berupa infus bekas, jarum suntik bekas, obat maupun bahan kimia yang telah kedaluwarsa, dan masker bekas.</p>\r\n<p>Di masa pandemi COVID-19, peningkatan limbah medis serentak terjadi di seluruh wilayah di Jawa Barat. Karakteristik yang dimiliki limbah medis antara lain bersifat infeksius dan tajam, sehingga mampu menimbulkan risiko penyakit. Diperlukan pemantauan langsung dan tanggung jawab dari setiap stakeholder agar penanganan limbah medis dilakukan sesuai dengan peraturan yang berlaku.</p>\r\n<p>&nbsp;</p>\r\n<h2><strong>Permasalahan Limbah B3 di Jawa Barat</strong></h2>\r\n<p>Kekhawatiran warga Jawa Barat terhadap limbah B3 kini dibuktikan dengan adanya berbagai permasalahan limbah B3 di Jawa Barat. Pada umumnya, permasalahan ini timbul akibat ketidakpedulian akan pengelolaan limbah B3 di wilayah Jawa Barat, baik berwujud cair maupun padat.</p>\r\n<p>Permasalahan memiliki dampak yang sangat terlihat dan jelas, salah satunya Sungai Citarum.</p>\r\n<p>&nbsp;</p>\r\n<h3><strong>Tercemarnya Sungai Citarum</strong></h3>\r\n<p><img class=\"aligncenter wp-image-3248 size-full\" src=\"https://www.universaleco.id/wp-content/uploads/2021/07/pencemaran-sungai-citarum.jpg\" alt=\"Limbah B3 menjadi alasan tercemarnya Sungai Citarum\" width=\"1167\" height=\"778\" /></p>\r\n<p>Citarum merupakan sungai di Jawa Barat yang terkenal sebagai salah satu sungai paling tercemar di dunia sejak tahun 2007.</p>\r\n<p>Pada tahun 2008, berdasarkan pemantauan 35 sungai yang dilakukan Bapedalda Provinsi Jawa Barat, status mutu air di Sungai Citarum masuk dalam kategori pencemaran yang berat. Kondisi ini merupakan potret kurangnya rasa tanggung jawab para pelaku usaha dari berbagai sektor industri seperti kulit, logam, kimia, tekstil, makanan, minuman, dan farmasi dalam melakukan pengelolaan limbah yang dihasilkan.</p>\r\n<p>Direktur Walhi (Wahana Lingkungan Hidup Indonesia) menemukan hampir 80% kegiatan industri yang termasuk dalam kategori di atas, melakukan pelanggaran berupa pembuangan limbah cair dengan kandungan berbahaya dan beracun secara tidak bertanggung jawab pada tahun 2017 di Jawa Barat.</p>\r\n<p>Pembuangan limbah secara ilegal ke Sungai Citarum merupakan suatu kesengajaan yang disadari oleh oknum pelaku usaha. Dimana terjadi hampir di sepanjang Sungai Citarum seperti Kabupaten Cirebon, Purwakarta, Bandung, dan Karawang. Kegiatan ini menjadi sebuah kebiasaan bagi para oknum tersebut hingga tahun 2019.</p>\r\n<p>Kasus pencemaran ini semakin tidak terkendali karena seiring bertambahnya tahun, kondisi Sungai Citarum kian memprihatikan. Hal tersebut dapat dilihat dari kondisi air yang kadang berubah warna tidak normal.</p>\r\n<p>&nbsp;</p>\r\n<h3><strong>Sungai Lainpun Menjadi Korban</strong></h3>\r\n<p>Kasus pencemaran akibat limbah B3 di Sungai Jawa Barat juga terjadi di Kecamatan Rancaekek, seperti Sungai Cikijing dan Sungai Cimande. Rancaekek merupakan kecamatan yang memiliki kawasan industri dan pemukiman masyarakat.</p>\r\n<p>Akibat banyaknya industri yang terbangun di wilayah tersebut, kedua sungai di atas menjadi terkontaminasi oleh limbah B3. Kemampuan mereka sebagai sumber irigasi atau pengairan sawah untuk masyarakat setempat pun sirna. Sungai yang seharusnya menjadi sumber air bersih kini berubah menjadi sumber penyakit.</p>\r\n<p>Pada tahun 2020 hingga 2021, pembuangan limbah medis kembali terjadi di Sungai Ciliwung. Meskipun jumlah limbah masuk dalam kategori kecil, tetapi tetap berpotensi menjadi sumber penularan COVID-19 ke berbagai wilayah yang dilewati oleh limbah tersebut.</p>\r\n<p>Lonjakan kasus COVID-19 di Indonesia mendorong tingginya kebutuhan alat dan bahan medis yang berujung pada peningkatan limbah medis. Berdasarkan data bulan Februari 2021, Kepala Dinas Lingkungan Hidup Jawa Barat menyampaikan terjadinya timbunan limbah medis hingga mencapai 1,7 Ton per hari dari 261 rumah sakit. Limbah medis ini terdiri dari sarung tangan, pakaian hazmat, masker serta limbah domestik hasil kontak pasien positif COVID-19 seperti wadah makanan dan tisu bekas.</p>\r\n<p>Limbah medis yang berasal dari aktivitas pemeriksaan pasien masuk dalam kategori limbah infeksius dan benda tajam. Sudah sepatutnya pelaku pemeriksaan bertanggung jawab dalam proses pengelolaan mulai dari pemilahan, pengumpulan hingga pengolahannya. Kewajiban pengelolaan limbah medis hasil pemeriksaan COVID-19 telah diatur dalam Keputusan Menteri Kesehatan No. HK. 01. 07 Tahun 2021.</p>\r\n<p>&nbsp;</p>\r\n<h2><strong>Masalah Limbah B3 Telah Merebak ke Berbagai Wilayah di Jawa Barat</strong></h2>\r\n<p>Permasalahan limbah B3 juga ditemukan di Kabupaten Cianjur pada tahun 2021. Oknum berjumlah tiga orang membawa 16 karung limbah B3 seberat 25 kilogram per karung yang berasal dari pabrik tekstil di Majalaya, Bandung Barat. Ketiga pelaku beraksi pada malam hari di enam lokasi pembuangan.</p>\r\n<p>Selain itu, permasalahan limbah B3 pada udara pun juga terjadi tepatnya di Kabupaten Bogor. Limbah B3 dalam bentuk gas mencekik puluhan warga hingga berdampak pada mual dan pusing. Total warga yang terkena dampak sebanyak 38 orang.</p>\r\n<p>Kejadian pencemaran ini terjadi akibat bocornya pipa pengolahan limbah salah satu industri. Warga dari keempat desa di sekitaran lokasi yang terdampak mengalami keresahan dan rasa tidak nyaman akibat bau yang menyengat hingga menusuk indra penciuman.</p>\r\n<p>&nbsp;</p>\r\n<h2><strong>Dampak Limbah B3 Bagi Masyarakat Jawa Barat</strong></h2>\r\n<p>Pencemaran yang terjadi kian menyiksa warga sekitar, berbagai tanaman hasil pertanian mati akibat kandungan bahan berbahaya pada air sungai. Air sungai mengalami perubahan warna yang tidak normal bahkan menimbulkan buih busa dengan bau yang menyengat.</p>\r\n<p>Kejadian ini membuat warga sekitar enggan untuk menggunakan air sungai untuk kegiatan kesehariannya. Bahkan masyarakat sekitar pun diharuskan untuk membeli air bersih demi menunjang kebutuhan rumah tangga.</p>\r\n<p>Menurut Koalisi Melawan Limbah, dengan adanya pencemaran air sungai ini, salah satunya Sungai Cikijing, Jawa Barat, terdapat kerugian ekonomi sebesar Rp 11,4 Triliun, diiringi kerugian untuk masyarakat sebesar Rp 3,3 Triliun, dan ditambah biaya remediasi lahan terkontaminasi sebesar Rp 8 Triliun. Kerugian ini merupakan estimasi terendah sejak 2004 hingga 2015.</p>\r\n<p>Limbah B3 yang telah masuk ke dalam komponen lingkungan seperti air, tanah, dan udara tidak saja menyebabkan kesehatan masyarakat terganggu, tetapi juga mampu mengganggu sektor lain seperti sektor jasa air, perikanan, dan perkebunan.</p>\r\n<p>Sebagai contoh, di Kecamatan Rancaekek terdapat empat desa yang mengalami kerugian sektor pertanian sebesar 841 milyar, sektor kesehatan sebesar 815 milyar, sektor jasa air sebesar 288 milyar, dan sektor perikanan 10,5 milyar. Secara nominal, kerugian akibat limbah B3 yang terjadi di kecamatan Rancaekek jauh lebih besar dibandingkan dengan kasus pembuangan limbah B3 di beberapa wilayah dunia seperti pada Sungai Hudson, dan Sungai Laborec.</p>\r\n<p>&nbsp;</p>\r\n<h2><strong>Pentingnya Pengelolaan Limbah B3 di Jawa Barat</strong></h2>\r\n<p>Masalah pencemaran limbah B3 yang terjadi di Jawa Barat menjadi sorotan masyarakat hingga pemerintahan provinsi dan dunia. Oleh karena itu, upaya pengelolaan limbah B3 di berbagai wilayah Jawa Barat menjadi penting. Hal ini dilakukan guna mengurangi berbagai permasalahan yang terjadi sehingga kesejahteraan penduduk terpenuhi dan meminimalisir potensi kerugian ekonomi.</p>\r\n<p>Dalam melakukan pengelolaan limbah B3 tentunya perlu memperhatikan proses hirarki. Mulai dari upaya mengurangi pada sumber, pengolahan bahan, pergantian bahan, penggunaan teknologi bersih, dan pengaturan kegiatan operasi. Apabila setelah penerapan hirarki tersebut masih terdapat limbah B3 yang dihasilkan, maka kegiatan pemanfaatan limbah B3 dapat menjadi solusinya. Pemanfaatan ini dapat berupa&nbsp;<em>recovery</em>,&nbsp;<em>reuse</em>, dan&nbsp;<em>recycle</em>.</p>\r\n<p>Kegiatan pengelolaan limbah B3 di Jawa Barat tentunya tidak boleh dilakukan secara sembarangan dikarenakan beberapa karakteristik limbah itu sendiri seperti mudah meledak, mudah terbakar, dan beracun. Hal ini berpotensi menimbulkan risiko kecelakaan yang tinggi. Tata cara dalam penanganan limbah B3 dapat disesuaikan dengan karakteristik masing-masing limbah, sebagaimana diatur dalam Peraturan Pemerintah Nomor 22 Tahun 2021.</p>\r\n<p>Peraturan tersebut juga meregulasi berbagai kegiatan pengelolaan limbah B3 yang meliputi kegiatan penyimpanan sementara, pengumpulan, pengangkutan limbah B3, pengolahan hingga penimbunan. Dalam kegiatan pengelolaan limbah B3 sudah sepatutnya diperoleh suatu izin atau rekomendasi operasi dari instansi yang bertanggung jawab di wilayah Jawa Barat. Perizinan ini bertujuan untuk mengetahui jumlah, karakteristik, dan jenis limbah B3 dari kegiatan pengumpulan hingga pengolahannya.</p>\r\n<p>&nbsp;</p>\r\n<h2><strong>Proses Pengumpulan dan Penyimpanan Limbah B3</strong></h2>\r\n<p>Kegiatan pengumpulan dan penyimpanan merupakan langkah awal dalam pengelolaan limbah B3. Dimana pada kegiatan tersebut, diperlukan pemberian simbol dan label dengan warna yang jelas, kontras, serta tidak bertumpukan. Pastikan setiap kemasan limbah B3 tidak mengalami kebocoran dan berkarat. Apabila limbah B3 telah dimasukkan ke dalam kemasan maka penutupan kemasan harus dipastikan serapat mungkin.</p>\r\n<p>Saat pengumpulan dan penyimpanan, perlu diperhatikan karakteristik limbah B3 serta batas waktu penyimpanannya untuk menghindari adanya reaksi antar limbah B3. Penerapan First In First Out wajib dilakukan pada kegiatan penyimpanan untuk mempemudah proses pengangkutan dan pengolahan limbah B3. Adapun standar bangunan tempat penyimpanan limbah B3 yaitu:</p>\r\n<ul>\r\n<li>Lantai yang tidak bergelombang</li>\r\n<li>Lantai yang kedap air</li>\r\n<li>Memiliki ventilasi</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Pengelolaan limbah B3 merupakan kewajiban setiap pelaku usaha yang menghasilkan limbah B3. Hal ini bertujuan untuk mewujudkan lingkungan Indonesia yang terhindar dari limbah. Dalam kegiatannya tentu dibutuhkan peranan setiap penghasil limbah, pengolah limbah, pemanfaat limbah, dan lain-lain yang telah memiliki izin. Izin yang dimiliki menandakan kegiatan pengelolaan sesuai dengan peraturan yang berlaku sehingga tidak membahayakan lingkungan maupun masyarakat sekitar.</p>\r\n<p>&nbsp;</p>\r\n<h2><strong>Perusahaan Jasa Pengelolaan Limbah B3 di Jawa Barat</strong></h2>\r\n<p>Universal Eco merupakan perusahaan yang bergerak dalam bidang pengelolaan limbah, khususnya limbah B3. Kami hadir sebagai solusi dari permasalahan limbah B3 di Jawa Barat dengan berbagai izin yang telah kami miliki.</p>\r\n<p>Tak hanya Provinsi Jawa Barat saja, pelayanan pengelolaan limbah B3 kami mencakup hingga ke delapan provinsi lain seperti: Jawa Timur, Banten, DKI Jakarta, D.I Yogyakarta, Riau, Sumatra Barat, dan Sumatra Selatan.</p>\r\n<p>Dengan teknologi ramah lingkungan dan pengelolaan yang bertanggung jawab, Universal Eco bertekad untuk mewujudkan Indonesia minim limbah dengan berbagai program yang ditawarkan, seperti:</p>\r\n<ul>\r\n<li>Pengelolaan limbah medis</li>\r\n<li>Pengelolaan limbah B3</li>\r\n<li>Pengelolaan limbah farmasi</li>\r\n<li>Kegiatan daur ulang</li>\r\n<li>Penghancuran data penting</li>\r\n<li><em>Extended Producer Responsibility</em>&nbsp;(EPR)</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Mari bersama menciptakan lingkungan lebih baik bersama Universal Eco.</p>', 1, '2021-10-13 16:42:17', 1, '2021-10-13 16:42:17', 1),
(3, 'Blog', 'Jasa Pengolahan Limbah B3 di Tangerang', '2021-11-01', NULL, 'jasa-pengolahan-limbah-b3-di-tangerang', '20211014100616blog.jpg', '', '<p>qq</p>', '<p>qq</p>', 1, '2021-10-14 02:52:11', 1, '2021-10-14 02:52:11', 1),
(4, 'News', 'Press Release Webinar Pengelolaan Limbah Medis dan Farmasi di Masa Pandemi COVID-19', '2021-11-01', NULL, 'https://www.universaleco.id/press-release-webinar-pengelolaan-limbah-medis-dan-farmasi-di-masa-pandemi-covid-19', '20211124094224blog.jpg', '', '', '', 1, '2021-11-24 02:42:24', 0, '2021-11-24 09:42:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ue_certificate`
--

CREATE TABLE `ue_certificate` (
  `ue_certificate_id` int(11) NOT NULL,
  `ue_certificate_name` varchar(255) DEFAULT NULL,
  `ue_certificate_icon` text NOT NULL,
  `ue_certificate_description` text DEFAULT NULL,
  `ue_certificate_sequence` int(11) NOT NULL,
  `ue_certificate_status` int(1) NOT NULL,
  `ue_certificate_updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ue_certificate_updated_id` int(11) NOT NULL,
  `ue_certificate_created_date` timestamp NULL DEFAULT NULL,
  `ue_certificate_created_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ue_certificate`
--

INSERT INTO `ue_certificate` (`ue_certificate_id`, `ue_certificate_name`, `ue_certificate_icon`, `ue_certificate_description`, `ue_certificate_sequence`, `ue_certificate_status`, `ue_certificate_updated_date`, `ue_certificate_updated_id`, `ue_certificate_created_date`, `ue_certificate_created_id`) VALUES
(1, 'Festronik', '20211101111422certificate.png', '', 4, 1, '2021-11-22 04:02:55', 0, '2021-11-22 11:02:55', 1),
(2, 'ISO 9001:2015', '20210928095625certificate.png', '', 1, 1, '2021-09-28 02:56:25', 0, '2021-09-28 02:56:25', 1),
(3, 'ISO 45001:2018', '20210928095640certificate.png', '', 2, 1, '2021-09-28 02:56:40', 0, '2021-09-28 02:56:40', 1),
(4, 'ISO 14001:2015', '20210928095651certificate.png', '', 3, 1, '2021-09-28 02:56:51', 0, '2021-09-28 02:56:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ue_client`
--

CREATE TABLE `ue_client` (
  `ue_client_id` int(11) NOT NULL,
  `ue_client_name` varchar(255) NOT NULL,
  `ue_client_icon` text NOT NULL,
  `ue_client_description` text DEFAULT NULL,
  `ue_client_sequence` int(11) NOT NULL,
  `ue_client_status` int(1) NOT NULL,
  `ue_client_updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ue_client_updated_id` int(11) NOT NULL,
  `ue_client_created_date` timestamp NULL DEFAULT NULL,
  `ue_client_created_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ue_client`
--

INSERT INTO `ue_client` (`ue_client_id`, `ue_client_name`, `ue_client_icon`, `ue_client_description`, `ue_client_sequence`, `ue_client_status`, `ue_client_updated_date`, `ue_client_updated_id`, `ue_client_created_date`, `ue_client_created_id`) VALUES
(1, 'Panasonic', '20210928051456client.png', '', 1, 1, '2021-09-27 22:14:56', 1, '2021-09-27 22:14:56', 1),
(2, 'Indofood', '20210928051506client.png', '', 2, 1, '2021-09-27 22:15:06', 0, '2021-09-27 22:15:06', 1),
(3, 'Polytron', '20210928051513client.png', '', 3, 1, '2021-09-27 22:15:13', 0, '2021-09-27 22:15:13', 1),
(4, 'Fiesta', '20210928051521client.png', '', 4, 1, '2021-09-27 22:15:21', 0, '2021-09-27 22:15:21', 1),
(5, 'Castrol', '20210928051527client.png', '', 5, 1, '2021-09-27 22:15:27', 0, '2021-09-27 22:15:27', 1),
(6, 'Nike', '20210928051533client.png', '', 6, 1, '2021-09-27 22:15:33', 0, '2021-09-27 22:15:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ue_content`
--

CREATE TABLE `ue_content` (
  `ue_content_id` int(11) NOT NULL,
  `ue_content_type` varchar(255) NOT NULL,
  `ue_content_title` varchar(255) NOT NULL,
  `ue_content_sub_title` varchar(255) DEFAULT NULL,
  `ue_content_slug` text NOT NULL,
  `ue_content_excerpt` text DEFAULT NULL,
  `ue_content_description` text NOT NULL,
  `ue_content_status` int(1) NOT NULL,
  `ue_content_updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ue_content_updated_id` int(11) NOT NULL,
  `ue_content_created_date` timestamp NULL DEFAULT NULL,
  `ue_content_created_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ue_content`
--

INSERT INTO `ue_content` (`ue_content_id`, `ue_content_type`, `ue_content_title`, `ue_content_sub_title`, `ue_content_slug`, `ue_content_excerpt`, `ue_content_description`, `ue_content_status`, `ue_content_updated_date`, `ue_content_updated_id`, `ue_content_created_date`, `ue_content_created_id`) VALUES
(1, 'tentang', 'Wujudkan Indonesia Bebas Limbah untuk Hari Esok yang Berkelanjutan', 'Tentang Universal Eco', '', NULL, '<p>Universal Eco adalah perusahaan pengelola limbah yang bertanggung jawab dan ramah lingkungan. Misi kami adalah membantu mewujudkan Indonesia bebas limbah dan mendorong pertumbuhan ekonomi melalui penerapan ekonomi sirkular bagi bisnis dan industri. Dengan menggunakan teknologi ramah lingkungan, Universal Eco dapat melayani berbagai jenis kebutuhan pengelolaan limbah domestik dan B3 (Bahan Beracun &amp; Berbahaya) yang bersumber dari area komersil, industri, dan fasilitas layanan kesehatan.</p>', 1, '2021-09-28 02:53:10', 1, '2021-09-28 02:53:10', 1),
(2, 'kontak', 'Hubungi Kami', '', '', NULL, '<p>Lewat berbagai layanan pengelolaan B3 yang ramah lingkungan dan bertanggungjawab, Universal Eco membantu anda turut mewujudkan Indonesia bebas limbah dan mendorong pertumbuhan ekonomi sirkular bagi bisnis dan industri.</p>', 1, '2021-09-29 01:07:15', 0, '2021-09-29 01:07:15', 1),
(3, 'penawaran', 'Info Penawaran', '', '', NULL, '<div class=\"page\" title=\"Page 1\">\r\n<div class=\"section\">\r\n<div class=\"layoutArea\">\r\n<div class=\"column\">\r\n<p>Lewat berbagai layanan pengelolaan B3 yang ramah lingkungan dan bertanggungjawab, Universal Eco membantu anda turut mewujudkan Indonesia bebas limbah dan mendorong pertumbuhan ekonomi sirkular bagi bisnis dan industri.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 1, '2021-09-29 01:07:49', 0, '2021-09-29 01:07:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ue_faq`
--

CREATE TABLE `ue_faq` (
  `ue_faq_id` int(11) NOT NULL,
  `ue_faq_title` varchar(255) NOT NULL,
  `ue_faq_description` text NOT NULL,
  `ue_faq_status` int(1) NOT NULL,
  `ue_faq_updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ue_faq_updated_id` int(11) NOT NULL,
  `ue_faq_created_date` timestamp NULL DEFAULT NULL,
  `ue_faq_created_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ue_faq`
--

INSERT INTO `ue_faq` (`ue_faq_id`, `ue_faq_title`, `ue_faq_description`, `ue_faq_status`, `ue_faq_updated_date`, `ue_faq_updated_id`, `ue_faq_created_date`, `ue_faq_created_id`) VALUES
(1, 'Apakah Universal Eco melayani jasa pengangkutan, pengelolaan dan pembuangan akhir limbah?', 'Universal Eco melayani jasa pengangkutan dan pengelolaan limbah B3 yang telah memiliki izin dari KLHK. Kami melayani proses penanganan limbah B3 untuk berbagai industri, area komersil, dan fasilitas layanan kesehatan mulai dari pengangkutan, pengelolaan hingga proses pembuang akhir yang ramah lingkungan.', 1, '2021-09-28 13:58:45', 0, '2021-09-28 13:58:45', 1),
(2, 'Jenis limbah apa saja yang dapat dikelola oleh Universal Eco ?', 'Kami melayani  sektor industri, area komersil, dan fasilitas kesehatan untuk pengelolaan limbah B3 dengan Limbah yang dapat kami kelola meliputi Limbah non B3 dan Limbah B3. Limbah non B3 seperti reject product, produk kadaluwarsa. Limbah B3 baik kemasan maupun kandungan berbahan kimia, limbah medis dan farmasi, Limbah hasil produksi seperti Oil Sludge, limbah elektronik, dan limbah data dan dokumen perusahaan.', 1, '2021-09-28 13:59:00', 0, '2021-09-28 13:59:00', 1),
(3, 'Apakah Universal Eco melayani jasa pengolahan dan pengangkutan di luar Pulau Jawa ?', 'Pengolahan yang dilakukan oleh Universal Eco berada di Jl. Modern Industri XV Blok AD No.4, Desa Sukatani, Kec. Cikande, Kab. Serang, Banten. Sedangkan, Pengangkutan dapat dilakukan di wilayah Jakarta, Bekasi, Tangerang, Banten, Karawang, Bogor, Serang, Depok, Bandung, Sukabumi, Purwakarta, Subang, Semarang, Yogyakarta, Jawa Barat, dan Jawa Tengah. Namun kami telah melakukan kerjasama Pengolahan dan Pengangkutan sampai Pulau Sumatera.  Pengangkutan yang dilakukan di luar area tersebut dapat menggunakan jasa pihak ketiga/transporter yang sudah memiliki izin.', 1, '2021-09-28 13:59:11', 0, '2021-09-28 13:59:11', 1),
(4, 'Berapa kapasitas maksimal setiap layanan pengangkutan limbah ?', 'Kapasitas maksimal pengangkutan dapat disesuaikan dengan jumlah limbah yang dihasilkan. Universal Eco menyediakan beberapa jenis pengangkutan, yaitu:<br />\r\n1. Wingbox Double Ban 50 m2, maksimal 15 ton <br />\r\n2. Wingbox Engkel 43 m2, maksimal 12 ton <br />\r\n3. Colt Diesel Double Ban 22 m2, maksimal 5 ton <br />\r\n4. Colt Diesel Double Ban 11 m2, maksimal 1 ton', 1, '2021-09-28 14:00:00', 0, '2021-09-28 14:00:00', 1),
(5, 'Berapa harga layanan Universal Eco dan bagaimanakah teknis layanan tersebut ?', 'Harga layanan Universal Eco disesuaikan dengan jenis limbah yang dihasilkan, jumlah pengangkutan dan juga area pengangkutan. Teknis layanan kami adalah setelah pelanggan menjalin kerjasama maka pelanggan akan mendapatkan jadwal pengangkutan dan kemudian akan mendapatkan layanan pengangkutan dengan bukti pengangkutan yaitu manifest limbah B3.', 1, '2021-09-28 14:00:11', 0, '2021-09-28 14:00:11', 1),
(6, 'Bagaimana tata cara untuk melakukan kerjasama pengelolaan limbah B3 dengan Universal Eco ?', 'Apabila belum pernah menjalin kerjasama dengan Universal Eco, maka anda dapat menghubungi Call Center kami yang tersedia pada Website dan selanjutnya kami akan segera menghubungi anda dan memberikan Company Profile. Prosedur kerjasama berikutnya adalah pengisian formulir data limbah customer, pemberian surat penawaran (Quotation Confirmation Letter), dan melakukan Memorandum of Understanding (MoU) dengan melampirkan NPWP perusahaan.', 1, '2021-09-28 14:00:24', 0, '2021-09-28 14:00:24', 1),
(7, 'Sebelum melakukan kerjasama, bisakah saya melakukan peninjauan ke lokasi pengolahan limbah Universal Eco?', 'Peninjauan lokasi hanya diperuntukkan bagi pelanggan Universal Eco, dimana dapat dilakukan sebelum atau sesudah Memorandum of Understanding (MoU) sesuai kesepakatan dengan pihak Universal Eco', 1, '2021-09-28 14:00:35', 0, '2021-09-28 14:00:35', 1),
(8, 'Apakah terdapat paket layanan yang ditawarkan oleh Universal Eco ?', 'Paket pelayanan yang kami sediakan yakni untuk paket small business (perkantoran, klinik kecantikan, klinik kesehatan, dan lain-lain) dengan kuantitas limbah yang minim dan rentang frekuensi pengangkutan yang jarang.', 1, '2021-09-28 14:00:45', 0, '2021-09-28 14:00:45', 1),
(9, 'Apakah ada nomor telepon contact person Marketing yang bisa saya hubungi ?', 'Anda dapat menghubungi marketing kami via call center pada website Universal Eco atau anda dapat menghubungi kami di nomor telepon 021-3517984 / 021-3520701 atau di nomor Whatsapp  +6282110896311', 1, '2021-09-28 14:00:55', 0, '2021-09-28 14:00:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ue_homepage`
--

CREATE TABLE `ue_homepage` (
  `ue_homepage_id` int(11) NOT NULL,
  `ue_homepage_title` varchar(255) DEFAULT NULL,
  `ue_homepage_url` text NOT NULL,
  `ue_homepage_link` text DEFAULT NULL,
  `ue_homepage_description` text DEFAULT NULL,
  `ue_homepage_sequence` int(11) NOT NULL,
  `ue_homepage_status` int(1) NOT NULL,
  `ue_homepage_updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ue_homepage_updated_id` int(11) NOT NULL,
  `ue_homepage_created_date` timestamp NULL DEFAULT NULL,
  `ue_homepage_created_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ue_homepage`
--

INSERT INTO `ue_homepage` (`ue_homepage_id`, `ue_homepage_title`, `ue_homepage_url`, `ue_homepage_link`, `ue_homepage_description`, `ue_homepage_sequence`, `ue_homepage_status`, `ue_homepage_updated_date`, `ue_homepage_updated_id`, `ue_homepage_created_date`, `ue_homepage_created_id`) VALUES
(1, 'Solusi Pengolahan Limbah Bertanggung Jawab', '20211125162454homepage.jpg', '', '', 1, 1, '2021-09-27 06:53:19', 1, '2021-09-27 06:53:19', 1),
(2, 'Mari Wujudkan Lingkungan Bebas Limbah dengan Transisi ke Ekonomi Sirkular', '20211125162605homepage.jpg', 'https://catchysite.com/universaleco/content/extended-produce-responsibility/1', 'Dengan menggunakan limbah sebagai bahan baku alternatif untuk proses produksi maka transisi dari praktis ekonomi linier menjadi sirkular dan lingkungan bebas limbah dapat diwujudkan', 2, 1, '2021-09-27 12:53:40', 1, '2021-09-27 12:53:40', 1),
(3, 'Layanan Call Center Kami Siap Menjawab berbagai Kebutuhan Anda', '20211125162614homepage.jpg', '', 'Tim Call Center kami siap membantu anda untuk menjawab berbagai pernyataan dan kebutuhan tata cara pengelolaan limbah.', 3, 1, '2021-09-27 12:54:45', 1, '2021-09-27 12:54:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ue_infografis`
--

CREATE TABLE `ue_infografis` (
  `ue_infografis_id` int(11) NOT NULL,
  `ue_infografis_name` varchar(255) NOT NULL,
  `ue_infografis_image` text NOT NULL,
  `ue_infografis_url` text NOT NULL,
  `ue_infografis_status` int(1) NOT NULL,
  `ue_infografis_updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ue_infografis_updated_id` int(11) NOT NULL,
  `ue_infografis_created_date` timestamp NULL DEFAULT NULL,
  `ue_infografis_created_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ue_infografis`
--

INSERT INTO `ue_infografis` (`ue_infografis_id`, `ue_infografis_name`, `ue_infografis_image`, `ue_infografis_url`, `ue_infografis_status`, `ue_infografis_updated_date`, `ue_infografis_updated_id`, `ue_infografis_created_date`, `ue_infografis_created_id`) VALUES
(1, 'Festronik', '20211124094417infografis.jpg', '20211124094417infografis.pdf', 1, '2021-10-13 16:57:08', 1, '2021-10-13 16:57:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ue_limbah`
--

CREATE TABLE `ue_limbah` (
  `ue_limbah_id` int(11) NOT NULL,
  `ue_limbah_code` varchar(255) NOT NULL,
  `ue_limbah_description` text NOT NULL,
  `ue_limbah_status` int(1) NOT NULL,
  `ue_limbah_category_id` int(11) NOT NULL,
  `ue_limbah_updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ue_limbah_updated_id` int(11) NOT NULL,
  `ue_limbah_created_date` timestamp NULL DEFAULT NULL,
  `ue_limbah_created_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ue_limbah`
--

INSERT INTO `ue_limbah` (`ue_limbah_id`, `ue_limbah_code`, `ue_limbah_description`, `ue_limbah_status`, `ue_limbah_category_id`, `ue_limbah_updated_date`, `ue_limbah_updated_id`, `ue_limbah_created_date`, `ue_limbah_created_id`) VALUES
(1, 'A101b', 'Ksilena', 1, 1, '2021-11-07 10:11:59', 0, '2021-11-07 10:11:59', 1),
(2, 'A102b', 'Aseton', 1, 1, '2021-11-07 10:12:07', 1, '2021-11-07 10:12:07', 1),
(3, 'A103b', 'Etil asetat', 1, 1, '2021-11-07 11:46:37', 0, '2021-11-07 11:46:37', 1),
(4, 'A104b', 'Etil Benzena', 1, 1, '2021-11-07 11:46:46', 0, '2021-11-07 11:46:46', 1),
(5, 'A105b', 'Etil eter', 1, 1, '2021-11-07 11:46:58', 0, '2021-11-07 11:46:58', 1),
(6, 'A106b', 'Metil Isobutil Keton', 1, 1, '2021-11-07 11:47:12', 0, '2021-11-07 11:47:12', 1),
(7, 'A107b', 'n-Butil Alkohol', 1, 1, '2021-11-07 11:47:25', 0, '2021-11-07 11:47:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ue_limbah_category`
--

CREATE TABLE `ue_limbah_category` (
  `ue_limbah_category_id` int(11) NOT NULL,
  `ue_limbah_category_name` varchar(255) NOT NULL,
  `ue_limbah_category_status` int(1) NOT NULL,
  `ue_limbah_category_updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ue_limbah_category_updated_id` int(11) NOT NULL,
  `ue_limbah_category_created_date` timestamp NULL DEFAULT NULL,
  `ue_limbah_category_created_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ue_limbah_category`
--

INSERT INTO `ue_limbah_category` (`ue_limbah_category_id`, `ue_limbah_category_name`, `ue_limbah_category_status`, `ue_limbah_category_updated_date`, `ue_limbah_category_updated_id`, `ue_limbah_category_created_date`, `ue_limbah_category_created_id`) VALUES
(1, 'Kode Pengolahan Limbah B3 - Insinerasi', 1, '2021-11-07 10:38:03', 0, '2021-11-07 10:38:03', 1),
(2, 'Kode Pengolahan Limbah B3 - Pencucian Kemasan B3', 1, '2021-11-07 10:38:40', 1, '2021-11-07 10:38:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ue_misc`
--

CREATE TABLE `ue_misc` (
  `ue_misc_id` int(11) NOT NULL,
  `ue_misc_name` varchar(255) NOT NULL,
  `ue_misc_value` text DEFAULT NULL,
  `ue_misc_updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ue_misc_updated_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ue_misc`
--

INSERT INTO `ue_misc` (`ue_misc_id`, `ue_misc_name`, `ue_misc_value`, `ue_misc_updated_date`, `ue_misc_updated_id`) VALUES
(1, 'Call Center', '62211234567', '2021-09-27 03:46:31', 1),
(2, 'Whatsapp', '6281220895566', '2021-09-27 03:46:31', 1),
(3, 'Jadwal Buka', 'Senin - Jumat<br />\r\nPukul 08.00 - 17.00', '2021-09-27 03:46:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ue_product`
--

CREATE TABLE `ue_product` (
  `ue_product_id` int(11) NOT NULL,
  `ue_product_name` varchar(255) NOT NULL,
  `ue_product_slug` text NOT NULL,
  `ue_product_image` text NOT NULL,
  `ue_product_bg` text DEFAULT NULL,
  `ue_product_excerpt` text DEFAULT NULL,
  `ue_product_description` text NOT NULL,
  `ue_product_status` int(1) NOT NULL,
  `ue_product_updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ue_product_updated_id` int(11) NOT NULL,
  `ue_product_created_date` timestamp NULL DEFAULT NULL,
  `ue_product_created_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ue_product`
--

INSERT INTO `ue_product` (`ue_product_id`, `ue_product_name`, `ue_product_slug`, `ue_product_image`, `ue_product_bg`, `ue_product_excerpt`, `ue_product_description`, `ue_product_status`, `ue_product_updated_date`, `ue_product_updated_id`, `ue_product_created_date`, `ue_product_created_id`) VALUES
(1, 'Extended Produce Responsibility', '', '20210928044420product.png', '20211125163710product.jpg', '<p>Kami membantu produsen mengelola produk yang ada ditahap masa akhir penggunaan <em>(post-consumer)</em> melalui skema penarikan kembali untuk dikelola di <em>Material Recovery Facility (MRF)</em>.</p>', '<p>Kami membantu produsen mengelola produk yang ada ditahap masa akhir penggunaan <em>(post-consumer)</em> melalui skema penarikan kembali untuk dikelola di Material Recovery Facility (MRF) kami. Jadikan perusahaan anda perusahaan yang bertanggung jawab akan lingkungan melalui penerapan ekonomi sirkular yang efektif dan ramah lingkungan.</p>', 1, '2021-09-27 21:44:20', 1, '2021-09-27 21:44:20', 1),
(2, 'Daur Ulang Plastik & Kemasan Limbah B3', '', '20210928044447product.png', '20211125163738product.jpg', '<p>Bersama Universal Eco, anda juga mengurangi resiko penyalahgunaan atas kemasan produk anda dan menjaga lingkungan kita dari pencemaran limbah plastik dan kemasan.</p>', '<p>Dengan bekerjasama dengan Universal Eco, anda juga mengurangi resiko penyalahgunaan atas kemasan produk anda dan menjaga lingkungan kita dari pencemaran limbah plastik dan kemasan.</p>', 1, '2021-09-27 21:44:47', 1, '2021-09-27 21:44:47', 1),
(3, 'Pengolahan Limbah B3', '', '20210928044505product.png', '20211013102213product.jpg', '<p>Universal Eco menawarkan Penanganan Limbah B3 dengan pengangkutan, pemanfaatan, dan pengolahan limbah yang bertanggungjawab guna mencegah pencemaran lingkungan.</p>', '<p>Universal Eco melayani jasa pengelolaan limbah B3 (Bahan Berbahaya dan Beracun) yang berasal dari berbagai jenis industri. Limbah B3 dapat menimbukan dampak negatif yang serius bagi lingkungan jika tidak ditangani dengan baik. Universal Eco menawarkan pengangkutan, pemanfaatan, dan pengolahan limbah B3 yang bertanggung jawab dan ramah lingkungan agar pencemaran lingkungan dari bahan berbahaya dapat dihindari.</p>', 1, '2021-09-27 21:45:05', 1, '2021-09-27 21:45:05', 1),
(4, 'Pengolahan Limbah Medis & Farmasi', '', '20210928044522product.png', '20211125163804product.jpg', '<p>Universal Eco melayani pengelolaan limbah infeksius yang berasal dari fasilitas medis dan farmasi. Kami menggunakan teknologi insinerator ramah lingkungan yang dapat melenyapkan sifat infeksius limbah.</p>\r\n<p>&nbsp;</p>', '<p>Universal Eco melayani pengelolaan limbah infeksius yang berasal dari fasilitas layanan kesehatan seperti rumah sakit, puskesmas, laboratorium kesehatan dan farmasi. Dengan melakukan pengolahan menggunakan teknologi insinerator yang ramah lingkungan dengan suhu tinggi maka sifat infeksius yang terdapat pada limbah medis dapat dilenyapkan dan tidak lagi berbahaya bagi lingkungan</p>', 1, '2021-09-27 21:45:22', 1, '2021-09-27 21:45:22', 1),
(5, 'Zero Waste Treatment', '', '20210928044633product.png', '20211125163817product.jpg', '<p>Universal Eco melayani pengelolaan Limbah Domestik. Residu yang dihasilkan dari proses treatment digunakan sebagai alternatif material untuk produksi batako sehingga zero-waste dapat tercipta</p>', '<p>Universal Eco melayani pengelolaan limbah domestik untuk berbagai macam jenis bisnis dan industri. Residu yang dihasilkan dari <em>proses treatment</em> dialihkan dari <em>landfill</em>, digunakan sebagai alternatif material untuk produksi batako sehingga tidak ada limbah yang tersisa atau <em>zero-waste</em></p>', 1, '2021-09-27 21:46:33', 1, '2021-09-27 21:46:33', 1),
(6, 'Secure Data Destruction', '', '20210928044648product.png', '20211125163828product.jpg', '<p>Universal Eco melayani penghancuran limbah data dan dokumen perusahaan secara rutin atau sesekali. Pastikan keamanan data perusahaan anda di tangan yang aman bersama kami.</p>', '<p>Universal Eco melayani pengelolaan limbah data dan dokumen perusahaan. Kami melayani jasa penghancuran secara rutin atau sesekali&nbsp;<em>(one-time).&nbsp;</em>Pastikan keamanan data dari dokumen perusahaan anda di tangan yang bertanggung jawab bersama Universal Eco.</p>', 1, '2021-09-27 21:46:48', 1, '2021-09-27 21:46:48', 1),
(7, 'Pemanfaatan Oli Bekas & Oil Sludge', '', '20210928044704product.png', '20211125163839product.jpg', '<p>Universal Eco melayani pengelolaan oli bekas dan oil sludge yang ramah lingkungan. Sistem Two Phase Decanter kami dapat membuat minyak mentah dapat digunakan kembali (reuse)</p>', '<p>Universal Eco menawarkan layanan pengelolaan lumpur minyak (oil sludge) dan oli bekas (used oil) yang ramah bagi lingkungan. Sistem Two Phase Decanter kami dapat memisahkan padatan mineral, minyak, dan air yang terdapat pada lumpur minyak sehingga minyak mentah dapat diperoleh (recovery) dan dipergunakan kembali (reuse).</p>', 1, '2021-09-27 21:47:04', 1, '2021-09-27 21:47:04', 1),
(8, 'E-Waste', '', '20211003225147product.jpg', '', '<p>Layanan Electronic Waste</p>', '<p>Layanan Electronic Waste</p>', 1, '2021-11-22 04:14:58', 1, '2021-11-22 11:14:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ue_service`
--

CREATE TABLE `ue_service` (
  `ue_service_id` int(11) NOT NULL,
  `ue_service_name` varchar(255) DEFAULT NULL,
  `ue_service_icon` text DEFAULT NULL,
  `ue_service_description` text NOT NULL,
  `ue_service_sequence` int(11) NOT NULL,
  `ue_service_status` int(1) NOT NULL,
  `ue_service_updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ue_service_updated_id` int(11) NOT NULL,
  `ue_service_created_date` timestamp NULL DEFAULT NULL,
  `ue_service_created_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ue_service`
--

INSERT INTO `ue_service` (`ue_service_id`, `ue_service_name`, `ue_service_icon`, `ue_service_description`, `ue_service_sequence`, `ue_service_status`, `ue_service_updated_date`, `ue_service_updated_id`, `ue_service_created_date`, `ue_service_created_id`) VALUES
(1, 'Teknologi Ramah Lingkungan', '20210928043149service.png', 'Pengelolaan limbah bertanggung jawab dengan teknologi ramah lingkungan', 1, 1, '2021-09-27 21:31:49', 1, '2021-09-27 21:31:49', 1),
(2, 'Next Best Use', '20210928043214service.png', 'Memastikan limbah dikelola dengan prinsip penggunaan terbaik selanjutnya atau ‘Next Best Use’', 2, 1, '2021-09-27 21:32:14', 0, '2021-09-27 21:32:14', 1),
(3, 'Laporan Alur Limbah', '20210928043229service.png', 'Pengangkutan semua jenis limbah sesuai kebutuhan disertai laporan alur limbah', 3, 1, '2021-09-27 21:32:29', 0, '2021-09-27 21:32:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ue_social`
--

CREATE TABLE `ue_social` (
  `ue_social_id` int(11) NOT NULL,
  `ue_social_name` varchar(255) NOT NULL,
  `ue_social_url` text DEFAULT NULL,
  `ue_social_icon` text NOT NULL,
  `ue_social_sequence` int(11) NOT NULL,
  `ue_social_status` int(1) NOT NULL,
  `ue_social_updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ue_social_updated_id` int(11) NOT NULL,
  `ue_social_created_date` timestamp NULL DEFAULT NULL,
  `ue_social_created_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ue_support`
--

CREATE TABLE `ue_support` (
  `ue_support_id` int(11) NOT NULL,
  `ue_support_name` varchar(255) NOT NULL,
  `ue_support_icon` text NOT NULL,
  `ue_support_description` text DEFAULT NULL,
  `ue_support_sequence` int(11) NOT NULL,
  `ue_support_status` int(1) NOT NULL,
  `ue_support_updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ue_support_updated_id` int(11) NOT NULL,
  `ue_support_created_date` timestamp NULL DEFAULT NULL,
  `ue_support_created_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ue_support`
--

INSERT INTO `ue_support` (`ue_support_id`, `ue_support_name`, `ue_support_icon`, `ue_support_description`, `ue_support_sequence`, `ue_support_status`, `ue_support_updated_date`, `ue_support_updated_id`, `ue_support_created_date`, `ue_support_created_id`) VALUES
(1, '43m<sup>3</sup> Tipe Wing Box', '20210928052020support.png', '', 1, 1, '2021-09-27 22:20:20', 0, '2021-09-27 22:20:20', 1),
(2, '22m<sup>3</sup> Tipe Colt Diesel Double', '20210928052039support.png', '', 2, 1, '2021-09-27 22:20:39', 0, '2021-09-27 22:20:39', 1),
(3, '11m<sup>3</sup> Tipe colt Diesel Engkel', '20210928052255support.png', '', 3, 1, '2021-09-27 22:22:55', 0, '2021-09-27 22:22:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ue_user`
--

CREATE TABLE `ue_user` (
  `ue_user_id` int(11) NOT NULL,
  `ue_user_name` varchar(255) NOT NULL,
  `ue_user_address` text DEFAULT NULL,
  `ue_user_phone` varchar(35) DEFAULT NULL,
  `ue_user_email` varchar(255) NOT NULL,
  `ue_user_password` varchar(32) NOT NULL,
  `ue_user_status` int(1) NOT NULL,
  `ue_user_updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ue_user_updated_id` int(11) NOT NULL,
  `ue_user_created_date` timestamp NULL DEFAULT NULL,
  `ue_user_created_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ue_user`
--

INSERT INTO `ue_user` (`ue_user_id`, `ue_user_name`, `ue_user_address`, `ue_user_phone`, `ue_user_email`, `ue_user_password`, `ue_user_status`, `ue_user_updated_date`, `ue_user_updated_id`, `ue_user_created_date`, `ue_user_created_id`) VALUES
(1, 'Super Admin', '', '', 'superadmin@gmail.com', '17c4520f6cfd1ab53d8745e84681eb49', 1, '2021-09-27 04:50:00', 1, '2021-09-27 04:50:00', 1),
(2, 'Admin', '', '', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 2, '2021-09-27 06:20:16', 0, '2021-09-27 06:20:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ue_waste`
--

CREATE TABLE `ue_waste` (
  `ue_waste_id` int(11) NOT NULL,
  `ue_waste_name` varchar(255) NOT NULL,
  `ue_waste_source` varchar(255) DEFAULT NULL,
  `ue_waste_url` text NOT NULL,
  `ue_waste_status` int(1) NOT NULL,
  `ue_waste_category_id` int(11) NOT NULL,
  `ue_waste_updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ue_waste_updated_id` int(11) NOT NULL,
  `ue_waste_created_date` timestamp NULL DEFAULT NULL,
  `ue_waste_created_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ue_waste`
--

INSERT INTO `ue_waste` (`ue_waste_id`, `ue_waste_name`, `ue_waste_source`, `ue_waste_url`, `ue_waste_status`, `ue_waste_category_id`, `ue_waste_updated_date`, `ue_waste_updated_id`, `ue_waste_created_date`, `ue_waste_created_id`) VALUES
(1, 'Test 1', 'Sumber Test 1', 'http://google.com', 1, 1, '2021-09-28 06:57:36', 1, '2021-09-28 06:57:36', 1),
(2, 'Test 2', 'Sumber Test 2', '20211007150339waste.pdf', 1, 2, '2021-09-28 06:57:48', 1, '2021-09-28 06:57:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ue_waste_category`
--

CREATE TABLE `ue_waste_category` (
  `ue_waste_category_id` int(11) NOT NULL,
  `ue_waste_category_name` varchar(255) NOT NULL,
  `ue_waste_category_icon` text DEFAULT NULL,
  `ue_waste_category_status` int(1) NOT NULL,
  `ue_waste_category_updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ue_waste_category_updated_id` int(11) NOT NULL,
  `ue_waste_category_created_date` timestamp NULL DEFAULT NULL,
  `ue_waste_category_created_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ue_waste_category`
--

INSERT INTO `ue_waste_category` (`ue_waste_category_id`, `ue_waste_category_name`, `ue_waste_category_icon`, `ue_waste_category_status`, `ue_waste_category_updated_date`, `ue_waste_category_updated_id`, `ue_waste_category_created_date`, `ue_waste_category_created_id`) VALUES
(1, 'Panduan Limbah B3', '20210929135335category.png', 1, '2021-09-28 03:46:34', 1, '2021-09-28 03:46:34', 1),
(2, 'Peraturan Lingkungan Terkini', '20210929135346category.png', 1, '2021-09-28 03:46:57', 1, '2021-09-28 03:46:57', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ue_achievement`
--
ALTER TABLE `ue_achievement`
  ADD PRIMARY KEY (`ue_achievement_id`);

--
-- Indexes for table `ue_blog`
--
ALTER TABLE `ue_blog`
  ADD PRIMARY KEY (`ue_blog_id`);

--
-- Indexes for table `ue_certificate`
--
ALTER TABLE `ue_certificate`
  ADD PRIMARY KEY (`ue_certificate_id`);

--
-- Indexes for table `ue_client`
--
ALTER TABLE `ue_client`
  ADD PRIMARY KEY (`ue_client_id`);

--
-- Indexes for table `ue_content`
--
ALTER TABLE `ue_content`
  ADD PRIMARY KEY (`ue_content_id`),
  ADD KEY `ue_content_type` (`ue_content_type`);

--
-- Indexes for table `ue_faq`
--
ALTER TABLE `ue_faq`
  ADD PRIMARY KEY (`ue_faq_id`);

--
-- Indexes for table `ue_homepage`
--
ALTER TABLE `ue_homepage`
  ADD PRIMARY KEY (`ue_homepage_id`),
  ADD KEY `ue_homepage_status` (`ue_homepage_status`),
  ADD KEY `ue_homepage_sequence` (`ue_homepage_sequence`);

--
-- Indexes for table `ue_infografis`
--
ALTER TABLE `ue_infografis`
  ADD PRIMARY KEY (`ue_infografis_id`);

--
-- Indexes for table `ue_limbah`
--
ALTER TABLE `ue_limbah`
  ADD PRIMARY KEY (`ue_limbah_id`);

--
-- Indexes for table `ue_limbah_category`
--
ALTER TABLE `ue_limbah_category`
  ADD PRIMARY KEY (`ue_limbah_category_id`);

--
-- Indexes for table `ue_misc`
--
ALTER TABLE `ue_misc`
  ADD PRIMARY KEY (`ue_misc_id`);

--
-- Indexes for table `ue_product`
--
ALTER TABLE `ue_product`
  ADD PRIMARY KEY (`ue_product_id`);

--
-- Indexes for table `ue_service`
--
ALTER TABLE `ue_service`
  ADD PRIMARY KEY (`ue_service_id`);

--
-- Indexes for table `ue_social`
--
ALTER TABLE `ue_social`
  ADD PRIMARY KEY (`ue_social_id`);

--
-- Indexes for table `ue_support`
--
ALTER TABLE `ue_support`
  ADD PRIMARY KEY (`ue_support_id`);

--
-- Indexes for table `ue_user`
--
ALTER TABLE `ue_user`
  ADD PRIMARY KEY (`ue_user_id`),
  ADD KEY `ue_user_email` (`ue_user_email`),
  ADD KEY `ue_user_password` (`ue_user_password`),
  ADD KEY `ue_user_status` (`ue_user_status`);

--
-- Indexes for table `ue_waste`
--
ALTER TABLE `ue_waste`
  ADD PRIMARY KEY (`ue_waste_id`);

--
-- Indexes for table `ue_waste_category`
--
ALTER TABLE `ue_waste_category`
  ADD PRIMARY KEY (`ue_waste_category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ue_achievement`
--
ALTER TABLE `ue_achievement`
  MODIFY `ue_achievement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ue_blog`
--
ALTER TABLE `ue_blog`
  MODIFY `ue_blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ue_certificate`
--
ALTER TABLE `ue_certificate`
  MODIFY `ue_certificate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ue_client`
--
ALTER TABLE `ue_client`
  MODIFY `ue_client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ue_content`
--
ALTER TABLE `ue_content`
  MODIFY `ue_content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ue_faq`
--
ALTER TABLE `ue_faq`
  MODIFY `ue_faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ue_homepage`
--
ALTER TABLE `ue_homepage`
  MODIFY `ue_homepage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ue_infografis`
--
ALTER TABLE `ue_infografis`
  MODIFY `ue_infografis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ue_limbah`
--
ALTER TABLE `ue_limbah`
  MODIFY `ue_limbah_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ue_limbah_category`
--
ALTER TABLE `ue_limbah_category`
  MODIFY `ue_limbah_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ue_misc`
--
ALTER TABLE `ue_misc`
  MODIFY `ue_misc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ue_product`
--
ALTER TABLE `ue_product`
  MODIFY `ue_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ue_service`
--
ALTER TABLE `ue_service`
  MODIFY `ue_service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ue_social`
--
ALTER TABLE `ue_social`
  MODIFY `ue_social_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ue_support`
--
ALTER TABLE `ue_support`
  MODIFY `ue_support_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ue_user`
--
ALTER TABLE `ue_user`
  MODIFY `ue_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ue_waste`
--
ALTER TABLE `ue_waste`
  MODIFY `ue_waste_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ue_waste_category`
--
ALTER TABLE `ue_waste_category`
  MODIFY `ue_waste_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

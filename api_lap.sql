-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: api_lap
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `alamat`
--

DROP TABLE IF EXISTS `alamat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alamat` (
  `id_alamat` int(11) NOT NULL AUTO_INCREMENT,
  `jalan` varchar(255) DEFAULT NULL,
  `kec` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `gmaps` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_alamat`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alamat`
--

LOCK TABLES `alamat` WRITE;
/*!40000 ALTER TABLE `alamat` DISABLE KEYS */;
INSERT INTO `alamat` VALUES (1,'Perum. Bumi Tamalanrea Permai, Blk. H, Tamalanrea','Tamalanrea','Makassar, Sulawesi Selatan','https://goo.gl/maps/QA3bUFt2FrYgQ53K7'),(2,'Perum. Bumi Tamalanrea Permai, Blk. AA, Jl. Laniang','Tamalanrea','Makassar, Sulawesi Selatan','https://goo.gl/maps/QA3bUFt2FrYgQ53K7'),(3,'Jl. Bend. Bili-Bili II','Rappocini','Makassar','https://goo.gl/maps/jX9sLXihcKiopVho7'),(4,'Jl. Sultan Dg Raja','Bontoala','Makassar','https://goo.gl/maps/Qsqa8pjRbRcwSqK87'),(5,'Jl. Pelita Raya IV No.32','Rappocini','Makassar','https://goo.gl/maps/evxHZgF8MrdjVJZB7'),(6,'Jl. Andi Pangeran Pettarani 2','Rappocini','Makassar','https://goo.gl/maps/AU6AB71dCp84psgA8'),(7,'Jl. Wijaya Kusuma, Banta-Bantaeng','Rappocini','Makassar','https://goo.gl/maps/QbApcPtbWUZkCui68'),(8,'Jl. Inspeksi Kanal No.69','Panakkukang','Makassar','https://goo.gl/maps/vkUapUMh9zREy65w8'),(9,'Jl. Borong Indah No.11','Manggala','Makassar','https://goo.gl/maps/4XMf2yqhQmU233rp6'),(10,'Jl. Sukamaju II No.6C','Panakkukang','Makassar','https://goo.gl/maps/RkFQ4uGWPoyS4EC28'),(11,'Jl. S. Saddang II No.16','Makassar','Makassar','https://goo.gl/maps/xEMYYopazTRF6KQq9'),(12,'Jl. Daeng Tata 1 No.2','Tamalate','Makassar','https://goo.gl/maps/rGmduKX9TvqKwjHp9');
/*!40000 ALTER TABLE `alamat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fasilitas`
--

DROP TABLE IF EXISTS `fasilitas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fasilitas` (
  `id_fas` int(11) NOT NULL AUTO_INCREMENT,
  `fas1` varchar(255) DEFAULT NULL,
  `fas2` varchar(255) DEFAULT NULL,
  `fas3` varchar(255) DEFAULT NULL,
  `fas4` varchar(255) DEFAULT NULL,
  `fas5` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_fas`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fasilitas`
--

LOCK TABLES `fasilitas` WRITE;
/*!40000 ALTER TABLE `fasilitas` DISABLE KEYS */;
INSERT INTO `fasilitas` VALUES (1,'Penjual Makanan','Penjual Minuman','Musholla','Parkiran','Toilet'),(2,'Penjual Makanan','Penjual Minuman','Musholla','Parkiran','Toilet'),(3,'Penjual Makanan','Penjual Minuman','Musholla','Parkiran','Toilet'),(4,'Penjual Makanan','Penjual Minuman','Musholla','Parkiran','Toilet'),(5,'Penjual Makanan','Penjual Minuman','Musholla','Parkiran','Toilet'),(6,'Penjual Makanan','Penjual Minuman','Musholla','Parkiran','Toilet'),(7,'Penjual Makanan','Penjual Minuman','Musholla','Parkiran','Toilet'),(8,'Penjual Makanan','Penjual Minuman','Musholla','Parkiran','Toilet'),(9,'Penjual Makanan','Penjual Minuman','Musholla','Parkiran','Toilet'),(10,'','','','','Toilet'),(11,'Penjual Makanan','Penjual Minuman','Musholla','Parkiran','Toilet'),(12,'Penjual Makanan','Penjual Minuman','Musholla','Parkiran','Toilet');
/*!40000 ALTER TABLE `fasilitas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galery`
--

DROP TABLE IF EXISTS `galery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `galery` (
  `id_galery` int(11) NOT NULL AUTO_INCREMENT,
  `gambar1` varchar(255) DEFAULT NULL,
  `gambar2` varchar(255) DEFAULT NULL,
  `gambar3` varchar(255) DEFAULT NULL,
  `gambar4` varchar(255) DEFAULT NULL,
  `gambar5` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_galery`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galery`
--

LOCK TABLES `galery` WRITE;
/*!40000 ALTER TABLE `galery` DISABLE KEYS */;
INSERT INTO `galery` VALUES (1,'Hidayat.jpg','Hidayat2.jpg','Hidaya3.jpg','Hidayat4.jpg','Hidayat5.jpg'),(2,'Laniang.jpeg','Laniang2.jpeg','Laniang3.jpeg','Laniang4.jpeg','Laniang5.jpeg'),(3,'Poltekkes.png','Poltekkes2.png','Poltekkes3.png','Poltekkes4.png','Poltekkes5.png'),(4,'Anugerah.png','Anugerah2.png','Anugerah3.png','Anugerah4.png','Anugerah5.png'),(5,'Pelita.png','Pelita2.png','Pelita3.png','Pelita4.png','Pelita5.png'),(6,'Telkom.png','Telkom2.png','Telkom3.png','Telkom4.png','Telkom5.png'),(7,'UNM.png','UNM2.png','UNM3.png','UNM4.png','UNM5.png'),(8,'cage.png','cage2.png','cage3.png','cage4.png','cage5.png'),(9,'Figa.png','Figa2.png','Figa3.png','Figa4.png','Figa5.png'),(10,'Padaidi.png','Padaidi2.png','Padaidi3.png','Padaidi4.png','Padaidi5.png'),(11,'Smash.png','Smash2.png','Smash3.png','Smash4.png','Smash5.png'),(12,'Jo&k.png','Jo&k2.png','Jo&k3.png','Jo&k4.png','Jo&k5.png');
/*!40000 ALTER TABLE `galery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `harga_sewa`
--

DROP TABLE IF EXISTS `harga_sewa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `harga_sewa` (
  `id_lap` int(11) DEFAULT NULL,
  `per_jam` int(11) DEFAULT NULL,
  `paket_member_nama` varchar(255) DEFAULT NULL,
  `paket_member_durasi` varchar(255) DEFAULT NULL,
  `paket_member_harga` int(255) DEFAULT NULL,
  KEY `id_lap` (`id_lap`),
  CONSTRAINT `harga_sewa_ibfk_1` FOREIGN KEY (`id_lap`) REFERENCES `lapangan` (`id_lap`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `harga_sewa`
--

LOCK TABLES `harga_sewa` WRITE;
/*!40000 ALTER TABLE `harga_sewa` DISABLE KEYS */;
INSERT INTO `harga_sewa` VALUES (1,45000,'Paket Member Bulanan','2 jam/Pekan',240000),(2,45000,'Paket Member Bulanan','2 jam/Pekan',240000),(3,60000,'Paket Member Bulanan','3 jam/Pekan',600000),(4,50000,'Paket Member Bulanan','3 jam/Pekan',540000),(5,65000,'Paket Member Bulanan','3 jam/Pekan',720000),(6,60000,'Paket Member Bulanan','3 jam/Pekan',600000),(7,45000,'Paket Member Bulanan','3 jam/Pekan',240000),(8,30000,'Paket Member Bulanan','3 jam/Pekan',200000),(11,60000,'Paket Member Bulanan','3 jam/Pekan',600000),(12,45000,'Paket Member Bulanan','3 jam/Pekan',240000),(13,33000,'Paket Member Bulanan','3 jam/Pekan',150000),(14,60000,'Paket Member Bulanan','3 jam/Pekan',600000);
/*!40000 ALTER TABLE `harga_sewa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lapangan`
--

DROP TABLE IF EXISTS `lapangan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lapangan` (
  `id_lap` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `alamat_id` int(11) DEFAULT NULL,
  `galery_id` int(11) DEFAULT NULL,
  `jam_operasional` varchar(255) DEFAULT NULL,
  `nomor_kontak` varchar(255) DEFAULT NULL,
  `fas_id` int(11) DEFAULT NULL,
  `peringkat` varchar(255) DEFAULT NULL,
  `kebijakan_pembatalan` text DEFAULT NULL,
  PRIMARY KEY (`id_lap`),
  KEY `alamat_id` (`alamat_id`),
  KEY `galery_id` (`galery_id`),
  KEY `fas_id` (`fas_id`),
  CONSTRAINT `lapangan_ibfk_1` FOREIGN KEY (`alamat_id`) REFERENCES `alamat` (`id_alamat`),
  CONSTRAINT `lapangan_ibfk_2` FOREIGN KEY (`galery_id`) REFERENCES `galery` (`id_galery`),
  CONSTRAINT `lapangan_ibfk_3` FOREIGN KEY (`fas_id`) REFERENCES `fasilitas` (`id_fas`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lapangan`
--

LOCK TABLES `lapangan` WRITE;
/*!40000 ALTER TABLE `lapangan` DISABLE KEYS */;
INSERT INTO `lapangan` VALUES (1,'Hidayat Badminton Hall','Terdapat 6 lapangan badminton, nyaman, luas dan bersih, juga parkiran luas',1,1,'Senin-Minggu 07:00 - 23:00','+62 813-4676-9746',1,'8.5/10','Pembatalan reservasi dapat dilakukan hingga 24 jam sebelum jadwal sewa. Jika pembatalan dilakukan kurang dari 24 jam sebelum jadwal sewa, maka akan dikenakan biaya pembatalan sebesar 35% dari harga sewa.'),(2,'Laniang Badminton Hall','Terdapat 6 lapangan badminton, nyaman, luas dan bersih, juga parkiran luas',2,2,'Senin-Minggu 09:00 - 23:00','+62 821-5198-4232',2,'8.7/10','Pembatalan reservasi dapat dilakukan hingga 48 jam sebelum jadwal sewa. Jika pembatalan dilakukan kurang dari 48 jam sebelum jadwal sewa, maka akan dikenakan biaya pembatalan sebesar 25% dari harga sewa.'),(3,'Auditorium Poltekkes Makassar','Terdapat 3 lapangan badminton, nyaman, luas dan bersih, juga parkiran luas',3,3,'Senin-Minggu 08:00 - 23:00','+62 831-3740-9960',3,'8.5/10','Pembatalan reservasi dapat dilakukan hingga 24 jam sebelum jadwal sewa.'),(4,'GOR Anugrah','Terdapat 8 lapangan beton dan 6 lapangan karpet badminton, nyaman, luas dan bersih, juga parkiran luas',4,4,'Senin-Minggu 09:00 - 23:00','+62 877-0045-6641',4,'8.0/10','Pembatalan reservasi dapat dilakukan hingga 48 jam sebelum jadwal sewa.'),(5,'GOR Badminton Pelita','Terdapat 4 lapangan karpet badminton, nyaman, luas dan bersih, juga parkiran luas',5,5,'Senin-Minggu 08:00 - 23:00','+62 813-5592-2241',5,'8.5/10','Pembatalan reservasi dapat dilakukan hingga 24 jam sebelum jadwal sewa.'),(6,'Lapangan Bulutangkis Telkom','Terdapat 4 lapangan badminton, nyaman, luas dan bersih, juga parkiran luas',6,6,'Senin-Minggu 08:00 - 23:00','+62 895-2968-7722',6,'8.0/10','Pembatalan reservasi dapat dilakukan hingga 24 jam sebelum jadwal sewa. Jika pembatalan dilakukan kurang dari 24 jam sebelum jadwal sewa, maka akan dikenakan biaya pembatalan sebesar 10% dari harga sewa.'),(7,'GOR bulutangkis FIK UNM','Terdapat 4 lapangan badminton, nyaman, luas dan bersih, juga parkiran luas',7,7,'Senin-Minggu 08:00 - 23:00','+62 822-4452-5871',7,'8.7/10','Pembatalan reservasi dapat dilakukan hingga 24 jam sebelum jadwal sewa. Jika pembatalan dilakukan kurang dari 24 jam sebelum jadwal sewa, maka akan dikenakan biaya pembatalan sebesar 10% dari harga sewa.'),(8,'The Cage','Terdapat 4 lapangan badminton, nyaman, luas dan bersih, juga parkiran luas',8,8,'Senin-Minggu 10:00 - 23:00','+62 887-4358-74815‬',8,'7.0/10','Pembatalan reservasi dapat dilakukan hingga 24 jam sebelum jadwal sewa.'),(11,'Figa badminton hall','Terdapat 4 lapangan karpet badminton, nyaman, luas dan bersih, juga parkiran luas',9,9,'Senin-Minggu 09:00 - 23:00',' +62 813-4023-7800',9,'8.0/10','Pembatalan reservasi dapat dilakukan hingga 24 jam sebelum jadwal sewa.'),(12,'Gor Padaidi','Terdapat 1 lapangan badminton yang nyaman',10,10,'Senin-Minggu 07:00 - 23:00','+62 852-9972-2678',10,'7.0/10','Pembatalan reservasi dapat dilakukan hingga 24 jam sebelum jadwal sewa.'),(13,'Smash Badminton Court','Terdapat 3 lapangan badminton, nyaman, luas dan bersih, juga parkiran luas',11,11,'Senin-Minggu 07:00 - 23:00','+62 853-3936-9990',11,'9.7/10','Pembatalan reservasi dapat dilakukan hingga 24 jam sebelum jadwal sewa. Jika pembatalan dilakukan kurang dari 24 jam sebelum jadwal sewa, maka akan dikenakan biaya pembatalan sebesar 35% dari harga sewa.'),(14,'Jo & K Badminton','Terdapat 5 lapangan badminton, nyaman, luas dan bersih, juga parkiran luas',12,12,'Senin-Minggu 07:00 - 23:00','+62 813 4234 6389',12,'9.0/10','Pembatalan reservasi dapat dilakukan hingga 24 jam sebelum jadwal sewa. Jika pembatalan dilakukan kurang dari 24 jam sebelum jadwal sewa, maka akan dikenakan biaya pembatalan sebesar 35% dari harga sewa.');
/*!40000 ALTER TABLE `lapangan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ulasan`
--

DROP TABLE IF EXISTS `ulasan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ulasan` (
  `id_lap` int(11) DEFAULT NULL,
  `nama_orang` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `teks_ulasan` text DEFAULT NULL,
  KEY `id_lap` (`id_lap`),
  CONSTRAINT `ulasan_ibfk_1` FOREIGN KEY (`id_lap`) REFERENCES `lapangan` (`id_lap`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ulasan`
--

LOCK TABLES `ulasan` WRITE;
/*!40000 ALTER TABLE `ulasan` DISABLE KEYS */;
INSERT INTO `ulasan` VALUES (1,'Yusdar','yusdar.jpg','Saya sangat senang bermain di Hidayat Badminton Hall. Lapangan-lapangannya sangat nyaman dan bersih. Fasilitas parkiran yang luas juga sangat membantu. Sangat direkomendasikan!'),(1,'Zaedil','zaedil.jpg','Tempat yang luar biasa untuk bermain bulu tangkis. Stafnya sangat ramah dan lapangan selalu dalam kondisi baik. Saya sering menggunakan paket member bulanan, sangat terjangkau dan hemat!'),(2,'Rafly','rafly','Laniang Badminton Hall adalah tempat terbaik untuk bermain bulu tangkis di Makassar. Lapangannya sangat bagus dan fasilitasnya lengkap. Saya sering mengikuti turnamen di sini dan selalu mendapatkan pengalaman yang menyenangkan!'),(2,'Rifqi','rifqi.jpg','Laniang Badminton Hall memiliki suasana yang ramah dan staf yang sangat membantu. Lapangannya selalu dalam kondisi prima dan parkirannya sangat luas. Saya senang bermain di sini bersama teman-teman!'),(3,'Aisyah Amalia ','Aisyah.png','Sukaak main disini. Lapangannya bersih'),(3,'Syamsurya ','Syamsurya.png','Tempatnya sangat nyaman, pelayanannya juga baik”'),(4,'Muhammad Al-Qadri ','Qadri.png','Tempat ini cocok bagi kalian yang suka main bulutangkis (badminton), tempat ini keren nyaman, pelayanan yang ramah. Tersedia pula warung kecil untuk beli minuman dan makanan apabila kita haus setelah bermain, dan ada juga suttlecock (bulu) dijual di tempat ini.'),(4,'Achmad Thoriq ','Thoriq.png','Banyak lapangan tersedia untuk para penggemar olahraga badminton, ada lapangan karpet dan lapangan lantai.. sirkulasi udara yg kecil membuat kita gerah di dalam lapangan.'),(5,'Peby Syntiana ','Peby.png','4 lapangan bulutangkis. Parkiran luas jd bs bw mobil, yah walau jalan masuk ke gor ini sedikit sempit. Kalau kesini bawa air minum yah, coz disini jarang warung bapak bapakx buka.'),(5,'Arsyad Al Fatih ','Fatih.png','Tempat bermain yang harga relatif murah dan lapangan yang bagus, pencahayaan yang bagus, pelayanan yang ramah dan bola merek Vero nya mantap'),(6,'Ahmad Dzaky ','Dzaky.png','Arena sport yg minimalis untuk badminton dan futsal yg berdekatan, mudah dijangkau dan parkiran yg tersedia.'),(6,'Nurfadilah','Dila.png','Saya sangat senang bermain di Lapangan Bulutangkis Telkom. Lapangan-lapangannya sangat nyaman dan bersih. Fasilitas parkiran yang luas juga sangat membantu. Sangat direkomendasikan!'),(7,'Syamsuddin','Syamsuddin.png','Lapangan yang sangat bagus... Recommended banget buat bapak2 Dan mahasiswa untuk berolahraga di sini'),(7,'Irsan Abdullah','Irsan.png','Tempat yang bagus untuk bermain badminton, karpetnya bagus, hanya saja tidak ada tempat jualan minuman dsb. Jadi harus bawa sendiri'),(8,'Sudarman','Sudarman.png','Memang ada harga ada kualitas, tp tempatnya terlalu panas untuk bermain. Terlebih ini penjaganya membiarkan temannya merokok di daerah yg dimana larangan rokok terpampang jelas'),(8,'Imam Mujahidin ','Imam.png','Ok kok tempatnya Ada 4 lapangan... Walopun agak agak kecil sih tiap lapangan dan sedikit merapat dinding... Kalo gak perkiraan bisa nabrak dinding..'),(11,'Syamsul Ma’rif','Ma’rif.png','Tempatnya lumayan nyaman, gak terlalu bising soalnya cuman tersedia 2 lapangan saja, tempat parkir luas juga'),(11,'Zulkifli','Zulkifli.png','Keren sih, lapangan cuma 2, toiletnya bersih, ada mini musholahnya dan alat sholatnya juga bersih, tapi sayang lapangannya g dibersihin sebelum pengguna selanjutnya, tapi tetap keren sih'),(12,'Ailen Nababan ','Ailen.png','Mantap, tapi sayang pencahayaan nya kurang bagus. terlalu menyilaukan'),(12,'Mikayla Putri ','Mikayla.png','Cukup bagus dan nyaman main dengan penerangan yang cukup'),(13,'Muhammad Jaya ','Jaya.png','Lapangannya kerennn, menggunakan karpet tapi harganya MURAH BANGET!!'),(13,'Aldi Rahardian','Aldi.png','Saya suka ini lapangan badminton murmer dan pas buat olahraga. ada tempat duduk2nya dan WC nya bersih terus. Mantap! '),(14,'Indah Khaerunnisa ','Indah.png','Lumayan baik aman dan bersih'),(14,'Ahmad Adriansyah ','Ardi.png','Karpet lapangannya baguss');
/*!40000 ALTER TABLE `ulasan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `key_token` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Fauzan','12345','0a61f75d8853f8195de675a1633315be'),(3,'Rafly','09876','1edeefc0c5dd22b34382ab12cc94b86f'),(4,'Rifqi','321','6359f05fcafcd6ca3218b5b2c5b8f691'),(5,'Wulan','09876','b816d6b75c7d6892d07e74a2e1dd8b98'),(8,'Zaedil','zaedil','56e4d2c065a858f6109dfacef10d37a1');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-20 13:55:32

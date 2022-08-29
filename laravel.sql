-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.13-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table laravel.customers
DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('1','2') NOT NULL,
  `division_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `thana_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `status` enum('1','0') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `division_id` (`division_id`),
  KEY `district_id` (`district_id`),
  KEY `thana_id` (`thana_id`),
  CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`),
  CONSTRAINT `customers_ibfk_2` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`),
  CONSTRAINT `customers_ibfk_3` FOREIGN KEY (`thana_id`) REFERENCES `thanas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table laravel.customers: ~20 rows (approximately)
DELETE FROM `customers`;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` (`id`, `fname`, `lname`, `username`, `password`, `gender`, `division_id`, `district_id`, `thana_id`, `address`, `status`, `created_at`, `updated_at`, `image`) VALUES
	(1, 'Shahadat', 'Jahan', 'shahadat.jahan', 'abc123', '1', 3, 1, 3, 'Nikunja-2', '1', NULL, '2022-06-27 06:04:43', 'Customer1655033648.png'),
	(2, 'Arpita', 'Siddiquee', 'arpita.siddiquee', '81dc9bdb52d04dc20036dbd8313ed055', '2', 3, 1, 9, 'Mirpur DOHS', '1', NULL, '2022-06-26 12:04:00', 'Customer1655033669.jpg'),
	(5, 'Moshiur', 'Rahman', 'moshiur.rahman', 'd41d8cd98f00b204e9800998ecf8427e', '1', 1, 5, 5, 'Barishal', '1', NULL, '2022-06-27 06:11:28', 'Customer1655035143.jpg'),
	(6, 'Mr.', 'Ayon', 'mr.ayon', '81dc9bdb52d04dc20036dbd8313ed055', '1', 6, 9, 28, 'Nikunja-2', '1', NULL, '2022-06-15 06:38:34', 'Customer1655035154.jpg'),
	(7, 'Shusmita', 'Siddiquee', 'shusmita.siddiquee', '81dc9bdb52d04dc20036dbd8313ed055', '2', 4, 7, 24, 'Sador', '1', NULL, '2022-06-12 11:59:22', 'Customer1655035162.jpg'),
	(30, 'Fahmidul', 'Ayon', 'f.ayon', '81dc9bdb52d04dc20036dbd8313ed055', '1', 3, 1, 3, 'Nikunja-2', '1', NULL, NULL, ''),
	(33, 'Mazidul', 'Emon', 'mazidulemon', '81dc9bdb52d04dc20036dbd8313ed055', '1', 3, 2, 1, 'shimultoli', '0', NULL, NULL, ''),
	(35, 'Sarker', 'Fahad', 'sarker.fahad', '81dc9bdb52d04dc20036dbd8313ed055', '1', 3, 2, 1, 'Bagolbari', '1', NULL, NULL, ''),
	(36, 'Ashek', 'Billah', 'ashek.billah', '81dc9bdb52d04dc20036dbd8313ed055', '1', 7, 11, 34, 'Sador', '0', NULL, NULL, ''),
	(37, 'Mrs', 'Suborna', 'mrs.suborna', '81dc9bdb52d04dc20036dbd8313ed055', '2', 3, 2, 1, 'Joydevpur', '1', NULL, NULL, ''),
	(38, 'Nusrat', 'Jahan', 'nusrat.jahan', '81dc9bdb52d04dc20036dbd8313ed055', '2', 4, 7, 25, 'xxxxxx', '0', NULL, '2022-07-17 12:42:14', 'Customer1655115615.jpg'),
	(64, 'Mr.', 'Mesbah', 'mr.mesbah', '$2y$10$8tYSrdAgG74Pk7bCVuHOL.VueALU27YMcglunDzvKd02sBlCY9/LW', '1', 3, 2, 2, 'Torgao', '0', NULL, NULL, ''),
	(68, 'Rifadul', 'Hasan', 'rifadhasan', '$2y$10$oJrzwos/sYrvXPsbbdy3QO5BL6w37x.x6MFGFYfMnLfywFm.VSUde', '1', 3, 1, 9, 'Mirpur-2', '1', '2022-06-09 12:13:17', '2022-06-12 12:50:55', 'Customer1655038255.jpg'),
	(69, 'Mrs', 'Moon', 'mrsmoon', '$2y$10$KaQWm2U96y8DtBfu0Ok0RO5D5CJ.Yu9rMkxDgY5C0XTtPK0v4N3R6', '2', 3, 1, 9, 'Mirpur-12', '0', '2022-06-09 12:15:52', '2022-06-12 11:58:42', 'Customer1655035122.jpg'),
	(74, 'Mr.', 'Sadrul', 'mr.sadrul', '$2y$10$u7AC4QQYjg2W3OHUhIIAh.B/pzoxpKZi0Ccq.gvk.Mqsr3my0ohSG', '1', 1, 5, 6, 'Bakergonj', '1', '2022-06-13 10:23:14', '2022-06-13 10:23:14', 'Customer1655115794.jpg'),
	(75, 'Shahadat', 'Jahan', 'shahadat.jahan', 'abc123', '', 3, 1, 3, 'Nikunja-2', '0', NULL, '2022-07-17 12:41:28', 'Customer1655033648.png'),
	(77, 'Shanewaj', 'Sanu', 'shanewaj.sanu', '$2y$10$/4.csLE2acDfir5g4o5vTuZmPZYEQPWVKCqzdWuH2GZMyxVMLSGS2', '1', 2, 18, 37, 'Devgram', '0', '2022-06-16 10:07:59', '2022-06-16 10:17:22', 'Customer1655374078.jpg'),
	(78, 'himel', 'hasan', 'himelhasan', '$2y$10$qq4xnjyW/CQsyoekvyyqyu93yzIyR1TzX7xyFJE.lci8E2JR7XYi2', '1', 2, 4, 13, 'debidwar', '1', '2022-06-20 05:53:46', '2022-06-20 05:53:46', 'Customer1655704426.jpg'),
	(79, 'Md.', 'Hanif', 'md.hanif', '$2y$10$ceJb8irDOTZ7s/YbZy9.mO31y2PZ57s8PY.HESJr2PD/zyBAHkWTG', '1', 2, 18, 37, 'Devgram', '0', '2022-06-27 06:21:43', '2022-06-27 06:21:43', 'Customer1656310903.jpg'),
	(80, 'Nazim', 'Rashid', 'nazim.rashid', '$2y$10$ROiLeksYmfzs4SU9LtrQh.GZCinueqx/njOQZESjZ8ZWZKEibT.uq', '1', 2, 18, 37, 'Devgram', '1', '2022-06-27 09:27:26', '2022-06-27 09:27:26', 'Customer1656322046.jpg'),
	(84, 'Shafiqul', 'Islam', 'shafiqul.islam', '$2y$10$xyzmmLPz3nlb7QQCJWhkAOLZ04V4aiFEbmeOBhYGaN5ehBs2UB9oS', '1', 4, 7, 25, 'Morolgonj', '0', '2022-07-18 05:33:29', '2022-07-18 05:33:29', '');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

-- Dumping structure for table laravel.districts
DROP TABLE IF EXISTS `districts`;
CREATE TABLE IF NOT EXISTS `districts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `division_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `division_id` (`division_id`),
  CONSTRAINT `districts_ibfk_1` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table laravel.districts: ~16 rows (approximately)
DELETE FROM `districts`;
/*!40000 ALTER TABLE `districts` DISABLE KEYS */;
INSERT INTO `districts` (`id`, `division_id`, `name`) VALUES
	(1, 3, 'Dhaka'),
	(2, 3, 'Gazipur'),
	(3, 2, 'Chittagong'),
	(4, 2, 'Comilla'),
	(5, 1, 'Barisal'),
	(6, 1, 'Bhola'),
	(7, 4, 'Khulna'),
	(8, 4, 'Kushtia'),
	(9, 6, 'Rajshahi'),
	(10, 6, 'Pabna'),
	(11, 7, 'Rangpur'),
	(12, 7, 'Dinajpur'),
	(13, 8, 'Sylhet'),
	(14, 8, 'Moulvibazar'),
	(15, 5, 'Mymensingh'),
	(16, 5, 'Sherpur'),
	(18, 2, 'B.baria'),
	(19, 2, 'Feni');
/*!40000 ALTER TABLE `districts` ENABLE KEYS */;

-- Dumping structure for table laravel.divisions
DROP TABLE IF EXISTS `divisions`;
CREATE TABLE IF NOT EXISTS `divisions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table laravel.divisions: ~9 rows (approximately)
DELETE FROM `divisions`;
/*!40000 ALTER TABLE `divisions` DISABLE KEYS */;
INSERT INTO `divisions` (`id`, `name`) VALUES
	(1, 'Barisal'),
	(2, 'Chittagong'),
	(3, 'Dhaka'),
	(4, 'Khulna'),
	(5, 'Mymensingh'),
	(6, 'Rajshahi'),
	(7, 'Rangpur'),
	(8, 'Sylhet');
/*!40000 ALTER TABLE `divisions` ENABLE KEYS */;

-- Dumping structure for table laravel.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table laravel.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.migrations: ~2 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table laravel.orders
DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_no` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table laravel.orders: ~4 rows (approximately)
DELETE FROM `orders`;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `order_no`, `customer_id`, `created_at`, `updated_at`) VALUES
	(1, 'abc123', 1, '2022-06-20 10:20:14', '2022-06-20 10:20:14'),
	(3, 'abc123456', 5, '2022-06-21 05:12:36', '2022-06-21 05:12:36'),
	(8, 'order123', 68, '2022-06-27 10:34:22', '2022-06-27 10:34:22'),
	(9, 'order789', 1, '2022-06-29 06:11:56', '2022-06-29 06:11:56');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table laravel.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table laravel.products
DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `des` text NOT NULL,
  `status` enum('1','0') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table laravel.products: ~4 rows (approximately)
DELETE FROM `products`;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `code`, `des`, `status`) VALUES
	(1, 'A', 'a123', 'A des', '0'),
	(2, 'B', 'b123', 'B des', '1'),
	(3, 'C', 'c123', 'Cdes', '0'),
	(4, 'D', 'd123', 'D des', '1'),
	(5, 'E', 'e123', 'E des', '1'),
	(6, 'F', 'f123', 'F des', '1');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table laravel.product_purchases
DROP TABLE IF EXISTS `product_purchases`;
CREATE TABLE IF NOT EXISTS `product_purchases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `product_purchases_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  CONSTRAINT `product_purchases_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table laravel.product_purchases: ~9 rows (approximately)
DELETE FROM `product_purchases`;
/*!40000 ALTER TABLE `product_purchases` DISABLE KEYS */;
INSERT INTO `product_purchases` (`id`, `order_id`, `product_id`, `qty`) VALUES
	(1, 1, 1, 3.00),
	(4, 3, 4, 1.00),
	(5, 3, 2, 2.00),
	(6, 3, 6, 3.00),
	(10, 8, 1, 1.00),
	(11, 8, 2, 5.00),
	(12, 8, 4, 2.00),
	(13, 9, 4, 3.00),
	(14, 9, 6, 5.00);
/*!40000 ALTER TABLE `product_purchases` ENABLE KEYS */;

-- Dumping structure for table laravel.thanas
DROP TABLE IF EXISTS `thanas`;
CREATE TABLE IF NOT EXISTS `thanas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `district_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `district_id` (`district_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table laravel.thanas: ~26 rows (approximately)
DELETE FROM `thanas`;
/*!40000 ALTER TABLE `thanas` DISABLE KEYS */;
INSERT INTO `thanas` (`id`, `district_id`, `name`) VALUES
	(1, 2, 'Gazipur sador'),
	(2, 2, 'Kapasia'),
	(3, 1, 'Khilkhet'),
	(4, 1, 'Airport'),
	(5, 5, 'Barisal sador'),
	(6, 5, 'Babugonj'),
	(7, 15, 'Muktagacha'),
	(8, 15, 'Trishal'),
	(9, 1, 'Mirpur'),
	(10, 3, 'Agrabad'),
	(11, 3, 'Pahartoli'),
	(12, 4, 'Comilla sador'),
	(13, 4, 'Comilla cantonment'),
	(14, 6, 'Bhola sador'),
	(15, 6, 'Chorfusion'),
	(24, 7, 'Khulna sador'),
	(25, 7, 'Rupsha'),
	(26, 8, 'Poradah'),
	(27, 8, 'Veramara'),
	(28, 9, 'Rajshahi sador'),
	(29, 9, 'Baghmara'),
	(30, 10, 'Pabna Sador'),
	(31, 11, 'Pirganj'),
	(32, 14, 'Kulaura'),
	(33, 12, 'Dinajpur Sador'),
	(34, 11, 'Rangpur Sador'),
	(36, 13, 'Sylhet Sador'),
	(37, 18, 'Akhaura'),
	(38, 18, 'Kashba');
/*!40000 ALTER TABLE `thanas` ENABLE KEYS */;

-- Dumping structure for table laravel.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravel.users: ~0 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Jahan', 'shahadat.jahan@gmail.com', NULL, '$2y$10$Eig./s1/tYXZ19r6gHEXKOGQGAx276F4SHOxr53EqNVXfw4ZN5Q0u', NULL, '2022-06-06 03:32:11', '2022-06-06 03:32:11');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2022 at 07:26 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
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
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fname`, `lname`, `username`, `password`, `gender`, `division_id`, `district_id`, `thana_id`, `address`, `status`, `created_at`, `updated_at`, `image`) VALUES
(1, 'Shahadat', 'Jahan', 'shahadat.jahan', 'abc123', '1', 3, 1, 3, 'Nikunja-2', '1', NULL, '2022-06-27 00:04:43', 'Customer1655033648.png'),
(2, 'Arpita', 'Siddiquee', 'arpita.siddiquee', '81dc9bdb52d04dc20036dbd8313ed055', '2', 3, 1, 9, 'Mirpur DOHS', '1', NULL, '2022-06-26 06:04:00', 'Customer1655033669.jpg'),
(5, 'Moshiur', 'Rahman', 'moshiur.rahman', 'd41d8cd98f00b204e9800998ecf8427e', '1', 1, 5, 5, 'Barishal', '1', NULL, '2022-06-27 00:11:28', 'Customer1655035143.jpg'),
(6, 'Mr.', 'Ayon', 'mr.ayon', '81dc9bdb52d04dc20036dbd8313ed055', '1', 6, 9, 28, 'Nikunja-2', '1', NULL, '2022-06-15 00:38:34', 'Customer1655035154.jpg'),
(7, 'Shusmita', 'Siddiquee', 'shusmita.siddiquee', '81dc9bdb52d04dc20036dbd8313ed055', '2', 4, 7, 24, 'Sador', '1', NULL, '2022-06-12 05:59:22', 'Customer1655035162.jpg'),
(30, 'Fahmidul', 'Ayon', 'f.ayon', '81dc9bdb52d04dc20036dbd8313ed055', '1', 3, 1, 3, 'Nikunja-2', '1', NULL, NULL, ''),
(33, 'Mazidul', 'Emon', 'mazidulemon', '81dc9bdb52d04dc20036dbd8313ed055', '1', 3, 2, 1, 'shimultoli', '0', NULL, NULL, ''),
(35, 'Sarker', 'Fahad', 'sarker.fahad', '81dc9bdb52d04dc20036dbd8313ed055', '1', 3, 2, 1, 'Bagolbari', '1', NULL, NULL, ''),
(36, 'Ashek', 'Billah', 'ashek.billah', '81dc9bdb52d04dc20036dbd8313ed055', '1', 7, 11, 34, 'Sador', '0', NULL, NULL, ''),
(37, 'Mrs', 'Suborna', 'mrs.suborna', '81dc9bdb52d04dc20036dbd8313ed055', '2', 3, 2, 1, 'Joydevpur', '1', NULL, NULL, ''),
(38, 'Nusrat', 'Jahan', 'nusrat.jahan', '81dc9bdb52d04dc20036dbd8313ed055', '2', 4, 7, 25, 'xxxxxx', '1', NULL, '2022-06-13 04:20:15', 'Customer1655115615.jpg'),
(64, 'Mr.', 'Mesbah', 'mr.mesbah', '$2y$10$8tYSrdAgG74Pk7bCVuHOL.VueALU27YMcglunDzvKd02sBlCY9/LW', '1', 3, 2, 2, 'Torgao', '0', NULL, NULL, ''),
(68, 'Rifadul', 'Hasan', 'rifadhasan', '$2y$10$oJrzwos/sYrvXPsbbdy3QO5BL6w37x.x6MFGFYfMnLfywFm.VSUde', '1', 3, 1, 9, 'Mirpur-2', '1', '2022-06-09 06:13:17', '2022-06-12 06:50:55', 'Customer1655038255.jpg'),
(69, 'Mrs', 'Moon', 'mrsmoon', '$2y$10$KaQWm2U96y8DtBfu0Ok0RO5D5CJ.Yu9rMkxDgY5C0XTtPK0v4N3R6', '2', 3, 1, 9, 'Mirpur-12', '0', '2022-06-09 06:15:52', '2022-06-12 05:58:42', 'Customer1655035122.jpg'),
(74, 'Mr.', 'Sadrul', 'mr.sadrul', '$2y$10$u7AC4QQYjg2W3OHUhIIAh.B/pzoxpKZi0Ccq.gvk.Mqsr3my0ohSG', '1', 1, 5, 6, 'Bakergonj', '1', '2022-06-13 04:23:14', '2022-06-13 04:23:14', 'Customer1655115794.jpg'),
(75, 'Shahadat', 'Jahan', 'shahadat.jahan', 'abc123', '', 3, 1, 3, 'Nikunja-2', '1', NULL, NULL, 'Customer1655033648.png'),
(77, 'Shanewaj', 'Sanu', 'shanewaj.sanu', '$2y$10$/4.csLE2acDfir5g4o5vTuZmPZYEQPWVKCqzdWuH2GZMyxVMLSGS2', '1', 2, 18, 37, 'Devgram', '0', '2022-06-16 04:07:59', '2022-06-16 04:17:22', 'Customer1655374078.jpg'),
(78, 'himel', 'hasan', 'himelhasan', '$2y$10$qq4xnjyW/CQsyoekvyyqyu93yzIyR1TzX7xyFJE.lci8E2JR7XYi2', '1', 2, 4, 13, 'debidwar', '1', '2022-06-19 23:53:46', '2022-06-19 23:53:46', 'Customer1655704426.jpg'),
(79, 'Md.', 'Hanif', 'md.hanif', '$2y$10$ceJb8irDOTZ7s/YbZy9.mO31y2PZ57s8PY.HESJr2PD/zyBAHkWTG', '1', 2, 18, 37, 'Devgram', '0', '2022-06-27 00:21:43', '2022-06-27 00:21:43', 'Customer1656310903.jpg'),
(80, 'Nazim', 'Rashid', 'nazim.rashid', '$2y$10$ROiLeksYmfzs4SU9LtrQh.GZCinueqx/njOQZESjZ8ZWZKEibT.uq', '1', 2, 18, 37, 'Devgram', '1', '2022-06-27 03:27:26', '2022-06-27 03:27:26', 'Customer1656322046.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `division_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `districts`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`) VALUES
(1, 'Barisal'),
(2, 'Chittagong'),
(3, 'Dhaka'),
(4, 'Khulna'),
(5, 'Mymensingh'),
(6, 'Rajshahi'),
(7, 'Rangpur'),
(8, 'Sylhet');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_no`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, 'abc123', 1, '2022-06-20 04:20:14', '2022-06-20 04:20:14'),
(2, 'xyz789', 2, '2022-06-20 05:01:35', '2022-06-20 05:01:35'),
(3, 'abc123456', 5, '2022-06-20 23:12:36', '2022-06-20 23:12:36'),
(8, 'order123', 68, '2022-06-27 04:34:22', '2022-06-27 04:34:22');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `des` text NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `des`, `status`) VALUES
(1, 'A', 'a123', 'A des', '1'),
(2, 'B', 'b123', 'B des', '1'),
(3, 'C', 'c123', 'Cdes', '0'),
(4, 'D', 'd123', 'D des', '1'),
(5, 'E', 'e123', 'E des', '0'),
(6, 'F', 'f123', 'F des', '1');

-- --------------------------------------------------------

--
-- Table structure for table `product_purchases`
--

CREATE TABLE `product_purchases` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_purchases`
--

INSERT INTO `product_purchases` (`id`, `order_id`, `product_id`, `qty`) VALUES
(1, 1, 1, '3.00'),
(4, 3, 4, '1.00'),
(5, 3, 2, '2.00'),
(6, 3, 6, '3.00'),
(10, 8, 1, '1.00'),
(11, 8, 2, '5.00'),
(12, 8, 4, '2.00');

-- --------------------------------------------------------

--
-- Table structure for table `thanas`
--

CREATE TABLE `thanas` (
  `id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thanas`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jahan', 'shahadat.jahan@gmail.com', NULL, '$2y$10$Eig./s1/tYXZ19r6gHEXKOGQGAx276F4SHOxr53EqNVXfw4ZN5Q0u', NULL, '2022-06-05 21:32:11', '2022-06-05 21:32:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `division_id` (`division_id`),
  ADD KEY `district_id` (`district_id`),
  ADD KEY `thana_id` (`thana_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `division_id` (`division_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_purchases`
--
ALTER TABLE `product_purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `thanas`
--
ALTER TABLE `thanas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `district_id` (`district_id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_purchases`
--
ALTER TABLE `product_purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `thanas`
--
ALTER TABLE `thanas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`),
  ADD CONSTRAINT `customers_ibfk_2` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`),
  ADD CONSTRAINT `customers_ibfk_3` FOREIGN KEY (`thana_id`) REFERENCES `thanas` (`id`);

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_ibfk_1` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `product_purchases`
--
ALTER TABLE `product_purchases`
  ADD CONSTRAINT `product_purchases_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `product_purchases_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

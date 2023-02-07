-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2023 at 12:39 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(30) NOT NULL,
  `client_ip` varchar(20) NOT NULL,
  `user_id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `qty` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `client_ip`, `user_id`, `product_id`, `qty`) VALUES
(39, '', 1, 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_list`
--

INSERT INTO `category_list` (`id`, `name`) VALUES
(1, 'Crabs'),
(2, 'Shells | Scallops'),
(3, 'Shrimp');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `mobile` text NOT NULL,
  `email` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `address`, `mobile`, `email`, `status`, `order_date`) VALUES
(1, 'jade ducay', 'bunakan', '0966145499', 'jadeducay15@gmail.com', 5, '2023-01-02 15:12:04'),
(2, 'jade ducay', 'bunakan', '0966145499', 'jadeducay15@gmail.com', 5, '2022-12-12 15:15:58'),
(3, 'jade ducay', 'bunakan', '0966145499', 'jadeducay15@gmail.com', 5, '2022-12-12 15:18:03'),
(4, 'jade ducay', 'bunakan', '0966145499', 'jadeducay15@gmail.com', 5, '2022-12-14 13:04:29'),
(5, 'Angel Sayson', 'Mancilang', '0916372833', 'angel12@gmail.com', 4, '2022-12-14 13:51:14'),
(6, 'Angel Sayson', 'Mancilang', '0916372833', 'angel12@gmail.com', 2, '2022-12-14 13:51:29'),
(7, 'Laurel Carallas', 'Bunakan', '0937528192', 'laurel12@gmail.com', 4, '2022-12-14 13:53:00'),
(8, 'Laurel Carallas', 'Bunakan', '0937528192', 'laurel12@gmail.com', 2, '2022-12-14 13:53:26'),
(9, 'Stephen Alolor', 'mancilang', '0936278193', 'stephen123@gmail.com', 5, '2022-12-14 13:55:51'),
(10, 'Jestoni Villaceran', 'Poblacion', '0928719273', 'jestoni12@gmail.com', 5, '2022-12-14 13:58:34'),
(11, 'Chloe Valdez', 'San Agustin', '0917354098', 'valdez123@gmail.com', 5, '2022-12-14 14:04:47'),
(12, 'Anabelle Maru', 'Kaongkod', '0915264782', 'maru12@gmail.com', 5, '2022-12-14 14:07:10'),
(13, 'Gabriel Fernandez', 'Kodia', '0912375142', 'gabriel12@gmail.com', 5, '2022-12-14 14:11:03'),
(14, 'Alvin Moradas', 'Atop-Atop', '0937281223', 'alvin12@gmail.com', 3, '2022-12-14 14:12:27'),
(15, 'Peter layam', 'Sta fe', '0912372912', 'peter123@gmail.com', 3, '2022-12-14 14:14:03'),
(16, 'Jonel Destura', 'Atop-atop', '0912396162', 'jonel12@gmail.com', 3, '2022-12-14 14:15:56'),
(17, 'Carlo Fulmenar', 'Sillon', '0912873629', 'carlo123@gmail.com', 3, '2022-12-14 14:17:20'),
(18, 'Brex Umbao', 'Bunakan', '0917256309', 'brexumbao12@gmail.com', 3, '2022-12-14 14:19:06'),
(19, 'jhonlie Bayon-on', 'Sillon', '0912352309', 'jhonlie12@gmail.com', 1, '2022-12-14 14:21:09'),
(20, 'Morito Sarzuelo', 'Kodia', '0916243981', 'morito123@gmail.com', 1, '2022-12-14 14:22:44'),
(21, 'Roque Zapa', 'San Agustin', '0912351290', 'roque123@gmail.com', 1, '2022-12-14 14:25:22'),
(22, 'Mark Jhon Destacamento', 'Sulangan', '0912381290', 'mark123@gmail.com', 1, '2022-12-14 14:27:38'),
(26, 'jade ducay', 'bunakan', '0966145499', 'jadeducay15@gmail.com', 5, '2022-12-14 14:41:58'),
(27, 'jade ducay', 'bunakan', '0966145499', 'jadeducay15@gmail.com', 2, '2022-12-14 14:43:46'),
(28, 'jade ducay', 'bunakan', '0966145499', 'jadeducay15@gmail.com', 2, '2022-12-14 14:44:03'),
(29, 'jade ducay', 'bunakan', '0966145499', 'jadeducay15@gmail.com', 0, '2022-12-14 14:44:19'),
(30, 'jade ducay', 'bunakan', '0966145499', 'jadeducay15@gmail.com', 0, '2022-12-14 14:44:36'),
(31, 'jade ducay', 'bunakan', '0966145499', 'jadeducay15@gmail.com', 0, '2022-12-14 14:44:55'),
(32, 'jade ducay', 'bunakan', '0966145499', 'jadeducay15@gmail.com', 0, '2022-12-15 01:50:39'),
(33, 'jade ducay', 'bunakan', '0966145499', 'jadeducay15@gmail.com', 5, '2023-12-15 01:51:00'),
(34, 'jade ducay', 'bunakan', '0966145499', 'jadeducay15@gmail.com', 5, '2023-02-15 01:51:24'),
(35, 'jade ducay', 'bunakan', '0966145499', 'jadeducay15@gmail.com', 5, '2023-01-15 14:27:56');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `id` int(30) NOT NULL,
  `user_id` int(50) NOT NULL,
  `order_id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `qty` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`id`, `user_id`, `order_id`, `product_id`, `qty`) VALUES
(1, 1, 1, 11, 7),
(2, 1, 2, 9, 1),
(3, 1, 3, 9, 1),
(4, 1, 4, 11, 1),
(5, 2, 5, 12, 2),
(6, 2, 6, 30, 1),
(7, 3, 7, 28, 3),
(8, 3, 8, 30, 1),
(9, 4, 9, 26, 5),
(10, 5, 10, 20, 4),
(11, 6, 11, 9, 5),
(12, 7, 12, 22, 6),
(13, 8, 13, 26, 10),
(14, 9, 14, 29, 15),
(15, 10, 15, 30, 30),
(16, 11, 16, 22, 50),
(17, 12, 17, 31, 10),
(18, 13, 18, 9, 10),
(19, 14, 19, 4, 10),
(20, 15, 20, 23, 100),
(21, 16, 21, 9, 123),
(22, 17, 22, 8, 113),
(23, 18, 23, 26, 100),
(24, 19, 24, 10, 2),
(25, 20, 25, 4, 6),
(26, 1, 26, 31, 80),
(27, 1, 26, 9, 28),
(28, 1, 27, 23, 1),
(29, 1, 27, 31, 1),
(30, 1, 28, 23, 10),
(31, 1, 29, 28, 4),
(32, 1, 30, 23, 10),
(33, 1, 31, 10, 70),
(34, 1, 32, 10, 70),
(35, 1, 33, 22, 8),
(36, 1, 34, 1, 8),
(37, 1, 35, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `id` int(30) NOT NULL,
  `category_id` varchar(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL DEFAULT 0,
  `img_path` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0= unavailable, 2 Available',
  `stocks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`id`, `category_id`, `name`, `description`, `price`, `img_path`, `status`, `stocks`) VALUES
(1, 'Crab', 'Crabs | Small', 'Fresh crab | Alimasag\r\n\r\nper kl.', 200, '1668145980_crab small.jpg', 0, 48),
(2, 'Crab', 'Crabs | Medium', 'Fresh crab | Alimasag\r\nper kl', 430, '1668146100_crab medium.jpeg', 0, 82),
(3, 'Crab', 'Crabs | Large', 'Fresh crab | Alimasag\r\nper kl', 560, '1668146160_crab large.jfif', 0, 88),
(4, 'Crab', 'Crab Meat | White', 'Fresh crab meat\r\nper kl.', 123, '1668146520_crab white.jpg', 0, 38),
(5, 'Crab', 'Crab Meat | Red', 'Fresh crab meat\r\nper kl.', 213, '1668146580_crab red.jpg', 0, 0),
(6, 'Shells | Scallop', 'Scallops Meat', 'Fresh scallop meat\r\nper kl.', 321, '1668146640_scallpo meat.jfif', 0, 0),
(7, 'Shells | Scallop', 'Whole Shell', 'Fresh whole shell | Takab\r\nper kl.', 36, '1668146760_fresh whole shell.jpg', 0, 224),
(8, 'Shells | Scallop', 'Ready to Bake Scallop', 'Fresh half shell scallop\r\nper kl.', 69, '1668153420_ready to bake scallpos.jpg', 0, 7),
(9, 'Shrimp', 'Shrimp | Small', 'Fresh shrimp | Pasayan\r\nper kl.', 230, '1668146880_small shrimp.jfif', 0, 672),
(10, 'Shrimp', 'Shrimp | Medium', 'Fresh shrimp | Pasayan\r\nper kl.', 432, '1668146940_medium shrimp.jfif', 0, 270),
(11, 'Shrimp', 'Shrimp | Large', 'Fresh shrimp | Pasayan\r\nper kl.', 213, '1668147060_shrimp large.jfif', 0, -9),
(12, 'Shrimp', 'Shrimp | XL', 'Fresh shrimp | Pasayan\r\nper kl.', 432, '1668147120_xl shrimp.jfif', 0, 184),
(20, 'Crab', 'Mud Crab | Small', 'Fresh mud crab | Alimango per kl.', 120, '1670994720_small1.jpg', 0, 192),
(21, 'Crab', 'Mud Crab | Medium', 'Fresh mud crab | Alimango per kl.', 130, '1670994840_medium.jpg', 0, 200),
(22, 'Crab', 'Mud Crab | Large', 'Fresh mud crab | Alimango per kl.', 140, '1670994900_large.jpg', 0, 88),
(23, 'Squid', 'Squid | Small', 'Fresh squid | Pusit per kl.', 200, '1670995320_small squid.jpg', 0, 200),
(24, 'Squid', 'Squid | Medium', 'Fresh squid | Pusit per kl.', 210, '1670995380_medium squid.jpg', 0, 200),
(25, 'Squid', 'Squid | Large', 'Fresh squid | Pusit per kl.', 220, '1670995500_large squid.jpg', 0, 200),
(26, 'Squid', 'Cuttlefish | Small', 'Fresh cuttlefish | Kumbotan per kl.', 300, '1670995620_small kom.jpg', 0, 70),
(27, 'Squid', 'Cuttlefish | Medium', 'Fresh cuttlefish | Kumbotan per kl.', 210, '1670996460_medium kom.jpg', 0, 200),
(28, 'Squid', 'Cuttlefish | Large', 'Fresh cuttlefish | Kumbotan per kl.', 220, '1670996520_large kom.jpg', 0, 194),
(29, 'Squid', 'Cuttlefish | XL', 'Fresh cuttlefish | Kumbotan per kl.', 230, '1670996580_XL kom.jpg', 0, 170),
(30, 'Shells | Scallop', 'Mussel', 'Fresh mussel | Tahong per kl.', 150, '1670996760_mussel.jpg', 0, 140),
(31, 'Shells | Scallop', 'Clams', 'Fresh clams | Kabibe per kl.', 200, '1670996880_clams.jpg', 0, 20);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'MARION\'S SEAFOODS ORDERING', 'jadeducay15@gmail.com', '+639661454996', '2.jpg', '&lt;p style=&quot;text-align: justify; background: transparent; position: relative;&quot;&gt;&lt;span style=&quot;font-size: 14.3998px;&quot;&gt;&lt;span style=&quot;font-size:12px;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;br&gt;&lt;/div&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=admin , 2 = staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`) VALUES
(1, 'Administrator', 'admin', 'admin123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address`) VALUES
(1, 'jade', 'ducay', 'jadeducay15@gmail.com', 'e4245c55cca03ed92731c4e29fca20cc', '0966145499', 'bunakan'),
(2, 'Angel', 'Sayson', 'angel12@gmail.com', 'ab1dbd386662b62477b62087a389256a', '0916372833', 'Mancilang'),
(3, 'Laurel', 'Carallas', 'laurel12@gmail.com', 'b0a4c1a75c8c0e7ed3d178e3c093f9c8', '0937528192', 'Bunakan'),
(4, 'Stephen', 'Alolor', 'stephen123@gmail.com', '5615c86287c45c7e3a570df465376e3b', '0936278193', 'mancilang'),
(5, 'Jestoni', 'Villaceran', 'jestoni12@gmail.com', 'fbf641bb27373cfab7cdbc80eb72cd9e', '0928719273', 'Poblacion'),
(6, 'Chloe', 'Valdez', 'valdez123@gmail.com', '5eedfa962cc83a5856916ae60084e3be', '0917354098', 'San Agustin'),
(7, 'Anabelle', 'Maru', 'maru12@gmail.com', '06e4090da882b1568c59039de86025c2', '0915264782', 'Kaongkod'),
(8, 'Gabriel', 'Fernandez', 'gabriel12@gmail.com', '8833f1325fb6341757b30f6de91487a5', '0912375142', 'Kodia'),
(9, 'Alvin', 'Moradas', 'alvin12@gmail.com', 'f8ac8ebc53fd3b020ad526a5dfb1cf3f', '0937281223', 'Atop-Atop'),
(10, 'Peter', 'layam', 'peter123@gmail.com', 'e3e7f312a36e128c29a42352bb4ff8d7', '0912372912', 'Sta fe'),
(11, 'Jonel', 'Destura', 'jonel12@gmail.com', 'd82e0bc2397829fc46e70d513ce709d4', '0912396162', 'Atop-atop'),
(12, 'Carlo', 'Fulmenar', 'carlo123@gmail.com', '565fb88bce1b1ae6a5eb6a8e225c4b7f', '0912873629', 'Sillon'),
(13, 'Brex', 'Umbao', 'brexumbao12@gmail.com', '81f636ab01c1013bf023d6c51a89c91a', '0917256309', 'Bunakan'),
(14, 'jhonlie', 'Bayon-on', 'jhonlie12@gmail.com', '38846b720f2635f4319bd0c218286cd3', '0912352309', 'Sillon'),
(15, 'Morito', 'Sarzuelo', 'morito123@gmail.com', '6f770489c8dacbb93e8300f8c312d8a2', '0916243981', 'Kodia'),
(16, 'Roque', 'Zapa', 'roque123@gmail.com', 'f92f0904180fd3c583a43cefcb071b2a', '0912351290', 'San Agustin'),
(17, 'Mark Jhon', 'Destacamento', 'mark123@gmail.com', '6d295738eb6579053ac46a9ca1902583', '0912381290', 'Sulangan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

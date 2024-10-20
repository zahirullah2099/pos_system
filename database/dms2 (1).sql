-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2024 at 03:53 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dms2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'zahir', 'zahir@gmail.com', '1122'),
(2, 'hamza', 'hamza@gmail.com', '3344'),
(3, 'hashir', 'hashir@gmail.com', '5566');

-- --------------------------------------------------------

--
-- Table structure for table `customer_payment`
--

CREATE TABLE `customer_payment` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `total_amount` int(15) NOT NULL,
  `paid_amount` int(15) NOT NULL,
  `remaining_amount` int(15) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_payment`
--

INSERT INTO `customer_payment` (`payment_id`, `order_id`, `seller_id`, `description`, `total_amount`, `paid_amount`, `remaining_amount`, `date`) VALUES
(1, 0, 1, '2 kilo rice', 100, 40, 60, '2024-10-17'),
(2, 0, 2, 'four bottle of oil', 1600, 600, 1000, '2024-10-17'),
(3, 0, 3, 'adfadfasdf', 242, 100, 142, '2024-10-17'),
(4, 17, 4, 'i have bought 2 bottle of coca cola', 66, 23, 43, '2024-10-17'),
(5, 18, 1, '3 bottle of sprit', 363, 60, 303, '2024-10-17'),
(6, 19, 2, 'lux soap and lipton yellow label tea', 680, 80, 600, '2024-10-19'),
(7, 20, 1, 'tata salt\r\nnestle milkpak', 630, 100, 530, '2024-10-19'),
(8, 0, 4, 'shan biryani masala', 120, 80, 40, '2024-10-19'),
(9, 21, 4, 'surf exel detergen', 690, 550, 50, '2024-10-19'),
(10, 22, 4, 'first-lux soap\r\nsecond- pepsi 1.5l', 390, 200, 190, '2024-10-20'),
(11, 23, 1, '8:pepsi\r\n18:sprit mint', 660, 510, 150, '2024-10-20'),
(12, 24, 2, 'lipton yellow label\r\nsurf excel detergen', 600, 430, 170, '2024-10-20'),
(13, 26, 3, 'pepsi\r\nsprit min', 700, 320, 380, '2024-10-20'),
(14, 28, 1, 'shan biryani masala\r\nlux soap', 460, 70, 390, '2024-10-20'),
(15, 31, 2, 'xxxyyyyyyzzzzzzzzzz', 615, 590, 25, '2024-10-20'),
(16, 33, 1, 'cvvgggggggggg', 450, 100, 350, '2024-10-20');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `reorder_level` int(11) DEFAULT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventory_id`, `product_id`, `product_name`, `price`, `quantity`, `reorder_level`, `last_updated`) VALUES
(2, 2, 'Tata Salt 1kg', 45.00, 120, 10, '2024-10-14 10:31:58'),
(3, 3, 'Surf Excel Detergent', 120.00, 40, 8, '2024-10-16 17:55:59'),
(4, 4, 'Nestle Milkpak', 180.00, 60, 10, '2024-10-16 17:57:17'),
(5, 5, 'National Masala 100g', 50.00, 180, 10, '2024-10-17 05:23:13'),
(6, 6, 'Lipton Yellow Label Tea 100g', 180.00, 75, 10, '2024-10-12 14:08:12'),
(7, 7, 'Lux Soap 125g', 70.00, 200, 10, '2024-10-12 14:08:17'),
(8, 8, 'Pepsi 1.5L', 90.00, 40, 10, '2024-10-12 14:08:23'),
(9, 9, 'Shan Biryani Masala 50g', 60.00, 120, 10, '2024-10-12 14:08:29'),
(16, 18, 'sprit mint', 130.00, 20, 3, '2024-10-12 19:00:00'),
(17, 19, 'coca cola', 11.00, 111, 3, '2024-10-12 19:00:00'),
(18, 20, 'sprit', 11.00, 121, 3, '2024-10-12 19:00:00'),
(20, 22, 'salt', 12.00, 22, 33, '2024-10-15 09:16:53'),
(21, 23, 'coca cola', 33.00, 223, 4, '2024-10-12 19:00:00'),
(22, 24, 'sugar', 32.00, 54, 2, '2024-10-12 19:00:00'),
(23, 25, 'coca cola', 53.00, 44, 3, '2024-10-12 19:00:00'),
(24, 26, 'oil', 400.00, 70, 8, '2024-10-12 19:00:00'),
(25, 27, 'bonus surf', 10.00, 30, 5, '2024-10-12 19:00:00'),
(26, 28, 'cells', 15.00, 80, 9, '2024-10-12 19:00:00'),
(27, 29, 'sprit', 121.00, 23, 6, '2024-10-12 19:00:00'),
(28, 30, 'rice', 50.00, 70, 4, '2024-10-12 19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `order_date` datetime DEFAULT current_timestamp(),
  `total_amount` decimal(10,2) NOT NULL,
  `status` enum('Pending','Fulfilled','Canceled') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `seller_id`, `product_id`, `quantity`, `order_date`, `total_amount`, `status`) VALUES
(1, 1, 13, 2, '2024-10-12 00:02:39', 40.00, 'Pending'),
(2, 2, 3, 1, '2024-10-12 00:02:39', 15.00, 'Fulfilled'),
(3, 1, 2, 5, '2024-10-12 00:02:39', 100.00, 'Pending'),
(4, 3, 1, 3, '2024-10-12 00:02:39', 60.00, 'Canceled'),
(5, 2, 4, 4, '2024-10-12 00:02:39', 80.00, 'Pending'),
(6, 4, 29, 7, '2024-10-15 12:08:43', 0.00, 'Pending'),
(7, 4, 6, 3, '2024-10-15 12:10:27', 420.00, 'Pending'),
(8, 4, 7, 3, '2024-10-16 14:16:29', 210.00, 'Pending'),
(9, 2, 83, 7, '2024-10-16 14:21:50', 105.00, 'Pending'),
(10, 2, 25, 3, '2024-10-16 14:28:31', 159.00, 'Pending'),
(11, 3, 84, 2, '2024-10-16 14:29:43', 600.00, 'Pending'),
(12, 3, 6, 3, '2024-10-16 14:33:27', 540.00, 'Pending'),
(13, 3, 27, 7, '2024-10-16 22:54:50', 70.00, 'Pending'),
(14, 1, 30, 2, '2024-10-17 11:32:43', 100.00, 'Pending'),
(15, 2, 26, 4, '2024-10-17 11:36:22', 1600.00, 'Pending'),
(16, 3, 29, 2, '2024-10-17 11:42:00', 242.00, 'Pending'),
(17, 4, 23, 2, '2024-10-17 11:52:15', 66.00, 'Pending'),
(18, 1, 29, 3, '2024-10-17 12:12:00', 363.00, 'Pending'),
(19, 2, 6, 3, '2024-10-19 00:00:00', 140.00, 'Pending'),
(20, 1, 4, 3, '2024-10-19 00:00:00', 90.00, 'Pending'),
(21, 4, 3, 5, '2024-10-19 00:00:00', 90.00, 'Pending'),
(22, 4, 8, 2, '2024-10-20 00:00:00', 210.00, 'Pending'),
(23, 1, 18, 3, '2024-10-20 00:00:00', 270.00, 'Pending'),
(24, 2, 3, 2, '2024-10-20 00:00:00', 360.00, 'Pending'),
(25, 3, 8, 2, '2024-10-20 00:00:00', 180.00, 'Pending'),
(26, 3, 18, 4, '2024-10-20 00:00:00', 520.00, 'Pending'),
(27, 1, 9, 3, '2024-10-20 00:00:00', 180.00, 'Pending'),
(28, 1, 7, 4, '2024-10-20 00:00:00', 280.00, 'Pending'),
(29, 2, 2, 5, '2024-10-20 00:00:00', 225.00, 'Pending'),
(30, 2, 5, 3, '2024-10-20 00:00:00', 150.00, 'Pending'),
(31, 2, 9, 4, '2024-10-20 00:00:00', 240.00, 'Pending'),
(32, 1, 2, 2, '2024-10-20 00:00:00', 90.00, 'Pending'),
(33, 1, 3, 3, '2024-10-20 00:00:00', 360.00, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `price`, `quantity`) VALUES
(1, 'Dalda Cooking Oil 1L', 350.00, 50),
(2, 'Tata Salt 1kg', 45.00, 100),
(3, 'Surf Excel Detergent 500g', 120.00, 80),
(4, 'Nestle Milkpak 1L', 180.00, 60),
(5, 'National Masala 100g', 40.00, 140),
(6, 'Lipton Yellow Label Tea 100g', 180.00, 75),
(7, 'Lux Soap 125g', 70.00, 200),
(8, 'Pepsi 1.5L', 90.00, 40),
(9, 'Shan Biryani Masala 50g', 60.00, 120),
(11, 'lays chips', 20.00, 40),
(12, 'sting', 59.00, 30),
(13, 'sting', 60.00, 30),
(14, 'coca cola', 120.00, 40),
(15, 'sprit', 120.00, 60),
(16, 'Salt', 15.00, 101),
(17, 'sugar', 500.00, 12),
(18, 'sprit mint', 130.00, 20),
(19, 'coca cola', 11.00, 111),
(20, 'sprit', 11.00, 121),
(21, 'sugar', 44.00, 55),
(22, 'salt', 12.00, 233),
(23, 'coca cola', 33.00, 223),
(24, 'sugar', 32.00, 54),
(25, 'coca cola', 53.00, 44),
(26, 'oil', 400.00, 70),
(27, 'bonus surf', 10.00, 30),
(28, 'cells', 15.00, 80),
(29, 'sprit', 121.00, 23),
(30, 'rice', 50.00, 70),
(31, 'cells', 22.00, 323),
(32, 'Tata Salt 1kg', 23.00, 111),
(33, 'Tata Salt 1kg', 23.00, 111),
(34, 'sting', 55.00, 12),
(35, 'shampoo', 500.00, 33),
(36, 'pantene', 200.00, 44),
(37, 'pantene', 200.00, 44),
(38, 'note book', 100.00, 130),
(62, 'mobile phone', 6000.00, 12),
(63, 'bonus surf', 20.00, 30),
(64, 'Tata Salt 1kg', 45.00, 102),
(65, 'Dalda Cooking Oil 1L', 360.00, 39),
(66, 'Surf Excel Detergent 500g', 120.00, 40),
(67, '', 0.00, 0),
(68, '', 0.00, 0),
(69, '', 0.00, 0),
(70, '', 0.00, 0),
(71, '', 0.00, 0),
(72, '', 0.00, 0),
(73, '', 0.00, 0),
(74, '', 0.00, 0),
(75, '', 0.00, 0),
(76, '', 0.00, 0),
(77, '', 0.00, 0),
(78, '', 0.00, 0),
(79, '', 0.00, 0),
(80, '', 0.00, 0),
(81, '', 0.00, 0),
(82, '', 0.00, 0),
(83, 'pen', 15.00, 60),
(84, 'mouse', 300.00, 12),
(85, 'keyboar', 400.00, 13),
(86, '', 0.00, 0),
(87, '', 0.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `seller_id` int(11) NOT NULL,
  `seller_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`seller_id`, `seller_name`, `email`, `password`, `phone`) VALUES
(1, 'Ali Ahmad', 'ali.ahmad@example.com', '1122', '03001234567'),
(2, 'Sara Khan', 'sara.khan@example.com', '3344', '03102345678'),
(3, 'Bilal Aslam', 'bilal.aslam@example.com', '5566', '03203456789'),
(4, 'Fatima Ali', 'fatima.ali@example.com', '7788', '03304567890');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_payment`
--
ALTER TABLE `customer_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `seller_id` (`seller_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`seller_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_payment`
--
ALTER TABLE `customer_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`seller_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

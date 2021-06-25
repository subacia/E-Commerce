-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2021 at 08:55 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sample_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `c_i_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `active_status` varchar(1) NOT NULL COMMENT '1-active,0-deleted',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`c_i_id`, `prod_id`, `quantity`, `total_price`, `user_id`, `active_status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 25000, 2, '0', '2021-06-24 16:34:00', '2021-06-24 19:23:54'),
(2, 3, 2, 70000, 2, '0', '2021-06-24 16:43:59', '2021-06-25 04:53:54'),
(3, 2, 2, 54000, 2, '0', '2021-06-24 19:36:08', '2021-06-25 04:53:55'),
(4, 3, 2, 70000, 2, '0', '2021-06-25 05:07:07', '2021-06-25 05:09:49'),
(5, 2, 2, 54000, 2, '0', '2021-06-25 05:10:33', '2021-06-25 05:10:51'),
(6, 4, 1, 32000, 2, '0', '2021-06-25 05:11:55', '2021-06-25 05:12:51'),
(7, 3, 2, 70000, 2, '0', '2021-06-25 05:14:35', '2021-06-25 05:15:05'),
(8, 3, 1, 35000, 2, '0', '2021-06-25 05:15:49', '2021-06-25 05:16:08'),
(9, 4, 1, 32000, 2, '0', '2021-06-25 05:16:24', '2021-06-25 05:16:43'),
(10, 2, 3, 81000, 2, '0', '2021-06-25 17:25:29', '2021-06-25 17:37:25'),
(11, 3, 1, 35000, 2, '1', '2021-06-25 17:37:43', '2021-06-25 17:37:43'),
(12, 6, 1, 2500, 2, '1', '2021-06-25 18:06:21', '2021-06-25 18:06:21');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `active_status` varchar(1) NOT NULL COMMENT '1-active, 0-inactive',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `category_name`, `active_status`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', '1', '2021-06-25 19:43:58', '2021-06-25 19:43:58'),
(2, 'Head Phone', '1', '2021-06-25 19:43:58', '2021-06-25 19:43:58');

-- --------------------------------------------------------

--
-- Table structure for table `ordered_items`
--

CREATE TABLE `ordered_items` (
  `id` int(11) NOT NULL,
  `order_id` varchar(30) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `this_item_price` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordered_items`
--

INSERT INTO `ordered_items` (`id`, `order_id`, `prod_id`, `quantity`, `this_item_price`, `created_at`, `updated_at`) VALUES
(1, 'OR_1000', 3, 1, 35000, '2021-06-25 05:16:08', NULL),
(2, 'OR_1001', 4, 1, 32000, '2021-06-25 05:16:43', NULL),
(3, 'OR_1002', 2, 3, 81000, '2021-06-25 17:37:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `o_d_id` int(11) NOT NULL,
  `order_id` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `payment_mode` varchar(20) NOT NULL COMMENT '1-cash on delivery, 2-Online',
  `name` varchar(255) NOT NULL,
  `mble_num` varchar(12) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`o_d_id`, `order_id`, `user_id`, `paid_amount`, `payment_mode`, `name`, `mble_num`, `address`, `created_at`, `updated_at`) VALUES
(1, 'OR_1000', 2, 35000, '1', 'Fino', '8344590596', 'test addrs', '2021-06-25 05:16:08', NULL),
(2, 'OR_1001', 2, 32000, '2', 'Fino', '8344590596', 'test addrs', '2021-06-25 05:16:43', NULL),
(3, 'OR_1002', 2, 81000, '2', 'Fino', '8344590596', 'test addrs', '2021-06-25 17:37:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL COMMENT 'category table p_id',
  `prod_name` varchar(25) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `short_des` varchar(100) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `price` int(10) NOT NULL,
  `availability` varchar(1) NOT NULL COMMENT '1-available, 0-unavailable',
  `active` varchar(1) NOT NULL DEFAULT '1' COMMENT '1-acive, 0-inactive',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `c_id`, `prod_name`, `image_url`, `short_des`, `description`, `price`, `availability`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 'toshipa', 'toshiba_lap.jpg', 'Toshiba C55-B5272 Laptop (Core i3 1st Gen/6 GB/750 GB/Windows 7) laptop has a 15.6 Inches', 'HP 15 Thin & Light 15.6\" (39.62cms) FHD Laptop (11th Gen Intel Core i5-1135G7, 8GB DDR4, 256GB SSD + 1TB HDD, Win 10 Home, MS Office, 2GB MX350 Graphics, FPR, Natural Silver, 1.76 Kg), 15s-du3047TX', 25000, '1', '1', '2021-06-23 01:15:29', '2021-06-23 01:15:29'),
(2, 1, 'HP', 'hp_laptop.jpg', 'HP NoteBook is a Windows 10 laptop with a 15.60-inch display', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard', 27000, '1', '1', '2021-06-23 01:15:29', '2021-06-23 01:15:29'),
(3, 1, 'Dell', 'dell_lap.jpg', 'DELL Inspiron Core i5 11th Gen - (8 GB/512 GB SSD/Windows)', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard', 35000, '1', '1', '2021-06-23 01:15:29', '2021-06-23 01:15:29'),
(4, 1, 'Lenovo', 'lenovo_laptop.jpg', 'Lenovo ThinkPad X1 Carbon Gen 8', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard', 32000, '1', '1', '2021-06-23 01:15:29', '2021-06-23 01:15:29'),
(5, 1, 'Asus', 'ausu_lap.jpg', 'ASUS ZenBook 14 UX433FA-A6106T 14-inch FHD Thin ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard', 38000, '1', '1', '2021-06-23 01:15:29', '2021-06-23 01:15:29'),
(6, 2, 'Boat', 'boat_headphone.jpg', 'boAt Rockerz 550 Over-Ear Wireless Headphones (Red)', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard', 2500, '1', '1', '2021-06-23 01:15:29', '2021-06-23 01:15:29');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `mobile_num` varchar(12) NOT NULL,
  `password` varchar(8) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `mobile_num`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Fino', '8344590597', 'test', '2021-06-23 18:45:50', '2021-06-23 18:45:50'),
(2, 'Fino', '8344590596', 'test', '2021-06-23 18:46:10', '2021-06-23 18:46:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`c_i_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `ordered_items`
--
ALTER TABLE `ordered_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`o_d_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `c_i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ordered_items`
--
ALTER TABLE `ordered_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `o_d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

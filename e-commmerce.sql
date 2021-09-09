-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2021 at 01:44 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commmerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `caterogry_name` varchar(255) DEFAULT NULL,
  `status` tinyint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `caterogry_name`, `status`) VALUES
(29, 'Tv', 1),
(45, 'Laptop', 1),
(47, 'SmartWatch', 1),
(48, 'Smartphones', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `mobile` varchar(250) DEFAULT NULL,
  `comment` varchar(500) DEFAULT NULL,
  `added_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `newregistry`
--

CREATE TABLE `newregistry` (
  `id` int(11) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Contact_Number` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newregistry`
--

INSERT INTO `newregistry` (`id`, `Email`, `FirstName`, `LastName`, `Contact_Number`, `password`) VALUES
(21, 'neupanemanes@gmail.com', 'manish', 'Neupane', '9810438054', '571d3a9420bfd9219f65b643d0003bf4'),
(23, 'praveshkhanal@gmail.com', 'pravesh', 'khanal', '9810438054', 'af1b5754061ebbd4412adfb34c8d3534');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(5, 8, 14, '10', '28999'),
(6, 8, 13, '3', '2499\r\n'),
(7, 9, 15, '1', '149999'),
(8, 9, 8, '2', '87999'),
(9, 10, 8, '2', '87999'),
(10, 10, 12, '3', '28555'),
(11, 10, 11, '5', '1599'),
(12, 11, 13, '1', '2499\r\n'),
(13, 11, 11, '1', '1599');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `status_name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Shipped'),
(4, 'Canceled'),
(5, 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `pincode` varchar(250) NOT NULL,
  `total_price` varchar(250) NOT NULL,
  `payment_type` varchar(250) NOT NULL,
  `payment_status` varchar(250) NOT NULL,
  `order_status` varchar(250) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`id`, `user_id`, `address`, `city`, `pincode`, `total_price`, `payment_type`, `payment_status`, `order_status`, `added_on`) VALUES
(8, 13, 'subidanagar', 'tinkune,kathmandu', '44600', '297487', 'pay_online', 'Online payment', '1', '2021-09-05 03:10:31'),
(9, 29, 'seti-opi marga', 'koteshowor, kathmandu', '44600', '325997', 'pay_online', 'Online payment', '1', '2021-09-05 04:42:26'),
(10, 1, 'amrawati marga', 'balkumari , kathmandu', '44600', '269658', 'COD', 'cash on delivery', '1', '2021-09-07 07:29:35'),
(11, 29, 'seti-opi marga', 'koteshowor, kathmandu', '44600', '4098', 'COD', 'cash on delivery', '1', '2021-09-08 05:27:47');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `categories_id` varchar(200) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `Selling_price` varchar(100) DEFAULT NULL,
  `Buying_price` varchar(100) DEFAULT NULL,
  `Quantity` varchar(100) DEFAULT NULL,
  `Description` varchar(2000) DEFAULT NULL,
  `Meta_title` text DEFAULT NULL,
  `images` varchar(300) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `categories_id`, `product_name`, `Selling_price`, `Buying_price`, `Quantity`, `Description`, `Meta_title`, `images`, `status`) VALUES
(8, '45', 'HP Pavillion 15', '87999', '88999', '150', 'Fastest Gaming laptop with Extra GPU', 'Middle range laptop', '../frontend/imagesdb/hp.png', 1),
(9, '45', 'MSI Modern 14', '136000', '139999', '100', ' i5 10th Gen MX250 8GB RAM 512GB SSD 15.6” display', 'Best Gaming Laptop with High Performance', '../frontend/imagesdb/msi.jpg', 1),
(10, '29', 'Lg 4k Television', '125555', '126999', '150', 'Take a closer look at the standard for sharpness with LG’s amazing collection of 4K Ultra HD televisions.', '4K Ultra HD televisions.', '../frontend/imagesdb/lg.jpg', 1),
(11, '47', 'Mi Smart Band 6', '1599', '1799', '180', 'Full AMOLED Display and 30 Fitness Mode', 'Best smart watch  less than 2000', '../frontend/imagesdb/m1.jpg', 1),
(12, '48', 'Redmi Note 10s', '28555', '29999', '85', '64MP Quad Camera , 16.33cm(6.43) Super AMOLED Display Corning® Gorilla® Glass Protection, 5000 mAh battery upon 33W fast charging,', 'Best Gaming phone under 30k', '../frontend/imagesdb/Redmi-note-10s.png', 1),
(13, '47', 'T500', '2499\r\n', '2599', '150', 'T500 Bluetooth Smart Watch Series 5 Smartwatch IWO13 Heart Rate Monitor Blood Pressure Fitness Tracker Music Play Clock', 'Best smart watch below 3k', '../frontend/imagesdb/t500.jpg', 1),
(14, '48', 'Samsung M21 ', '28999', '29999', '150', 'Display 6.40-inch (2340x1080) · Processor Samsung Exynos 9611 · Front Camera 20MP · Rear Camera 48MP + 8MP + 5MP · RAM 4GB · Storage 64GB.', 'Best Gaming phone under 30k', '../frontend/imagesdb/samsung-m21.jpeg', 1),
(15, '29', 'Sony Bravia KD-557000G', '149999', '155555', '60', 'Built-in Tuner · Number of Tuners (Sat). - · TV System (Digital Cable). - · Tuner Channel Coverage (Analog). 45.25MHz-863.25MHz(Depend on country/area selection)', 'Lastest And Best 4k TV in Nepal', '../frontend/imagesdb/sony.jfif', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `FirstName` varchar(200) NOT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Contact_Number` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `Email`, `FirstName`, `LastName`, `Contact_Number`, `password`) VALUES
(1, 'singhsumana@gmail.com', 'sumana', 'singh', '9810438054', '4e0ce823712d80dd983c2d1f59eb953e'),
(13, 'praveshkhanal@gmail.com', 'pravesh', 'khanal', '9847057010', 'fa830fe4e6a20d01e68733a020a3d906'),
(29, 'asd', 'sadfasas', 'dfsadf', 'asdf', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newregistry`
--
ALTER TABLE `newregistry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `newregistry`
--
ALTER TABLE `newregistry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

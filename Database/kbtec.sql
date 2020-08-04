-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Aug 03, 2020 at 07:48 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kbtec`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_no` int(11) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `i_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_id` int(11) NOT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `paid` int(11) NOT NULL,
  `paid_date` timestamp NULL DEFAULT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`i_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

DROP TABLE IF EXISTS `keys`;
CREATE TABLE IF NOT EXISTS `keys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, '1234', 1, 0, 0, '192.168.1.103', 1);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `method` varchar(6) NOT NULL,
  `params` text,
  `api_key` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` int(11) NOT NULL,
  `rtime` float DEFAULT NULL,
  `authorized` varchar(1) NOT NULL,
  `response_code` smallint(3) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `o_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(60) NOT NULL,
  `product_categry` int(10) NOT NULL,
  `price` decimal(19,4) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `active` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `product_name`, `product_categry`, `price`, `description`, `image`, `active`) VALUES
(1, 'Rice Cooker', 3, '10000.0000', 'test', 'cdER4MAce6.png', 1),
(2, 'Dell Laptop', 2, '65000.0000', 'Laptop product', '7YOlk1T56j.jpg', 1),
(3, 'Trousers', 1, '2500.0000', 'Made in Sri Lanka', 'cvHYu5eWaQ.png', 1),
(4, 'Oven', 3, '15000.0000', 'Made in Thailand', 'hsmI5vMuk5.png', 1),
(5, 'Alphabet Sets', 4, '1500.0000', 'Made in India', 'lEuCBs6oQf.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
CREATE TABLE IF NOT EXISTS `product_category` (
  `pc_id` int(11) NOT NULL AUTO_INCREMENT,
  `pc_name` varchar(60) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `active` int(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`pc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`pc_id`, `pc_name`, `description`, `active`) VALUES
(1, 'Cloths', 'Made by cloths', 1),
(2, 'Computer Accessories', 'Computer relates all', 1),
(3, 'Kitchen Items', 'Items used in kitchen', 1),
(4, 'Baby Care Items', 'All baby and children related goods', 1),
(5, 'Furniture', 'Made by wood plastic', 1),
(6, 'Baby Care Items', 'test', 1),
(7, 'Stationary', 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_seller`
--

DROP TABLE IF EXISTS `product_seller`;
CREATE TABLE IF NOT EXISTS `product_seller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(10) NOT NULL,
  `s_id` int(10) NOT NULL,
  `stock_id` int(10) NOT NULL,
  `active` int(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_seller`
--

INSERT INTO `product_seller` (`id`, `p_id`, `s_id`, `stock_id`, `active`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 2, 2, 1),
(3, 2, 2, 3, 1),
(4, 3, 2, 4, 1),
(5, 4, 1, 5, 1),
(6, 5, 3, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

DROP TABLE IF EXISTS `seller`;
CREATE TABLE IF NOT EXISTS `seller` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_name` varchar(255) DEFAULT NULL,
  `DOB` datetime NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_no` varchar(25) NOT NULL,
  `NIC` varchar(15) NOT NULL,
  `active` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`s_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`s_id`, `s_name`, `DOB`, `address`, `contact_no`, `NIC`, `active`) VALUES
(1, 'John Mike', '2018-08-18 00:00:00', 'London', '044576968', '3426585878V', 1),
(2, 'Garry Hobbs', '2017-10-20 00:00:00', 'Australia', '09464273545', '398537593', 1),
(3, 'Micheal Davis', '2018-07-03 00:00:00', 'London', '4689729899', '125654778', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `stock_id` int(11) NOT NULL,
  `total_items` int(10) DEFAULT NULL,
  `items_to_invoice` int(11) NOT NULL DEFAULT '0',
  `sold_items` int(10) DEFAULT NULL,
  `reorder_level` int(10) DEFAULT NULL,
  PRIMARY KEY (`stock_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `total_items`, `items_to_invoice`, `sold_items`, `reorder_level`) VALUES
(1, 100, 3, 0, 10),
(2, 150, 0, 0, 25),
(3, 75, 2, 0, 10),
(4, 50, 0, 0, 5),
(5, 35, 0, 0, 5),
(6, 125, 0, 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `system_user`
--

DROP TABLE IF EXISTS `system_user`;
CREATE TABLE IF NOT EXISTS `system_user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `active` int(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `system_user`
--

INSERT INTO `system_user` (`u_id`, `name`, `password`, `last_login`, `active`) VALUES
(1, 'admin', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', NULL, 1),
(2, 'Nadee', '6a95bbab63d587b596398c4bd7e91a132f24032d2007d107e5ea71967724b092', NULL, 1),
(3, 'Eshan', '36f583dd16f4e1e201eb1e6f6d8e35a2ccb3bbe2658de46b4ffae7b0e9ed872e', NULL, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2021 at 05:53 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accounting`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_number` int(11) DEFAULT NULL,
  `balance` float NOT NULL,
  `account_type_id` int(11) NOT NULL,
  `account_route_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `number`, `name`, `parent_number`, `balance`, `account_type_id`, `account_route_id`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 'الصندوق', 0, 10540, 1, 4, '2018-03-11 00:00:00', '2021-07-28 14:22:34', 1, NULL),
(2, 2, 'المبيعات', NULL, -225340, 1, 2, '2018-03-11 13:55:25', '2021-07-28 14:20:57', 1, NULL),
(3, 3, 'المشتريات', NULL, 240900, 2, 2, '2018-03-11 13:55:50', '2019-07-23 12:57:38', 1, NULL),
(4, 4, 'مردود المبيعات', NULL, 0, 2, 2, '2018-03-11 13:56:30', '2018-03-11 13:56:30', 1, NULL),
(5, 5, 'مردود المشتريات', NULL, 0, 1, 2, '2018-03-11 13:56:49', '2018-03-11 13:56:49', 1, NULL),
(6, 6, 'الذمم المالية', NULL, 0, 3, 4, '2018-03-11 13:58:09', '2018-03-11 13:58:09', 1, NULL),
(7, 7, 'خصم مكتسب', NULL, -3100, 1, 2, '2018-03-11 13:58:52', '2019-07-23 12:57:38', 1, NULL),
(8, 8, 'خصم مسموح به', NULL, 3700, 2, 2, '2018-03-11 13:59:09', '2018-03-25 15:55:48', 1, NULL),
(9, 100001, 'نور أبو حصيرة', 0, -62000, 1, 4, '2018-03-11 13:59:55', '2018-03-25 17:03:29', 1, NULL),
(10, 100002, 'محمد', 0, -150800, 1, 4, '2018-03-11 14:00:32', '2019-07-23 12:57:38', 1, NULL),
(11, 200003, 'سليم', 0, 199900, 2, 4, '2018-03-11 14:01:15', '2021-07-28 14:22:34', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `account_route`
--

CREATE TABLE `account_route` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_route`
--

INSERT INTO `account_route` (`id`, `name`) VALUES
(1, 'ميزان المراجعة'),
(2, 'حساب متاجرة'),
(3, 'الارباح والخسائر'),
(4, 'الميزانية العمومية');

-- --------------------------------------------------------

--
-- Table structure for table `account_transaction`
--

CREATE TABLE `account_transaction` (
  `id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `voucher_id` int(11) DEFAULT NULL,
  `account_transaction_type_id` int(11) DEFAULT NULL,
  `description` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_transaction`
--

INSERT INTO `account_transaction` (`id`, `account_id`, `voucher_id`, `account_transaction_type_id`, `description`, `amount`, `created_at`, `updated_at`) VALUES
(32, 2, 29, 1, 'مبيعات', 10000, '2018-03-23 00:00:00', NULL),
(33, 1, 29, 2, 'مبيعات', 300, '2018-03-23 00:00:00', NULL),
(34, 2, 30, 1, 'مبيعات', 10000, '2018-03-23 00:00:00', NULL),
(35, 1, 30, 2, 'مبيعات', 300, '2018-03-23 00:00:00', NULL),
(36, 2, 31, 1, 'مبيعات', 10000, '2018-03-23 00:00:00', NULL),
(37, 1, 31, 2, 'مبيعات', 300, '2018-03-23 00:00:00', NULL),
(38, 9, 32, 1, 'مشتريات', 0, '2018-03-22 00:00:00', NULL),
(39, 2, 33, 1, 'مبيعات', 10000, '2018-03-23 00:00:00', NULL),
(40, 1, 33, 2, 'مبيعات', 300, '2018-03-23 00:00:00', NULL),
(41, 3, 34, 2, 'مشتريات', 99999, '2018-03-23 00:00:00', NULL),
(42, 7, 34, 1, 'مشتريات', 11, '2018-03-23 00:00:00', NULL),
(43, 1, 34, 1, 'مشتريات', 222, '2018-03-23 00:00:00', NULL),
(44, 2, 35, 1, 'مبيعات', 0, '2018-03-23 00:00:00', NULL),
(45, 8, 35, 2, 'مبيعات', 22, '2018-03-23 00:00:00', NULL),
(46, 11, 35, 2, 'مبيعات', 0, '2018-03-23 00:00:00', NULL),
(47, 3, 36, 2, 'مشتريات', 0, '2018-03-16 00:00:00', NULL),
(48, 7, 36, 1, 'مشتريات', 444, '2018-03-16 00:00:00', NULL),
(49, 9, 36, 1, 'مشتريات', 0, '2018-03-16 00:00:00', NULL),
(50, 3, 37, 2, 'مشتريات', 0, '2018-03-24 00:00:00', NULL),
(51, 7, 37, 1, 'مشتريات', 450, '2018-03-24 00:00:00', NULL),
(52, 9, 37, 1, 'مشتريات', 0, '2018-03-24 00:00:00', NULL),
(53, 2, 38, 1, 'مبيعات', 0, '2018-03-24 00:00:00', NULL),
(54, 8, 38, 2, 'مبيعات', 100, '2018-03-24 00:00:00', NULL),
(55, 11, 38, 2, 'مبيعات', 0, '2018-03-24 00:00:00', NULL),
(56, 3, 39, 2, 'مشتريات', 110000, '2018-03-24 00:00:00', NULL),
(57, 7, 39, 1, 'مشتريات', 500, '2018-03-24 00:00:00', NULL),
(58, 9, 39, 1, 'مشتريات', 109500, '2018-03-24 00:00:00', NULL),
(62, 3, 43, 2, 'مشتريات', 900, '2018-03-24 00:00:00', NULL),
(63, 7, 43, 1, 'مشتريات', 5000, '2018-03-24 00:00:00', NULL),
(64, 9, 43, 1, 'مشتريات', -4100, '2018-03-24 00:00:00', NULL),
(65, 2, 44, 1, 'مبيعات', 120000, '2018-03-24 00:00:00', NULL),
(66, 8, 44, 2, 'مبيعات', 100, '2018-03-24 00:00:00', NULL),
(67, 11, 44, 2, 'مبيعات', 119900, '2018-03-24 00:00:00', NULL),
(68, 3, 45, 2, 'مشتريات', 55000, '2018-03-24 00:00:00', NULL),
(69, 7, 45, 1, 'مشتريات', 500, '2018-03-24 00:00:00', NULL),
(70, 9, 45, 1, 'مشتريات', 54500, '2018-03-24 00:00:00', NULL),
(71, 2, 46, 1, 'مبيعات', 70240, '2018-03-25 00:00:00', NULL),
(72, 8, 46, 2, 'مبيعات', 3500, '2018-03-25 00:00:00', NULL),
(73, 11, 46, 2, 'مبيعات', 66740, '2018-03-25 00:00:00', NULL),
(74, 3, 47, 2, 'مشتريات', 33000, '2018-03-25 00:00:00', NULL),
(75, 7, 47, 1, 'مشتريات', 500, '2018-03-25 00:00:00', NULL),
(76, 9, 47, 1, 'مشتريات', 32500, '2018-03-25 00:00:00', NULL),
(77, 3, 48, 2, 'مشتريات', 60000, '2018-03-14 00:00:00', NULL),
(78, 7, 48, 1, 'مشتريات', 2000, '2018-03-14 00:00:00', NULL),
(79, 10, 48, 1, 'مشتريات', 58000, '2018-03-14 00:00:00', NULL),
(80, 2, 49, 1, 'مبيعات', 35000, '2018-03-18 00:00:00', NULL),
(81, 8, 49, 2, 'مبيعات', 100, '2018-03-18 00:00:00', NULL),
(82, 11, 49, 2, 'مبيعات', 34900, '2018-03-18 00:00:00', NULL),
(83, 11, 50, 1, 'سند قبض', 200, '2018-03-25 13:54:12', NULL),
(84, 1, 50, 2, 'سند قبض', -200, '2018-03-25 13:54:12', NULL),
(85, 11, 51, 1, 'سند قبض', 2000, '2018-03-25 13:57:44', NULL),
(86, 1, 51, 2, 'سند قبض', 2000, '2018-03-25 13:57:44', NULL),
(87, 11, 52, 1, 'سند قبض', 9540, '2018-03-25 13:58:51', NULL),
(88, 1, 52, 2, 'سند قبض', 9540, '2018-03-25 13:58:51', NULL),
(89, 9, 53, 2, 'سند صرف', -7000, '2018-03-25 13:59:25', NULL),
(90, 1, 53, 1, 'سند صرف', -7000, '2018-03-25 13:59:25', NULL),
(91, 9, 54, 2, 'سند صرف', 10000, '2018-03-25 14:02:27', NULL),
(92, 1, 54, 1, 'سند صرف', 10000, '2018-03-25 14:02:27', NULL),
(93, 11, 55, 1, 'سند قبض', 10000, '2018-03-25 14:03:01', NULL),
(94, 1, 55, 2, 'سند قبض', 10000, '2018-03-25 14:03:01', NULL),
(95, 9, 56, 2, 'سند صرف', 8000, '2018-03-25 14:03:29', NULL),
(96, 1, 56, 1, 'سند صرف', 8000, '2018-03-25 14:03:29', NULL),
(97, 3, 57, 2, 'مشتريات', 92900, '2019-07-23 00:00:00', NULL),
(98, 7, 57, 1, 'مشتريات', 100, '2019-07-23 00:00:00', NULL),
(99, 10, 57, 1, 'مشتريات', 92800, '2019-07-23 00:00:00', NULL),
(100, 11, 58, 2, 'سند صرف', 100, '2021-07-27 10:18:08', NULL),
(101, 1, 58, 1, 'سند صرف', 100, '2021-07-27 10:18:08', NULL),
(102, 2, 59, 1, 'مبيعات', 100, '2021-07-28 00:00:00', NULL),
(103, 11, 59, 2, 'مبيعات', 100, '2021-07-28 00:00:00', NULL),
(104, 11, 60, 1, 'سند قبض', 300, '2021-07-28 11:22:34', NULL),
(105, 1, 60, 2, 'سند قبض', 300, '2021-07-28 11:22:34', NULL);

--
-- Triggers `account_transaction`
--
DELIMITER $$
CREATE TRIGGER `account_transaction_ains` AFTER INSERT ON `account_transaction` FOR EACH ROW BEGIN
	update account set balance = balance + (new.account_transaction_type_id * 2 -3)*new.amount, updated_at = current_timestamp where id = new.account_id;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `account_transaction_type`
--

CREATE TABLE `account_transaction_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE `account_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`id`, `name`) VALUES
(1, 'دائن'),
(2, 'مدين'),
(3, 'دائن أو مدين');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `users_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `phone`, `active`, `users_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'نور', 'noor@yahoo.com', '0599888878', 1, 1, '2018-03-06 13:39:59', 1, '2021-07-27 10:20:24', 1),
(2, 'admin', 'admin@gmail.com', '0599999999', 1, 3, '2021-07-27 10:20:05', 1, '2021-07-27 10:20:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_link`
--

CREATE TABLE `admin_link` (
  `admin_id` int(11) NOT NULL,
  `link_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_link`
--

INSERT INTO `admin_link` (`admin_id`, `link_id`) VALUES
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 16),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 27),
(1, 28),
(1, 29);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `parent_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'عصائر', NULL, '2018-03-01 14:11:46', 1, '2021-07-28 11:11:26', 1),
(2, 'شيبس', NULL, '2018-03-01 14:33:38', 1, '2021-07-28 11:11:08', 1),
(3, 'سكاكر', NULL, '2018-03-01 14:33:41', 1, '2021-07-28 11:11:53', 1),
(4, 'مشروبات غازية', NULL, '2018-03-01 14:33:53', 1, '2021-07-28 11:12:27', 1),
(5, 'بسكويت', NULL, '2018-03-01 14:33:57', 1, '2021-07-27 10:06:43', 1),
(6, 'مثلجات', NULL, '2018-03-01 14:34:04', 1, '2021-07-28 11:12:39', 1),
(7, 'شوكولاتة', NULL, '2018-03-01 14:34:08', 1, '2021-07-28 11:11:37', 1),
(8, 'مواد تنضيف', NULL, '2019-08-29 09:22:29', 1, '2019-08-29 09:22:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_type_id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `mobile`, `phone`, `address`, `email`, `customer_type_id`, `account_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'نور أبو حصيرة', '0599414141', '21355555', 'غزة', 'noor@aa.com', 1, 9, '2018-03-11 13:59:55', 1, '2018-03-11 13:59:55', NULL),
(2, 'محمد', '0599858585', '2828444', 'غزة', 'mhd@aa.com', 1, 10, '2018-03-11 14:00:32', 1, '2018-03-11 14:00:32', NULL),
(3, 'سليم', '0598884050', '2828664', 'غزة', 'sal@aa.com', 2, 11, '2018-03-11 14:01:15', 1, '2018-03-11 14:01:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_type`
--

CREATE TABLE `customer_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_type`
--

INSERT INTO `customer_type` (`id`, `name`) VALUES
(1, 'تاجر'),
(2, 'زبون');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `sell_price` float NOT NULL,
  `buy_price` float NOT NULL,
  `created_at` datetime NOT NULL,
  `balance` float NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `category_id`, `unit_id`, `sell_price`, `buy_price`, `created_at`, `balance`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'المراعي', 1, 1, 1, 2, '2018-03-01 00:00:00', 1, '2021-07-28 11:14:11', 1, 1),
(2, 'فانيليا', 6, 1, 10, 12, '2018-03-06 13:25:14', 0, '2021-07-28 11:13:29', 1, 1),
(3, 'معطر غسيل', 8, 1, 10, 12, '2018-03-11 14:53:45', 0, '2021-07-28 11:15:58', 1, 1),
(4, 'دوريتوس', 2, 1, 2, 3, '2018-03-11 14:54:12', 0, '2021-07-28 11:14:40', 1, 1),
(5, 'تويكس', 7, 1, 1, 1, '2018-03-11 14:54:28', 0, '2021-07-28 11:15:28', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE `link` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `icon` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_in_menu` tinyint(1) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `link`
--

INSERT INTO `link` (`id`, `title`, `url`, `parent_id`, `icon`, `show_in_menu`, `order_id`) VALUES
(1, 'الاصناف', '', 0, 'icon-list', 1, 1),
(2, 'ادارة التصنيفات', '/category', 1, 'fa fa-list', 1, 1),
(3, 'ادارة الاصناف', '/item', 1, 'icon-list', 1, 1),
(4, 'اضافة صنف جديد', '/item/create', 1, 'icon-plus', 1, 1),
(5, 'الزبائن', NULL, 0, 'icon-users', 1, 1),
(6, 'ادارة الزبائن', '/customer', 5, 'fa fa-list', 1, 1),
(7, 'اضافة زبون جديد', '/customer/create', 5, 'fa fa-plus', 1, 1),
(8, 'الحسابات', NULL, 0, 'fa fa-tv', 1, 1),
(9, 'الحسابات', '/account', 8, 'fa fa-list', 1, 1),
(10, 'اضافة حساب جديد', '/account/create', 8, 'fa fa-plus', 1, 1),
(11, 'العمليات', NULL, 0, 'fa fa-ticket', 1, 1),
(12, 'المشتريات', '/operation?type_id=2', 11, 'fa fa-list', 1, 1),
(13, 'مردود المشتريات', '/operation?type_id=4', 11, 'fa fa-list', 1, 1),
(14, 'المبيعات', '/operation?type_id=1', 11, 'fa fa-list', 1, 1),
(15, 'مردود المبيعات', '/operation?type_id=3', 11, 'fa fa-list', 1, 1),
(16, 'القيود', NULL, 0, 'icon-user', 1, 1),
(17, 'ادارة القيود', '/voucher', 16, 'icon-list', 1, 1),
(18, 'اضافة قيد جديد', '/voucher/create', 16, 'icon-plus', 1, 1),
(19, 'التقارير', NULL, 0, 'fa fa-file', 1, 1),
(20, 'تقرير الاستاذ', '/report/ledger', 19, 'fa fa-list', 1, 1),
(21, 'تقرير الاصناف', 'report/item', 19, 'fa fa-list', 1, 1),
(22, 'تقرير الزبائن', '/report/customer', 19, 'fa fa-list', 1, 1),
(23, 'تقرير القيود', '/report/voucher', 19, 'fa fa-list', 1, 1),
(24, 'المستخدمون', NULL, 0, 'fa fa-user', 1, 20),
(25, 'ادارة المستخدمين', '/admin', 24, 'fa fa-list', 1, 1),
(26, 'اضافة مستخدم', '/admin/create', 24, 'fa fa-plus', 1, 1),
(27, 'السندات', '#', 0, 'fa fa-list', 1, 1),
(28, 'عرض السندات', '/payment', 27, 'fa fa-list', 1, 1),
(29, 'اضافة سند', '/payment/create', 27, 'fa fa-plus', 1, 1);

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
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `operation`
--

CREATE TABLE `operation` (
  `id` int(11) NOT NULL,
  `serial` int(11) DEFAULT '0',
  `operation_type_id` int(11) DEFAULT NULL,
  `operation_date` datetime DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT '0',
  `price` float DEFAULT '0',
  `discount` float DEFAULT '0',
  `amount` float DEFAULT '0',
  `description` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operation`
--

INSERT INTO `operation` (`id`, `serial`, `operation_type_id`, `operation_date`, `account_id`, `customer_id`, `price`, `discount`, `amount`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(38, 0, 2, '2018-03-16 00:00:00', 9, 0, 29000, 444, 28556, NULL, 1, '2018-03-23 22:22:32', '2018-03-23 22:22:32'),
(39, 0, 2, '2018-03-24 00:00:00', 9, 0, 1000, 450, 550, NULL, 1, '2018-03-24 17:06:15', '2018-03-24 17:06:16'),
(40, 0, 1, '2018-03-24 00:00:00', 11, 0, 12000, 100, 11900, NULL, 1, '2018-03-24 17:54:12', '2018-03-24 17:54:12'),
(41, 0, 2, '2018-03-24 00:00:00', 9, 0, 110000, 500, 109500, NULL, 1, '2018-03-24 18:33:12', '2018-03-24 18:33:12'),
(42, 0, 2, '2018-03-24 00:00:00', 9, 0, 0, 5000, 0, 'لا يوجد', 1, '2018-03-24 19:51:52', '2018-03-24 19:51:52'),
(43, 0, 2, '2018-03-24 00:00:00', 9, 0, 0, 5000, 0, 'لا يوجد', 1, '2018-03-24 19:53:37', '2018-03-24 19:53:37'),
(44, 0, 2, '2018-03-24 00:00:00', 9, 0, 0, 5000, 0, 'لا يوجد', 1, '2018-03-24 19:55:17', '2018-03-24 19:55:17'),
(45, 0, 2, '2018-03-24 00:00:00', 9, 0, 900, 5000, -4100, 'لا يوجد', 1, '2018-03-24 19:57:53', '2018-03-24 19:57:53'),
(46, 0, 1, '2018-03-24 00:00:00', 11, 0, 120000, 100, 119900, NULL, 1, '2018-03-24 20:01:09', '2018-03-24 20:01:09'),
(47, 0, 2, '2018-03-24 00:00:00', 9, 0, 55000, 500, 54500, NULL, 1, '2018-03-24 20:06:11', '2018-03-24 20:06:11'),
(48, 0, 1, '2018-03-25 00:00:00', 11, 0, 70240, 3500, 66740, NULL, 1, '2018-03-25 12:48:23', '2018-03-25 12:48:23'),
(49, 0, 2, '2018-03-25 00:00:00', 9, 0, 0, 500, 0, NULL, 1, '2018-03-25 12:52:35', '2018-03-25 12:52:35'),
(50, 0, 2, '2018-03-25 00:00:00', 9, 0, 0, 500, 0, NULL, 1, '2018-03-25 12:53:34', '2018-03-25 12:53:34'),
(51, 0, 2, '2018-03-25 00:00:00', 9, 0, 0, 500, 0, NULL, 1, '2018-03-25 12:53:53', '2018-03-25 12:53:53'),
(52, 0, 2, '2018-03-25 00:00:00', 9, 0, 33000, 500, 32500, NULL, 1, '2018-03-25 12:54:16', '2018-03-25 12:54:17'),
(53, 0, 2, '2018-03-14 00:00:00', 10, 0, 60000, 2000, 58000, NULL, 1, '2018-03-25 12:55:05', '2018-03-25 12:55:05'),
(54, 0, 1, '2018-03-18 00:00:00', 11, 0, 35000, 100, 34900, NULL, 1, '2018-03-25 12:55:48', '2018-03-25 12:55:48'),
(55, 0, 2, '2019-07-23 00:00:00', 10, 0, 92900, 100, 92800, NULL, 1, '2019-07-23 09:57:38', '2019-07-23 09:57:38'),
(56, 0, 1, '2021-07-28 00:00:00', 11, 0, 100, NULL, 100, NULL, 1, '2021-07-28 11:20:57', '2021-07-28 11:20:57');

--
-- Triggers `operation`
--
DELIMITER $$
CREATE TRIGGER `operation_ains` AFTER UPDATE ON `operation` FOR EACH ROW begin
	declare lvoucher_no,ldiscount_account,loperation_factor,laccount_id,laccount_type bigint;
	declare loperation_factor_type int;
	declare ldescription,laccount_name varchar(50);
	select name,account_id,discount_account,operation_factor into ldescription,laccount_id,ldiscount_account,loperation_factor from operation_type where id=new.operation_type_id ;
    
    select name into laccount_name from account where id=new.account_id;
    
	insert into voucher (description,voucher_date,vouture_value) values (concat(ldescription, ' - ', laccount_name ) ,new.operation_date,new.`price`);
	set lvoucher_no = last_insert_id();
	
	set loperation_factor_type = (loperation_factor+3)/2;
	
	if new.price > 0 then
		INSERT INTO `account_transaction` (`account_id`, `voucher_id`, `account_transaction_type_id`, `description`, `amount`, `created_at`) VALUES
		( laccount_id, lvoucher_no, loperation_factor_type, ldescription, new.price, new.operation_date);
	end if;

	set loperation_factor_type = (loperation_factor*-1+3)/2;
	if new.discount > 0 then
		INSERT INTO `account_transaction` (`account_id`, `voucher_id`, `account_transaction_type_id`, `description`, `amount`, `created_at`) VALUES
		( ldiscount_account, lvoucher_no, loperation_factor_type, ldescription, new.discount, new.operation_date);
	end if;
	if new.amount > 0 then
    
		INSERT INTO `account_transaction` (`account_id`, `voucher_id`, `account_transaction_type_id`, `description`, `amount`, `created_at`) VALUES
		( new.account_id, lvoucher_no, loperation_factor_type, ldescription, new.amount, new.operation_date);
	end if;
	
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `operation_details`
--

CREATE TABLE `operation_details` (
  `id` int(11) NOT NULL,
  `operation_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `quantity` float NOT NULL,
  `unit_price` float NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `amount` float NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operation_details`
--

INSERT INTO `operation_details` (`id`, `operation_id`, `item_id`, `unit_id`, `quantity`, `unit_price`, `price`, `discount`, `amount`, `created_at`, `updated_at`) VALUES
(5, 5, 1, 1, 2, 30000, 60000, 500, 59500, '2018-03-13 14:32:54', '2018-03-13 14:32:54'),
(6, 5, 3, 3, 1000, 10, 10000, 500, 9500, '2018-03-13 14:32:54', '2018-03-13 14:32:54'),
(7, 6, 1, 1, 20, 30000, 600000, 30, 599970, '2018-03-13 14:41:06', '2018-03-13 14:41:06'),
(8, 7, 1, 1, 2, 30000, 60000, 500, 59500, '2018-03-14 20:58:59', '2018-03-14 20:58:59'),
(9, 7, 2, 1, 12, 1100, 13200, 200, 13000, '2018-03-14 20:58:59', '2018-03-14 20:58:59'),
(10, 11, 2, 1, 100, 1100, 110000, 1000, 109000, '2018-03-23 09:09:45', '2018-03-23 09:09:45'),
(11, 11, 3, 3, 100, 10, 1000, 10, 990, '2018-03-23 09:09:45', '2018-03-23 09:09:45'),
(12, 12, 3, 3, 80, 10, 800, 10, 790, '2018-03-23 09:14:03', '2018-03-23 09:14:03'),
(13, 13, 2, 1, 10, 1100, 11000, 20, 10980, '2018-03-23 09:24:02', '2018-03-23 09:24:02'),
(14, 15, 2, 1, 10, 1100, 11000, 10, 10990, '2018-03-23 12:01:11', '2018-03-23 12:01:11'),
(15, 16, 3, 3, 100, 12, 1200, 0, 1200, '2018-03-23 12:04:56', '2018-03-23 12:04:56'),
(16, 18, 2, 1, 10, 1100, 11000, 100, 10900, '2018-03-23 12:21:04', '2018-03-23 12:21:04'),
(17, 19, 2, 1, 10, 1100, 11000, 1000, 10000, '2018-03-23 12:23:11', '2018-03-23 12:23:11'),
(18, 21, 3, 3, 10, 10, 100, 10, 90, '2018-03-23 12:26:41', '2018-03-23 12:26:41'),
(19, 22, 2, 1, 10, 1200, 12000, 0, 12000, '2018-03-23 12:28:49', '2018-03-23 12:28:49'),
(20, 23, 2, 1, 100, 1100, 110000, 0, 110000, '2018-03-23 12:34:51', '2018-03-23 12:34:51'),
(21, 24, 4, 4, 1000, 2, 2000, 50, 1950, '2018-03-23 20:29:00', '2018-03-23 20:29:00'),
(22, 27, 3, 3, 100, 10, 1000, 0, 1000, '2018-03-23 20:38:13', '2018-03-23 20:38:13'),
(23, 28, 3, 3, 100, 10, 1000, 0, 1000, '2018-03-23 20:40:04', '2018-03-23 20:40:04'),
(24, 30, 1, 1, 1, 35000, 35000, 0, 35000, '2018-03-23 21:17:38', '2018-03-23 21:17:38'),
(25, 34, 3, 3, 44, 10, 440, 0, 440, '2018-03-23 21:49:16', '2018-03-23 21:49:16'),
(26, 37, 3, 3, 14, 12, 168, 0, 168, '2018-03-23 22:12:37', '2018-03-23 22:12:37'),
(27, 38, 1, 1, 1, 30000, 30000, 1000, 29000, '2018-03-23 22:22:32', '2018-03-23 22:22:32'),
(28, 39, 3, 3, 100, 10, 1000, 0, 1000, '2018-03-24 17:06:16', '2018-03-24 17:06:16'),
(29, 40, 2, 1, 10, 1200, 12000, 0, 12000, '2018-03-24 17:54:12', '2018-03-24 17:54:12'),
(30, 41, 2, 1, 100, 1100, 110000, 0, 110000, '2018-03-24 18:33:12', '2018-03-24 18:33:12'),
(31, 42, 3, 3, 100, 10, 1000, 100, 900, '2018-03-24 19:51:52', '2018-03-24 19:51:52'),
(32, 43, 3, 3, 100, 10, 1000, 100, 900, '2018-03-24 19:53:37', '2018-03-24 19:53:37'),
(33, 44, 3, 3, 100, 10, 1000, 100, 900, '2018-03-24 19:55:17', '2018-03-24 19:55:17'),
(34, 45, 3, 3, 100, 10, 1000, 100, 900, '2018-03-24 19:57:53', '2018-03-24 19:57:53'),
(35, 46, 2, 1, 100, 1200, 120000, 0, 120000, '2018-03-24 20:01:09', '2018-03-24 20:01:09'),
(36, 47, 2, 1, 50, 1100, 55000, 0, 55000, '2018-03-24 20:06:11', '2018-03-24 20:06:11'),
(37, 48, 1, 1, 2, 35000, 70000, 0, 70000, '2018-03-25 12:48:23', '2018-03-25 12:48:23'),
(38, 48, 3, 3, 20, 12, 240, 0, 240, '2018-03-25 12:48:23', '2018-03-25 12:48:23'),
(39, 49, 2, 1, 30, 1100, 33000, 0, 33000, '2018-03-25 12:52:35', '2018-03-25 12:52:35'),
(40, 50, 2, 1, 30, 1100, 33000, 0, 33000, '2018-03-25 12:53:34', '2018-03-25 12:53:34'),
(41, 51, 2, 1, 30, 1100, 33000, 0, 33000, '2018-03-25 12:53:53', '2018-03-25 12:53:53'),
(42, 52, 2, 1, 30, 1100, 33000, 0, 33000, '2018-03-25 12:54:17', '2018-03-25 12:54:17'),
(43, 53, 1, 1, 2, 30000, 60000, 0, 60000, '2018-03-25 12:55:05', '2018-03-25 12:55:05'),
(44, 54, 1, 1, 1, 35000, 35000, 0, 35000, '2018-03-25 12:55:48', '2018-03-25 12:55:48'),
(45, 55, 1, 1, 2, 30000, 60000, 0, 60000, '2019-07-23 09:57:38', '2019-07-23 09:57:38'),
(46, 55, 2, 1, 30, 1100, 33000, 100, 32900, '2019-07-23 09:57:38', '2019-07-23 09:57:38'),
(47, 56, 1, 1, 20, 2, 40, 0, 40, '2021-07-28 11:20:57', '2021-07-28 11:20:57'),
(48, 56, 4, 1, 10, 3, 30, 0, 30, '2021-07-28 11:20:57', '2021-07-28 11:20:57'),
(49, 56, 5, 1, 30, 1, 30, 0, 30, '2021-07-28 11:20:57', '2021-07-28 11:20:57');

-- --------------------------------------------------------

--
-- Table structure for table `operation_type`
--

CREATE TABLE `operation_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_id` int(11) NOT NULL DEFAULT '0',
  `discount_account` bigint(20) NOT NULL DEFAULT '0',
  `operation_factor` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operation_type`
--

INSERT INTO `operation_type` (`id`, `name`, `account_id`, `discount_account`, `operation_factor`) VALUES
(1, 'مبيعات', 2, 8, -1),
(2, 'مشتريات', 3, 7, 1),
(3, 'مردود مبيعات', 4, 0, 1),
(4, 'مردود مشتريات', 5, 0, -1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('noorabohasira@gmail.com', '$2y$10$y2qLiIsUqCgppc9H1LToPeLV1jq0LO0.c9JtJdDZemD/p1OV7ncC2', '2019-08-18 08:14:01'),
('noor@gmail.com', '$2y$10$Mk87dbP2/xMp7DmaO5Q1dOIXnrCaHqjFl67JS9PmPYa8e3Nw2WqNe', '2021-07-27 07:41:18');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `value_type_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `serial` int(11) DEFAULT NULL,
  `comment` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `account_id`, `value`, `value_type_id`, `created_by`, `created_at`, `updated_by`, `updated_at`, `serial`, `comment`) VALUES
(1, 11, 250, 1, 1, '2018-03-25 13:40:36', NULL, '2018-03-25 13:40:36', 1, NULL),
(2, 11, 200, 1, 1, '2018-03-25 13:54:12', NULL, '2018-03-25 13:54:12', 1, NULL),
(3, 11, 2000, 1, 1, '2018-03-25 13:57:44', NULL, '2018-03-25 13:57:44', 3, NULL),
(4, 11, 9540, 1, 1, '2018-03-25 13:58:51', NULL, '2018-03-25 13:58:51', 4, NULL),
(5, 9, 7000, 2, 1, '2018-03-25 13:59:25', NULL, '2018-03-25 13:59:25', 1, NULL),
(6, 9, 10000, 2, 1, '2018-03-25 14:02:27', NULL, '2018-03-25 14:02:27', 2, NULL),
(7, 11, 10000, 1, 1, '2018-03-25 14:03:01', NULL, '2018-03-25 14:03:01', 5, NULL),
(8, 9, 8000, 2, 1, '2018-03-25 14:03:29', NULL, '2018-03-25 14:03:29', 3, NULL),
(9, 11, 100, 2, 1, '2021-07-27 10:18:08', NULL, '2021-07-27 10:18:08', 5, NULL),
(10, 11, 300, 1, 1, '2021-07-28 11:22:34', NULL, '2021-07-28 11:22:34', 30, NULL);

--
-- Triggers `payment`
--
DELIMITER $$
CREATE TRIGGER `payment_insert` AFTER INSERT ON `payment` FOR EACH ROW begin
	declare lvoucher_no,loperation_factor,laccount_id bigint;
	declare loperation_factor_type int;
	declare ldescription,laccount_name varchar(50);
	
    
    select name into ldescription from payment_value_type where id=new.value_type_id;
    
    select name into laccount_name from account where id=new.account_id;
    
	insert into voucher (description,voucher_date,vouture_value) values (concat(ldescription, ' - ', laccount_name ) ,new.created_at,new.`value`);
	set lvoucher_no = last_insert_id();
	
	set loperation_factor_type = (new.value_type_id-3)/2;
    /*if new.value_type_id=1 THEN
    set loperation_factor=1;
    ELSE
    set loperation_factor=-1;
    END IF;*/
	
		INSERT INTO `account_transaction` (`account_id`, `voucher_id`, `account_transaction_type_id`, `description`, `amount`, `created_at`) VALUES
		( new.account_id, lvoucher_no, New.value_type_id, ldescription, new.value, new.created_at);

	
		INSERT INTO `account_transaction` (`account_id`, `voucher_id`, `account_transaction_type_id`, `description`, `amount`, `created_at`) VALUES
		( 1, lvoucher_no, 3-New.value_type_id, ldescription, new.value, new.created_at);
	
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `payment_value_type`
--

CREATE TABLE `payment_value_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_value_type`
--

INSERT INTO `payment_value_type` (`id`, `name`) VALUES
(1, 'سند قبض'),
(2, 'سند صرف');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `name`) VALUES
(1, 'وحدة'),
(2, 'غرام'),
(3, 'لتر'),
(4, 'متر');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `api_token`, `created_at`, `updated_at`) VALUES
(1, 'نور', 'noor@gmail.com', '$2y$10$8c..768dbsKQCV5VzxJPfOyrYSvzgk4zxWWItSQsU4rhNmrxKlWcG', '9GGvAa060Mf8YaIgn7wspsPDD5tFRjKJWTXtEKMUoVi5yEoZ47Vghmt8XKae', 'QRvSSsEtSgeSz8NjS0ZFkdlrSOX29cXjGFYqgNTAAdwsWvpjYzWRRsahWvLPMDcLE0Pxvfmlbmsgpy1brUC2wHSitWte0GbqA9qc', '2019-08-03 06:36:19', '2021-07-27 07:20:24'),
(2, 'نور ابو حصيرة', 'noorabohasira@gmail.com', '$2y$10$YKPPy7k5zuJUPukCn0RO4OZIpcwgxKs1GLwxEzVXs1dF5he6Wvi1e', 'MGuZzKp8VFiOh9nROHTfrpj26t7EF3j4lBi26v4uHAi8zINkcc5Or3luqTmM', NULL, '2019-08-18 08:13:00', '2019-08-18 08:13:00'),
(3, 'admin', 'admin@gmail.com', '$2y$10$LPOHNHA5NcHHOSAt1u3X0.xBYPSwC9SJzojC/qcMugfYcxK5tqRsy', 'aEthq0u0ogJ5EMuGC8JdPS1QUAPDaz95KnGsr3bWO0WHAyKuXn8cjfdfrQaB', NULL, '2021-07-27 07:20:05', '2021-07-27 07:20:05');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id` int(11) NOT NULL,
  `description` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vouture_value` float DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `voucher_date` datetime DEFAULT NULL,
  `test` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`id`, `description`, `vouture_value`, `created_at`, `created_by`, `voucher_date`, `test`) VALUES
(29, 'مبيعات', 10000, '2018-03-24 00:21:44', 0, '2018-03-23 00:00:00', '10000'),
(30, 'مبيعات', 10000, '2018-03-24 00:31:16', 0, '2018-03-23 00:00:00', '10000'),
(31, 'مبيعات', 10000, '2018-03-24 00:31:53', 0, '2018-03-23 00:00:00', '10000'),
(32, 'مشتريات', 0, '2018-03-24 00:49:16', 0, '2018-03-22 00:00:00', '0'),
(33, 'مبيعات', 10000, '2018-03-24 00:52:35', 0, '2018-03-23 00:00:00', '10000'),
(34, 'مشتريات', 99999, '2018-03-24 01:05:50', 0, '2018-03-23 00:00:00', '99999'),
(35, 'مبيعات', 0, '2018-03-24 01:12:37', 0, '2018-03-23 00:00:00', '0'),
(36, 'مشتريات', 0, '2018-03-24 01:22:32', 0, '2018-03-16 00:00:00', '0'),
(37, 'مشتريات', 0, '2018-03-24 20:06:15', 0, '2018-03-24 00:00:00', '0'),
(38, 'مبيعات', 0, '2018-03-24 20:54:12', 0, '2018-03-24 00:00:00', '0'),
(39, 'مشتريات', 110000, '2018-03-24 21:33:12', 0, '2018-03-24 00:00:00', '110000'),
(43, 'مشتريات', 900, '2018-03-24 22:57:53', 0, '2018-03-24 00:00:00', '900'),
(44, 'مبيعات', 120000, '2018-03-24 23:01:09', 0, '2018-03-24 00:00:00', '120000'),
(45, 'مشتريات', 55000, '2018-03-24 23:06:11', 0, '2018-03-24 00:00:00', '55000'),
(46, 'مبيعات', 70240, '2018-03-25 15:48:23', 0, '2018-03-25 00:00:00', '70240'),
(47, 'مشترياتالمشتريات', 33000, '2018-03-25 15:54:17', 0, '2018-03-25 00:00:00', NULL),
(48, 'مشتريات - المشتريات', 60000, '2018-03-25 15:55:05', 0, '2018-03-14 00:00:00', NULL),
(59, 'مبيعات - سليم', 100, '2021-07-28 14:20:57', 0, '2021-07-28 00:00:00', NULL),
(60, 'سند قبض - سليم', 300, '2021-07-28 14:22:34', 0, '2021-07-28 11:22:34', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `number` (`number`);

--
-- Indexes for table `account_route`
--
ALTER TABLE `account_route`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_transaction`
--
ALTER TABLE `account_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_transaction_type`
--
ALTER TABLE `account_transaction_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_type`
--
ALTER TABLE `account_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_type`
--
ALTER TABLE `customer_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operation`
--
ALTER TABLE `operation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operation_details`
--
ALTER TABLE `operation_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operation_type`
--
ALTER TABLE `operation_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_value_type`
--
ALTER TABLE `payment_value_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `account_route`
--
ALTER TABLE `account_route`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `account_transaction`
--
ALTER TABLE `account_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `account_transaction_type`
--
ALTER TABLE `account_transaction_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `account_type`
--
ALTER TABLE `account_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_type`
--
ALTER TABLE `customer_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `link`
--
ALTER TABLE `link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `operation`
--
ALTER TABLE `operation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `operation_details`
--
ALTER TABLE `operation_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `operation_type`
--
ALTER TABLE `operation_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payment_value_type`
--
ALTER TABLE `payment_value_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

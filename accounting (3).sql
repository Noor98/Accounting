-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2018 at 04:52 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

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
(1, 1, 'الصندوق', 0, 0, 1, 4, '2018-03-11 00:00:00', NULL, 1, NULL),
(2, 2, 'المبيعات', NULL, 0, 1, 2, '2018-03-11 13:55:25', '2018-03-11 13:55:25', 1, NULL),
(3, 3, 'المشتريات', NULL, 0, 2, 2, '2018-03-11 13:55:50', '2018-03-11 13:55:50', 1, NULL),
(4, 4, 'مردود المبيعات', NULL, 0, 2, 2, '2018-03-11 13:56:30', '2018-03-11 13:56:30', 1, NULL),
(5, 5, 'مردود المشتريات', NULL, 0, 1, 2, '2018-03-11 13:56:49', '2018-03-11 13:56:49', 1, NULL),
(6, 6, 'الذمم المالية', NULL, 0, 3, 4, '2018-03-11 13:58:09', '2018-03-11 13:58:09', 1, NULL),
(7, 7, 'خصم مكتسب', NULL, 0, 1, 2, '2018-03-11 13:58:52', '2018-03-11 13:58:52', 1, NULL),
(8, 8, 'خصم مسموح به', NULL, 0, 2, 2, '2018-03-11 13:59:09', '2018-03-11 13:59:09', 1, NULL),
(9, 100001, 'نعيم الحسنات (ابو أحمد)', 0, 0, 1, 4, '2018-03-11 13:59:55', '2018-03-11 13:59:55', 1, NULL),
(10, 100002, 'محمد الداوودي (ابو يزن)', 0, 0, 1, 4, '2018-03-11 14:00:32', '2018-03-11 14:00:32', 1, NULL),
(11, 200003, 'محمد سعدي الاغا', 0, 0, 2, 4, '2018-03-11 14:01:15', '2018-03-11 14:01:15', 1, NULL);

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
  `account_id` int(11) NOT NULL,
  `voucher_id` int(11) NOT NULL,
  `account_transaction_type_id` int(11) NOT NULL,
  `description` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` float NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_transaction`
--

INSERT INTO `account_transaction` (`id`, `account_id`, `voucher_id`, `account_transaction_type_id`, `description`, `amount`, `created_at`, `updated_at`) VALUES
(4, 1, 5, 1, '20', 500, '2018-03-20 14:24:32', '2018-03-20 14:24:32'),
(5, 2, 5, 2, '20', 499, '2018-03-20 14:24:32', '2018-03-20 14:24:32'),
(6, 7, 5, 2, '13', 1, '2018-03-20 14:24:33', '2018-03-20 14:24:33'),
(7, 2, 6, 1, '20', 500, '2018-03-20 14:25:43', '2018-03-20 14:25:43'),
(8, 3, 6, 2, '20', 500, '2018-03-20 14:25:43', '2018-03-20 14:25:43');

-- --------------------------------------------------------

--
-- Table structure for table `account_transaction_type`
--

CREATE TABLE `account_transaction_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_transaction_type`
--

INSERT INTO `account_transaction_type` (`id`, `name`) VALUES
(1, 'دائن'),
(2, 'مدين');

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
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `phone`, `active`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'باسل محمد', 'basel1090@yahoo.com', '0599888877', 1, '2018-03-06 13:39:59', 1, '2018-03-06 13:47:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_link`
--

CREATE TABLE `admin_link` (
  `admin_id` int(11) NOT NULL,
  `link_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'ساعات', NULL, '2018-03-01 14:11:46', 1, '2018-03-01 14:11:46', NULL),
(2, 'جوالات', NULL, '2018-03-01 14:33:38', 1, '2018-03-01 14:33:38', NULL),
(3, 'عطور', NULL, '2018-03-01 14:33:41', 1, '2018-03-01 14:33:41', NULL),
(4, 'غسالات', NULL, '2018-03-01 14:33:53', 1, '2018-03-01 14:33:53', NULL),
(5, 'ثلاجات', NULL, '2018-03-01 14:33:57', 1, '2018-03-04 14:07:58', 1),
(6, 'قطع غيار', NULL, '2018-03-01 14:34:04', 1, '2018-03-01 14:34:04', NULL),
(7, 'سيارات', NULL, '2018-03-01 14:34:08', 1, '2018-03-01 14:34:08', NULL);

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
(1, 'نعيم الحسنات (ابو أحمد)', '0599414141', '21355555', 'غزة', 'naeem@aa.com', 1, 9, '2018-03-11 13:59:55', 1, '2018-03-11 13:59:55', NULL),
(2, 'محمد الداوودي (ابو يزن)', '0599858585', '2828444', 'غزة', 'mhd@aa.com', 1, 10, '2018-03-11 14:00:32', 1, '2018-03-11 14:00:32', NULL),
(3, 'محمد سعدي الاغا', '0598884050', '2828664', 'غزة', 'mhd7@aa.com', 2, 11, '2018-03-11 14:01:15', 1, '2018-03-11 14:01:15', NULL);

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
(1, 'Rolex', 1, 1, 30000, 35000, '2018-03-01 00:00:00', 1, '2018-03-06 13:26:17', 1, 1),
(2, 'hp Pro Book', 6, 1, 1100, 1200, '2018-03-06 13:25:14', 0, '2018-03-06 13:25:55', 1, 1),
(3, 'معطر غسيل', 3, 3, 10, 12, '2018-03-11 14:53:45', 0, '2018-03-11 14:53:45', 1, NULL),
(4, 'سلك 5041', 6, 4, 2, 3, '2018-03-11 14:54:12', 0, '2018-03-11 14:54:12', 1, NULL),
(5, 'غاز تكييف', 6, 2, 30, 35, '2018-03-11 14:54:28', 0, '2018-03-11 14:54:28', 1, NULL);

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
(24, 'المستخدمون', NULL, 0, 'fa fa-user', 1, 1),
(25, 'ادارة المستخدمين', '/admin', 24, 'fa fa-list', 1, 1),
(26, 'اضافة مستخدم', '/admin/create', 24, 'fa fa-plus', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `operation`
--

CREATE TABLE `operation` (
  `id` int(11) NOT NULL,
  `serial` int(11) DEFAULT NULL,
  `operation_type_id` int(11) NOT NULL,
  `operation_date` datetime NOT NULL,
  `account_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `discount` int(11) NOT NULL,
  `amount` float DEFAULT NULL,
  `description` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operation`
--

INSERT INTO `operation` (`id`, `serial`, `operation_type_id`, `operation_date`, `account_id`, `customer_id`, `price`, `discount`, `amount`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(5, NULL, 2, '2018-03-13 00:00:00', 9, NULL, 69000, 1000, 68000, 'لا يوجد :(', 1, '2018-03-13 14:32:54', '2018-03-13 14:32:54'),
(6, NULL, 2, '2018-03-06 00:00:00', 9, NULL, 599970, 20, 599950, NULL, 1, '2018-03-13 14:41:06', '2018-03-13 14:41:06'),
(7, NULL, 1, '2018-03-18 00:00:00', 11, NULL, 695000, 0, 695000, NULL, 1, '2018-03-18 13:47:49', '2018-03-18 13:47:50'),
(8, NULL, 3, '2018-03-18 00:00:00', 11, NULL, 175000, 0, 175000, NULL, 1, '2018-03-18 13:50:36', '2018-03-18 13:50:36');

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
(8, 7, 1, 1, 20, 35000, 700000, 5000, 695000, '2018-03-18 13:47:49', '2018-03-18 13:47:49'),
(9, 8, 1, 1, 5, 35000, 175000, 0, 175000, '2018-03-18 13:50:36', '2018-03-18 13:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `operation_type`
--

CREATE TABLE `operation_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operation_type`
--

INSERT INTO `operation_type` (`id`, `name`) VALUES
(1, 'مبيعات'),
(2, 'مشتريات'),
(3, 'مردود مبيعات'),
(4, 'مردود مشتريات');

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
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id` int(11) NOT NULL,
  `description` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voucher_date` date NOT NULL,
  `value` float NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`id`, `description`, `voucher_date`, `value`, `created_at`, `created_by`, `updated_at`) VALUES
(5, '445654', '2018-03-20', 500, '2018-03-20 14:24:32', 1, '2018-03-20 14:24:32'),
(6, 'تجريب آخر', '2018-03-01', 500, '2018-03-20 14:25:43', 1, '2018-03-20 14:25:43');

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
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `account_transaction_type`
--
ALTER TABLE `account_transaction_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `account_type`
--
ALTER TABLE `account_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `operation`
--
ALTER TABLE `operation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `operation_details`
--
ALTER TABLE `operation_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `operation_type`
--
ALTER TABLE `operation_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 22, 2023 at 03:43 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scm_kasongan`
--

-- --------------------------------------------------------

--
-- Table structure for table `catalogs`
--

CREATE TABLE `catalogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `unit_price` double NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catalog_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catalogs`
--

INSERT INTO `catalogs` (`id`, `product_name`, `stock`, `unit_price`, `image`, `description`, `status`, `catalog_category_id`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 'Vas Bunga', 23, 12000, '1699879740.jpg', 'Tesingg', '1', 1, 8, '2023-11-13 12:49:00', '2023-11-13 05:49:00'),
(5, 'Gelas Gerabah', 11, 11000, '1699285322.jpg', 'testing dec 4', '1', 1, 8, '2023-11-06 15:42:02', '2023-11-06 08:42:02'),
(6, 'Piring Gerabah', 100, 20000, '1699285375.jpg', 'Test desc 6', '1', 1, 8, '2023-11-06 15:42:55', '2023-11-06 08:42:55'),
(7, 'vas bunga batik', 12, 90000, '1699284226.png', 'vasbunga', '1', 1, 8, '2023-11-06 15:26:45', '2023-11-06 08:26:45'),
(8, 'testvasbunga3', 2000, 13000, '1699285434.webp', 'vasbunga batiks', '1', 1, 8, '2023-11-06 15:43:54', '2023-11-06 08:43:54'),
(9, 'Test4', 200, 15000, '1699874273.webp', 'test4 catalog', '1', 1, 8, '2023-11-13 04:17:53', '2023-11-13 04:17:53'),
(10, 'test piring', 120, 20000, '1699878189.jpg', 'piring cantik', '1', 1, 8, '2023-11-13 05:23:09', '2023-11-13 05:23:09'),
(11, 'test', 120, 20000, '1700377407.jpg', 'testing', '1', 1, 18, '2023-11-19 00:03:27', '2023-11-19 00:03:27');

-- --------------------------------------------------------

--
-- Table structure for table `catalog_categories`
--

CREATE TABLE `catalog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catalog_category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catalog_categories`
--

INSERT INTO `catalog_categories` (`id`, `catalog_category_name`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'category01', 8, NULL, '2023-11-13 04:40:49', NULL),
(2, 'category02', 8, NULL, '2023-11-13 04:40:55', NULL),
(3, 'kategori 3', 8, '2023-11-13 04:41:05', '2023-11-13 04:41:05', NULL),
(4, 'Category 1', 18, '2023-11-18 23:59:08', '2023-11-18 23:59:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `couriers`
--

CREATE TABLE `couriers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `courier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courier_address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `courier_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courier_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `couriers`
--

INSERT INTO `couriers` (`id`, `courier_name`, `courier_address`, `courier_phone`, `courier_email`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'kurir1', 'banguntapan bantul', '0123123123', 'kurir1@gmail.com', 8, '2023-10-26 06:29:42', '2023-10-26 06:29:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `catalog_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sales_order_id` bigint(20) UNSIGNED NOT NULL,
  `notif` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`id`, `user_id`, `catalog_id`, `quantity`, `price`, `note`, `sales_order_id`, `notif`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 8, 5, 6, 12000, '12000', 1, '0', '2023-10-31 11:27:55', '2023-11-01 06:05:35', NULL),
(6, 8, 4, 194, 12000, '12000', 1, '0', '2023-10-31 11:46:56', '2023-11-10 16:24:46', NULL),
(7, 8, 6, 2, 12000, '12000', 1, '0', '2023-10-31 11:53:42', '2023-11-01 05:58:44', NULL),
(8, 8, 7, 3, 12000, '12000', 1, '0', '2023-11-07 01:13:12', '2023-11-07 01:13:41', NULL),
(9, 8, 8, 4, 12000, '12000', 1, '0', '2023-11-07 01:14:37', '2023-11-07 01:14:48', NULL),
(10, 19, 4, 177, 12000, '12000', 1, '1', '2023-11-10 16:32:21', '2023-11-10 17:29:08', NULL),
(11, 19, 5, 26, 12000, '12000', 1, '1', '2023-11-10 16:41:01', '2023-11-10 17:37:41', NULL),
(12, 19, 6, 1, 12000, '12000', 1, '1', '2023-11-10 16:45:20', '2023-11-10 16:45:20', NULL),
(13, 19, 7, 178, 12000, '12000', 1, '1', '2023-11-10 16:45:55', '2023-11-10 17:24:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_orders`
--

CREATE TABLE `delivery_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `delivery_date` date NOT NULL,
  `courier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` double(8,2) DEFAULT NULL,
  `weight` double(8,2) DEFAULT NULL,
  `sales_order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_orders`
--

INSERT INTO `delivery_orders` (`id`, `quantity`, `delivery_date`, `courier`, `status`, `description`, `height`, `weight`, `sales_order_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 2, '2023-10-03', '1', '1', 'descdeliv', 2.00, 2.00, 1, 8, '2023-10-26 06:42:59', '2023-10-26 07:09:40', NULL),
(5, 200, '2023-11-14', '1', '1', 'desc test', 20.00, 10.00, 1, 8, '2023-11-13 04:19:06', '2023-11-13 04:19:06', NULL),
(6, 12, '2023-11-14', '1', '1', 'tes', 3.00, 4.00, 7, 8, '2023-11-13 04:19:45', '2023-11-13 04:19:45', NULL),
(7, 100, '2023-11-19', '1', 'test', 'testing', 10.00, 10.00, 6, 18, '2023-11-19 00:06:57', '2023-11-19 00:06:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `material_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material_category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `material_name`, `stock`, `unit`, `price`, `description`, `status`, `material_category_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Tanah liat liatan', 666, 'kg', 75000, 'test pagi', 'UNSAFE', 1, 8, '2023-09-22 11:19:56', '2023-10-25 15:39:04', '2023-10-25 15:39:04'),
(2, 'Pigmen Warna', 50, 'ons', 10000, 'tes', 'UNSAFE', 1, 8, '2023-09-22 11:19:56', '2023-10-25 15:38:04', NULL),
(3, 'Roda Pahat', 10, 'buah', 20000, NULL, 'SAFE', 2, 2, '2023-09-22 11:19:56', NULL, NULL),
(4, 'tes2', 111, '22', 1000, 'hehe', 'SAFE', 1, 8, '2023-10-25 15:27:16', '2023-10-25 15:38:12', NULL),
(5, 'Kapak', 200, '123', 1000, 'hihi', 'SAFE', 2, 8, '2023-10-25 15:38:46', '2023-10-25 15:38:46', NULL),
(6, 'testmatrial', 12, 'buah', 23000, 'test material', 'SAFE', 1, 8, '2023-11-13 04:21:30', '2023-11-13 04:21:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `material_categories`
--

CREATE TABLE `material_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `material_category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `material_categories`
--

INSERT INTO `material_categories` (`id`, `material_category_name`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Bahan Mentah Banget', 8, '2023-09-22 11:19:56', '2023-10-25 16:26:55', '2023-10-25 16:26:55'),
(2, 'Peralatan', 8, '2023-09-22 11:19:56', '2023-10-29 14:12:52', NULL),
(3, 'Perkakas', 8, '2023-10-25 16:03:47', '2023-10-25 16:04:47', '2023-10-25 16:04:47'),
(4, 'Perkakas', 8, '2023-10-25 16:04:10', '2023-10-25 16:39:00', '2023-10-25 16:39:00'),
(5, 'Bahan Matang', 8, '2023-10-25 16:04:17', '2023-10-25 16:04:52', '2023-10-25 16:04:52'),
(6, 'haha', 8, '2023-10-25 16:39:05', '2023-10-25 16:39:05', NULL),
(7, 'material cat 1', 18, '2023-11-19 00:06:22', '2023-11-19 00:06:22', NULL);

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_09_05_085200_create_roles_table', 1),
(3, '2023_09_05_085239_create_users_table', 1),
(4, '2023_09_05_085322_create_suppliers_table', 1),
(5, '2023_09_05_085354_create_material_categories_table', 1),
(6, '2023_09_05_085423_create_materials_table', 1),
(7, '2023_09_05_085501_create_production_orders_table', 1),
(8, '2023_09_05_085559_create_catalog_categories_table', 1),
(9, '2023_09_05_085624_create_catalogs_table', 1),
(10, '2023_09_05_085719_create_production_items_table', 1),
(11, '2023_09_05_085747_create_production_item_materials_table', 1),
(12, '2023_09_05_085827_create_purchase_orders_table', 1),
(13, '2023_09_05_085905_create_purchase_materials_table', 1),
(14, '2023_09_05_085945_create_purchase_payments_table', 1),
(15, '2023_09_05_090032_create_couriers_table', 1),
(16, '2023_09_05_090115_create_sales_orders_table', 1),
(17, '2023_09_05_090203_create_sales_order_payments_table', 1),
(18, '2023_09_05_090252_create_customer_orders_table', 1),
(19, '2023_09_05_090420_create_delivery_orders_table', 1),
(20, '2014_10_12_100000_create_password_resets_table', 2);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `production_items`
--

CREATE TABLE `production_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` double NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `catalog_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `catalog_id` bigint(20) UNSIGNED DEFAULT NULL,
  `production_order_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `production_item_materials`
--

CREATE TABLE `production_item_materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `production_item_id` bigint(20) UNSIGNED NOT NULL,
  `material_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `production_orders`
--

CREATE TABLE `production_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_production` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `requester_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `production_orders`
--

INSERT INTO `production_orders` (`id`, `no_production`, `start_date`, `end_date`, `quantity`, `requester_name`, `description`, `status`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Test23', '2023-10-01', '2023-10-06', 100, 'bundling_test', 'Buncdling test2', '2', 8, NULL, '2023-11-13 04:10:57', NULL),
(3, 'Test 4', '2023-10-11', '2023-10-27', 7, 'Testing Rev 4', NULL, '1', 8, '2023-10-25 10:36:08', '2023-10-25 13:26:03', NULL),
(4, 'Test4', '2023-10-26', '2023-10-31', 300, 'Bundling 1', NULL, '1', 8, '2023-10-25 10:40:27', '2023-10-25 10:40:27', NULL),
(5, 'Test 7', '2023-10-26', '2023-11-11', 340, 'Testing 7', NULL, '2', 8, '2023-10-25 12:30:09', '2023-10-25 13:25:54', NULL),
(6, 'Test10', '2023-10-01', '2023-10-31', 800, 'Testing 10', NULL, '1', 8, '2023-10-25 12:33:24', '2023-10-25 12:33:24', NULL),
(7, '911', '2023-11-13', '2023-11-15', 12, 'test11', NULL, '1', 8, '2023-11-13 04:10:19', '2023-11-13 04:10:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_materials`
--

CREATE TABLE `purchase_materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `material_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` double NOT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_order_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders`
--

CREATE TABLE `purchase_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_purchase_invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_date` date NOT NULL,
  `receive_date` date DEFAULT NULL,
  `requester_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grand_total` double NOT NULL,
  `payment_total` double DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_orders`
--

INSERT INTO `purchase_orders` (`id`, `no_purchase_invoice`, `purchase_date`, `receive_date`, `requester_name`, `grand_total`, `payment_total`, `status`, `supplier_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, '01234', '2023-10-01', '2023-10-05', 'requester1', 10000, 10000, '1', 1, 8, '2023-10-27 10:16:42', '2023-10-27 10:20:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_payments`
--

CREATE TABLE `purchase_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_order_id` bigint(20) UNSIGNED NOT NULL,
  `payer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominal` double NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_date` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_payments`
--

INSERT INTO `purchase_payments` (`id`, `purchase_order_id`, `payer_name`, `nominal`, `payment_method`, `payment_date`, `status`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 3, 'payer12', 10000, 'BCA', '2023-10-02', '1', 8, '2023-10-27 10:31:04', '2023-10-27 10:31:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `level`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 1, 0, '2023-09-22 11:19:56', NULL, NULL),
(2, 'umkm', 2, 0, '2023-09-22 11:19:56', NULL, NULL),
(3, 'customer', 3, 0, '2023-09-22 11:19:56', NULL, NULL),
(5, 'distributor', 8, 8, '2023-11-22 07:23:31', '2023-11-22 07:25:57', '2023-11-22 07:25:57'),
(6, 'distributor', 5, 8, '2023-11-22 07:23:53', '2023-11-22 07:25:59', '2023-11-22 07:25:59');

-- --------------------------------------------------------

--
-- Table structure for table `sales_orders`
--

CREATE TABLE `sales_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_sale_invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_date` date NOT NULL,
  `due_date` date DEFAULT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `grand_total` double NOT NULL,
  `courier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_orders`
--

INSERT INTO `sales_orders` (`id`, `no_sale_invoice`, `invoice_date`, `due_date`, `customer_name`, `shipping_address`, `grand_total`, `courier_id`, `status`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '123-invoice', '2023-10-01', '2023-10-04', 'customer1', 'addres1', 123000, 1, '1', 8, '2023-10-26 06:40:58', '2023-10-26 06:41:11', NULL),
(4, 'inv-8-1699353842', '2023-11-07', NULL, 'akbar', 'Kulon Progo', 13000, NULL, '0', 8, '2023-11-07 03:44:02', '2023-11-07 03:44:02', NULL),
(5, 'inv-4-1699656429', '2023-11-10', NULL, 'test', 'test', 12000, NULL, '0', 19, '2023-11-10 15:47:09', '2023-11-10 15:47:09', NULL),
(6, 'inv-4-1699656721', '2023-11-10', NULL, 'testak', 'jalan asdasd', 12000, NULL, '0', 19, '2023-11-10 15:52:01', '2023-11-10 15:52:01', NULL),
(7, 'inv-5-1699664344', '2023-11-11', NULL, 'konsumns', '123', 55000, NULL, '0', 19, '2023-11-10 17:59:04', '2023-11-10 17:59:04', NULL),
(8, 'inv-5-1699871940', '2023-11-13', NULL, 'test', 'Jalan Cendrawasih 245', 55000, NULL, '0', 19, '2023-11-13 03:39:00', '2023-11-13 03:39:00', NULL),
(9, 'inv-5-1699872724', '2023-11-13', NULL, 'test', 'Jl. Gunda Wijaya, RT. 05 / RW. 03, Banjarejo, Kec. Blora, Kabupaten Blora, Jawa Tengah 58253', 55000, NULL, '0', 19, '2023-11-13 03:52:04', '2023-11-13 03:52:04', NULL),
(10, 'inv-5-1699872764', '2023-11-13', NULL, 'test', 'Jl. Gunda Wijaya, RT. 05 / RW. 03, Banjarejo, Kec. Blora, Kabupaten Blora, Jawa Tengah 58253', 55000, NULL, '0', 19, '2023-11-13 03:52:44', '2023-11-13 03:52:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales_order_payments`
--

CREATE TABLE `sales_order_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sales_order_id` bigint(20) UNSIGNED NOT NULL,
  `payer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominal` double NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_date` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_payments`
--

CREATE TABLE `sales_payments` (
  `id` int(11) NOT NULL,
  `sales_order_id` int(11) NOT NULL,
  `payer_name` varchar(255) NOT NULL,
  `nominal` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_payments`
--

INSERT INTO `sales_payments` (`id`, `sales_order_id`, `payer_name`, `nominal`, `payment_date`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'payer1', 10000, '2023-10-07', '2', 8, '2023-10-27 11:44:29', '2023-10-29 14:13:14');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `supplier_address`, `supplier_phone`, `supplier_email`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Vivid Suppier', 'banguntappan', '0120831023', 'vivi@gmail.com', 8, '2023-10-27 10:13:12', '2023-10-27 10:13:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rekening` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `remember_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `address`, `email`, `password`, `rekening`, `bank`, `role_id`, `user_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Gerabah Mbah Karyo', '0111111', 'Jalan maju', 'mbahkaryo@gmail.com', '$2y$10$Q8jmDAeDrDypa8iyTivQZO.eGbldpBKzmTakHOghD6hjGzi2aZWzG', NULL, 'BCA', 2, 8, NULL, NULL, '2023-11-22 07:08:31', NULL),
(3, 'Ahmad Hizbullah Akbar', NULL, NULL, 'ahmadhiz2000@gmail.com', '$2y$10$pff8lNPEq0rguxPm/gPN3O65RKuuSMctvguHcOqohrFGlOX.qPrsa', NULL, NULL, 3, 0, '0ineloJhbtFI1Jv4OzKDEXgIUnKl8W2w4J5A1RtwibsMTBas5KfVqDM35uC8', NULL, '2023-11-22 07:30:56', NULL),
(4, 'distributor1', NULL, NULL, 'distributor1@gmail.com', '$2y$10$Q8jmDAeDrDypa8iyTivQZO.eGbldpBKzmTakHOghD6hjGzi2aZWzG', NULL, NULL, 2, 0, NULL, '2023-09-22 22:15:37', '2023-11-18 04:12:58', '2023-11-18 04:12:58'),
(8, 'admin', '895613694343', 'Jl. Gunda Wijaya, RT. 05 / RW. 03, Banjarejo, Kec. Blora, Kabupaten Blora, Jawa Tengah 58253', 'admin@gmail.com', '$2y$10$Q8jmDAeDrDypa8iyTivQZO.eGbldpBKzmTakHOghD6hjGzi2aZWzG', '123123', 'BCA', 1, 0, NULL, '2023-09-23 01:29:51', '2023-11-22 07:18:58', NULL),
(9, 'konsumen1', NULL, NULL, 'konsumen1@gmail.com', '$2y$10$Q8jmDAeDrDypa8iyTivQZO.eGbldpBKzmTakHOghD6hjGzi2aZWzG', NULL, NULL, 3, 0, NULL, '2023-09-29 21:39:42', '2023-09-29 21:39:42', NULL),
(10, 'suplier1', NULL, NULL, 'suplier1@gmail.com', '$2y$10$Q8jmDAeDrDypa8iyTivQZO.eGbldpBKzmTakHOghD6hjGzi2aZWzG', NULL, NULL, 4, 0, NULL, '2023-09-29 21:44:12', '2023-09-29 21:44:12', NULL),
(11, 'suplier2', NULL, NULL, 'suplier2@gmail.com', '$2y$10$Q8jmDAeDrDypa8iyTivQZO.eGbldpBKzmTakHOghD6hjGzi2aZWzG', NULL, NULL, 4, 0, NULL, '2023-09-29 21:45:55', '2023-11-18 04:14:26', '2023-11-18 04:14:26'),
(12, 'suplier3', NULL, NULL, 'suplier3@gmail.com', '$2y$10$Q8jmDAeDrDypa8iyTivQZO.eGbldpBKzmTakHOghD6hjGzi2aZWzG', NULL, NULL, 4, 0, NULL, '2023-09-29 21:49:27', '2023-11-18 04:14:33', '2023-11-18 04:14:33'),
(13, 'distributor2', NULL, NULL, 'distributor2@gmail.cm', '$2y$10$Q8jmDAeDrDypa8iyTivQZO.eGbldpBKzmTakHOghD6hjGzi2aZWzG', NULL, NULL, 2, 0, NULL, '2023-09-29 21:58:48', '2023-09-29 21:58:48', NULL),
(14, 'distributor4', NULL, NULL, 'distributor4@gmail.cm', '$2y$10$Q8jmDAeDrDypa8iyTivQZO.eGbldpBKzmTakHOghD6hjGzi2aZWzG', NULL, NULL, 2, 0, NULL, '2023-09-29 21:58:48', '2023-09-29 21:58:48', NULL),
(15, 'test', '123', NULL, 'test@gmail.com', '$2y$10$Q8jmDAeDrDypa8iyTivQZO.eGbldpBKzmTakHOghD6hjGzi2aZWzG', NULL, 'BCA', 1, 8, NULL, '2023-10-29 15:33:55', '2023-10-29 15:33:55', NULL),
(16, 'testtings', '09812312', 'address', 'email@gmail.com', '$2y$10$Q8jmDAeDrDypa8iyTivQZO.eGbldpBKzmTakHOghD6hjGzi2aZWzG', NULL, 'BRI', 1, 8, NULL, '2023-10-29 15:35:24', '2023-10-29 15:35:24', NULL),
(17, 'John Doe', '09183', 'addresss', 'johndoe@gmail.com', '$2y$10$Q8jmDAeDrDypa8iyTivQZO.eGbldpBKzmTakHOghD6hjGzi2aZWzG', NULL, 'BRI', 1, 8, NULL, '2023-10-29 15:36:51', '2023-10-29 15:36:51', NULL),
(18, 'umkm', '055555', NULL, 'umkm@gmail.com', '$2y$10$Q8jmDAeDrDypa8iyTivQZO.eGbldpBKzmTakHOghD6hjGzi2aZWzG', '123123123', 'BNI', 2, 0, NULL, '2023-11-10 13:41:21', '2023-11-22 07:29:48', NULL),
(19, 'konsumen', NULL, 'Jalan Cendrawasih 245', 'konsumen@gmail.com', 'eyJpdiI6IjJRTHc3TXBTMUFodU42M2xnMXpOQmc9PSIsInZhbHVlIjoickNRRlFyRWFYTVBhZ2lTckc3N2RNQT09IiwibWFjIjoiZmEzM2U0ZmUwODJmN2RhZjUzZDc3OGRjYWU3MTY0YTczMDBhNGRlOGU4N2I3OGQ1OTJmMjhiN2U3N2ZjNGI2ZCIsInRhZyI6IiJ9', 'asd', 'BRI', 3, 0, NULL, '2023-11-10 14:45:09', '2023-11-22 07:29:16', NULL),
(20, 'John Doe', '088888', 'Jalan Cendrawasih 245', 'johndoe@gmail.com', '$2y$10$Q8jmDAeDrDypa8iyTivQZO.eGbldpBKzmTakHOghD6hjGzi2aZWzG', NULL, 'BCA', 1, 8, NULL, '2023-11-18 04:00:49', '2023-11-18 04:00:49', NULL),
(21, 'test', NULL, NULL, 'testings@gmail.com', '$2y$10$Q8jmDAeDrDypa8iyTivQZO.eGbldpBKzmTakHOghD6hjGzi2aZWzG', NULL, NULL, 3, 0, NULL, '2023-11-19 02:03:06', '2023-11-19 02:03:06', NULL),
(22, 'seller', '0890098', 'Jalan Cendrawasih 245', 'seller@gmail.com', '$2y$10$Q8jmDAeDrDypa8iyTivQZO.eGbldpBKzmTakHOghD6hjGzi2aZWzG', NULL, 'BCA', 2, 0, NULL, '2023-11-19 02:12:25', '2023-11-19 02:34:05', NULL),
(23, 'admin2', NULL, NULL, 'admin2@gmail.com', '$2y$10$Q8jmDAeDrDypa8iyTivQZO.eGbldpBKzmTakHOghD6hjGzi2aZWzG', NULL, NULL, 1, 0, NULL, '2023-11-19 03:32:43', '2023-11-19 03:32:43', NULL),
(24, 'admin', NULL, NULL, 'admin@admin.com', '$2y$10$Q8jmDAeDrDypa8iyTivQZO.eGbldpBKzmTakHOghD6hjGzi2aZWzG', NULL, NULL, 1, 0, NULL, '2023-11-21 05:45:31', '2023-11-21 05:45:31', NULL),
(25, 'testcust', NULL, NULL, 'testcust@gmai.com', '$2y$10$Q8jmDAeDrDypa8iyTivQZO.eGbldpBKzmTakHOghD6hjGzi2aZWzG', NULL, NULL, 2, 0, NULL, '2023-11-22 07:00:09', '2023-11-22 07:00:09', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catalogs`
--
ALTER TABLE `catalogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catalogs_catalog_category_id_foreign` (`catalog_category_id`),
  ADD KEY `catalogs_user_id_foreign` (`user_id`);

--
-- Indexes for table `catalog_categories`
--
ALTER TABLE `catalog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `couriers`
--
ALTER TABLE `couriers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_orders_user_id_foreign` (`user_id`),
  ADD KEY `customer_orders_catalog_id_foreign` (`catalog_id`),
  ADD KEY `customer_orders_sales_order_id_foreign` (`sales_order_id`);

--
-- Indexes for table `delivery_orders`
--
ALTER TABLE `delivery_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_orders_sales_order_id_foreign` (`sales_order_id`),
  ADD KEY `delivery_orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materials_material_category_id_foreign` (`material_category_id`),
  ADD KEY `materials_user_id_foreign` (`user_id`);

--
-- Indexes for table `material_categories`
--
ALTER TABLE `material_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `material_categories_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `production_items`
--
ALTER TABLE `production_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `production_items_catalog_category_id_foreign` (`catalog_category_id`),
  ADD KEY `production_items_catalog_id_foreign` (`catalog_id`),
  ADD KEY `production_items_production_order_id_foreign` (`production_order_id`);

--
-- Indexes for table `production_item_materials`
--
ALTER TABLE `production_item_materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `production_item_materials_production_item_id_foreign` (`production_item_id`),
  ADD KEY `production_item_materials_material_id_foreign` (`material_id`);

--
-- Indexes for table `production_orders`
--
ALTER TABLE `production_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `production_orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `purchase_materials`
--
ALTER TABLE `purchase_materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_materials_material_id_foreign` (`material_id`),
  ADD KEY `purchase_materials_purchase_order_id_foreign` (`purchase_order_id`);

--
-- Indexes for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_orders_supplier_id_foreign` (`supplier_id`),
  ADD KEY `purchase_orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `purchase_payments`
--
ALTER TABLE `purchase_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_payments_purchase_order_id_foreign` (`purchase_order_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_orders`
--
ALTER TABLE `sales_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_orders_courier_id_foreign` (`courier_id`),
  ADD KEY `sales_orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `sales_order_payments`
--
ALTER TABLE `sales_order_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_order_payments_sales_order_id_foreign` (`sales_order_id`);

--
-- Indexes for table `sales_payments`
--
ALTER TABLE `sales_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suppliers_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catalogs`
--
ALTER TABLE `catalogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `catalog_categories`
--
ALTER TABLE `catalog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `couriers`
--
ALTER TABLE `couriers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `delivery_orders`
--
ALTER TABLE `delivery_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `material_categories`
--
ALTER TABLE `material_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `production_items`
--
ALTER TABLE `production_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `production_item_materials`
--
ALTER TABLE `production_item_materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `production_orders`
--
ALTER TABLE `production_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purchase_materials`
--
ALTER TABLE `purchase_materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchase_payments`
--
ALTER TABLE `purchase_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sales_orders`
--
ALTER TABLE `sales_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sales_order_payments`
--
ALTER TABLE `sales_order_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_payments`
--
ALTER TABLE `sales_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `catalogs`
--
ALTER TABLE `catalogs`
  ADD CONSTRAINT `catalogs_catalog_category_id_foreign` FOREIGN KEY (`catalog_category_id`) REFERENCES `catalog_categories` (`id`),
  ADD CONSTRAINT `catalogs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD CONSTRAINT `customer_orders_catalog_id_foreign` FOREIGN KEY (`catalog_id`) REFERENCES `catalogs` (`id`),
  ADD CONSTRAINT `customer_orders_sales_order_id_foreign` FOREIGN KEY (`sales_order_id`) REFERENCES `sales_orders` (`id`),
  ADD CONSTRAINT `customer_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `delivery_orders`
--
ALTER TABLE `delivery_orders`
  ADD CONSTRAINT `delivery_orders_sales_order_id_foreign` FOREIGN KEY (`sales_order_id`) REFERENCES `sales_orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `delivery_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `materials_material_category_id_foreign` FOREIGN KEY (`material_category_id`) REFERENCES `material_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `materials_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `material_categories`
--
ALTER TABLE `material_categories`
  ADD CONSTRAINT `material_categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `production_items`
--
ALTER TABLE `production_items`
  ADD CONSTRAINT `production_items_catalog_category_id_foreign` FOREIGN KEY (`catalog_category_id`) REFERENCES `catalog_categories` (`id`),
  ADD CONSTRAINT `production_items_catalog_id_foreign` FOREIGN KEY (`catalog_id`) REFERENCES `catalogs` (`id`),
  ADD CONSTRAINT `production_items_production_order_id_foreign` FOREIGN KEY (`production_order_id`) REFERENCES `production_orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `production_item_materials`
--
ALTER TABLE `production_item_materials`
  ADD CONSTRAINT `production_item_materials_material_id_foreign` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `production_item_materials_production_item_id_foreign` FOREIGN KEY (`production_item_id`) REFERENCES `production_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `production_orders`
--
ALTER TABLE `production_orders`
  ADD CONSTRAINT `production_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchase_materials`
--
ALTER TABLE `purchase_materials`
  ADD CONSTRAINT `purchase_materials_material_id_foreign` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`),
  ADD CONSTRAINT `purchase_materials_purchase_order_id_foreign` FOREIGN KEY (`purchase_order_id`) REFERENCES `purchase_orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD CONSTRAINT `purchase_orders_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`),
  ADD CONSTRAINT `purchase_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchase_payments`
--
ALTER TABLE `purchase_payments`
  ADD CONSTRAINT `purchase_payments_purchase_order_id_foreign` FOREIGN KEY (`purchase_order_id`) REFERENCES `purchase_orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales_orders`
--
ALTER TABLE `sales_orders`
  ADD CONSTRAINT `sales_orders_courier_id_foreign` FOREIGN KEY (`courier_id`) REFERENCES `couriers` (`id`),
  ADD CONSTRAINT `sales_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales_order_payments`
--
ALTER TABLE `sales_order_payments`
  ADD CONSTRAINT `sales_order_payments_sales_order_id_foreign` FOREIGN KEY (`sales_order_id`) REFERENCES `sales_orders` (`id`);

--
-- Constraints for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD CONSTRAINT `suppliers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

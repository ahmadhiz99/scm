-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table scm_kasongan.catalogs
CREATE TABLE IF NOT EXISTS `catalogs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `unit_price` double NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `catalog_category_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `catalogs_catalog_category_id_foreign` (`catalog_category_id`),
  KEY `catalogs_user_id_foreign` (`user_id`),
  CONSTRAINT `catalogs_catalog_category_id_foreign` FOREIGN KEY (`catalog_category_id`) REFERENCES `catalog_categories` (`id`),
  CONSTRAINT `catalogs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table scm_kasongan.catalogs: ~0 rows (approximately)

-- Dumping structure for table scm_kasongan.catalog_categories
CREATE TABLE IF NOT EXISTS `catalog_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `catalog_category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table scm_kasongan.catalog_categories: ~0 rows (approximately)

-- Dumping structure for table scm_kasongan.couriers
CREATE TABLE IF NOT EXISTS `couriers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `courier_name` varchar(255) NOT NULL,
  `courier_address` longtext NOT NULL,
  `courier_phone` varchar(255) NOT NULL,
  `courier_email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table scm_kasongan.couriers: ~0 rows (approximately)

-- Dumping structure for table scm_kasongan.customer_orders
CREATE TABLE IF NOT EXISTS `customer_orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `catalog_id` bigint(20) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `note` longtext DEFAULT NULL,
  `sales_order_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_orders_user_id_foreign` (`user_id`),
  KEY `customer_orders_catalog_id_foreign` (`catalog_id`),
  KEY `customer_orders_sales_order_id_foreign` (`sales_order_id`),
  CONSTRAINT `customer_orders_catalog_id_foreign` FOREIGN KEY (`catalog_id`) REFERENCES `catalogs` (`id`),
  CONSTRAINT `customer_orders_sales_order_id_foreign` FOREIGN KEY (`sales_order_id`) REFERENCES `sales_orders` (`id`),
  CONSTRAINT `customer_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table scm_kasongan.customer_orders: ~0 rows (approximately)

-- Dumping structure for table scm_kasongan.delivery_orders
CREATE TABLE IF NOT EXISTS `delivery_orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `delivery_date` date NOT NULL,
  `courier` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `height` double(8,2) DEFAULT NULL,
  `weight` double(8,2) DEFAULT NULL,
  `sales_order_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `delivery_orders_sales_order_id_foreign` (`sales_order_id`),
  KEY `delivery_orders_user_id_foreign` (`user_id`),
  CONSTRAINT `delivery_orders_sales_order_id_foreign` FOREIGN KEY (`sales_order_id`) REFERENCES `sales_orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `delivery_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table scm_kasongan.delivery_orders: ~0 rows (approximately)

-- Dumping structure for table scm_kasongan.materials
CREATE TABLE IF NOT EXISTS `materials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `material_name` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `description` longtext DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `material_category_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `materials_material_category_id_foreign` (`material_category_id`),
  KEY `materials_user_id_foreign` (`user_id`),
  CONSTRAINT `materials_material_category_id_foreign` FOREIGN KEY (`material_category_id`) REFERENCES `material_categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `materials_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table scm_kasongan.materials: ~0 rows (approximately)

-- Dumping structure for table scm_kasongan.material_categories
CREATE TABLE IF NOT EXISTS `material_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `material_category_name` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `material_categories_user_id_foreign` (`user_id`),
  CONSTRAINT `material_categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table scm_kasongan.material_categories: ~0 rows (approximately)

-- Dumping structure for table scm_kasongan.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table scm_kasongan.migrations: ~20 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_100000_create_password_resets_table', 1),
	(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(3, '2023_09_05_085200_create_roles_table', 1),
	(4, '2023_09_05_085239_create_users_table', 1),
	(5, '2023_09_05_085322_create_suppliers_table', 1),
	(6, '2023_09_05_085354_create_material_categories_table', 1),
	(7, '2023_09_05_085423_create_materials_table', 1),
	(8, '2023_09_05_085501_create_production_orders_table', 1),
	(9, '2023_09_05_085559_create_catalog_categories_table', 1),
	(10, '2023_09_05_085624_create_catalogs_table', 1),
	(11, '2023_09_05_085719_create_production_items_table', 1),
	(12, '2023_09_05_085747_create_production_item_materials_table', 1),
	(13, '2023_09_05_085827_create_purchase_orders_table', 1),
	(14, '2023_09_05_085905_create_purchase_materials_table', 1),
	(15, '2023_09_05_085945_create_purchase_payments_table', 1),
	(16, '2023_09_05_090032_create_couriers_table', 1),
	(17, '2023_09_05_090115_create_sales_orders_table', 1),
	(18, '2023_09_05_090203_create_sales_order_payments_table', 1),
	(19, '2023_09_05_090252_create_customer_orders_table', 1),
	(20, '2023_09_05_090420_create_delivery_orders_table', 1);

-- Dumping structure for table scm_kasongan.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table scm_kasongan.password_resets: ~0 rows (approximately)

-- Dumping structure for table scm_kasongan.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table scm_kasongan.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table scm_kasongan.production_items
CREATE TABLE IF NOT EXISTS `production_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` double NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `catalog_category_id` bigint(20) unsigned DEFAULT NULL,
  `catalog_id` bigint(20) unsigned DEFAULT NULL,
  `production_order_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `production_items_catalog_category_id_foreign` (`catalog_category_id`),
  KEY `production_items_catalog_id_foreign` (`catalog_id`),
  KEY `production_items_production_order_id_foreign` (`production_order_id`),
  CONSTRAINT `production_items_catalog_category_id_foreign` FOREIGN KEY (`catalog_category_id`) REFERENCES `catalog_categories` (`id`),
  CONSTRAINT `production_items_catalog_id_foreign` FOREIGN KEY (`catalog_id`) REFERENCES `catalogs` (`id`),
  CONSTRAINT `production_items_production_order_id_foreign` FOREIGN KEY (`production_order_id`) REFERENCES `production_orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table scm_kasongan.production_items: ~0 rows (approximately)

-- Dumping structure for table scm_kasongan.production_item_materials
CREATE TABLE IF NOT EXISTS `production_item_materials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `production_item_id` bigint(20) unsigned NOT NULL,
  `material_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `production_item_materials_production_item_id_foreign` (`production_item_id`),
  KEY `production_item_materials_material_id_foreign` (`material_id`),
  CONSTRAINT `production_item_materials_material_id_foreign` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`) ON DELETE CASCADE,
  CONSTRAINT `production_item_materials_production_item_id_foreign` FOREIGN KEY (`production_item_id`) REFERENCES `production_items` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table scm_kasongan.production_item_materials: ~0 rows (approximately)

-- Dumping structure for table scm_kasongan.production_orders
CREATE TABLE IF NOT EXISTS `production_orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_production` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `requester_name` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `production_orders_user_id_foreign` (`user_id`),
  CONSTRAINT `production_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table scm_kasongan.production_orders: ~0 rows (approximately)
INSERT INTO `production_orders` (`id`, `no_production`, `start_date`, `end_date`, `quantity`, `requester_name`, `description`, `status`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '1', '2024-07-30', '2024-08-09', 100, 'Gelas', NULL, '1', 1, '2024-07-28 09:49:06', '2024-07-28 09:49:06', NULL);

-- Dumping structure for table scm_kasongan.purchase_materials
CREATE TABLE IF NOT EXISTS `purchase_materials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `material_id` bigint(20) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `unit_price` double NOT NULL,
  `note` longtext DEFAULT NULL,
  `purchase_order_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `purchase_materials_material_id_foreign` (`material_id`),
  KEY `purchase_materials_purchase_order_id_foreign` (`purchase_order_id`),
  CONSTRAINT `purchase_materials_material_id_foreign` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`),
  CONSTRAINT `purchase_materials_purchase_order_id_foreign` FOREIGN KEY (`purchase_order_id`) REFERENCES `purchase_orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table scm_kasongan.purchase_materials: ~0 rows (approximately)

-- Dumping structure for table scm_kasongan.purchase_orders
CREATE TABLE IF NOT EXISTS `purchase_orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_purchase_invoice` varchar(255) NOT NULL,
  `purchase_date` date NOT NULL,
  `receive_date` date DEFAULT NULL,
  `requester_name` varchar(255) DEFAULT NULL,
  `grand_total` double NOT NULL,
  `payment_total` double DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `supplier_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `purchase_orders_supplier_id_foreign` (`supplier_id`),
  KEY `purchase_orders_user_id_foreign` (`user_id`),
  CONSTRAINT `purchase_orders_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`),
  CONSTRAINT `purchase_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table scm_kasongan.purchase_orders: ~0 rows (approximately)

-- Dumping structure for table scm_kasongan.purchase_payments
CREATE TABLE IF NOT EXISTS `purchase_payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `purchase_order_id` bigint(20) unsigned NOT NULL,
  `payer_name` varchar(255) DEFAULT NULL,
  `nominal` double NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `purchase_payments_purchase_order_id_foreign` (`purchase_order_id`),
  CONSTRAINT `purchase_payments_purchase_order_id_foreign` FOREIGN KEY (`purchase_order_id`) REFERENCES `purchase_orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table scm_kasongan.purchase_payments: ~0 rows (approximately)

-- Dumping structure for table scm_kasongan.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table scm_kasongan.roles: ~3 rows (approximately)
INSERT INTO `roles` (`id`, `role_name`, `level`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'admin', 1, '2024-07-28 08:47:11', NULL, NULL),
	(2, 'umkm', 2, '2024-07-28 08:47:11', NULL, NULL),
	(3, 'customer', 3, '2024-07-28 08:47:11', NULL, NULL);

-- Dumping structure for table scm_kasongan.sales_orders
CREATE TABLE IF NOT EXISTS `sales_orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `no_sale_invoice` varchar(255) NOT NULL,
  `invoice_date` date NOT NULL,
  `due_date` date DEFAULT NULL,
  `customer_name` varchar(255) NOT NULL,
  `shipping_address` longtext NOT NULL,
  `grand_total` double NOT NULL,
  `courier_id` bigint(20) unsigned NOT NULL,
  `status` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sales_orders_courier_id_foreign` (`courier_id`),
  KEY `sales_orders_user_id_foreign` (`user_id`),
  CONSTRAINT `sales_orders_courier_id_foreign` FOREIGN KEY (`courier_id`) REFERENCES `couriers` (`id`),
  CONSTRAINT `sales_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table scm_kasongan.sales_orders: ~0 rows (approximately)

-- Dumping structure for table scm_kasongan.sales_order_payments
CREATE TABLE IF NOT EXISTS `sales_order_payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sales_order_id` bigint(20) unsigned NOT NULL,
  `payer_name` varchar(255) DEFAULT NULL,
  `nominal` double NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sales_order_payments_sales_order_id_foreign` (`sales_order_id`),
  CONSTRAINT `sales_order_payments_sales_order_id_foreign` FOREIGN KEY (`sales_order_id`) REFERENCES `sales_orders` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table scm_kasongan.sales_order_payments: ~0 rows (approximately)

-- Dumping structure for table scm_kasongan.suppliers
CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(255) NOT NULL,
  `supplier_address` longtext NOT NULL,
  `supplier_phone` varchar(255) NOT NULL,
  `supplier_email` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `suppliers_user_id_foreign` (`user_id`),
  CONSTRAINT `suppliers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table scm_kasongan.suppliers: ~0 rows (approximately)

-- Dumping structure for table scm_kasongan.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rekening` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table scm_kasongan.users: ~3 rows (approximately)
INSERT INTO `users` (`id`, `name`, `fullname`, `phone`, `address`, `email`, `password`, `rekening`, `bank`, `role_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'test', NULL, NULL, NULL, 'test@gmail.com', '$2y$10$NZA1G30XkYP.WYiAOz0kmOiM94nX.PLi7mANyDWBWh9h95sbUwooy', NULL, NULL, 3, '2024-07-28 09:41:05', '2024-07-28 09:41:05', NULL),
	(2, 'admin', NULL, NULL, NULL, 'admin@gmail.com', '$2y$10$NZA1G30XkYP.WYiAOz0kmOiM94nX.PLi7mANyDWBWh9h95sbUwooy', NULL, NULL, 1, '2024-07-28 09:41:05', '2024-07-28 09:41:05', NULL),
	(3, 'umkm', NULL, NULL, NULL, 'umkm@gmail.com', '$2y$10$NZA1G30XkYP.WYiAOz0kmOiM94nX.PLi7mANyDWBWh9h95sbUwooy', NULL, NULL, 2, '2024-07-28 09:41:05', '2024-07-28 09:41:05', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

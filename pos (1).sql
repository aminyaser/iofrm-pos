-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2020 at 09:36 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`) VALUES
(1, '2020-09-28 09:43:09', '2020-09-28 09:43:09'),
(2, '2020-09-28 09:43:09', '2020-09-28 09:43:09'),
(3, '2020-09-28 09:43:10', '2020-09-28 09:43:10'),
(4, '2020-09-29 15:55:57', '2020-09-29 15:55:57');

-- --------------------------------------------------------

--
-- Table structure for table `category_translations`
--

CREATE TABLE `category_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_translations`
--

INSERT INTO `category_translations` (`id`, `category_id`, `name`, `locale`) VALUES
(1, 1, 'ال جي', 'ar'),
(2, 1, 'LG', 'en'),
(3, 2, 'ابل', 'ar'),
(4, 2, 'apple', 'en'),
(5, 3, 'سامسونج', 'ar'),
(6, 3, 'samsong', 'en'),
(7, 4, 'بلاك بيري', 'ar'),
(8, 4, 'blackberry', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'ahmed sayed', '[\"1063657561\",\"1063657561\"]', 'banha , kafrshoukr', '2020-09-28 09:43:10', '2020-09-29 17:17:22'),
(2, 'Mohamed Sawy', '[\"+201063657561\",\"+201063657561\"]', 'cairo', '2020-09-28 09:43:11', '2020-09-29 17:17:04'),
(3, 'amin yasser', '[\"+201063657561\",null]', '6 october', '2020-09-29 17:17:58', '2020-09-29 17:17:58');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(263, '2014_10_12_000000_create_users_table', 1),
(264, '2014_10_12_100000_create_password_resets_table', 1),
(265, '2020_09_19_221800_laratrust_setup_tables', 1),
(266, '2020_09_23_120222_create_categories_table', 1),
(267, '2020_09_25_000711_create_category_translations_table', 1),
(268, '2020_09_26_105139_create_products_table', 1),
(269, '2020_09_26_105453_create_product_translations_table', 1),
(270, '2020_09_26_225544_create_clients_table', 1),
(271, '2020_09_26_235540_create_orders_table', 1),
(272, '2020_09_28_005505_create_product_order_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total_price` double(8,2) DEFAULT NULL,
  `status` varchar(110) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'processing',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `client_id`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(65, 1, 2345.00, 'finished', '2020-10-15 21:55:32', '2020-10-17 04:26:11'),
(66, 1, 5693.00, 'processing', '2020-10-15 22:00:43', '2020-10-15 22:00:44'),
(68, 1, 2301.00, 'processing', '2020-10-15 22:01:43', '2020-10-15 22:01:44'),
(69, 1, 4209.00, 'processing', '2020-10-15 22:03:11', '2020-10-15 22:03:12'),
(70, 1, 5360.00, 'processing', '2020-10-17 04:32:15', '2020-10-17 04:32:16'),
(71, 1, 1999.86, 'processing', '2020-10-17 04:37:47', '2020-10-17 04:37:47'),
(72, 1, 2345.00, 'processing', '2020-10-17 04:41:27', '2020-10-17 04:41:28'),
(73, 1, 1282.82, 'processing', '2020-10-17 04:41:35', '2020-10-17 04:41:35'),
(74, 1, 2391.00, 'processing', '2020-10-17 17:17:16', '2020-10-17 17:17:17');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'create-categories', 'Create Categories', 'Create Categories', '2020-09-28 09:43:06', '2020-09-28 09:43:06'),
(2, 'read-categories', 'Read Categories', 'Read Categories', '2020-09-28 09:43:06', '2020-09-28 09:43:06'),
(3, 'update-categories', 'Update Categories', 'Update Categories', '2020-09-28 09:43:06', '2020-09-28 09:43:06'),
(4, 'delete-categories', 'Delete Categories', 'Delete Categories', '2020-09-28 09:43:06', '2020-09-28 09:43:06'),
(5, 'create-products', 'Create Products', 'Create Products', '2020-09-28 09:43:06', '2020-09-28 09:43:06'),
(6, 'read-products', 'Read Products', 'Read Products', '2020-09-28 09:43:07', '2020-09-28 09:43:07'),
(7, 'update-products', 'Update Products', 'Update Products', '2020-09-28 09:43:07', '2020-09-28 09:43:07'),
(8, 'delete-products', 'Delete Products', 'Delete Products', '2020-09-28 09:43:07', '2020-09-28 09:43:07'),
(9, 'create-clients', 'Create Clients', 'Create Clients', '2020-09-28 09:43:07', '2020-09-28 09:43:07'),
(10, 'read-clients', 'Read Clients', 'Read Clients', '2020-09-28 09:43:07', '2020-09-28 09:43:07'),
(11, 'update-clients', 'Update Clients', 'Update Clients', '2020-09-28 09:43:07', '2020-09-28 09:43:07'),
(12, 'delete-clients', 'Delete Clients', 'Delete Clients', '2020-09-28 09:43:07', '2020-09-28 09:43:07'),
(13, 'create-orders', 'Create Orders', 'Create Orders', '2020-09-28 09:43:07', '2020-09-28 09:43:07'),
(14, 'read-orders', 'Read Orders', 'Read Orders', '2020-09-28 09:43:07', '2020-09-28 09:43:07'),
(15, 'update-orders', 'Update Orders', 'Update Orders', '2020-09-28 09:43:07', '2020-09-28 09:43:07'),
(16, 'delete-orders', 'Delete Orders', 'Delete Orders', '2020-09-28 09:43:07', '2020-09-28 09:43:07'),
(17, 'create-users', 'Create Users', 'Create Users', '2020-09-28 09:43:07', '2020-09-28 09:43:07'),
(18, 'read-users', 'Read Users', 'Read Users', '2020-09-28 09:43:07', '2020-09-28 09:43:07'),
(19, 'update-users', 'Update Users', 'Update Users', '2020-09-28 09:43:07', '2020-09-28 09:43:07'),
(20, 'delete-users', 'Delete Users', 'Delete Users', '2020-09-28 09:43:08', '2020-09-28 09:43:08');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_user`
--

INSERT INTO `permission_user` (`permission_id`, `user_id`, `user_type`) VALUES
(1, 2, 'App\\User'),
(2, 2, 'App\\User'),
(3, 2, 'App\\User'),
(4, 2, 'App\\User'),
(5, 2, 'App\\User'),
(6, 2, 'App\\User'),
(7, 2, 'App\\User'),
(8, 2, 'App\\User'),
(9, 2, 'App\\User'),
(10, 2, 'App\\User'),
(11, 2, 'App\\User'),
(12, 2, 'App\\User'),
(13, 2, 'App\\User'),
(14, 2, 'App\\User'),
(15, 2, 'App\\User'),
(16, 2, 'App\\User'),
(17, 2, 'App\\User'),
(18, 2, 'App\\User'),
(19, 2, 'App\\User'),
(20, 2, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(111) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'simple',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.svg',
  `purchase_price` double(8,2) NOT NULL,
  `sale_price` double(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `type`, `image`, `purchase_price`, `sale_price`, `stock`, `created_at`, `updated_at`) VALUES
(4, 3, 'simple', 'cs4jRtTU6iduz4xKxXwZExB6zHEYVrtq5bsDeIxR.jpeg', 1230.22, 1999.86, 93, '2020-09-29 16:48:03', '2020-10-17 04:37:47'),
(5, 3, 'sale', '5LchGi1g3M7BgmGJyCEO2q4DyNZ61wdzhTJZS0j2.jpeg', 2000.00, 5360.00, 88, '2020-09-29 16:51:20', '2020-10-17 04:32:16'),
(6, 3, 'sale', 'nKJJt6sqoAlLzjLknrM9eiIO3wgVVl7SbAw6xKTx.jpeg', 1506.00, 2345.00, 34, '2020-09-29 16:52:40', '2020-10-17 04:41:28'),
(7, 4, 'simple', 'JjzqE182rs4VhrR5fbMXeNtsDUTt75wpFnoSOe5k.jpeg', 3201.00, 5693.00, 25, '2020-09-29 16:54:26', '2020-10-15 22:00:44'),
(8, 4, 'simple', 'f98sQag52XQMaqp3ubZEmpRUtxDXltQYRk1elkM2.jpeg', 1910.00, 2391.00, 17, '2020-09-29 16:55:55', '2020-10-17 17:17:17'),
(9, 1, 'simple', 'g6BEdo30zyVGsg8ArnThRvnNJbZR5oGYKyQbNEsK.jpeg', 1268.00, 2301.00, 18, '2020-09-29 16:57:23', '2020-10-15 22:01:43'),
(10, 1, 'simple', '8NdWaPYzSALNIwu4YFQpZ7ioC4jDm7duoGnjAt0G.jpeg', 1302.00, 2101.00, 6, '2020-09-29 17:00:07', '2020-10-15 21:46:35'),
(11, 2, 'simple', 'MbM18q90TN7GPKryrT7uE73OKwNexnryzcMmX4am.jpeg', 3230.00, 4209.00, 5, '2020-09-29 17:11:04', '2020-10-15 22:03:12'),
(12, 2, 'simple', 'N6rqO2xJYUOXjLq7vXdJ83CwkXAp0z9hFiLfxQ5W.jpeg', 3402.00, 5392.00, 7, '2020-09-29 17:13:13', '2020-10-15 21:40:45'),
(13, 2, 'simple', 'W8owcBCzluaMd9Kq4MCP18uFvv2LF0SiGscaj8Xc.jpeg', 1293.00, 2031.00, 22, '2020-09-29 17:14:47', '2020-10-01 08:33:21'),
(14, 2, 'simple', 'Q4VhYkSTO1WpwMIPJuuzZ0PaDHeYCKZrHsVDhk2D.jpeg', 921.00, 1282.82, 21, '2020-09-29 17:16:01', '2020-10-17 04:41:35'),
(15, 1, 'simple', 'default.svg', 4.00, 3.00, 5, '2020-10-01 08:21:25', '2020-10-01 08:21:25');

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_order`
--

INSERT INTO `product_order` (`id`, `product_id`, `order_id`, `quantity`) VALUES
(85, 6, 65, 1),
(86, 7, 66, 1),
(88, 9, 68, 1),
(89, 11, 69, 1),
(90, 5, 70, 1),
(91, 4, 71, 1),
(92, 6, 72, 1),
(93, 14, 73, 1),
(94, 8, 74, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_translations`
--

CREATE TABLE `product_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_translations`
--

INSERT INTO `product_translations` (`id`, `product_id`, `name`, `description`, `locale`) VALUES
(7, 4, 'سامسونج نوت 10', '<p>سامسونج نوت 10</p>', 'ar'),
(8, 4, 'samsong note 10', '<p>samsong note 10</p>', 'en'),
(9, 5, 'سامسونج نوت 20', '<p>سامسونج نوت 20</p>', 'ar'),
(10, 5, 'samsoung note 20 ultra', '<p>samsoung note 20 ultra</p>', 'en'),
(11, 6, 'سامسونج s7 edge', '<p>سامسونج s7 edge</p>', 'ar'),
(12, 6, 'samsoung s7 edge', '<p><strong>samsoung s7 edge</strong></p>', 'en'),
(13, 7, 'بلاك بيري كي وان', '<p>بلاك بيري <strong>كي وان</strong>&nbsp;</p>', 'ar'),
(14, 7, 'blackberry KEY ONE', '<p>blackberry <strong>KEY ONE</strong></p>', 'en'),
(15, 8, 'بلاك بيري باسبورت', '<p>بلاك بيري <strong>باسبورت</strong></p>', 'ar'),
(16, 8, 'blackberry passport', '<p>blackberry <strong>passport</strong></p>', 'en'),
(17, 9, 'ال جي  ta', '<p>ال جي &nbsp;<strong>ta</strong></p>', 'ar'),
(18, 9, 'LG T', '<p>LG <strong>T</strong></p>', 'en'),
(19, 10, 'ال جي Y', '<p>ال جي Y</p>', 'ar'),
(20, 10, 'LG Y', '<p>LG <strong>Y</strong></p>', 'en'),
(21, 11, 'اي فون 11', '<p>اي فون 11</p>', 'ar'),
(22, 11, 'iphone 11', '<p>iphone 11</p>', 'en'),
(23, 12, 'اي فون اكس ماكس', '<p>اي فون اكس ماكس</p>', 'ar'),
(24, 12, 'iphone xs max', '<p>iphone xs <strong>max</strong></p>', 'en'),
(25, 13, 'اي فون 7 بلس', '<p>اي فون 7 بلس</p>', 'ar'),
(26, 13, 'iphone 7 plus', '<p>iphone 7 <strong>plus</strong></p>', 'en'),
(27, 14, 'اي فون 6', '<p>اي فون 7</p>', 'ar'),
(28, 14, 'iphone 6', '<p>iphone 6</p>', 'en'),
(29, 15, 'ابل', '<p>hjkl;&#39;</p>', 'ar'),
(30, 15, 'fghjkl;', '<p>bhjkl;</p>', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'Super Admin', 'Super Admin', '2020-09-28 09:43:06', '2020-09-28 09:43:06'),
(2, 'admin', 'Admin', 'Admin', '2020-09-28 09:43:09', '2020-09-28 09:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\User'),
(2, 2, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.svg',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'super', 'admin', 'super_admin@app.com', 'default.svg', NULL, '$2y$10$EM7v1oZ28M1fSFmIe9wCpuVrL0VausC0Kj8tIHhRhqkQsceA3MCN2', 'Ja1QnqxKl5Wk2O2zWNpTjI7UGPFDE3d7p9G33wm3eAuEKHEHLjZCGa0c7J58', '2020-09-28 09:43:09', '2020-09-28 09:43:09'),
(2, 'amin', 'yasser', 'amin.yasser00@gmail.com', 'xxFcWDD8vKvM4zSXPCRPpBEbEfWjhDvXlgSIM01Y.jpeg', NULL, '$2y$10$2CydY92IM6ruoJrcNEpiPOePUVjVUb5N3KPOCKhsIqh70ASdlScAa', NULL, '2020-10-01 08:03:44', '2020-10-01 08:03:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_translations_category_id_locale_unique` (`category_id`,`locale`),
  ADD KEY `category_translations_locale_index` (`locale`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
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
  ADD KEY `orders_client_id_foreign` (`client_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_order_product_id_foreign` (`product_id`),
  ADD KEY `product_order_order_id_foreign` (`order_id`);

--
-- Indexes for table `product_translations`
--
ALTER TABLE `product_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_translations_product_id_locale_unique` (`product_id`,`locale`),
  ADD KEY `product_translations_locale_index` (`locale`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `product_translations`
--
ALTER TABLE `product_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD CONSTRAINT `category_translations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_order`
--
ALTER TABLE `product_order`
  ADD CONSTRAINT `product_order_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_order_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_translations`
--
ALTER TABLE `product_translations`
  ADD CONSTRAINT `product_translations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2016 at 12:23 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectx`
--

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
  ('marufunyasha@gmail.com', '5db3e7a4976a3ae58f45b6e3e39bd7848b18bd281750b35446a1064f7e8d2e81', '2016-10-12 17:39:32');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `category`, `created_at`, `updated_at`, `deleted_at`) VALUES
  (1, 'subscriber_view', 'view', 'can view subscriber list', 'subscriber', '2016-09-30 09:04:45', '2016-09-30 09:04:45', NULL),
  (3, 'subscriber_view_file', 'view file', 'can view subscriber files', 'subscriber', '2016-09-30 09:06:15', '2016-09-30 09:06:15', NULL),
  (4, 'subscriber_edit_file', 'edit file', 'can edit subscriber file', 'subscriber', '2016-09-30 09:06:45', '2016-09-30 09:06:45', NULL),
  (5, 'subscriber_validate', 'validate', 'can validate subscriber', 'subscriber', '2016-09-30 09:07:06', '2016-09-30 09:07:06', NULL),
  (6, 'business_add', 'add', 'can add business', 'business', '2016-09-30 09:08:33', '2016-09-30 09:08:33', NULL),
  (7, 'business_add_sales_rep', 'add sales rep', 'can add sales representatives', 'business', '2016-09-30 09:09:16', '2016-09-30 09:09:16', NULL),
  (8, 'business_view', 'view', 'can view businesses list', 'business', '2016-09-30 09:10:48', '2016-09-30 09:10:48', NULL),
  (9, 'business_edit', 'edit', 'can edit businesses list', 'business', '2016-09-30 09:11:29', '2016-09-30 09:11:29', NULL),
  (10, 'biller_view', 'view', 'can view biller list', 'biller', '2016-09-30 09:12:07', '2016-09-30 09:12:07', NULL),
  (11, 'biller_add', 'add', 'can add biller list', 'biller', '2016-09-30 09:12:35', '2016-09-30 09:12:35', NULL),
  (12, 'biller_edit', 'edit', 'can edit biller list', 'biller', '2016-09-30 09:12:56', '2016-09-30 09:12:56', NULL),
  (13, 'biller_delete', 'delete', 'can delete biller list', 'biller', '2016-09-30 09:13:16', '2016-09-30 09:13:16', NULL),
  (14, 'bank_view', 'view', 'can view bank list', 'bank', '2016-09-30 09:14:13', '2016-09-30 09:14:13', NULL),
  (15, 'bank_add', 'add', 'can add bank', 'bank', '2016-09-30 09:14:23', '2016-09-30 09:14:23', NULL),
  (16, 'bank_edit', 'edit', 'can edit bank', 'bank', '2016-09-30 09:14:41', '2016-09-30 09:14:41', NULL),
  (17, 'bank_delete', 'delete', 'can delete bank', 'bank', '2016-09-30 09:14:53', '2016-09-30 09:14:53', NULL),
  (18, 'device_view', 'view', 'can view devices list', 'device', '2016-09-30 10:25:07', '2016-09-30 10:25:07', NULL),
  (19, 'device_add', 'add', 'can add new device', 'device', '2016-09-30 10:25:24', '2016-09-30 10:25:24', NULL),
  (20, 'device_edit', 'edit', 'can edit devices', 'device', '2016-09-30 10:25:39', '2016-09-30 10:25:39', NULL),
  (21, 'device_delete', 'delete', 'can delete devices', 'device', '2016-09-30 10:25:54', '2016-09-30 10:25:54', NULL),
  (22, 'product_view', 'view', 'can view products list', 'product', '2016-09-30 10:26:30', '2016-09-30 10:26:30', NULL),
  (23, 'product_add', 'add', 'can a new product', 'product', '2016-09-30 10:26:45', '2016-09-30 10:26:45', NULL),
  (24, 'product_edit', 'edit', 'can edit a product', 'product', '2016-09-30 10:27:09', '2016-09-30 10:27:09', NULL),
  (25, 'product_delete', 'delete', 'can delete a product', 'product', '2016-09-30 10:27:25', '2016-09-30 10:27:25', NULL),
  (26, 'sales__cabin_crew', 'Cabin Crew', 'Cabin guys', 'sales', '2016-10-07 12:11:37', '2016-10-07 12:11:37', NULL),
  (27, 'dfdf_ddf', 'ddf', 'dfdf', 'dfdf', '2016-10-07 12:40:53', '2016-10-07 12:40:53', NULL),
  (28, 'sdhsdh_asgagh', 'asgagh', 'sdhsdh', 'sdhsdh', '2016-10-10 07:50:47', '2016-10-10 07:50:47', NULL),
  (29, 'fsdjdfj_sdhsdh', 'sdhsdh', 'dfjfdj', 'fsdjdfj', '2016-10-10 09:05:45', '2016-10-10 09:05:45', NULL),
  (30, 'sales_nyasha', 'nyasha', 'dsgsd dfhsf', 'sales', '2016-10-11 10:57:40', '2016-10-11 10:57:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
  (3, 2),
  (18, 5),
  (19, 5),
  (20, 5),
  (21, 5),
  (14, 6),
  (15, 6),
  (16, 6),
  (17, 6);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
  (1, 'admin_global', 'Admin Global', 'Super Super Admin', '2016-10-06 22:00:00', '2016-10-06 22:00:00', NULL),
  (2, 'sales', 'Sales', 'Sales Test', '2016-10-06 22:00:00', '2016-10-06 22:00:00', NULL),
  (5, 'it', 'IT', 'IT crew', '2016-10-12 09:22:33', '2016-10-12 09:22:33', NULL),
  (6, 'accounting', 'Accounting', 'Accounting', '2016-10-12 18:00:53', '2016-10-12 18:00:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_uielement`
--

CREATE TABLE `role_uielement` (
  `uielement_id` int(11) NOT NULL,
  `role_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_uielement`
--

INSERT INTO `role_uielement` (`uielement_id`, `role_id`) VALUES
  (1, 1),
  (1, 6),
  (2, 1),
  (2, 2),
  (4, 2),
  (5, 2),
  (9, 5),
  (10, 5),
  (22, 2),
  (72, 2),
  (91, 2),
  (92, 5),
  (101, 5),
  (102, 5),
  (104, 5),
  (1000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `role_url`
--

CREATE TABLE `role_url` (
  `url_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_url`
--

INSERT INTO `role_url` (`url_id`, `role_id`) VALUES
  (1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
  (1, 1),
  (3, 1),
  (4, 1),
  (5, 1),
  (1, 2),
  (2, 2),
  (3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `uielements`
--

CREATE TABLE `uielements` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uielements`
--

INSERT INTO `uielements` (`id`, `name`, `created_at`, `updated_at`) VALUES
  (1, 'dashboard_menu_item', NULL, NULL),
  (2, 'subscribers_menu_item', '2016-10-12 08:27:16', '2016-10-12 08:27:16'),
  (3, 'business_menu_item', '2016-10-12 08:27:16', '2016-10-12 08:27:16'),
  (4, 'biller_menu_item', '2016-10-12 08:27:16', '2016-10-12 08:27:16'),
  (5, 'bank_menu_item', '2016-10-12 08:54:57', '2016-10-12 08:54:57'),
  (6, 'accounting_menu_item', '2016-10-12 08:54:57', '2016-10-12 08:54:57'),
  (7, 'reports_menu_item', '2016-10-12 08:55:46', '2016-10-12 08:55:46'),
  (8, 'products_menu_item', '2016-10-12 08:55:46', '2016-10-12 08:55:46'),
  (9, 'device_menu_item', '2016-10-12 08:56:22', '2016-10-12 08:56:22'),
  (10, 'settings_menu_item', '2016-10-12 08:56:22', '2016-10-12 08:56:22'),
  (21, 'add_subscriber', '2016-10-12 14:09:52', '2016-10-12 14:09:52'),
  (22, 'view_subscriber', '2016-10-12 14:09:52', '2016-10-12 14:09:52'),
  (23, 'update_subscriber', '2016-10-12 14:10:58', '2016-10-12 14:10:58'),
  (31, 'add_business', '2016-10-12 14:10:58', '2016-10-12 14:10:58'),
  (32, 'view_business', '2016-10-12 14:12:21', '2016-10-12 14:12:21'),
  (41, 'add_biller', '2016-10-12 14:16:19', '2016-10-12 14:16:19'),
  (42, 'view_biller', '2016-10-12 14:16:19', '2016-10-12 14:16:19'),
  (51, 'add_bank', '2016-10-12 14:17:59', '2016-10-12 14:17:59'),
  (52, 'view_bank', '2016-10-12 14:17:59', '2016-10-12 14:17:59'),
  (71, 'reports_dashboard', '2016-10-12 14:28:08', '2016-10-12 14:28:08'),
  (72, 'transactions', '2016-10-12 14:28:08', '2016-10-12 14:28:08'),
  (81, 'add_product', '2016-10-12 14:35:59', '2016-10-12 14:35:59'),
  (82, 'view_product', '2016-10-12 14:35:59', '2016-10-12 14:35:59'),
  (91, 'add_device', '2016-10-12 14:36:38', '2016-10-12 14:36:38'),
  (92, 'view_device', '2016-10-12 14:36:38', '2016-10-12 14:36:38'),
  (101, 'settings_view_admin', '2016-10-12 14:38:11', '2016-10-12 14:38:11'),
  (102, 'settings_view_roles', '2016-10-12 14:38:11', '2016-10-12 14:38:11'),
  (103, 'add_role', '2016-10-12 14:38:48', '2016-10-12 14:38:48'),
  (104, 'add_permission', '2016-10-12 14:38:48', '2016-10-12 14:38:48'),
  (1000, 'transaction_list_download', '2016-10-12 14:48:26', '2016-10-12 14:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `uielement_permission`
--

CREATE TABLE `uielement_permission` (
  `uielement_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `urls`
--

CREATE TABLE `urls` (
  `id` int(11) UNSIGNED NOT NULL,
  `base` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `urls`
--

INSERT INTO `urls` (`id`, `base`, `created_at`, `updated_at`) VALUES
  (1, 'client/add', '2016-10-13 08:11:27', '2016-10-13 08:11:27'),
  (2, 'client/list', '2016-10-13 08:11:43', '2016-10-13 08:11:43'),
  (3, 'client/update', '2016-10-13 08:52:05', '2016-10-13 08:52:05'),
  (4, 'business/add', '2016-10-13 09:36:32', '2016-10-13 09:36:32'),
  (5, 'business/view', '2016-10-13 09:36:32', '2016-10-13 09:36:32'),
  (6, 'billers/add', '2016-10-13 09:37:10', '2016-10-13 09:37:10'),
  (7, 'billers/view', '2016-10-13 09:37:10', '2016-10-13 09:37:10'),
  (8, 'bank/add', '2016-10-13 09:38:08', '2016-10-13 09:38:08'),
  (9, 'bank/view', '2016-10-13 09:38:08', '2016-10-13 09:38:08'),
  (10, 'report/dashboard', '2016-10-13 09:38:59', '2016-10-13 09:38:59'),
  (11, 'report/transactions', '2016-10-13 09:38:59', '2016-10-13 09:38:59'),
  (12, 'product/add', '2016-10-13 09:40:57', '2016-10-13 09:40:57'),
  (13, 'product/view', '2016-10-13 09:40:57', '2016-10-13 09:40:57'),
  (14, 'devices/add', '2016-10-13 09:40:57', '2016-10-13 09:40:57'),
  (15, 'devices/view', '2016-10-13 09:40:57', '2016-10-13 09:40:57'),
  (16, 'settings/view_admin', '2016-10-13 09:40:57', '2016-10-13 09:40:57'),
  (17, 'settings/view_roles', '2016-10-13 09:40:57', '2016-10-13 09:40:57'),
  (18, 'settings/admin/roles/create', '2016-10-13 09:40:57', '2016-10-13 09:40:57'),
  (19, 'settings/admin/perms/create', '2016-10-13 09:40:57', '2016-10-13 09:40:57');

-- --------------------------------------------------------

--
-- Table structure for table `url_uielement`
--

CREATE TABLE `url_uielement` (
  `uielement_id` int(11) NOT NULL,
  `url_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `url_uielement`
--

INSERT INTO `url_uielement` (`uielement_id`, `url_id`) VALUES
  (21, 1),
  (22, 2),
  (23, 3),
  (31, 4),
  (32, 5),
  (41, 6),
  (42, 7),
  (51, 8),
  (52, 9),
  (71, 10),
  (72, 11),
  (81, 12),
  (82, 13),
  (91, 14),
  (92, 15),
  (101, 16),
  (102, 17),
  (103, 18),
  (104, 19);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
  (1, 'Nyasha', 'marufunyasha@gmail.com', '$2y$10$gMoGIv9hzIBO.j9iw3E/vOk4n4QeTFV7PLVHBKOkQs97iGNpp9R4G', 'jmqhyBPpe0DS8e6qu5o9w8vlLgo323xdCItYPwcsInw113En5Q5thKxAVwQv', '2016-09-28 19:31:05', '2016-10-12 17:20:36', NULL),
  (2, 'Sales', 'sales@getcash.co.zw', '$2y$10$azSCHCMft7hhIZKsI39sWOcNIqINO4DzFeHc/MPHhulO/fDuWZOxu', 'QuMFbLS8TxlzchzZS43G7T67kcrSIIMffLpaXbijWwmDoCKUQo4s0nHKEigT', '2016-09-30 10:58:52', '2016-10-13 07:08:32', NULL),
  (3, 'Dean Tawonezvi', 'deantawonezvi1@gmail.com', '$2y$10$t5ssGK9uLPX7XSEpzMeTZubxeioq3QIS/D4a1Ft9MTCdNOICoKEJK', 'lUfPCJFxgm0069TnDK5sBEz2eAD3dXYvLvj3TRs4IybsuJfmDDF2bXr4z2G6', '2016-10-08 11:47:34', '2016-10-08 11:48:09', NULL),
  (4, 'Leeroy', 'leeroyn@getcash.co.zw', '$2y$10$3sUwZNfoMHlZlkUHsiJXdO7SoDXuqDUjiPNN9EfjkTbBiKlLRgVAG', 'iaYiEKFpGO764RzwztRFegb3x54l1OCPhvlwWilCI8KTDLnHnEBEIJxAIWZB', '2016-10-08 11:47:58', '2016-10-08 11:48:11', NULL),
  (5, 'Venon', 'venonm@getcash.co.zw', '$2y$10$pLPPN69ema56PFaHyU/6COl6wHEUphjUoPHMZr/vHupKvyQxxJOyq', 'xOaJtkBMdAwdRucyIyQHLE5eg7sI1nL6ennsTWOtBokVngf4Jl9P0f9TdOUK', '2016-10-10 08:36:23', '2016-10-10 12:33:32', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_uielement`
--
ALTER TABLE `role_uielement`
  ADD PRIMARY KEY (`uielement_id`,`role_id`) USING BTREE,
  ADD KEY `uielement_id` (`uielement_id`) USING BTREE,
  ADD KEY `role_id` (`role_id`) USING BTREE;

--
-- Indexes for table `role_url`
--
ALTER TABLE `role_url`
  ADD PRIMARY KEY (`url_id`,`role_id`),
  ADD KEY `url_id` (`url_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `uielements`
--
ALTER TABLE `uielements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uielement_permission`
--
ALTER TABLE `uielement_permission`
  ADD PRIMARY KEY (`uielement_id`,`permission_id`),
  ADD KEY `uielement_id` (`uielement_id`),
  ADD KEY `permission_id` (`permission_id`);

--
-- Indexes for table `urls`
--
ALTER TABLE `urls`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `base` (`base`);

--
-- Indexes for table `url_uielement`
--
ALTER TABLE `url_uielement`
  ADD PRIMARY KEY (`uielement_id`,`url_id`),
  ADD KEY `uielement_id` (`uielement_id`),
  ADD KEY `url_id` (`url_id`);

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
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `uielements`
--
ALTER TABLE `uielements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;
--
-- AUTO_INCREMENT for table `urls`
--
ALTER TABLE `urls`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_uielement`
--
ALTER TABLE `role_uielement`
  ADD CONSTRAINT `role_uielement_ibfk_1` FOREIGN KEY (`uielement_id`) REFERENCES `uielements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_uielement_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_url`
--
ALTER TABLE `role_url`
  ADD CONSTRAINT `role_url_ibfk_1` FOREIGN KEY (`url_id`) REFERENCES `urls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_url_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `url_uielement`
--
ALTER TABLE `url_uielement`
  ADD CONSTRAINT `url_uielement_ibfk_1` FOREIGN KEY (`uielement_id`) REFERENCES `uielements` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `url_uielement_ibfk_2` FOREIGN KEY (`url_id`) REFERENCES `urls` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

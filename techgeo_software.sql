-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2025 at 01:44 PM
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
-- Database: `techgeo_software`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) NOT NULL,
  `tag_id` varchar(200) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `business_name` varchar(200) NOT NULL,
  `gst_number` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(2) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `tag_id`, `name`, `business_name`, `gst_number`, `email`, `phone`, `address`, `city`, `state`, `pincode`, `country`, `created_at`, `updated_at`, `status`) VALUES
(1, '#TG-001', 'Ashwani', 'Ecom', 'GST250451120108', 'ashwani@gmail.com', '9466055376', 'Begu Road, Satnam Chowk', 'Sirsa', 'Haryana', '125055', 'India', '2025-05-09 04:44:06', '2025-05-09 04:44:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gst`
--

CREATE TABLE `gst` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `charges` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gst`
--

INSERT INTO `gst` (`id`, `name`, `full_name`, `charges`, `created_at`, `updated_at`) VALUES
(1, 'cgst', 'Central Tax', 9, '2025-05-16 07:43:53', '2025-05-16 07:43:53'),
(2, 'sgst', 'State Tax', 9, '2025-05-16 07:43:53', '2025-05-16 07:43:53');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `invoice_number` varchar(255) DEFAULT NULL,
  `discount_yes` varchar(4) DEFAULT NULL,
  `gst_yes` varchar(4) DEFAULT NULL,
  `discount` varchar(50) DEFAULT NULL,
  `sub_total` varchar(50) NOT NULL,
  `grand_total` varchar(50) NOT NULL,
  `cgst` varchar(50) DEFAULT NULL,
  `sgst` varchar(50) DEFAULT NULL,
  `cgst_charge` int(11) DEFAULT NULL,
  `sgst_charge` int(11) DEFAULT NULL,
  `date` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `customer_id`, `invoice_number`, `discount_yes`, `gst_yes`, `discount`, `sub_total`, `grand_total`, `cgst`, `sgst`, `cgst_charge`, `sgst_charge`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, '#INV-001', 'on', 'on', '100', '2000', '2584', '342.00', '342.00', 18, 18, '17-05-2025', '2025-05-17 04:43:51', '2025-05-17 04:43:51'),
(2, 1, '#INV-002', 'on', 'on', '0', '200', '272', '36.00', '36.00', 18, 18, '17-05-2025', '2025-05-17 04:45:30', '2025-05-17 04:45:30'),
(3, 1, '#INV-003', 'off', 'off', '0', '6000', '6000', NULL, NULL, 18, 18, '17-05-2025', '2025-05-17 04:45:50', '2025-05-17 04:45:50'),
(4, 1, '#INV-004', 'on', 'on', '0', '20', '27', '3.60', '3.60', 18, 18, '17-05-2025', '2025-05-17 04:49:42', '2025-05-17 04:49:42'),
(5, 1, '#INV-005', 'on', 'on', '50', '100', '68', '9.00', '9.00', 18, 18, '17-05-2025', '2025-05-17 05:40:30', '2025-05-17 05:40:30'),
(6, 1, '#INV-006', 'on', 'on', '50', '400', '413', '31.50', '31.50', 9, 9, '17-05-2025', '2025-05-17 06:06:00', '2025-05-17 06:06:00'),
(7, 1, '#INV-007', 'on', 'on', '100', '4000', '4602', '351.00', '351.00', 9, 9, '17-05-2025', '2025-05-17 06:08:13', '2025-05-17 06:08:13');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_products`
--

CREATE TABLE `invoice_products` (
  `id` bigint(20) NOT NULL,
  `invoice_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `qty` varchar(50) NOT NULL,
  `rate` varchar(50) NOT NULL,
  `sub_total` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice_products`
--

INSERT INTO `invoice_products` (`id`, `invoice_id`, `name`, `qty`, `rate`, `sub_total`, `created_at`, `updated_at`) VALUES
(1, '1', 'A1', '2', '50', '100', '2025-05-17 04:43:51', '2025-05-17 04:43:51'),
(2, '1', 'A2', '4', '100', '400', '2025-05-17 04:43:51', '2025-05-17 04:43:51'),
(3, '1', 'A4', '3', '500', '1500', '2025-05-17 04:43:51', '2025-05-17 04:43:51'),
(4, '2', 'Ashh', '2', '100', '200', '2025-05-17 04:45:30', '2025-05-17 04:45:30'),
(5, '3', 'AshB', '1', '6000', '6000', '2025-05-17 04:45:50', '2025-05-17 04:45:50'),
(6, '4', 'Ashawni', '1', '20', '20', '2025-05-17 04:49:43', '2025-05-17 04:49:43'),
(7, '5', 'Ashhhhhh', '1', '100', '100', '2025-05-17 05:40:30', '2025-05-17 05:40:30'),
(8, '6', 'Asss', '2', '100', '200', '2025-05-17 06:06:00', '2025-05-17 06:06:00'),
(9, '6', 'Ass2', '4', '50', '200', '2025-05-17 06:06:00', '2025-05-17 06:06:00'),
(10, '7', 'A1', '2', '1000', '2000', '2025-05-17 06:08:13', '2025-05-17 06:08:13'),
(11, '7', 'A2', '4', '500', '2000', '2025-05-17 06:08:13', '2025-05-17 06:08:13');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Goods once sold will not be taken back.', '2025-05-13 11:38:43', '2025-05-13 11:38:43'),
(2, 'Our risk and responsibility ceases as soon', '2025-05-13 11:38:43', '2025-05-13 11:38:43');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `verify` tinyint(2) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_web_token` varchar(255) DEFAULT NULL,
  `in_hash` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `verify`, `created_at`, `updated_at`, `remember_web_token`, `in_hash`) VALUES
(1, NULL, 'tg123@gmail.com', NULL, '$2y$12$f8rwj97Xf9OfxLhAVVUCQOx2ItlK2GC88qcQnHnqBa75/XpYuvQt6', '5iNsj0e9RtOiGZtwmv6YEzRouguJl1KsRtnIQkxSwBv20tm9p1peueosX91J', 0, '2025-05-08 06:14:46', '2025-05-08 06:19:07', NULL, 'MTIzNDU0Ngo=');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gst`
--
ALTER TABLE `gst`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_products`
--
ALTER TABLE `invoice_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gst`
--
ALTER TABLE `gst`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `invoice_products`
--
ALTER TABLE `invoice_products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

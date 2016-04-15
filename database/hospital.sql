-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2016 at 12:53 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesses`
--

CREATE TABLE `accesses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `action_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `controller_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accesses`
--

INSERT INTO `accesses` (`id`, `name`, `action_name`, `controller_name`, `created_at`, `updated_at`) VALUES
(1, 'Engineer', 'edit', 'AccessController', '2016-04-06 05:50:33', '2016-04-06 05:50:33'),
(2, 'Doctor', 'khairul', 'AccessController', '2016-04-06 05:53:58', '2016-04-07 02:40:29');

-- --------------------------------------------------------

--
-- Table structure for table `access_role`
--

CREATE TABLE `access_role` (
  `access_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `access_role`
--

INSERT INTO `access_role` (`access_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 2),
(1, 3),
(2, 3),
(1, 4),
(1, 5),
(2, 5),
(1, 6),
(2, 6),
(1, 8),
(2, 8),
(1, 8),
(2, 8),
(1, 7),
(2, 7),
(1, 7),
(1, 7),
(2, 7),
(1, 9),
(1, 9),
(1, 10),
(2, 10),
(1, 11),
(2, 11),
(1, 12),
(2, 12),
(1, 13),
(1, 14),
(1, 15),
(2, 15);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(2, 'Eye', '2016-04-10 01:38:08', '2016-04-10 01:38:08'),
(3, 'Kidney', '2016-04-10 01:38:16', '2016-04-10 04:32:40'),
(4, 'Cancer', '2016-04-10 03:25:48', '2016-04-10 03:25:48'),
(5, 'Lever', '2016-04-10 03:27:03', '2016-04-10 03:27:03'),
(6, 'Dental', '2016-04-10 03:40:06', '2016-04-10 04:33:11'),
(7, 'Bone', '2016-04-10 04:24:36', '2016-04-10 04:33:25'),
(9, 'Brain', '2016-04-10 04:33:59', '2016-04-10 04:33:59'),
(10, 'Skin & Sex', '2016-04-11 23:00:06', '2016-04-11 23:00:26'),
(11, 'Hair and Nail', '2016-04-14 22:29:06', '2016-04-14 22:29:21'),
(12, 'Bone and Nail', '2016-04-15 00:20:20', '2016-04-15 00:20:20');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(10) UNSIGNED NOT NULL,
  `phone_number` char(25) COLLATE utf8_unicode_ci NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `education` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `speciality` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `experience` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(20) NOT NULL,
  `time_range` time NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `phone_number`, `doctor_id`, `education`, `speciality`, `experience`, `designation`, `category_id`, `time_range`, `created_at`, `updated_at`) VALUES
(2, '0176321598', 1007035, 'MBBS, DMC, Canada, Ontario University.', 'Skin, bone, metalic and organic chemistry', '4 years at KMC, 2 years at DMC', 'professor', 6, '00:00:03', '2016-04-12 05:38:42', '2016-04-12 05:38:42'),
(3, '01715349945', 1003018, 'MBBS, DMC, FCPS London\r\nFrcs UK\r\nDhaka Medical College', 'Bone, sex and Eye', '4 years at MMC, 2 Years at KMC', 'Assistant Professor', 7, '00:00:04', '2016-04-12 11:18:42', '2016-04-12 11:18:42');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_04_06_101258_create_accesses_table', 1),
('2016_04_06_103435_create_roles_table', 2),
('2016_04_06_111057_create_access_role_table', 3),
('2016_04_06_181055_create_users_table', 4),
('2016_04_08_090051_create_registers_table', 4),
('2016_04_10_051231_create_categories_table', 5),
('2016_04_10_120044_create_doctors_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `registers`
--

CREATE TABLE `registers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `registers`
--

INSERT INTO `registers` (`id`, `name`, `email`, `password`, `address`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'khairul', 'khairulcse26@yahoo.com', '123', 'Khulna, Bangladesh', '3', NULL, '2016-04-08 03:02:59', '2016-04-08 03:02:59'),
(2, 'shamim', 'shamimcse2k10@gmail.com', '123', 'kuet', '3', NULL, '2016-04-08 03:18:18', '2016-04-08 03:18:18'),
(3, 'rabbi', 'khairulcse0026@gmail.com', '234', 'Khulna, Bangladesh', '3', NULL, '2016-04-08 05:48:30', '2016-04-08 05:48:30'),
(5, 'rabbi alasm', 'khairulcse002e6@gmail.com', '2qw', 'Khulna, Bangladesh', '3', NULL, '2016-04-08 05:50:35', '2016-04-08 05:50:35'),
(6, 'KhairulRabbi', 'khairulalamcse004426@gmail.com', '123456', 'Khulna, Bangladesh', '7', NULL, '2016-04-15 00:49:54', '2016-04-15 00:49:54'),
(7, 'sdsf', 'khairulcsewewe26@yahoo.com', '123', 'dsd', '7', NULL, '2016-04-15 01:05:17', '2016-04-15 01:05:17'),
(9, 'trtrtrt', 'trtrtr@gsddgmail.com', '$2y$10$0cugqRL34EnpaWl/2qrX.u2tq/0nqiAIKOv9OsbolfM2QffWxekOK', 'Khulna, Bangladesh', '3', NULL, '2016-04-15 01:13:04', '2016-04-15 01:13:04');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Doctors', 1, '2016-04-06 11:40:40', '2016-04-06 11:40:50'),
(2, 'Admin', 0, '2016-04-06 11:51:57', '2016-04-06 11:51:57'),
(3, 'Patient', 1, '2016-04-07 02:42:21', '2016-04-07 02:42:21'),
(4, 'Receptionist', 0, '2016-04-07 02:42:43', '2016-04-07 02:42:43'),
(5, 'receptions', 1, '2016-04-14 22:24:02', '2016-04-14 22:25:56'),
(6, 'trew', 1, '2016-04-14 22:45:54', '2016-04-14 22:45:54'),
(7, 'Admin', 1, '2016-04-14 22:46:38', '2016-04-14 23:00:22'),
(9, 'Doctors', 1, '2016-04-14 23:06:10', '2016-04-14 23:08:01'),
(10, 'Engineer', 0, '2016-04-14 23:44:17', '2016-04-14 23:44:17'),
(11, 'Recreation with', 1, '2016-04-15 00:28:19', '2016-04-15 00:29:34'),
(12, 'ytytytytytyrrr', 1, '2016-04-15 04:08:29', '2016-04-15 04:08:38'),
(13, 'trw', 1, '2016-04-15 04:12:59', '2016-04-15 04:12:59'),
(14, 'yuoi7', 1, '2016-04-15 04:15:52', '2016-04-15 04:16:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesses`
--
ALTER TABLE `accesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_category_name_unique` (`category_name`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registers`
--
ALTER TABLE `registers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `registers_email_unique` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesses`
--
ALTER TABLE `accesses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `registers`
--
ALTER TABLE `registers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

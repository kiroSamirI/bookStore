-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2019 at 05:27 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `book_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `description`, `created_at`, `updated_at`, `user_id`, `book_image`, `price`) VALUES
(5, 'book Four', 'booook four', '2019-04-16 09:16:57', '2019-04-16 09:16:57', 1, '', '1000'),
(6, 'acja', 'dajvhje', '2019-04-16 11:35:45', '2019-04-16 11:35:45', 2, '', '1000'),
(11, 'Book ONE', 'zdjhvewvhewewjh', '2019-04-18 22:37:26', '2019-04-18 22:37:26', 1, '', '1000'),
(13, 'hf xdtsx', 'fr6p', '2019-04-21 10:13:36', '2019-04-21 10:13:36', 6, '', '1000'),
(14, 'iuhyg7t', 'uygyttfd6er', '2019-04-21 16:11:08', '2019-04-21 16:11:08', 4, 'Capture_1555837867.PNG', '1000'),
(16, 'dkjfgay', 'wkjfwv', '2019-04-21 18:57:10', '2019-04-21 18:57:10', 6, 'Capture_1555847830.PNG', '40'),
(17, 'fcih', 'collage', '2019-04-21 19:25:39', '2019-04-21 19:25:39', 9, 'Capture_1555849538.PNG', '12');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `cost` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `cost`, `created_at`, `updated_at`) VALUES
(1, 6, '0', '2019-04-21 17:52:07', '2019-04-21 17:52:07'),
(2, 6, '0', '2019-04-21 18:56:49', '2019-04-21 18:56:49'),
(3, 9, '0', '2019-04-21 19:24:12', '2019-04-21 19:24:12'),
(4, 9, '0', '2019-04-21 19:25:14', '2019-04-21 19:25:14');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_04_04_011058_create_books_table', 1),
(4, '2019_04_16_014553_add_user_id_to_books', 2),
(10, '2019_04_16_054526_add_book_image_to_books', 3),
(16, '2019_04_20_223750_create_carts_table', 4),
(17, '2019_04_20_232054_add_isadmin_to_users', 4),
(18, '2019_04_21_055627_add_price_to_books', 4);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `admin`) VALUES
(4, 'kirollos', 'kiro.hafez@gmail.com', NULL, '$2y$10$RoaURBB4HNuzWO/4BAwtyuNhO.YimsK08BZaWahvVdWQAMi9WPEsO', NULL, '2019-04-21 08:14:26', '2019-04-21 08:14:26', 0),
(5, 'HAFEZ', 'hafez@gmail.com', NULL, '$2y$10$G4b2Yl0LlX0qTMF3tBdFW.5cWMkeIJrjO9mJa/HNTJUp5luAWBg7q', NULL, '2019-04-21 08:15:00', '2019-04-21 08:15:00', 0),
(6, 'eman', 'eman@admin.com', NULL, '$2y$10$RRYUjiW4IGSgjQDqg1y9g.cVE3fkMdY4rGH/93H9FhPVLLMUpp9da', NULL, '2019-04-21 08:15:35', '2019-04-21 08:15:35', 1),
(8, 'new test', 'newhafez@gmail.com', NULL, '$2y$10$yCPzT/mMfeoDqm28HaK1hOgA1RE/vxbrruAbf1JcZMdz3YYmJt70C', NULL, '2019-04-21 11:09:04', '2019-04-21 11:09:04', 0),
(9, 'eman', 'eman.fcih@gmail.com', NULL, '$2y$10$zojwsFAh5XDv8f6pQiBurOsQBn.g9kEped9Mix6KxPfX84asGBUOu', NULL, '2019-04-21 19:24:11', '2019-04-21 19:24:11', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

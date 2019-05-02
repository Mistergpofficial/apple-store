-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2019 at 12:32 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apple`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `bigimage1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `musicid1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `musicid2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genreid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catid1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imname1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imartist1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` date NOT NULL,
  `version` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_reviews`
--

CREATE TABLE `customer_reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `musicid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `extras`
--

CREATE TABLE `extras` (
  `id` int(10) UNSIGNED NOT NULL,
  `musicid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `track_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `track_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `art_work_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artist_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `average_user_rating` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `featured_apps`
--

CREATE TABLE `featured_apps` (
  `id` int(10) UNSIGNED NOT NULL,
  `artist_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `track_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `track_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `average_user_rating` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_rating_counting` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genres` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `free_apps`
--

CREATE TABLE `free_apps` (
  `id` int(10) UNSIGNED NOT NULL,
  `bigimage1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `musicid1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `musicid2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catid1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imname1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imartist1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` date NOT NULL,
  `version` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `individual_apps`
--

CREATE TABLE `individual_apps` (
  `id` int(10) UNSIGNED NOT NULL,
  `track_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artist_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artist_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `geo_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` date NOT NULL,
  `version` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_advisory` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size_bytes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre_ids` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minimum_os_version` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `average_user_rating` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_rating_counting` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formatted_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `screenshots` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `musicid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `latest_apps`
--

CREATE TABLE `latest_apps` (
  `id` int(10) UNSIGNED NOT NULL,
  `bigimage1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `musicid1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `musicid2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catid1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imname1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imartist1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` date NOT NULL,
  `version` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_04_01_222855_create_top_gross_apps_table', 1),
(4, '2019_04_04_171222_create_featured_apps_table', 1),
(5, '2019_04_06_220617_create_latest_apps_table', 1),
(6, '2019_04_08_183129_create_free_apps_table', 1),
(7, '2019_04_08_185936_create_paid_apps_table', 1),
(8, '2019_04_09_103647_create_individual_apps_table', 1),
(9, '2019_04_09_123727_create_customer_reviews_table', 1),
(10, '2019_04_10_121818_create_extras_table', 1),
(11, '2019_04_10_211018_create_categories_table', 1),
(12, '2019_04_10_233516_create_top_free_apps_table', 1),
(13, '2019_04_11_000901_create_top_apps_grosses_table', 1),
(14, '2019_04_11_002251_create_top_paid_apps_table', 1),
(15, '2019_04_11_155940_create_searches_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `paid_apps`
--

CREATE TABLE `paid_apps` (
  `id` int(10) UNSIGNED NOT NULL,
  `bigimage1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `musicid1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `musicid2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catid1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imname1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imartist1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` date NOT NULL,
  `version` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `searches`
--

CREATE TABLE `searches` (
  `id` int(10) UNSIGNED NOT NULL,
  `search_data` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `track_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `track_name2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `track_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artist_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `primary_genre_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primary_genre_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `top_apps_grosses`
--

CREATE TABLE `top_apps_grosses` (
  `id` int(10) UNSIGNED NOT NULL,
  `bigimage1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `musicid1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `musicid2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catid1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imname1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imartist1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` date NOT NULL,
  `version` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `top_free_apps`
--

CREATE TABLE `top_free_apps` (
  `id` int(10) UNSIGNED NOT NULL,
  `bigimage1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `musicid1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `musicid2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catid1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imname1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imartist1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` date NOT NULL,
  `version` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `top_gross_apps`
--

CREATE TABLE `top_gross_apps` (
  `id` int(10) UNSIGNED NOT NULL,
  `bigimage` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `musicid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `top_paid_apps`
--

CREATE TABLE `top_paid_apps` (
  `id` int(10) UNSIGNED NOT NULL,
  `bigimage1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `musicid1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `musicid2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catid1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imname1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imartist1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` date NOT NULL,
  `version` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_profile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_reviews`
--
ALTER TABLE `customer_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extras`
--
ALTER TABLE `extras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `featured_apps`
--
ALTER TABLE `featured_apps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `free_apps`
--
ALTER TABLE `free_apps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `individual_apps`
--
ALTER TABLE `individual_apps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `latest_apps`
--
ALTER TABLE `latest_apps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paid_apps`
--
ALTER TABLE `paid_apps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `searches`
--
ALTER TABLE `searches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `top_apps_grosses`
--
ALTER TABLE `top_apps_grosses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `top_free_apps`
--
ALTER TABLE `top_free_apps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `top_gross_apps`
--
ALTER TABLE `top_gross_apps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `top_paid_apps`
--
ALTER TABLE `top_paid_apps`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_reviews`
--
ALTER TABLE `customer_reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `extras`
--
ALTER TABLE `extras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `featured_apps`
--
ALTER TABLE `featured_apps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `free_apps`
--
ALTER TABLE `free_apps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `individual_apps`
--
ALTER TABLE `individual_apps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `latest_apps`
--
ALTER TABLE `latest_apps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `paid_apps`
--
ALTER TABLE `paid_apps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `searches`
--
ALTER TABLE `searches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `top_apps_grosses`
--
ALTER TABLE `top_apps_grosses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `top_free_apps`
--
ALTER TABLE `top_free_apps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `top_gross_apps`
--
ALTER TABLE `top_gross_apps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `top_paid_apps`
--
ALTER TABLE `top_paid_apps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

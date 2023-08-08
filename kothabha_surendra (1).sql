-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 26, 2022 at 04:22 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kothabha_surendra`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `photo` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `short_description` text,
  `featured_photo` text,
  `title_1` varchar(191) NOT NULL,
  `value_1` varchar(191) NOT NULL,
  `title_2` varchar(191) NOT NULL,
  `value_2` varchar(191) NOT NULL,
  `title_3` varchar(191) NOT NULL,
  `value_3` varchar(191) NOT NULL,
  `title_4` varchar(191) NOT NULL,
  `value_4` varchar(191) NOT NULL,
  `subtitle` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `title`, `description`, `photo`, `created_at`, `updated_at`, `short_description`, `featured_photo`, `title_1`, `value_1`, `title_2`, `value_2`, `title_3`, `value_3`, `title_4`, `value_4`, `subtitle`) VALUES
(1, 'About Us', '<p>Kotha Bhada is Nepal&#39;s best online property marketplace to rent residential and commercial properties. It is the most preferred real estate portal in Nepal. Kotha Badha Rental aims to fill the gap between users and owners to meet their needs without any hassle. It provides complete information regarding the property to help potential customers get their desired property quickly and easily. It is also a user-friendly online platform where the owners can post their property and ensure an effortless reach to genuine customers.&nbsp;<br />\r\nKotha bhada not only lets you explore the market online. It has considered your every necessity, from finding a property to shifting your belongings. To ease the hassle of visiting different properties to find your happy place, Kotha Bhada enables users to contact our representative, who will personally visit the site and recommend the best location only for you, with just a click at &#39;Find me Room.&#39; Furthermore, we have taken up your stress of finding a vehicle to transport your belongings; find your desired vehicle at your location with just a click at &#39;Shift Home,&#39; which will assist you to move quickly and easily.</p>', '1658336989382250510kb_banner.jpg', '2022-04-07 03:58:02', '2022-07-20 22:09:49', '<p>Kotha Bhada is Nepal&#39;s best and most trusted, ultimate online destination for finding, advertising, and managing Rental . It enables users to explore and find their desired property easily. With thousands of available rental properties in Nepal, Kotha Bhada has a rich experience when it comes to looking after renters. Kotha Badha is equipped with value-added services that can support users through the entire process, from finding your property to packing and shifting your belongings, making it a one-stop solution. Kotha Bhada will be there for you at every step of your journey.</p>', '1658336989439120118kb_banner.jpg', 'Customer', '99', 'Full-time researchers', '4', 'Professionals rely on Preqin', '1', 'Global Offices', '1', 'Sub tititle for about us');

-- --------------------------------------------------------

--
-- Table structure for table `admin_menus`
--

CREATE TABLE `admin_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu_items`
--

CREATE TABLE `admin_menu_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(191) NOT NULL,
  `link` varchar(191) NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  `class` varchar(191) DEFAULT NULL,
  `menu` bigint(20) UNSIGNED DEFAULT NULL,
  `depth` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `photo`, `link`, `ad_type`, `status`, `created_at`, `updated_at`) VALUES
(2, '220712054808.gif', 'https://hongkongbazar.com', '[\"login-page\",\"single-page-sidebar\"]', 1, '2022-06-06 14:54:00', '2022-07-12 10:48:08'),
(5, '220712091318.gif', '#', 'nothing', 1, '2022-07-12 14:13:18', '2022-07-12 14:13:18'),
(6, '220719061636.gif', '#https://hongkongbazar.com/', 'nothing', 1, '2022-07-12 14:31:52', '2022-07-19 23:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `advertisement_positions`
--

CREATE TABLE `advertisement_positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advertisement_id` bigint(20) UNSIGNED NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisement_positions`
--

INSERT INTO `advertisement_positions` (`id`, `advertisement_id`, `position`, `created_at`, `updated_at`) VALUES
(154, 5, 'above-featured-product', '2022-07-15 12:49:45', '2022-07-15 12:49:45'),
(163, 6, 'login-page', '2022-07-19 23:16:36', '2022-07-19 23:16:36'),
(164, 2, 'single-page-sidebar', '2022-07-19 23:18:30', '2022-07-19 23:18:30');

-- --------------------------------------------------------

--
-- Table structure for table `boosting_steps`
--

CREATE TABLE `boosting_steps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `boosting_steps`
--

INSERT INTO `boosting_steps` (`id`, `title`, `order`, `created_at`, `updated_at`) VALUES
(3, 'First \'Promote Now\' link Below', 1, '2022-06-02 11:43:25', '2022-06-02 11:47:05'),
(4, 'Go to active ads', 2, '2022-06-02 11:43:47', '2022-06-02 11:43:47'),
(5, 'Click on Promote', 3, '2022-06-02 11:44:02', '2022-06-02 11:44:02'),
(6, 'Fill out the given form and attach the payment screenshot or bill.', 4, '2022-06-02 11:44:19', '2022-06-02 11:44:33'),
(7, 'The admin will view your request and contact you to complete the further procedure.', 5, '2022-06-02 11:45:15', '2022-06-02 11:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `boost_features`
--

CREATE TABLE `boost_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `boost_features`
--

INSERT INTO `boost_features` (`id`, `title`, `order`, `created_at`, `updated_at`) VALUES
(1, 'boost feature test', 1, '2022-05-03 22:10:23', '2022-05-03 22:10:23'),
(2, 'boost feature test 2', 2, '2022-05-03 22:15:00', '2022-05-03 22:15:00'),
(3, 'boost feature test 3', 3, '2022-05-03 22:15:14', '2022-05-03 22:15:14'),
(4, 'boost feature test 4', 4, '2022-05-03 22:15:34', '2022-05-03 22:15:34');

-- --------------------------------------------------------

--
-- Table structure for table `boost_posts`
--

CREATE TABLE `boost_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(191) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `deposit_slip` varchar(191) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subscription_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `boost_subscriptions`
--

CREATE TABLE `boost_subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature_label_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_value_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_label_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_value_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_label_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_value_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_label_4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_value_4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_label_5` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_value_5` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_label_6` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_value_6` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_label_7` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_value_7` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_label_8` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_value_8` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_label_9` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_value_9` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_label_10` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_value_10` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yellow',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` double(8,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `boost_subscriptions`
--

INSERT INTO `boost_subscriptions` (`id`, `title`, `feature_label_1`, `feature_value_1`, `feature_label_2`, `feature_value_2`, `feature_label_3`, `feature_value_3`, `feature_label_4`, `feature_value_4`, `feature_label_5`, `feature_value_5`, `feature_label_6`, `feature_value_6`, `feature_label_7`, `feature_value_7`, `feature_label_8`, `feature_value_8`, `feature_label_9`, `feature_value_9`, `feature_label_10`, `feature_value_10`, `order`, `status`, `color`, `created_at`, `updated_at`, `price`) VALUES
(1, 'Basic Subscription', 'Facebook Advertisement', 'Boosting', 'You Tube Posting', 'Video posting', 'Local Agent', 'Mobilize 10+local agents', 'Rental Seeker', 'Share with Rental Seeker', 'Recommend', 'For Rental Below 20,000.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '#18ff14', '2022-05-20 16:07:25', '2022-05-30 12:15:04', 3000.00),
(2, 'Intermediate', 'Facebook Advertisement', 'Boosting', 'You Tube Posting', 'Video Posting', 'Local Agent', 'Mobilize 20+local agents', 'Rental Seeker', 'Share with Rental Seeker', NULL, NULL, NULL, NULL, 'Recommend', 'Rental Below rs,40k', NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, '#1fa2db', '2022-05-20 16:08:13', '2022-05-30 18:25:53', 7000.00),
(3, 'Premium', 'Facebook Advertisement', 'Boosting', 'You Tube Posting', 'Video Posting', 'Local Agent', 'Mobilize 50+local agents', 'Rental Seeker', 'Share with Rental Seeker', 'Professional Photo', 'Covered', 'Video', 'Covered', 'Recommend', 'House/Appartments', NULL, NULL, NULL, NULL, NULL, NULL, 25000, 1, '#e4dc07', '2022-05-20 16:09:13', '2022-05-29 16:43:38', 25000.00);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `parent` bigint(20) UNSIGNED DEFAULT NULL,
  `depth` int(11) NOT NULL DEFAULT '1',
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `meta_title` varchar(191) DEFAULT NULL,
  `meta_description` text,
  `meta_keyword` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `parent`, `depth`, `order`, `status`, `created_at`, `updated_at`, `slug`, `meta_title`, `meta_description`, `meta_keyword`) VALUES
(1, 'Residential Property', NULL, 1, 1, 1, '2022-04-06 01:13:15', '2022-06-27 14:55:21', 'Residential Property', 'Eaque nisi perferend', 'Adipisicing soluta e', 'In doloremque non se'),
(2, '1 BHK', 1, 2, 2, 1, '2022-04-06 01:21:45', '2022-07-23 18:12:52', '1 BHK', NULL, NULL, NULL),
(3, 'Commercial Property', NULL, 1, 2, 1, '2022-04-12 01:56:56', '2022-06-27 14:55:56', 'Commercial', 'In quibusdam rerum o', 'Odit quia dolore pos', 'Qui pariatur Cupidi'),
(6, '2BHK', 1, 2, 3, 1, '2022-05-02 17:28:24', '2022-07-23 18:13:13', '2BHK', NULL, NULL, NULL),
(7, '3BHK', 1, 2, 4, 1, '2022-05-02 17:29:39', '2022-07-23 18:13:27', '3BHK', NULL, NULL, NULL),
(8, '4BHK', 1, 2, 5, 1, '2022-05-02 17:30:09', '2022-07-23 18:16:33', '4BHK', NULL, NULL, NULL),
(9, 'FLAT', 1, 2, 4, 1, '2022-05-02 17:30:33', '2022-07-23 18:15:45', 'FLAT', NULL, NULL, NULL),
(10, 'HOUSE', 1, 2, 6, 1, '2022-05-02 17:32:12', '2022-05-02 17:32:12', 'HOUSE', NULL, NULL, NULL),
(11, '1 SHUTTER', 3, 2, 1, 1, '2022-05-02 17:32:40', '2022-05-02 17:32:40', '1 SHUTTER', NULL, NULL, NULL),
(12, 'Appartment/Housing', 1, 2, 9, 1, '2022-05-02 18:25:01', '2022-07-23 18:18:02', 'Appartment/Housing', NULL, NULL, NULL),
(13, 'Office Space', 3, 2, 4, 1, '2022-05-02 18:27:07', '2022-05-02 18:27:07', 'Office Space', NULL, NULL, NULL),
(14, 'Shop/Showroom', 3, 2, 5, 1, '2022-05-02 18:28:33', '2022-05-02 18:28:33', 'Shop/Showroom', NULL, NULL, NULL),
(15, 'Commercial land', 3, 2, 6, 1, '2022-05-02 18:29:10', '2022-05-02 18:29:10', 'Commercial land', NULL, NULL, NULL),
(16, 'Warehouse/Godown', 3, 2, 6, 1, '2022-05-02 18:29:56', '2022-05-02 18:29:56', 'Warehouse/Godown', NULL, NULL, NULL),
(18, 'Industrial Building', 3, 2, 7, 1, '2022-05-02 18:33:14', '2022-05-02 18:33:14', 'Industrial Building', NULL, NULL, NULL),
(21, 'Restaurant/Hotel Space', 3, 2, 4, 1, '2022-05-19 22:56:59', '2022-06-08 12:37:32', 'restauranthotel-space-KB220519055659', NULL, NULL, NULL),
(22, 'Bunglow', 1, 2, 7, 1, '2022-06-06 22:32:22', '2022-06-06 22:32:22', 'bunglow-KB220606053222', NULL, NULL, NULL),
(24, 'Single Room', 1, 2, 1, 1, '2022-07-23 18:11:46', '2022-07-23 18:11:46', 'single-room-KB220723011146', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_categories`
--

CREATE TABLE `contact_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `total_area` varchar(191) NOT NULL,
  `message` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `location` longtext,
  `rental_type` longtext,
  `deposit_slip` varchar(191) DEFAULT NULL,
  `read` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `customer_stories`
--

CREATE TABLE `customer_stories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(191) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `activity` varchar(191) NOT NULL,
  `rating` double(8,2) NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `message` text NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `family_welcomes`
--

CREATE TABLE `family_welcomes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `family_welcomes`
--

INSERT INTO `family_welcomes` (`id`, `title`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Couples', 1, '2022-04-20 03:00:07', '2022-04-20 03:00:07'),
(2, 'Families', 2, '2022-04-20 03:00:17', '2022-04-20 03:00:17'),
(3, 'Students', 3, '2022-04-20 03:00:31', '2022-04-20 03:00:31'),
(4, 'Males', 4, '2022-04-20 03:00:42', '2022-04-20 03:00:42'),
(5, 'Females', 5, '2022-04-20 03:00:53', '2022-04-20 03:00:53');

-- --------------------------------------------------------

--
-- Table structure for table `featured_properties`
--

CREATE TABLE `featured_properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `value` varchar(191) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `title`, `value`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'GYM', 'GYM', 1, 1, '2022-04-06 01:35:11', '2022-05-08 12:27:53'),
(2, 'Swimming Pool', 'Swimming pool', 2, 1, '2022-04-06 01:35:22', '2022-05-08 12:28:20'),
(3, 'Playing Court', 'Playing Court', 3, 1, '2022-05-02 13:21:36', '2022-05-08 12:29:03'),
(4, 'Hospital', 'Hospital', 4, 1, '2022-05-08 12:40:28', '2022-05-08 12:40:28'),
(5, 'School', 'School', 5, 1, '2022-05-08 12:41:19', '2022-05-08 12:41:19'),
(6, 'Montessori Nursery', 'Montessori Nursery', 6, 1, '2022-05-08 13:08:40', '2022-05-08 13:08:40'),
(7, 'College', 'College', 7, 1, '2022-05-08 13:09:08', '2022-05-08 13:20:31'),
(8, 'Temple', 'Temple', 8, 1, '2022-05-08 13:21:13', '2022-05-08 13:21:13'),
(9, 'Resturants', 'Restaurants', 9, 1, '2022-05-08 13:22:27', '2022-05-08 13:22:40'),
(10, 'Super Market', 'Super Market', 10, 1, '2022-05-08 13:23:29', '2022-05-08 13:23:29'),
(11, 'Bus Stop', 'Bus Stop', 11, 1, '2022-05-08 13:24:01', '2022-05-08 13:24:15'),
(12, 'Taxi Stand', 'Taxi Stand', 12, 1, '2022-05-08 13:25:36', '2022-05-08 13:25:36'),
(13, 'Police Station', 'Police Station', 13, 1, '2022-05-08 13:30:51', '2022-05-08 13:30:51'),
(14, 'Bank', 'Bank', 14, 1, '2022-05-25 16:43:25', '2022-07-22 10:40:55'),
(15, 'Banquet Hall', 'Banquet Hall', 15, 1, '2022-06-21 03:46:56', '2022-06-21 03:46:56'),
(16, 'Gas Station', 'Gas Station', 16, 1, '2022-06-21 03:47:53', '2022-06-21 03:47:53');

-- --------------------------------------------------------

--
-- Table structure for table `floors`
--

CREATE TABLE `floors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `value` varchar(191) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `floors`
--

INSERT INTO `floors` (`id`, `title`, `value`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ground Floor', NULL, 1, 1, '2022-04-06 01:33:54', '2022-05-04 15:12:29'),
(2, '2nd Floor', NULL, 3, 1, '2022-04-06 01:34:05', '2022-05-04 15:13:47'),
(3, '3rd Floor', NULL, 4, 1, '2022-04-06 01:34:15', '2022-05-04 15:14:17'),
(4, '4th Floor', NULL, 5, 1, '2022-04-06 01:34:36', '2022-07-19 19:09:30'),
(5, '1st Floor', NULL, 2, 1, '2022-04-20 00:13:14', '2022-05-04 15:12:54'),
(6, '5th Floor +', NULL, 6, 1, '2022-07-19 19:09:51', '2022-07-19 19:09:51');

-- --------------------------------------------------------

--
-- Table structure for table `f_a_q_s`
--

CREATE TABLE `f_a_q_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED DEFAULT NULL,
  `question` varchar(191) NOT NULL,
  `answer` varchar(191) NOT NULL,
  `featured` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `home_facilities`
--

CREATE TABLE `home_facilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `home_facilities`
--

INSERT INTO `home_facilities` (`id`, `title`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Home facility1', 1, '2022-04-20 00:29:49', '2022-04-20 00:29:49'),
(2, 'asdasd', 2, '2022-04-20 00:30:00', '2022-04-20 00:30:00'),
(3, 'Couples', 1, '2022-04-20 02:59:03', '2022-04-20 02:59:03');

-- --------------------------------------------------------

--
-- Table structure for table `home_page_products`
--

CREATE TABLE `home_page_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `home_stay_videos`
--

CREATE TABLE `home_stay_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `link` varchar(191) NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `home_stay_videos`
--

INSERT INTO `home_stay_videos` (`id`, `link`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'https://www.youtube.com/watch?v=tt2k8PGm-TI&list=RDk2qgadSvNyU&index=2', 1, 1, '2022-04-06 04:29:33', '2022-04-06 04:29:33'),
(2, 'https://www.youtube.com/watch?v=tt2k8PGm-TI&list=RDk2qgadSvNyU&index=2', 2, 1, '2022-04-06 04:29:44', '2022-04-06 04:29:44'),
(4, 'https://www.youtube.com/watch?v=tt2k8PGm-TI&list=RDk2qgadSvNyU&index=2', 3, 1, '2022-04-06 04:30:01', '2022-04-06 04:30:01'),
(5, 'https://www.youtube.com/watch?v=tt2k8PGm-TI&list=RDk2qgadSvNyU&index=2', 4, 1, '2022-04-06 04:30:10', '2022-04-06 04:30:10');

-- --------------------------------------------------------

--
-- Table structure for table `home_types`
--

CREATE TABLE `home_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `home_types`
--

INSERT INTO `home_types` (`id`, `title`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Small Home', 1, '2022-04-20 00:26:03', '2022-04-20 00:26:03');

-- --------------------------------------------------------

--
-- Table structure for table `like_forums`
--

CREATE TABLE `like_forums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `support_forum_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `like_forums`
--

INSERT INTO `like_forums` (`id`, `support_forum_id`, `user_id`, `created_at`, `updated_at`) VALUES
(6, 32, 1, '2022-07-24 13:50:16', '2022-07-24 13:50:16');

-- --------------------------------------------------------

--
-- Table structure for table `local_area_facilities`
--

CREATE TABLE `local_area_facilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `local_area_facilities`
--

INSERT INTO `local_area_facilities` (`id`, `title`, `order`, `created_at`, `updated_at`) VALUES
(2, 'Local area Facility', 2, '2022-04-20 01:25:28', '2022-04-20 01:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location` varchar(191) NOT NULL,
  `map_code` varchar(191) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `meta_title` varchar(191) DEFAULT NULL,
  `meta_keyword` varchar(191) DEFAULT NULL,
  `meta_description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location`, `map_code`, `order`, `created_at`, `updated_at`, `status`, `meta_title`, `meta_keyword`, `meta_description`) VALUES
(37, 'Aalapot, katmandu', NULL, 1, '2022-07-19 14:09:22', '2022-07-19 14:09:22', 1, 'Aalapot, Kathmandu, Room Rent, Room finder', NULL, NULL),
(38, 'Ashrang', NULL, 2, '2022-07-19 14:10:23', '2022-07-19 14:10:23', 1, 'Ashrang', NULL, NULL),
(39, 'Baad Bhanjyang', NULL, 3, '2022-07-19 14:11:02', '2022-07-19 14:11:02', 1, 'Baad Bhanjyang', NULL, NULL),
(40, 'Badikhel', NULL, 4, '2022-07-19 14:11:27', '2022-07-19 14:11:27', 1, 'Badikhel', NULL, NULL),
(41, 'Bageswori', NULL, 5, '2022-07-19 14:12:27', '2022-07-19 14:12:27', 1, 'Bageswori', NULL, NULL),
(42, 'Bajrayogini (Sankhu)', NULL, 6, '2022-07-19 14:13:14', '2022-07-19 14:13:14', 1, 'Bajrayogini (Sankhu)', 'Bajrayogini (Sankhu)', NULL),
(43, 'Balambu', NULL, 7, '2022-07-19 14:13:53', '2022-07-19 14:13:53', 1, 'Balambu', 'Balambu', NULL),
(44, 'Balkot', NULL, 8, '2022-07-19 14:28:05', '2022-07-19 14:28:05', 1, 'Balkot, room rental in kathmandu', 'Balkot, rooms in balkot', NULL),
(45, 'Baluwa', NULL, 9, '2022-07-19 14:28:55', '2022-07-19 14:28:55', 1, 'Baluwa, rooms in baluwa, roBaluwaom finder in kathmandu', 'Baluwa', NULL),
(46, 'Bhadrabas', NULL, 10, '2022-07-19 14:30:01', '2022-07-19 14:30:01', 1, 'Bhadrabas, rooms in bhadrabas, rooms in kathmandu', 'Bhadrabas', NULL),
(47, 'Bhaktapur', NULL, 11, '2022-07-19 14:31:23', '2022-07-19 14:31:23', 1, 'Bhaktapur, rooms in bhaktapur, room finder', 'Bhaktapur', NULL),
(48, 'Bhardev', NULL, 12, '2022-07-19 14:33:09', '2022-07-19 14:33:09', 1, 'Bhardev, room rental in bhardev, rooms in lalitpur', 'Bhardev', NULL),
(49, 'Bhattedanda, lalitpur', NULL, 13, '2022-07-19 14:36:26', '2022-07-19 14:36:26', 1, 'Bhattedanda, rooms in lalitpur, foom in kathmandu', 'Bhattedanda, rooms in lalitpur, room in kathmandu', NULL),
(50, 'Bhimdhunga', NULL, 14, '2022-07-19 14:37:31', '2022-07-19 14:37:31', 1, 'room in kathmandu, home shifting', 'Bhimdhunga', NULL),
(51, 'Bisankhunarayan', NULL, 15, '2022-07-19 14:38:28', '2022-07-19 14:38:28', 1, 'room finder in kathmandu, room rental in kathmandu', 'Bisankhunarayan', NULL),
(52, 'Budanilkantha', NULL, 16, '2022-07-19 14:40:00', '2022-07-19 14:40:00', 1, 'Budanilkantha, room in kathmandu, room in nepal', 'room finder in kathmandu, rental website', NULL),
(53, 'Bukhel', NULL, 17, '2022-07-19 14:41:25', '2022-07-19 14:41:25', 1, 'Bukhel', 'Bukhel, room in kathmandu, flat in kathmandu', NULL),
(54, 'Bungamati', NULL, 17, '2022-07-19 14:42:48', '2022-07-19 14:42:48', 1, 'rooms in kathmandu, flat in lathmandu, home shifting', 'rooms in kathmandu, flat in lathmandu, home shifting', NULL),
(55, 'Chalnakhel', NULL, 19, '2022-07-19 14:47:38', '2022-07-19 14:47:38', 1, 'rooms in kathmandu, flat in lathmandu, home shifting', 'rooms in kathmandu, flat in lathmandu, home shifting', NULL),
(56, 'Chandanpur', NULL, 20, '2022-07-19 14:49:01', '2022-07-19 14:49:01', 1, 'Chandanpur', 'room finder in kathmandu, rental website', NULL),
(57, 'Changunarayan', NULL, 21, '2022-07-19 14:49:37', '2022-07-19 14:49:37', 1, 'Changunarayan', 'Changunarayan', NULL),
(58, 'Chapagaun', NULL, 22, '2022-07-19 14:50:03', '2022-07-19 14:50:03', 1, 'Chapagaun', 'Chapagaun', NULL),
(59, 'Chapali Bhadrakali', NULL, 23, '2022-07-19 14:50:34', '2022-07-19 14:50:34', 1, 'Chapali Bhadrakali', 'Chapali Bhadrakali', NULL),
(60, 'Chhaimale', NULL, 24, '2022-07-19 14:52:33', '2022-07-19 14:52:33', 1, 'rooms in Chhaimale', 'Chhaimale', NULL),
(61, 'Om Gyan Mandir School, Arniko Raj Marga, Lokanthali, Madhyapur Thimi, Bhaktapur, Bagmati Pradesh, 44810, Nepal', NULL, 1859, '2022-07-19 19:14:25', '2022-07-19 19:14:25', 0, NULL, NULL, NULL),
(62, 'Madhyapur Thimi, Bhaktapur', NULL, 1965, '2022-07-19 19:38:58', '2022-07-23 15:33:26', 1, NULL, NULL, NULL),
(63, 'Near Dhumbahari Ringroad', NULL, 191, '2022-07-19 22:25:33', '2022-07-19 22:25:33', 0, NULL, NULL, NULL),
(64, 'Near Dhumbahari Ringroad', NULL, 1518, '2022-07-19 22:25:40', '2022-07-19 22:25:40', 0, NULL, NULL, NULL),
(65, 'dhapakhel, lalitpur', NULL, 1790, '2022-07-20 15:55:46', '2022-07-21 12:47:40', 1, NULL, NULL, NULL),
(66, 'Nakhipot, Lalitpur', NULL, 1558, '2022-07-20 17:51:59', '2022-07-21 12:48:04', 1, NULL, NULL, NULL),
(67, 'tripureshwor, kathmandu', NULL, 1573, '2022-07-23 15:30:10', '2022-07-23 15:32:13', 1, NULL, NULL, NULL),
(68, 'jhamsikhel, lalitpur', NULL, 1151, '2022-07-23 15:59:48', '2022-07-23 18:53:20', 1, NULL, NULL, NULL),
(69, 'Patan Dhoka Chakupat, Pulchowk Area, Lalitpur', NULL, 509, '2022-07-23 17:20:04', '2022-07-23 18:54:07', 1, NULL, NULL, NULL),
(70, 'Nakhipot', NULL, 754, '2022-07-23 17:43:10', '2022-07-23 18:53:47', 1, NULL, NULL, NULL),
(71, 'shantinagar, kathmandu', NULL, 1177, '2022-07-23 18:06:38', '2022-07-23 18:53:08', 1, NULL, NULL, NULL),
(72, 'thapa gaun, baneshwor', NULL, 630, '2022-07-23 18:28:06', '2022-07-23 18:52:57', 1, NULL, NULL, NULL),
(73, 'thapa gaun, new baneshwor', NULL, 1541, '2022-07-23 18:40:36', '2022-07-23 18:40:36', 0, NULL, NULL, NULL),
(74, 'sankhamul, ktm', NULL, 1811, '2022-07-25 15:50:36', '2022-07-25 15:50:36', 0, NULL, NULL, NULL),
(75, 'gongabu ganesthan', NULL, 974, '2022-07-25 16:04:38', '2022-07-25 16:04:38', 0, NULL, NULL, NULL),
(76, 'Mandikatar (Dhumbarahi), Kathmandu', NULL, 1619, '2022-07-25 17:53:32', '2022-07-25 17:53:32', 0, NULL, NULL, NULL),
(77, 'chhaune, kathmandu', NULL, 1836, '2022-07-25 18:36:20', '2022-07-25 18:36:20', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_for` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `contact_for`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'My Team', 'Surendra Ojha', 'sojha060@gmail.com', '9860347384', 'asdasdasdasd', '2022-04-07 23:45:08', '2022-04-07 23:45:08'),
(3, 'My Office', 'hongkong bazar', 'test@gmail.com', '987655667776', 'advertisement testing adverestingtisement t', '2022-05-03 22:32:04', '2022-05-03 22:32:04'),
(4, 'My Team', 'Eric', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'Hello, my name’s Eric and I just ran across your website at kothabhada.com...\r\n\r\nI found it after a quick search, so your SEO’s working out…\r\n\r\nContent looks pretty good…\r\n\r\nOne thing’s missing though…\r\n\r\nA QUICK, EASY way to connect with you NOW.\r\n\r\nBecause studies show that a web lead like me will only hang out a few seconds – 7 out of 10 disappear almost instantly, Surf Surf Surf… then gone forever.\r\n\r\nI have the solution:\r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  You’ll know immediately they’re interested and you can call them directly to TALK with them - literally while they’re still on the web looking at your site.\r\n\r\nCLICK HERE https://jumboleadmagnet.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works and even give it a try… it could be huge for your business.\r\n\r\nPlus, now that you’ve got that phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation pronto… which is so powerful, because connecting with someone within the first 5 minutes is 100 times more effective than waiting 30 minutes or more later.\r\n\r\nThe new text messaging feature lets you follow up regularly with new offers, content links, even just follow up notes to build a relationship.\r\n\r\nEverything I’ve just described is extremely simple to implement, cost-effective, and profitable.\r\n \r\nCLICK HERE https://jumboleadmagnet.com to discover what Talk With Web Visitor can do for your business, potentially converting up to 100X more eyeballs into leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE https://jumboleadmagnet.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://jumboleadmagnet.com/unsubscribe.aspx?d=kothabhada.com', '2022-05-27 13:43:07', '2022-05-27 13:43:07'),
(5, 'My Team', 'Eric', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'Hey there, I just found your site, quick question…\r\n\r\nMy name’s Eric, I found kothabhada.com after doing a quick search – you showed up near the top of the rankings, so whatever you’re doing for SEO, looks like it’s working well.\r\n\r\nSo here’s my question – what happens AFTER someone lands on your site?  Anything?\r\n\r\nResearch tells us at least 70% of the people who find your site, after a quick once-over, they disappear… forever.\r\n\r\nThat means that all the work and effort you put into getting them to show up, goes down the tubes.\r\n\r\nWhy would you want all that good work – and the great site you’ve built – go to waste?\r\n\r\nBecause the odds are they’ll just skip over calling or even grabbing their phone, leaving you high and dry.\r\n\r\nBut here’s a thought… what if you could make it super-simple for someone to raise their hand, say, “okay, let’s talk” without requiring them to even pull their cell phone from their pocket?\r\n  \r\nYou can – thanks to revolutionary new software that can literally make that first call happen NOW.\r\n\r\nTalk With Web Visitor is a software widget that sits on your site, ready and waiting to capture any visitor’s Name, Email address and Phone Number.  It lets you know IMMEDIATELY – so that you can talk to that lead while they’re still there at your site.\r\n  \r\nYou know, strike when the iron’s hot!\r\n\r\nCLICK HERE https://jumboleadmagnet.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nWhen targeting leads, you HAVE to act fast – the difference between contacting someone within 5 minutes versus 30 minutes later is huge – like 100 times better!\r\n\r\nThat’s why you should check out our new SMS Text With Lead feature as well… once you’ve captured the phone number of the website visitor, you can automatically kick off a text message (SMS) conversation with them. \r\n \r\nImagine how powerful this could be – even if they don’t take you up on your offer immediately, you can stay in touch with them using text messages to make new offers, provide links to great content, and build your credibility.\r\n\r\nJust this alone could be a game changer to make your website even more effective.\r\n\r\nStrike when  the iron’s hot!\r\n\r\nCLICK HERE https://jumboleadmagnet.com to learn more about everything Talk With Web Visitor can do for your business – you’ll be amazed.\r\n\r\nThanks and keep up the great work!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – you could be converting up to 100x more leads immediately!   \r\nIt even includes International Long Distance Calling. \r\nStop wasting money chasing eyeballs that don’t turn into paying customers. \r\nCLICK HERE https://jumboleadmagnet.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://jumboleadmagnet.com/unsubscribe.aspx?d=kothabhada.com', '2022-05-31 23:28:08', '2022-05-31 23:28:08'),
(6, 'My Office', 'Eric', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'Hi, my name is Eric and I’m betting you’d like your website kothabhada.com to generate more leads.\r\n\r\nHere’s how:\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It signals you as soon as they say they’re interested – so that you can talk to that lead while they’re still there at kothabhada.com.\r\n\r\nTalk With Web Visitor – CLICK HERE http://talkwithwebtraffic.com for a live demo now.\r\n\r\nAnd now that you’ve got their phone number, our new SMS Text With Lead feature enables you to start a text (SMS) conversation – answer questions, provide more info, and close a deal that way.\r\n\r\nIf they don’t take you up on your offer then, just follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nCLICK HERE http://talkwithwebtraffic.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nThe difference between contacting someone within 5 minutes versus a half-hour means you could be converting up to 100X more leads today!\r\n\r\nTry Talk With Web Visitor and get more leads now.\r\n\r\nEric\r\nPS: The studies show 7 out of 10 visitors don’t hang around – you can’t afford to lose them!\r\nTalk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://talkwithwebtraffic.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebtraffic.com/unsubscribe.aspx?d=kothabhada.com', '2022-06-03 15:39:04', '2022-06-03 15:39:04'),
(7, 'My Office', 'Eric', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'Hey there, I just found your site, quick question…\r\n\r\nMy name’s Eric, I found kothabhada.com after doing a quick search – you showed up near the top of the rankings, so whatever you’re doing for SEO, looks like it’s working well.\r\n\r\nSo here’s my question – what happens AFTER someone lands on your site?  Anything?\r\n\r\nResearch tells us at least 70% of the people who find your site, after a quick once-over, they disappear… forever.\r\n\r\nThat means that all the work and effort you put into getting them to show up, goes down the tubes.\r\n\r\nWhy would you want all that good work – and the great site you’ve built – go to waste?\r\n\r\nBecause the odds are they’ll just skip over calling or even grabbing their phone, leaving you high and dry.\r\n\r\nBut here’s a thought… what if you could make it super-simple for someone to raise their hand, say, “okay, let’s talk” without requiring them to even pull their cell phone from their pocket?\r\n  \r\nYou can – thanks to revolutionary new software that can literally make that first call happen NOW.\r\n\r\nTalk With Web Visitor is a software widget that sits on your site, ready and waiting to capture any visitor’s Name, Email address and Phone Number.  It lets you know IMMEDIATELY – so that you can talk to that lead while they’re still there at your site.\r\n  \r\nYou know, strike when the iron’s hot!\r\n\r\nCLICK HERE https://jumboleadmagnet.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nWhen targeting leads, you HAVE to act fast – the difference between contacting someone within 5 minutes versus 30 minutes later is huge – like 100 times better!\r\n\r\nThat’s why you should check out our new SMS Text With Lead feature as well… once you’ve captured the phone number of the website visitor, you can automatically kick off a text message (SMS) conversation with them. \r\n \r\nImagine how powerful this could be – even if they don’t take you up on your offer immediately, you can stay in touch with them using text messages to make new offers, provide links to great content, and build your credibility.\r\n\r\nJust this alone could be a game changer to make your website even more effective.\r\n\r\nStrike when  the iron’s hot!\r\n\r\nCLICK HERE https://jumboleadmagnet.com to learn more about everything Talk With Web Visitor can do for your business – you’ll be amazed.\r\n\r\nThanks and keep up the great work!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – you could be converting up to 100x more leads immediately!   \r\nIt even includes International Long Distance Calling. \r\nStop wasting money chasing eyeballs that don’t turn into paying customers. \r\nCLICK HERE https://jumboleadmagnet.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://jumboleadmagnet.com/unsubscribe.aspx?d=kothabhada.com', '2022-06-05 02:51:53', '2022-06-05 02:51:53'),
(8, 'My Team', 'Eric', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'Hi, Eric here with a quick thought about your website kothabhada.com...\r\n\r\nI’m on the internet a lot and I look at a lot of business websites.\r\n\r\nLike yours, many of them have great content. \r\n\r\nBut all too often, they come up short when it comes to engaging and connecting with anyone who visits.\r\n\r\nI get it – it’s hard.  Studies show 7 out of 10 people who land on a site, abandon it in moments without leaving even a trace.  You got the eyeball, but nothing else.\r\n\r\nHere’s a solution for you…\r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  You’ll know immediately they’re interested and you can call them directly to talk with them literally while they’re still on the web looking at your site.\r\n\r\nCLICK HERE https://jumboleadmagnet.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nIt could be huge for your business – and because you’ve got that phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation – immediately… and contacting someone in that 5 minute window is 100 times more powerful than reaching out 30 minutes or more later.\r\n\r\nPlus, with text messaging you can follow up later with new offers, content links, even just follow up notes to keep the conversation going.\r\n\r\nEverything I’ve just described is extremely simple to implement, cost-effective, and profitable. \r\n \r\nCLICK HERE https://jumboleadmagnet.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more eyeballs into leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE https://jumboleadmagnet.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://jumboleadmagnet.com/unsubscribe.aspx?d=kothabhada.com', '2022-06-08 22:09:31', '2022-06-08 22:09:31'),
(9, 'My Team', 'Eric', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'Hey, this is Eric and I ran across kothabhada.com a few minutes ago.\r\n\r\nLooks great… but now what?\r\n\r\nBy that I mean, when someone like me finds your website – either through Search or just bouncing around – what happens next?  Do you get a lot of leads from your site, or at least enough to make you happy?\r\n\r\nHonestly, most business websites fall a bit short when it comes to generating paying customers. Studies show that 70% of a site’s visitors disappear and are gone forever after just a moment.\r\n\r\nHere’s an idea…\r\n \r\nHow about making it really EASY for every visitor who shows up to get a personal phone call you as soon as they hit your site…\r\n \r\nYou can –\r\n  \r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It signals you the moment they let you know they’re interested – so that you can talk to that lead while they’re literally looking over your site.\r\n\r\nCLICK HERE http://talkwithwebtraffic.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nYou’ll be amazed - the difference between contacting someone within 5 minutes versus a half-hour or more later could increase your results 100-fold.\r\n\r\nIt gets even better… once you’ve captured their phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation.\r\n  \r\nThat way, even if you don’t close a deal right away, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nPretty sweet – AND effective.\r\n\r\nCLICK HERE http://talkwithwebtraffic.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://talkwithwebtraffic.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebtraffic.com/unsubscribe.aspx?d=kothabhada.com', '2022-06-09 01:36:00', '2022-06-09 01:36:00'),
(10, 'My Office', 'Eric', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'Hey, this is Eric and I ran across kothabhada.com a few minutes ago.\r\n\r\nLooks great… but now what?\r\n\r\nBy that I mean, when someone like me finds your website – either through Search or just bouncing around – what happens next?  Do you get a lot of leads from your site, or at least enough to make you happy?\r\n\r\nHonestly, most business websites fall a bit short when it comes to generating paying customers. Studies show that 70% of a site’s visitors disappear and are gone forever after just a moment.\r\n\r\nHere’s an idea…\r\n \r\nHow about making it really EASY for every visitor who shows up to get a personal phone call you as soon as they hit your site…\r\n \r\nYou can –\r\n  \r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It signals you the moment they let you know they’re interested – so that you can talk to that lead while they’re literally looking over your site.\r\n\r\nCLICK HERE http://jumboleadmagnet.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nYou’ll be amazed - the difference between contacting someone within 5 minutes versus a half-hour or more later could increase your results 100-fold.\r\n\r\nIt gets even better… once you’ve captured their phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation.\r\n  \r\nThat way, even if you don’t close a deal right away, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nPretty sweet – AND effective.\r\n\r\nCLICK HERE http://jumboleadmagnet.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://jumboleadmagnet.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://jumboleadmagnet.com/unsubscribe.aspx?d=kothabhada.com', '2022-06-20 11:33:05', '2022-06-20 11:33:05'),
(11, 'My Team', 'hongkong bazar', 'kothatest@gmail.com', '32424324234234', 'contact us message testing, contact us message testing\r\ncontact us message testing, contact us message testing\r\ncontact us message testing, contact us message testing\r\ncontact us message testing, contact us message testing\r\ncontact us message testing, contact us message testing\r\ncontact us message testing, contact us message testing\r\ncontact us message testing, contact us message testing\r\ncontact us message testing, contact us message testing', '2022-06-21 00:14:19', '2022-06-21 00:14:19'),
(12, 'My Team', 'Eric', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'Cool website!\r\n\r\nMy name’s Eric, and I just found your site - kothabhada.com - while surfing the net. You showed up at the top of the search results, so I checked you out. Looks like what you’re doing is pretty cool.\r\n \r\nBut if you don’t mind me asking – after someone like me stumbles across kothabhada.com, what usually happens?\r\n\r\nIs your site generating leads for your business? \r\n \r\nI’m guessing some, but I also bet you’d like more… studies show that 7 out 10 who land on a site wind up leaving without a trace.\r\n\r\nNot good.\r\n\r\nHere’s a thought – what if there was an easy way for every visitor to “raise their hand” to get a phone call from you INSTANTLY… the second they hit your site and said, “call me now.”\r\n\r\nYou can –\r\n  \r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It lets you know IMMEDIATELY – so that you can talk to that lead while they’re literally looking over your site.\r\n\r\nCLICK HERE http://jumboleadmagnet.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nTime is money when it comes to connecting with leads – the difference between contacting someone within 5 minutes versus 30 minutes later can be huge – like 100 times better!\r\n\r\nThat’s why we built out our new SMS Text With Lead feature… because once you’ve captured the visitor’s phone number, you can automatically start a text message (SMS) conversation.\r\n  \r\nThink about the possibilities – even if you don’t close a deal then and there, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nWouldn’t that be cool?\r\n\r\nCLICK HERE http://jumboleadmagnet.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more leads today!\r\nEric\r\n\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://jumboleadmagnet.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://jumboleadmagnet.com/unsubscribe.aspx?d=kothabhada.com', '2022-06-28 14:16:40', '2022-06-28 14:16:40'),
(13, 'My Team', 'Eric', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'Hi, Eric here with a quick thought about your website kothabhada.com...\r\n\r\nI’m on the internet a lot and I look at a lot of business websites.\r\n\r\nLike yours, many of them have great content. \r\n\r\nBut all too often, they come up short when it comes to engaging and connecting with anyone who visits.\r\n\r\nI get it – it’s hard.  Studies show 7 out of 10 people who land on a site, abandon it in moments without leaving even a trace.  You got the eyeball, but nothing else.\r\n\r\nHere’s a solution for you…\r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  You’ll know immediately they’re interested and you can call them directly to talk with them literally while they’re still on the web looking at your site.\r\n\r\nCLICK HERE https://jumboleadmagnet.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nIt could be huge for your business – and because you’ve got that phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation – immediately… and contacting someone in that 5 minute window is 100 times more powerful than reaching out 30 minutes or more later.\r\n\r\nPlus, with text messaging you can follow up later with new offers, content links, even just follow up notes to keep the conversation going.\r\n\r\nEverything I’ve just described is extremely simple to implement, cost-effective, and profitable. \r\n \r\nCLICK HERE https://jumboleadmagnet.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more eyeballs into leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE https://jumboleadmagnet.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://jumboleadmagnet.com/unsubscribe.aspx?d=kothabhada.com', '2022-07-02 15:43:14', '2022-07-02 15:43:14'),
(14, 'My Team', 'Eric', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'Good day, \r\n\r\nMy name is Eric and unlike a lot of emails you might get, I wanted to instead provide you with a word of encouragement – Congratulations\r\n\r\nWhat for?  \r\n\r\nPart of my job is to check out websites and the work you’ve done with kothabhada.com definitely stands out. \r\n\r\nIt’s clear you took building a website seriously and made a real investment of time and resources into making it top quality.\r\n\r\nThere is, however, a catch… more accurately, a question…\r\n\r\nSo when someone like me happens to find your site – maybe at the top of the search results (nice job BTW) or just through a random link, how do you know? \r\n\r\nMore importantly, how do you make a connection with that person?\r\n\r\nStudies show that 7 out of 10 visitors don’t stick around – they’re there one second and then gone with the wind.\r\n\r\nHere’s a way to create INSTANT engagement that you may not have known about… \r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It lets you know INSTANTLY that they’re interested – so that you can talk to that lead while they’re literally checking out kothabhada.com.\r\n\r\nCLICK HERE https://jumboleadmagnet.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nIt could be a game-changer for your business – and it gets even better… once you’ve captured their phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation – immediately (and there’s literally a 100X difference between contacting someone within 5 minutes versus 30 minutes.)\r\n\r\nPlus then, even if you don’t close a deal right away, you can connect later on with text messages for new offers, content links, even just follow up notes to build a relationship.\r\n\r\nEverything I’ve just described is simple, easy, and effective. \r\n\r\nCLICK HERE https://jumboleadmagnet.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE https://jumboleadmagnet.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://jumboleadmagnet.com/unsubscribe.aspx?d=kothabhada.com', '2022-07-09 15:37:17', '2022-07-09 15:37:17'),
(15, 'My Team', 'Eric', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'My name’s Eric and I just came across your website - kothabhada.com - in the search results.\r\n\r\nHere’s what that means to me…\r\n\r\nYour SEO’s working.\r\n\r\nYou’re getting eyeballs – mine at least.\r\n\r\nYour content’s pretty good, wouldn’t change a thing.\r\n\r\nBUT…\r\n\r\nEyeballs don’t pay the bills.\r\n\r\nCUSTOMERS do.\r\n\r\nAnd studies show that 7 out of 10 visitors to a site like kothabhada.com will drop by, take a gander, and then head for the hills without doing anything else.\r\n\r\nIt’s like they never were even there.\r\n\r\nYou can fix this.\r\n\r\nYou can make it super-simple for them to raise their hand, say, “okay, let’s talk” without requiring them to even pull their cell phone from their pocket… thanks to Talk With Web Visitor.\r\n\r\nTalk With Web Visitor is a software widget that sits on your site, ready and waiting to capture any visitor’s Name, Email address and Phone Number.  It lets you know immediately – so you can talk to that lead immediately… without delay… BEFORE they head for those hills.\r\n  \r\nCLICK HERE http://boostleadgeneration.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nNow it’s also true that when reaching out to hot leads, you MUST act fast – the difference between contacting someone within 5 minutes versus 30 minutes later is huge – like 100 times better!\r\n\r\nThat’s what makes our new SMS Text With Lead feature so powerful… you’ve got their phone number, so now you can start a text message (SMS) conversation with them… so even if they don’t take you up on your offer right away, you continue to text them new offers, new content, and new reasons to do business with you.\r\n\r\nThis could change everything for you and your business.\r\n\r\nCLICK HERE http://boostleadgeneration.com to learn more about everything Talk With Web Visitor can do and start turing eyeballs into money.\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – you could be converting up to 100x more leads immediately!   \r\nIt even includes International Long Distance Calling. \r\nPaying customers are out there waiting. \r\nStarting connecting today by CLICKING HERE http://boostleadgeneration.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://boostleadgeneration.com/unsubscribe.aspx?d=kothabhada.com', '2022-07-13 03:06:29', '2022-07-13 03:06:29'),
(16, 'My Team', 'Eric', 'eric.jones.z.mail@gmail.com', '555-555-1212', 'Good day, \r\n\r\nMy name is Eric and unlike a lot of emails you might get, I wanted to instead provide you with a word of encouragement – Congratulations\r\n\r\nWhat for?  \r\n\r\nPart of my job is to check out websites and the work you’ve done with kothabhada.com definitely stands out. \r\n\r\nIt’s clear you took building a website seriously and made a real investment of time and resources into making it top quality.\r\n\r\nThere is, however, a catch… more accurately, a question…\r\n\r\nSo when someone like me happens to find your site – maybe at the top of the search results (nice job BTW) or just through a random link, how do you know? \r\n\r\nMore importantly, how do you make a connection with that person?\r\n\r\nStudies show that 7 out of 10 visitors don’t stick around – they’re there one second and then gone with the wind.\r\n\r\nHere’s a way to create INSTANT engagement that you may not have known about… \r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It lets you know INSTANTLY that they’re interested – so that you can talk to that lead while they’re literally checking out kothabhada.com.\r\n\r\nCLICK HERE https://jumboleadmagnet.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nIt could be a game-changer for your business – and it gets even better… once you’ve captured their phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation – immediately (and there’s literally a 100X difference between contacting someone within 5 minutes versus 30 minutes.)\r\n\r\nPlus then, even if you don’t close a deal right away, you can connect later on with text messages for new offers, content links, even just follow up notes to build a relationship.\r\n\r\nEverything I’ve just described is simple, easy, and effective. \r\n\r\nCLICK HERE https://jumboleadmagnet.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE https://jumboleadmagnet.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://jumboleadmagnet.com/unsubscribe.aspx?d=kothabhada.com', '2022-07-13 15:40:40', '2022-07-13 15:40:40'),
(17, 'My Office', 'Eric', 'ericjonesmyemail@gmail.com', '555-555-1212', 'Hey, my name’s Eric and for just a second, imagine this…\r\n\r\n- Someone does a search and winds up at kothabhada.com.\r\n\r\n- They hang out for a minute to check it out.  “I’m interested… but… maybe…”\r\n\r\n- And then they hit the back button and check out the other search results instead. \r\n\r\n- Bottom line – you got an eyeball, but nothing else to show for it.\r\n\r\n- There they go.\r\n\r\nThis isn’t really your fault – it happens a LOT – studies show 7 out of 10 visitors to any site disappear without leaving a trace.\r\n\r\nBut you CAN fix that.\r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It lets you know right then and there – enabling you to call that lead while they’re literally looking over your site.\r\n\r\nCLICK HERE https://boostleadgeneration.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nTime is money when it comes to connecting with leads – the difference between contacting someone within 5 minutes versus 30 minutes later can be huge – like 100 times better!\r\n\r\nPlus, now that you have their phone number, with our new SMS Text With Lead feature you can automatically start a text (SMS) conversation… so even if you don’t close a deal then, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nStrong stuff.\r\n\r\nCLICK HERE https://boostleadgeneration.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE https://boostleadgeneration.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://boostleadgeneration.com/unsubscribe.aspx?d=kothabhada.com', '2022-07-18 00:15:48', '2022-07-18 00:15:48');

-- --------------------------------------------------------

--
-- Table structure for table `metas`
--

CREATE TABLE `metas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `photo` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `module` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metas`
--

INSERT INTO `metas` (`id`, `meta_title`, `meta_keyword`, `meta_description`, `photo`, `created_at`, `updated_at`, `module`) VALUES
(1, 'Real Estate, Room Finder & Home shifting Service', 'Room finder in Nepal, Home shifting company, buy, sell, rent in kathmandu', 'Room finder in kathmandu, buy, sell, rent in Nepal, home shifting in kathmandu, home shifting in Nepal.', NULL, '2022-06-27 17:09:12', '2022-06-27 19:00:03', 'Home Page');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2017_08_11_073824_create_menus_wp_table', 1),
(5, '2017_08_11_074006_create_menu_items_wp_table', 1),
(6, '2019_01_05_293551_add-role-id-to-menu-items-table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2022_03_23_104831_create_sessions_table', 1),
(10, '2022_03_24_045438_create_settings_table', 1),
(11, '2022_03_24_060633_add_role_user', 1),
(12, '2022_03_24_090502_create_our_services_table', 1),
(13, '2022_03_27_043203_create_user_profiles_table', 1),
(14, '2022_03_27_043943_add_gender_user', 1),
(15, '2022_03_27_050101_add_user_phone', 1),
(16, '2022_03_27_072636_create_locations_table', 1),
(17, '2022_03_27_075813_create_categories_table', 1),
(18, '2022_03_27_084803_create_customer_stories_table', 1),
(19, '2022_03_27_101202_add_message_testimonial', 1),
(20, '2022_03_28_043054_create_properties_table', 1),
(21, '2022_03_28_043649_create_features_table', 1),
(22, '2022_03_28_043725_create_floors_table', 1),
(23, '2022_03_28_043745_create_road_sizes_table', 1),
(24, '2022_03_28_060903_add_token_status_user', 1),
(25, '2022_03_28_071432_add_profile_column', 1),
(26, '2022_03_28_071910_create_profile_locations_table', 1),
(27, '2022_03_28_080156_add_profile_columns', 1),
(28, '2022_03_30_051635_add_additional_column_property', 1),
(29, '2022_03_30_052414_drop_property_column', 1),
(30, '2022_03_30_053008_add_location_id_property', 1),
(31, '2022_03_30_063954_add_nullable_property', 1),
(32, '2022_03_30_070104_add_fullfilled_property', 1),
(33, '2022_03_30_071318_add_expiration_property', 1),
(34, '2022_03_30_074447_add_column_property_add_i_d', 1),
(35, '2022_03_30_100551_create_property_features_table', 1),
(36, '2022_03_30_102319_add_both_property', 1),
(37, '2022_03_31_042722_add_column_property_contact_number', 1),
(38, '2022_03_31_044859_add_column_price_negotiable', 1),
(39, '2022_03_31_052529_create_featured_properties_table', 1),
(40, '2022_03_31_052549_create_recommended_properties_table', 1),
(41, '2022_03_31_064248_create_about_us_table', 1),
(42, '2022_03_31_074014_add_short_description_about_us', 1),
(43, '2022_03_31_074822_add_settings_banner', 1),
(44, '2022_04_01_041548_create_home_page_products_table', 1),
(45, '2022_04_01_061432_create_contact_us_table', 1),
(46, '2022_04_01_061816_create_contact_categories_table', 1),
(47, '2022_04_01_072307_add_status_location', 1),
(48, '2022_04_01_082851_add_slug_property', 1),
(49, '2022_04_01_092111_create_shift_homes_table', 1),
(50, '2022_04_01_105441_create_partners_table', 1),
(51, '2022_04_03_051159_add_column_contact_us', 1),
(52, '2022_04_03_064907_create_wish_lists_table', 1),
(53, '2022_04_03_102606_create_f_a_q_s_table', 1),
(54, '2022_04_04_042651_add_column_f_a_q', 1),
(55, '2022_04_04_055056_create_support_forums_table', 1),
(56, '2022_04_04_063434_create_like_forums_table', 1),
(57, '2022_04_04_075133_create_news_letters_table', 1),
(58, '2022_04_05_055504_create_purposes_table', 1),
(59, '2022_04_05_063229_add_purpose_property', 1),
(60, '2022_04_05_073238_drop_purpose_property', 1),
(61, '2022_04_06_072231_create_property_photos_table', 2),
(62, '2022_04_06_083701_create_quick_links_table', 3),
(63, '2022_04_06_100341_create_home_stay_videos_table', 4),
(65, '2022_04_06_102302_add_video_text_setting', 5),
(66, '2022_04_07_050605_add_capacity_property', 6),
(67, '2022_04_07_070822_create_pages_table', 7),
(68, '2022_04_07_094736_add_feature_photo_about_us', 8),
(69, '2022_04_08_044031_add_home_page_about_us_settings', 9),
(70, '2022_04_08_044711_create_messages_table', 10),
(71, '2022_04_08_081542_add_youtube_setting', 11),
(72, '2022_04_08_083647_add_subtitle_page', 12),
(73, '2022_04_08_084129_add_subtitle_about_us', 13),
(74, '2022_04_12_052943_add_column_setting_add_video', 14),
(75, '2022_04_20_045408_create_home_types_table', 15),
(76, '2022_04_20_045638_create_home_facilities_table', 15),
(77, '2022_04_20_045729_create_local_area_facilities_table', 16),
(78, '2022_04_20_045931_create_rooms_table', 16),
(79, '2022_04_20_083803_create_family_welcomes_table', 17),
(80, '2022_04_20_090516_create_shift_home_items_table', 18),
(81, '2022_04_20_094954_add_item_shift_home', 19),
(82, '2022_04_20_100450_nullable_shift', 20),
(83, '2022_04_26_085221_create_boost_posts_table', 21),
(84, '2022_05_01_052612_add_video_code_property', 22),
(85, '2022_05_02_080257_create_advertisements_table', 23),
(86, '2022_05_02_081740_create_advertisement_positions_table', 23),
(87, '2022_05_02_095743_add_video_field_property', 23),
(88, '2022_05_03_043040_add_column_read_shift_home', 23),
(89, '2022_05_03_051112_nullable_dob', 23),
(90, '2022_05_03_090602_create_boosting_steps_table', 23),
(91, '2022_05_03_091434_add_boost_price_setting', 23),
(92, '2022_05_03_092219_create_boost_features_table', 23),
(93, '2022_05_03_094734_add_q_r_code_setting', 23),
(94, '2022_05_04_054639_add_user_id_testimonial', 24),
(95, '2022_05_04_065916_add_deposit_slip_find_me_room', 24),
(96, '2022_05_04_073559_add_deposit_slip_shift_home', 24),
(97, '2022_05_06_075626_change_price_property', 25),
(98, '2022_05_09_080010_add_category_purpose', 26),
(99, '2022_05_16_044442_add_boost_detail_setting', 26),
(100, '2022_05_16_055459_vendor_dashboard_content', 26),
(101, '2022_05_16_061147_add_shift_home_content', 26),
(102, '2022_05_16_102044_add_slug_category', 26),
(103, '2022_05_17_071135_change_shift_home_content', 27),
(104, '2022_05_18_055725_add_column_property_and_settings', 27),
(105, '2022_05_19_072927_add_bed_rooom_nullable', 27),
(106, '2022_05_20_045025_create_boost_subscriptions_table', 28),
(107, '2022_05_20_060935_add_price_to_subscription', 28),
(108, '2022_05_20_100858_add_subscription_boost_request', 28),
(109, '2022_06_03_093257_change_terms', 29),
(110, '2022_06_17_130516_add_message_shift_home', 30),
(111, '2022_06_17_154730_add_status_contact_us', 31),
(112, '2022_06_19_122954_add_tagline_setting', 31),
(113, '2022_06_26_104728_add_status_shift_home', 32),
(114, '2022_06_26_113845_add_meta_title_property', 33),
(115, '2022_06_26_120347_create_metas_table', 33),
(116, '2022_06_26_144516_add_module_name_meta', 33),
(117, '2022_06_26_153156_add_meta_category', 33),
(118, '2022_06_26_155700_add_meta_keyword_property_category', 33),
(119, '2022_06_27_102518_add_location_meta', 34);

-- --------------------------------------------------------

--
-- Table structure for table `news_letters`
--

CREATE TABLE `news_letters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `news_letters`
--

INSERT INTO `news_letters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'test@gmail.com', '2022-05-04 00:06:38', '2022-05-04 00:06:38'),
(2, 'sieunhangiansv882@gmail.com', '2022-05-11 13:53:47', '2022-05-11 13:53:47'),
(3, 'Elenaisusanos9866@gmail.com', '2022-05-30 03:27:59', '2022-05-30 03:27:59'),
(4, 'asd@gmail.com', '2022-06-08 18:58:10', '2022-06-08 18:58:10'),
(5, 'irubi2813901i91u3@outlook.com', '2022-07-03 07:35:41', '2022-07-03 07:35:41'),
(6, 'kymberly730c46v763mza@outlook.com', '2022-07-19 00:31:31', '2022-07-19 00:31:31'),
(7, 'mtavius4mug6cj9e2i@outlook.com', '2022-07-23 23:08:20', '2022-07-23 23:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `our_services`
--

CREATE TABLE `our_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(191) DEFAULT NULL,
  `parent` bigint(20) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subtitle` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `description`, `photo`, `parent`, `order`, `status`, `created_at`, `updated_at`, `subtitle`) VALUES
(1, 'Terms and Conditions', 'terms-and-conditions', '<p>&nbsp;</p>\r\n\r\n<h1><strong>Kotha Bhada Terms of Use</strong></h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Last Updated: 2/5/2022</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Welcome to the Kotha Bhada dot com Terms of Use agreement. For the intent of this agreement, &ldquo;Website&rdquo; refers to the Company&rsquo;s website, which can be accessed at www.Kothabhada.com. &ldquo;Service&rdquo; refers to the Company&rsquo;s services accessed through the website, in which users can post or search a property for rent. The terms &ldquo;we,&rdquo; &ldquo;us,&rdquo; and &ldquo;our&rdquo; represents the Company. &ldquo;You&rdquo; describes you as a user of our website or our Service.&nbsp;</p>\r\n\r\n<p>The given Terms of Use apply when you view or use our Service via our website at www.kothabhada.com.&nbsp;&nbsp;</p>\r\n\r\n<p>Please study the following terms carefully. By entering or using the Service, you indicate your understanding of these Terms of Use.<strong>&nbsp;If you disagree to be restrained by these Terms of Use in their entirety, you may not access or use the Service</strong>.&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>PRIVACY POLICY</strong></p>\r\n\r\n<p>The Company values the solitude of our Service users. Please study the Company&rsquo;s <a href=\"https://kothabhada.com/page/privacy-policy\"><strong>Privacy Policy</strong></a>, which clarifies how we gather, utilize, and disclose information that pertains to your privacy or security. When you enter or use our Service, you indicate your agreement to the Privacy Policy and these Terms of Use.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>ABOUT THE SERVICE</strong></p>\r\n\r\n<p>The Service privileges you to search for rental properties. We offer a platform for our property owners and property renters to explore the possibilities of a rental. Additionally, we also offer to find a room through an agent and home shifting facility.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>REGISTRATION; REGULATIONS FOR USER CONDUCT AND USE OF THE SERVICE</strong></p>\r\n\r\n<p>You should be above 18 years and a resident of Nepal to register and use the Service.</p>\r\n\r\n<p>In case you are a user who signs up for Service, you have to make a personalized account containing your mail id and a password to access the Service and obtain messages from the Company. You can also use Google and Facebook to log in. You approve to inform us instantly of any uncertified use of the password and/or account. The Company will not be answerable for any liabilities, losses, or harms arising out from the uncertified use of your member name, password, and/or account.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>USE RESTRICTIONS</strong></p>\r\n\r\n<p>Your license to use the website is prepared upon the following use, posting, and conduct limitations:&nbsp;</p>\r\n\r\n<p>You authorize that you will not be under any prospects:</p>\r\n\r\n<p>&middot; enter the Service for any reason other than your personal, non-commercial use solely as authorized by the standard functionality of the Service,</p>\r\n\r\n<p>&middot; gather or harvest any personal data of any user of the Site or the Service&nbsp;</p>\r\n\r\n<p>&middot; use Site or Service for the solicitation of business in practice of business or connection with a commercial enterprise;</p>\r\n\r\n<p>&middot; disseminate any part or parts of the website or the Service without our direct written authorization.</p>\r\n\r\n<p>&middot; use the Service for any illegal intent or the promotion of prohibited activities;</p>\r\n\r\n<p>&middot; attempt to, or harass, abuse or hurt another person or group;</p>\r\n\r\n<p>&middot; use another user&rsquo;s account without authorization;</p>\r\n\r\n<p>&middot; deliberately allow another user to access your account;&nbsp;</p>\r\n\r\n<p>&middot; provide false or incorrect data when signing into the account;</p>\r\n\r\n<p>&middot; intrude or attempt to intrude with the proper processing of the Service;</p>\r\n\r\n<p>&middot; make any robotic use of the site, the Service, or the affiliated systems, or take any measure that we consider in levying or in possibly levying an excessive or disproportionately large burden on our servers or network infrastructure;</p>\r\n\r\n<p>&middot; detour any robot exclusion headers or other measures we take to limit entry to the Service, or use our software or technology to scrape, spider, or crawl the Service or harvest or contrive data;&nbsp;</p>\r\n\r\n<p>&middot; evade, disable or otherwise interfere with any security-related elements of Service or elements that avert or regulate use or copying of essence, or enforce restrictions on the use of the Service or the content accessible via the Service; or&nbsp;</p>\r\n\r\n<p>&middot; issue or connect to harmful content, including deliberate damage or deranging another user&rsquo;s browser or computer.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>POSTING AND CONDUCT DIMINUTION</strong></p>\r\n\r\n<p>When you create your own customized account, you may be able to provide your property description, Prices, photos of the property, etc. (&ldquo;User Content&rdquo;) to the Service. You are solely accountable for the User Content that you issue, upload, connect to, or otherwise make available through the Service.&nbsp;</p>\r\n\r\n<p>&nbsp;You accept that we are only acting as a passive channel for your online dispensation and publication of the User Content. The Company, however, withholds the right to remove any User Content from the website at its sole circumspection.</p>\r\n\r\n<p>We authorize you to use and access our Service, subject to the following conditions neighboring User Content. You agree that failure to adhere to any of these circumstances comprises a material violation&nbsp;of these Terms.&nbsp;</p>\r\n\r\n<p>By circulating and submitting any User Content while using the Service, you should agree to the given statements:</p>\r\n\r\n<p>&middot; You are solely accountable for your account and activity which occurs while marked into or while using your account;</p>\r\n\r\n<p>&middot; You will not post details that are malicious, defamatory, incorrect, or inaccurate;</p>\r\n\r\n<p>&middot; You will not post any statement that is abusive, threatening, obscene, defamatory, libelous, or racially, sexually, religiously, or otherwise objectionable and offensive;</p>\r\n\r\n<p>&middot; You maintain all ownership rights in your User Content, but you are mandated to grant the following rights to the website and users of the Service as set forth more completely under the &ldquo;Intellectual Property&rdquo; provisions below: When you upload or post User Content to the website or the Service, you consent to the website a worldwide, non-exclusive, royalty-free, transferable license to use, reproduce, distribute, formulate derivative works of, display, and execute that content is linked with the condition of the Service; and you give to each user of our Service, a worldwide, non-exclusive, royalty-free authorize to access your User Content through the Service, and to use, reproduce, distribute, prepare imitative works of, display and act such content to the extent permitted by the Service and under these Terms of Use;</p>\r\n\r\n<p>&middot; You will not post content that is copyrighted or subject to third party proprietary rights, along with privacy, publicity, trade secret, or others unless you are the owner of such rights or have the reasonable authorization from their rightful owner to post such content, mainly; and</p>\r\n\r\n<p>&middot; You approve that we have the right to decide whether your User Content requests are relevant and comply with these Terms of Service, terminate any and/or all of your requests, and remove your account with or without prior notice.</p>\r\n\r\n<p>You comprehend and approve that any disadvantage, loss, or damage that occurs due to any User Content that you make public or pass through your use of the Service is solely your responsibility. The site is not accountable for any public exhibit or abuse of your User Content.&nbsp;</p>\r\n\r\n<p>The site does not, and cannot, pre-screen or observe all User Content. However, at our preference, we, or the technology we operate, may attend and/or record your dealings with the Service or other Users.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>ONLINE CONTENT DISCLAIMER</strong></p>\r\n\r\n<p>Kotha Bhada is only a medium that connects the owners and the customers in a platform and doesn&#39;t have any control over any transaction between the owner and the Agent or customer. The details displayed on the website are for information purposes only. We do not tend to hurt anyone&#39;s feelings or emotions by our conduct. Information concerning the properties, properties detail, location data, and listings has been sourced from numerous sources on the best effort basis. Nothing conducted here shall be deemed to comprise legal advice, solicitations, marketing, offers, and invitation to offer by any entity.</p>\r\n\r\n<p>Beliefs, guidance, information, offers, or other data or content made public through the Service, but not literally by the site, are those of their authors and should not necessarily be relied upon. Such authors are solely answerable for such content.&nbsp;</p>\r\n\r\n<p>We do not certify the accuracy, absoluteness, or usefulness of any data on the Site or the Service. We do not embrace or endorse or are accountable for the precision or dependability of any opinion, advice, or statement other parties make. We take no obligation and bear no liability for any User Content that you or any other user or third party posts or sends through the Service. Under no possibilities will we be answerable for any loss or damage resulting from anyone&rsquo;s reliance on information or other content posted on the Service or transmitted to users.</p>\r\n\r\n<p>Though we seek to implement these Terms of Use, you may be exposed to User Content that is incorrect or objectionable when you use or access the Site or the Service. We withhold the right but have no burden to monitor the materials posted in the public areas of the Site or the Service or modify or deny a user&rsquo;s access to the Service or carry out other suitable action if a user breaches these Terms of Use or encounters in any activity that disobeys the rights of any person or entity or which we consider unlawful, offensive, abusive, harmful or malicious. The Company shall have the right to remove any material that in its sole opinion violates or is alleged to violate the law or this agreement or which might be offensive, violate the rights, harm, or jeopardize the safety of users or others. Unauthorized use may result in unlawful and/or civil prosecution under State and local law. If you become aware of misuse of our Service or violation of these Terms of Use, please get in touch with us at info@kothabhada.com.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>LINKS TO OTHER SITES AND/OR MATERIALS</strong></p>\r\n\r\n<p>As part of the Service, we may deliver you suitable links to a third-party website(s) (&ldquo;Third Party Sites&rdquo;) as well as content or objects belonging to or emanating from third parties (the &ldquo;Third Party Applications, Software or Content&rdquo;). These ties are provided as a polish to Service subscribers. We have no control over Third Party Sites or Third Party Applications, Software or Content, or the advertisements, materials, information, goods, or services obtainable on these Third Party Sites or Third Party Applications, Software, or Content. Such Third-Party Sites and Third Party Applications, Software, or Content are not scrutinized, monitored, or checked for precision, appropriateness, or wholeness. We are not accountable for any Third Party Sites accessed through the Site or any Third Party Applications, Software, or Content posted on, accessible through, or installed from the site, including the content, precision, offensiveness, opinions, reliability, privacy practices, or other policies of or included in the Third Party Sites or the Third Party Applications, Software or Content. Inclusion of, linking to, or allowing the use or installation of any Third Party Site or any Third Party Applications, Software, or Content does not allude to our approval or endorsement. Suppose you determine to leave the site and access the Third Party Sites or to use or install any Third Party Applications, Software, or Content. In that case, you do so at your peril, and you should be conscious that our terms and policies, including these Terms of Use, no longer govern. You should review the applicable terms and policies, including privacy and data conference practices, of any Third Party Site to which you guide from the site or any applications you use or install from the Third Party Site.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>INTELLECTUAL PROPERTY</strong></p>\r\n\r\n<p>You acknowledge and approve that we and our licensors maintain ownership of all intellectual property rights bonded to the Service, including appropriate copyrights, trademarks, and other proprietary rights. Other product and company names mentioned on the Service may be trademarks of their respective owners. We secure all rights not expressly given to you under these Terms of Use.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>WARRANTY DISCLAIMER</strong></p>\r\n\r\n<p>OUR SERVICE IS EQUIPPED &ldquo;AS IS,&rdquo; WITHOUT A WARRANTY OF ANY KIND. WITHOUT LIMITING THE PRECEDING, WE EXPRESSLY DISCLAIM ALL WARRANTIES, WHETHER EXPRESS, INDICATED, OR STATUTORY, REGARDING THE SERVICE, INCLUDING, WITHOUT BOUNDARY, ANY WARRANTY OF MERCHANTABILITY, FITNESS FOR A PARTICULAR AIM, TITLE, SECURITY, PRECISION, AND NON-INFRINGEMENT. WITHOUT SPECIFYING THE PRECEDING, WE MAKE NO WARRANTY OR REPRESENTATION THAT ACCESS TO OR FUNCTION OF THE SERVICE WILL BE UNINTERRUPTED OR ERROR-FREE. YOU ACCEPT THE FULL BURDEN AND HAZARD OF LOSS RESULTING FROM YOUR DOWNLOADING AND/OR USE OF FILES, STATEMENTS, CONTENT, OR OTHER MATERIAL BROUGHT FROM THE SERVICE. SOME JURISDICTIONS LIMIT OR DO NOT AUTHORIZE DISCLAIMERS OF WARRANTY, SO THIS CONDITION MAY NOT APPLY TO YOU.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>LIMITATION OF DAMAGES</strong>;&nbsp;<strong>RELEASE</strong></p>\r\n\r\n<p>TO THE TIME ALLOWED BY PRACTICAL LAW, IN NO EVENT SHALL THE SITE, THE SERVICE, ITS COMPANIONS, DIRECTORS, OR EMPLOYEES, OR ITS LICENSORS OR PARTNERS, BE RESPONSIBLE TO YOU FOR ANY LOSS OF PROFITS, USE, OR INFORMATION, OR FOR ANY ACCIDENTAL, INDIRECT, SPECIAL, SUBSTANTIAL OR ILLUSTRATIVE DAMAGES, HOWEVER EMERGING, THAT RESULT FROM: (A) THE USE, REVELATION, OR EXHIBIT OF YOUR USER CONTENT; (B) YOUR USE OR INCAPACITY TO USE THE SERVICE; (C) THE SERVICE TYPICALLY OR THE SOFTWARE OR SYSTEMS THAT MAKE THE SERVICE AVAILABLE; OR (D) ANY OTHER EXCHANGES WITH US OR WITH ANY OTHER USER OF THE SERVICE, WHETHER BASED ON WARRANTY, CONTRACT, TORT (INCLUDING DELINQUENCY) OR ANY OTHER LEGAL THEORY, AND WHETHER OR NOT WE HAVE BEEN ANNOUNCED OF THE POTENTIAL OF SUCH DAMAGE, AND EVEN IF A REMEDY SET FORTH HEREIN IS FOUND TO HAVE FAILED OF ITS VIRTUAL PURPOSE. SOME JURISDICTIONS LIMIT OR DO NOT AUTHORIZE DISCLAIMERS OF LIABILITY, SO THIS PROVISION MAY NOT APPLY TO YOU.</p>\r\n\r\n<p>Suppose you have a conflict with one or more users, hosts, or a merchant of a service that you review using the Service. In that case, you release us (and our authorities, directors, agents, subsidiaries, joint ventures, and employees) from claims, demands, and damages (actual and consequential) of every kind and nature, known and unknown, arising out of or in any way connected with such arguments.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>MODIFICATION OF TERMS OF USE</strong></p>\r\n\r\n<p>We can revise these Terms of Use at any moment and will update these Terms of Use in the event of any such modifications. It is your sole obligation to check the site occasionally to view any such changes in this contract. Your persisted use of the site or the Service indicates your agreement to our modifications to these Terms of Use. We will attempt to inform you of content changes to the Terms by publishing a notice on our homepage and/or sending an email to the email address you provided to us upon signup. You should keep your contact and profile details current for this additional reason. Any changes to these Terms (other than as outlined in this paragraph) or disclaimer of our rights hereunder shall not be reasonable or adequate except in a written contract enduring the physical signature of one of our officers. No purported rejection or modification of this agreement on our part through telephonic or email communications shall be valid.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>GENERAL TERMS</strong></p>\r\n\r\n<p>Suppose any part of this Terms of Use contract is held or seen as invalid or unenforceable. In that case, that part of the agreement will be construed to be compatible with applicable law, while the remaining portions of the contract will stay in full force and impact. Any failure on our part to implement any prerequisite of this agreement will not be deemed a disclaimer of our right to enforce such a requirement. Our rights under this agreement survive any transfer or cessation of this agreement.</p>\r\n\r\n<p>You approve that any cause of action connected to or arising out of your connection with the Company must begin within ONE year after the cause of action accrues. Otherwise, such cause of action is permanently barred.</p>\r\n\r\n<p>We may assign or entrust these Terms of Service and/or our Privacy Policy, in whole or in part, to any person or entity at any time with or without your consent. Without our prior written authorization, you may not assign or entrust any rights or duties under the Terms of Service or Privacy Policy. Any unauthorized assignment or representatives by you is void.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>YOU CONCEDE THAT YOU HAVE READ THESE TERMS OF USE, COMPREHEND THE TERMS OF USE, AND WILL BE BOUND BY THESE TERMS AND CONDITIONS. YOU FURTHER CONCEDE THAT THESE TERMS OF USE TOGETHER WITH THE <a href=\"https://kothabhada.com/page/privacy-policy\"><strong>PRIVACY POLICY</strong></a> DENOTE THE COMPLETE AND PREMIER STATEMENT OF THE AGREEMENT BETWEEN US AND THAT IT DISPLACES ANY PROPOSAL OR PRIOR AGREEMENT ORAL OR WRITTEN, AND ANY OTHER COMMUNICATIONS BETWEEN US RELATING TO THE SUBJECT MATTER OF THIS AGREEMENT.</p>', '220502044940.jpg', NULL, 1, 1, '2022-04-07 01:41:00', '2022-06-02 11:30:55', 'Terms of use'),
(5, 'Privacy Policy', 'privacy-policy', '<h1><strong>KOTHA BHADA PRIVACY POLICY</strong></h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Kotha Bhada dot com (the &quot;Company&quot;) is dedicated to maintaining robust privacy protections for its users. Our Privacy Policy (&quot;Privacy Policy&quot;) is developed to help you comprehend how we gather, utilize and protect the data you provide to us and assist you in producing informed decisions when using our Service.&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>For objectives of this Agreement, &quot;Site&quot; refers to the Company&#39;s Website, which can be accessed at Kothabhada.com.</p>\r\n\r\n<p>&quot;Service&quot; refers to the Company&#39;s services accessed via the Website, in which users can post or search a property for rent.</p>\r\n\r\n<p>The phrases &quot;we,&quot; &quot;us,&quot; and &quot;our&quot; refer to the Company.</p>\r\n\r\n<p>&quot;You&quot; refers to the user of our Website or our Service.&nbsp;</p>\r\n\r\n<p>By accessing our Website or our Service, you consent to our Privacy Policy and <a href=\"https://kothabhada.com/page/terms-and-conditions\"><strong>Terms of Use</strong></a>. You agree to our collection, storage, usage, and disclosure of your Personal Information as defined in this Privacy Policy.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>I. INFORMATION WE COLLECT</p>\r\n\r\n<p>We gather &quot;Non-Personal Details&quot; and &quot;Personal Information.&quot;&nbsp;<strong>Non-Personal Details</strong>&nbsp;include information that cannot be used to determine the user, such as unidentified usage data, general demographic information, referring/exit pages and URLs, medium types, choices you submit, and choices that are generated based on the details you raise and the number of clicks.&nbsp;<strong>Personal information</strong>&nbsp;includes your email address, date of birth, marital status, location, name, contact information, computer ID, Internet IP address, etc., which you provide to us through the registration process at the Site.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>1.&nbsp; &nbsp;<em>Details collected via Technology</em></p>\r\n\r\n<p>To start the Service, you do not need to provide any Personal Information other than your email address. To use the Service after that, you need to submit further Personal Information like legal name, address, payment mode details, etc. However, to enhance the quality of the Service, we track details fed to us by your browser when you view or use the Service, such as the Website you came from (known as the &quot;referring URL&quot;), the kind of browser you use, the instrument from which you connected to the Service, the time and date of entrance, and other information that does not personally identify you. We track these details using cookies or small text files, including a unique anonymous identifier. Cookies are transmitted to a user&#39;s browser from our servers and are stored on the user&#39;s computer hard drive. Dispatching a cookie to a user&#39;s browser lets us gather Non-Personal Information about that user and record the user&#39;s choices when using our services, both on an individual and aggregate basis. For example, the Company may use cookies to collect the following information:</p>\r\n\r\n<ul>\r\n	<li>Domain Name</li>\r\n	<li>Time Spent&nbsp;</li>\r\n	<li>Meta Data&nbsp;</li>\r\n	<li>Visited sub-pages&nbsp;</li>\r\n	<li>User Settings&nbsp;</li>\r\n	<li>IP address&nbsp;</li>\r\n	<li>Computer ID&nbsp;</li>\r\n</ul>\r\n\r\n<p>The Company may use both persistent and session cookies; persistent cookies stay on your computer after you shut your session and until you delete them, while session cookies expire when you shut your browser.&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>2.&nbsp; &nbsp;<em>Details you provide us by registering for an account</em></p>\r\n\r\n<p>In addition to the details provided automatically by your browser when you visit the Website, you will need to build a personal profile to become a subscriber to the Service. You can make a profile by registering with the Service, and entering your email address, and password. By registering, you permit us to gather, store, and utilize your email address according to this Privacy Policy.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>3.&nbsp;<em>Children&#39;s Privacy</em></p>\r\n\r\n<p>The Website and the Service are not directed to anyone under 18. The Website does not knowingly collect/solicit information from anyone under 18 or allow anyone under 18 to sign up for Service. In the event that we learn that we have collected personal information from anyone under 18 without the permission of a parent or guardian, we will delete that data as soon as possible. If you believe we have collected such information, please contact us at info@kothabhada.com.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>II. HOW WE USE AND SHARE INFORMATION</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Personal Information:</em></p>\r\n\r\n<p>Except as otherwise noted in this Privacy Policy, we do not sell, exchange, rent, or transfer your Personal Information with third parties without your authorization for marketing purposes. We share Personal Information with vendors who are serving the Company, such as the servers for our email communications who are provided entrance to the user&#39;s email addresses to send emails from us. Those vendors use your Personal Information only in our guide and per our Privacy Policy.</p>\r\n\r\n<p>In general, the Personal Information you give to us is used to enable us to communicate with you. For example, we use Personal Information to contact users in reply to questions, request feedback from users, provide technical support, and inform users about promotional offers.</p>\r\n\r\n<p>We may provide Personal Information to external parties if we have good faith that access, use, protection, or exposure of the information is essential to meet any appropriate legal process or enforceable governmental request. To enforce applicable Terms of Service, including investigation of possible violations; handle fraud, security, or technical concerns; or protect against harm to the rights, property, or safety of our users or the public as mandated or authorized by law.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Non-Personal Information:</em></p>\r\n\r\n<p>In general, we use Non-Personal Information to help us enhance the Service and customize the user experience. We also aggregate Non-Personal Information to follow fads and study use practices on the Site. This Privacy Policy does not restrict our use or exposure of Non-Personal Information. We secure the right to utilize and reveal such Non-Personal Information to our partners, advertisers, and other third parties at our discretion.</p>\r\n\r\n<p>In the event we undergo a business trade such as a merger, purchase by another company, or sale of all or a part of our assets, your Personal Information may be among the assets transferred. You acknowledge and approve that such transfers may emerge and are permitted by this Privacy Policy. Any acquirer of our assets may continue to process your Personal Information as outlined in this Privacy Policy. If our information rules change at any time in the future, we will post the policy changes to the Website so that you may opt-out of the new details practices. We recommend checking the Website occasionally if you are concerned about how your information is used.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>III. HOW WE PROTECT INFORMATION</p>\r\n\r\n<p>We enforce security measures developed to protect your information from unauthorized access. Your account password protects your account, and we urge you to take steps to keep your Personal Information safe by not revealing your password and by logging out of your account after every use. We also safeguard your details from possible security violations by enforcing specific technological security measures, including encryption and firewall technology. However, these efforts do not guarantee that your information will not be accessed, disclosed, altered, or destroyed by breach of such firewalls and secure server software. By using our Service, you acknowledge that you understand and agree to take these risks.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>IV. LINKS TO OTHER WEBSITES</p>\r\n\r\n<p>As part of the Service, we may deliver links to or compatible with other websites. Nevertheless, we are not liable for the privacy approaches utilized by those websites or the data or scope they possess. This Privacy Policy applies exclusively to data collected by us through the Website and the Service. Thus, this Privacy Policy does not involve your use of a third-party website accessed by choosing a link on our Website or via our Service. During the period that you access or operate the Service through or on another website, the other Web site&#39;s privacy policy will involve your access or use of that Website or application. We urge our users to read the privacy policy information of other websites before proceeding to use them.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>V. CHANGES TO OUR PRIVACY POLICY</p>\r\n\r\n<p>The Company reserves the right to modify this policy and our Terms of Use. We will inform you of substantial changes to our Privacy Policy by mailing a notification to the primary email address identified in your account or by placing a conspicuous notice on our Site. Meaningful changes will go into effect 30 days following such notification. Non-material modifications or clarifications will take effect instantly. You should occasionally check the Website and this privacy page for updates.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>VI. CONTACT US</p>\r\n\r\n<p>If you have any queries concerning this Privacy Policy or the courses of this Site, don&#39;t hesitate to contact us by sending an email to info@kothabhada.com.</p>\r\n\r\n<p>This Privacy Policy was last updated on 5/2/2022.</p>', '220408084900.jpg', NULL, 2, 1, '2022-04-08 03:04:00', '2022-06-02 11:31:32', 'Privacy Policy'),
(7, '8 page', '8-page', '<p>8 page&nbsp;</p>\r\n\r\n<p>8 page&nbsp;</p>\r\n\r\n<p>8 page&nbsp;</p>', '220608065857.png', NULL, 3, 1, '2022-06-08 11:58:57', '2022-06-08 11:58:57', '8 page'),
(8, '20 page', '20-page', '<p>20 papge 20 page&nbsp;20 papge 20 page&nbsp;&nbsp;20 papge 20 page&nbsp;&nbsp;20 papge 20 page&nbsp;&nbsp;20 papge 20 page&nbsp;20 papge 20 page&nbsp;&nbsp;20 papge 20 page&nbsp;&nbsp;20 papge 20 page&nbsp;&nbsp;20 papge 20 page&nbsp;20 papge 20 page&nbsp;&nbsp;20 papge 20 page&nbsp;&nbsp;20 papge 20 page&nbsp;&nbsp;20 papge 20 page&nbsp;20 papge 20 page&nbsp;&nbsp;20 papge 20 page&nbsp;&nbsp;20 papge 20 page&nbsp;&nbsp;20 papge 20 page&nbsp;20 papge 20 page&nbsp;&nbsp;20 papge 20 page&nbsp;&nbsp;20 papge 20 page&nbsp;&nbsp;20 papge 20 page&nbsp;20 papge 20 page&nbsp;&nbsp;20 papge 20 page&nbsp;&nbsp;20 papge 20 page&nbsp;&nbsp;20 papge 20 page&nbsp;20 papge 20 page&nbsp;&nbsp;20 papge 20 page&nbsp;&nbsp;20 papge 20 page&nbsp;&nbsp;20 papge 20 page&nbsp;20 papge 20 page&nbsp;&nbsp;20 papge 20 page&nbsp;&nbsp;20 papge 20 page&nbsp;&nbsp;</p>', '220620063543.jpg', NULL, 3, 1, '2022-06-20 23:35:43', '2022-06-20 23:35:43', '20 page');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` text NOT NULL,
  `link` varchar(191) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `photo`, `link`, `order`, `status`, `created_at`, `updated_at`) VALUES
(13, '220719085458.png', 'https://kothabhada.com/', 1, 1, '2022-07-19 13:54:58', '2022-07-19 13:54:58'),
(14, '220720051756.jpg', 'https://hongkongbazar.com/', 1, 1, '2022-07-20 22:12:24', '2022-07-20 22:17:56');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('sagarpoudel369@gmail.com', '$2y$10$LwJJHIvs2O80lc0PszQQHu2FgvSfvgmpVVvcSYlmHBYWWxRj3/esW', '2022-06-11 21:52:58'),
('hongkongbazarnepal@gmail.com', '$2y$10$XQl5latJCdnEvtCZE/6B1OKBoQ1SwYcjZpqsv13kVmLBEMWXZ8cIu', '2022-06-11 22:04:35');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `profile_locations`
--

CREATE TABLE `profile_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profile_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `date_of_build` varchar(191) DEFAULT NULL,
  `view` bigint(20) NOT NULL DEFAULT '0',
  `bedroom` varchar(191) DEFAULT NULL,
  `bathroom` varchar(191) DEFAULT NULL,
  `parking` varchar(191) DEFAULT NULL,
  `balcony` varchar(191) DEFAULT NULL,
  `water` varchar(191) DEFAULT NULL,
  `location_for_map` varchar(191) DEFAULT NULL,
  `overview` text,
  `featured_photo` text,
  `featured_video` text,
  `price` bigint(20) NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `floor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `road_size_id` bigint(20) UNSIGNED DEFAULT NULL,
  `location_id` bigint(20) UNSIGNED DEFAULT NULL,
  `fulfilled` int(11) NOT NULL DEFAULT '0',
  `expiration_date` date NOT NULL,
  `ad_id` varchar(191) NOT NULL DEFAULT 'KB',
  `both` int(11) NOT NULL DEFAULT '0',
  `kitchen` varchar(191) DEFAULT NULL,
  `furnishing` varchar(191) DEFAULT NULL,
  `faced` varchar(191) DEFAULT NULL,
  `contact_number` varchar(191) DEFAULT NULL,
  `area_covered` varchar(191) DEFAULT NULL,
  `buld_up_area` varchar(191) DEFAULT NULL,
  `price_negotiable` int(11) NOT NULL DEFAULT '0',
  `slug` varchar(191) DEFAULT NULL,
  `purpose_id` bigint(20) UNSIGNED DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `video_code` varchar(191) DEFAULT NULL,
  `video` varchar(191) DEFAULT NULL,
  `pantry` text,
  `lift` text,
  `wifi_cable` text,
  `meta_title` varchar(191) DEFAULT NULL,
  `meta_description` text,
  `meta_keyword` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `title`, `date_of_build`, `view`, `bedroom`, `bathroom`, `parking`, `balcony`, `water`, `location_for_map`, `overview`, `featured_photo`, `featured_video`, `price`, `category_id`, `sub_category_id`, `user_id`, `status`, `created_at`, `updated_at`, `floor_id`, `road_size_id`, `location_id`, `fulfilled`, `expiration_date`, `ad_id`, `both`, `kitchen`, `furnishing`, `faced`, `contact_number`, `area_covered`, `buld_up_area`, `price_negotiable`, `slug`, `purpose_id`, `capacity`, `video_code`, `video`, `pantry`, `lift`, `wifi_cable`, `meta_title`, `meta_description`, `meta_keyword`) VALUES
(66, 'Flat on rent at kausaltar', '2073', 6, '2', '1', 'Yes', '1', '1', NULL, '<ul>\r\n	<li>2 bed room</li>\r\n	<li>1 living room</li>\r\n	<li>1 kitchen</li>\r\n	<li>1 bathroom</li>\r\n	<li>front and back open balcony</li>\r\n	<li>24 hours water supply</li>\r\n	<li>flat at 4th floor</li>\r\n	<li>very comfortable</li>\r\n</ul>\r\n\r\n<p><strong>any one interested pls call 9861311421 for more information</strong></p>', '1658305014299046422WhatsApp Image 2022-07-19 at 6.32.42 PM.jpeg', NULL, 17000, 1, 6, 1, 1, '2022-07-19 19:14:25', '2022-07-24 06:02:28', 4, 2, 62, 0, '2023-04-20', 'KB2207190214251', 0, '1', 'Semi Furnished', 'East', '9861311421', NULL, NULL, 0, 'flat-on-rent-at-kausaltar-KB2207190214251', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'rooms in bhaktapur, flat in bhaktapur', 'property finder in bhaktapur, home shifting in kathmandu, house in bhaktapur', 'room finder in bhaktapur'),
(68, 'Flat System House on Sell', '2075', 23, '15', '6', 'Yes', '1', '1', NULL, '<p><strong>House sell - flat system, 3 storey, residential house</strong></p>\r\n\r\n<p><strong>Bhukampa paxi baneko naya ghar.</strong></p>\r\n\r\n<p><strong>total cost 6,75,00,000</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Ktm dhumbarahima ringroad najikai gopi-kishna bridge bata ringroad bhitra Toyota Company sangai</strong></li>\r\n	<li><strong>south-east face mohodako</strong></li>\r\n	<li><strong>11-12 foot ko bato</strong></li>\r\n	<li><strong>minimum 5 crore mathi parney</strong></li>\r\n	<li><strong>8 ana(242.40) jagga ma</strong></li>\r\n	<li><strong>aaileko mapdand ma 14/14/, 12/12 ka pillar, 20/16 layen ka dandi </strong></li>\r\n	<li><strong>terai ko iitta bata nirmit.</strong></li>\r\n	<li><strong>1 flat ma 5 phrakila room with 2 attached bathroom</strong></li>\r\n	<li><strong>3-4 vehicle parking</strong></li>\r\n</ul>\r\n\r\n<p>** aaspass ko purano ghar wa jagga sanga pani exchange garna sakiney.</p>\r\n\r\n<p>Direct from owner. 9841420589</p>\r\n\r\n<p> </p>', '16583045691933380273cheap_house_kothabhada.jpeg', NULL, 67500000, 1, 10, 1, 1, '2022-07-19 22:25:40', '2022-07-23 05:05:10', 3, 2, 64, 0, '2023-04-20', 'KB2207190525401', 0, '1', 'No', 'South', '9841420589', NULL, NULL, 0, 'flat-system-house-on-sell-KB2207190525401', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, '1 BHK Semi Furnished Apartment Rent In Dhapakhel', '2070', 12, '1', '1', 'Yes', '1', '1', NULL, '<p>✅1 Bedroom (wardrobe + 1 bed)</p>\r\n\r\n<p>✅Kitchen with attached Living Room</p>\r\n\r\n<p>✅1 Bathroom ✅Private big terrace</p>\r\n\r\n<p>✅24/7 hr security , water facility , electricity backup and many more facilities</p>\r\n\r\n<p>✅Near gems school and Sumeru hospital , opposite ICIMOD</p>\r\n\r\n<p>✅Swimming pool , gym etc.</p>\r\n\r\n<p>💵NOTES:- Contact us in Our no:-9862998038</p>\r\n\r\n<p>We are Also on WhatsApp/Viber</p>\r\n\r\n<p>♻️Form Fee rs 300/-lagne chha Aru Kunai Broker Charge Lagne Chhaina</p>\r\n\r\n<p>♻️ 3-month rent advance Needed Compulsory.</p>', '165831454612857587581 BHK Semi Furnished Apartment Rent In Dhapakhel lalitpur.jpeg', NULL, 30000, 1, 12, 1, 2, '2022-07-20 15:55:46', '2022-07-24 06:03:51', 6, 2, 65, 0, '2023-04-20', 'KB2207201055461', 0, '1', 'Semi Furnished', 'East', '9862998038', NULL, NULL, 0, '1-bhk-semi-furnished-apartment-rent-in-dhapakhel-KB2207201055461', 1, NULL, NULL, NULL, NULL, NULL, NULL, '1 BHK Semi Furnished Apartment Rent In Dhapakhel', '1 BHK Semi Furnished Apartment Rent In Dhapakhel', '1 BHK Semi Furnished Apartment Rent In Dhapakhel'),
(74, '3 Rooms Office Space Available Tripureshwor', NULL, 5, NULL, '1', 'Yes', NULL, '1', NULL, '<ul>\r\n	<li>First Floor</li>\r\n	<li> 3 Rooms</li>\r\n	<li>1 Bathroom</li>\r\n	<li>3-4 Bike Parking</li>\r\n	<li>Good For Small Start up Offices</li>\r\n	<li>in Prime Location</li>\r\n</ul>\r\n\r\n<p>🔋Rent 30,000 Fixed 💵NOTES:- Contact us in Our no:-9862998038</p>\r\n\r\n<p>We are Also on WhatsApp/Viber</p>\r\n\r\n<p>♻️Form Fee rs 300/-lagne chha Aru Kunai Broker Charge Lagne Chhaina</p>\r\n\r\n<p>♻️ 3-month rent advance Needed</p>', '1658572210788613978office space kothabhada.jpeg', NULL, 30000, 3, 13, 1, 1, '2022-07-23 15:30:11', '2022-07-24 17:31:09', 5, 2, 67, 0, '2023-04-23', 'KB2207231030101', 0, NULL, NULL, NULL, '9862998038', NULL, NULL, 0, '3-rooms-office-space-available-tripureshwor-KB2207231030101', 1, NULL, NULL, NULL, '0', NULL, NULL, 'find room', NULL, 'find rooms  in kathmandu'),
(75, '2 rooms + 1 Kitchen For Office use In Jhamsikhel', NULL, 103, NULL, '1', 'Yes', NULL, '1', NULL, '<ul>\r\n	<li>Mainroad touched</li>\r\n	<li>Enough water facility (well)</li>\r\n	<li>Bike parking (paid car parking)</li>\r\n	<li>In second/ third floor</li>\r\n	<li>Access to terrace</li>\r\n</ul>\r\n\r\n<p>         2 rooms , 1 Kitchen , 1 Bathroom</p>\r\n\r\n<p>💵NOTES:- Contact us in Our no:-9862998038</p>\r\n\r\n<p>We are Also on WhatsApp/Viber</p>\r\n\r\n<p>♻️Form Fee rs 300/-lagne chha Aru Kunai Broker Charge Lagne Chhaina</p>\r\n\r\n<p>♻️ 3-month rent advance Needed Compulsory.</p>', '1658573988778045250office space at jhamsikhel.jpeg', NULL, 30000, 3, 13, 1, 1, '2022-07-23 15:59:48', '2022-07-24 17:31:38', 2, 2, 68, 0, '2023-04-23', 'KB2207231059481', 0, NULL, NULL, NULL, '9841266812', NULL, NULL, 0, '2-rooms-1-kitchen-for-office-use-in-jhamsikhel-KB2207231059481', 1, NULL, NULL, NULL, '1', '0', NULL, NULL, NULL, NULL),
(76, 'Office Space 700 sqft rent at Gabahal, Pulchowk.', NULL, 27, NULL, '1', 'Yes', NULL, '1', NULL, '<p>Rent=30,000 / month</p>\r\n\r\n<p>❇️IN first floor</p>\r\n\r\n<p>❇️Available in second floor also (700 sq ft Rs 30,000)</p>\r\n\r\n<p>✅Inside ring road</p>\r\n\r\n<p>✅Suitable for office space</p>\r\n\r\n<p>✅Flat system</p>\r\n\r\n<p>✅Enough Bike parking</p>\r\n\r\n<p>✅water facility</p>\r\n\r\n<p>✅Easy access to transportation</p>\r\n\r\n<p>❇️NOTES : Contact us in our no: 9862998038</p>\r\n\r\n<p>We are also in whatsapp and viber.</p>\r\n\r\n<p>♻️Form fee 300/- Lagnecha aru kunai broker charge lagne chaina.</p>\r\n\r\n<p>♻️ 3 month rent advance compulsory needed monthly after that.</p>', '16585788041083109646office space at pulchowk.jpeg', NULL, 30000, 3, 13, 1, 1, '2022-07-23 17:20:05', '2022-07-25 13:43:40', 5, 2, 69, 0, '2023-04-23', 'KB2207231220041', 0, NULL, NULL, NULL, '9862998038', NULL, NULL, 0, 'office-space-700-sqft-rent-at-gabahal-pulchowk-KB2207231220041', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, '3 BHK Flat Rent In Nakhipot', NULL, 36, '2', '1', 'Yes', '1', '1', NULL, '<ul>\r\n	<li>✅Non-furnished</li>\r\n	<li>✅3 bedrooms, 1 Kitchen, 1 bathroom, Passage system</li>\r\n	<li>✅Bike parking available</li>\r\n	<li>✅All necessary facilities nearby</li>\r\n	<li>✅First Floor</li>\r\n	<li>✅ Personal Terrace</li>\r\n</ul>\r\n\r\n<p>❇️NOTES: Contact us on our no: 9862998038</p>\r\n\r\n<p>We are also on WhatsApp and Viber.</p>\r\n\r\n<p>♻️Form fee 300 Lagnecha aru kunai broker charge lagne chaina.</p>\r\n\r\n<p>♻️ 3-month rent advance compulsory needed monthly after that.</p>', '16585801901649618724kothabhada 2 rooms.jpeg', NULL, 20000, 1, 7, 1, 1, '2022-07-23 17:43:10', '2022-07-24 17:31:39', 5, 2, 70, 0, '2023-04-23', 'KB2207231243101', 0, '1', 'No', NULL, '9862998038', NULL, NULL, 0, '3-bhk-flat-rent-in-nakhipot-KB2207231243101', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, '1 room+kichen(personal wash room)', NULL, 79, '1', '1', NULL, NULL, '1', NULL, '<p>नयाँबानेश्वर चोकबाट नजिक आलोकनगर मा 1 रूम 1 किचेन,प्राइभेट ट्वाइलेट भयको।</p>\r\n\r\n<p>रूम सर्भीस (रूम खोजेको सेवा सुल्क लाग्नेछ)</p>', '16585815985444947832 room in baneshwor.jpeg', NULL, 14000, 1, 2, 1, 1, '2022-07-23 18:06:39', '2022-07-24 17:31:36', 1, 2, 71, 0, '2023-04-23', 'KB2207230106381', 0, '1', NULL, NULL, '9867760784', NULL, NULL, 0, '1-roomkichenpersonal-wash-room-KB2207230106381', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, '1 Room(24hr water)', NULL, 95, '1', '1', 'Yes', NULL, '1', NULL, '<p>नयाँबानेश्वर चोकबाट नजिक थापागाउमा,,1 वा2जना मात्रको लागी,,पानि 24 घन्टा सुविधा, रूम प्लाईले 3साईड घेरेको छ। बस्न शान्त छ। बिद्यार्थी को लागी उपयुक्त।</p>\r\n\r\n<p>रूम सर्भीस (रूम खोजेको शेवा शुल्क लाग्नेछ)</p>', '165858288618900888061 room in thapa gaun.jpeg', NULL, 6500, 1, 24, 1, 1, '2022-07-23 18:28:06', '2022-07-25 04:57:24', 2, 2, 72, 0, '2023-04-23', 'KB2207230128061', 0, NULL, NULL, NULL, '9867760784', NULL, NULL, 0, '1-room24hr-water-KB2207230128061', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 'Office Space', NULL, 91, NULL, '1', 'Yes', NULL, '1', NULL, '<p>नयाँबानेश्वर थापागाउमा 3तलामा, 1 रूम, 1 हल भयको अफिसको लागी अतीउपयुक्त, पानी,पार्कीङ सुबिधा भयको।</p>\r\n\r\n<p>रूम सर्भीस (रूम खोजेको सेवा शुल्क लाग्नेछ)</p>', '16585836362094321150office rent at new baneshwor.jpeg', NULL, 20000, 3, 13, 1, 1, '2022-07-23 18:40:36', '2022-07-25 00:18:43', 2, 2, 73, 0, '2023-04-23', 'KB2207230140361', 0, NULL, NULL, NULL, '9867760784', NULL, NULL, 0, 'office-space-KB2207230140361', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 'Shutters on Rent', NULL, 28, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Shakhamul -10 Tathagat marga, Near Shankhmul Futsal</p>', '1658746236274601039shankhamul shutter kothabhada.jpeg', NULL, 20000, 3, 11, 1, 1, '2022-07-25 15:50:36', '2022-07-25 15:52:26', 1, 2, 74, 0, '2023-04-25', 'KB2207251050361', 0, NULL, NULL, NULL, '9841710772', NULL, NULL, 0, 'shutters-on-rent-KB2207251050361', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, '2 room available at gongabu ganesthan', NULL, 79, '2', '1', 'Yes', NULL, '1', NULL, '<p>Gongabu ganesthan kathmandu</p>', '1658747078602237290room finder in kathmandu.jpeg', NULL, 10000, 1, 6, 1, 1, '2022-07-25 16:04:38', '2022-07-25 17:13:34', NULL, 2, 75, 0, '2023-04-25', 'KB2207251104381', 0, NULL, 'No', NULL, '9841940226', NULL, NULL, 1, '2-room-available-at-gongabu-ganesthan-KB2207251104381', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'room finder in kathmandu, room rental in kathmandu', NULL, 'Room finder in Nepal, Home shifting company, buy, sell, rent'),
(83, 'suitable Flat on Rent', NULL, 19, '2', '1', 'Yes', NULL, '1', NULL, '<p>Mandikhatar ,,,,,Umangachowk</p>', '16587536121025126834dhumbharahi 2 room room finder.jpeg', NULL, 18000, 1, 6, 1, 1, '2022-07-25 17:53:32', '2022-07-25 17:54:22', 5, 2, 76, 0, '2023-04-25', 'KB2207251253321', 0, '1', 'No', NULL, '9845030647', NULL, NULL, 0, 'suitable-flat-on-rent-KB2207251253321', 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Real Estate, Room Finder & Home shifting Service', NULL, 'Room finder in Nepal, Home shifting company, buy, sell, rent'),
(84, 'For Rent', NULL, 18, '3', '1', 'Yes', NULL, '1', NULL, '<p>Residential area, good neighborhood Near to main road for local transportation Near to&rsquo; Swayambhu for morning walk.</p>', '165875618010140254773 rooms in chhauni.jpeg', NULL, 30000, 1, 6, 1, 1, '2022-07-25 18:36:20', '2022-07-26 12:21:21', 1, 2, 77, 0, '2023-04-26', 'KB2207250136201', 0, NULL, 'No', NULL, '9851062217', NULL, NULL, 1, 'for-rent-KB2207250136201', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property_features`
--

CREATE TABLE `property_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `feature_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `property_features`
--

INSERT INTO `property_features` (`id`, `property_id`, `feature_id`, `created_at`, `updated_at`) VALUES
(854, 68, 1, '2022-07-20 13:09:29', '2022-07-20 13:09:29'),
(855, 68, 2, '2022-07-20 13:09:29', '2022-07-20 13:09:29'),
(856, 68, 3, '2022-07-20 13:09:29', '2022-07-20 13:09:29'),
(857, 68, 4, '2022-07-20 13:09:29', '2022-07-20 13:09:29'),
(858, 68, 5, '2022-07-20 13:09:29', '2022-07-20 13:09:29'),
(859, 68, 6, '2022-07-20 13:09:29', '2022-07-20 13:09:29'),
(860, 68, 7, '2022-07-20 13:09:29', '2022-07-20 13:09:29'),
(861, 68, 8, '2022-07-20 13:09:29', '2022-07-20 13:09:29'),
(862, 68, 9, '2022-07-20 13:09:29', '2022-07-20 13:09:29'),
(863, 68, 10, '2022-07-20 13:09:29', '2022-07-20 13:09:29'),
(864, 68, 11, '2022-07-20 13:09:29', '2022-07-20 13:09:29'),
(865, 68, 12, '2022-07-20 13:09:29', '2022-07-20 13:09:29'),
(866, 68, 14, '2022-07-20 13:09:29', '2022-07-20 13:09:29'),
(867, 68, 15, '2022-07-20 13:09:29', '2022-07-20 13:09:29'),
(868, 68, 16, '2022-07-20 13:09:29', '2022-07-20 13:09:29'),
(869, 66, 13, '2022-07-20 13:16:55', '2022-07-20 13:16:55'),
(880, 70, 1, '2022-07-20 15:56:41', '2022-07-20 15:56:41'),
(881, 70, 3, '2022-07-20 15:56:41', '2022-07-20 15:56:41'),
(882, 70, 4, '2022-07-20 15:56:41', '2022-07-20 15:56:41'),
(883, 70, 5, '2022-07-20 15:56:41', '2022-07-20 15:56:41'),
(884, 70, 6, '2022-07-20 15:56:41', '2022-07-20 15:56:41'),
(885, 70, 9, '2022-07-20 15:56:41', '2022-07-20 15:56:41'),
(886, 70, 10, '2022-07-20 15:56:41', '2022-07-20 15:56:41'),
(887, 70, 12, '2022-07-20 15:56:41', '2022-07-20 15:56:41'),
(888, 70, 14, '2022-07-20 15:56:41', '2022-07-20 15:56:41'),
(889, 70, 16, '2022-07-20 15:56:41', '2022-07-20 15:56:41'),
(988, 74, 1, '2022-07-23 15:34:08', '2022-07-23 15:34:08'),
(989, 74, 2, '2022-07-23 15:34:08', '2022-07-23 15:34:08'),
(990, 74, 3, '2022-07-23 15:34:08', '2022-07-23 15:34:08'),
(991, 74, 4, '2022-07-23 15:34:08', '2022-07-23 15:34:08'),
(992, 74, 5, '2022-07-23 15:34:08', '2022-07-23 15:34:08'),
(993, 74, 8, '2022-07-23 15:34:08', '2022-07-23 15:34:08'),
(994, 74, 9, '2022-07-23 15:34:08', '2022-07-23 15:34:08'),
(995, 74, 10, '2022-07-23 15:34:08', '2022-07-23 15:34:08'),
(996, 74, 11, '2022-07-23 15:34:08', '2022-07-23 15:34:08'),
(997, 74, 13, '2022-07-23 15:34:08', '2022-07-23 15:34:08'),
(998, 74, 14, '2022-07-23 15:34:08', '2022-07-23 15:34:08'),
(999, 74, 15, '2022-07-23 15:34:08', '2022-07-23 15:34:08'),
(1000, 74, 16, '2022-07-23 15:34:08', '2022-07-23 15:34:08'),
(1008, 75, 4, '2022-07-23 16:00:38', '2022-07-23 16:00:38'),
(1009, 75, 9, '2022-07-23 16:00:38', '2022-07-23 16:00:38'),
(1010, 75, 10, '2022-07-23 16:00:38', '2022-07-23 16:00:38'),
(1011, 75, 11, '2022-07-23 16:00:38', '2022-07-23 16:00:38'),
(1012, 75, 12, '2022-07-23 16:00:38', '2022-07-23 16:00:38'),
(1013, 75, 14, '2022-07-23 16:00:38', '2022-07-23 16:00:38'),
(1014, 75, 16, '2022-07-23 16:00:38', '2022-07-23 16:00:38'),
(1024, 76, 2, '2022-07-23 17:20:41', '2022-07-23 17:20:41'),
(1025, 76, 4, '2022-07-23 17:20:41', '2022-07-23 17:20:41'),
(1026, 76, 9, '2022-07-23 17:20:41', '2022-07-23 17:20:41'),
(1027, 76, 10, '2022-07-23 17:20:41', '2022-07-23 17:20:41'),
(1028, 76, 11, '2022-07-23 17:20:41', '2022-07-23 17:20:41'),
(1029, 76, 12, '2022-07-23 17:20:41', '2022-07-23 17:20:41'),
(1030, 76, 14, '2022-07-23 17:20:41', '2022-07-23 17:20:41'),
(1031, 76, 15, '2022-07-23 17:20:41', '2022-07-23 17:20:41'),
(1032, 76, 16, '2022-07-23 17:20:41', '2022-07-23 17:20:41'),
(1038, 77, 9, '2022-07-23 17:43:52', '2022-07-23 17:43:52'),
(1039, 77, 10, '2022-07-23 17:43:52', '2022-07-23 17:43:52'),
(1040, 77, 12, '2022-07-23 17:43:52', '2022-07-23 17:43:52'),
(1041, 77, 14, '2022-07-23 17:43:52', '2022-07-23 17:43:52'),
(1042, 77, 16, '2022-07-23 17:43:52', '2022-07-23 17:43:52'),
(1051, 78, 4, '2022-07-23 18:07:15', '2022-07-23 18:07:15'),
(1052, 78, 8, '2022-07-23 18:07:15', '2022-07-23 18:07:15'),
(1053, 78, 9, '2022-07-23 18:07:15', '2022-07-23 18:07:15'),
(1054, 78, 11, '2022-07-23 18:07:15', '2022-07-23 18:07:15'),
(1055, 78, 12, '2022-07-23 18:07:15', '2022-07-23 18:07:15'),
(1056, 78, 13, '2022-07-23 18:07:15', '2022-07-23 18:07:15'),
(1057, 78, 14, '2022-07-23 18:07:15', '2022-07-23 18:07:15'),
(1058, 78, 16, '2022-07-23 18:07:15', '2022-07-23 18:07:15'),
(1066, 79, 4, '2022-07-23 18:29:01', '2022-07-23 18:29:01'),
(1067, 79, 9, '2022-07-23 18:29:01', '2022-07-23 18:29:01'),
(1068, 79, 10, '2022-07-23 18:29:01', '2022-07-23 18:29:01'),
(1069, 79, 11, '2022-07-23 18:29:01', '2022-07-23 18:29:01'),
(1070, 79, 12, '2022-07-23 18:29:01', '2022-07-23 18:29:01'),
(1071, 79, 14, '2022-07-23 18:29:01', '2022-07-23 18:29:01'),
(1072, 79, 16, '2022-07-23 18:29:01', '2022-07-23 18:29:01'),
(1079, 80, 4, '2022-07-23 18:41:08', '2022-07-23 18:41:08'),
(1080, 80, 9, '2022-07-23 18:41:08', '2022-07-23 18:41:08'),
(1081, 80, 10, '2022-07-23 18:41:08', '2022-07-23 18:41:08'),
(1082, 80, 12, '2022-07-23 18:41:08', '2022-07-23 18:41:08'),
(1083, 80, 14, '2022-07-23 18:41:08', '2022-07-23 18:41:08'),
(1084, 80, 15, '2022-07-23 18:41:08', '2022-07-23 18:41:08'),
(1094, 81, 4, '2022-07-25 15:52:26', '2022-07-25 15:52:26'),
(1095, 81, 5, '2022-07-25 15:52:26', '2022-07-25 15:52:26'),
(1096, 81, 7, '2022-07-25 15:52:26', '2022-07-25 15:52:26'),
(1097, 81, 9, '2022-07-25 15:52:26', '2022-07-25 15:52:26'),
(1098, 81, 10, '2022-07-25 15:52:26', '2022-07-25 15:52:26'),
(1099, 81, 11, '2022-07-25 15:52:26', '2022-07-25 15:52:26'),
(1100, 81, 12, '2022-07-25 15:52:26', '2022-07-25 15:52:26'),
(1101, 81, 14, '2022-07-25 15:52:26', '2022-07-25 15:52:26'),
(1102, 81, 15, '2022-07-25 15:52:26', '2022-07-25 15:52:26'),
(1109, 82, 4, '2022-07-25 16:05:52', '2022-07-25 16:05:52'),
(1110, 82, 9, '2022-07-25 16:05:52', '2022-07-25 16:05:52'),
(1111, 82, 10, '2022-07-25 16:05:52', '2022-07-25 16:05:52'),
(1112, 82, 11, '2022-07-25 16:05:52', '2022-07-25 16:05:52'),
(1113, 82, 12, '2022-07-25 16:05:52', '2022-07-25 16:05:52'),
(1114, 82, 14, '2022-07-25 16:05:52', '2022-07-25 16:05:52'),
(1130, 83, 4, '2022-07-25 17:54:22', '2022-07-25 17:54:22'),
(1131, 83, 5, '2022-07-25 17:54:22', '2022-07-25 17:54:22'),
(1132, 83, 9, '2022-07-25 17:54:22', '2022-07-25 17:54:22'),
(1133, 83, 10, '2022-07-25 17:54:22', '2022-07-25 17:54:22'),
(1134, 83, 12, '2022-07-25 17:54:22', '2022-07-25 17:54:22'),
(1139, 84, 9, '2022-07-26 12:21:22', '2022-07-26 12:21:22'),
(1140, 84, 10, '2022-07-26 12:21:22', '2022-07-26 12:21:22'),
(1141, 84, 11, '2022-07-26 12:21:22', '2022-07-26 12:21:22'),
(1142, 84, 14, '2022-07-26 12:21:22', '2022-07-26 12:21:22');

-- --------------------------------------------------------

--
-- Table structure for table `property_photos`
--

CREATE TABLE `property_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(191) DEFAULT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `property_photos`
--

INSERT INTO `property_photos` (`id`, `photo`, `property_id`, `created_at`, `updated_at`) VALUES
(60, '1658241538993713363flats_kausaltar_kothabhada.jpeg', 66, '2022-07-19 19:38:58', '2022-07-19 19:38:58'),
(61, '16582415381385041572flats_2bhk_bhaktapur_kothabhada.jpeg', 66, '2022-07-19 19:38:58', '2022-07-19 19:38:58'),
(62, '16582415381003828484flats_2bhk_kausaltar_kothabhada.jpeg', 66, '2022-07-19 19:38:58', '2022-07-19 19:38:58'),
(63, '1658241538867808383flats_at_bhaktapur_kothabhada.jpeg', 66, '2022-07-19 19:38:58', '2022-07-19 19:38:58'),
(64, '1658241538182098195flats_rent_kothabhada.jpeg', 66, '2022-07-19 19:38:58', '2022-07-19 19:38:58'),
(75, '16582515401640074606flat_system_kothabhada.jpeg', 68, '2022-07-19 22:25:40', '2022-07-19 22:25:40'),
(76, '16582515401770064563house_dhumbarahi_kothabhada.jpeg', 68, '2022-07-19 22:25:40', '2022-07-19 22:25:40'),
(77, '16582515401990148023house_for_sale_kothabhada1.jpeg', 68, '2022-07-19 22:25:40', '2022-07-19 22:25:40'),
(78, '1658251540962475287house_for_sell_kothabhada.jpeg', 68, '2022-07-19 22:25:40', '2022-07-19 22:25:40'),
(79, '1658251540850675000house_sale_cheap_kothabhada.jpeg', 68, '2022-07-19 22:25:40', '2022-07-19 22:25:40'),
(80, '16582515401296345139house_sell_kothabhada.jpeg', 68, '2022-07-19 22:25:40', '2022-07-19 22:25:40'),
(81, '16582515401138386491ktm_house_kothabhada.jpeg', 68, '2022-07-19 22:25:40', '2022-07-19 22:25:40'),
(82, '16582515411353719414newly_built_house_kothabhada.jpeg', 68, '2022-07-19 22:25:41', '2022-07-19 22:25:41'),
(83, '16582515411770574790ringroad_house_kothabhada.jpeg', 68, '2022-07-19 22:25:41', '2022-07-19 22:25:41'),
(84, '1658251541979722821residence_house_kothabhada.jpeg', 68, '2022-07-19 22:25:41', '2022-07-19 22:25:41'),
(91, '16583145465810791561 BHK Semi Furnished Apartment Rent In Dhapakhel (2).jpeg', 70, '2022-07-20 15:55:46', '2022-07-20 15:55:46'),
(92, '165831454620591546281 BHK Semi Furnished Apartment Rent In Dhapakhel @ kothabhada.jpeg', 70, '2022-07-20 15:55:46', '2022-07-20 15:55:46'),
(93, '165831454620834551491 BHK Semi Furnished Apartment Rent In Dhapakhel cheap.jpeg', 70, '2022-07-20 15:55:46', '2022-07-20 15:55:46'),
(94, '16583145466401631411 BHK Semi Furnished Apartment Rent In Dhapakhel home shifting.jpeg', 70, '2022-07-20 15:55:46', '2022-07-20 15:55:46'),
(95, '16583145469168468461 BHK Semi Furnished Apartment Rent In Dhapakhel kothabhada.jpeg', 70, '2022-07-20 15:55:46', '2022-07-20 15:55:46'),
(96, '165831454615053994691 BHK Semi Furnished Apartment Rent In Dhapakhel.jpeg', 70, '2022-07-20 15:55:46', '2022-07-20 15:55:46'),
(98, '16585722111055554483office space at kothabhada.jpeg', 74, '2022-07-23 15:30:11', '2022-07-23 15:30:11'),
(99, '16585722111065058637office space kothabhada.jpeg', 74, '2022-07-23 15:30:11', '2022-07-23 15:30:11'),
(100, '16585739881269581841office 2 rrom 1kitchen.jpeg', 75, '2022-07-23 15:59:48', '2022-07-23 15:59:48'),
(101, '16585739881020675276office space at kothabhada.jpeg', 75, '2022-07-23 15:59:48', '2022-07-23 15:59:48'),
(102, '16585739881457010589office space at laitpur.jpeg', 75, '2022-07-23 15:59:48', '2022-07-23 15:59:48'),
(103, '1658573988350532465office space in lalitpur.jpeg', 75, '2022-07-23 15:59:48', '2022-07-23 15:59:48'),
(104, '16585788055620475242 rooms office space at lalitpur.jpeg', 76, '2022-07-23 17:20:05', '2022-07-23 17:20:05'),
(105, '16585788051728595429to let office kothabhada.jpeg', 76, '2022-07-23 17:20:05', '2022-07-23 17:20:05'),
(106, '16585801905215786872 bhk in nakhipot.jpeg', 77, '2022-07-23 17:43:10', '2022-07-23 17:43:10'),
(107, '16585801905449197222bhk in lalitpur.jpeg', 77, '2022-07-23 17:43:10', '2022-07-23 17:43:10'),
(108, '16585801901606214931flat on rent at kothabhada.jpeg', 77, '2022-07-23 17:43:10', '2022-07-23 17:43:10'),
(109, '165858019083468306flat on rent.jpeg', 77, '2022-07-23 17:43:10', '2022-07-23 17:43:10'),
(110, '165858159915400783161bhk in shantinagar.jpeg', 78, '2022-07-23 18:06:39', '2022-07-23 18:06:39'),
(111, '1658581599981068500flat in shantinagar.jpeg', 78, '2022-07-23 18:06:39', '2022-07-23 18:06:39'),
(112, '16585828861934886458single room in thapa gaun.jpeg', 79, '2022-07-23 18:28:06', '2022-07-23 18:28:06'),
(113, '1658583636933055977office space at baneshowr.jpeg', 80, '2022-07-23 18:40:36', '2022-07-23 18:40:36'),
(114, '16585836361732693389office space thapa gaun.jpeg', 80, '2022-07-23 18:40:36', '2022-07-23 18:40:36'),
(115, '16587470781413720121room finder in ktm.jpeg', 82, '2022-07-25 16:04:38', '2022-07-25 16:04:38'),
(116, '16587536138959495902 rooms in ktm.jpeg', 83, '2022-07-25 17:53:33', '2022-07-25 17:53:33'),
(117, '165875361318983904192bhk ktm room finder.jpeg', 83, '2022-07-25 17:53:33', '2022-07-25 17:53:33'),
(118, '16587536131814268443mandikhatar room.jpeg', 83, '2022-07-25 17:53:33', '2022-07-25 17:53:33');

-- --------------------------------------------------------

--
-- Table structure for table `purposes`
--

CREATE TABLE `purposes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `purposes`
--

INSERT INTO `purposes` (`id`, `title`, `order`, `status`, `created_at`, `updated_at`, `category_id`) VALUES
(1, 'Rent', 1, 1, '2022-04-06 01:12:10', '2022-04-06 01:12:10', NULL),
(3, 'Sale', 3, 1, '2022-04-06 01:12:32', '2022-04-06 01:12:32', NULL),
(4, 'Lease', 4, 1, '2022-04-06 01:18:39', '2022-04-06 01:18:39', NULL),
(5, 'Paying Guest', 5, 1, '2022-04-06 01:18:52', '2022-04-06 01:18:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quick_links`
--

CREATE TABLE `quick_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `link` varchar(191) NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `quick_links`
--

INSERT INTO `quick_links` (`id`, `title`, `link`, `order`, `status`, `created_at`, `updated_at`) VALUES
(3, 'FAQ', 'https://kothabhada.com/frequently-asked-questions', 3, 1, '2022-06-03 15:19:54', '2022-06-03 15:19:54'),
(4, 'Promote Your Property', 'https://kothabhada.com/boost-detail', 2, 1, '2022-06-07 11:11:53', '2022-06-07 11:11:53'),
(5, 'Find Me Room', '1', 1, 1, '2022-06-07 11:12:29', '2022-06-07 11:12:29'),
(6, 'Add New Property', 'https://kothabhada.com/my-property/create', 4, 1, '2022-06-07 11:13:01', '2022-06-07 11:13:01'),
(7, 'Shift Home', 'https://kothabhada.com/shift-home', 4, 1, '2022-06-20 23:54:57', '2022-06-20 23:54:57');

-- --------------------------------------------------------

--
-- Table structure for table `recommended_properties`
--

CREATE TABLE `recommended_properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `road_sizes`
--

CREATE TABLE `road_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `road_sizes`
--

INSERT INTO `road_sizes` (`id`, `title`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Goreto Bato', 1, 1, '2022-04-06 01:34:50', '2022-04-06 01:34:50'),
(2, 'Black Pitched', 2, 1, '2022-05-04 14:53:54', '2022-05-04 14:53:54'),
(3, 'Gravel Road', 3, 1, '2022-05-04 14:54:21', '2022-05-04 14:54:21'),
(4, 'Dhalan Road', 4, 1, '2022-05-04 15:05:31', '2022-05-08 13:29:33'),
(5, 'Muddy Road', 5, 1, '2022-05-04 15:05:51', '2022-05-04 15:05:51');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `beds` longtext NOT NULL,
  `bathroom_type` varchar(191) NOT NULL,
  `currency` varchar(191) NOT NULL,
  `no_of_guest` int(11) NOT NULL,
  `price_for_one_night_1` varchar(191) NOT NULL,
  `price_for_one_night_more` varchar(191) NOT NULL,
  `price_for_week_1` varchar(191) NOT NULL,
  `price_for_week_more` varchar(191) NOT NULL,
  `price_for_month_1` varchar(191) NOT NULL,
  `price_for_month_more` varchar(191) NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0bEvDyBBZkfipf7Lr8n2SRo5oKD8BW92mAUeGSHE', NULL, '132.145.9.189', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOGVBazNuMkdMVHZPRldyM0JJaWZocWpJeUVGS3NZMldBbHdMdFBlaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8va290aGFiaGFkYS5jb20vY29uZmlnLnBocCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1658818743),
('1o5XREP92US7xuGERl5oWGVzEKqzQUaUzVxN4WWT', NULL, '132.145.9.189', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidnBaMndqcXNqM0RyQ2VGN3FMcFVRSlp0VHcxU0hmb2tDVXJkMEl5VCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8va290aGFiaGFkYS5jb20vc2V0dGluZ3MucGhwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1658818742),
('1Zv8ubBZw0ESyaeQaBMjBFFVayChfu7LWDadAkhO', NULL, '34.147.76.148', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTUtTWWZjTzRRM2FrRUJ1U3NmREROcmM2S0Zjc1VxMzZQaXVvM2pTbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8va290aGFiaGFkYS5jb20vZmVlZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1658826865),
('3Uen7lt8H1q3uV5trwlXpvcF3rg7pmam20uJt8wt', NULL, '34.91.203.118', 'Mozilla/5.0 (X11; CrOS x86_64 14150.64.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.104 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNTg4Q2VaS3FPRXF3ZGRyVXFkMXR1TXpRYTFLb04xTExrcjczRFpVViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8va290aGFiaGFkYS5jb20vZmVlZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1658817282),
('4e7U72D4rTEBELP0xhL9JdtFxzIBq6NlQw4tu8kX', NULL, '181.214.218.36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZXE1ajJPNk1JSVVKMXdYOFhZTVNiRzlEZ1hlSjRLTEFYRW5WN0w2UiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8va290aGFiaGFkYS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1658825289),
('5NFlyuk9nhJ98DNpVFlIRogOo2x6VwObn2jFAh7e', NULL, '27.34.68.143', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQlFHZWpkNE5RZEVqZjR0UTNDMDZ5UzAyTnJEVDBRNHkwdDhlM2N3ZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHBzOi8va290aGFiaGFkYS5jb20vc2VydmljZS13b3JrZXIuanMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1658813963),
('6DBTYJtMfKUIzVcoWWuHHX78HYvv2cJcdlFSXJeS', NULL, '34.147.76.148', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWU0wTFZvSGFISHhmcFlJZzRqTVJQVWlVdWVZcE9sMFFUdElpd2FsTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8va290aGFiaGFkYS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1658826863),
('9W2thyiDbYtAXUWLrVxQlROBh5a7onuse2YKAFk0', NULL, '132.145.9.189', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid1Zkb2ZlQkp0U2s2M2x6UG9uZFRMZG93RWJWWUcxczJUODlRSHdNeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8va290aGFiaGFkYS5jb20vcGhwaW5mby5waHAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1658818735),
('a4AmWDYnM5W9SUGsIgU5YhRsvSKQi9EHVsL6WRn9', NULL, '132.145.9.189', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaE00dHFobFhMN1NOZjdDOE5OY0VHVDQ0Mk5XN3hBUHdPVjJzMVdOWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHBzOi8va290aGFiaGFkYS5jb20vcHVibGljL2NvbmZpZyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1658818737),
('bNl2K0dXRHfxF5bTr1osHuX0dOh16eIS5O95BY0w', NULL, '132.145.9.189', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM2hwREZtYkVCNDlENWR4QnBtbWJsNDNRR0hKazByaldXcjUwellPVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8va290aGFiaGFkYS5jb20vaW5mby5waHAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1658818740),
('CWw3212L2SNgD5kXhtIXKk9KH3f2yGBBuu8GCfyZ', NULL, '132.145.9.189', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid3oxVlM5UGl6Q2pZdmpLY0g4MU5Lc1VKSDRpM0huZHNDSDRUaGYwciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8va290aGFiaGFkYS5jb20vY29uZmlnLmpzb24iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1658818738),
('DX4TSEI4fhqO9U8Rb3syuRyMhFdrqDy8vxfATC4i', NULL, '34.91.203.118', 'Mozilla/5.0 (X11; CrOS x86_64 14150.64.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.104 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWThnOU15bUh2SWlMWVc0Y1RjWUx0Z054Zkt6bkhHR29ScllTVkI3bSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8va290aGFiaGFkYS5jb20vMSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1658817281),
('ecC4zGoYR0ReuMJlJl1Xvo4DEJ1nZQEWQYvHRLUN', NULL, '34.91.203.118', 'Mozilla/5.0 (X11; CrOS x86_64 14150.64.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.104 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicXdwaWNIWGdUQjJQS0xvYmNoWDNnbmtRZ0JUdXV0WFpadTVzeVB4QyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8va290aGFiaGFkYS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1658817281),
('fHg1UXGnAZG4M5atWRoxy0sIWUF84DqsEllTW2Ht', NULL, '34.91.203.118', 'Mozilla/5.0 (X11; CrOS x86_64 14150.64.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.104 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaWF6SHFpM05yampuZnNQeEFueUsxWEswTmVzaHpXOWM3QlM0bHFPbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8va290aGFiaGFkYS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1658817281),
('FOI0w5S5HeVOXJqiWBz4W5DgsonfrMXr6mh6rBsq', NULL, '181.192.1.15', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2227.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiaEFZRkl3a0JQZmNXbER3RjU3cUx2aTRWS1JvWHZ6Zml6ZnQyZEFROCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1658821905),
('jLv1qWY7MWjfkr07jrMuSMiaxZysgGpXM90cKhDz', 1, '2.49.111.129', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiSGtQelZLQ2lJMG9jcTA5WEdWamJGMEpGR05zVGYzU29yZVV5NUlxYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHBzOi8va290aGFiaGFkYS5jb20vc2VydmljZS13b3JrZXIuanMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkeGJQbVFjUlhhVDduZGlPU0NOaTBaZUdVVmp1LjlOL2lvaS52THlsWVBWSnNxZWRTMXVwbXUiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJHhiUG1RY1JYYVQ3bmRpT1NDTmkwWmVHVVZqdS45Ti9pb2kudkx5bFlQVkpzcWVkUzF1cG11Ijt9', 1658827208),
('LuTp6zfu6Getq2KjLV4T57IuQJYYDgLgz7lPymUR', NULL, '46.161.11.197', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36 Edg/83.0.478.37', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNEE0amppZHJHbHY2Q2xmblBSdDcwaUVJUVFIYzFpem05YjdWcUV1SyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8va290aGFiaGFkYS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1658825294),
('lXfHJrDO4gdaNYobHeCpGEplSObwg74Qu7xthazP', NULL, '132.145.9.189', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQlZNc1d1bFpNalNJUlVqZ3p5TmQ3SzFhMU9nYmk0UERSdmx2N2M1WiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8va290aGFiaGFkYS5jb20vcGhwaW5mbyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1658818735),
('miNbov5TLTK2BcwESJEf1uCI28Kyl9ep5xU7zkF3', NULL, '13.66.139.14', 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQXZST1hMN2MzMkthM3ZNUFUwOHptS3pyc1RjVGtlb1dJUTdMdDJZaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTk6Imh0dHBzOi8va290aGFiaGFkYS5jb20vZW5pbS1hbGlhcy1jb25zZWN0ZXQtS0IyMjA2MDcwNDMzMDAxIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1658821073),
('miTl0Nme415L6lulLQIRwEFgyngPXfr8XdIbBY5q', NULL, '132.145.9.189', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic1lTWDhIVVlHSmMwU2Z1WUFmdFdncndGaFAzMVZuSWFEUk1MWEFzQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHBzOi8va290aGFiaGFkYS5jb20vc2V0dGluZ3MuanNvbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1658818739),
('OlcfPmLnmCIRZDFRpDH3csSwcEohuDVhqUKUWTYf', NULL, '34.147.76.148', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYlEyWU1jOVNxUTI2SnVGTkFFZXZZZFJtallPcmZhTnd2bVRsYnZJNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8va290aGFiaGFkYS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1658826863),
('q4WJnTZApikkZoLkTdHNDJL8plQRFUWGHD8bxPVv', NULL, '34.147.76.148', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib3IxckpBa2VQclRybDJWcVpRekZkSjlBanpFMEtMbnd2aktxM3o0bCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHBzOi8va290aGFiaGFkYS5jb20vcnNzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1658826865),
('rQLVu5v9BEqUBMEFrwxnm1c80Xe2bZq3lgW47kTI', NULL, '103.181.226.119', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWVYwczJ2QlVyYkxIZzFWODdJMVRLYUtyczh3OFJpdDVqUHNhejNTdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8va290aGFiaGFkYS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1658826712),
('S49i8uMiARPbw7aXvBtRmYZkXR7xK0xx6Xc8MTnH', NULL, '34.147.76.148', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZFF4ckF1V3BvMDVaTklOdEdhTFdCekhqbFdEcmUyeGQ1bEpubHZubyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8va290aGFiaGFkYS5jb20vZmVlZHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1658826865),
('S8z2LWoSyho0Au2ZfJJvZIEquXd03OYmnzrmeb6Z', NULL, '34.147.76.148', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR3VLRGxPYzBySE95NkJkcWdWYTF2NWpLdk43MDRLRnFTQzY3cndMWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8va290aGFiaGFkYS5jb20vMSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1658826864),
('s9eCTU1juPdggXO5lqzrz8uRtHwZ9tDn4ZJuCrAh', NULL, '34.91.203.118', 'Mozilla/5.0 (X11; CrOS x86_64 14150.64.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.104 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibDk4bDJQNXpQc0pjSlpZeGVSTE1zODRYVEd3ZUlZRGc5WWJzUjdWZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHBzOi8va290aGFiaGFkYS5jb20vcnNzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1658817282),
('s9JfRgxxFIvyYqH93badEnoUEDr0UPZHy79PCZMQ', NULL, '34.147.76.148', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVmEwdGJVblJjT2F2QzdpU0N5OGdITUdWeU83OXh1SE5LcUwwcTY0biI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8va290aGFiaGFkYS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1658826864),
('sBHHWpw2H1R7h5HRybAMC7hBF7BGV2NyYAMivJvB', NULL, '69.171.249.119', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoidkZxOVhkVXRValM2eVZMSWNEZGNUUlRQUWNLSTRIRjBVc3RnZVB5bCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1658825817),
('TZoaOr2mU7UxtiqXURXb4RIKCPiUi23LpuT2CXOB', NULL, '132.145.9.189', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaFZ1ZWZjRjhsRGtCaWJDMkgyQWdtejRyU1Z4WTJJMjYzSm5tRmVEYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8va290aGFiaGFkYS5jb20vY29uZi5waHAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1658818741),
('UEMOCQqCnGkbhYAGwhdYoSy0MaE5uvU3OglWkOBp', NULL, '27.34.68.143', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRFVaSEVGUjlqSHgySnJHaXpvMFMzVkZjOFlpY2V4Yk9KdnJtWlBxSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHBzOi8va290aGFiaGFkYS5jb20vc2VydmljZS13b3JrZXIuanMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1658827307),
('VMWVq07DQ23CW9KNc99Ru9clB8LgrvyJXB1iYnBO', NULL, '107.150.46.162', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.90 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVGhwcGFyWUt6Uml6QjAwNWptWHVzOHE1c2dVYUQzWjJUbFNSdlJmRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8va290aGFiaGFkYS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1658817479),
('w0eXljHrijdJbj3digXtwFGdu97SvMlFCfaqLZ66', NULL, '181.214.218.36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoicFQ1MEZSSEt5YmhCcjVXYUptNTRoYU5FQVF1azExNVQ3cEViNklEZyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1658825288),
('wxEbdJ8ibGVug1tqF4nbUvAYegNvOBbOs64q8c5n', NULL, '34.91.203.118', 'Mozilla/5.0 (X11; CrOS x86_64 14150.64.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.104 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia0F6SFJVZVRnMTVDenBsbGNjdTVmaDI3SElMY2VTTHlMUmJocjBDRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8va290aGFiaGFkYS5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1658817280),
('xQFMW1u2kJWHUQtskxizz7Muwibeu2SzKa8gH9Qe', NULL, '103.181.226.119', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOUxaejZxeFR4WVJ5Z3dnSDBqZzVsNlFhSzBTbnp4WHRqM1VaZ21XbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHBzOi8va290aGFiaGFkYS5jb20vc2VydmljZS13b3JrZXIuanMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1658826984),
('yyghsPR8isdnGy3K19JJilZKYqvjp1cT5l936gxW', NULL, '34.91.203.118', 'Mozilla/5.0 (X11; CrOS x86_64 14150.64.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.104 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRlJQbHhDbThJSnRzazRSVTFMOEM0R3YwV0JxUGZ6eGtWQUlQTnB0eCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHBzOi8va290aGFiaGFkYS5jb20vZmVlZHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1658817282);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `mobile` varchar(191) NOT NULL,
  `company_logo` text NOT NULL,
  `favicon` text NOT NULL,
  `address` text NOT NULL,
  `facebook` varchar(191) DEFAULT NULL,
  `instagram` varchar(191) DEFAULT NULL,
  `tiktok` varchar(191) DEFAULT NULL,
  `twitter` varchar(191) DEFAULT NULL,
  `linkedin` varchar(191) DEFAULT NULL,
  `skype` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `banner` text,
  `video_text` text NOT NULL,
  `choose_property_text` text,
  `youtube` varchar(191) DEFAULT NULL,
  `ad_video` text,
  `boost_price` varchar(191) DEFAULT NULL,
  `qr_code` varchar(191) DEFAULT NULL,
  `boost_description` text,
  `vendor_dashboard_content` text,
  `shift_home_content` text,
  `watermark` text,
  `featured_term` varchar(191) DEFAULT NULL,
  `recommended_term` varchar(191) DEFAULT NULL,
  `new_deals_term` varchar(191) DEFAULT NULL,
  `tagline` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `company_name`, `email`, `phone`, `mobile`, `company_logo`, `favicon`, `address`, `facebook`, `instagram`, `tiktok`, `twitter`, `linkedin`, `skype`, `created_at`, `updated_at`, `banner`, `video_text`, `choose_property_text`, `youtube`, `ad_video`, `boost_price`, `qr_code`, `boost_description`, `vendor_dashboard_content`, `shift_home_content`, `watermark`, `featured_term`, `recommended_term`, `new_deals_term`, `tagline`) VALUES
(1, 'Kotha  Bhada', 'info@kothabhada.com', '9841266812', '9841266812', '20220620102041-kothabhada-logofinal.png', '20220717090523-favicon.jpg', 'New baneshwor\r\n, Kathmandu 44600', 'https://www.facebook.com/Kothabhadacom-Rental-Home-Shifting-109758338420735', 'instagram.com/', 'https://www.tiktok.com', 'https://www.twitter.com', 'www.linkedIn.com', NULL, '2022-04-06 00:57:57', '2022-07-20 13:14:08', '1658048722mohan-khadka-kjW0bZpF1wU-unsplash (1).jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam vero incidunt, labore laborum sapiente veniam magnam molestias deleniti beatae facilis. Exercitationem, ipsam eaque.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam vero incidunt, labore laborum sapiente veniam magnam molestias deleniti beatae facilis. Exercitationem, ipsam eaque.', '<p>Kotha bhada not only lets you explore the market online. It has considered your every necessity, from finding a property to shifting your belongings. To ease the hassle of visiting different properties to find your happy place, Kotha Bhada enables users to contact our representative, who will personally visit the site and recommend the best location only for you, with just a click at &#39;Find me Room.&#39; Furthermore, we have taken up your stress of finding a vehicle to transport your belongings; find your desired vehicle at your location with just a click at &#39;Shift Home,&#39; which will assist you to move quickly and easily.</p>', 'https://www.youtube.com/channel/UCaWy02Hzse0p9rGE6AE26wQ', 'lbJteHJiBrY', '8787', '20220713045212-kothabhadasidebarads.gif', '<p>Promote in Kotha bhada refers to paying for the advertising of the property posted on the site and different social and online media.<br />\r\nBy promoting your property in Kotha Bhada, you will maximize the visibility of your property where an enormous number of people will notice it, further creating a high chance of a conversion. Platforms for promotion will be like:<br />\r\n&nbsp;-Facebook posts<br />\r\n&nbsp;-YouTube videos<br />\r\n&nbsp;-Instagram posts<br />\r\n-Online News Portals<br />\r\n- Tiktok Post<br />\r\n- Our Registered Agents<br />\r\n- We will also post it on the most visible sections of our website like featured properties, recommended properties, or on our home page for higher performance.</p>\r\n\r\n<hr />\r\n<p>&nbsp;</p>\r\n\r\n<p>कोठा भाडामा प्रचार गर्नु भनेको साइट र विभिन्न सामाजिक र अनलाइन मिडियामा पोस्ट गरिएको सम्पत्तिको विज्ञापनको लागि भुक्तान गर्नु हो। कोठा भाडामा आफ्नो सम्पत्ति प्रवर्द्धन गरेर, तपाईंले आफ्नो सम्पत्तिको दृश्यता अधिकतम बनाउनुहुनेछ जहाँ धेरै संख्यामा मानिसहरूले यसलाई नोटिस गर्नेछन्, साथै रूपान्तरणको उच्च सम्भावना सिर्जना गर्दछ। पदोन्नतिको लागि प्लेटफर्महरू निम्नानुसार हुनेछ:</p>\r\n\r\n<p>- फेसबुक पोस्टहरू</p>\r\n\r\n<p>- YouTube भिडियोहरू</p>\r\n\r\n<p>- इन्स्टाग्राम पोस्टहरू</p>\r\n\r\n<p>- अनलाइन समाचार पोर्टलहरू</p>\r\n\r\n<p>- टिकटक पोस्ट</p>\r\n\r\n<p>- हाम्रो दर्ता एजेन्टहरू</p>\r\n\r\n<p>- हामी यसलाई हाम्रो वेबसाइटको सबैभन्दा देखिने खण्डहरूमा पनि पोस्ट गर्नेछौं</p>\r\n\r\n<p>जस्तै विशेष गुणहरू, सिफारिस गरिएका गुणहरू, वा उच्च प्रदर्शनको लागि हाम्रो गृह पृष्ठमा।</p>\r\n\r\n<p>&nbsp;</p>', '<p>Welcome to your control panel. Here, you have access to add new properties, promote your property, change your password, change your name &amp; contact details, and also track your listed &amp; pending properties.</p>', '<p>Kotha Bhada is keen on customer satisfaction; it has become a one-stop destination for all your requirements; we introduce you &#39;Shift home.&#39; If you have found your desired property and decide to move from your current location to your future destination, we will provide the right services as per your moving requirement. We create a custom house moving plan for every client according to their budget, time, and destination.</p>\r\n\r\n<p>Our group of professionals for shifting will handle the entire moving process with great care and dedication.&nbsp;You don&#39;t have to search any further after connecting with Kotha bhada. We take your problems and solve them like ours.</p>\r\n\r\n<hr />\r\n<p>कोठा भाडा ग्राहक सन्तुष्टि मा उत्सुक छ; यो तपाइँको सबै आवश्यकताहरु को लागी एक-स्टप गन्तव्य भएको छ;&nbsp;<br />\r\nहामी तपाईंलाई &#39;घर सिफ्ट&#39; परिचय गराउँछौं। यदि तपाईंले आफ्नो मनपर्ने सम्पत्ति फेला पार्नुभयो र तपाईंको हालको&nbsp;<br />\r\nस्थानबाट तपाईंको भविष्यको गन्तव्यमा सार्न निर्णय गर्नुभयो भने, हामी तपाईंको स्थानान्तरण आवश्यकता अनुसार&nbsp;<br />\r\nसही सेवाहरू प्रदान गर्नेछौं। हामी प्रत्येक ग्राहकको लागि तिनीहरूको बजेट, समय, र गन्तव्य अनुसार अनुकूलन घर सार्ने योजना बनाउँछौं।</p>\r\n\r\n<p>स्थानान्तरणका लागि हाम्रो पेशेवरहरूको समूहले सम्पूर्ण गतिशील प्रक्रियालाई ठूलो हेरचाह र समर्पणका साथ ह्यान्डल गर्नेछ।<br />\r\n&nbsp;कोठा भाडा संग जोडिए पछि थप खोजी गर्नु पर्दैन। हामी तपाईका समस्याहरू लिन्छौं र तिनीहरूलाई हाम्रो जस्तै समाधान गर्छौं।</p>\r\n\r\n<p>&nbsp;</p>', '20220720081408-www.kothabhada.com.png', 'Hot Deals', 'Hand Picked', 'We\'ve got properties for everyone', 'Real Estate | Room Finder  & Home shifting company');

-- --------------------------------------------------------

--
-- Table structure for table `shift_homes`
--

CREATE TABLE `shift_homes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) NOT NULL,
  `pick_up_location` varchar(191) NOT NULL,
  `drop_off_location` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `when` varchar(191) NOT NULL,
  `schedule_time` time DEFAULT NULL,
  `schedule_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `items` longtext,
  `read` int(11) NOT NULL DEFAULT '0',
  `deposit_slip` varchar(191) DEFAULT NULL,
  `message` text
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `shift_home_items`
--

CREATE TABLE `shift_home_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `shift_home_items`
--

INSERT INTO `shift_home_items` (`id`, `title`, `order`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Bed', 1, '2022-04-20 03:30:50', '2022-04-20 03:30:50', 1),
(2, 'Cupboard', 2, '2022-04-20 03:31:21', '2022-05-05 13:16:28', 1),
(3, 'Dining Table', 3, '2022-04-20 03:31:39', '2022-04-20 03:31:39', 1),
(4, 'Tea Table', 6, '2022-05-03 22:04:18', '2022-05-05 22:37:02', 1),
(5, 'Dining Table', 7, '2022-05-03 22:05:31', '2022-05-05 22:37:22', 1),
(6, 'Sofa', 8, '2022-05-03 22:06:32', '2022-05-05 22:37:45', 1),
(7, 'Kitchen Rack', 8, '2022-05-03 22:06:47', '2022-05-05 22:38:29', 1),
(8, 'TV', 2, '2022-05-03 22:07:04', '2022-05-05 22:25:27', 1),
(10, 'Chair', 11, '2022-05-03 22:17:58', '2022-05-05 22:38:53', 1),
(11, 'Shoe Rack', 12, '2022-05-05 22:39:44', '2022-05-05 22:39:44', 1),
(12, 'Dressing Table', 13, '2022-05-05 22:40:04', '2022-05-05 22:40:04', 1),
(13, 'Table Lamb', 14, '2022-05-05 22:40:41', '2022-05-05 22:40:41', 1),
(14, 'Gas Cylinder', 16, '2022-05-05 22:41:05', '2022-05-05 22:41:05', 1),
(15, 'Mattress/Blankets', 17, '2022-05-05 22:41:46', '2022-05-05 22:41:46', 1),
(16, 'Refrigerator', 17, '2022-05-05 22:45:27', '2022-05-05 22:45:27', 1),
(17, 'Warming Heater', 18, '2022-05-05 22:46:12', '2022-05-05 22:46:12', 1),
(18, 'Table Fan', 19, '2022-05-05 22:47:26', '2022-05-05 22:47:26', 1),
(19, 'Flower Pot', 20, '2022-05-05 22:47:47', '2022-05-05 22:47:47', 1),
(20, 'Computer Table', 22, '2022-05-07 18:14:26', '2022-05-07 18:14:26', 1),
(21, 'cookware', 23, '2022-06-20 22:56:24', '2022-06-20 22:56:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `support_forums`
--

CREATE TABLE `support_forums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED DEFAULT NULL,
  `comment` text NOT NULL,
  `parent` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `support_forums`
--

INSERT INTO `support_forums` (`id`, `property_id`, `comment`, `parent`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(32, NULL, 'Hello,\r\nThrough our website, you can search for any rental property or post it for rent and you can also book a vehicle to move home or office.\r\nIf you have any questions about real estate, you can ask through this open chat room.\r\nIf someone tries to tell you a fake post, you can alert us and all our customers through this open chat room.\r\nThe purpose of creating this open chat room is 100% transparency to facilitate communication between buyers, sellers and this platform.\r\nStart Posting today & ask your queries at any time..', NULL, 1, 1, '2022-07-20 14:57:36', '2022-07-20 14:57:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `two_factor_secret` text,
  `two_factor_recovery_codes` text,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(191) NOT NULL,
  `gender` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `token` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `role`, `gender`, `phone`, `status`, `token`) VALUES
(1, 'Admin Kothabhada', 'admin@kothabhada.com', NULL, '$2y$10$xbPmQcRXaT7ndiOSCNi0ZeGUVju.9N/ioi.vLylYPVJsqedS1upmu', NULL, NULL, 'TlKEnOeid82tVgVSIMus4eqwLwcTMqQmjKal81QCMzYngyqTgPyY0NGBtUjx', NULL, NULL, '2022-04-06 00:56:15', '2022-07-20 17:13:38', 'admin', 'male', '9841266812', 1, NULL),
(2, 'Shreeram', 'shreeram@gmail.com', NULL, '$2y$10$WHOki1OHnODDf6n0jB80uOjauw4Qb3YJhJjWrABX0ez/vM6bhc4oW', NULL, NULL, NULL, NULL, NULL, '2022-04-08 00:45:27', '2022-04-08 00:45:27', 'user', NULL, NULL, 1, NULL),
(3, 'shreeshyam', 'shreeshyam@gmail.com', NULL, '$2y$10$UIVuxbgQYtzo.A5yG2YQm.Rk2BRiBqf513YeQ.V7QgdREw20HW6E2', NULL, NULL, NULL, NULL, NULL, '2022-04-08 00:45:58', '2022-04-08 00:45:58', 'superadmin', NULL, NULL, 1, NULL),
(4, 'Saroj', 'saroj@gmail.com', NULL, '$2y$10$nLM6bJj340ljodwvJAzpneG6nMYAaw5s6cC1HSqgPdHUlOEof4P9y', NULL, NULL, NULL, NULL, NULL, '2022-04-20 23:19:04', '2022-04-20 23:19:32', 'user', 'male', '9860347386', 1, NULL),
(5, 'Another Admin', 'anotheradmin@gmail.com', NULL, '$2y$10$E5x/hFMEq8zrY15ELx9XTOgSa7lCkOYPUQXSxsDcJ1PDUCvxuTwaC', NULL, NULL, NULL, NULL, NULL, '2022-04-21 01:10:37', '2022-04-21 01:10:37', 'user', NULL, NULL, 1, NULL),
(13, 'Srijana Bhatta', '1370797203384615@facebook.com', NULL, '$2y$10$3BGwe1sMpdNZuNj1G2WWYuov3tUqp.uvjCXBTBT5oFlcEtWJJYlKm', NULL, NULL, NULL, NULL, NULL, '2022-05-01 13:30:52', '2022-05-01 13:30:52', 'user', NULL, NULL, 1, NULL),
(15, 'Khabar Nirantar', '510608650706300@facebook.com', NULL, '$2y$10$hdNpRk.oucTFQlMPshikgOPCgqLoT7eSgLCuN27ft8zeu2pqOBGVu', NULL, NULL, NULL, NULL, NULL, '2022-05-01 13:44:44', '2022-05-01 13:44:44', 'user', NULL, NULL, 1, NULL),
(24, 'Eeight Us', '118747504146229@facebook.com', NULL, '$2y$10$6cWks06YNIVxUViKcBYdlexMh4TjKGjepDV/fgGzsL34g9n6SXLk.', NULL, NULL, NULL, NULL, NULL, '2022-05-01 13:57:17', '2022-05-01 13:57:17', 'user', NULL, NULL, 1, NULL),
(25, 'Amrit Neupane', '1596497510734972@facebook.com', NULL, '$2y$10$iVD57rLprPC1zynsAoDygOcGVbhDO8IQWABkBpJ8cwysEz4ia0Ole', NULL, NULL, NULL, NULL, NULL, '2022-05-01 13:59:00', '2022-05-01 13:59:00', 'user', NULL, NULL, 1, NULL),
(33, 'Ïšî Ty', '1133246067520328@facebook.com', NULL, '$2y$10$9DXBqzS7wjOA8grR/RyzfeftnWi1/Ot.Cme1PkWIwaaKWeQCDsK2W', NULL, NULL, NULL, NULL, NULL, '2022-05-01 14:16:02', '2022-05-01 14:16:02', 'user', NULL, NULL, 1, NULL),
(34, 'Amreet Neupane', '845263103098118@facebook.com', NULL, '$2y$10$ViKz7ecJ04TZvdoSbHolsuKCg4b6W0zJC9or5dwzW0St8dE7cykX2', NULL, NULL, NULL, NULL, NULL, '2022-05-01 14:17:08', '2022-05-01 14:17:08', 'user', NULL, NULL, 1, NULL),
(35, 'Innovix Web Services', 'innovixwebservices@nestnepal.com', NULL, '$2y$10$DXdCTkXB2s6r7mJ88GeT1ewOevzQ9uiz74szDnV2K9qBkXck7q/IW', NULL, NULL, NULL, NULL, NULL, '2022-05-01 14:43:14', '2022-05-01 14:43:14', 'user', NULL, NULL, 1, NULL),
(36, 'Smriti Sharma', 'esmriti19@gmail.com', NULL, '$2y$10$qek6ipggYG5ky/x1hcwj0eSzY/8CrUYmv/IQNapLZRQ1cxl06XFOy', NULL, NULL, NULL, NULL, NULL, '2022-05-01 14:48:42', '2022-05-01 14:51:11', 'user', NULL, '9866434769', 1, NULL),
(37, 'Amrit Neupane', '4998654073553046@facebook.com', NULL, '$2y$10$dPaBZWL4DM/89kA8eLkcZuuCbqRFgQbZQbqVteROMp0vIuYTU4uTW', NULL, NULL, NULL, NULL, NULL, '2022-05-01 16:10:11', '2022-05-01 16:10:11', 'user', NULL, NULL, 1, NULL),
(38, 'test', 'test@gmail.com', NULL, '$2y$10$vdARPqWyDGIxuYdK/ESVtOMuOhf/zIePw9jmq6mFspKMxbIm68Eji', NULL, NULL, 'h3bJasYdAd41lbtknQsNb16VuCvmUrpRjjAUVuSzrl5ZaXxRsGidDXSIqpmr', NULL, NULL, '2022-05-01 16:40:57', '2022-05-05 13:36:03', 'user', 'male', '9819152681', 1, 'XlfZ0ARlUMUWu1ouNmuLLAcreFmWquj0NIMUvyw68hUA7eA1csQERrG9grZU5fEr'),
(39, 'test1', 'test1@gmail.com', NULL, '$2y$10$NWMLSR0.iXiY6F4m3yqUmuktLUH7ohybi4Hrk8j2S9GOsLlrdMwwS', NULL, NULL, NULL, NULL, NULL, '2022-05-07 17:58:57', '2022-05-07 17:58:57', 'user', 'male', '32893769', 0, 'AZBaMIjybIxH06uKp8D0tVb4gWyxxH5dAlxzwIBbfg29WwTs4wxCacnqgJ3s8eML'),
(40, 'kotha test', 'kothatest@gmail.com', NULL, '$2y$10$8bRjGmr.kWIQodcZaOut.uur9ou5Se1vdgtr7lyxXTQsn/WzK1RR2', NULL, NULL, NULL, NULL, NULL, '2022-05-07 18:01:51', '2022-05-07 18:01:51', 'user', 'others', '32424324234234', 0, 'g8EF9dCbKTlV7g2OBCeSDIf47lgNTcyUYZdCeKSSseZulwuVYSXO37EUkw3xpdAI'),
(41, 'Hongkong Bazar', '287452556928270@facebook.com', NULL, '$2y$10$KbwIKOh.g8S5va.WEOb8G.OnrOTaSjE2sEMdMBslhs1ZkfXZsC.Cy', NULL, NULL, NULL, NULL, NULL, '2022-05-07 18:04:18', '2022-05-07 18:05:08', 'user', 'male', '987655667776', 1, NULL),
(42, 'hongkongbazar nepal', 'hongkongbazarnepal@gmail.com', NULL, '$2y$10$iELWc1PkwemqT2v/iaT.UuAEkKCoFsGITSy39yGcNlNvwXo5wIkYC', NULL, NULL, '1SOM3YFiFu8U9qLrM0ISeMXMQ3hFmT9UF9TaLJR7zzJ2ziZR6n8IYdSI9kwh', NULL, NULL, '2022-05-07 18:07:04', '2022-06-11 21:55:03', 'user', 'others', '98765566777', 1, NULL),
(43, 'rojan', 'rojansewang99@gmail.com', '2022-05-07 21:41:13', '$2y$10$sZZpJDUq7R6wr3NE8tMXSepDCUTMZsBkGH5effEYJj/CIDd1kNvXm', NULL, NULL, NULL, NULL, NULL, '2022-05-07 18:21:58', '2022-05-07 21:41:13', 'user', 'male', 'edsfdsfsds', 1, NULL),
(44, 'Reaction Babu', 'reactionbabu00@gmail.com', NULL, '$2y$10$/tsGJTbC0ZpuE0lJ6.4cSukIxrMuaoLXGixbGinbq5z8/rkblx9HW', NULL, NULL, NULL, NULL, NULL, '2022-05-21 09:15:43', '2022-05-21 09:15:43', 'user', NULL, NULL, 1, NULL),
(46, 'sagar', 'sagarpoudel369@gmail.com', NULL, '$2y$10$i/PeopHtMgGag22rC5Z2h.WQik/5cMCCXjHNtJaoxcIluHrGiLRdW', NULL, NULL, NULL, NULL, NULL, '2022-06-27 18:39:42', '2022-06-27 18:39:42', 'user', NULL, NULL, 0, NULL),
(50, 'Surendra Ojha', 'laliguranstelevision1@gmail.com', '2022-06-27 19:41:14', '$2y$10$rWpp3WP7AKsFWm8yXS6pJegXsEA4HWkuDLtt6Y180Pfbb9VwPTv5S', NULL, NULL, NULL, NULL, NULL, '2022-06-27 19:41:02', '2022-06-27 19:41:14', 'user', 'male', '9810347384', 1, NULL),
(51, 'Surendra Ojha', 'ojhanr@gmail.com', NULL, '$2y$10$BpELW7U6lUe6uimWVjKivecUygsA.uC8QDKpSqkabiXWQ8mbbBBJS', NULL, NULL, NULL, NULL, NULL, '2022-06-27 19:42:44', '2022-06-27 19:42:44', 'user', 'male', '8860347384', 0, 'aSqYx76TGKB2S6eaG4L6GUKMkVk8QPEy5SEKgDc4HuSRxtYmUCCnMsqqhYiNMaJt'),
(53, 'bhojraj neupane', 'contactbhojraj@gmail.com', '2022-06-27 19:50:29', '$2y$10$Ho6iuu8wLHfOFEnR46oKzeiW/nb3St43cuhJHZha54dV2a/jOE0oW', NULL, NULL, NULL, NULL, NULL, '2022-06-27 19:50:19', '2022-06-27 19:50:29', 'user', 'male', '9900347384', 1, NULL),
(54, 'ojhanr', 'ojhanr70@gmail.com', '2022-06-27 19:57:06', '$2y$10$dfBUM0iYFroniDjT/pg7uusXahpct7oSFuN0npJtGsWtDu8hBDPly', NULL, NULL, NULL, NULL, NULL, '2022-06-27 19:51:57', '2022-06-27 19:57:06', 'user', 'male', '18058257553', 1, NULL),
(55, 'Surendra Ojha', 'srijanabhatt743@gmail.com', '2022-06-27 20:00:46', '$2y$10$ohPI7RoOWWv/5N9ldQcA0eQ8JodsyFy.n.E6GrZOnOgXfbfa67O4.', NULL, NULL, NULL, NULL, NULL, '2022-06-27 19:56:10', '2022-06-27 20:00:46', 'user', 'female', '1234567890', 1, NULL),
(56, 'daniel50.pixeldesign@gmail.com', 'daniel50.pixeldesign@gmail.com', NULL, '$2y$10$nIB2hqdPtI0I9LOqh07HKO6Su3wj5x.gbbMV6aEgk9tOJF5KrZFxO', NULL, NULL, NULL, NULL, NULL, '2022-06-27 20:02:34', '2022-07-12 22:24:24', 'user', 'female', '1234567879', 0, 'R7kCZyoYehdKga6BBXCgy7rvOuOTSwZ0wWQqu8jjAkJRm8CDNlakyep4rsdiNdZk'),
(57, 'Kotha Bhada', 'ivazztech@gmail.com', NULL, '$2y$10$oegTzZBbBGeyLLmYupwl5e0cD7rI5afNie51hIEaF.B5vhA3dhzFi', NULL, NULL, NULL, NULL, NULL, '2022-06-27 14:27:39', '2022-06-27 14:27:39', 'user', 'male', '0987654321', 0, '3mUl8WjMDG2WMnrML2qDsuEMrD8EVHKZp8uKTqVtHGyDm1PjIPTobcdUrTEig9kr'),
(58, 'workspaceivazz', 'workspaceivazz@gmail.com', NULL, '$2y$10$lK2Vzc1PT6t6vYTKWcA5su0kG.Tc9Y1fNOtc/9OooqPLvJnPqZYg2', NULL, NULL, NULL, NULL, NULL, '2022-06-27 14:33:21', '2022-06-27 14:33:21', 'user', 'male', '7890654321', 0, 'xwtbTHLUtarkDpMuc6av6EVv07qg7tHwYywvuhsaAmyHtsvsC9iL55qBBABzS7UA'),
(59, 'laliguranstelevision5@gmail.com', 'laliguranstelevision5@gmail.com', NULL, '$2y$10$.gIWREgu241ZI.puiwsU8eP.8TO5nAZIMwwlioafr6VgrQ2OUKwk6', NULL, NULL, NULL, NULL, NULL, '2022-06-27 14:46:43', '2022-06-27 14:46:43', 'user', 'male', '3421567890', 0, 'JQNurQNUWOB29AHx9IJIHCLQhVkh1zkJiZXzRWdhcDWrPZ1pWizW7gUU5lsp3PRy'),
(60, 'info@ivazz.com', 'info@ivazz.com', NULL, '$2y$10$tcWIS9gh6QGp7zyGCD2L.um/NQsIg0SNLGsBu1/mhikVLKwtr1h5O', NULL, NULL, NULL, NULL, NULL, '2022-06-27 14:55:10', '2022-06-27 14:55:10', 'user', 'male', '9087653421', 0, '3c6UyISWXPoIcvGgKXpvc9WiiewBqr3Z48encjIvMHACvwWsEL5Z9QVFwiCk6vjv'),
(61, 'londonoffice@ivazz.com', 'londonoffice@ivazz.com', NULL, '$2y$10$nNI2VaRcDWe7MCZ/ZgRJtONN9/MQmQGXa9gRzCvRVQgRz9/4fb45u', NULL, NULL, NULL, NULL, NULL, '2022-06-27 15:02:46', '2022-06-27 15:02:46', 'user', 'male', '3215467890', 0, 'tBvD5kpPKitRDdCALUeJnFtvIzvcIUow5e3bna0DrHgVFImUZJA1hNLoKnCg084g'),
(62, 'surendra@kothabhada.com', 'surendra@ivazz.com', NULL, '$2y$10$tYZEooWad4U55ghVl0TOPu4YreKWAn8YjdSrYbSe1VdwZdjn34glq', NULL, NULL, NULL, NULL, NULL, '2022-06-28 09:27:34', '2022-06-28 09:27:34', 'user', 'male', '67890654321', 0, '47ilyBhDx8DkrKgTvbbW1tDYwqaGRVBgMyN6xc9BlvdQ1Ioch5O33KlkRWql0TuA'),
(63, 'billing@ivazz.com', 'billing@ivazz.com', NULL, '$2y$10$.Sfsq5Una/RBijOTaTZ0muEm1R.M3f6IBRLbXiN5ZScVC8doCfCRm', NULL, NULL, NULL, NULL, NULL, '2022-06-28 09:31:32', '2022-06-28 09:31:32', 'user', 'male', '67890654322', 0, 'vWcDJy3SoqZxhAmcDEv1iGgNdoTtLzqNsDinSLiICRjLPeqRNbPWO0ujwowAhVJP'),
(64, 'editor1', 'editor@hkb.com', NULL, '$2y$10$s2k.cI3iNB.KupArRRz82uoWM0flnYEecizTklDSbz9Iglp2noCMe', NULL, NULL, NULL, NULL, NULL, '2022-06-28 14:25:39', '2022-06-28 14:25:39', 'editor', NULL, NULL, 1, NULL),
(65, 'sagar thapa', 'info@hongkongbazar.com', '2022-07-15 17:07:26', '$2y$10$djPaO6huSg/snomp356EwONOsIfF0dfefrYvvBwvMNtv8rAcWTYPW', NULL, NULL, NULL, NULL, NULL, '2022-07-15 17:06:40', '2022-07-15 17:07:26', 'user', 'others', '9876737322', 1, NULL),
(66, 'sales', 'sales@kothabhada.com', NULL, '$2y$10$uZz.EyvBVBlMYPguWy3xsOdHjXHJBZ1iVsmERptqBBAF.HmSf9oxe', NULL, NULL, NULL, NULL, NULL, '2022-07-20 18:35:29', '2022-07-20 18:37:48', 'user', 'others', '98412668121', 1, NULL),
(67, 'kotha bhada', 'kothabhadanepal@gmail.com', NULL, '$2y$10$D/usG/ihePswhbU0dRpYru7iS0aIdkD3ctXxcPeZxLg/SIF2ueaHS', NULL, NULL, NULL, NULL, NULL, '2022-07-20 18:45:09', '2022-07-20 18:47:02', 'user', 'others', '984126681210', 1, NULL),
(68, 'surendra', 'sojha060@gmail.com', NULL, '$2y$10$5/JwfekcOIcrAGuj.bj7PeZ/H9rbm5BvnLcD20Vtbi29vf6HDG8Yu', NULL, NULL, NULL, NULL, NULL, '2022-07-22 11:20:27', '2022-07-22 11:20:27', 'user', NULL, '9860347384', 0, 'C5PUdLBoJljGWJaKUUKg9plSUJohVINiRpD8EfjL2cBwasfaG83cRqLfhc8JORQ6'),
(69, 'sadhanadeuba33@gmail.com', 'sadhanadeuba33@gmail.com', NULL, '$2y$10$C7Jjhv/aaMNF6mR1Bx5jB.m50Ue6HnM.CtNUn866B1Nue0UcFCRU6', NULL, NULL, NULL, NULL, NULL, '2022-07-22 11:21:49', '2022-07-22 11:21:49', 'user', NULL, '18058257558', 0, 'oaw0ar1p6GwWKKYIJzXEUVgdJStx1oaxK0X9SC3OX6ndd4SEzf3VnNRLDbByFXbK'),
(70, 'sadhanadeuba333@gmail.com', 'sadhanadeuba333@gmail.com', NULL, '$2y$10$S5CdjUBLh9m.t.3o4Gb/l.HHsQUoSkqvsXunM9vH86vc/i4.xJx5a', NULL, NULL, NULL, NULL, NULL, '2022-07-22 11:31:37', '2022-07-22 11:31:37', 'user', NULL, '1505284124645', 0, 'kNg75OFrRDMzwy4bC0uPiFdBnvDtY7DnkjkX5Lz34WyIyKdxW5tRIpRvnJZQi71S'),
(71, 'news.satyatathya@gmail.com', 'news.satyatathaya@gmail.com', NULL, '$2y$10$.Pb8/GVUn9Zv9.2fA8l/0eziWYal.Tu7GhrE27U29/aX8PQOsgpLC', NULL, NULL, NULL, NULL, NULL, '2022-07-22 11:36:02', '2022-07-22 11:36:02', 'user', NULL, '0987654333', 0, 'SnrSr6QhFuRRiiq2dIHpXffy4mP0h3u8m2LhpVtTpIJ9dv5Cnq4TasNt0N9D0CpU'),
(72, 'info@jauguru.com', 'info@jauguru.com', NULL, '$2y$10$qiQYy8UJ39YxAbEJsulEzO9/N6aG9FyiCxEXVtNGSKtWxYK5LA45q', NULL, NULL, NULL, NULL, NULL, '2022-07-22 11:36:57', '2022-07-22 11:36:57', 'user', NULL, '78906543211', 0, 'e9x8D5FCeoUTpPEHz4pfhIerQEjMF5PFpKlNyl5KOV8wKK7mzt8IDNFeXXNuQNl3'),
(73, 'Surendra Ojha', 'marketing@ivazz.com', NULL, '$2y$10$ygmCFSB9YRy0fRA2lTsSIeHMZJ1mY9TAC.G7T0Y9NIsA2hHBrK5Ca', NULL, NULL, NULL, NULL, NULL, '2022-07-22 11:50:23', '2022-07-22 11:50:23', 'user', NULL, '6980347384', 0, 'RW4vNUsaHKyTh5XcxsQyndKDIEvQA1MJ3Kq9RTJreQ8gvWXS0kUbe5ZjuJPNdN8U'),
(74, 'surendra', 'ojhasurain@hotmail.com', NULL, '$2y$10$/6G2ETZdH84b9SFSz8NcYe8vNaM7P59F0FWAbJ6yFYpK8YbPyg0hi', NULL, NULL, NULL, NULL, NULL, '2022-07-22 11:55:08', '2022-07-22 11:55:08', 'user', NULL, '564789021', 0, '54v9j6R6c5MrPXLiAW4ylr7112Cag7TJT7E3nLjhoWN5ZuceTV2jQrg1y9Jl0awE');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `user_type` varchar(191) NOT NULL,
  `you_own` longtext,
  `property_location` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_append` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `photo`, `phone`, `dob`, `user_type`, `you_own`, `property_location`, `created_at`, `updated_at`, `name_append`) VALUES
(1, 1, '1658318961.jpeg', '9841266812', '2007-05-03', 'agent', '[\"House\"]', NULL, '2022-04-06 02:35:25', '2022-07-20 17:13:38', 'Mr.'),
(3, 13, '1370797203384615.jpg', NULL, '2022-05-01', 'agent', NULL, NULL, '2022-05-01 13:30:52', '2022-05-01 13:30:52', NULL),
(5, 15, '510608650706300.jpg', NULL, '2022-05-01', 'agent', NULL, NULL, '2022-05-01 13:44:44', '2022-05-01 13:44:44', NULL),
(14, 24, '118747504146229.jpg', NULL, '2022-05-01', 'agent', NULL, NULL, '2022-05-01 13:57:17', '2022-05-01 13:57:17', NULL),
(15, 25, '1596497510734972.jpg', NULL, '2022-05-01', 'agent', NULL, NULL, '2022-05-01 13:59:00', '2022-05-01 13:59:00', NULL),
(23, 33, '1133246067520328.jpg', NULL, '2022-05-01', 'agent', NULL, NULL, '2022-05-01 14:16:02', '2022-05-01 14:16:02', NULL),
(24, 34, '845263103098118.jpg', NULL, '2022-05-01', 'agent', NULL, NULL, '2022-05-01 14:17:08', '2022-05-01 14:17:08', NULL),
(25, 35, '113905390344334335762.jpg', NULL, '2022-05-01', 'agent', NULL, NULL, '2022-05-01 14:43:14', '2022-05-01 14:43:14', NULL),
(26, 36, '117432182466659485218.jpg', NULL, '1995-03-27', 'agent', '[\"Apartment\"]', NULL, '2022-05-01 14:48:42', '2022-05-01 14:51:11', 'Miss'),
(27, 37, '4998654073553046.jpg', NULL, '2022-05-01', 'agent', NULL, NULL, '2022-05-01 16:10:11', '2022-05-01 16:10:11', NULL),
(28, 38, '1651599803.jpg', '9819152681', '2006-12-20', 'owner', '[\"House\"]', NULL, '2022-05-01 16:42:58', '2022-05-03 22:43:23', 'Mr.'),
(29, 41, '287452556928270.jpg', '987655667776', '2007-05-01', 'owner', '[\"House\"]', NULL, '2022-05-07 18:04:18', '2022-05-07 18:05:08', 'Mr.'),
(30, 42, '100275522519587592877.jpg', '98765566777', '2007-05-03', 'user', '[\"House\"]', NULL, '2022-05-07 18:07:04', '2022-06-06 14:48:19', 'Mr.'),
(31, 44, '118371063018459271781.jpg', NULL, NULL, 'agent', NULL, NULL, '2022-05-21 09:15:43', '2022-05-21 09:15:43', NULL),
(32, 56, NULL, '1234567879', '2007-07-11', 'agent', NULL, NULL, '2022-07-12 22:24:24', '2022-07-12 22:24:24', 'Mr.'),
(33, 65, NULL, '9876737322', '2007-07-09', 'owner', '[\"Apartment\"]', NULL, '2022-07-15 17:09:40', '2022-07-15 17:09:40', 'Mr.'),
(34, 66, '1658324342.jpeg', '98412668121', '2007-07-20', 'owner', NULL, NULL, '2022-07-20 18:37:48', '2022-07-20 18:39:02', 'Mr.'),
(35, 67, NULL, '984126681210', '2007-07-20', 'agent', '[\"House\"]', NULL, '2022-07-20 18:47:02', '2022-07-20 18:47:02', 'Mr.');

-- --------------------------------------------------------

--
-- Table structure for table `wish_lists`
--

CREATE TABLE `wish_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_menus`
--
ALTER TABLE `admin_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_menu_items`
--
ALTER TABLE `admin_menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_menu_items_menu_foreign` (`menu`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisement_positions`
--
ALTER TABLE `advertisement_positions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advertisement_positions_advertisement_id_index` (`advertisement_id`);

--
-- Indexes for table `boosting_steps`
--
ALTER TABLE `boosting_steps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boost_features`
--
ALTER TABLE `boost_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boost_posts`
--
ALTER TABLE `boost_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `boost_posts_property_id_foreign` (`property_id`),
  ADD KEY `boost_posts_subscription_id_foreign` (`subscription_id`);

--
-- Indexes for table `boost_subscriptions`
--
ALTER TABLE `boost_subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_foreign` (`parent`);

--
-- Indexes for table `contact_categories`
--
ALTER TABLE `contact_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_categories_contact_id_index` (`contact_id`),
  ADD KEY `contact_categories_category_id_index` (`category_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_stories`
--
ALTER TABLE `customer_stories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_stories_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `family_welcomes`
--
ALTER TABLE `family_welcomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `featured_properties`
--
ALTER TABLE `featured_properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `featured_properties_property_id_index` (`property_id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `floors`
--
ALTER TABLE `floors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `f_a_q_s`
--
ALTER TABLE `f_a_q_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_facilities`
--
ALTER TABLE `home_facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_page_products`
--
ALTER TABLE `home_page_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `home_page_products_property_id_index` (`property_id`);

--
-- Indexes for table `home_stay_videos`
--
ALTER TABLE `home_stay_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_types`
--
ALTER TABLE `home_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like_forums`
--
ALTER TABLE `like_forums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `like_forums_support_forum_id_index` (`support_forum_id`),
  ADD KEY `like_forums_user_id_index` (`user_id`);

--
-- Indexes for table `local_area_facilities`
--
ALTER TABLE `local_area_facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metas`
--
ALTER TABLE `metas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_letters`
--
ALTER TABLE `news_letters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_services`
--
ALTER TABLE `our_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pages_parent_index` (`parent`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
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
-- Indexes for table `profile_locations`
--
ALTER TABLE `profile_locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_locations_profile_id_foreign` (`profile_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `properties_floor_id_index` (`floor_id`),
  ADD KEY `properties_road_size_id_index` (`road_size_id`),
  ADD KEY `properties_location_id_index` (`location_id`),
  ADD KEY `properties_purpose_id_index` (`purpose_id`);

--
-- Indexes for table `property_features`
--
ALTER TABLE `property_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_features_property_id_index` (`property_id`),
  ADD KEY `property_features_feature_id_index` (`feature_id`);

--
-- Indexes for table `property_photos`
--
ALTER TABLE `property_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_photos_property_id_index` (`property_id`);

--
-- Indexes for table `purposes`
--
ALTER TABLE `purposes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purposes_category_id_foreign` (`category_id`);

--
-- Indexes for table `quick_links`
--
ALTER TABLE `quick_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recommended_properties`
--
ALTER TABLE `recommended_properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recommended_properties_property_id_index` (`property_id`);

--
-- Indexes for table `road_sizes`
--
ALTER TABLE `road_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_property_id_index` (`property_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shift_homes`
--
ALTER TABLE `shift_homes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shift_home_items`
--
ALTER TABLE `shift_home_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_forums`
--
ALTER TABLE `support_forums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `support_forums_property_id_index` (`property_id`),
  ADD KEY `support_forums_parent_index` (`parent`),
  ADD KEY `support_forums_user_id_index` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_profiles_user_id_index` (`user_id`);

--
-- Indexes for table `wish_lists`
--
ALTER TABLE `wish_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wish_lists_user_id_index` (`user_id`),
  ADD KEY `wish_lists_property_id_index` (`property_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_menus`
--
ALTER TABLE `admin_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_menu_items`
--
ALTER TABLE `admin_menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `advertisement_positions`
--
ALTER TABLE `advertisement_positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `boosting_steps`
--
ALTER TABLE `boosting_steps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `boost_features`
--
ALTER TABLE `boost_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `boost_posts`
--
ALTER TABLE `boost_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `boost_subscriptions`
--
ALTER TABLE `boost_subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `contact_categories`
--
ALTER TABLE `contact_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customer_stories`
--
ALTER TABLE `customer_stories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `family_welcomes`
--
ALTER TABLE `family_welcomes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `featured_properties`
--
ALTER TABLE `featured_properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `floors`
--
ALTER TABLE `floors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `f_a_q_s`
--
ALTER TABLE `f_a_q_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `home_facilities`
--
ALTER TABLE `home_facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `home_page_products`
--
ALTER TABLE `home_page_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `home_stay_videos`
--
ALTER TABLE `home_stay_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `home_types`
--
ALTER TABLE `home_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `like_forums`
--
ALTER TABLE `like_forums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `local_area_facilities`
--
ALTER TABLE `local_area_facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `metas`
--
ALTER TABLE `metas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `news_letters`
--
ALTER TABLE `news_letters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `our_services`
--
ALTER TABLE `our_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile_locations`
--
ALTER TABLE `profile_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `property_features`
--
ALTER TABLE `property_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1143;

--
-- AUTO_INCREMENT for table `property_photos`
--
ALTER TABLE `property_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `purposes`
--
ALTER TABLE `purposes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `quick_links`
--
ALTER TABLE `quick_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `recommended_properties`
--
ALTER TABLE `recommended_properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `road_sizes`
--
ALTER TABLE `road_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shift_homes`
--
ALTER TABLE `shift_homes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `shift_home_items`
--
ALTER TABLE `shift_home_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `support_forums`
--
ALTER TABLE `support_forums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `wish_lists`
--
ALTER TABLE `wish_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_menu_items`
--
ALTER TABLE `admin_menu_items`
  ADD CONSTRAINT `admin_menu_items_menu_foreign` FOREIGN KEY (`menu`) REFERENCES `admin_menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `advertisement_positions`
--
ALTER TABLE `advertisement_positions`
  ADD CONSTRAINT `advertisement_positions_advertisement_id_foreign` FOREIGN KEY (`advertisement_id`) REFERENCES `advertisements` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `boost_posts`
--
ALTER TABLE `boost_posts`
  ADD CONSTRAINT `boost_posts_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `boost_posts_subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `boost_subscriptions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_foreign` FOREIGN KEY (`parent`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customer_stories`
--
ALTER TABLE `customer_stories`
  ADD CONSTRAINT `customer_stories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `featured_properties`
--
ALTER TABLE `featured_properties`
  ADD CONSTRAINT `featured_properties_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `home_page_products`
--
ALTER TABLE `home_page_products`
  ADD CONSTRAINT `home_page_products_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `like_forums`
--
ALTER TABLE `like_forums`
  ADD CONSTRAINT `like_forums_support_forum_id_foreign` FOREIGN KEY (`support_forum_id`) REFERENCES `support_forums` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `like_forums_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_parent_foreign` FOREIGN KEY (`parent`) REFERENCES `pages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profile_locations`
--
ALTER TABLE `profile_locations`
  ADD CONSTRAINT `profile_locations_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `user_profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_floor_id_foreign` FOREIGN KEY (`floor_id`) REFERENCES `floors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `properties_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `properties_purpose_id_foreign` FOREIGN KEY (`purpose_id`) REFERENCES `purposes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `properties_road_size_id_foreign` FOREIGN KEY (`road_size_id`) REFERENCES `road_sizes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_features`
--
ALTER TABLE `property_features`
  ADD CONSTRAINT `property_features_feature_id_foreign` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `property_features_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_photos`
--
ALTER TABLE `property_photos`
  ADD CONSTRAINT `property_photos_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purposes`
--
ALTER TABLE `purposes`
  ADD CONSTRAINT `purposes_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `recommended_properties`
--
ALTER TABLE `recommended_properties`
  ADD CONSTRAINT `recommended_properties_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `support_forums`
--
ALTER TABLE `support_forums`
  ADD CONSTRAINT `support_forums_parent_foreign` FOREIGN KEY (`parent`) REFERENCES `support_forums` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `support_forums_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `support_forums_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD CONSTRAINT `user_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wish_lists`
--
ALTER TABLE `wish_lists`
  ADD CONSTRAINT `wish_lists_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wish_lists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

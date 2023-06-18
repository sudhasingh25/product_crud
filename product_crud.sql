-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jun 18, 2023 at 03:44 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_name_hi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name_en`, `brand_name_hi`, `created_at`, `updated_at`) VALUES
(1, 'Apple', 'एप्पल', '2023-06-16 06:28:11', NULL),
(2, 'vivo', 'वीवो ', '2023-06-16 06:30:37', NULL),
(3, 'Samsung', 'सैमसंग ', '2023-06-16 06:30:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name_hi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name_en`, `category_name_hi`, `created_at`, `updated_at`) VALUES
(1, 'Electronic', 'इलेक्ट्रोनिक\r\n', '2023-06-16 06:33:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2023_06_16_041925_create_products_table', 1),
(5, '2023_06_16_050255_create_brands_table', 2),
(6, '2023_06_16_050615_create_categories_table', 3),
(7, '2023_06_16_050831_create_sub_categories_table', 4),
(8, '2023_06_16_051159_create_sub_subcategories_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `sub_subcategory_id` int(11) NOT NULL,
  `product_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name_hi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug_hi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags_hi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size_hi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color_hi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_descp_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_descp_hi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_descp_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_descp_hi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hot_deals` int(11) DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `special_offer` int(11) DEFAULT NULL,
  `special_deals` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `subcategory_id`, `sub_subcategory_id`, `product_name_en`, `product_name_hi`, `product_slug_en`, `product_slug_hi`, `product_code`, `product_qty`, `product_tags_en`, `product_tags_hi`, `product_size_en`, `product_size_hi`, `product_color_en`, `product_color_hi`, `selling_price`, `discount_price`, `short_descp_en`, `short_descp_hi`, `long_descp_en`, `long_descp_hi`, `product_thumbnail`, `hot_deals`, `featured`, `special_offer`, `special_deals`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 1, 1, 'iPhone 14 Pro', 'IPhone 14 प्रो', 'iphone-14-pro', 'IPhone-14-प्रो', '5672', '25', 'iPhone,iPhone 14,smartphone', 'आईफ़ोन,आईफ़ोन 14,स्मार्टफोन', 'Medium', 'मध्यम', 'deep purple', 'गहरा बैंगनी', '130000', '120000', 'The iPhone 14 Pro and Pro Max feature', 'IPhone 14 प्रो और प्रो मैक्स', '<pre>\r\nThe iPhone 14 Pro and Pro Max feature Super Retina XDR OLED displays with a typical maximum brightness of 1,000 nits. However, it can go up to 1,600 nits when watching HDR videos and 2,000 nits outdoors. The refresh rate of the display is 120Hz and it uses LTPO technology.</pre>\r\n\r\n<pre>\r\n\r\n&nbsp;</pre>\r\n\r\n<p><img alt=\"Community-verified icon\" src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAQAAAAngNWGAAAA/0lEQVR4AYXNMSiEcRyA4cfmGHQbCZIipkuxnJgMStlMNmeyD2dwmc8+sZgxYJd9ErIZFHUyYYD7fkr6l4/rnvmtl7+KitrqV/fq2Y5eLY3Z9S48eRLe7BmVZ9qhTLhQ0algzZWQOVKSsCF8OjAnwbxDTWFDUhPK/jMr1H6HE/IqRky2DyvCefuwItwZzodVoYRiLqMkVCXrwpJ9twZ+sgfDYEFYl8wIWxZ9uFf7zkallxlJh4YrLGsKjZRx7VGHhLqwgFUN45DGdb8MeXGpgB4ABZdeDcpZEY51A+hyLKz4S1W4MQWm3AibWtgWmk6dyISa1pSdyWTOlLXVp0+eL9D/ZPfBTNanAAAAAElFTkSuQmCC\" style=\"height:16px; width:16px\" /></p>', '<pre>\r\nIPhone 14 प्रो और प्रो मैक्स में 1,000 निट्स की विशिष्ट अधिकतम चमक के साथ सुपर रेटिना XDR OLED डिस्प्ले है। हालाँकि, एचडीआर वीडियो देखते समय यह 1,600 निट्स तक और बाहर 2,000 निट्स तक जा सकता है। डिस्प्ले की ताज़ा दर 120 हर्ट्ज़ है और यह एलटीपीओ तकनीक का उपयोग करता है।</pre>', 'upload/product/thumbnail/1768942152592373.jpg', NULL, 1, 1, NULL, 1, '2023-06-17 04:08:18', NULL),
(4, 1, 1, 1, 1, 'iPhone 14', 'iphone 14', 'iphone-14', 'iphone-14', '6768', '25', 'iPhone,iPhone 14', 'आईफ़ोन,आईफ़ोन 14', 'Medium', 'आईफ़ोन,आईफ़ोन 14', 'Blue', 'नीला', '80000', '70000', 'The iPhone 14  feature', 'IPhone 14 प्रो और प्रो मैक्स', '<p>The iPhone is&nbsp;<strong>a smartphone made by Apple that combines a computer, iPod, digital camera and cellular phone into one device with a touchscreen interface</strong>. The iPhone runs the iOS operating system, and in 2021 when the iPhone 13 was introduced, it offered up to 1 TB of storage and a 12-megapixel camera.</p>', '<pre>\r\nIPhone Apple द्वारा बनाया गया एक स्मार्टफोन है जो एक कंप्यूटर, iPod, डिजिटल कैमरा और सेलुलर फोन को एक टचस्क्रीन इंटरफेस के साथ एक डिवाइस में जोड़ता है। IPhone iOS ऑपरेटिंग सिस्टम चलाता है, और 2021 में जब iPhone 13 पेश किया गया था, तो इसमें 1TB तक स्टोरेज और 12-मेगापिक्सल का कैमरा दिया गया था।\r\n</pre>', 'upload/product/thumbnail/1769037409769086.jpg', NULL, NULL, 1, 1, 1, '2023-06-18 05:20:36', '2023-06-18 05:22:23');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `subcategory_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_name_hi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `subcategory_name_en`, `subcategory_name_hi`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mobile', 'मोबाइल', '2023-06-16 06:35:29', NULL),
(2, 1, 'Laptop', 'लैपटॉप\r\n', '2023-06-16 15:10:49', NULL),
(3, 1, 'Desktop', 'डेस्कटॉप\r\n', '2023-06-16 15:10:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_subcategories`
--

CREATE TABLE IF NOT EXISTS `sub_subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subsubcategory_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_name_hi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_subcategories`
--

INSERT INTO `sub_subcategories` (`id`, `category_id`, `subcategory_id`, `subsubcategory_name_en`, `subsubcategory_name_hi`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'SmartPhone', 'स्मार्टफोन', '2023-06-16 06:38:14', NULL),
(2, 1, 1, 'Keypad Mobile', 'कीपैड मोबाइल\r\n', '2023-06-16 06:38:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

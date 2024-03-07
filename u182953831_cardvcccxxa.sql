-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 07, 2024 at 12:44 PM
-- Server version: 10.11.7-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u182953831_cardvcccxxa`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminnotif`
--

CREATE TABLE `adminnotif` (
  `id` int(11) NOT NULL,
  `u_id` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `subtitle` text DEFAULT NULL,
  `vstat` text DEFAULT NULL,
  `dest` text DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminnotif`
--

INSERT INTO `adminnotif` (`id`, `u_id`, `title`, `subtitle`, `vstat`, `dest`, `updated_at`, `created_at`) VALUES
(1, NULL, 'Manual Deposit Request', 'A user is requested for manual payment confirmation of USD1000', '1', 'deposit', '2024-02-05 14:28:06', '2024-02-05 13:31:20'),
(2, NULL, 'Manual Withdraw Request', 'A user is requested for manual withdraw confirmation of USD100', '1', 'withdraw', '2024-02-05 14:28:06', '2024-02-05 14:12:11'),
(3, NULL, 'Manual Withdraw Request', 'A user is requested for manual withdraw confirmation of USD100', '1', 'withdraw', '2024-02-05 14:28:06', '2024-02-05 14:12:19'),
(4, NULL, 'New Card Request Request', 'A user is requesting for a new card', '1', 'cardreq', '2024-02-05 14:28:06', '2024-02-05 14:17:09'),
(5, NULL, 'Card Reload Request', 'A user is requesting for card reload', '1', 'cardreload', '2024-02-05 14:28:06', '2024-02-05 14:26:51'),
(6, NULL, 'New Card Request', 'A user is requesting for a new card', '1', 'cardreq', '2024-02-07 17:59:21', '2024-02-05 21:24:00'),
(7, NULL, 'Manual Deposit Request', 'A user is requested for manual payment confirmation of USD500', '1', 'deposit', '2024-02-06 07:18:18', '2024-02-06 07:15:43'),
(8, NULL, 'New Card Request', 'A user is requesting for a new card', '1', 'cardreq', '2024-02-06 07:26:07', '2024-02-06 07:25:36'),
(9, NULL, 'Manual Deposit Request', 'A user is requested for manual payment confirmation of USD20', '1', 'deposit', '2024-02-07 17:59:14', '2024-02-07 12:01:38'),
(10, NULL, 'New Card Request', 'A user is requesting for a new card', '1', 'cardreq', '2024-02-08 16:28:50', '2024-02-08 16:28:15'),
(11, NULL, 'New Card Request', 'A user is requesting for a new card', '1', 'cardreq', '2024-02-08 16:32:03', '2024-02-08 16:31:44'),
(12, NULL, 'New Card Request', 'A user is requesting for a new card', '1', 'cardreq', '2024-02-08 16:35:52', '2024-02-08 16:35:37'),
(13, NULL, 'Manual Deposit Request', 'A user is requested for manual payment confirmation of USD100', '1', 'deposit', '2024-02-08 16:54:45', '2024-02-08 16:54:19'),
(14, NULL, 'New Card Request', 'A user is requesting for a new card', '1', 'cardreq', '2024-02-08 19:21:10', '2024-02-08 18:32:09'),
(15, NULL, 'Manual Withdraw Request', 'A user is requested for manual withdraw confirmation of USD20', '1', 'withdraw', '2024-02-08 20:48:20', '2024-02-08 20:47:51'),
(16, NULL, 'New Card Request', 'A user is requesting for a new card', '1', 'cardreq', '2024-02-09 05:43:30', '2024-02-08 21:14:41'),
(17, NULL, 'New Card Request', 'A user is requesting for a new card', '1', 'cardreq', '2024-02-09 05:43:30', '2024-02-08 21:19:17'),
(18, NULL, 'New Card Request', 'A user is requesting for a new card', '1', 'cardreq', '2024-02-08 21:31:41', '2024-02-08 21:24:13'),
(19, NULL, 'New Card Request', 'A user is requesting for a new card', '1', 'cardreq', '2024-02-08 21:31:36', '2024-02-08 21:31:19'),
(20, NULL, 'Manual Deposit Request', 'A user is requested for manual payment confirmation of USD100', '1', 'deposit', '2024-02-10 15:44:55', '2024-02-10 15:44:08'),
(21, NULL, 'Manual Deposit Request', 'A user is requested for manual payment confirmation of USD100', '1', 'deposit', '2024-02-10 16:46:31', '2024-02-10 15:58:43'),
(22, NULL, 'New Card Request', 'A user is requesting for a new card', '1', 'cardreq', '2024-02-18 19:26:47', '2024-02-18 19:05:32'),
(23, NULL, 'New Card Request', 'A user is requesting for a new card', '1', 'cardreq', '2024-02-25 20:08:23', '2024-02-25 20:05:01');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN', 'panel@cardvcc.com', 'Neerxd', '$2y$10$oIqN7F/q0XwciklMcElRvuN0ZCgVQkHzJmR0.VDWWkPkhacC.bquW', 'oy3wjBbYA5g2yTM1VBKSixH60X2tiPey8YR6Az9m5i6zNYgSUqBViyAxuJ5i', '2018-05-18 18:00:00', '2024-02-10 16:57:41');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `des` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `des`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Lorem Ipsum is simply dummy text', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'assets/images/blog/1535449337.softwareSliderImg.jpg', 0, '2018-08-15 03:44:24', '2018-08-28 13:42:18'),
(3, 'Lorem Ipsum is simply dummy text', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'assets/images/blog/1535449361.banner_blog3.jpg', 0, '2018-08-15 04:26:48', '2018-08-28 13:42:41'),
(4, 'Lorem Ipsum is simply dummy text', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'assets/images/blog/1534332816.03.jpg', 0, '2018-08-15 04:26:57', '2018-10-09 12:42:55');

-- --------------------------------------------------------

--
-- Table structure for table `cardcategories`
--

CREATE TABLE `cardcategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_name` varchar(191) NOT NULL,
  `image` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cardcategories`
--

INSERT INTO `cardcategories` (`id`, `cat_name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Visa', 'assets/images/categoryimage/1704613689.visa.png', 1, '2023-12-09 13:46:38', '2024-01-07 01:48:10'),
(8, 'MasterCard', 'assets/images/categoryimage/1704613698.mcard.png', 1, '2023-12-09 14:02:29', '2024-01-07 01:48:18'),
(9, 'MTCARD', 'assets/images/categoryimage/1702403458', 0, '2023-12-12 11:50:58', '2024-02-06 10:12:20');

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` int(10) UNSIGNED NOT NULL,
  `card_details` text NOT NULL,
  `card_image` text DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT 0,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `card_details`, `card_image`, `user_id`, `category_id`, `sub_category_id`, `status`, `created_at`, `updated_at`) VALUES
(11, 'Details of the card, Number and all required, Admin will fill this from backend.', '', 0, 1, 1, 1, '2018-10-07 00:18:12', '2018-10-08 00:53:14'),
(12, 'Details of the card, Number and all required, Admin will fill this from backend.', '', 0, 1, 1, 1, '2018-10-08 00:18:14', '2018-10-08 00:36:40'),
(13, 'Details of the card, Number and all required, Admin will fill this from backend.', '', 0, 1, 1, 1, '2018-10-08 00:18:15', '2018-10-09 12:53:06'),
(14, 'Details of the card, Number and all required, Admin will fill this from backend.', '', 0, 1, 1, 1, '2018-10-08 00:18:17', '2018-10-09 12:53:06'),
(15, 'Details of the card, Number and all required, Admin will fill this from backend.', '', 0, 1, 1, 1, '2018-10-08 00:18:19', '2018-10-09 14:19:07'),
(16, 'Details of the card, Number and all required, Admin will fill this from backend.', '', 0, 1, 1, 1, '2018-10-08 00:18:20', '2018-10-09 14:19:07'),
(17, 'Details of the card, Number and all required, Admin will fill this from backend.', '', 0, 1, 1, 1, '2018-10-08 00:18:21', '2018-10-09 14:19:07'),
(18, 'Details of the card, Number and all required, Admin will fill this from backend.', '', 0, 1, 1, 1, '2018-10-08 00:18:23', '2018-10-09 14:19:22'),
(19, 'Details of the card, Number and all required, Admin will fill this from backend.', '', 0, 1, 1, 1, '2018-10-08 00:18:24', '2018-10-09 14:19:22'),
(20, 'Details of the card, Number and all required, Admin will fill this from backend.', '', 0, 1, 1, 1, '2018-10-08 00:18:26', '2018-10-09 14:19:22'),
(21, 'Details of the card, Number and all required, Admin will fill this from backend.', '', 0, 1, 1, 1, '2018-10-08 00:18:27', '2018-10-09 14:19:22'),
(22, 'Details of the card, Number and all required, Admin will fill this from backend.', '', 0, 2, 2, 1, '2018-10-08 00:19:11', '2018-10-09 14:28:03'),
(23, 'Details of the card, Number and all required, Admin will fill this from backend.', '', 0, 2, 2, 1, '2018-10-08 00:19:16', '2018-10-09 14:28:03'),
(24, 'Details of the card, Number and all required, Admin will fill this from backend.', '', 0, 2, 2, 1, '2018-10-08 00:19:19', '2018-10-09 14:28:03'),
(25, 'Details of the card, Number and all required, Admin will fill this from backend.', '', 0, 2, 2, 1, '2018-10-08 00:19:22', '2018-10-09 14:28:03'),
(26, 'Details of the card, Number and all required, Admin will fill this from backend.', '', 0, 2, 2, 1, '2018-10-08 00:20:06', '2018-10-09 14:28:03');

-- --------------------------------------------------------

--
-- Table structure for table `cardsubcategories`
--

CREATE TABLE `cardsubcategories` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `tooltipstext` text DEFAULT NULL,
  `cat_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cardsubcategories`
--

INSERT INTO `cardsubcategories` (`id`, `name`, `tooltipstext`, `cat_id`, `status`, `created_at`, `updated_at`) VALUES
(15, '441112', NULL, 7, 1, '2023-12-10 01:33:38', '2024-02-08 17:15:04'),
(16, '485932', NULL, 7, 1, '2023-12-10 01:36:12', '2024-02-08 17:14:56'),
(17, '450306', NULL, 7, 1, '2023-12-10 01:36:21', '2024-02-08 17:15:46'),
(18, '556371', NULL, 8, 1, '2023-12-10 01:36:29', '2024-02-08 17:16:16'),
(19, '559292', NULL, 8, 1, '2023-12-10 01:45:39', '2024-02-08 17:16:58'),
(20, '531993', NULL, 8, 1, '2023-12-10 02:25:33', '2024-02-08 17:17:27'),
(21, '553370', NULL, 8, 1, '2023-12-10 02:25:41', '2024-02-08 17:18:00'),
(24, '100010', 'Can\'t usable', 8, 0, '2024-01-19 04:41:04', '2024-02-08 20:59:51'),
(25, '404038', NULL, 7, 1, '2024-02-08 17:18:42', '2024-02-08 17:18:42'),
(26, '524897', NULL, 8, 1, '2024-02-08 17:19:06', '2024-02-08 17:19:06'),
(27, '556150', NULL, 8, 1, '2024-02-08 17:19:34', '2024-02-08 17:19:34'),
(28, '559666', NULL, 8, 1, '2024-02-08 17:20:02', '2024-02-08 17:20:02');

-- --------------------------------------------------------

--
-- Table structure for table `cardtrans`
--

CREATE TABLE `cardtrans` (
  `id` int(11) NOT NULL,
  `u_id` text NOT NULL,
  `card_id` text NOT NULL,
  `details` text DEFAULT NULL,
  `amount` text NOT NULL,
  `price` text NOT NULL,
  `postbalance` text DEFAULT NULL,
  `type` text NOT NULL,
  `trx` text DEFAULT NULL,
  `category` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` text NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cardtrans`
--

INSERT INTO `cardtrans` (`id`, `u_id`, `card_id`, `details`, `amount`, `price`, `postbalance`, `type`, `trx`, `category`, `message`, `status`, `updated_at`, `created_at`) VALUES
(1, '31', '1', 'Inital Card Balance', '200', '220', '200', '+', 'u4o6quE', NULL, NULL, '1', '2024-02-18 19:27:18', '2024-02-18 19:27:18');

-- --------------------------------------------------------

--
-- Table structure for table `card_bin_numbers`
--

CREATE TABLE `card_bin_numbers` (
  `id` int(10) NOT NULL,
  `number` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `card_bin_numbers`
--

INSERT INTO `card_bin_numbers` (`id`, `number`, `type`, `created_at`, `updated_at`) VALUES
(1, '544556', 'Master Card', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `card_request`
--

CREATE TABLE `card_request` (
  `id` int(10) NOT NULL,
  `u_id` varchar(255) DEFAULT NULL,
  `b_id` varchar(255) DEFAULT NULL,
  `c_name` text DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `holdername` varchar(255) DEFAULT NULL,
  `security` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `exp` varchar(255) DEFAULT NULL,
  `expto` text DEFAULT NULL,
  `baddress` text DEFAULT NULL,
  `balance` text DEFAULT NULL,
  `balanceleft` text DEFAULT NULL,
  `price` text DEFAULT NULL,
  `pstat` text DEFAULT NULL,
  `ptype` text DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `deliverytime` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `card_request`
--

INSERT INTO `card_request` (`id`, `u_id`, `b_id`, `c_name`, `number`, `holdername`, `security`, `message`, `exp`, `expto`, `baddress`, `balance`, `balanceleft`, `price`, `pstat`, `ptype`, `status`, `deliverytime`, `created_at`, `updated_at`) VALUES
(1, '31', '441112', 'Visa', '4411126889866658', 'Abu Sayeem', '578', NULL, '02/24', '02/26', 'Nakla,Sherpur', '200', NULL, '220', '1', '1', '1', NULL, '2024-02-18 19:05:32', '2024-02-18 19:27:18'),
(2, '31', '441112', 'Visa', NULL, 'abu sayeem', NULL, 'reject', '02/24', '02/26', 'fghfghjg', '50', NULL, '55', '1', '1', '3', NULL, '2024-02-25 20:05:01', '2024-02-25 20:09:05');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `gateway_id` int(11) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `charge` varchar(255) DEFAULT NULL,
  `usd_amo` varchar(255) DEFAULT NULL,
  `btc_amo` varchar(255) DEFAULT NULL,
  `btc_wallet` varchar(255) DEFAULT NULL,
  `trx` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `try` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`id`, `user_id`, `gateway_id`, `amount`, `charge`, `usd_amo`, `btc_amo`, `btc_wallet`, `trx`, `status`, `try`, `created_at`, `updated_at`) VALUES
(1, 1, 103, '10', '3.3', '13.3', '0', '', 'ekEilMhTKkbjuRdx', 0, 0, '2023-12-08 03:41:46', '2023-12-08 03:41:46'),
(2, 1, 101, '10', '0', '0.13', '0', '', '5gSwFlMNGdlAzSQS', 0, 0, '2023-12-08 03:42:03', '2023-12-08 03:42:03');

-- --------------------------------------------------------

--
-- Table structure for table `deposit_data`
--

CREATE TABLE `deposit_data` (
  `id` int(11) NOT NULL,
  `user_id` text DEFAULT NULL,
  `trx` text DEFAULT NULL,
  `details` text DEFAULT NULL,
  `gateway` text DEFAULT NULL,
  `currency` text DEFAULT NULL,
  `fee` text DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payurl` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `proof` text DEFAULT NULL,
  `pstat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deposit_data`
--

INSERT INTO `deposit_data` (`id`, `user_id`, `trx`, `details`, `gateway`, `currency`, `fee`, `amount`, `status`, `created_at`, `updated_at`, `payurl`, `message`, `proof`, `pstat`) VALUES
(1, '27', '5r29IGGzmz', 'Automatic Deposit', '1', 'USD', '5', '50', '5', '2024-02-10 14:44:49', '2024-02-10 14:45:03', 'https://commerce.coinbase.com/charges/R3TWD6LD', NULL, NULL, '0'),
(2, '27', 'x4pI4pjily', 'Automatic Deposit', '1', 'USD', '5', '50', '5', '2024-02-10 14:45:25', '2024-02-10 15:34:28', 'https://commerce.coinbase.com/charges/WZQAL52N', NULL, NULL, '0'),
(3, '27', 'kiWq8MwmSq', 'Manual Deposit', '2', 'USD', '0', '100', '1', '2024-02-10 15:44:08', '2024-02-10 15:45:07', NULL, NULL, 'assets/images/proof/65c799c7eb65b_20240210154407.jpg', '1'),
(4, '27', 'Ldtbt1dSES', 'Manual Deposit', '2', 'USD', '0', '100', '1', '2024-02-10 15:58:43', '2024-02-10 15:59:00', NULL, NULL, 'assets/images/proof/65c79d33a9baf_20240210155843.jpg', '1'),
(5, '27', 'cPiMIFQqXj', 'Automatic Deposit', '1', 'USD', '5', '50', '5', '2024-02-12 13:25:19', '2024-02-12 13:26:22', 'https://commerce.coinbase.com/charges/QWWXB62D', NULL, NULL, '0'),
(6, '31', 'gY4uKlUQzY', 'Automatic Deposit', '1', 'USD', '5', '50', '5', '2024-02-15 20:32:36', '2024-02-15 21:32:44', 'https://commerce.coinbase.com/charges/72H4P9TJ', NULL, NULL, '0'),
(7, '31', 'SvbVN3NNKc', 'Automatic Deposit', '1', 'USD', '5', '50', '5', '2024-02-15 20:32:50', '2024-02-15 21:32:59', 'https://commerce.coinbase.com/charges/2ENMZ86P', NULL, NULL, '0'),
(8, '31', 'cHCBnkxBxG', 'Automatic Deposit', '1', 'USD', '5', '50', '5', '2024-02-15 20:32:57', '2024-02-15 21:33:05', 'https://commerce.coinbase.com/charges/658HH24H', NULL, NULL, '0'),
(9, '33', 'LWcapts8Ru', 'Automatic Deposit', '1', 'USD', '2', '20', '5', '2024-02-15 21:15:45', '2024-02-15 21:16:04', 'https://commerce.coinbase.com/charges/88CBYTDF', NULL, NULL, '0'),
(10, '31', 'aSjoh0D6h3', 'Automatic Deposit', '1', 'USD', '5', '50', '5', '2024-02-16 05:45:27', '2024-02-16 06:45:35', 'https://commerce.coinbase.com/charges/XL58352T', NULL, NULL, '0'),
(11, '31', 'VK7f75Kdep', 'Automatic Deposit', '1', 'USD', '5', '50', '5', '2024-02-16 07:07:23', '2024-02-16 08:07:29', 'https://commerce.coinbase.com/charges/Y45G2JCK', NULL, NULL, '0'),
(12, '27', 'CLei8IJ3eY', 'Automatic Deposit', '1', 'USD', '2', '20', '5', '2024-02-16 08:27:54', '2024-02-16 09:28:02', 'https://commerce.coinbase.com/charges/FLYM5PZA', NULL, NULL, '0'),
(13, '27', 'ZAOJBn75tu', 'Automatic Deposit', '1', 'USD', '2.5', '25', '5', '2024-02-16 18:19:03', '2024-02-16 19:19:11', 'https://commerce.coinbase.com/charges/TPF55LHK', NULL, NULL, '0'),
(14, '27', 'IyFq8RSGwr', 'Automatic Deposit', '1', 'USD', '2.5', '25', '5', '2024-02-16 18:19:12', '2024-02-16 19:19:20', 'https://commerce.coinbase.com/charges/JMERJ59Y', NULL, NULL, '0'),
(15, '27', 'o08CNMcixL', 'Automatic Deposit', '1', 'USD', '2.5', '25', '5', '2024-02-16 18:19:22', '2024-02-16 19:19:30', 'https://commerce.coinbase.com/charges/FEGXZMBA', NULL, NULL, '0'),
(16, '30', 'AxlnrGcjtd', 'Automatic Deposit', '1', 'USD', '5', '50', '5', '2024-02-16 19:06:20', '2024-02-16 19:06:38', 'https://commerce.coinbase.com/charges/XXRFWVTR', NULL, NULL, '0'),
(17, '37', '2pX8H9ism1', 'Automatic Deposit', '1', 'USD', '6', '60', '5', '2024-02-17 22:05:39', '2024-02-17 23:05:47', 'https://commerce.coinbase.com/charges/7V4MG56C', NULL, NULL, '0'),
(18, '39', 'muAKZJw29t', 'Automatic Deposit', '1', 'USD', '11.1', '111', '5', '2024-02-19 05:09:06', '2024-02-19 06:09:14', 'https://commerce.coinbase.com/charges/YB2MKTEE', NULL, NULL, '0'),
(19, '31', 'LcdWPOoTTx', 'Automatic Deposit', '1', 'USD', '5', '50', '5', '2024-02-25 20:05:25', '2024-02-25 20:06:26', 'https://commerce.coinbase.com/charges/AZE6XQDP', NULL, NULL, '0'),
(20, '42', '7XbhaAbs9g', 'Automatic Deposit', '1', 'USD', '50', '500', '5', '2024-02-28 17:32:26', '2024-02-28 18:32:35', 'https://commerce.coinbase.com/charges/2GABBMDM', NULL, NULL, '0'),
(21, '43', 'BKVK3mYvNz', 'Automatic Deposit', '1', 'USD', '2', '20', '5', '2024-02-29 19:34:17', '2024-02-29 20:34:25', 'https://commerce.coinbase.com/charges/KJHLAMJG', NULL, NULL, '0'),
(22, '45', 'BDmFGGFHos', 'Automatic Deposit', '1', 'USD', '10', '100', '5', '2024-03-02 18:35:53', '2024-03-02 18:36:14', 'https://commerce.coinbase.com/charges/J3AAQNYY', NULL, NULL, '0'),
(23, '49', 'BnslDxgWeq', 'Automatic Deposit', '1', 'USD', '5.5', '55', '5', '2024-03-06 02:14:59', '2024-03-06 03:15:07', 'https://commerce.coinbase.com/charges/WK28H3CH', NULL, NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `faqdetails`
--

CREATE TABLE `faqdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `sortdes` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqdetails`
--

INSERT INTO `faqdetails` (`id`, `title`, `sortdes`, `created_at`, `updated_at`) VALUES
(1, 'Frequesntly Asked Question 01', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', NULL, '2018-10-04 19:38:36'),
(2, 'Frequesntly Asked Question 02', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', NULL, '2018-10-04 19:38:42'),
(3, 'Frequesntly Asked Question 03', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', NULL, '2018-10-04 19:39:01'),
(4, 'Frequesntly Asked Question 04', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', NULL, '2018-10-04 19:39:07'),
(5, 'Frequesntly Asked Question 05', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', NULL, '2018-10-04 19:39:13'),
(6, 'Frequesntly Asked Question 06', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', NULL, '2018-10-04 19:39:19');

-- --------------------------------------------------------

--
-- Table structure for table `gateway`
--

CREATE TABLE `gateway` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `api` text DEFAULT NULL,
  `secret` text DEFAULT NULL,
  `hash` text DEFAULT NULL,
  `version` text DEFAULT NULL,
  `currency` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `callback_url` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gateway`
--

INSERT INTO `gateway` (`id`, `name`, `image`, `api`, `secret`, `hash`, `version`, `currency`, `status`, `callback_url`, `created_at`, `updated_at`) VALUES
(1, 'Coinbase Commerce', NULL, '8037c3aa-4545-485d-91f2-d8aeb88a6d7d', 'f60342cd-4a71-4c5f-bab2-07acd2a8741c', NULL, NULL, 'USD', '1', NULL, NULL, '2024-02-09 05:41:55'),
(2, 'Manual Deposit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

CREATE TABLE `gateways` (
  `id` int(10) UNSIGNED NOT NULL,
  `main_name` varchar(191) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `minamo` varchar(191) DEFAULT NULL,
  `maxamo` varchar(191) DEFAULT NULL,
  `fixed_charge` varchar(191) DEFAULT NULL,
  `percent_charge` varchar(191) DEFAULT NULL,
  `rate` varchar(191) DEFAULT NULL,
  `val1` varchar(191) DEFAULT NULL,
  `val2` varchar(191) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` (`id`, `main_name`, `name`, `minamo`, `maxamo`, `fixed_charge`, `percent_charge`, `rate`, `val1`, `val2`, `status`, `created_at`, `updated_at`) VALUES
(101, 'PayPal', 'PayPal', NULL, NULL, NULL, NULL, '80', 'rexrifat636@gmail.com', NULL, 1, NULL, '2018-08-28 13:14:10'),
(102, 'PerfectMoney', 'Perfect Money', '20', '20000', '2', '1', '76', 'U5376900', 'G079qn4Q7XATZBqyoCkBteGRg', 1, NULL, '2018-08-28 13:14:33'),
(103, 'Stripe', 'Credit Card', '10', '50000', '3', '3', '1', 'sk_test_aat3tzBCCXXBkS4sxY3M8A1B', 'pk_test_AU3G7doZ1sbdpJLj0NaozPBu', 1, NULL, '2018-05-27 18:11:50'),
(104, 'Skrill', 'Skrill', '10', '50000', '3', '3', '1', 'merchant@skrill.com', 'TheSoftKing', 1, NULL, '2018-05-20 12:01:09'),
(501, 'Blockchain.info', 'BitCoin', '1', '20000', '1', '0.5', '1', '3965f52f-ec19-43af-90ed-d613dc60657eSSS', 'xpub6DREmHywjNizvs9b4hhNekcjFjvL4rshJjnrHHgtLNCSbhhx5jKFRgqdmXAecLAddEPudDZY4xoDbV1NVHSCeDp1S7NumPCNNjbxB7sGasY0000', 1, NULL, '2018-05-21 01:20:29'),
(502, 'block.io - BTC', 'BitCoin', '1', '99999', '1', '0.5', '1', 'd6cd-daa2-1eeb-d4b7', '09876softk', 1, '2018-01-27 18:00:00', '2018-08-28 01:55:56'),
(503, 'block.io - LTC', 'LiteCoin', '100', '10000', '0.4', '1', '1', '4494-4014-373a-3454', '09876softk', 1, NULL, '2018-05-31 09:27:34'),
(504, 'block.io - DOGE', 'DogeCoin', '1', '50000', '0.51', '2.52', '1', 'b224-398b-8054-8325', '09876softk', 1, NULL, '2018-05-31 09:28:54'),
(505, 'CoinPayment - BTC', 'BitCoin', '1', '50000', '0.51', '2.52', '1', '596f0097ed9d1ab8cfed05eb59c70e9f066513dfe4df64a8fc3917d309328315', '7472928395208f70E3cE30B9e10dc882cBDD3e9967b7942AaE492106d9C7bE44', 1, NULL, '2018-05-31 09:38:33'),
(506, 'CoinPayment - ETH', 'Etherium', '1', '50000', '0.51', '2.52', '1', '596f0097ed9d1ab8cfed05eb59c70e9f066513dfe4df64a8fc3917d309328315', '7472928395208f70E3cE30B9e10dc882cBDD3e9967b7942AaE492106d9C7bE44', 1, NULL, '2018-05-31 09:39:04'),
(507, 'CoinPayment - BCH', 'Bitcoin Cash', '1', '50000', '0.51', '2.52', '1', '596f0097ed9d1ab8cfed05eb59c70e9f066513dfe4df64a8fc3917d309328315', '7472928395208f70E3cE30B9e10dc882cBDD3e9967b7942AaE492106d9C7bE44', 1, NULL, '2018-05-31 09:39:04'),
(508, 'CoinPayment - DASH', 'DASH', '1', '50000', '0.51', '2.52', '1', '596f0097ed9d1ab8cfed05eb59c70e9f066513dfe4df64a8fc3917d309328315', '7472928395208f70E3cE30B9e10dc882cBDD3e9967b7942AaE492106d9C7bE44', 1, NULL, '2018-05-31 09:39:04'),
(509, 'CoinPayment - DOGE', 'DOGE', '1', '50000', '0.51', '2.52', '1', '596f0097ed9d1ab8cfed05eb59c70e9f066513dfe4df64a8fc3917d309328315', '7472928395208f70E3cE30B9e10dc882cBDD3e9967b7942AaE492106d9C7bE44', 1, NULL, '2018-05-31 09:39:04'),
(510, 'CoinPayment - LTC', 'LTC', '1', '50000', '0.51', '2.52', '1', '596f0097ed9d1ab8cfed05eb59c70e9f066513dfe4df64a8fc3917d309328315', '7472928395208f70E3cE30B9e10dc882cBDD3e9967b7942AaE492106d9C7bE44', 1, NULL, '2018-05-31 09:39:04'),
(512, 'CoinGate', 'CoinGate', '10', '1000', '05', '5', '1', 'Ba1VgPx6d437xLXGKCBkmwVCEw5kHzRJ6thbGo-N', NULL, 1, '2018-07-08 18:00:00', '2018-05-21 01:20:54'),
(513, 'CoinPayment-ALL', 'Coin Payment', '10', '1000', '05', '5', '1', 'db1d9f12444e65c921604e289a281c56', NULL, 1, NULL, '2018-05-21 01:20:54');

-- --------------------------------------------------------

--
-- Table structure for table `generals`
--

CREATE TABLE `generals` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL DEFAULT 'Website',
  `subtitle` varchar(191) NOT NULL DEFAULT 'Sub Title',
  `website_email_address` text DEFAULT NULL,
  `website_number` text DEFAULT NULL,
  `website_address` text DEFAULT NULL,
  `cur` varchar(191) NOT NULL DEFAULT 'USD',
  `cursym` varchar(191) NOT NULL DEFAULT '$',
  `reg` int(11) NOT NULL DEFAULT 1,
  `emailver` int(11) NOT NULL DEFAULT 1,
  `smsver` int(11) NOT NULL DEFAULT 1,
  `decimal` int(11) NOT NULL DEFAULT 2,
  `emailnotf` int(11) NOT NULL DEFAULT 1,
  `smsnotf` int(11) NOT NULL DEFAULT 1,
  `email` varchar(100) DEFAULT NULL,
  `template` text DEFAULT NULL,
  `smsapi` text DEFAULT NULL,
  `practise_header_title` text DEFAULT NULL,
  `practise_header_des` text DEFAULT NULL,
  `welcome_details_des` text DEFAULT NULL,
  `welcome_details_youtube` text DEFAULT NULL,
  `welcome_details_title` text DEFAULT NULL,
  `attorney_header_title` text DEFAULT NULL,
  `attorney_header_des` text DEFAULT NULL,
  `faq_title` text DEFAULT NULL,
  `faq_des` text DEFAULT NULL,
  `about_heading` text DEFAULT NULL,
  `about_details` longtext DEFAULT NULL,
  `footer` text DEFAULT NULL,
  `subs_title` text DEFAULT NULL,
  `subs_des` text DEFAULT NULL,
  `static_head` text DEFAULT NULL,
  `static_des` text DEFAULT NULL,
  `welcome_header_title` text DEFAULT NULL,
  `welcome_header_des` text DEFAULT NULL,
  `mincard` text DEFAULT NULL,
  `depositfee` text DEFAULT NULL,
  `mindepo` text DEFAULT NULL,
  `minwith` text DEFAULT NULL,
  `minreload` text DEFAULT NULL,
  `mincwith` text DEFAULT NULL,
  `withfee` text DEFAULT NULL,
  `reloadfee` text DEFAULT NULL,
  `cwithfee` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `generals`
--

INSERT INTO `generals` (`id`, `title`, `subtitle`, `website_email_address`, `website_number`, `website_address`, `cur`, `cursym`, `reg`, `emailver`, `smsver`, `decimal`, `emailnotf`, `smsnotf`, `email`, `template`, `smsapi`, `practise_header_title`, `practise_header_des`, `welcome_details_des`, `welcome_details_youtube`, `welcome_details_title`, `attorney_header_title`, `attorney_header_des`, `faq_title`, `faq_des`, `about_heading`, `about_details`, `footer`, `subs_title`, `subs_des`, `static_head`, `static_des`, `welcome_header_title`, `welcome_header_des`, `mincard`, `depositfee`, `mindepo`, `minwith`, `minreload`, `mincwith`, `withfee`, `reloadfee`, `cwithfee`, `created_at`, `updated_at`) VALUES
(1, 'Cardvcc', 'CardVCC The Best Virtual Credit Card Service', 'do-not-reply@thesoftking.com', '0 123 456 7890', 'Dhaka , Bangladesh', 'USD', '$', 1, 1, 1, 2, 0, 0, 'do-not-reply@thesoftking.com', '<p>&nbsp;</p>\r\n<div class=\"wrapper\" style=\"background-color: #f2f2f2;\">\r\n<table style=\"border-collapse: collapse; table-layout: fixed; color: #b8b8b8; font-family: Ubuntu,sans-serif;\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"preheader__snippet\" style=\"padding: 10px 0 5px 0; vertical-align: top; width: 280px;\">&nbsp;</td>\r\n<td class=\"preheader__webversion\" style=\"text-align: right; padding: 10px 0 5px 0; vertical-align: top; width: 280px;\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table id=\"emb-email-header-container\" class=\"header\" style=\"border-collapse: collapse; table-layout: fixed; margin-left: auto; margin-right: auto;\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"padding: 0; width: 600px;\">\r\n<div class=\"header__logo emb-logo-margin-box\" style=\"font-size: 26px; line-height: 32px; color: #c3ced9; font-family: Roboto,Tahoma,sans-serif; margin: 6px 20px 20px 20px;\">\r\n<div id=\"emb-email-header\" class=\"logo-left\" style=\"font-size: 0px !important; line-height: 0 !important;\" align=\"left\"><img style=\"height: auto; width: 100%; border: 0; max-width: 312px;\" src=\"http://i.imgur.com/nNCNPZT.png\" alt=\"\" width=\"312\" height=\"44\"></div>\r\n</div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table class=\"layout layout--no-gutter\" style=\"border-collapse: collapse; table-layout: fixed; margin-left: auto; margin-right: auto; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #ffffff;\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td class=\"column\" style=\"padding: 0; text-align: left; vertical-align: top; color: #60666d; font-size: 14px; line-height: 21px; font-family: sans-serif; width: 600px;\">\r\n<div style=\"margin-left: 20px; margin-right: 20px; margin-top: 24px;\">\r\n<div style=\"line-height: 10px; font-size: 1px;\">&nbsp;</div>\r\n</div>\r\n<div style=\"margin-left: 20px; margin-right: 20px;\">\r\n<h2>Hi {{name}},</h2>\r\n<p><strong>{{message}}</strong></p>\r\n</div>\r\n<div style=\"margin-left: 20px; margin-right: 20px;\"><br></div>\r\n<div style=\"margin-left: 20px; margin-right: 20px; margin-bottom: 24px;\">\r\n<p class=\"size-14\" style=\"margin-top: 0; margin-bottom: 0; font-size: 14px; line-height: 21px;\">Thanks,<br> <strong>CardMate Team<br></strong></p>\r\n</div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>', 'https://api.infobip.com/api/v3/sendsms/plain?user=****&password=*****&sender=cardmate&SMSText={{message}}&GSM={{number}}&type=longSMS', 'Our Features', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum', 'https://www.youtube.com/watch?v=rR1Z74qOwhA', 'Learn More About Us!!', 'Caregories we Covered', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.', 'Frequesntly Asked Questions', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum', 'About Us', '<div align=\"center\"><font size=\"6\"><b>ABOUT US</b></font><br></div><div align=\"left\"><br></div><div align=\"left\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur sequi, blanditiis distinctio quae iste, aspernatur explicabo similique deserunt obcaecati, magnam ex. Iste eius itaque ratione enim, ut autem aliquam totam numquam minus atque at odio, corrupti a laudantium dolores accusamus cum saepe veritatis! Ullam iure temporibus recusandae, quis nobis cum excepturi. Placeat reprehenderit in consequatur odio debitis possimus laudantium, dolor eum distinctio aperiam commodi ab pariatur iure deserunt recusandae. Unde quae alias, iusto voluptatum error perspiciatis hic, dolorum architecto id voluptatibus, nesciunt! Quibusdam repudiandae libero placeat ratione assumenda magnam illo nam dolorum quam minima exercitationem aspernatur voluptatem ad quia suscipit fugit, accusantium itaque deleniti tempora omnis distinctio beatae eligendi est corrupti ipsum. Cumque tempore sunt, itaque nesciunt cupiditate veritatis architecto at repellat eius ex praesentium magnam repudiandae a, blanditiis repellendus ipsam vero expedita exercitationem sapiente quas quam quos dolorum quisquam! <br></div><div><br></div><div align=\"center\">Sit voluptas fuga temporibus, sapiente, iure laboriosam dolore quod ab provident, corrupti magni odio dolor sed quisquam optio. Assumenda iusto dignissimos odit soluta laboriosam officia ut incidunt at unde nisi, corrupti odio. Autem distinctio dolore quas! Sit quibusdam, tempora veniam nesciunt beatae repellendus, eos optio. Omnis ex provident veritatis a et temporibus, similique magni ad nesciunt harum delectus nihil natus, animi eaque commodi asperiores eos tempore fugiat voluptate non maiores libero quas in ratione iste? Quibusdam assumenda perferendis voluptate dolore alias earum corporis, facilis ab nihil nulla! Voluptas dignissimos vel repellendus laudantium possimus accusantium doloribus quod amet, soluta incidunt ut cum adipisci sit similique veniam numquam reprehenderit, optio nisi corporis explicabo rerum consequatur minima labore nobis maiores.</div><div><br></div><div align=\"right\"> Ullam odio officiis culpa eligendi itaque officia iure labore veniam corporis, delectus hic tenetur dolorem repellendus provident neque repudiandae suscipit quas. Numquam doloremque autem, libero saepe iusto ipsum sed nulla omnis. Soluta optio dolor fugit voluptas quos quibusdam distinctio vero saepe dolore tempora, dolorum sit molestias quas itaque vitae tenetur voluptatibus, nulla pariatur quasi deleniti, impedit consectetur odio ex debitis laborum. Dolores porro, ipsum dolorum placeat voluptatem architecto quas vitae aliquam reiciendis, est adipisci inventore quis, velit aut ad quasi ut quaerat blanditiis accusamus cLorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur sequi, blanditiis distinctio quae iste, aspernatur explicabo similique deserunt obcaecati, magnam ex. Iste eius itaque ratione enim, ut autem aliquam totam numquam minus atque at odio, corrupti a laudantium dolores accusamus cum saepe veritatis! Ullam iure temporibus recusandae, quis nobis cum excepturi. Placeat reprehenderit in consequatur odio debitis possimus laudantium, dolor eum distinctio aperiam commodi ab pariatur iure deserunt recusandae. Unde quae alias, iusto voluptatum error perspiciatis hic, dolorum architecto id voluptatibus, nesciunt! Quibusdam repudiandae libero placeat ratione assumenda magnam illo nam dolorum quam minima exercitationem aspernatur <br></div><div><b><br></b></div><div align=\"justify\"><b>voluptatem ad quia suscipit fugit, accusantium itaque deleniti tempora omnis distinctio beatae eligendi est corrupti ipsum. Cumque tempore sunt, itaque nesciunt cupiditate veritatis architecto at repellat eius ex praesentium magnam repudiandae a, blanditiis repellendus ipsam vero expedita exercitationem sapiente quas quam quos dolorum quisquam! Sit voluptas fuga temporibus, sapiente, iure laboriosam dolore quod ab provident, corrupti magni odio dolor sed quisquam optio. Assumenda iusto dignissimos odit soluta laboriosam officia ut incidunt at unde nisi, corrupti odio. Autem distinctio dolore quas! Sit quibusdam, tempora veniam nesciunt beatae repellendus, eos optio. Omnis ex provident veritatis a et temporibus, similique magni ad nesciunt harum delectus nihil natus, animi eaque commodi asperiores eos tempore fugiat voluptate non maiores libero quas in ratione iste? Quibusdam assumenda perferendis voluptate dolore alias earum corporis, facilis ab nihil nulla! Voluptas dignissimos vel repellendus laudantium possimus accusantium doloribus quod amet, soluta incidunt ut cum adipisci sit similique veniam numquam reprehenderit, optio nisi corporis explicabo rerum consequatur minima labore nobis maiores. Ullam odio officiis culpa eligendi itaque officia iure labore veniam corporis, delectus hic tenetur dolorem repellendus provident neque repudiandae suscipit quas. Numquam doloremque autem, libero saepe iusto ipsum sed nulla omnis. Soluta optio dolor fugit voluptas quos quibusdam distinctio vero saepe dolore tempora, dolorum sit molestias quas itaque vitae tenetur voluptatibus, nulla paria</b><br></div><br>', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet ipsum amet odit distinctio autem dicta hic, voluptatum.', 'Subscribe Us', 'The intended use of __sleep() is to commit pending data or perform similar cleanup tasks. Also, the function is useful if you have very large objects which do not need to be saved completely.', 'It is a long established', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'Purchase Card is Very Easy With CardMate', 'CardMate Is a Platform Where Admin Can Sell All kind of card. Virtual Card , Prepaid Card Even Mobile recharge card.', '50', '0.1', '20', '20', '20', '1', '0.2', '0.3', '0', NULL, '2024-02-10 16:43:26');

-- --------------------------------------------------------

--
-- Table structure for table `loginpage`
--

CREATE TABLE `loginpage` (
  `id` int(11) NOT NULL,
  `logo` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loginpage`
--

INSERT INTO `loginpage` (`id`, `logo`, `image`, `content`, `updated_at`, `created_at`) VALUES
(1, 'https://cardvcc.com/portal/assets/images/logo/logo.png', 'https://cardvcc.com/portal/assets2/media/misc/auth-screens.png', '<!--begin::Title-->\r\n            <h1 class=\"d-none d-lg-block text-dark fs-2qx fw-bolder text-center mb-7\">Instant Virtual Credit Card\r\n            </h1>\r\n            <!--end::Title-->\r\n            <!--begin::Text-->\r\n            <div class=\"d-none d-lg-block text-dark fs-base text-center\">The best Virtual Credit Card (VCC) Service <br>\r\n                <a href=\"#\" class=\"opacity-75-hover text-warning fw-bold me-1\">You</a> can create a Virtual card Instant\r\n                <br>No KYC Required\r\n                <a href=\"#\" class=\"opacity-75-hover text-warning fw-bold me-1\">Enjoy</a>\r\n                <br>CardVCC Service\r\n            </div>\r\n            <!--end::Text-->', '2024-02-06 07:12:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'We don\'t have any alternative domain like: cardsvcc.com, cardvcc.net etc.', '1', '2024-01-21 10:51:15', '2024-01-23 04:36:08'),
(2, '50040 Bin working on Google Ads Now', '1', '2024-01-21 10:57:53', '2024-02-06 07:32:09');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `status` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Privacy Policy', 'privacy policy contentasdasd', NULL, '2024-01-21 11:34:39', '2024-01-21 11:50:43'),
(2, 'Refund and Return Policy', 'Refund and return policy hereaa', NULL, '2024-01-21 11:50:36', '2024-01-21 11:50:41'),
(3, 'Terms & Conditions', '<h2><strong>Terms and Conditions</strong></h2>\r\n\r\n<p>Welcome to cardvcc.com!</p>\r\n\r\n<p>These terms and conditions outline the rules and regulations for the use of CardVcc\'s Website, located at https://cardvcc.com/.</p>\r\n\r\n<p>By accessing this website we assume you accept these terms and conditions. Do not continue to use cardvcc.com if you do not agree to take all of the terms and conditions stated on this page.</p>\r\n\r\n<p>The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: \"Client\", \"You\" and \"Your\" refers to you, the person log on this website and compliant to the Company\'s terms and conditions. \"The Company\", \"Ourselves\", \"We\", \"Our\" and \"Us\", refers to our Company. \"Party\", \"Parties\", or \"Us\", refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client\'s needs in respect of provision of the Company\'s stated services, in accordance with and subject to, prevailing law of us. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p>\r\n\r\n<h3><strong>Cookies</strong></h3>\r\n\r\n<p>We employ the use of cookies. By accessing cardvcc.com, you agreed to use cookies in agreement with the CardVcc\'s Privacy Policy. </p>\r\n\r\n<p>Most interactive websites use cookies to let us retrieve the user\'s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.</p>\r\n\r\n<h3><strong>License</strong></h3>\r\n\r\n<p>Unless otherwise stated, CardVcc and/or its licensors own the intellectual property rights for all material on cardvcc.com. All intellectual property rights are reserved. You may access this from cardvcc.com for your own personal use subjected to restrictions set in these terms and conditions.</p>\r\n\r\n<p>You must not:</p>\r\n<ul>\r\n    <li>Republish material from cardvcc.com</li>\r\n    <li>Sell, rent or sub-license material from cardvcc.com</li>\r\n    <li>Reproduce, duplicate or copy material from cardvcc.com</li>\r\n    <li>Redistribute content from cardvcc.com</li>\r\n</ul>\r\n\r\n\r\n<p>Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website. CardVcc does not filter, edit, publish or review Comments prior to their presence on the website. Comments do not reflect the views and opinions of CardVcc,its agents and/or affiliates. Comments reflect the views and opinions of the person who post their views and opinions. To the extent permitted by applicable laws, CardVcc shall not be liable for the Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.</p>\r\n\r\n<p>CardVcc reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions.</p>\r\n\r\n<p>You warrant and represent that:</p>\r\n\r\n<ul>\r\n    <li>You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;</li>\r\n    <li>The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party;</li>\r\n    <li>The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy</li>\r\n    <li>The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity.</li>\r\n</ul>\r\n\r\n<p>You hereby grant CardVcc a non-exclusive license to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats or media.</p>\r\n\r\n<h3><strong>Hyperlinking to our Content</strong></h3>\r\n\r\n<p>The following organizations may link to our Website without prior written approval:</p>\r\n\r\n<ul>\r\n    <li>Government agencies;</li>\r\n    <li>Search engines;</li>\r\n    <li>News organizations;</li>\r\n    <li>Online directory distributors may link to our Website in the same manner as they hyperlink to the Websites of other listed businesses; and</li>\r\n    <li>System wide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Web site.</li>\r\n</ul>\r\n\r\n<p>These organizations may link to our home page, to publications or to other Website information so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products and/or services; and (c) fits within the context of the linking party\'s site.</p>\r\n\r\n<p>We may consider and approve other link requests from the following types of organizations:</p>\r\n\r\n<ul>\r\n    <li>commonly-known consumer and/or business information sources;</li>\r\n    <li>dot.com community sites;</li>\r\n    <li>associations or other groups representing charities;</li>\r\n    <li>online directory distributors;</li>\r\n    <li>internet portals;</li>\r\n    <li>accounting, law and consulting firms; and</li>\r\n    <li>educational institutions and trade associations.</li>\r\n</ul>\r\n\r\n<p>We will approve link requests from these organizations if we decide that: (a) the link would not make us look unfavorably to ourselves or to our accredited businesses; (b) the organization does not have any negative records with us; (c) the benefit to us from the visibility of the hyperlink compensates the absence of CardVcc; and (d) the link is in the context of general resource information.</p>\r\n\r\n<p>These organizations may link to our home page so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services; and (c) fits within the context of the linking party\'s site.</p>\r\n\r\n<p>If you are one of the organizations listed in paragraph 2 above and are interested in linking to our website, you must inform us by sending an e-mail to CardVcc. Please include your name, your organization name, contact information as well as the URL of your site, a list of any URLs from which you intend to link to our Website, and a list of the URLs on our site to which you would like to link. Wait 2-3 weeks for a response.</p>\r\n\r\n<p>Approved organizations may hyperlink to our Website as follows:</p>\r\n\r\n<ul>\r\n    <li>By use of our corporate name; or</li>\r\n    <li>By use of the uniform resource locator being linked to; or</li>\r\n    <li>By use of any other description of our Website being linked to that makes sense within the context and format of content on the linking party\'s site.</li>\r\n</ul>\r\n\r\n<p>No use of CardVcc\'s logo or other artwork will be allowed for linking absent a trademark license agreement.</p>\r\n\r\n<h3><strong>iFrames</strong></h3>\r\n\r\n<p>Without prior approval and written permission, you may not create frames around our Webpages that alter in any way the visual presentation or appearance of our Website.</p>\r\n\r\n<h3><strong>Content Liability</strong></h3>\r\n\r\n<p>We shall not be hold responsible for any content that appears on your Website. You agree to protect and defend us against all claims that is rising on your Website. No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights.</p>\r\n\r\n<h3><strong>Reservation of Rights</strong></h3>\r\n\r\n<p>We reserve the right to request that you remove all links or any particular link to our Website. You approve to immediately remove all links to our Website upon request. We also reserve the right to amen these terms and conditions and it\'s linking policy at any time. By continuously linking to our Website, you agree to be bound to and follow these linking terms and conditions.</p>\r\n\r\n<h3><strong>Removal of links from our website</strong></h3>\r\n\r\n<p>If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment. We will consider requests to remove links but we are not obligated to or so or to respond to you directly.</p>\r\n\r\n<p>We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.</p>\r\n\r\n<h3><strong>Disclaimer</strong></h3>\r\n\r\n<p>To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will:</p>\r\n\r\n<ul>\r\n    <li>limit or exclude our or your liability for death or personal injury;</li>\r\n    <li>limit or exclude our or your liability for fraud or fraudulent misrepresentation;</li>\r\n    <li>limit any of our or your liabilities in any way that is not permitted under applicable law; or</li>\r\n    <li>exclude any of our or your liabilities that may not be excluded under applicable law.</li>\r\n</ul>\r\n\r\n<p>The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer: (a) are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty.</p>\r\n\r\n<p>As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.</p>', NULL, NULL, '2024-02-10 07:00:45');

-- --------------------------------------------------------

--
-- Table structure for table `practisedetails`
--

CREATE TABLE `practisedetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `des` text NOT NULL,
  `icon` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `practisedetails`
--

INSERT INTO `practisedetails` (`id`, `title`, `des`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Master Card', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'credit-card', NULL, '2018-10-07 04:26:48'),
(2, 'Visa Card', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit beatae eos commodi ipsa eum unde similique facilis, totam maiores nisi.', 'credit-card', NULL, '2018-10-04 19:28:07'),
(3, 'Mobile Recharge Card', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit beatae eos commodi ipsa eum unde similique facilis, totam maiores nisi.', 'credit-card', NULL, '2018-10-04 19:28:12'),
(4, 'Play Store Card', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit beatae eos commodi ipsa eum unde similique facilis,', 'credit-card', NULL, '2018-10-07 04:26:33');

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE `seo` (
  `id` int(11) NOT NULL,
  `home` text DEFAULT NULL,
  `cards` text DEFAULT NULL,
  `addcard` text DEFAULT NULL,
  `trans` text DEFAULT NULL,
  `profile` text DEFAULT NULL,
  `refer` text DEFAULT NULL,
  `withdraw` text DEFAULT NULL,
  `metalogin` longtext DEFAULT NULL,
  `metasignup` longtext DEFAULT NULL,
  `metaforgetpass` longtext DEFAULT NULL,
  `metaprivacy` longtext DEFAULT NULL,
  `metarrp` longtext DEFAULT NULL,
  `metacontact` longtext DEFAULT NULL,
  `metaterms` longtext DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seo`
--

INSERT INTO `seo` (`id`, `home`, `cards`, `addcard`, `trans`, `profile`, `refer`, `withdraw`, `metalogin`, `metasignup`, `metaforgetpass`, `metaprivacy`, `metarrp`, `metacontact`, `metaterms`, `updated_at`, `created_at`) VALUES
(1, 'Dashboard', 'My Cards', 'Add Card', 'Transactions', 'My Profile', 'Referral', 'Withdraw', '<meta name=\"description\" content=\"Login securely at cardvcc.com for hassle-free account access. Manage your virtual credit card transactions with ease and enjoy peace of mind.\" />\r\n	<meta name=\"keywords\" content=\"card, vcc, cardvcc\"/>\r\n	<meta property=\"og:locale\" content=\"en_US\" />\r\n	<meta property=\"og:type\" content=\"article\" />\r\n	<meta property=\"og:title\" content=\"CardVCC Sign In\" />\r\n	<meta property=\"og:url\" content=\"\" />\r\n	<meta property=\"og:site_name\" content=\"\" />\r\n	<link rel=\"canonical\" href=\"\" />', '<meta name=\"description\" content=\"Sign up at cardvcc.com for secure virtual credit card solutions. Get started now for convenient account management and peace of mind.\" />\r\n	<meta name=\"keywords\" content=\"card, vcc, cardvcc\"/>\r\n	<meta property=\"og:locale\" content=\"en_US\" />\r\n	<meta property=\"og:type\" content=\"article\" />\r\n	<meta property=\"og:title\" content=\"CardVCC Sign up\" />\r\n	<meta property=\"og:url\" content=\"\" />\r\n	<meta property=\"og:site_name\" content=\"\" />\r\n	<link rel=\"canonical\" href=\"\" />', '<meta name=\"description\" content=\"Forgot your password? Recover access to your account at cardvcc.com with ease. Follow simple steps to reset your password and regain control of your virtual credit card account.\" />\r\n	<meta name=\"keywords\" content=\"card, vcc, cardvcc\"/>\r\n	<meta property=\"og:locale\" content=\"en_US\" />\r\n	<meta property=\"og:type\" content=\"article\" />\r\n	<meta property=\"og:title\" content=\"CardVCC Signup\" />\r\n	<meta property=\"og:url\" content=\"\" />\r\n	<meta property=\"og:site_name\" content=\"\" />\r\n	<link rel=\"canonical\" href=\"\" />', '<meta name=\"description\" content=\"CardVCC Signup\" />\r\n	<meta name=\"keywords\" content=\"card, vcc, cardvcc\"/>\r\n	<meta property=\"og:locale\" content=\"en_US\" />\r\n	<meta property=\"og:type\" content=\"article\" />\r\n	<meta property=\"og:title\" content=\"CardVCC Signup\" />\r\n	<meta property=\"og:url\" content=\"\" />\r\n	<meta property=\"og:site_name\" content=\"\" />\r\n	<link rel=\"canonical\" href=\"\" />', '<meta name=\"description\" content=\"CardVCC Signup\" />\r\n	<meta name=\"keywords\" content=\"card, vcc, cardvcc\"/>\r\n	<meta property=\"og:locale\" content=\"en_US\" />\r\n	<meta property=\"og:type\" content=\"article\" />\r\n	<meta property=\"og:title\" content=\"CardVCC Signup\" />\r\n	<meta property=\"og:url\" content=\"\" />\r\n	<meta property=\"og:site_name\" content=\"\" />\r\n	<link rel=\"canonical\" href=\"\" />', NULL, NULL, '2024-02-12 13:15:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(10) UNSIGNED NOT NULL,
  `icon` varchar(191) NOT NULL,
  `link` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `icon`, `link`, `created_at`, `updated_at`) VALUES
(2, 'facebook', 'https://www.facebook.com/pgu', '2018-05-27 05:41:27', '2018-05-27 05:45:35'),
(3, 'twitter', 'https://www.facebook.com/pguk', '2018-05-27 05:41:57', '2018-05-27 05:41:57'),
(7, 'instagram', 'https://www.facebook.com/pgu', '2018-06-20 01:41:23', '2018-06-20 01:41:23'),
(8, 'linkedin', '#', '2018-10-07 05:26:06', '2018-10-07 05:26:26');

-- --------------------------------------------------------

--
-- Table structure for table `staticcontents`
--

CREATE TABLE `staticcontents` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `icon` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staticcontents`
--

INSERT INTO `staticcontents` (`id`, `title`, `amount`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Card Categories', 6, NULL, NULL, '2018-10-09 12:26:48'),
(2, 'Ariations of passages', 25443, NULL, NULL, '2018-10-03 03:28:28'),
(3, 'Card Sold', 3590, NULL, NULL, '2018-10-09 12:27:05');

-- --------------------------------------------------------

--
-- Table structure for table `sucscribes`
--

CREATE TABLE `sucscribes` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` varchar(191) DEFAULT NULL,
  `balance` varchar(191) DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL,
  `g_id` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `success` text DEFAULT NULL,
  `details` varchar(191) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `trx` varchar(191) DEFAULT NULL,
  `category` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `amount`, `balance`, `type`, `g_id`, `address`, `success`, `details`, `message`, `trx`, `category`, `created_at`, `updated_at`) VALUES
(1, 27, '100', '100', '+', '1', NULL, '1', 'Manual Deposit', NULL, 'BDQU6H7qxq', 'deposit', '2024-02-10 15:45:07', '2024-02-10 15:45:07'),
(2, 27, '100', '200', '+', '2', NULL, '1', 'Manual Deposit', NULL, '4a1vjURrZc', 'deposit', '2024-02-10 15:59:00', '2024-02-10 15:59:00'),
(3, 31, '500', '500', '+', NULL, NULL, '1', 'Balance added by Admin', 'Bonus', 'Sco3qkD5DV', NULL, '2024-02-18 19:04:13', '2024-02-18 19:04:13'),
(4, 31, '220', '280', '-', NULL, NULL, '1', 'Buy Card', NULL, '0zWmIGhd2O', 'cardp', '2024-02-18 19:05:32', '2024-02-18 19:05:32'),
(5, 39, '5', '5', '+', NULL, NULL, '1', 'Balance added by Admin', 'Sign up bonus', 'OnHUQU5fLJ', NULL, '2024-02-20 13:24:59', '2024-02-20 13:24:59'),
(6, 40, '5', '5', '+', NULL, NULL, '1', 'Balance added by Admin', 'Signup Bonus', '88eIug2buS', NULL, '2024-02-22 13:58:28', '2024-02-22 13:58:28'),
(7, 31, '55', '225', '-', NULL, NULL, '1', 'Buy Card', NULL, '2LJ0NkqXeL', 'cardp', '2024-02-25 20:05:01', '2024-02-25 20:05:01'),
(8, 31, '55', '280', '+', NULL, NULL, '1', 'Card Charge Return', NULL, 'YFgYrjcVh2', 'cardreturn', '2024-02-25 20:09:05', '2024-02-25 20:09:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `referby` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `refercode` text DEFAULT NULL,
  `refstat` text DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `country` varchar(191) DEFAULT NULL,
  `city` varchar(191) DEFAULT NULL,
  `mobile` varchar(191) DEFAULT NULL,
  `emailv` int(11) NOT NULL,
  `smsv` int(11) NOT NULL,
  `balance` varchar(191) DEFAULT '0',
  `totaldeposit` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `vsent` varchar(191) DEFAULT NULL,
  `vercode` varchar(191) DEFAULT NULL,
  `vertime` timestamp NULL DEFAULT current_timestamp(),
  `remember_token` varchar(100) DEFAULT NULL,
  `logintype` text DEFAULT NULL,
  `passset` text DEFAULT NULL,
  `tcard` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `referby`, `image`, `refercode`, `refstat`, `email`, `username`, `password`, `country`, `city`, `mobile`, `emailv`, `smsv`, `balance`, `totaldeposit`, `status`, `vsent`, `vercode`, `vertime`, `remember_token`, `logintype`, `passset`, `tcard`, `created_at`, `updated_at`) VALUES
(27, 'Shoaib Bin Habib (Rashad)', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocIEsAoI2SG-1D9CshqKtj9Me1IRgqqKRDNArndYwUAXRWw=s96-c', NULL, NULL, 'sbhshoaib@gmail.com', '147887906', '$2y$10$4g/RpkqcInfsgc6uzmzx0ukqeVNqcUUfhCfCcNfu8.xg9XNJ5GRdC', '', '', '', 1, 1, '200', '200', 1, NULL, NULL, '2024-02-09 05:42:37', 'AqSc2ZoFWTI3QuO9yjHqHoNhQxOXSvENoRKpcqNAKspOm7nPnUkHCJJzINBX', '2', '0', '1', '2024-02-09 05:42:37', '2024-02-10 15:59:00'),
(28, 'Abdullah abd', NULL, NULL, NULL, NULL, 'abdullahsad2024@gmail.com', 'Abudy33', '$2y$10$uDpZV8qVz.JqKxm8nwT8M.ekFH6vQGbAZp1Im9a9dg5jfBAPlRPmC', '', '', '', 1, 1, '0', NULL, 1, NULL, NULL, '2024-02-09 20:29:09', 'dVsoNK0bTDPCOjj1kNe6Pz92jXUjCqOttxQhQZmOZvgPDxgAsrveucJxIaM6', NULL, NULL, NULL, '2024-02-09 20:29:09', '2024-02-09 20:29:09'),
(29, 'nickfergusson99', NULL, NULL, NULL, NULL, 'hp_judith_murray@hardseo.store', 'nickfergusson99', '$2y$10$Vq9/nwwvfRtaNeYcVzk8PeRhjLUh8BywLGUgn04dpms7QBCZBcZaq', '', '', '', 1, 1, '0', NULL, 1, NULL, NULL, '2024-02-12 11:12:12', NULL, NULL, NULL, NULL, '2024-02-12 11:12:12', '2024-02-12 11:12:12'),
(30, 'Muhammad Hasib Al Hasan (purno)', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocJ_eJKshUP1Vb6fR6c_D6M15MgH8oJJbzsNkVI-P1cwbjs=s96-c', NULL, NULL, 'hasib.purno@gmail.com', '228298413', '$2y$10$JTh/3ay6v6RXca00wIun2e0Z8DHgIxqslgAvJr0Zh9d2Rbq0Y6KKq', '', '', '', 1, 1, '0', NULL, 1, NULL, NULL, '2024-02-12 19:43:31', 'JZwE5R1R3ryFSSFE1V47wvfjs6pnLXhBShp9HtLuOWKsGjM7T5uLv8LSdk5r', '2', '0', NULL, '2024-02-12 19:43:31', '2024-02-12 19:43:31'),
(31, 'WebRanky', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocKhtSFvP3EjP96d1SFoklLXmHtV1gaxufm3KFpCIgjT=s96-c', NULL, NULL, 'webranky.com@gmail.com', '783148165', '$2y$10$IhEtWKHE/CnKd0i9DzEz9uYHrjLHwHBZFSx/c5WnmY1o2Gk2Ix4Tq', 'BD', NULL, NULL, 1, 1, '280', NULL, 1, NULL, NULL, '2024-02-12 19:47:38', 'px3hPI2Eb4HM8mDLXyZhtH14FQjTpO21EhyfTO1AExTggZgUgHkjlojsFv6J', '2', '0', '1', '2024-02-12 19:47:38', '2024-03-04 07:29:47'),
(32, 'tammiwolken47', NULL, NULL, NULL, NULL, 'ip_sam_thompson@horizvision.store', 'tammiwolken47', '$2y$10$EI62fK/wKhrWSBntZI63QOrw/bHSNkjiBYPQIlvaoSBinHQb801zW', '', '', '', 1, 1, '0', NULL, 1, NULL, NULL, '2024-02-15 15:07:59', NULL, NULL, NULL, NULL, '2024-02-15 15:07:59', '2024-02-15 15:07:59'),
(33, 'zoltojasto', NULL, NULL, NULL, NULL, 'zoltojasto@gufum.com', 'zoltojasto', '$2y$10$0hhYlhe/LnmwrIewPfV7UuGENGIt0.sgnoEPKT.LGOmUb.8eRxQea', '', '', '', 1, 1, '0', NULL, 1, NULL, NULL, '2024-02-15 21:15:27', NULL, NULL, NULL, NULL, '2024-02-15 21:15:27', '2024-02-15 21:15:27'),
(34, 'viral Pro', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocJFCAhUi6-Xh9qskn-qH3TlwCB1ydYE8rswZqzUqh9nY_M=s96-c', NULL, NULL, 'sumitchaurasiya36@gmail.com', '523373689', '$2y$10$hpmdWVpWzW1EnAzKhprS/eSr1O9xr.0A9lzvH2TL5VBHjwEEsc2.2', '', '', '', 1, 1, '0', NULL, 1, NULL, NULL, '2024-02-16 07:40:08', 'raNx52VxhmD81thsEzPDeqAA1olYHDtxYd22wX9BHbCGx8NMHAQrRSA1e2ZQ', '2', '0', NULL, '2024-02-16 07:40:08', '2024-02-16 07:40:08'),
(35, 'ib swadhin', NULL, NULL, NULL, NULL, 'ib.swadhin.official@gmail.com', 'ibswadhin', '$2y$10$EZJlOcg8gEMJ5ZXaxy1seeMl5Au5AGlRBrspgv33QCk/O9o.BivIO', '', '', '', 1, 1, '0', NULL, 1, NULL, NULL, '2024-02-16 07:40:58', NULL, NULL, NULL, NULL, '2024-02-16 07:40:58', '2024-02-16 07:40:58'),
(36, 'Card Vcc', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocLzXICyHPahV7UyhvggYkiA9X_84gfw-n__yTiA0jJgyg=s96-c', NULL, NULL, 'cardvcc6@gmail.com', '143787666', '$2y$10$9VkJArcGzC/nR3BfvmLdZefQnmtwuiWqjRZguRI2vNfv9hh.em4vO', '', '', '', 1, 1, '0', NULL, 1, NULL, NULL, '2024-02-17 07:49:38', 'K6obtua58EXXQLayxKevnQSmGuwjypx6jzjqcCph8VgrPDXcTn7rcpX3fp03', '2', '0', NULL, '2024-02-17 07:49:38', '2024-02-17 07:49:38'),
(37, 'Francis Newman', NULL, 'https://lh3.googleusercontent.com/a-/ALV-UjXDa__vPiuzA8sslEOEkPORSkwJrgmfeCs34078xExrbNdF_adE_BdbWZnzMbRwvaO7ujcgwGrXjkW_BSIfMPHbWd9bQlv8QjPYw5Xta7J2i0RSekqHXytFJoW_V5uMKOeSvlWpybCiKrab20uB8_yO7osyJkVM7UpLB9PHZ4eNmeubOf2JG7T8n3fgAZlxyNHUzrWDHBDTBJ8NPSC3_rgekkbMnLYAvezBqZyJzojAjhxfPgIVQG6fGQF56q2dGf9LV311gykP6mVXY3AmmfHn1vuA7N9e8zbWJdaZLyFymg6mv_VbdyNlC9ERHgDixtsjs3gT1Nn_sPnRvBSsFs5m9NfVA6Pb5raLGaBg7T53xKeXvUEI2utDMCf2K1PTPhxlHQUtI4gKAVWF_e0ZELHp5_TQsscz31Itp8tGTFZsdlSX-0UOAssUghGYPQP_uer1tLtbYNYDp4MEyrCP0ttrf8miTjbcCeL020CYW0Ztgq4sQrr2y5sIZjTPgNMDtcRzzrb6rLkRK3maqF-spzaVnBleWkTzkIp8BRaWwGe6wgVo-zS6WKCcpowYfhxTprUJULVu8tnHXCJEiwocM4rlhH11KAnikewU1SigxpgUOFMnHJX0rvcxyJ3LIufzONBh_S9dH0pn1Kf-1L5poLZVqG9kC5TFXnwAPqzX_hYOSvqDIMh4vuY0FQYt9D5w_21pFvEo7j8_SAAU1vm00Q-aZy9CSAVty3RfLCXCrOeRkAHmXdOoRjl6RBIk6xqbY9EEy7T51uFkL1Pfo2yujqoMIRHBHko8lEyvCoJ-VhB9KZFu-h6mdbIL00caNNWBy6_98zIpgF2HLY2oCcbo0CtM1xCIzu8jmcfCCAGW7zgww_ufX8l7hxKC5fXr1Nx7WTOVCcNk03mP6SrC8t6zANWQszXFBjUCoFAn0U_3Q5VhAWJ-zP76pGYCjySREtO1mBHVwgVQrBv8IsdTV6uy1tg=s96-c', NULL, NULL, 'francis@francisnewman.com', '701112957', '$2y$10$F08q6FgNIiSzAg6kssoEz.hP5VeCqQaA3/1j4HLwnyl0cUwOy9IKS', 'GB', 'London', '07518784156', 1, 1, '0', NULL, 1, NULL, NULL, '2024-02-17 22:02:08', '17QqLntuLsN9FapEeF0pGfuMmrGuZrCigp9TXhtREgJ1UshM47bxWvudpOGp', '2', '0', NULL, '2024-02-17 22:02:08', '2024-02-17 22:03:59'),
(38, 'Sujan Chakraborty', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocLaCUgBc1F7TRMkoe9JJV-anPZIjP9duav5Kh7RPPCyDQ=s96-c', NULL, NULL, 'sujanc160@gmail.com', '724634290', '$2y$10$sZkQkmyIZDP4w8WdgjLWfOrmIubrb4ldgUo.RvjXF/mIFmpou0R0G', '', '', '', 1, 1, '0', NULL, 1, NULL, NULL, '2024-02-18 20:10:31', 'wrf6qvv3r1YWjw99wHUW1ZE7eOT9r5expLkJvmhKhEeUtVHwLUG6fhI6XxIN', '2', '0', NULL, '2024-02-18 20:10:31', '2024-02-18 20:10:31'),
(39, 'vdscas', NULL, NULL, NULL, NULL, 'loguco@closetab.email', 'malar12', '$2y$10$H4NacGGl/bmHqbaiPNg.DeWdSigfGzjNK1Bt/l53iMIy8oP3ttiPa', '', '', '', 1, 1, '5', NULL, 1, NULL, NULL, '2024-02-19 05:07:17', NULL, NULL, NULL, NULL, '2024-02-19 05:07:17', '2024-02-20 13:24:59'),
(40, 'IGNACIO AUGUSTO GUZMAN', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocKVC8mUtA_rrkgIYt6GE8fZukIalIQwDYdsaf4X-d5GGw=s96-c', NULL, NULL, 'ignacioguzman2020@fm.unt.edu.ar', '508381103', '$2y$10$mXQHuESZestaKR1gMLoytu5u7JDOcKhQVtXcIx3KUASyGgbT5JqJK', '', '', '', 1, 1, '5', NULL, 1, NULL, NULL, '2024-02-22 03:43:36', 'HbYZTLHbWso13x5I9W8CvSq8pPQSB06IFXJdsar39TaouOjDiKUFY4b9NLe8', '2', '0', NULL, '2024-02-22 03:43:36', '2024-02-22 13:58:28'),
(41, 'RYAN THOMAS (RyanStanley)', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocK_5iJbKSPUNSWMbj5kS6rywm6Gf3a17cxtVRkjINpT=s96-c', NULL, NULL, 'ryan.thomas8792@gmail.com', '624547045', '$2y$10$WHNCzY4iatfjLuM2qSGfR.X.r6gHwY3m.Dy02WLwGKD28jKyj4/3q', '', '', '', 1, 1, '0', NULL, 1, NULL, NULL, '2024-02-28 12:05:38', 'wSwDLl6QBrvpwbUCxe9ZllG6jn4B0BwTRzd02N0yVljKHq17Z5f8kGi7y4sL', '2', '0', NULL, '2024-02-28 12:05:38', '2024-02-28 12:05:38'),
(42, 'rakib hasan helal', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocLQUuAQZcYwswhr6u7Wa1muxTi3OFYrWyVl-Dn6gaiYNg=s96-c', NULL, NULL, 'rakibhasanhelal@gmail.com', '176932694', '$2y$10$PsbtkT3Cnw/f.OdCITxvp.GbTqq7i3H1HvcgY9m9O4qxoIZOcEJGW', '', '', '', 1, 1, '0', NULL, 1, NULL, NULL, '2024-02-28 17:28:22', 't4BuFJuYK7WHXiwV0N5RMtQNkVYq0LdRf11i2NPGh5L3a4ZhEuLG9eygWeGb', '2', '0', NULL, '2024-02-28 17:28:22', '2024-02-28 17:28:22'),
(43, 'Solzanuvam', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocKcRn3YZEMhSfJWgyZPxAWXR8F1kdDKYsokzzEmdH-5=s96-c', NULL, NULL, 'solzanuvam@gmail.com', '651602524', '$2y$10$XByqcIamO4eD7.ftTbh2RexbUPe.tVfCuv5aLdR3px2pF1K4jCqeS', '', '', '', 1, 1, '0', NULL, 1, NULL, NULL, '2024-02-29 19:31:02', 'jYPv8Qvw1L29U1ei5NS4kqi8uTXrQpSsUFf4fmTM6mamegVhMS07letQAoEN', '2', '0', NULL, '2024-02-29 19:31:02', '2024-02-29 19:31:02'),
(44, 'HUANG XIAXIA', NULL, NULL, NULL, NULL, 'hhaven565@gmail.com', 'Haven', '$2y$10$qDCvPdmpeqDu6.xSKPXrMOzgp1XxzQU9/dNvTQKS101YdQCrp.znO', '', '', '', 1, 1, '0', NULL, 1, NULL, NULL, '2024-03-02 04:59:40', NULL, NULL, NULL, NULL, '2024-03-02 04:59:40', '2024-03-02 04:59:40'),
(45, 'ddgdgf', NULL, NULL, NULL, NULL, 'abcd@abc.mm', 'abcd', '$2y$10$xp/BwAPd.eGmfrjgwYl/q.BJEh5.8BQ.H.YuHfBDqu0OWBXexzoVW', '', '', '', 1, 1, '0', NULL, 1, NULL, NULL, '2024-03-02 18:35:34', NULL, NULL, NULL, NULL, '2024-03-02 18:35:34', '2024-03-02 18:35:34'),
(46, 'vanpoter', NULL, NULL, NULL, NULL, 'vanpoter1210@gmail.com', 'vanpoter', '$2y$10$98vXQvEcuhgFUVA7si/DSOXO520h8IWgxm7mxUO9/A1RI/Kei49MC', NULL, NULL, NULL, 1, 1, '0', NULL, 1, NULL, NULL, '2024-03-03 11:23:27', NULL, NULL, NULL, NULL, '2024-03-03 11:23:27', '2024-03-03 11:24:31'),
(47, 'altagent', NULL, NULL, NULL, NULL, 'altybox@outlook.com', 'altagent', '$2y$10$o1O/qaz0SYG6u1ZrW6jmDOFP.OwLM8NPsXv4f53dxazUuW4Gbe6Mm', '', '', '', 1, 1, '0', NULL, 1, NULL, NULL, '2024-03-05 08:10:20', NULL, NULL, NULL, NULL, '2024-03-05 08:10:20', '2024-03-05 08:10:20'),
(48, 'MF B', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocKZSTfr-fF7XUQRc4oJj7waEQGSMpoQdj7q946L5GdS=s96-c', NULL, NULL, 'mfb25853@gmail.com', '187286990', '$2y$10$F2BxzcGyL5elYSFWVrQipOCUeGKrWjajVQ7hlIssXuRFZS.V/paEy', '', '', '', 1, 1, '0', NULL, 1, NULL, NULL, '2024-03-05 14:03:53', 'ihw4RsgkQgWjDIm787PJkL40B9kACaf1rRg30ZJr7uHYhmUS5RnkjPHWccYV', '2', '0', NULL, '2024-03-05 14:03:53', '2024-03-05 14:03:53'),
(49, 'Seal Baggeto', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocJSbCvzZHjbmZ5ynKsFVPuTWYmOwY0eMaPw2vt-OTLD=s96-c', NULL, NULL, 'sealbaggeto@gmail.com', '172810980', '$2y$10$q0iiAPbhIWC63EVIyeUFUOcR58ANfn473MPA3HUXc8YWreuGTYtIq', '', '', '', 1, 1, '0', NULL, 1, NULL, NULL, '2024-03-06 02:14:16', 'qt0m0SrVEE54XiRnOSBozmQs8hne209wDVhnhSW5nfhiQH96Gz8VOybbrmXD', '2', '0', NULL, '2024-03-06 02:14:16', '2024-03-06 02:14:16'),
(50, 'BaL Motovlog', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocJwY2BZUmDnpH0IihzyoC3Y67p99cOMnhDynL4gWtV7rX0=s96-c', NULL, NULL, 'iqbalmaulana072004@gmail.com', '627020805', '$2y$10$ZW7ns3q8nhL0F/kKrRH2hunSk2XmFa4agdYMZkYv67fLD60hfWRZS', '', '', '', 1, 1, '0', NULL, 1, NULL, NULL, '2024-03-07 04:33:46', 'yC2z3trRcwRh2rAdnh1CPfQqRswDsOuzgwwS7SbNfoLdo8tfRmLq3uOfcZ7r', '2', '0', NULL, '2024-03-07 04:33:46', '2024-03-07 04:33:46');

-- --------------------------------------------------------

--
-- Table structure for table `wgateway`
--

CREATE TABLE `wgateway` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `api` text DEFAULT NULL,
  `secret` text DEFAULT NULL,
  `hash` text DEFAULT NULL,
  `version` text DEFAULT NULL,
  `currency` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `callback_url` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wgateway`
--

INSERT INTO `wgateway` (`id`, `name`, `image`, `api`, `secret`, `hash`, `version`, `currency`, `status`, `callback_url`, `created_at`, `updated_at`) VALUES
(1, 'BTC', NULL, '', NULL, NULL, NULL, 'USD', '1', NULL, NULL, NULL),
(2, 'USDT(TRC 20)', NULL, NULL, NULL, NULL, NULL, 'USD', '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `id` int(11) NOT NULL,
  `u_id` text DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `g_id` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_data`
--

CREATE TABLE `withdraw_data` (
  `id` int(11) NOT NULL,
  `user_id` text DEFAULT NULL,
  `trx` text DEFAULT NULL,
  `details` text DEFAULT NULL,
  `gateway` text DEFAULT NULL,
  `currency` text DEFAULT NULL,
  `fee` text DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `proof` text DEFAULT NULL,
  `trnsid` text DEFAULT NULL,
  `pstat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminnotif`
--
ALTER TABLE `adminnotif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cardcategories`
--
ALTER TABLE `cardcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cardsubcategories`
--
ALTER TABLE `cardsubcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cardtrans`
--
ALTER TABLE `cardtrans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card_bin_numbers`
--
ALTER TABLE `card_bin_numbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card_request`
--
ALTER TABLE `card_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposit_data`
--
ALTER TABLE `deposit_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqdetails`
--
ALTER TABLE `faqdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateway`
--
ALTER TABLE `gateway`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generals`
--
ALTER TABLE `generals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loginpage`
--
ALTER TABLE `loginpage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `practisedetails`
--
ALTER TABLE `practisedetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staticcontents`
--
ALTER TABLE `staticcontents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sucscribes`
--
ALTER TABLE `sucscribes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `wgateway`
--
ALTER TABLE `wgateway`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_data`
--
ALTER TABLE `withdraw_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminnotif`
--
ALTER TABLE `adminnotif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cardcategories`
--
ALTER TABLE `cardcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `cardsubcategories`
--
ALTER TABLE `cardsubcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `cardtrans`
--
ALTER TABLE `cardtrans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `card_bin_numbers`
--
ALTER TABLE `card_bin_numbers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `card_request`
--
ALTER TABLE `card_request`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deposit_data`
--
ALTER TABLE `deposit_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `faqdetails`
--
ALTER TABLE `faqdetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gateway`
--
ALTER TABLE `gateway`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=514;

--
-- AUTO_INCREMENT for table `generals`
--
ALTER TABLE `generals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loginpage`
--
ALTER TABLE `loginpage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `practisedetails`
--
ALTER TABLE `practisedetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seo`
--
ALTER TABLE `seo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `staticcontents`
--
ALTER TABLE `staticcontents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sucscribes`
--
ALTER TABLE `sucscribes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `wgateway`
--
ALTER TABLE `wgateway`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdraw_data`
--
ALTER TABLE `withdraw_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

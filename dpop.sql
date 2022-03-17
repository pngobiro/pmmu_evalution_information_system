-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 16, 2022 at 02:38 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dpop`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `financial_years`
--

CREATE TABLE `financial_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `financial_years`
--

INSERT INTO `financial_years` (`id`, `name`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, '2018/2019', '2018-07-01', '2019-06-30', NULL, NULL),
(2, '2019/2020', '2019-07-01', '2020-06-30', NULL, NULL),
(3, '2020/2021', '2020-07-01', '2021-06-30', NULL, NULL),
(4, '2021/2022', '2021-07-01', '2022-06-30', NULL, NULL),
(5, '2022/2023', '2022-07-01', '2023-06-30', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `indicators`
--

CREATE TABLE `indicators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `master_indicator_id` bigint(20) UNSIGNED NOT NULL,
  `name` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `indicator_group_id` bigint(20) UNSIGNED NOT NULL,
  `indicator_type_id` bigint(20) UNSIGNED NOT NULL,
  `indicator_unit_of_measure_id` bigint(20) UNSIGNED NOT NULL,
  `indicator_weight` int(11) DEFAULT NULL,
  `indicator_target` int(11) DEFAULT NULL,
  `indicator_achivement` int(11) DEFAULT NULL,
  `remarks` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `indicators`
--

INSERT INTO `indicators` (`id`, `master_indicator_id`, `name`, `indicator_group_id`, `indicator_type_id`, `indicator_unit_of_measure_id`, `indicator_weight`, `indicator_target`, `indicator_achivement`, `remarks`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, 'Certified Urgent Applications - % of certified urgent applications concluded within 30 days from the date of certification', 8, 1, 1, 3, 100, 100, NULL, 1, '2022-02-28 11:59:41', '2022-02-28 12:03:29'),
(2, 2, 'Injunction applications -% of injunction applications heard and determined within 90 days of filing', 8, 1, 1, 3, 100, 100, NULL, 2, '2022-02-28 11:59:41', '2022-02-28 12:03:32'),
(3, 3, 'All Other Applications -% of other applications heard and determined within 180 days of filing', 8, 1, 1, 3, 80, 95, NULL, 3, '2022-02-28 11:59:41', '2022-02-28 12:03:35'),
(4, 4, 'Hearing and determination of Criminal cases -% of cases concluded within 360 days of filing', 8, 1, 1, 7, 90, 80, NULL, 4, '2022-02-28 11:59:41', '2022-02-28 12:03:44'),
(5, 5, 'Hearing and determination of Civil cases -% of cases concluded within 360 days of filing', 8, 1, 1, 8, 50, 50, NULL, 5, '2022-02-28 11:59:41', '2022-02-28 12:04:04'),
(6, 6, 'Percentage of judgments/rulings delivered on the date first scheduled for delivery', 8, 1, 1, 3, 50, 100, NULL, 6, '2022-02-28 11:59:41', '2022-02-28 12:04:22'),
(7, 7, 'Delivery of Judgments & Rulings -% of judgments & rulings delivered within 60 days of conclusion of the hearing', 8, 1, 1, 3, 100, 100, NULL, 7, '2022-02-28 11:59:41', '2022-02-28 12:04:29'),
(8, 8, 'Applications in criminal matters -% of applications concluded within 90 days of filing', 8, 1, 1, 3, 100, 50, NULL, 8, '2022-02-28 11:59:41', '2022-02-28 12:04:32'),
(9, 9, 'Reduced no. of days spent in remand custody from the “Date of plea” to the “Date of first hearing” (where bail has been denied or where the remandees are unable to meet the bail terms)', 8, 3, 2, 3, 50, 65, NULL, 9, '2022-02-28 11:59:41', '2022-02-28 12:04:34'),
(10, 10, 'Case clearance rate for Criminal Cases', 8, 1, 1, 4, 120, 89, NULL, 10, '2022-02-28 11:59:41', '2022-02-28 12:04:37'),
(11, 11, 'Case clearance rate for Civil Cases', 8, 1, 1, 4, 105, 78, NULL, 11, '2022-02-28 11:59:42', '2022-02-28 12:04:39'),
(12, 12, 'Case Clearance Rate for Traffic Cases', 8, 2, 1, 3, 100, 80, NULL, 11, '2022-02-28 11:59:42', '2022-02-28 12:04:44'),
(13, 13, 'Percentage reduction of backlog', 8, 1, 1, 4, 10, 6, NULL, 13, '2022-02-28 11:59:42', '2022-02-28 12:04:59'),
(14, 14, 'Merit Productivity', 8, 1, 4, 6, 1000, 985, NULL, 14, '2022-02-28 11:59:42', '2022-02-28 12:05:03'),
(15, 15, 'Other productivity', 8, 1, 4, 3, 2000, 1500, NULL, 15, '2022-02-28 11:59:42', '2022-02-28 12:05:08'),
(16, 16, 'Advance communication of adjournments of trials & hearings and date of judgment of delivery of judgments/rulings', 9, 1, 1, 2, 100, 45, NULL, 1, '2022-02-28 11:59:42', '2022-02-28 12:05:21'),
(17, 17, 'Percentage of trial/hearings held when first cause listed', 9, 1, 1, 2, 100, 54, NULL, 2, '2022-02-28 11:59:42', '2022-02-28 12:05:22'),
(18, 18, 'Percentage of pre-trial events held when first listed – mentions and supervision for compliance by parties in filing pleadings/exhibits', 9, 1, 1, 1, 90, 45, NULL, 3, '2022-02-28 11:59:42', '2022-02-28 12:05:24'),
(19, 19, 'Submission of Court proceedings for appealed Matters within 60 days from date of receipt of notice', 9, 1, 1, 2, 60, 89, NULL, 4, '2022-02-28 11:59:42', '2022-02-28 12:05:27'),
(20, 20, 'Adoption of Alternative Dispute Resolutions - % of Filed Cases referred for Alternative Dispute Resolution (ADR/CAM/AJS)', 9, 1, 1, 2, 20, 10, NULL, 5, '2022-02-28 11:59:42', '2022-02-28 12:05:31'),
(21, 21, 'Publish daily cause lists and posting on the notice board/online - seven days in advance', 9, 1, 1, 1, 100, 100, NULL, 6, '2022-02-28 11:59:42', '2022-02-28 12:05:32'),
(22, 22, 'Stakeholder Engagement', 9, 1, 1, 2, 100, 100, NULL, 7, '2022-02-28 11:59:42', '2022-02-28 12:05:33'),
(23, 23, 'Timely Submission of accurate monthly court returns', 9, 1, 1, 2, 100, 100, NULL, 8, '2022-02-28 11:59:42', '2022-02-28 12:05:35'),
(24, 24, 'Implement the Registry Manual procedures', 10, 1, 1, 3, 100, 100, NULL, 1, '2022-02-28 11:59:42', '2022-02-28 12:05:36'),
(25, 25, 'Maintain and update all registers', 10, 1, 1, 3, 100, 100, NULL, 2, '2022-02-28 11:59:42', '2022-02-28 12:05:39'),
(26, 26, 'Maintenance of asset and equipment register', 11, 1, 1, 1, 100, 100, NULL, 1, '2022-02-28 11:59:42', '2022-02-28 12:05:40'),
(27, 27, 'Supervision of construction (Where applicable)', 11, 1, 3, 1, 100, 100, NULL, 2, '2022-02-28 11:59:43', '2022-02-28 12:05:41'),
(28, 28, 'Disposal of idle assets (Where applicable)', 11, 1, 3, 1, 100, 100, NULL, 3, '2022-02-28 11:59:43', '2022-02-28 12:05:43'),
(29, 29, 'Compliance with the budget', 12, 1, 1, 1, 100, 100, NULL, 1, '2022-02-28 11:59:43', '2022-02-28 12:05:44'),
(30, 30, 'Revenue Management', 12, 1, 1, 2, 100, 100, NULL, 2, '2022-02-28 11:59:43', '2022-02-28 12:05:46'),
(31, 31, 'Implementation of Audit report recommendations.', 12, 1, 3, 2, 100, 100, NULL, 3, '2022-02-28 11:59:43', '2022-02-28 12:05:48'),
(32, 32, 'Compliance with Service Delivery Charter Standards', 13, 1, 1, 4, 100, 100, NULL, 1, '2022-02-28 11:59:43', '2022-02-28 12:05:50'),
(33, 33, 'Service improvement Innovations', 14, 1, 2, 2, 100, 100, NULL, 1, '2022-02-28 11:59:43', '2022-02-28 12:05:51'),
(34, 34, 'Competency development', 14, 1, 4, 2, 100, 100, NULL, 2, '2022-02-28 11:59:43', '2022-02-28 12:05:52'),
(35, 35, 'Corruption Prevention &Eradication', 15, 1, 1, 2, 100, 100, NULL, 1, '2022-02-28 11:59:43', '2022-02-28 12:05:54'),
(36, 36, 'Improve Employee wellness and work environment', 15, 1, 1, 1, 100, 100, NULL, 2, '2022-02-28 11:59:43', '2022-02-28 12:05:55'),
(37, 37, 'Implement court user survey recommendations', 15, 1, 1, 1, 100, 100, NULL, 3, '2022-02-28 11:59:43', '2022-02-28 12:05:57'),
(38, 1, 'Certified Urgent Applications - % of certified urgent applications concluded within 30 days from the date of certification', 16, 1, 1, 3, 78, 98, NULL, 1, '2022-02-28 12:06:32', '2022-02-28 12:13:17'),
(39, 2, 'Injunction applications -% of injunction applications heard and determined within 90 days of filing', 16, 1, 1, 3, 50, 85, NULL, 2, '2022-02-28 12:06:32', '2022-03-01 05:55:38'),
(40, 3, 'All Other Applications -% of other applications heard and determined within 180 days of filing', 16, 1, 1, 3, 99, 99, NULL, 3, '2022-02-28 12:06:32', '2022-03-01 05:56:01'),
(41, 4, 'Hearing and determination of Criminal cases -% of cases concluded within 360 days of filing', 16, 1, 1, 7, 99, 100, NULL, 4, '2022-02-28 12:06:32', '2022-03-01 05:55:42'),
(42, 5, 'Hearing and determination of Civil cases -% of cases concluded within 360 days of filing', 16, 1, 1, 8, 90, 80, NULL, 5, '2022-02-28 12:06:32', '2022-03-01 05:55:45'),
(43, 6, 'Percentage of judgments/rulings delivered on the date first scheduled for delivery', 16, 1, 1, 3, 100, 56, NULL, 6, '2022-02-28 12:06:32', '2022-03-01 05:56:05'),
(44, 7, 'Delivery of Judgments & Rulings -% of judgments & rulings delivered within 60 days of conclusion of the hearing', 16, 1, 1, 3, 100, 89, NULL, 7, '2022-02-28 12:06:32', '2022-03-01 05:56:09'),
(45, 8, 'Applications in criminal matters -% of applications concluded within 90 days of filing', 16, 1, 1, 3, 100, 96, NULL, 8, '2022-02-28 12:06:32', '2022-03-01 05:56:14'),
(46, 9, 'Reduced no. of days spent in remand custody from the “Date of plea” to the “Date of first hearing” (where bail has been denied or where the remandees are unable to meet the bail terms)', 16, 3, 2, 3, 50, 88, NULL, 9, '2022-02-28 12:06:32', '2022-03-01 05:56:11'),
(47, 10, 'Case clearance rate for Criminal Cases', 16, 1, 1, 4, 120, 100, NULL, 10, '2022-02-28 12:06:32', '2022-03-01 05:56:18'),
(48, 11, 'Case clearance rate for Civil Cases', 16, 1, 1, 4, 105, 56, NULL, 11, '2022-02-28 12:06:32', '2022-03-01 05:56:23'),
(49, 12, 'Case Clearance Rate for Traffic Cases', 16, 2, 1, 3, 100, 99, NULL, 11, '2022-02-28 12:06:32', '2022-03-01 05:57:17'),
(50, 13, 'Percentage reduction of backlog', 16, 1, 1, 4, 20, 99, NULL, 13, '2022-02-28 12:06:32', '2022-03-01 05:57:16'),
(51, 14, 'Merit Productivity', 16, 1, 4, 6, 1500, 89, NULL, 14, '2022-02-28 12:06:32', '2022-03-01 05:57:15'),
(52, 15, 'Other productivity', 16, 1, 4, 3, 2000, 78, NULL, 15, '2022-02-28 12:06:32', '2022-03-01 05:57:14'),
(53, 16, 'Advance communication of adjournments of trials & hearings and date of judgment of delivery of judgments/rulings', 17, 1, 1, 2, 100, 56, NULL, 1, '2022-02-28 12:06:32', '2022-03-01 05:57:09'),
(54, 17, 'Percentage of trial/hearings held when first cause listed', 17, 1, 1, 2, 100, 63, NULL, 2, '2022-02-28 12:06:33', '2022-03-01 05:57:10'),
(55, 18, 'Percentage of pre-trial events held when first listed – mentions and supervision for compliance by parties in filing pleadings/exhibits', 17, 1, 1, 1, 100, 33, NULL, 3, '2022-02-28 12:06:33', '2022-03-01 05:57:12'),
(56, 19, 'Submission of Court proceedings for appealed Matters within 60 days from date of receipt of notice', 17, 1, 1, 2, 100, 56, NULL, 4, '2022-02-28 12:06:33', '2022-03-01 05:57:06'),
(57, 20, 'Adoption of Alternative Dispute Resolutions - % of Filed Cases referred for Alternative Dispute Resolution (ADR/CAM/AJS)', 17, 1, 1, 2, 100, 100, NULL, 5, '2022-02-28 12:06:33', '2022-03-01 05:57:03'),
(58, 21, 'Publish daily cause lists and posting on the notice board/online - seven days in advance', 17, 1, 1, 1, 100, 100, NULL, 6, '2022-02-28 12:06:33', '2022-03-01 05:56:59'),
(59, 22, 'Stakeholder Engagement', 17, 1, 1, 2, 100, 100, NULL, 7, '2022-02-28 12:06:33', '2022-03-01 05:57:00'),
(60, 23, 'Timely Submission of accurate monthly court returns', 17, 1, 1, 2, 0, 100, NULL, 8, '2022-02-28 12:06:33', '2022-03-01 05:57:02'),
(61, 24, 'Implement the Registry Manual procedures', 18, 1, 1, 3, 100, 100, NULL, 1, '2022-02-28 12:06:33', '2022-03-01 05:56:57'),
(62, 25, 'Maintain and update all registers', 18, 1, 1, 3, 100, 100, NULL, 2, '2022-02-28 12:06:33', '2022-03-01 05:56:58'),
(63, 26, 'Maintenance of asset and equipment register', 19, 1, 1, 1, 100, 100, NULL, 1, '2022-02-28 12:06:33', '2022-03-01 05:56:52'),
(64, 27, 'Supervision of construction (Where applicable)', 19, 1, 3, 1, 100, 100, NULL, 2, '2022-02-28 12:06:33', '2022-03-01 05:56:53'),
(65, 28, 'Disposal of idle assets (Where applicable)', 19, 1, 3, 1, 100, 100, NULL, 3, '2022-02-28 12:06:33', '2022-03-01 05:56:56'),
(66, 29, 'Compliance with the budget', 20, 1, 1, 1, 100, 100, NULL, 1, '2022-02-28 12:06:33', '2022-03-01 05:56:51'),
(67, 30, 'Revenue Management', 20, 1, 1, 2, 100, 100, NULL, 2, '2022-02-28 12:06:34', '2022-03-01 05:56:50'),
(68, 31, 'Implementation of Audit report recommendations.', 20, 1, 3, 2, 100, 100, NULL, 3, '2022-02-28 12:06:34', '2022-03-01 05:56:48'),
(69, 32, 'Compliance with Service Delivery Charter Standards', 21, 1, 1, 4, 100, 100, NULL, 1, '2022-02-28 12:06:34', '2022-03-01 05:56:47'),
(70, 33, 'Service improvement Innovations', 22, 1, 2, 2, 100, 100, NULL, 1, '2022-02-28 12:06:34', '2022-03-01 05:56:46'),
(71, 34, 'Competency development', 22, 1, 4, 2, 100, 100, NULL, 2, '2022-02-28 12:06:34', '2022-03-01 05:56:44'),
(72, 35, 'Corruption Prevention &Eradication', 23, 1, 1, 2, 100, 100, NULL, 1, '2022-02-28 12:06:34', '2022-03-01 05:56:43'),
(73, 36, 'Improve Employee wellness and work environment', 23, 1, 1, 1, 100, 100, NULL, 2, '2022-02-28 12:06:34', '2022-03-01 05:56:41'),
(74, 37, 'Implement court user survey recommendations', 23, 1, 1, 1, 100, 100, NULL, 3, '2022-02-28 12:06:34', '2022-03-01 05:56:40'),
(75, 1, 'Certified Urgent Applications - % of certified urgent applications concluded within 30 days from the date of certification', 24, 1, 1, 3, 90, 100, NULL, 1, '2022-03-01 05:19:14', '2022-03-04 07:20:28'),
(76, 2, 'Injunction applications -% of injunction applications heard and determined within 90 days of filing', 24, 1, 1, 3, 70, 80, NULL, 2, '2022-03-01 05:19:14', '2022-03-01 05:28:05'),
(77, 3, 'All Other Applications -% of other applications heard and determined within 180 days of filing', 24, 1, 1, 3, 95, 100, NULL, 3, '2022-03-01 05:19:14', '2022-03-01 05:28:14'),
(78, 4, 'Hearing and determination of Criminal cases -% of cases concluded within 360 days of filing', 24, 1, 1, 7, 100, 100, NULL, 4, '2022-03-01 05:19:14', '2022-03-02 08:09:29'),
(79, 5, 'Hearing and determination of Civil cases -% of cases concluded within 360 days of filing', 24, 1, 1, 8, 100, 100, NULL, 5, '2022-03-01 05:19:14', '2022-03-01 05:28:23'),
(80, 6, 'Percentage of judgments/rulings delivered on the date first scheduled for delivery', 24, 1, 1, 3, 100, 60, NULL, 6, '2022-03-01 05:19:14', '2022-03-01 05:28:27'),
(81, 7, 'Delivery of Judgments & Rulings -% of judgments & rulings delivered within 60 days of conclusion of the hearing', 24, 1, 1, 3, 100, 90, NULL, 7, '2022-03-01 05:19:14', '2022-03-01 05:28:37'),
(82, 8, 'Applications in criminal matters -% of applications concluded within 90 days of filing', 24, 1, 1, 3, 100, 70, NULL, 8, '2022-03-01 05:19:14', '2022-03-01 05:28:54'),
(83, 9, 'Reduced no. of days spent in remand custody from the “Date of plea” to the “Date of first hearing” (where bail has been denied or where the remandees are unable to meet the bail terms)', 24, 3, 2, 3, 50, 10, NULL, 9, '2022-03-01 05:19:15', '2022-03-04 07:25:44'),
(84, 10, 'Case clearance rate for Criminal Cases', 24, 1, 1, 4, 105, 95, NULL, 10, '2022-03-01 05:19:15', '2022-03-01 05:29:10'),
(85, 11, 'Case clearance rate for Civil Cases', 24, 1, 1, 4, 110, 80, NULL, 11, '2022-03-01 05:19:15', '2022-03-01 05:29:21'),
(86, 12, 'Case Clearance Rate for Traffic Cases', 24, 2, 1, 3, 101, 202, NULL, 11, '2022-03-01 05:19:15', '2022-03-04 07:06:03'),
(87, 13, 'Percentage reduction of backlog', 24, 1, 1, 4, 15, 16, NULL, 13, '2022-03-01 05:19:15', '2022-03-04 07:24:59'),
(88, 14, 'Merit Productivity', 24, 1, 4, 6, 1000, 900, NULL, 14, '2022-03-01 05:19:15', '2022-03-01 05:29:42'),
(89, 15, 'Other productivity', 24, 1, 4, 3, 2000, 1500, NULL, 15, '2022-03-01 05:19:15', '2022-03-01 05:29:45'),
(90, 16, 'Advance communication of adjournments of trials & hearings and date of judgment of delivery of judgments/rulings', 25, 1, 1, 2, 100, 80, NULL, 1, '2022-03-01 05:19:15', '2022-03-01 05:29:56'),
(91, 17, 'Percentage of trial/hearings held when first cause listed', 25, 1, 1, 2, 100, 100, NULL, 2, '2022-03-01 05:19:15', '2022-03-01 05:29:53'),
(92, 18, 'Percentage of pre-trial events held when first listed – mentions and supervision for compliance by parties in filing pleadings/exhibits', 25, 1, 1, 1, 100, 75, NULL, 3, '2022-03-01 05:19:15', '2022-03-01 05:30:02'),
(93, 19, 'Submission of Court proceedings for appealed Matters within 60 days from date of receipt of notice', 25, 1, 1, 2, 100, 85, NULL, 4, '2022-03-01 05:19:15', '2022-03-01 05:30:10'),
(94, 20, 'Adoption of Alternative Dispute Resolutions - % of Filed Cases referred for Alternative Dispute Resolution (ADR/CAM/AJS)', 25, 1, 1, 2, 100, 100, NULL, 5, '2022-03-01 05:19:15', '2022-03-01 05:30:12'),
(95, 21, 'Publish daily cause lists and posting on the notice board/online - seven days in advance', 25, 1, 1, 1, 100, 100, NULL, 6, '2022-03-01 05:19:15', '2022-03-01 05:30:13'),
(96, 22, 'Stakeholder Engagement', 25, 1, 1, 2, 100, 100, NULL, 7, '2022-03-01 05:19:15', '2022-03-01 05:30:14'),
(97, 23, 'Timely Submission of accurate monthly court returns', 25, 1, 1, 2, 100, 100, NULL, 8, '2022-03-01 05:19:15', '2022-03-01 05:30:16'),
(98, 24, 'Implement the Registry Manual procedures', 26, 1, 1, 3, 100, 100, NULL, 1, '2022-03-01 05:19:15', '2022-03-01 05:30:17'),
(99, 25, 'Maintain and update all registers', 26, 1, 1, 3, 100, 10, NULL, 2, '2022-03-01 05:19:16', '2022-03-01 05:30:18'),
(100, 26, 'Maintenance of asset and equipment register', 27, 1, 1, 1, 100, 100, NULL, 1, '2022-03-01 05:19:16', '2022-03-01 05:30:19'),
(101, 27, 'Supervision of construction (Where applicable)', 27, 1, 3, 1, 100, 100, NULL, 2, '2022-03-01 05:19:16', '2022-03-01 05:30:21'),
(102, 28, 'Disposal of idle assets (Where applicable)', 27, 1, 3, 1, 100, 200, NULL, 3, '2022-03-01 05:19:16', '2022-03-04 07:26:11'),
(103, 29, 'Compliance with the budget', 28, 1, 1, 1, 100, 100, NULL, 1, '2022-03-01 05:19:16', '2022-03-01 05:30:24'),
(104, 30, 'Revenue Management', 28, 1, 1, 2, 100, 100, NULL, 2, '2022-03-01 05:19:16', '2022-03-01 05:30:25'),
(105, 31, 'Implementation of Audit report recommendations.', 28, 1, 3, 2, 100, 100, NULL, 3, '2022-03-01 05:19:16', '2022-03-01 05:30:27'),
(106, 32, 'Compliance with Service Delivery Charter Standards', 29, 1, 1, 4, 100, 100, NULL, 1, '2022-03-01 05:19:16', '2022-03-01 05:30:28'),
(107, 33, 'Service improvement Innovations', 30, 1, 2, 2, 100, 100, NULL, 1, '2022-03-01 05:19:16', '2022-03-01 05:30:29'),
(108, 34, 'Competency development', 30, 1, 4, 2, 100, 100, NULL, 2, '2022-03-01 05:19:16', '2022-03-01 05:30:31'),
(109, 35, 'Corruption Prevention &Eradication', 31, 1, 1, 2, 100, 100, NULL, 1, '2022-03-01 05:19:16', '2022-03-01 05:30:32'),
(110, 36, 'Improve Employee wellness and work environment', 31, 1, 1, 1, 100, 40, NULL, 2, '2022-03-01 05:19:16', '2022-03-01 05:30:36'),
(111, 37, 'Implement court user survey recommendations', 31, 1, 1, 1, 100, 100, NULL, 3, '2022-03-01 05:19:16', '2022-03-01 05:30:39'),
(112, 1, 'Certified Urgent Applications - % of certified urgent applications concluded within 30 days from the date of certification', 32, 1, 1, 3, 80, 70, NULL, 1, '2022-03-03 04:12:59', '2022-03-03 04:15:37'),
(113, 2, 'Injunction applications -% of injunction applications heard and determined within 90 days of filing', 32, 1, 1, 3, 90, 80, NULL, 2, '2022-03-03 04:12:59', '2022-03-03 04:15:40'),
(114, 3, 'All Other Applications -% of other applications heard and determined within 180 days of filing', 32, 1, 1, 3, 100, 80, NULL, 3, '2022-03-03 04:12:59', '2022-03-03 04:15:42'),
(115, 4, 'Hearing and determination of Criminal cases -% of cases concluded within 360 days of filing', 32, 1, 1, 7, 100, 80, NULL, 4, '2022-03-03 04:13:00', '2022-03-03 04:15:48'),
(116, 5, 'Hearing and determination of Civil cases -% of cases concluded within 360 days of filing', 32, 1, 1, 8, 60, 50, NULL, 5, '2022-03-03 04:13:00', '2022-03-03 04:15:57'),
(117, 6, 'Percentage of judgments/rulings delivered on the date first scheduled for delivery', 32, 1, 1, 3, 100, 100, NULL, 6, '2022-03-03 04:13:00', '2022-03-03 04:15:59'),
(118, 7, 'Delivery of Judgments & Rulings -% of judgments & rulings delivered within 60 days of conclusion of the hearing', 32, 1, 1, 3, 80, 70, NULL, 7, '2022-03-03 04:13:00', '2022-03-03 04:16:01'),
(119, 8, 'Applications in criminal matters -% of applications concluded within 90 days of filing', 32, 1, 1, 3, 100, 100, NULL, 8, '2022-03-03 04:13:00', '2022-03-03 04:16:03'),
(120, 9, 'Reduced no. of days spent in remand custody from the “Date of plea” to the “Date of first hearing” (where bail has been denied or where the remandees are unable to meet the bail terms)', 32, 3, 2, 3, 100, 10, NULL, 9, '2022-03-03 04:13:00', '2022-03-14 10:34:37'),
(121, 10, 'Case clearance rate for Criminal Cases', 32, 1, 1, 4, 105, 100, NULL, 10, '2022-03-03 04:13:00', '2022-03-03 04:16:10'),
(122, 11, 'Case clearance rate for Civil Cases', 32, 1, 1, 4, 101, 99, NULL, 11, '2022-03-03 04:13:00', '2022-03-03 04:16:13'),
(123, 12, 'Case Clearance Rate for Traffic Cases', 32, 2, 1, 3, 101, 99, NULL, 11, '2022-03-03 04:13:00', '2022-03-03 04:16:18'),
(124, 13, 'Percentage reduction of backlog', 32, 1, 1, 4, 10, 5, NULL, 13, '2022-03-03 04:13:00', '2022-03-03 04:16:30'),
(125, 14, 'Merit Productivity', 32, 1, 4, 6, 1500, 1700, NULL, 14, '2022-03-03 04:13:00', '2022-03-03 04:16:35'),
(126, 15, 'Other productivity', 32, 1, 4, 3, 3000, 4000, NULL, 15, '2022-03-03 04:13:01', '2022-03-03 04:16:41'),
(127, 16, 'Advance communication of adjournments of trials & hearings and date of judgment of delivery of judgments/rulings', 33, 1, 1, 2, 100, 100, NULL, 1, '2022-03-03 04:13:01', '2022-03-03 04:16:44'),
(128, 17, 'Percentage of trial/hearings held when first cause listed', 33, 1, 1, 2, 100, 100, NULL, 2, '2022-03-03 04:13:01', '2022-03-03 04:16:45'),
(129, 18, 'Percentage of pre-trial events held when first listed – mentions and supervision for compliance by parties in filing pleadings/exhibits', 33, 1, 1, 1, 100, 80, NULL, 3, '2022-03-03 04:13:01', '2022-03-03 04:16:47'),
(130, 19, 'Submission of Court proceedings for appealed Matters within 60 days from date of receipt of notice', 33, 1, 1, 2, 100, 90, NULL, 4, '2022-03-03 04:13:01', '2022-03-03 04:16:49'),
(131, 20, 'Adoption of Alternative Dispute Resolutions - % of Filed Cases referred for Alternative Dispute Resolution (ADR/CAM/AJS)', 33, 1, 1, 2, 10, 15, NULL, 5, '2022-03-03 04:13:01', '2022-03-03 04:16:55'),
(132, 21, 'Publish daily cause lists and posting on the notice board/online - seven days in advance', 33, 1, 1, 1, 100, 100, NULL, 6, '2022-03-03 04:13:01', '2022-03-03 04:16:59'),
(133, 22, 'Stakeholder Engagement', 33, 1, 1, 2, 100, 100, NULL, 7, '2022-03-03 04:13:01', '2022-03-03 04:17:00'),
(134, 23, 'Timely Submission of accurate monthly court returns', 33, 1, 1, 2, 100, 100, NULL, 8, '2022-03-03 04:13:01', '2022-03-03 04:17:02'),
(135, 24, 'Implement the Registry Manual procedures', 34, 1, 1, 3, 100, 100, NULL, 1, '2022-03-03 04:13:01', '2022-03-03 04:17:03'),
(136, 25, 'Maintain and update all registers', 34, 1, 1, 3, 100, 100, NULL, 2, '2022-03-03 04:13:01', '2022-03-03 04:17:05'),
(137, 26, 'Maintenance of asset and equipment register', 35, 1, 1, 1, 100, 100, NULL, 1, '2022-03-03 04:13:01', '2022-03-03 04:17:07'),
(138, 27, 'Supervision of construction (Where applicable)', 35, 1, 3, 1, 100, 100, NULL, 2, '2022-03-03 04:13:01', '2022-03-03 04:17:08'),
(139, 28, 'Disposal of idle assets (Where applicable)', 35, 1, 3, 1, 100, 100, NULL, 3, '2022-03-03 04:13:01', '2022-03-03 04:17:10'),
(140, 29, 'Compliance with the budget', 36, 1, 1, 1, 100, 100, NULL, 1, '2022-03-03 04:13:01', '2022-03-03 04:17:11'),
(141, 30, 'Revenue Management', 36, 1, 1, 2, 100, 100, NULL, 2, '2022-03-03 04:13:01', '2022-03-03 04:17:14'),
(142, 31, 'Implementation of Audit report recommendations.', 36, 1, 3, 2, 100, 100, NULL, 3, '2022-03-03 04:13:02', '2022-03-03 04:17:15'),
(143, 32, 'Compliance with Service Delivery Charter Standards', 37, 1, 1, 4, 100, 100, NULL, 1, '2022-03-03 04:13:02', '2022-03-03 04:17:17'),
(144, 33, 'Service improvement Innovations', 38, 1, 2, 2, 100, 100, NULL, 1, '2022-03-03 04:13:02', '2022-03-03 04:17:18'),
(145, 34, 'Competency development', 38, 1, 4, 2, 100, 100, NULL, 2, '2022-03-03 04:13:02', '2022-03-03 04:17:20'),
(146, 35, 'Corruption Prevention &Eradication', 39, 1, 1, 2, 100, 100, NULL, 1, '2022-03-03 04:13:02', '2022-03-03 04:17:21'),
(147, 36, 'Improve Employee wellness and work environment', 39, 1, 1, 1, 1001, 100, NULL, 2, '2022-03-03 04:13:02', '2022-03-03 04:17:22'),
(148, 37, 'Implement court user survey recommendations', 39, 1, 1, 1, 100, 100, NULL, 3, '2022-03-03 04:13:02', '2022-03-03 04:17:23'),
(149, 1, 'Certified Urgent Applications - % of certified urgent applications concluded within 30 days from the date of certification', 40, 1, 1, 3, 90, 100, NULL, 1, '2022-03-03 04:27:45', '2022-03-03 04:32:57'),
(150, 2, 'Injunction applications -% of injunction applications heard and determined within 90 days of filing', 40, 1, 1, 3, 95, 90, NULL, 2, '2022-03-03 04:27:45', '2022-03-03 04:31:49'),
(151, 3, 'All Other Applications -% of other applications heard and determined within 180 days of filing', 40, 1, 1, 3, 100, 100, NULL, 3, '2022-03-03 04:27:45', '2022-03-03 04:31:52'),
(152, 4, 'Hearing and determination of Criminal cases -% of cases concluded within 360 days of filing', 40, 1, 1, 7, 100, 100, NULL, 4, '2022-03-03 04:27:45', '2022-03-03 04:31:58'),
(153, 5, 'Hearing and determination of Civil cases -% of cases concluded within 360 days of filing', 40, 1, 1, 8, 100, 100, NULL, 5, '2022-03-03 04:27:45', '2022-03-03 04:32:00'),
(154, 6, 'Percentage of judgments/rulings delivered on the date first scheduled for delivery', 40, 1, 1, 3, 100, 100, NULL, 6, '2022-03-03 04:27:45', '2022-03-03 04:32:03'),
(155, 7, 'Delivery of Judgments & Rulings -% of judgments & rulings delivered within 60 days of conclusion of the hearing', 40, 1, 1, 3, 100, 100, NULL, 7, '2022-03-03 04:27:45', '2022-03-03 04:32:08'),
(156, 8, 'Applications in criminal matters -% of applications concluded within 90 days of filing', 40, 1, 1, 3, 90, 85, NULL, 8, '2022-03-03 04:27:45', '2022-03-03 04:32:14'),
(157, 9, 'Reduced no. of days spent in remand custody from the “Date of plea” to the “Date of first hearing” (where bail has been denied or where the remandees are unable to meet the bail terms)', 40, 3, 2, 3, 10, 9, NULL, 9, '2022-03-03 04:27:45', '2022-03-03 04:32:16'),
(158, 10, 'Case clearance rate for Criminal Cases', 40, 1, 1, 4, 105, 100, NULL, 10, '2022-03-03 04:27:45', '2022-03-03 04:32:18'),
(159, 11, 'Case clearance rate for Civil Cases', 40, 1, 1, 4, 106, 100, NULL, 11, '2022-03-03 04:27:45', '2022-03-03 04:32:20'),
(160, 12, 'Case Clearance Rate for Traffic Cases', 40, 2, 1, 3, 100, 100, NULL, 11, '2022-03-03 04:27:45', '2022-03-03 04:32:23'),
(161, 13, 'Percentage reduction of backlog', 40, 1, 1, 4, 10, 100, NULL, 13, '2022-03-03 04:27:45', '2022-03-03 04:32:23'),
(162, 14, 'Merit Productivity', 40, 1, 4, 6, 1600, 1000, NULL, 14, '2022-03-03 04:27:46', '2022-03-03 04:32:26'),
(163, 15, 'Other productivity', 40, 1, 4, 3, 200, 100, NULL, 15, '2022-03-03 04:27:46', '2022-03-03 04:32:28'),
(164, 16, 'Advance communication of adjournments of trials & hearings and date of judgment of delivery of judgments/rulings', 41, 1, 1, 2, 100, 100, NULL, 1, '2022-03-03 04:27:46', '2022-03-03 04:32:31'),
(165, 17, 'Percentage of trial/hearings held when first cause listed', 41, 1, 1, 2, 100, 100, NULL, 2, '2022-03-03 04:27:46', '2022-03-03 04:32:32'),
(166, 18, 'Percentage of pre-trial events held when first listed – mentions and supervision for compliance by parties in filing pleadings/exhibits', 41, 1, 1, 1, 100, 100, NULL, 3, '2022-03-03 04:27:46', '2022-03-03 04:32:35'),
(167, 19, 'Submission of Court proceedings for appealed Matters within 60 days from date of receipt of notice', 41, 1, 1, 2, 100, 100, NULL, 4, '2022-03-03 04:27:46', '2022-03-03 04:32:36'),
(168, 20, 'Adoption of Alternative Dispute Resolutions - % of Filed Cases referred for Alternative Dispute Resolution (ADR/CAM/AJS)', 41, 1, 1, 2, 100, 100, NULL, 5, '2022-03-03 04:27:46', '2022-03-03 04:32:38'),
(169, 21, 'Publish daily cause lists and posting on the notice board/online - seven days in advance', 41, 1, 1, 1, 100, 100, NULL, 6, '2022-03-03 04:27:46', '2022-03-03 04:32:39'),
(170, 22, 'Stakeholder Engagement', 41, 1, 1, 2, 100, 92, NULL, 7, '2022-03-03 04:27:46', '2022-03-03 04:33:07'),
(171, 23, 'Timely Submission of accurate monthly court returns', 41, 1, 1, 2, 100, 50, NULL, 8, '2022-03-03 04:27:46', '2022-03-03 04:33:19'),
(172, 24, 'Implement the Registry Manual procedures', 42, 1, 1, 3, 100, 90, NULL, 1, '2022-03-03 04:27:46', '2022-03-03 04:33:21'),
(173, 25, 'Maintain and update all registers', 42, 1, 1, 3, 100, 80, NULL, 2, '2022-03-03 04:27:46', '2022-03-03 04:33:23'),
(174, 26, 'Maintenance of asset and equipment register', 43, 1, 1, 1, 100, 78, NULL, 1, '2022-03-03 04:27:46', '2022-03-03 04:33:26'),
(175, 27, 'Supervision of construction (Where applicable)', 43, 1, 3, 1, 100, 68, NULL, 2, '2022-03-03 04:27:47', '2022-03-03 04:33:28'),
(176, 28, 'Disposal of idle assets (Where applicable)', 43, 1, 3, 1, 100, 80, NULL, 3, '2022-03-03 04:27:47', '2022-03-03 04:33:31'),
(177, 29, 'Compliance with the budget', 44, 1, 1, 1, 100, 80, NULL, 1, '2022-03-03 04:27:47', '2022-03-03 04:33:32'),
(178, 30, 'Revenue Management', 44, 1, 1, 2, 100, 80, NULL, 2, '2022-03-03 04:27:47', '2022-03-03 04:33:38'),
(179, 31, 'Implementation of Audit report recommendations.', 44, 1, 3, 2, 100, 98, NULL, 3, '2022-03-03 04:27:47', '2022-03-03 04:33:41'),
(180, 32, 'Compliance with Service Delivery Charter Standards', 45, 1, 1, 4, 100, 98, NULL, 1, '2022-03-03 04:27:47', '2022-03-03 04:33:43'),
(181, 33, 'Service improvement Innovations', 46, 1, 2, 2, 100, 98, NULL, 1, '2022-03-03 04:27:47', '2022-03-03 04:33:45'),
(182, 34, 'Competency development', 46, 1, 4, 2, 100, 98, NULL, 2, '2022-03-03 04:27:47', '2022-03-03 04:33:46'),
(183, 35, 'Corruption Prevention &Eradication', 47, 1, 1, 2, 100, 52, NULL, 1, '2022-03-03 04:27:47', '2022-03-03 04:33:51'),
(184, 36, 'Improve Employee wellness and work environment', 47, 1, 1, 1, 100, 87, NULL, 2, '2022-03-03 04:27:47', '2022-03-03 04:33:53'),
(185, 37, 'Implement court user survey recommendations', 47, 1, 1, 1, 100, 78, NULL, 3, '2022-03-03 04:27:47', '2022-03-03 04:33:59'),
(186, 1, 'Certified Urgent Applications - % of certified urgent applications concluded within 30 days from the date of certification', 48, 1, 1, 3, 90, 90, NULL, 1, '2022-03-03 08:31:29', '2022-03-03 08:40:57'),
(187, 2, 'Injunction applications -% of injunction applications heard and determined within 90 days of filing', 48, 1, 1, 3, 78, 78, NULL, 2, '2022-03-03 08:31:29', '2022-03-03 08:36:22'),
(188, 3, 'All Other Applications -% of other applications heard and determined within 180 days of filing', 48, 1, 1, 3, 100, 90, NULL, 3, '2022-03-03 08:31:29', '2022-03-03 08:36:45'),
(189, 4, 'Hearing and determination of Criminal cases -% of cases concluded within 360 days of filing', 48, 1, 1, 7, 70, 67, NULL, 4, '2022-03-03 08:31:29', '2022-03-03 08:36:46'),
(190, 5, 'Hearing and determination of Civil cases -% of cases concluded within 360 days of filing', 48, 1, 1, 8, 15, 15, NULL, 5, '2022-03-03 08:31:29', '2022-03-03 08:37:02'),
(191, 6, 'Percentage of judgments/rulings delivered on the date first scheduled for delivery', 48, 1, 1, 3, 90, 90, NULL, 6, '2022-03-03 08:31:29', '2022-03-03 08:37:08'),
(192, 7, 'Delivery of Judgments & Rulings -% of judgments & rulings delivered within 60 days of conclusion of the hearing', 48, 1, 1, 3, 100, 80, NULL, 7, '2022-03-03 08:31:29', '2022-03-03 08:37:09'),
(193, 8, 'Applications in criminal matters -% of applications concluded within 90 days of filing', 48, 1, 1, 3, 100, 100, NULL, 8, '2022-03-03 08:31:29', '2022-03-03 08:37:12'),
(194, 9, 'Reduced no. of days spent in remand custody from the “Date of plea” to the “Date of first hearing” (where bail has been denied or where the remandees are unable to meet the bail terms)', 48, 3, 2, 3, 121, 97, NULL, 9, '2022-03-03 08:31:29', '2022-03-03 08:37:21'),
(195, 10, 'Case clearance rate for Criminal Cases', 48, 1, 1, 4, 150, 300, NULL, 10, '2022-03-03 08:31:29', '2022-03-03 08:37:23'),
(196, 11, 'Case clearance rate for Civil Cases', 48, 1, 1, 4, 230, 230, NULL, 11, '2022-03-03 08:31:29', '2022-03-03 08:37:26'),
(197, 12, 'Case Clearance Rate for Traffic Cases', 48, 2, 1, 3, 106, 143, NULL, 11, '2022-03-03 08:31:29', '2022-03-03 08:37:31'),
(198, 13, 'Percentage reduction of backlog', 48, 1, 1, 4, 10, 20, NULL, 13, '2022-03-03 08:31:29', '2022-03-03 08:37:36'),
(199, 14, 'Merit Productivity', 48, 1, 4, 6, 1000, 1007, NULL, 14, '2022-03-03 08:31:29', '2022-03-03 08:37:40'),
(200, 15, 'Other productivity', 48, 1, 4, 3, 500, 600, NULL, 15, '2022-03-03 08:31:30', '2022-03-03 08:37:43'),
(201, 16, 'Advance communication of adjournments of trials & hearings and date of judgment of delivery of judgments/rulings', 49, 1, 1, 2, 100, 100, NULL, 1, '2022-03-03 08:31:30', '2022-03-03 08:37:46'),
(202, 17, 'Percentage of trial/hearings held when first cause listed', 49, 1, 1, 2, 100, 100, NULL, 2, '2022-03-03 08:31:30', '2022-03-03 08:37:47'),
(203, 18, 'Percentage of pre-trial events held when first listed – mentions and supervision for compliance by parties in filing pleadings/exhibits', 49, 1, 1, 1, 100, 100, NULL, 3, '2022-03-03 08:31:30', '2022-03-03 08:37:49'),
(204, 19, 'Submission of Court proceedings for appealed Matters within 60 days from date of receipt of notice', 49, 1, 1, 2, 100, 100, NULL, 4, '2022-03-03 08:31:30', '2022-03-03 08:37:51'),
(205, 20, 'Adoption of Alternative Dispute Resolutions - % of Filed Cases referred for Alternative Dispute Resolution (ADR/CAM/AJS)', 49, 1, 1, 2, 70, 71, NULL, 5, '2022-03-03 08:31:30', '2022-03-03 08:38:56'),
(206, 21, 'Publish daily cause lists and posting on the notice board/online - seven days in advance', 49, 1, 1, 1, 100, 100, NULL, 6, '2022-03-03 08:31:30', '2022-03-03 08:37:56'),
(207, 22, 'Stakeholder Engagement', 49, 1, 1, 2, 100, 90, NULL, 7, '2022-03-03 08:31:30', '2022-03-03 08:38:08'),
(208, 23, 'Timely Submission of accurate monthly court returns', 49, 1, 1, 2, 100, 90, NULL, 8, '2022-03-03 08:31:30', '2022-03-03 08:38:10'),
(209, 24, 'Implement the Registry Manual procedures', 50, 1, 1, 3, 60, 60, NULL, 1, '2022-03-03 08:31:30', '2022-03-03 08:39:04'),
(210, 25, 'Maintain and update all registers', 50, 1, 1, 3, 80, 80, NULL, 2, '2022-03-03 08:31:30', '2022-03-03 08:39:08'),
(211, 26, 'Maintenance of asset and equipment register', 51, 1, 1, 1, 100, 100, NULL, 1, '2022-03-03 08:31:30', '2022-03-03 08:39:08'),
(212, 27, 'Supervision of construction (Where applicable)', 51, 1, 3, 1, 100, 100, NULL, 2, '2022-03-03 08:31:30', '2022-03-03 08:39:09'),
(213, 28, 'Disposal of idle assets (Where applicable)', 51, 1, 3, 1, 100, 100, NULL, 3, '2022-03-03 08:31:30', '2022-03-03 08:39:11'),
(214, 29, 'Compliance with the budget', 52, 1, 1, 1, 100, 100, NULL, 1, '2022-03-03 08:31:30', '2022-03-03 08:39:14'),
(215, 30, 'Revenue Management', 52, 1, 1, 2, 35, 100, NULL, 2, '2022-03-03 08:31:31', '2022-03-03 08:39:15'),
(216, 31, 'Implementation of Audit report recommendations.', 52, 1, 3, 2, 40, 100, NULL, 3, '2022-03-03 08:31:31', '2022-03-03 08:39:16'),
(217, 32, 'Compliance with Service Delivery Charter Standards', 53, 1, 1, 4, 100, 100, NULL, 1, '2022-03-03 08:31:31', '2022-03-03 08:39:18'),
(218, 33, 'Service improvement Innovations', 54, 1, 2, 2, 100, 50, NULL, 1, '2022-03-03 08:31:31', '2022-03-03 08:39:21'),
(219, 34, 'Competency development', 54, 1, 4, 2, 100, 10, NULL, 2, '2022-03-03 08:31:31', '2022-03-03 08:39:24'),
(220, 35, 'Corruption Prevention &Eradication', 55, 1, 1, 2, 100, 100, NULL, 1, '2022-03-03 08:31:31', '2022-03-03 08:39:33'),
(221, 36, 'Improve Employee wellness and work environment', 55, 1, 1, 1, 100, 100, NULL, 2, '2022-03-03 08:31:31', '2022-03-03 08:39:34'),
(222, 37, 'Implement court user survey recommendations', 55, 1, 1, 1, 100, 100, NULL, 3, '2022-03-03 08:31:31', '2022-03-03 08:39:35'),
(223, 1, 'Certified Urgent Applications - % of certified urgent applications concluded within 30 days from the date of certification', 56, 1, 1, 3, 95, 98, NULL, 1, '2022-03-03 10:08:06', '2022-03-04 11:10:10'),
(224, 2, 'Injunction applications -% of injunction applications heard and determined within 90 days of filing', 56, 1, 1, 3, 98, 97, NULL, 2, '2022-03-03 10:08:06', '2022-03-04 11:10:21'),
(225, 3, 'All Other Applications -% of other applications heard and determined within 180 days of filing', 56, 1, 1, 3, 90, 80, NULL, 3, '2022-03-03 10:08:06', '2022-03-04 11:10:29'),
(226, 4, 'Hearing and determination of Criminal cases -% of cases concluded within 360 days of filing', 56, 1, 1, 7, 100, 100, NULL, 4, '2022-03-03 10:08:06', '2022-03-04 11:10:33'),
(227, 5, 'Hearing and determination of Civil cases -% of cases concluded within 360 days of filing', 56, 1, 1, 8, 60, 70, NULL, 5, '2022-03-03 10:08:06', '2022-03-04 11:10:36'),
(228, 6, 'Percentage of judgments/rulings delivered on the date first scheduled for delivery', 56, 1, 1, 3, 100, 50, NULL, 6, '2022-03-03 10:08:06', '2022-03-04 11:10:50'),
(229, 7, 'Delivery of Judgments & Rulings -% of judgments & rulings delivered within 60 days of conclusion of the hearing', 56, 1, 1, 3, 100, 60, NULL, 7, '2022-03-03 10:08:06', '2022-03-04 11:10:54'),
(230, 8, 'Applications in criminal matters -% of applications concluded within 90 days of filing', 56, 1, 1, 3, 100, 90, NULL, 8, '2022-03-03 10:08:06', '2022-03-04 11:10:58'),
(231, 9, 'Reduced no. of days spent in remand custody from the “Date of plea” to the “Date of first hearing” (where bail has been denied or where the remandees are unable to meet the bail terms)', 56, 3, 2, 3, 50, 50, NULL, 9, '2022-03-03 10:08:06', '2022-03-14 09:37:49'),
(232, 10, 'Case clearance rate for Criminal Cases', 56, 1, 1, 4, 100, 100, NULL, 10, '2022-03-03 10:08:06', '2022-03-04 11:11:27'),
(233, 11, 'Case clearance rate for Civil Cases', 56, 1, 1, 4, 100, 105, NULL, 11, '2022-03-03 10:08:06', '2022-03-04 11:11:37'),
(234, 12, 'Case Clearance Rate for Traffic Cases', 56, 2, 1, 3, 100, 95, NULL, 11, '2022-03-03 10:08:06', '2022-03-04 11:11:41'),
(235, 13, 'Percentage reduction of backlog', 56, 1, 1, 4, 100, 0, NULL, 13, '2022-03-03 10:08:07', '2022-03-04 11:11:48'),
(236, 14, 'Merit Productivity', 56, 1, 4, 6, 1000, 500, NULL, 14, '2022-03-03 10:08:07', '2022-03-04 11:12:00'),
(237, 15, 'Other productivity', 56, 1, 4, 3, 2500, 2700, NULL, 15, '2022-03-03 10:08:07', '2022-03-04 11:12:07'),
(238, 16, 'Advance communication of adjournments of trials & hearings and date of judgment of delivery of judgments/rulings', 57, 1, 1, 2, 100, 100, NULL, 1, '2022-03-03 10:08:07', '2022-03-04 11:12:28'),
(239, 17, 'Percentage of trial/hearings held when first cause listed', 57, 1, 1, 2, 100, 100, NULL, 2, '2022-03-03 10:08:07', '2022-03-04 11:12:28'),
(240, 18, 'Percentage of pre-trial events held when first listed – mentions and supervision for compliance by parties in filing pleadings/exhibits', 57, 1, 1, 1, 100, 100, NULL, 3, '2022-03-03 10:08:07', '2022-03-04 11:12:30'),
(241, 19, 'Submission of Court proceedings for appealed Matters within 60 days from date of receipt of notice', 57, 1, 1, 2, 100, 80, NULL, 4, '2022-03-03 10:08:07', '2022-03-04 11:12:33'),
(242, 20, 'Adoption of Alternative Dispute Resolutions - % of Filed Cases referred for Alternative Dispute Resolution (ADR/CAM/AJS)', 57, 1, 1, 2, 100, 10, NULL, 5, '2022-03-03 10:08:07', '2022-03-04 11:12:36'),
(243, 21, 'Publish daily cause lists and posting on the notice board/online - seven days in advance', 57, 1, 1, 1, 100, 100, NULL, 6, '2022-03-03 10:08:07', '2022-03-04 11:12:39'),
(244, 22, 'Stakeholder Engagement', 57, 1, 1, 2, 100, 100, NULL, 7, '2022-03-03 10:08:07', '2022-03-04 11:12:40'),
(245, 23, 'Timely Submission of accurate monthly court returns', 57, 1, 1, 2, 100, 100, NULL, 8, '2022-03-03 10:08:07', '2022-03-04 11:12:42'),
(246, 24, 'Implement the Registry Manual procedures', 58, 1, 1, 3, 100, 100, NULL, 1, '2022-03-03 10:08:08', '2022-03-04 11:12:44'),
(247, 25, 'Maintain and update all registers', 58, 1, 1, 3, 100, 100, NULL, 2, '2022-03-03 10:08:08', '2022-03-04 11:12:46'),
(248, 26, 'Maintenance of asset and equipment register', 59, 1, 1, 1, 100, 100, NULL, 1, '2022-03-03 10:08:08', '2022-03-04 11:12:47'),
(249, 27, 'Supervision of construction (Where applicable)', 59, 1, 3, 1, 100, 100, NULL, 2, '2022-03-03 10:08:08', '2022-03-04 11:12:47'),
(250, 28, 'Disposal of idle assets (Where applicable)', 59, 1, 3, 1, 100, 100, NULL, 3, '2022-03-03 10:08:08', '2022-03-04 11:12:49'),
(251, 29, 'Compliance with the budget', 60, 1, 1, 1, 100, 100, NULL, 1, '2022-03-03 10:08:08', '2022-03-04 11:12:50'),
(252, 30, 'Revenue Management', 60, 1, 1, 2, 100, 100, NULL, 2, '2022-03-03 10:08:08', '2022-03-04 11:12:51'),
(253, 31, 'Implementation of Audit report recommendations.', 60, 1, 3, 2, 100, 100, NULL, 3, '2022-03-03 10:08:08', '2022-03-04 11:12:53'),
(254, 32, 'Compliance with Service Delivery Charter Standards', 61, 1, 1, 4, 100, 100, NULL, 1, '2022-03-03 10:08:08', '2022-03-04 11:12:54'),
(255, 33, 'Service improvement Innovations', 62, 1, 2, 2, 100, 100, NULL, 1, '2022-03-03 10:08:08', '2022-03-04 11:12:58'),
(256, 34, 'Competency development', 62, 1, 4, 2, 100, 100, NULL, 2, '2022-03-03 10:08:08', '2022-03-04 11:12:59'),
(257, 35, 'Corruption Prevention &Eradication', 63, 1, 1, 2, 100, 100, NULL, 1, '2022-03-03 10:08:08', '2022-03-04 11:13:00'),
(258, 36, 'Improve Employee wellness and work environment', 63, 1, 1, 1, 100, 100, NULL, 2, '2022-03-03 10:08:08', '2022-03-04 11:13:01'),
(259, 37, 'Implement court user survey recommendations', 63, 1, 1, 1, 100, 100, NULL, 3, '2022-03-03 10:08:08', '2022-03-04 11:13:03'),
(260, 1, 'Certified Urgent Applications - % of certified urgent applications concluded within 30 days from the date of certification', 64, 1, 1, 3, 98, 99, NULL, 1, '2022-03-03 10:24:55', '2022-03-04 11:20:30'),
(261, 2, 'Injunction applications -% of injunction applications heard and determined within 90 days of filing', 64, 1, 1, 3, 95, 87, NULL, 2, '2022-03-03 10:24:55', '2022-03-04 11:20:35'),
(262, 3, 'All Other Applications -% of other applications heard and determined within 180 days of filing', 64, 1, 1, 3, 85, 78, NULL, 3, '2022-03-03 10:24:55', '2022-03-04 11:20:39'),
(263, 4, 'Hearing and determination of Criminal cases -% of cases concluded within 360 days of filing', 64, 1, 1, 7, 95, 56, NULL, 4, '2022-03-03 10:24:55', '2022-03-04 11:20:42'),
(264, 5, 'Hearing and determination of Civil cases -% of cases concluded within 360 days of filing', 64, 1, 1, 8, 65, 65, NULL, 5, '2022-03-03 10:24:55', '2022-03-04 11:20:45'),
(265, 6, 'Percentage of judgments/rulings delivered on the date first scheduled for delivery', 64, 1, 1, 3, 100, 100, NULL, 6, '2022-03-03 10:24:55', '2022-03-04 11:20:49'),
(266, 7, 'Delivery of Judgments & Rulings -% of judgments & rulings delivered within 60 days of conclusion of the hearing', 64, 1, 1, 3, 100, 100, NULL, 7, '2022-03-03 10:24:55', '2022-03-04 11:20:50'),
(267, 8, 'Applications in criminal matters -% of applications concluded within 90 days of filing', 64, 1, 1, 3, 100, 100, NULL, 8, '2022-03-03 10:24:55', '2022-03-04 11:20:52'),
(268, 9, 'Reduced no. of days spent in remand custody from the “Date of plea” to the “Date of first hearing” (where bail has been denied or where the remandees are unable to meet the bail terms)', 64, 3, 2, 3, 62, 62, NULL, 9, '2022-03-03 10:24:55', '2022-03-04 11:33:14'),
(269, 10, 'Case clearance rate for Criminal Cases', 64, 1, 1, 4, 95, 80, NULL, 10, '2022-03-03 10:24:55', '2022-03-04 11:38:19'),
(270, 11, 'Case clearance rate for Civil Cases', 64, 1, 1, 4, 85, 75, NULL, 11, '2022-03-03 10:24:55', '2022-03-04 11:38:23'),
(271, 12, 'Case Clearance Rate for Traffic Cases', 64, 2, 1, 3, 75, 75, NULL, 11, '2022-03-03 10:24:55', '2022-03-04 11:38:27'),
(272, 13, 'Percentage reduction of backlog', 64, 1, 1, 4, 10, 5, NULL, 13, '2022-03-03 10:24:55', '2022-03-04 11:38:29'),
(273, 14, 'Merit Productivity', 64, 1, 4, 6, 2500, 1500, NULL, 14, '2022-03-03 10:24:56', '2022-03-04 11:38:33'),
(274, 15, 'Other productivity', 64, 1, 4, 3, 3000, 2000, NULL, 15, '2022-03-03 10:24:56', '2022-03-04 11:38:36'),
(275, 16, 'Advance communication of adjournments of trials & hearings and date of judgment of delivery of judgments/rulings', 65, 1, 1, 2, 100, 100, NULL, 1, '2022-03-03 10:24:56', '2022-03-04 11:38:47'),
(276, 17, 'Percentage of trial/hearings held when first cause listed', 65, 1, 1, 2, 100, 100, NULL, 2, '2022-03-03 10:24:56', '2022-03-04 11:38:48'),
(277, 18, 'Percentage of pre-trial events held when first listed – mentions and supervision for compliance by parties in filing pleadings/exhibits', 65, 1, 1, 1, 100, 100, NULL, 3, '2022-03-03 10:24:56', '2022-03-04 11:38:49'),
(278, 19, 'Submission of Court proceedings for appealed Matters within 60 days from date of receipt of notice', 65, 1, 1, 2, 100, 100, NULL, 4, '2022-03-03 10:24:56', '2022-03-04 11:38:51'),
(279, 20, 'Adoption of Alternative Dispute Resolutions - % of Filed Cases referred for Alternative Dispute Resolution (ADR/CAM/AJS)', 65, 1, 1, 2, 100, 100, NULL, 5, '2022-03-03 10:24:56', '2022-03-04 11:38:52'),
(280, 21, 'Publish daily cause lists and posting on the notice board/online - seven days in advance', 65, 1, 1, 1, 100, 100, NULL, 6, '2022-03-03 10:24:56', '2022-03-04 11:38:53'),
(281, 22, 'Stakeholder Engagement', 65, 1, 1, 2, 100, 80, NULL, 7, '2022-03-03 10:24:56', '2022-03-04 11:38:56'),
(282, 23, 'Timely Submission of accurate monthly court returns', 65, 1, 1, 2, 100, 75, NULL, 8, '2022-03-03 10:24:56', '2022-03-04 11:38:59'),
(283, 24, 'Implement the Registry Manual procedures', 66, 1, 1, 3, 100, 85, NULL, 1, '2022-03-03 10:24:56', '2022-03-04 11:39:07'),
(284, 25, 'Maintain and update all registers', 66, 1, 1, 3, 100, 100, NULL, 2, '2022-03-03 10:24:56', '2022-03-04 11:39:13'),
(285, 26, 'Maintenance of asset and equipment register', 67, 1, 1, 1, 100, 100, NULL, 1, '2022-03-03 10:24:56', '2022-03-04 11:39:14'),
(286, 27, 'Supervision of construction (Where applicable)', 67, 1, 3, 1, 100, 100, NULL, 2, '2022-03-03 10:24:57', '2022-03-04 11:39:16'),
(287, 28, 'Disposal of idle assets (Where applicable)', 67, 1, 3, 1, 100, 100, NULL, 3, '2022-03-03 10:24:57', '2022-03-04 11:39:18'),
(288, 29, 'Compliance with the budget', 68, 1, 1, 1, 100, 100, NULL, 1, '2022-03-03 10:24:57', '2022-03-04 11:39:19'),
(289, 30, 'Revenue Management', 68, 1, 1, 2, 100, 100, NULL, 2, '2022-03-03 10:24:57', '2022-03-04 11:39:20'),
(290, 31, 'Implementation of Audit report recommendations.', 68, 1, 3, 2, 100, 100, NULL, 3, '2022-03-03 10:24:57', '2022-03-04 11:39:22'),
(291, 32, 'Compliance with Service Delivery Charter Standards', 69, 1, 1, 4, 100, 100, NULL, 1, '2022-03-03 10:24:57', '2022-03-04 11:39:24'),
(292, 33, 'Service improvement Innovations', 70, 1, 2, 2, 100, 100, NULL, 1, '2022-03-03 10:24:57', '2022-03-04 11:39:29'),
(293, 34, 'Competency development', 70, 1, 4, 2, 100, 100, NULL, 2, '2022-03-03 10:24:57', '2022-03-04 11:39:30'),
(294, 35, 'Corruption Prevention &Eradication', 71, 1, 1, 2, 100, 100, NULL, 1, '2022-03-03 10:24:57', '2022-03-04 11:39:25'),
(295, 36, 'Improve Employee wellness and work environment', 71, 1, 1, 1, 100, 100, NULL, 2, '2022-03-03 10:24:57', '2022-03-04 11:39:26'),
(296, 37, 'Implement court user survey recommendations', 71, 1, 1, 1, 100, 100, NULL, 3, '2022-03-03 10:24:57', '2022-03-04 11:39:28'),
(297, 1, 'Certified Urgent Applications - % of certified urgent applications concluded within 30 days from the date of certification', 72, 1, 1, 3, 98, 97, NULL, 1, '2022-03-14 04:21:15', '2022-03-14 04:32:32'),
(298, 2, 'Injunction applications -% of injunction applications heard and determined within 90 days of filing', 72, 1, 1, 3, 99, 82, NULL, 2, '2022-03-14 04:21:15', '2022-03-14 04:32:39'),
(299, 3, 'All Other Applications -% of other applications heard and determined within 180 days of filing', 72, 1, 1, 3, 95, 90, NULL, 3, '2022-03-14 04:21:15', '2022-03-14 04:35:02'),
(300, 4, 'Hearing and determination of Criminal cases -% of cases concluded within 360 days of filing', 72, 1, 1, 7, 100, 100, NULL, 4, '2022-03-14 04:21:16', '2022-03-14 04:35:05'),
(301, 5, 'Hearing and determination of Civil cases -% of cases concluded within 360 days of filing', 72, 1, 1, 8, 85, 54, NULL, 5, '2022-03-14 04:21:16', '2022-03-14 04:35:08'),
(302, 6, 'Percentage of judgments/rulings delivered on the date first scheduled for delivery', 72, 1, 1, 3, 95, 100, NULL, 6, '2022-03-14 04:21:16', '2022-03-14 04:35:15'),
(303, 7, 'Delivery of Judgments & Rulings -% of judgments & rulings delivered within 60 days of conclusion of the hearing', 72, 1, 1, 3, 100, 100, NULL, 7, '2022-03-14 04:21:16', '2022-03-14 04:35:16'),
(304, 8, 'Applications in criminal matters -% of applications concluded within 90 days of filing', 72, 1, 1, 3, 100, 100, NULL, 8, '2022-03-14 04:21:16', '2022-03-14 04:35:17'),
(305, 9, 'Reduced no. of days spent in remand custody from the “Date of plea” to the “Date of first hearing” (where bail has been denied or where the remandees are unable to meet the bail terms)', 72, 3, 2, 3, 100, 50, NULL, 9, '2022-03-14 04:21:16', '2022-03-14 09:48:24'),
(306, 10, 'Case clearance rate for Criminal Cases', 72, 1, 1, 4, 100, 100, NULL, 10, '2022-03-14 04:21:16', '2022-03-14 04:35:21'),
(307, 11, 'Case clearance rate for Civil Cases', 72, 1, 1, 4, 100, 100, NULL, 11, '2022-03-14 04:21:16', '2022-03-14 04:35:22'),
(308, 12, 'Case Clearance Rate for Traffic Cases', 72, 2, 1, 3, 100, 100, NULL, 11, '2022-03-14 04:21:16', '2022-03-14 04:35:23'),
(309, 13, 'Percentage reduction of backlog', 72, 1, 1, 4, 100, 100, NULL, 13, '2022-03-14 04:21:16', '2022-03-14 04:35:25'),
(310, 14, 'Merit Productivity', 72, 1, 4, 6, 1000, 100, NULL, 14, '2022-03-14 04:21:16', '2022-03-14 04:35:26'),
(311, 15, 'Other productivity', 72, 1, 4, 3, 1500, 100, NULL, 15, '2022-03-14 04:21:16', '2022-03-14 04:35:28'),
(312, 16, 'Advance communication of adjournments of trials & hearings and date of judgment of delivery of judgments/rulings', 73, 1, 1, 2, 100, 100, NULL, 1, '2022-03-14 04:21:16', '2022-03-14 04:35:30'),
(313, 17, 'Percentage of trial/hearings held when first cause listed', 73, 1, 1, 2, 100, 100, NULL, 2, '2022-03-14 04:21:16', '2022-03-14 04:35:31'),
(314, 18, 'Percentage of pre-trial events held when first listed – mentions and supervision for compliance by parties in filing pleadings/exhibits', 73, 1, 1, 1, 100, 90, NULL, 3, '2022-03-14 04:21:16', '2022-03-14 04:35:37'),
(315, 19, 'Submission of Court proceedings for appealed Matters within 60 days from date of receipt of notice', 73, 1, 1, 2, 100, 80, NULL, 4, '2022-03-14 04:21:16', '2022-03-14 04:35:40'),
(316, 20, 'Adoption of Alternative Dispute Resolutions - % of Filed Cases referred for Alternative Dispute Resolution (ADR/CAM/AJS)', 73, 1, 1, 2, 100, 54, NULL, 5, '2022-03-14 04:21:16', '2022-03-14 04:35:45'),
(317, 21, 'Publish daily cause lists and posting on the notice board/online - seven days in advance', 73, 1, 1, 1, 100, 85, NULL, 6, '2022-03-14 04:21:17', '2022-03-14 04:35:54'),
(318, 22, 'Stakeholder Engagement', 73, 1, 1, 2, 100, 100, NULL, 7, '2022-03-14 04:21:17', '2022-03-14 04:35:58'),
(319, 23, 'Timely Submission of accurate monthly court returns', 73, 1, 1, 2, 100, 94, NULL, 8, '2022-03-14 04:21:17', '2022-03-14 04:36:04'),
(320, 24, 'Implement the Registry Manual procedures', 74, 1, 1, 3, 100, 100, NULL, 1, '2022-03-14 04:21:17', '2022-03-14 04:36:07'),
(321, 25, 'Maintain and update all registers', 74, 1, 1, 3, 100, 100, NULL, 2, '2022-03-14 04:21:17', '2022-03-14 04:36:09'),
(322, 26, 'Maintenance of asset and equipment register', 75, 1, 1, 1, 100, 100, NULL, 1, '2022-03-14 04:21:17', '2022-03-14 04:36:10');
INSERT INTO `indicators` (`id`, `master_indicator_id`, `name`, `indicator_group_id`, `indicator_type_id`, `indicator_unit_of_measure_id`, `indicator_weight`, `indicator_target`, `indicator_achivement`, `remarks`, `order`, `created_at`, `updated_at`) VALUES
(323, 27, 'Supervision of construction (Where applicable)', 75, 1, 3, 1, 100, 100, NULL, 2, '2022-03-14 04:21:17', '2022-03-14 04:36:11'),
(324, 28, 'Disposal of idle assets (Where applicable)', 75, 1, 3, 1, 100, 100, NULL, 3, '2022-03-14 04:21:17', '2022-03-14 04:36:13'),
(325, 29, 'Compliance with the budget', 76, 1, 1, 1, 100, 100, NULL, 1, '2022-03-14 04:21:17', '2022-03-14 04:36:14'),
(326, 30, 'Revenue Management', 76, 1, 1, 2, 100, 100, NULL, 2, '2022-03-14 04:21:17', '2022-03-14 04:36:15'),
(327, 31, 'Implementation of Audit report recommendations.', 76, 1, 3, 2, 100, 100, NULL, 3, '2022-03-14 04:21:17', '2022-03-14 04:36:17'),
(328, 32, 'Compliance with Service Delivery Charter Standards', 77, 1, 1, 4, 100, 100, NULL, 1, '2022-03-14 04:21:17', '2022-03-14 04:36:19'),
(329, 33, 'Service improvement Innovations', 78, 1, 2, 2, 100, 100, NULL, 1, '2022-03-14 04:21:17', '2022-03-14 04:36:20'),
(330, 34, 'Competency development', 78, 1, 4, 2, 100, 100, NULL, 2, '2022-03-14 04:21:17', '2022-03-14 04:36:21'),
(331, 35, 'Corruption Prevention &Eradication', 79, 1, 1, 2, 100, 100, NULL, 1, '2022-03-14 04:21:18', '2022-03-14 04:36:23'),
(332, 36, 'Improve Employee wellness and work environment', 79, 1, 1, 1, 100, 100, NULL, 2, '2022-03-14 04:21:18', '2022-03-14 04:36:24'),
(333, 37, 'Implement court user survey recommendations', 79, 1, 1, 1, 100, 100, NULL, 3, '2022-03-14 04:21:18', '2022-03-14 04:36:26'),
(334, 1, 'Certified Urgent Applications - % of certified urgent applications concluded within 30 days from the date of certification', 80, 1, 1, 3, 98, 95, NULL, 1, '2022-03-14 10:02:14', '2022-03-14 10:13:32'),
(335, 2, 'Injunction applications -% of injunction applications heard and determined within 90 days of filing', 80, 1, 1, 3, 95, 92, NULL, 2, '2022-03-14 10:02:14', '2022-03-14 10:13:41'),
(336, 3, 'All Other Applications -% of other applications heard and determined within 180 days of filing', 80, 1, 1, 3, 100, 56, NULL, 3, '2022-03-14 10:02:15', '2022-03-14 10:13:45'),
(337, 4, 'Hearing and determination of Criminal cases -% of cases concluded within 360 days of filing', 80, 1, 1, 7, 100, 89, NULL, 4, '2022-03-14 10:02:15', '2022-03-14 10:13:51'),
(338, 5, 'Hearing and determination of Civil cases -% of cases concluded within 360 days of filing', 80, 1, 1, 8, 65, 88, NULL, 5, '2022-03-14 10:02:15', '2022-03-14 10:13:56'),
(339, 6, 'Percentage of judgments/rulings delivered on the date first scheduled for delivery', 80, 1, 1, 3, 100, 100, NULL, 6, '2022-03-14 10:02:15', '2022-03-14 10:13:59'),
(340, 7, 'Delivery of Judgments & Rulings -% of judgments & rulings delivered within 60 days of conclusion of the hearing', 80, 1, 1, 3, 100, 69, NULL, 7, '2022-03-14 10:02:15', '2022-03-14 10:15:04'),
(341, 8, 'Applications in criminal matters -% of applications concluded within 90 days of filing', 80, 1, 1, 3, 100, 100, NULL, 8, '2022-03-14 10:02:15', '2022-03-14 10:15:06'),
(342, 9, 'Reduced no. of days spent in remand custody from the “Date of plea” to the “Date of first hearing” (where bail has been denied or where the remandees are unable to meet the bail terms)', 80, 3, 2, 3, 50, 150, NULL, 9, '2022-03-14 10:02:15', '2022-03-14 10:24:38'),
(343, 10, 'Case clearance rate for Criminal Cases', 80, 1, 1, 4, 105, 101, NULL, 10, '2022-03-14 10:02:15', '2022-03-14 10:18:09'),
(344, 11, 'Case clearance rate for Civil Cases', 80, 1, 1, 4, 110, 111, NULL, 11, '2022-03-14 10:02:15', '2022-03-14 10:18:12'),
(345, 12, 'Case Clearance Rate for Traffic Cases', 80, 2, 1, 3, 120, 500, NULL, 11, '2022-03-14 10:02:16', '2022-03-14 10:25:27'),
(346, 13, 'Percentage reduction of backlog', 80, 1, 1, 4, -5, -1, NULL, 13, '2022-03-14 10:02:16', '2022-03-14 10:21:29'),
(347, 14, 'Merit Productivity', 80, 1, 4, 6, 1800, 1700, NULL, 14, '2022-03-14 10:02:16', '2022-03-14 10:25:47'),
(348, 15, 'Other productivity', 80, 1, 4, 3, 3800, 3000, NULL, 15, '2022-03-14 10:02:16', '2022-03-14 10:26:02'),
(349, 16, 'Advance communication of adjournments of trials & hearings and date of judgment of delivery of judgments/rulings', 81, 1, 1, 2, 100, 100, NULL, 1, '2022-03-14 10:02:16', '2022-03-14 10:26:06'),
(350, 17, 'Percentage of trial/hearings held when first cause listed', 81, 1, 1, 2, 100, 100, NULL, 2, '2022-03-14 10:02:16', '2022-03-14 10:26:08'),
(351, 18, 'Percentage of pre-trial events held when first listed – mentions and supervision for compliance by parties in filing pleadings/exhibits', 81, 1, 1, 1, 100, 100, NULL, 3, '2022-03-14 10:02:16', '2022-03-14 10:26:09'),
(352, 19, 'Submission of Court proceedings for appealed Matters within 60 days from date of receipt of notice', 81, 1, 1, 2, 100, 100, NULL, 4, '2022-03-14 10:02:16', '2022-03-14 10:26:10'),
(353, 20, 'Adoption of Alternative Dispute Resolutions - % of Filed Cases referred for Alternative Dispute Resolution (ADR/CAM/AJS)', 81, 1, 1, 2, 10, 20, NULL, 5, '2022-03-14 10:02:16', '2022-03-14 10:26:27'),
(354, 21, 'Publish daily cause lists and posting on the notice board/online - seven days in advance', 81, 1, 1, 1, 100, 100, NULL, 6, '2022-03-14 10:02:16', '2022-03-14 10:26:35'),
(355, 22, 'Stakeholder Engagement', 81, 1, 1, 2, 100, 100, NULL, 7, '2022-03-14 10:02:16', '2022-03-14 10:26:37'),
(356, 23, 'Timely Submission of accurate monthly court returns', 81, 1, 1, 2, 100, 95, NULL, 8, '2022-03-14 10:02:16', '2022-03-14 10:26:39'),
(357, 24, 'Implement the Registry Manual procedures', 82, 1, 1, 3, 100, 100, NULL, 1, '2022-03-14 10:02:16', '2022-03-14 10:26:42'),
(358, 25, 'Maintain and update all registers', 82, 1, 1, 3, 100, 100, NULL, 2, '2022-03-14 10:02:17', '2022-03-14 10:26:43'),
(359, 26, 'Maintenance of asset and equipment register', 83, 1, 1, 1, 100, 100, NULL, 1, '2022-03-14 10:02:17', '2022-03-14 10:26:46'),
(360, 27, 'Supervision of construction (Where applicable)', 83, 1, 3, 1, 100, 100, NULL, 2, '2022-03-14 10:02:17', '2022-03-14 10:26:47'),
(361, 28, 'Disposal of idle assets (Where applicable)', 83, 1, 3, 1, 100, 100, NULL, 3, '2022-03-14 10:02:17', '2022-03-14 10:26:48'),
(362, 29, 'Compliance with the budget', 84, 1, 1, 1, 100, 100, NULL, 1, '2022-03-14 10:02:17', '2022-03-14 10:26:57'),
(363, 30, 'Revenue Management', 84, 1, 1, 2, 100, 100, NULL, 2, '2022-03-14 10:02:17', '2022-03-14 10:26:58'),
(364, 31, 'Implementation of Audit report recommendations.', 84, 1, 3, 2, 100, 100, NULL, 3, '2022-03-14 10:02:17', '2022-03-14 10:26:59'),
(365, 32, 'Compliance with Service Delivery Charter Standards', 85, 1, 1, 4, 100, 100, NULL, 1, '2022-03-14 10:02:17', '2022-03-14 10:27:01'),
(366, 33, 'Service improvement Innovations', 86, 1, 2, 2, 100, 100, NULL, 1, '2022-03-14 10:02:17', '2022-03-14 10:27:05'),
(367, 34, 'Competency development', 86, 1, 4, 2, 100, 100, NULL, 2, '2022-03-14 10:02:18', '2022-03-14 10:27:07'),
(368, 35, 'Corruption Prevention &Eradication', 87, 1, 1, 2, 100, 100, NULL, 1, '2022-03-14 10:02:18', '2022-03-14 10:27:08'),
(369, 36, 'Improve Employee wellness and work environment', 87, 1, 1, 1, 100, 100, NULL, 2, '2022-03-14 10:02:18', '2022-03-14 10:27:09'),
(370, 37, 'Implement court user survey recommendations', 87, 1, 1, 1, 100, 100, NULL, 3, '2022-03-14 10:02:18', '2022-03-14 10:27:10'),
(371, 1, 'Certified Urgent Applications - % of certified urgent applications concluded within 30 days from the date of certification', 88, 1, 1, 3, 90, NULL, NULL, 1, '2022-03-15 04:12:58', '2022-03-15 06:13:48'),
(372, 2, 'Injunction applications -% of injunction applications heard and determined within 90 days of filing', 88, 1, 1, 3, NULL, NULL, NULL, 2, '2022-03-15 04:12:58', '2022-03-15 04:12:58'),
(373, 3, 'All Other Applications -% of other applications heard and determined within 180 days of filing', 88, 1, 1, 3, NULL, NULL, NULL, 3, '2022-03-15 04:12:58', '2022-03-15 04:12:58'),
(374, 4, 'Hearing and determination of Criminal cases -% of cases concluded within 360 days of filing', 88, 1, 1, 7, NULL, NULL, NULL, 4, '2022-03-15 04:12:58', '2022-03-15 04:12:58'),
(375, 5, 'Hearing and determination of Civil cases -% of cases concluded within 360 days of filing', 88, 1, 1, 8, NULL, NULL, NULL, 5, '2022-03-15 04:12:58', '2022-03-15 04:12:58'),
(376, 6, 'Percentage of judgments/rulings delivered on the date first scheduled for delivery', 88, 1, 1, 3, NULL, NULL, NULL, 6, '2022-03-15 04:12:58', '2022-03-15 04:12:58'),
(377, 7, 'Delivery of Judgments & Rulings -% of judgments & rulings delivered within 60 days of conclusion of the hearing', 88, 1, 1, 3, NULL, NULL, NULL, 7, '2022-03-15 04:12:59', '2022-03-15 04:12:59'),
(378, 8, 'Applications in criminal matters -% of applications concluded within 90 days of filing', 88, 1, 1, 3, NULL, NULL, NULL, 8, '2022-03-15 04:12:59', '2022-03-15 04:12:59'),
(379, 9, 'Reduced no. of days spent in remand custody from the “Date of plea” to the “Date of first hearing” (where bail has been denied or where the remandees are unable to meet the bail terms)', 88, 3, 2, 3, NULL, NULL, NULL, 9, '2022-03-15 04:12:59', '2022-03-15 04:12:59'),
(380, 10, 'Case clearance rate for Criminal Cases', 88, 1, 1, 4, NULL, NULL, NULL, 10, '2022-03-15 04:12:59', '2022-03-15 04:12:59'),
(381, 11, 'Case clearance rate for Civil Cases', 88, 1, 1, 4, NULL, NULL, NULL, 11, '2022-03-15 04:12:59', '2022-03-15 04:12:59'),
(382, 12, 'Case Clearance Rate for Traffic Cases', 88, 2, 1, 3, NULL, NULL, NULL, 11, '2022-03-15 04:12:59', '2022-03-15 04:12:59'),
(383, 13, 'Percentage reduction of backlog', 88, 1, 1, 4, NULL, NULL, NULL, 13, '2022-03-15 04:12:59', '2022-03-15 04:12:59'),
(384, 14, 'Merit Productivity', 88, 1, 4, 6, NULL, NULL, NULL, 14, '2022-03-15 04:12:59', '2022-03-15 04:12:59'),
(385, 15, 'Other productivity', 88, 1, 4, 3, NULL, NULL, NULL, 15, '2022-03-15 04:12:59', '2022-03-15 04:12:59'),
(386, 16, 'Advance communication of adjournments of trials & hearings and date of judgment of delivery of judgments/rulings', 89, 1, 1, 2, NULL, NULL, NULL, 1, '2022-03-15 04:12:59', '2022-03-15 04:12:59'),
(387, 17, 'Percentage of trial/hearings held when first cause listed', 89, 1, 1, 2, NULL, NULL, NULL, 2, '2022-03-15 04:12:59', '2022-03-15 04:12:59'),
(388, 18, 'Percentage of pre-trial events held when first listed – mentions and supervision for compliance by parties in filing pleadings/exhibits', 89, 1, 1, 1, NULL, NULL, NULL, 3, '2022-03-15 04:12:59', '2022-03-15 04:12:59'),
(389, 19, 'Submission of Court proceedings for appealed Matters within 60 days from date of receipt of notice', 89, 1, 1, 2, NULL, NULL, NULL, 4, '2022-03-15 04:12:59', '2022-03-15 04:12:59'),
(390, 20, 'Adoption of Alternative Dispute Resolutions - % of Filed Cases referred for Alternative Dispute Resolution (ADR/CAM/AJS)', 89, 1, 1, 2, NULL, NULL, NULL, 5, '2022-03-15 04:12:59', '2022-03-15 04:12:59'),
(391, 21, 'Publish daily cause lists and posting on the notice board/online - seven days in advance', 89, 1, 1, 1, NULL, NULL, NULL, 6, '2022-03-15 04:13:00', '2022-03-15 04:13:00'),
(392, 22, 'Stakeholder Engagement', 89, 1, 1, 2, NULL, NULL, NULL, 7, '2022-03-15 04:13:00', '2022-03-15 04:13:00'),
(393, 23, 'Timely Submission of accurate monthly court returns', 89, 1, 1, 2, NULL, NULL, NULL, 8, '2022-03-15 04:13:00', '2022-03-15 04:13:00'),
(394, 24, 'Implement the Registry Manual procedures', 90, 1, 1, 3, NULL, NULL, NULL, 1, '2022-03-15 04:13:00', '2022-03-15 04:13:00'),
(395, 25, 'Maintain and update all registers', 90, 1, 1, 3, NULL, NULL, NULL, 2, '2022-03-15 04:13:00', '2022-03-15 04:13:00'),
(396, 26, 'Maintenance of asset and equipment register', 91, 1, 1, 1, NULL, NULL, NULL, 1, '2022-03-15 04:13:00', '2022-03-15 04:13:00'),
(397, 27, 'Supervision of construction (Where applicable)', 91, 1, 3, 1, NULL, NULL, NULL, 2, '2022-03-15 04:13:00', '2022-03-15 04:13:00'),
(398, 28, 'Disposal of idle assets (Where applicable)', 91, 1, 3, 1, NULL, NULL, NULL, 3, '2022-03-15 04:13:00', '2022-03-15 04:13:00'),
(399, 29, 'Compliance with the budget', 92, 1, 1, 1, NULL, NULL, NULL, 1, '2022-03-15 04:13:00', '2022-03-15 04:13:00'),
(400, 30, 'Revenue Management', 92, 1, 1, 2, NULL, NULL, NULL, 2, '2022-03-15 04:13:00', '2022-03-15 04:13:00'),
(401, 31, 'Implementation of Audit report recommendations.', 92, 1, 3, 2, NULL, NULL, NULL, 3, '2022-03-15 04:13:00', '2022-03-15 04:13:00'),
(402, 32, 'Compliance with Service Delivery Charter Standards', 93, 1, 1, 4, NULL, NULL, NULL, 1, '2022-03-15 04:13:00', '2022-03-15 04:13:00'),
(403, 33, 'Service improvement Innovations', 94, 1, 2, 2, NULL, NULL, NULL, 1, '2022-03-15 04:13:00', '2022-03-15 04:13:00'),
(404, 34, 'Competency development', 94, 1, 4, 2, NULL, NULL, NULL, 2, '2022-03-15 04:13:00', '2022-03-15 04:13:00'),
(405, 35, 'Corruption Prevention &Eradication', 95, 1, 1, 2, NULL, NULL, NULL, 1, '2022-03-15 04:13:01', '2022-03-15 04:13:01'),
(406, 36, 'Improve Employee wellness and work environment', 95, 1, 1, 1, NULL, NULL, NULL, 2, '2022-03-15 04:13:01', '2022-03-15 04:13:01'),
(407, 37, 'Implement court user survey recommendations', 95, 1, 1, 1, NULL, NULL, NULL, 3, '2022-03-15 04:13:01', '2022-03-15 04:13:01'),
(408, 1, 'Certified Urgent Applications - % of certified urgent applications concluded within 30 days from the date of certification', 96, 1, 1, 3, 78, 78, NULL, 1, '2022-03-16 09:17:48', '2022-03-16 09:23:29'),
(409, 2, 'Injunction applications -% of injunction applications heard and determined within 90 days of filing', 96, 1, 1, 3, 85, 78, NULL, 2, '2022-03-16 09:17:48', '2022-03-16 09:23:34'),
(410, 3, 'All Other Applications -% of other applications heard and determined within 180 days of filing', 96, 1, 1, 3, 96, 94, NULL, 3, '2022-03-16 09:17:48', '2022-03-16 09:23:39'),
(411, 4, 'Hearing and determination of Criminal cases -% of cases concluded within 360 days of filing', 96, 1, 1, 7, 100, 87, NULL, 4, '2022-03-16 09:17:48', '2022-03-16 09:23:44'),
(412, 5, 'Hearing and determination of Civil cases -% of cases concluded within 360 days of filing', 96, 1, 1, 8, 95, 91, NULL, 5, '2022-03-16 09:17:48', '2022-03-16 09:23:49'),
(413, 6, 'Percentage of judgments/rulings delivered on the date first scheduled for delivery', 96, 1, 1, 3, 88, 77, NULL, 6, '2022-03-16 09:17:49', '2022-03-16 09:24:29'),
(414, 7, 'Delivery of Judgments & Rulings -% of judgments & rulings delivered within 60 days of conclusion of the hearing', 96, 1, 1, 3, 95, 54, NULL, 7, '2022-03-16 09:17:49', '2022-03-16 09:24:32'),
(415, 8, 'Applications in criminal matters -% of applications concluded within 90 days of filing', 96, 1, 1, 3, 99, 100, NULL, 8, '2022-03-16 09:17:49', '2022-03-16 09:24:39'),
(416, 9, 'Reduced no. of days spent in remand custody from the “Date of plea” to the “Date of first hearing” (where bail has been denied or where the remandees are unable to meet the bail terms)', 96, 3, 2, 3, 50, 43, NULL, 9, '2022-03-16 09:17:49', '2022-03-16 09:25:26'),
(417, 10, 'Case clearance rate for Criminal Cases', 96, 1, 1, 4, 120, 110, NULL, 10, '2022-03-16 09:17:49', '2022-03-16 09:25:31'),
(418, 11, 'Case clearance rate for Civil Cases', 96, 1, 1, 4, 110, 100, NULL, 11, '2022-03-16 09:17:49', '2022-03-16 09:25:34'),
(419, 12, 'Case Clearance Rate for Traffic Cases', 96, 2, 1, 3, 105, 100, NULL, 11, '2022-03-16 09:17:49', '2022-03-16 09:25:37'),
(420, 13, 'Percentage reduction of backlog', 96, 1, 1, 4, 54, 35, NULL, 13, '2022-03-16 09:17:49', '2022-03-16 09:25:39'),
(421, 14, 'Merit Productivity', 96, 1, 4, 6, 3500, 2500, NULL, 14, '2022-03-16 09:17:49', '2022-03-16 09:25:43'),
(422, 15, 'Other productivity', 96, 1, 4, 3, 4000, 4000, NULL, 15, '2022-03-16 09:17:49', '2022-03-16 09:25:47'),
(423, 16, 'Advance communication of adjournments of trials & hearings and date of judgment of delivery of judgments/rulings', 97, 1, 1, 2, 100, 100, NULL, 1, '2022-03-16 09:17:49', '2022-03-16 09:25:51'),
(424, 17, 'Percentage of trial/hearings held when first cause listed', 97, 1, 1, 2, 100, 100, NULL, 2, '2022-03-16 09:17:49', '2022-03-16 09:25:52'),
(425, 18, 'Percentage of pre-trial events held when first listed – mentions and supervision for compliance by parties in filing pleadings/exhibits', 97, 1, 1, 1, 100, 100, NULL, 3, '2022-03-16 09:17:49', '2022-03-16 09:25:55'),
(426, 19, 'Submission of Court proceedings for appealed Matters within 60 days from date of receipt of notice', 97, 1, 1, 2, 100, 100, NULL, 4, '2022-03-16 09:17:49', '2022-03-16 09:25:54'),
(427, 20, 'Adoption of Alternative Dispute Resolutions - % of Filed Cases referred for Alternative Dispute Resolution (ADR/CAM/AJS)', 97, 1, 1, 2, 100, 100, NULL, 5, '2022-03-16 09:17:49', '2022-03-16 09:25:59'),
(428, 21, 'Publish daily cause lists and posting on the notice board/online - seven days in advance', 97, 1, 1, 1, 100, 100, NULL, 6, '2022-03-16 09:17:49', '2022-03-16 09:26:00'),
(429, 22, 'Stakeholder Engagement', 97, 1, 1, 2, 100, 100, NULL, 7, '2022-03-16 09:17:49', '2022-03-16 09:26:01'),
(430, 23, 'Timely Submission of accurate monthly court returns', 97, 1, 1, 2, 100, 100, NULL, 8, '2022-03-16 09:17:50', '2022-03-16 09:26:02'),
(431, 24, 'Implement the Registry Manual procedures', 98, 1, 1, 3, 100, 100, NULL, 1, '2022-03-16 09:17:50', '2022-03-16 09:26:03'),
(432, 25, 'Maintain and update all registers', 98, 1, 1, 3, 100, 100, NULL, 2, '2022-03-16 09:17:50', '2022-03-16 09:26:05'),
(433, 26, 'Maintenance of asset and equipment register', 99, 1, 1, 1, 100, 100, NULL, 1, '2022-03-16 09:17:50', '2022-03-16 09:26:05'),
(434, 27, 'Supervision of construction (Where applicable)', 99, 1, 3, 1, 100, 100, NULL, 2, '2022-03-16 09:17:50', '2022-03-16 09:26:06'),
(435, 28, 'Disposal of idle assets (Where applicable)', 99, 1, 3, 1, 100, 100, NULL, 3, '2022-03-16 09:17:50', '2022-03-16 09:26:08'),
(436, 29, 'Compliance with the budget', 100, 1, 1, 1, 100, 100, NULL, 1, '2022-03-16 09:17:50', '2022-03-16 09:26:09'),
(437, 30, 'Revenue Management', 100, 1, 1, 2, 100, 100, NULL, 2, '2022-03-16 09:17:50', '2022-03-16 09:26:10'),
(438, 31, 'Implementation of Audit report recommendations.', 100, 1, 3, 2, 100, 100, NULL, 3, '2022-03-16 09:17:50', '2022-03-16 09:26:13'),
(439, 32, 'Compliance with Service Delivery Charter Standards', 101, 1, 1, 4, 100, 100, NULL, 1, '2022-03-16 09:17:50', '2022-03-16 09:26:15'),
(440, 33, 'Service improvement Innovations', 102, 1, 2, 2, 100, 100, NULL, 1, '2022-03-16 09:17:50', '2022-03-16 09:26:18'),
(441, 34, 'Competency development', 102, 1, 4, 2, 100, 100, NULL, 2, '2022-03-16 09:17:50', '2022-03-16 09:26:19'),
(442, 35, 'Corruption Prevention &Eradication', 103, 1, 1, 2, 100, 82, NULL, 1, '2022-03-16 09:17:50', '2022-03-16 09:26:22'),
(443, 36, 'Improve Employee wellness and work environment', 103, 1, 1, 1, 100, 96, NULL, 2, '2022-03-16 09:17:50', '2022-03-16 09:26:25'),
(444, 37, 'Implement court user survey recommendations', 103, 1, 1, 1, 100, 78, NULL, 3, '2022-03-16 09:17:50', '2022-03-16 09:26:27');

-- --------------------------------------------------------

--
-- Table structure for table `indicator_groups`
--

CREATE TABLE `indicator_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unit_rank_id` bigint(20) UNSIGNED DEFAULT NULL,
  `financial_year_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `indicator_groups`
--

INSERT INTO `indicator_groups` (`id`, `name`, `description`, `order`, `unit_id`, `unit_rank_id`, `financial_year_id`, `created_at`, `updated_at`) VALUES
(8, 'A.1. Expeditious Delivery of Justice', 'Expeditious Delivery of Justice', 1, 19, 6, 4, '2022-02-28 11:59:41', '2022-02-28 11:59:41'),
(9, 'A.2. TRIAL AND DELIVERY DATE CERTAINTY', 'TRIAL AND DELIVERY DATE CERTAINTY', 2, 19, 6, 4, '2022-02-28 11:59:42', '2022-02-28 11:59:42'),
(10, 'A.3. Court files Integrity', 'Court files Integrity', 4, 19, 6, 4, '2022-02-28 11:59:42', '2022-02-28 11:59:42'),
(11, 'B.  COURT INFRASTRUCTURE', 'COURT INFRASTRUCTURE', 5, 19, 6, 4, '2022-02-28 11:59:42', '2022-02-28 11:59:42'),
(12, 'C. FINANCIAL PERSPECTIVE', 'FINANCIAL PERSPECTIVE', 6, 19, 6, 4, '2022-02-28 11:59:43', '2022-02-28 11:59:43'),
(13, 'D. CUSTOMER PERSPECTIVE', 'CUSTOMER PERSPECTIVE', 7, 19, 6, 4, '2022-02-28 11:59:43', '2022-02-28 11:59:43'),
(14, 'E. INNOVATION AND LEARNING', 'INNOVATION AND LEARNING', 8, 19, 6, 4, '2022-02-28 11:59:43', '2022-02-28 11:59:43'),
(15, 'F. INTERNAL PROCESSES', 'INTERNAL PROCESSES', 9, 19, 6, 4, '2022-02-28 11:59:43', '2022-02-28 11:59:43'),
(16, 'A.1. Expeditious Delivery of Justice', 'Expeditious Delivery of Justice', 1, 228, 6, 4, '2022-02-28 12:06:31', '2022-02-28 12:06:31'),
(17, 'A.2. TRIAL AND DELIVERY DATE CERTAINTY', 'TRIAL AND DELIVERY DATE CERTAINTY', 2, 228, 6, 4, '2022-02-28 12:06:32', '2022-02-28 12:06:32'),
(18, 'A.3. Court files Integrity', 'Court files Integrity', 4, 228, 6, 4, '2022-02-28 12:06:33', '2022-02-28 12:06:33'),
(19, 'B.  COURT INFRASTRUCTURE', 'COURT INFRASTRUCTURE', 5, 228, 6, 4, '2022-02-28 12:06:33', '2022-02-28 12:06:33'),
(20, 'C. FINANCIAL PERSPECTIVE', 'FINANCIAL PERSPECTIVE', 6, 228, 6, 4, '2022-02-28 12:06:33', '2022-02-28 12:06:33'),
(21, 'D. CUSTOMER PERSPECTIVE', 'CUSTOMER PERSPECTIVE', 7, 228, 6, 4, '2022-02-28 12:06:34', '2022-02-28 12:06:34'),
(22, 'E. INNOVATION AND LEARNING', 'INNOVATION AND LEARNING', 8, 228, 6, 4, '2022-02-28 12:06:34', '2022-02-28 12:06:34'),
(23, 'F. INTERNAL PROCESSES', 'INTERNAL PROCESSES', 9, 228, 6, 4, '2022-02-28 12:06:34', '2022-02-28 12:06:34'),
(24, 'A.1. Expeditious Delivery of Justice', 'Expeditious Delivery of Justice', 1, 1, 6, 4, '2022-03-01 05:19:14', '2022-03-01 05:19:14'),
(25, 'A.2. TRIAL AND DELIVERY DATE CERTAINTY', 'TRIAL AND DELIVERY DATE CERTAINTY', 2, 1, 6, 4, '2022-03-01 05:19:15', '2022-03-01 05:19:15'),
(26, 'A.3. Court files Integrity', 'Court files Integrity', 4, 1, 6, 4, '2022-03-01 05:19:15', '2022-03-01 05:19:15'),
(27, 'B.  COURT INFRASTRUCTURE', 'COURT INFRASTRUCTURE', 5, 1, 6, 4, '2022-03-01 05:19:16', '2022-03-01 05:19:16'),
(28, 'C. FINANCIAL PERSPECTIVE', 'FINANCIAL PERSPECTIVE', 6, 1, 6, 4, '2022-03-01 05:19:16', '2022-03-01 05:19:16'),
(29, 'D. CUSTOMER PERSPECTIVE', 'CUSTOMER PERSPECTIVE', 7, 1, 6, 4, '2022-03-01 05:19:16', '2022-03-01 05:19:16'),
(30, 'E. INNOVATION AND LEARNING', 'INNOVATION AND LEARNING', 8, 1, 6, 4, '2022-03-01 05:19:16', '2022-03-01 05:19:16'),
(31, 'F. INTERNAL PROCESSES', 'INTERNAL PROCESSES', 9, 1, 6, 4, '2022-03-01 05:19:16', '2022-03-01 05:19:16'),
(32, 'A.1. Expeditious Delivery of Justice', 'Expeditious Delivery of Justice', 1, 5, 6, 4, '2022-03-03 04:12:59', '2022-03-03 04:12:59'),
(33, 'A.2. TRIAL AND DELIVERY DATE CERTAINTY', 'TRIAL AND DELIVERY DATE CERTAINTY', 2, 5, 6, 4, '2022-03-03 04:13:01', '2022-03-03 04:13:01'),
(34, 'A.3. Court files Integrity', 'Court files Integrity', 4, 5, 6, 4, '2022-03-03 04:13:01', '2022-03-03 04:13:01'),
(35, 'B.  COURT INFRASTRUCTURE', 'COURT INFRASTRUCTURE', 5, 5, 6, 4, '2022-03-03 04:13:01', '2022-03-03 04:13:01'),
(36, 'C. FINANCIAL PERSPECTIVE', 'FINANCIAL PERSPECTIVE', 6, 5, 6, 4, '2022-03-03 04:13:01', '2022-03-03 04:13:01'),
(37, 'D. CUSTOMER PERSPECTIVE', 'CUSTOMER PERSPECTIVE', 7, 5, 6, 4, '2022-03-03 04:13:02', '2022-03-03 04:13:02'),
(38, 'E. INNOVATION AND LEARNING', 'INNOVATION AND LEARNING', 8, 5, 6, 4, '2022-03-03 04:13:02', '2022-03-03 04:13:02'),
(39, 'F. INTERNAL PROCESSES', 'INTERNAL PROCESSES', 9, 5, 6, 4, '2022-03-03 04:13:02', '2022-03-03 04:13:02'),
(40, 'A.1. Expeditious Delivery of Justice', 'Expeditious Delivery of Justice', 1, 52, 6, 4, '2022-03-03 04:27:45', '2022-03-03 04:27:45'),
(41, 'A.2. TRIAL AND DELIVERY DATE CERTAINTY', 'TRIAL AND DELIVERY DATE CERTAINTY', 2, 52, 6, 4, '2022-03-03 04:27:46', '2022-03-03 04:27:46'),
(42, 'A.3. Court files Integrity', 'Court files Integrity', 4, 52, 6, 4, '2022-03-03 04:27:46', '2022-03-03 04:27:46'),
(43, 'B.  COURT INFRASTRUCTURE', 'COURT INFRASTRUCTURE', 5, 52, 6, 4, '2022-03-03 04:27:46', '2022-03-03 04:27:46'),
(44, 'C. FINANCIAL PERSPECTIVE', 'FINANCIAL PERSPECTIVE', 6, 52, 6, 4, '2022-03-03 04:27:47', '2022-03-03 04:27:47'),
(45, 'D. CUSTOMER PERSPECTIVE', 'CUSTOMER PERSPECTIVE', 7, 52, 6, 4, '2022-03-03 04:27:47', '2022-03-03 04:27:47'),
(46, 'E. INNOVATION AND LEARNING', 'INNOVATION AND LEARNING', 8, 52, 6, 4, '2022-03-03 04:27:47', '2022-03-03 04:27:47'),
(47, 'F. INTERNAL PROCESSES', 'INTERNAL PROCESSES', 9, 52, 6, 4, '2022-03-03 04:27:47', '2022-03-03 04:27:47'),
(48, 'A.1. Expeditious Delivery of Justice', 'Expeditious Delivery of Justice', 1, 15, 6, 4, '2022-03-03 08:31:29', '2022-03-03 08:31:29'),
(49, 'A.2. TRIAL AND DELIVERY DATE CERTAINTY', 'TRIAL AND DELIVERY DATE CERTAINTY', 2, 15, 6, 4, '2022-03-03 08:31:30', '2022-03-03 08:31:30'),
(50, 'A.3. Court files Integrity', 'Court files Integrity', 4, 15, 6, 4, '2022-03-03 08:31:30', '2022-03-03 08:31:30'),
(51, 'B.  COURT INFRASTRUCTURE', 'COURT INFRASTRUCTURE', 5, 15, 6, 4, '2022-03-03 08:31:30', '2022-03-03 08:31:30'),
(52, 'C. FINANCIAL PERSPECTIVE', 'FINANCIAL PERSPECTIVE', 6, 15, 6, 4, '2022-03-03 08:31:30', '2022-03-03 08:31:30'),
(53, 'D. CUSTOMER PERSPECTIVE', 'CUSTOMER PERSPECTIVE', 7, 15, 6, 4, '2022-03-03 08:31:31', '2022-03-03 08:31:31'),
(54, 'E. INNOVATION AND LEARNING', 'INNOVATION AND LEARNING', 8, 15, 6, 4, '2022-03-03 08:31:31', '2022-03-03 08:31:31'),
(55, 'F. INTERNAL PROCESSES', 'INTERNAL PROCESSES', 9, 15, 6, 4, '2022-03-03 08:31:31', '2022-03-03 08:31:31'),
(56, 'A.1. Expeditious Delivery of Justice', 'Expeditious Delivery of Justice', 1, 162, 6, 4, '2022-03-03 10:08:06', '2022-03-03 10:08:06'),
(57, 'A.2. TRIAL AND DELIVERY DATE CERTAINTY', 'TRIAL AND DELIVERY DATE CERTAINTY', 2, 162, 6, 4, '2022-03-03 10:08:07', '2022-03-03 10:08:07'),
(58, 'A.3. Court files Integrity', 'Court files Integrity', 4, 162, 6, 4, '2022-03-03 10:08:08', '2022-03-03 10:08:08'),
(59, 'B.  COURT INFRASTRUCTURE', 'COURT INFRASTRUCTURE', 5, 162, 6, 4, '2022-03-03 10:08:08', '2022-03-03 10:08:08'),
(60, 'C. FINANCIAL PERSPECTIVE', 'FINANCIAL PERSPECTIVE', 6, 162, 6, 4, '2022-03-03 10:08:08', '2022-03-03 10:08:08'),
(61, 'D. CUSTOMER PERSPECTIVE', 'CUSTOMER PERSPECTIVE', 7, 162, 6, 4, '2022-03-03 10:08:08', '2022-03-03 10:08:08'),
(62, 'E. INNOVATION AND LEARNING', 'INNOVATION AND LEARNING', 8, 162, 6, 4, '2022-03-03 10:08:08', '2022-03-03 10:08:08'),
(63, 'F. INTERNAL PROCESSES', 'INTERNAL PROCESSES', 9, 162, 6, 4, '2022-03-03 10:08:08', '2022-03-03 10:08:08'),
(64, 'A.1. Expeditious Delivery of Justice', 'Expeditious Delivery of Justice', 1, 23, 6, 4, '2022-03-03 10:24:55', '2022-03-03 10:24:55'),
(65, 'A.2. TRIAL AND DELIVERY DATE CERTAINTY', 'TRIAL AND DELIVERY DATE CERTAINTY', 2, 23, 6, 4, '2022-03-03 10:24:56', '2022-03-03 10:24:56'),
(66, 'A.3. Court files Integrity', 'Court files Integrity', 4, 23, 6, 4, '2022-03-03 10:24:56', '2022-03-03 10:24:56'),
(67, 'B.  COURT INFRASTRUCTURE', 'COURT INFRASTRUCTURE', 5, 23, 6, 4, '2022-03-03 10:24:56', '2022-03-03 10:24:56'),
(68, 'C. FINANCIAL PERSPECTIVE', 'FINANCIAL PERSPECTIVE', 6, 23, 6, 4, '2022-03-03 10:24:57', '2022-03-03 10:24:57'),
(69, 'D. CUSTOMER PERSPECTIVE', 'CUSTOMER PERSPECTIVE', 7, 23, 6, 4, '2022-03-03 10:24:57', '2022-03-03 10:24:57'),
(70, 'E. INNOVATION AND LEARNING', 'INNOVATION AND LEARNING', 8, 23, 6, 4, '2022-03-03 10:24:57', '2022-03-03 10:24:57'),
(71, 'F. INTERNAL PROCESSES', 'INTERNAL PROCESSES', 9, 23, 6, 4, '2022-03-03 10:24:57', '2022-03-03 10:24:57'),
(72, 'A.1. Expeditious Delivery of Justice', 'Expeditious Delivery of Justice', 1, 119, 6, 4, '2022-03-14 04:21:15', '2022-03-14 04:21:15'),
(73, 'A.2. TRIAL AND DELIVERY DATE CERTAINTY', 'TRIAL AND DELIVERY DATE CERTAINTY', 2, 119, 6, 4, '2022-03-14 04:21:16', '2022-03-14 04:21:16'),
(74, 'A.3. Court files Integrity', 'Court files Integrity', 4, 119, 6, 4, '2022-03-14 04:21:17', '2022-03-14 04:21:17'),
(75, 'B.  COURT INFRASTRUCTURE', 'COURT INFRASTRUCTURE', 5, 119, 6, 4, '2022-03-14 04:21:17', '2022-03-14 04:21:17'),
(76, 'C. FINANCIAL PERSPECTIVE', 'FINANCIAL PERSPECTIVE', 6, 119, 6, 4, '2022-03-14 04:21:17', '2022-03-14 04:21:17'),
(77, 'D. CUSTOMER PERSPECTIVE', 'CUSTOMER PERSPECTIVE', 7, 119, 6, 4, '2022-03-14 04:21:17', '2022-03-14 04:21:17'),
(78, 'E. INNOVATION AND LEARNING', 'INNOVATION AND LEARNING', 8, 119, 6, 4, '2022-03-14 04:21:17', '2022-03-14 04:21:17'),
(79, 'F. INTERNAL PROCESSES', 'INTERNAL PROCESSES', 9, 119, 6, 4, '2022-03-14 04:21:18', '2022-03-14 04:21:18'),
(80, 'A.1. Expeditious Delivery of Justice', 'Expeditious Delivery of Justice', 1, 71, 6, 4, '2022-03-14 10:02:14', '2022-03-14 10:02:14'),
(81, 'A.2. TRIAL AND DELIVERY DATE CERTAINTY', 'TRIAL AND DELIVERY DATE CERTAINTY', 2, 71, 6, 4, '2022-03-14 10:02:16', '2022-03-14 10:02:16'),
(82, 'A.3. Court files Integrity', 'Court files Integrity', 4, 71, 6, 4, '2022-03-14 10:02:16', '2022-03-14 10:02:16'),
(83, 'B.  COURT INFRASTRUCTURE', 'COURT INFRASTRUCTURE', 5, 71, 6, 4, '2022-03-14 10:02:17', '2022-03-14 10:02:17'),
(84, 'C. FINANCIAL PERSPECTIVE', 'FINANCIAL PERSPECTIVE', 6, 71, 6, 4, '2022-03-14 10:02:17', '2022-03-14 10:02:17'),
(85, 'D. CUSTOMER PERSPECTIVE', 'CUSTOMER PERSPECTIVE', 7, 71, 6, 4, '2022-03-14 10:02:17', '2022-03-14 10:02:17'),
(86, 'E. INNOVATION AND LEARNING', 'INNOVATION AND LEARNING', 8, 71, 6, 4, '2022-03-14 10:02:17', '2022-03-14 10:02:17'),
(87, 'F. INTERNAL PROCESSES', 'INTERNAL PROCESSES', 9, 71, 6, 4, '2022-03-14 10:02:18', '2022-03-14 10:02:18'),
(88, 'A.1. Expeditious Delivery of Justice', 'Expeditious Delivery of Justice', 1, 218, 6, 4, '2022-03-15 04:12:58', '2022-03-15 04:12:58'),
(89, 'A.2. TRIAL AND DELIVERY DATE CERTAINTY', 'TRIAL AND DELIVERY DATE CERTAINTY', 2, 218, 6, 4, '2022-03-15 04:12:59', '2022-03-15 04:12:59'),
(90, 'A.3. Court files Integrity', 'Court files Integrity', 4, 218, 6, 4, '2022-03-15 04:13:00', '2022-03-15 04:13:00'),
(91, 'B.  COURT INFRASTRUCTURE', 'COURT INFRASTRUCTURE', 5, 218, 6, 4, '2022-03-15 04:13:00', '2022-03-15 04:13:00'),
(92, 'C. FINANCIAL PERSPECTIVE', 'FINANCIAL PERSPECTIVE', 6, 218, 6, 4, '2022-03-15 04:13:00', '2022-03-15 04:13:00'),
(93, 'D. CUSTOMER PERSPECTIVE', 'CUSTOMER PERSPECTIVE', 7, 218, 6, 4, '2022-03-15 04:13:00', '2022-03-15 04:13:00'),
(94, 'E. INNOVATION AND LEARNING', 'INNOVATION AND LEARNING', 8, 218, 6, 4, '2022-03-15 04:13:00', '2022-03-15 04:13:00'),
(95, 'F. INTERNAL PROCESSES', 'INTERNAL PROCESSES', 9, 218, 6, 4, '2022-03-15 04:13:00', '2022-03-15 04:13:00'),
(96, 'A.1. Expeditious Delivery of Justice', 'Expeditious Delivery of Justice', 1, 151, 6, 4, '2022-03-16 09:17:48', '2022-03-16 09:17:48'),
(97, 'A.2. TRIAL AND DELIVERY DATE CERTAINTY', 'TRIAL AND DELIVERY DATE CERTAINTY', 2, 151, 6, 4, '2022-03-16 09:17:49', '2022-03-16 09:17:49'),
(98, 'A.3. Court files Integrity', 'Court files Integrity', 4, 151, 6, 4, '2022-03-16 09:17:50', '2022-03-16 09:17:50'),
(99, 'B.  COURT INFRASTRUCTURE', 'COURT INFRASTRUCTURE', 5, 151, 6, 4, '2022-03-16 09:17:50', '2022-03-16 09:17:50'),
(100, 'C. FINANCIAL PERSPECTIVE', 'FINANCIAL PERSPECTIVE', 6, 151, 6, 4, '2022-03-16 09:17:50', '2022-03-16 09:17:50'),
(101, 'D. CUSTOMER PERSPECTIVE', 'CUSTOMER PERSPECTIVE', 7, 151, 6, 4, '2022-03-16 09:17:50', '2022-03-16 09:17:50'),
(102, 'E. INNOVATION AND LEARNING', 'INNOVATION AND LEARNING', 8, 151, 6, 4, '2022-03-16 09:17:50', '2022-03-16 09:17:50'),
(103, 'F. INTERNAL PROCESSES', 'INTERNAL PROCESSES', 9, 151, 6, 4, '2022-03-16 09:17:50', '2022-03-16 09:17:50');

-- --------------------------------------------------------

--
-- Table structure for table `indicator_types`
--

CREATE TABLE `indicator_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `indicator_types`
--

INSERT INTO `indicator_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Special ', NULL, NULL),
(2, 'Normal', NULL, NULL),
(3, 'Declining', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `indicator_unit_of_measures`
--

CREATE TABLE `indicator_unit_of_measures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `indicator_unit_of_measures`
--

INSERT INTO `indicator_unit_of_measures` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Percentage', NULL, NULL),
(2, 'No. of Days', NULL, NULL),
(3, 'Report', NULL, NULL),
(4, 'Number', NULL, NULL),
(5, 'Register', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_indicators`
--

CREATE TABLE `master_indicators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_rank_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL DEFAULT 100,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_indicators`
--

INSERT INTO `master_indicators` (`id`, `name`, `unit_rank_id`, `unit_id`, `created_at`, `updated_at`) VALUES
(1, 'Certified Urgent Applications - % of certified urgent applications concluded within 30 days from the date of certification', 6, 5, '2022-02-28 11:48:32', '2022-02-28 11:48:32'),
(2, 'Injunction applications -% of injunction applications heard and determined within 90 days of filing', 6, 5, '2022-02-28 11:48:32', '2022-02-28 11:48:32'),
(3, 'All Other Applications -% of other applications heard and determined within 180 days of filing', 6, 5, '2022-02-28 11:48:32', '2022-02-28 11:48:32'),
(4, 'Hearing and determination of Criminal cases -% of cases concluded within 360 days of filing', 6, 5, '2022-02-28 11:48:32', '2022-02-28 11:48:32'),
(5, 'Hearing and determination of Civil cases -% of cases concluded within 360 days of filing', 6, 5, '2022-02-28 11:48:32', '2022-02-28 11:48:32'),
(6, 'Percentage of judgments/rulings delivered on the date first scheduled for delivery', 6, 5, '2022-02-28 11:48:32', '2022-02-28 11:48:32'),
(7, 'Delivery of Judgments & Rulings -% of judgments & rulings delivered within 60 days of conclusion of the hearing', 6, 5, '2022-02-28 11:48:33', '2022-02-28 11:48:33'),
(8, 'Applications in criminal matters -% of applications concluded within 90 days of filing', 6, 5, '2022-02-28 11:48:33', '2022-02-28 11:48:33'),
(9, 'Reduced no. of days spent in remand custody from the “Date of plea” to the “Date of first hearing” (where bail has been denied or where the remandees are unable to meet the bail terms)', 6, 5, '2022-02-28 11:48:33', '2022-02-28 11:48:33'),
(10, 'Case clearance rate for Criminal Cases', 6, 5, '2022-02-28 11:48:33', '2022-02-28 11:48:33'),
(11, 'Case clearance rate for Civil Cases', 6, 5, '2022-02-28 11:48:33', '2022-02-28 11:48:33'),
(12, 'Case Clearance Rate for Traffic Cases', 6, 5, '2022-02-28 11:48:33', '2022-02-28 11:48:33'),
(13, 'Percentage reduction of backlog', 6, 5, '2022-02-28 11:48:33', '2022-02-28 11:48:33'),
(14, 'Merit Productivity', 6, 5, '2022-02-28 11:48:33', '2022-02-28 11:48:33'),
(15, 'Other productivity', 6, 5, '2022-02-28 11:48:33', '2022-02-28 11:48:33'),
(16, 'Advance communication of adjournments of trials & hearings and date of judgment of delivery of judgments/rulings', 6, 5, '2022-02-28 11:48:33', '2022-02-28 11:48:33'),
(17, 'Percentage of trial/hearings held when first cause listed', 6, 5, '2022-02-28 11:48:34', '2022-02-28 11:48:34'),
(18, 'Percentage of pre-trial events held when first listed – mentions and supervision for compliance by parties in filing pleadings/exhibits', 6, 5, '2022-02-28 11:48:34', '2022-02-28 11:48:34'),
(19, 'Submission of Court proceedings for appealed Matters within 60 days from date of receipt of notice', 6, 5, '2022-02-28 11:48:34', '2022-02-28 11:48:34'),
(20, 'Adoption of Alternative Dispute Resolutions - % of Filed Cases referred for Alternative Dispute Resolution (ADR/CAM/AJS)', 6, 5, '2022-02-28 11:48:35', '2022-02-28 11:48:35'),
(21, 'Publish daily cause lists and posting on the notice board/online - seven days in advance', 6, 5, '2022-02-28 11:48:35', '2022-02-28 11:48:35'),
(22, 'Stakeholder Engagement', 6, 5, '2022-02-28 11:48:35', '2022-02-28 11:48:35'),
(23, 'Timely Submission of accurate monthly court returns', 6, 5, '2022-02-28 11:48:35', '2022-02-28 11:48:35'),
(24, 'Implement the Registry Manual procedures', 6, 5, '2022-02-28 11:48:35', '2022-02-28 11:48:35'),
(25, 'Maintain and update all registers', 6, 5, '2022-02-28 11:48:35', '2022-02-28 11:48:35'),
(26, 'Maintenance of asset and equipment register', 6, 5, '2022-02-28 11:48:35', '2022-02-28 11:48:35'),
(27, 'Supervision of construction (Where applicable)', 6, 5, '2022-02-28 11:48:36', '2022-02-28 11:48:36'),
(28, 'Disposal of idle assets (Where applicable)', 6, 5, '2022-02-28 11:48:38', '2022-02-28 11:48:38'),
(29, 'Compliance with the budget', 6, 5, '2022-02-28 11:48:39', '2022-02-28 11:48:39'),
(30, 'Revenue Management', 6, 5, '2022-02-28 11:48:39', '2022-02-28 11:48:39'),
(31, 'Implementation of Audit report recommendations.', 6, 5, '2022-02-28 11:48:40', '2022-02-28 11:48:40'),
(32, 'Compliance with Service Delivery Charter Standards', 6, 5, '2022-02-28 11:48:40', '2022-02-28 11:48:40'),
(33, 'Service improvement Innovations', 6, 5, '2022-02-28 11:48:40', '2022-02-28 11:48:40'),
(34, 'Competency development', 6, 5, '2022-02-28 11:48:40', '2022-02-28 11:48:40'),
(35, 'Corruption Prevention & Eradication', 6, 5, '2022-02-28 11:48:40', '2022-02-28 11:48:40'),
(36, 'Improve Employee wellness and work environment', 6, 5, '2022-02-28 11:48:40', '2022-02-28 11:48:40'),
(37, 'Implement court user survey recommendations', 6, 5, '2022-02-28 11:48:40', '2022-02-28 11:48:40');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(150, '2014_10_12_100000_create_password_resets_table', 1),
(151, '2019_08_19_000000_create_failed_jobs_table', 1),
(152, '2022_02_11_150820_create_unit_ranks_table', 1),
(153, '2022_02_12_111506_create_units_table', 1),
(154, '2022_02_12_145949_create_financial_years_table', 1),
(155, '2022_02_12_170901_create_indicator_groups_table', 1),
(156, '2022_02_12_170917_create_indicator_types_table', 1),
(157, '2022_02_12_171809_create_indicators_table', 1),
(158, '2022_02_12_174704_create_indicator_unit_of_measures_table', 1),
(159, '2022_02_16_101124_create_master_indicators_table', 1),
(160, '2022_02_18_092354_create_template_indicators_table', 1),
(161, '2022_02_19_190435_create_template_indicator_groups_table', 1),
(162, '2022_02_24_115736_create_jobs_table', 1),
(164, '2014_10_12_000000_create_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `template_indicators`
--

CREATE TABLE `template_indicators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `master_indicator_id` int(11) NOT NULL DEFAULT 1,
  `name` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_rank_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `indicator_group_id` bigint(20) UNSIGNED NOT NULL,
  `indicator_type_id` bigint(20) UNSIGNED NOT NULL,
  `indicator_unit_of_measure_id` bigint(20) UNSIGNED NOT NULL,
  `indicator_weight` int(11) NOT NULL,
  `indicator_target` int(11) DEFAULT NULL,
  `indicator_achivement` int(11) DEFAULT NULL,
  `remarks` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `template_indicators`
--

INSERT INTO `template_indicators` (`id`, `master_indicator_id`, `name`, `unit_rank_id`, `unit_id`, `indicator_group_id`, `indicator_type_id`, `indicator_unit_of_measure_id`, `indicator_weight`, `indicator_target`, `indicator_achivement`, `remarks`, `order`, `created_at`, `updated_at`) VALUES
(1, 0, 'Hearing and determination of Presidential Election petitions within 14 days from date of filing', 1, 5, 2, 1, 2, 1, 5, 5, '5', 1, '2022-02-20 17:48:02', '2022-02-20 17:48:15'),
(2, 0, 'Delivery of full judgments within 21 days (where the court reserves reasons for its decisions)', 1, 5, 2, 2, 2, 10, 5, 5, '5', 2, '2022-02-20 17:48:54', '2022-02-20 17:50:59'),
(3, 0, 'Hearing and determination of general applications -% of cases concluded within 60 days from date of close of hearing', 1, 5, 2, 1, 1, 10, 5, 5, '5', 3, '2022-02-20 17:50:47', '2022-02-20 17:51:10'),
(4, 0, 'Advisory opinion -% of references concluded within 90 days from the close of hearing', 1, 5, 2, 1, 1, 10, 5, 5, '5', 4, '2022-02-20 17:51:44', '2022-02-20 17:51:50'),
(5, 0, 'Hearing and determination of appeals from the Court of Appeal-% of appeals concluded within 90 days from close of hearing', 1, 5, 2, 1, 1, 15, 5, 5, '5', 5, '2022-02-20 17:52:43', '2022-02-20 17:53:54'),
(6, 0, 'Time for dissemination of all decisions -% of decisions disseminated within 7days from date of delivery', 1, 5, 2, 1, 1, 10, 5, 5, '5', 6, '2022-02-20 17:54:49', '2022-02-20 17:54:49'),
(7, 0, 'Improve Access to justice', 1, 5, 2, 1, 1, 5, 5, 5, '5', 7, '2022-02-20 17:55:43', '2022-02-20 17:55:48'),
(8, 0, 'Percentage of trials held when first listed for hearing', 1, 5, 3, 2, 1, 5, 5, 5, '5', 1, '2022-02-20 17:57:36', '2022-02-20 17:57:36'),
(9, 0, 'Percentage of judgment/ rulings delivered on the date when first scheduled for delivery', 1, 5, 3, 1, 1, 5, 5, 5, '5', 2, '2022-02-20 17:59:38', '2022-02-20 17:59:38'),
(10, 0, 'Advance communication of adjournment of hearings dates and delivery of Judgment', 1, 5, 3, 1, 1, 5, 5, 5, '5', 3, '2022-02-20 18:00:04', '2022-02-20 18:00:04'),
(11, 0, 'Percentage of Judgment/ rulings rendered within 90 days after close of submission', 1, 5, 3, 2, 1, 5, 5, 5, '5', 4, '2022-02-20 18:00:54', '2022-02-20 18:00:54'),
(12, 0, 'Publishing of daily cause lists', 1, 5, 3, 2, 1, 5, 5, 5, '5', 5, '2022-02-20 18:01:36', '2022-02-20 18:01:36'),
(13, 0, 'Case clearance rate', 1, 5, 4, 1, 1, 5, 5, 5, '5', 1, '2022-02-20 18:02:12', '2022-02-20 18:02:18'),
(14, 0, 'Percentage reduction of backlog', 1, 5, 5, 1, 1, 5, 5, 5, '5', 1, '2022-02-20 18:02:54', '2022-02-20 18:02:54'),
(15, 0, 'Merit  Productivity', 1, 5, 7, 2, 4, 3, 5, 5, '5', 1, '2022-02-20 18:05:45', '2022-02-20 18:06:37'),
(16, 0, 'Other Productivity', 1, 5, 7, 2, 4, 2, 5, 5, '5', 2, '2022-02-20 18:06:31', '2022-02-20 18:06:31'),
(17, 0, 'Submission of accurate  monthly  court returns', 1, 5, 6, 1, 1, 5, 5, 5, '5', 1, '2022-02-20 18:07:37', '2022-02-20 18:07:37'),
(18, 1, 'Certified Urgent Applications - % of certified urgent applications concluded within 30 days from the date of certification', 6, NULL, 8, 1, 1, 3, NULL, NULL, NULL, 1, '2022-02-24 04:43:07', '2022-02-28 10:13:15'),
(19, 2, 'Injunction applications -% of injunction applications heard and determined within 90 days of filing', 6, NULL, 8, 1, 1, 3, NULL, NULL, NULL, 2, '2022-02-24 04:43:54', '2022-02-28 10:14:18'),
(20, 3, 'All Other Applications -% of other applications heard and determined within 180 days of filing', 6, NULL, 8, 1, 1, 3, NULL, NULL, NULL, 3, '2022-02-24 04:45:06', '2022-02-28 10:15:04'),
(21, 4, 'Hearing and determination of Criminal cases -% of cases concluded within 360 days of filing', 6, NULL, 8, 1, 1, 7, NULL, NULL, NULL, 4, '2022-02-24 04:45:56', '2022-02-28 10:24:12'),
(22, 5, 'Hearing and determination of Civil cases -% of cases concluded within 360 days of filing', 6, NULL, 8, 1, 1, 8, NULL, NULL, NULL, 5, '2022-02-24 04:46:40', '2022-02-28 10:24:29'),
(23, 6, 'Percentage of judgments/rulings delivered on the date first scheduled for delivery', 6, NULL, 8, 1, 1, 3, NULL, NULL, NULL, 6, '2022-02-24 04:47:38', '2022-02-28 10:25:01'),
(24, 7, 'Delivery of Judgments & Rulings -% of judgments & rulings delivered within 60 days of conclusion of the hearing', 6, NULL, 8, 1, 1, 3, NULL, NULL, NULL, 7, '2022-02-24 04:48:48', '2022-02-28 10:25:39'),
(25, 8, 'Applications in criminal matters -% of applications concluded within 90 days of filing', 6, NULL, 8, 1, 1, 3, NULL, NULL, NULL, 8, '2022-02-24 04:49:57', '2022-02-28 10:25:49'),
(26, 9, 'Reduced no. of days spent in remand custody from the “Date of plea” to the “Date of first hearing” (where bail has been denied or where the remandees are unable to meet the bail terms)', 6, NULL, 8, 3, 2, 3, NULL, NULL, NULL, 9, '2022-02-24 04:52:58', '2022-02-28 10:26:01'),
(27, 10, 'Case clearance rate for Criminal Cases', 6, NULL, 8, 1, 1, 4, NULL, NULL, NULL, 10, '2022-02-24 04:54:58', '2022-02-28 10:26:11'),
(28, 11, 'Case clearance rate for Civil Cases', 6, NULL, 8, 1, 1, 4, NULL, NULL, NULL, 11, '2022-02-24 04:56:04', '2022-02-28 10:26:18'),
(29, 12, 'Case Clearance Rate for Traffic Cases', 6, NULL, 8, 2, 1, 3, NULL, NULL, NULL, 11, '2022-02-24 04:56:37', '2022-02-28 10:27:14'),
(30, 13, 'Percentage reduction of backlog', 6, NULL, 8, 1, 1, 4, NULL, NULL, NULL, 13, '2022-02-24 04:57:18', '2022-02-28 10:27:27'),
(31, 14, 'Merit Productivity', 6, NULL, 8, 1, 4, 6, NULL, NULL, NULL, 14, '2022-02-24 04:58:09', '2022-02-28 10:27:47'),
(32, 15, 'Other productivity', 6, NULL, 8, 1, 4, 3, NULL, NULL, NULL, 15, '2022-02-24 04:58:41', '2022-02-28 10:27:57'),
(33, 16, 'Advance communication of adjournments of trials & hearings and date of judgment of delivery of judgments/rulings', 6, NULL, 9, 1, 1, 2, NULL, NULL, NULL, 1, '2022-02-24 05:01:36', '2022-02-28 10:28:25'),
(34, 17, 'Percentage of trial/hearings held when first cause listed', 6, NULL, 9, 1, 1, 2, NULL, NULL, NULL, 2, '2022-02-24 05:06:56', '2022-02-28 10:28:38'),
(35, 18, 'Percentage of pre-trial events held when first listed – mentions and supervision for compliance by parties in filing pleadings/exhibits', 6, NULL, 9, 1, 1, 1, NULL, NULL, NULL, 3, '2022-02-24 05:07:24', '2022-02-28 10:29:25'),
(36, 19, 'Submission of Court proceedings for appealed Matters within 60 days from date of receipt of notice', 6, NULL, 9, 1, 1, 2, NULL, NULL, NULL, 4, '2022-02-24 05:10:56', '2022-02-28 10:29:59'),
(37, 20, 'Adoption of Alternative Dispute Resolutions - % of Filed Cases referred for Alternative Dispute Resolution (ADR/CAM/AJS)', 6, NULL, 9, 1, 1, 2, NULL, NULL, NULL, 5, '2022-02-24 05:11:44', '2022-02-28 10:30:18'),
(38, 21, 'Publish daily cause lists and posting on the notice board/online - seven days in advance', 6, NULL, 9, 1, 1, 1, NULL, NULL, NULL, 6, '2022-02-24 05:13:26', '2022-02-28 10:30:46'),
(39, 22, 'Stakeholder Engagement', 6, NULL, 9, 1, 1, 2, NULL, NULL, NULL, 7, '2022-02-24 05:13:59', '2022-02-28 10:31:07'),
(40, 23, 'Timely Submission of accurate monthly court returns', 6, NULL, 9, 1, 1, 2, NULL, NULL, NULL, 8, '2022-02-24 05:14:38', '2022-02-28 10:31:19'),
(41, 24, 'Implement the Registry Manual procedures', 6, NULL, 10, 1, 1, 3, NULL, NULL, NULL, 1, '2022-02-24 06:00:38', '2022-02-28 10:31:48'),
(42, 25, 'Maintain and update all registers', 6, NULL, 10, 1, 1, 3, NULL, NULL, NULL, 2, '2022-02-24 06:05:40', '2022-02-28 10:32:03'),
(43, 26, 'Maintenance of asset and equipment register', 6, NULL, 11, 1, 1, 1, NULL, NULL, NULL, 1, '2022-02-24 06:18:05', '2022-02-28 10:32:40'),
(44, 27, 'Supervision of construction (Where applicable)', 6, NULL, 11, 1, 3, 1, NULL, NULL, NULL, 2, '2022-02-24 06:18:48', '2022-02-28 10:32:48'),
(45, 28, 'Disposal of idle assets (Where applicable)', 6, NULL, 11, 1, 3, 1, NULL, NULL, NULL, 3, '2022-02-24 06:19:38', '2022-02-28 10:33:06'),
(46, 29, 'Compliance with the budget', 6, NULL, 12, 1, 1, 1, NULL, NULL, NULL, 1, '2022-02-24 06:22:44', '2022-02-28 10:34:12'),
(47, 30, 'Revenue Management', 6, NULL, 12, 1, 1, 2, NULL, NULL, NULL, 2, '2022-02-24 06:24:18', '2022-02-28 10:34:19'),
(48, 31, 'Implementation of Audit report recommendations.', 6, NULL, 12, 1, 3, 2, NULL, NULL, NULL, 3, '2022-02-24 06:24:53', '2022-02-28 10:34:29'),
(49, 32, 'Compliance with Service Delivery Charter Standards', 6, NULL, 13, 1, 1, 4, NULL, NULL, NULL, 1, '2022-02-24 06:26:44', '2022-02-28 10:34:44'),
(50, 33, 'Service improvement Innovations', 6, NULL, 14, 1, 2, 2, NULL, NULL, NULL, 1, '2022-02-24 06:27:59', '2022-02-28 10:35:28'),
(51, 34, 'Competency development', 6, NULL, 14, 1, 4, 2, NULL, NULL, NULL, 2, '2022-02-24 06:28:32', '2022-02-28 10:35:34'),
(52, 35, 'Corruption Prevention &Eradication', 6, NULL, 15, 1, 1, 2, NULL, NULL, NULL, 1, '2022-02-24 06:29:45', '2022-02-28 10:36:24'),
(53, 36, 'Improve Employee wellness and work environment', 6, NULL, 15, 1, 1, 1, NULL, NULL, NULL, 2, '2022-02-24 06:30:11', '2022-02-28 10:36:33'),
(54, 37, 'Implement court user survey recommendations', 6, NULL, 15, 1, 1, 1, NULL, NULL, NULL, 3, '2022-02-24 06:30:44', '2022-02-28 10:36:45');

-- --------------------------------------------------------

--
-- Table structure for table `template_indicator_groups`
--

CREATE TABLE `template_indicator_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unit_rank_id` bigint(20) UNSIGNED NOT NULL,
  `financial_year_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `template_indicator_groups`
--

INSERT INTO `template_indicator_groups` (`id`, `name`, `description`, `order`, `unit_id`, `unit_rank_id`, `financial_year_id`, `created_at`, `updated_at`) VALUES
(2, 'A . EXPEDITIOUS DISPOSAL OF CASES', 'A . EXPEDITIOUS DISPOSAL OF CASES', 1, 5, 1, 4, '2022-02-20 14:18:43', '2022-02-20 14:18:43'),
(3, 'B. TRIAL AND DELIVERY DATE CERTAINTY', 'B. TRIAL AND DELIVERY DATE CERTAINTY', 2, 5, 1, 4, '2022-02-20 16:59:10', '2022-02-20 16:59:10'),
(4, 'C. CASE CLEARANCE RATE', 'C. CASE CLEARANCE RATE', 3, 5, 1, 4, '2022-02-20 17:00:05', '2022-02-20 18:37:03'),
(5, 'D. CASE BACKLOG', 'D. CASE BACKLOG', 4, 5, 1, 4, '2022-02-20 17:08:49', '2022-02-20 17:08:56'),
(6, 'F. MONTHLY COURTS RETURNS', 'E. MONTHLY COURTS RETURNS', 6, 5, 1, 4, '2022-02-20 17:09:23', '2022-02-20 18:04:38'),
(7, 'E. COURT PRODUCTIVITY', 'E. COURT PRODUCTIVITY', 5, 5, 1, 4, '2022-02-20 18:03:55', '2022-02-20 18:04:55'),
(8, 'A.1. Expeditious Delivery of Justice', 'Expeditious Delivery of Justice', 1, 5, 6, 4, '2022-02-24 04:40:45', '2022-02-24 04:40:45'),
(9, 'A.2. TRIAL AND DELIVERY DATE CERTAINTY', 'TRIAL AND DELIVERY DATE CERTAINTY', 2, 5, 6, 4, '2022-02-24 05:00:49', '2022-02-24 05:00:49'),
(10, 'A.3. Court files Integrity', 'Court files Integrity', 4, 5, 6, 4, '2022-02-24 05:59:49', '2022-02-24 05:59:49'),
(11, 'B.  COURT INFRASTRUCTURE', 'COURT INFRASTRUCTURE', 5, 5, 6, 4, '2022-02-24 06:06:40', '2022-02-24 06:06:48'),
(12, 'C. FINANCIAL PERSPECTIVE', 'FINANCIAL PERSPECTIVE', 6, 5, 6, 4, '2022-02-24 06:20:53', '2022-02-24 06:20:58'),
(13, 'D. CUSTOMER PERSPECTIVE', 'CUSTOMER PERSPECTIVE', 7, 5, 6, 4, '2022-02-24 06:26:00', '2022-02-24 06:26:07'),
(14, 'E. INNOVATION AND LEARNING', 'INNOVATION AND LEARNING', 8, 5, 6, 4, '2022-02-24 06:27:14', '2022-02-24 06:27:14'),
(15, 'F. INTERNAL PROCESSES', 'INTERNAL PROCESSES', 9, 5, 6, 4, '2022-02-24 06:29:12', '2022-02-24 06:29:12');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_rank_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `unit_rank_id`, `created_at`, `updated_at`) VALUES
(1, 'Narok Magistrate\'s Court', 6, '2022-02-28 11:47:41', '2022-02-28 11:47:41'),
(2, 'Narok High Court', 3, '2022-02-28 11:47:41', '2022-02-28 11:47:41'),
(3, 'Narok ELC', 4, '2022-02-28 11:47:41', '2022-02-28 11:47:41'),
(4, 'Bomet High Court', 3, '2022-02-28 11:47:41', '2022-02-28 11:47:41'),
(5, 'Bomet Magistrates\' Court', 6, '2022-02-28 11:47:42', '2022-02-28 11:47:42'),
(6, 'Sotik Magistrate Court', 6, '2022-02-28 11:47:42', '2022-02-28 11:47:42'),
(7, 'Kericho Magistrate\'s', 6, '2022-02-28 11:47:42', '2022-02-28 11:47:42'),
(8, 'Kericho Kadhis Court', 7, '2022-02-28 11:47:42', '2022-02-28 11:47:42'),
(9, 'Kericho High Court', 3, '2022-02-28 11:47:42', '2022-02-28 11:47:42'),
(10, 'Kericho ELC', 4, '2022-02-28 11:47:42', '2022-02-28 11:47:42'),
(11, 'Kericho ELRC', 5, '2022-02-28 11:47:43', '2022-02-28 11:47:43'),
(12, 'Kisii Magistrates’ Court', 6, '2022-02-28 11:47:43', '2022-02-28 11:47:43'),
(13, 'Kisii High Court', 3, '2022-02-28 11:47:43', '2022-02-28 11:47:43'),
(14, 'Kisii ELC', 4, '2022-02-28 11:47:43', '2022-02-28 11:47:43'),
(15, 'Keroka Magistrate\'s Court', 6, '2022-02-28 11:47:43', '2022-02-28 11:47:43'),
(16, 'Nyamira Magistrates’ Court', 6, '2022-02-28 11:47:43', '2022-02-28 11:47:43'),
(17, 'Nyamira High Court', 3, '2022-02-28 11:47:43', '2022-02-28 11:47:43'),
(18, 'Nyamira ELC', 4, '2022-02-28 11:47:44', '2022-02-28 11:47:44'),
(19, 'Ogembo Magistrates’ Court', 6, '2022-02-28 11:47:44', '2022-02-28 11:47:44'),
(20, 'Kilgoris Magistrates’ Court', 6, '2022-02-28 11:47:44', '2022-02-28 11:47:44'),
(21, 'Kilgoris ELC', 4, '2022-02-28 11:47:44', '2022-02-28 11:47:44'),
(22, 'Oyugis Magistrates’ Court', 6, '2022-02-28 11:47:44', '2022-02-28 11:47:44'),
(23, 'Rongo Magistrates’ Court', 6, '2022-02-28 11:47:45', '2022-02-28 11:47:45'),
(24, 'Kehancha Magistrates’ Court', 6, '2022-02-28 11:47:45', '2022-02-28 11:47:45'),
(25, 'Migori Kadhis’ Court', 7, '2022-02-28 11:47:45', '2022-02-28 11:47:45'),
(26, 'Migori Magistrates’ Court', 6, '2022-02-28 11:47:45', '2022-02-28 11:47:45'),
(27, 'Migori High Court', 3, '2022-02-28 11:47:45', '2022-02-28 11:47:45'),
(28, 'Migori ELC', 4, '2022-02-28 11:47:45', '2022-02-28 11:47:45'),
(29, 'Ndhiwa Magistrates’ Court', 6, '2022-02-28 11:47:45', '2022-02-28 11:47:45'),
(30, 'Mbita Magistrates’ Court', 6, '2022-02-28 11:47:45', '2022-02-28 11:47:45'),
(31, 'Homabay Kadhis’ Court', 7, '2022-02-28 11:47:45', '2022-02-28 11:47:45'),
(32, 'Homabay Magistrates’ Court', 6, '2022-02-28 11:47:45', '2022-02-28 11:47:45'),
(33, 'Homabay High Court', 3, '2022-02-28 11:47:45', '2022-02-28 11:47:45'),
(34, 'Siaya Magistrates’ Court', 6, '2022-02-28 11:47:45', '2022-02-28 11:47:45'),
(35, 'Siaya High Court', 3, '2022-02-28 11:47:46', '2022-02-28 11:47:46'),
(36, 'Siaya ELC', 4, '2022-02-28 11:47:46', '2022-02-28 11:47:46'),
(37, 'Bondo Magistrates’ Court', 6, '2022-02-28 11:47:46', '2022-02-28 11:47:46'),
(38, 'Ukwala magistrates’ Court', 6, '2022-02-28 11:47:46', '2022-02-28 11:47:46'),
(39, 'Busia Magistrates’ Court', 6, '2022-02-28 11:47:46', '2022-02-28 11:47:46'),
(40, 'Busia Kadhis’ Court', 7, '2022-02-28 11:47:46', '2022-02-28 11:47:46'),
(41, 'Busia ELC', 4, '2022-02-28 11:47:46', '2022-02-28 11:47:46'),
(42, 'Busia High Court', 3, '2022-02-28 11:47:46', '2022-02-28 11:47:46'),
(43, 'Butere Magistrates’ Court', 6, '2022-02-28 11:47:46', '2022-02-28 11:47:46'),
(44, 'Mumias Magistrates’ Court', 6, '2022-02-28 11:47:46', '2022-02-28 11:47:46'),
(45, 'Butali Magistrates’ Court', 6, '2022-02-28 11:47:46', '2022-02-28 11:47:46'),
(46, 'Kakamega Magistrates’ Court', 6, '2022-02-28 11:47:46', '2022-02-28 11:47:46'),
(47, 'Kakamega High Court', 3, '2022-02-28 11:47:47', '2022-02-28 11:47:47'),
(48, 'Kakamega ELC Court', 4, '2022-02-28 11:47:47', '2022-02-28 11:47:47'),
(49, 'Kakamega Kadhis’ Court', 7, '2022-02-28 11:47:47', '2022-02-28 11:47:47'),
(50, 'Hamisi Magistrates’ Court', 6, '2022-02-28 11:47:47', '2022-02-28 11:47:47'),
(51, 'Vihiga Kadhis’ Court', 7, '2022-02-28 11:47:47', '2022-02-28 11:47:47'),
(52, 'Vihiga Magistrates’ Court', 6, '2022-02-28 11:47:47', '2022-02-28 11:47:47'),
(53, 'Vihiga ELC', 4, '2022-02-28 11:47:47', '2022-02-28 11:47:47'),
(54, 'Vihiga High Court', 3, '2022-02-28 11:47:47', '2022-02-28 11:47:47'),
(55, 'Tamu Magistrates’ Court', 6, '2022-02-28 11:47:48', '2022-02-28 11:47:48'),
(56, 'Nyando Magistrates’ Court', 6, '2022-02-28 11:47:48', '2022-02-28 11:47:48'),
(57, 'Winam Magistrates\' Court', 6, '2022-02-28 11:47:48', '2022-02-28 11:47:48'),
(58, 'Maseno Magistrates’ Court', 6, '2022-02-28 11:47:48', '2022-02-28 11:47:48'),
(59, 'Kisumu Magistrates’', 6, '2022-02-28 11:47:48', '2022-02-28 11:47:48'),
(60, 'Kisumu ELC', 4, '2022-02-28 11:47:48', '2022-02-28 11:47:48'),
(61, 'Kisumu High Court', 3, '2022-02-28 11:47:48', '2022-02-28 11:47:48'),
(62, 'Kisumu Court of Appeal', 2, '2022-02-28 11:47:48', '2022-02-28 11:47:48'),
(63, 'Kisumu Kadhis’ Court', 7, '2022-02-28 11:47:48', '2022-02-28 11:47:48'),
(64, 'Kisumu ELRC', 5, '2022-02-28 11:47:49', '2022-02-28 11:47:49'),
(65, 'Naivasha High Court', 3, '2022-02-28 11:47:49', '2022-02-28 11:47:49'),
(66, 'Naivasha Magistrates Court', 6, '2022-02-28 11:47:49', '2022-02-28 11:47:49'),
(67, 'Engineer Magistrates Court', 6, '2022-02-28 11:47:49', '2022-02-28 11:47:49'),
(68, 'Limuru Magistrate Court', 6, '2022-02-28 11:47:49', '2022-02-28 11:47:49'),
(69, 'Kakuma Magistrates’ Court', 6, '2022-02-28 11:47:49', '2022-02-28 11:47:49'),
(70, 'Kakuma Kadhis’ Court', 7, '2022-02-28 11:47:49', '2022-02-28 11:47:49'),
(71, 'Lodwar Magistrates’ Court', 6, '2022-02-28 11:47:49', '2022-02-28 11:47:49'),
(72, 'Lodwar High Court', 3, '2022-02-28 11:47:50', '2022-02-28 11:47:50'),
(73, 'Kitale Magistrates’ Court', 6, '2022-02-28 11:47:50', '2022-02-28 11:47:50'),
(74, 'Kitale High Court', 3, '2022-02-28 11:47:50', '2022-02-28 11:47:50'),
(75, 'Kitale ELC', 4, '2022-02-28 11:47:50', '2022-02-28 11:47:50'),
(76, 'Kapenguria Magistrates’ Court', 6, '2022-02-28 11:47:50', '2022-02-28 11:47:50'),
(77, 'Kapenguria High Court', 3, '2022-02-28 11:47:50', '2022-02-28 11:47:50'),
(78, 'Kimilili Magistrates’ Court', 6, '2022-02-28 11:47:50', '2022-02-28 11:47:50'),
(79, 'Sirisia Magistrates’ Court', 6, '2022-02-28 11:47:50', '2022-02-28 11:47:50'),
(80, 'Webuye Magistrates Court', 6, '2022-02-28 11:47:51', '2022-02-28 11:47:51'),
(81, 'Bungoma ELC', 4, '2022-02-28 11:47:51', '2022-02-28 11:47:51'),
(82, 'Bungoma Magistrate\'s Court', 6, '2022-02-28 11:47:52', '2022-02-28 11:47:52'),
(83, 'Bungoma High Court', 3, '2022-02-28 11:47:53', '2022-02-28 11:47:53'),
(84, 'Bungoma Kadhis Court', 7, '2022-02-28 11:47:53', '2022-02-28 11:47:53'),
(85, 'Iten Magistrates’ Court', 6, '2022-02-28 11:47:53', '2022-02-28 11:47:53'),
(86, 'Eldoret Kadhis’ Court', 7, '2022-02-28 11:47:53', '2022-02-28 11:47:53'),
(87, 'Eldoret Magistrates’ Court', 6, '2022-02-28 11:47:53', '2022-02-28 11:47:53'),
(88, 'Eldoret ELRC', 5, '2022-02-28 11:47:53', '2022-02-28 11:47:53'),
(89, 'Eldoret High Court', 3, '2022-02-28 11:47:53', '2022-02-28 11:47:53'),
(90, 'Eldoret ELC', 4, '2022-02-28 11:47:54', '2022-02-28 11:47:54'),
(91, 'Kapsabet Magistrates’ Court', 6, '2022-02-28 11:47:54', '2022-02-28 11:47:54'),
(92, 'Garbatulla Kadhi', 7, '2022-02-28 11:47:54', '2022-02-28 11:47:54'),
(93, 'Merti Kadhi', 7, '2022-02-28 11:47:54', '2022-02-28 11:47:54'),
(94, 'Garbatulla Kadhi CA', 7, '2022-02-28 11:47:54', '2022-02-28 11:47:54'),
(95, 'Merti Kadhi CA', 7, '2022-02-28 11:47:54', '2022-02-28 11:47:54'),
(96, 'Kapsabet ELC', 4, '2022-02-28 11:47:54', '2022-02-28 11:47:54'),
(97, 'Kabarnet Magistrate\'s Court', 6, '2022-02-28 11:47:55', '2022-02-28 11:47:55'),
(98, 'Kabarnet High Court', 3, '2022-02-28 11:47:55', '2022-02-28 11:47:55'),
(99, 'Eldama Ravine Magistrate\'s Court', 6, '2022-02-28 11:47:55', '2022-02-28 11:47:55'),
(100, 'Molo Magistrates’ Court', 6, '2022-02-28 11:47:55', '2022-02-28 11:47:55'),
(101, 'Nakuru Magistrate\'s Court', 6, '2022-02-28 11:47:55', '2022-02-28 11:47:55'),
(102, 'Nakuru ELC', 4, '2022-02-28 11:47:55', '2022-02-28 11:47:55'),
(103, 'Nakuru Kadhis Court', 7, '2022-02-28 11:47:55', '2022-02-28 11:47:55'),
(104, 'Nakuru ELRC', 5, '2022-02-28 11:47:55', '2022-02-28 11:47:55'),
(105, 'Nakuru High Court', 3, '2022-02-28 11:47:55', '2022-02-28 11:47:55'),
(106, 'Isiolo Magistrates’ Court', 6, '2022-02-28 11:47:55', '2022-02-28 11:47:55'),
(107, 'Isiolo Kadhis’ Court', 7, '2022-02-28 11:47:56', '2022-02-28 11:47:56'),
(108, 'Garbatulla Kadhis’ Court', 7, '2022-02-28 11:47:56', '2022-02-28 11:47:56'),
(109, 'Merti Kadhis’ Court', 7, '2022-02-28 11:47:56', '2022-02-28 11:47:56'),
(110, 'Meru Magistrates’ Court', 6, '2022-02-28 11:47:56', '2022-02-28 11:47:56'),
(111, 'Meru ELC', 4, '2022-02-28 11:47:56', '2022-02-28 11:47:56'),
(112, 'Meru High Court', 3, '2022-02-28 11:47:56', '2022-02-28 11:47:56'),
(113, 'Githongo Magistrates’ Court', 6, '2022-02-28 11:47:56', '2022-02-28 11:47:56'),
(114, 'Maua Magistrates’ Court', 6, '2022-02-28 11:47:57', '2022-02-28 11:47:57'),
(115, 'Meru Kadhis\'s Court', 7, '2022-02-28 11:47:57', '2022-02-28 11:47:57'),
(116, 'Tigania Magistrates’ Court', 6, '2022-02-28 11:47:57', '2022-02-28 11:47:57'),
(117, 'Nkubu Magistrates’ Court', 6, '2022-02-28 11:47:57', '2022-02-28 11:47:57'),
(118, 'Marimanti Magistrates’ Court', 6, '2022-02-28 11:47:57', '2022-02-28 11:47:57'),
(119, 'Chuka Magistrates’ Court', 6, '2022-02-28 11:47:57', '2022-02-28 11:47:57'),
(120, 'Chuka ELC', 4, '2022-02-28 11:47:57', '2022-02-28 11:47:57'),
(121, 'Chuka High Court', 3, '2022-02-28 11:47:57', '2022-02-28 11:47:57'),
(122, 'Runyenjes Magistrates’ Court', 6, '2022-02-28 11:47:58', '2022-02-28 11:47:58'),
(123, 'Siakago Magistrates’ Court', 6, '2022-02-28 11:47:58', '2022-02-28 11:47:58'),
(124, 'Embu ELC', 4, '2022-02-28 11:47:58', '2022-02-28 11:47:58'),
(125, 'Embu Magistrates’ Court', 6, '2022-02-28 11:47:58', '2022-02-28 11:47:58'),
(126, 'Embu High Court', 3, '2022-02-28 11:47:58', '2022-02-28 11:47:58'),
(127, 'Kagundo Magistrates\' Court', 6, '2022-02-28 11:47:58', '2022-02-28 11:47:58'),
(128, 'Machakos Kadhi Court', 7, '2022-02-28 11:47:58', '2022-02-28 11:47:58'),
(129, 'Machakos Magistrates Court', 6, '2022-02-28 11:47:58', '2022-02-28 11:47:58'),
(130, 'Machakos ELC', 4, '2022-02-28 11:47:58', '2022-02-28 11:47:58'),
(131, 'Machakos High Court', 3, '2022-02-28 11:47:59', '2022-02-28 11:47:59'),
(132, 'Marsabit Magistrates’ Court', 6, '2022-02-28 11:47:59', '2022-02-28 11:47:59'),
(133, 'Marsabit Kadhis’ Court', 7, '2022-02-28 11:47:59', '2022-02-28 11:47:59'),
(134, 'Marsabit High Court', 3, '2022-02-28 11:47:59', '2022-02-28 11:47:59'),
(135, 'Moyale Magistrates’ Court', 6, '2022-02-28 11:47:59', '2022-02-28 11:47:59'),
(136, 'Nanyuki Magistrates’ Court', 6, '2022-02-28 11:47:59', '2022-02-28 11:47:59'),
(137, 'Nanyuki High Court', 3, '2022-02-28 11:47:59', '2022-02-28 11:47:59'),
(138, 'Nyeri Magistrates Court', 6, '2022-02-28 11:47:59', '2022-02-28 11:47:59'),
(139, 'Nyeri High Court', 3, '2022-02-28 11:47:59', '2022-02-28 11:47:59'),
(140, 'Nyeri ELC', 4, '2022-02-28 11:48:00', '2022-02-28 11:48:00'),
(141, 'Nyeri ELRC', 5, '2022-02-28 11:48:00', '2022-02-28 11:48:00'),
(142, 'Nyeri Court of Appeal/ Target Setting', 2, '2022-02-28 11:48:00', '2022-02-28 11:48:00'),
(143, 'Nyeri Kadhi Court', 7, '2022-02-28 11:48:00', '2022-02-28 11:48:00'),
(144, 'Othaya Magistrates Court', 6, '2022-02-28 11:48:00', '2022-02-28 11:48:00'),
(145, 'Maralal Magistrates’ Court', 6, '2022-02-28 11:48:00', '2022-02-28 11:48:00'),
(146, 'Nyahururu High Court', 3, '2022-02-28 11:48:00', '2022-02-28 11:48:00'),
(147, 'Nyahururu ELC', 4, '2022-02-28 11:48:01', '2022-02-28 11:48:01'),
(148, 'Nyahururu Magistrates Court', 6, '2022-02-28 11:48:01', '2022-02-28 11:48:01'),
(149, 'Mukureini MagistratesCourt', 6, '2022-02-28 11:48:01', '2022-02-28 11:48:01'),
(150, 'Karatina Magistrates Court', 6, '2022-02-28 11:48:01', '2022-02-28 11:48:01'),
(151, 'Baricho Magistrates Court', 6, '2022-02-28 11:48:01', '2022-02-28 11:48:01'),
(152, 'Wang\'uru Magistrate\'s Court', 6, '2022-02-28 11:48:01', '2022-02-28 11:48:01'),
(153, 'Gichugu Law Courts', 6, '2022-02-28 11:48:02', '2022-02-28 11:48:02'),
(154, 'Kerugoya High Court', 3, '2022-02-28 11:48:02', '2022-02-28 11:48:02'),
(155, 'KerugoyaMagistrate\'s Court', 6, '2022-02-28 11:48:02', '2022-02-28 11:48:02'),
(156, 'Kerugoya ELC', 4, '2022-02-28 11:48:02', '2022-02-28 11:48:02'),
(157, 'Murang\'a High Court', 3, '2022-02-28 11:48:02', '2022-02-28 11:48:02'),
(158, 'Murang\'a Magistrates Court', 6, '2022-02-28 11:48:02', '2022-02-28 11:48:02'),
(159, 'Murang\'a ELC', 4, '2022-02-28 11:48:02', '2022-02-28 11:48:02'),
(160, 'Kangema Magistrates', 6, '2022-02-28 11:48:03', '2022-02-28 11:48:03'),
(161, 'Kigumo Magistrates Court', 6, '2022-02-28 11:48:03', '2022-02-28 11:48:03'),
(162, 'Kandara Magistrates Court', 6, '2022-02-28 11:48:03', '2022-02-28 11:48:03'),
(163, 'Voi Magistrates’ Court', 6, '2022-02-28 11:48:03', '2022-02-28 11:48:03'),
(164, 'Voi Kadhis’ Court', 7, '2022-02-28 11:48:04', '2022-02-28 11:48:04'),
(165, 'Voi High Court', 3, '2022-02-28 11:48:04', '2022-02-28 11:48:04'),
(166, 'Taveta Magistrates’ Court', 6, '2022-02-28 11:48:04', '2022-02-28 11:48:04'),
(167, 'Wundanyi Magistrates’ Court', 6, '2022-02-28 11:48:04', '2022-02-28 11:48:04'),
(168, 'Mariakani Magistrates’ Court', 6, '2022-02-28 11:48:04', '2022-02-28 11:48:04'),
(169, 'Mariakani Kadhis’ Court', 7, '2022-02-28 11:48:04', '2022-02-28 11:48:04'),
(170, 'Mombasa High Court', 3, '2022-02-28 11:48:04', '2022-02-28 11:48:04'),
(171, 'Mombasa ELRC', 5, '2022-02-28 11:48:05', '2022-02-28 11:48:05'),
(172, 'Mombasa COA', 2, '2022-02-28 11:48:06', '2022-02-28 11:48:06'),
(173, 'Mombasa Magistrates’ Court', 6, '2022-02-28 11:48:06', '2022-02-28 11:48:06'),
(174, 'Mombasa Kadhis’ Court', 7, '2022-02-28 11:48:06', '2022-02-28 11:48:06'),
(175, 'Mombasa ELC', 4, '2022-02-28 11:48:06', '2022-02-28 11:48:06'),
(176, 'Msambweni Magistrates’ Court', 6, '2022-02-28 11:48:06', '2022-02-28 11:48:06'),
(177, 'Msambweni Kadhis’ Court', 7, '2022-02-28 11:48:06', '2022-02-28 11:48:06'),
(178, 'Kwale Magistrates’ Court', 6, '2022-02-28 11:48:07', '2022-02-28 11:48:07'),
(179, 'Kwale Kadhis’ Court', 7, '2022-02-28 11:48:07', '2022-02-28 11:48:07'),
(180, 'Kwale High Court', 3, '2022-02-28 11:48:07', '2022-02-28 11:48:07'),
(181, 'Kwale ELC', 4, '2022-02-28 11:48:08', '2022-02-28 11:48:08'),
(182, 'Tononoka Magistrates’ Court', 6, '2022-02-28 11:48:08', '2022-02-28 11:48:08'),
(183, 'Shanzu Magistrates’ Court', 6, '2022-02-28 11:48:08', '2022-02-28 11:48:08'),
(184, 'Kaloleni Magistrates’ Court', 6, '2022-02-28 11:48:08', '2022-02-28 11:48:08'),
(185, 'Kilifi Magistrates’ Court', 6, '2022-02-28 11:48:08', '2022-02-28 11:48:08'),
(186, 'Kilifi Kadhis’ Court', 7, '2022-02-28 11:48:09', '2022-02-28 11:48:09'),
(187, 'Malindi ELC', 4, '2022-02-28 11:48:09', '2022-02-28 11:48:09'),
(188, 'Malindi Magistrates’ Court', 6, '2022-02-28 11:48:10', '2022-02-28 11:48:10'),
(189, 'Malindi High Court', 3, '2022-02-28 11:48:10', '2022-02-28 11:48:10'),
(190, 'Malindi ELRC', 5, '2022-02-28 11:48:10', '2022-02-28 11:48:10'),
(191, 'Malindi Kadhis’ Court', 7, '2022-02-28 11:48:11', '2022-02-28 11:48:11'),
(192, 'Garsen Magistrates Court', 6, '2022-02-28 11:48:11', '2022-02-28 11:48:11'),
(193, 'Garsen ’Kadhis’ Court', 7, '2022-02-28 11:48:11', '2022-02-28 11:48:11'),
(194, 'Garsen High Court', 3, '2022-02-28 11:48:11', '2022-02-28 11:48:11'),
(195, 'Hola Magistrates’ Court', 6, '2022-02-28 11:48:11', '2022-02-28 11:48:11'),
(196, 'Hola Kadhis’ Court', 7, '2022-02-28 11:48:11', '2022-02-28 11:48:11'),
(197, 'Lamu Magistrates’ Court', 6, '2022-02-28 11:48:11', '2022-02-28 11:48:11'),
(198, 'Lamu Kadhis’ Court', 7, '2022-02-28 11:48:11', '2022-02-28 11:48:11'),
(199, 'Mpeketoni Magistrates’ Court', 6, '2022-02-28 11:48:11', '2022-02-28 11:48:11'),
(200, 'Mpeketoni/Witu Kadhi Court', 7, '2022-02-28 11:48:12', '2022-02-28 11:48:12'),
(201, 'Mandera Magistrates’ Court', 6, '2022-02-28 11:48:12', '2022-02-28 11:48:12'),
(202, 'Mandera Kadhis’ Court', 7, '2022-02-28 11:48:12', '2022-02-28 11:48:12'),
(203, 'Takaba Kadhis’ Court', 7, '2022-02-28 11:48:12', '2022-02-28 11:48:12'),
(204, 'Elwak Kadhis’ Court', 7, '2022-02-28 11:48:12', '2022-02-28 11:48:12'),
(205, 'Wajir Magistrates’ Court', 6, '2022-02-28 11:48:12', '2022-02-28 11:48:12'),
(206, 'Wajir Kadhis’ Court', 7, '2022-02-28 11:48:12', '2022-02-28 11:48:12'),
(207, 'Bute Kadhis’ Court', 7, '2022-02-28 11:48:12', '2022-02-28 11:48:12'),
(208, 'Eldas Kadhis’ Court', 7, '2022-02-28 11:48:13', '2022-02-28 11:48:13'),
(209, 'Garissa Magistrates’ Court', 6, '2022-02-28 11:48:13', '2022-02-28 11:48:13'),
(210, 'Garissa Kadhis’ Court', 7, '2022-02-28 11:48:13', '2022-02-28 11:48:13'),
(211, 'Garissa High Court', 3, '2022-02-28 11:48:13', '2022-02-28 11:48:13'),
(212, 'Garissa ELC', 4, '2022-02-28 11:48:14', '2022-02-28 11:48:14'),
(213, 'Balambala Kadhis’ Court', 7, '2022-02-28 11:48:14', '2022-02-28 11:48:14'),
(214, 'Modogashe Kadhis\' Court', 7, '2022-02-28 11:48:14', '2022-02-28 11:48:14'),
(215, 'Ijara Kadhis’ Court', 7, '2022-02-28 11:48:14', '2022-02-28 11:48:14'),
(216, 'Habaswein Kadhis’ Court', 7, '2022-02-28 11:48:14', '2022-02-28 11:48:14'),
(217, 'Daadab Kadhis’ Court', 7, '2022-02-28 11:48:15', '2022-02-28 11:48:15'),
(218, 'Daadab Magistrate\'s Court', 6, '2022-02-28 11:48:15', '2022-02-28 11:48:15'),
(219, 'Bura Fafi Kadhi', 7, '2022-02-28 11:48:15', '2022-02-28 11:48:15'),
(220, 'Mwingi Magistrates’ Court', 6, '2022-02-28 11:48:15', '2022-02-28 11:48:15'),
(221, 'Kyuso Magistrates’ Court', 6, '2022-02-28 11:48:15', '2022-02-28 11:48:15'),
(222, 'Mutumo Magistrates’ Court', 6, '2022-02-28 11:48:15', '2022-02-28 11:48:15'),
(223, 'Kitui High Court', 3, '2022-02-28 11:48:16', '2022-02-28 11:48:16'),
(224, 'Kitui Magistrates’ Court', 6, '2022-02-28 11:48:16', '2022-02-28 11:48:16'),
(225, 'Kitui Kadhis’ Court', 7, '2022-02-28 11:48:16', '2022-02-28 11:48:16'),
(226, 'Kithimani Magistrates’ Court', 6, '2022-02-28 11:48:16', '2022-02-28 11:48:16'),
(227, 'Kilungu/ Nunguni Magistrates’ Court', 6, '2022-02-28 11:48:16', '2022-02-28 11:48:16'),
(228, 'Tawa Magistrates’ Court', 6, '2022-02-28 11:48:16', '2022-02-28 11:48:16'),
(229, 'Makueni Magistrates’ Court', 6, '2022-02-28 11:48:16', '2022-02-28 11:48:16'),
(230, 'Makueni High Court', 3, '2022-02-28 11:48:16', '2022-02-28 11:48:16'),
(231, 'Makueni ELC', 4, '2022-02-28 11:48:16', '2022-02-28 11:48:16'),
(232, 'Loitoktok Magistrates’ Court', 6, '2022-02-28 11:48:16', '2022-02-28 11:48:16'),
(233, 'Makindu Magistrates’ Court', 6, '2022-02-28 11:48:17', '2022-02-28 11:48:17'),
(234, 'Kajido High Court', 3, '2022-02-28 11:48:18', '2022-02-28 11:48:18'),
(235, 'Kajiado ELC', 4, '2022-02-28 11:48:18', '2022-02-28 11:48:18'),
(236, 'Kajiado Kadhis’ Court', 7, '2022-02-28 11:48:18', '2022-02-28 11:48:18'),
(237, 'Registrar Court of Appeal', 11, '2022-02-28 11:48:19', '2022-02-28 11:48:19'),
(238, 'Registrar High Court', 3, '2022-02-28 11:48:20', '2022-02-28 11:48:20'),
(239, 'Registrar Environment & Land Court', 11, '2022-02-28 11:48:20', '2022-02-28 11:48:20'),
(240, 'Registrar Magistrates Court', 6, '2022-02-28 11:48:20', '2022-02-28 11:48:20'),
(241, 'Registrar Tribunals', 11, '2022-02-28 11:48:20', '2022-02-28 11:48:20'),
(242, 'Registrar Supreme Court', 11, '2022-02-28 11:48:21', '2022-02-28 11:48:21'),
(243, 'Registrar Employment & Labour Relations Court', 11, '2022-02-28 11:48:21', '2022-02-28 11:48:21'),
(244, 'Office of the Chief Registrar of the Judiciary', 11, '2022-02-28 11:48:21', '2022-02-28 11:48:21'),
(245, 'JKIA Magistrate Court', 6, '2022-02-28 11:48:21', '2022-02-28 11:48:21'),
(246, 'Ngong Magistrate Court', 6, '2022-02-28 11:48:21', '2022-02-28 11:48:21'),
(247, 'Kibera Magistrate Court', 6, '2022-02-28 11:48:21', '2022-02-28 11:48:21'),
(248, 'Kibera Kadhi Court', 7, '2022-02-28 11:48:21', '2022-02-28 11:48:21'),
(249, 'Milimani Magistrate Court', 6, '2022-02-28 11:48:21', '2022-02-28 11:48:21'),
(250, 'Nairobi Employment & Labour Relations Court', 5, '2022-02-28 11:48:21', '2022-02-28 11:48:21'),
(251, 'Milimani Criminal Division', 3, '2022-02-28 11:48:21', '2022-02-28 11:48:21'),
(252, 'Milimani Environment & Land Court', 4, '2022-02-28 11:48:21', '2022-02-28 11:48:21'),
(253, 'Milimani Constitutional and Human Rights Division', 3, '2022-02-28 11:48:22', '2022-02-28 11:48:22'),
(254, 'Milimani Judicial Review Division', 3, '2022-02-28 11:48:22', '2022-02-28 11:48:22'),
(255, 'Githunguri Magistrate Court', 6, '2022-02-28 11:48:22', '2022-02-28 11:48:22'),
(256, 'Kikuyu Magistrate Court', 6, '2022-02-28 11:48:22', '2022-02-28 11:48:22'),
(257, 'Kahawa Magistrates Court', 6, '2022-02-28 11:48:22', '2022-02-28 11:48:22'),
(258, 'Ruiru Magistartes Court', 6, '2022-02-28 11:48:22', '2022-02-28 11:48:22'),
(259, 'Kiambu High Court', 3, '2022-02-28 11:48:22', '2022-02-28 11:48:22'),
(260, 'Kiambu Magistrate Court', 6, '2022-02-28 11:48:23', '2022-02-28 11:48:23'),
(261, 'Thika Magistrate Court', 6, '2022-02-28 11:48:23', '2022-02-28 11:48:23'),
(262, 'Thika Environment & Land Court', 4, '2022-02-28 11:48:23', '2022-02-28 11:48:23'),
(263, 'Thika Kadhi Court', 7, '2022-02-28 11:48:23', '2022-02-28 11:48:23'),
(264, 'Gatundu Magistrate Court', 6, '2022-02-28 11:48:23', '2022-02-28 11:48:23'),
(265, 'Milimani Family Division', 3, '2022-02-28 11:48:23', '2022-02-28 11:48:23'),
(266, 'Milimani Children’s Court', 6, '2022-02-28 11:48:23', '2022-02-28 11:48:23'),
(267, 'Nairobi Kadhi Court', 7, '2022-02-28 11:48:23', '2022-02-28 11:48:23'),
(268, 'Milimani Anti-Corruption & Economic Crimes Division', 3, '2022-02-28 11:48:23', '2022-02-28 11:48:23'),
(269, 'Makadara Magistrate Court', 6, '2022-02-28 11:48:24', '2022-02-28 11:48:24'),
(270, 'Judiciary Training Institute', 10, '2022-02-28 11:48:24', '2022-02-28 11:48:24'),
(271, 'Administration and security service', 10, '2022-02-28 11:48:24', '2022-02-28 11:48:24'),
(272, 'Human Resource & Administration', 10, '2022-02-28 11:48:24', '2022-02-28 11:48:24'),
(273, 'Building Services', 10, '2022-02-28 11:48:24', '2022-02-28 11:48:24'),
(274, 'Finance & Accounts', 10, '2022-02-28 11:48:24', '2022-02-28 11:48:24'),
(275, 'Internal Audit & Risk Management', 10, '2022-02-28 11:48:24', '2022-02-28 11:48:24'),
(276, 'Library Services', 10, '2022-02-28 11:48:25', '2022-02-28 11:48:25'),
(277, 'Information Communication and Technology', 10, '2022-02-28 11:48:25', '2022-02-28 11:48:25'),
(278, 'Public Affairs & Communication', 10, '2022-02-28 11:48:25', '2022-02-28 11:48:25'),
(279, 'Supply Chain Management', 10, '2022-02-28 11:48:25', '2022-02-28 11:48:25'),
(280, 'Planning & Organizational Performance', 10, '2022-02-28 11:48:25', '2022-02-28 11:48:25'),
(281, 'Office of the Judiciary Ombudsman', 10, '2022-02-28 11:48:25', '2022-02-28 11:48:25'),
(282, 'Nairobi Court of Appeal Criminal Division', 2, '2022-02-28 11:48:25', '2022-02-28 11:48:25'),
(283, 'Nairobi Court of Appeal Civil Division', 2, '2022-02-28 11:48:25', '2022-02-28 11:48:25'),
(284, 'Supreme Court', 1, '2022-02-28 11:48:25', '2022-02-28 11:48:25'),
(285, 'National Council on Administration of Justice', 10, '2022-02-28 11:48:26', '2022-02-28 11:48:26'),
(286, 'Milimani Civil Division', 3, '2022-02-28 11:48:26', '2022-02-28 11:48:26'),
(287, 'Milimani Commercial and Tax Division', 3, '2022-02-28 11:48:26', '2022-02-28 11:48:26'),
(288, 'Administration and security service', 10, '2022-02-28 11:48:27', '2022-02-28 11:48:27'),
(289, 'Human Resource & Administration', 10, '2022-02-28 11:48:27', '2022-02-28 11:48:27'),
(290, 'Building Services', 10, '2022-02-28 11:48:27', '2022-02-28 11:48:27'),
(291, 'Finance & Accounts', 10, '2022-02-28 11:48:27', '2022-02-28 11:48:27'),
(292, 'Internal Audit & Risk Management', 10, '2022-02-28 11:48:27', '2022-02-28 11:48:27'),
(293, 'Library Services', 10, '2022-02-28 11:48:27', '2022-02-28 11:48:27'),
(294, 'Information Communication and Technology', 10, '2022-02-28 11:48:27', '2022-02-28 11:48:27'),
(295, 'Public Affairs & Communication', 10, '2022-02-28 11:48:27', '2022-02-28 11:48:27'),
(296, 'Supply Chain Management', 10, '2022-02-28 11:48:28', '2022-02-28 11:48:28'),
(297, 'Planning & Organizational Performance', 10, '2022-02-28 11:48:28', '2022-02-28 11:48:28'),
(298, 'Office of the Judiciary Ombudsman', 10, '2022-02-28 11:48:28', '2022-02-28 11:48:28'),
(299, 'Nairobi Court of Appeal Criminal Division', 2, '2022-02-28 11:48:28', '2022-02-28 11:48:28'),
(300, 'Nairobi Court of Appeal Civil Division', 2, '2022-02-28 11:48:28', '2022-02-28 11:48:28'),
(301, 'Supreme Court', 1, '2022-02-28 11:48:28', '2022-02-28 11:48:28'),
(302, 'Milimani Civil Division', 3, '2022-02-28 11:48:28', '2022-02-28 11:48:28'),
(303, 'Milimani Commercial and Tax Division', 3, '2022-02-28 11:48:28', '2022-02-28 11:48:28');

-- --------------------------------------------------------

--
-- Table structure for table `unit_ranks`
--

CREATE TABLE `unit_ranks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_ranks`
--

INSERT INTO `unit_ranks` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Supreme Court', NULL, NULL),
(2, 'Court of Appeal', NULL, NULL),
(3, 'High Court', NULL, NULL),
(4, 'ELC', NULL, NULL),
(5, 'ELRC', NULL, NULL),
(6, 'Magistrate Court', NULL, NULL),
(7, 'Kadhi Court', NULL, NULL),
(8, 'Small Claims Court', NULL, NULL),
(9, 'Tribunals', NULL, NULL),
(10, 'Directorates', NULL, NULL),
(11, 'Registers', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verification_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jsg_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_verified_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `phone_number`, `verification_code`, `jsg_number`, `phone_verified_at`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Patrick', 'Ngobiro', '0718952129', NULL, '59431', NULL, 'pngobiro@gmail.com', NULL, '$2y$10$WHLGkRDOme8ssrEV/LBK..7bvLyTM9ImIgynnXcItifrwlEqQ66Ku', NULL, '2022-03-16 11:24:44', '2022-03-16 11:24:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `financial_years`
--
ALTER TABLE `financial_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indicators`
--
ALTER TABLE `indicators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indicator_groups`
--
ALTER TABLE `indicator_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indicator_types`
--
ALTER TABLE `indicator_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indicator_unit_of_measures`
--
ALTER TABLE `indicator_unit_of_measures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `master_indicators`
--
ALTER TABLE `master_indicators`
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
-- Indexes for table `template_indicators`
--
ALTER TABLE `template_indicators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template_indicator_groups`
--
ALTER TABLE `template_indicator_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `units_unit_rank_id_foreign` (`unit_rank_id`);

--
-- Indexes for table `unit_ranks`
--
ALTER TABLE `unit_ranks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `users_jsg_number_unique` (`jsg_number`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_verification_code_unique` (`verification_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `financial_years`
--
ALTER TABLE `financial_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `indicators`
--
ALTER TABLE `indicators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=445;

--
-- AUTO_INCREMENT for table `indicator_groups`
--
ALTER TABLE `indicator_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `indicator_types`
--
ALTER TABLE `indicator_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `indicator_unit_of_measures`
--
ALTER TABLE `indicator_unit_of_measures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_indicators`
--
ALTER TABLE `master_indicators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `template_indicators`
--
ALTER TABLE `template_indicators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `template_indicator_groups`
--
ALTER TABLE `template_indicator_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=304;

--
-- AUTO_INCREMENT for table `unit_ranks`
--
ALTER TABLE `unit_ranks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `units`
--
ALTER TABLE `units`
  ADD CONSTRAINT `units_unit_rank_id_foreign` FOREIGN KEY (`unit_rank_id`) REFERENCES `unit_ranks` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 25, 2022 at 12:21 PM
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
-- Table structure for table `counties`
--

CREATE TABLE `counties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `code`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Supreme Court Petition', 'SPC', 0, NULL, '2022-04-21 05:29:18', '2022-04-21 05:29:18'),
(2, 'Supreme Court Advisory Opinion/Reference', 'SCAOR', 1, NULL, '2022-04-21 05:29:18', '2022-04-21 05:29:18'),
(3, 'Supreme Court ', 'SC', 1, NULL, '2022-04-21 05:29:18', '2022-04-21 05:29:18'),
(4, 'Supreme Court Petition Application', 'NULL', 0, NULL, '2022-04-21 05:29:18', '2022-04-21 05:29:18'),
(5, 'Civil Division', 'CC', 1, NULL, '2022-04-21 05:29:18', '2022-04-21 05:29:18'),
(7, 'Criminal  Division', 'CRA', 0, NULL, '2022-04-21 05:29:18', '2022-04-21 05:29:18'),
(9, 'High Court Criminal', 'Criminal', 1, NULL, '2022-04-21 05:29:18', '2022-04-21 05:29:18'),
(10, 'High Court Commercial and Tax', ' Commercial ', 1, NULL, '2022-04-21 05:29:18', '2022-04-21 05:29:18'),
(11, 'High Court Civil', 'HCC', 0, NULL, '2022-04-21 05:29:18', '2022-04-21 05:29:18'),
(12, 'High Court Family', 'Family', 1, NULL, '2022-04-21 05:29:18', '2022-04-21 05:29:18'),
(13, 'High Court Judicial Review', 'HCJR', 0, NULL, '2022-04-21 05:29:18', '2022-04-21 05:29:18'),
(14, 'High Court Constitution and Human Rights', 'CHR', 0, NULL, '2022-04-21 05:29:18', '2022-04-21 05:29:18'),
(15, 'Magistrate Court Civil Case ', 'NULL', 0, NULL, '2022-04-21 05:29:18', '2022-04-21 05:29:18'),
(16, 'Magistrate Court Civil Case Miscellaneous ', 'NULL', 0, NULL, '2022-04-21 05:29:18', '2022-04-21 05:29:18'),
(18, 'Magistrate Court Criminal', 'MC - Criminal', 1, NULL, '2022-04-21 05:29:18', '2022-04-21 05:29:18'),
(19, 'Magistrate Court Criminal Case Miscellaneous ', 'NULL', 0, NULL, '2022-04-21 05:29:19', '2022-04-21 05:29:19'),
(20, 'Magistrate Court Traffic Case ', 'NULL', 0, NULL, '2022-04-21 05:29:19', '2022-04-21 05:29:19'),
(21, 'Magistrate Court Election Petitions ', 'NULL', 0, NULL, '2022-04-21 05:29:19', '2022-04-21 05:29:19'),
(22, 'Magistrate Court Succession Matter ', 'NULL', 0, NULL, '2022-04-21 05:29:19', '2022-04-21 05:29:19'),
(24, 'Magistrate Court Children', 'Children', 0, NULL, '2022-04-21 05:29:19', '2022-04-21 05:29:19'),
(27, 'Kadhi Court', 'KC', 1, NULL, '2022-04-21 05:29:19', '2022-04-21 05:29:19'),
(28, 'Magistrate Court Anti Corruption', 'MCAC', 1, NULL, '2022-04-21 05:29:19', '2022-04-21 05:29:19'),
(29, 'High Court Anti Corruption and Economic Crimes', 'ACEC', 0, NULL, '2022-04-21 05:29:19', '2022-04-21 05:29:19'),
(30, 'Environment and Land Court', 'ELC', 1, NULL, '2022-04-21 05:29:19', '2022-04-21 05:29:19'),
(31, 'Environment and Land Appeal', 'NULL', 0, NULL, '2022-04-21 05:29:19', '2022-04-21 05:29:19'),
(32, 'Environment and Land Judiciary Review', 'NULL', 0, NULL, '2022-04-21 05:29:19', '2022-04-21 05:29:19'),
(33, 'Environment and Land Miscellaneous', 'NULL', 0, NULL, '2022-04-21 05:29:19', '2022-04-21 05:29:19'),
(34, 'Environment and Land Petitions', 'NULL', 0, NULL, '2022-04-21 05:29:19', '2022-04-21 05:29:19'),
(35, 'Employment and Labour Relations Court', 'ELRC', 1, NULL, '2022-04-21 05:29:19', '2022-04-21 05:29:19'),
(36, 'Employment and Labour Relations Judicial Review', 'NULL', 0, NULL, '2022-04-21 05:29:19', '2022-04-21 05:29:19'),
(37, 'Employment and Labour Relations CBA', 'NULL', 0, NULL, '2022-04-21 05:29:19', '2022-04-21 05:29:19'),
(38, 'Employment and Labour Relations Petitions', 'NULL', 0, NULL, '2022-04-21 05:29:19', '2022-04-21 05:29:19'),
(39, 'Employment and Labour Relations Miscellaneous', 'NULL', 0, NULL, '2022-04-21 05:29:20', '2022-04-21 05:29:20'),
(40, 'Employment and Labour Relations Appeal', 'NULL', 0, NULL, '2022-04-21 05:29:20', '2022-04-21 05:29:20'),
(41, 'Supreme Court Presidential Election Petition', 'NULL', 0, NULL, '2022-04-21 05:29:20', '2022-04-21 05:29:20'),
(42, 'Magistrate Court Commercial', 'MCC', 1, NULL, '2022-04-21 05:29:20', '2022-04-21 05:29:20'),
(43, 'Accused Division', 'NULL', 0, NULL, '2022-04-21 05:29:20', '2022-04-21 05:29:20'),
(44, 'Environment & Land Matters (OS)', 'NULL', 0, NULL, '2022-04-21 05:29:20', '2022-04-21 05:29:20'),
(46, 'xxxxxx1111111111111', 'xxxx11', 0, NULL, '2022-04-21 05:29:20', '2022-04-21 05:29:20'),
(47, 'XXXXXXXXX', 'x', 0, NULL, '2022-04-21 05:29:20', '2022-04-21 05:29:20'),
(48, 'High Court Criminal - deleted', 'CRM', 0, NULL, '2022-04-21 05:29:20', '2022-04-21 05:29:20'),
(49, 'Magistrate Court Traffic', 'MCTR', 0, NULL, '2022-04-21 05:29:20', '2022-04-21 05:29:20'),
(50, 'Magistrate Court Criminal', 'MCCR', 1, NULL, '2022-04-21 05:29:20', '2022-04-21 05:29:20'),
(51, 'CHR and JR', 'CHR.JR', 1, NULL, '2022-04-21 05:29:20', '2022-04-21 05:29:20'),
(52, 'Magistrate Court Civil', 'MCCD', 0, NULL, '2022-04-21 05:29:20', '2022-04-21 05:29:20'),
(53, 'High Court Div', 'HC.DIV', 0, NULL, '2022-04-21 05:29:20', '2022-04-21 05:29:20'),
(54, 'Magistrate Court', 'MCD', 1, NULL, '2022-04-21 05:29:20', '2022-04-21 05:29:20'),
(55, 'Magistrate Court Family', 'MC - Family', 1, NULL, '2022-04-21 05:29:20', '2022-04-21 05:29:20'),
(56, 'Nairobi', 'NRB', 1, NULL, '2022-04-21 05:29:20', '2022-04-21 05:29:20'),
(57, 'Nairobi', 'NRB', 1, NULL, '2022-04-21 05:29:20', '2022-04-21 05:29:20'),
(58, 'Court Annexed Mediation', 'CAM', 1, NULL, '2022-04-21 05:29:20', '2022-04-21 05:29:20'),
(59, 'The National Environment Tribunal', 'NET', 1, NULL, '2022-04-21 05:29:21', '2022-04-21 05:29:21'),
(60, 'Meru Environment and Land Court', 'MERUELC', 1, NULL, '2022-04-21 05:29:21', '2022-04-21 05:29:21'),
(61, 'MERU HIGH COURT', 'MERUHC', 1, NULL, '2022-04-21 05:29:21', '2022-04-21 05:29:21'),
(62, 'Meru Magistrate Court', 'MERUMC', 1, NULL, '2022-04-21 05:29:21', '2022-04-21 05:29:21'),
(63, 'Sports Disputes Tribunal', 'SDT', 1, NULL, '2022-04-21 05:29:21', '2022-04-21 05:29:21'),
(64, 'Court of Appeal', 'COA', 1, NULL, '2022-04-21 05:29:21', '2022-04-21 05:29:21'),
(65, 'Tribunal', 'TR', 1, NULL, '2022-04-21 05:29:21', '2022-04-21 05:29:21'),
(66, 'Transport Licensing Appeals Board', 'TLAB', 1, NULL, '2022-04-21 05:29:21', '2022-04-21 05:29:21'),
(67, 'Advocates Disciplinary Tribunal', 'ADT', 1, NULL, '2022-04-21 05:29:21', '2022-04-21 05:29:21'),
(68, 'Auctioneers Licensing Board', 'ALB', 1, NULL, '2022-04-21 05:29:21', '2022-04-21 05:29:21'),
(69, 'Nairobi', 'NBI', 1, NULL, '2022-04-21 05:29:21', '2022-04-21 05:29:21'),
(70, 'Communications and Multimedia Appeals Tribunal ', 'CAMAT', 0, NULL, '2022-04-21 05:29:21', '2022-04-21 05:29:21'),
(71, 'Legal Education Appeals Tribunal ', 'LEAT', 0, NULL, '2022-04-21 05:29:21', '2022-04-21 05:29:21'),
(72, 'Micro and Small Enterprise Tribunal ', 'MASET', 1, NULL, '2022-04-21 05:29:21', '2022-04-21 05:29:21'),
(73, 'Competent Authority Tribunal ', 'CAT', 0, NULL, '2022-04-21 05:29:21', '2022-04-21 05:29:21'),
(74, 'Kenya Institute of Supplies Management Elections Committee', 'KISM', 1, NULL, '2022-04-21 05:29:21', '2022-04-21 05:29:21'),
(75, 'Education Appeals Tribunal', 'EAT', 1, NULL, '2022-04-21 05:29:21', '2022-04-21 05:29:21'),
(76, 'HIV Tribunal', 'HAT', 1, NULL, '2022-04-21 05:29:21', '2022-04-21 05:29:21'),
(77, 'Kajiado', 'KJD', 1, NULL, '2022-04-21 05:29:21', '2022-04-21 05:29:21'),
(78, 'Mombasa', 'MSA', 1, NULL, '2022-04-21 05:29:21', '2022-04-21 05:29:21'),
(79, 'Kakamega', 'KKM', 1, NULL, '2022-04-21 05:29:21', '2022-04-21 05:29:21'),
(80, 'Nakuru', 'NAK', 1, NULL, '2022-04-21 05:29:21', '2022-04-21 05:29:21'),
(81, 'Meru', 'MER', 1, NULL, '2022-04-21 05:29:22', '2022-04-21 05:29:22'),
(82, 'Embu', 'EMB', 1, NULL, '2022-04-21 05:29:22', '2022-04-21 05:29:22'),
(83, 'Muranga', 'MUR', 1, NULL, '2022-04-21 05:29:22', '2022-04-21 05:29:22'),
(84, 'Thika', 'TKA', 1, NULL, '2022-04-21 05:29:22', '2022-04-21 05:29:22'),
(85, 'Machakos', 'MKS', 1, NULL, '2022-04-21 05:29:22', '2022-04-21 05:29:22'),
(86, 'Kiambu', 'KMB', 1, NULL, '2022-04-21 05:29:22', '2022-04-21 05:29:22'),
(87, 'Nyahururu', 'NYU', 1, NULL, '2022-04-21 05:29:22', '2022-04-21 05:29:22'),
(88, 'Kericho', 'KER', 1, NULL, '2022-04-21 05:29:22', '2022-04-21 05:29:22'),
(89, 'Eldoret', 'ELD', 1, NULL, '2022-04-21 05:29:22', '2022-04-21 05:29:22'),
(90, 'Kitale', 'KIT', 1, NULL, '2022-04-21 05:29:22', '2022-04-21 05:29:22'),
(91, 'Bungoma', 'BGM', 1, NULL, '2022-04-21 05:29:22', '2022-04-21 05:29:22'),
(92, 'Kisii', 'KIS', 1, NULL, '2022-04-21 05:29:22', '2022-04-21 05:29:22'),
(93, 'Kisumu', 'KSM', 1, NULL, '2022-04-21 05:29:22', '2022-04-21 05:29:22'),
(94, 'Nyeri', 'NYR', 1, NULL, '2022-04-21 05:29:22', '2022-04-21 05:29:22'),
(95, 'Naivasha', 'NAV', 1, NULL, '2022-04-21 05:29:22', '2022-04-21 05:29:22'),
(96, 'ENERGY AND PETROLEUM TRIBUNAL', 'EPTBN', 0, NULL, '2022-04-21 05:29:22', '2022-04-21 05:29:22'),
(97, 'Commercial Suit Division', 'MCCOMMSU', 1, NULL, '2022-04-21 05:29:23', '2022-04-21 05:29:23'),
(98, 'Small Claims Court', 'SCC', 0, NULL, '2022-04-21 05:29:23', '2022-04-21 05:29:23'),
(99, 'Garissa', 'GAR', 1, NULL, '2022-04-21 05:29:23', '2022-04-21 05:29:23'),
(100, 'Lamu', 'LAM', 1, NULL, '2022-04-21 05:29:23', '2022-04-21 05:29:23'),
(101, 'Judiciary Training Institute', 'JTI', 0, NULL, '2022-04-21 05:29:23', '2022-04-21 05:29:23'),
(102, 'Administration', 'ADMIN', 0, NULL, '2022-04-21 05:29:23', '2022-04-21 05:29:23'),
(103, 'Judiciary Committee on Elections', 'JCE', 1, NULL, '2022-04-21 05:29:23', '2022-04-21 05:29:23');

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
  `is_current` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `financial_years`
--

INSERT INTO `financial_years` (`id`, `name`, `start_date`, `end_date`, `is_current`, `created_at`, `updated_at`) VALUES
(1, '2018/2019', '2018-07-01', '2019-06-30', 0, NULL, NULL),
(2, '2019/2020', '2019-07-01', '2020-06-30', 0, NULL, NULL),
(3, '2020/2021', '2020-07-01', '2021-06-30', 0, NULL, NULL),
(4, '2021/2022', '2021-07-01', '2022-06-30', 0, NULL, NULL),
(5, '2022/2023', '2022-07-01', '2023-06-30', 0, NULL, NULL);

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
  `deleted_at` datetime DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `indicators`
--

INSERT INTO `indicators` (`id`, `master_indicator_id`, `name`, `indicator_group_id`, `indicator_type_id`, `indicator_unit_of_measure_id`, `indicator_weight`, `indicator_target`, `indicator_achivement`, `remarks`, `deleted_at`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, 'Certified Urgent Applications - % of certified urgent applications concluded within 30 days from the date of certification', 1, 2, 1, 3, 100, 55, NULL, NULL, 1, '2022-04-13 10:43:13', '2022-04-19 08:13:04'),
(2, 2, 'Injunction applications -% of applications heard and determined within 90 days of filing', 1, 2, 1, 3, 90, 85, NULL, NULL, 2, '2022-04-13 10:43:13', '2022-04-13 11:36:38'),
(3, 3, 'All other applications (Including Criminal revisions, Ad-litem, rectifications, citations, etc.) -% of applications concluded within 90 days from date of filing', 1, 2, 1, 3, 88, 85, NULL, NULL, 3, '2022-04-13 10:43:13', '2022-04-13 11:39:51'),
(4, 4, 'Hearing & determination of Criminal cases -% of cases concluded within 360 days from date of filing', 1, 2, 1, 7, 100, 78, NULL, NULL, 4, '2022-04-13 10:43:13', '2022-04-13 11:40:34'),
(5, 5, 'Hearing and determination of Civil cases including contested Succession causes.  -% of cases concluded within 360 days from date of filing', 1, 2, 1, 8, 70, 65, NULL, NULL, 5, '2022-04-13 10:43:13', '2022-04-13 11:40:36'),
(6, 6, 'Percentage of judgements/rulings delivered on the date first scheduled for delivery', 1, 2, 1, 3, 95, 88, NULL, NULL, 6, '2022-04-13 10:43:13', '2022-04-13 11:40:46'),
(7, 8, 'Applications in criminal matters -% of applications concluded within 90 days of filing', 1, 2, 1, 3, 80, 74, NULL, NULL, 8, '2022-04-13 10:43:13', '2022-04-13 11:40:49'),
(8, 9, 'Reduced no. of days spent in remand custody from the “Date of plea” to the “Date of conclusion of the matter”( where bail has been denied or where the remandees are unable to meet the bail terms)', 1, 3, 2, 3, 45, 12, NULL, NULL, 9, '2022-04-13 10:43:13', '2022-04-13 11:40:55'),
(9, 10, 'Case clearance rate for Criminal Cases', 1, 1, 1, 4, 120, 110, NULL, NULL, 10, '2022-04-13 10:43:13', '2022-04-13 11:41:02'),
(10, 11, 'Case clearance rate for Civil Cases', 1, 1, 1, 4, 110, 102, NULL, NULL, 11, '2022-04-13 10:43:14', '2022-04-13 11:41:06'),
(11, 12, 'Case Clearance Rate for Traffic Cases', 1, 2, 1, 3, 105, 45, NULL, NULL, 12, '2022-04-13 10:43:14', '2022-04-13 11:41:10'),
(12, 13, 'Percentage reduction of backlog', 1, 1, 1, 4, 5, 5, NULL, NULL, 13, '2022-04-13 10:43:14', '2022-04-13 11:41:13'),
(13, 14, 'Merit  Productivity', 1, 1, 4, 6, 1500, 1200, NULL, NULL, 14, '2022-04-13 10:43:14', '2022-04-13 11:41:19'),
(14, 15, 'Other Productivity', 1, 2, 4, 3, 2000, 1700, NULL, NULL, 15, '2022-04-13 10:43:14', '2022-04-13 11:41:22'),
(15, 7, 'Delivery of Judgments and rulings -% of judgement/rulings delivered within 60 days of conclusion of the hearing', 1, 2, 1, 3, 100, 100, NULL, NULL, 7, '2022-04-13 10:43:14', '2022-04-13 11:41:26'),
(16, 16, 'Advance communication of adjournments of trials/hearings& date of delivery of judgements/rulings', 2, 2, 1, 2, 100, 100, NULL, NULL, 1, '2022-04-13 10:43:14', '2022-04-13 11:41:57'),
(17, 17, 'Percentage of trial/hearings held when first cause listed', 2, 2, 1, 2, 100, 52, NULL, NULL, 2, '2022-04-13 10:43:14', '2022-04-19 09:08:37'),
(18, 18, 'Percentage of pre-trial events held when first listed – mentions and supervision for compliance by parties in filing pleadings/exhibits', 2, 1, 1, 1, 100, 78, NULL, NULL, 3, '2022-04-13 10:43:14', '2022-04-13 11:42:33'),
(19, 19, 'Submission of Court proceedings for appealed Matters within 60 days from date of receipt of notice', 2, 2, 1, 2, 100, 0, NULL, NULL, 4, '2022-04-13 10:43:14', '2022-04-13 11:42:46'),
(20, 20, 'Use of ADR mechanism in resolution of cases. - % of cases referred for ADR and concluded', 2, 1, 1, 2, 100, 100, NULL, NULL, 5, '2022-04-13 10:43:14', '2022-04-13 11:42:52'),
(21, 21, 'Publish daily cause lists and posting online seven days in advance', 2, 1, 1, 1, 100, 100, NULL, NULL, 6, '2022-04-13 10:43:14', '2022-04-13 11:42:54'),
(22, 22, 'Stakeholder Engagement', 2, 2, 1, 2, 100, 100, NULL, NULL, 7, '2022-04-13 10:43:14', '2022-04-13 11:42:56'),
(23, 23, 'Timely Submission of accurate monthly court returns', 2, 2, 1, 2, 100, 100, NULL, NULL, 8, '2022-04-13 10:43:14', '2022-04-13 11:42:58'),
(24, 24, 'Implement the Registry Manual procedures', 3, 1, 1, 3, 100, 58, NULL, NULL, 1, '2022-04-13 10:43:14', '2022-04-13 11:43:00'),
(25, 25, 'Maintain and update all registers', 3, 2, 1, 3, 100, 56, NULL, NULL, 2, '2022-04-13 10:43:15', '2022-04-13 11:43:01'),
(26, 25, 'Maintain and Update  all registers', 4, 2, 5, 1, 1, 2, NULL, NULL, 1, '2022-04-13 10:43:15', '2022-04-13 11:43:20'),
(27, 27, 'Supervision of construction (Where applicable)', 4, 2, 3, 1, 1, 1, NULL, NULL, 2, '2022-04-13 10:43:15', '2022-04-19 09:09:09'),
(28, 143, 'Disposal of idle assets (Where applicable)', 4, 1, 3, 1, 1, 2, NULL, NULL, 3, '2022-04-13 10:43:15', '2022-04-13 11:43:38'),
(29, 29, 'Compliance with the budget', 5, 1, 1, 1, 100, 200, NULL, NULL, 1, '2022-04-13 10:43:15', '2022-04-13 11:43:47'),
(30, 30, 'Revenue Management', 5, 2, 1, 2, 100, 250, NULL, NULL, 2, '2022-04-13 10:43:15', '2022-04-13 11:44:03'),
(31, 31, 'Implementation of Audit report recommendations.', 5, 2, 3, 2, 2, 2, NULL, NULL, 3, '2022-04-13 10:43:15', '2022-04-13 11:44:27'),
(32, 32, 'Compliance with Service Delivery Charter Standards', 6, 1, 1, 4, 100, 100, NULL, NULL, 1, '2022-04-13 10:43:15', '2022-04-13 11:44:36'),
(33, 33, 'Service improvement Innovations', 7, 1, 4, 2, 2, 1, NULL, NULL, 1, '2022-04-13 10:43:15', '2022-04-13 11:44:51'),
(34, 34, 'Competency development', 7, 1, 4, 2, 1, 3, NULL, NULL, 2, '2022-04-13 10:43:15', '2022-04-13 11:45:01'),
(35, 35, 'Corruption Prevention &Eradication', 8, 2, 1, 2, 100, 100, NULL, NULL, 1, '2022-04-13 10:43:15', '2022-04-13 11:45:05'),
(36, 36, 'Improve Employee wellness and work environment', 8, 1, 1, 1, 100, 100, NULL, NULL, 2, '2022-04-13 10:43:15', '2022-04-13 11:45:06'),
(37, 37, 'Implement court user survey recommendations', 8, 2, 1, 1, 100, 100, NULL, NULL, 3, '2022-04-13 10:43:15', '2022-04-13 11:45:07'),
(38, 1, 'Certified Urgent Applications - % of certified urgent applications concluded within 30 days from the date of certification', 9, 1, 1, 3, 100, 87, NULL, NULL, 1, '2022-04-19 11:20:50', '2022-04-20 07:35:10'),
(39, 2, 'Injunction applications -% of applications heard and determined within 90 days of filing', 9, 1, 1, 3, 95, 94, NULL, NULL, 2, '2022-04-19 11:20:50', '2022-04-20 07:35:15'),
(40, 3, 'All other applications (Including Criminal revisions, Ad-litem, rectifications, citations, etc.) -% of applications concluded within 90 days from date of filing', 9, 1, 1, 3, 100, 100, NULL, NULL, 3, '2022-04-19 11:20:50', '2022-04-20 07:35:19'),
(41, 4, 'Hearing & determination of Criminal cases -% of cases concluded within 360 days from date of filing', 9, 2, 1, 7, 100, 41, NULL, NULL, 4, '2022-04-19 11:20:50', '2022-04-20 07:35:45'),
(42, 5, 'Hearing and determination of Civil cases including contested Succession causes.  -% of cases concluded within 360 days from date of filing', 9, 2, 1, 8, 90, 500, NULL, NULL, 5, '2022-04-19 11:20:50', '2022-04-20 09:09:07'),
(43, 6, 'Percentage of judgements/rulings delivered on the date first scheduled for delivery', 9, 2, 1, 3, 100, 100, NULL, NULL, 6, '2022-04-19 11:20:50', '2022-04-20 07:58:06'),
(44, 8, 'Applications in criminal matters -% of applications concluded within 90 days of filing', 9, 2, 1, 3, 100, 100, NULL, NULL, 8, '2022-04-19 11:20:50', '2022-04-20 07:57:19'),
(45, 9, 'Reduced no. of days spent in remand custody from the “Date of plea” to the “Date of conclusion of the matter”( where bail has been denied or where the remandees are unable to meet the bail terms)', 9, 3, 2, 3, 100, 200, NULL, NULL, 9, '2022-04-19 11:20:51', '2022-04-20 07:36:25'),
(46, 10, 'Case clearance rate for Criminal Cases', 9, 1, 1, 4, 100, 100, NULL, NULL, 10, '2022-04-19 11:20:51', '2022-04-20 07:36:31'),
(47, 11, 'Case clearance rate for Civil Cases', 9, 1, 1, 4, 100, 100, NULL, NULL, 11, '2022-04-19 11:20:51', '2022-04-20 07:36:32'),
(48, 12, 'Case Clearance Rate for Traffic Cases', 9, 2, 1, 3, 100, 100, NULL, NULL, 12, '2022-04-19 11:20:51', '2022-04-20 07:36:33'),
(49, 13, 'Percentage reduction of backlog', 9, 1, 1, 4, -20, -10, NULL, NULL, 13, '2022-04-19 11:20:51', '2022-04-20 07:36:36'),
(50, 14, 'Merit  Productivity', 9, 2, 4, 6, 2500, 5000, NULL, NULL, 14, '2022-04-19 11:20:51', '2022-04-20 09:28:50'),
(51, 15, 'Other Productivity', 9, 2, 4, 3, 1500, 9000, NULL, NULL, 15, '2022-04-19 11:20:51', '2022-04-20 08:10:50'),
(52, 7, 'Delivery of Judgments and rulings -% of judgement/rulings delivered within 60 days of conclusion of the hearing', 9, 2, 1, 3, 100, 98, NULL, NULL, 7, '2022-04-19 11:20:51', '2022-04-20 09:20:08'),
(53, 16, 'Advance communication of adjournments of trials/hearings& date of delivery of judgements/rulings', 10, 2, 1, 2, 100, 100, NULL, NULL, 1, '2022-04-19 11:20:51', '2022-04-20 07:37:37'),
(54, 17, 'Percentage of trial/hearings held when first cause listed', 10, 2, 1, 2, 100, 100, NULL, NULL, 2, '2022-04-19 11:20:51', '2022-04-20 07:37:38'),
(55, 18, 'Percentage of pre-trial events held when first listed – mentions and supervision for compliance by parties in filing pleadings/exhibits', 10, 1, 1, 1, 100, 100, NULL, NULL, 3, '2022-04-19 11:20:51', '2022-04-20 07:37:40'),
(56, 19, 'Submission of Court proceedings for appealed Matters within 60 days from date of receipt of notice', 10, 2, 1, 2, 100, 100, NULL, NULL, 4, '2022-04-19 11:20:51', '2022-04-20 07:37:42'),
(57, 20, 'Use of ADR mechanism in resolution of cases. - % of cases referred for ADR and concluded', 10, 1, 1, 2, 10, 50, NULL, NULL, 5, '2022-04-19 11:20:51', '2022-04-20 07:37:50'),
(58, 21, 'Publish daily cause lists and posting online seven days in advance', 10, 1, 1, 1, 100, 100, NULL, NULL, 6, '2022-04-19 11:20:51', '2022-04-20 07:37:56'),
(59, 22, 'Stakeholder Engagement', 10, 2, 1, 2, 100, 100, NULL, NULL, 7, '2022-04-19 11:20:51', '2022-04-20 07:37:58'),
(60, 23, 'Timely Submission of accurate monthly court returns', 10, 2, 1, 2, 100, 100, NULL, NULL, 8, '2022-04-19 11:20:51', '2022-04-20 08:24:13'),
(61, 24, 'Implement the Registry Manual procedures', 11, 1, 1, 3, 100, 110, NULL, NULL, 1, '2022-04-19 11:20:51', '2022-04-20 07:38:14'),
(62, 25, 'Maintain and update all registers', 11, 2, 1, 3, 100, 100, NULL, NULL, 2, '2022-04-19 11:20:52', '2022-04-20 07:38:18'),
(63, 25, 'Maintain and Update  all registers', 12, 2, 5, 1, 1, 5, NULL, NULL, 1, '2022-04-19 11:20:52', '2022-04-20 07:47:38'),
(64, 27, 'Supervision of construction (Where applicable)', 12, 2, 3, 1, 1, 7, NULL, NULL, 2, '2022-04-19 11:20:52', '2022-04-20 08:16:54'),
(65, 143, 'Disposal of idle assets (Where applicable)', 12, 1, 3, 1, 1, 1, NULL, NULL, 3, '2022-04-19 11:20:52', '2022-04-20 07:51:49'),
(66, 29, 'Compliance with the budget', 13, 1, 1, 1, 100, 100, NULL, NULL, 1, '2022-04-19 11:20:52', '2022-04-20 07:40:12'),
(67, 30, 'Revenue Management', 13, 2, 1, 2, 100, 300, NULL, NULL, 2, '2022-04-19 11:20:52', '2022-04-20 07:52:00'),
(68, 31, 'Implementation of Audit report recommendations.', 13, 2, 3, 2, 2, 5, NULL, NULL, 3, '2022-04-19 11:20:52', '2022-04-20 07:57:45'),
(69, 32, 'Compliance with Service Delivery Charter Standards', 14, 1, 1, 4, 100, 100, NULL, NULL, 1, '2022-04-19 11:20:52', '2022-04-20 07:39:28'),
(70, 33, 'Service improvement Innovations', 15, 1, 4, 2, 5, 7, NULL, NULL, 1, '2022-04-19 11:20:52', '2022-04-20 07:39:41'),
(71, 34, 'Competency development', 15, 1, 4, 2, 20, 20, NULL, NULL, 2, '2022-04-19 11:20:52', '2022-04-20 07:39:49'),
(72, 35, 'Corruption Prevention &Eradication', 16, 2, 1, 2, 100, 110, NULL, NULL, 1, '2022-04-19 11:20:52', '2022-04-20 07:40:34'),
(73, 36, 'Improve Employee wellness and work environment', 16, 1, 1, 1, 100, 100, NULL, NULL, 2, '2022-04-19 11:20:52', '2022-04-20 07:40:38'),
(74, 37, 'Implement court user survey recommendations', 16, 2, 1, 2, 100, 100, NULL, NULL, 3, '2022-04-19 11:20:52', '2022-04-20 09:23:23'),
(75, 1, 'Certified Urgent Applications - % of certified urgent applications concluded within 30 days from the date of certification', 17, 1, 1, 3, NULL, NULL, NULL, NULL, 1, '2022-04-20 09:42:10', '2022-04-20 09:42:10'),
(76, 2, 'Injunction applications -% of applications heard and determined within 90 days of filing', 17, 1, 1, 3, NULL, NULL, NULL, NULL, 2, '2022-04-20 09:42:10', '2022-04-20 09:42:10'),
(77, 3, 'All other applications (Including Criminal revisions, Ad-litem, rectifications, citations, etc.) -% of applications concluded within 90 days from date of filing', 17, 1, 1, 3, NULL, NULL, NULL, NULL, 3, '2022-04-20 09:42:10', '2022-04-20 09:42:10'),
(78, 4, 'Hearing & determination of Criminal cases -% of cases concluded within 360 days from date of filing', 17, 2, 1, 7, NULL, NULL, NULL, NULL, 4, '2022-04-20 09:42:10', '2022-04-20 09:42:10'),
(79, 5, 'Hearing and determination of Civil cases including contested Succession causes.  -% of cases concluded within 360 days from date of filing', 17, 2, 1, 8, NULL, NULL, NULL, NULL, 5, '2022-04-20 09:42:10', '2022-04-20 09:42:10'),
(80, 6, 'Percentage of judgements/rulings delivered on the date first scheduled for delivery', 17, 2, 1, 3, NULL, NULL, NULL, NULL, 6, '2022-04-20 09:42:10', '2022-04-20 09:42:10'),
(81, 8, 'Applications in criminal matters -% of applications concluded within 90 days of filing', 17, 2, 1, 3, NULL, NULL, NULL, NULL, 8, '2022-04-20 09:42:10', '2022-04-20 09:42:10'),
(82, 9, 'Reduced no. of days spent in remand custody from the “Date of plea” to the “Date of conclusion of the matter”( where bail has been denied or where the remandees are unable to meet the bail terms)', 17, 3, 2, 3, NULL, NULL, NULL, NULL, 9, '2022-04-20 09:42:10', '2022-04-20 09:42:10'),
(83, 10, 'Case clearance rate for Criminal Cases', 17, 1, 1, 4, NULL, NULL, NULL, NULL, 10, '2022-04-20 09:42:10', '2022-04-20 09:42:10'),
(84, 11, 'Case clearance rate for Civil Cases', 17, 1, 1, 4, NULL, NULL, NULL, NULL, 11, '2022-04-20 09:42:10', '2022-04-20 09:42:10'),
(85, 12, 'Case Clearance Rate for Traffic Cases', 17, 2, 1, 3, NULL, NULL, NULL, NULL, 12, '2022-04-20 09:42:10', '2022-04-20 09:42:10'),
(86, 13, 'Percentage reduction of backlog', 17, 1, 1, 4, NULL, NULL, NULL, NULL, 13, '2022-04-20 09:42:10', '2022-04-20 09:42:10'),
(87, 14, 'Merit  Productivity', 17, 2, 4, 6, NULL, NULL, NULL, NULL, 14, '2022-04-20 09:42:10', '2022-04-20 09:42:10'),
(88, 15, 'Other Productivity', 17, 2, 4, 3, NULL, NULL, NULL, NULL, 15, '2022-04-20 09:42:10', '2022-04-20 09:42:10'),
(89, 7, 'Delivery of Judgments and rulings -% of judgement/rulings delivered within 60 days of conclusion of the hearing', 17, 2, 1, 3, NULL, NULL, NULL, NULL, 7, '2022-04-20 09:42:10', '2022-04-20 09:42:10'),
(90, 16, 'Advance communication of adjournments of trials/hearings& date of delivery of judgements/rulings', 18, 2, 1, 2, NULL, NULL, NULL, NULL, 1, '2022-04-20 09:42:11', '2022-04-20 09:42:11'),
(91, 17, 'Percentage of trial/hearings held when first cause listed', 18, 2, 1, 2, NULL, NULL, NULL, NULL, 2, '2022-04-20 09:42:11', '2022-04-20 09:42:11'),
(92, 18, 'Percentage of pre-trial events held when first listed – mentions and supervision for compliance by parties in filing pleadings/exhibits', 18, 1, 1, 1, NULL, NULL, NULL, NULL, 3, '2022-04-20 09:42:11', '2022-04-20 09:42:11'),
(93, 19, 'Submission of Court proceedings for appealed Matters within 60 days from date of receipt of notice', 18, 2, 1, 2, NULL, NULL, NULL, NULL, 4, '2022-04-20 09:42:11', '2022-04-20 09:42:11'),
(94, 20, 'Use of ADR mechanism in resolution of cases. - % of cases referred for ADR and concluded', 18, 1, 1, 2, NULL, NULL, NULL, NULL, 5, '2022-04-20 09:42:11', '2022-04-20 09:42:11'),
(95, 21, 'Publish daily cause lists and posting online seven days in advance', 18, 1, 1, 1, NULL, NULL, NULL, NULL, 6, '2022-04-20 09:42:11', '2022-04-20 09:42:11'),
(96, 22, 'Stakeholder Engagement', 18, 2, 1, 2, NULL, NULL, NULL, NULL, 7, '2022-04-20 09:42:11', '2022-04-20 09:42:11'),
(97, 23, 'Timely Submission of accurate monthly court returns', 18, 2, 1, 2, NULL, NULL, NULL, NULL, 8, '2022-04-20 09:42:11', '2022-04-20 09:42:11'),
(98, 24, 'Implement the Registry Manual procedures', 19, 1, 1, 3, NULL, NULL, NULL, NULL, 1, '2022-04-20 09:42:11', '2022-04-20 09:42:11'),
(99, 25, 'Maintain and update all registers', 19, 2, 1, 3, NULL, NULL, NULL, NULL, 2, '2022-04-20 09:42:11', '2022-04-20 09:42:11'),
(100, 25, 'Maintain and Update  all registers', 20, 2, 5, 1, NULL, NULL, NULL, NULL, 1, '2022-04-20 09:42:11', '2022-04-20 09:42:11'),
(101, 27, 'Supervision of construction (Where applicable)', 20, 2, 3, 1, NULL, NULL, NULL, NULL, 2, '2022-04-20 09:42:11', '2022-04-20 09:42:11'),
(102, 143, 'Disposal of idle assets (Where applicable)', 20, 1, 3, 1, NULL, NULL, NULL, NULL, 3, '2022-04-20 09:42:11', '2022-04-20 09:42:11'),
(103, 29, 'Compliance with the budget', 21, 1, 1, 1, NULL, NULL, NULL, NULL, 1, '2022-04-20 09:42:12', '2022-04-20 09:42:12'),
(104, 30, 'Revenue Management', 21, 2, 1, 2, NULL, NULL, NULL, NULL, 2, '2022-04-20 09:42:12', '2022-04-20 09:42:12'),
(105, 31, 'Implementation of Audit report recommendations.', 21, 2, 3, 2, NULL, NULL, NULL, NULL, 3, '2022-04-20 09:42:12', '2022-04-20 09:42:12'),
(106, 32, 'Compliance with Service Delivery Charter Standards', 22, 1, 1, 4, NULL, NULL, NULL, NULL, 1, '2022-04-20 09:42:12', '2022-04-20 09:42:12'),
(107, 33, 'Service improvement Innovations', 23, 1, 4, 2, NULL, NULL, NULL, NULL, 1, '2022-04-20 09:42:12', '2022-04-20 09:42:12'),
(108, 34, 'Competency development', 23, 1, 4, 2, NULL, NULL, NULL, NULL, 2, '2022-04-20 09:42:12', '2022-04-20 09:42:12'),
(109, 35, 'Corruption Prevention &Eradication', 24, 2, 1, 2, NULL, NULL, NULL, NULL, 1, '2022-04-20 09:42:12', '2022-04-20 09:42:12'),
(110, 36, 'Improve Employee wellness and work environment', 24, 1, 1, 1, NULL, NULL, NULL, NULL, 2, '2022-04-20 09:42:12', '2022-04-20 09:42:12'),
(111, 37, 'Implement court user survey recommendations', 24, 2, 1, 1, NULL, NULL, NULL, NULL, 3, '2022-04-20 09:42:12', '2022-04-20 09:42:12');

-- --------------------------------------------------------

--
-- Table structure for table `indicator_groups`
--

CREATE TABLE `indicator_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unit_rank_id` bigint(20) UNSIGNED DEFAULT NULL,
  `financial_year_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `indicator_groups`
--

INSERT INTO `indicator_groups` (`id`, `name`, `description`, `order`, `deleted_at`, `unit_id`, `unit_rank_id`, `financial_year_id`, `created_at`, `updated_at`) VALUES
(1, 'A.1. Expeditious Delivery of Justice – Caseload', 'Expeditious Delivery of Justice – Caseload', 1, NULL, 236, 6, 4, '2022-04-13 10:43:13', '2022-04-13 10:43:13'),
(2, 'A.2. Expeditious Delivery of Justice – Administration', 'Expeditious Delivery of Justice – Administration', 2, NULL, 236, 6, 4, '2022-04-13 10:43:14', '2022-04-13 10:43:14'),
(3, 'A.3. Court files Integrity', 'Court files Integrity', 3, NULL, 236, 6, 4, '2022-04-13 10:43:14', '2022-04-13 10:43:14'),
(4, 'B.  COURT INFRASTRUCTURE', 'COURT INFRASTRUCTURE', 4, NULL, 236, 6, 4, '2022-04-13 10:43:15', '2022-04-13 10:43:15'),
(5, 'C. FINANCIAL PERSPECTIVE', 'FINANCIAL PERSPECTIVE', 5, NULL, 236, 6, 4, '2022-04-13 10:43:15', '2022-04-13 10:43:15'),
(6, 'D. CUSTOMER PERSPECTIVE', 'CUSTOMER PERSPECTIVE', 6, NULL, 236, 6, 4, '2022-04-13 10:43:15', '2022-04-13 10:43:15'),
(7, 'E. INNOVATION AND LEARNING', 'INNOVATION AND LEARNING', 7, NULL, 236, 6, 4, '2022-04-13 10:43:15', '2022-04-13 10:43:15'),
(8, 'F. INTERNAL PROCESSES', 'INTERNAL PROCESSES', 8, NULL, 236, 6, 4, '2022-04-13 10:43:15', '2022-04-13 10:43:15'),
(9, 'A.1. Expeditious Delivery of Justice – Caseload', 'Expeditious Delivery of Justice – Caseload', 1, NULL, 191, 6, 4, '2022-04-19 11:20:50', '2022-04-19 11:20:50'),
(10, 'A.2. Expeditious Delivery of Justice – Administration', 'Expeditious Delivery of Justice – Administration', 2, NULL, 191, 6, 4, '2022-04-19 11:20:51', '2022-04-19 11:20:51'),
(11, 'A.3. Court files Integrity', 'Court files Integrity', 3, NULL, 191, 6, 4, '2022-04-19 11:20:51', '2022-04-19 11:20:51'),
(12, 'B.  COURT INFRASTRUCTURE', 'COURT INFRASTRUCTURE', 4, NULL, 191, 6, 4, '2022-04-19 11:20:52', '2022-04-19 11:20:52'),
(13, 'C. FINANCIAL PERSPECTIVE', 'FINANCIAL PERSPECTIVE', 5, NULL, 191, 6, 4, '2022-04-19 11:20:52', '2022-04-19 11:20:52'),
(14, 'D. CUSTOMER PERSPECTIVE', 'CUSTOMER PERSPECTIVE', 6, NULL, 191, 6, 4, '2022-04-19 11:20:52', '2022-04-19 11:20:52'),
(15, 'E. INNOVATION AND LEARNING', 'INNOVATION AND LEARNING', 7, NULL, 191, 6, 4, '2022-04-19 11:20:52', '2022-04-19 11:20:52'),
(16, 'F. INTERNAL PROCESSES', 'INTERNAL PROCESSES', 8, NULL, 191, 6, 4, '2022-04-19 11:20:52', '2022-04-19 11:20:52'),
(17, 'A.1. Expeditious Delivery of Justice – Caseload', 'Expeditious Delivery of Justice – Caseload', 1, NULL, 118, 6, 4, '2022-04-20 09:42:10', '2022-04-20 09:42:10'),
(18, 'A.2. Expeditious Delivery of Justice – Administration', 'Expeditious Delivery of Justice – Administration', 2, NULL, 118, 6, 4, '2022-04-20 09:42:11', '2022-04-20 09:42:11'),
(19, 'A.3. Court files Integrity', 'Court files Integrity', 3, NULL, 118, 6, 4, '2022-04-20 09:42:11', '2022-04-20 09:42:11'),
(20, 'B.  COURT INFRASTRUCTURE', 'COURT INFRASTRUCTURE', 4, NULL, 118, 6, 4, '2022-04-20 09:42:11', '2022-04-20 09:42:11'),
(21, 'C. FINANCIAL PERSPECTIVE', 'FINANCIAL PERSPECTIVE', 5, NULL, 118, 6, 4, '2022-04-20 09:42:11', '2022-04-20 09:42:11'),
(22, 'D. CUSTOMER PERSPECTIVE', 'CUSTOMER PERSPECTIVE', 6, NULL, 118, 6, 4, '2022-04-20 09:42:12', '2022-04-20 09:42:12'),
(23, 'E. INNOVATION AND LEARNING', 'INNOVATION AND LEARNING', 7, NULL, 118, 6, 4, '2022-04-20 09:42:12', '2022-04-20 09:42:12'),
(24, 'F. INTERNAL PROCESSES', 'INTERNAL PROCESSES', 8, NULL, 118, 6, 4, '2022-04-20 09:42:12', '2022-04-20 09:42:12');

-- --------------------------------------------------------

--
-- Table structure for table `indicator_types`
--

CREATE TABLE `indicator_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `indicator_types`
--

INSERT INTO `indicator_types` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Special ', NULL, NULL, NULL),
(2, 'Normal', NULL, NULL, NULL),
(3, 'Declining', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `indicator_unit_of_measures`
--

CREATE TABLE `indicator_unit_of_measures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `indicator_unit_of_measures`
--

INSERT INTO `indicator_unit_of_measures` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Percentage', NULL, NULL, NULL),
(2, 'No. of Days', NULL, NULL, NULL),
(3, 'Report', NULL, NULL, NULL),
(4, 'Number', NULL, NULL, NULL),
(5, 'Register', NULL, NULL, NULL);

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
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_indicators`
--

INSERT INTO `master_indicators` (`id`, `name`, `unit_rank_id`, `unit_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Certified Urgent Applications - % of certified urgent applications concluded within 30 days from the date of certification', 6, 100, NULL, '2022-04-06 06:15:44', '2022-04-06 06:15:44'),
(2, 'Injunction applications -% of injunction applications heard and determined within 90 days of filing', 6, 100, NULL, '2022-04-06 06:16:16', '2022-04-06 06:16:16'),
(3, 'All Other Applications -% of other applications heard and determined within 180 days of filing', 6, 100, NULL, '2022-04-06 06:16:30', '2022-04-06 06:16:30'),
(4, 'Hearing and determination of Criminal cases -% of cases concluded within 360 days of filing', 6, 100, NULL, '2022-04-06 06:16:53', '2022-04-06 06:16:53'),
(5, 'Hearing and determination of Civil cases -% of cases concluded within 360 days of filing', 6, 100, NULL, '2022-04-06 06:17:07', '2022-04-06 06:17:07'),
(6, 'Percentage of judgments/rulings delivered on the date first scheduled for delivery', 6, 100, NULL, '2022-04-06 06:18:10', '2022-04-06 06:18:10'),
(7, 'Delivery of Judgments & Rulings -% of judgments & rulings delivered within 60 days of conclusion of the hearing', 6, 100, NULL, '2022-04-06 06:18:46', '2022-04-06 06:18:46'),
(8, 'Applications in criminal matters -% of applications  concluded within 90 days of filing', 6, 100, NULL, '2022-04-06 06:19:47', '2022-04-06 06:19:47'),
(9, 'Reduced no. of days spent in remand custody from the “Date of plea” to the “Date of conclusion of the matter”( where bail has been denied or where the remandees are unable to meet the bail terms)', 6, 100, NULL, '2022-04-06 06:21:07', '2022-04-06 06:21:07'),
(10, 'Case clearance rate for Criminal Cases', 6, 100, NULL, '2022-04-06 06:27:33', '2022-04-06 06:27:33'),
(11, 'Case clearance rate for Civil Cases', 6, 100, NULL, '2022-04-06 06:29:09', '2022-04-06 06:29:09'),
(12, 'Case Clearance Rate  for Traffic Cases', 6, 100, NULL, '2022-04-06 06:31:16', '2022-04-06 06:31:16'),
(13, 'Percentage reduction of backlog', 6, 100, NULL, '2022-04-06 06:31:39', '2022-04-06 06:31:39'),
(14, 'Merit  Productivity', 6, 100, NULL, '2022-04-06 06:32:06', '2022-04-06 06:32:06'),
(15, 'Other productivity', 6, 100, NULL, '2022-04-06 06:32:19', '2022-04-06 06:32:19'),
(16, 'Advance communication of adjournments of trials & hearings and date of judgment of delivery of judgments/rulings', 6, 100, NULL, '2022-04-06 06:32:38', '2022-04-06 06:32:38'),
(17, 'Percentage of trial/hearings held when first cause listed', 6, 100, NULL, '2022-04-06 06:32:54', '2022-04-06 06:32:54'),
(18, 'Percentage of pre-trial events held when first listed – mentions and supervision for compliance by parties in filing pleadings/exhibits', 6, 100, NULL, '2022-04-06 06:33:27', '2022-04-06 06:33:27'),
(19, 'Submission of Court proceedings for appealed Matters within 60 days from date of receipt of notice', 6, 100, NULL, '2022-04-06 06:33:47', '2022-04-06 06:33:47'),
(20, 'Use of ADR mechanism in resolution of cases. - % of cases referred for ADR and concluded', 6, 100, NULL, '2022-04-06 06:34:01', '2022-04-06 06:34:01'),
(21, 'Publish daily cause lists and posting on the notice board/online - seven days in advance', 6, 100, NULL, '2022-04-06 06:34:16', '2022-04-06 06:34:16'),
(22, 'Stakeholder Engagement', 6, 100, NULL, '2022-04-06 06:34:29', '2022-04-06 06:34:29'),
(23, 'Submission of accurate monthly  court returns', 6, 100, NULL, '2022-04-06 06:34:42', '2022-04-06 06:34:42'),
(24, 'Implement the Registry Manual procedures', 6, 100, NULL, '2022-04-06 06:34:58', '2022-04-06 06:34:58'),
(25, 'Maintain and Update  all registers', 6, 100, NULL, '2022-04-06 06:35:38', '2022-04-06 06:36:22'),
(26, 'Maintenance of asset and equipment register', 6, 100, NULL, '2022-04-06 06:36:38', '2022-04-06 06:36:38'),
(27, 'Supervision of construction ( Where applicable)', 6, 100, NULL, '2022-04-06 06:36:52', '2022-04-06 06:36:52'),
(28, 'Disposal of old concluded court files ( Where applicable)', 6, 100, NULL, '2022-04-06 06:37:04', '2022-04-06 06:37:04'),
(29, 'Compliance with the budget', 6, 100, NULL, '2022-04-06 06:42:32', '2022-04-06 06:42:32'),
(30, 'Revenue Management', 6, 100, NULL, '2022-04-06 06:42:45', '2022-04-06 06:42:45'),
(31, 'Implementation of Audit report recommendations.', 6, 100, NULL, '2022-04-06 06:43:04', '2022-04-06 06:43:04'),
(32, 'Compliance with Service Delivery Charter Standards', 6, 100, NULL, '2022-04-06 06:43:29', '2022-04-06 06:43:29'),
(33, 'Service improvement Innovations', 6, 100, NULL, '2022-04-06 06:43:47', '2022-04-06 06:43:47'),
(34, 'Competency development', 6, 100, NULL, '2022-04-06 06:44:05', '2022-04-06 06:44:05'),
(35, 'Corruption Prevention & Eradication', 6, 100, NULL, '2022-04-06 06:44:30', '2022-04-06 06:44:30'),
(36, 'Improve Employee wellness and work environment', 6, 100, NULL, '2022-04-06 06:44:47', '2022-04-06 06:44:47'),
(37, 'Implement court user survey recommendations', 6, 100, NULL, '2022-04-06 06:47:04', '2022-04-06 06:47:04'),
(38, 'Certified Urgent Applications - % of certified urgent applications concluded within 90 days from the date of certification', 3, 100, NULL, '2022-04-06 07:12:07', '2022-04-06 07:12:07'),
(39, 'Injunction applications -% of applications heard and determined within 90 days of filing', 3, 100, NULL, '2022-04-06 07:12:36', '2022-04-06 07:12:36'),
(40, 'All other applications (Including Criminal revisions, Ad-litem, rectifications, citations, etc.) -% of applications concluded within 90 days from date of filing', 3, 100, NULL, '2022-04-06 07:12:48', '2022-04-06 07:12:48'),
(41, 'Hearing & Determination of Constitutional Petitions -% of cases  concluded within 180 days from date of filing', 3, 100, NULL, '2022-04-06 07:13:09', '2022-04-06 07:13:18'),
(42, 'Hearing & Determination of Judicial Review cases -% of cases  concluded within 180 days from date of filing', 3, 100, NULL, '2022-04-06 07:13:55', '2022-04-06 07:14:02'),
(43, 'Hearing & determination of Criminal cases -% of cases concluded within 360 days from date of filing', 3, 100, NULL, '2022-04-06 07:14:33', '2022-04-06 07:14:42'),
(44, 'Hearing and determination of Civil cases including contested Succession causes.  -% of cases concluded within 360 days from date of filing', 3, 100, NULL, '2022-04-06 07:14:58', '2022-04-06 07:15:04'),
(45, 'Hearing and determination of Civil Appeals -% of appeals concluded within 180 days from the receipt of the record of appeal', 3, 100, NULL, '2022-04-06 07:16:40', '2022-04-06 07:16:40'),
(46, 'Hearing and determination of Criminal Appeals -% of appeals concluded within 180 days from the receipt of the record of appeal', 3, 100, NULL, '2022-04-06 07:16:54', '2022-04-06 07:16:54'),
(47, 'Time for dissemination of all decisions -% of decisions disseminated within 7 days from date of delivery', 3, 100, NULL, '2022-04-06 07:17:08', '2022-04-06 07:17:08'),
(48, 'Reduced no. of days spent in remand custody from the “Date of plea” to the “Date of conclusion of the matter”( where bail has been denied or where the remandees are unable to meet the bail terms)', 3, 100, NULL, '2022-04-06 07:17:27', '2022-04-06 07:17:27'),
(49, 'Percentage of trials/hearings held when first listed for hearing', 3, 100, NULL, '2022-04-06 07:18:16', '2022-04-06 07:18:16'),
(50, 'Percentage of judgments/rulings delivered on the date first scheduled for delivery', 3, 100, NULL, '2022-04-06 07:18:34', '2022-04-06 07:18:34'),
(51, 'Use of Court Annex Mediation in resolution of cases. - % of cases referred for CAM/ADR  and concluded', 3, 100, NULL, '2022-04-06 07:19:20', '2022-04-06 07:19:34'),
(52, 'Advance communication of adjournments of trials/hearings &date of delivery of judgments /rulings', 3, 100, NULL, '2022-04-06 07:19:51', '2022-04-06 07:19:51'),
(53, 'Publish daily cause lists and posting online seven days in advance', 3, 100, NULL, '2022-04-06 07:20:05', '2022-04-06 07:20:05'),
(54, 'Delivery of Judgments and rulings -% of judgement/rulings delivered within 60 days of conclusion of the hearing', 3, 100, NULL, '2022-04-06 07:20:22', '2022-04-06 07:20:22'),
(55, 'Stakeholder Engagement', 3, 100, NULL, '2022-04-06 07:20:35', '2022-04-06 07:20:35'),
(56, 'Submission of Court proceedings for appealed Matters within 60 days from date of receipt of notice', 3, 100, NULL, '2022-04-06 07:20:49', '2022-04-06 07:20:49'),
(57, 'Taxation matters  -% of matters concluded within 60 days', 3, 100, NULL, '2022-04-06 07:21:02', '2022-04-06 07:21:02'),
(58, 'Decrees and warrants  -% decrees and warrants prepared within 4 days', 3, 100, NULL, '2022-04-06 07:21:20', '2022-04-06 07:21:20'),
(59, 'Case clearance rate for Civil Cases', 3, 100, NULL, '2022-04-06 07:21:33', '2022-04-06 07:21:33'),
(60, 'Case clearance rate for Criminal Cases', 3, 100, NULL, '2022-04-06 07:21:44', '2022-04-06 07:21:44'),
(61, 'Percentage reduction of backlog', 3, 100, NULL, '2022-04-06 07:22:00', '2022-04-06 07:22:00'),
(62, 'Merit  Productivity', 3, 100, NULL, '2022-04-06 07:22:19', '2022-04-06 07:22:19'),
(63, 'Other productivity', 3, 100, NULL, '2022-04-06 07:22:30', '2022-04-06 07:22:30'),
(64, 'Submission of Accurate monthly  court returns', 3, 100, NULL, '2022-04-06 07:22:44', '2022-04-06 07:22:44'),
(65, 'Supervision of Subordinate  Courts', 3, 100, NULL, '2022-04-06 07:23:01', '2022-04-06 07:23:01'),
(66, 'Hearing and determination of Presidential Election petitions within 14 days from date of filing', 1, 100, NULL, '2022-04-06 07:41:22', '2022-04-06 07:49:41'),
(67, 'Delivery of full Judgment within 21 days (where the court reserves reasons for its decisions)', 1, 100, NULL, '2022-04-06 07:41:33', '2022-04-06 07:41:33'),
(68, 'Hearing and determination of general applications -% of cases concluded within 60days from date of filing', 1, 100, NULL, '2022-04-06 07:41:44', '2022-04-06 07:42:19'),
(69, 'Advisory opinion-% of references concluded within 90 days from close of submissions', 1, 100, NULL, '2022-04-06 07:42:00', '2022-04-06 07:42:00'),
(70, 'Hearing and determination of appeals from the Court of Appeal-% of appeals concluded within 90days from date of filing', 1, 100, NULL, '2022-04-06 07:42:13', '2022-04-06 07:42:13'),
(71, 'Time for dissemination of all decisions-% of decisions disseminated within 7days from date of delivery', 1, 100, NULL, '2022-04-06 07:42:44', '2022-04-06 07:42:44'),
(72, 'Percentage of trials held when first listed for hearing', 1, 100, NULL, '2022-04-06 07:42:58', '2022-04-06 07:42:58'),
(73, 'Percentage of judgment/ rulings delivered on the date when first scheduled for delivery', 1, 100, NULL, '2022-04-06 07:43:51', '2022-04-06 07:43:51'),
(74, 'Advance communication of adjournment of hearings dates and delivery of Judgment', 1, 100, NULL, '2022-04-06 07:44:02', '2022-04-06 07:44:02'),
(75, 'Percentage of Judgment/ rulings rendered within 90days after close of submission', 1, 100, NULL, '2022-04-06 07:44:14', '2022-04-06 07:44:14'),
(76, 'Case clearance rate', 1, 100, NULL, '2022-04-06 07:44:28', '2022-04-06 07:44:28'),
(77, 'Percentage reduction of backlog', 1, 100, NULL, '2022-04-06 07:44:42', '2022-04-06 07:44:42'),
(78, 'Merit  Productivity', 1, 100, NULL, '2022-04-06 07:44:54', '2022-04-06 07:44:54'),
(79, 'Other Productivity', 1, 100, NULL, '2022-04-06 07:45:07', '2022-04-06 07:45:07'),
(80, 'Submission of accurate  monthly  court returns', 1, 100, NULL, '2022-04-06 07:45:22', '2022-04-06 07:45:22'),
(81, 'Certified Urgent Applications -% of applications concluded within 90 days from the date of certification', 4, 100, NULL, '2022-04-06 07:58:57', '2022-04-06 07:58:57'),
(82, 'Injunctions Applications -% of Miscellaneous applications heard and determined within 90 days from the date of filling', 4, 100, NULL, '2022-04-06 07:59:11', '2022-04-06 07:59:11'),
(83, 'All other applications -% of applications concluded within 180 days from date of filing', 4, 100, NULL, '2022-04-06 08:00:26', '2022-04-06 08:00:26'),
(84, 'Hearing & determination of ELRC Petitions -% of ELRC Petitions concluded within 360 days from date of filing', 4, 100, NULL, '2022-04-06 08:00:39', '2022-04-06 08:00:39'),
(85, 'Hearing & determination of ELRC Appeals -% of ELRC Appeals concluded within 180 days from date of filing', 4, 100, NULL, '2022-04-06 08:00:53', '2022-04-06 08:00:53'),
(86, 'Hearing & determination of substantive claims -% of substantive claims determined within 360 days of filing', 4, 100, NULL, '2022-04-06 08:01:08', '2022-04-06 08:01:18'),
(87, 'Hearing and determination of ELRC Judicial Reviews -% of ELRC Judicial Reviews concluded within 90 days from date of filing', 4, 100, NULL, '2022-04-06 08:01:34', '2022-04-06 08:01:34'),
(88, 'Delivery of Judgments and rulings -% of judgement/rulings delivered within 60 days of conclusion of the hearing', 4, 100, NULL, '2022-04-06 08:01:47', '2022-04-06 08:01:47'),
(89, 'Time for dissemination of all decisions -% of decisions disseminated within 7 days from date of delivery', 4, 100, NULL, '2022-04-06 08:02:27', '2022-04-06 08:02:27'),
(90, 'Percentage of trials/hearings held when first listed for hearing', 4, 100, NULL, '2022-04-06 08:02:58', '2022-04-06 08:02:58'),
(91, 'Percentage of judgements/rulings delivered on the date first scheduled for delivery', 4, 100, NULL, '2022-04-06 08:03:27', '2022-04-06 08:03:27'),
(92, 'Use of Court Annex Mediation in resolution of cases. - % of cases referred for CAM/ADR and completed', 4, 100, NULL, '2022-04-06 08:03:41', '2022-04-06 08:03:49'),
(93, 'Advance communication of adjournments of trials/hearings& date of delivery of judgements/rulings', 4, 100, NULL, '2022-04-06 08:03:59', '2022-04-06 08:03:59'),
(94, 'Publish daily cause lists and posting online seven days in advance', 4, 100, NULL, '2022-04-06 08:04:18', '2022-04-06 08:04:18'),
(95, 'Stakeholder Engagement', 4, 100, NULL, '2022-04-06 08:06:00', '2022-04-06 08:06:00'),
(96, 'Submission of Court proceedings for appealed Matters within 60 days from date of receipt of notice', 4, 100, NULL, '2022-04-06 08:12:32', '2022-04-06 08:12:32'),
(97, 'Taxation matters -% of matters concluded within 60 days', 4, 100, NULL, '2022-04-06 08:12:50', '2022-04-06 08:12:50'),
(98, 'Decrees and warrants -% decrees and warrants prepared within 4 days', 4, 100, NULL, '2022-04-06 08:13:03', '2022-04-06 08:13:03'),
(99, 'Case clearance rate', 4, 100, NULL, '2022-04-06 08:13:18', '2022-04-06 08:13:18'),
(100, 'Percentage reduction of backlog', 4, 100, NULL, '2022-04-06 08:13:31', '2022-04-06 08:13:31'),
(101, 'Merit Productivity', 4, 100, NULL, '2022-04-06 08:13:50', '2022-04-06 08:13:50'),
(102, 'Other Productivity', 4, 100, NULL, '2022-04-06 08:14:11', '2022-04-06 08:14:11'),
(103, 'Submission of Accurate monthly court returns', 4, 100, NULL, '2022-04-06 08:14:24', '2022-04-06 08:14:24'),
(104, 'Certified Urgent Applications -% of applications concluded within 90 days from date of filing', 5, 100, NULL, '2022-04-06 08:25:16', '2022-04-06 08:25:16'),
(105, 'Injunction applications -% of applications heard within 60 days of filing', 5, 100, NULL, '2022-04-06 08:25:29', '2022-04-06 08:25:29'),
(106, 'All other applications -% of applications concluded within 180 days from date of filing', 5, 100, NULL, '2022-04-06 08:25:43', '2022-04-06 08:25:43'),
(107, 'Hearing and determination of ELC cases -% of cases concluded within 360 days from date of filing', 5, 100, NULL, '2022-04-06 08:28:37', '2022-04-06 08:28:37'),
(108, 'Land related constitutional petitions -% of petitions concluded within 180 days from date of filing', 5, 100, NULL, '2022-04-06 08:29:12', '2022-04-06 08:29:12'),
(109, 'Delivery of Judgments and rulings -% of judgement/rulings delivered within 60 days of conclusion of the hearing', 5, 100, NULL, '2022-04-06 08:34:32', '2022-04-06 08:34:32'),
(110, 'Judicial Review cases -% of applications concluded within 360 days from date of filing', 5, 100, NULL, '2022-04-06 08:34:46', '2022-04-06 08:34:46'),
(111, 'Time for dissemination of all decisions -% of decisions disseminated within 7 days from date of delivery', 5, 100, NULL, '2022-04-06 08:35:03', '2022-04-06 08:35:03'),
(112, 'Hearing and Determination of ELC Appeals from subordinate courts -% of appeals concluded within 360 days', 5, 100, NULL, '2022-04-06 08:35:18', '2022-04-06 08:35:18'),
(113, 'Percentage of trials/hearings held when first listed for hearing', 5, 100, NULL, '2022-04-06 08:39:27', '2022-04-06 08:39:27'),
(114, 'Percentage of judgements/rulings delivered on the date first scheduled for delivery', 5, 100, NULL, '2022-04-06 08:39:38', '2022-04-06 08:39:38'),
(115, 'Advance communication of adjournments of trials/hearings& date of delivery of judgements/rulings', 5, 100, NULL, '2022-04-06 08:39:53', '2022-04-06 08:39:53'),
(116, 'Publish daily cause lists and posting online seven days in advance', 5, 100, NULL, '2022-04-06 08:40:07', '2022-04-06 08:40:07'),
(117, 'Stakeholder Engagement', 5, 100, NULL, '2022-04-06 08:40:19', '2022-04-06 08:40:19'),
(118, 'Submission of Court proceedings for appealed Matters within 60 days from date of receipt of notice', 5, 100, NULL, '2022-04-06 08:40:36', '2022-04-06 08:40:36'),
(119, 'Case clearance rate', 5, 100, NULL, '2022-04-06 08:40:53', '2022-04-06 08:40:53'),
(120, 'Percentage reduction of backlog', 5, 100, NULL, '2022-04-06 08:41:07', '2022-04-06 08:41:07'),
(121, 'Merit Productivity', 5, 100, NULL, '2022-04-06 08:41:19', '2022-04-06 08:41:19'),
(122, 'Other Productivity', 5, 100, NULL, '2022-04-06 08:41:33', '2022-04-06 08:41:33'),
(123, 'Submission of accurate monthly court returns', 5, 100, NULL, '2022-04-06 08:41:50', '2022-04-06 08:41:50'),
(124, 'Supervision of Subordinate Courts', 5, 100, NULL, '2022-04-06 08:42:07', '2022-04-06 08:42:07'),
(125, 'Interlocutory Applications concluded (Single judge applications, Certified Urgent applications, 3 judge applications/reviews, Certification Applications of appeals to the Supreme Court) -% of applications concluded within 30 days from date of filing', 2, 100, NULL, '2022-04-06 08:49:00', '2022-04-06 08:49:00'),
(126, 'Criminal Appeals-% of appeals concluded within 180 days from date of receipt of records of Appeal', 2, 100, NULL, '2022-04-06 08:49:17', '2022-04-06 08:49:17'),
(127, 'Civil Appeals-% of appeals concluded within 180 days from date of receipt of records of Appeal', 2, 100, NULL, '2022-04-06 08:49:46', '2022-04-06 08:49:46'),
(128, 'Election Petitions Appeals -% of appeals concluded within 180 days from date of filing', 2, 100, NULL, '2022-04-06 08:54:32', '2022-04-06 08:54:32'),
(129, 'Time for dissemination of all decisions -% of decisions disseminated within 7 days from date of delivery', 2, 100, NULL, '2022-04-06 08:54:44', '2022-04-06 08:54:44'),
(130, 'No. of cases to be determined per year', 2, 100, NULL, '2022-04-06 08:54:56', '2022-04-06 08:54:56'),
(131, 'Percentage of appeals/applications heard when first listed for hearing', 2, 100, NULL, '2022-04-06 08:55:15', '2022-04-06 08:55:15'),
(132, 'Percentage of judgements/rulings delivered on the date first scheduled for delivery', 2, 100, NULL, '2022-04-06 08:55:26', '2022-04-06 08:55:26'),
(133, 'Advance communication of adjournments of hearings &date of delivery of judgements/rulings', 2, 100, NULL, '2022-04-06 08:55:44', '2022-04-06 08:55:44'),
(134, 'Percentage of judgments and rulings rendered within 60 days after close of submissions', 2, 100, NULL, '2022-04-06 08:56:03', '2022-04-06 08:56:03'),
(135, 'Publish daily cause lists and posting online seven days in advance', 2, 100, NULL, '2022-04-06 08:56:17', '2022-04-06 08:56:17'),
(136, 'Stakeholder Engagement', 2, 100, NULL, '2022-04-06 08:56:34', '2022-04-06 08:56:34'),
(137, 'Case clearance rate for Civil Cases', 2, 100, NULL, '2022-04-06 08:56:45', '2022-04-06 08:56:45'),
(138, 'Case clearance rate for Criminal Cases', 2, 100, NULL, '2022-04-06 08:56:58', '2022-04-06 08:56:58'),
(139, 'Percentage reduction of backlog', 2, 100, NULL, '2022-04-06 08:57:11', '2022-04-06 08:57:11'),
(140, 'Merit Productivity', 2, 100, NULL, '2022-04-06 08:57:29', '2022-04-06 08:57:29'),
(141, 'Other Productivity', 2, 100, NULL, '2022-04-06 08:57:42', '2022-04-06 08:57:42'),
(142, 'Submission of Accurate Monthly Court Returns', 2, 100, NULL, '2022-04-06 08:57:59', '2022-04-06 08:57:59'),
(143, 'Disposal of idle assets (Where applicable)', 6, 100, NULL, '2022-04-13 09:54:07', '2022-04-13 09:54:07');

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
(185, '2014_10_12_000000_create_users_table', 1),
(186, '2014_10_12_100000_create_password_resets_table', 1),
(187, '2019_08_19_000000_create_failed_jobs_table', 1),
(188, '2022_02_11_150820_create_unit_ranks_table', 1),
(189, '2022_02_12_111506_create_units_table', 1),
(190, '2022_02_12_145949_create_financial_years_table', 1),
(191, '2022_02_12_170901_create_indicator_groups_table', 1),
(192, '2022_02_12_170917_create_indicator_types_table', 1),
(193, '2022_02_12_171809_create_indicators_table', 1),
(194, '2022_02_12_174704_create_indicator_unit_of_measures_table', 1),
(195, '2022_02_16_101124_create_master_indicators_table', 1),
(196, '2022_02_18_092354_create_template_indicators_table', 1),
(198, '2022_02_24_115736_create_jobs_table', 1),
(199, '2022_03_17_101700_create_roles_table', 1),
(200, '2022_03_17_101738_create_role_user_table', 1),
(201, '2022_04_05_144112_create_counties_table', 1),
(204, '2022_04_11_084704_create_rank_categories_table', 2),
(205, '2022_02_19_190435_create_template_indicator_groups_table', 3),
(212, '2022_04_05_145327_create_divisions_table', 4),
(215, '2022_04_21_084104_create_unit_division_table', 5);

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
-- Table structure for table `rank_categories`
--

CREATE TABLE `rank_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_rank_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rank_categories`
--

INSERT INTO `rank_categories` (`id`, `name`, `description`, `unit_rank_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'STAND ALONE COURTS', 'STAND ALONE COURTS', 7, NULL, '2022-04-11 11:56:03', '2022-04-12 08:03:56'),
(6, 'Directorate Performance', 'Directorate Performance', 11, NULL, '2022-04-12 02:58:24', '2022-04-12 02:58:24'),
(7, 'ICT', 'ICT', 11, NULL, '2022-04-12 02:58:41', '2022-04-12 02:58:41'),
(8, 'ggggggggggggggggggggfddddddddddddddddddddddddddddddddddddddddg', 'dddddddddddddddddddddd', 11, NULL, '2022-04-12 03:28:37', '2022-04-12 03:28:37'),
(17, 'Other Productivity', 'standalone kadhi court', 7, NULL, '2022-04-12 10:08:51', '2022-04-12 10:08:51'),
(20, 'Sample Magistrate Court', 'Sample Magistrate Court', 6, NULL, '2022-04-12 11:08:46', '2022-04-12 11:08:46');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '2022-04-06 06:56:10', NULL, NULL),
(2, 'Admin', '2022-04-06 06:56:10', NULL, NULL),
(3, 'User', '2022-04-06 06:56:10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `deleted_at`, `user_id`) VALUES
(1, '2022-04-06 06:59:39', 1),
(2, '2022-04-06 06:59:39', 1),
(3, '2022-04-06 06:59:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `template_indicators`
--

CREATE TABLE `template_indicators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `master_indicator_id` bigint(20) UNSIGNED NOT NULL,
  `name` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_rank_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `indicator_group_id` bigint(20) UNSIGNED NOT NULL,
  `indicator_type_id` bigint(20) UNSIGNED NOT NULL,
  `indicator_unit_of_measure_id` bigint(20) UNSIGNED NOT NULL,
  `indicator_weight` int(11) NOT NULL,
  `indicator_target` int(11) DEFAULT NULL,
  `indicator_achivement` int(11) DEFAULT NULL,
  `remarks` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `template_indicators`
--

INSERT INTO `template_indicators` (`id`, `master_indicator_id`, `name`, `unit_rank_id`, `unit_id`, `indicator_group_id`, `indicator_type_id`, `indicator_unit_of_measure_id`, `indicator_weight`, `indicator_target`, `indicator_achivement`, `remarks`, `deleted_at`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, 'Certified Urgent Applications - % of certified urgent applications concluded within 30 days from the date of certification', NULL, NULL, 2, 1, 1, 3, NULL, NULL, NULL, NULL, 1, '2022-04-13 07:12:15', '2022-04-19 08:37:02'),
(2, 2, 'Injunction applications -% of applications heard and determined within 90 days of filing', NULL, NULL, 2, 1, 1, 3, NULL, NULL, NULL, NULL, 2, '2022-04-13 07:12:54', '2022-04-19 08:37:32'),
(3, 3, 'All other applications (Including Criminal revisions, Ad-litem, rectifications, citations, etc.) -% of applications concluded within 90 days from date of filing', NULL, NULL, 2, 1, 1, 3, NULL, NULL, NULL, NULL, 3, '2022-04-13 07:13:56', '2022-04-19 08:37:45'),
(4, 4, 'Hearing & determination of Criminal cases -% of cases concluded within 360 days from date of filing', NULL, NULL, 2, 2, 1, 7, NULL, NULL, NULL, NULL, 4, '2022-04-13 07:33:25', '2022-04-13 07:33:25'),
(5, 5, 'Hearing and determination of Civil cases including contested Succession causes.  -% of cases concluded within 360 days from date of filing', NULL, NULL, 2, 2, 1, 8, NULL, NULL, NULL, NULL, 5, '2022-04-13 07:59:07', '2022-04-13 07:59:16'),
(6, 6, 'Percentage of judgements/rulings delivered on the date first scheduled for delivery', NULL, NULL, 2, 2, 1, 3, NULL, NULL, NULL, NULL, 6, '2022-04-13 08:00:13', '2022-04-13 08:00:13'),
(7, 8, 'Applications in criminal matters -% of applications concluded within 90 days of filing', NULL, NULL, 2, 2, 1, 3, NULL, NULL, NULL, NULL, 8, '2022-04-13 08:09:28', '2022-04-13 08:26:48'),
(8, 9, 'Reduced no. of days spent in remand custody from the “Date of plea” to the “Date of conclusion of the matter”( where bail has been denied or where the remandees are unable to meet the bail terms)', NULL, NULL, 2, 3, 2, 3, NULL, NULL, NULL, NULL, 9, '2022-04-13 08:10:50', '2022-04-13 08:27:00'),
(9, 10, 'Case clearance rate for Criminal Cases', NULL, NULL, 2, 1, 1, 4, NULL, NULL, NULL, NULL, 10, '2022-04-13 08:14:22', '2022-04-13 08:27:14'),
(10, 11, 'Case clearance rate for Civil Cases', NULL, NULL, 2, 1, 1, 4, NULL, NULL, NULL, NULL, 11, '2022-04-13 08:15:59', '2022-04-13 08:27:25'),
(11, 12, 'Case Clearance Rate for Traffic Cases', NULL, NULL, 2, 2, 1, 3, NULL, NULL, NULL, NULL, 12, '2022-04-13 08:17:57', '2022-04-13 08:28:28'),
(12, 13, 'Percentage reduction of backlog', NULL, NULL, 2, 1, 1, 4, NULL, NULL, NULL, NULL, 13, '2022-04-13 08:19:14', '2022-04-13 08:28:34'),
(13, 14, 'Merit  Productivity', NULL, NULL, 2, 2, 4, 6, NULL, NULL, NULL, NULL, 14, '2022-04-13 08:20:04', '2022-04-19 08:38:20'),
(14, 15, 'Other Productivity', NULL, NULL, 2, 2, 4, 3, NULL, NULL, NULL, NULL, 15, '2022-04-13 08:21:26', '2022-04-13 08:44:33'),
(15, 7, 'Delivery of Judgments and rulings -% of judgement/rulings delivered within 60 days of conclusion of the hearing', NULL, NULL, 2, 2, 1, 3, NULL, NULL, NULL, NULL, 7, '2022-04-13 08:24:44', '2022-04-13 08:24:44'),
(16, 16, 'Advance communication of adjournments of trials/hearings& date of delivery of judgements/rulings', NULL, NULL, 3, 2, 1, 2, NULL, NULL, NULL, NULL, 1, '2022-04-13 09:23:24', '2022-04-13 09:23:24'),
(17, 17, 'Percentage of trial/hearings held when first cause listed', NULL, NULL, 3, 2, 1, 2, NULL, NULL, NULL, NULL, 2, '2022-04-13 09:24:36', '2022-04-13 09:24:36'),
(18, 18, 'Percentage of pre-trial events held when first listed – mentions and supervision for compliance by parties in filing pleadings/exhibits', NULL, NULL, 3, 1, 1, 1, NULL, NULL, NULL, NULL, 3, '2022-04-13 09:27:15', '2022-04-13 09:27:15'),
(19, 19, 'Submission of Court proceedings for appealed Matters within 60 days from date of receipt of notice', NULL, NULL, 3, 2, 1, 2, NULL, NULL, NULL, NULL, 4, '2022-04-13 09:28:11', '2022-04-13 09:28:11'),
(20, 20, 'Use of ADR mechanism in resolution of cases. - % of cases referred for ADR and concluded', NULL, NULL, 3, 1, 1, 2, NULL, NULL, NULL, NULL, 5, '2022-04-13 09:29:22', '2022-04-13 09:29:28'),
(21, 21, 'Publish daily cause lists and posting online seven days in advance', NULL, NULL, 3, 1, 1, 1, NULL, NULL, NULL, NULL, 6, '2022-04-13 09:31:44', '2022-04-13 09:31:51'),
(22, 22, 'Stakeholder Engagement', NULL, NULL, 3, 2, 1, 2, NULL, NULL, NULL, NULL, 7, '2022-04-13 09:38:49', '2022-04-13 09:38:49'),
(23, 23, 'Timely Submission of accurate monthly court returns', NULL, NULL, 3, 2, 1, 2, NULL, NULL, NULL, NULL, 8, '2022-04-13 09:39:38', '2022-04-13 09:39:38'),
(24, 24, 'Implement the Registry Manual procedures', NULL, NULL, 4, 1, 1, 3, NULL, NULL, NULL, NULL, 1, '2022-04-13 09:45:41', '2022-04-13 09:46:27'),
(25, 25, 'Maintain and update all registers', NULL, NULL, 4, 2, 1, 3, NULL, NULL, NULL, NULL, 2, '2022-04-13 09:46:11', '2022-04-13 09:46:11'),
(26, 25, 'Maintain and Update  all registers', NULL, NULL, 5, 2, 5, 1, NULL, NULL, NULL, NULL, 1, '2022-04-13 09:49:09', '2022-04-13 09:49:09'),
(27, 27, 'Supervision of construction (Where applicable)', NULL, NULL, 5, 2, 3, 1, NULL, NULL, NULL, NULL, 2, '2022-04-13 09:51:07', '2022-04-13 09:55:29'),
(28, 143, 'Disposal of idle assets (Where applicable)', NULL, NULL, 5, 1, 3, 1, NULL, NULL, NULL, NULL, 3, '2022-04-13 09:55:22', '2022-04-13 09:55:22'),
(29, 29, 'Compliance with the budget', NULL, NULL, 6, 1, 1, 1, NULL, NULL, NULL, NULL, 1, '2022-04-13 09:58:25', '2022-04-13 09:58:25'),
(30, 30, 'Revenue Management', NULL, NULL, 6, 2, 1, 2, NULL, NULL, NULL, NULL, 2, '2022-04-13 09:59:25', '2022-04-13 09:59:25'),
(31, 31, 'Implementation of Audit report recommendations.', NULL, NULL, 6, 2, 3, 2, NULL, NULL, NULL, NULL, 3, '2022-04-13 10:00:12', '2022-04-13 10:00:12'),
(32, 32, 'Compliance with Service Delivery Charter Standards', NULL, NULL, 7, 1, 1, 4, NULL, NULL, NULL, NULL, 1, '2022-04-13 10:02:00', '2022-04-13 10:02:00'),
(33, 33, 'Service improvement Innovations', NULL, NULL, 8, 1, 4, 2, NULL, NULL, NULL, NULL, 1, '2022-04-13 10:03:13', '2022-04-13 10:03:13'),
(34, 34, 'Competency development', NULL, NULL, 8, 1, 4, 2, NULL, NULL, NULL, NULL, 2, '2022-04-13 10:04:10', '2022-04-13 10:04:10'),
(35, 35, 'Corruption Prevention &Eradication', NULL, NULL, 9, 2, 1, 2, NULL, NULL, NULL, NULL, 1, '2022-04-13 10:05:34', '2022-04-13 10:05:34'),
(36, 36, 'Improve Employee wellness and work environment', NULL, NULL, 9, 1, 1, 1, NULL, NULL, NULL, NULL, 2, '2022-04-13 10:06:04', '2022-04-13 10:06:04'),
(37, 37, 'Implement court user survey recommendations', NULL, NULL, 9, 2, 1, 1, NULL, NULL, NULL, NULL, 3, '2022-04-13 10:07:10', '2022-04-13 10:07:10');

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
  `rank_category_id` int(11) NOT NULL,
  `financial_year_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `template_indicator_groups`
--

INSERT INTO `template_indicator_groups` (`id`, `name`, `description`, `order`, `unit_id`, `unit_rank_id`, `rank_category_id`, `financial_year_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'A. EXPEDITIOUS DISPOSAL OF CASES', 'A. EXPEDITIOUS DISPOSAL OF CASES', 1, NULL, 1, 0, 4, NULL, '2022-04-06 07:48:11', '2022-04-06 07:48:11'),
(2, 'A.1. Expeditious Delivery of Justice – Caseload', 'Expeditious Delivery of Justice – Caseload', 1, NULL, 6, 20, 4, NULL, '2022-04-06 09:55:57', '2022-04-06 09:56:38'),
(3, 'A.2. Expeditious Delivery of Justice – Administration', 'Expeditious Delivery of Justice – Administration', 2, NULL, 6, 20, 4, NULL, '2022-04-06 09:56:30', '2022-04-06 09:56:30'),
(4, 'A.3. Court files Integrity', 'Court files Integrity', 3, NULL, 6, 20, 4, NULL, '2022-04-06 09:57:04', '2022-04-06 09:57:04'),
(5, 'B.  COURT INFRASTRUCTURE', 'COURT INFRASTRUCTURE', 4, NULL, 6, 20, 4, NULL, '2022-04-06 09:57:55', '2022-04-06 09:57:55'),
(6, 'C. FINANCIAL PERSPECTIVE', 'FINANCIAL PERSPECTIVE', 5, NULL, 6, 20, 4, NULL, '2022-04-06 09:58:29', '2022-04-06 09:58:29'),
(7, 'D. CUSTOMER PERSPECTIVE', 'CUSTOMER PERSPECTIVE', 6, NULL, 6, 20, 4, NULL, '2022-04-06 09:58:57', '2022-04-06 09:58:57'),
(8, 'E. INNOVATION AND LEARNING', 'INNOVATION AND LEARNING', 7, NULL, 6, 20, 4, NULL, '2022-04-06 09:59:32', '2022-04-13 08:30:13'),
(9, 'F. INTERNAL PROCESSES', 'INTERNAL PROCESSES', 8, NULL, 6, 20, 4, NULL, '2022-04-06 10:00:03', '2022-04-06 10:00:03');

-- --------------------------------------------------------

--
-- Table structure for table `template_indicator_groups2`
--

CREATE TABLE `template_indicator_groups2` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unit_rank_id` bigint(20) UNSIGNED NOT NULL,
  `financial_year_id` bigint(20) UNSIGNED NOT NULL,
  `rank_category_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `template_indicator_groups2`
--

INSERT INTO `template_indicator_groups2` (`id`, `name`, `description`, `order`, `unit_id`, `unit_rank_id`, `financial_year_id`, `rank_category_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Publish daily cause lists and posting online seven days in advance2', 'standalone kadhi court', 1, NULL, 7, 4, 1, NULL, '2022-04-12 09:48:13', '2022-04-12 10:41:58'),
(2, 'standalone kadhi court', 'standalone kadhi court', 1, NULL, 7, 4, 1, NULL, '2022-04-12 10:39:03', '2022-04-12 10:39:03'),
(3, 'Other Productivity', 'standalone kadhi court', 2, NULL, 7, 4, 1, NULL, '2022-04-12 10:40:24', '2022-04-12 10:40:24');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unique_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unique_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `has_division` tinyint(1) NOT NULL DEFAULT 0,
  `has_cts` tinyint(1) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `unit_rank_id` bigint(20) UNSIGNED NOT NULL,
  `head_id_fk` bigint(20) UNSIGNED NOT NULL,
  `subhead_id_fk` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `unique_id`, `unique_code`, `has_division`, `has_cts`, `is_deleted`, `unit_rank_id`, `head_id_fk`, `subhead_id_fk`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Mombasa High Court', 'MSAHGC', 'MSAHGC', 1, 0, 0, 3, 3, 32, NULL, '2022-04-06 04:42:56', '2022-04-06 04:42:56'),
(2, 'Mombasa ELRC', 'MSAERC', 'MSAERC', 0, 0, 0, 4, 4, 32, NULL, '2022-04-06 04:42:56', '2022-04-06 04:42:56'),
(3, 'Mombasa Environment and Land Court', 'MSAELC', 'MSAELC', 0, 0, 0, 5, 5, 32, NULL, '2022-04-06 04:42:56', '2022-04-06 04:42:56'),
(4, 'Kaloleni Magistrate Court', 'KLNMGC', 'KLNMGC', 0, 0, 0, 6, 6, 59, NULL, '2022-04-06 04:42:56', '2022-04-06 04:42:56'),
(5, 'Mariakani Magistrate Court', 'MRKMGC', 'MRKMGC', 1, 0, 0, 6, 6, 84, NULL, '2022-04-06 04:42:56', '2022-04-06 04:42:56'),
(6, 'Mombasa Magistrate Court', 'MSAMGC', 'MSAMGC', 1, 0, 0, 6, 6, 32, NULL, '2022-04-06 04:42:56', '2022-04-06 04:42:56'),
(7, 'Shanzu Magistrate Court', 'SNZMGC', 'SNZMGC', 0, 0, 0, 6, 6, 107, NULL, '2022-04-06 04:42:56', '2022-04-06 04:42:56'),
(8, 'Tononoka Magistrate Court', 'TNKMGC', 'TNKMGC', 0, 0, 0, 6, 6, 115, NULL, '2022-04-06 04:42:56', '2022-04-06 04:42:56'),
(9, 'Mombasa Kadhi Court', 'MSAKDC', 'MSAKDC', 0, 0, 0, 7, 7, 32, NULL, '2022-04-06 04:42:56', '2022-04-06 04:42:56'),
(10, 'Mariakani Kadhi Court', 'MRKKDC', 'MRKKDC', 0, 0, 0, 7, 7, 84, NULL, '2022-04-06 04:42:56', '2022-04-06 04:42:56'),
(11, 'Kwale Magistrate Court', 'KWLMGC', 'KWLMGC', 0, 0, 0, 6, 6, 75, NULL, '2022-04-06 04:42:56', '2022-04-06 04:42:56'),
(12, 'Kwale Kadhi Court', 'KWLKDC', 'KWLKDC', 0, 0, 0, 7, 7, 75, NULL, '2022-04-06 04:42:56', '2022-04-06 04:42:56'),
(13, 'Msambweni Kadhi Court', 'MWNKDC', 'MWNKDC', 0, 0, 0, 7, 7, 133, NULL, '2022-04-06 04:42:56', '2022-04-06 04:42:56'),
(14, 'Malindi Court of Appeal', 'MLDCOA', 'MLDCOA', 0, 0, 0, 2, 2, 5, NULL, '2022-04-06 04:42:56', '2022-04-06 04:42:56'),
(15, 'Malindi High Court', 'MLDHGC', 'MLDHGC', 1, 0, 0, 3, 3, 5, NULL, '2022-04-06 04:42:56', '2022-04-06 04:42:56'),
(16, 'Malindi Environment and Land Court', 'MLDELC', 'MLDELC', 0, 0, 0, 5, 5, 5, NULL, '2022-04-06 04:42:57', '2022-04-06 04:42:57'),
(17, 'Kilifi Magistrate Court', 'KLFMGC', 'KLFMGC', 1, 0, 0, 6, 6, 71, NULL, '2022-04-06 04:42:57', '2022-04-06 04:42:57'),
(18, 'Malindi Magistrate Court', 'MLDMGC', 'MLDMGC', 0, 0, 0, 6, 6, 5, NULL, '2022-04-06 04:42:57', '2022-04-06 04:42:57'),
(19, 'Kilifi Kadhi Court', 'KLFKDC', 'KLFKDC', 0, 0, 0, 7, 7, 71, NULL, '2022-04-06 04:42:57', '2022-04-06 04:42:57'),
(20, 'Malindi Kadhi Court', 'MLDKDC', 'MLDKDC', 0, 0, 0, 7, 7, 5, NULL, '2022-04-06 04:42:57', '2022-04-06 04:42:57'),
(21, 'Garsen High Court', 'GSNHGC', 'GSNHGC', 0, 0, 0, 3, 3, 14, NULL, '2022-04-06 04:42:57', '2022-04-06 04:42:57'),
(22, 'Kipini under Garsen Magistrate Court', 'KPNMGC', 'KPNMGC', 0, 0, 0, 6, 6, 14, NULL, '2022-04-06 04:42:57', '2022-04-06 04:42:57'),
(23, 'Garsen Magistrate Court', 'GSNMGC', 'GSNMGC', 0, 0, 0, 6, 6, 14, NULL, '2022-04-06 04:42:57', '2022-04-06 04:42:57'),
(24, 'Hola Magistrate Court', 'HLAMGC', 'HLAMGC', 0, 0, 0, 6, 6, 54, NULL, '2022-04-06 04:42:57', '2022-04-06 04:42:57'),
(25, 'Garsen Kadhi Court', 'GSNKDC', 'GSNKDC', 0, 0, 0, 7, 7, 14, NULL, '2022-04-06 04:42:57', '2022-04-06 04:42:57'),
(26, 'Hola Kadhi Court', 'HLAKDC', 'HLAKDC', 0, 0, 0, 7, 7, 54, NULL, '2022-04-06 04:42:58', '2022-04-06 04:42:58'),
(27, 'Faza Islands under Lamu Magistrate Court', 'FZIMGC', 'FZIMGC', 0, 0, 0, 6, 6, 128, NULL, '2022-04-06 04:42:58', '2022-04-06 04:42:58'),
(28, 'Lamu Magistrate Court', 'LMUMGC', 'LMUMGC', 0, 0, 0, 6, 6, 77, NULL, '2022-04-06 04:42:58', '2022-04-06 04:42:58'),
(29, 'Mpeketoni Magistrate Court', 'MPKMGC', 'MPKMGC', 0, 0, 0, 6, 6, 92, NULL, '2022-04-06 04:42:58', '2022-04-06 04:42:58'),
(30, 'Lamu Kadhi Court', 'LMUKDC', 'LMUKDC', 0, 0, 0, 7, 7, 77, NULL, '2022-04-06 04:42:58', '2022-04-06 04:42:58'),
(31, 'Voi High Court', 'VOIHGC', 'VOIHGC', 0, 0, 0, 3, 3, 41, NULL, '2022-04-06 04:42:58', '2022-04-06 04:42:58'),
(32, 'Taveta Magistrate Court', 'TVTMGC', 'TVTMGC', 0, 0, 0, 6, 6, 112, NULL, '2022-04-06 04:42:58', '2022-04-06 04:42:58'),
(33, 'Voi Magistrate Court', 'VOIMGC', 'VOIMGC', 0, 0, 0, 6, 6, 41, NULL, '2022-04-06 04:42:58', '2022-04-06 04:42:58'),
(34, 'Wundanyi Magistrate Court', 'WDYMGC', 'WDYMGC', 0, 0, 0, 6, 6, 122, NULL, '2022-04-06 04:42:58', '2022-04-06 04:42:58'),
(35, 'Voi Kadhi Court', 'VOIKDC', 'VOIKDC', 0, 0, 0, 7, 7, 41, NULL, '2022-04-06 04:42:58', '2022-04-06 04:42:58'),
(36, 'Garissa High Court', 'GRSHGC', 'GRSHGC', 0, 0, 0, 3, 3, 13, NULL, '2022-04-06 04:42:58', '2022-04-06 04:42:58'),
(37, 'Garissa Environment and Land Court', 'GRSELC', 'GRSELC', 0, 0, 0, 5, 5, 13, NULL, '2022-04-06 04:42:58', '2022-04-06 04:42:58'),
(38, 'Modogashe Kadhi Court', 'MDGMGC', 'MDGMGC', 0, 0, 0, 7, 7, 144, NULL, '2022-04-06 04:42:58', '2022-04-06 04:42:58'),
(41, 'Garissa Magistrate Court', 'GRSMGC', 'GRSMGC', 0, 0, 0, 6, 6, 13, NULL, '2022-04-06 04:42:58', '2022-04-06 04:42:58'),
(42, 'Garissa Kadhi Court', 'GRSKDC', 'GRSKDC', 0, 0, 0, 7, 7, 13, NULL, '2022-04-06 04:42:58', '2022-04-06 04:42:58'),
(43, 'Dadaab Kadhi Court', 'DDBKDC', 'DDBKDC', 0, 0, 0, 7, 7, 125, NULL, '2022-04-06 04:42:58', '2022-04-06 04:42:58'),
(44, 'Ijara Kadhi Court', 'IJRKDC', 'IJRKDC', 0, 0, 0, 7, 7, 131, NULL, '2022-04-06 04:42:58', '2022-04-06 04:42:58'),
(45, 'Balambala Kadhi Court', 'BLMKDC', 'BLMKDC', 0, 0, 0, 7, 7, 123, NULL, '2022-04-06 04:42:58', '2022-04-06 04:42:58'),
(46, 'Wajir Magistrate Court', 'WJRMGC', 'WJRMGC', 0, 0, 0, 6, 6, 118, NULL, '2022-04-06 04:42:59', '2022-04-06 04:42:59'),
(47, 'Wajir Kadhi Court', 'WJRKDC', 'WJRKDC', 0, 0, 0, 7, 7, 118, NULL, '2022-04-06 04:42:59', '2022-04-06 04:42:59'),
(48, 'Habaswein Kadhi Court', 'HBSKDC', 'HBSKDC', 0, 0, 0, 7, 7, 130, NULL, '2022-04-06 04:42:59', '2022-04-06 04:42:59'),
(49, 'Bute Kadhi Court', 'BTEKDC', 'BTEKDC', 0, 0, 0, 7, 7, 124, NULL, '2022-04-06 04:42:59', '2022-04-06 04:42:59'),
(50, 'Eldas Kadhi Court', 'EDSKDC', 'EDSKDC', 0, 0, 0, 7, 7, 126, NULL, '2022-04-06 04:42:59', '2022-04-06 04:42:59'),
(51, 'Mandera Magistrate Court', 'MNDMGC', 'MNDMGC', 0, 0, 0, 6, 6, 82, NULL, '2022-04-06 04:42:59', '2022-04-06 04:42:59'),
(52, 'Mandera Kadhi Court', 'MNDKDC', 'MNDKDC', 0, 0, 0, 7, 7, 82, NULL, '2022-04-06 04:42:59', '2022-04-06 04:42:59'),
(53, 'Elwak Kadhi Court', 'EWKKDC', 'EWKKDC', 0, 0, 0, 7, 7, 127, NULL, '2022-04-06 04:42:59', '2022-04-06 04:42:59'),
(54, 'Takaba Kadhi Court', 'TKBKDC', 'TKBKDC', 0, 0, 0, 7, 7, 134, NULL, '2022-04-06 04:42:59', '2022-04-06 04:42:59'),
(55, 'Marsabit High Court', 'MSBHGC', 'MSBHGC', 0, 0, 0, 3, 3, 29, NULL, '2022-04-06 04:42:59', '2022-04-06 04:42:59'),
(56, 'Laisamis/Loyangalani Magistrate Court under Marsabit Law Court', 'LSMMGC', 'LSMMGC', 0, 0, 0, 6, 6, 29, NULL, '2022-04-06 04:42:59', '2022-04-06 04:42:59'),
(57, 'Moyale Magistrate Court', 'MYLMGC', 'MYLMGC', 0, 0, 0, 6, 6, 91, NULL, '2022-04-06 04:42:59', '2022-04-06 04:42:59'),
(58, 'Marsabit Magistrate Court', 'MSBMGC', 'MSBMGC', 0, 0, 0, 6, 6, 29, NULL, '2022-04-06 04:42:59', '2022-04-06 04:42:59'),
(59, 'Marsabit Kadhi Court', 'MSBKDC', 'MSBKDC', 0, 0, 0, 7, 7, 29, NULL, '2022-04-06 04:42:59', '2022-04-06 04:42:59'),
(60, 'Moyale Kadhi Court', 'MYLKDC', 'MYLKDC', 0, 0, 0, 7, 7, 91, NULL, '2022-04-06 04:42:59', '2022-04-06 04:42:59'),
(61, 'Sereolipi Kadhi Court', 'SERKDC', 'SERKDC', 0, 0, 0, 7, 7, 55, NULL, '2022-04-06 04:42:59', '2022-04-06 04:42:59'),
(63, 'Isiolo Magistrate Court', 'ISLMGC', 'ISLMGC', 0, 0, 0, 6, 6, 55, NULL, '2022-04-06 04:42:59', '2022-04-06 04:42:59'),
(64, 'Isiolo Kadhi Court', 'ISLKDC', 'ISLKDC', 0, 0, 0, 7, 7, 55, NULL, '2022-04-06 04:42:59', '2022-04-06 04:42:59'),
(65, 'Garbatulla Kadhi Court', 'GBTKDC', 'GBTKDC', 0, 0, 0, 7, 7, 129, NULL, '2022-04-06 04:42:59', '2022-04-06 04:42:59'),
(66, 'Merti Kadhi Court', 'MRTKDC', 'MRTKDC', 0, 0, 0, 7, 7, 132, NULL, '2022-04-06 04:43:00', '2022-04-06 04:43:00'),
(67, 'Meru High Court', 'MRUHGC', 'MRUHGC', 0, 0, 0, 3, 3, 30, NULL, '2022-04-06 04:43:00', '2022-04-06 04:43:00'),
(68, 'Meru Environment and Land Court', 'MRUELC', 'MRUELC', 0, 0, 0, 5, 5, 30, NULL, '2022-04-06 04:43:00', '2022-04-06 04:43:00'),
(69, 'Maua Magistrate Court', 'MUAMGC', 'MUAMGC', 0, 0, 0, 6, 6, 87, NULL, '2022-04-06 04:43:00', '2022-04-06 04:43:00'),
(70, 'Meru Magistrate Court', 'MRUMGC', 'MRUMGC', 0, 0, 0, 6, 6, 30, NULL, '2022-04-06 04:43:00', '2022-04-06 04:43:00'),
(71, 'Nkubu Magistrate Court', 'NKBMGC', 'NKBMGC', 0, 0, 0, 6, 6, 99, NULL, '2022-04-06 04:43:00', '2022-04-06 04:43:00'),
(72, 'Tigania Magistrate Court', 'TGAMGC', 'TGAMGC', 0, 0, 0, 6, 6, 114, NULL, '2022-04-06 04:43:00', '2022-04-06 04:43:00'),
(73, 'Githongo Magistrate Court', 'GTGMGC', 'GTGMGC', 0, 0, 0, 6, 6, 51, NULL, '2022-04-06 04:43:00', '2022-04-06 04:43:00'),
(74, 'Chuka High Court', 'CKAHGC', 'CKAHGC', 0, 0, 0, 3, 3, 10, NULL, '2022-04-06 04:43:00', '2022-04-06 04:43:00'),
(75, 'Chuka Environment and Land Court', 'CKAELC', 'CKAELC', 0, 0, 0, 5, 5, 10, NULL, '2022-04-06 04:43:00', '2022-04-06 04:43:00'),
(76, 'Chuka Magistrate Court', 'CKAMGC', 'CKAMGC', 0, 0, 0, 6, 6, 10, NULL, '2022-04-06 04:43:00', '2022-04-06 04:43:00'),
(77, 'Marimanti Magistrate Court', 'MRTMGC', 'MRTMGC', 0, 0, 0, 6, 6, 85, NULL, '2022-04-06 04:43:00', '2022-04-06 04:43:00'),
(78, 'Maua Kadhi court', 'MUAKDC', 'MUAKDC', 0, 0, 0, 7, 7, 87, NULL, '2022-04-06 04:43:00', '2022-04-06 04:43:00'),
(79, 'Embu High Court', 'EMBHGC', 'EMBHGC', 0, 0, 0, 3, 3, 12, NULL, '2022-04-06 04:43:00', '2022-04-06 04:43:00'),
(80, 'Embu Environment and Land Court', 'EMBELC', 'EMBELC', 0, 0, 0, 5, 5, 12, NULL, '2022-04-06 04:43:00', '2022-04-06 04:43:00'),
(81, 'Embu Magistrate Court', 'EMBMGC', 'EMBMGC', 0, 0, 0, 6, 6, 12, NULL, '2022-04-06 04:43:00', '2022-04-06 04:43:00'),
(82, 'Runyenjes Magistrate Court', 'RNJGMC', 'RNJGMC', 0, 0, 0, 6, 6, 106, NULL, '2022-04-06 04:43:00', '2022-04-06 04:43:00'),
(83, 'Siakago Magistrate Court', 'SKGMGC', 'SKGMGC', 0, 0, 0, 6, 6, 108, NULL, '2022-04-06 04:43:00', '2022-04-06 04:43:00'),
(84, 'Kitui High Court', 'KTIHGC', 'KTIHGC', 0, 0, 0, 3, 3, 25, NULL, '2022-04-06 04:43:01', '2022-04-06 04:43:01'),
(85, 'Zombe Mobile Court', 'ZMBMGC', 'ZMBMGC', 0, 0, 0, 6, 6, 25, NULL, '2022-04-06 04:43:01', '2022-04-06 04:43:01'),
(86, 'Kitui Magistrate Court', 'KTIMGC', 'KTIMGC', 0, 0, 0, 6, 6, 25, NULL, '2022-04-06 04:43:01', '2022-04-06 04:43:01'),
(87, 'Kyuso Magistrate Court', 'KYSMGC', 'KYSMGC', 0, 0, 0, 6, 6, 76, NULL, '2022-04-06 04:43:01', '2022-04-06 04:43:01'),
(88, 'Mutomo Magistrate Court', 'MTMMGC', 'MTMMGC', 0, 0, 0, 6, 6, 95, NULL, '2022-04-06 04:43:01', '2022-04-06 04:43:01'),
(89, 'Mwingi Magistrate Court', 'MWGMGC', 'MWGMGC', 0, 0, 0, 6, 6, 96, NULL, '2022-04-06 04:43:01', '2022-04-06 04:43:01'),
(90, 'Kitui Kadhi Court', 'KTIKDC', 'KTIKDC', 0, 0, 0, 7, 7, 25, NULL, '2022-04-06 04:43:01', '2022-04-06 04:43:01'),
(91, 'Mwingi Kadhi Court ', 'MWGKDC', 'MWGKDC', 0, 0, 0, 7, 7, 96, NULL, '2022-04-06 04:43:01', '2022-04-06 04:43:01'),
(92, 'Machakos High Court', 'MKSHGC', 'MKSHGC', 0, 0, 0, 3, 3, 27, NULL, '2022-04-06 04:43:01', '2022-04-06 04:43:01'),
(93, 'Machakos Environment and Land Court ', 'MKSELC', 'MKSELC', 0, 0, 0, 5, 5, 27, NULL, '2022-04-06 04:43:01', '2022-04-06 04:43:01'),
(94, 'Kangundo Magistrate Court', 'KGDMGC', 'KGDMGC', 0, 0, 0, 6, 6, 62, NULL, '2022-04-06 04:43:01', '2022-04-06 04:43:01'),
(95, 'Machakos Magistrate Court', 'MKSMGC', 'MKSMGC', 0, 0, 0, 6, 6, 27, NULL, '2022-04-06 04:43:01', '2022-04-06 04:43:01'),
(96, 'Mavoko Magistrate Court', 'MVKMGC', 'MVKMGC', 0, 0, 0, 6, 6, 88, NULL, '2022-04-06 04:43:01', '2022-04-06 04:43:01'),
(97, 'Kithimani Magistrate Court', 'KTMMGC', 'KTMMGC', 0, 0, 0, 6, 6, 74, NULL, '2022-04-06 04:43:01', '2022-04-06 04:43:01'),
(98, 'Machakos Kadhi Court', 'MKSKDC', 'MKSKDC', 0, 0, 0, 7, 7, 27, NULL, '2022-04-06 04:43:01', '2022-04-06 04:43:01'),
(99, 'Makueni High Court', 'MKNHGC', 'MKNHGC', 0, 0, 0, 3, 3, 28, NULL, '2022-04-06 04:43:01', '2022-04-06 04:43:01'),
(100, 'Makueni Environment and Land Court', 'MKNELC', 'MKNELC', 0, 0, 0, 5, 5, 28, NULL, '2022-04-06 04:43:01', '2022-04-06 04:43:01'),
(101, 'Kilungu Magistrate Court', 'KGUMGC', 'KGUMGC', 0, 0, 0, 6, 6, 72, NULL, '2022-04-06 04:43:02', '2022-04-06 04:43:02'),
(102, 'Makueni Magistrate Court', 'MKNMGC', 'MKNMGC', 0, 0, 0, 6, 6, 28, NULL, '2022-04-06 04:43:02', '2022-04-06 04:43:02'),
(103, 'Makindu Magistrate Court', 'MDUMGC', 'MDUMGC', 0, 0, 0, 6, 6, 81, NULL, '2022-04-06 04:43:02', '2022-04-06 04:43:02'),
(104, 'Tawa Magistrate Court', 'TWAMGC', 'TWAMGC', 0, 0, 0, 6, 6, 113, NULL, '2022-04-06 04:43:02', '2022-04-06 04:43:02'),
(105, 'Engineer Magistrate Court', 'ENGMGC', 'ENGMGC', 0, 0, 0, 6, 6, 48, NULL, '2022-04-06 04:43:02', '2022-04-06 04:43:02'),
(106, 'Nyeri Court of Appeal', 'NYRCOA', 'NYRCOA', 0, 0, 0, 2, 2, 6, NULL, '2022-04-06 04:43:02', '2022-04-06 04:43:02'),
(107, 'Nyeri High Court', 'NYRHGC', 'NYRHGC', 0, 0, 0, 3, 3, 6, NULL, '2022-04-06 04:43:02', '2022-04-06 04:43:02'),
(108, 'Nyeri ELRC', 'NYRERC', 'NYRERC', 0, 0, 0, 4, 4, 6, NULL, '2022-04-06 04:43:02', '2022-04-06 04:43:02'),
(109, 'Nyeri Environment and Land Court', 'NYRELC', 'NYRELC', 0, 0, 0, 5, 5, 6, NULL, '2022-04-06 04:43:02', '2022-04-06 04:43:02'),
(110, 'Karatina Magistrate Court', 'KTNMGC', 'KTNMGC', 0, 0, 0, 6, 6, 64, NULL, '2022-04-06 04:43:02', '2022-04-06 04:43:02'),
(111, 'Mukurwe-ini Magistrate Court', 'MKWMGC', 'MKWMGC', 0, 0, 0, 6, 6, 93, NULL, '2022-04-06 04:43:02', '2022-04-06 04:43:02'),
(112, 'Nyeri Magistrate Court', 'NYRMGC', 'NYRMGC', 0, 0, 0, 6, 6, 6, NULL, '2022-04-06 04:43:02', '2022-04-06 04:43:02'),
(113, 'Othaya Magistrate Court', 'OTYMGC', 'OTYMGC', 0, 0, 0, 6, 6, 103, NULL, '2022-04-06 04:43:02', '2022-04-06 04:43:02'),
(114, 'Nyeri Kadhi Court', 'NYRKDC', 'NYRKDC', 0, 0, 0, 7, 7, 6, NULL, '2022-04-06 04:43:02', '2022-04-06 04:43:02'),
(115, 'Kerugoya High Court', 'KRGHGC', 'KRGHGC', 0, 0, 0, 3, 3, 21, NULL, '2022-04-06 04:43:02', '2022-04-06 04:43:02'),
(116, 'Kerugoya Environment and Land Court', 'KRGELC', 'KRGELC', 0, 0, 0, 5, 5, 21, NULL, '2022-04-06 04:43:02', '2022-04-06 04:43:02'),
(117, 'Karaba under Wanguru Magistrate Court', 'KRBMGC', 'KRBMGC', 0, 0, 0, 6, 6, 119, NULL, '2022-04-06 04:43:03', '2022-04-06 04:43:03'),
(118, 'Baricho Magistrate Court', 'BRCMGC', 'BRCMGC', 0, 0, 0, 6, 6, 43, NULL, '2022-04-06 04:43:03', '2022-04-06 04:43:03'),
(119, 'Gichugu Magistrate Court', 'GCGMGC', 'GCGMGC', 0, 0, 0, 6, 6, 50, NULL, '2022-04-06 04:43:03', '2022-04-06 04:43:03'),
(120, 'Kerugoya Magistrate Court', 'KRGMGC', 'KRGMGC', 0, 0, 0, 6, 6, 21, NULL, '2022-04-06 04:43:03', '2022-04-06 04:43:03'),
(121, 'Wanguru Magistrate Court', 'WNGMGC', 'WNGMGC', 0, 0, 0, 6, 6, 119, NULL, '2022-04-06 04:43:03', '2022-04-06 04:43:03'),
(122, 'Muranga High Court', 'MRGHGC', 'MRGHGC', 0, 0, 0, 3, 3, 33, NULL, '2022-04-06 04:43:03', '2022-04-06 04:43:03'),
(123, 'Kandara Magistrate Court', 'KNDMGC', 'KNDMGC', 0, 0, 0, 6, 6, 60, NULL, '2022-04-06 04:43:03', '2022-04-06 04:43:03'),
(124, 'Kangema Magistrate Court', 'KNGMGC', 'KNGMGC', 0, 0, 0, 6, 6, 61, NULL, '2022-04-06 04:43:03', '2022-04-06 04:43:03'),
(125, 'Kigumo Magistrate Court', 'KGMMGC', 'KGMMGC', 0, 0, 0, 6, 6, 68, NULL, '2022-04-06 04:43:03', '2022-04-06 04:43:03'),
(126, 'Muranga Magistrate Court', 'MRGMGC', 'MRGMGC', 0, 0, 0, 6, 6, 33, NULL, '2022-04-06 04:43:03', '2022-04-06 04:43:03'),
(127, 'Muranga Kadhi Court', 'MRGKDC', 'MRGKDC', 0, 0, 0, 7, 7, 33, NULL, '2022-04-06 04:43:03', '2022-04-06 04:43:03'),
(128, 'Kiambu High Court', 'KMBHGC', 'KMBHGC', 0, 0, 0, 3, 3, 22, NULL, '2022-04-06 04:43:03', '2022-04-06 04:43:03'),
(129, 'Kiambu Magistrate Court', 'KMBMGC', 'KMBMGC', 0, 0, 0, 6, 6, 22, NULL, '2022-04-06 04:43:03', '2022-04-06 04:43:03'),
(130, 'Kikuyu Magistrate Court', 'KYKMGC', 'KYKMGC', 0, 0, 0, 6, 6, 69, NULL, '2022-04-06 04:43:03', '2022-04-06 04:43:03'),
(132, 'Gatundu Magistrate Court', 'GTDMGC', 'GTDMGC', 0, 0, 0, 6, 6, 49, NULL, '2022-04-06 04:43:03', '2022-04-06 04:43:03'),
(133, 'Githunguri Magistrate Court', 'GTNMGC', 'GTNMGC', 0, 0, 0, 6, 6, 52, NULL, '2022-04-06 04:43:03', '2022-04-06 04:43:03'),
(134, 'Thika Magistrate Court', 'TKAMGC', 'TKAMGC', 0, 0, 0, 6, 6, 42, NULL, '2022-04-06 04:43:03', '2022-04-06 04:43:03'),
(135, 'Thika Kadhi Court', 'TKAKDC', 'TKAKDC', 0, 0, 0, 7, 7, 42, NULL, '2022-04-06 04:43:03', '2022-04-06 04:43:03'),
(136, 'Lodwar High Court', 'LDWHGC', 'LDWHGC', 0, 0, 0, 3, 3, 26, NULL, '2022-04-06 04:43:03', '2022-04-06 04:43:03'),
(137, 'Lokichar under Lodwar Magistrate Court', 'LKCMGC', 'LKCMGC', 0, 0, 0, 6, 6, 26, NULL, '2022-04-06 04:43:03', '2022-04-06 04:43:03'),
(138, 'Lokitaung under Lodwar Magistrate Court', 'LKTMGC', 'LKTMGC', 0, 0, 0, 6, 6, 26, NULL, '2022-04-06 04:43:04', '2022-04-06 04:43:04'),
(139, 'Lodwar Magistrate Court', 'LDWMGC', 'LDWMGC', 0, 0, 0, 6, 6, 26, NULL, '2022-04-06 04:43:04', '2022-04-06 04:43:04'),
(140, 'Kakuma Magistrate Court', 'KKMMGC', 'KKMMGC', 0, 0, 0, 6, 6, 58, NULL, '2022-04-06 04:43:04', '2022-04-06 04:43:04'),
(141, 'Lodwar Kadhi Court', 'LDWKDC', 'LDWKDC', 0, 0, 0, 7, 7, 26, NULL, '2022-04-06 04:43:04', '2022-04-06 04:43:04'),
(142, 'Kapenguria High Court', 'KPGHGC', 'KPGHGC', 0, 0, 0, 3, 3, 19, NULL, '2022-04-06 04:43:04', '2022-04-06 04:43:04'),
(143, 'Kapenguria Magistrate Court', 'KPGMGC', 'KPGMGC', 0, 0, 0, 6, 6, 19, NULL, '2022-04-06 04:43:04', '2022-04-06 04:43:04'),
(144, 'Wamba under Maralal Magistrate Court', 'WMBMGC', 'WMBMGC', 0, 0, 0, 6, 6, 83, NULL, '2022-04-06 04:43:04', '2022-04-06 04:43:04'),
(145, 'Maralal Magistrate Court', 'MRLMGC', 'MRLMGC', 0, 0, 0, 6, 6, 83, NULL, '2022-04-06 04:43:04', '2022-04-06 04:43:04'),
(146, 'Kitale High Court', 'KTLHGC', 'KTLHGC', 0, 0, 0, 3, 3, 24, NULL, '2022-04-06 04:43:04', '2022-04-06 04:43:04'),
(147, 'Kitale Environment and Land Court', 'KTGELC', 'KTGELC', 0, 0, 0, 5, 5, 24, NULL, '2022-04-06 04:43:04', '2022-04-06 04:43:04'),
(148, 'Kitale Magistrate Court', 'KTGMGC', 'KTGMGC', 0, 0, 0, 6, 6, 24, NULL, '2022-04-06 04:43:04', '2022-04-06 04:43:04'),
(149, 'Kitale Kadhi Court', 'KTGKDC', 'KTGKDC', 0, 0, 0, 7, 7, 24, NULL, '2022-04-06 04:43:04', '2022-04-06 04:43:04'),
(150, 'Eldoret Court of Appeal', 'ELDCOA', 'ELDCOA', 0, 0, 0, 2, 2, 11, NULL, '2022-04-06 04:43:04', '2022-04-06 04:43:04'),
(151, 'Eldoret High Court', 'ELDHGC', 'ELDHGC', 0, 0, 0, 3, 3, 11, NULL, '2022-04-06 04:43:04', '2022-04-06 04:43:04'),
(152, 'Eldoret Environment and Land Court', 'ELDELC', 'ELDELC', 0, 0, 0, 5, 5, 11, NULL, '2022-04-06 04:43:04', '2022-04-06 04:43:04'),
(153, 'Eldoret Magistrate Court', 'ELDMGC', 'ELDMGC', 0, 0, 0, 6, 6, 11, NULL, '2022-04-06 04:43:04', '2022-04-06 04:43:04'),
(154, 'Eldoret Kadhi Court', 'ELDKDC', 'ELDKDC', 0, 0, 0, 7, 7, 11, NULL, '2022-04-06 04:43:04', '2022-04-06 04:43:04'),
(155, 'Iten Magistrate Court', 'ITNMGC', 'ITNMGC', 0, 0, 0, 6, 6, 56, NULL, '2022-04-06 04:43:04', '2022-04-06 04:43:04'),
(156, 'Songhor under Kapsabet Magistrate Court', 'SNGMGC', 'SNGMGC', 0, 0, 0, 6, 6, 63, NULL, '2022-04-06 04:43:04', '2022-04-06 04:43:04'),
(157, 'Kapsabet Magistrate Court', 'KPBMGC', 'KPBMGC', 0, 0, 0, 6, 6, 63, NULL, '2022-04-06 04:43:05', '2022-04-06 04:43:05'),
(158, 'Kabarnet High Court', 'KBTHGC', 'KBTHGC', 0, 0, 0, 3, 3, 16, NULL, '2022-04-06 04:43:05', '2022-04-06 04:43:05'),
(159, 'East Pokot under Kabarnet Magistrate Court', 'EPKMGC', 'EPKMGC', 0, 0, 0, 6, 6, 16, NULL, '2022-04-06 04:43:05', '2022-04-06 04:43:05'),
(160, 'Kabarnet Magistrate Court', 'KBTMGC', 'KBTMGC', 0, 0, 0, 6, 6, 16, NULL, '2022-04-06 04:43:05', '2022-04-06 04:43:05'),
(161, 'Nanyuki High Court', 'NYKHGC', 'NYKHGC', 0, 0, 0, 3, 3, 36, NULL, '2022-04-06 04:43:05', '2022-04-06 04:43:05'),
(162, 'Nanyuki Magistrate Court', 'NYKMGC', 'NYKMGC', 0, 0, 0, 6, 6, 36, NULL, '2022-04-06 04:43:05', '2022-04-06 04:43:05'),
(163, 'Nyahururu Magistrate Court', 'NYHMGC', 'NYHMGC', 0, 0, 0, 6, 6, 100, NULL, '2022-04-06 04:43:05', '2022-04-06 04:43:05'),
(164, 'Naivasha High Court', 'NSHHGC', 'NSHHGC', 0, 0, 0, 3, 3, 34, NULL, '2022-04-06 04:43:05', '2022-04-06 04:43:05'),
(165, 'Nakuru High Court', 'NKRHGC', 'NKRHGC', 0, 0, 0, 3, 3, 35, NULL, '2022-04-06 04:43:05', '2022-04-06 04:43:05'),
(166, 'Nakuru ELRC', 'NKRERC', 'NKRERC', 0, 0, 0, 4, 4, 35, NULL, '2022-04-06 04:43:05', '2022-04-06 04:43:05'),
(167, 'Nakuru Environment and Land Court', 'NKRELC', 'NKRELC', 0, 0, 0, 5, 5, 35, NULL, '2022-04-06 04:43:05', '2022-04-06 04:43:05'),
(168, 'Eldama Ravine Magistrate Court', 'ERVMGC', 'ERVMGC', 0, 0, 0, 6, 6, 47, NULL, '2022-04-06 04:43:05', '2022-04-06 04:43:05'),
(169, 'Molo Magistrate Court', 'MOLMGC', 'MOLMGC', 0, 0, 0, 6, 6, 90, NULL, '2022-04-06 04:43:05', '2022-04-06 04:43:05'),
(170, 'Naivasha Magistrate Court', 'NSHMGC', 'NSHMGC', 0, 0, 0, 6, 6, 34, NULL, '2022-04-06 04:43:05', '2022-04-06 04:43:05'),
(171, 'Nakuru Magistrate Court', 'NKRMGC', 'NKRMGC', 0, 0, 0, 6, 6, 35, NULL, '2022-04-06 04:43:05', '2022-04-06 04:43:05'),
(172, 'Nakuru Kadhi Court', 'NKRKDC', 'NKRKDC', 0, 0, 0, 7, 7, 35, NULL, '2022-04-06 04:43:05', '2022-04-06 04:43:05'),
(173, 'Narok High Court', 'NRKHGC', 'NRKHGC', 0, 0, 0, 3, 3, 37, NULL, '2022-04-06 04:43:05', '2022-04-06 04:43:05'),
(174, 'Narok Magistrate Court', 'NRKMGC', 'NRKMGC', 0, 0, 0, 6, 6, 37, NULL, '2022-04-06 04:43:05', '2022-04-06 04:43:05'),
(175, 'Kajiado High Court', 'KJDHGC', 'KJDHGC', 0, 0, 0, 3, 3, 17, NULL, '2022-04-06 04:43:06', '2022-04-06 04:43:06'),
(176, 'Ngong Magistrate Court', 'NGNMGC', 'NGNMGC', 0, 0, 0, 6, 6, 98, NULL, '2022-04-06 04:43:06', '2022-04-06 04:43:06'),
(177, 'Kajiado Magistrate Court', 'KJDMGC', 'KJDMGC', 0, 0, 0, 6, 6, 17, NULL, '2022-04-06 04:43:06', '2022-04-06 04:43:06'),
(178, 'Loitoktok Magistrate Court', 'LTKMGC', 'LTKMGC', 0, 0, 0, 6, 6, 79, NULL, '2022-04-06 04:43:06', '2022-04-06 04:43:06'),
(179, 'Kajiado Kadhi Court', 'KJDKDC', 'KJDKDC', 0, 0, 0, 7, 7, 17, NULL, '2022-04-06 04:43:06', '2022-04-06 04:43:06'),
(180, 'Kericho High Court', 'KRCHGC', 'KRCHGC', 0, 0, 0, 3, 3, 20, NULL, '2022-04-06 04:43:06', '2022-04-06 04:43:06'),
(181, 'Kericho ELRC', 'KRCERC', 'KRCERC', 0, 0, 0, 4, 4, 20, NULL, '2022-04-06 04:43:06', '2022-04-06 04:43:06'),
(182, 'Kericho Environment and Land Court', 'KRCELC', 'KRCELC', 0, 0, 0, 5, 5, 20, NULL, '2022-04-06 04:43:06', '2022-04-06 04:43:06'),
(183, 'Kericho Magistrate Court', 'KRCMGC', 'KRCMGC', 0, 0, 0, 6, 6, 20, NULL, '2022-04-06 04:43:06', '2022-04-06 04:43:06'),
(184, 'Kericho Kadhi Court', 'KRCKDC', 'KRCKDC', 0, 0, 0, 7, 7, 20, NULL, '2022-04-06 04:43:06', '2022-04-06 04:43:06'),
(185, 'Bomet High Court', 'BMTHGC', 'BMTHGC', 0, 0, 0, 3, 3, 7, NULL, '2022-04-06 04:43:06', '2022-04-06 04:43:06'),
(186, 'Bomet Magistrate Court', 'BMTMGC', 'BMTMGC', 0, 0, 0, 6, 6, 7, NULL, '2022-04-06 04:43:06', '2022-04-06 04:43:06'),
(187, 'Sotik Magistrate Court', 'STKMGC', 'STKMGC', 0, 0, 0, 6, 6, 110, NULL, '2022-04-06 04:43:06', '2022-04-06 04:43:06'),
(188, 'Kakamega High Court', 'KKGHGC', 'KKGHGC', 0, 0, 0, 3, 3, 18, NULL, '2022-04-06 04:43:06', '2022-04-06 04:43:06'),
(189, 'Kakamega Environment and Land Court', 'KKGELC', 'KKGELC', 0, 0, 0, 5, 5, 18, NULL, '2022-04-06 04:43:06', '2022-04-06 04:43:06'),
(190, 'Butali Magistrate Court', 'BTLMGC', 'BTLMGC', 0, 0, 0, 6, 6, 45, NULL, '2022-04-06 04:43:06', '2022-04-06 04:43:06'),
(191, 'Butere Magistrate Court', 'BTRMGC', 'BTRMGC', 0, 0, 0, 6, 6, 46, NULL, '2022-04-06 04:43:06', '2022-04-06 04:43:06'),
(192, 'Kakamega Magistrate Court', 'KKGMGC', 'KKGMGC', 0, 0, 0, 6, 6, 18, NULL, '2022-04-06 04:43:06', '2022-04-06 04:43:06'),
(193, 'Mumias Magistrate Court', 'MMSMGC', 'MMSMGC', 0, 0, 0, 6, 6, 94, NULL, '2022-04-06 04:43:07', '2022-04-06 04:43:07'),
(194, 'Kakamega Kadhi Court', 'KKGKDC', 'KKGKDC', 0, 0, 0, 7, 7, 18, NULL, '2022-04-06 04:43:07', '2022-04-06 04:43:07'),
(195, 'Vihiga Magistrate Court', 'VGHMGC', 'VGHMGC', 1, 0, 0, 6, 6, 117, NULL, '2022-04-06 04:43:07', '2022-04-06 04:43:07'),
(196, 'Hamisi Magistrate Court', 'HMSMGC', 'HMSMGC', 0, 0, 0, 6, 6, 53, NULL, '2022-04-06 04:43:07', '2022-04-06 04:43:07'),
(197, 'Bungoma High Court', 'BNGHGC', 'BNGHGC', 0, 0, 0, 3, 3, 8, NULL, '2022-04-06 04:43:07', '2022-04-06 04:43:07'),
(198, 'Bungoma  Environment and Land Court', 'BNGELC', 'BNGELC', 0, 0, 0, 5, 5, 8, NULL, '2022-04-06 04:43:07', '2022-04-06 04:43:07'),
(199, 'Kapsokwony under Kimilili Magistrate Court', 'KKWMGC', 'KKWMGC', 0, 0, 0, 6, 6, 73, NULL, '2022-04-06 04:43:07', '2022-04-06 04:43:07'),
(200, 'Bungoma Magistrate Court', 'BNGMGC', 'BNGMGC', 0, 0, 0, 6, 6, 8, NULL, '2022-04-06 04:43:07', '2022-04-06 04:43:07'),
(201, 'Kimilili Magistrate Court', 'KMLMGC', 'KMLMGC', 1, 0, 0, 6, 6, 73, NULL, '2022-04-06 04:43:07', '2022-04-06 04:43:07'),
(202, 'Sirisia Magistrate Court', 'SRSMGC', 'SRSMGC', 0, 0, 0, 6, 6, 109, NULL, '2022-04-06 04:43:07', '2022-04-06 04:43:07'),
(203, 'Webuye Magistrate Court', 'WBYMGC', 'WBYMGC', 0, 0, 0, 6, 6, 120, NULL, '2022-04-06 04:43:07', '2022-04-06 04:43:07'),
(204, 'Bungoma Kadhi Court', 'BNGKDC', 'BNGKDC', 0, 0, 0, 7, 7, 8, NULL, '2022-04-06 04:43:07', '2022-04-06 04:43:07'),
(205, 'Busia High Court', 'BSAHGC', 'BSAHGC', 1, 0, 0, 3, 3, 9, NULL, '2022-04-06 04:43:07', '2022-04-06 04:43:07'),
(206, 'Busia Environment and Land Court', 'BSAELC', 'BSAELC', 0, 0, 0, 5, 5, 9, NULL, '2022-04-06 04:43:07', '2022-04-06 04:43:07'),
(207, 'Busia Magistrate Court', 'BSAMGC', 'BSAMGC', 0, 0, 0, 6, 6, 9, NULL, '2022-04-06 04:43:07', '2022-04-06 04:43:07'),
(208, 'Siaya High Court', 'SYAHGC', 'SYAHGC', 0, 0, 0, 3, 3, 40, NULL, '2022-04-06 04:43:07', '2022-04-06 04:43:07'),
(209, 'Bondo Magistrate Court', 'BNDMGC', 'BNDMGC', 0, 0, 0, 6, 6, 44, NULL, '2022-04-06 04:43:07', '2022-04-06 04:43:07'),
(210, 'Siaya Magistrate Court', 'SYAMGC', 'SYAMGC', 0, 0, 0, 6, 6, 40, NULL, '2022-04-06 04:43:07', '2022-04-06 04:43:07'),
(211, 'Ukwala Magistrate Court', 'UKLMGC', 'UKLMGC', 0, 0, 0, 6, 6, 116, NULL, '2022-04-06 04:43:08', '2022-04-06 04:43:08'),
(212, 'Kisumu Court of Appeal', 'KSMCOA', 'KSMCOA', 0, 0, 0, 2, 2, 4, NULL, '2022-04-06 04:43:08', '2022-04-06 04:43:08'),
(213, 'Kisumu High Court', 'KSMHGC', 'KSMHGC', 0, 0, 0, 3, 3, 4, NULL, '2022-04-06 04:43:08', '2022-04-06 04:43:08'),
(214, 'Kisumu ELRC', 'KSMERC', 'KSMERC', 0, 0, 0, 4, 4, 4, NULL, '2022-04-06 04:43:08', '2022-04-06 04:43:08'),
(215, 'Kisumu Environment and Land Court', 'KSMELC', 'KSMELC', 0, 0, 0, 5, 5, 4, NULL, '2022-04-06 04:43:08', '2022-04-06 04:43:08'),
(216, 'Kisumu Magistrate Court', 'KSMMGC', 'KSMMGC', 0, 0, 0, 6, 6, 4, NULL, '2022-04-06 04:43:08', '2022-04-06 04:43:08'),
(217, 'Maseno Magistrate Court', 'MSNMGC', 'MSNMGC', 1, 0, 0, 6, 6, 86, NULL, '2022-04-06 04:43:08', '2022-04-06 04:43:08'),
(218, 'Winam Magistrate Court', 'WNMMGC', 'WNMMGC', 0, 0, 0, 6, 6, 121, NULL, '2022-04-06 04:43:08', '2022-04-06 04:43:08'),
(219, 'Nyando Magistrate Court', 'NYDMGC', 'NYDMGC', 0, 0, 0, 6, 6, 101, NULL, '2022-04-06 04:43:08', '2022-04-06 04:43:08'),
(220, 'Tamu Magistrate Court', 'TAMMGC', 'TAMMGC', 0, 0, 0, 6, 6, 111, NULL, '2022-04-06 04:43:08', '2022-04-06 04:43:08'),
(221, 'Kisumu Kadhi Court', 'KSMKDC', 'KSMKDC', 0, 0, 0, 7, 7, 4, NULL, '2022-04-06 04:43:08', '2022-04-06 04:43:08'),
(222, 'Homabay High Court', 'HMBHGC', 'HMBHGC', 0, 0, 0, 3, 3, 15, NULL, '2022-04-06 04:43:08', '2022-04-06 04:43:08'),
(223, 'Kendu Bay under Oyugis Magistrate Court', 'KDBMGC', 'KDBMGC', 0, 0, 0, 6, 6, 104, NULL, '2022-04-06 04:43:08', '2022-04-06 04:43:08'),
(224, 'Homabay Magistrate Court', 'HMBMGC', 'HMBMGC', 0, 0, 0, 6, 6, 15, NULL, '2022-04-06 04:43:08', '2022-04-06 04:43:08'),
(225, 'Ndhiwa Magistrate Court', 'NDWMGC', 'NDWMGC', 0, 0, 0, 6, 6, 97, NULL, '2022-04-06 04:43:08', '2022-04-06 04:43:08'),
(226, 'Oyugis Magistrate Court', 'OYGMGC', 'OYGMGC', 0, 0, 0, 6, 6, 104, NULL, '2022-04-06 04:43:08', '2022-04-06 04:43:08'),
(227, 'Mbita Magistrate Court', 'MBTMGC', 'MBTMGC', 0, 0, 0, 6, 6, 89, NULL, '2022-04-06 04:43:08', '2022-04-06 04:43:08'),
(228, 'Homabay Kadhi Court', 'HMBKDC', 'HMBKDC', 0, 0, 0, 7, 7, 15, NULL, '2022-04-06 04:43:08', '2022-04-06 04:43:08'),
(229, 'Migori High Court', 'MGRHGC', 'MGRHGC', 0, 0, 0, 3, 3, 31, NULL, '2022-04-06 04:43:08', '2022-04-06 04:43:08'),
(230, 'Kehancha Magistrate Court', 'KHCMGC', 'KHCMGC', 0, 0, 0, 6, 6, 65, NULL, '2022-04-06 04:43:09', '2022-04-06 04:43:09'),
(231, 'Migori Magistrate Court', 'MGRMGC', 'MGRMGC', 0, 0, 0, 6, 6, 31, NULL, '2022-04-06 04:43:09', '2022-04-06 04:43:09'),
(232, 'Rongo Magistrate Court', 'RNGMGC', 'RNGMGC', 0, 0, 0, 6, 6, 105, NULL, '2022-04-06 04:43:09', '2022-04-06 04:43:09'),
(233, 'Migori Kadhi Court', 'MGRKDC', 'MGRKDC', 0, 0, 0, 7, 7, 31, NULL, '2022-04-06 04:43:09', '2022-04-06 04:43:09'),
(234, 'Kisii High Court', 'KISHGC', 'KISHGC', 0, 0, 0, 3, 3, 23, NULL, '2022-04-06 04:43:09', '2022-04-06 04:43:09'),
(235, 'Kisii Environment and Land Court', 'KISELC', 'KISELC', 0, 0, 0, 5, 5, 23, NULL, '2022-04-06 04:43:09', '2022-04-06 04:43:09'),
(236, 'Kisii Magistrate Court', 'KISMGC', 'KISMGC', 0, 0, 0, 6, 6, 23, NULL, '2022-04-06 04:43:09', '2022-04-06 04:43:09'),
(237, 'Ogembo Magistrate Court', 'OGBMGC', 'OGBMGC', 0, 0, 0, 6, 6, 102, NULL, '2022-04-06 04:43:09', '2022-04-06 04:43:09'),
(238, 'Nyamira High Court', 'NYMHGC', 'NYMHGC', 0, 0, 0, 3, 3, 38, NULL, '2022-04-06 04:43:09', '2022-04-06 04:43:09'),
(239, 'Keroka Magistrate Court', 'KRKMGC', 'KRKMGC', 0, 0, 0, 6, 6, 66, NULL, '2022-04-06 04:43:09', '2022-04-06 04:43:09'),
(240, 'Kilgoris Magistrate Court', 'KLGMGC', 'KLGMGC', 0, 0, 0, 6, 6, 70, NULL, '2022-04-06 04:43:09', '2022-04-06 04:43:09'),
(241, 'Nyamira Magistrate Court', 'NYMMGC', 'NYMMGC', 0, 0, 0, 6, 6, 38, NULL, '2022-04-06 04:43:09', '2022-04-06 04:43:09'),
(242, 'Supreme Court', 'NRBSPC', 'NRBSPC', 0, 0, 0, 1, 1, 1, NULL, '2022-04-06 04:43:09', '2022-04-06 04:43:09'),
(243, 'Nairobi Court of Appeal', 'NRBCOA', 'NRBCOA', 1, 0, 0, 2, 2, 1, NULL, '2022-04-06 04:43:09', '2022-04-06 04:43:09'),
(244, 'Milimani High Court', 'MILHGC', 'MILHGC', 1, 0, 0, 3, 3, 2, NULL, '2022-04-06 04:43:09', '2022-04-06 04:43:09'),
(245, 'Nairobi Employment and Labour Relations Court', 'NRBERC', 'NRBERC', 0, 0, 0, 4, 4, 3, NULL, '2022-04-06 04:43:09', '2022-04-06 04:43:09'),
(246, 'Milimani Environment and Land Court', 'MILELC', 'MILELC', 1, 0, 0, 5, 5, 2, NULL, '2022-04-06 04:43:10', '2022-04-06 04:43:10'),
(247, 'Milimani Commercial Magistrate Court', 'MILCMC', 'MILCMC', 0, 0, 0, 6, 6, 3, NULL, '2022-04-06 04:43:10', '2022-04-06 04:43:10'),
(249, 'Milimani Magistrate Court', 'MILMGC', 'MILMGC', 0, 0, 0, 6, 6, 2, NULL, '2022-04-06 04:43:10', '2022-04-06 04:43:10'),
(250, 'Nairobi City Court', 'NRBCTC', 'NRBCTC', 0, 0, 0, 6, 6, 2, NULL, '2022-04-06 04:43:10', '2022-04-06 04:43:10'),
(251, 'Makadara Magistrate Court', 'MKDMGC', 'MKDMGC', 0, 0, 0, 6, 6, 80, NULL, '2022-04-06 04:43:10', '2022-04-06 04:43:10'),
(252, 'Kibera Magistrate Court', 'KBRMGC', 'KBRMGC', 0, 0, 0, 6, 6, 67, NULL, '2022-04-06 04:43:10', '2022-04-06 04:43:10'),
(254, 'JKIA Magistrate Court', 'JKAMGC', 'JKAMGC', 0, 0, 0, 6, 6, 57, NULL, '2022-04-06 04:43:10', '2022-04-06 04:43:10'),
(255, 'Nairobi Kadhi Court', 'NRBKDC', 'NRBKDC', 0, 0, 0, 7, 7, 2, NULL, '2022-04-06 04:43:10', '2022-04-06 04:43:10'),
(256, 'Kibera Kadhi Court', 'KBRKDC', 'KBRKDC', 0, 0, 0, 7, 7, 67, NULL, '2022-04-06 04:43:10', '2022-04-06 04:43:10'),
(257, 'Wajir High Court', 'WJRHGC', 'WJRHGC', 0, 0, 0, 3, 3, 118, NULL, '2022-04-06 04:43:10', '2022-04-06 04:43:10'),
(258, 'Political Parties Disputes Tribunal (PPDT)', 'PPDTBN', 'PPDTBN', 0, 0, 0, 8, 8, 136, NULL, '2022-04-06 04:43:10', '2022-04-06 04:43:10'),
(259, 'The National Environment Tribunal', 'NETTBN', 'NETTBN', 0, 0, 0, 8, 8, 136, NULL, '2022-04-06 04:43:10', '2022-04-06 04:43:10'),
(260, 'Sports Disputes Tribunal', 'SPDTBN', 'SPDTBN', 0, 0, 0, 8, 8, 136, NULL, '2022-04-06 04:43:10', '2022-04-06 04:43:10'),
(261, 'Co-operative Tribunal', 'COPTBN', 'COPTBN', 1, 0, 0, 8, 8, 136, NULL, '2022-04-06 04:43:10', '2022-04-06 04:43:10'),
(262, 'Auctioneers Licensing Board', 'ALB', 'ALB', 0, 0, 0, 8, 8, 136, NULL, '2022-04-06 04:43:10', '2022-04-06 04:43:10'),
(263, 'Water Appeals Board', 'WAB', 'ALBTBN', 0, 0, 0, 8, 8, 136, NULL, '2022-04-06 04:43:10', '2022-04-06 04:43:10'),
(264, 'HIV and AIDS Tribunal', 'HIVTBN', 'HIVTBN', 0, 0, 0, 8, 8, 136, NULL, '2022-04-06 04:43:10', '2022-04-06 04:43:10'),
(265, 'Public Private Partnership Petition Committee', 'PPPPC', 'PPPPC', 0, 0, 0, 8, 8, 136, NULL, '2022-04-06 04:43:10', '2022-04-06 04:43:10'),
(266, 'Rent Restriction Tribunal', 'RRTTBN', 'RRTTBN', 0, 0, 0, 8, 8, 136, NULL, '2022-04-06 04:43:10', '2022-04-06 04:43:10'),
(267, 'Business Premises Rent Tribunal', 'BPRTBN', 'BPRTBN', 0, 0, 0, 8, 8, 136, NULL, '2022-04-06 04:43:10', '2022-04-06 04:43:10'),
(276, 'Competition Tribunal', 'CPTTBN', 'CPTTBN', 0, 0, 0, 8, 8, 136, NULL, '2022-04-06 04:43:10', '2022-04-06 04:43:10'),
(277, 'Standards Tribunal', 'STDTBN', 'STDTBN', 0, 0, 0, 8, 8, 136, NULL, '2022-04-06 04:43:11', '2022-04-06 04:43:11'),
(278, 'Thika High Court', 'TKAHGC', 'TKAHGC', 0, 0, 0, 3, 3, 42, NULL, '2022-04-06 04:43:11', '2022-04-06 04:43:11'),
(280, 'National Civil Aviation Administrative Review Tribunal', 'NAART', 'NAART', 0, 0, 0, 8, 8, 136, NULL, '2022-04-06 04:43:11', '2022-04-06 04:43:11'),
(281, 'Industrial Property Tribunal', 'IPT', 'IPT', 0, 0, 0, 8, 8, 136, NULL, '2022-04-06 04:43:11', '2022-04-06 04:43:11'),
(282, 'State Corporations Appeal Tribunal', 'SCAT', 'SCAT', 0, 0, 0, 8, 8, 136, NULL, '2022-04-06 04:43:11', '2022-04-06 04:43:11'),
(283, 'Registrar of Trademark Tribunal', 'RTT', 'RTT', 0, 0, 0, 8, 8, 136, NULL, '2022-04-06 04:43:11', '2022-04-06 04:43:11'),
(284, 'Ruiru Magistrate Court', 'RURMGC', 'RURMGC', 0, 0, 0, 6, 6, 139, NULL, '2022-04-06 04:43:11', '2022-04-06 04:43:11'),
(285, 'Meru Employment and Labour Relations Court', 'MRUERC', 'MRUERC', 1, 0, 0, 4, 4, 30, NULL, '2022-04-06 04:43:11', '2022-04-06 04:43:11'),
(286, 'Eldoret ELRC', 'ELDELRC', 'ELDELRC', 0, 0, 0, 4, 4, 11, NULL, '2022-04-06 04:43:11', '2022-04-06 04:43:11'),
(287, 'Migori ELC', 'MGRELC', 'MGRELC', 0, 0, 0, 5, 5, 31, NULL, '2022-04-06 04:43:11', '2022-04-06 04:43:11'),
(288, 'Kajiado ELC', 'KJDELC', 'KJDELC', 0, 0, 0, 5, 5, 17, NULL, '2022-04-06 04:43:11', '2022-04-06 04:43:11'),
(289, 'Muranga ELC', 'MRGELC', 'MRGELC', 0, 0, 0, 5, 5, 33, NULL, '2022-04-06 04:43:11', '2022-04-06 04:43:11'),
(290, 'Bungoma ELRC', 'BNGERC', 'BNGERC', 0, 0, 0, 4, 4, 8, NULL, '2022-04-06 04:43:11', '2022-04-06 04:43:11'),
(291, 'Malindi ELRC', 'MLDERC', 'MLDERC', 0, 0, 0, 4, 4, 5, NULL, '2022-04-06 04:43:11', '2022-04-06 04:43:11'),
(292, 'Busia Kadhi Court', 'BSAKDC', 'BSAKDC', 0, 0, 0, 7, 7, 9, NULL, '2022-04-06 04:43:11', '2022-04-06 04:43:11'),
(293, 'Land Dispute Tribunal', 'LDT', 'LDT', 0, 0, 0, 8, 8, 136, NULL, '2022-04-06 04:43:11', '2022-04-06 04:43:11'),
(294, 'Thika Environment and Land Court', 'TKAELC', 'TKAELC', 0, 0, 0, 5, 5, 42, NULL, '2022-04-06 04:43:11', '2022-04-06 04:43:11'),
(296, 'Msambweni Magistrate Court', 'MWNMGC', 'MWNMGC', 0, 0, 0, 6, 6, 133, NULL, '2022-04-06 04:43:11', '2022-04-06 04:43:11'),
(299, 'Wamunyu Mobile Court under Machakos Law Court', 'WAYMGC', 'WAYMGC', 0, 0, 0, 6, 6, 27, NULL, '2022-04-06 04:43:11', '2022-04-06 04:43:11'),
(300, 'Migwani Mobile Court Under Mwingi Law Court', 'MGWMGC', 'MGWMGC', 0, 0, 0, 6, 6, 96, NULL, '2022-04-06 04:43:12', '2022-04-06 04:43:12'),
(301, 'Nyahururu ELC', 'NYHELC', 'NYHELC', 0, 0, 0, 5, 5, 100, NULL, '2022-04-06 04:43:12', '2022-04-06 04:43:12'),
(302, 'Nyahururu High Court', 'NYHHGC', 'NYHHGC', 0, 0, 0, 3, 3, 100, NULL, '2022-04-06 04:43:12', '2022-04-06 04:43:12'),
(303, 'Laisamis/Loyangalani Kadhi Court under Marsabit Law Court', 'LSMKDC', 'LSMKDC', 0, 0, 0, 7, 7, 29, NULL, '2022-04-06 04:43:12', '2022-04-06 04:43:12'),
(304, 'Northhorr/Illeret Magistrate Court Under Marsabit Law Court', 'NTHMGC', 'NTHMGC', 0, 0, 0, 6, 6, 29, NULL, '2022-04-06 04:43:12', '2022-04-06 04:43:12'),
(305, 'Northhorr/Illeret Kadhi Court Under Marsabit Law Court', 'NTHKDC', 'NTHKDC', 0, 0, 0, 7, 7, 29, NULL, '2022-04-06 04:43:12', '2022-04-06 04:43:12'),
(306, 'Vihiga Kadhi Court', 'VHGKDC', 'VHGKDC', 1, 0, 0, 6, 6, 117, NULL, '2022-04-06 04:43:12', '2022-04-06 04:43:12'),
(307, 'Transport Licensing Appeals Board Tribunal', 'TLBTBN', 'TLBTBN', 0, 0, 0, 8, 8, 136, NULL, '2022-04-06 04:43:12', '2022-04-06 04:43:12'),
(308, 'Advocates Disciplinary Tribunal', 'ADT', 'ADT', 0, 0, 0, 8, 8, 136, NULL, '2022-04-06 04:43:12', '2022-04-06 04:43:12'),
(309, 'Communications and Multimedia Appeals Tribunal ', 'CAMAT', 'CAMAT', 0, 0, 0, 8, 8, 136, NULL, '2022-04-06 04:43:12', '2022-04-06 04:43:12'),
(310, 'Legal Education Appeals Tribunal ', 'LEAT', 'LEAT', 0, 0, 0, 8, 8, 136, NULL, '2022-04-06 04:43:12', '2022-04-06 04:43:12'),
(311, 'Micro and Small Enterprise Tribunal ', 'MSET', 'MSET', 0, 0, 0, 8, 8, 136, NULL, '2022-04-06 04:43:12', '2022-04-06 04:43:12'),
(312, 'Competent Authority Tribunal ', 'COMPTBN', 'COMPTBN', 0, 0, 0, 8, 8, 136, NULL, '2022-04-06 04:43:12', '2022-04-06 04:43:12'),
(313, 'Training Law Court', 'TLC', 'TLC', 0, 0, 0, 6, 6, 140, NULL, '2022-04-06 04:43:12', '2022-04-06 04:43:12'),
(315, 'Kenya Institute of Supplies Management Elections Committee', 'KISM', 'KISM', 0, 0, 0, 9, 9, 141, NULL, '2022-04-06 04:43:13', '2022-04-06 04:43:13'),
(317, 'Narok ELC', 'NRKELC', 'NRKELC', 0, 0, 0, 5, 5, 37, NULL, '2022-04-06 04:43:13', '2022-04-06 04:43:13'),
(318, 'Narok Kadhi Court', 'NRKKC', 'NRKKC', 0, 0, 0, 7, 7, 37, NULL, '2022-04-06 04:43:13', '2022-04-06 04:43:13'),
(319, 'Olokurto Mobile Court', 'OLOKMGC', 'OLOKMGC', 0, 0, 0, 6, 6, 37, NULL, '2022-04-06 04:43:13', '2022-04-06 04:43:13'),
(321, 'Limuru Magistrate Court', 'LMRMGC', 'LMRMGC', 0, 0, 0, 6, 6, 78, NULL, '2022-04-06 04:43:13', '2022-04-06 04:43:13'),
(322, 'Nakuru Court of Appeal', 'NKRCOA', 'NKRCOA', 0, 0, 0, 2, 2, 35, NULL, '2022-04-06 04:43:13', '2022-04-06 04:43:13'),
(323, 'Mombasa Court of Appeal', 'MSACOA', 'MSACOA', 0, 0, 0, 2, 2, 32, NULL, '2022-04-06 04:43:13', '2022-04-06 04:43:13'),
(324, 'Dadaab Magistrate Court', 'DDBMGC', 'DDBMGC', 0, 0, 0, 6, 6, 125, NULL, '2022-04-06 04:43:13', '2022-04-06 04:43:13'),
(325, 'Kahawa Magistrate Court', 'KHWMGC', 'KHWMGC', 0, 0, 0, 6, 6, 142, NULL, '2022-04-06 04:43:13', '2022-04-06 04:43:13'),
(326, 'Bura/Fafi Kadhis Court', 'BAFKDC', 'BAFKDC', 0, 0, 0, 7, 7, 143, NULL, '2022-04-06 04:43:13', '2022-04-06 04:43:13'),
(327, 'Witu Kadhi Court', 'WITKDC', 'WITKDC', 0, 0, 0, 7, 7, 135, NULL, '2022-04-06 04:43:13', '2022-04-06 04:43:13'),
(328, 'Kakuma Kadhi Court', 'KKMKDC', 'KKMKDC', 0, 0, 0, 7, 7, 58, NULL, '2022-04-06 04:43:13', '2022-04-06 04:43:13'),
(329, 'Gaitu Mobile Court', 'GMC', 'GMC', 0, 0, 0, 6, 6, 51, NULL, '2022-04-06 04:43:13', '2022-04-06 04:43:13'),
(330, 'Copyright Tribunal', 'COPT', 'COPT', 0, 0, 0, 8, 8, 156, NULL, '2022-04-06 04:43:13', '2022-04-06 04:43:13'),
(331, 'Baragoi Mobile Court (under Maralal Magistrate Court)', 'BRGMGC', 'BRGMGC', 0, 0, 0, 6, 6, 83, NULL, '2022-04-06 04:43:13', '2022-04-06 04:43:13'),
(332, 'Mikinduri Mobile Court Under Tigania', 'MIKMGC', 'MIKMGC', 0, 0, 0, 6, 6, 114, NULL, '2022-04-06 04:43:13', '2022-04-06 04:43:13'),
(333, 'Machakos ELRC', 'MKSERC', 'MKSERC', 0, 0, 0, 4, 4, 27, NULL, '2022-04-06 04:43:14', '2022-04-06 04:43:14'),
(334, 'Etago Mobile Court under Ogembo Court', 'ETGMGC', 'ETGMGC', 0, 0, 0, 6, 6, 102, NULL, '2022-04-06 04:43:14', '2022-04-06 04:43:14'),
(335, 'Sololo Mobile Court Under Moyale', 'SOLMGC', 'SOLMGC', 0, 0, 0, 6, 6, 91, NULL, '2022-04-06 04:43:14', '2022-04-06 04:43:14'),
(336, 'Meru Kadhi Court', 'MRUKDC', 'MRUKDC', 0, 0, 0, 7, 7, 30, NULL, '2022-04-06 04:43:14', '2022-04-06 04:43:14'),
(337, 'Kipkelion Mobile Court Under Kericho Law Courts', 'KIPMGC', 'KIPMGC', 0, 0, 0, 6, 6, 20, NULL, '2022-04-06 04:43:14', '2022-04-06 04:43:14'),
(338, 'Refugee Appeal Board', 'RABD', 'RABD', 0, 0, 0, 8, 8, 136, NULL, '2022-04-06 04:43:14', '2022-04-06 04:43:14'),
(339, 'Education Appeals Tribunal - Nairobi', 'EATNAIROBI', 'EATNAIROBI', 0, 0, 0, 8, 8, 154, NULL, '2022-04-06 04:43:14', '2022-04-06 04:43:14'),
(340, 'HIV Tribunal', 'HAT', 'HAT', 0, 0, 0, 8, 8, 155, NULL, '2022-04-06 04:43:14', '2022-04-06 04:43:14'),
(341, 'Vihiga High Court', 'VHGHGC', 'VHGHGC', 0, 0, 0, 3, 3, 117, NULL, '2022-04-06 04:43:14', '2022-04-06 04:43:14'),
(342, 'Timau Mobile Court under Meru Law Courts', 'TIMMGC', 'TIMMGC', 0, 0, 0, 6, 6, 30, NULL, '2022-04-06 04:43:14', '2022-04-06 04:43:14'),
(343, 'Insurance Appeals Tribunal ', 'IATT', 'IATT', 0, 0, 0, 8, 8, 136, NULL, '2022-04-06 04:43:14', '2022-04-06 04:43:14'),
(345, 'Kikima Magistrate Court Under Tawa Law Courts', 'KIKMGC', 'KIKMGC', 0, 0, 0, 6, 6, 113, NULL, '2022-04-06 04:43:14', '2022-04-06 04:43:14'),
(346, 'Kilgoris High Court', 'KILHGC', 'KILHGC', 0, 0, 0, 3, 3, 70, NULL, '2022-04-06 04:43:14', '2022-04-06 04:43:14'),
(347, 'Kilgoris ELC', 'KILELC', 'KILELC', 0, 0, 0, 5, 5, 70, NULL, '2022-04-06 04:43:14', '2022-04-06 04:43:14'),
(348, 'ENERGY AND PETROLEUM TRIBUNAL', 'EPTBN', 'EPTBN', 0, 0, 0, 8, 8, 136, NULL, '2022-04-06 04:43:14', '2022-04-06 04:43:14'),
(349, 'Kapsabet High Court', 'KAPHGC', 'KAPHGC', 0, 0, 0, 3, 3, 63, NULL, '2022-04-06 04:43:14', '2022-04-06 04:43:14'),
(350, 'Sereolipi Magistrate Mobile Court Under Isiolo', 'SERMGC', 'SERMGC', 0, 0, 0, 6, 6, 55, NULL, '2022-04-06 04:43:14', '2022-04-06 04:43:14'),
(351, 'Merti Magistrate Mobile Court Under Isiolo', 'MERMGC', 'MERMGC', 0, 0, 0, 6, 6, 55, NULL, '2022-04-06 04:43:15', '2022-04-06 04:43:15'),
(352, 'Garissa ELRC', 'GRSELRC', 'GRSELRC', 0, 0, 0, 4, 4, 13, NULL, '2022-04-06 04:43:15', '2022-04-06 04:43:15'),
(353, 'Milimani Small Claims Court', 'MSCC', 'MSCC', 0, 0, 0, 13, 13, 3, NULL, '2022-04-06 04:43:15', '2022-04-06 04:43:15'),
(354, 'Kitale ELRC', 'KTLERC', 'KTLERC', 0, 0, 0, 4, 4, 24, NULL, '2022-04-06 04:43:15', '2022-04-06 04:43:15'),
(355, 'Judiciary Training Institute', 'JTI', 'JTI', 0, 0, 0, 11, 11, 1, NULL, '2022-04-06 04:43:15', '2022-04-06 04:43:15'),
(356, 'Office of the Registrar Magistrate Court (ORMC)', 'ORMC', 'ORMC', 0, 0, 0, 12, 12, 1, NULL, '2022-04-06 04:43:15', '2022-04-06 04:43:15'),
(357, 'Office of Registrar Supreme Court (ORSC)', 'ORSC', 'ORSC', 0, 0, 0, 12, 12, 1, NULL, '2022-04-06 04:43:15', '2022-04-06 04:43:15'),
(358, 'Office of Registrar Court of Appeal (ORCOA)', 'ORCOA', 'ORCOA', 0, 0, 0, 12, 12, 1, NULL, '2022-04-06 04:43:15', '2022-04-06 04:43:15'),
(359, 'Office of Registrar High Court (ORHC)', 'ORHC', 'ORHC', 0, 0, 0, 12, 12, 2, NULL, '2022-04-06 04:43:15', '2022-04-06 04:43:15'),
(360, 'Office of Principal Judge (OPJ)', 'OPJ', 'OPJ', 0, 0, 0, 12, 12, 2, NULL, '2022-04-06 04:43:15', '2022-04-06 04:43:15'),
(361, 'Office of Registrar Employment and Labour Relations Court (ORELRC)', 'ORELRC', 'ORELRC', 0, 0, 0, 12, 12, 3, NULL, '2022-04-06 04:43:15', '2022-04-06 04:43:15'),
(362, 'Office of Registrar Environment and Land Court (ORELC)', 'ORELC', 'ORELC', 0, 0, 0, 12, 12, 2, NULL, '2022-04-06 04:43:15', '2022-04-06 04:43:15'),
(363, 'Office of Registrar Tribunals (ORTR)', 'ORTR', 'ORTR', 0, 0, 0, 12, 12, 1, NULL, '2022-04-06 04:43:15', '2022-04-06 04:43:15'),
(364, 'Office of Registrar Small Claims Court (ORSCC)', 'ORSCC', 'ORSCC', 0, 0, 0, 12, 12, 3, NULL, '2022-04-06 04:43:15', '2022-04-06 04:43:15'),
(365, 'Office of Registrar Judicial Service Commission (ORJSC)', 'ORJSC', 'ORJSC', 0, 0, 0, 12, 12, 1, NULL, '2022-04-06 04:43:16', '2022-04-06 04:43:16'),
(366, 'Office of The Chief Justice (OCJ)', 'OCJ', 'OCJ', 0, 0, 0, 12, 12, 1, NULL, '2022-04-06 04:43:16', '2022-04-06 04:43:16'),
(367, 'Office of The Judiciary Ombudsman (OJO)', 'OJO', 'OJO', 0, 0, 0, 12, 12, 1, NULL, '2022-04-06 04:43:16', '2022-04-06 04:43:16'),
(368, 'Office of The Chief Registrar Judiciary (OCRJ)', 'OCRJ', 'OCRJ', 0, 0, 0, 12, 12, 1, NULL, '2022-04-06 04:43:16', '2022-04-06 04:43:16'),
(369, 'Community Service Orders Co-ordinator (CSOC)', 'CSOC', 'CSOC', 0, 0, 0, 12, 12, 1, NULL, '2022-04-06 04:43:16', '2022-04-06 04:43:16'),
(370, 'Marigat Mobile Court', 'MARMGC', 'MARMGC', 0, 0, 0, 6, 6, 16, NULL, '2022-04-06 04:43:16', '2022-04-06 04:43:16'),
(371, 'Siaya ELC', 'SYAELC', 'SYAELC', 0, 0, 0, 5, 5, 40, NULL, '2022-04-06 04:43:16', '2022-04-06 04:43:16'),
(372, 'Nyamira Environment and Land Court', 'NYMELC', 'NYMELC', 0, 0, 0, 5, 5, 38, NULL, '2022-04-06 04:43:16', '2022-04-06 04:43:16'),
(373, 'Isiolo Environment and Land Court', 'ISLELC', 'ISLELC', 0, 0, 0, 5, 5, 55, NULL, '2022-04-06 04:43:16', '2022-04-06 04:43:16'),
(374, 'Nanyuki Environment and Land Court', 'NYKELC', 'NYKELC', 0, 0, 0, 5, 5, 36, NULL, '2022-04-06 04:43:16', '2022-04-06 04:43:16'),
(375, 'Kapsabet Environment and Land Court', 'KPBELC', 'KPBELC', 0, 0, 0, 5, 5, 63, NULL, '2022-04-06 04:43:16', '2022-04-06 04:43:16'),
(376, 'Kitui Environment and Land Court', 'KTIELC', 'KTIELC', 0, 0, 0, 5, 5, 25, NULL, '2022-04-06 04:43:16', '2022-04-06 04:43:16'),
(377, 'Kwale Environment and Land Court', 'KWLELC', 'KWLELC', 0, 0, 0, 5, 5, 75, NULL, '2022-04-06 04:43:17', '2022-04-06 04:43:17'),
(378, 'Vihiga Environment and Land Court', 'VHGELC', 'VHGELC', 0, 0, 0, 5, 5, 117, NULL, '2022-04-06 04:43:17', '2022-04-06 04:43:17'),
(379, 'Homabay Environment and Land Court', 'HMBELC', 'HMBELC', 0, 0, 0, 5, 5, 15, NULL, '2022-04-06 04:43:17', '2022-04-06 04:43:17'),
(380, 'Port Victoria Mobile Court', 'POVMGC', 'POVMGC', 0, 0, 0, 6, 6, 9, NULL, '2022-04-06 04:43:17', '2022-04-06 04:43:17'),
(381, 'Malaba Mobile Court', 'MALMGC', 'MALMGC', 0, 0, 0, 6, 6, 9, NULL, '2022-04-06 04:43:17', '2022-04-06 04:43:17'),
(382, 'Butula Mobile Court', 'BUTMGC', 'BUTMGC', 0, 0, 0, 6, 6, 9, NULL, '2022-04-06 04:43:17', '2022-04-06 04:43:17'),
(383, 'Disciplinary & Ethics Committee of the Medical Practitioners and Dentists Council', 'DECMPDC', 'DECMPDC', 0, 0, 0, 8, 8, 136, NULL, '2022-04-06 04:43:17', '2022-04-06 04:43:17'),
(384, 'Judiciary Committee on Elections', 'JCE', 'JCE', 0, 0, 0, 9, 9, 2, NULL, '2022-04-06 04:43:17', '2022-04-06 04:43:17');

-- --------------------------------------------------------

--
-- Table structure for table `unit_division`
--

CREATE TABLE `unit_division` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_division`
--

INSERT INTO `unit_division` (`id`, `unit_id`, `division_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 244, 10, NULL, NULL, NULL),
(2, 244, 11, NULL, NULL, NULL),
(43, 244, 9, NULL, NULL, NULL),
(45, 244, 12, NULL, NULL, NULL),
(46, 244, 13, NULL, NULL, NULL),
(47, 244, 14, NULL, NULL, NULL),
(49, 246, 30, NULL, NULL, NULL),
(50, 249, 18, NULL, NULL, NULL),
(51, 247, 42, NULL, NULL, NULL),
(52, 242, 3, NULL, NULL, NULL),
(53, 244, 29, NULL, NULL, NULL),
(55, 249, 24, NULL, NULL, NULL),
(56, 249, 20, NULL, NULL, NULL),
(57, 249, 28, NULL, NULL, NULL),
(58, 245, 35, NULL, NULL, NULL),
(59, 243, 7, NULL, NULL, NULL),
(60, 243, 5, NULL, NULL, NULL),
(63, 1, 12, NULL, NULL, NULL),
(64, 1, 11, NULL, NULL, NULL),
(65, 1, 10, NULL, NULL, NULL),
(66, 1, 9, NULL, NULL, NULL),
(69, 1, 51, NULL, NULL, NULL),
(70, 3, 30, NULL, NULL, NULL),
(71, 6, 52, NULL, NULL, NULL),
(72, 6, 50, NULL, NULL, NULL),
(73, 6, 49, NULL, NULL, NULL),
(80, 164, 53, NULL, NULL, NULL),
(81, 170, 50, NULL, NULL, NULL),
(82, 170, 52, NULL, NULL, NULL),
(83, 170, 49, NULL, NULL, NULL),
(84, 7, 54, NULL, NULL, NULL),
(85, 8, 54, NULL, NULL, NULL),
(86, 9, 27, NULL, NULL, NULL),
(87, 6, 55, NULL, NULL, NULL),
(88, 129, 54, NULL, NULL, NULL),
(89, 2, 35, NULL, NULL, NULL),
(90, 261, 56, NULL, NULL, NULL),
(91, 267, 57, NULL, NULL, NULL),
(96, 128, 53, NULL, NULL, NULL),
(100, 259, 59, NULL, NULL, NULL),
(102, 68, 60, NULL, NULL, NULL),
(103, 67, 61, NULL, NULL, NULL),
(104, 70, 62, NULL, NULL, NULL),
(105, 244, 58, NULL, NULL, NULL),
(112, 251, 50, NULL, NULL, NULL),
(113, 251, 49, NULL, NULL, NULL),
(114, 260, 63, NULL, NULL, NULL),
(115, 251, 24, NULL, NULL, NULL),
(116, 171, 50, NULL, NULL, NULL),
(117, 171, 52, NULL, NULL, NULL),
(118, 171, 24, NULL, NULL, NULL),
(119, 171, 49, NULL, NULL, NULL),
(133, 100, 30, NULL, NULL, NULL),
(145, 133, 54, NULL, NULL, NULL),
(147, 284, 54, NULL, NULL, NULL),
(148, 69, 54, NULL, NULL, NULL),
(168, 285, 35, NULL, NULL, NULL),
(169, 153, 50, NULL, NULL, NULL),
(170, 153, 52, NULL, NULL, NULL),
(171, 153, 24, NULL, NULL, NULL),
(172, 153, 55, NULL, NULL, NULL),
(173, 255, 27, NULL, NULL, NULL),
(174, 286, 35, NULL, NULL, NULL),
(175, 152, 30, NULL, NULL, NULL),
(176, 151, 9, NULL, NULL, NULL),
(177, 151, 12, NULL, NULL, NULL),
(178, 151, 11, NULL, NULL, NULL),
(179, 154, 27, NULL, NULL, NULL),
(180, 162, 52, NULL, NULL, NULL),
(181, 162, 50, NULL, NULL, NULL),
(182, 161, 53, NULL, NULL, NULL),
(183, 145, 54, NULL, NULL, NULL),
(184, 151, 58, NULL, NULL, NULL),
(187, 157, 52, NULL, NULL, NULL),
(188, 157, 50, NULL, NULL, NULL),
(189, 64, 27, NULL, NULL, NULL),
(190, 63, 54, NULL, NULL, NULL),
(191, 208, 53, NULL, NULL, NULL),
(193, 214, 35, NULL, NULL, NULL),
(194, 210, 52, NULL, NULL, NULL),
(195, 210, 50, NULL, NULL, NULL),
(196, 215, 30, NULL, NULL, NULL),
(197, 206, 30, NULL, NULL, NULL),
(198, 287, 30, NULL, NULL, NULL),
(199, 167, 30, NULL, NULL, NULL),
(200, 109, 30, NULL, NULL, NULL),
(201, 16, 30, NULL, NULL, NULL),
(202, 235, 30, NULL, NULL, NULL),
(203, 93, 30, NULL, NULL, NULL),
(204, 205, 9, NULL, NULL, NULL),
(205, 205, 11, NULL, NULL, NULL),
(206, 207, 50, NULL, NULL, NULL),
(207, 207, 52, NULL, NULL, NULL),
(208, 207, 24, NULL, NULL, NULL),
(209, 216, 50, NULL, NULL, NULL),
(210, 216, 52, NULL, NULL, NULL),
(211, 216, 49, NULL, NULL, NULL),
(212, 108, 35, NULL, NULL, NULL),
(213, 112, 52, NULL, NULL, NULL),
(214, 112, 50, NULL, NULL, NULL),
(215, 112, 24, NULL, NULL, NULL),
(216, 112, 55, NULL, NULL, NULL),
(217, 107, 9, NULL, NULL, NULL),
(218, 107, 11, NULL, NULL, NULL),
(219, 107, 12, NULL, NULL, NULL),
(220, 166, 35, NULL, NULL, NULL),
(221, 213, 9, NULL, NULL, NULL),
(222, 213, 11, NULL, NULL, NULL),
(223, 213, 12, NULL, NULL, NULL),
(224, 175, 53, NULL, NULL, NULL),
(228, 288, 30, NULL, NULL, NULL),
(229, 197, 53, NULL, NULL, NULL),
(230, 204, 27, NULL, NULL, NULL),
(231, 200, 18, NULL, NULL, NULL),
(232, 200, 52, NULL, NULL, NULL),
(233, 198, 30, NULL, NULL, NULL),
(234, 55, 53, NULL, NULL, NULL),
(235, 58, 54, NULL, NULL, NULL),
(236, 59, 27, NULL, NULL, NULL),
(237, 31, 53, NULL, NULL, NULL),
(238, 181, 35, NULL, NULL, NULL),
(239, 182, 30, NULL, NULL, NULL),
(240, 180, 53, NULL, NULL, NULL),
(241, 183, 52, NULL, NULL, NULL),
(242, 183, 50, NULL, NULL, NULL),
(243, 183, 49, NULL, NULL, NULL),
(244, 289, 30, NULL, NULL, NULL),
(245, 122, 53, NULL, NULL, NULL),
(248, 35, 27, NULL, NULL, NULL),
(249, 33, 54, NULL, NULL, NULL),
(250, 222, 53, NULL, NULL, NULL),
(251, 224, 50, NULL, NULL, NULL),
(252, 224, 52, NULL, NULL, NULL),
(253, 224, 55, NULL, NULL, NULL),
(254, 84, 53, NULL, NULL, NULL),
(255, 86, 50, NULL, NULL, NULL),
(256, 86, 52, NULL, NULL, NULL),
(257, 165, 12, NULL, NULL, NULL),
(258, 165, 9, NULL, NULL, NULL),
(259, 165, 11, NULL, NULL, NULL),
(260, 290, 35, NULL, NULL, NULL),
(261, 36, 53, NULL, NULL, NULL),
(262, 37, 30, NULL, NULL, NULL),
(263, 42, 27, NULL, NULL, NULL),
(264, 41, 54, NULL, NULL, NULL),
(265, 92, 53, NULL, NULL, NULL),
(266, 98, 27, NULL, NULL, NULL),
(267, 95, 54, NULL, NULL, NULL),
(268, 15, 11, NULL, NULL, NULL),
(269, 15, 9, NULL, NULL, NULL),
(270, 20, 27, NULL, NULL, NULL),
(271, 18, 50, NULL, NULL, NULL),
(272, 18, 52, NULL, NULL, NULL),
(273, 238, 11, NULL, NULL, NULL),
(274, 238, 9, NULL, NULL, NULL),
(275, 241, 52, NULL, NULL, NULL),
(276, 241, 50, NULL, NULL, NULL),
(277, 234, 9, NULL, NULL, NULL),
(279, 234, 11, NULL, NULL, NULL),
(280, 236, 52, NULL, NULL, NULL),
(281, 236, 50, NULL, NULL, NULL),
(282, 116, 30, NULL, NULL, NULL),
(283, 115, 53, NULL, NULL, NULL),
(284, 120, 52, NULL, NULL, NULL),
(285, 120, 50, NULL, NULL, NULL),
(286, 195, 50, NULL, NULL, NULL),
(287, 195, 52, NULL, NULL, NULL),
(288, 80, 30, NULL, NULL, NULL),
(289, 79, 53, NULL, NULL, NULL),
(290, 81, 54, NULL, NULL, NULL),
(291, 252, 49, NULL, NULL, NULL),
(292, 252, 50, NULL, NULL, NULL),
(293, 256, 27, NULL, NULL, NULL),
(294, 147, 30, NULL, NULL, NULL),
(297, 149, 27, NULL, NULL, NULL),
(298, 148, 54, NULL, NULL, NULL),
(299, 146, 53, NULL, NULL, NULL),
(300, 291, 35, NULL, NULL, NULL),
(301, 89, 52, NULL, NULL, NULL),
(302, 89, 50, NULL, NULL, NULL),
(303, 211, 54, NULL, NULL, NULL),
(304, 209, 54, NULL, NULL, NULL),
(305, 189, 30, NULL, NULL, NULL),
(306, 188, 12, NULL, NULL, NULL),
(307, 188, 11, NULL, NULL, NULL),
(308, 188, 9, NULL, NULL, NULL),
(309, 192, 52, NULL, NULL, NULL),
(310, 192, 50, NULL, NULL, NULL),
(311, 123, 54, NULL, NULL, NULL),
(312, 124, 54, NULL, NULL, NULL),
(314, 250, 54, NULL, NULL, NULL),
(315, 105, 54, NULL, NULL, NULL),
(316, 118, 54, NULL, NULL, NULL),
(317, 121, 54, NULL, NULL, NULL),
(318, 119, 54, NULL, NULL, NULL),
(319, 34, 54, NULL, NULL, NULL),
(320, 32, 54, NULL, NULL, NULL),
(321, 212, 64, NULL, NULL, NULL),
(322, 221, 27, NULL, NULL, NULL),
(323, 250, 5, NULL, NULL, NULL),
(324, 14, 64, NULL, NULL, NULL),
(325, 194, 27, NULL, NULL, NULL),
(326, 292, 27, NULL, NULL, NULL),
(327, 184, 27, NULL, NULL, NULL),
(328, 294, 30, NULL, NULL, NULL),
(329, 130, 54, NULL, NULL, NULL),
(330, 169, 52, NULL, NULL, NULL),
(331, 169, 50, NULL, NULL, NULL),
(332, 179, 27, NULL, NULL, NULL),
(333, 90, 27, NULL, NULL, NULL),
(334, 228, 27, NULL, NULL, NULL),
(335, 135, 27, NULL, NULL, NULL),
(336, 172, 27, NULL, NULL, NULL),
(337, 106, 64, NULL, NULL, NULL),
(338, 127, 27, NULL, NULL, NULL),
(339, 91, 27, NULL, NULL, NULL),
(342, 13, 27, NULL, NULL, NULL),
(343, 296, 54, NULL, NULL, NULL),
(344, 299, 54, NULL, NULL, NULL),
(345, 300, 54, NULL, NULL, NULL),
(348, 163, 50, NULL, NULL, NULL),
(349, 163, 52, NULL, NULL, NULL),
(350, 301, 30, NULL, NULL, NULL),
(351, 302, 53, NULL, NULL, NULL),
(353, 258, 65, NULL, NULL, NULL),
(354, 72, 54, NULL, NULL, NULL),
(363, 303, 27, NULL, NULL, NULL),
(364, 56, 54, NULL, NULL, NULL),
(366, 97, 54, NULL, NULL, NULL),
(367, 237, 54, NULL, NULL, NULL),
(368, 94, 54, NULL, NULL, NULL),
(369, 96, 54, NULL, NULL, NULL),
(370, 240, 54, NULL, NULL, NULL),
(371, 196, 54, NULL, NULL, NULL),
(372, 190, 54, NULL, NULL, NULL),
(373, 193, 54, NULL, NULL, NULL),
(374, 191, 54, NULL, NULL, NULL),
(375, 168, 54, NULL, NULL, NULL),
(376, 57, 54, NULL, NULL, NULL),
(378, 305, 27, NULL, NULL, NULL),
(379, 304, 54, NULL, NULL, NULL),
(380, 47, 27, NULL, NULL, NULL),
(381, 46, 54, NULL, NULL, NULL),
(382, 52, 27, NULL, NULL, NULL),
(383, 51, 54, NULL, NULL, NULL),
(384, 218, 54, NULL, NULL, NULL),
(385, 74, 53, NULL, NULL, NULL),
(386, 75, 30, NULL, NULL, NULL),
(398, 88, 54, NULL, NULL, NULL),
(399, 87, 54, NULL, NULL, NULL),
(400, 239, 54, NULL, NULL, NULL),
(401, 17, 54, NULL, NULL, NULL),
(402, 5, 54, NULL, NULL, NULL),
(403, 10, 27, NULL, NULL, NULL),
(404, 19, 27, NULL, NULL, NULL),
(405, 4, 54, NULL, NULL, NULL),
(406, 254, 54, NULL, NULL, NULL),
(407, 306, 27, NULL, NULL, NULL),
(408, 85, 54, NULL, NULL, NULL),
(411, 307, 66, NULL, NULL, NULL),
(412, 185, 53, NULL, NULL, NULL),
(413, 78, 27, NULL, NULL, NULL),
(414, 233, 27, NULL, NULL, NULL),
(415, 229, 53, NULL, NULL, NULL),
(416, 142, 53, NULL, NULL, NULL),
(417, 134, 54, NULL, NULL, NULL),
(421, 110, 50, NULL, NULL, NULL),
(422, 110, 52, NULL, NULL, NULL),
(423, 114, 27, NULL, NULL, NULL),
(427, 308, 67, NULL, NULL, NULL),
(428, 262, 68, NULL, NULL, NULL),
(430, 231, 54, NULL, NULL, NULL),
(432, 71, 54, NULL, NULL, NULL),
(433, 60, 27, NULL, NULL, NULL),
(435, 266, 69, NULL, NULL, NULL),
(436, 73, 54, NULL, NULL, NULL),
(437, 225, 54, NULL, NULL, NULL),
(438, 226, 54, NULL, NULL, NULL),
(439, 227, 54, NULL, NULL, NULL),
(443, 83, 54, NULL, NULL, NULL),
(444, 82, 54, NULL, NULL, NULL),
(445, 309, 70, NULL, NULL, NULL),
(446, 310, 71, NULL, NULL, NULL),
(447, 311, 72, NULL, NULL, NULL),
(448, 312, 73, NULL, NULL, NULL),
(449, 76, 50, NULL, NULL, NULL),
(450, 76, 52, NULL, NULL, NULL),
(451, 12, 27, NULL, NULL, NULL),
(452, 11, 54, NULL, NULL, NULL),
(453, 281, 65, NULL, NULL, NULL),
(454, 313, 50, NULL, NULL, NULL),
(455, 313, 49, NULL, NULL, NULL),
(456, 313, 14, NULL, NULL, NULL),
(458, 315, 74, NULL, NULL, NULL),
(461, 277, 65, NULL, NULL, NULL),
(462, 125, 54, NULL, NULL, NULL),
(463, 65, 27, NULL, NULL, NULL),
(465, 230, 54, NULL, NULL, NULL),
(466, 171, 55, NULL, NULL, NULL),
(467, 276, 65, NULL, NULL, NULL),
(468, 173, 53, NULL, NULL, NULL),
(469, 174, 54, NULL, NULL, NULL),
(470, 317, 30, NULL, NULL, NULL),
(471, 318, 27, NULL, NULL, NULL),
(472, 117, 54, NULL, NULL, NULL),
(473, 319, 54, NULL, NULL, NULL),
(474, 321, 54, NULL, NULL, NULL),
(475, 77, 54, NULL, NULL, NULL),
(476, 150, 64, NULL, NULL, NULL),
(477, 323, 64, NULL, NULL, NULL),
(478, 322, 64, NULL, NULL, NULL),
(479, 21, 53, NULL, NULL, NULL),
(480, 158, 53, NULL, NULL, NULL),
(481, 136, 53, NULL, NULL, NULL),
(482, 99, 53, NULL, NULL, NULL),
(483, 23, 54, NULL, NULL, NULL),
(484, 22, 54, NULL, NULL, NULL),
(485, 24, 54, NULL, NULL, NULL),
(486, 28, 54, NULL, NULL, NULL),
(487, 27, 54, NULL, NULL, NULL),
(488, 29, 54, NULL, NULL, NULL),
(489, 324, 54, NULL, NULL, NULL),
(491, 103, 54, NULL, NULL, NULL),
(492, 101, 54, NULL, NULL, NULL),
(493, 102, 54, NULL, NULL, NULL),
(494, 104, 54, NULL, NULL, NULL),
(495, 325, 54, NULL, NULL, NULL),
(496, 139, 54, NULL, NULL, NULL),
(497, 137, 54, NULL, NULL, NULL),
(498, 138, 54, NULL, NULL, NULL),
(499, 140, 54, NULL, NULL, NULL),
(500, 143, 54, NULL, NULL, NULL),
(501, 144, 54, NULL, NULL, NULL),
(502, 156, 54, NULL, NULL, NULL),
(503, 159, 54, NULL, NULL, NULL),
(504, 160, 54, NULL, NULL, NULL),
(505, 176, 54, NULL, NULL, NULL),
(506, 178, 54, NULL, NULL, NULL),
(507, 186, 54, NULL, NULL, NULL),
(508, 187, 54, NULL, NULL, NULL),
(509, 201, 54, NULL, NULL, NULL),
(510, 199, 54, NULL, NULL, NULL),
(511, 202, 54, NULL, NULL, NULL),
(512, 203, 54, NULL, NULL, NULL),
(513, 223, 54, NULL, NULL, NULL),
(514, 232, 54, NULL, NULL, NULL),
(515, 111, 54, NULL, NULL, NULL),
(516, 113, 54, NULL, NULL, NULL),
(517, 132, 54, NULL, NULL, NULL),
(518, 155, 54, NULL, NULL, NULL),
(519, 217, 54, NULL, NULL, NULL),
(520, 220, 54, NULL, NULL, NULL),
(521, 219, 54, NULL, NULL, NULL),
(522, 126, 54, NULL, NULL, NULL),
(523, 25, 27, NULL, NULL, NULL),
(524, 326, 27, NULL, NULL, NULL),
(525, 26, 27, NULL, NULL, NULL),
(526, 30, 27, NULL, NULL, NULL),
(527, 327, 27, NULL, NULL, NULL),
(528, 45, 27, NULL, NULL, NULL),
(529, 43, 27, NULL, NULL, NULL),
(530, 44, 27, NULL, NULL, NULL),
(531, 38, 27, NULL, NULL, NULL),
(532, 50, 27, NULL, NULL, NULL),
(533, 48, 27, NULL, NULL, NULL),
(534, 49, 27, NULL, NULL, NULL),
(535, 53, 27, NULL, NULL, NULL),
(536, 54, 27, NULL, NULL, NULL),
(537, 66, 27, NULL, NULL, NULL),
(538, 328, 27, NULL, NULL, NULL),
(539, 113, 15, NULL, NULL, NULL),
(540, 113, 50, NULL, NULL, NULL),
(541, 329, 54, NULL, NULL, NULL),
(542, 280, 65, NULL, NULL, NULL),
(543, 330, 65, NULL, NULL, NULL),
(544, 257, 53, NULL, NULL, NULL),
(547, 332, 54, NULL, NULL, NULL),
(548, 333, 35, NULL, NULL, NULL),
(549, 334, 54, NULL, NULL, NULL),
(550, 335, 54, NULL, NULL, NULL),
(551, 177, 54, NULL, NULL, NULL),
(552, 265, 65, NULL, NULL, NULL),
(553, 336, 27, NULL, NULL, NULL),
(554, 337, 54, NULL, NULL, NULL),
(555, 338, 65, NULL, NULL, NULL),
(556, 339, 75, NULL, NULL, NULL),
(557, 340, 65, NULL, NULL, NULL),
(558, 282, 65, NULL, NULL, NULL),
(561, 267, 78, NULL, NULL, NULL),
(562, 267, 79, NULL, NULL, NULL),
(563, 267, 80, NULL, NULL, NULL),
(564, 267, 81, NULL, NULL, NULL),
(565, 267, 82, NULL, NULL, NULL),
(566, 267, 94, NULL, NULL, NULL),
(567, 267, 83, NULL, NULL, NULL),
(568, 267, 84, NULL, NULL, NULL),
(569, 267, 85, NULL, NULL, NULL),
(570, 267, 86, NULL, NULL, NULL),
(571, 267, 77, NULL, NULL, NULL),
(572, 267, 87, NULL, NULL, NULL),
(573, 267, 88, NULL, NULL, NULL),
(574, 267, 89, NULL, NULL, NULL),
(575, 267, 90, NULL, NULL, NULL),
(576, 267, 91, NULL, NULL, NULL),
(577, 267, 92, NULL, NULL, NULL),
(578, 267, 93, NULL, NULL, NULL),
(579, 341, 53, NULL, NULL, NULL),
(580, 267, 95, NULL, NULL, NULL),
(581, 311, 57, NULL, NULL, NULL),
(582, 311, 78, NULL, NULL, NULL),
(583, 311, 80, NULL, NULL, NULL),
(584, 311, 89, NULL, NULL, NULL),
(585, 311, 94, NULL, NULL, NULL),
(586, 311, 82, NULL, NULL, NULL),
(587, 311, 81, NULL, NULL, NULL),
(588, 311, 92, NULL, NULL, NULL),
(589, 311, 93, NULL, NULL, NULL),
(590, 311, 91, NULL, NULL, NULL),
(591, 342, 54, NULL, NULL, NULL),
(592, 343, 65, NULL, NULL, NULL),
(593, 61, 27, NULL, NULL, NULL),
(594, 345, 54, NULL, NULL, NULL),
(595, 346, 53, NULL, NULL, NULL),
(596, 347, 30, NULL, NULL, NULL),
(598, 348, 96, NULL, NULL, NULL),
(599, 247, 97, NULL, NULL, NULL),
(600, 349, 53, NULL, NULL, NULL),
(601, 350, 54, NULL, NULL, NULL),
(602, 351, 54, NULL, NULL, NULL),
(603, 352, 35, NULL, NULL, NULL),
(604, 353, 98, NULL, NULL, NULL),
(605, 261, 79, NULL, NULL, NULL),
(606, 266, 79, NULL, NULL, NULL),
(607, 266, 93, NULL, NULL, NULL),
(608, 261, 93, NULL, NULL, NULL),
(609, 261, 78, NULL, NULL, NULL),
(610, 261, 89, NULL, NULL, NULL),
(611, 261, 82, NULL, NULL, NULL),
(612, 261, 94, NULL, NULL, NULL),
(613, 261, 81, NULL, NULL, NULL),
(614, 261, 80, NULL, NULL, NULL),
(615, 266, 78, NULL, NULL, NULL),
(616, 266, 89, NULL, NULL, NULL),
(617, 266, 82, NULL, NULL, NULL),
(618, 266, 94, NULL, NULL, NULL),
(619, 266, 80, NULL, NULL, NULL),
(621, 266, 81, NULL, NULL, NULL),
(622, 266, 99, NULL, NULL, NULL),
(623, 266, 100, NULL, NULL, NULL),
(624, 354, 35, NULL, NULL, NULL),
(625, 355, 101, NULL, NULL, NULL),
(626, 356, 102, NULL, NULL, NULL),
(627, 357, 102, NULL, NULL, NULL),
(628, 358, 102, NULL, NULL, NULL),
(629, 359, 102, NULL, NULL, NULL),
(630, 360, 102, NULL, NULL, NULL),
(631, 361, 102, NULL, NULL, NULL),
(632, 362, 102, NULL, NULL, NULL),
(633, 363, 102, NULL, NULL, NULL),
(634, 364, 102, NULL, NULL, NULL),
(635, 365, 102, NULL, NULL, NULL),
(636, 366, 102, NULL, NULL, NULL),
(637, 367, 102, NULL, NULL, NULL),
(638, 368, 102, NULL, NULL, NULL),
(639, 369, 102, NULL, NULL, NULL),
(640, 370, 54, NULL, NULL, NULL),
(641, 371, 30, NULL, NULL, NULL),
(642, 372, 30, NULL, NULL, NULL),
(643, 373, 30, NULL, NULL, NULL),
(644, 374, 30, NULL, NULL, NULL),
(645, 375, 30, NULL, NULL, NULL),
(646, 376, 30, NULL, NULL, NULL),
(647, 377, 30, NULL, NULL, NULL),
(649, 379, 30, NULL, NULL, NULL),
(650, 378, 30, NULL, NULL, NULL),
(651, 380, 54, NULL, NULL, NULL),
(652, 382, 54, NULL, NULL, NULL),
(653, 381, 54, NULL, NULL, NULL),
(654, 383, 65, NULL, NULL, NULL),
(655, 384, 103, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `unit_ranks`
--

CREATE TABLE `unit_ranks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_ranks`
--

INSERT INTO `unit_ranks` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Supreme Court', NULL, NULL, NULL),
(2, 'Court of Appeal', NULL, NULL, NULL),
(3, 'High Court', NULL, NULL, NULL),
(4, 'Employment and Labour Relations Court', NULL, NULL, NULL),
(5, 'Environment and Land Court', NULL, NULL, NULL),
(6, 'Magistrate Court', NULL, NULL, NULL),
(7, 'Kadhi Court', NULL, NULL, NULL),
(8, 'Tribunal', NULL, NULL, NULL),
(9, 'Committee', NULL, NULL, NULL),
(10, 'Library', NULL, NULL, NULL),
(11, 'Directorate', NULL, NULL, NULL),
(12, 'Other Office', NULL, NULL, NULL),
(13, 'Small Claim', NULL, NULL, NULL);

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
  `pj_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_verified_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `phone_number`, `verification_code`, `pj_number`, `phone_verified_at`, `email`, `email_verified_at`, `role`, `password`, `is_active`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Patrick', 'Ngobiro', '0718952129', NULL, '59431', NULL, 'pngobiro@gmail.com', NULL, NULL, '$2y$10$iwbCOzvMlOI6uGce25GXF.zgTS3eor59Gx7FhMqXZDiOPuObb37cG', 1, NULL, NULL, '2022-04-06 03:52:49', '2022-04-06 03:52:49'),
(2, 'Kristin', 'Lebsack', '651.647.5199', NULL, 'n3ur7', NULL, 'bkrajcik@example.com', '2022-04-13 04:46:41', NULL, 'a0rz0chsUh@gmail.com', 1, NULL, 'Jl7pGyaimX', '2022-04-13 04:46:41', '2022-04-13 04:46:41'),
(3, 'Leola', 'Luettgen', '+1.351.520.2987', NULL, 'CGJ5r', NULL, 'ikihn@example.com', '2022-04-13 04:46:41', NULL, 'pH1P32lLNa@gmail.com', 1, NULL, 'TwhrNAngMA', '2022-04-13 04:46:42', '2022-04-13 04:46:42'),
(4, 'Tamara', 'Lang', '279-662-3501', NULL, 'Juuv8', NULL, 'hulda.waters@example.net', '2022-04-13 04:46:41', NULL, 'flPYVkwDwL@gmail.com', 1, NULL, 'U4bLDpyod3', '2022-04-13 04:46:42', '2022-04-13 04:46:42'),
(5, 'Terrill', 'Sanford', '(941) 325-1274', NULL, 'fCG2W', NULL, 'annabell.daniel@example.net', '2022-04-13 04:46:41', NULL, '0txtTYK1P4@gmail.com', 1, NULL, 'WPRFavGDt9', '2022-04-13 04:46:42', '2022-04-13 04:46:42'),
(6, 'Rosario', 'Douglas', '+1-757-867-3912', NULL, 'JUnzI', NULL, 'geraldine.gulgowski@example.net', '2022-04-13 04:46:41', NULL, 'nYuidmPAmT@gmail.com', 1, NULL, 'KynBRdqKkG', '2022-04-13 04:46:42', '2022-04-13 04:46:42'),
(7, 'Melvin', 'Abbott', '872.663.9346', NULL, 'dhRj0', NULL, 'guillermo.jacobs@example.net', '2022-04-13 04:46:41', NULL, 'yKMliM9dRs@gmail.com', 1, NULL, 'UGvIVGmCvl', '2022-04-13 04:46:42', '2022-04-13 04:46:42'),
(8, 'Hortense', 'Hayes', '1-531-882-6211', NULL, 'EHCUc', NULL, 'chanelle.bosco@example.com', '2022-04-13 04:46:41', NULL, 'ESwax5Wep1@gmail.com', 1, NULL, 'bg8PFnKity', '2022-04-13 04:46:42', '2022-04-13 04:46:42'),
(9, 'Gail', 'Carter', '959-446-7994', NULL, 'HiSyr', NULL, 'cornell.kemmer@example.org', '2022-04-13 04:46:41', NULL, '3XwChKRh51@gmail.com', 1, NULL, 'f3gXa9CeTe', '2022-04-13 04:46:42', '2022-04-13 04:46:42'),
(10, 'Bertha', 'Kuphal', '+1 (629) 425-5376', NULL, 'khVJR', NULL, 'hilpert.berry@example.com', '2022-04-13 04:46:41', NULL, 'MkuNkiJlIr@gmail.com', 1, NULL, 'UomK5eJg29', '2022-04-13 04:46:42', '2022-04-13 04:46:42'),
(11, 'Magnolia', 'Wunsch', '570.514.6656', NULL, 'RnIUL', NULL, 'nboyle@example.org', '2022-04-13 04:46:41', NULL, 'flGqI3mFmq@gmail.com', 1, NULL, 'iJJsgWwsPd', '2022-04-13 04:46:42', '2022-04-13 04:46:42'),
(12, 'Ollie', 'Boyle', '626-881-7319', NULL, '4fsQs', NULL, 'dwitting@example.net', '2022-04-13 04:46:41', NULL, 'kI9vDm4Liy@gmail.com', 1, NULL, 'nAJnNlo8uy', '2022-04-13 04:46:42', '2022-04-13 04:46:42'),
(13, 'Anabel', 'D\'Amore', '463-963-4606', NULL, 'lzJW2', NULL, 'qdonnelly@example.net', '2022-04-13 04:46:41', NULL, 'oCDCozs6FG@gmail.com', 1, NULL, 'qxVRVgjLTh', '2022-04-13 04:46:42', '2022-04-13 04:46:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `counties`
--
ALTER TABLE `counties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `counties_name_unique` (`name`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `rank_categories`
--
ALTER TABLE `rank_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rank_categories_name_unique` (`name`),
  ADD KEY `rank_categories_unit_rank_id_foreign` (`unit_rank_id`);

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
  ADD PRIMARY KEY (`role_id`,`user_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

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
-- Indexes for table `template_indicator_groups2`
--
ALTER TABLE `template_indicator_groups2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `units_unique_id_unique` (`unique_id`),
  ADD UNIQUE KEY `units_unique_code_unique` (`unique_code`),
  ADD KEY `units_unit_rank_id_foreign` (`unit_rank_id`);

--
-- Indexes for table `unit_division`
--
ALTER TABLE `unit_division`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `users_pj_number_unique` (`pj_number`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_verification_code_unique` (`verification_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `counties`
--
ALTER TABLE `counties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `indicator_groups`
--
ALTER TABLE `indicator_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT for table `rank_categories`
--
ALTER TABLE `rank_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `template_indicators`
--
ALTER TABLE `template_indicators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `template_indicator_groups`
--
ALTER TABLE `template_indicator_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `template_indicator_groups2`
--
ALTER TABLE `template_indicator_groups2`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=385;

--
-- AUTO_INCREMENT for table `unit_division`
--
ALTER TABLE `unit_division`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=656;

--
-- AUTO_INCREMENT for table `unit_ranks`
--
ALTER TABLE `unit_ranks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rank_categories`
--
ALTER TABLE `rank_categories`
  ADD CONSTRAINT `rank_categories_unit_rank_id_foreign` FOREIGN KEY (`unit_rank_id`) REFERENCES `unit_ranks` (`id`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `units`
--
ALTER TABLE `units`
  ADD CONSTRAINT `units_unit_rank_id_foreign` FOREIGN KEY (`unit_rank_id`) REFERENCES `unit_ranks` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

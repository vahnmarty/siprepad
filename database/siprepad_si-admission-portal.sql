-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 24, 2022 at 03:18 PM
-- Server version: 8.0.31-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siprepad_si-admission-portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_information`
--

CREATE TABLE `address_information` (
  `id` bigint UNSIGNED NOT NULL,
  `Profile_ID` bigint UNSIGNED NOT NULL,
  `Application_ID` bigint UNSIGNED DEFAULT NULL,
  `Address_Type_1` text,
  `Country_1` text,
  `Address_1` text,
  `City_1` text,
  `State_1` text,
  `Zipcode_1` text,
  `Address_Phone_1` text,
  `Address_Type_2` text,
  `Country_2` text,
  `Address_2` text,
  `City_2` text,
  `State_2` text,
  `Zipcode_2` text,
  `Address_Phone_2` text,
  `Address_Type_3` text,
  `Country_3` text,
  `Address_3` text,
  `City_3` text,
  `State_3` text,
  `Zipcode_3` text,
  `Address_Phone_3` text,
  `Address_Type_4` text,
  `Country_4` text,
  `Address_4` text,
  `City_4` text,
  `State_4` text,
  `Zipcode_4` text,
  `Address_Phone_4` text,
  `Address_Info_Date` text,
  `is_step_complete` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `address_information`
--

INSERT INTO `address_information` (`id`, `Profile_ID`, `Application_ID`, `Address_Type_1`, `Country_1`, `Address_1`, `City_1`, `State_1`, `Zipcode_1`, `Address_Phone_1`, `Address_Type_2`, `Country_2`, `Address_2`, `City_2`, `State_2`, `Zipcode_2`, `Address_Phone_2`, `Address_Type_3`, `Country_3`, `Address_3`, `City_3`, `State_3`, `Zipcode_3`, `Address_Phone_3`, `Address_Type_4`, `Country_4`, `Address_4`, `City_4`, `State_4`, `Zipcode_4`, `Address_Phone_4`, `Address_Info_Date`, `is_step_complete`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Primary Address', 'United States of America', 'fghfgh', 'fghfgh', 'Arizona', '45345', '5326845786', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-11-24 01:15:10', '2022-11-24 01:15:10');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `Application_ID` bigint UNSIGNED NOT NULL,
  `Profile_ID` bigint UNSIGNED NOT NULL,
  `status` tinyint NOT NULL COMMENT '0:Pending,1:Compleate',
  `last_step_complete` enum('one','two','three','four','five','six','seven','eight','nine','ten') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`Application_ID`, `Profile_ID`, `status`, `last_step_complete`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'ten', '2022-11-24 01:13:41', '2022-11-24 01:23:02');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint UNSIGNED NOT NULL,
  `state_id` int NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '0:Inactive,1:Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `text_content` longtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `title`, `slug`, `text_content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Content Displayed on Home Page', 'content-displayed-on-home-page', NULL, '2022-08-19 02:37:56', '2022-08-19 02:37:56', NULL),
(2, 'Privacy Policy', 'privacy-policy', NULL, '2022-08-19 02:37:56', '2022-08-19 02:37:56', NULL),
(3, 'Terms & Conditions', 'terms-conditions', NULL, '2022-08-19 02:37:56', '2022-08-19 02:37:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phonecode` int NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '0:Inactive,1:Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`, `phonecode`, `status`, `created_at`, `updated_at`) VALUES
(1, 'USA', 'United States of America', 1, 1, NULL, NULL),
(2, 'CA', 'Canada', 1, 1, NULL, NULL),
(3, 'AF', 'Afghanistan', 93, 1, NULL, NULL),
(4, 'AL', 'Albania', 355, 1, NULL, NULL),
(5, 'DZ', 'Algeria', 213, 1, NULL, NULL),
(6, 'AS', 'American Samoa', 1684, 1, NULL, NULL),
(7, 'AD', 'Andorra', 376, 1, NULL, NULL),
(8, 'AO', 'Angola', 244, 1, NULL, NULL),
(9, 'AI', 'Anguilla', 1264, 1, NULL, NULL),
(10, 'AQ', 'Antarctica', 0, 1, NULL, NULL),
(11, 'AG', 'Antigua And Barbuda', 1268, 1, NULL, NULL),
(12, 'AR', 'Argentina', 54, 1, NULL, NULL),
(13, 'AM', 'Armenia', 374, 1, NULL, NULL),
(14, 'AW', 'Aruba', 297, 1, NULL, NULL),
(15, 'AU', 'Australia', 61, 1, NULL, NULL),
(16, 'AT', 'Austria', 43, 1, NULL, NULL),
(17, 'AZ', 'Azerbaijan', 994, 1, NULL, NULL),
(18, 'BS', 'Bahamas The', 1242, 1, NULL, NULL),
(19, 'BH', 'Bahrain', 973, 1, NULL, NULL),
(20, 'BD', 'Bangladesh', 880, 1, NULL, NULL),
(21, 'BB', 'Barbados', 1246, 1, NULL, NULL),
(22, 'BY', 'Belarus', 375, 1, NULL, NULL),
(23, 'BE', 'Belgium', 32, 1, NULL, NULL),
(24, 'BZ', 'Belize', 501, 1, NULL, NULL),
(25, 'BJ', 'Benin', 229, 1, NULL, NULL),
(26, 'BM', 'Bermuda', 1441, 1, NULL, NULL),
(27, 'BT', 'Bhutan', 975, 1, NULL, NULL),
(28, 'BO', 'Bolivia', 591, 1, NULL, NULL),
(29, 'BA', 'Bosnia and Herzegovina', 387, 1, NULL, NULL),
(30, 'BW', 'Botswana', 267, 1, NULL, NULL),
(31, 'BV', 'Bouvet Island', 0, 1, NULL, NULL),
(32, 'BR', 'Brazil', 55, 1, NULL, NULL),
(33, 'IO', 'British Indian Ocean Territory', 246, 1, NULL, NULL),
(34, 'BN', 'Brunei', 673, 1, NULL, NULL),
(35, 'BG', 'Bulgaria', 359, 1, NULL, NULL),
(36, 'BF', 'Burkina Faso', 226, 1, NULL, NULL),
(37, 'BI', 'Burundi', 257, 1, NULL, NULL),
(38, 'KH', 'Cambodia', 855, 1, NULL, NULL),
(39, 'CM', 'Cameroon', 237, 1, NULL, NULL),
(40, 'CV', 'Cape Verde', 238, 1, NULL, NULL),
(41, 'KY', 'Cayman Islands', 1345, 1, NULL, NULL),
(42, 'CF', 'Central African Republic', 236, 1, NULL, NULL),
(43, 'TD', 'Chad', 235, 1, NULL, NULL),
(44, 'CL', 'Chile', 56, 1, NULL, NULL),
(45, 'CN', 'China', 86, 1, NULL, NULL),
(46, 'CX', 'Christmas Island', 61, 1, NULL, NULL),
(47, 'CC', 'Cocos (Keeling) Islands', 672, 1, NULL, NULL),
(48, 'CO', 'Colombia', 57, 1, NULL, NULL),
(49, 'KM', 'Comoros', 269, 1, NULL, NULL),
(50, 'CG', 'Congo', 242, 1, NULL, NULL),
(51, 'CD', 'Congo The Democratic Republic Of The', 242, 1, NULL, NULL),
(52, 'CK', 'Cook Islands', 682, 1, NULL, NULL),
(53, 'CR', 'Costa Rica', 506, 1, NULL, NULL),
(54, 'CI', 'Cote D Ivoire (Ivory Coast)', 225, 1, NULL, NULL),
(55, 'HR', 'Croatia (Hrvatska)', 385, 1, NULL, NULL),
(56, 'CU', 'Cuba', 53, 1, NULL, NULL),
(57, 'CY', 'Cyprus', 357, 1, NULL, NULL),
(58, 'CZ', 'Czech Republic', 420, 1, NULL, NULL),
(59, 'DK', 'Denmark', 45, 1, NULL, NULL),
(60, 'DJ', 'Djibouti', 253, 1, NULL, NULL),
(61, 'DM', 'Dominica', 1767, 1, NULL, NULL),
(62, 'DO', 'Dominican Republic', 1809, 1, NULL, NULL),
(63, 'TP', 'East Timor', 670, 1, NULL, NULL),
(64, 'EC', 'Ecuador', 593, 1, NULL, NULL),
(65, 'EG', 'Egypt', 20, 1, NULL, NULL),
(66, 'SV', 'El Salvador', 503, 1, NULL, NULL),
(67, 'GQ', 'Equatorial Guinea', 240, 1, NULL, NULL),
(68, 'ER', 'Eritrea', 291, 1, NULL, NULL),
(69, 'EE', 'Estonia', 372, 1, NULL, NULL),
(70, 'ET', 'Ethiopia', 251, 1, NULL, NULL),
(71, 'XA', 'External Territories of Australia', 61, 1, NULL, NULL),
(72, 'FK', 'Falkland Islands', 500, 1, NULL, NULL),
(73, 'FO', 'Faroe Islands', 298, 1, NULL, NULL),
(74, 'FJ', 'Fiji Islands', 679, 1, NULL, NULL),
(75, 'FI', 'Finland', 358, 1, NULL, NULL),
(76, 'FR', 'France', 33, 1, NULL, NULL),
(77, 'GF', 'French Guiana', 594, 1, NULL, NULL),
(78, 'PF', 'French Polynesia', 689, 1, NULL, NULL),
(79, 'TF', 'French Southern Territories', 0, 1, NULL, NULL),
(80, 'GA', 'Gabon', 241, 1, NULL, NULL),
(81, 'GM', 'Gambia The', 220, 1, NULL, NULL),
(82, 'GE', 'Georgia', 995, 1, NULL, NULL),
(83, 'DE', 'Germany', 49, 1, NULL, NULL),
(84, 'GH', 'Ghana', 233, 1, NULL, NULL),
(85, 'GI', 'Gibraltar', 350, 1, NULL, NULL),
(86, 'GR', 'Greece', 30, 1, NULL, NULL),
(87, 'GL', 'Greenland', 299, 1, NULL, NULL),
(88, 'GD', 'Grenada', 1473, 1, NULL, NULL),
(89, 'GP', 'Guadeloupe', 590, 1, NULL, NULL),
(90, 'GU', 'Guam', 1671, 1, NULL, NULL),
(91, 'GT', 'Guatemala', 502, 1, NULL, NULL),
(92, 'XU', 'Guernsey and Alderney', 44, 1, NULL, NULL),
(93, 'GN', 'Guinea', 224, 1, NULL, NULL),
(94, 'GW', 'Guinea-Bissau', 245, 1, NULL, NULL),
(95, 'GY', 'Guyana', 592, 1, NULL, NULL),
(96, 'HT', 'Haiti', 509, 1, NULL, NULL),
(97, 'HM', 'Heard and McDonald Islands', 0, 1, NULL, NULL),
(98, 'HN', 'Honduras', 504, 1, NULL, NULL),
(99, 'HK', 'Hong Kong S.A.R.', 852, 1, NULL, NULL),
(100, 'HU', 'Hungary', 36, 1, NULL, NULL),
(101, 'IS', 'Iceland', 354, 1, NULL, NULL),
(102, 'IN', 'India', 91, 1, NULL, NULL),
(103, 'ID', 'Indonesia', 62, 1, NULL, NULL),
(104, 'IR', 'Iran', 98, 1, NULL, NULL),
(105, 'IQ', 'Iraq', 964, 1, NULL, NULL),
(106, 'IE', 'Ireland', 353, 1, NULL, NULL),
(107, 'IL', 'Israel', 972, 1, NULL, NULL),
(108, 'IT', 'Italy', 39, 1, NULL, NULL),
(109, 'JM', 'Jamaica', 1876, 1, NULL, NULL),
(110, 'JP', 'Japan', 81, 1, NULL, NULL),
(111, 'XJ', 'Jersey', 44, 1, NULL, NULL),
(112, 'JO', 'Jordan', 962, 1, NULL, NULL),
(113, 'KZ', 'Kazakhstan', 7, 1, NULL, NULL),
(114, 'KE', 'Kenya', 254, 1, NULL, NULL),
(115, 'KI', 'Kiribati', 686, 1, NULL, NULL),
(116, 'KP', 'Korea North', 850, 1, NULL, NULL),
(117, 'KR', 'Korea South', 82, 1, NULL, NULL),
(118, 'KW', 'Kuwait', 965, 1, NULL, NULL),
(119, 'KG', 'Kyrgyzstan', 996, 1, NULL, NULL),
(120, 'LA', 'Laos', 856, 1, NULL, NULL),
(121, 'LV', 'Latvia', 371, 1, NULL, NULL),
(122, 'LB', 'Lebanon', 961, 1, NULL, NULL),
(123, 'LS', 'Lesotho', 266, 1, NULL, NULL),
(124, 'LR', 'Liberia', 231, 1, NULL, NULL),
(125, 'LY', 'Libya', 218, 1, NULL, NULL),
(126, 'LI', 'Liechtenstein', 423, 1, NULL, NULL),
(127, 'LT', 'Lithuania', 370, 1, NULL, NULL),
(128, 'LU', 'Luxembourg', 352, 1, NULL, NULL),
(129, 'MO', 'Macau S.A.R.', 853, 1, NULL, NULL),
(130, 'MK', 'Macedonia', 389, 1, NULL, NULL),
(131, 'MG', 'Madagascar', 261, 1, NULL, NULL),
(132, 'MW', 'Malawi', 265, 1, NULL, NULL),
(133, 'MY', 'Malaysia', 60, 1, NULL, NULL),
(134, 'MV', 'Maldives', 960, 1, NULL, NULL),
(135, 'ML', 'Mali', 223, 1, NULL, NULL),
(136, 'MT', 'Malta', 356, 1, NULL, NULL),
(137, 'XM', 'Man (Isle of)', 44, 1, NULL, NULL),
(138, 'MH', 'Marshall Islands', 692, 1, NULL, NULL),
(139, 'MQ', 'Martinique', 596, 1, NULL, NULL),
(140, 'MR', 'Mauritania', 222, 1, NULL, NULL),
(141, 'MU', 'Mauritius', 230, 1, NULL, NULL),
(142, 'YT', 'Mayotte', 269, 1, NULL, NULL),
(143, 'MX', 'Mexico', 52, 1, NULL, NULL),
(144, 'FM', 'Micronesia', 691, 1, NULL, NULL),
(145, 'MD', 'Moldova', 373, 1, NULL, NULL),
(146, 'MC', 'Monaco', 377, 1, NULL, NULL),
(147, 'MN', 'Mongolia', 976, 1, NULL, NULL),
(148, 'MS', 'Montserrat', 1664, 1, NULL, NULL),
(149, 'MA', 'Morocco', 212, 1, NULL, NULL),
(150, 'MZ', 'Mozambique', 258, 1, NULL, NULL),
(151, 'MM', 'Myanmar', 95, 1, NULL, NULL),
(152, 'NA', 'Namibia', 264, 1, NULL, NULL),
(153, 'NR', 'Nauru', 674, 1, NULL, NULL),
(154, 'NP', 'Nepal', 977, 1, NULL, NULL),
(155, 'AN', 'Netherlands Antilles', 599, 1, NULL, NULL),
(156, 'NL', 'Netherlands The', 31, 1, NULL, NULL),
(157, 'NC', 'New Caledonia', 687, 1, NULL, NULL),
(158, 'NZ', 'New Zealand', 64, 1, NULL, NULL),
(159, 'NI', 'Nicaragua', 505, 1, NULL, NULL),
(160, 'NE', 'Niger', 227, 1, NULL, NULL),
(161, 'NG', 'Nigeria', 234, 1, NULL, NULL),
(162, 'NU', 'Niue', 683, 1, NULL, NULL),
(163, 'NF', 'Norfolk Island', 672, 1, NULL, NULL),
(164, 'MP', 'Northern Mariana Islands', 1670, 1, NULL, NULL),
(165, 'NO', 'Norway', 47, 1, NULL, NULL),
(166, 'OM', 'Oman', 968, 1, NULL, NULL),
(167, 'PK', 'Pakistan', 92, 1, NULL, NULL),
(168, 'PW', 'Palau', 680, 1, NULL, NULL),
(169, 'PS', 'Palestinian Territory Occupied', 970, 1, NULL, NULL),
(170, 'PA', 'Panama', 507, 1, NULL, NULL),
(171, 'PG', 'Papua new Guinea', 675, 1, NULL, NULL),
(172, 'PY', 'Paraguay', 595, 1, NULL, NULL),
(173, 'PE', 'Peru', 51, 1, NULL, NULL),
(174, 'PH', 'Philippines', 63, 1, NULL, NULL),
(175, 'PN', 'Pitcairn Island', 0, 1, NULL, NULL),
(176, 'PL', 'Poland', 48, 1, NULL, NULL),
(177, 'PT', 'Portugal', 351, 1, NULL, NULL),
(178, 'PR', 'Puerto Rico', 1787, 1, NULL, NULL),
(179, 'QA', 'Qatar', 974, 1, NULL, NULL),
(180, 'RE', 'Reunion', 262, 1, NULL, NULL),
(181, 'RO', 'Romania', 40, 1, NULL, NULL),
(182, 'RU', 'Russia', 70, 1, NULL, NULL),
(183, 'RW', 'Rwanda', 250, 1, NULL, NULL),
(184, 'SH', 'Saint Helena', 290, 1, NULL, NULL),
(185, 'KN', 'Saint Kitts And Nevis', 1869, 1, NULL, NULL),
(186, 'LC', 'Saint Lucia', 1758, 1, NULL, NULL),
(187, 'PM', 'Saint Pierre and Miquelon', 508, 1, NULL, NULL),
(188, 'VC', 'Saint Vincent And The Grenadines', 1784, 1, NULL, NULL),
(189, 'WS', 'Samoa', 684, 1, NULL, NULL),
(190, 'SM', 'San Marino', 378, 1, NULL, NULL),
(191, 'ST', 'Sao Tome and Principe', 239, 1, NULL, NULL),
(192, 'SA', 'Saudi Arabia', 966, 1, NULL, NULL),
(193, 'SN', 'Senegal', 221, 1, NULL, NULL),
(194, 'RS', 'Serbia', 381, 1, NULL, NULL),
(195, 'SC', 'Seychelles', 248, 1, NULL, NULL),
(196, 'SL', 'Sierra Leone', 232, 1, NULL, NULL),
(197, 'SG', 'Singapore', 65, 1, NULL, NULL),
(198, 'SK', 'Slovakia', 421, 1, NULL, NULL),
(199, 'SI', 'Slovenia', 386, 1, NULL, NULL),
(200, 'XG', 'Smaller Territories of the UK', 44, 1, NULL, NULL),
(201, 'SB', 'Solomon Islands', 677, 1, NULL, NULL),
(202, 'SO', 'Somalia', 252, 1, NULL, NULL),
(203, 'ZA', 'South Africa', 27, 1, NULL, NULL),
(204, 'GS', 'South Georgia', 0, 1, NULL, NULL),
(205, 'SS', 'South Sudan', 211, 1, NULL, NULL),
(206, 'ES', 'Spain', 34, 1, NULL, NULL),
(207, 'LK', 'Sri Lanka', 94, 1, NULL, NULL),
(208, 'SD', 'Sudan', 249, 1, NULL, NULL),
(209, 'SR', 'Suriname', 597, 1, NULL, NULL),
(210, 'SJ', 'Svalbard And Jan Mayen Islands', 47, 1, NULL, NULL),
(211, 'SZ', 'Swaziland', 268, 1, NULL, NULL),
(212, 'SE', 'Sweden', 46, 1, NULL, NULL),
(213, 'CH', 'Switzerland', 41, 1, NULL, NULL),
(214, 'SY', 'Syria', 963, 1, NULL, NULL),
(215, 'TW', 'Taiwan', 886, 1, NULL, NULL),
(216, 'TJ', 'Tajikistan', 992, 1, NULL, NULL),
(217, 'TZ', 'Tanzania', 255, 1, NULL, NULL),
(218, 'TH', 'Thailand', 66, 1, NULL, NULL),
(219, 'TG', 'Togo', 228, 1, NULL, NULL),
(220, 'TK', 'Tokelau', 690, 1, NULL, NULL),
(221, 'TO', 'Tonga', 676, 1, NULL, NULL),
(222, 'TT', 'Trinidad And Tobago', 1868, 1, NULL, NULL),
(223, 'TN', 'Tunisia', 216, 1, NULL, NULL),
(224, 'TR', 'Turkey', 90, 1, NULL, NULL),
(225, 'TM', 'Turkmenistan', 7370, 1, NULL, NULL),
(226, 'TC', 'Turks And Caicos Islands', 1649, 1, NULL, NULL),
(227, 'TV', 'Tuvalu', 688, 1, NULL, NULL),
(228, 'UG', 'Uganda', 256, 1, NULL, NULL),
(229, 'UA', 'Ukraine', 380, 1, NULL, NULL),
(230, 'AE', 'United Arab Emirates', 971, 1, NULL, NULL),
(231, 'GB', 'United Kingdom', 44, 1, NULL, NULL),
(232, 'UY', 'Uruguay', 598, 1, NULL, NULL),
(233, 'UZ', 'Uzbekistan', 998, 1, NULL, NULL),
(234, 'VU', 'Vanuatu', 678, 1, NULL, NULL),
(235, 'VA', 'Vatican City State (Holy See)', 39, 1, NULL, NULL),
(236, 'VE', 'Venezuela', 58, 1, NULL, NULL),
(237, 'VN', 'Vietnam', 84, 1, NULL, NULL),
(238, 'VG', 'Virgin Islands (British)', 1284, 1, NULL, NULL),
(239, 'VI', 'Virgin Islands (US)', 1340, 1, NULL, NULL),
(240, 'WF', 'Wallis And Futuna Islands', 681, 1, NULL, NULL),
(241, 'EH', 'Western Sahara', 212, 1, NULL, NULL),
(242, 'YE', 'Yemen', 967, 1, NULL, NULL),
(243, 'YU', 'Yugoslavia', 38, 1, NULL, NULL),
(244, 'ZM', 'Zambia', 260, 1, NULL, NULL),
(245, 'ZW', 'Zimbabwe', 263, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint UNSIGNED NOT NULL,
  `grade_name` varchar(255) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '0:Inactive,1:Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `grade_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Pre-Kindergarten', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(2, 'kindergarten', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(3, '1', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(4, '2', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(5, '3', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(6, '4', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(7, '5', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(8, '6', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(9, '7', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(10, '8', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(11, 'Freshman', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(12, 'Sophomore', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(13, 'Junior', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(14, 'Senior', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(15, 'College', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(16, 'Post HS/College', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56');

-- --------------------------------------------------------

--
-- Table structure for table `identify_raciallies`
--

CREATE TABLE `identify_raciallies` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '0:Inactive,1:Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `identify_raciallies`
--

INSERT INTO `identify_raciallies` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Asian', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(2, 'Black/African American', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(3, 'Latino/Latina/Latinx', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(4, 'Native American/Indigenous', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(5, 'Polynesian or Pacific Islander', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(6, 'White/Caucasian', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56');

-- --------------------------------------------------------

--
-- Table structure for table `legacy_information`
--

CREATE TABLE `legacy_information` (
  `id` bigint UNSIGNED NOT NULL,
  `Profile_ID` bigint UNSIGNED NOT NULL,
  `Application_ID` bigint UNSIGNED DEFAULT NULL,
  `L1_First_Name` varchar(255) DEFAULT NULL,
  `L1_Last_Name` varchar(255) DEFAULT NULL,
  `L1_Relationship` varchar(255) DEFAULT NULL,
  `L1_Graduation_Year` varchar(255) DEFAULT NULL,
  `L2_First_Name` varchar(255) DEFAULT NULL,
  `L2_Last_Name` varchar(255) DEFAULT NULL,
  `L2_Relationship` varchar(255) DEFAULT NULL,
  `L2_Graduation_Year` varchar(255) DEFAULT NULL,
  `L3_First_Name` varchar(255) DEFAULT NULL,
  `L3_Last_Name` varchar(255) DEFAULT NULL,
  `L3_Relationship` varchar(255) DEFAULT NULL,
  `L3_Graduation_Year` varchar(255) DEFAULT NULL,
  `L4_First_Name` varchar(255) DEFAULT NULL,
  `L4_Last_Name` varchar(255) DEFAULT NULL,
  `L4_Relationship` varchar(255) DEFAULT NULL,
  `L4_Graduation_Year` varchar(255) DEFAULT NULL,
  `L5_First_Name` varchar(255) DEFAULT NULL,
  `L5_Last_Name` varchar(255) DEFAULT NULL,
  `L5_Relationship` varchar(255) DEFAULT NULL,
  `L5_Graduation_Year` varchar(255) DEFAULT NULL,
  `Legacy_Info_Date` varchar(255) DEFAULT NULL,
  `is_step_complete` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `legacy_information`
--

INSERT INTO `legacy_information` (`id`, `Profile_ID`, `Application_ID`, `L1_First_Name`, `L1_Last_Name`, `L1_Relationship`, `L1_Graduation_Year`, `L2_First_Name`, `L2_Last_Name`, `L2_Relationship`, `L2_Graduation_Year`, `L3_First_Name`, `L3_Last_Name`, `L3_Relationship`, `L3_Graduation_Year`, `L4_First_Name`, `L4_Last_Name`, `L4_Relationship`, `L4_Graduation_Year`, `L5_First_Name`, `L5_Last_Name`, `L5_Relationship`, `L5_Graduation_Year`, `Legacy_Info_Date`, `is_step_complete`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-11-24 01:16:45', '2022-11-24 01:16:45');

-- --------------------------------------------------------

--
-- Table structure for table `living_situations`
--

CREATE TABLE `living_situations` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '0:Inactive,1:Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `living_situations`
--

INSERT INTO `living_situations` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Lives with student full time', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(2, 'Lives with student part time', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(3, 'Does not live with student', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56');

-- --------------------------------------------------------

--
-- Table structure for table `marital_statuses`
--

CREATE TABLE `marital_statuses` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '0:Inactive,1:Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `marital_statuses`
--

INSERT INTO `marital_statuses` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Single', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(2, 'Married', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(3, 'Separated', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(4, 'Divorced', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  `collection_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `disk` varchar(255) NOT NULL,
  `size` bigint UNSIGNED NOT NULL,
  `manipulations` longtext NOT NULL,
  `custom_properties` longtext NOT NULL,
  `responsive_images` longtext NOT NULL,
  `order_column` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_01_13_150846_create_sessions_table', 1),
(7, '2021_01_20_152216_create_permission_tables', 1),
(8, '2021_02_17_063929_create_tasks_table', 1),
(9, '2021_07_20_060238_create_media_table', 1),
(10, '2022_01_27_135906_create_cms_table', 1),
(11, '2022_01_27_135995_create_profiles_table', 1),
(12, '2022_06_23_075430_create_applications_table', 1),
(13, '2022_06_23_100946_create_recommendations_table', 1),
(14, '2022_06_24_114740_create_schools_table', 1),
(15, '2022_06_24_114758_create_salutations_table', 1),
(16, '2022_06_24_114832_create_countries_table', 1),
(17, '2022_06_24_114851_create_suffixes_table', 1),
(18, '2022_06_24_114912_create_states_table', 1),
(19, '2022_06_24_114930_create_grades_table', 1),
(20, '2022_06_24_114956_create_relationships_table', 1),
(21, '2022_06_24_115018_create_religions_table', 1),
(22, '2022_06_24_123220_create_cities_table', 1),
(23, '2022_06_26_061017_create_marital_statuses_table', 1),
(24, '2022_06_26_061019_create_living_situations_table', 1),
(25, '2022_06_26_255445_create_identify_raciallies_table', 1),
(26, '2022_06_26_255867_create_spiritualities_table', 1),
(27, '2022_06_27_053859_create_student_information_table', 1),
(28, '2022_06_27_060517_create_address_information_table', 1),
(29, '2022_06_27_061018_create_parent_information_table', 1),
(30, '2022_06_27_061841_create_sibling_information_table', 1),
(31, '2022_06_27_062252_create_legacy_information_table', 1),
(32, '2022_06_27_062617_create_parent_statements_table', 1),
(33, '2022_06_27_062638_create_spiritual_and_community_information_table', 1),
(34, '2022_06_27_070929_create_student_statements_table', 1),
(35, '2022_06_27_071344_create_writing_samples_table', 1),
(36, '2022_06_27_071629_create_release_authorizations_table', 1),
(37, '2022_08_18_054307_create_payment_logs_table', 1),
(38, '2022_08_23_133038_create_promocodes_table', 2),
(40, '2022_11_24_092200_create_notifications_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 6),
(3, 'App\\Models\\User', 7),
(3, 'App\\Models\\User', 8),
(3, 'App\\Models\\User', 9),
(3, 'App\\Models\\User', 10),
(3, 'App\\Models\\User', 11),
(1, 'App\\Models\\User', 12),
(3, 'App\\Models\\User', 13),
(3, 'App\\Models\\User', 14),
(3, 'App\\Models\\User', 15),
(3, 'App\\Models\\User', 16),
(3, 'App\\Models\\User', 17),
(3, 'App\\Models\\User', 18),
(3, 'App\\Models\\User', 19),
(3, 'App\\Models\\User', 20),
(3, 'App\\Models\\User', 21),
(3, 'App\\Models\\User', 22),
(1, 'App\\Models\\User', 23);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `profile_id` bigint UNSIGNED NOT NULL,
  `notification_type_id` bigint UNSIGNED NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification_types`
--

CREATE TABLE `notification_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parent_information`
--

CREATE TABLE `parent_information` (
  `id` bigint UNSIGNED NOT NULL,
  `Profile_ID` bigint UNSIGNED NOT NULL,
  `Application_ID` bigint UNSIGNED DEFAULT NULL,
  `P1_Relationship` text,
  `P1_Salutation` text,
  `P1_First_Name` text,
  `P1_Middle_Name` text,
  `P1_Last_Name` text,
  `P1_Suffix` text,
  `P1_Address_Type` text,
  `P1_Mobile_Phone` text,
  `P1_Personal_Email` text,
  `P1_Employer` text,
  `P1_Title` text,
  `P1_Work_Email` text,
  `P1_Work_Phone` text,
  `P1_Work_Phone_Ext` text,
  `P1_Schools` text,
  `P1_Living_Situation` text,
  `P1_Status` text,
  `P2_Relationship` text,
  `P2_Salutation` text,
  `P2_First_Name` text,
  `P2_Middle_Name` text,
  `P2_Last_Name` text,
  `P2_Suffix` text,
  `P2_Address_Type` text,
  `P2_Mobile_Phone` text,
  `P2_Personal_Email` text,
  `P2_Employer` text,
  `P2_Title` text,
  `P2_Work_Email` text,
  `P2_Work_Phone` text,
  `P2_Work_Phone_Ext` text,
  `P2_Schools` text,
  `P2_Living_Situation` text,
  `P2_Status` text,
  `P3_Relationship` text,
  `P3_Salutation` text,
  `P3_First_Name` text,
  `P3_Middle_Name` text,
  `P3_Last_Name` text,
  `P3_Suffix` text,
  `P3_Address_Type` text,
  `P3_Mobile_Phone` text,
  `P3_Personal_Email` text,
  `P3_Employer` text,
  `P3_Title` text,
  `P3_Work_Email` text,
  `P3_Work_Phone` text,
  `P3_Work_Phone_Ext` text,
  `P3_Schools` text,
  `P3_Living_Situation` text,
  `P3_Status` text,
  `P4_Relationship` text,
  `P4_Salutation` text,
  `P4_First_Name` text,
  `P4_Middle_Name` text,
  `P4_Last_Name` text,
  `P4_Suffix` text,
  `P4_Address_Type` text,
  `P4_Mobile_Phone` text,
  `P4_Personal_Email` text,
  `P4_Employer` text,
  `P4_Title` text,
  `P4_Work_Email` text,
  `P4_Work_Phone` text,
  `P4_Work_Phone_Ext` text,
  `P4_Schools` text,
  `P4_Living_Situation` text,
  `P4_Status` text,
  `Parent_Info_Date` text,
  `is_step_complete` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `parent_information`
--

INSERT INTO `parent_information` (`id`, `Profile_ID`, `Application_ID`, `P1_Relationship`, `P1_Salutation`, `P1_First_Name`, `P1_Middle_Name`, `P1_Last_Name`, `P1_Suffix`, `P1_Address_Type`, `P1_Mobile_Phone`, `P1_Personal_Email`, `P1_Employer`, `P1_Title`, `P1_Work_Email`, `P1_Work_Phone`, `P1_Work_Phone_Ext`, `P1_Schools`, `P1_Living_Situation`, `P1_Status`, `P2_Relationship`, `P2_Salutation`, `P2_First_Name`, `P2_Middle_Name`, `P2_Last_Name`, `P2_Suffix`, `P2_Address_Type`, `P2_Mobile_Phone`, `P2_Personal_Email`, `P2_Employer`, `P2_Title`, `P2_Work_Email`, `P2_Work_Phone`, `P2_Work_Phone_Ext`, `P2_Schools`, `P2_Living_Situation`, `P2_Status`, `P3_Relationship`, `P3_Salutation`, `P3_First_Name`, `P3_Middle_Name`, `P3_Last_Name`, `P3_Suffix`, `P3_Address_Type`, `P3_Mobile_Phone`, `P3_Personal_Email`, `P3_Employer`, `P3_Title`, `P3_Work_Email`, `P3_Work_Phone`, `P3_Work_Phone_Ext`, `P3_Schools`, `P3_Living_Situation`, `P3_Status`, `P4_Relationship`, `P4_Salutation`, `P4_First_Name`, `P4_Middle_Name`, `P4_Last_Name`, `P4_Suffix`, `P4_Address_Type`, `P4_Mobile_Phone`, `P4_Personal_Email`, `P4_Employer`, `P4_Title`, `P4_Work_Email`, `P4_Work_Phone`, `P4_Work_Phone_Ext`, `P4_Schools`, `P4_Living_Situation`, `P4_Status`, `Parent_Info_Date`, `is_step_complete`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Uncle', 'Mr.', 'Uncle User', 'One', 'One', 'Jr.', 'Primary Address', '6325632563', 'uncleuserone@gmail.com', '', '', '', '', '', 'st all high schools, colleges, or graduate schools you have attende', '1', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-11-24 01:16:32', '2022-11-24 01:16:32');

-- --------------------------------------------------------

--
-- Table structure for table `parent_statements`
--

CREATE TABLE `parent_statements` (
  `id` bigint UNSIGNED NOT NULL,
  `Profile_ID` bigint UNSIGNED NOT NULL,
  `Application_ID` bigint UNSIGNED DEFAULT NULL,
  `Why_SI_for_Child` text,
  `S1_Endearing_Quality_and_Growth` text,
  `S1_About_Child_Not_on_App` text,
  `S2_Endearing_Quality_and_Growth` text,
  `S2_About_Child_Not_on_App` text,
  `S3_Endearing_Quality_and_Growth` text,
  `S3_About_Child_Not_on_App` text,
  `Parent_Statement_Submitted_By` varchar(255) DEFAULT NULL,
  `Parent_Statement_Relationship` varchar(255) DEFAULT NULL,
  `Parent_Statement_Date` varchar(255) DEFAULT NULL,
  `is_step_complete` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `parent_statements`
--

INSERT INTO `parent_statements` (`id`, `Profile_ID`, `Application_ID`, `Why_SI_for_Child`, `S1_Endearing_Quality_and_Growth`, `S1_About_Child_Not_on_App`, `S2_Endearing_Quality_and_Growth`, `S2_About_Child_Not_on_App`, `S3_Endearing_Quality_and_Growth`, `S3_About_Child_Not_on_App`, `Parent_Statement_Submitted_By`, `Parent_Statement_Relationship`, `Parent_Statement_Date`, `is_step_complete`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'u desire St. Ignatius as a high school option for your child(', 'ain your child\'s most endearing quality and an area of ', 'ase tell us something that you want us to know about your child, but does not appear on this applic', NULL, NULL, NULL, NULL, 'Good One', 'Stepfather', NULL, 0, '2022-11-24 01:17:28', '2022-11-24 01:17:28');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_logs`
--

CREATE TABLE `payment_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `application_id` bigint UNSIGNED DEFAULT NULL,
  `amount` double(8,2) NOT NULL,
  `name_on_card` varchar(255) DEFAULT NULL,
  `response_code` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `auth_id` varchar(255) DEFAULT NULL,
  `message_code` varchar(255) DEFAULT NULL,
  `quantity` int NOT NULL,
  `promo_code` varchar(255) DEFAULT NULL,
  `promo_amount` double DEFAULT NULL,
  `final_amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `Profile_ID` varchar(255) DEFAULT NULL,
  `Pro_First_Name` varchar(255) DEFAULT NULL,
  `Pro_Last_Name` varchar(255) DEFAULT NULL,
  `Pro_Email` varchar(255) DEFAULT NULL,
  `Pro_Mobile` varchar(255) DEFAULT NULL,
  `is_notifiable` tinyint(1) NOT NULL DEFAULT '1',
  `Last_Password_1` varchar(255) DEFAULT NULL,
  `Last_Password_2` varchar(255) DEFAULT NULL,
  `Last_Password_3` varchar(255) DEFAULT NULL,
  `Last_Password_4` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `email`, `username`, `password`, `Profile_ID`, `Pro_First_Name`, `Pro_Last_Name`, `Pro_Email`, `Pro_Mobile`, `is_notifiable`, `Last_Password_1`, `Last_Password_2`, `Last_Password_3`, `Last_Password_4`, `created_at`, `updated_at`) VALUES
(1, 'userone@gmail.com', 'uone2488', '$2y$10$GYauI0oTJyWbubITxTCntehNi/Tf3.BMeE.Ag2UQI3n.cYBngtEoO', NULL, 'user', 'one', NULL, NULL, 1, '$2y$10$jrJzSzS/b6K3Ax3PIfCmXuCLscGuoyoXxDNuma.RQyTzHZPYFlODO', NULL, NULL, NULL, '2022-11-23 05:58:30', '2022-11-23 05:58:30');

-- --------------------------------------------------------

--
-- Table structure for table `promocodes`
--

CREATE TABLE `promocodes` (
  `id` bigint UNSIGNED NOT NULL,
  `promo_code` varchar(255) NOT NULL,
  `discount_amount` double(8,2) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '1:Active,0:Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recommendations`
--

CREATE TABLE `recommendations` (
  `id` bigint UNSIGNED NOT NULL,
  `Profile_ID` bigint UNSIGNED NOT NULL,
  `Rec_Name` varchar(255) DEFAULT NULL,
  `Rec_Email` varchar(255) DEFAULT NULL,
  `Rec_Student` varchar(255) DEFAULT NULL,
  `Rec_Message` text,
  `Rec_Request_Send_Date` varchar(255) DEFAULT NULL,
  `Rec_Relationship_to_Student` varchar(255) DEFAULT NULL,
  `Rec_Years_Known_Student` varchar(255) DEFAULT NULL,
  `Rec_Recommendation` text,
  `Rec_Send_Date` varchar(255) DEFAULT NULL,
  `Status` tinyint NOT NULL DEFAULT '0' COMMENT '0:Pending,1:Compleate',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `relationships`
--

CREATE TABLE `relationships` (
  `id` bigint UNSIGNED NOT NULL,
  `relationship_name` varchar(255) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '0:Inactive,1:Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `relationships`
--

INSERT INTO `relationships` (`id`, `relationship_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Father', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(2, 'Mother', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(3, 'Stepfather', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(4, 'Stepmother', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(5, 'Grandfather', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(6, 'Grandmother', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(7, 'Brother', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(8, 'Sister', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(9, 'Stepbrother', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(10, 'Stepsister', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(11, 'Half-brother', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(12, 'Half-sister', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(13, 'Aunt', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(14, 'Uncle', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(15, 'Female Guardian', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(16, 'Male Guardian', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56');

-- --------------------------------------------------------

--
-- Table structure for table `release_authorizations`
--

CREATE TABLE `release_authorizations` (
  `id` bigint UNSIGNED NOT NULL,
  `Profile_ID` bigint UNSIGNED NOT NULL,
  `Application_ID` bigint UNSIGNED DEFAULT NULL,
  `S1_Entrance_Exam_Reservation` varchar(255) DEFAULT NULL,
  `S1_Other_Catholic_School_Name` varchar(255) DEFAULT NULL,
  `S1_Other_Catholic_School_Location` varchar(255) DEFAULT NULL,
  `S1_Other_Catholic_School_Date` varchar(255) DEFAULT NULL,
  `S2_Entrance_Exam_Reservation` varchar(255) DEFAULT NULL,
  `S2_Other_Catholic_School_Name` varchar(255) DEFAULT NULL,
  `S2_Other_Catholic_School_Location` varchar(255) DEFAULT NULL,
  `S2_Other_Catholic_School_Date` varchar(255) DEFAULT NULL,
  `S3_Entrance_Exam_Reservation` varchar(255) DEFAULT NULL,
  `S3_Other_Catholic_School_Name` varchar(255) DEFAULT NULL,
  `S3_Other_Catholic_School_Location` varchar(255) DEFAULT NULL,
  `S3_Other_Catholic_School_Date` varchar(255) DEFAULT NULL,
  `Extrance_Exam_Date` varchar(255) DEFAULT NULL,
  `Agree_to_release_record` tinyint(1) DEFAULT '0',
  `Agree_to_record_is_true` tinyint(1) DEFAULT '0',
  `Release_Date` varchar(255) DEFAULT NULL,
  `S1_Promo_Code_Applied` varchar(255) DEFAULT NULL,
  `S2_Promo_Code_Applied` varchar(255) DEFAULT NULL,
  `S3_Promo_Code_Applied` varchar(255) DEFAULT NULL,
  `S1_Application_Fee` varchar(255) DEFAULT NULL,
  `S2_Application_Fee` varchar(255) DEFAULT NULL,
  `S3_Application_Fee` varchar(255) DEFAULT NULL,
  `Submission_Date` varchar(255) DEFAULT NULL,
  `Transaction_ID` varchar(255) DEFAULT NULL,
  `Applying_for_Grade` varchar(255) DEFAULT NULL,
  `Academic_Year_Applying_For` varchar(255) DEFAULT NULL,
  `Graduation_Year` varchar(255) DEFAULT NULL,
  `is_step_complete` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `release_authorizations`
--

INSERT INTO `release_authorizations` (`id`, `Profile_ID`, `Application_ID`, `S1_Entrance_Exam_Reservation`, `S1_Other_Catholic_School_Name`, `S1_Other_Catholic_School_Location`, `S1_Other_Catholic_School_Date`, `S2_Entrance_Exam_Reservation`, `S2_Other_Catholic_School_Name`, `S2_Other_Catholic_School_Location`, `S2_Other_Catholic_School_Date`, `S3_Entrance_Exam_Reservation`, `S3_Other_Catholic_School_Name`, `S3_Other_Catholic_School_Location`, `S3_Other_Catholic_School_Date`, `Extrance_Exam_Date`, `Agree_to_release_record`, `Agree_to_record_is_true`, `Release_Date`, `S1_Promo_Code_Applied`, `S2_Promo_Code_Applied`, `S3_Promo_Code_Applied`, `S1_Application_Fee`, `S2_Application_Fee`, `S3_Application_Fee`, `Submission_Date`, `Transaction_ID`, `Applying_for_Grade`, `Academic_Year_Applying_For`, `Graduation_Year`, `is_step_complete`, `created_at`, `updated_at`) VALUES
(3, 1, 1, '1', '', '', '', '', '', '', '', '', '', '', '', '', 1, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-11-24 01:23:02', '2022-11-24 01:23:02');

-- --------------------------------------------------------

--
-- Table structure for table `religions`
--

CREATE TABLE `religions` (
  `id` bigint UNSIGNED NOT NULL,
  `religion_name` varchar(255) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '0:Inactive,1:Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `religions`
--

INSERT INTO `religions` (`id`, `religion_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Catholic', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(2, 'Christian', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(3, 'Buddhist', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(4, 'Hindu', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(5, 'Jewish', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(6, 'Muslim', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(7, 'Spiritual', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(8, 'No Religion', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(9, 'Other', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'SUPER-ADMIN', 'web', '2022-08-19 02:37:55', '2022-08-19 02:37:55'),
(2, 'CLIENT', 'web', '2022-08-19 02:37:55', '2022-08-19 02:37:55'),
(3, 'STUDENT', 'web', '2022-08-19 02:37:55', '2022-08-19 02:37:55'),
(4, 'PARENT', 'web', '2022-08-19 02:37:55', '2022-08-19 02:37:55');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salutations`
--

CREATE TABLE `salutations` (
  `id` bigint UNSIGNED NOT NULL,
  `salutation_name` varchar(255) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '0:Inactive,1:Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `salutations`
--

INSERT INTO `salutations` (`id`, `salutation_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mr.', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(2, 'Mrs.', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(3, 'Ms.', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(4, 'Dr.', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(5, 'Rev.', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(6, 'Hon.', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` bigint UNSIGNED NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '0:Inactive,1:Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `school_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'A.P. Giannini Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(2, 'Abbott Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(3, 'Abraham Lincoln High School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(4, 'Adda Clevenger', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(5, 'Alice Fong Yu School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(6, 'All Souls Catholic School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(7, 'Alma Heights Christian Academy', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(8, 'Alt School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(9, 'Alta Loma Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(10, 'Alta Vista School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(11, 'Aptos Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(12, 'Aragon High School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(13, 'Archbishop Mitty High School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(14, 'Archbishop Riordan High School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(15, 'Balboa High School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(16, 'Bellarmine College Preparatory', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(17, 'Ben Franklin Intermediate School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(18, 'Bentley School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(19, 'Bessie Carmichael Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(20, 'Bishop O\'Dowd High School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(21, 'Borel Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(22, 'Bowditch Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(23, 'Buena Vista Horace Mann K-8 School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(24, 'Bullis Charter School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(25, 'Burlingame High School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(26, 'Burlingame Intermediate School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(27, 'Cabrillo Elementary School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(28, 'California Virtual Academy', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(29, 'Capuchino High School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(30, 'Carlmont High School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(31, 'Carondelet High School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(32, 'Cathedral School for Boys', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(33, 'Central Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(34, 'Challenger School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(35, 'Charles Armstrong School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(36, 'Children\'s Day School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(37, 'Chinese American International School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(38, 'Claire Lilienthal School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(39, 'Convent High School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(40, 'Convent of the Sacred Heart Elementary', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(41, 'Cornerstone Academy', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(42, 'Corpus Christi Catholic School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(43, 'Creative Arts Charter School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(44, 'Crocker Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(45, 'Crystal Springs Uplands School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(46, 'Davidson Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(47, 'De La Salle High School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(48, 'De Marillac Academy', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(49, 'Del Mar Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(50, 'Drew School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(51, 'Ecole Notre Dame des Victoires', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(52, 'Edison Charter Academy', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(53, 'El Camino High School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(54, 'Everett Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(55, 'Father Sauer Academy', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(56, 'Fernando Rivera Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(57, 'Francisco Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(58, 'French American International School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(59, 'Fusion Academy', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(60, 'Galileo High School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(61, 'Gateway High School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(62, 'Gateway Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(63, 'George Washington High School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(64, 'Good Shepherd School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(65, 'Hall Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(66, 'Head-Royce School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(67, 'Herbert Hoover Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(68, 'Highlands Christian School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(69, 'Hilldale School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(70, 'Hillsdale High School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(71, 'Hillview Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(72, 'Hillwood Academic School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(73, 'Holy Angels School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(74, 'Holy Name School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(75, 'ICA Cristo Rey Academy', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(76, 'Immaculate Heart of Mary', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(77, 'Ingrid B. Lacy Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(78, 'International High School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(79, 'James Denman Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(80, 'James Lick Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(81, 'Junipero Serra High School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(82, 'Katherine Delmar Burke School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(83, 'Kent Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(84, 'Keys School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(85, 'Kipp Bayview Academy', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(86, 'KIPP SF Bay Academy', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(87, 'Kittredge School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(88, 'KZV Armenian School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(89, 'La Scuola International School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(90, 'Lawton Alternative School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(91, 'Lick-Wilmerding High School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(92, 'Lipman Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(93, 'Live Oak School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(94, 'Lowell High School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(95, 'Lycee Francais de San Francisco', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(96, 'Manuel F. Cunha School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(97, 'Marin Academy', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(98, 'Marin Catholic', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(99, 'Marin Country Day School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(100, 'Marin Horizon School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(101, 'Marin Montessori School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(102, 'Marin Preparatory School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(103, 'Marin Primary & Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(104, 'Marina Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(105, 'Mark Day School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(106, 'Martin Luther King Jr. Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(107, 'Menlo School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(108, 'Mercy High School Burlingame', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(109, 'Mill Valley Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(110, 'Millennium School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(111, 'Miller Creek Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(112, 'Mills High School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(113, 'Mission Dolores Academy', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(114, 'Mount Tamalpais School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(115, 'Notre Dame Belmont', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(116, 'Ocean Shore School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(117, 'Oceana High School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(118, 'Our Lady of Angels School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(119, 'Our Lady of Loretto School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(120, 'Our Lady of Mercy School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(121, 'Our Lady of Mount Carmel School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(122, 'Our Lady of Perpetual Help School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(123, 'Our Lady of the Visitacion School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(124, 'Parkside Intermediate School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(125, 'Piedmont Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(126, 'Presidio Hill School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(127, 'Presidio Knolls School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(128, 'Presidio Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(129, 'Ralston Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(130, 'Redwood High School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(131, 'Ring Mountain Day School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(132, 'Rooftop Alternative School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(133, 'Roosevelt Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(134, 'Ross Grammar School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(135, 'Ruth Asawa San Francisco School of the Arts', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(136, 'Sacred Heart Cathedral Prep', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(137, 'Sacred Heart Preparatory - Atherton', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(138, 'Sacred Heart Schools, Atherton', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(139, 'Saint Anne School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(140, 'Saint Anselm School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(141, 'Saint Anthony - ICA', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(142, 'Saint Brendan School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(143, 'Saint Brigid School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(144, 'Saint Catherine of Siena School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(145, 'Saint Cecilia School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(146, 'Saint Charles Borromeo School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(147, 'Saint Charles School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(148, 'Saint Dunstan School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(149, 'Saint Elizabeth School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(150, 'Saint Finn Barr School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(151, 'Saint Francis High School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(152, 'Saint Gabriel School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(153, 'Saint Gregory School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(154, 'Saint Hilary School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(155, 'Saint Ignatius College Preparatory', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(156, 'Saint Isabella School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(157, 'Saint James School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(158, 'Saint John School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(159, 'Saint Mary\'s College High School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(160, 'Saint Matthew Catholic School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(161, 'Saint Matthew\'s Episcopal Day', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(162, 'Saint Monica School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(163, 'Saint Nicholas Catholic School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(164, 'Saint Patrick School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(165, 'Saint Paul School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(166, 'Saint Peter\'s Catholic School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(167, 'Saint Philip School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(168, 'Saint Pius School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(169, 'Saint Raphael School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(170, 'Saint Raymond School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(171, 'Saint Rita School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(172, 'Saint Robert School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(173, 'Saint Stephen School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(174, 'Saint Theresa School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(175, 'Saint Thomas More School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(176, 'Saint Thomas the Apostle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(177, 'Saint Timothy School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(178, 'Saint Veronica School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(179, 'Saint Vincent De Paul School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(180, 'Saints Peter and Paul School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(181, 'San Carlos Charter Learning Center', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(182, 'San Domenico Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(183, 'San Domenico School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(184, 'San Francisco Day School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(185, 'San Francisco Friends School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(186, 'San Francisco Pacific Academy', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(187, 'San Francisco University High School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(188, 'San Francisco Waldorf High School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(189, 'San Mateo High School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(190, 'School of the Epiphany', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(191, 'School of the Madeleine', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(192, 'Sea Crest School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(193, 'Sinaloa Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(194, 'Spanish Infusion School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(195, 'Stratford School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(196, 'Stuart Hall for Boys', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(197, 'Stuart Hall High School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(198, 'Summit Shasta Public School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(199, 'Synergy School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(200, 'Tamalpais High School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(201, 'Taylor Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(202, 'Terra Linda High School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(203, 'Terra Nova High School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(204, 'The Bay School of San Francisco', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(205, 'The Brandeis School of Marin', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(206, 'The Brandeis School of San Francisco', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(207, 'The Branson School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(208, 'The College Preparatory School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(209, 'The Hamlin School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(210, 'The Mission Preparatory School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(211, 'The Nueva School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(212, 'The San Francisco School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(213, 'Thomas R. Pollicita School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(214, 'Tierra Linda Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(215, 'Town School for Boys', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(216, 'Urban School of San Francisco', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(217, 'Urban Student Athlete Development Academy', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(218, 'Vallemar School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(219, 'West Portal Lutheran School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(220, 'Westborough Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(221, 'Westmoor High School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(222, 'White Hill Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(223, 'Willie Brown Jr. Middle School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(224, 'Willow Creek Academy', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(225, 'Woodside Elementary School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(226, 'Woodside Priory School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(227, 'Zion Lutheran School', 1, '2022-08-21 20:25:30', '2022-08-21 20:25:30'),
(228, 'Not Listed', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `payload` text NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sibling_information`
--

CREATE TABLE `sibling_information` (
  `id` bigint UNSIGNED NOT NULL,
  `Profile_ID` bigint UNSIGNED NOT NULL,
  `Application_ID` bigint UNSIGNED DEFAULT NULL,
  `SIB01_First_Name` text,
  `SIB01_Middle_Name` text,
  `SIB01_Last_Name` text,
  `SIB01_Suffix` text,
  `SIB01_Relationship` text,
  `SIB01_Current_Grade` text,
  `SIB01_Current_School` text,
  `SIB01_Current_School_Not_Listed` text,
  `SIB01_HS_Graduation_Year` text,
  `SIB02_First_Name` text,
  `SIB02_Middle_Name` text,
  `SIB02_Last_Name` text,
  `SIB02_Suffix` text,
  `SIB02_Relationship` text,
  `SIB02_Current_Grade` text,
  `SIB02_Current_School` text,
  `SIB02_Current_School_Not_Listed` text,
  `SIB02_HS_Graduation_Year` text,
  `SIB03_First_Name` text,
  `SIB03_Middle_Name` text,
  `SIB03_Last_Name` text,
  `SIB03_Suffix` text,
  `SIB03_Relationship` text,
  `SIB03_Current_Grade` text,
  `SIB03_Current_School` text,
  `SIB03_Current_School_Not_Listed` text,
  `SIB03_HS_Graduation_Year` text,
  `SIB04_First_Name` text,
  `SIB04_Middle_Name` text,
  `SIB04_Last_Name` text,
  `SIB04_Suffix` text,
  `SIB04_Relationship` text,
  `SIB04_Current_Grade` text,
  `SIB04_Current_School` text,
  `SIB04_Current_School_Not_Listed` text,
  `SIB04_HS_Graduation_Year` text,
  `SIB05_First_Name` text,
  `SIB05_Middle_Name` text,
  `SIB05_Last_Name` text,
  `SIB05_Suffix` text,
  `SIB05_Relationship` text,
  `SIB05_Current_Grade` text,
  `SIB05_Current_School` text,
  `SIB05_Current_School_Not_Listed` text,
  `SIB05_HS_Graduation_Year` text,
  `SIB06_First_Name` text,
  `SIB06_Middle_Name` text,
  `SIB06_Last_Name` text,
  `SIB06_Suffix` text,
  `SIB06_Relationship` text,
  `SIB06_Current_Grade` text,
  `SIB06_Current_School` text,
  `SIB06_Current_School_Not_Listed` text,
  `SIB06_HS_Graduation_Year` text,
  `SIB07_First_Name` text,
  `SIB07_Middle_Name` text,
  `SIB07_Last_Name` text,
  `SIB07_Suffix` text,
  `SIB07_Relationship` text,
  `SIB07_Current_Grade` text,
  `SIB07_Current_School` text,
  `SIB07_Current_School_Not_Listed` text,
  `SIB07_HS_Graduation_Year` text,
  `SIB08_First_Name` text,
  `SIB08_Middle_Name` text,
  `SIB08_Last_Name` text,
  `SIB08_Suffix` text,
  `SIB08_Relationship` text,
  `SIB08_Current_Grade` text,
  `SIB08_Current_School` text,
  `SIB08_Current_School_Not_Listed` text,
  `SIB08_HS_Graduation_Year` text,
  `SIB09_First_Name` text,
  `SIB09_Middle_Name` text,
  `SIB09_Last_Name` text,
  `SIB09_Suffix` text,
  `SIB09_Relationship` text,
  `SIB09_Current_Grade` text,
  `SIB09_Current_School` text,
  `SIB09_Current_School_Not_Listed` text,
  `SIB09_HS_Graduation_Year` text,
  `SIB10_First_Name` text,
  `SIB10_Middle_Name` text,
  `SIB10_Last_Name` text,
  `SIB10_Suffix` text,
  `SIB10_Relationship` text,
  `SIB10_Current_Grade` text,
  `SIB10_Current_School` text,
  `SIB10_Current_School_Not_Listed` text,
  `SIB10_HS_Graduation_Year` text,
  `Sibling_Info_Date` date DEFAULT NULL,
  `is_step_complete` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sibling_information`
--

INSERT INTO `sibling_information` (`id`, `Profile_ID`, `Application_ID`, `SIB01_First_Name`, `SIB01_Middle_Name`, `SIB01_Last_Name`, `SIB01_Suffix`, `SIB01_Relationship`, `SIB01_Current_Grade`, `SIB01_Current_School`, `SIB01_Current_School_Not_Listed`, `SIB01_HS_Graduation_Year`, `SIB02_First_Name`, `SIB02_Middle_Name`, `SIB02_Last_Name`, `SIB02_Suffix`, `SIB02_Relationship`, `SIB02_Current_Grade`, `SIB02_Current_School`, `SIB02_Current_School_Not_Listed`, `SIB02_HS_Graduation_Year`, `SIB03_First_Name`, `SIB03_Middle_Name`, `SIB03_Last_Name`, `SIB03_Suffix`, `SIB03_Relationship`, `SIB03_Current_Grade`, `SIB03_Current_School`, `SIB03_Current_School_Not_Listed`, `SIB03_HS_Graduation_Year`, `SIB04_First_Name`, `SIB04_Middle_Name`, `SIB04_Last_Name`, `SIB04_Suffix`, `SIB04_Relationship`, `SIB04_Current_Grade`, `SIB04_Current_School`, `SIB04_Current_School_Not_Listed`, `SIB04_HS_Graduation_Year`, `SIB05_First_Name`, `SIB05_Middle_Name`, `SIB05_Last_Name`, `SIB05_Suffix`, `SIB05_Relationship`, `SIB05_Current_Grade`, `SIB05_Current_School`, `SIB05_Current_School_Not_Listed`, `SIB05_HS_Graduation_Year`, `SIB06_First_Name`, `SIB06_Middle_Name`, `SIB06_Last_Name`, `SIB06_Suffix`, `SIB06_Relationship`, `SIB06_Current_Grade`, `SIB06_Current_School`, `SIB06_Current_School_Not_Listed`, `SIB06_HS_Graduation_Year`, `SIB07_First_Name`, `SIB07_Middle_Name`, `SIB07_Last_Name`, `SIB07_Suffix`, `SIB07_Relationship`, `SIB07_Current_Grade`, `SIB07_Current_School`, `SIB07_Current_School_Not_Listed`, `SIB07_HS_Graduation_Year`, `SIB08_First_Name`, `SIB08_Middle_Name`, `SIB08_Last_Name`, `SIB08_Suffix`, `SIB08_Relationship`, `SIB08_Current_Grade`, `SIB08_Current_School`, `SIB08_Current_School_Not_Listed`, `SIB08_HS_Graduation_Year`, `SIB09_First_Name`, `SIB09_Middle_Name`, `SIB09_Last_Name`, `SIB09_Suffix`, `SIB09_Relationship`, `SIB09_Current_Grade`, `SIB09_Current_School`, `SIB09_Current_School_Not_Listed`, `SIB09_HS_Graduation_Year`, `SIB10_First_Name`, `SIB10_Middle_Name`, `SIB10_Last_Name`, `SIB10_Suffix`, `SIB10_Relationship`, `SIB10_Current_Grade`, `SIB10_Current_School`, `SIB10_Current_School_Not_Listed`, `SIB10_HS_Graduation_Year`, `Sibling_Info_Date`, `is_step_complete`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-11-24 01:16:42', '2022-11-24 01:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `spiritualities`
--

CREATE TABLE `spiritualities` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '0:Inactive,1:Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `spiritualities`
--

INSERT INTO `spiritualities` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Church Based', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(2, 'Service Based', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(3, 'Values/Ethics', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(4, 'Global/Environmental', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(5, 'Other', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56');

-- --------------------------------------------------------

--
-- Table structure for table `spiritual_and_community_information`
--

CREATE TABLE `spiritual_and_community_information` (
  `id` bigint UNSIGNED NOT NULL,
  `Profile_ID` bigint UNSIGNED NOT NULL,
  `Application_ID` bigint UNSIGNED DEFAULT NULL,
  `Applicant_Religion` varchar(255) DEFAULT NULL,
  `Applicant_Religion_Other` varchar(255) DEFAULT NULL,
  `Church_Faith_Community` varchar(255) DEFAULT NULL,
  `Church_Faith_Community_Location` varchar(255) DEFAULT NULL,
  `S1_Baptism_Year` varchar(255) DEFAULT NULL,
  `S1_Confirmation_Year` varchar(255) DEFAULT NULL,
  `S2_Baptism_Year` varchar(255) DEFAULT NULL,
  `S2_Confirmation_Year` varchar(255) DEFAULT NULL,
  `S3_Baptism_Year` varchar(255) DEFAULT NULL,
  `S3_Confirmation_Year` varchar(255) DEFAULT NULL,
  `Impact_to_Community` text,
  `Describe_Family_Spirituality` varchar(255) DEFAULT NULL,
  `Describe_Practice_in_Detail` text,
  `Religious_Studies_Classes` varchar(255) DEFAULT NULL,
  `Religious_Studies_Classes_Explanation` varchar(255) DEFAULT NULL,
  `School_Liturgies` varchar(255) DEFAULT NULL,
  `School_Liturgies_Explanation` varchar(255) DEFAULT NULL,
  `Retreats` varchar(255) DEFAULT NULL,
  `Retreats_Explanation` varchar(255) DEFAULT NULL,
  `Community_Service` varchar(255) DEFAULT NULL,
  `Community_Service_Explanation` varchar(255) DEFAULT NULL,
  `Religious_Form_Submitted_By` varchar(255) DEFAULT NULL,
  `Religious_Form_Relationship` varchar(255) DEFAULT NULL,
  `Religious_Form_Date` varchar(255) DEFAULT NULL,
  `is_step_complete` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `spiritual_and_community_information`
--

INSERT INTO `spiritual_and_community_information` (`id`, `Profile_ID`, `Application_ID`, `Applicant_Religion`, `Applicant_Religion_Other`, `Church_Faith_Community`, `Church_Faith_Community_Location`, `S1_Baptism_Year`, `S1_Confirmation_Year`, `S2_Baptism_Year`, `S2_Confirmation_Year`, `S3_Baptism_Year`, `S3_Confirmation_Year`, `Impact_to_Community`, `Describe_Family_Spirituality`, `Describe_Practice_in_Detail`, `Religious_Studies_Classes`, `Religious_Studies_Classes_Explanation`, `School_Liturgies`, `School_Liturgies_Explanation`, `Retreats`, `Retreats_Explanation`, `Community_Service`, `Community_Service_Explanation`, `Religious_Form_Submitted_By`, `Religious_Form_Relationship`, `Religious_Form_Date`, `is_step_complete`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Buddhist', '', '', '', '', '', '', '', '', '', 't impact does community have in your life and how do you best support your child\'s school co', '1,3', 'cribe in more detail the practice(s) checked a', 'Yes', '', 'Yes', '', 'Yes', '', 'Yes', '', 'Good one', 'Stepmother', '', 0, '2022-11-24 01:19:23', '2022-11-24 01:19:23');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint UNSIGNED NOT NULL,
  `country_id` int NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '0:Inactive,1:Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `code`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Alabama', 1, NULL, NULL),
(2, 1, NULL, 'Alaska', 1, NULL, NULL),
(3, 1, NULL, 'Arizona', 1, NULL, NULL),
(4, 1, NULL, 'Arkansas', 1, NULL, NULL),
(5, 1, NULL, 'California', 1, NULL, NULL),
(6, 1, NULL, 'Colorado', 1, NULL, NULL),
(7, 1, NULL, 'Connecticut', 1, NULL, NULL),
(8, 1, NULL, 'Delaware', 1, NULL, NULL),
(9, 1, NULL, 'District of Columbia', 1, NULL, NULL),
(10, 1, NULL, 'Florida', 1, NULL, NULL),
(11, 1, NULL, 'Georgia', 1, NULL, NULL),
(12, 1, NULL, 'Hawaii', 1, NULL, NULL),
(13, 1, NULL, 'Idaho', 1, NULL, NULL),
(14, 1, NULL, 'Illinois', 1, NULL, NULL),
(15, 1, NULL, 'Indiana', 1, NULL, NULL),
(16, 1, NULL, 'Iowa', 1, NULL, NULL),
(17, 1, NULL, 'Kansas', 1, NULL, NULL),
(18, 1, NULL, 'Kentucky', 1, NULL, NULL),
(19, 1, NULL, 'Louisiana', 1, NULL, NULL),
(20, 1, NULL, 'Maine', 1, NULL, NULL),
(21, 1, NULL, 'Maryland', 1, NULL, NULL),
(22, 1, NULL, 'Massachusetts', 1, NULL, NULL),
(23, 1, NULL, 'Michigan', 1, NULL, NULL),
(24, 1, NULL, 'Minnesota', 1, NULL, NULL),
(25, 1, NULL, 'Mississippi', 1, NULL, NULL),
(26, 1, NULL, 'Missouri', 1, NULL, NULL),
(27, 1, NULL, 'Montana', 1, NULL, NULL),
(28, 1, NULL, 'Nebraska', 1, NULL, NULL),
(29, 1, NULL, 'Nevada', 1, NULL, NULL),
(30, 1, NULL, 'New Hampshire', 1, NULL, NULL),
(31, 1, NULL, 'New Jersey', 1, NULL, NULL),
(32, 1, NULL, 'New Mexico', 1, NULL, NULL),
(33, 1, NULL, 'New York', 1, NULL, NULL),
(34, 1, NULL, 'North Carolina', 1, NULL, NULL),
(35, 1, NULL, 'North Dakota', 1, NULL, NULL),
(36, 1, NULL, 'Ohio', 1, NULL, NULL),
(37, 1, NULL, 'Oklahoma', 1, NULL, NULL),
(38, 1, NULL, 'Oregon', 1, NULL, NULL),
(39, 1, NULL, 'Pennsylvania', 1, NULL, NULL),
(40, 1, NULL, 'Rhode Island', 1, NULL, NULL),
(41, 1, NULL, 'South Carolina', 1, NULL, NULL),
(42, 1, NULL, 'South Dakota', 1, NULL, NULL),
(43, 1, NULL, 'Tennessee', 1, NULL, NULL),
(44, 1, NULL, 'Texas', 1, NULL, NULL),
(45, 1, NULL, 'Utah', 1, NULL, NULL),
(46, 1, NULL, 'Vermont', 1, NULL, NULL),
(47, 1, NULL, 'Virginia', 1, NULL, NULL),
(48, 1, NULL, 'Washington', 1, NULL, NULL),
(49, 1, NULL, 'West Virginia', 1, NULL, NULL),
(50, 1, NULL, 'Wisconsin', 1, NULL, NULL),
(51, 1, NULL, 'Wyoming', 1, NULL, NULL),
(52, 1, NULL, 'American Samoa', 1, NULL, NULL),
(53, 1, NULL, 'Federated States of Micronesia', 1, NULL, NULL),
(54, 1, NULL, 'Guam', 1, NULL, NULL),
(55, 1, NULL, 'Marshall Islands', 1, NULL, NULL),
(56, 1, NULL, 'Northern Mariana Islands', 1, NULL, NULL),
(57, 1, NULL, 'Palau', 1, NULL, NULL),
(58, 1, NULL, 'Puerto Rico', 1, NULL, NULL),
(59, 1, NULL, 'U.S. Minor Outlying Islands', 1, NULL, NULL),
(60, 1, NULL, 'U.S. Virgin Islands', 1, NULL, NULL),
(61, 2, NULL, 'Alberta', 1, NULL, NULL),
(62, 2, NULL, 'British Columbia', 1, NULL, NULL),
(63, 2, NULL, 'Manitoba', 1, NULL, NULL),
(64, 2, NULL, 'New Brunswick', 1, NULL, NULL),
(65, 2, NULL, 'Newfoundland and Labrador', 1, NULL, NULL),
(66, 2, NULL, 'Northwest Territories', 1, NULL, NULL),
(67, 2, NULL, 'Nova Scotia', 1, NULL, NULL),
(68, 2, NULL, 'Nunavut', 1, NULL, NULL),
(69, 2, NULL, 'Ontario', 1, NULL, NULL),
(70, 2, NULL, 'Prince Edward Island', 1, NULL, NULL),
(71, 2, NULL, 'Quebec', 1, NULL, NULL),
(72, 2, NULL, 'Saskatchewan', 1, NULL, NULL),
(73, 2, NULL, 'Yukon', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_information`
--

CREATE TABLE `student_information` (
  `id` bigint UNSIGNED NOT NULL,
  `Profile_ID` bigint UNSIGNED NOT NULL,
  `Application_ID` bigint UNSIGNED DEFAULT NULL,
  `S1_Photo` varchar(255) DEFAULT NULL,
  `S1_First_Name` varchar(255) DEFAULT NULL,
  `S1_Middle_Name` varchar(255) DEFAULT NULL,
  `S1_Last_Name` varchar(255) DEFAULT NULL,
  `S1_Suffix` varchar(255) DEFAULT NULL,
  `S1_Preferred_First_Name` varchar(255) DEFAULT NULL,
  `S1_Birthdate` varchar(255) DEFAULT NULL,
  `S1_Gender` varchar(255) DEFAULT NULL,
  `S1_Personal_Email` varchar(255) DEFAULT NULL,
  `S1_Mobile_Phone` varchar(255) DEFAULT NULL,
  `S1_Race` varchar(255) DEFAULT NULL,
  `S1_Ethnicity` varchar(255) DEFAULT NULL,
  `S1_Current_School` varchar(255) DEFAULT NULL,
  `S1_Current_School_Not_Listed` varchar(255) DEFAULT NULL,
  `S1_Other_High_School_1` varchar(255) DEFAULT NULL,
  `S1_Other_High_School_2` varchar(255) DEFAULT NULL,
  `S1_Other_High_School_3` varchar(255) DEFAULT NULL,
  `S1_Other_High_School_4` varchar(255) DEFAULT NULL,
  `S2_Photo` varchar(255) DEFAULT NULL,
  `S2_First_Name` varchar(255) DEFAULT NULL,
  `S2_Middle_Name` varchar(255) DEFAULT NULL,
  `S2_Last_Name` varchar(255) DEFAULT NULL,
  `S2_Suffix` varchar(255) DEFAULT NULL,
  `S2_Preferred_First_Name` varchar(255) DEFAULT NULL,
  `S2_Birthdate` varchar(255) DEFAULT NULL,
  `S2_Gender` varchar(255) DEFAULT NULL,
  `S2_Personal_Email` varchar(255) DEFAULT NULL,
  `S2_Mobile_Phone` varchar(255) DEFAULT NULL,
  `S2_Race` varchar(255) DEFAULT NULL,
  `S2_Ethnicity` varchar(255) DEFAULT NULL,
  `S2_Current_School` varchar(255) DEFAULT NULL,
  `S2_Current_School_Not_Listed` varchar(255) DEFAULT NULL,
  `S2_Other_High_School_1` varchar(255) DEFAULT NULL,
  `S2_Other_High_School_2` varchar(255) DEFAULT NULL,
  `S2_Other_High_School_3` varchar(255) DEFAULT NULL,
  `S2_Other_High_School_4` varchar(255) DEFAULT NULL,
  `S3_Photo` varchar(255) DEFAULT NULL,
  `S3_First_Name` varchar(255) DEFAULT NULL,
  `S3_Middle_Name` varchar(255) DEFAULT NULL,
  `S3_Last_Name` varchar(255) DEFAULT NULL,
  `S3_Suffix` varchar(255) DEFAULT NULL,
  `S3_Preferred_First_Name` varchar(255) DEFAULT NULL,
  `S3_Birthdate` varchar(255) DEFAULT NULL,
  `S3_Gender` varchar(255) DEFAULT NULL,
  `S3_Personal_Email` varchar(255) DEFAULT NULL,
  `S3_Mobile_Phone` varchar(255) DEFAULT NULL,
  `S3_Race` varchar(255) DEFAULT NULL,
  `S3_Ethnicity` varchar(255) DEFAULT NULL,
  `S3_Current_School` varchar(255) DEFAULT NULL,
  `S3_Current_School_Not_Listed` varchar(255) DEFAULT NULL,
  `S3_Other_High_School_1` varchar(255) DEFAULT NULL,
  `S3_Other_High_School_2` varchar(255) DEFAULT NULL,
  `S3_Other_High_School_3` varchar(255) DEFAULT NULL,
  `S3_Other_High_School_4` varchar(255) DEFAULT NULL,
  `Applying_for_Grade` varchar(255) DEFAULT NULL,
  `Academic_Year_Applying_For` varchar(255) DEFAULT NULL,
  `Graduation_Year` varchar(255) DEFAULT NULL,
  `Student_Info_Date` varchar(255) DEFAULT NULL,
  `is_step_complete` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_information`
--

INSERT INTO `student_information` (`id`, `Profile_ID`, `Application_ID`, `S1_Photo`, `S1_First_Name`, `S1_Middle_Name`, `S1_Last_Name`, `S1_Suffix`, `S1_Preferred_First_Name`, `S1_Birthdate`, `S1_Gender`, `S1_Personal_Email`, `S1_Mobile_Phone`, `S1_Race`, `S1_Ethnicity`, `S1_Current_School`, `S1_Current_School_Not_Listed`, `S1_Other_High_School_1`, `S1_Other_High_School_2`, `S1_Other_High_School_3`, `S1_Other_High_School_4`, `S2_Photo`, `S2_First_Name`, `S2_Middle_Name`, `S2_Last_Name`, `S2_Suffix`, `S2_Preferred_First_Name`, `S2_Birthdate`, `S2_Gender`, `S2_Personal_Email`, `S2_Mobile_Phone`, `S2_Race`, `S2_Ethnicity`, `S2_Current_School`, `S2_Current_School_Not_Listed`, `S2_Other_High_School_1`, `S2_Other_High_School_2`, `S2_Other_High_School_3`, `S2_Other_High_School_4`, `S3_Photo`, `S3_First_Name`, `S3_Middle_Name`, `S3_Last_Name`, `S3_Suffix`, `S3_Preferred_First_Name`, `S3_Birthdate`, `S3_Gender`, `S3_Personal_Email`, `S3_Mobile_Phone`, `S3_Race`, `S3_Ethnicity`, `S3_Current_School`, `S3_Current_School_Not_Listed`, `S3_Other_High_School_1`, `S3_Other_High_School_2`, `S3_Other_High_School_3`, `S3_Other_High_School_4`, `Applying_for_Grade`, `Academic_Year_Applying_For`, `Graduation_Year`, `Student_Info_Date`, `is_step_complete`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'storage/application_profile/user-user-one-6760.pdf', 'User', 'One', 'One', 'Jr.', 'User One', '2022-11-09', 'Male', 'userone@gmail.com', '2563258756', 'Asian,Black/African American,White/Caucasian', '', 'Abbott Middle School', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-11-24 01:13:41', '2022-11-24 01:13:41');

-- --------------------------------------------------------

--
-- Table structure for table `student_statements`
--

CREATE TABLE `student_statements` (
  `id` bigint UNSIGNED NOT NULL,
  `Profile_ID` bigint UNSIGNED NOT NULL,
  `Application_ID` bigint UNSIGNED DEFAULT NULL,
  `S1_Why_did_you_decide_to_apply_to_SI` text,
  `S1_Greatest_Challenge` text,
  `S1_Religious_Activities_for_Growth` text,
  `S1_Favorite_and_most_difficult_subjects` text,
  `S2_Why_did_you_decide_to_apply_to_SI` text,
  `S2_Greatest_Challenge` text,
  `S2_Religious_Activities_for_Growth` text,
  `S2_Favorite_and_most_difficult_subjects` text,
  `S3_Why_did_you_decide_to_apply_to_SI` text,
  `S3_Greatest_Challenge` text,
  `S3_Religious_Activities_for_Growth` text,
  `S3_Favorite_and_most_difficult_subjects` text,
  `S1_A1_Activity_Name` text,
  `S1_A1_Number_of_Years` text,
  `S1_A1_Hours_Per_Week` text,
  `S1_A1_Info_about_activity` text,
  `S1_A2_Activity_Name` text,
  `S1_A2_Number_of_Years` text,
  `S1_A2_Hours_Per_Week` text,
  `S1_A2_Info_about_activity` text,
  `S1_A3_Activity_Name` text,
  `S1_A3_Number_of_Years` text,
  `S1_A3_Hours_Per_Week` text,
  `S1_A3_Info_about_activity` text,
  `S1_A4_Activity_Name` text,
  `S1_A4_Number_of_Years` text,
  `S1_A4_Hours_Per_Week` text,
  `S1_A4_Info_about_activity` text,
  `S2_A1_Activity_Name` text,
  `S2_A1_Number_of_Years` text,
  `S2_A1_Hours_Per_Week` text,
  `S2_A1_Info_about_activity` text,
  `S2_A2_Activity_Name` text,
  `S2_A2_Number_of_Years` text,
  `S2_A2_Hours_Per_Week` text,
  `S2_A2_Info_about_activity` text,
  `S2_A3_Activity_Name` text,
  `S2_A3_Number_of_Years` text,
  `S2_A3_Hours_Per_Week` text,
  `S2_A3_Info_about_activity` text,
  `S2_A4_Activity_Name` text,
  `S2_A4_Number_of_Years` text,
  `S2_A4_Hours_Per_Week` text,
  `S2_A4_Info_about_activity` text,
  `S3_A1_Activity_Name` text,
  `S3_A1_Number_of_Years` text,
  `S3_A1_Hours_Per_Week` text,
  `S3_A1_Info_about_activity` text,
  `S3_A2_Activity_Name` text,
  `S3_A2_Number_of_Years` text,
  `S3_A2_Hours_Per_Week` text,
  `S3_A2_Info_about_activity` text,
  `S3_A3_Activity_Name` text,
  `S3_A3_Number_of_Years` text,
  `S3_A3_Hours_Per_Week` text,
  `S3_A3_Info_about_activity` text,
  `S3_A4_Activity_Name` text,
  `S3_A4_Number_of_Years` text,
  `S3_A4_Hours_Per_Week` text,
  `S3_A4_Info_about_activity` text,
  `S1_Most_Passionate_Activity` text,
  `S1_Extracurricular_Activity_at_SI` text,
  `S2_Most_Passionate_Activity` text,
  `S2_Extracurricular_Activity_at_SI` text,
  `S3_Most_Passionate_Activity` text,
  `S3_Extracurricular_Activity_at_SI` text,
  `Student_Statement_Date` text,
  `is_step_complete` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_statements`
--

INSERT INTO `student_statements` (`id`, `Profile_ID`, `Application_ID`, `S1_Why_did_you_decide_to_apply_to_SI`, `S1_Greatest_Challenge`, `S1_Religious_Activities_for_Growth`, `S1_Favorite_and_most_difficult_subjects`, `S2_Why_did_you_decide_to_apply_to_SI`, `S2_Greatest_Challenge`, `S2_Religious_Activities_for_Growth`, `S2_Favorite_and_most_difficult_subjects`, `S3_Why_did_you_decide_to_apply_to_SI`, `S3_Greatest_Challenge`, `S3_Religious_Activities_for_Growth`, `S3_Favorite_and_most_difficult_subjects`, `S1_A1_Activity_Name`, `S1_A1_Number_of_Years`, `S1_A1_Hours_Per_Week`, `S1_A1_Info_about_activity`, `S1_A2_Activity_Name`, `S1_A2_Number_of_Years`, `S1_A2_Hours_Per_Week`, `S1_A2_Info_about_activity`, `S1_A3_Activity_Name`, `S1_A3_Number_of_Years`, `S1_A3_Hours_Per_Week`, `S1_A3_Info_about_activity`, `S1_A4_Activity_Name`, `S1_A4_Number_of_Years`, `S1_A4_Hours_Per_Week`, `S1_A4_Info_about_activity`, `S2_A1_Activity_Name`, `S2_A1_Number_of_Years`, `S2_A1_Hours_Per_Week`, `S2_A1_Info_about_activity`, `S2_A2_Activity_Name`, `S2_A2_Number_of_Years`, `S2_A2_Hours_Per_Week`, `S2_A2_Info_about_activity`, `S2_A3_Activity_Name`, `S2_A3_Number_of_Years`, `S2_A3_Hours_Per_Week`, `S2_A3_Info_about_activity`, `S2_A4_Activity_Name`, `S2_A4_Number_of_Years`, `S2_A4_Hours_Per_Week`, `S2_A4_Info_about_activity`, `S3_A1_Activity_Name`, `S3_A1_Number_of_Years`, `S3_A1_Hours_Per_Week`, `S3_A1_Info_about_activity`, `S3_A2_Activity_Name`, `S3_A2_Number_of_Years`, `S3_A2_Hours_Per_Week`, `S3_A2_Info_about_activity`, `S3_A3_Activity_Name`, `S3_A3_Number_of_Years`, `S3_A3_Hours_Per_Week`, `S3_A3_Info_about_activity`, `S3_A4_Activity_Name`, `S3_A4_Number_of_Years`, `S3_A4_Hours_Per_Week`, `S3_A4_Info_about_activity`, `S1_Most_Passionate_Activity`, `S1_Extracurricular_Activity_at_SI`, `S2_Most_Passionate_Activity`, `S2_Extracurricular_Activity_at_SI`, `S3_Most_Passionate_Activity`, `S3_Extracurricular_Activity_at_SI`, `Student_Statement_Date`, `is_step_complete`, `created_at`, `updated_at`) VALUES
(1, 1, 1, ' is your favorite subject in school and why? What subject do you find the most difficult and why', ' is your favorite subject in school and why? What subject do you find the most difficult and why', ' is your favorite subject in school and why? What subject do you find the most difficult and why', ' is your favorite subject in school and why? What subject do you find the most difficult and why', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'User One - Activity 1', '4', '3 - 5', 'ect two more extra-curricular activities that you might like to be involved in at SI.\nExplain why these activities appeal to you. Please make sure at least one of these activities ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ect two more extra-curricular activities that you might like to be involved in at SI.\nExplain why these activities appeal to you. Please make sure at least one of these activities ', 'ect two more extra-curricular activities that you might like to be involved in at SI.\nExplain why these activities appeal to you. Please make sure at least one of these activities ', NULL, NULL, NULL, NULL, NULL, 0, '2022-11-24 01:20:09', '2022-11-24 01:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `suffixes`
--

CREATE TABLE `suffixes` (
  `id` bigint UNSIGNED NOT NULL,
  `suffix_name` varchar(255) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '0:Inactive,1:Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `suffixes`
--

INSERT INTO `suffixes` (`id`, `suffix_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Jr.', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(2, 'II', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(3, 'III', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(4, 'IV', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56'),
(5, 'V', 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` longtext,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zipcode` int DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text,
  `two_factor_recovery_codes` text,
  `remember_token` varchar(100) DEFAULT NULL,
  `profile_photo_path` text,
  `covid_document` text,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `first_name`, `last_name`, `email`, `phone`, `address`, `city`, `state`, `zipcode`, `country`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `profile_photo_path`, `covid_document`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, NULL, NULL, 'Russell', 'Bartell', 'ioberbrunner@example.org', '(785) 421-3394', NULL, NULL, NULL, NULL, NULL, '2022-08-19 02:37:55', '$2y$10$QfJJx8i6q8wsDH4YafL7nOm4TP3bNPNk/jiSv1NADKiIDaIorFfqG', NULL, NULL, 'LjCWDWZz80', NULL, NULL, 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56', NULL),
(3, NULL, NULL, 'Moshe', 'Kreiger', 'schmitt.demond@example.org', '+15155580014', NULL, NULL, NULL, NULL, NULL, '2022-08-19 02:37:55', '$2y$10$s9TvUns/mN95r1dj2ox0wOy7cmLV/8W2JspJMsPHN8CxHhQhykAFe', NULL, NULL, 'CYEAfV9Z5d', NULL, NULL, 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56', NULL),
(4, NULL, NULL, 'Bernardo', 'Simonis', 'eden14@example.com', '+1.458.675.5626', NULL, NULL, NULL, NULL, NULL, '2022-08-19 02:37:55', '$2y$10$d3gJa0tlMA4nwPzndYAisOXWh03OkU3L6/7Jd6jFYZ7eQ0Li2Wn6C', NULL, NULL, 'dfQ2TFGErT', NULL, NULL, 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56', NULL),
(5, NULL, NULL, 'Gideon', 'Lang', 'robbie79@example.com', '1-380-800-8895', NULL, NULL, NULL, NULL, NULL, '2022-08-19 02:37:55', '$2y$10$W2E0L70F5tgh3Z8A4wW3p.TLeSYPVDQq0WvlttWhaaymMdBcpyuK.', NULL, NULL, 'VcdtELwTI8', NULL, NULL, 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56', NULL),
(6, NULL, NULL, 'Lacy', 'Jaskolski', 'ngislason@example.com', '(689) 814-9085', NULL, NULL, NULL, NULL, NULL, '2022-08-19 02:37:56', '$2y$10$FXbvtT7VAaT/KLalAF.gbuQjHuo3Da07t1JvCjcX8fISAVHHAp2cu', NULL, NULL, 'zIO4YtfHzn', NULL, NULL, 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56', NULL),
(7, NULL, NULL, 'Jules', 'Price', 'cameron.monahan@example.net', '580.214.7316', NULL, NULL, NULL, NULL, NULL, '2022-08-19 02:37:56', '$2y$10$pFsvylR2WfqbyR/wyhmcrul1qzS5CGkLzkn4xa6mTs8/0XLLYy.SW', NULL, NULL, '0XuwoNMxrE', NULL, NULL, 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56', NULL),
(8, NULL, NULL, 'Yvette', 'Herzog', 'rdenesik@example.net', '1-402-785-9616', NULL, NULL, NULL, NULL, NULL, '2022-08-19 02:37:56', '$2y$10$C3UYFPtqgskBe76VgY42WeCIdm/XoHd2QWqDY0B/FyU8.x/XHBa96', NULL, NULL, 't8b1pLd0xy', NULL, NULL, 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56', NULL),
(9, NULL, NULL, 'Juvenal', 'Bauch', 'mabel.lind@example.com', '909.693.2055', NULL, NULL, NULL, NULL, NULL, '2022-08-19 02:37:56', '$2y$10$cBvdT7B9oWoGiYHKr1j1uuqJGygMjTAPfYulLXl9vkxmcyk4ub3Ii', NULL, NULL, 'WN0r24x3vC', NULL, NULL, 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56', NULL),
(10, NULL, NULL, 'Cullen', 'Spinka', 'eharris@example.net', '1-973-856-4987', NULL, NULL, NULL, NULL, NULL, '2022-08-19 02:37:56', '$2y$10$CuVNr6gVsm62rXm2dIjKPugs.L8xIIr010b2QzyzA65mBwR3iRDBy', NULL, NULL, 'rQh4Y1frGN', NULL, NULL, 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56', NULL),
(11, NULL, NULL, 'Neil', 'Beahan', 'douglas.winnifred@example.com', '+1-850-993-2172', NULL, NULL, NULL, NULL, NULL, '2022-08-19 02:37:56', '$2y$10$sa102wAbXoh69T29FcCfC.CIPdPX2Y.WOqbtn4brkYBoz6eGbTG4i', NULL, NULL, 'UDScVdg3Rr', NULL, NULL, 1, '2022-08-19 02:37:56', '2022-08-19 02:37:56', NULL),
(12, NULL, NULL, 'Admin', 'Admin', 'admin@admin.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$b4ioQ2zdiIZrvrz/gaVxueIeDlryEUfqlkUHyZy8k7hfT8vfkkIyG', NULL, NULL, NULL, NULL, NULL, 1, '2022-11-24 00:46:16', '2022-11-24 00:46:16', NULL),
(13, NULL, NULL, 'Rey', 'Skiles', 'johanna.schamberger@example.com', '+1 (279) 262-9199', NULL, NULL, NULL, NULL, NULL, '2022-11-24 00:46:17', '$2y$10$qWW8ifywkZWnuMbdfp33CeTUhN3.qBWeeQi9pTtujcIrHud7neFmS', NULL, NULL, 'dVaoWyRgZA', NULL, NULL, 1, '2022-11-24 00:46:17', '2022-11-24 00:46:17', NULL),
(14, NULL, NULL, 'Tod', 'Gerlach', 'cjacobi@example.org', '+1-872-531-1110', NULL, NULL, NULL, NULL, NULL, '2022-11-24 00:46:17', '$2y$10$WN4mzCugYF/5r4IE6HA.i.5bvHuGP77BOC4qJTxNzAYi5s./5ooMW', NULL, NULL, 'rmYFHaOg4n', NULL, NULL, 1, '2022-11-24 00:46:18', '2022-11-24 00:46:18', NULL),
(15, NULL, NULL, 'Antonietta', 'Bode', 'ywehner@example.net', '+1-541-947-1832', NULL, NULL, NULL, NULL, NULL, '2022-11-24 00:46:17', '$2y$10$.RljWYDKkFpuwz.KEswgU.ZEFMC7uizCd2VH8yteNCxNQpB2jZzwu', NULL, NULL, 'lYeandUsfJ', NULL, NULL, 1, '2022-11-24 00:46:18', '2022-11-24 00:46:18', NULL),
(16, NULL, NULL, 'Ernie', 'Wyman', 'hoeger.malika@example.com', '331.284.4432', NULL, NULL, NULL, NULL, NULL, '2022-11-24 00:46:17', '$2y$10$RZ3WF69P09X6h57eC2jOSOwbme/PUVoDq7TR/rKUi0XdPrFGiQRBm', NULL, NULL, 'of23aGOtlT', NULL, NULL, 1, '2022-11-24 00:46:18', '2022-11-24 00:46:18', NULL),
(17, NULL, NULL, 'Kylee', 'Hills', 'dusty.medhurst@example.org', '951.475.1024', NULL, NULL, NULL, NULL, NULL, '2022-11-24 00:46:17', '$2y$10$2PvIM5bhq8dAp8OZo7EqrOjziIjENQy.KYJdY1Qx9FxMrgasAD3Ma', NULL, NULL, 'yGa9JgKFu1', NULL, NULL, 1, '2022-11-24 00:46:18', '2022-11-24 00:46:18', NULL),
(18, NULL, NULL, 'Gonzalo', 'Hahn', 'kling.willa@example.org', '661.813.7609', NULL, NULL, NULL, NULL, NULL, '2022-11-24 00:46:17', '$2y$10$2l0AGd/Sb.BKyXiP8Be96eGxkHdgZ34VcUPJmfmol0l7ttphYmMx2', NULL, NULL, 'DzHOOLNb8S', NULL, NULL, 1, '2022-11-24 00:46:18', '2022-11-24 00:46:18', NULL),
(19, NULL, NULL, 'Lorenza', 'Herman', 'cronin.daren@example.net', '1-929-951-6950', NULL, NULL, NULL, NULL, NULL, '2022-11-24 00:46:17', '$2y$10$XOPX4bdTwhG/471/dNW19eTu0duYVErOrcH.7akbYLxFNAPW6RQQS', NULL, NULL, 'o2rQ3dHRb2', NULL, NULL, 1, '2022-11-24 00:46:18', '2022-11-24 00:46:18', NULL),
(20, NULL, NULL, 'Lance', 'Wuckert', 'dorris.lind@example.com', '+19176525835', NULL, NULL, NULL, NULL, NULL, '2022-11-24 00:46:17', '$2y$10$3ByeYC3pDC2Le1QKvLDD1u2MJ9QtiD1z3HVrDpR8OYDtkU.JGskYG', NULL, NULL, 'GywZAFNL1c', NULL, NULL, 1, '2022-11-24 00:46:18', '2022-11-24 00:46:18', NULL),
(21, NULL, NULL, 'Nolan', 'Langworth', 'ngusikowski@example.com', '+1.636.391.2856', NULL, NULL, NULL, NULL, NULL, '2022-11-24 00:46:17', '$2y$10$Ml6Y84t2al7K.laQoQyaz.RE1wZSLmA6wCQLzGOXlpkeIjJKUrG8G', NULL, NULL, '2uCwSC0AwK', NULL, NULL, 1, '2022-11-24 00:46:18', '2022-11-24 00:46:18', NULL),
(22, NULL, NULL, 'Noemy', 'Ledner', 'qconsidine@example.com', '+1.680.633.7303', NULL, NULL, NULL, NULL, NULL, '2022-11-24 00:46:17', '$2y$10$tVBB9zsx0cEf7fkSR0wblOA7PJxHwZo3lJLF6oJ9fBe/tkQ6eJCTK', NULL, NULL, 'E3DFd4R7ts', NULL, NULL, 1, '2022-11-24 00:46:18', '2022-11-24 00:46:18', NULL),
(23, NULL, NULL, 'Admin', 'Toxsl', 'admin@toxsl.in', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$cDB0pe3dfGO7G4H3UFlHtumwKA1zrhK1vGFu7KHqPuR/hjdKesOMC', NULL, NULL, NULL, NULL, NULL, 1, '2022-11-24 01:28:00', '2022-11-24 01:28:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `writing_samples`
--

CREATE TABLE `writing_samples` (
  `id` bigint UNSIGNED NOT NULL,
  `Profile_ID` bigint UNSIGNED NOT NULL,
  `Application_ID` bigint UNSIGNED DEFAULT NULL,
  `S1_Writing_Sample` text,
  `S1_Writing_Sample_Submitted_By` varchar(255) DEFAULT NULL,
  `S1_Writing_Sample_Acknowledgment` varchar(255) DEFAULT NULL,
  `S2_Writing_Sample` text,
  `S2_Writing_Sample_Submitted_By` varchar(255) DEFAULT NULL,
  `S2_Writing_Sample_Acknowledgment` varchar(255) DEFAULT NULL,
  `S3_Writing_Sample` text,
  `S3_Writing_Sample_Submitted_By` varchar(255) DEFAULT NULL,
  `S3_Writing_Sample_Acknowledgment` varchar(255) DEFAULT NULL,
  `Writing_Sample_Date` varchar(255) DEFAULT NULL,
  `is_step_complete` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `writing_samples`
--

INSERT INTO `writing_samples` (`id`, `Profile_ID`, `Application_ID`, `S1_Writing_Sample`, `S1_Writing_Sample_Submitted_By`, `S1_Writing_Sample_Acknowledgment`, `S2_Writing_Sample`, `S2_Writing_Sample_Submitted_By`, `S2_Writing_Sample_Acknowledgment`, `S3_Writing_Sample`, `S3_Writing_Sample_Submitted_By`, `S3_Writing_Sample_Acknowledgment`, `Writing_Sample_Date`, `is_step_complete`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'lain how the obstacle impacted you and how you handled the situation (i.e., positive and/or negative attempts along the way or maybe how you\'re still working on it) .\n\nInclude what you have learned from the experience and how you have applied (or might apply) this t', 'User One', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2022-11-24 01:20:31', '2022-11-24 01:20:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_information`
--
ALTER TABLE `address_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_information_profile_id_foreign` (`Profile_ID`),
  ADD KEY `address_information_application_id_foreign` (`Application_ID`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`Application_ID`),
  ADD KEY `applications_profile_id_foreign` (`Profile_ID`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `identify_raciallies`
--
ALTER TABLE `identify_raciallies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `legacy_information`
--
ALTER TABLE `legacy_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `legacy_information_profile_id_foreign` (`Profile_ID`),
  ADD KEY `legacy_information_application_id_foreign` (`Application_ID`);

--
-- Indexes for table `living_situations`
--
ALTER TABLE `living_situations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marital_statuses`
--
ALTER TABLE `marital_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_profile_id_index` (`profile_id`),
  ADD KEY `notifications_notification_type_id_index` (`notification_type_id`);

--
-- Indexes for table `notification_types`
--
ALTER TABLE `notification_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent_information`
--
ALTER TABLE `parent_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_information_profile_id_foreign` (`Profile_ID`),
  ADD KEY `parent_information_application_id_foreign` (`Application_ID`);

--
-- Indexes for table `parent_statements`
--
ALTER TABLE `parent_statements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_statements_profile_id_foreign` (`Profile_ID`),
  ADD KEY `parent_statements_application_id_foreign` (`Application_ID`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_logs`
--
ALTER TABLE `payment_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_logs_user_id_foreign` (`user_id`),
  ADD KEY `payment_logs_application_id_foreign` (`application_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `profiles_email_unique` (`email`),
  ADD UNIQUE KEY `profiles_profile_id_unique` (`Profile_ID`);

--
-- Indexes for table `promocodes`
--
ALTER TABLE `promocodes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `promocodes_promo_code_unique` (`promo_code`);

--
-- Indexes for table `recommendations`
--
ALTER TABLE `recommendations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recommendations_profile_id_foreign` (`Profile_ID`);

--
-- Indexes for table `relationships`
--
ALTER TABLE `relationships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `release_authorizations`
--
ALTER TABLE `release_authorizations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `release_authorizations_profile_id_foreign` (`Profile_ID`),
  ADD KEY `release_authorizations_application_id_foreign` (`Application_ID`);

--
-- Indexes for table `religions`
--
ALTER TABLE `religions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `salutations`
--
ALTER TABLE `salutations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sibling_information`
--
ALTER TABLE `sibling_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sibling_information_profile_id_foreign` (`Profile_ID`),
  ADD KEY `sibling_information_application_id_foreign` (`Application_ID`);

--
-- Indexes for table `spiritualities`
--
ALTER TABLE `spiritualities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spiritual_and_community_information`
--
ALTER TABLE `spiritual_and_community_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spiritual_and_community_information_profile_id_foreign` (`Profile_ID`),
  ADD KEY `spiritual_and_community_information_application_id_foreign` (`Application_ID`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_information`
--
ALTER TABLE `student_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_information_profile_id_foreign` (`Profile_ID`),
  ADD KEY `student_information_application_id_foreign` (`Application_ID`);

--
-- Indexes for table `student_statements`
--
ALTER TABLE `student_statements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_statements_profile_id_foreign` (`Profile_ID`),
  ADD KEY `student_statements_application_id_foreign` (`Application_ID`);

--
-- Indexes for table `suffixes`
--
ALTER TABLE `suffixes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `writing_samples`
--
ALTER TABLE `writing_samples`
  ADD PRIMARY KEY (`id`),
  ADD KEY `writing_samples_profile_id_foreign` (`Profile_ID`),
  ADD KEY `writing_samples_application_id_foreign` (`Application_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_information`
--
ALTER TABLE `address_information`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `Application_ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `identify_raciallies`
--
ALTER TABLE `identify_raciallies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `legacy_information`
--
ALTER TABLE `legacy_information`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `living_situations`
--
ALTER TABLE `living_situations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `marital_statuses`
--
ALTER TABLE `marital_statuses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification_types`
--
ALTER TABLE `notification_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parent_information`
--
ALTER TABLE `parent_information`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parent_statements`
--
ALTER TABLE `parent_statements`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_logs`
--
ALTER TABLE `payment_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `promocodes`
--
ALTER TABLE `promocodes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recommendations`
--
ALTER TABLE `recommendations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `relationships`
--
ALTER TABLE `relationships`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `release_authorizations`
--
ALTER TABLE `release_authorizations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `religions`
--
ALTER TABLE `religions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salutations`
--
ALTER TABLE `salutations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sibling_information`
--
ALTER TABLE `sibling_information`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `spiritualities`
--
ALTER TABLE `spiritualities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spiritual_and_community_information`
--
ALTER TABLE `spiritual_and_community_information`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_information`
--
ALTER TABLE `student_information`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_statements`
--
ALTER TABLE `student_statements`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suffixes`
--
ALTER TABLE `suffixes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `writing_samples`
--
ALTER TABLE `writing_samples`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address_information`
--
ALTER TABLE `address_information`
  ADD CONSTRAINT `address_information_application_id_foreign` FOREIGN KEY (`Application_ID`) REFERENCES `applications` (`Application_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `address_information_profile_id_foreign` FOREIGN KEY (`Profile_ID`) REFERENCES `profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_profile_id_foreign` FOREIGN KEY (`Profile_ID`) REFERENCES `profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `legacy_information`
--
ALTER TABLE `legacy_information`
  ADD CONSTRAINT `legacy_information_application_id_foreign` FOREIGN KEY (`Application_ID`) REFERENCES `applications` (`Application_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `legacy_information_profile_id_foreign` FOREIGN KEY (`Profile_ID`) REFERENCES `profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `parent_information`
--
ALTER TABLE `parent_information`
  ADD CONSTRAINT `parent_information_application_id_foreign` FOREIGN KEY (`Application_ID`) REFERENCES `applications` (`Application_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `parent_information_profile_id_foreign` FOREIGN KEY (`Profile_ID`) REFERENCES `profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `parent_statements`
--
ALTER TABLE `parent_statements`
  ADD CONSTRAINT `parent_statements_application_id_foreign` FOREIGN KEY (`Application_ID`) REFERENCES `applications` (`Application_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `parent_statements_profile_id_foreign` FOREIGN KEY (`Profile_ID`) REFERENCES `profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment_logs`
--
ALTER TABLE `payment_logs`
  ADD CONSTRAINT `payment_logs_application_id_foreign` FOREIGN KEY (`application_id`) REFERENCES `applications` (`Application_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `payment_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `recommendations`
--
ALTER TABLE `recommendations`
  ADD CONSTRAINT `recommendations_profile_id_foreign` FOREIGN KEY (`Profile_ID`) REFERENCES `profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `release_authorizations`
--
ALTER TABLE `release_authorizations`
  ADD CONSTRAINT `release_authorizations_application_id_foreign` FOREIGN KEY (`Application_ID`) REFERENCES `applications` (`Application_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `release_authorizations_profile_id_foreign` FOREIGN KEY (`Profile_ID`) REFERENCES `profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sibling_information`
--
ALTER TABLE `sibling_information`
  ADD CONSTRAINT `sibling_information_application_id_foreign` FOREIGN KEY (`Application_ID`) REFERENCES `applications` (`Application_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `sibling_information_profile_id_foreign` FOREIGN KEY (`Profile_ID`) REFERENCES `profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `spiritual_and_community_information`
--
ALTER TABLE `spiritual_and_community_information`
  ADD CONSTRAINT `spiritual_and_community_information_application_id_foreign` FOREIGN KEY (`Application_ID`) REFERENCES `applications` (`Application_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `spiritual_and_community_information_profile_id_foreign` FOREIGN KEY (`Profile_ID`) REFERENCES `profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_information`
--
ALTER TABLE `student_information`
  ADD CONSTRAINT `student_information_application_id_foreign` FOREIGN KEY (`Application_ID`) REFERENCES `applications` (`Application_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_information_profile_id_foreign` FOREIGN KEY (`Profile_ID`) REFERENCES `profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_statements`
--
ALTER TABLE `student_statements`
  ADD CONSTRAINT `student_statements_application_id_foreign` FOREIGN KEY (`Application_ID`) REFERENCES `applications` (`Application_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_statements_profile_id_foreign` FOREIGN KEY (`Profile_ID`) REFERENCES `profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `writing_samples`
--
ALTER TABLE `writing_samples`
  ADD CONSTRAINT `writing_samples_application_id_foreign` FOREIGN KEY (`Application_ID`) REFERENCES `applications` (`Application_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `writing_samples_profile_id_foreign` FOREIGN KEY (`Profile_ID`) REFERENCES `profiles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

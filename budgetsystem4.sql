-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2018 at 07:56 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `budgetsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `approvals`
--

CREATE TABLE `approvals` (
  `id` int(10) UNSIGNED NOT NULL,
  `approving_user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `budget_id` int(10) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pending',
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pending',
  `forward_to` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `approvals`
--

INSERT INTO `approvals` (`id`, `approving_user_id`, `budget_id`, `category`, `status`, `comment`, `forward_to`, `created_at`, `updated_at`) VALUES
(47487, 6556793, 78503, 'Reviewed by:', 'Approved', 'OKAY', 'abdalla.mrisho@crdbbank.com', '2018-09-25 11:50:45', '2018-09-27 08:33:46'),
(47488, 6556794, 78503, 'Recommended for budget by:', 'Approved', 'n', 'ally.kichawelle@crdbbank.com', '2018-09-25 11:50:45', '2018-09-30 17:38:37'),
(47489, 6556795, 78503, 'Recommended for activity by:', 'Approved', 'Ahead', 'arthur.mosha@crdbbank.com', '2018-09-25 11:50:45', '2018-09-26 04:22:08'),
(47490, 6556796, 78503, 'Approved by:', 'Approved', 'Approved ok', '', '2018-09-25 11:50:45', '2018-09-26 04:23:04'),
(47491, 6556793, 78506, 'Reviewed by:', 'Approved', 'kkk', 'abdalla.mrisho@crdbbank.com', '2018-09-26 06:46:16', '2018-10-02 11:31:01'),
(47492, 6556794, 78506, 'Recommended for budget by:', 'Approved', 'Ok', 'binoy.swami@crdbbank.com', '2018-09-26 06:46:16', '2018-10-02 11:44:53'),
(47493, 0, 78506, 'Recommended for activity by:', 'Pending', 'Pending', NULL, '2018-09-26 06:46:16', NULL),
(47494, 0, 78506, 'Approved by:', 'Pending', 'Pending', NULL, '2018-09-26 06:46:16', NULL),
(47495, 6556793, 78505, 'Reviewed by:', 'Approved', 'Ck Proceed', 'abdalla.mrisho@crdbbank.com', '2018-09-27 08:16:36', '2018-09-27 09:02:15'),
(47496, 6556794, 78505, 'Recommended for budget by:', 'Approved', 'Go ahead', 'binoy.swami@crdbbank.com', '2018-09-27 08:16:36', '2018-09-27 09:03:32'),
(47497, 6556795, 78505, 'Recommended for activity by:', 'Approved', 'OK', 'arthur.mosha@crdbbank.com', '2018-09-27 08:16:36', '2018-09-27 09:04:20'),
(47498, 6556796, 78505, 'Approved by:', 'Approved', 'Okay', '', '2018-09-27 08:16:36', '2018-09-27 09:05:38');

-- --------------------------------------------------------

--
-- Table structure for table `approve_record`
--

CREATE TABLE `approve_record` (
  `record_id` int(10) UNSIGNED NOT NULL,
  `budget_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `balance_id` int(10) UNSIGNED NOT NULL,
  `budget_id` int(10) UNSIGNED NOT NULL,
  `total_cost` int(255) DEFAULT NULL,
  `actual_cost` int(11) NOT NULL DEFAULT '0',
  `resultant_balance` int(11) NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Created',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`balance_id`, `budget_id`, `total_cost`, `actual_cost`, `resultant_balance`, `status`, `created_at`, `updated_at`) VALUES
(4, 78503, 595000, 0, 0, 'Created', '2018-09-25 11:50:45', '2018-09-25 11:50:45'),
(5, 78504, 7855002, 0, 0, 'Created', '2018-09-26 06:46:16', '2018-09-27 06:37:21'),
(6, 78505, 673400, 500000, 173400, 'Created', '2018-09-27 08:16:36', '2018-09-27 10:12:29'),
(7, 78506, 160000, 0, 0, 'Created', '2018-10-01 05:03:48', '2018-10-02 05:42:52');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `branch_id` int(10) UNSIGNED NOT NULL,
  `b_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `b_region` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `b_zone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branch_id`, `b_name`, `b_region`, `b_zone`, `created_at`, `updated_at`) VALUES
(372838, 'Azikiwe', 'Dar es salaam', 'Eastern Zone', '2018-09-19 21:00:00', '2018-09-19 21:00:00'),
(372839, 'Mlimani City', 'Dar es salaam', 'Eastern Zone', '2018-09-19 21:00:00', '2018-09-19 21:00:00'),
(372840, 'Head Quarters', 'Dar es salaam', 'Eastern Zone', '2018-09-23 21:00:00', '2018-09-23 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

CREATE TABLE `budget` (
  `budget_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `month` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quarter` int(20) NOT NULL,
  `market_cost` int(11) NOT NULL,
  `travelling_cost` int(11) NOT NULL,
  `fuel_cost` int(11) NOT NULL,
  `postage_cost` int(11) NOT NULL,
  `fax_cost` int(255) NOT NULL,
  `budget_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `business_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expected_premium` int(11) NOT NULL,
  `carry_over_balance` int(11) NOT NULL,
  `first_approval` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `budget`
--

INSERT INTO `budget` (`budget_id`, `user_id`, `month`, `quarter`, `market_cost`, `travelling_cost`, `fuel_cost`, `postage_cost`, `fax_cost`, `budget_status`, `business_status`, `description`, `expected_premium`, `carry_over_balance`, `first_approval`, `created_at`, `updated_at`) VALUES
(78503, 6556798, 'October', 4, 500000, 50000, 30000, 10000, 5000, 'Approved', 'Settled', 'Meeting', 9000000, 15000, '6556793', '2018-09-25 11:50:45', '2018-09-27 05:44:54'),
(78504, 6556798, 'November', 4, 46000, 7600000, 60000, 76000, 73002, 'created *', 'Not settled', 'Bzness', 2000000, 15000, '6556793', '2018-09-26 06:41:27', '2018-09-27 06:37:21'),
(78505, 6556798, 'December', 1, 250000, 350000, 23400, 45000, 5000, 'Approved', 'Pushed Forward', 'Something serious', 300000000, 15000, '6556793', '2018-09-27 08:16:36', '2018-10-01 06:34:05'),
(78506, 6556798, 'December', 1, 40000, 50000, 30000, 20000, 20000, 'created *', 'Not settled', 'Business Meeting', 6000000, 173400, '6556793', '2018-10-01 05:03:47', '2018-10-02 05:42:52');

-- --------------------------------------------------------

--
-- Table structure for table `limits`
--

CREATE TABLE `limits` (
  `limits_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `market_cost` int(11) NOT NULL,
  `travelling_cost` int(11) NOT NULL,
  `fuel_cost` int(11) NOT NULL,
  `postage_cost` int(11) NOT NULL,
  `fax_cost` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `limits`
--

INSERT INTO `limits` (`limits_id`, `user_id`, `market_cost`, `travelling_cost`, `fuel_cost`, `postage_cost`, `fax_cost`, `created_at`, `updated_at`) VALUES
(664738, 6556798, 5000000, 40000000, 3000000, 2000000, 1000000, '2018-09-26 21:00:00', '2018-09-26 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2018_09_20_070430_create_branches_table', 1),
(14, '2018_09_20_132122_create_budget_table', 2),
(26, '2018_09_21_125459_create_approvals_table', 3),
(27, '2018_09_24_141853_create_balance_table', 4),
(29, '2018_09_25_140311_create_remarks_table', 5),
(30, '2018_09_27_141042_create_limits_table', 6),
(31, '2018_10_01_125917_create_updates_table', 7),
(32, '2018_10_01_144337_create_approve_record_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `remarks`
--

CREATE TABLE `remarks` (
  `id` int(10) UNSIGNED NOT NULL,
  `budget_id` int(10) UNSIGNED NOT NULL,
  `actual_cost` int(11) NOT NULL DEFAULT '0',
  `expected_action_date` date NOT NULL,
  `push_forward_date` date DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `final_remarks` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reviewer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Remark Submited',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `remarks`
--

INSERT INTO `remarks` (`id`, `budget_id`, `actual_cost`, `expected_action_date`, `push_forward_date`, `remarks`, `final_remarks`, `reason`, `reviewer`, `status`, `created_at`, `updated_at`) VALUES
(1, 78503, 590000, '2018-11-01', NULL, 'It will be implemented', 'Completed', NULL, '6556793', 'Business Settled', '2018-09-26 06:11:17', '2018-09-27 05:44:54'),
(4, 78505, 500000, '2018-10-17', '2018-11-15', 'Business went well.', NULL, 'Business partner requested for payment date extension', NULL, 'Remark Submited', '2018-09-27 10:12:29', '2018-10-01 06:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE `updates` (
  `updates_id` int(10) UNSIGNED NOT NULL,
  `budget_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `branch_id_` int(10) UNSIGNED NOT NULL,
  `status` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'created',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `title`, `branch_id_`, `status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(6556788, 'Mike Smith', 'msmith', 'mike@crd.com', 'Staff', 372838, 'created', '$2y$10$SPZ8uwcOR01YzuS4/4hfyegJXXV1HvQTlpJtOmTnJVzCDHPLTsQqu', 'VARXmB4ssDLLt7JVHWhh7etday4jYQS7VfPFu0ITrF5vBUGAN13yFla2W5wK', '2018-09-19 21:00:00', '2018-09-25 11:53:48'),
(6556791, 'Clement Hillary', 'chillary', 'admin@gmail.com', 'System Admin', 372838, 'created', '$2y$10$AJ9dhw5otA7hV1niv8sX9..DnuyPmWXd3RTO9yvtC4zg667MB6voK', 'yXSUWjSfeFs8zTYflFl4ZstyMJJxj4jcYx88UDvO3GohXPW7SAJwHMnFtLrr', '2018-09-20 09:34:06', '2018-09-21 03:43:14'),
(6556793, 'Ally Kichawelle', 'akichawelle', 'ally.kichawelle@crdbbank.com', 'PFA', 372840, 'created', '$2y$10$k4cXeTutrXuQZoVeQ6AIZet3RT.UkBWrY.Fefe.qM285k747LMln6', 'PXFNjHMuNddHQgsxg18y08WvRmA1SiBMSStP0MFxpQdqkuYRxq4r4dUUIoGU', '2018-09-24 05:59:23', '2018-10-02 11:35:16'),
(6556794, 'Abdallah Mrisho', 'amrisho', 'abdalla.mrisho@crdbbank.com', 'HFA', 372840, 'created', '$2y$10$HMZCGa2UAZj.pBfYueNZFOnrtz/4QPT1bDhjdGMinJ20f.GG.Sj5G', 'qu3lufgYYEo1FN44yzeMRNIql01Su94VlCPuo4WOQLlC5xHCKPpJEEvj0AfN', '2018-09-24 06:02:15', '2018-10-02 12:19:40'),
(6556795, 'Binoy Swamy', 'bswamy', 'binoy.swami@crdbbank.com', 'DGM', 372840, 'created', '$2y$10$HQk2v3rCJ01VIeITNyQLheAkum.Twc4YwgC57aVoMwKRaVjZBMPYq', 'a3Q5vMfuQ1nLUhBanygvcRtr1RSprKlodZmyvUpFdKW7yOAG5qGjorEI7nYV', '2018-09-24 06:03:35', '2018-09-27 09:04:24'),
(6556796, 'Arthur Mosha', 'amosha', 'arthur.mosha@crdbbank.com', 'GM', 372840, 'created', '$2y$10$FcH2abhl6L04u4DnGcVu/.j175rWV7kGLBIxfRHWt7aO4K8aWZMfe', 'Ku2mKlk4GOD1UdyplHSNXQoOVPykHzkx1jXjJDTyaj2Vz7lqzKU9Rf4mx1Zm', '2018-09-24 06:09:28', '2018-09-25 10:54:15'),
(6556798, 'Clement Mdoe', 'cmdoe', 'clement.mdoe@crdbbank.com', 'System Admin', 372840, 'created', '$2y$10$6jFTT7gh7N7eO.JQktcuAO4H2HFrVylPJHCCSJ7lhIbnOuUSsi83.', 'kpd4v2G0Hbb8Xskn88NvTE8lM3lwTCvtPGYZzVxlBUGXQMAcKdbHTcH17neg', '2018-09-24 06:13:01', '2018-10-02 04:42:38'),
(6556799, 'Rasuli Sadala', 'rsadala', 'rasuli.sadala@crdbbank.com', 'Claim Officer', 372840, 'created', '$2y$10$0BiP1zSy/G9E5x4mNdThEuO0xTKMbDNP0P93WQNDzNBvf3WCqAZ56', '9G4jTbItOq8sSds0MGGuYmSGe3ZB0yJ3g2TKcfRgpB7mKDfPwjjSizY9xIvX', '2018-09-26 03:06:28', '2018-10-02 09:00:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approvals`
--
ALTER TABLE `approvals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `approvals_approval_id_index` (`id`),
  ADD KEY `approvals_approving_user_id_index` (`approving_user_id`),
  ADD KEY `approvals_budget_id_index` (`budget_id`);

--
-- Indexes for table `approve_record`
--
ALTER TABLE `approve_record`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `approve_record_record_id_index` (`record_id`),
  ADD KEY `approve_record_budget_id_index` (`budget_id`),
  ADD KEY `approve_record_user_id_index` (`user_id`);

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`balance_id`),
  ADD KEY `balance_balance_id_index` (`balance_id`),
  ADD KEY `balance_budget_id_index` (`budget_id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`branch_id`),
  ADD UNIQUE KEY `branches_b_name_unique` (`b_name`),
  ADD KEY `branches_branch_id_index` (`branch_id`);

--
-- Indexes for table `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`budget_id`),
  ADD KEY `budget_budget_id_index` (`budget_id`),
  ADD KEY `budget_user_id_index` (`user_id`);

--
-- Indexes for table `limits`
--
ALTER TABLE `limits`
  ADD PRIMARY KEY (`limits_id`),
  ADD KEY `limits_limits_id_index` (`limits_id`),
  ADD KEY `limits_user_id_index` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `remarks`
--
ALTER TABLE `remarks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `remarks_id_index` (`id`),
  ADD KEY `remarks_budget_id_index` (`budget_id`);

--
-- Indexes for table `updates`
--
ALTER TABLE `updates`
  ADD PRIMARY KEY (`updates_id`),
  ADD KEY `updates_updates_id_index` (`updates_id`),
  ADD KEY `updates_budget_id_index` (`budget_id`),
  ADD KEY `updates_user_id_index` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_index` (`id`),
  ADD KEY `users_branch_id__index` (`branch_id_`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approvals`
--
ALTER TABLE `approvals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47499;
--
-- AUTO_INCREMENT for table `approve_record`
--
ALTER TABLE `approve_record`
  MODIFY `record_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `balance`
--
ALTER TABLE `balance`
  MODIFY `balance_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `branch_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=372841;
--
-- AUTO_INCREMENT for table `budget`
--
ALTER TABLE `budget`
  MODIFY `budget_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78507;
--
-- AUTO_INCREMENT for table `limits`
--
ALTER TABLE `limits`
  MODIFY `limits_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=664739;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `remarks`
--
ALTER TABLE `remarks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
  MODIFY `updates_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6556800;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `budget`
--
ALTER TABLE `budget`
  ADD CONSTRAINT `budget_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`branch_id_`) REFERENCES `branches` (`branch_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

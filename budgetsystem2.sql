-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2018 at 01:19 PM
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
  `approval_id` int(10) UNSIGNED NOT NULL,
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

INSERT INTO `approvals` (`approval_id`, `approving_user_id`, `budget_id`, `category`, `status`, `comment`, `forward_to`, `created_at`, `updated_at`) VALUES
(1, 0, 78498, 'Reviewed by:', 'Pending', 'Pending', '$2y$10$TL.ZgGtfdqhP35P.2Cuz8emdT5M/imMe133tpJFdNw0YczGmeZwje', '2018-09-24 06:42:33', '2018-09-24 06:42:33'),
(2, 0, 78498, 'Recommended for budget by:', 'Pending', 'Pending', '$2y$10$5CjntviN.Qt7lmQcTtguTev5o0rRpS53599M7GxCk5uWaimZhabWS', '2018-09-24 06:42:33', '2018-09-24 06:42:33'),
(3, 0, 78498, 'Recommended for activity by:', 'Pending', 'Pending', '$2y$10$F9he8bc99mVQV4hAx6Ptge5T395ge0ILnhSIeMi6qIKfDh7IgHPMC', '2018-09-24 06:42:33', '2018-09-24 06:42:33'),
(5, 0, 78499, 'Reviewed by:', 'Pending', 'Pending', '$2y$10$1udEIELl2Mi1jZRKBzs4ee3dJsdp1UJ7T6MXUqGb0briEZj11gQE.', '2018-09-24 11:42:27', '2018-09-24 11:42:27'),
(6, 0, 78499, 'Recommended for budget by:', 'Pending', 'Pending', '$2y$10$AlWO8FQovg2505aHpg/tpOPxAPeDbUmywYGtpAOvo6XlJZekY5qzC', '2018-09-24 11:42:27', '2018-09-24 11:42:27'),
(7, 0, 78499, 'Recommended for activity by:', 'Pending', 'Pending', '$2y$10$6FhifJ8uRVNWBsws6ChKk.WF/ljLUQDbPuQOLetxSrtEZDaZptIUW', '2018-09-24 11:42:27', '2018-09-24 11:42:27'),
(8, 0, 78499, 'Approved by:', 'Pending', 'Pending', '$2y$10$.nbjCMnGmGu8jq9QIpfyoe6EuIDWRzex3WEOJ3jWc/ANGxjccKnpq', '2018-09-24 11:42:27', '2018-09-24 11:42:27'),
(9, 0, 78500, 'Reviewed by:', 'Pending', 'Pending', '$2y$10$pF7x/Alobvyt2vh0VjtpG.HaiEEufWwvI48ddhAZOFBrR.29.oIQC', '2018-09-24 11:45:23', '2018-09-24 11:45:23'),
(10, 0, 78500, 'Recommended for budget by:', 'Pending', 'Pending', '$2y$10$vsEcg.auLknTcD7tqT0whO4HjtHWXD6uznt0.5ICUZqxCm7IONQn.', '2018-09-24 11:45:23', '2018-09-24 11:45:23'),
(11, 0, 78500, 'Recommended for activity by:', 'Pending', 'Pending', '$2y$10$u3FgtOGiOsBdFaZhhj0oLuP/XBvBHsckubNwePbpfVRLK/.IoIAey', '2018-09-24 11:45:24', '2018-09-24 11:45:24'),
(12, 0, 78500, 'Approved by:', 'Pending', 'Pending', '$2y$10$MFj/aJviAGaCmoFUI8q7HuOBTXBpqckuRXpEy/fNpWJG8PwDV4WzG', '2018-09-24 11:45:24', '2018-09-24 11:45:24'),
(47478, 0, 78498, 'Approved by:', 'Pending', 'Pending', '$2y$10$VqCqyjJ4POLAthI9401yLuiHvEQjje3MkwLMgDF/5j3yebax9sYu.', '2018-09-24 06:42:33', '2018-09-24 06:42:33'),
(47479, 0, 78501, 'Reviewed by:', 'Pending', 'Pending', '$2y$10$Hy1j0M6W9akYOQxdBU2Mju2vBcAzBKrDjhGY6Qm2t7X0u5k500.ba', '2018-09-25 03:13:22', '2018-09-25 03:13:22'),
(47480, 0, 78501, 'Recommended for budget by:', 'Pending', 'Pending', '$2y$10$0yXO0SWSSmtPk/2fmo9Z2udsKI5kvswRm3drHjL/dzg8NyWZgfPiq', '2018-09-25 03:13:23', '2018-09-25 03:13:23'),
(47481, 0, 78501, 'Recommended for activity by:', 'Pending', 'Pending', '$2y$10$vXsvDBrjMDYLvI/qm5irg.4IrzEqrZtrea2iLEVI7m/i2b0wszxNK', '2018-09-25 03:13:23', '2018-09-25 03:13:23'),
(47482, 0, 78501, 'Approved by:', 'Pending', 'Pending', '$2y$10$baqryfEkTjdiZU5NyfrnIeq/6L7Y6qwhSWETjcWvL9Du0I52bbKQ2', '2018-09-25 03:13:23', '2018-09-25 03:13:23');

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `balance_id` int(10) UNSIGNED NOT NULL,
  `budget_id` int(10) UNSIGNED NOT NULL,
  `total_cost` int(11) NOT NULL DEFAULT '0',
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
(1, 78500, 5289000, 0, 0, 'Created', '2018-09-24 11:45:24', '2018-09-24 11:45:24'),
(2, 78501, 148000, 0, 0, 'Created', '2018-09-25 03:13:23', '2018-09-25 03:13:23');

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

INSERT INTO `budget` (`budget_id`, `user_id`, `month`, `market_cost`, `travelling_cost`, `fuel_cost`, `postage_cost`, `fax_cost`, `budget_status`, `business_status`, `description`, `expected_premium`, `carry_over_balance`, `first_approval`, `created_at`, `updated_at`) VALUES
(78494, 6556791, 'March', 838383, 838383, 74747, 2211, 0, 'created', 'Not settled', 'ws', 123, 15000, 'pf.crdb.com', '2018-09-21 04:37:38', '2018-09-21 04:37:38'),
(78495, 6556791, 'May', 78000, 120000, 45000, 0, 0, 'created', 'Not settled', 'qw', 23000000, 15000, 'pf.crdb.com', '2018-09-21 04:44:37', '2018-09-21 04:44:37'),
(78497, 6556788, 'Septemebr', 25000, 120000, 30000, 10000, 5000, 'created', 'Not settled', 'To make sure all expired covers are renewed \r\n', 2000000, 15000, 'pf.crdb.com', '2018-09-24 03:35:06', '2018-09-24 03:35:06'),
(78498, 6556791, 'October', 78000, 120000, 30000, 10000, 3500, 'created', 'Not settled', 'meeting with clients and solicitation of business\r\n', 3500000, 15000, '6556793', '2018-09-24 06:42:33', '2018-09-24 06:42:33'),
(78499, 6556791, 'November', 5000000, 209000, 50000, 25000, 5000, 'created', 'Not settled', 'Meeting with client', 54500000, 15000, '6556793', '2018-09-24 11:42:27', '2018-09-24 11:42:27'),
(78500, 6556791, 'November', 5000000, 209000, 50000, 25000, 5000, 'created', 'Not settled', 'Meeting with client', 54500000, 15000, '6556793', '2018-09-24 11:45:23', '2018-09-24 11:45:23'),
(78501, 6556788, 'October', 59000, 34000, 20000, 10000, 25000, 'created', 'Not settled', 'Business meeting', 13500000, 15000, '6556793', '2018-09-25 03:13:22', '2018-09-25 03:13:22');

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
(27, '2018_09_24_141853_create_balance_table', 4);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `title`, `branch_id_`, `status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(6556788, 'Mike Smith', 'mike@crd.com', 'Staff', 372838, 'created', '$2y$10$SPZ8uwcOR01YzuS4/4hfyegJXXV1HvQTlpJtOmTnJVzCDHPLTsQqu', 'jqrga2QCAavcDKEeTVRDAGnbGwOcZh0Hposbv4g7kuwusZeM1UYRzOwsxve4', '2018-09-19 21:00:00', '2018-09-25 04:11:37'),
(6556791, 'Clement Hillary', 'admin@gmail.com', 'System Admin', 372838, 'created', '$2y$10$AJ9dhw5otA7hV1niv8sX9..DnuyPmWXd3RTO9yvtC4zg667MB6voK', 'yXSUWjSfeFs8zTYflFl4ZstyMJJxj4jcYx88UDvO3GohXPW7SAJwHMnFtLrr', '2018-09-20 09:34:06', '2018-09-21 03:43:14'),
(6556793, 'Ally Kichwele', 'ally.kichawelle@crdbbank.com', 'PFA', 372840, 'created', '$2y$10$k4cXeTutrXuQZoVeQ6AIZet3RT.UkBWrY.Fefe.qM285k747LMln6', NULL, '2018-09-24 05:59:23', '2018-09-24 05:59:23'),
(6556794, 'Abdallah Mrisho', 'abdalla.mrisho@crdbbank.com', 'HFA', 372840, 'created', '$2y$10$HMZCGa2UAZj.pBfYueNZFOnrtz/4QPT1bDhjdGMinJ20f.GG.Sj5G', NULL, '2018-09-24 06:02:15', '2018-09-24 06:02:15'),
(6556795, 'Binoy Swamy', 'binoy.swami@crdbbank.com', 'DGM', 372840, 'created', '$2y$10$HQk2v3rCJ01VIeITNyQLheAkum.Twc4YwgC57aVoMwKRaVjZBMPYq', NULL, '2018-09-24 06:03:35', '2018-09-24 06:03:35'),
(6556796, 'Arthur Mosha', 'arthur.mosha@crdbbank.com', 'GM', 372840, 'created', '$2y$10$FcH2abhl6L04u4DnGcVu/.j175rWV7kGLBIxfRHWt7aO4K8aWZMfe', NULL, '2018-09-24 06:09:28', '2018-09-24 06:09:28'),
(6556798, 'Clement Mdoe', 'clement.mdoe@crdbbank.com', 'System Admin', 372840, 'created', '$2y$10$6jFTT7gh7N7eO.JQktcuAO4H2HFrVylPJHCCSJ7lhIbnOuUSsi83.', NULL, '2018-09-24 06:13:01', '2018-09-24 06:13:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approvals`
--
ALTER TABLE `approvals`
  ADD PRIMARY KEY (`approval_id`),
  ADD KEY `approvals_approval_id_index` (`approval_id`),
  ADD KEY `approvals_approving_user_id_index` (`approving_user_id`),
  ADD KEY `approvals_budget_id_index` (`budget_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_index` (`id`),
  ADD KEY `users_branch_id__index` (`branch_id_`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approvals`
--
ALTER TABLE `approvals`
  MODIFY `approval_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47483;
--
-- AUTO_INCREMENT for table `balance`
--
ALTER TABLE `balance`
  MODIFY `balance_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `branch_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=372841;
--
-- AUTO_INCREMENT for table `budget`
--
ALTER TABLE `budget`
  MODIFY `budget_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78502;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6556799;
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

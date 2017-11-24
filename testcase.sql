-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2017 at 02:15 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testcase`
--

-- --------------------------------------------------------

--
-- Table structure for table `calls_log`
--

CREATE TABLE `calls_log` (
  `id` int(11) UNSIGNED NOT NULL,
  `operator_id` int(11) UNSIGNED DEFAULT NULL,
  `inbound_number` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `outbound_number` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `duration` int(11) DEFAULT NULL COMMENT 'duration will stored in seconds format',
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calls_log`
--

INSERT INTO `calls_log` (`id`, `operator_id`, `inbound_number`, `outbound_number`, `duration`, `created_date`, `updated_date`) VALUES
(1, NULL, '+2033508605', '+2033508605', 12, '2017-11-24 00:00:00', '2017-11-24 12:51:18'),
(2, NULL, '(203)3508605', '(203)3508605', 33, '0000-00-00 00:00:00', '2017-11-24 12:51:37');

-- --------------------------------------------------------

--
-- Table structure for table `operators`
--

CREATE TABLE `operators` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `calls_count_6` int(3) NOT NULL DEFAULT '0',
  `calls_count_24` int(3) NOT NULL DEFAULT '0',
  `calls_count_48` int(3) NOT NULL DEFAULT '0',
  `last_call_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operators`
--

INSERT INTO `operators` (`id`, `name`, `phone`, `calls_count_6`, `calls_count_24`, `calls_count_48`, `last_call_time`) VALUES
(1, 'Vahe Gharibyan', '203350-8605', 0, 0, 0, NULL),
(2, 'Test Case', '(203) 433-7410', 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `last_login`) VALUES
(1, 'tester', '$2y$10$nViTLPlLHJaMoYvV9rOvj.gwm7UllZJsGQqkPHol7X19opkP1HccK', '2017-11-23 20:59:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calls_log`
--
ALTER TABLE `calls_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `operator_id` (`operator_id`);

--
-- Indexes for table `operators`
--
ALTER TABLE `operators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calls_log`
--
ALTER TABLE `calls_log`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `operators`
--
ALTER TABLE `operators`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `calls_log`
--
ALTER TABLE `calls_log`
  ADD CONSTRAINT `fk_operator_id` FOREIGN KEY (`operator_id`) REFERENCES `operators` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

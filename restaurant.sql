-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2018 at 07:14 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `food_category`
--

CREATE TABLE `food_category` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_category`
--

INSERT INTO `food_category` (`id`, `name`, `restaurant_id`, `created_at`, `updated_at`) VALUES
(5, 'Drinks', 11, '2018-07-12 08:08:20', '2018-07-12 02:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `food_item`
--

CREATE TABLE `food_item` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `price` decimal(11,0) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `food_category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_item`
--

INSERT INTO `food_item` (`id`, `name`, `description`, `price`, `restaurant_id`, `food_category_id`, `created_at`, `updated_at`) VALUES
(12, 'Pepsi', '250ml', '20', 11, 5, '2018-07-12 02:07:22', '2018-07-12 02:07:22'),
(13, 'Coca Cola', '250ml', '25', 11, 5, '2018-07-12 02:07:42', '2018-07-12 02:07:42');

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

CREATE TABLE `holiday` (
  `id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `purpose` varchar(50) NOT NULL,
  `date` int(20) NOT NULL,
  `opening_time` varchar(10) DEFAULT NULL,
  `closing_time` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `holiday`
--

INSERT INTO `holiday` (`id`, `restaurant_id`, `purpose`, `date`, `opening_time`, `closing_time`, `created_at`, `updated_at`) VALUES
(3, 11, 'New Year 2019', 1546300800, '10:00:00', '14:00:00', '2018-07-16 01:54:00', '2018-07-16 01:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('mehedi.iitdu@gmail.com', '$2y$10$7yWP5FWFKsyrh9pt07xCtekKFQNKsnyRC7Uso3YIY7vmMz0Oo3pwa', '2018-05-17 00:44:32');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `photo`, `restaurant_id`, `created_at`, `updated_at`) VALUES
(6, 'uploads/zHfnXGN9E4Xi9u9v6wP1uAdGj0RJOPF33y5zZuhN.png', 11, '2018-07-10 05:12:54', '2018-07-10 05:12:54'),
(9, 'uploads/ES5iGSSAetxxkRK5hOd7D9jSRc7BuYLYR02MGW0o.png', 13, '2018-07-10 05:13:54', '2018-07-10 05:13:54');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `number_of_people` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservation_requests`
--

CREATE TABLE `reservation_requests` (
  `id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `number_of_people` int(11) DEFAULT NULL,
  `date` int(20) DEFAULT NULL,
  `time` varchar(10) DEFAULT NULL,
  `title` varchar(10) DEFAULT NULL,
  `company` varchar(30) DEFAULT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `note` varchar(100) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation_requests`
--

INSERT INTO `reservation_requests` (`id`, `restaurant_id`, `number_of_people`, `date`, `time`, `title`, `company`, `first_name`, `last_name`, `note`, `email`, `telephone`, `created_at`, `updated_at`) VALUES
(1, 11, 8, 1532304000, '14:00:00', 'MALE', 'CreativeItem', 'Mehedi', 'Hasan', NULL, 'mehedi@gmail.com', '01521433075', '2018-07-23 06:28:01', '2018-07-23 06:28:01'),
(26, 11, 8, 1532390400, '11:00:00', 'MALE', NULL, 'Santu', 'Roy', NULL, 'santu@gmail.com', '0949304930490', '2018-07-24 06:31:08', '2018-07-24 06:31:08');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `restaurant_type_id` int(5) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Pending',
  `name` varchar(50) NOT NULL,
  `city` varchar(20) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `latitude` text,
  `longitude` text,
  `description` varchar(2000) DEFAULT NULL,
  `amenities` varchar(500) DEFAULT NULL,
  `facebook` varchar(30) DEFAULT NULL,
  `website` varchar(30) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `twitter` varchar(50) DEFAULT NULL,
  `google_plus` varchar(50) DEFAULT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `code`, `restaurant_type_id`, `user_id`, `status`, `name`, `city`, `address`, `latitude`, `longitude`, `description`, `amenities`, `facebook`, `website`, `phone`, `email`, `twitter`, `google_plus`, `keywords`, `created_at`, `updated_at`) VALUES
(11, '3ebb77adccc0dd48461e', 1, 3, 'Active', 'Burger King', 'New York', 'Shahbagh, Dhaka, Bangladesh', '23.7397263', '90.39426100000003', NULL, '[\"Elevator in building\",\"Friendly workspace\",\"Instant Book\",\"Wireless Internet\",\"Free parking on street\",\"Smoking allowed\"]', NULL, NULL, '1642954885', 'mehedi.iitdu@gmail.com', NULL, NULL, NULL, '2018-07-24 12:35:46', '2018-07-11 05:55:32'),
(13, 'e41e32c46aebc9169355', 1, 3, 'Pending', 'Khabo koi', NULL, 'Housebuilding Counter, Dhaka, Bangladesh', '23.8721864', '90.4007891', NULL, '[\"Elevator in building\",\"Wireless Internet\",\"Free parking on street\",\"Smoking allowed\"]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-06-10 10:26:21', '2018-06-10 04:26:21');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_table`
--

CREATE TABLE `restaurant_table` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `capacity` int(5) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant_table`
--

INSERT INTO `restaurant_table` (`id`, `name`, `capacity`, `restaurant_id`, `created_at`, `updated_at`) VALUES
(4, 'Table 4', 5, 7, '2018-05-20 08:50:38', '2018-05-20 02:50:38'),
(5, 'Table 5', 5, 7, '2018-05-20 01:49:02', '2018-05-20 01:49:02'),
(6, 'Table 1', 5, 9, '2018-05-20 04:45:30', '2018-05-20 04:45:30'),
(7, 'Table 1', 20, 11, '2018-07-11 11:36:34', '2018-07-11 05:36:34'),
(13, 'Table 2', 15, 11, '2018-07-11 05:57:43', '2018-07-11 05:57:43');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_type`
--

CREATE TABLE `restaurant_type` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant_type`
--

INSERT INTO `restaurant_type` (`id`, `name`) VALUES
(1, 'Restaurant'),
(2, 'Bar');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `review_content` varchar(500) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `restaurant_id`, `user_id`, `date`, `review_content`, `rating`, `created_at`, `updated_at`) VALUES
(1, 11, 2, '2018-05-02', 'Good environment', 5, '2018-05-29 12:22:21', '2018-06-06 07:01:51'),
(2, 11, 4, '2018-05-02', 'Nice', 4, '2018-05-29 12:23:10', '2018-06-06 07:01:47'),
(3, 13, 3, '2018-06-05', 'Nice', 5, '2018-06-05 16:24:52', '2018-06-06 07:01:54');

-- --------------------------------------------------------

--
-- Table structure for table `time_config`
--

CREATE TABLE `time_config` (
  `id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `day` varchar(11) NOT NULL,
  `opening_time` varchar(10) NOT NULL,
  `closing_time` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_config`
--

INSERT INTO `time_config` (`id`, `restaurant_id`, `day`, `opening_time`, `closing_time`, `created_at`, `updated_at`) VALUES
(1, 11, 'Monday', '14:00:00', '18:00:00', '2018-07-23 10:54:19', '2018-07-16 01:35:33'),
(2, 11, 'Tuesday', '11:00:00', '23:00:00', '2018-06-12 08:38:04', '2018-06-12 02:38:04'),
(3, 11, 'Wednesday', '11:00:00', '22:00:00', '2018-06-12 08:36:06', '2018-06-12 02:36:06'),
(4, 11, 'Thursday', 'Closed', 'Closed', '2018-05-28 04:20:19', '2018-05-28 04:20:19'),
(5, 11, 'Friday', 'Closed', 'Closed', '2018-05-28 04:20:19', '2018-05-28 04:20:19'),
(6, 11, 'Saturday', 'Closed', 'Closed', '2018-05-28 04:20:19', '2018-05-28 04:20:19'),
(7, 11, 'Sunday', 'Closed', 'Closed', '2018-05-28 04:20:19', '2018-05-28 04:20:19'),
(8, 13, 'Monday', '01:00:00', '01:00:00', '2018-06-12 02:36:23', '2018-06-12 02:36:23'),
(9, 13, 'Tuesday', '02:00:00', '04:00:00', '2018-06-12 08:36:31', '2018-06-12 02:36:31'),
(10, 13, 'Wednesday', '05:00:00', '18:00:00', '2018-06-12 08:37:15', '2018-06-12 02:37:15'),
(11, 13, 'Thursday', '09:00:00', '22:00:00', '2018-06-12 08:37:30', '2018-06-12 02:37:30'),
(12, 13, 'Friday', 'Closed', 'Closed', '2018-06-12 02:36:24', '2018-06-12 02:36:24'),
(13, 13, 'Saturday', 'Closed', 'Closed', '2018-06-12 02:36:24', '2018-06-12 02:36:24'),
(14, 13, 'Sunday', 'Closed', 'Closed', '2018-06-12 02:36:24', '2018-06-12 02:36:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Customer',
  `photo` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `user_type`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mehedi', 'mehedi.iitdu@gmail.com', '', '$2y$10$a5GHoTTIax59HnNF12wmNuE17ftC0pzn6aL14rO0HjcTZuKv2x4Dy', 'SystemAdmin', NULL, 'LfiTtgXi04ZAIQZYcFdxZ7KgZD95jmbHJTfgPqvxYQNt4wyiAYTERtAk7GJP', '2018-05-17 00:35:10', '2018-05-17 00:35:10'),
(2, 'Rafi', 'rafi@gmail.com', '', '$2y$10$dkxF.nWD55xtvx5taVg.8u.yHWHT/TJJ/nkk/H.BpRtI4LCnomzrG', 'Admin', NULL, 'ClOod24M0kzobroKwE7dYc1qGLvLrC5klJTRT9WQflcjtuqlRiYcKBWoelV2', '2018-05-17 03:08:51', '2018-05-20 02:26:45'),
(3, 'Santu Roy', 'santu@gmail.com', '015214332075', '$2y$10$/I82HoC8bsI3L4zvozjhcOoCgak02JRvl6gVFzi6hwvRDvydj5Q9K', 'Admin', 'uploads/4gGsx34twguAYDuqQn0eLL1H2ZAu6zvYldLas5np.png', 'hPyPdsh050557A1sAVGnBq1aeg0M5pGQDDHp4p0a02KLl2zpsNml3B4eJuSZ', '2018-05-17 03:23:25', '2018-06-12 04:07:18'),
(4, 'tanvir', 'tanvir@gmail.com', '', '$2y$10$nGs80nnacH0FNv4vep7rzOtk.9Q9Wt2Fatk9EhshopSOwSm9yRjlO', 'Customer', NULL, '9UnK3pz8m5mK8KGw2uLtnhUcJguCYRjUwv5k0EA6m4a7tIydTamwEw8u9hk1', '2018-05-20 04:43:39', '2018-05-20 04:44:43'),
(5, 'Tanvir', 'tanvir.123@gmail.com', NULL, '$2y$10$YWSjqWhpRpL/SeDSnEy4eOEpaVlXBi13Avz5ePsipphDKuyURw/V6', 'Customer', NULL, 'jf68mfGw2lWyLfO1Pt5A1pkhxpobVLLSXr4wdJi0RYm7gG2pVOvwe6fLKskY', '2018-05-24 04:25:40', '2018-05-24 04:25:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food_category`
--
ALTER TABLE `food_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_id_fk3` (`restaurant_id`);

--
-- Indexes for table `food_item`
--
ALTER TABLE `food_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk13` (`restaurant_id`),
  ADD KEY `fk14` (`food_category_id`);

--
-- Indexes for table `holiday`
--
ALTER TABLE `holiday`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_id_fk_holiday` (`restaurant_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_id_fk_photos` (`restaurant_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation_requests`
--
ALTER TABLE `reservation_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_id_fk_book_request` (`restaurant_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_type_f` (`restaurant_type_id`),
  ADD KEY `user_id_fk1` (`user_id`);

--
-- Indexes for table `restaurant_table`
--
ALTER TABLE `restaurant_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant_type`
--
ALTER TABLE `restaurant_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `review_fk1` (`restaurant_id`),
  ADD KEY `review_fk2` (`user_id`);

--
-- Indexes for table `time_config`
--
ALTER TABLE `time_config`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_id_fk` (`restaurant_id`);

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
-- AUTO_INCREMENT for table `food_category`
--
ALTER TABLE `food_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `food_item`
--
ALTER TABLE `food_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `holiday`
--
ALTER TABLE `holiday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservation_requests`
--
ALTER TABLE `reservation_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `restaurant_table`
--
ALTER TABLE `restaurant_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `restaurant_type`
--
ALTER TABLE `restaurant_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `time_config`
--
ALTER TABLE `time_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food_category`
--
ALTER TABLE `food_category`
  ADD CONSTRAINT `restaurant_id_fk3` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `food_item`
--
ALTER TABLE `food_item`
  ADD CONSTRAINT `fk13` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk14` FOREIGN KEY (`food_category_id`) REFERENCES `food_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `holiday`
--
ALTER TABLE `holiday`
  ADD CONSTRAINT `restaurant_id_fk_holiday` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `restaurant_id_fk_photos` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation_requests`
--
ALTER TABLE `reservation_requests`
  ADD CONSTRAINT `restaurant_id_fk_book_request` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `user_id_fk1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_fk1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_fk2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `time_config`
--
ALTER TABLE `time_config`
  ADD CONSTRAINT `restaurant_id_fk` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

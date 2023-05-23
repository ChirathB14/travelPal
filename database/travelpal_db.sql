-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 11:45 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travelpal_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accomadation_service`
--

CREATE TABLE `accomadation_service` (
  `accomadation_Id` int(11) NOT NULL,
  `provider_name` varchar(100) NOT NULL,
  `provider_nic` varchar(45) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `service_type` varchar(45) NOT NULL,
  `image` varchar(45) DEFAULT NULL,
  `reg_number` varchar(45) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `food` tinyint(4) DEFAULT NULL,
  `a_c` tinyint(4) DEFAULT NULL,
  `price_per_room` float DEFAULT NULL,
  `status` int(11) NOT NULL,
  `service_no` varchar(45) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime(3) NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accomadation_service`
--

INSERT INTO `accomadation_service` (`accomadation_Id`, `provider_name`, `provider_nic`, `phone_number`, `email`, `service_type`, `image`, `reg_number`, `address`, `food`, `a_c`, `price_per_room`, `status`, `service_no`, `created_by`, `created_date`, `isActive`) VALUES
(3, 'Kamal Fernando', '20002553442141', 778945836, 'k@gmail.com', 'good', '645455c6ac303.png', 'reg-034', 'keselwtta', 1, 1, 15000, 2, '645455c6aca5664321', 14, '2023-05-05 03:03:02.000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_Id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `heading` varchar(100) DEFAULT NULL,
  `body` longtext DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime(3) DEFAULT NULL,
  `isActivie` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_Id`, `name`, `heading`, `body`, `image`, `created_by`, `created_date`, `isActivie`) VALUES
(1, 'Manger', 'The Mindful Life', 'Blog Description: Welcome to The Mindful Life, a blog dedicated to exploring the art of living in the present moment. Our goal is to help you cultivate mindfulness and develop a deeper understanding of yourself and the world around you. We believe that by practicing mindfulness, you can reduce stress, increase your overall well-being, and live a more meaningful and fulfilling life. Through our articles, resources, and community, we aim to inspire and empower you on your journey towards a more mindful life. Join us as we explore mindfulness practices, share personal stories and experiences, and discover the beauty of living in the present moment.', '644fca6d2486a.jpg', 13, '2023-05-01 16:19:25.000', 1),
(2, 'Manger', 'The Mindful Life', ' Welcome to The Mindful Life, a blog dedicated to exploring the art of living in the present moment. Our goal is to help you cultivate mindfulness and develop a deeper understanding of yourself and the world around you. We believe that by practicing mindfulness, you can reduce stress, increase your overall well-being, and live a more meaningful and fulfilling life. Through our articles, resources, and community, we aim to inspire and empower you on your journey towards a more mindful life. Join us as we explore mindfulness practices, share personal stories and experiences, and discover the beauty of living in the present moment.', '644fcf917bb15.jpg', 13, '2023-05-01 16:41:21.000', 1),
(3, 'Manger', 'The Daily Grind', 'Welcome to The Daily Grind, a blog dedicated to helping you navigate the ups and downs of everyday life. Our goal is to provide you with practical advice, inspiration, and motivation to help you achieve your goals and live your best life. We believe that success is not just about talent or luck, but about hard work, determination, and a willingness to learn and grow. Through our articles, resources, and community, we aim to help you develop the mindset and habits you need to succeed in your personal and professional life. Join us as we explore topics such as productivity, self-improvement, entrepreneurship, and more. Let\'s grind together towards our goals and dreams.', '644fd33bc877e.jpg', 13, '2023-05-01 16:56:59.000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `messege` longtext DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `created_date` timestamp(3) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `destination_Id` int(11) NOT NULL,
  `location` varchar(100) DEFAULT NULL,
  `experience` varchar(100) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_date` datetime(3) DEFAULT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 0,
  `destination` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`destination_Id`, `location`, `experience`, `created_by`, `created_date`, `isActive`, `destination`) VALUES
(1, 'Anuradhapura', 'Good', 13, '2023-04-23 09:32:02.000', 1, 'Ruwanvalisaya'),
(2, 'Anuradhapura', 'Good', 13, '2023-04-23 14:02:07.000', 1, 'Jethawanaramaya'),
(3, 'Anuradhapura', 'good', 13, '2023-04-23 14:03:33.000', 1, 'Samadhi Pilimaya'),
(4, 'Anuradhapura', 'good', 13, '2023-04-23 14:03:53.000', 1, 'Thuparamaya'),
(5, 'Anuradhapura', 'Good', 13, '2023-04-23 14:04:19.000', 1, 'kuttam pokuna'),
(6, 'Badulla', 'Good', 13, '2023-05-02 18:57:46.000', 1, 'Flower Garden'),
(7, 'Colombo', 'Exe', 13, '2023-05-02 20:27:40.000', 1, 'Colombo City Center');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `isActive`) VALUES
(1, 'Ampara', 1),
(2, 'Anuradhapura', 1),
(3, 'Badulla', 1),
(4, 'Batticaloa', 1),
(5, 'Colombo', 1),
(6, 'Galle', 1),
(7, 'Gampaha', 1),
(8, 'Hambantota', 1),
(9, 'Jaffna', 1),
(10, 'Kalutara', 1),
(11, 'Kandy', 1),
(12, 'Kegalle', 1),
(13, 'Kilinochchi', 1),
(14, 'Kurunegala', 1),
(15, 'Mannar', 1),
(16, 'Matale', 1),
(17, 'Matara', 1),
(18, 'Monaragala', 1),
(19, 'Mullaitivu', 1),
(20, 'Nuwara Eliya', 1),
(21, 'Polonnaruwa', 1),
(22, 'Puttalam', 1),
(23, 'Ratnapura', 1),
(24, 'Trincomalee', 1),
(25, 'Vavuniya', 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_plan`
--

CREATE TABLE `new_plan` (
  `plan_Id` int(11) NOT NULL,
  `season` varchar(45) NOT NULL,
  `location` varchar(45) NOT NULL,
  `no_of_day` int(11) NOT NULL,
  `destination` longtext NOT NULL,
  `type_of_package` varchar(45) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(100) NOT NULL,
  `by_manager` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `isActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `new_plan`
--

INSERT INTO `new_plan` (`plan_Id`, `season`, `location`, `no_of_day`, `destination`, `type_of_package`, `price`, `image`, `by_manager`, `created_by`, `created_date`, `isActive`) VALUES
(8, 'New Year', 'Anuradhapura', 10, 'a:3:{i:0;s:13:\"Ruwanvalisaya\";i:1;s:15:\"Jethawanaramaya\";i:2;s:16:\"Samadhi Pilimaya\";}', 'Luxury', 122, '64453bd822766.jpg', 1, 13, '2023-04-23', 1),
(9, 'New Year', 'Anuradhapura', 10, 'a:3:{i:0;s:13:\"Ruwanvalisaya\";i:1;s:15:\"Jethawanaramaya\";i:2;s:16:\"Samadhi Pilimaya\";}', 'Family', 500000, '6446cf8979716.jpg', 1, 13, '2023-04-24', 1),
(10, 'New Year', 'Anuradhapura', 10, 'a:2:{i:0;s:15:\"Jethawanaramaya\";i:1;s:11:\"Thuparamaya\";}', 'Budget', 20000, '6446cf9f051d0.png', 1, 13, '2023-04-24', 1),
(11, 'New Year', 'Anuradhapura', 2, 'a:2:{i:0;s:15:\"Jethawanaramaya\";i:1;s:16:\"Samadhi Pilimaya\";}', 'Luxury', 10000, '6446cfc9c5f9e.png', 1, 13, '2023-04-24', 1),
(12, 'Christmas', 'Anuradhapura', 10, 'a:4:{i:0;s:13:\"Ruwanvalisaya\";i:1;s:15:\"Jethawanaramaya\";i:2;s:16:\"Samadhi Pilimaya\";i:3;s:11:\"Thuparamaya\";}', 'Luxury', 20, '6451413bd83b2.png', 1, 13, '2023-05-02', 1),
(13, 'New Year', 'Colombo', 10, 'a:1:{i:0;s:19:\"Colombo City Center\";}', 'Luxury', 6, '6451563131fc6.png', 1, 13, '2023-05-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_Id` int(11) NOT NULL,
  `card_number` varchar(100) NOT NULL,
  `exp_date` varchar(45) NOT NULL,
  `cvv` int(11) NOT NULL,
  `amount` float NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` timestamp(3) NOT NULL DEFAULT current_timestamp(3) ON UPDATE current_timestamp(3),
  `isActive` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_Id`, `card_number`, `exp_date`, `cvv`, `amount`, `created_by`, `created_date`, `isActive`) VALUES
(1, '123412341233123', '11/22', 123, 42354, 14, '2023-05-05 02:38:01.000', 1),
(2, '123412341233123', '11/22', 123, 32476, 13, '2023-05-05 05:56:46.000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `plan_types`
--

CREATE TABLE `plan_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(45) DEFAULT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plan_types`
--

INSERT INTO `plan_types` (`id`, `name`, `image`, `isActive`) VALUES
(1, 'Luxury', 'luxery.jpg', 1),
(2, 'Family', 'family.jpg', 1),
(3, 'Budget', 'budget.jpg', 1),
(4, 'Honeymoon', 'couple.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `season`
--

CREATE TABLE `season` (
  `season_Id` int(11) NOT NULL,
  `season_name` varchar(45) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime(3) DEFAULT NULL,
  `isActive` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `season`
--

INSERT INTO `season` (`season_Id`, `season_name`, `created_by`, `created_date`, `isActive`) VALUES
(1, 'New Year', 1, NULL, 1),
(2, 'Christmas', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tour_guide`
--

CREATE TABLE `tour_guide` (
  `guide_Id` int(11) NOT NULL,
  `provider_name` varchar(100) NOT NULL,
  `provider_nic` varchar(45) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `service_type` varchar(45) NOT NULL,
  `image` varchar(45) NOT NULL,
  `reg_number` varchar(45) DEFAULT NULL,
  `experience` varchar(45) DEFAULT NULL,
  `price_per_day` float DEFAULT NULL,
  `languages` varchar(45) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `service_no` varchar(45) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime(3) NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 1,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tour_guide`
--

INSERT INTO `tour_guide` (`guide_Id`, `provider_name`, `provider_nic`, `phone_number`, `email`, `service_type`, `image`, `reg_number`, `experience`, `price_per_day`, `languages`, `status`, `service_no`, `created_by`, `created_date`, `isActive`, `address`) VALUES
(2, 'Kamal Fernando', '12343235', 435435345, 'chirathb14@gmail.com', 'test', '645456cc20497.png', 'test', 'test', 15000, 'test', 2, '645456cc2484511495', 14, '2023-05-05 03:07:24.000', 1, 'ANURADHAPURA');

-- --------------------------------------------------------

--
-- Table structure for table `unavailability`
--

CREATE TABLE `unavailability` (
  `unavailability_Id` int(11) NOT NULL,
  `service_ref` varchar(100) DEFAULT NULL,
  `service_type` varchar(100) DEFAULT NULL,
  `start_date` timestamp(3) NULL DEFAULT NULL,
  `end_date` timestamp(3) NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` timestamp(3) NULL DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unavailability`
--

INSERT INTO `unavailability` (`unavailability_Id`, `service_ref`, `service_type`, `start_date`, `end_date`, `created_by`, `created_date`, `isActive`) VALUES
(1, 'Array', 'Vehicle', '2023-05-12 22:14:29.000', '2023-05-13 22:14:29.000', 14, '2023-05-04 22:14:29.000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_Id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `user_type` int(11) DEFAULT NULL,
  `is_accommodation` tinyint(1) DEFAULT NULL,
  `is_vehicle_provider` tinyint(1) DEFAULT NULL,
  `is_guide` tinyint(1) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `salt` varchar(100) DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL,
  `created_date` timestamp(3) NOT NULL DEFAULT current_timestamp(3),
  `otp` varchar(45) DEFAULT NULL,
  `telephone` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_Id`, `first_name`, `last_name`, `address`, `email`, `user_type`, `is_accommodation`, `is_vehicle_provider`, `is_guide`, `image`, `password`, `salt`, `isActive`, `created_date`, `otp`, `telephone`) VALUES
(13, 'Manger', 'one dd', 'keselwatddta', '12345@gmail.com', 2, NULL, NULL, NULL, NULL, '$2y$10$tajlWJvyriD8DYyVoUsQFeGnpuFqz6tQS8QGOalITVutzQNgeOQ/q', NULL, 1, '2023-04-20 16:43:22.000', NULL, ''),
(14, 'Kamal', 'Fernando', 'Moratuwa', 'chirathb14@gmail.com', 4, 1, 1, 1, NULL, '$2y$10$tajlWJvyriD8DYyVoUsQFeGnpuFqz6tQS8QGOalITVutzQNgeOQ/q', NULL, 1, '2023-04-22 03:39:16.000', NULL, ''),
(15, 'Bimal', 'Shanaka', 'keselwatta bb', 'chirathb@gmail.com', 3, NULL, NULL, NULL, NULL, '$2y$10$jYNHfGn0hOqe19pD51aoT.HhohnYd0Q2B5IBlutHbZ7nMaYBHBCVG', NULL, 1, '2023-04-22 13:30:28.000', NULL, ''),
(16, 'Admin', 'John', 'Colombo', 'admin@gmail.com', 1, NULL, NULL, NULL, NULL, '$2y$10$tajlWJvyriD8DYyVoUsQFeGnpuFqz6tQS8QGOalITVutzQNgeOQ/q', NULL, 1, '2023-04-22 13:32:39.000', NULL, ''),
(17, 'Imal', 'Shanaka', 'keselwatta ss', 'imal@gmail.com', 2, NULL, NULL, NULL, NULL, '$2y$10$tajlWJvyriD8DYyVoUsQFeGnpuFqz6tQS8QGOalITVutzQNgeOQ/q', NULL, 1, '2023-04-22 13:34:08.000', NULL, ''),
(18, 'Test', 'Tourist', 'aaa', 'tour@gmail.com', 3, NULL, NULL, NULL, NULL, '$2y$10$tajlWJvyriD8DYyVoUsQFeGnpuFqz6tQS8QGOalITVutzQNgeOQ/q', NULL, 1, '2023-05-18 18:35:34.000', NULL, ''),
(24, 'Chirath', 'Bandara', 'Colombo', 'chirathb1@gmail.com', 2, NULL, NULL, NULL, NULL, '$2y$10$vSw9jrVBJK8nOFFS3j2yve9Y8CzoJ7KBQJ7YKJngcWwqS3DFBTYU.', NULL, 1, '2023-05-22 16:30:24.000', NULL, '0712345678');

-- --------------------------------------------------------

--
-- Table structure for table `user_tours`
--

CREATE TABLE `user_tours` (
  `user_tours_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL DEFAULT 0,
  `start_date` date DEFAULT NULL,
  `no_of_tourist` int(11) DEFAULT NULL,
  `accomadation_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `guide_id` int(11) DEFAULT NULL,
  `final_price` float DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `common_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_service`
--

CREATE TABLE `vehicle_service` (
  `vehicle_Id` int(11) NOT NULL,
  `provider_name` varchar(100) NOT NULL,
  `provider_nic` varchar(45) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `service_type` varchar(45) NOT NULL,
  `image` varchar(45) NOT NULL,
  `vehicle_num` varchar(45) DEFAULT NULL,
  `vehicle_type` varchar(45) DEFAULT NULL,
  `price_per_km` float DEFAULT NULL,
  `fuel_type` varchar(45) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `service_no` varchar(45) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime(3) NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 1,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_service`
--

INSERT INTO `vehicle_service` (`vehicle_Id`, `provider_name`, `provider_nic`, `phone_number`, `email`, `service_type`, `image`, `vehicle_num`, `vehicle_type`, `price_per_km`, `fuel_type`, `status`, `service_no`, `created_by`, `created_date`, `isActive`, `address`) VALUES
(3, 'Kamal Fernando', '123123213', 213213131, 'k@gmail.com', '', '645456a442cbc.png', 'test', 'test', 2354, '342', 2, '645456a442cac43718', 14, '2023-05-05 03:06:44.000', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accomadation_service`
--
ALTER TABLE `accomadation_service`
  ADD PRIMARY KEY (`accomadation_Id`),
  ADD UNIQUE KEY `accomadation_Id_UNIQUE` (`accomadation_Id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_Id`),
  ADD UNIQUE KEY `blog_Id_UNIQUE` (`blog_Id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`),
  ADD UNIQUE KEY `contact_id_UNIQUE` (`contact_id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`destination_Id`),
  ADD UNIQUE KEY `destination_Id_UNIQUE` (`destination_Id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_plan`
--
ALTER TABLE `new_plan`
  ADD PRIMARY KEY (`plan_Id`),
  ADD UNIQUE KEY `idnewPlan_UNIQUE` (`plan_Id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_Id`),
  ADD UNIQUE KEY `payment_Id_UNIQUE` (`payment_Id`);

--
-- Indexes for table `plan_types`
--
ALTER TABLE `plan_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`season_Id`),
  ADD UNIQUE KEY `season_Id_UNIQUE` (`season_Id`);

--
-- Indexes for table `tour_guide`
--
ALTER TABLE `tour_guide`
  ADD PRIMARY KEY (`guide_Id`),
  ADD UNIQUE KEY `guide_Id_UNIQUE` (`guide_Id`);

--
-- Indexes for table `unavailability`
--
ALTER TABLE `unavailability`
  ADD PRIMARY KEY (`unavailability_Id`),
  ADD UNIQUE KEY `unavailability_Id_UNIQUE` (`unavailability_Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_Id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `user_tours`
--
ALTER TABLE `user_tours`
  ADD PRIMARY KEY (`user_tours_id`),
  ADD UNIQUE KEY `iuser_tours_id_UNIQUE` (`user_tours_id`);

--
-- Indexes for table `vehicle_service`
--
ALTER TABLE `vehicle_service`
  ADD PRIMARY KEY (`vehicle_Id`),
  ADD UNIQUE KEY `vehicle_Id_UNIQUE` (`vehicle_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accomadation_service`
--
ALTER TABLE `accomadation_service`
  MODIFY `accomadation_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `destination_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `new_plan`
--
ALTER TABLE `new_plan`
  MODIFY `plan_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `season`
--
ALTER TABLE `season`
  MODIFY `season_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tour_guide`
--
ALTER TABLE `tour_guide`
  MODIFY `guide_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `unavailability`
--
ALTER TABLE `unavailability`
  MODIFY `unavailability_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_tours`
--
ALTER TABLE `user_tours`
  MODIFY `user_tours_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `vehicle_service`
--
ALTER TABLE `vehicle_service`
  MODIFY `vehicle_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

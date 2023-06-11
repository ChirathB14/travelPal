-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 10:22 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
CREATE DATABASE IF NOT EXISTS `travelpal_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `travelpal_db`;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accomadation_service`
--

INSERT INTO `accomadation_service` (`accomadation_Id`, `provider_name`, `provider_nic`, `phone_number`, `email`, `service_type`, `image`, `reg_number`, `address`, `food`, `a_c`, `price_per_room`, `status`, `service_no`, `created_by`, `created_date`, `isActive`) VALUES
(3, 'Kamal Fernando', '20002553442141', 778945836, 'k@gmail.com', 'good', '645455c6ac303.png', 'reg-034', 'keselwtta', 1, 1, 15000, 2, '645455c6aca5664321', 14, '2023-05-05 03:03:02.000', 1),
(4, 'Kamal Fernando', '200084401783', 779954454, 'k@gmail.com', 'Accommodation', '6458c58c327b0.png', 'KP200', '5, Park Lane, Kandy', 1, 1, 10000, 2, '6458c58c3273887417', 14, '2023-05-08 11:49:00.000', 1),
(5, 'Kamal Fernando', '200092303972', 775737364, 'k@gmail.com', '', '6461ca0010a4e.png', 'reg-234', '5, Park Lane, Colombo', 0, 1, 20000, 1, '6461ca1a3821655171', 14, '2023-05-15 07:58:24.000', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `name`, `messege`, `email`, `created_date`) VALUES
(1, 'Naz', 'Hello', 'naz11@gmail.com', '2023-05-19 05:12:59.000');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(7, 'Colombo', 'Exe', 13, '2023-05-02 20:27:40.000', 1, 'Colombo City Center'),
(8, 'Nuwara Eliya', 'Good', 17, '2023-05-24 06:32:26.000', 1, 'Gregory Lake'),
(9, 'Galle', 'Good', 17, '2023-05-27 01:46:25.000', 1, 'Galle fort | Beach'),
(10, 'Jaffna', 'Good', 17, '2023-05-27 01:58:43.000', 1, 'Nallur Kandaswamy Temple | Jaffna fort | Library'),
(11, 'Kandy', 'Good', 17, '2023-05-27 02:06:47.000', 1, 'Sri Dalada Maligava |  Peradeniya Garden'),
(12, 'Badulla', 'Good', 17, '2023-05-27 02:11:02.000', 1, 'Dunhinda Falls');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `created_date` datetime(3) NOT NULL,
  `isActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_plan`
--

INSERT INTO `new_plan` (`plan_Id`, `season`, `location`, `no_of_day`, `destination`, `type_of_package`, `price`, `image`, `by_manager`, `created_by`, `created_date`, `isActive`) VALUES
(17, '', 'Colombo', 2, 'a:1:{i:0;s:19:\"Colombo City Center\";}', 'Family', 0, 'None', 0, 17, '2023-05-23 06:24:04.000', 1),
(18, '', 'Colombo', 3, 'a:1:{i:0;s:19:\"Colombo City Center\";}', 'Family', 0, 'None', 0, 15, '2023-05-23 07:12:23.000', 1),
(19, '', 'Colombo', 2, 'a:1:{i:0;s:19:\"Colombo City Center\";}', 'Family', 0, 'None', 0, 15, '2023-05-23 07:50:41.000', 1),
(20, '', 'Colombo', 2, 'a:1:{i:0;s:19:\"Colombo City Center\";}', 'Luxury', 0, 'None', 0, 18, '2023-05-23 08:20:42.000', 1),
(21, '', 'Anuradhapura', 3, 'a:1:{i:0;s:13:\"Ruwanvalisaya\";}', 'Budget', 0, 'None', 0, 18, '2023-05-23 09:14:53.000', 1),
(22, 'New Year', 'Nuwara Eliya', 1, 'a:1:{i:0;s:12:\"Gregory Lake\";}', 'Budget', 0, '646d939eefa16.jpg', 1, 17, '2023-05-24 00:00:00.000', 1),
(23, 'New Year', 'Galle', 1, 'a:1:{i:0;s:18:\"Galle fort | Beach\";}', 'Family', 0, '647145739b09d.jpg', 1, 17, '2023-05-27 00:00:00.000', 1),
(24, 'New Year', 'Jaffna', 4, 'a:1:{i:0;s:48:\"Nallur Kandaswamy Temple | Jaffna fort | Library\";}', 'Family', 0, '647147de18965.png', 1, 17, '2023-05-27 00:00:00.000', 1),
(25, 'New Year', 'Anuradhapura', 4, 'a:2:{i:0;s:13:\"Ruwanvalisaya\";i:1;s:15:\"Jethawanaramaya\";}', 'Family', 0, '6471486245106.jpg', 1, 17, '2023-05-27 00:00:00.000', 1),
(26, 'Christmas', 'Anuradhapura', 4, 'a:2:{i:0;s:13:\"Ruwanvalisaya\";i:1;s:15:\"Jethawanaramaya\";}', 'Family', 0, '647148a08968c.jpg', 1, 17, '2023-05-27 00:00:00.000', 1),
(27, 'Christmas', 'Colombo', 1, 'a:1:{i:0;s:19:\"Colombo City Center\";}', 'Family', 0, '647148cc6fb5b.jpg', 1, 17, '2023-05-27 00:00:00.000', 1),
(28, 'Christmas', 'Galle', 2, 'a:1:{i:0;s:18:\"Galle fort | Beach\";}', 'Family', 0, '647148e280ab0.jpg', 1, 17, '2023-05-27 00:00:00.000', 1),
(29, 'New Year', 'Anuradhapura', 3, 'a:2:{i:0;s:13:\"Ruwanvalisaya\";i:1;s:15:\"Jethawanaramaya\";}', 'Luxury', 0, '647149603164b.jpg', 1, 17, '2023-05-27 00:00:00.000', 1),
(30, 'New Year', 'Kandy', 1, 'a:1:{i:0;s:40:\"Sri Dalada Maligava |  Peradeniya Garden\";}', 'Luxury', 0, '647149b1ad27e.jpg', 1, 17, '2023-05-27 00:00:00.000', 1),
(31, 'New Year', 'Colombo', 1, 'a:1:{i:0;s:19:\"Colombo City Center\";}', 'Luxury', 0, '647149cb5029c.jpg', 1, 17, '2023-05-27 00:00:00.000', 1),
(32, 'New Year', 'Anuradhapura', 1, 'a:1:{i:0;s:13:\"Ruwanvalisaya\";}', 'Budget', 0, '64714a171d779.jpeg', 1, 17, '2023-05-27 00:00:00.000', 1),
(33, 'New Year', 'Jaffna', 5, 'a:1:{i:0;s:48:\"Nallur Kandaswamy Temple | Jaffna fort | Library\";}', 'Budget', 0, '64714a320fbb6.png', 1, 17, '2023-05-27 00:00:00.000', 1),
(34, 'New Year', 'Nuwara Eliya', 2, 'a:1:{i:0;s:12:\"Gregory Lake\";}', 'Honeymoon', 0, '64714a681d5e6.jpg', 1, 17, '2023-05-27 00:00:00.000', 1),
(35, 'New Year', 'Badulla', 2, 'a:1:{i:0;s:14:\"Dunhinda Falls\";}', 'Honeymoon', 0, '64714b0858191.jpg', 1, 17, '2023-05-27 00:00:00.000', 1),
(36, 'Christmas', 'Anuradhapura', 1, 'a:1:{i:0;s:13:\"Ruwanvalisaya\";}', 'Luxury', 0, '64714b9a62894.jpeg', 1, 17, '2023-05-27 00:00:00.000', 1),
(37, 'Christmas', 'Kandy', 1, 'a:1:{i:0;s:40:\"Sri Dalada Maligava |  Peradeniya Garden\";}', 'Luxury', 0, '64714bb5bd7c0.jpg', 1, 17, '2023-05-27 00:00:00.000', 1),
(38, 'Christmas', 'Nuwara Eliya', 2, 'a:1:{i:0;s:12:\"Gregory Lake\";}', 'Luxury', 0, '64714bd4d4b91.jpg', 1, 17, '2023-05-27 00:00:00.000', 1),
(39, 'Christmas', 'Anuradhapura', 4, 'a:2:{i:0;s:13:\"Ruwanvalisaya\";i:1;s:15:\"Jethawanaramaya\";}', 'Budget', 0, '64714bf7f35e3.jpg', 1, 17, '2023-05-27 00:00:00.000', 1),
(40, 'Christmas', 'Colombo', 1, 'a:1:{i:0;s:19:\"Colombo City Center\";}', 'Budget', 0, '64714c0e6d98d.jpg', 1, 17, '2023-05-27 00:00:00.000', 1),
(41, 'Christmas', 'Galle', 2, 'a:1:{i:0;s:18:\"Galle fort | Beach\";}', 'Budget', 0, '64714c25ce55b.jpg', 1, 17, '2023-05-27 00:00:00.000', 1),
(42, 'Christmas', 'Galle', 2, 'a:1:{i:0;s:18:\"Galle fort | Beach\";}', 'Honeymoon', 0, '64714c3c0b212.jpg', 1, 17, '2023-05-27 00:00:00.000', 1),
(43, 'Christmas', 'Kandy', 1, 'a:1:{i:0;s:40:\"Sri Dalada Maligava |  Peradeniya Garden\";}', 'Honeymoon', 0, '64714c5fad0d7.jpg', 1, 17, '2023-05-27 00:00:00.000', 1),
(44, '', 'Colombo', 2, 'a:1:{i:0;s:19:\"Colombo City Center\";}', 'Family', 0, 'None', 0, 17, '2023-06-03 00:00:00.000', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_Id`, `card_number`, `exp_date`, `cvv`, `amount`, `created_by`, `created_date`, `isActive`) VALUES
(1, '123412341233123', '11/22', 123, 42354, 14, '2023-05-05 02:38:01.000', 1),
(2, '123412341233123', '11/22', 123, 32476, 13, '2023-05-05 05:56:46.000', 1),
(3, '123412341233123', '11/22', 123, 32476, 13, '2023-05-05 06:01:05.000', 1),
(4, '123412341233123', '11/22', 123, 32476, 13, '2023-05-05 06:02:57.000', 1),
(5, '123412341233123', '11/22', 123, 32476, 13, '2023-05-05 06:03:41.000', 1),
(6, '1234123412341234', '2023-05', 123, 500000, 15, '2023-05-15 01:44:07.000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `plan_types`
--

CREATE TABLE `plan_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(45) DEFAULT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `address` varchar(200) NOT NULL,
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
  `isActive` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tour_guide`
--

INSERT INTO `tour_guide` (`guide_Id`, `provider_name`, `provider_nic`, `phone_number`, `email`, `address`, `service_type`, `image`, `reg_number`, `experience`, `price_per_day`, `languages`, `status`, `service_no`, `created_by`, `created_date`, `isActive`) VALUES
(2, 'Kamal Fernando', '12343235', 435435345, 'k@gmail.com', '', 'test', '645456cc20497.png', 'test', 'test', 15000, 'test', 2, '645456cc2484511495', 14, '2023-05-05 03:07:24.000', 1),
(3, 'Rohit Perara', '200073346271', 703728493, 'r@gmail.com', '', '', '64714ea92149c.png', 'G 9277', NULL, 5000, 'English', 2, '64714ea92148762121', 19, '2023-05-27 02:28:25.000', 1),
(4, 'Rohit Sharma', '200074392873', 772647383, 'rohit@gmail.com', '', '', '647b677b8aa11.png', '2985', NULL, 2000, 'Sinhala', 2, '647b677b8aa2941234', 22, '2023-06-03 18:16:59.000', 1),
(5, 'Rohit Sharma', '200083763682', 764536252, 'rohit@gmail.com', '10, Park lane, Kandy', '', '647b6867643f3.png', '2686', NULL, 2000, 'Sinhala', 2, '647b6867643d977682', 22, '2023-06-03 18:20:55.000', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unavailability`
--

INSERT INTO `unavailability` (`unavailability_Id`, `service_ref`, `service_type`, `start_date`, `end_date`, `created_by`, `created_date`, `isActive`) VALUES
(1, 'Array', 'Vehicle', '2023-05-12 22:14:29.000', '2023-05-13 22:14:29.000', 14, '2023-05-04 22:14:29.000', 1),
(2, '645456a442cac43718', 'Vehicle', '2023-05-24 22:25:04.000', '2023-05-14 22:25:04.000', 14, '2023-05-04 22:25:04.000', 1),
(3, '645455c6aca5664321', 'Accomadation', '2023-05-05 22:25:27.000', '2023-05-22 22:25:27.000', 14, '2023-05-04 22:25:27.000', 1);

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
  `otp` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_Id`, `first_name`, `last_name`, `address`, `email`, `user_type`, `is_accommodation`, `is_vehicle_provider`, `is_guide`, `image`, `password`, `salt`, `isActive`, `created_date`, `otp`) VALUES
(13, 'Manger', 'one dd', 'keselwatddta', '12345@gmail.com', 2, NULL, NULL, NULL, NULL, '$2y$10$XoUR/VlSPt1.tVyUvRx.e.4nzCopq4YEsudEszAQ.UkXtl3K8Z9tW', NULL, 1, '2023-04-20 16:43:22.000', NULL),
(14, 'Kamal', 'Fernando', 'keselwatta ss', 'k@gmail.com', 4, 1, 1, 1, NULL, '$2y$10$XoUR/VlSPt1.tVyUvRx.e.4nzCopq4YEsudEszAQ.UkXtl3K8Z9tW', NULL, 1, '2023-04-22 03:39:16.000', NULL),
(15, 'Bimal', 'Shanaka', 'keselwatta bb', 'amal@gmail.com', 3, NULL, NULL, NULL, NULL, '$2y$10$XoUR/VlSPt1.tVyUvRx.e.4nzCopq4YEsudEszAQ.UkXtl3K8Z9tW', NULL, 1, '2023-04-22 13:30:28.000', NULL),
(16, 'Admin', 'Ravihara', 'keselwatta', 'admin@gmail.com', 1, NULL, NULL, NULL, NULL, '$2y$10$XoUR/VlSPt1.tVyUvRx.e.4nzCopq4YEsudEszAQ.UkXtl3K8Z9tW', NULL, 1, '2023-04-22 13:32:39.000', NULL),
(17, 'Imal', 'Shanaka', 'keselwatta ss', 'imal@gmail.com', 2, NULL, NULL, NULL, NULL, '$2y$10$XoUR/VlSPt1.tVyUvRx.e.4nzCopq4YEsudEszAQ.UkXtl3K8Z9tW', NULL, 1, '2023-04-22 13:34:08.000', NULL),
(18, 'Rujhan', 'M', '10, park lane', 'ruju@gmail.com', 3, NULL, NULL, NULL, NULL, '$2y$10$1bfU2JGPoRE5BrsZYqhm5Oiy2bneCE6YKsDynDrD.JE.2Arw1MXdO', NULL, 1, '2023-05-23 02:50:01.000', '995645'),
(19, 'Rohit', 'Perara', '10, park lane', 'r@gmail.com', 4, NULL, NULL, 1, NULL, '$2y$10$okTM6zkpd1/TE6I9vhVtTOPtETXpBYUP9hFB.q8kRhyxHYbR/jJGu', NULL, 1, '2023-05-26 20:52:19.000', NULL),
(20, 'Nazma', 'Nazar', '10, park lane', 'naz@gmail.com', 3, NULL, NULL, NULL, NULL, '$2y$10$fqN2QQvXU3h.Px2C2eb51.XhuT1H7ob1VK51HYXTZl5Ua4GCXhXdO', NULL, 1, '2023-06-01 07:06:11.000', NULL),
(21, 'Perera', 'M', '12, park lane', 'p@gmail.com', 4, NULL, 1, NULL, NULL, '$2y$10$TyuX/HMXU0Q39pVQV0c2euXHNOvidlCdTu.YbosZYU8zPZK3hfV7e', NULL, 1, '2023-06-01 07:52:40.000', NULL),
(22, 'Rohit', 'Sharma', '10, park lane, Kandy', 'rohit@gmail.com', 4, NULL, NULL, 1, NULL, '$2y$10$ZtouOIMCq.0VjuAMGh1Sie0YqjN//tF20lhmJqoA/YvRya5C8oVtK', NULL, 1, '2023-06-03 12:45:05.000', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `email`, `firstName`, `lastName`) VALUES
(10014, 'sanduni', '0492f2dedfb7edde865d3c97ccda4bc2ff1aca73', 'sanduniuma11@gmail.com', 'Sanduni', 'Akarawita'),
(10018, '', '$2y$10$7eMrQEf7dhNF/oNP11fTdesHeKdN.v1bXXdDVYOTIQg', 'dasuninirmani@gmail.com', 'Dasuni', 'Nirmani'),
(10019, '', '$2y$10$j03UoKDR5kTf6V412fC1B.JlgaLpmvabr6iaYD9RiVH', 'chirathb@gmail.com', 'Chirath', 'Banda'),
(10020, '', 'e8d11a3b269c145367714f55785aae27808e0fb5', 'santha@gmail.com', 'Santha', 'Perera'),
(10021, '', '2ff180064235da859cdb490f69e3e2b29fdaee33', 'thimira@gmail.com', 'Thimira', 'Perera'),
(10022, '', 'b16d044ce731cdc1199d1477b63ea24cfa17e6d8', 'paba@gmail.com', 'pabasara', 'samare'),
(10023, '', 'b3ae965f6f7218506bb8dd90351c525b23848aee', 'shantha@gmail.com', 'Shantha', 'perera'),
(10024, '', '761c0878ffcf76ec50dc504c53f781ce958b0f6d', 'Sevv@gmail.com', 'Sevvandi', 'Silva'),
(10025, '', 'df689a507e6b67e291adf1938868cdba82cc37b2', 'silva@gmail.com', 'Dias', 'Silva'),
(10026, '', '7c4ec581ad8f5ce41a7bf2a405b86891b5619195', 'naz@gmail.com', 'Nazma', 'Nazar'),
(10027, '', 'dddd5d7b474d2c78ebbb833789c4bfd721edf4bf', 'test@gmail.com', 'Test', 'user'),
(10028, '', 'b16d044ce731cdc1199d1477b63ea24cfa17e6d8', 'nazma@gmail.com', 'Nazma', 'Nazar'),
(10029, '', 'b16d044ce731cdc1199d1477b63ea24cfa17e6d8', 'naz10@gmail.com', 'Nazma', 'Nazar'),
(10030, '', 'b16d044ce731cdc1199d1477b63ea24cfa17e6d8', 'naz11@gmail.com', 'Nazma', 'Nazar'),
(10034, '', '615565f8910a8085ee03b80e8ab924cb4aa31f1e', 'test1@gmail.com', 'Test', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_tours`
--

CREATE TABLE `user_tours` (
  `user_tours_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL DEFAULT 0,
  `start_date` datetime(3) DEFAULT NULL,
  `no_of_tourist` int(11) DEFAULT NULL,
  `accomadation_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `guide_id` int(11) DEFAULT NULL,
  `final_price` float DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime(3) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `common_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tours`
--

INSERT INTO `user_tours` (`user_tours_id`, `tour_id`, `start_date`, `no_of_tourist`, `accomadation_id`, `vehicle_id`, `guide_id`, `final_price`, `created_by`, `created_date`, `isActive`, `status`, `common_id`) VALUES
(9, 11, '2023-05-05 04:01:15.000', 10, 3, 3, 2, 42354, 14, '2023-05-05 04:01:15.000', 1, 2, '6454636b18679'),
(10, 8, '2023-05-06 11:26:26.000', 10, 3, 3, 2, 32476, 13, '2023-05-05 11:26:26.000', 1, 3, '6454cbc2785bb'),
(11, 10, '2023-05-07 18:49:27.000', 4, 0, 0, 0, 20000, 14, '2023-05-08 18:49:27.000', 1, 2, '64592817208d7'),
(12, 9, '2023-05-11 09:24:04.000', 6, NULL, NULL, NULL, NULL, 14, '2023-05-13 09:24:04.000', 1, 1, '645f3b140728b'),
(14, 9, '2023-05-07 09:32:08.000', 1, NULL, NULL, NULL, NULL, 14, '2023-05-13 09:32:08.000', 1, 1, '645f3cf80f328'),
(15, 9, '2023-05-17 10:41:08.000', 2, NULL, NULL, NULL, NULL, 14, '2023-05-13 10:41:08.000', 1, 1, '645f4d2463441'),
(16, 9, '2023-05-17 19:21:04.000', 3, NULL, NULL, NULL, NULL, 14, '2023-05-13 19:21:04.000', 1, 1, '645fc7008b51b'),
(17, 16, '2023-05-14 19:33:01.000', 2, 4, 0, 0, 10000, 17, '2023-05-13 19:33:01.000', 1, 2, '645fc9cdac0ae'),
(18, 16, '2023-05-16 06:47:51.000', 2, NULL, NULL, NULL, NULL, 17, '2023-05-14 06:47:51.000', 1, 1, '646067f71363f'),
(19, 16, '2023-05-15 07:19:15.000', 2, NULL, NULL, NULL, NULL, 17, '2023-05-14 07:19:15.000', 1, 1, '64606f53bb841'),
(20, 9, '2023-05-23 09:04:47.000', 2, NULL, NULL, NULL, NULL, 16, '2023-05-14 09:04:47.000', 1, 1, '6460880faaf45'),
(21, 9, '2023-05-16 07:13:16.000', 2, 0, 0, 0, 500000, 15, '2023-05-15 07:13:16.000', 1, 3, '6461bf6cd8f7d'),
(22, 16, '2023-05-17 07:27:47.000', 3, NULL, NULL, NULL, NULL, 17, '2023-05-15 07:27:47.000', 1, 1, '6461c2d3434ef'),
(23, 16, '2023-05-18 07:58:45.000', 2, NULL, NULL, NULL, NULL, 14, '2023-05-15 07:58:45.000', 1, 1, '6461ca1564832'),
(24, 16, '2023-05-17 09:23:01.000', 3, 0, 0, 0, 0, 14, '2023-05-15 09:23:01.000', 1, 2, '6461ddd5aabe3'),
(25, 16, '2023-05-17 08:19:27.000', 2, 0, 0, 0, 0, 14, '2023-05-19 08:19:27.000', 1, 2, '646714ef7e80f'),
(26, 17, '2023-05-26 06:24:29.000', 2, 5, 0, 0, 20000, 17, '2023-05-23 06:24:29.000', 1, 2, '646c3ffd26bfc'),
(27, 18, '2023-05-25 07:12:32.000', 2, 5, 0, 0, 20000, 15, '2023-05-23 07:12:32.000', 1, 2, '646c4b40e0608'),
(28, 19, '2023-05-27 07:50:51.000', 2, 5, 0, 0, 20000, 15, '2023-05-23 07:50:51.000', 1, 2, '646c543b62f5b'),
(29, 20, '2023-06-03 08:20:50.000', 1, 5, 0, 0, 20000, 18, '2023-05-23 08:20:50.000', 1, 3, '646c5b42add04'),
(30, 21, '2023-05-30 09:15:01.000', 3, 5, 0, 0, 20000, 18, '2023-05-23 09:15:01.000', 1, 2, '646c67f5e0e6d'),
(31, 23, '2023-06-08 00:00:00.000', 2, NULL, NULL, NULL, NULL, 17, '2023-06-03 00:00:00.000', 1, 1, '647b643c0e1ae'),
(32, 44, '2023-06-06 00:00:00.000', 2, NULL, NULL, NULL, NULL, 17, '2023-06-03 00:00:00.000', 1, 1, '647b64e10650b'),
(33, 30, '2023-06-13 00:00:00.000', 2, 5, 0, 5, 22000, 17, '2023-06-03 00:00:00.000', 1, 2, '647b68c17f13c'),
(34, 31, '2023-06-11 00:00:00.000', 2, 5, 0, 5, 22000, 17, '2023-06-08 00:00:00.000', 1, 3, '64816e1ab5f19'),
(35, 31, '2023-06-12 00:00:00.000', 2, 5, 0, 5, 22000, 14, '2023-06-08 00:00:00.000', 1, 2, '648172c6cf532'),
(36, 31, '2023-06-18 00:00:00.000', 2, 5, 0, 5, 22000, 17, '2023-06-08 00:00:00.000', 1, 3, '6481769847275'),
(37, 24, '2023-06-20 00:00:00.000', 2, NULL, NULL, NULL, NULL, 17, '2023-06-10 00:00:00.000', 1, 1, '6484124b4fc21'),
(38, 31, '2023-07-04 00:00:00.000', 2, 5, 0, 5, 22000, 14, '2023-06-11 00:00:00.000', 1, 3, '648581f6520c5');

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
  `address` varchar(200) NOT NULL,
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
  `isActive` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_service`
--

INSERT INTO `vehicle_service` (`vehicle_Id`, `provider_name`, `provider_nic`, `phone_number`, `email`, `address`, `service_type`, `image`, `vehicle_num`, `vehicle_type`, `price_per_km`, `fuel_type`, `status`, `service_no`, `created_by`, `created_date`, `isActive`) VALUES
(3, 'Kamal Fernando', '123123213', 213213131, 'k@gmail.com', '', 'gopod', '645456a442cbc.png', 'test', 'test', 2354, '342', 2, '645456a442cac43718', 14, '2023-05-05 03:06:44.000', 1),
(4, 'Kamal Fernando', '2000734859154', 777573234, 'k@gmail.com', '', '', '645a0cf331297.png', 'PB-9922', '', 600, 'Petrol', 3, '645acf331251515791', 14, '2023-05-09 11:05:55.000', 1),
(5, 'Kamal Fernando', '200083391472', 773457283, 'k@gmail.com', '', '', '645a4cb17e2fa.png', 'PG-4433', 'Van', 600, 'Diesel', 2, '645a4cb17e2e111363', 14, '2023-05-09 15:37:53.000', 1),
(6, 'Kamal Fernando', '200593382464', 774903434, 'k@gmail.com', '', '', '645a5217807d1.jpeg', 'PD-6483', 'Car', 500, 'Petrol', 2, '645a52178781691359', 14, '2023-05-09 16:00:55.000', 1),
(7, 'Kamal Fernando', '200593346752', 778453765, 'k@gmail.com', '', '', '645a557ad4966.jpeg', 'PA-4435', 'Car', 400, 'Petrol', 3, '645a557ad493b82239', 14, '2023-05-09 16:15:22.000', 1),
(8, 'Perera M', '200074492673', 777346262, 'p@gmail.com', '', '', '647880010c081.png', 'CP-4432', 'Van', 1000, 'Diesel', 2, '647881c62247827369', 21, '2023-06-01 13:24:49.000', 1);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

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
  MODIFY `accomadation_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `destination_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `new_plan`
--
ALTER TABLE `new_plan`
  MODIFY `plan_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `season`
--
ALTER TABLE `season`
  MODIFY `season_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tour_guide`
--
ALTER TABLE `tour_guide`
  MODIFY `guide_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `unavailability`
--
ALTER TABLE `unavailability`
  MODIFY `unavailability_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10036;

--
-- AUTO_INCREMENT for table `user_tours`
--
ALTER TABLE `user_tours`
  MODIFY `user_tours_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `vehicle_service`
--
ALTER TABLE `vehicle_service`
  MODIFY `vehicle_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

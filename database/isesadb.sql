-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2022 at 01:13 PM
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
-- Database: `isesadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `pwd` varchar(250) NOT NULL,
  `supplier_title` varchar(250) DEFAULT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `contact_number` varchar(250) NOT NULL,
  `account_type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `email`, `pwd`, `supplier_title`, `firstname`, `lastname`, `address`, `contact_number`, `account_type`) VALUES
(1, 'client@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 'Io', 'Lani', 'Sta Ana Cagayan', '099559955', 'client'),
(2, 'supplier1@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Supplier 01', 'Sup', 'lier', '123 Street', '0912345678', 'supplier'),
(3, 'Supplier2@gmail.com', '6dbd0fe19c9a301c4708287780df41a2', 'Supplier 2', 'Sup', 'Lier 2', '1234 Street', '0995123456', 'supplier'),
(4, 'aiolani@gmail.com', '4313278e4f1606f755e7022306c56dcc', NULL, 'IOLANI', 'SILVESTRE', 'Sta. Ana', '0909090909', 'client'),
(5, 'aio@gmail.com', '5a105e8b9d40e1329780d62ea2265d8a', NULL, 'io', 'test', '123 Address', '123456789', 'client'),
(6, 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', '', 'Admin', 'Lani', 'Sta. Ana', '+63912345678', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `booked_supplies`
--

CREATE TABLE `booked_supplies` (
  `booked_id` int(11) NOT NULL,
  `booked_event` varchar(250) NOT NULL,
  `event_date` varchar(250) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `supplies_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `res_id` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `book_supplies`
--

CREATE TABLE `book_supplies` (
  `id` int(11) NOT NULL,
  `book_id` varchar(6) NOT NULL,
  `supplies_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `book_supplies-orig`
--

CREATE TABLE `book_supplies-orig` (
  `book_id` int(11) NOT NULL,
  `supplies_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_supplies-orig`
--

INSERT INTO `book_supplies-orig` (`book_id`, `supplies_id`, `account_id`, `user_id`) VALUES
(5, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `book_suppliesorig`
--

CREATE TABLE `book_suppliesorig` (
  `book_id` int(11) NOT NULL,
  `supplies_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_suppliesorig`
--

INSERT INTO `book_suppliesorig` (`book_id`, `supplies_id`, `account_id`, `user_id`) VALUES
(5, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feature_events`
--

CREATE TABLE `feature_events` (
  `f_events_id` int(11) NOT NULL,
  `f_events_desc` varchar(250) DEFAULT NULL,
  `f_images` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feature_events`
--

INSERT INTO `feature_events` (`f_events_id`, `f_events_desc`, `f_images`) VALUES
(1, 'Golden 18th Birthday of Allysa!', '../uploads/image 03.png'),
(2, 'Happy 1st Birthday !', '../uploads/image 02.png');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posted_events`
--

CREATE TABLE `posted_events` (
  `post_id` int(11) NOT NULL,
  `post_description` varchar(500) DEFAULT NULL,
  `post_image` varchar(255) DEFAULT NULL,
  `posted_on` varchar(250) NOT NULL,
  `accound_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posted_events`
--

INSERT INTO `posted_events` (`post_id`, `post_description`, `post_image`, `posted_on`, `accound_id`) VALUES
(1, 'Untitled-1.png', 'Come and Join the Wonderful Wedding of 1 and 2', '2022-08-26 10:11:50', 2),
(2, '87092f33-cc55-4b72-9a57-6f76d6891b42_Syllabus_Advance_java.pdf', 'test 01', '2022-09-13 14:47:35', 2);

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `rent_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `supplies_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`rent_id`, `event_id`, `supplies_id`, `account_id`, `user_id`, `status`) VALUES
(1, 1, 1, 2, 4, 'Rented'),
(2, 1, 2, 3, 4, 'Rented'),
(3, 1, 3, 2, 4, 'Rented'),
(4, 3, 1, 2, 4, 'Rejected'),
(5, 3, 3, 2, 4, 'Rejected'),
(6, 5, 1, 2, 4, 'Rented'),
(7, 5, 2, 3, 4, 'Rejected'),
(8, 5, 3, 2, 4, 'Rented'),
(9, 12, 3, 2, 1, 'Pending'),
(10, 12, 4, 4, 1, 'Pending'),
(11, 13, 2, 3, 1, 'Pending'),
(12, 13, 3, 2, 1, 'Rented'),
(13, 13, 4, 4, 1, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `req_event`
--

CREATE TABLE `req_event` (
  `event_id` int(11) NOT NULL,
  `request_event` varchar(250) NOT NULL,
  `event_date` varchar(250) NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `req_event`
--

INSERT INTO `req_event` (`event_id`, `request_event`, `event_date`, `account_id`) VALUES
(1, 'Birthday', '2022-09-29', 4),
(2, 'Wedding', '2022-09-29', 4),
(3, 'Wedding', '2022-09-28', 4),
(4, 'Birthday', '2022-09-30', 4),
(5, 'Birthday', '2022-09-28', 4),
(6, 'Debut', '2022-09-29', 4),
(7, 'Seminar', '2022-09-28', 4),
(8, 'Birthday', '2022-09-23', 1),
(9, 'Birthday', '2022-09-29', 1),
(10, 'Birthday', '2022-09-30', 1),
(11, 'Birthday', '2022-10-01', 1),
(12, 'Birthday', '2022-10-03', 1),
(13, 'Birthday', '2022-10-08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE `supplies` (
  `supplies_id` int(11) NOT NULL,
  `supplies_category` varchar(250) NOT NULL,
  `description` varchar(255) NOT NULL,
  `sup_events` varchar(250) NOT NULL,
  `status` varchar(50) NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`supplies_id`, `supplies_category`, `description`, `sup_events`, `status`, `account_id`) VALUES
(1, 'Lights and Sounds', 'Full band and professional lights yet in affordable price.', 'Birthday,Wedding,Anniversaries', 'Available', 2),
(2, 'Food and Beverages', 'description all here', 'Birthday,Christmas Party', 'Available', 3),
(3, 'Event Coordinator', 'the event coordinator can ready your event in just half day. ', 'Birthday,Wedding,Seminars,Reunions', 'Available', 2),
(4, 'Photo', 'description 1', 'Birthday', 'Available', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `booked_supplies`
--
ALTER TABLE `booked_supplies`
  ADD PRIMARY KEY (`booked_id`);

--
-- Indexes for table `book_supplies`
--
ALTER TABLE `book_supplies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_supplies-orig`
--
ALTER TABLE `book_supplies-orig`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_suppliesorig`
--
ALTER TABLE `book_suppliesorig`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `feature_events`
--
ALTER TABLE `feature_events`
  ADD PRIMARY KEY (`f_events_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posted_events`
--
ALTER TABLE `posted_events`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`rent_id`);

--
-- Indexes for table `req_event`
--
ALTER TABLE `req_event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`supplies_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `booked_supplies`
--
ALTER TABLE `booked_supplies`
  MODIFY `booked_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book_supplies`
--
ALTER TABLE `book_supplies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book_supplies-orig`
--
ALTER TABLE `book_supplies-orig`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `book_suppliesorig`
--
ALTER TABLE `book_suppliesorig`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feature_events`
--
ALTER TABLE `feature_events`
  MODIFY `f_events_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posted_events`
--
ALTER TABLE `posted_events`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `rent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `req_event`
--
ALTER TABLE `req_event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `supplies`
--
ALTER TABLE `supplies`
  MODIFY `supplies_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

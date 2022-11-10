-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2022 at 03:33 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

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
  `services` text NOT NULL,
  `account_type` varchar(250) NOT NULL,
  `account_status` varchar(20) NOT NULL DEFAULT 'Pending',
  `code` varchar(20) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `email`, `pwd`, `supplier_title`, `firstname`, `lastname`, `address`, `contact_number`, `services`, `account_type`, `account_status`, `code`, `category`) VALUES
(1, 'client@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 'client 3', 'Lani', 'Sta Ana Cagayan', '099559955', '', 'client', '', '', ''),
(2, 'sorar384@gmail.com', '1255670d2fb605f951421a42b7ecd2b9', 'Supplier 01', 'Sup', 'lier', '123 Street', '0912345678', '<h1><strong>BIRTHDAY</strong></h1>\r\n\r\n<h2>Price: 20,0000</h2>\r\n\r\n<h2><strong>Inclusions:</strong></h2>\r\n\r\n<ul>\r\n	<li>Buffet Table</li>\r\n	<li>Complete Silverware</li>\r\n</ul>\r\n', 'supplier', 'Approved', '24489494', ''),
(3, 'Supplier2@gmail.com', '6dbd0fe19c9a301c4708287780df41a2', 'Supplier 2', 'Sup', 'Lier 2', '1234 Street', '0995123456', '', 'supplier', 'Approved', '', ''),
(4, 'client2@gmail.com', '2c66045d4e4a90814ce9280272e510ec', NULL, 'client2', 'SILVESTRE11', 'Sta. Ana1', '09090909091', '', 'client', '', '', 'Wedding'),
(5, 'godegkola@gmail.com\r\n', '62608e08adc29a8d6dbc9754e659f125', NULL, 'client 1', 'test', '123 Address', '123456789', '', 'client', '', '', ''),
(6, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '', 'Admin', 'Lani', 'Sta. Ana', '+63912345678', '', 'Admin', '', '', ''),
(7, 'godegkola@gmail.com', '202cb962ac59075b964b07152d234b70', 'na', 'bryan', 'starl', 'na', '09123456789', '', 'supplier', 'Approved', '63887748', '');

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
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `time` varchar(50) NOT NULL,
  `code` varchar(20) NOT NULL,
  `chat_notif` varchar(20) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `sender_id`, `receiver_id`, `message`, `time`, `code`, `chat_notif`, `date`) VALUES
(5, 5, 3, 'asdasd', 'October 31, 2022 09:20:45 PM', '33385', '', '2022-10-31'),
(6, 5, 3, 'hi supplier', 'October 31, 2022 09:24:00 PM', '33385', '', '2022-10-31'),
(7, 5, 2, 'asdasdasd', 'November 1, 2022 09:57:11 AM', '60667', '', '2022-11-01'),
(8, 5, 3, 'xvxcv', 'November 1, 2022 09:57:17 AM', '33385', '', '2022-11-01'),
(9, 2, 5, 'hi', 'November 1, 2022 10:07:06 AM', '60667', '', '2022-11-01'),
(10, 4, 2, 'hi i am client 2', 'November 1, 2022 10:08:13 AM', '92706', '', '2022-11-01'),
(11, 2, 4, 'hi i am supplier welcome to my website client 2', 'November 1, 2022 10:08:46 AM', '92706', '', '2022-11-01'),
(12, 4, 3, 'hell supplier 2', 'November 3, 2022 04:40:12 PM', '54556', '', '2022-11-03'),
(13, 2, 5, 'hello supplier', 'November 6, 2022 10:23:10 PM', '60667', '', '2022-11-06'),
(14, 2, 4, 'hello client 2', 'November 6, 2022 10:26:57 PM', '92706', '', '2022-11-06'),
(15, 4, 2, 'hello sorar', 'November 6, 2022 10:27:55 PM', '92706', '', '2022-11-06');

-- --------------------------------------------------------

--
-- Table structure for table `chat_code`
--

CREATE TABLE `chat_code` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_code`
--

INSERT INTO `chat_code` (`id`, `sender_id`, `receiver_id`, `code`) VALUES
(1, 5, 3, '33385'),
(2, 5, 2, '60667'),
(3, 4, 2, '92706'),
(4, 4, 3, '54556');

-- --------------------------------------------------------

--
-- Table structure for table `customeravail`
--

CREATE TABLE `customeravail` (
  `customeravail_id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `offer_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `file_name` text NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customeravail`
--

INSERT INTO `customeravail` (`customeravail_id`, `code`, `offer_id`, `account_id`, `address`, `file_name`, `status`) VALUES
(6, '5435620', 3, 5, 'asdasdasdasdasd', 'index.jpg', 'Approved'),
(7, '4418699', 4, 5, 'asdasd asdaasd asdasd', 'index.jpg', 'Approved'),
(8, '4235814', 5, 4, 'address', 'index.jpg', 'Approved'),
(9, '1941136', 4, 4, 'add', '', 'Pending'),
(10, '9409146', 5, 4, 'add', '313357147_3597387013821854_4770332717292141613_n.jpg', 'Pending'),
(11, '9949986', 3, 4, 'asdasd', '', 'Approved'),
(12, '609485', 3, 4, 'address', 'index.jpg', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime DEFAULT current_timestamp(),
  `status` enum('1','0') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `file_name`, `uploaded_on`, `status`, `account_id`) VALUES
(2, 'robert-stilin-portfolio-interiors-bedroom-1501116038-8748305-1563561672.jpg', '2022-10-31 18:54:00', '1', 2),
(3, '115-1155804_pearl-milk-tea-melon-bubble-tea-transparent.png', '2022-10-11 18:54:03', '1', 0),
(10, '306451847_1108767626304978_7580835604312658936_n.png', '2022-10-21 18:54:07', '1', 2),
(11, 'My Name is Konohamaru Full Episode .png', '2022-10-19 18:54:05', '1', 2),
(12, 'bn2.jpg', '2022-10-10 18:54:09', '1', 2),
(13, 'hxh2.jpg', '2022-10-14 18:54:11', '1', 2),
(14, 'robert-stilin-portfolio-interiors-bedroom-1501116038-8748305-1563561672.jpg', '2022-10-31 19:53:32', '1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `manage_events`
--

CREATE TABLE `manage_events` (
  `f_events_id` int(11) NOT NULL,
  `f_events_desc` varchar(250) DEFAULT NULL,
  `f_images` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manage_events`
--

INSERT INTO `manage_events` (`f_events_id`, `f_events_desc`, `f_images`) VALUES
(1, '<h1><strong>Golden 18th</strong> Birthday of Allysa! <strong>34</strong></h1>\r\n', '../uploads/306451847_1108767626304978_7580835604312658936_n.png');

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `offer_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `file_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`offer_id`, `account_id`, `title`, `description`, `price`, `file_name`) VALUES
(3, 2, 'package 1', '<h1><strong>all in one package</strong></h1>\r\n\r\n<p><strong>category:</strong></p>\r\n\r\n<p>wedding glass</p>\r\n\r\n<p>chair&nbsp;</p>\r\n\r\n<p>table</p>\r\n\r\n<p>free wifi</p>\r\n\r\n<p>free pool</p>\r\n\r\n<p>Details</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 54000, 'robert-stilin-portfolio-interiors-bedroom-1501116038-8748305-1563561672.jpg'),
(4, 2, 'sdfsdf', '<p>sdfsdfdsf</p>\r\n', 4555, '309302895_802361881002506_2172891153999490420_n.png'),
(5, 2, 'title', '<p><strong>description</strong></p>\r\n', 13000, '1000_F_183484490_GjRqLzGxKSKsXhvX0HSZ48dAv28Cbo6i.jpg');

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
(2, '87092f33-cc55-4b72-9a57-6f76d6891b42_Syllabus_Advance_java.pdf', 'test 01', '2022-09-13 14:47:35', 2),
(3, 'robert-stilin-portfolio-interiors-bedroom-1501116038-8748305-1563561672.jpg', '', '2022-10-31 18:25:32', 2);

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

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `works_id` int(11) NOT NULL,
  `file_name` text NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`works_id`, `file_name`, `account_id`) VALUES
(2, 'robert-stilin-portfolio-interiors-bedroom-1501116038-8748305-1563561672.jpg', 2),
(3, '313357147_3597387013821854_4770332717292141613_n.jpg', 2);

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
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_code`
--
ALTER TABLE `chat_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customeravail`
--
ALTER TABLE `customeravail`
  ADD PRIMARY KEY (`customeravail_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_events`
--
ALTER TABLE `manage_events`
  ADD PRIMARY KEY (`f_events_id`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`offer_id`);

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
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`works_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `chat_code`
--
ALTER TABLE `chat_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customeravail`
--
ALTER TABLE `customeravail`
  MODIFY `customeravail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `manage_events`
--
ALTER TABLE `manage_events`
  MODIFY `f_events_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posted_events`
--
ALTER TABLE `posted_events`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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

--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `works_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

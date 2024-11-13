-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2021 at 05:54 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `create_account`
--

CREATE TABLE `create_account` (
  `id` int(11) NOT NULL,
  `name` char(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `country` varchar(50) NOT NULL,
  `pictrure` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `create_account`
--

INSERT INTO `create_account` (`id`, `name`, `email`, `password`, `mobile`, `address`, `gender`, `country`, `pictrure`) VALUES
(4, 'sunil Vishwakarma', 'amitvish9999@gmail.com', '8190', 7275308190, 'kolpanday,azamgarh', 'male', 'China', 'img2.png'),
(7, 'suraj vishwakarma', 'suraj@gmail.com', '8190', 9120140055, 'kolpanday,azamgarh', 'male', 'India', 'Capture.PNG'),
(8, 'Om', 'om@gmail.com', '8090', 7890809, 'bnjkghjbjb', 'male', 'india', ''),
(9, 'Ragini Vishwakarma', 'ragini@gmail.com', '1234`', 7275540965, 'kolpanday(Kolgghat),Azamgarh', 'male', 'India', '6cy5bLaei.jpg'),
(10, 'Anjali Vishwakarma', 'anjali@gmail.com', '123', 7275308190, 'kolpanday azamgarh', 'male', 'India', 'God_Shiva_Wallpaper.jpg'),
(11, 'mrityunjai', 'mr8090@gmail.com', '8190', 71727534567, 'kolpghta', 'male', 'India', 'amazing-shiv-shankar-images-3d-shiva-on-pinterest-shiv-shankar-images-3d.jpg'),
(12, 'sanjeev', 'sanjeevtech2@gmail.com', '1234', 9015501897, 'Noida', 'male', 'India', '20171120_175518.jpg'),
(13, 'pooja', 'pooja@gmail.com', '246', 7777978123, 'pune', 'male', 'China', '32.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `details_slider`
--

CREATE TABLE `details_slider` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `caption` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `mobile`, `message`) VALUES
(1, 'Amit', 'amitvish9999@gmail.com', 7275308190, 'Nice');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `transaction_id` varchar(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `payment` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `transaction_id`, `name`, `email`, `payment`) VALUES
(2, 'Txn75691774', 'ravi', 'jasoliyaravi100@gmail.com', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `price` bigint(20) NOT NULL,
  `details` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_no`, `type`, `price`, `details`, `image`) VALUES
(28, 512, 'Deluxe Room', 15000, 'The Contemporary yet simple designed King bedded rooms are well equipped with modern amenities. Fresh Decor and refined ambiance is the winning combination to make these rooms an ideal choice for discerning business traveler.', 'delux_img1.jpg'),
(30, 504, 'Luxurious Suite', 16000, 'Engulf yourself in the plush luxury of our premier rooms. An upgraded version of the Suite room, these rooms offer an elegant design with larger room space.', 'Luxury_img10.jpg'),
(31, 302, 'Standard Room', 14000, 'Simple design king bedded room are well equipped with modern amenities.', 'Standard _img16.jpg'),
(32, 312, 'Suite', 13000, 'Enjoy the view of Anand from attach sitting area, An upgraded version of the Deluxe room, these rooms offer an elegant design with larger room space.', 'Suit_img22.jpg'),
(33, 205, 'Twin Deluxe Room', 120000, 'The Contemporary yet simple designed twin bedded rooms are well equipped with modern amenities. Fresh Decor and refined ambiance is the winning combination to make these rooms an ideal choice for discerning business traveler.', 'Twin_img24.jpg'),
(34, 0, 'Parking Area', 0, 'ON-SITE PARKING Comfort Hotel Perth City provides 33 secure car parking spaces, free-of-charge for house guests which are subject to availability and on a ...\r\n', 'parking.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `room_booking_details`
--

CREATE TABLE `room_booking_details` (
  `id` int(11) NOT NULL,
  `name` char(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` int(20) NOT NULL,
  `contry` varchar(50) NOT NULL,
  `room_type` varchar(100) NOT NULL,
  `hotel_name` varchar(100) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_in_time` varchar(6) NOT NULL,
  `check_out_date` date NOT NULL,
  `Occupancy` varchar(100) NOT NULL,
  `room_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL COMMENT '0 success 1 pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `room_booking_details`
--

INSERT INTO `room_booking_details` (`id`, `name`, `email`, `phone`, `address`, `city`, `state`, `zip`, `contry`, `room_type`, `hotel_name`, `check_in_date`, `check_in_time`, `check_out_date`, `Occupancy`, `room_id`, `price`, `payment_status`) VALUES
(13, 'sanjeev', 'sanjeevtech2@gmail.com', 123456789, 'abxdfjdlfj', 'ausrat', '', 0, '', 'Standard Room', 'abc', '2021-04-30', '20:17', '2021-04-17', 'twin', 28, 3000, 1),
(14, 'sanjeev', 'sanjeevtech2@gmail.com', 8849475157, 'xyz', 'gujrat', '', 0, '', 'Twin Deluxe Room', 'abc', '2021-05-02', '17:19', '2021-05-27', 'single', 28, 15000, 1),
(16, 'pooja', 'pooja@gmailcom', 1234565865, 'sfafesd', '', '', 0, 'thailand', 'Standard Room', 'abc', '2021-05-12', '14:32', '2021-05-27', 'twin', 0, 0, 1),
(17, 'Aneri', 'aenyshiroya@gmail.com', 1234565865, 'csadws', '', '', 0, 'thailand', 'Standard Room', 'abc', '2021-05-12', '14:35', '2021-05-26', 'single', 32, 13000, 1),
(18, 'pooja', 'aneri@gmail.com', 1234565865, 'csdws', '', '', 0, 'thailand', 'Standard Room', 'abc', '2021-05-20', '23:38', '2021-05-28', 'twin', 0, 0, 1),
(19, 'pooja', 'pooja@gmail.com', 9875642562, 'abv', '', '', 0, 'thailand', 'Suite Room', 'abc', '2021-05-11', '09:10', '2021-05-28', 'single', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `caption` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `image`, `caption`) VALUES
(3, 'img3.jpg', ''),
(6, 'img2.jpg', ''),
(8, 'img1.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_hotel`
--

CREATE TABLE `user_hotel` (
  `id` int(11) NOT NULL,
  `hotel_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_hotel`
--

INSERT INTO `user_hotel` (`id`, `hotel_name`, `description`, `image`) VALUES
(4, 'abc', 'abc', '20210115140632_IMG_3673.JPG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `create_account`
--
ALTER TABLE `create_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details_slider`
--
ALTER TABLE `details_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `room_booking_details`
--
ALTER TABLE `room_booking_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_hotel`
--
ALTER TABLE `user_hotel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `create_account`
--
ALTER TABLE `create_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `details_slider`
--
ALTER TABLE `details_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `room_booking_details`
--
ALTER TABLE `room_booking_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_hotel`
--
ALTER TABLE `user_hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

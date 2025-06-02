-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2025 at 09:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gts`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(100) NOT NULL,
  `a_name` varchar(200) NOT NULL,
  `a_email` varchar(300) NOT NULL,
  `a_password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_email`, `a_password`) VALUES
(2, 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `c_id` int(11) NOT NULL,
  `c_username` varchar(200) DEFAULT NULL,
  `c_phone` bigint(20) DEFAULT NULL,
  `c_email` varchar(200) DEFAULT NULL,
  `c_password` varchar(300) DEFAULT NULL,
  `c_address` varchar(300) DEFAULT NULL,
  `c_photo` varchar(800) NOT NULL,
  `c_createddate` date DEFAULT NULL,
  `c_updateddate` date DEFAULT NULL,
  `c_status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`c_id`, `c_username`, `c_phone`, `c_email`, `c_password`, `c_address`, `c_photo`, `c_createddate`, `c_updateddate`, `c_status`) VALUES
(2, 'Smith R', 9876543333, 'smith@gmail.com', 'smith@123', 'Mangalore', 'upload/testimonial-3.jpg', '2025-03-12', '2025-03-18', 'Updated'),
(3, 'Brann', 9999999999, 'brann@gmail.com', 'brann@123', 'Balmatta, Mangalore', 'upload/testimonial-2.jpg', '2025-03-12', '2025-03-30', 'Updated'),
(4, 'Sam', 9898765432, 'sam@gmail.com', 'sam@123', 'Bangalore', 'upload/client.jpg', '2025-03-19', NULL, 'Approved'),
(5, 'Sheina S', 9812672390, 'sheina@gmail.com', 'sheina@123', 'Mangalore', 'upload/client-2.jpg', '2025-03-19', '2025-03-19', 'Updated'),
(6, 'James R', 9898000001, 'james@gmail.com', 'james@123', 'Mangalore', 'upload/testimonial-2.jpg', '2025-03-30', '2025-03-30', 'Updated');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(100) NOT NULL,
  `f_date` date DEFAULT NULL,
  `r_id` int(100) DEFAULT NULL,
  `f_message` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `f_date`, `r_id`, `f_message`) VALUES
(1, '2025-03-18', 3, 'Service was excellent'),
(2, '2025-03-18', 1, 'Helped me to rent vehicle it at ease'),
(3, '2025-03-19', 4, 'Excellent');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `l_id` int(11) NOT NULL,
  `l_name` varchar(200) DEFAULT NULL,
  `l_posteddate` date DEFAULT NULL,
  `l_updateddate` date DEFAULT NULL,
  `l_status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`l_id`, `l_name`, `l_posteddate`, `l_updateddate`, `l_status`) VALUES
(1, 'Mangalore', '2025-03-12', '2025-03-30', 'Available'),
(3, 'Kasaragod', '2025-03-12', NULL, 'Available'),
(4, 'Bangalore', '2025-03-19', NULL, 'Available'),
(6, 'Puttur', '2025-03-31', NULL, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `p_id` int(20) NOT NULL,
  `p_date` date NOT NULL,
  `r_id` int(20) NOT NULL,
  `c_id` int(20) NOT NULL,
  `s_id` int(20) NOT NULL,
  `p_tid` bigint(200) NOT NULL,
  `p_km` int(100) NOT NULL,
  `p_totalamt` int(100) NOT NULL,
  `p_platformamt` float NOT NULL,
  `p_vamount` float NOT NULL,
  `p_status` varchar(20) NOT NULL,
  `admin_tid` bigint(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`p_id`, `p_date`, `r_id`, `c_id`, `s_id`, `p_tid`, `p_km`, `p_totalamt`, `p_platformamt`, `p_vamount`, `p_status`, `admin_tid`) VALUES
(1, '2025-04-21', 4, 3, 13, 989898989898, 30, 2000, 200, 1800, 'Received', 0),
(2, '2025-04-21', 3, 2, 13, 981287564312, 15, 1000, 100, 900, 'Received', 0),
(3, '2025-04-21', 1, 3, 9, 987612341234, 18, 800, 80, 720, 'Paid', 987665431234),
(4, '2025-05-04', 8, 4, 21, 897654320987, 10, 5000, 500, 4500, 'Paid', 908721340987),
(5, '2025-05-05', 9, 5, 22, 987912345612, 15, 5250, 525, 4725, 'Paid', 987654321123);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `s_id` int(100) NOT NULL,
  `s_username` varchar(200) NOT NULL,
  `s_phone` bigint(20) NOT NULL,
  `s_email` varchar(200) NOT NULL,
  `s_password` varchar(800) NOT NULL,
  `s_location` varchar(800) NOT NULL,
  `s_vehicle` varchar(200) NOT NULL,
  `s_rate` int(20) NOT NULL,
  `s_desc` varchar(800) NOT NULL,
  `s_photo` varchar(200) NOT NULL,
  `s_createddate` date NOT NULL,
  `s_updateddate` date NOT NULL,
  `s_status` varchar(200) NOT NULL,
  `rc` varchar(400) NOT NULL,
  `insurance` varchar(400) NOT NULL,
  `license` varchar(400) NOT NULL,
  `adhar` varchar(400) NOT NULL,
  `upi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`s_id`, `s_username`, `s_phone`, `s_email`, `s_password`, `s_location`, `s_vehicle`, `s_rate`, `s_desc`, `s_photo`, `s_createddate`, `s_updateddate`, `s_status`, `rc`, `insurance`, `license`, `adhar`, `upi`) VALUES
(9, 'Haroon M', 9876543981, 'haru@gmail.com', 'haru@123', 'Mangalore', 'Tata Prima 5530.S', 270, 'The Tata Prima 5530.S is a robust multi-axle truck with a 35-55 ton capacity, featuring a powerful 300+ HP engine and 6×4 axle configuration designed for long-haul container and bulk goods transport. Its advanced telematics system ensures efficient fleet management, making it ideal for steel, cement, and heavy machinery logistics across Indian highways.\"', 'upload/prima-55302.jpg', '2025-03-10', '2025-03-29', 'Updated', 'upload/RC.jpg', 'upload/insurance.jpg', 'upload/license.jpg', 'upload/adhar.png', 'upload/admin-qr.jpg'),
(13, 'Sam', 9912345678, 'sam@gmail.com', 'sam@123', 'Kasaragod', 'Ashok Leyland 3720', 300, 'Built for rugged mining operations, the Ashok Leyland 3720 tipper truck handles 20-35 tons of sand, coal, or aggregates with its durable H-series engine and reinforced chassis. The hydraulic tipping mechanism allows quick unloading, while its all-terrain capability makes it perfect for quarry sites and construction projects nationwide.\"', 'upload/ashok-leyland-3520-8x2-75982.avif', '2025-03-15', '2025-03-29', 'Updated', 'upload/RC.jpg', 'upload/insurance.jpg', 'upload/license.jpg', 'upload/adhar.png', 'upload/admin-qr.jpg'),
(14, 'John', 9988776655, 'john@gmail.com', 'john@123', 'Bangalore', 'BharatBenz 4228T', 500, 'Specializing in port logistics, the BharatBenz 4228T container carrier effortlessly transports 20ft/40ft ISO containers with its 280 HP engine and high-torque transmission. Equipped with secure container locks and anti-roll bars, this 6×4 workhorse dominates heavy-load routes between ports and industrial hubs.\r\n\"', 'upload/bharatBenz.webp', '2025-03-15', '2025-03-29', 'Updated', 'upload/RC.jpg', 'upload/insurance.jpg', 'upload/license.jpg', 'upload/adhar.png', 'upload/admin-qr.jpg'),
(21, 'George', 9911223344, 'george@gmail.com', 'george@123', 'Bangalore', 'Scania R 450', 500, 'Designed for hazardous liquid transport, the Scania R 450 tanker truck carries 30,000-40,000 liters ', 'upload/scania.jpg', '2025-03-30', '0000-00-00', 'Approved', 'upload/RC.jpg', 'upload/insurance.jpg', 'upload/license.jpg', 'upload/adhar.png', 'upload/admin-qr.jpg'),
(22, 'Adam M', 7711223344, 'adam@gmail.com', 'adam@123', 'Mangalore', 'Eicher Pro 6049', 350, 'The Eicher Pro 6049 flatbed truck combines versatility and efficiency with its 15-25 ton capacity', 'upload/eicher.webp', '2025-03-30', '2025-03-30', 'Updated', 'upload/RC.jpg', 'upload/insurance.jpg', 'upload/license.jpg', 'upload/adhar.png', 'upload/admin-qr.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_request`
--

CREATE TABLE `vehicle_request` (
  `r_id` int(100) NOT NULL,
  `from` varchar(10) NOT NULL,
  `to` varchar(10) NOT NULL,
  `s_id` int(100) NOT NULL,
  `c_id` int(100) NOT NULL,
  `r_posteddate` date NOT NULL,
  `r_updateddate` date NOT NULL,
  `r_status` varchar(200) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_request`
--

INSERT INTO `vehicle_request` (`r_id`, `from`, `to`, `s_id`, `c_id`, `r_posteddate`, `r_updateddate`, `r_status`, `date`) VALUES
(1, 'Mangalore', 'Thokkot', 9, 3, '2025-03-15', '2025-04-21', 'Completed', '2025-03-15'),
(2, 'Bangalore', 'Mangalore', 14, 3, '2025-03-15', '2025-03-15', 'Not Available', '2025-03-15'),
(3, 'Kasaragod', 'Kumble', 13, 2, '2025-03-18', '2025-04-21', 'Completed', '2025-03-18'),
(4, 'Kasaragod', 'Kannur', 13, 3, '2025-03-19', '2025-04-21', 'Completed', '2025-03-19'),
(5, 'Mangalore', 'Puttur', 9, 5, '2025-03-19', '2025-03-30', 'Confirmed', '2025-03-19'),
(6, 'Kasaragod', 'Uppala', 13, 3, '2025-03-29', '2025-03-30', 'Confirmed', '2025-03-29'),
(7, 'Bangalore', 'Mysore', 14, 6, '2025-03-30', '0000-00-00', 'Requested', '2025-03-30'),
(8, 'Madivala', 'Kudlu Gate', 21, 4, '2025-03-30', '2025-05-04', 'Completed', '2025-03-30'),
(9, 'Mangalore', 'Udupi', 22, 5, '2025-03-30', '2025-05-05', 'Completed', '2025-03-30'),
(10, 'Bangalore', 'Hasan', 14, 4, '2025-04-12', '0000-00-00', 'Requested', '2025-04-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `vehicle_request`
--
ALTER TABLE `vehicle_request`
  ADD PRIMARY KEY (`r_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `p_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `s_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `vehicle_request`
--
ALTER TABLE `vehicle_request`
  MODIFY `r_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

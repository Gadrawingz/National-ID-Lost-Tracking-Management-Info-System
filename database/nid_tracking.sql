-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2022 at 03:14 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nid_tracking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `full_name` varchar(200) DEFAULT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `email`, `full_name`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'Chris Brown', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `found`
--

CREATE TABLE `found` (
  `id_pk` int(10) NOT NULL,
  `nid_names` varchar(150) NOT NULL,
  `nid_number` varchar(20) NOT NULL,
  `nid_dob` varchar(16) NOT NULL,
  `nid_sex` char(2) NOT NULL,
  `issued_dist` varchar(100) NOT NULL,
  `issued_sect` varchar(100) NOT NULL,
  `nid_image` varchar(200) NOT NULL,
  `found_location` varchar(150) DEFAULT NULL,
  `user_id` int(10) NOT NULL,
  `action_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `found`
--

INSERT INTO `found` (`id_pk`, `nid_names`, `nid_number`, `nid_dob`, `nid_sex`, `issued_dist`, `issued_sect`, `nid_image`, `found_location`, `user_id`, `action_date`) VALUES
(1, 'UMUTESI Danielle', '1200340507000600', '10/02/2003', 'M', 'Nyagatare', 'Tabagwe', 'image6.jpg', 'Nyaruguru', 1, '2022-04-21 11:46:43'),
(2, 'MUGABO Daniel', '1199880065800065', '20/06/1998', 'M', 'Gasabo', 'Jali', 'image3.jpg', 'Gisagara', 3, '2022-04-21 13:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `lost`
--

CREATE TABLE `lost` (
  `id_pk` int(10) NOT NULL,
  `nid_names` varchar(150) NOT NULL,
  `nid_number` varchar(20) NOT NULL,
  `nid_dob` varchar(16) NOT NULL,
  `nid_sex` char(2) NOT NULL,
  `issued_dist` varchar(100) NOT NULL,
  `issued_sect` varchar(100) NOT NULL,
  `nid_image` varchar(200) NOT NULL,
  `lost_from` varchar(100) DEFAULT NULL,
  `lost_to` varchar(100) DEFAULT NULL,
  `lost_date` varchar(20) NOT NULL,
  `reward` varchar(10) DEFAULT NULL,
  `user_id` int(10) NOT NULL,
  `action_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lost`
--

INSERT INTO `lost` (`id_pk`, `nid_names`, `nid_number`, `nid_dob`, `nid_sex`, `issued_dist`, `issued_sect`, `nid_image`, `lost_from`, `lost_to`, `lost_date`, `reward`, `user_id`, `action_date`) VALUES
(1, 'MUGABO Daniel', '1199880065800065', '10/02/2001', 'M', 'Gasabo', 'Jali', 'image2.jpg', 'Bugesera', 'Nyamata', '2022-04-14', '5000', 1, '2022-04-21 11:05:04'),
(2, 'UHIRIWE Deborah', '1200223456535473', '10/02/2002', 'F', 'Kayonza', 'Rukara', 'image4.jpg', 'Rwamagana', 'Kigali', '2022-04-07', '10000', 1, '2022-04-21 11:28:04');

-- --------------------------------------------------------

--
-- Table structure for table `lost_check`
--

CREATE TABLE `lost_check` (
  `check_id` int(10) NOT NULL,
  `nid_number` varchar(20) NOT NULL COMMENT 'Treated as Fake FK',
  `is_found` tinyint(1) NOT NULL DEFAULT 0,
  `has_reward` tinyint(1) NOT NULL DEFAULT 0,
  `is_received` tinyint(1) NOT NULL DEFAULT 0,
  `action_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lost_check`
--

INSERT INTO `lost_check` (`check_id`, `nid_number`, `is_found`, `has_reward`, `is_received`, `action_date`) VALUES
(1, '1200004465570085', 1, 0, 0, '2022-04-12 15:10:44'),
(2, '1200340507000600', 1, 1, 0, '2022-04-21 11:46:43'),
(3, '1199880065800065', 1, 0, 0, '2022-04-21 13:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `police_station`
--

CREATE TABLE `police_station` (
  `station_id` int(10) NOT NULL,
  `station_name` varchar(200) NOT NULL,
  `district` varchar(100) NOT NULL,
  `sector` varchar(100) NOT NULL,
  `station_commander` varchar(100) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `police_station`
--

INSERT INTO `police_station` (`station_id`, `station_name`, `district`, `sector`, `station_commander`, `contact_number`, `username`, `password`, `status`) VALUES
(2, 'Ngarama Police Station', 'Nyanza', 'Rukari', 'Mugabe Robertson', '0783454422', 'ngarama', '12345', 1),
(3, 'Rango Police Station', 'Huye', 'Rango', 'Mugabe Robert', '0783454458', 'rango', '12345', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `full_name` varchar(200) DEFAULT NULL,
  `telephone` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `full_name`, `telephone`, `password`, `status`, `created_at`) VALUES
(1, 'Fabrice Muneza', '0784802605', '123452345', 1, '2022-04-17 14:31:19'),
(2, 'Higiro Emmy', '0784557400', '12345', 1, '2022-04-17 20:17:32'),
(3, 'Mwiseneza Patrick', '0789999999', '12345', 1, '2022-04-17 20:29:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `found`
--
ALTER TABLE `found`
  ADD PRIMARY KEY (`id_pk`);

--
-- Indexes for table `lost`
--
ALTER TABLE `lost`
  ADD PRIMARY KEY (`id_pk`);

--
-- Indexes for table `lost_check`
--
ALTER TABLE `lost_check`
  ADD PRIMARY KEY (`check_id`);

--
-- Indexes for table `police_station`
--
ALTER TABLE `police_station`
  ADD PRIMARY KEY (`station_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `found`
--
ALTER TABLE `found`
  MODIFY `id_pk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lost`
--
ALTER TABLE `lost`
  MODIFY `id_pk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lost_check`
--
ALTER TABLE `lost_check`
  MODIFY `check_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `police_station`
--
ALTER TABLE `police_station`
  MODIFY `station_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

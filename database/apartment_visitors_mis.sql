-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 20, 2022 at 11:01 AM
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
-- Database: `apartment_visitors_mis`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `admin_id` int(200) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `admin_phone_number` varchar(200) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`admin_id`, `admin_name`, `admin_phone_number`, `admin_email`, `admin_password`) VALUES
(1, 'System admin', '09876543287', 'sysadmin@gmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f'),
(2, 'Hillary Monroe', '0799997834', 'hillarymonroe90@gmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `visitor_id` int(200) NOT NULL,
  `visitor_names` varchar(200) NOT NULL,
  `visitor_id_number` varchar(200) NOT NULL,
  `visitor_email` varchar(200) NOT NULL,
  `visitor_phone_number` varchar(200) NOT NULL,
  `visitor_check_in_date_time` varchar(200) NOT NULL,
  `visitor_check_out_date_time` varchar(200) NOT NULL,
  `visitor_where_visiting` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`visitor_id`, `visitor_names`, `visitor_id_number`, `visitor_email`, `visitor_phone_number`, `visitor_check_in_date_time`, `visitor_check_out_date_time`, `visitor_where_visiting`) VALUES
(2, 'Janet Doe', '900125678', 'janet90@gmail.com', '0727334567', '20 Oct 2022', '21 Oct 2022', 'Ground Floor Room 20'),
(3, 'Moses Hillary', '90087312', 'moseshill897@hotmail.com', '07223389093', '20 Oct 2022', '21 Oct 2022', 'First Floor Room 13A'),
(4, 'Janet Monroe', '120776423', 'janetmoon@gmail.com', '071234567', '20 Oct 2022', '21 Oct 2022', 'Ground Floor Room 2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`visitor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `admin_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `visitor_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

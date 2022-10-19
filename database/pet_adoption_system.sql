-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2022 at 07:48 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pet_adoption_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(200) NOT NULL,
  `admin_login_id` int(200) NOT NULL,
  `admin_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(200) NOT NULL,
  `login_username` varchar(200) NOT NULL,
  `login_password` varchar(200) NOT NULL,
  `login_rank` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `login_username`, `login_password`, `login_rank`) VALUES
(1, 'sysadmin', 'fe01ce2a7fbac8fafaed7c982a04e229', 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(200) NOT NULL,
  `payment_pet_adoption_id` int(200) NOT NULL,
  `payment_ref` varchar(200) NOT NULL,
  `payment_amount` varchar(200) NOT NULL,
  `payment_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `pet_id` int(200) NOT NULL,
  `pet_owner_id` int(200) NOT NULL,
  `pet_type` varchar(200) NOT NULL,
  `pet_breed` varchar(200) NOT NULL,
  `pet_age` varchar(200) NOT NULL,
  `pet_health_status` varchar(200) NOT NULL,
  `pet_description` longtext NOT NULL,
  `pet_adoption_status` varchar(200) NOT NULL,
  `pet_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pet_adopter`
--

CREATE TABLE `pet_adopter` (
  `pet_adopter_id` int(200) NOT NULL,
  `pet_adopter_login_id` int(200) NOT NULL,
  `pet_adopter_name` varchar(200) NOT NULL,
  `pet_adopter_email` varchar(200) NOT NULL,
  `pet_adopter_phone_number` varchar(200) NOT NULL,
  `pet_adopter_address` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pet_adoption`
--

CREATE TABLE `pet_adoption` (
  `pet_adoption_id` int(200) NOT NULL,
  `pet_adoption_pet_id` int(200) NOT NULL,
  `pet_adoption_pet_adopter_id` int(200) NOT NULL,
  `pet_adoption_date` varchar(200) NOT NULL,
  `pet_adoption_payment_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pet_owner`
--

CREATE TABLE `pet_owner` (
  `pet_owner_id` int(200) NOT NULL,
  `pet_owner_login_id` int(200) NOT NULL,
  `pet_owner_name` varchar(200) NOT NULL,
  `pet_owner_email` varchar(200) NOT NULL,
  `pet_owner_contacts` varchar(200) NOT NULL,
  `pet_owner_address` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `AdminLoginId` (`admin_login_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `PaymentAdoptionId` (`payment_pet_adoption_id`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`pet_id`),
  ADD KEY `PetOwnerId` (`pet_owner_id`);

--
-- Indexes for table `pet_adopter`
--
ALTER TABLE `pet_adopter`
  ADD PRIMARY KEY (`pet_adopter_id`),
  ADD KEY `PetAdopterLoginId` (`pet_adopter_login_id`);

--
-- Indexes for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  ADD PRIMARY KEY (`pet_adoption_id`),
  ADD KEY `PetAdoptionPetId` (`pet_adoption_pet_id`),
  ADD KEY `PetAdoptionAdopterId` (`pet_adoption_pet_adopter_id`);

--
-- Indexes for table `pet_owner`
--
ALTER TABLE `pet_owner`
  ADD PRIMARY KEY (`pet_owner_id`),
  ADD KEY `PetOwnerLoginId` (`pet_owner_login_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `pet_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pet_adopter`
--
ALTER TABLE `pet_adopter`
  MODIFY `pet_adopter_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  MODIFY `pet_adoption_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pet_owner`
--
ALTER TABLE `pet_owner`
  MODIFY `pet_owner_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `AdminLoginId` FOREIGN KEY (`admin_login_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `PaymentAdoptionId` FOREIGN KEY (`payment_pet_adoption_id`) REFERENCES `pet_adoption` (`pet_adoption_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `PetOwnerId` FOREIGN KEY (`pet_owner_id`) REFERENCES `pet_owner` (`pet_owner_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pet_adopter`
--
ALTER TABLE `pet_adopter`
  ADD CONSTRAINT `PetAdopterLoginId` FOREIGN KEY (`pet_adopter_login_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pet_adoption`
--
ALTER TABLE `pet_adoption`
  ADD CONSTRAINT `PetAdoptionAdopterId` FOREIGN KEY (`pet_adoption_pet_adopter_id`) REFERENCES `pet_adopter` (`pet_adopter_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PetAdoptionPetId` FOREIGN KEY (`pet_adoption_pet_id`) REFERENCES `pet` (`pet_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pet_owner`
--
ALTER TABLE `pet_owner`
  ADD CONSTRAINT `PetOwnerLoginId` FOREIGN KEY (`pet_owner_login_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

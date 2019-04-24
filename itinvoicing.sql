-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2019 at 05:30 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itinvoicing`
--

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `query_type` varchar(255) NOT NULL,
  `query` text NOT NULL,
  `contractor_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0=pending, 1=estimated, 2=in progress, 3=completed',
  `cost` int(11) DEFAULT NULL,
  `accepted_by_customer` int(11) DEFAULT NULL COMMENT '0=cancelled, 1=accepted',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `Admin_response` text,
  `accpted_by_contractor` int(11) DEFAULT NULL COMMENT '0=cancelled, 1=accepted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phno` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img_url` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `contractor_type` varchar(255) DEFAULT NULL COMMENT 'this field is only for contractor to know the type of contractor'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `phno`, `password`, `img_url`, `role`, `created_at`, `updated_at`, `contractor_type`) VALUES
(1, 'Muhammad', 'Umair', 'mohammadumair263@gmail.com', '030', 'abc', NULL, 'customer', '2019-01-30 03:35:36', '2019-01-30 03:35:36', NULL),
(3, 'Hassan', 'Naqvi', 'ajskdb@ksjahdf.com', '030', 'asd', NULL, 'customer', '2019-01-30 05:24:04', '2019-01-30 05:24:04', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

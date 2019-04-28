-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2019 at 03:53 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

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
  `status` int(11) DEFAULT NULL COMMENT '0=pending, 1=estimated, 2=accepted, 3= rejected, 4=in progress, 5=completed, 6=cancelled',
  `cost` int(11) DEFAULT NULL,
  `accepted_by_customer` int(11) DEFAULT NULL COMMENT '0=cancelled, 1=accepted',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `Admin_response` text,
  `accpted_by_contractor` int(11) DEFAULT NULL COMMENT '0=cancelled, 1=accepted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`id`, `customer_id`, `query_type`, `query`, `contractor_id`, `status`, `cost`, `accepted_by_customer`, `created_at`, `updated_at`, `Admin_response`, `accpted_by_contractor`) VALUES
(1, 2, 'hardware', 'fdsafadsfdasfads', 4, 1, 1000, 1, '2019-01-30 08:21:57', '2019-01-30 08:21:57', 'dsfadsfdsafadsfads', NULL),
(2, 2, 'software', 'fdsafadsfdsafasdfadsf', 3, 5, 1000, NULL, NULL, NULL, 'fdsfdsafasdfsfsafasdf', NULL),
(3, 2, 'both', 'I need ABC', 4, 1, 5000, NULL, NULL, NULL, 'this is a message from admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `contractor_id` int(10) NOT NULL,
  `service` varchar(20) NOT NULL,
  `invoice_status` int(1) NOT NULL DEFAULT '5' COMMENT '0= due, 1= paid',
  `inquiry` varchar(500) NOT NULL,
  `price` int(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `inquiry_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `customer_id`, `contractor_id`, `service`, `invoice_status`, `inquiry`, `price`, `created_at`, `inquiry_id`) VALUES
(1, 2, 3, 'software', 5, 'fdsafadsfdsafasdfadsf', 1000, '2019-04-23 17:41:35', 2);

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
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `contractor_type` varchar(255) DEFAULT NULL COMMENT 'this field is only for contractor to know the type of contractor'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `phno`, `password`, `img_url`, `role`, `created_at`, `updated_at`, `contractor_type`) VALUES
(1, 'Mohsin', 'Raza', 'admin@admin.com', '3328635236', 'aaaaaa', NULL, 'admin', '0000-00-00 00:00:00', NULL, NULL),
(2, 'Ali', 'G', 'a@a.com', '2321321312', 'aaaaaa', NULL, 'customer', '0000-00-00 00:00:00', NULL, NULL),
(3, 'M', 'R', 'm@r.com', '123123123', 'aaaaaa', NULL, 'contractor', '0000-00-00 00:00:00', NULL, NULL),
(4, 'Ali', 'Raza', 'a@b.com', '312312312', 'aaaaaa', NULL, 'contractor', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

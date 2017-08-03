-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2017 at 12:19 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(150) NOT NULL,
  `state` varchar(150) NOT NULL,
  `country` varchar(250) NOT NULL,
  `zipcode` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `address`, `city`, `state`, `country`, `zipcode`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', 'Admin', 'Admin', '11592 HOLMES RD 202', 'KANSAS CITY', 'Missouri', 'United States', '64131');

-- --------------------------------------------------------

--
-- Table structure for table `chequebooks`
--

CREATE TABLE `chequebooks` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `book_requested_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_response` varchar(20) NOT NULL DEFAULT 'Not Approved',
  `book_start_num` int(11) NOT NULL,
  `book_end_num` int(11) NOT NULL,
  `book_confirmed_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `country` varchar(250) NOT NULL,
  `zipcode` varchar(5) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `posted_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `creditcards`
--

CREATE TABLE `creditcards` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `credit_card_num` varchar(16) NOT NULL,
  `credit_applied_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_response` varchar(50) NOT NULL DEFAULT 'Not Approved',
  `credit_balance` decimal(10,2) NOT NULL,
  `card_confirm_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `account_num` varchar(20) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` text NOT NULL,
  `address` text NOT NULL,
  `city` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `country` varchar(250) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  `customer_created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `customer_last_updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `customer_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emailsendingaddress`
--

CREATE TABLE `emailsendingaddress` (
  `id` int(11) NOT NULL,
  `senderemail` text,
  `emailpassword` text,
  `emailhost` text,
  `emailport` int(11) NOT NULL,
  `siteurl` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emailsendingaddress`
--

INSERT INTO `emailsendingaddress` (`id`, `senderemail`, `emailpassword`, `emailhost`, `emailport`, `siteurl`) VALUES
(1, 'chinna4network@gmail.com', 'networknetwork', 'smtp.gmail.com', 587, 'http://localhost/bank');

-- --------------------------------------------------------

--
-- Table structure for table `recipients`
--

CREATE TABLE `recipients` (
  `id` int(11) NOT NULL,
  `recipient_from` int(11) NOT NULL,
  `recipient_to` int(11) NOT NULL,
  `recipient_added_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `custmer_id` int(11) NOT NULL,
  `deposit_withdraw_transfer` varchar(50) NOT NULL,
  `cash_cheque` varchar(50) NOT NULL,
  `cheque_num` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `to_cust_id` int(11) NOT NULL,
  `from_cust_id` int(11) NOT NULL,
  `transaction_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `transaction_description` text NOT NULL,
  `admin_approve` varchar(20) NOT NULL DEFAULT 'Not Notified'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chequebooks`
--
ALTER TABLE `chequebooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `creditcards`
--
ALTER TABLE `creditcards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emailsendingaddress`
--
ALTER TABLE `emailsendingaddress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipients`
--
ALTER TABLE `recipients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `chequebooks`
--
ALTER TABLE `chequebooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `creditcards`
--
ALTER TABLE `creditcards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `emailsendingaddress`
--
ALTER TABLE `emailsendingaddress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `recipients`
--
ALTER TABLE `recipients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

INSERT INTO `contactus` (`id`, `firstname`, `lastname`, `email`, `mobile`, `address`, `city`, `state`, `country`, `zipcode`, `subject`, `message`, `posted_on`) VALUES
(1, 'CHENNA', 'BEKKARI', 'chinna1754@gmail.com', '8168889431', '307 E 112 STREET APT 102', 'KANSAS CITY', 'Missouri', 'United States', '64114', 'fbjdvjh', 'v xjv zvh', '2017-04-24 20:33:19');
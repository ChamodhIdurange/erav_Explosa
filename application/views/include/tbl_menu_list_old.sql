-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 11, 2024 at 04:30 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erav_explosa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_list`
--

CREATE TABLE `tbl_menu_list` (
  `idtbl_menu_list` int(11) NOT NULL,
  `menu` varchar(450) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_menu_list`
--

INSERT INTO `tbl_menu_list` (`idtbl_menu_list`, `menu`, `status`) VALUES
(1, 'User Account', 1),
(2, 'User Type', 1),
(3, 'User Privileges', 1),
(4, 'Supplier', 1),
(5, 'Color', 1),
(6, 'Categories', 1),
(7, 'Sub Categories', 1),
(8, 'Customers', 1),
(9, 'Jobs', 1),
(10, 'Accepted Jobs', 1),
(11, 'Slots', 1),
(12, 'Material', 1),
(13, 'Purchase Order', 1),
(14, 'GRN', 1),
(15, 'Stock Report', 1),
(16, 'Employee', 1),
(17, 'Insurance', 1),
(18, 'Section Sales Report', 1),
(19, 'Material Allocation Report', 1),
(20, 'Job Estimations', 1),
(21, 'Departments', 1),
(22, 'Employee Allocation Report', 1),
(23, 'Vehicle Report', 1),
(24, 'Vehicle Category', 1),
(25, 'Direct Grn', 1),
(26, 'Vehicle Model', 1),
(27, 'Deleted Invoice', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_menu_list`
--
ALTER TABLE `tbl_menu_list`
  ADD PRIMARY KEY (`idtbl_menu_list`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_menu_list`
--
ALTER TABLE `tbl_menu_list`
  MODIFY `idtbl_menu_list` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

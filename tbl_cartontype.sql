-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2025 at 12:56 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `tbl_cartontype`
--

CREATE TABLE `tbl_cartontype` (
  `idtbl_cartontype` int(11) NOT NULL,
  `cartontypename` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=active,2=deactive,3=delete',
  `insertdatetime` datetime DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cartontype`
--
ALTER TABLE `tbl_cartontype`
  ADD PRIMARY KEY (`idtbl_cartontype`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cartontype`
--
ALTER TABLE `tbl_cartontype`
  MODIFY `idtbl_cartontype` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

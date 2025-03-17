
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2025 at 10:07 PM
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
-- Table structure for table `tbl_additional_cost`
--

CREATE TABLE `tbl_additional_cost` (
  `idtbl_additional_cost` int(11) NOT NULL,
  `costtype` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '1=Active, 2=Inactive, 3=Deleted',
  `insertdatetime` datetime DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_additional_cost`
--

INSERT INTO `tbl_additional_cost` (`idtbl_additional_cost`, `costtype`, `description`, `status`, `insertdatetime`, `updatedatetime`, `tbl_user_idtbl_user`) VALUES
(1, 'test1', 'test', 1, '2025-03-16 12:19:55', '2025-03-16 12:20:19', 1),
(2, 'test 2', 'test', 1, '2025-03-17 01:21:02', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_additional_cost`
--
ALTER TABLE `tbl_additional_cost`
  ADD PRIMARY KEY (`idtbl_additional_cost`),
  ADD KEY `tbl_user_idtbl_user` (`tbl_user_idtbl_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_additional_cost`
--
ALTER TABLE `tbl_additional_cost`
  MODIFY `idtbl_additional_cost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_additional_cost`
--
ALTER TABLE `tbl_additional_cost`
  ADD CONSTRAINT `tbl_additional_cost_ibfk_1` FOREIGN KEY (`tbl_user_idtbl_user`) REFERENCES `tbl_user` (`idtbl_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

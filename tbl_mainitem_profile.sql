-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2025 at 12:57 PM
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
-- Table structure for table `tbl_mainitem_profile`
--

CREATE TABLE `tbl_mainitem_profile` (
  `idtbl_mainitem_profile` int(11) NOT NULL,
  `width` double NOT NULL,
  `height` double NOT NULL,
  `length` double NOT NULL,
  `reelsize` double NOT NULL,
  `cutsize` double NOT NULL,
  `actualreelsize` double NOT NULL,
  `actualcutsize` double NOT NULL,
  `noofups` double NOT NULL DEFAULT 0,
  `innersize` double NOT NULL,
  `outersize` double NOT NULL,
  `noofflies` double NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updatedatetime` double DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_row_material_idtbl_row_material` int(11) NOT NULL,
  `tbl_cuttype_idtbl_cuttype` int(11) NOT NULL,
  `tbl_mainitems_idtbl_mainitems` int(11) NOT NULL,
  `has_offset` tinyint(1) DEFAULT 0,
  `offset_length` decimal(10,3) DEFAULT NULL,
  `offset_width` decimal(10,3) DEFAULT NULL,
  `has_diecut` tinyint(1) DEFAULT 0,
  `diecut_length` decimal(10,3) DEFAULT NULL,
  `diecut_width` decimal(10,3) DEFAULT NULL,
  `noofbox` int(11) DEFAULT NULL,
  `tbl_cartontype_idtbl_cartontype` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mainitem_profile`
--

INSERT INTO `tbl_mainitem_profile` (`idtbl_mainitem_profile`, `width`, `height`, `length`, `reelsize`, `cutsize`, `actualreelsize`, `actualcutsize`, `noofups`, `innersize`, `outersize`, `noofflies`, `status`, `insertdatetime`, `updatedatetime`, `tbl_user_idtbl_user`, `tbl_row_material_idtbl_row_material`, `tbl_cuttype_idtbl_cuttype`, `tbl_mainitems_idtbl_mainitems`, `has_offset`, `offset_length`, `offset_width`, `has_diecut`, `diecut_length`, `diecut_width`, `noofbox`, `tbl_cartontype_idtbl_cartontype`) VALUES
(2, 1, 2, 4, 3, 5, 2, 3, 0, 2, 2, 2, 1, '2024-11-26 19:54:45', NULL, 1, 1, 1, 2, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(3, 25, 30, 23, 55, 48, 44, 55, 0, 23, 43, 1, 1, '2024-12-05 13:03:51', NULL, 1, 2, 1, 3, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(4, 23, 43, 123, 20, 146, 34, 30, 1, 32, 32, 2, 1, '2024-12-05 13:04:45', NULL, 1, 1, 1, 4, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(5, 4, 5, 3, 10.5, 8.5, 2, 3, 2, 2, 23, 2, 1, '2025-01-21 20:31:43', NULL, 1, 1, 1, 5, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(8, 9, 8, 11.5, 35, 43, 0, 0, 2, 0, 0, 1, 1, '2025-03-26 21:08:20', NULL, 1, 1, 1, 6, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(11, 18, 14.5, 20, 67, 78, 5, 5, 2, 5, 5, 2, 1, '2025-04-02 16:43:43', NULL, 1, 1, 1, 0, 1, '45.000', '42.000', 0, NULL, NULL, 5, 2),
(12, 5, 5, 5, 11, 22, 5, 5, 1, 5, 5, 2, 1, '2025-04-02 17:11:54', NULL, 1, 1, 1, 7, 1, '5.000', '5.000', 1, '5.000', '5.000', 5, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_mainitem_profile`
--
ALTER TABLE `tbl_mainitem_profile`
  ADD PRIMARY KEY (`idtbl_mainitem_profile`),
  ADD KEY `constraint_tbl_user_tbl_mainitem_profile` (`tbl_user_idtbl_user`),
  ADD KEY `constraint_tbl_mainitems_tbl_main_items_profile` (`tbl_mainitems_idtbl_mainitems`),
  ADD KEY `constraint_tbl_row_material_tbl_mainitem_profile` (`tbl_row_material_idtbl_row_material`),
  ADD KEY `constraint_tbl_cuttype_tbl_mainitem_profile` (`tbl_cuttype_idtbl_cuttype`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_mainitem_profile`
--
ALTER TABLE `tbl_mainitem_profile`
  MODIFY `idtbl_mainitem_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_mainitem_profile`
--
ALTER TABLE `tbl_mainitem_profile`
  ADD CONSTRAINT `constraint_tbl_cuttype_tbl_mainitem_profile` FOREIGN KEY (`tbl_cuttype_idtbl_cuttype`) REFERENCES `tbl_cuttype` (`idtbl_cuttype`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

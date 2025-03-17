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
-- Table structure for table `tbl_added_additional_costs`
--

CREATE TABLE `tbl_added_additional_costs` (
  `id` int(11) NOT NULL,
  `job_quotation_id` int(11) NOT NULL,
  `quotation_item` varchar(255) DEFAULT NULL,
  `additional_price` decimal(10,2) DEFAULT NULL,
  `cost_type` varchar(100) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `tbl_user_idtbl_user` int(11) DEFAULT NULL,
  `insertdatetime` datetime DEFAULT current_timestamp(),
  `updatedatetime` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_added_additional_costs`
--

INSERT INTO `tbl_added_additional_costs` (`id`, `job_quotation_id`, `quotation_item`, `additional_price`, `cost_type`, `remarks`, `status`, `tbl_user_idtbl_user`, `insertdatetime`, `updatedatetime`) VALUES
(1, 6, 'MAIN ITEM 02', '1000.00', 'test1', 'test update', 1, NULL, '2025-03-16 23:13:50', '2025-03-17 01:35:15'),
(2, 6, 'MAIN ITEM 02', '2000.00', 'test1', 'test r', 1, NULL, '2025-03-16 23:13:50', '2025-03-16 23:13:50'),
(3, 6, 'MAIN ITEM 02', '2000.00', 'test1', 'test r', 1, NULL, '2025-03-16 23:13:50', '2025-03-17 01:37:55'),
(4, 6, 'MAIN ITEM 03', '5000.00', 'test 2', 'test edit', 0, 1, '2025-03-17 07:52:20', '2025-03-17 14:52:00'),
(5, 6, 'MAIN ITEM 02', '900.00', 'test1', 'test 3', 0, 1, '2025-03-17 13:45:08', '2025-03-17 14:51:52'),
(6, 6, 'MAIN ITEM 03', '500.00', 'test1', 'ttt', 0, 1, '2025-03-17 14:51:23', '2025-03-17 14:51:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_added_additional_costs`
--
ALTER TABLE `tbl_added_additional_costs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_added_additional_costs`
--
ALTER TABLE `tbl_added_additional_costs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

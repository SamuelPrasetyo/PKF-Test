-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2025 at 06:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_samuel`
--

-- --------------------------------------------------------

--
-- Table structure for table `mdata`
--

CREATE TABLE `mdata` (
  `id` varchar(10) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `perusahaan` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mdata`
--

INSERT INTO `mdata` (`id`, `pic`, `perusahaan`, `created_at`, `updated_at`) VALUES
('pkf-1', 'Samuel', 'PKF', '2025-07-07 11:20:34', '2025-07-07 11:40:57'),
('pkf-2', 'TEST', 'TEST', '2025-07-07 11:40:47', '2025-07-07 11:40:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mdata`
--
ALTER TABLE `mdata`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

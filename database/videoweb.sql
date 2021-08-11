-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2021 at 02:16 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `videoweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ggusers`
--

CREATE TABLE `ggusers` (
  `uid` int(20) UNSIGNED NOT NULL,
  `gid` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pfp_url` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ggusers`
--

INSERT INTO `ggusers` (`uid`, `gid`, `name`, `email`, `pfp_url`) VALUES
(1, '115213823093861892123', 'Himanshu Sharma', 'himsharma9122006@gmail.com', 'https://lh3.googleusercontent.com/ogw/ADea4I672DNV7chizfQIakfppT1qyqCCAUI_asAub-cdxQ=s83-c-mo'),
(2, '118215757332599724105', 'Himanshu Sharma', 'himsharma.contact@gmail.com', 'https://lh3.googleusercontent.com/a-/AOh14Gg-zrhdzw2ubQvwS385yBx6LZ0211Rw-ElsS6d_=s96-c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ggusers`
--
ALTER TABLE `ggusers`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ggusers`
--
ALTER TABLE `ggusers`
  MODIFY `uid` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

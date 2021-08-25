-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2021 at 10:03 AM
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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `cid` int(10) UNSIGNED NOT NULL,
  `comment_text` mediumtext NOT NULL,
  `likes` int(10) NOT NULL,
  `commenter_uid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cid`, `comment_text`, `likes`, `commenter_uid`) VALUES
(1, 'ReloadTest1', 0, 1),
(2, 'ReloadTest2', 0, 1),
(3, '*markdown text*', 0, 1),
(4, '*markdown test 2*', 0, 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `rcid` int(10) NOT NULL,
  `reply_text` mediumtext NOT NULL,
  `likes` int(10) NOT NULL,
  `channel_uid` int(10) NOT NULL,
  `reply_cid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `wid` int(10) UNSIGNED NOT NULL,
  `video_title` varchar(50) NOT NULL,
  `video_description` mediumtext DEFAULT '\'Description not set\'',
  `likes` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `dislikes` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `views` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `thumbnail_link` text DEFAULT NULL,
  `video_link` text NOT NULL,
  `channel_uid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`wid`, `video_title`, `video_description`, `likes`, `dislikes`, `views`, `thumbnail_link`, `video_link`, `channel_uid`) VALUES
(1, 'TestVideo3', 'This is a text video made by Enerhim, Pls like and subscribe', 0, 0, 0, '../thumbnail/1/1628765545-1-TestVideo3.jpg', '../videos/1/1628765545-1-TestVideo3.mp4', 1),
(2, 'TestVideo4', '', 0, 0, 0, '../thumbnail/1/1628875169-1-TestVideo4.jpg', '../videos/1/1628875169-1-TestVideo4.mp4', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `ggusers`
--
ALTER TABLE `ggusers`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`rcid`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD UNIQUE KEY `unique` (`wid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ggusers`
--
ALTER TABLE `ggusers`
  MODIFY `uid` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `rcid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `wid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

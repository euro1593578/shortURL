-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2023 at 03:02 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `url`
--

CREATE TABLE `url` (
  `id_url` int(11) NOT NULL,
  `short_url` varchar(200) DEFAULT NULL,
  `common_url` varchar(1000) DEFAULT NULL,
  `clicked_short_url` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `url`
--

INSERT INTO `url` (`id_url`, `short_url`, `common_url`, `clicked_short_url`) VALUES
(22, '5ff19', 'https://www.youtube.com/watch?v=V8C4BIKCVUA&t=3488s&ab_channel=CodingNepal', 4),
(23, '94972', 'https://www.youtube.com/watch?v=KiYZvVwni9A&ab_channel=MISPLAY', 5),
(24, '740f0', 'http://localhost/phpmyadmin/index.php?route=/sql&db=test&table=url&pos=0', 7),
(25, 'b799c', 'https://www.facebook.com/', 11),
(26, 'ff232', 'https://www.youtube.com/watch?v=xHfq9XGom1w&ab_channel=iHAVECPU', 2),
(27, '0a028', 'https://www.youtube.com/watch?v=3ebx-GGGv_o&t=202s&ab_channel=PatiphanPhengpao', 1),
(28, 'd7b04', 'https://www.google.com/?gws_rd=ssl', 0),
(29, '0b429', 'https://developer.mozilla.org/en-US/docs/Web/API/Element/childElementCount', 0),
(30, '4a7a6', 'https://htmlcolorcodes.com/', 0),
(31, '5efba', 'https://www.facebook.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `url`
--
ALTER TABLE `url`
  ADD PRIMARY KEY (`id_url`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `url`
--
ALTER TABLE `url`
  MODIFY `id_url` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2017 at 02:24 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfoliodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentid` int(11) NOT NULL,
  `comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentid`, `comment`) VALUES
(217, 'p&aring;l'),
(218, 'p&aring;l'),
(219, 'Sigrid'),
(220, 'hej'),
(221, 'Sigrid'),
(222, 'hej'),
(223, 'Sigrid'),
(224, 'hej1'),
(225, 'heuh'),
(226, 'kdnfs'),
(227, 'heuh'),
(228, 'kdnfs'),
(229, 'Sigrid'),
(230, 'hej1'),
(231, 'Sigrid'),
(232, 'hej'),
(233, 'Sigrid'),
(234, 'hej'),
(235, 'Sigrid'),
(236, 'hej'),
(237, 'Sigrid'),
(238, 'hej'),
(239, 'Sigrid'),
(240, 'hej'),
(241, 'Sigrid'),
(242, 'jag&auml;ter'),
(243, 'Sigrid'),
(244, 'jag&auml;ter'),
(245, 'Sigrid'),
(246, 'hej'),
(247, 'Sigrid'),
(248, 'hej'),
(249, 'Sigrid'),
(250, 'hej'),
(251, 'Sigrid'),
(252, 'hej'),
(253, 'kakan'),
(254, 'kakan'),
(255, 'kakan'),
(256, 'kakan'),
(257, 'kakan'),
(258, 'kakan'),
(259, 'Sigrid'),
(260, 'hej'),
(261, 'Sigrid'),
(262, 'hej'),
(263, 'Sigrid'),
(264, 'hej'),
(265, 'Sigrid'),
(266, 'hej'),
(267, 'Sigrid'),
(268, 'hej'),
(269, 'Sigrid'),
(270, 'hej'),
(271, 'Sigrid'),
(272, 'hej'),
(273, 'Sigrid'),
(274, 'hej'),
(275, 'Sigrid'),
(276, 'hej'),
(277, 'Sigrid'),
(278, 'hej'),
(279, 'asda'),
(280, 'asdasd'),
(281, 'Sigrid'),
(282, ''),
(283, 'Sigrid'),
(284, 'hej'),
(285, 'Sigrid'),
(286, 'hej'),
(287, 'Sigrid'),
(288, 'hej'),
(289, 'Sigrid'),
(290, 'hej'),
(291, 'Sigrid'),
(292, 'hej'),
(293, 'Sigrid'),
(294, 'hej'),
(295, 'Sigrid'),
(296, 'hej'),
(297, 'Sigrid'),
(298, 'hej'),
(299, 'Sigrid'),
(300, 'hej'),
(301, 'Sigrid'),
(302, 'hej'),
(303, 'Sigrid'),
(304, 'hej'),
(305, 'Sigrid'),
(306, 'hej'),
(307, 'Sigrid'),
(308, 'hej'),
(309, 'Sigrid'),
(310, 'hej'),
(311, 'Sigrid'),
(312, 'hej'),
(313, 'Sigrid'),
(314, 'hej'),
(315, 'Sigrid'),
(316, 'hej'),
(317, 'Sigrid'),
(318, 'hej');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imageid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `portfolioid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `imageid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `public` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tagged`
--

CREATE TABLE `tagged` (
  `portfolioid` int(11) NOT NULL,
  `tagid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tagid` int(11) NOT NULL,
  `tag` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tagid`, `tag`) VALUES
(1, 'nature'),
(3, 'photography'),
(4, 'people'),
(5, 'sunset'),
(6, 'beach'),
(7, 'city'),
(8, 'leaves'),
(9, 'portrait'),
(10, 'BW'),
(12, 'storm'),
(13, 'food'),
(14, 'travel'),
(15, 'vacation'),
(16, 'children'),
(17, 'family'),
(18, 'camera'),
(19, 'nikon'),
(20, 'canon'),
(21, 'analog'),
(22, 'light'),
(23, 'candles'),
(24, 'work'),
(25, 'project'),
(26, 'fire'),
(27, 'lake'),
(28, 'Sweden'),
(29, 'Europe'),
(30, 'Asia'),
(31, 'Africa'),
(32, 'clothes'),
(34, 'computer'),
(35, 'glass'),
(36, 'restaurant'),
(37, 'studio'),
(38, 'love'),
(39, 'dog'),
(40, 'pet'),
(41, 'action'),
(42, 'exposure'),
(43, 'bokeh'),
(44, 'documentary'),
(45, 'school'),
(46, 'plant'),
(47, 'sky'),
(48, 'clouds'),
(49, 'happiness'),
(50, 'guitar'),
(51, 'fireworks'),
(52, 'footprint'),
(53, 'contrast'),
(54, 'water');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `userpass` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `userpass`, `fname`, `lname`, `mail`, `phone`) VALUES
(26, 'Sigrid', 'c412b37f8c0484e6db8bce177ae88c5443b26e92', 'Sig', 'Sag', 'sugg@u', 123),
(27, 'kakan', '84cea05109661fbd6b1a6a7716caec0ceb009cb0', 'Karin', 'Eriksson', 'karin@hotmail.com', 112);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imageid`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`portfolioid`),
  ADD KEY `userid_FK` (`userid`),
  ADD KEY `imageid_FK` (`imageid`);

--
-- Indexes for table `tagged`
--
ALTER TABLE `tagged`
  ADD KEY `portfolioid` (`portfolioid`),
  ADD KEY `tagid` (`tagid`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tagid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=319;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imageid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `portfolioid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tagid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `portfolio_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `portfolio_ibfk_2` FOREIGN KEY (`imageid`) REFERENCES `images` (`imageid`);

--
-- Constraints for table `tagged`
--
ALTER TABLE `tagged`
  ADD CONSTRAINT `tagged_ibfk_1` FOREIGN KEY (`portfolioid`) REFERENCES `portfolio` (`portfolioid`),
  ADD CONSTRAINT `tagged_ibfk_2` FOREIGN KEY (`tagid`) REFERENCES `tags` (`tagid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

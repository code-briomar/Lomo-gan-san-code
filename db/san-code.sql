-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2022 at 07:23 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `san-code`
--

-- --------------------------------------------------------

--
-- Table structure for table `summary_table`
--

CREATE TABLE `summary_table` (
  `id` int(11) NOT NULL,
  `ailment` text NOT NULL,
  `cases` int(11) NOT NULL,
  `reCases` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `month` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `summary_table`
--

INSERT INTO `summary_table` (`id`, `ailment`, `cases`, `reCases`, `day`, `month`) VALUES
(165, 'Diarrhoea', 0, 1, 5, 6),
(166, 'Tuberculosis', 0, 1, 5, 6),
(167, 'Dysentery ( Bloody Diarrhoea )', 0, 1, 5, 6),
(168, 'Diarrhoea', 0, 1, 5, 6),
(169, 'Diarrhoea', 0, 1, 5, 6),
(170, 'Tuberculosis', 0, 1, 5, 6),
(171, 'Diarrhoea', 0, 1, 5, 6),
(172, '', 0, 0, 6, 8),
(173, '', 0, 0, 6, 8),
(174, '', 0, 0, 6, 8),
(175, '', 0, 0, 6, 8),
(176, '', 0, 0, 6, 8),
(177, '', 0, 0, 6, 8),
(178, '', 0, 0, 6, 8),
(179, '', 0, 0, 6, 8),
(180, '', 0, 0, 6, 8),
(181, '', 0, 0, 6, 8),
(182, '', 0, 0, 6, 8),
(183, '', 0, 0, 6, 8),
(184, '', 0, 0, 6, 8),
(185, '', 0, 0, 6, 8),
(186, '', 0, 0, 6, 8),
(187, '', 0, 0, 6, 8),
(188, '', 0, 0, 6, 8),
(189, '', 0, 0, 6, 8),
(190, 'fever', 2, 0, 6, 8),
(191, 'fever', 0, 2, 6, 8),
(192, '', 0, 0, 6, 8),
(193, '', 0, 0, 6, 8),
(194, '', 0, 0, 6, 8),
(195, '', 0, 0, 6, 8),
(196, '', 0, 0, 6, 8),
(197, '', 0, 0, 7, 8),
(198, '', 0, 0, 7, 8),
(199, '', 0, 0, 7, 8),
(200, '', 0, 0, 7, 8),
(201, '', 0, 0, 7, 8),
(202, '', 0, 0, 7, 8),
(203, '', 0, 0, 7, 8),
(204, '', 0, 0, 7, 8),
(205, '', 0, 0, 7, 8),
(206, '', 0, 0, 7, 8),
(207, '', 0, 0, 7, 8),
(208, '', 0, 0, 7, 8),
(209, '', 0, 0, 7, 8),
(210, '', 0, 0, 7, 8),
(211, '', 0, 0, 7, 8),
(212, '', 0, 0, 7, 8),
(213, '', 0, 0, 7, 8),
(214, '', 0, 0, 7, 8),
(215, '', 0, 0, 7, 8),
(216, '', 0, 0, 7, 8),
(217, '', 0, 0, 7, 8),
(218, '', 0, 0, 7, 8),
(219, '', 0, 0, 8, 8),
(220, '', 0, 0, 8, 8),
(221, '', 0, 0, 9, 8),
(222, '', 0, 0, 9, 8),
(223, '', 0, 0, 10, 8),
(224, '', 0, 0, 10, 8),
(225, '', 0, 0, 10, 8),
(226, '', 0, 0, 10, 8),
(227, 'Fevers', 2, 0, 10, 8),
(228, 'Fevers', 0, 2, 10, 8),
(229, '', 0, 0, 10, 8),
(230, '', 0, 0, 10, 8),
(231, '', 0, 0, 10, 8),
(232, '', 0, 0, 10, 8),
(233, '', 0, 0, 10, 8),
(234, '', 0, 0, 10, 8),
(235, '', 0, 0, 10, 8),
(236, '', 0, 0, 10, 8),
(237, '', 0, 0, 10, 8),
(238, '', 0, 0, 10, 8),
(239, '', 0, 0, 10, 8),
(240, '', 0, 0, 10, 8),
(241, '', 0, 0, 10, 8),
(242, '', 0, 0, 10, 8),
(243, '', 0, 0, 10, 8),
(244, '', 0, 0, 10, 8),
(245, '', 0, 0, 10, 8),
(246, '', 0, 0, 10, 8),
(247, '', 0, 0, 10, 8),
(248, '', 0, 0, 10, 8),
(249, '', 0, 0, 10, 8),
(250, '', 0, 0, 10, 8),
(251, '', 0, 0, 11, 8),
(252, 'Fevers', 1, 0, 11, 8),
(253, 'Fevers', 0, 3, 11, 8),
(254, '', 0, 0, 11, 8),
(255, '', 0, 0, 11, 8),
(256, '', 0, 0, 11, 8),
(257, '', 0, 0, 11, 8),
(258, '', 0, 0, 11, 8),
(259, '', 0, 0, 11, 8),
(260, 'Fevers', 1, 0, 11, 8),
(261, 'Fevers', 0, 1, 11, 8),
(262, '', 0, 0, 13, 8),
(263, '', 0, 0, 13, 8),
(264, '', 0, 0, 13, 8),
(265, '', 0, 0, 20, 8),
(266, '', 0, 0, 25, 8),
(267, '', 0, 0, 25, 8),
(268, '', 0, 0, 9, 9),
(269, '', 0, 0, 9, 9),
(270, '', 0, 0, 9, 9),
(271, '', 0, 0, 16, 9),
(272, '', 0, 0, 16, 9),
(273, '', 0, 0, 16, 9),
(274, '', 0, 0, 16, 9),
(275, '', 0, 0, 16, 9),
(276, '', 0, 0, 16, 9),
(277, '', 0, 0, 16, 9),
(278, '', 0, 0, 16, 9),
(279, '', 0, 0, 16, 9),
(280, '', 0, 0, 16, 9),
(281, '', 0, 0, 16, 9),
(282, '', 0, 0, 16, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `sname` text NOT NULL,
  `tname` text NOT NULL,
  `ftname` text NOT NULL,
  `adm_no` int(11) NOT NULL,
  `class` text NOT NULL,
  `ailment` text NOT NULL,
  `medication` text NOT NULL,
  `comment` text NOT NULL,
  `toOtherHealthFacility` int(11) NOT NULL,
  `fromOtherHealthFacility` int(11) NOT NULL,
  `toCommunityUnit` int(11) NOT NULL,
  `fromCommunityUnit` int(11) NOT NULL,
  `first` int(11) NOT NULL,
  `counted` int(11) NOT NULL,
  `temp` decimal(3,1) NOT NULL,
  `day` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `fname`, `sname`, `tname`, `ftname`, `adm_no`, `class`, `ailment`, `medication`, `comment`, `toOtherHealthFacility`, `fromOtherHealthFacility`, `toCommunityUnit`, `fromCommunityUnit`, `first`, `counted`, `temp`, `day`, `time`) VALUES
(5, 'Fred', 'Barnes', '', '', 13256, '4D', 'Leg', 'Asprin', 'Headache', 1, 0, 0, 0, 1, 2, '25.0', 16, '2022-09-16 04:22:13'),
(26, 'Doe', '', '', '', 12345, '4I', 'Fractures', 'Asprin', 'Leg', 1, 0, 0, 0, 0, 0, '38.0', 11, '2022-08-11 09:29:59'),
(27, 'Alexa', '', '', '', 54321, '', 'Fractures', 'Asprin', 'Leg pains', 1, 0, 0, 0, 1, 2, '37.0', 11, '2022-08-11 09:30:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `summary_table`
--
ALTER TABLE `summary_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `summary_table`
--
ALTER TABLE `summary_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=283;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

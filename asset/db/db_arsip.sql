-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2018 at 03:55 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_arsip`
--

-- --------------------------------------------------------

--
-- Table structure for table `desposition`
--

CREATE TABLE `desposition` (
  `id_desposition` int(11) NOT NULL,
  `desposition_at` varchar(50) NOT NULL,
  `reply_at` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `notification` varchar(20) NOT NULL,
  `mailid_mail` int(11) NOT NULL,
  `userid_user` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `despositionid_desposition` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `id_mail` int(11) NOT NULL,
  `incoming_at` varchar(20) NOT NULL,
  `mail_code` varchar(50) NOT NULL,
  `mail_date` varchar(30) NOT NULL,
  `mail_from` varchar(30) NOT NULL,
  `mail_to` varchar(30) NOT NULL,
  `mail_subject` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `file` blob NOT NULL,
  `mail_typeid_type` int(11) NOT NULL,
  `userid_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mail_type`
--

CREATE TABLE `mail_type` (
  `id_type` int(11) NOT NULL,
  `mail_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mail_type`
--

INSERT INTO `mail_type` (`id_type`, `mail_type`) VALUES
(1, 'Surat Resmi'),
(2, 'Surat Pribadi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `desposition`
--
ALTER TABLE `desposition`
  ADD PRIMARY KEY (`id_desposition`),
  ADD KEY `despositionid_desposition` (`despositionid_desposition`),
  ADD KEY `mailid_mail` (`mailid_mail`),
  ADD KEY `userid_user` (`userid_user`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`id_mail`),
  ADD KEY `userid_user` (`userid_user`),
  ADD KEY `mail_typeid_type` (`mail_typeid_type`);

--
-- Indexes for table `mail_type`
--
ALTER TABLE `mail_type`
  ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `desposition`
--
ALTER TABLE `desposition`
  MODIFY `id_desposition` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `id_mail` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mail_type`
--
ALTER TABLE `mail_type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `desposition`
--
ALTER TABLE `desposition`
  ADD CONSTRAINT `desposition_ibfk_1` FOREIGN KEY (`despositionid_desposition`) REFERENCES `desposition` (`id_desposition`),
  ADD CONSTRAINT `desposition_ibfk_2` FOREIGN KEY (`mailid_mail`) REFERENCES `mail` (`id_mail`),
  ADD CONSTRAINT `desposition_ibfk_3` FOREIGN KEY (`userid_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `mail`
--
ALTER TABLE `mail`
  ADD CONSTRAINT `mail_ibfk_1` FOREIGN KEY (`mail_typeid_type`) REFERENCES `mail_type` (`id_type`),
  ADD CONSTRAINT `mail_ibfk_2` FOREIGN KEY (`userid_user`) REFERENCES `user` (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

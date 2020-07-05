-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 22, 2019 at 08:23 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foursquare_master`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_user` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone_number` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `confirmcode` text NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_user`, `name`, `email`, `phone_number`, `username`, `password`, `confirmcode`, `type`) VALUES
(0, 'CFGP', 'sample@sample.com', '', 'admin', 'c0bc031f44d41265c14762124410b4b6', 'y', 'admin'),
(1, 'NELD', '', '5831', 'neld', 'e74d45e7f1653b4fd5db5af96b408442', 'y', 'district'),
(2, 'NWLD', '', '7057', 'nwld', '6d536fe4dc0b7cea33c9c45e6eba1426', 'y', 'district'),
(3, 'CD', '', '1596', 'cd', '9c464827f81db4edc969d7b7197cadc1', 'y', 'district'),
(4, 'PD', '', '8081', 'pd', '1c669851c57dd130ef0c3d7687f1415b', 'y', 'district'),
(5, 'CLD', '', '9267', 'cld', '958b10cac5f697a171b0593cb79f2b42', 'y', 'district'),
(6, 'MMND', '', '7283', 'mmnd', '3f0780fb0b1bab300b26817414e9aafa', 'y', 'district'),
(7, 'MMSD', '', '3291', 'mmsd', '1872ee3d140673dc85964f4c30f2faa3', 'y', 'district'),
(8, 'SLD', '', '7497', 'sld', '7fd2714b16934179f17ff84569342746', 'y', 'district'),
(9, 'BD', '', '5530', 'bd', '0b53fcb7ddb34a40a9284bae898038e6', 'y', 'district'),
(10, 'ORMD', '', '7525', 'ormd', 'dc7f6ea71d4e8bd9e1328766fa78652a', 'y', 'district'),
(11, 'OCMD', '', '9160', 'ocmd', '9a07c8ef2df8ff8349572a96e1aca598', 'y', 'district'),
(12, 'RAD', '', '4523', 'rad', 'e026b4e1a422c7f984a956f89d70788d', 'y', 'district'),
(13, 'WVD', '', '8643', 'wvd', '2aa2474803b718c6bd4ce38ea16568de', 'y', 'district'),
(14, 'EVD', '', '3362', 'evd', '5cd3d49386517310211d9c7f644e89a8', 'y', 'district'),
(15, 'CVD', '', '8783', 'cvd', '3192b5bbf5de6127e37dccc2e59ba8c2', 'y', 'district'),
(16, 'NORSD', '', '3879', 'norsd', '0c80ab9396828a7fc4e00b38a3440b2a', 'y', 'district'),
(17, 'ASD', '', '5584', 'asd', '6479f27a06209df074a848aeb806f547', 'y', 'district'),
(18, 'NMD', '', '6937', 'nmd', '43019eafa2231634af297bdb14d5d104', 'y', 'district'),
(19, 'NEMD', '', '9665', 'nemd', '2183596b8df48d2d810c630861af81ea', 'y', 'district'),
(20, 'NCMD', '', '9419', 'ncmd', '81dd345f49c4bf40dbc5668d2755b5e7', 'y', 'district'),
(21, 'NWMD', '', '5879', 'nwmd', 'bcb8df03fbee83f725c0ac1d4f82facf', 'y', 'district'),
(22, 'CMD', '', '5857', 'cmd', '71ade9fbb3280bfd587bccd700e28f71', 'y', 'district'),
(23, 'MMD', '', '2512', 'mmd', '60ea6ec5b91fb4c956e9d9f65705cf24', 'y', 'district'),
(24, 'SCMD', '', '1951', 'scmd', '555a4d23a078f2e52a59350260a91df6', 'y', 'district'),
(53, 'SMD', '', '4187', 'smd', 'c5361ec56cc2b7138b4d81a505239ce2', 'y', 'district'),
(54, 'ZBSD', '', '8956', 'zbsd', '0fa56ee640b36c2979251a8da09121f0', 'y', 'district'),
(55, 'Giddel', 'sample@sample.com', '', 'admin', '1c3d9263894607438f7785a89c75b451', 'y', 'admin'),
(56, 'Encoder 1', 'encoder@encoder.com', '0', 'encoder', '81dc9bdb52d04dc20036dbd8313ed055', 'y', 'encoder');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

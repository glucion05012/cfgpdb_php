-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2017 at 05:53 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pastorsprofile`
--

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `ID` int(11) NOT NULL,
  `name` text NOT NULL,
  `bday` text NOT NULL,
  `statussm` text NOT NULL,
  `statusse` text NOT NULL,
  `schooloccup` text NOT NULL,
  `profileID` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`ID`, `name`, `bday`, `statussm`, `statusse`, `schooloccup`, `profileID`) VALUES
(1, 'Psalmuel E. Mancilla', '2016-01-29', 'Single', 'Infant', 'N/A', '3'),
(2, 'Joanne Paul Lyn Separa', '1992-08-31', 'Single', 'Employed', 'College ', '4'),
(3, 'John Peter Michael Separa', '1996-12-10', 'Single', 'Student', '4th Year', '4'),
(4, 'Johannah Claris Naomi', '1998-02-19', 'Single', 'Student', '3rd Year', '4'),
(5, 'John Philip Onesimus', '1999-10-21', 'Single', 'Student', 'Grade II', '4'),
(6, 'Mhel Andrew E. Bonto', '2000-10-17', 'Single', 'Student', 'Grade 10', '5'),
(7, 'Rosh Asher E. Bonto', '2004-05-27', 'Single', 'Student', 'Grade 7', '5'),
(8, 'Rommel E. Bonto, Jr.', '2009-02-25', 'Single', 'Student', 'Grade 2', '5'),
(16, 'Aisa L. Tabuna', '1986-03-01', 'Single Parent', 'Employed', 'College', '6'),
(17, 'Rolyn T. Arceño', '1987-07-11', 'Married', 'Unemployed', 'College', '6'),
(18, 'Dean David Antigua', '2011-12-28', 'Single', 'Student', 'Daycare', '8'),
(19, 'Keilahlael A. Gal', '0986-09-21', 'Married', 'Employed', 'College', '9'),
(20, 'Cyril A. Gal', '1988-05-06', 'Single', 'Employed', 'College', '9'),
(21, 'Karel A. Gal', '1991-12-06', 'Single', 'Student', 'College', '9'),
(22, 'Chara Lovielle A. Gal', '2002-04-03', 'Single', 'Student', 'Grade 9', '9'),
(23, 'Jairel G. Regondola', '1995-10-24', 'Single', 'Employed', '', '10'),
(24, 'Shekinah G. Regondola', '1995-08-08', 'Single', 'Student', '3rd College', '10'),
(25, 'James G. Regondola', '1999-06-28', 'Single', 'Student', '2nd year College', '10'),
(26, 'John Ezikiel S. Pablo', '2003-10-20', 'Single', 'Student', 'Grade 7', '11'),
(27, 'Mark Francis R. Pigao', '1990-03-28', 'Married', 'Employed', 'College', '12'),
(28, 'Kesia R. Pigao', '1992-02-07', 'Single', 'Unemployed', 'Under Graduate', '12'),
(29, 'Franklin R. Pigao', '1994-10-20', 'Single', 'Unemployed', '', '12'),
(30, 'Hannah R. Pigao', '1997-05-11', 'Single', 'Student', 'College', '12'),
(31, 'Johnjay G. Amar', '0988-11-21', 'Single', 'Employed', 'College', '13'),
(32, 'Johnelle G. Amar', '1990-05-31', 'Single', 'Unemployed', '', '13'),
(33, 'Stephen G. Amar', '1992-08-29', 'Single', 'Employed', 'College', '13'),
(34, 'Joyelle G. Amar', '1998-02-10', 'Single', 'Student', 'College', '13'),
(35, 'Jovegayle G. Amar', '2003-10-16', 'Single', 'Student', 'Grade 8', '13'),
(36, 'Eljon Japheth G. Bartolome', '0998-04-21', 'Single', 'Student', '2nd year College', '14'),
(37, 'Eljon Joshua G. Bartolome', '2000-10-09', 'Single', 'Student', '4th year High School`', '14'),
(38, 'Ellen Joyce G. Bartolome', '2002-11-29', 'Married', 'Student', '3rd year High School', '14'),
(39, 'Kyra Mae B. Tabali', '2002-10-06', 'Single', 'Student', 'Grade 8', '15'),
(40, 'Evelyn De Leon', '1969-11-23', 'Single', 'Employed', 'College', '16'),
(41, 'John Mark Panggat', '1991-10-13', 'Single', 'Student', '', '16'),
(42, 'Joanne Paul Lyn Separa', '1992-08-31', 'Single', 'Employed', 'College', '19'),
(43, 'John Peter Michael Separa', '1996-12-10', 'Single', 'Student', '4th year', '19'),
(44, 'Johannah Charis Naomi Separa', '1998-02-19', 'Single', 'Student', '3rd year', '19'),
(45, 'John Philip Onisemus Separa', '1999-10-21', 'Single', 'Student', 'Grade 2', '19'),
(46, 'Ron Anthony B. Abad', '1987-02-08', 'Single', 'Employed', 'College', '21'),
(47, 'Videth Jean B. Abad', '1990-10-26', 'Single', 'Employed', 'College', '21'),
(48, 'Jessah Jean A. Irinco', '1992-09-22', 'Married', 'Employed', 'College', '21'),
(49, 'Mitasha Rito Estoperes', '2008-12-08', 'Single', 'Student', 'Elementary', '2'),
(50, 'Aisa L. Tabuna', '1986-03-01', 'Single Parent', 'Employed', 'College', '7'),
(51, 'Rolyn T. Arceño', '1987-07-11', 'Married', 'Unemployed', 'College', '7'),
(52, 'Lemuel P. Agbuya', '1993-11-05', 'Single', 'Student', 'College', '22'),
(53, 'Jad R. Bautista', '1993-10-12', 'Single', 'Employed', 'College', '23'),
(54, 'Jet R. Bautista', '2002-07-12', 'Single', 'Student', 'Grade 9', '23'),
(55, 'Jeo R. Bautista', '1999-08-31', 'Single', 'Student', 'Grade 2', '23'),
(56, 'Jad R. Bautista', '1993-10-12', 'Single', 'Employed', 'College', '24'),
(57, 'Jet R. Bautista', '2002-07-12', 'Single', 'Student', 'Grade 9', '24'),
(58, 'Jeo R. Bautista', '2009-08-31', 'Single', 'Student', 'Grade 2', '24'),
(59, 'Zoe Ian E. Tindungan', '2000-03-14', 'Single', 'Student', 'Grade 11', '25'),
(60, 'Shekinah Grace E. Tindungan', '2001-06-06', 'Single', 'Student', 'Grade 10', '25'),
(61, 'Azriel Jireh E. Tindungan', '2006-07-07', 'Single', 'Student', 'Grade 4', '25'),
(62, 'Zoe Ian E. Tindungan', '2000-03-14', 'Single', 'Student', 'Grade 11', '26'),
(63, 'Shekinah E. Tindungan', '2001-06-06', 'Single', 'Student', 'Grade 10', '26'),
(64, 'Azriel Jireh E. Tindungan', '2006-07-07', 'Single', 'Student', 'Grade 4', '26'),
(65, 'Mark T. Bugarin', '1992-10-24', 'Married', 'Employed', 'College', '27'),
(66, 'Micah T. Bugarin', '1996-08-21', 'Single', 'Student', '3rd year College', '27'),
(67, 'Luke T. Bugarin', '2002-01-07', 'Single', 'Student', 'Grade 9', '27'),
(68, 'James T. Bugarin', '2006-04-23', 'Single', 'Student', 'Grade 5', '27'),
(69, 'Micah Jezer A. Bugarin', '1992-10-26', 'Single', 'Student', 'College', '28'),
(70, 'John Kenaz A. Bugarin', '1998-10-28', 'Single', 'Student', 'College', '28'),
(71, 'Hannah Mae A. Bugarin', '2002-08-05', 'Single', 'Student', 'High School', '28'),
(72, 'Lysha Danisse M. Bañaga', '2005-01-17', 'Single', 'Student', 'Grade 6', '29'),
(73, 'Charisma M. Bañaga', '2007-01-22', 'Single', 'Student', 'Grade 4', '29'),
(74, 'Josiah M. Bañaga', '2012-01-27', 'Single', 'Student', 'Kinder 1', '29'),
(75, 'Keynaan B. Cuaresma', '2008-06-30', 'Single', 'Student', 'Grade 3', '30'),
(76, 'Keziah T. Fabros', '1997-02-04', 'Single', 'Student', 'College', '31'),
(77, 'Jeziel T. Fabros', '2000-12-20', 'Single', 'Student', 'High School', '31'),
(78, 'Krizza T. Fabros', '2005-05-05', 'Single', 'Student', 'Elementary', '31'),
(79, 'Joel Michael F. Vergara', '1985-11-01', 'Married', 'Employed', 'BSN', '32'),
(80, 'Jem F. Vergara', '1989-11-23', 'Married', 'Employed', 'BSRT', '32'),
(81, 'Abigail F. Vergara', '1994-01-03', 'Single', 'Student', 'Dentistry', '32'),
(82, 'Audrey F. Vergara', '1999-07-04', 'Single', 'Student', 'Grade 11', '32'),
(83, 'Tim Paul Villanueva ', '1986-11-21', 'Married', 'Employed', 'College', '33'),
(84, 'Diovanie Villanueva', '1988-10-07', 'Single', 'Employed', 'College', '33'),
(85, 'Hezekiel Villanueva', '1995-05-23', 'Single', 'Unemployed', 'College', '33'),
(86, 'Shalimar C. Gigante', '1983-06-06', 'Married', 'Employed', 'College', '34'),
(87, 'Raul N. Cagaoan, Jr.', '1984-08-18', 'Single', 'Employed', 'College', '34'),
(88, 'Christopher N. Cagaoan', '1986-04-21', 'Married', 'Employed', 'College', '34'),
(89, 'Charmaine C. Andaya', '1988-10-17', 'Married', 'Employed', 'College', '34'),
(90, 'Christine Joy N. Cagaoan', '1991-03-13', 'Single', 'Employed', 'College', '34'),
(91, 'Tim Paul B. Villanueva', '1986-11-21', 'Married', 'Employed', 'College', '35'),
(92, 'Diovanie B. Villanueva', '1988-10-07', 'Single', 'Employed', 'College', '35'),
(93, 'Hezekiah B. Villanueva', '1995-05-23', 'Single', 'Student', 'College', '35'),
(94, 'Joshua Caleb R. Tadena', '1997-02-28', 'Single', 'Student', 'College', '37'),
(95, 'Abigail Lois R. Tadena', '2005-02-01', 'Single', 'Student', 'Elementary', '37'),
(96, 'Ezekiel John T. Tadena', '1996-07-31', 'Single', 'Student', 'College', '38'),
(97, 'Elisha James T. Tadena', '1998-02-28', 'Single', 'Student', 'College', '38'),
(98, 'Isabel T. Tadena', '2006-03-11', 'Single', 'Student', 'Elementary', '38'),
(99, 'Justin Diego E. Lanuza', '2000-10-09', 'Single', 'Student', 'Grade 2', '39'),
(100, 'Ryan Rey T. Dy', '1980-11-26', 'Married', 'Unemployed', '', '40'),
(101, 'Kit Samuel P. Manaois', '1994-05-07', 'Single', 'Unemployed', 'College', '41'),
(102, 'Kenedy P. Manaois', '1998-10-28', 'Single', 'Student', 'College', '41'),
(103, 'Kelly P. Manaois', '2001-06-24', 'Single', 'Student', 'High School', '41'),
(104, 'Excel Jether C. Bautista', '1994-10-13', 'Single', 'Student', 'College', '44'),
(105, 'Jairus C. Bautista', '1995-03-17', 'Single', 'Student', 'College', '44'),
(106, 'Jehu C. Bautista', '2005-03-26', 'Single', 'Student', 'Grade 6', '44'),
(107, 'Klyrwin Jeff J. Manipon', '1995-03-01', 'Single', 'Student', 'College', '45'),
(108, 'Wilfrando J. Manipon, Jr.', '1996-09-14', 'Single', 'Student', 'College', '45'),
(109, 'Clymar John J. Manipon', '1998-03-09', 'Single', 'Student', 'College', '45'),
(110, 'Shammah Mae J. Manipon', '2002-04-07', 'Single', 'Student', 'Grade 9', '45'),
(111, 'Charis Love J. Manipon', '2008-10-29', 'Single', 'Student', 'Grade 3', '45'),
(112, 'Elim Grace B. Aquino', '1997-09-23', 'Single', 'Student', 'College', '46'),
(113, 'Bethel Joy B. Aquino', '2000-12-18', 'Single', 'Student', 'Grade 10', '46'),
(114, 'Carmel Faith B. Aquino', '2000-11-03', 'Single', 'Student', 'Grade 8', '46'),
(115, 'Exel Joy M. Garcia', '2008-09-30', 'Single', 'Student', 'Grade 3', '47'),
(116, 'Krissha Belle M. Rosetes', '1993-03-07', 'Single', 'Employed', 'College', '48'),
(117, 'Kyra Lyn Joi M. Rosetes', '1998-07-29', 'Single', 'Student', '', '48'),
(118, 'Kissy May M. Rosetes', '2007-05-04', 'Single', 'Student', '', '48'),
(119, 'Junnacito Ribot, Jr.', '1989-04-27', 'Single', 'Student', 'College', '49'),
(121, 'Junnalyn Ribot', '1986-01-29', 'Single', 'Student', 'College', '49'),
(122, 'Jamela R. Camones', '1993-03-23', 'Married', 'Student', 'College', '49'),
(123, 'Junnamae Ribot', '2003-03-17', 'Single', 'Student', 'High School', '49'),
(124, 'Amylou A. Tabug', '1998-09-23', 'Single', 'Student', 'College', '50'),
(125, 'Alfie John A. Tabug', '2000-01-14', 'Single', 'Student', 'Grade 11', '50'),
(126, 'John A. Tabug', '2003-03-23', 'Single', 'Student', 'Grade 8', '50'),
(127, 'Joan A. Tabug', '2009-06-02', 'Single', 'Student', 'Grade 2', '50'),
(128, 'Chester Jan Estoque', '2000-02-25', 'Single', 'Student', 'Senior High', '51'),
(129, 'Justin Chris Estoque', '2008-12-29', 'Single', 'Student', 'Elementary', '51'),
(130, 'Kathryn Jewel Ballesteros', '2000-08-20', 'Single', 'Student', 'Grade 10', '52'),
(131, 'Mark Jemuel Ballesteros', '2004-04-07', 'Single', 'Student', 'Grade 7', '52'),
(132, 'John Humphrey C. Sandagon', '2005-09-26', 'Single', 'Student', 'Grade 4', '53'),
(133, 'Exel Joy M. Garcia', '2008-09-30', 'Single', 'Student', 'Grade 3', '54'),
(134, 'Maguirine Acierto', '1988-10-15', 'Married', 'Employed', 'College Graduate', '57'),
(135, 'Anjorine Acierto', '1990-07-25', 'Married', 'Employed', 'College Undergraduate', '57'),
(136, 'Marianne Faith Innah D. Ferrer', '1997-02-24', 'Single', 'Student', '4th year College', '58'),
(137, 'Edwin Immanuel D. Ferrer', '1999-08-21', 'Single', 'Student', 'Grade 6', '58'),
(138, 'Elijah Jireh D. Ferrer', '2008-09-16', 'Single', 'Student', 'Grade 3', '58'),
(139, 'Abel Torres', '1992-03-01', 'Single', 'Employed', 'College', '60'),
(140, 'Jeriel Paul Torres', '1996-09-15', 'Single', 'Student', '4th College', '60'),
(141, 'Gabriel Mark Torres', '1999-07-01', 'Single', 'Student', '2nd year College', '60'),
(142, 'Mark Genesis ', '1995-12-10', 'Single', 'Employed', 'College', '61'),
(143, 'Alethea', '2003-12-13', 'Single', 'Student', 'Grade 7', '61'),
(144, 'Ferhadeen', '2006-06-15', 'Single', 'Student', 'Grade 5', '61'),
(145, 'Cristel Psalm ', '1995-09-26', 'Single', 'Student', '', '62'),
(146, 'Knolly Jhon', '1997-10-23', 'Single', 'Student', '', '62'),
(147, 'Kyle Jembernel', '1999-10-08', 'Single', 'Student', '', '62'),
(148, 'Krystel Dolly', '2004-09-26', 'Single', 'Student', '', '62'),
(149, 'Khrystine Asia Torne', '1994-12-28', 'Single', 'Student', '4th year College', '63'),
(150, 'Alexzandriuz Elijah Torne', '2004-06-24', 'Single', 'Student', 'Grade 6', '63'),
(151, 'Shyna Alezandra', '2007-04-04', 'Single', 'Student', 'Grade 4', '63'),
(152, 'Blazel Colleen Jalique', '1996-06-08', 'Single', 'Employed', 'College', '64'),
(153, 'Allysa Dave Jalique', '2002-01-12', 'Single', 'Student', 'High School', '64'),
(154, 'Blester Dave Jalique', '2003-01-09', 'Single', 'Student', 'Elementary', '64'),
(155, 'Roevit John D. Jumalon', '1982-07-13', 'Single', 'Student', 'Special Child', '65'),
(156, 'Roevit Jane D. Jumalon', '1983-01-27', 'Married', 'Employed', 'College', '65'),
(157, 'Richelle D. Jumalon', '1986-05-08', 'Single', 'Employed', 'Nurse/College', '65'),
(158, 'Ruth Grace D. Jumalon', '1993-07-20', 'Single', 'Employed', 'Med-Tech/College', '65');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `ID` int(11) NOT NULL,
  `year` text NOT NULL,
  `nameofschool` text NOT NULL,
  `levelcourse` text NOT NULL,
  `remarks` text NOT NULL,
  `category` text NOT NULL,
  `profileID` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`ID`, `year`, `nameofschool`, `levelcourse`, `remarks`, `category`, `profileID`) VALUES
(4, '1978-1980', 'Odiongan FBC', 'SMC', 'Graduate', 'Theological', '6'),
(5, '1980-1982', 'Saint Gabriel College', 'Midwifery', '', 'Secular', '7'),
(6, '1981', 'Odiongan FBC', 'SMC', '', 'Theological', '7'),
(7, '1989', 'FBC', 'SMC', 'Graduate', 'Theological', '8'),
(8, '1978', 'Tanagan National High School', 'High School', '', 'Secular', '9'),
(9, '1983', 'Odiongan FBC', 'SMC', 'Graduate', 'Theological', '9'),
(10, '1989', 'Odiongan FBC', 'SMC', 'Graduate', 'Theological', '4'),
(11, '1991', 'FBC', 'BTH', 'Graduate', 'Theological', '4'),
(12, '1997', 'PTS', 'Master in Ministry', 'Graduate', 'Theological', '4'),
(13, '2006', 'BCCL', 'GCUM', 'Graduate', 'Theological', '4'),
(14, '1985', 'Odiongan High School', 'High School', 'Graduated', 'Secular', '10'),
(15, '', 'Odiongan FBC', 'SMC', '', 'Theological', '10'),
(16, '2010-2011', 'TESDA Life Community', 'Basic Reflexology', 'Graduated', 'Secular', '11'),
(17, '1988', 'Camp Tinio National High School', 'High School', 'Graduated', 'Secular', '11'),
(18, '1999', 'Foursquare Bible College', 'SMC', 'Graduated', 'Theological', '11'),
(19, '1987', 'FBC', 'BTH', '', 'Theological', '12'),
(20, '1987', 'Odiongan FBC', 'SMC', 'Graduate', 'Theological', '13'),
(21, '1988', 'Odiongan FBC', 'BTH', 'Under Graduate', 'Theological', '13'),
(22, '1988-1993', 'Mamburao High School', 'High School', 'Graduated', 'Secular', '14'),
(23, '1993-1996', 'Odiongan FBC', 'SMC', 'Graduated', 'Theological', '14'),
(24, '1987-1988', 'RMC', 'Gen. Radio Communication Operator', '', 'Secular', '15'),
(25, '1989-1993', 'FBC', 'SMC & BTH', 'Graduate', 'Theological', '15'),
(26, '', 'Foursquare Bible College', 'SMC', '', 'Theological', '17'),
(27, '', 'Cajidiocan Barangay High School', 'High School', '', 'Secular', '17'),
(28, '1988-1990', 'School for Phil. Craftsmen', 'Technical Trade Course', 'Graduated', 'Secular', '18'),
(29, '1984-1988', 'Saban Brgy High School', 'High School', 'Graduated', 'Secular', '18'),
(30, '1990-1993', 'Door of Faith Church & Bible School Inc.', 'AB Theology', 'Graduated', 'Theological', '18'),
(31, '2001-2007', 'FBC Bicol Extension', 'CMS', 'Graduated', 'Theological', '18'),
(32, '', 'Romblon State College', 'BS Ed', '', 'Secular', '19'),
(33, '', 'FBC Bicol Extension', 'SMC', '', 'Theological', '19'),
(34, '1985', 'Luzon Colleges', 'BSC Major in Accounting', 'Graduate', 'Secular', '21'),
(35, '1986-1988', 'Norphil FBC', 'CMS', 'Graduate', 'Theological', '21'),
(36, '1988', 'Norphil FBC', 'SMC', 'Under Graduate', 'Theological', '21'),
(37, '1991-1994', 'Odiongan FBC', 'SMC', 'Graduate', 'Theological', '2'),
(38, '1996-1999', 'PMI', '', '', 'Theological', '2'),
(39, '2004-2008', 'Sorsogon State College', '', '', 'Secular', '3'),
(40, '2009-2011', 'Sorsogon State College', '', '', 'Secular', '3'),
(41, '2005', 'Sorsogon State College', 'Bachelor in Elementary Education', 'Graduate', 'Secular', '5'),
(42, '2014', 'Sorsogon State College', 'Master in Admin & Supervisor', 'Graduate', 'Secular', '5'),
(43, '2008', 'ALS A&E', 'High School', 'Graduate', 'Secular', '22'),
(44, '2005', 'Norphil FBC', 'CMS', 'Graduate', 'Theological', '22'),
(45, '1990-1993', 'Virgin Milagrosa University', 'BS Biology', '', 'Secular', '23'),
(46, '1987-1989', 'Norphil FBC', 'SMC', 'Graduate', 'Theological', '23'),
(47, '1984-1988', 'Maranatha Bible College', 'BTH', 'Graduate', 'Theological', '24'),
(48, '1992', 'Saint Louis University', 'BS Engineering', 'Graduate', 'Secular', '25'),
(49, '2000', 'Phil. Baptist Theological Seminary', 'Master of Arts`', '', 'Theological', '25'),
(50, '1988', 'Saint Louis University', 'BS Commerce', 'Graduate', 'Secular', '26'),
(51, '2001', 'Phil. Baptist Theological Seminary', 'MA in Christian Education', '', 'Theological', '26'),
(52, '1984', 'G. Araneta University Foundation', 'Doctor of Veterinary Medicine', 'Graduate', 'Secular', '27'),
(53, '', 'PFBC, Mangatarem Extension', 'CMS', 'Graduate', 'Theological', '27'),
(54, '', 'Baptist Theological Seminary', 'Masteral', '9 units', 'Theological', '27'),
(55, '1983-1988', 'NRSIT/STI', 'Elec. & Communication/Comp', 'Graduated', 'Secular', '28'),
(56, '1989-1991', 'Norphil FBC', 'Christian Worker Course', 'Graduated', 'Theological', '28'),
(57, '1991-1992', 'Norphil FBC', 'SMC', 'Graduated', 'Theological', '28'),
(58, '2000', 'Norphil FBC', 'CMS', 'Graduated', 'Theological', '28'),
(59, '1990-1994', 'Tarlac College of Agriculture', 'Bachelor of Animal Science', 'Graduate', 'Secular', '29'),
(60, '1996-2000', 'Tarlac College of Agriculture', 'Doctor of Veterinary Medicine', 'Graduate', 'Secular', '29'),
(61, '2013', 'PFBC, Mangatarem Extension', 'CMS', 'Graduate', 'Theological', '29'),
(62, '1985', 'Lyceum Northwestern', 'Bachelor of Science in Nursing', 'Graduate', 'Secular', '30'),
(63, '1992', 'Norphil FBC', 'Christian Workers Course', 'Graduate', 'Theological', '30'),
(64, '1987-1989', 'National Radio School', 'Electronics Technician', 'Graduate', 'Secular', '31'),
(65, '1990-1992', 'Pangasinan Merchant Marine Academy', 'Marine Engineering', 'Graduate', 'Secular', '31'),
(66, '2000-2004', 'Data College', 'BS Computer Science', 'Graduate', 'Secular', '31'),
(67, '2000', 'PFBC Mangatarem Extension', 'CMS', 'Graduate', 'Theological', '31'),
(68, '1979-1984', 'FEATI University', 'BS Mechanical Engineering', 'Grauate', 'Secular', '32'),
(69, '1996', 'TESDA Lingayen', 'Basic Computer Course', 'Graduate', 'Secular', '32'),
(70, '1997-1999', 'University of Luzon', 'Master in Public Administration', 'Finished Academic Requirement', 'Secular', '32'),
(71, '', 'Norphil FBC', 'Christian Worker Course', 'Graduate', 'Theological', '32'),
(72, '2000', 'Norphil FBC', 'CMS', 'Graduate', 'Theological', '32'),
(73, '1977', 'Saint Louis University', 'BS Commerce Accountancy', 'Graduate', 'Secular', '33'),
(74, '2010', 'Pangasinan State University', 'Master of Arts in Educational Mng''t', 'Under Thesis', 'Secular', '33'),
(75, '2005', 'Norphil FBC', 'BTH', 'Continuing Educational Program', 'Theological', '33'),
(76, '', 'Tumalaytay Elementary', 'Elementary', '', 'Secular', '16'),
(77, '1975', 'University of Luzon', 'BSC Accounting', 'Graduate', 'Secular', '34'),
(78, '2015', 'PFBC', 'CMS', 'Graduate', 'Theological', '34'),
(79, '1982', 'Luzon University', 'BS Commerce (Accounting)', 'Graduate', 'Secular', '35'),
(80, '2008', 'Golden West College', 'BS Elementary Education', 'Graduate', 'Secular', '35'),
(81, '1990', 'Norphil FBC', 'Christian Worker Course', 'Graduate', 'Theological', '35'),
(82, '1992', 'Norphil FBC', 'SMC', 'Graduate', 'Theological', '35'),
(83, '1992', 'Phil. Baptist Theological Seminary', 'Master', 'Units Earner', 'Theological', '35'),
(84, '1993-1997', 'Pamantasan ng Makati', 'BS Industrial Technology', 'Graduate', 'Secular', '36'),
(85, '2000-2007', 'Norphil FBC', 'BTH', 'Graduate', 'Theological', '36'),
(86, '1987-1989', 'NRS Computronics', 'College', '', 'Secular', '37'),
(87, '', 'Norphil FBC', 'CWC & CEP', '', 'Theological', '37'),
(88, '1990', 'University of Luzon', 'BS in Civil Engineering', 'Graduate', 'Secular', '38'),
(89, '2012-2013', 'Pangasinan FBC', 'SMC', 'Under Graduate', 'Theological', '38'),
(90, '1982', 'Luzon Colleges', 'BS in Elementary Education', 'Graduate', 'Secular', '39'),
(91, '1985', 'Luzon Colleges', 'Master of ARts', 'Academic Requirement', 'Secular', '39'),
(92, '1985', 'U.E. Manila', 'Business Management', '', 'Secular', '40'),
(93, '2013', 'PFBC', 'SMC', 'Under Graduate', 'Theological', '40'),
(94, '2014', 'Full Gospel Theological School', 'Masteral', 'Under Graduate', 'Theological', '40'),
(95, '1985', 'Lyceum Northwestern', 'High School', '', 'Secular', '41'),
(96, '1988', 'Faith Bible College', 'BTH', '', 'Theological', '41'),
(97, '2008', 'PFBC', 'SMC', '', 'Theological', '41'),
(98, '1993-1997', 'Bued National High School', 'High School', 'Graduate', 'Secular', '42'),
(99, '2003-2004', 'Cabugao Drivers Institute', 'Vocational', 'Graduate', 'Secular', '42'),
(100, '2010', 'PFBC', 'BTH', 'Graduate', 'Theological', '42'),
(101, '2006', 'Igbaras National High School', 'High School', '', 'Secular', '43'),
(102, '2015', 'PFBC', 'BTH', '', 'Theological', '43'),
(103, '1985', 'University of Luzon', 'BS Commerce, Major in Accounting', 'Graduate', 'Secular', '44'),
(104, '1989', 'Norphil FBC', 'Christian Worker Course', 'Graduate', 'Theological', '44'),
(105, '2003', 'Norphil FBC', 'SMC', 'Graduate', 'Theological', '44'),
(106, '', 'PAMMA, Dagupan City', 'Diesel Mechanic', '', 'Secular', '45'),
(107, '', 'PAMMA, Dagupan City', 'Practical Electricity', '', 'Secular', '45'),
(108, '', 'PIMSAT, Dagupan City', 'Seaman', '', 'Secular', '45'),
(109, '', 'UCU, Urdaneta City', 'BS Nursing', '', 'Secular', '45'),
(110, '1990', 'Norphil FBC', 'Christian Worker Course', '', 'Theological', '45'),
(111, '2006', 'PFBC', 'SMC', '', 'Theological', '45'),
(112, '1986', 'Luzon Colleges', 'BS Commerce, Major in Accounting', '', 'Secular', '46'),
(113, '1987', 'Urdaneta Community College', 'BS Education 18 Units', '', 'Secular', '46'),
(114, '1994 ', 'University of the Philippines', 'CPM in Mathematics', '', 'Secular', '46'),
(115, '1995', 'Baguio City Central University', 'MA Education, Major in Math', '', 'Secular', '46'),
(116, '2000', 'Baguio Central University', 'Ed D.', '', 'Secular', '46'),
(117, '1998', 'Ilocos Norte College of Arts & Trades', 'Architectural Drafting', 'Passed', 'Secular', '47'),
(118, '2002', 'Norphil FBC', 'BTH', 'Graduate', 'Theological', '47'),
(119, '1994', 'University of Pangasinan', 'BS Commerce, Major in Management', '', 'Secular', '48'),
(120, '', 'PFBS', 'Leadership Basic Course', '', 'Theological', '48'),
(121, '', 'PFBS', 'Ministerial', '', 'Theological', '48'),
(122, '1991-1992', 'Dela Salle Araneta University', 'Doctor of Veterinary Medicine', 'Graduate', 'Secular', '50'),
(123, '2016', 'Foursquare Bible College, Bicol', 'CMS', 'Undergrad', 'Theological', '50'),
(124, '1991 - 1995', 'Lyceum Northwestern', 'BS in Nursing', 'Graduated', 'Secular', '51'),
(125, '2004 - 2005', 'NFBC', 'CMS', 'Graduated', 'Theological', '51'),
(126, '2005 - 2007', 'PFBS', 'SMC', 'Graduated', 'Theological', '51'),
(127, '', '', 'CMS Associate of Theology', '', 'Secular', '52'),
(128, '1995', 'STI Makati', 'CO-PRO Office Productivity', '', 'Secular', '53'),
(129, '2015', 'PFBS', 'Bachelor of Theology', '', 'Theological', '53'),
(130, '1984 - 1990', 'Pongpong Elementary School', 'Elementary', 'Graduate', 'Secular', '54'),
(131, '1990 - 1994', 'Bal National High School', 'Secondary', 'Graduate', 'Secular', '54'),
(132, '1999 - 2004', 'NFBC', 'BTh', 'Graduate', 'Theological', '54'),
(133, '1988', 'University of Pangasinan', 'BS in Civil Engineering', 'Licensed Civil Engineer', 'Secular', '55'),
(134, '1991', 'University of Luzon', 'Master in Public Administration', 'MPA', 'Secular', '55'),
(135, '1992', 'Lifeway Foursquare Bible College, Hongkong', 'Ministerial Course', '', 'Theological', '55'),
(136, '2010', 'PFBS', 'Ministerial Course', '', 'Theological', '55'),
(137, '1969 - 1975', 'Mangatarem I Central', 'Elementary', 'Graduate', 'Secular', '56'),
(138, '1975 - 1979', 'Mangatarem National High School', 'Secondary', 'Graduate', 'Secular', '56'),
(139, '1980 - 1984', 'Luzon Colleges', 'BSEED', '', 'Secular', '56'),
(140, '2015', 'PFBS', 'Basic Course', '', 'Theological', '56'),
(141, '1989', 'University of Pangasinan', 'BS COM Accountancy', 'Graduate', 'Secular', '57'),
(142, '2013', 'PFBS', 'BTh', 'Graduated', 'Theological', '57'),
(143, '1983 - 1986', 'St. Dominic High School', 'Secondary', 'Graduate', 'Secular', '58'),
(144, '1986 - 1990', 'VMEI', 'Radio Technology', 'Graduate', 'Secular', '58'),
(145, '1990 - 1996', 'VMUF', 'Veterinary Medicine', 'Graduate', 'Secular', '58'),
(146, '2014', 'Clark Bible School', '3rd Year', '', 'Theological', '58'),
(147, '1991 - 1995', 'Urbiztondo Catholic High School', 'Secondary', '', 'Secular', '59'),
(148, '1997 - 1999', 'NFBC', 'Christian Worker''s Course', 'Graduate', 'Theological', '59'),
(149, '2012 - 2016', 'PFBS', 'Associate of Theology', '', 'Theological', '59'),
(150, '1980 - 1983', 'Mangatarem National High School', 'Secondary', 'Graduate', 'Secular', '60'),
(151, '1983 - 1986', 'PUP', 'B.A.', 'Graduate', 'Secular', '60'),
(152, '1990 - 1991', 'PMC', 'BSE', 'Teaching Units', 'Secular', '60'),
(153, '1998', 'University of Pangasinan', 'Bachelor of Laws', '', 'Secular', '61'),
(154, '2015', 'PFBS', 'Basic Leadership Course', '', 'Theological', '61'),
(155, '', 'NFBC', 'CWC', '', 'Theological', '62'),
(156, '', 'PFBS', 'CMS', '', 'Theological', '63'),
(157, '', 'ather Urios Academy', 'Secondary', '', 'Secular', '64'),
(158, '1992', 'HLBC, Tagum', 'CWC', '', 'Theological', '64'),
(159, '1982', 'USP-Apokon', 'BS Agriculture', 'Graduated', 'Secular', '65'),
(160, '1996 - 2000', 'Chrisian Faith Tabernacle Training Center', '', '', 'Theological', '65');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_user` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone_number` varchar(16) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  `confirmcode` varchar(32) DEFAULT NULL,
  `type` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_user`, `name`, `email`, `phone_number`, `username`, `password`, `confirmcode`, `type`) VALUES
(0, 'CFGP', 'sample@sample.com', '', 'cfgppprofile', '0b695e37bc8ff65184869010482622f7', 'y', 'user'),
(1, 'NELD', '', '5831', 'neld', 'e74d45e7f1653b4fd5db5af96b408442', 'y', 'user'),
(2, 'NWLD', '', '7057', 'nwld', '6d536fe4dc0b7cea33c9c45e6eba1426', 'y', 'user'),
(3, 'CD', '', '1596', 'cd', '9c464827f81db4edc969d7b7197cadc1', 'y', 'user'),
(4, 'PD', '', '8081', 'pd', '1c669851c57dd130ef0c3d7687f1415b', 'y', 'user'),
(5, 'CLD', '', '9267', 'cld', '958b10cac5f697a171b0593cb79f2b42', 'y', 'user'),
(6, 'MMND', '', '7283', 'mmnd', '3f0780fb0b1bab300b26817414e9aafa', 'y', 'user'),
(7, 'MMSD', '', '3291', 'mmsd', '1872ee3d140673dc85964f4c30f2faa3', 'y', 'user'),
(8, 'SLD', '', '7497', 'sld', '7fd2714b16934179f17ff84569342746', 'y', 'user'),
(9, 'BD', '', '5530', 'bd', '0b53fcb7ddb34a40a9284bae898038e6', 'y', 'user'),
(10, 'ORMD', '', '7525', 'ormd', 'dc7f6ea71d4e8bd9e1328766fa78652a', 'y', 'user'),
(11, 'OCMD', '', '9160', 'ocmd', '9a07c8ef2df8ff8349572a96e1aca598', 'yes', 'user'),
(12, 'PALD', '', '4187', 'pald', '2249c0185e8aeae9f909726e8fd2dcd7', 'y', 'user'),
(13, 'RAD', '', '4523', 'rad', 'e026b4e1a422c7f984a956f89d70788d', 'y', 'user'),
(14, 'WVD', '', '8643', 'wvd', '2aa2474803b718c6bd4ce38ea16568de', 'y', 'user'),
(15, 'EVD', '', '3362', 'evd', '5cd3d49386517310211d9c7f644e89a8', 'y', 'user'),
(16, 'CVD', '', '8783', 'cvd', '3192b5bbf5de6127e37dccc2e59ba8c2', 'y', 'user'),
(17, 'NORSD', '', '3879', 'norsd', '0c80ab9396828a7fc4e00b38a3440b2a', 'y', 'user'),
(18, 'ASD', '', '5584', 'asd', '6479f27a06209df074a848aeb806f547', 'y', 'user'),
(19, 'NMD', '', '6937', 'nmd', '43019eafa2231634af297bdb14d5d104', 'y', 'user'),
(20, 'NEMD', '', '9665', 'nemd', '2183596b8df48d2d810c630861af81ea', 'y', 'user'),
(21, 'NCMD', '', '9419', 'ncmd', '81dd345f49c4bf40dbc5668d2755b5e7', 'y', 'user'),
(22, 'NWMD', '', '5879', 'nwmd', 'bcb8df03fbee83f725c0ac1d4f82facf', 'y', 'user'),
(23, 'CMD', '', '5857', 'cmd', '71ade9fbb3280bfd587bccd700e28f71', 'y', 'user'),
(24, 'MMD', '', '2512', 'mmd', '60ea6ec5b91fb4c956e9d9f65705cf24', 'y', 'user'),
(25, 'SCMD', '', '1951', 'scmd', '555a4d23a078f2e52a59350260a91df6', 'y', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `ministryhistory`
--

CREATE TABLE `ministryhistory` (
  `ID` int(11) NOT NULL,
  `churchname` text NOT NULL,
  `address` text NOT NULL,
  `year` text NOT NULL,
  `position` text NOT NULL,
  `reason` text NOT NULL,
  `profileID` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ministryhistory`
--

INSERT INTO `ministryhistory` (`ID`, `churchname`, `address`, `year`, `position`, `reason`, `profileID`) VALUES
(8, 'Sta. Lucia Foursquare Gospel Church', '', '1995-1996', 'Pastor', '', '2'),
(9, 'Ormoc City Foursquare Church', 'Ormoc City', '1990-1995', 'Pastor', '', '8'),
(10, 'Bicol District, Emerald Division', 'Camarines Norte & Sur', 'Present', 'Division Superintendent', '', '9'),
(12, 'Sorsogon City Foursquare Church', 'San Juan, Roro, Sorsogon City, Sorsogon', 'Present', 'Pastor', 'Current', '2'),
(13, 'Crown Division, BD', 'Sorsogon', 'Present', 'Division Supt', 'Current', '2'),
(14, 'Jesus is Savior Foursquare Gospel Church', 'Cabigaan, Gubat, Sorsogon', 'Present', 'Pastor', 'Current', '3'),
(15, 'Barcelona Foursquare Church', 'Barelona, Sorsogon', 'Present', 'Pastor', 'Current', '4'),
(16, 'Acts Christian Center', 'Naagtan, Gubat, Sorsogon', 'Present', 'Pastor', 'Current', '5'),
(17, 'Calumpang Foursquare Gospel Church', 'Calumpang, Balud, Masbate', 'Present', 'Pastor', 'Current', '6'),
(18, 'Every Home for Christ Foursquare Church', 'Casili, Gubat, Sorsogon', 'Present', 'Pastor', 'Current', '8'),
(19, 'Jose Panganiban Foursquare Church', 'Jose Panganiban, Camarines Norte', 'Present', 'Pastor', 'Current', '9'),
(20, 'Maramba Foursquare Church', 'Maramba, Oas, Albay', '1991-1994', 'Pastor', '', '10'),
(21, 'Ligao Foursquare Gospel Church', 'Tuburan, Ligao, Albay', 'Present', 'Pastor', 'Current', '10'),
(22, 'Daet Foursquare Church', 'Magang, Daet, Camarines Norte', 'Present', 'Pastor', 'Current', '11'),
(23, 'Maramba Foursquare Church', 'Maramba, Oas, ALbay', 'Present', 'Pastor', 'Current', '12'),
(24, 'Oas Foursquare Gospel Church', 'Obaliw, Oas, Albay', 'Present', 'Pastor', 'Current', '13'),
(25, 'Tabugon Foursquare Church', 'Tabugon', '1996', 'Pastor', '', '14'),
(26, 'CFGP', 'Occidental Mindoro', '1998-2002', 'Minister at Large', '', '14'),
(27, 'Living Word Foursquare Church, Naga', 'Tinago, Naga City, Camarines Sur', 'Present', 'Pastor', 'Current', '14'),
(28, 'Pili Foursquare Gospel Church', 'Pili, Camarines Sur', 'Present', 'Pastor', 'Current', '15'),
(29, '', 'Guincaiptan, Tabong, Mandaon ', '1975-1982', 'Pioneering Pastor', '', '17'),
(30, 'Tumalaytay Foursquare Gospel Church', 'Tumalaytay, Mandaon, Maolingon', 'Present', 'Pastor', 'Current', '17'),
(33, 'Oas Foursquare Gospel Church', 'Obaliw, Oas, Albay', 'Present', 'Church Worker', 'Current', '18'),
(34, 'Barcelona Foursquare Church', 'Barcelona, Sorsogon', 'Present', 'Pastor''s wife', 'Current', '19'),
(35, 'Tacde Foursquare Gospel Church', 'Concepcion, Tarlac', '1986-1990', 'Pastor', '', '21'),
(36, 'Light of Life Foursquare Church', 'Urbiztondo, Pangasinan', 'Present', 'Pastor', 'Current', '21'),
(37, 'Bethel Foursquare Gospel Church', 'Mangatarem, Pangasinan', 'Present', 'Pioneer Pastor', 'Current', '21'),
(38, 'Calumpang Foursquare Gospel Church', 'Calumpang, Balud, Masbate', 'Present', 'Pastor''s wife', 'Current', '7'),
(39, 'Life Foursquare Church', 'Bugtong, Mandaon, Masbate', 'Present', 'Pastor', 'Current', '16'),
(40, 'Balangay Foursquare Church', 'Urbiztondo, Pangasinan', 'Present', 'Pastor', 'Current', '22'),
(41, 'Lasip Foursquare Church', 'Pangasinan', '1987-1997', 'Pastor', '', '23'),
(42, 'Christian Love Foursquare Gospel Church', 'Malasiqui, Pangasinan', 'Present', 'Pastor', 'Current', '23'),
(43, 'Christian Love Foursquare Gospel Church', 'Malasiqui, Pangasinan', 'Present', 'Pastor''s wife', 'Current', '24'),
(44, 'Evangelical Bible Church', '', '2000-2007', 'Senior Pastor', '', '25'),
(45, 'Binmaley New Life in Christ', 'Balogo, Binmaley, Pangasinan', 'Present', 'Pastor', 'Current', '25'),
(46, 'Binmaley New Life in Christ', 'Balogo, Binmaley, Pangasinan', 'Present', 'Pastor ', 'Current', '26'),
(47, 'Pogonsili Foursquare Gospel Church', 'Pogonsili, Aguilar, Pangasinan', 'Present', 'Pastor', 'Current', '27'),
(48, 'Pogonsili Foursquare Church', 'Pogonsili, Pangasinan', '1989', 'Asst. Pastor', '', '28'),
(49, 'San Clemente/Camiling Foursquare Church', 'Camiling, Tarlac', '1990', 'Asst. & Senior Pastor', '', '28'),
(50, 'Sapang Foursquare Church', '', '1991', 'Pastor', '', '28'),
(51, 'Mangatarem Foursquare Church', 'Mangatarem, Pangasinan', 'Present', 'Senior Pastor', 'Current', '28'),
(52, 'Silag Foursquare Gospel Church', 'Silag,', '2012 - Present', 'Pastor', 'Current', '29'),
(53, 'Camiling Foursquare Gospel Church', 'Camiling, Tarlac', 'Present', 'Pastor', 'Current', '30'),
(54, 'Dorongan Sawat Foursquare Church', 'Dorongan, Sawat, Mangatarem, Pangasinan', 'Present', 'Pastor', 'Current', '31'),
(55, 'Mangatarem Foursquare Church', 'Mangatarem, Pangasinan', '1991-1995', 'Sunday School Teacher', '', '32'),
(56, 'Calvo Foursquare Church', 'Pangasinan', '1995-1996', 'Asst. Pastor', '', '32'),
(57, 'Calvo Foursquare Church', 'Calvo, Pangasinan', '1996 - Present', 'Pastor', 'Current', '32'),
(58, 'Mangatarem Division, PD', 'Mangatarem, Pangasinan', '2000-Present', 'Division Sup''t.', 'Current', '33'),
(60, 'Alaminos Foursquare Gospel Church', 'Alaminos, Pangasinan	', '2000-Present	', 'Senior Pastor', 'Current', '33'),
(61, 'New Life in Christ Foursquare Church', 'Dulag, Binmaley, Pangasinan', 'Present', 'Pastor', 'Current', '34'),
(62, 'Mangatarem Division, PD', 'Mangatarem, Pangasinan', '1993-1999', 'Division Sup''t', 'Finished Term', '35'),
(63, 'New Life in Christ Foursquare Church', 'Dagupan City, Pangasinan', '1983', 'Church Worker', '', '35'),
(64, 'San Carlos City Foursquare Church', 'San Carlos City, Pangasinan', '1984', 'Sunday School Teacher', '', '35'),
(65, 'Alaminos City Foursquare Church', 'Alaminos City, Pangasinan', '1991', 'Associate Pastor', '', '35'),
(66, 'Norphil FBC', 'Baguio City', '1993', 'Bible School Teacher', '', '35'),
(67, 'Luac Foursquare Gospel Church', 'Luac, Bani, Pangasinan', '2008-Present', 'Pastor', 'Current', '36'),
(68, 'Jesus Christ Cares Foursquare Church', 'Mercedes Lane, Poblacion, Alaminos City', '2015-Present', 'Pastor', 'Current', '36'),
(69, 'Lacquit Foursquare Church', 'Tupa, Agno, Pangasinan', 'Present', 'Pastor', 'Current', '37'),
(70, 'San Jose Foursquare Church', 'San Jose, Bani, Pangasinan', 'Present', 'Pastor', 'Current', '38'),
(71, 'Ranao Foursquare Gospel Church', 'Ranao, Bani, Pangasinan', 'Present', 'Pastor', 'Current', '38'),
(72, 'New Life in Christ Foursquare Church', 'Asingan, Pangasinan', '1990-1995', 'Pioneering Pastor', '', '39'),
(73, 'New Life in Christ Foursquare Church', 'Bonuan, Boquig, Dagupan City', 'Present', 'Pastor', 'Current', '39'),
(74, 'Campus Crusade for Christ', '', '', 'Missionary', '', '40'),
(75, 'Christ to the Orient Team Mission', '', '', 'Missionary', '', '40'),
(76, 'Precious Women International', '', '', 'Missionary', '', '40'),
(77, 'Full Gospel Theological School', '', '', 'Missionary', '', '40'),
(78, 'The Lord is my Shepherd Christian Church', '', '', 'Church Planter', '', '40'),
(79, 'New Life in Christ Foursquare Church', 'Rabon, San Fabian, Pangasinan', 'Present', 'Pastor', 'Current', '41'),
(80, 'New Life in Christ Foursquare Church', 'Calasiao, Pangasinan', '', 'BS Leader, Preacher', '', '42'),
(81, 'New Life in Christ Foursquare Church', 'Balogo, Binmaley, Pangasinan', '2015', 'Church Council Member', '', '42'),
(82, 'New Life in Christ Foursquare Church', 'Balogo, Binmaley, Pangasinan', 'Present', 'Pastor', 'Current', '42'),
(83, 'New Life in Christ Foursquare Church', 'Cablong, Sta. Barbara, Pangasinan', 'Present', 'Pastor', 'Current', '43'),
(84, 'CFGP-PD', 'Pangasinan District', 'Present', 'District Supervisor', 'Current', '44'),
(85, 'New Life in Christ Foursquare Church', 'Domonpot, Asingan, Pangasinan', 'Present', 'Pastor', 'Current', '44'),
(86, 'New Life in Christ Foursquare Church', 'Urdaneta City, Pangasinan', 'Present', 'Pastor', 'Current', '45'),
(87, 'Binalonan Foursquare Gospel Church', 'Binalonan, Pangasinan', 'Present', 'Pastor', 'Current', '46'),
(88, 'New Hope Camandingan Foursquare Church', 'Camandingan', '2001-2007', 'Pastor', '', '47'),
(89, 'Pozorrubio Foursquare Gospel Church', 'Poblacion District IV, Pozorrubio, Pangasinan', 'Present', 'Pastor', 'Current', '47'),
(90, 'Christ Jesus My Refuge', 'Binloc, Panagasinan', 'Pesent', 'Pastor', 'Current', '48'),
(92, 'Division', 'Pangasinan', '2000 - 2001', 'Divsion SKC Coordinator', 'Term finished', '54'),
(93, 'First Rosario Foursquare Church', 'Rosario, La Union', '2001 - 2007 ', 'Resident Pastor', '', '54'),
(94, 'First Pozorrubio Foursquare Church', 'Pozorrubio, Pangasinan', '2004 - 2007', 'Resident Pastor', '', '54'),
(95, 'LGV Pozorrubio', 'Pozorrubio, Pangasinan', '2013 - Present', 'Child Dev''t Worker', 'Present', '54'),
(96, 'Christ Jesus my Refuge Foursquare', 'Bulaoen East, Sison, 2400 Pangasinan', '2015', 'Pastor', 'Mission', '51'),
(97, 'New Life in Christ Foursquare Church', 'Oltama, Urdaneta City', '1998 - Present', 'Associate Pastor', 'Present', '55'),
(98, 'Aponit Bible Christian Fellowship Foursquare', 'Sitio Broadway, Aponit, San Carlos City, 2420 Pang', 'Present', 'Pastor', 'Present', '58'),
(99, 'Light of Life Foursquare Church', 'Urbiztondo, Pangasinan', '1999 - 2007 ', 'Bible Study Leader', '', '59'),
(100, 'Light of Life Foursquare Church', 'Urbiztondo, Pangasinan', '2008 - 2011 ', 'BS & Song Leader, UFM President, Church council me', '', '59'),
(101, 'Valerio Bethel Foursquare Church', '', '2012 - 2015', 'Church Pastor', '', '59'),
(102, 'Urbiztondo Foursquare Church', 'Urbiztondo, Pangasinan', '2015 - Present', 'Church Planter/Pastor', 'Present', '59'),
(103, 'Balangay Foursquare Church', '', '1987 - 1988', 'Pastor', '', '60'),
(104, 'Joy Foursquare Church', 'San Carlos City, Pangasinan', '1988 - 1989', 'Pastor', '', '60'),
(105, 'Bautista Foursquare Church', '', '1990 - 1991', 'Pastor', '', '60'),
(106, 'Joy Foursquare Church', 'San Carlos City, Pangasinan', '1992 - Present', 'Pastor', 'Present', '60'),
(107, 'Lasip Foursquare Church', 'Lasip, Malasiqui, 2421 Pangasinan', 'Present', 'Pastor', 'Present', '61'),
(108, 'Toboy Community Church', 'Tobou, Asingan, Pangasinan', 'Present', 'Pastor', 'Present', '62'),
(109, 'Pantukan Foursquare Church', '', '1992', 'Host Pastor', '', '64');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `ID` int(11) NOT NULL,
  `district` text NOT NULL,
  `fname` text NOT NULL,
  `nname` text NOT NULL,
  `bday` text NOT NULL,
  `address` text NOT NULL,
  `bplace` text NOT NULL,
  `cstatus` text NOT NULL,
  `citizenship` text NOT NULL,
  `occupation` text NOT NULL,
  `contact` text NOT NULL,
  `email` text NOT NULL,
  `category` text NOT NULL,
  `cnumber` text NOT NULL,
  `sss` text NOT NULL,
  `tin` text NOT NULL,
  `blood` text NOT NULL,
  `yordained` text NOT NULL,
  `language` text NOT NULL,
  `spiritualgift` text NOT NULL,
  `skills` text NOT NULL,
  `hobbies` text NOT NULL,
  `health` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`ID`, `district`, `fname`, `nname`, `bday`, `address`, `bplace`, `cstatus`, `citizenship`, `occupation`, `contact`, `email`, `category`, `cnumber`, `sss`, `tin`, `blood`, `yordained`, `language`, `spiritualgift`, `skills`, `hobbies`, `health`) VALUES
(2, 'BD', 'Sonio, Nimrod Fernandez', 'Rhod', '1972-12-15', '#2 Encabuhan, San Juan, Roro, Sorsogon City', 'Occidental Mindoro', 'Married', 'Filipino', 'Pastor, Division Superintendent', '0910-3479073', '', 'OM', '646', '33-2910976-0', '434-104-705', 'O', '', 'Tagalog', 'Shepherding, Organizing, Teaching, Leadership, Counseling, Healing, Speaking in Tongues, Word of wisdom & knowledge', 'Driving, Computer-related works, Writing, Cooking, Electrical jobs, Agriculture work, Making handicrafts', 'Basketball, Volleyball, Swimming, Darts, Jogging exercise, Travelling, Chess, Dama, Games of the Gen., Scrabble, Word Factory', 'Skin Disease, Allergy'),
(3, 'BD', 'Mancilla, Francis Garcia ', 'Francis', '1986-10-04', 'Naagtan, Gubat, Sorsogon, 4710', 'Gubat, Sorsogon', 'Married', 'Filipino', 'DepEd Employee, Pastor', '0935-9305757', 'mancilla_francis@yahoo.com', 'CW', '1544', '', '281-335-526', 'B+', '', 'Tagalog', 'Shepherding, Organizing, Leadership, Preaching', 'Driving, Computer-related works, Agriculture work ', 'Basketball, Volleyball, Exercise, Chess, ', 'Healthy'),
(4, 'BD', 'Separa, Juanito Jr. Tabuloc', 'John', '1966-04-23', 'Burgos St., Poblacion Central, Barcelona, Sorsogon', 'Balud, Masbate', 'Married', 'Filipino', 'Pastor, District Secretary', '0949-6541273', 'johnsepara@yahoo.com', 'OM', '294', '33-3006685-0', '942-127-268', 'O', '', 'Tagalog, Bicolano', 'Shepherding,Organizing, Teaching, Leadership, Counseling, Prophecy, Healing, Speaking in Tongues, WOrd of wisdom & knowledge', 'Driving, Computer-related works, Writing, ', 'Scrabble, Word Factory', 'Using eyeglasses'),
(5, 'BD', 'Bonto, Rommel Jao ', 'Mhel', '1972-10-14', 'Acacia St., Cogon, Gubat, Sorsogon, 4710', 'Gubat, Sorsogon', 'Married', 'Filipino', 'Teacher, Pastor', '0928-4812945', '', 'OM', '643', '33-3471445-4', '194-360-217', 'A+', '', 'Bicolano, Tagalog, English', 'Shepherding, Organizing, Teaching, Leadership, Counseling, Healing, Preaching', 'Driving, Computer-related work, Writing', 'Swimming, Table Tennis, Chess, Travelling', 'Healthy'),
(6, 'BD', 'Tabuna, Ronilo Fillarca', 'Ronnie', '1957-04-17', 'Purok Tabagak, Calumpang, Balud, Masbate, 5412', 'Sta. Fe, Romblon', 'Married', 'Filipino', 'District Supervisor, Pastor', '0920-4879946', '', 'OM', '243', '03-4548480-2', '290-484-665', '', '', 'Ilonggo', 'Shepherding, Organizing, Teaching, Leadership, Counseling, Preaching', 'Driving, Doing agricultural work, ', 'Swimming, Jogging, Travelling', 'Using eye glasses, High blood pressure'),
(7, 'BD', 'Tabuna, Leilani Locsin', 'Lhanie', '1962-05-08', 'Purok Tabagak, Calumpang, Balud, Masbate, 5412', 'Balud, Masbate', 'Married', 'Filipino', 'Wife of pastor', '0946-2209375', '', 'CW', '584', '', '', '', '', 'Ilonggo', 'Shepherding, Teaching, Counseling, Preaching, Speaking in tongues', 'Cooking, Sewing', 'Jogging', 'Using eye glasses, Diabetes, High blood pressure'),
(8, 'BD', 'Antigua, Nancy Vidanes', 'Baby', '1967-07-14', 'Casili, Gubat, Sorsogon', 'Davao City', 'Married', 'Filipino', 'Pastor', '0920-7448364', 'nancyantigua@yahoo.com', 'LM', '596', '09-0972631-7', '', 'O+', '', 'Tagalog, Cebuano', 'Shepherding, Organizing, Teaching, Leadership, Counseling, Preaching, Prophecy, Healing, Speaking in tongues, Word of wisdom & knowledge', 'Writing, Cooking, Selling, Doing agricultural work', 'Jogging, ', 'Using eye glasses, with denture, Migraine, Major operation'),
(9, 'BD', 'Gal, Herby Ignacio', 'Herby', '1957-04-02', 'Purok 5, South Poblacion, Jose Panganiban, Camarines Norte', 'Romblon', 'Married', 'Filipino', 'Pastor, Division Superintendent', '0947-6102504', 'herbygal@ymail.com', 'OM', '347', '05-0777417-2', '182-639-135', 'A', '', 'Tagalog, Bicolano', 'Shepherding, Teaching, Leadership, Counseling, Healing, Speaking in tongues', 'Driving, Doing electrical jobs, Doing agricultural work', 'Basketball, Travelling', 'Using eye glasses, with HMO'),
(10, 'BD', 'Regondola, Noime Gabayno', 'Nene', '1966-03-06', 'Purok 2, Obaliw, Rinas, Oas, Albay, 4505', 'Odiongan, Romblon', 'Married', 'Filipino', 'Pastor', '0910-3638065', '', 'LM', '661', '05-0714232-2', '', '', '', 'Tagalog', 'Shepherding, Teaching, Leadership, Counseling, Healing, Speaking in tongues, Preaching', 'Cooking, Selling', 'Volleyball', 'Using eye glasses'),
(11, 'BD', 'Pablo, Gener Villareal', 'Nher', '1971-01-09', 'Blk39 Lot16 Magang Happy Homes, Daet, Camarines Norte', 'Cabanatuan City, N.E.', 'Married', 'Filipino', 'Pastor, Driver', '0947-2976964', 'generpablo@yahoo.com', 'LM', '1885', '03-9620585-2', '455-076-318', 'O', '', 'Tagalog, Bicolano, English', 'Shepherding, Organizing, Teaching, Leadership, Counseling, Preaching, Healing, Speaking in tongues, Word of wisdom & knowledge', 'Driving, Writing, Cooking, Doing electrical jobs, Doing agricultural work', 'Basketball, Bowling, Volleyball, Swimming, Darts, Jogging, Chess, Dama, Scrabble, Gym work-out', 'Using eye glasses, with denture'),
(12, 'BD', 'Pigao, Francisco Apuyan', 'Francis', '0961-04-21', 'Zone 8, Maramba, Oas, Albay, 4505', 'Daraga, Albay', 'Married', 'Filipino', 'Pastor', '', '', 'LM', '677', '', '424-382-572', 'O', '', 'Bicol, Tagalog', 'Shepherding, Teaching, Counseling, Preaching, Speaking in tongues', 'Driving, Doing electrical job, Selling, Doing agricultural work', 'Basketball, Badminton, Jogging, Chess, Dama, Games of the Gen., Scrabble, Word factory', 'With denture'),
(13, 'BD', 'Amar, Jovelito Gregorio', 'Jovie', '1968-09-07', 'Zone 6, Obaliw, Oas, Albay, 4545', 'Odiongan, Romblon', 'Married', 'Filipino', 'Pastor', '0935-9729917', '', 'OM', '247', '01-4443317-6', '922-655-175', 'O', '', 'Tagalog, Bicol', 'Shepherding, Teaching, Leadership, Counseling, Preaching', 'Driving, Cooking, Doing agricultural work', 'Basketball', 'Using eye glasses'),
(14, 'BD', 'Bartolome, Jonathan Elias', 'Athan', '1976-04-27', 'No. 6 M-Castro St., Brgy. Tinago, Naga City, Camarines Sur, 4400', 'Mamburao, Occidental Mindoro', 'Married', 'Filipino', 'Pastor', '0923-4160915', 'jonathan.bartolome33@yahoo.com', 'OM', '642', '04-3147274-4', '947-745-105', '', '', 'Bicol, Tagalog', 'Shepherding, Teaching, Leadership, Counseling, Preaching, Healing, Word of wisdom & knowledge', 'Driving, Doing computer works, Cooking', 'Basketball, Badminton, Bowling, Volleyball, Swimming, Table Tennis, Darts, Jogging, Chess, Dama, Scrabble, Word factory Gym work-out', 'With denture'),
(15, 'BD', 'Tabali, Edgar Tutor', 'Dodong', '1969-10-11', 'Zone 2 Brgy. New Binanuaanan, Pili, Camarines Sur, 4418', 'Bato Katipunan', 'Married', 'Filipino', 'Pastor', '0907-5290180', 'edgar.tabali@yahoo.com.ph', 'LM', '781', '04-0964086-7', '422-580-300', 'O', '', 'Cebuano, Tagalog, Bicol', 'Shepherding, Organizing, Teaching, Leadership, Counseling, Preaching, Healing, Speaking in tongues, Word of wisdom & knowledge', 'Driving, Doing eletrical jobs, Selling, Doing agricultural work', 'Basketball, Volleyball, Table tennis, Darts, Jogging, Chess, Dama, Scrabble, Word factory', 'Using eye glasses, with denture, with HMO'),
(16, 'BD', 'Mangalindan, Memoria Regala', 'Moring', '1950-07-08', 'Mabenunga, Bugtong, Mandaon, Masbate', 'Mandaon, Masbate', 'Widow/er', 'Filipino', 'Pastor', '0948-3947063', '', 'CW', '578', '33-876399-0', '', 'O', '', 'Tagalog, Bisaya', 'Shepherding, Organizing, Teaching, Leadership, Counseling, Prophecy, Healing, Speaking in tongues, Word of wisdom & knowledge', 'Cooking, ', '', 'Using eye glasses'),
(17, 'BD', 'Repe, Alejandrino De Jose', 'Dino', '1945-07-30', 'Tumalaytay, Mandaon, Masbate', 'Cajidiocan, Romblon', 'Single', 'Filipino', 'Pastor', '0907-76558510', '', 'OM', '240', '', '', '', '', 'Ilonggo, Tagalog', 'Teaching, Counseling, Healing', 'Doing agricultural work', 'Volleyball, Scrabble', 'Using eye glasses, Athritis'),
(18, 'BD', 'Avila, Jessie Santos', 'Jess', '1970-07-24', 'Purok 4, Manga, Oas, Albay, 4505', 'Manila', 'Single', 'Filipino', 'Church Worker', '0920-7345335', 'jessieavila71@rocketmail.com', 'CW', '564', '05-0936581-9', '', '-AB', '', 'English, Tagalog, Bicol', 'Organizing, Teaching, Leadership, Counseling, Preaching, Speaking in tongues, Word of wisdom & knowledge', 'Doing computer works, Cooking, Selling, Doing agricultural work, Making handicrafts', 'Swimming, Scrabble, Word facotry, Gym work-out', 'Using eye glasses'),
(19, 'BD', 'Separa, Jocelyn Mortel', 'Jho', '1969-03-23', 'Burgos St., Poblacion Central, Barcelona, Sorsogon', 'San Andres, Romblon', 'Married', 'Filipino', 'Wife of pastor', '0912-4612774', '', 'LM', '1341', '', '', 'O', '', 'Tagalog, Bicolano', 'Organizing, Teaching, Counseling, Healing, Speaking in tongues', 'Cooking, Sewing, Doing agricultural work', 'Badminton, Volleyball, Swimming, Word facory', 'Using eye glasses, High blood pressure'),
(21, 'PD', 'Abad, Antonio Altiz', 'Tony', '1961-12-04', '63 Estrada St., Urbiztondo, Pangasinan, 2414 ', 'Mangatarem, Pangasinan', 'Married', 'Filipino', 'President of GLFLC, Pastor', '', 'tony_abad@rocketmail.com', 'OM', '126', '', '927-766-897', 'O', '', 'Tagalog, Ilocano', 'Shepherding, Teaching, Leadership, Teaching, Counseling, Preaching, Prophecy, Healing, Speaking in tongues, Word of wisdom & knowledge', 'Driving, Cooking, ', 'Badminton, Bowling, Lawn Tennis, Darts, Jogging, Scarbble', 'Using eye glasses, Diabetes, High blood pressure, Athritis'),
(22, 'PD', 'Agbuya, David Eliang', 'David', '1968-02-10', '024 Balangay, Urbiztondo, Pangasinan, 2414', 'Urbiztondo, Pangasinan', 'Married', 'Filipino', 'Pastor, Farmer, Businessman', '', 'david.agbuya@gmail.com', 'LM', '1204', '02-3101559-2', '924-266-736', 'B', '', 'Tagalog, Ilocano', 'Shepherding, Organizing, Leadership, Counseling, Teaching, Preaching, Healing, Word of wisdom & knowledge', 'Driving, Doing computer work, Cooking, Doing eletrical jobs, Selling, Doing agricultural work, Making handicrafts, Carpentry, Plumbing', 'Swimming, Cycling, Jogging, Gym work-out, Travelling', 'Using eye glasses, High blood pressure, Cysts'),
(23, 'PD', 'Bautista, Crisostomo Estrellas', 'Tom', '1967-06-25', 'Aliaga, Malasiqui, Pangasinan, 2421', 'Binmaley, Pangasinan', 'Married', 'Filipino', 'Pastor', '0932-4797932', 'tombautista40@yahoo.com', 'LM', '291', '01-0810733-9', '184-465-881', '', '', 'Tagalog, Ilocano', 'Shepherding, Teaching, Counseling, Leadership, Preaching, Word of wisdom & knowledge', 'Driving, Doing electrical jobs, Doing agricultural work', 'Jogging, Shooting range', 'Using eye glasses, with denture, '),
(24, 'PD', 'Bautista, Edilen Rosal', 'Edilen', '1967-01-05', 'Brgy. Aliaga, Malasiqui, Pangasinan, 2421', 'Malasiqui, Pangasinan', 'Married', 'Filipino', 'Wife of pastor', '', 'edilen_bautista@yahoo.com.sg', 'LM', '1062', '02-3260407-9', '184-465-857', '', '', 'Tagalog, Ilocano', 'Shepherding, Organizing, Teaching, Leadership, Counseling, Preaching, Speaking in tongues', 'Cooking, Doing agricultural work', 'Scrabble, Word factory', 'Using eye glasses, High blood pressure'),
(25, 'PD', 'Tindungan, Angelito Dumawat', 'Lito', '1967-01-06', '357 Buenlag East, Mangaldan, Pangasinan', 'Baguio City', 'Married', 'Filipino', 'PFBS Director, Teacher, Pastor', '0906-2016546 / 540-2085', 'aftindungan3@yahoo.com', 'OM', '607', '01-0937327-2', '', 'B', '', 'Tagalog, Ilocano', 'Shepherding, Teaching, Leadership, Counseling, Preaching', 'Driving, Doing computer works, Doing agricultural work, Doing electrical job', 'Basketball, Volleyball, Table tennis, Swimming, Jogging, Chess, Dama, Games of the Gen, Scrabble, Word factory', 'Healthy'),
(26, 'PD', 'Tindungan, Fe Eclevia', 'Fe', '1966-07-20', '357 Buenlag East, Mangaldan, Pangasinan', 'Zambales', 'Married', 'Filipino', 'Division Sup', '0927-8724358', 'fetindungan31@yahoo.com', 'OM', '608', '', '', '', '', 'Tagalog, English, Ilocano ', 'Teaching, Counseling, Leadership, Preaching', 'Writing, Cooking,', 'Scrabble', 'Using eye glasses'),
(27, 'PD', 'Bugarin, Mario Dela Cruz', 'Mar', '1961-11-27', '295 Purok Adarna East, Pogonsili, Aguilar, Pangasinan, 2515', 'Sta. Mesa, Manila', 'Married', 'Filipino', 'Pastor', '0939-8662315', 'mariobugarin@rocketmail.com', 'OM', '605', '03-7019350-9', '929-067-871', '', '', 'Tagalog, Ilocano', 'Shepherding, Teaching, Prophecy, Healing, Preaching, Speaking in tongues', 'Driving, Writing, Cooking, Doing agricultural work', 'Basketball, Swimming, Darts, Jogging, ', 'Using eye glasses, High blood pressure, Asthma'),
(28, 'PD', 'Bugarin, Samuel Dela Cruz', 'Sam', '1964-10-26', '4 Ricarte St., Maravilla-Arellano Ext. Mangatarem, Pangasinan, 2413', 'Mangatarem, Pangasinan', 'Married', 'Filipino', 'Gov. Employee, Pastor', '0936-9739966', 'sambugarin@yahoo.com', 'OM', '', '02-0855505-6', '', 'AB', '', 'Tagalog, Ilocano', 'Shepherding, Organizing, Teaching, Leadership, Counseling, Preaching, Prophecy, Healing, Word of wisdom', 'Driving, Doing computer works, Cookin, Doing agricultural work', 'Basketball, Badminton, Bowling, Swimming, Lawn Tennis, Table tennis, Darts, Jogging, Travelling', 'Using eye glasses, High blood pressure, Heart disease'),
(29, 'PD', 'Bañaga, Rex Evanglista', '', '1972-12-22', '118 Lopez St., Mangatarem, Pangasinan, 2413', 'Mangatarem, Pangasinan', 'Married', 'Filipino', 'Pastor', '0919-5188273', 'pbd_rexbanaga@yahoo.com', 'LM', '298', '02-2592374-2', '', 'O+', '', 'Tagalog, Ilocano', 'Teaching, Leadership, Preaching, ', 'Driving, Doing computer work, Writing, Selling', 'Basketball, Badminton, Swimming, Table tennis, Jogging, Dama, ', 'with denture'),
(30, 'PD', 'Cuaresma, Irma Bañaga', '', '1968-03-29', 'Baracbac, Mangatarem, Pangasinan 2413', 'Mangatarem, Pangasinan', 'Married', 'Filipino', 'Pastor', '0930-9274483', 'cuaresmairma@yahoo.com', 'LM', '1205', '33-3050477-8', '', 'O', '', 'Tagalog, Ilocano', 'Prophecy, Preaching, Speaking in tongues', 'Doing computer work', 'Badminton, ', 'Using eye glasses'),
(31, 'PD', 'Fabros, Jorge Jr. Espelita', 'Bhong', '1969-07-19', '#16 Gomez, Zamora, Mangatarem, Pangasinan, 2413', 'Mangatarem, Pangasinan', 'Married', 'Filipino', 'Gov. Employee, Pastor', '0998-5584717 / 633-0067', 'egroj_sorbaf@yahoo.com', 'LM', '', '33-3467078-9', '190-291-537', 'B+', '', 'Tagalog, Ilocano', 'Teaching, Preaching, ', 'Driving, Doing computer work', 'Basketball, Gym work-out', 'Healthy'),
(32, 'PD', 'Vergara, Noel Tomas Salanatin', 'Tom', '1962-07-28', '98 Jocson St., Mangatrem, Pangasinan, 2413', 'Roxas City, Capiz', 'Married', 'Filipino', 'Municipal Employee, Pastor', '0908-8880455 / 632-2334', 'mpdctom_vergara@yahoo.com', 'LM', '295', '', '157-668-870', 'B+', '', 'Tagalog, Ilocano', 'Shepherding, Organizing, Teaching, Leadership, Preaching, Healing, Work of wisdom & knowledge', 'Doing computer work, Cooking, ', 'Basketball, Swimming, Jogging, Chess, ', 'Using eye glasses, with denture, High blood pressure'),
(33, 'PD', 'Villanueva, Dionisio Valdez', 'Diony', '1954-10-05', '74 Imelda Drive, Pandayan, Alaminos City, Pangasinan, 2404', 'Urdaneta, Pangasinan', 'Married', 'Filipino', 'Gov. Employee, Pastor', '0916-4943524', 'dionisiovillanueva179@yahoo.com', 'OM', '136', '03-4750105-5', '135-568-768', 'O', '', 'Ilocano, Tagalog', 'Shepherding, Leadership, Teaching, Organizing, Counseling, Preaching, Healing, Speaking in tongues, word of wisdom & knowledge', 'Driving, ', 'Bowling, Chess', 'Using eye glasses, Heart disease'),
(34, 'PD', 'Cagaoan, Raul Sr. Santos ', 'Raul', '1952-10-06', 'Dulag, Binmaley, Pangasinan', 'Binmaley, Pangasinan', 'Married', 'Filipino', 'Businessman, Pastor', '0906-3210890 / 540-5386', 'rscservicecenter@yahoo.com', 'LM', '290', '03-4072426-6', '116-684-881', 'O', '', 'Tagalog, Ilocano', 'Shepherding, Leadership, Preaching', 'Driving, Selling/Marketing, Doing agricultural work ', 'Golf, Bowling, Chess, ', 'Using eye glasses, Asthma'),
(35, 'PD', 'Villanueva, Noime Balbas', 'Noie', '1961-05-23', '74 Imelda Drive, Pandayan, Alaminos City, Pangasinan, 2404', 'Mangatarem, Pangasinan', 'Married', 'Filipino', 'Teacher, Wife of Pastor', '0915-6247966', 'villanueva.noime@ymail.com', 'OM', '137', '02-0584311-4', '940-210-937', 'AB', '', 'Tagalog, Ilocano', 'Teaching, Leadership, Counseling, Prophecy, Healing, Preaching, Speaking in tongues, Word of wisdom/knowledge', 'Cooking', '', 'Using eye glasses, with denture, High blood pressure'),
(36, 'PD', 'Bristol, Randy Ronquillo', 'Randz', '1977-09-16', '139 Mercedes Lane, Poblacion, Alaminos City, Pangasinan, 2404', 'Pasay City, M. Mla.', 'Married', 'Filipino', 'Architectural Designer, Pastor', '0910-3622752', 'bristo.randy@yahoo.com', 'LM', '305', '02-1491362-4', '940-210-952', '', '', 'Tagalog', 'Organizing, Teaching, Leadership, Speaking in tongues, Preaching', 'Driving, Doing computer work, Cooking', 'Biking, Travelling', ''),
(37, 'PD', 'Tadena, Anthony Rausa', 'Tony ', '1970-07-31', '44 Quezon Ave., Poblacion Alaminos City, Pangasinan, 2404', 'Alaminos City, Pangasinan', 'Married', 'Filipino', 'Farmer, Pastor', '0915-2665760', '', 'OM', '', '', '', '', '', 'Tagalog, Ilocano', 'Shepherding, Prophecy, Teaching, Counseling, Healing, Preaching, Speaking in tongues, Word of wisdom/knowledge', 'Driving, Doing computer work, Cooking, Doing electrical work, Doing aricultural work', 'Basketball, Jogging', 'Using eye glasses, High blood pressure'),
(38, 'PD', 'Tadena, Severino Rausa', 'Bing', '1968-04-28', '37 Quezon Ave., Poblacion ALaminos City, Pangasinan, 2404', 'Alaminos City, Pangasinan', 'Married', 'Filipino', 'Farmer, Pastor, Project Supervisor', '0915-7486249', 'severinotadena@yahoo.com', 'LM', '267', '33-3018692-1', '198-920-556', 'O', '', 'Tagalog, Ilocano', 'Shepherding, Counseling, Preaching, Speaking in tongues', 'Driving, Doing computer work, Doing agricultural work, Carpentry, ', 'Basketball', 'Using eye glasses, with denture'),
(39, 'PD', 'Lanuza, Florentina Espiritu', 'Ching', '1957-10-18', '474 Guilig St., Dagupan City, Pangasinan, 2400', 'Mangatarem, Pangasinan', 'Widow/er', 'Filipino', 'Teaching, Pastor', '0920-4703211', 'florentinalanuza@yahoo.com', 'LM', '288', '02-0530700-3', '131-309-349', 'B+', '', 'Tagalog, Ilocano', 'Shepherding, Teaching, Leadership, Counseling, Preaching, Word of wisdom/knowledge', 'Cooking', 'Bowling, Scrabble', 'Using eye glasses, with HMO'),
(40, 'PD', 'Dy, Lucila Tuason', 'Lulu', '1961-01-14', 'New Hope, Binday, San Fabian, Pangasinan', 'Manila', 'Married', 'Filipino', 'Business Woman, Pastor', '0923-2255150', '', 'LM', '', '', '', '', '', 'Tagalog', 'Shepherding, Organizing, Counseling, Leadership, Preaching', 'Cooking, Selling/Marketing,', 'Badminton, Volleyball, Jogging', 'Using eye glsses, with denture'),
(41, 'PD', 'Pagdanganan, Arlene Viernes', '', '1968-05-27', '326 Casanglaan District, Dagupan City, Pangasinan,', 'Dagupan City, Pangasinan', 'Annulled', 'Filipino', 'Direct Selling, Pastor', '0939-9020861', '', 'LM', '', '', '922-290-585', '', '', 'Tagalog, Ilocano', 'Shepherding, Teaching, Counseling, Preaching, Speaking in tongues', 'Cooking, Selling/Marketing', 'Bowling, Jogging', 'Using eye glasses, Migraine'),
(42, 'PD', 'Gabrillo, Julius Jimenez', 'Juls', '1980-04-06', '173 Cabilocaan Calasiao, Pangasinan, 2418', 'Calasiao, Pangasinan', 'Married', 'Filipino', 'Pastor', '0950-2124193 / 0918-2102870', '', 'LM', '', '', '', '', '', 'Tagalog, Ilocano', 'Leadership, Counseling, Preaching, Word of wisdom/knowledge', 'Doing agricultural work', 'Basketball', ''),
(43, 'PD', 'Elambre, Jennelyn Dela Cruz', 'Jhenny', '1988-12-17', 'Guilig, St., Dagupan City, Pangasinan', 'Igbaras, Iloilo City', 'Single', 'Filipino', 'Pastor', '0910-0553706', 'elambrejennelyn@gmail.com', 'LM', '', '', '', '', '', 'Tagalog', 'Organizing, Teaching, Counseling, Preaching, Healing', 'Doing computer work, Cooking', 'Badminto, Volleyball, Jogging', ''),
(44, 'PD', 'Bautista, Arnel Galano', 'Arnel', '1965-04-25', '65 Domonpot, Asingan, Pangasinan, 2439', 'Mangatarem, Pangasinan', 'Married', 'Filipino', 'Pastor, District Supervisor', '0917-8933515', 'arnelbautista2915@yahoo.com', 'OM', '134', '02-0807672-6', '168-794-263', 'O', '', 'Tagalog, Ilocano, English', 'Shepherding, Leadership, Counseling, Organizing, Preaching ', 'Driving, ', '', 'Using eye glasses'),
(45, 'PD', 'Manipon, Wilfrando Geraldino', 'Fawel', '1961-01-29', 'Zone 4, Oltama, Urdaneta City, Pangasinan, 2428', 'Bulan, Sorsogon', 'Married', 'Filipino', 'Businessman, Pastor', '0905-4182006', 'crddmanipon@yahoo.com', 'OM', '', '', '', 'O', '', 'Tagalog', 'Shepherding, Counseling, Leadership, Organizing, Preaching, Healing', 'Driving, Doing electrical work, Doing agricultural work', 'Basketball, Chess', 'Using eye glasses'),
(46, 'PD', 'Aquino, Cornelio Rendorio', 'Cornel', '1966-03-24', 'Canarvacanan, Binalonan, Pangasinan, 2436', 'Binalonan, Pangasinan', 'Married', 'Filipino', 'Teaching, Pastor', '0998-8451352 / 633-2625', 'cornel.aquino@yahoo.com', 'LM', '1060', '', '295-828-506', 'A', '', 'Tagalog, Ilocano', 'Shepherding, Leadership, Teaching, Counseling, Organizing, Preaching', 'Doing computer work, Cooking, Doing agricultural work', 'Badminton, Bowling, Darts, Chess, Dama, Scrabble, Word factory, Travelling', 'Diabetes, Psoriasis'),
(47, 'PD', 'Garcia, Richard Azcueta', 'Ricky', '1977-11-29', '47 Espiritu St., Poblacion District IV, Pozorrubio, Pangasinan, 2435', 'Laoag City, Ilocos Norte', 'Married', 'Filipino', 'Pastor', '0907-6311507', 'ptrrichardgarcia@gmail.com', 'LM', '386', '', '941-950-884', 'A', '', 'Tagalog, Ilocano', 'Teaching, Preaching, Leadership', 'Driving, Doing computer work', 'Basketball, Badminton, Table tennis, Dama, Games of the Gen., Scrabble, Word factory, Gym work-out', 'with denture'),
(48, 'PD', 'Rosetes, Wilson P.', 'Bro', '1972-07-03', '116 Sitio America, Bunuan, Binloc, Pangasinan', 'Paing bantay, Ilocos Sur', 'Married', 'Filipino', 'Businessman, Pastor', '', '', 'LM', '', '', '', '', '', 'Tagalog, Ilocano', 'Shepherding, Teaching, Counseling, Preaching, Healing, Speaking in tongues', 'Driving, Cooking', 'Basketball, Jogging, Chess, Dama, Games of the Gen.', 'Using eye glasses'),
(49, 'BD', 'Ribot, Merla ', 'Caning', '1959-09-07', 'Ubo, Balud, Masbate', 'Balud, Masbate', 'Married', 'Filipino', 'Pastor', '0919-9465174', '', 'CW', '581', 'None', 'None', '', 'None', 'Ilonggo', 'Preaching', 'Doing agricultural work', 'None', 'Using eyeglasses'),
(50, 'BD', 'Tabug, Gerlyn Abelita', 'Bhaby', '1969-01-23', 'Poblacion Balud, Masbate 5412', 'Masbate', 'Married', 'Filipino', 'Pastor, Business woman', '0917-8908691', '', 'ATP', '008', '911-273-4401-2', '915-906-677', 'O', '', 'Ilonggo', 'Teaching, Counseling, Preaching, Prophecy', 'Selling/Marketing, ', 'Jogging/Exercise', 'Using eyeglasses, With denture, Migraine'),
(51, 'PD', 'Estoque, Arnel Pajarillo', 'Nel', '1973-07-27', '#5 Alimango St. Tondaligan Blue Beach Subd. Bonuan Gueset, Dagupan City, 2400', 'Rosario, La Union', 'Married', 'Filipino', 'Pastor, Nurse', '07036629557', 'arnels2k@gmail.com', 'OM', '291', '01-1025243-4', '', 'A', '', 'Ilocano, Tagalog', 'Shepherding, Organizing, Teaching, Leadership, Counseling, Preaching', 'Driving, Computer-related works, Electrical jobs', 'Basketball, Jogging/Exercise', 'Heart disease'),
(52, 'PD', 'Ballesteros, Jerry Calalang', 'Jhe', '1972-04-24', 'Fernandez Compound, Bonuan Gueset, Dagupan City, 2400 Pangasinan', 'Dagupan City', 'Married', 'Filipino', 'Pastor, Business', '09175696123', '', 'LM', '', '', '', '', '', 'Ilocano, Tagalog', 'Shepherding, Teaching, Leadership, Counseling, Preaching, Prophecy, Healing, ', 'Driving, Computer-related works, Writing, Cooking, Electrical jobs, Selling ', 'Basketball, Badminton, Bowling, Swimming, Darts, Jogging/Exercise, Travelling', 'Using eye glasses, w/ HMO'),
(53, 'PD', 'Cerezo, Juvy Luvarias', 'Juvy', '1971-12-26', '96 Perrenians St., Gueset, Dagupan City, 2400 Pangasinan', 'Dagupan City', 'Single Parent', 'Filipino', 'Registrar PFBS', '09282942521', '', 'LM', '', '', '1-357-684-95', '', '', '', 'Preaching, Healing', 'Cooking, Selling/Marketing', 'Jogging, Gym work-out', 'Using eye glasses, Migraine, '),
(54, 'PD', 'Garcia, Leonida Medina', 'Nida', '1977-03-07', '#47 Espiritu St. Poblacion District IV, Pozorrubio, 2435 Pangasinan', 'Sto. Tomas, La Union', 'Married', 'Filipino', 'Pastor, Child Dev', '0926-6773657', 'nidagarcia77@yahoo.com', 'LM', '', '01-0934906-0', '171-571-916', 'O', '', '', 'Shepherding, Teaching, Leadership, Counseling, Preaching, Healing, Speaking in Tongues', 'Driving, Computer-related works, Writing, Cooking, Agricultural work', 'Badminton, Volleyball, Jogging Board games Dama, Scrabble, Word factory', 'Not yet using eye glasses'),
(55, 'PD', 'Manipon, Caridad Jovero', 'Karen', '1966-06-16', 'Zone 4 - 125 Oltama, Urdaneta City, 2428 Pangasinan', 'Sta. Barbara, Pangasinan', 'Married', 'Filipino', 'Gov''t Employee, Contractor', '09166245698', 'crddmanipon@yahoo.com', 'LM', '', '02-1146603-5', '179-741-485', '', '', 'Ilocano, Tagalog', '', '', '', ''),
(56, 'PD', 'Abad, Leonarda Balbas', 'Ardie', '1961-05-06', 'Estrada St. Urbiztondo, 2414 Pangasinan', 'Mangatarem, Pangasinan', 'Married', 'Filipino', 'Pastor Wife, Teaching', '0947-5575928', '', 'LM', '', '', '905-457-062', 'O', '', 'Ilocano, Tagalog', 'Organizing, Teaching, Leadership, Prophecy, Healing, Speaking in Tongues', 'Writing, Cooking, Selling/Marketing', 'Badminton, Volleyball, Chess, Scrabble', 'Using eye glasses, with HMO, High blood pressure'),
(57, 'PD', 'Acierto, Basilio Areniego', 'Bong', '1962-10-02', '#2 Fernandez Comp. Bonuan Gueset, Dagupan City, 2400 Pangasinan', 'Anda, Pangasinan', 'Married', 'Filipino', '', '', '', 'LM', '1248', '01-0461345-8', '', '', '', 'Tagalog, Ilocano', 'Teaching, Leadership, Counseling, Preaching', 'Driving, Electrical jobs', 'Bowling, Jogging, Chess, Dama, Games of the Gen., Scarbble', 'High blood pressure, Not yet using eye glasses'),
(58, 'PD', 'Ferrer, Edwin Fernandez', 'Jojo', '1970-02-15', '#110 Bonifacio St. San Carlos City, 2420 Pangasinan', 'San Carlos City, Pangasinan', 'Married', 'Filipino', 'Pastor', '0920-2353253', 'edjofer15@yahoo.com', 'LM', '', '33-5317855-0', '929-863-739', 'A', '', 'Tagalog, Ilocano', 'Teaching, Leadership, Preaching', 'Driving, Cooking, Agricultural works, Playing musical instrument', 'Basketball, Lawn Tennis, Table Tennis, Jogging, Chess, Travelling', 'Using eye glasses, High blood pressure, Athritis'),
(59, 'PD', 'Flores, Rodenco, Jr Leonardo', 'D''Boy', '1977-10-17', 'G27 Mabini St. Brgy. Poblacion, Urbiztondo 2414 Pangasinan', 'Urbiztondo, Pangasinan', 'Married', 'Filipino', 'Pastor', '0930-6711661', 'sfloresirene@gmail.com', 'LM', '1367', '', '', '', '', 'Ilocano, Tagalog', 'Shepherding, Organizing, Teaching, Leadership, Counseling, Preaching, Prophecy, Healing, Speaking in tongues, Word of wisdom & knowledge', 'Driving, Cooking, Selling/Marketing, Agricultural work', 'Basketball, Volleyball, Swimming, Darts, Jogging, Chess, Dama, Scrabble', 'Migraine, Not yet using eye glasses'),
(60, 'PD', 'Torres, Ariel Quiroga', 'Ariel', '1965-11-06', 'Caingal, San Carlos City, 2420 Pangasinan', 'Mangatarem, Pangasinan', 'Married', 'Filipino', 'Pastor, Teacher', '0948-5182148', '', 'OM', '', '', '904-325-778', 'A', '', '', 'Shepherding, Organizing, Teaching, Leadership, Counseling', 'Driving, ', 'Lawn Tennis, Table Tennis, Chess, Dama, Games of the Gen., Word factory, Travelling', ''),
(61, 'PD', 'Cayago, Fernando Macaraeg', 'Pet', '1971-10-22', '#378 Aliaga, Malasiqui, 2421 Pangasinan', '', 'Married', 'Filipino', 'Lawyer, Pastor', '0921-2870146', '', 'LM', '1490', '', '', 'B', '', 'Tagalog', 'Teaching, Preaching', 'Driving, ', 'Basketball, Jogging/Exercise', 'Using eye glasses, High blood pressure'),
(62, 'PD', 'Ambrosio, Dominador B.', 'June', '1967-09-28', '19 Sanchez, Asingan, Pangasinan', 'Baguio City', 'Married', 'Filipino', 'Pastor, Gov''t Employee', '', '', 'LM', '', '', '', '', '', 'Tagalog, Ilocano', 'Shepherding, Leadership, Counseling, Prophecy, Heling, Speaking in Tongues, Word of wisdom & knowledge', 'Driving, Writing, Cooking', 'Basketball', 'Using eye glasses'),
(63, 'PD', 'Torne, Alexander Guillero', 'Alex', '1976-04-05', 'Zone 6 Cabalitian, 2439', 'Urdaneta City, Pangasinan', 'Married', 'Filipino', 'Pastor', '0915-3814255', 'asia_lyde@yahoo.com', 'LM', '', '', '', 'AB', '', 'Tagalog, Ilokano', 'Shepherding, Organizing, Teaching, Leadership, Counseling, Preaching, Prophecy, Healing, Speaking in tongues, Word of wisdom & knowledge', 'Driving, Selling/Marketing', 'Basketball, Volleyball, Jogging, Chess, Dama, Gym work-out', 'with denture, High blood pressure'),
(64, 'NCMD', 'Jalique, Zaldy Juayong', 'Zal', '1970-09-02', 'Lapu-Lapu, Cuambog, 8807', 'Malaybalay, Bukidnon', 'Married', 'Filipino', 'Pastor', '0926-7925180', '', 'CW', '695', '', '', 'B', '', 'Cebuano', 'Teaching, Preaching', 'Driving, Cooking, Selling/Marketing', 'Basketball, Chess, Dama, ', 'Using eye glasses'),
(65, 'NCMD', 'Jumalon, Roger Daugdaug', 'Greg', '1959-01-04', 'Purok 6 Bo. Site, Gabuyan, Kapalong, Davao Del Norte', 'Toril, Davao City', 'Married', 'Filipino', 'Farming', '', '', 'ATP', '', '', '', 'AB', '', '', 'Shepherding, Teaching, Leadership, Counseling, Preaching, Healing, Speaking in tongues', 'Driving, Electrical jobs, Agricultural work, Managing Farms', 'Basketball, Darts, Jogging, Word Factory, Travelling', 'Using eye glasses, with Denture & HMO');

-- --------------------------------------------------------

--
-- Table structure for table `rbackground`
--

CREATE TABLE `rbackground` (
  `ID` int(11) NOT NULL,
  `nchurch` text NOT NULL,
  `cmunicipality` text NOT NULL,
  `mpastor` text NOT NULL,
  `profileID` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rbackground`
--

INSERT INTO `rbackground` (`ID`, `nchurch`, `cmunicipality`, `mpastor`, `profileID`) VALUES
(2, 'Pasig Foursquare Church', 'Pasig City, M. Mla.', 'Rev. Eddie Nagales', '1'),
(3, 'Davao City Foursquare Church', 'Davao City', 'Meneleo Boholst', '8'),
(4, 'Cardona Foursquare Church', 'Cardona, Rizal', 'Cipriano Devilles', '8'),
(5, 'San Andres Foursquare Church', 'San Andres, Romblon', 'Ptra. Eglecesia Molitar', '9'),
(6, 'Maranatha Foursquare Gospel Church', '', 'Ptra. Nelly F. Solajo', '9'),
(7, 'Manila Bethel Temple', 'Manila City', '', '4'),
(8, 'Calumbang Foursquare Church', 'Balud, Masbate', 'Ptr. Ronilo Tabuna', '4'),
(9, 'Anahao Foursquare Church', 'Odiongan, Romblon', 'Ptr. Jun Fajura', '10'),
(10, 'Cornerstone Foursquare Church', 'Cainta, Rizal', 'Ptr. Ranie Alvarez', '11'),
(11, 'Daraga Foursquare Church', 'Daraga, Albay', 'Ptr. Poche Miranda & Ptr. Bert Mijares ', '12'),
(12, 'Mamburao Foursquare Church', 'Mamburao, Occidental Mindoro', 'Rev. Elpedio Gacusan & Ptr. Robert Villacrusis', '14'),
(13, 'Davao City Foursquare Church', 'Davao City', 'Rev. Meneleo Boholst', '15'),
(14, 'Saved by Grace Full Gospel', 'Manila ', '', '16'),
(15, 'Faith Center', 'Imus, Cavite', '', '16'),
(16, 'Hope Church', 'San Pedro, Laguna', '', '16'),
(17, 'Cajidiocan Foursquare Church', 'Cajidiocan, Romblon', 'Rev. Rodolfo Dalisay & Rev. A. Fetalco', '17'),
(18, 'Door of Faith Church', '', 'Ptra. Annicia Teodonez', '18'),
(19, 'Oas Foursquare Gospel Church', 'Oas, Albay', 'Rev. Jovelito & Billy Amar', '18'),
(20, 'San Andres Foursquare Church', 'San Andres, Romblon', 'Ptra. Villacrusis', '19'),
(21, 'Pog-alad Foursquare Church', 'Pog-Alad, San Andres, Romblon', 'Rev. R''ox Atienza', '19'),
(22, 'New Life in Christ Foursquare Church', 'Dagupan City, Pangasinan', 'Rev. Francisco A. Pinzon', '21'),
(23, 'San Francisco Foursquare Church', 'San Francisco', 'Rev. Danny Castro', '2'),
(24, 'Acts Christian Center Foursquare Church ', 'Gubat, Sorsogon', 'Ptr. Rommel J. Bonto', '3'),
(25, 'Gubat Foursquare Church', 'Gubat, Sorsogon', 'Ptr. Jhun Baracheta', '5'),
(26, 'San Carlos Foursquare Church', 'San Carlos, Pangasinan', 'Rev. Francisco A. Pinzon', '22'),
(27, 'Chritian Love Foursquare Gospel Church', 'Binmaley, Pangasinan', 'Ptr. Ronie M. Syquico', '23'),
(28, 'Christian Love Foursquare Gospel Church ', 'Binmaley, Pangasinan', 'Ptr. Ronie M. Syquico', '24'),
(29, 'Southern Baptist, Evangelical Bible Church', 'Baguio City', 'Ptr. Navarro', '25'),
(30, 'Queenstone Baptist Church', 'Singapore', 'Rev. Aow Kung Bu', '26'),
(31, 'New Life in Christ', 'Dagupan City, Pangasinan', 'Rev. Rodelio Javien', '26'),
(32, 'Mangatarem Foursquare Church', 'Mangatarem, Pangasinan', 'Rev. Francisco A. Pinzon & Lorenzo Espiritu', '27'),
(33, 'Mangatarem Foursquare Church', 'Mangatarem, Pangasinan', 'Ptra. Beatriz Artates, Ptr. Lorenzo Espiritu, Ptr. Francisco A. Pinzon', '28'),
(34, 'Mangatarem, Foursquare Church', 'Mangatarem, Pangasinan', 'Rev. Samuel Bugarin', '29'),
(35, 'Mangatarem, Foursquare Church', 'Mangatarem, Pangasinan', 'Rev. Francisco Pinzon, Ptr. Lorenzo Espiritu', '30'),
(36, 'Mangatarem Foursquare Church', 'Mangatarem, Pangasinan', 'Rev. Francisco Pinzon', '31'),
(37, 'Mangatarem Foursquare Church', 'Mangatarem, Pangasinan', 'Ptr. Lorenzo Espiritu, Rev. Francisco Pinzon', '32'),
(38, 'Mangatarem Foursquare Church', 'Mangatarem, Pangasinan', 'Rev. Francisco Pinzon', '33'),
(39, 'New Life in Christ Foursquare Church', 'Dagupan City, Pangasinan', 'Ptr. Rodelio Javien', '34'),
(40, 'Mangatarem Foursquare Church', 'Mangatarem, Pangasinan', 'Ptra. Betty Artates, Ptr. Frank Pinzon', '35'),
(41, 'New Life in Christ Foursquare Church', 'Dagupan City, Pangasinan', 'Ptr. Frank Pinzon', '35'),
(42, 'Soldier''s Hills Foursquare Church', 'Muntinlupa City, M. Mla.', 'Rev. Raul Ramos', '36'),
(43, 'New Life in Christ Foursquare Church', 'Dagupan City, Pangasinan', 'Ptr. Rodelio Javien', '37'),
(44, 'Alaminos City Foursquare Church', 'Alaminos City, Pangasinan', 'Ptr. Arnel Bautista & Ptr. Diony Villanueva', '37'),
(45, 'Baguio City Foursquare Church', 'Baguio City', 'Rev. Frank Pinzon', '37'),
(46, 'New Life in Christ Foursquare Church', 'Dagupan City, Pangasinan', 'Ptra. Ching Espiritu Lanuza', '38'),
(47, 'Alaminos City Foursquare Church', 'Alaminos City, Pangasinan', 'Ptr. & Ptra. Diony Villanueva & Rev. Frank Pinzon', '38'),
(48, 'New Life in Christ Foursquare Church', 'Dagupan City, Pangasinan', 'Rev. Francisco Pinzon', '39'),
(49, 'The Lord is my Shepherd Christian Church', 'Manila', 'Ptr. Melchor Vero', '40'),
(50, 'Faith Bible Church', 'Dagupan City, Pangasinan', 'Ptr. Bonifacio Calamiong, Sr.', '41'),
(51, 'New Life in Christ Foursquare Church', 'Calasiao, Pangasinan', 'Rev. Marcelina Javien, Reve. Lito Tindungan', '42'),
(52, 'New Life in Christ Foursquare Church', 'Bonuan, Pangasinan', 'Ptra. Florentina Lanuza', '43'),
(53, 'New Life in Christ Foursquare Church', 'Dagupan City, Pangasinan', 'Ptr. Frank Pinzon', '44'),
(54, 'New Life in Christ Foursquare Church', 'Dagupan City, Pangasinan', '', '45'),
(55, 'New Life in Christ Foursquare Church', 'Dagupan City, Pangasinan', 'Rev. Rodelio Javien, Rev. Frank Pinzon, Ptra. Florentina Espiritu', '46'),
(56, 'Jesus is the Way Foursquare Church', 'Laoag City, Ilocos Norte', 'Rev. Pedro B. Joaquin', '47'),
(57, 'Dao Foursquare Church', 'Masbate', 'Rosario Eurolpan', '49'),
(58, 'New Life in Christ', 'Dagupan City', 'Ptr. Ronnie Syquico', '51'),
(59, 'New Life in Christ', 'Dagupan City', 'Diony Espiritu', '52'),
(60, 'Korean Church of Dagupan', 'Dagupan City', 'Rev. Kim Maeng Ryul', '53'),
(61, 'Loakan Foursquare Church', 'Loakan, Baguio City', 'Rev. Sat Gadingan', '54'),
(62, 'New Life in Christ Foursquare Church', 'Dagupan City, Pangasinan', 'Rev. Frank Pinzon & Rev. Arnel Bautista', '55'),
(63, 'New Life in Christ Foursquare Church', 'Dagupan City, Pangasinan', 'Rev. Frank Pinzon', '56'),
(64, 'Mangatarem Foursquare Church', 'Mangatarem, Pangasinan', 'Ptr. Lorenzo B. Espiritu', '56'),
(65, 'Joy Christian Foursquare Church', 'San Carlos City', 'Rev. Frank Pinzon & Rev. Arnel Bautista', '58'),
(66, 'Light of Life Foursquare Church', 'Urbiztondo, Pangasinan', 'Rev. Antonio Abad', '59'),
(67, 'Mangatarem Foursquare Church', 'Mangatarem, Pangasinan', 'Ptr. Lorenzo Espiritu', '60'),
(68, 'Joy Foursquare Church', 'San Carlos City, Pangasinan', 'Rev. Frank Pinzon', '60'),
(69, 'Christian Love Foursquare', 'Aliaga, Malasiqui, Pangasinan', 'Ptr. Crisostomo Bautista', '61'),
(70, 'New Life in Christ Foursquare Church', 'Dagupan City, Pangasinan', 'Rev. Arnel G. Bautista', '63'),
(71, 'Trento Foursquare Church', 'Trento, Davao Del Sur', 'Ptr. Armodia', '64'),
(72, 'Christian Faith Tabernacle', 'Cabadbaran', 'Ptr. Ben Acebis & Eugene Dulanas', '65'),
(73, 'Maranatha Full Gospel', 'Cabadbaran', 'Ptr. Joselito Rivero', '65'),
(74, 'Christ our Life Fellowship', 'Tagum City', 'Ptr. Domingo Diola', '65');

-- --------------------------------------------------------

--
-- Table structure for table `spouse`
--

CREATE TABLE `spouse` (
  `ID` int(11) NOT NULL,
  `fname` text NOT NULL,
  `nname` text NOT NULL,
  `bday` text NOT NULL,
  `bplace` text NOT NULL,
  `citizenship` text NOT NULL,
  `contact` text NOT NULL,
  `email` text NOT NULL,
  `occupation` text NOT NULL,
  `profileID` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spouse`
--

INSERT INTO `spouse` (`ID`, `fname`, `nname`, `bday`, `bplace`, `citizenship`, `contact`, `email`, `occupation`, `profileID`) VALUES
(2, 'Connie T. Estoperes', 'Con', '1986-03-25', 'Gubat, Sorsogon', 'Filipino', '', '', 'None', '2'),
(3, 'Melisa J. Enano', 'Lisa', '1991-09-03', 'Gubat, Sorsogon', 'Filipino', '0926-3567047', '', 'DepEd Employee', '3'),
(4, 'Jocelyn Mortel', 'Jo', '1969-03-23', 'San Andres, Romblon', 'Filipino', '0912-4612774', '', 'None', '4'),
(5, 'Anselma Esporlas', 'Elma', '1972-09-14', 'Gubat, Sorsogon', 'Filipino', '', '', 'Gov. Employee', '5'),
(10, 'Leilani Locsin', 'Lhan', '1962-05-08', 'Balud, Masbate', 'Filipino', '0946-2209375', '', 'None', '6'),
(11, 'Leilani Locsin', 'Lhan', '1962-05-08', 'Balud, Masbate', 'Filipino', '0946-2209375', '', 'None', '6'),
(12, 'Ronilo F. Tabuna', 'Ronnie', '1957-04-17', 'Sta. Fe, Romblon', 'Filipino', '0920-4879946', '', 'Pastor, District supervisor', '7'),
(13, 'Delfin Y. Antigua', 'Loloy', '1966-12-24', 'Albuera, Leyte', 'Filipino', '', '', 'Fisherman, Carpenter', '8'),
(14, 'Delfin Y. Antigua', 'Loloy', '1966-12-24', 'Albuera, Leyte', 'Filipino', '', '', 'Fisherman, Carpenter', '8'),
(15, 'Delfin Y. Antigua', 'Loloy', '1966-12-24', 'Albuera, Leyte', 'Filipino', '', '', 'Fisherman, Carpenter', '8'),
(16, 'Delfin Y. Antigua', 'Loloy', '1966-12-24', 'Albuera, Leyte', 'Filipino', '', '', 'Fisherman, Carpenter', '8'),
(17, 'Luzviminda G. Amancio', 'Luz', '1961-03-10', 'Romblon', 'Filipino', '0946-1113352', '', 'Pastor''s wife', '9'),
(18, 'Luzviminda G. Amancio', 'Luz', '1961-03-10', 'Romblon', 'Filipino', '0946-1113352', '', 'Pastor''s wife', '9'),
(19, 'Eliseo R. Regondola, Jr.', 'Jun', '1970-08-10', 'Oas, Albay', 'Filipino', '', '', 'None', '10'),
(20, 'Eliseo R. Regondola, Jr.', 'Jun', '1970-08-10', 'Oas, Albay', 'Filipino', '', '', 'None', '10'),
(21, 'Eliseo R. Regondola, Jr.', 'Jun', '1970-08-10', 'Oas, Albay', 'Filipino', '', '', 'None', '10'),
(22, 'Chona Sayno', 'Chona', '1979-02-11', 'Tayabas, Quezon', 'Filipino', '0949-7116320', 'chonasaynopablo@yahoo.com', 'Teacher', '11'),
(23, 'Chona Sayno', 'Chona', '1979-02-11', 'Tayabas, Quezon', 'Filipino', '0949-7116320', 'chonasaynopablo@yahoo.com', 'Teacher', '11'),
(24, 'Ederlinda Regondola', 'Linda', '1962-05-07', 'Oas, Albay', 'Filipino', '0948-3340365', '', 'Pastor''s wife', '12'),
(25, 'Jeneth Rull', 'Yeng/Neth', '1968-08-18', '', 'Filipino', '', '', 'Teacher', '13'),
(26, 'Jeneth Rull', 'Yeng/Neth', '1968-08-18', '', 'Filipino', '', '', 'Teacher', '13'),
(27, 'Elizabeth Gaspado', 'Beth', '1974-04-15', 'Roxas, Oriental Mindoro', 'Filipino', '0925-6677810', 'bethc.bartolome@yahoo.com', 'Pre-school Teacher', '14'),
(28, 'Elizabeth Gaspado', 'Beth', '1974-04-15', 'Roxas, Oriental Mindoro', 'Filipino', '0925-6677810', 'bethc.bartolome@yahoo.com', 'Pre-school Teacher', '14'),
(29, 'Wilma Betchayda', 'Weh', '1964-12-25', 'Pili, Camarines Sur', 'Filipino', '', '', 'Pastor''s wife', '15'),
(30, 'Wilma Betchayda', 'Weh', '1964-12-25', 'Pili, Camarines Sur', 'Filipino', '', '', 'Pastor''s wife', '15'),
(31, 'Juanito T. Separa, Jr.', 'Jhon', '1966-04-23', 'Balud, Masbate', 'Filipino', '0949-6541273', '', 'Pastor', '19'),
(32, 'Leonarda Balbas', 'Ardy', '1961-05-06', 'Mangatarem, Pangasinan', 'Filipino', '', '', 'Teacher, Pastor wife', '21'),
(33, 'Angelina Peralta', 'Lina', '1951-09-15', 'Urbiztondo, Pangasinan', 'Filipino', '', '', 'Pastor''s wife', '22'),
(34, 'Edilen Rosal', 'Edilen', '1967-01-05', 'Malasiqui, Pangasinan', 'Filipino', '', '', 'Pastor''s wife', '23'),
(35, 'Crisostomo E. Bautista', 'Tom', '1967-06-25', 'Binmaley, Pangasinan ', 'Filipino', '0932-4797932', '', 'Pastor', '24'),
(36, 'Fe Eclevia', 'Fe', '1966-07-20', 'Zambales', 'Filipino', '0927-8724358', '', 'Division Supt', '25'),
(37, 'Angelito D. Tindungan', 'Lito', '1967-01-06', 'Baguio City', 'Filipino', '', '', 'Pastor', '26'),
(38, 'Crestilita M. Tadeo', 'Ethen', '1970-07-13', 'Aguilar, Pangasinan', 'Filipino', '0929-1692069', '', 'Teacher', '27'),
(39, 'Imelda Agtuca', 'Imee', '1965-10-26', 'Mangatarem, Pangasinan', 'Filipino', '0906-3088502', '', 'Gov. Employee', '28'),
(40, 'Maria Ana M. Morado', 'Ana', '1978-03-02', 'Mangatarem, Pangasinan', 'Filipino', '0919-4020205', 'ana.banaga@yahoo.com', 'Elementary Teacher', '29'),
(41, 'Antonio C. Cuaresma', 'Tony', '1968-07-18', 'Mangatarem, Pangasinan', 'Filipino', '0918-4646888', '', 'Farming', '30'),
(42, 'Alona Alegria Torres', 'Alona', '1968-01-30', 'Mangatarem, Pangasinan', 'Filipino', '0919-8414163 / 633-5158', '', 'Gov. employee', '31'),
(43, 'Josefina O. Fernandez', 'Fina', '1963-02-28', 'Mangatarem, Pangasinan', 'Filipino', '0947-9486000', '', 'Teacher', '32'),
(44, 'Noime Balbas', 'Noime', '1961-05-23', 'Mangatarem, Pangasinan', 'Filipino', '0915-6247966', 'villanueva.noime@gmail.com', 'Teacher', '33'),
(45, 'Teresita Nieva', 'Tess', '1955-12-15', 'Dagupan City, Pangasinan', 'Filipino', '0918-4837965 / 516-2162', '', 'Gov. Employee', '34'),
(46, 'Dionisio V. Villanueva', 'Diony', '1954-10-05', 'Urdaneta City, Pangasinan', 'Filipino', '0916-4943524', 'dionisio.villanueva179@yahoo.com', 'Gov. Employee, Div. Sup''t, Pastor', '35'),
(47, 'Marilou B. Romero', 'Ling / Malou ', '1978-09-27', 'Alaminos City, Pangasinan', 'Filipino', '0948-0664603', 'bristolmarilou@yahoo.com', 'Cash Custodian', '36'),
(48, 'Lailani S. Romero', 'Lani', '1971-06-16', 'Alaminos City, Pangasinan', 'Filipino', '0915-2665760', '', 'Teaching', '37'),
(49, 'Rosabel Q. Tangonan', 'Bel', '1967-11-01', 'Mlang, Cotabato', 'Filipino', '', '', 'Teacher', '38'),
(50, 'Rogelio G. Dy', 'Roger', '1955-11-07', 'Manila', 'Filipino', '', '', 'None', '40'),
(51, 'Virginia Fernandez', 'Virgie', '1973-11-27', 'Manila', 'Filipino', '0918-2102870', 'gfvirgs@yahoo.com', 'District Staff', '42'),
(52, 'Vilma Casio', 'Vi', '1965-06-04', 'Asingan, Pangasinan', 'Filipino', '0917-8933517', '', 'Civil Engineer', '44'),
(53, 'Caridad Jovero', 'Karen', '1966-06-16', 'Sta. Barbara, Pangasinan', 'Filipino', '0916-6245698', 'crddmanipon@yahoo.com', 'Gov. Employee/Contractor', '45'),
(54, 'Elizabeth Balicao', 'Beth', '1966-05-26', 'Asingan, Pangasinan', 'Filipino', '', '', 'Gov''t. Employee', '46'),
(55, 'Leonida Medina', 'Nida', '1977-03-07', 'Sto. Tomas, la Union', 'Filipino', '0926-6773657', '', 'Daycare Worker, Pastor wife', '47'),
(56, 'Belen Moran', 'Belle', '1971-12-25', 'Angaeles City, Pampanga', 'Filipino', '', '', 'Gov. Employee', '48'),
(57, 'Junnacito S. Ribot', 'Bodong', '1956-09-03', 'Pajo', 'Filipino', 'None', '', 'None', '49'),
(58, 'Alme B. Tabug', 'John John', '1968-12-19', 'Balud, Masbate', 'Filipino', '0919-3146446', '', 'Marine Engineer', '50'),
(59, 'Margie Moran', '', '1974-12-03', '', 'Filipino', '', 'cjienel@hotmail.com', 'Operation Manager', '51'),
(60, 'Ma. Raquel Rojas', 'Khel', '1967-12-23', 'Angeles City, Pampanga', 'Filipino', '09178085104', '', 'House wife', '52'),
(61, 'Richard A. Garcia', 'Ricky', '1977-11-29', 'Laoag City, Ilocos Norte', 'Filipino', '09076311507', '', 'CSO, Pastor', '54'),
(62, 'Wilfrando G. Manipon', 'Fawel', '1961-01-29', 'Bulan, Sorsogon', 'Filipino', '09054182006', '', 'Pastor, Gov''t Employee/Contractor', '55'),
(63, 'Antonio B. Abad', 'Tony', '1961-01-24', 'Mangatarem, Pangasinan', 'Filipino', '', '', 'Pastor', '56'),
(64, 'Catherine Mariñas', 'Cathy', '1964-07-18', 'Dagupan City, Pangasinan', 'Filipino', '0917-6033241', '', 'Pastor wife', '57'),
(65, 'Lorelie De Luna', 'Lai', '1969-11-20', 'Las Piñas City, Metro Manila', 'Filipino', '', '', 'Physician', '58'),
(66, 'Irene Salomon', 'Ayen', '1968-11-17', 'Urbiztondo, Pangasinan', 'Filipino', '0905-5648283', '', 'Pastor wife', '59'),
(67, 'Bonna Macalanda', 'Bonna', '1971-10-09', 'San Carlos City, Pangasinan', 'Filipino', '0948-5182148', '', 'Pastor wife', '60'),
(68, 'Aileen Cruz', 'Leen', '1975-07-22', 'Malasiqui, Pangasinan', 'Filipino', '0910-0788824', '', 'Pastor wife', '61'),
(69, 'Estrella Somera', 'Lita', '1965-04-18', 'Asingan, Pangasinan', 'Filipino', '', '', 'Reacher, Pastor wife', '62'),
(70, 'Margelyn Joy Ylagan', 'Joy', '1978-11-12', 'Asingan, Pangasinan', 'Filipino', '0917-6869102', 'asia_lyde@yahoo.com', 'Pastor wife', '63'),
(71, 'Bambie Lumbin', 'Bhing', '', '', 'Filipino', '', '', 'Pastor wife', '64'),
(72, 'Evita Diola ', 'Evith', '1962-07-04', '', '', '', '', 'Housewife', '65');

-- --------------------------------------------------------

--
-- Table structure for table `workexp`
--

CREATE TABLE `workexp` (
  `ID` int(11) NOT NULL,
  `year` text NOT NULL,
  `company` text NOT NULL,
  `waddress` text NOT NULL,
  `position` text NOT NULL,
  `profileID` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workexp`
--

INSERT INTO `workexp` (`ID`, `year`, `company`, `waddress`, `position`, `profileID`) VALUES
(3, '2003-2004', 'D.E.G. Company', '', 'Guard', '2'),
(4, '1991', 'Phimco Industries Inc.', '', 'Operator', '11'),
(5, '1997', 'General Milling Corporation', '', 'Contructual', '14'),
(6, '2005', 'Southern Luzon Technogical Foundation', 'Legaspi City, Albay', 'Call Center Agent', '18'),
(7, '2007-2008', 'FBC Bicol Extension', 'Daraga, Albay', 'Extension Secretary', '18'),
(9, '2013 - Present', 'DepEd Division of Sorsogon', 'Sorsogon', 'T-1', '3'),
(10, '2008 - Present', 'DepEd', 'Gubat, Sorsogon', 'Teacher', '5'),
(11, '2001-2012', 'Self-Employed', 'Urbiztondo, Pangasinan', 'Manager/Owner', '22'),
(12, '1995-1997', 'New Life in Christ Church', 'Dagupan City, Pangasinan', 'Staff, Counselor', '26'),
(13, '1998-1999', 'New Life in Christ Church', 'Rabon', 'Pastor', '26'),
(14, '2000-2007', 'Phil. Baptist Theological Seminary', 'Baguio City', 'Teacher, Tutor', '26'),
(15, '1984', 'Silver Acres Farm', '', 'Asst. Veterinarian', '27'),
(16, '1986', 'St. Marks Animal Supply', '', 'Veterinary Consultant', '27'),
(17, '2002', 'Dela Vega''s Farm', '', 'Veterinary Consultant', '27'),
(18, '2005', 'Elma''s Farm', '', 'Veterinary Consultant', '27'),
(19, '1992 - Present', 'LGU of Mangatarem', 'Mangatarem, Pangasinan', 'Municipal Zoning Inspector/PESO', '28'),
(20, '2003-2005', 'Vergara Animal Clinic', 'Dasmariñas, Cavite', 'Veterinary Assistant', '29'),
(21, '2005-2008', 'Cargill Philippines Inc.', '', 'Outside Salesman', '29'),
(22, '2008-2012', 'UNAHCO', '', 'Swine Promo Representative', '29'),
(23, '2012-2013', 'Sunjin Philippines Inc.', '', 'Area Sales Manager', '29'),
(24, 'Present', 'LGU of Mangatarem', 'Mangatarem, Pangasinan', 'SB-Employee', '31'),
(25, '1992 - Present', 'LGU of Mangatarem', 'Mangatarem, Pangasinan', 'Municipal Planning & Dev''t Coor. / Zoning Officer', '32'),
(26, '1978-2000', 'Bank of the Phil Island', 'Pangasinan', 'Office Clerk', '33'),
(29, '1979-2016', 'OAI Gen. Merchadise Corp.', 'Urdaneta City, Pangasinan', 'Branch Manager', '34'),
(30, '1993-1996', 'Alpha Printing', 'Dagupan City, Pangasinan', 'Proof Reader, Supervisor', '39'),
(31, '', 'Coca Cola', '', 'Operator', '42'),
(32, '1981-1985', 'University of Luzon', 'Pangasinan', 'Accounting Dep''t Staff', '44'),
(33, '1985-1987', 'SPM Motors Corp.', 'Pangasinan', 'Junio Bookkeeper', '44'),
(34, '1988-Present', 'DepEd', 'Pangasinan', 'Chief Education Supervisor, CID', '46'),
(35, '1998-2001', '', '', 'Seaman', '48'),
(36, '2003-2007', 'Primary Finance', '', 'Credit Investigator', '48'),
(37, '2008-2016', '', '', 'Businessman', '48'),
(38, 'Present', 'Missions for World''s Need', 'Tokyo, Japan', 'Missionary', '51'),
(39, 'Present', 'New Life in Christ', 'Dagupan City', 'Worker', '52'),
(41, 'Present', 'New Life in Christ, Bayambang', 'San Roque, San Gabriel 2nd, Bayambang, Pangasinan', 'Pastor', '53'),
(46, '1995 - Present', 'Local Government of Urdaneta City', 'Urdaneta City, Pangasinan', 'Engineer III', '55'),
(47, 'Present', 'Light of Life Foursquare Church', 'Rizal St. Urbiztondo, Pangasinan', 'Pastor wife', '56'),
(48, '', 'Hi-Grade Feeds Inc.', '', 'Technical Sale Representative', '58'),
(49, '', 'AG-World Inc.', '', 'Area Sales Representative', '58'),
(50, '', 'Cen Pelco', '', 'Meter Reader Collector', '58'),
(51, '2013', 'Pan-Pacific University', '', 'Instructor', '61'),
(52, '2012 - Present', 'Virgen Milagrosa University', '', 'Instructor', '61'),
(53, '1983 - 2004', 'AMS Group of Companies', '', 'Plantation Manager', '65'),
(54, '1996 - 2004', 'Christian Faith Tabernacle', '', 'Christian Worker/Asst. Pastor', '65'),
(55, '2007 - 2010', 'Pastors Southern Baptist', '', 'Moderator', '65'),
(56, '2012 - Present', 'Lord of the Harvest Foursquare Church', '', 'Host Pastor', '65');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `ministryhistory`
--
ALTER TABLE `ministryhistory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rbackground`
--
ALTER TABLE `rbackground`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `spouse`
--
ALTER TABLE `spouse`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `workexp`
--
ALTER TABLE `workexp`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;
--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `ministryhistory`
--
ALTER TABLE `ministryhistory`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `rbackground`
--
ALTER TABLE `rbackground`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `spouse`
--
ALTER TABLE `spouse`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `workexp`
--
ALTER TABLE `workexp`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

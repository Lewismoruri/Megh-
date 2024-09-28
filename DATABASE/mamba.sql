-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2024 at 08:08 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mamba`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_country` text NOT NULL,
  `admin_job` varchar(255) NOT NULL,
  `admin_about` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_contact`, `admin_country`, `admin_job`, `admin_about`, `status`) VALUES
(2, 'Test Name', 'admin', '123', 'admin.jpg', '+250778852210', 'Gisagara', 'Front-End Developer', '  Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical  ', '');

-- --------------------------------------------------------

--
-- Table structure for table `drop_location`
--

CREATE TABLE `drop_location` (
  `locationid` int(11) NOT NULL,
  `locationName` varchar(100) DEFAULT NULL,
  `location_province` varchar(100) DEFAULT NULL,
  `charges` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drop_location`
--

INSERT INTO `drop_location` (`locationid`, `locationName`, `location_province`, `charges`) VALUES
(3, 'Nyarugenge', 'Kigali city', 132),
(4, 'Gicumbi', 'Nothern Province', 185),
(5, 'Musanze', 'Nothern Province', 171),
(6, 'Gakenke', 'Nothern Province', 181),
(7, 'Burera', 'Nothern Province', 200),
(8, 'Rulindo', 'Nothern Province', 163),
(9, 'Kamonyi', 'Southern Province', 109),
(10, 'Nyamagabe', 'Southern Province', 50),
(11, 'Huye', 'Southern Province', 22),
(12, 'Nyanza', 'Southern Province', 45),
(13, 'Gisagara', 'Southern Province', 0),
(14, 'Ruhango', 'Southern Province', 59),
(15, 'Muhanga', 'Southern Province', 83),
(16, 'Nyaruguru', 'Southern Province', 54),
(17, 'Nyagatare', 'Eastern Province', 248),
(18, 'Gatsibo', 'Eastern Province', 246),
(19, 'Bugesera', 'Eastern Province', 94),
(20, 'Kayonza', 'Eastern Province', 203),
(21, 'Ngoma', 'Eastern Province', 160),
(22, 'Kirehe', 'Eastern Province', 189),
(23, 'Rwamagana', 'Eastern Province', 190),
(24, 'Rusizi', 'Western Province', 114),
(25, 'Rubavu', 'Western Province', 222),
(26, 'Nyamasheke', 'Western Province', 149),
(27, 'Ngororero', 'Western Province', 132),
(28, 'Karongi', 'Western Province', 109),
(29, 'Rutsiro', 'Western Province', 156),
(30, 'Nyabihu', 'Western Province', 188);

-- --------------------------------------------------------

--
-- Table structure for table `messagein`
--

CREATE TABLE `messagein` (
  `Id` int(11) NOT NULL,
  `SendTime` datetime DEFAULT NULL,
  `ReceiveTime` datetime DEFAULT NULL,
  `MessageFrom` varchar(80) DEFAULT NULL,
  `MessageTo` varchar(80) DEFAULT NULL,
  `SMSC` varchar(80) DEFAULT NULL,
  `MessageText` text DEFAULT NULL,
  `MessageType` varchar(80) DEFAULT NULL,
  `MessageParts` int(11) DEFAULT NULL,
  `MessagePDU` text DEFAULT NULL,
  `Gateway` varchar(80) DEFAULT NULL,
  `UserId` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messagelog`
--

CREATE TABLE `messagelog` (
  `Id` int(11) NOT NULL,
  `SendTime` datetime DEFAULT NULL,
  `ReceiveTime` datetime DEFAULT NULL,
  `StatusCode` int(11) DEFAULT NULL,
  `StatusText` varchar(80) DEFAULT NULL,
  `MessageTo` varchar(80) DEFAULT NULL,
  `MessageFrom` varchar(80) DEFAULT NULL,
  `MessageText` text DEFAULT NULL,
  `MessageType` varchar(80) DEFAULT NULL,
  `MessageId` varchar(80) DEFAULT NULL,
  `ErrorCode` varchar(80) DEFAULT NULL,
  `ErrorText` varchar(80) DEFAULT NULL,
  `Gateway` varchar(80) DEFAULT NULL,
  `MessageParts` int(11) DEFAULT NULL,
  `MessagePDU` text DEFAULT NULL,
  `Connector` varchar(80) DEFAULT NULL,
  `UserId` varchar(80) DEFAULT NULL,
  `UserInfo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messagelog`
--

INSERT INTO `messagelog` (`Id`, `SendTime`, `ReceiveTime`, `StatusCode`, `StatusText`, `MessageTo`, `MessageFrom`, `MessageText`, `MessageType`, `MessageId`, `ErrorCode`, `ErrorText`, `Gateway`, `MessageParts`, `MessagePDU`, `Connector`, `UserId`, `UserInfo`) VALUES
(1, '2018-01-27 20:38:08', NULL, 300, NULL, '09305235027', 'Hello Poh', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '2018-01-27 20:39:06', NULL, 300, NULL, '09305235027', 'Hello Poh', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '2018-01-27 20:49:14', NULL, 300, NULL, '09305235027', 'hi poh', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '2018-01-27 20:50:56', NULL, 300, NULL, '09508767867', 'hi poh', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '2018-02-09 17:52:26', NULL, 300, NULL, '09486457414', 'Test to send', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '2018-02-09 17:54:27', NULL, 300, NULL, '09486457414', 'Test to send', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '2018-02-09 17:55:11', NULL, 300, NULL, '09486457414', 'Test to send', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '2018-02-09 17:59:11', NULL, 300, NULL, '09486457414', 'Test to send', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '2018-02-09 18:00:12', NULL, 200, NULL, '+639486457414', 'yes', NULL, NULL, '1:+639486457414:35', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '2018-02-09 18:01:12', NULL, 200, NULL, '+639486457414', 'Test to send', NULL, NULL, '1:+639486457414:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '2018-02-09 18:02:58', NULL, 200, NULL, '+639486457414', 'FROM JANNO : Confirmed', NULL, NULL, '1:+639486457414:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '2018-02-09 18:05:22', NULL, 200, NULL, '+639486457414', 'FROM Bachelor of Science and Entrepreneurs : Your order has been .Confirmed', NULL, NULL, '1:+639486457414:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '2018-02-09 18:08:14', NULL, 200, NULL, '+639486457414', 'FROM Bachelor of Science and Entrepreneurs : Your order has been .Confirmed', NULL, NULL, '1:+639486457414:39', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '2018-02-09 18:21:41', NULL, 200, NULL, '+639486457414', 'FROM Bachelor of Science and Entrepreneurs : Your order has been .Confirmed', NULL, NULL, '1:+639486457414:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, '2018-04-01 22:17:34', NULL, 300, NULL, '09123586545', 'Your code is .6048', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, '2018-04-01 22:18:20', NULL, 300, NULL, '09123586545', 'Your code is .9305', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, '2018-04-01 22:20:15', NULL, 300, NULL, '09123586545', 'Your code is .2924', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, '2018-04-01 22:42:36', NULL, 300, NULL, '09123586545', 'Your code is .6938', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, '2018-04-02 00:40:53', NULL, 300, NULL, '9956112920', 'Your code is .7290', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, '2018-04-02 00:42:14', NULL, 300, NULL, '9956112920', 'Your code is .4506', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, '2018-04-02 00:43:46', NULL, 300, NULL, '9956112920', 'Your code is .4506', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, '2018-04-02 00:45:56', NULL, 300, NULL, '09956112920', 'Your code is .6988', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, '2018-04-02 00:47:17', NULL, 300, NULL, '09956112920', 'Your code is .4380', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, '2018-04-02 00:48:53', NULL, 200, NULL, '639956112920', 'Your code is .5936', NULL, NULL, '1:639956112920:129', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, '2018-04-02 00:50:29', NULL, 200, NULL, '639956112920', 'Your code is .5349', NULL, NULL, '1:639956112920:130', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, '2018-04-02 00:53:32', NULL, 200, NULL, '639956112920', 'Your code is', NULL, NULL, '1:639956112920:131', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, '2018-04-02 00:54:43', NULL, 200, NULL, '639956112920', 'Your code is 3407', NULL, NULL, '1:639956112920:132', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messageout`
--

CREATE TABLE `messageout` (
  `Id` int(11) NOT NULL,
  `MessageTo` varchar(80) DEFAULT NULL,
  `MessageFrom` varchar(80) DEFAULT NULL,
  `MessageText` text DEFAULT NULL,
  `MessageType` varchar(80) DEFAULT NULL,
  `Gateway` varchar(80) DEFAULT NULL,
  `UserId` varchar(80) DEFAULT NULL,
  `UserInfo` text DEFAULT NULL,
  `Priority` int(11) DEFAULT NULL,
  `Scheduled` datetime DEFAULT NULL,
  `ValidityPeriod` int(11) DEFAULT NULL,
  `IsSent` tinyint(1) NOT NULL DEFAULT 0,
  `IsRead` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(30) NOT NULL,
  `varietyName` varchar(200) NOT NULL,
  `quantity` int(250) NOT NULL,
  `supplier` varchar(200) NOT NULL,
  `specs` text NOT NULL,
  `price` int(10) NOT NULL,
  `fee` int(10) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Active',
  `charges` float NOT NULL,
  `reason` varchar(200) NOT NULL,
  `DueDate` datetime NOT NULL,
  `inventoryStatus` varchar(20) NOT NULL DEFAULT 'Pending',
  `payDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `payStatus` varchar(20) NOT NULL DEFAULT 'Pending',
  `Ref` varchar(200) NOT NULL,
  `servedBy` varchar(200) NOT NULL,
  `total` varchar(100) NOT NULL,
  `remark` varchar(1000) NOT NULL,
  `delfee` int(10) NOT NULL,
  `paymethod` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `varietyName`, `quantity`, `supplier`, `specs`, `price`, `fee`, `status`, `charges`, `reason`, `DueDate`, `inventoryStatus`, `payDate`, `date_created`, `payStatus`, `Ref`, `servedBy`, `total`, `remark`, `delfee`, `paymethod`) VALUES
(116, 'Chloride Exide 70AH Battery', 2, 'amos@gmail.com', '70AH battery ', 24000, 0, 'Received and Update', 20000, '', '2023-12-09 00:00:00', 'Pending', '2023-11-29 17:56:12', '2023-11-29 20:51:43', 'Paid and Received', '467855888668', '', '40000', 'Products were delivered in good shape ', 0, 'Kenya Commercial Bank');

-- --------------------------------------------------------

--
-- Table structure for table `requests_material`
--

CREATE TABLE `requests_material` (
  `id` int(30) NOT NULL,
  `varietyName` varchar(200) NOT NULL,
  `CATEGID` int(10) NOT NULL,
  `quantity` int(250) NOT NULL,
  `remark` varchar(500) NOT NULL,
  `bags` int(50) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `supplier` varchar(200) NOT NULL,
  `specs` text NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Pending',
  `charges` float NOT NULL,
  `tech` varchar(200) NOT NULL,
  `DueDate` datetime NOT NULL,
  `inventoryStatus` varchar(20) NOT NULL DEFAULT 'Pending',
  `Duration` varchar(200) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `payStatus` varchar(20) NOT NULL DEFAULT 'Pending',
  `Ref` varchar(200) NOT NULL,
  `servedBy` varchar(200) NOT NULL,
  `prodstats` varchar(100) NOT NULL DEFAULT 'In Progress'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests_material`
--

INSERT INTO `requests_material` (`id`, `varietyName`, `CATEGID`, `quantity`, `remark`, `bags`, `weight`, `supplier`, `specs`, `status`, `charges`, `tech`, `DueDate`, `inventoryStatus`, `Duration`, `date_created`, `payStatus`, `Ref`, `servedBy`, `prodstats`) VALUES
(58, 'Pliers', 0, 2, 'Heavy gauge ', 0, '', '', '', 'Returned', 0, 'Oduor Korir', '0000-00-00 00:00:00', 'Pending', '', '2023-11-29 09:06:32', 'Pending', '', '', 'In Progress');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `pid` int(200) NOT NULL,
  `varietyName` varchar(200) NOT NULL,
  `supplier` varchar(200) NOT NULL,
  `qty` int(200) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Available',
  `imge` text NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `pid`, `varietyName`, `supplier`, `qty`, `status`, `imge`, `description`) VALUES
(9, 0, 'Spanner Size 10', '13', 29, '1', '', ''),
(10, 0, 'Pliers', '', 22, 'Available', '', 'Handyman pliers'),
(11, 0, 'Driller', '', 59, 'Available', '', ''),
(12, 0, 'Srews 1 inche', '', 6, 'Available', '', ''),
(13, 0, 'Wire stripper ', '', 50, 'Available', '', 'Strip insulation from electrical wires '),
(14, 0, 'Cable crimping tool ', '', 50, 'Available', '', 'Crimping connector onto wires'),
(15, 0, 'Solar PV wire cutter', '', 50, 'Available', '', 'Cutting photovoltaic wires'),
(16, 0, 'Digital multimeter ', '', 10, 'Available', '', 'Measures voltage, current and resistance '),
(17, 0, 'Hole saw kit', '', 20, 'Available', '', 'Cutting holes in various materials'),
(18, 0, 'Wrench set ', '', 50, 'Available', '', 'Tightening nuts and bolts '),
(19, 0, 'Measuring tape ', '', 50, 'Available', '', 'Measures distance accurately '),
(20, 0, 'Heat gun ', '', 50, 'Available', '', 'Shrinks tubing and seals connections'),
(21, 0, 'Solar irradiance meter', '', 50, 'Available', '', 'Measures solar energy levels'),
(22, 0, 'Cable cutters ', '', 50, 'Available', '', 'Cuts through thick cables cleanly '),
(23, 0, 'Solar panel cleaning kit ', '', 50, 'Available', '', 'Cleaning solution for panel maintenance '),
(24, 0, 'Cable pulling tools', '', 50, 'Available', '', 'Pulling of cables through conduits '),
(25, 0, 'Ladder ', '', 20, 'Available', '', 'Provides access to elevated areas '),
(26, 0, 'Solar shingle cutter', '', 20, 'Available', '', 'Cuts solar shingles to fit specific areas '),
(27, 0, 'Battery powered soldering iron ', '', 50, 'Available', '', 'Joins wires securely '),
(28, 0, 'Solar panel tilt kit', '', 50, 'Available', '', 'Adjust the tilt angle of panels for optimal sun exposure '),
(29, 0, 'Solar inverter ', '', 50, 'Available', '', 'Converts DC power to AC power '),
(30, 0, 'Tin snips ', '', 50, 'Available', '', 'Cuts through thin metal sheets '),
(31, 0, 'Grommet kit', '', 20, 'Available', '', 'Protects wires passing through sharp edges '),
(32, 0, 'Wire connectors and terminal ', '', 20, 'Available', '', 'Secures connection '),
(33, 0, 'Wire markers', '', 50, 'Available', '', 'Labels wires for easy identification '),
(34, 0, 'Cable tester ', '', 50, 'Available', '', 'Checks cable continuity '),
(35, 0, 'Cable tracer/toner ', '', 50, 'Available', '', 'Identifies specific cables in a bundle '),
(36, 0, 'Sealant/Caulk gun ', '', 50, 'Available', '', 'Seals gaps to prevent water infiltration '),
(37, 0, 'Level ', '', 50, 'Available', '', 'Ensures surfaces are straight and level '),
(38, 0, 'Safety harness ', '', 50, 'Available', '', 'Ensures safety when working at heights ');

-- --------------------------------------------------------

--
-- Table structure for table `tblautonumber`
--

CREATE TABLE `tblautonumber` (
  `ID` int(11) NOT NULL,
  `AUTOSTART` varchar(11) NOT NULL,
  `AUTOINC` int(11) NOT NULL,
  `AUTOEND` int(11) NOT NULL,
  `AUTOKEY` varchar(12) NOT NULL,
  `AUTONUM` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblautonumber`
--

INSERT INTO `tblautonumber` (`ID`, `AUTOSTART`, `AUTOINC`, `AUTOEND`, `AUTOKEY`, `AUTONUM`) VALUES
(1, '2017', 1, 111, 'PROID', 10),
(2, '0', 1, 219, 'ordernumber', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `CATEGID` int(11) NOT NULL,
  `CATEGORIES` varchar(255) NOT NULL,
  `USERID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`CATEGID`, `CATEGORIES`, `USERID`) VALUES
(31, 'Motive power batteries ', 0),
(32, 'Solar Panel', 0),
(33, 'Solar deep cycle battery ', 0),
(34, 'Solar PV system ', 0),
(35, 'Solar inverter power backup system ', 0),
(36, 'Lead acid batteries ', 0),
(37, 'Solar water heating system ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusquery`
--

CREATE TABLE `tblcontactusquery` (
  `id` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `Message` longtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT 'Unread'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomer`
--

CREATE TABLE `tblcustomer` (
  `CUSTOMERID` int(11) NOT NULL,
  `FNAME` varchar(30) NOT NULL,
  `LNAME` varchar(30) NOT NULL,
  `MNAME` varchar(30) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `CUSHOMENUM` varchar(90) NOT NULL,
  `STREETADD` text NOT NULL,
  `BRGYADD` text NOT NULL,
  `CITYADD` text NOT NULL,
  `PROVINCE` varchar(80) NOT NULL,
  `COUNTRY` varchar(30) NOT NULL,
  `DBIRTH` date NOT NULL,
  `GENDER` varchar(10) NOT NULL,
  `PHONE` varchar(20) NOT NULL,
  `EMAILADD` varchar(40) NOT NULL,
  `ZIPCODE` int(6) NOT NULL,
  `CUSUNAME` varchar(20) NOT NULL,
  `CUSPASS` varchar(90) NOT NULL,
  `CUSPHOTO` varchar(255) NOT NULL,
  `TERMS` tinyint(4) NOT NULL,
  `DATEJOIN` date NOT NULL,
  `STATUS` varchar(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcustomer`
--

INSERT INTO `tblcustomer` (`CUSTOMERID`, `FNAME`, `LNAME`, `MNAME`, `EMAIL`, `CUSHOMENUM`, `STREETADD`, `BRGYADD`, `CITYADD`, `PROVINCE`, `COUNTRY`, `DBIRTH`, `GENDER`, `PHONE`, `EMAILADD`, `ZIPCODE`, `CUSUNAME`, `CUSPASS`, `CUSPHOTO`, `TERMS`, `DATEJOIN`, `STATUS`) VALUES
(68, 'Grace', 'Mwangi', '', 'mwangi@gmail.com', '', '', '', 'Kisumu', '', '', '0000-00-00', 'Female', '0785322634', '', 0, 'Grace', '12345678', '', 0, '0000-00-00', '1'),
(75, 'Juke', 'Lam', '', 'lam@gmail.com', '', '', '', 'Kilifi', '', '', '0000-00-00', 'Male', '0725241448', '', 0, 'Lam', '12345', '', 0, '0000-00-00', '2'),
(76, 'David', 'Kaje', '', 'kaje1@gmail.com', '', '', '', 'Lamu', '', '', '0000-00-00', 'Male', '0753578698', '', 0, 'murithi', '123456', '', 0, '0000-00-00', '1'),
(78, 'Alex', 'Franklin', '', 'franklin@gmail.com', '', '', '', 'Machakos', '', '', '0000-00-00', 'Male', '0723134664', '', 0, 'Alex', '12345', '', 0, '0000-00-00', '1'),
(79, 'Andrew', 'Mwangi', '', 'andrew@gmail.com', '', '', '', 'Nyandarua', '', '', '0000-00-00', 'Male', '0754631996', '', 0, 'Andrew', '12345', '', 0, '0000-00-00', '1'),
(80, 'Luke', 'Liban', '', 'liban@gmail.com', '', '', '', 'Marsabit', '', '', '0000-00-00', 'Male', '0745212399', '', 0, 'Liban', '12345', '', 0, '0000-00-00', '1'),
(81, 'Caleb', 'Otieno', '', 'caleb@gmail.com', '', '', '', 'Elgeiyo Marakwet', '', '', '0000-00-00', 'Male', '0752461966', '', 0, 'Caleb', '12345', '', 0, '0000-00-00', '1'),
(82, 'Stephen', 'Karanja', '', 'stephen@gmail.com', '', '', '', 'Nyandarua', '', '', '0000-00-00', 'Male', '0742222669', '', 0, 'Stephen', '12345', '', 0, '0000-00-00', '1'),
(83, 'Vishal', 'Kamau', '', 'kamau@gmail.com', '', '', '', 'Isiolo', '', '', '0000-00-00', 'Male', '0702546649', '', 0, 'Kamau', '12345', '', 0, '0000-00-00', '1'),
(84, 'Martin', 'Kariuki', '', 'kariuki@gmail.com', '', '', '', 'Nyeri', '', '', '0000-00-00', 'Male', '0765664334', '', 0, 'Martin', '12345', '', 0, '0000-00-00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `ORDERID` int(11) NOT NULL,
  `PROID` int(11) NOT NULL,
  `ORDEREDQTY` int(11) NOT NULL,
  `ORDEREDPRICE` double NOT NULL,
  `ORDEREDNUM` int(11) NOT NULL,
  `USERID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`ORDERID`, `PROID`, `ORDEREDQTY`, `ORDEREDPRICE`, `ORDEREDNUM`, `USERID`) VALUES
(169, 2017101, 1, 100000, 215, 0),
(172, 201783, 5, 42500, 216, 0),
(173, 2017105, 1, 22000, 217, 0),
(174, 201783, 1, 8500, 218, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `PROID` int(11) NOT NULL,
  `PRODESC` varchar(255) DEFAULT NULL,
  `INGREDIENTS` varchar(255) NOT NULL,
  `PROQTY` int(11) DEFAULT NULL,
  `ORIGINALPRICE` double NOT NULL,
  `PROPRICE` double DEFAULT NULL,
  `CATEGID` int(11) DEFAULT NULL,
  `IMAGES` varchar(255) DEFAULT NULL,
  `PROSTATS` varchar(30) DEFAULT NULL,
  `OWNERNAME` varchar(90) NOT NULL,
  `MANDATE` varchar(90) NOT NULL,
  `EXDATE` varchar(100) NOT NULL,
  `MODELNUM` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`PROID`, `PRODESC`, `INGREDIENTS`, `PROQTY`, `ORIGINALPRICE`, `PROPRICE`, `CATEGID`, `IMAGES`, `PROSTATS`, `OWNERNAME`, `MANDATE`, `EXDATE`, `MODELNUM`) VALUES
(201783, 'Chloride Exide 070SBL,SBR 12V Local Car Battery N70.                ', '', 98, 9000, 8500, 31, 'uploaded_photos/battery.jpg', 'Available', 'Chloride Exide N70 Vented Car Battery', '', '', '22100'),
(201784, ' This solar panel has  high efficiency solar modules which are constructed from Mono cells. The cells are individually tested and matched for optimum performance before being built into the protective module structure. A Tedlar base is used and ethylene v', '', 100, 5500, 5000, 32, 'uploaded_photos/solar.jpg', 'Available', 'Sunlight Solar 200Watts Solar Panel All Weather Mono Crystalline', '', '', '455s'),
(201785, 'The Ritar 12V 200Ah Lead Sealed maintenance free battery is a deep cycle battery that is designed for use in a variety of applications, including solar and wind power systems, RVs, boats, and emergency power backup.\r\nRita 12v 200ah battery Rated to an imp', '', 98, 22000, 20000, 33, 'uploaded_photos/Screenshot_20231026-213305~2.jpg', 'Available', 'Ritar 12V 200Ah Lead Sealed maintenance free battery', '', '', '19050'),
(201786, ' Solar panel have  high efficiency solar modules are constructed from 36 poly-crystalline, (12V modules) or 72 cells (24V modules) cells. The cells are individually tested and matched for optimum performance before being built into the protective module  ', '', 102, 24000, 24000, 34, 'uploaded_photos/Screenshot_20231026-214131~2.jpg', 'Available', 'Chloride Exide 70AH Battery', '', '', '23100'),
(201788, 'ULTRA SUN PRE 300L DIRECT SOLAR HOT WATER SYSTEM\r\nUltrasun Solar hot water systems are economical effective heaters that provide excellent performance, good value, and guaranteed long life. They are of Open Loop thermosyphon design with water flow circula', '', 43, 230000, 230000, 37, 'uploaded_photos/Screenshot_20231026-220219~2.jpg', 'Available', 'CHLORIDE MEGASUN SOLAR WATER HEATER ', '', '', '21100'),
(201789, 'Monocrystalline type using inverter charger ', '', 101, 5000, 3000, 32, 'uploaded_photos/Screenshot_20231125-112949~2.jpg', 'Available', '50WATTS SOLAR PANEL ALL WEATHER ', '', '', '18160'),
(201790, 'Monocrystalline solar panel \r\nAll weather solar panel ', '', 98, 13000, 9000, 32, 'uploaded_photos/Screenshot_20231125-114645~2.jpg', 'Available', '300 Watts Solar Panel All Weather Mono Crystalline PANEL', '', '', '18200'),
(201791, 'Monocrystalline solar panel German brand with 25 years warranty ', '', 100, 5000, 4000, 32, 'uploaded_photos/Screenshot_20231125-115246~2.jpg', 'Available', 'Solarmax 100W Solar Panel All Weather 25 Years Warrant German Technology', '', '', '18300'),
(201792, 'Mainatenace free\r\nsolamax 200ah battery\r\ndeep cycle battery\r\nblack battery', '', 99, 11000, 9000, 33, 'uploaded_photos/Screenshot_20231125-120148~2.jpg', 'Available', 'Solarmax 150ah Heavy Duty Solar Battery', '', '', '19100'),
(201793, 'Deep Cycle Batteries\r\nTYPE\r\n26 aH\r\nBATTERY CAPACITY\r\n0.26 kWh\r\nTOTAL BATTERY ENERGY\r\n12 V\r\nBATTERY RATED VOLTAGE\r\nBrand New\r\nCONDITION', '', 102, 7000, 6000, 33, 'uploaded_photos/Screenshot_20231125-120648~2.jpg', 'Available', '12V 26ah Drom Power Battery', '', '', '19150'),
(201794, 'Deep Cycle Batteries\r\nTYPE\r\n100 aH\r\nBATTERY CAPACITY\r\n100 kWh\r\nTOTAL BATTERY ENERGY\r\n12 V\r\nBATTERY RATED VOLTAGE\r\nBrand New\r\nCONDITION', '', 100, 8000, 7000, 33, 'uploaded_photos/Screenshot_20231125-121112~2.jpg', 'Available', 'Solar Max 100ah Solar Battery', '', '', '19200'),
(201795, 'Jacob valve regulated sealed lead acid battery are maintenance free and easy to handle ', '', 120, 900, 750, 36, 'uploaded_photos/Screenshot_20231125-122543~2.jpg', 'Available', 'MG Jacobs 6V 4.5Ah 20H Sealed Lead-Acid Battery', '', '', '20100'),
(201796, 'VOLTAGE: 6 Volt\r\nCAPACITY: 2.8 Ah\r\nTYPE: Sealed Lead Acid Battery\r\nLENGTH: 2.56?\r\nWIDTH: 1.27?                      ', '', 100, 1600, 1400, 36, 'uploaded_photos/Screenshot_20231125-123146~2.jpg', 'Available', 'LEAD ACID BATTERY 6V 2.8AH', '', '', '20150'),
(201797, 'Absorbent Glass Mat (AGM) technology for efficient gas recombination of up to 99% and freedom from electrolyte maintenance or water adding\r\n• Not restricted for air transport-complies with IATA/ICAO Special Provision A67                      ', '', 100, 8500, 7000, 36, 'uploaded_photos/Screenshot_20231125-123606~2.jpg', 'Available', '12V 24AH Sealed Lead Acid (SLA) Battery', '', '', '20200'),
(201798, 'Nominal Voltage 12.0 v\r\nNominal Capacity 70 Ah, 70000 mAh\r\nMax. Charging current 21 A\r\nMax. Discharging current 520 A (5 sec)\r\nMax Short-Duration Discharge Current 1300A (0.1sec)                      ', '', 100, 18000, 16000, 36, 'uploaded_photos/Screenshot_20231125-123901~2.jpg', 'Available', 'Sealed Lead Acid Battery 12V 70AH', '', '', '20250'),
(201799, 'DESCRIPTION:\r\nMEGA SUN PRE 200L INDIRECT SOLAR HOT WATER SYSTEM\r\n\r\nCylinder 1x2 .6m2 collector (ST 2500), frame , accessories pack,Glycol\r\n\r\nProduct Condition\r\nNew', '', 49, 170000, 150000, 37, 'uploaded_photos/Screenshot_20231125-125612~3.jpg', 'Available', 'CHLORIDE EXIDE MEGASUN 200 L SOLAR WATER HEATER FOR HARD WATER (INDIRECT) WATER', '', '', '21150'),
(2017100, 'Tank Volume	300 Liters\r\nTank Material	Stainless Steel\r\nType of Collector	Evacuated Tube Collector (ETC)\r\nBrand	Supreme Solar\r\nStand Frame	Galvanized Powder Coated\r\nFrame Angle	27 Degrees', '', 49, 90000, 70000, 37, 'uploaded_photos/Screenshot_20231125-130008~2.jpg', 'Available', '300 Liters Solarizer Non Pressurized Solar water heating system', '', '', '21200'),
(2017101, 'Chloride N70MFL CHLORIDE EXIDE MAXX is a maintenance-free battery rated 12v 70AH for your car use ', '', 100, 12000, 10000, 31, 'uploaded_photos/Screenshot_20231125-131340~2.jpg', 'Available', 'Chloride N70MFL CHLORIDE EXIDE MAXX', '', '', '22150'),
(2017102, '12V 100Ah Capacity\r\nChloride Exide Solar Battery\r\nSolar Battery MF\r\nNo Acid\r\nLong Lasting', '', 99, 16000, 14000, 31, 'uploaded_photos/Screenshot_20231125-132006~2.jpg', 'Available', 'Chloride Exide Battery 100ah', '', '', '22250'),
(2017103, '35 AH Capacity Battery\r\nLeft Positive terminal\r\n12V Car Battery\r\n(L236.5 W124.6 H200)mm\r\n100% Maintenance Free\r\n12 months warranty', '', 99, 7500, 7000, 31, 'uploaded_photos/Screenshot_20231125-132808~2.jpg', 'Available', 'Chloride Exide Powerlast 035MFL Maintenance Free Car Battery', '', '', '22300'),
(2017104, 'Solar kit items include solar panel, charger controller, solar battery and powerful power inverter and extension This kit can able to light the all house including security lights, televisions and also radios.. It can also used to charge mobiles phones. A', '', 0, 16000, 14000, 34, 'uploaded_photos/Screenshot_20231125-135752~2.jpg', 'Available', 'Sunlight Solar Special All Weather Solar Panel Fullkit 100 Watts Solar Panel + 80AH Batter', '', '', '23150'),
(2017105, 'This 200 Watts Solar Panel All Weather Full Kit + 150Ah Solar Battery + 20 Amp Digital Controller + 600watts Solar Inverter + 5 Bulbs is the perfect solution for providing clean, renewable energy to your home, business, or off-grid property. The solar pan', '', 99, 25000, 22000, 34, 'uploaded_photos/Screenshot_20231125-140101~2.jpg', 'Available', 'Sunlight Solar 200 Watts Solar Panel All Weather Full Kit + 150Ah Solar Battery + 20 Amp D', '', '', '23200'),
(2017106, 'This solar panel kit is the perfect solution for those who want to enjoy the benefits of solar power in a powerful and comprehensive package. The kit includes a 300-watt solar panel, a 200-Ah solar battery, a 1000-watt solar inverter, a 20-amp solar charg', '', 100, 32000, 29000, 34, 'uploaded_photos/Screenshot_20231125-140623~2.jpg', 'Available', 'Sunlight Solar 300Watts Solar Panel Full Kit All Weather + 200Ah Solar Battery + 1000W Sol', '', '', '23250'),
(2017107, '5kva hybrid inverter \r\n*2pc panels 400watts.\r\n*2pc battery 200ah.\r\n*20mtr pv cable.\r\n*10bulbs.\r\n*Solar rails.                      ', '', 100, 110000, 90000, 35, 'uploaded_photos/Screenshot_20231125-141427~2.jpg', 'Available', '5kw Solar  Inverter Power  Backup System', '', '', '25250'),
(2017108, 'Panel 200W-8pcs\r\nBattery 200Ah-4pcs\r\n3KVA Hybrid Inverter\r\nChange over\r\nAVS\r\nMetal rail\r\nJumper cable\r\nDropper cable ', '', 100, 130000, 110000, 35, 'uploaded_photos/Screenshot_20231127-034613~2.jpg', 'Available', '3KVA Solar Backup System With 3KVA Hybrid Inverter', '', '', '25100'),
(2017109, 'Brand: Power\r\nModel: Hybrid system\r\nPower(W): 1.5 kva\r\nType: Hybrid\r\nWarranty: 1 month', '', 100, 120000, 100000, 35, 'uploaded_photos/Screenshot_20231127-035230~2.jpg', 'Available', '1.5KVA Solar Backup System With Solarmax 1.5KVA Hybrid Inverter', '', '', '25150'),
(2017110, 'Brand: Generic\r\nAutomotive light voltage: 12V\r\nAutomotive light color temperature: 3000k\r\nAutomotive light wattage: 200W\r\nAutomotive light power source: DC\r\nWarranty: 10 months ', '', 100, 100000, 80000, 35, 'uploaded_photos/Screenshot_20231127-040000~2.jpg', 'Available', 'Solarmax 1KVA Solar Back Up System With Hybrid Inverter', '', '', '25200');

-- --------------------------------------------------------

--
-- Table structure for table `tblpromopro`
--

CREATE TABLE `tblpromopro` (
  `PROMOID` int(11) NOT NULL,
  `PROID` int(11) NOT NULL,
  `PRODISCOUNT` double NOT NULL,
  `PRODISPRICE` double NOT NULL,
  `PROBANNER` tinyint(4) NOT NULL,
  `PRONEW` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpromopro`
--

INSERT INTO `tblpromopro` (`PROMOID`, `PROID`, `PRODISCOUNT`, `PRODISPRICE`, `PROBANNER`, `PRONEW`) VALUES
(7, 201743, 0, 70000, 0, 0),
(8, 201744, 0, 42000, 0, 0),
(13, 201749, 0, 70000, 0, 0),
(14, 201750, 0, 80000, 0, 0),
(15, 201751, 0, 50, 0, 0),
(33, 201769, 0, 600, 0, 0),
(34, 201770, 0, 700, 0, 0),
(35, 201771, 0, 500, 0, 0),
(36, 201772, 0, 600, 0, 0),
(37, 201773, 0, 650, 0, 0),
(38, 201774, 0, 750, 0, 0),
(39, 201775, 0, 850, 0, 0),
(40, 201776, 0, 750, 0, 0),
(41, 201777, 0, 950, 0, 0),
(42, 201778, 0, 800, 0, 0),
(43, 201779, 0, 1450, 0, 0),
(44, 201780, 0, 183000, 0, 0),
(45, 201781, 0, 180000, 1, 0),
(46, 201782, 0, 181500, 1, 0),
(47, 201783, 0, 8500, 0, 0),
(48, 201784, 0, 5000, 0, 0),
(49, 201785, 0, 20000, 0, 0),
(50, 201786, 0, 24000, 0, 0),
(52, 201788, 0, 230000, 0, 0),
(53, 201789, 0, 3000, 0, 0),
(54, 201790, 0, 9000, 0, 0),
(55, 201791, 0, 4000, 0, 0),
(56, 201792, 0, 9000, 0, 0),
(57, 201793, 0, 6000, 0, 0),
(58, 201794, 0, 7000, 0, 0),
(59, 201795, 0, 750, 0, 0),
(60, 201796, 0, 1400, 0, 0),
(61, 201797, 0, 7000, 0, 0),
(62, 201798, 0, 16000, 0, 0),
(63, 201799, 0, 150000, 0, 0),
(64, 2017100, 0, 70000, 0, 0),
(65, 2017101, 0, 10000, 0, 0),
(66, 2017102, 0, 14000, 0, 0),
(67, 2017103, 0, 7000, 0, 0),
(68, 2017104, 0, 14000, 0, 0),
(69, 2017105, 0, 22000, 0, 0),
(70, 2017106, 0, 29000, 0, 0),
(71, 2017107, 0, 90000, 0, 0),
(72, 2017108, 0, 110000, 0, 0),
(73, 2017109, 0, 100000, 0, 0),
(74, 2017110, 0, 80000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblsetting`
--

CREATE TABLE `tblsetting` (
  `SETTINGID` int(11) NOT NULL,
  `PLACE` text NOT NULL,
  `BRGY` varchar(90) NOT NULL,
  `DELPRICE` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsetting`
--

INSERT INTO `tblsetting` (`SETTINGID`, `PLACE`, `BRGY`, `DELPRICE`) VALUES
(1, 'Meru', ' 1', 500),
(2, 'Mombasa ', '2', 700),
(3, 'Kigali', '3', 150);

-- --------------------------------------------------------

--
-- Table structure for table `tblstockin`
--

CREATE TABLE `tblstockin` (
  `STOCKINID` int(11) NOT NULL,
  `STOCKDATE` datetime DEFAULT NULL,
  `PROID` int(11) DEFAULT NULL,
  `STOCKQTY` int(11) DEFAULT NULL,
  `STOCKPRICE` double DEFAULT NULL,
  `USERID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblsummary`
--

CREATE TABLE `tblsummary` (
  `SUMMARYID` int(11) NOT NULL,
  `ORDEREDDATE` datetime NOT NULL,
  `CUSTOMERID` int(11) NOT NULL,
  `ORDEREDNUM` int(11) NOT NULL,
  `DELFEE` double NOT NULL,
  `PAYMENT` double NOT NULL,
  `PAYMENTMETHOD` varchar(30) NOT NULL,
  `TRANSACTIONCODE` varchar(20) NOT NULL,
  `ORDEREDSTATS` varchar(30) NOT NULL,
  `ORDEREDREMARKS` varchar(125) NOT NULL,
  `CLAIMEDADTE` datetime NOT NULL,
  `HVIEW` tinyint(4) NOT NULL,
  `USERID` int(11) NOT NULL,
  `PAYMENT_STATUS` varchar(100) NOT NULL DEFAULT 'Paid Waiting For Finance Approval',
  `SHIPPING_STATUS` varchar(100) NOT NULL DEFAULT 'Not Yet Shipped',
  `DRIVER` varchar(50) NOT NULL DEFAULT 'Not Assigned',
  `PROID` int(50) NOT NULL,
  `LOCATIONDETAILS` varchar(500) NOT NULL,
  `REASON` varchar(100) NOT NULL,
  `GOODSSTATUS` varchar(200) NOT NULL,
  `CUSTCOMMENT` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsummary`
--

INSERT INTO `tblsummary` (`SUMMARYID`, `ORDEREDDATE`, `CUSTOMERID`, `ORDEREDNUM`, `DELFEE`, `PAYMENT`, `PAYMENTMETHOD`, `TRANSACTIONCODE`, `ORDEREDSTATS`, `ORDEREDREMARKS`, `CLAIMEDADTE`, `HVIEW`, `USERID`, `PAYMENT_STATUS`, `SHIPPING_STATUS`, `DRIVER`, `PROID`, `LOCATIONDETAILS`, `REASON`, `GOODSSTATUS`, `CUSTCOMMENT`) VALUES
(169, '2023-11-28 03:36:50', 82, 215, 0, 100000, 'Cooperative Bank', '356556756777', 'Confirmed', 'Delivery Completed', '0000-00-00 00:00:00', 0, 0, 'Approved', 'Goods Delivered', 'abdi@gmail.com', 2017101, 'Opposite Green stadium ', '', 'Accepted', 'Well received '),
(172, '2023-11-29 05:51:02', 81, 216, 550, 43050, 'Equity Bank', '357399773778', 'Confirmed', 'Delivery Completed', '0000-00-00 00:00:00', 0, 0, 'Approved', 'Goods Delivered', 'abdi@gmail.com', 201783, 'Opposite Tharaka Nithi county assembly ', '', 'Accepted', 'Well received '),
(173, '2023-11-29 08:30:35', 84, 217, 350, 22350, 'Equity Bank', '366738838838', 'Confirmed', 'Delivery Completed', '0000-00-00 00:00:00', 0, 0, 'Approved', 'Goods Delivered', 'abdi@gmail.com', 2017105, 'Opposite Kiharu stadium ', '', 'Accepted', 'Well received '),
(174, '2023-11-30 06:35:54', 83, 218, 1000, 9500, 'Equity Bank', '367838893377', 'Waiting For Confirmation', 'Your order is on process.', '0000-00-00 00:00:00', 0, 0, 'Paid Waiting For Finance Approval', 'Not Yet Shipped', 'Not Assigned', 201783, 'Near Post office town ', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbluseraccount`
--

CREATE TABLE `tbluseraccount` (
  `USERID` int(11) NOT NULL,
  `U_NAME` varchar(122) NOT NULL,
  `U_USERNAME` varchar(122) NOT NULL,
  `U_PASS` varchar(122) NOT NULL,
  `U_ROLE` varchar(30) NOT NULL,
  `USERIMAGE` varchar(255) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PHONE` varchar(50) NOT NULL,
  `ADDRESS` varchar(200) NOT NULL,
  `GENDER` varchar(20) NOT NULL,
  `STATUS` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluseraccount`
--

INSERT INTO `tbluseraccount` (`USERID`, `U_NAME`, `U_USERNAME`, `U_PASS`, `U_ROLE`, `USERIMAGE`, `EMAIL`, `PHONE`, `ADDRESS`, `GENDER`, `STATUS`) VALUES
(15, 'Amos Abdi', 'amos', '12345678', 'Supplier', '', 'amos@gmail.com', '0789457345', '89_nairobi', 'Male', '1'),
(126, 'Francis Otis', 'finance', '12345678', 'finance', 'photos/10329236_874204835938922_6636897990257224477_n.jpg', 'finance@gmail.com', '0720008855', '500-Mombasa', 'Male', '1'),
(127, 'Juliet Simiyu', 'inventory', '12345678', 'Inventory', '', '127', '0723567666', '700-Nairobi', 'Male', '1'),
(131, 'Abdi Sancho', 'abdi', '12345678', 'Driver', '', 'abdi@gmail.com', '0720678456', '67-meru', 'Male', '1'),
(132, 'Dennis Omondi', 'dispatch', '12345678', 'Dispatch-Manager', '', 'dispatch@gmail.com', '2345678907', '789_meru', 'Male', '1'),
(134, 'Alfred Steem', 'alfred', '12345678', 'Technician', '', 'alfred@gmail.com', '0745243566', '', 'male', '1'),
(135, 'Oduor Korir', 'oduor', '12345678', 'Technician', '', 'oduor@gmail.com', '0785795740', 'Kisumu', 'Male', '1'),
(136, 'Kalisa', 'Gabriel', '12345678', 'Supervisor', '', 'kalisa@gmail.com', '0781234566', 'Kakamega', 'Male', '1'),
(137, 'Juliet Kabul', 'manager', '12345678', 'Manager', '', 'manager@gmail.com', '0781244446', 'Kitui', 'Male', '1'),
(138, 'Andrew Kwamboka', 'AndrewMusa', '12345678', 'Supplier', '', 'andrew@gmail.com', '0781363637', 'nairobi', 'Male', '1'),
(151, 'Judy Simiyu', 'ok', '12345678', 'Driver', '', 'judy@gmail.com', '0738373737', 'Kajiado', 'Female', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tblwishlist`
--

CREATE TABLE `tblwishlist` (
  `id` int(11) NOT NULL,
  `CUSID` int(11) NOT NULL,
  `PROID` int(11) NOT NULL,
  `WISHDATE` date NOT NULL,
  `WISHSTATS` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblwishlist`
--

INSERT INTO `tblwishlist` (`id`, `CUSID`, `PROID`, `WISHDATE`, `WISHSTATS`) VALUES
(2, 9, 201742, '2019-08-21', '0'),
(3, 0, 0, '2023-03-02', '0'),
(4, 0, 0, '2023-03-02', '0'),
(5, 0, 0, '2023-03-02', '0'),
(6, 0, 0, '2023-03-02', '0'),
(7, 0, 201780, '2023-08-01', '0'),
(8, 0, 201784, '2023-10-18', '0'),
(9, 0, 201784, '2023-10-19', '0'),
(10, 0, 2017102, '2023-11-25', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookings`
--

CREATE TABLE `tbl_bookings` (
  `id` int(10) NOT NULL,
  `stu_id` int(10) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `service` varchar(50) NOT NULL,
  `feedback` varchar(200) NOT NULL,
  `charges` int(10) NOT NULL,
  `fee` float NOT NULL,
  `transactioncode` varchar(100) NOT NULL,
  `eventdate` date NOT NULL,
  `location` varchar(200) NOT NULL,
  `county` varchar(100) NOT NULL,
  `photographer` varchar(100) NOT NULL DEFAULT 'Not Assigned',
  `engineer` varchar(50) NOT NULL DEFAULT 'Not Assigned',
  `recommandation` varchar(1000) NOT NULL,
  `engineer_recommandation` varchar(1000) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending',
  `payment_status` varchar(20) NOT NULL DEFAULT 'Pending',
  `rating` varchar(30) NOT NULL,
  `photographer_status` varchar(30) NOT NULL DEFAULT 'Pending',
  `bdate` datetime NOT NULL DEFAULT current_timestamp(),
  `cust_remark` varchar(200) NOT NULL,
  `sup_remark` varchar(500) NOT NULL,
  `method` varchar(200) NOT NULL,
  `floors` int(10) NOT NULL,
  `qty` int(50) NOT NULL,
  `materialcost` float NOT NULL,
  `labourcost` float NOT NULL,
  `repstats` varchar(50) NOT NULL DEFAULT 'Pending',
  `reg` varchar(100) NOT NULL,
  `lndsize` float NOT NULL,
  `slope` varchar(500) NOT NULL,
  `depth` float NOT NULL,
  `pdate` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total` float NOT NULL,
  `duration` varchar(100) NOT NULL,
  `sdate` varchar(100) NOT NULL DEFAULT 'Not Yet Scheduled',
  `edate` varchar(100) NOT NULL DEFAULT 'Not Yet Scheduled',
  `cert` varchar(100) NOT NULL DEFAULT 'Not Yet Issued',
  `sup_confirm` varchar(100) NOT NULL DEFAULT 'Not Yet Confirmed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bookings`
--

INSERT INTO `tbl_bookings` (`id`, `stu_id`, `full_name`, `l_name`, `email`, `phone`, `address`, `service`, `feedback`, `charges`, `fee`, `transactioncode`, `eventdate`, `location`, `county`, `photographer`, `engineer`, `recommandation`, `engineer_recommandation`, `status`, `payment_status`, `rating`, `photographer_status`, `bdate`, `cust_remark`, `sup_remark`, `method`, `floors`, `qty`, `materialcost`, `labourcost`, `repstats`, `reg`, `lndsize`, `slope`, `depth`, `pdate`, `total`, `duration`, `sdate`, `edate`, `cert`, `sup_confirm`) VALUES
(166, 81, 'Caleb', 'Otieno', 'caleb@gmail.com', '0752461966', '', 'Solar Power Backup System Installation', '', 5000, 800, '346784468994', '2023-12-15', ' Near Starehe primary school ', 'Taita-Taveta', 'oduor@gmail.com', 'Not Assigned', 'Work done ', '', 'Approved', 'Approved', '', 'Completed', '2023-11-29 04:21:26', 'The service was well offered', 'Good job ', 'Family Bank', 0, 2, 0, 0, 'Pending', '', 0, '', 0, '2023-11-29 04:31:18', 10800, ' Installation of 3 kVA power backup system', 'Not Yet Scheduled', 'Not Yet Scheduled', 'Not Yet Issued', 'Approved'),
(167, 83, 'Vishal', 'Kamau', 'kamau@gmail.com', '0702546649', '', 'Solar Panel Installation', '', 2000, 1000, '364576255677', '2023-12-16', ' Opposite KCB bank ', 'Wajir', 'oduor@gmail.com', 'Not Assigned', 'Work done ', '', 'Approved', 'Approved', '', 'Completed', '2023-11-29 09:01:05', 'Well offered', 'Work done ', 'Kenya Commercial Bank', 0, 2, 0, 0, 'Pending', '', 0, '', 0, '2023-11-29 09:10:56', 5000, ' 30 watts solar panel', 'Not Yet Scheduled', 'Not Yet Scheduled', 'Not Yet Issued', 'Approved'),
(168, 84, 'Martin', 'Kariuki', 'kariuki@gmail.com', '0765664334', '', 'Solar Panel Installation', '', 2000, 400, '356388874883', '2023-12-22', ' Near ABSA bank', 'Nakuru', 'Not Assigned', 'Not Assigned', '', '', 'Pending', 'Approved', '', 'Pending', '2023-11-29 20:36:29', '', '', 'Cooperative Bank', 0, 2, 0, 0, 'Pending', '', 0, '', 0, '2023-11-29 20:44:15', 4400, ' 100 watts solar panel installation', 'Not Yet Scheduled', 'Not Yet Scheduled', 'Not Yet Issued', 'Not Yet Confirmed'),
(169, 84, 'Martin', 'Kariuki', 'kariuki@gmail.com', '0765664334', '', 'Solar Power Backup System Installation', '', 5000, 600, '357787678767', '2023-12-07', ' Near National Oil petrol station ', 'Migori', 'alfred@gmail.com', 'Not Assigned', 'Work done ', '', 'Approved', 'Approved', '', 'Completed', '2023-11-29 20:42:59', 'The service was fully offered', 'Good work ', 'Family Bank', 0, 2, 0, 0, 'Pending', '', 0, '', 0, '2023-11-29 20:49:00', 10600, ' 3 kVA solar power backup system', 'Not Yet Scheduled', 'Not Yet Scheduled', 'Not Yet Issued', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE `tbl_country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(100) NOT NULL DEFAULT '',
  `price` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_country`
--

INSERT INTO `tbl_country` (`country_id`, `country_name`, `price`) VALUES
(1, 'Mombasa', 1000),
(2, 'Kwale', 1000),
(3, 'Kilifi', 950),
(4, 'Tana River', 900),
(5, 'Lamu', 900),
(6, 'Taita-Taveta', 800),
(7, 'Garissa', 1000),
(8, 'Wajir', 1000),
(9, 'Mandera', 1000),
(10, 'Marsabit', 950),
(11, 'Isiolo', 700),
(12, 'Meru', 600),
(13, 'Tharaka-Nithi', 550),
(14, 'Embu', 500),
(15, 'Kitui', 600),
(16, 'Machakos', 500),
(17, 'Makueni', 550),
(18, 'Nyandarua', 400),
(19, 'Nyeri', 450),
(20, 'Kirinyaga', 500),
(21, 'Muranga', 500),
(22, 'Kiambu', 350),
(23, 'Turkana', 950),
(24, 'West Pokot', 700),
(25, 'Samburu', 700),
(26, 'Trans Nzoia', 700),
(27, 'Uasin Ngishu', 600),
(28, 'Elgeiyo Marakwet', 700),
(29, 'Nandi', 650),
(30, 'Baringo', 600),
(31, 'Laikipia', 500),
(32, 'Nakuru', 400),
(33, 'Narok', 500),
(34, 'Kajiado', 400),
(35, 'Kericho', 500),
(36, 'Bomet', 550),
(37, 'Kakamega', 600),
(38, 'Vihiga', 650),
(39, 'Bungoma', 600),
(40, 'Busia', 600),
(41, 'Siaya', 700),
(42, 'Kisumu', 550),
(43, 'Homa Bay', 600),
(44, 'Migori', 600),
(45, 'Kisii', 500),
(46, 'Nyamira', 600),
(47, 'Nairobi', 200);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faq`
--

CREATE TABLE `tbl_faq` (
  `faq_id` int(11) NOT NULL,
  `faq_title` varchar(255) NOT NULL,
  `faq_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_faq`
--

INSERT INTO `tbl_faq` (`faq_id`, `faq_title`, `faq_content`) VALUES
(1, 'How to find an item?', '<h3 class=\"checkout-complete-box font-bold txt16\" style=\"box-sizing: inherit; text-rendering: optimizeLegibility; margin: 0.2rem 0px 0.5rem; padding: 0px; line-height: 1.4; background-color: rgb(250, 250, 250);\"><font color=\"#222222\" face=\"opensans, Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif\"><span style=\"font-size: 15.7143px;\">We have a wide range of fabulous products to choose from.</span></font></h3><h3 class=\"checkout-complete-box font-bold txt16\" style=\"box-sizing: inherit; text-rendering: optimizeLegibility; margin: 0.2rem 0px 0.5rem; padding: 0px; line-height: 1.4; background-color: rgb(250, 250, 250);\"><span style=\"font-size: 15.7143px; color: rgb(34, 34, 34); font-family: opensans, \"Helvetica Neue\", Helvetica, Helvetica, Arial, sans-serif;\">Tip 1: If you\'re looking for a specific product, use the keyword search box located at the top of the site. Simply type what you are looking for, and prepare to be amazed!</span></h3><h3 class=\"checkout-complete-box font-bold txt16\" style=\"box-sizing: inherit; text-rendering: optimizeLegibility; margin: 0.2rem 0px 0.5rem; padding: 0px; line-height: 1.4; background-color: rgb(250, 250, 250);\"><font color=\"#222222\" face=\"opensans, Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif\"><span style=\"font-size: 15.7143px;\">Tip 2: If you want to explore a category of products, use the Shop Categories in the upper menu, and navigate through your favorite categories where we\'ll feature the best products in each.</span></font><br><br></h3>\r\n'),
(2, 'What is your return policy?', '<p><span style=\"color: rgb(10, 10, 10); font-family: opensans, &quot;Helvetica Neue&quot;, Helvetica, Helvetica, Arial, sans-serif; font-size: 14px; text-align: center;\">You have 15 days to make a refund request after your order has been delivered.</span><br></p>\r\n'),
(3, ' I received a defective/damaged item, can I get a refund?', '<p>In case the item you received is damaged or defective, you could return an item in the same condition as you received it with the original box and/or packaging intact. Once we receive the returned item, we will inspect it and if the item is found to be defective or damaged, we will process the refund along with any shipping fees incurred.<br></p>\r\n'),
(4, 'When are ‘Returns’ not possible?', '<p class=\"a  \" style=\"box-sizing: inherit; text-rendering: optimizeLegibility; line-height: 1.6; margin-bottom: 0.714286rem; padding: 0px; font-size: 14px; color: rgb(10, 10, 10); font-family: opensans, &quot;Helvetica Neue&quot;, Helvetica, Helvetica, Arial, sans-serif; background-color: rgb(250, 250, 250);\">There are a few certain scenarios where it is difficult for us to support returns:</p><ol style=\"box-sizing: inherit; line-height: 1.6; margin-right: 0px; margin-bottom: 0px; margin-left: 1.25rem; padding: 0px; list-style-position: outside; color: rgb(10, 10, 10); font-family: opensans, &quot;Helvetica Neue&quot;, Helvetica, Helvetica, Arial, sans-serif; font-size: 14px; background-color: rgb(250, 250, 250);\"><li style=\"box-sizing: inherit; margin: 0px; padding: 0px; font-size: inherit;\">Return request is made outside the specified time frame, of 15 days from delivery.</li><li style=\"box-sizing: inherit; margin: 0px; padding: 0px; font-size: inherit;\">Product is used, damaged, or is not in the same condition as you received it.</li><li style=\"box-sizing: inherit; margin: 0px; padding: 0px; font-size: inherit;\">Specific categories like innerwear, lingerie, socks and clothing freebies etc.</li><li style=\"box-sizing: inherit; margin: 0px; padding: 0px; font-size: inherit;\">Defective products which are covered under the manufacturer\'s warranty.</li><li style=\"box-sizing: inherit; margin: 0px; padding: 0px; font-size: inherit;\">Any consumable item which has been used or installed.</li><li style=\"box-sizing: inherit; margin: 0px; padding: 0px; font-size: inherit;\">Products with tampered or missing serial numbers.</li><li style=\"box-sizing: inherit; margin: 0px; padding: 0px; font-size: inherit;\">Anything missing from the package you\'ve received including price tags, labels, original packing, freebies and accessories.</li><li style=\"box-sizing: inherit; margin: 0px; padding: 0px; font-size: inherit;\">Fragile items, hygiene related items.</li></ol>\r\n'),
(6, 'How To shop?', '<p>Click on&nbsp; Shop Now in your dashboard menu</p><p>&nbsp; Select the product you wish to Order</p><p>&nbsp; Click the along your product of choice</p><p>&nbsp; Enter the quantity amount you want to order</p><p>&nbsp; Click the submit button</p><p>&nbsp; The Product is added to the cart</p><p>&nbsp; You can add or drop a product from the cart</p><p>&nbsp; Once the cart is ready, Click the submit button</p><p>&nbsp; Enter the MPESA Code&nbsp;</p><p>&nbsp; Click make payment</p><p>&nbsp; The system finance will approve your payment record</p>'),
(7, 'How to supply product?', '<div style=\"color: rgb(212, 212, 212); background-color: rgb(30, 30, 30); font-family: Consolas, &quot;Courier New&quot;, monospace; font-size: 14px; line-height: 19px; white-space: pre;\"><div>&nbsp; &nbsp; Login to your dashboard as a farmer</div><div>&nbsp; &nbsp; Click Add Product from your dashboard</div><div>&nbsp; &nbsp; Enter the product details and click the Submit button</div><div>&nbsp; &nbsp; The Stock controller will approve your product</div></div>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_language`
--

CREATE TABLE `tbl_language` (
  `lang_id` int(11) NOT NULL,
  `lang_name` varchar(255) NOT NULL,
  `lang_value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_language`
--

INSERT INTO `tbl_language` (`lang_id`, `lang_name`, `lang_value`) VALUES
(1, 'Currency', '$'),
(2, 'Search Product', 'Search Product'),
(3, 'Search', 'Search'),
(4, 'Submit', 'Submit'),
(5, 'Update', 'Update'),
(6, 'Read More', 'Read More'),
(7, 'Serial', 'Serial'),
(8, 'Photo', 'Photo'),
(9, 'Login', 'Login'),
(10, 'Customer Login', 'Customer Login'),
(11, 'Click here to login', 'Click here to login'),
(12, 'Back to Login Page', 'Back to Login Page'),
(13, 'Logged in as', 'Logged in as'),
(14, 'Logout', 'Logout'),
(15, 'Register', 'Register'),
(16, 'Customer Registration', 'Customer Registration'),
(17, 'Registration Successful', 'Registration Successful'),
(18, 'Cart', 'Cart'),
(19, 'View Cart', 'View Cart'),
(20, 'Update Cart', 'Update Cart'),
(21, 'Back to Cart', 'Back to Cart'),
(22, 'Checkout', 'Checkout'),
(23, 'Proceed to Checkout', 'Proceed to Checkout'),
(24, 'Orders', 'Orders'),
(25, 'Order History', 'Order History'),
(26, 'Order Details', 'Order Details'),
(27, 'Payment Date and Time', 'Payment Date and Time'),
(28, 'Transaction ID', 'Transaction ID'),
(29, 'Paid Amount', 'Paid Amount'),
(30, 'Payment Status', 'Payment Status'),
(31, 'Payment Method', 'Payment Method'),
(32, 'Payment ID', 'Payment ID'),
(33, 'Payment Section', 'Payment Section'),
(34, 'Select Payment Method', 'Select Payment Method'),
(35, 'Select a Method', 'Select a Method'),
(36, 'PayPal', 'PayPal'),
(37, 'Stripe', 'Stripe'),
(38, 'Bank Deposit', 'Bank Deposit'),
(39, 'Card Number', 'Card Number'),
(40, 'CVV', 'CVV'),
(41, 'Month', 'Month'),
(42, 'Year', 'Year'),
(43, 'Send to this Details', 'Send to this Details'),
(44, 'Transaction Information', 'Transaction Information'),
(45, 'Include transaction id and other information correctly', 'Include transaction id and other information correctly'),
(46, 'Pay Now', 'Pay Now'),
(47, 'Product Name', 'Product Name'),
(48, 'Product Details', 'Product Details'),
(49, 'Categories', 'Categories'),
(50, 'Category:', 'Category:'),
(51, 'All Products Under', 'All Products Under'),
(52, 'Select Size', 'Select Size'),
(53, 'Select Color', 'Select Color'),
(54, 'Product Price', 'Product Price'),
(55, 'Quantity', 'Quantity'),
(56, 'Out of Stock', 'Out of Stock'),
(57, 'Share This', 'Share This'),
(58, 'Share This Product', 'Share This Product'),
(59, 'Product Description', 'Product Description'),
(60, 'Features', 'Features'),
(61, 'Conditions', 'Conditions'),
(62, 'Return Policy', 'Return Policy'),
(63, 'Reviews', 'Reviews'),
(64, 'Review', 'Review'),
(65, 'Give a Review', 'Give a Review'),
(66, 'Write your comment (Optional)', 'Write your comment (Optional)'),
(67, 'Submit Review', 'Submit Review'),
(68, 'You already have given a rating!', 'You already have given a rating!'),
(69, 'You must have to login to give a review', 'You must have to login to give a review'),
(70, 'No description found', 'No description found'),
(71, 'No feature found', 'No feature found'),
(72, 'No condition found', 'No condition found'),
(73, 'No return policy found', 'No return policy found'),
(74, 'Review not found', 'Review not found'),
(75, 'Customer Name', 'Customer Name'),
(76, 'Comment', 'Comment'),
(77, 'Comments', 'Comments'),
(78, 'Rating', 'Rating'),
(79, 'Previous', 'Previous'),
(80, 'Next', 'Next'),
(81, 'Sub Total', 'Sub Total'),
(82, 'Total', 'Total'),
(83, 'Action', 'Action'),
(84, 'Shipping Cost', 'Shipping Cost'),
(85, 'Continue Shopping', 'Continue Shopping'),
(86, 'Update Billing Address', 'Update Billing Address'),
(87, 'Update Shipping Address', 'Update Shipping Address'),
(88, 'Update Billing and Shipping Info', 'Update Billing and Shipping Info'),
(89, 'Dashboard', 'Dashboard'),
(90, 'Welcome to the Dashboard', 'Welcome to the Dashboard'),
(91, 'Back to Dashboard', 'Back to Dashboard'),
(92, 'Subscribe', 'Subscribe'),
(93, 'Subscribe To Our Newsletter', 'Subscribe To Our Newsletter'),
(94, 'Email Address', 'Email Address'),
(95, 'Enter Your Email Address', 'Enter Your Email Address'),
(96, 'Password', 'Password'),
(97, 'Forget Password', 'Forget Password'),
(98, 'Retype Password', 'Retype Password'),
(99, 'Update Password', 'Update Password'),
(100, 'New Password', 'New Password'),
(101, 'Retype New Password', 'Retype New Password'),
(102, 'Full Name', 'Full Name'),
(103, 'Company Name', 'Company Name'),
(104, 'Phone Number', 'Phone Number'),
(105, 'Address', 'Address'),
(106, 'Country', 'Country'),
(107, 'City', 'City'),
(108, 'State', 'State'),
(109, 'Zip Code', 'Zip Code'),
(110, 'About Us', 'About Us'),
(111, 'Featured Posts', 'Featured Posts'),
(112, 'Popular Posts', 'Popular Posts'),
(113, 'Recent Posts', 'Recent Posts'),
(114, 'Contact Information', 'Contact Information'),
(115, 'Contact Form', 'Contact Form'),
(116, 'Our Office', 'Our Office'),
(117, 'Update Profile', 'Update Profile'),
(118, 'Send Message', 'Send Message'),
(119, 'Message', 'Message'),
(120, 'Find Us On Map', 'Find Us On Map'),
(121, 'Congratulation! Payment is successful.', 'Congratulation! Payment is successful.'),
(122, 'Billing and Shipping Information is updated successfully.', 'Billing and Shipping Information is updated successfully.'),
(123, 'Customer Name can not be empty.', 'Customer Name can not be empty.'),
(124, 'Phone Number can not be empty.', 'Phone Number can not be empty.'),
(125, 'Address can not be empty.', 'Address can not be empty.'),
(126, 'You must have to select a country.', 'You must have to select a country.'),
(127, 'City can not be empty.', 'City can not be empty.'),
(128, 'State can not be empty.', 'State can not be empty.'),
(129, 'Zip Code can not be empty.', 'Zip Code can not be empty.'),
(130, 'Profile Information is updated successfully.', 'Profile Information is updated successfully.'),
(131, 'Email Address can not be empty', 'Email Address can not be empty'),
(132, 'Email and/or Password can not be empty.', 'Email and/or Password can not be empty.'),
(133, 'Email Address does not match.', 'Email Address does not match.'),
(134, 'Email address must be valid.', 'Email address must be valid.'),
(135, 'You email address is not found in our system.', 'You email address is not found in our system.'),
(136, 'Please check your email and confirm your subscription.', 'Please check your email and confirm your subscription.'),
(137, 'Your email is verified successfully. You can now login to our website.', 'Your email is verified successfully. You can now login to our website.'),
(138, 'Password can not be empty.', 'Password can not be empty.'),
(139, 'Passwords do not match.', 'Passwords do not match.'),
(140, 'Please enter new and retype passwords.', 'Please enter new and retype passwords.'),
(141, 'Password is updated successfully.', 'Password is updated successfully.'),
(142, 'To reset your password, please click on the link below.', 'To reset your password, please click on the link below.'),
(143, 'PASSWORD RESET REQUEST - YOUR WEBSITE.COM', 'PASSWORD RESET REQUEST - YOUR WEBSITE.COM'),
(144, 'The password reset email time (24 hours) has expired. Please again try to reset your password.', 'The password reset email time (24 hours) has expired. Please again try to reset your password.'),
(145, 'A confirmation link is sent to your email address. You will get the password reset information in there.', 'A confirmation link is sent to your email address. You will get the password reset information in there.'),
(146, 'Password is reset successfully. You can now login.', 'Password is reset successfully. You can now login.'),
(147, 'Email Address Already Exists', 'Email Address Already Exists.'),
(148, 'Sorry! Your account is inactive. Please contact to the administrator.', 'Sorry! Your account is inactive. Please contact to the administrator.'),
(149, 'Change Password', 'Change Password'),
(150, 'Registration Email Confirmation for YOUR WEBSITE', 'Registration Email Confirmation for YOUR WEBSITE.'),
(151, 'Thank you for your registration! Your account has been created. To active your account click on the link below:', 'Thank you for your registration! Your account has been created. To active your account click on the link below:'),
(152, 'Your registration is completed. Please check your email address to follow the process to confirm your registration.', 'Your registration is completed. Please check your email address to follow the process to confirm your registration.'),
(153, 'No Product Found', 'No Product Found'),
(154, 'Add to Cart', 'Add to Cart'),
(155, 'Related Products', 'Related Products'),
(156, 'See all related products from below', 'See all the related products from below'),
(157, 'Size', 'Size'),
(158, 'Color', 'Color'),
(159, 'Price', 'Price'),
(160, 'Please login as customer to checkout', 'Please login as customer to checkout'),
(161, 'Billing Address', 'Billing Address'),
(162, 'Shipping Address', 'Shipping Address'),
(163, 'Rating is Submitted Successfully!', 'Rating is Submitted Successfully!');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE `tbl_page` (
  `id` int(11) NOT NULL,
  `about_title` varchar(255) NOT NULL,
  `about_content` text NOT NULL,
  `about_banner` varchar(255) NOT NULL,
  `about_meta_title` varchar(255) NOT NULL,
  `about_meta_keyword` text NOT NULL,
  `about_meta_description` text NOT NULL,
  `faq_title` varchar(255) NOT NULL,
  `faq_banner` varchar(255) NOT NULL,
  `faq_meta_title` varchar(255) NOT NULL,
  `faq_meta_keyword` text NOT NULL,
  `faq_meta_description` text NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_banner` varchar(255) NOT NULL,
  `blog_meta_title` varchar(255) NOT NULL,
  `blog_meta_keyword` text NOT NULL,
  `blog_meta_description` text NOT NULL,
  `contact_title` varchar(255) NOT NULL,
  `contact_banner` varchar(255) NOT NULL,
  `contact_meta_title` varchar(255) NOT NULL,
  `contact_meta_keyword` text NOT NULL,
  `contact_meta_description` text NOT NULL,
  `pgallery_title` varchar(255) NOT NULL,
  `pgallery_banner` varchar(255) NOT NULL,
  `pgallery_meta_title` varchar(255) NOT NULL,
  `pgallery_meta_keyword` text NOT NULL,
  `pgallery_meta_description` text NOT NULL,
  `vgallery_title` varchar(255) NOT NULL,
  `vgallery_banner` varchar(255) NOT NULL,
  `vgallery_meta_title` varchar(255) NOT NULL,
  `vgallery_meta_keyword` text NOT NULL,
  `vgallery_meta_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`id`, `about_title`, `about_content`, `about_banner`, `about_meta_title`, `about_meta_keyword`, `about_meta_description`, `faq_title`, `faq_banner`, `faq_meta_title`, `faq_meta_keyword`, `faq_meta_description`, `blog_title`, `blog_banner`, `blog_meta_title`, `blog_meta_keyword`, `blog_meta_description`, `contact_title`, `contact_banner`, `contact_meta_title`, `contact_meta_keyword`, `contact_meta_description`, `pgallery_title`, `pgallery_banner`, `pgallery_meta_title`, `pgallery_meta_keyword`, `pgallery_meta_description`, `vgallery_title`, `vgallery_banner`, `vgallery_meta_title`, `vgallery_meta_keyword`, `vgallery_meta_description`) VALUES
(1, 'Makers of the best curtains,bed-covers and loose-covers this side of the Sahara.', 'Chloride Exide, has three locally owned limited liability companies in Kenya, Uganda and Tanzania. Chloride Exide Kenya Limited (CEKL) was established in 1963, Chloride Exide Tanzania Limited (CETL) established in 1966 and Chloride Exide Uganda Limited (CEUL) established in 2001. Chloride Exide’s core business is distribution of automotive batteries, solar systems installation, backup systems installation, and solar water heating systems installations.', 'about-banner.jpg', 'mamba- About Us', 'about, about us, about our products, about mamba rwandwa millers', 'Our goal has always been to get the best for you .', 'FAQ', 'faq-banner.jpg', 'Fashionys.com - FAQ', '', '', 'Blog', 'blog-banner.jpg', 'Ecommerce - Blog', '', '', 'Contact Us', 'contact-banner.jpg', 'Basket Kenya', '', '', 'Photo Gallery', 'pgallery-banner.jpg', 'Ecommerce - Photo Gallery', '', '', 'Video Gallery', 'vgallery-banner.jpg', 'Ecommerce - Video Gallery', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `serviceid` int(11) NOT NULL,
  `servicename` varchar(100) NOT NULL,
  `pricing` int(10) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `duration` varchar(50) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`serviceid`, `servicename`, `pricing`, `description`, `duration`, `category`, `status`, `date`) VALUES
(42, 'Solar Panel Installation', 2000, ' Installation of 50 watts,100 watts,200 watts and 300 watts solar panel ', 'Select Duration', NULL, 'Active', '2023-11-27 06:25:31'),
(47, 'Solar Power Backup System Installation', 5000, 'Installation of 1 kVA,1.5kVA,3kVA and 5KW solar power backup system', 'Select Duration', NULL, 'Active', '2023-11-27 06:27:14'),
(48, 'Solar Water Heater System Installation', 8000, 'Installation of 300L and 200L solar water heater system', 'Select Duration', NULL, 'Active', '2023-11-27 06:28:10'),
(49, 'Automotive Maintenance', 2000, 'Proper maintenance of motive power batteries ', 'Select Duration', NULL, 'Active', '2023-11-27 06:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `footer_about` text NOT NULL,
  `footer_copyright` text NOT NULL,
  `contact_address` text NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `contact_fax` varchar(255) NOT NULL,
  `contact_map_iframe` text NOT NULL,
  `receive_email` varchar(255) NOT NULL,
  `receive_email_subject` varchar(255) NOT NULL,
  `receive_email_thank_you_message` text NOT NULL,
  `forget_password_message` text NOT NULL,
  `total_recent_post_footer` int(10) NOT NULL,
  `total_popular_post_footer` int(10) NOT NULL,
  `total_recent_post_sidebar` int(11) NOT NULL,
  `total_popular_post_sidebar` int(11) NOT NULL,
  `total_featured_product_home` int(11) NOT NULL,
  `total_latest_product_home` int(11) NOT NULL,
  `total_popular_product_home` int(11) NOT NULL,
  `meta_title_home` text NOT NULL,
  `meta_keyword_home` text NOT NULL,
  `meta_description_home` text NOT NULL,
  `banner_login` varchar(255) NOT NULL,
  `banner_registration` varchar(255) NOT NULL,
  `banner_forget_password` varchar(255) NOT NULL,
  `banner_reset_password` varchar(255) NOT NULL,
  `banner_search` varchar(255) NOT NULL,
  `banner_cart` varchar(255) NOT NULL,
  `banner_checkout` varchar(255) NOT NULL,
  `banner_product_category` varchar(255) NOT NULL,
  `banner_blog` varchar(255) NOT NULL,
  `cta_title` varchar(255) NOT NULL,
  `cta_content` text NOT NULL,
  `cta_read_more_text` varchar(255) NOT NULL,
  `cta_read_more_url` varchar(255) NOT NULL,
  `cta_photo` varchar(255) NOT NULL,
  `featured_product_title` varchar(255) NOT NULL,
  `featured_product_subtitle` varchar(255) NOT NULL,
  `latest_product_title` varchar(255) NOT NULL,
  `latest_product_subtitle` varchar(255) NOT NULL,
  `popular_product_title` varchar(255) NOT NULL,
  `popular_product_subtitle` varchar(255) NOT NULL,
  `testimonial_title` varchar(255) NOT NULL,
  `testimonial_subtitle` varchar(255) NOT NULL,
  `testimonial_photo` varchar(255) NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_subtitle` varchar(255) NOT NULL,
  `newsletter_text` text NOT NULL,
  `paypal_email` varchar(255) NOT NULL,
  `stripe_public_key` varchar(255) NOT NULL,
  `stripe_secret_key` varchar(255) NOT NULL,
  `bank_detail` text NOT NULL,
  `before_head` text NOT NULL,
  `after_body` text NOT NULL,
  `before_body` text NOT NULL,
  `home_service_on_off` int(11) NOT NULL,
  `home_welcome_on_off` int(11) NOT NULL,
  `home_featured_product_on_off` int(11) NOT NULL,
  `home_latest_product_on_off` int(11) NOT NULL,
  `home_popular_product_on_off` int(11) NOT NULL,
  `home_testimonial_on_off` int(11) NOT NULL,
  `home_blog_on_off` int(11) NOT NULL,
  `newsletter_on_off` int(11) NOT NULL,
  `ads_above_welcome_on_off` int(1) NOT NULL,
  `ads_above_featured_product_on_off` int(1) NOT NULL,
  `ads_above_latest_product_on_off` int(1) NOT NULL,
  `ads_above_popular_product_on_off` int(1) NOT NULL,
  `ads_above_testimonial_on_off` int(1) NOT NULL,
  `ads_category_sidebar_on_off` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=COMPRESSED;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`id`, `logo`, `favicon`, `footer_about`, `footer_copyright`, `contact_address`, `contact_email`, `contact_phone`, `contact_fax`, `contact_map_iframe`, `receive_email`, `receive_email_subject`, `receive_email_thank_you_message`, `forget_password_message`, `total_recent_post_footer`, `total_popular_post_footer`, `total_recent_post_sidebar`, `total_popular_post_sidebar`, `total_featured_product_home`, `total_latest_product_home`, `total_popular_product_home`, `meta_title_home`, `meta_keyword_home`, `meta_description_home`, `banner_login`, `banner_registration`, `banner_forget_password`, `banner_reset_password`, `banner_search`, `banner_cart`, `banner_checkout`, `banner_product_category`, `banner_blog`, `cta_title`, `cta_content`, `cta_read_more_text`, `cta_read_more_url`, `cta_photo`, `featured_product_title`, `featured_product_subtitle`, `latest_product_title`, `latest_product_subtitle`, `popular_product_title`, `popular_product_subtitle`, `testimonial_title`, `testimonial_subtitle`, `testimonial_photo`, `blog_title`, `blog_subtitle`, `newsletter_text`, `paypal_email`, `stripe_public_key`, `stripe_secret_key`, `bank_detail`, `before_head`, `after_body`, `before_body`, `home_service_on_off`, `home_welcome_on_off`, `home_featured_product_on_off`, `home_latest_product_on_off`, `home_popular_product_on_off`, `home_testimonial_on_off`, `home_blog_on_off`, `newsletter_on_off`, `ads_above_welcome_on_off`, `ads_above_featured_product_on_off`, `ads_above_latest_product_on_off`, `ads_above_popular_product_on_off`, `ads_above_testimonial_on_off`, `ads_category_sidebar_on_off`) VALUES
(1, 'logo.png', 'favicon.png', '<p>Lorem ipsum dolor sit amet, omnis signiferumque in mei, mei ex enim concludaturque. Senserit salutandi euripidis no per, modus maiestatis scribentur est an.Â Ea suas pertinax has.</p>\r\n', 'Copyright Â© 2022 -  Basket Kenya', 'Kirawa Road\r\nNairobi', 'basketkeny@.com', '0717 550871', '', '', 'melvinstea@gmail.com.com', '', 'Thank you for sending email. We will contact you shortly.', 'A confirmation link is sent to your email address. You will get the password reset information in there.', 4, 4, 5, 5, 5, 6, 8, 'Ecommerce PHP', 'online fashion store, garments shop, online garments', 'ecommerce php project with mysql database', 'banner_login.jpg', 'banner_registration.jpg', 'banner_forget_password.jpg', 'banner_reset_password.jpg', 'banner_search.jpg', 'banner_cart.jpg', 'banner_checkout.jpg', 'banner_product_category.jpg', 'banner_blog.jpg', 'Welcome To Our Ecommerce Website', 'Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens expetenda id sit, \r\nat usu eius eligendi singulis. Sea ocurreret principes ne. At nonumy aperiri pri, nam quodsi copiosae intellegebat et, ex deserunt euripidis usu. ', 'Read More', '#', 'cta.jpg', 'Featured Products', 'Our list on Top Featured Products', 'Latest Products', 'Our list of recently added products', 'Popular Products', 'Popular products based on customer\'s choice', 'Testimonials', 'See what our clients tell about us', 'testimonial.jpg', 'Latest Blog', 'See all our latest articles and news from below', 'Sign-up to our newsletter for latest promotions and discounts.', 'melvin@pay.com', 'pk_test_0SwMWadgu8DwmEcPdUPRsZ7b', 'sk_test_TFcsLJ7xxUtpALbDo1L5c1PN', 'M-Pesa Payment\r\nTill Number: 20000\r\nName: Melvin Marsh', '', '<div id=\"fb-root\"></div>\r\n<script>(function(d, s, id) {\r\n  var js, fjs = d.getElementsByTagName(s)[0];\r\n  if (d.getElementById(id)) return;\r\n  js = d.createElement(s); js.id = id;\r\n  js.src = \"//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=323620764400430\";\r\n  fjs.parentNode.insertBefore(js, fjs);\r\n}(document, \'script\', \'facebook-jssdk\'));</script>', '<!--Start of Tawk.to Script-->\r\n<script type=\"text/javascript\">\r\nvar Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();\r\n(function(){\r\nvar s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0];\r\ns1.async=true;\r\ns1.src=\'https://embed.tawk.to/5ae370d7227d3d7edc24cb96/default\';\r\ns1.charset=\'UTF-8\';\r\ns1.setAttribute(\'crossorigin\',\'*\');\r\ns0.parentNode.insertBefore(s1,s0);\r\n})();\r\n</script>\r\n<!--End of Tawk.to Script-->', 1, 1, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbmessages`
--

CREATE TABLE `tbmessages` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `recepient` varchar(50) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) DEFAULT NULL,
  `user` varchar(50) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbmessages`
--

INSERT INTO `tbmessages` (`id`, `user_id`, `message`, `sender`, `recepient`, `category`, `date`, `status`, `user`, `fname`, `lname`) VALUES
(124, 'andrew@gmail.com', 'Well received ', '', '127', NULL, '2023-11-29 05:47:04', NULL, '', '', ''),
(125, '127', 'Good ', '', 'andrew@gmail.com', NULL, '2023-11-29 05:48:23', NULL, 'inventory', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `emailid` varchar(255) NOT NULL,
  `lastlogin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `emailid`, `lastlogin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin@gmail.com', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `drop_location`
--
ALTER TABLE `drop_location`
  ADD PRIMARY KEY (`locationid`);

--
-- Indexes for table `messagein`
--
ALTER TABLE `messagein`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `messagelog`
--
ALTER TABLE `messagelog`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IDX_MessageId` (`MessageId`,`SendTime`);

--
-- Indexes for table `messageout`
--
ALTER TABLE `messageout`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IDX_IsRead` (`IsRead`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests_material`
--
ALTER TABLE `requests_material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblautonumber`
--
ALTER TABLE `tblautonumber`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`CATEGID`);

--
-- Indexes for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  ADD PRIMARY KEY (`CUSTOMERID`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`ORDERID`),
  ADD KEY `USERID` (`USERID`),
  ADD KEY `PROID` (`PROID`),
  ADD KEY `ORDEREDNUM` (`ORDEREDNUM`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`PROID`),
  ADD KEY `CATEGID` (`CATEGID`);

--
-- Indexes for table `tblpromopro`
--
ALTER TABLE `tblpromopro`
  ADD PRIMARY KEY (`PROMOID`),
  ADD UNIQUE KEY `PROID` (`PROID`);

--
-- Indexes for table `tblsetting`
--
ALTER TABLE `tblsetting`
  ADD PRIMARY KEY (`SETTINGID`);

--
-- Indexes for table `tblstockin`
--
ALTER TABLE `tblstockin`
  ADD PRIMARY KEY (`STOCKINID`),
  ADD KEY `PROID` (`PROID`,`USERID`),
  ADD KEY `USERID` (`USERID`);

--
-- Indexes for table `tblsummary`
--
ALTER TABLE `tblsummary`
  ADD PRIMARY KEY (`SUMMARYID`),
  ADD UNIQUE KEY `ORDEREDNUM` (`ORDEREDNUM`),
  ADD KEY `CUSTOMERID` (`CUSTOMERID`),
  ADD KEY `USERID` (`USERID`);

--
-- Indexes for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  ADD PRIMARY KEY (`USERID`);

--
-- Indexes for table `tblwishlist`
--
ALTER TABLE `tblwishlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_country`
--
ALTER TABLE `tbl_country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `tbl_language`
--
ALTER TABLE `tbl_language`
  ADD PRIMARY KEY (`lang_id`);

--
-- Indexes for table `tbl_page`
--
ALTER TABLE `tbl_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`serviceid`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbmessages`
--
ALTER TABLE `tbmessages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `drop_location`
--
ALTER TABLE `drop_location`
  MODIFY `locationid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `messagein`
--
ALTER TABLE `messagein`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messagelog`
--
ALTER TABLE `messagelog`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `messageout`
--
ALTER TABLE `messageout`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `requests_material`
--
ALTER TABLE `requests_material`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tblautonumber`
--
ALTER TABLE `tblautonumber`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `CATEGID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  MODIFY `CUSTOMERID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `ORDERID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `tblpromopro`
--
ALTER TABLE `tblpromopro`
  MODIFY `PROMOID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `tblsetting`
--
ALTER TABLE `tblsetting`
  MODIFY `SETTINGID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblstockin`
--
ALTER TABLE `tblstockin`
  MODIFY `STOCKINID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblsummary`
--
ALTER TABLE `tblsummary`
  MODIFY `SUMMARYID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  MODIFY `USERID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `tblwishlist`
--
ALTER TABLE `tblwishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `tbl_country`
--
ALTER TABLE `tbl_country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_language`
--
ALTER TABLE `tbl_language`
  MODIFY `lang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `tbl_page`
--
ALTER TABLE `tbl_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `serviceid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbmessages`
--
ALTER TABLE `tbmessages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

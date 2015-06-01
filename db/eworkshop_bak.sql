-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2013 at 09:12 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

USE eworkshop;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eworkshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE IF NOT EXISTS `billing` (
  `billingno` int(10) NOT NULL AUTO_INCREMENT,
  `serviceid` int(10) NOT NULL,
  `particulars` text NOT NULL,
  `scost` double(10,2) NOT NULL,
  `date` date NOT NULL,
  `paidstatus` varchar(25) NOT NULL,
  PRIMARY KEY (`billingno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=343364 ;

--
-- Dumping data for table `billing`
--

-- INSERT INTO `billing` (`billingno`, `serviceid`, `particulars`, `scost`, `date`, `paidstatus`) VALUES
-- (11, 22, 'sdd', 34.00, '2013-02-10', 'y'),
-- (33, 4, 'rw', 0.00, '2013-02-10', 'h'),
-- (343357, 1, 'oil change', 5000.00, '2013-03-11', 'Completed'),
-- (343358, 1, 'sadf', 323.00, '2013-03-11', 'Completed'),
-- (343359, 1, 'sadf', 323.00, '2013-03-11', 'Paid'),
-- (343360, 2, 'oil change', 6000.00, '2013-03-11', 'Paid'),
-- (343361, 3, 'abcd', 500.00, '2013-03-17', 'Paid'),
-- (343362, 19, 'gggg', 101.00, '2013-03-18', 'Paid'),
-- (343363, 22, 'oil change, and all', 5000.00, '2013-03-24', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `purchaseid` int(10) NOT NULL AUTO_INCREMENT,
  `vehicleid` int(10) NOT NULL,
  `custid` int(10) NOT NULL,
  `purchasedate` date NOT NULL,
  `deliverydate` date NOT NULL,
  `comments` text NOT NULL,
  `paid` double(10,2) NOT NULL,
  `paymenttype` varchar(25) NOT NULL,
  PRIMARY KEY (`purchaseid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44450 ;

--
-- Dumping data for table `booking`
--

-- INSERT INTO `booking` (`purchaseid`, `vehicleid`, `custid`, `purchasedate`, `deliverydate`, `comments`, `paid`, `paymenttype`) VALUES
-- (123, 22222, 222222, '0000-00-00', '0000-00-00', '2222', 22222222.00, 'cash'),


-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `custid` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `createddate` date NOT NULL,
  `address` text NOT NULL,
  `city` varchar(25) NOT NULL,
  `zipcode` varchar(15) NOT NULL,
  `contactno1` varchar(25) NOT NULL,
  `contactno2` varchar(25) NOT NULL,
  PRIMARY KEY (`custid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `customer`
--

-- INSERT INTO `customer` (`custid`, `fname`, `lname`, `emailid`, `password`, `createddate`, `address`, `city`, `zipcode`, `contactno1`, `contactno2`) VALUES
-- (5, 'raj', 'hjhj', 'raj@gmail.com', '1010', '0000-00-00', 'yyu', 'yuu', '1010', '9876543210', '10101'),
-- (8, 'mahesh', 'hjhjj', 'mah@gmail.com', '1010', '2013-03-17', '', '', '', '987654321', ''),
-- (9, 'sharun', 'dsouza', 'sharunsouza@gmail.com', '123456', '2013-03-24', 'location is surathkal', 'mangalore', '575001', '9638527410', '90123345698');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `employeeid` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `loginid` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `emailid` varchar(25) NOT NULL,
  `contactno1` varchar(25) NOT NULL,
  `contactno2` varchar(25) NOT NULL,
  `employeetype` varchar(25) NOT NULL,
  PRIMARY KEY (`employeeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `employee`
--

-- INSERT INTO `employee` (`employeeid`, `fname`, `lname`, `loginid`, `password`, `emailid`, `contactno1`, `contactno2`, `employeetype`) VALUES
-- (1, 'gre', 'ds', 'admin', 'admin', 'rfr', '4894899999', '559009890', 'Admin'),
-- (5, 'emp', 'emp', 'emp', 'emp', 'emp@gmail.com', '987456321', '98756321', 'Employees');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `serviecid` int(10) NOT NULL AUTO_INCREMENT,
  `custid` int(10) NOT NULL,
  `vehiclename` varchar(25) NOT NULL,
  `vehicleno` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `address` text NOT NULL,
  `city` varchar(25) NOT NULL,
  `landmark` varchar(25) NOT NULL,
  `zipcode` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`serviecid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `service`
--

-- INSERT INTO `service` (`serviecid`, `custid`, `vehiclename`, `vehicleno`, `date`, `address`, `city`, `landmark`, `zipcode`, `status`) VALUES
-- (22, 9, 'audi abc', '123', '2013-03-24', 'abc123', 'mangalore', 'bangalore', '575220', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `spareparts`
--

CREATE TABLE IF NOT EXISTS `spareparts` (
  `spid` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `type` varchar(25) NOT NULL,
  `cost` double(10,2) NOT NULL,
  `sparepartno` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`spid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `spareparts`
--

-- INSERT INTO `spareparts` (`spid`, `name`, `type`, `cost`, `sparepartno`, `description`, `image`) VALUES
-- (1, 'dddd', 'ddd', 32423.00, 'dddd', 'dd', '006.jpg'),
-- (2, 'fff', 'ffff', 5000.00, 'ffff', 'ffff', '009.jpg'),
-- (3, 'gggg', 'gggg', 111.00, 'ggg', 'gggg', '012.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sparepartsorder`
--

CREATE TABLE IF NOT EXISTS `sparepartsorder` (
  `sporderid` int(10) NOT NULL AUTO_INCREMENT,
  `spid` int(10) NOT NULL,
  `custid` int(10) NOT NULL,
  `orderdate` date NOT NULL,
  `deliverydate` date NOT NULL,
  `noofitems` int(10) NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`sporderid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `sparepartsorder`
--

-- INSERT INTO `sparepartsorder` (`sporderid`, `spid`, `custid`, `orderdate`, `deliverydate`, `noofitems`, `status`) VALUES
-- (4, 1, 1, '2013-03-17', '2013-03-17', 10, 'Delivered'),
-- (5, 1, 1, '2013-03-17', '2013-03-17', 25, 'Delivered'),
-- (6, 1, 1, '2013-03-17', '2013-03-18', 25, 'Delivered'),
-- (7, 2, 1, '2013-03-17', '2013-03-18', 25, 'Delivered'),
-- (8, 3, 1, '2013-03-18', '2013-03-18', 100, 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `testdrive`
--

CREATE TABLE IF NOT EXISTS `testdrive` (
  `bookingid` int(10) NOT NULL AUTO_INCREMENT,
  `vehicleid` int(10) NOT NULL,
  `custid` int(10) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `comments` text NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`bookingid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `testdrive`
--

-- INSERT INTO `testdrive` (`bookingid`, `vehicleid`, `custid`, `date`, `time`, `comments`, `status`) VALUES
-- (10, 1, 0, '0000-00-00', '00:00:00', 'sdfsdfaaaaa', 'Completed'),
-- (11, 3, 0, '2013-03-14', '02:02:00', 'adsf', 'Completed'),
-- (12, 2, 3, '1970-01-01', '05:05:00', 'hello test drive', 'Pending'),
-- (13, 8, 3, '2013-03-21', '01:01:00', 'abcd test', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE IF NOT EXISTS `vehicle` (
  `sellno` int(10) NOT NULL AUTO_INCREMENT,
  `custid` int(10) NOT NULL,
  `vehname` varchar(25) NOT NULL,
  `model` varchar(25) NOT NULL,
  `brand` varchar(25) NOT NULL,
  `images` text NOT NULL,
  `estmdprice` double(10,2) NOT NULL,
  `otherinfo` text NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`sellno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `vehicle`
--

-- INSERT INTO `vehicle` (`sellno`, `custid`, `vehname`, `model`, `brand`, `images`, `estmdprice`, `otherinfo`, `status`) VALUES
-- (2, 3, 'abcd123', 'a123', 'g15', '556596_355810984497879_1309983850_n.jpg', 200000.00, 'Online vehicle showroom.', 'Accepted'),
-- (7, 3, 'AUDI123', 'bac123', 'a1', '556596_355810984497879_1309983850_n.jpg', 200000.00, 'this is test page', 'Rejected'),
-- (8, 3, 'AUDI123df', 'wr', 'trer', '563161_416388601782674_927568181_n.jpg', 3423.00, 'dfgdfgdfg', 'Accepted'),
-- (15, 3, 'a123', 'wer23', 'sdfds3', 'Lighthouse.jpg', 3423.00, 'dfdsafsa', 'Rejected'),
-- (16, 3, 'test vehicle name', 'abcd1234', 'abcd1', '812589_347940355320217_1859166955_o.jpg', 500000.00, 'test drive vehicle complete description\r\n. This is test pages', 'Accepted'),
-- (17, 3, 'abcd veh', 'a123', 's133', 'CareerPath3.jpg', 2000.00, 'abcdxyz', 'Rejected'),
-- (18, 3, 'abcd veh', 'abcd123bnew beh', '123', '012.jpg', 50000.00, 'abcd', 'Accepted'),
-- (19, 1, 'abcdbej', 'a123', 'axyz', '007.jpg', 50000.00, 'hello test', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `vehiclestore`
--

CREATE TABLE IF NOT EXISTS `vehiclestore` (
  `vehicleid` int(10) NOT NULL AUTO_INCREMENT,
  `empid` int(10) NOT NULL,
  `vehname` varchar(25) NOT NULL,
  `model` varchar(25) NOT NULL,
  `brand` varchar(25) NOT NULL,
  `images` text NOT NULL,
  `estprice` double(10,2) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`vehicleid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `vehiclestore`
--

-- INSERT INTO `vehiclestore` (`vehicleid`, `empid`, `vehname`, `model`, `brand`, `images`, `estprice`, `description`, `status`) VALUES
-- (12, 5, 'rrr', 'rrr', 'rrrr', '563161_416388601782674_927568181_n.jpg', 40000.00, 'rrr', 'rr');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

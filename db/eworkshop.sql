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
-- Dumping data for tables.
--

alter table eworkshop.billing ADD foreign key(serviceid) REFERENCES eworkshop.service(serviecid);
alter table eworkshop.service ADD foreign key(custid) REFERENCES eworkshop.customer(custid);
alter table eworkshop.testdrive ADD foreign key(custid) REFERENCES eworkshop.customer(custid);
alter table eworkshop.booking ADD foreign key(custid) REFERENCES eworkshop.customer(custid);
alter table eworkshop.vehicle ADD foreign key(custid) REFERENCES eworkshop.customer(custid);
alter table eworkshop.sparepartsorder ADD foreign key(custid) REFERENCES eworkshop.customer(custid);


alter table eworkshop.testdrive ADD foreign key(vehicleid) REFERENCES eworkshop.vehiclestore(vehicleid);
alter table eworkshop.booking ADD foreign key(vehicleid) REFERENCES eworkshop.vehiclestore(vehicleid);

alter table eworkshop.sparepartsorder ADD foreign key(spid) REFERENCES eworkshop.spareparts(spid);

alter table eworkshop.vehiclestore ADD foreign key(empid) REFERENCES eworkshop.employee(employeeid);

INSERT INTO `employee` (`employeeid`, `fname`, `lname`, `loginid`, `password`, `emailid`, `contactno1`, `contactno2`, `employeetype`) VALUES
(1, 'Manager', 'Man', 'admin', 'admin', 'admin@admin.com', '4894899999', '559009890', 'Admin');



INSERT INTO `vehiclestore` (`vehicleid`, `empid`, `vehname`, `model`, `brand`, `images`, `estprice`, `description`, `status`) VALUES
('14', 1, 'Beetle', 'VKBEETL', 'Volkswagen', 'beetle.jpg', 40000.00,'', ''),
('15', 1, 'Corolla', 'TYCOROLL', 'Toyota', 'corolla.jpg', 33000.00,'', ''),
('16', 1, 'Model S', 'TESMODS', 'Tesla', 'tesla.jpg', 80000.00,'', ''),
('17', 1, 'Prius', 'TYPRIUS', 'Toyota', 'prius.jpg', 50000.00,'', '');



INSERT INTO `spareparts` (`spid`, `name`, `type`, `cost`, `sparepartno`, `description`, `image`) VALUES
(1, 'DoorLock', 'Lock', 333.00, 'ZXC1', 'This is a doorlock', 'doorlock.jpg'),
(4, 'Seats', 'CarSeat', 1000.00, 'NZY3', 'Colored Seats collection', 'seats.jpg'),
(3, 'Pump', 'PowerPump', 511.00, 'SW3A', 'Power Steering pump', 'pump.jpg');


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

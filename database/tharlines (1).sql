-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 02, 2016 at 04:08 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tharline`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_unq_code` varchar(25) NOT NULL,
  `comp_name` varchar(70) NOT NULL,
  `cmp_txt` varchar(10) NOT NULL,
  `c_add1` text NOT NULL,
  `c_add2` text NOT NULL,
  `c_per` varchar(50) NOT NULL,
  `c_iec` varchar(40) NOT NULL,
  `c_ph` varchar(20) NOT NULL,
  `c_mo` bigint(11) NOT NULL,
  `c_email1` varchar(40) NOT NULL,
  `c_email2` varchar(70) NOT NULL,
  `c_bnk_dtl` text NOT NULL,
  `c_tin` varchar(15) NOT NULL,
  `c_cin` varchar(15) NOT NULL,
  `c_ecc` varchar(15) NOT NULL,
  `c_special_note` text NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`c_id`, `c_unq_code`, `comp_name`, `cmp_txt`, `c_add1`, `c_add2`, `c_per`, `c_iec`, `c_ph`, `c_mo`, `c_email1`, `c_email2`, `c_bnk_dtl`, `c_tin`, `c_cin`, `c_ecc`, `c_special_note`) VALUES
(1, 'PET/ZAN/001', '365 plastium', 'PT', 'F-1, PARTH INDL. ESTATE-2,\r\nSURVEY NO. 199/1, DADRA , D&NH-396230', '  ', 'Mr. Piyush', '', '02602667365', 9374151930, '365plastium@gmail.com', '', 'CORPORATION BANK\r\nDHARTI CHAMBERS -CM 8/13\r\nGROUND FLOOR, N.H 8,\r\nVAPI-396191 DIST VALSAD, GUJARAT\r\nIFSC CODE : CORP0001324\r\nMICR CODE : 396017031              ', '', '', '', ''),
(2, 'PET/ZAN/002', 'A. schulman', '', '', '', '', '', '', 0, '', '', '', '', '', '', ''),
(3, 'PET/ZAN/003', 'Aananta Polymers', '', '', '', '', '', '', 0, '', '', '', '', '', '', ''),
(4, 'PET/ZAN/004', 'Aditya Woven', '', '', '', '', '', '', 0, '', '', '', '', '', '', ''),
(5, 'PET/ZAN/005', 'Alok Master Batch(Dadra)', 'AM', 'SURVEY NO. 248/1 & 249/1, VALSAD FALIA\r\nNEAR JAIN TEMPLE, DADRA,\r\nD&NH - INDIA', '  ', 'Mr. Ajit', '', '', 8130352229, '', '', 'INDIAN OVERSEAS BANK\r\n14-15, FARM BHAWAN,\r\nNEHRU PLACE,\r\nNEW DELHI, INDIA.\r\nACCOUNT NO. : 054302000001601              ', '', '', '', ''),
(6, 'PET/ZAN/006', 'Alok Industries', '', '', '', '', '', '', 0, '', '', '', '', '', '', ''),
(7, 'PET/ZAN/007', 'Alok Master Batch(Rani Peth)', '', '', '', '', '', '', 0, '', '', '', '', '', '', ''),
(8, 'PET/ZAN/008', 'Akhtari Traders ', '', '', '', '', '', '', 0, '', '', '', '', '', '', ''),
(9, 'PET/ZAN/009', 'AVI Additives(Pithampura)', '', '', '  ', '', '', '', 0, '', '', '              ', '', '', '', ''),
(10, 'PET/ZAN/010', 'AVI Additives(Chennai)', '', '', '', '', '', '', 0, '', '', '', '', '', '', ''),
(11, 'PET/ZAN/011', 'B.D.PLASTOFILMS', '', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(12, 'PET/ZAN/012', 'BAG POLY INTERNATIONAL', '', '', '', '', '', '', 0, '', '', '', '', '', '', ''),
(13, 'PET/ZAN/013', 'BHAGYASHREE COLOURS', '', '', '', '', '', '', 0, '', '', '', '', '', '', ''),
(14, 'PET/ZAN/014', 'BHAVIN INDUSTRIES', 'BI', '', '  ', '', '', '', 0, '', '', '              ', '', '', '', '225 kg data');

-- --------------------------------------------------------

--
-- Table structure for table `client_po`
--

CREATE TABLE IF NOT EXISTS `client_po` (
  `po_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_indent_of` varchar(60) NOT NULL,
  `c_add` text NOT NULL,
  `c_id` varchar(29) NOT NULL,
  `pet_ref` varchar(30) NOT NULL,
  `date` varchar(20) NOT NULL,
  `c_po_no` varchar(40) NOT NULL,
  `inst` text NOT NULL,
  `c_bnk_d` text NOT NULL,
  `grand_total` int(40) NOT NULL,
  PRIMARY KEY (`po_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `client_po`
--

INSERT INTO `client_po` (`po_id`, `c_indent_of`, `c_add`, `c_id`, `pet_ref`, `date`, `c_po_no`, `inst`, `c_bnk_d`, `grand_total`) VALUES
(1, 'Alok Master Batch(Dadra)', ' SURVEY NO. 248/1 & 249/1, VALSAD FALIA\r\nNEAR JAIN TEMPLE, DADRA,\r\nD&NH - INDIA', 'PET/ZAN/005', 'PO/AM/0011215', '2015-12-19', '   CPO2345  ', 'Please generate a Single PI for this shipments.', 'INDIAN OVERSEAS BANK\r\n14-15, FARM BHAWAN,\r\nNEHRU PLACE,\r\nNEW DELHI, INDIA.\r\nACCOUNT NO. : 054302000001601               ', 2250),
(2, '365 plastium', ' F-1, PARTH INDL. ESTATE-2,\r\nSURVEY NO. 199/1, DADRA , D&NH-396230', 'PET/ZAN/001', 'PO/PT/0021215', '2015-12-19', '  PO123         ', 'TO BE SHIPPED THROUGH YML', 'CORPORATION BANK\r\nDHARTI CHAMBERS -CM 8/13\r\nGROUND FLOOR, N.H 8,\r\nVAPI-396191 DIST VALSAD, GUJARAT\r\nIFSC CODE : CORP0001324\r\nMICR CODE : 396017031               ', 19650),
(3, '365 plastium', ' F-1, PARTH INDL. ESTATE-2,\r\nSURVEY NO. 199/1, DADRA , D&NH-396230', 'PET/ZAN/001', 'PO/PT/0031215', '28/12/2015', ' ', '', 'CORPORATION BANK\r\nDHARTI CHAMBERS -CM 8/13\r\nGROUND FLOOR, N.H 8,\r\nVAPI-396191 DIST VALSAD, GUJARAT\r\nIFSC CODE : CORP0001324\r\nMICR CODE : 396017031               ', 960);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `u_id` int(5) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(30) NOT NULL,
  `u_pass` varchar(30) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`u_id`, `u_name`, `u_pass`) VALUES
(1, 'deepak', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `sub_po`
--

CREATE TABLE IF NOT EXISTS `sub_po` (
  `sub_po_id` int(11) NOT NULL AUTO_INCREMENT,
  `po_id` int(20) NOT NULL,
  `grade` varchar(20) NOT NULL,
  `qnt` int(10) NOT NULL,
  `unt_pr` int(10) NOT NULL,
  `c_note` int(10) NOT NULL,
  `tot_val` int(15) NOT NULL,
  `fcl` varchar(5) NOT NULL,
  `t_s_date` varchar(30) NOT NULL,
  `ship_term` varchar(30) NOT NULL,
  `pod` varchar(25) NOT NULL,
  `fd` varchar(30) NOT NULL,
  `pay_term` varchar(30) NOT NULL,
  `pi_no` varchar(40) NOT NULL,
  `job` int(2) NOT NULL,
  `ack` varchar(10) NOT NULL,
  `etd_old` varchar(30) NOT NULL,
  `etd` varchar(20) NOT NULL,
  `eta` varchar(20) NOT NULL,
  `ship_line` varchar(40) NOT NULL,
  `ocean_frght` int(10) NOT NULL,
  `invoice` varchar(40) NOT NULL,
  `bl_no` varchar(50) NOT NULL,
  `dhl_awb_no` varchar(40) NOT NULL,
  `payment_due` varchar(20) NOT NULL,
  `payment_recieve` varchar(20) NOT NULL,
  `pay_amt` varchar(20) NOT NULL,
  `ship_month` varchar(45) NOT NULL,
  `vessel_nm` text NOT NULL,
  PRIMARY KEY (`sub_po_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `sub_po`
--

INSERT INTO `sub_po` (`sub_po_id`, `po_id`, `grade`, `qnt`, `unt_pr`, `c_note`, `tot_val`, `fcl`, `t_s_date`, `ship_term`, `pod`, `fd`, `pay_term`, `pi_no`, `job`, `ack`, `etd_old`, `etd`, `eta`, `ship_line`, `ocean_frght`, `invoice`, `bl_no`, `dhl_awb_no`, `payment_due`, `payment_recieve`, `pay_amt`, `ship_month`, `vessel_nm`) VALUES
(34, 1, 'ZANCARB 1T', 50, 45, 0, 2250, '4', '23/12/2015', 'FOB', 'pod', 'word', 'AGAINST DOCUMENT', '', 0, '', '', '', '', '', 0, '', '', '', '', '', '', 'JANUARY', ''),
(35, 3, 'ZANCARB 1T', 12, 23, 0, 276, '3', '28/12/2015', 'FOB', 'nhava sheva', 'nhava sheva', 'DA 25 Days', 'PI/SI650915', 0, 'YES', '9/9/2015', '10/09/2015', '3/12/2015', 'MSA ZENITH', 2, 'IP1512028', 'SP45', '3458722794', '05/10/2015', '11/10/2015', '276', 'JANUARY', 'KOTA LAGU'),
(36, 3, 'ZANCARB 2T', 12, 23, 0, 276, '4', '28/12/2015', 'CIF', 'nhava sheva', 'nhava sheva', 'DP AT Sight', 'PI/PT/0365678', 0, '', '9/9/2015', '10/09/2015', '3/12/2015', '', 0, '', '', '', '3/12/2015', '', '', 'MAY', 'DEST'),
(37, 3, 'ZANCARB 2TS', 34, 12, 0, 408, '5', '28/12/2015', 'CIF', 'nhava sheva', 'nhava sheva', 'TT 100% ADVANCE', '', 0, '', '', '', '', '', 0, '', '', '', '', '', '', 'MARCH', '');

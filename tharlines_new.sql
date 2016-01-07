-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 04, 2016 at 11:54 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`c_id`, `c_unq_code`, `comp_name`, `cmp_txt`, `c_add1`, `c_add2`, `c_per`, `c_iec`, `c_ph`, `c_mo`, `c_email1`, `c_email2`, `c_bnk_dtl`, `c_tin`, `c_cin`, `c_ecc`, `c_special_note`) VALUES
(1, 'PET/ZAN/001', '365 plastium', 'PT', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(2, 'PET/ZAN/002', 'A. Schulman', 'AS', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(3, 'PET/ZAN/003', 'Aananta Polymers ', 'AP', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(4, 'PET/ZAN/004', 'Aditya Nonwoven', 'AN', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(5, 'PET/ZAN/005', 'Alok Industries', 'AI', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(6, 'PET/ZAN/006', 'Alok MasterBatch', 'AM', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(7, 'PET/ZAN/007', 'Alok MasterBatch (Dadra)', 'AM', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(8, 'PET/ZAN/008', 'Alok MasterBatch (Ranipet)', 'AM', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(9, 'PET/ZAN/009', 'Akhtari Trades ', 'AT', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(10, 'PET/ZAN/010', 'AVI Additives (Chennai)', 'AA', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(11, 'PET/ZAN/011', 'AVI Additives (Pritampura)', 'AA', '', '  ', '', '', '', 0, '', '', '              ', '', '', '', ''),
(12, 'PET/ZAN/012', 'B.D.PLASTO FILMS', 'BD', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(13, 'PET/ZAN/013', 'Bag Poly International', 'BP', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(14, 'PET/ZAN/014', 'Bhagyashree Colours Unit-1', 'BC', '', '  ', '', '', '', 0, '', '', '              ', '', '', '', ''),
(15, 'PET/ZAN/015', 'Bhagyashree Colours Unit-2', 'BC', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(16, 'PET/ZAN/016', 'Bhavin Industries', 'BI', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(17, 'PET/ZAN/017', 'Blend Colors unit-1', 'BC', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(18, 'PET/ZAN/018', 'Blend Colors unit-3', 'BC', '', '  ', '', '', '', 0, '', '', '              ', '', '', '', ''),
(19, 'PET/ZAN/019', 'Clariant Chemicals (Nandesari)', 'CC', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(20, 'PET/ZAN/020', 'Clariant Chemicals (Rania)', 'CC', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(21, 'PET/ZAN/021', 'D.P. Plastic', 'DP', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(22, 'PET/ZAN/022', 'Dolphin Polyfill', 'DP', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(23, 'PET/ZAN/023', 'Eagle Polychem', 'EP', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(24, 'PET/ZAN/024', 'Farcom Cables', 'FC', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(25, 'PET/ZAN/025', 'Jaicorp Limited', 'JL', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(26, 'PET/ZAN/026', 'H J Plastics', 'HJ', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(27, 'PET/ZAN/027', 'H N Plastics', 'HN', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(28, 'PET/ZAN/028', 'JJ Plastalloys', 'JJ', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(29, 'PET/ZAN/029', 'Jindal Masterbatches', 'JM', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(30, 'PET/ZAN/030', 'Kkalpana-Kolkata', 'KK', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(31, 'PET/ZAN/031', 'Kkalpana-dadra', 'KD', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(32, 'PET/ZAN/032', 'KKPC', 'KK', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(33, 'PET/ZAN/033', 'Klene Paks Limited', 'KP', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(34, 'PET/ZAN/034', 'KLJ Polymers', 'KP', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(35, 'PET/ZAN/035', 'Konkan Speciality', 'KS', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(36, 'PET/ZAN/036', 'Lumar Technologies', 'LT', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(37, 'PET/ZAN/037', 'Luk Plastcon Ltd', 'LP', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(38, 'PET/ZAN/038', 'Malsons Polymers', 'MP', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(39, 'PET/ZAN/039', 'Masterplast', 'MP', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(40, 'PET/ZAN/040', 'Mukund Extrusions', 'ME', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(41, 'PET/ZAN/041', 'NP Agro', 'NA', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(42, 'PET/ZAN/042', 'Oasis Poly Profile', 'OP', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(43, 'PET/ZAN/043', 'Ocean Polymers', 'OP', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(44, 'PET/ZAN/044', 'Om Namah', 'ON', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(45, 'PET/ZAN/045', 'Pacific Polymers', 'PP', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(46, 'PET/ZAN/046', 'Palavi power Tech', 'PT', '', '  ', '', '', '', 0, '', '', '              ', '', '', '', ''),
(47, 'PET/ZAN/047', 'Petrotech Products', 'PP', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(48, 'PET/ZAN/048', 'Plasmix', 'PL', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(49, 'PET/ZAN/049', 'Plastene India Limted', 'PI', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(50, 'PET/ZAN/050', 'Plastiblends Roorkee', 'PR', '', '  ', '', '', '', 0, '', '', '              ', '', '', '', ''),
(51, 'PET/ZAN/051', 'Plastiblends Daman', 'PD', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(52, 'PET/ZAN/052', 'Plasto Polychem', 'PP', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(53, 'PET/ZAN/053', 'PR Poly pack', 'PP', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(54, 'PET/ZAN/054', 'PR Polymer', 'PP', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(55, 'PET/ZAN/055', 'Prominent Agro', 'PA', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(56, 'PET/ZAN/056', 'R. K. Industries', 'RK', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(57, 'PET/ZAN/057', 'R P Polypacks', 'RP', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(58, 'PET/ZAN/058', 'R T Industries', 'RT', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(59, 'PET/ZAN/059', 'Sac Polymers', 'SP', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(60, 'PET/ZAN/060', 'Sankhla Polymers Bangalore', 'SP', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(61, 'PET/ZAN/061', 'Sankhla Polymers Silvasa', 'SP', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(62, 'PET/ZAN/062', 'Sai Pooja Plastic', 'SP', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(63, 'PET/ZAN/063', 'Servo Packaging', 'SP', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(64, 'PET/ZAN/064', 'SCJ Polybatch', 'SP', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(65, 'PET/ZAN/065', 'SCJ Plastics', 'SP', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(66, 'PET/ZAN/066', 'Sherya India', 'SI', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(67, 'PET/ZAN/067', 'Shree Amba Poly', 'SA', '', '  ', '', '', '', 0, '', '', '              ', '', '', '', ''),
(68, 'PET/ZAN/068', 'Shree Sales Corporation', 'SC', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(69, 'PET/ZAN/069', 'Shree Ambica Geotex', 'SG', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(70, 'PET/ZAN/070', 'Sidh Chemiplast', 'SC', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(71, 'PET/ZAN/071', 'Sonali Polymers Unit-1', 'SP', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(72, 'PET/ZAN/072', 'Sonali Polymers Unit-2', 'SP', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(73, 'PET/ZAN/073', 'Sonali Polyplast', 'SP', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(74, 'PET/ZAN/074', 'Sp Polymers', 'SP', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(75, 'PET/ZAN/075', 'Sparck Industries', 'SI', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(76, 'PET/ZAN/076', 'Spin Packaging', 'SP', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(77, 'PET/ZAN/077', 'Sri Datta', 'SD', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(78, 'PET/ZAN/078', 'Sri Shyam Additives', 'SA', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(79, 'PET/ZAN/079', 'Subraa', 'SB', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(80, 'PET/ZAN/080', 'Supreme Petrochem Ltd', 'SP', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(81, 'PET/ZAN/081', 'United Chioro', 'UC', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(82, 'PET/ZAN/082', 'United Nanotechnologies', 'UN', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', ''),
(83, 'PET/ZAN/083', 'Vibgyor Poly', 'VP', '', ' ', '', '', '', 0, '', '', '       ', '', '', '', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `client_po`
--

INSERT INTO `client_po` (`po_id`, `c_indent_of`, `c_add`, `c_id`, `pet_ref`, `date`, `c_po_no`, `inst`, `c_bnk_d`, `grand_total`) VALUES
(1, '365 plastium', ' ', 'PET/ZAN/001', 'PO/PT/0010116', '04/01/2016', '         ', '', '        ', 31400),
(2, 'Akhtari Trades ', ' ', 'PET/ZAN/009', 'PO/AT/0020116', '04/01/2016', ' ', '', '        ', 20100);

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
  `sub_po_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `po_id` int(20) NOT NULL,
  `grade` varchar(20) NOT NULL,
  `merge` varchar(5) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `sub_po`
--

INSERT INTO `sub_po` (`sub_po_id`, `po_id`, `grade`, `merge`, `qnt`, `unt_pr`, `c_note`, `tot_val`, `fcl`, `t_s_date`, `ship_term`, `pod`, `fd`, `pay_term`, `pi_no`, `job`, `ack`, `etd_old`, `etd`, `eta`, `ship_line`, `ocean_frght`, `invoice`, `bl_no`, `dhl_awb_no`, `payment_due`, `payment_recieve`, `pay_amt`, `ship_month`, `vessel_nm`) VALUES
(1, 1, 'ZANCARB 2T', '', 50, 128, 0, 6400, '2', '24/12/2016', 'CIF', 'Nhava Sheva', 'Nhava Sheva', 'DA 30 Days', 'PI/PT/0481115', 0, 'yes', '5/1/2016', '', '12/1/2016', 'APL', 215, '', '', '', '-', '', '', 'JANUARY', ''),
(2, 1, 'ZANCARB 2T', '', 50, 128, 0, 6400, '2', '31/12/2016', 'CIF', 'Nhava Sheva', 'Nhava Sheva', 'DP AT Sight', 'PI/PT/0491115', 0, 'YES', '7/1/2016', '', '14/1/2016', 'APL', 215, '', '', '', '14/1/2016', '', '', 'JANUARY', ''),
(3, 1, 'ZANCARB 2T', '', 50, 125, 0, 6250, '2', '10/1/2016', 'CIF', 'Nhava Sheva', 'Nhava Sheva', 'DA 30 Days', 'PI/PT/0541215', 0, 'YES', '10/1/2015', '', '18/1/2015', 'APL', 215, '', '', '', '', '', '', 'JANUARY', ''),
(4, 1, 'ZANCARB 2T', '', 50, 125, 0, 6250, '2', '21/1/2016', 'CIF', 'Nhava Sheva', 'Nhava Sheva', 'DP AT Sight', 'PI/PT/0551215', 0, 'YES', '21/1/2016', '', '28/1/2016', 'APL', 215, '', '', '', '28/1/2016', '', '', 'JANUARY', ''),
(5, 1, 'ZANCARB 2T', '', 50, 125, 0, 6250, '2', '25/1/2016', 'CIF', 'Nhava Sheva', 'Nhava Sheva', 'DA 30 Days', 'PI/PT/0561215', 0, 'YES', '24/1/2016', '', '2/2/2016', 'APL', 215, '', '', '', '', '', '', 'JANUARY', ''),
(6, 2, 'ZANCARB 2T', '', 50, 134, 0, 6700, '2', '04/01/2016', 'CIF', 'COLOMBO', 'COLOMBO', 'DP AT Sight', 'PI/AT/0011215', 0, 'YES', '25/1/2016', '', '29/1/2016', 'MSA LINES', 400, '', '', '', '29/1/2016', '', '', 'JANUARY', ''),
(7, 2, 'ZANCARB 2T', '', 50, 134, 0, 6700, '2', '18/01/2016', 'CIF', 'COLOMBO', 'COLOMBO', 'DP AT Sight', 'PI/AT/0021215', 0, 'YES', '18/1/2016', '', '22/1/2016', 'MSA LINES', 400, '', '', '', '22/1/2016', '', '', 'JANUARY', ''),
(8, 2, 'ZANCARB 2T', '', 50, 134, 0, 6700, '2', '25/01/2016', 'CIF', 'COLOMBO', 'COLOMBO', 'DP AT Sight', 'PI/AT/0031215', 0, 'YES', '4/2/2016', '', '', 'MSA LINES', 400, '', '', '', '', '', '', 'JANUARY', '');

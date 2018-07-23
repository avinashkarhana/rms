-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2018 at 05:53 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rms`
--

-- --------------------------------------------------------

--
-- Table structure for table `advert`
--

CREATE TABLE `advert` (
  `advertno` varchar(20) NOT NULL,
  `adname` varchar(30) NOT NULL,
  `adodate` date NOT NULL,
  `advertdate` date NOT NULL,
  `adcdate` date NOT NULL,
  `fee` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advert`
--

INSERT INTO `advert` (`advertno`, `adname`, `adodate`, `advertdate`, `adcdate`, `fee`) VALUES
('1', 'test1', '2018-03-01', '2018-03-02', '2018-06-01', 100),
('2', 'test2', '2018-03-02', '2018-03-03', '2018-06-04', 200),
('3', 'test4', '2018-03-01', '2018-03-02', '2018-06-06', 100),
('4', 'test3', '2018-03-02', '2018-03-03', '2018-06-04', 200);

-- --------------------------------------------------------

--
-- Table structure for table `advert_details`
--

CREATE TABLE `advert_details` (
  `advertno` varchar(20) NOT NULL,
  `pcode` int(11) NOT NULL,
  `dcode` int(4) NOT NULL,
  `catcode` int(4) NOT NULL,
  `vacancy` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advert_details`
--

INSERT INTO `advert_details` (`advertno`, `pcode`, `dcode`, `catcode`, `vacancy`) VALUES
('1', 23, 34, 1, 1),
('1', 23, 35, 1, 1),
('1', 24, 34, 2, 1),
('1', 24, 35, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `appno` bigint(10) NOT NULL,
  `uidai` bigint(12) NOT NULL,
  `advertno` varchar(20) NOT NULL,
  `pcode` int(4) NOT NULL,
  `dcode` int(4) NOT NULL,
  `appdate` date NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0-notsub 1-sub 2-underprocess 3-notshortlisted 4-shortlisted 5-notselected 6-selected',
  `score` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`appno`, `uidai`, `advertno`, `pcode`, `dcode`, `appdate`, `status`, `score`) VALUES
(3, 123456789012, '1', 23, 34, '2018-05-01', 0, 0),
(2, 332692004203, '1', 23, 34, '2018-04-30', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bookpub`
--

CREATE TABLE `bookpub` (
  `uidai` bigint(12) NOT NULL,
  `bookname` varchar(70) NOT NULL,
  `booktype` tinyint(1) NOT NULL COMMENT '1-books 0-bookchapter ',
  `isbn` varchar(20) NOT NULL,
  `pubname` varchar(30) NOT NULL,
  `pubtype` tinyint(1) NOT NULL COMMENT '0-internationl 1-national',
  `byear` int(4) NOT NULL,
  `authortype` int(1) NOT NULL COMMENT '1-author 0-co author',
  `docno` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookpub`
--

INSERT INTO `bookpub` (`uidai`, `bookname`, `booktype`, `isbn`, `pubname`, `pubtype`, `byear`, `authortype`, `docno`) VALUES
(332692004203, 'asdfghj', 0, '12345t6', 'sdfgfcvcdcvcfg', 0, 1988, 1, ''),
(332692004203, 'dszfgxchvbmj,', 1, 'wsedrgthfyjguk', 'ryewthjfmjyku', 0, 1988, 0, ''),
(332692004203, 'xzvdbxfncgvh', 0, '42356789', 'grthf', 0, 2000, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `uidai` bigint(12) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pin` int(6) NOT NULL,
  `dob` date NOT NULL,
  `catcode` tinyint(1) NOT NULL,
  `sex` text NOT NULL,
  `nationality` varchar(10) NOT NULL,
  `relegion` varchar(12) NOT NULL,
  `marital` int(1) NOT NULL COMMENT '0- Not Married  1-Married',
  `pwd` int(1) NOT NULL COMMENT '0- no 1-yes',
  `status` tinyint(1) NOT NULL,
  `dcount` int(3) NOT NULL DEFAULT '999'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`uidai`, `pass`, `email`, `mobile`, `name`, `fname`, `mname`, `address`, `state`, `pin`, `dob`, `catcode`, `sex`, `nationality`, `relegion`, `marital`, `pwd`, `status`, `dcount`) VALUES
(123456789012, '1', 'a@a', 9876543210, 'testname', '', '', '', '', 0, '0000-00-00', 1, 'M', '', '', 0, 0, 0, 990),
(332692004203, 'pu', 'avinashkarhana1@gmail.com', 9416029640, 'Avinash Karhana', 'Omkar Singh', 'Sunita Rani', 'VPO Bhodwal Majri , Teh. Samalkha , Panipat', 'Haryana', 132102, '1998-01-29', 1, 'M', 'Indian', 'Hindu', 0, 0, 0, 978);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catcode` tinyint(4) NOT NULL,
  `catname` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catcode`, `catname`) VALUES
(1, 'GEN'),
(2, 'OBC');

-- --------------------------------------------------------

--
-- Table structure for table `conferences`
--

CREATE TABLE `conferences` (
  `uidai` bigint(12) NOT NULL,
  `confname` varchar(30) NOT NULL,
  `conftype` tinyint(1) NOT NULL COMMENT '0-internationl 1-national 2-regional',
  `confplace` varchar(50) NOT NULL,
  `confdate` date NOT NULL,
  `docno` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conferences`
--

INSERT INTO `conferences` (`uidai`, `confname`, `conftype`, `confplace`, `confdate`, `docno`) VALUES
(332692004203, ',ghrmhtf', 1, '4etddgfq', '0003-04-04', ''),
(332692004203, 'dsfcbvjmgh', 0, 'htrdghgf', '0003-03-31', '');

-- --------------------------------------------------------

--
-- Table structure for table `creferences`
--

CREATE TABLE `creferences` (
  `uidai` varchar(12) NOT NULL,
  `refname` varchar(30) NOT NULL,
  `refmobile` bigint(10) NOT NULL,
  `refmail` varchar(50) NOT NULL,
  `refaddress` varchar(200) NOT NULL,
  `docno` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `creferences`
--

INSERT INTO `creferences` (`uidai`, `refname`, `refmobile`, `refmail`, `refaddress`, `docno`) VALUES
('332692004203', 'nbvccyjhdgx', 2345677, 'a@s', 'stestbngfmj jvmjhxhzef', '');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dcode` int(4) NOT NULL,
  `dname` varchar(50) NOT NULL,
  `scode` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dcode`, `dname`, `scode`) VALUES
(34, 'dept1', 1),
(35, 'dept2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `edudetails`
--

CREATE TABLE `edudetails` (
  `uidai` bigint(12) NOT NULL,
  `class` varchar(11) NOT NULL,
  `roll_no` varchar(15) NOT NULL,
  `subjects` varchar(100) NOT NULL,
  `institute` varchar(70) NOT NULL,
  `pyear` int(11) NOT NULL,
  `omarks` int(11) NOT NULL,
  `tmarks` int(11) NOT NULL,
  `percent` int(11) NOT NULL,
  `docno` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `edudetails`
--

INSERT INTO `edudetails` (`uidai`, `class`, `roll_no`, `subjects`, `institute`, `pyear`, `omarks`, `tmarks`, `percent`, `docno`) VALUES
(123456789012, '10', '123456', 'All', 'ABCD', 2018, 485, 500, 97, '123456789012995'),
(332692004203, '10', '28347216r687', 'dghaskgjf', 'mdfkb', 1988, 763773, 77237, 989, ''),
(332692004203, '12', '12345t6', 'asdfghj', 'Zxcvb', 2000, 255, 900, 28, ''),
(332692004203, 'PG', '123456', 'sdfgh', 'zzxcvb', 2017, 23, 23, 100, '');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `uidai` bigint(12) NOT NULL,
  `expname` varchar(30) NOT NULL,
  `expinst` varchar(100) NOT NULL COMMENT 'experience institute',
  `exptype` tinyint(1) NOT NULL COMMENT '1- Regular 2-Temp 3-Adhoc 4-Contract',
  `expfrom` date NOT NULL,
  `expto` date NOT NULL,
  `expsal` int(6) NOT NULL,
  `exptotal` int(3) NOT NULL,
  `docno` varchar(16) NOT NULL COMMENT '12-uidai+1type+3nos'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`uidai`, `expname`, `expinst`, `exptype`, `expfrom`, `expto`, `expsal`, `exptotal`, `docno`) VALUES
(332692004203, 'thregdthregd', 'fhsedgcghfnhjh', 1, '2001-02-02', '2000-02-02', 2147483647, 76, '');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `pcode` int(4) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `ptype` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`pcode`, `pname`, `ptype`) VALUES
(23, 'post1', 'ptype1'),
(24, 'post2', 'ptype1'),
(25, 'post3', 'ptype2');

-- --------------------------------------------------------

--
-- Table structure for table `rguidance`
--

CREATE TABLE `rguidance` (
  `uidai` bigint(12) NOT NULL,
  `scholarname` varchar(30) NOT NULL,
  `rgtype` tinyint(4) NOT NULL COMMENT '0-pg 1-phd',
  `rgthesisname` varchar(50) NOT NULL,
  `rgstatus` tinyint(1) NOT NULL COMMENT '0-submitted 1-awarded',
  `pyear` int(4) NOT NULL,
  `docno` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rguidance`
--

INSERT INTO `rguidance` (`uidai`, `scholarname`, `rgtype`, `rgthesisname`, `rgstatus`, `pyear`, `docno`) VALUES
(332692004203, 'gfndghnd', 1, 'ydfh', 1, 0, ''),
(332692004203, 'ghdxtgd', 1, 'grstgs', 1, 23434, '');

-- --------------------------------------------------------

--
-- Table structure for table `rpapers`
--

CREATE TABLE `rpapers` (
  `uidai` bigint(12) NOT NULL,
  `ptitle` varchar(30) NOT NULL,
  `pjournel` varchar(50) NOT NULL,
  `issn` varchar(20) NOT NULL,
  `journeltype` int(2) NOT NULL COMMENT '11-internationalrefered 12-internationalnonrefered 21- nationalrefered 22-nationalnonrefered',
  `authortype` tinyint(1) NOT NULL COMMENT '1-author 0-co-author',
  `pyear` int(4) NOT NULL,
  `docno` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rpapers`
--

INSERT INTO `rpapers` (`uidai`, `ptitle`, `pjournel`, `issn`, `journeltype`, `authortype`, `pyear`, `docno`) VALUES
(332692004203, 'fwgedhj', 'ertjykuygu', '234567', 21, 0, 34567, ''),
(332692004203, 'hfesfdxthdg', 'y6teyrdf', '123456', 11, 1, 5432, '');

-- --------------------------------------------------------

--
-- Table structure for table `rprojects`
--

CREATE TABLE `rprojects` (
  `uidai` bigint(12) NOT NULL,
  `projectname` varchar(70) NOT NULL,
  `projtype` tinyint(1) NOT NULL COMMENT '1-major 0-minor',
  `projamount` int(9) NOT NULL,
  `projfundingajency` varchar(50) NOT NULL,
  `projdur` int(4) NOT NULL,
  `pyear` int(4) NOT NULL,
  `docno` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rprojects`
--

INSERT INTO `rprojects` (`uidai`, `projectname`, `projtype`, `projamount`, `projfundingajency`, `projdur`, `pyear`, `docno`) VALUES
(332692004203, 'sdfghj', 1, 345678, 'sxdcvbn', 23, 2001, ''),
(332692004203, 'sdfghjk', 1, 2147483647, 'yugfjg', 45, 2000, '');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `scode` int(4) NOT NULL,
  `sname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`scode`, `sname`) VALUES
(1, 'School1'),
(2, 'School');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user` varchar(8) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `last_login` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user`, `pass`, `last_login`) VALUES
('admin', 'admin', '21:37 20 April 2018');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advert`
--
ALTER TABLE `advert`
  ADD PRIMARY KEY (`advertno`);

--
-- Indexes for table `advert_details`
--
ALTER TABLE `advert_details`
  ADD PRIMARY KEY (`advertno`,`pcode`,`dcode`,`catcode`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`uidai`,`advertno`,`pcode`,`dcode`),
  ADD UNIQUE KEY `appno` (`appno`);

--
-- Indexes for table `bookpub`
--
ALTER TABLE `bookpub`
  ADD PRIMARY KEY (`uidai`,`bookname`,`isbn`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`uidai`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD UNIQUE KEY `dcount` (`dcount`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catcode`);

--
-- Indexes for table `conferences`
--
ALTER TABLE `conferences`
  ADD PRIMARY KEY (`uidai`,`confname`,`confdate`);

--
-- Indexes for table `creferences`
--
ALTER TABLE `creferences`
  ADD PRIMARY KEY (`uidai`,`refname`,`refmobile`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dcode`);

--
-- Indexes for table `edudetails`
--
ALTER TABLE `edudetails`
  ADD PRIMARY KEY (`uidai`,`class`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`uidai`,`expfrom`),
  ADD UNIQUE KEY `docno` (`docno`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`pcode`);

--
-- Indexes for table `rguidance`
--
ALTER TABLE `rguidance`
  ADD PRIMARY KEY (`uidai`,`scholarname`,`rgthesisname`);

--
-- Indexes for table `rpapers`
--
ALTER TABLE `rpapers`
  ADD PRIMARY KEY (`uidai`,`ptitle`,`issn`);

--
-- Indexes for table `rprojects`
--
ALTER TABLE `rprojects`
  ADD PRIMARY KEY (`uidai`,`projectname`,`projamount`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`scode`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `appno` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

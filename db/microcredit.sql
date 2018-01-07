-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2018 at 11:00 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `microcredit`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `userType` varchar(256) NOT NULL,
  `dateTime` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `password`, `userType`, `dateTime`) VALUES
(1, 'Rubel', 'a@a.com', '123', '1', '2017-08-23'),
(2, 'RotonVai', 'vai@gmail.com', 'roton123', '2', '2017-08-23'),
(3, 'Tanvir', 'tanvir@gmail.com', 'tanvir', '3', '2017-08-23');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `memberId` int(11) NOT NULL,
  `memberAcID` varchar(256) NOT NULL,
  `memberShareID` varchar(256) NOT NULL,
  `memberAccountingID` varchar(256) NOT NULL,
  `memberName` varchar(256) NOT NULL,
  `memberGuardianName` varchar(256) NOT NULL,
  `memberGuardianPro` varchar(256) NOT NULL,
  `memberGuardianAge` varchar(256) NOT NULL,
  `memberPEaddrrs` varchar(256) NOT NULL,
  `memberPRaddrrs` varchar(256) NOT NULL,
  `memberNID` varchar(256) NOT NULL,
  `memberNationality` varchar(256) NOT NULL,
  `memberDOB` varchar(256) NOT NULL,
  `createDate` varchar(256) NOT NULL,
  `modifiedDate` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`memberId`, `memberAcID`, `memberShareID`, `memberAccountingID`, `memberName`, `memberGuardianName`, `memberGuardianPro`, `memberGuardianAge`, `memberPEaddrrs`, `memberPRaddrrs`, `memberNID`, `memberNationality`, `memberDOB`, `createDate`, `modifiedDate`) VALUES
(1, '22', '987', '987', 'Name', 'NameG', 'Pro', '22', 'Dhaka', 'Dhaka', '23423', 'Bangladeshi', '22-01-2018', '1515261600', '1515261600');

-- --------------------------------------------------------

--
-- Table structure for table `members_account_info`
--

CREATE TABLE `members_account_info` (
  `members_account_infoID` int(11) NOT NULL,
  `memberId` varchar(256) NOT NULL,
  `accOpenBranchID` varchar(256) NOT NULL,
  `accOpenWardID` varchar(256) NOT NULL,
  `accTypeID` varchar(256) NOT NULL,
  `accIssueDate` varchar(256) NOT NULL,
  `accAmount` varchar(256) NOT NULL,
  `accExpireDate` varchar(256) NOT NULL,
  `accProfitRate` varchar(256) NOT NULL,
  `accInformation` text NOT NULL,
  `createDate` varchar(256) NOT NULL,
  `modifiedDate` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members_account_info`
--

INSERT INTO `members_account_info` (`members_account_infoID`, `memberId`, `accOpenBranchID`, `accOpenWardID`, `accTypeID`, `accIssueDate`, `accAmount`, `accExpireDate`, `accProfitRate`, `accInformation`, `createDate`, `modifiedDate`) VALUES
(1, '1', 'DPS', 'FDR', 'General Savings', '18-01-2018', '100', '26-01-2018', '25', 'sdfsdfasdfasfasdfasdfasdfasd', '1515261600', '1515261600');

-- --------------------------------------------------------

--
-- Table structure for table `members_applicant`
--

CREATE TABLE `members_applicant` (
  `members_applicantID` int(11) NOT NULL,
  `memberId` varchar(256) NOT NULL,
  `applicantName` varchar(256) NOT NULL,
  `applicantGuardian` varchar(256) NOT NULL,
  `createDate` varchar(256) NOT NULL,
  `modifiedDate` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members_applicant`
--

INSERT INTO `members_applicant` (`members_applicantID`, `memberId`, `applicantName`, `applicantGuardian`, `createDate`, `modifiedDate`) VALUES
(1, '1', 'Applicant1Name', 'Applicant1G', '1515261600', '1515261600'),
(2, '1', 'Applicant2Name', 'Applicant2G', '1515261600', '1515261600');

-- --------------------------------------------------------

--
-- Table structure for table `members_introducer`
--

CREATE TABLE `members_introducer` (
  `members_introducerID` int(11) NOT NULL,
  `memberId` varchar(256) NOT NULL,
  `introName` varchar(256) NOT NULL,
  `introMemberID` varchar(256) NOT NULL,
  `createDate` varchar(256) NOT NULL,
  `modifiedDate` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members_introducer`
--

INSERT INTO `members_introducer` (`members_introducerID`, `memberId`, `introName`, `introMemberID`, `createDate`, `modifiedDate`) VALUES
(1, '1', 'Intro1Name', '123', '1515261600', '1515261600'),
(2, '1', 'Intor2Name', '343', '1515261600', '1515261600');

-- --------------------------------------------------------

--
-- Table structure for table `members_nominee`
--

CREATE TABLE `members_nominee` (
  `members_nomineeID` int(11) NOT NULL,
  `memberId` varchar(256) NOT NULL,
  `nomineeName` varchar(256) NOT NULL,
  `nomineeAge` varchar(256) NOT NULL,
  `nomineeGuardianName` varchar(256) NOT NULL,
  `nomineeGuardianRel` varchar(256) NOT NULL,
  `nomineePEaddrrs` varchar(256) NOT NULL,
  `nomineePRaddrrs` varchar(256) NOT NULL,
  `createDate` varchar(256) NOT NULL,
  `modifiedDate` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members_nominee`
--

INSERT INTO `members_nominee` (`members_nomineeID`, `memberId`, `nomineeName`, `nomineeAge`, `nomineeGuardianName`, `nomineeGuardianRel`, `nomineePEaddrrs`, `nomineePRaddrrs`, `createDate`, `modifiedDate`) VALUES
(1, '1', 'Nominee1', '22', 'NomineeG', 'Rele', 'Dhaka', 'Dhaka', '1515261600', '1515261600'),
(2, '1', 'Nominee1', '22', 'NomineeG', 'Rele', 'Dhaka', 'Dhaka', '1515261600', '1515261600');

-- --------------------------------------------------------

--
-- Table structure for table `members_share`
--

CREATE TABLE `members_share` (
  `members_shareID` int(11) NOT NULL,
  `memberId` varchar(256) NOT NULL,
  `shareFee` varchar(256) NOT NULL,
  `shareAmount` varchar(256) NOT NULL,
  `shareTotal` varchar(256) NOT NULL,
  `shareGrandTotal` varchar(256) NOT NULL,
  `createDate` varchar(256) NOT NULL,
  `modifiedDate` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members_share`
--

INSERT INTO `members_share` (`members_shareID`, `memberId`, `shareFee`, `shareAmount`, `shareTotal`, `shareGrandTotal`, `createDate`, `modifiedDate`) VALUES
(1, '1', '100', '5', '500', '500', '1515261600', '1515261600');

-- --------------------------------------------------------

--
-- Table structure for table `savings`
--

CREATE TABLE `savings` (
  `savingsId` int(11) NOT NULL,
  `memberId` varchar(256) NOT NULL,
  `savingAmount` varchar(256) NOT NULL,
  `savingLaserNo` varchar(256) NOT NULL,
  `savingFildOfficerID` varchar(256) NOT NULL,
  `savingDate` varchar(256) NOT NULL,
  `createDate` varchar(256) NOT NULL,
  `modifiedDate` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `savings`
--

INSERT INTO `savings` (`savingsId`, `memberId`, `savingAmount`, `savingLaserNo`, `savingFildOfficerID`, `savingDate`, `createDate`, `modifiedDate`) VALUES
(1, '1', '100', '1', 'name', '21-01-2018', '1515348000', '1515348000'),
(2, '1', '200', '1', 'name', '18-01-2018', '1515348000', '1515348000'),
(3, '1', '100', '1', 'name', '15-01-2018', '1515348000', '1515348000'),
(4, '1', '300', '1', 'name', '15-01-2018', '1515348000', '1515348000'),
(5, '1', '550', '1', 'name', '18-01-2018', '1515348000', '1515348000'),
(6, '1', '600', '1', 'name', '21-01-2018', '1515348000', '1515348000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`memberId`);

--
-- Indexes for table `members_account_info`
--
ALTER TABLE `members_account_info`
  ADD PRIMARY KEY (`members_account_infoID`);

--
-- Indexes for table `members_applicant`
--
ALTER TABLE `members_applicant`
  ADD PRIMARY KEY (`members_applicantID`);

--
-- Indexes for table `members_introducer`
--
ALTER TABLE `members_introducer`
  ADD PRIMARY KEY (`members_introducerID`);

--
-- Indexes for table `members_nominee`
--
ALTER TABLE `members_nominee`
  ADD PRIMARY KEY (`members_nomineeID`);

--
-- Indexes for table `members_share`
--
ALTER TABLE `members_share`
  ADD PRIMARY KEY (`members_shareID`);

--
-- Indexes for table `savings`
--
ALTER TABLE `savings`
  ADD PRIMARY KEY (`savingsId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `memberId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `members_account_info`
--
ALTER TABLE `members_account_info`
  MODIFY `members_account_infoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `members_applicant`
--
ALTER TABLE `members_applicant`
  MODIFY `members_applicantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `members_introducer`
--
ALTER TABLE `members_introducer`
  MODIFY `members_introducerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `members_nominee`
--
ALTER TABLE `members_nominee`
  MODIFY `members_nomineeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `members_share`
--
ALTER TABLE `members_share`
  MODIFY `members_shareID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `savings`
--
ALTER TABLE `savings`
  MODIFY `savingsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

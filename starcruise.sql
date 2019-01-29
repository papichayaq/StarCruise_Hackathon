-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2018 at 05:38 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `starcruise`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidding`
--

CREATE TABLE `bidding` (
  `Freelance_ID` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `Bid` int(11) NOT NULL,
  `Comment` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidding`
--

INSERT INTO `bidding` (`Freelance_ID`, `Product_ID`, `Bid`, `Comment`) VALUES
(1, 1, 50000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(2, 2, 30000, NULL),
(1, 7, 30000, NULL),
(2, 7, 35000, NULL),
(3, 3, 25000, NULL),
(4, 8, 20000, NULL),
(4, 9, 25000, NULL),
(5, 3, 15000, NULL),
(6, 4, 50000, NULL),
(7, 7, 30000, NULL),
(7, 8, 50000, NULL),
(7, 9, 25000, NULL),
(6, 9, 25000, NULL),
(5, 7, 20000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `business_owner`
--

CREATE TABLE `business_owner` (
  `Owner_ID` int(11) NOT NULL,
  `Owner_Name` varchar(50) NOT NULL,
  `Owner_Industry` varchar(50) DEFAULT NULL,
  `Owner_Address` varchar(500) DEFAULT NULL,
  `Owner_RegisteredCapital` int(11) NOT NULL,
  `Owner_ActiveSince` date DEFAULT NULL,
  `Owner_ContactPersonFirstName` varchar(50) DEFAULT NULL,
  `Owner_ContactPersonLastName` varchar(50) DEFAULT NULL,
  `Owner_ContactNumber` varchar(50) DEFAULT NULL,
  `Owner_EmailAddress` varchar(50) DEFAULT NULL,
  `Owner_Username` varchar(50) NOT NULL,
  `Owner_Password` varchar(50) NOT NULL,
  `Owner_Approval` tinyint(1) NOT NULL DEFAULT '0',
  `Owner_DateRegistered` date DEFAULT '2018-03-25'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business_owner`
--

INSERT INTO `business_owner` (`Owner_ID`, `Owner_Name`, `Owner_Industry`, `Owner_Address`, `Owner_RegisteredCapital`, `Owner_ActiveSince`, `Owner_ContactPersonFirstName`, `Owner_ContactPersonLastName`, `Owner_ContactNumber`, `Owner_EmailAddress`, `Owner_Username`, `Owner_Password`, `Owner_Approval`, `Owner_DateRegistered`) VALUES
(1, 'GreenCatArmy', NULL, NULL, 500000, '2018-03-12', 'Sirinut', 'Greencat', NULL, 'sirinut@greencat.com', 'greencat', '123', 1, '2018-03-22'),
(2, 'Sunshine', NULL, NULL, 300000, '2018-03-22', 'Manasanan', 'Sunshine', NULL, 'manasanan@sunshine.com', 'sunshine', '123', 0, '2018-03-12'),
(3, 'SpaceX', 'Space', 'Mars', 2000000000, '2013-09-10', 'Elon', 'Musk', '0999999999', 'Elon@Musk.com', 'elon', 'musk', 1, '2018-03-25'),
(5, 'Conveyor', 'Game', 'Salaya, Thailand', 100000, '2017-04-13', 'Jimmy', 'BigBelly', '01111010101', 'jimjim@covey.com', 'convey', '1234', 1, '2018-03-25'),
(6, 'KidzyCraft', 'Game', 'Salaya, Thailand', 100000, '2017-06-14', 'Thanan', 'Punsikorn', '011001101010', 'thananbnk48@kidzy.com', 'kidzycraft', '1234', 0, '2018-03-25');

-- --------------------------------------------------------

--
-- Table structure for table `freelancer`
--

CREATE TABLE `freelancer` (
  `Freelance_ID` int(11) NOT NULL,
  `Freelance_FName` varchar(50) NOT NULL,
  `Freelance_LName` varchar(50) NOT NULL,
  `Freelance_JobExperience` int(11) NOT NULL,
  `Freelance_ContactNumber` varchar(50) DEFAULT NULL,
  `Freelance_Email` varchar(50) DEFAULT NULL,
  `Freelance_Premium` tinyint(1) DEFAULT '0',
  `Freelance_Username` varchar(50) NOT NULL,
  `Freelance_Password` varchar(50) NOT NULL,
  `Freelance_DateRegistered` date DEFAULT '2018-03-25',
  `Freelance_Rating` int(11) NOT NULL DEFAULT '3',
  `Freelance_NumViews` int(11) NOT NULL DEFAULT '0',
  `Freelance_Approval` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `freelancer`
--

INSERT INTO `freelancer` (`Freelance_ID`, `Freelance_FName`, `Freelance_LName`, `Freelance_JobExperience`, `Freelance_ContactNumber`, `Freelance_Email`, `Freelance_Premium`, `Freelance_Username`, `Freelance_Password`, `Freelance_DateRegistered`, `Freelance_Rating`, `Freelance_NumViews`, `Freelance_Approval`) VALUES
(1, 'Waran', 'Taveekarn', 4, '0812938475', 'drive.war@gmail.com', 1, 'drive', '1234', '2018-03-13', 3, 0, 1),
(2, 'Sunny', 'Manasanan', 5, '0889593847', 'sunshine@hotmail.com', 0, 'sunny', '123', '2018-03-11', 3, 0, 1),
(3, 'Mark', 'Zuckerberg', 10, '0876545678', 'markza@facebook.com', 1, 'mark', 'za', '2018-03-25', 3, 0, 1),
(4, 'Papichaya', 'Quengdaeng', 1, '0813452394', 'bampapi69@gmail.com', 0, 'bam', 'papi', '2018-03-25', 3, 0, 1),
(5, 'Karaket', 'Sudsuay', 5, '0869386872', 'karaketz@hotmail.com', 0, 'karaket', 'inw', '2018-03-25', 3, 0, 0),
(6, 'Fish', 'Stop', 3, '069-444-1112', 'fishstop@eattax.com', 1, 'fish', 'stop', '2018-03-25', 5, 0, 0),
(7, 'Somchai', 'Hello', 10, '0815948234', 'somchai123@gmail.com', 0, 'somchai', '123', '2018-03-25', 3, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_skill`
--

CREATE TABLE `freelancer_skill` (
  `Freelance_ID` int(11) NOT NULL,
  `Skill_ID` int(11) NOT NULL,
  `YearExperience` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `freelancer_skill`
--

INSERT INTO `freelancer_skill` (`Freelance_ID`, `Skill_ID`, `YearExperience`) VALUES
(1, 1, '2'),
(1, 2, '3'),
(2, 1, '3'),
(2, 4, '4'),
(3, 1, '5'),
(3, 2, '3'),
(3, 3, '4'),
(3, 4, '8'),
(4, 1, '1'),
(4, 2, '1'),
(5, 3, '4'),
(5, 4, '2'),
(5, 1, '0'),
(7, 1, '6');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Prod_ID` int(11) NOT NULL,
  `Prod_Name` text CHARACTER SET ascii NOT NULL,
  `Prod_Type` text CHARACTER SET ascii NOT NULL,
  `Prod_Price` int(11) NOT NULL,
  `Prod_Duration` int(11) NOT NULL,
  `Prod_Description` varchar(500) NOT NULL,
  `Owner_ID` int(11) NOT NULL,
  `Prod_Status` int(11) NOT NULL DEFAULT '0',
  `Prod_DateOrdered` date DEFAULT '2018-03-25',
  `Prod_Approval` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Prod_ID`, `Prod_Name`, `Prod_Type`, `Prod_Price`, `Prod_Duration`, `Prod_Description`, `Owner_ID`, `Prod_Status`, `Prod_DateOrdered`, `Prod_Approval`) VALUES
(1, 'OffShelfProd1', 'OTS', 20000, 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 1, 0, '2018-03-15', 1),
(2, 'MadeToOrderProd1', 'MTO', 45000, 9, 'Lorem ipsum dolor sit amet.', 2, 0, '2018-03-13', 0),
(3, 'Software2', 'OTS', 15000, 12, 'dakjsf', 1, 0, '2018-03-22', 1),
(7, 'Employee System', 'MTO', 200000, 4, 'Employee System Implementation', 3, 0, '2018-03-25', 1),
(8, 'Amazing System', 'OTS', 15000, 20, 'Amazing system 2018!', 6, 0, '2018-03-25', 0),
(9, 'MIS Software', 'OTS', 30000, 5, 'We need MIS ppl to implement for us', 5, 0, '2018-03-25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_skill`
--

CREATE TABLE `product_skill` (
  `Prod_ID` int(11) NOT NULL,
  `Skill_ID` int(11) NOT NULL,
  `job_exp_needed` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_skill`
--

INSERT INTO `product_skill` (`Prod_ID`, `Skill_ID`, `job_exp_needed`) VALUES
(1, 1, 1),
(2, 4, 2),
(3, 1, 1),
(3, 3, 0),
(7, 1, 3),
(7, 2, 0),
(7, 4, 3),
(8, 1, 5),
(8, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_software`
--

CREATE TABLE `product_software` (
  `Product_ID` int(11) NOT NULL,
  `Software_ID` int(11) NOT NULL,
  `Number_of_license` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_software`
--

INSERT INTO `product_software` (`Product_ID`, `Software_ID`, `Number_of_license`) VALUES
(1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `Rating_ID` int(11) NOT NULL,
  `Freelance_ID` int(11) NOT NULL,
  `Rating` int(11) NOT NULL,
  `Comments` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`Rating_ID`, `Freelance_ID`, `Rating`, `Comments`) VALUES
(1, 1, 3, NULL),
(2, 2, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `RestaurantID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `MinPrice` int(11) NOT NULL,
  `MaxPrice` int(11) DEFAULT NULL,
  `Location` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `OpenTime` double NOT NULL,
  `CloseTime` double NOT NULL,
  `Promotion` varchar(255) DEFAULT NULL,
  `Description` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `Skill_ID` int(11) NOT NULL,
  `Skill_Name` varchar(50) NOT NULL,
  `Skill_Description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`Skill_ID`, `Skill_Name`, `Skill_Description`) VALUES
(1, 'Java', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(2, 'MIS', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(3, 'Python', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(4, 'Web', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `software`
--

CREATE TABLE `software` (
  `Software_ID` int(11) NOT NULL,
  `Software_name` varchar(50) NOT NULL,
  `Software_description` varchar(500) NOT NULL,
  `Software_price` int(11) NOT NULL,
  `Software_Brand` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `software`
--

INSERT INTO `software` (`Software_ID`, `Software_name`, `Software_description`, `Software_price`, `Software_Brand`) VALUES
(1, 'Software1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 10000, 'ABC'),
(3, 'Point of Sale Software', 'Software for PoS', 16000, 'ProgramDealer'),
(4, 'MIS Software', 'MIS things', 30000, 'ProgramDealer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidding`
--
ALTER TABLE `bidding`
  ADD PRIMARY KEY (`Freelance_ID`,`Product_ID`) USING BTREE;

--
-- Indexes for table `business_owner`
--
ALTER TABLE `business_owner`
  ADD PRIMARY KEY (`Owner_ID`);

--
-- Indexes for table `freelancer`
--
ALTER TABLE `freelancer`
  ADD PRIMARY KEY (`Freelance_ID`);

--
-- Indexes for table `freelancer_skill`
--
ALTER TABLE `freelancer_skill`
  ADD PRIMARY KEY (`Freelance_ID`,`Skill_ID`) USING BTREE;

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Prod_ID`);

--
-- Indexes for table `product_skill`
--
ALTER TABLE `product_skill`
  ADD PRIMARY KEY (`Prod_ID`,`Skill_ID`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`Rating_ID`) USING BTREE;

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`RestaurantID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`Skill_ID`);

--
-- Indexes for table `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`Software_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business_owner`
--
ALTER TABLE `business_owner`
  MODIFY `Owner_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `freelancer`
--
ALTER TABLE `freelancer`
  MODIFY `Freelance_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Prod_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `Rating_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `RestaurantID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `Skill_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `software`
--
ALTER TABLE `software`
  MODIFY `Software_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

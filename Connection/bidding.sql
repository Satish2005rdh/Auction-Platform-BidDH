-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2026 at 06:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bidding`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `AdminName` varchar(255) NOT NULL,
  `AdminPassword` varchar(255) NOT NULL,
  `AdminEmail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `AdminName`, `AdminPassword`, `AdminEmail`) VALUES
(1, 'satish', 'satish', 'radh81018@gmail.com'),
(2, 'rocky', 'rocky', 'skd409927@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `anotification`
--

CREATE TABLE `anotification` (
  `NotificationID` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Seen` tinyint(1) DEFAULT 0,
  `Message` text NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anotification`
--

INSERT INTO `anotification` (`NotificationID`, `UserName`, `Seen`, `Message`, `CreatedAt`, `email`) VALUES
(7, 'Rocky Dh', 0, 'hi', '0000-00-00 00:00:00', 'skd409927@gmail.com'),
(8, 'Rocky', 0, 'hello', '0000-00-00 00:00:00', 'skd409927@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `NotificationID` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `messege` text NOT NULL,
  `Seen` tinyint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`NotificationID`, `UserName`, `CreatedAt`, `messege`, `Seen`) VALUES
(12, '7', '2026-01-10 14:53:59', 'This is Reply From Admin, hello', 0),
(13, 'Null', '2026-01-10 18:14:20', 'Null Someone Bid higher than your Bid price on product Google Pixel 9A (Porcelain, 256 GB) (8 GB RAM)! , You Can Bid Again This Product ', 0),
(14, 'Null', '2026-01-10 18:21:40', 'Null Someone Bid higher than your Bid price on product Ai+ Pulse (Blue, 64 GB) (4 GB RAM)! , You Can Bid Again This Product ', 0),
(22, 'Null', '2026-01-12 08:06:12', 'Null Someone Bid heigher than your Bid price on productGMIT Intel Core i5 (16 GB / 512 GB / Windows 11)! , You Can Bid Again This Product ', 0),
(23, 'Null', '2026-01-12 08:06:17', 'Null Someone Bid heigher than your Bid price on productMahindra XUV 7XO! , You Can Bid Again This Product ', 0),
(24, 'Null', '2026-01-12 08:06:43', 'Null Someone Bid heigher than your Bid price on productKia Seltos! , You Can Bid Again This Product ', 0),
(25, 'Null', '2026-01-12 08:06:52', 'Null Someone Bid heigher than your Bid price on productPOCO C71 (Desert Gold, 128 GB) (6 GB RAM)! , You Can Bid Again This Product ', 0),
(26, 'Null', '2026-01-12 08:11:30', 'Null Someone Bid heigher than your Bid price on productGoogle Pixel 9A (Porcelain, 256 GB) (8 GB RAM)! , You Can Bid Again This Product ', 0),
(27, '', '2026-01-12 08:11:34', ' Someone Bid heigher than your Bid price on productPOCO C71 (Desert Gold, 128 GB) (6 GB RAM)! , You Can Bid Again This Product ', 0),
(28, '', '2026-01-12 08:12:45', ' Someone Bid heigher than your Bid price on productAi+ Pulse (Blue, 64 GB) (4 GB RAM)! , You Can Bid Again This Product ', 0),
(29, '', '2026-01-12 08:12:50', ' Someone Bid heigher than your Bid price on productGoogle Pixel 9A (Porcelain, 256 GB) (8 GB RAM)! , You Can Bid Again This Product ', 0),
(30, '8', '2026-01-12 08:13:28', 'This is Reply From Admin, hello', 0),
(31, '', '2026-01-12 08:15:48', ' Someone Bid heigher than your Bid price on productGoogle Pixel 9A (Porcelain, 256 GB) (8 GB RAM)! , You Can Bid Again This Product ', 0),
(32, 'Null', '2026-01-12 08:16:15', 'Null Someone Bid heigher than your Bid price on productHyundai Venue! , You Can Bid Again This Product ', 0),
(33, 'Null', '2026-01-12 08:16:20', 'Null Someone Bid heigher than your Bid price on productENTWINO Intel Core i5 (16 GB / 500 GB / Windows 11! , You Can Bid Again This Product ', 0),
(34, '', '2026-01-12 08:16:49', ' Someone Bid heigher than your Bid price on productAi+ Pulse (Blue, 64 GB) (4 GB RAM)! , You Can Bid Again This Product ', 0),
(35, '', '2026-01-12 08:16:53', ' Someone Bid heigher than your Bid price on productGMIT Intel Core i5 (16 GB / 512 GB / Windows 11)! , You Can Bid Again This Product ', 0),
(36, '', '2026-01-12 08:16:58', ' Someone Bid heigher than your Bid price on productMahindra XUV 7XO! , You Can Bid Again This Product ', 0),
(37, 'rocky123', '2026-01-12 08:17:35', 'rocky123 Someone Bid heigher than your Bid price on productENTWINO Intel Core i5 (16 GB / 500 GB / Windows 11! , You Can Bid Again This Product ', 0),
(38, 'satish123', '2026-01-12 08:17:41', 'satish123 Someone Bid heigher than your Bid price on productGMIT Intel Core i5 (16 GB / 512 GB / Windows 11)! , You Can Bid Again This Product ', 0),
(39, 'satish123', '2026-01-12 08:17:45', 'satish123 Someone Bid heigher than your Bid price on productMahindra XUV 7XO! , You Can Bid Again This Product ', 0),
(40, 'satish123', '2026-01-12 08:23:32', 'satish123 Someone Bid heigher than your Bid price on productAi+ Pulse (Blue, 64 GB) (4 GB RAM)! , You Can Bid Again This Product ', 0),
(41, 'sattu123', '2026-01-12 08:24:24', 'sattu123 Someone Bid heigher than your Bid price on productGMIT Intel Core i5 (16 GB / 512 GB / Windows 11)! , You Can Bid Again This Product ', 0),
(42, 'sattu123', '2026-01-12 08:24:33', 'sattu123 Someone Bid heigher than your Bid price on productMahindra XUV 7XO! , You Can Bid Again This Product ', 0),
(43, 'sattu123', '2026-01-12 14:37:12', 'sattu123 Someone Bid higher than your Bid price on product Ai+ Pulse (Blue, 64 GB) (4 GB RAM)! , You Can Bid Again This Product ', 0),
(44, '', '2026-01-12 16:49:52', ' Someone Bid higher than your Bid price on product POCO C71 (Desert Gold, 128 GB) (6 GB RAM)! , You Can Bid Again This Product ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `ProductName` varchar(255) NOT NULL,
  `Description` text DEFAULT NULL,
  `Price` decimal(10,2) NOT NULL,
  `ProductStatus` enum('Available','Out of Stock','Discontinued') NOT NULL,
  `CatagoryName` varchar(255) DEFAULT NULL,
  `UserName` varchar(255) DEFAULT NULL,
  `Quantity` int(11) NOT NULL,
  `StartDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  `Buyer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `Image`, `ProductName`, `Description`, `Price`, `ProductStatus`, `CatagoryName`, `UserName`, `Quantity`, `StartDate`, `EndDate`, `Buyer`) VALUES
(5, '../ProductPhoto/Screenshot 2026-01-10 230405.png', 'Ai+ Pulse (Blue, 64 GB) (4 GB RAM)', ' \r\nThe Ai+ Pulse phone comes loaded with a 50 MP AI camera for vivid, high-resolution photographs, a humongous 5000 mAh battery for all-day usage, and hassle-free performance with the Unisoc T615 chipset. Take advantage of fast, smooth multitasking and gaming with an AnTuTu rating of over 300K. Based on Android 15 with nxtQ, it offers personalized customization and advanced privacy features to protect your data while offering a smooth, future-proof experience.\r\n', 8699.00, 'Available', 'Mobile', 'rocky123', 1, '2026-01-10', '2026-01-23', 'satish123'),
(6, '../ProductPhoto/Screenshot 2026-01-10 221435.png', 'Google Pixel 9A (Porcelain, 256 GB) (8 GB RAM)', ' The Power Behind AI on Google Pixel\r\nPixel 9a uses Google’s most powerful chip yet, Tensor G4 – just like Pixel 9 and Pixel 9 Pro. It’s built for our most capable AI like Gemini and cutting-edge photos and videos.\r\nThe Amazingly High-res Actua Display\r\nThe 16.002 cm (6.3) Actua display is sharp, vibrant, and 35% brighter. It runs fast, up to 120 Hz, for smooth gaming, scrolling, and switching between apps.', 40299.00, 'Available', 'Mobile', 'satish123', 1, '2026-01-12', '2026-01-31', 'rocky123'),
(8, '../ProductPhoto/Screenshot 2026-01-12 125438.png', 'Hyundai Venue', ' The Hyundai Venue 2025 gets a bolder front and rear design, sleek LEDs and 17-inch alloys. Its also taller, wider, and has a longer wheelbase to improve cabin space. Mechanically, its mostly the same besides a new diesel automatic trim. The modern design and features like Level 2 ADAS, 360-degree camera, and dual 12.3-inch screens make it a practical yet stylish offering.', 800100.00, 'Available', 'Car', 'satish123', 1, '2026-01-12', '2026-01-20', 'rocky123'),
(9, '../ProductPhoto/Screenshot 2026-01-12 130048.png', 'ENTWINO Intel Core i5 (16 GB / 500 GB / Windows 11', ' This Computer is Assemebled Computer build with OEM Cabinet and power supply. The PC comes with Trail Window 11 and Microsoft Office. There is no DVD writer in this PC. You can use this pc for Office, Online Study, Programming or Gamming purpose (Note before buying please read warranty policy carefully)', 15200.00, 'Available', 'Computer', 'satish123', 1, '2026-01-12', '2026-01-22', 'sattu123'),
(10, '../ProductPhoto/Screenshot 2026-01-12 130338.png', 'GMIT Intel Core i5 (16 GB / 512 GB / Windows 11)', 'i5 2nd gen / 16gb RAM/ 512GB SSD/ 19  MONITOR/ KEYBOARD/ MOUSE/ HEADPHONE/ WIFI/ MOUSE PAD\r\nThis Computer is Assembled Computer build with as per available Cabinet, power supply, LED Monitor, Keyboard Mouse and other Accessories. The PC comes with Trial version 11 and Microsoft Office. There is no DVD writer in this PC. There is no warranty for software you can claim for only hardware parts, no door-to-door service available, you can use this pc for Office, Online Study, Programming or Gamming purpose (Note before buying please read warranty policy carefully)', 18400.00, 'Available', 'Computer', 'rocky123', 1, '2026-01-12', '2026-01-24', 'satish123'),
(11, '../ProductPhoto/Screenshot 2026-01-12 130549.png', 'Mahindra XUV 7XO', ' The Mahindra XUV 7X0 has been launched at Rs. 13.66 lakh (introductory ex-showroom for first 40,000 buyers) . It features a new front and rear design and in terms of features, it gets a triple 12.3-inch screen dashboard, boss mode and ventilated seats. For safety, it gets seven airbags, Level-2 ADAS and 540-degree camera system. It scored five stars in BNCAP crash safety tests. Deliveries will commence on 14 January.', 1300400.00, 'Available', 'Car', 'rocky123', 1, '2026-01-12', '2026-01-30', 'satish123'),
(12, '../ProductPhoto/Screenshot 2026-01-12 131910.png', 'Kia Seltos', ' The new Kia Seltos has been launched at Rs. 10.99 lakh, with the top-spec X-Line variants topping at Rs. 19.99 lakh (ex-showroom prices). It gets three 1.5-litre engine options, two petrol and one diesel powertrain. It features a completely new interior and exterior design, with the styling being boxier with a more prominent SUV stance.', 1100100.00, 'Available', 'Car', 'sattu123', 1, '2026-01-12', '2026-01-28', ''),
(13, '../ProductPhoto/Screenshot 2026-01-12 132021.png', 'GRigs Core i5 (8th Gen) (16 GB / 512 GB / Windows ', ' Speed Check! Looks Check! Power Check! So if you wanted to start that designing career or that streaming profession WE GOT YOU Intel Core i5 8th Generation Nvidia GTX 1650 4GB DDR6 GPU 16GB DDR4 3600MHZ RAM 512gb Nvme SSD H310 Motherboard 550w Bronze Modular PSU White Case + White Cooler', 51000.00, 'Available', 'Computer', 'sattu123', 1, '2026-01-12', '2026-01-24', 'Null'),
(15, '../ProductPhoto/Screenshot 2026-01-12 132438.png', 'POCO C71 (Desert Gold, 128 GB) (6 GB RAM)', 'POCO C71 (Desert Gold, 128 GB) (6 GB RAM)\r\n6 GB RAM | 128 GB ROM | Expandable Upto 2 TB\r\n17.48 cm (6.88 inch) HD+ Display\r\n32MP Rear Camera | 8MP Front Camera\r\n5200 mAh Battery\r\nUnisoc T7250 Max clock speed: 2 x A75@1.8GHz 6 x A55@1.6GHz Processor', 1500.00, 'Out of Stock', 'Mobile', 'sattu123', 1, '2026-01-12', '2026-01-27', 'satish123');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Gender` enum('Male','Female','Other') NOT NULL,
  `DOB` date DEFAULT NULL,
  `Address` text DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Name`, `UserName`, `Password`, `Email`, `Phone`, `Gender`, `DOB`, `Address`, `Photo`) VALUES
(5, 'satish123', 'satish123', 'satish123', 'skd409927@gmail.com', '8103409927', 'Male', '2005-01-01', 'seoni MP', '../UserPhoto/profile.jpg'),
(6, 'rocky123', 'rocky123', 'rocky123', 'rdh81018@gmail.com', '8103409928', 'Male', '2012-07-11', 'mp', '../UserPhoto/images (1).png'),
(7, 'sattu', 'sattu123', 'sattu123', 'satishdhurva8166@gmail.com', '7894561230', 'Male', '2024-11-12', 'GXV5+FFM', '../UserPhoto/images (1).png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`),
  ADD UNIQUE KEY `AdminEmail` (`AdminEmail`);

--
-- Indexes for table `anotification`
--
ALTER TABLE `anotification`
  ADD PRIMARY KEY (`NotificationID`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`NotificationID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `UserName` (`UserName`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `anotification`
--
ALTER TABLE `anotification`
  MODIFY `NotificationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `NotificationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2018 at 11:20 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fab`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `comment` longtext NOT NULL,
  `status` varchar(20) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `eventID`, `userID`, `comment`, `status`, `dateAdded`) VALUES
(1, 3, 2, 'napaka ganda talaga sa lugar na to grabe', 'verified', '2018-10-17 11:28:22'),
(2, 3, 2, 'worth it talaga dito', 'verified', '2018-10-17 11:28:28'),
(3, 4, 2, 'asd', 'pending', '2018-10-19 05:47:24');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `eventID` varchar(11) NOT NULL,
  `eventCategory` varchar(30) NOT NULL,
  `eventTitle` varchar(100) NOT NULL,
  `eventInfo` longtext NOT NULL,
  `pax` varchar(11) NOT NULL,
  `eventPrice` varchar(20) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `eventID`, `eventCategory`, `eventTitle`, `eventInfo`, `pax`, `eventPrice`, `img`) VALUES
(1, '1', 'wedding', 'All in Wedding Packagee', 'Venue included  <br>\nThematic Backdrop Venue <br>\n Entrace Design Venue <br>\n Styling Complete Table Setting with table number <br>\n Dressed Banquet <br>\n Tables with cloth table and napkins <br>\nCurtain Arrangement Professionally <br>\n Trained Staffs in uniform <br>\nUse of complete sets of Dinnerware, flatware & glassware<br>\n 2layer fondant cake <br>\nLights & Sounds<br>\n Emcee <br>\nCandy/Dessert Buffet <br>\nChocolate fountain station<br>\n 15 varities of sweets Jars rentals<br>\n Table setup Invitation <br>\nSouvenir Makeup (Bride,Parents) <br>\nPhoto/Video Prenup shoot <br>\nSignature frame Projector <br>\nMagnetic Album Photo Gallery On the day Coordination With professional Emcee Entourage Flowers <br>\nBridal Car Flower<br>\n Bridal Car<br>\n Doves Wine <br> alighn\nMenu: <br>\n Rice <br> Pasta <br>4 Main Dishes (Beef,Chicken,Pork,Fish) <br>2 Dessert Iced tea <br>Pica- pica <br>Freebie: Couch for bride & groom\n', '100', '150000', 'fav1-large.jpg'),
(2, '2', 'wedding', 'All in Wedding Package', 'Thematic Backdrop Venue <br>  Entrace Design <br> Venue Styling  <br>Complete Table Setting with table number <br> Dressed Banquet <br> Tables with cloth table and napkins <br> Curtain Arrangement <br>Proffesionally Trained Staffs in uniform  <br>Use of complete sets of Dinnerware, flatware & glassware <br> 2layer fondant cake Lights & Sounds <br> Emcee <br>Candy/Dessert <br>Buffet Chocolate fountain station  <br>15 varities of sweets Jars <br>rentals Table setup <br>Invitation Souvenir <br>Makeup (Bride,Parents) <br> Photo/Video Prenup shoot Signature<br> frame Projector <br>Magnetic Album <br>Photo Gallery On the day Coordination With professional Emcee Entourage  <br> Flowers Bridal Car <br> Doves Wine <br><br> Menu:  Rice <br> Pasta <br>4 Main Dishes (Beef,Chicken,Pork,Fish) <br>2 Dessert<br> Iced tea<br> Pica- pica <br>Freebie: Couch for bride & groom', '200', '250000', 'wedding-large2.jpg'),
(3, '3', 'birthday', 'All-in Birthday Package ', 'Chairs with ribbon & cover plates <br> spoon& fork <br>100 glass<br> saucer <br>dessert spoon <br>pitcher<br> round table <br>Long table <br>square table  <br>Waterjag <br>food warmer<br> serving spoon <br> Dessert bowl <br> Curtain setup <br>Table settings <br>Red carpet <br>Couch Plat form <br> Thematic backdrop  Centerpieces <br> Food: Rice <br> Pasta <br> 3 main courses  Dessert <br> Iced tea <br> Candy  Buffet  <br> Cake- 2 layers  <br>Clown with magician <br> 30pcs lootbags  <br>Pabitin <br> 30pcs invitation', '150', '65000', 'birthday-large.jpg'),
(4, '4', 'birthday', 'All-in Birthday Package ', 'Chairs with ribbon <br> cover plates <br> spoon& fork <br>100glass <br>saucer <br>dessert spoon <br> pitcher <br> round table <br> Long table <br> square table <br> Waterjag <br> food warmer <br>serving spoon <br> Dessert bowl <br> Curtain setup  <br>Table settings <br>Red carpet  <br>Couch Plat form <br> Thematic backdrop Centerpieces <br> Food: Rice <br> Pasta <br> 3 main courses Dessert <br> Iced tea  <br>Candy Buffet <br> Cake- 2 layers  <br>Clown with magician <br>30pcs lootbags <br>Pabitin <br> 30pcs invitation\r\n', '200', '85000', 'birthday-large2.jpg'),
(5, '5', 'birthday', 'All-in Birthday Package ', ' Chairs with ribbon <br>  cover plates <br> spoon& fork  <br> 100glass <br>saucer  <br>dessert spoon pitcher <br>round table <br>Long table <br> square table<br> Waterjag<br> food warmer <br>serving spoon <br> Dessert bowl <br>Curtain setup  <br>Table settings <br> Red carpet <br> Couch Plat form <br>Thematic backdrop <br> Centerpieces <br> <br> Food: <br> Rice <br> Pasta <br> 3 main courses Dessert <br>Iced tea  <br>Candy Buffet Cake- 2 layers Clown with magician<br> 30pcs lootbags <br>Pabitin <br>30pcs invitation', '300', '120000', 'birthday-large3.jpg'),
(6, '6', 'others', 'Other Packages', '50k Thematic Backdrop Venue <br>\r\n Entrance Design <br>\r\nVenue Styling Complete<br>\r\n Table Setting with table number. <br>\r\nDressed Banquet Tables with cloth table and napkins<br>\r\n Curtain Arrangement Professionally<br>\r\n Trained Staffs in uniform<br>\r\n Use of complete sets of Dinnerware, flatware & glassware <br>\r\n2layers cake Lights & Sounds<br>\r\n Emcee Entourage <br>\r\nFlowers Bridal<br>\r\n Car Flower<br>\r\n Doves Wine <br>\r\nFreebie: Couch for bride & groom Service set up for wedding \r\n', '100', '50000', 'others.jpg'),
(7, '7', 'others', 'Other Packages', ' 20k  Monobloc chairs with ribbon<br>  cover plates <br>Spoon & fork <br>glass<br> saucer <br>dessert spoon <br> pitcher <br>Round table<br> long table <br>square tables <br>Waterjag <br>6 food warmer <br>6 serving spoon<br> Dessert bowl<br> Curtain<br> setup Table setting<br> Red carpet <br>Couch Plat form <br>Thematic backdrop <br>Centerpiece Balloon arch 25k with styling Monobloc chairs with ribbon & cover <br> Candy Buffet 12 varities of sweets <br> 24pcs cupcakes <br> 6 wait staff  <br> 35k Hotdogs <br> Cotton candy <br> Popcorn  <br>Clown with magician <br> 30pcs lootbags <br> 30pcs invites Pabitin <br> Palayok  <br>5 ft standee Game prizes <br> Party Host\r\n', '50', '20000', 'others2.jpg'),
(8, '8', 'christening', 'Christening Package', 'Chairs with ribbon & cover plates <br> spoon& fork <br>100 glass<br> saucer <br>dessert spoon <br>pitcher<br> round table <br>Long table <br>square table  <br>Waterjag <br>food warmer<br> serving spoon <br> Dessert bowl <br> Curtain setup <br>Table settings <br>Red carpet <br>Couch Plat form <br> Thematic backdrop  Centerpieces <br> Food: Rice <br> Pasta <br> 3 main courses  Dessert <br> Iced tea <br> Candy  Buffet  <br> Cake- 2 layers  <br>Clown with magician <br> 30pcs lootbags  <br>Pabitin <br> 30pcs invitation\r\n', '150', '65000', 'christening-large1.jpg'),
(9, '9', 'christening', 'Christening Package', 'Chairs with ribbon & cover plates spoon& fork 100glass saucer dessert spoon pitcher round table Long table square table Waterjag food warmer serving spoon Dessert bowl Curtain setup Table settings Red carpet Couch Plat form Thematic backdrop Centerpieces Food Rice Pasta 3 main courses Dessert Iced tea Candy Buffet Cake- 2 layers Clown with magician 30pcs lootbags Pabitin 30pcs invitationChairs with ribbon <br> cover plates <br> spoon& fork <br>100glass <br>saucer <br>dessert spoon <br> pitcher <br> round table <br> Long table <br> square table <br> Waterjag <br> food warmer <br>serving spoon <br> Dessert bowl <br> Curtain setup  <br>Table settings <br>Red carpet  <br>Couch Plat form <br> Thematic backdrop Centerpieces <br> Food: Rice <br> Pasta <br> 3 main courses Dessert <br> Iced tea  <br>Candy Buffet <br> Cake- 2 layers  <br>Clown with magician <br>30pcs lootbags <br>Pabitin <br> 30pcs invitation', '200', '85000', 'christening-large2.jpg'),
(10, '10', 'christening', 'Christening Package', 'Chairs with ribbon & cover plates spoon& fork 100glass saucer dessert spoon pitcher round table Long table square table Waterjag food warmer serving spoon Dessert bowl Curtain setup Table settings Red carpet Couch Plat form Thematic backdrop Centerpieces Food Rice Pasta 3 main courses Dessert Iced tea Candy Buffet Cake- 2 layers Clown with magician 30pcs lootbags Pabitin 30pcs invitation Chairs with ribbon <br>  cover plates <br> spoon& fork  <br> 100glass <br>saucer  <br>dessert spoon pitcher <br>round table <br>Long table <br> square table<br> Waterjag<br> food warmer <br>serving spoon <br> Dessert bowl <br>Curtain setup  <br>Table settings <br> Red carpet <br> Couch Plat form <br>Thematic backdrop <br> Centerpieces <br> <br> Food: <br> Rice <br> Pasta <br> 3 main courses Dessert <br>Iced tea  <br>Candy Buffet Cake- 2 layers Clown with magician<br> 30pcs lootbags <br>Pabitin <br>30pcs invitation', '300', '120000', 'christening-large3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menuID` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  `subCategory` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservedcustomer`
--

CREATE TABLE `reservedcustomer` (
  `id` int(11) NOT NULL,
  `cusID` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  `dateReserved` varchar(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `packs` int(11) NOT NULL,
  `paymentMethod` varchar(20) NOT NULL,
  `paymentStatus` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `dateArchive` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservedcustomer`
--

INSERT INTO `reservedcustomer` (`id`, `cusID`, `eventID`, `dateReserved`, `date_created`, `packs`, `paymentMethod`, `paymentStatus`, `status`, `dateArchive`) VALUES
(20, 2, 3, '10-25-2018', '2018-11-05 07:12:07', 150, 'direct payment', 'incomplete', 'verified', ''),
(21, 2, 3, '10-26-2018', '2018-11-05 07:10:59', 150, 'direct payment', 'incomplete', 'archive', '2018-11-05'),
(22, 2, 10, '10-26-2018', '2018-10-19 01:55:16', 300, 'direct payment', '', 'canceled', ''),
(23, 3, 4, '11-07-2018', '2018-11-05 07:07:35', 200, 'direct payment', 'complete', 'archive', '2018-11-05'),
(24, 2, 3, '10-30-2018', '2018-11-05 03:38:14', 150, '', '', 'canceled', ''),
(25, 2, 2, '11-06-2018', '2018-11-05 10:19:34', 200, 'direct payment', 'incomplete', 'archive', '2018-11-05'),
(26, 2, 4, '11-10-2018', '2018-11-05 03:39:04', 200, '', '', 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `month` varchar(20) NOT NULL,
  `monthNum` int(2) NOT NULL,
  `year` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `month`, `monthNum`, `year`, `price`) VALUES
(7, 'Nov', 11, '2018', '75000'),
(8, 'Nov', 11, '2018', '260000'),
(9, 'Oct', 10, '2018', '95000'),
(11, 'Nov', 11, '2018', '75000'),
(12, 'Nov', 11, '2018', '75000'),
(13, 'Nov', 11, '2018', '260000');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `userID` int(11) NOT NULL,
  `fullName` varchar(50) NOT NULL,
  `address` varchar(60) NOT NULL,
  `birthDay` varchar(11) NOT NULL,
  `contactNumber` varchar(15) NOT NULL,
  `emailAddress` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `class` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`userID`, `fullName`, `address`, `birthDay`, `contactNumber`, `emailAddress`, `username`, `password`, `class`) VALUES
(1, 'jesson dua paloma', 'batangas lemery', '2018-10-27', '2018-10-31', 'palomajesson@gmail.com', 'admin', '$2y$10$XQSV/.WUoCLl41d4UWlAoOTYbSIx3XD7PjziHebLKPq/6JgK5u1ZW', 'admin'),
(2, 'panda de panda', 'amadeo cavite', '2018-10-31', '092345678900', 'palomajesson2@gmail.com', 'koko17', '$2y$10$5nmj2mSLqMejveSX40wkKueLZtjhTmfYwtN0sneRetM4xqvCdhPne', 'user'),
(3, 'katthy cat cat', '031 batangas lemery', '2018-09-30', '09359385761', 'teamgrape@gmail.com', 'user1', '$2y$10$Wx4lP11v0QFqgsHeO9ucDuJW4wsmHwin6QorNHgQKaUu4LaDw4en2', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menuID`);

--
-- Indexes for table `reservedcustomer`
--
ALTER TABLE `reservedcustomer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menuID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservedcustomer`
--
ALTER TABLE `reservedcustomer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

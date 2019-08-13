-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 18, 2019 at 08:11 AM
-- Server version: 10.2.23-MariaDB-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `revex10h_fab`
--

-- --------------------------------------------------------

--
-- Table structure for table `clientmessage`
--

CREATE TABLE `clientmessage` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `dateSent` datetime NOT NULL DEFAULT current_timestamp(),
  `statusClient` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `deleteStatus` varchar(20) NOT NULL,
  `deleteStatusAdmin` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientmessage`
--

INSERT INTO `clientmessage` (`id`, `userID`, `subject`, `message`, `dateSent`, `statusClient`, `status`, `deleteStatus`, `deleteStatusAdmin`) VALUES
(6, 2, 'testing message', '<p>hi deer how are you?</p>', '2018-12-04 20:39:11', 'unseen', 'seen', 'deleted', 'deleted'),
(7, 2, 'asdasd', '<p>zxczxczxc</p>', '2018-12-06 10:33:14', 'seen', 'seen', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `clientmessages`
--

CREATE TABLE `clientmessages` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `message` longtext NOT NULL,
  `dateSent` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `dateAdded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `eventID`, `userID`, `comment`, `status`, `dateAdded`) VALUES
(1, 3, 2, 'napaka ganda talaga sa lugar na to grabe', 'verified', '2018-10-17 11:28:22'),
(2, 3, 2, 'worth it talaga dito', 'verified', '2018-10-17 11:28:28'),
(3, 4, 2, 'asd', 'pending', '2018-10-19 05:47:24'),
(4, 9, 2, 'comment test', 'pending', '2018-11-14 14:18:18'),
(5, 9, 2, 'test', 'pending', '2018-11-14 14:19:52');

-- --------------------------------------------------------

--
-- Table structure for table `completedevents`
--

CREATE TABLE `completedevents` (
  `id` int(11) NOT NULL,
  `eventName` varchar(100) NOT NULL,
  `eventCategory` varchar(100) NOT NULL,
  `coverPhoto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `completedevents`
--

INSERT INTO `completedevents` (`id`, `eventName`, `eventCategory`, `coverPhoto`) VALUES
(2, 'calvin drake\'s birthday and Christening', 'birhtday', 'main cover-large.jpg'),
(3, 'Godpray 21st birthday', 'birthday', 'godpray.jpg'),
(4, 'jerwin and apple wedding', 'wedding', 'wedding.jpg'),
(21, 'testin', 'birthday', '2000px-Shopping_cart_icon.svg.png');

-- --------------------------------------------------------

--
-- Table structure for table `completedeventsimg`
--

CREATE TABLE `completedeventsimg` (
  `id` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `completedeventsimg`
--

INSERT INTO `completedeventsimg` (`id`, `eventID`, `img`) VALUES
(9, 5, '41390550_1900290686934585_6254988497841553408_n.jpg'),
(10, 5, '41394299_1900290950267892_1112139110799114240_n.jpg'),
(11, 5, '41418387_1900290933601227_2196035891049267200_n.jpg'),
(23, 0, ''),
(24, 0, ''),
(31, 3, ''),
(83, 21, '36462478_10217403749192138_3228637494631202816_n.jpg'),
(84, 21, ''),
(85, 21, ''),
(86, 21, ''),
(87, 2, 'cover1-large.jpg'),
(88, 2, 'cover2-large.jpg'),
(89, 2, 'cover4-large.jpg'),
(90, 2, 'cover5-large.jpg'),
(91, 2, 'cover6-large.jpg'),
(92, 2, 'main cover-large.jpg'),
(93, 3, 'cover1-large.jpg'),
(94, 3, 'cover2-large.jpg'),
(95, 3, 'cover5-large.jpg'),
(96, 3, 'cover6-large.jpg');

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
  `foodIncluded` longtext NOT NULL,
  `pax` varchar(11) NOT NULL,
  `eventPrice` varchar(20) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `eventID`, `eventCategory`, `eventTitle`, `eventInfo`, `foodIncluded`, `pax`, `eventPrice`, `img`) VALUES
(1, '1', 'wedding', 'All in Wedding Package', '<p>Venue includedÂ Thematic Backdrop VenueÂ <br />Entrace Design VenueÂ <br />Styling Complete Table Setting with table numberÂ <br />Dressed BanquetÂ <br />Tables with cloth table and napkinsÂ <br />Curtain Arrangement ProfessionallyÂ <br />Trained Staffs in uniformÂ <br />Use of complete sets of Dinnerware, flatware &amp; glassware<br />2layer fondant cakeÂ <br />Lights &amp; Sounds<br />EmceeÂ <br />Candy/Dessert BuffetÂ <br />Chocolate fountain station<br />15 varities of sweets Jars rentals<br />Table setup InvitationÂ <br />Souvenir Makeup (Bride,Parents)Â <br />Photo/Video Prenup shootÂ <br />Signature frame ProjectorÂ <br />Magnetic Album Photo Gallery On the day Coordination With professional Emcee Entourage FlowersÂ <br />Bridal Car Flower<br />Bridal Car<br />Doves WineÂ <br /><strong>Food Inlcuded:</strong><br />Pica- picaÂ <br />Freebie: Couch for bride &amp; groom<br />RiceÂ <br />Pasta<br />Iced teaÂ <br /><br /><strong>Choose 4 Main Dishes (Beef,Chicken,Pork,Fish)</strong>Â <br /><strong>Choose 2 Dessert</strong>Â  Â </p>', '<p><strong>Choose 4 Main Dishes (Beef,Chicken,Pork,Fish)</strong>Â <br /><strong>Choose 2 Dessert</strong>Â  Â </p>', '100', '150000', 'fav1-large.jpg'),
(2, '2', 'wedding', 'All in Wedding Package', '<p>Thematic Backdrop Venue <br /> Entrace Design <br /> Venue Styling <br />Complete Table Setting with table number <br /> Dressed Banquet <br /> Tables with cloth table and napkins <br /> Curtain Arrangement <br />Proffesionally Trained Staffs in uniform <br />Use of complete sets of Dinnerware, flatware &amp; glassware <br /> 2layer fondant cake Lights &amp; Sounds <br /> Emcee <br />Candy/Dessert <br />Buffet Chocolate fountain station <br />15 varities of sweets Jars <br />rentals Table setup <br />Invitation Souvenir <br />Makeup (Bride,Parents) <br /> Photo/Video Prenup shoot Signature<br /> frame Projector <br />Magnetic Album <br />Photo Gallery On the day Coordination With professional Emcee Entourage <br /> Flowers Bridal Car <br /> Doves Wine <br />Freebie: Couch for bride &amp; groom</p>\n<p><strong>Food Included</strong></p>\n<p>-Rice</p>\n<p>-Pasta</p>\n<p>-Ice Tea</p>\n<p>-Pica - pica</p>\n<p><strong>Choose 4 Main Dishes (Beef,Chicken,Pork,Fish)</strong></p>\n<p><br /><br /></p>\n<p>Â </p>', '<p><strong>Choose:</strong></p>\n<p><strong>4 Main Dishes (Beef,Chicken,Pork,Fish)</strong></p>\n<p><strong>2 Dessert</strong></p>', '200', '250000', 'wedding-large2.jpg'),
(3, '3', 'birthday', 'All-in Birthday Package ', '<p>Chairs with ribbon &amp; cover plates <br /> spoon&amp; fork <br />100 glass<br /> saucer <br />dessert spoon <br />pitcher<br /> round table <br />Long table <br />square table <br />Waterjag <br />food warmer<br /> serving spoon <br /> Dessert bowl <br /> Curtain setup <br />Table settings <br />Red carpet <br />Couch Plat form <br /> Thematic backdrop Centerpieces</p>\n<p>Clown with magician <br /> 30pcs lootbags <br />Pabitin <br /> 30pcs invitation</p>\n<p><strong>Food Included:</strong></p>\n<p>Rice <br /> Pasta <br /> Iced tea <br /> Candy Buffet <br /> Cake- 2 layers</p>\n<p><strong>Choose 3 main courses DessertÂ </strong></p>\n<p><br /><br /></p>', '<p><strong>Choose<br />4 Main Dishes (Beef,Chicken,Pork,Fish)</strong></p>\n<p><strong>2 Dessert</strong></p>', '150', '65000', 'birthday-large.jpg'),
(4, '4', 'birthday', 'All-in Birthday Package ', '<p>Chairs with ribbon <br /> cover plates <br /> spoon&amp; fork <br />100glass <br />saucer <br />dessert spoon <br /> pitcher <br /> round table <br /> Long table <br /> square table <br /> Waterjag <br /> food warmer <br />serving spoon <br /> Dessert bowl <br /> Curtain setup <br />Table settings <br />Red carpet <br />Couch Plat form <br /> Thematic backdrop Centerpieces</p>\n<p>Clown with magician <br />30pcs lootbags <br />Pabitin <br /> 30pcs invitation</p>\n<p><strong>Food Included:</strong></p>\n<p>Rice <br /> Pasta <br />Iced tea <br />Candy Buffet <br /> Cake- 2 layers <br /><br /></p>\n<p><strong>ChooseÂ 3 main courses Dessert </strong></p>', '<p><strong>Choose :</strong></p>\n<p><strong>3 main courses Dessert</strong></p>\n<p>Â </p>', '200', '85000', 'birthday-large2.jpg'),
(5, '5', 'birthday', 'All-in Birthday Package ', '<p>Chairs with ribbon <br /> cover plates <br /> spoon&amp; fork <br /> 100glass <br />saucer <br />dessert spoon pitcher <br />round table <br />Long table <br /> square table<br /> Waterjag<br /> food warmer <br />serving spoon <br /> Dessert bowl <br />Curtain setup <br />Table settings <br /> Red carpet <br /> Couch Plat form <br />Thematic backdrop <br /> Centerpieces <br /> - 2 layers Clown with magician<br /> 30pcs lootbags <br />Pabitin <br />30pcs invitation</p>\n<p><br /> <strong>Food Included:</strong><br /> Rice <br /> Pasta <br />Iced tea <br />Candy Buffet Cake</p>\n<p><strong>SelectÂ 3 main courses Dessert </strong></p>', '<p>choose:</p>\n<p>3 main courses dessert</p>', '300', '120000', 'birthday-large3.jpg'),
(6, '6', 'others', 'Other Packages', '<p>50k Thematic Backdrop Venue <br /> Entrance Design <br /> Venue Styling Complete<br /> Table Setting with table number. <br /> Dressed Banquet Tables with cloth table and napkins<br /> Curtain Arrangement Professionally<br /> Trained Staffs in uniform<br /> Use of complete sets of Dinnerware, flatware &amp; glassware <br /> 2layers cake Lights &amp; Sounds<br /> Emcee Entourage <br /> Flowers Bridal<br /> Car Flower<br /> Doves Wine <br /> Freebie: Couch for bride &amp; groom Service set up for wedding</p>\n<p><strong>ChooseÂ 3 main courses Dessert</strong></p>', '<p><strong>ChooseÂ 3 main courses Dessert</strong></p>', '100', '50000', 'others.jpg'),
(7, '7', 'others', 'Other Packages', '<p>20k Monobloc chairs with ribbon<br /> cover plates <br />Spoon &amp; fork <br />glass<br /> saucer <br />dessert spoon <br /> pitcher <br />Round table<br /> long table <br />square tables <br />Waterjag <br />6 food warmer <br />6 serving spoon<br /> Dessert bowl<br /> Curtain<br /> setup Table setting<br /> Red carpet <br />Couch Plat form <br />Thematic backdrop <br />Centerpiece Balloon arch 25k with styling Monobloc chairs with ribbon &amp; cover <br /> Candy Buffet 12 varities of sweets <br /> 24pcs cupcakes <br /> 6 wait staff <br /> 35k Hotdogs <br /> Cotton candy <br /> Popcorn <br />Clown with magician <br /> 30pcs lootbags <br /> 30pcs invites Pabitin <br /> Palayok <br />5 ft standee Game prizes <br /> Party Host</p>\n<p><strong>ChooseÂ 3 main courses Dessert</strong></p>', '<p><strong>ChooseÂ 3 main courses Dessert</strong></p>', '50', '20000', 'others2.jpg'),
(8, '8', 'christening', 'Christening Package', '<p>Chairs with ribbon &amp; cover plates <br /> spoon&amp; fork <br />100 glass<br /> saucer <br />dessert spoon <br />pitcher<br /> round table <br />Long table <br />square table <br />Waterjag <br />food warmer<br /> serving spoon <br /> Dessert bowl <br /> Curtain setup <br />Table settings <br />Red carpet <br />Couch Plat form <br /> Thematic backdrop Centerpieces</p>\n<p>Clown with magician <br /> 30pcs lootbags <br />Pabitin <br /> 30pcs invitation</p>\n<p><br /> Food Included:</p>\n<p>Rice <br /> Pasta <br />Iced tea <br /> Candy Buffet <br /> Cake- 2 layers <br /><br /></p>\n<p><strong>ChooseÂ 3 main courses Dessert </strong></p>', '<p><strong>ChooseÂ 3 main courses Dessert</strong></p>', '150', '65000', 'christening-large1.jpg'),
(9, '9', 'christening', 'Christening Package', '<p>Chairs with ribbon &amp; cover plates spoon&amp; fork 100glass saucer dessert spoon pitcher round table Long table square table Waterjag food warmer serving spoon Dessert bowl Curtain setup Table settings Red carpet Couch Plat form Thematic backdrop Centerpieces Food Rice Pasta 3 main courses Dessert Iced tea Candy Buffet Cake- 2 layers Clown with magician 30pcs lootbags Pabitin 30pcs invitationChairs with ribbon <br /> cover plates <br /> spoon&amp; fork <br />100glass <br />saucer <br />dessert spoon <br /> pitcher <br /> round table <br /> Long table <br /> square table <br /> Waterjag <br /> food warmer <br />serving spoon <br /> Dessert bowl <br /> Curtain setup <br />Table settings <br />Red carpet <br />Couch Plat form <br /> Thematic backdrop Centerpieces</p>\n<p>Clown with magician <br />30pcs lootbags <br />Pabitin <br /> 30pcs invitation</p>\n<p><br /> <strong>Food Included: </strong></p>\n<p>Rice <br /> Pasta <br />Iced tea <br />Candy Buffet <br /> Cake- 2 layers</p>\n<p><strong>ChooseÂ 3 main courses Dessert </strong></p>', '<p><strong>ChooseÂ 3 main courses Dessert</strong></p>', '200', '85000', 'christening-large2.jpg'),
(10, '10', 'christening', 'Christening Package', '<p>Chairs with ribbon &amp; cover plates spoon&amp; fork 100glass saucer dessert spoon pitcher round table Long table square table Waterjag food warmer serving spoon Dessert bowl Curtain setup Table settings Red carpet Couch Plat form Thematic backdrop Centerpieces Food Rice Pasta 3 main courses Dessert Iced tea Candy Buffet Cake- 2 layers Clown with magician 30pcs lootbags Pabitin 30pcs invitation Chairs with ribbon <br /> cover plates <br /> spoon&amp; fork <br /> 100glass <br />saucer <br />dessert spoon pitcher <br />round table <br />Long table <br /> square table<br /> Waterjag<br /> food warmer <br />serving spoon <br /> Dessert bowl <br />Curtain setup <br />Table settings <br /> Red carpet <br /> Couch Plat form <br />Thematic backdrop <br /> Centerpieces <br /> -2 layers Clown with magician<br /> 30pcs lootbags <br />Pabitin <br />30pcs invitation</p>\n<p><br /> <strong>Food Included:</strong> <br /> Rice <br /> Pasta <br />Iced tea <br />Candy Buffet Cake</p>\n<p><strong>ChooseÂ 3 main courses Dessert </strong></p>', '<p><strong>ChooseÂ 3 main courses Dessert</strong></p>', '300', '120000', 'christening-large3.jpg'),
(11, '11', 'wedding', 'asdasdasd', '', '<p>adasdasd</p>', '12', '119998', '45898383_2213732275542083_3358078076536750080_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `foodchoice`
--

CREATE TABLE `foodchoice` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  `menuID` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL,
  `dateAdded` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foodchoice`
--

INSERT INTO `foodchoice` (`id`, `userID`, `eventID`, `menuID`, `menu`, `dateAdded`, `status`) VALUES
(42, 2, 11, 2, 'Asado', '2018-01-10 14:18:30', 'approved'),
(43, 2, 11, 11, 'Barbeque Spareribs', '2018-02-10 14:18:30', 'approved'),
(44, 2, 11, 12, 'Adobo', '2018-03-10 14:18:30', 'approved'),
(45, 7, 9, 20, 'Chicken Pininyahan', '2018-04-10 14:18:30', 'approved'),
(46, 7, 9, 11, 'Barbeque Spareribs', '2018-01-10 14:18:30', 'approved'),
(47, 7, 9, 21, 'Chicken Lollipop', '2018-06-10 00:00:00', 'approved'),
(57, 11, 4, 20, 'Chicken Pininyahan', '2018-07-10 14:18:30', 'approved'),
(58, 11, 4, 21, 'Chicken Lollipop', '2018-08-10 00:00:00', 'approved'),
(59, 11, 4, 22, 'Chicken Teriyaki', '2018-09-10 14:18:30', 'approved'),
(261, 2, 4, 26, 'Asado', '2019-02-07 15:38:38', 'approved'),
(264, 2, 1, 20, 'Chicken Pininyahan', '2019-02-20 22:08:51', ''),
(265, 2, 1, 21, 'Chicken Lollipop', '2019-02-20 22:08:52', '');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menuID` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  `menu` varchar(50) NOT NULL,
  `ing` longtext NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menuID`, `category`, `menu`, `ing`, `img`, `status`) VALUES
(1, 'pork', 'Hamonado', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(2, 'pork', 'Asado', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(3, 'pork', 'Morcon', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(4, 'pork', 'Menudo', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(5, 'pork', 'Bicol Express', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(6, 'pork', 'Pork Pininyahan', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(7, 'pork', 'Pork with white sauce', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(8, 'pork', 'Shanghai', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(9, 'pork', 'Pork Teriyaki', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(10, 'pork', 'Kaldereta', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(11, 'pork', 'Barbeque Spareribs', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(12, 'pork', 'Adobo', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(13, 'pork', 'Pochero', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(14, 'pork', 'Rebosado', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(15, 'pork', 'Lechon Kawali', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(16, 'pork', 'Lechon Paksiw', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(17, 'pork', 'Pork Binagoongan', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(18, 'chicken', 'Fried Chicken', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(19, 'chicken', 'Cordon Bleu', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(20, 'chicken', 'Chicken Pininyahan', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(21, 'chicken', 'Chicken Lollipop', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(22, 'chicken', 'Chicken Teriyaki', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(23, 'chicken', 'Orange Teriyaki', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(24, 'chicken', 'Rosemary Chicken', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(25, 'beef', 'Morcon', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(26, 'beef', 'Asado', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'asado.jpg', 'available'),
(27, 'beef', 'Beef Brocolli', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(28, 'beef', 'Kaldereta', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(29, 'beef', 'Kare - Kare', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(30, 'fish', 'Fish Fillet', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(31, 'fish', 'Sweet and Sour Fish', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(32, 'fish', 'Seafoods Galore', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(34, 'pancit', 'miko', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(35, 'pancit', 'bihon', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(36, 'pancit', 'Canton', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(37, 'pasta', 'Carbonara', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(38, 'pasta', 'Spaghetti', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(39, 'pasta', 'Baked Mac', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(40, 'pasta', 'Carbonisa (Carbonara with Longanisa)', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(41, 'vegetables', 'Mixed Vegetables with Ham and Chicken', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(42, 'vegetables', 'Chopsuey', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(43, 'vegetables', 'Ampalaya Con Carne', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(44, 'dessert', 'Buko Salad', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(45, 'dessert', 'Fruit Salad', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(46, 'dessert', 'Buko Pandan', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(47, 'dessert', 'Buko Lychees', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(48, 'dessert', 'Nata Corn', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(49, 'dessert', 'Cathedral Gelatine', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(50, 'dessert', 'Gelatin with Cheese and Pinipigg', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', '79507952-bible-lettering-christian-art-at-the-name-of-jesus-every-knee-will-bow.jpg', 'available'),
(51, 'dessert', 'Gelatine and Mixed Fruits', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(52, 'dessert', 'Leche Flan', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(53, 'dessert', 'Leche Ube', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(54, 'dessert', 'Fruit Cocktail with ice', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(55, 'drinks', 'Iced Tea with Four Season', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(56, 'drinks', 'Cucumber juice', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(57, 'drinks', 'Pink lemonade', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(58, 'drinks', 'blue lemonade', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(59, 'drinks', 'honey blend', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(60, 'drinks', 'apple blend', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'notfound.png', 'available'),
(63, 'beef', 'test menu', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'img.jpg', 'available'),
(64, 'fish', 'testing menu', '<p>1 whole chicken, cut into fist-sized pieces</p>\r\n<p>1/4 cup soy sauce</p>\r\n<p>1 cup vinegar</p>\r\n<p>1 tsp sugar</p>\r\n<p>Pinch of salt and peppercorn</p>\r\n<p>3 bay leaves</p>\r\n<p>1 cup water</p>\r\n<p>1 medium onion, chopped</p>\r\n<p>4 cloves of garlic, pressed or chopped</p>\r\n<p>Cooking oil</p>\r\n<p>Salt and pepper to taste</p>', 'img.jpg', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `dateSent` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `packagechoices`
--

CREATE TABLE `packagechoices` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  `packageID` int(11) NOT NULL,
  `package` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `confirmStatus` varchar(20) NOT NULL,
  `dateAdded` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packagechoices`
--

INSERT INTO `packagechoices` (`id`, `userID`, `eventID`, `packageID`, `package`, `status`, `confirmStatus`, `dateAdded`) VALUES
(64, 2, 11, 70, 'asd', 'ok', 'ok', '2018-12-10 16:49:43'),
(65, 2, 11, 71, 'zxc', 'ok', 'ok', '2018-12-10 16:49:43'),
(66, 2, 11, 72, '123', 'ok', 'ok', '2018-12-10 16:49:43'),
(67, 2, 11, 82, ' zxczxc', 'ok', 'ok', '2018-12-10 16:49:43'),
(68, 2, 11, 90, 'agadoo', 'ok', 'ok', '2018-12-10 16:49:43'),
(69, 2, 11, 91, 'doo doo', 'ok', 'ok', '2018-12-10 16:49:43'),
(70, 2, 11, 92, 'push pineapple', 'ok', 'ok', '2018-12-10 16:49:43'),
(71, 2, 11, 93, 'shake the tree', 'ok', 'ok', '2018-12-10 16:49:43'),
(72, 2, 11, 94, 'agadoo doo doo doo', 'ok', 'ok', '2018-12-10 16:49:43'),
(73, 2, 9, 240, '15 varities of sweets Jars rentals', 'ok', '', '2018-12-10 16:49:43'),
(74, 2, 9, 241, 'Lights & Sounds', 'ok', '', '2018-12-10 16:49:43'),
(75, 2, 9, 242, 'Curtain Arrangement Professionally ', 'ok', '', '2018-12-10 16:49:43'),
(76, 2, 9, 243, 'Photo/Video Prenup shoot ', 'ok', '', '2018-12-10 16:49:43'),
(77, 2, 9, 244, 'Bridal Car Flower', 'ok', '', '2018-12-10 16:49:43'),
(78, 2, 9, 245, 'Souvenir Makeup (Bride,Parents) ', 'ok', '', '2018-12-10 16:49:43'),
(79, 2, 4, 177, 'Chairs with ribbon ', 'ok', 'ok', '2018-12-10 16:49:43'),
(80, 2, 4, 178, 'cover plates', 'ok', 'ok', '2018-12-10 16:49:43'),
(81, 2, 4, 179, 'spoon& fork', 'ok', 'ok', '2018-12-10 16:49:43'),
(82, 2, 4, 180, '100glass ', 'ok', 'ok', '2018-12-10 16:49:43'),
(83, 2, 4, 181, 'saucer ', 'ok', 'ok', '2018-12-10 16:49:43'),
(84, 2, 4, 182, 'dessert spoon ', 'ok', 'ok', '2018-12-10 16:49:43'),
(85, 2, 4, 183, 'pitcher ', 'ok', 'ok', '2018-12-10 16:49:43'),
(86, 2, 4, 184, 'round table', 'ok', 'ok', '2018-12-10 16:49:43'),
(87, 2, 4, 185, 'Long table ', 'ok', 'ok', '2018-12-10 16:49:43'),
(88, 2, 4, 186, 'square table ', 'ok', 'ok', '2018-12-10 16:49:43'),
(89, 2, 4, 187, 'Waterjag ', 'ok', 'ok', '2018-12-10 16:49:43'),
(90, 2, 4, 188, 'food warmer', 'ok', 'ok', '2018-12-10 16:49:43'),
(91, 2, 4, 189, 'serving spoon ', 'ok', 'ok', '2018-12-10 16:49:43'),
(92, 2, 4, 190, 'Dessert bowl ', 'ok', 'ok', '2018-12-10 16:49:43'),
(93, 2, 4, 191, 'Curtain setup ', 'ok', 'ok', '2018-12-10 16:49:43'),
(94, 2, 4, 192, 'Table settings ', 'ok', 'ok', '2018-12-10 16:49:43'),
(95, 2, 4, 193, 'Red carpet ', 'ok', 'ok', '2018-12-10 16:49:43'),
(96, 2, 4, 194, 'Couch Plat form ', 'ok', 'ok', '2018-12-10 16:49:43'),
(97, 2, 4, 195, 'Thematic backdrop Centerpieces', 'ok', 'ok', '2018-12-10 16:49:43'),
(98, 2, 4, 196, ' Rice', 'ok', 'ok', '2018-12-10 16:49:43'),
(99, 2, 4, 197, 'Pasta ', 'ok', 'ok', '2018-12-10 16:49:43'),
(100, 2, 4, 198, 'Iced tea ', 'ok', 'ok', '2018-12-10 16:49:43'),
(101, 2, 4, 199, 'Candy Buffet ', 'ok', 'ok', '2018-12-10 16:49:43'),
(102, 2, 4, 200, 'Cake- 2 layers ', 'ok', 'ok', '2018-12-10 16:49:43'),
(103, 2, 4, 201, 'Clown with magician ', 'ok', 'ok', '2018-12-10 16:49:43'),
(104, 2, 4, 202, '30pcs lootbags', 'ok', 'ok', '2018-12-10 16:49:43'),
(105, 2, 4, 203, 'Pabitin ', 'ok', 'ok', '2018-12-10 16:49:43'),
(106, 2, 4, 204, '30pcs invitation', 'ok', 'ok', '2018-12-10 16:49:43'),
(107, 2, 8, 233, 'Entrace Design Venue ', 'ok', '', '2018-12-10 16:49:43'),
(108, 2, 8, 234, 'Styling Complete Table Setting with table number ', 'ok', '', '2018-12-10 16:49:43'),
(109, 2, 8, 235, 'Lights & Sounds', 'ok', '', '2018-12-10 16:49:43'),
(110, 2, 8, 236, 'Candy/Dessert Buffet', 'ok', '', '2018-12-10 16:49:43'),
(111, 2, 8, 237, '15 varities of sweets Jars rentals', 'ok', '', '2018-12-10 16:49:43'),
(112, 2, 8, 238, 'rice', 'ok', '', '2018-12-10 16:49:43'),
(113, 2, 8, 239, 'pasta', 'ok', '', '2018-12-10 16:49:43'),
(167, 11, 4, 177, 'Chairs with ribbon ', 'ok', 'ok', '2018-12-10 16:49:43'),
(168, 11, 4, 178, 'cover plates', 'ok', 'ok', '2018-12-10 16:49:43'),
(169, 11, 4, 179, 'spoon& fork', 'ok', 'ok', '2018-12-10 16:49:43'),
(170, 11, 4, 180, '100glass ', 'ok', 'ok', '2018-12-10 16:49:43'),
(171, 11, 4, 181, 'saucer ', 'ok', 'ok', '2018-12-10 16:49:43'),
(172, 11, 4, 182, 'dessert spoon ', 'ok', 'ok', '2018-12-10 16:49:43'),
(173, 11, 4, 183, 'pitcher ', 'ok', 'ok', '2018-12-10 16:49:43'),
(174, 11, 4, 184, 'round table', 'ok', 'ok', '2018-12-10 16:49:43'),
(175, 11, 4, 185, 'Long table ', 'ok', 'ok', '2018-12-10 16:49:43'),
(176, 11, 4, 186, 'square table ', 'ok', 'ok', '2018-12-10 16:49:43'),
(177, 11, 4, 187, 'Waterjag ', 'ok', 'ok', '2018-12-10 16:49:43'),
(178, 11, 4, 188, 'food warmer', 'ok', 'ok', '2018-12-10 16:49:43'),
(179, 11, 4, 189, 'serving spoon ', 'ok', 'ok', '2018-12-10 16:49:43'),
(180, 11, 4, 190, 'Dessert bowl ', 'ok', 'ok', '2018-12-10 16:49:43'),
(181, 11, 4, 191, 'Curtain setup ', 'ok', 'ok', '2018-12-10 16:49:43'),
(182, 11, 4, 192, 'Table settings ', 'ok', 'ok', '2018-12-10 16:49:43'),
(183, 11, 4, 193, 'Red carpet ', 'ok', 'ok', '2018-12-10 16:49:43'),
(184, 11, 4, 194, 'Couch Plat form ', 'ok', 'ok', '2018-12-10 16:49:43'),
(185, 11, 4, 195, 'Thematic backdrop Centerpieces', 'ok', 'ok', '2018-12-10 16:49:43'),
(186, 11, 4, 196, ' Rice', 'ok', 'ok', '2018-12-10 16:49:43'),
(187, 11, 4, 197, 'Pasta ', 'ok', 'ok', '2018-12-10 16:49:43'),
(188, 11, 4, 198, 'Iced tea ', 'ok', 'ok', '2018-12-10 16:49:43'),
(189, 11, 4, 199, 'Candy Buffet ', 'ok', 'ok', '2018-12-10 16:49:43'),
(190, 11, 4, 200, 'Cake- 2 layers ', 'ok', 'ok', '2018-12-10 16:49:43'),
(191, 11, 4, 201, 'Clown with magician ', 'ok', 'ok', '2018-12-10 16:49:43'),
(192, 11, 4, 202, '30pcs lootbags', 'ok', 'ok', '2018-12-10 16:49:43'),
(193, 11, 4, 203, 'Pabitin ', 'ok', 'ok', '2018-12-10 16:49:43'),
(194, 11, 4, 204, '30pcs invitation', 'ok', 'ok', '2018-12-10 16:49:43'),
(195, 12, 2, 123, 'Thematic Backdrop Venue ', 'ok', '', '2018-12-10 16:49:43'),
(196, 12, 2, 124, 'Entrace Design ', 'ok', '', '2018-12-10 16:49:43'),
(197, 12, 2, 125, 'Venue Styling ', 'ok', '', '2018-12-10 16:49:43'),
(198, 12, 2, 126, 'Complete Table Setting with table number ', 'ok', '', '2018-12-10 16:49:43'),
(199, 12, 2, 127, 'Dressed Banquet ', 'ok', '', '2018-12-10 16:49:43'),
(200, 12, 2, 128, 'Tables with cloth table and napkins ', 'ok', '', '2018-12-10 16:49:43'),
(201, 12, 2, 129, 'Curtain Arrangement ', 'ok', '', '2018-12-10 16:49:43'),
(202, 12, 2, 130, 'Proffesionally Trained Staffs in uniform ', 'ok', '', '2018-12-10 16:49:43'),
(203, 12, 2, 131, 'Use of complete sets of Dinnerware, flatware & glassware', 'ok', '', '2018-12-10 16:49:43'),
(204, 12, 2, 132, '2layer fondant cake Lights & Sounds ', 'ok', '', '2018-12-10 16:49:43'),
(205, 12, 2, 133, 'Emcee ', 'ok', '', '2018-12-10 16:49:43'),
(206, 12, 2, 134, 'Candy/Dessert ', 'ok', '', '2018-12-10 16:49:43'),
(207, 12, 2, 135, 'Buffet Chocolate fountain station ', 'ok', '', '2018-12-10 16:49:43'),
(208, 12, 2, 136, '15 varities of sweets Jars ', 'ok', '', '2018-12-10 16:49:43'),
(209, 12, 2, 137, 'rentals Table setup ', 'ok', '', '2018-12-10 16:49:43'),
(210, 12, 2, 138, 'Invitation Souvenir', 'ok', '', '2018-12-10 16:49:43'),
(211, 12, 2, 139, 'Makeup (Bride,Parents) ', 'ok', '', '2018-12-10 16:49:43'),
(212, 12, 2, 140, 'Photo/Video Prenup shoot Signature', 'ok', '', '2018-12-10 16:49:43'),
(213, 12, 2, 141, 'frame Projector ', 'ok', '', '2018-12-10 16:49:43'),
(214, 12, 2, 142, 'Magnetic Album ', 'ok', '', '2018-12-10 16:49:43'),
(215, 12, 2, 143, 'Photo Gallery On the day Coordination With professional Emcee Entourage ', 'ok', '', '2018-12-10 16:49:43'),
(216, 12, 2, 144, 'Flowers Bridal Car ', 'ok', '', '2018-12-10 16:49:43'),
(217, 12, 2, 145, 'Doves Wine ', 'ok', '', '2018-12-10 16:49:43'),
(218, 12, 2, 146, 'Rice', 'ok', '', '2018-12-10 16:49:43'),
(219, 12, 2, 147, 'Pasta ', 'ok', '', '2018-12-10 16:49:43'),
(220, 12, 2, 148, 'Iced tea', 'ok', '', '2018-12-10 16:49:43'),
(221, 12, 2, 149, 'Pica- pica ', 'ok', '', '2018-12-10 16:49:43'),
(222, 12, 2, 150, 'Freebie: Couch for bride & groom', 'ok', '', '2018-12-10 16:49:43'),
(223, 12, 2, 232, 'aw', 'ok', '', '2018-12-10 16:49:43'),
(224, 13, 1, 205, 'Thematic Backdrop Venue ', 'ok', '', '2018-12-10 16:49:43'),
(225, 13, 1, 206, 'Entrace Design Venue ', 'ok', '', '2018-12-10 16:49:43'),
(226, 13, 1, 207, 'Styling Complete Table Setting with table number', 'ok', '', '2018-12-10 16:49:43'),
(227, 13, 1, 208, 'Dressed Banquet', 'ok', '', '2018-12-10 16:49:43'),
(228, 13, 1, 209, 'Tables with cloth table and napkins ', 'ok', '', '2018-12-10 16:49:43'),
(229, 13, 1, 210, 'Curtain Arrangement Professionally ', 'ok', '', '2018-12-10 16:49:43'),
(230, 13, 1, 211, 'Trained Staffs in uniform ', 'ok', '', '2018-12-10 16:49:43'),
(231, 13, 1, 212, 'Use of complete sets of Dinnerware, flatware & glassware', 'ok', '', '2018-12-10 16:49:43'),
(232, 13, 1, 213, '2layer fondant cake ', 'ok', '', '2018-12-10 16:49:43'),
(233, 13, 1, 214, 'Lights & Sounds', 'ok', '', '2018-12-10 16:49:43'),
(234, 13, 1, 215, 'Emcee ', 'ok', '', '2018-12-10 16:49:43'),
(235, 13, 1, 216, 'Candy/Dessert Buffet ', 'ok', '', '2018-12-10 16:49:43'),
(236, 13, 1, 217, 'Chocolate fountain station', 'ok', '', '2018-12-10 16:49:43'),
(237, 13, 1, 218, '15 varities of sweets Jars rentals', 'ok', '', '2018-12-10 16:49:43'),
(238, 13, 1, 219, 'Table setup Invitation ', 'ok', '', '2018-12-10 16:49:43'),
(239, 13, 1, 220, 'Souvenir Makeup (Bride,Parents) ', 'ok', '', '2018-12-10 16:49:43'),
(240, 13, 1, 221, 'Photo/Video Prenup shoot ', 'ok', '', '2018-12-10 16:49:43'),
(241, 13, 1, 222, 'Signature frame Projector ', 'ok', '', '2018-12-10 16:49:43'),
(242, 13, 1, 223, 'Magnetic Album Photo Gallery On the day Coordination With professional Emcee Entourage Flowers', 'ok', '', '2018-12-10 16:49:43'),
(243, 13, 1, 224, 'Bridal Car Flower', 'ok', '', '2018-12-10 16:49:43'),
(244, 13, 1, 225, 'Bridal Car', 'ok', '', '2018-12-10 16:49:43'),
(245, 13, 1, 226, 'Doves Wine ', 'ok', '', '2018-12-10 16:49:43'),
(246, 13, 1, 227, 'Rice ', 'ok', '', '2018-12-10 16:49:43'),
(247, 13, 1, 228, 'Pasta ', 'ok', '', '2018-12-10 16:49:43'),
(248, 13, 1, 229, 'Iced tea ', 'ok', '', '2018-12-10 16:49:43'),
(249, 13, 1, 230, 'Pica- pica ', 'ok', '', '2018-12-10 16:49:43'),
(250, 13, 1, 231, 'Freebie: Couch for bride & groom', 'ok', '', '2018-12-10 16:49:43'),
(251, 2, 3, 98, 'thematic backdrop venue', 'ok', '', '2018-12-10 16:49:43'),
(252, 2, 3, 99, 'Entrace Design Venue', 'ok', '', '2018-12-10 16:49:43'),
(253, 2, 3, 100, ' Styling Complete Table Setting with table number', 'ok', '', '2018-12-10 16:49:43'),
(254, 2, 3, 101, 'Dressed Banquet', 'ok', '', '2018-12-10 16:49:43'),
(255, 2, 3, 102, 'Tables with cloth table and napkins', 'ok', '', '2018-12-10 16:49:43'),
(256, 2, 3, 103, 'Curtain Arrangement Professionally', 'ok', '', '2018-12-10 16:49:43'),
(257, 2, 3, 104, 'Trained Staffs in uniform', 'ok', '', '2018-12-10 16:49:43'),
(258, 2, 3, 105, 'Use of complete sets of Dinnerware, flatware & glassware', 'ok', '', '2018-12-10 16:49:43'),
(259, 2, 3, 106, '2layer fondant cake', 'ok', '', '2018-12-10 16:49:43'),
(260, 2, 3, 107, 'Lights & Sounds', 'ok', '', '2018-12-10 16:49:43'),
(261, 2, 3, 108, 'Emcee', 'ok', '', '2018-12-10 16:49:43'),
(262, 2, 3, 109, 'Candy/Dessert Buffet', 'ok', '', '2018-12-10 16:49:43'),
(263, 2, 3, 110, 'Chocolate fountain station', 'ok', '', '2018-12-10 16:49:43'),
(264, 2, 3, 111, '15 varities of sweets Jars rentals', 'ok', '', '2018-12-10 16:49:43'),
(265, 2, 3, 112, 'able setup Invitation', 'ok', '', '2018-12-10 16:49:43'),
(266, 2, 3, 113, 'Souvenir Makeup (Bride,Parents)', 'ok', '', '2018-12-10 16:49:43'),
(267, 2, 3, 114, 'Photo/Video Prenup shoot', 'ok', '', '2018-12-10 16:49:43'),
(268, 2, 3, 115, 'Signature frame Projector', 'ok', '', '2018-12-10 16:49:43'),
(269, 2, 3, 116, 'Magnetic Album Photo Gallery On the day Coordination With professional Emcee Entourage Flowers', 'ok', '', '2018-12-10 16:49:43'),
(270, 2, 3, 117, 'Bridal Car Flower', 'ok', '', '2018-12-10 16:49:43'),
(271, 2, 3, 118, 'Bridal Car', 'ok', '', '2018-12-10 16:49:43'),
(272, 2, 3, 119, 'Doves Wine', 'ok', '', '2018-12-10 16:49:43'),
(273, 2, 3, 120, 'Rice', 'ok', '', '2018-12-10 16:49:43'),
(274, 2, 3, 121, 'Pasta', 'ok', '', '2018-12-10 16:49:43'),
(275, 2, 3, 122, 'Pica- pica', 'ok', '', '2018-12-10 16:49:43'),
(276, 2, 1, 205, 'Thematic Backdrop Venue ', 'ok', '', '2018-12-10 16:49:43'),
(277, 2, 1, 206, 'Entrace Design Venue ', 'ok', '', '2018-12-10 16:49:43'),
(278, 2, 1, 207, 'Styling Complete Table Setting with table number', 'ok', '', '2018-12-10 16:49:43'),
(279, 2, 1, 208, 'Dressed Banquet', 'ok', '', '2018-12-10 16:49:43'),
(280, 2, 1, 209, 'Tables with cloth table and napkins ', 'ok', '', '2018-12-10 16:49:43'),
(281, 2, 1, 210, 'Curtain Arrangement Professionally ', 'ok', '', '2018-12-10 16:49:43'),
(282, 2, 1, 211, 'Trained Staffs in uniform ', 'ok', '', '2018-12-10 16:49:43'),
(283, 2, 1, 212, 'Use of complete sets of Dinnerware, flatware & glassware', 'ok', '', '2018-12-10 16:49:43'),
(284, 2, 1, 213, '2layer fondant cake ', 'ok', '', '2018-12-10 16:49:43'),
(285, 2, 1, 214, 'Lights & Sounds', 'ok', '', '2018-12-10 16:49:43'),
(286, 2, 1, 215, 'Emcee ', 'ok', '', '2018-12-10 16:49:43'),
(287, 2, 1, 216, 'Candy/Dessert Buffet ', 'ok', '', '2018-12-10 16:49:43'),
(288, 2, 1, 217, 'Chocolate fountain station', 'ok', '', '2018-12-10 16:49:43'),
(289, 2, 1, 218, '15 varities of sweets Jars rentals', 'ok', '', '2018-12-10 16:49:43'),
(290, 2, 1, 219, 'Table setup Invitation ', 'ok', '', '2018-12-10 16:49:43'),
(291, 2, 1, 220, 'Souvenir Makeup (Bride,Parents) ', 'ok', '', '2018-12-10 16:49:43'),
(292, 2, 1, 221, 'Photo/Video Prenup shoot ', 'ok', '', '2018-12-10 16:49:43'),
(293, 2, 1, 222, 'Signature frame Projector ', 'ok', '', '2018-12-10 16:49:43'),
(294, 2, 1, 223, 'Magnetic Album Photo Gallery On the day Coordination With professional Emcee Entourage Flowers', 'ok', '', '2018-12-10 16:49:43'),
(295, 2, 1, 224, 'Bridal Car Flower', 'ok', '', '2018-12-10 16:49:43'),
(296, 2, 1, 225, 'Bridal Car', 'ok', '', '2018-12-10 16:49:43'),
(297, 2, 1, 226, 'Doves Wine ', 'ok', '', '2018-12-10 16:49:43'),
(298, 2, 1, 227, 'Rice ', 'ok', '', '2018-12-10 16:49:43'),
(299, 2, 1, 228, 'Pasta ', 'ok', '', '2018-12-10 16:49:43'),
(300, 2, 1, 229, 'Iced tea ', 'ok', '', '2018-12-10 16:49:43'),
(301, 2, 1, 230, 'Pica- pica ', 'ok', '', '2018-12-10 16:49:43'),
(302, 2, 1, 231, 'Freebie: Couch for bride & groom', 'ok', '', '2018-12-10 16:49:43'),
(303, 2, 5, 151, 'Chairs with ribbon ', 'ok', '', '2018-12-10 23:19:26'),
(304, 2, 5, 152, 'cover plates ', 'ok', '', '2018-12-10 23:19:26'),
(305, 2, 5, 153, 'spoon& fork ', 'ok', '', '2018-12-10 23:19:27'),
(306, 2, 5, 154, '100glass', 'ok', '', '2018-12-10 23:19:27'),
(307, 2, 5, 155, 'saucer', 'ok', '', '2018-12-10 23:19:27'),
(308, 2, 5, 156, 'dessert spoon pitcher ', 'ok', '', '2018-12-10 23:19:27'),
(309, 2, 5, 157, 'round table', 'ok', '', '2018-12-10 23:19:27'),
(310, 2, 5, 158, 'Long table', 'ok', '', '2018-12-10 23:19:27'),
(311, 2, 5, 159, 'square table', 'ok', '', '2018-12-10 23:19:27'),
(312, 2, 5, 160, 'Waterjag', 'ok', '', '2018-12-10 23:19:27'),
(313, 2, 5, 161, 'food warmer', 'ok', '', '2018-12-10 23:19:27'),
(314, 2, 5, 162, 'serving spoon ', 'ok', '', '2018-12-10 23:19:27'),
(315, 2, 5, 163, 'Dessert bowl ', 'ok', '', '2018-12-10 23:19:27'),
(316, 2, 5, 164, 'Curtain setup ', 'ok', '', '2018-12-10 23:19:27'),
(317, 2, 5, 165, 'Table settings ', 'ok', '', '2018-12-10 23:19:27'),
(318, 2, 5, 166, 'Red carpet ', 'ok', '', '2018-12-10 23:19:27'),
(319, 2, 5, 167, 'Couch Plat form ', 'ok', '', '2018-12-10 23:19:27'),
(320, 2, 5, 168, 'Thematic backdrop ', 'ok', '', '2018-12-10 23:19:27'),
(321, 2, 5, 169, 'Centerpieces ', 'ok', '', '2018-12-10 23:19:27'),
(322, 2, 5, 170, 'Rice ', 'ok', '', '2018-12-10 23:19:28'),
(323, 2, 5, 171, 'Pasta ', 'ok', '', '2018-12-10 23:19:28'),
(324, 2, 5, 172, 'Iced tea ', 'ok', '', '2018-12-10 23:19:28'),
(325, 2, 5, 173, 'Candy Buffet Cake- 2 layers Clown with magician', 'ok', '', '2018-12-10 23:19:28'),
(326, 2, 5, 174, '30pcs lootbags ', 'ok', '', '2018-12-10 23:19:28'),
(327, 2, 5, 175, 'Pabitin ', 'ok', '', '2018-12-10 23:19:28'),
(328, 2, 5, 176, '30pcs invitation', 'ok', '', '2018-12-10 23:19:28'),
(329, 2, 7, 259, 'Signature frame Projector ', 'ok', '', '2018-12-10 23:19:50'),
(330, 2, 7, 260, 'Photo/Video Prenup shoot ', 'ok', '', '2018-12-10 23:19:50'),
(331, 2, 7, 261, 'Souvenir Makeup (Bride,Parents) ', 'ok', '', '2018-12-10 23:19:50'),
(332, 2, 7, 262, 'Table setup Invitation ', 'ok', '', '2018-12-10 23:19:50'),
(333, 2, 7, 263, 'Emcee ', 'ok', '', '2018-12-10 23:19:50'),
(334, 2, 7, 264, 'Lights & Sounds', 'ok', '', '2018-12-10 23:19:50'),
(335, 2, 7, 265, '2layer fondant cake ', 'ok', '', '2018-12-10 23:19:50');

-- --------------------------------------------------------

--
-- Table structure for table `packageincluded`
--

CREATE TABLE `packageincluded` (
  `id` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  `package` varchar(255) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packageincluded`
--

INSERT INTO `packageincluded` (`id`, `eventID`, `package`, `status`) VALUES
(70, 11, 'asd', 'ok'),
(71, 11, 'zxc', 'ok'),
(72, 11, '123', 'ok'),
(82, 11, ' zxczxc', 'ok'),
(90, 11, 'agadoo', 'ok'),
(91, 11, 'doo doo', 'ok'),
(92, 11, 'push pineapple', 'ok'),
(93, 11, 'shake the tree', 'ok'),
(94, 11, 'agadoo doo doo doo', 'ok'),
(95, 12, 'kok', 'ok'),
(96, 12, 'loko', 'ok'),
(97, 12, 'awu', 'ok'),
(98, 3, 'thematic backdrop venue', 'ok'),
(99, 3, 'Entrace Design Venue', 'ok'),
(100, 3, ' Styling Complete Table Setting with table number', 'ok'),
(101, 3, 'Dressed Banquet', 'ok'),
(102, 3, 'Tables with cloth table and napkins', 'ok'),
(103, 3, 'Curtain Arrangement Professionally', 'ok'),
(104, 3, 'Trained Staffs in uniform', 'ok'),
(105, 3, 'Use of complete sets of Dinnerware, flatware & glassware', 'ok'),
(106, 3, '2layer fondant cake', 'ok'),
(107, 3, 'Lights & Sounds', 'ok'),
(108, 3, 'Emcee', 'ok'),
(109, 3, 'Candy/Dessert Buffet', 'ok'),
(110, 3, 'Chocolate fountain station', 'ok'),
(111, 3, '15 varities of sweets Jars rentals', 'ok'),
(112, 3, 'able setup Invitation', 'ok'),
(113, 3, 'Souvenir Makeup (Bride,Parents)', 'ok'),
(114, 3, 'Photo/Video Prenup shoot', 'ok'),
(115, 3, 'Signature frame Projector', 'ok'),
(116, 3, 'Magnetic Album Photo Gallery On the day Coordination With professional Emcee Entourage Flowers', 'ok'),
(117, 3, 'Bridal Car Flower', 'ok'),
(118, 3, 'Bridal Car', 'ok'),
(119, 3, 'Doves Wine', 'ok'),
(120, 3, 'Rice', 'ok'),
(121, 3, 'Pasta', 'ok'),
(122, 3, 'Pica- pica', 'ok'),
(123, 2, 'Thematic Backdrop Venue ', 'ok'),
(124, 2, 'Entrace Design ', 'ok'),
(125, 2, 'Venue Styling ', 'ok'),
(126, 2, 'Complete Table Setting with table number ', 'ok'),
(127, 2, 'Dressed Banquet ', 'ok'),
(128, 2, 'Tables with cloth table and napkins ', 'ok'),
(129, 2, 'Curtain Arrangement ', 'ok'),
(130, 2, 'Proffesionally Trained Staffs in uniform ', 'ok'),
(131, 2, 'Use of complete sets of Dinnerware, flatware & glassware', 'ok'),
(132, 2, '2layer fondant cake Lights & Sounds ', 'ok'),
(133, 2, 'Emcee ', 'ok'),
(134, 2, 'Candy/Dessert ', 'ok'),
(135, 2, 'Buffet Chocolate fountain station ', 'ok'),
(136, 2, '15 varities of sweets Jars ', 'ok'),
(137, 2, 'rentals Table setup ', 'ok'),
(138, 2, 'Invitation Souvenir', 'ok'),
(139, 2, 'Makeup (Bride,Parents) ', 'ok'),
(140, 2, 'Photo/Video Prenup shoot Signature', 'ok'),
(141, 2, 'frame Projector ', 'ok'),
(142, 2, 'Magnetic Album ', 'ok'),
(143, 2, 'Photo Gallery On the day Coordination With professional Emcee Entourage ', 'ok'),
(144, 2, 'Flowers Bridal Car ', 'ok'),
(145, 2, 'Doves Wine ', 'ok'),
(146, 2, 'Rice', 'ok'),
(147, 2, 'Pasta ', 'ok'),
(148, 2, 'Iced tea', 'ok'),
(149, 2, 'Pica- pica ', 'ok'),
(150, 2, 'Freebie: Couch for bride & groom', 'ok'),
(151, 5, 'Chairs with ribbon ', 'ok'),
(152, 5, 'cover plates ', 'ok'),
(153, 5, 'spoon& fork ', 'ok'),
(154, 5, '100glass', 'ok'),
(155, 5, 'saucer', 'ok'),
(156, 5, 'dessert spoon pitcher ', 'ok'),
(157, 5, 'round table', 'ok'),
(158, 5, 'Long table', 'ok'),
(159, 5, 'square table', 'ok'),
(160, 5, 'Waterjag', 'ok'),
(161, 5, 'food warmer', 'ok'),
(162, 5, 'serving spoon ', 'ok'),
(163, 5, 'Dessert bowl ', 'ok'),
(164, 5, 'Curtain setup ', 'ok'),
(165, 5, 'Table settings ', 'ok'),
(166, 5, 'Red carpet ', 'ok'),
(167, 5, 'Couch Plat form ', 'ok'),
(168, 5, 'Thematic backdrop ', 'ok'),
(169, 5, 'Centerpieces ', 'ok'),
(170, 5, 'Rice ', 'ok'),
(171, 5, 'Pasta ', 'ok'),
(172, 5, 'Iced tea ', 'ok'),
(173, 5, 'Candy Buffet Cake- 2 layers Clown with magician', 'ok'),
(174, 5, '30pcs lootbags ', 'ok'),
(175, 5, 'Pabitin ', 'ok'),
(176, 5, '30pcs invitation', 'ok'),
(177, 4, 'Chairs with ribbon ', 'ok'),
(178, 4, 'cover plates', 'ok'),
(179, 4, 'spoon& fork', 'ok'),
(180, 4, '100glass ', 'ok'),
(181, 4, 'saucer ', 'ok'),
(182, 4, 'dessert spoon ', 'ok'),
(183, 4, 'pitcher ', 'ok'),
(184, 4, 'round table', 'ok'),
(185, 4, 'Long table ', 'ok'),
(186, 4, 'square table ', 'ok'),
(187, 4, 'Waterjag ', 'ok'),
(188, 4, 'food warmer', 'ok'),
(189, 4, 'serving spoon ', 'ok'),
(190, 4, 'Dessert bowl ', 'ok'),
(191, 4, 'Curtain setup ', 'ok'),
(192, 4, 'Table settings ', 'ok'),
(193, 4, 'Red carpet ', 'ok'),
(194, 4, 'Couch Plat form ', 'ok'),
(195, 4, 'Thematic backdrop Centerpieces', 'ok'),
(196, 4, ' Rice', 'ok'),
(197, 4, 'Pasta ', 'ok'),
(198, 4, 'Iced tea ', 'ok'),
(199, 4, 'Candy Buffet ', 'ok'),
(200, 4, 'Cake- 2 layers ', 'ok'),
(201, 4, 'Clown with magician ', 'ok'),
(202, 4, '30pcs lootbags', 'ok'),
(203, 4, 'Pabitin ', 'ok'),
(204, 4, '30pcs invitation', 'ok'),
(205, 1, 'Thematic Backdrop Venue ', 'ok'),
(206, 1, 'Entrace Design Venue ', 'ok'),
(207, 1, 'Styling Complete Table Setting with table number', 'ok'),
(208, 1, 'Dressed Banquet', 'ok'),
(209, 1, 'Tables with cloth table and napkins ', 'ok'),
(210, 1, 'Curtain Arrangement Professionally ', 'ok'),
(211, 1, 'Trained Staffs in uniform ', 'ok'),
(212, 1, 'Use of complete sets of Dinnerware, flatware & glassware', 'ok'),
(213, 1, '2layer fondant cake ', 'ok'),
(214, 1, 'Lights & Sounds', 'ok'),
(215, 1, 'Emcee ', 'ok'),
(216, 1, 'Candy/Dessert Buffet ', 'ok'),
(217, 1, 'Chocolate fountain station', 'ok'),
(218, 1, '15 varities of sweets Jars rentals', 'ok'),
(219, 1, 'Table setup Invitation ', 'ok'),
(220, 1, 'Souvenir Makeup (Bride,Parents) ', 'ok'),
(221, 1, 'Photo/Video Prenup shoot ', 'ok'),
(222, 1, 'Signature frame Projector ', 'ok'),
(223, 1, 'Magnetic Album Photo Gallery On the day Coordination With professional Emcee Entourage Flowers', 'ok'),
(224, 1, 'Bridal Car Flower', 'ok'),
(225, 1, 'Bridal Car', 'ok'),
(226, 1, 'Doves Wine ', 'ok'),
(227, 1, 'Rice ', 'ok'),
(228, 1, 'Pasta ', 'ok'),
(229, 1, 'Iced tea ', 'ok'),
(230, 1, 'Pica- pica ', 'ok'),
(231, 1, 'Freebie: Couch for bride & groom', 'ok'),
(232, 2, 'aw', 'ok'),
(233, 8, 'Entrace Design Venue ', 'ok'),
(234, 8, 'Styling Complete Table Setting with table number ', 'ok'),
(235, 8, 'Lights & Sounds', 'ok'),
(236, 8, 'Candy/Dessert Buffet', 'ok'),
(237, 8, '15 varities of sweets Jars rentals', 'ok'),
(238, 8, 'rice', 'ok'),
(239, 8, 'pasta', 'ok'),
(240, 9, '15 varities of sweets Jars rentals', 'ok'),
(241, 9, 'Lights & Sounds', 'ok'),
(242, 9, 'Curtain Arrangement Professionally ', 'ok'),
(243, 9, 'Photo/Video Prenup shoot ', 'ok'),
(244, 9, 'Bridal Car Flower', 'ok'),
(245, 9, 'Souvenir Makeup (Bride,Parents) ', 'ok'),
(246, 10, 'Thematic Backdrop Venue ', 'ok'),
(247, 10, 'Entrace Design Venue ', 'ok'),
(248, 10, 'Styling Complete Table Setting with table number ', 'ok'),
(249, 10, 'Dressed Banquet', 'ok'),
(250, 10, 'Tables with cloth table and napkins ', 'ok'),
(251, 10, 'Curtain Arrangement Professionally ', 'ok'),
(252, 10, 'Trained Staffs in uniform ', 'ok'),
(253, 6, 'Thematic Backdrop Venue ', 'ok'),
(254, 6, 'Entrace Design Venue', 'ok'),
(255, 6, 'Styling Complete Table Setting with table number ', 'ok'),
(256, 6, 'Dressed Banquet ', 'ok'),
(257, 6, 'Tables with cloth table and napkins ', 'ok'),
(258, 6, 'Curtain Arrangement Professionally ', 'ok'),
(259, 7, 'Signature frame Projector ', 'ok'),
(260, 7, 'Photo/Video Prenup shoot ', 'ok'),
(261, 7, 'Souvenir Makeup (Bride,Parents) ', 'ok'),
(262, 7, 'Table setup Invitation ', 'ok'),
(263, 7, 'Emcee ', 'ok'),
(264, 7, 'Lights & Sounds', 'ok'),
(265, 7, '2layer fondant cake ', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `paymentbreakdown`
--

CREATE TABLE `paymentbreakdown` (
  `id` int(11) NOT NULL,
  `paymentID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `dateUpdated` datetime NOT NULL DEFAULT current_timestamp(),
  `thousand` int(11) NOT NULL DEFAULT 0,
  `five` int(11) NOT NULL DEFAULT 0,
  `two` int(11) NOT NULL DEFAULT 0,
  `onehun` int(11) NOT NULL DEFAULT 0,
  `fifty` int(11) DEFAULT 0,
  `twenty` int(11) NOT NULL DEFAULT 0,
  `ten` int(11) NOT NULL DEFAULT 0,
  `fivepes` int(11) NOT NULL DEFAULT 0,
  `one` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentbreakdown`
--

INSERT INTO `paymentbreakdown` (`id`, `paymentID`, `userID`, `eventID`, `amount`, `dateUpdated`, `thousand`, `five`, `two`, `onehun`, `fifty`, `twenty`, `ten`, `fivepes`, `one`) VALUES
(3, 35, 11, 48, '10000', '2018-12-10 11:34:01', 5, 10, 0, 0, 0, 0, 0, 0, 0),
(5, 37, 11, 48, '10000', '2018-12-10 12:18:35', 9, 2, 0, 0, 0, 0, 0, 0, 0),
(6, 38, 11, 48, '1000', '2018-12-10 12:23:45', 1, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 39, 11, 49, '15000', '2018-12-10 12:31:38', 10, 5, 10, 5, 0, 0, 0, 0, 0),
(8, 40, 11, 49, '100000', '2018-12-10 12:33:59', 91, 10, 10, 20, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `paymenthistory`
--

CREATE TABLE `paymenthistory` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  `price` varchar(20) NOT NULL,
  `totalBalance` varchar(11) NOT NULL,
  `amount` varchar(11) NOT NULL,
  `dateUpdated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymenthistory`
--

INSERT INTO `paymenthistory` (`id`, `userID`, `eventID`, `price`, `totalBalance`, `amount`, `dateUpdated`) VALUES
(25, 2, 43, '30123', '123', '30000', '2018-12-04 00:18:49'),
(26, 2, 43, '30123', '112', '11', '2018-12-04 13:33:54'),
(28, 9, 44, '30123', '29000', '1123', '2018-12-04 13:40:07'),
(29, 2, 43, '30123', '0', '112', '2018-12-04 13:43:05'),
(30, 9, 44, '30123', '17000', '12000', '2018-12-04 13:43:46'),
(31, 2, 45, '30123', '0', '30123', '2018-12-04 14:33:18'),
(32, 7, 46, '280000', '260000', '20000', '2018-12-05 05:05:06'),
(34, 11, 47, '115000', '100000', '15000', '2018-12-10 11:25:33'),
(35, 11, 48, '95000', '85000', '10000', '2018-12-10 11:34:01'),
(36, 11, 48, '95000', '75000', '10000', '2018-12-10 12:14:52'),
(37, 11, 48, '95000', '65000', '10000', '2018-12-10 12:18:34'),
(38, 11, 48, '95000', '64000', '1000', '2018-12-10 12:23:45'),
(39, 11, 49, '115000', '100000', '15000', '2018-12-10 12:31:38'),
(40, 11, 49, '115000', '0', '100000', '2018-12-10 12:33:59');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `messageID` int(11) NOT NULL,
  `repply` longtext NOT NULL,
  `dateSent` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL,
  `statusDelete` varchar(20) NOT NULL,
  `statusAdmin` varchar(20) NOT NULL,
  `statusDeleteAdmin` varchar(11) NOT NULL,
  `class` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`id`, `userID`, `messageID`, `repply`, `dateSent`, `status`, `statusDelete`, `statusAdmin`, `statusDeleteAdmin`, `class`) VALUES
(13, 2, 6, '<p>im good</p>', '2018-12-04 20:42:29', 'seen', 'deleted', '', '', 'admin'),
(14, 2, 6, '<p>ahhh. good to know that :)Â </p>', '2018-12-04 20:43:20', 'seen', 'deleted', 'unseen', '', 'user'),
(15, 2, 6, '<p>ateee</p>', '2018-12-04 20:44:21', 'seen', 'deleted', 'unseen', '', 'user'),
(16, 2, 6, '<p>test</p>', '2018-12-04 20:45:22', 'seen', 'deleted', 'unseen', '', 'user'),
(17, 2, 6, '<p>nako nga</p>', '2018-12-04 20:50:07', 'seen', 'deleted', '', '', 'admin'),
(18, 2, 6, '<p>hehe</p>', '2018-12-04 20:55:04', 'seen', 'deleted', 'unseen', '', 'user'),
(19, 2, 6, '<p>tawa?</p>', '2018-12-04 20:55:33', 'seen', 'deleted', '', '', 'admin'),
(20, 2, 6, '<p>tawa pa</p>', '2018-12-04 20:57:31', 'seen', 'deleted', '', '', 'admin'),
(21, 2, 6, '<p>nye nye</p>', '2018-12-04 21:05:31', 'unseen', 'deleted', '', '', 'admin'),
(22, 2, 7, '<p>asdasdasdzxc</p>', '2018-12-06 10:34:07', 'seen', '', '', '', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `reservedcustomer`
--

CREATE TABLE `reservedcustomer` (
  `id` int(11) NOT NULL,
  `cusID` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  `request` longtext NOT NULL,
  `theme` varchar(100) NOT NULL,
  `venue` varchar(255) NOT NULL,
  `dateReserved` varchar(11) NOT NULL,
  `startTime` varchar(5) NOT NULL,
  `startFor` varchar(5) NOT NULL,
  `endTime` varchar(5) NOT NULL,
  `endTimeFor` varchar(5) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `packs` int(11) NOT NULL,
  `paymentMethod` varchar(20) NOT NULL,
  `paymentStatus` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `dateArchive` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservedcustomer`
--

INSERT INTO `reservedcustomer` (`id`, `cusID`, `eventID`, `request`, `theme`, `venue`, `dateReserved`, `startTime`, `startFor`, `endTime`, `endTimeFor`, `date_created`, `packs`, `paymentMethod`, `paymentStatus`, `status`, `dateArchive`) VALUES
(43, 2, 2, 'asdasd', 'under the sea', '', '12-19-2018', '12', 'am', '12', 'am', '2018-12-04 14:10:43', 113, '', '', 'archive', '2018-12-04'),
(44, 9, 2, 'asdasd', 'under the sea', '', '12-18-2018', '12', 'am', '12', 'am', '2018-12-04 14:10:40', 113, 'direct payment', 'complete', 'archive', '2018-12-04'),
(45, 2, 2, 'asdasd', 'under the sea', '', '12-04-2018', '12', 'am', '12', 'am', '2018-12-10 03:26:07', 113, '', '', 'archive', '2018-12-10'),
(46, 7, 2, 'asdasd', 'flowers', '', '12-17-2018', '12', 'am', '12', 'am', '2018-12-10 03:26:11', 200, 'direct payment', 'complete', 'archive', '2018-12-10'),
(47, 11, 4, 'asdasd', 'under the sea', '', '12-26-2018', '12', 'am', '12', 'am', '2018-12-10 03:31:12', 200, '', '', 'archive', '2018-12-10'),
(48, 11, 3, 'asd asd asd ', 'under the sea', '', '12-19-2018', '12', 'am', '12', 'am', '2018-12-10 04:28:23', 150, '', '', 'archive', '2018-12-10'),
(49, 11, 4, 'asdasdasd', 'under the sea', '', '12-18-2018', '12', 'am', '12', 'am', '2018-12-10 04:31:38', 200, '', '', 'verified', ''),
(50, 2, 4, '', 'under the sea', '', '02-11-2019', '12', 'am', '12', 'am', '2019-02-07 07:39:15', 200, '', '', 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `dateReserved` date NOT NULL,
  `price` varchar(20) NOT NULL,
  `eventCategory` varchar(11) NOT NULL,
  `pax` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `dateReserved`, `price`, `eventCategory`, `pax`) VALUES
(49, '2018-11-01', '75000', 'birthday', 150),
(50, '2018-11-01', '180000', 'birthday', 200),
(51, '2018-01-01', '2000', 'birthday', 300),
(52, '2018-02-01', '2000', 'christening', 100),
(53, '2018-11-01', '75000', 'christening', 300),
(54, '2018-11-01', '180000', 'wedding', 100),
(55, '2018-01-01', '2000', 'others', 100),
(56, '2018-11-01', '75000', 'birthday', 100),
(57, '2018-11-01', '180000', 'wedding', 200),
(58, '2018-01-01', '2000', 'others', 50),
(59, '2018-12-04', '30123', 'christening', 150),
(60, '2018-12-04', '30123', 'wedding', 200),
(61, '2018-12-10', '280000', 'others', 100),
(62, '2018-12-10', '280000', 'wedding', 200),
(63, '2018-12-10', '115000', 'others', 100),
(64, '2018-12-10', '95000', 'birthday', 200);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `testimonials` longtext NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `testimonials`, `occupation`, `img`) VALUES
(1, 'Jay Contreras', 'Excellent! Valet staff were friendly, Front desk very welcoming, highly recommend Fab Events for your next event/function!', 'Kamikazee vocalist', 'jay.jpg'),
(2, 'Diego Loyzaga', 'Clean comfortable rooms and excellent hospitality. Dining here is delightful and I was pleased with the gluten free choices.', 'Actor', 'diego.jpg'),
(3, 'Cristine Reyes', 'Thank you to the Fab Events for sharing with us a piece of paradise. Everything was breathtakingly beautiful!', 'Actress & Model', 'cristine.jpg'),
(9, 'asdasd', 'asdasd', 'zxczxc', 'directPay.png'),
(10, '111', '111', 'asdasdasd', 'bdo2.png');

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE `theme` (
  `id` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  `theme` varchar(20) NOT NULL,
  `sex` varchar(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`id`, `category`, `theme`, `sex`, `img`) VALUES
(1, 'birthday', 'under the sea', 'girls', 'notfound.png'),
(2, 'birthday', 'disney princess', 'girls', 'notfound.png'),
(3, 'birthday', 'Beauty and the Beast', 'girls', 'notfound.png'),
(4, 'birthday', 'Barbie Rockstar', 'girls', 'notfound.png'),
(5, 'birthday', 'Barbie Princess', 'girls', '79507952-bible-lettering-christian-art-at-the-name-of-jesus-every-knee-will-bow.jpg'),
(6, 'birthday', 'Sofia the First', 'girls', 'notfound.png'),
(7, 'birthday', 'Frozen', 'girls', 'notfound.png'),
(8, 'birthday', 'Shopkins', 'girls', 'notfound.png'),
(9, 'birthday', 'Tinkerbel', 'girls', 'notfound.png'),
(10, 'birthday', 'Moana', 'girls', 'notfound.png'),
(11, 'birthday', 'Snow White', 'girls', 'notfound.png'),
(12, 'birthday', 'Rapunzel', 'girls', 'notfound.png'),
(13, 'birthday', 'My Little Pony', 'girls', 'notfound.png'),
(14, 'birthday', 'Unicorn', 'girls', 'notfound.png'),
(15, 'birthday', 'Tropical Flamingo', 'girls', 'notfound.png'),
(16, 'birthday', 'Minnie Mouse', 'girls', 'notfound.png'),
(17, 'birthday', 'Hello Kitty', 'girls', 'notfound.png'),
(18, 'birthday', 'Peppa Pig', 'girls', 'notfound.png'),
(19, 'birthday', 'Winx Club', 'girls', 'notfound.png'),
(20, 'birthday', 'Royal Princess', 'girlds', 'notfound.png'),
(22, 'birthday', 'Justice League', 'boys', 'notfound.png'),
(23, 'birthday', 'Minions', 'boys', 'notfound.png'),
(24, 'birthday', 'Mickey Mouse', 'boys', 'notfound.png'),
(25, 'birthday', 'Batman', 'boys', 'notfound.png'),
(26, 'birthday', 'Superman', 'boys', 'notfound.png'),
(27, 'birthday', 'Spiderman', 'boys', 'notfound.png'),
(28, 'birthday', 'Ironman', 'boys', 'notfound.png'),
(29, 'birthday', 'Spongebob', 'boys', 'notfound.png'),
(30, 'birthday', 'Cars', 'boys', 'notfound.png'),
(31, 'birthday', 'Lego', 'boys', 'notfound.png'),
(32, 'birthday', 'Pilot / Airplane', 'boys', 'notfound.png'),
(33, 'birthday', 'Hot Air Ballon', 'boys', 'notfound.png'),
(34, 'birthday', 'Nautical', 'boys', 'notfound.png'),
(35, 'birthday', 'Superboy', 'boys', 'notfound.png'),
(36, 'birthday', 'Safari', 'boys', 'notfound.png'),
(37, 'birthday', 'Jurassic Park', 'boys', 'notfound.png'),
(38, 'birthday', 'Transformer', 'boys', 'notfound.png'),
(39, 'birthday', 'Baymax', 'boys', 'notfound.png'),
(40, 'birthday', 'Toy Story', 'boys', 'notfound.png'),
(41, 'birthday', 'Sesame Street', 'boys', 'notfound.png'),
(42, 'birthday', 'Pokemon', 'boys', 'notfound.png'),
(43, 'birthday', 'Transportation', 'boys', 'notfound.png'),
(44, 'birthday', 'Thor', 'boys', 'notfound.png'),
(45, 'birthday', 'Captain America', 'boys', 'notfound.png'),
(46, 'debut', 'Bohemian', 'girls', 'notfound.png'),
(47, 'debut', 'Boho-Chic', 'girls', 'notfound.png'),
(48, 'debut', 'Parisian', 'girls', 'notfound.png'),
(49, 'debut', 'Classic / Elegant', 'girls', 'notfound.png'),
(50, 'debut', 'Enchanted Forest', 'girls', 'notfound.png'),
(51, 'debut', 'Alice in Wonderland', 'girls', 'notfound.png'),
(52, 'debut', 'Masquerade', 'girls', 'notfound.png'),
(53, 'debut', 'The Great Gatsby', 'girls', 'notfound.png'),
(54, 'debut', 'Masquerade', 'girls', 'notfound.png'),
(55, 'debut', 'The Great Gatsby', 'girls', 'notfound.png'),
(56, 'debut', 'Under the Stars', 'girls', 'notfound.png'),
(57, 'debut', 'Rockstar', 'girls', 'notfound.png'),
(58, 'debut', 'Carnivals', 'girls', 'notfound.png'),
(59, 'debut', 'Fairy Tale', 'girls', 'notfound.png'),
(60, 'wedding', 'Rustic', '', 'notfound.png'),
(61, 'wedding', 'Enchanted Forest', '', 'notfound.png'),
(62, 'wedding', 'Vintage', '', 'notfound.png'),
(63, 'wedding', 'Whimsical', '', 'notfound.png'),
(64, 'wedding', 'Bohemian', '', 'notfound.png'),
(65, 'wedding', 'Romantic', '', 'notfound.png'),
(66, 'wedding', '', '', 'notfound.png'),
(67, 'wedding', 'Classic', '', 'notfound.png'),
(68, 'wedding', 'Modern Rustic', '', 'notfound.png'),
(69, 'wedding', 'Garden', '', 'notfound.png'),
(70, 'wedding', 'Southern Inspired', '', 'notfound.png'),
(71, 'wedding', 'Formal / Traditional', '', 'notfound.png'),
(72, 'wedding', 'Travel /Adventure', '', 'notfound.png'),
(73, 'wedding', 'Art – Deco', '', 'notfound.png'),
(74, 'wedding', 'Nautical', '', 'notfound.png'),
(75, 'wedding', 'Celestial', '', 'notfound.png'),
(76, 'wedding', 'Tropical', '', 'notfound.png'),
(77, 'wedding', 'Preppy', '', 'notfound.png'),
(78, 'wedding', 'Victorian', '', 'notfound.png'),
(79, 'wedding', 'Cherry Blossom', '', 'notfound.png'),
(80, 'christening', 'flowers', '', 'notfound.png');

-- --------------------------------------------------------

--
-- Table structure for table `uploadedpayment`
--

CREATE TABLE `uploadedpayment` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  `remitance` varchar(50) NOT NULL,
  `trackingNumber` varchar(100) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `receipt` varchar(255) NOT NULL,
  `dateUploaded` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `class` varchar(10) NOT NULL,
  `code` varchar(100) NOT NULL,
  `emailStatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`userID`, `fullName`, `address`, `birthDay`, `contactNumber`, `emailAddress`, `username`, `password`, `class`, `code`, `emailStatus`) VALUES
(1, 'jesson dua paloma', 'batangas lemery', '2018-10-27', '2018-10-31', 'palomajesson@gmail.com', 'admin', '$2y$10$XQSV/.WUoCLl41d4UWlAoOTYbSIx3XD7PjziHebLKPq/6JgK5u1ZW', 'admin', '', 'verified'),
(2, 'Zxc Fgh Asd', 'asdasdasd', '2018-11-24', '09999999999', 'asd@gmail.com', 'koko17', '$2y$10$RtcPbOtsCUrbYmBRYbHt/.w2ie.VW4HcGdaCBVd1erpGMOoqWkwQG', 'user', '', 'verified'),
(3, 'katthy cat cat', '031 batangas lemery', '2018-09-30', '09359385761', 'teamgrape@gmail.com', 'user1', '$2y$10$Wx4lP11v0QFqgsHeO9ucDuJW4wsmHwin6QorNHgQKaUu4LaDw4en2', 'user', '', ''),
(5, 'Jesson Paloma', '', '', '', 'asd@gmail.com', 'asdasd', '$2y$10$2S.nDuOa9dyWFcrsE6mkrOf6Z380bo5Spv8OwZrgjq66z1eQR0MVi', 'user', '', ''),
(6, 'johnny doe', 'teststoreasd', '2018-11-10', '0923456789011', 'doe@gmail.com', 'doe123', '$2y$10$CBSdnQXtHEA0CRS/.KiKmuDYJ214QjzRnuOosVAW8EsWbU29PGnsy', 'user', '', ''),
(7, 'jenny doe', 'zxczxczxczxczxc', '2018-11-10', '09953557785', 'doe@gmail.com.ph', 'user123', '$2y$10$XQSV/.WUoCLl41d4UWlAoOTYbSIx3XD7PjziHebLKPq/6JgK5u1ZW', 'user', '', ''),
(8, 'asdasdasd asdasdasdasd', '', '', '', 'asdasd@gmail.com', 'asdasdasd', '$2y$10$YcWg16Io0bZRmInkvVPY4.Pze7Yapc.XivlRQnuMYYBMFimHTifGy', 'user', '', ''),
(9, 'Jesson Paloma', '031 amadeo cavite', '2018-12-15', '09953557785', 'asdsd@gmail.com', 'jesson', '$2y$10$rFGSYQXSxN/44YbFOs1eX.ns1mLfvR/WQei9xJJ6dFIaYG/HnMoc6', 'user', '', ''),
(10, 'Jesson Paloma', '', '', '', 'askdjakjdl@gmail.com', 'asdjaklsdjak', '$2y$10$JXxnwjBF4JtZCsFRtT2LfuO.rdxJWOkaiLFdbUKT4LDwSOIyOgmy6', 'user', '', ''),
(11, 'test test', '34234234asd asd asd asd', '', '09953557785', 'test@gmail.com', 'test123', '$2y$10$DCMl1k1DsP2qgt.aq3QByOtVkGWIk6lbH2G7SKb/s5lnkCMR1oe2u', 'user', '', ''),
(12, 'test test', '324234234234324', '', '09953557785', 'test123@gmail.com', 'test1234', '$2y$10$TKVv4blMZiMWcUYX3YXK4ucObTOZF27oMfM1tdGPEuq8ehz5rQDNm', 'user', '', ''),
(13, 'Jesson Paloma', 'aksdjlaksjdlkasdjlkasd', '', '09953557785', 't@gmail.com', 'test12345', '$2y$10$XPu8T84TcIhOFIObArNQCO2vydmOu46ObUjdiBfFv/Q11UTfUkyka', 'user', '', ''),
(14, 'Jesson Paloma', '', '', '', 'jesspaloma@gmail.com', 'jessonpaloma', '$2y$10$9XAalTRwbEQqmJaSdoMnjuiq4/FXv0v6sr7hDWRHSPSYx8czPpXrO', 'user', '7e2cc017263973a', ''),
(15, 'Jesson Paloma', '', '', '', 'jesspaloma30@gmail.com', 'jessonpaloma', '$2y$10$Bz49tw3ncyeGD01H1H49Q.lMgJxO/VmOHd9v5TaAuzybo2WpsiGKm', 'user', 'a165dcc74c26206', ''),
(16, 'asdasd asdasd', '', '', '', '23432@gmail.com', 'asdasdasd', '$2y$10$MMqMBOeYMknMbfa3.v/h1.40UE7W0szr0mRsuiIsCUiod7vWuJwmq', 'user', '8f372c4d016339d', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientmessage`
--
ALTER TABLE `clientmessage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientmessages`
--
ALTER TABLE `clientmessages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `completedevents`
--
ALTER TABLE `completedevents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `completedeventsimg`
--
ALTER TABLE `completedeventsimg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foodchoice`
--
ALTER TABLE `foodchoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menuID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packagechoices`
--
ALTER TABLE `packagechoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packageincluded`
--
ALTER TABLE `packageincluded`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentbreakdown`
--
ALTER TABLE `paymentbreakdown`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymenthistory`
--
ALTER TABLE `paymenthistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploadedpayment`
--
ALTER TABLE `uploadedpayment`
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
-- AUTO_INCREMENT for table `clientmessage`
--
ALTER TABLE `clientmessage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clientmessages`
--
ALTER TABLE `clientmessages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `completedevents`
--
ALTER TABLE `completedevents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `completedeventsimg`
--
ALTER TABLE `completedeventsimg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `foodchoice`
--
ALTER TABLE `foodchoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packagechoices`
--
ALTER TABLE `packagechoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=336;

--
-- AUTO_INCREMENT for table `packageincluded`
--
ALTER TABLE `packageincluded`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;

--
-- AUTO_INCREMENT for table `paymentbreakdown`
--
ALTER TABLE `paymentbreakdown`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `paymenthistory`
--
ALTER TABLE `paymenthistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `reservedcustomer`
--
ALTER TABLE `reservedcustomer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `theme`
--
ALTER TABLE `theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `uploadedpayment`
--
ALTER TABLE `uploadedpayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

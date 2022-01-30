-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 11, 2020 at 11:22 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ioangras_randomizers`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `nrcrt` int(11) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`nrcrt`, `name`) VALUES
(1, 'Popular'),
(2, 'Creatures'),
(3, 'Odd'),
(4, 'People'),
(5, 'World'),
(6, 'Vocabulary'),
(7, 'Games'),
(8, 'Manufacturers'),
(9, 'Characters'),
(10, 'Time');

-- --------------------------------------------------------

--
-- Table structure for table `double_randomizer`
--

CREATE TABLE `double_randomizer` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `dbtable` varchar(128) NOT NULL,
  `class_nr` int(11) NOT NULL,
  `class_name` varchar(128) NOT NULL,
  `path` varchar(128) NOT NULL,
  `h2_1` varchar(128) DEFAULT NULL,
  `after_otherexpl` varchar(1000) DEFAULT NULL,
  `before_otherexpl` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `double_randomizer`
--

INSERT INTO `double_randomizer` (`id`, `title`, `dbtable`, `class_nr`, `class_name`, `path`, `h2_1`, `after_otherexpl`, `before_otherexpl`) VALUES
(1, 'Random Country (by continent)', 'countries', 7, 'continent', 'randomizer-double.php?id=1', 'Random country from ', '&nbsp;&nbsp; We added <b>Antarctica</b> too, even though there are no countries in it. If you select it, it will be the only value that generates as a country, but <span style=\"text-decoration:underline\">Antarctica is not a country</span> !', '<a href=\"http://192.168.1.4/randomeverything/randomizer-simple.php?id=2\" style=\"color:#fd4503; text-decoration:underline;\">Random Country Worldwide</a>'),
(2, 'Random Mountain (by elevation)', 'mountains', 9, 'elevation', 'randomizer-double.php?id=2', 'Random mountain by the elevation: ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `randomizers_all`
--

CREATE TABLE `randomizers_all` (
  `nrcrt` int(11) NOT NULL,
  `title_name` varchar(128) NOT NULL,
  `category` varchar(128) NOT NULL,
  `small_description` varchar(1000) NOT NULL,
  `type` varchar(128) NOT NULL,
  `path` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `randomizers_all`
--

INSERT INTO `randomizers_all` (`nrcrt`, `title_name`, `category`, `small_description`, `type`, `path`) VALUES
(1, 'Custom List Randomizer', 'Popular', 'Build your own \"to randomize\" list and get a randomized result from it.', 'custom', 'customrand.php'),
(2, 'Random Number Generator', 'Popular', 'Obtain a random integer/ float number from a specific interval or generate an entire list of values.', 'custom', 'numbers.php'),
(3, 'Random Color Picker', 'Popular', 'Get a totally random color with our HEX code generator.', 'custom', 'color.php'),
(4, 'Random Animal Generator', 'Creatures', 'The worst way to pick your pet, but the best way to make a successful Biology project.', 'simple', 'randomizer-simple.php?id=1'),
(5, 'Random Country', 'World', 'Pick your next vacation destination when you are low on ideas.', 'simple', 'randomizer-simple.php?id=2'),
(6, 'Random English Word Generator', 'Vocabulary', 'Pretty obvious..', 'simple', 'randomizer-simple.php?id=3'),
(7, 'Random Name List Generator', 'People', 'Best way to choose the next name for your next \"stalk account\".', 'custom', 'random-names.php'),
(8, 'Random Boy Name Generator', 'People', '...1000 ways to name a spider using boy names.', 'simple', 'randomizer-simple.php?id=5'),
(9, 'Random Pokemon', 'Characters', 'Gotta catch \'em all !', 'simple', 'randomizer-simple.php?id=6'),
(10, 'Random Emoji Generator', 'Odd', 'Start any conversation with a cool (or not that cool &#128540;) emoji generated here!', 'simple', 'randomizer-simple.php?id=7'),
(11, 'Random Car Manufacturer', 'Manufacturers', 'Use this randomizer so you can finally decide on your next car brand.', 'simple', 'randomizer-simple.php?id=8'),
(12, 'Random 3x3 Rubiks Cube Pattern', 'Games', 'So you finally learnt how to solve a Rubik\'s Cube. Why don\'t you try one of the randomly generated patterns here ?', 'simple', 'randomizer-simple.php?id=9'),
(13, 'Random Country (by continent)', 'World', 'Get a random country from a selected continent.', 'double', 'randomizer-double.php?id=1'),
(14, 'Random Continent', 'World', ' ', 'simple', 'randomizer-simple.php?id=10'),
(15, 'Random Ocean', 'World', ' ', 'simple', 'randomizer-simple.php?id=11'),
(16, 'Coin Flip', 'Games', 'You may not have a coin to flip close to you, but we are here at your service !', 'custom', 'coin-flip.php'),
(17, 'Random Clock Time', 'Time', 'If you don\'t know when to wake up tomorrow, just generate an hour here and hope you will get enough sleep', 'custom', 'clock-time.php'),
(18, 'Random Language', 'Vocabulary', 'If you can\'t decide on the 10th language to learn next, why don\'t you try your luck ?', 'simple', 'randomizer-simple.php?id=12'),
(19, 'Random Team Picker', 'Popular', 'Insert each member and the number of teams and let us fairly pick each team.', 'custom', 'team-picker.php'),
(20, 'Random Reptile', 'Creatures', 'Which is going to be your next tetrapod pet ?', 'simple', 'randomizer-simple.php?id=13'),
(21, 'Random Girl Name Generator', 'People', 'Have the chance to name all the 1000 ants in your collection with a different girl name.', 'simple', 'randomizer-simple.php?id=4'),
(22, 'Random Mountain', 'World', 'If you can\'t choose your next mountaineering destination, we got you covered! You may be lucky enough to get the 0.6 meters (2ft) mountain.', 'simple', 'randomizer-simple.php?id=14'),
(23, 'Random Mountain (by elevation)', 'World', 'Do you have a passion for mountaineering ? Get your next random destination !', 'double', 'randomizer-double.php?id=2'),
(24, 'Random Marvel Comics Hero', 'Characters', 'Think you are a fan of Marvel Comics ? Try to see how many characters do you know !', 'simple', 'randomizer-simple.php?id=15'),
(25, 'Random Cat Name', 'Creatures', 'You wasted all your name ideas for your cat ? Try some of the randomly generated names here!', 'simple', 'randomizer-simple.php?id=16'),
(26, 'Random Dog Name', 'Creatures', 'You got a new puppy and can\'t decide for a name ? We got you covered !', 'simple', 'randomizer-simple.php?id=17'),
(27, 'Random Email Generator', 'Popular', 'You need a list of randomly generated email adresses? Generate one here !', 'custom', 'random-emails.php'),
(28, 'Random Dates', 'Time', 'Choose a new birth date for your new imaginary friend', 'custom', 'random-dates.php'),
(29, 'Random Week Day', 'Time', 'You don\'t know when to wash the dishes ? We will decide for you !', 'simple', 'randomizer-simple.php?id=18'),
(30, 'Random Month', 'Time', 'Planning a new vacation but can\'t decide on the time period? A randomly generated month will surely help you decide !', 'simple', 'randomizer-simple.php?id=19'),
(31, 'Random Phone Manufacturer', 'Manufacturers', 'Can\'t decide what phone company to choose next ? Try one from here !', 'simple', 'randomizer-simple.php?id=20');

-- --------------------------------------------------------

--
-- Table structure for table `simple_randomizer`
--

CREATE TABLE `simple_randomizer` (
  `id` int(128) NOT NULL,
  `title` varchar(128) NOT NULL,
  `dbtable` varchar(128) DEFAULT NULL,
  `before_otherexpl` varchar(10000) DEFAULT NULL,
  `after_otherexpl` varchar(50000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simple_randomizer`
--

INSERT INTO `simple_randomizer` (`id`, `title`, `dbtable`, `before_otherexpl`, `after_otherexpl`) VALUES
(1, 'Random Animal Generator', 'animals', '', ''),
(2, 'Random Country', 'countries', NULL, NULL),
(3, 'Random English Word Generator', 'english_words', NULL, 'This generator may feel slow due to the amount of values to randomize from (more than 338.000 words)'),
(4, 'Random Girl Name Generator', 'girl_names', NULL, NULL),
(5, 'Random Boy Name Generator', 'boy_names', NULL, NULL),
(6, 'Random Pokemon', 'pokemon_chars', NULL, NULL),
(7, 'Random Emoji Generator', 'emojis', '<style type=\"text/css\" scoped>\r\n    .output-box { font-size:40px; } \r\n</style>\r\n', NULL),
(8, 'Random Car Manufacturers', 'car_manufacturers_51', NULL, NULL),
(9, 'Random 3x3 Rubiks Cube Pattern', 'patterns_3x3', NULL, NULL),
(10, 'Random Continent', 'continents', NULL, NULL),
(11, 'Random Ocean', 'oceans', NULL, NULL),
(12, 'Random Language', 'languages', NULL, NULL),
(13, 'Random Reptile', 'reptiles', NULL, NULL),
(14, 'Random Mountain', 'mountains', NULL, '<p>&nbsp;&nbsp;Some mountains may have characters that are not visible (e.g á). Please take a minute and tell us that value <a href=\"http://192.168.1.4/randomeverything/contact.php\" class=\"issues-link\">here</a>.</p>'),
(15, 'Random Marvel Comics Hero', 'marvel_heroes', NULL, NULL),
(16, 'Random Cat Name', 'cat_names', NULL, '<p>&nbsp;&nbsp;Both boy and girl names are combined. Some of them may not be suitable for your cat so generate as many as you need until you find the best one !'),
(17, 'Random Dog Name', 'dog_names', NULL, '<p>&nbsp;&nbsp;Both boy and girl names are combined in this generator. Some may not be suitable for your dog, so generate as many as you need until you find the best one !</p>'),
(18, 'Random Week Day', 'week_days', NULL, NULL),
(19, 'Random Month', 'months', NULL, NULL),
(20, 'Random Phone Manufacturer', 'phone_manufacturers', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`nrcrt`);

--
-- Indexes for table `double_randomizer`
--
ALTER TABLE `double_randomizer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `randomizers_all`
--
ALTER TABLE `randomizers_all`
  ADD PRIMARY KEY (`nrcrt`);

--
-- Indexes for table `simple_randomizer`
--
ALTER TABLE `simple_randomizer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `nrcrt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `double_randomizer`
--
ALTER TABLE `double_randomizer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `randomizers_all`
--
ALTER TABLE `randomizers_all`
  MODIFY `nrcrt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `simple_randomizer`
--
ALTER TABLE `simple_randomizer`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

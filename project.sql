-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2022 at 07:37 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_actions`
--

CREATE TABLE `tbl_actions` (
  `res_id` int(11) NOT NULL,
  `act_id` int(11) NOT NULL,
  `action` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_actions`
--

INSERT INTO `tbl_actions` (`res_id`, `act_id`, `action`) VALUES
(1, 1, 'Preheat oven to 350 degrees F (175 degrees C).'),
(1, 2, 'Beat peanut butter, white sugar and brown sugar together in a large bowl with an electric mixer until smooth. Stir egg, vanilla extract, and baking soda into peanut butter mixture; stir in chocolate chips.'),
(1, 3, 'Drop mixture by small rounded spoonfuls onto a baking sheet about 2 inches apart.'),
(1, 4, 'Bake in the preheated oven until cookies are flattened and golden, about 8 minutes.'),
(2, 1, 'Slice each cucumber in 1/4 inch slices and add to a large bowl.'),
(2, 2, 'Add in the sliced red onion (sliced into half moonand toss to combine.'),
(2, 3, 'In a mason jar or small bowl whisk together the apple cider vinegar, water, sugar, salt, and pepper.'),
(2, 4, 'Pour the dressing mixture over the cucumber and onion and toss to fully coat/combine.'),
(2, 5, 'Keep in the fridge until ready to serve.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ingredients`
--

CREATE TABLE `tbl_ingredients` (
  `res_id` int(11) NOT NULL,
  `ing_id` int(11) NOT NULL,
  `ing_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ingredients`
--

INSERT INTO `tbl_ingredients` (`res_id`, `ing_id`, `ing_name`) VALUES
(1, 1, '1 cup peanut butter'),
(1, 2, '½ cup white sugar'),
(1, 3, '⅓ cup packed brown sugar'),
(1, 4, '1 egg'),
(1, 5, '1 teaspoon vanilla extract'),
(1, 6, '½ teaspoon baking soda'),
(1, 7, '½ cup semisweet chocolate chip'),
(2, 1, '2 large cucumbers'),
(2, 2, '1 red onion sliced'),
(2, 3, '1/3 cup apple cider vinegar'),
(2, 4, '1/4 cup water'),
(2, 5, '1 tablespoon sugar'),
(2, 6, '1 teaspoon fine sea salt'),
(2, 7, '1 teaspoon black pepper');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recipes`
--

CREATE TABLE `tbl_recipes` (
  `res_id` int(11) NOT NULL,
  `res_name` varchar(30) NOT NULL,
  `publish_date` date NOT NULL,
  `description` text NOT NULL,
  `author` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_recipes`
--

INSERT INTO `tbl_recipes` (`res_id`, `res_name`, `publish_date`, `description`, `author`) VALUES
(1, 'Peanut Butter Cookies', '2022-05-01', 'This simple, tasty recipe yields 12 to 16 cookies but is so simple that it can be doubled (or tripled!) easily.', 'roei@mail.com'),
(2, 'Cucumber Salad Recipe', '2022-06-02', 'This Cucumber Salad Recipe comes together quickly and with just a few ingredients. A refreshing and tangy side salad it\'s a great accompaniment to chicken, grilled meat, seafood and so much more! Easy Cucumber Onion Salad is a must make for any Summer get together', 'matan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shared_recipes`
--

CREATE TABLE `tbl_shared_recipes` (
  `user_mail` varchar(30) NOT NULL,
  `res_id` int(11) NOT NULL,
  `did_approve` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_shared_recipes`
--

INSERT INTO `tbl_shared_recipes` (`user_mail`, `res_id`, `did_approve`) VALUES
('a@a.com', 2, 1),
('matan417@gmail.com', 2, 1),
('matan@gmail.com', 2, 1),
('roei@mail.com', 1, 1),
('roei@mail.com', 2, 1),
('test@test.com', 1, 0),
('test@test.com', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `mail` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `activation_key` int(4) NOT NULL,
  `isActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`mail`, `password`, `activation_key`, `isActive`) VALUES
('a@a.com', '1111', 6922, 1),
('g@m.com', '1234', 1313, 1),
('il@gmail.com', '1111', 5773, 1),
('matan417@gmail.com', '1234', 6072, 1),
('matan@gmail.com', '1111', 8348, 1),
('roei@mail.com', '1234', 9951, 1),
('test@test.com', '1234', 790, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_actions`
--
ALTER TABLE `tbl_actions`
  ADD PRIMARY KEY (`res_id`,`act_id`);

--
-- Indexes for table `tbl_ingredients`
--
ALTER TABLE `tbl_ingredients`
  ADD PRIMARY KEY (`res_id`,`ing_id`);

--
-- Indexes for table `tbl_recipes`
--
ALTER TABLE `tbl_recipes`
  ADD PRIMARY KEY (`res_id`),
  ADD KEY `owner` (`author`);

--
-- Indexes for table `tbl_shared_recipes`
--
ALTER TABLE `tbl_shared_recipes`
  ADD PRIMARY KEY (`user_mail`,`res_id`),
  ADD KEY `res_id` (`res_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`mail`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_actions`
--
ALTER TABLE `tbl_actions`
  ADD CONSTRAINT `tbl_actions_ibfk_1` FOREIGN KEY (`res_id`) REFERENCES `tbl_recipes` (`res_id`);

--
-- Constraints for table `tbl_ingredients`
--
ALTER TABLE `tbl_ingredients`
  ADD CONSTRAINT `tbl_ingredients_ibfk_1` FOREIGN KEY (`res_id`) REFERENCES `tbl_recipes` (`res_id`);

--
-- Constraints for table `tbl_recipes`
--
ALTER TABLE `tbl_recipes`
  ADD CONSTRAINT `owner` FOREIGN KEY (`author`) REFERENCES `tbl_users` (`mail`);

--
-- Constraints for table `tbl_shared_recipes`
--
ALTER TABLE `tbl_shared_recipes`
  ADD CONSTRAINT `tbl_shared_recipes_ibfk_1` FOREIGN KEY (`res_id`) REFERENCES `tbl_recipes` (`res_id`),
  ADD CONSTRAINT `tbl_shared_recipes_ibfk_2` FOREIGN KEY (`user_mail`) REFERENCES `tbl_users` (`mail`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

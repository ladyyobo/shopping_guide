-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2018 at 08:10 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping_guide`
--

-- --------------------------------------------------------

--
-- Table structure for table `allergy`
--

CREATE TABLE `allergy` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(2, 'tin fish'),
(5, 'biscuit'),
(9, 'drink'),
(11, 'serwah '),
(12, 'milk product '),
(13, 'Cereal Products ');

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE `disease` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `effect`
--

CREATE TABLE `effect` (
  `id` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `type` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `effect`
--

INSERT INTO `effect` (`id`, `description`, `type`) VALUES
(1, '                    gives strong bones and teeth                  ', 'positive'),
(3, 'give energy', 'positive'),
(4, '                                                            could cause obesity                                                      ', 'negative');

-- --------------------------------------------------------

--
-- Table structure for table `nutrient`
--

CREATE TABLE `nutrient` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nutrient`
--

INSERT INTO `nutrient` (`id`, `name`) VALUES
(1, 'Fat'),
(2, 'Cholesterol'),
(3, 'Sodium'),
(4, 'Protein'),
(5, 'CARBOHYDRATE'),
(6, 'FIBRE');

-- --------------------------------------------------------

--
-- Table structure for table `nutritional_value`
--

CREATE TABLE `nutritional_value` (
  `id` int(11) NOT NULL,
  `nutri_id` int(11) DEFAULT NULL,
  `percentage` float DEFAULT NULL,
  `product_id` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nutritional_value`
--

INSERT INTO `nutritional_value` (`id`, `nutri_id`, `percentage`, `product_id`) VALUES
(1, 1, 10, '076677100145'),
(4, 1, 0, '748252545305'),
(5, 2, 20, '748252545305'),
(6, 3, 20, '748252545305'),
(7, 1, 60, '6008155009538'),
(8, 5, 10, '6008155009538'),
(9, 4, 15, '6008155009538'),
(10, 1, 30, '6033000084750'),
(11, 4, 15, '6033000084750'),
(12, 5, 66, '6033000084750');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `manufacturer` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `cat_id`, `manufacturer`, `image`) VALUES
('076677100145', 'Famous Amos', 5, 'UDp', 'img_15882. '),
('4008713700343', 'Corn Flakes', 13, 'Briiggen', 'img_40890.jpg '),
('5000108417200', 'Quaker Oats', 13, 'Walkers Snack Foods Ltd', 'img_94099.jpg '),
('5010029000023', 'Weetabix Original', 13, 'Weetabix Limited', 'img_43553.jpg '),
('6008155009538', 'Yumvita', 13, 'Promasidor', 'img_68181.jpg '),
('6033000084750', 'Cerelac', 13, 'Nestle', 'img_74392.jpg '),
('6034000181142', 'Beta Malt', 9, 'Club', 'img_16222.jpg '),
('748252545305', 'Malta Guinness', 9, 'Malta', 'img_49016.jpg '),
('8935001721338', 'mentos', 1, 'han', '');

-- --------------------------------------------------------

--
-- Table structure for table `product_effect`
--

CREATE TABLE `product_effect` (
  `id` int(11) NOT NULL,
  `product_id` varchar(500) NOT NULL,
  `effect_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_effect`
--

INSERT INTO `product_effect` (`id`, `product_id`, `effect_id`) VALUES
(4, '500213019160', 3);

-- --------------------------------------------------------

--
-- Table structure for table `search`
--

CREATE TABLE `search` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` varchar(500) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `system_user`
--

CREATE TABLE `system_user` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `dob` date DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `height` float DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `user_password` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_user`
--

INSERT INTO `system_user` (`id`, `name`, `dob`, `weight`, `height`, `email`, `user_password`) VALUES
(5, 'Ken', '1997-08-08', 70, 1000, 'klodonu@gmail.com', 'abc '),
(6, 'Serwah', '1996-12-05', 100, 1.7, 'ladyyobo@gmail.com', 'abcd ');

-- --------------------------------------------------------

--
-- Table structure for table `user_allergy`
--

CREATE TABLE `user_allergy` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `allergy_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_allergy`
--

INSERT INTO `user_allergy` (`id`, `user_id`, `allergy_id`) VALUES
(1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_disease`
--

CREATE TABLE `user_disease` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `disease_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_disease`
--

INSERT INTO `user_disease` (`id`, `user_id`, `disease_id`) VALUES
(1, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allergy`
--
ALTER TABLE `allergy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `effect`
--
ALTER TABLE `effect`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nutrient`
--
ALTER TABLE `nutrient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nutritional_value`
--
ALTER TABLE `nutritional_value`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_effect`
--
ALTER TABLE `product_effect`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `search`
--
ALTER TABLE `search`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_user`
--
ALTER TABLE `system_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_allergy`
--
ALTER TABLE `user_allergy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_disease`
--
ALTER TABLE `user_disease`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allergy`
--
ALTER TABLE `allergy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `disease`
--
ALTER TABLE `disease`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `effect`
--
ALTER TABLE `effect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `nutrient`
--
ALTER TABLE `nutrient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `nutritional_value`
--
ALTER TABLE `nutritional_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `product_effect`
--
ALTER TABLE `product_effect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `search`
--
ALTER TABLE `search`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `system_user`
--
ALTER TABLE `system_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_allergy`
--
ALTER TABLE `user_allergy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_disease`
--
ALTER TABLE `user_disease`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

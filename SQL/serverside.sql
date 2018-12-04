-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2018 at 05:48 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serverside`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET ascii NOT NULL,
  `content` varchar(4000) CHARACTER SET ascii NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `title` varchar(200) CHARACTER SET ascii NOT NULL,
  `content` varchar(4000) CHARACTER SET ascii NOT NULL,
  `image` varchar(250) NOT NULL,
  `image_text` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `title`, `content`, `image`, `image_text`, `date`) VALUES
(69, 'hello', 'asdasd', 'new_41490545_293319241465472_6598254490434928640_n.jpg.png', '', '2018-11-26 10:53:30'),
(77, 'Diabetes Diets', '&#60;p&#62;&#60;span style=&#34;color: #695d1e; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px; background-color: #fcf9e3;&#34;&#62;People often believe that diets for diabetics mean it will always be bland without life. Certainly not. In fact diabetes diets are also tastier many people say. The diet for diabetic simply means a diet without high sugar or fats. It can also be tried out by people who are obese at times. Check out the article for more details on diabetics diet.This article covers&#60;/span&#62;&#60;br style=&#34;color: #695d1e; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px; background-color: #fcf9e3;&#34; /&#62;&#60;br style=&#34;color: #695d1e; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px; background-color: #fcf9e3;&#34; /&#62;&#60;span style=&#34;color: #695d1e; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px; background-color: #fcf9e3;&#34;&#62;* Controlling diabetes with diet&#60;/span&#62;&#60;br style=&#34;color: #695d1e; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px; background-color: #fcf9e3;&#34; /&#62;&#60;span style=&#34;color: #695d1e; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px; background-color: #fcf9e3;&#34;&#62;* Diabetes Diet Guidelines&#60;/span&#62;&#60;br style=&#34;color: #695d1e; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px; background-color: #fcf9e3;&#34; /&#62;&#60;span style=&#34;color: #695d1e; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px; background-color: #fcf9e3;&#34;&#62;* Types of Diabetes&#60;/span&#62;&#60;br style=&#34;color: #695d1e; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px; background-color: #fcf9e3;&#34; /&#62;&#60;br style=&#34;color: #695d1e; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px; background-color: #fcf9e3;&#34; /&#62;&#60;span style=&#34;color: #695d1e; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px; background-color: #fcf9e3;&#34;&#62;Controlling diabetes with diet does not have to be difficult. A diet for diabetes can even taste great. It can also force you to make changes in your life that will leave you feeling healthier and more energized. You need to pay strict attention to the food that you eat when you have diabetes and diet guidelines need to be followed. However, this does not mean that your days now need to be filled with boring tasteless food. Many people find that their new diabetes diet plan actually tastes better and is more satisfying that the food they were eating beforehand.&#60;/span&#62;&#60;/p&#62;&#13;&#10;&#60;p style=&#34;margin: 0px; padding: 0px 0px 0px 17px; color: #695d1e; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px; background-color: #fcf9e3;&#34;&#62;&#38;nbsp;&#60;/p&#62;', 'new_Screenshot_3.png.png', '', '2018-11-28 18:36:12'),
(78, 'Diabetes Diet Guidelines', '&#60;p&#62;&#60;span style=&#34;color: #695d1e; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px; background-color: #fcf9e3;&#34;&#62;For people with diabetes, diet and nutrition can play a very big part in keeping their diabetes under control. Firstly, people with diabetes will need to start following a healthy eating plan. This includes following the healthy food pyramid, with lots of fruit and vegetables and carbohydrates, limited meat and dairy products and only a small amount of sugars and fats.&#60;/span&#62;&#60;/p&#62;', 'none', '', '2018-11-28 19:06:38'),
(79, 'hello', '&#60;p&#62;hii&#60;/p&#62;', 'new_41615300_2123549204322383_782987626280910848_n.jpg.png', '', '2018-12-03 19:24:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `roles` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `roles`, `username`, `email`, `password`) VALUES
(34, 'admin', 'jansalceda', 'janpaulo08@hotmail.com', 'a8f5f167f44f4964e6c998dee827110c'),
(43, 'admin', 'jammy', 'jamm@hotmail.com', 'a8f5f167f44f4964e6c998dee827110c'),
(44, 'admin', 'asd', 'asdas@hotmail.com', 'a8f5f167f44f4964e6c998dee827110c'),
(45, 'admin', 'zxc', 'zxczxxc@hotmail.com', 'ecb97ffafc1798cd2f67fcbc37226761'),
(46, 'admin', 'edmon', 'edd@hotmail.com', 'a8f5f167f44f4964e6c998dee827110c'),
(47, 'user', 'justineee', 'justineispogi@pogi.com', 'a8f5f167f44f4964e6c998dee827110c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

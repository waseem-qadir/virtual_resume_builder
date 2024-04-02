-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2024 at 07:31 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `register`
--

-- --------------------------------------------------------

--
-- Table structure for table `dash`
--

CREATE TABLE `dash` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(20) NOT NULL,
  `education` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `objective` varchar(200) NOT NULL,
  `language` varchar(100) NOT NULL,
  `skill` varchar(100) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `hobbies` varchar(100) NOT NULL,
  `linkedin` varchar(50) NOT NULL,
  `instagram` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dash`
--

INSERT INTO `dash` (`id`, `username`, `email`, `phone`, `education`, `address`, `objective`, `language`, `skill`, `experience`, `hobbies`, `linkedin`, `instagram`) VALUES
(1, 'was', 'ww@gmail.com', 1111111111, 'sssssss', 'sdsacdavsdvc', 'ascascasc', 'dddd', 'sadasd', 'sddssdd', 'ascasc', '', ''),
(2, 'was', 'ww@gmail.com', 1111111111, 'wwwwwwwwwww', 'sdasdasd', 'ssssssssssssssssssssssssssssssssss', 'ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', 'sadasd', 'sddssdd', 'ssssssssssssssssssssssssss', '', ''),
(3, 'was', 'ww@gmail.com', 1111111111, 'wwwwwwwwwww', 'sdasdasd', 'ssssssssssssssssssssssssssssssssss', 'ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', 'sadasd', 'sddssdd', 'ssssssssssssssssssssssssss', 'sssssss', 'ssssssssssssssssssssssssssssssssssssssssssssssss'),
(4, 'was', 'ww@gmail.com', 1111111111, 'sadddddddddddddddddddddddddddddddddddddddddddddddd', 'sadcccccccccccccccccc', 'saccccccccccccc', 'ssssssssssss', 'hiebfjnjdsnfinsdkmfkmsdkmcsldvncksdnkvcds', 'sddssdd', 'ssssssssssssssssssssssssss', 'saaaaaa', 'ssssssssssssssssssssssssssssssssssssssssssssssss'),
(5, 'dan', 'ww@gmail.com', 1111111111, 'wwwwwwwwwww', 'wwwwww', 'www', 'ssssssssssss', 'sadasd', 'sddssdd', 'ssss', 'ssss', 'ascascasc'),
(6, 'was', 'ww@gmail.com', 1111111111, 'sadddddddddddddddddddddddddddddddddddddddddddddddd', 'sadcccccccccccccccccc', 'saccccccccccccc', 'ssssssssssss', 'hiebfjnjdsnfinsdkmfkmsdkmcsldvncksdnkvcds', 'sddssdd', 'ssssssssssssssssssssssssss', 'saaaaaa', 'ssssssssssssssssssssssssssssssssssssssssssssssss'),
(7, 'dan', 'ww@gmail.com', 1111111111, 'wwwwwwwwwww', 'sdsdsd', 'sdsdsd', 'dddd', 'sss', 'sddssdd', 'ssss', 'dafcsdfdscfsdf', 'ssss'),
(8, 'waseem', 'ww@gmail.com', 1111111111, 'asdasdasd', 'asdasdcasc', 'sadasdcasc', 'ssssssssssss', 'sss', 'sddssdd', 'aaaaaaa', 'aaaaaaaaa', 'aaaaaaaaaa'),
(9, 'waseem 12', 'ww@gmail.com', 1111111111, 'asdasdasd', 'asdasdcasc', 'sadasdcasc', 'ssssssssssss', 'sss', 'sddssdd', 'aaaaaaa', 'aaaaaaaaa', 'aaaaaaaaaa'),
(10, 'waseem', 'ww@gmail.com', 1111111111, 'asdasdasd', 'asdasdcasc', 'sadasdcasc', 'ssssssssssss', 'sss', 'sddssddsahbdhdh asudbasudbasiudbsacxasd dsd asdas d', 'aaaaaaa', 'aaaaaaaaa', 'aaaaaaaaaa'),
(11, 'waseem', 'ww@gmail.com', 1111111111, 'asdasdasd', 'asdasdcasc', 'sadasdcasc', 'ssssssssssss', 'sss', 'sddssddsahbdhdh asudbasudbasiudbsacxasd dsd asdas duhasduc ashcaushdcuiashcuasohcuashcasuichasc ac a', 'aaaaaaa', 'aaaaaaaaa', 'aaaaaaaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `username`, `email`, `pass`) VALUES
(10, 'was', 'aa@gmail.com', '1234'),
(11, 'dan', 'ww@gmail.com', '1'),
(12, 'zzzz', 'aa@gmail.com', '1111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dash`
--
ALTER TABLE `dash`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dash`
--
ALTER TABLE `dash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 08, 2018 at 10:52 AM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `M102DB2018`
--

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `favorites_id` int(11) NOT NULL,
  `favorites_users_id` int(11) NOT NULL,
  `favorites_movies_id` int(11) NOT NULL,
  `favorites_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movies_id` int(11) NOT NULL,
  `movies_imdbID` int(11) NOT NULL,
  `movies_title` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `movies_genre` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `movies_released` date NOT NULL,
  `movies_rated` int(11) NOT NULL,
  `movies_writer` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `movies_director` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `movies_actors` longtext COLLATE utf8_unicode_ci NOT NULL,
  `movies_runtime` int(11) NOT NULL,
  `movies_plot` longtext COLLATE utf8_unicode_ci NOT NULL,
  `movies_poster` varchar(120) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `users_fname` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `users_lname` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `users_birthday` date NOT NULL,
  `users_gender` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `users_phone` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `users_email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `users_pass` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `users_token` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `users_register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`favorites_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movies_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `favorites_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movies_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

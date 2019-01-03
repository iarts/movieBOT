-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: localhost:3306
-- Χρόνος δημιουργίας: 03 Ιαν 2019 στις 11:29:48
-- Έκδοση διακομιστή: 5.7.24-0ubuntu0.18.04.1
-- Έκδοση PHP: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `M102DB2018`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `favorites`
--

CREATE TABLE `favorites` (
  `favorites_id` int(11) NOT NULL,
  `favorites_users_id` int(11) NOT NULL,
  `favorites_movies_id` int(11) NOT NULL,
  `favorites_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `movies`
--

CREATE TABLE `movies` (
  `movies_id` int(11) NOT NULL,
  `movies_imdbID` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `movies_title` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `movies_genre` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `movies_released` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `movies_rated` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `movies_writer` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `movies_director` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `movies_actors` longtext COLLATE utf8_unicode_ci NOT NULL,
  `movies_runtime` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `movies_plot` longtext COLLATE utf8_unicode_ci NOT NULL,
  `movies_poster` varchar(120) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
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
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`users_id`, `users_fname`, `users_lname`, `users_birthday`, `users_gender`, `users_phone`, `users_email`, `users_pass`, `users_token`, `users_register_date`) VALUES
(8, 'Test', 'User', '2018-11-15', 'm', '2100000000', 'test@test.gr', '123456789', '123456789', '2018-11-13 16:22:54');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`favorites_id`);

--
-- Ευρετήρια για πίνακα `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movies_id`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `favorites`
--
ALTER TABLE `favorites`
  MODIFY `favorites_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT για πίνακα `movies`
--
ALTER TABLE `movies`
  MODIFY `movies_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

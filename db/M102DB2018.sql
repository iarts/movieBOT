-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: localhost:3306
-- Χρόνος δημιουργίας: 13 Ιαν 2019 στις 08:32:16
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

--
-- Άδειασμα δεδομένων του πίνακα `favorites`
--

INSERT INTO `favorites` (`favorites_id`, `favorites_users_id`, `favorites_movies_id`, `favorites_date`) VALUES
(1, 8, 1, '2019-01-03 16:41:33'),
(2, 8, 2, '2019-01-11 15:19:10'),
(3, 8, 3, '2019-01-11 15:19:11');

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

--
-- Άδειασμα δεδομένων του πίνακα `movies`
--

INSERT INTO `movies` (`movies_id`, `movies_imdbID`, `movies_title`, `movies_genre`, `movies_released`, `movies_rated`, `movies_writer`, `movies_director`, `movies_actors`, `movies_runtime`, `movies_plot`, `movies_poster`) VALUES
(1, 'tt0335266', 'Lost in Translation', 'Drama', '03 Oct 2003', 'R', 'Sofia Coppola', 'Sofia Coppola', 'Scarlett Johansson, Bill Murray, Akiko Takeshita, Kazuyoshi Minamimagoe', '102 min', 'A faded movie star and a neglected young woman form an unlikely bond after crossing paths in Tokyo.', 'https://m.media-amazon.com/images/M/MV5BMTI2NDI5ODk4N15BMl5BanBnXkFtZTYwMTI3NTE3._V1_SX300.jpg'),
(2, 'tt0335266', 'Lost in Translation', 'Drama', '03 Oct 2003', 'R', 'Sofia Coppola', 'Sofia Coppola', 'Scarlett Johansson, Bill Murray, Akiko Takeshita, Kazuyoshi Minamimagoe', '102 min', 'A faded movie star and a neglected young woman form an unlikely bond after crossing paths in Tokyo.', 'https://m.media-amazon.com/images/M/MV5BMTI2NDI5ODk4N15BMl5BanBnXkFtZTYwMTI3NTE3._V1_SX300.jpg'),
(3, 'tt2017038', 'All Is Lost', 'Action, Adventure, Drama', '07 Nov 2013', 'PG-13', 'J.C. Chandor', 'J.C. Chandor', 'Robert Redford', '106 min', 'After a collision with a shipping container at sea, a resourceful sailor finds himself, despite all efforts to the contrary, staring his mortality in the face.', 'https://m.media-amazon.com/images/M/MV5BMjI0MzIyMjU1N15BMl5BanBnXkFtZTgwOTk1MjQxMDE@._V1_SX300.jpg');

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
  `users_register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `users_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`users_id`, `users_fname`, `users_lname`, `users_birthday`, `users_gender`, `users_phone`, `users_email`, `users_pass`, `users_token`, `users_register_date`, `users_status`) VALUES
(8, 'Test', 'User', '2018-11-15', 'm', '2100000000', 'c.cheitas@gmail.com', '123456789', '123456789', '2018-11-13 16:22:54', 0);

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
  MODIFY `favorites_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT για πίνακα `movies`
--
ALTER TABLE `movies`
  MODIFY `movies_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

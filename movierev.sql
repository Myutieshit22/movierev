-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 19, 2019 at 12:25 AM
-- Server version: 10.3.14-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movierev`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `movie_fk` int(11) NOT NULL,
  `user_fk` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `movie_fk`, `user_fk`, `comment`, `comment_date`) VALUES
(1, 2, 3, 'Lucu gan filmnya xD', '2019-04-13 06:11:55'),
(2, 2, 4, 'reEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE', '2019-04-13 06:59:47'),
(3, 2, 2, 'd', '2019-04-14 05:25:28'),
(4, 2, 2, 'hehehheheheh', '2019-04-14 05:25:37'),
(5, 2, 2, 'asd', '2019-04-14 05:25:42'),
(6, 2, 2, 'asd', '2019-04-14 05:26:35'),
(7, 2, 2, 'asd', '2019-04-14 05:26:42'),
(8, 2, 2, 'ini komen nya banyak juga ya', '2019-04-14 05:26:51'),
(9, 2, 2, 'delet this', '2019-04-14 05:27:36'),
(10, 2, 2, 'j,,jhmjhghb c ', '2019-04-17 11:18:25');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `genre_id` int(10) NOT NULL,
  `genre` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genre_id`, `genre`) VALUES
(1, 'Action'),
(2, 'Thriller');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movie_id` int(11) NOT NULL,
  `movie_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_imagepath` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_year` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2018',
  `genre_fk` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `movie_title`, `movie_desc`, `movie_imagepath`, `movie_year`, `genre_fk`) VALUES
(1, 'Batman', 'Film Serem hehe xd', '', '2018', 1),
(2, 'Batmobile', 'The Dark Knight of Gotham City begins his war on crime with his first major enemy being the clownishly homicidal Joker.', 'images/batman.jpg', '2018', 1),
(3, 'Bat Masterson', 'bsadkj', '', '2018', NULL),
(4, 'Bat Things', 's', '', '2018', NULL),
(5, 'Bat Hard', '', '', '2018', NULL),
(6, 'Bat TTT', '', '', '2018', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(11) NOT NULL,
  `movie_fk` int(11) NOT NULL,
  `user_fk` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `rating_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rating_id`, `movie_fk`, `user_fk`, `rating`, `rating_timestamp`) VALUES
(1, 2, 4, 3, '2019-04-09 01:29:17'),
(2, 2, 2, 5, '2019-04-09 01:29:36'),
(3, 2, 3, 1, '2019-04-09 01:32:17'),
(4, 2, 3, 1, '2019-04-09 01:33:31'),
(5, 2, 2, 4, '2019-04-15 03:45:59'),
(6, 2, 2, 5, '2019-04-15 03:46:15'),
(7, 2, 2, 5, '2019-04-15 03:46:25'),
(8, 2, 2, 5, '2019-04-15 03:46:37'),
(9, 2, 2, 5, '2019-04-15 03:55:16'),
(10, 2, 2, 5, '2019-04-15 03:55:20'),
(11, 2, 2, 5, '2019-04-15 03:55:22'),
(12, 2, 2, 4, '2019-04-15 03:55:26'),
(13, 2, 2, 5, '2019-04-17 11:18:38'),
(14, 2, 2, 5, '2019-04-17 11:18:52'),
(15, 2, 2, 5, '2019-04-17 11:18:55'),
(16, 2, 2, 5, '2019-04-17 11:18:58'),
(17, 2, 2, 5, '2019-04-17 11:19:01'),
(18, 2, 2, 5, '2019-04-17 11:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_username` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_username`, `user_password`, `user_email`) VALUES
(1, 'testing', 'testing@gmail.com', 'test123123'),
(2, 'testing', 'test123123', 'testing@gmail.com'),
(3, 'John', 'oajisdoiasjdoijsdaoi', 'john@jon.com'),
(4, 'John', 'johnjohn', 'john@dddd.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `movie_fk` (`movie_fk`),
  ADD KEY `user_fk` (`user_fk`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`),
  ADD KEY `genre_id` (`genre_fk`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `user_fk` (`user_fk`),
  ADD KEY `movie_fk` (`movie_fk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`movie_fk`) REFERENCES `movies` (`movie_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_fk`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `genre_id` FOREIGN KEY (`genre_fk`) REFERENCES `genre` (`genre_id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`user_fk`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`movie_fk`) REFERENCES `movies` (`movie_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

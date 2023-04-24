-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 24, 2023 at 03:21 AM
-- Server version: 10.3.38-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.3-4ubuntu2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeigniter_authentication`
--
CREATE DATABASE IF NOT EXISTS `codeigniter_authentication` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `codeigniter_authentication`;

-- --------------------------------------------------------

--
-- Table structure for table `factories`
--

CREATE TABLE `factories` (
  `id` int(9) NOT NULL,
  `name` varchar(31) NOT NULL,
  `uid` varchar(31) NOT NULL,
  `class` varchar(63) NOT NULL,
  `icon` varchar(31) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(15, '2020-02-22-222222', 'Tests\\Support\\Database\\Migrations\\ExampleMigration', 'tests', 'Tests\\Support', 1679271476, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Cory Marleau', 'marleau24@up.edu', 'Test1'),
(2, 'Cory Marleau', 'junk@email.com', 'Test1'),
(3, 'test', 'test@gmail.com', 'Test2'),
(4, 'test', 'test@test.com', 'Test1'),
(5, 'test', 'test2@gmail.com', 'Test5'),
(6, 'Hashed Password', 'hash@password.com', '$2y$10$bwiRJvhj1Hcp3FX/AYGyFucrcI8QW/4b66qzOSXW/BFQKsboojdai'),
(7, 'Cory', 'test3@gmail.com', '$2y$10$1qgMZ.uMLJ1Jt8vUeNcITODo6WPMI884d0U5qTFHXcrAP4laBTqd2'),
(8, 'New User', 'junk@emial.com', '$2y$10$cAUbpdQedMhfKZeWqJESdu9UtaBT99KT2J7pGlbBGAXXhpjH2HYsq'),
(9, 'New Account', 'newaccount@gmail.com', '$2y$10$iWQWhsdp5ZkPsZFVYFIpZ.abIf28YXuZuS6MDRaXB9kTmV6J91soW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `factories`
--
ALTER TABLE `factories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `uid` (`uid`),
  ADD KEY `deleted_at_id` (`deleted_at`,`id`),
  ADD KEY `created_at` (`created_at`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- AUTO_INCREMENT for table `factories`
--
ALTER TABLE `factories`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Database: `Malawi_Bravo_DB`
--
CREATE DATABASE IF NOT EXISTS `Malawi_Bravo_DB` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `Malawi_Bravo_DB`;

-- --------------------------------------------------------

--
-- Table structure for table `Class`
--

CREATE TABLE `Class` (
  `ClassName` varchar(255) NOT NULL,
  `ClassID` bigint(20) NOT NULL,
  `Track` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Class`
--

INSERT INTO `Class` (`ClassName`, `ClassID`, `Track`) VALUES
('MATHEMATICS', 101, 0),
('BIOLOGY', 102, 0),
('LIFE SKILLS/SOCIAL STUDIES', 103, 0),
('BIBLE KNOWLEDGE', 104, 0),
('HISTORY', 105, 0),
('CHEMISTRY', 106, 0),
('CHICHEWA', 107, 0),
('ENGLISH', 108, 0),
('COMPUTER STUDIES', 109, 0),
('GEOGRAPHY', 110, 0),
('AGRICULTURE', 111, 0),
('PHYSICS', 112, 0),
('MATHEMATICS', 201, 0),
('BIOLOGY', 202, 0),
('LIFE SKILLS/SOCIAL STUDIES', 203, 0),
('BIBLE KNOWLEDGE', 204, 0),
('HISTORY', 205, 0),
('CHEMISTRY', 206, 0),
('CHICHEWA', 207, 0),
('ENGLISH', 208, 0),
('COMPUTER STUDIES', 209, 0),
('GEOGRAPHY', 210, 0),
('AGRICULTURE', 211, 0),
('PHYSICS', 212, 0),
('MATHEMATICS', 301, 0),
('BIOLOGY', 302, 0),
('LIFE SKILLS/SOCIAL STUDIES', 303, 0),
('BIBLE KNOWLEDGE', 304, 0),
('HISTORY', 305, 0),
('CHEMISTRY', 306, 0),
('CHICHEWA', 307, 0),
('ENGLISH', 308, 0),
('COMPUTER STUDIES', 309, 0),
('GEOGRAPHY', 310, 0),
('AGRICULTURE', 311, 0),
('PHYSICS', 312, 0),
('MATHEMATICS', 401, 0),
('BIOLOGY', 402, 0),
('LIFE SKILLS/SOCIAL STUDIES', 403, 0),
('BIBLE KNOWLEDGE', 404, 0),
('HISTORY', 405, 0),
('CHEMISTRY', 406, 0),
('CHICHEWA', 407, 0),
('ENGLISH', 408, 0),
('COMPUTER STUDIES', 409, 0),
('GEOGRAPHY', 410, 0),
('AGRICULTURE', 411, 0),
('PHYSICS', 412, 0);

-- --------------------------------------------------------

--
-- Table structure for table `factories`
--

CREATE TABLE `factories` (
  `id` int(9) NOT NULL,
  `name` varchar(31) NOT NULL,
  `uid` varchar(31) NOT NULL,
  `class` varchar(63) NOT NULL,
  `icon` varchar(31) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(10, '2020-02-22-222222', 'Tests\\Support\\Database\\Migrations\\ExampleMigration', 'tests', 'Tests\\Support', 1679604143, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Schedule`
--

CREATE TABLE `Schedule` (
  `StudentID` bigint(20) NOT NULL,
  `ClassID` bigint(20) NOT NULL,
  `Grade` decimal(5,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Schedule`
--

INSERT INTO `Schedule` (`StudentID`, `ClassID`, `Grade`) VALUES
(1234, 108, NULL),
(38492350, 108, NULL),
(1234512345, 108, NULL),
(2400801357, 108, NULL),
(37218937129, 108, NULL),
(47389472983, 108, NULL),
(47844752397, 108, NULL),
(124780325409, 108, NULL),
(1234, 101, '99.999'),
(38492350, 101, '75.000'),
(1234, 103, '65.000'),
(1234, 105, '80.000');

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `StudentID` bigint(20) NOT NULL,
  `ClassStanding` int(11) DEFAULT NULL,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
  `FamilyContact` varchar(255) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `FamilyAddress` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`StudentID`, `ClassStanding`, `FirstName`, `LastName`, `FamilyContact`, `DOB`, `FamilyAddress`) VALUES
(1234, NULL, 'Martin', 'Cenek', 'Paul Cenek', '0000-00-00', 'cenekp@up.edu'),
(38492350, NULL, 'Cory', 'Marleau', 'Dave', '2002-04-13', 'coryjmarleau@gmail.com'),
(1234512345, NULL, 'Cory', 'Marleau', 'James', '2002-04-13', 'coryjmarleau@gmail.com'),
(2400801357, NULL, 'Dylan', 'Price', 'private', '2002-08-26', 'private@yahoo.com'),
(37218937129, NULL, 'yo', 'yea', 'sup', '2002-08-26', 'malawi@gmail.com'),
(47389472983, NULL, 'Reyn', 'Hisamoto', 'a', '2004-01-01', 'hofihjdks@gmail.com'),
(47844752397, NULL, 'test', 'test', 'John Doe', '1999-06-14', 'rundatup@gmail.com'),
(124780325409, NULL, 'Test', 'Test', 'Name', '2002-04-13', 'name@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'aaa', 'aaa@gmail.com', '$2y$10$orC43ETREpObUQL/O2L9tOrMs/si0vkPcVtn3qIPQxqTYXeXroh6a'),
(2, 'Cory', 'test3@gmail.com', '$2y$10$LAhbyAupI8xNBmY5JozQJe7GPnSUkpg8YHqO4DuOidc.UAELSXoiC'),
(3, 'help', 'help@gmail.com', '$2y$10$26/KZgS6Dodk1rdJGhxjNeOmwhGS4ubWKMWfy2Peh7aQUS6EyS9Zm'),
(4, 'Admin', 'achimalemba@gmail.com', '$2y$10$nmWUE.O7GrW6rgHBf0Dw9uEzvtWzlWeUk3Ppo4koosx025idlMxV.'),
(5, 'Martin Cenek', 'cenek@up.edu', '$2y$10$t5QbGkt8Le67jtsyZuOVAeR4fc0ryf9LonCYK5z/AraYewEF9ZE4W');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Class`
--
ALTER TABLE `Class`
  ADD PRIMARY KEY (`ClassID`);

--
-- Indexes for table `factories`
--
ALTER TABLE `factories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `uid` (`uid`),
  ADD KEY `deleted_at_id` (`deleted_at`,`id`),
  ADD KEY `created_at` (`created_at`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Schedule`
--
ALTER TABLE `Schedule`
  ADD KEY `ClassID` (`ClassID`),
  ADD KEY `StudentID` (`StudentID`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`StudentID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `factories`
--
ALTER TABLE `factories`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Schedule`
--
ALTER TABLE `Schedule`
  ADD CONSTRAINT `Schedule_ibfk_1` FOREIGN KEY (`ClassID`) REFERENCES `Class` (`ClassID`),
  ADD CONSTRAINT `Schedule_ibfk_2` FOREIGN KEY (`StudentID`) REFERENCES `Student` (`StudentID`);
--
-- Database: `test_db`
--
CREATE DATABASE IF NOT EXISTS `test_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `test_db`;

-- --------------------------------------------------------

--
-- Table structure for table `test_Class`
--

CREATE TABLE `test_Class` (
  `ClassName` varchar(255) NOT NULL,
  `ClassID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test_Semester_Schedule`
--

CREATE TABLE `test_Semester_Schedule` (
  `ScheduleID` bigint(20) NOT NULL,
  `TranscriptID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test_Semester_Schedule_Class`
--

CREATE TABLE `test_Semester_Schedule_Class` (
  `ScheduleID` bigint(20) NOT NULL,
  `ClassID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test_Student`
--

CREATE TABLE `test_Student` (
  `StudentID` bigint(20) NOT NULL,
  `ClassStanding` int(11) DEFAULT NULL,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test_Transcript`
--

CREATE TABLE `test_Transcript` (
  `TranscriptID` bigint(20) NOT NULL,
  `StudentID` bigint(20) NOT NULL,
  `GPA` float DEFAULT NULL,
  `ClassRanking` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `test_Class`
--
ALTER TABLE `test_Class`
  ADD PRIMARY KEY (`ClassID`);

--
-- Indexes for table `test_Semester_Schedule`
--
ALTER TABLE `test_Semester_Schedule`
  ADD PRIMARY KEY (`ScheduleID`),
  ADD UNIQUE KEY `TranscriptID` (`TranscriptID`);

--
-- Indexes for table `test_Semester_Schedule_Class`
--
ALTER TABLE `test_Semester_Schedule_Class`
  ADD KEY `ClassID` (`ClassID`),
  ADD KEY `ScheduleID` (`ScheduleID`);

--
-- Indexes for table `test_Student`
--
ALTER TABLE `test_Student`
  ADD PRIMARY KEY (`StudentID`);

--
-- Indexes for table `test_Transcript`
--
ALTER TABLE `test_Transcript`
  ADD PRIMARY KEY (`TranscriptID`),
  ADD UNIQUE KEY `StudentID` (`StudentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

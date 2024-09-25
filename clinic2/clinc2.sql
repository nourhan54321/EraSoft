-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2024 at 09:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinc2`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(260) NOT NULL,
  `major_id` int(11) NOT NULL,
  `major` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `image`, `major_id`, `major`) VALUES
(1, 'Dr.AHMED', 'assets/images/01.jpg', 1, '(Pediatrics)'),
(2, 'Dr.MOSTAFA', 'assets/images/02.jpg', 4, '(Ophthalmology)'),
(4, 'Dr.NOAH', 'assets/images/03.jpg', 2, '(Obstetrics and Gynecology)\r\n'),
(5, 'Dr.HEND', 'assets/images/04.jpg', 2, '(Obstetrics and Gynecology)\r\n'),
(6, 'Dr.EDWARD', 'assets/images/05.jpg', 5, '(Dentistry)'),
(7, 'Dr.CHARLES', 'assets/images/06.jpg', 3, '(Dermatology)'),
(8, 'Dr.JASMINE', 'assets/images/07.jpg', 3, '(Dermatology)'),
(9, 'Dr.FARAH', 'assets/images/08.jpg', 4, '(Ophthalmology)'),
(10, 'Dr.NADA', 'assets/images/09.jpg', 1, '(Pediatrics)'),
(11, 'Dr.REDA', 'assets/images/10.jpg', 5, '(Dentistry)'),
(12, 'Dr.TAMER', 'assets/images/11.jpg', 1, '(Pediatrics)'),
(13, 'Dr.JOSEPH', 'assets/images/12.jpg', 3, '(Dermatology)');

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(260) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`id`, `title`, `image`) VALUES
(1, ' (Pediatrics)\r\n', 'assets/images/Pediatrics.jpg'),
(2, ' (Obstetrics and Gynecology)', 'assets/images/Obstetrics and Gynecology.jpg'),
(3, '(Dermatology)', 'assets/images/Dermatology.jpg'),
(4, ' (Ophthalmology)', 'assets/images/Ophthalmology.jpg'),
(5, ' (Dentistry)', 'assets/images/Dentistry.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(260) NOT NULL,
  `subject` varchar(260) NOT NULL,
  `message` varchar(260) NOT NULL,
  `phone` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `subject`, `message`, `phone`) VALUES
(1, 'nada', 'nada.sheta2003@gmail.com', '/lkh;ojh;ojn&#039;lkjmn', 'i;ubpiypg86yg7o;nj', 1207713443);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(260) NOT NULL,
  `password` varchar(260) NOT NULL,
  `phone` int(150) NOT NULL,
  `type` enum('user','admin','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `type`) VALUES
(1, 'nada', 'nada.sheta2003@gmail.com', '0376399409693b195d424841d49698cfd70d67ce', 1207713443, 'user'),
(2, 'nada', 'nada.sheta2003@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1207713443, 'user'),
(3, 'nada', 'nada.sheta2003@gmail.com', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 1207713443, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `major_id` (`major_id`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
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
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `majors`
--
ALTER TABLE `majors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `major_id` FOREIGN KEY (`major_id`) REFERENCES `majors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

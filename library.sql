-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2024 at 03:31 PM
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
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_books`
--

CREATE TABLE `tbl_books` (
  `book_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `author` varchar(100) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `category` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Available',
  `strand` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_books`
--

INSERT INTO `tbl_books` (`book_id`, `title`, `author`, `publisher`, `isbn`, `category`, `status`, `strand`) VALUES
(1, 'The Queen', 'STEM', 'Jomar De Jesus', '978-0446310789', 'Action', 'Borrowed', 'STEM'),
(2, 'The King', 'ABM', 'Jomar De Jesus', '978-0451524935', 'Action', 'Return', 'ABM'),
(3, 'The princes', 'Jomar Basco', 'Jomar De Jesus', '', 'Action', 'Available', 'ICT');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_borrowings`
--

CREATE TABLE `tbl_borrowings` (
  `borrowing_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `borrow_date` date NOT NULL,
  `return_date` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_borrowings`
--

INSERT INTO `tbl_borrowings` (`borrowing_id`, `user_id`, `book_id`, `borrow_date`, `return_date`, `status`) VALUES
(1, 2, 1, '2023-02-01', '2023-02-15', 'Borrowed'),
(2, 3, 2, '2023-03-01', '2023-03-15', 'Return');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL,
  `strand` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `username`, `password`, `name`, `email`, `role`, `strand`) VALUES
(1, 'admin', '123', 'Admin User', 'bascojomar02@gmail.com', 'admin', ''),
(2, 'user', '123', 'User', 'user@gmail.com', 'user', 'STEM'),
(3, 'johnDoe', '123', 'John Doe', 'john@gmail.com', 'user', 'ABM'),
(4, 'meyer', '123', 'meyer', 'meyer@gmail.com', 'user', 'GAS'),
(5, 'zyrus', '123', 'zyrus', 'zyrus@gmail.com', 'user', 'HUMSS'),
(6, 'dan', '123', 'dan', 'dan@gmail.com', 'user', 'ICT'),
(7, 'franze', '123', 'franze', 'franze@gmail.com', 'user', 'AUTOMOTIVE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_books`
--
ALTER TABLE `tbl_books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `tbl_borrowings`
--
ALTER TABLE `tbl_borrowings`
  ADD PRIMARY KEY (`borrowing_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_books`
--
ALTER TABLE `tbl_books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_borrowings`
--
ALTER TABLE `tbl_borrowings`
  MODIFY `borrowing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_borrowings`
--
ALTER TABLE `tbl_borrowings`
  ADD CONSTRAINT `tbl_borrowings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`),
  ADD CONSTRAINT `tbl_borrowings_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `tbl_books` (`book_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

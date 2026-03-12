-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2025 at 03:39 AM
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
-- Database: `db_victory`
--

-- --------------------------------------------------------

--
-- Table structure for table `comms_tbl`
--

CREATE TABLE `comms_tbl` (
  `message_id` int(6) NOT NULL,
  `message_type` varchar(99) NOT NULL DEFAULT 'concerns',
  `message` mediumtext NOT NULL,
  `uid` int(99) NOT NULL,
  `sent_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comms_tbl`
--

INSERT INTO `comms_tbl` (`message_id`, `message_type`, `message`, `uid`, `sent_date`) VALUES
(1, 'concern', '0', 1, '2025-01-04 08:27:24'),
(2, 'suggestion', 'test message', 1, '2025-01-04 08:28:51'),
(3, 'concern', 'testing ulit', 4, '2025-01-04 08:29:54'),
(4, 'suggestion', 'Need to improve', 1, '2025-01-04 08:41:03'),
(5, 'concern', 'Test ', 1, '2025-01-04 08:41:11');

-- --------------------------------------------------------

--
-- Table structure for table `events_tbl`
--

CREATE TABLE `events_tbl` (
  `event_id` int(6) NOT NULL,
  `event_name` varchar(99) NOT NULL,
  `event_description` varchar(9999) NOT NULL,
  `event_img` varchar(999) NOT NULL DEFAULT 'event.png',
  `event_date_start` date NOT NULL,
  `event_time_start` time NOT NULL,
  `event_date_end` date NOT NULL,
  `event_time_end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events_tbl`
--

INSERT INTO `events_tbl` (`event_id`, `event_name`, `event_description`, `event_img`, `event_date_start`, `event_time_start`, `event_date_end`, `event_time_end`) VALUES
(8, 'Christmas', 'Pasko', 'event.png', '2024-12-25', '05:39:00', '2024-12-25', '19:39:00'),
(12, 'New Year', 'new year hahaha', 'bg.png', '2025-01-01', '05:39:00', '2025-01-01', '19:39:00');

-- --------------------------------------------------------

--
-- Table structure for table `programs_tbl`
--

CREATE TABLE `programs_tbl` (
  `program_id` int(6) NOT NULL,
  `program_name` varchar(9999) NOT NULL,
  `program_description` mediumtext NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programs_tbl`
--

INSERT INTO `programs_tbl` (`program_id`, `program_name`, `program_description`, `date_added`) VALUES
(4, 'Community Outreach', 'Servicing our local community.', '2025-01-04 14:20:18');

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `uid` int(6) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `ufname` varchar(25) NOT NULL,
  `ulname` varchar(25) NOT NULL,
  `mi` varchar(2) NOT NULL,
  `email` varchar(60) NOT NULL,
  `address` varchar(250) NOT NULL DEFAULT '---- ---- ---- ----',
  `bio` varchar(999) NOT NULL DEFAULT 'No bio to show.',
  `profile_pic` varchar(999) NOT NULL DEFAULT 'default-user.jpg',
  `usertype` varchar(10) NOT NULL DEFAULT 'user',
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`uid`, `username`, `password`, `ufname`, `ulname`, `mi`, `email`, `address`, `bio`, `profile_pic`, `usertype`, `reg_date`) VALUES
(1, 'jm', 'alvarez', 'John Mark', 'Alvarez', 'P.', 'alvarezjohnmark118@gmail.com', 'Bilibinwang, Agoncillo, Batangas', 'A 3rd Year BS Computer Science student', 'jm1x1.jpg', 'user', '2025-01-04 11:35:45'),
(2, 'admin', 'admin', 'Administrator', 'admin', 'A.', 'admin@email.com', 'Washington, DC', 'Admin', 'default-user.jpg', 'admin', '2025-01-04 07:49:44'),
(4, 'juan', 'juan', 'Juan', 'Delacruz', 'A.', 'test@email.com', '---- ---- ---- ----', 'Ang itinakda', 'default-user.jpg', '', '2025-01-04 07:49:44'),
(5, 'Pedro', 'penduko', 'Pedro', 'Penduko', 'A.', 'test1@email.com', 'Sa puso mo', 'Ako ang itinakda ', 'default-user.jpg', 'user', '2025-01-04 07:49:44'),
(6, 'joyce', 'joyce', 'Joyce', 'Alvarez', 'P.', 'joyce@email.com', '---- ---- ---- ----', 'Jyc', 'default-user.jpg', 'user', '2025-01-04 07:49:44'),
(7, 'jasmine', 'alvarez', 'Jasmine', 'Alvarez', '', 'jasmine@email.com', '---- ---- ---- ----', '', 'default-user.jpg', 'user', '2025-01-04 07:49:44'),
(9, 'jd', 'jd123', 'John', 'Doe', '', 'johndoe@email.com', '---- ---- ---- ----', '', 'default-user.jpg', 'user', '2025-01-04 07:49:44'),
(10, 'tanggol', 'tanggol', 'Tanggol', 'Dimagiba', '', 'tanggol@email.com', '---- ---- ---- ----', '', 'default-user.jpg', 'user', '2025-01-04 07:49:44'),
(11, 'lena', 'lena', 'Lena', 'Mas', 'D.', 'lena@email.com', 'Sa puso mo', 'dawdwada', 'default-user.jpg', 'user', '2025-01-04 07:49:44'),
(12, 'rigor', 'rigor', 'Riggor', 'Bakal', 'D.', 'rigor@email.com', 'Washington, DC', '', 'victory-icon.png', 'user', '2025-01-04 07:49:44'),
(13, 'maris', 'maris', 'Maris', 'Racal', 'C.', 'maris@email.com', 'Washington, DC', 'No bio to show.', 'default-user.jpg', 'admin', '2025-01-04 07:49:44'),
(14, 'balbautog', 'asdfghjkl', 'Christian', 'Mantos', '', 'asdfa@email.com', '---- ---- ---- ----', 'No bio to show.', 'default-user.jpg', 'user', '2025-01-04 07:49:44');

-- --------------------------------------------------------

--
-- Table structure for table `volunteers_tbl`
--

CREATE TABLE `volunteers_tbl` (
  `vid` int(11) NOT NULL,
  `vrole` varchar(20) NOT NULL,
  `vstatus` varchar(20) NOT NULL,
  `vhours` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `volunteers_tbl`
--

INSERT INTO `volunteers_tbl` (`vid`, `vrole`, `vstatus`, `vhours`, `uid`, `reg_date`) VALUES
(1, 'Admin', 'Active', 24, 1, '2024-12-24 11:07:25'),
(2, 'Admin', 'Active', 24, 2, '2024-12-24 11:07:25'),
(4, '', '', 0, 4, '2024-12-24 11:07:25'),
(5, 'Member', 'Inactive', 32, 5, '2024-12-24 11:07:25'),
(7, 'Community Leader', 'Active', 10, 6, '2024-12-24 11:07:25'),
(10, 'Member', 'Inactive', 32, 7, '2024-12-24 11:07:25'),
(12, 'Member', 'Inactive', 32, 9, '2024-12-24 11:07:25'),
(13, 'Member', 'Inactive', 32, 10, '2024-12-24 11:07:25'),
(14, 'Member', 'Inactive', 32, 11, '2024-12-24 11:07:25'),
(15, 'Member', 'Inactive', 32, 12, '2024-12-24 11:07:25'),
(16, 'Member', 'Inactive', 32, 13, '2024-12-25 07:37:53'),
(19, 'Member', 'Inactive', 0, 14, '2025-01-03 04:51:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comms_tbl`
--
ALTER TABLE `comms_tbl`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `events_tbl`
--
ALTER TABLE `events_tbl`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `programs_tbl`
--
ALTER TABLE `programs_tbl`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `volunteers_tbl`
--
ALTER TABLE `volunteers_tbl`
  ADD PRIMARY KEY (`vid`),
  ADD KEY `fk_uid` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comms_tbl`
--
ALTER TABLE `comms_tbl`
  MODIFY `message_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events_tbl`
--
ALTER TABLE `events_tbl`
  MODIFY `event_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `programs_tbl`
--
ALTER TABLE `programs_tbl`
  MODIFY `program_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `uid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `volunteers_tbl`
--
ALTER TABLE `volunteers_tbl`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comms_tbl`
--
ALTER TABLE `comms_tbl`
  ADD CONSTRAINT `comms_tbl_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users_tbl` (`uid`);

--
-- Constraints for table `volunteers_tbl`
--
ALTER TABLE `volunteers_tbl`
  ADD CONSTRAINT `fk_uid` FOREIGN KEY (`uid`) REFERENCES `users_tbl` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

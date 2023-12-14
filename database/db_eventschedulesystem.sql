-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2023 at 07:49 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_eventschedulesystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `event_schedule_data`
--

CREATE TABLE `event_schedule_data` (
  `event_id` bigint(20) NOT NULL,
  `event_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `event_place` varchar(100) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_schedule_data`
--

INSERT INTO `event_schedule_data` (`event_id`, `event_date`, `start_time`, `end_time`, `event_name`, `event_place`, `note`) VALUES
(7, '2023-12-09', '06:00:00', '07:00:00', 'Persiapan Keberangkatan', 'Gedung Multi Purpose', ''),
(8, '2023-12-09', '07:00:00', '08:00:00', 'Keberangkatan', 'Bus', 'Estimasi waktu tempuh perjalanan &plusmn; 1 jam'),
(9, '2023-12-09', '08:00:00', '08:15:00', 'Persiapan Seminar', 'Warung Limasan', ''),
(10, '2023-12-09', '08:15:00', '09:00:00', 'Seminar', 'Warung Limasan', ''),
(11, '2023-12-09', '09:00:00', '09:15:00', 'Persiapan Rafting', 'Start Point', ''),
(12, '2023-12-09', '09:15:00', '12:30:00', 'Rafting', 'Start Point - Finish Point', 'Kembali ke Warung Limasan ketika telah mencapai finish point.'),
(13, '2023-12-09', '12:30:00', '14:00:00', 'Ishoma', 'Warung Limasan', 'Istirahat, sholat, mandi, dan makan'),
(14, '2023-12-09', '14:00:00', '15:00:00', 'Perjalanan Pulang', 'Bus', 'Kembali ke kampus');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` bigint(20) NOT NULL,
  `user_type` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_type`, `username`, `email`, `password`, `phone_number`) VALUES
(1, 1, 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '085123456789'),
(2, 2, 'Event Organizer', 'event@event.com', '4119639092e62c55ea8be348e4d9260d', '085987654321'),
(4, 2, 'Venue', 'venue@venue.com', '4334028162a32a0b1f76076b121e7963', '085321654987');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event_schedule_data`
--
ALTER TABLE `event_schedule_data`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event_schedule_data`
--
ALTER TABLE `event_schedule_data`
  MODIFY `event_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

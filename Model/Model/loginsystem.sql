-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: april 08, 2023 at 01:06 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '39e72990a33f599717106e2b190438e7');

-- --------------------------------------------------------

--
-- Table structure for table `apply_students`
--

CREATE TABLE `apply_students` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `ssc` varchar(50) NOT NULL,
  `sscyear` varchar(50) NOT NULL,
  `hsc` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apply_students`
--

INSERT INTO `apply_students` (`id`, `name`, `ssc`, `sscyear`, `hsc`, `mobile`, `email`) VALUES
(19, 'aungshi', 'sagc', '2015', 'sagc', '01711232798', 'aungshi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE `download` (
  `id` int(50) NOT NULL,
  `heading` varchar(100) NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `download`
--

INSERT INTO `download` (`id`, `heading`, `link`) VALUES
(1, 'Brochure/Flyer (Printable Versions) full version', 'https://www.bracu.ac.bd/sites/default/files/admission/flyer/Admission%20brochure%20%28UG%29_Updated_5%20August21.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(50) NOT NULL,
  `heading` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `heading`, `description`) VALUES
(1, ' Student Assistance Fund (SAF)- Summer 2021 Semester for the Department of Pharmacy- Policy & Proced', 'Brac University acknowledges that students are still facing financial distress due to the continued COVID-19 pandemic. As such the university is providing financial assistance for the Summer 2021 semester similar to the Summer 2020, Fall 2020, and Spring 2021 semesters:'),
(2, ' Additional financial assistance for undergraduate students:', 'Brac University will provide further assistance to undergraduate students who are under particular difficulties due to death, illness or financial distress directly caused by COVID19 in the immediate family/legal guardian/financial sponsor. Successful applicants will get further waiver on the remaining tuition fee (on a case-to-case basis) net of the general 10% waiver which is provided to all students.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `contactno` varchar(11) DEFAULT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `contactno`, `posting_date`) VALUES
(16, 'Leo', 'Messi', 'leomessi@gmail.com', 'Abcd23', '0177234515', '2021-08-31 16:56:09'),
(17, 'Aisharjya ', 'Magfirah', 'aisharjya@gmail.com', 'Aisharjya1', '0171123279', '2021-09-08 08:36:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apply_students`
--
ALTER TABLE `apply_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `apply_students`
--
ALTER TABLE `apply_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `download`
--
ALTER TABLE `download`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
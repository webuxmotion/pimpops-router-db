-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: moe-mysql-app: 3306
-- Generation Time: Sep 28, 2019 at 03:57 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moe_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `cart` text NOT NULL,
  `history` text NOT NULL,
  `role` int(11) NOT NULL,
  `token` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `name`, `lastname`, `cart`, `history`, `role`, `token`) VALUES
(194, 'test2@test.com', '$2y$12$wgHWKTI0cTJmeUuJ/INsaO7Zs5Nu6HAWiFOIXpi2Xs7u8BXQob9cC', 'Andrii', 'Pereverziev', '[]', '[]', 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJpYXQiOjE1Njk2ODEwNzIsImp0aSI6Ik5qTTRNVFl3Tnc9PSIsImlzcyI6Imh0dHA6XC9cL2xvY2FsaG9zdCIsIm5iZiI6MTU2OTY4MTA3MiwiZXhwIjoxNTY5Njg0NjcyLCJkYXRhIjp7InVzZXJJZCI6MTk0fX0.ZHCbDi6iFBb7yQ9DovQOlpqPXQ5EPIHiHjgZLbbItRNDmDS-q4uZMZqP11VK-fQdyVNq9sMqJWQkvPVVyLnLqQ'),
(197, 'test@test.com', '$2y$12$s8q10cot2t1zapqhuF58luw5DZ0.jFeUxpC0WHjE2.R9mKU8Tgaf6', 'Andrii', 'Pereverziev', '[]', '[]', 0, ''),
(198, 'webuxmotion@gmail.com', '$2y$12$vb14vlrhjxjO3blWalD55OrC7Otxb/O7ID.9thN/m.wBWrf4aAU22', 'Andrii', 'Pereverziev', '[]', '[]', 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJpYXQiOjE1Njk2ODQzOTMsImp0aSI6Ik1qQTFNek16TUE9PSIsImlzcyI6Imh0dHA6XC9cL2xvY2FsaG9zdCIsIm5iZiI6MTU2OTY4NDM5MywiZXhwIjoxNTY5Njg0NTEzLCJkYXRhIjp7InVzZXJJZCI6MTk4fX0.NT5I6-Nstw36gFxRV8MoZ5RgNNqh8R2AcwQRw3hoHuIlFvD00r2H1d-ZDIMW0TVOXYYwNWsfHurRhwwlw8Q59Q'),
(205, 'aaa@gmail.com', '$2y$12$Y9VQhER5FTanREjNesL1OeuaP66m1NdNTsPHSLydn5SAS5LSISRRG', 'Andrii', 'Pereverziev', '[]', '[]', 0, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJpYXQiOjE1Njk2ODQ0ODksImp0aSI6Ik5qSXlOemcwTVE9PSIsImlzcyI6Imh0dHA6XC9cL2xvY2FsaG9zdCIsIm5iZiI6MTU2OTY4NDQ4OSwiZXhwIjoxNTY5Njg0NjA5LCJkYXRhIjp7InVzZXJJZCI6MjA1fX0.2l-HddRIemRfAXv0JxrQtgC6x7eeXhgdfKYur6ZMDBBs2nBJQiHwktHYVbz9Ngyqd6BM9AxBiSqpY55fAc9EhQ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

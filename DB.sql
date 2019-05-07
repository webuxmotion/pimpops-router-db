-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 07, 2019 at 02:37 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `php_pimpops_api`
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
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `name`, `lastname`, `cart`, `history`, `role`, `token`) VALUES
(71, 'admin11111@admin.com', '482c811da5d5b4bc6d497ffa98491e38', 'Andrii', 'Pereverziev', '[]', '[]', 1, 'b8d133642282132e93c781cf82187cb1'),
(74, 'admin@admin.com', '482c811da5d5b4bc6d497ffa98491e38', 'Andrii', 'Pereverziev', '[]', '[]', 1, ''),
(77, 'admi1@admin.com', '482c811da5d5b4bc6d497ffa98491e38', 'Andrii', 'Pereverziev', '[]', '[]', 0, ''),
(79, 'a2@admin.com', '482c811da5d5b4bc6d497ffa98491e38', 'Andrii', 'Pereverziev', '[]', '[]', 2, ''),
(87, 'a1@admin.com', '482c811da5d5b4bc6d497ffa98491e38', 'Andrii', 'Pereverziev', '[]', '[]', 2, ''),
(90, 'a1sdf@admin.com', '482c811da5d5b4bc6d497ffa98491e38', 'Andrii', 'Pereverziev', '[]', '[]', 2, ''),
(92, 'a1s@admin.com', '482c811da5d5b4bc6d497ffa98491e38', 'Andrii', 'Pereverziev', '[]', '[]', 2, ''),
(94, 'a1sdsf@admin.com', '482c811da5d5b4bc6d497ffa98491e38', 'Andrii', 'Pereverziev', '[]', '[]', 2, ''),
(121, 'a1ssdfdsf@admin.com', '482c811da5d5b4bc6d497ffa98491e38', 'Andrii', 'Pereverziev', '[]', '[]', 2, ''),
(143, 'a1ssdsf@admin.com', '482c811da5d5b4bc6d497ffa98491e38', 'Andrii', 'Pereverziev', '[]', '[]', 2, ''),
(160, 'a1ssd@admin.com', '482c811da5d5b4bc6d497ffa98491e38', 'Andrii', 'Pereverziev', '[]', '[]', 2, ''),
(173, 'a1ssdd@admin.com', '482c811da5d5b4bc6d497ffa98491e38', 'Andrii', 'Pereverziev', '[]', '[]', 2, ''),
(176, 'addddd@admin.com', '482c811da5d5b4bc6d497ffa98491e38', 'Andrii', 'Pereverziev', '[]', '[]', 4, ''),
(177, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test', 'test', '[]', '[]', 0, ''),
(180, 'tesdt', '57696bbc0604a9504fc454b555448d48', 'test', 'test', '[]', '[]', 0, '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;


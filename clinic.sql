-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2024 at 03:53 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked_doctor`
--

CREATE TABLE `booked_doctor` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `is_compeleted` enum('yes','no') NOT NULL DEFAULT 'no',
  `is_readed` tinyint(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name_doctor` varchar(200) NOT NULL,
  `major_id` int(11) NOT NULL,
  `img_doctor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name_doctor`, `major_id`, `img_doctor`) VALUES
(43, 'Samer', 23, '20241018064213.jpeg'),
(44, 'Thomas', 24, '20241018064300.jpeg'),
(45, 'George', 26, '20241018065313.jpeg'),
(46, 'Tarek', 21, '20241018064604.jpeg'),
(47, 'Sara', 20, '20241018064716.jpeg'),
(48, 'Malek', 22, '20241018064908.jpeg'),
(49, 'John', 25, '20241018065026.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE `major` (
  `id` int(11) NOT NULL,
  `name_major` varchar(200) NOT NULL,
  `img_major` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`id`, `name_major`, `img_major`) VALUES
(20, 'Nursing', '20241018063403.jpg'),
(21, 'Biomedical engineering', '20241018063519.jpg'),
(22, 'Chemistry', '20241018063643.jpg'),
(23, 'Public health', '20241018063737.png'),
(24, 'Human physiology', '20241018063822.jpeg'),
(25, 'Psychology', '20241018063900.png'),
(26, 'Neuroscience', '20241018063945.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `is_readed` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `phone`, `email`, `subject`, `message`, `is_readed`, `created_at`) VALUES
(27, 'Gavin Hendricks', '01203313413', 'palucy@mailinator.com', 'Distinctio Adipisci', 'Qui aut consequatur', 1, '2024-10-17 22:47:47'),
(28, 'Abanob', '01092969883', 'elamriaafurnishings@gmail.com', 'Welcome back', 'The shepice and Reservation are you having to stay in access to your account and Lets to', 1, '2024-10-18 07:58:14'),
(29, 'Kibo Fernandez', '01203313413', 'woruxitu@mailinator.com', 'Molestiae mollitia a', 'Minim sed aliqua Qu', 1, '2024-10-18 16:37:18');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `img_link` text NOT NULL,
  `title_news` varchar(255) NOT NULL,
  `contact_news` text NOT NULL,
  `published` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `img_link`, `title_news`, `contact_news`, `published`, `created_at`) VALUES
(1, 'https://www.svgrepo.com/show/419891/healthcare-hospital-medical-42.svg', 'everything you need is found at VCare.', 'search for a doctor and book an appointment in a hospital, clinic, home visit or even by phone, you can also order medicine or book a surgery askahksuhda ahsckas idaisudahsdiuhas d .dasdasdas asdadad  asdadasd asdasdasd asdadasd asd asda', 1, '2024-10-15 17:24:23'),
(2, 'https://www.svgrepo.com/show/419872/healthcare-hospital-medical-44.svg', 'everything you need is found at VCare.', 'search for a doctor and book an appointment in a hospital, clinic, home visit or even by phone, you can also order medicine or book a surgery.', 1, '2024-10-14 17:24:23'),
(3, 'https://www.svgrepo.com/show/419883/healthcare-hospital-medical-19.svg', 'Location For Our Hospital VCare.', '52 Fouad Galal Street,Ibrahimia, Alexandria,Egypt', 1, '2024-10-16 17:24:23'),
(4, 'https://www.svgrepo.com/show/419871/healthcare-hospital-medical-23.svg', 'everything you need is found at VCare.', 'search for a doctor and book an appointment in a hospital, clinic, home visit or even by phone, you can also order medicine or book a surgery.', 0, '2024-10-17 17:24:23'),
(7, 'https://www.svgrepo.com/show/419872/healthcare-hospital-medical-44.svg', 'Quos aute lorem quis', 'Nisi et ex optio si', 1, '2024-10-17 23:50:59');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(200) NOT NULL,
  `question_img` varchar(255) NOT NULL,
  `question_home` text NOT NULL,
  `question_answer` text NOT NULL,
  `footer_title` text NOT NULL,
  `footer_contact` text NOT NULL,
  `footer_app_title` text NOT NULL,
  `footer_app_contact` text NOT NULL,
  `footer_app_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `question_img`, `question_home`, `question_answer`, `footer_title`, `footer_contact`, `footer_app_title`, `footer_app_contact`, `footer_app_img`) VALUES
(1, 'TEST', '20241018155125.jpg', 'Have a Medical Question', 'Lorem ipsum, dolor sit', 'About Us', 'Lorem ipsum, dolor sit amet', 'download the application now', 'Lorem ipsum dolor sit amet consectetur', '20241018155158.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`) VALUES
(2, 'abanob', '01203313413', 'amakram27@gmail.com', '5c66f6a543ad95a04c96311f0e43ba07'),
(9, 'Vladimir Larsen', '01203313413', 'zabyko@mailinator.com', 'e10adc3949ba59abbe56e057f20f883e'),
(10, 'ahmed', '01203313413', 'a@g.com', 'e10adc3949ba59abbe56e057f20f883e'),
(11, 'May Sheppard', '01203313413', 'jyvez@mailinator.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booked_doctor`
--
ALTER TABLE `booked_doctor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `major_id` (`major_id`);

--
-- Indexes for table `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booked_doctor`
--
ALTER TABLE `booked_doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booked_doctor`
--
ALTER TABLE `booked_doctor`
  ADD CONSTRAINT `booked_doctor_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`major_id`) REFERENCES `major` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

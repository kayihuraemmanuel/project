-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2023 at 09:41 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `system`
--

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `id` int(11) NOT NULL,
  `title` varchar(1024) NOT NULL,
  `description` longtext NOT NULL,
  `submitted_by` int(11) NOT NULL,
  `referred_to_user` int(11) DEFAULT NULL,
  `submitted_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `attachments` varchar(1024) DEFAULT NULL,
  `status` enum('open','pending','closed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`id`, `title`, `description`, `submitted_by`, `referred_to_user`, `submitted_date`, `attachments`, `status`) VALUES
(1, 'KSNDSJ', 'JNSJDSJ\r\n', 4, NULL, '2023-08-15 15:35:20', NULL, 'pending'),
(2, 'KSNDSJ', 'JNSJDSJ\r\n', 4, NULL, '2023-08-13 11:28:48', NULL, 'open'),
(3, 'SNJ', 'JSNDJS', 4, NULL, '2023-08-15 15:43:36', NULL, 'closed'),
(4, 'SNJ', 'JSNDJS', 4, NULL, '2023-08-13 11:37:52', NULL, 'open'),
(5, 'kmak', 'ksmkdsm', 4, NULL, '2023-08-13 11:38:01', NULL, 'open'),
(6, 'kmak', 'ksmkdsm', 4, NULL, '2023-08-13 11:45:16', NULL, 'open'),
(7, 'kmak', 'ksmkdsm', 4, NULL, '2023-08-13 11:45:43', NULL, 'open'),
(9, 'kmak', 'ksmkdsm', 4, NULL, '2023-08-13 11:48:01', '[\"img/issues/profile682496354.jpg\"]', 'open'),
(10, 'kmak', 'ksmkdsm', 4, NULL, '2023-08-13 11:48:22', '[\"img/issues/profile606146473.jpg\"]', 'open'),
(11, 'kmak', 'ksmkdsm', 4, NULL, '2023-08-13 11:48:33', '[\"img/issues/profile266771544.jpg\"]', 'open'),
(12, 'kmak', 'ksmkdsm', 4, NULL, '2023-08-17 07:01:14', '[\"img/issues/profile307813775.jpg\"]', 'pending'),
(13, 'inkakugura', 'kugura', 8, NULL, '2023-08-15 17:15:07', '[\"img/issues/profile2116336181.jpg\"]', 'open'),
(14, 'Helloinka', 'ndaje', 8, NULL, '2023-08-15 17:41:03', '[\"img/issues/profile868331515.jpg\"]', 'pending'),
(15, 'Ruswa', 'barandenganije', 14, NULL, '2023-08-17 07:10:06', '[\"img/issues/profile734067527.pdf\"]', 'closed');

-- --------------------------------------------------------

--
-- Table structure for table `privateagency`
--

CREATE TABLE `privateagency` (
  `PrivateAgency_TIN` varchar(255) NOT NULL,
  `PrivateAgency_Name` varchar(255) DEFAULT NULL,
  `PrivateAgency_Location` varchar(255) DEFAULT NULL,
  `PrivateAgency_Email` varchar(255) DEFAULT NULL,
  `PrivateAgency_Phone` int(11) DEFAULT NULL,
  `PrivateAgency_JoinDate` date DEFAULT NULL,
  `PrivateAgency_Logo` varchar(255) DEFAULT NULL,
  `NewsLetter` tinyint(1) DEFAULT NULL,
  `PrivateAgency_Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `privateagency`
--

INSERT INTO `privateagency` (`PrivateAgency_TIN`, `PrivateAgency_Name`, `PrivateAgency_Location`, `PrivateAgency_Email`, `PrivateAgency_Phone`, `PrivateAgency_JoinDate`, `PrivateAgency_Logo`, `NewsLetter`, `PrivateAgency_Password`) VALUES
('11111', 'TB Giant', 'Kagarama', 'info@tbgiant.tech', 788911527, '2023-08-16', 'profile1308358835.jpg', 1, '$2y$10$sb9vvli/F9RmFBjcbYrrzujMXWVLnYxytjmNqD8jYVYxOkZpS7HOO'),
('111111111', 'jfymyf', 'fnfh', 'bladkayihura@gmail.comz', 29298289, '2023-07-27', 'logo737420802.jpg', 1, '$2y$10$/sMU6VXyrP5hTNkEH7Z3u.Jgz42twHselRwOoMn17HgmNl.3KXP2.'),
('858892', 'jfymyf', 'fnfh', 'bladkayihura@gmail.com', 29298289, '2023-07-27', '', 1, '07884940.'),
('85889200', 'jfymyf', 'fnfhh', 'bladkayihur@gmail.com', 29298289, '0000-00-00', 'logo666977688.jpg', 0, '$2y$10$E11gi.OuQzMUzS60sw3KY.5AjA/YOMTRc5tLOT8DwqYWspeJvXtNq'),
('8588923', 'prime', 'Kagarama', 'kagabo@gmail.com', 292982892, '2023-08-15', 'profile1249672960.jpg', 1, '$2y$10$CknX6CQa5qqJVe9EPpZU4uh0ijVjNGoy.iLMhWcsvrtGwZfUIi9Nm'),
('8588927878', 'jfymyf', 'fnfhh', 'bladkayihurag@gmail.com', 29298289, '2023-07-27', 'logo1044185267.jpg', 1, '$2y$10$AULUb47/vuF5sGsXubbQeu.QE4TEpqaG.00tWlbPdBTC3wvTNJqLe'),
('858892ddd', 'jfymyf', 'fnfh', 'bladkayihura@gmail.comdd', 29298289, '2023-07-27', 'logo1804861026.jpg', 1, '$2y$10$YW/n/tn65E60c3AQEzTSY.mYe3b8EVTkfgSADtT23jC6Plt85QwlS'),
('858892eee', 'jfymyf', 'fnfh', 'bladkayihu@gmail.com', 29298289, '0000-00-00', 'logo501772383.jpg', 1, '$2y$10$fGxS3qSeIIT3jwPIIabUWumpc6EN/WqS8QwypFTGvoAxzZ8vD.h3u'),
('858892fv', 'jfymyf', 'fnfh', 'hubert@devslab.io', 29298289, '2023-07-28', 'logo1464405066.jpg', 0, '$2y$10$XhpkxaqlOjdBzAAvGGtuBuq36os81CDX0M1ZgS.do7gc0ywDQz8CO'),
('858897', 'jfymyf', 'fnfh', 'bladkayihura@gmail.com', 29298289, '2023-07-21', '', 0, 'dcddb75469b4b4875094e14561e573d8'),
('jhgff', 'jfymyf', 'fnfhh', 'bladkayiura@gmail.com', 29298289, '2023-07-28', 'logo860000645.jpg', 1, '$2y$10$8VZlH756gXNYp0HONiiwE.WoEUs8cMZ0idVkREcyJnU7Hy2ti1gXG');

-- --------------------------------------------------------

--
-- Table structure for table `solutions`
--

CREATE TABLE `solutions` (
  `id` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `issue_id` int(11) NOT NULL,
  `submitted_by` int(11) NOT NULL,
  `submitted_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `attachments` varchar(1024) DEFAULT NULL,
  `status` enum('proposal','final') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `solutions`
--

INSERT INTO `solutions` (`id`, `description`, `issue_id`, `submitted_by`, `submitted_date`, `attachments`, `status`) VALUES
(1, 'kdsjndjndj', 1, 6, '2023-08-15 15:32:39', '[]', ''),
(2, 'ksdmsmdskdmksamdksdskmdksdmskdmskdmskds', 1, 6, '2023-08-15 15:35:20', '[]', 'proposal'),
(3, 'This should work', 3, 7, '2023-08-15 15:43:36', '[]', 'final'),
(4, 'hviueahof', 14, 11, '2023-08-15 17:41:03', '[\"img/issues/profile1066993108.jpg\"]', 'proposal');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `residence` varchar(255) DEFAULT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `marital_status` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `identification_number` int(32) DEFAULT NULL,
  `user_type` enum('citizen','private_agency','deputies','ombudsman','admin','government-agency') NOT NULL,
  `joined_date` timestamp NULL DEFAULT current_timestamp(),
  `profile_picture` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `newsletter` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `phone`, `residence`, `place_of_birth`, `date_of_birth`, `marital_status`, `gender`, `identification_number`, `user_type`, `joined_date`, `profile_picture`, `password`, `newsletter`) VALUES
(1, 'jyffy', 'yfmy', 'bladkayihura@gmail.comdddd', 29298289, 'fymf', '0000-00-00', '2023-07-05', 'Single', 'Female', NULL, 'citizen', '2023-07-26 22:00:00', 'logo1229569282.jpg', '$2y$10$ejSe5tNyGe0p5Lvvn9vlr.y/9xMBC96iFjWPoS.YuuKx0iHa5GaqW', 1),
(4, 'System', 'Admin', 'admin@chadiss.com', 784634676, 'Kanombe', 'Kigali', '2023-07-30', 'Married', 'Male', 784894198, 'admin', '2023-08-13 10:54:12', 'profile392465081.jpg', '$2y$10$71.y28zqOcmSqOINRVij5OL.nSDuciQWlZJB07SuNvW3o0Cie3AgK', 1),
(5, 'Nema', 'Uwera', 'neema@chadiss.com', 784634676, 'Niboye', 'Kagarama', '2000-08-07', 'Married', 'Female', 4567890, 'citizen', '2023-08-15 13:39:53', 'profile1145161295.jpg', '$2y$10$t5FV2rLC3ztfP0NMAvVdGekvVCfHda4omWKlzu5V0TFR4qZTJYA4S', 1),
(6, 'kmsdkm', 'kmsdkm', 'deputy@gmail.com', 0, '', '', '0000-00-00', '', '', 0, 'deputies', '2023-08-15 14:28:25', '', '$2y$10$Vd1kownNuA4npJHsic5AweKJzORsfKP4dr9ucvBRCbnFFL/.92b.m', 1),
(7, 'Ombudsman', 'Test', 'ombudsman@chadiss.com', 3567890, '', '', '0000-00-00', '', '', 43567890, 'ombudsman', '2023-08-15 14:31:04', '', '$2y$10$qc5JLCVcXmgGeDHlLzVyr.IBR1bs0pxeHeKCXvctO3rJarQ34GMyG', 1),
(8, 'KAYIHURAee', 'Emmanuelkk', 'kagabo@gmail.com', 2147483647, 'Kagarama', 'Rusizi', '2023-08-14', 'Married', 'Male', 42, 'citizen', '2023-08-15 17:10:43', 'profile934735894.jpg', '$2y$10$YTKmeHV2LoU0JGbq0bTKkuGn3Dg51nZL9r0bwxTmgJJ/DZJNU0DIK', 1),
(9, 'firstdeputy', 'firstdeputy', 'firstdeputy@gmail.com', 2147483647, 'kagarama', 'rusizi', '2023-08-14', 'Married', 'Male', 2147483647, 'citizen', '2023-08-15 17:23:22', 'profile1553824418.jpg', '$2y$10$BrOSmvCEwP2YzNkFHNY6l.kmoBFJR/cbhkH2Ljmvksj2opCj00CvS', 1),
(10, 'seconddeputy', 'seconddeputy', 'seconddeputy@gmail.com', 67467486, '', '', '0000-00-00', '', '', 4267262, 'citizen', '2023-08-15 17:28:06', '', '$2y$10$Auk33PGqzi7fikC8HxFgKugOU4x/bV0ht33jswShEqKm8vIF4mge.', 1),
(11, 'thirddeputy', 'thirddeputy', 'thirddeputy@gmail.com', 732648173, '', '', '0000-00-00', '', '', 2147483647, 'deputies', '2023-08-15 17:37:32', '', '$2y$10$9yuJkeFivfuFcforTRTs3.qpuADhjiWVKJZpLyh0sJvDXKHSgT9I2', 1),
(12, 'firstomba', 'firstomba', 'firstomba@gmail.com', 2147483647, '', '', '0000-00-00', '', '', 777777777, 'ombudsman', '2023-08-15 17:49:15', '', '$2y$10$j/pqN9nHIBjOV6MhQuSQWuMjfAvR1Y6ZI719oC3ivecNKiE11otmC', 1),
(13, 'MINAGRI', 'Agency', 'government@gmail.com', 34567890, '', '', '0000-00-00', '', '', 243567890, 'government-agency', '2023-08-15 18:35:35', '', '$2y$10$x1eK5RxDYB4SuezjxmZDmOVUHaAv.M/VYzXQJPzBNAsPlY54mX5wa', 1),
(14, 'KAYIHURA', 'Emmanuel', 'kayihura.eric@gmail.com', 788494084, 'kagarama', 'Rukara', '1999-12-25', 'Single', 'Male', 2147483647, 'citizen', '2023-08-16 14:53:47', 'profile899921140.jpg', '$2y$10$DnH1/k57jSkffX6N48eSjO8FIPsWIYYublJ3aotcdWTE/AkcrzuCu', 1),
(15, 'firstombudsman', 'firstombudsman', 'firstombudsman@chadiss.com', 784634676, '', '', '0000-00-00', '', '', 2147483647, 'ombudsman', '2023-08-17 07:08:21', '', '$2y$10$fdehx/fKj4fgXYmcZ9PYg.asE55usqLdKk6G87m4gT0230dxS7ilS', 1),
(16, 'Kicukiro', 'District', 'Kicukiro@gmail.com', 784634676, '', '', '0000-00-00', '', '', 2147483647, 'government-agency', '2023-08-17 07:15:32', '', '$2y$10$mA3Gkx2gJe4kX4rFE3Hl0eBzrHudP66NQL8efBU69OCBXXHZiZIcG', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `issue-user` (`submitted_by`),
  ADD KEY `referred_user` (`referred_to_user`);

--
-- Indexes for table `privateagency`
--
ALTER TABLE `privateagency`
  ADD PRIMARY KEY (`PrivateAgency_TIN`);

--
-- Indexes for table `solutions`
--
ALTER TABLE `solutions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `issue-user` (`submitted_by`),
  ADD KEY `solution-issue` (`issue_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `solutions`
--
ALTER TABLE `solutions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `issues`
--
ALTER TABLE `issues`
  ADD CONSTRAINT `issue-user` FOREIGN KEY (`submitted_by`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `referred_user` FOREIGN KEY (`referred_to_user`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `solutions`
--
ALTER TABLE `solutions`
  ADD CONSTRAINT `solution-issue` FOREIGN KEY (`issue_id`) REFERENCES `issues` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2018 at 04:59 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr14_ivan_zykov_bigevents`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_time` datetime NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `date_time`, `description`, `image`, `capacity`, `email`, `phone_number`, `address`, `url`, `type`) VALUES
(1, 'Sound of Wine Main Event \'18', '2018-07-20 15:30:00', 'Im Trab zur Weinmesse! \r\n\r\nSound of Wine kehrt für sein heuriges Main Event ein letztes Mal in die alten Stallungen der Trabrennbahn Krieau ein. Verpass‘ nicht die Chance um Wein, Musik und Lebensfreude in einer außergewöhnlichen Atmosphäre mit alten und neuen Freunden genießen zu können bevor die Stallungen der Abrissbirne und Bulldozern weichen muss.\r\n\r\nDie Grundpfeiler von Sound of Wine sind wie immer Pflichtprogramm: keine Vorurteile, keine Klischees, kein steifes Auftreten, keine hochnäsigen Belehrungen und natürlich mit Deinem Eintritt die Weinverkostung inklusive.\r\n\r\nMit Deinem Besuch tust Du auch Gutes – von jedem Eintritt geht €1 an Dank Dir – Verein zur Unterstützung behinderter Kinder.', 'imgs/sound-of-wine.jpg', 2000, NULL, NULL, '12 Meiereistraße, 1020 Wien', 'https://soundofwine.at/', 'music'),
(2, 'Wanderlust 108 Wien 2018', '2018-09-09 07:30:00', 'Der weltweit einzigartige Mindful Triathlon.\r\nWanderlust 108 bringt deine drei Lieblings-Aktivitäten – Running, Yoga und Meditation – in deine Stadt. Sei Teil des Mindful Movements, der Wanderlust Community.', 'imgs/wanderlust.jpg', 5000, NULL, NULL, 'Georg-Danzer-Steg, 1210 Wien', 'https://wanderlust.com/aut/', 'sport'),
(3, 'Lorem ipsum dolor', '2019-01-01 00:00:00', 'Curabitur in blandit ante. Aliquam eu urna eleifend nunc rhoncus dapibus ac at erat. Pellentesque sed ligula ligula. Praesent velit enim, efficitur non mi non, accumsan pellentesque metus. Sed maximus tempor porta. Mauris accumsan massa nec aliquam lacinia. Aliquam ac augue sit amet elit bibendum varius a sed ex. Suspendisse et facilisis urna. Praesent finibus nunc viverra tellus porttitor ultricies in at mi. Duis accumsan volutpat ipsum, ultrices laoreet risus.', 'imgs/test.png', 200, 'tincidunt dignissim', 'elit pretium nibh malesuada', 'Aliquam mattis enim', 'Pellentesque convallis', 'imperdiet'),
(4, 'test', '2013-01-02 00:00:00', 'Curabitur in blandit ante. Aliquam eu urna eleifend nunc rhoncus dapibus ac at erat. Pellentesque sed ligula ligula. Praesent velit enim, efficitur non mi non, accumsan pellentesque metus. Sed maximus tempor porta. Mauris accumsan massa nec aliquam lacinia. Aliquam ac augue sit amet elit bibendum varius a sed ex. Suspendisse et facilisis urna. Praesent finibus nunc viverra tellus porttitor ultricies in at mi. Duis accumsan volutpat ipsum, ultrices laoreet risus.', 'imgs/test.png', 400, 'tincidunt dignissim', 'elit pretium nibh malesuada', 'Aliquam mattis enim', 'Pellentesque convallis', 'imperdiet'),
(5, 'Clean flat2', '2018-01-05 00:00:00', 'Curabitur in blandit ante. Aliquam eu urna eleifend nunc rhoncus dapibus ac at erat. Pellentesque sed ligula ligula. Praesent velit enim, efficitur non mi non, accumsan pellentesque metus. Sed maximus tempor porta. Mauris accumsan massa nec aliquam lacinia. Aliquam ac augue sit amet elit bibendum varius a sed ex. Suspendisse et facilisis urna. Praesent finibus nunc viverra tellus porttitor ultricies in at mi. Duis accumsan volutpat ipsum, ultrices laoreet risus.', 'imgs/test.png', 300, 'tincidunt dignissim', 'elit pretium nibh malesuada', 'Aliquam mattis enim', 'Pellentesque convallis', 'imperdiet'),
(6, '1 Plan week', '2021-01-01 00:00:00', '1 Curabitur in blandit ante. Aliquam eu urna eleifend nunc rhoncus dapibus ac at erat. Pellentesque sed ligula ligula. Praesent velit enim, efficitur non mi non, accumsan pellentesque metus. Sed maximus tempor porta. Mauris accumsan massa nec aliquam lacinia. Aliquam ac augue sit amet elit bibendum varius a sed ex. Suspendisse et facilisis urna. Praesent finibus nunc viverra tellus porttitor ultricies in at mi. Duis accumsan volutpat ipsum, ultrices laoreet risus.', '1 imgs/test.png', 1500, '1 tincidunt dignissim', '1 elit pretium nibh malesuada', '1 Aliquam mattis enim', '1 Pellentesque convallis', '1 imperdiet');

-- --------------------------------------------------------

--
-- Table structure for table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migration_versions`
--

INSERT INTO `migration_versions` (`version`) VALUES
('20180720130402');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

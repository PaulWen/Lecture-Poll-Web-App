-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 11. Apr 2016 um 09:52
-- Server-Version: 5.6.26
-- PHP-Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `lecture_poll_web_app`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `poll`
--

CREATE TABLE IF NOT EXISTS `poll` (
  `name` varchar(25) COLLATE utf8_bin NOT NULL,
  `teacher_poll_code` varchar(5) COLLATE utf8_bin NOT NULL,
  `student_poll_code` varchar(5) COLLATE utf8_bin NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `poll`
--

INSERT INTO `poll` (`name`, `teacher_poll_code`, `student_poll_code`, `datetime`) VALUES
('Test', 'OxlHD', 'oPkZx', '2016-04-09 12:38:47'),
('as', 'Qp2mz', 'zrtoR', '2016-04-09 12:04:41'),
('as', 'Zi3ZM', 'B4tFq', '2016-04-09 12:08:30'),
('as', 'eMHXM', 'Nlh7R', '2016-04-09 12:06:51'),
('as', 'hMJ4E', '1Saia', '2016-04-09 12:06:27'),
('Try', 'mwRvv', 'JcBYx', '2016-04-09 11:59:12'),
('test', 'tvpSj', 'LW2uX', '2016-04-09 10:43:10');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `student_voting`
--

CREATE TABLE IF NOT EXISTS `student_voting` (
  `student_id` varchar(5) COLLATE utf8_bin NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rating` int(11) NOT NULL,
  `student_poll_code` varchar(5) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `student_voting`
--

INSERT INTO `student_voting` (`student_id`, `datetime`, `rating`, `student_poll_code`) VALUES
('amjL7', '2016-04-09 12:34:57', 0, 'B4tFq'),
('amjL7', '2016-04-09 12:34:59', 0, 'B4tFq'),
('amjL7', '2016-04-09 12:36:16', 1, 'B4tFq'),
('amjL7', '2016-04-09 12:36:18', 1, 'B4tFq'),
('amjL7', '2016-04-09 12:36:19', 1, 'B4tFq'),
('amjL7', '2016-04-09 12:36:20', 1, 'B4tFq');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `poll`
--
ALTER TABLE `poll`
  ADD PRIMARY KEY (`teacher_poll_code`,`student_poll_code`),
  ADD UNIQUE KEY `date_2` (`datetime`);

--
-- Indizes für die Tabelle `student_voting`
--
ALTER TABLE `student_voting`
  ADD PRIMARY KEY (`student_id`,`datetime`),
  ADD UNIQUE KEY `time_2` (`datetime`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

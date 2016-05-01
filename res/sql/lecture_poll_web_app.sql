-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 01. Mai 2016 um 12:49
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
CREATE DATABASE IF NOT EXISTS `lecture_poll_web_app` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `lecture_poll_web_app`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `poll`
--

CREATE TABLE IF NOT EXISTS `poll` (
  `name` varchar(25) COLLATE utf8_bin NOT NULL,
  `closed` tinyint(1) NOT NULL DEFAULT '0',
  `teacher_poll_code` varchar(5) COLLATE utf8_bin NOT NULL,
  `student_poll_code` varchar(5) COLLATE utf8_bin NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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

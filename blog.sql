-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Genereertijd: 10 apr 2016 om 19:29
-- Serverversie: 5.5.47-0ubuntu0.14.04.1
-- PHP-versie: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `blog`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `by` varchar(30) NOT NULL,
  `text` text NOT NULL,
  `posted-on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `posts`
--

INSERT INTO `posts` (`id`, `title`, `by`, `text`, `posted-on`) VALUES
(1, 'test', 'test user', '/jehrkgjklsdhgclkdrhnscdjrhglidsrlkjsafglkjfsgvkljsfgkljvhzklxfjghlsxjfhvxjdfghxkjdfhbdkjsfhbkldjhb,dfbsbdfkjkjnxb nxjn cvknmx,gdfbn xcgn cxbkncvgmbcgl.vhmnyf jb nckjgh  hcbjkcjkbnxgjknkjgxgjkdfnkljsdfhviFSDH', '2016-04-06'),
(2, 'test', 'kaas01\r\n', 'Rik', '0000-00-00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `rank` varchar(2) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

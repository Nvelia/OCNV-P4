-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 12 juil. 2018 à 10:47
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet4`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idPost` int(11) NOT NULL,
  `idCom` int(11) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `commentDate` datetime NOT NULL,
  `reports` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`id`, `name`, `password`) VALUES
(1, 'Jean', '$2y$10$uQtA8ShK/evCuJU12WqPK.SIU/X.OXA8E0af97rbRjeZK8UXkQgei');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `sender` varchar(255) NOT NULL,
  `messageDate` datetime NOT NULL,
  `messageRead` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `topic`, `message`, `sender`, `messageDate`, `messageRead`) VALUES
(1, 'hg jhgj', '<p>y hjhfhgkjh kj khlkjyku jgfh gjhhgrfhg y hjhfhgkjh kj khlkjyku jgfh gjhhgrfhg y hjhfhgkjh kj khlkjyku jgfh gjhhgrfhg y hjhfhgkjh kj khlkjyku jgfh gjhhgrfhg y hjhfhgkjh kj khlkjyku jgfh gjhhgrfhg&nbsp;</p>', 'hf ghdh ', '2018-07-12 12:21:26', 1);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `postDate` datetime NOT NULL,
  `postDateEdit` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `postDate`, `postDateEdit`) VALUES
(1, 'Bienvenue sur le Blog de Jean Forteroche ! ', '<p>Bonjour &agrave; toutes et &agrave; tous et merci de me suivre dans cette nouvelle aventure.</p>\r\n<p>&nbsp;</p>\r\n<p>Apr&egrave;s quelques ouvrages au format papier classique, j\'ai d&eacute;cid&eacute; de me lancer un tout nouveau d&eacute;fi: la cr&eacute;ation d\'un roman num&eacute;rique au format &eacute;pisodique. Certains d\'entre vous se demandent s&ucirc;rement ce que cela signifie, c\'est pourquoi je fais cette courte introduction afin de donner quelques explications.&nbsp;</p>\r\n<p>Mon prochain roman intitul&eacute; \"Billet simple pour l\'Alaska\" sera publi&eacute; &agrave; travers ce blog au rythme d\'un chapitre toutes les deux semaines auquel vous aurez acc&egrave;s librement. Vous pourrez &eacute;galement commenter mes &eacute;crits pour discuter &agrave; propos du chapitre concern&eacute; ou tout simplement partager votre avis. Lorsque tous les chapitres seront publi&eacute;s ici m&ecirc;me, la version papier standard vous attendra dans votre librairie habituelle afin de rejoindre votre biblioth&egrave;que personnelle.</p>\r\n<p>Ce nouveau d&eacute;fi me permet d\'aborder une nouvelle approche de l\'&eacute;criture mais surtout de lire vos r&eacute;actions &agrave; chaud et de vous faire participer &agrave; la phase de cr&eacute;ation de cette nouvelle oeuvre.</p>\r\n<p>Je vous souhaite une tr&egrave;s bonne lecture sur ce blog et j\'esp&egrave;re que vous serez nombreux &agrave; me suivre dans cette nouvelle aventure !</p>\r\n<p>&nbsp;</p>\r\n<p>A tr&egrave;s bient&ocirc;t pour le premier chapitre de \"Billet simple pour l\'Alaska !</p>', '2018-07-12 11:28:41', '2018-07-12 11:28:41');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

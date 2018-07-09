-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 05 juil. 2018 à 17:52
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
) ENGINE=MyISAM AUTO_INCREMENT=94 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `idPost`, `idCom`, `content`, `author`, `commentDate`, `reports`) VALUES
(89, 34, 0, '<p>dsqdj hkqsd qsd&nbsp;</p>', 'Jean', '2018-07-05 17:31:12', 0),
(91, 32, 0, '<p>d qsd qsd qsd qsd&nbsp;</p>', 'dqs dqs dqs', '2018-07-05 17:37:20', 0),
(73, 33, 0, '<p>commentaire test</p>', 'Jean', '2018-06-28 11:45:32', 0),
(90, 34, 0, '<p>&nbsp;h sg sgf nhg gh, f sf&nbsp;</p>', 'Paul', '2018-07-05 17:31:27', 0),
(81, 34, 0, '<p>test 2</p>', 'Pierre', '2018-07-04 11:19:35', 1),
(92, 32, 0, '<p>d qsd qsd qsd qsd&nbsp;</p>', 'dqs dqs dqs', '2018-07-05 17:37:20', 0),
(84, 34, 83, '<p>test</p>', 'test', '2018-07-04 11:29:06', 0),
(85, 34, 82, '<p>aze aze zae aze aze&nbsp;</p>', '2eme test', '2018-07-04 11:38:42', 0),
(86, 34, 0, '<p>fsdjhjkh kjsd k sgfkjhg sjgj hgf</p>', 'Ajout test', '2018-07-04 11:49:11', 1),
(88, 34, 81, '<p><span style=\"font-family: Oswald, sans-serif; font-size: medium; background-color: #d1d1d1;\">hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfd</span></p>', 'long com', '2018-07-04 12:40:52', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `topic`, `message`, `sender`, `messageDate`, `messageRead`) VALUES
(22, 'zae zae ', '<p>ze aze aze&nbsp;</p>', 'zae zae ', '2018-07-05 17:04:09', 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `postDate`, `postDateEdit`) VALUES
(1, 'fdg', 'gdf gdfg df gdfg fdhghg hfgh f g', '2018-06-07 15:26:53', '2018-06-07 15:26:53'),
(2, 'gfg', 'fdg dfg fdg dfgdfg dfgdf gfd gdf g', '2018-06-07 15:27:15', '2018-06-07 15:27:15'),
(33, 'Billet du 28/06/2018', '<p><span style=\"font-family: Oswald, sans-serif; font-size: medium; background-color: #d1d1d1;\">azeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze azazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze</span><span style=\"background-color: #d1d1d1; font-family: Oswald, sans-serif; font-size: medium;\">azeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze azazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze azeazeazeaz eza eaze aze aze aze aze aze aze</span></p>', '2018-06-28 11:15:07', '2018-06-28 11:15:07'),
(32, 'Billet du 27/06', '<p>Test message</p>', '2018-06-27 10:22:14', '2018-06-27 10:22:14'),
(31, 'test du 26/06', '<p>vxcvxnbv n c cbnvb ret gf</p>', '2018-06-26 14:01:50', '2018-06-26 14:01:50'),
(34, 'Nouveau test pour pagination', '<p>hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh hklfdsu uhr hr allosfdhkjh kay jh&nbsp;</p>', '2018-06-29 08:57:01', '2018-07-05 11:57:36');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 29 Août 2023 à 21:28
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cats`
--

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `url` varchar(1000) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL,
  `commentaire` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Contenu de la table `images`
--

INSERT INTO `images` (`id`, `url`, `nom`, `rating`, `commentaire`) VALUES
(1, 'https://www.rd.com/wp-content/uploads/2021/03/GettyImages-140594401-1-scaled.jpg', 'Murder Mittens', 9, 'Excellent form and execution. If I were a bird, I\'d be scared for my life.'),
(2, 'https://th.bing.com/th/id/R.7038575c13cf9970744de5869a1600f8?rik=E3ZoIf8ooSAMJA&pid=ImgRaw&r=0', 'Cool cat', 8, 'Somebody come get this handsome lad before he causes trouble ! Very good cat, but plastic reminds me the planet is dying, so minus points.'),
(3, 'https://th.bing.com/th/id/OIP.iaAakmcA-29NE85IfBJzKgHaEK?pid=ImgDet&rs=1', 'Jackcatt', 3, 'Very cool ! Found it fun until I realise he has no parachute. Very scared for his life.'),
(4, 'https://th.bing.com/th/id/R.b1cc02b34915def65b164bb152be6581?rik=gMFiJkQpRY2LAQ&pid=ImgRaw&r=0', 'George', 10, 'Very handsome, very polite. I want him as a roomate.'),
(5, 'https://th.bing.com/th/id/R.73946735b38c40b52e03f542a9db4bdc?rik=wH55K7lPwYmsgg&riu=http%3a%2f%2f3.bp.blogspot.com%2f-ad9HiZ2LLQo%2fT_2dBrg1NaI%2fAAAAAAAAPgQ%2fXtQC36yicmw%2fs1600%2ffunny-cat-pictures-006-004.jpg&ehk=LEgOkYF5QRRb0GkZuWyLrB41jQM6XERrCmwkRLUVHIQ%3d&risl=&pid=ImgRaw&r=0', 'Miguel', 7, 'Ohhh very nice mustache ! Am jealous :( But wait ... it\'s fake !!! Relieved'),
(13, 'https://i.redd.it/42ah7pbr5it61.jpg', 'Bingus', 10, 'I love Bingus and his lack of fur. Looks like a little Gremlin. very cute.'),
(14, 'https://i.ytimg.com/vi/iT07uuT8v4g/maxresdefault.jpg', 'Cringus', 1, 'Oof, this one stinks bad'),
(15, 'https://i.ytimg.com/vi/iT07uuT8v4g/maxresdefault.jpg', 'Cringus', 1, 'Oof, this one stinks bad'),
(16, 'https://i.redd.it/5029yr0ocx521.jpg', 'Testing kitty', 5, 'Oh no ! He\'s here to fuck some shit up'),
(17, 'https://i.redd.it/5029yr0ocx521.jpg', 'Testing kitty', 5, 'Oh no ! He\'s here to fuck some shit up'),
(18, 'https://th.bing.com/th/id/OIP._4iGZyz93i_G5icvuxxs2gAAAA?pid=ImgDet&amp;rs=1', 'Double kitty', 2, 'Will they duplicate now ?'),
(19, 'https://i.pinimg.com/originals/f7/93/ae/f793aecbb7c6b18b9634e07cd7945f4e.jpg', 'Me when', 10, 'They didn\'t');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

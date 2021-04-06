-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 06 avr. 2021 à 18:53
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `librairie_intelligente`
--

-- --------------------------------------------------------

--
-- Structure de la table `emprunter`
--

DROP TABLE IF EXISTS `emprunter`;
CREATE TABLE IF NOT EXISTS `emprunter` (
  `id_emprunt` int NOT NULL AUTO_INCREMENT,
  `date_emprunt` date NOT NULL,
  `id_client` int NOT NULL,
  `id_livre` int NOT NULL,
  PRIMARY KEY (`id_emprunt`),
  KEY `id_livre` (`id_livre`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `emprunter`
--

INSERT INTO `emprunter` (`id_emprunt`, `date_emprunt`, `id_client`, `id_livre`) VALUES
(1, '2021-03-17', 1, 3),
(2, '2021-03-20', 3, 4),
(3, '2021-03-25', 2, 3),
(4, '2021-03-25', 3, 3),
(5, '2021-03-30', 2, 4),
(6, '2021-03-18', 1, 4),
(7, '2021-03-25', 1, 7),
(8, '2021-03-25', 2, 7),
(9, '2021-03-25', 3, 7),
(10, '2021-03-23', 1, 5),
(11, '2021-03-23', 2, 5),
(12, '2021-03-25', 1, 1),
(13, '2021-03-23', 2, 1),
(14, '2021-03-23', 2, 2),
(15, '2021-03-19', 2, 6);

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

DROP TABLE IF EXISTS `livre`;
CREATE TABLE IF NOT EXISTS `livre` (
  `id_livre` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `auteur` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `annee_edition` date NOT NULL,
  `genre` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `resume` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `categorie` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_livre`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`id_livre`, `titre`, `auteur`, `annee_edition`, `genre`, `resume`, `categorie`) VALUES
(1, 'One Piece', 'Eiichiro Oda', '2000-04-17', 'manga', 'Luffy, un jeune garçon, rêve de devenir le Roi des Pirates en trouvant le One Piece, le trésor ultime rassemblé par Gol D. Roger, le seul pirate à avoir jamais porté le titre de Roi des Pirates. Pour échapper à la noyade, il s\'enferme dans un tonneau et se fait repêcher par un jeune garçon du nom de Kobby.', 'détente'),
(2, 'Naruto', 'Masashi Kishimoto', '1999-03-11', 'manga', ' Naruto est un garçon qui vit à Konoha,il rêve de devenir Hokage. il est détesté de tout le monde, car il a un démon enfermé en lui (Kuybi). Puis, petit à petit, il va se faire des amis, jusqu\'à devenir le héros de son village.', 'détente'),
(3, 'L’assassin qui est en moi', 'Jim Thompson', '2004-02-25', 'policier', 'L’adjoint au shérif Lou Ford semble si charmant et serviable. Il cache pourtant de lourds secrets, entre son passé en prison et ses relations avec le monde de la prostitution', 'reflexion'),
(4, 'Ne le dis à personne', 'Harlan Coben', '1990-09-20', 'policier', 'Un des plus célèbres livres d’Harlan Coben. Le héros vit dans le souvenir de sa femme, assassinée par un serial killer. Un jour, il croit l’apercevoir dans la foule', 'reflexion'),
(5, 'La planète des singes', 'Pierre Boule', '2001-09-04', 'science-fiction', 'Y a-t-il des êtres humains ailleurs que dans notre galaxie ? C\'est la question que se pose Ulysse Mérou, lorsque, de leur vaisseau spatial, ils observent le paysage d\'une planète proche de Bételgeuse: on y aperçoit des villes, des routes curieusement semblables à celle de notre terre. Après s\'y être posés, les trois hommes découvrent que la planète est habitée par des singes.', 'détente'),
(6, 'Cristal qui songe', 'Theodore Sturgeon', '2011-11-30', 'science-fiction', 'Lorsqu\'il est renvoyé de l\'école à l\'âge de huit ans, cela fait déjà plusieurs années que Horty mange des fourmis en cachette.\r\nFuyant alors la demeure de ses parents adoptifs qui le martyrisent, le gamin trouve refuge au sein d\'un cirque ambulant où il devient le partenaire de deux jeunes naines, Zena et Bunny.\r\nMais les personnages les plus extraordinaires du cirque restent son féroce directeur, surnommé le cannibale, et son étrange collection de cris', 'détente'),
(7, 'La Patrouille du temps', 'Poul Anderson', '1960-12-10', 'science-fiction', 'Dans un lointain futur, les descendants des Hommes, les Danéliens, ont découvert le moyen de voyager dans le temps. Mais pour éviter que des pirates mal intentionnés ne changent le cours de l\'histoire, changements qui impliqueraient leur propre non-existence, et donc dans un but essentiellement égoïste mais légitime - de leur point de vue -, ils ont créé la « Patrouille du temps » qui dispose de bureaux et d\'agents à toutes les époques', 'détente'),
(8, 'Ravage', 'René Barjavel', '1972-09-27', 'science-fiction', 'Vous ne savez pas ce qui est arrivé ? Tous les moteurs d\'avions se sont arrêtés hier à la même heure, juste au moment où le courant flanchait partout. Tous ceux qui s\'étaient mis en descente pour atterrir sur la terrasse sont tombés comme une grêle. Vous n\'avez rien entendu, là-dessous ?', 'detente');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int NOT NULL AUTO_INCREMENT,
  `mail` varchar(100) NOT NULL,
  `password` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `age` int NOT NULL,
  `prenom` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nom` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `region` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `type_lecture` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `mail`, `password`, `age`, `prenom`, `nom`, `region`, `type_lecture`) VALUES
(1, 'user1@gmail.com', '$2y$10$Z7.wk35HAFwSlAZ9089ib.ZMrL5xXeTydLcgBX2OQTVeCHduHHrVm', 20, 'dimitri', 'romano', '95', 'détente'),
(2, 'user2@gmail.com', '$2y$10$FYXfWazKqaaGRhCccLYNiOWe3pObDN0uQGWV/w1Vvb9tpczpyJbO.', 25, 'victoria', 'karliev', '93', ''),
(3, 'user3@gmail.com', '$2y$10$3CDvr78LDMhm2AlxGjS/peCT8Od2L7y2MEE3IXE88226x6gj6LTea', 23, 'Daria', 'Potapova', '95', 'détente');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `emprunter`
--
ALTER TABLE `emprunter`
  ADD CONSTRAINT `FK_emprunter_livre` FOREIGN KEY (`id_livre`) REFERENCES `livre` (`id_livre`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_emprunter_utilisateur` FOREIGN KEY (`id_client`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

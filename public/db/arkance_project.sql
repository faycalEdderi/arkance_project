-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 18 jan. 2023 à 15:57
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `arkance_project`
--

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230116195401', '2023-01-16 19:54:31', 137),
('DoctrineMigrations\\Version20230116195933', '2023-01-16 19:59:52', 196),
('DoctrineMigrations\\Version20230116200314', '2023-01-16 20:03:23', 270),
('DoctrineMigrations\\Version20230116200827', '2023-01-16 20:08:40', 122),
('DoctrineMigrations\\Version20230116202949', '2023-01-16 20:30:00', 394),
('DoctrineMigrations\\Version20230116203507', '2023-01-16 20:35:11', 235),
('DoctrineMigrations\\Version20230116204024', '2023-01-16 20:40:51', 599),
('DoctrineMigrations\\Version20230116205728', '2023-01-16 20:57:48', 248),
('DoctrineMigrations\\Version20230116210038', '2023-01-16 21:00:45', 135),
('DoctrineMigrations\\Version20230116210316', '2023-01-16 21:03:24', 246),
('DoctrineMigrations\\Version20230117003642', '2023-01-17 00:37:05', 219),
('DoctrineMigrations\\Version20230117004104', '2023-01-17 00:41:10', 247),
('DoctrineMigrations\\Version20230117004754', '2023-01-17 00:48:29', 291),
('DoctrineMigrations\\Version20230117004857', '2023-01-17 00:49:18', 169),
('DoctrineMigrations\\Version20230118130830', '2023-01-18 13:10:26', 388),
('DoctrineMigrations\\Version20230118133858', '2023-01-18 13:39:37', 168),
('DoctrineMigrations\\Version20230118134621', '2023-01-18 13:46:52', 297),
('DoctrineMigrations\\Version20230118134854', '2023-01-18 13:49:13', 115),
('DoctrineMigrations\\Version20230118135335', '2023-01-18 13:54:13', 102);

-- --------------------------------------------------------

--
-- Structure de la table `gender`
--

DROP TABLE IF EXISTS `gender`;
CREATE TABLE IF NOT EXISTS `gender` (
  `id` int NOT NULL AUTO_INCREMENT,
  `gender_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `gender`
--

INSERT INTO `gender` (`id`, `gender_value`) VALUES
(1, 'Masculin'),
(2, 'Feminin'),
(3, 'Autre');

-- --------------------------------------------------------

--
-- Structure de la table `grade`
--

DROP TABLE IF EXISTS `grade`;
CREATE TABLE IF NOT EXISTS `grade` (
  `id` int NOT NULL AUTO_INCREMENT,
  `value` double NOT NULL,
  `subject_id` int NOT NULL,
  `student_rating_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_595AAE3423EDC87` (`subject_id`),
  KEY `IDX_595AAE346D5C2E46` (`student_rating_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `grade`
--

INSERT INTO `grade` (`id`, `value`, `subject_id`, `student_rating_id`) VALUES
(2, 16.5, 2, 2),
(7, 12, 5, 2),
(12, 15, 3, 3),
(13, 9, 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `school_class`
--

DROP TABLE IF EXISTS `school_class`;
CREATE TABLE IF NOT EXISTS `school_class` (
  `id` int NOT NULL AUTO_INCREMENT,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_teacher_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_33B1AF85D0181F1A` (`first_teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `school_class`
--

INSERT INTO `school_class` (`id`, `level`, `first_teacher_id`) VALUES
(5, '6eme', 2),
(6, '5eme', 1),
(7, '4eme', 3),
(8, '3eme', 4);

-- --------------------------------------------------------

--
-- Structure de la table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_class_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B723AF3314463F54` (`school_class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `student`
--

INSERT INTO `student` (`id`, `first_name`, `last_name`, `gender`, `school_class_id`) VALUES
(2, 'faycal', 'edderi', 'Masculin', 6),
(3, 'edwina', 'tan', 'Feminin', 5),
(4, 'jean', 'mark', 'Masculin', 8),
(5, 'aymeric', 'vital', 'Masculin', 8),
(6, 'Samira', 'Boukhir', 'Feminin', 8),
(7, 'Mathilde', 'Persot', 'Feminin', 5),
(8, 'Marie', 'Deschamps', 'Autre', 8),
(9, 'benoit', 'dupres', 'Masculin', 8);

-- --------------------------------------------------------

--
-- Structure de la table `student_subject`
--

DROP TABLE IF EXISTS `student_subject`;
CREATE TABLE IF NOT EXISTS `student_subject` (
  `student_id` int NOT NULL,
  `subject_id` int NOT NULL,
  PRIMARY KEY (`student_id`,`subject_id`),
  KEY `IDX_16F88B82CB944F1A` (`student_id`),
  KEY `IDX_16F88B8223EDC87` (`subject_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subject_teacher_id` int NOT NULL,
  `subject_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_appreciation_id` int DEFAULT NULL,
  `appreciation` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_FBCE3E7A9A78E65F` (`subject_teacher_id`),
  KEY `IDX_FBCE3E7A71CD0197` (`student_appreciation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `subject`
--

INSERT INTO `subject` (`id`, `subject_teacher_id`, `subject_name`, `student_appreciation_id`, `appreciation`) VALUES
(2, 11, 'mathématique', 2, 'bien'),
(3, 1, 'français', NULL, NULL),
(4, 2, 'histoire', NULL, NULL),
(5, 3, 'anglais', NULL, NULL),
(6, 9, 'physique', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_class_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `teacher`
--

INSERT INTO `teacher` (`id`, `first_name`, `last_name`, `gender`, `teacher_class_id`) VALUES
(1, 'Rébecca', 'Armand', 'Feminin', 0),
(2, 'Aimée', 'Hebert', 'Feminin', 0),
(3, 'Marielle', 'Ribeiro', 'Feminin', 0),
(4, 'Julien', 'Mathieu', 'Masculin', 0),
(9, 'Marie', 'Duchet', 'Feminin', 0),
(11, 'Mounir', 'Assouak', 'Masculin', 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `grade`
--
ALTER TABLE `grade`
  ADD CONSTRAINT `FK_595AAE3423EDC87` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`),
  ADD CONSTRAINT `FK_595AAE346D5C2E46` FOREIGN KEY (`student_rating_id`) REFERENCES `student` (`id`);

--
-- Contraintes pour la table `school_class`
--
ALTER TABLE `school_class`
  ADD CONSTRAINT `FK_33B1AF85D0181F1A` FOREIGN KEY (`first_teacher_id`) REFERENCES `teacher` (`id`);

--
-- Contraintes pour la table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `FK_B723AF3314463F54` FOREIGN KEY (`school_class_id`) REFERENCES `school_class` (`id`);

--
-- Contraintes pour la table `student_subject`
--
ALTER TABLE `student_subject`
  ADD CONSTRAINT `FK_16F88B8223EDC87` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_16F88B82CB944F1A` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `FK_FBCE3E7A71CD0197` FOREIGN KEY (`student_appreciation_id`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `FK_FBCE3E7A9A78E65F` FOREIGN KEY (`subject_teacher_id`) REFERENCES `teacher` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

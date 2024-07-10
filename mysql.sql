-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql
-- Généré le : mer. 10 juil. 2024 à 07:35
-- Version du serveur : 8.0.37
-- Version de PHP : 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `api`
--
CREATE DATABASE IF NOT EXISTS `api` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `api`;

-- --------------------------------------------------------

--
-- Structure de la table `api_keys`
--

CREATE TABLE `api_keys` (
  `id` int NOT NULL,
  `api_key` text NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `api_keys`
--

INSERT INTO `api_keys` (`id`, `api_key`, `id_user`) VALUES
(1, 'apiKeys', 1);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `author`, `created_at`, `updated_at`) VALUES
(1, 'SQL Langage', 'SQL est un langage de programmation utilisé pour interagir avec des bases de données relationnelles.', 'Jean Dupont', '2024-07-05 10:00:00', '2024-07-08 09:45:43'),
(2, 'PHP Langage', 'PHP est un langage de script largement utilisé pour le développement web côté serveur.', 'Marie Curie', '2024-07-04 14:30:00', '2024-07-08 10:24:41'),
(3, 'Python Langage', 'Python est un langage de programmation interprété, orienté objet et de haut niveau.', 'Albert Einstein', '2024-07-03 09:15:00', '2024-07-03 09:15:00'),
(4, 'Javscript Langage', 'JavaScript est un langage de programmation utilisé principalement pour le développement web interactif.', 'Isaac Newton', '2024-07-02 16:45:00', '2024-07-02 16:45:00'),
(5, 'Ruby Langage', 'Ruby est un langage de programmation dynamique et orienté objet.', 'Ada Lovelace', '2024-07-01 11:20:00', '2024-07-01 11:20:00'),
(11, 'title Post Update', 'body Post', 'author Post', '2024-07-08 08:18:56', '2024-07-08 02:13:53'),
(15, 'title Post Update', 'body Post Update', 'author Post Update', '2024-07-08 02:13:53', '2024-07-09 02:04:47');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `api_keys`
--
ALTER TABLE `api_keys`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `api_keys`
--
ALTER TABLE `api_keys`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Base de données : `database`
--
CREATE DATABASE IF NOT EXISTS `database` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `database`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

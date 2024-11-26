-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 19 nov. 2024 à 19:45
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `verterre`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id_admin`, `email`, `mot_de_passe`) VALUES
(1, 'saafikhalil2002@gmail.com', '123456789');

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

CREATE TABLE `blog` (
  `id_article` int(11) NOT NULL,
  `titre` varchar(30) NOT NULL,
  `contenu` varchar(100) NOT NULL,
  `date_pub` date NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `catégorie`
--

CREATE TABLE `catégorie` (
  `id_cattégorie` int(11) NOT NULL,
  `id_plante` int(11) DEFAULT NULL,
  `nom_catégorie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id_evenement` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `date_event` date NOT NULL,
  `lieu` varchar(30) NOT NULL,
  `organisateur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `participation_event`
--

CREATE TABLE `participation_event` (
  `id_participation` int(11) NOT NULL,
  `id_evenement` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `plante`
--

CREATE TABLE `plante` (
  `id_plante` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `catégorie` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL,
  `prix` float NOT NULL,
  `quantité` int(11) NOT NULL,
  `date_ajout` date NOT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `plante`
--

INSERT INTO `plante` (`id_plante`, `nom`, `catégorie`, `description`, `prix`, `quantité`, `date_ajout`, `image_path`) VALUES
(6, 'warda', 'fleur', 'nawara zarga', 32, 54, '2024-11-12', NULL),
(7, 'ghjklme', 'plante verte', 'azeazeae', 2, 852, '2024-11-12', NULL),
(9, 'zahra', 'fleur', 'zahra hamra', 32, 36, '2024-11-13', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `transaction`
--

CREATE TABLE `transaction` (
  `id_transaction` int(11) NOT NULL,
  `id_plante` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `prix` float NOT NULL,
  `date_transaction` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `num_tel` varchar(13) NOT NULL,
  `sexe` varchar(10) DEFAULT NULL,
  `image_profile` blob DEFAULT NULL,
  `role` varchar(20) NOT NULL,
  `date_inscription` date NOT NULL,
  `is_active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `email`, `mot_de_passe`, `num_tel`, `sexe`, `image_profile`, `role`, `date_inscription`, `is_active`) VALUES
(24, 'khalil', 'saafi', 'saafikhalil2002@gmail.com', '$2y$10$JP7eC9nDc3GHz0GhkbAzxusK2pv9khxFJStMhcI2y86Ab0sFHbp9m', '93098922', NULL, NULL, 'utilisateur', '2024-11-12', 1),
(27, 'test', 'Ahmed', 'test@test.ttst', '$2y$10$voTKo2tEBXBsrmZ1UsZyfutCjRvUuBUmTNPFQj6.VlxvcFrlTV0ba', '12365478', NULL, NULL, 'utilisateur', '2024-11-13', 1),
(28, 'khalil', 'saafi', 'saafikhalil2002@gmail.com', '$2y$10$1vqCik5MQuVNVrofXzihFeiGqGwOISmV4V3EpczpmN0PQCbnqTuey', '93098922', NULL, NULL, 'utilisateur', '2024-11-16', 1),
(29, 'khalil', 'saafi', 'saafikhalil2002@gmail.com', '$2y$10$DWAuY5WM1oV3NEl9hwo2Buw87cthMQPuearUpcNFr2JPHZ9VS724a', '93098922', NULL, NULL, 'utilisateur', '2024-11-17', 1),
(30, 'Souissi', 'Ahmed', 'saafikhalil2002@gmail.com', '$2y$10$Zb/5HBwn/bEOR02B1HEOgO6xqz4iL10XDIiU/GuWz1mHI6uj1cRGq', '93098922', NULL, NULL, 'utilisateur', '2024-11-17', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `catégorie`
--
ALTER TABLE `catégorie`
  ADD PRIMARY KEY (`id_cattégorie`),
  ADD KEY `id_plante` (`id_plante`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id_evenement`);

--
-- Index pour la table `participation_event`
--
ALTER TABLE `participation_event`
  ADD PRIMARY KEY (`id_participation`),
  ADD KEY `id_evenement` (`id_evenement`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `plante`
--
ALTER TABLE `plante`
  ADD PRIMARY KEY (`id_plante`);

--
-- Index pour la table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_transaction`),
  ADD KEY `id_plante` (`id_plante`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `catégorie`
--
ALTER TABLE `catégorie`
  MODIFY `id_cattégorie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `plante`
--
ALTER TABLE `plante`
  MODIFY `id_plante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `catégorie`
--
ALTER TABLE `catégorie`
  ADD CONSTRAINT `catégorie_ibfk_1` FOREIGN KEY (`id_plante`) REFERENCES `plante` (`id_plante`) ON DELETE CASCADE;

--
-- Contraintes pour la table `participation_event`
--
ALTER TABLE `participation_event`
  ADD CONSTRAINT `participation_event_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`id_plante`) REFERENCES `plante` (`id_plante`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

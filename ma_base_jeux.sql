-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 09 fév. 2023 à 15:38
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ma_base_jeux`
--

-- --------------------------------------------------------

--
-- Structure de la table `log_categories`
--
USE c76DURAND;
CREATE TABLE `log_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_categorie` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `log_categories`
--

INSERT INTO `log_categories` (`id`, `nom_categorie`) VALUES
(1, 'Combat'),
(2, 'Aventure'),
(3, 'Logique'),
(11, 'course');

-- --------------------------------------------------------

--
-- Structure de la table `log_client`
--

CREATE TABLE `log_client` (
  `id_client` int(11) NOT NULL,
  `nomPrenom_client` varchar(45) NOT NULL,
  `pseudo_client` varchar(45) NOT NULL,
  `mdp_client` varchar(64) NOT NULL,
  `email_client` varchar(150) NOT NULL,
  `adresse_client` varchar(200) NOT NULL,
  `cp_client` int(11) NOT NULL,
  `ville_client` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `log_client`
--

INSERT INTO `log_client` (`id_client`, `nomPrenom_client`, `pseudo_client`, `mdp_client`, `email_client`, `adresse_client`, `cp_client`, `ville_client`) VALUES
(1, 'herbie hancock', 'herbie', 'herbie', 'herbie@yahho.fr', '15 bvd des jazzmen', 55000, 'Herlem'),
(2, 'barbie', 'barbie', 'barbie', 'barbie@gmail.com', '55 rue des poupées', 75000, 'Paris'),
(3, 'toto', 'toto', 'toto', 'toto@mail.com', 'totoland', 55000, 'mars'),
(5, 'coco', 'coco', '$2y$10$gCdhUWpfP15NKAPH4cRpQ.pPaztZ6jyuPd71Uph00TFmrfK00kmui', 'coco@mailo.com', 'cocoma', 88000, 'cocoland'),
(6, 'titi', 'titi', '$2y$10$OaNOJmit6RSwpOvtqbJlEu5Q4VnqcDklyPd9fA9OaC1lflUorTJLK', 'titi@pmail.com', 'itioub 5', 44500, 'unzfda'),
(7, 'gogo', 'gogo', '$2y$10$dovLABK6A039KCP4ut94reYZFd4MD6uz1elp6OMODZo65/EZW2s8i', 'gogo@gogomail.gogo', '44 gogo', 44000, 'ojh'),
(16, 'serge', 'serge', '$2y$10$aZtfDcKbqQSFP8ThkcERbuNK3bBPtsqcm0FZdoMuuskZ.9XKLv06C', 'serge@gmail.com', 'oizero 88', 88441, 'oknon'),
(18, 'baba', 'baba', '$2y$10$OY8Qwg9kQ0AA4MlsVOKn4uaPBhFkV0qDwvHPfYc9GnBjNnvLdD6Mu', 'baba@maoil.fr', '55f re', 78452, 'PPO'),
(19, 'tata tata ', 'tata', '$2y$10$tD8Sg1FReC/6hmRri1yCqeSPlqJXnJeqy1KYbpCXKg2GrQxpEF0U6', 'tata@mao.com', 'rue de tataland', 55555, 'tataville'),
(20, 'manuel', 'durand', '$2y$10$sJJB.kmxXVilG8RQAgCicuTCoGLPyBaHm5khIlWMtu204Lipivxpy', 'manuel.durand@mailo.com', '8 rue du dahlia', 34000, 'Montpellier');

-- --------------------------------------------------------

--
-- Structure de la table `log_commandes`
--

CREATE TABLE `log_commandes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomPrenomClient` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresseRueClient` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpClient` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `villeClient` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mailClient` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `log_commandes`
--

INSERT INTO `log_commandes` (`id`, `nomPrenomClient`, `adresseRueClient`, `cpClient`, `villeClient`, `mailClient`, `created_at`, `updated_at`) VALUES
(1, 'Henri Burel', '8 rue des coquelicots', '34330', 'Mèze', 'henri.burel@gmail.com', NULL, NULL),
(2, 'Bernard Laville', '12 rue des peupliers', '35550', 'Reims', 'mozart@Gmail.com', NULL, NULL),
(3, 'qerg', 'eqrg', '55000', 'fzaef', 'aezfzef@mklj.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `log_consoles`
--

CREATE TABLE `log_consoles` (
  `id_console` int(11) NOT NULL,
  `nom_console` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `log_consoles`
--

INSERT INTO `log_consoles` (`id_console`, `nom_console`) VALUES
(1, 'N.E.S'),
(2, '360'),
(3, 'switch');

-- --------------------------------------------------------

--
-- Structure de la table `log_exemplaires`
--

CREATE TABLE `log_exemplaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_console` int(11) NOT NULL,
  `etat` enum('neuf','bonétat','abimé') COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `image` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee_achat` year(4) NOT NULL,
  `prix_achat` decimal(5,2) NOT NULL,
  `categorie_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `log_exemplaires`
--

INSERT INTO `log_exemplaires` (`id`, `description`, `id_console`, `etat`, `prix`, `image`, `annee_achat`, `prix_achat`, `categorie_id`) VALUES
(1, 'TETRIS', 1, 'bonétat', '30.00', 'default.png', 2000, '69.00', 3),
(2, 'The Legend of zelda', 1, 'neuf', '30.00', 'zelda-nes.jpeg', 1995, '75.00', 2),
(3, 'Skyrim', 2, 'bonétat', '10.00', 'default.png', 2018, '45.00', 2),
(4, 'Tekken', 1, 'abimé', '5.00', 'default.png', 2005, '55.00', 1),
(6, 'WRC 9', 3, 'neuf', '40.00', 'default.png', 2020, '69.00', 11),
(8, 'Knight revenge III', 3, 'bonétat', '35.00', 'default.png', 2020, '30.00', 1),
(9, 'Knight revenge III', 3, 'bonétat', '35.00', 'default.png', 2020, '30.00', 1),
(10, 'Mortal Kombat', 3, 'bonétat', '65.00', 'default.png', 2021, '30.00', 1),
(11, 'Speed', 3, 'bonétat', '65.00', 'default.png', 2021, '30.00', 11);

-- --------------------------------------------------------

--
-- Structure de la table `log_lignes_commande`
--

CREATE TABLE `log_lignes_commande` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `exemplaire_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `log_lignes_commande`
--

INSERT INTO `log_lignes_commande` (`id`, `client_id`, `exemplaire_id`) VALUES
(7, 19, 2),
(8, 19, 1),
(9, 19, 3),
(10, 19, 4),
(11, 5, 11),
(12, 5, 9),
(13, 5, 10),
(14, 5, 9),
(15, 5, 8),
(16, 20, 11),
(17, 20, 10);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `log_categories`
--
ALTER TABLE `log_categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `log_client`
--
ALTER TABLE `log_client`
  ADD PRIMARY KEY (`id_client`),
  ADD UNIQUE KEY `pseudo_client` (`pseudo_client`);

--
-- Index pour la table `log_commandes`
--
ALTER TABLE `log_commandes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `log_consoles`
--
ALTER TABLE `log_consoles`
  ADD PRIMARY KEY (`id_console`);

--
-- Index pour la table `log_exemplaires`
--
ALTER TABLE `log_exemplaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exemplaires_categorie_id_foreign` (`categorie_id`),
  ADD KEY `id_console` (`id_console`);

--
-- Index pour la table `log_lignes_commande`
--
ALTER TABLE `log_lignes_commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lignes_commande_commande_id_foreign` (`client_id`),
  ADD KEY `lignes_commande_exemplaire_id_foreign` (`exemplaire_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `log_categories`
--
ALTER TABLE `log_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `log_client`
--
ALTER TABLE `log_client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `log_commandes`
--
ALTER TABLE `log_commandes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `log_consoles`
--
ALTER TABLE `log_consoles`
  MODIFY `id_console` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `log_exemplaires`
--
ALTER TABLE `log_exemplaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `log_lignes_commande`
--
ALTER TABLE `log_lignes_commande`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `log_exemplaires`
--
ALTER TABLE `log_exemplaires`
  ADD CONSTRAINT `exemplaires_categorie_id_foreign` FOREIGN KEY (`categorie_id`) REFERENCES `log_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `log_exemplaires_ibfk_1` FOREIGN KEY (`id_console`) REFERENCES `log_consoles` (`id_console`);

--
-- Contraintes pour la table `log_lignes_commande`
--
ALTER TABLE `log_lignes_commande`
  ADD CONSTRAINT `lignes_commande_exemplaire_id_foreign` FOREIGN KEY (`exemplaire_id`) REFERENCES `log_exemplaires` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `log_lignes_commande_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `log_client` (`id_client`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

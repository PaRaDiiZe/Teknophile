-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 28 avr. 2022 à 14:20
-- Version du serveur : 10.3.31-MariaDB-0+deb10u1
-- Version de PHP : 7.3.33-1+0~20211119.91+debian10~1.gbp618351

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `huot_SAE203`
--

-- --------------------------------------------------------

--
-- Structure de la table `Artiste`
--

CREATE TABLE `Artiste` (
  `id_artiste` bigint(20) UNSIGNED NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Artiste`
--

INSERT INTO `Artiste` (`id_artiste`, `Nom`, `Genre`) VALUES
(1, 'BillX', 'Tribe'),
(2, 'Le Wanski', 'Melodic Tekno'),
(3, 'Floxytek', 'Hardtek'),
(4, 'Radium', 'Hardtek'),
(5, 'Mad Tribe', 'Psytrance');

-- --------------------------------------------------------

--
-- Structure de la table `Commande`
--

CREATE TABLE `Commande` (
  `id_commande` bigint(20) UNSIGNED NOT NULL,
  `Date` date NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Commentaire`
--

CREATE TABLE `Commentaire` (
  `id_commentaire` bigint(20) UNSIGNED NOT NULL,
  `Texte_commentaire` varchar(255) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Evenement`
--

CREATE TABLE `Evenement` (
  `id_event` bigint(20) UNSIGNED NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Ville_event` varchar(255) NOT NULL,
  `Rue_event` varchar(255) NOT NULL,
  `Code_post` varchar(255) NOT NULL,
  `Pays` varchar(255) NOT NULL,
  `Prix` float(5,2) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Evenement`
--

INSERT INTO `Evenement` (`id_event`, `Nom`, `Ville_event`, `Rue_event`, `Code_post`, `Pays`, `Prix`, `Image`) VALUES
(1, 'Techno-parade', 'Paris', 'Place de la Bastille', '75011', 'France', 0.00, 'URL vers image'),
(2, 'Rampage', 'Anvers', 'Antwerps Sportpaleis', '2000', 'Belgique', 50.99, 'URL vers image'),
(3, 'Heretik System', 'Strasbourg', '16 rue Saglio', '67100', 'France', 12.00, 'URL vers l\'image'),
(4, 'IMPULS', 'Strasbourg', '16 rue Saglio', '67100', 'France', 19.99, 'URL vers l\'image'),
(5, 'Yoland Bashing + YMNK', 'Lille', '1 bis rue Georges Lefebvre ', '59655', 'France', 0.00, 'URL vers l\'image');

-- --------------------------------------------------------

--
-- Structure de la table `Ligne_commande`
--

CREATE TABLE `Ligne_commande` (
  `Code_commande` int(11) NOT NULL,
  `id_commande` bigint(20) UNSIGNED NOT NULL,
  `id_vetement` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Type`
--

CREATE TABLE `Type` (
  `id_type` bigint(20) UNSIGNED NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Picto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Type`
--

INSERT INTO `Type` (`id_type`, `Nom`, `Picto`) VALUES
(1, 'Casquette', 'URL vers picto'),
(2, 'T-Shirt', 'URL vers picto'),
(3, 'Pull', 'URL vers Picto'),
(4, 'Jean', 'URL vers picto'),
(5, 'Chaussettes', 'URL vers Picto');

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `User` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Rue_user` varchar(255) NOT NULL,
  `Ville_user` varchar(255) NOT NULL,
  `Code_post_user` varchar(255) NOT NULL,
  `Pays_user` varchar(255) NOT NULL,
  `Carte_Bancaire` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `User`
--

INSERT INTO `User` (`id_user`, `Nom`, `Rue_user`, `Ville_user`, `Code_post_user`, `Pays_user`, `Carte_Bancaire`) VALUES
(1, 'Ok-tiers Man', '47 rue de la rue', 'Le Goulag', '666', 'Hello World', '1234-5678-9012-3456'),
(2, 'Etudiant en MMI', '39 rue de la remise en question', 'Pic de la dépression', '69420', 'France\r\n', '1234-5678-9012-3456'),
(3, 'Lilia', '34, Rue de l\'amitié', 'Lille', '59000', 'France', '9876-5432-1098-7654'),
(4, 'Baptave', '43, rue de la bédave', 'Lyon', '69000', 'France', '5678-2493-5879-1006'),
(5, 'John Doe', '02, rue de l\'anonymat', 'Roubaix', '59100', 'France', '5689-3245-0203-7650');

-- --------------------------------------------------------

--
-- Structure de la table `Vetement`
--

CREATE TABLE `Vetement` (
  `id_vetement` bigint(20) UNSIGNED NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Taille` varchar(255) NOT NULL,
  `Genre` varchar(255) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Prix` float(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Vetement`
--

INSERT INTO `Vetement` (`id_vetement`, `Nom`, `Description`, `Taille`, `Genre`, `Photo`, `Prix`) VALUES
(1, 'T-Shirt LaCroix', 'Petite Descritpion', '3XL', 'Tekno', 'URL vers photo', 5.99),
(2, 'Casquette LaCroix', 'Description de la casquette LaCroix', '7', 'Tekno', 'URL vers la photo', 12.99),
(3, 'Pull LaCroix', 'Description du Pull', 'M', 'Tekno', 'URL vers l\'image', 15.99),
(4, 'Chaussettes LaCroix', 'Description des chaussettes', '36-42', 'Tekno', 'Url vers l\'image', 7.99),
(5, 'Jean LaCroix', 'Description du jean', '37-38', 'Tekno', 'URL vers l\'image', 14.99);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Artiste`
--
ALTER TABLE `Artiste`
  ADD PRIMARY KEY (`id_artiste`),
  ADD UNIQUE KEY `id_artiste` (`id_artiste`);

--
-- Index pour la table `Commande`
--
ALTER TABLE `Commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD UNIQUE KEY `id_commande` (`id_commande`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `Commentaire`
--
ALTER TABLE `Commentaire`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD UNIQUE KEY `id_commentaire` (`id_commentaire`);

--
-- Index pour la table `Evenement`
--
ALTER TABLE `Evenement`
  ADD PRIMARY KEY (`id_event`),
  ADD UNIQUE KEY `id_event` (`id_event`);

--
-- Index pour la table `Ligne_commande`
--
ALTER TABLE `Ligne_commande`
  ADD PRIMARY KEY (`id_commande`,`id_vetement`);

--
-- Index pour la table `Type`
--
ALTER TABLE `Type`
  ADD PRIMARY KEY (`id_type`),
  ADD UNIQUE KEY `id_type` (`id_type`);

--
-- Index pour la table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `Vetement`
--
ALTER TABLE `Vetement`
  ADD PRIMARY KEY (`id_vetement`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Artiste`
--
ALTER TABLE `Artiste`
  MODIFY `id_artiste` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `Commande`
--
ALTER TABLE `Commande`
  MODIFY `id_commande` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Commentaire`
--
ALTER TABLE `Commentaire`
  MODIFY `id_commentaire` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Evenement`
--
ALTER TABLE `Evenement`
  MODIFY `id_event` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `Type`
--
ALTER TABLE `Type`
  MODIFY `id_type` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `User`
--
ALTER TABLE `User`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `Vetement`
--
ALTER TABLE `Vetement`
  MODIFY `id_vetement` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Commande`
--
ALTER TABLE `Commande`
  ADD CONSTRAINT `FK_user_co` FOREIGN KEY (`id_commande`) REFERENCES `User` (`id_user`);

--
-- Contraintes pour la table `Commentaire`
--
ALTER TABLE `Commentaire`
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`id_commentaire`) REFERENCES `User` (`id_user`),
  ADD CONSTRAINT `FK_vetement` FOREIGN KEY (`id_commentaire`) REFERENCES `Vetement` (`id_vetement`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

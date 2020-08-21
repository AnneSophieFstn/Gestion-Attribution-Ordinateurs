-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 21 août 2020 à 07:36
-- Version du serveur :  10.1.35-MariaDB
-- Version de PHP :  7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestion_attribution_ordinateurs`
--

-- --------------------------------------------------------

--
-- Structure de la table `attributions`
--

CREATE TABLE `attributions` (
  `id_attribution` int(11) NOT NULL,
  `id_utilisateur_attribuer` int(100) NOT NULL,
  `nom_utilisateur_attribuer` varchar(100) NOT NULL,
  `prenom_utilisateur_attribuer` varchar(100) NOT NULL,
  `id_ordinateur_attribuer` varchar(100) NOT NULL,
  `nom_ordinateur_attribuer` varchar(100) NOT NULL,
  `horaire` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `attributions`
--

INSERT INTO `attributions` (`id_attribution`, `id_utilisateur_attribuer`, `nom_utilisateur_attribuer`, `prenom_utilisateur_attribuer`, `id_ordinateur_attribuer`, `nom_ordinateur_attribuer`, `horaire`, `date`) VALUES
(74, 7, 'Dumerc', 'CÃ©line', '2', 'Ordinateur 1', '08:30', '2020-08-01'),
(75, 8, 'Parker', 'Tony', '5', 'Ordinateur 3', '09:30', '2020-08-22'),
(76, 15, 'Fournier', 'Evan', '6', 'Ordinateur 4', '09:30', '2020-08-01');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id_membre` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `email_membre` varchar(100) NOT NULL,
  `motdepasse` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id_membre`, `pseudo`, `email_membre`, `motdepasse`) VALUES
(1, 'Administrateur', 'admin@admin.fr', 'projet2020simplon974');

-- --------------------------------------------------------

--
-- Structure de la table `ordinateurs`
--

CREATE TABLE `ordinateurs` (
  `id_ordinateur` int(11) NOT NULL,
  `nom_ordinateur` varchar(100) NOT NULL,
  `Occuper` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ordinateurs`
--

INSERT INTO `ordinateurs` (`id_ordinateur`, `nom_ordinateur`, `Occuper`) VALUES
(2, 'Ordinateur 1', 1),
(4, 'Ordinateur 2', 0),
(5, 'Ordinateur 3', 1),
(6, 'Ordinateur 4', 1),
(7, 'Ordinateur 5', 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(100) NOT NULL,
  `nom_utilisateur` varchar(100) NOT NULL,
  `prenom_utilisateur` varchar(100) NOT NULL,
  `utilise_Ordinateur` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `nom_utilisateur`, `prenom_utilisateur`, `utilise_Ordinateur`) VALUES
(3, 'Lebron', 'James', 1),
(7, 'Dumerc', 'CÃ©line', 1),
(8, 'Parker', 'Tony', 1),
(15, 'Fournier', 'Evan', 1),
(16, 'Bryant', 'Kobe', 0),
(17, 'Green', 'Dany', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `attributions`
--
ALTER TABLE `attributions`
  ADD PRIMARY KEY (`id_attribution`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id_membre`);

--
-- Index pour la table `ordinateurs`
--
ALTER TABLE `ordinateurs`
  ADD PRIMARY KEY (`id_ordinateur`),
  ADD UNIQUE KEY `nom_ordinateur` (`nom_ordinateur`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD UNIQUE KEY `login_utilisateur` (`nom_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `attributions`
--
ALTER TABLE `attributions`
  MODIFY `id_attribution` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id_membre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT pour la table `ordinateurs`
--
ALTER TABLE `ordinateurs`
  MODIFY `id_ordinateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

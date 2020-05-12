-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mar. 12 mai 2020 à 23:34
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `bigJob`
--
CREATE DATABASE IF NOT EXISTS `bigJob` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bigJob`;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `droits` int(11) NOT NULL,
  `date_ajout` date NOT NULL,
  `ajouter_par` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `login`, `droits`, `date_ajout`, `ajouter_par`) VALUES
(15, 'admin', 3, '2020-05-11', 'admin'),
(40, 'modo', 2, '2020-05-12', 'admin'),
(41, 'amine', 2, '2020-05-12', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `demande_autorisation`
--

CREATE TABLE `demande_autorisation` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `date_reservation` date NOT NULL,
  `date_demande` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `demande_autorisation`
--

INSERT INTO `demande_autorisation` (`id`, `login`, `date_reservation`, `date_demande`) VALUES
(29, 'amine', '2020-07-23', '2020-05-13');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `date_reservation` date NOT NULL,
  `admin_user` varchar(255) NOT NULL,
  `reponse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `login`, `date_reservation`, `admin_user`, `reponse`) VALUES
(40, 'amine', '2020-05-15', 'admin', 'yes'),
(41, 'amine', '2020-06-02', 'admin', 'no'),
(42, 'amine', '2020-06-18', 'admin', 'yes'),
(43, 'amine', '2020-07-09', 'admin', 'yes'),
(45, 'moderateur', '2020-06-11', 'moderateur', 'yes'),
(46, 'tata', '2020-07-10', 'admin', 'yes'),
(47, 'tata', '2020-06-17', 'admin', 'no'),
(49, 'admin', '2020-07-09', 'admin', 'yes'),
(50, 'admin', '2020-06-05', 'admin', 'yes'),
(54, 'amine', '2020-06-20', 'admin', 'yes'),
(55, 'amine', '2020-07-17', 'admin', 'no'),
(58, 'admin', '2020-07-02', 'admin', 'yes'),
(63, 'amine', '2020-12-02', 'admin', 'no'),
(65, 'admin', '2020-08-12', 'admin', 'no');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_droits` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `id_droits`) VALUES
(2, 'amine', '$2y$10$qWDtfEE0zBeaw.9hrgvJQ.vB.W09oQB82/6gNXlVpIhXYMpVgNwHy', 'amine@laplateforme.io', 2),
(3, 'admin', '$2y$10$qcl9KJ.tW.f6qW9VelgBhu/vHQFBXm3Fi.A7W89sOKKaf5bxVi7/q', 'admin@laplateforme.io', 3),
(4, 'modo', '$2y$10$Tm3WkD2n0sR6BwmPrELvnueUcdywmNpKBpV96DIVoBZ/EnjsVxZpC', 'mod@laplateforme.io', 2),
(5, 'paul', '$2y$10$RaMfCl2rUYTXMStY2NOyauuJuoQiGNCUO7osZTipNe/jwAK5cmBRW', 'paul@laplateforme.io', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `demande_autorisation`
--
ALTER TABLE `demande_autorisation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `demande_autorisation`
--
ALTER TABLE `demande_autorisation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

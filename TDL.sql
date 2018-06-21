-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  jeu. 21 juin 2018 à 13:08
-- Version du serveur :  5.6.38
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `TDL`
--

-- --------------------------------------------------------

--
-- Structure de la table `concern`
--

CREATE TABLE `concern` (
  `id_junction` bigint(20) NOT NULL,
  `id_task` bigint(20) NOT NULL,
  `id_subject` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `concern`
--

INSERT INTO `concern` (`id_junction`, `id_task`, `id_subject`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 1),
(4, 4, 2),
(5, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `subjects`
--

CREATE TABLE `subjects` (
  `id_subject` bigint(11) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `subjects`
--

INSERT INTO `subjects` (`id_subject`, `title`) VALUES
(1, 'WEB20'),
(2, 'SDM');

-- --------------------------------------------------------

--
-- Structure de la table `tasks`
--

CREATE TABLE `tasks` (
  `id_task` bigint(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `date_end` date DEFAULT NULL,
  `priority` int(11) NOT NULL,
  `id_user` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tasks`
--

INSERT INTO `tasks` (`id_task`, `title`, `date_end`, `priority`, `id_user`) VALUES
(1, 'Minutes', '2018-06-29', 2, 1),
(2, 'Apprendre son cours', '2018-06-20', 4, 1),
(3, 'Faire la TDL', '2018-06-29', 4, 1),
(4, 'Parler au prof', '2018-06-29', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `login` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `name`, `login`, `password`) VALUES
(1, 'Admin', 'admin', 'admin'),
(2, 'raph', 'raph', 'raph');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `concern`
--
ALTER TABLE `concern`
  ADD PRIMARY KEY (`id_junction`),
  ADD KEY `concern/tasks` (`id_task`),
  ADD KEY `concern/subjects` (`id_subject`);

--
-- Index pour la table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id_subject`);

--
-- Index pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id_task`),
  ADD KEY `tasks/users` (`id_user`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `concern`
--
ALTER TABLE `concern`
  ADD CONSTRAINT `concern/subjects` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id_subject`),
  ADD CONSTRAINT `concern/tasks` FOREIGN KEY (`id_task`) REFERENCES `tasks` (`id_task`);

--
-- Contraintes pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks/users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 14 nov. 2022 à 15:26
-- Version du serveur :  10.3.34-MariaDB-0ubuntu0.20.04.1
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Gesco`
--

-- --------------------------------------------------------

--
-- Structure de la table `Conge`
--

CREATE TABLE `Conge` (
  `id` int(6) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `Datedebut` date DEFAULT NULL,
  `Datefin` date DEFAULT NULL,
  `raison` text DEFAULT NULL,
  `decisionAdmin` varchar(50) NOT NULL DEFAULT 'En cours...',
  `commentaire` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Conge`
--

INSERT INTO `Conge` (`id`, `id_user`, `Datedebut`, `Datefin`, `raison`, `decisionAdmin`, `commentaire`) VALUES
(1, 2, '2022-07-27', '2022-08-28', 'En mission à l\'étranger', 'Accepter', 'Votre demande a été accepter'),
(2, 1, '2022-07-29', '2022-08-06', 'Maladie', 'Refuser', 'vbh'),
(6, 2, '2022-08-18', '2022-09-16', 'CVV', 'En cours...', NULL),
(7, 2, '2022-09-03', '2022-09-11', 'Vacances', 'Refusé', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `poste` varchar(40) NOT NULL,
  `telephone` varchar(13) NOT NULL,
  `adresse` varchar(45) NOT NULL,
  `dateNaiss` date NOT NULL,
  `lieuNaiss` varchar(45) NOT NULL,
  `departement` varchar(22) NOT NULL,
  `sexe` varchar(22) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `presence` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `lastname`, `poste`, `telephone`, `adresse`, `dateNaiss`, `lieuNaiss`, `departement`, `sexe`, `email`, `password`, `presence`) VALUES
(1, 'Seydi', 'Camara', 'Technicien', '49-23-74-96', 'Basra ', '1998-01-07', 'Gorilakhé', 'D2', 'Homme', 'Seydi31@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 1),
(2, 'Hanoun', 'Camara', 'Secretaire général', '49-23-74-96', 'Arafat', '2002-01-07', 'Gorilakhé', 'D3', 'Homme', 'Hanoun7@gmail.com', '925cc8d2953eba624b2bfedf91a91613', 0),
(3, 'Mariem', 'Sow', 'Caissière', '49-23-74-96', 'Basra ', '1998-09-12', 'Boghé', 'D1', 'Femme', 'Mariem12@gmail.com', 'b3cd915d758008bd19d0f2428fbb354a', 0),
(4, 'Baba', 'Sow', 'Caissier', '49-23-74-96', 'Basra ', '1989-11-09', 'Boghé', 'D3', 'Homme', 'Baba@gmail.com', '21661093e56e24cd60b10092005c4ac7', 0),
(5, 'Aly', 'Camara', 'admin', '49-23-74-96', 'Basra ', '2002-07-01', 'Gorilakhé', 'D2', 'Homme', 'Aly27@gmail.fr', '33fb5fa89f84d0a48397f693a7c7c242', 0),
(6, 'Aly', 'Camara', 'Technicien', '49-23-74-96', 'Basra ', '2002-01-07', 'Boghé', 'D1', 'Homme', 'Aly@gmail.fr', '86318e52f5ed4801abe1d13d509443de', 0),
(7, 'Ahmed', 'Gueye', 'Technicien', '49-23-74-96', 'Basra ', '2001-01-19', 'Rosso', 'D2', 'Homme', 'Ahmed12@gmail.com', '7f1e43d880f09c64ac6378af6de47702', 0),
(9, 'Hawa', 'Gueye', 'Caissière', '49-23-74-96', 'Basra ', '1999-09-15', 'Rosso', 'D1', 'Femme', 'hawa@gmail.fr', '1241b579c22ed39ab459bc35d636de5e', 0),
(10, 'Moussa', 'Sow', 'admin', '49-23-74-96', 'Basra ', '2001-01-09', 'Boghé', 'D1', 'Homme', 'Moussa@gmail.com', '30b7c3309df8e5f460fb98a964ac9fd9', 0),
(11, 'Moctar', 'Dia', 'directeur', '49-23-74-96', 'Basra ', '1999-01-07', 'Rosso', 'D2', 'Homme', 'Moctar@gmail.com', '9a7f7f75727e0ed27945a7b1e475cc7f', 0),
(12, 'Ali', 'Camara', 'Technicien', '49-23-74-96', 'Basra ', '1999-10-04', 'Rosso', 'D1', 'Homme', 'Ali9@gmail.com', 'd5baaaf745688ba1c9f9a68dac4c78dd', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Conge`
--
ALTER TABLE `Conge`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Conge`
--
ALTER TABLE `Conge`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Conge`
--
ALTER TABLE `Conge`
  ADD CONSTRAINT `Conge_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

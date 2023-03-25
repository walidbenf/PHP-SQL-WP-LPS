-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 21 déc. 2018 à 15:35
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `boutique`
CREATE DATABASE boutique;

USE boutique;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_article` int(5) NOT NULL,
  `reference` int(15) NOT NULL,
  `categorie` varchar(70) NOT NULL,
  `titre` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `couleur` varchar(10) NOT NULL,
  `taille` varchar(2) NOT NULL,
  `sexe` enum('m','f') NOT NULL,
  `photo` varchar(250) NOT NULL,
  `prix` double(7,2) NOT NULL,
  `stock` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `reference`, `categorie`, `titre`, `description`, `couleur`, `taille`, `sexe`, `photo`, `prix`, `stock`) VALUES
(1, 529, 'botte', 'botte beige', ' Informations additionnelles sur la tige: fermeture éclair latérale\r\nSemelle intérieure: Textile\r\nDoublure: Textile\r\nForme du talon: Talon large\r\nHauteur du talon: 7 cm\r\nHauteur de la tige: 36 cm\r\nLargeur de la tige: 36 cm\r\nInformations additionnelles: cuir plissé, boucle\r\nSystème de fixation: Boucle\r\nBout de la chaussure: Rond\r\nSemelle: Synthétique de haute qualité\r\nDessus / Tige: Cuir\r\nRéférence: ZI111C08Y-708', 'beige', 'S', 'm', 'http://localhost/SITE_BOUTIQUE/photo/bottebeigef.jpg', 60.00, 0),
(2, 530, 'polopolo', 'botte noir', ' Informations additionnelles sur la tige: fermeture &eacute;clair lat&eacute;raleSemelle int&eacute;rieure: CuirDoublure: TextileHauteur du talon: 5 cmHauteur de la tige: 38 cmLargeur de la tige: 36 cmInformations additionnelles: ganse &eacute;lastiqueSyst&egrave;me de fixation: Sans lacetsBout de la chaussure: RondSemelle: Synth&eacute;tique de haute qualit&eacute;Dessus / Tige: CuirR&eacute;f&eacute;rence: ZI111C09A-802', 'noir', 'S', 'f', 'http://localhost/SITE_BOUTIQUE/photo/530_Blue_Tshirt.jpg', 70.00, 500),
(3, 531, 'chemise', 'superbe chemise', 'Cette chemise masculine à coupe NON CINTRÉE blanche à rayure de notre série Corporate est ravissante. Remarquez sa doublure blanche , ses poignets mousquetaires ainsi que son galon de col et ses boutonnières grises, autant de particularités qui en font un modèle essentiel à votre garde-robe. ', 'blanc', 'S', 'm', 'http://localhost/SITE_BOUTIQUE/photo/chemiseblanchem.jpg', 35.00, 289),
(4, 532, 'chemise', 'belle chemise', 'La chemise en popeline 100 % coton. Incontournable dans le dressing masculin. Coupe slim (ajustée). Col pointes libres. Empiècement dos. Chemise manches longues, poignets boutonnés. Base liquette. Long. 76 cm. Encolures (en cm). ', 'noir', 'S', 'm', 'http://localhost/SITE_BOUTIQUE/photo/chemisenoirm.jpg', 70.00, 179),
(5, 533, 'pull', 'pull pour toutes occasion', 'Superbe pull. \r\nDescription :\r\n55% coton, 45% acrylique.\r\nA essayer absolument !', 'gris', 'S', 'm', 'http://localhost/SITE_BOUTIQUE/photo/pullgrism2.jpg', 75.00, 102),
(6, 534, 'tshirt', 'tshirt colv', 'Tee shirt léger de coupe relativement ample.150 g/m² (blanc: 145 g/m²), 100% coton à fil de chaîne continu, maille fine, bande de propreté. Tee-shirt, Léger, manche courte, Homme, Col rond.\r\n', 'bleu', 'S', 'm', 'http://localhost/SITE_BOUTIQUE/photo/tshirtbleum.jpg', 15.00, 7),
(8, 536, 'tshirt', 'tshirt', 'Teeshirt léger fashion, 150 g/m², 100% coton jersey ringspun avec fil \"SLUB YARN\". Couleurs effet usé. Col rond en cote 1X1. Bande de propreté. Coutures latérales. Couture cicatrice sur lourlet. Col rond, manche courte, Tee-shirt, Homme, Léger, Vintage', 'violet', 'S', 'm', 'http://localhost/SITE_BOUTIQUE/photo/tshirtvioletm.jpg', 19.00, 1110);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(6) NOT NULL,
  `id_membre` int(5) DEFAULT NULL,
  `montant` double(7,2) NOT NULL,
  `date` datetime NOT NULL,
  `etat` enum('en cours de traitement','envoyé','livré') NOT NULL DEFAULT 'en cours de traitement'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `id_membre`, `montant`, `date`, `etat`) VALUES
(1, 8, 54.00, '2018-12-21 14:29:45', 'en cours de traitement'),
(2, 8, 54.00, '2018-12-21 14:30:10', 'en cours de traitement'),
(3, 8, 54.00, '2018-12-21 14:43:47', 'en cours de traitement'),
(4, 8, 54.00, '2018-12-21 14:43:54', 'en cours de traitement'),
(5, 8, 54.00, '2018-12-21 15:04:48', 'en cours de traitement'),
(6, 8, 54.00, '2018-12-21 15:05:08', 'en cours de traitement'),
(7, 8, 54.00, '2018-12-21 15:29:57', 'en cours de traitement'),
(8, 8, 89.00, '2018-12-21 15:30:22', 'en cours de traitement');

-- --------------------------------------------------------

--
-- Structure de la table `details_commande`
--

CREATE TABLE `details_commande` (
  `id_details_commande` int(5) NOT NULL,
  `id_commande` int(6) NOT NULL,
  `id_article` int(5) DEFAULT NULL,
  `quantite` int(4) NOT NULL,
  `prix` double(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `details_commande`
--

INSERT INTO `details_commande` (`id_details_commande`, `id_commande`, `id_article`, `quantite`, `prix`) VALUES
(1, 5, 3, 1, 35.00),
(2, 5, 8, 1, 19.00),
(3, 6, 3, 1, 35.00),
(4, 6, 8, 1, 19.00),
(5, 8, 2, 1, 70.00),
(6, 8, 8, 1, 19.00);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id_membre` int(5) NOT NULL,
  `pseudo` varchar(15) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `sexe` enum('m','f') NOT NULL,
  `ville` varchar(20) NOT NULL,
  `cp` int(5) UNSIGNED ZEROFILL NOT NULL,
  `adresse` text NOT NULL,
  `statut` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `pseudo`, `mdp`, `nom`, `prenom`, `email`, `sexe`, `ville`, `cp`, `adresse`, `statut`) VALUES
(8, 'momo', '$2y$10$W1nKOAeIhLHJq3BhPKE.8OH98BPRZDaJynRvJAQgAGaF0sDWtHy3O', 'momo', 'momo', 'momo@momo.com', 'm', 'momo', 12345, 'momo', 1),
(9, 'popo', '$2y$10$DeEy04l7ZiVD/bk9CiJd6.Fu7Yq/lhRqp.KZtNDqj6t5vu/2G67E6', 'popo', 'popo', 'popo', 'f', 'popo', 12345, 'Rue de l\'ivrogne', 0),
(10, 'polo', '$2y$10$bvnN9KemeGNUsI7/qB1Uxu7cetlo499bUxGhiqFgv1MJvwB7xeSZu', 'polo', 'polo', 'polo@polo.fr', 'f', 'polo', 45612, 'polo', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`),
  ADD UNIQUE KEY `reference` (`reference`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `id_membre` (`id_membre`);

--
-- Index pour la table `details_commande`
--
ALTER TABLE `details_commande`
  ADD PRIMARY KEY (`id_details_commande`),
  ADD KEY `id_article` (`id_article`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id_membre`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `details_commande`
--
ALTER TABLE `details_commande`
  MODIFY `id_details_commande` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `details_commande`
--
ALTER TABLE `details_commande`
  ADD CONSTRAINT `details_commande_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

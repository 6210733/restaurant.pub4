-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 22 juin 2023 à 04:49
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pw_restaurant`
--
CREATE DATABASE IF NOT EXISTS `pw_restaurant` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pw_restaurant`;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'Nos créations'),
(2, 'Viande'),
(3, 'Poisson'),
(4, 'À partager'),
(5, 'Burger'),
(6, 'Salade'),
(7, 'Végé'),
(8, 'Tartare'),
(9, 'Chocolat'),
(10, 'Caramel'),
(11, 'Salade');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `prenom` varchar(150) NOT NULL,
  `courriel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `prenom`, `courriel`) VALUES
(9, 'Gaston', 'Leclient', 'leclient@pubg4.ca'),
(19, 'Messoudi', 'Leclient', 'wafaa@pubg4.com'),
(20, 'Tama', 'Wafaa', 'wafaa@pubg4.com'),
(29, 'Messoudi', 'Wafaa', 'leclient@pubg4.ca'),
(31, 'Messoudi', 'Messoudi', 'leclient@pubg4.fr'),
(32, 'Messoudi', 'Souleyman', '1212@hotmail.com'),
(33, 'Lévesque', 'Adèle', 'adele@hotmail.com'),
(34, 'Clair', 'David', 'pepin@hotmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `employes`
--

CREATE TABLE `employes` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `prenom` varchar(150) NOT NULL,
  `courriel` varchar(255) NOT NULL,
  `role` varchar(150) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `employes`
--

INSERT INTO `employes` (`id`, `nom`, `prenom`, `courriel`, `role`, `mot_de_passe`) VALUES
(20, 'Leclient', 'Gaston', 'Leclient@pubg4.ca', 'Gestionnaire', '$2y$10$qHaTZ/RHWrH6UpG2DG.2xekG5EWBFXHO4I9uZH2OSIDNYDQ9QQ.L6'),
(22, 'Tama', 'Wafaa', 'wafaa@pubg4.ca', 'Gestionnaire', '$2y$10$bm/GfbwnFeZprrdmYheWFOwHT.mIU7mj9ncBUMenL4XV686i6777y'),
(35, 'Sebastien', 'Alexandre', 'alexandre@pubg4.ca', 'Employé', '$2y$10$H6hTGPtZsixDlVu8RWLltudufDBJPSjIOwKLGkl/zlamn.bvQSFHG'),
(44, 'Dumouchel', 'Catherine', 'catherine@hotmail.ca', 'Employé', '$2y$10$smcZ5QkwSqddds1xcMV9Ae2cDdsgOe47pXbXEgOmoVZubzooR74RK');

-- --------------------------------------------------------

--
-- Structure de la table `plats`
--

CREATE TABLE `plats` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `section_id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `plats`
--

INSERT INTO `plats` (`id`, `nom`, `description`, `prix`, `section_id`, `categorie_id`) VALUES
(10, 'Salade du jour', 'Laitues mélangées, lanières végé croustillantes, radis, concombre, tomates cerises et vinaigrette au balsamique blanc.', '10.99', 1, 1),
(11, 'Ailes de lapin', 'Tendres morceaux de lapin marinés dans des épices exquises et cuits à la perfection. Un plat succulent et original qui ravira les papilles.', '16.49', 1, 2),
(12, 'Calamar', 'Anneaux de calmar délicatement panés et frits, offrant une texture croustillante à l\'extérieur et une tendreté irrésistible à l\'intérieur. Une explosion de saveurs marines qui saura satisfaire les amateurs de fruits de mer.', '16.99', 1, 3),
(13, 'Poutine', 'Une montagne de frites croustillantes, recouverte de généreux morceaux de fromage en grains fondants et nappée d\'une savoureuse sauce brune. Un mariage parfait entre croquant, fondant et onctuosité qui séduira tous les gourmands.', '14.99', 1, 1),
(14, 'Burger double classique avec frites', 'Deux succulentes galettes de viande juteuses, garnies de fromage fondant, de crudités fraîches et de notre sauce spéciale, le tout enveloppé dans un pain moelleux. Accompagné de frites croustillantes.', '15.99', 2, 5),
(15, 'Filets de poulet avec frites', 'Des morceaux de poulet tendres et juteux, panés avec une délicate couche croustillante, accompagnés de frites dorées à souhait', '13.99', 2, 2),
(17, 'Burger au poulet', 'Un filet de poulet grillé à la perfection, garni de légumes frais et d\'une sauce savoureuse, le tout entre deux moelleux pains à burger', '15.99', 2, 5),
(18, 'Salade grecque', 'Un mélange rafraîchissant de légumes croquants tels que les concombres, les tomates juteuses et les poivrons croquants, agrémentés d\'olives savoureuses, de feta délicatement assaisonnée et d\'une vinaigrette aux herbes aromatiques.', '18.99', 2, 11),
(19, 'Salade végétarienne', 'Un mélange frais de légumes variés tels que les laitues croquantes, les tomates juteuses, les concombres rafraîchissants et les carottes croquantes. Agrémentée de graines et de noix pour une touche de croquant.', '14.99', 2, 7),
(20, 'Tartare de bœuf', 'De tendres morceaux de bœuf finement hachés, assaisonnés avec soin et relevés d\'épices aromatiques. Accompagné de condiments frais tels que des câpres, des oignons rouges et du persil frais.', '24.99', 2, 8),
(21, 'Tartare de légume', 'Des légumes frais finement coupés en dés, tels que les tomates juteuses, les concombres croquants, les poivrons colorés et les oignons rouges. Assaisonné avec des herbes fraîches, de l\'huile d\'olive et un soupçon de jus de citron pour une note acidulée.', '22.99', 2, 7),
(22, 'Côtes levées (Ribs)', 'Des morceaux de côtes de porc, cuits lentement jusqu\'à ce qu\'ils soient juteux et fondants. Enrobés d\'une délicieuse marinade ou d\'une sauce barbecue fumée, ces ribs vous promettent une explosion de saveurs fumées et une texture tendre à souhait.', '19.99', 2, 2),
(23, 'Un bon p’tit steak', 'Une pièce de viande de qualité, grillée à la perfection pour préserver toute sa tendreté et sa saveur. Servi avec simplicité pour mettre en valeur la qualité de la viande, chaque bouchée est une véritable explosion de plaisir pour les amateurs de steak.', '14.99', 2, 2),
(24, 'Brownie', 'Une pâtisserie moelleuse et dense, avec une croûte légèrement croustillante, remplie de pépites de chocolat fondantes. Chaque bouchée offre une explosion de saveurs chocolatées, un vrai régal pour les amateurs de douceurs sucrées.', '7.99', 3, 9),
(25, 'Cupcake style ferrero', 'Un petit gâteau moelleux, richement garni d\'une crème au chocolat noisette onctueuse et décoré d\'une délicieuse ganache au chocolat. Chaque bouchée vous transporte dans un tourbillon de saveurs rappelant le célèbre Ferrero Rocher. Un dessert irrésistible ', '8.99', 3, 9),
(26, 'Gâteau au fromage et caramel', 'Une croûte croustillante de biscuits émiettés, surmontée d\'un cheesecake velouté et onctueux, sublimé par un tourbillon de caramel doré. Chaque tranche vous offre une expérience divine mêlant la richesse du fromage et la douceur envoûtante du caramel. ', '10.99', 3, 10);

-- --------------------------------------------------------

--
-- Structure de la table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sections`
--

INSERT INTO `sections` (`id`, `nom`) VALUES
(1, 'entrée'),
(2, 'repas'),
(3, 'dessert');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `plats`
--
ALTER TABLE `plats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `section_id` (`section_id`),
  ADD KEY `categorie_id` (`categorie_id`);

--
-- Index pour la table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `employes`
--
ALTER TABLE `employes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `plats`
--
ALTER TABLE `plats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `plats`
--
ALTER TABLE `plats`
  ADD CONSTRAINT `plats_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`),
  ADD CONSTRAINT `plats_ibfk_2` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

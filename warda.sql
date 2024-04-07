-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 08 avr. 2024 à 01:27
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `warda`
--

-- --------------------------------------------------------

--
-- Structure de la table `client_message`
--

CREATE TABLE `client_message` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` int(20) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client_message`
--

INSERT INTO `client_message` (`id`, `user_id`, `username`, `email`, `number`, `message`) VALUES
(2, 3, 'ahmed', 'ahmedmaaoui3@gmail.com', 25572321, 'bnj');

-- --------------------------------------------------------

--
-- Structure de la table `flowers`
--

CREATE TABLE `flowers` (
  `id` int(255) NOT NULL,
  `flower_name` varchar(255) NOT NULL,
  `flower_detail` varchar(255) NOT NULL,
  `flower_price` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `flower_pice_redux` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `flowers`
--

INSERT INTO `flowers` (`id`, `flower_name`, `flower_detail`, `flower_price`, `image`, `flower_pice_redux`) VALUES
(40, 'yasmine', 'fol', 40, 'bloomnation.jpg', 10),
(41, 'Elegant Flower', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodol tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni nostrud exercitation ullamco laboris', 38, 'beach florist.jpg', 0),
(42, 'Flora', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodol tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veni nostrud exercitation ullamco laboris', 50, 'pink bouquet.jpg', 10);

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int(255) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `image_url`) VALUES
(22, 'IMG-6611aee2bdc158.65522793.jpg'),
(23, 'IMG-6611aee65fafb0.33340437.jpg'),
(24, 'IMG-6611aef5391124.92369186.jpg'),
(25, 'IMG-6611af449f9570.90108386.jpg'),
(26, 'IMG-6611af4e087d14.06720947.jpg'),
(27, 'IMG-6611af7c9860a1.76731761.jpg'),
(28, 'IMG-6611af82a76139.27284475.jpg'),
(29, 'IMG-6611af8e193508.02598171.jpg'),
(30, 'IMG-6611b0d21aba92.11774368.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `total_products` varchar(100) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `shop_flower_cart`
--

CREATE TABLE `shop_flower_cart` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `pid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `user_type`) VALUES
(3, 'mariem', 'mariem@gmail.com', '123', 'user'),
(8, 'dali', 'dali@gmail.com', '99', 'admin'),
(9, 'omran', 'omran@gmail.com', '147', 'admin'),
(10, 'firas', 'firas@gmail.com', '123', 'admin'),
(11, 'ahmed', 'ahmedd@gmail.com', '147', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `wishlistt`
--

CREATE TABLE `wishlistt` (
  `id` int(255) NOT NULL,
  `user_ed` int(255) NOT NULL,
  `pid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client_message`
--
ALTER TABLE `client_message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `flowers`
--
ALTER TABLE `flowers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `shop_flower_cart`
--
ALTER TABLE `shop_flower_cart`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `wishlistt`
--
ALTER TABLE `wishlistt`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client_message`
--
ALTER TABLE `client_message`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `flowers`
--
ALTER TABLE `flowers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `shop_flower_cart`
--
ALTER TABLE `shop_flower_cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `wishlistt`
--
ALTER TABLE `wishlistt`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 12 juin 2019 à 11:25
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `catalogue`
--

-- --------------------------------------------------------

--
-- Structure de la table `app_user`
--

DROP TABLE IF EXISTS `app_user`;
CREATE TABLE IF NOT EXISTS `app_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `email` varchar(180) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `app_user`
--

INSERT INTO `app_user` (`id`, `username`, `email`, `password`, `role`) VALUES
(28, 'fdsfd', 'sdf', 'dsfsdf', ''),
(29, 'dfsfd', 'fsdff', 'dsfdf', ''),
(30, 'aaaaaaaaaa', 'aaaaaaaaaaaaa@aaaaaa.fr', '$2y$10$gLQ72pc9ys7ZETlXSSA2MuisN37tyGicJt3I/CFWP.4dmit8/Lyky', ''),
(31, 'aaaaaaaa', 'aa@aaa.fr', '$2y$10$Z//8qkTVMj0GOCcry4Cr9uCTElEx9BOfA1BHel5Gbw2D9gnK0r3Yq', ''),
(33, 'aaaaaaaa<h1>Hééé hooo </h1>', 'aa@aaa.fr111', '$2y$10$Kmq/q88Y8cotdE/9iemIseKqOeUI9Vf20bRhPDgFOReveuzjObYga', ''),
(36, 'aaaaaaaa<h1>Hééé hooo </h1><script>alert()</script>', 'aa@aaa.fr1111', '$2y$10$sDU89byXQ0XLm5AJOCqTueiP9Huj.fDx7BndgOk6rzNWpzWjDuNPi', ''),
(40, 'aaaaaaaa&lt;h1&gt;H&eacute;&eacute;&eacute; hooo &lt;/h1&gt;&lt;script&gt;alert()&lt;/script&gt;', 'aa@aaa.fr111133', '$2y$10$TAvB6u8kqC4egFnZBLxog.XcHwvlU6snPZmXrt/34.FVJrh.SufF2', ''),
(41, 'tttttttttt', 'tttttttt@tttt.fr', '$2y$10$8M/7/8I2I1BUUKrxv8RrZO4QaJPhXtSyxiURVe0lUmYGpwM1Jcf/G', ''),
(43, 'eeeeeeeeeeeeee', 'eeeee@eeee.eee', '$2y$10$qg9Y6WZb6Vt9kuplYCj93u7LNtTCBzo0i0pGVbWG7RRLxapEzCsgu', ''),
(44, 'rere', 'rere@rere.rere', '$2y$10$MUjG44x2aT25oskou55toumR5eYK2tezqi7yxSqgO6t02bp.IoBeu', ''),
(45, 'tttt', 'tttt@tttt.tt', '$2y$10$.kcg..vFsb0g89yKb9h1GOiMgpL501F5lWpfayxROCOc3BLSY0SL.', ''),
(46, 'ttttddd', 'tttt@tttt.ttrezzrtt', '$2y$10$SQDD.57FMjBphlDuD64q2OZa5UFwCAi6eJIGjyTe4pl2prUexe1EG', ''),
(47, 'eeeeeeeeeeee', 'eeeeeeee@eeeeeeeeeeeeeee.fr', '$2y$10$22ymCngJY1.B1pY6h3MGVe4yvBN8shz07FcAY8o8C.sghEQBqA.MO', ''),
(48, 'fffff', 'fffff@ffff.Gr', '$2y$10$.CXNSwpk2vFgQXEY1FDoV.GsDKS6AKG0o74ZV2J9ouRw8574.RIci', ''),
(49, 'fsdfdsfsd', 'aa@aaa.aa', '$2y$10$7ZE4dUQOyDe5zN7f1trKjONIYpftg3HP2EnGUG.ktFsEKWyhIYDG.', ''),
(64, 'Babar', 'babar@babar.babar', '$2y$10$5CEjmX9cHAgM90nrSuxC6OCNbRhQE9V7jv3Tlwhg4bo9YGL1tpd7G', ''),
(66, 'aaaaaaaaa', 'aaaa@aaa.fr', '$2y$10$5.gbsRC3EaFGomSWWN0zAuq9V27xs3b.eb50xEamOOt8AYtQLFg0C', ''),
(78, 'aaaaaaaaa', 'aaaaz@aaa.fr', '$2y$10$BhQs0nD3PEXMblD9rJw8xe5ttDY/WpTTD70Skltqhn0uLPVBjMNAm', ''),
(79, '', '', '$2y$10$ltJSVMvkyRgYaup.r7CdJeMp6Anau8GNu71U11cFpsVFFA8Tc0tWm', ''),
(81, 'aaa', 'zeazeaze@zeazeaz.fr', '$2y$10$mpAR9Fu6WEP7MDPCHffRTulpOBaxZE5X88wazbRNP.zyV1rtK3GrS', ''),
(83, 'ssdfsdf', 'sdfsdf@sdfsdfsd.fr', '$2y$10$4EomU4WfZrOG.GQbcjT8VueVl8UlNBGOWLpH.bt9etRooL.65k726', ''),
(85, 'ssdfsdf', 'sdfsdf@sddfsdfsd.fr', '$2y$10$exvNIDR2EsQ6knJn.C5ZiORPllQ9KisSsAKvYGoV.CLmB/ZJMqwIO', ''),
(92, 'dfsdfsdfsdf', 'fdsfsdfsdf@dfsdf.fr', '$2y$10$HWIQalfcP4Rqr6GM2H02j.zglTDE/MqP2ceiumg/C1RlwQQ9Fe7Ee', ''),
(94, 'fsdfsdf', 'aa@aaa.fr1111D', '$2y$10$e27MfO7UBwHw0voNWCouLOjzcs1CXGWyKbFzA351eQa/LFVSW8U6i', 'user'),
(96, 'admin', 'aa@aaa.fr1111DZ', '$2y$10$0HLNlBYvuJ6NdVu5faz5ye7ATJsO.3DzvF9yS9FZBt/SzYUZ94w72', 'admin'),
(97, 'admin2', 'aa@aaa.fr1111DZFF', '$2y$10$HEkzbRpUlk9DW6Lz9S9XI.fkJn/JjCp8IhiP2sObk2maUkALmTWA6', 'admin'),
(99, 'aaaaaaaaaa', 'aa@aaa.fr111a', '$2y$10$227lrwFqzZM9HaHNubQe6uV3CUemfKUEGkc.9zOsHlitIG0XtzE8G', 'user'),
(100, 'aaaaaaaaaa', 'aa@aaa.fr111a1', '$2y$10$.8r9GUJYbtCfe1MnzC.4muk4AIH9oA9peyLPQ/XD8SbMlXTKxps3.', 'user');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `nbVues` int(10) UNSIGNED DEFAULT '0',
  `date_creation` datetime NOT NULL,
  `date_modification` datetime DEFAULT NULL,
  `etat_publication` tinyint(4) DEFAULT '0',
  `image_name` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `name`, `description`, `price`, `nbVues`, `date_creation`, `date_modification`, `etat_publication`, `image_name`) VALUES
(1, 'Hamac2', 'Pour se reposer après 5 jours de POO', '15.99', 166, '2019-06-03 00:00:00', NULL, 1, 'hamac.jpg'),
(2, 'Parasol', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled.', '101.00', 0, '2019-06-26 00:00:00', NULL, 1, 'parasol.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

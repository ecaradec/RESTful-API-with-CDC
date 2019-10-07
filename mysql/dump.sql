-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql
-- Généré le :  lun. 07 oct. 2019 à 07:33
-- Version du serveur :  5.7.27-log
-- Version de PHP :  7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `crud`
--

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(256),
  `lastname` varchar(256),
  `email` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

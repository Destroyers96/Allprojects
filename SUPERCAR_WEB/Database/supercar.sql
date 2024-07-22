-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 22, 2024 at 10:38 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supercar`
--

-- --------------------------------------------------------

--
-- Table structure for table `accueil`
--

DROP TABLE IF EXISTS `accueil`;
CREATE TABLE IF NOT EXISTS `accueil` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Video` varchar(50) DEFAULT NULL,
  `Photo` varchar(50) DEFAULT NULL,
  `Lien` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `Marque` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Id_voiture` int NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Marque` (`Marque`),
  KEY `Id_voiture` (`Id_voiture`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `accueil`
--

INSERT INTO `accueil` (`Id`, `Video`, `Photo`, `Lien`, `Description`, `Marque`, `Id_voiture`) VALUES
(1, 'TaycanturboS.mp4', NULL, '#', 'Porsche, founded by Ferdinand Porsche in 1931, is synonymous with luxury, performance, and engineering excellence. Renowned for its iconic 911 sports car, Porsche blends tradition with innovation, consistently setting benchmarks in automotive design and technology. With a legacy rooted in motorsport success and a forward-looking approach exemplified by its electric Taycan, Porsche continues to shape the future of high-performance vehicles.', 'Porsche', 0),
(2, NULL, 'Ferrari296gtb.webp', '#', 'Ferrari, founded by Enzo Ferrari in 1939, stands as a symbol of luxury, speed, and Italian craftsmanship. Known for its iconic red cars and prancing horse logo, Ferrari has a rich heritage in motorsport, with numerous victories in Formula 1. Each Ferrari model, from the classic 250 GTO to the modern LaFerrari, epitomizes cutting-edge technology, exceptional design, and unrivaled performance, making the brand a legend in the automotive world.', 'Ferrari', 0),
(3, NULL, 'Jeepwranglerrubicon.webp', '#', 'Jeep, established in 1941, is renowned for its rugged, versatile vehicles that embody adventure and freedom. Originating as a military vehicle in World War II, Jeep has evolved into a beloved brand known for its off-road capabilities and distinctive design. Models like the Wrangler, Cherokee, and Grand Cherokee have become icons, offering a blend of durability, innovation, and comfort. Jeep continues to inspire exploration, staying true to its roots while embracing modern advancements in automotive technology.', 'Jeep', 0),
(5, NULL, 'Ferrarinews.webp', 'https://www.ferrari.com/en-EN/corse-clienti/articles/ferrari-challenge-uk-donington-2024-race-2', 'La victoire à DONINGTON pour retour champion KHERA.', 'Ferrari', 0),
(4, NULL, 'Panamerarecord.webp', 'https://newsroom.porsche.com/en/2024/products/porsche-panamera-record-nuerburgring-nordschleife-36813.html', 'La nouvelle Panamera établit un temps record sur la Nordschleife du Nürburgring.', 'Porsche', 0),
(6, NULL, 'Jeepnews.webp', 'https://www.media.stellantis.com/em-en/jeep/press/jeep-avenger-hits-100-000-orders-driving-jeep-success-to-new-levels', 'La Jeep® Avenger atteint 100 000 commandes, propulsant le succès de Jeep vers de nouveaux niveaux.', 'Jeep', 0),
(7, NULL, 'T-hybrid911.webp', '#', NULL, 'Porsche', 0);

-- --------------------------------------------------------

--
-- Table structure for table `connexion`
--

DROP TABLE IF EXISTS `connexion`;
CREATE TABLE IF NOT EXISTS `connexion` (
  `Id_connexion` varchar(50) NOT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Mot_de_passe` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_connexion`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `Id_contact` int NOT NULL AUTO_INCREMENT,
  `Email` varchar(80) DEFAULT NULL,
  `Message` text,
  `NumTel` int DEFAULT NULL,
  PRIMARY KEY (`Id_contact`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `demande_essaie`
--

DROP TABLE IF EXISTS `demande_essaie`;
CREATE TABLE IF NOT EXISTS `demande_essaie` (
  `Id_demande` int NOT NULL AUTO_INCREMENT,
  `Jour` date DEFAULT NULL,
  `Heure` time DEFAULT NULL,
  `Modele` varchar(50) DEFAULT NULL,
  `Id_voiture` int NOT NULL,
  `Id_inscription` int NOT NULL,
  PRIMARY KEY (`Id_demande`),
  KEY `Id_voiture` (`Id_voiture`),
  KEY `Id_inscription` (`Id_inscription`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `Id_evenement` int NOT NULL AUTO_INCREMENT,
  `Theme` varchar(50) DEFAULT NULL,
  `Date_debut` date DEFAULT NULL,
  `Date_fin` date DEFAULT NULL,
  `Description` text,
  `Photos` varchar(255) DEFAULT NULL,
  `Prix` decimal(10,2) DEFAULT NULL,
  `Location` varchar(50) DEFAULT NULL,
  `Nom` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_evenement`),
  KEY `Nom` (`Nom`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inscription_client`
--

DROP TABLE IF EXISTS `inscription_client`;
CREATE TABLE IF NOT EXISTS `inscription_client` (
  `Id_inscription` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) DEFAULT NULL,
  `Prenom` varchar(20) DEFAULT NULL,
  `Adresse` varchar(150) DEFAULT NULL,
  `NumTel` varchar(15) DEFAULT NULL,
  `Email` varchar(80) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Mot_de_passe` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id_inscription`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marque`
--

DROP TABLE IF EXISTS `marque`;
CREATE TABLE IF NOT EXISTS `marque` (
  `Nom` varchar(50) NOT NULL,
  `Logo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Nom`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `marque`
--

INSERT INTO `marque` (`Nom`, `Logo`) VALUES
('Supercar logo', 'logo.webp'),
('Ferrari', 'Ferrari-logo.webp'),
('Jeep', 'Jeep-logo.webp'),
('Porsche', 'Porsche-logo.webp');

-- --------------------------------------------------------

--
-- Table structure for table `voiture`
--

DROP TABLE IF EXISTS `voiture`;
CREATE TABLE IF NOT EXISTS `voiture` (
  `Id_voiture` int NOT NULL,
  `Modele` varchar(50) DEFAULT NULL,
  `Prix` decimal(15,2) DEFAULT NULL,
  `Photo` varchar(50) DEFAULT NULL,
  `Moteur` varchar(50) DEFAULT NULL,
  `Torque` decimal(15,2) DEFAULT NULL,
  `Speedtime` decimal(1,1) DEFAULT NULL,
  `Topspeed` int DEFAULT NULL,
  `Description` varchar(50) DEFAULT NULL,
  `Nom` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_voiture`),
  KEY `Nom` (`Nom`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

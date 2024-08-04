-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 04, 2024 at 07:53 AM
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
  `Id_marque` int DEFAULT NULL,
  `Id_voiture` int NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Id_voiture` (`Id_voiture`),
  KEY `fk_id_marque` (`Id_marque`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `accueil`
--

INSERT INTO `accueil` (`Id`, `Video`, `Photo`, `Lien`, `Description`, `Id_marque`, `Id_voiture`) VALUES
(1, 'TaycanturboS.mp4', NULL, '#', 'Porsche, founded by Ferdinand Porsche in 1931, is synonymous with luxury, performance, and engineering excellence. Renowned for its iconic 911 sports car, Porsche blends tradition with innovation, consistently setting benchmarks in automotive design and technology. With a legacy rooted in motorsport success and a forward-looking approach exemplified by its electric Taycan, Porsche continues to shape the future of high-performance vehicles.', 4, 0),
(2, NULL, 'Ferrari296gtb.webp', '#', 'Ferrari, founded by Enzo Ferrari in 1939, stands as a symbol of luxury, speed, and Italian craftsmanship. Known for its iconic red cars and prancing horse logo, Ferrari has a rich heritage in motorsport, with numerous victories in Formula 1. Each Ferrari model, from the classic 250 GTO to the modern LaFerrari, epitomizes cutting-edge technology, exceptional design, and unrivaled performance, making the brand a legend in the automotive world.', 2, 0),
(3, NULL, 'Jeepwranglerrubicon.webp', '#', 'Jeep, established in 1941, is renowned for its rugged, versatile vehicles that embody adventure and freedom. Originating as a military vehicle in World War II, Jeep has evolved into a beloved brand known for its off-road capabilities and distinctive design. Models like the Wrangler, Cherokee, and Grand Cherokee have become icons, offering a blend of durability, innovation, and comfort. Jeep continues to inspire exploration, staying true to its roots while embracing modern advancements in automotive technology.', 3, 0),
(5, NULL, 'Ferrarinews.webp', 'https://www.ferrari.com/en-EN/corse-clienti/articles/ferrari-challenge-uk-donington-2024-race-2', 'La victoire à DONINGTON pour retour champion KHERA.', 2, 0),
(4, NULL, 'Panamerarecord.webp', 'https://newsroom.porsche.com/en/2024/products/porsche-panamera-record-nuerburgring-nordschleife-36813.html', 'La nouvelle Panamera établit un temps record sur la Nordschleife du Nürburgring.', 4, 0),
(6, NULL, 'Jeepnews.webp', 'https://www.media.stellantis.com/em-en/jeep/press/jeep-avenger-hits-100-000-orders-driving-jeep-success-to-new-levels', 'La Jeep® Avenger atteint 100 000 commandes, propulsant le succès de Jeep vers de nouveaux niveaux.', 3, 0),
(7, NULL, '911.webp', '#', NULL, 4, 0);

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
  `Id_marque` int DEFAULT NULL,
  PRIMARY KEY (`Id_evenement`),
  KEY `fk_id_marque` (`Id_marque`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `evenement`
--

INSERT INTO `evenement` (`Id_evenement`, `Theme`, `Date_debut`, `Date_fin`, `Description`, `Photos`, `Prix`, `Location`, `Id_marque`) VALUES
(1, 'Porsche Parade', '2024-09-20', '2024-09-23', 'It’s a chance to mingle with other Porsche owners and showcase your vehicle to the judging panel on Friday evening and Saturday morning. And then it’s time for a laid-back road trip along some of the best coastal scenery in southern Africa, ending the day with dinner at the Benguela Cove restaurant near Hermanus. With the support of the City of Cape Town, you can even get to experience the thrill of the racetrack and hone your motorsport skills at a driver training event at Killarney Raceway.', 'porsche_parade.webp', '584.10', 'Killarney International Raceway, South Africa', 4),
(2, 'Camping Weekend', '2024-11-01', NULL, 'Camping isn\'t just about off-roading, it\'s also about unwinding and enjoying the simple pleasures of outdoor living.  From cozy campfires to stargazing under the vast African sky, participants can expect to create unforgettable memories amidst the beauty of nature.', 'camping_weekend.webp', '20.04', 'Klein Tafelberg, Redelinghuys, South Africa', 3),
(3, 'Free guided visits', '2024-11-03', NULL, 'At the Enzo Ferrari Museum in Modena and the Ferrari Museum in Maranello, visitors can experience exhilarating emotions, dreams and true passion for automobiles that only this completely unique place can offer.', 'free_visits.webp', NULL, 'Italy, Maranello and Modena', 2);

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
  `Id_marque` int NOT NULL AUTO_INCREMENT,
  `Marque` varchar(50) NOT NULL,
  `Logo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_marque`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `marque`
--

INSERT INTO `marque` (`Id_marque`, `Marque`, `Logo`) VALUES
(1, 'Supercar', 'logo.webp'),
(2, 'Ferrari', 'Ferrari-logo.webp'),
(3, 'Jeep', 'Jeep-logo.webp'),
(4, 'Porsche', 'Porsche-logo.webp');

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

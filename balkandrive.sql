-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2024 at 02:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `balkandrive`
--

-- --------------------------------------------------------

--
-- Table structure for table `automobil`
--

CREATE TABLE `automobil` (
  `idAuta` int(255) NOT NULL,
  `marka` varchar(30) NOT NULL,
  `tipVozila` varchar(30) NOT NULL,
  `gorivo` varchar(30) NOT NULL,
  `menjac` varchar(30) NOT NULL,
  `klima` varchar(30) NOT NULL,
  `gps` varchar(30) NOT NULL,
  `cena` int(255) NOT NULL,
  `slika` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `automobil`
--

INSERT INTO `automobil` (`idAuta`, `marka`, `tipVozila`, `gorivo`, `menjac`, `klima`, `gps`, `cena`, `slika`) VALUES
(17, 'BMW Serije 3', 'Limuzina', 'Benzin', 'Automatik', 'Da', 'Da', 35, 'bmw3.jpg'),
(18, 'Mercedes-Benz C', 'Coupe/Cabrio', 'Benzin', 'Automatik', 'Da', 'Da', 50, 'mercedes.jpg'),
(20, 'Range Rover Evoque', 'SUV', 'Dizel', 'Automatik', 'Da', 'Da', 45, 'rangeRover.jpg'),
(21, 'VW Tiguan', 'SUV', 'Dizel', 'Manuelni', 'Da', 'Da', 37, 'tiguan.jpg'),
(22, 'Ford Focus', 'Sportback', 'Benzin', 'Manuelni', 'Da', 'Da', 30, 'fordFocus.jpg'),
(23, 'Audi A6', 'Karavn', 'Dizel', 'Automatik', 'Da', 'Da', 45, 'audi.jpg'),
(24, 'Škoda Superb', 'Limuzina', 'Dizel', 'Automatik', 'Da', 'Da', 40, 'skoda.jpg'),
(26, 'Opel Astra K', 'Hatchback', 'Dizel', 'Manuelni', 'Da', 'Da', 38, 'opel.jpg'),
(27, 'Toyota Rav4', 'SUV', 'Dizel', 'Automatik', 'Da', 'Da', 48, 'tojota.jpg'),
(28, 'Fiat 500', 'Hatchback', 'Dizel', 'Manuelni', 'Da', 'Da', 20, 'fiat.jpg'),
(29, 'Peugeot 508', 'Limuzina', 'Dizel', 'Automatik', 'Da', 'Da', 30, 'peugeot.jpg'),
(30, 'Mazda 3', 'Hatchback', 'Dizel', 'Manuelni', 'Da', 'Da', 25, 'mazda.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(255) NOT NULL,
  `ime` varchar(30) NOT NULL,
  `prezime` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `sifra` varchar(50) NOT NULL,
  `rezervisano` smallint(1) DEFAULT NULL,
  `idRezervacije` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `email`, `sifra`, `rezervisano`, `idRezervacije`) VALUES
(4, 'Nikola', 'Matejic', 'admin@admin.com', '751cb3f4aa17c36186f4856c8982bf27', NULL, NULL),
(11, 'Aleksa', 'Petrović', 'aleksapetrovic@gmail.com', '352fcf627587c53232e28a985fe41974', NULL, NULL),
(12, 'Petar', 'Filipovic', 'petarfilipovic@gmail.com', '63a08d97c5a1e2e0cbf1ff72b74a0ea6', NULL, NULL),
(17, 'Dragan', 'Petkovic', 'draganbalkandrive@manager.com', '56707a4a7f90944b24663c2ea9e53fc2', NULL, NULL),
(18, 'Filip', 'Radulovic', 'filipradulovic@gmail.com', 'a21363e796f6626ee8e5579e587a3381', NULL, NULL),
(19, 'Bojan', 'Perisic', 'bojan@manager.com', '80d7effe2429f1548033361aa5e0030b', NULL, NULL),
(20, 'Nikola', 'Matejic', 'matejicn1111@gmail.com', '0cbe8c239c6a1993b9f5b5c63b288abd', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pitanje`
--

CREATE TABLE `pitanje` (
  `idPitanja` int(255) NOT NULL,
  `ime` varchar(30) NOT NULL,
  `prezime` varchar(30) NOT NULL,
  `brTelefona` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `poruka` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija`
--

CREATE TABLE `rezervacija` (
  `idRezervacije` int(255) NOT NULL,
  `idAuta` int(255) DEFAULT NULL,
  `idKorisnika` int(255) DEFAULT NULL,
  `datumPreuzimanja` date NOT NULL,
  `datumVracanja` date NOT NULL,
  `vremePreuzimanja` time NOT NULL,
  `vremeVracanja` time NOT NULL,
  `cena` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `automobil`
--
ALTER TABLE `automobil`
  ADD PRIMARY KEY (`idAuta`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idRezervacije` (`idRezervacije`);

--
-- Indexes for table `pitanje`
--
ALTER TABLE `pitanje`
  ADD PRIMARY KEY (`idPitanja`);

--
-- Indexes for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD PRIMARY KEY (`idRezervacije`),
  ADD KEY `idAuta` (`idAuta`),
  ADD KEY `idKorisnika` (`idKorisnika`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `automobil`
--
ALTER TABLE `automobil`
  MODIFY `idAuta` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pitanje`
--
ALTER TABLE `pitanje`
  MODIFY `idPitanja` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rezervacija`
--
ALTER TABLE `rezervacija`
  MODIFY `idRezervacije` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`idRezervacije`) REFERENCES `rezervacija` (`idRezervacije`);

--
-- Constraints for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD CONSTRAINT `rezervacija_ibfk_1` FOREIGN KEY (`idAuta`) REFERENCES `automobil` (`idAuta`),
  ADD CONSTRAINT `rezervacija_ibfk_2` FOREIGN KEY (`idKorisnika`) REFERENCES `korisnik` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

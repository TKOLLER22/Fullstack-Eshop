-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Po 03.Jún 2024, 22:44
-- Verzia serveru: 10.4.28-MariaDB
-- Verzia PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `kollert`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `druhyzbozi`
--

CREATE TABLE `druhyzbozi` (
  `idDruhy` int(11) NOT NULL,
  `Druh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `druhyzbozi`
--

INSERT INTO `druhyzbozi` (`idDruhy`, `Druh`) VALUES
(1, 'Food'),
(2, 'Suplement');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `kontakt`
--

CREATE TABLE `kontakt` (
  `idKontakt` int(5) NOT NULL,
  `Meno` varchar(255) NOT NULL,
  `Datum` date NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Zprava` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `kontakt`
--

INSERT INTO `kontakt` (`idKontakt`, `Meno`, `Datum`, `Email`, `Zprava`) VALUES
(17, 'Jiri Podrazka', '2024-05-30', 'jiri.podrazka@gmail.com', 'Hele mate to tady hezu.'),
(18, 'Ivan Korcok', '2024-05-30', 'volte.ivana@parlament.sk', 'Serus moj krasny, dufam ze si ma volil.'),
(20, 'Ondrej Pyzamo', '2024-05-30', 'ondrej@gmail.com', 'Kedy pridate rozky, dakujem.'),
(21, 'Sofokles', '2024-05-30', 'myslienky@gmail.com', 'Aky je zmysel zivota?'),
(22, 'Ronnie Coleman', '2024-05-30', 'Ronnie@gmail.yeaBuddy', 'LIGHT WEIGHT BABYYYYYYY! YUUUP!'),
(23, 'Istvan Miro', '2024-05-30', 'IstvankoMirko@gmail.com', 'Kde kupim traktor? Dakujem.\r\n'),
(25, 'Vladko Putin', '2024-05-30', 'vladko.putin@gmail.ru', 'Царь с царицею простился,\nВ путь-дорогу снарядился,'),
(26, 'Tomas Koller', '2024-05-31', 'tomiskoller@gmail.com', 'Serus ');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `objednavky`
--

CREATE TABLE `objednavky` (
  `idObjednavky` int(255) NOT NULL,
  `idZakaznik` int(11) NOT NULL,
  `idZbozi` int(11) NOT NULL,
  `cena` int(255) NOT NULL,
  `DatumObjednavky` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `objednavky`
--

INSERT INTO `objednavky` (`idObjednavky`, `idZakaznik`, `idZbozi`, `cena`, `DatumObjednavky`) VALUES
(17, 36, 4, 35, '2024-05-29'),
(18, 37, 5, 20, '2024-05-30'),
(19, 37, 8, 25, '2024-05-30'),
(20, 37, 9, 55, '2024-05-30'),
(21, 37, 19, 160, '2024-05-30'),
(22, 37, 23, 85, '2024-05-30'),
(23, 37, 27, 60, '2024-05-30'),
(24, 37, 30, 40, '2024-05-30'),
(25, 37, 29, 55, '2024-05-30'),
(26, 37, 6, 70, '2024-05-30'),
(27, 38, 1, 250, '2024-05-30'),
(28, 38, 2, 35, '2024-05-30'),
(29, 38, 4, 35, '2024-05-30'),
(30, 38, 11, 600, '2024-05-30'),
(31, 38, 11, 600, '2024-05-30'),
(32, 38, 17, 1250, '2024-05-30'),
(33, 38, 24, 40, '2024-05-30'),
(34, 38, 26, 50, '2024-05-30'),
(35, 38, 7, 40, '2024-05-30'),
(36, 38, 14, 45, '2024-05-30'),
(37, 38, 8, 25, '2024-05-30'),
(38, 38, 5, 20, '2024-05-30'),
(39, 38, 9, 55, '2024-05-30'),
(40, 38, 12, 60, '2024-05-30'),
(41, 38, 13, 70, '2024-05-30'),
(42, 38, 20, 120, '2024-05-30'),
(43, 38, 23, 85, '2024-05-30'),
(44, 36, 5, 20, '2024-05-30'),
(45, 36, 8, 25, '2024-05-31'),
(46, 36, 14, 45, '2024-06-03'),
(47, 36, 4, 35, '2024-06-03');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `zakaznik`
--

CREATE TABLE `zakaznik` (
  `idZakaznik` int(255) NOT NULL,
  `Meno` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Heslo` varchar(255) NOT NULL,
  `Mesto` varchar(255) NOT NULL,
  `Adresa` varchar(255) NOT NULL,
  `TelefonneCislo` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `zakaznik`
--

INSERT INTO `zakaznik` (`idZakaznik`, `Meno`, `Email`, `Heslo`, `Mesto`, `Adresa`, `TelefonneCislo`) VALUES
(36, 'Tomas Koller', 'tomiskoller@gmail.com', '955db0b81ef1989b4a4dfeae8061a9a6', 'Bratislava', 'Krasnohorska 9', '737892927'),
(37, 'Imro Jonapot', 'madarko@gmail.com', 'c2dacd43a5114bcecdcafe11185b9201', 'Budapest', 'Koszonom', '9222333444'),
(38, 'Vladimir Putin', 'vladko@gmail.ru', '7df2b40a7f0e167cddf0c53b3df5ac5e', 'Moskwa', 'Mogolska 9', '9111488455'),
(39, 'Admin', 'admin@admin.cz', '21232f297a57a5a743894a0e4a801fc3', '0000', '0000', '0000');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `zbozi`
--

CREATE TABLE `zbozi` (
  `idZbozi` int(11) NOT NULL,
  `Nazov` varchar(255) NOT NULL,
  `KodProduktu` varchar(255) NOT NULL,
  `PocetKusov` int(11) NOT NULL,
  `DruhZbozi` int(11) NOT NULL,
  `Cena` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `zbozi`
--

INSERT INTO `zbozi` (`idZbozi`, `Nazov`, `KodProduktu`, `PocetKusov`, `DruhZbozi`, `Cena`) VALUES
(1, 'Articular Drink Malina', 'ArtDriMal', 300, 2, 250),
(2, 'BigShock Berry', 'BigShBer', 200, 2, 35),
(3, 'BigShock Exotic', 'BigShEx', 0, 2, 35),
(4, 'BigShock Mango', 'BigShMan', 100, 2, 35),
(5, 'Bohemia sunka', 'BohSunka', 150, 1, 20),
(6, 'Syr Cheddar', 'SyrChed', 200, 1, 70),
(7, 'Colagen Tycinka', 'ColagTyc', 100, 2, 40),
(8, 'Debrecinska Sunka', 'DebrSunk', 200, 1, 25),
(9, 'Debrecinske Parky', 'DebrPark', 150, 1, 55),
(10, 'Emmental Syr', 'EmmSyr', 300, 1, 65),
(11, 'Enjoy Preworkout Crystal', 'EnjPreworkCrys', 200, 2, 600),
(12, 'Frankfurtske parky', 'FrankPark', 150, 1, 60),
(13, 'Gouda Syr', 'GouSyr', 100, 1, 70),
(14, 'Grand Tycinka Karamel', 'GranTycKar', 150, 2, 45),
(15, 'Grand Tycinka Ovocna', 'GranTycOvo', 300, 2, 45),
(16, 'Infinity Tycinka Kokos', 'InfiTycKok', 100, 2, 40),
(17, 'JustWhey Protein Kokos', 'JuWheProtKok', 100, 2, 1250),
(18, 'Kruti Sunka', 'KruSunk', 150, 1, 25),
(19, 'Kure Cele', 'KurCel', 100, 1, 160),
(20, 'Kureci Stehna', 'KurSteh', 100, 1, 120),
(21, 'Hovezi Mlete', 'HovMlet', 100, 1, 90),
(22, 'Kureci Mlete', 'KurMlet', 100, 1, 79),
(23, 'Veprove Mlete', 'VeprMlet', 100, 1, 85),
(24, 'Monster Mango', 'MonstMan', 150, 2, 40),
(25, 'Psyllium Vlaknina', 'PsyllVlak', 100, 2, 220),
(26, 'RedBull Sugar-free', 'RedSugFr', 100, 2, 50),
(27, 'Vajcia L 10ks', 'VajcL10', 150, 1, 60),
(28, 'Veprova Sunka', 'VeprSunk', 150, 1, 25),
(29, 'Viedenske Parky', 'ViedPark', 150, 1, 55),
(30, 'Zemiaky B Volne', 'ZemBVol', 300, 1, 40);

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `druhyzbozi`
--
ALTER TABLE `druhyzbozi`
  ADD PRIMARY KEY (`idDruhy`),
  ADD UNIQUE KEY `Druh` (`Druh`);

--
-- Indexy pre tabuľku `kontakt`
--
ALTER TABLE `kontakt`
  ADD PRIMARY KEY (`idKontakt`);

--
-- Indexy pre tabuľku `objednavky`
--
ALTER TABLE `objednavky`
  ADD PRIMARY KEY (`idObjednavky`),
  ADD KEY `Zbozi` (`idZbozi`),
  ADD KEY `idZakaznik` (`idZakaznik`);

--
-- Indexy pre tabuľku `zakaznik`
--
ALTER TABLE `zakaznik`
  ADD PRIMARY KEY (`idZakaznik`),
  ADD UNIQUE KEY `Heslo` (`Heslo`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `TelefonneCislo` (`TelefonneCislo`);

--
-- Indexy pre tabuľku `zbozi`
--
ALTER TABLE `zbozi`
  ADD PRIMARY KEY (`idZbozi`),
  ADD UNIQUE KEY `Nazov` (`Nazov`),
  ADD UNIQUE KEY `KodProduktu` (`KodProduktu`),
  ADD KEY `DruhZbozi` (`DruhZbozi`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `druhyzbozi`
--
ALTER TABLE `druhyzbozi`
  MODIFY `idDruhy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pre tabuľku `kontakt`
--
ALTER TABLE `kontakt`
  MODIFY `idKontakt` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pre tabuľku `objednavky`
--
ALTER TABLE `objednavky`
  MODIFY `idObjednavky` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pre tabuľku `zakaznik`
--
ALTER TABLE `zakaznik`
  MODIFY `idZakaznik` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pre tabuľku `zbozi`
--
ALTER TABLE `zbozi`
  MODIFY `idZbozi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Obmedzenie pre exportované tabuľky
--

--
-- Obmedzenie pre tabuľku `objednavky`
--
ALTER TABLE `objednavky`
  ADD CONSTRAINT `objednavky_ibfk_1` FOREIGN KEY (`IdZbozi`) REFERENCES `zbozi` (`idZbozi`),
  ADD CONSTRAINT `objednavky_ibfk_2` FOREIGN KEY (`idZakaznik`) REFERENCES `zakaznik` (`idZakaznik`),
  ADD CONSTRAINT `objednavky_ibfk_3` FOREIGN KEY (`idZbozi`) REFERENCES `zbozi` (`idZbozi`);

--
-- Obmedzenie pre tabuľku `zbozi`
--
ALTER TABLE `zbozi`
  ADD CONSTRAINT `zbozi_ibfk_1` FOREIGN KEY (`DruhZbozi`) REFERENCES `druhyzbozi` (`idDruhy`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Št 09.Máj 2024, 09:09
-- Verzia serveru: 10.4.32-MariaDB
-- Verzia PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `andrejcak3a`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `t_products`
--

CREATE TABLE `t_products` (
  `id` int(11) NOT NULL,
  `model` varchar(100) NOT NULL,
  `značka` varchar(100) NOT NULL,
  `popis` varchar(300) NOT NULL,
  `cena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `t_products`
--

INSERT INTO `t_products` (`id`, `model`, `značka`, `popis`, `cena`) VALUES
(1, 'Kia', 'Ceed', 'Silver\r\n1,0 T-GDi M6 (Benzín, manuálna prevodovka); 74 kW (100 k)', 14000),
(2, 'E46', 'BMW', 'objem 1.9l 77 kW (presný objem 1895 cm³) a 1.8l 85 kW (1796 cm³) Valvetronic', 3000),
(3, 'Corolla', 'Toyota', ' Motor: 1.8-litrový benzínový motor, výkon 140 konských síl; Palivo: Benzín; Pohon: Přední náhon; Spotřeba paliva: 6.5 l/100 km kombinovaně.', 20000),
(4, '3 Series', 'BMW', ' Motor: 2.0-litrový štvorvalcový turbodiesel, výkon 190 konských síl; Palivo: Diesel; Pohon: Zadní náhon; Spotreba paliva: 5.0 l/100 km kombinovane.', 40000),
(5, 'Mustang', 'Ford', 'Motor: 5.0-litrový osemválcový benzínový motor, výkon 450 konských síl; Palivo: Benzín; Pohon: Zadní náhon; Spotreba paliva: 12.0 l/100 km kombinovane.', 35000),
(6, 'Golf', 'Volkswagen', 'Motor: 1.5-litrový štvorvlcový turbodiesel, výkon 130 konských síl; Palivo: Diesel; Pohon: Prední náhon; Spotreba paliva: 4.5 l/100 km kombinovane.', 25000),
(7, 'Model 3', 'Tesla', ' Motor: Elektrický motor, výkon 283 konských síl; Palivo: ElektRina; Pohon: Zadní náhon; Dojazd: 530 km na jedno nabití.', 45000),
(8, 'C-Class', 'Mercedes-Benz', 'Motor: 2.0-litrový štvorvalcový turbodiesel, výkon 204 konských síl; Palivo: Diesel; Pohon: Zadní náhon; Spotreba paliva: 4.8 l/100 km kombinovane.', 50000),
(9, 'A4', 'Audi', 'Motor: 2.0-litrový štvorvalcový turbobenzín, výkon 190 konských síl; Palivo: Benzín; Pohon: Prední náhon; Spotreba paliva: 6.0 l/100 km kombinovane.', 42000),
(10, 'Silverado', 'Chevrolet', 'Motor: 5.3-litrový osemválcový benzinový motor, výkon 355 konských síl; Palivo: Benzín; Pohon: Zadní náhon; Spotreba paliva: 14.0 l/100 km kombinovane.', 35000);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `t_user`
--

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `t_user`
--

INSERT INTO `t_user` (`id`, `username`, `password`, `email`) VALUES
(1, 'Test1', '$2y$10$MAXA814GiTE9WaH5JonA2.SFJm7XVBwbbsF8ngRpvTQS.GiU7Apjm', '123@gmail.c'),
(2, 'andrejcaksimon', '$2y$10$LHw6KV32nQ00rKupuFxN0eOTVZK7NKmuqvKQKJEn5rABdg/12abXm', 'andrejcaksi');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `t_products`
--
ALTER TABLE `t_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `t_products`
--
ALTER TABLE `t_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pre tabuľku `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

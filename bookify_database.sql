-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2024 at 11:07 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookify_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `id` int(11) NOT NULL,
  `NOM_ADMIN` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `NOM_ADMIN`, `password`, `EMAIL`) VALUES
(2, 'zakaria', '$2y$12$iq6TJG3FsOGrSoocq25o3eleXhqe6jUAubYdL/WZjwZ42ito89EF6', 'zakaria@gmail.com\r\n'),
(3, 'zakaria/zyko', '$2y$12$ZQUwjfz.sHNPUxcbjoIdRuisjoSwcfzB.IVB/K1cjpnCHsilLOF/S', 'zakariataouaf@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `avis`
--

CREATE TABLE `avis` (
  `ID_AVIS` int(11) NOT NULL,
  `ID_RESERVATEUR` int(11) NOT NULL,
  `ID_IMMOBILIER` int(11) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  `DATE_PUBLICATION` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `immobiliers`
--

CREATE TABLE `immobiliers` (
  `ID_IMMOBILIER` int(11) NOT NULL,
  `TYPE` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Disponibilité` tinyint(1) NOT NULL DEFAULT 1,
  `Surface` int(11) DEFAULT NULL,
  `Prix` int(11) DEFAULT NULL,
  `Image` varchar(255) NOT NULL,
  `date_up` date NOT NULL DEFAULT current_timestamp(),
  `ID_UTILISATEUR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `immobiliers`
--

INSERT INTO `immobiliers` (`ID_IMMOBILIER`, `TYPE`, `ville`, `Description`, `Disponibilité`, `Surface`, `Prix`, `Image`, `date_up`, `ID_UTILISATEUR`) VALUES
(2, 'Riad', 'Rabat', 'aeafaejiaojfoiajfieafafae', 0, 80, 15, '', '2024-02-25', 51),
(3, 'Riad', 'Marakkech', 'aeafaejiaojfoiajfieafafae', 0, 80, 50, '', '2024-02-25', 51),
(4, 'Riad', 'Marakkech', 'zzzzzzzz', 0, 80, 1, '', '2024-02-25', 51),
(5, 'Riad', 'Rabat', 'zzzzzzzz', 0, 80, 40, '', '2024-02-25', 51),
(6, 'Riad', 'Tanger', 'zzzzzzzz', 0, 80, 300, '', '2024-02-25', 51),
(7, 'Riad', 'Tanger', 'zzzzzzzz', 0, 80, 150, '', '2024-02-25', 51),
(8, 'Apparetement', 'Hoceima', 'zzzzzzzz', 0, 80, 2, '', '2024-02-25', 51),
(9, 'Riad', 'Rabat', 'zzzzzzzz', 0, 80, 3, '', '2024-02-25', 51),
(10, 'Riad', 'Marakkech', 'zzzzzzzz', 0, 80, 2, '', '2024-02-25', 51),
(16, 'Villa', 'Marrakech', 'mini pool, wifi, garage', 1, NULL, NULL, 'immobiliers/aLFqnTHIGNzaqmiCjMz4oAjygwyPw5g1LPKBgBhn.png', '2024-02-25', 45),
(18, 'Maison', 'Ifrane', 'ahfaihfauifafa', 1, NULL, NULL, 'immobiliers/1ghwt2vrDW4Rote157LAFlZcn8jMAO0rxRDC1qh3.png', '2024-02-25', 45),
(19, 'Riad', 'Fes', 'faefiaefao', 1, NULL, NULL, 'immobiliers/tNCHVaMREK9k8LJw9mbBhDxH2XhnjfiCsDkOAXUG.png', '2024-02-25', 45);

-- --------------------------------------------------------

--
-- Table structure for table `immobiliers_pas_encore_accepté`
--

CREATE TABLE `immobiliers_pas_encore_accepté` (
  `ID` int(11) NOT NULL,
  `ID_UTILISATEUR` int(11) NOT NULL,
  `TYPE` varchar(255) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  `SURFACE` int(11) NOT NULL,
  `PRIX` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `immobiliers_réservés`
--

CREATE TABLE `immobiliers_réservés` (
  `ID_RESERVATION` int(11) NOT NULL,
  `ID_IMMOBILIER` int(11) NOT NULL,
  `ID_RESERVATEUR` int(11) NOT NULL,
  `DATE_RESERVATION` date NOT NULL,
  `DATE_DEBUT` date NOT NULL,
  `DATE_FIN` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `immobiliers_réservés`
--

INSERT INTO `immobiliers_réservés` (`ID_RESERVATION`, `ID_IMMOBILIER`, `ID_RESERVATEUR`, `DATE_RESERVATION`, `DATE_DEBUT`, `DATE_FIN`) VALUES
(1290, 7, 60, '2024-01-01', '2024-03-07', '2024-03-27'),
(1291, 7, 60, '2024-01-02', '2024-03-07', '2024-03-27'),
(1292, 7, 60, '2024-01-02', '2024-03-07', '2024-03-27'),
(1293, 3, 38, '2024-02-07', '2024-03-05', '2024-03-20'),
(1294, 3, 38, '2024-02-15', '2024-03-05', '2024-03-20'),
(1295, 3, 38, '2024-02-15', '2024-03-05', '2024-03-20'),
(1296, 3, 38, '2024-02-15', '2024-03-05', '2024-03-20'),
(1297, 3, 38, '2024-03-01', '2024-03-05', '2024-03-20'),
(1298, 3, 38, '2024-03-01', '2024-03-05', '2024-03-20'),
(1299, 3, 38, '2024-02-15', '2024-03-05', '2024-03-20'),
(1300, 3, 38, '2024-02-15', '2024-03-05', '2024-03-20'),
(1301, 3, 38, '2024-04-01', '2024-03-05', '2024-03-20'),
(1302, 3, 38, '2024-04-15', '2024-03-05', '2024-03-20'),
(1303, 3, 38, '2024-04-15', '2024-03-05', '2024-03-20'),
(1304, 3, 38, '2024-04-01', '2024-03-05', '2024-03-20'),
(1305, 3, 38, '2024-04-15', '2024-03-05', '2024-03-20'),
(1306, 3, 38, '2024-04-15', '2024-03-05', '2024-03-20'),
(1307, 8, 36, '2024-03-20', '2024-03-04', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `reservateur`
--

CREATE TABLE `reservateur` (
  `id` int(11) NOT NULL,
  `NOM_UTILISATEUR` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `DATE_INSCRIPTION` date DEFAULT current_timestamp(),
  `compte_status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservateur`
--

INSERT INTO `reservateur` (`id`, `NOM_UTILISATEUR`, `password`, `email`, `DATE_INSCRIPTION`, `compte_status`) VALUES
(17, 'zakaria@gmail.com', '$2y$12$yP21ZBX4Bvx52.mWInNuduFelxFrbEHYstrDXHTudvOBXRe4erVKK', 'zakaria@gmail.com', '2024-02-05', 'BANNED'),
(18, 'ilyas', '$2y$12$4frDjuYXnFdfmCEf.027l.muEmbm31iKcv3W0jluCsTEezV4RJmXq', 'ilyas22@gmail.com', '2024-02-05', ''),
(20, 'Mr. Nicholaus Wunsch II', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'durgan.adam@example.org', '2023-11-20', ''),
(21, 'Paris Kozey', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'leslie.orn@example.net', '2023-07-25', ''),
(22, 'Ms. Mittie Raynor', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'terry.dashawn@example.net', '2024-02-07', ''),
(23, 'Holden Langworth', '$2y$12$xzo30yDNpt76qTIR8SwlYOpZXZLh2csPS7HEWns/4cxZ19LvXH3Me', 'zane54@example.org', '2024-01-30', ''),
(24, 'Miss Vicky Halvorson', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'muriel57@example.com', '2023-07-30', ''),
(25, 'Lucienne Heller', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'russel.chelsea@example.com', '2023-09-18', ''),
(26, 'Mr. Rashawn Wunsch', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'fgaylord@example.com', '2023-09-05', ''),
(27, 'Miss Sonia Gibson DVM', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'loma.conn@example.com', '2023-03-18', ''),
(28, 'Albertha Nitzsche III', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'nitzsche.lionel@example.com', '2023-07-12', 'ACTIVE'),
(29, 'Tyrell Hoppe', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hirthe.gaston@example.net', '2023-08-21', ''),
(30, 'Mikel Wisoky', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'mylene23@example.org', '2023-03-29', ''),
(31, 'Annamae Kovacek', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'paxton.emmerich@example.net', '2023-07-05', 'ACTIVE'),
(33, 'Miss Cathryn Toy III', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'domenic.pacocha@example.net', '2023-08-22', ''),
(34, 'Dr. Malcolm O\'Hara', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'abelardo.ratke@example.org', '2023-06-13', ''),
(35, 'Maxime Schuster DVM', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'kub.kyle@example.net', '2023-06-24', ''),
(36, 'Davonte Rau', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'levi.tillman@example.net', '2023-11-26', ''),
(37, 'Bret Rodriguez', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'rippin.keshawn@example.org', '2023-06-30', 'ACTIVE'),
(38, 'Brandy Walker', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ocie52@example.net', '2023-12-16', ''),
(39, 'Terry Nader', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'reinger.keira@example.org', '2023-05-22', ''),
(40, 'Lily Lind', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'zeffertz@example.net', '2024-01-16', ''),
(41, 'Juana Quigley', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'bartell.althea@example.net', '2023-08-06', ''),
(42, 'Marlee O\'Conner Sr.', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'zander.bode@example.com', '2023-11-21', ''),
(43, 'Jazmyn Cremin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'cartwright.emmy@example.net', '2023-05-23', ''),
(44, 'Eve Johnston III', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'schoen.dorothy@example.com', '2023-11-21', ''),
(45, 'Addie Kautzer III', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'balistreri.dashawn@example.net', '2023-12-29', 'ACTIVE'),
(46, 'Makayla Torphy Jr.', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hope78@example.com', '2023-12-17', ''),
(47, 'Gerald Ankunding', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ppollich@example.net', '2023-03-16', ''),
(48, 'Taurean Wiegand', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'leonie.abshire@example.com', '2023-12-11', ''),
(49, 'Corine Stoltenberg', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'cartwright.shakira@example.org', '2023-03-05', ''),
(50, 'Yasmine Hill', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'heath.west@example.net', '2023-09-15', ''),
(51, 'Creola Kessler IV', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'reinhold.murray@example.org', '2023-03-25', ''),
(53, 'zakaria taouaf', '$2y$12$MDO9q0aCutymtwe8Tb45Kuwm1px/cuW2BWd/wAENsVVqR9VksBEmW', 'marwa@gmail.com', '2024-02-18', ''),
(54, 'zakaria taouaf', '$2y$12$SDvybvJs3hnzk/j..y/7UeNcsn7/ywWmFdeBpn5s0rT/JMRJuQ41e', 'marwa123@gmail.com', '2024-02-18', ''),
(56, 'Nick James', '$2y$12$89HrcGnczBRJCJIcMyQfx.geHUafo90DV2m2bMZGPLy/LsBA/MQdW', 'nickjames@gmail.com', '2024-02-18', ''),
(57, 'Nick James', '$2y$12$gNUCmNyW61.nqt4P4m9pq.35AZNBBn1hW.HJ3q8DDk5W3FRz00eza', 'zakariaaaa@gmail.com', '2024-02-18', ''),
(58, 'Nick James', '$2y$12$LELXF0FbtZINfOG/k/0LdOJfKqCBv5pxIoPNouEAyb.4t/lsH86OC', 'zakaria@gmafafafail.com', '2024-02-18', ''),
(59, 'fafaefaefafafaef', '$2y$12$uzQZn4UOG6emR4LheR7EDuNtqPvw90jN42Q3vUiJW83ObPSrJ4OxS', 'zane54aaaaaa@example.org', '2024-02-18', ''),
(60, 'aofoaefioeaj', '$2y$12$1J4uV5k/ORI52GuWOWPJb.28GQW..MdAm94qMCafCiSn0RUd0Ibo6', 'fafa@fafafaaA.com', '2024-02-18', 'ACTIVE'),
(61, 'youssef', '$2y$12$UGFyhl0EJ/dEg/fvy4LiUuYAzvQlnv3ul7D1Vr5qi/GQ5ZS.g1qHm', 'youssef@gmail.com', '2024-03-03', '');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs_exclus`
--

CREATE TABLE `utilisateurs_exclus` (
  `ID_BANNISSEMENT` int(11) NOT NULL,
  `ID_UTILISATEUR` int(11) NOT NULL,
  `DATE_BANNISSEMENT` date NOT NULL DEFAULT current_timestamp(),
  `RAISON` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`ID_AVIS`),
  ADD KEY `ID_RESERVATEUR` (`ID_RESERVATEUR`),
  ADD KEY `ID_IMMOBILIER` (`ID_IMMOBILIER`);

--
-- Indexes for table `immobiliers`
--
ALTER TABLE `immobiliers`
  ADD PRIMARY KEY (`ID_IMMOBILIER`),
  ADD KEY `ID_PROPRIETAIRE` (`ID_UTILISATEUR`);

--
-- Indexes for table `immobiliers_pas_encore_accepté`
--
ALTER TABLE `immobiliers_pas_encore_accepté`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_PROPRIETAIRE` (`ID_UTILISATEUR`);

--
-- Indexes for table `immobiliers_réservés`
--
ALTER TABLE `immobiliers_réservés`
  ADD PRIMARY KEY (`ID_RESERVATION`),
  ADD KEY `ID_IMMOBILIER` (`ID_IMMOBILIER`),
  ADD KEY `ID_RESERVATEUR` (`ID_RESERVATEUR`);

--
-- Indexes for table `reservateur`
--
ALTER TABLE `reservateur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateurs_exclus`
--
ALTER TABLE `utilisateurs_exclus`
  ADD PRIMARY KEY (`ID_BANNISSEMENT`),
  ADD KEY `ID_UTILISATEUR` (`ID_UTILISATEUR`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `avis`
--
ALTER TABLE `avis`
  MODIFY `ID_AVIS` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `immobiliers`
--
ALTER TABLE `immobiliers`
  MODIFY `ID_IMMOBILIER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `immobiliers_pas_encore_accepté`
--
ALTER TABLE `immobiliers_pas_encore_accepté`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `immobiliers_réservés`
--
ALTER TABLE `immobiliers_réservés`
  MODIFY `ID_RESERVATION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1308;

--
-- AUTO_INCREMENT for table `reservateur`
--
ALTER TABLE `reservateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `utilisateurs_exclus`
--
ALTER TABLE `utilisateurs_exclus`
  MODIFY `ID_BANNISSEMENT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `avis_ibfk_1` FOREIGN KEY (`ID_RESERVATEUR`) REFERENCES `reservateur` (`id`);

--
-- Constraints for table `immobiliers`
--
ALTER TABLE `immobiliers`
  ADD CONSTRAINT `immobiliers_ibfk_1` FOREIGN KEY (`ID_UTILISATEUR`) REFERENCES `reservateur` (`id`);

--
-- Constraints for table `immobiliers_pas_encore_accepté`
--
ALTER TABLE `immobiliers_pas_encore_accepté`
  ADD CONSTRAINT `immobiliers_pas_encore_accepté_ibfk_1` FOREIGN KEY (`ID_UTILISATEUR`) REFERENCES `reservateur` (`id`);

--
-- Constraints for table `immobiliers_réservés`
--
ALTER TABLE `immobiliers_réservés`
  ADD CONSTRAINT `immobiliers_réservés_ibfk_1` FOREIGN KEY (`ID_RESERVATEUR`) REFERENCES `reservateur` (`id`),
  ADD CONSTRAINT `immobiliers_réservés_ibfk_2` FOREIGN KEY (`ID_IMMOBILIER`) REFERENCES `immobiliers` (`ID_IMMOBILIER`);

--
-- Constraints for table `utilisateurs_exclus`
--
ALTER TABLE `utilisateurs_exclus`
  ADD CONSTRAINT `utilisateurs_exclus_ibfk_1` FOREIGN KEY (`ID_UTILISATEUR`) REFERENCES `reservateur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2024 at 06:10 PM
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
(1, 'Zakaria', '$2y$12$0cini3fuid9LGEOUaUgVK.5J1H7doJPi/eaZ0d2AjwVNIhLEp4Vvy', 'zakaria@gmail.com');

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
-- Table structure for table `immobilier`
--

CREATE TABLE `immobilier` (
  `ID_IMMOBILIER` int(11) NOT NULL,
  `TYPE` varchar(255) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Disponibilité` varchar(25) NOT NULL,
  `Surface` int(11) NOT NULL,
  `Prix` int(11) NOT NULL,
  `ID_UTILISATEUR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `TYPE` varchar(255) NOT NULL,
  `DATE_RESERVATION` date NOT NULL,
  `DATE_DEBUT` date NOT NULL,
  `DATE_FIN` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservateur`
--

CREATE TABLE `reservateur` (
  `ID_UTILISATEUR` int(11) NOT NULL,
  `NOM_UTILISATEUR` varchar(255) NOT NULL,
  `MOT_DE_PASS` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `DATE_INSCRIPTION` date DEFAULT current_timestamp(),
  `TYPE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservateur`
--

INSERT INTO `reservateur` (`ID_UTILISATEUR`, `NOM_UTILISATEUR`, `MOT_DE_PASS`, `EMAIL`, `DATE_INSCRIPTION`, `TYPE`) VALUES
(15, 'zakaria@gmail.com', '$2y$10$AxMWWy6PPFCFErPnJ27XqucQY8NnWdwyA70PDLZkXBYph83fyzXyO', 'fafafa@fafafa', '2024-02-05', ''),
(16, 'zakaria@gmail.com', '$2y$10$t1s6ZBQ3s8x5EeAyvZLW3.zYeAJVBzVcf5BCpnBrebv1tyerB.o3S', 'fafafa@fafafa', '2024-02-05', ''),
(17, 'zakaria@gmail.com', '$2y$10$3k4c86GAqmTyzAHn/RrYTucvDJYngMvJdkNR/KipW6Js.ERQW4BEu', 'fafafa@fafafa', '2024-02-05', ''),
(18, 'ilyas', '$2y$10$TeKPjQqV5Csjpk60YPVyiuQEoBoYEYGZFf3JeBB9DkS2rxOhg.moW', 'ilyas22@gmail.com', '2024-02-05', ''),
(20, 'Mr. Nicholaus Wunsch II', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'durgan.adam@example.org', '2023-11-20', ''),
(21, 'Paris Kozey', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'leslie.orn@example.net', '2023-07-25', ''),
(22, 'Ms. Mittie Raynor', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'terry.dashawn@example.net', '2024-02-07', ''),
(23, 'Holden Langworth', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'zane54@example.org', '2024-01-30', ''),
(24, 'Miss Vicky Halvorson', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'muriel57@example.com', '2023-07-30', ''),
(25, 'Lucienne Heller', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'russel.chelsea@example.com', '2023-09-18', ''),
(26, 'Mr. Rashawn Wunsch', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'fgaylord@example.com', '2023-09-05', ''),
(27, 'Miss Sonia Gibson DVM', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'loma.conn@example.com', '2023-03-18', ''),
(28, 'Albertha Nitzsche III', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'nitzsche.lionel@example.com', '2023-07-12', ''),
(29, 'Tyrell Hoppe', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hirthe.gaston@example.net', '2023-08-21', ''),
(30, 'Mikel Wisoky', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'mylene23@example.org', '2023-03-29', ''),
(31, 'Annamae Kovacek', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'paxton.emmerich@example.net', '2023-07-05', ''),
(32, 'Sibyl Padberg', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'treutel.emmett@example.org', '2024-01-05', ''),
(33, 'Miss Cathryn Toy III', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'domenic.pacocha@example.net', '2023-08-22', ''),
(34, 'Dr. Malcolm O\'Hara', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'abelardo.ratke@example.org', '2023-06-13', ''),
(35, 'Maxime Schuster DVM', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'kub.kyle@example.net', '2023-06-24', ''),
(36, 'Davonte Rau', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'levi.tillman@example.net', '2023-11-26', ''),
(37, 'Bret Rodriguez', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'rippin.keshawn@example.org', '2023-06-30', ''),
(38, 'Brandy Walker', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ocie52@example.net', '2023-12-16', ''),
(39, 'Terry Nader', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'reinger.keira@example.org', '2023-05-22', ''),
(40, 'Lily Lind', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'zeffertz@example.net', '2024-01-16', ''),
(41, 'Juana Quigley', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'bartell.althea@example.net', '2023-08-06', ''),
(42, 'Marlee O\'Conner Sr.', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'zander.bode@example.com', '2023-11-21', ''),
(43, 'Jazmyn Cremin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'cartwright.emmy@example.net', '2023-05-23', ''),
(44, 'Eve Johnston III', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'schoen.dorothy@example.com', '2023-11-21', ''),
(45, 'Addie Kautzer III', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'balistreri.dashawn@example.net', '2023-12-29', ''),
(46, 'Makayla Torphy Jr.', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hope78@example.com', '2023-12-17', ''),
(47, 'Gerald Ankunding', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ppollich@example.net', '2023-03-16', ''),
(48, 'Taurean Wiegand', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'leonie.abshire@example.com', '2023-12-11', ''),
(49, 'Corine Stoltenberg', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'cartwright.shakira@example.org', '2023-03-05', ''),
(50, 'Yasmine Hill', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'heath.west@example.net', '2023-09-15', ''),
(51, 'Creola Kessler IV', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'reinhold.murray@example.org', '2023-03-25', '');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs_exclus`
--

CREATE TABLE `utilisateurs_exclus` (
  `ID` int(11) NOT NULL,
  `ID_UTILISATEUR` int(11) NOT NULL,
  `DATE_BANNISSEMENT` date NOT NULL
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
-- Indexes for table `immobilier`
--
ALTER TABLE `immobilier`
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
  ADD PRIMARY KEY (`ID_UTILISATEUR`);

--
-- Indexes for table `utilisateurs_exclus`
--
ALTER TABLE `utilisateurs_exclus`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_UTILISATEUR` (`ID_UTILISATEUR`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `avis`
--
ALTER TABLE `avis`
  MODIFY `ID_AVIS` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservateur`
--
ALTER TABLE `reservateur`
  MODIFY `ID_UTILISATEUR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `utilisateurs_exclus`
--
ALTER TABLE `utilisateurs_exclus`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `avis_ibfk_1` FOREIGN KEY (`ID_RESERVATEUR`) REFERENCES `reservateur` (`ID_UTILISATEUR`);

--
-- Constraints for table `immobilier`
--
ALTER TABLE `immobilier`
  ADD CONSTRAINT `immobilier_ibfk_1` FOREIGN KEY (`ID_UTILISATEUR`) REFERENCES `reservateur` (`ID_UTILISATEUR`);

--
-- Constraints for table `immobiliers_pas_encore_accepté`
--
ALTER TABLE `immobiliers_pas_encore_accepté`
  ADD CONSTRAINT `immobiliers_pas_encore_accepté_ibfk_1` FOREIGN KEY (`ID_UTILISATEUR`) REFERENCES `reservateur` (`ID_UTILISATEUR`);

--
-- Constraints for table `immobiliers_réservés`
--
ALTER TABLE `immobiliers_réservés`
  ADD CONSTRAINT `immobiliers_réservés_ibfk_1` FOREIGN KEY (`ID_RESERVATEUR`) REFERENCES `reservateur` (`ID_UTILISATEUR`);

--
-- Constraints for table `utilisateurs_exclus`
--
ALTER TABLE `utilisateurs_exclus`
  ADD CONSTRAINT `utilisateurs_exclus_ibfk_1` FOREIGN KEY (`ID_UTILISATEUR`) REFERENCES `reservateur` (`ID_UTILISATEUR`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Maj 26, 2025 at 04:37 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobseekersdb`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `Id` int(11) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `DateCreated` date NOT NULL,
  `DateEdited` date DEFAULT NULL,
  `DateDeleted` date DEFAULT NULL,
  `IsActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Id`, `Name`, `DateCreated`, `DateEdited`, `DateDeleted`, `IsActive`) VALUES
(1, 'IT', '2025-05-16', NULL, NULL, 1),
(2, 'Gastronomy', '2025-05-16', NULL, NULL, 1),
(3, 'Blue Collar', '2025-05-16', NULL, NULL, 1),
(4, 'Law', '2025-05-16', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `jobs`
--

CREATE TABLE `jobs` (
  `Id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `JobTypeId` int(1) NOT NULL,
  `Title` varchar(40) NOT NULL,
  `Location` varchar(40) NOT NULL,
  `Salary` decimal(10,0) NOT NULL,
  `Vacancy` int(11) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `CompanyName` varchar(40) NOT NULL,
  `CompanyLocation` varchar(40) NOT NULL,
  `DateCreated` date NOT NULL,
  `DateEdited` date DEFAULT NULL,
  `DateDeleted` date DEFAULT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `CategoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`Id`, `UserId`, `JobTypeId`, `Title`, `Location`, `Salary`, `Vacancy`, `Description`, `CompanyName`, `CompanyLocation`, `DateCreated`, `DateEdited`, `DateDeleted`, `IsActive`, `CategoryId`) VALUES
(2, 10, 2, 'Junior Frontend Developer', 'Warszawa, Polska', 4666, 1, 'Szukamy początkującego web developera do zespołu frontendowego.\r\nWymagana znajomość HTML, CSS oraz podstaw JavaScript.\r\nZapewniamy opiekę mentora oraz elastyczny grafik.', 'Wiśniowski', 'Polska', '2025-05-16', '2025-05-25', '2025-05-23', 1, 1),
(3, 10, 1, 'sad', 'sex', 1, 123, 'asda', 'asdasd', 'sad', '2025-05-16', '2025-05-23', '2025-05-23', 1, 1),
(4, 10, 1, 'asd', 'asdasd', 12, 12, 'saadsasd', 'asd', 'dasdsa', '2025-05-16', '2025-05-23', '2025-05-23', 0, 1),
(5, 10, 1, 'Senior PHP Engineer', 'Warszawa, Polska', 9000, 2, 'sex', 'Wiśniowski', 'Polska', '2025-05-23', '2025-05-23', '2025-05-23', 1, 1),
(6, 10, 3, '`12', 'sad', 12, 112, 'sdadd', 'dsa', 'dsadas', '2025-05-23', '2025-05-25', '2025-05-23', 1, 2),
(7, 10, 1, '`12', 'sad', 12, 112, 'sdadd', 'dsa', 'dsadas', '2025-05-23', '2025-05-23', '2025-05-23', 0, 2),
(8, 10, 1, '`12', 'sad', 12, 112, 'sdadd', 'dsa', 'dsadas', '2025-05-23', '2025-05-23', '2025-05-23', 1, 2),
(9, 10, 1, 'Jebanie', 'asdasd', 12, 12, 'Test', '12', '12', '2025-05-23', '2025-05-24', '2025-05-24', 0, 1),
(10, 10, 1, 'SEx', 'asdasd', 12, 12, 'Test', '12', '12', '2025-05-23', '2025-05-24', '2025-05-24', 0, 1),
(11, 10, 1, 'Test', 'Warszawa, Polska', 200, 12, 'Test', 'Test', 'Test', '2025-05-23', '2025-05-23', '2025-05-23', 1, 4),
(12, 10, 1, 'Sex', 'Siedlce', 2000, 12, 'TEst', 'Test', 'Sex', '2025-05-23', '2025-05-23', '2025-05-23', 0, 3),
(13, 10, 1, 'TEst', 'Test', 12, 12, 'asdasd', 'asdas', 'dadsda', '2025-05-23', '2025-05-23', '2025-05-23', 1, 3),
(14, 10, 1, 'Test', 'This is test', 12, 12, 'asdasd', 'asdas', 'dasdd', '2025-05-23', '2025-05-23', NULL, 1, 3),
(15, 10, 1, 'Test', 'Warszawa, Polska', 122, 1212, 'asdadad', 'adasd', 'addasda', '2025-05-23', '2025-05-23', NULL, 1, 3),
(16, 10, 2, 'Senior Php Developer', 'Warszawa, Polska', 14000, 2, 'Dużo czeba umić', 'Wiśniowski sp.Zoo.Ska', 'test', '2025-05-23', '2025-05-23', '2025-05-23', 0, 1),
(17, 10, 4, 'Senior Laravel Developer', 'Wielogowy', 2000, 2, 'ELegancka tego robota', 'Wiśniowski sp.Zoo.Ska', 'Wielogowy', '2025-05-25', '2025-05-25', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `jobtype`
--

CREATE TABLE `jobtype` (
  `Id` int(11) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `DateCreated` date NOT NULL,
  `DateEdited` date DEFAULT NULL,
  `DateDeleted` date DEFAULT NULL,
  `IsActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `jobtype`
--

INSERT INTO `jobtype` (`Id`, `Name`, `DateCreated`, `DateEdited`, `DateDeleted`, `IsActive`) VALUES
(1, 'Practice', '2025-12-12', NULL, NULL, 1),
(2, 'Full-Time', '2025-12-12', NULL, NULL, 1),
(3, 'Part-Time', '2025-12-12', NULL, NULL, 1),
(4, 'Internship', '2025-12-12', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sort_options`
--

CREATE TABLE `sort_options` (
  `Id` int(11) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Value` varchar(40) NOT NULL,
  `Description` varchar(40) NOT NULL,
  `DateDeleted` date DEFAULT NULL,
  `DateCreated` date NOT NULL,
  `DateEdited` date DEFAULT NULL,
  `IsActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `sort_options`
--

INSERT INTO `sort_options` (`Id`, `Name`, `Value`, `Description`, `DateDeleted`, `DateCreated`, `DateEdited`, `IsActive`) VALUES
(1, 'Oldest', 'date_created_asc', 'Sort by created date', NULL, '2025-12-12', NULL, 1),
(2, 'Latest', 'date_created_desc', 'Sort by created date descending', NULL, '2025-12-12', NULL, 1),
(3, 'Salary High to Low', 'salary_desc', 'Sort by salary ↓', NULL, '2025-12-12', NULL, 1),
(4, 'Salary Low to High', 'salary_asc', 'Sort by salary ↑', NULL, '2025-12-12', NULL, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PhoneNumber` varchar(30) DEFAULT NULL,
  `PasswordHash` varchar(255) NOT NULL,
  `Bio` varchar(255) DEFAULT NULL,
  `Picture` varchar(50) DEFAULT NULL,
  `DateEdited` date DEFAULT NULL,
  `DateCreated` date NOT NULL,
  `DateDeleted` date DEFAULT NULL,
  `IsActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Name`, `Email`, `PhoneNumber`, `PasswordHash`, `Bio`, `Picture`, `DateEdited`, `DateCreated`, `DateDeleted`, `IsActive`) VALUES
(9, 'Jan Kowalski', 'test@gmail.com', '724075420', '$2y$12$u2vOtDICbpv0UWmGfhEjouDxrHOZgC0eXuWzhmALr9C7ACabfh42G', 'Teach Lead in your moma\'s basement', NULL, '2025-05-16', '2025-05-15', '2025-05-16', 0),
(10, 'Wojciech Mucha', 'wojciechmucha12@gmail.com', '724075420', '$2y$12$kiysC59YgMOv9X/v.RkBU.H5MGfas3mFsX/WRTeoFZRG69QB1K.8S', 'Programista', NULL, '2025-05-26', '2025-05-16', NULL, 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_jobs_category` (`CategoryId`),
  ADD KEY `fk_jobType` (`JobTypeId`),
  ADD KEY `fk_user_id` (`UserId`);

--
-- Indeksy dla tabeli `jobtype`
--
ALTER TABLE `jobtype`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `sort_options`
--
ALTER TABLE `sort_options`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jobtype`
--
ALTER TABLE `jobtype`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sort_options`
--
ALTER TABLE `sort_options`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `fk_jobType` FOREIGN KEY (`JobTypeId`) REFERENCES `jobtype` (`Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_jobs_category` FOREIGN KEY (`CategoryId`) REFERENCES `categories` (`Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`UserId`) REFERENCES `users` (`Id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

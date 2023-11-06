-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2023 at 01:35 PM
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
-- Database: `teste_pratico_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `setores`
--

CREATE TABLE `setores` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setores`
--

INSERT INTO `setores` (`id`, `name`) VALUES
(1, 'Administração'),
(2, 'Recursos Humanos'),
(3, 'Financeiro'),
(4, 'Contábil'),
(5, 'Marketing e vendas'),
(6, 'Produção'),
(7, 'Logística'),
(8, 'Tecnologia da informação'),
(9, 'Compras'),
(10, 'Suprimentos');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`) VALUES
(1, 'Michael Williams', 'MichaelJohnson@hotmail.com'),
(2, 'Michael Brown', 'MichaelJones@hotmail.com'),
(3, 'Sarah Jones', 'EmilyWilliams@gmail.com'),
(4, 'Michael Smith', 'EmilyJones@gmail.com'),
(5, 'John Jones', 'MichaelBrown@uol.com.br'),
(6, 'John Jones', 'JohnSmith@gmail.com'),
(7, 'David Johnson', 'MichaelJones@hotmail.com'),
(8, 'David Johnson', 'SarahJones@hotmail.com'),
(9, 'John Johnson', 'JaneSmith@uol.com.br'),
(10, 'Emily Davis', 'JohnDavis@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_setores`
--

CREATE TABLE `user_setores` (
  `setor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_setores`
--

INSERT INTO `user_setores` (`setor_id`, `user_id`) VALUES
(1, 6),
(2, 7),
(2, 8),
(2, 9),
(3, 2),
(3, 10),
(4, 6),
(5, 6),
(5, 7),
(5, 9),
(7, 8),
(7, 10),
(8, 7),
(8, 9),
(9, 6),
(10, 4),
(10, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `setores`
--
ALTER TABLE `setores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_setores`
--
ALTER TABLE `user_setores`
  ADD UNIQUE KEY `unique_relationship` (`setor_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `setores`
--
ALTER TABLE `setores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_setores`
--
ALTER TABLE `user_setores`
  ADD CONSTRAINT `user_setores_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_setores_ibfk_2` FOREIGN KEY (`setor_id`) REFERENCES `setores` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

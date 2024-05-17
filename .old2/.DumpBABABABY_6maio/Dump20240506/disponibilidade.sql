-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12/05/2024 às 20:41
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `babababy_`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `disponibilidade`
--

CREATE TABLE `disponibilidade` (
  `idDisponibilidade` int(11) NOT NULL,
  `fk_idDia` int(11) NOT NULL,
  `fk_idTurno` int(11) NOT NULL,
  `fk_idBaba` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `disponibilidade`
--
ALTER TABLE `disponibilidade`
  ADD PRIMARY KEY (`idDisponibilidade`),
  ADD KEY `fk_idDia_idx` (`fk_idDia`),
  ADD KEY `fk_idTurno_idx` (`fk_idTurno`),
  ADD KEY `fk_idBaba` (`fk_idBaba`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `disponibilidade`
--
ALTER TABLE `disponibilidade`
  MODIFY `idDisponibilidade` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `disponibilidade`
--
ALTER TABLE `disponibilidade`
  ADD CONSTRAINT `fk_idBaba` FOREIGN KEY (`fk_idBaba`) REFERENCES `baba` (`idBaba`),
  ADD CONSTRAINT `fk_idDia` FOREIGN KEY (`fk_idDia`) REFERENCES `dia` (`idDia`),
  ADD CONSTRAINT `fk_idTurno` FOREIGN KEY (`fk_idTurno`) REFERENCES `turno` (`idTurno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25/05/2024 às 00:37
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
-- Estrutura para tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `idAvaliacao` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  `descricao` varchar(150) DEFAULT NULL,
  `fk_idBaba` int(11) NOT NULL,
  `fk_idPais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `baba`
--

CREATE TABLE `baba` (
  `idBaba` int(11) NOT NULL,
  `tempoExp` int(11) NOT NULL,
  `ref` varchar(50) NOT NULL,
  `sobre` varchar(300) NOT NULL,
  `valor` float NOT NULL,
  `fk_idFxEtaria` int(11) NOT NULL,
  `pk_idUsuario` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `baba`
--

INSERT INTO `baba` (`idBaba`, `tempoExp`, `ref`, `sobre`, `valor`, `fk_idFxEtaria`, `pk_idUsuario`, `estado`) VALUES
(8, 2332, 'teste', 'teste', 0, 2, 1, 1),
(9, 2005, '11999999999', 'Primo Rico', 142, 2, 41, 1),
(10, 2005, '111111111111111', 'anito', 120, 1, 44, 0),
(11, 2005, '11999999999', 'Primo Rico', 120, 1, 45, 1),
(12, 2005, '11999999999', 'Primo Rico', 120, 1, 46, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `dia`
--

CREATE TABLE `dia` (
  `idDia` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `dia`
--

INSERT INTO `dia` (`idDia`, `nome`) VALUES
(1, 'Segunda'),
(2, 'Terça'),
(3, 'Quarta'),
(4, 'Quinta'),
(5, 'Sexta'),
(6, 'Sábado'),
(7, 'Domingo');

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
-- Despejando dados para a tabela `disponibilidade`
--

INSERT INTO `disponibilidade` (`idDisponibilidade`, `fk_idDia`, `fk_idTurno`, `fk_idBaba`) VALUES
(1, 1, 1, 9),
(2, 1, 2, 9),
(3, 3, 1, 9),
(4, 3, 2, 9),
(5, 6, 1, 9),
(6, 6, 2, 9),
(7, 7, 1, 9),
(8, 7, 2, 9),
(9, 7, 2, 11),
(10, 5, 1, 12);

-- --------------------------------------------------------

--
-- Estrutura para tabela `fxetaria`
--

CREATE TABLE `fxetaria` (
  `idFxEtaria` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `fxetaria`
--

INSERT INTO `fxetaria` (`idFxEtaria`, `nome`) VALUES
(1, 'Bebê'),
(2, 'Criança'),
(3, 'Infantojuvenil'),
(4, 'Adolescente');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pais`
--

CREATE TABLE `pais` (
  `idPais` int(11) NOT NULL,
  `qtdeCrianca` int(11) NOT NULL,
  `descricao` varchar(300) NOT NULL,
  `pk_idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `pais`
--

INSERT INTO `pais` (`idPais`, `qtdeCrianca`, `descricao`, `pk_idUsuario`) VALUES
(1, 6, 'Via logo', 17),
(2, 4, 'familia de poodle', 18),
(3, 2, 'gostamos de sorvete', 19),
(4, 5, 'linda', 29),
(5, 7, 'lin', 32),
(6, 1, 'fofoleti', 32),
(7, 1, 'uuuuuuuuuuu', 38),
(8, 4, 'LINDA', 47),
(9, 5, 'linda', 48);

-- --------------------------------------------------------

--
-- Estrutura para tabela `proposta`
--

CREATE TABLE `proposta` (
  `idProposta` int(11) NOT NULL,
  `data` date NOT NULL,
  `dataAceite` date DEFAULT NULL,
  `dataRecusa` date DEFAULT NULL,
  `motivoRecusa` varchar(255) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `dataPronto` date DEFAULT NULL,
  `fk_idDisponibilidade` int(11) NOT NULL,
  `fk_idPais` int(11) NOT NULL,
  `fk_Ppk_idUsuario` int(11) NOT NULL,
  `fk_idBaba` int(11) NOT NULL,
  `fk_Bpk_idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `turno`
--

CREATE TABLE `turno` (
  `idTurno` int(11) NOT NULL,
  `nome` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `turno`
--

INSERT INTO `turno` (`idTurno`, `nome`) VALUES
(1, 'Manhã'),
(2, 'Tarde'),
(3, 'Noite');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `sobrenome` varchar(45) NOT NULL,
  `dtaNascimento` date NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `cidade` varchar(20) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `foto` varchar(300) DEFAULT NULL,
  `adm` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `email`, `senha`, `cpf`, `nome`, `sobrenome`, `dtaNascimento`, `telefone`, `cidade`, `endereco`, `foto`, `adm`) VALUES
(1, 'anaju@yho.com', 'Abcd123!', '08012345678', 'Ana Julia', 'Moura', '1991-12-03', '41991234567', 'Curitiba', 'Rua Julia da Costa', NULL, 0),
(14, 'nolna@no.com', 'nonono!@!@qwW!#', '77777777777', 'Nolan', 'Bushnel', '1993-08-23', '66666666666666', 'Colomboq', 'Rua das groselias', NULL, 0),
(15, 'biro@biro.com', '123qwe@!#QE', '555555555', 'Coala', 'cococ', '1993-11-11', '2323232323', 'Biro', 'Biro', NULL, 0),
(16, '4444@4444', 'QWE@!#qwe213', '44444', 'lalal', 'lalalal', '2002-02-22', '4444444', '44444', '44444', NULL, 0),
(17, 'oooooo@oooooo', '!@#QWEeqw312', '55555555555', 'agora via', 'Misericordia kkkkkkk', '2020-02-02', '5555555555555', 'oooooooooo', 'oooooooooo', NULL, 0),
(18, 'bela@linha.com', 'qwe@!#QWE!@#', '232323232323', 'Belinha', 'Maria', '2006-12-28', '1199999999', 'Curitiba', 'Rua Salvador Ferrante ', NULL, 0),
(19, 'nova@novao', '!@#QWE\23eqwe', '1111111', 'novo', 'cadastro', '1993-01-01', '11111', 'São Paulo', 'rua sao paoulao', NULL, 0),
(20, '', '', '', '', '', '0000-00-00', '', '', '', NULL, 0),
(29, 'aaugusto310@gmail.com', 'klbfieowlkbfilewnhfo', '03676190912', 'Oracle Cloud', 'babalu', '2024-05-01', '11999999999', 'Curitba', 'rua baba', NULL, 0),
(30, 'jonçk./,', 'opigouvkj, m', 'bgil;b,', 'adas', 'lhbljkb', '2024-05-01', 'blj; ', 'knb ,m ', 'nhblj;, m', NULL, 0),
(32, 'wfefwFEfeWFE', 'wfeFEwfeWF', 'efwaefaf', 'lfmflf', 'efewafe', '2024-05-07', 'wefwFE', 'WfewE', 'wfeFW', NULL, 0),
(36, 'teste', 'teste', 'teste', 'teste', 'teste', '1964-06-12', 'teste', 'teste', 'teste', 'BABABABABA', 0),
(37, 'anapaulamagnabosco@hotmail.com', '123', '08765487329', 'Oracle Cloud', 'byby', '1992-01-01', '11999999999', '44444', 'rua baba', '', 0),
(38, 'betinho@justo.com', '12', '23123123123', 'Roberto', 'Justos', '1994-12-02', '11999999999', 'Curitba', 'Rua abobrinha 7766', '', 0),
(40, 'bolinha-sab@bao.coma', '213', '06386570910', 'bolha ', 'de sabao', '2007-09-12', '41996339976', 'Biro', 'rua baba', '', 0),
(41, 'barcelona@clune.com', '123', '08387619830', 'Oracle Cloud', 'byby', '1992-01-01', '11999999999', 'Curitba', 'rua baba', '', 0),
(44, 'ana@ijfiehf.com', 'bubububu', '09765480910', 'Oracle Cloud', 'lll', '1111-11-11', '41996339976', 'wwwwwwwww', 'aaaaaaaaaa', 'C:\\xampp\\htdocs\\baba-baby2\\baba-baby2\\src\\cadastro\\arquivos\\Capturar2.PNG.png', 0),
(45, 'anita@anita.com', 'anita', '75432165477', 'ana', 'paula', '1976-08-09', '11999999999', 'Curitba', 'rua baba', 'C:\\xampp\\htdocs\\baba-baby2\\baba-baby2\\src\\cadastro\\arquivos\\Capturar2.PNG.png', 0),
(46, 'anita98@anita.com', 'anita', '98987654675', 'lala', 'lulu', '1111-11-11', '11999999999', 'Curitba', 'rua baba', 'C:\\xampp\\htdocs\\baba-baby2\\src\\cadastro\\arquivos\\Capturar2.PNG.png', 0),
(47, 'HELOHELO@HELO', 'HELOHELO', '27659876190', 'HELO', 'HELO', '2001-01-01', '42121412412', 'FLORIPA', 'rua baba', 'C:\\xampp\\htdocs\\baba-baby2\\baba-baby2\\src\\cadastro\\arquivos\\Capturar2.PNG.png', 0),
(48, 'JUJUBA@COLORIDA.COM', 'jujubacolorida', '98765643910', 'JUJUBA', 'COLORIDA', '1111-11-01', '11999999999', 'Curitba', 'rua baba', 'C:\\xampp\\htdocs\\baba-baby2\\baba-baby2\\src\\cadastro\\arquivos\\Capturar2.PNG.png', 0),
(49, 'admin@admin.com', 'adm@123', '123456789', 'Admilson Admin', 'Administrador', '1996-12-12', '41999999999', 'CWB', 'Beco Diagonal 777', NULL, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`idAvaliacao`),
  ADD KEY `fk_av_idBaba_idx` (`fk_idBaba`),
  ADD KEY `fk_av_idPais_idx` (`fk_idPais`);

--
-- Índices de tabela `baba`
--
ALTER TABLE `baba`
  ADD PRIMARY KEY (`idBaba`,`pk_idUsuario`),
  ADD KEY `fk_idFxEtaria_idx` (`fk_idFxEtaria`),
  ADD KEY `fk_baba_idUsuario_idx` (`pk_idUsuario`);

--
-- Índices de tabela `dia`
--
ALTER TABLE `dia`
  ADD PRIMARY KEY (`idDia`);

--
-- Índices de tabela `disponibilidade`
--
ALTER TABLE `disponibilidade`
  ADD PRIMARY KEY (`idDisponibilidade`),
  ADD KEY `fk_idDia_idx` (`fk_idDia`),
  ADD KEY `fk_idTurno_idx` (`fk_idTurno`),
  ADD KEY `fk_idBaba` (`fk_idBaba`);

--
-- Índices de tabela `fxetaria`
--
ALTER TABLE `fxetaria`
  ADD PRIMARY KEY (`idFxEtaria`);

--
-- Índices de tabela `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`idPais`,`pk_idUsuario`),
  ADD KEY `fk_idUsuario_idx` (`pk_idUsuario`);

--
-- Índices de tabela `proposta`
--
ALTER TABLE `proposta`
  ADD PRIMARY KEY (`idProposta`),
  ADD KEY `fk_prop_idDisponibilidade_idx` (`fk_idDisponibilidade`),
  ADD KEY `fk_prop_idPais_idx` (`fk_idPais`,`fk_Ppk_idUsuario`),
  ADD KEY `fk_prop_idBaba_idx` (`fk_idBaba`,`fk_Bpk_idUsuario`);

--
-- Índices de tabela `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`idTurno`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `idAvaliacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `baba`
--
ALTER TABLE `baba`
  MODIFY `idBaba` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `dia`
--
ALTER TABLE `dia`
  MODIFY `idDia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `disponibilidade`
--
ALTER TABLE `disponibilidade`
  MODIFY `idDisponibilidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `fxetaria`
--
ALTER TABLE `fxetaria`
  MODIFY `idFxEtaria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `pais`
--
ALTER TABLE `pais`
  MODIFY `idPais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `proposta`
--
ALTER TABLE `proposta`
  MODIFY `idProposta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `turno`
--
ALTER TABLE `turno`
  MODIFY `idTurno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `fk_av_idBaba` FOREIGN KEY (`fk_idBaba`) REFERENCES `baba` (`idBaba`),
  ADD CONSTRAINT `fk_av_idPais` FOREIGN KEY (`fk_idPais`) REFERENCES `pais` (`idPais`);

--
-- Restrições para tabelas `baba`
--
ALTER TABLE `baba`
  ADD CONSTRAINT `fk_baba_idUsuario` FOREIGN KEY (`pk_idUsuario`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `fk_idFxEtaria` FOREIGN KEY (`fk_idFxEtaria`) REFERENCES `fxetaria` (`idFxEtaria`);

--
-- Restrições para tabelas `disponibilidade`
--
ALTER TABLE `disponibilidade`
  ADD CONSTRAINT `fk_idBaba` FOREIGN KEY (`fk_idBaba`) REFERENCES `baba` (`idBaba`),
  ADD CONSTRAINT `fk_idDia` FOREIGN KEY (`fk_idDia`) REFERENCES `dia` (`idDia`),
  ADD CONSTRAINT `fk_idTurno` FOREIGN KEY (`fk_idTurno`) REFERENCES `turno` (`idTurno`);

--
-- Restrições para tabelas `pais`
--
ALTER TABLE `pais`
  ADD CONSTRAINT `fk_idUsuario` FOREIGN KEY (`pk_idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Restrições para tabelas `proposta`
--
ALTER TABLE `proposta`
  ADD CONSTRAINT `fk_prop_idBaba` FOREIGN KEY (`fk_idBaba`,`fk_Bpk_idUsuario`) REFERENCES `baba` (`idBaba`, `pk_idUsuario`),
  ADD CONSTRAINT `fk_prop_idDisponibilidade` FOREIGN KEY (`fk_idDisponibilidade`) REFERENCES `disponibilidade` (`idDisponibilidade`),
  ADD CONSTRAINT `fk_prop_idPais` FOREIGN KEY (`fk_idPais`,`fk_Ppk_idUsuario`) REFERENCES `pais` (`idPais`, `pk_idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

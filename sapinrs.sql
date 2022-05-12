-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 12-Maio-2022 às 12:08
-- Versão do servidor: 5.7.24
-- versão do PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sapinrs`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluguel`
--

DROP TABLE IF EXISTS `aluguel`;
CREATE TABLE IF NOT EXISTS `aluguel` (
  `id` int(10) NOT NULL,
  `turno` varchar(50) DEFAULT NULL,
  `STATUS` enum('alugado','disponivel') DEFAULT NULL,
  `fk_login` int(11) DEFAULT NULL,
  `fk_location` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_login` (`fk_login`),
  KEY `fk_location` (`fk_location`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

DROP TABLE IF EXISTS `imagens`;
CREATE TABLE IF NOT EXISTS `imagens` (
  `id` int(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `fk_locacoes` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_locacoes` (`fk_locacoes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `locacoes`
--

DROP TABLE IF EXISTS `locacoes`;
CREATE TABLE IF NOT EXISTS `locacoes` (
  `id` int(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `capacidade` int(10) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fim` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(10) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `senha` varchar(300) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(12) DEFAULT NULL,
  `dt_nasc` date DEFAULT NULL,
  `status` enum('ativo','inativo','analise') NOT NULL,
  `fk_tipo_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tipo_usuario` (`fk_tipo_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `id` int(10) NOT NULL,
  `nome` enum('gerente','colaborador','socio','nSocio') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluguel`
--
ALTER TABLE `aluguel`
  ADD CONSTRAINT `aluguel_ibfk_1` FOREIGN KEY (`fk_login`) REFERENCES `login` (`id`),
  ADD CONSTRAINT `aluguel_ibfk_2` FOREIGN KEY (`fk_location`) REFERENCES `locacoes` (`id`);

--
-- Limitadores para a tabela `imagens`
--
ALTER TABLE `imagens`
  ADD CONSTRAINT `imagens_ibfk_1` FOREIGN KEY (`fk_locacoes`) REFERENCES `locacoes` (`id`);

--
-- Limitadores para a tabela `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`fk_tipo_usuario`) REFERENCES `tipo_usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

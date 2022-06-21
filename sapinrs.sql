-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Jun-2022 às 10:50
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sapinrs`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluguel`
--

CREATE TABLE `aluguel` (
  `id` int(10) NOT NULL,
  `data` date NOT NULL,
  `turno` varchar(50) DEFAULT NULL,
  `status` enum('alugado','analise','cancelado') DEFAULT NULL,
  `fk_login` int(11) DEFAULT NULL,
  `fk_guest` int(11) DEFAULT NULL,
  `fk_location` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aluguel`
--

INSERT INTO `aluguel` (`id`, `data`, `turno`, `status`, `fk_login`, `fk_guest`, `fk_location`) VALUES
(20, '2022-06-23', 'tarde', 'analise', NULL, 27, 5),
(21, '2022-08-05', 'manha', 'alugado', 1, NULL, 25),
(22, '2022-08-05', 'meio-dia', 'alugado', 1, NULL, 25),
(23, '2022-06-25', 'tarde', 'alugado', 1, NULL, 25),
(24, '2022-06-21', 'manha', 'alugado', 1, NULL, 3),
(25, '2022-06-21', 'meio-dia', 'alugado', 1, NULL, 3),
(26, '2022-06-30', 'tarde', 'analise', NULL, 28, 4),
(27, '2022-06-30', 'noite', 'analise', NULL, 28, 4),
(28, '2022-06-23', 'tarde', 'analise', NULL, 29, 3),
(29, '2022-06-23', 'noite', 'analise', NULL, 29, 3),
(30, '2022-06-30', 'noite', 'analise', NULL, 30, 1),
(31, '2022-06-08', 'manha', 'cancelado', 1, NULL, 1),
(33, '2022-08-02', 'meio-dia', 'analise', NULL, 32, 25),
(34, '2022-08-02', 'tarde', 'analise', NULL, 32, 25),
(35, '2044-12-08', 'tarde', 'alugado', 5, NULL, 4),
(36, '2044-12-08', 'noite', 'alugado', 5, NULL, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `guest`
--

CREATE TABLE `guest` (
  `id` int(11) NOT NULL,
  `guest` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `cpf` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `guest`
--

INSERT INTO `guest` (`id`, `guest`, `nome`, `email`, `telefone`, `cpf`) VALUES
(1, 'c64d53576e709af938855305915616a17a20', 'Raul Guedes Oliveira', 'rg.oliveira08@gmail.com', '1111111111', ''),
(2, 'c75cdebbffdfd61e823c007e159551cb9020', 'Raul Guedes Oliveira', 'rg.oliveira08@gmail.com', '1111111111', ''),
(3, '7238acb709b2cc57e58060905861352a47fb', 'Raul Guedes Oliveira', 'rg.oliveira08@gmail.com', '1111111111', ''),
(4, 'b3be18ecb93bbd4e5ee91bc29cbc4e93ac77', 'Raul Guedes Oliveira', 'rg.oliveira08@gmail.com', '1111111111', ''),
(5, '062f2d8a4b0011e26285301dc792bf40ed51', 'Raul Guedes Oliveira', 'rg.oliveira08@gmail.com', '1111111111', ''),
(6, '8fcc8e1f158d706b74f90026fcf07ecae500', 'Raul Guedes Oliveira', 'rg.oliveira08@gmail.com', '1111111111', ''),
(7, '77a4b7a47816f541a314b3347ef2a6570f0b', 'Raul Guedes Oliveira', 'rg.oliveira08@gmail.com', '1111111111', ''),
(8, '95f81b4e2ea6b24dba6739e57c4d5b2a74ea', 'Raul Guedes Oliveira', 'rg.oliveira08@gmail.com', '1111111111', ''),
(9, 'e4154b2060cdce2f2026a1270dc40c6c5388', 'Raul Guedes Oliveira', 'rg.oliveira08@gmail.com', '1111111111', ''),
(10, 'ecb611fb86956bee0d67f968589f5a1b2a78', 'Raul Guedes Oliveira', 'rg.oliveira08@gmail.com', '1111111111', ''),
(11, '584e286e5d15292b248ec93c3c2671f71710', 'Raul Guedes Oliveira', 'rg.oliveira08@gmail.com', '1111111111', ''),
(12, 'dcab3812ddee6e4a2e3ef25a9ee5e0b96ea7', 'Raul Guedes Oliveira', 'rg.oliveira08@gmail.com', '11111111111', ''),
(13, '5dfcf2921a7706807d2a4451edbcc076dd2c', 'Raul Guedes Oliveira', 'rg.oliveira08@gmail.com', '11111111111', ''),
(14, '1a9c968ce77c450309b04be97cb76cc7f5f4', 'Raul Guedes Oliveira', 'rg.oliveira08@gmail.com', '11111111111', ''),
(15, 'ef81848e7433017b1d5a451dd599a52f8b19', 'regina', 'rg.oliveira08@gmail.com', '123', ''),
(16, '4c8f87c3507f5fd17219fe6906c1237406b6', 'regina', 'rg.oliveira08@gmail.com', '123', ''),
(17, '5976f1411dddbee4278255c0beb15cc5941e', 'Porto Alegre', 'rg.oliveira08@gmail.com', '123', ''),
(18, '3cec9ca0400be29d5c4be3d83444d6d519fd', 'Porto Alegre', 'rg.oliveira08@gmail.com', '123', ''),
(19, '2aec3045ea4668cbefdc2a82894370d6fe99', 'Porto Alegre', 'rg.oliveira08@gmail.com', '123', ''),
(20, '5537987da12800426e4c8aa23c3a91fe3ef5', 'Porto Alegre', 'rg.oliveira08@gmail.com', '11111111111', ''),
(21, '01866b462576eee1c8e21085476bedfc5e26', 'Porto Alegre', 'rg.oliveira08@gmail.com', '11111111111', ''),
(22, '2df9ecd81f4eaa8a91434105f2f6c09819d3', 'Porto Alegre', 'rg.oliveira08@gmail.com', '11111111111', ''),
(23, '9db9ba8d4c704350c4853410331e9d8cfdac', 'Porto Alegre', 'rg.oliveira08@gmail.com', '123', ''),
(24, '8eeac2a2382fe23f01b9bc16d23f1ec49d08', 'Raul Guedes Oliveira', 'rg.oliveira08@gmail.com', '11111111111', ''),
(25, '038222aa245b7b7bdb33e940f17f53afd026', 'Porto Alegre', 'rg.oliveira08@gmail.com', '11111111111', ''),
(26, '22b0e56012c33c7713eb29865756df339996', 'Porto Alegre', 'rg.oliveira08@gmail.com', '66666666', '12312312300'),
(27, '1d2a3864ecaebb0ec906974150c3d2aa777a', 'Leandro Stallone', 'leandro@gmail.com', '51 98888666', '12312312200'),
(28, 'c45a4d75572db1bce8b4def5c352fcce0ffe', 'Leandro Uzumaki', 'leandrinhoGameplays@gmail.com', '51 95151515', '55555555500'),
(29, '26ae2739201c639f055060b74490ab936bfc', 'Leandra Egirl', 'leandraEG@gmail.com', '51 94444444', '44444444400'),
(30, '9c2fc69a2eb7f9c0d296414eaa170a89f621', 'Leandro Karnal', 'filosofiamttopmeo@gmail.com', '51 99774020', '22244488877'),
(32, '2acf1fb6e1c9cc0ae1ac0e658fae8a32fb73', 'Leandro Facada', 'usuario1@gmail.com', '12 34444666', '66666666669');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE `imagens` (
  `id` int(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `fk_locacoes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `imagens`
--

INSERT INTO `imagens` (`id`, `nome`, `fk_locacoes`) VALUES
(1, '1.png', 1),
(3, '3.png', 3),
(4, '4.png', 4),
(5, '202206200159095.png', 5),
(10, '202206210002472.png', 25);

-- --------------------------------------------------------

--
-- Estrutura da tabela `locacoes`
--

CREATE TABLE `locacoes` (
  `id` int(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `capacidade` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `locacoes`
--

INSERT INTO `locacoes` (`id`, `nome`, `descricao`, `preco`, `capacidade`) VALUES
(1, 'Salão de Festas', 'bla bla bla', '66.69', 20),
(3, 'Churrasqueira', 'bla bla bla', '66.00', 20),
(4, 'Salão de Festas 2', 'Bla bla bla', '66.69', 18),
(5, 'Auditório', 'easter-egg maluco! :)', '200.00', 68),
(25, 'Piscina', 'piscina satânica!', '666.00', 17);

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id` int(10) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `senha` varchar(300) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(13) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(12) DEFAULT NULL,
  `dt_nasc` date DEFAULT NULL,
  `status` enum('ativo','inativo','analise') NOT NULL,
  `foto` varchar(200) DEFAULT 'usuario.jpg',
  `fk_tipo_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id`, `usuario`, `senha`, `nome`, `cpf`, `email`, `telefone`, `dt_nasc`, `status`, `foto`, `fk_tipo_usuario`) VALUES
(1, 'Raul Guedes', '698dc19d489c4e4db73e28a713eab07b', 'Raul Guedes Oliveira', '8512648021', 'rg.oliveira08@gmail.com1', '51 97740201', '2000-05-02', 'ativo', '20220619185440big mico.jpg', 2),
(3, 'novo', 'b2ca678b4c936f905fb82f2733f5297f', 'novo', '123', 'rg.oliveira08@gmail.com', '51 97740205', NULL, 'ativo', 'usuario.jpg', 1),
(5, 'leandro', 'e10adc3949ba59abbe56e057f20f883e', 'Leandro Super Saiyajin 7', '12312345620', 'usuario1@gmail.com', '51 97740201', NULL, 'ativo', 'usuario.jpg', 1),
(6, 'admin', '63a9f0ea7bb98050796b649e85481845', 'Adm', '12312312321', 'adm@adm', '111111111111', NULL, 'ativo', 'usuario.jpg', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(10) NOT NULL,
  `nome` enum('gerente','colaborador','socio','nSocio') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `nome`) VALUES
(1, 'socio'),
(2, 'colaborador'),
(3, 'gerente');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluguel`
--
ALTER TABLE `aluguel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_login` (`fk_login`),
  ADD KEY `fk_location` (`fk_location`);

--
-- Índices para tabela `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_locacoes` (`fk_locacoes`);

--
-- Índices para tabela `locacoes`
--
ALTER TABLE `locacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `fk_tipo_usuario` (`fk_tipo_usuario`);

--
-- Índices para tabela `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluguel`
--
ALTER TABLE `aluguel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `locacoes`
--
ALTER TABLE `locacoes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`fk_tipo_usuario`) REFERENCES `tipo_usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

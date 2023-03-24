-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Mar-2022 às 06:28
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `support`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `calls`
--

CREATE TABLE `calls` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `calls`
--

INSERT INTO `calls` (`id`, `email`, `msg`, `token`) VALUES
(30, 'will.joris@gmail.com', 'ihjuulsfas', 'a0503db1db6ef8398806bb6ae8f6368b');

-- --------------------------------------------------------

--
-- Estrutura da tabela `interaction-call`
--

CREATE TABLE `interaction-call` (
  `id` int(11) NOT NULL,
  `call_id` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  `admin` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `interaction-call`
--

INSERT INTO `interaction-call` (`id`, `call_id`, `msg`, `admin`, `status`) VALUES
(40, 'a0503db1db6ef8398806bb6ae8f6368b', 'teste', 1, 1),
(41, 'a0503db1db6ef8398806bb6ae8f6368b', 'sss', -1, 1),
(42, 'a0503db1db6ef8398806bb6ae8f6368b', 'sss', 1, 1),
(43, 'a0503db1db6ef8398806bb6ae8f6368b', 'sss', 1, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `calls`
--
ALTER TABLE `calls`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `interaction-call`
--
ALTER TABLE `interaction-call`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `calls`
--
ALTER TABLE `calls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `interaction-call`
--
ALTER TABLE `interaction-call`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

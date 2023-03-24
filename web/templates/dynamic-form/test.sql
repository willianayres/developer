-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Mar-2022 às 01:37
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
-- Banco de dados: `test`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `poll`
--

CREATE TABLE `poll` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `awnsers` varchar(255) NOT NULL,
  `votes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `poll`
--

INSERT INTO `poll` (`id`, `question_id`, `awnsers`, `votes`) VALUES
(1, 1, 'Futebol', 7),
(2, 1, 'Basquete', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `poll_question`
--

CREATE TABLE `poll_question` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `poll_question`
--

INSERT INTO `poll_question` (`id`, `question`) VALUES
(1, 'Qual seu esporte favorito?');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `poll`
--
ALTER TABLE `poll`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `poll_question`
--
ALTER TABLE `poll_question`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `poll`
--
ALTER TABLE `poll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `poll_question`
--
ALTER TABLE `poll_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

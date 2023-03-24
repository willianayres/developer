-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Mar-2022 às 05:39
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
-- Banco de dados: `forum`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_forum.posts`
--

CREATE TABLE `tb_forum.posts` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_forum.posts`
--

INSERT INTO `tb_forum.posts` (`id`, `topic_id`, `username`, `message`) VALUES
(1, 1, 'Willian', 'PHP é muito dinâmico!'),
(2, 1, 'Willian', 'PHP é complicado mas recompensador!'),
(3, 1, 'Anna', 'Testando');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_forum.topics`
--

CREATE TABLE `tb_forum.topics` (
  `id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_forum.topics`
--

INSERT INTO `tb_forum.topics` (`id`, `forum_id`, `name`) VALUES
(1, 2, 'PHP'),
(2, 2, 'HTML'),
(3, 2, 'CSS'),
(4, 1, 'Arcade'),
(5, 1, 'Ação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_forums`
--

CREATE TABLE `tb_forums` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_forums`
--

INSERT INTO `tb_forums` (`id`, `name`) VALUES
(1, 'Games e Geral'),
(2, 'Desenvolvimento Web'),
(3, 'Outros'),
(4, 'Comida');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_forum.posts`
--
ALTER TABLE `tb_forum.posts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_forum.topics`
--
ALTER TABLE `tb_forum.topics`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_forums`
--
ALTER TABLE `tb_forums`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_forum.posts`
--
ALTER TABLE `tb_forum.posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tb_forum.topics`
--
ALTER TABLE `tb_forum.topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_forums`
--
ALTER TABLE `tb_forums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

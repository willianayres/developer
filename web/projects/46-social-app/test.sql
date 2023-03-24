-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Abr-2022 às 19:51
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
-- Estrutura da tabela `friendships`
--

CREATE TABLE `friendships` (
  `id` int(11) NOT NULL,
  `sent` int(11) NOT NULL,
  `received` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `friendships`
--

INSERT INTO `friendships` (`id`, `sent`, `received`, `status`) VALUES
(4, 4, 3, 1),
(5, 3, 1, 1),
(6, 1, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `msg`, `date`) VALUES
(1, 3, 'testando', '2022-04-05 22:59:12'),
(2, 3, 'teste', '2022-04-05 23:14:47'),
(3, 3, 'vamos la para mais um post', '2022-04-05 23:17:38'),
(7, 3, '<p>Teste com imagem </p><img src=\"data:image/jpeg;base64,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\" />', '2022-04-05 23:44:51'),
(8, 1, '<p>Post feito por mim!</p>', '2022-04-06 00:09:11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `last_post` datetime NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `last_post`, `img`) VALUES
(1, 'Willian', 'will.joris@gmail.com', '$2a$08$MTAxMjI4MzgyMzYyNGRjYeDjruSmQud4WmNY0VkhejSm4ukdSJXoW', '2022-04-06 00:09:11', ''),
(2, 'Anna Carolina Cardoso', 'annacarolinacc640@gmail.com', '$2a$08$MjEzMTIwNDQ0MzYyNGJiMeS6pclp5WkCQBmFPdxfvz2.tgUwjBjEm', '2022-04-05 22:59:12', ''),
(3, 'Willian Ayres', 'willian.joris@gmail.com', '$2a$08$MjEzMTIwNDQ0MzYyNGJiMeS6pclp5WkCQBmFPdxfvz2.tgUwjBjEm', '2022-04-05 23:44:51', ''),
(4, 'Will', 'teste@teste.com', '$2a$08$NjY2MjQ5NDQ0NjI0ZGMzMOy2qliHBGrR506gpNsMLey4qcElQSjFG', '2022-04-06 13:43:00', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `friendships`
--
ALTER TABLE `friendships`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `friendships`
--
ALTER TABLE `friendships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

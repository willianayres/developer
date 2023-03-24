-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Jun-2021 às 20:48
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bootstrap`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_about`
--

CREATE TABLE `tb_about` (
  `id` int(11) NOT NULL,
  `about` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_about`
--

INSERT INTO `tb_about` (`id`, `about`) VALUES
(3, '<div class=\"col-md-4\">\r\n							<h3><span class=\"glyphicon glyphicon-user\"></span></h3>\r\n							<h2>Diferencial #1</h2>\r\n							<div class=\"text-justify\">\r\n								<p>Lorem ipsum in nulla mollit amet velit cupidatat proident labore velit ex magna ut sunt est id laboris in pariatur cupidatat quis esse officia dolore in sint do sint cupidatat. Sint ut aliquip adipisicing do cillum aliquip voluptate quis qui reprehenderit enim eu eu veniam proident eu incididunt fugiat laboris nisi ad nisi in ut velit sint laborum consequat enim laboris in aute occaecat sunt cillum sunt.</p>\r\n							</div><!--text-justify-->\r\n						</div><!--col-md-4-->\r\n						<div class=\"col-md-4\">\r\n							<h3><span class=\"glyphicon glyphicon-download-alt\"></span></h3>\r\n							<h2>Diferencial #2</h2>\r\n							<div class=\"text-justify\">\r\n								<p>Lorem ipsum in nulla mollit amet velit cupidatat proident labore velit ex magna ut sunt est id laboris in pariatur cupidatat quis esse officia dolore in sint do sint cupidatat. Sint ut aliquip adipisicing do cillum aliquip voluptate quis qui reprehenderit enim eu eu veniam proident eu incididunt fugiat laboris nisi ad nisi in ut velit sint laborum consequat enim laboris in aute occaecat sunt cillum sunt.</p>\r\n							</div><!--text-justify-->\r\n						</div><!--col-md-4-->\r\n						<div class=\"col-md-4\">\r\n							<h3><span class=\"glyphicon glyphicon-shopping-cart\"></span></h3>\r\n							<h2>Diferencial #3</h2>\r\n							<div class=\"text-justify\">\r\n								<p>Lorem ipsum in nulla mollit amet velit cupidatat proident labore velit ex magna ut sunt est id laboris in pariatur cupidatat quis esse officia dolore in sint do sint cupidatat. Sint ut aliquip adipisicing do cillum aliquip voluptate quis qui reprehenderit enim eu eu veniam proident eu incididunt fugiat laboris nisi ad nisi in ut velit sint laborum consequat enim laboris in aute occaecat sunt cillum sunt.</p>\r\n							</div><!--text-justify-->\r\n						</div><!--col-md-4-->');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_members`
--

CREATE TABLE `tb_members` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_about`
--
ALTER TABLE `tb_about`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_members`
--
ALTER TABLE `tb_members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_about`
--
ALTER TABLE `tb_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_members`
--
ALTER TABLE `tb_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

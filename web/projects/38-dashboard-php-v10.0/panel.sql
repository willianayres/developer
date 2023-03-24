-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Mar-2022 às 22:18
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
-- Banco de dados: `panel`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.buildings`
--

CREATE TABLE `tb_admin.buildings` (
  `id` int(11) NOT NULL,
  `enterprise_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `area` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.buildings`
--

INSERT INTO `tb_admin.buildings` (`id`, `enterprise_id`, `name`, `price`, `area`, `order_id`) VALUES
(15, 15, 'teste', '100.00', 100, 15),
(16, 11, 'teste2', '200.00', 200, 16),
(17, 14, 'teste3', '123123.12', 999, 17),
(19, 13, 'teste2', '12111.11', 1000, 19),
(20, 13, 'rwqrqwrq', '1000.00', 10000, 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.buildings-images`
--

CREATE TABLE `tb_admin.buildings-images` (
  `id` int(11) NOT NULL,
  `building_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.buildings-images`
--

INSERT INTO `tb_admin.buildings-images` (`id`, `building_id`, `img`) VALUES
(19, 15, '622fc9258064b.jpg'),
(20, 16, '622fc93d14720.jpg'),
(21, 17, '622fc9618e2aa.jpg'),
(23, 19, '6230f316b0d62.jpg'),
(24, 20, '6230f3525a6a0.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.chat`
--

CREATE TABLE `tb_admin.chat` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.chat`
--

INSERT INTO `tb_admin.chat` (`id`, `user_id`, `msg`) VALUES
(1, 1, 'teste'),
(2, 1, 'teste'),
(3, 1, 'testetesteatar1'),
(4, 1, '421312'),
(5, 1, 'meu caneco'),
(6, 1, 'vamos la\n'),
(7, 1, 'teste 45'),
(8, 1, 'teste'),
(9, 1, 'tesate'),
(10, 1, 'assa'),
(11, 1, 'eq'),
(12, 1, 'rer'),
(13, 1, 'dois\n'),
(14, 1, 'terar'),
(15, 1, 'teta'),
(17, 1, 'sdasd'),
(18, 1, 'Oi Anna, tudo bem?'),
(19, 3, 'Oi Will, tudo e você?');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.clients`
--

CREATE TABLE `tb_admin.clients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `client_type` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.clients`
--

INSERT INTO `tb_admin.clients` (`id`, `name`, `email`, `client_type`, `number`, `img`) VALUES
(7, 'teste2', 'will.joris@gmail.com', 'physical', '111.111.111-11', 'default.png'),
(8, 'teste3', 'will.joris@gmail.com', 'physical', '111.111.111-11', 'default.png'),
(10, 'teste5', 'will.joris@gmail.com', 'physical', '111.111.111-11', 'default.png'),
(11, 'teste6', 'will.joris@gmail.com', 'physical', '111.111.111-11', 'default.png'),
(12, 'teste7', 'will.joris@gmail.com', 'physical', '111.111.111-11', 'default.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.enterprises`
--

CREATE TABLE `tb_admin.enterprises` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.enterprises`
--

INSERT INTO `tb_admin.enterprises` (`id`, `name`, `type`, `price`, `img`, `slug`, `order_id`) VALUES
(11, '321321', 'commercial', '2.13', '62291450f13ad.jpg', '321321', 2),
(13, 'teste dois', 'residential', '1000.00', '622d2070befa6.jpg', 'teste-dois', 1),
(14, 'teste3', 'residential', '1000.00', '622fc94b29353.jpg', 'teste3', 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.on`
--

CREATE TABLE `tb_admin.on` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `last_action` datetime NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.on`
--

INSERT INTO `tb_admin.on` (`id`, `ip`, `last_action`, `token`) VALUES
(72, '::1', '2022-03-19 19:08:10', '623628d5c3db0'),
(73, '::1', '2022-03-21 12:02:54', '623878abb8801'),
(74, '::1', '2022-03-21 14:52:43', '6238a9a5d117b'),
(75, '::1', '2022-03-21 16:09:11', '6238cd5732d88');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.payments`
--

CREATE TABLE `tb_admin.payments` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `due` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.payments`
--

INSERT INTO `tb_admin.payments` (`id`, `client_id`, `name`, `value`, `due`, `status`) VALUES
(48, 7, '1', '1.11', '2022-03-16', 1),
(49, 7, '2', '0.22', '2022-03-15', 1),
(50, 7, '3', '3.33', '2022-03-16', 1),
(51, 7, '4', '0.44', '2022-03-16', 1),
(52, 7, '5', '0.55', '2022-03-21', 1),
(53, 7, '1', '1.11', '2022-03-15', 1),
(54, 7, '1', '11.11', '2022-03-15', 1),
(55, 7, '1', '1.11', '2022-03-15', 1),
(56, 7, '11', '11.11', '2022-03-15', 1),
(57, 7, '11', '11.11', '2022-03-16', 0),
(58, 7, '11', '11.11', '2022-03-17', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.storage`
--

CREATE TABLE `tb_admin.storage` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `length` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.storage`
--

INSERT INTO `tb_admin.storage` (`id`, `name`, `description`, `width`, `height`, `length`, `weight`, `amount`) VALUES
(21, 'teste5', 'sadas', 5, 5, 5, 5, 9),
(22, '444', 'tt', 5, 5, 5, 5, 5),
(23, '66', '66', 5, 5, 5, 5, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.storage-images`
--

CREATE TABLE `tb_admin.storage-images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.storage-images`
--

INSERT INTO `tb_admin.storage-images` (`id`, `product_id`, `img`) VALUES
(15, 22, '6226cf260f92d.JPG'),
(16, 23, '6226cf385bc8b.JPG'),
(61, 21, '62297eeb49663.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.tasks`
--

CREATE TABLE `tb_admin.tasks` (
  `id` int(11) NOT NULL,
  `task` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.tasks`
--

INSERT INTO `tb_admin.tasks` (`id`, `task`, `date`) VALUES
(1, 'Programar o calendário', '2022-03-17'),
(2, 'Jantar com a mãe', '2022-03-17'),
(3, 'Ir para a faculdade', '2022-03-18'),
(5, 'teaawta', '2022-03-17'),
(6, 'TESTEANDOP', '2022-03-17'),
(7, 'DIA 18', '2022-03-18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.users`
--

CREATE TABLE `tb_admin.users` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `office` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.users`
--

INSERT INTO `tb_admin.users` (`id`, `user`, `password`, `img`, `name`, `office`) VALUES
(1, 'admin', 'admin', '608035e62d2f9.jpg', 'Willian J. Ayres', '2'),
(3, 'anna', 'admin', '62333477171e8.JPG', 'Anna Carolina Cardoso', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.visits`
--

CREATE TABLE `tb_admin.visits` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `day` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.visits`
--

INSERT INTO `tb_admin.visits` (`id`, `ip`, `day`) VALUES
(1, '::1', '2021-04-22'),
(2, '::1', '2021-04-24'),
(3, '::1', '2021-04-26'),
(4, '::1', '2021-04-28'),
(5, '::1', '2021-04-29'),
(6, '::1', '2021-04-29'),
(7, '::1', '2021-05-06'),
(8, '::1', '2021-05-10'),
(9, '::1', '2021-05-12'),
(10, '::1', '2021-05-26'),
(11, '::1', '2021-05-29'),
(12, '::1', '2021-06-06'),
(13, '::1', '2021-06-06'),
(14, '::1', '2021-06-08'),
(15, '::1', '2022-02-24'),
(16, '::1', '2022-02-24'),
(17, '::1', '2022-02-24'),
(18, '::1', '2022-02-25'),
(19, '::1', '2022-02-26'),
(20, '::1', '2022-02-27'),
(21, '::1', '2022-03-01'),
(22, '::1', '2022-03-02'),
(23, '::1', '2022-03-03'),
(24, '::1', '2022-03-07'),
(25, '::1', '2022-03-09'),
(26, '::1', '2022-03-11'),
(27, '::1', '2022-03-12'),
(28, '::1', '2022-03-13'),
(29, '::1', '2022-03-14'),
(30, '::1', '2022-03-15'),
(31, '::1', '2022-03-15'),
(32, '::1', '2022-03-15'),
(33, '::1', '2022-03-16'),
(34, '::1', '2022-03-16'),
(35, '::1', '2022-03-17'),
(36, '::1', '2022-03-17'),
(37, '::1', '2022-03-17'),
(38, '::1', '2022-03-18'),
(39, '::1', '2022-03-18'),
(40, '::1', '2022-03-18'),
(41, '::1', '2022-03-19'),
(42, '::1', '2022-03-21'),
(43, '::1', '2022-03-21'),
(44, '::1', '2022-03-21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.categories`
--

CREATE TABLE `tb_site.categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_site.categories`
--

INSERT INTO `tb_site.categories` (`id`, `name`, `slug`, `order_id`) VALUES
(15, 'Geral', 'geral', 15),
(16, 'Cotidiano', 'cotidiano', 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.comments`
--

CREATE TABLE `tb_site.comments` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `notice_id` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_site.comments`
--

INSERT INTO `tb_site.comments` (`id`, `username`, `notice_id`, `comment`) VALUES
(5, 'Willian J. Ayres', 18, 'teste'),
(6, 'Willian J. Ayres', 18, 'teste2'),
(9, 'Willian J. Ayres', 18, 'Testando junto com a Anna');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.comments-awnsers`
--

CREATE TABLE `tb_site.comments-awnsers` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `notice_id` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_site.comments-awnsers`
--

INSERT INTO `tb_site.comments-awnsers` (`id`, `comment_id`, `username`, `notice_id`, `comment`) VALUES
(1, 6, 'Willian J. Ayres', 18, 'yetewtwetwet'),
(2, 6, 'Willian J. Ayres', 18, 'yetewtwetwet'),
(3, 6, 'Willian J. Ayres', 18, 'twetata'),
(4, 6, 'Willian J. Ayres', 18, 'twetata'),
(13, 9, 'Willian J. Ayres', 18, 'resposta para o comentário'),
(14, 9, 'Willian J. Ayres', 18, 'teste23232'),
(26, 9, 'Willian J. Ayres', 18, 'teste23232'),
(32, 9, 'Willian J. Ayres', 18, 'mais um teste'),
(38, 5, 'Willian J. Ayres', 18, '123132'),
(39, 5, 'Willian J. Ayres', 18, 'teteate'),
(47, 5, 'Willian J. Ayres', 18, 'trytytyty'),
(48, 9, 'Willian J. Ayres', 18, '23123231'),
(49, 9, 'Willian J. Ayres', 18, '465654654'),
(50, 9, 'Willian J. Ayres', 18, 'ultimo\r\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.config`
--

CREATE TABLE `tb_site.config` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `author_description` text NOT NULL,
  `author_image` varchar(255) NOT NULL,
  `icon_1` varchar(255) NOT NULL,
  `icon_title_1` varchar(255) NOT NULL,
  `icon_text_1` text NOT NULL,
  `icon_2` varchar(255) NOT NULL,
  `icon_title_2` varchar(255) NOT NULL,
  `icon_text_2` text NOT NULL,
  `icon_3` varchar(255) NOT NULL,
  `icon_title_3` varchar(255) NOT NULL,
  `icon_text_3` text NOT NULL,
  `ajax_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_site.config`
--

INSERT INTO `tb_site.config` (`id`, `title`, `author_name`, `author_description`, `author_image`, `icon_1`, `icon_title_1`, `icon_text_1`, `icon_2`, `icon_title_2`, `icon_text_2`, `icon_3`, `icon_title_3`, `icon_text_3`, `ajax_image`) VALUES
(1, 'Projeto 01', 'Willian J. Ayres', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien turpis, gravida eu magna at, euismod maximus mi. Proin hendrerit consequat metus nec aliquet. Sed bibendum nibh at enim blandit, sit amet consectetur lacus egestas. Vestibulum vel sagittis ante, quis faucibus felis. Vestibulum ut dui vel turpis rhoncus semper. Donec tellus risus, fermentum sit amet ligula nec, dignissim finibus dui. Mauris vehicula risus eget lectus mattis, sit amet tempus diam molestie. Fusce efficitur varius eros, in volutpat sapien mollis nec.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien turpis, gravida eu magna at, euismod maximus mi. Proin hendrerit consequat metus nec aliquet. Sed bibendum nibh at enim blandit, sit amet consectetur lacus egestas. Vestibulum vel sagittis ante, quis faucibus felis. Vestibulum ut dui vel turpis rhoncus semper. Donec tellus risus, fermentum sit amet ligula nec, dignissim finibus dui. Mauris vehicula risus eget lectus mattis, sit amet tempus diam molestie. Fusce efficitur varius eros, in volutpat sapien mollis nec', '608bef3a88860.JPG', 'fab fa-css3-alt', 'CSS3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien turpis, gravida eu magna at, euismod maximus mi.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien turpis, gravida eu magna at, euismod maximus mi.', 'fab fa-html5', 'HTML5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien turpis, gravida eu magna at, euismod maximus mi.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien turpis, gravida eu magna at, euismod maximus mi.', 'fab fa-js-square', 'JavaScript', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien turpis, gravida eu magna at, euismod maximus mi.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sapien turpis, gravida eu magna at, euismod maximus mi.', '608bef01da46c.gif');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.notices`
--

CREATE TABLE `tb_site.notices` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `cape` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_site.notices`
--

INSERT INTO `tb_site.notices` (`id`, `category_id`, `date`, `title`, `content`, `cape`, `slug`, `order_id`) VALUES
(17, 15, '2021-05-29', '<h2>Teste</h2>', '<p>asfsafafaf</p>', '60b29f8e25b50.jpg', 'teste', 17),
(18, 16, '2021-06-06', 'Testando mais uma notícia', '<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer fermentum faucibus aliquet. Sed venenatis rutrum ipsum, ac consectetur mi volutpat in. Nunc vulputate dictum mi, et cursus mauris egestas sit amet. Duis interdum purus vitae purus ultrices, at malesuada quam sagittis. Proin eget nisl eu libero fermentum malesuada sit amet vitae eros. Phasellus condimentum, est id ullamcorper cursus, diam mi facilisis nisl, non consectetur quam arcu in metus. Nunc ut scelerisque ipsum, quis pulvinar felis. Ut nisi augue, elementum vitae suscipit quis, imperdiet in velit. Phasellus quis tellus nisi. Quisque eget rutrum turpis.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Morbi elit neque, pulvinar at lacus sit amet, efficitur pharetra nisl. Donec consequat nec magna sollicitudin blandit. Curabitur vitae elit id enim varius sagittis. Donec diam tortor, egestas ut purus non, accumsan sodales felis. Nulla vel nisi sodales, sodales dui a, pharetra leo. Sed sem turpis, dignissim nec viverra ut, sagittis eleifend arcu. Vestibulum varius justo vitae arcu tempus vulputate. Suspendisse imperdiet, nulla eget congue viverra, leo sapien semper magna, sed condimentum sapien magna vitae augue. Suspendisse potenti. Nullam sit amet hendrerit turpis.</p>', '60bd5c3146f31.jpg', 'testando-mais-uma-noticia', 18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.services`
--

CREATE TABLE `tb_site.services` (
  `id` int(11) NOT NULL,
  `service` text NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_site.services`
--

INSERT INTO `tb_site.services` (`id`, `service`, `order_id`) VALUES
(4, 'Meu serviço #1', 4),
(5, 'Meu serviço #2', 5),
(6, 'Meu serviço #3', 6),
(7, 'Meu serviço #4', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.slides`
--

CREATE TABLE `tb_site.slides` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slide` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_site.slides`
--

INSERT INTO `tb_site.slides` (`id`, `name`, `slide`, `order_id`) VALUES
(10, 'bg_form2', '60898c13ab743.jpg', 11),
(12, 'bg_form1', '60898c39020e9.jpg', 10),
(13, 'bg_form3', '60898eaaed54d.jpg', 14),
(14, 'Teste', '60bd5df46578d.jpg', 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.testimonies`
--

CREATE TABLE `tb_site.testimonies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `testimony` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_site.testimonies`
--

INSERT INTO `tb_site.testimonies` (`id`, `name`, `testimony`, `date`, `order_id`) VALUES
(1, 'Anna Carolina Cardoso', 'Muito prestativo e serviço de ótima qualidade!!', '19/04/2021', 1),
(2, 'Marlene Joris', 'Super empenhado no que faz, entregas no tempo ideal!', '15/03/2021', 2),
(3, 'Willian Joris Ayres', 'Testando nova configuração de edição finalizado!', '22/04/2021', 3),
(4, 'Marlene Joris', 'Qualidade excelentíssima!', '17/02/2021', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.users`
--

CREATE TABLE `tb_site.users` (
  `ID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_site.users`
--

INSERT INTO `tb_site.users` (`ID`, `email`, `password`, `img`, `name`) VALUES
(1, 'will.joris@gmail.com', 'admin', '608035e62d2f9.jpg', 'Willian J. Ayres');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_admin.buildings`
--
ALTER TABLE `tb_admin.buildings`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.buildings-images`
--
ALTER TABLE `tb_admin.buildings-images`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.chat`
--
ALTER TABLE `tb_admin.chat`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.clients`
--
ALTER TABLE `tb_admin.clients`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.enterprises`
--
ALTER TABLE `tb_admin.enterprises`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.on`
--
ALTER TABLE `tb_admin.on`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.payments`
--
ALTER TABLE `tb_admin.payments`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.storage`
--
ALTER TABLE `tb_admin.storage`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.storage-images`
--
ALTER TABLE `tb_admin.storage-images`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.tasks`
--
ALTER TABLE `tb_admin.tasks`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.users`
--
ALTER TABLE `tb_admin.users`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.visits`
--
ALTER TABLE `tb_admin.visits`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_site.categories`
--
ALTER TABLE `tb_site.categories`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_site.comments`
--
ALTER TABLE `tb_site.comments`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_site.comments-awnsers`
--
ALTER TABLE `tb_site.comments-awnsers`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_site.config`
--
ALTER TABLE `tb_site.config`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_site.notices`
--
ALTER TABLE `tb_site.notices`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_site.services`
--
ALTER TABLE `tb_site.services`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_site.slides`
--
ALTER TABLE `tb_site.slides`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_site.testimonies`
--
ALTER TABLE `tb_site.testimonies`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_site.users`
--
ALTER TABLE `tb_site.users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_admin.buildings`
--
ALTER TABLE `tb_admin.buildings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `tb_admin.buildings-images`
--
ALTER TABLE `tb_admin.buildings-images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `tb_admin.chat`
--
ALTER TABLE `tb_admin.chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `tb_admin.clients`
--
ALTER TABLE `tb_admin.clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tb_admin.enterprises`
--
ALTER TABLE `tb_admin.enterprises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `tb_admin.on`
--
ALTER TABLE `tb_admin.on`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de tabela `tb_admin.payments`
--
ALTER TABLE `tb_admin.payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de tabela `tb_admin.storage`
--
ALTER TABLE `tb_admin.storage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `tb_admin.storage-images`
--
ALTER TABLE `tb_admin.storage-images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de tabela `tb_admin.tasks`
--
ALTER TABLE `tb_admin.tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tb_admin.users`
--
ALTER TABLE `tb_admin.users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_admin.visits`
--
ALTER TABLE `tb_admin.visits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `tb_site.categories`
--
ALTER TABLE `tb_site.categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `tb_site.comments`
--
ALTER TABLE `tb_site.comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tb_site.comments-awnsers`
--
ALTER TABLE `tb_site.comments-awnsers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de tabela `tb_site.config`
--
ALTER TABLE `tb_site.config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_site.notices`
--
ALTER TABLE `tb_site.notices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `tb_site.services`
--
ALTER TABLE `tb_site.services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tb_site.slides`
--
ALTER TABLE `tb_site.slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `tb_site.testimonies`
--
ALTER TABLE `tb_site.testimonies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `tb_site.users`
--
ALTER TABLE `tb_site.users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

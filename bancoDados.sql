-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 01-Jun-2022 às 00:44
-- Versão do servidor: 10.5.12-MariaDB
-- versão do PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `id18842334_login_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `user_nome` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_data` date NOT NULL,
  `user_email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `user_mensagem` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id_user`, `user_nome`, `user_data`, `user_email`, `user_mensagem`) VALUES
(21, 'ana alves', '2022-05-03', 'alice@abc.com', 'luis.antonio@abc.com.br 31-05-22'),
(23, 'ana', '2022-05-24', 'paloma@abc.com.br', 'luis.antonio@abc.com.br'),
(24, 'Paloma', '2022-05-24', 'paloma@abc.com.br', 'luis.antonio@abc.com.br'),
(25, 'luis', '2022-05-24', 'paloma@abc.com.br', 'luis.antonio@abc.com.br'),
(33, 'Wllliam ', '2022-05-25', 'will@abc.com', 'Tarefa concluída!'),
(34, 'Isabel Pereira', '2022-05-31', 'isabel.pereira@abc.com', 'isabel.pereira@abc.com'),
(35, 'Alan de Oliveira', '2022-05-31', 'alan@abc.com', 'Alan Oliveira'),
(36, 'Janaina Santos', '2022-05-31', 'santos.janaina@abc.com', 'Cadastro ik');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

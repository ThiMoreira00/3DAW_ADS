-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 28/11/2023 às 15:42
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `AV2_DAW`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `candidatos`
--

CREATE TABLE `candidatos` (
  `id` int(11) NOT NULL,
  `cpf` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `identidade` int(9) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cargo_pretendido` varchar(20) NOT NULL,
  `sala_prova` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `candidatos`
--

INSERT INTO `candidatos` (`id`, `cpf`, `nome`, `identidade`, `email`, `cargo_pretendido`, `sala_prova`) VALUES
(1, 111, 'Thiago Moreira', 111, 'thiago.moreira@gmail.com', 'Administrador', 3),
(2, 222, 'João', 222, 'joao@gmail.com', 'Administrador', 2),
(3, 333, 'Maria', 333, 'maria@gmail.com', 'Administrador', 2),
(4, 444, 'José', 444, 'jose@gmail.com', 'Administrador', 2),
(5, 555, 'Rodolfo', 555, 'rodolfo@gmail.com', 'Administrador', 2),
(6, 666, 'Brena', 666, 'brena@gmail.com', 'Historiador', 5),
(7, 777, 'Beatriz', 777, 'beatriz@gmail.com', 'Historiador', 5),
(8, 888, 'Mauren', 888, 'mauren@gmail.com', 'Professor', 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `fiscais`
--

CREATE TABLE `fiscais` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `cpf` int(11) NOT NULL,
  `sala_prova` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `fiscais`
--

INSERT INTO `fiscais` (`id`, `nome`, `cpf`, `sala_prova`) VALUES
(1, 'Rafael', 333, 2),
(2, 'Roberto', 444, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `sala_prova`
--

CREATE TABLE `sala_prova` (
  `id` int(11) NOT NULL,
  `materia` varchar(20) NOT NULL,
  `cargo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `sala_prova`
--

INSERT INTO `sala_prova` (`id`, `materia`, `cargo`) VALUES
(2, 'Administração', 'Administrador'),
(3, 'Administração', 'Administrador'),
(4, 'Ciências', 'Professor'),
(5, 'História', 'Historiador');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `candidatos`
--
ALTER TABLE `candidatos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `fiscais`
--
ALTER TABLE `fiscais`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `sala_prova`
--
ALTER TABLE `sala_prova`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `candidatos`
--
ALTER TABLE `candidatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `fiscais`
--
ALTER TABLE `fiscais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `sala_prova`
--
ALTER TABLE `sala_prova`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

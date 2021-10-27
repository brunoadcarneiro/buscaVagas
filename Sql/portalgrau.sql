-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Abr-2021 às 21:55
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `portalgrau`
--
CREATE DATABASE IF NOT EXISTS `portalgrau` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `portalgrau`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_aluno`
--

CREATE TABLE `tbl_aluno` (
  `id_aluno` int(5) NOT NULL,
  `nome_aluno` varchar(100) NOT NULL,
  `email_aluno` varchar(100) NOT NULL,
  `telefone_aluno` varchar(100) NOT NULL,
  `celular_aluno` varchar(100) NOT NULL,
  `cpf_aluno` varchar(100) NOT NULL,
  `unidade_aluno` varchar(100) NOT NULL,
  `curso_aluno` varchar(100) NOT NULL,
  `turno_aluno` varchar(100) NOT NULL,
  `dtn_aluno` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_candidatos`
--

CREATE TABLE `tbl_candidatos` (
  `id_candidato` int(100) NOT NULL,
  `id_vaga` int(100) NOT NULL,
  `id_user` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_contato`
--

CREATE TABLE `tbl_contato` (
  `id_contato` int(10) NOT NULL,
  `nome_contato` varchar(100) NOT NULL,
  `email_contato` varchar(100) NOT NULL,
  `unidade_contato` varchar(100) NOT NULL,
  `motivo_contato` varchar(250) NOT NULL,
  `data_contato` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(5) NOT NULL,
  `nome_user` varchar(100) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `telefone_user` varchar(100) NOT NULL,
  `celular_user` varchar(100) NOT NULL,
  `cpf_user` varchar(100) NOT NULL,
  `dtn_user` varchar(100) NOT NULL,
  `login_user` varchar(100) NOT NULL,
  `senha_user` varchar(100) NOT NULL,
  `tipo_user` varchar(100) NOT NULL,
  `status_user` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nome_user`, `email_user`, `telefone_user`, `celular_user`, `cpf_user`, `dtn_user`, `login_user`, `senha_user`, `tipo_user`, `status_user`) VALUES
(5, 'Bruno Almeida', 'bruno@bruno.com', '(54) 1321-6546', '(13) 26548-7987', '12345678911', '1969-12-29', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'adm', 'A'),
(6, 'Empresa', 'emrpes@empresa', '(57) 3216-5649', '(32) 24878-9416', '12345678964', '1975-07-28', 'empresa', '04299e213f5391ede16784de41dd847d', 'emp', 'A'),
(7, 'aluno', 'aluno@aluno', '(54) 6766-5151', '(32) 13546-7687', '32165498715', '1978-11-20', 'aluno', 'ca0cd09a12abade3bf0777574d9f987f', 'alu', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_vaga`
--

CREATE TABLE `tbl_vaga` (
  `id_vaga` int(5) NOT NULL,
  `empresa` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `celular` varchar(100) NOT NULL,
  `bolsa` varchar(100) NOT NULL,
  `beneficio` varchar(100) NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `unidade` varchar(100) NOT NULL,
  `curso` varchar(100) NOT NULL,
  `turno` varchar(100) NOT NULL,
  `requisito` varchar(100) NOT NULL,
  `descVaga` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbl_aluno`
--
ALTER TABLE `tbl_aluno`
  ADD PRIMARY KEY (`id_aluno`);

--
-- Índices para tabela `tbl_candidatos`
--
ALTER TABLE `tbl_candidatos`
  ADD PRIMARY KEY (`id_candidato`);

--
-- Índices para tabela `tbl_contato`
--
ALTER TABLE `tbl_contato`
  ADD PRIMARY KEY (`id_contato`);

--
-- Índices para tabela `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Índices para tabela `tbl_vaga`
--
ALTER TABLE `tbl_vaga`
  ADD PRIMARY KEY (`id_vaga`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_aluno`
--
ALTER TABLE `tbl_aluno`
  MODIFY `id_aluno` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_candidatos`
--
ALTER TABLE `tbl_candidatos`
  MODIFY `id_candidato` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_contato`
--
ALTER TABLE `tbl_contato`
  MODIFY `id_contato` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tbl_vaga`
--
ALTER TABLE `tbl_vaga`
  MODIFY `id_vaga` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10-Out-2015 às 02:01
-- Versão do servidor: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sad2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avafunc`
--

CREATE TABLE IF NOT EXISTS `avafunc` (
  `IDavaliacao` int(11) NOT NULL,
  `login` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE IF NOT EXISTS `avaliacao` (
  `IDavaliacao` int(11) NOT NULL,
  `IDpergunta` int(11) NOT NULL,
  `loginAvaliador` varchar(20) NOT NULL,
  `avaliacao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `escolha`
--

CREATE TABLE IF NOT EXISTS `escolha` (
  `IDescolha` int(11) NOT NULL,
  `IDpergunta` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `resposta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE IF NOT EXISTS `funcionarios` (
  `IDfuncionario` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `nomeCompleto` varchar(50) NOT NULL,
  `arquivoFoto` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `departamento` varchar(25) NOT NULL,
  `responsavel` varchar(30) DEFAULT NULL,
  `opiniao` text,
  `gerencia` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pergunta`
--

CREATE TABLE IF NOT EXISTS `pergunta` (
  `IDpergunta` int(11) NOT NULL,
  `IDavaliacao` int(11) NOT NULL,
  `pergunta` varchar(200) NOT NULL,
  `OP1` varchar(200) NOT NULL,
  `OP2` varchar(200) NOT NULL,
  `OP3` varchar(200) NOT NULL,
  `OP4` varchar(200) NOT NULL,
  `OP5` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`IDavaliacao`);

--
-- Indexes for table `escolha`
--
ALTER TABLE `escolha`
  ADD PRIMARY KEY (`IDescolha`);

--
-- Indexes for table `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`IDfuncionario`);

--
-- Indexes for table `pergunta`
--
ALTER TABLE `pergunta`
  ADD PRIMARY KEY (`IDpergunta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `IDavaliacao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `escolha`
--
ALTER TABLE `escolha`
  MODIFY `IDescolha` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `IDfuncionario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pergunta`
--
ALTER TABLE `pergunta`
  MODIFY `IDpergunta` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

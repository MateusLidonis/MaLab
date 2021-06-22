-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 19-Jun-2021 às 00:49
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto_pi`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `resultado`
--

DROP TABLE IF EXISTS `resultado`;
CREATE TABLE IF NOT EXISTS `resultado` (
  `id_resultado` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `idade` int(11) NOT NULL,
  `genero` varchar(30) NOT NULL,
  `sair` varchar(30) NOT NULL,
  `contato` varchar(30) NOT NULL,
  `cheiro` varchar(30) NOT NULL,
  `gripe` varchar(30) NOT NULL,
  `corpo` varchar(30) NOT NULL,
  `covid` varchar(30) DEFAULT NULL,
  `prioridade` varchar(30) NOT NULL,
  PRIMARY KEY (`id_resultado`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `resultado`
--

INSERT INTO `resultado` (`id_resultado`, `nome`, `email`, `idade`, `genero`, `sair`, `contato`, `cheiro`, `gripe`, `corpo`, `covid`, `prioridade`) VALUES
(1, 'Larissa Oliveira', 'lari@gmail.com', 19, 'Feminino', 'Sim', 'Nao', 'Nao', 'Sim', 'Nao', 'Pequena', 'Nao'),
(2, 'José Augusto', 'jose@hotmail.com', 39, 'Masculino', 'Sim', 'Sim', 'Nao', 'Sim', 'Nao', 'Grande', 'Sim'),
(3, 'Maria Aparecida', 'maria@gmail.com', 58, 'Feminino', 'Sim', 'Sim', 'Nao', 'Sim', 'Sim', 'Sim', 'Sim'),
(4, 'João da Silva', 'joao@gmail.com', 48, 'Masculino', 'Nao', 'Nao', 'Sim', 'Nao', 'Nao', 'Nao', 'Nao'),
(5, 'Mateus Lidonis Blanco', 'mateus@gmail.com', 19, 'Masculino', 'Nao', 'Nao', 'Sim', 'Sim', 'Nao', 'Pequena', 'Nao'),
(6, 'Roberto da Silva', 'roberto@gmail.com', 65, 'Masculino', 'Sim', 'Nao', 'Nao', 'Nao', 'Sim', 'Pequena', 'Sim');

-- --------------------------------------------------------

--
-- Estrutura da tabela `temperatura`
--

DROP TABLE IF EXISTS `temperatura`;
CREATE TABLE IF NOT EXISTS `temperatura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sensor` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `temperatura`
--

INSERT INTO `temperatura` (`id`, `sensor`) VALUES
(1, '36.76ºC'),
(2, '36.76ºC'),
(3, '36.76ºC'),
(4, '36.76ºC'),
(5, '36.76ºC'),
(6, '36.76ºC');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `telefone`, `email`, `senha`) VALUES
(1, 'Larissa Oliveira', '11998564785', 'lari@gmail.com', '202cb962ac59075b964b07152d234b70'),
(2, 'José Augusto', '11965482359', 'jose@hotmail.com', '202cb962ac59075b964b07152d234b70'),
(3, 'Maria Aparecida', '11965842369', 'maria@gmail.com', '202cb962ac59075b964b07152d234b70'),
(4, 'João da Silva', '11965842369', 'joao@gmail.com', '202cb962ac59075b964b07152d234b70'),
(5, 'Mateus Lidonis Blanco', '11912345678', 'mateus@gmail.com', '202cb962ac59075b964b07152d234b70'),
(6, 'Roberto da Silva', '11985264859', 'roberto@gmail.com', '202cb962ac59075b964b07152d234b70');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

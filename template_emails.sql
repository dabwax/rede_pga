-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15-Jun-2016 às 12:18
-- Versão do servidor: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pep`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `template_emails`
--

DROP TABLE IF EXISTS `template_emails`;
CREATE TABLE IF NOT EXISTS `template_emails` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `template_emails`
--

INSERT INTO `template_emails` (`id`, `title`, `content`) VALUES
(1, 'Alterar Senha', '<p><img src="http://pep.0e1dev.com/img/logo-azul.png" height="80">\r\n\r\n          </p><h2>Olá, {{user}}!</h2>\r\n\r\n          <p>A sua senha foi alterada no site do PEP.</p>\r\n\r\n          <p>A nova senha é: <strong>{{password}}</strong></p>\r\n\r\n          <p>Atenciosamente, <br> Pedro Lima Sampaio - Fundador do PEP.</p>');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

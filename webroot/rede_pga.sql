-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 04, 2016 at 09:37 AM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rede_pga`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'luizhrqas', 'relogio123');

-- --------------------------------------------------------

--
-- Table structure for table `charts`
--

CREATE TABLE IF NOT EXISTS `charts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` enum('bar','column','line','pie','donut','numero_absoluto') NOT NULL,
  `user_id` int(11) NOT NULL,
  `format` enum('dia_a_dia','mes_a_mes') NOT NULL,
  `theme_id` int(11) DEFAULT NULL,
  `use_markers` tinyint(1) NOT NULL,
  `use_media` int(11) DEFAULT NULL,
  `to_user` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `chart_inputs`
--

CREATE TABLE IF NOT EXISTS `chart_inputs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chart_id` int(11) NOT NULL,
  `input_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `chart_themes`
--

CREATE TABLE IF NOT EXISTS `chart_themes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chart_id` int(11) NOT NULL,
  `theme_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `exercises`
--

CREATE TABLE IF NOT EXISTS `exercises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `due_to` varchar(255) NOT NULL,
  `theme_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `observation` text NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `user_answer_attachment` text,
  `user_answer_content` text,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hashtags`
--

CREATE TABLE IF NOT EXISTS `hashtags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `hashtags`
--

INSERT INTO `hashtags` (`id`, `name`) VALUES
(8, 'teste'),
(9, 'dsada'),
(10, 'dsa'),
(11, 'abacate');

-- --------------------------------------------------------

--
-- Table structure for table `inputs`
--

CREATE TABLE IF NOT EXISTS `inputs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('calendario','intervalo_tempo','registro_textual','escala_numerica','escala_texto','numero','texto_privativo') NOT NULL,
  `user_id` int(11) NOT NULL,
  `model` enum('All','Protectors','Schools','Tutors','Users','Therapists') NOT NULL,
  `name` varchar(255) NOT NULL,
  `config` text NOT NULL,
  `position` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `inputs`
--

INSERT INTO `inputs` (`id`, `type`, `user_id`, `model`, `name`, `config`, `position`, `status`, `created`, `modified`) VALUES
(35, 'registro_textual', 9, 'All', 'Observação da Aula', '', 1, 1, '2015-12-15 16:42:42', '2015-12-15 17:28:44'),
(36, 'escala_numerica', 9, 'All', 'Avaliação da Aula', '{"min":"1","max":"5"}', 0, 0, '2015-12-15 16:43:11', '2015-12-15 17:34:49'),
(37, 'escala_texto', 9, 'All', 'Sou bom?', '{"options":["Sim","Muito","N\\u00e3o","P\\u00e9ssimo"]}', 0, 1, '2015-12-16 10:47:51', '2015-12-16 10:47:51');

-- --------------------------------------------------------

--
-- Table structure for table `instituitions`
--

CREATE TABLE IF NOT EXISTS `instituitions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `instituitions`
--

INSERT INTO `instituitions` (`id`, `name`) VALUES
(6, 'Educandário Sagrada Família'),
(7, 'Educandário Sagrada Família 123');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE IF NOT EXISTS `lessons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `observation` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `user_id`, `date`, `observation`, `created`, `modified`) VALUES
(8, 9, '2015-12-16', '', '2015-12-16 11:21:58', '2015-12-16 11:21:58'),
(9, 9, '2015-12-31', '', '2015-12-18 13:33:09', '2015-12-18 13:33:09');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_entries`
--

CREATE TABLE IF NOT EXISTS `lesson_entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `input_id` int(11) NOT NULL,
  `model` enum('Protectors','Schools','Tutors','Users','Therapists') NOT NULL,
  `model_id` int(11) NOT NULL,
  `value` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=99 ;

--
-- Dumping data for table `lesson_entries`
--

INSERT INTO `lesson_entries` (`id`, `user_id`, `lesson_id`, `input_id`, `model`, `model_id`, `value`, `created`, `modified`) VALUES
(92, 9, 7, 35, 'Protectors', 17, 'foi foda!', '2015-12-15 17:30:39', '2015-12-15 17:30:39'),
(93, 9, 7, 36, 'Protectors', 17, '5', '2015-12-15 17:30:39', '2015-12-15 17:30:39'),
(94, 9, 7, 37, 'Protectors', 17, 'Muito', '2015-12-16 10:55:43', '2015-12-16 10:55:43'),
(95, 9, 8, 35, 'Protectors', 17, 'teste123', '2015-12-16 11:22:17', '2015-12-17 09:14:30'),
(96, 9, 8, 37, 'Protectors', 17, 'Péssimo', '2015-12-16 11:22:17', '2015-12-17 09:13:33'),
(97, 9, 8, 35, 'Protectors', 16, '5', '2015-12-17 11:00:42', '2015-12-17 11:00:42'),
(98, 9, 8, 37, 'Protectors', 16, 'Sim', '2015-12-17 11:00:42', '2015-12-17 11:00:42');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_hashtags`
--

CREATE TABLE IF NOT EXISTS `lesson_hashtags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lesson_id` int(11) NOT NULL,
  `hashtag_id` int(11) NOT NULL,
  `model` varchar(255) DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `lesson_hashtags`
--

INSERT INTO `lesson_hashtags` (`id`, `lesson_id`, `hashtag_id`, `model`, `model_id`) VALUES
(16, 7, 8, NULL, NULL),
(17, 7, 9, NULL, NULL),
(18, 7, 10, NULL, NULL),
(29, 8, 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lesson_themes`
--

CREATE TABLE IF NOT EXISTS `lesson_themes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lesson_id` int(11) NOT NULL,
  `theme_id` int(11) NOT NULL,
  `model` varchar(255) DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `observation` text,
  `nota_esperada` varchar(255) DEFAULT NULL,
  `nota_alcancada` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `lesson_themes`
--

INSERT INTO `lesson_themes` (`id`, `lesson_id`, `theme_id`, `model`, `model_id`, `observation`, `nota_esperada`, `nota_alcancada`) VALUES
(2, 7, 1, 'Protectors', 17, 'Teste', '5', '10'),
(3, 8, 1, 'Protectors', 17, 'muito bom', '5', '6'),
(4, 8, 1, 'Protectors', 16, 'será???', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `model` enum('Protectors','Schools','Tutors','Users','Therapists') NOT NULL,
  `model_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `views` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `model`, `model_id`, `name`, `content`, `views`, `created`, `modified`) VALUES
(1, 9, 'Protectors', 16, 'dsadsad', 'adada', 0, '2015-12-18 13:33:53', '2015-12-18 13:33:53');

-- --------------------------------------------------------

--
-- Table structure for table `message_recipients`
--

CREATE TABLE IF NOT EXISTS `message_recipients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` enum('Protectors','Schools','Tutors','Users','Therapists') NOT NULL,
  `model_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `message_recipients`
--

INSERT INTO `message_recipients` (`id`, `model`, `model_id`, `message_id`, `created`, `modified`) VALUES
(1, 'Protectors', 16, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Protectors', 17, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Users', 9, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `message_replies`
--

CREATE TABLE IF NOT EXISTS `message_replies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) NOT NULL,
  `model` enum('Protectors','Schools','Tutors','Users','Therapists') NOT NULL,
  `model_id` int(11) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` enum('Protectors','Schools','Tutors','Users','Therapists') NOT NULL,
  `feed` int(11) DEFAULT NULL,
  `evolucao` int(11) DEFAULT NULL,
  `bate_papo` int(11) DEFAULT NULL,
  `input` int(11) DEFAULT NULL,
  `exercicios` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `model`, `feed`, `evolucao`, `bate_papo`, `input`, `exercicios`) VALUES
(1, 'Protectors', 1, 1, 1, 1, 1),
(2, 'Schools', 1, 1, 1, 1, 1),
(3, 'Tutors', 1, 1, 1, 1, 1),
(4, 'Therapists', 1, 1, 1, 1, 1),
(5, 'Users', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `protectors`
--

CREATE TABLE IF NOT EXISTS `protectors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role` enum('mom','dad') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `protectors`
--

INSERT INTO `protectors` (`id`, `user_id`, `role`, `username`, `password`, `full_name`, `phone`, `created`, `modified`) VALUES
(16, 9, 'dad', 'paulorbs', 'relogio123', 'Paulo Ricardo Boeira da Silva', '(21) 9942-23617', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 9, 'mom', 'elieteribeiro', 'relogio123', 'Eliete Ribeiro de Almeida', '(21) 8754-6291 ', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE IF NOT EXISTS `schools` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role` enum('mediator','coordinator') NOT NULL,
  `instituition_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `user_id`, `role`, `instituition_id`, `username`, `password`, `full_name`, `phone`, `created`, `modified`) VALUES
(9, 9, 'coordinator', 7, 'lula@wakigawa.com.br', 'relogio123', 'Luis Inácio Lula da Silva Teste', '(21) 3586-8412 ', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE IF NOT EXISTS `themes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `user_id`, `name`, `created`, `modified`) VALUES
(1, 9, 'Matemática', '2015-12-16 10:55:30', '2015-12-16 10:55:30');

-- --------------------------------------------------------

--
-- Table structure for table `therapists`
--

CREATE TABLE IF NOT EXISTS `therapists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role` enum('Therapist') NOT NULL DEFAULT 'Therapist',
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `therapists`
--

INSERT INTO `therapists` (`id`, `user_id`, `role`, `username`, `password`, `full_name`, `phone`, `created`, `modified`) VALUES
(4, 9, 'Therapist', 'pedrolima', 'relogio123', 'Pedro Lima', '(21) 2147-6386 ', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE IF NOT EXISTS `tutors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role` enum('tutor') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `profile_attachment` varchar(255) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `instituition_id` int(11) NOT NULL,
  `clinical_condition` varchar(255) NOT NULL,
  `school_grade` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `profile_attachment`, `date_of_birth`, `instituition_id`, `clinical_condition`, `school_grade`, `description`, `created`, `modified`) VALUES
(9, 'luizhrqas@gmail.com', 'relogio123', 'Abacate da Silva', '1450196930-abacate1-jpg.jpg', '28/04/1995', 6, 'Síndrome de Down', 'Terceiro Ano', 'Complicado...', '2015-12-15 14:28:50', '2015-12-15 14:28:50');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

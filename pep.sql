-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27-Jun-2016 às 15:17
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
-- Estrutura da tabela `charts`
--

DROP TABLE IF EXISTS `charts`;
CREATE TABLE IF NOT EXISTS `charts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `subname` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `filter_start` varchar(11) NOT NULL DEFAULT '01/01/2016',
  `filter_end` varchar(11) DEFAULT '02/01/2016',
  `format` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `charts`
--

INSERT INTO `charts` (`id`, `name`, `subname`, `type`, `filter_start`, `filter_end`, `format`, `user_id`, `created`, `modified`) VALUES
(6, 'Humor', 'Pizza com todas as matérias', '', '01/01/2016', '02/01/2016', 'diario', 9, '2016-04-27 11:54:00', '2016-04-27 11:56:27'),
(7, 'Atenção', 'Diário de Linha', '', '01/01/2016', '02/01/2016', 'diario', 9, '2016-04-27 11:55:31', '2016-04-27 11:57:39'),
(10, 'Atençãox Autonomia x Independencia', 'Todas as matérias', '', '01/01/2016', '02/01/2016', 'diario', 9, '2016-04-27 23:23:55', '2016-04-27 23:27:40'),
(11, 'Atenção x Autonomia x Independência ', 'Matemática', '', '01/01/2016', '02/01/2016', 'diario', 9, '2016-04-27 23:35:38', '2016-04-27 23:36:08'),
(13, 'Atenção x Autonomia x Independência ', 'Física', '', '01/01/2016', '02/01/2016', 'diario', 9, '2016-04-27 23:56:30', '2016-04-27 23:56:30'),
(14, 'Atenção x Autonomia x Independência ', 'Química', '', '01/01/2016', '02/01/2016', 'diario', 9, '2016-04-28 00:04:55', '2016-04-28 00:04:55'),
(15, 'Atenção x Autonomia x Independência ', 'Biologia', '', '01/01/2016', '02/01/2016', 'diario', 9, '2016-04-28 00:08:09', '2016-04-28 00:08:09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chart_series`
--

DROP TABLE IF EXISTS `chart_series`;
CREATE TABLE IF NOT EXISTS `chart_series` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chart_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL DEFAULT '#CFC000',
  `type` varchar(255) NOT NULL,
  `input_id` int(11) DEFAULT NULL,
  `theme_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=213234 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `chart_series`
--

INSERT INTO `chart_series` (`id`, `chart_id`, `name`, `color`, `type`, `input_id`, `theme_id`) VALUES
(213218, 9, 'Autonomia', '#8E44AD', 'pie', 46, 1),
(213217, 8, 'Atenção', '#F89406', 'column', 42, 3),
(213216, 7, 'Atenção', '#26A65B', 'line', 42, NULL),
(213215, 6, 'Humor', '#446CB3', 'pie', 50, NULL),
(213214, 5, 'Atenção', '#19B5FE', 'column', 42, 1),
(213219, 10, 'Autonomia', '#F22613', 'line', 46, NULL),
(213220, 10, 'Indepedência', '#446CB3', 'line', 47, NULL),
(2354, 10, 'Atenção', '#26A65B', 'line', 42, NULL),
(213221, 11, 'Atenção', '#F22613', 'line', 42, 1),
(213222, 11, 'Autonomia', '#446CB3', 'line', 46, 1),
(213223, 11, 'Independência', '#87D37C', 'line', 47, 1),
(213224, 12, 'Atenção', '#F22613', 'line', 42, 3),
(213225, 13, 'Atenção', '#F22613', 'line', 42, 3),
(213226, 13, 'Autonomia', '#446CB3', 'line', 46, 3),
(213227, 13, 'Independência', '#26A65B', 'line', 47, 3),
(213228, 14, 'Atenção', '#F22613', 'line', 42, 4),
(213229, 14, 'Autonomia', '#446CB3', 'line', 46, 4),
(213230, 14, 'Independência', '#26A65B', 'line', 47, 4),
(213231, 15, 'Atenção', '#F22613', 'line', 42, 7),
(213232, 15, 'Autonomia', '#446CB3', 'line', 46, 7),
(213233, 15, 'Independência', '#26A65B', 'line', 47, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `chart_tabs`
--

DROP TABLE IF EXISTS `chart_tabs`;
CREATE TABLE IF NOT EXISTS `chart_tabs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `charts_related` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `chart_tabs`
--

INSERT INTO `chart_tabs` (`id`, `user_id`, `title`, `charts_related`) VALUES
(1, 9, 'Godiva 666', '["6","7","15"]'),
(2, 9, 'Almeida', '[10]');

-- --------------------------------------------------------

--
-- Estrutura da tabela `exercises`
--

DROP TABLE IF EXISTS `exercises`;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `hashtags`
--

DROP TABLE IF EXISTS `hashtags`;
CREATE TABLE IF NOT EXISTS `hashtags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `hashtags`
--

INSERT INTO `hashtags` (`id`, `name`) VALUES
(12, 'semmedicação'),
(13, 'semremédio'),
(14, 'aulainterrompida'),
(15, 'rivrotril'),
(16, 'pedro'),
(17, 'humordescendente'),
(18, 'desafiador'),
(19, 'pensamentoinvasivo'),
(20, 'frustração'),
(21, 'Humorascedente'),
(22, 'textoprivativo'),
(23, 'comentarioremedio'),
(24, 'diadeprova');

-- --------------------------------------------------------

--
-- Estrutura da tabela `inputs`
--

DROP TABLE IF EXISTS `inputs`;
CREATE TABLE IF NOT EXISTS `inputs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('calendario','intervalo_tempo','registro_textual','escala_numerica','escala_texto','numero','texto_privativo') NOT NULL,
  `user_id` int(11) NOT NULL,
  `model` enum('All','Protectors','Schools','Tutors','Users','Therapists') NOT NULL,
  `name` varchar(255) NOT NULL,
  `config` text NOT NULL,
  `belongs_to_protectors` tinyint(1) NOT NULL DEFAULT '0',
  `belongs_to_schools` tinyint(1) NOT NULL DEFAULT '0',
  `belongs_to_tutors` tinyint(1) NOT NULL DEFAULT '0',
  `belongs_to_therapists` tinyint(1) NOT NULL DEFAULT '0',
  `belongs_to_users` tinyint(1) NOT NULL DEFAULT '0',
  `position` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `inputs`
--

INSERT INTO `inputs` (`id`, `type`, `user_id`, `model`, `name`, `config`, `belongs_to_protectors`, `belongs_to_schools`, `belongs_to_tutors`, `belongs_to_therapists`, `belongs_to_users`, `position`, `status`, `created`, `modified`) VALUES
(35, 'registro_textual', 9, 'All', 'Observação da Aula', '', 0, 0, 0, 0, 0, 1, 0, '2015-12-15 16:42:42', '2016-01-06 15:21:47'),
(36, 'escala_numerica', 9, 'All', 'Avaliação da Aula', '{"min":"1","max":"5"}', 0, 0, 0, 0, 0, 0, 0, '2015-12-15 16:43:11', '2015-12-15 17:34:49'),
(37, 'escala_texto', 9, 'All', 'Sou bom?', '{"options":["Sim","Muito","N\\u00e3o","P\\u00e9ssimo"]}', 0, 0, 0, 0, 0, 0, 0, '2015-12-16 10:47:51', '2016-01-06 15:21:50'),
(38, 'calendario', 9, 'All', 'Data da aula', '', 0, 0, 0, 0, 0, 0, 0, '2016-01-16 15:04:43', '2016-01-16 15:04:49'),
(39, 'calendario', 9, 'All', 'Data da aula modificado', '', 0, 0, 0, 0, 0, 4, 0, '2016-01-16 15:06:55', '2016-01-21 09:41:16'),
(40, 'intervalo_tempo', 9, 'All', 'Tempo de aula (horas)', '', 0, 0, 1, 0, 0, 5, 1, '2016-01-16 15:07:16', '2016-04-27 13:32:23'),
(41, 'registro_textual', 9, 'All', 'Descrição', '', 0, 0, 0, 0, 0, 3, 0, '2016-01-16 15:07:30', '2016-01-21 09:39:17'),
(42, 'escala_numerica', 9, 'All', 'Atenção', '{"min":"0","max":"10"}', 1, 1, 1, 1, 1, 6, 1, '2016-01-16 15:08:05', '2016-05-02 22:30:10'),
(43, 'escala_texto', 9, 'All', 'Humor', '{"options":["Agressivo","Irritado","Normal","contente","Alegre","Esfuziante"]}', 0, 0, 0, 0, 0, 4, 0, '2016-01-16 15:12:09', '2016-01-21 11:39:54'),
(44, 'numero', 9, 'All', 'Tempo disperso (seg.)', '', 0, 0, 1, 0, 0, 3, 1, '2016-01-16 15:14:28', '2016-04-27 13:32:28'),
(45, 'texto_privativo', 9, 'All', 'Texto privativo', '', 1, 1, 1, 1, 1, 0, 1, '2016-01-16 15:15:26', '2016-05-02 22:32:17'),
(46, 'escala_numerica', 9, 'All', 'Autonomia', '{"min":"0","max":"10"}', 0, 1, 1, 0, 0, 1, 1, '2016-01-21 09:39:46', '2016-06-01 10:16:19'),
(47, 'escala_numerica', 9, 'All', 'Independência', '{"min":"0","max":"10"}', 0, 1, 1, 0, 0, 2, 1, '2016-01-21 09:40:43', '2016-06-01 10:15:56'),
(48, 'numero', 9, 'All', 'Exercícios/atividades propostos(as)', '', 0, 1, 1, 0, 0, 0, 1, '2016-01-21 09:50:13', '2016-06-01 10:17:37'),
(49, 'numero', 9, 'All', 'Exercícios/atividades realizados(as)', '', 0, 1, 1, 0, 0, 0, 1, '2016-01-21 09:50:26', '2016-06-01 10:18:23'),
(50, 'escala_texto', 9, 'All', 'Humor', '{"options":["Irritado","Mal humorado","Normal","Bem humorado","Empolgado",""]}', 1, 1, 1, 1, 1, 0, 1, '2016-01-21 11:41:20', '2016-05-02 22:32:54'),
(51, 'escala_numerica', 9, 'All', 'Testeeeee', '{"min":"5","max":"10"}', 0, 0, 0, 0, 0, 0, 0, '2016-04-14 17:26:51', '2016-04-25 22:53:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `instituitions`
--

DROP TABLE IF EXISTS `instituitions`;
CREATE TABLE IF NOT EXISTS `instituitions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `instituitions`
--

INSERT INTO `instituitions` (`id`, `name`) VALUES
(1, 'IBA-Wakigawa'),
(3, 'Abacateiro'),
(4, 'CEI- Centro Educacional Espaço Integrado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lessons`
--

DROP TABLE IF EXISTS `lessons`;
CREATE TABLE IF NOT EXISTS `lessons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `observation` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lessons`
--

INSERT INTO `lessons` (`id`, `user_id`, `date`, `observation`, `created`, `modified`) VALUES
(14, 9, '2014-09-25', '<ul>\r\n	<li>Jo&atilde;o muito depressivo quando cheguei.&nbsp;Chorando, fragilizado, reclamou que a Karina saiu mais cedo. Disse estar solit&aacute;rio e com medo de perd&ecirc;-la.</li>\r\n	<li>Irritou-se quando percebeu ser tarefa longa</li>\r\n	<li>Baixa autonomia, pouco maior do que a do dia anterior</li>\r\n	<li>Melhora de humor ao longo da aula</li>\r\n	<li>Muito disperso, arranjando mtivos para dispersar. Poss&iacute;vel procrastina&ccedil;&atilde;o (Cupim voando, co&ccedil;and o nariz pat&eacute; espirrar). Com isso a aula esta se tornando lenta.&nbsp;</li>\r\n	<li>Postura pregui&ccedil;osa. Parece chutar ao inves de tentar fazer a montagem do sal.&nbsp;</li>\r\n	<li>Reclamando muito de tudo:Azia, alergia e desaten&ccedil;&atilde;o&nbsp;</li>\r\n	<li>Reclama, mas est&aacute; muito descompromissado: pede para sair o tempo todo.&nbsp;</li>\r\n	<li>Extremamente nervoso, nao consegue nem lembrar qual elemento que esta sendo balanceado no momento. Se n&atilde;o falo o que fazer n&atilde;o sai do lugar.&nbsp;</li>\r\n</ul>\r\n', '2016-01-21 12:30:20', '2016-04-20 10:58:17'),
(15, 9, '2014-09-30', '<ul>\r\n	<li>Depois de reclamar da quest&atilde;o que errou no teste rel&acirc;mpago: &quot;Saco, perdi a oportunidade de recuperar minha nota!&quot; (imdiatamente, ficou 5 segundos absorto).</li>\r\n	<li>Apresentou alguns sorrisos imotivados durante a aula.</li>\r\n	<li>Aten&ccedil;&atilde;o muito ruim. Pareceu perdido na primeira vez, sem ter entendido, mas fez sozinho a letra &quot;b&quot; (pareceu que nao ia seguir adiante, mas seguiu sozinho).</li>\r\n	<li>Independencia melhorou ao longo da aula, bem como a aten&ccedil;&atilde;o.</li>\r\n	<li>Humor melhorou. Apresentou bom humor, fazendo piadas, perguntas pertinentes e buscando respostas para as pr&oacute;prias perguntas.</li>\r\n	<li>30 segundos de absor&ccedil;ar at&eacute; perceber que eu estava olhando.</li>\r\n	<li>40 segundos de absor&ccedil;ao at&eacute; perceber que eu estava olhando e perguntar: &quot;Oque? &Eacute; que eu estava pensando o c&aacute;lculo&quot;.</li>\r\n	<li>Sua dispers&atilde;o parece ser focada em algum pensamento, mas nao parece estar afetando seu humor ou confian&ccedil;a quando volta</li>\r\n	<li>Apresentou poucos retoques</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', '2016-01-21 12:53:00', '2016-01-21 12:53:00'),
(16, 9, '2014-10-07', '<ul>\r\n	<li>Aparentou muito bom humor: Ao acertar um exerc&iacute;cio: &quot;Uma amiga minha que me ensinou. &Eacute; apenas uma colega. Colega tamb&eacute;m marcam nossa vida...&quot;</li>\r\n	<li>Parece estar mais independente em rea&ccedil;&otilde;es de neutraliza&ccedil;&atilde;o, mas tem muitos conceitos ainda pendentes, na base de qu&iacute;mica, incluindo o entendimento de sua nota&ccedil;&atilde;o e da constitui&ccedil;&atilde; molecular/at&oacute;mica.</li>\r\n	<li>Aten&ccedil;&atilde;o eu uma ca&iacute;da ao longo da aula</li>\r\n	<li>Peguei ele em sorrisos imotivados.</li>\r\n	<li>O humor continua bom, assim como o engajamento</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', '2016-01-21 13:20:57', '2016-01-21 13:20:57'),
(17, 9, '2014-10-08', '<p><strong>QU&Iacute;MICA</strong></p>\r\n\r\n<ul>\r\n	<li>Aparenta nervosismo e aten&ccedil;&atilde;o ruim. Reclamando e sua prova de matem&aacute;tica.</li>\r\n	<li>Muito disperso.</li>\r\n	<li>S&oacute; avan&ccedil;a sob meus comandos. Muito nersoso. Chegou a resposta commeus comandos na letra b, Falta de independencia ate na forma de calcular o NOX</li>\r\n	<li>Perguntou-me se ele tinha motivo para se preocupar, esperando que eu lhe desse agum ai&iacute;vio/conforto. Respondi que &quot;n&atilde;o era eu quem dicidia isso e que ele j&aacute; tinha condi&ccedil;&otilde;es para sber o que eu achava&quot;</li>\r\n	<li>Demorou quase uma hora para fazer a quest&atilde;o 8 de qu&iacute;mica.</li>\r\n</ul>\r\n\r\n<p><strong>MATEM&Aacute;TICA</strong></p>\r\n\r\n<ul>\r\n	<li>N&atilde;o fez o exerc&iacute;cio que deixei para ele, no dia 05. Recusei-me a fazer com ele.&nbsp;</li>\r\n	<li>Parece que espera que eu fa&ccedil;a todas as partes ds exerc&iacute;cios, insinuando, inclusive, que eu fizesse uma conta na calculadora (Pode ser que diante da dificuldade, ele queira avan&ccedil;ar a qualqur custo)</li>\r\n</ul>\r\n', '2016-01-21 13:36:33', '2016-01-21 13:36:33'),
(18, 9, '2014-09-09', '<ul>\r\n	<li>Optei por n&atilde;o deixar ele se dispersar hoje, na tentativa de entender o quanto sua produ&ccedil;&atilde;o era atrapalhada por esses momentos.&nbsp;</li>\r\n	<li>Aconteceu alguma cois com ele hoje, na escola. Ele quis contar, mas eu o interrompi.</li>\r\n	<li>Muito disperso e querendo conversar.&nbsp;</li>\r\n	<li>Independ&ecirc;ncia oscilando e acompanhada pela atonomia.&nbsp;</li>\r\n	<li>Aparenta estar bastante ocupado com pensamentos invasivos, desde o dia anterior, como se a dispers&atilde;o fosse focada em alguma quest&atilde;o interna, acompanhada de olho arregalado a olhar fixo. Perguntei mas ele disse que s&oacute; estava distra&iacute;do.&nbsp;&nbsp;</li>\r\n</ul>\r\n', '2016-01-21 13:54:33', '2016-01-21 13:54:33'),
(19, 9, '2014-10-14', '<ul>\r\n	<li>Reduzimos o n&uacute;mero de exerc&iacute;cios de matem&aacute;tica a serem feitos, para dar tempo de estudar para a prova de f&iacute;sica, segunda feira.Caso cheue a uma hora de aula, mesmo sem terminamos, passamos para f&iacute;sica.&nbsp;</li>\r\n	<li>Parece bem disposto, at&eacute; atento, apesar de ter tido um dia ruim e obsessivo, como a Karina relatou.</li>\r\n	<li>Tentou conversar sobre o trabalho de literatura e sobre o &quot;barulho que o l&aacute;pis dele faz&quot; e que ele &quot;deveria usar lapiseira&quot;.</li>\r\n	<li>Mat&eacute;ria nova (soma de limite). ele apreendeu o protocolo e n&atilde;o parece inseguro mas travou na algebra</li>\r\n	<li>Aten&ccedil;&atilde;o parece boa</li>\r\n	<li>Apresentou poucos retoques.&nbsp;</li>\r\n	<li>Perdeu-se, ocupado por seus pensamentos, durante 15 segundos e terminou com um sorriso imotivado.&nbsp;</li>\r\n	<li>Depois de uma hora de aula, atento, caiu aten&ccedil;&atilde;o e ele passou a se absorver mais.&nbsp;</li>\r\n</ul>\r\n', '2016-01-21 14:12:49', '2016-01-21 14:12:49'),
(20, 9, '2014-10-16', '<ul>\r\n	<li>Aparenta bom humor, contando hist&oacute;rias do dia (Jogo de queimado, que em ingl&ecirc;s tem outro nome, Dodgeball)</li>\r\n	<li>N&atilde;o tinha nenhum conhecimento pr&eacute;vio sobre o conte&uacute;do, tive que dar uma longa introdu&ccedil;&atilde;o, Que durou mais de 20 minutos)</li>\r\n	<li>Acompanhou a explica&ccedil;&atilde;o com alguma dificuldade mas conseguiu for&ccedil;ar a aten&ccedil;&atilde;o. Come&ccedil;ou a reclamar de sua aten&ccedil;&atilde;o, quando eu dei um corte r&iacute;spido e ele aceitou, espantado: Seguiu atento. Pode ser que a &quot;desaten&ccedil;&atilde;o&quot; tenha sido escape, dante da dificuldade.&nbsp;</li>\r\n</ul>\r\n', '2016-01-21 14:33:19', '2016-01-21 14:33:19'),
(21, 9, '2014-10-18', '<ul>\r\n	<li>Aula s&aacute;bado, 11:00</li>\r\n	<li>Bastante lento e desatento</li>\r\n	<li>Encadeamento de id&eacute;ias afetando at&eacute; a fala, que parece lenta e truncada.&nbsp;</li>\r\n	<li>Aten&ccedil;&atilde;o melhorou um pouco e ele parece estar acompanhando a narrativa do exerc&iacute;cio (n&atilde;o se perdeu ap&oacute;s achar Px, lembrou que estava fazedo para calcular a For&ccedil;a el&aacute;stica)</li>\r\n	<li>Independ&ecirc;ncia tambem melhorou ao longo da aula&nbsp;</li>\r\n	<li>Come&ccedil;ou a suspirar, se entregar &agrave;&nbsp;absor&ccedil;&atilde;o e n&atilde;o demonstrar mais engajamento.</li>\r\n</ul>\r\n', '2016-01-21 14:56:55', '2016-01-21 14:56:55'),
(22, 9, '2014-10-19', '<ul>\r\n	<li>Se mostrou atento e engajado no in&iacute;cio, mas come&ccedil;amos com uma quest&atilde;o muito dif&iacute;cil, que o est&aacute; deixando ansioso.</li>\r\n	<li>Travou ao fazer a soma da &aacute;rea.</li>\r\n	<li>aten&ccedil;&atilde;o come&ccedil;ou boa mas caiu ap&oacute;s a dificuldade.&nbsp;</li>\r\n	<li>Independ&ecirc;ncia baixa desde o in&iacute;cio (quest&atilde;o muito dif&iacute;cil) - Quase uma hora para fazer o exerc&iacute;cio e, mesmo assim, muito guiado por mim.&nbsp;</li>\r\n	<li>N&atilde;o o deixei dispersar durante a aula</li>\r\n</ul>\r\n', '2016-01-21 15:16:16', '2016-01-21 15:16:16'),
(23, 9, '2014-10-20', '<ul>\r\n	<li>Estudo para teste de Biologia que ele teve que parar no meio.</li>\r\n	<li>Come&ccedil;ou muito nervoso e derrotado mas mudou de postura, apos uma conversa em que disse que ele tinha que ser a &uacute;ltima pessoa a se colocar pra baixo, que esse tinha sido um ano duro, de auto conhecimento e que ele tinha que se aceitar e perceber que vale tanto quanto os outros. Depois disso, passou a mostrar engajamento e a aten&ccedil;&atilde;o melhorou.&nbsp;</li>\r\n	<li>Em determinado momento, ele acessou rapidamente o campo de mensagens do facebook e se direcionou &agrave;s mensagens do Thiago. Sua aten&ccedil;&atilde;o piorou muito e eu tive que conversar seriamente sobre como ele havia se sabotado. &nbsp;Desliguei o computador. &nbsp;Com o tempo voltou a melhorar, mas com momentos de absor&ccedil;&atilde;o.&nbsp;</li>\r\n	<li>Durante o dever de hist&oacute;ria, seu humor melhorou bastante e se mostrou mais confiante.&nbsp;</li>\r\n	<li>Seguiu bem e com independencia at&eacute; o final da leitura e marca&ccedil;&atilde;o do texto de hist&oacute;ria.</li>\r\n</ul>\r\n', '2016-01-21 15:35:56', '2016-01-21 15:35:56'),
(24, 9, '2014-10-22', '<ul>\r\n	<li>Fiquei em sil&ecirc;ncio, deixando-o fazer sozinho. Quando ele percebeu, olhou, passou a m&atilde;o na testa e disse estar muito nervoso. INterrompi-o e falei para continuar. Ele continuou e fez a parte d e&eacute;tica sozinho.&nbsp;</li>\r\n	<li>Apesar de parecer um pouco ap&aacute;tico, n&atilde;o est&aacute; se distraindo muito e demonstra engajamento em rela&ccedil;&atilde;o ao dever.&nbsp;</li>\r\n	<li>Como e o forcei o tempo todo a continuar, houve rendimento, de outro modo, dificilmente aocnteceria, j&aacute; que houve resist&ecirc;ncia e sonol&ecirc;ncia de sua parte por vezes, inclusive com reclam&ccedil;&otilde;es quando eu chamava sua aten&ccedil;&atilde;o,&nbsp;</li>\r\n</ul>\r\n', '2016-01-21 15:50:03', '2016-01-21 15:50:03'),
(25, 9, '2014-10-23', '<ul>\r\n	<li>Come&ccedil;ou a aula muito mal humorado porque n&atilde;o concordei em umtilizar o tepo da aula para passar para o papelo resumo de historia que hav&iacute;amos marcado no livro. Depois de uma conversa, ele aceitou, me pediu desculpas e passamos para literatura.</li>\r\n	<li>Demonstrou aten&ccedil;&atilde;o e bom humor durante o estudo de forma&ccedil;&atilde;o das palavras.</li>\r\n</ul>\r\n', '2016-01-21 16:16:31', '2016-01-21 16:16:31'),
(26, 9, '2014-11-06', '<ul>\r\n	<li>Muito bem humorado e puxando assunto.</li>\r\n	<li>Fez a pesquisa sozinho e encontrou a informa&ccedil;&atilde;o necess&aacute;ria.</li>\r\n</ul>\r\n', '2016-01-21 16:25:34', '2016-01-21 16:25:34'),
(27, 9, '2014-11-07', '<p>-N&atilde;o tomou o rem&eacute;dio. Reclama&ccedil;&otilde;es constantes e n&atilde;o conseguia terminar uma frase.&nbsp;</p>\r\n\r\n<p>-Reclamando o tempo inteiro, a&nbsp;aula n&atilde;o ocorreu devidamente&nbsp;e&nbsp;depois de amea&ccedil;ar interromper a aula se ele nao se esfor&ccedil;asse e parasse de reclamar, ele me desafiou e eu tive que interromper a aula.&nbsp;</p>\r\n\r\n<p>- Me ligou em seguida, pedindo desculpas e afirmando que n&atilde;o faria mais isso. Marcamos a aula para o dia seguinte.</p>\r\n', '2016-01-21 16:37:42', '2016-01-21 16:37:42'),
(28, 9, '2014-11-08', '<ul>\r\n	<li>Houve uma conversa dee com os pais, seu humor melhorou e sua aten&ccedil;&atilde;o seguiu boa t&eacute; o final, quando cai um pouco.&nbsp;</li>\r\n	<li>Em determinado momento, puxou assunto sobre estar de sac cheio mas nao poder agir dessa forma. Saudades da escolha e dos amigos, no entanto.</li>\r\n	<li>Aten&ccedil;&atilde;o piorou no final, mas esteve disposto</li>\r\n</ul>\r\n', '2016-01-21 16:51:18', '2016-01-21 16:51:18'),
(29, 9, '2014-11-12', '<ul>\r\n	<li>Chebou tranquilo, at&eacute; perceber que n&atilde;o lembrava parte da mat&eacute;ria. Ficou muito nervoso e foi agressivo por, elo menos, duas vezes.&nbsp;</li>\r\n	<li>Depois do segundo ataque de nervos, ele tirou o rivotril da mochila &nbsp;e o humor dele melhorou em 5 minutos: &quot;Esse rem&eacute;dio &eacute; bom, s&oacute; de pegar j&aacute; me acalma. Me deixa confiante&quot;</li>\r\n	<li>Sorrisos imotivados constantes.</li>\r\n	<li>Assim que o rem&eacute;dio come&ccedil;ou a fazer efeito, me perguntou se deveria dar tanta import&acirc;ncia para essas coisas (Esquecer material, materia...). Expliquei s&oacute; equanto lhe fazia bem, que essa preocupa&ccedil;&atilde;o n&atilde;o poderia fazer mais mal a ele do que o pr&oacute;prio esqueciento.&nbsp;</li>\r\n	<li>Em determinado momento ele se distraiu e eu chamei-lhe a aten&ccedil;&atilde;o. N&atilde;o parece surpreso ou constrangido, apenas deu sorrisinho.</li>\r\n	<li>Aten&ccedil;&atilde;o ficou se desprendendo na meia hora final &nbsp;e predendo-se em coisas aleat&oacute;rias por alguns segundos, cada.&nbsp;</li>\r\n</ul>\r\n', '2016-01-21 20:25:28', '2016-01-21 20:25:28'),
(30, 9, '2014-11-13', '<ul>\r\n	<li>Cheguei um pouco mais cedo. Demorou porque estava dormindo&nbsp;</li>\r\n	<li>Parecia bem sonolento e n&atilde;o soube dizer se tinha lavado o rosto.&nbsp;</li>\r\n	<li>Est&aacute; lento e pouco independente, mas as vezes consegue recordar coisas como as placas tect&ocirc;nicas e a instabilidade das regi&otilde;es de encontro</li>\r\n</ul>\r\n', '2016-01-21 21:31:01', '2016-01-21 21:31:01'),
(31, 9, '2014-11-15', '<ul>\r\n	<li>Me recebeu de om humor, sorriso no rosto , mostrnado disposi&ccedil;&atilde;o e independ&ecirc;ncia.</li>\r\n	<li>Abriu o livro e foi direto para o cap&iacute;tulo de &oacute;xidos, copiando a defini&ccedil;&atilde;o sozinho.</li>\r\n	<li>Teve dificuldade em perceber que o fluor era uma exce&ccedil;&atilde;o &agrave; forma&ccedil;&atilde;o de &oacute;xidos e que o asterisco no texto responde &agrave; pergunta (Porque o Fluor &eacute; uma exce&ccedil;&atilde;o?)</li>\r\n	<li>Depois de cerce&aacute;-lo muito com perguntas, ele chegou &agrave; constata&ccedil;&atilde;o: &quot;O fluor n&atilde;o combina com oxig&ecirc;nio para formar &oacute;xidos&quot;</li>\r\n	<li>Na hora de dar exempls, ele tentou dar exemplo de &nbsp;de elementos e n&atilde;o de &oacute;xidos. Ficou um tempo confuso, quando eu o interpelei. At&eacute; que pergunei sobre o que era o trabalho. Respondeu &quot;&aacute;cidos, e logo fez cara feia, percebendo que havia travado. N&atilde;o soube associar com facilidade e eu tive que conduzi-lo at&eacute; a resposta certa.&nbsp;</li>\r\n	<li>Ajudei-o a resgatar a linha associativa, quando ele travou na equa&ccedil;&atilde;o de desidrata&ccedil;&atilde;o H2SO4 - H2O = SO3. Pedi para ele recordar sobre &nbsp;que est&aacute;vamos falando &nbsp;(Qual o contexto) e qual tinha sido a &uacute;ltima coisa que falamos. O entendimento veio quase que imediatamente.&nbsp;</li>\r\n	<li>A partir de um momento come&ccedil;ou a travar, aparentando &nbsp;irrita&ccedil;&atilde;o. Quando perguntei o Porqu&ecirc; ele disse, &quot;Lembrei de uma coisa que deixou irritado\\&#39;</li>\r\n	<li>Seguiu a aula toda irritado, travado e perdeu em autonomia e parou de buscar as resposta com engajamento.&nbsp;</li>\r\n	<li>Ele realmente esta irritado, mas lutando para n&atilde;o desabar:</li>\r\n	<li>Eu: &quot;-Vamos l&aacute; Johnny, t&aacute; quase acabando por hoje!&quot; Ele: &quot;-O problema n&atilde;o &eacute; esse.&quot; Eu: &quot;Ent&atilde;o, qual &eacute;?&quot; &nbsp;Ele: &quot;Uhm, deixa pra l&aacute;&quot; E continuou a fazer.</li>\r\n	<li>EM varios momentos ele fica muito travado e n&atilde;o avan&ccedil;a, quase tremendo, mas sem parecer perdido em seus pensamentos. Continua tentando.&nbsp;</li>\r\n	<li>Depois fui saber que havia brigado com o pai, n&atilde;o me disse o motivo</li>\r\n</ul>\r\n', '2016-01-21 22:21:48', '2016-01-21 22:21:48'),
(32, 9, '2014-11-16', '<ul>\r\n	<li>Atendeu bem humorado e falante.&nbsp;</li>\r\n	<li>Avisei que o deixaria fazer os exercicios sozinho.Ele pergunou se eu tinha certeza disso. Respondi que sim e ele come&ccedil;ou a sair.&nbsp;</li>\r\n	<li>Perdeu-se por 10 segundos na espiral do caderno.</li>\r\n	<li>Ficou muito orgulhoso ao perceber que acertou a primeira quest&atilde;o sozinho . Deu um sorriso largo. (demorou pouco mais de 5 minutos)</li>\r\n	<li>Passou a dispersar muito, mas continuou a fazer sozinho (Boa autonomia, mas fraca aten&ccedil;&atilde;o)</li>\r\n</ul>\r\n', '2016-01-21 22:47:04', '2016-01-21 22:47:04'),
(33, 9, '2015-02-23', '<p>Muito bem Humorado e conversando sobre seu carnaval.</p>', '2016-04-25 22:50:55', '2016-04-25 22:50:55'),
(37, 9, '2015-02-25', '<p>João começou a aula muito nervoso e frustrado com a falta de amigos, demonstrando ansiedade em afirmar que mudou. Depois de longa conversa e acesso de raiva (aprox. 30 minutos), ordenei, calmamente, que passassemos para a tarefa, o que ele fez, à revelia.&nbsp;</p><br><p><ul><li>Apesar da raiva evidente, conduziu bem os exercícios, com alguns momentos de dispersão branda, causa aparentemente pela raiva e ocupação com o problema da falta de amigos (dispersão concentrada em outra coisa) Motio da raiva: alegava solidão e falta de amigos.&nbsp;</li></ul></p>', '2016-05-02 23:16:45', '2016-05-02 23:16:45'),
(38, 9, '2015-02-25', '<p>João começou a aula muito nervoso e frustrado com a falta de amigos, demonstrando ansiedade em afirmar que mudou. Depois de longa conversa e acesso de raiva (aprox. 30 minutos), ordenei, calmamente, que passassemos para a tarefa, o que ele fez, à revelia.&nbsp;</p><br><p><ul><li>Apesar da raiva evidente, conduziu bem os exercícios, com alguns momentos de dispersão branda, causa aparentemente pela raiva e ocupação com o problema da falta de amigos (dispersão concentrada em outra coisa) Motio da raiva: alegava solidão e falta de amigos.&nbsp;</li></ul></p>', '2016-05-02 23:17:09', '2016-05-02 23:17:09'),
(39, 9, '2015-04-27', '<ol><li>No início da aula apresentou humor melhor, aparentando estar se esforçando para atender a demanda feita ao final da última aula., em relação a isso.&nbsp;</li><li>O humor foi piorando a cada dificuldade encontrada e no fim, já não queria fazer e resmungava muito.&nbsp;</li><li>Em determinado momento, perguntei se ele ia querer que eu sempre procurasse as fórmulas para ele, no que ele respondeu de cabeça baixa e tom leve de desafio: "sim".&nbsp;</li><li>Tentou travar a aula algumas vezes &nbsp;falando de problemas e pensamentos invasivos</li><li>Tive que terminar a aula antes, como combinado, caso ele não controlasse seu humor.&nbsp;</li><li>Me ligou depois, pedindo desculpas . Aceitei e expliquei que ele teria que lidar com isso na próxima aula e que o dever precisava ser feito</li></ol>', '2016-05-02 23:33:03', '2016-05-02 23:33:03'),
(40, 9, '2015-03-20', '<ul><li>Começou de bom humor, depois este foi piorando, na medida em que começou a errar. &nbsp;O mal humor passou a comandar seu comportamento. (até então, estava fazendo muito bem os exercícios)</li><li>"Foco não serve pra nada" / "Me esforço, mas nao adianta nada" (Tive a impressão de que ele não estava falando exatamente dos exercícios, mas de seu desempenho em geral)</li><li>Fui bastate duro com ele, dizendo que eu não ia permitir que ele pasasse a aula daquela maneira, ficando mais tempo, depois da aula. Que ele teria que aproveitar o tempo que tem.&nbsp;</li><li>Ao final da aula, todos os parametros cairam: atenção, autonomia, independencia....</li></ul>', '2016-05-02 23:44:04', '2016-05-02 23:44:04'),
(41, 9, '2015-03-02', '<ul><li><span style="font-family: Roboto, sans-serif; line-height: 1.5;">Se esforçou por autonomia, depois de eu forçar, estimulando e dando meias resposta, para que ele buscasse a sequência.</span><br></li><li><span style="font-family: Roboto, sans-serif; line-height: 1.5;">Aparentemento o ocorrido na última aula surtiu efeito.</span></li></ul>', '2016-05-02 23:55:40', '2016-05-02 23:55:40'),
(42, 9, '2015-03-04', '<ul><li><span style="font-family: Roboto, sans-serif; line-height: 1.5;">Ficou bastante incomodado quando eu disse que teria que fazer sozinho, que eu só estava lá para ajudá-lo</span><br></li><li><span style="font-family: Roboto, sans-serif; line-height: 1.5;">Dificuldade, inclusive, em acar o assunto no índice</span></li><li><span style="font-family: Roboto, sans-serif; line-height: 1.5;">Ficou mal humorado, não quer fazer, quer conversar sobre os problemas. Parece fugindo das dificuldades.</span></li><li><span style="font-family: Roboto, sans-serif; line-height: 1.5;">Depois de quase uma hora de aula, comigo bloqueando qualquer tipo de assunto que não fosse o conteúdo. João assumiu uma postura positiva, apesar de apresentar dificuldade em interpretação de texto.</span></li></ul>', '2016-05-03 00:07:33', '2016-05-03 00:07:33'),
(44, 9, '2015-04-17', '<ul><li><span style="font-family: Roboto, sans-serif; line-height: 1.5;">Está bem humorado. e disse que estava bem. Disse que tinhamos exercícios de matemática e química para fazer.&nbsp;</span><br></li><li>Começou atento e autônomo, mas em pouco tempo a dispersão aumentou muito, o humor piorou e sua atenção ficou muito ruim<span style="font-family: Roboto, sans-serif; line-height: 1.5;">&nbsp;(lendo a frase sem interpretar).</span></li><li><span style="font-family: Roboto, sans-serif; line-height: 1.5;">"Não consigo tirar nota boa em matemática" / "Tenho motivo para ficar rpeocupado dessa maneira"</span></li><li><span style="font-family: Roboto, sans-serif; line-height: 1.5;">Choramingou e ficou nervoso</span></li><li><span style="font-family: Roboto, sans-serif; line-height: 1.5;">Travou, dizendo que travou assim "porque já está com a cabeça na prova"</span></li><li><span style="font-family: Roboto, sans-serif; line-height: 1.5;">Do nada,começou o exercício falando que "Ah, peraí, você tinha falado que esse exercício era fácil e, realmente, acho que já entendi"</span></li><li><span style="font-family: Roboto, sans-serif; line-height: 1.5;">Depois, seu desempenho melhorou bastante.&nbsp;</span></li></ul>', '2016-05-05 18:21:29', '2016-05-05 18:21:29'),
(45, 9, '2015-04-24', '<p><ul><li><span style="font-family: Roboto, sans-serif; line-height: 1.5; color: inherit;">João chegou de bom humor, abrindo a janela e conversando sobre o novo cartão de crédito e sobre o filme que havia visto no dia anterior.Fez bem o exercicio que havia passado pra ele no dia anterior, mas esqueceu de mudar a unidade (g/cm3 para g/L)</span></li><li><span style="font-family: Roboto, sans-serif; line-height: 1.5; color: inherit;">Fciou muito abalado com ter errado, Atenção caiu muito, ficou irritado e reclamou de ter errado. Fiz ele ver o que tinha errado &nbsp;e perceber que isso era detalhe. melhorou aos poucos.&nbsp;</span></li><li><span style="font-family: Roboto, sans-serif; line-height: 1.5; color: inherit;">Sua atenção oscila, mas o humor melhorou.</span></li><li><span style="font-family: Roboto, sans-serif; line-height: 1.5; color: inherit;">Ao terminar, fizemos mais exercicios propostos.&nbsp;</span></li></ul></p><span style="font-family: Roboto, sans-serif; line-height: 1.5;"><br></span>', '2016-05-05 18:55:09', '2016-05-05 18:55:09'),
(46, 9, '2015-04-25', '<ul><li>Autonomia começou muito boa, com bos interpretação de texto.&nbsp;</li><li>Atenção boa, mas com olhar disperso.</li><li>Passando para química, foi bem em dinamica dos gases perfetos, mas eve maior dificuldade em estequiometria.&nbsp;</li><li>Comentou sobre os remédios que o deixam mais atento e seguro e que a idéia é que possa ficar sem eles algum dia.&nbsp;</li></ul>', '2016-05-05 19:15:45', '2016-05-05 19:15:45'),
(49, 9, '2016-05-09', '', '2016-05-11 13:13:05', '2016-05-11 13:13:05'),
(51, 9, '2016-05-23', '<p style="text-align: justify;"><span style="font-family: Roboto, sans-serif; line-height: 1.5;">Cheguei e João já estava estudando (tinha acabado de começar, por conta da minha chegada.) Não havia passado a limpo o exercício que eu havia pedido na aula anterior, ao final, quado tive que sair. Aparentemente, ele não continuou fazendo, mesmo comigo terminando o raciocínio pra mim, demonstrando muito pouco envolvimento, Resolveu tentar só n momento em que eu cheguei, na ala seguinte. Ajudei ele, que se mostrou completamente perdido nos protocolos a serem utilizados. Usando fórmulas de modo aleatório por lembrar que eram aquelas que eu havia utilizado. Não conseguiu. Ajudei-o a terminar e começamos a estudar para a prova de Física, escolhemos estudar trabalho, já que ele disse não estar entendendo muito. Estava muito por fora do conteúdo e não conseguiu fazer as questões mais simples, de pura aplicação de conta. Colocava os valores na variável errada e errava a unidade. Seguiu a aula toda assim, confundindo o conceito de trabalho com o de força. Tive que fazer uma explanação conceitual o que melhorou um pouco. Peguei ele aéreo algumas vezes. Atenção ruim, até que eu chamei sua atenção e conversei sobre sua postura. isso aconteceu umas 3 vezes durante a aula. No entanto ele não pareceu conseguir controlar. Parecia ocupado com outra coisa.</span></p><span style="font-family: Roboto, sans-serif; line-height: 1.5;">Na minha chegada, comentou sobre o frio do final de semana, em Itaipava, que era bom e sobre sua irmâ ter bebido vinho com o namorado.&nbsp;</span>', '2016-05-23 22:03:53', '2016-05-23 22:03:53'),
(52, 9, '2016-05-24', 'Teste', '2016-05-24 13:01:14', '2016-05-24 13:01:14'),
(53, 9, '2016-06-01', 'Dia de prova. João não cumpriu com o acordo de estudar durante o feriado e fazer os resumos de biologia, que eles seguiria. Estes ficaram incompletos, pois o tutor deixou para que ele fizesse depois da aula. &nbsp;Quis fazer sem o resumo mas viu que não conseguiria. Ficou nervoso quando viu que não tinha informações suficientes para responder todas as questões. Propus que ele fizesse por conta própria com o material disponível, apontando sua falta de responsabilidade e suas consequências. Assumiu sem questionamentos.&nbsp;', '2016-06-01 10:12:45', '2016-06-01 10:12:45'),
(54, 9, '2016-06-02', '<p style="color: rgba(0, 0, 0, 0.870588);">Aula depois da semana de provas. Devido ao fraco envolvimento durante a semana de provas, resolemos revogar o dia de folga que ele teria (Olhar dia anterior.). Expressamos isso diretamente, ainda na escola e ele aceitou, com a típica apatia e algumas expressões de arrependimento. Quando cheguei, João estava com o material de biologia já separado e o resumo que havia feito para a prova, achando que iriamos trabalhar isso. Descartei na hora e disse que iriamos trabalhar de tema liver. ele teria que me dizer o que havia aprendido nesses 3 anos de biologia &nbsp;iriamos fazer uma redação retrospectiva.</p><p style="color: rgba(0, 0, 0, 0.870588);">Começamos escrevendo uma redação de apresentação, cujo o desenvolvimento ele teve bastante dificuldade para construir, principalmente em termos de metalinguagem. "nesses 3 anos eu....". Demorou para entender que era pra construir esse tipo de narrativa. Em certo momento, me pediu para elencar tudo o que ee lembrava, em topicos. Aceitei, mas disse que ele teria que escolher um topico como o preferido e desenvolver. &nbsp;&nbsp;</p><p style="color: rgba(0, 0, 0, 0.870588);">De memória, veio com &nbsp;o básico da biologia, mas só avançou comigo apresentando "iscas" para que a memória se apresentasse: "e de que são compostos os organismos?", "aonde fica o DNA e RNA", "Os lípídeos são importante para que estrutura da membrana?".&nbsp;</p><p style="color: rgba(0, 0, 0, 0.870588);">Mesmo assim, aconteceu muita inversão de hierarquia e algumas confusões de conceituação por pensamento circular (ex: Os vegetais são organismos compostos por células vegetais, enquanto os animais são compostos por células animais"</p><p style="color: rgba(0, 0, 0, 0.870588);">Diante das dificuldades, sempre perguntava: Será que eu nao aprendi nada nesses 3 anos? É algo que eu tenho que me perguntar.&nbsp;</p><p style="color: rgba(0, 0, 0, 0.870588);">Mais uma vez teve receio em responder, mesmo a resposta passando por sua cabeça: "acredita que eu pensei nisso, mas nao falei?". Tenho adotado a postura de ignorar e apontar que isso é a mesma coisa que nada....&nbsp;<br>Ao final, ficou combinado que ele faria mais tópicos que lembrasse e escolheria um para aprofundar. Me entregaria na sexta feira.&nbsp;</p>', '2016-06-01 23:23:38', '2016-06-01 23:23:38'),
(55, 9, '2016-05-31', '<p style="color: rgba(0, 0, 0, 0.870588);">Estudando para Biologia. Ele havia prometido fazer o resumo, já que havíamos combinado que não faríamos mais resumo em aula, pois ele não consegue focar ou se postar ativamento no estudo. &nbsp;Chamei sua atenção e ele mesmo deu a solução: a gente pode estudar e depois eu escrevo. Escolhi as duas que eram mais diretas e disse que ele teria que faze-las sozinho</p><p style="color: rgba(0, 0, 0, 0.870588);">Soube que no dia seguinte, ele só fez uma e, mesmo &nbsp;assim, incompleta. Levou a fotografia da outra, que nao foi usada durante a prova.&nbsp;</p>', '2016-06-01 23:40:09', '2016-06-01 23:40:09'),
(56, 9, '2016-06-06', '<p style="text-align: justify; ">João Ficou de me entregar dois trabalhos extras, que eu havia deixado para o final de semana: Uma redação com uma listagem aberta sobre o que ele havia aprendido e selecionar seu maior interesse em biologia e um exercício para construção de prismas, identificação de arestas e outros elementos. &nbsp;Mesmo não tendo entregado no dia em que deveria, dessa vez estava pronto. A redação foi feita com alguns erros conceituais (assexuado = produção de próprio alimento). Me confessou não ter entendido muito o de matemática e ter pedido ajuda pra mediadora. Expliquei que era importante que eu pudesse ver seu erro, para entender melhor como ele estava no conteúdo.&nbsp;</p><p style="text-align: justify; ">Falou bastante empolgado sobre o fim de semana: Encontrou Karina, ex mediadora e foi à casa dos pais da namorada do irmão. Quanto à ex mediadora, frisou que era importante não se deixar mimar.&nbsp;</p><br><p><p style="text-align: justify;"><span style="color: inherit; font-family: Roboto, sans-serif; line-height: 1.5;">Teve razoável dificuldade com a disciplina, mas nada que não tenha se resolvido com algumas explicações para retomar algumas operações: apesar disso, trocou diversos conceitos, principalmente relacionados à estrutura atômica.</span></p><br><p style="text-align: justify;"><span style="color: inherit; font-family: Roboto, sans-serif; line-height: 1.5;">&nbsp;Ao final, fez questão de me dizer que pelo menos não tinha jogado videogame o tempo todo e que estava estudando mais. Eu falei serio com ele, que ele deveria se dar conta que já tava na hora de impor regras a esse videogame, como toda pessoa de sua idade e que ele deveria pegar o controle e entregar pra sua mãe, só pegando para jogar no final de semana. Prestou atenção seriamente, como se tivesse concordando, mas sem nenhuma confirmação objetiva.</span></p><span style="color: inherit; font-family: Roboto, sans-serif; line-height: 1.5;">&nbsp;</span></p>', '2016-06-06 23:15:03', '2016-06-06 23:15:03'),
(57, 9, '2016-06-08', '<p>Cheguei um pouco atrasado e João estava fazendo um trabalho de filosofia.&nbsp;</p><p>Tomou um susto quando entrei no quarto e disse que gostaria de poder adiantar mais o trabalho: Respondi que ele deveria ter feito antes, ao invés de jogar videogame. ele disse que "Não joguei.... Quer dizer, só um pouquinho quando cheguei". Disse que eu tinha certeza de que ele havia jogado e estava tentando esconder isso de mim. se ele queria fazer o dever não deveria ter jogado. Ficou um pouco nervoso diante do assunto, tentando me convencer de que realmente não deu tempo. Não cedi e disse que todos tínhamos nossas obrigações: "Pra você, nada interessa né?"</p><br><p>Foi muito bem no exercício sobre formação das palavras. Conseguiu anotar e modificar os tipos de formação atras da ficha. Teve boa identificação dos radicais das palavras, bem como sufixos e prefixo. Em determinado momento fui ao banheiro e ele fez questões sozinho. Quando voltei, nem me mostrou o que havia feito, na certeza de estar certo: "Ah, não precisa"&nbsp;</p><br><p>Ao final, perguntei a ele o que havia falado na aula anterior. Depois de algumas desconversas respondeu: "deixar o controle com a minha mãe, né?", mas não se mostrou muito propenso a isso.....</p><br><p>bs: em um momento em que falei pra ele prestar muuuita atenção, ele respondeu: se eu não prestar vou cair em lava, por acaso? Olhei para ele e o deixei desconfortável, "e por acaso estamos em um videogame, joão? Isso é muito mas importante!"</p>', '2016-06-08 22:28:58', '2016-06-08 22:28:58'),
(58, 9, '2016-06-04', '', '2016-06-09 16:50:22', '2016-06-09 16:50:22'),
(59, 9, '2016-06-13', '<p style="color: rgba(0, 0, 0, 0.870588);">Havia combinado que ele separaria todas as fichas de física desde o primeiro ano, para que fizéssemos uma retrospectiva, já que ele não teria dever hoje, pois foi descanso pela UERJ do Final de Semana. Ele avia separado o material e me enviado mensagem desde sábado. Antes d começar a discutir tivemos que fazer uma questão de física.&nbsp;</p><p style="color: rgba(0, 0, 0, 0.870588);">João não se mostrou muito incomodado com o fato de nao ter feito UERJ, apesar de dar umas travadas quando fala disso (Não... não fiz). Além disso, na sua pasta tinham uns panfletos sobre curso em design de informatica, perguntei o que era e ele disse que "é o que eu vou fazer ano que vem... quer dizer, ta na hora de eu tomar alguma decisão!"</p><br><p style="color: rgba(0, 0, 0, 0.870588);">A aula correu bem, ele estava atento e bem disposto, talvez por não ter ido à escola no dia. Em determinado momento eu perguntei se havia jogado videogame e ele respondeu: "Também Não foi bem assim"</p><p style="color: rgba(0, 0, 0, 0.870588);">Ao final, perguntei se ele havia pensado no que eu havia falado(deixar o controle do videogame com a mão, aos finais de semana e ele disse que ainda não muito....</p>', '2016-06-13 22:13:33', '2016-06-13 22:13:33');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lesson_entries`
--

DROP TABLE IF EXISTS `lesson_entries`;
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
) ENGINE=InnoDB AUTO_INCREMENT=459 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lesson_entries`
--

INSERT INTO `lesson_entries` (`id`, `user_id`, `lesson_id`, `input_id`, `model`, `model_id`, `value`, `created`, `modified`) VALUES
(92, 9, 7, 35, 'Protectors', 17, 'foi foda!', '2015-12-15 17:30:39', '2015-12-15 17:30:39'),
(93, 9, 7, 36, 'Protectors', 17, '5', '2015-12-15 17:30:39', '2015-12-15 17:30:39'),
(94, 9, 7, 37, 'Protectors', 17, 'Muito', '2015-12-16 10:55:43', '2015-12-16 10:55:43'),
(95, 9, 8, 35, 'Protectors', 17, 'teste123', '2015-12-16 11:22:17', '2015-12-17 09:14:30'),
(96, 9, 8, 37, 'Protectors', 17, 'Péssimo', '2015-12-16 11:22:17', '2015-12-17 09:13:33'),
(97, 9, 8, 35, 'Protectors', 16, '5', '2015-12-17 11:00:42', '2015-12-17 11:00:42'),
(98, 9, 8, 37, 'Protectors', 16, 'Sim', '2015-12-17 11:00:42', '2015-12-17 11:00:42'),
(99, 9, 11, 41, 'Therapists', 4, 'bla bla', '2016-01-16 16:21:33', '2016-01-16 16:21:57'),
(100, 9, 11, 42, 'Therapists', 4, '10', '2016-01-16 16:21:33', '2016-01-16 16:21:33'),
(101, 9, 11, 40, 'Therapists', 4, '2', '2016-01-16 16:21:33', '2016-01-16 16:21:33'),
(102, 9, 11, 39, 'Therapists', 4, '', '2016-01-16 16:21:33', '2016-01-16 16:21:33'),
(103, 9, 11, 43, 'Therapists', 4, 'contente', '2016-01-16 16:21:33', '2016-01-16 16:21:33'),
(104, 9, 11, 44, 'Therapists', 4, '27', '2016-01-16 16:21:33', '2016-01-16 16:21:33'),
(105, 9, 11, 45, 'Therapists', 4, 'bla', '2016-01-16 16:21:33', '2016-01-16 16:21:33'),
(106, 9, 12, 42, 'Tutors', 1, '3', '2016-01-21 11:37:13', '2016-01-21 11:37:13'),
(107, 9, 12, 40, 'Tutors', 1, '2', '2016-01-21 11:37:13', '2016-01-21 11:37:13'),
(108, 9, 12, 43, 'Tutors', 1, '?', '2016-01-21 11:37:13', '2016-01-21 11:37:13'),
(109, 9, 12, 44, 'Tutors', 1, '', '2016-01-21 11:37:13', '2016-01-21 11:37:13'),
(110, 9, 12, 47, 'Tutors', 1, '10', '2016-01-21 11:37:13', '2016-01-21 11:37:13'),
(111, 9, 12, 46, 'Tutors', 1, '10', '2016-01-21 11:37:13', '2016-01-21 11:37:13'),
(112, 9, 12, 45, 'Tutors', 1, '', '2016-01-21 11:37:13', '2016-01-21 11:37:13'),
(113, 9, 12, 48, 'Tutors', 1, '', '2016-01-21 11:37:13', '2016-01-21 11:37:13'),
(114, 9, 12, 49, 'Tutors', 1, '', '2016-01-21 11:37:13', '2016-01-21 11:37:13'),
(115, 9, 13, 42, 'Tutors', 1, '3', '2016-01-21 11:43:42', '2016-01-21 11:43:42'),
(116, 9, 13, 40, 'Tutors', 1, '2', '2016-01-21 11:43:42', '2016-01-21 11:44:16'),
(117, 9, 13, 44, 'Tutors', 1, '', '2016-01-21 11:43:42', '2016-01-21 11:43:42'),
(118, 9, 13, 47, 'Tutors', 1, '10', '2016-01-21 11:43:42', '2016-01-21 11:43:42'),
(119, 9, 13, 46, 'Tutors', 1, '10', '2016-01-21 11:43:42', '2016-01-21 11:43:42'),
(120, 9, 13, 45, 'Tutors', 1, '', '2016-01-21 11:43:42', '2016-01-21 11:43:42'),
(121, 9, 13, 48, 'Tutors', 1, '', '2016-01-21 11:43:42', '2016-01-21 11:43:42'),
(122, 9, 13, 49, 'Tutors', 1, '', '2016-01-21 11:43:42', '2016-01-21 11:43:42'),
(123, 9, 13, 50, 'Tutors', 1, '?', '2016-01-21 11:43:42', '2016-01-21 11:43:42'),
(124, 9, 14, 42, 'Tutors', 1, '3', '2016-01-21 12:31:22', '2016-04-20 10:58:17'),
(125, 9, 14, 40, 'Tutors', 1, '2', '2016-01-21 12:31:22', '2016-01-21 12:31:22'),
(126, 9, 14, 44, 'Tutors', 1, '', '2016-01-21 12:31:22', '2016-01-21 12:31:22'),
(127, 9, 14, 47, 'Tutors', 1, '2', '2016-01-21 12:31:22', '2016-01-21 12:31:22'),
(128, 9, 14, 46, 'Tutors', 1, '2', '2016-01-21 12:31:22', '2016-01-21 12:31:22'),
(129, 9, 14, 45, 'Tutors', 1, '', '2016-01-21 12:31:22', '2016-01-21 12:31:22'),
(130, 9, 14, 48, 'Tutors', 1, '4', '2016-01-21 12:31:22', '2016-01-21 12:37:57'),
(131, 9, 14, 49, 'Tutors', 1, '', '2016-01-21 12:31:22', '2016-01-21 12:31:22'),
(132, 9, 14, 50, 'Tutors', 1, 'Irritado', '2016-01-21 12:31:22', '2016-01-21 12:31:22'),
(133, 9, 15, 42, 'Tutors', 1, '6', '2016-01-21 12:58:34', '2016-01-21 12:58:34'),
(134, 9, 15, 40, 'Tutors', 1, '2', '2016-01-21 12:58:34', '2016-01-21 12:58:34'),
(135, 9, 15, 44, 'Tutors', 1, '155', '2016-01-21 12:58:34', '2016-01-21 12:58:34'),
(136, 9, 15, 47, 'Tutors', 1, '7', '2016-01-21 12:58:34', '2016-01-21 12:58:34'),
(137, 9, 15, 46, 'Tutors', 1, '6', '2016-01-21 12:58:34', '2016-01-21 12:58:34'),
(138, 9, 15, 45, 'Tutors', 1, '', '2016-01-21 12:58:34', '2016-01-21 12:58:34'),
(139, 9, 15, 48, 'Tutors', 1, '7', '2016-01-21 12:58:34', '2016-01-21 13:01:39'),
(140, 9, 15, 49, 'Tutors', 1, '', '2016-01-21 12:58:34', '2016-01-21 12:58:34'),
(141, 9, 15, 50, 'Tutors', 1, 'Bem humorado', '2016-01-21 12:58:34', '2016-01-21 12:58:34'),
(142, 9, 16, 42, 'Tutors', 1, '6', '2016-01-21 13:24:23', '2016-01-21 13:24:23'),
(143, 9, 16, 40, 'Tutors', 1, '2', '2016-01-21 13:24:23', '2016-01-21 13:24:23'),
(144, 9, 16, 44, 'Tutors', 1, '22', '2016-01-21 13:24:23', '2016-01-21 13:24:23'),
(145, 9, 16, 47, 'Tutors', 1, '6', '2016-01-21 13:24:23', '2016-01-21 13:24:23'),
(146, 9, 16, 46, 'Tutors', 1, '7', '2016-01-21 13:24:23', '2016-01-21 13:24:23'),
(147, 9, 16, 45, 'Tutors', 1, '', '2016-01-21 13:24:23', '2016-01-21 13:24:23'),
(148, 9, 16, 48, 'Tutors', 1, '5', '2016-01-21 13:24:23', '2016-01-21 13:24:23'),
(149, 9, 16, 49, 'Tutors', 1, '', '2016-01-21 13:24:23', '2016-01-21 13:24:23'),
(150, 9, 16, 50, 'Tutors', 1, 'Empolgado', '2016-01-21 13:24:23', '2016-01-21 13:24:23'),
(151, 9, 17, 42, 'Tutors', 1, '4', '2016-01-21 13:43:42', '2016-01-21 13:43:42'),
(152, 9, 17, 40, 'Tutors', 1, '2', '2016-01-21 13:43:42', '2016-01-21 13:43:42'),
(153, 9, 17, 44, 'Tutors', 1, '50', '2016-01-21 13:43:42', '2016-01-21 13:43:42'),
(154, 9, 17, 47, 'Tutors', 1, '3', '2016-01-21 13:43:42', '2016-01-21 13:43:42'),
(155, 9, 17, 46, 'Tutors', 1, '4', '2016-01-21 13:43:42', '2016-01-21 13:43:42'),
(156, 9, 17, 45, 'Tutors', 1, '', '2016-01-21 13:43:42', '2016-01-21 13:43:42'),
(157, 9, 17, 48, 'Tutors', 1, '10', '2016-01-21 13:43:42', '2016-01-21 13:43:42'),
(158, 9, 17, 49, 'Tutors', 1, '4', '2016-01-21 13:43:42', '2016-01-21 13:43:42'),
(159, 9, 17, 50, 'Tutors', 1, 'Mal humorado', '2016-01-21 13:43:42', '2016-01-21 13:43:42'),
(160, 9, 18, 42, 'Tutors', 1, '4', '2016-01-21 13:56:57', '2016-01-21 13:56:57'),
(161, 9, 18, 40, 'Tutors', 1, '', '2016-01-21 13:56:57', '2016-01-21 13:56:57'),
(162, 9, 18, 44, 'Tutors', 1, '', '2016-01-21 13:56:57', '2016-01-21 13:56:57'),
(163, 9, 18, 47, 'Tutors', 1, '3', '2016-01-21 13:56:57', '2016-01-21 13:56:57'),
(164, 9, 18, 46, 'Tutors', 1, '4', '2016-01-21 13:56:57', '2016-01-21 13:56:57'),
(165, 9, 18, 45, 'Tutors', 1, 'Hiperfoco o faz perder o contexto geral, necessitando de uma reassociação de idéias, resgatando o contexto o tempo todo?', '2016-01-21 13:56:57', '2016-01-21 13:56:57'),
(166, 9, 18, 48, 'Tutors', 1, '', '2016-01-21 13:56:57', '2016-01-21 13:56:57'),
(167, 9, 18, 49, 'Tutors', 1, '', '2016-01-21 13:56:57', '2016-01-21 13:56:57'),
(168, 9, 18, 50, 'Tutors', 1, 'Normal', '2016-01-21 13:56:57', '2016-01-21 13:56:57'),
(169, 9, 19, 42, 'Tutors', 1, '5', '2016-01-21 14:22:28', '2016-01-21 14:22:28'),
(170, 9, 19, 40, 'Tutors', 1, '2', '2016-01-21 14:22:28', '2016-01-21 14:22:28'),
(171, 9, 19, 44, 'Tutors', 1, '53', '2016-01-21 14:22:28', '2016-01-21 14:22:28'),
(172, 9, 19, 47, 'Tutors', 1, '6', '2016-01-21 14:22:28', '2016-01-21 14:22:28'),
(173, 9, 19, 46, 'Tutors', 1, '4', '2016-01-21 14:22:28', '2016-01-21 14:22:28'),
(174, 9, 19, 45, 'Tutors', 1, '', '2016-01-21 14:22:28', '2016-01-21 14:22:28'),
(175, 9, 19, 48, 'Tutors', 1, '', '2016-01-21 14:22:28', '2016-01-21 14:22:28'),
(176, 9, 19, 49, 'Tutors', 1, '', '2016-01-21 14:22:28', '2016-01-21 14:22:28'),
(177, 9, 19, 50, 'Tutors', 1, 'Normal', '2016-01-21 14:22:28', '2016-01-21 14:22:28'),
(178, 9, 20, 42, 'Tutors', 1, '7', '2016-01-21 14:35:52', '2016-01-21 14:35:52'),
(179, 9, 20, 40, 'Tutors', 1, '2', '2016-01-21 14:35:52', '2016-01-21 14:35:52'),
(180, 9, 20, 44, 'Tutors', 1, '7', '2016-01-21 14:35:52', '2016-01-21 14:35:52'),
(181, 9, 20, 47, 'Tutors', 1, '5', '2016-01-21 14:35:52', '2016-01-21 14:35:52'),
(182, 9, 20, 46, 'Tutors', 1, '6', '2016-01-21 14:35:52', '2016-01-21 14:35:52'),
(183, 9, 20, 45, 'Tutors', 1, '', '2016-01-21 14:35:52', '2016-01-21 14:35:52'),
(184, 9, 20, 48, 'Tutors', 1, '7', '2016-01-21 14:35:52', '2016-01-21 14:35:52'),
(185, 9, 20, 49, 'Tutors', 1, '2', '2016-01-21 14:35:52', '2016-01-21 14:35:52'),
(186, 9, 20, 50, 'Tutors', 1, 'Bem humorado', '2016-01-21 14:35:52', '2016-01-21 14:35:52'),
(187, 9, 21, 42, 'Tutors', 1, '5', '2016-01-21 15:02:18', '2016-01-21 15:02:18'),
(188, 9, 21, 40, 'Tutors', 1, '2', '2016-01-21 15:02:18', '2016-01-21 15:02:18'),
(189, 9, 21, 44, 'Tutors', 1, '', '2016-01-21 15:02:18', '2016-01-21 15:02:18'),
(190, 9, 21, 47, 'Tutors', 1, '5', '2016-01-21 15:02:18', '2016-01-21 15:02:18'),
(191, 9, 21, 46, 'Tutors', 1, '6', '2016-01-21 15:02:18', '2016-01-21 15:02:18'),
(192, 9, 21, 45, 'Tutors', 1, '', '2016-01-21 15:02:18', '2016-01-21 15:02:18'),
(193, 9, 21, 48, 'Tutors', 1, '4', '2016-01-21 15:02:18', '2016-01-21 15:02:18'),
(194, 9, 21, 49, 'Tutors', 1, '4', '2016-01-21 15:02:18', '2016-01-21 15:02:18'),
(195, 9, 21, 50, 'Tutors', 1, 'Normal', '2016-01-21 15:02:18', '2016-01-21 15:02:18'),
(196, 9, 22, 42, 'Tutors', 1, '4', '2016-01-21 15:18:00', '2016-01-21 15:18:00'),
(197, 9, 22, 40, 'Tutors', 1, '2', '2016-01-21 15:18:00', '2016-01-21 15:18:00'),
(198, 9, 22, 44, 'Tutors', 1, '', '2016-01-21 15:18:00', '2016-01-21 15:18:00'),
(199, 9, 22, 47, 'Tutors', 1, '4', '2016-01-21 15:18:00', '2016-01-21 15:18:00'),
(200, 9, 22, 46, 'Tutors', 1, '4', '2016-01-21 15:18:00', '2016-01-21 15:18:00'),
(201, 9, 22, 45, 'Tutors', 1, '', '2016-01-21 15:18:00', '2016-01-21 15:18:00'),
(202, 9, 22, 48, 'Tutors', 1, '7', '2016-01-21 15:18:00', '2016-01-21 15:18:00'),
(203, 9, 22, 49, 'Tutors', 1, '3', '2016-01-21 15:18:00', '2016-01-21 15:18:00'),
(204, 9, 22, 50, 'Tutors', 1, 'Normal', '2016-01-21 15:18:00', '2016-01-21 15:18:00'),
(205, 9, 23, 42, 'Tutors', 1, '6', '2016-01-21 15:40:54', '2016-01-21 15:40:54'),
(206, 9, 23, 40, 'Tutors', 1, '2', '2016-01-21 15:40:54', '2016-01-21 15:40:54'),
(207, 9, 23, 44, 'Tutors', 1, '20', '2016-01-21 15:40:54', '2016-01-21 15:40:54'),
(208, 9, 23, 47, 'Tutors', 1, '6', '2016-01-21 15:40:54', '2016-01-21 15:40:54'),
(209, 9, 23, 46, 'Tutors', 1, '5', '2016-01-21 15:40:54', '2016-01-21 15:40:54'),
(210, 9, 23, 45, 'Tutors', 1, '', '2016-01-21 15:40:54', '2016-01-21 15:40:54'),
(211, 9, 23, 48, 'Tutors', 1, '', '2016-01-21 15:40:54', '2016-01-21 15:40:54'),
(212, 9, 23, 49, 'Tutors', 1, '', '2016-01-21 15:40:54', '2016-01-21 15:40:54'),
(213, 9, 23, 50, 'Tutors', 1, 'Normal', '2016-01-21 15:40:54', '2016-01-21 15:40:54'),
(214, 9, 24, 42, 'Tutors', 1, '6', '2016-01-21 15:50:58', '2016-01-21 15:50:58'),
(215, 9, 24, 40, 'Tutors', 1, '2', '2016-01-21 15:50:58', '2016-01-21 15:50:58'),
(216, 9, 24, 44, 'Tutors', 1, '', '2016-01-21 15:50:58', '2016-01-21 15:50:58'),
(217, 9, 24, 47, 'Tutors', 1, '5', '2016-01-21 15:50:58', '2016-01-21 15:50:58'),
(218, 9, 24, 46, 'Tutors', 1, '5', '2016-01-21 15:50:58', '2016-01-21 15:50:58'),
(219, 9, 24, 45, 'Tutors', 1, '', '2016-01-21 15:50:58', '2016-01-21 15:50:58'),
(220, 9, 24, 48, 'Tutors', 1, '', '2016-01-21 15:50:58', '2016-01-21 15:50:58'),
(221, 9, 24, 49, 'Tutors', 1, '', '2016-01-21 15:50:58', '2016-01-21 15:50:58'),
(222, 9, 24, 50, 'Tutors', 1, 'Normal', '2016-01-21 15:50:58', '2016-01-21 15:50:58'),
(223, 9, 25, 42, 'Tutors', 1, '7', '2016-01-21 16:19:40', '2016-01-21 16:19:40'),
(224, 9, 25, 40, 'Tutors', 1, '2', '2016-01-21 16:19:40', '2016-01-21 16:19:40'),
(225, 9, 25, 44, 'Tutors', 1, '5', '2016-01-21 16:19:40', '2016-01-21 16:19:40'),
(226, 9, 25, 47, 'Tutors', 1, '6', '2016-01-21 16:19:40', '2016-01-21 16:19:40'),
(227, 9, 25, 46, 'Tutors', 1, '7', '2016-01-21 16:19:40', '2016-01-21 16:19:40'),
(228, 9, 25, 45, 'Tutors', 1, '', '2016-01-21 16:19:40', '2016-01-21 16:19:40'),
(229, 9, 25, 48, 'Tutors', 1, '', '2016-01-21 16:19:40', '2016-01-21 16:19:40'),
(230, 9, 25, 49, 'Tutors', 1, '', '2016-01-21 16:19:40', '2016-01-21 16:19:40'),
(231, 9, 25, 50, 'Tutors', 1, 'Bem humorado', '2016-01-21 16:19:40', '2016-01-21 16:19:40'),
(232, 9, 26, 42, 'Tutors', 1, '9', '2016-01-21 16:26:48', '2016-01-21 16:26:48'),
(233, 9, 26, 40, 'Tutors', 1, '2', '2016-01-21 16:26:48', '2016-01-21 16:26:48'),
(234, 9, 26, 44, 'Tutors', 1, '', '2016-01-21 16:26:48', '2016-01-21 16:26:48'),
(235, 9, 26, 47, 'Tutors', 1, '7', '2016-01-21 16:26:48', '2016-01-21 16:26:48'),
(236, 9, 26, 46, 'Tutors', 1, '8', '2016-01-21 16:26:48', '2016-01-21 16:26:48'),
(237, 9, 26, 45, 'Tutors', 1, '', '2016-01-21 16:26:48', '2016-01-21 16:26:48'),
(238, 9, 26, 48, 'Tutors', 1, '', '2016-01-21 16:26:48', '2016-01-21 16:26:48'),
(239, 9, 26, 49, 'Tutors', 1, '', '2016-01-21 16:26:48', '2016-01-21 16:26:48'),
(240, 9, 26, 50, 'Tutors', 1, 'Empolgado', '2016-01-21 16:26:48', '2016-01-21 16:26:48'),
(241, 9, 27, 42, 'Tutors', 1, '0', '2016-01-21 16:39:52', '2016-01-21 16:39:52'),
(242, 9, 27, 40, 'Tutors', 1, '2', '2016-01-21 16:39:52', '2016-01-21 16:39:52'),
(243, 9, 27, 44, 'Tutors', 1, '', '2016-01-21 16:39:52', '2016-01-21 16:39:52'),
(244, 9, 27, 47, 'Tutors', 1, '0', '2016-01-21 16:39:52', '2016-01-21 16:39:52'),
(245, 9, 27, 46, 'Tutors', 1, '0', '2016-01-21 16:39:52', '2016-01-21 16:39:52'),
(246, 9, 27, 45, 'Tutors', 1, '', '2016-01-21 16:39:52', '2016-01-21 16:39:52'),
(247, 9, 27, 48, 'Tutors', 1, '', '2016-01-21 16:39:52', '2016-01-21 16:39:52'),
(248, 9, 27, 49, 'Tutors', 1, '0', '2016-01-21 16:39:52', '2016-01-21 16:39:52'),
(249, 9, 27, 50, 'Tutors', 1, 'Irritado', '2016-01-21 16:39:52', '2016-01-21 16:39:52'),
(250, 9, 28, 42, 'Tutors', 1, '7', '2016-01-21 16:52:47', '2016-01-21 16:52:47'),
(251, 9, 28, 40, 'Tutors', 1, '2', '2016-01-21 16:52:47', '2016-01-21 16:52:47'),
(252, 9, 28, 44, 'Tutors', 1, '', '2016-01-21 16:52:47', '2016-01-21 16:52:47'),
(253, 9, 28, 47, 'Tutors', 1, '6', '2016-01-21 16:52:47', '2016-01-21 16:52:47'),
(254, 9, 28, 46, 'Tutors', 1, '7', '2016-01-21 16:52:47', '2016-01-21 16:52:47'),
(255, 9, 28, 45, 'Tutors', 1, '', '2016-01-21 16:52:47', '2016-01-21 16:52:47'),
(256, 9, 28, 48, 'Tutors', 1, '', '2016-01-21 16:52:47', '2016-01-21 16:52:47'),
(257, 9, 28, 49, 'Tutors', 1, '', '2016-01-21 16:52:47', '2016-01-21 16:52:47'),
(258, 9, 28, 50, 'Tutors', 1, 'Normal', '2016-01-21 16:52:47', '2016-01-21 16:52:47'),
(259, 9, 29, 42, 'Tutors', 1, '7', '2016-01-21 21:10:21', '2016-01-21 21:10:21'),
(260, 9, 29, 40, 'Tutors', 1, '', '2016-01-21 21:10:21', '2016-01-21 21:10:21'),
(261, 9, 29, 44, 'Tutors', 1, '', '2016-01-21 21:10:21', '2016-01-21 21:10:21'),
(262, 9, 29, 47, 'Tutors', 1, '6', '2016-01-21 21:10:21', '2016-01-21 21:10:21'),
(263, 9, 29, 46, 'Tutors', 1, '6', '2016-01-21 21:10:21', '2016-01-21 21:10:21'),
(264, 9, 29, 45, 'Tutors', 1, '', '2016-01-21 21:10:21', '2016-01-21 21:10:21'),
(265, 9, 29, 48, 'Tutors', 1, '', '2016-01-21 21:10:21', '2016-01-21 21:10:21'),
(266, 9, 29, 49, 'Tutors', 1, '', '2016-01-21 21:10:21', '2016-01-21 21:10:21'),
(267, 9, 29, 50, 'Tutors', 1, 'Normal', '2016-01-21 21:10:21', '2016-01-21 21:10:21'),
(268, 9, 30, 42, 'Tutors', 1, '5', '2016-01-21 21:31:32', '2016-01-21 21:31:32'),
(269, 9, 30, 40, 'Tutors', 1, '', '2016-01-21 21:31:32', '2016-01-21 21:31:32'),
(270, 9, 30, 44, 'Tutors', 1, '', '2016-01-21 21:31:32', '2016-01-21 21:31:32'),
(271, 9, 30, 47, 'Tutors', 1, '4', '2016-01-21 21:31:32', '2016-01-21 21:31:32'),
(272, 9, 30, 46, 'Tutors', 1, '5', '2016-01-21 21:31:32', '2016-01-21 21:31:32'),
(273, 9, 30, 45, 'Tutors', 1, '', '2016-01-21 21:31:32', '2016-01-21 21:31:32'),
(274, 9, 30, 48, 'Tutors', 1, '', '2016-01-21 21:31:32', '2016-01-21 21:31:32'),
(275, 9, 30, 49, 'Tutors', 1, '', '2016-01-21 21:31:32', '2016-01-21 21:31:32'),
(276, 9, 30, 50, 'Tutors', 1, '?', '2016-01-21 21:31:32', '2016-01-21 21:31:32'),
(277, 9, 31, 42, 'Tutors', 1, '6', '2016-01-21 22:23:04', '2016-01-21 22:23:04'),
(278, 9, 31, 40, 'Tutors', 1, '2', '2016-01-21 22:23:04', '2016-01-21 22:23:04'),
(279, 9, 31, 44, 'Tutors', 1, '', '2016-01-21 22:23:04', '2016-01-21 22:23:04'),
(280, 9, 31, 47, 'Tutors', 1, '5', '2016-01-21 22:23:04', '2016-01-21 22:23:04'),
(281, 9, 31, 46, 'Tutors', 1, '6', '2016-01-21 22:23:04', '2016-01-21 22:23:04'),
(282, 9, 31, 45, 'Tutors', 1, '', '2016-01-21 22:23:04', '2016-01-21 22:23:04'),
(283, 9, 31, 48, 'Tutors', 1, '', '2016-01-21 22:23:04', '2016-01-21 22:23:04'),
(284, 9, 31, 49, 'Tutors', 1, '', '2016-01-21 22:23:04', '2016-01-21 22:23:04'),
(285, 9, 31, 50, 'Tutors', 1, 'Normal', '2016-01-21 22:23:04', '2016-01-21 22:23:04'),
(286, 9, 32, 42, 'Tutors', 1, '5', '2016-01-21 22:50:18', '2016-01-21 22:50:18'),
(287, 9, 32, 40, 'Tutors', 1, '2', '2016-01-21 22:50:18', '2016-01-21 22:50:18'),
(288, 9, 32, 44, 'Tutors', 1, '10', '2016-01-21 22:50:18', '2016-01-21 22:50:18'),
(289, 9, 32, 47, 'Tutors', 1, '6', '2016-01-21 22:50:18', '2016-01-21 22:50:18'),
(290, 9, 32, 46, 'Tutors', 1, '8', '2016-01-21 22:50:18', '2016-01-21 22:50:18'),
(291, 9, 32, 45, 'Tutors', 1, '', '2016-01-21 22:50:18', '2016-01-21 22:50:18'),
(292, 9, 32, 48, 'Tutors', 1, '8', '2016-01-21 22:50:18', '2016-01-21 22:54:17'),
(293, 9, 32, 49, 'Tutors', 1, '7', '2016-01-21 22:50:19', '2016-01-21 22:54:17'),
(294, 9, 32, 50, 'Tutors', 1, 'Bem humorado', '2016-01-21 22:50:19', '2016-01-21 22:50:19'),
(296, 9, 33, 42, 'Tutors', 1, '6', '2016-05-02 22:42:06', '2016-05-02 22:56:14'),
(297, 9, 33, 40, 'Tutors', 1, '2', '2016-05-02 22:42:06', '2016-05-02 22:56:14'),
(298, 9, 33, 44, 'Tutors', 1, '', '2016-05-02 22:42:06', '2016-05-02 22:56:14'),
(299, 9, 33, 47, 'Tutors', 1, '6', '2016-05-02 22:42:06', '2016-05-02 22:56:14'),
(300, 9, 33, 46, 'Tutors', 1, '7', '2016-05-02 22:42:06', '2016-05-02 22:56:14'),
(301, 9, 33, 45, 'Tutors', 1, '', '2016-05-02 22:42:06', '2016-05-02 22:56:14'),
(302, 9, 33, 48, 'Tutors', 1, '13', '2016-05-02 22:42:06', '2016-05-02 22:56:14'),
(303, 9, 33, 49, 'Tutors', 1, '5', '2016-05-02 22:42:06', '2016-05-02 22:56:14'),
(304, 9, 33, 50, 'Tutors', 1, 'Empolgado', '2016-05-02 22:42:06', '2016-05-02 22:56:14'),
(305, 9, 38, 42, 'Tutors', 1, '6', '2016-05-02 23:23:14', '2016-05-02 23:23:14'),
(306, 9, 38, 40, 'Tutors', 1, '', '2016-05-02 23:23:14', '2016-05-02 23:23:14'),
(307, 9, 38, 44, 'Tutors', 1, '5', '2016-05-02 23:23:14', '2016-05-02 23:23:14'),
(308, 9, 38, 47, 'Tutors', 1, '5', '2016-05-02 23:23:14', '2016-05-02 23:23:14'),
(309, 9, 38, 46, 'Tutors', 1, '5', '2016-05-02 23:23:14', '2016-05-02 23:23:14'),
(310, 9, 38, 45, 'Tutors', 1, '', '2016-05-02 23:23:14', '2016-05-02 23:23:14'),
(311, 9, 38, 48, 'Tutors', 1, '10', '2016-05-02 23:23:14', '2016-05-02 23:23:14'),
(312, 9, 38, 49, 'Tutors', 1, '7', '2016-05-02 23:23:14', '2016-05-02 23:23:14'),
(313, 9, 38, 50, 'Tutors', 1, 'Irritado', '2016-05-02 23:23:14', '2016-05-02 23:23:14'),
(314, 9, 39, 42, 'Tutors', 1, '5', '2016-05-02 23:38:22', '2016-05-04 12:35:17'),
(315, 9, 39, 40, 'Tutors', 1, '2', '2016-05-02 23:38:22', '2016-05-04 12:35:17'),
(316, 9, 39, 44, 'Tutors', 1, '', '2016-05-02 23:38:22', '2016-05-04 12:35:17'),
(317, 9, 39, 47, 'Tutors', 1, '4', '2016-05-02 23:38:22', '2016-05-04 12:35:17'),
(318, 9, 39, 46, 'Tutors', 1, '2', '2016-05-02 23:38:22', '2016-05-04 12:35:17'),
(319, 9, 39, 45, 'Tutors', 1, '', '2016-05-02 23:38:22', '2016-05-04 12:35:17'),
(320, 9, 39, 48, 'Tutors', 1, '4', '2016-05-02 23:38:22', '2016-05-04 12:35:17'),
(321, 9, 39, 49, 'Tutors', 1, '2', '2016-05-02 23:38:22', '2016-05-04 12:35:17'),
(322, 9, 39, 50, 'Tutors', 1, 'Irritado', '2016-05-02 23:38:22', '2016-05-04 12:35:17'),
(323, 9, 40, 42, 'Tutors', 1, '5', '2016-05-02 23:49:10', '2016-05-02 23:49:10'),
(324, 9, 40, 40, 'Tutors', 1, '2', '2016-05-02 23:49:10', '2016-05-02 23:49:10'),
(325, 9, 40, 44, 'Tutors', 1, '', '2016-05-02 23:49:10', '2016-05-02 23:49:10'),
(326, 9, 40, 47, 'Tutors', 1, '4', '2016-05-02 23:49:10', '2016-05-02 23:49:10'),
(327, 9, 40, 46, 'Tutors', 1, '4', '2016-05-02 23:49:10', '2016-05-02 23:49:10'),
(328, 9, 40, 45, 'Tutors', 1, '', '2016-05-02 23:49:10', '2016-05-02 23:49:10'),
(329, 9, 40, 48, 'Tutors', 1, '6', '2016-05-02 23:49:10', '2016-05-02 23:49:10'),
(330, 9, 40, 49, 'Tutors', 1, '4', '2016-05-02 23:49:10', '2016-05-02 23:49:10'),
(331, 9, 40, 50, 'Tutors', 1, 'Irritado', '2016-05-02 23:49:10', '2016-05-02 23:49:10'),
(332, 9, 41, 42, 'Tutors', 1, '7', '2016-05-02 23:57:32', '2016-05-02 23:57:32'),
(333, 9, 41, 40, 'Tutors', 1, '2', '2016-05-02 23:57:32', '2016-05-02 23:57:32'),
(334, 9, 41, 44, 'Tutors', 1, '', '2016-05-02 23:57:32', '2016-05-02 23:57:32'),
(335, 9, 41, 47, 'Tutors', 1, '6', '2016-05-02 23:57:32', '2016-05-02 23:57:32'),
(336, 9, 41, 46, 'Tutors', 1, '8', '2016-05-02 23:57:32', '2016-05-02 23:57:32'),
(337, 9, 41, 45, 'Tutors', 1, '', '2016-05-02 23:57:32', '2016-05-02 23:57:32'),
(338, 9, 41, 48, 'Tutors', 1, '3', '2016-05-02 23:57:32', '2016-05-02 23:57:32'),
(339, 9, 41, 49, 'Tutors', 1, '3', '2016-05-02 23:57:32', '2016-05-02 23:57:32'),
(340, 9, 41, 50, 'Tutors', 1, 'Bem humorado', '2016-05-02 23:57:32', '2016-05-02 23:57:32'),
(341, 9, 42, 42, 'Tutors', 1, '5', '2016-05-03 00:09:11', '2016-05-03 00:09:11'),
(342, 9, 42, 40, 'Tutors', 1, '', '2016-05-03 00:09:11', '2016-05-03 00:09:11'),
(343, 9, 42, 44, 'Tutors', 1, '', '2016-05-03 00:09:11', '2016-05-03 00:09:11'),
(344, 9, 42, 47, 'Tutors', 1, '5', '2016-05-03 00:09:11', '2016-05-03 00:09:11'),
(345, 9, 42, 46, 'Tutors', 1, '5', '2016-05-03 00:09:11', '2016-05-03 00:09:11'),
(346, 9, 42, 45, 'Tutors', 1, '', '2016-05-03 00:09:11', '2016-05-03 00:09:11'),
(347, 9, 42, 48, 'Tutors', 1, '3', '2016-05-03 00:09:11', '2016-05-03 00:09:11'),
(348, 9, 42, 49, 'Tutors', 1, '3', '2016-05-03 00:09:11', '2016-05-03 00:09:11'),
(349, 9, 42, 50, 'Tutors', 1, 'Mal humorado', '2016-05-03 00:09:11', '2016-05-03 00:09:11'),
(359, 9, 44, 42, 'Tutors', 1, '3', '2016-05-05 18:24:24', '2016-05-05 18:25:40'),
(360, 9, 44, 40, 'Tutors', 1, '2', '2016-05-05 18:24:24', '2016-05-05 18:25:40'),
(361, 9, 44, 44, 'Tutors', 1, '', '2016-05-05 18:24:24', '2016-05-05 18:25:40'),
(362, 9, 44, 47, 'Tutors', 1, '3', '2016-05-05 18:24:24', '2016-05-05 18:25:40'),
(363, 9, 44, 46, 'Tutors', 1, '3', '2016-05-05 18:24:24', '2016-05-05 18:25:40'),
(364, 9, 44, 45, 'Tutors', 1, 'Antes da aula, sua mãe me chamou para conversar sobre as provas, disse estar super preocupada... Acredito que ela tenha conversado com ele, o que reforçou sua ansiedade, já existente em relação à matemática.&nbsp;', '2016-05-05 18:24:24', '2016-05-05 18:25:40'),
(365, 9, 44, 48, 'Tutors', 1, '10', '2016-05-05 18:24:24', '2016-05-05 18:25:40'),
(366, 9, 44, 49, 'Tutors', 1, '3', '2016-05-05 18:24:24', '2016-05-05 18:25:40'),
(367, 9, 44, 50, 'Tutors', 1, '', '2016-05-05 18:24:24', '2016-05-05 18:25:40'),
(368, 9, 45, 42, 'Tutors', 1, '5', '2016-05-05 18:59:33', '2016-05-05 18:59:33'),
(369, 9, 45, 40, 'Tutors', 1, '2', '2016-05-05 18:59:33', '2016-05-05 18:59:33'),
(370, 9, 45, 44, 'Tutors', 1, '', '2016-05-05 18:59:33', '2016-05-05 18:59:33'),
(371, 9, 45, 47, 'Tutors', 1, '6', '2016-05-05 18:59:33', '2016-05-05 18:59:33'),
(372, 9, 45, 46, 'Tutors', 1, '5', '2016-05-05 18:59:33', '2016-05-05 18:59:33'),
(373, 9, 45, 45, 'Tutors', 1, '', '2016-05-05 18:59:33', '2016-05-05 18:59:33'),
(374, 9, 45, 48, 'Tutors', 1, '9', '2016-05-05 18:59:33', '2016-05-05 18:59:33'),
(375, 9, 45, 49, 'Tutors', 1, '9', '2016-05-05 18:59:33', '2016-05-05 18:59:33'),
(376, 9, 45, 50, 'Tutors', 1, 'Bem humorado', '2016-05-05 18:59:33', '2016-05-05 18:59:33'),
(377, 9, 46, 42, 'Tutors', 1, '7', '2016-05-05 19:19:13', '2016-05-05 19:19:13'),
(378, 9, 46, 40, 'Tutors', 1, '2', '2016-05-05 19:19:13', '2016-05-05 19:19:13'),
(379, 9, 46, 44, 'Tutors', 1, '', '2016-05-05 19:19:13', '2016-05-05 19:19:13'),
(380, 9, 46, 47, 'Tutors', 1, '7', '2016-05-05 19:19:13', '2016-05-05 19:19:13'),
(381, 9, 46, 46, 'Tutors', 1, '8', '2016-05-05 19:19:13', '2016-05-05 19:19:13'),
(382, 9, 46, 45, 'Tutors', 1, '', '2016-05-05 19:19:13', '2016-05-05 19:19:13'),
(383, 9, 46, 48, 'Tutors', 1, '9', '2016-05-05 19:19:13', '2016-05-05 19:19:13'),
(384, 9, 46, 49, 'Tutors', 1, '8', '2016-05-05 19:19:13', '2016-05-05 19:19:13'),
(385, 9, 46, 50, 'Tutors', 1, '', '2016-05-05 19:19:13', '2016-05-05 19:19:13'),
(386, 9, 49, 42, 'Tutors', 1, '8', '2016-05-11 13:15:48', '2016-05-11 13:15:48'),
(387, 9, 49, 40, 'Tutors', 1, '2', '2016-05-11 13:15:48', '2016-05-11 13:15:48'),
(388, 9, 49, 44, 'Tutors', 1, '1', '2016-05-11 13:15:48', '2016-05-11 13:15:48'),
(389, 9, 49, 47, 'Tutors', 1, '6', '2016-05-11 13:15:48', '2016-05-11 13:15:48'),
(390, 9, 49, 46, 'Tutors', 1, '5', '2016-05-11 13:15:48', '2016-05-11 13:15:48'),
(391, 9, 49, 45, 'Tutors', 1, '', '2016-05-11 13:15:48', '2016-05-11 13:15:48'),
(392, 9, 49, 48, 'Tutors', 1, '', '2016-05-11 13:15:48', '2016-05-11 13:15:48'),
(393, 9, 49, 49, 'Tutors', 1, '', '2016-05-11 13:15:48', '2016-05-11 13:15:48'),
(394, 9, 49, 50, 'Tutors', 1, '', '2016-05-11 13:15:48', '2016-05-11 13:15:48'),
(395, 9, 51, 42, 'Tutors', 1, '4', '2016-05-23 22:05:25', '2016-05-23 22:05:25'),
(396, 9, 51, 40, 'Tutors', 1, '2', '2016-05-23 22:05:25', '2016-05-23 22:05:25'),
(397, 9, 51, 44, 'Tutors', 1, '', '2016-05-23 22:05:25', '2016-05-23 22:05:25'),
(398, 9, 51, 47, 'Tutors', 1, '4', '2016-05-23 22:05:25', '2016-05-23 22:05:25'),
(399, 9, 51, 46, 'Tutors', 1, '5', '2016-05-23 22:05:25', '2016-05-23 22:05:25'),
(400, 9, 51, 45, 'Tutors', 1, '', '2016-05-23 22:05:25', '2016-05-23 22:05:25'),
(401, 9, 51, 48, 'Tutors', 1, '10', '2016-05-23 22:05:25', '2016-05-23 22:05:25'),
(402, 9, 51, 49, 'Tutors', 1, '5', '2016-05-23 22:05:25', '2016-05-23 22:05:25'),
(403, 9, 51, 50, 'Tutors', 1, '', '2016-05-23 22:05:25', '2016-05-23 22:05:25'),
(404, 9, 52, 42, 'Protectors', 16, '10', '2016-05-24 13:02:03', '2016-05-24 13:02:03'),
(405, 9, 52, 45, 'Protectors', 16, 'ffsadfsfdas', '2016-05-24 13:02:03', '2016-05-24 13:02:03'),
(406, 9, 52, 50, 'Protectors', 16, 'Irritado', '2016-05-24 13:02:03', '2016-05-24 13:02:03'),
(407, 9, 53, 42, 'Schools', 11, '7', '2016-06-01 10:14:05', '2016-06-01 10:24:46'),
(408, 9, 53, 45, 'Schools', 11, '', '2016-06-01 10:14:05', '2016-06-01 10:24:47'),
(409, 9, 53, 50, 'Schools', 11, 'Normal', '2016-06-01 10:14:05', '2016-06-01 10:24:47'),
(410, 9, 53, 47, 'Schools', 11, '6', '2016-06-01 10:24:46', '2016-06-01 10:24:46'),
(411, 9, 53, 46, 'Schools', 11, '7', '2016-06-01 10:24:46', '2016-06-01 10:24:46'),
(412, 9, 53, 48, 'Schools', 11, '', '2016-06-01 10:24:47', '2016-06-01 10:24:47'),
(413, 9, 53, 49, 'Schools', 11, '', '2016-06-01 10:24:47', '2016-06-01 10:24:47'),
(414, 9, 55, 42, 'Tutors', 1, '6', '2016-06-01 23:44:35', '2016-06-01 23:44:35'),
(415, 9, 55, 40, 'Tutors', 1, '2', '2016-06-01 23:44:35', '2016-06-01 23:44:35'),
(416, 9, 55, 44, 'Tutors', 1, '', '2016-06-01 23:44:35', '2016-06-01 23:44:35'),
(417, 9, 55, 47, 'Tutors', 1, '3', '2016-06-01 23:44:35', '2016-06-01 23:44:35'),
(418, 9, 55, 46, 'Tutors', 1, '5', '2016-06-01 23:44:35', '2016-06-01 23:44:35'),
(419, 9, 55, 45, 'Tutors', 1, '', '2016-06-01 23:44:35', '2016-06-01 23:44:35'),
(420, 9, 55, 48, 'Tutors', 1, '4', '2016-06-01 23:44:35', '2016-06-01 23:44:35'),
(421, 9, 55, 49, 'Tutors', 1, '2', '2016-06-01 23:44:35', '2016-06-01 23:44:35'),
(422, 9, 55, 50, 'Tutors', 1, 'Normal', '2016-06-01 23:44:35', '2016-06-01 23:44:35'),
(423, 9, 56, 42, 'Tutors', 1, '5', '2016-06-06 23:19:21', '2016-06-06 23:21:13'),
(424, 9, 56, 40, 'Tutors', 1, '2', '2016-06-06 23:19:21', '2016-06-06 23:21:13'),
(425, 9, 56, 44, 'Tutors', 1, '', '2016-06-06 23:19:21', '2016-06-06 23:21:13'),
(426, 9, 56, 47, 'Tutors', 1, '5', '2016-06-06 23:19:21', '2016-06-06 23:21:13'),
(427, 9, 56, 46, 'Tutors', 1, '3', '2016-06-06 23:19:21', '2016-06-06 23:21:13'),
(428, 9, 56, 45, 'Tutors', 1, '', '2016-06-06 23:19:21', '2016-06-06 23:21:13'),
(429, 9, 56, 48, 'Tutors', 1, '9', '2016-06-06 23:19:21', '2016-06-06 23:21:13'),
(430, 9, 56, 49, 'Tutors', 1, '9', '2016-06-06 23:19:21', '2016-06-06 23:21:13'),
(431, 9, 56, 50, 'Tutors', 1, 'Normal', '2016-06-06 23:19:21', '2016-06-06 23:21:13'),
(432, 9, 57, 42, 'Tutors', 1, '8', '2016-06-08 22:30:33', '2016-06-08 22:30:33'),
(433, 9, 57, 40, 'Tutors', 1, '2', '2016-06-08 22:30:33', '2016-06-08 22:30:33'),
(434, 9, 57, 44, 'Tutors', 1, '2', '2016-06-08 22:30:33', '2016-06-08 22:30:33'),
(435, 9, 57, 47, 'Tutors', 1, '7', '2016-06-08 22:30:33', '2016-06-08 22:30:33'),
(436, 9, 57, 46, 'Tutors', 1, '9', '2016-06-08 22:30:33', '2016-06-08 22:30:33'),
(437, 9, 57, 45, 'Tutors', 1, '', '2016-06-08 22:30:33', '2016-06-08 22:30:33'),
(438, 9, 57, 48, 'Tutors', 1, '19', '2016-06-08 22:30:33', '2016-06-08 22:30:33'),
(439, 9, 57, 49, 'Tutors', 1, '17', '2016-06-08 22:30:33', '2016-06-08 22:30:33'),
(440, 9, 57, 50, 'Tutors', 1, 'Normal', '2016-06-08 22:30:33', '2016-06-08 22:30:33'),
(441, 9, 58, 42, 'Tutors', 1, '6', '2016-06-09 16:51:00', '2016-06-09 16:51:00'),
(442, 9, 58, 40, 'Tutors', 1, '2', '2016-06-09 16:51:00', '2016-06-09 16:51:00'),
(443, 9, 58, 44, 'Tutors', 1, '10', '2016-06-09 16:51:00', '2016-06-09 16:51:00'),
(444, 9, 58, 47, 'Tutors', 1, '3', '2016-06-09 16:51:00', '2016-06-09 16:51:00'),
(445, 9, 58, 46, 'Tutors', 1, '10', '2016-06-09 16:51:00', '2016-06-09 16:51:00'),
(446, 9, 58, 45, 'Tutors', 1, '', '2016-06-09 16:51:00', '2016-06-09 16:51:00'),
(447, 9, 58, 48, 'Tutors', 1, '', '2016-06-09 16:51:00', '2016-06-09 16:51:00'),
(448, 9, 58, 49, 'Tutors', 1, '', '2016-06-09 16:51:00', '2016-06-09 16:51:00'),
(449, 9, 58, 50, 'Tutors', 1, '', '2016-06-09 16:51:00', '2016-06-09 16:51:00'),
(450, 9, 59, 42, 'Tutors', 1, '7', '2016-06-13 22:14:29', '2016-06-13 22:37:03'),
(451, 9, 59, 40, 'Tutors', 1, '2', '2016-06-13 22:14:29', '2016-06-13 22:37:03'),
(452, 9, 59, 44, 'Tutors', 1, '', '2016-06-13 22:14:29', '2016-06-13 22:37:03'),
(453, 9, 59, 47, 'Tutors', 1, '4', '2016-06-13 22:14:29', '2016-06-13 22:37:03'),
(454, 9, 59, 46, 'Tutors', 1, '7', '2016-06-13 22:14:29', '2016-06-13 22:37:03'),
(455, 9, 59, 45, 'Tutors', 1, '', '2016-06-13 22:14:29', '2016-06-13 22:37:03'),
(456, 9, 59, 48, 'Tutors', 1, '', '2016-06-13 22:14:29', '2016-06-13 22:37:03'),
(457, 9, 59, 49, 'Tutors', 1, '', '2016-06-13 22:14:29', '2016-06-13 22:37:03'),
(458, 9, 59, 50, 'Tutors', 1, 'Bem humorado', '2016-06-13 22:14:29', '2016-06-13 22:37:03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lesson_hashtags`
--

DROP TABLE IF EXISTS `lesson_hashtags`;
CREATE TABLE IF NOT EXISTS `lesson_hashtags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lesson_id` int(11) NOT NULL,
  `hashtag_id` int(11) NOT NULL,
  `model` varchar(255) DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lesson_hashtags`
--

INSERT INTO `lesson_hashtags` (`id`, `lesson_id`, `hashtag_id`, `model`, `model_id`) VALUES
(16, 7, 8, NULL, NULL),
(17, 7, 9, NULL, NULL),
(18, 7, 10, NULL, NULL),
(29, 8, 11, NULL, NULL),
(31, 11, 8, NULL, NULL),
(32, 27, 13, NULL, NULL),
(33, 27, 14, NULL, NULL),
(34, 29, 15, NULL, NULL),
(35, 35, 16, 'tutors', 1),
(40, 40, 17, 'tutors', 1),
(41, 40, 19, 'tutors', 1),
(42, 40, 20, 'tutors', 1),
(43, 42, 21, 'tutors', 1),
(44, 39, 17, 'tutors', 1),
(45, 39, 14, 'tutors', 1),
(46, 39, 18, 'tutors', 1),
(47, 39, 19, 'tutors', 1),
(48, 44, 22, 'tutors', 1),
(49, 46, 23, 'tutors', 1),
(51, 53, 24, 'schools', 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lesson_themes`
--

DROP TABLE IF EXISTS `lesson_themes`;
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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lesson_themes`
--

INSERT INTO `lesson_themes` (`id`, `lesson_id`, `theme_id`, `model`, `model_id`, `observation`, `nota_esperada`, `nota_alcancada`) VALUES
(2, 7, 1, 'Protectors', 17, 'Teste', '5', '10'),
(3, 8, 1, 'Protectors', 17, 'muito bom', '5', '6'),
(4, 8, 1, 'Protectors', 16, 'será???', '', ''),
(5, 11, 1, 'Therapists', 4, '2+2=4', '7', '7'),
(6, 11, 2, 'Therapists', 4, 'gramatica', '9', '5'),
(7, 14, 4, 'tutors', 1, 'Livro pg 167 (ex 38,39,40,41)\r\n\r\n-Reações de neutralização (Sal)\r\n-Confundindo o numero do NOX com o numero de atomos da molecula\r\n-Muito pouca autnomia no balanceamento\r\n', '', ''),
(8, 15, 1, 'Tutors', 1, 'Exercícios de P.G. Livro pg 186 (81,82,84,86,87,88,89)\r\n-Dificuldade em entender P.G.: confundindo com P. A.\r\n-Questão 84: Protocolos sequenciais (Baskara + Termo Geral de P.G.) foi  descoberto por ele em grande parte\r\n-Resolveu a 86 absolutamente sozinho: variação de um protocolo que ele descobriu sozinho. ', '', ''),
(9, 16, 1, 'Tutors', 1, 'Estudando para o teste relâmpago\r\nLivro pg 171 (55,56,57) e adicionais (58,59)\r\nMatéria ainda está sendo aprendida. ', '', ''),
(10, 17, 1, 'Tutors', 1, 'Livro pg189 (109 a 117)', '', ''),
(11, 17, 4, 'Tutors', 1, 'Livro pg 171 (questão 8)\r\nÚltimo exercício de química do dia anteiors, que não terminamos. ', '', ''),
(12, 18, 4, 'Tutors', 1, 'Estudo para o teste de química na segunda feira. ', '', ''),
(13, 19, 1, 'Tutors', 1, 'pg 191 (ex: 118,119,120)\r\nDemorou mais de uma hora para fazer os 3 exercícios. começou muito bem mas foi perdendo eficiência. ', '', ''),
(14, 19, 3, 'Tutors', 1, 'Ficha 12 sobre força elástica\r\nExercício de cálculo de constante elástica: "Esse exercício é fácil, sabia?"', '', ''),
(15, 20, 7, 'Tutors', 1, 'Exercicios da ficha - Biologia molecular.\r\nDemonstrou independência em relaçã o ao protocolo de tradução de códons do RNA-m (fez sozinho)\r\n-Apesar de termos feito apenas dois exercícios, considero a aula um grnade avanço no entendimento dessa matéria,', '', ''),
(16, 21, 3, 'Tutors', 1, 'Terminar os exercícios da ficha 12\r\n-No cálculo de Px percebeu que a massa era diferente de peso e conseguiu calcular o peso (sempre perguntando e confirmando os passos)\r\n-Conseguiu acompanhar minha explicação da questão 5, de energia e tá fazendo sozinho. Era diferente de todas que ele tinha feito. ', '', ''),
(17, 22, 3, 'Tutors', 1, 'Ficha 13 ', '', ''),
(18, 23, 5, 'Tutors', 1, 'Resumo de um texto (conteúdo não especificado)', '', ''),
(19, 23, 7, 'Tutors', 1, 'Estudando para o teste que ele teve que parar no meio:\r\nEfeito do oxigênio na absorção do nitrogênio/que moléculas são produzidas a partir do nitrogênio/que formas de nitrogênio são produzidas pelas plantas/Que enzima produz o Rna-m e expliquei a função do start e stop códon.', '', ''),
(20, 24, 8, 'Tutors', 1, 'Muita dificuldade em entender o conceito de caráter: Desenvolvimento confuso e pouco elaborado e mudando de opinião o tempo todo sobre "o caráter d ser humano ser aperfeiçoável"', '', ''),
(21, 25, 2, 'Tutors', 1, 'Estudo para o teste: Estrutura e formação de palavras/ quinhentismo/ Introdução ao barroco.\r\nEscreveu quase sozinho a introdução sobre de quinhentismo.', '', ''),
(22, 26, 7, 'Tutors', 1, 'Estudando para a prova de biologia na quarta feira. \r\nMeiose', '', ''),
(23, 27, 7, 'Tutors', 1, 'Estudo para a prova de Biologia\r\nConteúdos marcados pelo professor:\r\nCiclo do Nitrogênio\r\nSíntese de Proteína\r\nDivisão Celular', '', ''),
(24, 28, 7, 'Tutors', 1, 'Estudando para a prova:\r\nCiclo do nitrogênio \r\nSíntese de proteínas \r\nDivisão celular', '', ''),
(25, 29, 2, 'Tutors', 1, 'Estudando para a Prova: Arcadismo e Barroco x Classicismo', '', ''),
(26, 30, 6, 'Tutors', 1, 'Geografia física para a prova', '', ''),
(27, 31, 4, 'Tutors', 1, 'Trabalho de recuperação: Óxidos', '', ''),
(28, 32, 1, 'Tutors', 1, 'Estudo para a prova de recuperação: Exercícios de PA e PG que a professora passou. (8 questões, deixei um pra casa)\r\nProblemas com Álgebra: não sabia se podia multiplicar 9 por 2x e somar X+18X (resolvi a ultima, perguntando quanto era 1 joão mais 18 Joãos...)', '', ''),
(29, 35, 4, 'tutors', 1, 'asasass', '10', '10'),
(30, 33, 4, 'tutors', 1, 'Ficha n.2 de química (estequiometria)\r\n13 exercicios - um ja havia sido feito com o professor. 4 já pôs a resposta e 5 ja tinha sido feito.\r\n', '', ''),
(31, 38, 1, 'tutors', 1, 'Primeiros exercicios com seno, cosseno e tg da da soma de angulos. ', '', ''),
(32, 39, 1, 'tutors', 1, 'Questões únicas de  seno, cosseno e tangente da soma. \r\nQuestões rápidas ', '', ''),
(33, 40, 1, 'tutors', 1, 'pg 334 (1,2) e 335 (3,4,5,11)', '', ''),
(34, 41, 1, 'tutors', 1, 'pg 302 (18,19,20)\r\nExercícios simples. Seleção interessante para estimular autonomia. \r\n', '', ''),
(35, 42, 5, 'tutors', 1, '3 questões no caderno, sobre colonicaão inglesa.', '', ''),
(36, 43, 2, 'tutors', 1, '', '', ''),
(37, 43, 4, 'tutors', 1, '', '', ''),
(38, 44, 1, 'tutors', 1, 'Exercícios propostos: 10 exercicios de matris e suas operações.  ', '', ''),
(39, 45, 2, 'tutors', 1, 'Livro pg 517: 6,7 e 8  (todas a, b)\r\nLivro pg 22 : 1, 2 e 3 (todas a,b)\r\nConseguiu reconhecer que o termo "com calma e prazer" tava ligado a um verbo e chegou sozinho à resposta Adjunto adverbial (isso depois qe eu lembrei que ele tinha que reconhecer a qual termo a expressão estava ligada)', '', ''),
(40, 46, 2, 'tutors', 1, 'Continuação da aula anterior\r\nEncontrou sozinho os termos que qualificam o querer do eu lírico. ', '', ''),
(41, 46, 4, 'tutors', 1, 'Ficha 1 (fórmulas de dinamica dos gases perfeito) : Frz muto bem. Acompanhou a explicação e acertou contas com decimal.\r\nFicha 2 (Estequiometria): Maior dificuldade. ', '', ''),
(42, 49, 1, 'tutors', 1, '', '', ''),
(43, 49, 5, 'tutors', 1, '', '', ''),
(44, 51, 3, 'tutors', 1, 'Estudo para a prova - Introdução à mecânica e trabalho.  ', '7', ''),
(45, 53, 7, 'schools', 11, 'Prova\r\nEnzimas digestivas (Dependeu do resumo e confundiu protéina  como exemplo de enzima)\r\nSistema digestivo: (Não lembrava de todos os orgãos, mesmo tendo revisado logo antes da prova- Não tinha feito esse resumo)\r\nExpiração voluntária (Não se postou de de forma ativa diante do enunciado. Foi necessária que eu intervisse - Deixei a construção da resposta por conta própria - Usou termos muito básicos e erros de conteúdo) \r\nSistema circulatório (não sabia nada, o resumo estava incompleto. Foi o resumo que o tutor deixou que fizesse sozinho.)', '5', ''),
(46, 55, 7, 'tutors', 1, 'Não lembrava o que era enzima ou para que servia. Tivemos que trabalhar todo o conceito. Teve muita dificuldade em entender ponto ótimo de funcionamente, porque achava que o pH atuava diretamente, ao inves de influenciar, invertendo a narrativa. No entanto conseguiu me explicara questão de controle respiratório e relação com o acido carbônico do sangue e associou o sistema nervoso ao sistema de controle do corpo.. ', '6', ''),
(47, 56, 4, 'tutors', 1, 'Exercícios fácis de ropriedades periódicas, identificação de família e período. Dificuldade em lembrar das famílias, em contruir a relação da periodicidade do raio atomico e confusão inicial em relação a estutura atômica (necessaria para se entender a variação intra familia e intra periodo. No final das contas conseguiu levar os protocolos à frente, de forma intuitiva, mas com fraca utilização dos modelos corretos.', '', ''),
(48, 57, 2, 'tutors', 1, 'Ficha relativa a formação de palavras. No início ele não lebrou de nada, mas o fiz ir anotando atrás da ficha o que líamos no livro. ', '', ''),
(49, 58, 1, 'tutors', 1, '', '', ''),
(50, 59, 3, 'tutors', 1, 'Exercício da ficha de calorimetria. Demonstrou compreensão dos conceitos, mas dificuldade em entender o comando: encontrar a razão entre os calores específicos de cois materiais distintos.  A questão era dificil, pois não se tratava de encontrar um valor, mas a relação entre dois valores algébricos. ', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `messages`
--

DROP TABLE IF EXISTS `messages`;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `message_recipients`
--

DROP TABLE IF EXISTS `message_recipients`;
CREATE TABLE IF NOT EXISTS `message_recipients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` enum('Protectors','Schools','Tutors','Users','Therapists') NOT NULL,
  `model_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `message_replies`
--

DROP TABLE IF EXISTS `message_replies`;
CREATE TABLE IF NOT EXISTS `message_replies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) NOT NULL,
  `model` enum('Protectors','Schools','Tutors','Users','Therapists') NOT NULL,
  `model_id` int(11) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` enum('Protectors','Schools','Tutors','Users','Therapists') NOT NULL,
  `feed` int(11) DEFAULT NULL,
  `evolucao` int(11) DEFAULT NULL,
  `batepapo` int(11) DEFAULT NULL,
  `registros` int(11) DEFAULT NULL,
  `exercicios` int(11) DEFAULT NULL,
  `authentication` tinyint(1) NOT NULL DEFAULT '1',
  `timeline` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `permissions`
--

INSERT INTO `permissions` (`id`, `model`, `feed`, `evolucao`, `batepapo`, `registros`, `exercicios`, `authentication`, `timeline`) VALUES
(1, 'Protectors', 1, 1, 1, 1, 1, 1, 1),
(2, 'Schools', 1, 1, 1, 1, 1, 1, 1),
(3, 'Tutors', 1, 1, 1, 1, 1, 1, 1),
(4, 'Therapists', 1, 1, 1, 1, 1, 1, 1),
(5, 'Users', 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `protectors`
--

DROP TABLE IF EXISTS `protectors`;
CREATE TABLE IF NOT EXISTS `protectors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role` enum('mom','dad') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  `lastLogin` datetime DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `protectors`
--

INSERT INTO `protectors` (`id`, `user_id`, `role`, `username`, `password`, `full_name`, `phone`, `is_admin`, `lastLogin`, `created`, `modified`) VALUES
(2, 9, 'dad', 'luizhrqas@gmail.com', '$2y$10$OepMa5RXbwpHo0LPm/PHyuum82y8gF/QIzsFqQjctUBrcmBlumA6u', 'Luiz Henrique Almeida da SIlva', '(51) 9262-5423', 1, NULL, '2016-06-21 20:31:17', '2016-06-21 20:31:17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reports`
--

DROP TABLE IF EXISTS `reports`;
CREATE TABLE IF NOT EXISTS `reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `observation` text,
  `start` varchar(255) DEFAULT NULL,
  `end` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `reports`
--

INSERT INTO `reports` (`id`, `user_id`, `observation`, `start`, `end`) VALUES
(4, 9, '<p><strong>abacate</strong></p>', '', ''),
(5, 9, 'aluno está muito bem,...', '', ''),
(6, 9, 'asasa', '10/01/2016', '04/05/2016');

-- --------------------------------------------------------

--
-- Estrutura da tabela `schools`
--

DROP TABLE IF EXISTS `schools`;
CREATE TABLE IF NOT EXISTS `schools` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role` enum('mediator','coordinator') NOT NULL,
  `instituition_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `is_admin` int(11) DEFAULT NULL,
  `lastLogin` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `schools`
--

INSERT INTO `schools` (`id`, `user_id`, `role`, `instituition_id`, `username`, `password`, `full_name`, `phone`, `is_admin`, `lastLogin`) VALUES
(11, 9, 'mediator', 4, 'Luizalaureano', '$2y$10$Q9mUHSB9WUR7NJnaMzoXeOguBUMDwf1BiaRcGi7j.wfJjxiF.JCf6', 'Luiza Laureano', '21 987450704', NULL, NULL);

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
(1, 'Alterar Senha', '<p><img src="http://pep.0e1dev.com/img/logo-azul.png" height="80">\r\n\r\n          </p><h2>Olá, {{user}}!</h2>\r\n\r\n          <p>A sua senha foi alterada no site do PEP.</p>\r\n\r\n          <p>A nova senha é: <strong>{{password}}</strong></p>\r\n\r\n          <p>Atenciosamente, <br> Pedro Lima Sampaio - Fundador do PEP.</p>'),
(2, 'Ator Cadastrado', '<p><img src="http://pep.0e1dev.com/img/logo-azul.png" style="height: 80px;" height="80">\r\n\r\n          </p><h2>Olá, {{user}}!</h2>\r\n\r\n          <p>Seu e-mail foi cadastrado na rede do PEP.</p>\r\n\r\n          <p>A sua senha é: <strong>{{current_password}}</strong> </p>\r\n\r\n          <p>Atenciosamente, <br> Pedro Lima Sampaio - Fundador do PEP.</p>');

-- --------------------------------------------------------

--
-- Estrutura da tabela `themes`
--

DROP TABLE IF EXISTS `themes`;
CREATE TABLE IF NOT EXISTS `themes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `themes`
--

INSERT INTO `themes` (`id`, `user_id`, `name`, `created`, `modified`) VALUES
(1, 9, 'Matemática', '2015-12-16 10:55:30', '2015-12-16 10:55:30'),
(2, 9, 'Literatura', '2016-01-16 15:19:00', '2016-01-21 09:48:40'),
(3, 9, 'Física', '2016-01-16 15:19:14', '2016-01-16 15:19:14'),
(4, 9, 'Química', '2016-01-16 15:19:25', '2016-01-16 15:19:25'),
(5, 9, 'História', '2016-01-16 15:19:43', '2016-01-16 15:19:43'),
(6, 9, 'Geografia', '2016-01-21 09:48:18', '2016-01-21 09:48:18'),
(7, 9, 'Biologia', '2016-01-21 09:49:26', '2016-01-21 09:49:26'),
(8, 9, 'Filosofia', '2016-01-21 15:51:18', '2016-01-21 15:51:18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `therapists`
--

DROP TABLE IF EXISTS `therapists`;
CREATE TABLE IF NOT EXISTS `therapists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role` enum('therapist') NOT NULL DEFAULT 'therapist',
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `is_admin` int(11) DEFAULT NULL,
  `lastLogin` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tutors`
--

DROP TABLE IF EXISTS `tutors`;
CREATE TABLE IF NOT EXISTS `tutors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role` enum('tutor') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `is_admin` int(11) DEFAULT NULL,
  `lastLogin` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tutors`
--

INSERT INTO `tutors` (`id`, `user_id`, `role`, `username`, `password`, `full_name`, `phone`, `is_admin`, `lastLogin`) VALUES
(1, 9, 'tutor', 'luizhrqas@gmail.com', '$2y$10$L3adRU20In.9kSkaLLI/zee4MVwYHiQasbCBeoZYDYfY1cMLf5kGe', 'Pedro Lima Sampaio', '', 1, '2016-06-21 20:01:18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
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
  `lastLogin` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `profile_attachment`, `date_of_birth`, `instituition_id`, `clinical_condition`, `school_grade`, `description`, `created`, `modified`, `lastLogin`) VALUES
(1, 'lhas1620@gmail.com', '$2y$10$9V5woOyKjxPWhBDrzCLvle7rYHolZXw05R4MhZAM.xi0fxI7FvtEu', 'Fulano de Tal', '1459097841-wallhaven-178474-jpg.jpg', '28/04/1995', 1, 'Síndrome de Down', '3º Ano', 'É daqueles, mané!', '2016-03-27 13:57:21', '2016-04-04 13:06:46', NULL),
(9, 'jp@jp.com.br', '$2y$10$lQY3xe2wX06QubocG0MN9e8M3cyP4FTJ/jmYXzBnHi2LkD.ZotNAm', 'JP', '1460124969-12920886-10154087239369628-70006640-n-jpg.jpg', '28/04/1995', 4, 'SA', 'Terceiro Ano', 'Nenhuma observação no momento.', '2016-04-08 11:16:09', '2016-04-08 11:16:09', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

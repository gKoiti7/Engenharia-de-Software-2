-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Tempo de geração: 14-Jul-2020 às 20:52
-- Versão do servidor: 8.0.18
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto_transparencia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `obras`
--

DROP TABLE IF EXISTS `obras`;
CREATE TABLE IF NOT EXISTS `obras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Destino` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Datainicio` date NOT NULL,
  `Datafim` date NOT NULL,
  `Situacao` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `obras`
--

INSERT INTO `obras` (`id`, `Destino`, `Datainicio`, `Datafim`, `Situacao`) VALUES
(1, 'INFRA-ESTRUTURA URBANA', '2014-08-05', '2018-12-31', 'Concluída'),
(2, 'QUALIFICAÇÃO E READEQUAÇÃO VIARIA', '2015-04-27', '2018-04-27', 'Concluída'),
(3, 'GESTÃO GLOBAL DO SISTEMA DE ILUMINAÇÃO', '2015-07-28', '2018-07-28', 'Em andamento'),
(4, 'CONSTRUÇÃO DA CRECHE MODELO DO JARDIM ARACY', '2015-08-11', '2017-05-08', 'Concluída'),
(5, 'ESGOTAMENTO SANITÁRIO - REGIÃO LESTE', '2015-09-15', '2019-03-15', 'Em andamento'),
(6, 'IMPL. 1a ETAPA DO SETOR ABASTECIMENTO V.MORAES', '2015-11-11', '2019-04-09', 'Em andamento'),
(7, 'CORREDOR DE TRANSPORTE COLETIVO LESTE-OESTE', '2016-03-31', '2018-12-26', 'Em andamento'),
(8, 'CENTRO FISIOTERAPICO', '2016-04-13', '2016-10-13', 'Concluída'),
(9, 'SSA CEZAR DE SOUZA, JUNDIAPEBA E V.OROXO', '2016-06-14', '2019-06-14', 'Em andamento'),
(10, 'IMPL.DO JARDIM SENSORIAL/PQ.CENTENARIO', '2016-01-15', '2018-08-03', 'Em andamento'),
(11, 'RESTAURAÇÃO,CONSERV REF CONSTR.ANEXOS', '2016-10-07', '2018-03-10', 'Concluída'),
(12, 'PAVIMENTAÇÃO E DRENAGEM EM DIVERSAS RUAS', '2016-10-13', '2018-04-12', 'Concluída'),
(13, 'PAVIMENTAÇÃO E DRENAGEM', '2016-12-29', '2018-06-26', 'Concluída'),
(14, 'FORNEC. MONTAGEM RESERVATÓRIO METALICO', '2017-04-15', '2018-08-23', 'Em andamento'),
(15, 'ENTRADA DA ENERGIA COLETIVA P;INST, TRAILERS', '2017-04-19', '2017-07-18', 'Em andamento'),
(16, 'IMPL. BASES PARA ESCULTURAS', '2017-08-02', '2017-12-02', 'Concluída'),
(17, 'CONSTR. ANEXO CENTRO CIRÚRGICO - ÚNICA', '2017-08-07', '2018-07-08', 'Concluída'),
(18, 'REFORMA DA EM PROFa DORACY BAPTICA C PEREIRA', '2017-11-06', '2018-05-06', 'Concluída'),
(19, 'SUBSTITUIÇÃO DA COBERTURA DO CENTRO MUNICIPAL INTEGRAL CMI/PRO HIPER', '2018-03-06', '2018-04-27', 'Concluída'),
(20, 'REFORMA DO CARTÓRIO ELEITORAL', '2018-03-28', '2018-05-23', 'Concluída'),
(21, 'BASE DOS RESERVATÓRIO - SAA VILA OROXO E JUNDIAPEBA', '2018-08-10', '2019-01-28', 'Em andamento'),
(22, 'INST. ESCADA MARINHEIRO C/GUARDA CORPO NO CENTRO DE REABILITAÇÃO FISIOTERAPICO', '2018-04-17', '2018-06-17', 'Concluída'),
(23, 'ADEQUAÇÃO E MELHORIAS DA ESTRADA DA MORALOGIA', '2018-04-20', '2018-12-20', 'Em andamento'),
(24, 'AVALIAÇÃO ESTR./REFORMA/MODIFICAÇÃO/FECHAMENTO DO GATIL CENTRO DE BEM ESTAR', '2018-05-09', '2018-07-06', 'Concluída'),
(25, 'CONSTRUÇÃO DA CRECHE DO MOGI MODERNO', '2018-07-05', '2019-07-05', 'Em andamento'),
(26, 'CONSTRUÇÃO DA CRECHE DO JARDIM UNIVERSO', '2018-07-11', '2019-07-11', 'Em andamento'),
(27, 'FORNEC. INST. GRAMA SINTETICA QUADRA A SEREM IMPLANTADAS', '2018-07-12', '2018-08-31', 'Concluída'),
(28, 'CONSTRUÇÃO DE DUAS CRECHES NO DISTRITO DE JUNDIAPEBA', '2018-07-16', '2019-08-16', 'Em andamento'),
(29, 'IMPLANTAÇÃO DE ACESSIBILIDADE', '2018-07-23', '2018-12-23', 'Em andamento'),
(30, 'ADEQUAÇÃO DAS INST. PROT. COMBATE A INCENDIO DO MERCADO MUNICIAL', '2018-07-31', '2019-01-31', 'Em andamento'),
(31, 'INFRA ESTRUTURA, REFORMA E ADAPTAÇÃO DA PRAÇA DO CONJUNTO DO BOSQUE', '2018-08-10', '2019-06-10', 'Em andamento'),
(32, 'REFORMA E ADEQUAÇÃO DO MUSEU ESTAÇÃO FERROVIARIA DE SABAÚNA', '2018-08-20', '2020-07-20', 'Em andamento'),
(33, 'CONSTRUÇÃO DO CEMPRE - CENTRO MUNICIPAL DE PROGRAMAS EDUCACIONAIS', '2018-08-29', '2018-08-29', 'Em andamento'),
(34, 'CONSTRUÇÃO DO GINÁSIO POLIESPORTIVO', '2018-09-20', '2020-03-20', 'Em andamento');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
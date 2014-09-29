-- phpMyAdmin SQL Dump
-- version 2.11.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Dez 06, 2011 as 07:35 AM
-- Versão do Servidor: 5.0.51
-- Versão do PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `azoup`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ll_banners`
--

CREATE TABLE `ll_banners` (
  `id` int(11) NOT NULL auto_increment,
  `nome` varchar(256) default NULL,
  `grupo` int(11) NOT NULL,
  `imagem` varchar(256) NOT NULL,
  `url` varchar(256) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ll_banners_grupos`
--

CREATE TABLE `ll_banners_grupos` (
  `id` int(11) NOT NULL auto_increment,
  `nome` varchar(256) NOT NULL,
  `width` varchar(20) NOT NULL,
  `height` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

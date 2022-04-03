-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Maio-2021 às 01:08
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `buritiza_cadastrosocial`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `permissao` int(11) NOT NULL COMMENT '0- leitura e gravação / 1- leitura'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id_usuario`, `usuario`, `senha`, `permissao`) VALUES
(1, 'Roger', 'eb186f013a2ae7afd23cd69f46875352', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `logradouro`
--

CREATE TABLE `logradouro` (
  `id_logradouro` int(11) NOT NULL,
  `logradouro` varchar(200) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `tipo` varchar(200) NOT NULL,
  `obs` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `logradouro`
--

INSERT INTO `logradouro` (`id_logradouro`, `logradouro`, `bairro`, `cep`, `tipo`, `obs`) VALUES
(2, 'Rua Rio de Janeiro', 'Centro', '14570-000', 'Urbano', ''),
(3, 'Rua Santa Catarina', 'Centro', '14570-000', 'Urbano', ''),
(4, 'Rua Goiás', 'Centro', '14570-000', 'Urbano', ''),
(5, 'Rua Paraná', 'Centro', '14570-000', 'Urbano', ''),
(6, 'Rua São Paulo', 'Centro', '14570-000', 'Urbano', ''),
(7, 'Rua Edvard Sarreta', 'Centro', '14570-000', 'Urbano', ''),
(8, 'Rua Minas Gerais', 'Centro', '14570-000', 'Urbano', ''),
(10, 'Rua Joaquim Martins', 'Centro', '14570-000', 'Urbano', ''),
(11, 'Rua das Palmas', 'Centro', '14570-000', 'Urbano', ''),
(12, 'Rua Fernando Pinheiro', 'Centro', '14570-000', 'Urbano', ''),
(13, 'Rua das Acácias', 'Centro', '14570-000', 'Urbano', ''),
(14, 'Rua Bahia', 'Centro', '14570-000', 'Urbano', ''),
(15, 'Fazenda Cachoeira', 'Centro', '14570-000', 'Rural', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

CREATE TABLE `pessoas` (
  `id_pessoa` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `sobrenome` varchar(200) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(12) NOT NULL,
  `logradouro` varchar(200) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `endereco` varchar(300) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `frentetrabalho` decimal(12,2) NOT NULL,
  `bolsafamilia` decimal(12,2) NOT NULL,
  `luzagua` decimal(12,2) NOT NULL,
  `outros` decimal(12,2) NOT NULL,
  `obspessoa` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`id_pessoa`, `nome`, `sobrenome`, `cpf`, `rg`, `logradouro`, `numero`, `endereco`, `complemento`, `frentetrabalho`, `bolsafamilia`, `luzagua`, `outros`, `obspessoa`) VALUES
(11, 'Rubens', 'Barrichello', '931.803.989-02', '13737372-1', 'Rua Fernando Pinheiro', '100', 'Rua Fernando Pinheiro, 100', '', '20.00', '34.40', '0.00', '0.00', ''),
(12, 'Tio Roberto', 'Vieira', '111.111.111-11', '37817327-3', 'Fazenda Cachoeira', '0', 'Fazenda Cachoeira, 0', 'S/N', '0.00', '0.00', '0.00', '0.00', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Índices para tabela `logradouro`
--
ALTER TABLE `logradouro`
  ADD PRIMARY KEY (`id_logradouro`);

--
-- Índices para tabela `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`id_pessoa`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `logradouro`
--
ALTER TABLE `logradouro`
  MODIFY `id_logradouro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `pessoas`
--
ALTER TABLE `pessoas`
  MODIFY `id_pessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

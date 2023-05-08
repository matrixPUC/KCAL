-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Tempo de geração: 08-Maio-2023 às 02:00
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `kcal_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ingrediente`
--

CREATE TABLE `ingrediente` (
  `ID` int(3) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `calorias` int(11) NOT NULL,
  `quantidadePadrao` float NOT NULL,
  `porcao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ingrediente`
--

INSERT INTO `ingrediente` (`ID`, `nome`, `calorias`, `quantidadePadrao`, `porcao`) VALUES
(1, 'Farinha', 364, 100, 'gramas'),
(2, 'Ovo', 82, 1, 'unidade');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nutricionista`
--

CREATE TABLE `nutricionista` (
  `ID_usuario` int(3) NOT NULL,
  `crn` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `nutricionista`
--

INSERT INTO `nutricionista` (`ID_usuario`, `crn`) VALUES
(4, 'MG12345'),
(3, 'SP12345');

-- --------------------------------------------------------

--
-- Estrutura da tabela `receita`
--

CREATE TABLE `receita` (
  `ID` int(3) NOT NULL,
  `ID_usuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `public` tinyint(1) NOT NULL,
  `passo_a_passo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `receita_ingrediente`
--

CREATE TABLE `receita_ingrediente` (
  `ID_receita` int(11) NOT NULL,
  `ID_ingrediente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `ID` int(3) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`ID`, `tipo`) VALUES
(1, 'kcaller'),
(2, 'nutricionista'),
(3, 'administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(3) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `dataNasc` varchar(50) DEFAULT NULL,
  `peso` float DEFAULT NULL,
  `altura` int(3) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `tipo_usuario` int(3) NOT NULL,
  `validado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`ID`, `nome`, `dataNasc`, `peso`, `altura`, `email`, `senha`, `celular`, `tipo_usuario`, `validado`) VALUES
(1, 'joao', '2023-04-23', 100, 190, 'joao@gmail.com', 'Abc123!', '', 1, 1),
(2, 'adm😎', '2023-04-23', 100, 190, 'adm@gmail.com', 'Abc123!', '', 3, 1),
(3, 'Ana', '2023-05-16', 100, 180, 'ana@gmail.com', 'Abc123!', '41997549270', 2, 1),
(4, 'Maria', '2023-05-15', 100, 180, 'maria@gmail.com', 'Abc123!', '41997549270', 2, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `ingrediente`
--
ALTER TABLE `ingrediente`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `nutricionista`
--
ALTER TABLE `nutricionista`
  ADD PRIMARY KEY (`ID_usuario`),
  ADD UNIQUE KEY `crn` (`crn`);

--
-- Índices para tabela `receita`
--
ALTER TABLE `receita`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_usuario` (`ID_usuario`);

--
-- Índices para tabela `receita_ingrediente`
--
ALTER TABLE `receita_ingrediente`
  ADD KEY `ID_receita` (`ID_receita`),
  ADD KEY `ID_ingrediente` (`ID_ingrediente`);

--
-- Índices para tabela `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `tipo_usuario` (`tipo_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `ingrediente`
--
ALTER TABLE `ingrediente`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `receita`
--
ALTER TABLE `receita`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `nutricionista`
--
ALTER TABLE `nutricionista`
  ADD CONSTRAINT `nutricionista_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario` (`ID`);

--
-- Limitadores para a tabela `receita`
--
ALTER TABLE `receita`
  ADD CONSTRAINT `receita_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario` (`ID`);

--
-- Limitadores para a tabela `receita_ingrediente`
--
ALTER TABLE `receita_ingrediente`
  ADD CONSTRAINT `receita_ingrediente_ibfk_1` FOREIGN KEY (`ID_receita`) REFERENCES `receita` (`ID`),
  ADD CONSTRAINT `receita_ingrediente_ibfk_2` FOREIGN KEY (`ID_ingrediente`) REFERENCES `ingrediente` (`ID`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`tipo_usuario`) REFERENCES `tipo_usuario` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

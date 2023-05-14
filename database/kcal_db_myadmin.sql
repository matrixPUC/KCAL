-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 14-Maio-2023 às 18:24
-- Versão do servidor: 8.0.30
-- versão do PHP: 7.4.33

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
  `ID` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `calorias` int NOT NULL,
  `quantidadePadrao` float NOT NULL,
  `porcao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `ingrediente`
--

INSERT INTO `ingrediente` (`ID`, `nome`, `calorias`, `quantidadePadrao`, `porcao`) VALUES
(1, 'Farinha', 364, 100, 'gramas'),
(2, 'Ovo', 82, 1, 'unidade'),
(3, 'Óleo', 1927, 1, 'xícara'),
(4, 'Cenoura', 41, 100, 'gramas'),
(5, 'Açúcar', 774, 100, 'gramas'),
(6, 'Fermento em pó', 12, 1, 'colher'),
(7, 'Manteiga', 100, 1, 'colher'),
(8, 'Chocolate em pó', 65, 1, 'colher'),
(9, 'Leite', 130, 1, 'xícara'),
(10, 'Café solúvel', 4, 1, 'colher'),
(11, 'Arroz japonês', 204, 1, 'xícara'),
(12, 'Vinagre de arroz', 16, 1, 'xícara'),
(13, 'Atum em óleo', 130, 1, 'lata'),
(14, 'Alga Nori', 35, 1, 'unidade'),
(15, 'Água', 0, 1, 'xícara'),
(16, 'Água', 0, 1, 'colher'),
(17, 'Água', 0, 100, 'ml'),
(18, 'Sal', 0, 1, 'colher');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nutricionista`
--

CREATE TABLE `nutricionista` (
  `ID_usuario` int NOT NULL,
  `crn` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `nutricionista`
--

INSERT INTO `nutricionista` (`ID_usuario`, `crn`) VALUES
(3, 'PR12345'),
(4, 'PR66633');

-- --------------------------------------------------------

--
-- Estrutura da tabela `receita`
--

CREATE TABLE `receita` (
  `ID` int NOT NULL,
  `ID_usuario` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `public` tinyint(1) NOT NULL,
  `passo_a_passo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `receita`
--

INSERT INTO `receita` (`ID`, `ID_usuario`, `nome`, `descricao`, `public`, `passo_a_passo`) VALUES
(1, 5, 'Bolo de Cenoura com Cobertura de Chocolate', 'Bolo fofinho de cenoura com uma cobertura crocante de chocolate', 1, 'Massa: Em um liquidificador, adicione a cenoura, os ovos e o óleo, depois misture. Acrescente o açúcar e bata novamente por 5 minutos. Em uma tigela ou na batedeira, adicione a farinha de trigo e depois misture novamente. Acrescente o fermento e misture lentamente com uma colher. Asse em um forno preaquecido a 180° C por aproximadamente 40 minutos. Cobertura: Despeje em uma tigela a manteiga, o chocolate em pó, o açúcar e o leite, depois misture. Leve a mistura ao fogo e continue misturando até obter uma consistência cremosa, depois despeje a calda por cima do bolo.'),
(2, 5, 'Creme de café', 'Cappuccino de Colher', 1, 'Colocar na batedeira todos os ingredientes e bater por 5 a 10 minutos até formar um creme pastoso. Para beber é só utilizar uma ou duas colheres do creme em uma xícara e acrescentar leite quente. Fica uma delícia e muito cremoso. Outra opção é acrescentar uma pitada de canela e uma colher de chocolate em pó. Fica muito parecido com um cappuccino. Se preferir, pode beber gelado!'),
(3, 5, 'Oniguiri de Atum', 'Bolinho de arroz japonês recheado com atum', 1, 'Deixe o arroz de molho por 30 minutos, depois lave bem até a água ficar cristalina. Então coloque no fogo brando com tampa até secar e ficar bem inchado. Misture o vinagre o sal e açúcar, até dissolver bem. Coloque o arroz ainda quente em uma bacia plástica e vá despejando devagar a mistura de vinagre mexendo com movimentos rápidos com o ventilador ligado para esfriar, não deixar ficar melado. Depois de frio, pegue uma porção de arroz e abra na mão com se fosse uma panqueca. Recheie com atum e feche modelando um triângulo. Enrole na folha de nori e já está pronto!');

-- --------------------------------------------------------

--
-- Estrutura da tabela `receita_ingrediente`
--

CREATE TABLE `receita_ingrediente` (
  `ID_receita` int NOT NULL,
  `ID_ingrediente` int NOT NULL,
  `quantidade` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `receita_ingrediente`
--

INSERT INTO `receita_ingrediente` (`ID_receita`, `ID_ingrediente`, `quantidade`) VALUES
(4, 3, 0.5),
(4, 4, 3),
(4, 2, 4),
(4, 5, 1.5),
(4, 1, 3.6),
(4, 6, 1),
(4, 7, 1),
(4, 8, 1),
(4, 9, 1),
(5, 10, 6),
(5, 5, 1),
(5, 18, 2),
(6, 11, 2),
(6, 15, 3),
(6, 12, 0.5),
(6, 5, 0.6),
(6, 17, 1),
(6, 13, 2),
(6, 14, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `ID` int NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `ID` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `dataNasc` varchar(50) DEFAULT NULL,
  `peso` float DEFAULT NULL,
  `altura` int DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `tipo_usuario` int NOT NULL,
  `validado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`ID`, `nome`, `dataNasc`, `peso`, `altura`, `email`, `senha`, `celular`, `tipo_usuario`, `validado`) VALUES
(1, 'João', '2023-04-23', 100, 190, 'joao@gmail.com', 'Abc123!', '41999990000', 1, 1),
(2, 'Administrador', '2023-04-23', 100, 190, 'adm@gmail.com', 'Abc123!', '30305050', 3, 1),
(3, 'Lohine', '2000-04-23', 60, 160, 'lohine@gmail.com', 'Abc123!', '41999990000', 1, 1),
(4, 'Bruno', '2003-04-23', 90, 175, 'bruno@gmail.com', 'Abc123!', '41999990000', 2, 1),
(5, 'Beatriz', '1997-10-20', 65, 151, 'beatriz@gmail.com', 'Abc@123', '41999943781', 2, 1);

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
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `receita`
--
ALTER TABLE `receita`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `receita_ingrediente_ibfk_1` FOREIGN KEY (`ID_ingrediente`) REFERENCES `ingrediente` (`ID`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`tipo_usuario`) REFERENCES `tipo_usuario` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

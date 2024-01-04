-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql206.infinityfree.com
-- Tempo de geração: 04/01/2024 às 14:37
-- Versão do servidor: 10.4.17-MariaDB
-- Versão do PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `epiz_33999511_jacknpoe`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `menu`
--

CREATE TABLE `menu` (
  `CD_MENU` int(11) NOT NULL,
  `NM_DESCRICAO` varchar(255) NOT NULL,
  `NM_LINK` varchar(50) NOT NULL,
  `NM_IMAGEM` varchar(50) NOT NULL,
  `CD_TECNOLOGIA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `menu`
--

INSERT INTO `menu` (`CD_MENU`, `NM_DESCRICAO`, `NM_LINK`, `NM_IMAGEM`, `CD_TECNOLOGIA`) VALUES
(1, 'Parser que separa endereço em logradouro, número e complemento', 'php_testeparser.php', 'php_testeparser.png', 1),
(2, 'Calculadora entre juros e acréscimo', 'php_testejuros.php', 'php_testejuros.png', 1),
(3, 'Roladores de dados para RPGs de mesa', 'php_testedices.php', 'php_testedices.png', 1),
(4, 'Cálculo da diferença entre duas datas', 'php_calculadatas.php', 'php_calculadatas.png', 1),
(5, 'Cálculo da fórmula de Bhaskara', 'php_calculabhaskara.php', 'php_calculabhaskara.png', 1),
(6, 'Validação de CPF', 'php_testecpf.php', 'php_testecpf.png', 1),
(7, 'Calculadora de IMC (Índice de Massa Corpórea)', 'php_testeimc.php', 'php_testeimc.png', 1),
(8, 'Sequência de Fibonacci', 'php_fibonacci.php', 'php_fibonacci.png', 1),
(9, 'Conversor de ASCII para binário e de binário para ASCII', 'php_testeconversorbinario.php', 'php_testeconversorbinario.png', 1),
(10, 'Classe academia: Consultar exercício', 'php_testeacademia.php', 'php_testeacademia.png', 4),
(11, 'Classe academia 2: Incluir aluno', 'php_testeacademia2.php', 'php_testeacademia2.png', 4),
(12, 'Gerador de senhas', 'php_testegerasenha.php', 'php_testegerasenha.png', 1),
(13, 'Retira aspas simples contra code injection (MariaDB e mySQL)', 'php_retiraaspas.php', 'php_retiraaspas.png', 1),
(14, 'Cálculo da fórmula de Bhaskara', 'js_calculabhaskara.html', 'js_calculabhaskara.png', 2),
(15, 'Analisador de números • JavaScript', 'js_analisavalores.html', 'js_analisavalores.png', 2),
(16, 'Exercício de calculadora', 'aula70.html', 'aula70.png', 2),
(17, 'Exercício de bolas', 'aula82.html', 'aula82.png', 2),
(18, 'Calculadora entre juros e acréscimo', 'js_testejuros.html', 'js_testejuros.png', 2),
(19, 'Cálculo da fórmula de Bhaskara', 'api_calculabhaskara.html', 'api_calculabhaskara.png', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tecnologia`
--

CREATE TABLE `tecnologia` (
  `CD_TECNOLOGIA` int(11) NOT NULL,
  `NM_TECNOLOGIA` varchar(50) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tecnologia`
--

INSERT INTO `tecnologia` (`CD_TECNOLOGIA`, `NM_TECNOLOGIA`) VALUES
(1, 'PHP'),
(2, 'JavaScript'),
(3, 'API em PHP + JavaScript'),
(4, 'PHP + MySQL');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`CD_MENU`),
  ADD KEY `CD_TECNOLOGIA` (`CD_TECNOLOGIA`);

--
-- Índices de tabela `tecnologia`
--
ALTER TABLE `tecnologia`
  ADD PRIMARY KEY (`CD_TECNOLOGIA`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `menu`
--
ALTER TABLE `menu`
  MODIFY `CD_MENU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `tecnologia`
--
ALTER TABLE `tecnologia`
  MODIFY `CD_TECNOLOGIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

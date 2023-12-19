-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Dez-2023 às 00:35
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `jacknpoe`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu`
--

CREATE TABLE `menu` (
  `CD_MENU` int(11) NOT NULL,
  `NM_DESCRICAO` varchar(255) NOT NULL,
  `NM_LINK` varchar(50) NOT NULL,
  `NM_IMAGEM` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `menu`
--

INSERT INTO `menu` (`CD_MENU`, `NM_DESCRICAO`, `NM_LINK`, `NM_IMAGEM`) VALUES
(1, 'Teste de Parser que separa endereço em logradouro, número e complemento', 'php_testeparser.php', 'php_testeparser.png'),
(2, 'Teste de Calculadora entre juros e acréscimo', 'php_testejuros.php', 'php_testejuros.png'),
(3, 'Teste de Roladores de dados para RPGs de mesa', 'php_testedices.php', 'php_testedices.png'),
(4, 'Cálculo da diferença entre duas datas', 'php_calculadatas.php', 'php_calculadatas.png'),
(5, 'Cálculo da fórmula de Bhaskara', 'php_calculabhaskara.php', 'php_calculabhaskara.png'),
(6, 'Teste de Validação de CPF', 'php_testecpf.php', 'php_testecpf.png'),
(7, 'Calculadora de IMC (Índice de Massa Corpórea)', 'php_testeimc.php', 'php_testeimc.png'),
(8, 'Sequência de Fibonacci', 'php_fibonacci.php', 'php_fibonacci.png'),
(9, 'Teste de conversor de ASCII para binário e de binário para ASCII', 'php_testeconversorbinario.php', 'php_testeconversorbinario.png'),
(10, 'Teste da classe academia: Consultar exercício', 'php_testeacademia.php', 'php_testeacademia.png'),
(11, 'Teste da classe academia 2: Incluir aluno', 'php_testeacademia2.php', 'php_testeacademia2.png'),
(12, 'Teste de Gerador de Senhas', 'php_testegerasenha.php', 'php_testegerasenha.png'),
(13, 'Retira aspas simples contra code injection (MariaDB e mySQL)', 'php_retiraaspas.php', 'php_retiraaspas.png'),
(14, 'Cálculo da fórmula de Bhaskara (em JavaScript)', 'js_calculabhaskara.html', 'js_calculabhaskara.png'),
(15, 'Analisador de Números (em JavaScript)', 'js_testejuros.html', 'js_testejuros.png'),
(16, 'Exercício de Calculadora (em JavaScript)', 'aula70.html', 'aula70.png'),
(17, 'Exercício de Bolas (em JavaScript)', 'aula82.html', 'aula82.png');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`CD_MENU`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `menu`
--
ALTER TABLE `menu`
  MODIFY `CD_MENU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

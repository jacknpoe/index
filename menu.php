<?php
	//***********************************************************************************************
	// AUTOR: Ricardo Erick Rebêlo
	// Objetivo: API de retorno de JSON com as informações da tabela menu em jacknpoe
	// Alterações:
	// 0.1   10/12/2023 - primeira implementação, retornando HTML
	// 0.2   21/12/2023 - versão que retorna JSON
	// 0.3   21/12/2023 - versão usando fetch_all() no lugar de iterar um array
	// 0.4   26/12/2023 - versão que funciona com acentos no provedor usando query com SET
	// 0.4.1 03/01/2024 - retorna também NM_TECNOLOGIA (da tabela menu)
	// 0.4.2 03/01/2024 - retorna NM_TECNOLOGIA da tabela tecnologia

	namespace jacknpoe;

	// cabeçalhos para tratar os caracteres e definir a aplicação como JSON
	header("Content-Type: text/html; charset=UTF-8", true);
	header('Content-Type: application/json');

	// Tenta conectar no banco, se retornar erro, morre
	$hostname = "localhost";
	$database = "ficha";
	$jacknpoe = "jacknpoe";
	$username = "root";
	$password = "";
	$conexao = new \mysqli($hostname, $username, $password, $jacknpoe);
	if ($conexao->connect_errno) { die(json_encode("Falha ao conectar: (" . $conexao->connect_errno . ") " . $conexao->connect_error)); }

	// coloca os resultados para serem UTF-8, se retornar erro, morre
	$consulta = $conexao->query("SET character_set_results = utf8");
	if ($conexao->errno) { die(json_encode("Falha ao setar: (" . $conexao->errno . ") " . $conexao->error)); }

	// faz a consulta dos itens de menu do banco, se retornar erro, morre
	$consulta = $conexao->query("SELECT NM_DESCRICAO, NM_LINK, NM_IMAGEM, NM_TECNOLOGIA FROM menu INNER JOIN tecnologia ON menu.CD_TECNOLOGIA = tecnologia.CD_TECNOLOGIA ORDER BY CD_MENU");
	if ($conexao->errno) { die(json_encode("Falha ao consultar: (" . $conexao->errno . ") " . $conexao->error)); }
	$conexao->close();

	// inclui os itens dinâmicos do menu em $colunas
	$colunas = $consulta->fetch_all(MYSQLI_ASSOC);
 	// inclui o Teste de PHP in-line, que sempre estará fixo no final
	array_push($colunas, ["NM_DESCRICAO" => "Teste in-line", "NM_LINK" => "php_teste.php", "NM_IMAGEM" => "php_teste.png", "NM_TECNOLOGIA" => "PHP"]);
	echo json_encode($colunas, JSON_UNESCAPED_UNICODE);
?>

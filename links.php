<?php
	//***********************************************************************************************
	// AUTOR: Ricardo Erick Rebêlo
	// Objetivo: API de retorno de JSON com as informações da tabela link em jacknpoe
	// Alterações:
	// 0.1   21/12/2024 - primeira implementação, retornando JSON

	namespace jacknpoe;

	// cabeçalhos para tratar os caracteres e definir a aplicação como JSON
	header("Content-Type: text/html; charset=UTF-8", true);
	header('Content-Type: application/json');

	// Tenta conectar no banco, se retornar erro, morre
	require_once('connect.php');
	$conexao = new \mysqli($hostname, $username, $password, $jacknpoe);
	if ($conexao->connect_errno) { die(json_encode("Falha ao conectar: (" . $conexao->connect_errno . ") " . $conexao->connect_error)); }

	// coloca os resultados para serem UTF-8, se retornar erro, morre
	$consulta = $conexao->query("SET character_set_results = utf8");
	if ($conexao->errno) { die(json_encode("Falha ao setar: (" . $conexao->errno . ") " . $conexao->error)); }

	// faz a consulta dos itens de menu do banco, se retornar erro, morre
	$consulta = $conexao->query("SELECT NM_DESCRICAO, NM_LINK FROM link ORDER BY CD_LINK");
	if ($conexao->errno) { die(json_encode("Falha ao consultar: (" . $conexao->errno . ") " . $conexao->error)); }
	$conexao->close();

	// inclui os itens dinâmicos do menu em $colunas
	$colunas = $consulta->fetch_all(MYSQLI_ASSOC);
	echo json_encode($colunas, JSON_UNESCAPED_UNICODE);
?>

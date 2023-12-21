<?php
	//***********************************************************************************************
	// AUTOR: Ricardo Erick Rebêlo
	// Objetivo: API de retorno de JSON com as informações da tabela menu em jacknpoe
	// Alterações:
	// 0.1   10/12/2023 - primeira implementação
	// 0.2   21/12/2023 - versão que usa JSON (no lugar de HTML)
	// 0.3   21/12/2023 - versão usando fetch_all()

	namespace jacknpoe;

	// cabeçalhos para tratar os caracteres e definir a aplicação como JSON
	require_once( 'configuracoes.php');
	$cabecalho = "Content-Type: text/html; charset=" . CARACTERES;
	header( $cabecalho, true);
	header('Content-Type: application/json');

	// Tenta conectar no banco, se retornar erro, morre
	require_once( 'connect.php');
	$conexao = new \mysqli( $hostname, $username, $password, $jacknpoe);
	if ($conexao->connect_errno) { die( json_encode( "Falha ao conectar: (" . $conexao->connect_errno . ") " . $conexao->connect_error)); }

	// faz a consulta dos itens de menu do banco, se der um erro, morre
	$consulta = $conexao->query( "SELECT NM_DESCRICAO, NM_LINK, NM_IMAGEM FROM menu ORDER BY CD_MENU");
	if ($conexao->errno) { die( json_encode( "Falha ao consultar: (" . $conexao->errno . ") " . $conexao->error));	}

	// inclui os itens dinâmicos do menu em $colunas
	$colunas = $consulta->fetch_all(MYSQLI_ASSOC);
 	// inclui o Teste de PHP in-line, que sempre estará fixo no final
	array_push( $colunas, [ "NM_DESCRICAO" => "Teste de PHP in-line", "NM_LINK" => "php_teste.php", "NM_IMAGEM" => "php_teste.png"]);
	echo json_encode( $colunas, JSON_UNESCAPED_UNICODE);
?>

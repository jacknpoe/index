<?php
	//***********************************************************************************************
	// AUTOR: Ricardo Erick Rebêlo
	// Objetivo: API de retorno de JSON com as informações da tabela menu em jacknpoe
	// Alterações:
	// 0.1   10/12/2023 - primeira implementação
	// 0.2   21/12/2023 - versão que usa JSON (no lugar de HTML)

	namespace jacknpoe;

	require_once( 'configuracoes.php');
	$cabecalho = "Content-Type: text/html; charset=" . CARACTERES;
	header( $cabecalho, true);
	header('Content-Type: application/json');

	require_once( 'connect.php');
	$conexao = new \mysqli( $hostname, $username, $password, $jacknpoe);

	// Tenta conectar no banco, se retornar erro, morre
	if ( $conexao->connect_errno)
	{
	    die( json_encode( "Falha ao conectar: (" . $conexao->connect_errno . ") " . $conexao->connect_error));
	}

	// faz a consulta dos itens de menu do banco
	$consulta = $conexao->query( "SELECT NM_DESCRICAO, NM_LINK, NM_IMAGEM FROM menu ORDER BY CD_MENU");

	// Checa se a query teve sucesso
	if ( $conexao->errno)
	{
		die( json_encode( "Falha ao consultar: (" . $conexao->errno . ") " . $conexao->error));
	}

	// inclui os itens dinâmicos do menu em $colunas
	$contador = 0;
	$colunas = array();
	while ( $coluna = $consulta->fetch_assoc()) {
	     $colunas[$contador]["NM_DESCRICAO"] = $coluna[ "NM_DESCRICAO"];
	     $colunas[$contador]["NM_LINK"] = $coluna[ "NM_LINK"];
	     $colunas[$contador]["NM_IMAGEM"] = $coluna[ "NM_IMAGEM"];
	     $contador = $contador + 1;
	}

	// inclui o Teste de PHP in-line, que sempre estará fixo no final
	$colunas[$contador]["NM_DESCRICAO"] = "Teste de PHP in-line";
	$colunas[$contador]["NM_LINK"] = "php_teste.php";
	$colunas[$contador]["NM_IMAGEM"] = "php_teste.png";

	echo json_encode( $colunas, JSON_UNESCAPED_UNICODE);
?>

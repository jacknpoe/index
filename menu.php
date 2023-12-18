<?php
	//***********************************************************************************************
	// AUTOR: Ricardo Erick Rebêlo
	// Objetivo: API de retorno de JSON com as informações da tabela menu em jacknpoe
	// Alterações:
	// 0.1   10/12/2023 - primeira implementação

	namespace jacknpoe;

	require_once( 'configuracoes.php');
	$cabecalho = "Content-Type: text/html; charset=" . CARACTERES;
	// $cabecalho = "Content-Type: text/html; charset=" . UTF-8;
	header( $cabecalho, true);
	header('Content-Type: application/json');

	require_once( 'connect.php');
	$conexao = new \mysqli( $hostname, $username, $password, $jacknpoe);

	// Tenta conectar no banco, se retornar erro, morre
	if ( $conexao->connect_errno)
	{
	    die( json_encode( "Falha ao conectar: (" . $conexao->connect_errno . ") " . $conexao->connect_error));
	}

	$consulta = $conexao->query( "SELECT NM_DESCRICAO, NM_LINK, NM_IMAGEM FROM menu ORDER BY CD_MENU");

	// Checa se a query teve sucesso
	if ( $conexao->errno)
	{
		die( json_encode( "Falha ao consultar: (" . $conexao->errno . ") " . $conexao->error));
	}

	$resultado = "";

	// while ( $coluna = $consulta->fetch_assoc())
	// {
	// 	$resultado .= '<div class="item"><p><a href="';
	// 	$resultado .= htmlspecialchars( $coluna[ "NM_LINK"], ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401, CARACTERES);
	// 	$resultado .= '"><img src="';
	// 	$resultado .= htmlspecialchars( $coluna[ "NM_IMAGEM"], ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401, CARACTERES);
	// 	$resultado .= '"><br>';
	// 	$resultado .= htmlspecialchars( $coluna[ "NM_DESCRICAO"], ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401, CARACTERES);
	// 	$resultado .= '</a></p></div>';
	// }

	// $resultado .= '<div class="item"><p><a href="';
	// $resultado .= htmlspecialchars( "php_teste.php", ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401, CARACTERES);
	// $resultado .= '"><img src="';
	// $resultado .= htmlspecialchars( "php_teste.png", ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401, CARACTERES);
	// $resultado .= '"><br>';
	// $resultado .= htmlspecialchars( "Teste de PHP in-line", ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401, CARACTERES);
	// $resultado .= '</a></p></div>';


	while ( $coluna = $consulta->fetch_assoc())
	{
		$resultado .= '<div class="item"><p><a href="';
		$resultado .= $coluna[ "NM_LINK"];
		$resultado .= '"><img src="';
		$resultado .= $coluna[ "NM_IMAGEM"];
		$resultado .= '"><br>';
		$resultado .= $coluna[ "NM_DESCRICAO"];
		$resultado .= '</a></p></div>';
	}

	$resultado .= '<div class="item"><p><a href="';
	$resultado .= "php_teste.php";
	$resultado .= '"><img src="';
	$resultado .= "php_teste.png";
	$resultado .= '"><br>';
	$resultado .= "Teste de PHP in-line";
	$resultado .= '</a></p></div>';

	echo( json_encode($resultado));

	// $resultado = $consulta->fetch_array(MYSQLI_ASSOC);
	// echo( json_encode( $resultado));
?>

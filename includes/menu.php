<?php
	require "includes/autenticar.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<title>Sistema de gerenciamento</title>
</head>
<body>
	<style><?php include 'css/style.css';?></style>

	<header id="header-geral">
		<nav>
			<a href="inicio.php"><img id="sushimi-logo" src="images/sushimi-logo.png" alt="sushimi logo"></a>
			<ul>
				<li><a class="header-pagina" href="inicio.php">Início</a></li>
				<li><a class="header-pagina" href="paginaCadastrar.php">Cadastrar</a></li>
				<li id="logout"><a href="logout.php">Sair</a></li>
			</ul>
		</nav>
	</header>
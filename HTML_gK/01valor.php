<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
		<title>Operadores Relacionais</title>
		<style>
			*{
				color:black;
				text-shadow:1px 1px 1px gray;
				font-family:Arial;
				background-color:white;
			}
		</style>
	</head>
	<body>
		<h1>Operadores Relacionais</h1>
		<?php
			$nome=$_GET["nome"];
			$ano=$_GET["ano"];
			$sexo=$_GET["sexo"];
			$idade=date("Y")-$ano;
			echo "$nome é $sexo e tem $idade anos.";
		?>
		<a href="index.html">Voltar</a>
	</body>
</html>
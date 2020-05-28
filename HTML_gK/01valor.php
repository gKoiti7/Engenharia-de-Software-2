<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8"/>
		<title>Arquivo PHP+HTML</title>
		<?php
			$txt=isset($_GET["t"])?$_GET["t"]:"Texto Genérico";
			$tam=isset($_GET["tam"])?$_GET["tam"]:"12pt";
			$cor=isset($_GET["cor"])?$_GET["cor"]:"black";
		?>
		<style>
			span.texto{
				font-size:<?php echo $tam;?>;
				color:<?php echo $cor;?>;
			}
			*{
				color:black;
				text-shadow:1px 1px 1px gray;
				font-family:Arial;
				background-color:white;
			}
		</style>
	</head>
	<body>
		<h1>Arquivo PHP+HTML</h1>
		<?php
			echo "<span class='texto'>$txt</span>";
			$nome=isset($_GET["nome"])?$_GET["nome"]:"[não informado]";
			$ano=isset($_GET["ano"])?$_GET["ano"]:0;
			$sexo=isset($_GET["sexo"])?$_GET["sexo"]:"[sem sexo]";
			$idade=date("Y")-$ano;
			echo "<br/>$nome é $sexo e tem $idade anos.";
		?>
		<a href="index.html">Voltar</a>
	</body>
</html>
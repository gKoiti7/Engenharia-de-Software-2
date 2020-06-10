<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<meta charset="utf-8"/>
		<title>Arquivo PHP+HTML</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<link rel="shortcut icon" href="logo.png" sizes="32x32" type="image/png">
	</head>
	
	<body>
		<!--Cabeçalho-->
		<header>
			<div class="container">
				<div id="logo">
					<img src="logo.png"/ height=40px>
				</div>
				
				<div id="menu">
					<a href="index.html">Home</a>
					<a href="criadores.html">Desenvolvedores</a>
					<a href="listar.php">Servidores Públicos</a>
					<a href="fale_conosco.html">Avalie o site</a>
				</div>
			</div>
		</header>
		
		<div id="fale_conosco">
			<h1>Arquivo PHP+HTML</h1>
			<?php
				$nome=isset($_GET["nome"])?$_GET["nome"]:"[nome não inserido]";
				echo "Nome do usuário: $nome";
				echo"</br>";
				$ano=isset($_GET["nascimento"])?$_GET["nascimento"]:"[idade não inserida]";
				$idade=date("Y")-$ano;
				echo "Idade do usuário: $idade";
				echo "</br>";
				$email=isset($_GET["e-mail"])?$_GET["e-mail"]:"[e-mail não inserido]";
				echo "E-mail do usuário: $email";
				echo "</br>";
				$opcao=isset($_GET["aval"])?$_GET["aval"]:0;
				switch($opcao){
					case 1:
						echo "Avaliação do usuário: Ótimo";
						break;
					case 2:
						echo "Avaliação do usuário: Bom";
						break;
					case 3:
						echo "Avaliação do usuário: Mediano";
						break;
					case 4:
						echo "Avaliação do usuário: Ruim";
						break;
					case 5:
						echo "Avaliação do usuário: Péssimo";
						break;
					default:
						echo "Avaliação do usuário: [Não inserido]";
						break;
				}
			?>
			<div id="menu">
				<a href="javascript:history.go(-1)">Voltar</a>
			</div>
		</div>
		<!--Rodapé-->
		<footer>
			Desenvolvido por:
			Gustavo Koiti Kuwabata/
			Luciano de Almeida/
			Raphael Rugna<br>
			Fatec MC 2020
		</footer>
	</body>
</html>
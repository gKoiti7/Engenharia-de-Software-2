<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<meta charset="utf-8"/>
		<title>Arquivo PHP+HTML</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<link rel="shortcut icon" href="logo.png" sizes="32x32" type="image/png">
		<?php
			$txt=isset($_GET["t"])?$_GET["t"]:"Texto Genérico";
			$tam=isset($_GET["tam"])?$_GET["tam"]:"12pt";
			$cor=isset($_GET["cor"])?$_GET["cor"]:"black";
		?>
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
					<a href="criadores.html">Sobre os desenvolvedores</a>
					<a href="#">Serviços</a>
					<a href="fale_conosco.html">Fale conosco</a>
				</div>
			</div>
		</header>
		
		<div id="principal">
		<h1>Arquivo PHP+HTML</h1>
		<?php
			$d=isset($_GET["ds"])?$_GET["ds"]:0;
			switch($d){
				case 2:
				case 3:
				case 4:
				case 5:
				case 6:
					echo "Levanta e vai estudar!";
					break;
				case 7:
				case 8:
					echo "Descansar!";
					break;
				default:
					echo "Dia da semana inválido";
			}
				
			/*
			$n=isset($_GET["num"])?$_GET["num"]:0;
			$o=isset($_GET["oper"])?$_GET["oper"]:1;
			switch($o){
				case 1:
					$r=$n*2;
					break;
				case 2:
					$r=$n^3;
					break;
				case 3:
					$r=sqrt($n);
					break;
			}
			echo "O resultado da operação solicitada foi <span class='foco'>$r</span>"; 
			
			$a=isset($_GET["ano"])?$_GET["ano"]:1900;
			$i=date("Y")-$a;
			echo "Você nasceu em $a e terá $i anos";
			if($i<16){
				$tipoVoto="Não vota";
			}
			elseif(($i>=16 && $i<18)||($i>65)){
					$tipoVoto="Voto opcional";
				}
				else{
					$tipoVoto="Voto obrigatório";
				}
			echo "Para essa idade, $tipoVoto";
			
			echo "<span class='texto'>$txt</span>";
			$nome=isset($_GET["nome"])?$_GET["nome"]:"[não informado]";
			$ano=isset($_GET["ano"])?$_GET["ano"]:0;
			$sexo=isset($_GET["sexo"])?$_GET["sexo"]:"[sem sexo]";
			$idade=date("Y")-$ano;
			echo "<br/>$nome é $sexo e tem $idade anos.";
			*/
		?>
		<!--<a href="index.html">Voltar</a>-->
		<br/><a href="javascript:history.go(-1)">Voltar</a>
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
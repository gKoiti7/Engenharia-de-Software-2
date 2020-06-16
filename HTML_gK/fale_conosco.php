<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<meta charset="utf-8">
		<title>Avalie o site</title>
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
					<a href="fale_conosco.php">Avalie o site</a>
				</div>
			</div>
		</header>
		
		<!--Conteúdo-->
		<div id="fale_conosco">
			<div class="container">
				<h1>Nos mande sua avaliação!</h1>
				
				<?php
					if(isset($_SESSION['msg'])){
						echo $_SESSION['msg'];
						unset($_SESSION['msg']);
					}
					echo "</br>";
				?>
				
				<div class="efeito">
					<p>
						Esta seção do site é destinada a ter uma maior interação com nossos visitantes. Sinta-se livre em nos mandar uma avaliação do site e do conteúdo em geral! Sua ajuda nos permitirá a aprimorar ainda mais nossos serviços.
					</p>
				</div>
				</br>
				<div class="efeito">
					<p>
						<h4>Observação: O envio dos dados não é obrigatório.</h4>
					</p>
				</div>
				</br>
				<div class="envio">
					<form method="get" action="01valor.php">
						Nome:
						<input type="text" placeholder="Digite seu nome" name="nome"/></br>
						<br/>
						Ano de Nascimento:
						<input type="number" placeholder="Digite o ano" name="nascimento"/></br>
						<br/>
						E-mail para contato:
						<input type="text" placeholder="Digite seu e-mail" name="e-mail"/></br>
						<br/>
					
						<p>
							<h4>Avalie nosso site com base em sua experiência com a interface e a qualidade das informações apresentadas:</h4>
						</p>
						
						<br/>
						<fieldset><legend>Avaliação</legend>
							<input type="radio" name="aval" value="1" id="otimo"/>
								<label for="otimo">Ótimo</label>
							<input type="radio" name="aval" value="2" id="bom"/>
								<label for="bom">Bom</label>
							<input type="radio" name="aval" value="3" id="mediano"/>
								<label for="mediano">Mediano</label>
							<input type="radio" name="aval" value="4" id="ruim"/>
								<label for="ruim">Ruim</label>
							<input type="radio" name="aval" value="5" id="pessimo"/>
								<label for="pessimo">Péssimo</label>
						</fieldset>
						<br/>
						<input type="submit" value="Enviar dados"/>
						<br/>
					</form>
				</div>
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
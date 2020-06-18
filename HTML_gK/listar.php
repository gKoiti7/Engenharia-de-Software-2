<?php
	include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<meta charset="utf-8">
		<title>Servidores Públicos</title>
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
					<a href="index.php">Home</a>
					<a href="criadores.html">Desenvolvedores</a>
					<a href="listar.php">Servidores Públicos</a>
					<a href="fale_conosco.php">Avalie o site</a>
				</div>
			</div>
		</header>
		
		<!--Conteúdo-->
		<div id="fale_conosco"> 
			<div class="container">
				<h1>Servidores Públicos</h1>
				<div class="efeito">
					<p>
						Esta seção do site é destinada a exibir informações sobre os servidores públicos do município. Com o intuito de auxiliar na transparência de informações ao cidadão.
					</p>
				</div>
				</br>
				<h2>Servidor com maior salário</h2>
				<div class="efeito">
					<?php
						$maior_salario="SELECT * FROM transparencia ORDER BY Salario DESC";
						$resultado_maior_salario=mysqli_query($conn, $maior_salario);
						$ler_maior_salario=mysqli_fetch_assoc($resultado_maior_salario);
						echo "Nome do servidor: ".$ler_maior_salario['Nome'];
						echo "</br>";
						echo "Função do servidor: ".$ler_maior_salario['Cargo'];
						echo "</br>";
						echo "Salário do servidor: R$".$ler_maior_salario['Salario'];
					?>
				</div>
				</br>
				<div class="efeito">
				<?php
					//Receber o número da página
					$pagina_atual=filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
					$pagina=(!empty($pagina_atual))?$pagina_atual:1;
					
					//Configurar a quantidade de itens por página
					$qnt_result_pag=20;
					
					//Calcular o início da visualização
					$inicio=($qnt_result_pag * $pagina)-$qnt_result_pag;
					
					$filtro=isset($_GET["ordenar"])?$_GET["ordenar"]:"Nome";
									
					//Puxando registros do banco de dados
					$result_transparencia="SELECT * FROM transparencia ORDER BY $filtro LIMIT $inicio,$qnt_result_pag";
					$resultado_transparencia=mysqli_query($conn, $result_transparencia);
					
						while($row_transparencia=mysqli_fetch_assoc($resultado_transparencia)){
							echo "Nome do servidor público: ". $row_transparencia['Nome']."</br>";
							echo "Cargo do servidor público: ". $row_transparencia['Cargo']."</br>";
							echo "Salário do servidor público: R$". $row_transparencia['Salario']."</br>";
							echo "</br><hr>";
						}
					
					//Paginação - Somar a quantidade de usuários
					$result_pag="SELECT COUNT(id)As num_result FROM transparencia";
					$resultado_pag=mysqli_query($conn, $result_pag);
					$row_pag=mysqli_fetch_assoc($resultado_pag);
					$quantidade_pag=ceil($row_pag['num_result']/$qnt_result_pag);
					
					//Limitar os links antes e depois
					echo "</br>";
					
					$max_links=4;
					
					echo " <a href='listar.php?pagina=1'>Primeira</a> ";
					
					for($pag_ant=$pagina - $max_links;$pag_ant<=$pagina-1;$pag_ant++){
						if($pag_ant>=1){
							echo " <a href='listar.php?pagina=$pag_ant'>$pag_ant</a> ";
						}
					}
					
					echo " $pagina ";
					
					for($pag_dep=$pagina+1;$pag_dep<=$pagina+$max_links;$pag_dep++){
						if($pag_dep<=$quantidade_pag){
							echo " <a href='listar.php?pagina=$pag_dep'>$pag_dep</a> ";
						}
					}
						
					echo " <a href='listar.php?pagina=$quantidade_pag'>Última</a> ";
				?>
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
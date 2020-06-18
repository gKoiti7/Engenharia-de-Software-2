<?php
	include_once("conexao.php");
	
	$meses = array();
	$valores = array();
	$i = 0;

	//Buscar dados no banco de dados servidores
	$result_transparencia="SELECT * FROM transparencia";
	$resultado_transparencia=mysqli_query($conn, $result_transparencia);
	//Guardar dados na string
	while($row_transparencia=mysqli_fetch_assoc($resultado_transparencia)){
		$meses[$i] = $row_transparencia['Nome'];
		$valores[$i] = $row_transparencia['Salario'];
		$i = $i + 1;
	}
?>
<!DOCTYPE html>
<html lang="pt-br">

	<head>
		<meta charset="utf-8">
		<title>De Olho Mogi</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<link rel="shortcut icon" href="logo.png" sizes="32x32" type="image/png">
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>    
		<script type="text/javascript">
		google.charts.load("current", {packages:["corechart"]});
		//google.load('visualization', '1', {'packages':['corechart']});
		google.setOnLoadCallback(desenhaGrafico);
 
	function desenhaGrafico() {
  
		var data = new google.visualization.DataTable();
		
		data.addColumn('string', 'Servidores');
		data.addColumn('number', 'Salário em R$');
   
		data.addRows(<?php echo $i ?>);
  
		<?php
		$k = $i;
	
		for ($i = 0; $i < $k; $i++) {
		?>
	
		data.setValue(<?php echo $i ?>, 0, '<?php echo $meses[$i] ?>');
		data.setValue(<?php echo $i ?>, 1, <?php echo $valores[$i] ?>);
	
		<?php
		}
		?>
  
		var options = {
			title: 'Gráfico: Salários dos servidores públicos',
			width: 1400, height: 900,
			colors: ['blue'],
			legend: { position: 'bottom' },
			curveType: 'function'
		};
  
		// cria grafico
		//var chart = new google.visualization.arrayToDataTable(document.getElementById('chart_div'));
		var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
		// desenha grafico 
		chart.draw(data, options);
	}
	</script>
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
			<div class="container">
				<h1>Bem-vindo a página De Olho Mogi</h1>
			</div>
		<center>
			<div id="chart_div"></div>
		</center>
			
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
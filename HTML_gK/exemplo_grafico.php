<?php 
// Conexão Local
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
	<meta charset="utf-8"/>
	<title>Exemplo Gráfico</title>
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
			width: 2000, height: 1250,
			colors: ['blue'],
			legend: { position: 'center' },
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
		<div id="chart_div"></div>
	</body>
</html>
<?php
	session_start();
	include_once("conexao.php");

	$nome=filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_STRING);
				
	$ano=filter_input(INPUT_GET, 'nascimento', FILTER_SANITIZE_NUMBER_INT);
	//$idade=date("Y")-$ano;
	
	$email=filter_input(INPUT_GET, 'e-mail', FILTER_SANITIZE_EMAIL);
				
	$opcao=isset($_GET["aval"])?$_GET["aval"]:0;
	switch($opcao){
		case 1:
			$avaliacao="Otimo";
			break;
		case 2:
			$avaliacao="Bom";			
			break;
		case 3:
			$avaliacao="Mediano";			
			break;
		case 4:
			$avaliacao="Ruim";			
			break;
		case 5:
			$avaliacao="Pessimo";			
			break;
		default:
			$avaliacao="Nao inserido";			
			break;
	}
	
	$enviar_dados = "INSERT INTO feedback (nome, ano, email, avaliacao, created) VALUES ('$nome', '$ano', '$email', '$avaliacao', NOW())";
	$resultado_dados = mysqli_query($conn, $enviar_dados);

	if(mysqli_insert_id($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Avaliação cadastrada com sucesso</p>";
	header("Location: contato.php");
	}
	else{
		$_SESSION['msg'] = "<p style='color:red;'>Avaliação não cadastrada com sucesso</p>";
	header("Location: contato.php");
	}
?>
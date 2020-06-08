<?php
header('Content-type: text/html; charset=iso-8859-1');
session_start();
include_once("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>    
        <title>Projetos</title>
    </head>
    <body>
        <h1>Listar Projetos</h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }

            // Receber o número da página
            $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
            $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

            // Setar a quantidade de itens por pagina
            $qnt_result_pg = 10;

            // Calcular o início da visualização
            $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;                    
            
            // Declarar filtro de pesquisa
            
            $select_ordem = $_GET['pesquisa-camara'];
            
            
            // Exibir resultado do BD
            $result_usuarios = "SELECT * FROM projetos_camara ORDER BY autor $select_ordem LIMIT $inicio, $qnt_result_pg";
            $resultado_usuarios = mysqli_query($conn, $result_usuarios);
            while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
                //echo "N.: " . $row_usuario['id'] . "<br>";
                echo "Autor: " . $row_usuario['autor'] . "<br>";
                echo "Assunto: " . $row_usuario['assunto'] . "<br>";
                echo "Status: " . $row_usuario['anotacao'] . "<br> <hr>";
            }

            // Paginação - Somar a quantidade de usuários
            $result_pg = "SELECT COUNT(id) AS num_result FROM projetos_camara";
            $resultado_pg = mysqli_query($conn, $result_pg);
            $row_pg = mysqli_fetch_assoc($resultado_pg);
            // echo $row_pg['num_result']; - mostra a quantidade de linhas da tabela
            // Quantidade de páginas
            $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
            
            // Limitar os links antes e depois
            $max_links = 2;
            echo "<a href ='listar.php?pagina=1&pesquisa-camara=$select_ordem'> Primeira </a>";
            for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant ++){
                if($pag_ant>=1){
                    echo "<a href ='listar.php?pagina=$pag_ant&pesquisa-camara=$select_ordem'>  $pag_ant  </a>";
                }
                
            }
            echo "$pagina";

            for($pag_post = $pagina + 1; $pag_post <= $pagina + $max_links; $pag_post++){
                if($pag_post<=$quantidade_pg){
                    echo "<a href ='listar.php?pagina=$pag_post&pesquisa-camara=$select_ordem'>  $pag_post  </a>";
                }
            }

            echo "<a href ='listar.php?pagina=$quantidade_pg&pesquisa-camara=$select_ordem'>  Ultima  </a>";
            ?>
            <br>
            <a href="camara.php">Voltar</a>
            <br>
    </body>
</html>
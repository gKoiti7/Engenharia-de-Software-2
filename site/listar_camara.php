<?php
include('conexao.php');
require_once 'Funcionario.php';
require_once 'Servidor.php';
require_once 'Legislativo.php';

$pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_NUMBER_INT);
$qnt_result_pg = filter_input(INPUT_POST, 'qnt_result_pg', FILTER_SANITIZE_NUMBER_INT);
$ordem = filter_input(INPUT_POST, 'ordem', FILTER_SANITIZE_NUMBER_INT);

//calcular o início da visualização
$inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

//consultar no BD

if($ordem == 0){
    $result_usuario = "SELECT * FROM projetos ORDER BY Nome ASC LIMIT $inicio, $qnt_result_pg";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
}elseif($ordem == 1){
    $result_usuario = "SELECT * FROM projetos ORDER BY id ASC LIMIT $inicio, $qnt_result_pg";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
}

//Verificar se encontrou resultado na tabela
if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
    ?>
    <table class="table table-striped table-bordered table-hover ">
        <thead>
            <tr>
                <th>Num/Ano</th>
                <th>Autor</th>
                <th>Assunto</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php
        while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){

            $servidor = new Legislativo();
            $servidor->setProjeto($row_usuario['Projeto']);
            $serv = new Servidor();
            $serv->setNome($row_usuario['Nome']);
            $servidor->setServidor($serv);
            $servidor->setAssunto($row_usuario['Assunto']);
            $servidor->setAnotacao($row_usuario['Anotacao']);

            echo "<tr>";
                echo "<th>" . $servidor->getProjeto() . "</th>";
                echo "<th>" . $servidor->getServidor()->getNome() . "</th>";
                echo "<th>" . $servidor->getAssunto() . "</th>";
                echo "<th>" . $servidor->getAnotacao() . "</th>";
            echo "</tr>";        
        }
    ?>
        </tbody>
    </table>
<?php
//paginação - somar a quantidade de usuários
$result_pg = "SELECT COUNT(id) AS num_result FROM projetos";
$resultado_pg = mysqli_query($conn, $result_pg);
$row_pg = mysqli_fetch_assoc($resultado_pg);

//Quantidade de páginas
$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg); //ceil = arredonda valores

//limitar os links antes/depois
$max_links = 2;

echo '<nav aria-label="...">';
echo '<ul class="pagination">';
echo '<li class="page-item">';
echo "<span class='page-link'><a href='#' onclick='listar_usuario(1, $qnt_result_pg, $ordem)'> Primeira </a></span>";
echo '</li>';

for($pag_ant = $pagina -$max_links; $pag_ant <= $pagina -1; $pag_ant++){
    if($pag_ant >= 1){
        echo "<li class='page-item'><a class='page-link' href='#' onclick='listar_usuario($pag_ant, $qnt_result_pg, $ordem)'> $pag_ant </a></li>";
    }    
}

echo '<li class="page-item active" aria-current="page">';
echo '<span class="page-link">';
echo " $pagina ";
echo '</span>';
echo '</li>';

for($pag_dep = $pagina +1; $pag_dep <= $pagina +$max_links; $pag_dep++){
    if($pag_dep <= $quantidade_pg){
        echo "<li class='page-item'><a class='page-link' href='#' onclick='listar_usuario($pag_dep, $qnt_result_pg, $ordem)'> $pag_dep </a></li>";
    }    
}

echo '<li class="page-item">';
echo "<span class='page-link'><a href='#' onclick='listar_usuario($quantidade_pg, $qnt_result_pg, $ordem)'> Ultima </a></span>";
echo '</li>';
echo '</ul>';
echo '</nav>';

}else{
    echo "<div class='alert alert-danger' role='alert'> Nenhum usuário encontrado </div>";
}   
?>
    <input class="btn btn-outline-succes mb-3" type="button" onclick="location.href='pesquisa_camara.php';" value="Voltar" />

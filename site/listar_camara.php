<?php
    require 'Conexao.php';
    require 'Camara.php';    

    $pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_NUMBER_INT);
    $qnt_result_pg = filter_input(INPUT_POST, 'qnt_result_pg', FILTER_SANITIZE_NUMBER_INT);
    $ordem = filter_input(INPUT_POST, 'ordem', FILTER_SANITIZE_NUMBER_INT);

    //calcular o início da visualização
    $inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

    //consultar no BD
    if($ordem == 0){
        $servidor = new Camara();
        $dados = $servidor->listar('autor', 'ASC', $inicio, $qnt_result_pg);
    }elseif($ordem == 1){
        $servidor = new Camara();
        $dados = $servidor->listar('autor', 'DESC', $inicio, $qnt_result_pg);
    }elseif($ordem == 2){
        $servidor = new Camara();
        $dados = $servidor->listar('id', 'ASC', $inicio, $qnt_result_pg);
    }elseif($ordem == 3){
        $servidor = new Camara();
        $dados = $servidor->listar('id', 'DESC', $inicio, $qnt_result_pg);
    }

?>
    <table class="table table-striped table-bordered table-hover ">
        <thead>
            <tr>
                <th>Nº/Ano</th>
                <th>Nome</th>
                <th>Assunto</th>
                <th>Anotação</th>
            </tr>
        </thead>
        <tbody>
    <?php
        foreach($dados as $row_servidor){ 
            extract($row_servidor);
            echo '<tr>';
                echo '<th>' . $num . '</th>';
                echo '<th>' . $autor . '</th>';
                echo '<th>' . $assunto . '</th>';
                echo '<th>' . $anotacao . '</th>';
        }
    ?>
        </tbody>
    </table>
<?php
    //paginação - somar a quantidade de usuários
    $row_pg = $servidor->countQuery();

    //Quantidade de páginas
    $quantidade_pg = ceil($row_pg / $qnt_result_pg); //ceil = arredonda valores

    //limitar os links antes/depois
    $max_links = 5;

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
                echo "<span class='page-link'><a href='#' onclick='listar_usuario($quantidade_pg, $qnt_result_pg, $ordem)'> Última </a></span>";
            echo '</li>';
        echo '</ul>';
    echo '</nav>';
?>
   
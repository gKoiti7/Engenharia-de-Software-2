<!DOCTYPE html>
<html lang="pt-br">

    <?php include('templates/header.php'); ?>
    
        <div class="container pt-3">
            <h2>Projetos de Lei</h2>
            <span id="conteudo"></span>
        </div>

        <?php $result = $_POST['pesquisa-camara'];?>

        <script>
            var qnt_result_pg = 10; //qtdad de registros por página
            var pagina = 1; //pagina inicial
            var ordem = "<?php echo $result; ?>";

            $(document).ready(function(){
                listar_usuario(pagina, qnt_result_pg, ordem);
            });

            function listar_usuario(pagina, qnt_resut_pg, ordem){
                var dados = {
                    pagina: pagina,
                    qnt_result_pg: qnt_result_pg,
                    ordem: ordem
                }

                $.post('listar_usuario.php', dados, function(retorna){
                    $("#conteudo").html(retorna);
                });
            }
        </script>

    <?php include('templates/footer.php'); ?>

</html>
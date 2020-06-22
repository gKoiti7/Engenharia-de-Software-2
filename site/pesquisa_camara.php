<!DOCTYPE html>
<html lang="pt-br">

    <?php include('templates/header.php'); ?>
    

    <div class="background-branco">
        <div class="container pt-4">
            <div>
                <h1>De Olho na Câmara</h1>
                <p>Consulte os projetos de lei :</p>
            </div>

            <form method="post" action="listar.php" id="myForm">
                <p>Pesquisar por:</p>
                <p>- Autor:</p>
                <div class="form-check ml-5">
                    <input class="form-check-input" type="radio" name="pesquisa" id="ascendente" value="0" checked>
                    <label class="form-check-label" for="pesquisaServidor1">
                        Nome (A-Z)
                    </label>
                </div>
                <div class="form-check ml-5">
                    <input class="form-check-input" type="radio" name="pesquisa" id="descendente" value="1">
                    <label class="form-check-label" for="pesquisaServidor2">
                        Nome (Z-A)
                    </label>
                </div>
                <br>
                <p>- Número do Projeto:</p>
                <div class="form-check ml-5">
                    <input class="form-check-input" type="radio" name="pesquisa" id="ascendente" value="2">
                    <label class="form-check-label" for="pesquisaServidor1">
                        Mais Recente
                    </label>
                </div>
                <div class="form-check ml-5">
                    <input class="form-check-input" type="radio" name="pesquisa" id="descendente" value="3">
                    <label class="form-check-label" for="pesquisaServidor2">
                        Mais Antigo
                    </label>
                </div>

                <input type="hidden" name="pagina" value="0">

                <div class="form-group row">
                    <div class="col-sm-10 my-4">
                        <input type="submit" class="btn btn-outline-succes ml-5" value="Pesquisar">
                    </div>
                </div>
            </form>    
        </div>
    </div>

    <?php include('templates/footer.php'); ?>

</html>
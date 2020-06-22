<!DOCTYPE html>
<html lang="pt-br">

    <?php include('templates/header.php'); ?>

    <div class="background-branco">
        <div class="container pt-4">
            <div>
                <h1>Servidores Públicos</h1>
                <p>Consulte dados referentes a folha de pagamento dos servidores municipais.</p>
            </div>
            <form method="post" action="listar.php" id="myForm">
                <p>Pesquisar por:<p>
                <div class="form-check ml-5">
                    <input class="form-check-input" type="radio" name="pesquisa" id="pesquisa-nome" value="0" checked>
                    <label class="form-check-label" for="pesquisaServidor1">
                        Nome (A-Z)
                    </label>
                </div>
                <div class="form-check ml-5">
                    <input class="form-check-input" type="radio" name="pesquisa" id="pesquisa-cargo" value="1">
                    <label class="form-check-label" for="pesquisaServidor2">
                        Cargo (A-Z)
                    </label>
                </div>
                <div class="form-check ml-5">
                    <input class="form-check-input" type="radio" name="pesquisa" id="pesquisa-salario" value="2">
                    <label class="form-check-label" for="pesquisaServidor3">
                        Salário
                    </label>                    
                </div>

                <input type="hidden" name="pagina" value="1">

                <div class="form-group row">
                    <div class="col-sm-10 my-4">
                        <button type="submit" class="btn btn-outline-succes ml-5">Pesquisar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php include('templates/footer.php'); ?>

</html>
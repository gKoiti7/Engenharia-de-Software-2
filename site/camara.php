<?php

?>

<!DOCTYPE html>
<html lang="pt-br">

    <?php include('templates/header.php'); ?>
    

    <div class="background-branco">
        <div class="container pt-4">
            <div>
                <h1>De Olho na Câmara</h1>
                <p>Consulte os projetos de lei :</p>
            </div>
            <div class="pesquisa">
                <p>Pesquisar por:<p>
                <div class="form-check ml-5">
                    <input class="form-check-input" type="radio" name="pesquisaServidor" id="pesquisaServidor1" value="option1" checked>
                    <label class="form-check-label" for="pesquisaServidor1">
                        Autor
                    </label>
                </div>
                <div class="form-check ml-5">
                    <input class="form-check-input" type="radio" name="pesquisaServidor" id="pesquisaServidor2" value="option2">
                    <label class="form-check-label" for="pesquisaServidor2">
                        Assunto
                    </label>
                </div>
                <div class="form-check ml-5">
                    <input class="form-check-input" type="radio" name="pesquisaServidor" id="pesquisaServidor3" value="option3">
                    <label class="form-check-label" for="pesquisaServidor3">
                        Anotação
                    </label>                    
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 my-4">
                        <button type="submit" class="btn btn-outline-succes ml-5">Pesquisar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('templates/footer.php'); ?>

</html>
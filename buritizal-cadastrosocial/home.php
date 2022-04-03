<?php

require_once 'menu.php';

?>

<!DOCTYPE html>
<html>

<head>
</head>

<style>
    .bg-imagem {
        background-image: url('imagens/buritizal-back.jpg');
        height: 100vh;
        background-size: cover;
        background-color: rgba(0, 0, 0, 1);
    }
</style>

<body>

    <main>
        <div class="bg-imagem" alt="Imagem da praça e igreja da cidade de Buritizal/SP">
            <div class="position-relative container vh-100 vw-100">
                <div class="position-absolute rounded-pill p-4 top-50 start-50 translate-middle text-center text-light bg-dark bg-gradient"
                    style="--bs-bg-opacity: .5;">
                    <h1 class="display-3"><strong>Cadastro
                        Social</strong></h1>
                    <p>Prefeitura da Cidade de Buritizal/SP</p>
                    <p class="text-warning">Protótipo Versão 1.0</p>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <p class="text-center p-1"><i>Desenvolvido por <span class="text-danger">drummerabud</span> - code on drums 2021</i></p>
    </footer>
</body>

</html>
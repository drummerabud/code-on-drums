<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="description" content="Cadastro social da cidade de Buritizal/SP">
  <meta lang="pt-BR">
  <meta name="author" content="Felipe Abud">
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
  <title>Buritizal - Cadastro Social</title>

  <!-- CSS Bootstrap em CDN -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

  <?php

session_start(); //Só vai acessar quem estiver logado.

$usuario = $_SESSION['usuario']; //sessão usuário logado
$permissao = $_SESSION['permissao']; 

if(!isset($_SESSION['usuario'])){ //Se não existir o usuário logado, ele volta para a página de login
  header('Location: index.php');
}

$raiz = 'buritizal-cadastrosocial';

?>
  <nav class="navbar navbar-light bg-light fixed-top position-relative">
    <div class="container-fluid">

      <a class="navbar-brand" href="#">Buritizal - Cadastro Social</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
        aria-controls="offcanvasNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="pe-3 position-relative text-center">
          <img src="/<?php echo $raiz?>/imagens/buritizal.png" class="w-50" alt="Brasão da cidade de buritizal">
        </div>

        <div class="offcanvas-body position-relative text-center mt-5">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/<?php echo $raiz?>/home.php">Início</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                Logradouro
              </a>
              <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
                <li><a class="dropdown-item" href="/<?php echo $raiz?>/logradouro/cadastrar_logradouro.php">Cadastrar</a></li>
                <li><a class="dropdown-item" href="/<?php echo $raiz?>/logradouro/listar_logradouro.php">Lista</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                Pessoas
              </a>
              <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
                <li><a class="dropdown-item" href="/<?php echo $raiz?>/pessoas/cadastrar_pessoas.php">Cadastrar</a></li>
                <li><a class="dropdown-item" href="/<?php echo $raiz?>/pessoas/listar_pessoas.php">Lista</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="/<?php echo $raiz?>/pessoas/familias.php">Famílias</a></li>
              </ul>
            </li>
            <li class="nav-item mt-5">
              <p>Bem-Vindo
                <?php echo ucfirst($usuario) ?><span><a class="nav-link active text-danger"
                    href="/<?php echo $raiz?>/_logout.php">Sair</a></span>
              </p>

            </li>

          </ul>
        </div>
      </div>
    </div>

  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

</body>

</html>
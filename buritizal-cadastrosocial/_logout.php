<?php
session_start();

if(isset($_SESSION['usuario'])){
    // se você possui algum cookie relacionado com o login deve ser removido
    session_destroy();

    header('Location: index.php');
    exit();
}

?>
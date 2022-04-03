<?php

require_once '../conexao.php';

$id_logradouro = $_GET['id_logradouro'];

$sql = "DELETE FROM `logradouro` WHERE id_logradouro = $id_logradouro";
$deletar = mysqli_query($conexao,$sql);

Header("Location: listar_logradouro.php");

?>


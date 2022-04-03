<?php

require_once '../conexao.php';

//Postar a atualização

$id_logradouro = $_POST['id_logradouro'];
$logradouro = $_POST['logradouro'];
$bairro = $_POST['bairro'];
$cep = $_POST['cep'];
$tipo = $_POST['tipo'];
$obs = $_POST['obs'];

$sql = "UPDATE logradouro SET logradouro = '$logradouro', bairro = '$bairro', cep = '$cep', tipo= '$tipo', obs = '$obs' WHERE id_logradouro = $id_logradouro";

$atualizar = mysqli_query($conexao, $sql);

header("Location: listar_logradouro.php");

?>
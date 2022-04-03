<?php

require_once '../conexao.php';

$id_pessoa = $_GET['id_pessoa'];

$sql = "DELETE FROM `pessoas` WHERE id_pessoa = $id_pessoa";
$deletar = mysqli_query($conexao,$sql);

Header("Location: listar_pessoas.php");

?>

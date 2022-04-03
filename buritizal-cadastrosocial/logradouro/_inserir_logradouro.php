<?php

require_once '../conexao.php';;

//o "name" que utiliza no formulario de inserir logradouros será a variável do POST

$logradouro = $_POST['logradouro']; //recebe o valor do atributo
$bairro = $_POST['bairro'];
$cep = $_POST['cep'];
$tipo = $_POST['tipo'];
$obs = $_POST['obs'];

if (empty($bairro)){

 $bairro ="Centro";

}

if (empty($cep)){

 $cep ="14570-000";

}

$sql ="INSERT INTO `logradouro`(`logradouro`, `bairro`, `cep`, `tipo`, `obs`) VALUES ('$logradouro', '$bairro', '$cep', '$tipo', '$obs')";

$inserir =  mysqli_query($conexao, $sql);

Header("Location: listar_logradouro.php");

?>



<?php

require_once '../conexao.php';

//o "name" que utiliza no formulario de inserir pessoas será a variável do POST

$nome = $_POST['nome']; //recebe o valor do atributo
$sobrenome = $_POST['sobrenome'];
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];
$logradouro = $_POST['logradouro'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$frentetrabalho = $_POST['frentetrabalho'];
$bolsafamilia = $_POST['bolsafamilia'];
$luzagua = $_POST['luzagua'];
$outros = $_POST['outros'];
$obs = $_POST['obs'];

$endereco = $logradouro.", ".$numero; 


$sql = "INSERT INTO `pessoas`(`nome`, `sobrenome`, `cpf`, `rg`, `logradouro`, `numero`, `endereco`, `complemento`, `frentetrabalho`, `bolsafamilia`, `luzagua`, `outros`, `obspessoa`) VALUES ('$nome','$sobrenome','$cpf','$rg','$logradouro','$numero','$endereco', '$complemento','$frentetrabalho','$bolsafamilia','$luzagua','$outros','$obs')";
$inserir =  mysqli_query($conexao, $sql);

header("Location: listar_pessoas.php") //Ele faz a ação e volta automaticamente para página desejada

?>
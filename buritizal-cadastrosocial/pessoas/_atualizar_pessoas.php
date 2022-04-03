<?php

require_once '../conexao.php';

$id_pessoa = $_POST['id_pessoa'];

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
$obspessoa = $_POST['obspessoa'];

$sql="UPDATE `pessoas` SET `nome`='$nome',`sobrenome`='$sobrenome',`cpf`='$cpf',`rg`='$rg',`logradouro`='$logradouro',`numero`='$numero',`complemento`='$complemento',`frentetrabalho`='$frentetrabalho',`bolsafamilia`='$bolsafamilia',`luzagua`='$luzagua',`outros`='$outros',`obspessoa`='$obspessoa' WHERE id_pessoa = $id_pessoa";

$inserir =  mysqli_query($conexao, $sql);

header("Location: listar_pessoas.php")


?>
<?php

session_start();
include 'conexao.php';
 
if(empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('Location: index.php');
	exit();
}
 
$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
 
$query = "SELECT usuario, permissao FROM login WHERE usuario = '{$usuario}' and senha = md5('{$senha}')";
$result = mysqli_query($conexao, $query);
$array = mysqli_fetch_array($result);

$permissao = $array['permissao'];

$row = mysqli_num_rows($result);
 
if($row == 1) {
	
	$_SESSION['usuario'] = $usuario;
	$_SESSION['permissao'] = $permissao;
	header('Location: home.php');
	exit();
	
} else {
	
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}

?>
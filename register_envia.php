<?php
session_start();
$nome = $_POST["nome"];
$senha = md5($_POST["senha"]);
$email = $_POST["email"];
$perfil = 2;
$status = 1;
$data=date("y/m/d");

require_once ("bd/bd_usuario.php");
$dados = buscaUsuario($email);

if($dados != 0){
	$_SESSION['texto_erro_register'] = 'Este email já existe cadastrado no sistema!';
	$_SESSION['nome'] = $nome;
	header ("Location:register.php");
}else{
	$dados = cadastraUsuario($nome,$senha,$email,$perfil,$status,$data);
	if($dados == 1){
		$_SESSION['texto_sucesso_register'] = 'Dados adicionados com sucesso.';
		unset($_SESSION['texto_erro_register']);
		header ("Location:index.php");
	}else{
		$_SESSION['texto_erro_register'] = 'O dados não foram adicionados no sistema!';
		$_SESSION['nome'] = $nome;
		header ("Location:register.php");
	}
	
}

?>
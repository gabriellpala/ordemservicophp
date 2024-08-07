<?php
session_start();

if ((empty($_POST['email'])) OR (empty($_POST['senha'])) OR (empty($_POST['perfil']))){
    header("Location: index.php"); 
}
else{

	$email = $_POST["email"];
	$senha = $_POST["senha"];
	$perfil = $_POST["perfil"];

	if ($perfil == 1) {
		require_once ("bd/bd_usuario.php");
		$dados = checaUsuario($email,$senha);
	}elseif($perfil == 2){
		require_once ("bd/bd_cliente.php");
		$dados = checaCliente($email,$senha);
	}else{
		require_once ("bd/bd_terceirizado.php");
		$dados = checaTerceirizado($email,$senha);
	}

	if($dados == "") {
		$_SESSION['texto_erro_login'] = 'Email, Senha ou Perfil Inválido!';
	    header("Location:index.php");
	}
	elseif($dados['status'] != 1){
		$_SESSION['texto_erro_login'] = 'Acesso bloqueado ao sistema!';
	    header("Location:index.php");
	}
	else {
	    // Salva os dados encontrados na sessão
	    $_SESSION['cod_usu'] = $dados['cod'];
		$_SESSION['nome_usu'] = $dados['nome'];
		$_SESSION['perfil'] = $dados['perfil'];
		$_SESSION['status'] = $dados['status'];
	    header("Location:home.php");
	}
	die();
}


?>
<?php
require_once("valida_session.php");
require_once ("bd/bd_usuario.php");
	     
$codigo = $_POST["cod"];
$status = $_POST["status"];
$data=date("y/m/d");

$dados = editarUsuario($codigo,$status,$data);
if ($dados == 1){
	$_SESSION['texto_sucesso'] = 'Os dados do usuário foram alterados no sistema.';
	header ("Location:usuario.php");
}else{
	$_SESSION['texto_erro'] = 'Os dados do usuário não foram alterados no sistema!';
	header ("Location:usuario.php");
}

		
?>
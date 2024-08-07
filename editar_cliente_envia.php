<?php
require_once("valida_session.php");
require_once ("bd/bd_cliente.php");
	     
$codigo = $_POST["cod"];
$status = $_POST["status"];
$data=date("y/m/d");

$dados = editarCliente($codigo,$status,$data);

if ($dados == 1){
	$_SESSION['texto_sucesso'] = 'Os dados do cliente foram alterados no sistema.';
	header ("Location:cliente.php");
}else{
	$_SESSION['texto_erro'] = 'Os dados do cliente não foram alterados no sistema!';
	header ("Location:cliente.php");
}

		
?>
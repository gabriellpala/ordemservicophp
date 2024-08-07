<?php
require_once("valida_session.php");
require_once ("bd/bd_terceirizado.php");
	     
$codigo = $_POST["cod"];
$status = $_POST["status"];
$data=date("y/m/d");

$dados = editarTerceirizado($codigo,$status,$data);

if ($dados == 1){
	$_SESSION['texto_sucesso'] = 'Os dados do terceirizado foram alterados no sistema.';
	header ("Location:terceirizado.php");
}else{
	$_SESSION['texto_erro'] = 'Os dados do terceirizado não foram alterados no sistema!';
	header ("Location:terceirizado.php");
}

		
?>
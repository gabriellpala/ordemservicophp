<?php 
	require_once("valida_session.php");
	require_once ("bd/bd_ordem.php");

	$codigo = $_GET['cod'];

	$dados = removeOrdem($codigo);

	if($dados == 0){
		$_SESSION['texto_erro'] = 'Os dados da ordem se serviço não foram excluidos do sistema!';
		header ("Location:ordem.php");
	}else{
		$_SESSION['texto_sucesso'] = 'Os dados da ordem se serviço foram excluidos do sistema.';
		header ("Location:ordem.php");
	}

?>
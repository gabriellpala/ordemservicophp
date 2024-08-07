<?php 
	require_once("valida_session.php");
	require_once ("bd/bd_servico.php");

	$codigo = $_GET['cod'];

	$dados = removeServico($codigo);

	if($dados == 0){
		$_SESSION['texto_erro'] = 'Os dados do serviço não foram excluidos do sistema!';
		header ("Location:servico.php");
	}else{
		$_SESSION['texto_sucesso'] = 'Os dados do serviço foram excluidos do sistema.';
		header ("Location:servico.php");
	}

?>
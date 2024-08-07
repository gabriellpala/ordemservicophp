<?php
session_start();
$cod_cliente = $_POST["cod_cliente"];
$cod_servico = $_POST["cod_servico"];
$cod_terceirizado = $_POST["cod_terceirizado"];
$data_servico = $_POST["data_servico"];
$status = 1;
$data=date("y/m/d");

require_once ("bd/bd_ordem.php");

$dados = cadastraOrdem($cod_cliente,$cod_servico,$cod_terceirizado,$data_servico,$status,$data);
if($dados == 1){
	$_SESSION['texto_sucesso'] = 'Ordem de serviço aberta com sucesso.';
	unset($_SESSION['texto_erro']);
	header ("Location:resumo_ordem.php");
}else{
	$_SESSION['texto_erro'] = 'O dados não foram adicionados no sistema!';
	header ("Location:cad_ordem.php");
}

?>
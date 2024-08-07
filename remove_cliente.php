<?php
require_once("valida_session.php");
require_once("bd/bd_cliente.php");

$codigo = $_GET['cod'];

if ($_SESSION['cod_usu'] != $codigo) {
    $dados = removeCliente($codigo);

    if ($dados === 'FOREIGN_KEY_CONSTRAINT') {
        $_SESSION['texto_erro'] = 'O cliente não pode ser excluído do sistema pois possui ordem de serviço!';
        header("Location:cliente.php");
    } elseif ($dados == 0) {
        $_SESSION['texto_erro'] = 'Os dados do cliente não foram excluídos do sistema!';
        header("Location:cliente.php");
    } else {
        $_SESSION['texto_sucesso'] = 'Os dados do cliente foram excluídos do sistema.';
        header("Location:cliente.php");
    }
} else {
    $_SESSION['texto_erro'] = 'O cliente não pode ser excluído do sistema, pois está logado!';
    header("Location:cliente.php");
}
?>
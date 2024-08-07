<?php
require_once("valida_session.php");
require_once("bd/bd_terceirizado.php");

$codigo = $_GET['cod'];

if ($_SESSION['cod_usu'] != $codigo) {
    $dados = removeTerceirizado($codigo);

    if ($dados === 'FOREIGN_KEY_CONSTRAINT') {
        $_SESSION['texto_erro'] = 'O terceirizado não pode ser excluído do sistema pois possui ordem de serviço!';
        header("Location:terceirizado.php");
    } elseif ($dados == 0) {
        $_SESSION['texto_erro'] = 'Os dados do terceirizado não foram excluídos do sistema!';
        header("Location:terceirizado.php");
    } else {
        $_SESSION['texto_sucesso'] = 'Os dados do terceirizado foram excluídos do sistema.';
        header("Location:terceirizado.php");
    }
} else {
    $_SESSION['texto_erro'] = 'O terceirizado não pode ser excluído do sistema, pois está logado!';
    header("Location:terceirizado.php");
}
?>
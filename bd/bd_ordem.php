<?php

require_once("conecta_bd.php");

function listaOrdem()
{
    $conexao = conecta_bd();

    $ordens = array();

    $query = "SELECT o.cod, c.nome AS nome_cliente, t.nome AS nome_terceirizado, s.nome AS nome_servico, s.valor AS valor_servico, o.data_servico, o.status
              FROM ordem o
              JOIN cliente c ON o.cod_cliente = c.cod
              JOIN terceirizado t ON o.cod_terceirizado = t.cod
              JOIN servico s ON o.cod_servico = s.cod
              ORDER BY o.data_servico DESC";

    $resultado = mysqli_query($conexao, $query);
    while ($dados = mysqli_fetch_assoc($resultado)) {
        array_push($ordens, $dados);
    }

    mysqli_close($conexao);
    return $ordens;
}

function buscaOrdem($codigo)
{
    $conexao = conecta_bd();

    $query = "SELECT * FROM ordem WHERE cod = '$codigo'";
    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_array($resultado);

    mysqli_close($conexao);
    return $dados;
}

function cadastraOrdem($cod_cliente, $cod_servico, $cod_terceirizado, $data_servico, $status, $data)
{
    $conexao = conecta_bd();

    $checkQuery = "SELECT cod FROM servico WHERE cod = '$cod_servico'";
    $resultado = mysqli_query($conexao, $checkQuery);

    if (mysqli_num_rows($resultado) > 0) {
        $query = "INSERT INTO ordem (cod_cliente, cod_terceirizado, cod_servico, data_servico, status, data) VALUES ('$cod_cliente', '$cod_terceirizado', '$cod_servico', '$data_servico', '$status', '$data')";
        $resultado = mysqli_query($conexao, $query);
        $affectedRows = mysqli_affected_rows($conexao);
    } else {
        $affectedRows = "Error: cod_servico does not exist in servico table";
    }

    mysqli_close($conexao);
    return $affectedRows;
}

function buscaOrdemadd()
{
    $conexao = conecta_bd();

    $query = "SELECT c.nome AS nome_cliente, t.nome AS nome_terceirizado, s.nome AS nome_servico, s.valor AS valor_servico, o.data_servico, o.status
              FROM ordem o
              JOIN cliente c ON o.cod_cliente = c.cod
              JOIN terceirizado t ON o.cod_terceirizado = t.cod
              JOIN servico s ON o.cod_servico = s.cod
              ORDER BY o.data_servico DESC";

    $resultado = mysqli_query($conexao, $query);
    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $dados = mysqli_fetch_assoc($resultado);
    } else {
        $dados = [];
    }

    mysqli_close($conexao);

    return $dados;
}

function removeOrdem($codigo)
{
    $conexao = conecta_bd();
    $query = "DELETE FROM ordem WHERE cod = '$codigo'";
    mysqli_query($conexao, $query);
    $affectedRows = mysqli_affected_rows($conexao);

    mysqli_close($conexao);
    return $affectedRows;
}

function buscaOrdemeditar($codigo)
{
    $conexao = conecta_bd();

    $query = "SELECT o.cod, c.nome AS nome_cliente, c.cod AS cod_cliente, t.nome AS nome_terceirizado, s.nome AS nome_servico, o.data_servico, o.status, o.cod_terceirizado, o.cod_servico
              FROM ordem o
              JOIN cliente c ON o.cod_cliente = c.cod
              JOIN terceirizado t ON o.cod_terceirizado = t.cod
              JOIN servico s ON o.cod_servico = s.cod
              WHERE o.cod = '$codigo'";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_assoc($resultado);

    mysqli_close($conexao);
    return $dados;
}

function editarOrdem($cod, $cod_cliente, $cod_terceirizado, $cod_servico, $data_servico, $status, $data)
{
    $conexao = conecta_bd();

    $checkQuery = "SELECT cod FROM servico WHERE cod = '$cod_servico'";
    $resultado = mysqli_query($conexao, $checkQuery);
    $dados = mysqli_num_rows($resultado);
    if ($dados == 1) {
        $query = "UPDATE ordem
                  SET cod_cliente = '$cod_cliente', cod_terceirizado = '$cod_terceirizado', cod_servico = '$cod_servico', data_servico = '$data_servico', status = '$status', data = '$data'
                  WHERE cod = '$cod'";
        $resultado = mysqli_query($conexao, $query);
        $dados = mysqli_affected_rows($conexao);
        mysqli_close($conexao);
        return $dados;
    }
}

function consultaStatusUsuario($status)
{
    $conexao = conecta_bd();
    $query = "SELECT COUNT(*) as total FROM ordem WHERE status = '$status'";
    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_assoc($resultado);

    mysqli_close($conexao);
    return $dados ? $dados : ['total' => 0];
}

function consultaStatusCliente($codigo, $status)
{
    $conexao = conecta_bd();
    $query = "SELECT COUNT(*) as total FROM ordem WHERE cod_cliente = '$codigo' AND status = '$status'";
    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_assoc($resultado);

    mysqli_close($conexao);
    return $dados ? $dados : ['total' => 0];
}

function consultaStatusTerceirizado($codigo, $status)
{
    $conexao = conecta_bd();
    $query = "SELECT COUNT(*) as total FROM ordem WHERE cod_terceirizado = '$codigo' AND status = '$status'";
    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_assoc($resultado);

    mysqli_close($conexao);
    return $dados ? $dados : ['total' => 0];
}

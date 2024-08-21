<?php

require_once("conecta_bd.php");

function conecta()
{
    $conexao = conecta_bd();
    if (!$conexao) {
        die('Erro ao conectar: ' . mysqli_connect_error());
    }
    return $conexao;
}

// Função para cadastrar um contato
function cadastraContato($nome, $email, $telefone, $mensagem)
{
    $conexao = conecta();
    $query = "INSERT INTO contatos (nome, email, telefone, mensagem) VALUES (?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conexao, $query)) {
        mysqli_stmt_bind_param($stmt, "ssss", $nome, $email, $telefone, $mensagem);
        mysqli_stmt_execute($stmt);
        $dados = mysqli_stmt_affected_rows($stmt);
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conexao);

    return $dados;
}

// Função para listar todos os contatos
function listaContatos()
{
    $conexao = conecta();
    $contatos = array();
    $query = "SELECT * FROM contatos ORDER BY data_criacao DESC";

    if ($stmt = mysqli_prepare($conexao, $query)) {
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        while ($dados = mysqli_fetch_assoc($resultado)) {
            $contatos[] = $dados;
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conexao);

    return $contatos;
}

// Função para buscar um contato específico
function buscaContato($id)
{
    $conexao = conecta();
    $dados = null;
    $query = "SELECT * FROM contatos WHERE id = ?";

    if ($stmt = mysqli_prepare($conexao, $query)) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        $dados = mysqli_fetch_assoc($resultado);
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conexao);

    return $dados;
}

// Função para remover um contato
function removeContato($id)
{
    $conexao = conecta();
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    mysqli_begin_transaction($conexao);

    try {
        $query = "DELETE FROM contatos WHERE id = ?";
        if ($stmt = mysqli_prepare($conexao, $query)) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $dados = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
        }
        mysqli_commit($conexao);
    } catch (mysqli_sql_exception $e) {
        mysqli_rollback($conexao);
        throw $e;
    } finally {
        mysqli_close($conexao);
    }

    return $dados;
}


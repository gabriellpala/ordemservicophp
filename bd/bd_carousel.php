<?php

require_once("conecta_bd.php");

function conecta() {
    $conexao = conecta_bd();
    if (!$conexao) {
        die('Erro ao conectar: ' . mysqli_connect_error());
    }
    return $conexao;
}

function listaCarousel() {
    $conexao = conecta();
    $carousels = array();
    $query = "SELECT * FROM carousel";

    if ($stmt = mysqli_prepare($conexao, $query)) {
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        while ($dados = mysqli_fetch_assoc($resultado)) {
            $carousels[] = $dados;
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conexao);

    return $carousels;
}

function cadastraCarousel($nome, $src, $alt) {
    $conexao = conecta();
    $query = "INSERT INTO carousel (name, src, alt) VALUES (?, ?, ?)";

    if ($stmt = mysqli_prepare($conexao, $query)) {
        mysqli_stmt_bind_param($stmt, "sss", $nome, $src, $alt);
        mysqli_stmt_execute($stmt);
        $dados = mysqli_stmt_affected_rows($stmt);
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conexao);

    return $dados;
}

function removeCarousel($id) {
    $conexao = conecta();
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    mysqli_begin_transaction($conexao);

    try {
        $query = "DELETE FROM carousel WHERE id = ?";
        if ($stmt = mysqli_prepare($conexao, $query)) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $dados = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
        }
        mysqli_commit($conexao);
    } catch (mysqli_sql_exception $e) {
        mysqli_rollback($conexao);

        if ($e->getCode() == 1451) {
            $dados = 'FOREIGN_KEY_CONSTRAINT';
        } else {
            throw $e;
        }
    } finally {
        mysqli_close($conexao);
    }

    return $dados;
}

function buscaCarousel($id) {
    $conexao = conecta();
    $dados = null;
    $query = "SELECT * FROM carousel WHERE id = ?";

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

function editarCarousel($id, $nome, $src, $alt) {
    $conexao = conecta();
    $query = "UPDATE carousel SET name = ?, src = ?, alt = ? WHERE id = ?";

    if ($stmt = mysqli_prepare($conexao, $query)) {
        mysqli_stmt_bind_param($stmt, "sssi", $nome, $src, $alt, $id);
        mysqli_stmt_execute($stmt);
        $dados = mysqli_stmt_affected_rows($stmt);
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conexao);

    return $dados;
}

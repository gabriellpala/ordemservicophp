<?php

require_once("conecta_bd.php");

function listaServicos(){
    $conexao = conecta_bd();
    $servicos = array();
    $query = "SELECT * FROM servico ORDER BY nome";
    $resultado = mysqli_query($conexao, $query);
    while ($dados = mysqli_fetch_array($resultado)){
        array_push($servicos, $dados);
    }
    mysqli_close($conexao);
    return $servicos;
}

function buscaServico($email){
    $conexao = conecta_bd();
    $query = "select *
              from servico
              where email='$email'";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_num_rows($resultado);

    return $dados;
}

function cadastraServico($nome,$valor,$data){

    $conexao = conecta_bd();
    $query = "Insert Into servico(nome,valor,data) values('$nome','$valor','$data')";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_affected_rows($conexao);

    return $dados;

}

function removeServico($codigo){
     $conexao = conecta_bd();
    $query = "delete from servico where cod = '$codigo'";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_affected_rows($conexao);

    return $dados;

}

function buscaServicoeditar($codigo){
    $conexao = conecta_bd();
    $query = "select *
              from servico
              where cod='$codigo'";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_array($resultado);

    return $dados;

}

function editarServico($codigo, $nome, $valor){
    $conexao = conecta_bd();
    $query = "update servico set nome = '$nome', valor = '$valor' WHERE cod = '$codigo'";
    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_affected_rows($conexao);
    return $dados;
}

?>
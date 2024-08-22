<?php

require_once("conecta_bd.php");

function checaCliente($email, $senha) {
    $conexao = conecta_bd();
    $senhaMd5 = md5($senha);
    $query = "select *
              from cliente
              where email='$email' and
                    senha='$senhaMd5'";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_array($resultado);

    return $dados;
}

function listaClientes(){
    $conexao = conecta_bd();
    $clientes = array();
    $query = "select *
              from cliente
              order by nome";

    $resultado = mysqli_query($conexao, $query);
    while ($dados = mysqli_fetch_array($resultado)){
        array_push($clientes, $dados);
    }
    return $clientes;

}

function buscaCliente($email) {
    $conexao = conecta_bd();
    $query = "SELECT * FROM cliente WHERE email='$email'";
    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_num_rows($resultado);

    return $dados;
}

function cadastraCliente($nome, $email, $senha, $cep, $endereco, $numero, $bairro, $cidade, $uf, $telefone, $status, $perfil, $data){
    $conexao = conecta_bd();

    $query = "INSERT INTO cliente (nome, email, senha, cep, endereco, numero, bairro, cidade, uf, telefone, status, perfil, data) 
              VALUES ('$nome', '$email', '$senha', '$cep', '$endereco', '$numero', '$bairro', '$cidade', '$uf', '$telefone', '$status', '$perfil', '$data')";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_affected_rows($conexao);

    return $dados;
}

function removeCliente($codigo) {
    $conexao = conecta_bd();

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    mysqli_begin_transaction($conexao);

    try {
        $query = "DELETE FROM cliente WHERE cod = '$codigo'";
        $resultado = mysqli_query($conexao, $query);

        mysqli_commit($conexao);
        $dados = mysqli_affected_rows($conexao);

    } catch (mysqli_sql_exception $e) {
        mysqli_rollback($conexao);

        if ($e->getCode() == 1451) {
            return 'FOREIGN_KEY_CONSTRAINT';
        } else {
            throw $e;
        }
    } finally {
        mysqli_close($conexao);
    }

    return $dados;
}

function buscaClienteeditar($codigo){
    $conexao = conecta_bd();
    $query = "select *
              from cliente
              where cod='$codigo'";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_array($resultado);

    return $dados;

}

function editarCliente($codigo,$status,$data){
    $conexao = conecta_bd();
    $query = "select *
              from cliente
              where cod='$codigo'";

    $resultado = mysqli_query($conexao,$query);
    $dados = mysqli_num_rows($resultado);
    if($dados == 1){
        $query = "update cliente
        set status = '$status', data = '$data'
        where cod = '$codigo'";
        $resultado = mysqli_query($conexao,$query);
        $dados = mysqli_affected_rows($conexao);
        return $dados;
    }

}

function editarSenhaCliente($codigo, $senha) {
    $conexao = conecta_bd();
    $query = "UPDATE cliente SET senha='$senha' WHERE cod='$codigo'";
    mysqli_query($conexao, $query);
    return mysqli_affected_rows($conexao) > 0;
}

function editarPerfilCliente($codigo,$nome,$email,$endereco,$numero,$bairro,$cidade,$telefone,$data){
    $conexao = conecta_bd();

    $query = "Select *
              From cliente
              Where cod = '$codigo'";
                     
    $resultado = mysqli_query($conexao,$query);
    $dados = mysqli_num_rows($resultado);
    if($dados == 3)
    {
        $query = "Update usuario
                  Set nome = '$nome', email = '$email', endereco = '$endereco', numero = '$numero',bairro = '$bairro', cidade = '$cidade', telefone = '$telefone' data = '$data'
                  where cod = '$codigo'";
        $resultado = mysqli_query($conexao,$query);
        $dados = mysqli_affected_rows($conexao);
        return $dados;      
    }

}

?>
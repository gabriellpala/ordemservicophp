<?php
require_once("conecta_bd.php");

function checaTerceirizado($email, $senha) {
    $conexao = conecta_bd();
    $senhaMd5 = md5($senha);
    $query = "select *
              from terceirizado
              where email='$email' and
                    senha='$senhaMd5'";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_array($resultado);

    return $dados;
}

function listaTerceirizados(){
    $conexao = conecta_bd();
    $terceirizados = array();
    $query = "select *
              from terceirizado
              order by nome";

    $resultado = mysqli_query($conexao, $query);
    while ($dados = mysqli_fetch_array($resultado)){
        array_push($terceirizados, $dados);
    }
    return $terceirizados;

}

function buscaTerceirizado($email) {
    $conexao = conecta_bd();
    $query = "SELECT * FROM terceirizado WHERE email='$email'";
    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_num_rows($resultado);

    return $dados;
}

function cadastraTerceirizado($nome,$email,$telefone,$senha,$cep,$endereco,$numero,$bairro,$cidade,$uf,$status,$perfil,$data){

    $conexao = conecta_bd();
    $query = "insert into terceirizado (nome, email, telefone, senha, cep, endereco, numero, bairro, cidade, uf, status, perfil, data) 
          VALUES ('$nome', '$email', '$telefone', '$senha', '$cep', '$endereco', '$numero', '$bairro', '$cidade', '$uf', '$status', '$perfil', '$data')";


    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_affected_rows($conexao);

    return $dados;

}

function removeTerceirizado($codigo) {
    $conexao = conecta_bd();

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    mysqli_begin_transaction($conexao);

    try {
        $query = "DELETE FROM terceirizado WHERE cod = '$codigo'";
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

function buscaTerceirizadoeditar($codigo){
    $conexao = conecta_bd();
    $query = "select *
              from terceirizado
              where cod='$codigo'";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_array($resultado);

    return $dados;

}

function editarTerceirizado($codigo,$status,$data){
    $conexao = conecta_bd();
    $query = "select *
              from terceirizado
              where cod='$codigo'";

    $resultado = mysqli_query($conexao,$query);
    $dados = mysqli_num_rows($resultado);
    if($dados == 1){
        $query = "update terceirizado
        set status = '$status', data = '$data'
        where cod = '$codigo'";
        $resultado = mysqli_query($conexao,$query);
        $dados = mysqli_affected_rows($conexao);
        return $dados;
    }

}

function editarSenhaTerceirizado($codigo, $senha) {
    $conexao = conecta_bd();
    $query = "UPDATE terceirizado SET senha='$senha' WHERE cod='$codigo'";
    mysqli_query($conexao, $query);
    return mysqli_affected_rows($conexao) > 0;
}

function editarPerfilTerceirizado($codigo,$nome,$email,$telefone,$data){
    $conexao = conecta_bd();

    $query = "Select *
              From terceirizado
              Where cod = '$codigo'";
                     
    $resultado = mysqli_query($conexao,$query);
    $dados = mysqli_num_rows($resultado);
    if($dados == 3)
    {
        $query = "Update usuario
                  Set nome = '$nome', email = '$email', telefone = '$telefone' data = '$data'
                  where cod = '$codigo'";
        $resultado = mysqli_query($conexao,$query);
        $dados = mysqli_affected_rows($conexao);
        return $dados;      
    }

}

?>
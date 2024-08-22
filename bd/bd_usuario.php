<?php

require_once("conecta_bd.php");

function checaUsuario($email, $senha) {
    $conexao = conecta_bd();
    $senhaMd5 = md5($senha);
    $query = "select *
              from usuario
              where email='$email' and
                    senha='$senhaMd5'";

    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_array($resultado);

    return $dados;
}

function listaUsuarios(){

    $conexao = conecta_bd();

    $usuarios = array();

    $query = "Select *
              From usuario
              order by nome";            
   
    $resultado = mysqli_query($conexao,$query);

    while($dados = mysqli_fetch_array($resultado)) {
        array_push($usuarios, $dados);
    }

    return $usuarios;
}

function buscaUsuario($email) {
    $conexao = conecta_bd();
    $query = "SELECT * FROM usuario WHERE email='$email'";
    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_num_rows($resultado);

    return $dados;
}

function cadastraUsuario($nome, $senha, $email, $cep, $endereco, $numero, $bairro, $cidade, $uf, $perfil, $status, $data) {
    $conexao = conecta_bd();
    
    $query = "Insert Into usuario(nome, senha, email, cep, endereco, numero, bairro, cidade, uf, perfil, status, data) 
              values('$nome', '$senha', '$email', '$cep', '$endereco', '$numero', '$bairro', '$cidade', '$uf', '$perfil', '$status', '$data')";
   
    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_affected_rows($conexao);
    return $dados;
}   

function removeUsuario($codigo) {
    $conexao = conecta_bd();
    $query = "delete from usuario where cod = '$codigo'";
    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_affected_rows($conexao);
    return $dados;

}

function buscaUsuarioeditar ($codigo){
    $conexao = conecta_bd();

    $query = "Select *
              From usuario
              Where cod = '$codigo'";
                         
    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_array($resultado);

    return $dados;
}

function editarUsuario($codigo,$status,$data){
    $conexao = conecta_bd();

    $query = "Select *
              From usuario
              Where cod = '$codigo'";
                     
    $resultado = mysqli_query($conexao,$query);
    $dados = mysqli_num_rows($resultado);
    if($dados == 1) //testa se a consulta retornou algum registro
    {
        $query = "Update usuario
                  Set status = '$status', data = '$data'
                  where cod = '$codigo'";
        $resultado = mysqli_query($conexao,$query);
        $dados = mysqli_affected_rows($conexao);
        return $dados;      
    }

}

function editarSenhaUsuario($codigo, $senha) {
    $conexao = conecta_bd();
    $query = "UPDATE usuario SET senha='$senha' WHERE cod='$codigo'";
    mysqli_query($conexao, $query);
    return mysqli_affected_rows($conexao) > 0;
}

function editarPerfilUsuario($codigo,$nome,$email,$data){
    $conexao = conecta_bd();

    $query = "Select *
              From usuario
              Where cod = '$codigo'";
                     
    $resultado = mysqli_query($conexao,$query);
    $dados = mysqli_num_rows($resultado);
    if($dados == 1)
    {
        $query = "Update usuario
                  Set nome = '$nome', email = '$email', data = '$data'
                  where cod = '$codigo'";
        $resultado = mysqli_query($conexao,$query);
        $dados = mysqli_affected_rows($conexao);
        return $dados;      
    }

}



?>
<?php

    function conecta_bd(){

        $servidor = "localhost";
        $usuario_bd = "root";
        $senha_bd = "";
        $banco = "ordemservico";

        $conexao = mysqli_connect($servidor, $usuario_bd, $senha_bd, $banco);

        if(mysqli_connect_errno()){
            echo "Erro ao conectar ao banco de dados!";
            die();
        }
        return $conexao;
    }
?>
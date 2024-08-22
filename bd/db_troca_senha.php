<?php
require_once("bd_usuario.php");
require_once("bd_cliente.php");
require_once("bd_terceirizado.php");

function trocaSenha($email, $nova_senha, $perfil) {
    $nova_senha_md5 = md5($nova_senha);

    switch ($perfil) {
        case '1':
            $usuarioExiste = buscaUsuario($email);
            if ($usuarioExiste > 0) {
                $conexao = conecta_bd();
                $query = "SELECT * FROM usuario WHERE email='$email'";
                $resultado = mysqli_query($conexao, $query);
                $dadosUsuario = mysqli_fetch_assoc($resultado);
                
                return editarSenhaUsuario($dadosUsuario['cod'], $nova_senha_md5);
            } else {
                return 'Usuário não encontrado.';
            }

        case '2':
            $clienteExiste = buscaCliente($email);
            if ($clienteExiste > 0) {
                $conexao = conecta_bd();
                $query = "SELECT * FROM cliente WHERE email='$email'";
                $resultado = mysqli_query($conexao, $query);
                $dadosCliente = mysqli_fetch_assoc($resultado);
                
                return editarSenhaCliente($dadosCliente['cod'], $nova_senha_md5);
            } else {
                return 'Cliente não encontrado.';
            }

        case '3':
            $terceirizadoExiste = buscaTerceirizado($email);
            if ($terceirizadoExiste > 0) {
                $conexao = conecta_bd();
                $query = "SELECT * FROM terceirizado WHERE email='$email'";
                $resultado = mysqli_query($conexao, $query);
                $dadosTerceirizado = mysqli_fetch_assoc($resultado);
                
                return editarSenhaTerceirizado($dadosTerceirizado['cod'], $nova_senha_md5);
            } else {
                return 'Terceirizado não encontrado.';
            }

        default:
            return 'Perfil inválido!';
    }
}
?>
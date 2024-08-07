<?php
require_once("valida_session.php");
require_once ("bd/bd_usuario.php");
         
$codigo = $_POST["cod"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$data=date("y/m/d");

$dados = editarPerfilUsuario($codigo,$nome,$email,$data);
if ($dados == 1){
    $_SESSION['nome_usu'] = $nome;
    $_SESSION['texto_sucesso'] = 'Os dados do usuário foram alterados no sistema.';
    header ("Location:editar_perfil_usuario.php");
}else{
    $_SESSION['texto_erro'] = 'Os dados do usuário não foram alterados no sistema!';
    header ("Location:editar_perfil_usuario.php");
}

        
?>
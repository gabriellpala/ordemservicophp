<?php
session_start();
require_once("bd/bd_usuario.php");
require_once("bd/bd_cliente.php");
require_once("bd/bd_terceirizado.php");
require_once("bd/bd_troca_senha.php");

if (empty($_POST['email']) || empty($_POST['senha']) || empty($_POST['perfil'])) {
    $_SESSION['mensagem_erro'] = 'Por favor, preencha todos os campos!';
    header("Location: troca_senha_form.php");
    exit();
}

$email = $_POST["email"];
$nova_senha = $_POST["senha"];
$perfil = $_POST["perfil"];

$resultado = trocaSenha($email, $nova_senha, $perfil);

if ($resultado === true) {
    $_SESSION['mensagem_sucesso'] = 'Senha alterada com sucesso!';
    header("Location: index.php");
    exit();
} else {
    $_SESSION['mensagem_erro'] = $resultado;
    header("Location: troca_senha_form.php");
    exit();
}
?>
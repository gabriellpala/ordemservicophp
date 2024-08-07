<?php
session_start();

// Captura os dados do formulário
$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = md5($_POST["senha"]);
$cep = $_POST["cep"];
$endereco = $_POST["endereco"];
$numero = $_POST["numero"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$uf = $_POST["uf"];
$telefone = $_POST["telefone"];
$status = $_POST["status"];
$perfil = 2; // Define o perfil padrão para cliente
$data = date("y/m/d");

// Conecta ao banco de dados e verifica se o email já existe
require_once("bd/bd_cliente.php");
$dados = buscaCliente($email);

if ($dados != 0) {
    $_SESSION['texto_erro'] = 'Este email já existe cadastrado no sistema!';
    $_SESSION['nome'] = $nome;
    $_SESSION['email'] = $email;
    $_SESSION['cep'] = $cep;
    $_SESSION['endereco'] = $endereco;
    $_SESSION['numero'] = $numero;
    $_SESSION['bairro'] = $bairro;
    $_SESSION['cidade'] = $cidade;
    $_SESSION['uf'] = $uf;
    $_SESSION['telefone'] = $telefone;
    header("Location: cad_cliente_index.php");
} else {
    $dados = cadastraCliente($nome, $email, $senha, $cep, $endereco, $numero, $bairro, $cidade, $uf, $telefone, $status, $perfil, $data);

    if ($dados == 1) {
        $_SESSION['texto_sucesso'] = 'Dados cadastrados com sucesso.';
        unset($_SESSION['texto_erro']);
        unset($_SESSION['nome']);
        unset($_SESSION['email']);
        unset($_SESSION['cep']);
        unset($_SESSION['endereco']);
        unset($_SESSION['numero']);
        unset($_SESSION['bairro']);
        unset($_SESSION['cidade']);
        unset($_SESSION['uf']);
        unset($_SESSION['telefone']);
        header("Location: index.php");
    } else {
        $_SESSION['texto_erro'] = 'Os dados não foram cadastrados no sistema!';
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;
        $_SESSION['cep'] = $cep;
        $_SESSION['endereco'] = $endereco;
        $_SESSION['numero'] = $numero;
        $_SESSION['bairro'] = $bairro;
        $_SESSION['cidade'] = $cidade;
        $_SESSION['uf'] = $uf;
        $_SESSION['telefone'] = $telefone;
        header("Location: cad_cliente_index.php");
    }
}
?>
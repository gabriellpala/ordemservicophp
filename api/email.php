<?php

require_once("../bd/bd_carousel.php");
header('Access-Control-Allow-Origin: *');

// Caso precise permitir métodos específicos (opcional)
header('Access-Control-Allow-Methods: POST');

// Define o conteúdo como JSON
header('Content-Type: application/json');


$response = (object) [
    'status' => '',
    'message' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se todos os campos necessários foram enviados
    if (isset($_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['mensagem'])) {
        $nome = trim($_POST['nome']);
        $email = trim($_POST['email']);
        $telefone = trim($_POST['telefone']);
        $mensagem = trim($_POST['mensagem']);

        // Validação básica dos campos
        if (empty($nome) || empty($email) || empty($telefone) || empty($mensagem)) {
            $response->status = 'error';
            $response->message = 'Todos os campos são obrigatórios.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $response->status = 'error';
            $response->message = 'E-mail inválido.';
        } else {
            // Conexão com o banco e inserção dos dados
            $conexao = conecta();
            $query = "INSERT INTO contatos (nome, email, telefone, mensagem) VALUES (?, ?, ?, ?)";

            if ($stmt = mysqli_prepare($conexao, $query)) {
                mysqli_stmt_bind_param($stmt, "ssss", $nome, $email, $telefone, $mensagem);
                if (mysqli_stmt_execute($stmt)) {
                    $response->status = 'success';
                    $response->message = 'Contato enviado com sucesso.';
                } else {
                    $response->status = 'error';
                    $response->message = 'Erro ao enviar o contato. Tente novamente mais tarde.';
                }
                mysqli_stmt_close($stmt);
            } else {
                $response->status = 'error';
                $response->message = 'Erro ao preparar a consulta SQL.';
            }
            mysqli_close($conexao);
        }
    } else {
        $response->status = 'error';
        $response->message = 'Parâmetros inválidos.';
    }
} else {
    $response->status = 'error';
    $response->message = 'Método de requisição não permitido. Use POST.';
}

// Retorna a resposta em JSON
echo json_encode($response);
?>
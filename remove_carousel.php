<?php
require_once('valida_session.php');
require_once('bd/bd_carousel.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Primeiro, buscar os dados da imagem para poder excluir o arquivo do servidor
    $dados = buscaCarousel($id);

    if ($dados) {
        // Verificar se o arquivo de imagem existe e removê-lo
        if (file_exists($dados['src'])) {
            unlink($dados['src']); // Remove o arquivo de imagem
        }

        // Remover o registro do banco de dados
        if (removeCarousel($id)) {
            $_SESSION['texto_sucesso'] = "Imagem removida com sucesso!";
        } else {
            $_SESSION['texto_erro'] = "Erro ao remover a imagem do banco de dados!";
        }
    } else {
        $_SESSION['texto_erro'] = "Imagem não encontrada!";
    }
} else {
    $_SESSION['texto_erro'] = "ID inválido!";
}

header('Location: carousel.php');

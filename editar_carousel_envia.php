<?php
require_once('valida_session.php');
require_once("bd/bd_carousel.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $alt = $_POST['alt'];
    $src = '';

    // Verifica se uma nova imagem foi enviada
    if (isset($_FILES['src']) && $_FILES['src']['error'] === UPLOAD_ERR_OK) {
        $extensao = pathinfo($_FILES['src']['name'], PATHINFO_EXTENSION);
        $nomeArquivo = uniqid() . '.' . $extensao;
        $caminhoUpload = 'upload/' . $nomeArquivo;

        // Move o arquivo para o diretório correto
        if (move_uploaded_file($_FILES['src']['tmp_name'], $caminhoUpload)) {
            $src = $caminhoUpload;
        } else {
            $_SESSION['texto_erro'] = "Erro ao subir a imagem!";
            header('Location: editar_carousel.php?id=' . $id);
            exit;
        }
    }

    // Se nenhuma imagem nova foi enviada, mantém a imagem atual
    $imagemAtual = buscaCarousel($id);
    if (!$src) {
        $src = $imagemAtual['src'];
    }

    if (editarCarousel($id, $nome, $src, $alt)) {
        $_SESSION['texto_sucesso'] = "Imagem atualizada com sucesso!";
    } else {
        $_SESSION['texto_erro'] = "Erro ao atualizar a imagem!";
    }

    header('Location: carousel.php');
}

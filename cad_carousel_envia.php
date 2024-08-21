<?php
require_once('valida_session.php');
require_once('bd/bd_carousel.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $alt = $_POST['alt'];
    $src = '';

    // Verifica se uma imagem foi enviada
    if (isset($_FILES['src']) && $_FILES['src']['error'] === UPLOAD_ERR_OK) {
        $extensao = pathinfo($_FILES['src']['name'], PATHINFO_EXTENSION);
        $nomeArquivo = uniqid() . '.' . $extensao;
        $caminhoUpload = 'upload/' . $nomeArquivo;

        // Move o arquivo para o diretório correto
        if (move_uploaded_file($_FILES['src']['tmp_name'], $caminhoUpload)) {
            $src = $caminhoUpload;
        } else {
            $_SESSION['texto_erro'] = "Erro ao subir a imagem!";
            header('Location: cad_carousel.php');
            exit;
        }
    }

    if ($src) {
        if (cadastraCarousel($nome, $src, $alt)) {
            $_SESSION['texto_sucesso'] = "Imagem cadastrada com sucesso!";
        } else {
            $_SESSION['texto_erro'] = "Erro ao cadastrar a imagem!";
        }
    } else {
        $_SESSION['texto_erro'] = "Erro no upload da imagem!";
    }

    header('Location: carousel.php');
}


<?php
session_start();
 
//Caso o usuário não esteja autenticado, limpa os dados e redireciona
if ( !isset($_SESSION['email']) and !isset($_SESSION['perfil']) and !isset($_SESSION['status'])) {
    //Limpa sessão
    unset ($_SESSION['email']);
    unset ($_SESSION['perfil']);
	unset ($_SESSION['status']);
	
	//Destrói sessão
    session_destroy();
 
    //Redireciona para a página de autenticação
    header ("Location:index.php");
	die();
}


?>
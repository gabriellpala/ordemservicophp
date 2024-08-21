<?php
require_once("../bd/bd_carousel.php");
header('Access-Control-Allow-Origin: *');

// Caso precise permitir métodos específicos (opcional)
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');

// Define o conteúdo como JSON
header('Content-Type: application/json');


$data = listaCarousel();

// Define o header para o tipo de conteúdo JSON
header('Content-Type: application/json');

// Retorna o JSON
echo json_encode($data);

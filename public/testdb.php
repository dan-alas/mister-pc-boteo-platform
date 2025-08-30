<?php

include __DIR__ . '/../config/config.php';

if ($pdo) {
    echo "¡Conexión exitosa!";
} else {
    echo "No se pudo conectar a la base de datos.";
}

include __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../app/models/Categoria.php';
require_once __DIR__ . '/../app/controllers/CategoriaController.php';

$categoriaController = new CategoriaController($pdo);
$categorias = $categoriaController->index();

var_dump($categorias);

// Incluir vista
include __DIR__ . '/../app/views/admin/productos.php';
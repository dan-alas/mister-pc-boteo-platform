<?php 

include '../includes/verificar_tecnico.php'; //Verificar sesion desde tecnico

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../app/controllers/ProductoController.php';
require_once __DIR__ . '/../../app/controllers/CategoriaController.php';
require_once __DIR__ . '/../../app/controllers/ProveedorController.php';

$productoController = new ProductoController($pdo);
$categoriaController = new CategoriaController($pdo);
$proveedorController = new ProveedorController($pdo);

// Obtener todas las categorías y proveedores activos
$categorias = $categoriaController->index();
$proveedores = $proveedorController->index();

// Filtrar por categoría
$categoria_id = $_GET['categoria_filtro'] ?? null;
$productos = $productoController->index($categoria_id);

include '../../app/views/tecnico/productos.php';
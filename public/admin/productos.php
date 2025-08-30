<?php 

include '../includes/verificar_admin.php'; //Verificar sesion admin desde includes

// Mostrar errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 1) Conexión a BD
require_once __DIR__ . '/../../config/config.php';

// 2) Controlador
require_once __DIR__ . '/../../app/controllers/CategoriaController.php';

// 3) Crear objeto controlador
$categoriaController = new CategoriaController($pdo);

// ============================
// Procesar formularios y acciones
// ============================

// Agregar categoría
if (isset($_POST['agregar_categoria'])) {
    $categoriaController->store($_POST['nombre_categoria']);
    header("Location: " . basename(__FILE__));
    exit;
}

// Editar categoría
if (isset($_POST['editar_categoria'])) {
    $categoriaController->update($_POST['id_categoria'], $_POST['nombre_categoria_edit']);
    header("Location: " . basename(__FILE__));
    exit;
}

// Eliminar categoría
if (isset($_GET['eliminar_categoria'])) {
    $categoriaController->delete($_GET['eliminar_categoria']);
    header("Location: " . basename(__FILE__));
    exit;
}

// 4) Obtener categorías para la vista
$categorias = $categoriaController->index();

// 5) Asegurarse de que la variable exista en la vista
$categorias = !empty($categorias) ? $categorias : [];

// 6) Incluir la vista

include '../../app/views/admin/productos.php';
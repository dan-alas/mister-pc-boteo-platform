<?php
include '../includes/verificar_admin.php';
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

// ====================
// Procesar formularios
// ====================

// Agregar producto
if (isset($_POST['agregar_producto'])) {
    $data = [
        'nombre' => trim($_POST['nombre_producto'] ?? ''),
        'precio' => $_POST['precio_producto'] ?? 0,
        'imagen' => $_POST['imagen_producto'] ?? null,
        'stock' => $_POST['stock_producto'] ?? 0,
        'categoria_id' => $_POST['categoria_id'] ?? null,
        'proveedor_id' => $_POST['proveedor_id'] ?? null,
        'tipo_presentacion' => $_POST['tipo_presentacion'] ?? 'Unidad',
        'unidades_por_presentacion' => $_POST['unidades_por_presentacion'] ?? null,
        'marca' => trim($_POST['marca_producto'] ?? '') // <-- AGREGADO
    ];

    if ($data['nombre'] && $data['categoria_id'] && $data['proveedor_id']) {
        $productoController->store($data);
    }
    header("Location: productos.php" . ($categoria_id ? "?categoria_filtro=$categoria_id" : ""));
    exit;
}

// Editar producto
if (isset($_POST['editar_producto'])) {
    $id = $_POST['id_producto'] ?? null;
    if ($id) {
        $data = [
            'nombre' => trim($_POST['nombre_producto'] ?? ''),
            'precio' => $_POST['precio_producto'] ?? 0,
            'imagen' => $_POST['imagen_producto'] ?? null,
            'stock' => $_POST['stock_producto'] ?? 0,
            'categoria_id' => $_POST['categoria_id'] ?? null,
            'proveedor_id' => $_POST['proveedor_id'] ?? null,
            'tipo_presentacion' => $_POST['tipo_presentacion'] ?? 'Unidad',
            'unidades_por_presentacion' => $_POST['unidades_por_presentacion'] ?? null,
            'marca' => trim($_POST['marca_producto'] ?? '') // también editamos la marca
        ];

        $productoController->update($id, $data);
    }
    header("Location: productos.php" . ($categoria_id ? "?categoria_filtro=$categoria_id" : ""));
    exit;
}

// Categorías
if (isset($_POST['agregar_categoria'])) {
    $nombre_categoria = trim($_POST['nombre_categoria'] ?? '');
    if ($nombre_categoria) {
        $categoriaController->store($nombre_categoria);
    }
    header("Location: productos.php");
    exit;
}

if (isset($_POST['editar_categoria'])) {
    $id_categoria = $_POST['id_categoria'] ?? null;
    $nombre_categoria_edit = trim($_POST['nombre_categoria_edit'] ?? '');
    if ($id_categoria && $nombre_categoria_edit) {
        $categoriaController->update($id_categoria, $nombre_categoria_edit);
    }
    header("Location: productos.php");
    exit;
}

if (isset($_GET['eliminar_categoria'])) {
    $categoriaController->delete($_GET['eliminar_categoria']);
    header("Location: productos.php");
    exit;
}

// Agregar proveedor
if (isset($_POST['agregar_proveedor'])) {
    $nombre = trim($_POST['nombre_proveedor'] ?? '');
    if ($nombre) {
        $data = [
            'nombre' => $nombre,
            'telefono' => $_POST['telefono_proveedor'] ?? null,
            'email' => $_POST['email_proveedor'] ?? null,
            'direccion' => $_POST['direccion_proveedor'] ?? null
        ];
        $proveedorController->store($data);
    }
    header("Location: productos.php");
    exit;
}

// Eliminar producto (soft delete)
if (isset($_GET['eliminar_producto'])) {
    $productoController->softDelete($_GET['eliminar_producto']);
    header("Location: productos.php" . ($categoria_id ? "?categoria_filtro=$categoria_id" : ""));
    exit;
}

// Activar producto desactivado
if (isset($_GET['activar_producto'])) {
    $productoController->activar($_GET['activar_producto']);
    header("Location: productos.php" . ($categoria_id ? "?categoria_filtro=$categoria_id" : ""));
    exit;
}

// Obtener productos desactivados para el modal de activación
$productos_desactivados = $productoController->getDesactivados();

// ====================
// Incluir vista
// ====================
include '../../app/views/admin/productos.php';

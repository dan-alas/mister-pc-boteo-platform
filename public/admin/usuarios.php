<?php 

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../app/controllers/UsuarioController.php';

$usuarioController = new UsuarioController($pdo);
$usuarios = $usuarioController->indexCliente();

// Incluir la vista

include '../includes/verificar_admin.php'; //Verificar sesion admin desde includes

include '../../app/views/admin/usuarios.php';
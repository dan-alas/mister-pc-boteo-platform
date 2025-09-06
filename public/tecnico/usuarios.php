<?php 

include '../includes/verificar_tecnico.php'; //Verificar sesion desde tecnico

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../app/controllers/UsuarioController.php';

$usuarioController = new UsuarioController($pdo);
$usuarios = $usuarioController->indexCliente();


include '../../app/views/tecnico/usuarios.php';
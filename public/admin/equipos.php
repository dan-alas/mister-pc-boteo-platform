<?php 

include '../includes/verificar_admin.php'; //Verificar sesion admin desde includes

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../app/controllers/EquipoController.php';

$equipoController = new EquipoController($pdo);
$equipos = $equipoController->index(); // Obtenemos todos los equipos


include '../../app/views/admin/equipos.php';
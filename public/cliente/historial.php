<?php 

include '../includes/verificar_cliente.php'; //Verificar sesion desde cliente
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../app/controllers/EquipoController.php';

$cliente_id = $_SESSION['usuario_id'];
$equipoController = new EquipoController($pdo);

// Obtener historial de equipos entregados del cliente
$historial = $equipoController->historialEquipos($cliente_id);

include '../../app/views/cliente/historial.php';
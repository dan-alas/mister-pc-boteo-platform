<?php 
session_start();
include '../includes/verificar_tecnico.php'; //Verificar sesion desde tecnico

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../app/controllers/EquipoController.php';


// ID del técnico logueado
$tecnico_id = $_SESSION['usuario_id'];


// Filtro opcional por estado (ej. "pendiente", "en reparación", etc.)
$estadoFiltro = $_GET['estado'] ?? '';

// Instancia del controlador
$equipoController = new EquipoController($pdo);

// Traer los equipos filtrados por técnico
$equipos = $equipoController->equiposTecnico($tecnico_id, $estadoFiltro);



include '../../app/views/tecnico/equipos.php';
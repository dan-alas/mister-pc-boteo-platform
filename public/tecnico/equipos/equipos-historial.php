<?php 

include '../../includes/verificar_tecnico.php'; //Verificar sesion desde tecnico

require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../app/controllers/EquipoController.php';

$tecnico_id = $_SESSION['usuario_id'] ?? null;

$equipoController = new EquipoController($pdo);

$tipoFiltro = $_GET['tipo_filtro'] ?? '';
$data = $equipoController->verHistorialTecnico($tecnico_id, $tipoFiltro);

$equipos = $data['equipos'];

include '../../../app/views/tecnico/equipos/equipos-historial.php';
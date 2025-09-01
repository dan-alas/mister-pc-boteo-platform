<?php 

include '../../includes/verificar_admin.php'; //Verificar sesion admin desde includes
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../app/controllers/EquipoController.php';


$equipoController = new EquipoController($pdo);

// Obtener el filtro del formulario (si lo hay)
$tipoFiltro = $_GET['tipo_filtro'] ?? '';
$data = $equipoController->verHistorial($tipoFiltro);
$equipos = $data['equipos'];





include '../../../app/views/admin/equipos/equipos-historial.php';
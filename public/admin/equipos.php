<?php 

include '../includes/verificar_admin.php'; //Verificar sesion admin desde includes

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../app/controllers/EquipoController.php';

$equipoController = new EquipoController($pdo);
$equipos = $equipoController->index(); // Obtenemos todos los equipos

$tipoFiltro = $_GET['tipo_filtro'] ?? '';
$equipos = $equipoController->index($tipoFiltro);

if (isset($_GET['eliminar'])) {
    $id = (int)$_GET['eliminar'];
    if ($equipoController->delete($id)) {
        $success = "Equipo eliminado correctamente.";
    } else {
        $error = "Hubo un error al eliminar el equipo.";
    }
}




include '../../app/views/admin/equipos.php';
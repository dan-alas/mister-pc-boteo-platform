<?php 

include '../../includes/verificar_admin.php'; //Verificar sesion admin desde includes
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../app/controllers/EquipoController.php';

$equipoController = new EquipoController($pdo);

// Obtener propietarios y técnicos
$propietarios = $equipoController->getUsuarios('cliente');
$tecnicos = $equipoController->getUsuarios('tecnico');

// Inicializar variables de alerta
$error = '';
$success = '';

// Procesar envío del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;

    if ($equipoController->storeReparado($data)) {
        $success = "¡Equipo reparado guardado correctamente!";
    } else {
        $error = "Hubo un error al guardar el equipo reparado.";
    }
}

include '../../../app/views/admin/equipos/equipos-reparado.php';
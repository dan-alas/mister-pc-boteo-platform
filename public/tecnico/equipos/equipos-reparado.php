<?php

include '../../includes/verificar_tecnico.php'; //Verificar sesion desde tecnico
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../app/controllers/EquipoController.php';

$equipoController = new EquipoController($pdo);

// Obtener propietarios (clientes)
$propietarios = $equipoController->getUsuarios('cliente');

// Inicializar variables de alerta
$error = '';
$success = '';

// Procesar envío del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;  // <-- obtienes todos los datos enviados por el formulario

    // Asignar automáticamente el técnico logueado
    $data['tecnico_id'] = $_SESSION['usuario_id'];

    // Guardar el equipo reparado
    if ($equipoController->storeReparado($data)) {
        $success = "¡Equipo reparado guardado correctamente!";
    } else {
        $error = "Hubo un error al guardar el equipo reparado.";
    }
}


include '../../../app/views/tecnico/equipos/equipos-reparado.php';

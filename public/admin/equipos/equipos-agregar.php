<?php 

include '../../includes/verificar_admin.php'; 
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../app/controllers/EquipoController.php';


$equipoController = new EquipoController($pdo);

$propietarios = $equipoController->getUsuarios('cliente');
$tecnicos = $equipoController->getUsuarios('tecnico');

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;
    if ($data['propietario_id'] && $data['fecha_ingreso'] && $data['tipo_problema'] && $data['estado_actual'] && $data['tecnico_id']) {
        if ($equipoController->store($data)) {
            $success = "Equipo agregado correctamente.";
        } else {
            $error = "Error al guardar el equipo.";
        }
    } else {
        $error = "Debe completar todos los campos obligatorios.";
    }
}

include '../../../app/views/admin/equipos/equipos-agregar.php';
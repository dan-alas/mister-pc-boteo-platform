<?php 

include '../../includes/verificar_admin.php'; //Verificar sesion admin desde includes
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../app/controllers/EquipoController.php';

$equipoController = new EquipoController($pdo);

// Validar que se recibió el ID
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: equipos.php");
    exit;
}

$id = $_GET['id'];

// Obtener datos del equipo
$data = $equipoController->edit($id);
$equipo = $data['equipo'];
$propietarios = $data['propietarios'];
$tecnicos = $data['tecnicos'];

// Procesar actualización si se envió el formulario
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($equipoController->update($id, $_POST)) {
        $success = "¡Equipo actualizado correctamente!";
        // Recargar los datos después de la actualización
        $data = $equipoController->edit($id);
        $equipo = $data['equipo'];
    } else {
        $error = "Hubo un error al actualizar el equipo.";
    }
}

include '../../../app/views/admin/equipos/equipos-editar.php';
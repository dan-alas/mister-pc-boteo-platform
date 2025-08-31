<?php 
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../app/controllers/UsuarioController.php';

$usuarioController = new UsuarioController($pdo);
$usuarios = $usuarioController->indexTecnicos();

// Procesar formulario de agregar técnico
$error = '';
$success = '';

if (isset($_POST['agregar_tecnico'])) {
    $nombre = trim($_POST['nombre_tecnico'] ?? '');
    $email = trim($_POST['email_tecnico'] ?? '');
    $telefono = trim($_POST['telefono_tecnico'] ?? '');
    $password = $_POST['password_tecnico'] ?? '';

    if (!$nombre || !$email || !$telefono || !$password) {
        $error = 'Todos los campos son obligatorios.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Correo no válido.';
    } elseif (strlen($password) < 6) {
        $error = 'La contraseña debe tener al menos 6 caracteres.';
    } elseif ($usuarioController->findByEmail($email)) { // <-- ahora usamos método público
        $error = 'El correo ya está registrado.';
    } else {
        // Insertar técnico usando el controlador (que a su vez usa el modelo)
        $creado = $usuarioController->createTecnico($nombre, $email, $telefono, $password);

        if ($creado) {
            $success = 'Técnico registrado exitosamente.';
            // Refrescar la lista de técnicos
            $usuarios = $usuarioController->indexTecnicos();
        } else {
            $error = 'Ocurrió un error al registrar el técnico.';
        }
    }
}


include '../includes/verificar_admin.php'; //Verificar sesion admin desde includes

include '../../app/views/admin/tecnicos.php';
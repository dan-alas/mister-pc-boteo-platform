<?php
session_start();

require_once __DIR__ . '/../config/config.php';          // Aquí defines $pdo
require_once __DIR__ . '/../app/controllers/AuthController.php';

$auth = new AuthController($pdo);

$error = '';
$mensaje_bienvenida = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // El controlador procesa el login y devuelve resultado
    $result = $auth->login($_POST);

    if ($result['success']) {
        $_SESSION['usuario_id'] = $result['usuario']['id'];
        $_SESSION['usuario_nombre'] = $result['usuario']['username'];
        $_SESSION['usuario_rol'] = $result['usuario']['rol'];
        $mensaje_bienvenida = 'Bienvenido ' . htmlspecialchars($result['usuario']['username']);
        
        // Redirigir o mostrar mensaje antes de redirigir
        header("Location: dashboard.php");
        exit;
    } else {
        $error = $result['error'];
    }
}

// Incluir la vista (formulario login)
include __DIR__ . '/../app/views/auth/login.php';

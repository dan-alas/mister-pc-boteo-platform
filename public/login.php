<?php
session_start();
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';

$auth = new AuthController($pdo);

$error = '';
$mensaje_bienvenida = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = $auth->login($_POST);

    if ($result['success']) {
        $_SESSION['usuario_id'] = $result['usuario']['id'];
        $_SESSION['usuario_nombre'] = $result['usuario']['nombre_completo'];
        $_SESSION['usuario_rol'] = $result['usuario']['rol'];

        $mensaje_bienvenida = 'Bienvenido ' . htmlspecialchars($result['usuario']['nombre_completo']);
    } else {
        $error = $result['error'];
    }
}

include __DIR__ . '/../app/views/auth/login.php';

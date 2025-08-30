<?php 
// Verifica sesión de técnico
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$baseUrl = '/mister-pc-boteo/public';

if (!isset($_SESSION['usuario_rol'])) {
    header("Location: {$baseUrl}/login.php");
    exit;
}

if ($_SESSION['usuario_rol'] !== 'tecnico') {
    switch ($_SESSION['usuario_rol']) {
        case 'admin':
            header("Location: {$baseUrl}/admin/inicio.php");
            break;
        case 'cliente':  // Actualizado de 'usuario' a 'cliente'
            header("Location: {$baseUrl}/cliente/inicio.php");
            break;
        default:
            header("Location: {$baseUrl}/login.php");
            break;
    }
    exit;
}

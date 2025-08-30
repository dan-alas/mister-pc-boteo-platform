<?php
// Verifica sesión de cliente de forma segura
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$baseUrl = '/mister-pc-boteo/public';

// Si no hay sesión o rol no está definido → login
if (empty($_SESSION['usuario_rol'])) {
    header("Location: {$baseUrl}/login.php");
    exit;
}

// Redirigir según rol si no es cliente
if ($_SESSION['usuario_rol'] !== 'cliente') {
    if ($_SESSION['usuario_rol'] === 'admin') {
        header("Location: {$baseUrl}/admin/inicio.php");
    } elseif ($_SESSION['usuario_rol'] === 'tecnico') {
        header("Location: {$baseUrl}/tecnico/inicio.php");
    } else {
        // Rol no reconocido
        header("Location: {$baseUrl}/login.php");
    }
    exit;
}

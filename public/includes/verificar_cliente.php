<?php 
//Verifica sesion de cliente
session_start();

$baseUrl = '/mister-pc-boteo/public';

if (!isset($_SESSION['usuario_rol'])) {
    header("Location: {$baseUrl}/login.php");
    exit;
}

if ($_SESSION['usuario_rol'] !== 'usuario') {
    switch ($_SESSION['usuario_rol']) {
        case 'admin':
            header("Location: {$baseUrl}/admin/inicio.php");
            break;
        case 'tecnico':
            header("Location: {$baseUrl}/tecnico/inicio.php");
            break;
        default:
            header("Location: {$baseUrl}/login.php");
            break;
    }
    exit;
}

<?php 
//Verifica sesion de administrador
session_start();

$baseUrl = '/mister-pc-boteo/public';

if (!isset($_SESSION['usuario_rol'])) {
    header("Location: {$baseUrl}/login.php");
    exit;
}


if ($_SESSION['usuario_rol'] !== 'admin') {
    switch ($_SESSION['usuario_rol']) {
        case 'tecnico':
            header("Location: {$baseUrl}/tecnico/inicio.php");
            break;
        case 'usuario':
            header("Location: {$baseUrl}/cliente/inicio.php");
            break;
        default:
            header("Location: {$baseUrl}/login.php");
            break;
    }
    exit;
}
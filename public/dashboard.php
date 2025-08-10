<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuario_id']) || !isset($_SESSION['usuario_rol'])) {
    header('Location: login.php');
    exit;
}

switch ($_SESSION['usuario_rol']) {
    case 'admin':
        header('Location: ./admin/inicio.php');
        break;
    case 'tecnico':
        header('Location: ./tecnico/inicio.php');
        break;
    case 'usuario':
        header('Location: ./cliente/inicio.php');
        break;
    default:
        echo "Rol no reconocido.";
        break;
}
exit;

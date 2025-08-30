<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificar que la sesión esté iniciada
if (!isset($_SESSION['usuario_id']) || !isset($_SESSION['usuario_rol'])) {
    header('Location: login.php');
    exit;
}

// Redirigir según el rol
switch ($_SESSION['usuario_rol']) {
    case 'admin':
        header('Location: ./admin/inicio.php');
        break;
    case 'tecnico':
        header('Location: ./tecnico/inicio.php');
        break;
    case 'cliente': // <- ahora coincide con la base de datos
        header('Location: ./cliente/inicio.php');
        break;
    default:
        echo "Rol no reconocido.";
        break;
}
exit;

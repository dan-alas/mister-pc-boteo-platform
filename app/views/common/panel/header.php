<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificar sesión activa
if (!isset($_SESSION['usuario_id'])) {
    header('Location: ../../public/login.php'); // Ajusta la ruta si es necesario
    exit;
}

$usuario_nombre = $_SESSION['usuario_nombre'] ?? 'Invitado';
$usuario_rol = $_SESSION['usuario_rol'] ?? 'Desconocido';

?>

<!-- Header de Paneles -->
<header class="bg-primary text-white py-2 px-4 d-flex justify-content-between align-items-center">
    <a href="/mister-pc-boteo/public/index.php">
        <img src="https://res.cloudinary.com/drztldzvn/image/upload/v1757213272/Logo_Mister_PC_bhghmg.png" alt="Logo Mister PC Boteo" height="60">
    </a>
    <div>Bienvenido <?= htmlspecialchars($usuario_rol) ?>: <?= htmlspecialchars($usuario_nombre) ?></div>
    <form action="/mister-pc-boteo/public/logout.php" method="post" style="margin:0;">
        <button type="submit" class="btn btn-light btn-sm fw-semibold">Cerrar Sesión</button>
    </form>
</header>

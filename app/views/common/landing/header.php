<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$loggedIn = isset($_SESSION['usuario_id']);
?>

<!-- Header -->
<header id="mainHeader" class="py-2 bg-white shadow-sm sticky-top">
    <div class="container-lg d-flex align-items-center justify-content-between">
        <!-- Logo -->
        <a href="/mister-pc-boteo/public/index.php" class="navbar-brand d-flex align-items-center">
            <img src="https://res.cloudinary.com/drztldzvn/image/upload/v1753133485/logo-mr-pc_l1rh9t.png"
                alt="Logo Mister Pc Boteo" width="70" class="img-fluid logo-hover">
            <span class="ms-2 fw-bold text-primary">Mister PC Boteo</span>
        </a>

        <!-- Navegación desktop -->

        <nav class="d-none d-lg-flex align-items-center">
            <a href="/mister-pc-boteo/public/index.php" class="nav-link mx-2 link-dark">Inicio</a>
            <a href="/mister-pc-boteo/public/nosotros.php" class="nav-link mx-2 link-dark">Sobre Nosotros</a>
            <a href="/mister-pc-boteo/public/servicios.php" class="nav-link mx-2 link-dark">Servicios</a>
            <a href="/mister-pc-boteo/public/productos.php" class="nav-link mx-2 link-dark">Productos</a>
            <a href="/mister-pc-boteo/public/contacto.php" class="nav-link mx-2 link-dark">Contacto</a>


            <?php if ($loggedIn): ?>
                <a class="btn btn-gradient ms-3 d-flex align-items-center" href="/mister-pc-boteo/public/dashboard.php">
                    <i class="bi bi-gear me-2"></i> Gestionar
                </a>
            <?php else: ?>
                <a class="btn btn-gradient ms-3 d-flex align-items-center" href="/mister-pc-boteo/public/login.php">
                    <i class="bi bi-person me-2"></i> Acceder
                </a>
            <?php endif; ?>
        </nav>

        <!-- Botón hamburguesa móvil -->
        <button class="navbar-toggler d-lg-none btn btn-outline-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuLateral">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</header>

<!-- Offcanvas móvil -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="menuLateral" style="width: 250px;">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Menú</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <nav class="nav flex-column">
            <a href="/mister-pc-boteo/public/index" class="nav-link">Inicio</a>
            <a href="/mister-pc-boteo/public/nosotros.php" class="nav-link">Sobre Nosotros</a>
            <a href="/mister-pc-boteo/public/servicios.php" class="nav-link">Servicios</a>
            <a href="/mister-pc-boteo/public/productos.php" class="nav-link">Productos</a>
            <a href="/mister-pc-boteo/public/contacto.php" class="nav-link">Contacto</a>

            <?php if ($loggedIn): ?>
                <a class="btn btn-gradient mt-3 d-flex align-items-center justify-content-center" href="/mister-pc-boteo/public/dashboard.php">
                    <i class="bi bi-gear me-2"></i> Gestionar
                </a>
            <?php else: ?>
                <a class="btn btn-gradient mt-3 d-flex align-items-center justify-content-center" href="/mister-pc-boteo/public/login.php">
                    <i class="bi bi-person me-2"></i> Acceder
                </a>
            <?php endif; ?>
        </nav>
    </div>
</div>

<!-- CSS -->
<style>
    .logo-hover {
        transition: transform 0.3s ease;
    }

    .logo-hover:hover {
        transform: scale(1.05);
    }

    .btn-gradient {
        background: linear-gradient(135deg, #1a73e8, #4285f4);
        color: #fff;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn-gradient:hover {
        background: linear-gradient(135deg, #4285f4, #1a73e8);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .nav-link {
        position: relative;
        transition: color 0.3s ease;
    }

    .nav-link::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: -2px;
        left: 0;
        background-color: #1a73e8;
        /* azul acorde a tu botón */
        transition: width 0.3s ease;
    }

    .nav-link:hover::after {
        width: 100%;
    }
</style>
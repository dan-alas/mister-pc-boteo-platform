<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$loggedIn = isset($_SESSION['usuario_id']);
?>

<!-- Header Inicia -->
<!-- Sección para pantallas grandes Inicia -->
<header class="py-2 bg-header">
    <div class="mx-4">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <a href="/index" class="navbar-brand color-red fw-bold">
                <img src="https://res.cloudinary.com/drztldzvn/image/upload/v1753133485/logo-mr-pc_l1rh9t.png" class="img-fluid" alt="Logo Mister Pc Boteo" width="70">
            </a>

            <!-- Botón hamburguesa abre el offcanvas -->
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuLateral">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navegación en pantallas grandes -->
            <div
                class="collapse navbar-collapse justify-content-center justify-content-lg-end text-center text-lg-start d-none d-lg-flex">
                <div class="navbar-nav d-flex flex-column flex-lg-row">
                    <a href="/mister-pc-boteo/public/index.php" class="nav-link text-dark fw-semibold">Inicio</a>
                    <a href="/mister-pc-boteo/public/nosotros.php" class="nav-link text-dark fw-semibold">Sobre Nosotros</a>
                    <a href="/mister-pc-boteo/public/servicios.php" class="nav-link text-dark fw-semibold">Servicios</a>
                    <a href="/mister-pc-boteo/public/productos.php" class="nav-link text-dark fw-semibold">Productos</a>
                    <a href="/mister-pc-boteo/public/contacto.php" class="nav-link text-dark fw-semibold">Contacto</a>
                </div>

                <?php if ($loggedIn): ?>
                    <a class="btn btn-primary ms-md-4 fw-semibold px-4" href="/mister-pc-boteo/public/dashboard.php">Gestionar</a>
                <?php else: ?>
                    <a class="btn btn-primary ms-md-4 fw-semibold px-4" href="/mister-pc-boteo/public/login.php">Acceder</a>
                <?php endif; ?>
            </div>
        </nav>
    </div>
</header>
<!-- Sección para pantallas grandes Finaliza -->

<!-- Sección para pantallas pequeñas Inicia -->
<section class="offcanvas offcanvas-end" tabindex="-1" id="menuLateral" style="width: 250px;">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Menú</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
    </div>
    <div class="offcanvas-body">
        <div class="navbar-nav d-flex flex-column flex-lg-row">
            <a href="/index" class="nav-link active">Inicio</a>
            <a href="/sobre-nosotros" class="nav-link text-dark">Sobre Nosotros</a>
            <a href="/servicios" class="nav-link text-dark">Servicios</a>
            <a href="/productos" class="nav-link text-dark">Productos</a>
            <a href="/contacto" class="nav-link text-dark">Contacto</a>

            <?php if ($loggedIn): ?>
                <a class="btn btn-primary fw-bold mt-3" href="/mister-pc-boteo/public/dashboard">Gestionar</a>
            <?php else: ?>
                <a class="btn btn-primary fw-bold mt-3" href="/mister-pc-boteo/public/login">Acceder</a>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- Sección para pantallas pequeñas Finaliza -->
<!-- Header Finaliza -->

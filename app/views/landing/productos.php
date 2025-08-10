<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuestros productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/landing.css">

    <style>
        .hero {
            background-image: url(./img/nosotros.png);
        }
    </style>

</head>

<body>

    <?php include '../app/views/common/landing/header.php'; ?> <!-- Header -->

    <!-- Hero Inicia -->
    <section class="hero position-relative text-white px-2 px-lg-0">
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-25"></div>
        <div class="container-lg h-100 position-relative">
            <div class="row h-100 align-items-center mx-lg-0">
                <div class="col-md-6">
                    <h1 class="fw-semibold display-5 mb-4">Nuestros Productos y repuestos</h1>
                    <p>Conoce la historia, misión y valores que impulsan a Mister Pc Boteo a ser líderes en el sector
                        tecnológico</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Finaliza -->

    <!-- Nuestros Productos Inicia -->
    <section class="py-5 px-2 px-lg-0">
        <div class="container-lg">

            <h3 class="mb-4 text-primary fw-semibold">Nuestros Productos</h3>

            <!-- Botones de categorías -->
            <div class="mb-4">
                <button type="button" class="btn btn-outline-dark mb-2">Todos</button>
                <button type="button" class="btn btn-outline-dark mb-2">Memorias USB</button>
                <button type="button" class="btn btn-outline-dark mb-2">Tarjetas Madre</button>
                <button type="button" class="btn btn-outline-dark mb-2">Teclados</button>
                <button type="button" class="btn btn-outline-dark mb-2">Monitores</button>
                <button type="button" class="btn btn-outline-dark mb-2">Teléfonos</button>
            </div>

            <!-- Carrete de productos -->
            <div class="product-scroll">

                <div class="card">
                    <img src="./img/cpu.jpg" class="img-card" alt="imagen de cpu">
                    <div class="card-body bg-terciary">
                        <span class="mb-2 product-label">BRAND</span>
                        <h5 class="mt-1 card-title-size fw-semibold">Memoria USB para computadoras</h5>
                        <p class="card-text text-primary fw-semibold">$20.00</p>
                    </div>
                </div>

                <div class="card">
                    <img src="./img/cpu.jpg" class="img-card" alt="imagen de cpu">
                    <div class="card-body bg-terciary">
                        <span class="mb-2 product-label">BRAND</span>
                        <h5 class="mt-1 card-title-size fw-semibold">Memoria USB para computadoras</h5>
                        <p class="card-text text-primary fw-semibold">$20.00</p>
                    </div>
                </div>

                <div class="card">
                    <img src="./img/cpu.jpg" class="img-card" alt="imagen de cpu">
                    <div class="card-body bg-terciary">
                        <span class="mb-2 product-label">BRAND</span>
                        <h5 class="mt-1 card-title-size fw-semibold">Memoria USB para computadoras</h5>
                        <p class="card-text text-primary fw-semibold">$20.00</p>
                    </div>
                </div>

                <div class="card">
                    <img src="./img/cpu.jpg" class="img-card" alt="imagen de cpu">
                    <div class="card-body bg-terciary">
                        <span class="mb-2 product-label">BRAND</span>
                        <h5 class="mt-1 card-title-size fw-semibold">Memoria USB para computadoras</h5>
                        <p class="card-text text-primary fw-semibold">$20.00</p>
                    </div>
                </div>

                <div class="card">
                    <img src="./img/cpu.jpg" class="img-card" alt="imagen de cpu">
                    <div class="card-body bg-terciary">
                        <span class="mb-2 product-label">BRAND</span>
                        <h5 class="mt-1 card-title-size fw-semibold">Memoria USB para computadoras</h5>
                        <p class="card-text text-primary fw-semibold">$20.00</p>
                    </div>
                </div>

                <div class="card">
                    <img src="./img/cpu.jpg" class="img-card" alt="imagen de cpu">
                    <div class="card-body bg-terciary">
                        <span class="mb-2 product-label">BRAND</span>
                        <h5 class="mt-1 card-title-size fw-semibold">Memoria USB para computadoras</h5>
                        <p class="card-text text-primary fw-semibold">$20.00</p>
                    </div>
                </div>

                <div class="card">
                    <img src="./img/cpu.jpg" class="img-card" alt="imagen de cpu">
                    <div class="card-body bg-terciary">
                        <span class="mb-2 product-label">BRAND</span>
                        <h5 class="mt-1 card-title-size fw-semibold">Memoria USB para computadoras</h5>
                        <p class="card-text text-primary fw-semibold">$20.00</p>
                    </div>
                </div>

                <div class="card">
                    <img src="./img/cpu.jpg" class="img-card" alt="imagen de cpu">
                    <div class="card-body bg-terciary">
                        <span class="mb-2 product-label">BRAND</span>
                        <h5 class="mt-1 card-title-size fw-semibold">Memoria USB para computadoras</h5>
                        <p class="card-text text-primary fw-semibold">$20.00</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Nuestros Productos Finaliza -->

    <?php include '../app/views/common/landing/footer.php'; ?> <!-- Footer -->

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
    crossorigin="anonymous"></script>

</html>
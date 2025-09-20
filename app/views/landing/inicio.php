<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mister PC Boteo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./assets/css/landing.css">
    <style>
        .hero {
            background-image: url(https://res.cloudinary.com/drztldzvn/image/upload/v1758338073/hero_lbtcnh.jpg);
        }
    </style>
</head>

<body>

    <?php include '../app/views/common/landing/header.php'; ?> <!-- Header -->

    <!-- Hero Inicia -->
    <section class="hero position-relative text-white px-2 px-lg-0">
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-50"></div>
        <div class="container-lg h-100 position-relative">
            <div class="row h-100 align-items-center mx-lg-0">
                <div class="col-md-6">
                    <h1 class="fw-semibold display-5 mb-4">Soluciones tecnológicas para todos tus dispositivos</h1>
                    <p>Especialistas en repuestos de hardware y en mantenimiento de equipos, asegurando que tus dispositivos funcionen siempre al máximo rendimiento. Bienvenido a la clínica de tu PC.</p>
                    <a href="#" class="btn btn-primary text-white fw-semibold mt-3 w-auto p-2">
                        Explorar Servicios <i class="bi bi-arrow-right ms-3"></i>
                    </a>

                </div>
            </div>
        </div>
    </section>
    <!-- Hero Finaliza -->

    <!-- Nuestros servicios Inicia -->
    <section class="bg-secondary py-5">
        <div class="container-lg">
            <div class="text-center mb-5">
                <h3 class="text-primary fw-bold mb-4">Nuestros Servicios</h3>
            </div>

            <div class="row g-4 justify-content-center">
                <!-- Servicio 1 -->
                <div class="col-12 col-sm-6 col-lg-4 d-flex">
                    <div class="bg-white rounded text-center p-4 shadow-sm flex-fill">
                        <div class="d-inline-flex align-items-center justify-content-center 
                      bg-primary text-white rounded-circle mb-3"
                            style="width:100px; height:100px; font-size:2.5rem;">
                            <i class="bi bi-tools"></i>
                        </div>
                        <h5 class="text-primary mt-3">Mantenimiento</h5>
                        <p class="my-3">
                            Solucionamos problemas de hardware y software en computadoras de escritorio y portátiles de todas las marcas.
                        </p>
                        <a href="#" class="btn btn-primary mt-2">Cotízar Ahora</a>
                    </div>
                </div>

                <!-- Servicio 2 -->
                <div class="col-12 col-sm-6 col-lg-4 d-flex">
                    <div class="bg-white rounded text-center p-4 shadow-sm flex-fill">
                        <div class="d-inline-flex align-items-center justify-content-center 
                      bg-primary text-white rounded-circle mb-3"
                            style="width:100px; height:100px; font-size:2.5rem;">
                            <i class="bi bi-laptop"></i>
                        </div>
                        <h5 class="text-primary mt-3">Reparación de equipos</h5>
                        <p class="my-3">
                            Solucionamos problemas de hardware y software en computadoras de escritorio y portátiles de todas las marcas.
                        </p>
                        <a href="#" class="btn btn-primary mt-2">Cotízar Ahora</a>
                    </div>
                </div>

                <!-- Servicio 3 -->
                <div class="col-12 col-sm-6 col-lg-4 d-flex">
                    <div class="bg-white rounded text-center p-4 shadow-sm flex-fill">
                        <div class="d-inline-flex align-items-center justify-content-center 
                      bg-primary text-white rounded-circle mb-3"
                            style="width:100px; height:100px; font-size:2.5rem;">
                            <i class="bi bi-cpu"></i>
                        </div>
                        <h5 class="text-primary mt-3">Venta de repuestos</h5>
                        <p class="my-3">
                            Ofrecemos repuestos y accesorios de alta calidad y de las mejores marcas para todo tipo de computadoras.
                        </p>
                        <a href="#" class="btn btn-primary mt-2">Cotízar Ahora</a>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Nuestros servicios Finaliza -->

    <!-- Productos Destacados Inicia -->
    <section class="px-2 px-lg-0">
        <div class="container-lg py-5">
            <div>
                <h3 class="text-primary fw-bold mb-4 text-center">Productos Destacados</h3>
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                    <p class="fw-semibold text-center">¡Los productos mas destacados de nuestra tienda!</p>
                    <a href="#" class="btn btn-primary text-end">Ver todos <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>

            <div class="product-container">
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

                </div>

            </div>
        </div>
    </section>
    <!-- Productos Destacados Finaliza -->

    <!-- Porque elegirnos inicia -->
    <section class="bg-secondary py-5 px-2 px-lg-0">
        <div class="container-lg">
            <div class="row align-items-center">
                <div class="col-lg-6 text-lg-start text-black">
                    <h3 class="text-primary mb-4 fw-bold">Tu aliado en tecnología</h3>
                    <p>En Mister Pc Boteo nos dedicamos a ofrecer soluciones tecnológicas de calidad con un servicio
                        personalizado y profesional.</p>
                    <ul class="list-unstyled mt-4">
                        <li class="d-flex align-items-start mb-3 gap-3">
                            <i class="bi bi-check2-circle fs-3 text-primary"></i>
                            <div>
                                <h5 class="text-primary fw-semibold"> Técnicos Certificados</h5>
                                <p class="m-0">Nuestro equipo cuenta con certificaciones y años de experiencia en el
                                    sector tecnológico.</p>
                            </div>
                        </li>
                        <li class="d-flex align-items-start mb-3 gap-3">
                            <i class="bi bi-patch-check fs-3 text-primary"></i>
                            <div>
                                <h5 class="text-primary fw-semibold"> Repuestos Originales</h5>
                                <p>Trabajamos únicamente con componentes originales y de las mejores marcas del mercado.
                                </p>
                            </div>
                        </li>
                        <li class="d-flex align-items-start mb-3 gap-3">
                            <i class="bi bi-clock-history fs-3 text-primary"></i>
                            <div>
                                <h5 class="text-primary fw-semibold"> Servicio Rápido</h5>
                                <p>Entendemos la importancia de tus equipos, por eso ofrecemos soluciones en el menor
                                    tiempo posible.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="https://res.cloudinary.com/drztldzvn/image/upload/v1753135293/tecnicos_bdtaai.jpg" alt="Imagen" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>
    <!-- Porque elegirnos termina -->

    <!--Ayuda con tus equipos inicia-->
    <section class="py-5 bg-primary">
        <div class="container">
            <div class="text-center mx-auto" style="max-width: 700px;">
                <h3 class="text-white fw-bold mb-4">¿Problemas con tus equipos?</h3>
                <p class="text-white mb-4">
                    Nuestro equipo de expertos está listo para ayudarte a mantener tus dispositivos funcionando de manera óptima. ¡No esperes más!
                </p>
                <a href="#" class="btn btn-light  fw-semibold text-primary shadow-sm">
                    Contáctanos ahora
                </a>
            </div>
        </div>
    </section>

    <!--ayuda con tus equipos termina-->

    <!-- Sección Marcas -->
    <section class="bg-white py-5">
        <div class="container-lg text-center mb-5">
            <h3 class="fw-bold text-primary mb-4">Marcas con las que trabajamos</h3>
            <p>Repuestos, accesorios y soporte técnico de las mejores marcas de tecnología.</p>
        </div>

        <!-- Carrusel de marcas -->
        <div class="container-lg">
            <div class="brand-carousel">
                <div class="brand-track">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/HP_logo_630x630.png/640px-HP_logo_630x630.png" alt="HP" class="brand-logo">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/48/Dell_Logo.svg" alt="Dell" class="brand-logo">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d3/Logo_Lenovo_%282003%29.png/640px-Logo_Lenovo_%282003%29.png" alt="Lenovo" class="brand-logo">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/00/Acer_2011.svg/640px-Acer_2011.svg.png" alt="Acer" class="brand-logo">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b0/ASUS_Corporate_Logo.svg/640px-ASUS_Corporate_Logo.svg.png" alt="Asus" class="brand-logo">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6a/Intel_logo_%282020%2C_dark_blue%29.svg" alt="Intel" class="brand-logo">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/49/AMD_Ryzen_logo.svg/640px-AMD_Ryzen_logo.svg.png" alt="AMD" class="brand-logo">
                    <img src="https://upload.wikimedia.org/wikipedia/sco/2/21/Nvidia_logo.svg" alt="Nvidia" class="brand-logo">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg" alt="Microsoft" class="brand-logo">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/e/ef/Kingston_Technology_Corporation_logo.png?20220904183850" alt="Kingston" class="brand-logo">

                    <!-- Se repiten para efecto infinito -->
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/HP_logo_630x630.png/640px-HP_logo_630x630.png" alt="HP" class="brand-logo">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/48/Dell_Logo.svg" alt="Dell" class="brand-logo">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d3/Logo_Lenovo_%282003%29.png/640px-Logo_Lenovo_%282003%29.png" alt="Lenovo" class="brand-logo">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/00/Acer_2011.svg/640px-Acer_2011.svg.png" alt="Acer" class="brand-logo">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b0/ASUS_Corporate_Logo.svg/640px-ASUS_Corporate_Logo.svg.png" alt="Asus" class="brand-logo">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6a/Intel_logo_%282020%2C_dark_blue%29.svg" alt="Intel" class="brand-logo">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/49/AMD_Ryzen_logo.svg/640px-AMD_Ryzen_logo.svg.png" alt="AMD" class="brand-logo">
                    <img src="https://upload.wikimedia.org/wikipedia/sco/2/21/Nvidia_logo.svg" alt="Nvidia" class="brand-logo">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg" alt="Microsoft" class="brand-logo">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/e/ef/Kingston_Technology_Corporation_logo.png?20220904183850" alt="Kingston" class="brand-logo">
                </div>
            </div>
        </div>
    </section>


    <?php include '../app/views/common/landing/footer.php'; ?> <!-- Footer -->

</body>

<style>
    .brand-carousel {
        overflow: hidden;
        position: relative;
        width: 100%;
    }

    .brand-track {
        display: flex;
        gap: 60px;
        width: max-content;
        animation: scrollBrands 50s linear infinite;
        /* antes estaba en 25s */
    }

    .brand-logo {
        height: 50px;
        object-fit: contain;
        filter: grayscale(100%);
        transition: filter 0.3s ease;
    }

    .brand-logo:hover {
        filter: grayscale(0%);
    }

    @keyframes scrollBrands {
        from {
            transform: translateX(0);
        }

        to {
            transform: translateX(-50%);
        }
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
    crossorigin="anonymous"></script>

<script>
    //Script para botones
    const contenedorProductos = document.querySelector('.product-scroll');



    function moverIzquierda() {
        contenedorProductos.scrollBy({
            left: -200,
            behavior: 'smooth'
        });
    }

    function moverDerecha() {
        contenedorProductos.scrollBy({
            left: 200,
            behavior: 'smooth'
        });
    }

    contenedorProductos.addEventListener('scroll', actualizarBotones);
    window.addEventListener('resize', actualizarBotones);
    botonIzquierda.addEventListener('click', moverIzquierda);
    botonDerecha.addEventListener('click', moverDerecha);

    actualizarBotones();
</script>

</html>
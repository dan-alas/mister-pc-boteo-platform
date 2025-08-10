<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./assets/css/landing.css">
</head>

<body>

    <?php include '../app/views/common/landing/header.php'; ?> <!-- Header -->

    <!-- Hero Inicia -->
    <section class="position-relative overflow-hidden px-2 px-md-0">

        <video autoplay muted loop playsinline preload="auto"
            class="w-100 h-100 position-absolute top-50 start-50 translate-middle"
            style="object-fit: cover; z-index: -1;">
            <source src="https://res.cloudinary.com/drztldzvn/video/upload/v1752727941/video-header_vr2aao.mp4"
                type="video/mp4">
            Tu navegador no soporta videos HTML5.
        </video>

        <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,0.4); z-index: 0;"></div>

        <div class="container position-relative text-white" style="z-index: 1;">
            <div class="row">
                <div class="col-md-7 gap-4 d-flex flex-column justify-content-center" style="height: 90vh;">
                    <h1 class="fw-bold display-5">Soluciones tecnológicas para todos tus dispositivos</h1>
                    <p>Especialistas en repuestos de hardware y servicios de mantenimiento para mantener tus equipos
                        funcionando al máximo rendimiento.
                        Bienvenido a la clínica de tu PC.</p>
                    <div>
                        <a href="#" class="btn btn-primary text-white mt-3 w-auto">
                            Explorar Servicios <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Hero Termina -->

    <!-- Nuestros servicios Inicia -->
    <section class="bg-secondary px-2 px-lg-0">
        <div class="container-lg py-5">
            <div class="text-center mb-5">
                <h3 class="text-primary fw-semibold mb-4">Nuestros Servicios</h3>
                <p>Reparamos, damos mantenimiento y vendemos repuestos con garantía y rapidez. Bienvenido a la Clinica
                    de tu PC</p>
            </div>
            <section class="row justify-content-center">
                <div class="col-md-4 mb-3 mb-xl-0">

                    <div class="bg-light rounded text-center py-5 px-4">
                        <img src="/img/mantenimiento.png" alt="mantenimiento" width="120">
                        <h5 class="text-primary mt-3">Mantenimiento</h5>
                        <p class="my-4">Solucionamos problemas de hardware y software en computadoras de escritorio y
                            portátiles de
                            todas las marcas. </p>
                        <a href="#" class="btn btn-primary">COTÍZALO</a>
                    </div>
                </div>

                <div class="col-md-4 mb-3 mb-xl-0">
                    <div class="bg-light rounded text-center py-5 px-4">
                        <img src="/img/reparar.png" alt="reparacion" width="120">
                        <h5 class="text-primary mt-3">Reparación de equipos</h5>
                        <p class="my-4">Solucionamos problemas de hardware y software en computadoras de escritorio y
                            portátiles de
                            todas las marcas. </p>
                        <a href="#" class="btn btn-primary">COTÍZALO</a>
                    </div>
                </div>

                <div class="col-md-4 mb-3 mb-xl-0">
                    <div class="bg-light rounded text-center py-5 px-4">
                        <img src="/img/repuestos.png" alt="repuestos" width="120">
                        <h5 class="text-primary mt-3">Venta de repuestos</h5>
                        <p class="my-4">Solucionamos problemas de hardware y software en computadoras de escritorio y
                            portátiles de
                            todas las marcas. </p>
                        <a href="#" class="btn btn-primary">COTÍZALO</a>
                    </div>
                </div>

            </section>
        </div>
    </section>
    <!-- Nuestros servicios Finaliza -->

    <!-- Productos Destacados Inicia -->
    <section class="px-2 px-lg-0">
        <div class="container-lg py-5">
            <div>
                <h3 class="text-primary fw-semibold mb-4 text-center">Productos Destacados</h3>
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                    <p class="fw-semibold">¡Los productos mas destacados de nuestra tienda!</p>
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

                <!-- Botones laterales, visibles siempre -->
                <button class="scroll-btn left" aria-label="Scroll izquierda">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <button class="scroll-btn right" aria-label="Scroll derecha">
                    <i class="bi bi-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>
    <!-- Productos Destacados Finaliza -->

    <!-- Porque elegirnos inicia -->
    <section class="bg-secondary py-5 px-2 px-lg-0">
        <div class="container-lg">
            <div class="row align-items-center">
                <div class="col-lg-6 text-lg-start text-black">
                    <h3 class="text-primary mb-3 fw-semibold">¿Por qué elegirnos?</h3>
                    <p>En Mister Pc Boteo nos dedicamos a ofrecer soluciones tecnológicas de calidad con un servicio
                        personalizado y profesional.</p>
                    <ul class="list-unstyled mt-4">
                        <li class="d-flex align-items-start mb-3 gap-3">
                            <i class="bi bi-check2-circle fs-3 text-primary"></i>
                            <div>
                                <h5 class="text-primary"> Técnicos Certificados</h5>
                                <p class="m-0">Nuestro equipo cuenta con certificaciones y años de experiencia en el
                                    sector tecnológico.</p>
                            </div>
                        </li>
                        <li class="d-flex align-items-start mb-3 gap-3">
                            <i class="bi bi-patch-check fs-3 text-primary"></i>
                            <div>
                                <h5 class="text-primary"> Repuestos Originales</h5>
                                <p>Trabajamos únicamente con componentes originales y de las mejores marcas del mercado.
                                </p>
                            </div>
                        </li>
                        <li class="d-flex align-items-start mb-3 gap-3">
                            <i class="bi bi-clock-history fs-3 text-primary"></i>
                            <div>
                                <h5 class="text-primary"> Servicio Rápido</h5>
                                <p>Entendemos la importancia de tus equipos, por eso ofrecemos soluciones en el menor
                                    tiempo posible.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="img/tecnicos.jpg" alt="Técnicos trabajando en una PC" class="img-fluid rounded shadow">
                </div>
            </div>
        </div>
    </section>
    <!-- Porque elegirnos termina -->

    <!--Ayuda con tus equipos inicia-->
    <section class="py-5 bg-primary">
        <div class="container">
            <div>
                <div class="w-75 my-0 mx-auto text-center">
                    <h3 class="text-white fw-semibold">¿Necesitas ayuda con tus equipos?</h3>
                    <p class="text-white my-4">Contáctanos hoy mismo y descubre cómo podemos ayudarte a mantener tus
                        dispositivos funcionando perfectamente.</p>
                    <a href="#" class="btn btn-light text-primary fw-semibold">¡Contáctanos ahora!</a>
                </div>
            </div>
        </div>
    </section>
    <!--ayuda con tus equipos termina-->

    <?php include '../app/views/common/landing/footer.php'; ?> <!-- Footer -->

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
    crossorigin="anonymous"></script>

<script>
    //Script para botones
    const contenedorProductos = document.querySelector('.product-scroll');
    const botonIzquierda = document.querySelector('.scroll-btn.left');
    const botonDerecha = document.querySelector('.scroll-btn.right');

    function actualizarBotones() {
        const distanciaActual = contenedorProductos.scrollLeft;
        const maximoScroll = contenedorProductos.scrollWidth - contenedorProductos.clientWidth;
        botonIzquierda.disabled = distanciaActual <= 0;
        botonDerecha.disabled = distanciaActual >= maximoScroll - 1;
    }

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
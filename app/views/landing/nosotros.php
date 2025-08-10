<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="./assets/css/landing.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

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
                    <h1 class="fw-semibold display-5 mb-4">¿Quiénes somos?</h1>
                    <p>Conoce la historia, misión y valores que impulsan a Mister Pc Boteo a ser líderes en el sector
                        tecnológico</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Finaliza -->

    <!-- Quienes somos Inicia -->
    <section class="">
        <div class="container-lg py-5">
            <h3 class="text-primary fw-semibold text-center">¿Quienes somos?</h3>
            <div class="row mx-2 mx-lg-0 align-items-center justify-content-between mt-5">
                <div class="col-lg-6 text-lg-start text-black">
                    <p class="text-center text-lg-start">TechnoDev Innovations es una empresa dedicada al desarrollo de
                        soluciones tecnológicas innovadoras para emprendedores y pequeñas empresas. Nos especializamos
                        en la creación de páginas web personalizadas, estrategias de marketing digital y consultoría
                        tecnológica. Nuestro enfoque es brindar herramientas accesibles y eficientes para impulsar la
                        presencia digital de nuestros clientes, ayudándolos a crecer en un mundo cada vez más
                        tecnológico.</p>
                </div>
                <div class="col-lg-5 text-center mt-4 mt-lg-0">
                    <img src="https://res.cloudinary.com/drztldzvn/image/upload/v1753133485/logo-mr-pc_l1rh9t.png" alt="Logo Mister Pc" class="img-fluid rounded shadow" width="300">
                </div>
            </div>
        </div>
    </section>
    <!-- Quienes somos Finaliza -->

    <!-- Mision y Vision Inicia -->
    <section>
        <div class="py-3 px-2 px-lg-0">
            <div class="container-lg my-5">
                <div class="row justify-content-center g-5">

                    <!-- Visión -->
                    <div class="col-lg-5">
                        <h3 class="text-primary text-center mb-3 fw-semibold">Visión</h3>
                        <div class="w-100 rounded">
                            <div class="bg-secondary text-center px-4 py-5 rounded">
                                <p class="">
                                    Ser reconocidos como la empresa líder en el sector de mantenimiento y repuestos
                                    tecnológicos, destacando por nuestra innovación, excelencia en el servicio y
                                    compromiso con la sostenibilidad, expandiendo nuestra presencia a nivel nacional e
                                    internacional.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="d-none d-lg-block col-lg-1"></div>

                    <!-- Misión -->
                    <div class="col-lg-5">
                        <h3 class="text-primary text-center mb-3 fw-semibold">Misión</h3>
                        <div class="w-100">
                            <div class="bg-secondary text-center px-4 py-5 rounded">
                                <p class="">
                                    Proporcionar soluciones tecnológicas integrales de alta calidad, ofreciendo
                                    repuestos originales y servicios de mantenimiento especializados que garanticen el
                                    óptimo funcionamiento de los equipos de nuestros clientes, contribuyendo así a su
                                    productividad y satisfacción.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Mision y vision Finaliza-->

    <!-- Nuestros valores Inicia -->
    <section class="bg-white py-5 px-2 px-lg-0">
        <div class="container-lg text-center">
            <h3 class="fw-semibold text-primary">Nuestros Valores</h3>
            <div class="row align-items-center text-md-start mt-5">
                <div class="col-md-4 col-sm-6 mb-4 d-flex">
                    <div class="card-value d-flex flex-column p-4 text-center">
                        <img src="./img/calidad.png" class="img-valor d-block mx-auto mb-3" alt="Innovación">
                        <h5 class="fw-bold text-center">Calidad</h5>
                        <p>En TechnoSpark, fomentamos ideas nuevas y soluciones creativas que impulsan nuestro
                            crecimiento.</p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 mb-4 d-flex">
                    <div class="card-value d-flex flex-column p-4 text-center">
                        <img src="./img/innovacion.png" class="img-valor d-block mx-auto mb-3" alt="Innovación">
                        <h5 class="fw-bold text-center">Innovación</h5>
                        <p>En TechnoSpark, fomentamos ideas nuevas y soluciones creativas que impulsan nuestro
                            crecimiento.</p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 mb-4 d-flex">
                    <div class="card-value d-flex flex-column p-4 text-center">
                        <img src="./img/honestidad.png" class="img-valor d-block mx-auto mb-3" alt="Innovación">
                        <h5 class="fw-bold text-center">Honestidad</h5>
                        <p>En TechnoSpark, fomentamos ideas nuevas y soluciones creativas que impulsan nuestro
                            crecimiento.</p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 mb-4 d-flex">
                    <div class="card-value d-flex flex-column p-4 text-center">
                        <img src="./img/pasion.png" class="img-valor d-block mx-auto mb-3" alt="Innovación">
                        <h5 class="fw-bold text-center">Pasion</h5>
                        <p>En TechnoSpark, fomentamos ideas nuevas y soluciones creativas que impulsan nuestro
                            crecimiento.</p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 mb-4 d-flex">
                    <div class="card-value d-flex flex-column p-4 text-center">
                        <img src="./img/responsabilidad.png" class="img-valor d-block mx-auto mb-3" alt="Innovación">
                        <h5 class="fw-bold text-center">Responsabilidad</h5>
                        <p>En TechnoSpark, fomentamos ideas nuevas y soluciones creativas que impulsan nuestro
                            crecimiento.</p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 mb-4 d-flex">
                    <div class="card-value d-flex flex-column p-4 text-center">
                        <img src="./img/orientacion-cliente.png" class="img-valor d-block mx-auto mb-3"
                            alt="Innovación">
                        <h5 class="fw-bold text-center">Cercania</h5>
                        <p>En TechnoSpark, fomentamos ideas nuevas y soluciones creativas que impulsan nuestro
                            crecimiento.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Nuestros valores finaliza -->

    <?php include '../app/views/common/landing/footer.php'; ?> <!-- Footer -->

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
    crossorigin="anonymous"></script>

</html>
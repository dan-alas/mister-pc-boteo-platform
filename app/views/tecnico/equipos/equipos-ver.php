<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de equipos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../assets/css/paneles.css">
</head>

<body class="vh-100 d-flex flex-column">

    <?php include __DIR__ . '/../../../../app/views/common/panel/header.php'; ?>

    <div class="flex-grow-1 d-flex flex-column flex-md-row" style="min-height: 0;">

       <?php include __DIR__ . '/../../../../app/views/common/panel/aside_tecnico.php'; ?>

        <main class="flex-grow-1 overflow-auto p-4">
            <h4 class="text-center mb-4 fw-bold">VER INFORMACIÓN DE EQUIPO</h4>

            <div class="text-end mb-3">
                <div class="mt-3 mt-md-auto">
                    <a href="../equipos.php" class="btn btn-warning text-white"><i
                            class="bi bi-box-arrow-left me-1"></i>Regresar</a>
                    <a href="#" class="btn btn-success text-white">PDF</a>
                </div>
            </div>

            <!-- Formulario Inicia  -->
            <div>
                <div class="border p-4 rounded">
                    <h5 class="fw-bold">MISTER PC BOTEO</h5>
                    <p class="mb-4">DETALLE DEL EQUIPO</p>

                    <!-- I. Datos del evento -->
                    <h6>I. Datos Generales</h6>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Propietario:</label>
                            <div class="form-control-plaintext">Daniel Alas</div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Fecha de ingreso:</label>
                            <div class="form-control-plaintext">2025-06-30</div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Tipo de problema:</label>
                            <div class="form-control-plaintext">Hardware</div>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="form-label fw-semibold">Estado del equipo:</label>
                            <div class="form-control-plaintext">En reparación</div>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="form-label fw-semibold">Tecnico Responsable:</label>
                            <div class="form-control-plaintext">Daniel Alas</div>
                        </div>
                    </div>

                    <!-- II. Datos previos del equipo -->
                    <h6 class="mt-5">II. Datos previos del equipo</h6>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Marca:</label>
                            <div class="form-control-plaintext">Dell</div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Modelo:</label>
                            <div class="form-control-plaintext">Inspiron 15</div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-labe fw-semibold">Nombre de equipo:</label>
                            <div class="form-control-plaintext">PC-OFICINA-01</div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <h6>MEMORIA RAM</h6>
                            <label class="form-label fw-semibold">Tipo:</label>
                            <div class="form-control-plaintext">DDR4</div>
                            <label class="form-label fw-semibold">Capacidad:</label>
                            <div class="form-control-plaintext">8 GB</div>
                            <label class="form-label fw-semibold">Slot vacíos:</label>
                            <div class="form-control-plaintext">1</div>
                        </div>
                        <div class="col-md-4">
                            <h6>PROCESADOR</h6>
                            <label class="form-label fw-semibold">Marca:</label>
                            <div class="form-control-plaintext">Intel</div>
                            <label class="form-label fw-semibold">Velocidad:</label>
                            <div class="form-control-plaintext">2.5 GHz</div>
                        </div>
                        <div class="col-md-4">
                            <h6>SISTEMA OPERATIVO</h6>
                            <label class="form-label fw-semibold">Nombre:</label>
                            <div class="form-control-plaintext">Windows</div>
                            <label class="form-label fw-semibold">Versión:</label>
                            <div class="form-control-plaintext">10</div>
                            <label class="form-label fw-semibold">Arquitectura:</label>
                            <div class="form-control-plaintext">64 bits</div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <h6>DISCO DURO</h6>
                            <label class="form-label fw-semibold">Capacidad:</label>
                            <div class="form-control-plaintext">1 TB</div>
                            <label class="form-label fw-semibold"># Particiones:</label>
                            <div class="form-control-plaintext">6</div>
                        </div>
                        <div class="col-md-4">
                            <h6>TARJETA MADRE</h6>
                            <label class="form-label fw-semibold">Modelo:</label>
                            <div class="form-control-plaintext">Asus</div>

                        </div>
                        <div class="col-md-4">
                            <h6>PUERTOS</h6>
                            <label class="form-label fw-semibold">Puertos:</label>
                            <div class="form-control-plaintext">USB 3.0, HDMI, RJ45</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <h6>OTRA INFORMACIÓN</h6>
                        <label class="form-label fw-semibold">Información:</label>
                        <div class="form-control-plaintext">Equipo en buenas condiciones generales.</div>
                    </div>

                    <div class="text-end">
                        <a href="../equipos.php" class="btn btn-secondary">Regresar</a>
                    </div>
                </div>
            </div>
            <!-- Formulario Finaliza  -->
        </main>

    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
    crossorigin="anonymous"></script>

</html>
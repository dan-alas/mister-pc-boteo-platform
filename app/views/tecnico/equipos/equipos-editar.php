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
            <h4 class="text-center mb-4 fw-bold">EDITAR EQUIPO</h4>

            <div class="text-end mb-3">
                <div class="mt-3 mt-md-auto">
                    <a href="../equipos.php" class="btn btn-warning text-white"><i
                            class="bi bi-box-arrow-left me-1"></i>Regresar</a>
                </div>
            </div>

            <!-- Formulario Inicia  -->
            <div>
                <div class="border p-4 rounded">
                    <h5 class="fw-bold">MISTER PC BOTEO</h5>
                    <p class="mb-2">REGISTRO DE MANTENIMIENTO CORRECTIVO Y PREVENTIVO</p>
                    <p class="mb-4">La secciones con letra <span class="text-success fw-semibold">verde</span> deben ser agregadas hasta finalizar la reparación</p>

                    <!-- I. Datos del evento -->
                    <h6>I. Datos Generales</h6>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Propietario: </label>
                            <select class="form-select">
                                <option disabled>Seleccione un propietario</option>
                                <option value="1" selected>Daniel Alas</option>
                                <option value="2">Cesar Ramirez</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Fecha de ingreso: </label>
                            <input type="date" class="form-control" value="2025-06-30">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold text-success">Fecha de Finalización: </label>
                            <input type="date" class="form-control" value="2025-07-15">
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="form-label fw-semibold">Tipo de problema: </label>
                            <select class="form-select">
                                <option disabled>Selecciona el tipo</option>
                                <option value="1" selected>Hardware</option>
                                <option value="2">Software</option>
                                <option value="3">Hardware y Software</option>
                            </select>
                        </div>


                        <div class="col-md-4 mt-3">
                            <label class="form-label fw-semibold">Estado actual: </label>
                            <select class="form-select">
                                <option selected disabled>Selecciona el estado</option>
                                <option value="1">No iniciado</option>
                                <option value="2">En proceso</option>
                                <option value="3">Finalizado</option>
                                <option value="3">Entregado</option>
                            </select>
                        </div>
                    </div>

                    <!-- II. Datos previos del equipo -->
                    <h6 class="mt-5">II. Datos previos del equipo</h6>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Marca: </label>
                            <input type="text" class="form-control" value="Dell">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Modelo: </label>
                            <input type="text" class="form-control" value="Inspiron 15">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Nombre de equipo: </label>
                            <input type="text" class="form-control" value="PC-OFICINA-01">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <h6>MEMORIA RAM</h6>
                            <label class="form-label fw-semibold">Tipo:</label>
                            <input type="text" class="form-control mb-2" value="DDR4">
                            <label class="form-label fw-semibold">Capacidad:</label>
                            <input type="text" class="form-control mb-2" value="8 GB">
                            <label class="form-label fw-semibold">Slot vacíos:</label>
                            <input type="text" class="form-control" value="1">
                        </div>
                        <div class="col-md-4">
                            <h6>PROCESADOR</h6>
                            <label class="form-label fw-semibold">Marca:</label>
                            <input type="text" class="form-control mb-2" value="Intel">
                            <label class="form-label fw-semibold">Velocidad:</label>
                            <input type="text" class="form-control" value="2.5 GHz">
                        </div>
                        <div class="col-md-4">
                            <h6>SISTEMA OPERATIVO</h6>
                            <label class="form-label fw-semibold">Nombre:</label>
                            <input type="text" class="form-control mb-2" value="Windows">
                            <label class="form-label fw-semibold">Versión:</label>
                            <input type="text" class="form-control mb-2" value="10">
                            <label class="form-label fw-semibold">Arquitectura:</label>
                            <input type="text" class="form-control" value="64 bits">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <h6>DISCO DURO</h6>
                            <label class="form-label fw-semibold">Capacidad:</label>
                            <input type="text" class="form-control mb-2" value="1 TB">
                            <label class="form-label fw-semibold"># Particiones:</label>
                            <input type="text" class="form-control" value="2">
                        </div>
                        <div class="col-md-4">
                            <h6>TARJETA MADRE</h6>
                            <label class="form-label fw-semibold">Modelo:</label>
                            <input type="text" class="form-control mb-2" value="asus">

                        </div>
                        <div class="col-md-4">
                            <h6>PUERTOS</h6>
                            <label class="form-label fw-semibold">Puertos:</label>
                            <input type="text" class="form-control" value="USB 3.0, HDMI, RJ45">
                        </div>
                    </div>

                    <div class="mb-3">
                        <h6>OTRA INFORMACIÓN</h6>
                        <label class="form-label fw-semibold">Información:</label>
                        <textarea class="form-control" rows="3">Equipo en buenas condiciones generales.</textarea>
                    </div>

                    <!-- III. Aplicación del equipo -->
                    <h6 class="mt-5">III. Aplicación del equipo (reparaciones)</h6>

                    <div class="mb-3">
                        <label class="form-label fw-semibold text-success">Describa el proceso que se aplicó:</label>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold text-success">Detalles de problemas encontrados:</label>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Editar equipo</button>
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
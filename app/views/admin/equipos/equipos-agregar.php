<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Equipo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../assets/css/paneles.css">
</head>

<body class="vh-100 d-flex flex-column">

    <?php include __DIR__ . '/../../../../app/views/common/panel/header.php'; ?>

    <div class="flex-grow-1 d-flex flex-column flex-md-row" style="min-height: 0;">

        <?php include __DIR__ . '/../../../../app/views/common/panel/aside_admin.php'; ?>

        <!-- Agregar Equipo Inicia -->
        <main class="flex-grow-1 overflow-auto p-4">
            <h4 class="text-center mb-4 fw-bold">AGREGAR EQUIPO EN REPARACIÓN</h4>

            <div class="text-end mb-3">
                <div class="mt-3 mt-md-auto">
                    <a href="../equipos.php" class="btn btn-warning text-white"><i
                            class="bi bi-box-arrow-left me-1"></i>Regresar</a>
                </div>
            </div>

            <!-- Empieza formulario  -->
            <div>

                <form method="POST" class="border p-4 rounded">
                    <h5 class="fw-bold">MISTER PC BOTEO</h5>
                    <p class="mb-4">REGISTRO DE EQUIPO PARA REPARACIÓN O MANTENIMIENTO</p>

                    <!-- I. Datos Generales -->
                    <h6>I. Datos Generales</h6>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Propietario:</label>
                            <select name="propietario_id" class="form-select" required>
                                <option selected disabled>Seleccione un propietario</option>
                                <?php foreach ($propietarios as $prop): ?>
                                    <option value="<?= $prop['id'] ?>"><?= $prop['nombre_completo'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Fecha de ingreso:</label>
                            <input type="date" name="fecha_ingreso" class="form-control" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Tipo de problema:</label>
                            <select name="tipo_problema" class="form-select" required>
                                <option selected disabled>Selecciona el tipo</option>
                                <option value="Hardware">Hardware</option>
                                <option value="Software">Software</option>
                                <option value="ambos">Hardware y Software</option>
                            </select>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="form-label fw-semibold">Estado del equipo:</label>
                            <select name="estado_actual" class="form-select" required>
                                <option selected disabled>Selecciona el estado</option>
                                <option value="No iniciado">No iniciado</option>
                                <option value="En proceso">En proceso</option>
                                <option value="Finalizado">Finalizado</option>
                                <option value="Entregado">Entregado</option>
                            </select>
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="form-label fw-semibold text-danger">Asignar reparación:</label>
                            <select name="tecnico_id" class="form-select" required>
                                <option selected disabled>Seleccione un técnico</option>
                                <?php foreach ($tecnicos as $tec): ?>
                                    <option value="<?= $tec['id'] ?>"><?= $tec['nombre_completo'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <!-- II. Datos previos del equipo -->
                    <h6 class="mt-5">II. Datos previos del equipo</h6>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Marca:</label>
                            <input type="text" name="marca" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Modelo:</label>
                            <input type="text" name="modelo" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Nombre de equipo:</label>
                            <input type="text" name="nombre_equipo" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <h6>MEMORIA RAM</h6>
                            <label class="form-label fw-semibold">Tipo:</label>
                            <input type="text" name="ram_tipo" class="form-control mb-2">
                            <label class="form-label fw-semibold">Capacidad:</label>
                            <input type="text" name="ram_capacidad" class="form-control mb-2">
                            <label class="form-label fw-semibold">Velocidad:</label>
                            <input type="text" name="ram_velocidad" class="form-control mb-2">
                            <label class="form-label fw-semibold">Slots vacíos:</label>
                            <input type="text" name="ram_slots_vacios" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <h6>PROCESADOR</h6>
                            <label class="form-label fw-semibold">Marca:</label>
                            <input type="text" name="cpu_marca" class="form-control mb-2">
                            <label class="form-label fw-semibold">Modelo:</label>
                            <input type="text" name="cpu_modelo" class="form-control mb-2">
                            <label class="form-label fw-semibold">Velocidad:</label>
                            <input type="text" name="cpu_velocidad" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <h6>SISTEMA OPERATIVO</h6>
                            <label class="form-label fw-semibold">Nombre:</label>
                            <input type="text" name="so_nombre" class="form-control mb-2">
                            <label class="form-label fw-semibold">Versión:</label>
                            <input type="text" name="so_version" class="form-control mb-2">
                            <label class="form-label fw-semibold">Arquitectura:</label>
                            <input type="text" name="so_arquitectura" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <h6>DISCO DURO</h6>
                            <label class="form-label fw-semibold">Capacidad:</label>
                            <input type="text" name="almacenamiento_cap" class="form-control mb-2">
                            <label class="form-label fw-semibold">Particiones:</label>
                            <input type="text" name="almacenamiento_particiones" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <h6>TARJETA MADRE</h6>
                            <label class="form-label fw-semibold">Modelo:</label>
                            <input type="text" name="placa_modelo" class="form-control mb-2">
                        </div>

                        <div class="col-md-4">
                            <h6>PUERTOS</h6>
                            <label class="form-label fw-semibold">Puertos:</label>
                            <input type="text" name="puertos" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <h6>OTRA INFORMACIÓN</h6>
                        <label class="form-label fw-semibold">Información extra:</label>
                        <textarea name="info_extra" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Agregar equipo</button>
                    </div>
                </form>


            </div>
        </main>
        <!-- Agregar Equipo Finaliza -->

    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
    crossorigin="anonymous"></script>

</html>
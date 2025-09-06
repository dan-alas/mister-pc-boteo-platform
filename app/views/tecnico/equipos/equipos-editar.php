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
            <h4 class="text-center mb-4 fw-bold">ACTUALIZAR INFORMACION Y EQUIPO</h4>

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

                    <form method="post">
                        <!-- I. Datos Generales -->
                        <h6>I. Datos Generales</h6>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Propietario: </label>
                                <select name="propietario_id" class="form-select">
                                    <option disabled>Seleccione un propietario</option>
                                    <?php foreach ($propietarios as $prop): ?>
                                        <option value="<?= $prop['id'] ?>" <?= ($equipo['propietario_id'] == $prop['id']) ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($prop['nombre_completo']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Fecha de ingreso: </label>
                                <input type="date" name="fecha_ingreso" class="form-control" value="<?= htmlspecialchars($equipo['fecha_ingreso']) ?>">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold text-success">Fecha de Finalización: </label>
                                <input type="date" name="fecha_finalizacion" class="form-control" value="<?= htmlspecialchars($equipo['fecha_finalizacion']) ?>">
                            </div>

                            <div class="col-md-4 mt-3">
                                <label class="form-label fw-semibold">Tipo de problema: </label>
                                <select name="tipo_problema" class="form-select">
                                    <option value="hardware" <?= ($equipo['tipo_problema'] == 'hardware') ? 'selected' : '' ?>>Hardware</option>
                                    <option value="software" <?= ($equipo['tipo_problema'] == 'software') ? 'selected' : '' ?>>Software</option>
                                    <option value="ambos" <?= ($equipo['tipo_problema'] == 'ambos') ? 'selected' : '' ?>>Hardware y Software</option>
                                </select>
                            </div>


                            <div class="col-md-4 mt-3">
                                <label class="form-label fw-semibold">Estado actual: </label>
                                <select name="estado_actual" class="form-select">
                                    <option value="no_iniciado" <?= ($equipo['estado_actual'] == 'no_iniciado') ? 'selected' : '' ?>>No iniciado</option>
                                    <option value="en_proceso" <?= ($equipo['estado_actual'] == 'en_proceso') ? 'selected' : '' ?>>En proceso</option>
                                    <option value="finalizado" <?= ($equipo['estado_actual'] == 'finalizado') ? 'selected' : '' ?>>Finalizado</option>
                                    <option value="entregado" <?= ($equipo['estado_actual'] == 'entregado') ? 'selected' : '' ?>>Entregado</option>
                                </select>
                            </div>
                        </div>

                        <input type="hidden" name="tecnico_id" value="<?= $_SESSION['usuario_id'] ?>">


                        <!-- II. Datos previos del equipo -->
                        <h6 class="mt-5">II. Datos previos del equipo</h6>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Marca: </label>
                                <input type="text" name="marca" class="form-control" value="<?= htmlspecialchars($equipo['marca']) ?>">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Modelo: </label>
                                <input type="text" name="modelo" class="form-control" value="<?= htmlspecialchars($equipo['modelo']) ?>">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-semibold">Nombre de equipo: </label>
                                <input type="text" name="nombre_equipo" class="form-control" value="<?= htmlspecialchars($equipo['nombre_equipo']) ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <h6>MEMORIA RAM</h6>
                                <label class="form-label fw-semibold">Tipo:</label>
                                <input type="text" name="ram_tipo" class="form-control mb-2" value="<?= htmlspecialchars($equipo['ram_tipo']) ?>">
                                <label class="form-label fw-semibold">Capacidad:</label>
                                <input type="text" name="ram_capacidad" class="form-control mb-2" value="<?= htmlspecialchars($equipo['ram_capacidad']) ?>">
                                <label class="form-label fw-semibold">Velocidad:</label>
                                <input type="text" name="ram_velocidad" class="form-control mb-2" value="<?= htmlspecialchars($equipo['ram_velocidad']) ?>">
                                <label class="form-label fw-semibold">Slot vacíos:</label>
                                <input type="text" name="ram_slots_vacios" class="form-control" value="<?= htmlspecialchars($equipo['ram_slots_vacios']) ?>">
                            </div>

                            <div class="col-md-4">
                                <h6>PROCESADOR</h6>
                                <label class="form-label fw-semibold">Marca:</label>
                                <input type="text" name="cpu_marca" class="form-control mb-2" value="<?= htmlspecialchars($equipo['cpu_marca']) ?>">
                                <label class="form-label fw-semibold">Modelo:</label>
                                <input type="text" name="cpu_modelo" class="form-control mb-2" value="<?= htmlspecialchars($equipo['cpu_modelo']) ?>">
                                <label class="form-label fw-semibold">Velocidad:</label>
                                <input type="text" name="cpu_velocidad" class="form-control" value="<?= htmlspecialchars($equipo['cpu_velocidad']) ?>">
                            </div>

                            <div class="col-md-4">
                                <h6>SISTEMA OPERATIVO</h6>
                                <label class="form-label fw-semibold">Nombre:</label>
                                <input type="text" name="so_nombre" class="form-control mb-2" value="<?= htmlspecialchars($equipo['so_nombre']) ?>">
                                <label class="form-label fw-semibold">Versión:</label>
                                <input type="text" name="so_version" class="form-control mb-2" value="<?= htmlspecialchars($equipo['so_version']) ?>">
                                <label class="form-label fw-semibold">Arquitectura:</label>
                                <input type="text" name="so_arquitectura" class="form-control" value="<?= htmlspecialchars($equipo['so_arquitectura']) ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <h6>DISCO DURO</h6>
                                <label class="form-label fw-semibold">Capacidad:</label>
                                <input type="text" name="almacenamiento_cap" class="form-control mb-2" value="<?= htmlspecialchars($equipo['almacenamiento_cap']) ?>">
                                <label class="form-label fw-semibold"># Particiones:</label>
                                <input type="text" name="almacenamiento_particiones" class="form-control" value="<?= htmlspecialchars($equipo['almacenamiento_particiones']) ?>">
                            </div>

                            <div class="col-md-4">
                                <h6>TARJETA MADRE</h6>
                                <label class="form-label fw-semibold">Modelo:</label>
                                <input type="text" name="placa_modelo" class="form-control mb-2" value="<?= htmlspecialchars($equipo['placa_modelo']) ?>">
                            </div>

                            <div class="col-md-4">
                                <h6>PUERTOS</h6>
                                <label class="form-label fw-semibold">Puertos:</label>
                                <input type="text" name="puertos" class="form-control" value="<?= htmlspecialchars($equipo['puertos']) ?>">
                            </div>
                        </div>

                        <div class="mb-3">
                            <h6>OTRA INFORMACIÓN</h6>
                            <label class="form-label fw-semibold">Información:</label>
                            <textarea name="info_extra" class="form-control" rows="3"><?= htmlspecialchars($equipo['info_extra']) ?></textarea>
                        </div>

                        <!-- III. Aplicación del equipo -->
                        <h6 class="mt-5">III. Aplicación del equipo (reparaciones)</h6>
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-success">Describa el proceso que se aplicó:</label>
                            <textarea name="descripcion_proceso" class="form-control" rows="3"><?= htmlspecialchars($equipo['descripcion_proceso'] ?? '') ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-success">Detalles de problemas encontrados:</label>
                            <textarea name="detalles_problemas" class="form-control" rows="3"><?= htmlspecialchars($equipo['detalles_problemas'] ?? '') ?></textarea>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Editar equipo</button>
                        </div>
                    </form>
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
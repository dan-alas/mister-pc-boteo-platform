<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de equipos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/css/paneles.css">
</head>

<body class="vh-100 d-flex flex-column">

    <?php include __DIR__ . '/../../../app/views/common/panel/header.php'; ?> <!-- Header -->

    <div class="flex-grow-1 d-flex flex-column flex-md-row" style="min-height: 0;">

        <?php include __DIR__ . '/../../../app/views/common/panel/aside_tecnico.php'; ?> <!-- Aside -->

        <!-- Main Equipos Inicia -->
        <main class="flex-grow-1 overflow-auto p-4">
            <h4 class="text-center mb-4 fw-bold">EQUIPOS ASIGNADOS</h4>

            <div class="d-flex flex-column flex-md-row flex-end justify-content-end mb-3">

                <div class="mt-3 mt-md-auto">
                    <a href="./equipos/equipos-reparado.php" class="btn btn-success"><i class="bi bi-check2"></i> Equipo Reparado</a>
                    <a href="./equipos/equipos-historial.php" class="btn btn-warning text-white"><i
                            class="bi bi-clock-history"></i> Historial</a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre de Equipo</th>
                            <th>Propietario</th>
                            <th>Marca</th>
                            <th>Fecha</th>
                            <th>Tipo</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($equipos)): ?>
                            <tr>
                                <td colspan="9" class="text-center">No tienes equipos asignados</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($equipos as $eq): ?>
                                <tr>
                                    <td><?= htmlspecialchars($eq['id']) ?></td>
                                    <td><?= htmlspecialchars($eq['nombre_equipo']) ?></td>
                                    <td><?= htmlspecialchars($eq['propietario']) ?></td>
                                    <td><?= htmlspecialchars($eq['marca']) ?></td>
                                    <td><?= htmlspecialchars(date('d/m/Y', strtotime($eq['fecha_ingreso']))) ?></td>
                                    <td><?= htmlspecialchars($eq['tipo_problema']) ?></td>
                                    <td><?= htmlspecialchars($eq['estado_actual']) ?></td>
                                    <td>
                                        <a href="./equipos/equipos-editar.php?id=<?= $eq['id'] ?>" class="text-success">Actualizar</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>
        <!-- Main Equipos Finaliza -->

    </div>
    <!-- MODALES INICIAN -->
    <div class="modal fade" id="confirmarEliminar" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Confirmar eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    ¿Está seguro que desea eliminar este equipo?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- MODALES FINALIZAN -->

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
    crossorigin="anonymous"></script>

</html>
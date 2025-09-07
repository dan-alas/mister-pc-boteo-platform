<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de equipos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/css/paneles.css">
</head>

<body>

    <?php include __DIR__ . '/../../../app/views/common/panel/header.php'; ?> <!-- Header -->

    <div class="flex-grow-1 d-flex flex-column flex-md-row" style="min-height: 0;">

        <?php include __DIR__ . '/../../../app/views/common/panel/aside_cliente.php'; ?> <!-- Aside -->

        <!-- Historial Inicia -->
        <main class="flex-grow-1 overflow-auto p-4">
            <h4 class="text-center mb-5 fw-bold">HISTORIAL EQUIPOS REPARADOS</h4>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre de Equipo</th>
                            <th>Marca</th>
                            <th>Fecha Ingreso</th>
                            <th>Fecha de Entrega</th>
                            <th>Técnico</th>
                            <th>Tipo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($historial)): ?>
                            <?php foreach ($historial as $equipo): ?>
                                <tr>
                                    <td><?= htmlspecialchars($equipo['id']) ?></td>
                                    <td><?= htmlspecialchars($equipo['nombre_equipo']) ?></td>
                                    <td><?= htmlspecialchars($equipo['marca']) ?></td>
                                    <td><?= !empty($equipo['fecha_ingreso']) ? date('d/m/Y', strtotime($equipo['fecha_ingreso'])) : '' ?></td>
                                    <td><?= !empty($equipo['fecha_finalizacion']) ? date('d/m/Y', strtotime($equipo['fecha_finalizacion'])) : '' ?></td>
                                    <td><?= htmlspecialchars($equipo['tecnico'] ?? 'Sin asignar') ?></td>
                                    <td><?= htmlspecialchars($equipo['tipo_problema']) ?></td>
                                    <td>
                                    <a href="../download_historial.php?id=<?= $equipo['id'] ?>" class="text-green">Descargar PDF</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center">No hay historial para mostrar</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </main>
        <!-- Historial Finaliza -->
    </div>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
    crossorigin="anonymous"></script>

</html>
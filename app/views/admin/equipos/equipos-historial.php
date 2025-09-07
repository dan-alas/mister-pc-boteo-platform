<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Equipos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../assets/css/paneles.css">
</head>

<body class="vh-100 d-flex flex-column">

    <?php include __DIR__ . '/../../../../app/views/common/panel/header.php'; ?>

    <div class="flex-grow-1 d-flex flex-column flex-md-row" style="min-height: 0;">

        <?php include __DIR__ . '/../../../../app/views/common/panel/aside_admin.php'; ?>

        <!-- Historial Inicia -->
        <main class="flex-grow-1 overflow-auto p-4">
            <h4 class="text-center mb-4 fw-bold">HISTORIAL EQUIPOS REPARADOS</h4>

            <div class="d-flex flex-column flex-md-row justify-content-between mb-3">
                <form method="get" class="mb-3">
                    <select name="tipo_filtro" class="form-select" onchange="this.form.submit()">
                        <option value="">-- Filtrar por tipo --</option>
                        <option value="hardware" <?= (($_GET['tipo_filtro'] ?? '') === 'hardware') ? 'selected' : '' ?>>Hardware</option>
                        <option value="software" <?= (($_GET['tipo_filtro'] ?? '') === 'software') ? 'selected' : '' ?>>Software</option>
                        <option value="ambos" <?= (($_GET['tipo_filtro'] ?? '') === 'ambos') ? 'selected' : '' ?>>Ambos</option>
                    </select>
                </form>
                <div class="mt-3 mt-md-auto">
                    <a href="../equipos.php" class="btn btn-warning text-white"><i
                            class="bi bi-box-arrow-left me-1"></i>Regresar</a>
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
                            <th>Fecha de Entrega</th>
                            <th>Técnico</th>
                            <th>Tipo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($equipos as $equipo): ?>
                            <tr>
                                <td><?= htmlspecialchars($equipo['id']) ?></td>
                                <td><?= htmlspecialchars($equipo['nombre_equipo']) ?></td>
                                <td><?= htmlspecialchars($equipo['propietario']) ?></td>
                                <td><?= htmlspecialchars($equipo['marca']) ?></td>
                                <td><?= htmlspecialchars($equipo['fecha_ingreso']) ?></td>
                                <td><?= htmlspecialchars($equipo['fecha_finalizacion']) ?></td>
                                <td><?= htmlspecialchars($equipo['tecnico']) ?></td>
                                <td><?= htmlspecialchars($equipo['tipo_problema']) ?></td>
                                <td><a href="../../download_historial.php?id=<?= $equipo['id'] ?>" class="text-green">Descargar PDF</a></td>
                            </tr>
                        <?php endforeach; ?>
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
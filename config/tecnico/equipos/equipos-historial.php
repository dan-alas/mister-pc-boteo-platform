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
            <h4 class="text-center mb-4 fw-bold">HISTORIAL DE SUS EQUIPOS REPARADOS</h4>

            <div class="d-flex flex-column flex-md-row justify-content-between mb-3">
                <select class="form-select w-auto">
                    <option>Filtrar por tipo</option>
                    <option>Software</option>
                    <option>Hardware</option>
                </select>
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

                            <th>Tipo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>PC-DANIEL</td>
                            <td>Daniel Alas</td>
                            <td>Asus Vivobook</td>
                            <td>06/07/2024</td>
                            <td>06/09/2024</td>

                            <td>Software</td>
                            <td><a href="#" class="text-green">Descargar PDF</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>

    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
    crossorigin="anonymous"></script>

</html>
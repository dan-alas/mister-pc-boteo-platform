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

        <!-- Main Productos Inicia -->
        <main class="flex-grow-1 overflow-auto p-4">
            <h4 class="text-center mb-4 fw-bold">PRODUCTOS Y REPUESTOS DISPONIBLES</h4>

            <div class="d-flex flex-column flex-md-row justify-content-between mb-3">
                <select class="form-select w-auto">
                    <option>Filtrar por categoria</option>
                    <option>Memorias</option>
                    <option>Tarjetas madre</option>
                </select>
            </div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Imagen</th>
                            <th>Nombre de producto</th>
                            <th>Precio</th>
                            <th>Categoría</th>
                            <th>Stock</th>
                            <th>Presentación</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                                <img src="img/imagen pc.png" class="img-thumbnail-fixed" alt="Producto">
                            </td>
                            <td>Tarjeta Madre Asus</td>
                            <td><span>$</span>200</td>
                            <td>Tarjetas madre</td>
                            <td>5</td>
                            <td>
                                <span class="badge bg-secondary">Unidad</span>
                            </td>

                        </tr>

                        <tr>
                            <td>2</td>
                            <td>
                                <img src="img/caja_clavos.png" class="img-thumbnail-fixed" alt="Producto">
                            </td>
                            <td>Caja de clavos</td>
                            <td><span>$</span>8</td>
                            <td>Ferretería</td>
                            <td>10</td>
                            <td>
                                <span class="badge bg-info text-dark">Caja</span><br>
                                <small class="text-muted">100 unidades por caja</small>
                            </td>

                        </tr>
                        <tr>
                            <td>3</td>
                            <td>
                                <img src="img/rollo_papel.png" class="img-thumbnail-fixed" alt="Producto">
                            </td>
                            <td>Cartón de papel</td>
                            <td><span>$</span>15</td>
                            <td>Oficina</td>
                            <td>5</td>
                            <td>
                                <span class="badge bg-info text-dark">Caja</span><br>
                                <small class="text-muted">Unidades desconocidas</small>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
        <!-- Main Productos Finaliza -->

    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
    crossorigin="anonymous"></script>

</html>
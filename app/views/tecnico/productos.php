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
                <form method="get" class="mb-3">
                    <select name="categoria_filtro" class="form-select" onchange="this.form.submit()">
                        <option value="">-- Filtrar por categoría --</option>
                        <?php foreach ($categorias as $cat): ?>
                            <option value="<?= $cat['id'] ?>" <?= ($categoria_id == $cat['id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($cat['nombre']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </form>
            </div>

            <div class="table-responsive">
                <!-- TABLA DE PRODUCTOS -->
                <table class="table table-striped">
                    <thead>
                        <tr class="table-dark">
                            <th>ID</th>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Precio</th>
                            <th>Categoría</th>
                            <th>Proveedor</th>
                            <th>Stock</th>
                            <th>Presentación</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($productos)): ?>
                            <?php foreach ($productos as $prod): ?>
                                <tr>
                                    <td><?= $prod['id'] ?></td>
                                    <td><img src="<?= $prod['imagen'] ?>" class="img-thumbnail-fixed" alt="Producto"></td>
                                    <td><?= htmlspecialchars($prod['nombre']) ?></td>
                                    <td><?= htmlspecialchars($prod['marca']) ?></td>
                                    <td>$<?= number_format($prod['precio'], 2) ?></td>
                                    <td><?= htmlspecialchars($prod['categoria_nombre']) ?></td>
                                    <td><?= htmlspecialchars($prod['proveedor_nombre']) ?></td>
                                    <td><?= $prod['stock'] ?></td>
                                    <td>
                                        <span class="badge bg-secondary"><?= htmlspecialchars($prod['tipo_presentacion']) ?></span>
                                        <?php if (strtolower($prod['tipo_presentacion']) === 'caja'): ?>
                                            <br>
                                            <small class="text-muted">
                                                Unidades por caja: <?= $prod['unidades_por_presentacion'] ?? 'desconocidas' ?>
                                                - Total unidades disponibles: <?= $prod['stock'] * ($prod['unidades_por_presentacion'] ?? 0) ?>
                                            </small>
                                        <?php endif; ?>
                                    </td>
                                    
                                </tr>

                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="9" class="text-center">No hay productos para esta categoría.</td>
                            </tr>
                        <?php endif; ?>
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
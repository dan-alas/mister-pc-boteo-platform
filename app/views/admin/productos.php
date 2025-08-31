<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/css/paneles.css">

</head>

<body class="vh-100 d-flex flex-column">

    <?php include __DIR__ . '/../../../app/views/common/panel/header.php'; ?>
    <!-- Header -->

    <div class="flex-grow-1 d-flex flex-column flex-md-row" style="min-height: 0;">

        <?php include __DIR__ . '/../../../app/views/common/panel/aside_admin.php'; ?>
        <!-- Aside -->

        <!-- Productos Inicia -->
        <main class="flex-grow-1 overflow-auto p-4">
            <h4 class="text-center mb-4 fw-bold">NUESTROS PRODUCTOS</h4>

            <!-- Filtrar por categoría -->
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

                <div class="mt-3 mt-md-auto">
                    <!-- Botón Productos Desactivados -->
                    <a class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalProductosDesactivados">
                        <i class="bi bi-plus"></i> Productos Desactivados
                    </a>

                    <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAgregarProveedor">
                        <i class="bi bi-plus"></i> Proveedores
                    </a>
                    <a href="#" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#modalCategorias">
                        <i class="bi bi-plus"></i> Categorías
                    </a>
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarProducto">
                        <i class="bi bi-plus"></i> Agregar producto
                    </a>
                </div>
            </div>

            <!-- Tabla productos -->
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
                            <th>Acciones</th>
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
                                    <td>
                                        <a href="#" class="text-success" data-bs-toggle="modal" data-bs-target="#modalEditarProducto<?= $prod['id'] ?>">Editar</a>

                                        |
                                        <a href="#" class="text-danger" data-bs-toggle="modal" data-bs-target="#modalEliminarProducto<?= $prod['id'] ?>">Eliminar</a>
                                    </td>
                                </tr>

                                <!-- Modal eliminar producto -->
                                <div class="modal fade" id="modalEliminarProducto<?= $prod['id'] ?>" tabindex="-1" aria-labelledby="modalEliminarLabel<?= $prod['id'] ?>" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalEliminarLabel<?= $prod['id'] ?>">Confirmar eliminación</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                            </div>
                                            <div class="modal-body">
                                                ¿Está seguro que desea eliminar el producto <strong><?= htmlspecialchars($prod['nombre']) ?></strong>?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <a href="productos.php?eliminar_producto=<?= $prod['id'] ?>&categoria_filtro=<?= $categoria_id ?>" class="btn btn-danger">Eliminar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
        <!-- Productos Finaliza -->

    </div>

    <!-- MODALES DE PRODUCTOS INICIAN -->

    <!-- Modal agregar producto inicia -->
    <div class="modal fade" id="modalAgregarProducto" tabindex="-1" aria-labelledby="modalAgregarProductoLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="modalAgregarProductoLabel">Agregar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <div class="modal-body">
                    <form method="POST">

                        <div class="mb-3">
                            <label class="form-label">Nombre del producto</label>
                            <input type="text" name="nombre_producto" class="form-control"
                                placeholder="Ej: Tarjeta Madre Asus" required>
                        </div>
                        <div class="mb-3">
                            <label for="marca_producto" class="form-label">Marca</label>
                            <input type="text" name="marca_producto" id="marca_producto" class="form-control" placeholder="Marca del producto">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Proveedor</label>
                            <select name="proveedor_id" class="form-select" required>
                                <option selected disabled>Seleccione un proveedor</option>
                                <?php foreach ($proveedores as $prov): ?>
                                    <option value="<?= $prov['id']; ?>"><?= htmlspecialchars($prov['nombre']); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Precio por unidad o caja ($)</label>
                            <input type="number" name="precio_producto" class="form-control" placeholder="Ej: 200"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Imagen del producto (URL)</label>
                            <input type="text" name="imagen_producto" class="form-control" placeholder="Ej: url imagen">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Cantidad en stock</label>
                            <input type="number" name="stock_producto" class="form-control" placeholder="Ej: 10"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Categoría</label>
                            <select name="categoria_id" class="form-select" required>
                                <option selected disabled>Seleccione una categoría</option>
                                <?php foreach ($categorias as $cat): ?>
                                    <option value="<?= $cat['id']; ?>"><?= htmlspecialchars($cat['nombre']); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tipo de presentación</label>
                            <select name="tipo_presentacion" id="tipoPresentacion" class="form-select"
                                onchange="toggleUnidadesPorCaja()" required>
                                <option value="unidad">Unidad</option>
                                <option value="caja">Caja</option>
                            </select>
                        </div>

                        <div class="mb-3" id="campoUnidadesPorCaja" style="display: none;">
                            <label class="form-label">Unidades por caja <small
                                    class="text-muted">(opcional)</small></label>
                            <input type="number" name="unidades_por_presentacion" class="form-control"
                                placeholder="Ej: 24">
                        </div>

                        <div class="text-end">
                            <button type="submit" name="agregar_producto" class="btn btn-primary">Agregar
                                producto</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
    <!-- Modal agregar producto finaliza -->

    <!-- Modal Editar Producto -->
    <?php foreach ($productos as $prod): ?>
        <div class="modal fade" id="modalEditarProducto<?= $prod['id'] ?>" tabindex="-1" aria-labelledby="modalEditarProductoLabel<?= $prod['id'] ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditarProductoLabel<?= $prod['id'] ?>">Editar Producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>

                    <div class="modal-body">
                        <form method="POST">
                            <input type="hidden" name="id_producto" value="<?= $prod['id'] ?>">

                            <div class="mb-3">
                                <label class="form-label">Nombre del producto</label>
                                <input type="text" name="nombre_producto" class="form-control"
                                    value="<?= htmlspecialchars($prod['nombre']) ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="marca_producto<?= $prod['id'] ?>" class="form-label">Marca</label>
                                <input type="text" name="marca_producto" id="marca_producto<?= $prod['id'] ?>" class="form-control"
                                    value="<?= htmlspecialchars($prod['marca']) ?>" placeholder="Marca del producto">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Proveedor</label>
                                <select name="proveedor_id" class="form-select" required>
                                    <option disabled>Seleccione un proveedor</option>
                                    <?php foreach ($proveedores as $prov): ?>
                                        <option value="<?= $prov['id'] ?>" <?= $prod['proveedor_id'] == $prov['id'] ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($prov['nombre']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Precio por unidad o caja ($)</label>
                                <input type="number" name="precio_producto" class="form-control"
                                    value="<?= $prod['precio'] ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Imagen del producto (URL)</label>
                                <input type="text" name="imagen_producto" class="form-control"
                                    value="<?= htmlspecialchars($prod['imagen']) ?>" placeholder="Ej: url imagen">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Cantidad en stock</label>
                                <input type="number" name="stock_producto" class="form-control"
                                    value="<?= $prod['stock'] ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Categoría</label>
                                <select name="categoria_id" class="form-select" required>
                                    <option disabled>Seleccione una categoría</option>
                                    <?php foreach ($categorias as $cat): ?>
                                        <option value="<?= $cat['id'] ?>" <?= $prod['categoria_id'] == $cat['id'] ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($cat['nombre']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tipo de presentación</label>
                                <select name="tipo_presentacion" class="form-select"
                                    onchange="toggleUnidadesPorCajaEditar(<?= $prod['id'] ?>)" required>
                                    <option value="unidad" <?= $prod['tipo_presentacion'] == 'unidad' ? 'selected' : '' ?>>Unidad</option>
                                    <option value="caja" <?= $prod['tipo_presentacion'] == 'caja' ? 'selected' : '' ?>>Caja</option>
                                </select>
                            </div>

                            <div class="mb-3" id="campoUnidadesPorCajaEditar<?= $prod['id'] ?>"
                                style="<?= $prod['tipo_presentacion'] == 'caja' ? '' : 'display:none;' ?>">
                                <label class="form-label">Unidades por caja <small class="text-muted">(opcional)</small></label>
                                <input type="number" name="unidades_por_presentacion" class="form-control"
                                    value="<?= $prod['unidades_por_presentacion'] ?>">
                            </div>

                            <div class="text-end">
                                <button type="submit" name="editar_producto" class="btn btn-primary">Guardar cambios</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- Modal Editar Producto finaliza -->




    <!-- Modal elminar producto Inicia -->

    <div class="modal fade" id="confirmarEliminar<?= $prod['id'] ?>" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Confirmar eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    ¿Está seguro que desea eliminar el producto <strong><?= htmlspecialchars($prod['nombre']) ?></strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a href="productos.php?eliminar_producto=<?= $prod['id'] ?>" class="btn btn-danger">Eliminar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal elminar producto Finaliza -->

    <!-- Modal Categorias -->
    <div class="modal fade" id="modalCategorias" tabindex="-1" aria-labelledby="modalCategoriasLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCategoriasLabel">Categorías</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario agregar nueva categoría -->
                    <form method="POST" class="mb-3 d-flex" action="">
                        <input type="text" name="nombre_categoria" class="form-control me-2"
                            placeholder="Nueva categoría" required>
                        <button type="submit" name="agregar_categoria" class="btn btn-success">Agregar</button>
                    </form>
                    <hr>
                    <h6>Categorías existentes</h6>
                    <ul class="list-group">
                        <?php if (!empty($categorias)): ?>
                            <?php foreach ($categorias as $cat): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <?= htmlspecialchars($cat['nombre']); ?>
                                    <div>
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#editCategoria<?= $cat['id']; ?>">
                                            Editar
                                        </button>
                                        <a href="?eliminar_categoria=<?= $cat['id']; ?>" class="btn btn-sm btn-danger"
                                            onclick="return confirm('¿Seguro que deseas eliminar esta categoría?')">Eliminar</a>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li class="list-group-item">No hay categorías registradas.</li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modales de edición de categorías -->
    <?php if (!empty($categorias)): ?>
        <?php foreach ($categorias as $cat): ?>
            <div class="modal fade" id="editCategoria<?= $cat['id']; ?>" tabindex="-1"
                aria-labelledby="editCategoriaLabel<?= $cat['id']; ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editCategoriaLabel<?= $cat['id']; ?>">Editar Categoría</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id_categoria" value="<?= $cat['id']; ?>">
                                <input type="text" name="nombre_categoria_edit" class="form-control"
                                    value="<?= htmlspecialchars($cat['nombre']); ?>" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" name="editar_categoria" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <!-- Modal agregar proveedor inicia -->
    <div class="modal fade" id="modalAgregarProveedor" tabindex="-1" aria-labelledby="modalAgregarProveedorLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="modalAgregarProveedorLabel">Agregar Proveedor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label class="form-label">Nombre del proveedor</label>
                            <input type="text" name="nombre_proveedor" class="form-control" placeholder="Ej: Proveedor XYZ" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Teléfono</label>
                            <input type="text" name="telefono_proveedor" class="form-control" placeholder="Ej: 1234-5678">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Correo electrónico</label>
                            <input type="email" name="email_proveedor" class="form-control" placeholder="ejemplo@correo.com">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Dirección</label>
                            <input type="text" name="direccion_proveedor" class="form-control" placeholder="Ej: Calle #123, Ciudad">
                        </div>
                        <div class="text-end">
                            <button type="submit" name="agregar_proveedor" class="btn btn-primary">Agregar proveedor</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal agregar proveedor finaliza -->

    <!-- Modal Productos Desactivados -->
    <div class="modal fade" id="modalProductosDesactivados" tabindex="-1" aria-labelledby="modalProductosDesactivadosLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalProductosDesactivadosLabel">Productos Desactivados</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($productos_desactivados)): ?>
                                <?php foreach ($productos_desactivados as $prod): ?>
                                    <tr>
                                        <td><?= $prod['id'] ?></td>
                                        <td><?= htmlspecialchars($prod['nombre']) ?></td>
                                        <td>
                                            <a href="productos.php?activar_producto=<?= $prod['id'] ?>" class="btn btn-success btn-sm">
                                                Activar
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="3" class="text-center">No hay productos desactivados.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>







    <!-- MODALES DE PRODUCTOS FINALIZAN -->


</body>
<!-- Script para modal de agregar producto -->
<script>
    function toggleUnidadesPorCaja() {
        const tipo = document.getElementById('tipoPresentacion').value;
        const campo = document.getElementById('campoUnidadesPorCaja');
        campo.style.display = (tipo === 'caja') ? 'block' : 'none';
    }

    function toggleUnidadesPorCajaEditar(id) {
        const campo = document.getElementById("campoUnidadesPorCajaEditar" + id);
        const select = event.target;

        if (select.value === "caja") {
            campo.style.display = "block";
        } else {
            campo.style.display = "none";
            campo.querySelector("input").value = ""; // limpiar si cambia a unidad
        }
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</html>
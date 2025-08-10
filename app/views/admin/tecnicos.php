<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de tecnicos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/css/paneles.css">
</head>

<body>

    <?php include __DIR__ . '/../../../app/views/common/panel/header.php'; ?> <!-- Header -->

    <div class="flex-grow-1 d-flex flex-column flex-md-row" style="min-height: 0;">

       <?php include __DIR__ . '/../../../app/views/common/panel/aside_admin.php'; ?> <!-- Aside -->

        <!-- Tecnicos Inicia -->
        <main class="flex-grow-1 overflow-auto p-4">
            <h4 class="text-center mb-4 fw-bold">TECNICOS</h4>

            <div class="d-flex flex-column text-md-end mb-3">
                <div class="mt-3 mt-md-auto">
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAgregarTecnico"><i
                            class="bi bi-plus"></i> Agregar Tecnico</a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Especialidad</th>
                            <th>Correo Electronico</th>
                            <th>Telefono</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Daniel Alas</td>
                            <td>Software</td>
                            <td>alasdaniel@gmail.com</td>
                            <td>7070-7070</td>
                            <td>Activo</td>
                            <td><a href="#" class="text-green" data-bs-toggle="modal" data-bs-target="#modalEditarTecnico">Editar</a>
                                <a href="#" class="text-danger" data-bs-toggle="modal" data-bs-target="#confirmarEliminar">Eliminar</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
        <!-- Tecnicos Finaliza -->
    </div>

    <!-- MODALES INICIAN -->
    <!-- Modal Agregar tecnico inicia -->
    <div class="modal fade" id="modalAgregarTecnico" tabindex="-1" aria-labelledby="modalAgregarTecnicoLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="modalAgregarTecnicoLabel">Agregar Técnico</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Nombre completo</label>
                            <input type="text" class="form-control" placeholder="Ej: Juan Pérez">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Especialidad</label>
                            <input type="text" class="form-control" placeholder="Ej: Hardware, Software">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" placeholder="Ej: juan@mail.com">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Teléfono</label>
                            <input type="tel" class="form-control" placeholder="Ej: 1234-5678">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Contraseña</label>
                            <input type="password" class="form-control">
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Agregar técnico</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal Agregar tecnico finaliza -->

    <!-- Modal Eliminar tecnico inicia -->
    <div class="modal fade" id="confirmarEliminar" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Confirmar eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    ¿Está seguro que desea eliminar a este Tecnico?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Eliminar tecnico finaliza -->


    <!-- Modal Editar tecnico inicia -->
    <div class="modal fade" id="modalEditarTecnico" tabindex="-1" aria-labelledby="modalEditarTecnicoLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarTecnicoLabel">Editar Técnico</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Nombre completo</label>
                            <input type="text" class="form-control" value="Daniel Alas">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Especialidad</label>
                            <input type="text" class="form-control" value="Software">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" value="alasdaniel@gmail.com">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Teléfono</label>
                            <input type="tel" class="form-control" value="7070-7070">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nueva Contraseña</label>
                            <input type="password" class="form-control">
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Editar tecnico finaliza -->
    <!-- MODALES FINALIZAN -->

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
    crossorigin="anonymous"></script>

</html>
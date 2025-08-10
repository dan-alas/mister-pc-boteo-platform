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

        <!-- Main Usuarios Inicia -->
        <main class="flex-grow-1 overflow-auto p-4">
            <h4 class="text-center mb-5 fw-bold">USUARIOS REGISTRADOS</h4>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo Electronico</th>
                            <th>Telefono</th>
                            <th>Equipos en reparación</th>
                            <th>Reparados</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Daniel Alas</td>
                            <td>alasdaniel@gmail.com</td>
                            <td>7070-7070</td>
                            <td>Ninguno</td>
                            <td>Dell latitude, Asus Vivobook</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Daniel Alas</td>
                            <td>alasdaniel@gmail.com</td>
                            <td>7070-7070</td>
                            <td>Ninguno</td>
                            <td>Dell latitude, Asus Vivobook</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
        <!-- Main Usuarios Finaliza -->

    </div>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
    crossorigin="anonymous"></script>

</html>
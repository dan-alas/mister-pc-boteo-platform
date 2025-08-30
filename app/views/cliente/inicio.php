<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


// Verificar si hay sesión iniciada
if (!isset($_SESSION['usuario_id'])) {
    die("Error: No se ha iniciado sesión.");
}

require_once __DIR__ . '/../../../config/config.php';

// try {
//     $cliente_id = $_SESSION['usuario_id'];

//     // Equipos en reparación del cliente
//     $stmt = $pdo->prepare("SELECT COUNT(*) FROM ordenes_reparacion WHERE cliente_id = :cliente_id AND estado = 'En reparación'");
//     $stmt->execute(['cliente_id' => $cliente_id]);
//     $equipos_reparacion = $stmt->fetchColumn();

//     // Equipos reparados (terminados) del cliente
//     $stmt = $pdo->prepare("SELECT COUNT(*) FROM ordenes_reparacion WHERE cliente_id = :cliente_id AND estado = 'Reparado'");
//     $stmt->execute(['cliente_id' => $cliente_id]);
//     $equipos_reparados = $stmt->fetchColumn();

// } catch (PDOException $e) {
//     die("Error al obtener los datos: " . $e->getMessage());
// }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/css/paneles.css">

</head>

<body>

    <?php include __DIR__ . '/../../../app/views/common/panel/header.php'; ?> <!-- Header -->


    <div class="flex-grow-1 d-flex flex-column flex-md-row" style="min-height: 0;">

        <?php include __DIR__ . '/../../../app/views/common/panel/aside_cliente.php'; ?> <!-- Aside -->

        <!-- Home Inicia -->
        <main class="flex-grow-1">
            <section class="container">
                <div>
                    <h4 class="text-center mt-4 mb-5 fw-bold">PANEL DE USUARIO</h4>
                </div>

                <div class="row align-items-center justify-content-center gy-4">
                    <div class="col-md-5">
                        <div class="bg-yellow rounded p-4 text-center text-white">
                            <h5 class="fw-bold">Equipos en reparacion</h5>
                            <p class="number-size mb-4"><?= $equipos_reparacion ?></p>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="bg-pink rounded p-4 text-center text-white">
                            <h5 class="fw-bold">Equipos reparados</h5>
                            <p class="number-size mb-4"><?= $equipos_reparados ?></p>
                        </div>
                    </div>

                </div>
            </section>
        </main>
        <!-- Home Finaliza -->
    </div>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
    crossorigin="anonymous"></script>

</html>
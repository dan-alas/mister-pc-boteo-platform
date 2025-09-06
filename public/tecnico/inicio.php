<?php

include '../includes/verificar_tecnico.php'; //Verificar sesion desde tecnico
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../app/controllers/EquipoController.php';

$equipoController = new EquipoController($pdo);
$datos = $equipoController->reparacionesTecnico($_SESSION['usuario_id']);
$reparaciones = $datos['reparaciones'];

$tecnico_id = $_SESSION['usuario_id']; // <-- usa el ID del técnico que inició sesión


try {
    // Equipos asignados (no entregados)
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM equipos WHERE tecnico_id = :tecnico_id AND estado_actual != 'entregado'");
    $stmt->execute(['tecnico_id' => $tecnico_id]);
    $equipos_asignados = $stmt->fetchColumn();

    // Equipos terminados (estado_actual = 'terminado')
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM equipos WHERE tecnico_id = :tecnico_id AND estado_actual = 'finalizado'");
    $stmt->execute(['tecnico_id' => $tecnico_id]);
    $equipos_terminados = $stmt->fetchColumn();

    // Equipos reparados (registrados en tabla reparaciones)
    $stmt = $pdo->prepare("
        SELECT COUNT(DISTINCT r.equipo_id) 
        FROM reparaciones r
        INNER JOIN equipos e ON r.equipo_id = e.id
        WHERE e.tecnico_id = :tecnico_id
    ");
    $stmt->execute(['tecnico_id' => $tecnico_id]);
    $equipos_reparados = $stmt->fetchColumn();

    // Productos en almacén
    $stmt = $pdo->query("SELECT COUNT(*) FROM productos");
    $productos_almacen = $stmt->fetchColumn();

} catch (PDOException $e) {
    die("Error al obtener los datos: " . $e->getMessage());
}

include '../../app/views/tecnico/inicio.php';

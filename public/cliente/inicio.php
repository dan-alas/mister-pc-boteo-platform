<?php 

include '../includes/verificar_cliente.php'; //Verificar sesion desde cliente
require_once __DIR__ . '/../../config/config.php'; // Ajusta la ruta a tu config.php


try {
    $cliente_id = $_SESSION['usuario_id'];

    // Equipos en reparación del cliente
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM equipos WHERE propietario_id = :cliente_id AND estado_actual != 'entregado'");
    $stmt->bindValue(':cliente_id', $cliente_id, PDO::PARAM_INT);
    $stmt->execute();

    $equipos_reparacion = $stmt->fetchColumn();

    // Equipos reparados del cliente
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM equipos WHERE propietario_id = :cliente_id AND estado_actual = 'entregado'");
    $stmt->bindValue(':cliente_id', $cliente_id, PDO::PARAM_INT);
    $stmt->execute();

    $equipos_reparados = $stmt->fetchColumn();
    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

include '../../app/views/cliente/inicio.php';
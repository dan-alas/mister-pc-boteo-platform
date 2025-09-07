<?php
session_start();

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../app/controllers/PdfController.php';
require_once __DIR__ . '/../lib/dompdf/autoload.inc.php'; // DOMPDF

// Verificar que se recibió un ID
if (!isset($_GET['id'])) {
    die("No se especificó un equipo.");
}

$equipo_id = intval($_GET['id']);

// Instanciar el controlador PDF
$pdfController = new PdfController($pdo);

// Generar PDF de un equipo específico
$pdfController->generarPDFEquipo($equipo_id);

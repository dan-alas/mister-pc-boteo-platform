<?php
require_once __DIR__ . '/../app/controllers/RegisterController.php';

// Suponiendo que tienes el PDO creado y guardado en $pdo
$controller = new RegisterController($pdo);
$controller->procesarRegistro(); // Procesa POST si hay

// Después, incluyes la vista que tiene el HTML del formulario:
include __DIR__ . '/../app/views/auth/register.php';

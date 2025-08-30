<?php
session_start();
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../app/controllers/RegisterController.php';

$controller = new RegisterController($pdo);
$controller->procesarRegistro();

$error = $controller->error;
$success = $controller->success;

include __DIR__ . '/../app/views/auth/register.php';

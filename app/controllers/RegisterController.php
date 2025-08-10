<?php
// app/controllers/RegisterController.php

session_start();

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../models/Usuario.php';

class RegisterController {
    private $usuarioModel;
    public $error = '';
    public $success = '';

    public function __construct($pdo) {
        $this->usuarioModel = new Usuario($pdo);
    }

    public function procesarRegistro() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = trim($_POST['password'] ?? '');

            if (!$name || !$email || !$password) {
                $this->error = 'Por favor completa todos los campos.';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->error = 'El correo electrónico no es válido.';
            } elseif (strlen($password) < 6) {
                $this->error = 'La contraseña debe tener al menos 6 caracteres.';
            } elseif ($this->usuarioModel->existeEmail($email)) {
                $this->error = 'El correo ya está registrado.';
            } else {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $resultado = $this->usuarioModel->registrar($name, $email, $passwordHash);

                if ($resultado) {
                    $this->success = 'Registrado correctamente, espere...';
                } else {
                    $this->error = 'Error al registrar el usuario. Intenta de nuevo.';
                }
            }
        }
    }
}

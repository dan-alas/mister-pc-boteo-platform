<?php

require_once __DIR__ . '/../models/User.php';

class RegisterController
{
    private $userModel;
    public $error = '';
    public $success = '';

    public function __construct($pdo)
    {
        $this->userModel = new User($pdo);
    }

    public function procesarRegistro()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') return;

        $nombre = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $telefono = trim($_POST['phone'] ?? '');
        $password = $_POST['password'] ?? '';

        if (!$nombre || !$email || !$telefono || !$password) {
            $this->error = 'Todos los campos son obligatorios.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error = 'Correo no válido.';
        } elseif (!preg_match('/^[0-9]{4}-[0-9]{4}$/', $telefono)) {
            $this->error = 'Teléfono no válido. Usa el formato 0000-0000.';
        } elseif (strlen($password) < 6) {
            $this->error = 'La contraseña debe tener al menos 6 caracteres.';
        } elseif ($this->userModel->findByEmail($email)) {
            $this->error = 'El correo ya está registrado.';
        } else {
            $created = $this->userModel->create($nombre, $email, $password, $telefono);
            if ($created) {
                $this->success = 'Registro exitoso, redirigiendo al login...';
            } else {
                $this->error = 'Ocurrió un error al registrar.';
            }
        }
    }
}

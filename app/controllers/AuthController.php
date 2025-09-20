<?php

require_once __DIR__ . '/../models/User.php';

class AuthController
{
    private $userModel;

    public function __construct($pdo)
    {
        $this->userModel = new User($pdo);
    }

    public function login($postData)
    {
        $email = trim($postData['email'] ?? '');
        $password = trim($postData['password'] ?? '');

        if (!$email || !$password) {
            return ['success' => false, 'error' => 'Por favor completa todos los campos.'];
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ['success' => false, 'error' => 'Correo o contraseña incorrectos.'];
        }

        try {
            $user = $this->userModel->findByEmail($email);
        } catch (\Exception $e) {
            return ['success' => false, 'error' => 'Error interno, por favor intenta más tarde.'];
        }

        if ($user && password_verify($password, $user['pass_hash'])) {
            if ($user['is_active'] == 0) {

                return ['success' => false, 'error' => 'Correo o contraseña incorrectos.'];
            }
            return ['success' => true, 'usuario' => $user];
        }

        return ['success' => false, 'error' => 'Correo o contraseña incorrectos.'];
    }
}

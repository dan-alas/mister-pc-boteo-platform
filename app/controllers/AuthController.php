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

        $user = $this->userModel->findByEmail($email);

        if ($user && password_verify($password, $user['pass_hash'])) {
            if ($user['is_active'] == 0) {
                return ['success' => false, 'error' => 'Usuario desactivado.'];
            }
            return ['success' => true, 'usuario' => $user];
        }

        return ['success' => false, 'error' => 'Credenciales incorrectas.'];
    }
}

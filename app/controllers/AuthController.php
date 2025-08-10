<?php
class AuthController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function login($postData) {
        $email = trim($postData['email'] ?? '');
        $password = trim($postData['password'] ?? '');

        if (empty($email) || empty($password)) {
            return ['success' => false, 'error' => 'Por favor completa todos los campos.'];
        }

        $stmt = $this->pdo->prepare("SELECT id, username, email, password, rol FROM usuarios WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($password, $usuario['password'])) {
            return ['success' => true, 'usuario' => $usuario];
        } else {
            return ['success' => false, 'error' => 'Credenciales incorrectas.'];
        }
    }
}

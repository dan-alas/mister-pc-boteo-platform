<?php
class Usuario {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Para login: obtener datos del usuario por email
    public function obtenerPorEmail($email) {
        $stmt = $this->pdo->prepare("SELECT id, username, email, password, rol FROM usuarios WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Para registro: verificar si un email ya existe
    public function existeEmail($email) {
        $stmt = $this->pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch() !== false;
    }

    // Para registro: insertar un nuevo usuario
    public function registrar($username, $email, $passwordHash) {
        $stmt = $this->pdo->prepare("INSERT INTO usuarios (username, email, password, rol) VALUES (:username, :email, :password, 'usuario')");
        return $stmt->execute([
            'username' => $username,
            'email' => $email,
            'password' => $passwordHash
        ]);
    }
}

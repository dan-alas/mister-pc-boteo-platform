<?php

class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function findByEmail($email) {
        $stmt = $this->pdo->prepare("SELECT id, nombre_completo, email, pass_hash, rol, is_active FROM usuarios WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nombre_completo, $email, $password) {
        $stmt = $this->pdo->prepare("INSERT INTO usuarios (nombre_completo, email, pass_hash, rol) VALUES (:nombre_completo, :email, :pass_hash, 'cliente')");
        return $stmt->execute([
            'nombre_completo' => $nombre_completo,
            'email' => $email,
            'pass_hash' => password_hash($password, PASSWORD_DEFAULT)
        ]);
    }
}

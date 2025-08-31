<?php

class User
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Buscar usuario por email
    public function findByEmail($email)
    {
        $stmt = $this->pdo->prepare("SELECT id, nombre_completo, email, pass_hash, rol, telefono, is_active, creado_en 
                                     FROM usuarios WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Crear usuario cliente
    public function create($nombre_completo, $email, $password, $telefono = null)
    {
        $stmt = $this->pdo->prepare("INSERT INTO usuarios (nombre_completo, email, telefono, pass_hash, rol, is_active, creado_en) 
                                     VALUES (:nombre_completo, :email, :telefono, :pass_hash, 'cliente', 1, NOW())");
        return $stmt->execute([
            ':nombre_completo' => $nombre_completo,
            ':email' => $email,
            ':telefono' => $telefono,
            ':pass_hash' => password_hash($password, PASSWORD_DEFAULT)
        ]);
    }

    // Crear técnico
    public function createTecnico($nombre_completo, $email, $telefono, $password)
    {
        $stmt = $this->pdo->prepare("INSERT INTO usuarios (nombre_completo, email, telefono, pass_hash, rol, is_active, creado_en) 
                                     VALUES (:nombre_completo, :email, :telefono, :pass_hash, 'tecnico', 1, NOW())");
        return $stmt->execute([
            ':nombre_completo' => $nombre_completo,
            ':email' => $email,
            ':telefono' => $telefono,
            ':pass_hash' => password_hash($password, PASSWORD_DEFAULT)
        ]);
    }

    // Obtener todos los clientes
    public function getAllClientes()
    {
        $stmt = $this->pdo->prepare("SELECT id, nombre_completo, email, telefono, rol, is_active, creado_en 
                                     FROM usuarios WHERE rol = 'cliente' ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener todos los técnicos
    public function getAllTecnicos()
    {
        $stmt = $this->pdo->prepare("SELECT id, nombre_completo, email, telefono, rol, is_active, creado_en 
                                     FROM usuarios WHERE rol = 'tecnico' ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

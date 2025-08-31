<?php

require_once __DIR__ . '/../models/User.php';

class UsuarioController
{
    private $userModel;

    public function __construct($pdo)
    {
        $this->userModel = new User($pdo);
    }

    // Obtener solo usuarios con rol 'cliente'
    public function indexCliente()
    {
        return $this->userModel->getAllClientes();
    }

    // Obtener solo usuarios con rol 'tecnico'
    public function indexTecnicos()
    {
        return $this->userModel->getAllTecnicos();
    }

    // Agregamos este método en UsuarioController
    public function findByEmail($email)
    {
        return $this->userModel->findByEmail($email);
    }


    // Crear un técnico usando el modelo
    public function createTecnico($nombre, $email, $telefono, $password)
    {
        return $this->userModel->createTecnico($nombre, $email, $telefono, $password);
    }
}

<?php

require_once __DIR__ . '/../models/Proveedor.php';

class ProveedorController
{
    private $pdo;
    private $proveedorModel;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        $this->proveedorModel = new Proveedor($pdo);
    }

    public function index()
    {
        return $this->proveedorModel->getAll();
    }

    public function store($data)
    {
        $this->proveedorModel->create($data);
    }

    public function update($id, $data)
    {
        $this->proveedorModel->update($id, $data);
    }

    public function delete($id)
    {
        $this->proveedorModel->delete($id);
    }
    
}

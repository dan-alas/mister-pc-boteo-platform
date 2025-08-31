<?php

class Proveedor
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM proveedores WHERE is_active = 1 ORDER BY nombre ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO proveedores (nombre, telefono, email, direccion) VALUES (:nombre, :telefono, :email, :direccion)");
        $stmt->execute([
            ':nombre' => $data['nombre'] ?? '',
            ':telefono' => $data['telefono'] ?? null,
            ':email' => $data['email'] ?? null,
            ':direccion' => $data['direccion'] ?? null
        ]);
    }

    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare("UPDATE proveedores SET nombre=:nombre, telefono=:telefono, email=:email, direccion=:direccion WHERE id=:id");
        $stmt->execute([
            ':id' => $id,
            ':nombre' => $data['nombre'] ?? '',
            ':telefono' => $data['telefono'] ?? null,
            ':email' => $data['email'] ?? null,
            ':direccion' => $data['direccion'] ?? null
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("UPDATE proveedores SET is_active=0 WHERE id=:id");
        $stmt->execute([':id' => $id]);
    }
}

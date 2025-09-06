<?php

class Producto
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Obtener todos los productos, opcionalmente filtrados por categoría y por estado (is_active)
    public function getAll($categoria_id = null, $is_active = true)
    {
        $sql = "SELECT p.*, 
                       c.nombre AS categoria_nombre, 
                       pr.nombre AS proveedor_nombre,
                       p.marca
                FROM productos p
                JOIN categorias_productos c ON p.categoria_id = c.id
                JOIN proveedores pr ON p.proveedor_id = pr.id
                WHERE p.is_active = :is_active";

        $params = [':is_active' => $is_active ? 1 : 0];

        if ($categoria_id) {
            $sql .= " AND p.categoria_id = :categoria_id";
            $params[':categoria_id'] = $categoria_id;
        }

        $sql .= " ORDER BY p.id DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Crear un producto
    public function create($data)
    {
        $sql = "INSERT INTO productos 
                (nombre, precio, imagen, stock, categoria_id, proveedor_id, tipo_presentacion, unidades_por_presentacion, marca, is_active)
                VALUES 
                (:nombre, :precio, :imagen, :stock, :categoria_id, :proveedor_id, :tipo_presentacion, :unidades_por_presentacion, :marca, 1)";

        $stmt = $this->pdo->prepare($sql);

        $unidades = $data['unidades_por_presentacion'] !== '' ? $data['unidades_por_presentacion'] : null;

        $stmt->execute([
            ':nombre' => $data['nombre'],
            ':precio' => $data['precio'],
            ':imagen' => $data['imagen'],
            ':stock' => $data['stock'],
            ':categoria_id' => $data['categoria_id'],
            ':proveedor_id' => $data['proveedor_id'],
            ':tipo_presentacion' => $data['tipo_presentacion'],
            ':unidades_por_presentacion' => $unidades,
            ':marca' => $data['marca'] ?? null
        ]);
    }

    // Actualizar un producto
    public function update($id, $data)
    {
        $sql = "UPDATE productos SET
                    nombre = :nombre,
                    precio = :precio,
                    imagen = :imagen,
                    stock = :stock,
                    categoria_id = :categoria_id,
                    proveedor_id = :proveedor_id,
                    tipo_presentacion = :tipo_presentacion,
                    unidades_por_presentacion = :unidades_por_presentacion,
                    marca = :marca
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        $unidades = $data['unidades_por_presentacion'] !== '' ? $data['unidades_por_presentacion'] : null;

        $stmt->execute([
            ':id' => $id,
            ':nombre' => $data['nombre'],
            ':precio' => $data['precio'],
            ':imagen' => $data['imagen'],
            ':stock' => $data['stock'],
            ':categoria_id' => $data['categoria_id'],
            ':proveedor_id' => $data['proveedor_id'],
            ':tipo_presentacion' => $data['tipo_presentacion'],
            ':unidades_por_presentacion' => $unidades,
            ':marca' => $data['marca'] ?? null
        ]);
    }

    // Soft delete (desactivar producto)
    public function softDelete($id)
    {
        $stmt = $this->pdo->prepare("UPDATE productos SET is_active = 0 WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }

    // Activar producto previamente desactivado
    public function activar($id)
    {
        $stmt = $this->pdo->prepare("UPDATE productos SET is_active = 1 WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}

<?php
require_once __DIR__ . '/../models/Producto.php';

class ProductoController
{
    private $productoModel;

    public function __construct($pdo)
    {
        $this->productoModel = new Producto($pdo);
    }

    // Obtener productos activos, opcionalmente filtrados por categoría
    public function index($categoria_id = null)
    {
        return $this->productoModel->getAll($categoria_id, true); // solo activos
    }

    // Crear nuevo producto
    public function store($data)
    {
        // Asegurarse de que todos los campos estén presentes, incluida la marca
        $data = array_merge([
            'nombre' => '',
            'precio' => 0,
            'imagen' => null,
            'stock' => 0,
            'categoria_id' => null,
            'proveedor_id' => null,
            'tipo_presentacion' => 'Unidad',
            'unidades_por_presentacion' => null,
            'marca' => null
        ], $data);

        $this->productoModel->create($data);
    }

    // Actualizar producto existente
    public function update($id, $data)
    {
        // Asegurarse de incluir la marca también al actualizar
        $data = array_merge([
            'nombre' => '',
            'precio' => 0,
            'imagen' => null,
            'stock' => 0,
            'categoria_id' => null,
            'proveedor_id' => null,
            'tipo_presentacion' => 'Unidad',
            'unidades_por_presentacion' => null,
            'marca' => null
        ], $data);

        $this->productoModel->update($id, $data);
    }

    // Soft delete (desactivar)
    public function softDelete($id)
    {
        $this->productoModel->softDelete($id);
    }

    // Obtener productos desactivados
    public function getDesactivados()
    {
        return $this->productoModel->getAll(null, false); // solo desactivados
    }

    // Activar producto
    public function activar($id)
    {
        $this->productoModel->activar($id);
    }
}

<?php

require_once __DIR__ . '/../models/Categoria.php';

class CategoriaController
{
    private $categoriaModel;

    public function __construct($pdo)
    {
        $this->categoriaModel = new Categoria($pdo);
    }

    public function index()
    {
        return $this->categoriaModel->getAll();
    }

    public function store($nombre)
    {
        if (!empty($nombre)) {
            $this->categoriaModel->insert($nombre);
        }
    }

    public function update($id, $nombre)
    {
        if (!empty($id) && !empty($nombre)) {
            $this->categoriaModel->update($id, $nombre);
        }
    }

    public function delete($id)
    {
        if (!empty($id)) {
            $this->categoriaModel->delete($id);
        }
    }
}

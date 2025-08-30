<?php
class Categoria {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->prepare("SELECT * FROM categorias_productos WHERE is_active = 1 ORDER BY nombre ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($nombre) {
        $stmt = $this->pdo->prepare("INSERT INTO categorias_productos (nombre, is_active) VALUES (?, 1)");
        $stmt->execute([$nombre]);
    }

    public function update($id, $nombre) {
        $stmt = $this->pdo->prepare("UPDATE categorias_productos SET nombre = ? WHERE id = ?");
        $stmt->execute([$nombre, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("UPDATE categorias_productos SET is_active = 0 WHERE id = ?");
        $stmt->execute([$id]);
    }
}

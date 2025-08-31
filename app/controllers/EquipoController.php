<?php

require_once __DIR__ . '/../models/Equipo.php';
require_once __DIR__ . '/../models/User.php';

class EquipoController
{
    private $equipoModel;
    private $userModel;

    private $pdo;
    private $equipo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;            // <- Esto asegura que $this->pdo exista
        $this->equipoModel = new Equipo($pdo);
        $this->userModel = new User($pdo);
    }

    public function index()
    {
        $stmt = $this->pdo->prepare(
            "SELECT e.id, e.nombre_equipo, e.marca, e.tipo_problema, e.estado_actual, e.fecha_ingreso,
                p.nombre_completo AS propietario, t.nombre_completo AS tecnico
         FROM equipos e
         LEFT JOIN usuarios p ON e.propietario_id = p.id
         LEFT JOIN usuarios t ON e.tecnico_id = t.id
         ORDER BY e.id DESC"
        );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Obtener usuarios por rol
    public function getUsuarios($rol)
    {
        return $rol === 'cliente' ? $this->userModel->getAllClientes() : $this->userModel->getAllTecnicos();
    }

    // Guardar equipo
    public function store($data)
    {
        return $this->equipoModel->create($data);
    }

    public function storeReparado($data)
    {
        // 1. Insertar equipo en la tabla 'equipos'
        $equipoInsert = $this->equipoModel->create([
            'propietario_id' => $data['propietario_id'] ?? null,
            'tecnico_id' => $data['tecnico_id'] ?? null,
            'nombre_equipo' => $data['nombre_equipo'] ?? '',
            'marca' => $data['marca'] ?? '',
            'modelo' => $data['modelo'] ?? '',
            'so_nombre' => $data['so_nombre'] ?? '',
            'so_version' => $data['so_version'] ?? '',
            'so_arquitectura' => $data['so_arquitectura'] ?? '',
            'cpu_marca' => $data['cpu_marca'] ?? '',
            'cpu_modelo' => $data['cpu_modelo'] ?? '',
            'cpu_velocidad' => $data['cpu_velocidad'] ?? '',
            'ram_tipo' => $data['ram_tipo'] ?? '',
            'ram_capacidad' => $data['ram_capacidad'] ?? '',
            'ram_velocidad' => $data['ram_velocidad'] ?? '',
            'ram_slots_vacios' => $data['ram_slots_vacios'] ?? null,
            'almacenamiento_cap' => $data['almacenamiento_cap'] ?? '',
            'almacenamiento_particiones' => $data['almacenamiento_particiones'] ?? '',
            'placa_modelo' => $data['placa_modelo'] ?? '',
            'puertos' => $data['puertos'] ?? '',
            'info_extra' => $data['info_extra'] ?? '',
            'tipo_problema' => $data['tipo_problema'] ?? 'hardware',
            'estado_actual' => $data['estado_actual'] ?? 'no_iniciado',
            'fecha_ingreso' => $data['fecha_ingreso'] ?? date('Y-m-d'),
            'fecha_finalizacion' => $data['fecha_finalizacion'] ?? null
        ]);

        if ($equipoInsert) {
            // 2. Obtener ID del equipo insertado
            $equipo_id = $this->equipoModel->getLastInsertId();

            // 3. Insertar en tabla 'reparaciones'
            $this->equipoModel->crearReparacion([
                'equipo_id' => $equipo_id,
                'descripcion_proceso' => $data['descripcion_proceso'] ?? '',
                'detalles_problemas' => $data['detalles_problemas'] ?? ''
            ]);

            return true;
        }

        return false;
    }
}

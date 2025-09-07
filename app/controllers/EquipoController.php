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

    public function index($tipoFiltro = '')
    {
        // Base de la consulta
        $sql = "SELECT e.id, e.nombre_equipo, e.marca, e.tipo_problema, e.estado_actual, e.fecha_ingreso,
               p.nombre_completo AS propietario, t.nombre_completo AS tecnico
            FROM equipos e
            LEFT JOIN usuarios p ON e.propietario_id = p.id
            LEFT JOIN usuarios t ON e.tecnico_id = t.id
            WHERE e.activo = 1
            AND e.estado_actual != 'entregado'";

        // Aplicar filtro si existe
        if (!empty($tipoFiltro)) {
            $sql .= " AND e.tipo_problema = :tipo";
        }

        $sql .= " ORDER BY e.id DESC";

        $stmt = $this->pdo->prepare($sql);

        // Bind del parámetro si hay filtro
        if (!empty($tipoFiltro)) {
            $stmt->bindValue(':tipo', $tipoFiltro);
        }

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
        $resultado = $this->equipoModel->create($data);

        if ($resultado) {
            // Redirigir a la página de equipos después de insertar
            header('Location: ../equipos.php'); // Ajusta la ruta según corresponda
            exit; // Importante para detener la ejecución
        }

        return false;
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
            'estado_actual' => 'entregado',
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

            // 4. Redirigir para evitar duplicación al refrescar
            header('Location: ../equipos.php'); // Ajusta la ruta según corresponda
            exit;
        }

        return false;
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("UPDATE equipos SET activo = 0 WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // EquipoController.php
    public function edit($id)
    {
        // Obtener equipo por ID
        $equipo = $this->equipoModel->getById($id);

        // Si quieres, también puedes traer listas de propietarios y técnicos
        $propietarios = $this->getUsuarios('cliente');
        $tecnicos = $this->getUsuarios('tecnico');

        // Retornar datos a la vista
        return [
            'equipo' => $equipo,
            'propietarios' => $propietarios,
            'tecnicos' => $tecnicos
        ];
    }

    public function update($id, $data)
    {
        // Actualizar equipo
        $resultado = $this->equipoModel->update($id, $data);

        // Validar contenido de reparación
        $descripcion = trim($data['descripcion_proceso'] ?? '');
        $detalles = trim($data['detalles_problemas'] ?? '');

        if ($descripcion !== '' || $detalles !== '') {
            // Verificar si ya hay reparaciones para este equipo
            $ultimaReparacion = $this->equipoModel->getUltimaReparacion($id);

            if ($ultimaReparacion) {
                // Actualizar la última reparación
                $this->equipoModel->updateReparacion($ultimaReparacion['id'], [
                    'descripcion_proceso' => $descripcion,
                    'detalles_problemas' => $detalles
                ]);
            } else {
                // Si no existe, crear nueva
                $this->equipoModel->crearReparacion([
                    'equipo_id' => $id,
                    'descripcion_proceso' => $descripcion,
                    'detalles_problemas' => $detalles
                ]);
            }
        }

        header('Location: ../equipos.php'); // Página a la que quieres volver
        exit();
    }

    public function verHistorial($tipoFiltro = '')
    {
        // Llamar al modelo para obtener los equipos entregados, aplicando filtro si hay
        $equipos = $this->equipoModel->historial($tipoFiltro);

        // Retornar los datos a la vista
        return [
            'equipos' => $equipos,
            'tipoFiltro' => $tipoFiltro
        ];
    }

    public function equiposTecnico($tecnico_id, $estadoFiltro = '')
    {
        return $this->equipoModel->getByTecnico($tecnico_id, $estadoFiltro);
    }

    public function verHistorialTecnico($tecnico_id, $tipoFiltro = '')
    {
        $equipos = $this->equipoModel->historialPorTecnico($tecnico_id, $tipoFiltro);

        return [
            'equipos' => $equipos,
            'tipoFiltro' => $tipoFiltro
        ];
    }

    public function reparacionesTecnico($tecnico_id)
    {
        // Llamamos al modelo para obtener todas las reparaciones de los equipos del técnico
        $reparaciones = $this->equipoModel->getReparacionesByTecnico($tecnico_id);

        return [
            'reparaciones' => $reparaciones
        ];
    }

    public function equiposEnReparacion($cliente_id, $estadoFiltro = '')
    {
        $equipoModel = new Equipo($this->pdo); // si tu clase tiene $this->pdo disponible
        return $equipoModel->getByCliente($cliente_id, $estadoFiltro);
    }

    public function historialEquipos($cliente_id, $tipoFiltro = '')
    {
        $equipoModel = new Equipo($this->pdo);
        return $equipoModel->historialPorCliente($cliente_id, $tipoFiltro);
    }
}

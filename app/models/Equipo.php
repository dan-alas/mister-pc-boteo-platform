<?php

class Equipo
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Crear equipo
    public function create($data)
    {
        $sql = "INSERT INTO equipos (
            propietario_id, tecnico_id, nombre_equipo, marca, modelo, numero_serie,
            so_nombre, so_version, so_arquitectura,
            cpu_marca, cpu_modelo, cpu_velocidad,
            ram_tipo, ram_capacidad, ram_velocidad, ram_slots_vacios,
            almacenamiento_cap, almacenamiento_particiones,
            placa_modelo, puertos, info_extra,
            tipo_problema, estado_actual, fecha_ingreso, fecha_finalizacion
        ) VALUES (
            :propietario_id, :tecnico_id, :nombre_equipo, :marca, :modelo, :numero_serie,
            :so_nombre, :so_version, :so_arquitectura,
            :cpu_marca, :cpu_modelo, :cpu_velocidad,
            :ram_tipo, :ram_capacidad, :ram_velocidad, :ram_slots_vacios,
            :almacenamiento_cap, :almacenamiento_particiones,
            :placa_modelo, :puertos, :info_extra,
            :tipo_problema, :estado_actual, :fecha_ingreso, :fecha_finalizacion
        )";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':propietario_id' => $data['propietario_id'],
            ':tecnico_id' => $data['tecnico_id'],
            ':nombre_equipo' => $data['nombre_equipo'],
            ':marca' => $data['marca'],
            ':modelo' => $data['modelo'],
            ':numero_serie' => $data['numero_serie'] ?? null,
            ':so_nombre' => $data['so_nombre'],
            ':so_version' => $data['so_version'],
            ':so_arquitectura' => $data['so_arquitectura'],
            ':cpu_marca' => $data['cpu_marca'],
            ':cpu_modelo' => $data['cpu_modelo'] ?? null,
            ':cpu_velocidad' => $data['cpu_velocidad'],
            ':ram_tipo' => $data['ram_tipo'],
            ':ram_capacidad' => $data['ram_capacidad'],
            ':ram_velocidad' => $data['ram_velocidad'],
            ':ram_slots_vacios' => $data['ram_slots_vacios'],
            ':almacenamiento_cap' => $data['almacenamiento_cap'],
            ':almacenamiento_particiones' => $data['almacenamiento_particiones'],
            ':placa_modelo' => $data['placa_modelo'],
            ':puertos' => $data['puertos'],
            ':info_extra' => $data['info_extra'],
            ':tipo_problema' => $data['tipo_problema'],
            ':estado_actual' => $data['estado_actual'],
            ':fecha_ingreso' => $data['fecha_ingreso'],
            ':fecha_finalizacion' => $data['fecha_finalizacion'] ?? null,

        ]);
    }

    public function crearReparacion($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO reparaciones (equipo_id, descripcion_proceso, detalles_problemas) 
                                 VALUES (:equipo_id, :descripcion_proceso, :detalles_problemas)");
        return $stmt->execute([
            ':equipo_id' => $data['equipo_id'],
            ':descripcion_proceso' => $data['descripcion_proceso'],
            ':detalles_problemas' => $data['detalles_problemas']
        ]);
    }

    public function getLastInsertId()
    {
        return $this->pdo->lastInsertId();
    }

    // Obtener un equipo por ID (OJO: si hay varias reparaciones puede duplicar filas)
    public function getById($id)
    {
        $stmt = $this->pdo->prepare(
            "SELECT e.*, r.descripcion_proceso, r.detalles_problemas
             FROM equipos e
             LEFT JOIN reparaciones r ON e.id = r.equipo_id
             WHERE e.id = :id
             LIMIT 1"
        );
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna un solo equipo
    }

    // Actualizar equipo existente
    public function update($id, $data)
    {
        $sql = "UPDATE equipos SET
            propietario_id = :propietario_id,
            tecnico_id = :tecnico_id,
            nombre_equipo = :nombre_equipo,
            marca = :marca,
            modelo = :modelo,
            numero_serie = :numero_serie,
            so_nombre = :so_nombre,
            so_version = :so_version,
            so_arquitectura = :so_arquitectura,
            cpu_marca = :cpu_marca,
            cpu_modelo = :cpu_modelo,
            cpu_velocidad = :cpu_velocidad,
            ram_tipo = :ram_tipo,
            ram_capacidad = :ram_capacidad,
            ram_velocidad = :ram_velocidad,
            ram_slots_vacios = :ram_slots_vacios,
            almacenamiento_cap = :almacenamiento_cap,
            almacenamiento_particiones = :almacenamiento_particiones,
            placa_modelo = :placa_modelo,
            puertos = :puertos,
            info_extra = :info_extra,
            tipo_problema = :tipo_problema,
            estado_actual = :estado_actual,
            fecha_ingreso = :fecha_ingreso,
            fecha_finalizacion = :fecha_finalizacion
            WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':propietario_id' => $data['propietario_id'],
            ':tecnico_id' => $data['tecnico_id'],
            ':nombre_equipo' => $data['nombre_equipo'],
            ':marca' => $data['marca'],
            ':modelo' => $data['modelo'],
            ':numero_serie' => $data['numero_serie'] ?? null,
            ':so_nombre' => $data['so_nombre'],
            ':so_version' => $data['so_version'],
            ':so_arquitectura' => $data['so_arquitectura'],
            ':cpu_marca' => $data['cpu_marca'],
            ':cpu_modelo' => $data['cpu_modelo'] ?? null,
            ':cpu_velocidad' => $data['cpu_velocidad'],
            ':ram_tipo' => $data['ram_tipo'],
            ':ram_capacidad' => $data['ram_capacidad'],
            ':ram_velocidad' => $data['ram_velocidad'],
            ':ram_slots_vacios' => $data['ram_slots_vacios'],
            ':almacenamiento_cap' => $data['almacenamiento_cap'],
            ':almacenamiento_particiones' => $data['almacenamiento_particiones'],
            ':placa_modelo' => $data['placa_modelo'],
            ':puertos' => $data['puertos'],
            ':info_extra' => $data['info_extra'],
            ':tipo_problema' => $data['tipo_problema'],
            ':estado_actual' => $data['estado_actual'],
            ':fecha_ingreso' => $data['fecha_ingreso'],
            ':fecha_finalizacion' => !empty($data['fecha_finalizacion']) ? $data['fecha_finalizacion'] : null,
            ':id' => $id
        ]);
    }

    public function getUltimaReparacion($equipo_id)
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM reparaciones WHERE equipo_id = :equipo_id ORDER BY fecha_registro DESC LIMIT 1"
        );
        $stmt->execute([':equipo_id' => $equipo_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna un arreglo o false si no existe
    }

    public function updateReparacion($id, $data)
    {
        $stmt = $this->pdo->prepare(
            "UPDATE reparaciones SET 
            descripcion_proceso = :descripcion_proceso,
            detalles_problemas = :detalles_problemas
         WHERE id = :id"
        );
        return $stmt->execute([
            ':descripcion_proceso' => $data['descripcion_proceso'],
            ':detalles_problemas' => $data['detalles_problemas'],
            ':id' => $id
        ]);
    }

    public function historial($tipoFiltro = '')
    {
        $sql = "SELECT e.id, e.nombre_equipo, e.marca, e.tipo_problema, e.fecha_ingreso, 
                   e.fecha_finalizacion, 
                   p.nombre_completo AS propietario, 
                   t.nombre_completo AS tecnico
            FROM equipos e
            LEFT JOIN usuarios p ON e.propietario_id = p.id
            LEFT JOIN usuarios t ON e.tecnico_id = t.id
            WHERE e.estado_actual = 'entregado'";

        // Filtrar solo si se seleccionó un tipo específico
        if ($tipoFiltro === 'hardware' || $tipoFiltro === 'software' || $tipoFiltro === 'ambos') {
            $sql .= " AND e.tipo_problema = :tipo";
        }

        $sql .= " ORDER BY e.fecha_finalizacion DESC";

        $stmt = $this->pdo->prepare($sql);

        if ($tipoFiltro === 'hardware' || $tipoFiltro === 'software' || $tipoFiltro === 'ambos') {
            $stmt->bindValue(':tipo', $tipoFiltro);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener equipos asignados a un técnico
    public function getByTecnico($tecnico_id, $estadoFiltro = '')
    {
        $sql = "SELECT e.id, e.nombre_equipo, e.marca, e.tipo_problema, e.estado_actual, e.fecha_ingreso,
                   p.nombre_completo AS propietario, t.nombre_completo AS tecnico
            FROM equipos e
            LEFT JOIN usuarios p ON e.propietario_id = p.id
            LEFT JOIN usuarios t ON e.tecnico_id = t.id
            WHERE e.activo = 1
              AND e.tecnico_id = :tecnico_id
              AND e.estado_actual != 'entregado'"; // <- filtro clave para la lista principal

        if (!empty($estadoFiltro)) {
            $sql .= " AND e.estado_actual = :estado";
        }

        $sql .= " ORDER BY e.id DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':tecnico_id', $tecnico_id, PDO::PARAM_INT);

        if (!empty($estadoFiltro)) {
            $stmt->bindValue(':estado', $estadoFiltro, PDO::PARAM_STR);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function historialPorTecnico($tecnico_id, $tipoFiltro = '')
    {
        $sql = "SELECT e.id, e.nombre_equipo, e.marca, e.tipo_problema, e.fecha_ingreso, 
                   e.fecha_finalizacion, 
                   p.nombre_completo AS propietario, 
                   t.nombre_completo AS tecnico
            FROM equipos e
            LEFT JOIN usuarios p ON e.propietario_id = p.id
            LEFT JOIN usuarios t ON e.tecnico_id = t.id
            WHERE e.estado_actual = 'entregado'
              AND e.tecnico_id = :tecnico_id";

        // Filtrar solo si se seleccionó un tipo específico
        if ($tipoFiltro === 'hardware' || $tipoFiltro === 'software' || $tipoFiltro === 'ambos') {
            $sql .= " AND e.tipo_problema = :tipo";
        }

        $sql .= " ORDER BY e.fecha_finalizacion DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':tecnico_id', $tecnico_id, PDO::PARAM_INT);

        if ($tipoFiltro === 'hardware' || $tipoFiltro === 'software' || $tipoFiltro === 'ambos') {
            $stmt->bindValue(':tipo', $tipoFiltro);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener todas las reparaciones de un técnico (basado en los equipos que tiene asignados)
    public function getReparacionesByTecnico($tecnico_id)
    {
        $sql = "SELECT r.id, r.equipo_id, r.descripcion_proceso, r.detalles_problemas, r.fecha_registro,
                   e.nombre_equipo, e.marca, e.tipo_problema
            FROM reparaciones r
            INNER JOIN equipos e ON r.equipo_id = e.id
            WHERE e.tecnico_id = :tecnico_id
            ORDER BY r.fecha_registro DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':tecnico_id', $tecnico_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener todas las reparaciones de un equipo
    public function getReparacionesByEquipo($equipo_id)
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM reparaciones 
         WHERE equipo_id = :equipo_id 
         ORDER BY fecha_registro DESC"
        );
        $stmt->bindValue(':equipo_id', $equipo_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener equipos en reparación de un cliente
    public function getByCliente($cliente_id, $estadoFiltro = '')
    {
        $sql = "SELECT e.id, e.nombre_equipo, e.marca, e.tipo_problema, e.estado_actual, e.fecha_ingreso,
                   p.nombre_completo AS propietario, t.nombre_completo AS tecnico
            FROM equipos e
            LEFT JOIN usuarios p ON e.propietario_id = p.id
            LEFT JOIN usuarios t ON e.tecnico_id = t.id
            WHERE e.activo = 1
              AND e.propietario_id = :cliente_id
              AND e.estado_actual != 'entregado'"; // equipos aún en reparación

        if (!empty($estadoFiltro)) {
            $sql .= " AND e.estado_actual = :estado";
        }

        $sql .= " ORDER BY e.id DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':cliente_id', $cliente_id, PDO::PARAM_INT);

        if (!empty($estadoFiltro)) {
            $stmt->bindValue(':estado', $estadoFiltro, PDO::PARAM_STR);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener historial de equipos reparados de un cliente
    public function historialPorCliente($cliente_id, $tipoFiltro = '')
    {
        $sql = "SELECT e.id, e.nombre_equipo, e.marca, e.tipo_problema, e.fecha_ingreso, 
                   e.fecha_finalizacion, 
                   p.nombre_completo AS propietario, 
                   t.nombre_completo AS tecnico
            FROM equipos e
            LEFT JOIN usuarios p ON e.propietario_id = p.id
            LEFT JOIN usuarios t ON e.tecnico_id = t.id
            WHERE e.estado_actual = 'entregado'
              AND e.propietario_id = :cliente_id";

        if ($tipoFiltro === 'hardware' || $tipoFiltro === 'software' || $tipoFiltro === 'ambos') {
            $sql .= " AND e.tipo_problema = :tipo";
        }

        $sql .= " ORDER BY e.fecha_finalizacion DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':cliente_id', $cliente_id, PDO::PARAM_INT);

        if ($tipoFiltro === 'hardware' || $tipoFiltro === 'software' || $tipoFiltro === 'ambos') {
            $stmt->bindValue(':tipo', $tipoFiltro);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Solo para PDF: trae el equipo con los nombres del propietario y técnico
    public function getByIdForPdf($id)
    {
        $stmt = $this->pdo->prepare(
            "SELECT e.*, 
                p.nombre_completo AS propietario, 
                t.nombre_completo AS tecnico,
                r.descripcion_proceso, 
                r.detalles_problemas
         FROM equipos e
         LEFT JOIN usuarios p ON e.propietario_id = p.id
         LEFT JOIN usuarios t ON e.tecnico_id = t.id
         LEFT JOIN reparaciones r ON e.id = r.equipo_id
         WHERE e.id = :id
         ORDER BY r.fecha_registro DESC
         LIMIT 1"
        );
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna un solo equipo
    }
}

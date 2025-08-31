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
            ram_tipo, ram_capacidad,ram_velocidad, ram_slots_vacios,
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
            ':fecha_finalizacion' => $data['fecha_finalizacion'],
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
}

<?php

class BD
{
    private $conexion;
    protected $nombreTabla;

    public function __construct()
    {
        $this->conexion = new mysqli('localhost', 'root', '', 'bazar');
    }

    function insertValores($valores)
    {
        // $valores = [
        //     'nombre' => $nombre,
        //     'precio' => $precio,
        //     'descripcion' => $descripcion,
        //     'foto' => $destinoFoto
        // ];
        $valores['fecha'] = date('Y-m-d');
        $valores['hora'] = date('H:i:s');
        $valores['estado'] = 1;

        $campos = implode(',', array_keys($valores));
        $values = "'" . implode("','", array_values($valores)) . "'";
        // $values = implode(',', array_values($valores));


        $sql = "INSERT INTO {$this->nombreTabla} ($campos) VALUES ($values)";
        // echo "sql:" . $sql;

        return $this->conexion->query($sql);

        // $db->query($sql);
        // $db->close();
    }

    public function seleccionar($columnas = '*', $condiciones = '', $groupBy = '', $having = '', $order = '', $limit = '')
    {
        $condiciones = $condiciones ? " WHERE $condiciones" : '';
        $groupBy = $groupBy ? " GROUP BY $groupBy" : '';
        $having = $having ? " HAVING $having" : '';
        $order = $order ? " ORDER BY $order" : '';
        $limit = $limit ? " LIMIT $limit" : '';


        $sql = "SELECT $columnas FROM {$this->nombreTabla} $condiciones $groupBy $having $order $limit";

        // echo $sql;
        $resultado = $this->conexion->query($sql);
        $registros = [];
        while ($fila = $resultado->fetch_assoc()) {
            $registros[] = $fila;
        }
        return $registros;
    }

    public function eliminarRegistro($condicion)
    {
        $valores = [
            'estado' => 0
        ];
        return $this->actualizarRegistro($valores, $condicion);
    }

    public function actualizarRegistro($valores, $condicion)
    {
        // $valores = [
        //     'nombre' => $nombre,
        //     'precio' => $precio,
        //     'descripcion' => $descripcion,
        //     'foto' => $destinoFoto
        // ];

        //UPDATE CONSULTA
        // UPDATE nombreTAbla SET campo1='valor1',campo2='valor2' WHERE condicion
        $sets = [];
        foreach ($valores as $k => $v) {
            $sets[] = "$k = '" . $v . "'";
        }
        $valores = implode(',', $sets);
        $sql = "UPDATE {$this->nombreTabla} SET $valores WHERE $condicion";
        //echo "sql:" . $sql;
        return $this->conexion->query($sql);
    }

    public function ultimoId()
    {
        return $this->conexion->insert_id;
    }

    public function __destruct()
    {
        $this->conexion->close();
    }
}

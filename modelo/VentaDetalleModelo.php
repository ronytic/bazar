<?php
require_once  "modelo/BD.php";
class VentaDetalleModelo extends BD
{
    function __construct()
    {
        parent::__construct();
        $this->nombreTabla = 'venta_detalle';
    }

    function totalVentasXMes($mes)
    {
        $respuesta = $this->seleccionar('COUNT(*) AS total', 'MONTH(fecha) = ' . $mes);
        $total = $respuesta[0]['total'];
        return $total;
    }
}
